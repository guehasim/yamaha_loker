<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Form Update Data HRD</h2>
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
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>admin/update_hrd">
							<?php foreach ($hrd->result() as $ad): ?>

							<input type="hidden" name="id" id="first-name" required="required" class="form-control" value="<?php echo $ad->ID_User;?>">

							<div class="item form-group form-check">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="user" id="first-name" required="required" class="form-control" value="<?php echo $ad->User;?>" >
								</div>
							</div>

							<div class="item form-group form-check">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="pass" id="first-name" required="required" class="form-control" value="<?php echo base64_decode($ad->Pass); ?>">
								</div>
							</div>

							<input type="hidden" name="status" id="first-name" required="required" class="form-control" value="2">
							
							<?php endforeach ?>

							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button type="submit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Simpan</button>
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
			