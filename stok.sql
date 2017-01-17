-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2017 pada 12.56
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
(9, 'Kasur Busa', 90000, 40000, 8, 'Furniture');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sale`
--

CREATE TABLE `sale` (
  `NO_FACK` int(11) NOT NULL,
  `DATE_FACK` date NOT NULL,
  `IDCARD` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PHOTO` varchar(320) NOT NULL,
  `COUNT` int(11) NOT NULL,
  `IDITEM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sale`
--

INSERT INTO `sale` (`NO_FACK`, `DATE_FACK`, `IDCARD`, `NAME`, `PHOTO`, `COUNT`, `IDITEM`) VALUES
(13, '0000-00-00', '536363737373', 'Andong ', 'Jurina_17.jpg', 0, 4),
(14, '0000-00-00', '684741921201', 'Sammy Krispatih', 'Jurina_8.jpg', 0, 4),
(15, '0000-00-00', '72193112212', 'Anita Rahma', 'Jurina_15.jpg', 0, 7),
(16, '0000-00-00', '111223444', 'Amar Fadil', 'Jurina_35.jpg', 0, 9);

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
  MODIFY `ITEM_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `NO_FACK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
