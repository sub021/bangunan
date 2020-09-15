<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pelanggan</title>
</head>
<link href="<?= base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<body onLoad="window.print()">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Laporan Pelanggan Favorit
			</h3>
            <br>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>#</th>
						<!-- <th>Kode Invoice</th> -->
						<th>Nama Pelanggan</th>
						<th>Transaksi</th>
						<!-- <th>Tanggal</th>
						<th>Harga Beli</th>
						<th>qty</th>
                        <th>Total</th>
						<th>Nama Supplier</th> -->
                        
					</tr>
				</thead>
				<tbody>
                <?php
                    $n=1;
                foreach ($data_invoice->result() as $data) {?>
					<tr>
						<td><?= $n++?>.</td>
						<!-- <td><?= $data->kode_invoice?></td> -->
						<td><?= $data->nama?></td>
						<td><?= $data->jumlah?></td>
						<!-- <td><?= $data->tanggal?></td>
                        <td><?= $data->harga_beli?></td>
						<td><?= $data->qty?></td>
						<td><?= $data->total?></td>
						<td><?= $data->nama_supplier?></td> -->
                        
					</tr>
                    <?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>