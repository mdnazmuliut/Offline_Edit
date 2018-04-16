-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2017 at 01:43 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `local_history`
--

-- --------------------------------------------------------

--
-- Table structure for table `fied_text`
--

CREATE TABLE IF NOT EXISTS `fied_text` (
  `id` bigint(12) NOT NULL,
  `pid` bigint(12) DEFAULT NULL,
  `field_name` varchar(20) DEFAULT NULL,
  `text` text,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fied_text`
--

INSERT INTO `fied_text` (`id`, `pid`, `field_name`, `text`, `updated_at`) VALUES

(345, 5656, 'field_1', 'casd fasd', '2017-11-15 01:39:29'),
(346, 5656, 'field_5', 'rcwtcwre fgsd fgfds', '2017-11-15 01:39:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fied_text`
--
ALTER TABLE `fied_text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fied_text`
--
ALTER TABLE `fied_text`
  MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=347;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
