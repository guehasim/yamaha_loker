<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profil Pelamar</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div>
              <?php echo $this->session->flashdata('msg'); ?>
            </div> 

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar" class="image view view-first">
                          <!-- Current avatar -->
                          <?php foreach ($identitas->result() as $iden): ?>                           
                          
                          <img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/<?=$iden->image?>" style="width: 100%; display: block;">
                          
                          <div class="mask">
                              <p>Profil</p>
                              <div class="tools tools-bottom">
                                <a href="<?php echo base_url() ?>pelamar/getfotoprofile?us=<?php echo $iden->ID_PelamarIdentitas;?>"><i class="fa fa-pencil"></i></a>
                              </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                      </div>
                    </br>
                      <?php if ($this->session->userdata('ses_identitas') == '1'): ?>
                      <?php foreach ($akun->result() as $kun): ?>  
                          <h4>NIK:</h4>                      
                          <h4><b><?php echo $kun->nik_ktp;?></b></h4>
                      <?php endforeach ?>
                      <?php foreach ($akun->result() as $kun): ?>
                          <h4>NAMA:</h4>
                          <h4><b><?php echo $kun->nama_ktp;?></b></h4>
                      <?php endforeach ?>
                      <?php foreach ($akun->result() as $kun): ?>                     
                          <h4>EMAIL:</h4>
                          <h4><b><?php echo $kun->email;?></b></h4>
                      <?php endforeach ?>
                      <?php else: ?>
                        <a href="<?php echo base_url() ?>pelamar/gonewidentitas"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Identitas</button></a>
                      <?php endif ?>

                      
                      <?php foreach ($status->result() as $st): ?>
                        <?php if ($st->status_recruitment == 1): ?>
                          <?php foreach ($identitas->result() as $iden): ?>
                            <a href="<?php echo base_url() ?>pelamar/getidentitas?us=<?php echo $iden->ID_PelamarIdentitas;?>"> <button class="btn btn-info btn-sm" type="button">Edit Identitas</button></a> 
                          <?php endforeach ?>
                        <?php else: ?>
                          
                        <?php endif ?>
                      <?php endforeach ?>
                      
                      
                    </div>
                    <div class="col-md-9 col-sm-9 ">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class=""><a href="#alamat" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Alamat</a>
                          </li>
                          <li role="presentation" class=""><a href="#ukuran" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ukuran</a>
                          </li>
                          <li role="presentation" class=""><a href="#pendidikan" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pendidikan</a>
                          </li>
                          <li role="presentation" class=""><a href="#pengalaman" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pengalaman Kerja</a>
                          </li>
                          <li role="presentation" class=""><a href="#pertanyaan" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pertanyaan</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="alamat" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              <?php if ($this->session->userdata('ses_alamat') == '1'): ?>
                              <?php foreach ($alamat->result() as $al): ?> 
                              
                              <table class="table table-hover">
                                <thead>
                                  <tr>
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
                                  <tr>
                                    <th scope="row">KTP</th>
                                    <td><?php echo $al->alamat_ktp;?></td>
                                    <td><?php echo $al->rt_ktp;?>/<?php echo $al->rw_ktp;?></td>
                                    <td><?php echo $al->kelurahan_ktp;?></td>
                                    <td><?php echo $al->kecamatan_ktp;?></td>
                                    <td><?php echo $al->kota_ktp;?></td>
                                    <td><?php echo $al->kodepos_ktp;?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Domisili</th>
                                    <td><?php echo $al->alamat_domisili;?></td>
                                    <td><?php echo $al->rt_domisili;?>/<?php echo $al->rw_domisili;?></td>
                                    <td><?php echo $al->kelurahan_domisili;?></td>
                                    <td><?php echo $al->kecamatan_domisili;?></td>
                                    <td><?php echo $al->kota_domisili;?></td>
                                    <td><?php echo $al->kodepos_domisili;?></td>
                                  </tr>
                                </tbody>
                              </table>

                              <?php endforeach ?>
                            
                            <?php foreach ($status->result() as $st): ?>
                              <?php if ($st->status_recruitment == 1): ?>
                                <a href="<?php echo base_url() ?>pelamar/getalamat?us=<?php echo $al->ID_PelamarAlamat; ?>"> <button class="btn btn-info btn-sm" type="button">Edit Alamat</button></a>
                              <?php else: ?>
                                
                              <?php endif ?>
                            <?php endforeach ?>
                                  
                              <?php else: ?>
                                <a href="<?php echo base_url() ?>pelamar/gonewalamat"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Alamat</button></a>
                              <?php endif ?>                              
                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="ukuran" aria-labelledby="profile-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              <?php if ($this->session->userdata('ses_ukuran') == '1'): ?>
                              <?php foreach ($ukuran->result() as $uk): ?> 

                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Tinggi Badan (CM)</th>
                                      <th>Berat Badan (KG)</th>
                                      <th>Ukuran Baju</th>
                                      <th>Ukuran Sepatu (CM)</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><?php echo $uk->tinggi_badan_cm;?> CM</td>
                                      <td><?php echo $uk->berat_badan_kg;?> KG</td>
                                      <td><?php echo $uk->ukuran_baju;?></td>
                                      <td><?php echo $uk->ukuran_sepatu_cm;?> CM</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <?php endforeach ?>
                              
                              <?php foreach ($status->result() as $st): ?>
                              <?php if ($st->status_recruitment == 1): ?>
                                 <a href="<?php echo base_url() ?>pelamar/getukuran?us=<?php echo $uk->ID_PelamarUkuran; ?>"> <button class="btn btn-info btn-sm" type="button">Edit Ukuran</button></a>
                              <?php else: ?>
                                
                              <?php endif ?>
                                
                              <?php endforeach ?>
                                 
                              <?php else: ?>
                                <a href="<?php echo base_url() ?>pelamar/gonewukuran"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Ukuran</button></a>
                              <?php endif ?>  
                              
                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="pendidikan" aria-labelledby="profile-tab">
                            <!-- start recent activity -->
                            <ul class="messages">
                              <?php if ($this->session->userdata('ses_pendidikan') == '1'): ?>
                               
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Pendidikan</th>
                                      <th>Sekolah/Universitas</th>
                                      <th>Jurusan</th>
                                      <th>Kota Asal</th>
                                      <th>Tahun Masuk</th>
                                      <th>Tahun Lulus</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($pendidikan->result() as $pen): ?>
                                    <tr>
                                      <td>
                                        <?php if ($pen->pendidikan == '1'): ?>
                                          <?php echo "SD/MI";?>
                                        <?php elseif ($pen->pendidikan == '2'): ?>
                                          <?php echo "SMP/MTs";?>
                                        <?php elseif ($pen->pendidikan == '3'): ?>
                                          <?php echo "SMA/SMK";?>
                                        <?php elseif ($pen->pendidikan == '4'): ?>
                                          <?php echo "D3";?>
                                        <?php elseif ($pen->pendidikan == '5'): ?>
                                          <?php echo "S1";?>
                                        <?php elseif ($pen->pendidikan == '6'): ?>
                                          <?php echo "S2";?>
                                        <?php elseif ($pen->pendidikan == '7'): ?>
                                          <?php echo "S3";?>
                                        <?php else: ?>
                                          <?php echo "Tidak Sekolah";?>
                                        <?php endif ?>
                                      </td>
                                      <td><?php echo $pen->asal_pendidikan;?></td>
                                      <td><?php echo $pen->jurusan;?></td>
                                      <td><?php echo $pen->tempat_pendidikan;?></td>
                                      <td><?php echo $pen->thn_masuk;?></td>
                                      <td><?php echo $pen->thn_lulus;?></td>
                                      <td>
                                        <a href="<?php echo base_url() ?>pelamar/getpendidikan?us=<?php echo $pen->ID_PelamarPendidikan;?>"><button type="button" class="btn btn-info btn-sm">Edit</button></a>              
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $pen->ID_PelamarPendidikan;?>">Hapus</button>
                                      </td>
                                    </tr>
                                    <!-- modal delete -->
                                    <div class="modal fade" id="hapus-info-<?php echo $pen->ID_PelamarPendidikan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content edit-dialog-modal">
                                          <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>pelamar/hapus_pendidikan" method="post">    
                                            <?php
                                              $this->load->helper("form");
                                            ?>
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel">Hapus Data Pendidikan</h4>                                  
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                              <input type="hidden" name="id" value="<?php echo $peng->ID_PelamarPendidikan;?>">
                                              Apakah anda benar mau menghapus Pendidikan di "<?php echo $pen->asal_pendidikan;?>" ini?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                              <button class="btn btn-default btn-sm" data-dismiss="modal" type="button">Cancel</button>
                                            </div>
                                          </form>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>
                                    <!-- end modal delete-->

                              <?php endforeach ?>
                                  </tbody>
                                </table>
                            <?php foreach ($status->result() as $st): ?>
                              <?php if ($st->status_recruitment == 1): ?>
                                <a href="<?php echo base_url() ?>pelamar/gonewpendidikan"> <button class="btn btn-success btn-sm" type="button">Tambah Pendidikan</button></a>
                              <?php else: ?>
                                
                              <?php endif ?>
                            <?php endforeach ?>
                              
                              <?php else: ?>
                                <a href="<?php echo base_url() ?>pelamar/gonewpendidikan"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Pendidikan</button></a>
                              <?php endif ?>  
                              
                            </ul>
                            <!-- end recent activity -->
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="pengalaman" aria-labelledby="profile-tab">
                            <!-- start recent activity -->
                            <ul class="messages">

                              <?php if ($this->session->userdata('ses_pengalamankerja') == '1'): ?>
                                <table class="data table table-striped no-margin">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama Perusahaan</th>
                                      <th>Bagian</th>
                                      <th>Tahun</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $no = 1; foreach ($pengalamankerja->result() as $peng): ?>
                                    <tr>
                                      <td><?php echo $no++;?></td>
                                      <td><?php echo $peng->peng_perusahaan;?></td>
                                      <td><?php echo $peng->peng_bidang;?></td>
                                      <td><?php echo $peng->peng_tahun;?></td>
                                      <td>
                                        <a href="<?php echo base_url() ?>pelamar/getpengalaman?us=<?php echo $peng->ID_PelamarPengalaman;?>"><button type="button" class="btn btn-info btn-sm">Edit</button></a>              
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $peng->ID_PelamarPengalaman;?>">Hapus</button> 
                                      </td>
                                    </tr>

                                    <!-- modal delete -->
                                    <div class="modal fade" id="hapus-info-<?php echo $peng->ID_PelamarPengalaman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content edit-dialog-modal">
                                          <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>pelamar/hapus_pengalaman" method="post">    
                                            <?php
                                              $this->load->helper("form");
                                            ?>
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel">Hapus Data Pengalaman Kerja</h4>                                  
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                              <input type="hidden" name="id" value="<?php echo $peng->ID_PelamarPengalaman;?>">
                                              Apakah anda benar mau menghapus Pengalaman di perusahaan "<?php echo $peng->peng_perusahaan;?>" ini?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                              <button class="btn btn-default btn-sm" data-dismiss="modal" type="button">Cancel</button>
                                            </div>
                                          </form>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>
                                    <!-- end modal delete-->

                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                                <?php foreach ($status->result() as $st): ?>
                                  <?php if ($st->status_recruitment == 1): ?>
                                   
                                  <?php else: ?>
                                    
                                  <?php endif ?>
                                <?php endforeach ?>
                                <a href="<?php echo base_url() ?>pelamar/gonewpengalamankerja"><button class="btn btn-success btn-sm" type="button">Tambah Pengalaman Kerja</button></a>
                                
                              <?php else: ?>
                                <a href="<?php echo base_url() ?>pelamar/gonewpengalamankerja"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Pengalaman Kerja</button></a>
                              <?php endif ?>                                
                            <!-- end user projects -->
                            </ul>
                            <!-- end recent activity -->
                          </div>



                          <div role="tabpanel" class="tab-pane fade" id="pertanyaan" aria-labelledby="profile-tab">
                            <!-- start recent activity -->
                            <ul class="messages">

                              <?php if ($this->session->userdata('ses_pertanyaan') == '1'): ?>
                                <table class="data table table-striped no-margin">
                                  <thead>
                                    <tr>
                                      <th>No.</th>
                                      <th>Pertanyaan</th>
                                      <th>Jawaban</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($pertanyaan->result() as $per): ?>
                                   
                                    <tr>
                                      <td>1</td>
                                      <td>APAKAH ANDA BERKACAMATA?</td>
                                      <td>
                                        <?php if ($per->jwb_kacamata == null): ?>       
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_kacamata == 0): ?>                                
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif ($per->jwb_kacamata == 1): ?>
                                          <h4><span class="badge badge-success">YA</span></h4>
                                          Kanan : <?php echo $per->kaca_kanan;?>
                                          Kiri : <?php echo $per->kaca_kiri;?>  
                                        <?php else: ?>                                          
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>                                  
                                        <?php endif ?>
                                      </td>

                                    </tr>

                                    <tr>
                                      <td>2</td>
                                      <td>APAKAH ANDA MEROKOK?</td>
                                      <td>
                                        <?php if ($per->jwb_rokok == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_rokok == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_rokok == 1): ?>
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
                                        <?php if ($per->jwb_sim == null): ?>
                                        <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_sim == 1): ?>
                                        <?php echo "SIM A"; ?>                                       
                                        <?php elseif ($per->jwb_sim == 2): ?>
                                        <?php echo "SIM B"; ?>                                       
                                        <?php elseif ($per->jwb_sim == 3): ?>
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
                                        <?php if ($per->jwb_celaka_kerja == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_celaka_kerja == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_celaka_kerja == 1): ?>
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
                                        <?php if ($per->jwb_celaka_lalin == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_celaka_lalin == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_celaka_lalin == 1): ?>
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
                                        <?php if ($per->jwb_patah_tulang == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_patah_tulang == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_patah_tulang == 1): ?>
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
                                        <?php if ($per->jwb_pernah_kerja == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_pernah_kerja == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_pernah_kerja == 1): ?>
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
                                        <?php if ($per->jwb_nikah_tahun == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_nikah_tahun == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_nikah_tahun == 1): ?>
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
                                        <?php if ($per->jwb_shift== null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_shift == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_shift == 1): ?>
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
                                        <?php if ($per->jwb_kerja == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_kerja == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_kerja == 1): ?>
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
                                        <?php if ($per->jwb_nikah_kontrak == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_nikah_kontrak == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_nikah_kontrak == 1): ?>
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
                                        <?php if ($per->jwb_kuliah == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_kuliah == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_kuliah == 1): ?>
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
                                        <?php if ($per->jwb_area == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_area == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_area == 1): ?>
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
                                        <?php if ($per->jwb_no_rokok == null): ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>
                                        <?php elseif ($per->jwb_no_rokok == 0): ?>
                                          <h4><span class="badge badge-danger">TIDAK</span></h4>
                                        <?php elseif($per->jwb_no_rokok == 1): ?>
                                          <h4><span class="badge badge-success">YA</span></h4>
                                        <?php else: ?>
                                          <h4><span class="badge badge-light">Belum Terisi</span></h4>  
                                        <?php endif ?>  
                                      </td>
                                    </tr>
                                    
                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                                <?php foreach ($status->result() as $st): ?>
                                  <?php if ($st->status_recruitment == 1): ?>
                                    <?php foreach ($pertanyaan->result() as $per): ?>
                                      <a href="<?php echo base_url() ?>pelamar/getpertanyaan?us=<?php echo $per->ID_Pelamar; ?>"><button class="btn btn-info btn-sm" type="button">Edit Data Pertanyaan</button></a>
                                    <?php endforeach ?>
                                  <?php else: ?>
                                    
                                  <?php endif ?>
                                <?php endforeach ?>
                                
                              <?php else: ?>
                                <a href="<?php echo base_url() ?>pelamar/gonewpertanyaan"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Pertanyaan</button></a>
                              <?php endif ?>    
                            </ul>
                            <!-- end recent activity -->
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>