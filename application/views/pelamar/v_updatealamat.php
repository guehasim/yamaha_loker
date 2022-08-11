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
									<h2>Form Update Alamat</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/update_alamat">

										<?php foreach ($alamat->result() as $al): ?>								

										<input type="hidden" name="id" value="<?php echo $al->ID_PelamarAlamat;?>">
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat(Sesuai KTP)<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="alamat_ktp" id="first-name" required="required" class="form-control" value="<?php echo $al->alamat_ktp;?>"  required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-1 col-sm-6 ">
												<label class="marginbawah">RT</label>
												<input type="text" name="rt_ktp" id="first-name" class="form-control" placeholder="RT" value="<?php echo $al->rt_ktp;?>" required>
											</div>
											<div class="col-md-1 col-sm-6 ">
												<label class="marginbawah">RW</label>
												<input type="text" name="rw_ktp" id="first-name" class="form-control" placeholder="RW" value="<?php echo $al->rw_ktp;?>" required>
											</div>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kelurahan</label>
												<input type="text" name="kelurahan_ktp" id="first-name" class="form-control" placeholder="Kelurahan" value="<?php echo $al->kelurahan_ktp;?>" required>
											</div>											
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kecamatan</label>
												<input type="text" name="kecamatan_ktp" id="first-name" class="form-control" placeholder="Kecamatan" value="<?php echo $al->kecamatan_ktp;?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kota</label>
												<input type="text" name="kota_ktp" id="first-name" class="form-control" placeholder="Kota" value="<?php echo $al->kota_ktp;?>" required>
											</div>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kode Pos</label>
												<input type="text" name="kodepos_ktp" placeholder="kode pos" id="first-name" class="form-control" value="<?php echo $al->kodepos_ktp;?>" required>
											</div>
										</div>
										<br/>										
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat(Sesuai Domisili)<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="alamat_domisili" id="first-name" class="form-control" placeholder="Jln.xxxxxx" value="<?php echo $al->alamat_domisili;?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-1 col-sm-6 ">
												<label class="marginbawah">RT</label>
												<input type="text" name="rt_domisili" id="first-name" class="form-control" placeholder="RT" value="<?php echo $al->rt_domisili;?>" required>
											</div>
											<div class="col-md-1 col-sm-6 ">
												<label class="marginbawah">RW</label>
												<input type="text" name="rw_domisili" id="first-name" class="form-control" placeholder="RW" value="<?php echo $al->rw_domisili;?>" required>
											</div>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kelurahan</label>
												<input type="text" name="kelurahan_domisili" id="first-name" class="form-control" placeholder="Kelurahan" value="<?php echo $al->kelurahan_domisili;?>" required>
											</div>											
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kecamatan</label>
												<input type="text" name="kecamatan_domisili" id="first-name" class="form-control" placeholder="Kecamatan" value="<?php echo $al->kecamatan_domisili;?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
											</label>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kota</label>
												<input type="text" name="kota_domisili" id="first-name" class="form-control" placeholder="Kota" value="<?php echo $al->kota_domisili;?>" required>
											</div>
											<div class="col-md-2 col-sm-6 ">
												<label class="marginbawah">Kode Pos</label>
												<input type="text" name="kodepos_domisili" placeholder="kode pos" id="first-name" class="form-control" value="<?php echo $al->kodepos_domisili;?>" required>
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
			