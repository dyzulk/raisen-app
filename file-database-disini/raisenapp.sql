-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 04, 2024 at 04:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raisenapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` char(9) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `jurusan` varchar(64) NOT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(1, '043040023', 'Budi Yanto', 'budi@yanto.com', 'Teknik Informatika', '59d489e079fb9.jpg'),
(2, '043040001', 'Doddy Ferdiansyah', 'doy@gmail.com', 'Teknik Mesin', 'doddy.jpg'),
(22, '023040123', 'Erik', 'erik@gmail.com', 'Teknik Industri', 'erik.jpg'),
(23, '043040321', 'Rommy Fauzi', 'rommy@gmail.com', 'Teknik Planologi', 'rommy.jpg'),
(25, '033040023', 'Fajar Darmawan ', 'fajar@yahoo.com', 'Teknik Informatika', 'fajar.jpg'),
(31, '113040321', 'Ferry Mulyanto', 'ferry@yahoo.com', 'Manajemen', '59d461fcbadf7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(13) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `email`, `alamat`) VALUES
('pel-23122970', 'Muhammad Herdy Iskandar', 'dyzulkdeveloper@gmail.com', 'Tenajar Lor - Kertasemaya - Indramayu '),
('pel-23123027', 'Haji Sodri', 'haji@sodri', 'Duri Kosambi '),
('pel-23123029', 'Badak', 'badak@b', 'Sumatera '),
('pel-23123037', 'Bote', 'bote@b', 'Bima'),
('pel-23123049', 'Haji mali', 'herdy2231120@itpln.ac.id', 'Tepung '),
('pel-23123052', 'Destiana Safitri', 'desti@dyzulk.com', 'Cengkareng - Jakarta Barat - Jakarta'),
('pel-23123056', 'Salsa', 'salsa@sal', 'Bima'),
('pel-23123071', 'Alpin', 'alpin@a', 'Jakarta Timur '),
('pel-23123074', 'Iwa Garniwa', 'iwa@garniwa', 'Jakarta '),
('pel-23123086', 'Uswatun Nisa', 'herdy2231120@itpln.ac.id', 'Bima NTB'),
('pel-23123089', 'Valentina', 'valentina@monton.com', 'Land Of Dawn');

-- --------------------------------------------------------

--
-- Table structure for table `role_id`
--

CREATE TABLE `role_id` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_id`
--

INSERT INTO `role_id` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama`, `alamat`, `image`, `role_id`, `is_active`, `date_created`) VALUES
('1', 'admin', '$2y$10$0QXCoCKUXxq9z4H4G2dH7ONr3TrCEWB5xZ0ySAyftkh0t.FOiexjK', 'Admin', '', '', 1, 1, 1703958816),
('2', 'desti', '$2y$10$0QXCoCKUXxq9z4H4G2dH7ONr3TrCEWB5xZ0ySAyftkh0t.FOiexjK', 'Destiana Safitri', '', '', 2, 1, 1703958816),
('pel-23123060', 'dyzulkdeveloper@gmail.com', '$2y$10$H.phSTGUbeKP1QmYn4EVuuRy2RSLZjbJsQ75smhh2lDS7F6J33TAO', 'Muhammad Herdy Iskandar', 'Jawa Barat ', 'default.png', 2, 1, 1703958816);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_id`
--
ALTER TABLE `role_id`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `role_id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
