<style>
.back{
  background-color: #ededeb;
}
</style>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Data Detail Pelamar</h2>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">              
      <div class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            
            <button type="button" class="btn btn-primary" onclick="history.back()"><i class="fa fa-mail-reply"></i> KEMBALI</button>
            <?php foreach ($pelamar as $lok): ?>
                  
              <a href="<?php echo base_url(); ?>admin/cetak_identitas_pelamar?us=<?php echo $lok->ID_Pelamar; ?>" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> CETAK</button></a>
                
            <?php endforeach ?>

            <ul class="nav navbar-right panel_toolbox">
              <li>
                
              </li>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="col-md-5 col-sm-5">
              <h4>Data Identitas</h4>
              <table class="table table-bordered">
              <tbody>
                <?php foreach ($pelamar as $lok): ?>

                <tr>
                  <th scope="row" class="back">NIK</th>
                  <td><?php echo $lok->nik_ktp;?></td>
                </tr>
                <tr>
                  <th scope="row" class="back">Nama</th>
                  <td><?php echo $lok->nama_ktp;?></td>
                </tr>

                <?php endforeach ?>
                <?php foreach ($identitas as $lok): ?>
                  
                <tr>
                  <th scope="row" class="back">Jenis Kelamin</th>
                  <td>
                    <?php
                    if ($lok->jenkel == 1) {
                       echo "Laki-laki";
                     } elseif($lok->jenkel == 0){
                       echo "Wanita";
                     }
                      else{
                      echo "";
                     }
                     ?>
                  </td>
                </tr>
                <tr>
                  <th scope="row" class="back">Tanggal Lahir</th>
                  <td><?php if ($lok->tgl_lahir_ktp == null): ?>
                    <?php echo "";?>
                  <?php else: ?>
                    <?php echo date('d F Y', strtotime($lok->tgl_lahir_ktp));?>                            
                  <?php endif ?>
                  </td>
                </tr>
                <tr>
                  <th scope="row" class="back">Usia</th>
                  <td><?php echo $lok->usia;?> Tahun</td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            </div>
            
            <div class="col-md-5 col-sm-5">
              <h4 style="color:white;">Data Identitas</h4>
              <table class="table table-bordered">
              <tbody>
                <?php foreach ($identitas as $lok): ?>
                
                <tr>
                  <th scope="row" class="back">Status Kawin</th>
                  <td>
                    <?php
                    if ($lok->status_kawin == 1) {
                       echo "Kawin";
                     } else{
                       echo "Tidak Kawin";
                     }
                     ?>
                  </td>
                </tr>
                <tr>
                  <th scope="row" class="back">No.HP</th>
                  <td><?php echo $lok->nohp;?></td>
                </tr>
                <tr>
                  <th scope="row" class="back">Pekerjaan Ayah</th>
                  <td><?php echo $lok->kerja_ayah;?></td>
                </tr>
                <tr>
                  <th scope="row" class="back">Pekerjaan Ibu</th>
                  <td><?php echo $lok->kerja_ibu;?></td>
                </tr>

                <?php endforeach ?>
              </tbody>
            </table>
            </div>

            <div class="col-md-2 col-sm-2">
              <h4 style="color:white;">Data Identitas</h4>
              <?php foreach ($identitas as $lok): ?>
                <?php if ($lok->image == ""): ?>
                  <img class="img-responsive avatar-view" src="<?=base_url()?>assets/content/images/user.png?>" style="width: 100%; display: block;">
                <?php else: ?>
                  <img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/<?=$lok->image?>" style="width: 100%; display: block;">
                <?php endif ?>
              <?php endforeach ?>
            </div>

            <div class="col-md-12 col-sm-12">
              <h4>Data Alamat</h4>
              <table class="table table-bordered">
                <thead>
                  <tr style="background-color: #ededeb;">
                    <th>Berdasarkan</th>
                    <th>Alamat</th>
                    <th>RT/RW</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($alamat as $lok): ?>
                    
                  <tr>
                    <th scope="row">KTP</th>
                    <td><?php echo $lok->alamat_ktp;?></td>
                    <td><?php echo $lok->rw_ktp;?>/<?php echo $lok->rw_ktp;?></td>
                    <td><?php echo $lok->kelurahan_ktp;?></td>
                    <td><?php echo $lok->kecamatan_ktp;?></td>
                    <td><?php echo $lok->kota_ktp;?></td>
                    <td><?php echo $lok->kodepos_ktp;?></td>
                  </tr>
                  <tr>
                    <th scope="row">Domisili</th>
                    <td><?php echo $lok->alamat_domisili;?></td>
                    <td><?php echo $lok->rw_domisili;?>/<?php echo $lok->rw_domisili;?></td>
                    <td><?php echo $lok->kelurahan_domisili;?></td>
                    <td><?php echo $lok->kecamatan_domisili;?></td>
                    <td><?php echo $lok->kota_domisili;?></td>
                    <td><?php echo $lok->kodepos_domisili;?></td>
                  </tr>

                  <?php endforeach ?>
                </tbody>
              </table>
            </div>

            <div class="col-md-12 col-sm-12">  
              <h4>Data Ukuran</h4>
                  <table class="table table-bordered">
                    <thead>
                    <tr style="background-color: #ededeb;">
                      <th>Tinggi Badan (CM)</th>
                      <th>Berat Badan (KG)</th>
                      <th>Ukuran Baju</th>
                      <th>Ukuran Sepatu (CM)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ukuran as $lok): ?>
                      
                    <tr>
                      <td><?php echo $lok->tinggi_badan_cm;?> CM</td>
                      <td><?php echo $lok->berat_badan_kg;?> KG</td>
                      <td><?php echo $lok->ukuran_baju;?></td>
                      <td><?php echo $lok->ukuran_sepatu_cm;?> CM</td>
                    </tr>

                    <?php endforeach ?>
                  </tbody>
                  </table>
              </div>

            <div class="col-md-12 col-sm-12 "> 
              <h4>Data Pendidikan</h4>
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
                </br>
              </div>

              <div class="col-md-12 col-sm-12">  
              <h4>Data Pengalaman Kerja</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr style="background-color: #ededeb;">
                      <th>Nama Perusahaan</th>
                      <th>Bagian</th>
                      <th>Tahun</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pengalaman as $lok): ?>
                      
                    <tr>
                      <td><?php echo $lok->peng_perusahaan;?></td>
                      <td><?php echo $lok->peng_bidang;?></td>
                      <td><?php echo $lok->peng_tahun;?></td>
                    </tr>

                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>

              <div class="col-md-12 col-sm-12">  
              <h4>Data Pertanyaan</h4>
                <table class="table table-bordered">
                  <thead>
                    <tr style="background-color: #ededeb;">
                      <th>No.</th>
                      <th>Pertanyaan</th>
                      <th>Jawaban</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pertanyaan as $lok): ?>
                      
                    <tr>
                      <td>1</td>
                      <td>APAKAH ANDA BERKACAMATA?</td>
                      <td>
                        <?php if ($lok->jwb_kacamata == null): ?>       
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_kacamata == 0): ?>                                
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif ($lok->jwb_kacamata == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                          Kanan : <?php echo $lok->kaca_kanan;?>
                          Kiri : <?php echo $lok->kaca_kiri;?>  
                        <?php else: ?>                                          
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>                                  
                        <?php endif ?>
                      </td>

                    </tr>

                    <tr>
                      <td>2</td>
                      <td>APAKAH ANDA MEROKOK?</td>
                      <td>
                        <?php if ($lok->jwb_rokok == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_rokok == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_rokok == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?> 
                      </td>
                    </tr>
                    
                    <tr>
                      <td>3</td>
                      <td>APAKAH ANDA MEMILIKI SIM?</td>
                      <td>
                        <?php if ($lok->jwb_sim == null): ?>
                        <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_sim == 1): ?>
                        <?php echo "SIM A"; ?>                                       
                        <?php elseif ($lok->jwb_sim == 2): ?>
                        <?php echo "SIM B"; ?>                                       
                        <?php elseif ($lok->jwb_sim == 3): ?>
                        <?php echo "SIM C"; ?>
                        <?php else: ?>
                        <?php echo "Tidak Memiliki SIM"; ?> 
                        <?php endif ?>                                       
                      </td>
                    </tr>
                    
                    <tr>
                      <td>4</td>
                      <td>APAKAH ANDA PERNAH MENGALAMI KECELAKAAN KERJA?</td>
                      <td>
                        <?php if ($lok->jwb_celaka_kerja == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_celaka_kerja == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_celaka_kerja == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?> 
                      </td>
                    </tr>
                    
                    <tr>
                      <td>5</td>
                      <td>APAKAH ANDA PERNAH MENGALAMI KECELAKAAN LALU LINTAS?</td>
                      <td>
                        <?php if ($lok->jwb_celaka_lalin == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_celaka_lalin == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_celaka_lalin == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?> 
                      </td>
                    </tr>
                    
                    <tr>
                      <td>6</td>
                      <td>APAKAH ANDA PERNAH MENGALAMI PATAH TULANG?</td>
                      <td>
                        <?php if ($lok->jwb_patah_tulang == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_patah_tulang == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_patah_tulang == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>7</td>
                      <td>APAKAH ANDA PERNAH BEKERJA DI PT. YEMI SEBELUMNYA?</td>
                      <td>
                        <?php if ($lok->jwb_pernah_kerja == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_pernah_kerja == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_pernah_kerja == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>8</td>
                      <td>APAKAH ANDA BERENCANA MENIKAH DALAM 2 TAHUN INI?</td>
                      <td>
                        <?php if ($lok->jwb_nikah_tahun == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_nikah_tahun == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_nikah_tahun == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>9</td>
                      <td>APAKAH ANDA BERSEDIA BEKERJA SHIFT?</td>
                      <td>
                        <?php if ($lok->jwb_shift== null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_shift == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_shift == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>10</td>
                      <td>APAKAH ANDA BERSEDIA BEKERJA BERDIRI SELAMA 8 JAM?</td>
                      <td>
                        <?php if ($lok->jwb_kerja == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_kerja == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_kerja == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>11</td>
                      <td>APAKAH ANDA BERSEDIA TIDAK MENIKAH SELAMA MASA KONTRAK?</td>
                      <td>
                        <?php if ($lok->jwb_nikah_kontrak == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_nikah_kontrak == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_nikah_kontrak == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>12</td>
                      <td>APAKAH ANDA BERSEDIA TIDAK KULIAH SELAMA BEKERJA DI PT. YEMI?</td>
                      <td>
                        <?php if ($lok->jwb_kuliah == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_kuliah == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_kuliah == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>13</td>
                      <td>APAKAH ANDA BERSEDIA DITEMPATKAN DI AREA MANA SAJA DI PT. YEMI?</td>
                      <td>
                        <?php if ($lok->jwb_area == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_area == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_area == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>
                    
                    <tr>
                      <td>14</td>
                      <td>APAKAH ANDA BERSEDIA TIDAK MEROKOK SELAMA BEKERJA DI PT. YEMI?</td>
                      <td>
                        <?php if ($lok->jwb_no_rokok == null): ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                        <?php elseif ($lok->jwb_no_rokok == 0): ?>
                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                        <?php elseif($lok->jwb_no_rokok == 1): ?>
                          <h4><span class="badge badge-success">YA</span></h4>
                        <?php else: ?>
                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                        <?php endif ?>  
                      </td>
                    </tr>

                    <?php endforeach ?>
                  </tbody>
                </table>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

