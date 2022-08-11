<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Identitas</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pelamar/update_identitas">
										
										<?php foreach ($identitas->result() as $iden): ?>											
										
										<input type="hidden" name="id" value="<?php echo $iden->ID_PelamarIdentitas;?>">

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Kelamin<span class="required">*</span>
											</label>

											<?php
												if ($iden->jenkel == 1) {
												 	$laki = "selected";
												 	$wanita = "";
												 } elseif($iden->jenkel == 0) {
												 	$laki = "";
												 	$wanita = "selected";
												 } else{
												 	$laki = "";
												 	$wanita = "";
												 }
											?>

											<div class="col-md-4 col-sm-3 ">
												
													<select class="form-control" name="jenkel" required>
														<option value="1" <?php echo $laki;?>>Laki-laki</option>
														<option value="0" <?php echo $wanita;?> >Wanita</option>
													</select>
												
											</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tempat Lahir<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="tempat_lahir" id="first-name" required="required" class="form-control"  value="<?php echo $iden->tempat_lahir;?>" required>
											</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Lahir<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-6 ">
												<input id="birthday" type="date" name="tgllahir" onchange="getAge();" value="<?php echo $iden->tgl_lahir_ktp;?>" class="date-picker form-control" placeholder="dd-mm-yyyy"  required>
												
											</div>
											<label class="col-form-label" for="first-name">Usia<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-6 ">
												<input id="result" type="text" class="form-control" value="<?php echo $iden->usia;?> Tahun" disabled>
												<input id="results" name="usia" type="hidden" value="<?php echo $iden->usia;?>" class="form-control">
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Agama<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<?php
													if ($iden->agama == 1) {
													 	$islam 		= "selected";
													 	$kristen 	= "";
													 	$hindu 		= "";
													 	$budha 	 	= "";
													 	$konghuchu	= "";
													 } elseif ($iden->agama == 2) {
													 	$islam 		= "";
													 	$kristen 	= "selected";
													 	$hindu 		= "";
													 	$budha 	 	= "";
													 	$konghuchu	= "";
													 } elseif ($iden->agama == 3){
													 	$islam 		= "";
													 	$kristen 	= "";
													 	$hindu 		= "selected";
													 	$budha 	 	= "";
													 	$konghuchu	= "";
													 } elseif($iden->agama == 4){
													 	$islam 		= "";
													 	$kristen 	= "";
													 	$hindu 		= "";
													 	$budha 	 	= "selected";
													 	$konghuchu	= "";
													 } elseif($iden->agama == 5){
													 	$islam 		= "";
													 	$kristen 	= "";
													 	$hindu 		= "";
													 	$budha 	 	= "";
													 	$konghuchu	= "selected";
													 }
												?>
													<select class="form-control" name="agama" required>
														<option value="1" <?php echo $islam;?> >Islam</option>
														<option value="2" <?php echo $kristen;?> >Kristen</option>
														<option value="3" <?php echo $hindu;?> >Hindu</option>
														<option value="4" <?php echo $budha;?> >Budha</option>
														<option value="5" <?php echo $konghuchu;?> >Kong Hu Chu</option>
													</select>												
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nomor Telp/HP<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="number" name="hp" id="first-name" value="<?php echo $iden->nohp;?>" required="required" class="form-control"  required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Status Kawin<span class="required">*</span>
											</label>
											<?php
												if ($iden->status_kawin == 1) {
												 	$kawin = "selected";
												 	$tidak = "";
												 }  else{
												 	$kawin = "";
												 	$tidak = "selected";
												 }
											?>

											<div class="col-md-4 col-sm-3 ">
													<select class="form-control" name="kawin"  required>
														<option value="1" <?php echo $kawin;?> >Sudah Kawin</option>
														<option value="0" <?php echo $tidak;?>>Belum Kawin</option>
													</select>

												
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pekerjaan Ayah<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="ayah" id="first-name" value="<?php echo $iden->kerja_ayah;?>" required="required" class="form-control"  required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pekerjaan Ibu<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="ibu" id="first-name" required="required" value="<?php echo $iden->kerja_ibu;?>" class="form-control"  required>
											</div>
										</div>
										<div class="ln_solid"></div>
										<?php endforeach ?>
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

			<script>
				function getAge() {
				var date = document.getElementById('birthday').value;
			 
				if(date == ""){					

			    }else{
					var today = new Date();
					var birthday = new Date(date);
					var year = 0;
					if (today.getMonth() < birthday.getMonth()) {
						year = 1;
					} else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
						year = 1;
					}
					var age = today.getFullYear() - birthday.getFullYear() - year;
			 
					if(age < 0){
						age = 0;
					}
					// document.getElementById('result').innerHTML = age;
					document.getElementById('result').value = age+" Tahun";
					document.getElementById('results').value = age;
				}
			}
			</script>
			