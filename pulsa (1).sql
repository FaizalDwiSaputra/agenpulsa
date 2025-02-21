-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 06:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `telepon_pengguna` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `pass`, `telepon_pengguna`) VALUES
(1, 'faizal', 'faizal01', '081391147864'),
(2, 'admin', '1234', '12');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_provider` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `logo_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_provider`, `nominal`, `harga`, `logo_produk`) VALUES
(1, 'Indosat Ooredo', 5000, 6000, 'indosat-removebg-preview.png'),
(2, 'Indosat Ooredo', 10000, 12000, 'indosat-removebg-preview.png'),
(3, 'Indosat Ooredo', 15000, 16000, 'indosat-removebg-preview.png'),
(4, 'Telkomsel', 10000, 12000, 'telkomsel-removebg-preview.png'),
(5, 'Telkomsel', 15000, 17000, 'telkomsel-removebg-preview.png'),
(6, 'Telkomsel', 20000, 22000, 'telkomsel-removebg-preview.png'),
(7, 'XL', 10000, 11000, 'xl-removebg-preview.png'),
(8, 'XL', 20000, 22000, 'xl-removebg-preview.png'),
(9, 'Smartfreen', 15000, 17000, 'Logo_Smartfren-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `total` int(11) NOT NULL,
  `status_pembelian` varchar(200) NOT NULL,
  `bukti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `id_produk`, `tanggal`, `telepon`, `total`, `status_pembelian`, `bukti`) VALUES
(1, 1, 4, '2024-07-04', '', 12000, '', ''),
(2, 1, 5, '2024-07-06', '081391147864', 17000, 'sudah bayar', 'bg1.jpg'),
(3, 1, 8, '2024-07-06', '081391146864', 22000, 'sudah bayar', 'bg.jpg'),
(4, 1, 6, '2024-07-06', '081391146864', 22000, 'proses', 'bg2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
