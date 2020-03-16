-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 04:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `idmerk` int(2) NOT NULL,
  `namamerk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`idmerk`, `namamerk`) VALUES
(1, 'Toyota'),
(2, 'Honda'),
(3, 'Daihatsu'),
(4, 'Nissan'),
(5, 'Suzuki'),
(7, 'Mitsubishi'),
(10, 'BMW'),
(11, 'Isuzu'),
(12, 'Datsun'),
(13, 'Ferrari'),
(15, 'Ford');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `idmobil` int(3) NOT NULL,
  `idmerk` int(2) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `tahunproduksi` int(4) DEFAULT NULL,
  `platnomer` varchar(15) DEFAULT NULL,
  `kursi` int(2) DEFAULT NULL,
  `tarif` int(6) DEFAULT NULL,
  `lembur` int(6) DEFAULT NULL,
  `norangka` varchar(20) DEFAULT NULL,
  `stmobil` enum('bebas','jalan') DEFAULT 'bebas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idmobil`, `idmerk`, `type`, `tahunproduksi`, `platnomer`, `kursi`, `tarif`, `lembur`, `norangka`, `stmobil`) VALUES
(1, 3, 'Ayla', 2016, 'A 1234 BCD', 5, 270000, 50000, 'A123KGJR', 'jalan'),
(2, 1, 'Agya', 2016, 'B 1122 CD', 5, 280000, 50000, 'A4455GGHT', 'jalan'),
(3, 3, 'Xenia', 2016, 'B 4444 DUT', 8, 350000, 50000, 'AHASDR567JH', 'jalan'),
(4, 3, 'Luxio', 2016, 'B 2233 CD', 8, 350000, 50000, 'AGD556K7', 'jalan'),
(5, 1, 'Avanza', 2016, 'B 1111 AAA', 8, 350000, 50000, 'HIJKLMN123', 'bebas'),
(8, 13, 'Xpander', 2018, 'B 1220 S', 8, 200000, 100000, 'asd', 'jalan'),
(9, 1, 'Sienta lah', 2017, 'B 5013 S', 8, 1000000, 100000, 'kajdklasjldkajs3728', 'jalan');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `idsupir` int(2) NOT NULL,
  `namasupir` varchar(30) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `noktp` varchar(100) DEFAULT NULL,
  `tarif` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`idsupir`, `namasupir`, `tgllahir`, `alamat`, `noktp`, `tarif`) VALUES
(1, 'Bambang', '1980-07-24', 'Pasar Minggu, Jakarta Selatan', '1234455678', 100000),
(3, 'Ade Margono', '1981-03-05', 'Jakarta Barat', '4567123783', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(100) NOT NULL,
  `namapelanggan` varchar(20) DEFAULT NULL,
  `noktp` varchar(20) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tglsewa` date DEFAULT NULL,
  `tglkembali` date DEFAULT NULL,
  `selisih` int(2) DEFAULT '0',
  `idmobil` int(2) DEFAULT NULL,
  `idsupir` int(2) DEFAULT NULL,
  `total` int(10) DEFAULT '0',
  `sttransaksi` enum('mulai','selesai') DEFAULT 'mulai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `namapelanggan`, `noktp`, `nohp`, `alamat`, `tglsewa`, `tglkembali`, `selisih`, `idmobil`, `idsupir`, `total`, `sttransaksi`) VALUES
(1, 'Budi Pangestu', '65437890123', '0812345678', 'Depok', '2016-11-21', '0000-00-00', 0, 3, 3, 0, 'mulai'),
(2, 'Dedi Irawan', '1234455678', '0812345678', 'Jakarta', '2018-12-13', '0000-00-00', 0, 4, 0, 0, 'mulai'),
(3, 'Jamal', '584986794039', '08982000969', 'Jakarta', '2018-11-09', '2018-11-27', 19, 3, 1, 8550000, 'selesai'),
(4, 'Dadang', '12012123131', '081221212121', 'Jalan ', '2019-01-03', '2019-01-04', 2, 9, 1, 2200000, 'selesai'),
(5, 'Tarji', '11412412', '081212848', 'Cikini', '2019-01-01', '2019-01-02', 2, 8, 3, 600000, 'selesai'),
(6, 'asd', '8937498', '23984098230', 'aksdjlksajdlk', '2019-01-10', '0000-00-00', 0, 4, 0, 0, 'mulai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(2) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `stuser` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `stuser`) VALUES
(1, 'admin', 'admin', 1),
(2, 'user1', 'user1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`idmerk`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idmobil`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`idsupir`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `idmerk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `idmobil` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `idsupir` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
