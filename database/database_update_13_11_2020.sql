-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2020 pada 07.09
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

--
-- Dumping data untuk tabel `jeniskonten`
--

INSERT INTO `jeniskonten` (`id`, `nama_jenis`) VALUES
(1, 'berita'),
(2, 'artikel');

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

--
-- Dumping data untuk tabel `subjeniskonten`
--

INSERT INTO `subjeniskonten` (`id`, `jeniskonten_id`, `nama`) VALUES
(1, 2, 'eksposisi'),
(2, 2, 'argumentasi'),
(3, 2, 'persuasi'),
(4, 2, 'eksploratif'),
(5, 2, 'prediktif'),
(6, 2, 'eksplanatif'),
(7, 1, 'opini'),
(8, 1, 'investigasi');

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
  `foto_artikel` varchar(128) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_konten`
--

INSERT INTO `tb_konten` (`id`, `judul`, `isi_konten`, `jeniskonten_id`, `pembuat`, `foto_artikel`, `tgl_buat`, `status`) VALUES
(2, 'Pergerakan Mahasiswa Dalam Pendidikan Kritis', 'PMII harus memiliki tanggung jawab representative sosial kemasyarakatan yang majemuk, dan dituntut untuk menjadi “agent of transformation” melalui dinamika pergerakan yang konstruktif dan menghindari pergerakan sporadis dengan landasan strategis menuju suatu tatanan masyarakat yang adil dan makmur dalam bingkai kemanusiaan (humanist).\r\nBerawal dari tanggung jawab inilah peran mahasiswa sangat dominan sebagai tokoh sentral episode reformasi yang terjadi pada bulan mei 1998 yang lalu. Gerakan mahasiswa yang bersumbu pada sikap kritis akan ketimpangan sosial pada waktu itu, seakan-akan menjadi peletup untuk bangun dari tidur panjang. Sebuah gerakan nurani untuk membela masyarakat yang termarginalkan dan juga gerakan moral untuk menjadikan bangsa dan Negara yang demokratis, dan PMII menjadi bagian dari episode tersebut.\r\nKemudian yang menarik untuk dikaji adalah sejauh mana peranan pendidikan kritis tersebut bisa dijadikan legitimasi akan arah gerak PMII. Sebab bagaimanapun juga aspek pendidikan cenderung akan membentuk idiologi yang beragam pada masyarakat, khususnya mahasiswa.\r\nDilihat dari sejarah perkembangan pendidikan, pendidikan kritis berkembang pesat mulai dekade 70-an, namun demikian pada dekade 20-an telah lahir konsep pendidikan kritis yang berupa pemikiran-pemikiran pendidikan progresif dari George S. Counts. Beliau mengemukakan tiga masalah vital pada masa itu, dan kemudian dari masalah-masalah tersebut lahirlah yang dinamakan pendidikan kritis. Tiga masalah tersebut yaitu mengkritik prinsip pendidikan konservatif, memberikan ruang besar terhadap peranan guru untuk menjadikan pendidikan sebagai agen dari perubahan sosial, dan penataan ekonomi sebagai salah satu syarat untuk perbaikan pendidikan (H.A.R. Tilaar, 2003:44).\r\nPendidikan kritis dalam pengimplementasiannya tidak akan lepas dari konsep paradigma kritis, dimana paradigma kritis merupakan salah satu aliran pendekatan pendidikan yang telah dipetakan oleh Girouk dan Aronowitz (1985). Menurut mereka dalam dunia pendidikan ada tiga aliran pendidikan yang menjadi landasan fundamental dan mempunyai karakteristik berbeda satu sama lainnya. Aliran tersebut yaitu pendidikan yang berparadigma konservatif, liberal dan kritis.', 2, 4, 'mhs_pergerakan.jpg', '2020-11-13 12:15:18', '2'),
(3, 'Kaderisasi Berbasis Kompetensi Dalam Bingkai Ideologi Pergerakan', 'Basis kader PMII adalah mahasiswa yang dalam fase usia identik dengan keremajaan. Suatu fase transisi antar kana-kanak dan kedewasaan. pada fase ini kecenderungan mencari jati diri sangat besar untuk mendapatkan arah, orientasi, pandangan dan tujuan hidup di masa depan. Berbagai macam eksperimentasi banyak dilakukan, dalam terbentuknya pandangan hidup, intelektual dan keterampilan.\r\nSebagai mahasiswa yang hidup dalam lingkup civitas akademika, kader PMII berada dalam lingkaran kompetensi bidang atau jurusan yang digeluti, yang tentunya sangat mempengaruhi pula dalam pembentukan arah dan tujuan hidup di masa depan. kader PMII terdiri dari beragam kopetensi jurusan di setiap kampus masing-masing. Dan tentunya hal ini merupakan kekayaan dan asset organisasi yang mutlak perlu di dihargai dalam arti mengembangkan dan memberdayakan kader sesuai dengan bidang kopetensi yang digelutinya.\r\nSelama ini pola kaderisasi PMII hanya berjalan dua arah, yang itupun saling menegasikan antara satu dengan lainnya, yakni intelektual dan gerakan sosial. Tidak ada ruang bagi pengembangan profesionalitas, wira usaha, dan keterampilan teknis di dalam ranah kePMIIan. Kader PMII yang mengembangkan diri diluar arah intelektual dan gerakan sosial cenderung terkucilkan dalam berPMII, karena sudah menjadi stereotype bahwa diluar kedu arah tersebut berarti keluar dari mindsteaim pergerakan. Walhasil, PMII penuh dengan para pemikir dan aktivis sosial yang kesemuanya dimobilisasi keranah politik.\r\nPadahal sebagai sebagai komunitas yang mengidentifikasi diri sebagai komunitas yang turut mempengaruhi fenomena kebangsaan, PMII harus dapat memiliki segalanya, sehingga mempunyai akses keseluruh sektor kehidupan masyarakat.\r\nKenyataan ini memang tidak lepas dari momentum sejarah kelahiran PMII. Dimana PMII lahir dalam pergolakan sosial poliltik kebangsaan pasca kemerdekaan pada masa itu.\r\nTetapi momentum hari ini berbeda, sejalan dengan perkembangan zaman yang terus melaju, mestinya dalam memaknai konsistensi alur sejarah tidak secara dogmatis. Tetapi memaknai konsistensi sejarah dengan mengambil ruh idelogisnya sebagai penentu arah, pandangan dan orientasi hidup setiap kader PMII. Dimana ruh ideologis sejarah tersebut dapat mempertemukan dan mempersatukan semua kader PMII dimanapun berada dan di sektor apapun bergerak dan membangun.\r\nTuntutan momentum era dimana kita berada hari ini adalah profesionalitas dan kopetensi di segala sektor kehidupan. Berbeda dengan tuntutan momentum pada sejarah berdirinya PMII yang sedang mengalami begolakan sosial politik pasca kemerdekaan. Hari ini kita berada ditengah-tengah persaingan yan menggelobal, sehingga pada level komunitas kita dituntut untuk membangun kualitas kader yang tidak hanya militant secara ideologis tetapi juga berbekal penguasaan keterapilan teknis di bidangnya masing-masing.\r\nPola kaderisasi yang telah berlangsung selama ini tidak berarti harus ditinggalkan. Tetapi tetap dilanjutkan sebagai bentuk internalisasi pemikiran dan ideologis. Dan selanjutnya melengkapinya dengan pola kaderisasi yang selama ini dinegasikan, yaitu membangun kopetensi, profesionalitas dan keterampilan teknis di setiap bidang jurusan masing-masing personalitas kader.', 2, 4, 'kaderisasi.jpg', '2020-11-13 12:15:18', '2'),
(4, 'NILAI DASAR PERGERAKAN TAUHID', 'Meng-Esakan Allah SWT, merupakan nilai paling asasi yang dalam sejarah agama samawi telah terkandung sejak awal keberadaan manusia.\r\nAllah adalah Esa dalam segala totalitas, dzat, sifat-sifat, dan perbutan-perbuatan-Nya. Allah adalah dzat yang fungsional. Allah menciptakan, memberi petunjuk, memerintah, dan memelihara alam semesta ini. Allah juga menanamkan pengetahuan, membimbing dan menolong manusia. Allah Maha Mengetahui, Maha Menolong, Maha Bijaksana, Hakim, Maha Adil, dan Maha Tunggal. Allah Maha Mendahului dan Maha Menerima segala bentuk pujaan dan penghambaan.\r\nKeyakina seperti itu merupakan keyakinan terhadap sesuatu yang lebih tinggi dari pada alam semesta, serta merupakan kesadaran dan keyakinan kepada yang ghaib. Oleh karena itu, tauhid merupakan titik puncak, melandasi, memadu, dan menjadi sasaran keimanan yang mencakup keyakinan dalam hati, penegasan lewat lisan, dan perwujudan dalam perbuatan. Maka konsekuensinya Pergerakan harus mampu melarutkan nilai-nilai Tauhid dalam berbagai kehidupan serta terkomunikasikan dan mermbah ke sekelilingnya. Dalam memahami dan mewujudkan itu, Pergerakan telah memiliki Ahlussunnah wal jama’ah sebagai metode pemahaman dan penghayatan keyakinan itu.', 2, 4, 'ndp_tauhid.jpg', '2020-11-13 12:17:20', '2'),
(5, 'NILAI DASAR PERGERAKAN HUBUNGAN MANUSIA DENGAN ALLAH', 'Allah adalah Pencipta segala sesuatu. Dia menciptakan manusia dalam bentuk sebaik-baik kejadian dan menganugerahkan kedudukan terhormat kepada manusia di hadapan ciptaan-Nya yang lain.\r\nKedudukan seperti itu ditandai dengan pemberian daya fikir, kemampuan berkreasi dan kesadaran moral. Potensi itulah yang memungkinkan manusia memerankan fungsi sebagai khalifah dan hamba Allah. Dalam kehidupan sebagai khalifah, manusia memberanikan diri untuk mengemban amanat berat yang oleh Allah ditawarkan kepada makhluk-Nya. Sebagai hamba Allah, manusia harus melaksanakan ketentuan-ketentauan-Nya. Untuk itu, manusia dilengkapi dengan kesadaran moral yang selalu harus dirawat, jika manusia tidak ingin terjatuh ke dalam kedudukan yang rendah.\r\nDengan demikian, dalam kehidupan manusia sebagai ciptaan Allah, terdapat dua pola hubungan manusia dengan Allah, yaitu pola yang didasarkan pada kedudukan manusia sebagai khalifah Allah dan sebagai hamba Allah. Kedua pola ini dijalani secara seimbang, lurus dan teguh, dengan tidak menjalani yang satu sambil mengabaikan yang lain. Sebab memilih salah satu pola saja akan membawa manusia kepada kedudukan dan fungsi kemanusiaan yang tidak sempurna. Sebagai akibatnya manusia tidak akan dapat mengejawentahkan prinsip tauhid secara maksimal.\r\nPola hubungan dengan Allah juga harus dijalani dengan ikhlas, artinya pola ini dijalani dengan mengharapkan keridloan Allah. Sehingga pusat perhatian dalam menjalani dua pola ini adalah ikhtiar yang sungguh-sungguh. Sedangkan hasil optimal sepenuhnya kehendak Allah. Dengan demikian, berarti diberikan penekanan menjadi insan yang mengembangkan dua pola hubungan dengan Allah. Dengan menyadari arti niat dan ikhtiar, sehingga muncul manusia-manusia yang berkesadaran tinggi, kreatif dan dinamik dalam berhubungan dengan Allah, namun tetap taqwa dan tidak pongah Kepada Allah.\r\nDengan karunia akal, manusia berfikir, merenungkan dan berfikir tentang ke-Maha-anNya, yakni ke-Mahaan yang tidak tertandingi oleh siapapun. Akan tetapi manusia yang dilengkapi dengan potensi-potensi positif memungkinkan dirinyas untuk menirukan fungsi ke-Maha-anNya itu, sebab dalam diri manusia terdapat fitrah uluhiyah – fitrah suci yang selalu memproyeksikan terntang kebaikan dan keindahan, sehingga tidak mustahil ketika manusia melakukan sujud dan dzikir kepadaNya, Manusia berarti tengah menjalankan fungsi Al Quddus. Ketika manusia berbelas kasih dan berbuat baik kepada tetangga dan sesamanya, maka ia telah memerankan fungsi Arrahman dan Arrahim. Ketikamanusia bekerja dengan kesungguhan dan ketabahan untuk mendapatkan rizki, maka manusia telah menjalankan fungsi Al Ghoniyyu. Demikian pula dengan peran ke-Maha- an Allah yang lain, Assalam, Al Mukmin, dan lain sebagainya. Atau pendek kata, manusia dengan anugrah akal dan seperangkat potensi yang dimilikinya yang dikerjakan dengan niatyang sungguh-sungguh, akan memungkinkan manusia menggapai dan memerankan fungsi-fungsi Asma’ul Husna.\r\nDi dalam melakukan pekerjaannya itu, manusia diberi kemerdekaan untuk memilih dan menentukan dengan cara yang paling disukai. 14) Dari semua pola tingkah lakunya manusia akan mendapatkan balasan yang setimpal dan sesuai yang diupayakan, karenanya manusia dituntut untuk selalu memfungsikan secara maksimal ke4merdekaan yang dimilikinya, baik secara perorangan maupun secara bersama-sama dalam konteks kehidupan di tengah-tengah alam dan kerumunan masyarakat, sebab perubahan dan perkembangan hanyalah milikNya, oleh dan dari manusia itu sendiri.15)\r\nSekalipun di dalam diri manusia dikaruniai kemerdekaan sebagai esensi kemanusiaan untuk menentukan dirinya, namun kemerdekaan itu selalu dipagari oleh keterbatasan-keterbatasan, sebab prerputaran itu semata-mata tetap dikendalaikan oleh kepastian-kepastian yang Maha Adil lagi Maha Bijaksana,yang semua alam ciptaanNya iniselalu tunduk pada sunnahNya, pada keharusan universal atau takdir. 16 ) Jadi manusia bebas berbuat dan berusaha ( ikhtiar ) untuk menentukan nasibnya sendiri, apakah dia menjadi mukmin atau kafir, pandai atau bodoh, kaya atau miskin, manusia harus berlomba-lomba mencari kebaikan, tidak terlalu cepat puas dengan hasil karyanya. Tetapi harus sadar pula dengan keterbatasan- keterbatasannya, karaena semua itu terjadi sesuai sunnatullah, hukum alam dan sebab akibat yang selamanya tidak berubah, maka segala upaya harus diserrtai dengan tawakkal. Dari sini dapat dipahami bahwa manusia dalam hidup dan kehidupannya harus selalu dinamis, penuh dengan gerak dan semangat untuk berprestasi secara tidak fatalistis. Dan apabila usaha itu belum berhasil, maka harus ditanggapi dengan lapang dada, qona’ah (menerima) karena disitulah sunnatullah berlaku. Karenanya setiap usaha yang dilakukan harus disertai dengan sikap tawakkal kepadaNya. 17 )', 2, 4, 'ndp_manusia_dengan_allah.jpg', '2020-11-13 12:15:18', '2'),
(6, 'NILAI DASAR PERGERAKAN HUBUNGAN MANUSIA DENGAN MANUSIA', 'Kenyataan bahwa Allah meniupkan ruhNya kepada materi dasar manusia menunjukan , bahwa manusia berkedudukaan mulia diantara ciptaan-ciptaan Allah.\r\nMemahami ketinggian eksistensi dan potensi yang dimiliki manusia, anak manusia mempunyai kedudukan yang sama antara yang satu dengan yang lainnya. Sebagai warga dunia manusia adalah satu dan sebagai warga negara manusia adalah sebangsa , sebagai mukmin manusia adalah bersaudara. 18)\r\nTidak ada kelebihan antara yang satu dengan yang lainnya , kecuali karena ketakwaannya. Setiap manusia memiliki kekurangan dan kelebihan, ada yang menonjol pada diri seseorang tentang potensi kebaikannya , tetapi ada pula yang terlalu menonjol potensi kelemahannya, agar antara satu dengan yang lainnya saling mengenal, selalu memadu kelebihan masing-masing untuk saling kait mengkait atau setidaknya manusia harus berlomba dalam mencaridanmencapai kebaikan, oleh karena itu manusia dituntut untuk saling menghormati, bekerjasama, totlong menolong, menasehati, dan saling mengajak kepada kebenaran demi kebaikan bersama.\r\nManusia telah dan harus selalu mengembangkan tanggapannya terhadap kehidupan. Tanggapan tersebut pada umumnya merupakan usaha mengembangkan kehidupan berupa hasil cipta, rasa, dan karsa manusia. Dengan demikian maka hasil itu merupakan budaya manusia, yang sebagian dilestarikan sebagai tradisi, dan sebagian diubah. Pelestarian dan perubahan selalu mewarnai kehidupan manusia. Inipun dilakukan dengan selalu memuat nilai-nilai yang telah disebut di bagian awal, sehingga budaya yang bersesuaian bahkan yang merupakan perwujudan dari nilai-nilai tersebut dilestarikan, sedang budaya yang tidak bersesuaian diperbaharui.\r\nKerangka bersikap tersebut mengisyaratkan bergerak secara dinamik dan kreatif dalam kehidupan manusia. Manusia dituntut untuk memanfaatkan potensinya yang telah dianugerahkan oleh Allah SWT. Melalui pemanfaatan potensi diri itu justru manusia menyadari asal mulanya, kejadian, dan makna kehadirannya di dunia.\r\nDengan demikian pengembangan berbagai aspek budaya dan tradisi dalam kehidupan manusia dilaksanakan sesuai dengan nilai dalam hubungan dengan Allah, manusia dan alam selaras dengan perekembangan kehidupandan mengingat perkembangan suasana. Memang manusia harus berusaha menegakan iman, taqwa dan amal shaleh guna mewujudkan kehidupan yang baik dan penuh rahmat di dunia. Di dalam kehidupan itu sesama manusia saling menghormati harkat dan martabat masing-masing , berderajat, berlaku adil dan mengusahakan kebahagiaan bersama. Untuk diperlukan kerjasama yang harus didahului dengan sikap keterbukaan, komunikasi dan dialog antar sesama. Semua usaha dan perjuangan ini harus terus -menerus dilakukan sepanjang sejarah.\r\nMelalui pandangan seperti ini pula kehidupan bermasyarakat,berbangsa dan bernegara dikembangkan. Kehidupan bermasyarakat, berbangsa dan bernegara merupakan kerelaan dan kesepakatan untuk bekerja sama serta berdampingan setara dan saling pengertian. Bermasyarakat, berbangsa dan bernegara dimaksudkan untuk mewujudkan cita-cita bersama : hidup dalam kemajuan, keadilan, kesejahteraan dan kemanusiaan. Tolok ukur bernegara adalah keadilan, persamaan hukum dan perintah serta adanya permusyawaratan.\r\nSedangkan hubungan antara muslim ddan non muslim dilakukan guna membina kehidupan manusia dengan tanpa mengorbankan keyakinan terhadap universalitas dan kebenaran Islam sebagai ajaran kehidupan paripurna. Dengan tetap berpegang pada keyakinan ini, dibina hubungan dan kerja sama secara damai dalam mencapai cita-cita kehidupan bersama ummat manusia.Nilai -nilai yang dikembangkan dalam hubungan antar manusia tercakup dalam persaudsaraan antar insan pergerakan , persaudaraan sesama Islam , persaudaraan sesama warga bangsa dan persaudaraan sesama ummat manusia . Perilaku persaudaraan ini , harusd menempatkan insan pergerakan pada posisi yang dapatv memberikan kemanfaatan maksimal untuk diri dan lingkungan persaudaraan.', 2, 4, 'ndp_manusia_dengan_manusia.jpg', '2020-11-13 12:19:38', '2'),
(7, 'NILAI DASAR PERGERAKAN HUBUNGAN MANUSIA DENGAN ALAM', 'Alam semesta adalah ciptaan Allah SWT. 19) Dia menentukan ukuran dan hukum-hukumnya.20) Alam juga menunjukan tanda-tanda keberadaan, sifat dan perbuatan Allah. 21) Berarti juga nilai taiuhid melingkupi nilai hubungan manusia dengan alam .\r\nSebagai ciptaan Allah, alam berkedudukan sederajat dengan manusia. Namun Allah menundukan alam bagi manusia , 22) dan bukan sebaliknya . Jika sebaliknya yang terjadi, maka manusia akan terjebak dalam penghambaan terhadap alam , bukan penghambaan terhadap Allah. Karena itu sesungguhnya berkedudukan sebagai khalifah di bumi untuk menjadikan bumi maupun alam sebagai obyek dan wahana dalam bertauhid dan menegaskan dirinya. 23)\r\nPerlakuan manusia terhadap alam tersebut dimaksudkan untuk memakmurkan kehidupan di dunia dan diarahkan kepada kebaikan di akhirat, 24) di sini berlaku upaya berkelanjutan untuk mentransendensikan segala aspek kehidupan manusia. 25) Sebab akhirat adalah masa masa depan eskatologis yang tak terelakan . 26) Kehidupan akhirat akan dicapai dengan sukses kalau kehidupan manusia benar-benar fungsional dan beramal shaleh. 27)\r\nKearah semua itulah hubungan manusia dengan alam ditujukan . Dengan sendirinya cara-cara memanfaatkan alam , memakmurkan bumi dan menyelenggarakan kehidupan pada umumnya juga harus bersesuaian dengan tujuan yang terdapat dalam hubungan antara manusia dengan alam tersebut. Cara-cara tersebut dilakukan untuk mencukupi kebutuhan dasar dalam kehidupan bersama. Melalui pandangan ini haruslah dijamin kebutuhan manusia terhadap pekerjaan ,nafkah dan masa depan. Maka jelaslah hubungan manusia dengan alam merupakan hubungan pemanfaatan alam untuk kemakmuran bersama. Hidup bersama antar manusia berarti hidup dalam kerja sama , tolong menolong dan tenggang rasa.\r\nSalah satu hasil penting dari cipta, rasa, dan karsa manusia yaitu ilmu pengetahuan dan teknologi (iptek). Manusia menciptakan itu untuk memudahkan dalam rangka memanfaatkan alam dan kemakmuran bumi atau memudahkan hubungan antar manusia . Dalam memanfaatkan alam diperlukan iptek, karena alam memiliki ukuran, aturan, dan hukum tertentu; karena alam ciptaan Allah buykanlah sepenuhnya siap pakai, melainkan memerlukan pemahaman terhadap alam dan ikhtiar untuk mendayagunakannya.\r\nNamun pada dasarnya ilmu pengetahuan bersumber dari Allah. Penguasaan dan pengembangannyadisandarkan pada pemahaman terhadap ayat-ayat Allah. Ayat-ayat tersebut berupa wahyu dan seluruh ciptaanNya. Untuk memahami dan mengembangkan pemahaman terhadap ayat-ayat Allah itulah manusia mengerahkan kesadaran moral, potensi kreatif berupa akal dan aktifitas intelektualnya. Di sini lalu diperlukan penalaran yang tinggi dan ijtihad yang utuh dan sistimatis terhadap ayat-ayat Allah, mengembangkan pemahaman tersebut menjadi iptek, menciptakan kebaruan iptek dalam koteks ke,manusiaan, maupun menentukan simpul-simpul penyelesaian terhadap masalah-masalah yang ditimbulkannya. Iptek meruipakan perwujudan fisik dari ilmu pengetahuan yang dimiliki manusia, terutama digunakan untuk memudahkan kehidupan praktis.\r\nPenciptaan, pengembangan dan penguasaan atas iptek merupakan keniscayaan yang sulit dihindari. Jika manusia menginginkan kemudahan hidup, untuk kesejahteraan dan kemakmuran bersama bukan sebaliknya. Usaha untuk memanfaatkan iptek tersebut menuntut pengembangan semangat kebenaran, keadilan , kmanusiaan dan kedamaian. Semua hal tersebut dilaksanakan sepanjang hayat, seiring perjalanan hidup manusia dan keluasan iptek. Sehingga, berbarengan dengan keteguhan iman-tauhid, manusia dapat menempatkan diri pada derajat yang tinggi.', 2, 4, 'ndp_manusia_dengan_alam.jpg', '2020-11-13 12:17:20', '2');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `likekonten`
--
ALTER TABLE `likekonten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subjeniskonten`
--
ALTER TABLE `subjeniskonten`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
