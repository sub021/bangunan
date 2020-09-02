<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
</head>
<link href="<?= base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<body onLoad="window.print()">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Laporan Penjualan
			</h3>
            <br>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Pelanggan</th>
						<th>Nama barang</th>
						<th>harga</th>
                        <th>jumlah</th>
                        <th>total</th>
					</tr>
				</thead>
				<tbody>
                <?php
                    $n=1;
                foreach ($data_jual->result() as $data) {
                        $total=$data->jumlah * $data->harga_jual;
                    
                    ?>
					<tr>
						<td><?= $n++?>.</td>
						<td><?= $data->nama?></td>
						<td><?= $data->nama_barang?></td>
						<td>Rp. <?= number_format(($data->harga_jual), 0, ',', '.'); ?></td>
                        <td><?= $data->jumlah?></td>
                        <td>
                        Rp. <?= number_format(($data->jumlah * $data->harga_jual), 0, ',', '.'); ?></td>
					</tr>
                    <?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>