-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 02:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `uid` int(10) NOT NULL,
  `task` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`uid`, `task`) VALUES
(726, 'Gas Bill Payment'),
(15, 'Vodafone bill payment');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(37, 15, '2019-11-12', 'Anything', '1111', '2019-11-12 19:54:07'),
(38, 15, '2019-11-08', 'Fruits', '500', '2019-11-13 03:59:58'),
(39, 15, '2019-10-17', 'Vegatables', '100', '2019-11-13 04:01:00'),
(40, 183, '2019-11-13', 'IphoneX', '100000', '2019-11-13 04:39:56'),
(41, 915, '2019-11-13', 'bought a cellphone', '15000', '2019-11-13 04:56:45'),
(42, 915, '2019-10-09', 'Bought  an AC', '35000', '2019-11-13 04:57:51'),
(43, 915, '2019-11-13', 'zz', 'fgt', '2019-11-13 04:59:36'),
(44, 15, '2019-11-15', 'Mobile', '10000', '2019-11-14 19:51:31'),
(45, 470, '2019-11-15', 'Refrigerator', '16000', '2019-11-15 08:36:29'),
(46, 470, '2019-10-17', 'AC', '30000', '2019-11-15 08:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`) VALUES
(15, 'Pratik', 'pats@gmail.com', 9988664433, 'shubh'),
(17, 'Patari', 'ppp@gmail.com', 8889997773, 'sss'),
(183, 'Mohit', 'mohit@gmail.com', 8767545401, 'dostaar'),
(470, 'Tejas Karia', 'tej@gmail.com', 1234567890, 'imaginetej'),
(726, 'Jignesh', 'jignesh.n@somaiya.edu', 5544336677, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=727;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
