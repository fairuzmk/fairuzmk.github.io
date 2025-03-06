  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<?php


$nama = $_SESSION['nama'];


$biodata = query("SELECT * from tb_personal WHERE nama = '$nama' ")[0];
$diklat = query("SELECT * from tb_diklat WHERE nama = '$nama' ");

if (isset ($_POST["inputDiklat"])){

  if (tambahDiklat($_POST) > 0){

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

if (isset ($_POST["editDiklat"])){

  if (editDiklat($_POST) > 0){

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


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      
        
      <div class="row">

         
         
          <!-- TABLE: PELATIHAN -->
          <div class="col-md">
                              
          <div class="card shadow-md">
            <div class="card-header">
              <h3 class="card-title">DATA PELATIHAN</h3>
                      
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-pelatihan">
                <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>Input Data  
                </button>
            <br></br>
              <table id="tabel3" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th>Nama Diklat</th>
                  <th>Penyelenggara</th>
                  <th>Tempat Penyelenggaraan</th>
                  <th style="width:10%;">Tahun</th>
                  <th style="width:10%;">Action</th>
                </tr>
                </thead>
                <tbody>
                
                
                <?php $i=1; ?>
                  <?php foreach ($diklat as $row) : ?>

                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['diklat'];?></td>
                    <td><?php echo $row['penyelenggara'];?></td>
                    <td><?php echo $row['tempat'];?></td>
                    <td><?php echo $row['year'];?></td>
                    <td>
                    <a class="edit-dataPelatihan btn btn-outline-success" 
                    data-id="<?= $row["id"];?>"
                    data-diklat="<?= $row["diklat"];?>"
                    data-penyelenggara="<?= $row["penyelenggara"];?>"
                    data-tempat="<?= $row["tempat"];?>"
                    data-tahun="<?= $row["year"];?>"
                    
                    data-toggle="modal" data-target="#modal-editPelatihan"
                    ><i class="fas fa-pen"></i></a>
                    <button type="button" class="btn btn-outline-danger" onclick=deleteData(<?= $row["id"];?>)><i class="fas fa-trash"></i></button>
                    
                  </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach ?>

                
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
              <!-- /.table-responsive -->
          </div>
            
            <!-- /.card-footer -->
        </div>
        <!-- TABLE: PELATIHAN -->
 
  
        
        </div>
          <!-- /.col -->
    </div>
      <!-- /.row -->
       
      

      
    </section>

</div>
    <!-- /.content -->


<!-- /.MODAL INPUT-->

<div class="modal fade" id="modal-pelatihan">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Input Data Pelatihan</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <form class="form-horizontal" method="POST" action="">
    <div class="modal-body">
    
        <div class="card-body">
        <input type="hidden" value="">
        <input type="hidden" name="nama" value="<?=$biodata["nama"]?>">
         <div class="form-group row">
            <label for="diklat" class="col-sm-4 col-form-label">Nama Pelatihan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="diklat" placeholder="Isikan Judul/Nama Pelatihan" required>
            </div>
          </div>  
         <div class="form-group row">
            <label for="penyelenggara" class="col-sm-4 col-form-label">Penyelenggara</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="penyelenggara" placeholder="Lembaga Penyelenggara Pelatihan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tempat" class="col-sm-4 col-form-label">Tempat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="tempat" placeholder="Tempat diselenggarakannya pelatihan">
            </div>
          </div>
          <div class="form-group row">
            <label for="year" class="col-sm-4 col-form-label">Tahun</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="year" placeholder="Tahun Berlangsungnya Pelatihan">
            </div>
          </div>
          

          
        </div>
        
      <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info" name="inputDiklat">Save changes</button>
      </div>
    </div>
    </form>
    
</div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.MODAL EDIT-->

<div class="modal fade" id="modal-editPelatihan">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header bg-warning">
      <h4 class="modal-title">Edit Data Pelatihan</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <form class="form-horizontal" method="POST" action="">
    <div class="modal-body">
    
        <div class="card-body">
        <input type="hidden" id="idPelatihan" name="idPelatihan">
        <input type="hidden" name="nama" value="<?=$biodata["nama"]?>">
         <div class="form-group row">
            <label for="diklat" class="col-sm-4 col-form-label">Nama Pelatihan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="diklat" id="diklat" placeholder="Isikan Judul/Nama Pelatihan" required>
            </div>
          </div>  
         <div class="form-group row">
            <label for="penyelenggara" class="col-sm-4 col-form-label">Penyelenggara</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Lembaga Penyelenggara Pelatihan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tempat" class="col-sm-4 col-form-label">Tempat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="tempat" id="tempat"placeholder="Tempat diselenggarakannya pelatihan">
            </div>
          </div>
          <div class="form-group row">
            <label for="year" class="col-sm-4 col-form-label">Tahun</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="year" id="year" placeholder="Tahun Berlangsungnya Pelatihan">
            </div>
          </div>
          

          
        </div>
        
      <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info" name="editDiklat">Update Data</button>
      </div>
    </div>
    </form>
    
</div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
  function deleteData(data_id){
    //alert('ok');
  
      Swal.fire({
      title: "Apakah anda yakin?",
      text: "Kamu akan menghapus data ini",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, hapus saja!"
      }).then((result) => {
      if (result.isConfirmed) {
        
        let timerInterval;
        Swal.fire({
          title: "Hapus Data",
          html: "Sedang menghapus data",
          icon: "warning",
          timer: 1500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
              timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location=("del/delete.php?id="+data_id+"&page=data-pelatihan");
          }
        });
        
      }
    });
  }

</script>