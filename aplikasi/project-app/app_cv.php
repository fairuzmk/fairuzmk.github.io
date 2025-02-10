<?php 

$nama = $_SESSION['nama'];


$biodata = query("SELECT * from tb_personal WHERE nama = '$nama' ")[0];


?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">CV Generator</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">CV-Generator</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      
        <div class="row">
          <div class="col-md">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">REKAP BIODATA</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
            
            <!--DATA DIRI-->

            <div class="card-body">
              <h3>Data Diri</h3>
              <hr>
              <div class="row">
              <div class="col-md-9">
                    <table id="" class="table table-bordered table-striped" style="width:100%">
                      
                      <tbody>
                      
                      <tr>
                        <td style="width: 5%;">1</td>
                        <td style="width:30%;">Nama Lengkap</td>
                        <td><?= $biodata["nama"] ?></td>                    
                      </tr>

                      <tr>
                        <td style="width: 5%;">2</td>
                        <td style="width:30%;">NIP</td>
                        <td><?= $biodata["nip"] ?></td>                    
                      </tr>

                      <tr>
                        <td style="width: 5%;">3</td>
                        <td style="width:30%;">No Seri Karpeg</td>
                        <td><?= $biodata["no_karpeg"] ?></td>                    
                      </tr>

                      <tr>
                        <td style="width: 5%;">4</td>
                        <td style="width:30%;">Tempat/Tanggal Lahir</td>
                        <td><?= $biodata["tempatlahir"] ?> / <?= date("d F Y", strtotime($biodata["tgl_lahir"])) ?></td>                    
                      </tr>
                      <tr>
                        <td style="width: 5%;">5</td>
                        <td style="width:30%;">Pangkat / Golongan / TMT</td>
                        <td><?= $biodata["pangkat_gol"] ?> / <?= date("d F Y", strtotime($biodata["tmt_jabatan"])) ?></td>                    
                      </tr>

                      <tr>
                        <td style="width: 5%;">6</td>
                        <td style="width:30%;">Jabatan Saat Ini</td>
                        <td><?= $biodata["jabatan"] ?></td>                    
                      </tr>

                      <tr>
                        <td style="width: 5%;">7</td>
                        <td style="width:30%;">Instansi / Unit Kerja</td>
                        <td><?= $biodata["instansi"] ?> / <?= $biodata["unit_kerja"] ?></td>                    
                      </tr>

                      <tr>
                        <td style="width: 5%;">8</td>
                        <td style="width:30%;">Alamat Kantor</td>
                        <td><?= $biodata["alamat_kantor"] ?></td>                    
                      </tr>

                      <tr>
                        <td style="width: 5%;">9</td>
                        <td style="width:30%;">Alamat Rumah</td>
                        <td><?= $biodata["alamat_rumah"] ?></td>                    
                      </tr>

                      
                      <tr>
                        <td style="width: 5%;">10</td>
                        <td style="width:30%;">No Handphone</td>
                        <td><?= $biodata["contact_hp"] ?></td>                    
                      </tr>

                      <tr>
                        <td style="width: 5%;">11</td>
                        <td style="width:30%;">Email</td>
                        <td><?= $biodata["email"] ?></td>                    
                      </tr>

                      </tbody>
                      
                    </table>
                    </div>
                <div class="col-md-3">
                </div>
                
              </div>
            </div>
                    <!-- /.card-body -->


            <!--PENDIDIKAN-->

            <div class="card-body">
            <h3>Pendidikan</h3>
              <hr>
                <table id="" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th style="width : 5%;">No</th>
                    <th>Author</th>
                    <th>Judul</th>
                    <th>Publisher/Jurnal</th>
                    <th>Year</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                  $nomor = 0;
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_karyailmiah");
                  while($karyailmiah = mysqli_fetch_array($query)){
                      $nomor++

                  ?>

                  <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $karyailmiah['author'];?></td>
                    <td><?php echo $karyailmiah['judul'];?></td>
                    <td><?php echo $karyailmiah['jurnal'];?></td>
                    <td><?php echo $karyailmiah['year'];?></td>
                  </tr>

                    <?php } ?>

                  </tbody>
                  
                </table>
              </div>
                    <!-- /.card-body -->

            <!--PENGALAMAN KERJA-->

            <div class="card-body">
              <h3>Pengalaman Kerja</h3>
              <hr>
                <table id="" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th style="width : 5%;">No</th>
                    <th>Author</th>
                    <th>Judul</th>
                    <th>Publisher/Jurnal</th>
                    <th>Year</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                  $nomor = 0;
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_karyailmiah");
                  while($karyailmiah = mysqli_fetch_array($query)){
                      $nomor++

                  ?>

                  <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $karyailmiah['author'];?></td>
                    <td><?php echo $karyailmiah['judul'];?></td>
                    <td><?php echo $karyailmiah['jurnal'];?></td>
                    <td><?php echo $karyailmiah['year'];?></td>
                  </tr>

                    <?php } ?>

                  </tbody>
                  
                </table>
              </div>
                    <!-- /.card-body -->


            <!--PELATIHAN-->

            <div class="card-body">
              <h3>Pelatihan</h3>
              <hr>
                <table id="" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th style="width : 5%;">No</th>
                    <th>Author</th>
                    <th>Judul</th>
                    <th>Publisher/Jurnal</th>
                    <th>Year</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                  $nomor = 0;
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_karyailmiah");
                  while($karyailmiah = mysqli_fetch_array($query)){
                      $nomor++

                  ?>

                  <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $karyailmiah['author'];?></td>
                    <td><?php echo $karyailmiah['judul'];?></td>
                    <td><?php echo $karyailmiah['jurnal'];?></td>
                    <td><?php echo $karyailmiah['year'];?></td>
                  </tr>

                    <?php } ?>

                  </tbody>
                  
                </table>
              </div>
                    <!-- /.card-body -->

              <!--KARYA ILMIAH-->

              <div class="card-body">
              <h3>Karya Ilmiah</h3>
              <hr>
                <table id="" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th style="width : 5%;">No</th>
                    <th>Author</th>
                    <th>Judul</th>
                    <th>Publisher/Jurnal</th>
                    <th>Year</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                  $nomor = 0;
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_karyailmiah");
                  while($karyailmiah = mysqli_fetch_array($query)){
                      $nomor++

                  ?>

                  <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $karyailmiah['author'];?></td>
                    <td><?php echo $karyailmiah['judul'];?></td>
                    <td><?php echo $karyailmiah['jurnal'];?></td>
                    <td><?php echo $karyailmiah['year'];?></td>
                  </tr>

                    <?php } ?>

                  </tbody>
                  
                </table>
              </div>
                    <!-- /.card-body -->

          </div>               
              
        </div>
          <!-- TABLE: KARYA ILMIAH -->
           
      </div>
    </section>

