-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 03:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nec_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `department` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `username` varchar(15) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `department`, `email`, `sex`, `username`, `phone_number`) VALUES
(48, 'Emmanuel Koroma', 'ICT', 'koromaemmanuel66@gmail.com', 'Male', 'Emmanuel5542', '078618435');

-- --------------------------------------------------------

--
-- Table structure for table `login_tab`
--

CREATE TABLE `login_tab` (
  `loginId` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(65) NOT NULL,
  `position` int(1) NOT NULL,
  `login` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tab`
--

INSERT INTO `login_tab` (`loginId`, `username`, `password`, `position`, `login`) VALUES
(48, 'Emmanuel5542', '$2y$10$96X0BpKTVTXOSk00KSjqtuw17XYpVcnoV0euNnQta29RhWObEOaqS', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(15) NOT NULL,
  `request` varchar(300) NOT NULL,
  `request_type` varchar(50) NOT NULL,
  `solution` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL,
  `username` varchar(15) NOT NULL,
  `date_time` datetime NOT NULL,
  `solved_by` varchar(50) NOT NULL,
  `device_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(15) NOT NULL,
  `file_name` varchar(30) NOT NULL,
  `date_time` date NOT NULL,
  `memo_heading` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `login_tab`
--
ALTER TABLE `login_tab`
  ADD PRIMARY KEY (`loginId`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `login_tab`
--
ALTER TABLE `login_tab`
  MODIFY `loginId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
