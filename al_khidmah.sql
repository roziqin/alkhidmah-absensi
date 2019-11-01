-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 07:52 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_khidmah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `absensi_id` int(5) NOT NULL,
  `absensi_peserta` int(5) NOT NULL,
  `absensi_tgl` date NOT NULL,
  `absensi_waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`absensi_id`, `absensi_peserta`, `absensi_tgl`, `absensi_waktu`) VALUES
(1, 1, '2019-11-01', '13:09:57'),
(2, 1, '2019-11-01', '13:10:42'),
(3, 1, '2019-11-01', '13:11:37'),
(4, 1, '2019-11-01', '13:26:05'),
(5, 1, '2019-11-01', '13:27:21'),
(6, 1, '2019-11-01', '13:28:10'),
(7, 1, '2019-11-01', '13:28:32'),
(8, 1, '2019-11-01', '13:28:43'),
(9, 3, '2019-11-01', '13:30:16'),
(10, 3, '2019-11-01', '13:30:59'),
(11, 3, '2019-11-01', '13:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `log_id` int(20) NOT NULL,
  `user` int(10) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`log_id`, `user`, `login`, `logout`) VALUES
(310, 1, '2019-09-19 11:07:25', '0000-00-00 00:00:00'),
(311, 2, '2019-09-22 13:50:45', '0000-00-00 00:00:00'),
(312, 2, '2019-09-22 15:04:37', '0000-00-00 00:00:00'),
(313, 1, '2019-09-25 18:26:43', '0000-00-00 00:00:00'),
(314, 1, '2019-09-25 18:31:14', '0000-00-00 00:00:00'),
(315, 1, '2019-09-25 18:33:18', '0000-00-00 00:00:00'),
(316, 1, '2019-09-25 18:33:54', '0000-00-00 00:00:00'),
(317, 1, '2019-09-25 18:38:51', '2019-09-25 18:40:34'),
(318, 1, '2019-09-25 18:40:56', '2019-09-25 20:42:10'),
(319, 1, '2019-09-25 20:42:14', '0000-00-00 00:00:00'),
(320, 2, '2019-09-26 11:58:28', '0000-00-00 00:00:00'),
(321, 1, '2019-09-28 10:04:29', '0000-00-00 00:00:00'),
(322, 1, '2019-09-28 10:22:23', '0000-00-00 00:00:00'),
(323, 1, '2019-09-29 21:20:49', '0000-00-00 00:00:00'),
(324, 1, '2019-10-02 10:10:19', '0000-00-00 00:00:00'),
(325, 1, '2019-10-04 10:17:09', '2019-10-06 20:05:35'),
(326, 1, '2019-10-06 20:05:46', '0000-00-00 00:00:00'),
(327, 1, '2019-11-01 10:47:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` int(10) NOT NULL,
  `peserta_barcode` int(50) NOT NULL,
  `peserta_nama` varchar(200) NOT NULL,
  `peserta_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `peserta_barcode`, `peserta_nama`, `peserta_alamat`) VALUES
(1, 1324564, 'Roziqin', 'Malang'),
(3, 123456, 'Tes', 'Kepanjen');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roles_id` int(10) UNSIGNED NOT NULL,
  `roles_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_id`, `roles_name`, `display_name`) VALUES
(1, 'administrator', 'Administrator'),
(2, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`) VALUES
(1, 'Roziqin', 'roziqin', '21232f297a57a5a743894a0e4a801fc3', '1', '0'),
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`),
  ADD UNIQUE KEY `roles_name_unique` (`roles_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `absensi_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `log_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
