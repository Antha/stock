-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jan 2017 pada 15.45
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `ITEM_CODE` int(11) NOT NULL,
  `ITEM_NAME` varchar(100) NOT NULL,
  `ITEM_SALE` double NOT NULL,
  `ITEM_PRICE` double NOT NULL,
  `ITEM_UNIT` int(11) NOT NULL,
  `ITEM_CATEGORY` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`ITEM_CODE`, `ITEM_NAME`, `ITEM_SALE`, `ITEM_PRICE`, `ITEM_UNIT`, `ITEM_CATEGORY`) VALUES
(3, 'Frozen Elsa', 40000, 20000, 10, 'Komik'),
(4, 'Silver Queen', 18900, 20000, 9, 'Chocolate'),
(5, 'Kasur', 80000, 75000, 3, 'Furniture'),
(6, 'Sepeda', 10000, 20000, 7, 'Kendaraan'),
(7, 'Mobil', 10000, 20000, 4, 'Kendaraan'),
(8, 'Motor', 10000, 25000, 7, 'Kendaraan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sale`
--

CREATE TABLE `sale` (
  `NO_FACK` int(11) NOT NULL,
  `DATE_FACK` date NOT NULL,
  `IDCARD` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `COUNT` int(11) NOT NULL,
  `UNIT_PRICE` double NOT NULL,
  `TOTAL_PRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ITEM_CODE`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`NO_FACK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ITEM_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `NO_FACK` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
