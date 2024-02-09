-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 09:12 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
