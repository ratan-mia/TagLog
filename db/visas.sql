-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2020 at 10:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taglog-07-01-20`
--

-- --------------------------------------------------------

--
-- Table structure for table `visas`
--

CREATE TABLE `visas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_without_visa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `work_permit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_limit` int(11) DEFAULT NULL,
  `industries` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_traning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_duration` int(11) DEFAULT NULL,
  `countries_restrictred` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visas`
--

INSERT INTO `visas` (`id`, `name`, `type`, `countries_without_visa`, `duration`, `work_permit`, `working_limit`, `industries`, `language_traning`, `training_duration`, `countries_restrictred`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Technical Intern Trainee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-18 03:50:52', '2019-12-18 03:50:52', NULL),
(2, 'Specified Skilled Worker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-18 03:51:19', '2019-12-18 03:51:19', NULL),
(3, 'Student Visa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-18 04:05:54', '2019-12-18 04:05:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visas`
--
ALTER TABLE `visas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visas`
--
ALTER TABLE `visas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
