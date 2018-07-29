-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 06:57 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sippulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pulsa Regular'),
(2, 'Pulsa Data'),
(3, 'Pulsa Listrik');

-- --------------------------------------------------------

--
-- Table structure for table `nominal`
--

CREATE TABLE `nominal` (
  `id_nominal` int(11) NOT NULL,
  `nama_nominal` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `hpp` decimal(8,0) NOT NULL,
  `harga_jual` decimal(8,0) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_proveder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominal`
--

INSERT INTO `nominal` (`id_nominal`, `nama_nominal`, `deskripsi`, `hpp`, `harga_jual`, `stok`, `id_kategori`, `id_proveder`) VALUES
(1, 'Pulsa Regular 5 Ribu', 'Pulsa Regular 5 Ribu Telkomsel', '5350', '6000', 10, 1, 1),
(2, 'Pulsa Data 2GB', 'Pulsa Data Internet 2GB (1GB Semua Jaringan + 1GB Data Chatting) Indosat', '23000', '30000', 5, 2, 2),
(3, 'Pulsa Listrik 20 Ribu', 'Pulsa Listrik PLN 20 Ribu 18 Kwh', '20500', '22500', 8, 3, 7),
(4, 'Pulsa Regular 10 Ribu', 'Pulsa Regular 10 Ribu Telkomsel', '10350', '11000', 15, 1, 1),
(5, 'Pulsa Regular 20 Ribu', 'Pulsa Regular 20 Ribu Telkomsel', '20250', '21000', 15, 1, 1),
(6, 'Pulsa Regular 5 Ribu', 'Pulsa Regular 5 Ribu Indosat', '5500', '6000', 20, 1, 2),
(7, 'Pulsa Regular 10 Ribu', 'Pulsa Regular 10 Ribu Indosat', '10500', '11000', 25, 1, 2),
(10, 'Telkomsel 100 Ribu', 'Pulsa regular', '98000', '100000', 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proveder`
--

CREATE TABLE `proveder` (
  `id_proveder` int(11) NOT NULL,
  `nama_proveder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveder`
--

INSERT INTO `proveder` (`id_proveder`, `nama_proveder`) VALUES
(1, 'Telkomsel'),
(2, 'Indosat'),
(3, 'Tri'),
(4, 'XL & Axis'),
(5, 'Smartfren'),
(6, 'All Operator'),
(7, 'PLN');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_hp` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_nominal` int(11) NOT NULL,
  `harga_pulsa` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `detail` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_hp`, `qty`, `id_nominal`, `harga_pulsa`, `status`, `id_provider`, `id_kategori`, `detail`, `tanggal`, `user_id`) VALUES
(76, '089638889862', 2, 2, '30000', 1, 1, 1, 1, '2018-07-01 16:43:35', 1),
(77, '456', 3, 2, '30000', 1, 1, 1, 1, '2018-07-01 16:47:35', 1),
(78, '123', 3, 3, '22500', 1, 1, 1, 1, '2018-07-01 16:48:41', 1),
(79, '1234', 3, 2, '30000', 1, 1, 1, 1, '2018-07-01 16:56:04', 1),
(80, '1111', 3, 2, '30000', 1, 1, 1, 1, '2018-07-01 17:01:48', 1),
(81, '1', 3, 2, '30000', 1, 1, 1, 1, '2018-07-01 17:02:38', 1),
(82, '2', 2, 2, '30000', 1, 1, 1, 1, '2018-07-01 17:04:05', 1),
(83, '234', 3, 4, '11000', 1, 1, 1, 1, '2018-07-01 17:17:20', 1),
(84, '089638889862', 0, 3, '22500', 0, 1, 1, 0, '2018-07-04 07:56:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id` int(11) NOT NULL,
  `id_nominal` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `harga_pokok` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `dekripsi` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`id`, `id_nominal`, `id_kategori`, `id_provider`, `harga_pokok`, `qty`, `dekripsi`, `status`, `tanggal`, `user_id`) VALUES
(10, 3, 2, 2, '290000', 19, 'tes deskripsi', 0, '2018-07-01 17:36:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','karyawan') NOT NULL,
  `active` enum('0','1') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`, `active`, `last_login`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1', '2018-05-05 09:56:00'),
(2, 'karyawan', 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'karyawan', '1', '2018-05-05 09:56:00'),
(6, 'karyawan1', 'karyawan1', '8962cdff20ba8d7428cf77c4f1ed6d05', 'karyawan', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_nominal`
-- (See below for the actual view)
--
CREATE TABLE `v_nominal` (
`id_nominal` int(11)
,`nama_nominal` varchar(50)
,`nama_kategori` varchar(50)
,`nama_proveder` varchar(50)
,`deskripsi` text
,`hpp` decimal(8,0)
,`harga_jual` decimal(8,0)
,`stok` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_nominal`
--
DROP TABLE IF EXISTS `v_nominal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_nominal`  AS  select `nominal`.`id_nominal` AS `id_nominal`,`nominal`.`nama_nominal` AS `nama_nominal`,`kategori`.`nama_kategori` AS `nama_kategori`,`proveder`.`nama_proveder` AS `nama_proveder`,`nominal`.`deskripsi` AS `deskripsi`,`nominal`.`hpp` AS `hpp`,`nominal`.`harga_jual` AS `harga_jual`,`nominal`.`stok` AS `stok` from ((`nominal` join `proveder` on((`proveder`.`id_proveder` = `nominal`.`id_proveder`))) join `kategori` on((`kategori`.`id_kategori` = `nominal`.`id_kategori`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nominal`
--
ALTER TABLE `nominal`
  ADD PRIMARY KEY (`id_nominal`),
  ADD KEY `id_kategori` (`id_kategori`,`id_proveder`),
  ADD KEY `id_proveder` (`id_proveder`);

--
-- Indexes for table `proveder`
--
ALTER TABLE `proveder`
  ADD PRIMARY KEY (`id_proveder`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_nominal` (`id_nominal`),
  ADD KEY `id_provider` (`id_provider`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nominal` (`id_nominal`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_provider` (`id_provider`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nominal`
--
ALTER TABLE `nominal`
  MODIFY `id_nominal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proveder`
--
ALTER TABLE `proveder`
  MODIFY `id_proveder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nominal`
--
ALTER TABLE `nominal`
  ADD CONSTRAINT `nominal_ibfk_1` FOREIGN KEY (`id_proveder`) REFERENCES `proveder` (`id_proveder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nominal_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_nominal`) REFERENCES `nominal` (`id_nominal`);

--
-- Constraints for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD CONSTRAINT `transaksi_pembelian_ibfk_1` FOREIGN KEY (`id_nominal`) REFERENCES `nominal` (`id_nominal`),
  ADD CONSTRAINT `transaksi_pembelian_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `transaksi_pembelian_ibfk_3` FOREIGN KEY (`id_provider`) REFERENCES `proveder` (`id_proveder`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
