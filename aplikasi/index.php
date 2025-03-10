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
            
          <form action="config/auth.php" method="post">
          
          <h1>Login</h1>
            <div class="input-box">
              <input name="username" id="username" type ="text" class="form-control" placeholder="Username">
              
                <i class="fas fa-user"></i>
               
            </div>
            <div class="input-box">
              <input name="password" id="password" type="password" class="form-control" placeholder="Password">
              <i class="fas fa-lock"></i>
                
            </div>
            
              
              
                
            
              
              <button type="submit" name="signin" class="btn btn-primary btn-block">Sign In</button>
              
              <div class="forgot-link">
                <a href="#">Forgot Password</a>
              </div>

            
          </form>
               
        <!-- /.login-card-body -->
      </div>
      <!-- /.login-logo -->
      <div class="card-box register">
            
          <form action="" method="post">
          <h1>Register</h1>
            <div class="input-box">
              <input name="nama" id="nama" type ="text" class="form-control" placeholder="Full Name" required>
              <i class="fas fa-user"></i>
            </div>
            <div class="input-box">
              <input name="email" id="email" type ="email" class="form-control" placeholder="Email" required>
              <i class="fas fa-envelope"></i>
            </div>
            <div class="input-box">
              <input name="username" id="username" type ="text" class="form-control" placeholder="Username" required>
              <i class="far fa-user-circle"></i>
            </div>
            <div class="input-box">
              <input name="password" id="password" type ="password" class="form-control" placeholder="Password" required>
              <i class="fas fa-lock"></i>
            </div>
            <div class="input-box">
              <input name="password2" id="password2" type="password" class="form-control" placeholder="Konfirmasi Password" required>
              <i class="fas fa-lock"></i>
                
            </div>
            <input name="level" id="level" type="text" class="" value="User" hidden>

            
              
              
                
            
              
              <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
              
              

            
          </form>
               
        <!-- /.login-card-body -->
      </div>
      
      <div class="toggle-box">
          <div class="toggle-panel toggle-left">
          
          <h1>Hello, Welcome!</h1>
          <p>Don't Have an Account?</p>
          <button class="btn register-btn">Register</button>
          <div class="login-logo">
            <a href="../index.html"><img class="login-box-msg" src="MILKio-white.png" alt="Milk.io logo" height="100" width="100"></a>
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

<?php require "config/registration.php"; ?>

<!-- Logic Gagal Login-->
      <?php
    if(isset($_GET['error']))
    {
      $x = ($_GET['error']);
      if ($x==1)
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
        
        text: 'Username dan Password Salah'
      })
        </script>";
      }
      else if ($x==10)
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
        
        text: 'Masukkan username dan password'
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
