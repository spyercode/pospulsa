-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2018 pada 13.52
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

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
CREATE DATABASE IF NOT EXISTS `sippulsa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sippulsa`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pulsa Regular'),
(2, 'Pulsa Data'),
(3, 'Pulsa Listrik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nominal`
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
-- Dumping data untuk tabel `nominal`
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
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `total_pembelian` decimal(6,2) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `nama_pembelian` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `hpp` decimal(6,2) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_proveder` int(11) NOT NULL,
  `id_nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proveder`
--

CREATE TABLE `proveder` (
  `id_proveder` int(11) NOT NULL,
  `nama_proveder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proveder`
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
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_transaksi` decimal(6,2) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detial`
--

CREATE TABLE `transaksi_detial` (
  `id_transaksi_detail` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(6,2) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `status` enum('gagal','sukses') NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `id_nominal` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_proveder` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `transaksi_detial`
--
DELIMITER $$
CREATE TRIGGER `transaksi_pulsa` AFTER INSERT ON `transaksi_detial` FOR EACH ROW BEGIN
UPDATE barang SET qty=qty-NEW.qty
WHERE id= NEW.id_nominal;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`, `active`, `last_login`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1', '2018-05-05 09:56:00'),
(2, 'karyawan', 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'karyawan', '1', '2018-05-05 09:56:00'),
(6, 'karyawan1', 'karyawan1', '8962cdff20ba8d7428cf77c4f1ed6d05', 'karyawan', '0', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `nominal`
--
ALTER TABLE `nominal`
  ADD PRIMARY KEY (`id_nominal`),
  ADD KEY `id_kategori` (`id_kategori`,`id_proveder`),
  ADD KEY `id_proveder` (`id_proveder`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`),
  ADD KEY `id_kategori` (`id_kategori`,`id_pembelian`,`id_proveder`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_proveder` (`id_proveder`),
  ADD KEY `id_nominal` (`id_nominal`);

--
-- Indeks untuk tabel `proveder`
--
ALTER TABLE `proveder`
  ADD PRIMARY KEY (`id_proveder`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi_detial`
--
ALTER TABLE `transaksi_detial`
  ADD PRIMARY KEY (`id_transaksi_detail`),
  ADD KEY `id_nominal` (`id_nominal`,`id_kategori`,`id_proveder`,`id_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_proveder` (`id_proveder`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nominal`
--
ALTER TABLE `nominal`
  MODIFY `id_nominal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `proveder`
--
ALTER TABLE `proveder`
  MODIFY `id_proveder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detial`
--
ALTER TABLE `transaksi_detial`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nominal`
--
ALTER TABLE `nominal`
  ADD CONSTRAINT `nominal_ibfk_1` FOREIGN KEY (`id_proveder`) REFERENCES `proveder` (`id_proveder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nominal_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD CONSTRAINT `pembelian_detail_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_2` FOREIGN KEY (`id_proveder`) REFERENCES `proveder` (`id_proveder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_4` FOREIGN KEY (`id_nominal`) REFERENCES `nominal` (`id_nominal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_detial`
--
ALTER TABLE `transaksi_detial`
  ADD CONSTRAINT `transaksi_detial_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detial_ibfk_2` FOREIGN KEY (`id_proveder`) REFERENCES `proveder` (`id_proveder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detial_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detial_ibfk_4` FOREIGN KEY (`id_nominal`) REFERENCES `nominal` (`id_nominal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
