<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <br>
                <div class="btn btn-sm btn-success">
                    <?php
                    $grand_total = 0;
                    if ($keranjang = $this->cart->contents()) {
                        foreach ($keranjang as $item) {

                            $grand_total = $grand_total + $item['subtotal'];
                        }
                        echo "Total Belanja Anda: Rp." . number_format($grand_total, 0, ',', '.');


                    ?>
                </div><br><br>

                <h3>Input Alamat Pengiriman dan Pembayaran</h3>
                <br>

                <form method="post" action="<?php echo base_url() ?>keranjang/proses_pesanan">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Masukkan nama lengkap anda.." class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Masukkan lengkap alamat anda.." class="form-control">
                    </div>

                    <div class=" form-group">
                        <label>No Telepon/hp</label>
                        <input type="text" name="no_telp" placeholder="Masukkan no telepon/hp anda.." class="form-control">
                    </div>

                    <div class=" form-group">
                        <label>Pilih Metode Pembayaran</label>
                        <select class="form-control">
                            <option>COD (ambil barang di Toko)</option>
                            <option>TRANSFER BRI- 414214232 (a.n Toko)</option>
                        </select>
                    </div>

                    <button type=" submit" class="btn btn-sm btn-primary mb-3">Pesan</button>


                </form>
            <?php
                    } else {
                        echo "<h4>Keranjang Belanja Anda Masih Kosong!!";
                    }


            ?>
            </div>
            <div class=" col-md-2">
            </div>


        </div>

    </div>