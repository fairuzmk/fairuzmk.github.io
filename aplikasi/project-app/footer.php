


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

<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>

<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="plugins/pipscalculator.js"></script>

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

<script>
//Panggil data Pendidikan
$('.edit-dataPendidikan').click(function(){
var idPend= $(this).attr('data-id');
var dataJenjang= $(this).attr('data-jenjang');
var dataKampus= $(this).attr('data-kampus');
var dataJurusan= $(this).attr('data-jurusan');
var tahunMasuk= $(this).attr('data-tahun-masuk');
var tahunKeluar= $(this).attr('data-tahun');

document.getElementById('idPend').value = idPend;
document.getElementById('jenjang').value = dataJenjang;
document.getElementById('kampus').value = dataKampus;
document.getElementById('jurusan').value = dataJurusan;
document.getElementById('tahun_masuk').value = tahunMasuk;
document.getElementById('tahun').value = tahunKeluar;

})

//Panggil data work_exp
$('.edit-dataWork').click(function(){
var idWork= $(this).attr('data-id');
var dataKegiatan= $(this).attr('data-kegiatan');
var dataKerjasama= $(this).attr('data-kerjasama');
var dataPeran= $(this).attr('data-peran');
var tahun = $(this).attr('data-tahun');


document.getElementById('idWork').value = idWork;
document.getElementById('kegiatan').value = dataKegiatan;
document.getElementById('kerjasama').value = dataKerjasama;
document.getElementById('peran').value = dataPeran;
document.getElementById('year').value = tahun;

})


//Panggil data KTI
$('.edit-dataKti').click(function(){
var idKti= $(this).attr('data-id');
var dataJudul= $(this).attr('data-judul');
var dataAuthor= $(this).attr('data-author');
var dataJurnal= $(this).attr('data-jurnal');
var tahun = $(this).attr('data-tahun');
var dataReputasi = $(this).attr('data-reputasi');
var dataPublisher = $(this).attr('data-publisher');


document.getElementById('idKti').value = idKti;
document.getElementById('judul').value = dataJudul;
document.getElementById('author').value = dataAuthor;
document.getElementById('jurnal').value = dataJurnal;
document.getElementById('year').value = tahun;
document.getElementById('reputasi').value = dataReputasi;
document.getElementById('publisher').value = dataPublisher;

})
  
   //Panggil data Pelatihan
$('.edit-dataPelatihan').click(function(){
var idPelatihan= $(this).attr('data-id');
var dataDiklat= $(this).attr('data-diklat');
var dataPenyelenggara= $(this).attr('data-penyelenggara');
var dataTempat= $(this).attr('data-tempat');
var tahun = $(this).attr('data-tahun');


document.getElementById('idPelatihan').value = idPelatihan;
document.getElementById('diklat').value = dataDiklat;
document.getElementById('penyelenggara').value = dataPenyelenggara;
document.getElementById('tempat').value = dataTempat;
document.getElementById('year').value = tahun;


})


  
  
</script>
<script>
$(function () {
  bsCustomFileInput.init();
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


