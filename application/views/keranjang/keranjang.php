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
                        <th>Aksi</th>
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
                            <td style="text-align:right">
                                <a href="#<?= $items['rowid']; ?>" class="btn-floating orange" data-toggle="modal" data-target="#exampleModal<?= $items['rowid'] ?>"><i class="fa fa-edit"></i></a>

                                <a href="<?= base_url(); ?>keranjang/delete/<?= $items['rowid']; ?>" class="btn-floating red" onclick="return confirm('Yakin Ingin menghapus item ini dari keranjang anda ?')"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        <div class="modal fade" id="exampleModal<?= $items['rowid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Pesanan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" id="<?= $items['rowid'] ?>">
                                        <form action="<?= base_url(); ?>keranjang/update_keranjang/<?= $items['rowid']; ?>" method="post">

                                            <div class="form-group">
                                                <label for="">Nama barang</label>
                                                <input type="text" class="form-control" name="name" value="<?= $items['name']; ?>" id="name<?= $items['rowid']; ?>" readonly="readonly">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Items</label>
                                                <span class="badge badge-primary""> Sisa Stok:<?= $items['stok']?></span>
                                                <input type="number" class="form-control" name="qty" value="<?= $items['qty']; ?>" id="name<?= $items['rowid']; ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">simpan</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
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