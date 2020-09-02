<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="<?= site_url('transaksi/tambah')?>" class="btn btn-sm btn-primary mb-3 "><i class="fas fa-plus fa-sm"></i> Tambah transaksi</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th >Nama barang</th>
                                <th >harga</th>
                                <th >jumlah</th>
                                <th >total</th>
                                <th >Aksi</th>
                            </tr>

                        </thead>
                        <?php
                        $no = 1;
                        foreach($data->result()as $as){
                            $total=$as->harga_jual * $as->jumlah;
                        ?>

                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$as->nama?></td>
                                <td><?=$as->nama_barang?></td>
                                <td><?=$as->harga_jual?></td>
                                <td><?=$as->jumlah?></td>
                                <td><?=$total?></td>
                                </td>
                                <td class="text-center" width="160px">
                                <form action="<?= site_url('transaksi/del')?>" method="post">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                
                                
                                <input type="hidden" name="id_jual" value="<?= $as->id_jual?>">
                                <button onclick="return confirm('Apakah anda yakin menghapus')" class="btn btn-danger btn-xs "><i class="fas fa-trash fa-sm"></i>
                                </button>
                                </form>
                                </td>
                                
                        <?php }?>

                            </thead>

                    </table>
                </div>
            </div>
