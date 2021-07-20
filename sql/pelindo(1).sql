-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2021 at 08:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelindo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `favicon` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `keywords` varchar(225) NOT NULL,
  `metatext` varchar(225) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`, `keywords`, `metatext`, `about`) VALUES
(1, 'PELINDO.PT', 'logo.png', 'logo.ico\r\n', 'fikihfirmansyah43@gmail.com', '082370382008', 'Jl. Pembangunan No. 112, Medan Baru, Kota Medan', 'https://facebook.com/ffn43', 'https://instagram.com/ffn43', 'Sistem Informasi Pelindo', 'Sistem Informasi Pelindo', 'Sistem Informasi Pelindo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rapor`
--

CREATE TABLE `tbl_rapor` (
  `no` int(11) NOT NULL,
  `cabang` varchar(50) DEFAULT NULL,
  `temuan` double(5,2) DEFAULT NULL,
  `nilai_amanah` double(5,2) DEFAULT NULL,
  `level` double(5,2) DEFAULT NULL,
  `tingkat` double(5,2) DEFAULT NULL,
  `avail` double(5,2) DEFAULT NULL,
  `util` double(5,2) DEFAULT NULL,
  `nilai_kompeten` double(5,2) DEFAULT NULL,
  `kaloborasi` double(5,2) DEFAULT NULL,
  `nilai_harmonis` double(5,2) DEFAULT NULL,
  `revenue` double(5,2) DEFAULT NULL,
  `efisiensi` double(5,2) DEFAULT NULL,
  `nilai_loyal` double(5,2) DEFAULT NULL,
  `koreksi` double(5,2) DEFAULT NULL,
  `modul` double(5,2) DEFAULT NULL,
  `nilai_adaptif` double(5,2) DEFAULT NULL,
  `realisasi_kpi` double(5,2) DEFAULT NULL,
  `realisasi_pkm` double(5,2) DEFAULT NULL,
  `nilai_kolab` double(5,2) DEFAULT NULL,
  `nilai_total` double(5,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rapor`
--

INSERT INTO `tbl_rapor` (`no`, `cabang`, `temuan`, `nilai_amanah`, `level`, `tingkat`, `avail`, `util`, `nilai_kompeten`, `kaloborasi`, `nilai_harmonis`, `revenue`, `efisiensi`, `nilai_loyal`, `koreksi`, `modul`, `nilai_adaptif`, `realisasi_kpi`, `realisasi_pkm`, `nilai_kolab`, `nilai_total`, `created_at`) VALUES
(93, 'Pekan Baru', 99.00, 12.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 53.00, '2021-07-20 18:52:42'),
(92, 'Pekan Baru', 99.00, 12.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 53.00, '2021-07-20 18:17:55'),
(91, 'Pekan Baru', 99.00, 12.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 53.00, '2021-07-20 17:54:50'),
(89, 'Belawan', 99.00, 99.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 67.50, '2021-07-20 17:48:44'),
(88, 'Belawan', 99.00, 51.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 59.50, '2021-07-20 17:48:18'),
(87, 'Belawan', 51.00, 51.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 59.50, '2021-07-20 17:48:02'),
(90, 'Pekan Baru', 99.00, 12.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 53.00, '2021-07-20 17:49:40'),
(84, 'Kantor Pusat', 50.00, 51.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 59.50, '2021-07-20 17:40:50'),
(85, 'Belawan', 51.00, 51.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 59.50, '2021-07-20 17:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Hak akses Administrator'),
(2, 'Cabang', 'Hak akses Cabang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_reset_key` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `nipp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_role`, `username`, `password`, `password_reset_key`, `name`, `nipp`, `email`, `branch`, `phone`, `photo`, `activated`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$05$OA.OoeNHoEkbGGKazYqPU.UOaI5jmgro8x2pRSV56ClTWlDf0EEn2', '', 'SISTEM', '', 'admin@administrator.com', '', '082370382008', '1625761991343.jpg', 1, '2021-07-21 01:56:54', '2021-07-08 23:53:53', NULL),
(2, 2, 'member', '$2y$05$8GdJw3BVbmhN6x2t0MNise7O0xqLMCNAN1cmP6fkhy0DZl4SxB5iO', '', 'Vika', '12345567', 'member@member.com', 'Belawan', '082370382008', '1625763396206.jpg', 1, '2021-07-21 01:46:06', '2021-07-08 23:53:53', NULL),
(3, 2, 'ffnart43@gmail.com', '$2y$05$JYolcc55zpAlcMzTj7P.UeIjQYsqF2k.Sb0geDxzoc7Cv5dBll1bG', NULL, 'fgergererter', '43242dsfs', 'ffnart43@gmail.com', '', '5252424234', '1625761991343.jpg', 0, NULL, '2021-07-19 21:52:59', NULL),
(4, 2, 'eer3434', '$2y$05$OLffegIob0CAeZ/.GTj76OCypMYtiNW8JTg/vJQWUUQo53zXI6tjq', NULL, 'Fikih', '3324242fer', 'ffnart431@gmail.com', 'Belawan', '3432432', '1625761991343.jpg', 0, NULL, '2021-07-19 22:13:21', NULL),
(5, 2, 'admin@a.g', '$2y$05$96Z1sMi4YeNXV4qfYY4DHOi8oYM9OVXUUScoBDw.klS/SOcdSyDpi', NULL, 'fikih', '45eferww', 'admin@a.g', 'Kantor Pusat', '32423342443', '', 1, '2021-07-20 09:25:13', '2021-07-20 09:14:41', NULL),
(6, 2, '1234567', '$2y$05$P4knfJTeXWMYUGvb7tw7wunfGyWlmU.7sDr9RCFrjazzPk0ETijlO', NULL, 'Fikih', '1234567', '1234567@gmail.com', 'Kantor Pusat', '1234567', '', 1, NULL, '2021-07-20 23:06:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_rapor`
--
ALTER TABLE `tbl_rapor`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rapor`
--
ALTER TABLE `tbl_rapor`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
