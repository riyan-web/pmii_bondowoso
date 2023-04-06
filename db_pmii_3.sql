-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pmii_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `jeniskonten`
--

CREATE TABLE `jeniskonten` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jeniskonten`
--

INSERT INTO `jeniskonten` (`id`, `nama_jenis`) VALUES
(3, 'Eksposisi'),
(4, 'Argumentasi'),
(5, 'Persuasi'),
(6, 'Eksploratif'),
(7, 'prediktif'),
(8, 'Eksplanati'),
(9, 'Opini'),
(10, 'Investigasi'),
(19, 'Interpretative'),
(20, 'Depth');

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
-- Table structure for table `materi_pmii`
--

CREATE TABLE `materi_pmii` (
  `id_materi` int(11) NOT NULL,
  `judul_materi` varchar(128) NOT NULL,
  `deskripsi_materi` varchar(256) NOT NULL,
  `jenis_materi` enum('MAPABA','PKD','PKL') NOT NULL,
  `link_download` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_pmii`
--

INSERT INTO `materi_pmii` (`id_materi`, `judul_materi`, `deskripsi_materi`, `jenis_materi`, `link_download`) VALUES
(1, 'Nilai Dasar Pergerakan', 'kalimat tauhid, hablum minallah, hablumminannas, hablum minal alam', 'MAPABA', 'IBNU_KHALDUN_KAJIAN_TOKOH_SEJARAH_DAN_ILMU-ILMU_SO.pdf'),
(2, 'Antropologi Kampus', 'mengenal berbagai karakter mahasiswa di kampus', 'MAPABA', 'default.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_pengunjung`
--

CREATE TABLE `pesan_pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_pengunjung`
--

INSERT INTO `pesan_pengunjung` (`id`, `nama`, `email`, `subject`, `pesan`, `tanggal`, `status`) VALUES
(1, 'yudistiono', 'yudistiono@gmail.com', 'coba', 'coabakke kdkea', '2020-12-26', '0'),
(2, 'riyan', 'riyan@gmail.com', 'tanggapan', 'menurut saya aplikasi ini sangat bagus', '2020-12-29', '0'),
(9, 'ana', 'ana@gmail.com', 'sssc', 'sacsc', '2020-12-29', '0'),
(10, 'ana', 'ana@gmail.com', 'sssc', 'sacsc', '2020-12-29', '0'),
(11, 'ana', 'ana@gmail.com', 'sksaicksc', 'sajsdsjsd', '2020-12-29', '0'),
(12, 'sdsasc', '', 'sdsfcs', 'scsdcsd', '2020-12-29', '0'),
(13, 'sdsasc', '', 'sdsfcs', 'scsdcsd', '2020-12-29', '0'),
(14, 'scscs', 'ana_farida@gmail.com', 'tanggapan', 'scsdvsdv', '2020-12-29', '0'),
(15, 'ahsashd', 'asjjsj@gmail.com', 'asjdas', 'as', '2020-12-29', '0'),
(16, 'sajsajsaj', 'yudiiriyanto7@gmail.com', 'sahshsh', 'shshahsdc', '2020-12-29', '0'),
(17, '', 'yudiiriyanto7@gmail.com', 'sdasas', 'adcsv', '2020-12-29', '0'),
(18, '', 'yudiiriyanto7@gmail.com', 'sdasas', 'adcsv', '2020-12-29', '0'),
(19, 'riyan', 'scds@gmail.com', 'assd', 'scas', '2020-12-29', '0'),
(20, 'riyan', 'yudiiriyanto7@gmail.com', 'assd', 'rtghrhddfjfdj fjfjbf', '2020-12-29', '0'),
(21, 'scnsdjcsd', 'scjsdj@gmail.com', 'hhshshx', 'sysddssd', '2020-12-29', '0'),
(22, 'sdcjsdj', 'ahdhash@gmail.com', 'sdcsdvsd', 'dscsdvdsvds', '2020-12-29', '0'),
(23, 'saxsjcj', 'sasajj@gmail.com', 'sfcsvs', 'sdcsdvd', '2020-12-29', '0'),
(24, 'bdbsas', 'ascscs@gmail.com', 'ascsa', 'asjasjcs', '2020-12-29', '0'),
(25, 'sslc', 'sajsj@gmail.com', 'weewfe', 'evgebe', '2020-12-29', '0'),
(27, 'sacnsnc', 'riyanyudi@gmail.com', 'sasncsd', 'scdscds', '2020-12-29', '1'),
(28, 'riyanshs', 'sbsh@gmail.com', 'tanggapansch', 'dhcdsbsdhdsbh', '2021-01-05', '1'),
(29, 'riyanshs', 'sbsh@gmail.com', 'tanggapansch', 'dhcdsbsdhdsbh', '2021-01-05', '1'),
(30, 'riyan', 'riyan12345@gmail.com', 'tanggapan', 'scashhsds ds', '2021-01-05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subjeniskonten`
--

CREATE TABLE `subjeniskonten` (
  `id` int(4) NOT NULL,
  `jeniskonten_id` int(4) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjeniskonten`
--

INSERT INTO `subjeniskonten` (`id`, `jeniskonten_id`, `nama`) VALUES
(9, 3, 'artikel'),
(10, 4, 'artikel'),
(11, 5, 'artikel'),
(12, 6, 'artikel'),
(13, 7, 'artikel'),
(14, 8, 'artikel'),
(15, 9, 'berita'),
(16, 10, 'berita'),
(17, 19, 'berita'),
(18, 20, 'berita');

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
(9, 'WH1999062100002', 'Yudi Iriyanto', 'Jl. Perikanan', '085234071081', 'bondowoso', '1999-06-21', '2018', '2019', '0', 'riyan1.jpg', 5),
(11, 'WH1998062100002', 'taufik', 'probolinggo', '0826382738273', 'probolinggo', '1998-06-21', '2018', '0', '0', 'default.jpg', 5),
(12, 'WH1998062100002', 'M. Aqbil Rizqur Rahman', 'Bws, tamanan', '0826382738273', 'bondowoso', '1998-06-21', '2019', '2019', '0', '1609139832828.jpg', 5),
(13, 'WH1999062100002', 'Muhammad Fathorosi', 'bws, plalangan', '0826382738273', 'bondowoso', '1999-06-21', '2012', '0', '0', '1609139897577.jpg', 5),
(14, 'WH1999062100002', 'Yuliatin', 'bws, maesan', '0826382738273', 'bondowoso', '1999-06-21', '2012', '0', '0', 'default.jpg', 5),
(15, 'WH1999062100002', 'Zainur Rozikin', 'bws, tlogo', '085234071081', 'bondowoso', '1999-06-21', '2012', '0', '0', '1609140043671.jpg', 5),
(16, 'WH1999062100002', 'Muhammad noval Badri rohman', 'Bondowoso, Tlogosari', '085234071081', 'Bondowoso', '1999-06-21', '2012', '0', '0', 'default.jpg', 5),
(17, 'WH1999062100002', 'Viky Lorent Sea Putra', 'Bondowoso, Tamanan', '085234071081', 'Bondowoso', '1999-06-21', '2012', '0', '0', 'default.jpg', 5),
(18, 'WH1998062100002', 'Royyan Nur Rohman', 'Bondowoso, Koncer', '0826382738273', 'Bondowoso', '1998-06-21', '2012', '0', '0', '1609140531513.jpg', 5),
(19, 'WH1999062100002', 'Rifjan Jundila', 'Probolinggo, kraksaan', '0826382738273', 'Probolinggo', '1999-06-21', '2012', '0', '0', '1609141104685.jpg', 5),
(20, 'PC19930721', 'Fathorrosi', 'maesan, Bondowoso', '0839273297382', 'bondowso', '1993-07-21', '2016', '2017', '', 'fathorrosi.jpg', 1),
(21, 'PC19940915', 'Muhammad Arif', 'Wonosari, Bondowoso', '08526823628212', 'Bondowoso', '0000-00-00', '2016', '', '', 'arif.jpg', 1),
(22, 'PC19920726', 'Ridwan', 'wonosari, bondowoso', '086524783647', 'Bondwoso', '0000-00-00', '2016', '2017', '', 'ridwan.jpg', 1),
(23, 'PC19951207', 'Saiful Khoir', 'Wringin, Bondowoso', '0853268383673', 'Bondowoso', '1995-12-07', '2016', '2017', '', 'khoir.jpg', 1),
(24, 'PC19951109', 'Abduh', 'Tamanan, Bondowoso', '085263748563', 'Bondowoso', '1995-11-09', '2016', '2017', '0', 'abduh.jpg', 1),
(25, 'PC19920817', 'M Daimul Ichsan', 'Tlogosari, Bondowoso', '085273274847', 'Bondowoso', '1992-08-17', '2016', '2017', '0', 'daim.jpg', 1),
(26, 'PC19970726', 'Hafidi', 'Koncer, Bondowoso', '08526823628212', 'Bondowoso', '1997-07-26', '2016', '2017', '0', 'hafidi.jpg', 1),
(27, 'PC19970925', 'Wasil', 'Sekarputih, Bondowoso', '0839273297382', 'Bondowoso', '1997-09-25', '2016', '2017', '0', 'wasil.jpg', 1),
(28, 'PC19950107', 'Aan Nurhadi', 'Maesan, Bondowoso', '0852682362821', 'Bondowoso', '1995-01-07', '2016', '2017', '0', 'aan.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komisariat`
--

CREATE TABLE `tb_komisariat` (
  `id` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `singkatan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komisariat`
--

INSERT INTO `tb_komisariat` (`id`, `nama`, `isi`, `foto`, `singkatan`) VALUES
(1, 'PC PMII Bondowoso', 'berdiri pada tanggal skfskjfaj', 'default.jpg', 'PC'),
(2, 'Komisariat Universitas Jember Kampus Bondowooso', 'sefefsfs', '1606207961890.jpg', 'UJ'),
(3, 'Komisariat Universitas Bondowoso', '<p>Berdiri pada&nbsp;</p>\r\n', '1609829198652.png', 'UB'),
(4, ' Komisariat Raden Bagus Asra STAI At-Taqwa', 'berdiri pada sajdasjdajd', '1606205376829.jpg', 'AT'),
(5, 'Komisariat Wahid Hasyim Politeknik Negeri Jember Kampus Bondowoso', '<p>Berdiri pada tanggal ..-..-.... Komisariat wahid hasyim merupakan lembaga yang menaungi kader-kader mahasiswa PMII di Politeknk Negeri Jember Kampus Bondowoso</p>\r\n', '1609852148831.png', 'WH'),
(6, 'Komisariat STITA Togo Ambarsari', 'berdiri pada tanggal sbsdhdhsh', '1606205483725.jpg', 'TA'),
(7, 'Komisariat STIS Darul Falah', '<p>Berdiri pada tangggal dhsfsafb</p>\r\n', '1608101137549.jpg', 'DF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konten`
--

CREATE TABLE `tb_konten` (
  `id_konten` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_konten` text NOT NULL,
  `jeniskonten_id` int(1) NOT NULL,
  `foto_artikel` varchar(128) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `status` enum('0','1','2','3') NOT NULL,
  `user_id` int(2) NOT NULL,
  `kader_id` int(4) NOT NULL,
  `pesan_ditolak` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konten`
--

INSERT INTO `tb_konten` (`id_konten`, `judul`, `isi_konten`, `jeniskonten_id`, `foto_artikel`, `tgl_buat`, `status`, `user_id`, `kader_id`, `pesan_ditolak`) VALUES
(13, 'Pergerakan Mahasiswa Dalam Pendidikan Kritis', 'PMII harus memiliki tanggung jawab representative sosial kemasyarakatan yang majemuk, dan dituntut untuk menjadi “agent of transformation” melalui dinamika pergerakan yang konstruktif dan menghindari pergerakan sporadis dengan landasan strategis menuju suatu tatanan masyarakat yang adil dan makmur dalam bingkai kemanusiaan (humanist).\r\nBerawal dari tanggung jawab inilah peran mahasiswa sangat dominan sebagai tokoh sentral episode reformasi yang terjadi pada bulan mei 1998 yang lalu. Gerakan mahasiswa yang bersumbu pada sikap kritis akan ketimpangan sosial pada waktu itu, seakan-akan menjadi peletup untuk bangun dari tidur panjang. Sebuah gerakan nurani untuk membela masyarakat yang termarginalkan dan juga gerakan moral untuk menjadikan bangsa dan Negara yang demokratis, dan PMII menjadi bagian dari episode tersebut.\r\nKemudian yang menarik untuk dikaji adalah sejauh mana peranan pendidikan kritis tersebut bisa dijadikan legitimasi akan arah gerak PMII. Sebab bagaimanapun juga aspek pendidikan cenderung akan membentuk idiologi yang beragam pada masyarakat, khususnya mahasiswa.\r\nDilihat dari sejarah perkembangan pendidikan, pendidikan kritis berkembang pesat mulai dekade 70-an, namun demikian pada dekade 20-an telah lahir konsep pendidikan kritis yang berupa pemikiran-pemikiran pendidikan progresif dari George S. Counts. Beliau mengemukakan tiga masalah vital pada masa itu, dan kemudian dari masalah-masalah tersebut lahirlah yang dinamakan pendidikan kritis. Tiga masalah tersebut yaitu mengkritik prinsip pendidikan konservatif, memberikan ruang besar terhadap peranan guru untuk menjadikan pendidikan sebagai agen dari perubahan sosial, dan penataan ekonomi sebagai salah satu syarat untuk perbaikan pendidikan (H.A.R. Tilaar, 2003:44).\r\nPendidikan kritis dalam pengimplementasiannya tidak akan lepas dari konsep paradigma kritis, dimana paradigma kritis merupakan salah satu aliran pendekatan pendidikan yang telah dipetakan oleh Girouk dan Aronowitz (1985). Menurut mereka dalam dunia pendidikan ada tiga aliran pendidikan yang menjadi landasan fundamental dan mempunyai karakteristik berbeda satu sama lainnya. Aliran tersebut yaitu pendidikan yang berparadigma konservatif, liberal dan kritis.', 4, 'mhs_pergerakan.jpg', '2020-11-13 12:15:18', '2', 1, 0, ''),
(14, 'Kaderisasi Berbasis Kompetensi Dalam Bingkai Ideologi Pergerakan', 'Basis kader PMII adalah mahasiswa yang dalam fase usia identik dengan keremajaan. Suatu fase transisi antar kana-kanak dan kedewasaan. pada fase ini kecenderungan mencari jati diri sangat besar untuk mendapatkan arah, orientasi, pandangan dan tujuan hidup di masa depan. Berbagai macam eksperimentasi banyak dilakukan, dalam terbentuknya pandangan hidup, intelektual dan keterampilan.\r\nSebagai mahasiswa yang hidup dalam lingkup civitas akademika, kader PMII berada dalam lingkaran kompetensi bidang atau jurusan yang digeluti, yang tentunya sangat mempengaruhi pula dalam pembentukan arah dan tujuan hidup di masa depan. kader PMII terdiri dari beragam kopetensi jurusan di setiap kampus masing-masing. Dan tentunya hal ini merupakan kekayaan dan asset organisasi yang mutlak perlu di dihargai dalam arti mengembangkan dan memberdayakan kader sesuai dengan bidang kopetensi yang digelutinya.\r\nSelama ini pola kaderisasi PMII hanya berjalan dua arah, yang itupun saling menegasikan antara satu dengan lainnya, yakni intelektual dan gerakan sosial. Tidak ada ruang bagi pengembangan profesionalitas, wira usaha, dan keterampilan teknis di dalam ranah kePMIIan. Kader PMII yang mengembangkan diri diluar arah intelektual dan gerakan sosial cenderung terkucilkan dalam berPMII, karena sudah menjadi stereotype bahwa diluar kedu arah tersebut berarti keluar dari mindsteaim pergerakan. Walhasil, PMII penuh dengan para pemikir dan aktivis sosial yang kesemuanya dimobilisasi keranah politik.\r\nPadahal sebagai sebagai komunitas yang mengidentifikasi diri sebagai komunitas yang turut mempengaruhi fenomena kebangsaan, PMII harus dapat memiliki segalanya, sehingga mempunyai akses keseluruh sektor kehidupan masyarakat.\r\nKenyataan ini memang tidak lepas dari momentum sejarah kelahiran PMII. Dimana PMII lahir dalam pergolakan sosial poliltik kebangsaan pasca kemerdekaan pada masa itu.\r\nTetapi momentum hari ini berbeda, sejalan dengan perkembangan zaman yang terus melaju, mestinya dalam memaknai konsistensi alur sejarah tidak secara dogmatis. Tetapi memaknai konsistensi sejarah dengan mengambil ruh idelogisnya sebagai penentu arah, pandangan dan orientasi hidup setiap kader PMII. Dimana ruh ideologis sejarah tersebut dapat mempertemukan dan mempersatukan semua kader PMII dimanapun berada dan di sektor apapun bergerak dan membangun.\r\nTuntutan momentum era dimana kita berada hari ini adalah profesionalitas dan kopetensi di segala sektor kehidupan. Berbeda dengan tuntutan momentum pada sejarah berdirinya PMII yang sedang mengalami begolakan sosial politik pasca kemerdekaan. Hari ini kita berada ditengah-tengah persaingan yan menggelobal, sehingga pada level komunitas kita dituntut untuk membangun kualitas kader yang tidak hanya militant secara ideologis tetapi juga berbekal penguasaan keterapilan teknis di bidangnya masing-masing.\r\nPola kaderisasi yang telah berlangsung selama ini tidak berarti harus ditinggalkan. Tetapi tetap dilanjutkan sebagai bentuk internalisasi pemikiran dan ideologis. Dan selanjutnya melengkapinya dengan pola kaderisasi yang selama ini dinegasikan, yaitu membangun kopetensi, profesionalitas dan keterampilan teknis di setiap bidang jurusan masing-masing personalitas kader.', 6, 'kaderisasi.jpg', '2020-11-13 12:15:18', '2', 1, 0, ''),
(15, 'NILAI DASAR PERGERAKAN TAUHID', 'Meng-Esakan Allah SWT, merupakan nilai paling asasi yang dalam sejarah agama samawi telah terkandung sejak awal keberadaan manusia.\r\nAllah adalah Esa dalam segala totalitas, dzat, sifat-sifat, dan perbutan-perbuatan-Nya. Allah adalah dzat yang fungsional. Allah menciptakan, memberi petunjuk, memerintah, dan memelihara alam semesta ini. Allah juga menanamkan pengetahuan, membimbing dan menolong manusia. Allah Maha Mengetahui, Maha Menolong, Maha Bijaksana, Hakim, Maha Adil, dan Maha Tunggal. Allah Maha Mendahului dan Maha Menerima segala bentuk pujaan dan penghambaan.\r\nKeyakina seperti itu merupakan keyakinan terhadap sesuatu yang lebih tinggi dari pada alam semesta, serta merupakan kesadaran dan keyakinan kepada yang ghaib. Oleh karena itu, tauhid merupakan titik puncak, melandasi, memadu, dan menjadi sasaran keimanan yang mencakup keyakinan dalam hati, penegasan lewat lisan, dan perwujudan dalam perbuatan. Maka konsekuensinya Pergerakan harus mampu melarutkan nilai-nilai Tauhid dalam berbagai kehidupan serta terkomunikasikan dan mermbah ke sekelilingnya. Dalam memahami dan mewujudkan itu, Pergerakan telah memiliki Ahlussunnah wal jama’ah sebagai metode pemahaman dan penghayatan keyakinan itu.', 7, 'ndp_hubungan_tauhid.jpg', '2020-11-13 12:17:20', '2', 1, 0, ''),
(16, 'NILAI DASAR PERGERAKAN HUBUNGAN MANUSIA DENGAN ALLAH', 'Allah adalah Pencipta segala sesuatu. Dia menciptakan manusia dalam bentuk sebaik-baik kejadian dan menganugerahkan kedudukan terhormat kepada manusia di hadapan ciptaan-Nya yang lain.\r\nKedudukan seperti itu ditandai dengan pemberian daya fikir, kemampuan berkreasi dan kesadaran moral. Potensi itulah yang memungkinkan manusia memerankan fungsi sebagai khalifah dan hamba Allah. Dalam kehidupan sebagai khalifah, manusia memberanikan diri untuk mengemban amanat berat yang oleh Allah ditawarkan kepada makhluk-Nya. Sebagai hamba Allah, manusia harus melaksanakan ketentuan-ketentauan-Nya. Untuk itu, manusia dilengkapi dengan kesadaran moral yang selalu harus dirawat, jika manusia tidak ingin terjatuh ke dalam kedudukan yang rendah.\r\nDengan demikian, dalam kehidupan manusia sebagai ciptaan Allah, terdapat dua pola hubungan manusia dengan Allah, yaitu pola yang didasarkan pada kedudukan manusia sebagai khalifah Allah dan sebagai hamba Allah. Kedua pola ini dijalani secara seimbang, lurus dan teguh, dengan tidak menjalani yang satu sambil mengabaikan yang lain. Sebab memilih salah satu pola saja akan membawa manusia kepada kedudukan dan fungsi kemanusiaan yang tidak sempurna. Sebagai akibatnya manusia tidak akan dapat mengejawentahkan prinsip tauhid secara maksimal.\r\nPola hubungan dengan Allah juga harus dijalani dengan ikhlas, artinya pola ini dijalani dengan mengharapkan keridloan Allah. Sehingga pusat perhatian dalam menjalani dua pola ini adalah ikhtiar yang sungguh-sungguh. Sedangkan hasil optimal sepenuhnya kehendak Allah. Dengan demikian, berarti diberikan penekanan menjadi insan yang mengembangkan dua pola hubungan dengan Allah. Dengan menyadari arti niat dan ikhtiar, sehingga muncul manusia-manusia yang berkesadaran tinggi, kreatif dan dinamik dalam berhubungan dengan Allah, namun tetap taqwa dan tidak pongah Kepada Allah.\r\nDengan karunia akal, manusia berfikir, merenungkan dan berfikir tentang ke-Maha-anNya, yakni ke-Mahaan yang tidak tertandingi oleh siapapun. Akan tetapi manusia yang dilengkapi dengan potensi-potensi positif memungkinkan dirinyas untuk menirukan fungsi ke-Maha-anNya itu, sebab dalam diri manusia terdapat fitrah uluhiyah – fitrah suci yang selalu memproyeksikan terntang kebaikan dan keindahan, sehingga tidak mustahil ketika manusia melakukan sujud dan dzikir kepadaNya, Manusia berarti tengah menjalankan fungsi Al Quddus. Ketika manusia berbelas kasih dan berbuat baik kepada tetangga dan sesamanya, maka ia telah memerankan fungsi Arrahman dan Arrahim. Ketikamanusia bekerja dengan kesungguhan dan ketabahan untuk mendapatkan rizki, maka manusia telah menjalankan fungsi Al Ghoniyyu. Demikian pula dengan peran ke-Maha- an Allah yang lain, Assalam, Al Mukmin, dan lain sebagainya. Atau pendek kata, manusia dengan anugrah akal dan seperangkat potensi yang dimilikinya yang dikerjakan dengan niatyang sungguh-sungguh, akan memungkinkan manusia menggapai dan memerankan fungsi-fungsi Asma’ul Husna.\r\nDi dalam melakukan pekerjaannya itu, manusia diberi kemerdekaan untuk memilih dan menentukan dengan cara yang paling disukai. 14) Dari semua pola tingkah lakunya manusia akan mendapatkan balasan yang setimpal dan sesuai yang diupayakan, karenanya manusia dituntut untuk selalu memfungsikan secara maksimal ke4merdekaan yang dimilikinya, baik secara perorangan maupun secara bersama-sama dalam konteks kehidupan di tengah-tengah alam dan kerumunan masyarakat, sebab perubahan dan perkembangan hanyalah milikNya, oleh dan dari manusia itu sendiri.15)\r\nSekalipun di dalam diri manusia dikaruniai kemerdekaan sebagai esensi kemanusiaan untuk menentukan dirinya, namun kemerdekaan itu selalu dipagari oleh keterbatasan-keterbatasan, sebab prerputaran itu semata-mata tetap dikendalaikan oleh kepastian-kepastian yang Maha Adil lagi Maha Bijaksana,yang semua alam ciptaanNya iniselalu tunduk pada sunnahNya, pada keharusan universal atau takdir. 16 ) Jadi manusia bebas berbuat dan berusaha ( ikhtiar ) untuk menentukan nasibnya sendiri, apakah dia menjadi mukmin atau kafir, pandai atau bodoh, kaya atau miskin, manusia harus berlomba-lomba mencari kebaikan, tidak terlalu cepat puas dengan hasil karyanya. Tetapi harus sadar pula dengan keterbatasan- keterbatasannya, karaena semua itu terjadi sesuai sunnatullah, hukum alam dan sebab akibat yang selamanya tidak berubah, maka segala upaya harus diserrtai dengan tawakkal. Dari sini dapat dipahami bahwa manusia dalam hidup dan kehidupannya harus selalu dinamis, penuh dengan gerak dan semangat untuk berprestasi secara tidak fatalistis. Dan apabila usaha itu belum berhasil, maka harus ditanggapi dengan lapang dada, qona’ah (menerima) karena disitulah sunnatullah berlaku. Karenanya setiap usaha yang dilakukan harus disertai dengan sikap tawakkal kepadaNya. 17 )', 7, 'ndp_manusia_dengan_allah.jpg', '2020-11-13 12:15:18', '2', 1, 0, ''),
(17, 'NILAI DASAR PERGERAKAN HUBUNGAN MANUSIA DENGAN MANUSIA', 'Kenyataan bahwa Allah meniupkan ruhNya kepada materi dasar manusia menunjukan , bahwa manusia berkedudukaan mulia diantara ciptaan-ciptaan Allah.\r\nMemahami ketinggian eksistensi dan potensi yang dimiliki manusia, anak manusia mempunyai kedudukan yang sama antara yang satu dengan yang lainnya. Sebagai warga dunia manusia adalah satu dan sebagai warga negara manusia adalah sebangsa , sebagai mukmin manusia adalah bersaudara. 18)\r\nTidak ada kelebihan antara yang satu dengan yang lainnya , kecuali karena ketakwaannya. Setiap manusia memiliki kekurangan dan kelebihan, ada yang menonjol pada diri seseorang tentang potensi kebaikannya , tetapi ada pula yang terlalu menonjol potensi kelemahannya, agar antara satu dengan yang lainnya saling mengenal, selalu memadu kelebihan masing-masing untuk saling kait mengkait atau setidaknya manusia harus berlomba dalam mencaridanmencapai kebaikan, oleh karena itu manusia dituntut untuk saling menghormati, bekerjasama, totlong menolong, menasehati, dan saling mengajak kepada kebenaran demi kebaikan bersama.\r\nManusia telah dan harus selalu mengembangkan tanggapannya terhadap kehidupan. Tanggapan tersebut pada umumnya merupakan usaha mengembangkan kehidupan berupa hasil cipta, rasa, dan karsa manusia. Dengan demikian maka hasil itu merupakan budaya manusia, yang sebagian dilestarikan sebagai tradisi, dan sebagian diubah. Pelestarian dan perubahan selalu mewarnai kehidupan manusia. Inipun dilakukan dengan selalu memuat nilai-nilai yang telah disebut di bagian awal, sehingga budaya yang bersesuaian bahkan yang merupakan perwujudan dari nilai-nilai tersebut dilestarikan, sedang budaya yang tidak bersesuaian diperbaharui.\r\nKerangka bersikap tersebut mengisyaratkan bergerak secara dinamik dan kreatif dalam kehidupan manusia. Manusia dituntut untuk memanfaatkan potensinya yang telah dianugerahkan oleh Allah SWT. Melalui pemanfaatan potensi diri itu justru manusia menyadari asal mulanya, kejadian, dan makna kehadirannya di dunia.\r\nDengan demikian pengembangan berbagai aspek budaya dan tradisi dalam kehidupan manusia dilaksanakan sesuai dengan nilai dalam hubungan dengan Allah, manusia dan alam selaras dengan perekembangan kehidupandan mengingat perkembangan suasana. Memang manusia harus berusaha menegakan iman, taqwa dan amal shaleh guna mewujudkan kehidupan yang baik dan penuh rahmat di dunia. Di dalam kehidupan itu sesama manusia saling menghormati harkat dan martabat masing-masing , berderajat, berlaku adil dan mengusahakan kebahagiaan bersama. Untuk diperlukan kerjasama yang harus didahului dengan sikap keterbukaan, komunikasi dan dialog antar sesama. Semua usaha dan perjuangan ini harus terus -menerus dilakukan sepanjang sejarah.\r\nMelalui pandangan seperti ini pula kehidupan bermasyarakat,berbangsa dan bernegara dikembangkan. Kehidupan bermasyarakat, berbangsa dan bernegara merupakan kerelaan dan kesepakatan untuk bekerja sama serta berdampingan setara dan saling pengertian. Bermasyarakat, berbangsa dan bernegara dimaksudkan untuk mewujudkan cita-cita bersama : hidup dalam kemajuan, keadilan, kesejahteraan dan kemanusiaan. Tolok ukur bernegara adalah keadilan, persamaan hukum dan perintah serta adanya permusyawaratan.\r\nSedangkan hubungan antara muslim ddan non muslim dilakukan guna membina kehidupan manusia dengan tanpa mengorbankan keyakinan terhadap universalitas dan kebenaran Islam sebagai ajaran kehidupan paripurna. Dengan tetap berpegang pada keyakinan ini, dibina hubungan dan kerja sama secara damai dalam mencapai cita-cita kehidupan bersama ummat manusia.Nilai -nilai yang dikembangkan dalam hubungan antar manusia tercakup dalam persaudsaraan antar insan pergerakan , persaudaraan sesama Islam , persaudaraan sesama warga bangsa dan persaudaraan sesama ummat manusia . Perilaku persaudaraan ini , harusd menempatkan insan pergerakan pada posisi yang dapatv memberikan kemanfaatan maksimal untuk diri dan lingkungan persaudaraan.', 7, 'ndp_manusia_dengan_manusia.jpg', '2020-11-13 12:19:38', '2', 1, 0, ''),
(18, 'NILAI DASAR PERGERAKAN HUBUNGAN MANUSIA DENGAN ALAM', 'Alam semesta adalah ciptaan Allah SWT. 19) Dia menentukan ukuran dan hukum-hukumnya.20) Alam juga menunjukan tanda-tanda keberadaan, sifat dan perbuatan Allah. 21) Berarti juga nilai taiuhid melingkupi nilai hubungan manusia dengan alam .\r\nSebagai ciptaan Allah, alam berkedudukan sederajat dengan manusia. Namun Allah menundukan alam bagi manusia , 22) dan bukan sebaliknya . Jika sebaliknya yang terjadi, maka manusia akan terjebak dalam penghambaan terhadap alam , bukan penghambaan terhadap Allah. Karena itu sesungguhnya berkedudukan sebagai khalifah di bumi untuk menjadikan bumi maupun alam sebagai obyek dan wahana dalam bertauhid dan menegaskan dirinya. 23)\r\nPerlakuan manusia terhadap alam tersebut dimaksudkan untuk memakmurkan kehidupan di dunia dan diarahkan kepada kebaikan di akhirat, 24) di sini berlaku upaya berkelanjutan untuk mentransendensikan segala aspek kehidupan manusia. 25) Sebab akhirat adalah masa masa depan eskatologis yang tak terelakan . 26) Kehidupan akhirat akan dicapai dengan sukses kalau kehidupan manusia benar-benar fungsional dan beramal shaleh. 27)\r\nKearah semua itulah hubungan manusia dengan alam ditujukan . Dengan sendirinya cara-cara memanfaatkan alam , memakmurkan bumi dan menyelenggarakan kehidupan pada umumnya juga harus bersesuaian dengan tujuan yang terdapat dalam hubungan antara manusia dengan alam tersebut. Cara-cara tersebut dilakukan untuk mencukupi kebutuhan dasar dalam kehidupan bersama. Melalui pandangan ini haruslah dijamin kebutuhan manusia terhadap pekerjaan ,nafkah dan masa depan. Maka jelaslah hubungan manusia dengan alam merupakan hubungan pemanfaatan alam untuk kemakmuran bersama. Hidup bersama antar manusia berarti hidup dalam kerja sama , tolong menolong dan tenggang rasa.\r\nSalah satu hasil penting dari cipta, rasa, dan karsa manusia yaitu ilmu pengetahuan dan teknologi (iptek). Manusia menciptakan itu untuk memudahkan dalam rangka memanfaatkan alam dan kemakmuran bumi atau memudahkan hubungan antar manusia . Dalam memanfaatkan alam diperlukan iptek, karena alam memiliki ukuran, aturan, dan hukum tertentu; karena alam ciptaan Allah buykanlah sepenuhnya siap pakai, melainkan memerlukan pemahaman terhadap alam dan ikhtiar untuk mendayagunakannya.\r\nNamun pada dasarnya ilmu pengetahuan bersumber dari Allah. Penguasaan dan pengembangannyadisandarkan pada pemahaman terhadap ayat-ayat Allah. Ayat-ayat tersebut berupa wahyu dan seluruh ciptaanNya. Untuk memahami dan mengembangkan pemahaman terhadap ayat-ayat Allah itulah manusia mengerahkan kesadaran moral, potensi kreatif berupa akal dan aktifitas intelektualnya. Di sini lalu diperlukan penalaran yang tinggi dan ijtihad yang utuh dan sistimatis terhadap ayat-ayat Allah, mengembangkan pemahaman tersebut menjadi iptek, menciptakan kebaruan iptek dalam koteks ke,manusiaan, maupun menentukan simpul-simpul penyelesaian terhadap masalah-masalah yang ditimbulkannya. Iptek meruipakan perwujudan fisik dari ilmu pengetahuan yang dimiliki manusia, terutama digunakan untuk memudahkan kehidupan praktis.\r\nPenciptaan, pengembangan dan penguasaan atas iptek merupakan keniscayaan yang sulit dihindari. Jika manusia menginginkan kemudahan hidup, untuk kesejahteraan dan kemakmuran bersama bukan sebaliknya. Usaha untuk memanfaatkan iptek tersebut menuntut pengembangan semangat kebenaran, keadilan , kmanusiaan dan kedamaian. Semua hal tersebut dilaksanakan sepanjang hayat, seiring perjalanan hidup manusia dan keluasan iptek. Sehingga, berbarengan dengan keteguhan iman-tauhid, manusia dapat menempatkan diri pada derajat yang tinggi.', 7, 'ndp_manusia_dengan_alam.jpg', '2020-11-13 12:17:20', '2', 1, 0, ''),
(19, 'Demo Mahasiswa PMII Bondowoso Tolak RUU Cipta Kerja Berjalan Kondusif', 'BONDOWOSO, beritalima.com – Semenjak disahkannya Omnibus Law RUU Cipta Kerja menjadi UU oleh DPR RI, dalam Rapat Paripurna, Senin (5/10/2020) kemarin. Mendapatkan sorotan dan penolakan oleh berbagai kalangan. Baik mahasiswa, buruh bahkan akademisi dan Ormas.\r\n\r\nPenolakan terhadap Omnibus Law atau UU Sapu Jagat Cipta Kerja, terjadi di sejumlah daerah di Indonesia. Salah satunya di Kabupaten Bondowoso Jawa Timur.\r\n\r\nMahasiswa yang tergabung dalam Pergerakan Mahasiswa Islam Indonesia (PMII), Cabang Bondowoso. Melakukan aksi demo menolak UU Cipta Kerja, di depan Kantor DPRD Bondowoso, Kamis (9/10/2020).\r\n\r\nBerikut poin dalam demo yang dilakukan PC PMII Bondowoso: Pertama, menolak UU Cipta Kerja. Sebab UU Cipta Kerja tidak pro terhadap rakyat kecil, sedangkan PMII sangat dekat hubungannya dekat masyarakat akar rumput.\r\n\r\nKedua, PC PMII Bondowoso menolak UU Cipta kerja karena tidak pro gender.\r\n\r\nberitalima.com\r\nKetiga, menuntut agar presiden tidak menandatangani RUU Cipta Kerja Menjadi Undang-Undang. Meski, secara otomatis bila tidak ditandatangani oleh Presiden tetap akan menjadi Undang-Undang.\r\n\r\n“Tetapi, biarkanlah UU Cipta Kerja menjadi UU yang tidak ditandatangani oleh Presiden,” kata ketua PC PMII Bondowoso, Fathorrasi.\r\n\r\nKeempat, mendukung PB PMII yang akan melakukan uji materi (judicial riview) UU Cipta Kerja ke Mahkamah Konstitusi. Sebab, sebelumnya PB PMII telah melakukan uji materi UU MD3 dimana UU tersebut tidak pro terhadap rakyat.\r\n\r\n“Sehingga, untuk kali ini, PB PMII juga akan melakukan uji materi ke Mahkamah Konstitusi,” terangnya.\r\n\r\nKelima, PC PMII Bondowoso meminta DPRD kabupaten Bondowoso untuk menyampaikn aspirasi ini kepada presiden dan DPR RI.\r\n\r\nKeenam, Menuntut DPRD Bondowoso untuk bersikap kepada kepentingan rakyat, dengan bersama-sama menolak UU Cipta kerja.\r\n\r\nKemudian isi salinan poin tersebut diserahkan ke Ketua DPRD Bondowoso, Ahmad Dhafir. Dan diatandatangani oleh Ketua DPRD. Menunjukkan bahwa DPRD sepakat dengan aspirasi mahasiswa.\r\n\r\n“Saya menandatangani ini, bukan karena terpaksa. Dan tak ada yang bisa memaksa saya,” kata Ahmad Dhafir, usai menandatangani salinan komitmen monolak Omnibus Law UU Cipta Kerja.\r\n\r\n“Kami sebagai wakil rakyat siap menampung semua aspirasi. Termasuk dari teman-teman mahasiswa. Kami pastikan aspirasi ini, sampai ke DPR RI. Namun demikian, DPRD Bondowoso tak punya wewenang, sebab UU Cipta Kerja jadi wewenang DPR pusat,” sambungnya.\r\n\r\nDemo penolakan Omnibus Law UU Cipta Kerja, oleh PC PMII Kabupaten Bondowoso ini, juga diwarnai dengan sindiran lewat tulisan-tulisan yang dibentangkan peserta aksi. “Tetaplah jadi pejabat walau tidak berguna” dan sebagainya.', 10, 'omnibus_law.jpg', '2020-11-14 04:02:41', '2', 1, 0, ''),
(20, 'PMII,GMNI,GP Ansor Gandeng TNI POLRI Berikan Sembako Kepada Warga Grujugan Dihari Sumpah Pemuda', 'PMII,GMNI,GP Ansor Gandeng TNI POLRI Berikan Sembako Kepada Warga Grujugan Dihari Sumpah Pemuda', 19, 'bagi_sembako.jpg', '2020-10-28 19:07:51', '2', 1, 0, ''),
(21, 'PMII Bondowoso, Nilai Isu Interpelasi dan People Power Terlalu Politis', 'Bondowoso—Ketua PC PMII Bondowoso, Fathor Rozi mengatakan bahwa wacana interpelasi dan gerakan people power merupakan gerakan politis para elit. Pernyataan tersebut disampaikan ketika diminta keterangan, Sabtu (9/11) di Bondowoso.\r\n\r\n“Kami PMII Cabang Bondowoso meminta kepada seluruh stakeholder, menyelesaikan secara konstitusional-kolegial agar tidak mengganggu kondusifitas masyarakat Bondowoso,” kata Fathor Rozi, Sabtu (9/11).\r\n\r\nTidak hanya itu, Fathor Rozi meminta kepada semua stakeholder di Kabupaten Bondowoso, baik pihak legislatif maupun eksekutif untuk tidak membesar-besarkan masalah tersebut.\r\n\r\n“Banyaknya persoalan yang harus menjadi prioritas pemerintah, seperti naiknya BPJS yang berdampak langsung kepada kebutuhan masyarakat kecil, dan minimnya lapangan pekerjaan di kota tape ini,” ujarnya.\r\n\r\n\r\nLebih jauh, Fathor Rozi menegaskan masih banyak tugas yang harus diselesaikan oleh para stakeholder di Kabupaten Bondowoso, misalnya untuk menjawab persoalan rendahnya Indeks Pembangunan Manusia (IPM) di Bondowoso.\r\n\r\n“Itulah yang seharusnya serius dibahas oleh para legislatif dan eksekutif kedepannya,” pungkasnya.', 9, 'isu_interpelasi.jpg', '2020-11-14 05:42:25', '2', 1, 0, ''),
(22, 'Peringati HSN 2020, PMII Bondowoso Ziarah Ke Makam Pendiri NU Bondowoso', 'Ketua Umum PC PMII Bondowoso, Fathor Rozi mengajak seluruh kader PMII Bondowoso dan warga Nahdliyin untuk tetap mengingat perjuangan Kiai Asy’ari yang merupakan pendiri Nahdlatul Ulama (NU) di Bondowoso.\r\n\r\nHal tersebut disampaikan Ozi (panggilan akrab Fathor Rozi.red) pada saat ziarah ke makam Pendiri NU Bondowoso di kec. Wonosari, bersama beberapa jajaran pengurusnya, Kamis (22/10/2020).\r\n\r\nMenurut Ozi, Kiai Asy’ari adalah tokoh besar di kota Bondowoso. Beliau merupakan satu-satunya tokoh yang membawa NU dan perjuangan santri ke tanah Bondowoso.\r\n\r\n“Sebagai generasi yang tidak lupa terhadap jasa-jasa guru dan pahlawannya, dan selaku kader muda NU, kami ingin mengenang perjuangan beliau di momentum hari santri ini” kata Ozi pada Limadetik.com.\r\n\r\nOzi berharap dan menyerukan kepada seluruh Pengurus NU & warga Nadliyin se-Bondowoso untuk tidak lupa terhadap jasa-jasa beliau, bahwa beliaulah yang mempunyai peran besar terhadap berdirinya Nahdlatul Ulama di Bondowoso.\r\n\r\n“Kami mengajak sahabat-sahabat untuk juga berziarah ke makam beliau, mendo’akan beliau, untuk mengenang jasa-jasa beliau dan sebagai wujud terima kasih kita kepada beliau” lanjutnya.\r\n\r\nHari ini adalah salah satu bentuk pembaktian atau pengabdian kami PC PMII Bondowoso terhadap Kyai Asy’ari “Hanya Fatihah dan hanya doa yg bisa kita lantunkan hari ini untuk beliau, tidak ada yang bisa kami balas” pungkasnya.', 20, 'hsn.jpg', '2020-10-22 15:25:26', '2', 1, 0, ''),
(23, 'Kopri PC PMII Bondowoso Soroti Maraknya Pernikahan Dini', 'BONDOWOSO-Pengurus Korps Putri Pergerakan Mahasiswa Islam Indonesia (Kopri PMII) Cabang Kabupaten Bondowoso menggelar Sekolah Kader Kopri (SKK) III bertempat di Aula SKB Badean Bondowoso, Kamis ( 20/2/2020). Kegiatan SKK III tersebut digelar selama tiga hari sejak 20-23 Februari 2020. Kegiatan ini mengambil tema ” Optimalisasi Peran Perempuan Dalam Ranah Publik dan Domestik “.\r\n\r\nMenurut Ketua Kopri PC PMII  Bondowoso, Widadah Fatimatus Zahroh, kegiatan ini bertujuan agar kaum perempuan remaja di Bondowoso bisa ikut berperan optimal.\r\n\r\n“Bondowoso ini merupakan kota nomor dua tertinggi pernikahan dini setelah Pamekasan, budaya patriarti di Bondowoso yang sangat kental. Dan sesuatunya masih kendala dengan izin orang tua atau budaya yang masih tidak membolehkan perempuan berproses lebih lama apalagi melebihi dari jenjang kuliah” katanya.\r\n\r\n\r\n \r\nHal ini juga diutarakan Dini Adhiyati, Ketua Kopri PC PMII Jatim, Kopri harus bisa siap berkomitmen pada tiap lini. \r\n\r\n“Saya tadi menekankan bagaimana peran sebenarnya Kopri, tinggal bagaimana kita meningkatkan kualitas dan komitmen kita untuk benar-benar ada di setiap lini atau leading sektor yang ada, makanya saya berharap dari SKK III yang diadakan Cabang Bondowoso ini bisa menghadirkan atau melahirkan lagi kader kader putri yang progres yang siap tarung, baik di Bondowoso sendiri, Provinsi dan juga di Skala Nasional” kata Dini.\r\n\r\nDirinya juga menjelaskan, beberapa tahun ini Bondowoso masih dalam tahap terus perbaikan. \r\n\r\n“Harapan saya ini bisa menjadi satu langkah yang pasti dan implementasinya tidak lagi berbicara tentang teori tapi implementasi strategi bagaimana yang harus dilakukan oleh kader kader putri khususnya di Bondowoso ini bisa berkiprah di segala bidang” tambahnya.\r\n\r\n\r\n \r\nSementara menurut H. Syaiful Bahri Husnan, Ketua Mabincab PMII Bondowoso, SKK Kopri ini bisa lebih terlihat, jangan bersifat teori.\r\n\r\n“Saya sangat mendukung acara seperti ini selalu diadakan, tapi outputnya harus lebih terlihat, jangan hanya berkaitan pada yang sifatnya teori. Harapan saya Kopri Bondowoso lebih mengimbangi dengan aksi nyata, kita krisis perempuan yang bisa didistribusikan dibanyak posisi” ungkap Politisi PPP ini.\r\n\r\nDitanya tentang kesetaraan Gender, Gus Syef panggilan akrabnya, menjelaskan bahwa regulasi tentang itu sudah sangat mendukung.\r\n\r\n“Itu tinggal bagaimana kesiapan sahabat-sahabat Kopri sendiri dalam menjalani proses, dan harus diperkuat dan dipupuk sehingga kemampuan diranah publik maupun regional lebih siap, saya menunggu kiprah sahabat Kopri Bondowoso dimasa mendatang” pungkasnya.', 9, 'skk.jpeg', '2020-02-23 06:31:14', '2', 1, 0, ''),
(24, 'Harlah PMII ke 60, PMII Bondowoso Bagikan Ratusan Masker pada Pedagang Kakilima', 'Bondowoso, Bhirawa\r\nSambut Hari Lahir (Harlah) PMII yang ke-60, Komisariat dan Rayon Pergerakan Mahasiswa Islam Indonesia (PMII) Sekolah Tinggi Agama Islam (STAI) At-Taqwa Bondowoso melakukan bakti sosial yang diikuti oleh puluhan anggota dan kader aktif yakni membagikan ratusan masker gratis untuk pengendara bermotor, pedagang kakilima dan tukang becak di Alun-Alun Raden Bagus Asra Bondowoso, Sabtu (18/4).\r\nKetua Komisariat PMII RBA STAI At-Taqwa Bondwoso Ahmad Muzakki menyampaikan bahwa kegiatan pembagian masker gratis tersebut memang dikhususkan untuk masyakat Bondowoso.\r\n“Pembagian masker ini untuk pengendara bermotor, pedagang kaki lima, tukang becak dan para pejalan kaki di Bondowoso dalam rangka meyemarakkan Hari Lahir PMII yang ke-60 dan upaya penjegahan penyebaran Virus Corona atau Covid-19” Ujarnya.\r\nSementara itu, Ketua Rayon PMII Avicenna Romli Yahya, mengaku bahwa pada harlah kali ini, kami selaku warga pergerakan mengisi dengan acara pembagian masker.\r\n“Semoga apa yang sudah kami berikan mampu mencegah menyebarnya wabah yang sangat mengerikan ini.” harapnya.\r\nDitempat yang sama, Ketua Rayon PMII Averroes STAI At-Taqwa M. Firmansyah, menambahkan bahwa PMII tidak pernah menutup mata terhadap keadaan sosial yang terjadi saat ini.\r\n“Tugas kader-kader PMII adalah tetap memberikan yang terbaik untuk masyarakat, contohnya seperti hari ini, bagi-bagi masker kepada masyarakat.” pungkasnya.', 20, 'bagi_masker.jpg', '2020-04-18 18:40:38', '3', 1, 0, ''),
(26, 'sehata', '<p>assssssw</p>\r\n', 4, '1608958559817.jpg', '2020-12-26 03:08:49', '2', 10, 1, ''),
(27, 'coba', '<p>aaa</p>\r\n', 3, '1608962000845.jpg', '2020-12-26 06:53:20', '1', 10, 1, ''),
(28, 'ww', '<p>www</p>\r\n', 4, '1608962092441.jpg', '2020-12-26 06:54:52', '1', 10, 1, ''),
(29, 'boruto', '<p>bsahds dhsbd shdbs&nbsp;</p>\r\n', 5, 'default.jpg', '2020-12-27 10:43:12', '2', 15, 9, ''),
(30, 'naruto', '<p>gsabdhsscc sahcbcbs s</p>\r\n', 4, 'default.jpg', '2020-12-29 09:55:52', '2', 15, 9, ''),
(31, 'Koruto', '<p>efhsbsh sdsdbsd sdsd</p>\r\n', 8, 'default.jpg', '2020-12-29 09:56:43', '2', 15, 9, ''),
(32, 'HARLAH PK PMII Wahid Hasyim', '<p>memperingati hari lahir komisariat PK PMII Wahid Hasyim maka dari itu kami mengharap kehadiran sahabat/ti untuk dapat hadir&nbsp;</p>\r\n\r\n<p>Tempat : SMK NU Tenggarang</p>\r\n\r\n<p>Waktu/Tanggal : 14:00</p>\r\n', 19, '1609290273398.jpeg', '2020-12-29 10:29:32', '2', 2, 0, ''),
(33, 'Hari Bahasa Arab ', '<p>Tepat pada 18 desember diperingati sebagai hari bahasa arab internasional</p>\r\n\r\n<p>&quot;sesungguhnya kami menurunkan al-quran dengan berbahasa arab, agar kamu mengerti (QS:yusuf:2)</p>\r\n', 9, '1609290373877.jpeg', '2020-12-29 10:32:59', '2', 2, 0, ''),
(34, 'Hari Bela Negara', '<p>Setiap warga negara yang merdeka harus mempunyai sifat bela negara&nbsp;</p>\r\n\r\n<p>SELAMAT HARI BELA NEGARA</p>\r\n\r\n<p>Bermimpilah Setinggi Langit Jika Engkau Jatuh, Engkau akan jatuh diantara bintang bintang ( Ir. Soekarno)</p>\r\n', 9, '1609290355259.jpeg', '2020-12-29 10:35:19', '2', 2, 0, ''),
(35, 'sdcsdjc', '<p>sahshcsdds</p>\r\n', 9, 'default.jpg', '2020-12-29 10:37:58', '3', 2, 0, ''),
(36, 'Pelatihan Kader Dasar Coming Soon', '<p>Pemberitahuan,Akan segera dilaksanakan pelatihan kader dasar pertama yang diadakan PK PMII Wahid Hasyim&nbsp;</p>\r\n', 19, '1609290138754.png', '2020-12-29 10:44:04', '2', 2, 0, '');

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

--
-- Dumping data for table `tb_proker`
--

INSERT INTO `tb_proker` (`id`, `nama_kegiatan`, `jadwal_pelaksanaan`, `isi`, `penanggung_jawab`, `foto`, `user_id`) VALUES
(2, 'Undangan Terbuka Mapaba', '2020-10-23', 'Undangan terbuka MAPABA(masa penerimaan anggota baru) Pengurus komisariat PMII Wahid Hasyim dan Universitas Bondowoso. Dengan tema \"Terbentuknya Generasi Emas Dalam Bingkai Kaderisasi Yang Disiplin\"', 'Panitia Mapaba', '1607135129069.jpeg', 2),
(5, 'Undangan terbuka Harlah pmii wahid hasyim', '2020-12-02', '<p>Assalamualaikum warahmatullahi wabarakatuh.</p>\r\n\r\n<p>Sehubungan dengan diadakannya HARLAH PK WAHID HASYIM KE-5, yang akan dilaksanakan pada :</p>\r\n\r\n<p>Tanggal : Selasa, 15 Desember 2020<br />\r\nJam : 14:00 WIB<br />\r\nTempat : SMK NU Tenggarang<br />\r\ndreesscode : Bebas, Rapi</p>\r\n\r\n<p>Kami mengharapkan kehadiran sahabat/i sekalian. Terimakasih</p>\r\n\r\n<p>Wallahul Muwafieq Illa Aqwamith Tharieq<br />\r\nWassalamualaikum Warrahmatullahi wabarakatuh</p>\r\n', 'aqbil', '1608254492864.jpeg', 2),
(6, 'Ngaji Politik', '2020-10-31', '<p>Ngaji politik dengan tema MARKETING POLITIK dengan narasumber MOH. Syaeful. Bahar dosen dari fakultas ilmu sosial dan politik UIN sunan ampel Surabaya</p>\r\n', 'pengurus cabang', 'default.jpg', 1),
(8, 'Konferensi Cabang XI', '2020-11-18', '<p>setelah setahun kepengurusan PMII cabang bondowoso perlu revolusi kepengurusan yang acaranya meliputi rapat tahunan dan pemilihan ketua cabang baru</p>\r\n', 'Pengurus cabang', '1609283885638.jpeg', 1),
(9, 'Happy Camp', '2020-11-18', '<p>merayakan 2 tahunnya gempita, Kami mengadakan agenda camping bersama</p>\r\n', 'Pengurus cabang', '1609283864357.jpeg', 1),
(10, 'Pelatihan Kader Dasar Pk PMII Wahid Hasyim', '2021-01-07', '<p>Pelatihan kader dasar pertama yang diselenggarakan oleh PK PMII Wahid Hasyim</p>\r\n\r\n<p>bertempat di balai desa purnama, kecamatan Tegalampel</p>\r\n', 'Royyan Nur Rohman', '1609282026375.jpeg', 2);

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
(3, 'Rayon Nurut Taqwa', 'Berdiri Pada tanggal', '', 3),
(4, 'Rayon Avicenna', 'berdiri pada tanggal', '', 4),
(5, 'Rayon Averroes', 'Berdiri pada tanggal', '', 4);

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
(3, 0, 'Ketua Umum', 20, 1),
(4, 3, 'Sekretaris Umum', 21, 1),
(5, 3, 'Bendahara Umum', 22, 1),
(6, 3, 'Ketua 1', 23, 1),
(7, 3, 'Ketua 2', 24, 1),
(8, 3, 'Ketua 3', 25, 1),
(9, 6, 'Sekretaris 1', 26, 1),
(10, 7, 'Sekretaris 2', 27, 1),
(11, 8, 'Sekretaris 3', 28, 1),
(12, 0, 'Ketua Komisariat', 12, 5),
(13, 0, 'Sekertaris', 13, 5),
(16, 0, 'Bendahara', 14, 5),
(17, 0, 'Ketua 1', 15, 5),
(18, 0, 'ketua 2', 16, 5),
(19, 0, 'Ketua 3', 17, 5),
(20, 0, 'Sekertaris Bidang 1', 18, 5),
(21, 0, 'Sekertaris Bidang 2', 9, 5),
(22, 0, 'Sekertaris Bidang 3', 19, 5);

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
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `jenis` enum('1','2','3','4') NOT NULL,
  `komisariat_id` int(6) NOT NULL,
  `kader_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `tgl_update`, `jenis`, `komisariat_id`, `kader_id`) VALUES
(1, 'cabang_bondowoso', 'cabang123', '2020-11-10 23:05:08', '4', 1, 0),
(2, 'komisariat_polije', 'polije123', '2020-11-10 23:05:08', '3', 5, 0),
(3, 'rayon_avicenna', 'avicenna123', '2020-11-10 23:07:09', '2', 0, 0),
(5, 'komisariat_unej', 'unej123', '2020-11-19 18:39:59', '3', 2, 0),
(6, 'komisariat_unibo', 'unibo123', '2020-11-19 18:39:59', '3', 3, 0),
(7, 'komisariat_attaqwa', 'attaqwa123', '2020-11-19 18:42:17', '3', 4, 0),
(8, 'komisariat_togoambarsari', 'ambarsari123', '2020-11-19 18:43:18', '3', 6, 0),
(9, 'komisariat_darulfalah', 'darulfalah123', '2020-11-19 18:44:33', '3', 7, 0),
(10, 'WH2020113000001', '20201130', '2020-12-16 08:39:39', '1', 0, 1),
(13, 'UJ2020113000001', '20201130', '2020-12-17 04:44:06', '1', 0, 7),
(14, 'UJ2020113000002', '20201130', '2020-12-20 23:41:55', '1', 0, 8),
(15, 'WH1999062100002', '19990621', '2020-12-27 22:16:45', '1', 5, 9),
(17, 'WH1998062100002', '19980621', '2020-12-27 22:36:41', '1', 5, 11),
(18, 'WH1998062100002', '19980621', '2020-12-28 08:17:12', '1', 5, 12),
(19, 'WH1999062100002', '19990621', '2020-12-28 08:18:17', '1', 5, 13),
(20, 'WH1999062100002', '19990621', '2020-12-28 08:19:26', '1', 5, 14),
(21, 'WH1999062100002', '19990621', '2020-12-28 08:20:43', '1', 5, 15),
(22, 'WH1999062100002', '19990621', '2020-12-28 08:24:09', '1', 5, 16),
(23, 'WH1999062100002', '19990621', '2020-12-28 08:25:35', '1', 5, 17),
(24, 'WH1998062100002', '19980621', '2020-12-28 08:28:51', '1', 5, 18),
(25, 'WH1999062100002', '19990621', '2020-12-28 08:31:44', '1', 5, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
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
(21, 4, 8),
(22, 4, 9),
(23, 4, 10),
(24, 3, 11),
(25, 4, 11),
(26, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_jenis`
--

CREATE TABLE `user_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_jenis`
--

INSERT INTO `user_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'kader'),
(2, 'admin_rayon'),
(3, 'admin_komisariat'),
(4, 'admin_cabang');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
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
(9, 'data_anggota'),
(10, 'data_komisariat'),
(11, 'artikel_usulan'),
(12, 'pesan_pengunjung');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
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
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Dashboard', 'menu-icon fa fa-dashboard', 1),
(2, 2, 'Profile Cabang', 'profile_cabang', 'menu-icon fa fa-building', 1),
(3, 3, 'Profile Komisariat', 'profile_komisariat', 'menu-icon fa fa-building\r\n', 1),
(4, 4, 'Profile Rayon', 'profile_rayon', 'menu-icon fa fa-building\r\n', 1),
(5, 5, 'Profile Angoota/Kader', 'profile_anggota', 'menu-icon fa fa-user', 1),
(6, 6, 'Berita', 'berita', 'menu-icon fa fa-leanpub', 1),
(7, 7, 'Artikel', 'artikel', 'menu-icon fa fa-book', 1),
(10, 8, 'Program Kerja', 'program_kerja', 'menu-icon fa fa-clipboard', 1),
(11, 9, 'Data Anggota', 'data_anggota', 'menu-icon fa fa-table', 1),
(12, 10, 'Data Komisariat', 'data_komisariat', 'menu-icon fa fa-list', 1),
(13, 11, 'Artikel Usulan Kader', 'artikel_usulan', 'menu-icon fa fa-building-o', 1),
(14, 12, 'Pesan Pengunjung', 'pesan_pengunjung', 'menu-icon fa fa-building-o', 1);

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
-- Indexes for table `materi_pmii`
--
ALTER TABLE `materi_pmii`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `pesan_pengunjung`
--
ALTER TABLE `pesan_pengunjung`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_konten`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `komisariat _id` (`komisariat_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `id_jenis` (`id_jenis`) USING BTREE,
  ADD KEY `id_menu` (`id_menu`) USING BTREE;

--
-- Indexes for table `user_jenis`
--
ALTER TABLE `user_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD UNIQUE KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jeniskonten`
--
ALTER TABLE `jeniskonten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `likekonten`
--
ALTER TABLE `likekonten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi_pmii`
--
ALTER TABLE `materi_pmii`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan_pengunjung`
--
ALTER TABLE `pesan_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subjeniskonten`
--
ALTER TABLE `subjeniskonten`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_kader`
--
ALTER TABLE `tb_kader`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_komisariat`
--
ALTER TABLE `tb_komisariat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_konten`
--
ALTER TABLE `tb_konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_proker`
--
ALTER TABLE `tb_proker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_strukturkom`
--
ALTER TABLE `tb_strukturkom`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_strukturray`
--
ALTER TABLE `tb_strukturray`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_jenis`
--
ALTER TABLE `user_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likekonten`
--
ALTER TABLE `likekonten`
  ADD CONSTRAINT `likekonten_ibfk_1` FOREIGN KEY (`konten_id`) REFERENCES `tb_konten` (`id_konten`) ON DELETE CASCADE;

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
