<div class="container-fluid">
    <!-- Content Row -->
    <!-- <div class="row"> -->

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

<!-- </div> -->
        <div class="row text-center mt-4">

            <?php foreach ($barang->result() as $brg) : ?>

                <div class="card ml-3 mt-4" style="width: 16rem;">
                    <img src="<?php echo base_url() . 'assets/barang/' . $brg->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-1 "><?php echo $brg->nama_barang ?></h5>
                         <?php if($brg->stok == 0){ ?>
                            <small>Sisa Stok:Habis</small> <br>
                        <?php } else { ?>
                            <small>Sisa Stok:<?php echo $brg->stok ?></small> <br>
                        <?php } ?> <br>
                        <span class="badge badge-pill badge-danger mb-3">Rp.<?php echo number_format($brg->harga_jual, 0, ',', '.') ?></span>
                        <br>
                        <?php if($brg->stok == 0){ ?>
                        <button type="button" class="btn btn-sm btn-success" disabled>Tambah Ke Keranjang</button>
                        <?php } else { ?>   
                            <?php echo anchor(
                            'keranjang/tambah_kekeranjang/' . $brg->id_barang,
                            '<div class="btn btn-sm btn-success">Tambah Ke Keranjang </div>'
                        ) ?>
                        <?php } ?>
                        <?php echo anchor(
                            'keranjang/detail/' . $brg->id_barang,
                            '<div class="btn btn-sm btn-warning">Detail </div>'
                        ) ?>

                    </div>

                </div>

            <?php endforeach; ?>
        </div>
    </div>