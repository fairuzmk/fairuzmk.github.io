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
$work_exp = query("SELECT * from tb_experience WHERE nama = '$nama' ");

?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      
        
      <div class="row">

         
          <!-- TABLE: PENGALAMAN KERJA -->
          <div class="col-md">
                              
            <div class="card shadow-md">
              <div class="card-header">
                <h3 class="card-title">DATA PENGALAMAN PEKERJAAN</h3>
                        
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
                <table id="tabel2" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th style="width:5%;">No</th>
                    <th>Nama Kegiatan</th>
                    <th>Pendanaan</th>
                    <th>Peran</th>
                    <th style="width:10%;">Tahun</th>
                    <th style="width:10%;">Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i=1; ?>
                  <?php foreach ($work_exp as $row) : ?>

                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['kegiatan'];?></td>
                    <td><?php echo $row['kerjasama'];?></td>
                    <td><?php echo $row['peran'];?></td>
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
                <!-- /.table-responsive -->
            </div>
              
              <!-- /.card-footer -->
          </div>
          <!-- TABLE: PENGALAMAN KERJA -->

           
  
        
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
      <h4 class="modal-title">Input Data Pengalaman Kerja</h4>
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
            <label for="kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="kegiatan" placeholder="Isikan Judul/Nama Kegiatan" required>
            </div>
          </div>  
         <div class="form-group row">
            <label for="pendanaan" class="col-sm-2 col-form-label">Sumber Pendanaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="pendanaan" placeholder="Lembaga Pemberi Pendanaan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="peran" class="col-sm-2 col-form-label">Peran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="peran" placeholder="Sebagai : Engineer/Staff/Chief Engineer/Researcher">
            </div>
          </div>
          <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="year" placeholder="Tahun Berlangsungnya Kegiatan">
            </div>
          </div>
          

          
        </div>
        
      
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info" name="inputWorkExp">Save changes</button>
  </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


