<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Supplier</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php //echo validation_errors(); ?>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
        <div class="form-group has-error">
                <label for="inputAddress">Kode Supplier</label>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <input type="text" class="form-control" id="inputAddress" placeholder="Kode Supplier" name="kode_supplier" require value="KS<?= sprintf("%04s",$kode_supplier)?>" readonly>
                <?= form_error('kode_supplier')?>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 has-error">
                    <label for="inputEmail4">Nama Supplier</label>
                    <input type="text" class="form-control" id="inputEmail4" name="nama" require placeholder="Nama Supplier" value="<?=set_value('nama')?>">
                    <?= form_error('nama')?>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Kota</label>
                    <input type="text" class="form-control" id="inputPassword4" name="kota" require placeholder="Kota" value="<?=set_value('kota')?>">
                    <?= form_error('kota')?>
                </div>
                <div class="form-group col-md-4 has-error">
                    <label for="inputEmail4">No.Telphone</label>
                    <input type="number" class="form-control" id="inputEmail4" name="telp" require placeholder="No Telp" value="<?=set_value('telp')?>">
                <?= form_error('telp')?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Alamat</label>
                <textarea name="alamat" class="form-control" id="" cols="30" rows="10"><?=set_value('alamat')?></textarea>
                
                <?= form_error('alamat')?>
            </div>
            
           
                             
          </div>
            <div class="modal-footer">
            <a href="<?= site_url('supplier') ?>">
                <div class="btn btn-warning"><i class="fas fa-undo">Kembali</i></div>
            </a>
              <button type="submit" class="btn btn-success btn-flat" id="simpan">Simpan</button>
            </div>
            </form>

            </div>
</div>