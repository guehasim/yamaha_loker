<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Input Pendidikan</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/update_pendidikan">

										<?php foreach ($pendidikan->result() as $pen): ?>										

										<input type="hidden" name="id" value="<?php echo $pen->ID_PelamarPendidikan ?>">
			
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pendidikan<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($pen->pendidikan == 0) {
													 	$no 	= "selected";
													 	$SD 	= "";
													 	$SMP 	= "";
													 	$SMA 	= "";
													 	$D3 	= "";
													 	$S1 	= "";
													 	$S2 	= "";
													 	$S3 	= "";
													 }elseif($pen->pendidikan == 1) {
													 	$no 	= "";
													 	$SD 	= "selected";
													 	$SMP 	= "";
													 	$SMA 	= "";
													 	$D3 	= "";
													 	$S1 	= "";
													 	$S2 	= "";
													 	$S3 	= "";
													 }elseif($pen->pendidikan == 2){
													 	$no 	= "";
													 	$SD 	= "";
													 	$SMP 	= "selected";
													 	$SMA 	= "";
													 	$D3 	= "";
													 	$S1 	= "";
													 	$S2 	= "";
													 	$S3 	= "";
													 }elseif($pen->pendidikan == 3){
													 	$no 	= "";
													 	$SD 	= "";
													 	$SMP 	= "";
													 	$SMA 	= "selected";
													 	$D3 	= "";
													 	$S1 	= "";
													 	$S2 	= "";
													 	$S3 	= "";
													 }elseif($pen->pendidikan == 4){
													 	$no 	= "";
													 	$SD 	= "";
													 	$SMP 	= "";
													 	$SMA 	= "";
													 	$D3 	= "selected";
													 	$S1 	= "";
													 	$S2 	= "";
													 	$S3 	= "";
													 }elseif($pen->pendidikan == 5){
													 	$no 	= "";
													 	$SD 	= "";
													 	$SMP 	= "";
													 	$SMA 	= "";
													 	$D3 	= "";
													 	$S1 	= "selected";
													 	$S2 	= "";
													 	$S3 	= "";
													 }elseif($pen->pendidikan == 6){
													 	$no 	= "";
													 	$SD 	= "";
													 	$SMP 	= "";
													 	$SMA 	= "";
													 	$D3 	= "";
													 	$S1 	= "";
													 	$S2 	= "selected";
													 	$S3 	= "";
													 }elseif($pen->pendidikan == 7){
													 	$no 	= "";
													 	$SD 	= "";
													 	$SMP 	= "";
													 	$SMA 	= "";
													 	$D3 	= "";
													 	$S1 	= "";
													 	$S2 	= "";
													 	$S3 	= "selected";
													 }
													  else{

													 }
													 ?>
													<select class="form-control" name="pendidikan" required>
														<option value="0" <?php echo $no;?> >Tidak Sekolah</option>
														<option value="1" <?php echo $SD;?> >SD/MI</option>
														<option value="2" <?php echo $SMP;?> >SMP/MTs</option>
														<option value="3" <?php echo $SMA;?> >SMA/SMK</option>
														<option value="4" <?php echo $D3;?> >D3</option>
														<option value="5" <?php echo $S1;?> >S1</option>
														<option value="6" <?php echo $S2;?> >S2</option>
														<option value="7" <?php echo $S3;?> >S3</option>
													</select>											
												</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Asal Sekolah/Universitas<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="asal_pendidikan" id="first-name" required="required" class="form-control" value="<?php echo $pen->asal_pendidikan; ?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jurusan<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="jurusan" id="first-name" required="required" class="form-control" value="<?php echo $pen->jurusan;?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kota Asal Sekolah<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="tempat_pendidikan" id="first-name" required="required" class="form-control" value="<?php echo $pen->tempat_pendidikan;?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tahun Masuk<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-6 ">
												<input type="text" name="masuk" id="first-name" required="required" class="form-control" value="<?php echo $pen->thn_masuk;?>" required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tahun Lulus<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-6 ">
												<input type="text" name="tahun" id="first-name" required="required" class="form-control" value="<?php echo $pen->thn_lulus;?>" required>
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
			