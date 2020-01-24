-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 09:43 AM
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
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `foto` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `waktu_tambah` datetime NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `id_user`, `id_jabatan`, `nama`, `nik`, `foto`, `jenis_kelamin`, `waktu_tambah`, `waktu_edit`) VALUES
(1, 3, 2, 'admin1', 123, '', 'Laki-Laki', '0000-00-00 00:00:00', '2020-01-24 00:00:00'),
(2, 22, 8, 'r', 0, 'card-1.png', 'Laki-Laki', '2020-01-24 00:00:00', '2020-01-24 00:00:00'),
(3, 23, 1, 'ssss', 0, 'card-1.png', 'Perempuan', '2020-01-24 00:00:00', '2020-01-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jabatan`
--

CREATE TABLE `tabel_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_jabatan`
--

INSERT INTO `tabel_jabatan` (`id_jabatan`, `nama`) VALUES
(1, 'Body Welder Operator'),
(2, 'Can o mat operator'),
(3, 'End o mat operator'),
(4, 'Palleteizer operator'),
(5, 'Area engineer technician'),
(6, 'Admin sap'),
(7, 'Production spv'),
(8, 'Area engineer spv'),
(9, 'Can making manager');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_materi_generalhrd`
--

CREATE TABLE `tabel_materi_generalhrd` (
  `id_materi_generalhrd` int(11) NOT NULL,
  `kategori_materi` varchar(100) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `keterangan_materi` text NOT NULL,
  `file_materi` text NOT NULL,
  `tipe` enum('link','file') NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_materi_quality`
--

CREATE TABLE `tabel_materi_quality` (
  `id_materi_quality` int(11) NOT NULL,
  `kategori_materi` varchar(100) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `keterangan_materi` text NOT NULL,
  `file_materi` text NOT NULL,
  `tipe` enum('link','file') NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_materi_safety`
--

CREATE TABLE `tabel_materi_safety` (
  `id_materi_safety` int(11) NOT NULL,
  `kategori_materi` varchar(100) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `keterangan_materi` text NOT NULL,
  `file_materi` text NOT NULL,
  `tipe` enum('link','file') NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_materi_safety`
--

INSERT INTO `tabel_materi_safety` (`id_materi_safety`, `kategori_materi`, `judul_materi`, `keterangan_materi`, `file_materi`, `tipe`, `tanggal_upload`) VALUES
(6, 'a', 'a', 'a', 'https://www.youtube.com/embed/2-fy-Ad3rgg', 'link', '2020-01-24'),
(7, 'aaa', 'aaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Result Assassement Quality 1.pdf', 'file', '2020-01-24'),
(8, 'q', 'q', 'q', '', 'file', '2020-01-24'),
(9, 'w', 'w', 'w', '', 'file', '2020-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_materi_technical`
--

CREATE TABLE `tabel_materi_technical` (
  `id_materi_technical` int(11) NOT NULL,
  `kategori_materi` varchar(100) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `keterangan_materi` text NOT NULL,
  `file_materi` text NOT NULL,
  `tipe` enum('link','file') NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_operator`
--

CREATE TABLE `tabel_operator` (
  `id_operator` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `foto` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `waktu_tambah` datetime NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_operator`
--

INSERT INTO `tabel_operator` (`id_operator`, `id_user`, `id_jabatan`, `nama`, `nik`, `foto`, `jenis_kelamin`, `waktu_tambah`, `waktu_edit`) VALUES
(4, 11, 1, 'assaaaaa', 12, 'DJ0BYCfVYAAPUEd.jpg', 'Perempuan', '2020-01-21 00:00:00', '2020-01-24 00:00:00'),
(5, 26, 9, 'qqqqq', 1, '56397b43-0ccd-4a0c-81eb-570e0963f11e.jpg', 'Laki-Laki', '2020-01-24 00:00:00', '2020-01-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_supervisor`
--

CREATE TABLE `tabel_supervisor` (
  `id_supervisor` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `foto` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `waktu_tambah` datetime NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_supervisor`
--

INSERT INTO `tabel_supervisor` (`id_supervisor`, `id_user`, `id_jabatan`, `nama`, `nik`, `foto`, `jenis_kelamin`, `waktu_tambah`, `waktu_edit`) VALUES
(1, 2, 1, 'supervisor1', 11111, 'flat,1000x1000,075,f.u3.jpg', 'Laki-Laki', '2020-01-09 00:00:00', '2020-01-21 00:00:00'),
(2, 9, 9, 'aaaaaa', 122, '51436135_2551525554862691_8785967233080754176_n.jpg', 'Laki-Laki', '2020-01-20 00:00:00', '0000-00-00 00:00:00');

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
(2, '11111', '11111', 'supervisor'),
(3, '123', '123', 'admin'),
(9, '122', '1222', 'supervisor'),
(11, '12', '12', 'operator'),
(12, 'a', 'a', 'admin'),
(13, 'a', 'a', 'admin'),
(14, 'a', 'aa', 'admin'),
(15, 'a', 'aa', 'admin'),
(16, 'a', 'aa', 'admin'),
(17, 'a', 'aa', 'admin'),
(18, 'a', 'aa', 'admin'),
(19, 'a', 'aa', 'admin'),
(20, 'a', 'a', 'admin'),
(21, 'a', 'a', 'admin'),
(22, 'r', 'rrr', 'admin'),
(23, 'v', 'v', 'admin'),
(24, 'a', 'a', 'operator'),
(25, 'a', 'a', 'operator'),
(26, 'aaaa', 'aaaa', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tabel_jabatan`
--
ALTER TABLE `tabel_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tabel_materi_generalhrd`
--
ALTER TABLE `tabel_materi_generalhrd`
  ADD PRIMARY KEY (`id_materi_generalhrd`);

--
-- Indexes for table `tabel_materi_quality`
--
ALTER TABLE `tabel_materi_quality`
  ADD PRIMARY KEY (`id_materi_quality`);

--
-- Indexes for table `tabel_materi_safety`
--
ALTER TABLE `tabel_materi_safety`
  ADD PRIMARY KEY (`id_materi_safety`);

--
-- Indexes for table `tabel_materi_technical`
--
ALTER TABLE `tabel_materi_technical`
  ADD PRIMARY KEY (`id_materi_technical`);

--
-- Indexes for table `tabel_operator`
--
ALTER TABLE `tabel_operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tabel_supervisor`
--
ALTER TABLE `tabel_supervisor`
  ADD PRIMARY KEY (`id_supervisor`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_jabatan`
--
ALTER TABLE `tabel_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_materi_generalhrd`
--
ALTER TABLE `tabel_materi_generalhrd`
  MODIFY `id_materi_generalhrd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_materi_quality`
--
ALTER TABLE `tabel_materi_quality`
  MODIFY `id_materi_quality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_materi_safety`
--
ALTER TABLE `tabel_materi_safety`
  MODIFY `id_materi_safety` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_materi_technical`
--
ALTER TABLE `tabel_materi_technical`
  MODIFY `id_materi_technical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_operator`
--
ALTER TABLE `tabel_operator`
  MODIFY `id_operator` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_supervisor`
--
ALTER TABLE `tabel_supervisor`
  MODIFY `id_supervisor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD CONSTRAINT `tabel_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`),
  ADD CONSTRAINT `tabel_admin_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tabel_jabatan` (`id_jabatan`);

--
-- Constraints for table `tabel_operator`
--
ALTER TABLE `tabel_operator`
  ADD CONSTRAINT `tabel_operator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`),
  ADD CONSTRAINT `tabel_operator_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tabel_jabatan` (`id_jabatan`);

--
-- Constraints for table `tabel_supervisor`
--
ALTER TABLE `tabel_supervisor`
  ADD CONSTRAINT `tabel_supervisor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`),
  ADD CONSTRAINT `tabel_supervisor_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tabel_jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
