        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Reporting Pelamar</h2>
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
                    <a href="<?php echo base_url() ?>admin/riwayat_status_pelamar"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-book"></i> Riwayat Gagal</button></a>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                        <form method="post" action="<?php echo base_url(); ?>admin/aksi_pelamar">
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
                            <input type="submit" name="btn" class="btn btn-dark btn-xs" formtarget="_blank" value="Print" />
                            <input type="submit" name="btn" class="btn btn-success btn-xs" value="Excel" />
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
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tahap-info-<?php echo $pel->ID_PelamarJoin;?>"><i class="fa fa-thumbs-up"></i> Lolos Administrasi </button>                            
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#gagal-info-<?php echo $pel->ID_PelamarJoin;?>"><i class="fa fa-close"></i> Gagal </button>                                            
                          </td>
                        </tr>

                        <!-- modal ubah status -->
                        <div class="modal fade" id="tahap-info-<?php echo $pel->ID_PelamarJoin;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content edit-dialog-modal">
                              <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>admin/pelamar_naik_ketahap" method="post">    
                                <?php
                                  $this->load->helper("form");
                                ?>
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Lolos Tahap Administrasi</h4>                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?php echo $pel->ID_PelamarJoin;?>">                                  
                                  <input type="hidden" name="status" value="<?php echo $pel->status_Join;?>">
                                  Apakah anda benar mau menaikan status Pelamar "<?php echo $pel->nama_ktp;?>" ini lolos tahap Administrasi?
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Lolos Administrasi</button>
                                  <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- end modal ubah status-->

                        <!-- modal gagal -->
                        <div class="modal fade" id="gagal-info-<?php echo $pel->ID_PelamarJoin;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content edit-dialog-modal">
                              <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>admin/pelamar_gagal" method="post">    
                                <?php
                                  $this->load->helper("form");
                                ?>
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Pelamar Gagal</h4>                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?php echo $pel->ID_PelamarJoin;?>">                                  
                                  <input type="hidden" name="id_status" value="<?php echo $pel->status_Join;?>">
                                  Apakah anda benar "<?php echo $pel->nama_ktp;?>" gagal di tahap Interview?
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i> Gagal</button>
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

        