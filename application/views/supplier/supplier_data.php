<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="<?= site_url('supplier/add')?>" class="btn btn-sm btn-primary mb-3 "><i class="fas fa-plus fa-sm"></i> Tambah supplier</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data supplier</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th >Nama Supplier</th>
                                <th >Alamat SUpplier</th>
                                <th >Kota</th>
                                <th >Telphone Supplier</th>
                                <th >Aksi</th>
                            </tr>

                        </thead>
                        <?php
                        $no = 1;
                        foreach($data_supplier->result()as $data){
                        ?>

                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$data->kode_supplier?></td>
                                <td><?=$data->nama_supplier?></td>
                                <td><?=$data->alamat_supplier?></td>
                                <td><?=$data->kota_supplier?></td>
                                <td><?=$data->telp_supplier?></td>
                                </td>
                                <td class="text-center" width="160px">
                                <form action="<?= site_url('supplier/del')?>" method="post">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                <a href="<?= site_url('supplier/edit/'.$data->id_supplier)?>" class="btn btn-primary btn-xs "><i class="fas fa-pencil-alt fa-sm"></i></a>
                                
                                <input type="hidden" name="id_supplier" value="<?= $data->id_supplier?>">
                                <button onclick="return confirm('Apakah anda yakin menghapus')" class="btn btn-danger btn-xs "><i class="fas fa-trash fa-sm"></i>
                                </button>
                                </form>
                                </td>
                                
                        <?php }?>

                            </thead>

                    </table>
                </div>
            </div>
