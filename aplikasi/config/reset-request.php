<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Jika menggunakan Composer
require 'connection.php'; // File koneksi ke database
date_default_timezone_set('Asia/Jakarta');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $recaptcha_response = $_POST["g-recaptcha-response"];

    // Periksa apakah reCAPTCHA diisi
    if (!$recaptcha_response) {
        header('Location: ../forgot-password.php?error=2');
    }

    // Verifikasi reCAPTCHA dengan Google
    $secret_key = "6LeB-PEqAAAAAILNzQzXTczvXoKWSo_UDEw2lCer"; // Ganti dengan Secret Key dari Google
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");
    $captcha_success = json_decode($verify);

    if (!$captcha_success->success) {
        die("Verifikasi reCAPTCHA gagal. Coba lagi.");
    }


    // Cek apakah email ada di database
    $stmt = $koneksi->prepare("SELECT id_user, username, nama FROM tb_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id_user, $username, $nama); // Ambil id_user dan username
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Simpan token ke database
        $stmt = $koneksi->prepare("UPDATE tb_users SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expires, $email);
        $stmt->execute();

        // Kirim email dengan PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.fairuzmk.my.id'; // Ganti dengan SMTP dari cPanel
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@fairuzmk.my.id'; // Email hosting
            $mail->Password = 'Fairuz29!'; // Password email
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Gunakan SSL
            $mail->Port = 465; // Gunakan port 465 untuk SSL atau 587 untuk TLS

            $mail->setFrom('noreply@fairuzmk.my.id', 'MILK-io Website');
            $mail->addAddress($email);

            $mail->Subject = "Permintaan Reset Password";
            $resetLink = "https://fairuzmk.my.id/aplikasi/reset-password.php?token=$token";
            $mail->Body = "Halo $nama,\n\n Username anda: $username\n\nAnda telah meminta untuk mereset password.\n\nKlik link berikut untuk mereset password Anda:\n$resetLink\n\nJika Anda tidak merasa melakukan ini, abaikan saja email ini.";

            $mail->send();
            header("Location: ../forgot-password.php?error=0");
            exit;
        } catch (Exception $e) {
            echo "Email tidak dapat dikirim. Error: {$mail->ErrorInfo}";
        }
    } else {
        header("Location: ../forgot-password.php?error=1");
        exit;
    }
}

?>