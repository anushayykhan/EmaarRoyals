-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 03:41 PM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(2, 'anushay', 'anushay@gmail.com', '$2y$10$Rjv9gTXndCEHOti15Tm.WOeaHinEZQ0QKlzPgfolvuQmIk8IpIMje'),
(3, 'asif', 'asif@gmail.com', '$2y$10$yvrljxxh6BBzHIUBkediMuc0e2Qn7iOqcx2/MaSmwf4YVS63apih.');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_id` int(11) NOT NULL,
  `Guest_id` int(50) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Room` varchar(20) DEFAULT NULL,
  `Room_No` int(20) DEFAULT NULL,
  `Checkin` date DEFAULT NULL,
  `Checkout` date DEFAULT NULL,
  `Guest` varchar(20) DEFAULT NULL,
  `Suite` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_id`, `Guest_id`, `Name`, `Email`, `Phone`, `Room`, `Room_No`, `Checkin`, `Checkout`, `Guest`, `Suite`) VALUES
(1, 9, 'qwqwqw', 'qwqwqw@gmail.com', '19833828', '3 Rooms', 102, '0000-00-00', '0000-00-00', '3', 'Luxury suite');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'anushay', 'anushayy@gmail.com', '09284742918', 'gdgdhjdhghsdghjdghghjasgdhj', '2025-06-19 15:45:13'),
(2, 'eshaal', 'eshaal@gmail.com', '012837464', 'oiuytrew', '2025-06-19 15:55:33'),
(3, 'ayaan', 'ayaan@gmail.com', '097654256', 'great service', '2025-06-19 16:05:31'),
(5, 'fatima', 'fatima@gmail.com', '0987676767', 'jhahjfhjshjdhjdshjsdhjdhjdshjsdhjd\r\nhjsdhdhjsdhjdhjsdhjdsjhsdjhsd', '2025-06-21 12:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` int(20) DEFAULT NULL,
  `Checkin` varchar(20) DEFAULT NULL,
  `Checkout` varchar(20) DEFAULT NULL,
  `Guest` int(5) DEFAULT NULL,
  `Room` varchar(50) DEFAULT NULL,
  `Suite` varchar(255) DEFAULT NULL,
  `Request` varchar(200) DEFAULT NULL,
  `inq_res_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`Id`, `Name`, `Email`, `Phone`, `Checkin`, `Checkout`, `Guest`, `Room`, `Suite`, `Request`, `inq_res_email`) VALUES
(1, 'anushay', 'anushay@gmail.com', 312983763, '2025-06-08', '2025-06-18', 2, 'single', NULL, '', NULL),
(3, 'mrs muhammad asif khan', 'saimaasif@gmail.com', 2147483647, '2025-12-31', '2026-01-15', 2, 'suite', NULL, 'decorate with flowers', NULL),
(4, 'ibrahim', 'ibrahim@gmail.com', 31283274, '06/19/2025', '06/25/2025', 0, '', '', '', NULL),
(6, 'eshaal', 'eshaal@gmail.com', 897484, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'tytytyt', 'ttyty@gmail.com', 98876543, '06/11/2025', '06/18/2025', 0, '', '', '', NULL),
(8, 'ttytytyt', 'ttyty@gmail.com', 2147483647, '06/13/2025', '06/19/2025', 0, '', '', '', NULL),
(9, 'qwqwqw', 'qwqwqw@gmail.com', 19833828, '06/04/2025', '06/18/2025', 3, '3 Rooms', 'Luxury suite', 'hwchwjjwhgjwhdgckwdbcdbckjh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_number` int(10) DEFAULT NULL,
  `status` enum('free','maintenance') DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_id`),
  ADD UNIQUE KEY `guest` (`Guest_id`),
  ADD UNIQUE KEY `Room_No` (`Room_No`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `inq_res_email` (`inq_res_email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_number` (`room_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`Guest_id`) REFERENCES `reservations` (`Id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`inq_res_email`) REFERENCES `inquiries` (`email`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`id`) REFERENCES `bookings` (`Booking_id`),
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`room_number`) REFERENCES `bookings` (`Room_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
