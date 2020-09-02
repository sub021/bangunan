<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="<?= site_url('barang_keluar/add')?>" class="btn btn-sm btn-primary mb-3 "><i class="fas fa-plus fa-sm"></i> Tambah Data Barang Keluar</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th >No</th>
                                <th>Kode Barang</th>
                                <th >Nama Barang</th>
                                <!-- <th >Nama Supplier</th> -->
                                <th >Harga beli</th>
                                <th >Qty</th>
                                <th >Tanggal</th>
                                <th >Aksi</th>
                            </tr>

                        </thead>
                        <?php
                        $no = 1;
                        foreach($data_barang_keluar->result()as $data){
                        ?>

                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->kode_barang?></td>
                                <td><?=$data->nama_barang?></td>
                               
                                <td><?="Rp " . number_format($data->harga_jual,2,',','.')?></td>
                                <td><?=$data->qty?></td>
                                
                                <td><?=$data->tanggal?></td>
                                </td>
                                <td class="text-center" width="160px">
                                <form action="<?= site_url('barang_keluar/del')?>" method="post">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                <a href="<?= site_url('barang_keluar/edit/'.$data->id_keluar)?>" class="btn btn-primary btn-xs "><i class="fas fa-pencil-alt fa-sm"></i></a>
                                
                                <input type="hidden" name="id_masuk" value="<?= $data->id_keluar?>">
                                <button onclick="return confirm('Apakah anda yakin menghapus')" class="btn btn-danger btn-xs "><i class="fas fa-trash fa-sm"></i>
                                </button>
                                </form>
                                </td>
                                
                        <?php }?>

                            </thead>

                    </table>
                </div>
            </div>
