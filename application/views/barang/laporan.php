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
				Laporan Data Barang
			</h3>
            <br>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Stok</th>
                        <th>Harga Jual</th>
                        
					</tr>
				</thead>
				<tbody>
                <?php
                    $n=1;
                foreach ($data_barang->result() as $data) {?>
					<tr>
						<td><?= $n++?>.</td>
						<td><?= $data->kode_barang?></td>
						<td><?= $data->nama_barang?></td>
						<td><?= $data->stok?></td>
                        <td><?= $data->harga_jual?></td>
                        
					</tr>
                    <?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>