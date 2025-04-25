<?php
require "connection.php";

if (isset($_POST["username_registrasi"])) {
    $username = strtolower(stripslashes($_POST["username_registrasi"]));
    $result = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE username = '$username'");
    
    if (mysqli_num_rows($result) > 0) {
        echo "taken";
    } else {
        echo "available";
    }
}

if (isset($_POST["email_registrasi"])) {
    $email = strtolower(stripslashes($_POST["email_registrasi"]));
    $result = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE email = '$email'");
    
    if (mysqli_num_rows($result) > 0) {
        echo "taken";
    } else {
        echo "available";
    }
}
?>
