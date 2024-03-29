<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang</h6>
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
                <input type="text" class="form-control" id="kode_barang" placeholder="kode barang" name="kode_barang" require value="KB<?= sprintf("%04s",$kode_barang)?>" readonly>
                <?= form_error('kode_barang')?>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nama Barang</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="nama" name="nama" require value="<?=set_value('nama')?>">
                <?= form_error('nama')?>
            </div>
            <div class="form-row">
                <!-- <div class="form-group col-md-6 has-error">
                <label for="inputEmail4">Stok</label>
                <input type="number" class="form-control" id="inputEmail4" name="stok" require value="<?=set_value('stok')?>">
                <?= form_error('stok')?>
                </div> -->
                <div class="form-group col-md-6">
                <label for="inputPassword4">Harga Jual</label>
                <input type="text" class="form-control" id="" name="harga" require value="<?=set_value('harga')?>">
                <?= form_error('harga')?>
            </div>
            <div class="form-group col-md">
                <label for="inputPassword4">Gambar</label>
                <input type="file" class="form-control" id="" name="gambar" require >
                <?= form_error('gambar')?>
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