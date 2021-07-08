-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 07:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pl4`
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
(1, 'PELINDO.PT', 'google.png', 'google.png', 'fikihfirmansyah43@gmail.com', '082370382008', 'Jl. Pembangunan No. 112, Medan Baru, Kota Medan', 'https://facebook.com/ffn43', 'https://instagram.com/ffn43', 'Sistem Informasi Pelindo', 'Sistem Informasi Pelindo', 'Sistem Informasi Pelindo');

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
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_role`, `username`, `password`, `password_reset_key`, `first_name`, `last_name`, `email`, `phone`, `photo`, `activated`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$05$OA.OoeNHoEkbGGKazYqPU.UOaI5jmgro8x2pRSV56ClTWlDf0EEn2', '', 'SISTEM', 'ADMINISTRATOR', 'admin@administrator.com', '082370382008', '1625761991343.jpg', 1, '2021-07-08 21:31:06', '2021-07-08 23:53:53', NULL),
(2, 2, 'member', '$2y$05$8GdJw3BVbmhN6x2t0MNise7O0xqLMCNAN1cmP6fkhy0DZl4SxB5iO', '', 'Cabang Brandan', 'Kota', 'fikihfirmansyah43@gmail.com', '082370382008', '1625763396205.jpg', 1, '2021-07-08 23:56:50', '2021-07-08 23:53:53', NULL),
(5, 2, 'fikihfirmansyah43@qmail.id', '$2y$05$4GwizExaZIQivMmh7Uc1BOwe7cz177WlhqVql4BDUNuvwzO3P/UHC', NULL, '', '', 'fikihfirmansyah43@qmail.id', '', '', 0, NULL, '2021-07-08 23:58:01', NULL),
(6, 2, 'admin@example.com', '$2y$05$K3wqgV6fFH.NCN7RZMgDIOGCchTm5iaUvVzuYEUvl6kbQ8uhL3HD2', NULL, '', '', 'admin@example.com', '', '', 0, NULL, '2021-07-08 23:58:37', NULL),
(7, 2, 'admin@admin.com', '$2y$05$ZLSn1MpCCamJkL6RodeAaOv9gyp1X0ChG7WtSyBKlrU37Kdnhpmm2', NULL, '', '', 'admin@admin.com', '', '', 0, NULL, '2021-07-09 00:00:19', NULL),
(8, 2, 'fikihfirmansyah43@gmail.com', '$2y$05$CfKy1rUtFbHwHlWCvByISOEick3TlpLh7mH6TgCcR8LwfxxjJuL9W', NULL, '', '', 'fikihfirmansyah43@gmail.com', '', '', 0, NULL, '2021-07-09 00:00:47', NULL),
(9, 2, 'united-erasmus@usu.ac.id', '$2y$05$4KMMvliPpmjJqfcRB/bgVOBoXIcF.ZJA2/CtPPjU717gsHxvGoHJ2', NULL, '', '', 'united-erasmus@usu.ac.id', '', '', 0, NULL, '2021-07-09 00:01:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

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
