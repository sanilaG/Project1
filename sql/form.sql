-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 09:14 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
