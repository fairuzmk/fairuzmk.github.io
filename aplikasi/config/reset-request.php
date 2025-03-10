<?php
require 'connection.php'; // File koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Cek apakah email ada di database
    $stmt = $koneksi->prepare("SELECT id_user FROM tb_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $token = bin2hex(random_bytes(32)); // Token unik
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour")); // Berlaku 1 jam

        // Simpan token di database
        $stmt = $koneksi->prepare("UPDATE tb_users SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expires, $email);
        $stmt->execute();

        // Kirim email reset password
        $resetLink = "localhost/fairuzwebsite/aplikasi/reset-password.php?token=$token";
        $subject = "Reset Password";
        $message = "Klik link ini untuk reset password: $resetLink";
        $headers = "From: no-reply@yourwebsite.com";

        mail($email, $subject, $message, $headers);
        
        echo "Silakan cek email untuk reset password.";
    } else {
        echo "Email tidak ditemukan.";
    }
}
?>
