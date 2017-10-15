-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 04:58 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugtable`
--

CREATE TABLE `bugtable` (
  `bugId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `bugName` varchar(50) DEFAULT NULL,
  `bugStatus` varchar(10) DEFAULT NULL,
  `bugSeverity` varchar(10) DEFAULT NULL,
  `bugReview` varchar(300) DEFAULT NULL,
  `bugPriority` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bugtable`
--

INSERT INTO `bugtable` (`bugId`, `projectId`, `bugName`, `bugStatus`, `bugSeverity`, `bugReview`, `bugPriority`) VALUES
(1001, 1001, 'Bug-1', 'Unresolved', 'Minor', 'Its a great bug i would like to get this bug many time', ''),
(1002, 1002, 'BUG-2', 'Resolved', 'Minor', 'Hello how are tou ', ''),
(1003, 1001, 'Bug-3', 'Unresolved', 'Moderate', '', 'Low'),
(1004, 1004, 'Bug-4', 'Resolved', 'Major', 'Its was a hello bug', ''),
(1005, 1001, 'Bug-5', 'Unresolved', 'Major', '', 'Medium'),
(1006, 1001, 'Bug-6', 'Unresolved', 'Minor', '', 'Low'),
(1007, 1001, 'Bug-7', 'Unresolved', 'Moderate', '', 'High'),
(1008, 1001, 'afdsf', 'Unresolved', 'Cosmetic', '', 'Low'),
(1009, 1004, 'purple', 'Unresolved', 'Major', '', 'High'),
(1010, 1001, 'purple', 'Resolved', 'Critical', 'It was a good bug', ''),
(1012, 1001, 'purple', 'Unresolved', 'Major', '', 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `projectassignto`
--

CREATE TABLE `projectassignto` (
  `id` int(11) NOT NULL,
  `employee` varchar(255) DEFAULT NULL,
  `projectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `projectassignto`
--

INSERT INTO `projectassignto` (`id`, `employee`, `projectId`) VALUES
(1001, 'Jake', 1001),
(1002, 'YAsh', 1001),
(1003, 'jake', 1003),
(1004, 'sufiyan', 1002),
(1006, 'Jerry', 1002),
(1007, 'Jake', 1005),
(1008, 'raj', 1002),
(1009, 'Yash', 1004),
(1010, 'Sufiyan', 1004);

-- --------------------------------------------------------

--
-- Table structure for table `projectstable`
--

CREATE TABLE `projectstable` (
  `id` int(11) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `projectStatus` varchar(255) NOT NULL,
  `projectAssignDate` date NOT NULL,
  `projectSubmitDate` date NOT NULL,
  `totalBugs` int(11) NOT NULL,
  `bugsResolved` int(11) NOT NULL,
  `bugsUnresolved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectstable`
--

INSERT INTO `projectstable` (`id`, `projectName`, `projectStatus`, `projectAssignDate`, `projectSubmitDate`, `totalBugs`, `bugsResolved`, `bugsUnresolved`) VALUES
(1001, 'Project-1', 'Complete', '2017-07-04', '2017-09-20', 500, 265, 235),
(1002, 'Project-2', 'Complete', '2017-07-04', '2017-10-02', 54, 5, 49),
(1003, 'Project-3', 'Incomplete', '2017-07-04', '2017-07-30', 659, 600, 59),
(1004, 'Project-4', 'Complete', '2017-07-04', '2017-07-15', 80, 65, 15),
(1005, 'Project-5', 'Incomlete', '2017-07-04', '2017-08-05', 64, 5, 56),
(1006, 'ABC', 'Complete', '2017-07-13', '2017-07-31', 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertype` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`) VALUES
(1001, 'parvez', '123456', 'admin'),
(1002, 'raj', '123456', 'employee'),
(1003, 'jake', '123456', 'employee'),
(1004, 'tom', '123456', 'employee'),
(1005, 'jerry', '123456', 'employee'),
(1006, 'shoeb', '123456', 'admin'),
(1007, 'yash', '123456', 'employee'),
(1008, 'sufiyan', '123456', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bugtable`
--
ALTER TABLE `bugtable`
  ADD PRIMARY KEY (`bugId`),
  ADD KEY `projectId` (`projectId`);

--
-- Indexes for table `projectassignto`
--
ALTER TABLE `projectassignto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `projectId` (`projectId`);

--
-- Indexes for table `projectstable`
--
ALTER TABLE `projectstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bugtable`
--
ALTER TABLE `bugtable`
  MODIFY `bugId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;
--
-- AUTO_INCREMENT for table `projectassignto`
--
ALTER TABLE `projectassignto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
--
-- AUTO_INCREMENT for table `projectstable`
--
ALTER TABLE `projectstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bugtable`
--
ALTER TABLE `bugtable`
  ADD CONSTRAINT `bugtable_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projectstable` (`id`);

--
-- Constraints for table `projectassignto`
--
ALTER TABLE `projectassignto`
  ADD CONSTRAINT `projectassignto_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projectstable` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
