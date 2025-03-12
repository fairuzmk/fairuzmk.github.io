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
  <link rel="stylesheet" href="project-app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="project-app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="style.css">

    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="project-app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="milk-io.png">
  <!-- Toastr -->
  <link rel="stylesheet" href="project-app/plugins/toastr/toastr.min.css">
  </head>
  <!--end::Head-->
  <!--begin::Body-->

  <?php require "config/connection.php"; ?>
  
<body>
  
  
  <div class="container">
    
      <!-- /.login-logo -->
      <div class="card-box login">
        
        <form action="config/reset-request.php" method="post">
          
          <h1>Reset Password</h1>
            <div class="input-box">
              <input name="email" id="email" type ="email" class="form-control" placeholder="Masukkan Email Terdaftar" required>
              
                <i class="fas fa-envelope"></i>
               
            </div>
            
            <!-- Tambahkan reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6LeB-PEqAAAAAH9ML_uXSkWV-G9TPpYDhj5AdVNn"></div>
              <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
              
           
        </form>
               
        <!-- /.login-card-body -->
      </div>
      <!-- /.login-logo -->
      
      
      <div class="toggle-box">
          <div class="toggle-panel toggle-left">
          
          
          
          <div class="login-logo">
            <a href="../index.html"><img class="login-box-msg" src="MILKio-white.png" alt="Milk.io logo" height="200" width="200"></a>
          </div>
          </div>
          <div class="toggle-panel toggle-right">
          <div class="login-logo">
            <a href="../index.html"><img class="login-box-msg" src="MILKio-white.png" alt="Milk.io logo" height="100" width="100"></a>
          </div>
          <h1>Welcome Back!</h1>
          <p>Already have an account?</p>
          <button class="btn login-btn">Login</button>

          </div>

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
<script src="loginanimation.js"></script>
<!-- Toastr -->
<script src="project-app/plugins/toastr/toastr.min.js"></script>
<!-- Google Captcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Logic Gagal Login-->
<?php
    if(isset($_GET['error']))
    {
      $x = ($_GET['error']);
      if ($x==0)
      {
      echo "
      <script>
      
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 3000
    });

      Toast.fire({
        icon: 'success',
        
        text: 'Silahkan cek email anda!'
      })
        </script>";
      }
      else if ($x==1)
      {
      echo "
      <script>
      
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 3000
    });

      Toast.fire({
        icon: 'error',
        
        text: 'Email tidak ditemukan'
      })
        </script>";
      }

      else if ($x==2)
      {
      echo "
        <script>
      
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 3000
    });

      Toast.fire({
        icon: 'warning',
        
        text: 'Masukkan email dengan benar'
      })
        </script>";
      }
      else
      {
        echo'';
      }

    }
            ?>
    
    
  <!-- Logic Gagal Login-->

</body>
  <!--end::Body-->
</html>