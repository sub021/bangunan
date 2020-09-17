<div class="container-fluid">

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#diproses" role="tab" aria-controls="home" aria-selected="true">Diproses</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#disiapkan" role="tab" aria-controls="profile" aria-selected="false">Disiapkan</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dikirim" role="tab" aria-controls="contact" aria-selected="false">Dikirim</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#diambil" role="tab" aria-controls="contact" aria-selected="false">Diambil</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="contact" aria-selected="false">Selesai</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="diproses" role="tabpanel" aria-labelledby="home-tab">
  <table class="table ">
<thead>
    <tr>
        <th >No</th>
        <th>Kode Invoice</th>
        <th >Nama</th>
        <th >Status</th>
    </tr>
</thead>
<tbody>
<?php $no=1;
    foreach($diproses->result()as $data){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data->kode_invoice; ?></td>
    <td><?= $data->nama; ?></td>
    <td><?= $data->status_pesanan; ?></td>
</tr>
    <?php } ?>
</tbody>
  </table>
  </div>
  <div class="tab-pane fade" id="disiapkan" role="tabpanel" aria-labelledby="profile-tab">
  
  <table class="table ">
<thead>
    <tr>
        <th >No</th>
        <th>Kode Invoice</th>
        <th >Nama</th>
        <th >Status</th>
    </tr>
</thead>
<tbody>
<?php $no=1;
    foreach($disiapkan->result()as $data){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data->kode_invoice; ?></td>
    <td><?= $data->nama; ?></td>
    <td><?= $data->status_pesanan; ?></td>
</tr>
    <?php } ?>
</tbody>
  </table>
  
  
  </div>
  <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="contact-tab">
  <table class="table ">
<thead>
    <tr>
        <th >No</th>
        <th>Kode Invoice</th>
        <th >Nama</th>
        <th >Status</th>
    </tr>
</thead>
<tbody>
<?php $no=1;
    foreach($dikirim->result()as $data){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data->kode_invoice; ?></td>
    <td><?= $data->nama; ?></td>
    <td><?= $data->status_pesanan; ?></td>
</tr>
    <?php } ?>
</tbody>
  </table>
  
  </div>
  <div class="tab-pane fade" id="diambil" role="tabpanel" aria-labelledby="contact-tab">
  <table class="table ">
<thead>
    <tr>
        <th >No</th>
        <th>Kode Invoice</th>
        <th >Nama</th>
        <th >Status</th>
    </tr>
</thead>
<tbody>
<?php $no=1;
    foreach($diambil->result()as $data){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data->kode_invoice; ?></td>
    <td><?= $data->nama; ?></td>
    <td><?= $data->status_pesanan; ?></td>
</tr>
    <?php } ?>
</tbody>
  </table>
  
  </div>
  <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="contact-tab">
  
  <table class="table ">
<thead>
    <tr>
        <th >No</th>
        <th>Kode Invoice</th>
        <th >Nama</th>
        <th >Status</th>
    </tr>
</thead>
<tbody>
<?php $no=1;
    foreach($selesai->result()as $data){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data->kode_invoice; ?></td>
    <td><?= $data->nama; ?></td>
    <td><?= $data->status_pesanan; ?></td>
</tr>
    <?php } ?>
</tbody>
  </table>
  </div>
</div>
</div>

