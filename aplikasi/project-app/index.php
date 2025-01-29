<!DOCTYPE html>
<html lang="en">



    <?php 
    
    session_start();
    if (!$_SESSION['nama']){
        header('Location: ../index.php?session=expired');

    }
    ?>
   <?php include 'header.php'; ?>
   <?php include '../config/connection.php'; ?>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/milk-io.png" alt="Milk.io logo" height="100" width="100">
  </div>



    <?php include 'navbar.php'; ?>

    <?php include 'sidebar.php'; ?>

    <?php 
    if (isset($_GET['page'])){
      if ($_GET['page']=='dashboard'){

        include 'template.php';
      }
      else if($_GET['page']=='cv-generator'){
        include 'app_cv.php';
      }
      else if($_GET['page']=='app-konversi'){
        include 'app_konversi.php';
      }
      else if($_GET['page']=='tabel-periodik'){
        include 'tabel_periodik.php';
      }
      else {
        include '404.php';
      }
    }
    else {
      include 'template.php';
    }
    
     ?>

  <!-- Control Sidebar -->
     <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2025 <a href="https://fairuzmk.my.id">Milk.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<?php include 'footer.php'; ?>




</body>
</html>
