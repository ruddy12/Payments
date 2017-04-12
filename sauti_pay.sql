-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2017 at 11:26 AM
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
-- Table structure for table `sauti_pay`
--

CREATE TABLE IF NOT EXISTS `sauti_pay` (
  `id` int(9) NOT NULL,
  `transactionId` varchar(70) NOT NULL,
  `category` text NOT NULL,
  `provider` text NOT NULL,
  `providerRefId` varchar(60) NOT NULL,
  `providerChannelCode` int(14) NOT NULL,
  `productName` text NOT NULL,
  `sourceType` text NOT NULL,
  `source` varchar(18) NOT NULL,
  `destinationType` text NOT NULL,
  `destination` text NOT NULL,
  `value` varchar(20) NOT NULL,
  `transactionFee` varchar(20) NOT NULL,
  `providerFee` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `description` text NOT NULL,
  `requestMetadata` varchar(100) NOT NULL,
  `providerMetadata` varchar(100) NOT NULL,
  `transactionDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sauti_pay`
--

INSERT INTO `sauti_pay` (`id`, `transactionId`, `category`, `provider`, `providerRefId`, `providerChannelCode`, `productName`, `sourceType`, `source`, `destinationType`, `destination`, `value`, `transactionFee`, `providerFee`, `status`, `description`, `requestMetadata`, `providerMetadata`, `transactionDate`) VALUES
(1, 'ATPid_TestTransaction123', 'MobileCheckout', 'Mpesa', 'MpesaID001', 525900, 'My Online Store', 'PhoneNumber', '+254724816442', 'Wallet', 'PaymentWallet', 'KES 1000', 'KES 1.5', 'KES 5.5', 'Success', 'Payment confirmed by mobile subscriber', '"shopId" : "1234",\r\n "itemId" : "abcdef"', '"KYCName" : "TestCustomer",\r\n "KYCLocation" : "Nairobi"', '2016-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sauti_pay`
--
ALTER TABLE `sauti_pay`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sauti_pay`
--
ALTER TABLE `sauti_pay`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
