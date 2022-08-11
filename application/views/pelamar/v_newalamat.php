<style>
.marginbawah{
	margin-bottom: -6.5rem;
}
</style>
<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Input Alamat</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/simpan_alamat">

										<input type="hidden" name="id" value="<?php echo $this->session->userdata('ses_pelamar');?>">
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat(Sesuai KTP)<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="alamat_ktp" id="first-name" class="form-control" placeholder="Jln.xxxxxx" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-1 col-sm-6 ">
												<label class="marginbawah">RT</label>
												<input type="text" name="rt_ktp" id="first-name" class="form-control" required>
											</div>
											<div class="col-md-1 col-sm-6 ">
												<label class="marginbawah">RW</label>
												<input type="text" name="rw_ktp" id="first-name" class="form-control" required>
											</div>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kelurahan</label>
												<input type="text" name="kelurahan_ktp" id="first-name" class="form-control" required>
											</div>											
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kecamatan</label>
												<input type="text" name="kecamatan_ktp" id="first-name" class="form-control" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kota/Kabupaten</label>
												<input type="text" name="kota_ktp" id="first-name" class="form-control" required>
											</div>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kode Pos</label>
												<input type="text" name="kodepos_ktp" id="first-name" class="form-control" required>
											</div>
										</div>
										<br/>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat(Sesuai Domisili)<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="alamat_domisili" id="first-name" class="form-control" placeholder="Jln.xxxxxx" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-1 col-sm-6 ">
												<label class="marginbawah">RT</label>
												<input type="text" name="rt_domisili" id="first-name" class="form-control" required>
											</div>
											<div class="col-md-1 col-sm-6 ">
												<label class="marginbawah">RW</label>
												<input type="text" name="rw_domisili" id="first-name" class="form-control" required>
											</div>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kelurahan</label>
												<input type="text" name="kelurahan_domisili" id="first-name" class="form-control" required>
											</div>											
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kecamatan</label>
												<input type="text" name="kecamatan_domisili" id="first-name" class="form-control" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kota</label>
												<input type="text" name="kota_domisili" id="first-name" class="form-control" required>
											</div>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kode Pos</label>
												<input type="text" name="kodepos_domisili" id="first-name" class="form-control" required>
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
			