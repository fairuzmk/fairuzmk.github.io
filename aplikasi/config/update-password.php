<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login to Milk.io App</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Milk.io | Login App" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="Milk.io is website app made by FairuzMK"
    />
    <meta
      name="keywords"
      content="Milk.io, fairuzmk, fairuz website, fairuz milky kuswa"
    />
    <!--end::Primary Meta Tags-->
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../project-app/plugins/fontawesome-free/css/all.min.css">


    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../project-app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="milk-io.png">
  <!-- Toastr -->
  <link rel="stylesheet" href="../project-app/plugins/toastr/toastr.min.css">
  </head>
   <!-- Theme style -->
   <link rel="stylesheet" href="../project-app/dist/css/adminlte.min.css">

<body>


<!-- SweetAlert2 -->
<script src="../project-app/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Toastr -->
<script src="../project-app/plugins/toastr/toastr.min.js"></script>
<?php


require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $token = $_POST["token"];
    


    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password

    // Cek token
    $stmt = $koneksi->prepare("SELECT id_user FROM tb_users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Update password
        $stmt = $koneksi->prepare("UPDATE tb_users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $password, $token);
        $stmt->execute();

        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Password berhasil diubah. Silakan login.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../index.php'; // Redirect ke halaman login
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Token tidak valid atau sudah kadaluarsa. Silahkan lakukan reset password kembali',
                confirmButtonText: 'Coba Lagi'
            }).then(() => {
                window.location.href = '../forgot-password.php';
                });
        </script>";
    }
}
?>


</body>

</html>
