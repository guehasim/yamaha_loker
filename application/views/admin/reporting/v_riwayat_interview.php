        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Riwayat Pelamar Gagal Tahap Psikotes</h2>
              </div>

            </div>

            <div class="clearfix"></div>
            <div>
              <?php echo $this->session->flashdata('msg'); ?>
            </div> 

            <div class="row">              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="<?php echo base_url() ?>admin/status_interview"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-mail-reply"></i> KEMBALI</button></a>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                        <form method="post" action="<?php echo base_url(); ?>admin/riwayat_aksi_interview">
                        <div class="col-sm-3 col-sm-3">
                          <?php
                            if(isset($_POST['tgl_awal'])){
                              if ($_POST['tgl_awal'] == NULL) {
                                $oke_awal = "";
                              }else{
                                $oke_awal = $_POST['tgl_awal'];
                              }
                            }else{
                              $oke_awal = "";
                            }
                              
                          ?>
                          <input id="birthday" name="tgl_awal" value="<?php echo $oke_awal;?>" class="date-picker form-control" type="text" onfocus="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" placeholder="Tanggal Awal">
                           <script>
                              function timeFunctionLong(input) {
                                setTimeout(function() {
                                  input.type = 'text';
                                }, 60000);
                              }
                            </script>
                          </div>
                          <div class="col-sm-3 col-sm-3">
                          <?php
                            if(isset($_POST['tgl_akhir'])){
                              if ($_POST['tgl_akhir'] == NULL) {
                                $oke_akhir = "";
                              }else{
                                $oke_akhir = $_POST['tgl_akhir'];
                              }
                            }else{
                              $oke_akhir = "";
                            }
                              
                          ?>
                          <input id="birthday" name="tgl_akhir" value="<?php echo $oke_akhir;?>" class="date-picker form-control" type="text" onfocus="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" placeholder="Tanggal Akhir">
                           <script>
                              function timeFunctionLong(input) {
                                setTimeout(function() {
                                  input.type = 'text';
                                }, 60000);
                              }
                            </script>
                          </div>

                          <div class="col-md-3 col-sm-3 ">
                            <select class="form-control" name="bidang" >
                              <option value="">--Pilih Bidang--</option>
                              <?php foreach ($loker->result() as $rs):
                                  if($_POST['bidang'] == NULL){
                                    $DispSelected_Bidang = "";
                                  }else{
                                    if($_POST['bidang'] == $rs->ID_Loker){
                                      $DispSelected_Bidang = "Selected";
                                    }else{
                                      $DispSelected_Bidang = "";
                                    }
                                  }
                                  
                               ?>
                                <option value="<?php echo $rs->ID_Loker;?>" <?php echo"$DispSelected_Bidang"; ?> >
                                  <?php echo $rs->lok_nama;?>
                                </option>
                              <?php endforeach ?>
                              
                            </select>
                          </div>
                          <div class="col-md-3 col-sm-3 ">
                            <input type="submit" name="btn" class="btn btn-info btn-xs" value="Cari" />
                          </div>
                          <div>
                          </div>
                        </form>                         
                          </br>
                          </br>
                          </br>

                        
                          <div class="col-sm-12">                            
                            
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Bidang</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No Telp/HP</th>
                          <th>Tanggal Melamar</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($pelamar->result() as $pel): ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $pel->lok_nama;?></td>
                          <td><?php echo $pel->nik_ktp;?></td>
                          <td><?php echo $pel->nama_ktp;?></td>
                          <td><?php echo $pel->email;?></td>
                          <td><?php echo $pel->nohp;?></td>
                          <td><?php echo date('d F Y', strtotime($pel->TGL_Lamar));?></td>
                          <td>                            
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#masuk-info-<?php echo $pel->ID_PelamarJoin;?>"><i class="fa fa-check"></i> Aktif Kembali </button>                                            
                          </td>
                        </tr>

                        <!-- modal gagal -->
                        <div class="modal fade" id="masuk-info-<?php echo $pel->ID_PelamarJoin;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content edit-dialog-modal">
                              <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>admin/pelamar_masuk" method="post">    
                                <?php
                                  $this->load->helper("form");
                                ?>
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Pelamar Aktif Kembali</h4>                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?php echo $pel->ID_PelamarJoin;?>">                                  
                                  <input type="hidden" name="id_status" value="<?php echo $pel->status_Join;?>">
                                  Apakah anda benar "<?php echo $pel->nama_ktp;?>" Aktif kembali?
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Aktif</button>
                                  <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- end modal gagal-->
                        
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
          </div>
        </div>
        <!-- /page content -->

        