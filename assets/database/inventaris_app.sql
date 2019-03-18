-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2019 at 05:14 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `id_dana` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dana`
--

CREATE TABLE `dana` (
  `id` varchar(3) NOT NULL,
  `nama_pendana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluar_barang`
--

CREATE TABLE `keluar_barang` (
  `id` varchar(15) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `id_lokasi` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `operator` varchar(16) NOT NULL,
  `peminjam` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_pj` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masuk_barang`
--

CREATE TABLE `masuk_barang` (
  `id` varchar(5) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `operator` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `no_tlp`, `status`) VALUES
('admin', '$2y$10$af.AnifBqSx/RRagEFgSV.OKNjLucEgCEPrYNiRyj/hbH6cliTqlu', 'admin', '+6281289465330', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_dana` (`id_dana`),
  ADD KEY `id_dana_2` (`id_dana`);

--
-- Indexes for table `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_barang` (`id_barang`,`id_lokasi`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_barang_2` (`id_barang`),
  ADD KEY `operator` (`operator`,`peminjam`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pj` (`id_pj`),
  ADD KEY `id_pj_2` (`id_pj`);

--
-- Indexes for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`),
  ADD KEY `operator` (`operator`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
