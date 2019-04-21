-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2015 at 09:00 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prymecoders`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`c_id`, `last_name`, `first_name`, `pos_id`, `image`, `date_created`) VALUES
(1, 'MALL', 'MOH', 1, NULL, '2015-10-25 09:50:51'),
(2, 'jope', 'efe', 2, NULL, '2015-10-25 09:52:34'),
(3, 'james', 'prince', 15, NULL, '2015-10-25 09:53:22'),
(4, 'prince', 'efenure', 2, NULL, '2015-10-25 15:35:03'),
(5, 'great', 'king', 1, NULL, '2015-10-30 15:09:21'),
(6, 'nancy', 'jika', 2, NULL, '2015-10-30 15:09:43'),
(7, 'joe', 'mark', 15, NULL, '2015-10-30 15:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `options` varchar(200) NOT NULL,
  `option_name` varchar(20) NOT NULL,
  PRIMARY KEY (`option_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`options`, `option_name`) VALUES
('2025 election', 'election_desc'),
('sdsdsd', 'election_title'),
('1448305200', 'end_time'),
('yes', 'real_time_result'),
('1446289200', 'start_time');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `pos_id` int(11) NOT NULL,
  `position` varchar(250) NOT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `position`) VALUES
(1, 'president'),
(2, 'vice president'),
(15, 'software director');

-- --------------------------------------------------------

--
-- Table structure for table `record_b_election`
--

CREATE TABLE IF NOT EXISTS `record_b_election` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `total_valid_voters` varchar(250) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reg_admin`
--

CREATE TABLE IF NOT EXISTS `reg_admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reg_admin`
--

INSERT INTO `reg_admin` (`username`, `password`, `last_login_time`, `date_created`, `date_updated`, `a_id`) VALUES
('prince', '2a2a211b0de65ca359b9706cda0c5daea47c9e90', NULL, '2015-10-22 13:38:35', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg_voters`
--

CREATE TABLE IF NOT EXISTS `reg_voters` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `matric_no` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `phone_no` varchar(20) DEFAULT NULL,
  `pass_test` tinyint(1) DEFAULT '0',
  `pass_code` varchar(100) DEFAULT NULL,
  `voters_code` varchar(20) DEFAULT NULL,
  `logged_in` tinyint(1) DEFAULT '0',
  `date_registered` datetime DEFAULT NULL,
  `active` varchar(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reg_id`),
  UNIQUE KEY `matric_no` (`matric_no`,`email`,`phone_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reg_voters`
--

INSERT INTO `reg_voters` (`reg_id`, `last_name`, `first_name`, `password`, `matric_no`, `email`, `gender`, `phone_no`, `pass_test`, `pass_code`, `voters_code`, `logged_in`, `date_registered`, `active`) VALUES
(1, 'Abdullah', 'mohammed', 'fcea920f7412b5da7be0cf42b8c93759', '09/341102', 'aajingis@gmail.com', 'Male', '07068000876', 0, '2969680', '7817709', 0, '2015-10-22 16:37:55', '1'),
(2, 'efenure', 'prince', 'e11170b8cbd2d74102651cb967fa28e5', '11/341014', 'prin@gmail.com', 'Male', '08076170834', 0, '2174900', '7596359', 0, '2015-10-28 13:29:28', '1'),
(3, 'Mohammed', 'Jingis', 'fcea920f7412b5da7be0cf42b8c93759', '09/341101', 'jingis91@yahoo.com', 'Male', '07076744444', 0, '5324590', '8408439', 0, '2015-10-28 21:05:47', '1');

-- --------------------------------------------------------

--
-- Table structure for table `voted`
--

CREATE TABLE IF NOT EXISTS `voted` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(20) NOT NULL,
  `date_voted` datetime NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `voted`
--

INSERT INTO `voted` (`v_id`, `reg_id`, `date_voted`) VALUES
(1, 2, '2015-10-30 15:11:46'),
(2, 3, '2015-10-30 15:30:24'),
(3, 1, '2015-10-30 17:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(11) NOT NULL,
  `pos_id` varchar(11) NOT NULL,
  `reg_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `c_id`, `pos_id`, `reg_id`) VALUES
(4, '5', '1', 2),
(5, '6', '2', 2),
(6, '3', '15', 2),
(7, '1', '1', 3),
(8, '4', '2', 3),
(9, '3', '15', 3),
(10, '6', '2', 1),
(11, '1', '1', 1),
(12, '3', '15', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
