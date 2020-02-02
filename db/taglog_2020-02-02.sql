# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.23)
# Database: taglog
# Generation Time: 2020-02-02 12:42:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table agent_country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agent_country`;

CREATE TABLE `agent_country` (
  `agent_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  KEY `agent_id_fk_698152` (`agent_id`),
  KEY `country_id_fk_698152` (`country_id`),
  CONSTRAINT `agent_id_fk_698152` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `country_id_fk_698152` FOREIGN KEY (`country_id`) REFERENCES `countries_old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `agent_country` WRITE;
/*!40000 ALTER TABLE `agent_country` DISABLE KEYS */;

INSERT INTO `agent_country` (`agent_id`, `country_id`)
VALUES
	(4,18),
	(6,18);

/*!40000 ALTER TABLE `agent_country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table agent_destination
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agent_destination`;

CREATE TABLE `agent_destination` (
  `agent_id` int(11) unsigned NOT NULL,
  `destination_id` int(11) unsigned NOT NULL,
  KEY `agent_id_fk_698160` (`agent_id`) USING BTREE,
  KEY `destination_id_fk_698160` (`destination_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `agent_destination` WRITE;
/*!40000 ALTER TABLE `agent_destination` DISABLE KEYS */;

INSERT INTO `agent_destination` (`agent_id`, `destination_id`)
VALUES
	(4,1),
	(4,2),
	(6,1),
	(6,2);

/*!40000 ALTER TABLE `agent_destination` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table agent_employer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agent_employer`;

CREATE TABLE `agent_employer` (
  `employer_id` int(10) unsigned NOT NULL,
  `agent_id` int(10) unsigned NOT NULL,
  KEY `employer_id_fk_698172` (`employer_id`),
  KEY `agent_id_fk_698172` (`agent_id`),
  CONSTRAINT `agent_id_fk_698172` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employer_id_fk_698172` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `agent_employer` WRITE;
/*!40000 ALTER TABLE `agent_employer` DISABLE KEYS */;

INSERT INTO `agent_employer` (`employer_id`, `agent_id`)
VALUES
	(1,4),
	(2,6),
	(4,4),
	(4,6);

/*!40000 ALTER TABLE `agent_employer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table agent_industry
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agent_industry`;

CREATE TABLE `agent_industry` (
  `agent_id` int(10) unsigned NOT NULL,
  `industry_id` int(10) unsigned NOT NULL,
  KEY `agent_id_fk_698153` (`agent_id`),
  KEY `industry_id_fk_698153` (`industry_id`),
  CONSTRAINT `agent_id_fk_698153` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `industry_id_fk_698153` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `agent_industry` WRITE;
/*!40000 ALTER TABLE `agent_industry` DISABLE KEYS */;

INSERT INTO `agent_industry` (`agent_id`, `industry_id`)
VALUES
	(4,1),
	(6,1),
	(6,2);

/*!40000 ALTER TABLE `agent_industry` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table agent_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agent_user`;

CREATE TABLE `agent_user` (
  `agent_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table agent_visa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agent_visa`;

CREATE TABLE `agent_visa` (
  `agent_id` int(10) unsigned NOT NULL,
  `visa_id` int(10) unsigned NOT NULL,
  KEY `agent_fk_134723` (`agent_id`),
  KEY `visa_fk_134724` (`visa_id`),
  CONSTRAINT `agent_fk_134723` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `visa_fk_134724` FOREIGN KEY (`visa_id`) REFERENCES `visas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `agent_visa` WRITE;
/*!40000 ALTER TABLE `agent_visa` DISABLE KEYS */;

INSERT INTO `agent_visa` (`agent_id`, `visa_id`)
VALUES
	(4,1),
	(4,2),
	(6,1),
	(6,3);

/*!40000 ALTER TABLE `agent_visa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table agents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agents`;

CREATE TABLE `agents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `city_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `interview_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_expense` decimal(15,2) DEFAULT NULL,
  `language_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leaving_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workers_sent` int(11) DEFAULT NULL,
  `banner_titile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_text` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `agents_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;

INSERT INTO `agents` (`id`, `name`, `overview`, `address`, `city_id`, `email`, `phone`, `map`, `interview_period`, `total_expense`, `language_level`, `leaving_period`, `workers_sent`, `banner_titile`, `banner_text`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(4,'Poly Trade International','<p>This is the best agency.</p>','Asian Imports Limited, Tejgaon I/A, Dhaka, Bangladesh',1,'shorifull@gmail.com','01751010966',NULL,'one_year',1200.00,'one_year','six_months',59,NULL,'<p>&nbsp;</p>','2020-01-13 09:48:19','2020-01-20 14:09:18',NULL),
	(5,'Bangladesh Manpower Agency','<p>Winner Overseas Ltd is one of the best manpower recruiting company in Bangladesh, known for its professional and excellence service. Winner can supply the right people, with the right skills, at the right time and place.<br>Winner Has been active in providing recruitment, training and consultancy services to clients throughout the world since 1999. our staffs here are well qualified and trained in their field. We pride our self for being reliable, welcoming and up to date with our clients. With Winner Overseas Ltd. in business with you, we are sure that we give 100% of ourselves to you. Clients are the biggest priority to us and we make sure we never let them down no matter what.</p>','Dhaka, Bangladesh',1,'shorifull@yahoo.com','+88 01619 99 99 00',NULL,'six_months',1222.00,'one_year','one_year',NULL,NULL,'<p>&nbsp;</p>','2020-01-19 12:55:09','2020-01-20 08:10:05','2020-01-20 08:10:05'),
	(6,'Navira','<p>Navira Limited is one of the leading recruiting agencies of Bangladesh. Navira limited are registered Bureau of Manpower, Employment and Trading Government of the peoples Republic of Bangladesh. Its also a joint stock registered since 1999 and holding Recruiting License No 712 from Bangladesh Government. We are maintaining require standard (Young, fit, energetic, strong, effective and suitable) applicant to provide skilled, semi-skilled, professionals &amp; fresh/unskilled category to the many clients worldwide.</p>','Shaheed Tajuddin Ahmad Medical College, Circuit House Road, Gazipur, Bangladesh',1,'navirabd@yahoo.com','01973086308',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<p>&nbsp;</p>','2020-01-20 08:14:38','2020-01-20 08:14:38',NULL);

/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Car Industry','fa fa-car','2019-12-08 12:41:50','2019-12-08 12:41:50',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_company`;

CREATE TABLE `category_company` (
  `company_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  KEY `company_id_fk_344255` (`company_id`),
  KEY `category_id_fk_344255` (`category_id`),
  CONSTRAINT `category_id_fk_344255` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `company_id_fk_344255` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_company` WRITE;
/*!40000 ALTER TABLE `category_company` DISABLE KEYS */;

INSERT INTO `category_company` (`company_id`, `category_id`)
VALUES
	(1,1),
	(2,1);

/*!40000 ALTER TABLE `category_company` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Dhaka',18,'2019-12-08 12:56:22','2020-01-21 08:47:57',NULL),
	(2,'Chittagong',18,'2020-01-09 17:55:04','2020-01-21 08:47:38',NULL),
	(3,'Kobe',105,'2020-01-21 07:20:06','2020-01-21 08:48:27',NULL),
	(4,'Osaka',105,'2020-01-21 08:46:28','2020-01-21 08:46:28',NULL),
	(5,'Tokyo',105,'2020-01-21 08:47:05','2020-01-21 08:47:05',NULL);

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rating` double(15,2) DEFAULT NULL,
  `comment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `name`, `address`, `description`, `city_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Continental Motors','191/1, Rahman\'s Regnum Center, Ground Floor, Bit Uttam Mir Shawkat Road  Tejgaon C/A,','Continental Motors is a premium luxury car importer that aims to serve those who truly appreciate luxury automobiles. We primarily import high end cars of the highest grades. Working closely with some of the biggest Automobile manufacturers of the world, we offer the best selection and also the most extensive customization options. We also have the necessary software, training and technical know-how to provide full service support for all European manufacturers. This makes Continental Motors the only luxury high end automobile importer in Bangladesh that provides full warranty on all vehicles imported with complete technical capacity.',1,'2019-12-08 13:00:25','2019-12-08 13:00:25',NULL);

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `safe_food` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food` longtext COLLATE utf8mb4_unicode_ci,
  `safe_medicine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `health_insurance` longtext COLLATE utf8mb4_unicode_ci,
  `healthcare` longtext COLLATE utf8mb4_unicode_ci,
  `taxi_available` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport` longtext COLLATE utf8mb4_unicode_ci,
  `culture` longtext COLLATE utf8mb4_unicode_ci,
  `politics` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(2,'Japan','jp',NULL,NULL,NULL,'<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>','<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>','<p>&nbsp;</p>','<p>&nbsp;</p>','2020-01-23 10:42:47','2020-01-24 08:30:28','2020-01-24 08:30:28'),
	(18,'Bangladesh','bd',NULL,NULL,NULL,'<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>','<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>','<p>&nbsp;</p>','<p>&nbsp;</p>','2020-01-23 10:36:34','2020-01-23 10:36:34',NULL),
	(19,'Japan','jp',NULL,NULL,NULL,'<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>','<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>','<p>&nbsp;</p>','<p>&nbsp;</p>','2020-01-28 08:49:43','2020-01-28 08:49:43',NULL),
	(20,'Vietnam','vn',NULL,NULL,NULL,'<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>','<p>&nbsp;</p>',NULL,'<p>&nbsp;</p>','<p>&nbsp;</p>','<p>&nbsp;</p>','2020-01-28 08:50:57','2020-01-28 08:50:57',NULL);

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countries_old
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries_old`;

CREATE TABLE `countries_old` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `safe_food` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food` longtext COLLATE utf8mb4_unicode_ci,
  `safe_medicine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `health_insurance` longtext COLLATE utf8mb4_unicode_ci,
  `healthcare` longtext COLLATE utf8mb4_unicode_ci,
  `taxi_available` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport` longtext COLLATE utf8mb4_unicode_ci,
  `culture` longtext COLLATE utf8mb4_unicode_ci,
  `politics` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries_old` WRITE;
/*!40000 ALTER TABLE `countries_old` DISABLE KEYS */;

INSERT INTO `countries_old` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Afghanistan','af',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,'Albania','al',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,'Algeria','dz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(4,'American Samoa','as',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(5,'Andorra','ad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(6,'Angola','ao',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(7,'Anguilla','ai',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(8,'Antarctica','aq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(9,'Antigua and Barbuda','ag',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(10,'Argentina','ar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(11,'Armenia','am',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(12,'Aruba','aw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(13,'Australia','au',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(14,'Austria','at',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(15,'Azerbaijan','az',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(16,'Bahamas','bs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(17,'Bahrain','bh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(18,'Bangladesh','bd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(19,'Barbados','bb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(20,'Belarus','by',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(21,'Belgium','be',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(22,'Belize','bz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(23,'Benin','bj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(24,'Bermuda','bm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(25,'Bhutan','bt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(26,'Bolivia','bo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(27,'Bosnia and Herzegovina','ba',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(28,'Botswana','bw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(29,'Brazil','br',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(30,'British Indian Ocean Territory','io',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(31,'British Virgin Islands','vg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(32,'Brunei','bn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(33,'Bulgaria','bg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(34,'Burkina Faso','bf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(35,'Burundi','bi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(36,'Cambodia','kh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(37,'Cameroon','cm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(38,'Canada','ca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(39,'Cape Verde','cv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(40,'Cayman Islands','ky',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(41,'Central African Republic','cf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(42,'Chad','td',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(43,'Chile','cl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(44,'China','cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(45,'Christmas Island','cx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(46,'Cocos Islands','cc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(47,'Colombia','co',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(48,'Comoros','km',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(49,'Cook Islands','ck',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(50,'Costa Rica','cr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(51,'Croatia','hr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(52,'Cuba','cu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(53,'Curacao','cw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(54,'Cyprus','cy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(55,'Czech Republic','cz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(56,'Democratic Republic of the Congo','cd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(57,'Denmark','dk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(58,'Djibouti','dj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(59,'Dominica','dm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(60,'Dominican Republic','do',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(61,'East Timor','tl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(62,'Ecuador','ec',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(63,'Egypt','eg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(64,'El Salvador','sv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(65,'Equatorial Guinea','gq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(66,'Eritrea','er',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(67,'Estonia','ee',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(68,'Ethiopia','et',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(69,'Falkland Islands','fk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(70,'Faroe Islands','fo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(71,'Fiji','fj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(72,'Finland','fi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(73,'France','fr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(74,'French Polynesia','pf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(75,'Gabon','ga',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(76,'Gambia','gm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(77,'Georgia','ge',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(78,'Germany','de',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(79,'Ghana','gh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(80,'Gibraltar','gi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(81,'Greece','gr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(82,'Greenland','gl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(83,'Grenada','gd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(84,'Guam','gu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(85,'Guatemala','gt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(86,'Guernsey','gg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(87,'Guinea','gn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(88,'Guinea-Bissau','gw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(89,'Guyana','gy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(90,'Haiti','ht',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(91,'Honduras','hn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(92,'Hong Kong','hk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(93,'Hungary','hu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(94,'Iceland','is',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(95,'India','in',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(96,'Indonesia','id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(97,'Iran','ir',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(98,'Iraq','iq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(99,'Ireland','ie',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(100,'Isle of Man','im',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(101,'Israel','il',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(102,'Italy','it',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(103,'Ivory Coast','ci',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(104,'Jamaica','jm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(105,'Japan','jp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(106,'Jersey','je',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(107,'Jordan','jo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(108,'Kazakhstan','kz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(109,'Kenya','ke',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(110,'Kiribati','ki',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(111,'Kosovo','xk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(112,'Kuwait','kw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(113,'Kyrgyzstan','kg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(114,'Laos','la',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(115,'Latvia','lv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(116,'Lebanon','lb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(117,'Lesotho','ls',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(118,'Liberia','lr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(119,'Libya','ly',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(120,'Liechtenstein','li',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(121,'Lithuania','lt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(122,'Luxembourg','lu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(123,'Macau','mo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(124,'Macedonia','mk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(125,'Madagascar','mg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(126,'Malawi','mw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(127,'Malaysia','my',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(128,'Maldives','mv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(129,'Mali','ml',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(130,'Malta','mt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(131,'Marshall Islands','mh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(132,'Mauritania','mr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(133,'Mauritius','mu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(134,'Mayotte','yt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(135,'Mexico','mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(136,'Micronesia','fm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(137,'Moldova','md',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(138,'Monaco','mc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(139,'Mongolia','mn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(140,'Montenegro','me',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(141,'Montserrat','ms',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(142,'Morocco','ma',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(143,'Mozambique','mz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(144,'Myanmar','mm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(145,'Namibia','na',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(146,'Nauru','nr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(147,'Nepal','np',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(148,'Netherlands','nl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(149,'Netherlands Antilles','an',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(150,'New Caledonia','nc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(151,'New Zealand','nz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(152,'Nicaragua','ni',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(153,'Niger','ne',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(154,'Nigeria','ng',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(155,'Niue','nu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(156,'North Korea','kp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(157,'Northern Mariana Islands','mp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(158,'Norway','no',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(159,'Oman','om',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(160,'Pakistan','pk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(161,'Palau','pw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(162,'Palestine','ps',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(163,'Panama','pa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(164,'Papua New Guinea','pg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(165,'Paraguay','py',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(166,'Peru','pe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(167,'Philippines','ph',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(168,'Pitcairn','pn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(169,'Poland','pl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(170,'Portugal','pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(171,'Puerto Rico','pr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(172,'Qatar','qa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(173,'Republic of the Congo','cg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(174,'Reunion','re',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(175,'Romania','ro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(176,'Russia','ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(177,'Rwanda','rw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(178,'Saint Barthelemy','bl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(179,'Saint Helena','sh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(180,'Saint Kitts and Nevis','kn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(181,'Saint Lucia','lc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(182,'Saint Martin','mf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(183,'Saint Pierre and Miquelon','pm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(184,'Saint Vincent and the Grenadines','vc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(185,'Samoa','ws',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(186,'San Marino','sm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(187,'Sao Tome and Principe','st',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(188,'Saudi Arabia','sa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(189,'Senegal','sn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(190,'Serbia','rs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(191,'Seychelles','sc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(192,'Sierra Leone','sl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(193,'Singapore','sg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(194,'Sint Maarten','sx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(195,'Slovakia','sk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(196,'Slovenia','si',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(197,'Solomon Islands','sb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(198,'Somalia','so',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(199,'South Africa','za',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(200,'South Korea','kr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(201,'South Sudan','ss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(202,'Spain','es',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(203,'Sri Lanka','lk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(204,'Sudan','sd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(205,'Suriname','sr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(206,'Svalbard and Jan Mayen','sj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(207,'Swaziland','sz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(208,'Sweden','se',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(209,'Switzerland','ch',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(210,'Syria','sy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(211,'Taiwan','tw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(212,'Tajikistan','tj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(213,'Tanzania','tz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(214,'Thailand','th',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(215,'Togo','tg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(216,'Tokelau','tk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(217,'Tonga','to',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(218,'Trinidad and Tobago','tt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(219,'Tunisia','tn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(220,'Turkey','tr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(221,'Turkmenistan','tm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(222,'Turks and Caicos Islands','tc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(223,'Tuvalu','tv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(224,'U.S. Virgin Islands','vi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(225,'Uganda','ug',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(226,'Ukraine','ua',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(227,'United Arab Emirates','ae',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(228,'United Kingdom','gb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(229,'United States','us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(230,'Uruguay','uy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(231,'Uzbekistan','uz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(232,'Vanuatu','vu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(233,'Vatican','va',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(234,'Venezuela','ve',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(235,'Vietnam','vn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(236,'Wallis and Futuna','wf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(237,'Western Sahara','eh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(238,'Yemen','ye',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(239,'Zambia','zm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(240,'Zimbabwe','zw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `countries_old` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table country_employer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `country_employer`;

CREATE TABLE `country_employer` (
  `employer_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  KEY `employer_id_fk_698171` (`employer_id`),
  KEY `country_id_fk_698171` (`country_id`),
  CONSTRAINT `country_id_fk_698171` FOREIGN KEY (`country_id`) REFERENCES `countries_old` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employer_id_fk_698171` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table currencies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `iso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table destination_employer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `destination_employer`;

CREATE TABLE `destination_employer` (
  `destination_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `destination_employer` WRITE;
/*!40000 ALTER TABLE `destination_employer` DISABLE KEYS */;

INSERT INTO `destination_employer` (`destination_id`, `employer_id`)
VALUES
	(1,2),
	(1,1),
	(1,4);

/*!40000 ALTER TABLE `destination_employer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table destinations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `destinations`;

CREATE TABLE `destinations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;

INSERT INTO `destinations` (`id`, `name`, `country_id`, `language`, `currency`, `address`, `industries`, `employers`, `agents`, `hourly_salary`, `monthly_salary`, `yearly_salary`, `safe_medicine`, `healthcare`, `taxi_available`, `safety`, `culture`, `politics`, `insurance`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Japan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<p>&nbsp;</p>',NULL,NULL,'2020-01-02 12:23:35','2020-01-08 09:53:49',NULL),
	(2,'Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'<p>&nbsp;</p>',NULL,NULL,'2020-01-20 06:54:44','2020-01-20 14:22:25','2020-01-20 14:22:25');

/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employer_industry
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employer_industry`;

CREATE TABLE `employer_industry` (
  `employer_id` int(10) unsigned NOT NULL,
  `industry_id` int(10) unsigned NOT NULL,
  KEY `employer_id_fk_698173` (`employer_id`),
  KEY `industry_id_fk_698173` (`industry_id`),
  CONSTRAINT `employer_id_fk_698173` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `industry_id_fk_698173` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `employer_industry` WRITE;
/*!40000 ALTER TABLE `employer_industry` DISABLE KEYS */;

INSERT INTO `employer_industry` (`employer_id`, `industry_id`)
VALUES
	(1,1),
	(1,2),
	(2,1),
	(2,2),
	(4,1),
	(4,2);

/*!40000 ALTER TABLE `employer_industry` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employer_visa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employer_visa`;

CREATE TABLE `employer_visa` (
  `employer_id` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `employer_visa` WRITE;
/*!40000 ALTER TABLE `employer_visa` DISABLE KEYS */;

INSERT INTO `employer_visa` (`employer_id`, `visa_id`)
VALUES
	(1,1),
	(1,2),
	(2,2),
	(4,1),
	(4,2),
	(4,3);

/*!40000 ALTER TABLE `employer_visa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employers`;

CREATE TABLE `employers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `recruiting_workers` int(11) DEFAULT NULL,
  `monthly_salary` decimal(15,2) DEFAULT NULL,
  `working_hours` int(11) DEFAULT NULL,
  `days_off` int(11) DEFAULT NULL,
  `banner_titile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_text` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`) USING BTREE,
  CONSTRAINT `city_fk_152835` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `employers` WRITE;
/*!40000 ALTER TABLE `employers` DISABLE KEYS */;

INSERT INTO `employers` (`id`, `name`, `email`, `phone`, `city_id`, `address`, `description`, `recruiting_workers`, `monthly_salary`, `working_hours`, `days_off`, `banner_titile`, `banner_text`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Matching Guide','info@matching-guide.com','048-487-9090',5,'<p>HEG Building, 5-22-26 Honcho, Shiki City, Saitama, JAPAN</p>','<p>If you don\'t find the travel plan you are looking for, the place you want to visit or the activity you want to experience, make a travel request: a local expert travel guide will answer your request with a travel proposal.</p>',120,500000.00,8,6,NULL,'<p>&nbsp;</p>','2020-01-14 04:12:23','2020-01-21 16:18:06',NULL),
	(2,'Poly Trade International','shorifull@gmail.com','01751010966',1,'Dubai - United Arab Emirates','<p>best</p>',91,1222.00,10,6,NULL,'<p>&nbsp;</p>','2020-01-22 14:44:23','2020-01-22 14:44:23',NULL),
	(3,'Continental motors','admin@continental-motor.com','01751010966',5,'Tejgaon, Dhaka, Bangladesh','<p>Continental Motors is a premium luxury car importer that aims to serve those who truly appreciate luxury automobiles. We primarily import high end cars of the highest grades. Working closely with some of the biggest Automobile manufacturers of the world, we offer the best selection and also the most extensive customization options. We also have the necessary software, training and technical know-how to provide full service support for all European manufacturers. This makes Continental Motors the only luxury high end automobile importer in Bangladesh that provides full warranty on all vehicles imported with complete technical capacity.</p>',128,65000.00,72,6,NULL,'<p>&nbsp;</p>','2020-01-25 12:48:11','2020-01-25 13:53:49','2020-01-25 13:53:49'),
	(4,'Continental motors','info@continental-motor.com','01751010966',5,'Tejgaon, Dhaka, Bangladesh','<p>Continental Motors is a premium luxury car importer that aims to serve those who truly appreciate luxury automobiles. We primarily import high end cars of the highest grades. Working closely with some of the biggest Automobile manufacturers of the world, we offer the best selection and also the most extensive customization options. We also have the necessary software, training and technical know-how to provide full service support for all European manufacturers. This makes Continental Motors the only luxury high end automobile importer in Bangladesh that provides full warranty on all vehicles imported with complete technical capacity.</p>',NULL,NULL,NULL,NULL,NULL,'<p>&nbsp;</p>','2020-01-25 13:16:59','2020-01-25 13:53:49','2020-01-25 13:53:49');

/*!40000 ALTER TABLE `employers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table experiences
# ------------------------------------------------------------

DROP TABLE IF EXISTS `experiences`;

CREATE TABLE `experiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `visa_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int(10) unsigned DEFAULT NULL,
  `expenses_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_application_rating` int(11) DEFAULT NULL,
  `language_training_rating` int(11) DEFAULT NULL,
  `agent_rating` int(11) DEFAULT NULL,
  `agent_feedback` longtext COLLATE utf8mb4_unicode_ci,
  `employer_id` int(10) unsigned DEFAULT NULL,
  `employer_location` text COLLATE utf8mb4_unicode_ci,
  `industry_id` int(10) unsigned DEFAULT NULL,
  `emloyment_date` date DEFAULT NULL,
  `employment_period` int(11) DEFAULT NULL,
  `monthly_salary` decimal(15,2) DEFAULT NULL,
  `monthly_living_expenses` decimal(15,2) DEFAULT NULL,
  `weekly_working_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_days_off` int(11) DEFAULT NULL,
  `employer_rating` int(11) DEFAULT NULL,
  `employer_feedback` longtext COLLATE utf8mb4_unicode_ci,
  `application_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_id` int(10) unsigned DEFAULT NULL,
  `accommodation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_year_opportunity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_698289` (`user_id`),
  KEY `agent_fk_698290` (`agent_id`),
  KEY `destination_country_fk_698291` (`destination_id`),
  KEY `employer_fk_698298` (`employer_id`),
  KEY `industry_fk_698299` (`industry_id`),
  CONSTRAINT `agent_fk_698290` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `destination_country_fk_698291` FOREIGN KEY (`destination_id`) REFERENCES `countries_old` (`id`),
  CONSTRAINT `employer_fk_698298` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  CONSTRAINT `industry_fk_698299` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`),
  CONSTRAINT `user_fk_698289` FOREIGN KEY (`user_id`) REFERENCES `users-old` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `experiences` WRITE;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;

INSERT INTO `experiences` (`id`, `user_id`, `visa_type`, `agent_id`, `expenses_paid`, `visa_application_rating`, `language_training_rating`, `agent_rating`, `agent_feedback`, `employer_id`, `employer_location`, `industry_id`, `emloyment_date`, `employment_period`, `monthly_salary`, `monthly_living_expenses`, `weekly_working_hours`, `monthly_days_off`, `employer_rating`, `employer_feedback`, `application_period`, `language_level`, `destination_id`, `accommodation_type`, `next_year_opportunity`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,'1',4,'1200',5,4,4,'This is my worst experience in my life, I don’t recommend my\r\nfriends to go and work there!',1,'<p>&nbsp;</p>',1,'2020-01-13',21,1200.00,1222.00,'4',10,12,'<p>best</p>','six_months','one_year',1,NULL,'yes','2020-01-13 11:31:49','2020-01-25 06:35:06',NULL),
	(2,3,NULL,4,'1222',22,4,4,NULL,1,'<p>japan</p>',1,NULL,7,1200.00,12.00,'2',3,9,'<p>Good</p>',NULL,NULL,NULL,NULL,NULL,'2020-01-27 03:48:40','2020-01-27 04:03:40',NULL);

/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table industries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `industries`;

CREATE TABLE `industries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `minimum_salary` decimal(15,2) DEFAULT NULL,
  `maximum_salary` decimal(15,2) DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_course_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_titile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_text` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `industries` WRITE;
/*!40000 ALTER TABLE `industries` DISABLE KEYS */;

INSERT INTO `industries` (`id`, `name`, `description`, `minimum_salary`, `maximum_salary`, `education_level`, `training_level`, `language_course`, `language_course_level`, `banner_titile`, `banner_text`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Car Industry','<p>Sample</p>',20000.00,100000.00,NULL,NULL,'yes',NULL,NULL,'<p>&nbsp;</p>','2019-12-18 08:57:08','2019-12-18 08:57:08',NULL),
	(2,'Construction','<p>ssss</p>',4000.00,NULL,NULL,NULL,NULL,NULL,NULL,'<p>&nbsp;</p>','2019-12-18 08:57:35','2020-01-25 13:52:17',NULL);

/*!40000 ALTER TABLE `industries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table industry_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `industry_user`;

CREATE TABLE `industry_user` (
  `user_id` int(10) unsigned NOT NULL,
  `industry_id` int(10) unsigned NOT NULL,
  KEY `user_id_fk_698260` (`user_id`),
  KEY `industry_id_fk_698260` (`industry_id`),
  CONSTRAINT `industry_id_fk_698260` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_698260` FOREIGN KEY (`user_id`) REFERENCES `users-old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `industry_user` WRITE;
/*!40000 ALTER TABLE `industry_user` DISABLE KEYS */;

INSERT INTO `industry_user` (`user_id`, `industry_id`)
VALUES
	(2,1),
	(2,2),
	(3,1),
	(1,1);

/*!40000 ALTER TABLE `industry_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table inquiries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `inquiries`;

CREATE TABLE `inquiries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inquiry` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `agent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_953979` (`user_id`),
  KEY `country_fk_953981` (`country_id`),
  KEY `agent_fk_953984` (`agent_id`),
  CONSTRAINT `agent_fk_953984` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `country_fk_953981` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `user_fk_953979` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;

INSERT INTO `inquiries` (`id`, `name`, `address`, `inquiry`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `country_id`, `agent_id`)
VALUES
	(1,'Ratan Mia','7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project',NULL,'2020-02-02 10:28:56','2020-02-02 10:29:04',NULL,1,20,4);

/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table interviews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `interviews`;

CREATE TABLE `interviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visa_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_id` int(10) unsigned DEFAULT NULL,
  `agent_id` int(10) unsigned DEFAULT NULL,
  `employer_id` int(10) unsigned DEFAULT NULL,
  `interview_date` datetime NOT NULL,
  `start_date` date DEFAULT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_to_taglog` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_941327` (`user_id`),
  CONSTRAINT `user_fk_941327` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `interviews` WRITE;
/*!40000 ALTER TABLE `interviews` DISABLE KEYS */;

INSERT INTO `interviews` (`id`, `visa_type`, `industry_id`, `agent_id`, `employer_id`, `interview_date`, `start_date`, `result`, `contact_to_taglog`, `created_at`, `updated_at`, `deleted_at`, `user_id`)
VALUES
	(3,'1',1,6,1,'2020-01-13 17:31:03','2020-01-31','short_listed','<p>Koshuke Yoshida</p>','2020-01-30 11:31:17','2020-01-31 02:52:57',NULL,1);

/*!40000 ALTER TABLE `interviews` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` bigint(20) unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_location_type_location_id_index` (`location_type`,`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `location_type`, `location_id`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`)
VALUES
	(1,'App\\Agent',4,'Asian Imports Limited, Tejgaon I/A, Dhaka, Bangladesh','23.76660289999999','90.40479549999999','2020-01-17 12:18:57','2020-01-20 14:09:18'),
	(2,'App\\Agent',6,'Shaheed Tajuddin Ahmad Medical College, Circuit House Road, Gazipur, Bangladesh','23.99164859999999','90.42465','2020-01-20 08:14:38','2020-01-20 08:37:10'),
	(3,'App\\Employer',2,'Dubai - United Arab Emirates','25.2048493','55.2707828','2020-01-22 14:44:23','2020-01-24 03:56:51'),
	(4,'App\\Employer',1,'<p>HEG Building, 5-22-26 Honcho, Shiki City, Saitama, JAPAN</p>','25.2048493','55.2707828','2020-01-22 14:44:23','2020-01-24 04:02:16'),
	(5,'App\\Employer',4,'Tejgaon, Dhaka, Bangladesh','23.759815','90.39131719999999','2020-01-25 13:16:59','2020-01-25 13:16:59');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`)
VALUES
	(1,'App\\Company',1,'logo','5decf3bd727b9_continental-motor logo','5decf3bd727b9_continental-motor-logo.png','image/png','public',5661,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',1,'2019-12-08 13:00:25','2019-12-08 13:00:25'),
	(4,'App\\Agent',4,'banner_image','5e2006f70ae06_agent-header','5e2006f70ae06_agent-header.jpg','image/jpeg','public',30927,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',4,'2020-01-16 06:47:21','2020-01-16 06:47:21'),
	(5,'App\\Agent',4,'banner_image','5e2062927b108_image-placeholder','5e2062927b108_image-placeholder.png','image/png','public',41400,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',5,'2020-01-16 13:18:12','2020-01-16 13:18:12'),
	(6,'App\\Agent',4,'logo','5e2330ccb297c_poly trade','5e2330ccb297c_poly-trade.jpeg','image/jpeg','public',10798,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',6,'2020-01-18 16:22:38','2020-01-18 16:22:38'),
	(7,'App\\Agent',4,'logo','5e233da621280_poly trade','5e233da621280_poly-trade.png','image/png','public',44651,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',7,'2020-01-18 17:17:28','2020-01-18 17:17:28'),
	(8,'App\\Agent',6,'logo','5e256169304ad_navira','5e256169304ad_navira.png','image/png','public',9208,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',8,'2020-01-20 08:14:38','2020-01-20 08:14:38'),
	(9,'App\\Agent',6,'banner_image','5e2566b393abd_Screenshot 2020-01-20 at 14.36.36','5e2566b393abd_Screenshot-2020-01-20-at-14.36.36.png','image/png','public',2043325,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',9,'2020-01-20 08:37:10','2020-01-20 08:37:11'),
	(10,'App\\Employer',1,'logo','5e271476a8a50_matching-guide-logo','5e271476a8a50_matching-guide-logo.png','image/png','public',1758,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',10,'2020-01-21 15:13:06','2020-01-21 15:13:06'),
	(11,'App\\Employer',2,'logo','5e285fc3af53a_matching-guide-logo','5e285fc3af53a_matching-guide-logo.png','image/png','public',1758,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',11,'2020-01-22 14:44:23','2020-01-22 14:44:23'),
	(12,'App\\Partner',1,'logo','5e2d165158b3c_Screenshot 2020-01-26 at 10.16.06','5e2d165158b3c_Screenshot-2020-01-26-at-10.16.06.png','image/png','public',92149,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',12,'2020-01-26 04:32:19','2020-01-26 04:32:19'),
	(13,'App\\Member',2,'photo','5e2d182430c98_banner','5e2d182430c98_banner.jpg','image/jpeg','public',139877,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',13,'2020-01-26 04:40:06','2020-01-26 04:40:06'),
	(14,'App\\Member',3,'photo','5e2d1b23b412b_banner','5e2d1b23b412b_banner.jpg','image/jpeg','public',139877,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',14,'2020-01-26 04:53:00','2020-01-26 04:53:00'),
	(20,'App\\User',1,'profile_picture','programmer','programmer.png','image/png','public',12127,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',15,'2020-01-27 12:13:54','2020-01-27 12:13:54'),
	(21,'App\\User',1,'profile_picture','logo-login','logo-login.png','image/png','public',2676,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',16,'2020-01-27 12:14:10','2020-01-27 12:14:10'),
	(22,'App\\User',1,'profile_picture','35 (1)','35-(1).jpg','image/jpeg','public',219551,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',17,'2020-01-27 16:02:56','2020-01-27 16:02:57'),
	(23,'App\\User',1,'profile_picture','programmer','programmer.png','image/png','public',12127,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275652C2022617661746172223A20747275657D7D',X'5B5D',18,'2020-01-27 16:06:04','2020-01-27 16:06:04'),
	(24,'App\\Country',18,'flag','5e300bdd988f6_bangladesh','5e300bdd988f6_bangladesh.png','image/png','public',8965,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',19,'2020-01-28 10:24:31','2020-01-28 10:24:32'),
	(25,'App\\Country',19,'flag','5e300bef0ac6a_japan','5e300bef0ac6a_japan.png','image/png','public',7681,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',20,'2020-01-28 10:24:48','2020-01-28 10:24:48'),
	(26,'App\\Country',20,'flag','5e300bff3ca1d_vietnam','5e300bff3ca1d_vietnam.png','image/png','public',7191,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',21,'2020-01-28 10:25:05','2020-01-28 10:25:05'),
	(27,'App\\Member',4,'photo','5e3130ebe769b_Screenshot 2020-01-29 at 13.14.36','5e3130ebe769b_Screenshot-2020-01-29-at-13.14.36.png','image/png','public',92104,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',22,'2020-01-29 07:14:55','2020-01-29 07:14:55'),
	(28,'App\\Setting',1,'logo','5e3263937394b_taglog','5e3263937394b_taglog.png','image/png','public',17593,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275657D7D',X'5B5D',23,'2020-01-30 05:03:19','2020-01-30 05:03:20');

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview` longtext COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;

INSERT INTO `members` (`id`, `name`, `position`, `overview`, `facebook`, `twitter`, `instagram`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Ryoma Okano','Founder & CEO','<p>Start working at global car company straight out from university in Japan, high school in US. We founded “Taglog Inc.” because I believe borderless would be expanded to the labor by Information Technology. I have been contributing to develop new countries where they have no sales channels, former Soviet Union countries on my own, and product planning when working at the car company.</p><p>Also a model what I planned got a Car Of The Year. Private Pilot Certificate of United States holder.</p>',NULL,NULL,NULL,'2020-01-26 04:16:47','2020-01-26 04:19:13','2020-01-26 04:19:13'),
	(2,'Ratan Mia','Founder & CEO','<p>ddada</p>',NULL,NULL,NULL,'2020-01-26 04:33:04','2020-01-29 07:15:02','2020-01-29 07:15:02'),
	(3,'kosuke',NULL,'<p>&nbsp;</p>',NULL,NULL,NULL,'2020-01-26 04:53:00','2020-01-29 07:15:07','2020-01-29 07:15:07'),
	(4,'Ryoma Okano','Founder & CEO','<p>Start working at global car company straight out from university in Japan, high school in US. We founded “Taglog Inc.” because I believe borderless would be expanded to the labor by Information Technology. I have been contributing to develop new countries where they have no sales channels, former Soviet Union countries on my own, and product planning when working at the car company.</p><p>Also a model what I planned got a Car Of The Year. Private Pilot Certificate of United States holder.</p>','#','#','#','2020-01-29 07:14:55','2020-01-29 07:14:55',NULL);

/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_100000_create_password_resets_table',1),
	(2,'2016_06_01_000001_create_oauth_auth_codes_table',1),
	(3,'2016_06_01_000002_create_oauth_access_tokens_table',1),
	(4,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),
	(5,'2016_06_01_000004_create_oauth_clients_table',1),
	(6,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),
	(7,'2019_09_16_000004_create_cities_table',1),
	(8,'2019_09_16_000005_create_categories_table',1),
	(9,'2019_12_01_000002_create_settings_table',1),
	(10,'2019_12_01_000003_create_comments_table',1),
	(11,'2019_12_01_000008_create_destinations_table',1),
	(12,'2019_12_01_000009_create_visas_table',1),
	(13,'2019_12_01_062927_create_companies_table',1),
	(14,'2019_12_01_164738_create_languages_table',1),
	(15,'2019_12_01_171442_create_currencies_table',1),
	(16,'2019_12_07_000001_create_media_table',1),
	(17,'2019_12_07_000002_create_countries_table',1),
	(18,'2019_12_07_000003_create_experiences_table',1),
	(19,'2019_12_07_000004_create_employers_table',1),
	(20,'2019_12_07_000005_create_agents_table',1),
	(21,'2019_12_07_000006_create_permissions_table',1),
	(22,'2019_12_07_000007_create_industries_table',1),
	(23,'2019_12_07_000008_create_users_table',1),
	(24,'2019_12_07_000009_create_roles_table',1),
	(25,'2019_12_07_000010_create_industry_user_pivot_table',1),
	(26,'2019_12_07_000011_create_role_user_pivot_table',1),
	(27,'2019_12_07_000012_create_agent_country_pivot_table',1),
	(28,'2019_12_07_000013_create_agent_industry_pivot_table',1),
	(29,'2019_12_07_000014_create_agent_user_pivot_table',1),
	(30,'2019_12_07_000015_create_permission_role_pivot_table',1),
	(31,'2019_12_07_000016_create_country_employer_pivot_table',1),
	(32,'2019_12_07_000017_create_agent_employer_pivot_table',1),
	(33,'2019_12_07_000018_create_employer_industry_pivot_table',1),
	(34,'2019_12_07_000019_add_relationship_fields_to_users_table',1),
	(35,'2019_12_07_000020_add_relationship_fields_to_experiences_table',1),
	(36,'2019_12_15_063928_create_nationalities_table',2),
	(37,'2019_12_08_000008_create_users_table',3),
	(38,'2020_01_10_114936_create_locations_table',4),
	(41,'2020_01_16_140740_create_agent_visa_table',5),
	(42,'2020_01_30_000007_create_interviews_table',6),
	(43,'2020_01_30_000010_add_relationship_fields_to_interviews_table',7),
	(44,'2020_02_02_000006_create_inquiries_table',8),
	(45,'2020_02_02_000009_add_relationship_fields_to_inquiries_table',8);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nationalities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nationalities`;

CREATE TABLE `nationalities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `nationalities` WRITE;
/*!40000 ALTER TABLE `nationalities` DISABLE KEYS */;

INSERT INTO `nationalities` (`id`, `code`, `country`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'AF','Afghanistan','Afghan',NULL,NULL),
	(2,'AL','Albania','Albanian',NULL,NULL),
	(3,'AX','Aland Islands','Aland Islander',NULL,NULL),
	(4,'DZ','Algeria','Algerian',NULL,NULL),
	(5,'AS','American Samoa','American Samoan',NULL,NULL),
	(6,'AD','Andorra','Andorran',NULL,NULL),
	(7,'AO','Angola','Angolan',NULL,NULL),
	(8,'AI','Anguilla','Anguillan',NULL,NULL),
	(9,'AQ','Antarctica','Antarctican',NULL,NULL),
	(10,'AG','Antigua and Barbuda','Antiguan',NULL,NULL),
	(11,'AR','Argentina','Argentinian',NULL,NULL),
	(12,'AM','Armenia','Armenian',NULL,NULL),
	(13,'AW','Aruba','Aruban',NULL,NULL),
	(14,'AU','Australia','Australian',NULL,NULL),
	(15,'AT','Austria','Austrian',NULL,NULL),
	(16,'AZ','Azerbaijan','Azerbaijani',NULL,NULL),
	(17,'BS','Bahamas','Bahamian',NULL,NULL),
	(18,'BH','Bahrain','Bahraini',NULL,NULL),
	(19,'BD','Bangladesh','Bangladeshi',NULL,NULL),
	(20,'BB','Barbados','Barbadian',NULL,NULL),
	(21,'BY','Belarus','Belarusian',NULL,NULL),
	(22,'BE','Belgium','Belgian',NULL,NULL),
	(23,'BZ','Belize','Belizean',NULL,NULL),
	(24,'BJ','Benin','Beninese',NULL,NULL),
	(25,'BL','Saint Barthelemy','Saint Barthelmian',NULL,NULL),
	(26,'BM','Bermuda','Bermudan',NULL,NULL),
	(27,'BT','Bhutan','Bhutanese',NULL,NULL),
	(28,'BO','Bolivia','Bolivian',NULL,NULL),
	(29,'BA','Bosnia and Herzegovina','Bosnian / Herzegovinian',NULL,NULL),
	(30,'BW','Botswana','Botswanan',NULL,NULL),
	(31,'BV','Bouvet Island','Bouvetian',NULL,NULL),
	(32,'BR','Brazil','Brazilian',NULL,NULL),
	(33,'IO','British Indian Ocean Territory','British Indian Ocean Territory',NULL,NULL),
	(34,'BN','Brunei Darussalam','Bruneian',NULL,NULL),
	(35,'BG','Bulgaria','Bulgarian',NULL,NULL),
	(36,'BF','Burkina Faso','Burkinabe',NULL,NULL),
	(37,'BI','Burundi','Burundian',NULL,NULL),
	(38,'KH','Cambodia','Cambodian',NULL,NULL),
	(39,'CM','Cameroon','Cameroonian',NULL,NULL),
	(40,'CA','Canada','Canadian',NULL,NULL),
	(41,'CV','Cape Verde','Cape Verdean',NULL,NULL),
	(42,'KY','Cayman Islands','Caymanian',NULL,NULL),
	(43,'CF','Central African Republic','Central African',NULL,NULL),
	(44,'TD','Chad','Chadian',NULL,NULL),
	(45,'CL','Chile','Chilean',NULL,NULL),
	(46,'CN','China','Chinese',NULL,NULL),
	(47,'CX','Christmas Island','Christmas Islander',NULL,NULL),
	(48,'CC','Cocos (Keeling) Islands','Cocos Islander',NULL,NULL),
	(49,'CO','Colombia','Colombian',NULL,NULL),
	(50,'KM','Comoros','Comorian',NULL,NULL),
	(51,'CG','Congo','Congolese',NULL,NULL),
	(52,'CK','Cook Islands','Cook Islander',NULL,NULL),
	(53,'CR','Costa Rica','Costa Rican',NULL,NULL),
	(54,'HR','Croatia','Croatian',NULL,NULL),
	(55,'CU','Cuba','Cuban',NULL,NULL),
	(56,'CY','Cyprus','Cypriot',NULL,NULL),
	(57,'CW','Curaçao','Curacian',NULL,NULL),
	(58,'CZ','Czech Republic','Czech',NULL,NULL),
	(59,'DK','Denmark','Danish',NULL,NULL),
	(60,'DJ','Djibouti','Djiboutian',NULL,NULL),
	(61,'DM','Dominica','Dominican',NULL,NULL),
	(62,'DO','Dominican Republic','Dominican',NULL,NULL),
	(63,'EC','Ecuador','Ecuadorian',NULL,NULL),
	(64,'EG','Egypt','Egyptian',NULL,NULL),
	(65,'SV','El Salvador','Salvadoran',NULL,NULL),
	(66,'GQ','Equatorial Guinea','Equatorial Guinean',NULL,NULL),
	(67,'ER','Eritrea','Eritrean',NULL,NULL),
	(68,'EE','Estonia','Estonian',NULL,NULL),
	(69,'ET','Ethiopia','Ethiopian',NULL,NULL),
	(70,'FK','Falkland Islands (Malvinas)','Falkland Islander',NULL,NULL),
	(71,'FO','Faroe Islands','Faroese',NULL,NULL),
	(72,'FJ','Fiji','Fijian',NULL,NULL),
	(73,'FI','Finland','Finnish',NULL,NULL),
	(74,'FR','France','French',NULL,NULL),
	(75,'GF','French Guiana','French Guianese',NULL,NULL),
	(76,'PF','French Polynesia','French Polynesian',NULL,NULL),
	(77,'TF','French Southern and Antarctic Lands','French',NULL,NULL),
	(78,'GA','Gabon','Gabonese',NULL,NULL),
	(79,'GM','Gambia','Gambian',NULL,NULL),
	(80,'GE','Georgia','Georgian',NULL,NULL),
	(81,'DE','Germany','German',NULL,NULL),
	(82,'GH','Ghana','Ghanaian',NULL,NULL),
	(83,'GI','Gibraltar','Gibraltar',NULL,NULL),
	(84,'GG','Guernsey','Guernsian',NULL,NULL),
	(85,'GR','Greece','Greek',NULL,NULL),
	(86,'GL','Greenland','Greenlandic',NULL,NULL),
	(87,'GD','Grenada','Grenadian',NULL,NULL),
	(88,'GP','Guadeloupe','Guadeloupe',NULL,NULL),
	(89,'GU','Guam','Guamanian',NULL,NULL),
	(90,'GT','Guatemala','Guatemalan',NULL,NULL),
	(91,'GN','Guinea','Guinean',NULL,NULL),
	(92,'GW','Guinea-Bissau','Guinea-Bissauan',NULL,NULL),
	(93,'GY','Guyana','Guyanese',NULL,NULL),
	(94,'HT','Haiti','Haitian',NULL,NULL),
	(95,'HM','Heard and Mc Donald Islands','Heard and Mc Donald Islanders',NULL,NULL),
	(96,'HN','Honduras','Honduran',NULL,NULL),
	(97,'HK','Hong Kong','Hongkongese',NULL,NULL),
	(98,'HU','Hungary','Hungarian',NULL,NULL),
	(99,'IS','Iceland','Icelandic',NULL,NULL),
	(100,'IN','India','Indian',NULL,NULL),
	(101,'IM','Isle of Man','Manx',NULL,NULL),
	(102,'ID','Indonesia','Indonesian',NULL,NULL),
	(103,'IR','Iran','Iranian',NULL,NULL),
	(104,'IQ','Iraq','Iraqi',NULL,NULL),
	(105,'IE','Ireland','Irish',NULL,NULL),
	(106,'IL','Israel','Israeli',NULL,NULL),
	(107,'IT','Italy','Italian',NULL,NULL),
	(108,'CI','Ivory Coast','Ivory Coastian',NULL,NULL),
	(109,'JE','Jersey','Jersian',NULL,NULL),
	(110,'JM','Jamaica','Jamaican',NULL,NULL),
	(111,'JP','Japan','Japanese',NULL,NULL),
	(112,'JO','Jordan','Jordanian',NULL,NULL),
	(113,'KZ','Kazakhstan','Kazakh',NULL,NULL),
	(114,'KE','Kenya','Kenyan',NULL,NULL),
	(115,'KI','Kiribati','I-Kiribati',NULL,NULL),
	(116,'KP','Korea(North Korea)','North Korean',NULL,NULL),
	(117,'KR','Korea(South Korea)','South Korean',NULL,NULL),
	(118,'XK','Kosovo','Kosovar',NULL,NULL),
	(119,'KW','Kuwait','Kuwaiti',NULL,NULL),
	(120,'KG','Kyrgyzstan','Kyrgyzstani',NULL,NULL),
	(121,'LA','Lao PDR','Laotian',NULL,NULL),
	(122,'LV','Latvia','Latvian',NULL,NULL),
	(123,'LB','Lebanon','Lebanese',NULL,NULL),
	(124,'LS','Lesotho','Basotho',NULL,NULL),
	(125,'LR','Liberia','Liberian',NULL,NULL),
	(126,'LY','Libya','Libyan',NULL,NULL),
	(127,'LI','Liechtenstein','Liechtenstein',NULL,NULL),
	(128,'LT','Lithuania','Lithuanian',NULL,NULL),
	(129,'LU','Luxembourg','Luxembourger',NULL,NULL),
	(130,'LK','Sri Lanka','Sri Lankian',NULL,NULL),
	(131,'MO','Macau','Macanese',NULL,NULL),
	(132,'MK','Macedonia','Macedonian',NULL,NULL),
	(133,'MG','Madagascar','Malagasy',NULL,NULL),
	(134,'MW','Malawi','Malawian',NULL,NULL),
	(135,'MY','Malaysia','Malaysian',NULL,NULL),
	(136,'MV','Maldives','Maldivian',NULL,NULL),
	(137,'ML','Mali','Malian',NULL,NULL),
	(138,'MT','Malta','Maltese',NULL,NULL),
	(139,'MH','Marshall Islands','Marshallese',NULL,NULL),
	(140,'MQ','Martinique','Martiniquais',NULL,NULL),
	(141,'MR','Mauritania','Mauritanian',NULL,NULL),
	(142,'MU','Mauritius','Mauritian',NULL,NULL),
	(143,'YT','Mayotte','Mahoran',NULL,NULL),
	(144,'MX','Mexico','Mexican',NULL,NULL),
	(145,'FM','Micronesia','Micronesian',NULL,NULL),
	(146,'MD','Moldova','Moldovan',NULL,NULL),
	(147,'MC','Monaco','Monacan',NULL,NULL),
	(148,'MN','Mongolia','Mongolian',NULL,NULL),
	(149,'ME','Montenegro','Montenegrin',NULL,NULL),
	(150,'MS','Montserrat','Montserratian',NULL,NULL),
	(151,'MA','Morocco','Moroccan',NULL,NULL),
	(152,'MZ','Mozambique','Mozambican',NULL,NULL),
	(153,'MM','Myanmar','Myanmarian',NULL,NULL),
	(154,'NA','Namibia','Namibian',NULL,NULL),
	(155,'NR','Nauru','Nauruan',NULL,NULL),
	(156,'NP','Nepal','Nepalese',NULL,NULL),
	(157,'NL','Netherlands','Dutch',NULL,NULL),
	(158,'AN','Netherlands Antilles','Dutch Antilier',NULL,NULL),
	(159,'NC','New Caledonia','New Caledonian',NULL,NULL),
	(160,'NZ','New Zealand','New Zealander',NULL,NULL),
	(161,'NI','Nicaragua','Nicaraguan',NULL,NULL),
	(162,'NE','Niger','Nigerien',NULL,NULL),
	(163,'NG','Nigeria','Nigerian',NULL,NULL),
	(164,'NU','Niue','Niuean',NULL,NULL),
	(165,'NF','Norfolk Island','Norfolk Islander',NULL,NULL),
	(166,'MP','Northern Mariana Islands','Northern Marianan',NULL,NULL),
	(167,'NO','Norway','Norwegian',NULL,NULL),
	(168,'OM','Oman','Omani',NULL,NULL),
	(169,'PK','Pakistan','Pakistani',NULL,NULL),
	(170,'PW','Palau','Palauan',NULL,NULL),
	(171,'PS','Palestine','Palestinian',NULL,NULL),
	(172,'PA','Panama','Panamanian',NULL,NULL),
	(173,'PG','Papua New Guinea','Papua New Guinean',NULL,NULL),
	(174,'PY','Paraguay','Paraguayan',NULL,NULL),
	(175,'PE','Peru','Peruvian',NULL,NULL),
	(176,'PH','Philippines','Filipino',NULL,NULL),
	(177,'PN','Pitcairn','Pitcairn Islander',NULL,NULL),
	(178,'PL','Poland','Polish',NULL,NULL),
	(179,'PT','Portugal','Portuguese',NULL,NULL),
	(180,'PR','Puerto Rico','Puerto Rican',NULL,NULL),
	(181,'QA','Qatar','Qatari',NULL,NULL),
	(182,'RE','Reunion Island','Reunionese',NULL,NULL),
	(183,'RO','Romania','Romanian',NULL,NULL),
	(184,'RU','Russian','Russian',NULL,NULL),
	(185,'RW','Rwanda','Rwandan',NULL,NULL),
	(186,'KN','Saint Kitts and Nevis','Kittitian/Nevisian',NULL,NULL),
	(187,'MF','Saint Martin (French part)','St. Martian(French)',NULL,NULL),
	(188,'SX','Sint Maarten (Dutch part)','St. Martian(Dutch)',NULL,NULL),
	(189,'LC','Saint Pierre and Miquelon','St. Pierre and Miquelon',NULL,NULL),
	(190,'VC','Saint Vincent and the Grenadines','Saint Vincent and the Grenadines',NULL,NULL),
	(191,'WS','Samoa','Samoan',NULL,NULL),
	(192,'SM','San Marino','Sammarinese',NULL,NULL),
	(193,'ST','Sao Tome and Principe','Sao Tomean',NULL,NULL),
	(194,'SA','Saudi Arabia','Saudi Arabian',NULL,NULL),
	(195,'SN','Senegal','Senegalese',NULL,NULL),
	(196,'RS','Serbia','Serbian',NULL,NULL),
	(197,'SC','Seychelles','Seychellois',NULL,NULL),
	(198,'SL','Sierra Leone','Sierra Leonean',NULL,NULL),
	(199,'SG','Singapore','Singaporean',NULL,NULL),
	(200,'SK','Slovakia','Slovak',NULL,NULL),
	(201,'SI','Slovenia','Slovenian',NULL,NULL),
	(202,'SB','Solomon Islands','Solomon Island',NULL,NULL),
	(203,'SO','Somalia','Somali',NULL,NULL),
	(204,'ZA','South Africa','South African',NULL,NULL),
	(205,'GS','South Georgia and the South Sandwich','South Georgia and the South Sandwich',NULL,NULL),
	(206,'SS','South Sudan','South Sudanese',NULL,NULL),
	(207,'ES','Spain','Spanish',NULL,NULL),
	(208,'SH','Saint Helena','St. Helenian',NULL,NULL),
	(209,'SD','Sudan','Sudanese',NULL,NULL),
	(210,'SR','Suriname','Surinamese',NULL,NULL),
	(211,'SJ','Svalbard and Jan Mayen','Svalbardian/Jan Mayenian',NULL,NULL),
	(212,'SZ','Swaziland','Swazi',NULL,NULL),
	(213,'SE','Sweden','Swedish',NULL,NULL),
	(214,'CH','Switzerland','Swiss',NULL,NULL),
	(215,'SY','Syria','Syrian',NULL,NULL),
	(216,'TW','Taiwan','Taiwanese',NULL,NULL),
	(217,'TJ','Tajikistan','Tajikistani',NULL,NULL),
	(218,'TZ','Tanzania','Tanzanian',NULL,NULL),
	(219,'TH','Thailand','Thai',NULL,NULL),
	(220,'TL','Timor-Leste','Timor-Lestian',NULL,NULL),
	(221,'TG','Togo','Togolese',NULL,NULL),
	(222,'TK','Tokelau','Tokelaian',NULL,NULL),
	(223,'TO','Tonga','Tongan',NULL,NULL),
	(224,'TT','Trinidad and Tobago','Trinidadian/Tobagonian',NULL,NULL),
	(225,'TN','Tunisia','Tunisian',NULL,NULL),
	(226,'TR','Turkey','Turkish',NULL,NULL),
	(227,'TM','Turkmenistan','Turkmen',NULL,NULL),
	(228,'TC','Turks and Caicos Islands','Turks and Caicos Islands',NULL,NULL),
	(229,'TV','Tuvalu','Tuvaluan',NULL,NULL),
	(230,'UG','Uganda','Ugandan',NULL,NULL),
	(231,'UA','Ukraine','Ukrainian',NULL,NULL),
	(232,'AE','United Arab Emirates','Emirati',NULL,NULL),
	(233,'GB','United Kingdom','British',NULL,NULL),
	(234,'US','United States','American',NULL,NULL),
	(235,'UM','US Minor Outlying Islands','US Minor Outlying Islander',NULL,NULL),
	(236,'UY','Uruguay','Uruguayan',NULL,NULL),
	(237,'UZ','Uzbekistan','Uzbek',NULL,NULL),
	(238,'VU','Vanuatu','Vanuatuan',NULL,NULL),
	(239,'VE','Venezuela','Venezuelan',NULL,NULL),
	(240,'VN','Vietnam','Vietnamese',NULL,NULL),
	(241,'VI','Virgin Islands (U.S.)','American Virgin Islander',NULL,NULL),
	(242,'VA','Vatican City','Vatican',NULL,NULL),
	(243,'WF','Wallis and Futuna Islands','Wallisian/Futunan',NULL,NULL),
	(244,'EH','Western Sahara','Sahrawian',NULL,NULL),
	(245,'YE','Yemen','Yemeni',NULL,NULL),
	(246,'ZM','Zambia','Zambian',NULL,NULL),
	(247,'ZW','Zimbabwe','Zimbabwean',NULL,NULL);

/*!40000 ALTER TABLE `nationalities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_auth_codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_personal_access_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_refresh_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table partners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;

INSERT INTO `partners` (`id`, `country_id`, `company`, `address`, `details`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,19,'Bando Chemical Industries, Ltd.','<p>104-0031<br>Kyobashi MID Bldg., 13-10, Kyobashi 2-chome, Chuo-ku, Tokyo</p>','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>','2020-01-26 04:23:18','2020-01-28 09:10:30',NULL),
	(2,20,'Bando Chemical Industries, Ltd.','<p>104-0031<br>Kyobashi MID Bldg., 13-10, Kyobashi 2-chome, Chuo-ku, Tokyo</p>','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>','2020-01-26 04:23:18','2020-01-28 09:10:30',NULL),
	(3,19,'Bando Chemical Industries, Ltd.','<p>104-0031<br>Kyobashi MID Bldg., 13-10, Kyobashi 2-chome, Chuo-ku, Tokyo</p>','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>','2020-01-26 04:23:18','2020-01-28 09:10:30',NULL),
	(4,20,'Bando Chemical Industries, Ltd.','<p>104-0031<br>Kyobashi MID Bldg., 13-10, Kyobashi 2-chome, Chuo-ku, Tokyo</p>','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>','2020-01-26 04:23:18','2020-01-28 09:10:30',NULL),
	(5,18,'Bando Chemical Industries, Ltd.','<p>104-0031<br>Kyobashi MID Bldg., 13-10, Kyobashi 2-chome, Chuo-ku, Tokyo</p>','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>','2020-01-26 04:23:18','2020-01-28 09:10:30',NULL),
	(6,18,'Bando Chemical Industries, Ltd.','<p>104-0031<br>Kyobashi MID Bldg., 13-10, Kyobashi 2-chome, Chuo-ku, Tokyo</p>','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>','2020-01-26 04:23:18','2020-01-28 09:10:30',NULL);

/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  KEY `role_id_fk_698008` (`role_id`),
  KEY `permission_id_fk_698008` (`permission_id`),
  CONSTRAINT `permission_id_fk_698008` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_698008` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`role_id`, `permission_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(1,5),
	(1,6),
	(1,7),
	(1,8),
	(1,9),
	(1,10),
	(1,11),
	(1,12),
	(1,13),
	(1,14),
	(1,15),
	(1,16),
	(1,17),
	(1,18),
	(1,19),
	(1,20),
	(1,21),
	(1,22),
	(1,23),
	(1,24),
	(1,25),
	(1,26),
	(1,27),
	(1,28),
	(1,29),
	(1,30),
	(1,31),
	(1,32),
	(1,33),
	(1,34),
	(1,35),
	(1,36),
	(2,17),
	(2,19),
	(2,20),
	(2,21),
	(2,22),
	(2,23),
	(2,24),
	(2,25),
	(2,26),
	(2,27),
	(2,28),
	(2,29),
	(2,30),
	(2,31),
	(2,32),
	(2,33),
	(2,34),
	(2,35),
	(2,36),
	(1,37),
	(1,38),
	(1,39),
	(1,40),
	(1,41),
	(1,48),
	(1,49),
	(1,50),
	(1,51),
	(1,52),
	(1,53),
	(1,59),
	(1,60),
	(1,61),
	(1,62),
	(1,63),
	(1,68),
	(1,69),
	(1,70),
	(1,71),
	(1,72),
	(1,73),
	(1,74),
	(1,75),
	(1,76),
	(1,77),
	(3,1),
	(3,2),
	(3,3),
	(3,4),
	(3,5),
	(3,6),
	(3,7),
	(3,8),
	(3,9),
	(3,10),
	(3,11),
	(3,12),
	(3,13),
	(3,14),
	(3,15),
	(3,16),
	(3,17),
	(3,18),
	(3,19),
	(3,20),
	(3,21),
	(3,22),
	(3,23),
	(3,24),
	(3,25),
	(3,26),
	(3,27),
	(3,28),
	(3,29),
	(3,30),
	(3,31),
	(3,32),
	(3,33),
	(3,34),
	(3,35),
	(3,36),
	(3,37),
	(3,38),
	(3,39),
	(3,40),
	(3,41),
	(3,42),
	(3,43),
	(3,44),
	(3,45),
	(3,46),
	(3,47),
	(3,48),
	(3,49),
	(3,50),
	(3,51),
	(3,52),
	(3,53),
	(3,54),
	(3,55),
	(3,56),
	(3,57),
	(3,58),
	(3,59),
	(3,60),
	(3,61),
	(3,62),
	(3,63),
	(3,64),
	(3,65),
	(3,66),
	(3,67),
	(3,68),
	(3,69),
	(3,70),
	(3,71),
	(3,72),
	(3,73),
	(3,74),
	(3,75),
	(3,76),
	(3,77),
	(2,51),
	(2,52),
	(1,78),
	(1,79),
	(1,80),
	(1,81),
	(1,82),
	(1,83),
	(1,84),
	(1,85),
	(1,86),
	(1,87),
	(1,88),
	(4,1),
	(4,2),
	(4,3),
	(4,4),
	(4,5),
	(4,6),
	(4,7),
	(4,8),
	(4,9),
	(4,10),
	(4,11),
	(4,12),
	(4,13),
	(4,14),
	(4,15),
	(4,16),
	(4,17),
	(4,18),
	(4,19),
	(4,20),
	(4,21),
	(4,22),
	(4,23),
	(4,24),
	(4,25),
	(4,26),
	(4,27),
	(4,28),
	(4,29),
	(4,30),
	(4,31),
	(4,32),
	(4,33),
	(4,34),
	(4,35),
	(4,36),
	(4,37),
	(4,38),
	(4,39),
	(4,40),
	(4,41),
	(4,42),
	(4,43),
	(4,44),
	(4,45),
	(4,46),
	(4,47),
	(4,48),
	(4,49),
	(4,50),
	(4,51),
	(4,52),
	(4,53),
	(4,54),
	(4,55),
	(4,56),
	(4,57),
	(4,58),
	(4,59),
	(4,60),
	(4,61),
	(4,62),
	(4,63),
	(4,64),
	(4,65),
	(4,66),
	(4,67),
	(4,68),
	(4,69),
	(4,70),
	(4,71),
	(4,72),
	(4,73),
	(4,74),
	(4,75),
	(4,76),
	(4,77),
	(4,78),
	(4,79),
	(4,80),
	(4,81),
	(4,82),
	(4,83),
	(4,84),
	(4,85),
	(4,86),
	(4,87),
	(4,88),
	(1,42),
	(1,43),
	(1,44),
	(1,45),
	(1,46),
	(1,47),
	(1,54),
	(1,55),
	(1,56),
	(1,57),
	(1,58),
	(1,64),
	(1,65),
	(1,66),
	(1,67),
	(1,89),
	(1,90),
	(1,91),
	(1,92),
	(4,89),
	(4,90),
	(4,91),
	(4,92),
	(1,93),
	(4,93),
	(1,94),
	(4,94),
	(1,95),
	(1,96),
	(1,97),
	(1,98),
	(4,95),
	(4,96),
	(4,97),
	(4,98),
	(4,99),
	(1,99);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'user_management_access',NULL,NULL,NULL),
	(2,'permission_create',NULL,NULL,NULL),
	(3,'permission_edit',NULL,NULL,NULL),
	(4,'permission_show',NULL,NULL,NULL),
	(5,'permission_delete',NULL,NULL,NULL),
	(6,'permission_access',NULL,NULL,NULL),
	(7,'role_create',NULL,NULL,NULL),
	(8,'role_edit',NULL,NULL,NULL),
	(9,'role_show',NULL,NULL,NULL),
	(10,'role_delete',NULL,NULL,NULL),
	(11,'role_access',NULL,NULL,NULL),
	(12,'user_create',NULL,NULL,NULL),
	(13,'user_edit',NULL,NULL,NULL),
	(14,'user_show',NULL,NULL,NULL),
	(15,'user_delete',NULL,NULL,NULL),
	(16,'user_access',NULL,NULL,NULL),
	(17,'country_create',NULL,NULL,NULL),
	(18,'country_edit',NULL,NULL,NULL),
	(19,'country_show',NULL,NULL,NULL),
	(20,'country_delete',NULL,NULL,NULL),
	(21,'country_access',NULL,NULL,NULL),
	(22,'industry_create',NULL,NULL,NULL),
	(23,'industry_edit',NULL,NULL,NULL),
	(24,'industry_show',NULL,NULL,NULL),
	(25,'industry_delete',NULL,NULL,NULL),
	(26,'industry_access',NULL,NULL,NULL),
	(27,'agent_create',NULL,NULL,NULL),
	(28,'agent_edit',NULL,NULL,NULL),
	(29,'agent_show',NULL,NULL,NULL),
	(30,'agent_delete',NULL,NULL,NULL),
	(31,'agent_access',NULL,NULL,NULL),
	(32,'employer_create',NULL,NULL,NULL),
	(33,'employer_edit',NULL,NULL,NULL),
	(34,'employer_show',NULL,NULL,NULL),
	(35,'employer_delete',NULL,NULL,NULL),
	(36,'employer_access',NULL,NULL,NULL),
	(37,'comment_create','2019-12-07 13:16:10','2019-12-07 13:16:10',NULL),
	(38,'comment_edit','2019-12-07 13:16:25','2019-12-07 13:16:25',NULL),
	(39,'comment_show','2019-12-07 13:16:41','2019-12-07 13:16:41',NULL),
	(40,'comment_delete','2019-12-07 13:16:53','2019-12-07 13:16:53',NULL),
	(41,'comment_access','2019-12-07 13:17:05','2019-12-07 13:17:05',NULL),
	(42,'setting_create','2019-12-07 13:17:21','2019-12-07 13:17:21',NULL),
	(43,'setting_edit','2019-12-07 13:17:46','2019-12-07 13:17:46',NULL),
	(44,'setting_show','2019-12-07 13:18:02','2019-12-07 13:18:02',NULL),
	(45,'setting_delete','2019-12-07 13:18:16','2019-12-07 13:18:16',NULL),
	(46,'setting_access','2019-12-07 13:18:46','2019-12-07 13:18:46',NULL),
	(47,'site_setting_access','2019-12-07 13:19:09','2019-12-07 13:19:09',NULL),
	(48,'experience_access','2019-12-07 13:35:27','2019-12-07 13:35:27',NULL),
	(49,'experience_delete','2019-12-07 13:35:57','2019-12-07 13:35:57',NULL),
	(50,'experience_show','2019-12-07 13:36:20','2019-12-07 13:36:20',NULL),
	(51,'experience_edit','2019-12-07 13:36:33','2019-12-07 13:36:33',NULL),
	(52,'experience_create','2019-12-07 13:36:44','2019-12-07 13:36:44',NULL),
	(53,'experience_edit','2019-12-07 13:37:02','2019-12-07 13:37:02',NULL),
	(54,'company_access','2019-12-07 13:39:35','2019-12-07 13:39:35',NULL),
	(55,'company_create','2019-12-07 13:39:48','2019-12-07 13:39:48',NULL),
	(56,'company_edit','2019-12-07 13:39:58','2019-12-07 13:39:58',NULL),
	(57,'company_delete','2019-12-07 13:40:11','2019-12-07 13:40:11',NULL),
	(58,'company_show','2019-12-07 13:40:22','2019-12-07 13:40:22',NULL),
	(59,'city_access','2019-12-07 13:43:30','2019-12-07 13:43:30',NULL),
	(60,'city_delete','2019-12-07 13:43:57','2019-12-07 13:43:57',NULL),
	(61,'city_show','2019-12-07 13:44:13','2019-12-07 13:44:13',NULL),
	(62,'city_edit','2019-12-07 13:44:34','2019-12-07 13:44:34',NULL),
	(63,'city_create','2019-12-07 13:44:47','2019-12-07 13:44:47',NULL),
	(64,'category_access','2019-12-07 13:46:50','2019-12-07 13:46:50',NULL),
	(65,'category_delete','2019-12-07 13:47:08','2019-12-07 13:47:08',NULL),
	(66,'category_show','2019-12-07 13:47:26','2019-12-07 13:47:26',NULL),
	(67,'category_create','2019-12-07 13:48:20','2019-12-07 13:48:20',NULL),
	(68,'visa_access','2019-12-07 13:49:23','2019-12-07 13:49:23',NULL),
	(69,'visa_delete','2019-12-07 13:49:37','2019-12-07 13:49:37',NULL),
	(70,'visa_show','2019-12-07 13:49:55','2019-12-07 13:49:55',NULL),
	(71,'visa_edit','2019-12-07 13:50:09','2019-12-07 13:50:09',NULL),
	(72,'visa_create','2019-12-07 13:51:27','2019-12-07 13:51:46',NULL),
	(73,'destination_access','2019-12-07 13:58:40','2019-12-07 13:58:40',NULL),
	(74,'destination_delete','2019-12-07 13:58:57','2019-12-07 13:58:57',NULL),
	(75,'destination_show','2019-12-07 13:59:12','2019-12-07 13:59:12',NULL),
	(76,'destination_edit','2019-12-07 13:59:27','2019-12-07 13:59:27',NULL),
	(77,'destination_create','2019-12-07 13:59:51','2019-12-07 13:59:51',NULL),
	(78,'partner_access','2020-01-25 16:50:16','2020-01-25 16:50:16',NULL),
	(79,'member_access','2020-01-25 16:50:33','2020-01-25 16:50:33',NULL),
	(80,'member_create','2020-01-26 04:10:08','2020-01-26 04:10:08',NULL),
	(81,'member_edit','2020-01-26 04:10:17','2020-01-26 04:10:17',NULL),
	(82,'member_show','2020-01-26 04:10:29','2020-01-26 04:10:29',NULL),
	(83,'member_delete','2020-01-26 04:10:45','2020-01-26 04:10:45',NULL),
	(84,'partner_create','2020-01-26 04:11:10','2020-01-26 04:11:10',NULL),
	(85,'partner_edit','2020-01-26 04:11:18','2020-01-26 04:11:18',NULL),
	(86,'partner_show','2020-01-26 04:11:25','2020-01-26 04:11:25',NULL),
	(87,'partner_delete','2020-01-26 04:11:34','2020-01-26 04:11:34',NULL),
	(88,'share_experience','2020-01-28 08:35:17','2020-01-28 08:35:17',NULL),
	(89,'interview_access','2020-01-30 09:02:16','2020-01-30 09:02:16',NULL),
	(90,'interview_show','2020-01-30 09:02:32','2020-01-30 09:02:32',NULL),
	(91,'interview_create','2020-01-30 09:02:41','2020-01-30 09:02:41',NULL),
	(92,'interview_edit','2020-01-30 09:02:51','2020-01-30 09:02:51',NULL),
	(93,'interview_delete','2020-01-30 10:51:35','2020-01-30 10:51:35',NULL),
	(94,'dashboard_access','2020-01-31 14:55:36','2020-01-31 14:55:46',NULL),
	(95,'inquiry_access','2020-02-02 10:25:04','2020-02-02 10:25:04',NULL),
	(96,'inquiry_edit','2020-02-02 10:25:13','2020-02-02 10:25:13',NULL),
	(97,'inquiry_delete','2020-02-02 10:25:26','2020-02-02 10:25:26',NULL),
	(98,'inquiry_show','2020-02-02 10:25:38','2020-02-02 10:25:38',NULL),
	(99,'inquiry_create','2020-02-02 10:28:11','2020-02-02 10:28:11',NULL);

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `user_id_fk_698017` (`user_id`),
  KEY `role_id_fk_698017` (`role_id`),
  CONSTRAINT `role_id_fk_698017` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_698017` FOREIGN KEY (`user_id`) REFERENCES `users-old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`user_id`, `role_id`)
VALUES
	(3,1),
	(2,2),
	(1,4);

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Admin',NULL,NULL,NULL),
	(2,'User',NULL,NULL,NULL),
	(3,'Super Admin','2020-01-08 16:38:32','2020-01-08 16:39:18','2020-01-08 16:39:18'),
	(4,'Super Admin','2020-01-30 04:13:02','2020-01-30 04:13:02',NULL);

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `philosophy_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `philosophy_sentence` longtext COLLATE utf8mb4_unicode_ci,
  `mission_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_sentence` longtext COLLATE utf8mb4_unicode_ci,
  `business_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_sentence` longtext COLLATE utf8mb4_unicode_ci,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `url`, `address`, `philosophy_title`, `philosophy_sentence`, `mission_title`, `mission_sentence`, `business_title`, `business_sentence`, `map`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Taglog Inc','info@taglog.com',NULL,'http://www.taglog.com','<p>Address: Kyobashi MID Bldg., 13-10, Kyobashi 2-chome, Chuo-ku, Tokyo</p><p><strong>Headquarter: Tokyo, Japan</strong><br><strong>Established: Jan, 2020</strong><br><strong>Board Member: Ryoma Okano, Kosuke Yoshida</strong></p>','Philosophy','<p>We are dedicated to balance employment and right human resources distribution throughout free to labor.</p>','Mission','<p>To build happy relationship between employers and foreigners, contributing to create better working en- vironment in Japan.</p>','Business Outline','<p>1. Recruitment for Japanese company to “Specified Skilled Worker”, “Technical Intern” and/or “Highly-Skilled Foreign Professionals” (hereinafter foreign worker)</p><p>2. Support for foreign worker of daily annoyance through telecommunications.</p><p>3. Support for foreign worker of exam preparation for residential status exten- sion.</p><p>4. Providing a meet up places both virtual and real for foreign workers. 5. Consult to client for hiring new employees<br>6. Support for client to expand business to overseas.</p>','<p>&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.065807657298!2d139.7701683150905!3d35.675381580195726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188be20dff79c5%3A0xfb6a6567024ff1b8!2sKyobashi%20MID%20Building!5e0!3m2!1sen!2sbd!4v1580368646322!5m2!1sen!2sbd\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"&gt;&lt;/iframe&gt;</p>','2020-01-20 16:35:29','2020-01-30 07:18:11',NULL);

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_id` int(10) unsigned DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `education_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_id` int(10) unsigned DEFAULT NULL,
  `agents_id` int(10) unsigned DEFAULT NULL,
  `indurstry_id` int(10) unsigned DEFAULT NULL,
  `employer_id` int(10) unsigned DEFAULT NULL,
  `expected_salary` decimal(15,2) DEFAULT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `visa_type`, `user_status`, `name`, `nationality_id`, `country_id`, `city`, `gender`, `date_of_birth`, `education_background`, `language_level`, `phone`, `facebook`, `skype`, `email_verified_at`, `password`, `remember_token`, `education_level`, `destination_area`, `destination_id`, `agents_id`, `indurstry_id`, `employer_id`, `expected_salary`, `date_of_leaving`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'admin@admin.com','1','1','Shorifull Islam Ratan',19,NULL,'Chittagong','male','1991-11-12','commerce','N1','01751010966','shorifull.ratan','ratan.mia','2019-12-15 07:00:00','$2y$10$JJX.jF2T74lKNHDaB4yqWeZjPSAwEV.RjBVX5ZLX.wKV1u4WwsZTa','hmF6g1tF8Ggz8dxpQ54DtCtHWvGfsmAjAz02RllLLfMozjznx2SfIt5MMMAA','bachelor_degree','5',NULL,1,NULL,NULL,3500.00,'2020-01-28',NULL,'2020-01-30 04:13:33',NULL),
	(3,'shorifull@gmail.com','1','1','Ratan Mia',19,18,'Dhaka','male','1991-11-12','science','N1','01751010966','shorifull.ratan','shorifull',NULL,'$2y$10$oMjkO5mcQonXTkF7OA.foeLZ6KgpAZvdETU464hu/KUXM1D9R0nSC',NULL,NULL,'5',NULL,NULL,NULL,NULL,3000.00,'2020-03-24','2020-01-26 15:27:47','2020-01-27 06:47:10',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users-old
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users-old`;

CREATE TABLE `users-old` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_salary` decimal(15,2) DEFAULT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `destination_country_id` int(10) unsigned DEFAULT NULL,
  `employer_id` int(10) unsigned DEFAULT NULL,
  `agents_id` int(10) unsigned DEFAULT NULL,
  `indurstry_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `country_fk_698250` (`country_id`),
  KEY `destination_country_fk_698258` (`destination_country_id`),
  KEY `employer_fk_698263` (`employer_id`),
  KEY `agents_fk_698264` (`agents_id`),
  KEY `indurstry_fk_698265` (`indurstry_id`),
  CONSTRAINT `agents_fk_698264` FOREIGN KEY (`agents_id`) REFERENCES `employers` (`id`),
  CONSTRAINT `country_fk_698250` FOREIGN KEY (`country_id`) REFERENCES `countries_old` (`id`),
  CONSTRAINT `destination_country_fk_698258` FOREIGN KEY (`destination_country_id`) REFERENCES `countries_old` (`id`),
  CONSTRAINT `employer_fk_698263` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  CONSTRAINT `indurstry_fk_698265` FOREIGN KEY (`indurstry_id`) REFERENCES `industries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users-old` WRITE;
/*!40000 ALTER TABLE `users-old` DISABLE KEYS */;

INSERT INTO `users-old` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `city`, `date_of_birth`, `gender`, `education_level`, `phone`, `facebook`, `skype`, `visa_type`, `expected_salary`, `date_of_leaving`, `created_at`, `updated_at`, `deleted_at`, `country_id`, `destination_country_id`, `employer_id`, `agents_id`, `indurstry_id`)
VALUES
	(1,'Admin','admin@admin.com',NULL,'$2y$10$E30VNBsKe22QWzi0kba04OQK.hdrg34BUDDGqmC2DidrXjbpTEMQu','2HcwjbJUQMacrfuJSpR1rUVvWo7CDKbzM5fcKlfrjNODstGSoQvreNDF7m4C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-12-14 05:43:22',NULL,18,NULL,NULL,NULL,NULL),
	(2,'Dewan Shajedur Rahman','ratan.mia@continental-motor.com',NULL,'$2y$10$aA.EEVecEwc2ieCNuUZaUeCU/B/awrSeXcmHMfBCnZJ.tG8nDJrPG',NULL,'Dhaka','2019-12-04','male','higher_secondary','01713031718',NULL,NULL,NULL,NULL,NULL,'2019-12-08 17:55:13','2019-12-08 17:55:13',NULL,18,4,NULL,NULL,NULL),
	(3,'Dewan Shajedur Rahman','sales@continental-motor.com',NULL,'$2y$10$thSeees1aH8JrjHHZcql7OfaiPQNlAMMIQpCAdjiyVWJFHY1Wh.R.',NULL,'Dhaka','2019-12-04','male','higher_secondary','01713031718',NULL,NULL,NULL,NULL,NULL,'2019-12-08 18:00:12','2019-12-08 18:00:12',NULL,18,4,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users-old` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table visas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `visas`;

CREATE TABLE `visas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `visas` WRITE;
/*!40000 ALTER TABLE `visas` DISABLE KEYS */;

INSERT INTO `visas` (`id`, `name`, `type`, `countries_without_visa`, `duration`, `work_permit`, `working_limit`, `industries`, `language_traning`, `training_duration`, `countries_restrictred`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Technical Intern Trainee',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-12-18 09:50:52','2019-12-18 09:50:52',NULL),
	(2,'Specified Skilled Worker',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-12-18 09:51:19','2019-12-18 09:51:19',NULL),
	(3,'Student Visa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-12-18 10:05:54','2019-12-18 10:05:54',NULL);

/*!40000 ALTER TABLE `visas` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
