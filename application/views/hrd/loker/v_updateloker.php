<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Loker</h2>
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
									<?php foreach ($loker->result() as $u): ?>  
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>loker/update_loker">

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lowongan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="nama" id="first-name" required="required" class="form-control" value="<?php echo $u->lok_nama;?>">
											</div>
											<input type="hidden" name="id" id="first-name" required="required" class="form-control" value="<?php echo $u->lok_id;?>">
										</div>

										<?php
										if ($u->lok_status == 0) {?>
										 	<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Status<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="status">
													<option value="0">Aktif</option>
													<option value="1">Tidak Aktif</option>
												</select>
											</div>
											</div>
										 <?php } else{ ?>
										 	<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Status<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="status">
													<option value="1">Tidak Aktif</option>
													<option value="0">Aktif</option>
												</select>
											</div>
											</div>
										<?php }
										 ?>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-primary">Ubah</button>
												<a href="<?php echo base_url() ?>loker"><button class="btn btn-warning" type="button">Kembali</button></a>
											</div>
										</div>

									</form>
									  <?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- /page content -->