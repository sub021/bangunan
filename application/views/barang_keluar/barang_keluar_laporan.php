<div class="container">

<div class="card">
  <div class="card-header">
    Laporan Data Barang Keluar
  </div>
  <div class="card-body">
    <h5 class="card-title">Laporan Data Barang Keluar</h5>
    <a href="<?= site_url("barang_Keluar/cetak")?>" target="__blank" class="btn btn-primary btn-sm">Cetak Seluruh Barang Keluar</a>
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalTanggal">
  Cetak Laporan Berdasarkan Tanggal</button>
  </div>
</div>
</div>

<!-- modal tanggal -->

<div class="modal fade" id="ModalTanggal" tabindex="-1" aria-labelledby="ModalTanggalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTanggalLabel">Laporan Berdasarkan Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('barang_Keluar/cetak2')?>" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
        <div class="container">
          <div class="row">
            <div class="form-group col-sm ">
              <label for="">Dari Tanggal</label>
              <input type="date" name="tanggal1" id="" class="form-control">
            </div>
            <div class="form-group col-sm">
              <label for="">Ke Tanggal</label>
              <input type="date" name="tanggal2" id="" class="form-control">
            </div>
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Cetak Laporan</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- end modal tanggal -->