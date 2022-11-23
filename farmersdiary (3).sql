-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 06:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmersdiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_line` varchar(100) DEFAULT NULL,
  `thana` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `user_type` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_line`, `thana`, `district`, `country`, `user_type`) VALUES
(1000000000, 'Talbag', 'Dhaka', 'Chandpur', 'Bangladesh', 'farmer'),
(1000000001, 'talbag', 'Dhaka', 'Comilla', 'Bangladesh', 'farmer');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `reciver_id` int(11) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `link` varchar(300) DEFAULT NULL,
  `timenow` varchar(10) DEFAULT NULL,
  `datenow` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `reciver_id`, `message`, `link`, `timenow`, `datenow`) VALUES
(49, 100000001, 100000000, 'RGxmQmExSklURm9zblRTcU1OaVRrZz09', NULL, '19:55:57', '2022-10-26'),
(50, 100000000, 100000001, 'V25GU3NuRE01UnJnUjNQak1MRHdZUT09', NULL, '19:56:04', '2022-10-26'),
(51, 100000001, 100000000, 'RG8vVzN2NS9ieTlpUUI4M3NNTzFWZz09', NULL, '19:56:17', '2022-10-26'),
(52, 100000000, 100000001, 'YnF0MXpYcEwvd1MyLy9kS1B6QVIzYWM1MW5rU01MbHVsTE01YlNaRmFyQT0=', NULL, '19:56:24', '2022-10-26'),
(53, 100000000, 100000001, 'b1pSWC81WTR2OVRiNk1CQWlDakRhU0w5cTlMaFU1ZEFVQmJMRGtTaytTdz0=', NULL, '19:56:35', '2022-10-26'),
(54, 100000001, 100000000, 'eEtvMDYzcUtPTjgrUWtiSXJNalhQUT09', NULL, '19:56:44', '2022-10-26'),
(55, 100000001, 100000000, 'ZVJPV0dnVFg5TVZjQTNyNTlONDUrV2w4Undta0RIZ2l3RTRJeGFOb3V0WT0=', NULL, '19:57:04', '2022-10-26'),
(56, 100000000, 100000001, 'NHRadVZ3RXBEUmxYWWtpczZrOHFmQT09', NULL, '19:57:09', '2022-10-26'),
(57, 100000000, 100000001, 'djNQOW1hYmNSK1VOTlJqelFxNW9Cdz09', NULL, '19:59:15', '2022-10-26'),
(58, 100000000, 100000001, 'R011d1dRMUdjdk5zcUdqR3dvaTUvdz09', NULL, '19:59:39', '2022-10-26'),
(59, 100000001, 100000000, 'SzU2aTRZR0d3S1dhYmhTTlRpNUtySER3VkdlOU9jNGpDQ2Y0WGFRSzNWMD0=', NULL, '20:01:21', '2022-10-26'),
(60, 100000001, 100000000, 'VWFUZWxIYlF0QjAzaXl1UFo0dk05UT09', NULL, '20:09:48', '2022-11-18'),
(61, 100000001, 100000000, 'NS85dUlLZWNVVWY1TTdTZTB1S1U4QT09', NULL, '17:00:41', '2022-11-19'),
(62, 100000000, 100000001, 'MkExWGJYSFgwd0lUU1FMOGhUYmxPdz09', NULL, '04:41:39', '2022-11-22'),
(63, 100000001, 100000000, 'd1dGTm83R0hCbUc1UEhpV2FXTCt6QT09', NULL, '04:41:54', '2022-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `farmersprofile`
--

CREATE TABLE `farmersprofile` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `passwords` varchar(255) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmersprofile`
--

INSERT INTO `farmersprofile` (`id`, `fname`, `lname`, `gender`, `nid`, `phone`, `passwords`, `address_id`) VALUES
(100000000, 'Yeasin', 'Islam', 'male', 2147483647, 1312889131, '6424e342645d1b22fe5fb7ea83aba23f', 1000000000),
(100000001, 'Osim', 'Akram', 'male', 2147483647, 1928384788, '50a6af7d9761b24085e74295767b9d14', 1000000001);

-- --------------------------------------------------------

--
-- Table structure for table `prodcut_details`
--

CREATE TABLE `prodcut_details` (
  `product_details_id` int(12) NOT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `extra_charge` float DEFAULT NULL,
  `product_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodcut_details`
--

INSERT INTO `prodcut_details` (`product_details_id`, `product_name`, `weight`, `unit_price`, `vat`, `extra_charge`, `product_id`) VALUES
(4, '54', '43', 2, 5, 2, 2),
(5, 'Peyaj', '22', 32, 10, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(12) NOT NULL,
  `seller_id` int(12) DEFAULT NULL,
  `buyer_id` int(12) DEFAULT NULL,
  `datas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `seller_id`, `buyer_id`, `datas`) VALUES
(2, 100000001, 100000000, 'October 9, 2022'),
(3, 100000000, 100000001, 'November 19, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `dates` varchar(20) DEFAULT NULL,
  `times` varchar(20) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmersprofile`
--
ALTER TABLE `farmersprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `prodcut_details`
--
ALTER TABLE `prodcut_details`
  ADD PRIMARY KEY (`product_details_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmersprofile`
--
ALTER TABLE `farmersprofile`
  ADD CONSTRAINT `farmersprofile_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
