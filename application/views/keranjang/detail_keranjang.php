<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <thead>
                    <?php foreach ($barang as $brg) : ?>

                        <div class="row">
                            <div class="col-md-4">
                                <!-- <img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?> " class="card-img-top"> -->
                            </div>

                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <td>Nama Produk :</td>
                                        <td><strong><?php echo $brg->nama_barang ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Stok :</td>
                                        <td><strong><?php echo $brg->stok ?></strong></td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td>Harga Satuan :</td>
                                        <td><strong>
                                                <div class="btn btn-sm btn-success">Rp.<?php echo number_format($brg->harga_jual, 0, ',', '.') ?></div>
                                            </strong></td>
                                    </tr>
                                </table>
                                <?php echo anchor(
                                    'keranjang/tambah_kekeranjang/' . $brg->id_barang,
                                    '<div class="btn btn-sm btn-success">Tambah Ke Keranjang </div>'
                                ) ?>
                                <?php echo anchor(
                                    'keranjang/index/' . $brg->id_barang,
                                    '<div class="btn btn-sm btn-primary">Kembali </div>'
                                ) ?>
                            </div>
                        <?php endforeach; ?>

                        </div>
            </div>
        </div>