<?php 
    
    session_start();
    if (!$_SESSION["nama"]){
        header('Location: ../index.php?session=expired');
        exit;

    }
    
    $nama = $_SESSION["nama"];

    ?>

<!DOCTYPE html>
<html lang="en">

   <?php include 'header.php'; ?>
   <?php include '../config/connection.php'; ?>
   <?php include '../config/query.php'; ?>
   
    <body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
  


  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/milk-io.png" alt="Milk.io logo" height="100" width="100">
  </div> -->



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
      else if($_GET['page']=='indeks-sf'){
        include 'app_index_sf.php';
      }
      else if($_GET['page']=='data-diri'){
        include 'pages/data_diri.php';
      }
      else if($_GET['page']=='data-pendidikan'){
        include 'pages/data_pendidikan.php';
      }
      else if($_GET['page']=='data-kti'){
        include 'pages/data_kti.php';
      }
      else if($_GET['page']=='data-work'){
        include 'pages/data_work.php';
      }
      else if($_GET['page']=='data-pelatihan'){
        include 'pages/data_pelatihan.php';
      }
      else if($_GET['page']=='widget-app'){
        include 'widget.php';
      }
        else if($_GET['page']=='trading-dashboard'){
          include 'apptrading/dashboard.php';
        }
        else if($_GET['page']=='trading-diary'){
          include 'apptrading/tradingdiary.php';
        }
        else if($_GET['page']=='pips-calculator'){
          include 'apptrading/pips.php';
        }
        else if($_GET['page']=='chart-tradingview'){
          include 'apptrading/tradingview.php';
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
