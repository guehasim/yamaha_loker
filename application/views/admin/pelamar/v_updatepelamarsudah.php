<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Data Pelamar</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>admin/update_pelamar">
										
										<?php foreach ($pelamar->result() as $iden): ?>											
										
										<input type="hidden" name="id" value="<?php echo $iden->ID_Pelamar;?>">
										
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="email" id="first-name" required="required" class="form-control"  value="<?php echo $iden->email;?>">
											</div>
										</div>										
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK(sesuai KTP)<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="nik" id="first-name" required="required" class="form-control"  value="<?php echo $iden->nik_ktp;?>">
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama(sesuai KTP)<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="nama" id="first-name" required="required" class="form-control"  value="<?php echo $iden->nama_ktp;?>">
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="user" id="first-name" required="required" class="form-control"  value="<?php echo $iden->user;?>">
											</div>
										</div>										
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="pass" id="first-name" required="required" class="form-control"  value="<?php echo base64_decode($iden->pass);?>">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<?php endforeach ?>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-info"> Simpan</button>
												<a href="<?php echo base_url() ?>admin/data_pelamar_sudah"><button class="btn btn-primary" type="button">Kembali</button></a>
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
			