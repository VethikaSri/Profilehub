-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 05:20 PM
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
-- Database: `profilehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_data`
--

CREATE TABLE `registered_data` (
  `id` int(4) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `birthDate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mob_no` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `github` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_data`
--

INSERT INTO `registered_data` (`id`, `fname`, `mname`, `lname`, `birthDate`, `gender`, `address`, `city`, `pincode`, `email`, `mob_no`, `username`, `password`, `linkedin`, `github`, `website`, `profession`) VALUES
(38, 'John', 'Michael', 'Doe', '2001-06-14', 'male', '123 Maple Street', 'Springfield', '62701', 'john.doe@example.com', '555-123-4567', 'johndoe90', '$2y$10$Q/p1LQOdeUh38sBsuwEdOOy3gNWIkRVG.xy6t6G2EZBV9BadrScGm', ' linkedin.com/in/johndoe', ' github.com/johndoe', 'twitter.com/johndoe', 'Software Engineer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered_data`
--
ALTER TABLE `registered_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_data`
--
ALTER TABLE `registered_data`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
