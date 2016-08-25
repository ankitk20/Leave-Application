-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 09:05 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave-application`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `Google_UID` char(21) DEFAULT NULL,
  `Title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` varchar(5) NOT NULL,
  `Department_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `Designation_ID` varchar(3) NOT NULL,
  `Title` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leavehistory`
--

CREATE TABLE `leavehistory` (
  `AppliedBy` varchar(21) NOT NULL,
  `AppliedTo` varchar(21) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `LeaveType` varchar(20) NOT NULL,
  `Note` varchar(300) DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leavesallotted`
--

CREATE TABLE `leavesallotted` (
  `Designation_ID` varchar(3) DEFAULT NULL,
  `SickLeave` int(11) DEFAULT NULL,
  `CasualLeave` int(11) DEFAULT NULL,
  `Vacation` int(11) DEFAULT NULL,
  `EarlyGo` int(11) DEFAULT NULL,
  `EarnedLeave` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffdetails`
--

CREATE TABLE `staffdetails` (
  `Google_UID` char(21) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `FirstName` varchar(35) NOT NULL,
  `LastName` varchar(35) DEFAULT NULL,
  `Designation_ID` varchar(3) NOT NULL,
  `DateOfJoin` date DEFAULT NULL,
  `Contact` varchar(10) DEFAULT NULL,
  `Department_ID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD KEY `Google_UID` (`Google_UID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`),
  ADD UNIQUE KEY `Department_Name` (`Department_Name`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`Designation_ID`);

--
-- Indexes for table `leavehistory`
--
ALTER TABLE `leavehistory`
  ADD PRIMARY KEY (`AppliedBy`,`AppliedTo`,`FromDate`,`ToDate`,`LeaveType`),
  ADD KEY `AppliedTo` (`AppliedTo`);

--
-- Indexes for table `leavesallotted`
--
ALTER TABLE `leavesallotted`
  ADD KEY `Designation_ID` (`Designation_ID`);

--
-- Indexes for table `staffdetails`
--
ALTER TABLE `staffdetails`
  ADD PRIMARY KEY (`Google_UID`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `Designation_ID` (`Designation_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authority`
--
ALTER TABLE `authority`
  ADD CONSTRAINT `authority_ibfk_1` FOREIGN KEY (`Google_UID`) REFERENCES `staffdetails` (`Google_UID`);

--
-- Constraints for table `leavehistory`
--
ALTER TABLE `leavehistory`
  ADD CONSTRAINT `leavehistory_ibfk_1` FOREIGN KEY (`AppliedBy`) REFERENCES `staffdetails` (`Google_UID`),
  ADD CONSTRAINT `leavehistory_ibfk_2` FOREIGN KEY (`AppliedTo`) REFERENCES `staffdetails` (`Google_UID`);

--
-- Constraints for table `leavesallotted`
--
ALTER TABLE `leavesallotted`
  ADD CONSTRAINT `leavesallotted_ibfk_1` FOREIGN KEY (`Designation_ID`) REFERENCES `designation` (`Designation_ID`);

--
-- Constraints for table `staffdetails`
--
ALTER TABLE `staffdetails`
  ADD CONSTRAINT `staffdetails_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`),
  ADD CONSTRAINT `staffdetails_ibfk_2` FOREIGN KEY (`Designation_ID`) REFERENCES `designation` (`Designation_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
