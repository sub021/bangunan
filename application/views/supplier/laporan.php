<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Supplier</title>
</head>
<link href="<?= base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<body onLoad="window.print()">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Laporan Data Supplier
			</h3>
            <br>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>Kode Supplier</th>
						<th>Nama Supplier</th>
						<th>Alamat</th>
                        <th>Kota</th>
                        <th>No.Telp</th>
					</tr>
				</thead>
				<tbody>
                <?php
                    $n=1;
                foreach ($data_supplier->result() as $data) {?>
					<tr>
						<td><?= $n++?>.</td>
						<td><?= $data->kode_supplier?></td>
						<td><?= $data->nama_supplier?></td>
						<td><?= $data->alamat_supplier?></td>
                        <td><?= $data->kota_supplier?></td>
                        <td><?= $data->telp_supplier?></td>
					</tr>
                    <?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>