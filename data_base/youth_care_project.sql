-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 12:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youth_care_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `act_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'competitions',
  `id` int(70) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activity_desc` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'there is no description for this activity',
  `start_date` date DEFAULT current_timestamp(),
  `act_stat` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'Al-azhar university'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`act_type`, `id`, `title`, `activity_desc`, `start_date`, `act_stat`, `location`) VALUES
('competitions', 1151079228, 'qur`an', 'al-azhar university al-azhar university al-azhar university', '2022-07-20', '1', 'al-azhar university'),
('competitions', 1156658790, 'qur`an', '', '2022-07-20', '1', 'al-azhar university');

-- --------------------------------------------------------

--
-- Table structure for table `enquired_act`
--

CREATE TABLE `enquired_act` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `act_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `act_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `massages`
--

CREATE TABLE `massages` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Massage` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `act_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `act_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` text COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `user_name`, `user_phone`, `user_password`, `is_admin`) VALUES
('aya@aya.aya', 'Aya Mostafa', '01012122232', '25d55ad283aa400af464c76d713c07ad', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`act_type`,`id`);

--
-- Indexes for table `enquired_act`
--
ALTER TABLE `enquired_act`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `act_type` (`act_type`,`act_id`);

--
-- Indexes for table `massages`
--
ALTER TABLE `massages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `act_type` (`act_type`,`act_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquired_act`
--
ALTER TABLE `enquired_act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `massages`
--
ALTER TABLE `massages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquired_act`
--
ALTER TABLE `enquired_act`
  ADD CONSTRAINT `enquired_act_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE,
  ADD CONSTRAINT `enquired_act_ibfk_2` FOREIGN KEY (`act_type`,`act_id`) REFERENCES `activities` (`act_type`, `id`) ON DELETE CASCADE;

--
-- Constraints for table `massages`
--
ALTER TABLE `massages`
  ADD CONSTRAINT `massages_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE,
  ADD CONSTRAINT `massages_ibfk_2` FOREIGN KEY (`act_type`,`act_id`) REFERENCES `activities` (`act_type`, `id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
