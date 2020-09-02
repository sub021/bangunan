<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Barang</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php //echo validation_errors(); ?>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
        <div class="form-group has-error">
                <label for="inputAddress">Kode Barang</label>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <input type="hidden" name="id_barang" value="<?=$row->id_barang?>"> 
                <input type="text" class="form-control" id="inputAddress" placeholder="Kode Barang" name="kode_barang" value="<?=$row->kode_barang?>" readonly>
                <?= form_error('kode_barang')?>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nama Barang</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="nama" name="nama" require value="<?=$row->nama_barang?>">
                <?= form_error('nama')?>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 has-error">
                <label for="inputEmail4">Stok </label>
                <input type="number" class="form-control" id="inputEmail4" name="stok" require value="<?=$row->stok?>">
                <?= form_error('stok')?>
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Harga Jual</label>
                <input type="number" class="form-control" id="inputPassword4" name="harga" require value="<?=$row->harga_jual?>">
                <?= form_error('harga')?>
            </div>
            </div>
            
                             
          </div>
            <div class="modal-footer">
            <a href="<?= site_url('barang') ?>">
                <div class="btn btn-warning"><i class="fas fa-undo">Kembali</i></div>
            </a>
              <button type="submit" class="btn btn-success btn-flat" id="simpan">Simpan</button>
            </div>
            </form>

            </div>
</div>