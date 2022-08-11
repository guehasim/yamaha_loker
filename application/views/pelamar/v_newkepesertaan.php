<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Input Data Kepesetaan</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/simpan_kepesertaan">

										<input type="hidden" name="id" value="<?php echo $this->session->userdata('ses_pelamar');?>">
			
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. BPJS Kesehatan<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<input type="number" name="bpjs_kesehatan" id="first-name"  class="form-control" required> 
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. BPJS Ketenagakerjaan<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<input type="number" name="bpjs_kerja" id="first-name"  class="form-control" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. NPWP<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<input type="number" name="npwp" id="first-name"  class="form-control" required>
											</div>
										</div>							


										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Simpan</button>
												<a href="<?php echo base_url() ?>pelamar/tampil_kelengkapan"><button class="btn btn-primary" type="button">Kembali</button></a>
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
			