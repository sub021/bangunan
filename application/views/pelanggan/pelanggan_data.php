<!-- Begin Page Content -->
<!-- <div class="container-fluid">
    <a href="<?= site_url('barang/add')?>" class="btn btn-sm btn-primary mb-3 "><i class="fas fa-plus fa-sm"></i> Tambah Data Barang</a> -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th >No</th>
                                <th>Username</th>
                                <th >Nama Pelanggan</th>
                                <th >Alamat</th>
                                <th >Status</th>
                               
                            </tr>

                        </thead>
                        <?php
                        $no = 1;
                        foreach($data_pelanggan->result()as $data){
                        ?>

                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->username?></td>
                                <td><?=$data->nama?></td>
                                <td><?=$data->alamat?></td>
                                <td><?php $status = $data->status ?>
                                      <?php if ($status == "non_konfirmasi") : ?>
                                          <div class="input-group-btn">
                                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Non konfirmasin
                                                  <!-- <span class="fa fa-caret-down"></span> -->
                                              </button>
                                              <ul class="dropdown-menu">
                                                  <li><a href="<?php echo site_url("pelanggan/non_konfirmasi/"); ?><?php echo $data->id_pelanggan ?>">Non konfirmasin</a></li>
                                                  <li><a href="<?php echo site_url("pelanggan/konfirmasi/"); ?><?php echo $data->id_pelanggan ?>">konfirmasin</a></li>

                                              </ul>
                                          </div>

                                      <?php elseif ($status == "konfirmasi") : ?>
                                          <div class="input-group-btn">
                                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">konfirmasin
                                                  <!-- <span class="fa fa-caret-down"></span>-->
                                              </button>
                                              <ul class="dropdown-menu">
                                              <li><a href="<?php echo site_url("pelanggan/non_konfirmasi/"); ?><?php echo $data->id_pelanggan ?>">Non konfirmasin</a></li>
                                                  <li><a href="<?php echo site_url("pelanggan/konfirmasi/"); ?><?php echo $data->id_pelanggan ?>">konfirmasin</a></li>
                                              </ul>
                                          </div>
                                      <?php endif; ?>



                                
                                
                                </td>
                                
                        <?php }?>

                            </thead>

                    </table>
                </div>
            </div>
