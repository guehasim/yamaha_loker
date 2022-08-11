<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Data Data Keluarga</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pelamar/update_keluarga">

										<?php foreach ($keluarga->result() as $kel): ?>
										
										<input type="hidden" name="id_pelamar" value="<?php echo $kel->ID_Pelamar;?>">
										<input type="hidden" name="id" value="<?php echo $kel->ID_Keluarga;?>">
			
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Data Keluarga<span class="required">*</span>
											</label>
											<div class="col-md-9 col-sm- ">
												<table class="table table-bordered">
							                      <thead>
							                        <tr>
							                          <th></th>
							                          <th></th>
							                          <th>Nama</th>
							                          <th>Alamat</th>
							                          <th>Telp/HP</th>
							                        </tr>
							                      </thead>
							                      <tbody>
							                        <tr>
							                          <th rowspan="2" scope="row">Orang Tua</th>
							                          <td>Ayah</td>
							                          <td><input type="text" name="nama_ortu_ayah" id="first-name" value="<?php echo $kel->nama_ortu_ayah;?>" class="form-control" required></td>
							                          <td><input type="text" name="alamat_ortu_ayah" id="first-name" value="<?php echo $kel->alamat_ortu_ayah;?>" class="form-control" required></td>
							                          <td><input type="number" name="telp_ortu_ayah" id="first-name" value="<?php echo $kel->telp_ortu_ayah;?>" class="form-control" required></td>
							                        </tr>
							                        <tr>
							                          <td>Ibu</td>
							                          <td><input type="text" name="nama_ortu_ibu" id="first-name" value="<?php echo $kel->nama_ortu_ibu;?>"  class="form-control" required></td>
							                          <td><input type="text" name="alamat_ortu_ibu" id="first-name" value="<?php echo $kel->alamat_ortu_ibu;?>" class="form-control" required></td>
							                          <td><input type="number" name="telp_ortu_ibu" id="first-name" value="<?php echo $kel->telp_ortu_ibu;?>" class="form-control" required></td>
							                        </tr>
							                        <tr>
							                          <th rowspan="2" scope="row">Mertua</th>
							                          <td>Ayah</td>
							                          <td><input type="text" name="nama_mertua_ayah" id="first-name" value="<?php echo $kel->nama_mertua_ayah;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_mertua_ayah" id="first-name" value="<?php echo $kel->alamat_mertua_ayah;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_mertua_ayah" id="first-name" value="<?php echo $kel->telp_mertua_ayah;?>" class="form-control" ></td>
							                        </tr>
							                        <tr>
							                          <td>Ibu</td>
							                          <td><input type="text" name="nama_mertua_ibu" id="first-name" value="<?php echo $kel->nama_mertua_ibu;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_mertua_ibu" id="first-name" value="<?php echo $kel->alamat_mertua_ibu;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_mertua_ibu" id="first-name" value="<?php echo $kel->telp_mertua_ibu;?>" class="form-control" ></td>
							                        </tr>


							                        <tr>
							                          <th rowspan="5" scope="row">Saudara</th>
							                          <td>1</td>
							                          <td><input type="text" name="nama_saudara_1" id="first-name" value="<?php echo $kel->nama_saudara_1;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_saudara_1" id="first-name" value="<?php echo $kel->alamat_saudara_1;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_saudara_1" id="first-name" value="<?php echo $kel->telp_saudara_1;?>" class="form-control" ></td>
							                        </tr>
							                        <tr>
							                          <td>2</td>
							                          <td><input type="text" name="nama_saudara_2" id="first-name" value="<?php echo $kel->nama_saudara_2;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_saudara_2" id="first-name" value="<?php echo $kel->alamat_saudara_2;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_saudara_2" id="first-name" value="<?php echo $kel->telp_saudara_2;?>" class="form-control" ></td>
							                        </tr>
							                        <tr>
							                          <td>3</td>
							                          <td><input type="text" name="nama_saudara_3" id="first-name" value="<?php echo $kel->nama_saudara_3;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_saudara_3" id="first-name" value="<?php echo $kel->alamat_saudara_3;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_saudara_3" id="first-name" value="<?php echo $kel->telp_saudara_3;?>" class="form-control" ></td>
							                        </tr>
							                        <tr>
							                          <td>4</td>
							                          <td><input type="text" name="nama_saudara_4" id="first-name" value="<?php echo $kel->nama_saudara_4;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_saudara_4" id="first-name" value="<?php echo $kel->alamat_saudara_4;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_saudara_4" id="first-name" value="<?php echo $kel->telp_saudara_4;?>" class="form-control" ></td>
							                        </tr>
							                        <tr>
							                          <td>5</td>
							                          <td><input type="text" name="nama_saudara_5" id="first-name" value="<?php echo $kel->nama_saudara_5;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_saudara_5" id="first-name" value="<?php echo $kel->alamat_saudara_5;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_saudara_5" id="first-name" value="<?php echo $kel->telp_saudara_5;?>" class="form-control" ></td>
							                        </tr>

							                        <tr>
							                          <th scope="row">Istri</th>
							                          <td>Istri</td>
							                          <td><input type="text" name="nama_istri" id="first-name" value="<?php echo $kel->nama_istri;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_istri" id="first-name" value="<?php echo $kel->alamat_istri;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_istri" id="first-name" value="<?php echo $kel->telp_istri;?>" class="form-control" ></td>
							                        </tr>


							                        <tr>
							                          <th rowspan="4" scope="row">Anak</th>
							                          <td>1</td>
							                          <td><input type="text" name="nama_anak_1" id="first-name" value="<?php echo $kel->nama_anak_1;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_anak_1" id="first-name" value="<?php echo $kel->alamat_anak_1;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_anak_1" id="first-name" value="<?php echo $kel->telp_anak_1;?>" class="form-control" ></td>
							                        </tr>
							                        <tr>
							                          <td>2</td>
							                          <td><input type="text" name="nama_anak_2" id="first-name" value="<?php echo $kel->nama_anak_2;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_anak_2" id="first-name" value="<?php echo $kel->alamat_anak_2;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_anak_2" id="first-name" value="<?php echo $kel->telp_anak_2;?>" class="form-control" ></td>
							                        </tr>
							                        <tr>
							                          <td>3</td>
							                          <td><input type="text" name="nama_anak_3" id="first-name" value="<?php echo $kel->nama_anak_3;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_anak_3" id="first-name" value="<?php echo $kel->alamat_anak_3;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_anak_3" id="first-name" value="<?php echo $kel->telp_anak_3;?>" class="form-control" ></td>
							                        </tr>
							                        <tr>
							                          <td>4</td>
							                          <td><input type="text" name="nama_anak_4" id="first-name" value="<?php echo $kel->nama_anak_4;?>" class="form-control" ></td>
							                          <td><input type="text" name="alamat_anak_4" id="first-name" value="<?php echo $kel->alamat_anak_4;?>" class="form-control" ></td>
							                          <td><input type="number" name="telp_anak_4" id="first-name" value="<?php echo $kel->telp_anak_4;?>" class="form-control" ></td>
							                        </tr>

							                      </tbody>
							                    </table>

											</div>
										</div>

										<?php endforeach ?>	

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Simpan</button>
												<a href="<?php echo base_url() ?>pelamar/tampil_kelengkapan"><button class="btn btn-primary" type="button">Kembali</button></a>
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
			