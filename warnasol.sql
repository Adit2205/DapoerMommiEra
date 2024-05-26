-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 04:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warnasol`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `tanggal`, `kode`, `nama`, `harga`, `qty`, `jumlah`, `session`) VALUES
('20180206152934', '2018-02-06 15:29:34', '58', 'Oseng Kacan', '6000', '1', '6000', '20170820071826');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kd_cus` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kd_cus`, `nama`, `alamat`, `no_telp`, `username`, `password`, `gambar`) VALUES
('20170820071826', 'hakko', 'hakko', '081357082499', 'hakko', 'fb92eb16a09ed530c91a0e17d9d61a7758754013', ''),
('20180205073805', 'niqoweb', 'niqoweb', 'niqoweb', 'niqoweb', '6414e69bf25357d8d63353f469b35a7416963ab1', ''),
('20240423085537', 'adit', 'krian', '081357083499', 'adit', '2e445949d370543ad32c166c38b1278d67316509', '../admin/gambar_customer/Jas almamater.jpeg'),
('20240515183112', 'aditya', 'krian', '087777777777', 'aditya', '5d1852d43efe8f6e393448a3b4d1cd98a4cfd56f', '../admin/gambar_customer/..IMG-20220826-WA0000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_kon` int(6) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `bayar_via` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(10) NOT NULL,
  `bukti_transfer` blob NOT NULL,
  `status` enum('Belum','Proses','Dibatalkan','Tidak Valid','Bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_kon`, `nopo`, `kd_cus`, `kode`, `bayar_via`, `tanggal`, `jumlah`, `bukti_transfer`, `status`) VALUES
(20, '20180205073805', '20180205073805', '', '0', '2018-02-05 07:38:37', 26000, 0x30, 'Belum'),
(22, '20170820071826', '20170820071826', '', 'Cash On Delivery (CO', '2018-02-05 09:44:53', 21000, 0x30, 'Belum'),
(23, '20240423085537', '20240423085537', '', 'Cash On Delivery (COD)', '2024-05-01 00:00:00', 18000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f4c6f67696e2e64726177696f2e706e67, 'Bayar'),
(24, '20240423085537', '20240423085537', '', 'Cash On Delivery (COD)', '2024-05-02 09:08:43', 18000, 0x30, 'Proses'),
(25, '20240423085537', '20240423085537', '', 'Cash On Delivery (COD)', '2024-05-02 15:45:32', 12000, 0x30, 'Belum'),
(26, '20240423085537', '20240423085537', '', 'QRIS', '2024-05-02 15:52:31', 6000, '', 'Belum'),
(27, '20240423085537', '20240423085537', '', 'QRIS', '2024-05-02 16:04:47', 6000, '', 'Belum'),
(28, '20240423085537', '20240423085537', '', 'QRIS', '2024-05-02 16:04:54', 0, '', 'Belum'),
(29, '20240423085537', '20240423085537', '', 'QRIS', '2024-05-02 16:08:39', 6000, '', 'Belum'),
(30, '20240423085537', '20240423085537', '', 'QRIS', '2024-05-02 16:09:24', 12000, '', 'Belum'),
(31, '20240423085537', '20240423085537', '', 'QRIS', '2024-05-05 10:20:46', 6000, '', 'Belum'),
(32, '20240423085537', '20240423085537', '', 'Transfer Bank', '2024-05-05 10:40:11', 12000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f4c6f67696e2e64726177696f2e706e67, 'Bayar'),
(33, '20240423085537', '20240423085537', '', 'Transfer Bank', '2024-05-05 11:56:00', 18000, '', 'Belum'),
(34, '20240423085537', '20240423085537', '', 'Transfer Bank', '2024-05-06 06:21:03', 12000, '', 'Belum'),
(35, '20240423085537', '20240423085537', '', 'Transfer Bank', '2024-05-11 21:17:41', 12000, '', 'Belum'),
(36, '', '20240423085537', '', 'Transfer Bank', '2024-05-11 21:19:50', 6000, '', 'Belum'),
(37, '20240423085537_17154', '20240423085537', '', 'Cash On Delivery (COD)', '2024-05-11 21:33:19', 10000, '', 'Belum'),
(38, '20240423085537_17154', '20240423085537', '', 'QRIS', '2024-05-11 21:34:03', 6000, '', 'Belum'),
(39, '20240423085537_663f8', '20240423085537', '', 'QRIS', '2024-05-11 21:38:37', 10000, '', 'Belum'),
(40, '20240423085537_663f8', '20240423085537', '', 'QRIS', '2024-05-11 21:39:06', 6000, '', 'Belum'),
(41, '663f83cfa590a', '20240423085537', '', 'QRIS', '2024-05-11 21:42:23', 6000, '', 'Belum'),
(42, '663f83e5e2266', '20240423085537', '', 'QRIS', '2024-05-11 21:42:45', 12000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f766965772070726f64756b2e6a706567, 'Bayar'),
(43, '663f8400981c7', '20240423085537', '', 'QRIS', '2024-05-11 21:43:12', 6000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f6c6f676f6461706f65722e706e67, 'Bayar'),
(44, '6640237b8a00c', '20240423085537', '', 'Cash On Delivery (COD)', '2024-05-12 09:03:39', 15000, '', 'Proses'),
(45, '664023d192cd9', '20240423085537', '', 'Transfer Bank', '2024-05-12 09:05:05', 12000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f766965772070726f64756b2e6a706567, 'Bayar'),
(46, '6640475aac47b', '20240423085537', '', 'Transfer Bank', '2024-05-12 11:36:42', 6000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f74616d6261682070726f64756b2e6a706567, 'Proses'),
(47, '6640488b0d7bd', '20240423085537', '', 'QRIS', '2024-05-12 11:41:47', 6000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f74616d6261682070726f64756b2e6a706567, 'Bayar'),
(48, '66405045298c0', '20180205073805', '', 'Transfer Bank', '2024-05-12 12:14:45', 15000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f747261636b696e672070726f64756b2e706e67, 'Bayar'),
(49, '664052245ba00', '20180205073805', '', 'QRIS', '2024-05-12 12:22:44', 10000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f756261682070726f64756b2e6a706567, 'Proses'),
(50, '6640542a1a8d5', '20180205073805', '', 'QRIS', '2024-05-12 12:31:22', 10000, '', 'Belum'),
(51, '66405473363ad', '20180205073805', '', 'QRIS', '2024-05-12 12:32:35', 12000, '', 'Belum'),
(52, '6640548dca0a4', '20180205073805', '', 'QRIS', '2024-05-12 12:33:01', 15000, '', 'Belum'),
(53, '664056171f6bc', '20180205073805', '', 'QRIS', '2024-05-12 12:39:35', 10000, '', 'Belum'),
(54, '6640577f7b0c5', '20180205073805', '', 'QRIS', '2024-05-12 12:45:35', 15000, '', 'Belum'),
(55, '6640580f1caf7', '20180205073805', '', 'QRIS', '2024-05-12 12:47:59', 6000, '', 'Belum'),
(56, '66405939d0d73', '20180205073805', '', 'QRIS', '2024-05-12 12:52:57', 6000, '', 'Belum'),
(57, '66405b1f0231d', '20180205073805', '56', 'QRIS', '2024-05-12 13:01:03', 12000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f756261682070726f64756b2e6a706567, 'Bayar'),
(58, '664064dea72be', '20180205073805', '58', 'QRIS', '2024-05-12 13:42:38', 6000, '', 'Belum'),
(59, '6640743162291', '20240423085537', '55', 'QRIS', '2024-05-12 14:48:01', 6000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f68617075732070726f64756b2e706e67, 'Bayar'),
(60, '66408ea071b83', '20240423085537', '58', 'QRIS', '2024-05-12 16:40:48', 6000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f756261682070726f64756b2e6a706567, 'Bayar'),
(61, '66409461c8ad8', '20240423085537', '54', 'Transfer Bank', '2024-05-12 17:05:21', 30000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f756261682070726f64756b2e6a706567, 'Bayar'),
(62, '6640b79538847', '20240423085537', '54', 'Transfer Bank', '2024-05-12 19:35:33', 45000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f747261636b696e672070726f64756b2e706e67, 'Bayar'),
(63, '66434c2dca97f', '20240423085537', '58', 'Transfer Bank', '2024-05-14 18:34:05', 6000, '', 'Dibatalkan'),
(64, '66443e83cc091', '20240423085537', '56', 'Transfer Bank', '2024-05-15 11:48:03', 12000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f576861747341707020496d61676520323032332d30392d323620617420332e35382e353020504d2e6a706567, 'Tidak Valid'),
(65, '6644445e7b145', '20240423085537', '55', 'Transfer Bank', '2024-05-15 12:13:02', 6000, 0x2e2e2f61646d696e2f67616d6261725f61646d696e2f576861747341707020496d61676520323032332d30392d323620617420332e35382e353020504d2e6a706567, 'Proses'),
(66, '66457bc0090ac', '20240423085537', '51', 'Transfer Bank', '2024-05-16 10:21:36', 30000, '', 'Dibatalkan'),
(67, '665072fa00d38', '20240423085537', '55', 'Transfer Bank', '2024-05-24 17:59:06', 6000, '', 'Dibatalkan'),
(68, '6650a35ae9d14', '20240423085537', '64', 'Transfer Bank', '2024-05-24 21:25:30', 10000, '', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(25) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggalkirim` date NOT NULL,
  `status` enum('Proses','Dikirim','Selesai','Terkirim','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`nopo`, `kd_cus`, `kode`, `tanggalkirim`, `status`) VALUES
('20240423085537', '', '', '2024-05-11', 'Selesai'),
('663f83e5e2266', '', '', '2024-05-11', 'Dikirim'),
('663f8400981c7', '20240423085537', '', '2024-05-12', 'Dikirim'),
('664023d192cd9', '20240423085537', '', '2024-05-12', 'Dikirim'),
('6640488b0d7bd', '20240423085537', '', '2024-05-12', 'Selesai'),
('66405045298c0', '20180205073805', '', '2024-05-12', 'Dikirim'),
('66405b1f0231d', '20180205073805', '56', '2024-05-12', 'Selesai'),
('6640743162291', '20240423085537', '55', '2024-05-12', 'Selesai'),
('66408ea071b83', '20240423085537', '58', '2024-05-12', 'Selesai'),
('66409461c8ad8', '20240423085537', '54', '2024-05-12', 'Dikirim'),
('6640b79538847', '20240423085537', '54', '0000-00-00', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `po_terima`
--

CREATE TABLE `po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `kode` int(4) NOT NULL,
  `tanggal` datetime NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `po_terima`
--

INSERT INTO `po_terima` (`id`, `nopo`, `kd_cus`, `kode`, `tanggal`, `qty`, `total`) VALUES
(38, '20180205073805', '20180205073805', 17, '2018-02-05 07:38:23', 2, 26000),
(39, '20170820071826', '20170820071826', 57, '2018-02-05 09:44:15', 1, 6000),
(40, '20170820071826', '20170820071826', 54, '2018-02-05 09:44:19', 1, 15000),
(41, '20240423085537', '20240423085537', 58, '2024-04-23 08:56:38', 1, 6000),
(42, '20240423085537', '20240423085537', 59, '2024-04-30 10:17:53', 1, 12000),
(43, '20240423085537', '20240423085537', 58, '2024-05-02 09:08:25', 3, 18000),
(44, '20240423085537', '20240423085537', 59, '2024-05-02 15:45:14', 1, 12000),
(45, '20240423085537', '20240423085537', 58, '2024-05-02 15:48:45', 1, 6000),
(46, '20240423085537', '20240423085537', 58, '2024-05-02 15:55:46', 1, 6000),
(47, '20240423085537', '20240423085537', 58, '2024-05-02 16:08:29', 1, 6000),
(48, '20240423085537', '20240423085537', 59, '2024-05-02 16:09:12', 1, 12000),
(49, '20240423085537', '20240423085537', 58, '2024-05-05 10:20:20', 1, 6000),
(50, '20240423085537', '20240423085537', 56, '2024-05-05 10:39:58', 1, 12000),
(51, '20240423085537', '20240423085537', 58, '2024-05-05 11:55:44', 1, 6000),
(52, '20240423085537', '20240423085537', 59, '2024-05-05 11:55:47', 1, 12000),
(53, '20240423085537', '20240423085537', 59, '2024-05-06 06:20:24', 1, 12000),
(54, '20240423085537', '20240423085537', 58, '2024-05-07 20:53:39', 1, 6000),
(55, '20240423085537', '20240423085537', 57, '2024-05-11 21:14:58', 1, 6000),
(57, '20240423085537', '20240423085537', 55, '2024-05-11 21:19:39', 1, 6000),
(58, '20240423085537_17154', '20240423085537', 50, '2024-05-11 21:33:05', 1, 10000),
(59, '20240423085537_17154', '20240423085537', 55, '2024-05-11 21:33:53', 1, 6000),
(60, '20240423085537_663f8', '20240423085537', 51, '2024-05-11 21:38:25', 1, 10000),
(61, '20240423085537_663f8', '20240423085537', 55, '2024-05-11 21:38:55', 1, 6000),
(62, '663f83cfa590a', '20240423085537', 57, '2024-05-11 21:42:15', 1, 6000),
(63, '663f83e5e2266', '20240423085537', 56, '2024-05-11 21:42:35', 1, 12000),
(64, '663f8400981c7', '20240423085537', 55, '2024-05-11 21:43:04', 1, 6000),
(65, '6640237b8a00c', '20240423085537', 54, '2024-05-12 09:03:25', 1, 15000),
(66, '664023d192cd9', '20240423085537', 56, '2024-05-12 09:04:53', 1, 12000),
(67, '6640475aac47b', '20240423085537', 55, '2024-05-12 11:36:27', 1, 6000),
(68, '6640488b0d7bd', '20240423085537', 55, '2024-05-12 11:41:37', 1, 6000),
(69, '66405045298c0', '20180205073805', 54, '2024-05-12 12:14:31', 1, 15000),
(70, '664052245ba00', '20180205073805', 52, '2024-05-12 12:22:34', 1, 10000),
(71, '6640542a1a8d5', '20180205073805', 51, '2024-05-12 12:25:00', 1, 10000),
(72, '66405473363ad', '20180205073805', 56, '2024-05-12 12:32:29', 1, 12000),
(73, '6640548dca0a4', '20180205073805', 54, '2024-05-12 12:32:54', 1, 15000),
(74, '664056171f6bc', '20180205073805', 51, '2024-05-12 12:37:34', 1, 10000),
(75, '6640577f7b0c5', '20180205073805', 54, '2024-05-12 12:45:28', 1, 15000),
(76, '6640580f1caf7', '20180205073805', 58, '2024-05-12 12:47:48', 1, 6000),
(77, '66405939d0d73', '20180205073805', 58, '2024-05-12 12:52:57', 1, 6000),
(78, '66405b1f0231d', '20180205073805', 56, '2024-05-12 13:01:03', 1, 12000),
(79, '664064dea72be', '20180205073805', 58, '2024-05-12 13:42:38', 1, 6000),
(80, '6640743162291', '20240423085537', 55, '2024-05-12 14:48:01', 1, 6000),
(81, '66408ea071b83', '20240423085537', 58, '2024-05-12 16:40:48', 1, 6000),
(82, '66409461c8ad8', '20240423085537', 54, '2024-05-12 17:05:21', 2, 30000),
(83, '6640b79538847', '20240423085537', 54, '2024-05-12 19:35:33', 3, 45000),
(84, '66434c2dca97f', '20240423085537', 58, '2024-05-14 18:34:05', 1, 6000),
(85, '66443e83cc091', '20240423085537', 56, '2024-05-15 11:48:03', 1, 12000),
(86, '6644445e7b145', '20240423085537', 55, '2024-05-15 12:13:02', 1, 6000),
(87, '66457bc0090ac', '20240423085537', 51, '2024-05-16 10:21:36', 3, 30000),
(88, '665072fa00d38', '20240423085537', 55, '2024-05-24 17:59:06', 1, 6000),
(89, '6650a35ae9d14', '20240423085537', 64, '2024-05-24 21:25:30', 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode`, `nama`, `jenis`, `harga`, `keterangan`, `stok`, `gambar`) VALUES
(17, 'Ayam Bakar', 'Makanan', 13000, 'Ayam Bakar Geprek Bumbu kecap', 100, 'gambar_produk/images(5).jpg'),
(18, 'Pepes Ikan Patin', 'Makanan', 12000, 'Ikan Patin pepes bumbu', 100, 'gambar_produk/images(2).jpg'),
(19, 'Botok Tahu', 'Makanan', 5000, 'Botok Tahu campur bumbu dan rempah - rempah', 100, 'gambar_produk/images(3).jpg'),
(20, 'Sop Ayam', 'Makanan', 12000, 'Sop ayam bumbu lada', 100, 'gambar_produk/images(4).jpg'),
(21, 'Sayur lodeh', 'Makanan', 6000, 'Sayur lodeh kuah santan', 100, 'gambar_produk/images(6).jpg'),
(22, 'Ayam Kremes ', 'Makanan', 12000, 'Ayam Kremes Bumbu sambal gledek', 100, 'gambar_produk/images(7).jpg'),
(23, 'Sayur Asam', 'Makanan', 6000, 'Sayur Asam Khas Sunda', 100, 'gambar_produk/images(8).jpg'),
(24, 'Tahu Tempe', 'Makanan', 6000, 'Tahu tempe kremes sambal coet dadakan', 100, 'gambar_produk/images(9).jpg'),
(25, 'Sop Sapi', 'Makanan', 18000, 'Sop Sapi daging dan tangkar plus sambal hijau gledek', 100, 'gambar_produk/images(10).jpg'),
(26, 'Sayur Bayam', 'Makanan', 6000, 'Sayur bayam dengan jagung', 100, 'gambar_produk/images(11).jpg'),
(27, 'Urab', 'Makanan', 6000, 'Campuran sayuran dengan bumbu rempah dan parutan kelapa', 100, 'gambar_produk/images(12).jpg'),
(28, 'Pepes Jamur', 'Makanan', 10000, 'pepes jamur bumbu cabai dan bawang merah', 100, 'gambar_produk/images(13).jpg'),
(29, 'Ikan Mas Bakar', 'Makanan', 15000, 'Ikan Mas bakar bumbu kecap lada hitam', 100, 'gambar_produk/images(14).jpg'),
(30, 'Mujair Goreng', 'Makanan', 12000, 'Ikan Mujair goreng bumbu rempah', 100, 'gambar_produk/images(15).jpg'),
(31, 'Lalapan', 'Makanan', 5000, 'Lalapan plus sambel dadakan', 100, 'gambar_produk/images(16).jpg'),
(32, 'Oseng Kangkung', 'Makanan', 6000, 'Oseng kangkung bumbu teriyaki', 100, 'gambar_produk/images(17).jpg'),
(33, 'Oseng Paria', 'Makanan', 6000, 'Oseng paria (pare) bumbu cabe bawang dan rempah', 100, 'gambar_produk/images(18).jpg'),
(34, 'Komplit 1', 'Makanan', 18000, 'Nasi, Ayam Bakar, lalapan, sambal korek', 100, 'gambar_produk/images(19).jpg'),
(35, 'Sambal Hejo', 'Makanan', 6000, 'Sambal goreng hejo gledek', 100, 'gambar_produk/images(20).jpg'),
(36, 'Sambal Goang', 'Makanan', 6000, 'Sambal Goang Cabe Jablay', 100, 'gambar_produk/images(21).jpg'),
(37, 'Petai Bakar', 'Makanan', 15000, 'petai bakar sambal lalap (2pcs)', 100, 'gambar_produk/images(22).jpg'),
(38, 'Capcai Seafood', 'Makanan', 20000, 'Campuran sayuran, bakso, ayam dan seafood', 100, 'gambar_produk/images(23).jpg'),
(39, 'Oseng Oncom', 'Makanan', 6000, 'Oseng oncom plus teri bumbu pedas', 100, 'gambar_produk/images(24).jpg'),
(40, 'Asinan', 'Makanan', 6000, 'Asinan', 100, 'gambar_produk/images(25).jpg'),
(41, 'Oreg Tempe', 'Makanan', 6000, 'Oreg tempe bumbu kecap', 100, 'gambar_produk/images(26).jpg'),
(42, 'Kentang sambel', 'Makanan', 8000, 'Kentang sambel goreng petai', 100, 'gambar_produk/images(27).jpg'),
(43, 'Terong Sambal', 'Makanan', 8000, 'Terong sambal goreng petai', 100, 'gambar_produk/images(28).jpg'),
(44, 'Oseng Jamur Tahu', 'Makanan', 10000, 'Oseng Jamur Tahu', 100, 'gambar_produk/images(29).jpg'),
(45, 'Goreng Ikan Mas', 'Makanan', 11000, 'Goreng Ikan Mas', 100, 'gambar_produk/images(30).jpg'),
(46, 'Ati Ampela', 'Makanan', 10000, 'Ati Ampela bumbu kari pedas', 100, 'gambar_produk/images(31).jpg'),
(47, 'Bala - Bala', 'Makanan', 2000, 'Bala - Bala', 100, 'gambar_produk/images(32).jpg'),
(48, 'Bakwan Jagung', 'Makanan', 2000, 'Bakwan Jagung', 100, 'gambar_produk/images(33).jpg'),
(49, 'Tempe Goreng', 'Makanan', 1000, 'Tempe Goreng', 100, 'gambar_produk/images(34).jpg'),
(50, 'Semur Jengkol', 'Makanan', 10000, 'Semur Jengkol Bumbu Lada', 99, 'gambar_produk/images(35).jpg'),
(51, 'Ikan Kembung', 'Makanan', 10000, 'Ikan Kembung Sambel kecap pedas', 94, 'gambar_produk/images(36).jpg'),
(52, 'Ikan Bandeng', 'Makanan', 10000, 'Ikan Bandeng Goreng', 99, 'gambar_produk/images(37).jpg'),
(53, 'Sayur Nangka', 'Makanan', 6000, 'Sayur Nangka Bumbu Kunyit dan santan', 100, 'gambar_produk/images(38).jpg'),
(54, 'Pepes Ikan Mas', 'Makanan', 15000, 'Pepes Ikan Mas Pedas', 90, 'gambar_produk/images(39).jpg'),
(55, 'Oseng Genjer', 'Makanan', 6000, 'Oseng Genjer', 91, 'gambar_produk/images(40).jpg'),
(56, 'Sop Ayam Rempah', 'Makanan', 12000, 'Sop Ayam Rempah', 94, 'gambar_produk/images(41).jpg'),
(57, 'Nasi Putih', 'Makanan', 6000, 'Nasi Putih Bakul', 97, 'gambar_produk/images(42).jpg'),
(58, 'Oseng Kacang', 'Makanan', 6000, 'Oseng Kacang', 84, 'gambar_produk/images(43).jpg'),
(64, 'BEBEK', 'Makanan', 10000, 'BEBEK', 99, 'gambar_produk/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_po_terima`
--

CREATE TABLE `tmp_po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(10) NOT NULL,
  `kd_cus` varchar(10) NOT NULL,
  `kode` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(1, 'hakko', 'fb92eb16a09ed530c91a0e17d9d61a7758754013', 'Hakko Bio Richard', 'gambar_admin/hakkoblogs.jpg'),
(3, 'adit', '2e445949d370543ad32c166c38b1278d67316509', 'adit', 'gambar_admin/dashboard user.jpeg'),
(4, 'ilbar', 'b91b093c13cb9c616e34fd512e9592ae5652bdfc', 'ilbar', 'gambar_admin/IMG-20220826-WA0000.jpg'),
(5, 'tes', 'd1c056a983786a38ca76a05cda240c7b86d77136', 'tes', 'gambar_admin/IMG-20220826-WA0000.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_cus`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`nopo`);

--
-- Indexes for table `po_terima`
--
ALTER TABLE `po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tmp_po_terima`
--
ALTER TABLE `tmp_po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_kon` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `po_terima`
--
ALTER TABLE `po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tmp_po_terima`
--
ALTER TABLE `tmp_po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
