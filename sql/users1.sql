-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 09:13 AM
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
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
