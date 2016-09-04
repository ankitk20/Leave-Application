-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2016 at 06:33 AM
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
  `Title` varchar(20) NOT NULL,
  `Department_ID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` varchar(10) NOT NULL,
  `Department_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`) VALUES
('CE11', 'CE'),
('ETRX10', 'ETRX'),
('EXTC11', 'EXTC'),
('INST01', 'INST'),
('IT01', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `Designation_ID` varchar(3) NOT NULL,
  `Title` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`Designation_ID`, `Title`) VALUES
('101', 'Adhoc Asssitant Professor'),
('111', 'Assistant Professor'),
('121', 'Associate Professor'),
('131', 'Professor'),
('141', 'Assistant Professor (Probation)');

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

--
-- Dumping data for table `leavehistory`
--

INSERT INTO `leavehistory` (`AppliedBy`, `AppliedTo`, `FromDate`, `ToDate`, `LeaveType`, `Note`, `Status`) VALUES
('abc', 'abcd', '2016-08-11', '2016-08-20', 'Casual', 'Note', 'PENDING');

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

--
-- Dumping data for table `leavesallotted`
--

INSERT INTO `leavesallotted` (`Designation_ID`, `SickLeave`, `CasualLeave`, `Vacation`, `EarlyGo`, `EarnedLeave`) VALUES
('101', 5, 4, 0, 4, 7),
('111', 5, 4, 35, 4, 0),
('141', 5, 4, 0, 4, 15);

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
-- Dumping data for table `staffdetails`
--

INSERT INTO `staffdetails` (`Google_UID`, `Email`, `FirstName`, `LastName`, `Designation_ID`, `DateOfJoin`, `Contact`, `Department_ID`) VALUES
('abc', 'pooja.shetty@ves.ac.in', 'Pooja', 'Shetty', '111', '2007-06-15', '9912399123', 'IT01'),
('abcd', 'parth.chandrana@ves.ac.in', 'Parth', 'Chandarana', '101', '2013-07-23', '9920666249', 'IT01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD KEY `Google_UID` (`Google_UID`),
  ADD KEY `department_id` (`Department_ID`);

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
  ADD CONSTRAINT `authority_ibfk_1` FOREIGN KEY (`Google_UID`) REFERENCES `staffdetails` (`Google_UID`),
  ADD CONSTRAINT `authority_ibfk_2` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `department` (`Department_ID`);

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
