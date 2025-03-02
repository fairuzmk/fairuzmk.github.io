
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pips Calculator</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pips Calculator</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
       
      
       <!-- Main row -->
     <div class="row">
        <div class="col-md-6">
                                  
        <div class="card card-success shadow-lg">
            <div class="card-header">
              <h3 class="card-title">POSITION SIZE CALCULATOR</h3>

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
              <div class ="row">
                <div class="col-md-6">
                  <h3 style="margin-top: 20px;">INPUT</h3>
                  <hr>
                  <form id="positionSizeForm">
                    <label for="accountBalance" class="form-label">Account Balance (USD):</label>
                    <input type="number" id="accountBalance" class="form-control form-control-border border-width-2" required>

                    <label for="riskPercentage" class="form-label" style="margin-top: 15px">Risk Percentage (%):</label>
                    <input type="number" id="riskPercentage" class="form-control form-control-border border-width-2" required>

                    <label for="stopLossPips" class="form-label" style="margin-top: 15px">Stop Loss (Pips):</label>
                    <input type="number" id="stopLossPips" class="form-control form-control-border border-width-2" required>

                    <label for="pair" class="form-label" style="margin-top: 15px">Currency Pair:</label>
                    <select id="pair" class="form-control select2">
                      <option value="EURUSD">EUR/USD</option>
                      <option value="EURJPY">EUR/JPY</option>
                      <option value="EURGBP">EUR/GBP</option>
                      <option value="GBPUSD">GBP/USD</option>
                      <option value="GBPJPY">GBP/JPY</option>
                      <option value="AUDUSD">AUD/USD</option>
                      <option value="AUDJPY">AUD/JPY</option>
                      <option value="USDJPY">USD/JPY</option>
                      <option value="USDIDR">USD/IDR</option>
                      <option value="AUDNZD">AUD/NZD</option>
                      
                      <!-- Tambahkan pair lain jika diperlukan -->
                    </select>

                    <button type="button" class="btn btn-success" style="margin-top:20px;" onclick="calculatePositionSize()">Calculate</button>
                  </form>
                  </div>
                  <div class="col-md-6">
                    <div id="resultpips">
                      <h3>RESULT</h3>
                      <hr>
                      <h4>Amount at Risk</h4>
                      <p class="stopLossResult"><span id="stopLossAmount">0.00</span> USD</p>
                      <hr>
                      <h4>Position Size (Units)</h4>
                      <p class="positionResult"><span id="realSize">0.00</span></p>
                      <hr>
                      <h4>Standard Lots</h4>
                      <p class="positionResult"><span id="positionSizeResult">0.00</span></p>
                      <hr>
                      
                    </div>
                  </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

