-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 03:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `serial_number` varchar(128) NOT NULL,
  `ram` varchar(128) DEFAULT NULL,
  `type_penyimpanan` varchar(128) DEFAULT NULL,
  `processor` varchar(128) NOT NULL,
  `tipe_network` varchar(128) DEFAULT NULL,
  `ttl_port` varchar(128) DEFAULT NULL,
  `transmisi` varchar(128) DEFAULT NULL,
  `id_user` int(128) NOT NULL,
  `kepemilikan` int(11) NOT NULL,
  `status_kondisi` varchar(128) NOT NULL,
  `tgl_penambahan` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `kategori_id`, `merk`, `type`, `serial_number`, `ram`, `type_penyimpanan`, `processor`, `tipe_network`, `ttl_port`, `transmisi`, `id_user`, `kepemilikan`, `status_kondisi`, `tgl_penambahan`) VALUES
(1, 1, 'Dell', 'Lattitude 3420', '98AXCA21', 'DDR3 4GB', 'SSD 500GB', 'Intel® Core™ i5-1135G7', NULL, NULL, NULL, 2, 1, '1', '2021-12-16'),
(2, 2, 'HP', 'LaserJet M13Ofn', '19328XXAS', '', '', '', '', '', '', 5, 2, '1', '2021-12-16'),
(3, 1, 'Lenovo', 'Thinkpad E470', '827ASD20', 'DDR4 4GB', '256 GB SSD', 'Inter Core I5 Gen11', NULL, NULL, NULL, 6, 2, '1', '2021-12-16'),
(6, 2, 'Kyocera', 'Ecosys M6630CIDN', 'XI21922M', NULL, NULL, '', '', '', '', 4, 1, '1', '2021-12-18'),
(7, 1, 'Lenovo', 'Thinkpad E470', 'PO9012XA', 'DDR4 4GB', 'SSD 500GB SATA', 'Inter Core I5 Gen11', '', '', '', 16, 2, '4', '2021-12-18'),
(9, 1, 'Dell', 'Lattitude 3420', 'MMP129US', 'DDR4 8GB', 'HDD 1TB', 'Intel® Core™ i5-1135G7', NULL, NULL, NULL, 7, 2, '1', '2021-12-22'),
(13, 1, 'Lenovo', 'V14-IIL', '76SGWCA', 'DDR4 4GB', '256 GB SSD', ' Intel Core i5-1035G1', NULL, NULL, NULL, 7, 2, '1', '2021-12-25'),
(14, 5, 'Unify', 'VOIP', 'AWD219201', NULL, NULL, '', '', '', '', 5, 1, '1', '2021-12-25'),
(15, 1, 'ASUS', 'K401LB', 'FRAU8D', 'RAM 4GB', '256 GB SSD', 'Intel Core i5 5200U', NULL, NULL, NULL, 7, 1, '1', '2021-12-25'),
(16, 1, 'Lenovo', 'Thinkpad E470', 'XN219SOP', 'DDR3 4GB', 'SSD 500GB SATA', 'Intel® Core™ i7-7500U', '', '', '', 8, 1, '1', '2021-12-25'),
(17, 3, 'Aruba', '303 Series AP', 'ABC1220398XX', NULL, NULL, '', 'Access Point', '', '', 5, 1, '1', '2022-01-15'),
(18, 3, 'TP-LINK', 'TL-SG1016D', '909203XX', NULL, NULL, '-', 'Switch', '16', '10/100/1000Mbps ', 1, 1, '1', '2022-01-16'),
(19, 3, 'Mikrotik', 'RB941-2nD', '2382KALDLA', NULL, NULL, '650Mhz', 'Router', '4', '4 port Fast Ethernet', 1, 1, '1', '2022-01-16'),
(20, 5, 'Unify', 'Phone', '1301092309', NULL, NULL, '-', NULL, NULL, NULL, 4, 1, '1', '2022-01-20'),
(21, 5, 'UNIC', 'UC36 ', '21391KAD', NULL, NULL, '-', NULL, NULL, NULL, 1, 1, '1', '2022-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `ip_address` varchar(128) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `id_asset`, `id_users`, `ip_address`, `tgl`) VALUES
(1, 1, 2, '192.168.101.10', '2021-12-21'),
(2, 2, 5, '2', '2021-12-08'),
(3, 6, 4, '192.168.1.1', '2021-12-22'),
(4, 8, 1, '192.168.1.1', '2021-12-06'),
(5, 8, 2, '192.168.102.20', '2021-12-23'),
(6, 8, 1, 'no', '2021-12-31'),
(7, 7, 1, '9', '2021-12-24'),
(8, 3, 2, '192.168.102.23', '2021-12-25'),
(9, 3, 6, '192.168.103.100', '2022-12-30'),
(10, 14, 5, '192.168.11.1', '2021-12-24'),
(11, 15, 7, '-', '2022-01-12'),
(12, 17, 5, '192.168.102.100', '2022-01-15'),
(13, 16, 8, '-', '2022-01-17'),
(14, 20, 9, '--', '2022-01-20'),
(15, 20, 10, 'asd', '2022-01-20'),
(16, 20, 4, 'adw', '2022-01-20'),
(17, 13, 7, 'DHCP', '2022-01-22'),
(18, 7, 15, '-', '2022-01-29'),
(19, 7, 16, '-', '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoris_id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoris_id`, `nama_kategori`) VALUES
(1, 'laptop dan PC'),
(2, 'printer'),
(3, 'network'),
(5, 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `kondisi_id` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `nama_pengecek` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `fisik` varchar(128) NOT NULL,
  `harddrive` varchar(128) NOT NULL,
  `lcd` varchar(128) NOT NULL,
  `keyboard` varchar(128) NOT NULL,
  `speaker` varchar(128) NOT NULL,
  `port` varchar(128) NOT NULL,
  `baterai` varchar(128) NOT NULL,
  `charger` varchar(128) NOT NULL,
  `touchpad` varchar(128) NOT NULL,
  `keterangan` varchar(1001) NOT NULL,
  `ex_user` varchar(128) NOT NULL,
  `tgl_pengecekkan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`kondisi_id`, `id_asset`, `nama_pengecek`, `status`, `fisik`, `harddrive`, `lcd`, `keyboard`, `speaker`, `port`, `baterai`, `charger`, `touchpad`, `keterangan`, `ex_user`, `tgl_pengecekkan`) VALUES
(3, 3, 'Idris', 4, 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'Tidak mau dicash', 'OK', 'OK', 'Baik digunakan untuk nonteknis', '7', '2021-12-24'),
(5, 9, 'Idris', 1, 'Ok', 'Ok', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'ok', 'Cocok untuk digunakan teknis dan nonteknis', '', '2021-12-25'),
(10, 13, 'Irfan', 1, 'Ada retakan di bagian bawah', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Perlu Upgrade SSD', '6', '2022-01-12'),
(11, 7, 'Idris', 4, 'Retak di layar', 'HDD', 'Good', 'Goog', 'Good', 'Good', 'Good', 'Good', 'Good', 'O', '2', '2022-01-12'),
(12, 9, 'Idris', 1, 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'Upgrade SSD', '', '2022-01-15'),
(13, 9, 'Idris', 1, 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'TES', '8', '2022-01-16'),
(14, 7, 'Idris', 4, 'OK', 'OK', 'OK', 'Ga bisa ditekan  Z, X, C', 'OK', 'OKOK', 'OK', 'OK', 'OK', 'WAIT', '16', '2022-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `penempatan`
--

CREATE TABLE `penempatan` (
  `user_id` int(11) NOT NULL,
  `jenis` int(11) NOT NULL COMMENT '1. user, 2. lokasi',
  `nik` varchar(200) NOT NULL,
  `nama_or_lantai` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `departemen` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penempatan`
--

INSERT INTO `penempatan` (`user_id`, `jenis`, `nik`, `nama_or_lantai`, `email`, `departemen`, `status`) VALUES
(1, 1, '999999', 'GA', 'ga@hypernet.co.id', 'General Affair', 'Permanen'),
(2, 1, '19112021', 'Idris Abdul Azis', 'idris.aziz@hypernet.co.id', 'Professional Service', 'Probation'),
(4, 2, '', 'LANTAI 1', '', '', ''),
(5, 2, '', 'LANTAI 2', '', '', ''),
(6, 1, '12932019', 'Adeline Mara', 'adeline.m@hypernet.co.id', 'Billing And Corporation', 'Kontrak'),
(7, 1, '12012009', 'Ahmad Zubaid', 'ahmad.z@hypernet.id', 'SBP', 'Permanen'),
(8, 1, '200000', 'Ilham', 'ilham@hypernet.co.id', 'IT Support', 'Permanen'),
(9, 2, '', 'LANTAI 3', '', '', ''),
(10, 2, '', 'LANTAI 4', '', '', ''),
(11, 2, '', 'LANTAI 5', '', '', ''),
(15, 1, '081390913', 'Ferda Rahma Janesha', 'ferda@gmail.com', 'Finance', 'Intern'),
(16, 1, '292929', 'Mutiara', 'mutiara.cm', 'Inventori', 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `status_cek`
--

CREATE TABLE `status_cek` (
  `status_cek_id` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_cek`
--

INSERT INTO `status_cek` (`status_cek_id`, `nama_status`) VALUES
(1, 'Layak Pakai'),
(4, 'Pending Service\r\n'),
(5, 'Belum dicek');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`user_id`, `username`, `password`, `user_role`) VALUES
(1, 'admin', 'admin', 1),
(2, 'user', 'user', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `nama_vendor` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `nama_vendor`, `keterangan`) VALUES
(1, 'Hypernet', 'Milik Sendiri'),
(2, 'Intikom', 'Vendor untuk Penyediaan Laptop'),
(3, 'Panca Putra Solusindo', 'Penyedia Laptop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoris_id`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`kondisi_id`);

--
-- Indexes for table `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `status_cek`
--
ALTER TABLE `status_cek`
  ADD PRIMARY KEY (`status_cek_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategoris_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `kondisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `status_cek`
--
ALTER TABLE `status_cek`
  MODIFY `status_cek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
