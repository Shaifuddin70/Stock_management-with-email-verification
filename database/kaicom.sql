-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 07:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaicom`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `description`) VALUES
(26, 'Chocholate', 'null'),
(27, 'Candy', 'null'),
(28, 'Biscuit', 'null'),
(29, 'Drinks', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `scatagory`
--

CREATE TABLE `scatagory` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `catagory_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scatagory`
--

INSERT INTO `scatagory` (`id`, `name`, `description`, `catagory_id`) VALUES
(25, 'Nesle', 'null', 26),
(26, 'Dairy Milk', 'Nill', 26),
(27, 'Pran', 'null', 28),
(28, 'Haque', 'null', 28),
(29, 'Cokacola', 'null', 29),
(31, 'Pran', 'null', 27),
(32, 'MOJO', 'null', 29),
(33, 'wdad', 'awd', 29),
(34, 'awda', 'awd', 29),
(35, 'Electronics', 'drg', 27),
(36, 'Electronics', 'null', 26),
(37, 'Shaifuddin Ahammed', 'null', 27),
(38, 'Shaifuddin Ahammeddfgs', 'null', 27),
(39, 'Olympic', 'null', 26),
(40, 'Electronics', 'null', 26),
(41, 'olympic', 'null', 28);

-- --------------------------------------------------------

--
-- Table structure for table `sscatagory`
--

CREATE TABLE `sscatagory` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `scatagory_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sscatagory`
--

INSERT INTO `sscatagory` (`id`, `name`, `description`, `price`, `scatagory_id`) VALUES
(30, 'Kitkat', '20gm', 60, 25),
(32, 'Toast', 'Null', 50, 27),
(33, 'Milk Merry', 'Null', 40, 28),
(34, 'Sprite', 'Null', 70, 29),
(35, 'Coke', 'Null', 40, 29),
(36, 'Safari', '15 gm', 25, 25),
(37, 'MIMI chocholate', '20 gm', 30, 39),
(47, 'Cadberry', '150 gm', 150, 26);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `quantity`, `price`) VALUES
(4, 'Milk Merry', 50, 60),
(5, 'Kitkat', 20, 60),
(6, 'Sprite', 20, 70),
(7, 'Sprite', 20, 70),
(8, 'Cadberry', 50, 200),
(9, 'Toast', 20, 50),
(10, 'Cadberry', 100, 200),
(11, 'Cadberry', 45, 200),
(12, 'awda', 20, 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `nid` varchar(13) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `vkey` varchar(100) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phone`, `nid`, `password`, `vkey`, `verified`, `cdate`, `image`, `address`) VALUES
(70, 'Shaifuddin', 'shaifuddin70@gmail.com', '18002122120', '1965404674', '$2y$10$J1rPuyyNYr7Al2kBu708dOo2S1j1j2ySjN.OGLij5LX8pgO8tgdWy', '71e8a38875284773fc4c6e4122154400', 1, '2022-11-30 08:10:18', '20220521_134537_2.jpg', 'UTTARA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scatagory`
--
ALTER TABLE `scatagory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catagory_id` (`catagory_id`);

--
-- Indexes for table `sscatagory`
--
ALTER TABLE `sscatagory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scatagory_id` (`scatagory_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `scatagory`
--
ALTER TABLE `scatagory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sscatagory`
--
ALTER TABLE `sscatagory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scatagory`
--
ALTER TABLE `scatagory`
  ADD CONSTRAINT `scatagory_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `catagory` (`id`);

--
-- Constraints for table `sscatagory`
--
ALTER TABLE `sscatagory`
  ADD CONSTRAINT `sscatagory_ibfk_1` FOREIGN KEY (`scatagory_id`) REFERENCES `scatagory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
