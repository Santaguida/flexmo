-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2015 at 08:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flexmo_db`
--
CREATE DATABASE IF NOT EXISTS `flexmo_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `flexmo_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

DROP TABLE IF EXISTS `tbl_accounts`;
CREATE TABLE IF NOT EXISTS `tbl_accounts` (
`id` int(5) NOT NULL,
  `account` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `account`) VALUES
(1, 'DELL'),
(2, 'HP COMPUTING'),
(3, 'COMPAQ'),
(4, 'HP PRINTER'),
(5, 'CISCO'),
(6, 'HUAWEI'),
(7, 'MOTOROLA'),
(8, 'NOKIA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lines`
--

DROP TABLE IF EXISTS `tbl_lines`;
CREATE TABLE IF NOT EXISTS `tbl_lines` (
`id` int(5) NOT NULL,
  `line` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
`id` int(5) NOT NULL,
  `product` varchar(35) NOT NULL,
  `account` int(5) NOT NULL,
  `category` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- RELATIONS FOR TABLE `tbl_products`:
--   `account`
--       `tbl_accounts` -> `id`
--   `category`
--       `tbl_product_category` -> `id`
--

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product`, `account`, `category`) VALUES
(1, 'Titan14', 1, 1),
(2, 'Lati OAK', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

DROP TABLE IF EXISTS `tbl_product_category`;
CREATE TABLE IF NOT EXISTS `tbl_product_category` (
`id` int(5) NOT NULL,
  `category` varchar(35) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`id`, `category`) VALUES
(1, 'Consumer Notebook'),
(2, 'Business Notebook'),
(3, 'Consumer Desktop'),
(4, 'Business Desktp'),
(5, 'Graphic Card'),
(6, 'Tablet'),
(7, 'AIO'),
(8, 'Printer Inkjet'),
(9, 'Printer Laserjet'),
(10, 'Cellphone'),
(11, 'PSU'),
(12, 'AC Adapter'),
(13, 'Server'),
(14, 'Wi-fi Card');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_name`
--

DROP TABLE IF EXISTS `tbl_user_name`;
CREATE TABLE IF NOT EXISTS `tbl_user_name` (
`id` int(10) unsigned NOT NULL COMMENT 'Id',
  `name` varchar(255) NOT NULL COMMENT 'First name',
  `last_name` varchar(255) NOT NULL COMMENT 'last name',
  `user_name` varchar(255) NOT NULL COMMENT 'keep the format to example',
  `phone_ext` smallint(6) DEFAULT NULL COMMENT 'Company phone extension (4 numbers)',
  `register` int(10) unsigned NOT NULL COMMENT 'employee register namber',
  `badge` int(10) unsigned DEFAULT NULL COMMENT 'employee badge namber',
  `home_phone` int(10) unsigned NOT NULL COMMENT 'Home phone',
  `molibe_phone` int(10) unsigned NOT NULL COMMENT 'Cellphone',
  `e-mail` varchar(255) NOT NULL COMMENT 'email',
  `home_adress` varchar(255) NOT NULL COMMENT 'street and number',
  `neighborhood` varchar(255) NOT NULL COMMENT 'neighborhood',
  `city` varchar(255) NOT NULL COMMENT 'city',
  `password` varchar(255) NOT NULL COMMENT 'password encrypted',
  `occupation` varchar(255) NOT NULL COMMENT 'function in company',
  `shift` tinyint(3) unsigned NOT NULL COMMENT 'shift',
  `level_access` tinyint(3) unsigned NOT NULL COMMENT 'level access'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- Indexes for table `tbl_lines`
--
ALTER TABLE `tbl_lines`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `product` (`product`), ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- Indexes for table `tbl_user_name`
--
ALTER TABLE `tbl_user_name`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_lines`
--
ALTER TABLE `tbl_lines`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_user_name`
--
ALTER TABLE `tbl_user_name`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
