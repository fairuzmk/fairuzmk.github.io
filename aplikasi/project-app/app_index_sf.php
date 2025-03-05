
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Indeks Slagging dan Fouling</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Indeks Slagging dan Fouling</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


<!-- Modal untuk memilih data dari database -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ambil Data Dari Database</h4>
                <button type="button" class="close" onclick="closeModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="sampel-dropdown" class="col-sm-3 col-form-label">Pilih Data</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" id="sampel-dropdown" onchange="previewData()">
                                <option value="">-- Pilih Data --</option>
                                <?php
                                $sql = "SELECT * FROM tb_fuel_char";
                                $result = $koneksi->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["id_sampel"] . "' 
                                              data-nama_s='" . $row["nama_sampel"] . "'
                                              data-kode_s='" . $row["kode_sampel"] . "'
                                              data-jenis ='" . $row["jenis_sampel"] . "'
                                              data-total_m='" . $row["total_moisture"] . "'
                                              data-i_mois='" . $row["i_moist"] . "'
                                              data-ash_co='" . $row["ash_content"] . "'
                                              data-volati='" . $row["volatile_matter"] . "'
                                              data-fixed_='" . $row["fixed_carbon"] . "'
                                              data-total_s='" . $row["total_sulfur"] . "'
                                              data-GCV_ad='" . $row["GCV_adb"] . "'
                                              data-GCV_ar='" . $row["GCV_ar"] . "'
                                              data-GCV_db='" . $row["GCV_db"] . "'
                                              data-hgi='" . $row["hgi"] . "'
                                              data-carbon='" . $row["carbon"] . "'
                                              data-hydrog='" . $row["hydrogen"] . "'
                                              data-nitrog='" . $row["nitrogen"] . "'
                                              data-oxygen='" . $row["oxygen"] . "'
                                              data-dt_red='" . $row["dt_reducing"] . "'
                                              data-st_red='" . $row["st_reducing"] . "'
                                              data-ht_red='" . $row["ht_reducing"] . "'
                                              data-ft_red='" . $row["ft_reducing"] . "'
                                              data-dt_oxi='" . $row["dt_oxidizing"] . "'
                                              data-st_oxi='" . $row["st_oxidizing"] . "'
                                              data-ht_oxi='" . $row["ht_oxidizing"] . "'
                                              data-ft_oxi='" . $row["ft_oxidizing"] . "'
                                              data-SiO2='" . $row["SiO2"] . "'
                                              data-Al2O='" . $row["Al2O3"] . "'
                                              data-Fe2O='" . $row["Fe2O3"] . "'
                                              data-CaO='" . $row["CaO"] . "'
                                              data-MgO='" . $row["MgO"] . "'
                                              data-TiO2='" . $row["TiO2"] . "'
                                              data-Na2O='" . $row["Na2O"] . "'
                                              data-K2O='" . $row["K2O"] . "'
                                              data-Mn3O='" . $row["Mn3O4"] . "'
                                              data-P2O5='" . $row["P2O5"] . "'
                                              data-SO3='" . $row["SO3"] . "'
                                              data-total_c='" . $row["total_chlorine"] . "'
                                              >"
                                              . $row["nama_sampel"] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Tidak ada data</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Preview Data -->

                    <h4>Preview Data</h4>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Sampel</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="preview-jenis" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Sampel</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="preview-nama_s" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kode Sampel</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="preview-kode_s" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Total Moisture</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="preview-total_m" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Inherent Moisture</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="preview-i_mois" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Ash Content</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="preview-ash_co" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nilai Kalor adb</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="preview-gcv_ad" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="closeModal()">Close</button>
                <button type="button" class="btn btn-info" onclick="pilihData(event)">Pilih Data</button>
            </div>
        </div>
    </div>
</div>

<script src="plugins/inputdatachar.js"></script>


      <!-- Main row -->
      <div class="row">
        
            
            <!-- TABLE: ASH ANALYSIS -->
            <div class="col-md-4">
                                      
              <div class="card card-info shadow-lg">
                  <div class="card-header">
                    <h3 class="card-title">ASH CHARACTERISTICS</h3>

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

                  <form method="POST">
                  <button type="button" class="btn btn-info" data-toggle="modal" onclick="bukaModal()">
                        Ambil Data
                        </button>
                        <br></br>

                  <div class="form-group row">
                         <label for="nama-sampel" class="col-sm-6 col-form-label">Nama Sampel</sub></label>
                         <div class="col-sm-6">
                           <input type="text" class="form-control" id="input-nama" placeholder="Masukkan Nama Sampel" required>
                         </div>
                         
                  </div>
                  <div class="form-group row">
                    <label for="jenis-sampel" class="col-sm-6 col-form-label">Jenis Sampel</label>
                    <div class="col-sm-6">
                    <select class="form-control select2" id="input-jenis" required>
                    <option value="Batubara">Batubara</option>
                    <option value="Biomassa">Biomassa</option>
                    <option value="Campuran">Campuran</option>
                    <option value="Lainnya">Lainnya</option>
                    
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kode-sampel" class="col-sm-6 col-form-label">Kode Sampel</label>
                    <div class="col-sm-6">
                           <input type="text" class="form-control" id="input-kode" placeholder="Kode Sampel"  required>
                         </div>
                  </div>
                  <hr>
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist" style="margin-bottom: 10px;">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-proximate" role="tab" aria-controls="proximate" aria-selected="true">Proximate</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-ultimate" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Ultimate</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-AFT" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">AFT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-ash" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Ash Analysis</a>
                  </li>
                  </ul>
                  <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-proximate" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                    <div class="form-group row">
                         <label for="total-moisture" class="col-sm-6 col-form-label">Total Moisture</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="t-moist" placeholder="in ar" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div> 
                      <div class="form-group row">
                         <label for="inherent-moisture" class="col-sm-6 col-form-label">Inherent Moisture</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="i-moist" placeholder="in adb" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div> 
                      <div class="form-group row">
                         <label for="ash-content" class="col-sm-6 col-form-label">Ash Content</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="ash-content" placeholder="in adb" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>
                      <div class="form-group row">
                         <label for="volatile-matter" class="col-sm-6 col-form-label">Volatile Matter</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="volatile-matter" placeholder="in adb" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div> 
                      <div class="form-group row">
                         <label for="fix-carbon" class="col-sm-6 col-form-label">Fixed Carbon</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="fix-carbon" placeholder="in adb" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>
                      <div class="form-group row">
                         <label for="total-sulfur" class="col-sm-6 col-form-label">Total Sulfur</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="total-sulfur" placeholder="in adb" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>
                      <div class="form-group row">
                         <label for="gross-cv" class="col-sm-6 col-form-label">Nilai Kalor</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="gross-cv" placeholder="in adb" >
                         </div>
                         <p style="padding: 5px;">kcal</p>
                      </div>

                      <div class="form-group row">
                         <label for="gross-cv" class="col-sm-6 col-form-label">Nilai Kalor (ar)</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="gross-cv-ar" placeholder="in ar" readonly>
                         </div>
                         <p style="padding: 5px;">kcal</p>
                      </div>

                      <div class="form-group row">
                         <label for="gross-cv" class="col-sm-6 col-form-label">Nilai Kalor (db)</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="gross-cv-db" placeholder="in db" readonly>
                         </div>
                         <p style="padding: 5px;">kcal</p>
                      </div>

                      <div class="form-group row">
                         <label for="total-chlorine" class="col-sm-6 col-form-label">Total Klorin</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="total-chlorine" placeholder="in adb" >
                         </div>
                         <p style="padding: 5px;">ppm</p>
                      </div>
                    </div>
                      


                    <div class="tab-pane fade" id="custom-content-below-ultimate" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                      <div class="form-group row">
                          <label for="carbon" class="col-sm-6 col-form-label">Carbon</sub></label>
                          <div class="col-sm-4">
                            <input type="number" class="form-control" id="carbon" placeholder="in adb" >
                          </div>
                          <p style="padding: 5px;">%</p>
                        </div>
                        <div class="form-group row">
                          <label for="hydrogen" class="col-sm-6 col-form-label">Hydrogen</sub></label>
                          <div class="col-sm-4">
                            <input type="number" class="form-control" id="hydrogen" placeholder="in adb" >
                          </div>
                          <p style="padding: 5px;">%</p>
                        </div>
                        <div class="form-group row">
                          <label for="nitrogen" class="col-sm-6 col-form-label">Nitrogen</sub></label>
                          <div class="col-sm-4">
                            <input type="number" class="form-control" id="nitrogen" placeholder="in adb" >
                          </div>
                          <p style="padding: 5px;">%</p>
                        </div>
                        <div class="form-group row">
                          <label for="oxygen" class="col-sm-6 col-form-label">Oxygen</sub></label>
                          <div class="col-sm-4">
                            <input type="number" class="form-control" id="oxygen" placeholder="in adb" readonly>
                          </div>
                          <p style="padding: 5px;">%</p>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="custom-content-below-AFT" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                      <!-- AFT Reducing -->
                       <h4>Reducing</h4>
                       <hr>
                      <div class="form-group row">
                         <label for="dt-reducing" class="col-sm-6 col-form-label">Deformation</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="dt-reducing" placeholder="Reducing">
                         </div>
                         <p style="padding: 5px;">&deg;C</p>
                      </div>
                      <div class="form-group row">
                         <label for="st-reducing" class="col-sm-6 col-form-label">Softening</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="st-reducing" placeholder="Reducing">
                         </div>
                         <p style="padding: 5px;">&deg;C</p>
                      </div>
                      <div class="form-group row">
                         <label for="ht-reducing" class="col-sm-6 col-form-label">Hemisphere</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="ht-reducing" placeholder="Reducing">
                         </div>
                         <p style="padding: 5px;">&deg;C</p>
                      </div>
                      <div class="form-group row">
                         <label for="ft-reducing" class="col-sm-6 col-form-label">Flow</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="ft-reducing" placeholder="Reducing">
                         </div>
                         <p style="padding: 5px;">&deg;C</p>
                      </div>
                      <br>
                      <h4>Oxidizing</h4>
                      <hr>
                      <!-- AFT Oxidizing -->
                      <div class="form-group row">
                         <label for="dt-oxidizing" class="col-sm-6 col-form-label">Deformation</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="dt-oxidizing" placeholder="Oxidizing">
                         </div>
                         <p style="padding: 5px;">&deg;C</p>
                      </div>
                      <div class="form-group row">
                         <label for="st-oxidizing" class="col-sm-6 col-form-label">Softening</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="st-oxidizing" placeholder="Oxidizing">
                         </div>
                         <p style="padding: 5px;">&deg;C</p>
                      </div>
                      <div class="form-group row">
                         <label for="ht-oxidizing" class="col-sm-6 col-form-label">Hemisphere</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="ht-oxidizing" placeholder="Oxidizing">
                         </div>
                         <p style="padding: 5px;">&deg;C</p>
                      </div>
                      <div class="form-group row">
                         <label for="ft-oxidizing" class="col-sm-6 col-form-label">Flow</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="ft-oxidizing" placeholder="Oxidizing">
                         </div>
                         <p style="padding: 5px;">&deg;C</p>
                      </div>

                    </div>
                    <div class="tab-pane fade" id="custom-content-below-ash" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                      <!-- Ash Analysis -->
                     <div class="form-group row">
                         <label for="SiO2" class="col-sm-6 col-form-label">SiO<sub>2</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="SiO2" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="Al2O3" class="col-sm-6 col-form-label">Al<sub>2</sub>O<sub>3</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="Al2O3" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="Fe2O3" class="col-sm-6 col-form-label">Fe<sub>2</sub>O<sub>3</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="Fe2O3" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="CaO" class="col-sm-6 col-form-label">CaO</label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="CaO" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  

                      <div class="form-group row">
                         <label for="MgO" class="col-sm-6 col-form-label">MgO</label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="MgO" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="TiO2" class="col-sm-6 col-form-label">TiO<sub>2</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="TiO2" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="Na2O" class="col-sm-6 col-form-label">Na<sub>2</sub>O</label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="Na2O" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="K2O" class="col-sm-6 col-form-label">K<sub>2</sub>O</label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="K2O" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="Mn3O4" class="col-sm-6 col-form-label">Mn<sub>3</sub>O<sub>4</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="Mn3O4" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="P2O5" class="col-sm-6 col-form-label">P<sub>2</sub>O<sub>5</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="P2O5" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                      <div class="form-group row">
                         <label for="SO3" class="col-sm-6 col-form-label">SO<sub>3</sub></label>
                         <div class="col-sm-4">
                           <input type="number" class="form-control" id="SO3" placeholder="in ash" >
                         </div>
                         <p style="padding: 5px;">%</p>
                      </div>  
                  </div>
                  </div>
                      
                      

                      
                      

                       
                    
                 
                   <button type="button" class="btn btn-warning" style="float: left;">Masukkan ke Database</button>
                   <button type="button" onclick="tampilkanDataRingkasan()" class="btn btn-info " style="float: right;">Hitung Saja</button>
                </form>
                </div><!-- /.card-body -->
                  

              </div>               
            
            </div>
            <!-- TABLE: ASH CHARACTERISTICS -->
                                 

            <!-- TABLE: KALKULASI INDEKS SLAGGING FOULING -->
            <div class="col-md-4">
                                      
              <div class="card card-primary shadow-lg">
                  <div class="card-header">
                    <h3 class="card-title">INDEKS SLAGGING FOULING</h3>

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
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                          <th  style="width: 5%;">No</th>
                          <th>Parameter</th>
                          <th>Hasil</th>
                          <th>Skor</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        

                        <tr>
                          <td>1.</td>
                          <td>Base to Acid</td>
                          <td><p id="result_ba" style="text-align: center;"></p></td>
                          <td id="skor-ba" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>2.</td>
                          <td>Silica Ratio</td>
                          <td><p id="result_si_ratio" style="text-align: center;"></p></td>
                          <td id="skor-sr" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>3.</td>
                          <td>Slagging Index</td>
                          <td><p id="result_slagging_index" style="text-align: center;"></p></td>
                          <td id="skor-slag-index" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>4.</td>
                          <td>Fussibility</td>
                          <td><p id="result_fusibility" style="text-align: center;"></p></td>
                          <td id="skor-fusibility" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>5.</td>
                          <td>Fe<sub>2</sub>O<sub>3</sub> / CaO</td>
                          <td><p id="result_ironperca" style="text-align: center;"></p></td>
                          <td id="skor-ironperca" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>6.</td>
                          <td>Percentage of Fe<sub>2</sub>O<sub>3</sub></td>
                          <td><p id="result_iron" style="text-align: center;"></p></td>
                          <td id="skor-iron" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>7.</td>
                          <td>Fe<sub>2</sub>O<sub>3</sub> + CaO</td>
                          <td><p id="result_ironplusca" style="text-align: center;"></p></td>
                          <td id="skor-ironplusca" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>8.</td>
                          <td>SiO<sub>2</sub> + Al<sub>2</sub>O<sub>3</sub></td>
                          <td><p id="result_siperal" style="text-align: center;"></p></td>
                          <td id="skor-siperal" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>9.</td>
                          <td>Composite Index</td>
                          <td><p id="result_composite" style="text-align: center;"></p></td>
                          <td id="skor-composite" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td colspan="3" style="text-align:right; font-weight: bold;" class="bg-gradient-secondary">TOTAL SLAGGING</td>
                          <td id="total-slagging" style="text-align: center;">undefined</td>
                        </tr>

                        <tr>
                          <td>1.</td>
                          <td>Fouling Index</td>
                          <td><p id="result_fi" style="text-align: center;"></p></td>
                          <td id="skor-fi" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>2.</td>
                          <td>Na2O in Ash</td>
                          <td><p id="result_na_ash" style="text-align: center;"></p></td>
                          <td id="skor-na-ash" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>3.</td>
                          <td>Total Alkali</td>
                          <td><p id="result_total_alkali" style="text-align: center;"></p></td>
                          <td id="skor-total-alkali" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>4.</td>
                          <td>Alkali to Silika</td>
                          <td><p id="result_alkali_to_silica" style="text-align: center;"></p></td>
                          <td id="skor-alkali-to-silica" style="text-align: center;">undefined</td>
                          
                        </tr>

                                     
                        <tr>
                          <td colspan="3" style="text-align:right; font-weight: bold;" class="bg-gradient-secondary">TOTAL SLAGGING</td>
                          <td id="total-fouling" style="text-align: center;">undefined</td>
                        </tr>


                        <tr>
                          <td>1.</td>
                          <td>Chlorine</td>
                          <td><p id="result_total_klorin" style="text-align: center;"></p></td>
                          <td id="skor-total-klorin" style="text-align: center;">undefined</td>
                          
                        </tr>

                        <tr>
                          <td>2.</td>
                          <td>Sulfur / Chlorine</td>
                          <td><p id="result_spercl" style="text-align: center;"></p></td>
                          <td id="skor-spercl" style="text-align: center;">undefined</td>
                          
                        </tr>

                                                            
                        <tr>
                          <td colspan="3" style="text-align:right; font-weight: bold;" class="bg-gradient-secondary">TOTAL SLAGGING</td>
                          <td id="total-corrosion" style="text-align: center;">undefined</td>
                        </tr>
                        </tbody>
                        
                      </table>
                  </div>
                  <!-- /.card-body -->

              </div>               
            
            </div>
        

             <!-- BAR CHART -->
            <div class ="col-md-4">
             
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Detail Lainnya</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <h4>Ash Fusion Temperature</h4>
                <hr>
                <div class="chart">
                <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>

                <h4>RINGKASAN</h4>
                <hr>
                <section id="ringkasan">
                <div class = "row">
                  <div class="col-sm-3">
                    <p style="font-weight:bold;">Jenis Sampel</p>
                  </div>
                  <div class="col-sm-1">
                    <p style="font-weight:bold;">:</p>
                  </div>
                  <div class="col-sm-8">
                    <p id="jenis-sampel">Jenis Sampel disini</p>
                  </div>
                </div>
                <div class = "row">
                  <div class="col-sm-3">
                    <p style="font-weight:bold;">Nama Sampel</p>
                  </div>
                  <div class="col-sm-1">
                    <p style="font-weight:bold;">:</p>
                  </div>
                  <div class="col-sm-8">
                    <p id="nama-sampel">Nama Sampel disini</p>
                  </div>
                </div>

                <div class = "row">
                  <div class="col-sm-3">
                    <p style="font-weight:bold;">Kode Sampel</p>
                  </div>
                  <div class="col-sm-1">
                    <p style="font-weight:bold;">:</p>
                  </div>
                  <div class="col-sm-8">
                    <p id="kode-sampel">Kode Sampel disini</p>
                  </div>
                </div>
                
                <div class = "row">
                  <p id="info-paragraf"></p>
                </div>
                </section>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>

      </div>   <!-- /.row -->
    </div><!-- /.container -->
    </section>
      
       
      

      
   
    <!-- /.content -->
  
  <!-- /.content-wrapper -->





 

<script>
MathJax = {
  tex: {
    inlineMath: [['$', '$'], ['\\(', '\\)']]
  }
};
</script>
<script id="MathJax-script" async
  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
</script>

