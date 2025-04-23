
  <?php 
  $biodata = query("SELECT * from tb_personal WHERE nama = '$nama' ")[0];
  $value_tgl_lahir = isset($biodata["tgl_lahir"]) ? date("d-M-Y", strtotime($biodata["tgl_lahir"])) : "";
  $userdata = query("SELECT * from tb_users WHERE nama = '$nama' ")[0];
  $jml_work = querySingle("SELECT COUNT(nama) FROM tb_experience WHERE nama = '$nama'");
  $jml_kti = querySingle("SELECT COUNT(nama) FROM tb_karyailmiah WHERE nama = '$nama'");
  $jml_diklat = querySingle("SELECT COUNT(nama) FROM tb_diklat WHERE nama = '$nama'");
  $hasil_pend = query("SELECT * from tb_pendidikan WHERE nama = '$nama' ORDER BY tahun DESC");

  // Periksa apakah ada data sebelum mengakses indeks 0
  $pend = isset($hasil_pend[0]) ? $hasil_pend[0] : null;
  


  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <div class="foto-profil">
                  <img src ='img/<?= $biodata["foto"]?>'>
                </div>
                  <div class="konten">
                      <h1><?= $biodata["nama"] ?></h1>
                    <div class="paragraf">
                    <p><?= $biodata["jabatan"] ?></p>
                    <p><?= $biodata["unit_kerja"] ?></p>
                    </div>
                  </div>
                
            </div>
          </div>

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-8">
           
            <div class="card">
              <div class="row">
                <div class="col-md-4 d-flex justify-content-center">
                  <div class="grid-box mt-3 bg-primary" >
                      
                        <i class="bi bi-mortarboard-fill"></i>
                        <a href="index.php?page=data-pendidikan"><?php 
                          if ($pend) {
                            echo $pend["jenjang"] . " - " . $pend["jurusan"];
                        } else {
                            echo "Tidak ada data pendidikan";
                        }
                         
                        ?></a>
                      

                  </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                  <div class="grid-box mt-3 bg-success" >
                    
                    <i class="bi bi-suitcase-lg-fill"></i>
                    <a href="index.php?page=data-work"><?= $jml_work ?> Works</a>
                  </div>         
                </div>
            
                <div class="col-md-4 d-flex justify-content-center">
                  <div class="grid-box mt-3 bg-info" >
                      
                        <i class="fas fa-microscope" style="padding: 30px;"></i>
                        <a href="index.php?page=data-kti"><?= $jml_kti ?> Publications</a>

                  </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                  <div class="grid-box mt-3 bg-secondary" >
                  <i class="fas fa-chalkboard-teacher" style="padding: 30px;"></i>
                  <a href="index.php?page=data-pelatihan"><?= $jml_diklat ?> Training Exp</a>
                  </div>         
                </div>

              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                
              <div class="konten">
                <div class="kontak">
                <i class="bi bi-envelope-at" style="font-weight:500;font-size: 1.2rem;"></i><span>Email</span><a href="#"><?= $userdata["email"] ?></a>
                </div>
                
                <div class="kontak">
                <i class="bi bi-at" style="font-weight:500;font-size: 1.2rem;"></i><span>Username</span><a href="#"><?= $userdata["username"] ?></a>
                </div>
                
                <div class="kontak">
                <i class="bi bi-telephone" style="font-weight:500;font-size: 1.2rem;"></i><span>Handphone</span><a href="#"><?= $biodata["contact_hp"] ?></a>
                </div>
                
              </div>
              
            </div>
           
          </div>
          

          
          <div class="clearfix hidden-md-up"></div>
        </div>
          
        
        <!-- /.row -->

       
        </div>

      
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
</div>