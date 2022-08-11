
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
          <div class="title_left">
            <h2>Data Detail Karyawan</h2>
          </div>

        </div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<button type="button" class="btn btn-primary" onclick="history.back()"><i class="fa fa-mail-reply"></i> KEMBALI</button>
						<?php foreach ($akun as $lok): ?>
		                          
		                    <a href="<?php echo base_url(); ?>admin/cetak_identitas_karyawan?us=<?php echo $lok->ID_Pelamar; ?>" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> CETAK</button></a>
		                        
		               	<?php endforeach ?>
						<ul class="nav navbar-right panel_toolbox">
							<li>
		                        
		                    </li>
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<?php foreach ($karyawan->result() as $pel): ?>

							<input type="hidden" name="id" value="<?php echo $pel->ID_Pelamar;?>">

							<div class="col-md-6 col-sm-6  ">  
                            <h4>Data Personal</h4> 
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">NIK</th>
                                  <td><?php echo $pel->nik_ktp;?></td>
                                </tr>

                              </tbody>
                            </table>
                            </div>
                            <div class="col-md-6 col-sm-6  ">
                              <h4 style="color:white">*</h4>
                              <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">NAMA</th>
                                  <td><?php echo $pel->nama_ktp;?></td>
                                </tr>

                              </tbody>
                            </table>
                              
                            </div>

							
                          </br>
                          </br>
                          
                           <input type="hidden" name="id" value="<?php echo $pel->ID_Pelamar;?>"> 

                          </br>

                          <div class="col-md-6 col-sm-6  ">
                          <h4>Data Kepesertaan</h4>  
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">No.BPJS Kesehatan</th>
                                  <td><?php echo $pel->NO_BPJS_Kes;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">No.BPJS Ketenagakerjaan</th>
                                  <td><?php echo $pel->NO_BPJS_Kerja;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">No.NPWP</th>
                                  <td><?php echo $pel->NO_NPWP;?></td>
                                </tr>

                              </tbody>
                            </table>
                            </div>

                            <div class="col-md-6 col-sm-6">
                              <h4>Dokumen Berkendara</h4>
                              <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Jenis SIM</th>
                                  <td>                                     
                                    <?php if ($pel->jwb_sim == 1): ?>
                                      <?php echo "SIM A";?>
                                    <?php elseif($pel->jwb_sim == 2): ?>
                                      <?php echo "SIM B";?>
                                    <?php elseif($pel->jwb_sim == 3): ?>
                                      <?php echo "SIM C"; ?>
                                    <?php else: ?>
                                      <?php echo "Tidak Memiliki SIM";?>
                                    <?php endif ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">NO.SIM</th>
                                  <td>
                                  	<?php foreach ($pertanyaan as $data): ?>
                                      <?php if ($data->jwb_sim == 0): ?>
                                        <?php echo "-" ?>
                                      <?php else: ?>
                                        <?php foreach ($sim as $data2): ?>
                                        <?php if ($data2->NO_SIM == NULL): ?>
                                          <?php echo "-"; ?>
                                        <?php else: ?>
                                          <?php echo $data2->NO_SIM;?>                                       
                                        <?php endif ?>
                                      <?php endforeach ?>
                                      <?php endif ?>
                                    <?php endforeach ?>
                                  </td>
                                </tr>

                              </tbody>
                            </table>                                  
                            </div>

                                
                          <h4 style="color:white">*</h4>
                          <br/>
                          <div class="col-md-6 col-sm-6  ">
                          <h4>Data Lahir</h4>  
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Tempat, Tanggal Lahir</th>
                                  <td><?php echo $pel->tempat_lahir;?>, <?php echo $pel->tgl_lahir_ktp;?></td>
                                </tr>

                              </tbody>
                            </table>
                            </div>
                            <div class="col-md-6 col-sm-6  ">
                              <h4 style="color:white">*</h4>
                              <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Agama</th>
                                  <td>
                                    <?php if ($pel->agama == 1): ?>
                                      <?php echo "Islam";?>
                                    <?php elseif ($pel->agama == 2): ?>
                                      <?php echo "Kristen";?>
                                    <?php elseif ($pel->agama == 3): ?>
                                      <?php echo "Hindu";?>
                                    <?php elseif ($pel->agama == 4): ?>
                                      <?php echo "Budha";?>
                                    <?php else: ?>
                                      <?php echo "Kong Hu Chu" ?>
                                    <?php endif ?>
                                  </td>
                                </tr>

                              </tbody>
                            </table>                                  
                            </div>
                          
                          <h4>Alamat</h4>
                          <div class="col-md-6 col-sm-6  ">  
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Alamat Asal</th>
                                  <td><?php echo $pel->alamat_ktp;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">RT/RW</th>
                                  <td><?php echo $pel->rt_ktp;?>/<?php echo $pel->rw_ktp;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Kelurahan</th>
                                  <td><?php echo $pel->kelurahan_ktp;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">kecamatan</th>
                                  <td><?php echo $pel->kecamatan_ktp;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Kota</th>
                                  <td><?php echo $pel->kota_ktp;?></td>
                                </tr>                                    
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Kode Pos</th>
                                  <td><?php echo $pel->kodepos_ktp;?></td>
                                </tr>

                              </tbody>
                            </table>
                            </div>
                            <div class="col-md-6 col-sm-6  ">
                              <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Alamat Domisili</th>
                                  <td><?php echo $pel->alamat_domisili;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">RT/RW</th>
                                  <td><?php echo $pel->rt_domisili;?>/<?php echo $pel->rw_domisili;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Kelurahan</th>
                                  <td><?php echo $pel->kelurahan_domisili;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Kecamatan</th>
                                  <td><?php echo $pel->kecamatan_domisili;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Kota</th>
                                  <td><?php echo $pel->kota_domisili;?></td>
                                </tr>                                    
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Kode Pos</th>
                                  <td><?php echo $pel->kodepos_domisili;?></td>
                                </tr>
                                <tr>
                                  <th scope="row" style="background-color: #ededeb;">Area</th>
                                  <td>
                                    <?php
                                    if ($pel->area == 1) {
                                     	echo "Area 1";
                                     } elseif($pel->area == 2){
                                     	echo "Area 2";
                                     }else{
                                     	echo "Area 3";
                                     }
                                     ?>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                              
                            </div>
                            
                            <h4>Pendidikan</h4>
                            <div class="col-md-12 col-sm-12  ">
                              
                              <table class="table table-bordered">
                                <thead>
                                <tr style="background-color: #ededeb;">
                                  <th>Pendidikan</th>
                                  <th>Asal Sekolah/Universitas</th>
                                  <th>Jurusan</th>
                                  <th>Kota Asal</th>
                                  <th>Tahun Masuk</th>
                                  <th>Tahun Lulus</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($pendidikan as $lok): ?>
                                  
                                <tr>
                                  <td>
                                    <?php if ($lok->pendidikan == '1'): ?>
                                      <?php echo "SD/MI";?>
                                    <?php elseif ($lok->pendidikan == '2'): ?>
                                      <?php echo "SMP/MTs";?>
                                    <?php elseif ($lok->pendidikan == '3'): ?>
                                      <?php echo "SMA/SMK";?>
                                    <?php elseif ($lok->pendidikan == '4'): ?>
                                      <?php echo "D3";?>
                                    <?php elseif ($lok->pendidikan == '5'): ?>
                                      <?php echo "S1";?>
                                    <?php elseif ($lok->pendidikan == '6'): ?>
                                      <?php echo "S2";?>
                                    <?php elseif ($lok->pendidikan == '7'): ?>
                                      <?php echo "S3";?>
                                    <?php else: ?>
                                      <?php echo "Tidak Sekolah";?>
                                    <?php endif ?>
                                  </td>
                                  <td><?php echo $lok->asal_pendidikan;?></td>
                                  <td><?php echo $lok->jurusan;?></td>
                                  <td><?php echo $lok->tempat_pendidikan;?></td>
                                  <td><?php echo $lok->thn_masuk;?></td>
                                  <td><?php echo $lok->thn_lulus;?></td>
                                </tr>

                                <?php endforeach ?>
                              </tbody>
                              </table>  
                              
                            </div>

                          <div class="col-md-12 col-sm-12  ">  
                          <h4>Data Keluarga</h4>
                            <table class="table table-bordered">
                            <thead>
                                  <tr style="background-color: #ededeb;">
                                    <th></th>
                                    <th></th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telp/HP</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th rowspan="2" scope="row" >Orang Tua</th>
                                    <td>Ayah</td>
                                    <td><?php echo $pel->nama_ortu_ayah;?></td>
                                    <td><?php echo $pel->alamat_ortu_ayah;?></td>
                                    <td><?php echo $pel->telp_ortu_ayah;?></td>
                                  </tr>
                                  <tr>
                                    <td>Ibu</td>
                                    <td><?php echo $pel->nama_ortu_ibu;?></td>
                                    <td><?php echo $pel->alamat_ortu_ibu;?></td>
                                    <td><?php echo $pel->telp_ortu_ibu;?></td>
                                  </tr>
                                  <tr>
                                    <th rowspan="2" scope="row">Mertua</th>
                                    <td>Ayah</td>
                                    <td><?php echo $pel->nama_mertua_ayah;?></td>
                                    <td><?php echo $pel->alamat_mertua_ayah;?></td>
                                    <td><?php echo $pel->telp_mertua_ayah;?></td>
                                  </tr>
                                  <tr>
                                    <td>Ibu</td>
                                    <td><?php echo $pel->nama_mertua_ibu;?></td>
                                    <td><?php echo $pel->alamat_mertua_ibu;?></td>
                                    <td><?php echo $pel->telp_mertua_ibu;?></td>
                                  </tr>


                                  <tr>
                                    <th rowspan="5" scope="row">Saudara</th>
                                    <td>1</td>
                                    <td><?php echo $pel->nama_saudara_1;?></td>
                                    <td><?php echo $pel->alamat_saudara_1;?></td>
                                    <td><?php echo $pel->telp_saudara_1;?></td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td><?php echo $pel->nama_saudara_2;?></td>
                                    <td><?php echo $pel->alamat_saudara_2;?></td>
                                    <td><?php echo $pel->telp_saudara_2;?></td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td><?php echo $pel->nama_saudara_3;?></td>
                                    <td><?php echo $pel->alamat_saudara_3;?></td>
                                    <td><?php echo $pel->telp_saudara_2;?></td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td><?php echo $pel->nama_saudara_4;?></td>
                                    <td><?php echo $pel->alamat_saudara_4;?></td>
                                    <td><?php echo $pel->telp_saudara_4;?></td>
                                  </tr>
                                  <tr>
                                    <td>5</td>
                                    <td><?php echo $pel->nama_saudara_5;?></td>
                                    <td><?php echo $pel->alamat_saudara_5;?></td>
                                    <td><?php echo $pel->telp_saudara_5;?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">Suami/Istri</th>
                                    <td></td>
                                    <td><?php echo $pel->nama_istri;?></td>
                                    <td><?php echo $pel->alamat_istri;?></td>
                                    <td><?php echo $pel->telp_istri;?></td>
                                  </tr>


                                  <tr>
                                    <th rowspan="4" scope="row">Anak</th>
                                    <td>1</td>
                                    <td><?php echo $pel->nama_anak_1;?></td>
                                    <td><?php echo $pel->alamat_anak_1;?></td>
                                    <td><?php echo $pel->telp_anak_1;?></td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td><?php echo $pel->nama_anak_2;?></td>
                                    <td><?php echo $pel->alamat_anak_2;?></td>
                                    <td><?php echo $pel->telp_anak_2;?></td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td><?php echo $pel->nama_anak_3;?></td>
                                    <td><?php echo $pel->alamat_anak_3;?></td>
                                    <td><?php echo $pel->telp_anak_3;?></td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td><?php echo $pel->nama_anak_4;?></td>
                                    <td><?php echo $pel->alamat_anak_4;?></td>
                                    <td><?php echo $pel->telp_anak_4;?></td>
                                  </tr>

								<?php endforeach ?>
								<?php foreach ($status_kawin as $pel): ?>												
								
                                  <tr>
                                    <th colspan="2">Status Perkawinan</th>
                                    <td colspan="3">
                                    	<?php
                                    	if ($pel->status_kawin == 1) {
                                    	 	echo "TK";
                                    	 } elseif($pel->status_kawin == 2){
                                    	 	echo "K/1";
                                    	 } elseif($pel->status_kawin == 3){
                                    	 	echo "K/2";
                                    	 } elseif($pel->status_kawin == 4){
                                    	 	echo "K/3";
                                    	 } elseif($pel->status_kawin == 5){
                                    	 	echo "TK/1";
                                    	 } elseif($pel->status_kawin == 6){
                                    	 	echo "TK/2";
                                    	 } elseif($pel->status_kawin == 7){
                                    	 	echo "TK/3";
                                    	 }else{
                                    	 	echo "belum ada";
                                    	 }
                                    	 ?>	
                                    </td>
                                  </tr>

                                  <?php endforeach ?>

                                </tbody>
                          </table> 
                          </div>
                          <div class="col-md-12 col-sm-12  ">  
                          <h4>Data Kontak Darurat</h4>
                            <table class="table table-bordered">
                            	<thead>
                                  <tr style="background-color: #ededeb;">
                                    <th>Nama</th>
                                    <th>No.Telp/HP</th>
                                    <th>Hubungan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($darurat->result() as $pel): ?>
                                  <tr>
                                    <td><?php echo $pel->nama_Darurat;?></td>
                                    <td><?php echo $pel->telp_Darurat;?></td>
                                    <td><?php echo $pel->hubungan_Darurat;?></td>
                                  </tr>
                                  <?php endforeach ?>

                                </tbody>
                          </table> 
                          <div class="ln_solid"></div>
                          </div>
                          </div> 										

					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<!-- /page content -->