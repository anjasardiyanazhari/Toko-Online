-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 06:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text,
  `status_berita` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(3, 10, 'tes dulu', 'tes.png', '2019-05-07 03:34:10'),
(5, 10, 'coba kedua ketiga', 'users1.jpg', '2019-05-07 03:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(400) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `tanggal_post`, `tanggal_update`) VALUES
(1, 0, 6, 'yong', 'yong@gamil.com', '08763458', 'mataram', '15052019SXM8TRMR', '2019-05-15 00:00:00', 4000, 'belum', NULL, NULL, NULL, NULL, '2019-05-15 03:12:00', '2019-05-15 01:12:00'),
(2, 0, 6, 'yong', 'yong@gamil.com', '08763458', 'mataram', '15052019YCYEDPIK', '2019-05-15 00:00:00', 129000, 'belum', NULL, NULL, NULL, NULL, '2019-05-15 03:18:32', '2019-05-15 01:18:32'),
(3, 0, 6, 'yong', 'yong@gamil.com', '08763458', 'mataram', '15052019EXHQNEAZ', '2019-05-15 00:00:00', 20000, 'belum', NULL, NULL, NULL, NULL, '2019-05-15 08:22:57', '2019-05-15 06:22:57'),
(4, 0, 6, 'yong', 'yong@gamil.com', '08763458', 'mataram', '15052019EZCMDLES', '2019-05-15 00:00:00', 24000, 'belum', NULL, NULL, NULL, NULL, '2019-05-15 10:59:36', '2019-05-15 08:59:36'),
(5, 0, 6, 'yong cakeps', 'yong@gamil.com', '08763458', 'mataram', '150520191CAXXWAQ', '2019-05-15 00:00:00', 20000, 'belum', NULL, NULL, NULL, NULL, '2019-05-15 11:45:33', '2019-05-15 09:45:33'),
(6, 0, 6, 'yong cakeps', 'yong@gamil.com', '08763458', 'mataram', '15052019TYWOILNJ', '2019-05-15 00:00:00', 440000, 'belum', NULL, NULL, NULL, NULL, '2019-05-15 16:27:56', '2019-05-15 14:27:56'),
(7, 0, 6, 'yong cakeps', 'yong@gamil.com', '08763458', 'mataram', '15052019ZD3CNLVM', '2019-05-15 00:00:00', 220000, 'belum', NULL, NULL, NULL, NULL, '2019-05-15 16:50:30', '2019-05-15 14:50:30'),
(8, 0, 6, 'yong cakeps', 'yong@gamil.com', '08763458', 'mataram', '23052019SNBPVVGD', '2019-05-23 00:00:00', 300000, 'belum', NULL, NULL, NULL, NULL, '2019-05-23 00:45:44', '2019-05-22 22:45:44'),
(9, 0, 6, 'yong cakeps', 'yong@gamil.com', '08763458', 'mataram', '12062019OEMFPZAT', '2019-06-12 00:00:00', 100000, 'belum', NULL, NULL, NULL, NULL, '2019-06-12 21:43:27', '2019-06-12 19:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'hijab-modern', 'Hijab Modern', 1, '2019-05-15 10:08:05'),
(3, 'hijab-syari', 'Hijab Syar\'i', 3, '2019-05-15 10:07:55'),
(4, 'hijab-klasik', 'Hijab Klasik', 4, '2019-05-15 10:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Toko Nanda - Online Shope - Hijab Queen', 'spesialis hijab kece', 'nanda@gmail.com', 'http://tokonanda.com', '		hijab kece, hijab syar\'i , hijab klasik, hijab modern									', '		Hijab Quenn 									', '087545666565', 'Lombok					', 'https://web.facebook.com/nanda.l.humairoh', 'https://www.instagram.com/tomika_nanda/', '						website penjualan aneka macam Hijab						', 'logo21.jpg', 'logo22.jpg', '						ok										', '2019-05-15 15:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(4, 0, 'pending', 'yongs', 'youngs@gmail.com', 'bf234dad7b79b7b5998221304f7d92e990a45f57', '2432', 'mataram', '2019-05-14 18:33:47', '2019-05-14 16:33:47'),
(5, 0, 'pending', 'yongss', 'y@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2432', 'mataram', '2019-05-14 19:08:01', '2019-05-14 17:08:01'),
(6, 0, 'pending', 'yong cakeps', 'yong@gamil.com', 'f869101330fe5fdb4f871dbdaf6c06d091a80767', '08763458', 'mataram', '2019-05-15 02:45:26', '2019-05-15 09:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(50) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(9, 15, 4, 'MB03', 'Meidiani_Bergo_Princess_Manila_-_Hitam_Hijau-250x300', 'meidiani_bergo_princess_manila_-_hitam_hijau-250x300-mb03', '<p>Meidiani_Bergo_Princess_Manila_-_Hitam_Hijau-250x300</p>\r\n', '				Meidiani_Bergo_Princess_Manila_-_Hitam_Hijau-250x300		', 150000, 40, 'reistaputrii_BvFjQENgIg9_21.jpg', 100, '10x10', 'Publish', '2019-05-06 18:01:28', '2019-07-02 16:30:00'),
(10, 15, 4, 'MB02', 'Meidiani_Bergo_Princess_Manila_-_merah_bata-250x300', 'meidiani_bergo_princess_manila_-_merah_bata-250x300-mb02', '<p>Meidiani_Bergo_Princess_Manila_-_merah_bata-250x300</p>\r\n', '		Meidiani_Bergo_Princess_Manila_-_merah_bata-250x300	', 100000, 70, 'reistaputrii_Bu1GkbjAYY__21.jpg', 100, '10x10', 'Publish', '2019-05-07 05:33:28', '2019-07-02 16:29:41'),
(11, 15, 4, 'MB01', 'Meidiani_Bergo_Princess_Manila_-_Ungu_Tua-250x300', 'meidiani_bergo_princess_manila_-_ungu_tua-250x300-mb01', '<p>Meidiani_Bergo_Princess_Manila_-_Ungu_Tua-250x300</p>\r\n', '		Meidiani_Bergo_Princess_Manila_-_Ungu_Tua-250x300	', 20000, 100, 'reistaputrii_BthvGmdg8ii_11.jpg', 60, '10x10 cm', 'Publish', '2019-05-07 08:36:57', '2019-07-02 16:29:23'),
(12, 15, 4, 'RB01', 'Rocella-Blus-Shenara-Dark-Tosca-l-xl-300x300', 'rocella-blus-shenara-dark-tosca-l-xl-300x300-rb01', '<p>Rocella-Blus-Shenara-Dark-Tosca-l-xl-300x300</p>\r\n', '		Rocella-Blus-Shenara-Dark-Tosca-l-xl-300x300	', 150000, 29, 'reistaputrii___BxBXJaPAmnB___1.jpg', 60, '10x10 cm', 'Publish', '2019-05-07 17:23:54', '2019-07-02 16:29:04'),
(13, 15, 1, 'TP01', 'tania purple', 'tania-purple-tp01', '<p>tania purple</p>\r\n', '		tania purple	', 200000, 80, 'reistaputrii___BvtC0_PAXh8___1.jpg', 60, '10x10 cm', 'Publish', '2019-05-07 17:24:46', '2019-07-02 16:28:50'),
(14, 15, 1, 'SJ01', 'Shejab-Jolie-Dress-Lilac-300x300', 'shejab-jolie-dress-lilac-300x300-sj01', '<p>Shejab-Jolie-Dress-Lilac-300x300</p>\r\n', '		Shejab-Jolie-Dress-Lilac-300x300	', 150000, 70, 'reistaputrii___BvOq5anAkwV___1.jpg', 100, '10x10 cm', 'Publish', '2019-05-07 17:25:52', '2019-07-02 16:28:38'),
(15, 15, 1, 'SG01', 'segi_empat-250x300', 'segi_empat-250x300-sg01', '<p>segi_empat-250x300</p>\r\n', '		segi_empat-250x300	', 200000, 20, 'reistaputrii___BvJAjREgcMv___1.jpg', 60, '10x10 cm', 'Publish', '2019-05-07 17:27:08', '2019-07-02 16:28:25'),
(16, 15, 1, 'KR01', 'KR_Motif_005_-_Biru_Benhur-250x300', 'kr_motif_005_-_biru_benhur-250x300-kr01', '<p>Hijab Modern</p>\r\n', '		KR_Motif_005_-_Biru_Benhur-250x300	', 150000, 50, 'reistaputrii___Bv0GGYWgLqi___1.jpg', 60, '10x10 cm', 'Publish', '2019-05-07 17:28:10', '2019-07-02 16:28:09'),
(17, 15, 3, 'AR01', 'arumi_08-purple-250x300', 'arumi_08-purple-250x300-ar01', '<p>arumi_08-purple-250x300</p>\r\n', '		arumi_08-purple-250x300	', 150000, 100, 'reistaputrii___BuTA33ogoUR___1.jpg', 60, '10x10 cm', 'Publish', '2019-05-15 16:00:05', '2019-07-02 16:28:00'),
(18, 15, 3, 'AR02', 'araya06-burgundy21-250x300', 'araya06-burgundy21-250x300-ar02', '<p>araya06-burgundy21-250x300</p>\r\n', '					araya06-burgundy21-250x300	', 140000, 100, 'reistaputrii___Btc14O9AV_a___1.jpg', 60, '10x10 cm', 'Publish', '2019-05-15 16:00:53', '2019-07-02 16:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(25) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 6, '15052019SXM8TRMR', 12, 4000, 1, 4000, '2019-05-15 00:00:00', '2019-05-15 01:12:00'),
(2, 0, 6, '15052019YCYEDPIK', 15, 20000, 1, 20000, '2019-05-15 00:00:00', '2019-05-15 01:18:32'),
(3, 0, 6, '15052019YCYEDPIK', 14, 100000, 1, 100000, '2019-05-15 00:00:00', '2019-05-15 01:18:33'),
(4, 0, 6, '15052019YCYEDPIK', 16, 4000, 1, 4000, '2019-05-15 00:00:00', '2019-05-15 01:18:33'),
(5, 0, 6, '15052019YCYEDPIK', 11, 5000, 1, 5000, '2019-05-15 00:00:00', '2019-05-15 01:18:33'),
(6, 0, 6, '15052019EXHQNEAZ', 15, 20000, 1, 20000, '2019-05-15 00:00:00', '2019-05-15 06:22:57'),
(7, 0, 6, '15052019EZCMDLES', 16, 4000, 1, 4000, '2019-05-15 00:00:00', '2019-05-15 08:59:36'),
(8, 0, 6, '15052019EZCMDLES', 15, 20000, 1, 20000, '2019-05-15 00:00:00', '2019-05-15 08:59:36'),
(9, 0, 6, '150520191CAXXWAQ', 15, 20000, 1, 20000, '2019-05-15 00:00:00', '2019-05-15 09:45:33'),
(10, 0, 6, '15052019TYWOILNJ', 18, 140000, 1, 140000, '2019-05-15 00:00:00', '2019-05-15 14:27:56'),
(11, 0, 6, '15052019TYWOILNJ', 12, 150000, 1, 150000, '2019-05-15 00:00:00', '2019-05-15 14:27:57'),
(12, 0, 6, '15052019TYWOILNJ', 16, 150000, 1, 150000, '2019-05-15 00:00:00', '2019-05-15 14:27:57'),
(13, 0, 6, '15052019ZD3CNLVM', 11, 20000, 1, 20000, '2019-05-15 00:00:00', '2019-05-15 14:50:30'),
(14, 0, 6, '15052019ZD3CNLVM', 15, 200000, 1, 200000, '2019-05-15 00:00:00', '2019-05-15 14:50:30'),
(15, 0, 6, '23052019SNBPVVGD', 9, 150000, 1, 150000, '2019-05-23 00:00:00', '2019-05-22 22:45:45'),
(16, 0, 6, '23052019SNBPVVGD', 16, 150000, 1, 150000, '2019-05-23 00:00:00', '2019-05-22 22:45:45'),
(17, 0, 6, '12062019OEMFPZAT', 10, 100000, 1, 100000, '2019-06-12 00:00:00', '2019-06-12 19:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses_level` varchar(50) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(12, 'khaerul yasin', 'khaerulyasin60@gmail.com', 'youngstar', '84d3ef45ce8a912f5046572ceabc141cefb34d3d', 'Admin', '2019-05-05 05:16:47'),
(13, 'Nanda ', 'nanda01@gmail.com', 'nanda-chan', '16e8b7d240c81a0cbc6c0d5dcf00ef946b771823', 'Admin', '2019-05-05 05:16:08'),
(15, 'Nanda', 'nanda@gmail.com', 'nanda123', '16e8b7d240c81a0cbc6c0d5dcf00ef946b771823', 'Admin', '2019-05-22 22:43:28'),
(16, 'tes', 'tes@gmail.com', 'tes', 'b57006c46fceecd3a469a3c1f087e0f51ee66caf', 'Admin', '2019-07-02 01:32:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
