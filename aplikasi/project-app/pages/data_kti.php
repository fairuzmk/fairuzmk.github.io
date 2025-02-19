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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
<?php


$nama = $_SESSION['nama'];


$biodata = query("SELECT * from tb_personal WHERE nama = '$nama' ")[0];
$kti = query("SELECT * from tb_karyailmiah WHERE nama = '$nama' ");

?>
        
      <div class="row">

         <!-- TABLE: KARYA ILMIAH -->
         <div class="col-md">
          
          <div class="card shadow-md">
              <div class="card-header">
                <h3 class="card-title">DATA KARYA ILMIAH</h3>

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-kti">
                <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>Input Data  
                </button>
                  <br></br>
                <table id="tabel1" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th style="width:5%;">No</th>
                    <th>Author</th>
                    <th>Judul</th>
                    <th>Publisher/Jurnal</th>
                    <th style="width:10%;">Year</th>
                    <th style="width:10%;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i=1; ?>
                  <?php foreach ($kti as $row) : ?>

                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['author'];?></td>
                    <td><?php echo $row['judul'];?></td>
                    <td><?php echo $row['jurnal'];?></td>
                    <td><?php echo $row['year'];?></td>
                    <td>
                    <button type="button" class="btn btn-outline-success"><i class="fas fa-pen"></i></button>
                    <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                    
                  </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach ?>
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->

        </div>               
        
          </div>
          <!-- TABLE: KARYA ILMIAH -->
                       
  
        
      </div>
          <!-- /.col -->
    </div>
      <!-- /.row -->
       
      

      
    </section>

  </div>
    <!-- /.content -->

<!-- /.MODAL -->

<div class="modal fade" id="modal-kti">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Input Data Karya Tulis Ilmiah (KTI)</h4>
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
            <label for="judul" class="col-sm-2 col-form-label">Judul Paper</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="judul" placeholder="Tittle" required>
            </div>
          </div>  
        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="author" placeholder="Author 1, Author 2, ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="publisher" placeholder="Nama Jurnal/Publisher">
            </div>
          </div>
          <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Tahun Terbit</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="year" placeholder="Tahun terbit">
            </div>
          </div>
          <div class="form-group row">
            <label for="reputasi" class="col-sm-2 col-form-label">Reputasi</label>
            <div class="col-sm-10">
            <select class="form-control select2" name="reputasi" required>
            <option>Conference</option>
            <option>Rendah</option>
            <option>Menengah</option>
            <option>Tinggi</option>
            
            </select>
            </div>
          </div>

          
        </div>
        
      
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info" name="inputDataKti">Save changes</button>
  </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



