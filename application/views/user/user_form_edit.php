<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php //echo validation_errors(); ?>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
        <div class="form-group has-error">
                <label for="inputAddress">Username</label>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <input type="hidden" name="id_user" value="<?=$row->id_user?>"> 
                <input type="text" class="form-control" id="inputAddress" placeholder="Username" name="username" value="<?=$row->username?>">
                <?= form_error('username')?>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 has-error">
                <label for="inputEmail4">Password </label><small> (biarkan kosong jika tidak diganti)</small>
                <input type="password" class="form-control" id="inputEmail4" name="password" require>
                <?= form_error('password')?>
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Password Confirmasi</label>
                <input type="password" class="form-control" id="inputPassword4" name="pwd_conf" require>
                <?= form_error('pwd_conf')?>
            </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nama</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="nama" name="nama" require value="<?=$row->username?>">
                <?= form_error('nama')?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Level</label>
                <select class="form-control" id="exampleFormControlSelect1" name="level">
                    <option value="">--Pilih--</option>
                    <option value="1"<?=set_value('level')==1 ? "selected":null?>>Admin</option>
                    <option Value="2"<?=set_value('level')==2 ? "selected":null?>>Kasir</option>
                </select>
            </div>
                             
          </div>
            <div class="modal-footer">
            <a href="<?= site_url('user') ?>">
                <div class="btn btn-warning"><i class="fas fa-undo">Kembali</i></div>
            </a>
              <button type="submit" class="btn btn-success btn-flat" id="simpan">Simpan</button>
            </div>
            </form>

            </div>
</div>