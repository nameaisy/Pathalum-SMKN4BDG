-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 01:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathalum`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(15) NOT NULL,
  `id_users` int(15) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_masuk` varchar(10) DEFAULT NULL,
  `tahun_lulus` varchar(10) DEFAULT NULL,
  `no_ijazah` varchar(50) DEFAULT NULL,
  `no_skhun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `id_users`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_telepon`, `jurusan`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`) VALUES
(1, 2, 'Laki-laki', 'PH Pride', 'Bandung', '2000-10-30', '08123456789', 'Rekayasa Perangkat Lunak', '2019', '2022', 'xxxxxxxxxxx', 'xxxxxxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'alumni@alumni', 'alumni', 'alumni rpl 3', 'c52c830f927fe3c895a5499defa8b6a078d701b7', 'alumni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
