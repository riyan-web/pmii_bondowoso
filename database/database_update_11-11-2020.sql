-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2020 pada 01.41
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `jeniskonten`
--

CREATE TABLE `jeniskonten` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `likekonten`
--

CREATE TABLE `likekonten` (
  `id` int(10) NOT NULL,
  `konten_id` int(4) NOT NULL,
  `ip_komputer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subjeniskonten`
--

CREATE TABLE `subjeniskonten` (
  `id` int(4) NOT NULL,
  `jeniskonten_id` int(4) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kader`
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
-- Dumping data untuk tabel `tb_kader`
--

INSERT INTO `tb_kader` (`id`, `kode_kartu`, `nama`, `alamat`, `no_hp`, `tmp_lahir`, `tgl_lahir`, `tahun_mapaba`, `tahun_pkd`, `tahun_pkl`, `foto`, `komisariat_id`) VALUES
(1, '', 'yudistiono', 'sumber pandan', '087234123554', 'bondowoso', '2020-11-05', '', '', '', '', 1),
(2, '', 'aqbil', 'sdfsdfa', '993893399', 'afadsf', '2020-11-25', '', '', '', '', 1),
(3, '', 'rika', 'jskdjfskjf', '0909090', 'sfdsfs', '2020-11-05', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komisariat`
--

CREATE TABLE `tb_komisariat` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komisariat`
--

INSERT INTO `tb_komisariat` (`id`, `nama`, `isi`, `foto`) VALUES
(1, 'wahid hasyim', 'berdiri pada tanggal skfskjfaj', ''),
(2, 'at taqwa', 'sefefsfs', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konten`
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
-- Struktur dari tabel `tb_proker`
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
-- Struktur dari tabel `tb_rayon`
--

CREATE TABLE `tb_rayon` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `komisariat_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rayon`
--

INSERT INTO `tb_rayon` (`id`, `nama`, `isi`, `foto`, `komisariat_id`) VALUES
(3, 'avicenna', 'sfesfesadfa', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_strukturkom`
--

CREATE TABLE `tb_strukturkom` (
  `id` int(4) NOT NULL,
  `parent_struktur_id` int(4) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kader_id` int(11) NOT NULL,
  `komisariat_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_strukturkom`
--

INSERT INTO `tb_strukturkom` (`id`, `parent_struktur_id`, `tipe`, `kader_id`, `komisariat_id`) VALUES
(1, 0, 'Ketua Umum', 2, 1),
(2, 0, 'Ketua umum', 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_strukturray`
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
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `jenis` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `tgl_update`, `jenis`) VALUES
(1, 'cabang_bondowoso', 'cabang123', '2020-11-10 23:05:08', '4'),
(2, 'komisariat_polije', 'polije123', '2020-11-10 23:05:08', '3'),
(3, 'rayon_avicenna', 'avicenna123', '2020-11-10 23:07:09', '2'),
(4, 'riyan', 'riyan123', '2020-11-10 23:07:09', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access`, `id_jenis`, `id_menu`) VALUES
(3, 1, 5),
(4, 1, 7),
(5, 2, 1),
(6, 2, 4),
(7, 2, 6),
(8, 2, 7),
(9, 2, 8),
(10, 2, 9),
(11, 3, 1),
(12, 3, 3),
(13, 3, 6),
(14, 3, 7),
(15, 3, 8),
(16, 3, 9),
(17, 4, 1),
(18, 4, 2),
(19, 4, 6),
(20, 4, 7),
(21, 4, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_jenis`
--

CREATE TABLE `user_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_jenis`
--

INSERT INTO `user_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'kader'),
(2, 'admin_rayon'),
(3, 'admin_komisariat'),
(4, 'admin_cabang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `nama_menu`) VALUES
(1, 'dashboard'),
(2, 'profile_cabang'),
(3, 'profile_komisariat'),
(4, 'profile_rayon'),
(5, 'profile_anggota'),
(6, 'berita'),
(7, 'artikel'),
(8, 'program_kerja'),
(9, 'data_anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(64) NOT NULL,
  `icon` varchar(64) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Dashboard_admin', 'menu-icon fa fa-dashboard', 1),
(2, 2, 'Profile Cabang', 'profile_cabang', 'menu-icon fa fa-building', 1),
(3, 3, 'Profile Komisariat', 'profile_komisariat', 'menu-icon fa fa-building\r\n', 1),
(4, 4, 'Profile Rayon', 'profile_rayon', 'menu-icon fa fa-building\r\n', 1),
(5, 5, 'Profile Angoota/Kader', 'profile_anggota', 'menu-icon fa fa-user', 1),
(6, 6, 'Berita', 'berita', 'menu-icon fa fa-leanpub', 1),
(7, 7, 'Artikel', 'artikel', 'menu-icon fa fa-book', 1),
(10, 8, 'Program Kerja', 'program_kerja', 'menu-icon fa fa-clipboard', 1),
(11, 9, 'Data Anggota', 'data_anggota', 'menu-icon fa fa-table', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jeniskonten`
--
ALTER TABLE `jeniskonten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `likekonten`
--
ALTER TABLE `likekonten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konten_id` (`konten_id`);

--
-- Indeks untuk tabel `subjeniskonten`
--
ALTER TABLE `subjeniskonten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeniskonten_id` (`jeniskonten_id`);

--
-- Indeks untuk tabel `tb_kader`
--
ALTER TABLE `tb_kader`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komisariat_id` (`komisariat_id`);

--
-- Indeks untuk tabel `tb_komisariat`
--
ALTER TABLE `tb_komisariat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeniskonten_id` (`jeniskonten_id`);

--
-- Indeks untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komisariat_id` (`komisariat_id`);

--
-- Indeks untuk tabel `tb_strukturkom`
--
ALTER TABLE `tb_strukturkom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kader_id` (`kader_id`),
  ADD KEY `komisariat_id` (`komisariat_id`);

--
-- Indeks untuk tabel `tb_strukturray`
--
ALTER TABLE `tb_strukturray`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kader_id` (`kader_id`),
  ADD KEY `rayon_id` (`rayon_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `id_jenis` (`id_jenis`) USING BTREE,
  ADD KEY `id_menu` (`id_menu`) USING BTREE;

--
-- Indeks untuk tabel `user_jenis`
--
ALTER TABLE `user_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD UNIQUE KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jeniskonten`
--
ALTER TABLE `jeniskonten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `likekonten`
--
ALTER TABLE `likekonten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subjeniskonten`
--
ALTER TABLE `subjeniskonten`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kader`
--
ALTER TABLE `tb_kader`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_komisariat`
--
ALTER TABLE `tb_komisariat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_konten`
--
ALTER TABLE `tb_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_rayon`
--
ALTER TABLE `tb_rayon`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_strukturkom`
--
ALTER TABLE `tb_strukturkom`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_strukturray`
--
ALTER TABLE `tb_strukturray`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_jenis`
--
ALTER TABLE `user_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `likekonten`
--
ALTER TABLE `likekonten`
  ADD CONSTRAINT `likekonten_ibfk_1` FOREIGN KEY (`konten_id`) REFERENCES `tb_konten` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subjeniskonten`
--
ALTER TABLE `subjeniskonten`
  ADD CONSTRAINT `subjeniskonten_ibfk_1` FOREIGN KEY (`jeniskonten_id`) REFERENCES `jeniskonten` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kader`
--
ALTER TABLE `tb_kader`
  ADD CONSTRAINT `tb_kader_ibfk_1` FOREIGN KEY (`komisariat_id`) REFERENCES `tb_komisariat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD CONSTRAINT `tb_konten_ibfk_1` FOREIGN KEY (`jeniskonten_id`) REFERENCES `jeniskonten` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD CONSTRAINT `tb_proker_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD CONSTRAINT `tb_rayon_ibfk_1` FOREIGN KEY (`komisariat_id`) REFERENCES `tb_komisariat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_strukturkom`
--
ALTER TABLE `tb_strukturkom`
  ADD CONSTRAINT `tb_strukturkom_ibfk_1` FOREIGN KEY (`komisariat_id`) REFERENCES `tb_komisariat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_strukturray`
--
ALTER TABLE `tb_strukturray`
  ADD CONSTRAINT `tb_strukturray_ibfk_1` FOREIGN KEY (`rayon_id`) REFERENCES `tb_rayon` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
