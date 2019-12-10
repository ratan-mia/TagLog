-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2019 at 12:41 AM
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
-- Database: `taglag`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `interview_period` int(11) NOT NULL,
  `total_expense` decimal(15,2) NOT NULL,
  `language_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industries_percentage` double(15,2) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `industries_id` int(10) UNSIGNED DEFAULT NULL,
  `employer_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_comment`
--

CREATE TABLE `agent_comment` (
  `agent_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_employer`
--

CREATE TABLE `agent_employer` (
  `employer_id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_user`
--

CREATE TABLE `agent_user` (
  `agent_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Car Industry', 'fa fa-car', '2019-12-01 01:55:25', '2019-12-01 01:55:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_company`
--

CREATE TABLE `category_company` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_company`
--

INSERT INTO `category_company` (`company_id`, `category_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dhaka', '2019-12-01 01:54:57', '2019-12-01 01:54:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` double(15,2) DEFAULT NULL,
  `comment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `commenter_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `city_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `description`, `city_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Asian Motorbikes', 'House: 21, Road: 103,, Gulshan: 02', 'lorem ispum', 1, '2019-12-01 02:10:28', '2019-12-01 03:22:45', NULL),
(2, 'Continental Motors', 'House: 21, Road: 103,, Gulshan: 02', 'lorem ispum', 1, '2019-12-01 02:10:52', '2019-12-01 02:10:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Afghanistan', 'af', NULL, NULL, NULL),
(2, 'Albania', 'al', NULL, NULL, NULL),
(3, 'Algeria', 'dz', NULL, NULL, NULL),
(4, 'American Samoa', 'as', NULL, NULL, NULL),
(5, 'Andorra', 'ad', NULL, NULL, NULL),
(6, 'Angola', 'ao', NULL, NULL, NULL),
(7, 'Anguilla', 'ai', NULL, NULL, NULL),
(8, 'Antarctica', 'aq', NULL, NULL, NULL),
(9, 'Antigua and Barbuda', 'ag', NULL, NULL, NULL),
(10, 'Argentina', 'ar', NULL, NULL, NULL),
(11, 'Armenia', 'am', NULL, NULL, NULL),
(12, 'Aruba', 'aw', NULL, NULL, NULL),
(13, 'Australia', 'au', NULL, NULL, NULL),
(14, 'Austria', 'at', NULL, NULL, NULL),
(15, 'Azerbaijan', 'az', NULL, NULL, NULL),
(16, 'Bahamas', 'bs', NULL, NULL, NULL),
(17, 'Bahrain', 'bh', NULL, NULL, NULL),
(18, 'Bangladesh', 'bd', NULL, NULL, NULL),
(19, 'Barbados', 'bb', NULL, NULL, NULL),
(20, 'Belarus', 'by', NULL, NULL, NULL),
(21, 'Belgium', 'be', NULL, NULL, NULL),
(22, 'Belize', 'bz', NULL, NULL, NULL),
(23, 'Benin', 'bj', NULL, NULL, NULL),
(24, 'Bermuda', 'bm', NULL, NULL, NULL),
(25, 'Bhutan', 'bt', NULL, NULL, NULL),
(26, 'Bolivia', 'bo', NULL, NULL, NULL),
(27, 'Bosnia and Herzegovina', 'ba', NULL, NULL, NULL),
(28, 'Botswana', 'bw', NULL, NULL, NULL),
(29, 'Brazil', 'br', NULL, NULL, NULL),
(30, 'British Indian Ocean Territory', 'io', NULL, NULL, NULL),
(31, 'British Virgin Islands', 'vg', NULL, NULL, NULL),
(32, 'Brunei', 'bn', NULL, NULL, NULL),
(33, 'Bulgaria', 'bg', NULL, NULL, NULL),
(34, 'Burkina Faso', 'bf', NULL, NULL, NULL),
(35, 'Burundi', 'bi', NULL, NULL, NULL),
(36, 'Cambodia', 'kh', NULL, NULL, NULL),
(37, 'Cameroon', 'cm', NULL, NULL, NULL),
(38, 'Canada', 'ca', NULL, NULL, NULL),
(39, 'Cape Verde', 'cv', NULL, NULL, NULL),
(40, 'Cayman Islands', 'ky', NULL, NULL, NULL),
(41, 'Central African Republic', 'cf', NULL, NULL, NULL),
(42, 'Chad', 'td', NULL, NULL, NULL),
(43, 'Chile', 'cl', NULL, NULL, NULL),
(44, 'China', 'cn', NULL, NULL, NULL),
(45, 'Christmas Island', 'cx', NULL, NULL, NULL),
(46, 'Cocos Islands', 'cc', NULL, NULL, NULL),
(47, 'Colombia', 'co', NULL, NULL, NULL),
(48, 'Comoros', 'km', NULL, NULL, NULL),
(49, 'Cook Islands', 'ck', NULL, NULL, NULL),
(50, 'Costa Rica', 'cr', NULL, NULL, NULL),
(51, 'Croatia', 'hr', NULL, NULL, NULL),
(52, 'Cuba', 'cu', NULL, NULL, NULL),
(53, 'Curacao', 'cw', NULL, NULL, NULL),
(54, 'Cyprus', 'cy', NULL, NULL, NULL),
(55, 'Czech Republic', 'cz', NULL, NULL, NULL),
(56, 'Democratic Republic of the Congo', 'cd', NULL, NULL, NULL),
(57, 'Denmark', 'dk', NULL, NULL, NULL),
(58, 'Djibouti', 'dj', NULL, NULL, NULL),
(59, 'Dominica', 'dm', NULL, NULL, NULL),
(60, 'Dominican Republic', 'do', NULL, NULL, NULL),
(61, 'East Timor', 'tl', NULL, NULL, NULL),
(62, 'Ecuador', 'ec', NULL, NULL, NULL),
(63, 'Egypt', 'eg', NULL, NULL, NULL),
(64, 'El Salvador', 'sv', NULL, NULL, NULL),
(65, 'Equatorial Guinea', 'gq', NULL, NULL, NULL),
(66, 'Eritrea', 'er', NULL, NULL, NULL),
(67, 'Estonia', 'ee', NULL, NULL, NULL),
(68, 'Ethiopia', 'et', NULL, NULL, NULL),
(69, 'Falkland Islands', 'fk', NULL, NULL, NULL),
(70, 'Faroe Islands', 'fo', NULL, NULL, NULL),
(71, 'Fiji', 'fj', NULL, NULL, NULL),
(72, 'Finland', 'fi', NULL, NULL, NULL),
(73, 'France', 'fr', NULL, NULL, NULL),
(74, 'French Polynesia', 'pf', NULL, NULL, NULL),
(75, 'Gabon', 'ga', NULL, NULL, NULL),
(76, 'Gambia', 'gm', NULL, NULL, NULL),
(77, 'Georgia', 'ge', NULL, NULL, NULL),
(78, 'Germany', 'de', NULL, NULL, NULL),
(79, 'Ghana', 'gh', NULL, NULL, NULL),
(80, 'Gibraltar', 'gi', NULL, NULL, NULL),
(81, 'Greece', 'gr', NULL, NULL, NULL),
(82, 'Greenland', 'gl', NULL, NULL, NULL),
(83, 'Grenada', 'gd', NULL, NULL, NULL),
(84, 'Guam', 'gu', NULL, NULL, NULL),
(85, 'Guatemala', 'gt', NULL, NULL, NULL),
(86, 'Guernsey', 'gg', NULL, NULL, NULL),
(87, 'Guinea', 'gn', NULL, NULL, NULL),
(88, 'Guinea-Bissau', 'gw', NULL, NULL, NULL),
(89, 'Guyana', 'gy', NULL, NULL, NULL),
(90, 'Haiti', 'ht', NULL, NULL, NULL),
(91, 'Honduras', 'hn', NULL, NULL, NULL),
(92, 'Hong Kong', 'hk', NULL, NULL, NULL),
(93, 'Hungary', 'hu', NULL, NULL, NULL),
(94, 'Iceland', 'is', NULL, NULL, NULL),
(95, 'India', 'in', NULL, NULL, NULL),
(96, 'Indonesia', 'id', NULL, NULL, NULL),
(97, 'Iran', 'ir', NULL, NULL, NULL),
(98, 'Iraq', 'iq', NULL, NULL, NULL),
(99, 'Ireland', 'ie', NULL, NULL, NULL),
(100, 'Isle of Man', 'im', NULL, NULL, NULL),
(101, 'Israel', 'il', NULL, NULL, NULL),
(102, 'Italy', 'it', NULL, NULL, NULL),
(103, 'Ivory Coast', 'ci', NULL, NULL, NULL),
(104, 'Jamaica', 'jm', NULL, NULL, NULL),
(105, 'Japan', 'jp', NULL, NULL, NULL),
(106, 'Jersey', 'je', NULL, NULL, NULL),
(107, 'Jordan', 'jo', NULL, NULL, NULL),
(108, 'Kazakhstan', 'kz', NULL, NULL, NULL),
(109, 'Kenya', 'ke', NULL, NULL, NULL),
(110, 'Kiribati', 'ki', NULL, NULL, NULL),
(111, 'Kosovo', 'xk', NULL, NULL, NULL),
(112, 'Kuwait', 'kw', NULL, NULL, NULL),
(113, 'Kyrgyzstan', 'kg', NULL, NULL, NULL),
(114, 'Laos', 'la', NULL, NULL, NULL),
(115, 'Latvia', 'lv', NULL, NULL, NULL),
(116, 'Lebanon', 'lb', NULL, NULL, NULL),
(117, 'Lesotho', 'ls', NULL, NULL, NULL),
(118, 'Liberia', 'lr', NULL, NULL, NULL),
(119, 'Libya', 'ly', NULL, NULL, NULL),
(120, 'Liechtenstein', 'li', NULL, NULL, NULL),
(121, 'Lithuania', 'lt', NULL, NULL, NULL),
(122, 'Luxembourg', 'lu', NULL, NULL, NULL),
(123, 'Macau', 'mo', NULL, NULL, NULL),
(124, 'Macedonia', 'mk', NULL, NULL, NULL),
(125, 'Madagascar', 'mg', NULL, NULL, NULL),
(126, 'Malawi', 'mw', NULL, NULL, NULL),
(127, 'Malaysia', 'my', NULL, NULL, NULL),
(128, 'Maldives', 'mv', NULL, NULL, NULL),
(129, 'Mali', 'ml', NULL, NULL, NULL),
(130, 'Malta', 'mt', NULL, NULL, NULL),
(131, 'Marshall Islands', 'mh', NULL, NULL, NULL),
(132, 'Mauritania', 'mr', NULL, NULL, NULL),
(133, 'Mauritius', 'mu', NULL, NULL, NULL),
(134, 'Mayotte', 'yt', NULL, NULL, NULL),
(135, 'Mexico', 'mx', NULL, NULL, NULL),
(136, 'Micronesia', 'fm', NULL, NULL, NULL),
(137, 'Moldova', 'md', NULL, NULL, NULL),
(138, 'Monaco', 'mc', NULL, NULL, NULL),
(139, 'Mongolia', 'mn', NULL, NULL, NULL),
(140, 'Montenegro', 'me', NULL, NULL, NULL),
(141, 'Montserrat', 'ms', NULL, NULL, NULL),
(142, 'Morocco', 'ma', NULL, NULL, NULL),
(143, 'Mozambique', 'mz', NULL, NULL, NULL),
(144, 'Myanmar', 'mm', NULL, NULL, NULL),
(145, 'Namibia', 'na', NULL, NULL, NULL),
(146, 'Nauru', 'nr', NULL, NULL, NULL),
(147, 'Nepal', 'np', NULL, NULL, NULL),
(148, 'Netherlands', 'nl', NULL, NULL, NULL),
(149, 'Netherlands Antilles', 'an', NULL, NULL, NULL),
(150, 'New Caledonia', 'nc', NULL, NULL, NULL),
(151, 'New Zealand', 'nz', NULL, NULL, NULL),
(152, 'Nicaragua', 'ni', NULL, NULL, NULL),
(153, 'Niger', 'ne', NULL, NULL, NULL),
(154, 'Nigeria', 'ng', NULL, NULL, NULL),
(155, 'Niue', 'nu', NULL, NULL, NULL),
(156, 'North Korea', 'kp', NULL, NULL, NULL),
(157, 'Northern Mariana Islands', 'mp', NULL, NULL, NULL),
(158, 'Norway', 'no', NULL, NULL, NULL),
(159, 'Oman', 'om', NULL, NULL, NULL),
(160, 'Pakistan', 'pk', NULL, NULL, NULL),
(161, 'Palau', 'pw', NULL, NULL, NULL),
(162, 'Palestine', 'ps', NULL, NULL, NULL),
(163, 'Panama', 'pa', NULL, NULL, NULL),
(164, 'Papua New Guinea', 'pg', NULL, NULL, NULL),
(165, 'Paraguay', 'py', NULL, NULL, NULL),
(166, 'Peru', 'pe', NULL, NULL, NULL),
(167, 'Philippines', 'ph', NULL, NULL, NULL),
(168, 'Pitcairn', 'pn', NULL, NULL, NULL),
(169, 'Poland', 'pl', NULL, NULL, NULL),
(170, 'Portugal', 'pt', NULL, NULL, NULL),
(171, 'Puerto Rico', 'pr', NULL, NULL, NULL),
(172, 'Qatar', 'qa', NULL, NULL, NULL),
(173, 'Republic of the Congo', 'cg', NULL, NULL, NULL),
(174, 'Reunion', 're', NULL, NULL, NULL),
(175, 'Romania', 'ro', NULL, NULL, NULL),
(176, 'Russia', 'ru', NULL, NULL, NULL),
(177, 'Rwanda', 'rw', NULL, NULL, NULL),
(178, 'Saint Barthelemy', 'bl', NULL, NULL, NULL),
(179, 'Saint Helena', 'sh', NULL, NULL, NULL),
(180, 'Saint Kitts and Nevis', 'kn', NULL, NULL, NULL),
(181, 'Saint Lucia', 'lc', NULL, NULL, NULL),
(182, 'Saint Martin', 'mf', NULL, NULL, NULL),
(183, 'Saint Pierre and Miquelon', 'pm', NULL, NULL, NULL),
(184, 'Saint Vincent and the Grenadines', 'vc', NULL, NULL, NULL),
(185, 'Samoa', 'ws', NULL, NULL, NULL),
(186, 'San Marino', 'sm', NULL, NULL, NULL),
(187, 'Sao Tome and Principe', 'st', NULL, NULL, NULL),
(188, 'Saudi Arabia', 'sa', NULL, NULL, NULL),
(189, 'Senegal', 'sn', NULL, NULL, NULL),
(190, 'Serbia', 'rs', NULL, NULL, NULL),
(191, 'Seychelles', 'sc', NULL, NULL, NULL),
(192, 'Sierra Leone', 'sl', NULL, NULL, NULL),
(193, 'Singapore', 'sg', NULL, NULL, NULL),
(194, 'Sint Maarten', 'sx', NULL, NULL, NULL),
(195, 'Slovakia', 'sk', NULL, NULL, NULL),
(196, 'Slovenia', 'si', NULL, NULL, NULL),
(197, 'Solomon Islands', 'sb', NULL, NULL, NULL),
(198, 'Somalia', 'so', NULL, NULL, NULL),
(199, 'South Africa', 'za', NULL, NULL, NULL),
(200, 'South Korea', 'kr', NULL, NULL, NULL),
(201, 'South Sudan', 'ss', NULL, NULL, NULL),
(202, 'Spain', 'es', NULL, NULL, NULL),
(203, 'Sri Lanka', 'lk', NULL, NULL, NULL),
(204, 'Sudan', 'sd', NULL, NULL, NULL),
(205, 'Suriname', 'sr', NULL, NULL, NULL),
(206, 'Svalbard and Jan Mayen', 'sj', NULL, NULL, NULL),
(207, 'Swaziland', 'sz', NULL, NULL, NULL),
(208, 'Sweden', 'se', NULL, NULL, NULL),
(209, 'Switzerland', 'ch', NULL, NULL, NULL),
(210, 'Syria', 'sy', NULL, NULL, NULL),
(211, 'Taiwan', 'tw', NULL, NULL, NULL),
(212, 'Tajikistan', 'tj', NULL, NULL, NULL),
(213, 'Tanzania', 'tz', NULL, NULL, NULL),
(214, 'Thailand', 'th', NULL, NULL, NULL),
(215, 'Togo', 'tg', NULL, NULL, NULL),
(216, 'Tokelau', 'tk', NULL, NULL, NULL),
(217, 'Tonga', 'to', NULL, NULL, NULL),
(218, 'Trinidad and Tobago', 'tt', NULL, NULL, NULL),
(219, 'Tunisia', 'tn', NULL, NULL, NULL),
(220, 'Turkey', 'tr', NULL, NULL, NULL),
(221, 'Turkmenistan', 'tm', NULL, NULL, NULL),
(222, 'Turks and Caicos Islands', 'tc', NULL, NULL, NULL),
(223, 'Tuvalu', 'tv', NULL, NULL, NULL),
(224, 'U.S. Virgin Islands', 'vi', NULL, NULL, NULL),
(225, 'Uganda', 'ug', NULL, NULL, NULL),
(226, 'Ukraine', 'ua', NULL, NULL, NULL),
(227, 'United Arab Emirates', 'ae', NULL, NULL, NULL),
(228, 'United Kingdom', 'gb', NULL, NULL, NULL),
(229, 'United States', 'us', NULL, NULL, NULL),
(230, 'Uruguay', 'uy', NULL, NULL, NULL),
(231, 'Uzbekistan', 'uz', NULL, NULL, NULL),
(232, 'Vanuatu', 'vu', NULL, NULL, NULL),
(233, 'Vatican', 'va', NULL, NULL, NULL),
(234, 'Venezuela', 've', NULL, NULL, NULL),
(235, 'Vietnam', 'vn', NULL, NULL, NULL),
(236, 'Wallis and Futuna', 'wf', NULL, NULL, NULL),
(237, 'Western Sahara', 'eh', NULL, NULL, NULL),
(238, 'Yemen', 'ye', NULL, NULL, NULL),
(239, 'Zambia', 'zm', NULL, NULL, NULL),
(240, 'Zimbabwe', 'zw', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `iso`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KRW', '(South) Korean Won', NULL, NULL),
(2, 'AFA', 'Afghanistan Afghani', NULL, NULL),
(3, 'ALL', 'Albanian Lek', NULL, NULL),
(4, 'DZD', 'Algerian Dinar', NULL, NULL),
(5, 'ADP', 'Andorran Peseta', NULL, NULL),
(6, 'AOK', 'Angolan Kwanza', NULL, NULL),
(7, 'ARS', 'Argentine Peso', NULL, NULL),
(8, 'AMD', 'Armenian Dram', NULL, NULL),
(9, 'AWG', 'Aruban Florin', NULL, NULL),
(10, 'AUD', 'Australian Dollar', NULL, NULL),
(11, 'BSD', 'Bahamian Dollar', NULL, NULL),
(12, 'BHD', 'Bahraini Dinar', NULL, NULL),
(13, 'BDT', 'Bangladeshi Taka', NULL, NULL),
(14, 'BBD', 'Barbados Dollar', NULL, NULL),
(15, 'BZD', 'Belize Dollar', NULL, NULL),
(16, 'BMD', 'Bermudian Dollar', NULL, NULL),
(17, 'BTN', 'Bhutan Ngultrum', NULL, NULL),
(18, 'BOB', 'Bolivian Boliviano', NULL, NULL),
(19, 'BWP', 'Botswanian Pula', NULL, NULL),
(20, 'BRL', 'Brazilian Real', NULL, NULL),
(21, 'GBP', 'British Pound', NULL, NULL),
(22, 'BND', 'Brunei Dollar', NULL, NULL),
(23, 'BGN', 'Bulgarian Lev', NULL, NULL),
(24, 'BUK', 'Burma Kyat', NULL, NULL),
(25, 'BIF', 'Burundi Franc', NULL, NULL),
(26, 'CAD', 'Canadian Dollar', NULL, NULL),
(27, 'CVE', 'Cape Verde Escudo', NULL, NULL),
(28, 'KYD', 'Cayman Islands Dollar', NULL, NULL),
(29, 'CLP', 'Chilean Peso', NULL, NULL),
(30, 'CLF', 'Chilean Unidades de Fomento', NULL, NULL),
(31, 'COP', 'Colombian Peso', NULL, NULL),
(32, 'XOF', 'Communauté Financière Africaine BCEAO - Francs', NULL, NULL),
(33, 'XAF', 'Communauté Financière Africaine BEAC, Francs', NULL, NULL),
(34, 'KMF', 'Comoros Franc', NULL, NULL),
(35, 'XPF', 'Comptoirs Français du Pacifique Francs', NULL, NULL),
(36, 'CRC', 'Costa Rican Colon', NULL, NULL),
(37, 'CUP', 'Cuban Peso', NULL, NULL),
(38, 'CYP', 'Cyprus Pound', NULL, NULL),
(39, 'CZK', 'Czech Republic Koruna', NULL, NULL),
(40, 'DKK', 'Danish Krone', NULL, NULL),
(41, 'YDD', 'Democratic Yemeni Dinar', NULL, NULL),
(42, 'DOP', 'Dominican Peso', NULL, NULL),
(43, 'XCD', 'East Caribbean Dollar', NULL, NULL),
(44, 'TPE', 'East Timor Escudo', NULL, NULL),
(45, 'ECS', 'Ecuador Sucre', NULL, NULL),
(46, 'EGP', 'Egyptian Pound', NULL, NULL),
(47, 'SVC', 'El Salvador Colon', NULL, NULL),
(48, 'EEK', 'Estonian Kroon (EEK)', NULL, NULL),
(49, 'ETB', 'Ethiopian Birr', NULL, NULL),
(50, 'EUR', 'Euro', NULL, NULL),
(51, 'FKP', 'Falkland Islands Pound', NULL, NULL),
(52, 'FJD', 'Fiji Dollar', NULL, NULL),
(53, 'GMD', 'Gambian Dalasi', NULL, NULL),
(54, 'GHC', 'Ghanaian Cedi', NULL, NULL),
(55, 'GIP', 'Gibraltar Pound', NULL, NULL),
(56, 'XAU', 'Gold, Ounces', NULL, NULL),
(57, 'GTQ', 'Guatemalan Quetzal', NULL, NULL),
(58, 'GNF', 'Guinea Franc', NULL, NULL),
(59, 'GWP', 'Guinea-Bissau Peso', NULL, NULL),
(60, 'GYD', 'Guyanan Dollar', NULL, NULL),
(61, 'HTG', 'Haitian Gourde', NULL, NULL),
(62, 'HNL', 'Honduran Lempira', NULL, NULL),
(63, 'HKD', 'Hong Kong Dollar', NULL, NULL),
(64, 'HUF', 'Hungarian Forint', NULL, NULL),
(65, 'INR', 'Indian Rupee', NULL, NULL),
(66, 'IDR', 'Indonesian Rupiah', NULL, NULL),
(67, 'XDR', 'International Monetary Fund (IMF) Special Drawing Rights', NULL, NULL),
(68, 'IRR', 'Iranian Rial', NULL, NULL),
(69, 'IQD', 'Iraqi Dinar', NULL, NULL),
(70, 'IEP', 'Irish Punt', NULL, NULL),
(71, 'ILS', 'Israeli Shekel', NULL, NULL),
(72, 'JMD', 'Jamaican Dollar', NULL, NULL),
(73, 'JPY', 'Japanese Yen', NULL, NULL),
(74, 'JOD', 'Jordanian Dinar', NULL, NULL),
(75, 'KHR', 'Kampuchean (Cambodian) Riel', NULL, NULL),
(76, 'KES', 'Kenyan Schilling', NULL, NULL),
(77, 'KWD', 'Kuwaiti Dinar', NULL, NULL),
(78, 'LAK', 'Lao Kip', NULL, NULL),
(79, 'LBP', 'Lebanese Pound', NULL, NULL),
(80, 'LSL', 'Lesotho Loti', NULL, NULL),
(81, 'LRD', 'Liberian Dollar', NULL, NULL),
(82, 'LYD', 'Libyan Dinar', NULL, NULL),
(83, 'MOP', 'Macau Pataca', NULL, NULL),
(84, 'MGF', 'Malagasy Franc', NULL, NULL),
(85, 'MWK', 'Malawi Kwacha', NULL, NULL),
(86, 'MYR', 'Malaysian Ringgit', NULL, NULL),
(87, 'MVR', 'Maldive Rufiyaa', NULL, NULL),
(88, 'MTL', 'Maltese Lira', NULL, NULL),
(89, 'MRO', 'Mauritanian Ouguiya', NULL, NULL),
(90, 'MUR', 'Mauritius Rupee', NULL, NULL),
(91, 'MXP', 'Mexican Peso', NULL, NULL),
(92, 'MNT', 'Mongolian Tugrik', NULL, NULL),
(93, 'MAD', 'Moroccan Dirham', NULL, NULL),
(94, 'MZM', 'Mozambique Metical', NULL, NULL),
(95, 'NAD', 'Namibian Dollar', NULL, NULL),
(96, 'NPR', 'Nepalese Rupee', NULL, NULL),
(97, 'ANG', 'Netherlands Antillian Guilder', NULL, NULL),
(98, 'YUD', 'New Yugoslavia Dinar', NULL, NULL),
(99, 'NZD', 'New Zealand Dollar', NULL, NULL),
(100, 'NIO', 'Nicaraguan Cordoba', NULL, NULL),
(101, 'NGN', 'Nigerian Naira', NULL, NULL),
(102, 'KPW', 'North Korean Won', NULL, NULL),
(103, 'NOK', 'Norwegian Kroner', NULL, NULL),
(104, 'OMR', 'Omani Rial', NULL, NULL),
(105, 'PKR', 'Pakistan Rupee', NULL, NULL),
(106, 'XPD', 'Palladium Ounces', NULL, NULL),
(107, 'PAB', 'Panamanian Balboa', NULL, NULL),
(108, 'PGK', 'Papua New Guinea Kina', NULL, NULL),
(109, 'PYG', 'Paraguay Guarani', NULL, NULL),
(110, 'PEN', 'Peruvian Nuevo Sol', NULL, NULL),
(111, 'PHP', 'Philippine Peso', NULL, NULL),
(112, 'XPT', 'Platinum, Ounces', NULL, NULL),
(113, 'PLN', 'Polish Zloty', NULL, NULL),
(114, 'QAR', 'Qatari Rial', NULL, NULL),
(115, 'RON', 'Romanian Leu', NULL, NULL),
(116, 'RUB', 'Russian Ruble', NULL, NULL),
(117, 'RWF', 'Rwanda Franc', NULL, NULL),
(118, 'WST', 'Samoan Tala', NULL, NULL),
(119, 'STD', 'Sao Tome and Principe Dobra', NULL, NULL),
(120, 'SAR', 'Saudi Arabian Riyal', NULL, NULL),
(121, 'SCR', 'Seychelles Rupee', NULL, NULL),
(122, 'SLL', 'Sierra Leone Leone', NULL, NULL),
(123, 'XAG', 'Silver, Ounces', NULL, NULL),
(124, 'SGD', 'Singapore Dollar', NULL, NULL),
(125, 'SKK', 'Slovak Koruna', NULL, NULL),
(126, 'SBD', 'Solomon Islands Dollar', NULL, NULL),
(127, 'SOS', 'Somali Schilling', NULL, NULL),
(128, 'ZAR', 'South African Rand', NULL, NULL),
(129, 'LKR', 'Sri Lanka Rupee', NULL, NULL),
(130, 'SHP', 'St. Helena Pound', NULL, NULL),
(131, 'SDP', 'Sudanese Pound', NULL, NULL),
(132, 'SRG', 'Suriname Guilder', NULL, NULL),
(133, 'SZL', 'Swaziland Lilangeni', NULL, NULL),
(134, 'SEK', 'Swedish Krona', NULL, NULL),
(135, 'CHF', 'Swiss Franc', NULL, NULL),
(136, 'SYP', 'Syrian Potmd', NULL, NULL),
(137, 'TWD', 'Taiwan Dollar', NULL, NULL),
(138, 'TZS', 'Tanzanian Schilling', NULL, NULL),
(139, 'THB', 'Thai Baht', NULL, NULL),
(140, 'TOP', 'Tongan Paanga', NULL, NULL),
(141, 'TTD', 'Trinidad and Tobago Dollar', NULL, NULL),
(142, 'TND', 'Tunisian Dinar', NULL, NULL),
(143, 'TRY', 'Turkish Lira', NULL, NULL),
(144, 'UGX', 'Uganda Shilling', NULL, NULL),
(145, 'AED', 'United Arab Emirates Dirham', NULL, NULL),
(146, 'UYU', 'Uruguayan Peso', NULL, NULL),
(147, 'USD', 'US Dollar', NULL, NULL),
(148, 'VUV', 'Vanuatu Vatu', NULL, NULL),
(149, 'VEF', 'Venezualan Bolivar', NULL, NULL),
(150, 'VND', 'Vietnamese Dong', NULL, NULL),
(151, 'YER', 'Yemeni Rial', NULL, NULL),
(152, 'CNY', 'Yuan (Chinese) Renminbi', NULL, NULL),
(153, 'ZRZ', 'Zaire Zaire', NULL, NULL),
(154, 'ZMK', 'Zambian Kwacha', NULL, NULL),
(155, 'ZWD', 'Zimbabwe Dollar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industries` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_salary` decimal(15,2) DEFAULT NULL,
  `monthly_salary` decimal(15,2) DEFAULT NULL,
  `yearly_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `safe_medicine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `healthcare` longtext COLLATE utf8mb4_unicode_ci,
  `taxi_available` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `safety` longtext COLLATE utf8mb4_unicode_ci,
  `culture` longtext COLLATE utf8mb4_unicode_ci,
  `politics` longtext COLLATE utf8mb4_unicode_ci,
  `insurance` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `monthly_salary` int(11) DEFAULT NULL,
  `working_hours` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `average_rating` double(15,2) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_industry`
--

CREATE TABLE `employer_industry` (
  `employer_id` int(10) UNSIGNED NOT NULL,
  `industry_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `value`, `created_at`, `updated_at`) VALUES
(1, 'ab', 'Abkhazian', NULL, NULL),
(2, 'ace', 'Achinese', NULL, NULL),
(3, 'ach', 'Acoli', NULL, NULL),
(4, 'ada', 'Adangme', NULL, NULL),
(5, 'ady', 'Adyghe', NULL, NULL),
(6, 'aa', 'Afar', NULL, NULL),
(7, 'afh', 'Afrihili', NULL, NULL),
(8, 'af', 'Afrikaans', NULL, NULL),
(9, 'agq', 'Aghem', NULL, NULL),
(10, 'ain', 'Ainu', NULL, NULL),
(11, 'ak', 'Akan', NULL, NULL),
(12, 'akk', 'Akkadian', NULL, NULL),
(13, 'bss', 'Akoose', NULL, NULL),
(14, 'akz', 'Alabama', NULL, NULL),
(15, 'sq', 'Albanian', NULL, NULL),
(16, 'ale', 'Aleut', NULL, NULL),
(17, 'arq', 'Algerian Arabic', NULL, NULL),
(18, 'am', 'Amarik', NULL, NULL),
(19, 'en_US', 'American English', NULL, NULL),
(20, 'ase', 'American Sign Language', NULL, NULL),
(21, 'egy', 'Ancient Egyptian', NULL, NULL),
(22, 'grc', 'Ancient Greek', NULL, NULL),
(23, 'anp', 'Angika', NULL, NULL),
(24, 'njo', 'Ao Naga', NULL, NULL),
(25, 'ar', 'Arabik', NULL, NULL),
(26, 'an', 'Aragonese', NULL, NULL),
(27, 'arc', 'Aramaic', NULL, NULL),
(28, 'aro', 'Araona', NULL, NULL),
(29, 'arp', 'Arapaho', NULL, NULL),
(30, 'arw', 'Arawak', NULL, NULL),
(31, 'hy', 'Armenian', NULL, NULL),
(32, 'rup', 'Aromanian', NULL, NULL),
(33, 'frp', 'Arpitan', NULL, NULL),
(34, 'as', 'Assamese', NULL, NULL),
(35, 'ast', 'Asturian', NULL, NULL),
(36, 'asa', 'Asu', NULL, NULL),
(37, 'cch', 'Atsam', NULL, NULL),
(38, 'en_AU', 'Australian English', NULL, NULL),
(39, 'de_AT', 'Austrian German', NULL, NULL),
(40, 'av', 'Avaric', NULL, NULL),
(41, 'ae', 'Avestan', NULL, NULL),
(42, 'awa', 'Awadhi', NULL, NULL),
(43, 'ay', 'Aymara', NULL, NULL),
(44, 'az', 'Azerbaijani', NULL, NULL),
(45, 'bfq', 'Badaga', NULL, NULL),
(46, 'ksf', 'Bafia', NULL, NULL),
(47, 'bfd', 'Bafut', NULL, NULL),
(48, 'bqi', 'Bakhtiari', NULL, NULL),
(49, 'ban', 'Balinese', NULL, NULL),
(50, 'bal', 'Baluchi', NULL, NULL),
(51, 'bm', 'Bambara', NULL, NULL),
(52, 'bax', 'Bamun', NULL, NULL),
(53, 'bjn', 'Banjar', NULL, NULL),
(54, 'bas', 'Basaa', NULL, NULL),
(55, 'ba', 'Bashkir', NULL, NULL),
(56, 'eu', 'Basque', NULL, NULL),
(57, 'bbc', 'Batak Toba', NULL, NULL),
(58, 'bar', 'Bavarian', NULL, NULL),
(59, 'bej', 'Beja', NULL, NULL),
(60, 'be', 'Belarus kasa', NULL, NULL),
(61, 'bem', 'Bemba', NULL, NULL),
(62, 'bez', 'Bena', NULL, NULL),
(63, 'bn', 'Bengali kasa', NULL, NULL),
(64, 'bew', 'Betawi', NULL, NULL),
(65, 'my', 'Bɛɛmis kasa', NULL, NULL),
(66, 'bho', 'Bhojpuri', NULL, NULL),
(67, 'bik', 'Bikol', NULL, NULL),
(68, 'bin', 'Bini', NULL, NULL),
(69, 'bpy', 'Bishnupriya', NULL, NULL),
(70, 'bi', 'Bislama', NULL, NULL),
(71, 'byn', 'Blin', NULL, NULL),
(72, 'zbl', 'Blissymbols', NULL, NULL),
(73, 'brx', 'Bodo', NULL, NULL),
(74, 'en', 'Borɔfo', NULL, NULL),
(75, 'bs', 'Bosnian', NULL, NULL),
(76, 'bg', 'Bɔlgeria kasa', NULL, NULL),
(77, 'brh', 'Brahui', NULL, NULL),
(78, 'bra', 'Braj', NULL, NULL),
(79, 'pt_BR', 'Brazilian Portuguese', NULL, NULL),
(80, 'br', 'Breton', NULL, NULL),
(81, 'en_GB', 'British English', NULL, NULL),
(82, 'bug', 'Buginese', NULL, NULL),
(83, 'bum', 'Bulu', NULL, NULL),
(84, 'bua', 'Buriat', NULL, NULL),
(85, 'cad', 'Caddo', NULL, NULL),
(86, 'frc', 'Cajun French', NULL, NULL),
(87, 'en_CA', 'Canadian English', NULL, NULL),
(88, 'fr_CA', 'Canadian French', NULL, NULL),
(89, 'yue', 'Cantonese', NULL, NULL),
(90, 'cps', 'Capiznon', NULL, NULL),
(91, 'car', 'Carib', NULL, NULL),
(92, 'ca', 'Catalan', NULL, NULL),
(93, 'cay', 'Cayuga', NULL, NULL),
(94, 'ceb', 'Cebuano', NULL, NULL),
(95, 'tzm', 'Central Atlas Tamazight', NULL, NULL),
(96, 'dtp', 'Central Dusun', NULL, NULL),
(97, 'ckb', 'Central Kurdish', NULL, NULL),
(98, 'esu', 'Central Yupik', NULL, NULL),
(99, 'shu', 'Chadian Arabic', NULL, NULL),
(100, 'chg', 'Chagatai', NULL, NULL),
(101, 'ch', 'Chamorro', NULL, NULL),
(102, 'ce', 'Chechen', NULL, NULL),
(103, 'chr', 'Cherokee', NULL, NULL),
(104, 'chy', 'Cheyenne', NULL, NULL),
(105, 'chb', 'Chibcha', NULL, NULL),
(106, 'cgg', 'Chiga', NULL, NULL),
(107, 'qug', 'Chimborazo Highland Quichua', NULL, NULL),
(108, 'chn', 'Chinook Jargon', NULL, NULL),
(109, 'chp', 'Chipewyan', NULL, NULL),
(110, 'cho', 'Choctaw', NULL, NULL),
(111, 'cu', 'Church Slavic', NULL, NULL),
(112, 'chk', 'Chuukese', NULL, NULL),
(113, 'cv', 'Chuvash', NULL, NULL),
(114, 'nwc', 'Classical Newari', NULL, NULL),
(115, 'syc', 'Classical Syriac', NULL, NULL),
(116, 'ksh', 'Colognian', NULL, NULL),
(117, 'swb', 'Comorian', NULL, NULL),
(118, 'swc', 'Congo Swahili', NULL, NULL),
(119, 'cop', 'Coptic', NULL, NULL),
(120, 'kw', 'Cornish', NULL, NULL),
(121, 'co', 'Corsican', NULL, NULL),
(122, 'cr', 'Cree', NULL, NULL),
(123, 'mus', 'Creek', NULL, NULL),
(124, 'crh', 'Crimean Turkish', NULL, NULL),
(125, 'hr', 'Croatian', NULL, NULL),
(126, 'dak', 'Dakota', NULL, NULL),
(127, 'da', 'Danish', NULL, NULL),
(128, 'dar', 'Dargwa', NULL, NULL),
(129, 'dzg', 'Dazaga', NULL, NULL),
(130, 'del', 'Delaware', NULL, NULL),
(131, 'nl', 'Dɛɛkye', NULL, NULL),
(132, 'din', 'Dinka', NULL, NULL),
(133, 'dv', 'Divehi', NULL, NULL),
(134, 'doi', 'Dogri', NULL, NULL),
(135, 'dgr', 'Dogrib', NULL, NULL),
(136, 'dua', 'Duala', NULL, NULL),
(137, 'dyu', 'Dyula', NULL, NULL),
(138, 'dz', 'Dzongkha', NULL, NULL),
(139, 'frs', 'Eastern Frisian', NULL, NULL),
(140, 'efi', 'Efik', NULL, NULL),
(141, 'arz', 'Egyptian Arabic', NULL, NULL),
(142, 'eka', 'Ekajuk', NULL, NULL),
(143, 'elx', 'Elamite', NULL, NULL),
(144, 'ebu', 'Embu', NULL, NULL),
(145, 'egl', 'Emilian', NULL, NULL),
(146, 'myv', 'Erzya', NULL, NULL),
(147, 'eo', 'Esperanto', NULL, NULL),
(148, 'et', 'Estonian', NULL, NULL),
(149, 'pt_PT', 'European Portuguese', NULL, NULL),
(150, 'es_ES', 'European Spanish', NULL, NULL),
(151, 'ee', 'Ewe', NULL, NULL),
(152, 'ewo', 'Ewondo', NULL, NULL),
(153, 'ext', 'Extremaduran', NULL, NULL),
(154, 'fan', 'Fang', NULL, NULL),
(155, 'fat', 'Fanti', NULL, NULL),
(156, 'fo', 'Faroese', NULL, NULL),
(157, 'hif', 'Fiji Hindi', NULL, NULL),
(158, 'fj', 'Fijian', NULL, NULL),
(159, 'fil', 'Filipino', NULL, NULL),
(160, 'fi', 'Finnish', NULL, NULL),
(161, 'nl_BE', 'Flemish', NULL, NULL),
(162, 'fon', 'Fon', NULL, NULL),
(163, 'gur', 'Frafra', NULL, NULL),
(164, 'fr', 'Frɛnkye', NULL, NULL),
(165, 'fur', 'Friulian', NULL, NULL),
(166, 'ff', 'Fulah', NULL, NULL),
(167, 'gaa', 'Ga', NULL, NULL),
(168, 'gag', 'Gagauz', NULL, NULL),
(169, 'gl', 'Galician', NULL, NULL),
(170, 'gan', 'Gan Chinese', NULL, NULL),
(171, 'lg', 'Ganda', NULL, NULL),
(172, 'gay', 'Gayo', NULL, NULL),
(173, 'gba', 'Gbaya', NULL, NULL),
(174, 'gez', 'Geez', NULL, NULL),
(175, 'ka', 'Georgian', NULL, NULL),
(176, 'aln', 'Gheg Albanian', NULL, NULL),
(177, 'bbj', 'Ghomala', NULL, NULL),
(178, 'glk', 'Gilaki', NULL, NULL),
(179, 'gil', 'Gilbertese', NULL, NULL),
(180, 'gom', 'Goan Konkani', NULL, NULL),
(181, 'gon', 'Gondi', NULL, NULL),
(182, 'gor', 'Gorontalo', NULL, NULL),
(183, 'got', 'Gothic', NULL, NULL),
(184, 'grb', 'Grebo', NULL, NULL),
(185, 'el', 'Greek kasa', NULL, NULL),
(186, 'gn', 'Guarani', NULL, NULL),
(187, 'gu', 'Gujarati', NULL, NULL),
(188, 'guz', 'Gusii', NULL, NULL),
(189, 'gwi', 'Gwichʼin', NULL, NULL),
(190, 'de', 'Gyaaman', NULL, NULL),
(191, 'jv', 'Gyabanis kasa', NULL, NULL),
(192, 'ja', 'Gyapan kasa', NULL, NULL),
(193, 'hai', 'Haida', NULL, NULL),
(194, 'ht', 'Haitian', NULL, NULL),
(195, 'hak', 'Hakka Chinese', NULL, NULL),
(196, 'hu', 'Hangri kasa', NULL, NULL),
(197, 'ha', 'Hausa', NULL, NULL),
(198, 'haw', 'Hawaiian', NULL, NULL),
(199, 'he', 'Hebrew', NULL, NULL),
(200, 'hz', 'Herero', NULL, NULL),
(201, 'hil', 'Hiligaynon', NULL, NULL),
(202, 'hi', 'Hindi', NULL, NULL),
(203, 'ho', 'Hiri Motu', NULL, NULL),
(204, 'hit', 'Hittite', NULL, NULL),
(205, 'hmn', 'Hmong', NULL, NULL),
(206, 'hup', 'Hupa', NULL, NULL),
(207, 'iba', 'Iban', NULL, NULL),
(208, 'ibb', 'Ibibio', NULL, NULL),
(209, 'is', 'Icelandic', NULL, NULL),
(210, 'io', 'Ido', NULL, NULL),
(211, 'ig', 'Igbo', NULL, NULL),
(212, 'ilo', 'Iloko', NULL, NULL),
(213, 'smn', 'Inari Sami', NULL, NULL),
(214, 'id', 'Indonihyia kasa', NULL, NULL),
(215, 'izh', 'Ingrian', NULL, NULL),
(216, 'inh', 'Ingush', NULL, NULL),
(217, 'ia', 'Interlingua', NULL, NULL),
(218, 'ie', 'Interlingue', NULL, NULL),
(219, 'iu', 'Inuktitut', NULL, NULL),
(220, 'ik', 'Inupiaq', NULL, NULL),
(221, 'ga', 'Irish', NULL, NULL),
(222, 'it', 'Italy kasa', NULL, NULL),
(223, 'jam', 'Jamaican Creole English', NULL, NULL),
(224, 'kaj', 'Jju', NULL, NULL),
(225, 'dyo', 'Jola-Fonyi', NULL, NULL),
(226, 'jrb', 'Judeo-Arabic', NULL, NULL),
(227, 'jpr', 'Judeo-Persian', NULL, NULL),
(228, 'jut', 'Jutish', NULL, NULL),
(229, 'kbd', 'Kabardian', NULL, NULL),
(230, 'kea', 'Kabuverdianu', NULL, NULL),
(231, 'kab', 'Kabyle', NULL, NULL),
(232, 'kac', 'Kachin', NULL, NULL),
(233, 'kgp', 'Kaingang', NULL, NULL),
(234, 'kkj', 'Kako', NULL, NULL),
(235, 'kl', 'Kalaallisut', NULL, NULL),
(236, 'kln', 'Kalenjin', NULL, NULL),
(237, 'xal', 'Kalmyk', NULL, NULL),
(238, 'kam', 'Kamba', NULL, NULL),
(239, 'km', 'Kambodia kasa', NULL, NULL),
(240, 'kbl', 'Kanembu', NULL, NULL),
(241, 'kn', 'Kannada', NULL, NULL),
(242, 'kr', 'Kanuri', NULL, NULL),
(243, 'kaa', 'Kara-Kalpak', NULL, NULL),
(244, 'krc', 'Karachay-Balkar', NULL, NULL),
(245, 'krl', 'Karelian', NULL, NULL),
(246, 'ks', 'Kashmiri', NULL, NULL),
(247, 'csb', 'Kashubian', NULL, NULL),
(248, 'kaw', 'Kawi', NULL, NULL),
(249, 'kk', 'Kazakh', NULL, NULL),
(250, 'ken', 'Kenyang', NULL, NULL),
(251, 'kha', 'Khasi', NULL, NULL),
(252, 'kho', 'Khotanese', NULL, NULL),
(253, 'khw', 'Khowar', NULL, NULL),
(254, 'ki', 'Kikuyu', NULL, NULL),
(255, 'kmb', 'Kimbundu', NULL, NULL),
(256, 'krj', 'Kinaray-a', NULL, NULL),
(257, 'kiu', 'Kirmanjki', NULL, NULL),
(258, 'tlh', 'Klingon', NULL, NULL),
(259, 'bkm', 'Kom', NULL, NULL),
(260, 'kv', 'Komi', NULL, NULL),
(261, 'koi', 'Komi-Permyak', NULL, NULL),
(262, 'kg', 'Kongo', NULL, NULL),
(263, 'kok', 'Konkani', NULL, NULL),
(264, 'ko', 'Korea kasa', NULL, NULL),
(265, 'kfo', 'Koro', NULL, NULL),
(266, 'kos', 'Kosraean', NULL, NULL),
(267, 'avk', 'Kotava', NULL, NULL),
(268, 'khq', 'Koyra Chiini', NULL, NULL),
(269, 'ses', 'Koyraboro Senni', NULL, NULL),
(270, 'kpe', 'Kpelle', NULL, NULL),
(271, 'kri', 'Krio', NULL, NULL),
(272, 'kj', 'Kuanyama', NULL, NULL),
(273, 'kum', 'Kumyk', NULL, NULL),
(274, 'ku', 'Kurdish', NULL, NULL),
(275, 'kru', 'Kurukh', NULL, NULL),
(276, 'kut', 'Kutenai', NULL, NULL),
(277, 'nmg', 'Kwasio', NULL, NULL),
(278, 'zh', 'Kyaena kasa', NULL, NULL),
(279, 'cs', 'Kyɛk kasa', NULL, NULL),
(280, 'ky', 'Kyrgyz', NULL, NULL),
(281, 'quc', 'Kʼicheʼ', NULL, NULL),
(282, 'lad', 'Ladino', NULL, NULL),
(283, 'lah', 'Lahnda', NULL, NULL),
(284, 'lkt', 'Lakota', NULL, NULL),
(285, 'lam', 'Lamba', NULL, NULL),
(286, 'lag', 'Langi', NULL, NULL),
(287, 'lo', 'Lao', NULL, NULL),
(288, 'ltg', 'Latgalian', NULL, NULL),
(289, 'la', 'Latin', NULL, NULL),
(290, 'es_419', 'Latin American Spanish', NULL, NULL),
(291, 'lv', 'Latvian', NULL, NULL),
(292, 'lzz', 'Laz', NULL, NULL),
(293, 'lez', 'Lezghian', NULL, NULL),
(294, 'lij', 'Ligurian', NULL, NULL),
(295, 'li', 'Limburgish', NULL, NULL),
(296, 'ln', 'Lingala', NULL, NULL),
(297, 'lfn', 'Lingua Franca Nova', NULL, NULL),
(298, 'lzh', 'Literary Chinese', NULL, NULL),
(299, 'lt', 'Lithuanian', NULL, NULL),
(300, 'liv', 'Livonian', NULL, NULL),
(301, 'jbo', 'Lojban', NULL, NULL),
(302, 'lmo', 'Lombard', NULL, NULL),
(303, 'nds', 'Low German', NULL, NULL),
(304, 'sli', 'Lower Silesian', NULL, NULL),
(305, 'dsb', 'Lower Sorbian', NULL, NULL),
(306, 'loz', 'Lozi', NULL, NULL),
(307, 'lu', 'Luba-Katanga', NULL, NULL),
(308, 'lua', 'Luba-Lulua', NULL, NULL),
(309, 'lui', 'Luiseno', NULL, NULL),
(310, 'smj', 'Lule Sami', NULL, NULL),
(311, 'lun', 'Lunda', NULL, NULL),
(312, 'luo', 'Luo', NULL, NULL),
(313, 'lb', 'Luxembourgish', NULL, NULL),
(314, 'luy', 'Luyia', NULL, NULL),
(315, 'mde', 'Maba', NULL, NULL),
(316, 'mk', 'Macedonian', NULL, NULL),
(317, 'jmc', 'Machame', NULL, NULL),
(318, 'mad', 'Madurese', NULL, NULL),
(319, 'maf', 'Mafa', NULL, NULL),
(320, 'mag', 'Magahi', NULL, NULL),
(321, 'vmf', 'Main-Franconian', NULL, NULL),
(322, 'mai', 'Maithili', NULL, NULL),
(323, 'mak', 'Makasar', NULL, NULL),
(324, 'mgh', 'Makhuwa-Meetto', NULL, NULL),
(325, 'kde', 'Makonde', NULL, NULL),
(326, 'mg', 'Malagasy', NULL, NULL),
(327, 'ms', 'Malay kasa', NULL, NULL),
(328, 'ml', 'Malayalam', NULL, NULL),
(329, 'mt', 'Maltese', NULL, NULL),
(330, 'mnc', 'Manchu', NULL, NULL),
(331, 'mdr', 'Mandar', NULL, NULL),
(332, 'man', 'Mandingo', NULL, NULL),
(333, 'mni', 'Manipuri', NULL, NULL),
(334, 'gv', 'Manx', NULL, NULL),
(335, 'mi', 'Maori', NULL, NULL),
(336, 'arn', 'Mapuche', NULL, NULL),
(337, 'mr', 'Marathi', NULL, NULL),
(338, 'chm', 'Mari', NULL, NULL),
(339, 'mh', 'Marshallese', NULL, NULL),
(340, 'mwr', 'Marwari', NULL, NULL),
(341, 'mas', 'Masai', NULL, NULL),
(342, 'mzn', 'Mazanderani', NULL, NULL),
(343, 'byv', 'Medumba', NULL, NULL),
(344, 'men', 'Mende', NULL, NULL),
(345, 'mwv', 'Mentawai', NULL, NULL),
(346, 'mer', 'Meru', NULL, NULL),
(347, 'mgo', 'Metaʼ', NULL, NULL),
(348, 'es_MX', 'Mexican Spanish', NULL, NULL),
(349, 'mic', 'Micmac', NULL, NULL),
(350, 'dum', 'Middle Dutch', NULL, NULL),
(351, 'enm', 'Middle English', NULL, NULL),
(352, 'frm', 'Middle French', NULL, NULL),
(353, 'gmh', 'Middle High German', NULL, NULL),
(354, 'mga', 'Middle Irish', NULL, NULL),
(355, 'nan', 'Min Nan Chinese', NULL, NULL),
(356, 'min', 'Minangkabau', NULL, NULL),
(357, 'xmf', 'Mingrelian', NULL, NULL),
(358, 'mwl', 'Mirandese', NULL, NULL),
(359, 'lus', 'Mizo', NULL, NULL),
(360, 'ar_001', 'Modern Standard Arabic', NULL, NULL),
(361, 'moh', 'Mohawk', NULL, NULL),
(362, 'mdf', 'Moksha', NULL, NULL),
(363, 'ro_MD', 'Moldavian', NULL, NULL),
(364, 'lol', 'Mongo', NULL, NULL),
(365, 'mn', 'Mongolian', NULL, NULL),
(366, 'mfe', 'Morisyen', NULL, NULL),
(367, 'ary', 'Moroccan Arabic', NULL, NULL),
(368, 'mos', 'Mossi', NULL, NULL),
(369, 'mul', 'Multiple Languages', NULL, NULL),
(370, 'mua', 'Mundang', NULL, NULL),
(371, 'ttt', 'Muslim Tat', NULL, NULL),
(372, 'mye', 'Myene', NULL, NULL),
(373, 'naq', 'Nama', NULL, NULL),
(374, 'na', 'Nauru', NULL, NULL),
(375, 'nv', 'Navajo', NULL, NULL),
(376, 'ng', 'Ndonga', NULL, NULL),
(377, 'nap', 'Neapolitan', NULL, NULL),
(378, 'new', 'Newari', NULL, NULL),
(379, 'ne', 'Nɛpal kasa', NULL, NULL),
(380, 'sba', 'Ngambay', NULL, NULL),
(381, 'nnh', 'Ngiemboon', NULL, NULL),
(382, 'jgo', 'Ngomba', NULL, NULL),
(383, 'yrl', 'Nheengatu', NULL, NULL),
(384, 'nia', 'Nias', NULL, NULL),
(385, 'niu', 'Niuean', NULL, NULL),
(386, 'zxx', 'No linguistic content', NULL, NULL),
(387, 'nog', 'Nogai', NULL, NULL),
(388, 'nd', 'North Ndebele', NULL, NULL),
(389, 'frr', 'Northern Frisian', NULL, NULL),
(390, 'se', 'Northern Sami', NULL, NULL),
(391, 'nso', 'Northern Sotho', NULL, NULL),
(392, 'no', 'Norwegian', NULL, NULL),
(393, 'nb', 'Norwegian Bokmål', NULL, NULL),
(394, 'nn', 'Norwegian Nynorsk', NULL, NULL),
(395, 'nov', 'Novial', NULL, NULL),
(396, 'nus', 'Nuer', NULL, NULL),
(397, 'nym', 'Nyamwezi', NULL, NULL),
(398, 'ny', 'Nyanja', NULL, NULL),
(399, 'nyn', 'Nyankole', NULL, NULL),
(400, 'tog', 'Nyasa Tonga', NULL, NULL),
(401, 'nyo', 'Nyoro', NULL, NULL),
(402, 'nzi', 'Nzima', NULL, NULL),
(403, 'nqo', 'NʼKo', NULL, NULL),
(404, 'oc', 'Occitan', NULL, NULL),
(405, 'oj', 'Ojibwa', NULL, NULL),
(406, 'ang', 'Old English', NULL, NULL),
(407, 'fro', 'Old French', NULL, NULL),
(408, 'goh', 'Old High German', NULL, NULL),
(409, 'sga', 'Old Irish', NULL, NULL),
(410, 'non', 'Old Norse', NULL, NULL),
(411, 'peo', 'Old Persian', NULL, NULL),
(412, 'pro', 'Old Provençal', NULL, NULL),
(413, 'or', 'Oriya', NULL, NULL),
(414, 'om', 'Oromo', NULL, NULL),
(415, 'osa', 'Osage', NULL, NULL),
(416, 'os', 'Ossetic', NULL, NULL),
(417, 'ota', 'Ottoman Turkish', NULL, NULL),
(418, 'pal', 'Pahlavi', NULL, NULL),
(419, 'pfl', 'Palatine German', NULL, NULL),
(420, 'pau', 'Palauan', NULL, NULL),
(421, 'pi', 'Pali', NULL, NULL),
(422, 'pam', 'Pampanga', NULL, NULL),
(423, 'pag', 'Pangasinan', NULL, NULL),
(424, 'pap', 'Papiamento', NULL, NULL),
(425, 'ps', 'Pashto', NULL, NULL),
(426, 'pdc', 'Pennsylvania German', NULL, NULL),
(427, 'fa', 'Pɛɛhyia kasa', NULL, NULL),
(428, 'phn', 'Phoenician', NULL, NULL),
(429, 'pcd', 'Picard', NULL, NULL),
(430, 'pms', 'Piedmontese', NULL, NULL),
(431, 'pdt', 'Plautdietsch', NULL, NULL),
(432, 'pon', 'Pohnpeian', NULL, NULL),
(433, 'pnt', 'Pontic', NULL, NULL),
(434, 'pl', 'Pɔland kasa', NULL, NULL),
(435, 'pt', 'Pɔɔtugal kasa', NULL, NULL),
(436, 'prg', 'Prussian', NULL, NULL),
(437, 'pa', 'Pungyabi kasa', NULL, NULL),
(438, 'qu', 'Quechua', NULL, NULL),
(439, 'ru', 'Rahyia kasa', NULL, NULL),
(440, 'raj', 'Rajasthani', NULL, NULL),
(441, 'rap', 'Rapanui', NULL, NULL),
(442, 'rar', 'Rarotongan', NULL, NULL),
(443, 'rw', 'Rewanda kasa', NULL, NULL),
(444, 'rif', 'Riffian', NULL, NULL),
(445, 'rgn', 'Romagnol', NULL, NULL),
(446, 'rm', 'Romansh', NULL, NULL),
(447, 'rom', 'Romany', NULL, NULL),
(448, 'rof', 'Rombo', NULL, NULL),
(449, 'ro', 'Romenia kasa', NULL, NULL),
(450, 'root', 'Root', NULL, NULL),
(451, 'rtm', 'Rotuman', NULL, NULL),
(452, 'rug', 'Roviana', NULL, NULL),
(453, 'rn', 'Rundi', NULL, NULL),
(454, 'rue', 'Rusyn', NULL, NULL),
(455, 'rwk', 'Rwa', NULL, NULL),
(456, 'ssy', 'Saho', NULL, NULL),
(457, 'sah', 'Sakha', NULL, NULL),
(458, 'sam', 'Samaritan Aramaic', NULL, NULL),
(459, 'saq', 'Samburu', NULL, NULL),
(460, 'sm', 'Samoan', NULL, NULL),
(461, 'sgs', 'Samogitian', NULL, NULL),
(462, 'sad', 'Sandawe', NULL, NULL),
(463, 'sg', 'Sango', NULL, NULL),
(464, 'sbp', 'Sangu', NULL, NULL),
(465, 'sa', 'Sanskrit', NULL, NULL),
(466, 'sat', 'Santali', NULL, NULL),
(467, 'sc', 'Sardinian', NULL, NULL),
(468, 'sas', 'Sasak', NULL, NULL),
(469, 'sdc', 'Sassarese Sardinian', NULL, NULL),
(470, 'stq', 'Saterland Frisian', NULL, NULL),
(471, 'saz', 'Saurashtra', NULL, NULL),
(472, 'sco', 'Scots', NULL, NULL),
(473, 'gd', 'Scottish Gaelic', NULL, NULL),
(474, 'sly', 'Selayar', NULL, NULL),
(475, 'sel', 'Selkup', NULL, NULL),
(476, 'seh', 'Sena', NULL, NULL),
(477, 'see', 'Seneca', NULL, NULL),
(478, 'sr', 'Serbian', NULL, NULL),
(479, 'sh', 'Serbo-Croatian', NULL, NULL),
(480, 'srr', 'Serer', NULL, NULL),
(481, 'sei', 'Seri', NULL, NULL),
(482, 'ksb', 'Shambala', NULL, NULL),
(483, 'shn', 'Shan', NULL, NULL),
(484, 'sn', 'Shona', NULL, NULL),
(485, 'ii', 'Sichuan Yi', NULL, NULL),
(486, 'scn', 'Sicilian', NULL, NULL),
(487, 'sid', 'Sidamo', NULL, NULL),
(488, 'bla', 'Siksika', NULL, NULL),
(489, 'szl', 'Silesian', NULL, NULL),
(490, 'zh_Hans', 'Simplified Chinese', NULL, NULL),
(491, 'sd', 'Sindhi', NULL, NULL),
(492, 'si', 'Sinhala', NULL, NULL),
(493, 'sms', 'Skolt Sami', NULL, NULL),
(494, 'den', 'Slave', NULL, NULL),
(495, 'sk', 'Slovak', NULL, NULL),
(496, 'sl', 'Slovenian', NULL, NULL),
(497, 'xog', 'Soga', NULL, NULL),
(498, 'sog', 'Sogdien', NULL, NULL),
(499, 'so', 'Somalia kasa', NULL, NULL),
(500, 'snk', 'Soninke', NULL, NULL),
(501, 'azb', 'South Azerbaijani', NULL, NULL),
(502, 'nr', 'South Ndebele', NULL, NULL),
(503, 'alt', 'Southern Altai', NULL, NULL),
(504, 'sma', 'Southern Sami', NULL, NULL),
(505, 'st', 'Southern Sotho', NULL, NULL),
(506, 'es', 'Spain kasa', NULL, NULL),
(507, 'srn', 'Sranan Tongo', NULL, NULL),
(508, 'zgh', 'Standard Moroccan Tamazight', NULL, NULL),
(509, 'suk', 'Sukuma', NULL, NULL),
(510, 'sux', 'Sumerian', NULL, NULL),
(511, 'su', 'Sundanese', NULL, NULL),
(512, 'sus', 'Susu', NULL, NULL),
(513, 'sw', 'Swahili', NULL, NULL),
(514, 'ss', 'Swati', NULL, NULL),
(515, 'sv', 'Sweden kasa', NULL, NULL),
(516, 'fr_CH', 'Swiss French', NULL, NULL),
(517, 'gsw', 'Swiss German', NULL, NULL),
(518, 'de_CH', 'Swiss High German', NULL, NULL),
(519, 'syr', 'Syriac', NULL, NULL),
(520, 'shi', 'Tachelhit', NULL, NULL),
(521, 'th', 'Taeland kasa', NULL, NULL),
(522, 'tl', 'Tagalog', NULL, NULL),
(523, 'ty', 'Tahitian', NULL, NULL),
(524, 'dav', 'Taita', NULL, NULL),
(525, 'tg', 'Tajik', NULL, NULL),
(526, 'tly', 'Talysh', NULL, NULL),
(527, 'tmh', 'Tamashek', NULL, NULL),
(528, 'ta', 'Tamil kasa', NULL, NULL),
(529, 'trv', 'Taroko', NULL, NULL),
(530, 'twq', 'Tasawaq', NULL, NULL),
(531, 'tt', 'Tatar', NULL, NULL),
(532, 'te', 'Telugu', NULL, NULL),
(533, 'ter', 'Tereno', NULL, NULL),
(534, 'teo', 'Teso', NULL, NULL),
(535, 'tet', 'Tetum', NULL, NULL),
(536, 'tr', 'Tɛɛki kasa', NULL, NULL),
(537, 'bo', 'Tibetan', NULL, NULL),
(538, 'tig', 'Tigre', NULL, NULL),
(539, 'ti', 'Tigrinya', NULL, NULL),
(540, 'tem', 'Timne', NULL, NULL),
(541, 'tiv', 'Tiv', NULL, NULL),
(542, 'tli', 'Tlingit', NULL, NULL),
(543, 'tpi', 'Tok Pisin', NULL, NULL),
(544, 'tkl', 'Tokelau', NULL, NULL),
(545, 'to', 'Tongan', NULL, NULL),
(546, 'fit', 'Tornedalen Finnish', NULL, NULL),
(547, 'zh_Hant', 'Traditional Chinese', NULL, NULL),
(548, 'tkr', 'Tsakhur', NULL, NULL),
(549, 'tsd', 'Tsakonian', NULL, NULL),
(550, 'tsi', 'Tsimshian', NULL, NULL),
(551, 'ts', 'Tsonga', NULL, NULL),
(552, 'tn', 'Tswana', NULL, NULL),
(553, 'tcy', 'Tulu', NULL, NULL),
(554, 'tum', 'Tumbuka', NULL, NULL),
(555, 'aeb', 'Tunisian Arabic', NULL, NULL),
(556, 'tk', 'Turkmen', NULL, NULL),
(557, 'tru', 'Turoyo', NULL, NULL),
(558, 'tvl', 'Tuvalu', NULL, NULL),
(559, 'tyv', 'Tuvinian', NULL, NULL),
(560, 'tw', 'Twi', NULL, NULL),
(561, 'kcg', 'Tyap', NULL, NULL),
(562, 'udm', 'Udmurt', NULL, NULL),
(563, 'uga', 'Ugaritic', NULL, NULL),
(564, 'uk', 'Ukren kasa', NULL, NULL),
(565, 'umb', 'Umbundu', NULL, NULL),
(566, 'und', 'Unknown Language', NULL, NULL),
(567, 'hsb', 'Upper Sorbian', NULL, NULL),
(568, 'ur', 'Urdu kasa', NULL, NULL),
(569, 'ug', 'Uyghur', NULL, NULL),
(570, 'uz', 'Uzbek', NULL, NULL),
(571, 'vai', 'Vai', NULL, NULL),
(572, 've', 'Venda', NULL, NULL),
(573, 'vec', 'Venetian', NULL, NULL),
(574, 'vep', 'Veps', NULL, NULL),
(575, 'vi', 'Viɛtnam kasa', NULL, NULL),
(576, 'vo', 'Volapük', NULL, NULL),
(577, 'vro', 'Võro', NULL, NULL),
(578, 'vot', 'Votic', NULL, NULL),
(579, 'vun', 'Vunjo', NULL, NULL),
(580, 'wa', 'Walloon', NULL, NULL),
(581, 'wae', 'Walser', NULL, NULL),
(582, 'war', 'Waray', NULL, NULL),
(583, 'wbp', 'Warlpiri', NULL, NULL),
(584, 'was', 'Washo', NULL, NULL),
(585, 'guc', 'Wayuu', NULL, NULL),
(586, 'cy', 'Welsh', NULL, NULL),
(587, 'vls', 'West Flemish', NULL, NULL),
(588, 'fy', 'Western Frisian', NULL, NULL),
(589, 'mrj', 'Western Mari', NULL, NULL),
(590, 'wal', 'Wolaytta', NULL, NULL),
(591, 'wo', 'Wolof', NULL, NULL),
(592, 'wuu', 'Wu Chinese', NULL, NULL),
(593, 'xh', 'Xhosa', NULL, NULL),
(594, 'hsn', 'Xiang Chinese', NULL, NULL),
(595, 'yav', 'Yangben', NULL, NULL),
(596, 'yao', 'Yao', NULL, NULL),
(597, 'yap', 'Yapese', NULL, NULL),
(598, 'ybb', 'Yemba', NULL, NULL),
(599, 'yi', 'Yiddish', NULL, NULL),
(600, 'yo', 'Yoruba', NULL, NULL),
(601, 'zap', 'Zapotec', NULL, NULL),
(602, 'dje', 'Zarma', NULL, NULL),
(603, 'zza', 'Zaza', NULL, NULL),
(604, 'zea', 'Zeelandic', NULL, NULL),
(605, 'zen', 'Zenaga', NULL, NULL),
(606, 'za', 'Zhuang', NULL, NULL),
(607, 'gbz', 'Zoroastrian Dari', NULL, NULL),
(608, 'zu', 'Zulu', NULL, NULL),
(609, 'zun', 'Zuni', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Company', 2, 'logo', '5de37df3d585c_asian motor bike gray', '5de37df3d585c_asian-motor-bike-gray.jpg', 'image/jpeg', 'public', 36764, '[]', '{\"generated_conversions\": {\"thumb\": true}}', '[]', 1, '2019-12-01 02:46:46', '2019-12-01 02:46:46'),
(2, 'App\\Company', 1, 'logo', '5de386633d7a4_asian motor bike gray', '5de386633d7a4_asian-motor-bike-gray.jpg', 'image/jpeg', 'public', 36764, '[]', '{\"generated_conversions\": {\"thumb\": true}}', '[]', 2, '2019-12-01 03:22:45', '2019-12-01 03:22:45'),
(3, 'App\\Setting', 1, 'logo', '5de3870b77acf_asian motor bike gray', '5de3870b77acf_asian-motor-bike-gray.jpg', 'image/jpeg', 'public', 36764, '[]', '{\"generated_conversions\": {\"thumb\": true}}', '[]', 3, '2019-12-01 03:25:33', '2019-12-01 03:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_12_01_000001_create_media_table', 1),
(8, '2019_12_01_000002_create_settings_table', 1),
(9, '2019_12_01_000003_create_comments_table', 1),
(10, '2019_12_01_000004_create_industries_table', 1),
(11, '2019_12_01_000005_create_permissions_table', 1),
(12, '2019_12_01_000006_create_agents_table', 1),
(13, '2019_12_01_000007_create_employers_table', 1),
(14, '2019_12_01_000008_create_users_table', 1),
(15, '2019_12_01_000009_create_roles_table', 1),
(16, '2019_12_01_000010_create_employer_industry_pivot_table', 1),
(17, '2019_12_01_000011_create_agent_employer_pivot_table', 1),
(18, '2019_12_01_000012_create_role_user_pivot_table', 1),
(19, '2019_12_01_000013_create_agent_user_pivot_table', 1),
(20, '2019_12_01_000014_create_agent_comment_pivot_table', 1),
(21, '2019_12_01_000015_create_permission_role_pivot_table', 1),
(22, '2019_12_01_000016_add_relationship_fields_to_agents_table', 1),
(23, '2019_12_01_000017_add_relationship_fields_to_comments_table', 1),
(24, '2019_12_01_000018_add_verification_fields', 1),
(25, '2019_12_01_000019_add_approval_fields', 1),
(27, '2019_09_16_000004_create_cities_table', 3),
(28, '2019_09_16_000005_create_categories_table', 3),
(29, '2019_12_01_062927_create_companies_table', 4),
(30, '2019_09_16_000009_create_category_company_pivot_table', 5),
(31, '2019_12_01_000008_create_destinations_table', 6),
(32, '2019_12_01_000009_create_visas_table', 6),
(33, '2019_12_01_000010_create_countries_table', 6),
(34, '2019_12_01_164738_create_languages_table', 7),
(35, '2019_12_01_171442_create_currencies_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'employer_create', NULL, NULL, NULL),
(18, 'employer_edit', NULL, NULL, NULL),
(19, 'employer_show', NULL, NULL, NULL),
(20, 'employer_delete', NULL, NULL, NULL),
(21, 'employer_access', NULL, NULL, NULL),
(22, 'agent_create', NULL, NULL, NULL),
(23, 'agent_edit', NULL, NULL, NULL),
(24, 'agent_show', NULL, NULL, NULL),
(25, 'agent_delete', NULL, NULL, NULL),
(26, 'agent_access', NULL, NULL, NULL),
(27, 'industry_create', NULL, NULL, NULL),
(28, 'industry_edit', NULL, NULL, NULL),
(29, 'industry_show', NULL, NULL, NULL),
(30, 'industry_delete', NULL, NULL, NULL),
(31, 'industry_access', NULL, NULL, NULL),
(32, 'comment_create', NULL, NULL, NULL),
(33, 'comment_edit', NULL, NULL, NULL),
(34, 'comment_show', NULL, NULL, NULL),
(35, 'comment_delete', NULL, NULL, NULL),
(36, 'comment_access', NULL, NULL, NULL),
(37, 'setting_create', NULL, NULL, NULL),
(38, 'setting_edit', NULL, NULL, NULL),
(39, 'setting_show', NULL, NULL, NULL),
(40, 'setting_delete', NULL, NULL, NULL),
(41, 'setting_access', NULL, NULL, NULL),
(42, 'site_setting_access', NULL, NULL, NULL),
(43, 'company_access', '2019-12-01 00:44:29', '2019-12-01 00:44:29', NULL),
(44, 'company_delete', '2019-12-01 01:27:58', '2019-12-01 01:27:58', NULL),
(45, 'company_show', '2019-12-01 01:28:12', '2019-12-01 01:28:12', NULL),
(46, 'company_edit', '2019-12-01 01:28:27', '2019-12-01 01:28:27', NULL),
(47, 'company_create', '2019-12-01 01:28:41', '2019-12-01 01:28:41', NULL),
(48, 'city_access', '2019-12-01 01:43:51', '2019-12-01 01:43:51', NULL),
(49, 'city_delete', '2019-12-01 01:44:08', '2019-12-01 01:44:08', NULL),
(50, 'city_show', '2019-12-01 01:44:23', '2019-12-01 01:44:23', NULL),
(51, 'city_edit', '2019-12-01 01:44:34', '2019-12-01 01:44:34', NULL),
(52, 'city_create', '2019-12-01 01:44:48', '2019-12-01 01:44:48', NULL),
(53, 'category_access', '2019-12-01 01:45:11', '2019-12-01 01:45:11', NULL),
(54, 'category_delete', '2019-12-01 01:45:21', '2019-12-01 01:45:21', NULL),
(55, 'category_show', '2019-12-01 01:45:32', '2019-12-01 01:45:32', NULL),
(56, 'category_edit', '2019-12-01 01:45:48', '2019-12-01 01:45:48', NULL),
(57, 'category_create', '2019-12-01 01:46:02', '2019-12-01 01:46:02', NULL),
(58, 'country_access', '2019-12-01 06:23:19', '2019-12-01 06:23:19', NULL),
(59, 'country_delete', '2019-12-01 06:23:35', '2019-12-01 06:23:35', NULL),
(60, 'country_show', '2019-12-01 06:23:51', '2019-12-01 06:23:51', NULL),
(61, 'country_edit', '2019-12-01 06:24:02', '2019-12-01 06:24:02', NULL),
(62, 'country_create', '2019-12-01 06:24:20', '2019-12-01 06:24:20', NULL),
(63, 'visa_access', '2019-12-01 06:24:34', '2019-12-01 06:24:34', NULL),
(64, 'visa_delete', '2019-12-01 06:24:46', '2019-12-01 06:24:46', NULL),
(65, 'visa_show', '2019-12-01 06:25:01', '2019-12-01 06:25:01', NULL),
(66, 'visa_edit', '2019-12-01 06:25:18', '2019-12-01 06:25:18', NULL),
(67, 'visa_create', '2019-12-01 06:25:32', '2019-12-01 06:25:32', NULL),
(68, 'destination_access', '2019-12-01 06:25:46', '2019-12-01 06:25:46', NULL),
(69, 'destination_delete', '2019-12-01 06:25:59', '2019-12-01 06:25:59', NULL),
(70, 'destination_show', '2019-12-01 06:26:15', '2019-12-01 06:26:15', NULL),
(71, 'destination_edit', '2019-12-01 06:26:31', '2019-12-01 06:26:31', NULL),
(72, 'destination_create', '2019-12-01 06:26:45', '2019-12-01 06:26:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `philosophy_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `philosophy_sentence` longtext COLLATE utf8mb4_unicode_ci,
  `business_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_sentence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `url`, `address`, `philosophy_title`, `philosophy_sentence`, `business_title`, `business_sentence`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Development', NULL, NULL, NULL, '<p>&nbsp;</p>', NULL, '<p>&nbsp;</p>', NULL, NULL, '2019-12-01 03:25:33', '2019-12-01 03:31:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `verified` tinyint(1) DEFAULT '0',
  `verified_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_destination_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_monthly_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_date_of_leaving` date DEFAULT NULL,
  `name_of_recruitment_agents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_of_apply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expenses_applicant_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_agnet` int(11) DEFAULT NULL,
  `comment_recruiting_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_salary` int(11) DEFAULT NULL,
  `leaving_expenses` int(11) DEFAULT NULL,
  `accomodation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days_off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_career` tinyint(1) DEFAULT '0',
  `employer_rating` int(11) DEFAULT NULL,
  `comment_employers` longtext COLLATE utf8mb4_unicode_ci,
  `phone` int(11) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `approved`, `verified`, `verified_at`, `verification_token`, `country`, `city`, `date_of_birth`, `sex`, `education_level`, `current_status`, `expected_destination_country`, `expected_industry`, `expected_monthly_salary`, `expected_date_of_leaving`, `name_of_recruitment_agents`, `destination_country`, `visa_type`, `period_of_apply`, `expenses_applicant_paid`, `rating_agnet`, `comment_recruiting_agent`, `employer`, `industry`, `employment_period`, `monthly_salary`, `leaving_expenses`, `accomodation_type`, `working_hours`, `days_off`, `next_career`, `employer_rating`, `comment_employers`, `phone`, `facebook`, `skype`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$7AUlyYmJ2lJwRLEdR64dpOGSe2cAZ7EABcSKu2ZJUVYRyW1fDPyIW', NULL, 1, 1, '2019-12-01 05:39:01', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL);

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
(1, 'Tourist Visa', 'short-Term', NULL, 5, 'yes', 15, NULL, 'no', 6, NULL, '2019-12-01 10:27:43', '2019-12-01 10:27:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agents_name_unique` (`name`),
  ADD UNIQUE KEY `agents_email_unique` (`email`),
  ADD KEY `industries_fk_673340` (`industries_id`),
  ADD KEY `employer_fk_673341` (`employer_id`);

--
-- Indexes for table `agent_comment`
--
ALTER TABLE `agent_comment`
  ADD KEY `agent_id_fk_673424` (`agent_id`),
  ADD KEY `comment_id_fk_673424` (`comment_id`);

--
-- Indexes for table `agent_employer`
--
ALTER TABLE `agent_employer`
  ADD KEY `employer_id_fk_673327` (`employer_id`),
  ADD KEY `agent_id_fk_673327` (`agent_id`);

--
-- Indexes for table `agent_user`
--
ALTER TABLE `agent_user`
  ADD KEY `agent_id_fk_673422` (`agent_id`),
  ADD KEY `user_id_fk_673422` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_company`
--
ALTER TABLE `category_company`
  ADD KEY `company_id_fk_344255` (`company_id`),
  ADD KEY `category_id_fk_344255` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commenter_fk_673338` (`commenter_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_industry`
--
ALTER TABLE `employer_industry`
  ADD KEY `employer_id_fk_673326` (`employer_id`),
  ADD KEY `industry_id_fk_673326` (`industry_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_673108` (`role_id`),
  ADD KEY `permission_id_fk_673108` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_673117` (`user_id`),
  ADD KEY `role_id_fk_673117` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visas`
--
ALTER TABLE `visas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=610;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visas`
--
ALTER TABLE `visas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `employer_fk_673341` FOREIGN KEY (`employer_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `industries_fk_673340` FOREIGN KEY (`industries_id`) REFERENCES `industries` (`id`);

--
-- Constraints for table `agent_comment`
--
ALTER TABLE `agent_comment`
  ADD CONSTRAINT `agent_id_fk_673424` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_id_fk_673424` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agent_employer`
--
ALTER TABLE `agent_employer`
  ADD CONSTRAINT `agent_id_fk_673327` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employer_id_fk_673327` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agent_user`
--
ALTER TABLE `agent_user`
  ADD CONSTRAINT `agent_id_fk_673422` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_673422` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_company`
--
ALTER TABLE `category_company`
  ADD CONSTRAINT `category_id_fk_344255` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_id_fk_344255` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commenter_fk_673338` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employer_industry`
--
ALTER TABLE `employer_industry`
  ADD CONSTRAINT `employer_id_fk_673326` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `industry_id_fk_673326` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_673108` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_673108` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_673117` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_673117` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
