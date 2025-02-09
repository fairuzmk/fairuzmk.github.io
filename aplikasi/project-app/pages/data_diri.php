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
            <form class="form-horizontal" method="POST" action="../add/input_datadiri.php">
                <div class="row">    
                    <div class="col-md-6">
                        
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="" value="Nama Anda Disini" readonly>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                            <select class="form-control select2" name="kelamin" required>
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                            <option>Tidak Tahu</option>
                           
                            
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempatlahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="tempatlahir" placeholder="Isikan Kota Lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                            <div class="input-group date" id="tgl_lahir" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#tgl_lahir"/>
                                <div class="input-group-append" data-target="#tgl_lahir" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            </div>
                        </div> 
                        <div class="form-group row">
                        <label for="alamat_rumah" class="col-sm-3 col-form-label">Alamat Rumah</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" rows="2" name="alamat_rumah" placeholder="Isikan Alamat Domisili"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="contact_hp" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="contact_hp" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="foto" class="col-sm-3 col-form-label">Foto Anda</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="foto" placeholder="" readonly>
                            </div>
                        </div>  
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="nip" class="col-sm-3 col-form-label">NIP/ID</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="nip" placeholder="Isikan NIP / ID KTP" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_karpeg" class="col-sm-3 col-form-label">No Seri Karpeg</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_karpeg" placeholder="Nama Jurnal/Publisher">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat_gol" class="col-sm-3 col-form-label">Pangkat/Gol</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="pangkat_gol" placeholder="Mis : III/a" >
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="jabatan" placeholder="Perekayasa Pertama" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tmt_jabatan" class="col-sm-3 col-form-label">TMT Jabatan</label>
                            <div class="col-sm-8">
                            <div class="input-group date" id="tmt_jabatan" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#tmt_jabatan"/>
                                <div class="input-group-append" data-target="#tmt_jabatan" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instansi" class="col-sm-3 col-form-label">Instansi</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="instansi" placeholder="Instansi Bekerja">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_kerja" class="col-sm-3 col-form-label">Unit Kerja</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="unit_kerja" placeholder="Unit / Departemen">
                            </div>
                        </div> 
                        <div class="form-group row">
                        <label for="alamat_kantor" class="col-sm-3 col-form-label">Alamat Kantor</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" rows="2" name="alamat_kantor" placeholder="Isikan Alamat Unit Kerja"></textarea>
                            </div>
                        </div> 
                    </div>

                </div>
                    <div class="row mt-5">
                    <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 20px; right: 20px;">Save changes</button>
                    </div>  
            </form>
        
        </div><!-- /.card-body -->

    </div>
    

    </div>

</div>

</div>
</section>
</div>
<!-- /.content -->
