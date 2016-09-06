-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2016 at 10:38 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

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
-- Table structure for table `Authority`
--

CREATE TABLE `Authority` (
  `Google_UID` char(21) DEFAULT NULL,
  `Title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Authority`
--

INSERT INTO `Authority` (`Google_UID`, `Title`) VALUES
('109269473201965754237', 'HOD'),
('abc', 'DHOD');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `Department_ID` varchar(10) NOT NULL,
  `Department_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`Department_ID`, `Department_Name`) VALUES
('CE11', 'CE'),
('ETRX10', 'ETRX'),
('EXTC11', 'EXTC'),
('INST01', 'INST'),
('IT01', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `Designation`
--

CREATE TABLE `Designation` (
  `Designation_ID` varchar(3) NOT NULL,
  `Title` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Designation`
--

INSERT INTO `Designation` (`Designation_ID`, `Title`) VALUES
('101', 'Adhoc Asssitant Professor'),
('111', 'Assistant Professor'),
('121', 'Associate Professor'),
('131', 'Professor'),
('141', 'Assistant Professor (Probation)');

-- --------------------------------------------------------

--
-- Table structure for table `LeaveHistory`
--

CREATE TABLE `LeaveHistory` (
  `AppliedBy` varchar(21) NOT NULL,
  `AppliedTo` varchar(21) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `LeaveType` varchar(20) NOT NULL,
  `Note` varchar(300) DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LeaveHistory`
--

INSERT INTO `LeaveHistory` (`AppliedBy`, `AppliedTo`, `FromDate`, `ToDate`, `LeaveType`, `Note`, `Status`) VALUES
('109269473201965754237', 'abc', '2016-09-01', '2016-09-02', 'abcd', '1234', 'PENDING'),
('109269473201965754237', 'abc', '2016-09-14', '2016-09-17', 'abcdefgh', '<script>alert();</script>', 'PENDING'),
('abc', '109269473201965754237', '2016-09-08', '2016-09-16', 'abcd', '1234', 'PENDING'),
('abc', 'abcd', '2016-02-25', '2016-03-25', 'casual', 'note', 'PENDING'),
('abc', 'abcd', '2016-09-11', '2016-09-11', 'cas', 'a', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `LeavesAllotted`
--

CREATE TABLE `LeavesAllotted` (
  `Designation_ID` varchar(3) DEFAULT NULL,
  `Sick Leave` int(11) DEFAULT NULL,
  `Casual Leave` int(11) DEFAULT NULL,
  `Vacation` int(11) DEFAULT NULL,
  `Early Go` int(11) DEFAULT NULL,
  `Earned Leave` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LeavesAllotted`
--

INSERT INTO `LeavesAllotted` (`Designation_ID`, `Sick Leave`, `Casual Leave`, `Vacation`, `Early Go`, `Earned Leave`) VALUES
('101', 5, 4, 0, 4, 7),
('111', 5, 4, 35, 4, 0),
('141', 5, 4, 0, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `StaffDetails`
--

CREATE TABLE `StaffDetails` (
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
-- Dumping data for table `StaffDetails`
--

INSERT INTO `StaffDetails` (`Google_UID`, `Email`, `FirstName`, `LastName`, `Designation_ID`, `DateOfJoin`, `Contact`, `Department_ID`) VALUES
('109269473201965754237', 'abhinav.valecha@ves.ac.in', 'Abhinav', 'Valecha', '101', '2016-09-28', '1234', 'CE11'),
('abc', 'pooja.shetty@ves.ac.in', 'Pooja', 'Shetty', '111', '2007-06-15', '9912399123', 'CE11'),
('abcd', 'parth.chandrana@ves.ac.in', 'Parth', 'Chandarana', '101', '2013-07-23', '9920666249', 'IT01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Authority`
--
ALTER TABLE `Authority`
  ADD KEY `Google_UID` (`Google_UID`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`Department_ID`),
  ADD UNIQUE KEY `Department_Name` (`Department_Name`);

--
-- Indexes for table `Designation`
--
ALTER TABLE `Designation`
  ADD PRIMARY KEY (`Designation_ID`);

--
-- Indexes for table `LeaveHistory`
--
ALTER TABLE `LeaveHistory`
  ADD PRIMARY KEY (`AppliedBy`,`AppliedTo`,`FromDate`,`ToDate`,`LeaveType`),
  ADD KEY `AppliedTo` (`AppliedTo`);

--
-- Indexes for table `LeavesAllotted`
--
ALTER TABLE `LeavesAllotted`
  ADD KEY `Designation_ID` (`Designation_ID`);

--
-- Indexes for table `StaffDetails`
--
ALTER TABLE `StaffDetails`
  ADD PRIMARY KEY (`Google_UID`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `Designation_ID` (`Designation_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Authority`
--
ALTER TABLE `Authority`
  ADD CONSTRAINT `Authority_ibfk_1` FOREIGN KEY (`Google_UID`) REFERENCES `StaffDetails` (`Google_UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `LeaveHistory`
--
ALTER TABLE `LeaveHistory`
  ADD CONSTRAINT `LeaveHistory_ibfk_1` FOREIGN KEY (`AppliedBy`) REFERENCES `StaffDetails` (`Google_UID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LeaveHistory_ibfk_2` FOREIGN KEY (`AppliedTo`) REFERENCES `StaffDetails` (`Google_UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `LeavesAllotted`
--
ALTER TABLE `LeavesAllotted`
  ADD CONSTRAINT `LeavesAllotted_ibfk_1` FOREIGN KEY (`Designation_ID`) REFERENCES `Designation` (`Designation_ID`);

--
-- Constraints for table `StaffDetails`
--
ALTER TABLE `StaffDetails`
  ADD CONSTRAINT `StaffDetails_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `Department` (`Department_ID`),
  ADD CONSTRAINT `StaffDetails_ibfk_2` FOREIGN KEY (`Designation_ID`) REFERENCES `Designation` (`Designation_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
