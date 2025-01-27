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
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
      else {
        include '404.php';
      }
    }
    else {
      include 'template.php';
    }
    
     ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php include 'footer.php'; ?>


<div/>

</body>
</html>
