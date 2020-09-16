
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TOKO SUMBER JAYA</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" integrity="sha512-SUJFImtiT87gVCOXl3aGC00zfDl6ggYAw5+oheJvRJ8KBXZrr/TMISSdVJ5bBarbQDRC2pR5Kto3xTR0kpZInA==" crossorigin="anonymous" />
  <!-- Custom styles for this template-->
  <link href="<?= base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Sumber Jaya </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();'dasboard' ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master Data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php if($this->session->userdata('level')==1){ ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('user'); ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Admin</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Invoice')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Pelanggan</span></a>
      </li>

      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('supplier')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Supplier</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('barang')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Barang</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kegiatan
      </div>

      

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('barang_masuk')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Barang Masuk</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?= site_url('barang_keluar')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Barang Keluar</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('transaksi/tambah')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transaksi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Invoice')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Invoice</span></a>
      </li>

      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('supplier/laporan')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Supplier</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('barang/laporan')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Stok Barang</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('barang_masuk/laporan')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Barang Masuk</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('barang_keluar/laporan')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Penjualan Offline</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?= site_url('transaksi/laporan_online')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Penjualan online</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('transaksi/laporan')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Penjualan Online</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('invoice/laporan')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data pelanggan Favorit</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('laba/laporan')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>laporan Laba Rugi</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pendapatan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pengeluaran Keluar</span></a>
      </li> -->

      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Akun
      </div>

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Logout</span></a>
      </li> -->


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
 

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <!-- Nav Item - Alerts -->
           
            <!-- Nav Item - Messages -->
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=ucfirst( $this->fungsi->user_login()->username)?></span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               

                <a class="dropdown-item" href="<?= site_url('auth/logout')?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
       <?= $contens ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= site_url('auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url()?>assets/js/sb-admin-2.min.js"></script>
  <!-- <script src="<?= base_url()?>assets/js/rp.js"></script> -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
$(document).ready(function() {
    $('#example').DataTable();

} );
</script>
<script type="text/javascript">
        $(document).ready(function() {
            $("#jumlah_barang, #satuan").keyup(function() {
                var jumlah_barang = $("#jumlah_barang").val();
                var jumlah = $("#satuan").val();

                var total = parseInt(jumlah_barang) * parseInt(jumlah);
                $("#total").val(total);
            });
        });
        
</script>
</body>

</html>
