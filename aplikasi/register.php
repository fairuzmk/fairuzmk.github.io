<?php require "config/connection.php"; ?>




<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register to Milk.io App</title>
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
  <link rel="stylesheet" href="project-app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="project-app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="project-app/dist/css/adminlte.min.css">

    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="project-app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- Toastr -->
  <link rel="stylesheet" href="project-app/plugins/toastr/toastr.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="milk-io.png">

  </head>
  <!--end::Head-->
  <!--begin::Body-->


  
<body class="hold-transition login-page">


    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><img class="login-box-msg" src="milk-io-panjang.png" alt="Milk.io logo" height="100" width="300"></a>
      </div>
      <!-- /.login-logo -->
      <hr>
      <div class="card">
        <div class="card-body login-card-body">

       

          <form action="" method="POST">
            <label for="nama">Full Name</label>
            <div class="input-group mb-3">
              <input name="nama" id="nama" type ="text" class="form-control" placeholder="Nama Lengkap" required>
              <div class="input-group-append">
                <div class="input-group-text">
                <i class="fas fa-user"></i>
                </div>
              </div>
            </div>
            <label for="email">Email</label>
            <div class="input-group mb-3">
              <input name="email" id="email" type ="text" class="form-control" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                <i class="fas fa-envelope"></i>
                </div>
              </div>
            </div>
            <label for="contact_hp">Nomor HP</label>
            <div class="input-group mb-3">
              <input name="contact_hp" id="contact_hp" type ="text" class="form-control" placeholder="081234567890" required>
              <div class="input-group-append">
                <div class="input-group-text">
                <i class="fas fa-mobile-alt"></i>
                </div>
              </div>
            </div>
            <label for="username">Username</label>
            <div class="input-group mb-3">
              <input name="username" id="username" type ="text" class="form-control" placeholder="Username" required>
              <div class="input-group-append">
                <div class="input-group-text">
                <i class="fas fa-user"></i>
                </div>
              </div>
            </div>
            <label for="password">Password</label>
            <div class="input-group mb-3">
              <input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <label for="password2">Konfirmasi Password</label>
            <div class="input-group mb-3">
              <input name="password2" id="password2" type="password" class="form-control" placeholder="Ulangi Password Anda" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            
              <input name="level" id="level" type="text" class="" value="User" hidden>
              
                
            <div class="row mb-4">
              
                           
              <div class="col-6">
                <a href="index.php" class="btn btn-danger btn-block">Sign In</a>
              </div>
            
              <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block" name="register" >Register</button>
              </div>
            

            </div>
          </form>

          
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>

    <!-- jQuery -->
<script src="project-app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="project-app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="project-app/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<!-- SweetAlert2 -->
<script src="project-app/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="project-app/plugins/toastr/toastr.min.js"></script>

<?php require "config/registration.php"; ?>

<script>
  // $(function() {
  //   var Toast = Swal.mixin({
  //     toast: true,
  //     position: 'top-end',
  //     showConfirmButton: false,
  //     timer: 3000
  //   });

  //   $('.toastrDefaultSuccess').click(function() {
  //     toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
  //   });
  //   $('.toastrDefaultInfo').click(function() {
  //     toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
  //   });
  //   $('.toastrDefaultError').click(function() {
  //     toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
  //   });
  //   $('.toastrDefaultWarning').click(function() {
  //     toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
  //   });


  // });
</script>

</body>
</html>