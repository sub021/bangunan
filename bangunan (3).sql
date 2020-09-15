-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Sep 2020 pada 08.28
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangunan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `harga_jual` int(11) DEFAULT NULL,
  `gambar` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok`, `harga_jual`, `gambar`, `created_at`) VALUES
(6, 'KB0001', 'baja', 99, 10000, NULL, '2020-08-20 16:20:52'),
(7, 'KB0002', 'paku', 10, 1000, NULL, '2020-08-31 09:45:21'),
(8, 'KB0003', 'semen', 0, 500000, NULL, '2020-09-11 17:46:35'),
(9, 'KB0004', 'cat tembok', 0, 30000, NULL, '2020-09-11 18:01:56'),
(10, 'KB0005', 'kalsibut', 0, 25000, NULL, '2020-09-11 19:49:22'),
(11, 'KB0006', 'sekop', 5, 30000, NULL, '2020-09-11 19:54:09'),
(12, 'KB0007', 'baja ringan', 0, 500000, '2e0264f1bf0eb68e7a8d69c6ae8e7ada.jpg', '2020-09-13 22:00:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id_keluar`, `id_barang`, `harga_jual`, `qty`, `total`, `tanggal`, `created_at`) VALUES
(1, 6, 10000, 10, 10000, '2020-08-22', '2020-08-22 04:07:26'),
(2, 6, 10000, 3, 10000, '2020-08-22', '2020-08-22 04:17:48');

--
-- Trigger `tb_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `baranh keluat` AFTER INSERT ON `tb_barang_keluar` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok - new.qty 
    WHERE id_barang= NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_supplier` int(11) NOT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_masuk`, `id_barang`, `id_supplier`, `harga_beli`, `qty`, `total`, `tanggal`, `created_at`) VALUES
(1, 6, 1, 5000, 10, 50000, '2020-09-14', '2020-09-14 13:07:48');

--
-- Trigger `tb_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `data_hapus` AFTER DELETE ON `tb_barang_masuk` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok - OLD.qty 
    WHERE id_barang= OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `data_masuk` AFTER INSERT ON `tb_barang_masuk` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok + new.qty 
    WHERE id_barang= NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `kode_invoice` varchar(255) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `alamat` text,
  `tgl_pesan` varchar(255) DEFAULT NULL,
  `batas_byr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `kode_invoice`, `nama`, `alamat`, `tgl_pesan`, `batas_byr`) VALUES
(1, 'KI0001', 'user', NULL, '', ''),
(2, 'KI0002', 'user', NULL, NULL, NULL),
(3, 'KI0003', 'user', NULL, NULL, NULL),
(4, 'KI0004', 'user', NULL, NULL, NULL),
(5, 'KI0005', 'user', NULL, NULL, NULL),
(6, 'KI0006', 'user', NULL, NULL, NULL),
(7, 'KI0007', 'budi saputra', 'jadlawjdawlkjd', '2020-09-13', '2020-09-14'),
(8, 'KI0008', 'budi saputra', 'jadlawjdawlkjd', '2020-09-13', '2020-09-14'),
(9, 'KI0009', 'budi saputra', 'jadlawjdawlkjd', '2020-09-13', '2020-09-14'),
(10, 'KI0010', 'budi saputra', 'jadlawjdawlkjd', '2020-09-13', '2020-09-14'),
(11, 'KI0011', 'Ardian Cahya', 'Jl.AMD Komp.Abdi Persada 1', '2020-09-14', '2020-09-15'),
(12, 'KI0012', 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `alamat`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'user'),
(2, 'admin', 'admin', 'admin', 'admin\r\n'),
(3, 'kambing', '21232f297a57a5a743894a0e4a801fc3', 'kambing', 'admin\r\nadmin\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_jual` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_invoice_p` int(11) NOT NULL DEFAULT '0',
  `jumlah` varchar(20) NOT NULL,
  `diskon` varchar(4) DEFAULT '0',
  `total_penjualan` varchar(255) NOT NULL,
  `tgl_pemesanan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_jual`, `id_barang`, `id_invoice_p`, `jumlah`, `diskon`, `total_penjualan`, `tgl_pemesanan`) VALUES
(1, 6, 10, '2', '0', '20000', '2020-09-13 21:55:00'),
(2, 6, 11, '3', '0', '30000', '2020-09-14 13:04:25'),
(3, 6, 12, '1', '0', '10000', '2020-09-14 13:08:01');

--
-- Trigger `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-new.jumlah 
    WHERE id_barang= NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan_online`
--

CREATE TABLE `tb_penjualan_online` (
  `id_online` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan_online`
--

INSERT INTO `tb_penjualan_online` (`id_online`, `id_barang`, `id_invoice`, `jumlah`, `harga`, `tanggal`) VALUES
(1, 6, 1, '2', '10000', '2020-08-31 03:23:35'),
(2, 6, 2, '1', '10000', '2020-08-31 03:23:35'),
(3, 6, 3, '1', '10000', '2020-08-31 03:23:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_supplier` varchar(255) DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat_supplier` varchar(255) DEFAULT NULL,
  `kota_supplier` varchar(255) DEFAULT NULL,
  `telp_supplier` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `alamat_supplier`, `kota_supplier`, `telp_supplier`, `created_at`) VALUES
(1, 'KS0001', 'cv.mandiei', 'ttd', 'banjarmasin', '08999', '2020-08-17 18:23:33'),
(2, 'KS0002', 'cv. angkasa', 'jalan teluk tiram darat', 'banjarmasin', '0812345679123', '2020-08-20 13:47:29'),
(3, 'KS0003', 'Ardian Cahya', 'Jl.AMD Komp.Abdi Persada 1', 'Banjarmasin', '081347816848', '2020-09-01 16:21:37'),
(4, 'KS0004', 'cahyo', 'Jl.AMD Komp.Abdi Persada 1', 'Banjarmasin', '081347816848', '2020-09-11 17:45:54'),
(5, 'KS0005', 'wijaya', 'Jl.AMD Komp.Abdi Persada 1', 'Banjarmasin', '081347816848', '2020-09-11 18:01:21'),
(6, 'KS0006', 'cv purnama', 'kayutangi', 'banjarmiasn', '0812345676', '2020-09-11 19:48:38'),
(7, 'KS0007', 'pt jaya', 'sungaimiai', 'banjarmiasn', '08124355768', '2020-09-11 19:53:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` text,
  `level` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `foto`, `level`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, '1', '2020-08-17 19:10:11'),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir1', NULL, '2', '2020-08-17 19:10:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_masuk`) USING BTREE,
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_suplier` (`id_supplier`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `tb_penjualan_online`
--
ALTER TABLE `tb_penjualan_online`
  ADD PRIMARY KEY (`id_online`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_penjualan_online`
--
ALTER TABLE `tb_penjualan_online`
  MODIFY `id_online` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
