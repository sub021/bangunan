<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang Masuk</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php //echo validation_errors(); ?>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
                     <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
            <div class="form-row">
            <div class="form-group col has-error">
                    <label for="inputAddress">Kode Barang</label>
                    <select name="id_barang" id="" class="form-control">
                    <?php foreach ($data_barang->result() as $data) {?>
                    <option value="<?=$data->id_barang?>"><?=$data->kode_barang?>|<?=$data->nama_barang?></option>
                    <?php }?>
                    </select>
                <?= form_error('id_barang')?>
            </div>

            <div class="form-group col has-error">
                    <label for="inputAddress">Nama Supplier</label>
                    <select name="id_supplier" id="" class="form-control">
                    <?php foreach ($data_supplier->result() as $data) {?>
                    <option value="<?=$data->id_supplier?>"><?=$data->nama_supplier?></option>
                    <?php }?>
                    </select>
                <?= form_error('id_supplier')?>
            </div>

            </div>
            
            
            <div class="form-row">
                <div class="form-group">
                    <label for="inputAddress">Harga Beli</label>
                    <input type="number" class="form-control" placeholder="Harga Beli" name="harga" require value="<?=set_value('harga')?>" id="satuan">
                    <?= form_error('harga')?>
                </div>
                <div class="form-group col-md col-xs">
                    <label for="inputAddress">Qty</label>
                    <input type="text" class="form-control" id="jumlah_barang" placeholder="Qty" name="qty" require value="<?=set_value('qty')?>">
                    <?= form_error('qty')?>
                 </div>
                <div class="form-group col-md col-xs has-error">
                    <label for="inputEmail4">Total</label>
                    <input type="number" class="form-control" id="total" name="total" readonly value="<?=set_value('total')?>" require >
                    <?= form_error('total')?>
                </div>
                <div class="form-group col-md col-xs">
                    <label for="inputPassword4">Tanggal</label>
                    <input type="date" class="form-control" id="" name="tanggal" require value="<?=set_value('tanggal')?>">
                 <?= form_error('date')?>
                </div>
            </div>
           
                             
          </div>
            <div class="modal-footer">
            <a href="<?= site_url('barang_masuk') ?>">
                <div class="btn btn-warning"><i class="fas fa-undo">Kembali</i></div>
            </a>
              <button type="submit" class="btn btn-success btn-flat" id="simpan">Simpan</button>
            </div>
            </form>

            </div>
</div>

    