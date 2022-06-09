-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Apr 2022 pada 04.26
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksinasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `centroid_temp`
--

CREATE TABLE `centroid_temp` (
  `id` int(11) NOT NULL,
  `iterasi` int(11) NOT NULL,
  `id_vaksin` int(11) NOT NULL,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `centroid_temp`
--

INSERT INTO `centroid_temp` (`id`, `iterasi`, `id_vaksin`, `c1`, `c2`, `c3`) VALUES
(1, 1, 15, '1', '0', '0'),
(2, 1, 16, '0', '1', '0'),
(3, 1, 17, '0', '1', '0'),
(4, 1, 18, '1', '0', '0'),
(5, 1, 19, '0', '1', '0'),
(6, 1, 20, '0', '0', '1'),
(7, 1, 21, '0', '0', '1'),
(8, 1, 22, '0', '1', '0'),
(9, 1, 23, '0', '1', '0'),
(10, 1, 24, '0', '1', '0'),
(11, 1, 25, '0', '1', '0'),
(12, 1, 26, '0', '0', '1'),
(13, 2, 15, '1', '0', '0'),
(14, 2, 16, '0', '1', '0'),
(15, 2, 17, '0', '1', '0'),
(16, 2, 18, '1', '0', '0'),
(17, 2, 19, '0', '1', '0'),
(18, 2, 20, '0', '0', '1'),
(19, 2, 21, '0', '0', '1'),
(20, 2, 22, '0', '1', '0'),
(21, 2, 23, '0', '1', '0'),
(22, 2, 24, '0', '1', '0'),
(23, 2, 25, '0', '1', '0'),
(24, 2, 26, '0', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_vaksin`
--

CREATE TABLE `data_vaksin` (
  `id_vaksin` int(11) NOT NULL,
  `id_puskesmas` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `vaksin_gel1` int(11) NOT NULL,
  `bvaksin_gel1` int(11) NOT NULL,
  `vaksin_gel2` int(11) NOT NULL,
  `bvaksin_gel2` int(11) NOT NULL,
  `vaksin_gel3` int(11) NOT NULL,
  `bvaksin_gel3` int(11) NOT NULL,
  `pers_vaksin_gel1` float NOT NULL,
  `pers_vaksin_gel2` float NOT NULL,
  `pers_vaksin_gel3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_vaksin`
--

INSERT INTO `data_vaksin` (`id_vaksin`, `id_puskesmas`, `id_kelurahan`, `jumlah_penduduk`, `vaksin_gel1`, `bvaksin_gel1`, `vaksin_gel2`, `bvaksin_gel2`, `vaksin_gel3`, `bvaksin_gel3`, `pers_vaksin_gel1`, `pers_vaksin_gel2`, `pers_vaksin_gel3`) VALUES
(15, 1, 13, 22606, 16728, 5878, 15557, 7049, 19, 22587, 73.9981, 68.818, 0.0840485),
(16, 1, 14, 17084, 15888, 1196, 14775, 2309, 20, 17064, 92.9993, 86.4844, 0.117069),
(17, 1, 15, 16674, 14339, 2335, 13191, 3483, 17, 16657, 85.9962, 79.1112, 0.101955),
(18, 3, 16, 25449, 23413, 2036, 21305, 4144, 14, 25435, 91.9997, 83.7165, 0.055012),
(19, 3, 17, 15914, 12095, 3819, 11369, 4545, 12, 15902, 76.0023, 71.4402, 0.0754053),
(20, 3, 18, 6502, 5916, 586, 5442, 1060, 9, 6493, 90.9874, 83.6973, 0.138419),
(21, 3, 19, 8543, 7603, 940, 7146, 1397, 10, 8533, 88.9968, 83.6474, 0.117055),
(22, 2, 20, 18506, 17395, 1111, 15829, 2677, 15, 18491, 93.9965, 85.5344, 0.0810548),
(23, 2, 21, 20872, 17950, 2922, 17052, 3820, 15, 20857, 86.0004, 81.698, 0.0718666),
(24, 2, 22, 19826, 18636, 1190, 17145, 2681, 14, 19812, 93.9978, 86.4774, 0.0706143),
(25, 2, 23, 17079, 15542, 1537, 14454, 2625, 13, 17066, 91.0006, 84.6302, 0.0761169),
(26, 2, 24, 9784, 7827, 1957, 7040, 2744, 12, 9772, 79.998, 71.9542, 0.122649);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_centroid`
--

CREATE TABLE `hasil_centroid` (
  `nomor` int(11) NOT NULL,
  `c1a` varchar(50) NOT NULL,
  `c1b` varchar(50) NOT NULL,
  `c1c` varchar(50) NOT NULL,
  `c2a` varchar(50) NOT NULL,
  `c2b` varchar(50) NOT NULL,
  `c2c` varchar(50) NOT NULL,
  `c3a` varchar(50) NOT NULL,
  `c3b` varchar(50) NOT NULL,
  `c3c` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_centroid`
--

INSERT INTO `hasil_centroid` (`nomor`, `c1a`, `c1b`, `c1c`, `c2a`, `c2b`, `c2c`, `c3a`, `c3b`, `c3c`) VALUES
(1, '3957', '5596.5', '24011', '2015.7142857143', '3162.8571428571', '17978.428571429', '1161', '1733.6666666667', '8266'),
(2, '3957', '5596.5', '24011', '2015.7142857143', '3162.8571428571', '17978.428571429', '1161', '1733.6666666667', '8266');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_puskesmas`
--

CREATE TABLE `info_puskesmas` (
  `id_info` int(11) NOT NULL,
  `id_puskesmas` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_puskesmas`
--

INSERT INTO `info_puskesmas` (`id_info`, `id_puskesmas`, `id_kelurahan`, `alamat`, `kode_pos`) VALUES
(3, 1, 13, 'Jl. Cengger Ayam I No.8, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 65141),
(4, 1, 14, 'Jl. Cengger Ayam I No.8, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 65141),
(5, 1, 15, 'Jl. Cengger Ayam I No.8, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 65141),
(6, 2, 20, 'Jalan Mayjend M.T. Haryono, Dinoyo, Kecamatan Lowokwaru, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 65145),
(7, 2, 21, 'Jalan Mayjend M.T. Haryono, Dinoyo, Kecamatan Lowokwaru, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 65145),
(8, 2, 22, 'Jalan Mayjend M.T. Haryono, Dinoyo, Kecamatan Lowokwaru, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 65145),
(9, 2, 23, 'Jalan Mayjend M.T. Haryono, Dinoyo, Kecamatan Lowokwaru, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 65145),
(10, 2, 24, 'Jalan Mayjend M.T. Haryono, Dinoyo, Kecamatan Lowokwaru, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 65145),
(11, 3, 16, 'Jl. Sudimoro No.17 A, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', 65142),
(12, 3, 17, 'Jl. Sudimoro No.17 A, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', 65142),
(13, 3, 18, 'Jl. Sudimoro No.17 A, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', 65142),
(14, 3, 19, 'Jl. Sudimoro No.17 A, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', 65142);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `geojson` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `geojson`) VALUES
(1, 'Lowokwaru', 'map.js');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_puskesmas` int(11) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `geojson` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `id_puskesmas`, `nama_kelurahan`, `geojson`, `warna`) VALUES
(13, 1, 1, 'Jatimulyo', 'jatymulyo.geojson', '#555555'),
(14, 1, 1, 'Lowokwaru', 'lowokwaru.geojson', '#ff8040'),
(15, 1, 1, 'Tulusrejo', 'tulusrejo.geojson', '#00ff00'),
(16, 1, 3, 'Mojolangu', 'mojolangu.geojson', '#004080'),
(17, 1, 3, 'Tunjungsekar', 'tunjungsekar.geojson', '#800040'),
(18, 1, 3, 'Tasikmadu', 'tasikmadu.geojson', '#800000'),
(19, 1, 3, 'Tunggulwulung', 'tunggulwulung.geojson', '#400080'),
(20, 1, 2, 'Dinoyo', 'dinoyo.geojson', '#00ffff'),
(21, 1, 2, 'Merjosari', 'merjosari.geojson', '#004000'),
(22, 1, 2, 'Tlogomas', 'tlogomas.geojson', '#008080'),
(23, 1, 2, 'Sumbersari', 'sumbersari.geojson', '#400000'),
(24, 1, 2, 'Ketawanggede', 'ketawanggede.geojson', '#ff0080');

-- --------------------------------------------------------

--
-- Struktur dari tabel `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id_puskesmas` int(11) NOT NULL,
  `nama_puskesmas` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `alamat_puskes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `puskesmas`
--

INSERT INTO `puskesmas` (`id_puskesmas`, `nama_puskesmas`, `latitude`, `longitude`, `alamat_puskes`) VALUES
(1, 'Puskesmas Kendalsari', -7.95118, 112.631, 'Jl. Cengger Ayam I No.8, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141'),
(2, 'Puskesmas Dinoyo', -7.94349, 112.611, ' Jl. MT Haryono IX / 13, Malang 65144'),
(3, 'Puskesmas Mojolangu', -7.93852, 112.611, 'Jalan Sudimolo, Malang, Jawa Timur, 65142');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_kecamatan`, `id_kelurahan`, `nama`, `nama_user`, `kontak`, `alamat`, `kode_pos`, `email`, `password`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(10, 1, 13, '', 'admin', '08524232332', 'jl jatimulyo', 553241, 'admin@gmail.com', '$2y$10$p.455oxk81RCvsbt6wR76OJjSanMcGr2Bg630lTMiilwUgml.i4k6', 'default.jpg', 1, 1, 1640069031),
(11, 1, 13, '', 'kaleb molewe', '08524232332', 'jl jatimulyo', 553241, 'kaleb@gmail.com', '$2y$10$d0P1NlBKRM7kzUgysIav4ulE9RJpwqsdB4wu61em0DELHKCPE7Cz.', 'default.jpg', 2, 1, 1640069513),
(12, 1, 13, '', 'opang', '08764376437', 'jl jatimulyo', 553241, 'opang@gmail.com', '$2y$10$oPB7mtpoayvi.ikRSoNyF./qPNLRH1uHrhet2ulzcuUPdjd2p8Hb.', 'default.jpg', 2, 1, 1640357201),
(13, 1, 20, '', 'Abshor Naufar Hakim', '081945594907', 'Jl. Simpang Neptunus no.18 kec. Lowokwaru (Asrama Mahasiswa Lombok Barat Malang)', 66666, 'abshornaufar@gmail.com', '$2y$10$tKjXtbsbhP.e7m320LgDW.xhUm/er08L51bIehV0jHpDDVPtZ/Pi2', 'default.jpg', 1, 1, 1641198462),
(14, 1, 13, '', 'kaleb molewe', '085236940533', 'Jl. Cengger Ayam I No.8, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 65111, 'kaleb23@gmail.com', '$2y$10$9BOZL4GujCgsd37iVDoDreRFwaVcN5CAyZ5OvVRf4DUaafmlIQPry', 'default.jpg', 2, 1, 1643264497),
(16, 1, 16, '', 'kaleb molewe', '08536940533', 'jl jatimulyo', 65111, 'kaleb234@gmail.com', '$2y$10$GkLvbd05vxKPJS20DcS8DOtpKkSOFzOVr5s5y7CH5PmX/FDA17PyS', 'default.jpg', 2, 1, 1646646125),
(17, 1, 20, '', 'naufar@gmail.com', '1111111111111111', 'jl. simpang neptunus no.18 Kecamatan Lowokwaru Malang', 6144, 'naufar@gmail.com', '$2y$10$rYih4gh84taom/YtZ7SFX.eano5gHYqd3aLlZq7o2WGN.IQK1/m5u', 'default.jpg', 2, 1, 1648872400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centroid_temp`
--
ALTER TABLE `centroid_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_vaksin`
--
ALTER TABLE `data_vaksin`
  ADD PRIMARY KEY (`id_vaksin`),
  ADD KEY `id_kelurahan` (`id_kelurahan`),
  ADD KEY `id_puskesmas` (`id_puskesmas`);

--
-- Indexes for table `hasil_centroid`
--
ALTER TABLE `hasil_centroid`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `info_puskesmas`
--
ALTER TABLE `info_puskesmas`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_puskesmas` (`id_puskesmas`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id_puskesmas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centroid_temp`
--
ALTER TABLE `centroid_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `data_vaksin`
--
ALTER TABLE `data_vaksin`
  MODIFY `id_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `hasil_centroid`
--
ALTER TABLE `hasil_centroid`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `info_puskesmas`
--
ALTER TABLE `info_puskesmas`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `puskesmas`
--
ALTER TABLE `puskesmas`
  MODIFY `id_puskesmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_vaksin`
--
ALTER TABLE `data_vaksin`
  ADD CONSTRAINT `data_vaksin_ibfk_2` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`),
  ADD CONSTRAINT `data_vaksin_ibfk_3` FOREIGN KEY (`id_puskesmas`) REFERENCES `puskesmas` (`id_puskesmas`);

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `kelurahan_ibfk_2` FOREIGN KEY (`id_puskesmas`) REFERENCES `puskesmas` (`id_puskesmas`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`);

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_menu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
