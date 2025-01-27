<!DOCTYPE html>
<html lang="en">

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
    
  <?php 
  
  include '../config/connection.php'; ?>

    <?php session_start();
     include ('header.php'); ?>

    <?php include 'navbar.php'; ?>

    <?php include 'sidebar.php'; ?>

    <?php include 'app_cv.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php include 'footer.php'; ?>


<div/>

</body>
</html>
