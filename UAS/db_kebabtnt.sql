-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 09:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kebabtnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `nama_menu` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `stok` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
(25, '88821-1.png', 'Kebab Reguler', 'Kebab dengan ukuran sedang, berisi daging sayur dan dipadukan dengan Saus yang lezat ', 16, '13000', '12'),
(26, '18302-3.png', 'Kebab Jumbo', 'Kebab dengan isi daging dan sayur yang berukuran besar dipadukan dengan saus lezat', 16, '15000', '22'),
(27, '61021-8.png', 'Chicken Kebab ', 'Kebab dengan isi daging ayam dan sayur yang dipadukan dengan saus lezat dan gurih', 16, '15000', '9'),
(28, '98020-5.png', 'Kebab Mini', 'Kebab dengan isi daging dan sayur yang berukuran kecil dipadukan dengan saus lezat', 17, '10000', '26'),
(29, '70969-13.png', 'Burger Kebab', 'Burger dengan isian daging kebab yang murah dan sedap untuk mengganjal perut', 17, '10000', '15'),
(30, '36799-6.png', 'kebab Sosis', 'Kebab dengan Isisan Sosis yang lezat dan gurih dipadukan dengan saus dan mayones', 17, '10000', '23'),
(31, '35725-9.png', 'Beef Burger', 'Burger denak dengan isian daging beef yang menggugah selera', 15, '12000', '10'),
(32, '81970-14.png', 'Egg Burger', 'Burger dengan Isian Telur yang enak dan gurih lezat mantap', 15, '11000', '11'),
(33, '39537-12.png', 'Chicken Burger', 'Burger dengan Isian Nugget Chicken yang enak renyah gurih mantap', 15, '12000', '9');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kat_menu` int(11) NOT NULL,
  `jenis_menu` int(11) DEFAULT NULL,
  `kategori_makanan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kat_menu`, `jenis_menu`, `kategori_makanan`) VALUES
(15, 1, 'Burger'),
(16, 1, 'Kebab'),
(17, 1, 'Paket Serbu (Sepuluh Ribu)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` bigint(20) NOT NULL,
  `nominal_uang` bigint(20) DEFAULT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
(2401201152568, 40000, 37000, '2024-01-20 04:54:27'),
(2401201155782, 30000, 30000, '2024-01-20 04:56:52'),
(2401201159348, 24000, 24000, '2024-01-20 05:01:09'),
(2401201203101, 800000, 71000, '2024-01-20 05:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_order`
--

CREATE TABLE `tb_list_order` (
  `id_list_order` int(15) NOT NULL,
  `menu` int(10) DEFAULT NULL,
  `kode_order` bigint(19) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `catatan` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_list_order`
--

INSERT INTO `tb_list_order` (`id_list_order`, `menu`, `kode_order`, `jumlah`, `catatan`, `status`) VALUES
(672, 25, 2401201152568, 1, 'Pedes', 2),
(673, 31, 2401201152568, 2, 'Sedang', 2),
(674, 28, 2401201155782, 3, 'tanpa sayur pedes', 2),
(675, 33, 2401201159348, 2, 'pedes', 2),
(676, 30, 2401201203101, 3, 'pedes', 2),
(677, 32, 2401201203101, 1, 'keju', 2),
(678, 26, 2401201203101, 2, 'keju pedes', 2),
(679, 27, 2401201213410, 1, 'pedes', 2),
(680, 29, 2401201213410, 2, 'gak pedes', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` bigint(19) NOT NULL,
  `pelanggan` varchar(200) DEFAULT NULL,
  `meja` int(10) DEFAULT NULL,
  `pelayan` int(11) DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `pelanggan`, `meja`, `pelayan`, `waktu_order`) VALUES
(2401201152568, 'reza', 1, 2, '2024-01-20 04:53:02'),
(2401201155782, 'wardana', 2, 2, '2024-01-20 04:55:56'),
(2401201159348, 'tnt', 3, 2, '2024-01-20 05:00:33'),
(2401201203101, 'reza wardana', 4, 2, '2024-01-20 05:04:21'),
(2401201213410, 'reza', 5, 2, '2024-01-20 05:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `nohp`, `alamat`) VALUES
(2, 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'Owner', '08982194477', 'robay'),
(18, 'penjual@penjual.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Penjual', '08988899988', 'Jepara Jawa Tengah'),
(19, 'pelanggan@pelanggan.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Pelanggan', '0898412345', 'Jakarta\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kat_menu`);

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  ADD PRIMARY KEY (`id_list_order`),
  ADD KEY `menu` (`menu`),
  ADD KEY `order` (`kode_order`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `pelayan` (`pelayan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kat_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  MODIFY `id_list_order` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`kategori`) REFERENCES `kategori_menu` (`id_kat_menu`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  ADD CONSTRAINT `tb_list_order_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `daftar_menu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_list_order_ibfk_2` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `pelayan` FOREIGN KEY (`pelayan`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
