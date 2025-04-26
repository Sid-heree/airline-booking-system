-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 07:32 AM
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
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `airline` varchar(100) NOT NULL,
  `seatno` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date` date NOT NULL,
  `phone` int(255) NOT NULL,
  `userid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `name`, `email`, `source`, `destination`, `airline`, `seatno`, `price`, `date`, `phone`, `userid`) VALUES
(1, 'booked', 'siddharthdevda005@gmail.com', 'DEL', 'MUM', 'Air India', 6, 1100000, '2025-04-19', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `source` varchar(1000) NOT NULL,
  `destination` varchar(10000) NOT NULL,
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `airline` varchar(1000) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`source`, `destination`, `id`, `date`, `airline`, `price`) VALUES
('DEL', 'MUM', 1, '2025-04-19', 'Air India', 10),
('MUM', 'DEL', 2, '2025-04-20', 'Air india', 10),
('DEL', 'HYD', 3, '2025-04-19', 'Air india', 90),
('HYD', 'DEL', 4, '2025-04-20', 'Air india', 189),
('DEL', 'MUM', 5, '2025-04-01', 'Air India', 80),
('HYD', 'BLR', 6, '2025-04-02', 'Air India', 60),
('BLR', 'DEL', 7, '2025-04-03', 'Air India', 70),
('MUM', 'HYD', 8, '2025-04-04', 'Air India', 70),
('DEL', 'HYD', 9, '2025-04-05', 'Air India', 60),
('HYD', 'MUM', 10, '2025-04-06', 'Air India', 700),
('DEL', 'BLR', 11, '2025-04-07', 'Air India', 800),
('BLR', 'HYD', 12, '2025-04-08', 'Air India', 500),
('MUM', 'DEL', 13, '2025-04-09', 'Air India', 800),
('HYD', 'DEL', 14, '2025-04-10', 'Air India', 700),
('BLR', 'MUM', 15, '2025-04-11', 'Air India', 100),
('MUM', 'BLR', 16, '2025-04-12', 'Air India', 800),
('DEL', 'MUM', 17, '2025-04-13', 'Air India', 600),
('HYD', 'BLR', 18, '2025-04-14', 'Air India', 800),
('MUM', 'DEL', 19, '2025-04-15', 'Air India', 200),
('DEL', 'HYD', 20, '2025-04-16', 'Air India', 900),
('BLR', 'DEL', 21, '2025-04-17', 'Air India', 300),
('HYD', 'MUM', 22, '2025-04-18', 'Air India', 100),
('DEL', 'BLR', 23, '2025-04-21', 'Air India', 500),
('BLR', 'HYD', 24, '2025-04-22', 'Air India', 700),
('MUM', 'DEL', 25, '2025-04-23', 'Air India', 900),
('HYD', 'DEL', 26, '2025-04-24', 'Air India', 650),
('DEL', 'MUM', 27, '2025-04-25', 'Air India', 050);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(0, 'booked', '$2y$10$u1nqdk.2FsqvPGVnTFczq.z4mZs4xmsQGm0mHMSKCbvEJngCY9JDG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
