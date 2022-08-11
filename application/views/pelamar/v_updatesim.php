<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Data Dokumen Kendaraan</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/update_sim">
										<?php foreach ($sim->result() as $pes): ?>
										
										<input type="hidden" name="id_pelamar" value="<?php echo $pes->ID_Pelamar;?>">
										<input type="hidden" name="id" value="<?php echo $pes->ID_SIM;?>">
										<?php foreach ($pertanyaan->result() as $per): ?>										
			
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">SIM
											</label>
											<div class="col-md-3 col-sm-6 ">
												<?php
												if ($per->jwb_sim == 1) {
												 	$var = "SIM A";
												 } elseif($per->jwb_sim == 2){
												 	$var = "SIM B";
												 } elseif($per->jwb_sim == 3){
												 	$var = "SIM C";
												 }else{
												 	$var = "Tidak Memiliki SIM";
												 }
												 ?>
													<input type="text" id="first-name"  class="form-control" value="$var" disabled>
												
											</div>
										</div>
										<?php endforeach ?>	
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. SIM<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<input type="text" name="no_sim" id="first-name" required="required" class="form-control" value="<?php echo $pes->NO_SIM;?>">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Simpan</button>
												<a href="<?php echo base_url() ?>pelamar/tampil_kelengkapan"><button class="btn btn-primary" type="button">Kembali</button></a>
											</div>
										</div>	
										<?php endforeach ?>

									</form>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- /page content -->
