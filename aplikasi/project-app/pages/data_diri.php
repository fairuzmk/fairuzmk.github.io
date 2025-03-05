
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
<section id="form-data-diri" class="content">
<div class="container-fluid">
       
      
<?php 

$nama = $_SESSION['nama'];


$biodata = query("SELECT * from tb_personal WHERE nama = '$nama' ")[0];
$value_tgl_lahir = isset($biodata["tgl_lahir"]) ? date("d-M-Y", strtotime($biodata["tgl_lahir"])) : "";
$value_tmt_jabatan = isset($biodata["tmt_jabatan"]) ? date("d-M-Y", strtotime($biodata["tmt_jabatan"])) : "";

if (isset ($_POST["upd_datadiri"])){

    if (updDataDiri($_POST) > 0){

        echo "
            <script>
            Swal.fire({
            icon: 'success',
            title: 'Update Berhasil Dilakukan!',
            showConfirmButton: false,
            timer: 1500
            }).then(() => {
                window.location.href = 'index.php?page=data-diri';
            });
            </script>";

        
    } else {
        echo mysqli_error($koneksi);

    }



} ;


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

<div class="row">
<!-- UPDATE: DATA DIRI -->
    <div class="col-md">

    <div class="card shadow-md">
        <div class="card-header">
            <h3 class="card-title">DATA DIRI</h3>
                
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
            <form class="form-horizontal" method="POST" action="" >
                <div class="row">    
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="id" placeholder="" value="<?=$biodata["id"]?>" hidden>
                        
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="" value="<?=$biodata["nama"]?>" readonly>
                            </div>
                        </div>  
                        <div class="form-group row">
                        <label for="kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" name="kelamin">
                                <option disabled <?= (!isset($biodata["kelamin"]) || empty($biodata["kelamin"])) ? 'selected' : ''; ?>>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= ($biodata["kelamin"] == "Laki-laki") ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= ($biodata["kelamin"] == "Perempuan") ? 'selected' : ''; ?>>Perempuan</option>
                                <option value="Tidak Tahu" <?= ($biodata["kelamin"] == "Tidak Tahu") ? 'selected' : ''; ?>>Tidak Tahu</option>
                            </select>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="tempatlahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="tempatlahir" placeholder="Isikan Kota Lahir" value="<?=$biodata["tempatlahir"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                            <div class="input-group date" id="tgl_lahir" data-target-input="nearest">
                                <input type="text" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#tgl_lahir" value="<?=$value_tgl_lahir?>" autocomplete="off"/>
                                <div class="input-group-append" data-target="#tgl_lahir" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            </div>
                        </div> 
                        <div class="form-group row">
                        <label for="alamat_rumah" class="col-sm-3 col-form-label">Alamat Rumah</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" rows="2" name="alamat_rumah" placeholder="Isikan Alamat Domisili" ><?=$biodata["alamat_rumah"]?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="contact_hp" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="contact_hp" placeholder="" value="<?=$biodata["contact_hp"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" placeholder="" value="<?=$biodata["email"]?>">
                            </div>
                        </div>
                        
                        
                         
                        <div class="form-group row">
                        
                        <label for="foto" class="col-sm-3 col-form-label">Foto Sebelumnya</label>
                            <div class="col-sm-8">
                            <img src="img/<?= $biodata["foto"]; ?>" alt="Gambar" width="200">
                            <hr>
                            <button type="button" class="btn btn-primary" id="btn-update" style="" data-toggle="modal" data-target="#modal-foto">Upload Foto</button>
                            </div>
                        </div> 
                        
                    </div>
                    
                    <div class="col-md-6">
                            <div class="form-group row">
                            <label for="gelarDepan" class="col-sm-3 col-form-label">Gelar Depan</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="gelarDepan" placeholder="Kosongkan jika tidak ada" value="<?=$biodata["gelar_depan"]?>">
                            </div>
                            <label for="gelarBelakang" class="col-sm-2 col-form-label">Gelar Belakang</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="gelarBelakang" placeholder="S.T., M.T." value="<?=$biodata["gelar_belakang"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-3 col-form-label">NIP/ID</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="nip" placeholder="Isikan NIP / ID KTP" value="<?=$biodata["nip"]?>"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_karpeg" class="col-sm-3 col-form-label">No Seri Karpeg</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_karpeg" placeholder="Mis. : B3928293" value="<?=$biodata["no_karpeg"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat_gol" class="col-sm-3 col-form-label">Pangkat/Gol</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="pangkat_gol" placeholder="Mis : III/a" value="<?=$biodata["pangkat_gol"]?>" >
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="jabatan" placeholder="Perekayasa Pertama" value="<?=$biodata["jabatan"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tmt_jabatan" class="col-sm-3 col-form-label">TMT Jabatan</label>
                            <div class="col-sm-8">
                            <div class="input-group date" id="tmt_jabatan" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#tmt_jabatan" name ="tmt_jabatan" value="<?=$value_tmt_jabatan?>"/>
                                <div class="input-group-append" data-target="#tmt_jabatan" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instansi" class="col-sm-3 col-form-label">Instansi</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="instansi" placeholder="Instansi Bekerja" value="<?=$biodata["instansi"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_kerja" class="col-sm-3 col-form-label">Unit Kerja</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="unit_kerja" placeholder="Unit / Departemen" value="<?=$biodata["unit_kerja"]?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                        <label for="alamat_kantor" class="col-sm-3 col-form-label">Alamat Kantor</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" rows="2" name="alamat_kantor" placeholder="Isikan Alamat Unit Kerja"><?=$biodata["alamat_kantor"]?></textarea>
                            </div>
                        </div> 
                    </div>

                </div>
                    <div class="row mt-5">
                    <button type="submit" class="btn btn-primary" id="btn-update" style="position: absolute; bottom: 20px; right: 20px;" name="upd_datadiri">Save changes</button>
                    </div>  
            </form>
        



        </div><!-- /.card-body -->

    </div>
    

    </div>

</div>

</div>
</section>

<div class="modal fade" id="modal-foto">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Upload Foto Profil</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
    <div class="modal-body">

            <input type="text" class="form-control" name="id" placeholder="" value="<?=$biodata["id"]?>" hidden>
            
            <label for="foto" class="col-form-label">UPLOAD DISINI: </label>
             <br>       
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <br>
                      <p style="padding: 5px;font-style: italic;">(FILE : .jpeg, .jpg, .png dengan ukuran Max. 5MB)</p>
                    <!-- <input type="file" class="form-control" name="foto" placeholder="" readonly> -->
                    
                   
                
            
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info" name="updFoto">UPLOAD</button>
    </div>
    </form>
  

    </div>
  </div>
  <!-- /.modal-content -->
</div>



