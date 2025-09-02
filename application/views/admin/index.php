
        <!-- [ Main Content ] start -->
        <div class="row">
          <!-- [ sample-page ] start -->
          <div class="col-xl-4 col-md-6">
            <div class="card bg-secondary-dark dashnum-card text-white overflow-hidden">
              <span class="round small"></span>
              <span class="round big"></span>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="avtar avtar-lg">
                      <i class="text-white ti ti-credit-card"></i>
                    </div>
                  </div>
                  
                </div>
                <span class="text-white d-block f-34 f-w-500 my-2">
                  Rp. <?php echo number_format($total_pendapatan, 0, ',', '.'); ?>
                  
                </span>
                <p class="mb-0 opacity-50">Total Pendapatan</p>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-md-6">
            <div class="card bg-primary-dark dashnum-card text-white overflow-hidden">
              <span class="round small"></span>
              <span class="round big"></span>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="avtar avtar-lg">
                      <i class="text-white ti ti-credit-card"></i>
                    </div>
                  </div>
                  
                </div>
                <span class="text-white d-block f-34 f-w-500 my-2">
                  Rp. <?php echo number_format($total_lembaga_belum_bayar, 0, ',', '.'); ?>
                  
                </span>
                <p class="mb-0 opacity-50">Total Lembaga Belum Dibayar</p>
              </div>
            </div>
          </div>
          
          <div class="col-xl-4 col-md-12">
            <div class="card bg-primary-dark dashnum-card dashnum-card-small text-white overflow-hidden">
              <span class="round bg-primary small"></span>
              <span class="round bg-primary big"></span>
              <div class="card-body p-3">
                <div class="d-flex align-items-center">
                  <div class="avtar avtar-lg">
                    <i class="text-white ti ti-user"></i>
                  </div>
                  <div class="ms-2">
                    <h4 class="text-white mb-1"><?= $jumlah_user_aktif ?></h4>
                    <p class="mb-0 opacity-75 text-sm">Jumlah User</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card dashnum-card dashnum-card-small overflow-hidden">
              <span class="round bg-warning small"></span>
              <span class="round bg-warning big"></span>
              <div class="card-body p-3">
                <div class="d-flex align-items-center">
                  <div class="avtar avtar-lg bg-light-warning">
                    <i class="text-warning ti ti-building"></i>
                  </div>
                  <div class="ms-2">
                    <h4 class="mb-1"><?= $jumlah_lembaga_aktif ?></h4>
                    <p class="mb-0 opacity-75 text-sm">Jumlah Lembaga</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-12 col-md-12">
            <div class="card">
              <div class="card-body">
              <!-- Lokasi Lembaga -->
                <div id="mapLokasiLembaga" style="height: 400px;"></div>
              </div>
            </div>
          </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
      