-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2023 pada 10.26
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20222_wp2_412021015`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `id_login`, `nama`, `no_telpon`) VALUES
(1, 1, 'Admin 1', '0812345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `judul`, `konten`, `gambar`, `link`) VALUES
(3, 'Masih Mengalir, Kali Ini Pengobatan Tim Kesehatan Ukrida', 'Tim Bakti Sosial Ukrida melaksanakan tugas secara bergantian, didukung oleh alumni FKIK Ukrida, dr. Vera, dr. Hetty, dan dr. Winny, serta 13 orang mahasiswa anggota Pecinta Alam Ukrida (Palada).', '043610700_1671098657-WhatsApp_Image_2022-12-12_at_8.27.01_PM__1_.webp', 'https://www.liputan6.com/on-off/read/5154990/bantuan-korban-bencana-gempa-cianjur-masih-mengalir-kali-ini-pengobatan-tim-kesehatan-ukrida'),
(4, 'Ukrida Gelar Bakti Sosial di Cianjur dengan Memadukan Keilmuan dan Kemanusiaan  Artikel ini telah di', 'Universitas Kristen Krida Wacana ( Ukrida ) menerjunkan tim menuju wilayah terdampak gempa di Cianjur. Ukrida melakukan bakti sosial dengan memberikan bantuan kemanusiaan juga melakukan program pengabdian masyarakat dengan dana hibah Kemendikbudristek untuk program Desa Bangkit.', 'kegiatan 1.jpeg', 'https://edukasi.sindonews.com/read/968081/211/ukrida-gelar-bakti-sosial-di-cianjur-dengan-memadukan-keilmuan-dan-kemanusiaan-1670922769');

-- --------------------------------------------------------

--
-- Struktur dari tabel `devisi`
--

CREATE TABLE `devisi` (
  `id` int(11) NOT NULL,
  `nama_devisi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(9000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `devisi`
--

INSERT INTO `devisi` (`id`, `nama_devisi`, `deskripsi`, `gambar`) VALUES
(7, 'Gunung Hutan', 'Gunung Hutan merupakan salah satu divisi yang berkegiatan di bidang pendakian gunung. Pendakian gunung sendiri termasuk salah satu kegiatan olah raga alam bebas yang keras dan penuh petualangansehingga dibutuhkan kecerdasan, keterampilan, dan kekuatan yang memadai. Kegiatan dalam divisi ini meliputi pembukaan jalur, teknik membaca peta, teknik hidup di alam bebas dan lain-lain.', 'logo hiking.png'),
(8, 'Rock Climbing', 'Rock Climbing merupakan salah satu bagian dari divisi PALADA dimana kegiatan tersebut berupa pemanjatan tebing dengan peralatan dan teknik-teknik tertentu. Kegiatan ini mempelajari tentang teknik-teknik pemanjatan tebing, pemetaan, rescue, dan lain-lain.  ', 'logo rc.png'),
(9, 'Arung Jeram', 'Arung Jeram merupakan salah satu dari empat divisi yang ada di PALADA yang berkegiatan di pengarungan sungai. Kegiatan yang dilakukan antara lain pengarungan sungai, pemetaan jeram, serta kegiatan keterampilan lainnya. Selain itu, divisi ini juga menerapkan materi-materi lain seperti rescue yang terdiri atas self rescue, rescue by man, rescue by boat, dan z-Drag, membaca arus (karakteristik sungai), skipper, komunikasi, hand signal, read and run, scouting, linning, portaging dan lain-lain. Dari divisi ini sudah banyak aksi yang dilakukan, seperti bantuan saat banjir dan mengikuti lomba arung jeram. ', 'logo rafting.png'),
(10, 'Caving', 'Caving merupakan divisi PALADA yang berkegiatan di bidang penelusuran gua. Dalam pelaksanaannya kegiatan ini membutuhkan peralatan dan teknik-teknik penelusuran tertentu. Kegiatan yang dilakukan antara lain adalan penelusuran gua, pemetaan gua, pendataan flora dan fauna dalam gua dan lain-lain.  ', 'logo caving.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `devisi3`
--

CREATE TABLE `devisi3` (
  `id` int(11) NOT NULL,
  `nama_devisi` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `devisi3`
--

INSERT INTO `devisi3` (`id`, `nama_devisi`, `deskripsi`, `gambar`) VALUES
(6, 'Gunung Hutan', 'Kegiatan mendaki gunung  dan menyusuri hutan dengan menerapkan materi-materi yang  dibutuhkan selama pendakian', 'logo hiking.png'),
(7, 'Arung Jeram', 'Kegiatan mengarungi jeram-jeram sungai yang sangat menantang', 'logo rafting.png'),
(8, 'Rock Climbing', 'Pemanjatan tebing dengan peralatan dan teknik-teknik tertentu', 'logo rc.png'),
(9, 'Caving', 'Kegiatan yang dilakukan antara lain adalah penelusuran goa, pemetaan goa, pendataan flora dan fauna dalam goa', 'logo caving.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `foto`, `deskripsi`) VALUES
(6, 'utama 2.jpg', 'DIKLATSAR PALADA'),
(7, 'kegiatan 2.jpeg', 'PEDULI CIANJUR'),
(9, 'latgab3.jpeg', 'LATIHAN GABUNGAN'),
(10, 'rafting 5.jpeg', 'LOMBA ARUNG JERAM'),
(11, 'rc 7.jpeg', 'MATERI TEBING'),
(12, 'latfis 1.jpeg', 'LATIHAN FISIK'),
(13, 'kegiatan 6.png', 'CAMP CERIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `konten`, `gambar`, `link`) VALUES
(2, 'DIKLATSAR XXX PALADA', 'Segera daftarkan dirimu!!\r\nBisa langsung hubungi\r\nCP 👇\r\n- Jessi +62852-4209-7204\r\n- Andi +62821-2269-7492\r\natau langsung datang ke Sekretariat PALADA di Kampus 1 Ukrida Tanjung Duren..', '315892180_548458607120668_2047422036367574178_n.webp', 'https://www.instagram.com/p/ClIqn1EvTzo/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA=='),
(3, 'PALADA DONOR DARAH', '\r\nHELLO GENK !!!\r\nKami dari PALADA ( Pencinta Alam Ukrida) akan mengadakan kegiatan \"PALADA DONOR DARAH\" dengan Tema \"GIVING IS CARING\". Kegiatan ini akan dilaksanakan pada:\r\n\r\nHari/tanggal : Selasa, 2 Mei 2023\r\nWaktu : 11.00 - selesai WIB\r\nTempat : Ruang E007-008 Kampus 1 UKRIDA.', '342069782_741732607649510_974504715805821275_n.webp', 'https://www.instagram.com/p/CrK1C5gPs0W/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('mahasiswa','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'john_doe', 'password123', 'mahasiswa'),
(2, 'admin1', 'admin123', 'admin'),
(3, 'felixcia', 'feli22', 'mahasiswa'),
(16, 'admin', '$2y$10$yh2pU.UZwZl05VdaDjdf8OI09KTdvSBvWlmDl59Rw0Xgo5vSxK8jW', 'admin'),
(17, 'felsi', '$2y$10$D7WD/JcAw1c6okgFE7dv/.VZ1kIXFaZh9tQsVXiQ6gpWQsl3yjNve', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `id_login`, `nama`, `email`, `no_telpon`, `jurusan`) VALUES
(3, 3, 'felixcia', 'felsirianghepat@gmail.com', '081225628561', 'informatika'),
(16, 16, 'admin', 'admin@gmail.com', '081225628561', 'informatika'),
(17, 17, 'felsi', 'felsirianghepat@gmail.com', '081225628561', 'informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `angkatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id`, `foto`, `nama`, `angkatan`) VALUES
(3, 'img/pengurus/64a6291462666_5.png', 'Andi Rasyadah Nuur Shafah P.108.KB', 'Kumbang Bawana'),
(4, 'img/pengurus/64a676fe3e82c_Gambar1.png', 'Anggreni Santika P.109.KB', 'Kumbang Bawana'),
(5, 'img/pengurus/64a8f6fd5c78f_WhatsApp Image 2023-07-06 at 06.46.04.jpeg', 'Jessica Stefany Rindengan P.110.KB', 'Kumbang Bawana'),
(6, 'img/pengurus/64a629471c40f_4.png', ' Felixcia Z M Ina Rianghepat P.111.KB', 'Kumbang Bawana'),
(8, 'img/pengurus/64a8f7be344b2_WhatsApp Image 2023-07-06 at 06.46.05 (1).jpeg', 'Cloudy Eldha Sofia Boru Pakpahan P.112.KB', 'Kumbang Bawana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regis_anggota_organisasi`
--

CREATE TABLE `regis_anggota_organisasi` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_devisi` int(11) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `regis_anggota_organisasi`
--

INSERT INTO `regis_anggota_organisasi` (`id`, `id_mahasiswa`, `nama`, `id_devisi`, `nim`, `jurusan`, `angkatan`, `foto`, `keterangan`) VALUES
(15, 3, 'Faustina', 7, '3355667', 'keperawatan', 2021, 'FOTO FAUSTINA.jpeg', 'khfgfjhgkjbb');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `devisi`
--
ALTER TABLE `devisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `devisi3`
--
ALTER TABLE `devisi3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `regis_anggota_organisasi`
--
ALTER TABLE `regis_anggota_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_devisi` (`id_devisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `devisi`
--
ALTER TABLE `devisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `devisi3`
--
ALTER TABLE `devisi3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `regis_anggota_organisasi`
--
ALTER TABLE `regis_anggota_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`);

--
-- Ketidakleluasaan untuk tabel `regis_anggota_organisasi`
--
ALTER TABLE `regis_anggota_organisasi`
  ADD CONSTRAINT `regis_anggota_organisasi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`),
  ADD CONSTRAINT `regis_anggota_organisasi_ibfk_2` FOREIGN KEY (`id_devisi`) REFERENCES `devisi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
