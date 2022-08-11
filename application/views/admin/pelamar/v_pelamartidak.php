        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>List Akun Pelamar Data Tidak Lengkap</h2>
              </div>

            </div>

            <div class="clearfix"></div>

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
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($pelamar->result() as $lok): ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $lok->nik_ktp;?></td>
                            <td><?php echo $lok->nama_ktp;?></td>
                            <td>

                            <a href="<?php echo base_url() ?>admin/data_pelamar_detail?us=<?php echo $lok->ID_Pelamar;?>"> <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View</button></a>
                              <a href="<?php echo base_url() ?>admin/get_pelamar?us=<?php echo $lok->ID_Pelamar;?>"> <button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</button></a> 
                              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $lok->ID_Pelamar;?>"><i class="fa fa-trash-o"></i> Delete </button>
                            </td>
                        </tr>


                        <!-- modal delete -->
                        <div class="modal fade" id="hapus-info-<?php echo $lok->ID_Pelamar;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content edit-dialog-modal">
                              <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>admin/hapus_pelamar" method="post">    
                                <?php
                                  $this->load->helper("form");
                                ?>
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Hapus Data Pelamar</h4>                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?php echo $lok->ID_Pelamar;?>">
                                  Apakah anda benar mau menghapus data "<?php echo $lok->nama_ktp;?>" ini?
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">Delete</button>
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

        