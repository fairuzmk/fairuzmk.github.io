  
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
$pendidikan = query("SELECT * from tb_pendidikan WHERE nama = '$nama' ");

?>
        
      <div class="row">

          <!-- TABLE: PENDIDIKAN -->
          <div class="col-md">
                              
          <div class="card card shadow-md">
            <div class="card-header">
              <h3 class="card-title">DATA PENDIDIKAN</h3>
                      
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-pendidikan">
            <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>Input Data  
            </button>
            <br></br>
              <table id="tabel4" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>

                  <th style="width:10%;">Jenjang</th>
                  <th>Perguruan Tinggi</th>
                  <th>Jurusan</th>
                  <th>Tahun Masuk</th>
                  <th>Tahun Lulus</th>
                  <th style="width:10%;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                <?php foreach ($pendidikan as $row) : ?>

                <tr style="text-align: center;">
                  <td><?= $row["jenjang"];?></td>
                  <td><?= $row["kampus"];?></td>
                  <td><?= $row["jurusan"];?></td>
                  <td><?= $row["tahun_masuk"];?></td>
                  <td><?= $row["tahun"];?></td>
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
        <!-- TABLE: PENDIDIKAN -->

         
  
        
      </div>
          <!-- /.col -->
    </div>
      <!-- /.row -->
       
      

      
    </section>
  </div>

  <!-- /.MODAL -->

<div class="modal fade" id="modal-pendidikan">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">INPUT DATA PENDIDIKAN</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <form class="form-horizontal" method="POST" action="">
    <div class="modal-body">
    
        <div class="card-body">
        <div class="row">
          <input type="hidden" value="">
          <input type="hidden" name="nama" value="<?=$biodata["nama"]?>">
          <div class="form-group col-2">
              <label for="jenjang" class="form-label">Jenjang</label>
              
              <select class="form-control select2" name="jenjang" required>
              <option disabled selected>Pilih Jenjang Pendidikan</option>
              <option>D3</option>
              <option>D4</option>
              <option>S1</option>
              <option>S2</option>
              <option>S3</option>
              
              </select>
              
          </div> 

          <div class="form-group col-3">
            <label for="kampus" class="form-label">Perguruan Tinggi</label>
            <input type="text" class="form-control" name="kampus" placeholder="Universitas" required>
          </div>

          <div class="form-group col-3">
            <label for="jurusan" class="form-label">Jurusan</label>
             <input type="text" class="form-control" name="jurusan" placeholder="Jurusan/Departemen">
          
          </div>

          <div class="form-group col-2">
          <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
          <input type="number" class="form-control" name="tahun_masuk" placeholder="">
          </div>
          <div class="form-group col-2">
          <label for="tahun" class="form-label">Tahun Lulus</label>
          <input type="number" class="form-control" name="tahun" placeholder="">
          </div>
          
        </div>
          
           
        
      
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info" name="inputDataPendidikan">Input Data</button>
  </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
    <!-- /.content -->
