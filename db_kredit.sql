-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Mei 2016 pada 11.34
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_kredit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `area` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `nama`, `alamat`, `telepon`, `area`) VALUES
(2, 4, 'Made Bolu', 'jln Raya Kapal', '082771727732', 'Kuta'),
(8, 30, 'Hendra Wijaya', 'jalan nangka', '024928203940', 'Mengwi'),
(9, 31, 'Bedebahasdasd', 'Jalan badebah', '98238943298', 'Buduk'),
(10, 33, 'Edan asd', 'Jalan Nangka', '0857388888', 'Denpasar Selatan'),
(11, 34, 'Master Bedebah', 'adasd', '085736473647', 'Kuta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE IF NOT EXISTS `angsuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kredit` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `bayar` double NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `bunga` double NOT NULL,
  `sisa_kredit` double NOT NULL,
  `denda` double NOT NULL,
  `tgl_angsuran` date NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`id`, `id_kredit`, `id_cust`, `id_petugas`, `bayar`, `angsuran_ke`, `bunga`, `sisa_kredit`, `denda`, `tgl_angsuran`, `keterangan`) VALUES
(1, 1, 8, 2, 279333, 1, 46000, 2020667, 0, '2016-05-18', ''),
(2, 1, 8, 2, 273746, 2, 40413, 1746921, 0, '2016-05-18', ''),
(3, 2, 2, 2, 1013333, 1, 180000, 7986667, 0, '2016-05-18', ''),
(4, 3, 8, 2, 993333, 1, 160000, 7006667, 0, '2016-05-18', ''),
(5, 1, 8, 2, 268271, 3, 34938, 1478650, 0, '2016-05-18', ''),
(6, 1, 8, 2, 262906, 4, 29573, 1215744, 0, '2016-05-18', ''),
(7, 1, 8, 2, 257648, 5, 24315, 958096, 0, '2016-05-18', ''),
(8, 1, 8, 2, 252495, 6, 19162, 705601, 0, '2016-05-18', ''),
(9, 1, 8, 2, 247445, 7, 14112, 458156, 0, '2016-05-18', ''),
(10, 1, 8, 2, 242496, 8, 9163, 215660, 0, '2016-05-18', ''),
(11, 1, 8, 2, 237646, 9, 4313, 0, 0, '2016-05-18', ''),
(12, 3, 8, 2, 973466, 2, 140133, 6033201, 0, '2016-05-18', ''),
(13, 3, 8, 2, 953997, 3, 120664, 5079204, 0, '2016-05-18', ''),
(14, 3, 8, 2, 934917, 4, 101584, 4144287, 0, '2016-05-18', ''),
(15, 3, 8, 2, 916219, 5, 82886, 3228068, 0, '2016-05-18', ''),
(16, 3, 8, 2, 897894, 6, 64561, 2330174, 0, '2016-05-18', ''),
(17, 3, 8, 2, 879936, 7, 46603, 1450238, 0, '2016-05-18', ''),
(18, 3, 8, 2, 862338, 8, 29005, 587900, 0, '2016-05-18', ''),
(19, 3, 8, 2, 845091, 9, 11758, 0, 0, '2016-05-18', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `satuan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `satuan`) VALUES
(5, 'Samsung E5', 5000000, 'unit'),
(6, 'Asus Zenfone 2', 3500000, 'unit'),
(8, 'Canon 60D', 10000000, 'unit'),
(9, 'Asus Zenfone 2', 2999000, 'unit'),
(10, 'Leptop Asus X455L', 7500000, 'unit+acc'),
(11, 'Laptop Lenovo', 14000000, 'unit'),
(12, 'Lenovo Z12', 12000000, 'unit '),
(13, 'Pc Intel corei5', 7000000, 'unit lengkap'),
(14, 'Pc Intel corei5', 7000000, 'unit lengkap'),
(15, 'PC intel core i7', 10000000, 'unit lengkap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kredit`
--

CREATE TABLE IF NOT EXISTS `kredit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cust` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_kredit` date NOT NULL,
  `harga` double NOT NULL,
  `uang_muka` double NOT NULL,
  `bunga` double NOT NULL,
  `lama_cicilan` int(2) NOT NULL,
  `telah_bayar` double NOT NULL,
  `sisa` double NOT NULL,
  `keterangan` text,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `kredit`
--

INSERT INTO `kredit` (`id`, `id_cust`, `id_barang`, `tgl_kredit`, `harga`, `uang_muka`, `bunga`, `lama_cicilan`, `telah_bayar`, `sisa`, `keterangan`, `status`) VALUES
(1, 8, 6, '2016-05-18', 3500000, 1200000, 2, 15, 3521986, 0, '', 2),
(2, 2, 8, '2016-05-18', 10000000, 1000000, 2, 12, 2013333, 7986667, '', 1),
(3, 8, 15, '2016-05-18', 10000000, 2000000, 2, 12, 10257191, 0, '', 2),
(4, 11, 5, '2016-05-18', 5000000, 1000000, 2, 9, 1000000, 4000000, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `area` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `id_user`, `nama_petugas`, `telepon`, `status`, `area`) VALUES
(2, 13, 'Komang Pande Alit putra', '085737349932', NULL, 'Canggu'),
(3, 28, 'Petugas No 2', '085773736353', NULL, 'Buduk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(225) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `token`, `type`, `status`, `create_at`, `last_visit`) VALUES
(2, 'admin', 'admin', 'pandhey24@gmail.com', '', 1, 10, '2016-05-13 11:09:00', '2015-12-25 16:00:00'),
(4, 'konsumen', '94727b16c2221c188d39993e39f39ac3', 'konsumen@gmail.com', '', 3, 10, '2016-04-21 07:17:31', '0000-00-00 00:00:00'),
(12, 'pande', '9a3856de24797a250024edd5847b5de0', 'pande@yahoo.com', NULL, 1, 10, '2016-02-24 08:37:12', '0000-00-00 00:00:00'),
(13, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas@yahoo.com', '', 2, 10, '2016-02-24 08:32:49', '0000-00-00 00:00:00'),
(17, 'master', 'eb0a191797624dd3a48fa681d3061212', 'master_pande@yaho.com', NULL, 1, 11, '2016-05-13 11:03:57', '2016-02-22 16:00:00'),
(21, 'doni', 'doni', 'doni2@yahoo.com', '', 3, 11, '2016-03-18 05:48:40', '0000-00-00 00:00:00'),
(22, 'ajik', 'ajik', 'ajik@yahoo.com', '', 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'sumiartini', 'sumiartini', 'sumiartini11@bd.com', '', 3, 11, '2016-04-21 02:44:19', '0000-00-00 00:00:00'),
(28, 'petugas2', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas@asd.com', NULL, 2, 10, '2016-05-16 08:14:01', '0000-00-00 00:00:00'),
(33, 'bedebah', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'test@asdsd', NULL, 3, 10, '2016-05-16 09:05:04', '0000-00-00 00:00:00'),
(34, 'ql9p80', '902bd05723770e5b6c7a8d925adc162f', 'wijaya.asd@gmail.com', NULL, 3, 10, '2016-05-18 09:27:10', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
