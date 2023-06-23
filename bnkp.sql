-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 02:36 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tata_ibadah` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Bendahara'),
(3, 'Sekretaris'),
(4, 'Pimpinan'),
(5, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petugas_kegiatan`
--

CREATE TABLE `petugas_kegiatan` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_petugas_kegiatan`
--

CREATE TABLE `temp_petugas_kegiatan` (
  `id` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uang_keluar`
--

CREATE TABLE `uang_keluar` (
  `id_uang_keluar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uang_masuk`
--

CREATE TABLE `uang_masuk` (
  `id_uang_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`, `id_anggota`) VALUES
(2, 'admin', 'admin', '$2y$10$33mqyN9MmAGEb.43YlE9FO4IiY4yq51XhqXowQazi0sgCfQSNaNfW', 1, NULL),
(3, 'bendahara', 'bendahara', '$2y$10$UbuH7ctAZhZrbxVnup7OPO95wZJqLWrf6wS8nc1pIY/ZBEt6lw9a.', 2, NULL),
(4, 'sekretaris', 'sekretaris', '$2y$10$lWIPKUq/o0m2b2uKyI6yj.AyiA.nobiFRVzhQ8PrJ6mBUxCidDTiC', 3, NULL),
(5, 'pimpinan', 'pimpinan', '$2y$10$kES11kXpkzIr3tZXX/vvcef98Jx9PRRN60Ez8KosxHmlybqkqpvkG', 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `petugas_kegiatan`
--
ALTER TABLE `petugas_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `temp_petugas_kegiatan`
--
ALTER TABLE `temp_petugas_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uang_keluar`
--
ALTER TABLE `uang_keluar`
  ADD PRIMARY KEY (`id_uang_keluar`);

--
-- Indexes for table `uang_masuk`
--
ALTER TABLE `uang_masuk`
  ADD PRIMARY KEY (`id_uang_masuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas_kegiatan`
--
ALTER TABLE `petugas_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_petugas_kegiatan`
--
ALTER TABLE `temp_petugas_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uang_keluar`
--
ALTER TABLE `uang_keluar`
  MODIFY `id_uang_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uang_masuk`
--
ALTER TABLE `uang_masuk`
  MODIFY `id_uang_masuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
