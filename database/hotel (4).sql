-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 05:18 PM
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
(9, 13, 'talha', 'talha@gmail.com', '2147483647', NULL, 2, '0000-00-00', '0000-00-00', '5', 'Delux suite'),
(10, 16, 'ali', 'ali@gmail.com', '2147483647', NULL, 4, '0000-00-00', '0000-00-00', '2', 'Presidential suite');

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
(3, 'ayaan', 'ayaan@gmail.com', '097654256', 'great service', '2025-06-19 16:05:31'),
(6, 'ali', 'ali@gmail.com', '03008255528', 'boht maza aya ', '2025-06-25 13:27:08'),
(7, 'ahmed ', 'ahmed@gmail.com', '0330882472', 'best hotel in karachi staff was friendly', '2025-06-25 13:36:24'),
(8, 'sahil', 'sahil@gmail.com', '03133100968', 'good manegment    ', '2025-06-25 14:01:05');

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
(12, 'ahmed ', 'ahmedshah@gmail.com', 2147483647, '07/20/2025', '07/22/2025', 2, '', 'Luxury suite', '', NULL),
(13, 'talha', 'talha@gmail.com', 2147483647, '06/27/2025', '06/30/2025', 5, '', 'Delux suite', '', NULL),
(14, 'anas', 'anas@gmail.com', 2147483647, '07/24/2025', '06/30/2025', 2, '', 'Presidential suite', '', NULL),
(15, 'sahil', 'sahil@gmail.com', 2147483647, '08/04/2025', '08/07/2025', 4, '', 'Delux suite', '', NULL),
(16, 'ali', 'ali@gmail.com', 2147483647, '08/15/2025', '08/20/2025', 2, '', 'Presidential suite', '', NULL);

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
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `status`) VALUES
(16, 1, NULL),
(17, 2, NULL),
(18, 3, NULL),
(19, 4, NULL),
(20, 5, NULL),
(21, 6, NULL),
(22, 7, NULL),
(23, 8, NULL),
(24, 9, NULL),
(25, 10, NULL),
(26, 11, NULL),
(27, 12, NULL),
(28, 13, NULL),
(29, 14, NULL),
(30, 15, NULL);

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
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
