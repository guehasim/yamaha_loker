<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Pengalaman Kerja</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/update_pengalaman">

										<?php foreach ($pengalaman->result() as $peng): ?>											
										
										<input type="hidden" name="id" value="<?php echo $peng->ID_PelamarPengalaman;?>">
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Perusahaan<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="perusahaan" id="first-name" required="required" class="form-control" value="<?php echo $peng->peng_perusahaan;?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bidang<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="bidang" id="first-name" required="required" class="form-control" value="<?php echo $peng->peng_bidang;?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tahun<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-6 ">
												<input type="text" name="tahun" id="first-name" required="required" class="form-control" value="<?php echo $peng->peng_tahun;?>" required>
											</div>
										</div>
										<?php endforeach ?>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-info">Simpan</button>
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
			