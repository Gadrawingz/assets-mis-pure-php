-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 09:41 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'Projectoring', 'P503', 4, 2, 1, 'Not Active', 'It is working good'),
(2, 'Big Mous7', 'M3040', 4, 1, 2, 'Active', 'good'),
(3, 'Table', 'IT530', 5, 6, 2, 'Not Active', 'Bad Bad'),
(4, 'Speakers', 'SP500', 5, 6, 1, 'Not Active', 'Bad Bad');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE `borrowed` (
  `bor_id` int(10) NOT NULL,
  `asset_id` int(10) NOT NULL,
  `bor_from` int(10) NOT NULL,
  `bor_to` int(10) NOT NULL,
  `bor_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`bor_id`, `asset_id`, `bor_from`, `bor_to`, `bor_date`) VALUES
(1, 3, 2, 3, '2021-01-19'),
(2, 3, 2, 3, '2021-01-20'),
(3, 2, 2, 1, '2021-01-20');

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
(5, 'Non-electronic');

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
(3, 'LAB 3', 'FOr level 3 students');

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
(6, 'Unknown ');

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
(1, 'Mucyo Peteroman', 0, 'Peterz', 'LabTech', '0780808080', 'peter@gmail.com', 'peter'),
(2, 'KAMANA Fistonist', 1, 'Fiston', 'LabTech', '123456', 'fiston@gmail.com', 'fiston'),
(5, 'Gad IRADUFASHA', 0, 'Gadson', 'LabTech', '0784557411', 'gadira@gmail.com', 'gad123'),
(7, 'RWEGO Innocent', 0, 'Rwego', 'Admin', '90909090', 'rwego@gmail.com', 'rwego'),
(10, 'Maniraguha Joseph', 3, 'Joseph', 'LabTech', '0784557411', 'joseph@gmail.com', 'joseph');

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
  ADD PRIMARY KEY (`bor_id`);

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
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrowed`
--
ALTER TABLE `borrowed`
  MODIFY `bor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
