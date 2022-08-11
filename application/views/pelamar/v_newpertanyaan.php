<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Jawablah Pertanyaan di bawah ini</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/simpan_pertanyaan">

										<input type="hidden" name="id" value="<?php echo $this->session->userdata('ses_pelamar');?>">
			
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERKACAMATA?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="kacamata"  required>
													<option value="">&nbsp;</option>													
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">JIKA ANDA BERKACAMATA, BERAPA UKURAN MINUS KACAMATA ANDA?(contoh: KANAN=0.5, KIRI=1.0)"?<span class="required">*</span>
											</label>
												<div class="col-md-1 col-sm-3 ">
												<input id="middle-name" class="form-control" type="text" name="kanan" placeholder="kanan">
												</div>
												<div class="col-md-1 col-sm-3 ">
												<input id="middle-name" class="form-control" type="text" name="kiri" placeholder="kiri">
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA MEROKOK?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="rokok"  required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA MEMILIKI SIM?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="sim"  required>
													<option value="">&nbsp;</option>	
													<option value="0">TIDAK MEMILIKI SIM</option>
													<option value="1">SIM A</option>
													<option value="2">SIM B</option>
													<option value="3">SIM C</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA PERNAH MENGALAMI KECELAKAAN KERJA?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="celaka_kerja"  required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA PERNAH MENGALAMI KECELAKAAN LALU LINTAS?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="celaka_lalin" required>	
													<option value="">&nbsp;</option>													
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA PERNAH MENGALAMI PATAH TULANG?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="patah_tulang" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA PERNAH BEKERJA DI PT. YEMI SEBELUMNYA?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="pernah_kerja" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERENCANA MENIKAH DALAM 2 TAHUN INI?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="nikah" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA BEKERJA SHIFT?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="shift" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA BEKERJA BERDIRI SELAMA 8 JAM?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="kerja" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA TIDAK MENIKAH SELAMA MASA KONTRAK?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="nikah_kontrak" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA TIDAK KULIAH SELAMA BEKERJA DI PT. YEMI?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="kuliah" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA DITEMPATKAN DI AREA MANA SAJA DI PT. YEMI?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="area" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA TIDAK MEROKOK SELAMA BEKERJA DI PT. YEMI?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
												<select class="form-control" name="no_rokok" required>
													<option value="">&nbsp;</option>	
													<option value="1">IYA</option>
													<option value="0">TIDAK</option>
												</select>
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
			