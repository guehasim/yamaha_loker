<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-22 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Input Ukuran</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/simpan_ukuran">

										<input type="hidden" name="id" value="<?php echo $this->session->userdata('ses_pelamar');?>">

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tinggi Badan<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<input type="text" name="tinggi_cm" id="first-name" required="required" class="form-control" placeholder="Centimeter" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Berat Badan<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<input type="text" name="berat_kg" id="first-name" required="required" class="form-control" placeholder="Kilogram" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ukuran Baju<span class="required">*</span>
											</label>											
											<div class="col-md-2 col-sm-3 ">
												<select class="form-control" name="baju" required>
													<option ></option>
													<option value="S">S</option>
													<option value="M">M</option>													
													<option value="L">L</option>													
													<option value="XL">XL</option>													
													<option value="XXL">XXL</option>													
													<option value="XXXL">XXXL</option>
												</select>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ukuran Sepatu<span class="required">*</span>
											</label>

											<div class="col-md-1 col-sm-6 ">
												<input type="text" name="sepatu" id="first-name" required="required" class="form-control" placeholder="Kilogram" required>
											</div>
											<label class="col-form-label"><h4> Ex.: 36,37,38 </h4></label>
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
			