-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 08:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeNo` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeNo`, `Name`, `Designation`, `Department`) VALUES
(13347, 'John Stanley', 'Consultant', 'IT'),
(13348, 'Carl Max', 'Manager', 'HR'),
(13350, 'Chris Green', 'Jr. Developer', 'IT'),
(13351, 'Steve Justin', 'Team Lead', 'Sales'),
(13354, 'Jones ', 'Project Manager', 'IT'),
(13355, 'Justin Lawrence', 'Intern', 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `IssueNo` int(11) NOT NULL,
  `Date` date NOT NULL,
  `EmployeeNo` int(11) NOT NULL,
  `DeviceNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`IssueNo`, `Date`, `EmployeeNo`, `DeviceNo`) VALUES
(73, '2022-12-11', 13347, 6),
(74, '2022-12-11', 13351, 7),
(75, '2022-12-05', 13350, 1),
(76, '2022-12-11', 13351, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `DeviceNo` int(11) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Available` varchar(3) NOT NULL DEFAULT 'Yes',
  `Returnable` varchar(3) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`DeviceNo`, `Company`, `Type`, `Available`, `Returnable`) VALUES
(1, 'Dell', 'Laptop', 'Yes', 'Yes'),
(2, 'Lenovo', 'Laptop', 'Yes', 'Yes'),
(3, 'Apple', 'Laptop', 'Yes', 'Yes'),
(4, 'Dell', 'Keyboard', 'Yes', 'Yes'),
(5, 'Lenovo', 'Keyboard', 'Yes', 'Yes'),
(6, 'Apple', 'Keyboard', 'Yes', 'Yes'),
(7, 'Dell', 'Printer', 'Yes', 'Yes'),
(8, 'Lenovo', 'Printer', 'Yes', 'Yes'),
(9, 'Apple', 'Printer', 'Yes', 'Yes'),
(10, 'Dell', 'Mouse', 'Yes', 'Yes'),
(11, 'Lenovo', 'Mouse', 'Yes', 'Yes'),
(12, 'Apple', 'Mouse', 'Yes', 'Yes'),
(13, 'Dell', 'Projector', 'Yes', 'Yes'),
(14, 'Lenovo', 'Projector', 'Yes', 'Yes'),
(15, 'Apple', 'Projector', 'Yes', 'Yes'),
(16, 'Dell', 'Hard Disk', 'No', 'No'),
(17, 'Lenovo', 'Hard Disk', 'No', 'No'),
(18, 'Apple', 'Hard Disk', 'Yes', 'No'),
(19, 'Asus', 'Laptop', 'Yes', 'Yes'),
(25, 'JBL', 'Speaker', 'Yes', 'No'),
(26, 'Apple', 'Iphone', 'Yes', 'Yes'),
(27, 'HP', 'Mouse', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `replacement`
--

CREATE TABLE `replacement` (
  `ReturnNo` int(11) NOT NULL,
  `Date` date NOT NULL,
  `EmployeeNo` int(11) NOT NULL,
  `DeviceNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replacement`
--

INSERT INTO `replacement` (`ReturnNo`, `Date`, `EmployeeNo`, `DeviceNo`) VALUES
(2, '2022-12-11', 13351, 7),
(3, '2022-12-05', 13350, 1),
(4, '2022-12-11', 13351, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeNo`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`IssueNo`),
  ADD KEY `EmployeeNo` (`EmployeeNo`),
  ADD KEY `DeviceNo` (`DeviceNo`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`DeviceNo`);

--
-- Indexes for table `replacement`
--
ALTER TABLE `replacement`
  ADD PRIMARY KEY (`ReturnNo`),
  ADD KEY `DeviceNo` (`DeviceNo`),
  ADD KEY `EmployeeNo` (`EmployeeNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13356;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `IssueNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `DeviceNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `replacement`
--
ALTER TABLE `replacement`
  MODIFY `ReturnNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `Issue_ibfk_2` FOREIGN KEY (`EmployeeNo`) REFERENCES `employee` (`EmployeeNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Issue_ibfk_3` FOREIGN KEY (`DeviceNo`) REFERENCES `products` (`DeviceNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replacement`
--
ALTER TABLE `replacement`
  ADD CONSTRAINT `Return1_ibfk_1` FOREIGN KEY (`DeviceNo`) REFERENCES `products` (`DeviceNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Return1_ibfk_2` FOREIGN KEY (`EmployeeNo`) REFERENCES `employee` (`EmployeeNo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
