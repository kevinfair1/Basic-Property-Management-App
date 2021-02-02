-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2021 at 05:44 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advprogp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `assignmentID` int(11) NOT NULL AUTO_INCREMENT,
  `dateAssigned` date NOT NULL,
  `ownerFirstName` varchar(255) NOT NULL,
  `ownerLastName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `problemDescription` text NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `employeeID` int(11) NOT NULL,
  PRIMARY KEY (`assignmentID`),
  KEY `employeeID` (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignmentID`, `dateAssigned`, `ownerFirstName`, `ownerLastName`, `address`, `phoneNumber`, `problemDescription`, `completed`, `employeeID`) VALUES
(6, '2019-05-12', 'Chris', 'Gilpin', '1232 Louisiana St.', '8937477473', 'Railroad broken.', 1, 5),
(7, '2019-05-10', 'John', 'Doe', '657 Anderson Rd.', '7063399922', 'Toilet leaking', 0, 0),
(8, '2018-01-04', 'Nick', 'Barker', '576 Tennessee Dr.', '8748930239', 'Oven broken.', 1, 9),
(9, '2020-04-01', 'Kevin', 'Fair', '5860 Anderson Rd.', '7063399922', 'Electricity out.', 0, 1),
(10, '2018-01-04', 'Timothy', 'Fair', '5860 Anderson Rd.', '7063399922', 'Water heater not working.', 0, 6),
(11, '2016-05-16', 'John', 'Doe', '657 Anderson Rd.', '7063399922', 'Broken window. Needs new glass.', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `firstName`, `lastName`) VALUES
(0, 'None', 'Assigned'),
(1, 'Kevin', 'Fair'),
(2, 'Prescott', 'Lerch'),
(5, 'Harcourt', 'Bull'),
(6, 'Nick', 'Barker'),
(8, 'Jack', 'Jackson'),
(9, 'William', 'Fleming');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
