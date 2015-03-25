-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2015 at 02:59 PM
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
  `account` varchar(35) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `account`, `enabled`) VALUES
(1, 'DELL', 0),
(2, 'HP COMPUTING', 0),
(3, 'COMPAQ', 0),
(4, 'HP PRINTER', 0),
(5, 'CISCO', 0),
(6, 'HUAWEI', 0),
(7, 'MOTOROLA', 0),
(8, 'NOKIA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_actions`
--

DROP TABLE IF EXISTS `tbl_ict_actions`;
CREATE TABLE IF NOT EXISTS `tbl_ict_actions` (
`id` int(5) NOT NULL,
  `action` varchar(35) NOT NULL,
  `enabled` varchar(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_config`
--

DROP TABLE IF EXISTS `tbl_ict_config`;
CREATE TABLE IF NOT EXISTS `tbl_ict_config` (
`id` int(5) unsigned NOT NULL,
  `line` int(5) unsigned NOT NULL,
  `product` int(5) unsigned NOT NULL,
  `machine` int(5) unsigned NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_currently_skipped`
--

DROP TABLE IF EXISTS `tbl_ict_currently_skipped`;
CREATE TABLE IF NOT EXISTS `tbl_ict_currently_skipped` (
`id` int(5) unsigned NOT NULL,
  `product` int(5) unsigned NOT NULL COMMENT 'FK to tbl_product',
  `reason` varchar(255) NOT NULL,
  `devices` varchar(255) NOT NULL,
  `user_name_start` int(5) unsigned NOT NULL COMMENT 'FK to tbl_users',
  `date_time_start` int(14) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_history`
--

DROP TABLE IF EXISTS `tbl_ict_history`;
CREATE TABLE IF NOT EXISTS `tbl_ict_history` (
`id` int(5) unsigned NOT NULL,
  `date_time_start` int(14) unsigned NOT NULL,
  `date_time_end` int(14) unsigned DEFAULT NULL,
  `product` int(5) unsigned NOT NULL COMMENT 'FK to tbl_products',
  `machine` int(5) unsigned NOT NULL COMMENT 'FK to tbl_ict_machines',
  `line` int(5) unsigned NOT NULL COMMENT 'FK to tbl_lines',
  `user` int(5) unsigned NOT NULL COMMENT 'FK to tbl_users',
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_machines`
--

DROP TABLE IF EXISTS `tbl_ict_machines`;
CREATE TABLE IF NOT EXISTS `tbl_ict_machines` (
`id` int(5) unsigned NOT NULL,
  `machine` varchar(35) NOT NULL,
  `model` varchar(35) DEFAULT NULL,
  `serial_number` varchar(35) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_skip_history`
--

DROP TABLE IF EXISTS `tbl_ict_skip_history`;
CREATE TABLE IF NOT EXISTS `tbl_ict_skip_history` (
`id` int(5) unsigned NOT NULL,
  `product` int(5) unsigned NOT NULL COMMENT 'FK to tbl_products',
  `reason` varchar(255) NOT NULL,
  `devices` varchar(255) NOT NULL,
  `user_name_start` int(5) unsigned NOT NULL COMMENT 'FK to tbl_users',
  `user_name_end` int(5) unsigned NOT NULL COMMENT 'FK to tbl_users',
  `date_time_start` int(14) unsigned NOT NULL COMMENT 'yyyyMMddhhmmss',
  `date_time_end` int(14) unsigned NOT NULL COMMENT 'yyyyMMddhhmmss'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_steps`
--

DROP TABLE IF EXISTS `tbl_ict_steps`;
CREATE TABLE IF NOT EXISTS `tbl_ict_steps` (
`id` int(5) unsigned NOT NULL,
  `step` varchar(35) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_sw_param`
--

DROP TABLE IF EXISTS `tbl_ict_sw_param`;
CREATE TABLE IF NOT EXISTS `tbl_ict_sw_param` (
`id` int(5) NOT NULL,
  `parameter` varchar(35) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ict_trigger`
--

DROP TABLE IF EXISTS `tbl_ict_trigger`;
CREATE TABLE IF NOT EXISTS `tbl_ict_trigger` (
`id` int(5) unsigned NOT NULL,
  `config` int(5) unsigned NOT NULL COMMENT 'FK to tbl_ict_config',
  `status` varchar(35) NOT NULL COMMENT 'status update'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lines`
--

DROP TABLE IF EXISTS `tbl_lines`;
CREATE TABLE IF NOT EXISTS `tbl_lines` (
`id` int(5) NOT NULL,
  `line` varchar(10) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
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
  `category` int(5) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product`, `account`, `category`, `enabled`) VALUES
(1, 'Titan14', 1, 1, 0),
(2, 'Lati OAK', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

DROP TABLE IF EXISTS `tbl_product_category`;
CREATE TABLE IF NOT EXISTS `tbl_product_category` (
`id` int(5) NOT NULL,
  `category` varchar(35) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`id`, `category`, `enabled`) VALUES
(1, 'Consumer Notebook', 0),
(2, 'Business Notebook', 0),
(3, 'Consumer Desktop', 0),
(4, 'Business Desktp', 0),
(5, 'Graphic Card', 0),
(6, 'Tablet', 0),
(7, 'AIO', 0),
(8, 'Printer Inkjet', 0),
(9, 'Printer Laserjet', 0),
(10, 'Cellphone', 0),
(11, 'PSU', 0),
(12, 'AC Adapter', 0),
(13, 'Server', 0),
(14, 'Wi-fi Card', 0);

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
  `molibe_phone` int(11) unsigned NOT NULL COMMENT 'Cellphone',
  `e-mail` varchar(255) NOT NULL COMMENT 'email',
  `home_adress` varchar(255) NOT NULL COMMENT 'street and number',
  `neighborhood` varchar(255) NOT NULL COMMENT 'neighborhood',
  `city` varchar(255) NOT NULL COMMENT 'city',
  `password` varchar(255) NOT NULL COMMENT 'password encrypted',
  `occupation` varchar(255) NOT NULL COMMENT 'function in company',
  `shift` tinyint(3) unsigned NOT NULL COMMENT 'shift',
  `level_access` tinyint(3) unsigned NOT NULL COMMENT 'level access',
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
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
-- Indexes for table `tbl_ict_actions`
--
ALTER TABLE `tbl_ict_actions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ict_config`
--
ALTER TABLE `tbl_ict_config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ict_currently_skipped`
--
ALTER TABLE `tbl_ict_currently_skipped`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ict_history`
--
ALTER TABLE `tbl_ict_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ict_machines`
--
ALTER TABLE `tbl_ict_machines`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `machine` (`machine`,`model`);

--
-- Indexes for table `tbl_ict_skip_history`
--
ALTER TABLE `tbl_ict_skip_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ict_steps`
--
ALTER TABLE `tbl_ict_steps`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ict_sw_param`
--
ALTER TABLE `tbl_ict_sw_param`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ict_trigger`
--
ALTER TABLE `tbl_ict_trigger`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_ict_actions`
--
ALTER TABLE `tbl_ict_actions`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ict_config`
--
ALTER TABLE `tbl_ict_config`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ict_currently_skipped`
--
ALTER TABLE `tbl_ict_currently_skipped`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ict_history`
--
ALTER TABLE `tbl_ict_history`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ict_machines`
--
ALTER TABLE `tbl_ict_machines`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ict_skip_history`
--
ALTER TABLE `tbl_ict_skip_history`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ict_steps`
--
ALTER TABLE `tbl_ict_steps`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ict_sw_param`
--
ALTER TABLE `tbl_ict_sw_param`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ict_trigger`
--
ALTER TABLE `tbl_ict_trigger`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
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
