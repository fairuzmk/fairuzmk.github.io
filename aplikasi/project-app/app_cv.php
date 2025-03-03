<?php 

$nama = $_SESSION['nama'];


$biodata = query("SELECT * from tb_personal WHERE nama = '$nama' ")[0];
$pendidikan = query("SELECT * from tb_pendidikan WHERE nama = '$nama' ORDER BY tahun ASC");
$work_exp = query("SELECT * from tb_experience WHERE nama = '$nama' ORDER BY year ASC");
$diklat = query("SELECT * from tb_diklat WHERE nama = '$nama' ORDER BY year ASC");
$kti = query("SELECT * from tb_karyailmiah WHERE nama = '$nama' ORDER BY year ASC");



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
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-dharmachakra"></i><span style="padding:5px;">Generate CV</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Export PDF</a>
                      <a href="print/export_word.php" class="dropdown-item">Format Standard (.docx)</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  
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
                        <td><?= $biodata["nama"] . " " . $biodata["gelar_belakang"] ?></td>                    
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
                <!-- <div class="col-md-3"style="display: flex; justify-content: center; align-items: center; width: 200px; height: 550px; overflow: hidden;">
                <img src="img/<?= $biodata["foto"]; ?>" alt="Gambar" width=100% height="auto">
                </div> -->
                <div class="col-md-3"style="width: 100%; aspect-ratio: 300 / 400; overflow: hidden;">
                <img src="img/<?= $biodata["foto"]; ?>" alt="Gambar" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        
        <!-- /.row -->
        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">5,200</span>
              </div>
                    <!-- /.card-body -->

            <!--PENGALAMAN KERJA-->


            <div class="card-body">
              <h3>Pengalaman Kerja</h3>
              <hr>
                <table id="" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th style="width:5%;">No</th>
                    <th>Nama Kegiatan</th>
                    <th>Pendanaan</th>
                    <th>Peran</th>
                    <th style="width:10%;">Tahun</th>

                    
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i=1; ?>
                  <?php foreach ($work_exp as $work) : ?>

                  <tr>
                    <td style="text-align:center;"><?php echo $i;?></td>
                    <td><?php echo $work['kegiatan'];?></td>
                    <td><?php echo $work['kerjasama'];?></td>
                    <td><?php echo $work['peran'];?></td>
                    <td style="text-align:center;"><?php echo $work['year'];?></td>
                    
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach ?>

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
                  <th style="width: 5%;">No</th>
                  <th>Nama Diklat</th>
                  <th>Penyelenggara</th>
                  <th>Tempat Penyelenggaraan</th>
                  <th style="width:10%;">Tahun</th>
                  
                </tr>
                </thead>
                <tbody>
                
                
                <?php $i=1; ?>
                  <?php foreach ($diklat as $dik) : ?>

                  <tr>
                    <td style="text-align: center;"><?php echo $i;?></td>
                    <td><?php echo $dik['diklat'];?></td>
                    <td><?php echo $dik['penyelenggara'];?></td>
                    <td><?php echo $dik['tempat'];?></td>
                    <td style="text-align: center;"><?php echo $dik['year'];?></td>
                    
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach ?>

                
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
                    <th style="width:5%;">No</th>
                    <th>Author</th>
                    <th>Judul</th>
                    <th>Publisher/Jurnal</th>
                    <th style="width:10%;">Year</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i=1; ?>
                  <?php foreach ($kti as $ktie) : ?>

                  <tr>
                    <td style="text-align: center;"><?php echo $i;?></td>
                    <td><?php echo $ktie['author'];?></td>
                    <td><?php echo $ktie['judul'];?></td>
                    <td><?php echo $ktie['jurnal'];?></td>
                    <td style="text-align: center;"><?php echo $ktie['year'];?></td>
                  
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
    </section>

