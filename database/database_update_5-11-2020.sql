-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2020 at 10:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pmii`
--

-- --------------------------------------------------------

--
-- Table structure for table `jeniskonten`
--

CREATE TABLE `jeniskonten` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likekonten`
--

CREATE TABLE `likekonten` (
  `id` int(10) NOT NULL,
  `konten_id` int(4) NOT NULL,
  `ip_komputer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjeniskonten`
--

CREATE TABLE `subjeniskonten` (
  `id` int(4) NOT NULL,
  `jeniskonten_id` int(4) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kader`
--

CREATE TABLE `tb_kader` (
  `id` int(7) NOT NULL,
  `kode_kartu` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(17) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tahun_mapaba` varchar(4) NOT NULL,
  `tahun_pkd` varchar(4) NOT NULL,
  `tahun_pkl` varchar(4) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `komisariat_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kader`
--

INSERT INTO `tb_kader` (`id`, `kode_kartu`, `nama`, `alamat`, `no_hp`, `tmp_lahir`, `tgl_lahir`, `tahun_mapaba`, `tahun_pkd`, `tahun_pkl`, `foto`, `komisariat_id`) VALUES
(1, '', 'yudistiono', 'sumber pandan', '087234123554', 'bondowoso', '2020-11-05', '', '', '', '', 1),
(2, '', 'aqbil', 'sdfsdfa', '993893399', 'afadsf', '2020-11-25', '', '', '', '', 1),
(3, '', 'rika', 'jskdjfskjf', '0909090', 'sfdsfs', '2020-11-05', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komisariat`
--

CREATE TABLE `tb_komisariat` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komisariat`
--

INSERT INTO `tb_komisariat` (`id`, `nama`, `isi`, `foto`) VALUES
(1, 'wahid hasyim', 'berdiri pada tanggal skfskjfaj', ''),
(2, 'at taqwa', 'sefefsfs', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konten`
--

CREATE TABLE `tb_konten` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_konten` text NOT NULL,
  `jeniskonten_id` int(1) NOT NULL,
  `pembuat` int(4) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_proker`
--

CREATE TABLE `tb_proker` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `jadwal_pelaksanaan` date NOT NULL,
  `isi` text NOT NULL,
  `penanggung_jawab` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `user_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rayon`
--

CREATE TABLE `tb_rayon` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `komisariat_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rayon`
--

INSERT INTO `tb_rayon` (`id`, `nama`, `isi`, `foto`, `komisariat_id`) VALUES
(3, 'avicenna', 'sfesfesadfa', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_strukturkom`
--

CREATE TABLE `tb_strukturkom` (
  `id` int(4) NOT NULL,
  `parent_struktur_id` int(4) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kader_id` int(11) NOT NULL,
  `komisariat_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_strukturkom`
--

INSERT INTO `tb_strukturkom` (`id`, `parent_struktur_id`, `tipe`, `kader_id`, `komisariat_id`) VALUES
(1, 0, 'Ketua Umum', 2, 1),
(2, 0, 'Ketua umum', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_strukturray`
--

CREATE TABLE `tb_strukturray` (
  `id` int(5) NOT NULL,
  `parent_strukturray_id` int(4) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kader_id` int(11) NOT NULL,
  `rayon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `jenis` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jeniskonten`
--
ALTER TABLE `jeniskonten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likekonten`
--
ALTER TABLE `likekonten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konten_id` (`konten_id`);

--
-- Indexes for table `subjeniskonten`
--
ALTER TABLE `subjeniskonten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeniskonten_id` (`jeniskonten_id`);

--
-- Indexes for table `tb_kader`
--
ALTER TABLE `tb_kader`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komisariat_id` (`komisariat_id`);

--
-- Indexes for table `tb_komisariat`
--
ALTER TABLE `tb_komisariat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeniskonten_id` (`jeniskonten_id`);

--
-- Indexes for table `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komisariat_id` (`komisariat_id`);

--
-- Indexes for table `tb_strukturkom`
--
ALTER TABLE `tb_strukturkom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kader_id` (`kader_id`),
  ADD KEY `komisariat_id` (`komisariat_id`);

--
-- Indexes for table `tb_strukturray`
--
ALTER TABLE `tb_strukturray`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kader_id` (`kader_id`),
  ADD KEY `rayon_id` (`rayon_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeniskonten`
--
ALTER TABLE `jeniskonten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likekonten`
--
ALTER TABLE `likekonten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjeniskonten`
--
ALTER TABLE `subjeniskonten`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kader`
--
ALTER TABLE `tb_kader`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_komisariat`
--
ALTER TABLE `tb_komisariat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_konten`
--
ALTER TABLE `tb_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_proker`
--
ALTER TABLE `tb_proker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_strukturkom`
--
ALTER TABLE `tb_strukturkom`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_strukturray`
--
ALTER TABLE `tb_strukturray`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likekonten`
--
ALTER TABLE `likekonten`
  ADD CONSTRAINT `likekonten_ibfk_1` FOREIGN KEY (`konten_id`) REFERENCES `tb_konten` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjeniskonten`
--
ALTER TABLE `subjeniskonten`
  ADD CONSTRAINT `subjeniskonten_ibfk_1` FOREIGN KEY (`jeniskonten_id`) REFERENCES `jeniskonten` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_kader`
--
ALTER TABLE `tb_kader`
  ADD CONSTRAINT `tb_kader_ibfk_1` FOREIGN KEY (`komisariat_id`) REFERENCES `tb_komisariat` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD CONSTRAINT `tb_konten_ibfk_1` FOREIGN KEY (`jeniskonten_id`) REFERENCES `jeniskonten` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD CONSTRAINT `tb_proker_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD CONSTRAINT `tb_rayon_ibfk_1` FOREIGN KEY (`komisariat_id`) REFERENCES `tb_komisariat` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_strukturkom`
--
ALTER TABLE `tb_strukturkom`
  ADD CONSTRAINT `tb_strukturkom_ibfk_1` FOREIGN KEY (`komisariat_id`) REFERENCES `tb_komisariat` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_strukturray`
--
ALTER TABLE `tb_strukturray`
  ADD CONSTRAINT `tb_strukturray_ibfk_1` FOREIGN KEY (`rayon_id`) REFERENCES `tb_rayon` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
