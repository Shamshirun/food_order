-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 03:25 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `VEHICLE`
--

-- --------------------------------------------------------

--
-- Table structure for table `POLICE`
--

CREATE TABLE IF NOT EXISTS `POLICE` (
  `police_id` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(15) DEFAULT NULL,
  `jursdication` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`police_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `POLICE`
--

INSERT INTO `POLICE` (`police_id`, `password`, `jursdication`) VALUES
('12RAJ55478', 'kulli123', 'Rajajinagar');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
