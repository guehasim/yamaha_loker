<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
          <div>
            <?php echo $this->session->flashdata('msg'); ?>
          </div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_content">
									<br />
									<br />
									<center><h1>Selamat Datang Pelamar Kerja di PT. Yamaha</h1></center>
                  <?php foreach ($status->result() as $st): ?>
                    <?php if ($st->status_recruitment == 1): ?>
                      <center><h2>Tracking Proses Lamaran</h2></center>
                      <br />

                      <!-- start user projects -->
                                <table class="data table table-striped no-margin">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Bagian</th>
                                      <th>Tanggal Melamar</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $no = 1; foreach ($tracking->result() as $tr): ?>                               
                                  
                                    <tr>
                                      <td>1</td>
                                      <td><?php echo $tr->lok_nama; ?></td>
                                      <td><?php echo date('d F Y', strtotime($tr->TGL_Lamar));?></td>
                                      <td>
                                        <?php if ($tr->status_Join == 1 && $tr->status_aktif == 1): ?>
                                          <h5><span class="badge badge-info">Pelamar</span></h5>
                                        <?php elseif($tr->status_Join == 2 && $tr->status_aktif == 1): ?>
                                          <h5><span class="badge badge-info">Lolos Tahap Administrasi</span></h5>
                                        <?php elseif($tr->status_Join == 3 && $tr->status_aktif == 1): ?>
                                          <h5><span class="badge badge-info">Lolos Tahap Interview</span></h5>
                                        <?php elseif($tr->status_Join == 4 && $tr->status_aktif == 1): ?>
                                          <h5><span class="badge badge-info">Lolos Tahap Psikotes</span></h5>
                                        <?php elseif($tr->status_Join == 5 && $tr->status_aktif == 1): ?>
                                          <h5><span class="badge badge-info">Lolos Tahap MCU</span></h5>
                                        <?php elseif($tr->status_Join == 6 && $tr->status_aktif == 1): ?>
                                          <h5><span class="badge badge-info">Lolos Tahap Interview Lanjutan</span></h5>
                                        <?php elseif($tr->status_Join == 7 && $tr->status_aktif == 1): ?>
                                          <h5><span class="badge badge-info">Lolos Tahap Hire</span></h5>
                                        <?php elseif($tr->status_Join == 8 && $tr->status_aktif == 1): ?>
                                          <h5><span class="badge badge-success">Karyawan</span></h5>
                                          <?php foreach ($cek_data->result() as $id): ?>
                                          <?php if ($id->ID_Kepesertaan == NULL && $id->ID_SIM == NULL && $id->ID_Keluarga == NULL && $id->ID_Darurat == NULL): ?>
                                            <a href="<?php echo base_url() ?>pelamar/tampil_kelengkapan"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-newspaper-o"></i> Lengkapi Data</button></a>
                                          <?php else: ?>
                                            <a href="<?php echo base_url() ?>pelamar/tampil_kelengkapan"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View Data</button></a>
                                          <?php endif ?>                                            
                                          <?php endforeach ?>

                                        <?php else: ?>
                                          <h5><span class="badge badge-danger">Gagal</span></h5>
                                        <?php endif ?>
                                      </td>
                                    </tr>

                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                                <!-- end user projects -->
                      
                    <?php else: ?>
                    <center><h2>Mohon maaf untuk saat ini Rekruitment masih ditutup</h2></center>                      
                    <?php endif ?>
                    
                  <?php endforeach ?>
									

							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- /page content -->