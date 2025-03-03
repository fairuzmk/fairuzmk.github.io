


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard2.js"></script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.js"></script>


<!-- Konversi Satuan JS -->
<script src="plugins/konversi.js"></script>

<!-- Formula JS -->
<script src="plugins/formula.js"></script>



<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#tabel1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabel1_wrapper .col-md-6:eq(0)');
    
    $("#tabel2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabel2_wrapper .col-md-6:eq(0)');

    $("#tabel3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabel3_wrapper .col-md-6:eq(0)');
    
    $("#tabel4").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabel4_wrapper .col-md-6:eq(0)');
    
    $("#tabel5").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabel5_wrapper .col-md-6:eq(0)');
  
    
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    moment.locale('id');

    $('#tgl_lahir').datetimepicker({
      format: 'D MMMM YYYY',
      locale: 'id' // Menggunakan bahasa Indonesia
    });

    $('#tmt_jabatan').datetimepicker({
      format: 'D MMMM YYYY',
      locale: 'id' // Menggunakan bahasa Indonesia
    });


    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    
  });
  

  
</script>

<!-- Script Hightlight Menu Navigasi -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Ambil URL saat ini
    const currentPath = window.location.pathname;

    // Dapatkan semua elemen nav-link
    const navLinks = document.querySelectorAll('.nav-link');

    // Iterasi setiap link
    navLinks.forEach(link => {
      // Periksa apakah href cocok dengan URL saat ini
      if (link.getAttribute('href') && currentPath.includes(link.getAttribute('href'))) {
        // Tambahkan 'active' pada link yang sesuai
        link.classList.add('active');

        // Buka menu induk (menu-open)
        const parentMenu = link.closest('.nav-item');
        if (parentMenu) {
          parentMenu.classList.add('menu-open');
        }

        // Buka semua menu level atas
        const grandParentMenu = link.closest('.menu-open');
        if (grandParentMenu) {
          grandParentMenu.classList.add('menu-open');
        }
      }
    });
  });
</script>


<!--UPDATE DATA DIRI SCRIPT-->
<?php
    if (isset ($_POST["upd_datadiri"])){

        if (updDataDiri($_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-diri';
                });
                </script>";
        //header("Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--UPDATE DATA DIRI SCRIPT-->
<?php
    if (isset ($_POST["updFoto"])){

        if (updFoto($_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-diri';
                });
                </script>";
        //header("Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--INPUT DATA PENDIDIKAN SCRIPT-->
<?php
    if (isset ($_POST["inputDataPendidikan"])){

        if (tambahPendidikan(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dimasukkan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-pendidikan';
                });
                </script>";
          //header(header: "Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--EDIT DATA PENDIDIKAN SCRIPT-->
<?php
    if (isset ($_POST["editDataPendidikan"])){

        if (editPendidikan(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-pendidikan';
                });
                </script>";
          //header(header: "Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>


<!--INPUT DATA KTI SCRIPT-->
<?php
    if (isset ($_POST["inputDataKti"])){

        if (tambahKti(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dimasukkan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-kti';
                });
                </script>";
          //header(header: "Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--EDIT DATA KTI SCRIPT-->
<?php
    if (isset ($_POST["editDataKti"])){

        if (editKti(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-kti';
                });
                </script>";
          //header(header: "Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--INPUT DATA WORK EXP SCRIPT-->
<?php
    if (isset ($_POST["inputWorkExp"])){

        if (tambahWorkExp(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dimasukkan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-work'; 
              });
                </script>";
          //header("Location: index.php");
          exit;
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--EDIT DATA WORK EXP SCRIPT-->
<?php
    if (isset ($_POST["editWorkExp"])){

        if (editWorkExp(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-work'; 
              });
                </script>";
          //header("Location: index.php");
          exit;
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>



<!--INPUT DATA DIKLAT SCRIPT-->
<?php
    if (isset ($_POST["inputDiklat"])){

        if (tambahDiklat(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dimasukkan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-pelatihan'; 
              });
                </script>";
          //header("Location: index.php");
          exit;
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--EDIT DATA DIKLAT SCRIPT-->
<?php
    if (isset ($_POST["editDiklat"])){

        if (editDiklat(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-pelatihan'; 
              });
                </script>";
          //header("Location: index.php");
          exit;
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>


<!--UPDATE DATA DIRI SCRIPT-->
<?php
    if (isset ($_POST["upd_datadiri"])){

        if (updDataDiri($_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-diri';
                });
                </script>";
        //header("Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--UPDATE DATA DIRI SCRIPT-->
<?php
    if (isset ($_POST["updFoto"])){

        if (updFoto($_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-diri';
                });
                </script>";
        //header("Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--INPUT DATA PENDIDIKAN SCRIPT-->
<?php
    if (isset ($_POST["inputDataPendidikan"])){

        if (tambahPendidikan(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dimasukkan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-pendidikan';
                });
                </script>";
          //header(header: "Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--EDIT DATA PENDIDIKAN SCRIPT-->
<?php
    if (isset ($_POST["editDataPendidikan"])){

        if (editPendidikan(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-pendidikan';
                });
                </script>";
          //header(header: "Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>


<!--INPUT DATA KTI SCRIPT-->
<?php
    if (isset ($_POST["inputDataKti"])){

        if (tambahKti(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dimasukkan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-kti';
                });
                </script>";
          //header(header: "Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--EDIT DATA KTI SCRIPT-->
<?php
    if (isset ($_POST["editDataKti"])){

        if (editKti(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-kti';
                });
                </script>";
          //header(header: "Location : index.php");
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--INPUT DATA WORK EXP SCRIPT-->
<?php
    if (isset ($_POST["inputWorkExp"])){

        if (tambahWorkExp(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dimasukkan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-work'; 
              });
                </script>";
          //header("Location: index.php");
          exit;
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--EDIT DATA WORK EXP SCRIPT-->
<?php
    if (isset ($_POST["editWorkExp"])){

        if (editWorkExp(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-work'; 
              });
                </script>";
          //header("Location: index.php");
          exit;
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>



<!--INPUT DATA DIKLAT SCRIPT-->
<?php
    if (isset ($_POST["inputDiklat"])){

        if (tambahDiklat(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dimasukkan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-pelatihan'; 
              });
                </script>";
          //header("Location: index.php");
          exit;
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>

<!--EDIT DATA DIKLAT SCRIPT-->
<?php
    if (isset ($_POST["editDiklat"])){

        if (editDiklat(data: $_POST) > 0){
    
          echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Update Berhasil Dilakukan!',
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                  window.location.href = 'index.php?page=data-pelatihan'; 
              });
                </script>";
          //header("Location: index.php");
          exit;
          
        } else {
          echo mysqli_error($koneksi);
    
        }
    
    

    } ;
?>
