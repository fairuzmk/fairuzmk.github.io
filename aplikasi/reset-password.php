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
        
        <form action="config/update-password.php" method="post">
            <?php date_default_timezone_set('Asia/Jakarta'); ?>
          <h1>Update Password</h1>
                        
                     
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <div class="input-box">
                
                <input name="password" id="password" type ="password" class="form-control" placeholder="Masukkan Password Baru" required>
                <i class="fas fa-eye toggle-icon" onclick="togglePassword('password', this)"></i>
               
            </div>

            <div class="input-box">
                
                <input name="password2" id="password2" type ="password" class="form-control" placeholder="Konfirmasi Password Baru" required>

                <i class="fas fa-lock"></i>
               
            </div>

            <p id="passwordError" style="color: red; display: none;">⚠ Password tidak cocok!</p>
            <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
              
           
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

<script>
            function togglePassword(inputId, element) {
        let input = document.getElementById(inputId);

        // Toggle antara password & text
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }

        // Toggle class Font Awesome
        element.classList.toggle("fa-eye");
        element.classList.toggle("fa-eye-slash");
    }

    document.getElementById("password2").addEventListener("input", function () {
        let password = document.getElementById("password").value;
        let password2 = this.value;
        let errorText = document.getElementById("passwordError");

        if (password !== password2) {
            errorText.style.display = "block"; // Tampilkan pesan error
        } else {
            errorText.style.display = "none"; // Sembunyikan jika cocok
        }
    });
</script>


</body>
  <!--end::Body-->
</html>