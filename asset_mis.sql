-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 09:34 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(80) NOT NULL,
  `a_code` varchar(80) NOT NULL,
  `a_type` int(10) NOT NULL,
  `a_model` int(10) NOT NULL,
  `a_location` int(10) NOT NULL,
  `a_status` varchar(80) NOT NULL,
  `a_condition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`a_id`, `a_name`, `a_code`, `a_type`, `a_model`, `a_location`, `a_status`, `a_condition`) VALUES
(1, 'Keyboard', 'IT430', 3, 2, 2, 'Active', 'Good'),
(2, 'Mouse', 'DESKTOP-7000', 4, 2, 4, 'Active', 'Bad'),
(3, 'Windows OS', 'IT630', 4, 2, 2, 'Not Active', 'Good'),
(4, 'Computer DELL', 'LapTOP-7000', 4, 3, 2, 'Not Active', 'Repairable'),
(5, 'Speakers', 'ICT270', 2, 6, 6, 'Not Active', 'Bad'),
(6, 'RJ-45', 'RJ865', 4, 3, 6, 'Not Active', 'Repairable'),
(7, 'RJ-45', 'IT435', 4, 6, 1, 'Active', 'Good'),
(8, 'Orange Projector', 'P222', 4, 2, 6, 'Not Active', 'Repairable');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE `borrowed` (
  `bor_id` int(10) NOT NULL,
  `asset_id` int(10) NOT NULL,
  `bor_from` int(10) NOT NULL,
  `bor_to` int(10) NOT NULL,
  `bor_period` varchar(20) NOT NULL,
  `is_returned` tinyint(1) NOT NULL,
  `bor_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`bor_id`, `asset_id`, `bor_from`, `bor_to`, `bor_period`, `is_returned`, `bor_date`) VALUES
(1, 1, 2, 1, '1 day', 0, '2021-02-05'),
(2, 3, 2, 6, '1 day', 1, '2021-02-05'),
(3, 4, 2, 3, '2 months', 0, '2021-02-05'),
(4, 5, 6, 1, '4 weeks', 1, '2021-02-05'),
(5, 7, 1, 4, '5 days', 0, '2021-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_type` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_type`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Ipad'),
(4, 'Devices'),
(5, 'Non-electronic'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(90) NOT NULL,
  `lab_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`lab_id`, `lab_name`, `lab_description`) VALUES
(1, 'LAB 1', 'For all classes'),
(2, 'LAB 2', 'Lab 2 for L2 students'),
(3, 'LAB 3', 'FOr level 3 students'),
(4, 'LAB 4', 'Lab 5 men'),
(5, 'LAB 5', ''),
(6, 'LAB 6', 'Lab for new comers'),
(7, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `m_id` int(10) NOT NULL,
  `m_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`m_id`, `m_name`) VALUES
(1, 'Intel'),
(2, 'Microsoft'),
(3, 'Dell'),
(4, 'MacBook'),
(5, 'HP'),
(6, 'Unknown '),
(7, 'Intel'),
(8, 'IBM');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `trans_id` int(10) NOT NULL,
  `asset_id` int(10) NOT NULL,
  `trans_from` int(10) NOT NULL,
  `trans_to` int(10) NOT NULL,
  `trans_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`trans_id`, `asset_id`, `trans_from`, `trans_to`, `trans_date`) VALUES
(1, 3, 3, 2, '2021-02-02 11:43:57'),
(2, 3, 2, 4, '2021-02-04 03:49:23'),
(3, 2, 3, 4, '2021-02-04 03:50:15'),
(4, 2, 2, 4, '2021-02-05 18:50:40'),
(5, 7, 6, 1, '2021-02-05 21:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `u_names` varchar(80) NOT NULL,
  `user_for` int(10) DEFAULT NULL,
  `u_username` varchar(80) NOT NULL,
  `user_type` varchar(90) NOT NULL,
  `u_phone` varchar(80) NOT NULL,
  `u_email` varchar(80) NOT NULL,
  `u_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_names`, `user_for`, `u_username`, `user_type`, `u_phone`, `u_email`, `u_password`) VALUES
(1, 'Rwego Innocent', 0, 'Rwego', 'Admin', '0784444444', 'rwego@gmail.com', 'rwego'),
(2, 'Fiston Muneza', 2, 'Fiston', 'LabTech', '0784444444', 'fiston@gmail.com', 'fiston'),
(3, 'Peter Mucyo', 4, 'Peter', 'LabTech', '0784444444', 'peter@gmail.com', 'peter'),
(4, 'Mimi Chantal', 5, 'Mimi', 'LabTech', '0784444444', 'mimi@gmail.com', 'mimi'),
(5, 'Muneza Paul', 1, 'Paul', 'LabTech', '0788600500', 'paul@gmail.com', 'paul'),
(6, 'Kalisa Omar', 3, 'Omar', 'LabTech', '0782345665', 'omar@gmail.com', 'omar'),
(14, 'Uwineza Ornella', 6, 'Ornella', 'LabTech', '0782345665', 'ornella@gmail.com', 'ornella');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `a_location` (`a_location`),
  ADD KEY `a_type` (`a_type`),
  ADD KEY `a_model` (`a_model`);

--
-- Indexes for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD PRIMARY KEY (`bor_id`),
  ADD KEY `asset_id` (`asset_id`),
  ADD KEY `bor_from` (`bor_from`),
  ADD KEY `bor_to` (`bor_to`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `trans_from` (`trans_from`),
  ADD KEY `trans_to` (`trans_to`),
  ADD KEY `asset_id` (`asset_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `borrowed`
--
ALTER TABLE `borrowed`
  MODIFY `bor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `trans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset`
--
ALTER TABLE `asset`
  ADD CONSTRAINT `asset_ibfk_1` FOREIGN KEY (`a_location`) REFERENCES `labs` (`lab_id`),
  ADD CONSTRAINT `asset_ibfk_2` FOREIGN KEY (`a_type`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `asset_ibfk_3` FOREIGN KEY (`a_model`) REFERENCES `model` (`m_id`);

--
-- Constraints for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD CONSTRAINT `borrowed_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`a_id`),
  ADD CONSTRAINT `borrowed_ibfk_2` FOREIGN KEY (`bor_from`) REFERENCES `labs` (`lab_id`),
  ADD CONSTRAINT `borrowed_ibfk_3` FOREIGN KEY (`bor_to`) REFERENCES `labs` (`lab_id`);

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`trans_from`) REFERENCES `labs` (`lab_id`),
  ADD CONSTRAINT `transfer_ibfk_2` FOREIGN KEY (`trans_to`) REFERENCES `labs` (`lab_id`),
  ADD CONSTRAINT `transfer_ibfk_3` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`a_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
