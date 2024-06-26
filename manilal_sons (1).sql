-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 12:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manilal&sons`
--

-- --------------------------------------------------------

--
-- Table structure for table `estimate_product`
--

CREATE TABLE `estimate_product` (
  `est_no` int(11) NOT NULL,
  `hsn` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `partion` varchar(50) NOT NULL,
  `pcs` int(11) NOT NULL,
  `rate` double NOT NULL,
  `disc` double NOT NULL,
  `gst` double NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estimate_product`
--

INSERT INTO `estimate_product` (`est_no`, `hsn`, `image`, `partion`, `pcs`, `rate`, `disc`, `gst`, `amount`) VALUES
(1, 8481, 'IMG_7044.JPEG', 'ANGAL COCK  1/2\" ( M ) ', 1, 165, 0, 18, 194.7),
(1, 3917, 'WhatsApp Image 2024-01-02 at 9.29.51 AM.jpeg', 'PVC CONNECTION PIPE 18\"', 1, 53, 0, 18, 62.54),
(1, 3917, 'WhatsApp Image 2024-01-02 at 9.29.51 AM.jpeg', 'PVC CONNECTION PIPE 24\"', 1, 59, 0, 18, 69.62),
(1, 4009, 'WhatsApp Image 2024-01-02 at 9.37.47 AM.jpeg', 'S.S CONNECTION PIPE 18\"', 1, 75, 0, 18, 88.5),
(1, 3917, 'WhatsApp Image 2024-01-02 at 9.37.47 AM.jpeg', 'S.S CONNECTION PIPE 24\"', 1, 88, 0, 18, 103.84),
(1, 7318, 'WhatsApp Image 2024-01-02 at 9.29.42 AM.jpeg', 'S.S RACK  BOLT 3/8\"', 1, 48, 0, 18, 56.64),
(1, 7318, 'IMG_0619.JPG', 'S.S RACK BOLT 5/8\" ( WALLNG )', 1, 165, 0, 18, 194.7),
(1, 8481, '500x500.jpg', 'BRASS WAST COUPLIN 6\"', 1, 680, 0, 18, 802.4),
(2, 8481, 'IMG_7044.JPEG', 'ANGAL COCK  1/2\" ( M ) ', 1, 165, 0, 18, 194.7),
(2, 8481, 'IMG_7044.JPEG', 'ANGAL COCK  1/2', 1, 200, 0, 18, 236),
(2, 3917, 'WhatsApp Image 2024-01-02 at 9.29.51 AM.jpeg', 'PVC CONNECTION PIPE 18\"', 1, 53, 0, 18, 62.54),
(2, 3917, 'WhatsApp Image 2024-01-02 at 9.29.51 AM.jpeg', 'PVC CONNECTION PIPE 24\"', 1, 59, 0, 18, 69.62),
(2, 4009, 'WhatsApp Image 2024-01-02 at 9.37.47 AM.jpeg', 'S.S CONNECTION PIPE 18\"', 1, 75, 0, 18, 88.5),
(2, 3917, 'WhatsApp Image 2024-01-02 at 9.37.47 AM.jpeg', 'S.S CONNECTION PIPE 24\"', 1, 88, 0, 18, 103.84),
(2, 7318, 'WhatsApp Image 2024-01-02 at 9.29.42 AM.jpeg', 'S.S RACK  BOLT 3/8\"', 1, 48, 0, 18, 56.64),
(2, 7318, 'IMG_0619.JPG', 'S.S RACK BOLT 5/8\" ( WALLNG )', 1, 165, 0, 18, 194.7),
(2, 7418, '500x500.jpg', 'BRASS WAST COUPLIN 3\"', 1, 140, 0, 18, 165.2),
(2, 8481, '500x500.jpg', 'BRASS WAST COUPLIN 6\"', 1, 245, 0, 18, 289.1),
(2, 8481, 'IMG_0620.JPG', 'BRASS C.P EXTENSION NIPPLE ( M ) 1', 1, 28, 0, 18, 33.04),
(2, 8481, 'IMG_0620.JPG', 'BRASS C.P EXTENSION NIPPLE ( M ) 1.5\"', 1, 42, 0, 18, 49.56),
(2, 8481, 'IMG_0620.JPG', 'BRASS C.P EXTENSION NIPPLE ( M ) 2\"', 1, 56, 0, 18, 66.08),
(2, 8481, 'IMG_0620.JPG', 'BRASS C.P EXTENSION NIPPLE ( H ) 1', 1, 31, 0, 18, 36.58),
(2, 8481, 'IMG_0620.JPG', 'BRASS C.P EXTENSION NIPPLE ( H ) 1.5', 1, 47, 0, 18, 55.46),
(2, 8481, 'IMG_0620.JPG', 'BRASS C.P EXTENSION NIPPLE ( H ) 2', 1, 62, 0, 18, 73.16),
(2, 8481, 'IMG_3010.JPG', '1/2\" BALVALVE PUSHTI', 1, 160, 0, 18, 188.8),
(2, 7418, 'WhatsApp Image 2024-01-02 at 9.30.55 AM.jpeg', 'S.S  HEX NIPPLE  1/2\"', 1, 20, 0, 18, 23.6),
(2, 8481, 'WhatsApp Image 2024-01-02 at 9.30.55 AM.jpeg', 'BEASS HEX NIPPLE 1/2\"', 1, 28, 0, 18, 33.04);

-- --------------------------------------------------------

--
-- Table structure for table `main_estimate`
--

CREATE TABLE `main_estimate` (
  `est_no` int(11) NOT NULL,
  `per_name` varchar(40) NOT NULL,
  `est_date` date NOT NULL,
  `per_address` varchar(100) NOT NULL,
  `freight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_estimate`
--

INSERT INTO `main_estimate` (`est_no`, `per_name`, `est_date`, `per_address`, `freight`) VALUES
(1, 'SHANTINATH ( NOVA )', '2024-01-02', 'VESU', 0),
(2, 'SHANTINATH ( NOVA )', '2024-01-02', 'VESU', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `HSN` int(11) NOT NULL,
  `Prod_ID` int(11) NOT NULL,
  `Prod_Name` varchar(100) NOT NULL,
  `Prod_Price` double NOT NULL,
  `Prod_GST` double NOT NULL,
  `Prod_Short_Name` varchar(10) NOT NULL,
  `Image_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`HSN`, `Prod_ID`, `Prod_Name`, `Prod_Price`, `Prod_GST`, `Prod_Short_Name`, `Image_Name`) VALUES
(8481, 131, 'ABS HEALTH FAUCET SET (1 MTR TUB )', 300, 18, 'AHFS', 'IMG_7616.JPEG'),
(8481, 132, 'BRASS HEALTH FAUCET SET 1 MTR TUB ( PREMIUM )', 1050, 18, 'HFSM1', 'IMG_0617.JPG'),
(8481, 134, 'S.S FLOOR TRAP ( S.S 202 )', 470, 18, 'SSJ202', 'IMG_0627.JPG'),
(8481, 135, 'S.S FLOOR TRAP ( S.S 304 )', 725, 18, 'SSJ304', 'IMG_0628.JPG'),
(8481, 136, 'TILE INSERT ABS JALI 6 X 6', 280, 18, 'TIJ66', 'IMG_0632.JPG'),
(8481, 137, '3 PCS ABS FLOOR TRAP', 138, 18, 'PJ366', 'IMG_0633.JPG'),
(8481, 138, '2 PCS ABS FLOOR TRAP', 100, 18, 'PJ266', 'IMG_0631.JPG'),
(8481, 139, 'BRASS MULTY JET SPRAY ( HEAVY ) 1 MTR', 615, 18, 'BMJP1', 'IMG_0621.JPG'),
(8481, 140, 'S.S BUTTERFLY JET SPRAY ( S.S. 202 ) 1 MTR', 445, 18, 'SSBJP', 'IMG_0625.JPG'),
(8481, 141, 'S.S MULTY JET SPRAY ( S.S. 202 ) 1 MTR', 345, 18, 'SSMJP1', 'IMG_0623.JPG'),
(8481, 142, 'BRASS C.P EXTENSION NIPPLE ( H ) 1', 77, 18, 'ENH1', 'IMG_0620.JPG'),
(8481, 143, 'BRASS C.P EXTENSION NIPPLE ( H ) 1.5', 116, 18, 'ENHE', 'IMG_0620.JPG'),
(8481, 144, 'BRASS C.P EXTENSION NIPPLE ( H ) 2', 154, 18, 'ENHF', 'IMG_0620.JPG'),
(8481, 145, 'BRASS C.P EXTENSION NIPPLE ( H ) 2.5', 193, 18, 'ENHG', 'IMG_0620.JPG'),
(8481, 146, 'BRASS C.P EXTENSION NIPPLE ( H ) 3', 231, 18, 'ENHH', 'IMG_0620.JPG'),
(8481, 147, 'NOVA LONG BODY BIB COCK ', 825, 18, 'NLBBC', 'PXL_20231220_105207883.MP.jpg'),
(8481, 148, 'ANGAL COCK  1/2\" ( M ) ', 375, 18, 'ACM', 'IMG_7044.JPEG'),
(8481, 149, 'ANGAL COCK  1/2', 450, 18, 'ACH', 'IMG_7044.JPEG'),
(3917, 150, 'PVC CONNECTION PIPE 18\"', 148, 18, 'PCP18', 'WhatsApp Image 2024-01-02 at 9.29.51 AM.jpeg'),
(3917, 151, 'PVC CONNECTION PIPE 24\"', 165, 18, 'PCP24', 'WhatsApp Image 2024-01-02 at 9.29.51 AM.jpeg'),
(4009, 152, 'S.S CONNECTION PIPE 18\"', 193, 18, 'SSCP18', 'WhatsApp Image 2024-01-02 at 9.37.47 AM.jpeg'),
(3917, 153, 'S.S CONNECTION PIPE 24\"', 218, 18, 'SSCP24', 'WhatsApp Image 2024-01-02 at 9.37.47 AM.jpeg'),
(7318, 154, 'S.S RACK  BOLT 3/8\"', 175, 18, 'SSBB', 'WhatsApp Image 2024-01-02 at 9.29.42 AM.jpeg'),
(7318, 155, 'S.S RACK BOLT 5/8\" ( WALLNG )', 525, 18, 'SSWB', 'IMG_0619.JPG'),
(7418, 156, 'BRASS WAST COUPLIN 3\"', 410, 18, 'BWC3', '500x500.jpg'),
(7418, 157, 'POP UP BRASS WASTE COUPLING 6\"', 1220, 18, 'PBWC6', 'WhatsApp Image 2024-01-02 at 9.29.18 AM.jpeg'),
(8481, 158, 'BRASS C.P EXTENSION NIPPLE ( M ) 1', 65, 18, 'ENM1', 'IMG_0620.JPG'),
(8481, 160, 'BRASS C.P EXTENSION NIPPLE ( M ) 1.5\"', 98, 18, 'ENME', 'IMG_0620.JPG'),
(8481, 161, 'BRASS C.P EXTENSION NIPPLE ( M ) 2\"', 130, 18, 'ENMF', 'IMG_0620.JPG'),
(8481, 162, '1/2\" BALVALVE PUSHTI', 389, 18, 'BVA', 'IMG_3010.JPG'),
(7418, 163, 'S.S  HEX NIPPLE  1/2\"', 33, 18, 'SSENA', 'WhatsApp Image 2024-01-02 at 9.30.55 AM.jpeg'),
(8481, 164, 'BEASS HEX NIPPLE 1/2\"', 80, 18, 'BENA', 'WhatsApp Image 2024-01-02 at 9.30.55 AM.jpeg'),
(8481, 165, 'BRASS WAST COUPLIN 6\"', 680, 18, 'BWC6', '500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `temp_estimate`
--

CREATE TABLE `temp_estimate` (
  `est_no` int(11) NOT NULL,
  `per_name` varchar(40) NOT NULL,
  `est_date` date NOT NULL,
  `per_address` varchar(100) NOT NULL,
  `freight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_est_product`
--

CREATE TABLE `temp_est_product` (
  `est_no` int(11) NOT NULL,
  `hsn` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `partion` varchar(50) NOT NULL,
  `pcs` int(11) NOT NULL,
  `rate` double NOT NULL,
  `disc` double NOT NULL,
  `gst` double NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimate_product`
--
ALTER TABLE `estimate_product`
  ADD KEY `est_no` (`est_no`);

--
-- Indexes for table `main_estimate`
--
ALTER TABLE `main_estimate`
  ADD PRIMARY KEY (`est_no`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`Prod_ID`),
  ADD UNIQUE KEY `Prod_Short_Name` (`Prod_Short_Name`);

--
-- Indexes for table `temp_estimate`
--
ALTER TABLE `temp_estimate`
  ADD PRIMARY KEY (`est_no`);

--
-- Indexes for table `temp_est_product`
--
ALTER TABLE `temp_est_product`
  ADD KEY `est_no` (`est_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `Prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estimate_product`
--
ALTER TABLE `estimate_product`
  ADD CONSTRAINT `estimate_product_ibfk_1` FOREIGN KEY (`est_no`) REFERENCES `main_estimate` (`est_no`);

--
-- Constraints for table `temp_est_product`
--
ALTER TABLE `temp_est_product`
  ADD CONSTRAINT `temp_est_product_ibfk_1` FOREIGN KEY (`est_no`) REFERENCES `temp_estimate` (`est_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
