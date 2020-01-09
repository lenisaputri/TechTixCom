-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 03:03 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techtixcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `jabatan` varchar(60) NOT NULL,
  `status_aktif` enum('ya','tidak') NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `id_user`, `nama`, `nik`, `jabatan`, `status_aktif`, `waktu_edit`) VALUES
(1, 3, 'admin1', 1234567, 'admin', 'ya', '2020-01-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_operator`
--

CREATE TABLE `tabel_operator` (
  `id_operator` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `jabatan` varchar(60) NOT NULL,
  `status_aktif` enum('ya','tidak') NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_operator`
--

INSERT INTO `tabel_operator` (`id_operator`, `id_user`, `nama`, `nik`, `jabatan`, `status_aktif`, `waktu_edit`) VALUES
(1, 1, 'operator1', 1234567, 'operator1', 'ya', '2020-01-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_supervisor`
--

CREATE TABLE `tabel_supervisor` (
  `id_supervisor` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `jabatan` varchar(60) NOT NULL,
  `status_aktif` enum('ya','tidak') NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_supervisor`
--

INSERT INTO `tabel_supervisor` (`id_supervisor`, `id_user`, `nama`, `nik`, `jabatan`, `status_aktif`, `waktu_edit`) VALUES
(1, 2, 'supervisor1', 1234567, 'supervisor', 'ya', '2020-01-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('operator','supervisor','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'operator', 'operator', 'operator'),
(2, 'supervisor', 'supervisor', 'supervisor'),
(3, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_operator`
--
ALTER TABLE `tabel_operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_supervisor`
--
ALTER TABLE `tabel_supervisor`
  ADD PRIMARY KEY (`id_supervisor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD CONSTRAINT `tabel_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`);

--
-- Constraints for table `tabel_operator`
--
ALTER TABLE `tabel_operator`
  ADD CONSTRAINT `tabel_operator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`);

--
-- Constraints for table `tabel_supervisor`
--
ALTER TABLE `tabel_supervisor`
  ADD CONSTRAINT `tabel_supervisor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
