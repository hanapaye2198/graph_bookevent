-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 05:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `captone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booker_tbl`
--

CREATE TABLE `booker_tbl` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booker_tbl`
--

INSERT INTO `booker_tbl` (`id`, `name`, `email`, `phone`, `start_date`, `end_date`) VALUES
(3, 'Kaye Antoinette P. Panaligan ', 'kayeantoinette.panaligan@dssc.edu.ph', '09676979568', '2023-05-23 00:00:00', '2023-05-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(3, 'Tiborsyo', 'adtu me dere laag me', '2023-03-29 01:43:00', '2023-04-01 14:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities`
--

CREATE TABLE `tbl_amenities` (
  `id` int(255) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `price` varchar(67) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`id`, `room_name`, `price`, `description`) VALUES
(13, 'Queen', '$60', 'Context here'),
(14, 'suit', '$60', 'context'),
(15, 'family room', '$60', 'context'),
(16, 'presidential suite', '$60', 'context');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coordinate`
--

CREATE TABLE `tbl_coordinate` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(30) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `fees` varchar(50) NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`id`, `capacity`, `room_no`, `fees`, `date_posted`) VALUES
(1, '1', '1', '900', '0000-00-00 00:00:00'),
(2, '1', '200', '900', '0000-00-00 00:00:00'),
(3, '2', '300', '1800', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey`
--

CREATE TABLE `tbl_survey` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `age` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `time_now` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_survey`
--

INSERT INTO `tbl_survey` (`id`, `name`, `age`, `gender`, `address`, `time_now`) VALUES
(37, 'visitor', '18-24', 'Male', 'Bago Aplaya', '2023-03-15 00:35:27'),
(38, 'visitor', '25-34', 'Female', 'Buhangin', '2023-03-15 00:35:35'),
(39, 'visitor', '25-34', 'Female', 'Buhangin', '2023-03-15 00:40:31'),
(41, 'visitor', '55+', 'LGBTQ', 'Baliok', '2023-03-18 01:40:31'),
(43, 'visitor', '55+', 'LGBTQ', 'Baliok', '2023-03-18 01:44:39'),
(45, 'visitor', '55+', 'LGBTQ', 'Baliok', '2023-03-18 01:45:38'),
(46, 'visitor', '45-54', 'Other', 'Bago Aplaya', '2023-03-18 01:47:18'),
(48, 'visitor', '25-34', 'LGBTQ', 'Baliok', '2023-03-18 01:52:44'),
(50, 'Kaye Antoinette P. Panaligan ', '0-17', 'female', 'Lubogan', '2023-04-30 17:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usr`
--

CREATE TABLE `tbl_usr` (
  `id_usr` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usr`
--

INSERT INTO `tbl_usr` (`id_usr`, `name`, `email`, `password`) VALUES
(1, 'Administrator', 'admin@admin.com', 'admin'),
(4, 'Hannah Panaligan', 'hana@hana.com', 'hana123'),
(5, 'Hannah', 'hannah@hana.com', 'hannah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booker_tbl`
--
ALTER TABLE `booker_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coordinate`
--
ALTER TABLE `tbl_coordinate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usr`
--
ALTER TABLE `tbl_usr`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booker_tbl`
--
ALTER TABLE `booker_tbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_coordinate`
--
ALTER TABLE `tbl_coordinate`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_usr`
--
ALTER TABLE `tbl_usr`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
