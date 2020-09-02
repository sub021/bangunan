<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="<?= site_url('user/add')?>" class="btn btn-sm btn-primary mb-3 "><i class="fas fa-plus fa-sm"></i> Tambah User</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th >No</th>
                                <th>username</th>
                                <th >Nama</th>
                                <th >Level</th>
                                <th >Foto</th>
                                <th >Aksi</th>
                            </tr>

                        </thead>
                        <?php
                        $no = 1;
                        foreach($data_user->result()as $data){
                        ?>

                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->username?></td>
                                <td><?=$data->nama?></td>
                                <td><?=$data->level==1 ? "Admin":"Kasir"?></td>
                                <td><?=$data->foto?></td>
                                </td>
                                <td class="text-center" width="160px">
                                <form action="<?= site_url('user/del')?>" method="post">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                <a href="<?= site_url('user/edit/'.$data->id_user)?>" class="btn btn-primary btn-xs "><i class="fas fa-pencil-alt fa-sm"></i></a>
                                
                                <input type="hidden" name="id_user" value="<?= $data->id_user?>">
                                <button onclick="return confirm('Apakah anda yakin menghapus')" class="btn btn-danger btn-xs "><i class="fas fa-trash fa-sm"></i>
                                </button>
                                </form>
                                </td>
                                
                        <?php }?>

                            </thead>

                    </table>
                </div>
            </div>
