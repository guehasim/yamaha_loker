<?php 
function randomPassword() {
			    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
			    $pass = array(); //remember to declare $pass as an array
			    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			    for ($i = 0; $i < 6; $i++) {
			        $n = rand(0, $alphaLength);
			        $pass[] = $alphabet[$n];
			    }
			    return implode($pass); //turn the array into a string
			}

			$p = randomPassword();
 ?>
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Form Input Admin Baru</h2>
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
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>admin/tambah_admin">

							<div class="item form-group form-check">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="user" id="first-name" required="required" class="form-control" >
								</div>
							</div>

							<div class="item form-group form-check">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="pass" id="first-name" required="required" class="form-control" value="<?php echo $p; ?>">
								</div>
							</div>
							<input type="hidden" name="status" id="first-name" required="required" class="form-control" value="1">
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button type="submit" class="btn btn-success">Simpan</button>
									<a href="<?php echo base_url() ?>admin/data_admin"><button class="btn btn-primary" type="button">Kembali</button></a>
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