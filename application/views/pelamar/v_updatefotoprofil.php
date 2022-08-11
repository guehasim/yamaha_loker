<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Foto Profil</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>pelamar/updatefoto">
																			
										<input type="hidden" name="id" value="<?php echo $this->session->userdata('ses_pelamar');?>">
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Foto Profil<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">

												<?php foreach ($identitas->result() as $iden): ?>
												<img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/<?=$iden->image?>" width="220" height="220">
												<?php endforeach ?>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" name="image"  required>
												</br>
												<p>Format Gambar :</br>
												1.Format Gambar gif | jpg | png | jpeg</br>
												2.Resolusi Gambar maksimal 600X600 Pixel</br>
												3.Ukuran Maksimal 2MB</p>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Simpan</button>
												<a href="<?php echo base_url() ?>pelamar/profil"><button class="btn btn-primary" type="button">Kembali</button></a>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- /page content -->
			