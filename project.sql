-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2016 at 01:55 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fname`, `lname`, `email`, `password`) VALUES
('', '', '', ''),
('Admin', 'Name', 'admin.name@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fileToUpload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`title`, `type`, `fileToUpload`) VALUES
('TimeTable', 'student', '06066743.pdf'),
('WAITLISTED CANDIDATE SELECTED FOR ADMISSION TO PhD PROGRAMME- EVEN SEMESTER, 2015-16', 'general', '06175618.pdf'),
('Circular regarding NITD-EST-Fire-02-2016', 'general', '06257192.pdf'),
('Circular regarding Open Government Data Platform', 'general', '06480046.pdf'),
('Office Order Regarding Internal Complaints Committee', 'general', '06525599.pdf'),
('Circular regarding the Central Public Procurement Portal using e-Publishing module', 'general', '06525605.pdf'),
('Notice regarding Inter NIT Cricket Tournament ', 'student', '07013167.pdf'),
('Suspension of classes in second half of 05.02.2016 ', 'student', '07389151.pdf'),
('Hello', 'student', 'hicss_2012_smartcities.pdf'),
('qwerty', 'student', '4892b695.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `fatname` varchar(255) NOT NULL,
  `height` int(4) NOT NULL,
  `weight` int(4) NOT NULL,
  `lefts` double NOT NULL,
  `rights` double NOT NULL,
  `perAddress` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hobbies` text NOT NULL,
  `photo` text NOT NULL,
  `branch` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `preAddress` text NOT NULL,
  `dayscholar` varchar(10) NOT NULL,
  `s1` double NOT NULL,
  `s2` double NOT NULL,
  `s3` double NOT NULL,
  `s4` double NOT NULL,
  `s5` double NOT NULL,
  `s6` double NOT NULL,
  `s7` double NOT NULL,
  `s8` double NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
