-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 04:57 AM
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
(1, 3, 2, 'admin1', 123, 'bts-21 (1).jpg', 'Laki-Laki', '0000-00-00 00:00:00', '2020-01-24 00:00:00'),
(2, 22, 8, 'r', 10000, 'card-1.png', 'Laki-Laki', '2020-01-24 00:00:00', '2020-01-26 00:00:00'),
(3, 23, 1, 'ssss', 1333, 'card-1.png', '', '2020-01-24 00:00:00', '2020-01-29 00:00:00');

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
(6, 'avvvvvvvvvvvv', 'avvvvvvvv', 'ac', 'https://www.youtube.com/embed/2-fy-Ad3rgg', 'link', '2020-01-24'),
(7, 'aaa', 'iiiiiii', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', 'file', '2020-01-24'),
(11, 'aaaaa', 'aaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Jawaban soal.docx', 'file', '2020-01-28'),
(12, 'q', 'q', 'q', 'https://www.youtube.com/embed/2-fy-Ad3rgg', 'link', '2020-01-28'),
(15, 'oo', 'llo', 'oaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Pedoman-Kebutuhan-Penguasaan-Teknik-Berbasis-Industri-Aplikasi-dan-Pengembang-Permainan.pdf', 'file', '2020-01-28');

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
(4, 11, 1, 'assaaaaa', 12, 'card-1.png', 'Perempuan', '2020-01-21 00:00:00', '2020-01-24 00:00:00'),
(5, 26, 9, 'qqqqq', 1, '56397b43-0ccd-4a0c-81eb-570e0963f11e.jpg', 'Laki-Laki', '2020-01-24 00:00:00', '2020-01-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_score_generalhrd`
--

CREATE TABLE `tabel_score_generalhrd` (
  `id_score_generalHrd` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `poin` int(20) NOT NULL,
  `nilai` int(15) NOT NULL,
  `tanggal_training` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_score_generalhrd_detail`
--

CREATE TABLE `tabel_score_generalhrd_detail` (
  `id_score_generalHrd_detail` int(11) NOT NULL,
  `id_score_generalHrd` int(11) NOT NULL,
  `coc` int(11) NOT NULL,
  `pkb_cab` int(11) NOT NULL,
  `perperus` int(11) NOT NULL,
  `tanggal_training` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_score_quality`
--

CREATE TABLE `tabel_score_quality` (
  `id_score_quality` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `poin` int(15) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal_training` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_score_quality`
--

INSERT INTO `tabel_score_quality` (`id_score_quality`, `id_operator`, `poin`, `nilai`, `tanggal_training`) VALUES
(1, 5, 123, 2147, '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_score_quality_detail`
--

CREATE TABLE `tabel_score_quality_detail` (
  `id_score_quality_detail` int(11) NOT NULL,
  `id_score_quality` int(11) NOT NULL,
  `fss` int(11) NOT NULL,
  `gmp` int(11) NOT NULL,
  `halal` int(11) NOT NULL,
  `tanggal_training` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_score_quality_detail`
--

INSERT INTO `tabel_score_quality_detail` (`id_score_quality_detail`, `id_score_quality`, `fss`, `gmp`, `halal`, `tanggal_training`) VALUES
(1, 1, 89, 90, 90, '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_score_safety`
--

CREATE TABLE `tabel_score_safety` (
  `id_score_safety` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `poin` int(20) NOT NULL,
  `nilai` int(15) NOT NULL,
  `tanggal_training` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_score_safety`
--

INSERT INTO `tabel_score_safety` (`id_score_safety`, `id_operator`, `poin`, `nilai`, `tanggal_training`) VALUES
(4, 5, 34444, 325, '2020-01-31'),
(5, 4, 677777, 89, '2020-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_score_safety_detail`
--

CREATE TABLE `tabel_score_safety_detail` (
  `id_score_safety_detail` int(11) NOT NULL,
  `id_score_safety` int(11) NOT NULL,
  `smk3` int(11) NOT NULL,
  `ea_hira` int(11) NOT NULL,
  `movement_forklift` int(11) NOT NULL,
  `confined_space` int(11) NOT NULL,
  `loto` int(11) NOT NULL,
  `apd` int(11) NOT NULL,
  `bbs` int(11) NOT NULL,
  `fire_fighting` int(11) NOT NULL,
  `wah` int(11) NOT NULL,
  `environment` int(11) NOT NULL,
  `p3k` int(11) NOT NULL,
  `tanggal_training` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_score_safety_detail`
--

INSERT INTO `tabel_score_safety_detail` (`id_score_safety_detail`, `id_score_safety`, `smk3`, `ea_hira`, `movement_forklift`, `confined_space`, `loto`, `apd`, `bbs`, `fire_fighting`, `wah`, `environment`, `p3k`, `tanggal_training`) VALUES
(3, 5, 56, 78, 90, 89, 99, 99, 89, 87, 78, 90, 78, '2020-02-03');

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
(1, 2, 1, 'supervisor1', 11111, 'card-1.png', 'Laki-Laki', '2020-01-09 00:00:00', '2020-01-21 00:00:00'),
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
(3, '123', '1234', 'admin'),
(9, '122', '1222', 'supervisor'),
(11, '12', '12', 'operator'),
(22, '10000', 'rrr', 'admin'),
(23, '1333', 'v', 'admin'),
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
-- Indexes for table `tabel_score_generalhrd`
--
ALTER TABLE `tabel_score_generalhrd`
  ADD PRIMARY KEY (`id_score_generalHrd`),
  ADD KEY `id_operator` (`id_operator`);

--
-- Indexes for table `tabel_score_generalhrd_detail`
--
ALTER TABLE `tabel_score_generalhrd_detail`
  ADD PRIMARY KEY (`id_score_generalHrd_detail`),
  ADD KEY `id_score_generalHrd` (`id_score_generalHrd`);

--
-- Indexes for table `tabel_score_quality`
--
ALTER TABLE `tabel_score_quality`
  ADD PRIMARY KEY (`id_score_quality`),
  ADD KEY `id_operator` (`id_operator`);

--
-- Indexes for table `tabel_score_quality_detail`
--
ALTER TABLE `tabel_score_quality_detail`
  ADD PRIMARY KEY (`id_score_quality_detail`),
  ADD KEY `id_score_quality` (`id_score_quality`);

--
-- Indexes for table `tabel_score_safety`
--
ALTER TABLE `tabel_score_safety`
  ADD PRIMARY KEY (`id_score_safety`),
  ADD KEY `id_operator` (`id_operator`);

--
-- Indexes for table `tabel_score_safety_detail`
--
ALTER TABLE `tabel_score_safety_detail`
  ADD PRIMARY KEY (`id_score_safety_detail`),
  ADD KEY `id_score_safety` (`id_score_safety`);

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
  MODIFY `id_materi_generalhrd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_materi_quality`
--
ALTER TABLE `tabel_materi_quality`
  MODIFY `id_materi_quality` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_materi_safety`
--
ALTER TABLE `tabel_materi_safety`
  MODIFY `id_materi_safety` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_materi_technical`
--
ALTER TABLE `tabel_materi_technical`
  MODIFY `id_materi_technical` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_operator`
--
ALTER TABLE `tabel_operator`
  MODIFY `id_operator` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_score_generalhrd`
--
ALTER TABLE `tabel_score_generalhrd`
  MODIFY `id_score_generalHrd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_score_generalhrd_detail`
--
ALTER TABLE `tabel_score_generalhrd_detail`
  MODIFY `id_score_generalHrd_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_score_quality`
--
ALTER TABLE `tabel_score_quality`
  MODIFY `id_score_quality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_score_quality_detail`
--
ALTER TABLE `tabel_score_quality_detail`
  MODIFY `id_score_quality_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_score_safety`
--
ALTER TABLE `tabel_score_safety`
  MODIFY `id_score_safety` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_score_safety_detail`
--
ALTER TABLE `tabel_score_safety_detail`
  MODIFY `id_score_safety_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `tabel_score_generalhrd`
--
ALTER TABLE `tabel_score_generalhrd`
  ADD CONSTRAINT `tabel_score_generalhrd_ibfk_1` FOREIGN KEY (`id_operator`) REFERENCES `tabel_operator` (`id_operator`);

--
-- Constraints for table `tabel_score_generalhrd_detail`
--
ALTER TABLE `tabel_score_generalhrd_detail`
  ADD CONSTRAINT `tabel_score_generalhrd_detail_ibfk_1` FOREIGN KEY (`id_score_generalHrd`) REFERENCES `tabel_score_generalhrd` (`id_score_generalHrd`);

--
-- Constraints for table `tabel_score_quality`
--
ALTER TABLE `tabel_score_quality`
  ADD CONSTRAINT `tabel_score_quality_ibfk_1` FOREIGN KEY (`id_operator`) REFERENCES `tabel_operator` (`id_operator`);

--
-- Constraints for table `tabel_score_quality_detail`
--
ALTER TABLE `tabel_score_quality_detail`
  ADD CONSTRAINT `tabel_score_quality_detail_ibfk_1` FOREIGN KEY (`id_score_quality`) REFERENCES `tabel_score_quality` (`id_score_quality`);

--
-- Constraints for table `tabel_score_safety`
--
ALTER TABLE `tabel_score_safety`
  ADD CONSTRAINT `tabel_score_safety_ibfk_1` FOREIGN KEY (`id_operator`) REFERENCES `tabel_operator` (`id_operator`);

--
-- Constraints for table `tabel_score_safety_detail`
--
ALTER TABLE `tabel_score_safety_detail`
  ADD CONSTRAINT `tabel_score_safety_detail_ibfk_1` FOREIGN KEY (`id_score_safety`) REFERENCES `tabel_score_safety` (`id_score_safety`);

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
