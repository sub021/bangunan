<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang</title>
</head>
<link href="<?= base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<body onLoad="window.print()">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Laporan Penjualan Offline
			</h3>
            <br>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Qty</th>
                        <th>Harga Jual</th>
						<th>Diskon</th>
						<th>Total</th>
                        
					</tr>
				</thead>
				<tbody>
                <?php
                    $n=1;
                foreach ($data_barang_keluar->result() as $data) {
					$jumlah=$data->jumlah;
					$harga=	$data->harga_jual;
					$diskon=$data->diskon;
					$total=$jumlah * $harga;
					$total1=$total-($total*($diskon/100));
					$total_ar[]=$total1
					?>
					<tr>
						<td><?= $n++?>.</td>
						<td><?= $data->kode_barang?></td>
						<td><?= $data->nama_barang?></td>
						<td><?= $data->jumlah?></td>
                        <td><?= 'Rp ' . number_format($data->harga_jual)?></td>
						<td><?= $data->diskon?>%</td>
						<td><?= 'Rp ' . number_format($total1)?></td>
                        
					</tr>
                    <?php }?>
				</tbody>
				<tfoot>

                <tr>
                    <td colspan="6" style="text-align:center;"><b>Total</b></td>
                    <td ><b><?php echo 'Rp ' . number_format($total = array_sum($total_ar)); ?></b></td>
                </tr>
            </tfoot>
			</table>
		</div>
	</div>
</div>
</body>
</html>