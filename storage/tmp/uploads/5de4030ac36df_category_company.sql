-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2019 at 12:22 AM
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
-- Database: `directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_company`
--

CREATE TABLE `category_company` (
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_company`
--

INSERT INTO `category_company` (`category_id`, `company_id`) VALUES
(3, 47),
(1, 19),
(3, 25),
(1, 49),
(2, 50),
(3, 27),
(1, 13),
(5, 38),
(1, 16),
(6, 29),
(6, 32),
(4, 36),
(7, 15),
(5, 26),
(2, 7),
(4, 54),
(2, 60),
(2, 39),
(7, 5),
(8, 55),
(2, 1),
(4, 53),
(1, 11),
(4, 48),
(3, 52),
(8, 59),
(8, 35),
(5, 57),
(8, 3),
(1, 37),
(5, 12),
(5, 34),
(8, 43),
(3, 40),
(2, 21),
(8, 51),
(1, 20),
(1, 9),
(7, 56),
(4, 8),
(1, 33),
(1, 28),
(4, 30),
(1, 18),
(4, 58),
(5, 46),
(6, 17),
(6, 10),
(2, 14),
(3, 6),
(8, 23),
(2, 4),
(5, 24),
(4, 44),
(8, 42),
(3, 45),
(3, 31),
(7, 2),
(3, 41),
(4, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_company`
--
ALTER TABLE `category_company`
  ADD KEY `fk_p_91029_91033_company__5a12afe2d2772` (`category_id`),
  ADD KEY `fk_p_91033_91029_category_5a12afe2d27f0` (`company_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_company`
--
ALTER TABLE `category_company`
  ADD CONSTRAINT `fk_p_91029_91033_company__5a12afe2d2772` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_91033_91029_category_5a12afe2d27f0` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
