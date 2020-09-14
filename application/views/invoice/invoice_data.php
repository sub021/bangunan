<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Invoice</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th >No</th>
                                <th>Kode Invoice</th>
                                <th >Nama Pemesanan</th>
                                <th >Aksi</th>
 
                            </tr>

                        </thead>
                        <?php
                        $no = 1;
                        foreach($data_invoice->result()as $data){
                        ?>

                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->kode_invoice?></td>
                                <td><?=$data->nama?></td>
                                
                                
                                <td>
                                 <a href="<?= site_url('invoice/nota/'.$data->id_invoice)?>" class="btn btn-primary btn-xs " target="_blank"><i class="fas fa-print fa-sm"></i></a>
                                
                                </td>
                                

                                <!-- end foeach -->
                        <?php }?>

                            </thead>

                    </table>
                </div>
            </div>
<!-- modal -->
<?php foreach($data_invoice->result()as $data){ ?>
<div class="modal fade" id="modaledit<?php echo $data->id_invoice;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open(base_url('invoice/update_invoice'), 'class="form-horizontal" enctype="multipart/form-data"');  ?> 
      <input type="hidden" class="form-control" name="id_invoice" value="<?= $data->id_invoice?>"></input>
        <div class="form-group">
        <label> Upload Struk Pembayaran</label>
        <input type="file" class="form-control" name="gambar"></input>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-flat" id="simpan">Update</button>
      </div>
      </div>
      <?php echo form_close( ); ?>
      
    </div>
  </div>
</div>
<?php } ?>