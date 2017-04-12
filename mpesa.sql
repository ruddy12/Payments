-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2017 at 11:53 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `mpesa`
--

CREATE TABLE IF NOT EXISTS `mpesa` (
  `id` int(9) NOT NULL,
  `transactionId` varchar(60) NOT NULL,
  `providerRefId` int(60) NOT NULL,
  `providerChannelCode` int(30) NOT NULL,
  `productName` text NOT NULL,
  `source` int(11) NOT NULL,
  `value` int(10) NOT NULL,
  `transactionFee` varchar(13) NOT NULL,
  `providerFee` varchar(13) NOT NULL,
  `status` text NOT NULL,
  `description` text NOT NULL,
  `transactionDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mpesa`
--
ALTER TABLE `mpesa`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mpesa`
--
ALTER TABLE `mpesa`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
