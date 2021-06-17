-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 09:29 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_p_mobile`
--
CREATE DATABASE IF NOT EXISTS `db_p_mobile` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_p_mobile`;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `mhs_id` int(11) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `hobi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mhs_id`, `npm`, `nama`, `jenis_kelamin`, `prodi`, `hobi`) VALUES
(13, '1810631170184', 'Firhan Hardiansyah', 'Laki - Laki', 'Teknik Informatika', 'Membaca Buku, Belajar Pemrograman'),
(22, '1810631170185', 'Asep', 'Laki - Laki', 'Teknik Informatika', 'Membaca Buku'),
(27, '1810631170186', 'Steven', 'Laki - Laki', 'Teknik Informatika', 'Membaca Buku, Belajar Pemrograman'),
(28, '1810631170187', 'John Doe', 'Laki - Laki', 'Teknik Informatika', 'Belajar Pemrograman'),
(30, '123456', 'Test1', 'Laki - Laki', 'Teknik Informatika', 'Membaca Buku, Belajar Pemrograman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mhs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
