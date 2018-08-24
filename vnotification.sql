-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2014 at 10:24 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vnotification`
--
CREATE DATABASE IF NOT EXISTS `vnotification` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vnotification`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rights` int(11) NOT NULL,
  `extra` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `rights`, `extra`, `email`) VALUES
(1, 'bhavesh', '1234', 'Bhavesh_Sanghvi', 0, 1, ''),
(2, 'akshay', '1234', 'Akshay_Orpe', 1, 1, ''),
(3, 'hod', '1234', 'hod', 0, 1, ''),
(4, 'principal', '1234', 'principal', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `user_id` int(64) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`user_id`, `group_name`, `id`, `group_id`) VALUES
(1, 'TE_COMPUTER_1', 6, 1232445),
(1, 'TE COMPUTER 2', 7, 0),
(1, 'TE ETRX 1', 8, 0),
(1, 'TE ETRX 2', 9, 0),
(2, 'TE COMPUTER 2', 10, 0),
(2, 'TE COMPUTER 2 BATCH 1', 11, 0),
(1, 'TE COMPUTER 2 BATCH 1', 12, 0),
(1, 'TE COMPUTER 1 BATCH 2', 14, 0),
(1, 'TE COMPUTER 1 BATCH 1', 15, 0),
(2, 'TE COMPUTER 2 BATCH 2', 16, 0),
(1, 'TE COMPUTER 2 BATCH 2', 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `group_permission` tinytext NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `title`, `group_permission`, `msg`, `time`, `user_id`) VALUES
(29, 'bhavesh', 'this is some demo', 'TE', 'this is some demo', '2014-03-31 10:15:47', 1),
(30, 'bhavesh', 'this is some demo', 'TE', 'this is some demo', '2014-03-31 10:15:54', 1),
(31, 'bhavesh', 'bhavesh', 'TE', 'bhavesh', '2014-03-31 10:16:00', 1),
(32, 'bhavesh', 'bhavesg', 'TE_COMPUTER_1', 'fdgf', '2014-03-31 10:16:02', 1),
(33, 'bhavesh', 'this is some text', 'TE', 'this is notification mesage\r\n', '2014-03-31 10:17:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_temp`
--

CREATE TABLE IF NOT EXISTS `post_temp` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `user_id` int(64) NOT NULL,
  `group_permission` tinytext NOT NULL,
  `title` varchar(200) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
