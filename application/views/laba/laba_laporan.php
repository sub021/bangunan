<div class="container">

<div class="card">
  <div class="card-header">
    Laporan Data Barang Masuk
  </div>
  <div class="card-body">
    <h5 class="card-title">Laporan Data Laba</h5>
    <a href="<?= site_url("laba/cetak")?>" target="__blank" class="btn btn-primary btn-sm">Cetak Laba</a>
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalTanggal">
  Cetak Laporan Berdasarkan Periode</button>
  </div>
</div>
</div>

<!-- modal tanggal -->

<div class="modal fade" id="ModalTanggal" tabindex="-1" aria-labelledby="ModalTanggalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTanggalLabel">Laporan Berdasarkan Periode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('laba/cetak2')?>" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
        <div class="container">
          <div class="row">
            <div class="form-group col-sm ">
              <label for="">Dari Periode</label>
              <div class="form-row">
              <!-- <input type="date" name="tanggal1" id="" class="form-control"> -->
              <select name="bulan" class="form-control col-md">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="12">November</option>
                <option value="12">Desember</option>
                </select>
                <br>
                <select name="tahun" class="form-control col-md">
                <?php foreach($tahun->result() as $t){
                  $data=explode('-',$t->tgl_pemesanan);
                  $tahun=$data[0];
                  ?>
                <option value="<?=$tahun?>"><?= $tahun; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <!-- <div class="form-group col-sm">
              <label for="">Ke Tanggal</label>
              <input type="date" name="tanggal2" id="" class="form-control">
            </div> -->
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