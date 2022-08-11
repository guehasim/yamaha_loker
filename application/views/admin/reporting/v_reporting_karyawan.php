        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Reporting Karyawan</h2>
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
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                        <form method="post" action="<?php echo base_url(); ?>admin/aksi_karyawan">
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
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No Telp/HP</th>
                          <th>Bidang</th>
                          <th>Tanggal Melamar</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($pelamar->result() as $pel): ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $pel->nik_ktp;?></td>
                          <td><?php echo $pel->nama_ktp;?></td>
                          <td><?php echo $pel->email;?></td>
                          <td><?php echo $pel->nohp;?></td>
                          <td><?php echo $pel->lok_nama ?></td>
                          <td><?php echo date('d F Y', strtotime($pel->TGL_Lamar));?></td>
                          <td>
                            <?php if ($pel->area == NULL && $pel->status_kawin == NULL): ?>
                             <a href="<?php echo base_url() ?>admin/gonewkelengkapan?us=<?php echo $pel->ID_Pelamar; ?>"><button class="btn btn-info btn-sm"><i class="fa fa-folder"></i> View dan Lengkapi</button></a>
                            <?php else: ?>
                            <a href="<?php echo base_url() ?>admin/view_data_lengkap?us=<?php echo $pel->ID_Pelamar; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View</button></a>
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
          </div>
        </div>
        <!-- /page content -->

        