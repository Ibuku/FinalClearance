-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2016 at 10:49 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_clearance`
--
CREATE DATABASE IF NOT EXISTS `project_clearance` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project_clearance`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'Poly Admin');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric` varchar(45) NOT NULL,
  `rrr` varchar(45) NOT NULL,
  `date_applied` varchar(45) NOT NULL,
  `date_approved` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `officer` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `matric`, `rrr`, `date_applied`, `date_approved`, `status`, `officer`) VALUES
(1, 'cs201405457pt', 'B108641189', '1480025904', '1480025996', 2, 'Poly Admin');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Accountancy'),
(2, 'Architectural Technology'),
(3, 'Banking and Finance'),
(4, 'Building Tech'),
(5, 'Business Administration and Mgt.'),
(6, 'Civil Engineering Technology'),
(7, 'Computer Engineering Technology'),
(8, 'Computer Science'),
(9, 'Electrical Electronics Engineering Tech.'),
(10, 'Estate Management'),
(11, 'Geology'),
(12, 'Hospitality Mgt'),
(13, 'Leisure and Tourism Management'),
(14, 'Library and Information Science'),
(15, 'Mechanical Engineering Technology'),
(16, 'Nutrition and Dietetics'),
(17, 'Office Technology Management'),
(18, 'Quantity Surveying'),
(19, 'Science Laboratory Technology'),
(20, 'Statistics'),
(21, 'Surveying and Geo-informatics');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric` varchar(40) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `state` varchar(60) NOT NULL,
  `department` varchar(45) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `app_date` varchar(100) NOT NULL,
  `on_campus` varchar(45) NOT NULL,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matric` (`matric`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `matric`, `password`, `name`, `gender`, `state`, `department`, `room_no`, `semester`, `address`, `phone`, `app_date`, `on_campus`, `level`) VALUES
(1, 'cs201405457pt', 'cs201405457pt', 'Akeem Adewale basit', 'Male', 'Osun State', 'Computer Science', '', 'second semester', 'Poly road', '08165793476', '1480025026', 'No', 'ND PT YR 3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
