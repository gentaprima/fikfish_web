-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 01:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `is_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_product`, `id_users`, `quantity`, `date`, `is_order`) VALUES
(297, 19, 20, 1, '2021-01-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_users`
--

CREATE TABLE `tbl_detail_users` (
  `users_id` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` double NOT NULL,
  `longtitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_users`
--

INSERT INTO `tbl_detail_users` (`users_id`, `tgl_lahir`, `photo`, `jenis_kelamin`, `alamat`, `latitude`, `longtitude`) VALUES
(9, '0000-00-00', '', '', 'jakarta', 0, 0),
(14, '0000-00-00', 'IMG-20200720-WA0049.jpg', '', 'Jl. Bona No.123, RT.5/RW.3, Penggilingan, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13940, Indonesia Kota Jakarta Timur ', -6.2152878084457015, 106.93909976631404),
(15, '0000-00-00', '', '', 'Jl. Tebet Dalam IV No.10, RT.19/RW.1, Tebet Bar., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810, Indonesia Kota Jakarta Selatan ', -6.22482892258954, 106.85143880546093),
(17, '0000-00-00', '', '', 'Jl. Lap. No.50, RT.16/RW.3, Batu Ampar, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13520, Indonesia Kota Jakarta Timur ', -6.279845425079112, 106.85729373246431),
(18, '0000-00-00', '', '', 'Jl. Arabika VI Blok Y7 No.10, RT.10/RW.6, Pd. Kopi, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13460, Indonesia Kota Jakarta Timur ', -6.230132021963849, 106.9434764608741),
(19, '0000-00-00', '', '', 'Jl. Kemang Timur III No.4, RT.5/RW.4, Bangka, Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12730, Indonesia Kota Jakarta Selatan ', -6.2606427155962034, 106.82328935712576),
(20, '0000-00-00', '', '', 'Jl. Teuku Cik Ditiro II No.9, RT.1/RW.2, Gondangdia, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10350, Indonesia Kota Jakarta Pusat ', -6.194561470254568, 106.83778468519449),
(21, '0000-00-00', '', '', 'Jl. Tebet Mas Indah IV No.19, RT.14/RW.2, Tebet Bar., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810, Indonesia Kota Jakarta Selatan ', -6.230273672742992, 106.84843741357327),
(22, '0000-00-00', '', '', '', 0, 0),
(35, '0000-00-00', '', '', 'Jl. Bunga Rampai 4/Gang 2 No.4, RT.11/RW.9, Malaka Jaya, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13460, Indonesia Kota Jakarta Timur ', -6.226082126696109, 106.93492524325848);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ikan`
--

CREATE TABLE `tbl_ikan` (
  `id_ikan` int(11) NOT NULL,
  `nama_ikan` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ikan`
--

INSERT INTO `tbl_ikan` (`id_ikan`, `nama_ikan`, `harga`, `foto`, `deskripsi`, `id_jenis`) VALUES
(8, ' Blue Rim', 650000, 'blue-rim-removebg-preview.png', 'Berat 80gram,  size M, usia 4bulan up, No bocor Warna', 5),
(9, 'Hampala', 250000, 'ikan_hampala-removebg-preview.png', 'Ikan Hampala Beby\r\n\r\nKondisi Sehat\r\nMakan Lancar\r\nIkan Mantul Nih.\r\nDiet : Ikan, Udang\r\nSize : 8-10Cm\r\n\r\nSiap Kirim jabodetabek\r\nPengiriman Ojek Online.', 6),
(10, 'Siamese Fighting', 150000, 'siamese-fightning.png', 'Ikan Siamese Fighting\r\n\r\nKondisi Sehat\r\nMakan Lancar\r\nDiet : Ikan, Udang\r\nSize : 8-10Cm\r\n\r\nSiap Kirim jabodetabek\r\nPengiriman Ojek Online.', 5),
(11, 'Blue', 70000, 'blue.png', 'Ikan Blue\r\n\r\nKondisi Sehat\r\nMakan Lancar\r\nDiet : Ikan, Udang\r\nSize : 8-10Cm\r\n\r\nSiap Kirim jabodetabek\r\nPengiriman Ojek Online.', 5),
(13, 'Avatar', 400000, 'avatar-removebg-preview.png', 'Ikan Blue\r\n\r\nKondisi Sehat\r\nMakan Lancar\r\nDiet : Ikan, Udang\r\nSize : 8-10Cm\r\n\r\nSiap Kirim jabodetabek\r\nPengiriman Ojek Online.', 5),
(14, 'Plakat Royal Blue', 30000, 'plakat_nemo.png', '-- Plakat Royal Blue --\r\nsize : M\r\nMale\r\n4 Bulan', 5),
(15, 'Hm Red Fancy', 35000, 'red-fancy.png', '-- Hm Red Fancy --\r\n\r\nSize M\r\nFemale\r\n5 Bulan\r\n', 5),
(17, 'Green Teror', 75000, 'ikan-green-terror.png', '-- Green Terror --\r\n\r\nSize M\r\nMale \r\n6 Bulan', 6),
(18, 'Red Sneakhead', 125000, 'sneakhead.png', '-- Ikan Red Sneakhead --\r\n\r\nSize M\r\nMale\r\n5 Bulan\r\n\r\n', 6),
(19, 'Peacock Bass', 185000, 'peacock_bass.png', '-- Ikan Peacock Bass --\r\n\r\nSize L\r\nFemale\r\n10 Bulan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `nama_jenis`) VALUES
(5, 'Hias'),
(6, 'Predator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perhitunganproduk`
--

CREATE TABLE `tbl_perhitunganproduk` (
  `id_perhitungan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `full_name`, `email`, `password`, `no_hp`, `role`) VALUES
(9, 'admin', 'admin', 'admin@gmail.com', '$2y$10$zZoJnZ85VlRhIJJipUGyQexxCf0pYOWpdHD5EV5p81vJkeychfReK', '', 2),
(14, 'zahidin', 'Zahidin Nur', 'gentaprima601@gmail.com', '$2y$10$W9.FefyeepQAhm7P12cHFuxdickiJYFk8qhLI6IcZeh9ziur3MRIy', '089669615427', 0),
(15, 'bima1', 'Bima Hariawan', 'bima@gmail.com', '$2y$10$UOjamJS1cjg2MOgj98vZee6bsaeuTZazIXkRkhKntZwThLwKFVjFu', '08958731649', 0),
(17, 'vini', 'vinita sandri', 'vinitasandri22@gmail.com', '$2y$10$TYA8ET7HE3crKnQRLJtcWusKXKn5kZjXlKvRZnHya83QDzjMM3tmu', '8964648161', 0),
(18, 'icad', 'Irsyaditama Amru', 'icad1@gmail.com', '$2y$10$Kg8PDlu3yqoZ55lWE4yZLO0whYFZ/FXy7liNIHVn7l9rGG8ZfmU0O', '08956164848', 0),
(19, 'fikri', 'fikri haditya', 'fikri@gmail.com', '$2y$10$zKQgPG7SlcFOIu3vQIns4e5LevcqILHESRi.DM8F/INmW5eyZu67i', '086464548', 0),
(20, 'fadel', 'Fadel Ramadhan', 'fadel@gmail.com', '$2y$10$9Z1BbfF15zQOexBeM5JTKuMiMWcq7otPyrdxRStrtxNWOAdmgEHRW', '089321558781', 0),
(21, 'hazlan', 'Hazlan Syahnur', 'hazlan1@gmail.com', '$2y$10$RLfZcGDVni1Iw2kGUs9DluYDfHH5vX9l7WTp.E2uFl0TXBnf0JGly', '089655256652', 0),
(22, 'echa', 'echa salsabila', 'eca1@gmail.com', '$2y$10$9IHxfiQ4vXXHtUIcmkhPoumZc5latbj1zwfXHJsFx5b9rZXc0TlWS', '', 0),
(35, 'genta', 'Genta Prima Syahnur', 'gentaprima600@gmail.com', '$2y$10$OcY3UX9tWornkqERXfp7DuJjkXu2b1qsWTmV45Vlc/BHfEg8OLKj2', '089669615426', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id_wishlist`, `id_product`, `id_users`) VALUES
(12, 9, 17),
(17, 11, 19),
(31, 11, 21),
(35, 8, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_courier`
--

CREATE TABLE `tb_courier` (
  `id_kurir` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `courier_name` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `id_wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_courier`
--

INSERT INTO `tb_courier` (`id_kurir`, `username`, `email`, `courier_name`, `password`, `foto`, `phone`, `id_wilayah`) VALUES
(1, 'fikri', 'fikri@gmail.com', 'Fikri Haditya', '$2y$10$Tisliu/5umC25eND.I3T4uqCEh0IbTXNHRW/aWMW2PF5jW1uq9UK2', '', '089669615427', 1),
(2, 'farhan1', 'farhan@gmaill.com', 'Farhan Ali Fauzan', '$2y$10$eJYrQqVEN25FybzE1j59De6OncmlW8UJrUE0.51VLEbkOiqYU3KzC', '', '0928414124', 3),
(6, 'fadel', 'sigitpramono@gmail.com', 'Sigit Pramono', '$2y$10$p7ccAoq33wCQhhMnZDRKg.vM.mHypH5d10OUZ8mXwXJ2cw67klmJW', '', '089512314141', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `number` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `image_payment` varchar(50) NOT NULL,
  `shipping_costs` int(11) NOT NULL,
  `additional_costs` int(11) NOT NULL,
  `status` enum('Sedang Dikemas','Sedang Dikirim','Sudah Diterima','Menunggu Pembayaran','Menunggu Diproses','Dibatalkan','Sedang Diproses','Ditunda','Menunggu Pengiriman') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`number`, `order_id`, `id_cart`, `date_order`, `image_payment`, `shipping_costs`, `additional_costs`, `status`) VALUES
(137, 'ORD-20210110845', 297, '2021-01-10', 'IMG-20201212-WA0017.jpg', 21000, 0, 'Sudah Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_shipping`
--

CREATE TABLE `tb_shipping` (
  `id_shipping` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_courier` int(11) NOT NULL,
  `is_delayed` int(11) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `date_shipping` date NOT NULL,
  `date_received` date NOT NULL,
  `status_shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_shipping`
--

INSERT INTO `tb_shipping` (`id_shipping`, `id_order`, `id_courier`, `is_delayed`, `receiver`, `date_shipping`, `date_received`, `status_shipping`) VALUES
(72, 137, 6, 0, 'fadel', '2021-01-10', '2021-01-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wilayah`
--

CREATE TABLE `tb_wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_wilayah`
--

INSERT INTO `tb_wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'Jakarta Timur'),
(2, 'Jakarta Barat'),
(3, 'Jakarta Selatan'),
(4, 'Jakarta Utara'),
(6, 'Jakarta Pusat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tbl_detail_users`
--
ALTER TABLE `tbl_detail_users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `tbl_ikan`
--
ALTER TABLE `tbl_ikan`
  ADD PRIMARY KEY (`id_ikan`),
  ADD KEY `tbl_product_ibfk_1` (`id_jenis`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tbl_perhitunganproduk`
--
ALTER TABLE `tbl_perhitunganproduk`
  ADD PRIMARY KEY (`id_perhitungan`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tb_courier`
--
ALTER TABLE `tb_courier`
  ADD PRIMARY KEY (`id_kurir`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`number`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Indexes for table `tb_shipping`
--
ALTER TABLE `tb_shipping`
  ADD PRIMARY KEY (`id_shipping`),
  ADD KEY `id_courier` (`id_courier`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `tbl_ikan`
--
ALTER TABLE `tbl_ikan`
  MODIFY `id_ikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_perhitunganproduk`
--
ALTER TABLE `tbl_perhitunganproduk`
  MODIFY `id_perhitungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41286;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_courier`
--
ALTER TABLE `tb_courier`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tb_shipping`
--
ALTER TABLE `tb_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_ikan` (`id_ikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_users`
--
ALTER TABLE `tbl_detail_users`
  ADD CONSTRAINT `tbl_detail_users_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ikan`
--
ALTER TABLE `tbl_ikan`
  ADD CONSTRAINT `tbl_ikan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tbl_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_perhitunganproduk`
--
ALTER TABLE `tbl_perhitunganproduk`
  ADD CONSTRAINT `tbl_perhitunganproduk_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_ikan` (`id_ikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_ikan` (`id_ikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_courier`
--
ALTER TABLE `tb_courier`
  ADD CONSTRAINT `tb_courier_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `tb_wilayah` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `tbl_cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_shipping`
--
ALTER TABLE `tb_shipping`
  ADD CONSTRAINT `tb_shipping_ibfk_1` FOREIGN KEY (`id_courier`) REFERENCES `tb_courier` (`id_kurir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_shipping_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
