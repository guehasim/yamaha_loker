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
									<center><h1>Lowongan Kerja</h1></center>
									<?php foreach ($status->result() as $st): ?>
									<?php if ($st->status_recruitment == 1): ?>
										<center><h2></h2></center>
										<br />

											<!-- start user projects -->
		                            <table class="data table table-striped no-margin">
		                              <thead>
		                                <tr>
		                                  <th>No</th>
		                                  <th>Bagian</th>
		                                  <th>Tanggal Berakhir</th>
		                                  <th>Aksi</th>
		                                </tr>
		                              </thead>
		                              <tbody>
		                              	<?php $no = 1; foreach ($loker->result() as $lok): ?>                              		
		                              	
		                                <tr>
		                                  <td><?php echo $no++;?></td>
		                                  <td><?php echo $lok->lok_nama;?></td>
		                                  <td><?php echo date('d F Y', strtotime($lok->lok_tgl_akhir));?></td>
		                                  <td>
		                                  	<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#aksi-info-<?php echo $lok->ID_Loker;?>"><i class="fa fa-user"></i> LAMAR</button>
		                                  </td>
		                                </tr>

		                                <!-- modal delete -->
				                        <div class="modal fade" id="aksi-info-<?php echo $lok->ID_Loker;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				                          <div class="modal-dialog">
				                            <div class="modal-content edit-dialog-modal">
				                              <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>pelamar/simpan_lamaran" method="post">    
				                                <?php
				                                  $this->load->helper("form");
				                                ?>
				                                <div class="modal-header">
				                                  <h4 class="modal-title" id="myModalLabel">LAMAR PEKERJAAN</h4>                                  
				                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                                </div>
				                                <div class="modal-body">
				                                  <input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_pelamar');?>">
				                                  <input type="hidden" name="id_loker" value="<?php echo $lok->ID_Loker;?>">
				                                  Apakah anda benar mau melamar di bagian "<?php echo $lok->lok_nama;?>" ini?
				                                </div>
				                                <div class="modal-footer">
				                                  <button type="submit" class="btn btn-primary">LAMAR</button>
				                                  <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
				                                </div>
				                              </form>
				                            </div>
				                            <!-- /.modal-content -->
				                          </div>
				                          <!-- /.modal-dialog -->
				                        </div>
				                        <!-- end modal delete-->

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