-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 07:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maxwheels`
--
CREATE DATABASE IF NOT EXISTS `maxwheels` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `maxwheels`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`id` int(11) NOT NULL,
  `vechile_id` int(11) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `booking_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creation_date` datetime NOT NULL,
  `updating_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contentus`
--

CREATE TABLE IF NOT EXISTS `contentus` (
`id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `PostingDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `numberPhone` varchar(20) NOT NULL,
  `Bio` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `User_type` int(3) NOT NULL,
  `Activity` int(3) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `City` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `RegDate` datetime NOT NULL,
  `updationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vechiles`
--

CREATE TABLE IF NOT EXISTS `vechiles` (
`id` int(11) NOT NULL,
  `Vtitle` varchar(100) NOT NULL,
  `overview` varchar(300) NOT NULL,
  `model` varchar(20) NOT NULL,
  `Vbrand` int(11) NOT NULL,
  `miles` varchar(20) NOT NULL,
  `FuelType` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `SeatingCapacity` int(11) NOT NULL,
  `Vimage1` varchar(255) NOT NULL,
  `Vimage2` varchar(255) NOT NULL,
  `Vimage3` varchar(255) NOT NULL,
  `Vimage4` varchar(255) NOT NULL,
  `Vimage5` varchar(255) NOT NULL,
  `Vimage6` varchar(255) NOT NULL,
  `AirConditioner` int(11) NOT NULL,
  `PowerDoorLocks` int(11) NOT NULL,
  `AntiLockBrakingSystem` int(11) NOT NULL,
  `BrakeAssist` int(11) NOT NULL,
  `PowerSteering` int(11) NOT NULL,
  `DriverAirbag` int(11) NOT NULL,
  `PassengerAirbag` int(11) NOT NULL,
  `PowerWindows` int(11) NOT NULL,
  `CDPlayer` int(11) NOT NULL,
  `CentralLocking` int(11) NOT NULL,
  `CrashSensor` int(11) NOT NULL,
  `LeatherSeats` int(11) NOT NULL,
  `RegDate` datetime NOT NULL,
  `UpdatingDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `brand_uniq` (`name`);

--
-- Indexes for table `contentus`
--
ALTER TABLE `contentus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `page_type_uniq` (`type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_unq` (`Email`), ADD UNIQUE KEY `number_unq` (`numberPhone`);

--
-- Indexes for table `vechiles`
--
ALTER TABLE `vechiles`
 ADD PRIMARY KEY (`id`), ADD KEY `brand_FK` (`Vbrand`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contentus`
--
ALTER TABLE `contentus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vechiles`
--
ALTER TABLE `vechiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
