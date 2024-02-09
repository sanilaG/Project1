-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 02:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(255) NOT NULL,
  `Blood` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Middle_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Dob` varchar(255) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `Blood`, `First_Name`, `Middle_Name`, `Last_Name`, `Phone`, `Address`, `Email`, `Dob`, `Gender`) VALUES
(5, 'B+', 'Jenisha', '', 'Shrestha', '+977-9803768756', 'kathmandu', 'jelly@gmail.com', '1990-06-13', 'female'),
(6, 'A-', 'Aayush', '', 'Gharti', '+977-9813368675', 'kathmandu', 'aayu@gmail.com', '2000-06-06', 'male'),
(7, 'AB-', 'Riwaj', '', 'Gharti', '+977-9864523190', 'kathmandu', 'riwajam@gmail.com', '2006-10-15', 'male'),
(8, 'B-', 'Riyaansh', '', 'Gharti', '+977-9800056432', 'kathmandu', 'riyu@gmail.com', '2012-10-17', 'male'),
(9, 'B+', 'aayu', '', 'gharti', '+977-9803677655', 'kathmandu', 'am@gmail.com', '2020-12-31', 'female'),
(10, 'O', 'Muna', 'Rumba', 'Lama', '+977-9800005685', 'kathmandu,Goldhunga', 'moon@gmail.com', '2002-09-11', 'female'),
(13, 'A+', 'Anjali', '', 'Lama', '+977-9800000002', 'kathmandu', 'hawa@gmail.com', '2001-06-04', 'female'),
(14, 'B-', 'Ram', '', 'Tamang', '+977-9864554444', 'Pokhara', 'Ram@gmail.com', '1990-06-13', 'male'),
(15, 'A-', 'Bloom', '', 'Lama', '+977-9800000003', 'Balaju', 'bloom@gmail.com', '2003-05-06', 'female'),
(16, 'AB-', 'Lisa', '', 'Manoban', '+977-9855217891', 'Kathmandu', 'Lili@gmail.com', '1997-10-29', 'female'),
(17, 'O-', 'sita', '', 'shrestha', '+977-9808793425', 'Samakhusi', 'sita123@gmail.com', '1998-06-10', 'female'),
(18, 'O-', '123', '', 'shrestha', '+977-9800000004', 'Samakhusi', 'sita1234@gmail.com', '1998-06-10', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `Blood` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Middle_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `donation_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `Blood`, `First_Name`, `Middle_Name`, `Last_Name`, `Phone`, `Address`, `Gender`, `donation_status`) VALUES
(2, 'A+', 'sita', '', 'Tamang', '+977-9800000001', 'kathmandu', 'male', ''),
(6, 'A-', 'Sanila', '', 'Gharti', '+977-9804545236', 'kathmandu', 'female', ''),
(7, 'A-', 'Sanila', '', 'Gharti', '+977-9804545236', 'kathmandu', 'female', ''),
(8, 'O', 'jenisha', '', 'shrestha', '+977-9864523190', 'kathmandu', 'female', 'rejected'),
(9, 'A+', 'Anjali', '', 'Gharti', '+977-9813368675', 'kathmandu', 'female', ''),
(10, 'A+', 'Anjali', '', 'Gharti', '+977-9813368675', 'kathmandu', 'female', ''),
(11, 'AB+', 'Sanila', '', 'Gharti', '+977-9803674561', 'kathmandu', 'female', 'rejected'),
(12, 'AB+', 'Sanila', '', 'Gharti', '+977-9803674561', 'kathmandu', 'female', ''),
(13, 'A-', 'Aayush', '', 'Lama', '+977-9813368675', 'kathmandu', 'male', ''),
(14, 'A+', 'Anjali', '', 'Gharti', '+977-9813368675', 'kathmandu', 'female', 'pending'),
(15, 'A-', 'Jennie', '', 'lama', '+977-981336221', 'kathmandu', 'female', 'pending'),
(16, 'A-', 'Jennie', '', 'lama', '+977-981336221', 'kathmandu', 'female', 'rejected'),
(17, 'A-', 'jamm', '', 'tamang', '+977-98133645', 'kathmandu', 'female', 'pending'),
(18, 'AB-', 'Jenisha', '', 'Shrestha', '+977-9813734420', 'Dhulikhel', 'female', 'pending'),
(19, 'B+', 'sita', '', 'shrestha', '+977-9803456789', 'kathmandu', 'female', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('user','admin') NOT NULL DEFAULT 'user',
  `Confirm_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`ID`, `Email`, `Password`, `Role`, `Confirm_Password`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', ''),
(2, 'user1@gmail.com', '#user11', 'user', ''),
(3, 'user2@gmail.com', '#user22', 'user', ''),
(4, 'sanilagharti@gmail.com', '$2y$10$TvfPDP/02iiN8E8fPs6KP.MkeIgoEG2eJFguol43K6InrxsB7amRK', 'user', ''),
(7, 'jammy@gmail.com', '$2y$10$ILOKbs.ip6BpBXuXHotIl.uyPcpf/9VVzeQ9QMYjgL2iHLMp0C.cy', 'user', ''),
(8, 'jam@gmail.com', '$2y$10$YVUKurk.OrnhdIRSwD4s8eBWXs21z8n.jxTJ4HA12vg.bVHNtRBgG', 'user', ''),
(9, 'jenisha@gmail.com', '$2y$10$DYLxbQxPca5nbfoP8TFp8OEtNeftU3ibfMNU8nm8sAE9cD2UeCZVy', 'user', ''),
(10, 'jenisha1@gmail.com', '$2y$10$7PD2pOYpuyrHsbwiD6tCiervZFHe5yZQlD6RP59horoJTl8OwmrsS', 'user', ''),
(11, 'Jenisha33@gmail.com', '$2y$10$xz81KCoOTcsZ.I.7CN/KrOeaCYo4xfC.TVy0/2OEIPBZrCzc72Wbi', 'user', ''),
(12, 'sita123@gmail.com', '$2y$10$aiXZVBcwpT9mvhLaZ4eud.B5Jnadl7MjZ5J6nIiJ6.38dDLDeOAlG', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
