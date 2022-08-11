<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Ubah jawaban dari pertanyaan</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/update_pertanyaan">

										<?php foreach ($pertanyaan->result() as $per): ?>											
										
										<input type="hidden" name="idtanya" value="<?php echo $per->ID_PelamarPertanyaan;?>">
										<input type="hidden" name="id" value="<?php echo $per->ID_Pelamar;?>">
			
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERKACAMATA?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_kacamata == 1) {
													 	$iyamata 	= "selected";
													 	$tidakmata 	= "";
													 } elseif($per->jwb_kacamata == 0){
													 	$iyamata 	= "";
													 	$tidakmata 	= "selected";
													 }else{
													 	$iyamata 	= "";
													 	$tidakmata 	= "";
													 }
													 ?>
														<select class="form-control" name="kacamata"  required>													
															<option value="1" <?php echo $iyamata;?> >IYA</option>
															<option value="0" <?php echo $tidakmata;?> >TIDAK</option>
														</select>												
												</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">JIKA ANDA BERKACAMATA, BERAPA UKURAN MINUS KACAMATA ANDA?(contoh: KANAN=0.5, KIRI=1.0)"?<span class="required">*</span>
											</label>
												<div class="col-md-2 col-sm-3 ">
												<input id="middle-name" class="form-control" type="text" name="kanan" placeholder="kanan" value="<?php echo $per->kaca_kanan; ?>">
												</div>
												<div class="col-md-2 col-sm-3 ">
												<input id="middle-name" class="form-control" type="text" name="kiri" placeholder="kiri" value="<?php echo $per->kaca_kiri; ?>">
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA MEROKOK?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_rokok == 1) {
													 	$iyarokok 		= "selected";
													 	$tidakrokok 	= "";
													 } elseif($per->jwb_rokok == 0){
													 	$iyarokok 		= "";
													 	$tidakrokok 	= "selected";
													 }else{
													 	$iyarokok 		= "";
													 	$tidakrokok 	= "";
													 }
													 ?>
														<select class="form-control" name="rokok" required>													
															<option value="1" <?php echo $iyarokok;?> >IYA</option>
															<option value="0" <?php echo $tidakrokok;?> >TIDAK</option>
														</select>	
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA MEMILIKI SIM?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">

													<?php
													if ($per->jwb_sim == 0) {
													 	$tidaksim	= "selected";
													 	$sima 		= "";
													 	$simb 		= "";
													 	$simc 		= "";
													 } elseif($per->jwb_sim == 1){
													 	$tidaksim	= "";
													 	$sima 		= "selected";
													 	$simb 		= "";
													 	$simc 		= "";
													 }elseif($per->jwb_sim == 2){
													 	$tidaksim	= "";
													 	$sima 		= "";
													 	$simb 		= "selected";
													 	$simc 		= "";
													 }elseif($per->jwb_sim == 3){
													 	$tidaksim	= "";
													 	$sima 		= "";
													 	$simb 		= "";
													 	$simc 		= "selected";
													 }else{
													 	$tidaksim	= "";
													 	$sima 		= "";
													 	$simb 		= "";
													 	$simc 		= "";
													 }
													 ?>
													<select class="form-control" name="sim" required>
														<option value="0" <?php echo $tidaksim;?> >TIDAK MEMILIKI SIM</option>
														<option value="1" <?php echo $sima;?> >SIM A</option>
														<option value="2" <?php echo $simb;?> >SIM B</option>
														<option value="3" <?php echo $simc;?> >SIM C</option>
													</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA PERNAH MENGALAMI KECELAKAAN KERJA?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_celaka_kerja == 1) {
													 	$iyacelakakerja 	= "selected";
													 	$tidakcelakakerja 	= "";
													 } elseif($per->jwb_celaka_kerja == 0){
													 	$iyacelakakerja 	= "";
													 	$tidakcelakakerja 	= "selected";
													 }else{
													 	$iyacelakakerja 	= "";
													 	$tidakcelakakerja 	= "";
													 }
													 ?>
														<select class="form-control" name="celaka_kerja" required>													
															<option value="1" <?php echo $iyacelakakerja;?> >IYA</option>
															<option value="0" <?php echo $tidakcelakakerja;?> >TIDAK</option>
														</select>
														
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA PERNAH MENGALAMI KECELAKAAN LALU LINTAS?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_celaka_lalin == 1) {
													 	$iyacelakalalin 		= "selected";
													 	$tidakcelakalalin 	 	= "";
													 } elseif($per->jwb_celaka_lalin == 0){
													 	$iyacelakalalin 		= "";
													 	$tidakcelakalalin 		= "selected";
													 }else{
													 	$iyacelakalalin 		= "";
													 	$tidakcelakalalin 		= "";
													 }
													 ?>
														<select class="form-control" name="celaka_lalin" required>													
															<option value="1" <?php echo $iyacelakalalin;?>>IYA</option>
															<option value="0" <?php echo $tidakcelakalalin;?> >TIDAK</option>
														</select>
														
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA PERNAH MENGALAMI PATAH TULANG?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">

													<?php
													if ($per->jwb_patah_tulang == 1) {
													 	$iyapatahtulang 		= "selected";
													 	$tidakpatahtulang 	 	= "";
													 } elseif($per->jwb_patah_tulang == 0){
													 	$iyapatahtulang 		= "";
													 	$tidakpatahtulang 		= "selected";
													 }else{
													 	$iyapatahtulang 		= "";
													 	$tidakpatahtulang 		= "";
													 }
													 ?>

														<select class="form-control" name="patah_tulang" required>													
															<option value="1" <?php echo $iyapatahtulang;?> >IYA</option>
															<option value="0" <?php echo $tidakpatahtulang;?> >TIDAK</option>
														</select>
														
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA PERNAH BEKERJA DI PT. YEMI SEBELUMNYA?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_pernah_kerja == 1) {
													 	$iyapernahkerja 		= "selected";
													 	$tidakpernahkerja 	 	= "";
													 } elseif($per->jwb_pernah_kerja == 0){
													 	$iyapernahkerja 		= "";
													 	$tidakpernahkerja 		= "selected";
													 }else{
													 	$iyapernahkerja 		= "";
													 	$tidakpernahkerja 		= "";
													 }
													 ?>
														<select class="form-control" name="pernah_kerja" required>													
															<option value="1" <?php echo $iyapernahkerja;?> >IYA</option>
															<option value="0" <?php echo $tidakpernahkerja;?> >TIDAK</option>
														</select>
														
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERENCANA MENIKAH DALAM 2 TAHUN INI?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_nikah_tahun == 1) {
													 	$iyanikahtahun 		= "selected";
													 	$tidaknikahtahun 	= "";
													 } elseif($per->jwb_nikah_tahun == 0){
													 	$iyanikahtahun 		= "";
													 	$tidaknikahtahun 	= "selected";
													 }else{
													 	$iyanikahtahun 		= "";
													 	$tidaknikahtahun 	= "";
													 }
													 ?>
												
														<select class="form-control" name="nikah" required>													
															<option value="1" <?php echo $iyanikahtahun;?> >IYA</option>
															<option value="0" <?php echo $tidaknikahtahun;?> >TIDAK</option>
														</select>
													
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA BEKERJA SHIFT?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_shift == 1) {
													 	$iyashift 		= "selected";
													 	$tidakshift 	= "";
													 } elseif($per->jwb_shift == 0){
													 	$iyashift 		= "";
													 	$tidakshift 	= "selected";
													 }else{
													 	$iyashift 		= "";
													 	$tidakshift 	= "";
													 }
													 ?>
														<select class="form-control" name="shift" required>													
															<option value="1" <?php echo $iyashift;?> >IYA</option>
															<option value="0" <?php echo $tidakshift;?> >TIDAK</option>
														</select>
														
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA BEKERJA BERDIRI SELAMA 8 JAM?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_kerja == 1) {
													 	$iyakerja 		= "selected";
													 	$tidakkerja 	= "";
													 } elseif($per->jwb_kerja == 0){
													 	$iyakerja 		= "";
													 	$tidakkerja 	= "selected";
													 }else{
													 	$iyakerja 		= "";
													 	$tidakkerja 	= "";
													 }
													 ?>
														<select class="form-control" name="kerja" required>													
															<option value="1" <?php echo $iyakerja;?> >IYA</option>
															<option value="0" <?php echo $tidakkerja;?> >TIDAK</option>
														</select>
														
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA TIDAK MENIKAH SELAMA MASA KONTRAK?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_nikah_kontrak == 1) {
													 	$iyanikahkontrak 		= "selected";
													 	$tidaknikahkontrak 		= "";
													 } elseif($per->jwb_nikah_kontrak == 0){
													 	$iyanikahkontrak 		= "";
													 	$tidaknikahkontrak 		= "selected";
													 }else{
													 	$iyanikahkontrak 		= "";
													 	$tidaknikahkontrak  	= "";
													 }
													 ?>
														<select class="form-control" name="nikah_kontrak" required>													
															<option value="1" <?php echo $iyanikahkontrak;?> >IYA</option>
															<option value="0" <?php echo $tidaknikahkontrak;?> >TIDAK</option>
														</select>
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA TIDAK KULIAH SELAMA BEKERJA DI PT. YEMI?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_kuliah == 1) {
													 	$iyakuliah 		= "selected";
													 	$tidakkuliah 	= "";
													 } elseif($per->jwb_kuliah == 0){
													 	$iyakuliah 		= "";
													 	$tidakkuliah 	= "selected";
													 }else{
													 	$iyakuliah 		= "";
													 	$tidakkuliah 	= "";
													 }
													 ?>
														<select class="form-control" name="kuliah" required>													
															<option value="1" <?php echo $iyakuliah;?> >IYA</option>
															<option value="0" <?php echo $iyakuliah;?> >TIDAK</option>
														</select>
														
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA DITEMPATKAN DI AREA MANA SAJA DI PT. YEMI?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_area == 1) {
													 	$iyaarea 		= "selected";
													 	$tidakarea 	= "";
													 } elseif($per->jwb_area == 0){
													 	$iyaarea 		= "";
													 	$tidakarea 	= "selected";
													 }else{
													 	$iyaarea 		= "";
													 	$tidakarea 	= "";
													 }
													 ?>
														<select class="form-control" name="area" required>													
															<option value="1" <?php echo $iyaarea;?> >IYA</option>
															<option value="0" <?php echo $tidakarea;?> >TIDAK</option>
														</select>
														
												</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">APAKAH ANDA BERSEDIA TIDAK MEROKOK SELAMA BEKERJA DI PT. YEMI?<span class="required">*</span>
											</label>
												<div class="col-md-3 col-sm-3 ">
													<?php
													if ($per->jwb_no_rokok == 1) {
													 	$iyanorokok 		= "selected";
													 	$tidaknorokok 	= "";
													 } elseif($per->jwb_no_rokok == 0){
													 	$iyanorokok 		= "";
													 	$tidaknorokok 	= "selected";
													 }else{
													 	$iyanorokok 		= "";
													 	$tidaknorokok 	= "";
													 }
													 ?>
														<select class="form-control" name="no_rokok" required>													
															<option value="1" <?php echo $iyanorokok;?> >IYA</option>
															<option value="0" <?php echo $iyanorokok;?> >TIDAK</option>
														</select>
														
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
			