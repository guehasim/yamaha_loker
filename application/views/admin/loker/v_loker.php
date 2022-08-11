<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>List Lowongan Kerja</h2>
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
            <a href="<?php echo base_url() ?>admin/new_loker"><button type="button" class="btn btn-success  btn-sm">Tambah Loker Baru</button></a>
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
                  <th>Nama Loker</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($loker->result() as $lok): ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $lok->lok_nama;?></td>
                  <td><?php echo date('d F Y', strtotime($lok->lok_tgl_awal));?></td>
                  <td><?php echo date('d F Y', strtotime($lok->lok_tgl_akhir));?></td>
                  <th>
                    <?php
                      if ($lok->lok_status == 0) {
                         ?><h4><span class="badge badge-success">Aktif</span></h4>
                         <?php
                       } else{?>
                        <h4><span class="badge badge-danger">Tidak Aktif</span></h4><?php
                       }
                       ?>
                  </th>
                  <td>
                      <a href="<?php echo base_url() ?>admin/get_loker?us=<?php echo $lok->ID_Loker; ?>"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</button></a>              
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $lok->ID_Loker;?>"><i class="fa fa-trash-o"></i>  Delete</button>                
                  </td>
                </tr>

                <!-- modal delete -->
                <div class="modal fade" id="hapus-info-<?php echo $lok->ID_Loker;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content edit-dialog-modal">
                      <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>admin/hapus_loker" method="post">    
                        <?php
                          $this->load->helper("form");
                        ?>
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Hapus Data Lowongan</h4>                                  
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo $lok->ID_Loker;?>">
                          Apakah anda benar mau menghapus data "<?php echo $lok->lok_nama;?>" ini?
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  Delete</button>
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

        