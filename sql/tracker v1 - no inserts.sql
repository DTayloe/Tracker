-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Feb 11, 2020 at 07:44 PM
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
-- Database: `tracker`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `gas` (
  `id` int(11) NOT NULL,
  `gallons_bought` float NOT NULL,
  `price_per_gal` float NOT NULL,
  `miles_driven` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `oil` (
  `id` int(11) NOT NULL,
  `minutes_to_complete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `symptom` varchar(1500) NOT NULL,
  `reason` varchar(1500) NOT NULL,
  `solution` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tracker_data` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `odometer` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_row` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `cost` float NOT NULL,
  `notes` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `gas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `oil`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tracker_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `business_id` (`business_id`);


ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `oil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tracker_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tracker_data`
  ADD CONSTRAINT `tracker_data_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracker_data_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracker_data_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracker_data_ibfk_4` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
