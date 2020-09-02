<div class="container-fluid">
<div class="card">
  <h5 class="card-header">Transaksi</h5>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
    
    <form action="" method="post">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Nama Barang</label>
                
        
                <select name="id_barang" id="" class="form-control">
                
                   <?php foreach($data_barang->result() as $data){ ?>
                    <option value="<?= $data->id_barang?>"><?= $data->nama_barang; ?></option>
                <?php } ?>
                </select>
            </div>
        </div>
    <div class="col-md-6">
        <div class="form-group">
                <label for="">Nama Pelanggan</label>
                <select name="id_pelanggan" id="" class="form-control">
                <option value="">--pilih--</option>
                <?php foreach($data_pelanggan->result() as $data){ ?>

                    <option value="<?= $data->id_pelanggan?>"><?= $data->nama; ?></option>
                <?php } ?>
                </select>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number" name="jumlah" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm btn-flat">add</button>
                <?php echo anchor('Transaksi/selesai','Selesai',['class'=>'btn btn-info btn-sm btn-flat']) ?>
            </div>
        </div>
        </form>        
    </div>
    <table class="table">
    <div class="card-header">
    <thead>
              <tr class="success">
            <th colspan="6"> Detail Transaksi</th>
              </tr>
        </div>
        
        <th>No</th>
      <th>Nama Barang</th>
      <th>Jumlah</th>
      <th>Harga Barang</th>
      <th>Subtotal</th>
      <th> Cancel</th>
        </thead>
        
    <?php
                        $no = 1;
                        foreach($penjualan->result()as $data){
                            $qty=$data->jumlah;
                            $hrg=$data->harga_jual;
                            $total=$qty*$hrg;
                            ?>
                            <tr>
    <td><?= $no++; ?></td>
    <td><?= $data->nama_barang; ?></td>
    <td><?= $data->jumlah; ?></td>
    <td><?= $data->harga_jual; ?></td>
    <td><?= $total; ?></td>
    <td><?php echo anchor('Transaksi/cancel/'.$data->id_jual,'Cancel',['class'=>'btn btn-danger']) ?></td></tr>
                        <?php } ?>

                            </tr>
    </table>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

</div>