-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 09:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `d_id` int(11) NOT NULL,
  `d_name` text NOT NULL,
  `dis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`d_id`, `d_name`, `dis`) VALUES
(1, 'นาย A', 1),
(2, 'นาย B', 1),
(3, 'นาย C', 1),
(4, 'นาย D', 1),
(5, 'นาย E', 1),
(6, 'นาย F', 1),
(7, 'นาย G', 1),
(8, 'นาย H', 1),
(9, 'นาย M', 1),
(10, 'นาย N', 1),
(11, 'นาย X', 1),
(12, 'นาย Z', 1),
(13, 'นาย V', 1),
(14, 'นาย Aa', 1),
(15, 'นาย Ab', 1),
(16, 'นาย Ac', 1),
(17, 'นาย Ad', 1),
(18, 'นาย Ae', 0),
(19, 'นาย Af', 1),
(20, 'นาย Ag', 1),
(21, 'นาย Ah', 1),
(22, 'นาย Aj', 1),
(23, 'นาย Ax', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
