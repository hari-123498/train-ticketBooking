-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 12:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldept`
--

CREATE TABLE `tbldept` (
  `Trainid` varchar(10) NOT NULL,
  `Trainname` varchar(250) NOT NULL,
  `Departurecity` varchar(50) NOT NULL,
  `Arrivalcity` varchar(250) NOT NULL,
  `Depaturetime` varchar(20) NOT NULL,
  `Arrivaltime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldept`
--

INSERT INTO `tbldept` ( `Trainid`,`Trainname`,`Departurecity`,`Arrivalcity`,`Depaturetime`,`Arrivaltime`) VALUES
('22343', 'A', 'Rjm', 'vijyawada', '12:00','7:00'),
('22345', 'A', 'Rjm', 'vijyawada', '12:00','7:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblreigstration`
--

CREATE TABLE `tblreigstration` (
  `userid` varchar(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `whenis`varchar(12) NOT NULL,
  `addressis` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `Trainid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreigstration`
--

INSERT INTO `tblreigstration` (`userid`, `username`, `gender`,`whenis`, `addressis`, `phoneno`,`Trainid`) VALUES
('0235', 'RAJU', 'male', '12-10-2010','angara','954xxxxxx', '22343'),
('0236', 'Arun', 'female', '2024-08-08','medapeta','879xxxxx', '22345');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`username`, `password`, `email`) VALUES
('vsm01', 'f303843e3c94cfbb5d3bc57fa95b75bb', 'a@g.com'),
('vsm02', '83d8a49f860e128b622268ab2b36c9eb', 'a@goo.com'),
('vsm03', '9074e8951728671a90483af6a741297d', 'a@a.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldept`
--
ALTER TABLE `tbldept`
  ADD PRIMARY KEY (`Trainid`);

--
-- Indexes for table `tblreigstration`
--
ALTER TABLE `tblreigstration`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `dept_student_P_F` (`Trainid`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblstudent`
--
ALTER TABLE `tblreigstration`
  ADD CONSTRAINT `dept_student_P_F` FOREIGN KEY (`Trainid`) REFERENCES `tbldept` (`Trainid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
