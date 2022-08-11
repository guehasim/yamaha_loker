<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-22 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Ukuran</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/update_ukuran">

										<?php foreach ($ukuran->result() as $uk): ?>
											
										

										<input type="hidden" name="id" value="<?php echo $uk->ID_PelamarUkuran;?>">
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tinggi Badan<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<input type="text" name="tinggi_cm" id="first-name" required="required" class="form-control" placeholder="Centimeter" value="<?php echo $uk->tinggi_badan_cm;?>">
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Berat Badan<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<input type="text" name="berat_kg" id="first-name" required="required" class="form-control" placeholder="Kilogram" value="<?php echo $uk->berat_badan_kg;?>">
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ukuran Baju<span class="required">*</span>
											</label>

											<?php
											if ($uk->ukuran_baju == "S") {
											 	$S 		= "selected";
											 	$M 		= "";
											 	$L 		= "";
											 	$XL 	= "";
											 	$XXL 	= "";
											 	$XXXL 	= ""; 
											 } elseif($uk->ukuran_baju == "M"){
											 	$S 		= "";
											 	$M 		= "selected";
											 	$L 		= "";
											 	$XL 	= "";
											 	$XXL 	= "";
											 	$XXXL 	= "";
											 } elseif($uk->ukuran_baju == "L"){
											 	$S 		= "";
											 	$M 		= "";
											 	$L 		= "selected";
											 	$XL 	= "";
											 	$XXL 	= "";
											 	$XXXL 	= "";
											 } elseif($uk->ukuran_baju == "XL"){
											 	$S 		= "";
											 	$M 		= "";
											 	$L 		= "";
											 	$XL 	= "selected";
											 	$XXL 	= "";
											 	$XXXL 	= "";
											 } elseif($uk->ukuran_baju == "XXL"){
											 	$S 		= "";
											 	$M 		= "";
											 	$L 		= "";
											 	$XL 	= "";
											 	$XXL 	= "selected";
											 	$XXXL 	= "";
											 }else{
											 	$S 		= "";
											 	$M 		= "";
											 	$L 		= "";
											 	$XL 	= "";
											 	$XXL 	= "";
											 	$XXXL 	= "selected";
											 }
											 ?>
												<div class="col-md-2 col-sm-3 ">
													<select class="form-control" name="baju" required>
														<option value="S" <?php echo $S;?> >S</option>
														<option value="M" <?php echo $M;?> >M</option>													
														<option value="L" <?php echo $L;?> >L</option>													
														<option value="XL" <?php echo $XL;?> >XL</option>													
														<option value="XXL" <?php echo $XXL;?> >XXL</option>													
														<option value="XXXL" <?php echo $XXXL;?> >XXXL</option>
													</select>
												</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ukuran Sepatu<span class="required">*</span>
											</label>



											<div class="col-md-1 col-sm-6 ">
												<input type="text" value="<?php echo $uk->ukuran_sepatu_cm;?>" name="sepatu" id="first-name" required="required" class="form-control" placeholder="Kilogram" required>
											</div>
											<label class="col-form-label"><h4> Ex.: 36,37,38 </h4></label>			
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
			