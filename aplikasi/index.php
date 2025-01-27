<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Login Page v2</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Login Page v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
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

  </head>
  <!--end::Head-->
  <!--begin::Body-->


  
<body class="hold-transition dark-mode login-page">

    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <p class="login-box-msg"></p>
          <p class="login-box-msg"></p>
          <p class="login-box-msg"></p>
          <p class="login-box-msg"></p>
          <p class="login-box-msg"></p>


          <form action="config/auth.php" method="post">
            <div class="input-group mb-3">
              <input name="username" type ="text" class="form-control" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                <i class="fas fa-user"></i>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input name="password" type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              
              <div class="col-6">
                <a href="register.php" class="btn btn-info btn-block">Register</a>
              </div>
                
            
              <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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

    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->

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
