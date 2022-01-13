-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 12:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gunungharta`
--

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE `agen` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`id`, `username`, `password`, `level`, `nama`) VALUES
(1, 'dewa', '3b31aae2787818ba209950b2edb35e01', 1, 'Ahmad Dewa'),
(2, 'owner', '72122ce96bfec66e2396d2e25225d70a', 2, 'Owner'),
(9, 'dewa19', '1da8f7627159c675a062b32a7f526963', 1, 'Dewa Fitrah');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `kota_berangkat` varchar(255) NOT NULL,
  `kota_tujuan` varchar(255) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `konfirmasi` int(11) NOT NULL,
  `agen_konfirmasi` varchar(255) NOT NULL,
  `no_kursi` varchar(255) NOT NULL,
  `last_no_kursi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `nama`, `no_hp`, `alamat`, `tanggal`, `kota_berangkat`, `kota_tujuan`, `kode_booking`, `konfirmasi`, `agen_konfirmasi`, `no_kursi`, `last_no_kursi`) VALUES
(52, 'Ahmad Dewa Fitrah', '081251313243', 'Surabaya', '2022-01-06', 'Denpasar', 'Semarang', 'GH-8278138072', 0, '0', '0', '0'),
(54, 'Safila Cahaya Restia', '098172936421', 'Pasuruan', '2022-01-05', 'Surabaya', 'Jakarta', 'GH-1717603529', 1, 'dewa', '0', '0'),
(55, 'Rava Julian', '0871762736123', 'Surabaya', '2022-01-06', 'Denpasar', 'Jakarta', 'GH-7127531036', 0, '0', '0', '0'),
(56, 'Ashraf', '081251313243', 'Malang', '2022-01-06', 'Surabaya', 'Semarang', 'GH-8105699205', 1, 'dewa', '0', '0'),
(57, 'sadsa', '213', '12312', '2022-01-08', 'Semarang', 'Jakarta', 'GH-0764964949', 0, '0', '0', '0'),
(58, 'Ahmad Dewa Fitrah', '081251313243', 'Pasuruan', '2022-01-13', 'Denpasar', 'Surabaya', 'GH-7255019545', 1, '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agen`
--
ALTER TABLE `agen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
