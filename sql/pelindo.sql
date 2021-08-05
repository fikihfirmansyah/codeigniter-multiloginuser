-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2021 at 11:45 AM
-- Server version: 10.3.29-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u4567123_pelindo`
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
(3, 'Batam', 100.00, 100.00, 52.00, 53.00, 54.00, 55.00, 56.00, 57.00, 58.00, 59.00, 60.00, 61.00, 62.00, 63.00, 64.00, 65.00, 66.00, 67.00, 67.67, '2021-07-30 04:20:08');

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
(1, 1, 'admin', '$2y$05$OA.OoeNHoEkbGGKazYqPU.UOaI5jmgro8x2pRSV56ClTWlDf0EEn2', '', 'SISTEM', '', 'admin@administrator.com', '', '082370382008', '1625761991343.jpg', 1, '2021-07-30 09:44:57', '2021-07-08 23:53:53', NULL),
(2, 2, 'member', '$2y$05$8GdJw3BVbmhN6x2t0MNise7O0xqLMCNAN1cmP6fkhy0DZl4SxB5iO', '', 'Vika', '12345567', 'member@member.com', 'Belawan', '082370382008', '1625763396206.jpg', 1, '2021-07-30 08:17:09', '2021-07-08 23:53:53', NULL),
(7, 2, 'tarayesaa', '$2y$05$oNHSlC1Z9shVxFITNkbeLO86OTFpizKSoTS0NEAVT2pI3yu621cSW', NULL, 'Tara Pandhyta Yesa', '12345678', 'tyesaa07@gmail.com', 'Kantor Pusat', '081262666779', '', 1, '2021-07-30 09:40:22', '2021-07-21 16:34:32', NULL),
(8, 2, 'member', '$2y$05$OiC19gW/veUu2DcH7GY0CuNKO8AcWBMf3BBjworbZdDiCNcGwqWu.', NULL, 'member', 'member', 'member@member.com', 'Kantor Pusat', '243452525', '1625761991343.jpg', 0, NULL, '2021-07-24 11:53:58', NULL),
(9, 2, 'Aryakk', '$2y$05$FnNIjSSax1Mws8PFt9Rr2.SK/MGmB27HKRUefoPvsVMgVMZR3DUpO', NULL, 'Arya waranggana', '12121212121212', 'arya@pelindo.co.id', 'Kantor Pusat', '081262666779', '', 1, '2021-07-30 11:20:49', '2021-07-30 09:43:32', NULL);

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
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
