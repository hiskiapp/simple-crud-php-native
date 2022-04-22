-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 22, 2022 at 08:44 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `utspwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jml_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama`, `harga`, `gambar`, `jml_stok`) VALUES
(3, 'Makanan', 1000, 'assets/images/Photo on 04-04-22 at 15.31.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `peran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `nama`, `email`, `password`, `telp`, `peran`) VALUES
(5, 'Hiskia', 'admin@hiskia.app', '$2y$10$CDEZO1mCXq.RVspVNZ2Bzef0xFxEE.u5aM219ShqrYIXjzsudsdWS', '081234567890', 'Director');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
