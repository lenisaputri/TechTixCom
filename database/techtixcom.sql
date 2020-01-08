-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 04:29 AM
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
  `nama_admin` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_aktif` enum('ya','tidak') NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_operator`
--

CREATE TABLE `tabel_operator` (
  `id_operator` int(30) NOT NULL,
  `nama_operator` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_aktif` enum('ya','tidak') NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_supervisor`
--

CREATE TABLE `tabel_supervisor` (
  `id_supervisor` int(30) NOT NULL,
  `nama_supervisor` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `status_aktif` enum('ya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tabel_operator`
--
ALTER TABLE `tabel_operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `tabel_supervisor`
--
ALTER TABLE `tabel_supervisor`
  ADD PRIMARY KEY (`id_supervisor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
