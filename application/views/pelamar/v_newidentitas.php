<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Input Identitas</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>pelamar/simpan_identitas">
																			
										<input type="hidden" name="id" value="<?php echo $this->session->userdata('ses_pelamar');?>">
										
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Kelamin<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-3 ">
												<select class="form-control" name="jenkel" required>
													<option></option>
													<option value="1">Laki-laki</option>
													<option value="0">Wanita</option>
												</select>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tempat Lahir<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="tempat_lahir" id="first-name" required="required" class="form-control"  required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Lahir<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-6 ">
												<input id="birthday" type="date" name="tgllahir" class="date-picker form-control" placeholder="dd-mm-yyyy" onchange="getAge();" required>
												
											</div>
											<label class="col-form-label" for="first-name">Usia<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-6 ">
												<input id="result" type="text" class="form-control" disabled>
												<input id="results" name="usia" type="hidden" class="form-control">
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Agama<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<select class="form-control" name="agama" required>
													<option ></option>
													<option value="1">Islam</option>
													<option value="2">Kristen</option>
													<option value="3">Hindu</option>
													<option value="4">Budha</option>
													<option value="5">Kong Hu Chu</option>
												</select>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nomor Telp/HP<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="number" name="hp" id="first-name" required="required" class="form-control"  required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Status Kawin<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-3 ">
												<select class="form-control" name="kawin"  required>
													<option></option>
													<option value="1">Sudah Kawin</option>
													<option value="0">Belum Kawin</option>
												</select>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pekerjaan Ayah<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="ayah" id="first-name" required="required" class="form-control"  required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pekerjaan Ibu<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="ibu" id="first-name" required="required" class="form-control"  required>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Foto Profil<span class="required">*</span>
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

			<script>
				function getAge() {
				var date = document.getElementById('birthday').value;
			 
				if(date === ""){
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
			
			<!-- /page content -->
			