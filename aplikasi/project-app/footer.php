  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>


  <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

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


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>


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

