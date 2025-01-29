
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Aplikasi Konversi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Aplikasi Konversi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      
        <!-- Main row -->
      <div class="row">
        
                <!-- TABLE: APLIKASI KONVERSI SATUAN -->
            <div class="col-md-6">
                                      
                <div class="card card-warning shadow-lg">
                    <div class="card-header">
                      <h3 class="card-title">KONVERSI SATUAN</h3>

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
                        
                        <select id="kategori" class="form-control select2" style="width:100%;">
                            <option value="panjang">Panjang</option>
                            <option value="suhu">Suhu</option>
                            <option value="berat">Berat</option>
                            <option value="waktu">Waktu</option>
                            <option value="volume">Volume</option>
                            <option value="energi">Energi</option>
                            <option value="kecepatan">Kecepatan</option>
                            <option value="tekanan">Tekanan</option>
                        </select>
                        

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-5">
                        
                        <input type="number" id="inputValue" value="1" class="form-control form-control-border border-width-2" style="text-align: center; font-size: 25px; margin-bottom: 20px;">
                        <select id="fromUnit" class="form-control select2"></select>
                        
                        </div>
                            
                        <div class="col-md-2" style="text-align: center; font-size: 25px;"><span>=</span></div>
                        <div class="col-md-5">
                        <input type="text" id="outputValue" class = "form-control form-control-border border-width-2" style="text-align: center; font-size: 25px; margin-bottom: 20px;" readonly >
                        <select id="toUnit" class="form-control select2"></select>
                        </div>

                    </div>

                        
                        <div class="info-box bg-info" style="margin-top: 20px;">
                        <div class="info-box-content">
                            <span class="formula-label">Formula:</span>
                            <span id="formulaText">Pilih kategori untuk melihat formula</span>
                            </div>
                        </div>
                    
                    </div>
                    <!-- /.card-body -->

              </div>               
              
          </div>
          


      </div>
          <!-- /.col -->
    </div>
    </section>
      <!-- /.row -->
       
      

      
   
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
</div>


