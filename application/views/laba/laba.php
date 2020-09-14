<!DOCTYPE html>
<html lang="en">
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body onLoad="window.print()">
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td width="1px">
                <!-- <img width="100px" src="<?= base_url() ?>assets/logo4.png"> -->
            </td>
            <td>
                <font size="6">TOKO SUMBER JAYA</font> <br>
                <!-- <font size="3">Komplek Pertokoan Sanjaya Jln Jend. A Yani Kuala Kapuas</font> -->
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>
    <br>
    <div style="text-align: center;">
        <font size="4"><b><u>LAPORAN LABA / RUGI</u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%">
        <thead style="background-color: #333; color: #fff; text-align: center;">
            <th style="text-align: center;" colspan="6">Data Pembelian</th>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Nama Supplier</th>
                <th style="text-align: center;">Nama Barang</th>
                <th style="text-align: center;">Harga Beli</th>
                <th style="text-align: center;">Jumlah Beli</th>
                <th style="text-align: center;">Total Beli</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">


            <?php $no = 1;
            foreach ($data_pembelian->result_array() as $key) :
                $harjul = $key['harga_beli'] * $key['qty'];
                $total_beli[] = $harjul;
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $key['nama_supplier']; ?></td>
                    <td><?php echo $key['nama_barang']; ?></td>
                    <td><?php echo rupiah($key['harga_beli']); ?></td>
                    <td><?php echo $key['qty']; ?>
                        <?//php echo $key['jenis_satuan'];?>
                    </td>
                    <td><?php echo rupiah($harjul); ?></td>
                </tr>
            <?php endforeach ?>
            <td colspan="5">Hasil</td>
            <td><?php echo 'Rp ' . number_format($total = array_sum($total_beli)); ?></td>
        </tbody>
    </table>
    <br>

    <table border="1" cellspacing="0" width="100%">
        <thead style="background-color: #333; color: #fff; text-align: center;">
            <th style="text-align: center;" colspan="6">Data Penjualan</th>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Nama Customer</th>
                <th style="text-align: center;">Nama Barang</th>
                <th style="text-align: center;">Harga Jual</th>
                <th style="text-align: center;">Jumlah Jual</th>
                <th style="text-align: center;">Total Jual</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">


            <?php $no = 1;
            foreach ($data_penjualan->result_array() as $key) :
                $total = $key['harga_jual'] * $key['jumlah'];
                $total_jual[] = $total;
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $key['nama']; ?></td>
                    <td><?php echo $key['nama_barang']; ?></td>
                    <td><?php echo rupiah($key['harga_jual']); ?></td>
                    <td><?php echo $key['jumlah']; ?></td>
                    <td><?php echo rupiah($total); ?></td>
                </tr>
            <?php endforeach ?>
            <td colspan="5">Hasil</td>
            <td><?php echo 'Rp ' . number_format($total = array_sum($total_jual)); ?></td>
        </tbody>
    </table>
    <br>
    <table border="1" cellspacing="0" width="100%">
        <thead style="background-color: #333; color: #fff; text-align: center;">
            <tr>
            </tr>
        </thead>
        <tbody style="text-align: center;">


            <tr>


                <td width="500px">Data Penjualan</td>
                <td><?php echo 'Rp ' . number_format($total = array_sum($total_jual)); ?></td>
            </tr>
            <tr>
                <td width="500px">Data Pembelian</td>
                <td><?php echo 'Rp ' . number_format($total = array_sum($total_beli)); ?></td>
            </tr>
            <tr>
                <td width="500px">Laba / Rugi</td>
                <td><?php $hasill = $total = array_sum($total_jual) - $$total = array_sum($total_beli);
                    echo rupiah($hasill) ?></td>
            </tr>
        </tbody>
    </table>


    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->



</body>

</html>