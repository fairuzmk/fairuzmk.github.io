<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password

    // Cek token
    $stmt = $koneksi->prepare("SELECT id_user FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Update password
        $stmt = $koneksi->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $password, $token);
        $stmt->execute();

        echo "Password berhasil diubah. Silakan login.";
    } else {
        echo "Token tidak valid atau sudah kadaluarsa.";
    }
}
?>
