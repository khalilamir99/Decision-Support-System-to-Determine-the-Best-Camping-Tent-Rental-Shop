-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 01:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_maut`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`, `alamat`, `waktu`, `no_telp`) VALUES
(77, 'Minang Camp', 'Kurao Pagang, Kec. Nanggalo, Kota Padang, Sumatera Barat', '08.30 – 23.00', '083169141060'),
(78, 'Jelajah Alam Sumbar', 'Jl. Jati Adabiah, Kec. Padang Timur, Kota Padang, Sumatera Barat', '08.00 – 23.00', '085263485533'),
(79, 'Mahameru Outdoor', 'Jl. Dr. Moh. Hatta, Kec. Kuranji, Kota Padang, Sumatera Barat', '09.00 – 22.00', '081363064024'),
(80, 'Rajawali Andalas', 'Jl. Dr. Moh. Hatta No.7, Kec. Kuranji, Kota Padang, Sumatera Barat', '09.00 – 21.00', '082111835199'),
(81, 'Andalas Adventure', 'Jl. Andalas No.76, Kec. Padang Timur, Kota Padang, Sumatera Barat', '08.00 – 22.00', '082284445508'),
(93, 'Sumbar Mountain', 'Jl. Dr. Moh. Hatta, Kec. Pauh, Kota Padang, Sumatera Barat', '08.00 – 22.00', '083181103452'),
(94, 'Uda Outdoor', 'Jl. Kp. Kalawi No.13, Kec. Kuranji, Kota Padang, Sumatera Barat', '09.00 – 22.00', '082284548118'),
(95, 'Millenial Camp', 'Jl. Raya Kuranji, Kec. Kuranji, Kota Padang, Sumatera Barat', '24 jam', '081396409697'),
(96, 'Pasput Outdoor', 'Jl. Adinegoro No.9a, Kec. Koto Tangah, Kota Padang, Sumatera Barat', '24 Jam', '082233619592');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_kriteria` varchar(100) NOT NULL,
  `bobot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `keterangan`, `kode_kriteria`, `bobot`) VALUES
(49, 'Kelengkapan', 'C1', '0.3'),
(50, 'Merek', 'C2', '0.25'),
(51, 'Harga', 'C3', '0.25'),
(52, 'Jumlah', 'C4', '0.15'),
(60, 'Jarak', 'C5', '0.05');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(576, 77, 49, 203),
(577, 77, 50, 208),
(578, 77, 51, 212),
(579, 77, 52, 216),
(581, 78, 49, 202),
(582, 78, 50, 207),
(583, 78, 51, 210),
(584, 78, 52, 214),
(586, 79, 49, 203),
(587, 79, 50, 206),
(588, 79, 51, 211),
(589, 79, 52, 216),
(591, 80, 49, 203),
(592, 80, 50, 207),
(593, 80, 51, 212),
(594, 80, 52, 217),
(596, 81, 49, 203),
(597, 81, 50, 207),
(598, 81, 51, 211),
(599, 81, 52, 215),
(630, 93, 49, 204),
(631, 93, 50, 208),
(632, 93, 51, 211),
(633, 93, 52, 217),
(640, 77, 60, 235),
(641, 78, 60, 235),
(642, 79, 60, 233),
(643, 80, 60, 234),
(644, 81, 60, 234),
(645, 93, 60, 233),
(646, 94, 49, 203),
(647, 94, 50, 209),
(648, 94, 51, 211),
(649, 94, 52, 215),
(650, 94, 60, 234),
(651, 95, 49, 202),
(652, 95, 50, 209),
(653, 95, 51, 212),
(654, 95, 52, 215),
(655, 95, 60, 233),
(656, 96, 49, 204),
(657, 96, 50, 207),
(658, 96, 51, 210),
(659, 96, 52, 216),
(660, 96, 60, 236);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(202, 49, '> 4 Jenis tenda', '4'),
(203, 49, '3 Jenis Tenda', '3'),
(204, 49, '2 Jenis Tenda', '2'),
(205, 49, '1 Jenis Tenda', '1'),
(206, 50, 'Rei, Quechua, Forester', '4'),
(207, 50, 'Rei, Quechua, Forester, Tendaki, Pavilio', '3'),
(208, 50, 'Tendaki, Pavilio, Big Dome, Grid Outdoor, Compas, Borneo', '2'),
(209, 50, 'Big Dome, Grid Outdoor, Compas, Borneo', '1'),
(210, 51, '< 10000 / malam / orang', '4'),
(211, 51, '10000 - 11500 / malam / orang', '3'),
(212, 51, '11600 - 13000 / malam / orang', '2'),
(213, 51, '> 13000 / malam / orang', '1'),
(214, 52, '> 100 Unit', '4'),
(215, 52, '60 - 100 Unit', '3'),
(216, 52, '30 - 59 Unit', '2'),
(217, 52, '< 30 unit', '1'),
(233, 60, '< 7 Km', '4'),
(234, 60, '7 Km - 12 Km', '3'),
(235, 60, '12,1 Km - 20 Km', '2'),
(236, 60, '> 20 Km', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tenda`
--

CREATE TABLE `tenda` (
  `id_tenda` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `kapasitas` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenda`
--

INSERT INTO `tenda` (`id_tenda`, `id_alternatif`, `kapasitas`, `jumlah`, `merek`, `harga`) VALUES
(35, 78, '2', 10, 'Rei', '20000.00'),
(36, 78, '4', 100, 'Rei, Pavilio, Borneo', '40000.00'),
(37, 78, '6', 6, 'Tendaki', '60000.00'),
(38, 78, 'Pramuka', 60, 'Pramuka', '35000.00'),
(39, 79, '2', 10, 'Rei, Forester', '25000.00'),
(40, 79, '4', 15, 'Tendaki, Forester, Rei', '45000.00'),
(41, 79, '6', 10, 'Rei', '60000.00'),
(42, 80, '2', 6, 'Quechua Arpenaz', '30000.00'),
(43, 80, '4', 13, 'Pavilio', '40000.00'),
(44, 80, '6', 4, 'Borneo', '80000.00'),
(45, 81, '2', 4, 'Pavilio', '25000.00'),
(46, 81, '4', 40, 'Tendaki, Pavilio', '40000.00'),
(47, 81, 'Pramuka', 30, 'Pramuka', '35000.00'),
(77, 77, '2', 19, 'Go Monodome', '25000.00'),
(78, 77, '4', 25, 'Compass, Pavilio, Broneo ', '40000.00'),
(79, 77, '6', 2, 'Tendaki, Big dome', '80000.00'),
(80, 94, '2', 10, 'Grid Outdoor', '25000.00'),
(81, 94, '4', 40, 'Borneo', '40000.00'),
(82, 94, '6', 10, 'Big Dome', '70000.00'),
(83, 93, '2', 3, 'Tendakii', '25000.00'),
(84, 93, '4', 20, 'Compas', '40000.00'),
(85, 95, '2', 10, 'Go NSM', '30000.00'),
(86, 95, '4', 40, 'Borneo, Compas', '40000.00'),
(87, 95, '6', 5, 'Big Dome', '80000.00'),
(88, 95, 'Pramuka', 5, 'Pramuka', '90000.00'),
(89, 96, '2', 25, 'Quechua Arpenaz', '20000.00'),
(90, 96, '4', 15, 'Tendaki', '35000.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 2, 'User', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(11, 2, 'Khalil \'Amir', 'khalilamir2371@gmail.com', 'khalil', 'ffadd3bb28d3086971fc23cad4d8eab1');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `nilai` (`nilai`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tenda`
--
ALTER TABLE `tenda`
  ADD PRIMARY KEY (`id_tenda`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=661;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `tenda`
--
ALTER TABLE `tenda`
  MODIFY `id_tenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`nilai`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tenda`
--
ALTER TABLE `tenda`
  ADD CONSTRAINT `tenda_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
