<div class="container-fluid">
<div class="card">
  <h5 class="card-header">Transaksi</h5>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
    <form action="" method="post" id="form_selesai">
    <div class="form-row">
    <div class="col-md-6">
    <div class="form-group">
    <label for="">Kode Invoice</label>
    <input type="text" class="form-control" id="kode_invoice" name="kode_invoice" readonly value="KI<?= sprintf("%04s",$kode_barang)?>">
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
                <label for="">Nama Pelanggan</label>
                <select name="id_pelanggan" id="" class="form-control">
                <option value="">--pilih--</option>
                <?php foreach($data_pelanggan->result() as $data){ ?>

                    <option value="<?= $data->nama?>"><?= $data->nama; ?></option>
                <?php } ?>
                </select>
        </div>
    </div>
    </div>
    
    </form>
    <form action="" method="post" id="form-transaksi">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Kode Barang</label>
                <input type="hidden" name="id_barang" id="id_barang">
                <input list="data_barang" name="kode_barang" id="kode_barang" class="form-control" onchange="return autofill();"> 
                <datalist id="data_barang">
                   <?php foreach($data_barang->result() as $data){ ?>
                    <option value="<?= $data->kode_barang?>"><?=$data->nama_barang; ?></option>
                <?php } ?>
                </datalist>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">harga</label>
                <input type="number" name="harga" id="harga" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control">
            </div>
        </div>
        <div class="form-group">
                <button type="submit" onclick="addbarang()" class="add_cart btn btn-primary btn-sm btn-flat">add</button>
                <button type="submit" onclick="simpan_data()" class="add_cart btn btn-primary btn-sm btn-flat">Selesai</button>
            </div>
        </form>        
    </div>
    <table class="table">
    <div class="card-header">
    <thead>
              <tr class="success">
            <th colspan="6"> Detail Transaksi</th>
              </tr>
        </div>
        
        <th>No</th>
      <th>Nama Barang</th>
      <th>Jumlah</th>
      <th>Harga Barang</th>
      <th>diskon</th>
      <th>Subtotal</th>
      <th> Aksi</th>
        </thead>
        
    <?php
                        $no = 1;
                        foreach($this->cart->contents() as $items){
                            $qty=$items['qty'];
                            $harga=$items['price'];
                            $diskon=$items['diskon'];
                            $total1=$qty * $harga;
                            $total=$total1-($total1*($diskon/100));
                            ?>
                            
    <td><?= $no++; ?></td>
    <td><?= $items['name'] ?></td>
    <td><?= $items['qty']  ?></td>
    <td><?= $items['price']  ?></td>
    <td><?= $items['diskon']  ?>%</td>
    <td><?= $total; ?></td>
    <td>
    <a href="<?= base_url(); ?>transaksi/delete_cart/<?= $items['rowid']; ?>" class="btn-floating red" onclick="return confirm('Yakin Ingin menghapus item ini dari keranjang anda ?')"><i class="fa fa-trash"></i></a>
    </td>
    
                        

                            </tr>
                            <?php } ?>
    </table>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

</div>

<script>
    function autofill() {
        var nis = document.getElementById('kode_barang').value;
        $.ajax({
            url: "<?php echo base_url(); ?>transaksi/cari",
            data: '&kode_barang=' + nis,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    // document.getElementById('kode_barang').value = val.kode_barang;
                    document.getElementById('id_barang').value = val.id_barang;
                    // document.getElementById('jumlah_barang').value = val.jumlah_barang;
                    document.getElementById('nama').value = val.nama_barang;
                    // document.getElementById('tanggal_diterima').value = val.tanggal_diterima;
                    document.getElementById('harga').value = val.harga_jual;



                });
            }
        });

    }
</script>

<script>
function addbarang()
    {
        var id_barang = $('#id_barang').val();
        var qty = $('#jumlah').val();
        
       // ajax adding data to database
          $.ajax({
            url : "<?= site_url('transaksi/simpan_keranjang')?>",
            type: "POST",
            data: $('#form-transaksi').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding data');
            }
        });
        
    }

</script>

<script>
        function simpan_data(){
            var kode_invoice = $('#kode_invoice').val();
            var id_pelanggan = $('#id_pelanggan').val();
            $.ajax({
            url : "<?= site_url('transaksi/selesai')?>",
            type: "POST",
            data: $('#form_selesai').serialize(),
            // dataType: "JSON",
            // success: function(data)
            // {
            //    //reload ajax table
            //    reload_table();
            // },
            // error: function (jqXHR, textStatus, errorThrown)
            // {
            //     alert('Error adding data');
            // }
        });
        }
    </script>