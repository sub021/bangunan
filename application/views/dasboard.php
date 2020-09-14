<section class="content-header">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha512-QEiC894KVkN9Tsoi6+mKf8HaCLJvyA6QIRzY5KrfINXYuP9NxdIkRQhGq3BZi0J4I7V5SidGM3XUQ5wFiMDuWg==" crossorigin="anonymous"></script>
</section>
    <!-- main content -->

<section class="content-header">

</section>

<canvas id="myChart" width="1000" height="280"></canvas>
 
<!--Load chart js-->
<?php
    //Inisialisasi nilai variabel awal
    $nm_barang= "";
    $jumlah=null;
    foreach ($hasil->result() as $item)
    {
        $jur=$item->nama_barang;
        $nm_barang .= "'$jur'". ", ";
        $jum=$item->jumlah;
        $jumlah .= "$jum". ", ";
    }
    ?>
<script >
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        labels: [<?php echo $nm_barang  ?>],
        datasets: [{
            label: 'Data Penjualan',
            backgroundColor: 'rgb(51, 209, 255)',
            borderColor: 'rgb(242, 235, 237)',
            // data: [0, 10, 5, 2, 20, 30, 45]
            data: [<?php echo $jumlah; ?>]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>