-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2025 at 07:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah_direktoriumkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabkota`
--

CREATE TABLE `kabkota` (
  `id` int NOT NULL,
  `nama` varchar(45) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `provinsi_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kabkota`
--

INSERT INTO `kabkota` (`id`, `nama`, `latitude`, `longitude`, `provinsi_id`) VALUES
(1, 'Kota Bandung', -6.914744, 107.60981, 1),
(2, 'Kabupaten Bandung', -7.112664, 107.749033, 1),
(3, 'Kota Semarang', -6.966667, 110.416664, 2),
(4, 'Kota Surabaya', -7.250445, 112.768845, 3),
(5, 'Kota Yogyakarta', -7.79558, 110.36949, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_umkm`
--

CREATE TABLE `kategori_umkm` (
  `id` int NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_umkm`
--

INSERT INTO `kategori_umkm` (`id`, `nama`) VALUES
(1, 'Kuliner'),
(2, 'Fashion'),
(3, 'Kerajinan'),
(4, 'Agrobisnis'),
(5, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `pembina`
--

CREATE TABLE `pembina` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `keahlian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembina`
--

INSERT INTO `pembina` (`id`, `nama`, `gender`, `tgl_lahir`, `tmp_lahir`, `keahlian`) VALUES
(2, 'Andi Saputra', 'L', '1980-05-12', 'Bandung', 'Manajemen UMKM'),
(3, 'Siti Aminah', 'P', '1985-08-23', 'Yogyakarta', 'Pemasaran Digital'),
(4, 'Budi Hartono', 'L', '1975-03-30', 'Semarang', 'Keuangan Mikro'),
(5, 'Rina Kartika', 'P', '1990-11-15', 'Surabaya', 'Desain Produk'),
(6, 'Dedi Santos', 'L', '1982-02-10', 'Jakarta', 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int NOT NULL,
  `nama` varchar(45) NOT NULL,
  `ibukota` varchar(45) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `ibukota`, `latitude`, `longitude`) VALUES
(1, 'Jawa Barat', 'Bandung', -6.914744, 107.60981),
(2, 'Jawa Tengah', 'Semarang', -6.966667, 110.416664),
(3, 'Jawa Timur', 'Surabaya', -7.250445, 112.768845),
(4, 'DKI Jakarta', 'Jakarta', -6.208763, 106.845599),
(5, 'DI Yogyakarta', 'Yogyakarta', -7.79558, 110.36949);

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `modal` double NOT NULL,
  `pemilik` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `website` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rating` int NOT NULL,
  `kabkota_id` int NOT NULL,
  `kategori_umkm_id` int NOT NULL,
  `pembina_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id`, `nama`, `modal`, `pemilik`, `alamat`, `website`, `email`, `rating`, `kabkota_id`, `kategori_umkm_id`, `pembina_id`) VALUES
(2, 'Toko Baju Erlangga', 8000000, 'Erlangga Abidin', 'Parung Ganteng', '', '', 3, 2, 2, 5),
(3, 'Nama', 10000, 'Ras', 'askd', '', '', 3, 5, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indexes for table `kategori_umkm`
--
ALTER TABLE `kategori_umkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kabkota_id` (`kabkota_id`),
  ADD KEY `kategori_umkm_id` (`kategori_umkm_id`),
  ADD KEY `pembina_id` (`pembina_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabkota`
--
ALTER TABLE `kabkota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_umkm`
--
ALTER TABLE `kategori_umkm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembina`
--
ALTER TABLE `pembina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD CONSTRAINT `kabkota_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `umkm_ibfk_1` FOREIGN KEY (`kabkota_id`) REFERENCES `kabkota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `umkm_ibfk_2` FOREIGN KEY (`kategori_umkm_id`) REFERENCES `kategori_umkm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `umkm_ibfk_3` FOREIGN KEY (`pembina_id`) REFERENCES `pembina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
