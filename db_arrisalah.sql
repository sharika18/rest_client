-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 04:47 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arrisalah`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'arrisalah123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:mahasiswa/index:get', 2, 1601442901, 'wpu123');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` char(9) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `jurusan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`) VALUES
(34, '123', 'derr', 'daaa', 'adadad'),
(36, '7775', 'derrian', 'derrianpratama@gmail.com', 'SI2'),
(37, '999', 'yaya', 'yaya000', 'Sistem Informasi'),
(39, '9999OKEBO', 'dp', 'jjjj', 'oke'),
(40, '123', 'derrian pratama', 'derianpratama@gmail.com', 'IT'),
(41, '123', 'derrian pratama', 'derianpratama@gmail.com', 'IT'),
(42, '123', 'derrian pratama', 'derianpratama@gmail.com', 'IT'),
(43, '123', 'derrian pratama', 'derianpratama@gmail.com', 'IT'),
(44, '123', 'derrian', 'derr@gmail.com', 'IT'),
(45, '123', 'derrian', 'derr@gmail.com', 'IT'),
(46, '123', 'derrian', 'derr@gmail.com', 'IT'),
(47, '123', 'derrian', 'derr@gmail.com', 'IT'),
(48, '123', 'derrian', 'derr@gmail.com', 'IT'),
(49, '123', 'derrian', 'derr@gmail.com', 'IT'),
(50, '123', 'derrian', 'derr@gmail.com', 'IT'),
(51, '123', 'derrian', 'derr@gmail.com', 'IT'),
(52, '123', 'derrian', 'derr@gmail.com', 'IT'),
(53, '123', 'derrian', 'derr@gmail.com', 'IT'),
(54, '123', 'derrian', 'derr@gmail.com', 'IT'),
(55, '123', 'derrian', 'derr@gmail.com', 'IT'),
(56, '123', 'derrian', 'derr@gmail.com', 'IT'),
(57, '123', 'derrian', 'derr@gmail.com', 'IT'),
(58, '123', 'derrian', 'derr@gmail.com', 'IT'),
(59, '123', 'derrian', 'derr@gmail.com', 'IT'),
(60, '123', 'derrian', 'derr@gmail.com', 'IT'),
(61, '123', 'derrian', 'derr@gmail.com', 'IT'),
(62, '123', 'derrian', 'derr@gmail.com', 'IT'),
(63, '123', 'derrian', 'derr@gmail.com', 'IT'),
(64, '999', 'derrian', 'derr@gmail.com', 'IT'),
(65, '999', 'derrian', 'derr@gmail.com', 'IT'),
(66, '999', 'derrian', 'derr@gmail.com', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya`
--

CREATE TABLE `tb_biaya` (
  `Biaya_ID` int(11) NOT NULL,
  `Deskripsi` varchar(225) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(50) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_biaya`
--

INSERT INTO `tb_biaya` (`Biaya_ID`, `Deskripsi`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'Uang Pendaftaran', 'admin', '2020-10-06 17:34:41', 'DEPRA', '2021-04-17 15:44:22'),
(2, 'Uang Pangkal oke', 'admin', '2020-10-06 17:48:11', 'DEPRA', '2021-03-14 22:14:55'),
(3, 'Uang Pangkal', 'admin', '2020-10-06 17:48:56', NULL, NULL),
(4, 'Uang SPP', 'admin', '2020-10-06 17:48:11', 'DEPRA', '2021-03-13 17:47:46'),
(5, 'Uang Denda SPP Terlambat', '', '0000-00-00 00:00:00', 'DEPRA', '2021-05-05 22:55:43'),
(61, 'COBA LAGI ATUH', 'DEPRA', '2021-05-07 21:32:35', NULL, '2021-05-07 21:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_detail`
--

CREATE TABLE `tb_biaya_detail` (
  `Biaya_Detail_ID` int(11) NOT NULL,
  `Biaya_ID` int(11) DEFAULT NULL,
  `Jenjang` varchar(225) DEFAULT NULL,
  `Gelombang` varchar(225) DEFAULT NULL,
  `Nominal` decimal(12,0) DEFAULT NULL,
  `Ketentuan` varchar(500) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(50) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_biaya_detail`
--

INSERT INTO `tb_biaya_detail` (`Biaya_Detail_ID`, `Biaya_ID`, `Jenjang`, `Gelombang`, `Nominal`, `Ketentuan`, `StartDate`, `EndDate`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 1, NULL, 'Gelombang 1', '90000', NULL, NULL, NULL, 'admin', '2020-10-06 17:48:11', NULL, NULL),
(2, 3, NULL, NULL, '8000000', 'Jika pembayaran dilakukan di bulan April', '2020-04-01', '2020-04-30', 'admin', '2020-10-06 17:48:11', NULL, NULL),
(3, 3, NULL, NULL, '9000000', 'Jika pembayaran dilakukan setelah bulan April okay', '2020-05-01', '2020-12-31', 'admin', '2020-10-06 17:48:11', NULL, NULL),
(30, 1, 'PAUD', 'Reguler', '90000', 'test', '0000-00-00', '0000-00-00', 'DEPRA', '2021-05-06 21:38:06', NULL, '2021-05-06 21:38:06'),
(31, 1, 'PAUD', 'Gelombang 1', '90000', 'berlaku untuk bulan mei saja', '2021-05-01', '2021-05-31', 'DEPRA', '2021-05-06 21:39:42', NULL, '2021-05-06 21:39:42'),
(32, 4, 'PAUD', 'Reguler', '150000', '', '0000-00-00', '0000-00-00', 'DEPRA', '2021-05-06 21:42:39', NULL, '2021-05-06 21:42:39');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_biaya_detail`
-- (See below for the actual view)
--
CREATE TABLE `vw_biaya_detail` (
`Biaya_Detail_ID` int(11)
,`Biaya_ID` int(11)
,`Deskripsi` varchar(225)
,`Jenjang` varchar(225)
,`Gelombang` varchar(225)
,`Nominal` decimal(12,0)
,`Ketentuan` varchar(500)
,`StartDate` date
,`EndDate` date
,`CreatedBy` varchar(50)
,`CreatedDate` datetime
,`ModifiedBy` varchar(50)
,`ModifiedDate` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vw_biaya_detail`
--
DROP TABLE IF EXISTS `vw_biaya_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_biaya_detail`  AS  (select `detail`.`Biaya_Detail_ID` AS `Biaya_Detail_ID`,`detail`.`Biaya_ID` AS `Biaya_ID`,`biaya`.`Deskripsi` AS `Deskripsi`,`detail`.`Jenjang` AS `Jenjang`,`detail`.`Gelombang` AS `Gelombang`,`detail`.`Nominal` AS `Nominal`,`detail`.`Ketentuan` AS `Ketentuan`,`detail`.`StartDate` AS `StartDate`,`detail`.`EndDate` AS `EndDate`,`detail`.`CreatedBy` AS `CreatedBy`,`detail`.`CreatedDate` AS `CreatedDate`,`detail`.`ModifiedBy` AS `ModifiedBy`,`detail`.`ModifiedDate` AS `ModifiedDate` from (`tb_biaya` `biaya` join `tb_biaya_detail` `detail` on(`biaya`.`Biaya_ID` = `detail`.`Biaya_ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  ADD PRIMARY KEY (`Biaya_ID`);

--
-- Indexes for table `tb_biaya_detail`
--
ALTER TABLE `tb_biaya_detail`
  ADD PRIMARY KEY (`Biaya_Detail_ID`),
  ADD KEY `Biaya_ID` (`Biaya_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  MODIFY `Biaya_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_biaya_detail`
--
ALTER TABLE `tb_biaya_detail`
  MODIFY `Biaya_Detail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_biaya_detail`
--
ALTER TABLE `tb_biaya_detail`
  ADD CONSTRAINT `tb_biaya_detail_ibfk_1` FOREIGN KEY (`Biaya_ID`) REFERENCES `tb_biaya` (`Biaya_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
