-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 25, 2020 at 10:23 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpgtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `person` varchar(50) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `odometer` int(11) NOT NULL,
  `milesDrivenSinceLastFillUp` float NOT NULL,
  `pricePerGallon` float NOT NULL,
  `gallons` float NOT NULL,
  `gasCompany` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `person`, `vehicle`, `odometer`, `milesDrivenSinceLastFillUp`, `pricePerGallon`, `gallons`, `gasCompany`) VALUES
(1, '\"Dan\"', '\"(+) Add\"', 156000, 435, 2.89, 15.23, '\"Sam\'s Club\"'),
(2, '\"Dan\"', '\"(+) Add\"', 156000, 435, 2.89, 15.23, '\"Sam\'s Club\"'),
(3, '\"Dan\"', '\"(+) Add\"', 156000, 435, 2.89, 15.23, '\"Sam\'s Club\"'),
(4, '\"Dan\"', '\"(+) Add\"', 156000, 435, 2.89, 15.23, '\"Sam\'s Club\"'),
(5, '\"Dan\"', '\"(+) Add\"', 156000, 435, 2.89, 15.23, '\"Sam\'s Club\"'),
(6, '\"Dan\"', '\"(+) Add\"', 156000, 435, 2.89, 15.23, '\"Sam\'s Club\"'),
(7, '\"Carlee\"', '\"(+) Add\"', 11145, 45464, 454.3, 555, '\"Rickers\"'),
(8, '\"Carlee\"', '\"(+) Add\"', 11145, 45464, 454.3, 555, '\"Rickers\"'),
(9, 'Henry', 'Dpdge', 1156, 4, 2.3, 55, 'kklo'),
(10, 'Carlee', '(+) Add', 156, 1555, 2.3, 55, 'Sam\'s Club');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
