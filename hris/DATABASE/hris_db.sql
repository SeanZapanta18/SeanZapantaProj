-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 05:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(255) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_user` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_name`, `admin_user`, `admin_password`, `admin_status`) VALUES
(1, 'Paul Mallari', 'johnpaulmanzano291991@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birth_date` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `first_name`, `last_name`, `gender`, `birth_date`, `contact`, `email`, `address`, `department`, `position`, `rank`) VALUES
(18, '14562574', 'John ', 'Mallari', 'Male', 'January 7, 1995', '0384741414', 'mallari@john.com', 'Saint Anne St. Saviorville Compound', 'testing', 'testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `full_name`, `email_address`, `user_password`, `user_status`) VALUES
(1, 'Jake Mallari', 'johnpaulmanzano291991@gmail.com', '202cb962ac59075b964b07152d234b70', 'Employee'),
(4, 'John Paul', 'topsmetal01@gmail.com', '202cb962ac59075b964b07152d234b70', 'Employee'),
(5, 'CCC user', 'topsmetal02@gmail.com', '202cb962ac59075b964b07152d234b70', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE `upload_files` (
  `ID` int(255) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(200) NOT NULL,
  `UPLOADER` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_files`
--

INSERT INTO `upload_files` (`ID`, `NAME`, `SIZE`, `DOWNLOAD`, `TIMERS`, `ADMIN_STATUS`, `UPLOADER`) VALUES
(1, 'authentication for database.docx', '93544', '2', 'Oct-17-2023 03:46 PM', 'Admin', 'Paul Mallari'),
(2, 'computer architecture.xlsx', '13641', '1', 'Oct-20-2023 12:39 AM', 'Employee', 'Jake Mallari'),
(4, 'Presentation_Group2.pptx', '9623373', '0', 'Nov-13-2023 10:16 AM', 'Employee', 'John Paul'),
(7, 'BYTEs-Information.xlsx', '12240', '0', 'Dec-18-2023 06:13 PM', 'Employee', 'CCC user'),
(8, 'MANZANO.pdf', '239597', '0', 'Dec-18-2023 06:14 PM', 'Employee', 'CCC user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_files`
--
ALTER TABLE `upload_files`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `upload_files`
--
ALTER TABLE `upload_files`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
