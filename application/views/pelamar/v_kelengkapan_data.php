<!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h4>Kelengkapan Data Karyawan</h4>
            </br>
            <button type="button" class="btn btn-primary" onclick="history.back()"><i class="fa fa-mail-reply"></i> KEMBALI</button>
            </div>
          </div>

          <div class="clearfix"></div>
          <div>
              <?php echo $this->session->flashdata('msg'); ?>
            </div> 

          <div class="row">
            <div class="col-md-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Kepesertaan </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <?php if ($this->session->userdata('ses_kepesertaan') == '1'): ?>
                      
                      <?php foreach ($kepesertaan->result() as $al): ?> 
                              
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Kepesertaan</th>
                            <th>Nomor Kepesertaan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>BPJS Kesehatan</td>
                            <td><?php echo $al->NO_BPJS_Kes;?></td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>BPJS Ketenagakerjaan</td>
                            <td><?php echo $al->NO_BPJS_Kerja;?></td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>NPWP</td>
                            <td><?php echo $al->NO_NPWP;?></td>
                          </tr>
                        </tbody>
                      </table>
                        <?php endforeach ?>
                  <?php foreach ($kepesertaan->result() as $al): ?>                   
                  
                  <a href="<?php echo base_url() ?>pelamar/getkepesertaan?us=<?php echo $al->ID_Kepesertaan; ?>"> <button class="btn btn-info btn-sm" type="button">Edit Kepesertaan</button></a>
                  <?php endforeach ?>
                  <?php else: ?>
                    <a href="<?php echo base_url() ?>pelamar/gonewkepesertaan"><button class="btn btn-danger btn-sm" type="button">Lengkapi Kepesertaan</button></a>
                  <?php endif ?>


                  
                </div>
              </div>

            </div>

            <div class="col-md-6">

              <div class="x_panel">
                <div class="x_title">
                  <h2>Dokumen Berkendara</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <?php if ($this->session->userdata('ses_sim') == '1'): ?>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Jenis SIM</th>
                          <th>Nomor SIM</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <?php foreach ($pertanyaan->result() as $al): ?> 
                          <td>
                            <?php if ($al->jwb_sim == 1): ?>
                              <?php echo "SIM A";?>
                            <?php elseif($al->jwb_sim == 2): ?>
                              <?php echo "SIM B";?>
                            <?php elseif($al->jwb_sim == 3): ?>
                              <?php echo "SIM C";?>
                            <?php else: ?>
                              <?php echo "Tidak Memiliki SIM";?>
                            <?php endif ?>
                          </td>
                           <?php endforeach ?>
                          <?php foreach ($sim->result() as $al): ?> 
                          <td><?php echo $al->NO_SIM;?></td>
                          <?php endforeach ?>
                        </tr>
                      </tbody>
                    </table>
                  <?php foreach ($sim->result() as $al): ?>                   
                  <a href="<?php echo base_url() ?>pelamar/getsim?us=<?php echo $al->ID_SIM; ?>"> <button class="btn btn-info btn-sm" type="button">Edit Dokumen</button></a>
                  <?php endforeach ?>

                  <?php else: ?>
                    <a href="<?php echo base_url() ?>pelamar/gonewsim"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Dokumen</button></a>
                  <?php endif ?>
                  
                              
                              
                        
                </div>

              </div>

            </div>

            <div class="col-md-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Keluarga </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <?php if ($this->session->userdata('ses_keluarga') == '1'): ?>
                    <?php foreach ($keluarga->result() as $al): ?> 
                              
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
                              <td><?php echo $al->nama_ortu_ayah;?></td>
                              <td><?php echo $al->alamat_ortu_ayah;?></td>
                              <td><?php echo $al->telp_ortu_ayah;?></td>
                            </tr>
                            <tr>
                              <td>Ibu</td>
                              <td><?php echo $al->nama_ortu_ibu;?></td>
                              <td><?php echo $al->alamat_ortu_ibu;?></td>
                              <td><?php echo $al->telp_ortu_ibu;?></td>
                            </tr>
                            <tr>
                              <th rowspan="2" scope="row">Mertua</th>
                              <td>Ayah</td>
                              <td><?php echo $al->nama_mertua_ayah;?></td>
                              <td><?php echo $al->alamat_mertua_ayah;?></td>
                              <td><?php echo $al->telp_mertua_ayah;?></td>
                            </tr>
                            <tr>
                              <td>Ibu</td>
                              <td><?php echo $al->nama_mertua_ibu;?></td>
                              <td><?php echo $al->alamat_mertua_ibu;?></td>
                              <td><?php echo $al->telp_mertua_ibu;?></td>
                            </tr>


                            <tr>
                              <th rowspan="5" scope="row">Saudara</th>
                              <td>1</td>
                              <td><?php echo $al->nama_saudara_1;?></td>
                              <td><?php echo $al->alamat_saudara_1;?></td>
                              <td><?php echo $al->telp_saudara_1;?></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td><?php echo $al->nama_saudara_2;?></td>
                              <td><?php echo $al->alamat_saudara_2;?></td>
                              <td><?php echo $al->telp_saudara_2;?></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td><?php echo $al->nama_saudara_3;?></td>
                              <td><?php echo $al->alamat_saudara_3;?></td>
                              <td><?php echo $al->telp_saudara_2;?></td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td><?php echo $al->nama_saudara_4;?></td>
                              <td><?php echo $al->alamat_saudara_4;?></td>
                              <td><?php echo $al->telp_saudara_4;?></td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td><?php echo $al->nama_saudara_5;?></td>
                              <td><?php echo $al->alamat_saudara_5;?></td>
                              <td><?php echo $al->telp_saudara_5;?></td>
                            </tr>

                            <tr>
                              <th scope="row">Istri</th>
                              <td></td>
                              <td><?php echo $al->nama_istri;?></td>
                              <td><?php echo $al->alamat_istri;?></td>
                              <td><?php echo $al->telp_istri;?></td>
                            </tr>


                            <tr>
                              <th rowspan="4" scope="row">Anak</th>
                              <td>1</td>
                              <td><?php echo $al->nama_anak_1;?></td>
                              <td><?php echo $al->alamat_anak_1;?></td>
                              <td><?php echo $al->telp_anak_1;?></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td><?php echo $al->nama_anak_2;?></td>
                              <td><?php echo $al->alamat_anak_2;?></td>
                              <td><?php echo $al->telp_anak_2;?></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td><?php echo $al->nama_anak_3;?></td>
                              <td><?php echo $al->alamat_anak_3;?></td>
                              <td><?php echo $al->telp_anak_3;?></td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td><?php echo $al->nama_anak_4;?></td>
                              <td><?php echo $al->alamat_anak_4;?></td>
                              <td><?php echo $al->telp_anak_4;?></td>
                            </tr>

                          </tbody>
                        </table>
                        <?php endforeach ?>
                        <?php foreach ($keluarga->result() as $al): ?>                   
                          <a href="<?php echo base_url() ?>pelamar/getkeluarga?us=<?php echo $al->ID_Keluarga; ?>"> <button class="btn btn-info btn-sm" type="button">Edit Dokumen</button></a>
                        <?php endforeach ?>
                  <?php else: ?>
                    <a href="<?php echo base_url() ?>pelamar/gonewkeluarga"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Keluarga</button></a>
                  <?php endif ?>

                  
                </div>
              </div>

            </div>

            <div class="col-md-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Kontak Darurat yang dapat di hubungi </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <?php if ($this->session->userdata('ses_darurat') == '1'): ?>
                 <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>No.Telp/HP</th>
                        <th>Hubungan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php $no = 1; foreach ($darurat->result() as $al): ?> 
                    <tr>
                      <td><?php echo $no++;?></th>
                      <td><?php echo $al->nama_Darurat;?></td>
                      <td><?php echo $al->telp_Darurat;?></td>
                      <td><?php echo $al->hubungan_Darurat;?></td>
                      <td>
                        <a href="<?php echo base_url() ?>pelamar/getdarurat?us=<?php echo $al->ID_Darurat; ?>"> <button class="btn btn-info btn-sm" type="button"><i class="fa fa-pencil"></i> Edit</button></a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $al->ID_Darurat;?>"><i class="fa fa-trash-o"></i> Delete </button>
                      </td>
                    </tr>
                    <!-- modal delete -->
                    <div class="modal fade" id="hapus-info-<?php echo $al->ID_Darurat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content edit-dialog-modal">
                          <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>pelamar/hapus_darurat" method="post">    
                            <?php
                              $this->load->helper("form");
                            ?>
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Hapus Data Kontak Darurat</h4>                                  
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="id" value="<?php echo $al->ID_Darurat;?>">
                              Apakah anda benar mau menghapus data "<?php echo $al->nama_Darurat;?>" ini?
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-danger">Hapus</button>
                              <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
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
                      <a href="<?php echo base_url() ?>pelamar/gonewdarurat"><button class="btn btn-success btn-sm" type="button">Tambah Data Kontak Darurat</button></a>                           
                <?php else: ?>
                     <a href="<?php echo base_url() ?>pelamar/gonewdarurat"><button class="btn btn-danger btn-sm" type="button">Lengkapi Data Kontak Darurat</button></a>                           
                <?php endif ?>                              
                              
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>