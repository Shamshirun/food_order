-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 03:26 PM
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
-- Table structure for table `CASE`
--

CREATE TABLE IF NOT EXISTS `CASE` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `offence_id` int(11) DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `date_of` date DEFAULT NULL,
  `reg_no` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `due_amt` int(5) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `offence_id` (`offence_id`),
  KEY `reg_no` (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `NOTIFICATION`
--

CREATE TABLE IF NOT EXISTS `NOTIFICATION` (
  `case_id` int(11) DEFAULT NULL,
  `owner_id` varchar(15) DEFAULT NULL,
  `notify` varchar(50) DEFAULT NULL,
  KEY `case_id` (`case_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `OFFENCE`
--

CREATE TABLE IF NOT EXISTS `OFFENCE` (
  `offence_id` int(11) NOT NULL AUTO_INCREMENT,
  `offence_name` varchar(30) DEFAULT NULL,
  `offence_fine` int(5) DEFAULT NULL,
  PRIMARY KEY (`offence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `OWNER`
--

CREATE TABLE IF NOT EXISTS `OWNER` (
  `owner_id` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(30) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OWNER`
--

INSERT INTO `OWNER` (`owner_id`, `name`, `phone`, `address`, `dob`) VALUES
('111', 'Ruthvik Vijayakumar', '8970464490', 'Rajajinagar, Industrial Town', '1996-03-13'),
('121', 'Aravind Kumar Halahalli', '8296392602', 'Mogha, Kalburgi', '1997-02-15'),
('124', 'Deepika R', '8892841337', 'Peenya', '1997-08-15');

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

-- --------------------------------------------------------

--
-- Table structure for table `RECEIPT`
--

CREATE TABLE IF NOT EXISTS `RECEIPT` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(20) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `police_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`receipt_id`),
  KEY `reg_no` (`reg_no`),
  KEY `case_id` (`case_id`),
  KEY `police_id` (`police_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE`
--

CREATE TABLE IF NOT EXISTS `VEHICLE` (
  `reg_no` varchar(20) NOT NULL DEFAULT '',
  `insured` tinyint(1) DEFAULT NULL,
  `emission_test` tinyint(1) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `make` varchar(20) DEFAULT NULL,
  `owner_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`reg_no`),
  UNIQUE KEY `reg_no` (`reg_no`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VEHICLE`
--

INSERT INTO `VEHICLE` (`reg_no`, `insured`, `emission_test`, `model`, `make`, `owner_id`) VALUES
('KA03MB1888', 0, 0, '800', 'Maruthi', '124'),
('KA04MB1873', 1, 1, 'Dio', 'Honda', '111'),
('KA32ET7926', 0, 0, 'Splendor Plus ', 'Hero Honda', '121');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CASE`
--
ALTER TABLE `CASE`
  ADD CONSTRAINT `CASE_ibfk_1` FOREIGN KEY (`offence_id`) REFERENCES `OFFENCE` (`offence_id`),
  ADD CONSTRAINT `CASE_ibfk_2` FOREIGN KEY (`reg_no`) REFERENCES `VEHICLE` (`reg_no`);

--
-- Constraints for table `NOTIFICATION`
--
ALTER TABLE `NOTIFICATION`
  ADD CONSTRAINT `NOTIFICATION_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `CASE` (`case_id`),
  ADD CONSTRAINT `NOTIFICATION_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `OWNER` (`owner_id`);

--
-- Constraints for table `RECEIPT`
--
ALTER TABLE `RECEIPT`
  ADD CONSTRAINT `RECEIPT_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `VEHICLE` (`reg_no`),
  ADD CONSTRAINT `RECEIPT_ibfk_2` FOREIGN KEY (`case_id`) REFERENCES `CASE` (`case_id`),
  ADD CONSTRAINT `RECEIPT_ibfk_3` FOREIGN KEY (`police_id`) REFERENCES `POLICE` (`police_id`);

--
-- Constraints for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  ADD CONSTRAINT `VEHICLE_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `OWNER` (`owner_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
