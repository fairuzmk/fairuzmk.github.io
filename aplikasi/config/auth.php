<?php
session_start();
include("connection.php");

if (empty($_POST["username"]) || empty($_POST["password"])) {
    header('Location: ../index.php?error=10');
    exit;
    
}

$username = $_POST["username"];
$password = $_POST["password"];

// Gunakan prepared statement untuk menghindari SQL Injection
$stmt = $koneksi->prepare("SELECT * FROM tb_users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if (password_verify($password, $user["password"])) {
        $_SESSION["nama"] = $user["nama"];
        $_SESSION["level"] = $user["level"];
        $_SESSION["id_user"] = $user["id_user"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["username"] = $user["username"];
        header("Location: ../project-app");
        exit;
    } else {
        header('Location: ../index.php?error=1'); // Password salah
        exit;
    }
} else {
    header('Location: ../index.php?error=1'); // Username tidak ditemukan
    exit;
}

?>
