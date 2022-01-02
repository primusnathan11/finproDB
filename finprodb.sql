-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 01:30 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finprodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `telp_admin` varchar(15) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(255) NOT NULL,
  `alamat_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `telp_dokter` varchar(15) NOT NULL,
  `email_dokter` varchar(50) NOT NULL,
  `pass_dokter` varchar(255) NOT NULL,
  `alamat_dokter` varchar(255) NOT NULL,
  `sertifikat_dokter` varchar(255) NOT NULL,
  `sertif_approval` enum('Pending','Rejected','Approved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `telp_dokter`, `email_dokter`, `pass_dokter`, `alamat_dokter`, `sertifikat_dokter`, `sertif_approval`) VALUES
(1, 'Dr. Tirta', '08129824192', 'tirta@gmail.com', 'tirta', 'Jl. ijen', '', 'Pending'),
(7, 'Dr. Tes', '08124013943', 'drprimus@gmail.com', 'drprimus', 'jl. yamur', 'Capture11.PNG', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `petshop`
--

CREATE TABLE `petshop` (
  `id_petshop` int(11) NOT NULL,
  `nama_petshop` varchar(100) NOT NULL,
  `telp_petshop` varchar(15) NOT NULL,
  `email_petshop` varchar(50) NOT NULL,
  `pass_petshop` varchar(255) NOT NULL,
  `alamat_petshop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petshop`
--

INSERT INTO `petshop` (`id_petshop`, `nama_petshop`, `telp_petshop`, `email_petshop`, `pass_petshop`, `alamat_petshop`) VALUES
(1, 'Pussy Petshop', '081234124925', 'pussypetshop@gmail.com', 'pussy', 'jl. sulfat'),
(2, 'Tes Petshop', '0812410349', 'tespetshop@gmail.com', 'tespetshop', 'jl. tes');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `id_petshop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok`, `gambar_produk`, `id_petshop`) VALUES
(4, 'Whiskas', 80000, 299, 'EcqyBAeXoAE2qmd.jpg', 1),
(5, 'Royal Canin', 10000, 50, '81aTawcGdmL__AC_SL1500_.jpg', 1),
(7, 'Grooming', 10000, 99, '5060863-arthur-morgan-red-dead-redemption-21.jpg', 1),
(8, 'Makanan Anjing', 35000, 999, '12213881.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `telp_user` varchar(15) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `alamat_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `telp_user`, `email_user`, `pass_user`, `alamat_user`) VALUES
(1, 'Primus Nathan Orvala', '081333351987', 'nathan.primus77@gmail.com', 'primus', 'Jl. Sawojajar'),
(2, 'Barry Allen', '0821421924', 'barry_allen@gmail.com', 'barry', 'jl. madiun'),
(3, 'user3', '08124902941', 'user3@gmail.com', 'user3', 'jl. jl99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `petshop`
--
ALTER TABLE `petshop`
  ADD PRIMARY KEY (`id_petshop`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_petshop` (`id_petshop`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `petshop`
--
ALTER TABLE `petshop`
  MODIFY `id_petshop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_petshop`) REFERENCES `petshop` (`id_petshop`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
