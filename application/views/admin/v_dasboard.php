

        <!-- page content -->
        <div class="right_col" role="main">
          
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users Admin</span>
              <div class="count green">
                <?php foreach ($admin as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total User HRD</span>
              <div class="count green">
                <?php foreach ($hrd as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total List Pelamar</span>
              <div class="count green">
                <?php foreach ($pelamar as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total List Lowongan</span>
              <div class="count green">
                <?php foreach ($loker as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pelamar</span>
              <div class="count green">
                <?php foreach ($hitung_pelamar as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tahap Administrasi</span>
              <div class="count green">
                <?php foreach ($hitung_administrasi as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tahap Interview</span>
              <div class="count green">
                <?php foreach ($hitung_interview as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tahap Psikotes</span>
              <div class="count green">
                <?php foreach ($hitung_interview as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tahap MCU</span>
              <div class="count green">
                <?php foreach ($hitung_mcu as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tahap Interview Lanjutan</span>
              <div class="count green">
                <?php foreach ($hitung_interview_lanjutan as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tahap Hire/Waiting Join</span>
              <div class="count green">
                <?php foreach ($hitung_hire as $ad): ?>
                  <?php echo $ad->total; ?>
                <?php endforeach ?>
              </div>
              <span class="count_bottom"></span>
            </div>              
          </div>
        </div>
          <!-- /top tiles -->

        </div>
        <!-- /page content -->
