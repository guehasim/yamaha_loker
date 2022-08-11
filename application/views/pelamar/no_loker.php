<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div>
		              <?php echo $this->session->flashdata('msg'); ?>
		            </div> 
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_content">
									<br />
									<br />
									<center><h1>Lowongan Kerja</h1></center>
									<?php foreach ($status->result() as $st): ?>
									<?php if ($st->status_recruitment == 1): ?>
										<center><h2>Anda Harus Melengkapi Data Dulu</h2></center>
										<br />
		                            <!-- end user projects -->
										
									<?php else: ?>
										<center><h2>Mohon maaf untuk saat ini Rekruitment masih ditutup</h2></center>  
									<?php endif ?>
										
									<?php endforeach ?>
									

							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- /page content -->