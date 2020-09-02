<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Sub-Total</th>
                    </tr>

                    <?php
                    $no = 1;
                    foreach ($this->cart->contents() as $items) :  ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><?php echo $items['qty'] ?></td>
                            <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.')  ?></td>
                            <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.')  ?></td>

                        </tr>

                    <?php endforeach ?>
                    <tr>
                        <td colspan="4" align="right">Sub-Total</td>
                        <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
                    </tr>

                </table>

                <div align="right">
                    <a href="<?php echo base_url('keranjang/hapus_keranjang') ?>">
                        <div class="btn btn-sm btn-danger">Hapus Keranjang</div>
                    </a>
                    <a href="<?php echo base_url('home') ?>">
                        <div class="btn btn-sm btn-primary">Lanjutkan Belanja</div>
                    </a>
                    <a href="<?php echo base_url('keranjang/pembayaran') ?>">
                        <div class="btn btn-sm btn-success">Pembayaran</div>
                    </a>


                </div>



            </div>