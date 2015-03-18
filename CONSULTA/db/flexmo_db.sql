-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Mar-2015 às 17:53
-- Versão do servidor: 5.6.21
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_user_name`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user_name`
--
ALTER TABLE `tbl_user_name`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user_name`
--
ALTER TABLE `tbl_user_name`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
