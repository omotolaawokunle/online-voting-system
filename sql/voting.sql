-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2018 at 09:43 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `password` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `username`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `votecount` int(11) NOT NULL DEFAULT '0',
  `validate` tinyint(1) NOT NULL DEFAULT '0',
  `dob` varchar(100) DEFAULT NULL,
  `gender` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `position`, `name`, `state`, `platform`, `picture`, `votecount`, `validate`, `dob`, `gender`) VALUES
(1, 'Presidency', 'Ade Mitchell', 'Abuja FCT', 'SDP', 'damien vs malcolm.png', 5, 1, NULL, 'Male'),
(2, 'Presidency', 'Kolawole James', 'Lagos', 'ACN', 'passport.jpg', 4, 1, NULL, 'Male'),
(3, 'Governor', 'Olubori Aregbe', 'Abuja FCT', 'SDP', 'damien vs malcolm.png', 0, 1, NULL, 'Male'),
(4, 'Governor', 'Adeolu Omisore', 'Abuja FCT', 'ACN', 'Av.png', 2, 1, NULL, 'Male'),
(5, 'Presidency', 'Ayanfeoluwa Owoseeni', 'Abuja FCT', 'ACN', 'finger vote.jpg', 2, 1, NULL, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

DROP TABLE IF EXISTS `party`;
CREATE TABLE IF NOT EXISTS `party` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `name`, `abbr`) VALUES
(1, 'Social Democratic Party', 'SDP'),
(2, 'Action Congress of Nigeria', 'ACN');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posts` varchar(50) NOT NULL,
  `limits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `posts`, `limits`) VALUES
(1, 'Governor', 5),
(2, 'Presidency', 3);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `votecount`
--

DROP TABLE IF EXISTS `votecount`;
CREATE TABLE IF NOT EXISTS `votecount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CandID` varchar(100) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Result` int(11) NOT NULL,
  `VoterID` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votecount`
--

INSERT INTO `votecount` (`id`, `CandID`, `Position`, `Result`, `VoterID`) VALUES
(2, 'Kolawole James', 'Presidency', 1, 'Olu Maintain'),
(3, 'Ade Mitchell', 'Presidency', 1, 'Adelu Adeolu'),
(4, 'Kolawole James', 'Presidency', 1, 'Olu Maintain'),
(5, 'Kolawole James', 'Presidency', 1, 'Olu Maintain'),
(6, 'Adeolu Omisore', 'Governor', 1, 'Ogunleye Tosin'),
(7, 'Ayanfeoluwa Owoseeni', 'Presidency', 1, 'Cho Chang'),
(8, 'Adeolu Omisore', 'Governor', 1, 'Ogunleye Tosin'),
(9, 'Ayanfeoluwa Owoseeni', 'Presidency', 1, 'Cho Chang');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

DROP TABLE IF EXISTS `voters`;
CREATE TABLE IF NOT EXISTS `voters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pnumber` varchar(13) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `nextofkin` varchar(255) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `name`, `password`, `state`, `pnumber`, `picture`, `nextofkin`, `dob`, `email`, `code`) VALUES
(2, 'Olu Maintain', '39c261c1bc708cdbef32ac9b2254f2c7', 'Abuja FCT', '08134565321', 'Omotola.jpg', 'Daddy Maintain', 'Jan 3, 1980', 'olum@yahoo.com', 1567),
(3, 'Kolawole James', '264a568ab98ab8654dbfa30147776d9b', 'Abuja FCT', '08078965432', 'white bg.png', 'Oluwole James', 'Feb 15, 1992', 'kolinton@gmail.com', 2367),
(4, 'Adelu Adeolu', '66207788c96db144dbbf0249b74a1d5a', 'Abuja FCT', '07089657432', 'Power Rangers.png', 'Adelu Adewale', 'Dec 1, 1958', 'adeade@gmail.com', 9865),
(5, 'Ogunleye Tosin', '5923d7c2341d0bf7d8cecb3c8c9d0078', 'Abuja FCT', '08176543278', 'sell.jpg', 'Mr Ogunleye', 'Mar 1, 1999', 'ogunleyetosin@gmail.com', 6957),
(6, 'Cho Chang', 'bb97354e4173df9819936fabcfcabecf', 'Abuja FCT', '08143563245', '404.png', 'Mrs Chang', 'Jun 6, 2000', 'chochang@hogwarts.magic', 5228),
(7, 'China White', '8a7d7ba288ca0f0ea1ecf975b026e8e1', 'Abuja FCT', '07089654321', 'CodeSell2.jpg.png', 'Japan White', 'Jun 11, 2008', 'chwhite@gmail.com', 5874),
(8, 'Japan White', '578ed5a4eecf5a15803abdc49f6152d6', 'Abuja FCT', '09043786512', 'newlogo-slogan2.png', 'China White', 'Jun 2, 1998', 'jpwhite@gmail.com', 1567);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
