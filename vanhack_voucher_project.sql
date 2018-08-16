-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2018 at 04:01 
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vanhack_voucher_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `fosa_voucher`
--

CREATE TABLE IF NOT EXISTS `fosa_voucher` (
`id` bigint(20) unsigned NOT NULL,
  `status` enum('UNUSED','USED') NOT NULL DEFAULT 'UNUSED',
  `offer` char(255) NOT NULL,
  `recipient` char(255) NOT NULL,
  `voucher` char(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_used` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fosa_voucher`
--

INSERT INTO `fosa_voucher` (`id`, `status`, `offer`, `recipient`, `voucher`, `time_added`, `time_used`) VALUES
(1, 'USED', '1', '1', '5BER1532876987', '2018-07-29 15:09:47', '2018-07-29 17:12:27'),
(2, 'UNUSED', '1', '2', '5JUL1532877553', '2018-07-29 15:19:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fosa_voucher_offers`
--

CREATE TABLE IF NOT EXISTS `fosa_voucher_offers` (
`id` bigint(20) unsigned NOT NULL,
  `offer_name` char(255) NOT NULL,
  `discount_without_percentage_sign` float unsigned NOT NULL,
  `expiring_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fosa_voucher_offers`
--

INSERT INTO `fosa_voucher_offers` (`id`, `offer_name`, `discount_without_percentage_sign`, `expiring_date`) VALUES
(1, '2018 July offer', 5, '2018-11-09 08:50:45'),
(2, 'August Blast', 10, '2018-08-30 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fosa_voucher_recipient`
--

CREATE TABLE IF NOT EXISTS `fosa_voucher_recipient` (
`id` bigint(20) unsigned NOT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') NOT NULL DEFAULT 'NOT ACTIVE',
  `full_name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fosa_voucher_recipient`
--

INSERT INTO `fosa_voucher_recipient` (`id`, `status`, `full_name`, `email`, `time_added`) VALUES
(1, 'ACTIVE', 'bernard green', 'greendublin007@gmail.com', '2018-07-28 23:00:00'),
(2, 'ACTIVE', 'juliet wilcox', 'julietwilcox@yahoo.com', '2018-07-28 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fosa_voucher_service_key`
--

CREATE TABLE IF NOT EXISTS `fosa_voucher_service_key` (
`id` bigint(20) unsigned NOT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') NOT NULL DEFAULT 'NOT ACTIVE',
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `key` char(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fosa_voucher_service_key`
--

INSERT INTO `fosa_voucher_service_key` (`id`, `status`, `name`, `email`, `key`, `time_added`) VALUES
(1, 'ACTIVE', 'bernard', 'greendublin007@gmail.com', 'cf71b36f981e4b8b6ecd415be1d53153', '2018-07-29 15:41:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fosa_voucher`
--
ALTER TABLE `fosa_voucher`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `voucher` (`voucher`), ADD KEY `offer` (`offer`);

--
-- Indexes for table `fosa_voucher_offers`
--
ALTER TABLE `fosa_voucher_offers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `offer` (`offer_name`);

--
-- Indexes for table `fosa_voucher_recipient`
--
ALTER TABLE `fosa_voucher_recipient`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD FULLTEXT KEY `full_name` (`full_name`);

--
-- Indexes for table `fosa_voucher_service_key`
--
ALTER TABLE `fosa_voucher_service_key`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`,`email`), ADD UNIQUE KEY `key` (`key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fosa_voucher`
--
ALTER TABLE `fosa_voucher`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fosa_voucher_offers`
--
ALTER TABLE `fosa_voucher_offers`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fosa_voucher_recipient`
--
ALTER TABLE `fosa_voucher_recipient`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fosa_voucher_service_key`
--
ALTER TABLE `fosa_voucher_service_key`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
