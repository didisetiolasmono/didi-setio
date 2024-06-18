-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 05:20 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw_pernikahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `idAlternatif` int(11) NOT NULL,
  `alternatif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`idAlternatif`, `alternatif`) VALUES
(1, 'Paket B'),
(2, 'Paket C'),
(3, 'Paket D'),
(4, 'Paket A');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `idKriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `jenis` int(11) NOT NULL DEFAULT '1',
  `bobotKriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`idKriteria`, `kriteria`, `jenis`, `bobotKriteria`) VALUES
(1, 'Tempat', 1, 0.3),
(2, 'Fasilitas', 1, 0.4),
(4, 'Makanan dan Minuman', 2, 0.5),
(5, 'Dekorasi', 2, 0.6),
(6, 'Hiburan', 1, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `idp` int(11) NOT NULL,
  `pengaturan` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`idp`, `pengaturan`, `value`) VALUES
(1, 'cf', '60'),
(2, 'sf', '40'),
(3, 'IPK', '5'),
(4, 'Jumlah Tanggungan', '14'),
(5, 'Penghasilan Orangtua', '9'),
(6, 'Semester', '17');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `idNilai` int(11) NOT NULL,
  `idAlternatif` int(11) NOT NULL,
  `idSubkriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `idSubkriteria` int(11) NOT NULL,
  `idKriteria` int(11) NOT NULL,
  `subkriteria` varchar(100) NOT NULL,
  `bobotSubkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`idSubkriteria`, `idKriteria`, `subkriteria`, `bobotSubkriteria`) VALUES
(1, 1, 'Kinandari', 0),
(3, 1, 'Sriwedari', 0),
(5, 1, 'Nirwana', 0),
(6, 1, 'Nismara', 0),
(7, 2, '-', 0),
(8, 2, 'Classic', 0),
(9, 2, 'Standar', 0),
(10, 2, 'Mewah', 0),
(11, 4, 'Menu Camelia', 0),
(12, 4, 'Menu Cendana', 0),
(13, 4, 'Menu Meranti', 0),
(14, 4, 'Menu Mahoni', 0),
(15, 5, '-', 0),
(16, 5, '-', 0),
(17, 5, 'Tema C', 0),
(18, 5, 'Tema B', 0),
(19, 5, 'Tema A', 0),
(20, 4, 'Menu Krisan', 0),
(21, 4, 'Menu Rosella', 0),
(22, 4, 'Menu Galangal', 0),
(23, 4, 'Menu Rosemary', 0),
(24, 4, 'Menu Safron', 0),
(25, 6, 'Orchestra', 0),
(26, 6, 'Wedding DJ', 0),
(27, 6, 'Band', 0),
(28, 5, 'The Trees', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`idAlternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idKriteria`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`idNilai`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`idSubkriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `idAlternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `idNilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `idSubkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
