-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Feb 2018 pada 01.33
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `no_disposisi` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `pengirim` varchar(20) NOT NULL,
  `kode_surat` varchar(20) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `kepada` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_surat` enum('0','1') NOT NULL,
  `sifat` varchar(15) NOT NULL,
  `tanggapan` varchar(50) NOT NULL,
  `perihal` varchar(25) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`no_disposisi`, `no_agenda`, `pengirim`, `kode_surat`, `tanggal_kirim`, `tanggal_terima`, `no_surat`, `kepada`, `keterangan`, `status_surat`, `sifat`, `tanggapan`, `perihal`, `catatan`) VALUES
(9, 123, 'qwer', '421.5', '2018-02-07', '2018-02-07', '1234', '', '', '0', 'rahasia', '', 'asdf', ''),
(10, 7, 'KOMINFO', '5', '2018-02-17', '2018-02-18', '090/005/kominfo', 'Kesiswaan', 'Segera Datang', '1', 'rahasia', 'Ga usah datang', 'Undangan Rapat', 'none');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_surat` int(11) NOT NULL,
  `nama_jenis` varchar(15) NOT NULL,
  `kode_surat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_surat`, `nama_jenis`, `kode_surat`) VALUES
(1, 'undangan guru', '005'),
(2, 'pemberitahuan', '421.5'),
(3, 'tugas', '800'),
(4, 'undangan siswa', '421.7'),
(5, 'dispensasi', '421.7'),
(6, 'keterangan', '421.5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak` enum('admin','kepala tas') NOT NULL,
  `last_login` date NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `hak`, `last_login`, `status`) VALUES
(3, 'Teguh MochRifa', 'admin1', '202cb962ac59075b964b07152d234b70', 'admin', '2018-02-22', '1'),
(8, 'Ableh Kuncoro', 'min', '202cb962ac59075b964b07152d234b70', 'admin', '0000-00-00', '0'),
(10, 'Kepala Tas', 'kepala', '202cb962ac59075b964b07152d234b70', 'kepala tas', '2018-02-21', '1'),
(11, 'Boboiboy', 'mimin', '202cb962ac59075b964b07152d234b70', 'admin', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_keluar` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `jenis_surat` varchar(10) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pengirim` varchar(20) NOT NULL,
  `perihal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_keluar`, `no_agenda`, `jenis_surat`, `tanggal_kirim`, `no_surat`, `pengirim`, `perihal`) VALUES
(1, 1, '005', '2018-01-16', '001/Humas/Kominfo/20', 'KOMINFO', 'Undagan Peresmian'),
(2, 3, '421.7', '2018-01-09', '001/Humas/Kominfo/2018', 'KOMINFO', 'Prakerin'),
(3, 3, '421.7', '2018-01-10', '003/Humas/PT.KOKO/2018', 'PT.koko', 'apaweee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_masuk` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `jenis_surat` varchar(20) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pengirim` varchar(20) NOT NULL,
  `sifat` varchar(15) NOT NULL,
  `perihal` varchar(20) NOT NULL,
  `lampiran` int(11) NOT NULL,
  `nomor_petunjuk` varchar(15) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_masuk`, `no_agenda`, `jenis_surat`, `tanggal_kirim`, `tanggal_terima`, `no_surat`, `pengirim`, `sifat`, `perihal`, `lampiran`, `nomor_petunjuk`, `status`) VALUES
(11, 123, '421.5', '2018-02-07', '2018-02-07', '1234', 'qwer', 'rahasia', 'asdf', 0, 'sdfgh', '1'),
(12, 8, '421.7', '2018-02-07', '2018-02-08', '213123123', 'sdsadas', 'sangat segera', 'sd', 4, 'laskd', '0'),
(13, -1, '421.7', '2018-02-14', '2018-02-15', '019/33132/21321231', 'dsasdasdsasda', 'rahasia', 'dsad', 0, 'dsad', '0'),
(16, 7, '5', '2018-02-17', '2018-02-18', '090/005/kominfo', 'KOMINFO', 'rahasia', 'Undangan Rapat', 4, '3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`no_disposisi`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `no_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
