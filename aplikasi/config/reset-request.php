<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Jika menggunakan Composer
require 'connection.php'; // File koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Cek apakah email ada di database
    $stmt = $conn->prepare("SELECT id_user FROM tb_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Simpan token ke database
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?");
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

            $mail->setFrom('noreply@fairuzmk.my.id', 'Admin Website');
            $mail->addAddress($email);

            $mail->Subject = "Reset Password";
            $resetLink = "https://fairuzmk.my.id/aplikasi/reset-password.php?token=$token";
            $mail->Body = "Klik link berikut untuk reset password: $resetLink";

            $mail->send();
            echo "Silakan cek email untuk reset password.";
        } catch (Exception $e) {
            echo "Email tidak dapat dikirim. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}

?>