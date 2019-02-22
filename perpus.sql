-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 10:09 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `npm_npp` varchar(15) NOT NULL,
  `nama_depan` varchar(200) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `fakultas` varchar(45) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status` enum('mahasiswa','karyawan','dosen','alumni','lain','tidak aktif') NOT NULL,
  `tgl_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `npm_npp`, `nama_depan`, `nama_belakang`, `fakultas`, `jurusan`, `no_hp`, `status`, `tgl_register`, `user_id`) VALUES
(17, '093121788', 'annisa', 'agata', 'MIFA', 'biologi', '085768137009', 'alumni', '2018-07-07 10:33:44', 28),
(18, '181823482', 'mat', 'gunawan', 'komputer', 'teknik informatika', '0878888888888', 'mahasiswa', '2018-07-07 11:45:21', 28),
(19, '093121787', 'jokowi', 'presiden', 'pertanian', 'agrobisnis', '081232323232', 'tidak aktif', '2018-07-07 15:18:59', 28);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(25) NOT NULL,
  `judul_buku` text NOT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `penerbit` varchar(40) DEFAULT NULL,
  `tahun` varchar(4) NOT NULL,
  `asal_buku` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `kondisi` enum('baru','bekas') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `hapus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun`, `asal_buku`, `id_kategori`, `id_rak`, `kondisi`, `jumlah`, `waktu_register`, `user_id`, `hapus`) VALUES
(40, '123456', 'sistem informasi perpustkaan', 'johan', 'gunung karimun', '2018', 'mahasiswa/amir', 19, 15, 'baru', 8, '2018-07-07 10:46:21', 28, 0),
(41, '654321', 'manajemen dalam organisasi perkantoran', 'mail', 'gunung kidul', '2017', 'mahasiswa/firman', 19, 15, 'baru', 5, '2018-07-07 11:40:32', 28, 0),
(42, '4234234', 'manajemen rumah tangga', 'anton', 'gunung kidul', '2014', 'sumbangan/sugeng', 20, 18, 'baru', 23, '2018-07-07 15:22:44', 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `catatan`, `user_id`) VALUES
(19, 'komputer', 'hardwere, softwere, network', 28),
(20, 'ekonomi', 'manajemen, akuntansi, keuagan, perbankan, syariah, internatioanl', 28);

-- --------------------------------------------------------

--
-- Table structure for table `rak_buku`
--

CREATE TABLE `rak_buku` (
  `id` int(11) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak_buku`
--

INSERT INTO `rak_buku` (`id`, `nama_rak`, `catatan`, `user_id`, `id_kategori`) VALUES
(15, 'hardwere L1', 'Komputer di lemari hardwere laci dasar atau no 1', 28, 19),
(16, 'manajemen/pemasaran/L10', 'ekonomi/manajemen/pemasaran/ di lemari laci 100', 28, 20),
(17, 'softwhere/web/L6', 'softwere website di lemari nomor 6', 28, 19),
(18, 'manajemen/l4', 'manajemen lemari laci no 4', 28, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(23, '74500792cc934b73b1ae22c8631396', 28, '2018-07-07'),
(24, 'd4859ad5c3cff99f35b125b71a3167', 29, '2018-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_transaksi` enum('pinjam','kembali') NOT NULL,
  `terlambat` int(4) NOT NULL,
  `denda` decimal(10,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status_transaksi`, `terlambat`, `denda`, `user_id`, `last_date`) VALUES
(1, 40, 17, '2018-07-07', '2018-07-10', 'kembali', 0, '0', 28, '2018-07-07 15:26:38'),
(2, 41, 18, '2018-07-01', '2018-07-04', 'kembali', 3, '3000', 28, '2018-07-07 12:10:55'),
(3, 41, 17, '2018-07-07', '2018-07-10', 'kembali', 0, '0', 28, '2018-07-07 15:24:20'),
(4, 42, 18, '2018-07-07', '2018-07-10', 'kembali', 5, '5000', 28, '2018-07-15 06:26:52'),
(5, 42, 17, '2018-07-15', '2018-07-18', 'pinjam', 0, '0', 28, '2018-07-15 06:31:45'),
(6, 41, 17, '2018-07-15', '2018-07-18', 'pinjam', 0, '0', 28, '2018-07-15 06:32:14'),
(7, 40, 18, '2018-07-15', '2018-07-18', 'pinjam', 0, '0', 28, '2018-07-15 07:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `password` text,
  `last_login` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `role`, `password`, `last_login`, `status`) VALUES
(28, 'kirimcek@gmail.com', 'johan', 'santri', 'subscriber', 'sha256:1000:UIpAkelNQvqB3ynIGMk7VDyvfsygvi9J:+AU+SWX4BT5Rghbl/VUOu3GR7v/30kJ+', '2018-07-24 10:07:03 AM', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak_buku`
--
ALTER TABLE `rak_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rak_buku`
--
ALTER TABLE `rak_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
