-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2016 at 10:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Leave-Application`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sub` char(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `deptID` varchar(5) NOT NULL,
  `dname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desgnID` varchar(3) NOT NULL,
  `title` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DHOD`
--

CREATE TABLE `DHOD` (
  `sub` char(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HOD`
--

CREATE TABLE `HOD` (
  `sub` char(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leaveHistory`
--

CREATE TABLE `leaveHistory` (
  `appliedBy` varchar(21) NOT NULL,
  `appliedTo` varchar(21) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `leaveType` varchar(20) NOT NULL,
  `note` varchar(300) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leavesAllotted`
--

CREATE TABLE `leavesAllotted` (
  `desgnID` varchar(3) DEFAULT NULL,
  `SL` int(11) DEFAULT NULL,
  `CL` int(11) DEFAULT NULL,
  `VAC` int(11) DEFAULT NULL,
  `EG` int(11) DEFAULT NULL,
  `EL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `sub` char(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffDetails`
--

CREATE TABLE `staffDetails` (
  `sub` char(21) NOT NULL,
  `email` varchar(320) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `lname` varchar(35) DEFAULT NULL,
  `desgnID` varchar(3) NOT NULL,
  `DOJ` date NOT NULL,
  `contact` char(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `deptID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vprincipal`
--

CREATE TABLE `vprincipal` (
  `sub` char(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `sub` (`sub`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`deptID`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desgnID`);

--
-- Indexes for table `DHOD`
--
ALTER TABLE `DHOD`
  ADD KEY `sub` (`sub`);

--
-- Indexes for table `HOD`
--
ALTER TABLE `HOD`
  ADD KEY `sub` (`sub`);

--
-- Indexes for table `leaveHistory`
--
ALTER TABLE `leaveHistory`
  ADD PRIMARY KEY (`appliedBy`,`appliedTo`,`fromDate`,`toDate`,`leaveType`),
  ADD KEY `appliedTo` (`appliedTo`);

--
-- Indexes for table `leavesAllotted`
--
ALTER TABLE `leavesAllotted`
  ADD KEY `dID` (`desgnID`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD KEY `sub` (`sub`);

--
-- Indexes for table `staffDetails`
--
ALTER TABLE `staffDetails`
  ADD PRIMARY KEY (`sub`),
  ADD KEY `dID` (`desgnID`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `vprincipal`
--
ALTER TABLE `vprincipal`
  ADD KEY `sub` (`sub`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`sub`) REFERENCES `staffDetails` (`sub`);

--
-- Constraints for table `DHOD`
--
ALTER TABLE `DHOD`
  ADD CONSTRAINT `DHOD_ibfk_1` FOREIGN KEY (`sub`) REFERENCES `staffDetails` (`sub`);

--
-- Constraints for table `HOD`
--
ALTER TABLE `HOD`
  ADD CONSTRAINT `HOD_ibfk_1` FOREIGN KEY (`sub`) REFERENCES `staffDetails` (`sub`);

--
-- Constraints for table `leaveHistory`
--
ALTER TABLE `leaveHistory`
  ADD CONSTRAINT `leaveHistory_ibfk_1` FOREIGN KEY (`appliedBy`) REFERENCES `staffDetails` (`sub`),
  ADD CONSTRAINT `leaveHistory_ibfk_2` FOREIGN KEY (`appliedTo`) REFERENCES `staffDetails` (`sub`);

--
-- Constraints for table `leavesAllotted`
--
ALTER TABLE `leavesAllotted`
  ADD CONSTRAINT `leavesAllotted_ibfk_1` FOREIGN KEY (`desgnID`) REFERENCES `designation` (`desgnID`);

--
-- Constraints for table `principal`
--
ALTER TABLE `principal`
  ADD CONSTRAINT `principal_ibfk_1` FOREIGN KEY (`sub`) REFERENCES `staffDetails` (`sub`);

--
-- Constraints for table `staffDetails`
--
ALTER TABLE `staffDetails`
  ADD CONSTRAINT `staffDetails_ibfk_1` FOREIGN KEY (`desgnID`) REFERENCES `designation` (`desgnID`),
  ADD CONSTRAINT `staffDetails_ibfk_2` FOREIGN KEY (`deptID`) REFERENCES `dept` (`deptID`);

--
-- Constraints for table `vprincipal`
--
ALTER TABLE `vprincipal`
  ADD CONSTRAINT `vprincipal_ibfk_1` FOREIGN KEY (`sub`) REFERENCES `staffDetails` (`sub`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
