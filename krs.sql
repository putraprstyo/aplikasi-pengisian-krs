-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2021 at 04:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krs`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `prodi` varchar(45) NOT NULL,
  `fakultas` varchar(45) NOT NULL,
  `tmptlhr` varchar(45) NOT NULL,
  `tgllhr` date NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `provinsi` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `fakultas`, `tmptlhr`, `tgllhr`, `alamat`, `kota`, `provinsi`, `password`, `role`) VALUES
(202020, 'Mail', 'Teknologi Informasi', 'Ilmu Komputer', 'Balikpapan', '2021-05-10', 'Jl. Bebek Goreng', 'Balikpapan', 'Kaltim', '$2y$10$5C4DfhEROEJbx4US.F87A..6Pgn0WF3SGd1usvV9lsE87dsd5czBK', 'admin'),
(1912013, 'Putra Prasetyo', 'Teknologi Informasi', 'Ilmu Komputer', 'Balikpapan', '2021-06-08', 'Jl BDS', 'Balikpapan', 'Kaltim', '$2y$10$ViquzQjMP3U95mJdeE3lfOeaWnO/i2o0z934g84ZDH7GrjgVeOX7i', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `idmk` int(11) NOT NULL,
  `mk` varchar(45) NOT NULL,
  `prodi` varchar(45) NOT NULL,
  `fakultas` varchar(45) NOT NULL,
  `sks` int(45) NOT NULL,
  `semester_mk` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`idmk`, `mk`, `prodi`, `fakultas`, `sks`, `semester_mk`) VALUES
(12, 'Aljabar dan LInear', 'Teknologi Informasi', 'Ilmu Komputer', 3, 4),
(13, 'Bahasa Inggris', 'Teknologi Informasi', 'Ilmu Komputer', 2, 4),
(14, 'bhs indo', 'Teknologi Informasi', 'Ilmu Komputer', 9, 4),
(15, 'Komunikasi Data', 'Teknologi Informasi', 'Ilmu Komputer', 3, 4),
(16, 'Big Data', 'Teknologi Informasi', 'Ilmu Komputer', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mengambil`
--

CREATE TABLE `mengambil` (
  `id` int(11) NOT NULL,
  `nim` varchar(45) NOT NULL,
  `idmk` int(45) NOT NULL,
  `tahun_akademik` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `kelas` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mengambil`
--

INSERT INTO `mengambil` (`id`, `nim`, `idmk`, `tahun_akademik`, `semester`, `kelas`, `status`) VALUES
(22, '1912013', 12, '2021', '4', 'tib2a', 'Sudah Di Setujui'),
(23, '1912013', 13, '2021', '4', 'tib2a', 'Sudah Di Setujui'),
(24, '1912013', 14, '2021', '4', 'tib2a', 'Sudah Di Setujui'),
(25, '1912013', 15, '2021', '4', 'tib2a', 'Sudah Di Setujui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`idmk`);

--
-- Indexes for table `mengambil`
--
ALTER TABLE `mengambil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `idmk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mengambil`
--
ALTER TABLE `mengambil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
