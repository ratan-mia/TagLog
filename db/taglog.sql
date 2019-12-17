-- -------------------------------------------------------------
-- TablePlus 2.12(282)
--
-- https://tableplus.com/
--
-- Database: taglog
-- Generation Time: 2019-12-15 17:44:03.1250
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `agent_country` (
  `agent_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  KEY `agent_id_fk_698152` (`agent_id`),
  KEY `country_id_fk_698152` (`country_id`),
  CONSTRAINT `agent_id_fk_698152` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `country_id_fk_698152` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `agent_employer` (
  `employer_id` int(10) unsigned NOT NULL,
  `agent_id` int(10) unsigned NOT NULL,
  KEY `employer_id_fk_698172` (`employer_id`),
  KEY `agent_id_fk_698172` (`agent_id`),
  CONSTRAINT `agent_id_fk_698172` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employer_id_fk_698172` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `agent_industry` (
  `agent_id` int(10) unsigned NOT NULL,
  `industry_id` int(10) unsigned NOT NULL,
  KEY `agent_id_fk_698153` (`agent_id`),
  KEY `industry_id_fk_698153` (`industry_id`),
  CONSTRAINT `agent_id_fk_698153` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `industry_id_fk_698153` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `agent_user` (
  `agent_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  KEY `agent_id_fk_698207` (`agent_id`),
  KEY `user_id_fk_698207` (`user_id`),
  CONSTRAINT `agent_id_fk_698207` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_698207` FOREIGN KEY (`user_id`) REFERENCES `users-old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `agents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `category_company` (
  `company_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  KEY `company_id_fk_344255` (`company_id`),
  KEY `category_id_fk_344255` (`category_id`),
  CONSTRAINT `category_id_fk_344255` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `company_id_fk_344255` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `country_employer` (
  `employer_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  KEY `employer_id_fk_698171` (`employer_id`),
  KEY `country_id_fk_698171` (`country_id`),
  CONSTRAINT `country_id_fk_698171` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employer_id_fk_698171` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `iso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `employer_industry` (
  `employer_id` int(10) unsigned NOT NULL,
  `industry_id` int(10) unsigned NOT NULL,
  KEY `employer_id_fk_698173` (`employer_id`),
  KEY `industry_id_fk_698173` (`industry_id`),
  CONSTRAINT `employer_id_fk_698173` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `industry_id_fk_698173` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `employers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  UNIQUE KEY `employers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `experiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visa_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expenses_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_rating` int(11) DEFAULT NULL,
  `emloyment_date` date DEFAULT NULL,
  `employment_period` int(11) DEFAULT NULL,
  `monthly_salary` decimal(15,2) DEFAULT NULL,
  `monthly_living_expenses` decimal(15,2) DEFAULT NULL,
  `accommodation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekly_working_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_feedback` longtext COLLATE utf8mb4_unicode_ci,
  `monthly_days_off` int(11) DEFAULT NULL,
  `next_year_opportunity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_rating` int(11) DEFAULT NULL,
  `employer_feedback` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `agent_id` int(10) unsigned DEFAULT NULL,
  `destination_country_id` int(10) unsigned DEFAULT NULL,
  `employer_id` int(10) unsigned DEFAULT NULL,
  `industry_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_698289` (`user_id`),
  KEY `agent_fk_698290` (`agent_id`),
  KEY `destination_country_fk_698291` (`destination_country_id`),
  KEY `employer_fk_698298` (`employer_id`),
  KEY `industry_fk_698299` (`industry_id`),
  CONSTRAINT `agent_fk_698290` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `destination_country_fk_698291` FOREIGN KEY (`destination_country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `employer_fk_698298` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  CONSTRAINT `industry_fk_698299` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`),
  CONSTRAINT `user_fk_698289` FOREIGN KEY (`user_id`) REFERENCES `users-old` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `industry_user` (
  `user_id` int(10) unsigned NOT NULL,
  `industry_id` int(10) unsigned NOT NULL,
  KEY `user_id_fk_698260` (`user_id`),
  KEY `industry_id_fk_698260` (`industry_id`),
  CONSTRAINT `industry_id_fk_698260` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_698260` FOREIGN KEY (`user_id`) REFERENCES `users-old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `nationalities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_enName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_arName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_enNationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_arNationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permission_role` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  KEY `role_id_fk_698008` (`role_id`),
  KEY `permission_id_fk_698008` (`permission_id`),
  CONSTRAINT `permission_id_fk_698008` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_698008` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `user_id_fk_698017` (`user_id`),
  KEY `role_id_fk_698017` (`role_id`),
  CONSTRAINT `role_id_fk_698017` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_698017` FOREIGN KEY (`user_id`) REFERENCES `users-old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
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
  `nationality_id` int(10) unsigned DEFAULT NULL,
  `destination_country_id` int(10) unsigned DEFAULT NULL,
  `employer_id` int(10) unsigned DEFAULT NULL,
  `agents_id` int(10) unsigned DEFAULT NULL,
  `indurstry_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  CONSTRAINT `country_fk_698250` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `destination_country_fk_698258` FOREIGN KEY (`destination_country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `employer_fk_698263` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  CONSTRAINT `indurstry_fk_698265` FOREIGN KEY (`indurstry_id`) REFERENCES `industries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'Car Industry', 'fa fa-car', '2019-12-08 12:41:50', '2019-12-08 12:41:50', NULL);

INSERT INTO `category_company` (`company_id`, `category_id`) VALUES ('1', '1');
INSERT INTO `category_company` (`company_id`, `category_id`) VALUES ('2', '1');

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'Dhaka', '2019-12-08 12:56:22', '2019-12-08 12:56:22', NULL);

INSERT INTO `companies` (`id`, `name`, `address`, `description`, `city_id`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'Continental Motors', '191/1, Rahman\'s Regnum Center, Ground Floor, Bit Uttam Mir Shawkat Road  Tejgaon C/A,', 'Continental Motors is a premium luxury car importer that aims to serve those who truly appreciate luxury automobiles. We primarily import high end cars of the highest grades. Working closely with some of the biggest Automobile manufacturers of the world, we offer the best selection and also the most extensive customization options. We also have the necessary software, training and technical know-how to provide full service support for all European manufacturers. This makes Continental Motors the only luxury high end automobile importer in Bangladesh that provides full warranty on all vehicles imported with complete technical capacity.', '1', '2019-12-08 13:00:25', '2019-12-08 13:00:25', NULL);

INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'Afghanistan', 'af', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('2', 'Albania', 'al', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('3', 'Algeria', 'dz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('4', 'American Samoa', 'as', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('5', 'Andorra', 'ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('6', 'Angola', 'ao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('7', 'Anguilla', 'ai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('8', 'Antarctica', 'aq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('9', 'Antigua and Barbuda', 'ag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('10', 'Argentina', 'ar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('11', 'Armenia', 'am', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('12', 'Aruba', 'aw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('13', 'Australia', 'au', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('14', 'Austria', 'at', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('15', 'Azerbaijan', 'az', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('16', 'Bahamas', 'bs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('17', 'Bahrain', 'bh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('18', 'Bangladesh', 'bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('19', 'Barbados', 'bb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('20', 'Belarus', 'by', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('21', 'Belgium', 'be', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('22', 'Belize', 'bz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('23', 'Benin', 'bj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('24', 'Bermuda', 'bm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('25', 'Bhutan', 'bt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('26', 'Bolivia', 'bo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('27', 'Bosnia and Herzegovina', 'ba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('28', 'Botswana', 'bw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('29', 'Brazil', 'br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('30', 'British Indian Ocean Territory', 'io', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('31', 'British Virgin Islands', 'vg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('32', 'Brunei', 'bn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('33', 'Bulgaria', 'bg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('34', 'Burkina Faso', 'bf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('35', 'Burundi', 'bi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('36', 'Cambodia', 'kh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('37', 'Cameroon', 'cm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('38', 'Canada', 'ca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('39', 'Cape Verde', 'cv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('40', 'Cayman Islands', 'ky', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('41', 'Central African Republic', 'cf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('42', 'Chad', 'td', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('43', 'Chile', 'cl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('44', 'China', 'cn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('45', 'Christmas Island', 'cx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('46', 'Cocos Islands', 'cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('47', 'Colombia', 'co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('48', 'Comoros', 'km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('49', 'Cook Islands', 'ck', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('50', 'Costa Rica', 'cr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('51', 'Croatia', 'hr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('52', 'Cuba', 'cu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('53', 'Curacao', 'cw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('54', 'Cyprus', 'cy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('55', 'Czech Republic', 'cz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('56', 'Democratic Republic of the Congo', 'cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('57', 'Denmark', 'dk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('58', 'Djibouti', 'dj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('59', 'Dominica', 'dm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('60', 'Dominican Republic', 'do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('61', 'East Timor', 'tl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('62', 'Ecuador', 'ec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('63', 'Egypt', 'eg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('64', 'El Salvador', 'sv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('65', 'Equatorial Guinea', 'gq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('66', 'Eritrea', 'er', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('67', 'Estonia', 'ee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('68', 'Ethiopia', 'et', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('69', 'Falkland Islands', 'fk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('70', 'Faroe Islands', 'fo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('71', 'Fiji', 'fj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('72', 'Finland', 'fi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('73', 'France', 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('74', 'French Polynesia', 'pf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('75', 'Gabon', 'ga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('76', 'Gambia', 'gm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('77', 'Georgia', 'ge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('78', 'Germany', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('79', 'Ghana', 'gh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('80', 'Gibraltar', 'gi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('81', 'Greece', 'gr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('82', 'Greenland', 'gl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('83', 'Grenada', 'gd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('84', 'Guam', 'gu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('85', 'Guatemala', 'gt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('86', 'Guernsey', 'gg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('87', 'Guinea', 'gn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('88', 'Guinea-Bissau', 'gw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('89', 'Guyana', 'gy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('90', 'Haiti', 'ht', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('91', 'Honduras', 'hn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('92', 'Hong Kong', 'hk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('93', 'Hungary', 'hu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('94', 'Iceland', 'is', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('95', 'India', 'in', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('96', 'Indonesia', 'id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('97', 'Iran', 'ir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('98', 'Iraq', 'iq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('99', 'Ireland', 'ie', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('100', 'Isle of Man', 'im', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('101', 'Israel', 'il', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('102', 'Italy', 'it', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('103', 'Ivory Coast', 'ci', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('104', 'Jamaica', 'jm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('105', 'Japan', 'jp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('106', 'Jersey', 'je', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('107', 'Jordan', 'jo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('108', 'Kazakhstan', 'kz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('109', 'Kenya', 'ke', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('110', 'Kiribati', 'ki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('111', 'Kosovo', 'xk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('112', 'Kuwait', 'kw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('113', 'Kyrgyzstan', 'kg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('114', 'Laos', 'la', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('115', 'Latvia', 'lv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('116', 'Lebanon', 'lb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('117', 'Lesotho', 'ls', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('118', 'Liberia', 'lr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('119', 'Libya', 'ly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('120', 'Liechtenstein', 'li', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('121', 'Lithuania', 'lt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('122', 'Luxembourg', 'lu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('123', 'Macau', 'mo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('124', 'Macedonia', 'mk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('125', 'Madagascar', 'mg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('126', 'Malawi', 'mw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('127', 'Malaysia', 'my', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('128', 'Maldives', 'mv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('129', 'Mali', 'ml', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('130', 'Malta', 'mt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('131', 'Marshall Islands', 'mh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('132', 'Mauritania', 'mr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('133', 'Mauritius', 'mu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('134', 'Mayotte', 'yt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('135', 'Mexico', 'mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('136', 'Micronesia', 'fm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('137', 'Moldova', 'md', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('138', 'Monaco', 'mc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('139', 'Mongolia', 'mn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('140', 'Montenegro', 'me', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('141', 'Montserrat', 'ms', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('142', 'Morocco', 'ma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('143', 'Mozambique', 'mz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('144', 'Myanmar', 'mm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('145', 'Namibia', 'na', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('146', 'Nauru', 'nr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('147', 'Nepal', 'np', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('148', 'Netherlands', 'nl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('149', 'Netherlands Antilles', 'an', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('150', 'New Caledonia', 'nc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('151', 'New Zealand', 'nz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('152', 'Nicaragua', 'ni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('153', 'Niger', 'ne', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('154', 'Nigeria', 'ng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('155', 'Niue', 'nu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('156', 'North Korea', 'kp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('157', 'Northern Mariana Islands', 'mp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('158', 'Norway', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('159', 'Oman', 'om', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('160', 'Pakistan', 'pk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('161', 'Palau', 'pw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('162', 'Palestine', 'ps', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('163', 'Panama', 'pa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('164', 'Papua New Guinea', 'pg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('165', 'Paraguay', 'py', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('166', 'Peru', 'pe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('167', 'Philippines', 'ph', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('168', 'Pitcairn', 'pn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('169', 'Poland', 'pl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('170', 'Portugal', 'pt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('171', 'Puerto Rico', 'pr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('172', 'Qatar', 'qa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('173', 'Republic of the Congo', 'cg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('174', 'Reunion', 're', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('175', 'Romania', 'ro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('176', 'Russia', 'ru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('177', 'Rwanda', 'rw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('178', 'Saint Barthelemy', 'bl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('179', 'Saint Helena', 'sh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('180', 'Saint Kitts and Nevis', 'kn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('181', 'Saint Lucia', 'lc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('182', 'Saint Martin', 'mf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('183', 'Saint Pierre and Miquelon', 'pm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('184', 'Saint Vincent and the Grenadines', 'vc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('185', 'Samoa', 'ws', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('186', 'San Marino', 'sm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('187', 'Sao Tome and Principe', 'st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('188', 'Saudi Arabia', 'sa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('189', 'Senegal', 'sn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('190', 'Serbia', 'rs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('191', 'Seychelles', 'sc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('192', 'Sierra Leone', 'sl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('193', 'Singapore', 'sg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('194', 'Sint Maarten', 'sx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('195', 'Slovakia', 'sk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('196', 'Slovenia', 'si', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('197', 'Solomon Islands', 'sb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('198', 'Somalia', 'so', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('199', 'South Africa', 'za', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('200', 'South Korea', 'kr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('201', 'South Sudan', 'ss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('202', 'Spain', 'es', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('203', 'Sri Lanka', 'lk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('204', 'Sudan', 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('205', 'Suriname', 'sr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('206', 'Svalbard and Jan Mayen', 'sj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('207', 'Swaziland', 'sz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('208', 'Sweden', 'se', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('209', 'Switzerland', 'ch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('210', 'Syria', 'sy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('211', 'Taiwan', 'tw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('212', 'Tajikistan', 'tj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('213', 'Tanzania', 'tz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('214', 'Thailand', 'th', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('215', 'Togo', 'tg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('216', 'Tokelau', 'tk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('217', 'Tonga', 'to', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('218', 'Trinidad and Tobago', 'tt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('219', 'Tunisia', 'tn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('220', 'Turkey', 'tr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('221', 'Turkmenistan', 'tm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('222', 'Turks and Caicos Islands', 'tc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('223', 'Tuvalu', 'tv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('224', 'U.S. Virgin Islands', 'vi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('225', 'Uganda', 'ug', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('226', 'Ukraine', 'ua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('227', 'United Arab Emirates', 'ae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('228', 'United Kingdom', 'gb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('229', 'United States', 'us', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('230', 'Uruguay', 'uy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('231', 'Uzbekistan', 'uz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('232', 'Vanuatu', 'vu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('233', 'Vatican', 'va', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('234', 'Venezuela', 've', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('235', 'Vietnam', 'vn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('236', 'Wallis and Futuna', 'wf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('237', 'Western Sahara', 'eh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('238', 'Yemen', 'ye', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('239', 'Zambia', 'zm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `countries` (`id`, `name`, `short_code`, `language`, `currency`, `religion`, `description`, `safe_food`, `food`, `safe_medicine`, `health_insurance`, `healthcare`, `taxi_available`, `transport`, `culture`, `politics`, `created_at`, `updated_at`, `deleted_at`) VALUES ('240', 'Zimbabwe', 'zw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES ('1', 'App\\Company', '1', 'logo', '5decf3bd727b9_continental-motor logo', '5decf3bd727b9_continental-motor-logo.png', 'image/png', 'public', '5661', '[]', '{\"generated_conversions\": {\"thumb\": true}}', '[]', '1', '2019-12-08 13:00:25', '2019-12-08 13:00:25');
INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES ('2', 'App\\User', '3', 'profile_picture', '5ded3a2a639ad_continental-motor logo', '5ded3a2a639ad_continental-motor-logo.png', 'image/png', 'public', '5661', '[]', '{\"generated_conversions\": {\"thumb\": true}}', '[]', '2', '2019-12-08 18:00:12', '2019-12-08 18:00:12');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '2016_06_01_000001_create_oauth_auth_codes_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '2016_06_01_000002_create_oauth_access_tokens_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2016_06_01_000003_create_oauth_refresh_tokens_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2016_06_01_000004_create_oauth_clients_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2016_06_01_000005_create_oauth_personal_access_clients_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2019_09_16_000004_create_cities_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('8', '2019_09_16_000005_create_categories_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('9', '2019_12_01_000002_create_settings_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('10', '2019_12_01_000003_create_comments_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('11', '2019_12_01_000008_create_destinations_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('12', '2019_12_01_000009_create_visas_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('13', '2019_12_01_062927_create_companies_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('14', '2019_12_01_164738_create_languages_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('15', '2019_12_01_171442_create_currencies_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('16', '2019_12_07_000001_create_media_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('17', '2019_12_07_000002_create_countries_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('18', '2019_12_07_000003_create_experiences_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('19', '2019_12_07_000004_create_employers_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('20', '2019_12_07_000005_create_agents_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('21', '2019_12_07_000006_create_permissions_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('22', '2019_12_07_000007_create_industries_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('23', '2019_12_07_000008_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('24', '2019_12_07_000009_create_roles_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('25', '2019_12_07_000010_create_industry_user_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('26', '2019_12_07_000011_create_role_user_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('27', '2019_12_07_000012_create_agent_country_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('28', '2019_12_07_000013_create_agent_industry_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('29', '2019_12_07_000014_create_agent_user_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('30', '2019_12_07_000015_create_permission_role_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('31', '2019_12_07_000016_create_country_employer_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('32', '2019_12_07_000017_create_agent_employer_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('33', '2019_12_07_000018_create_employer_industry_pivot_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('34', '2019_12_07_000019_add_relationship_fields_to_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('35', '2019_12_07_000020_add_relationship_fields_to_experiences_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('36', '2019_12_15_063928_create_nationalities_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('37', '2019_12_08_000008_create_users_table', '3');

INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('1', 'AF', 'Afghanistan', 'أفغانستان', 'Afghan', 'أفغانستاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('2', 'AL', 'Albania', 'ألبانيا', 'Albanian', 'ألباني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('3', 'AX', 'Aland Islands', 'جزر آلاند', 'Aland Islander', 'آلاندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('4', 'DZ', 'Algeria', 'الجزائر', 'Algerian', 'جزائري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('5', 'AS', 'American Samoa', 'ساموا-الأمريكي', 'American Samoan', 'أمريكي سامواني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('6', 'AD', 'Andorra', 'أندورا', 'Andorran', 'أندوري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('7', 'AO', 'Angola', 'أنغولا', 'Angolan', 'أنقولي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('8', 'AI', 'Anguilla', 'أنغويلا', 'Anguillan', 'أنغويلي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('9', 'AQ', 'Antarctica', 'أنتاركتيكا', 'Antarctican', 'أنتاركتيكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('10', 'AG', 'Antigua and Barbuda', 'أنتيغوا وبربودا', 'Antiguan', 'بربودي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('11', 'AR', 'Argentina', 'الأرجنتين', 'Argentinian', 'أرجنتيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('12', 'AM', 'Armenia', 'أرمينيا', 'Armenian', 'أرميني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('13', 'AW', 'Aruba', 'أروبه', 'Aruban', 'أوروبهيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('14', 'AU', 'Australia', 'أستراليا', 'Australian', 'أسترالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('15', 'AT', 'Austria', 'النمسا', 'Austrian', 'نمساوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('16', 'AZ', 'Azerbaijan', 'أذربيجان', 'Azerbaijani', 'أذربيجاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('17', 'BS', 'Bahamas', 'الباهاماس', 'Bahamian', 'باهاميسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('18', 'BH', 'Bahrain', 'البحرين', 'Bahraini', 'بحريني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('19', 'BD', 'Bangladesh', 'بنغلاديش', 'Bangladeshi', 'بنغلاديشي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('20', 'BB', 'Barbados', 'بربادوس', 'Barbadian', 'بربادوسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('21', 'BY', 'Belarus', 'روسيا البيضاء', 'Belarusian', 'روسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('22', 'BE', 'Belgium', 'بلجيكا', 'Belgian', 'بلجيكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('23', 'BZ', 'Belize', 'بيليز', 'Belizean', 'بيليزي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('24', 'BJ', 'Benin', 'بنين', 'Beninese', 'بنيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('25', 'BL', 'Saint Barthelemy', 'سان بارتيلمي', 'Saint Barthelmian', 'سان بارتيلمي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('26', 'BM', 'Bermuda', 'جزر برمودا', 'Bermudan', 'برمودي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('27', 'BT', 'Bhutan', 'بوتان', 'Bhutanese', 'بوتاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('28', 'BO', 'Bolivia', 'بوليفيا', 'Bolivian', 'بوليفي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('29', 'BA', 'Bosnia and Herzegovina', 'البوسنة و الهرسك', 'Bosnian / Herzegovinian', 'بوسني/هرسكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('30', 'BW', 'Botswana', 'بوتسوانا', 'Botswanan', 'بوتسواني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('31', 'BV', 'Bouvet Island', 'جزيرة بوفيه', 'Bouvetian', 'بوفيهي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('32', 'BR', 'Brazil', 'البرازيل', 'Brazilian', 'برازيلي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('33', 'IO', 'British Indian Ocean Territory', 'إقليم المحيط الهندي البريطاني', 'British Indian Ocean Territory', 'إقليم المحيط الهندي البريطاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('34', 'BN', 'Brunei Darussalam', 'بروني', 'Bruneian', 'بروني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('35', 'BG', 'Bulgaria', 'بلغاريا', 'Bulgarian', 'بلغاري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('36', 'BF', 'Burkina Faso', 'بوركينا فاسو', 'Burkinabe', 'بوركيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('37', 'BI', 'Burundi', 'بوروندي', 'Burundian', 'بورونيدي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('38', 'KH', 'Cambodia', 'كمبوديا', 'Cambodian', 'كمبودي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('39', 'CM', 'Cameroon', 'كاميرون', 'Cameroonian', 'كاميروني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('40', 'CA', 'Canada', 'كندا', 'Canadian', 'كندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('41', 'CV', 'Cape Verde', 'الرأس الأخضر', 'Cape Verdean', 'الرأس الأخضر', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('42', 'KY', 'Cayman Islands', 'جزر كايمان', 'Caymanian', 'كايماني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('43', 'CF', 'Central African Republic', 'جمهورية أفريقيا الوسطى', 'Central African', 'أفريقي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('44', 'TD', 'Chad', 'تشاد', 'Chadian', 'تشادي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('45', 'CL', 'Chile', 'شيلي', 'Chilean', 'شيلي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('46', 'CN', 'China', 'الصين', 'Chinese', 'صيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('47', 'CX', 'Christmas Island', 'جزيرة عيد الميلاد', 'Christmas Islander', 'جزيرة عيد الميلاد', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('48', 'CC', 'Cocos (Keeling) Islands', 'جزر كوكوس', 'Cocos Islander', 'جزر كوكوس', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('49', 'CO', 'Colombia', 'كولومبيا', 'Colombian', 'كولومبي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('50', 'KM', 'Comoros', 'جزر القمر', 'Comorian', 'جزر القمر', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('51', 'CG', 'Congo', 'الكونغو', 'Congolese', 'كونغي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('52', 'CK', 'Cook Islands', 'جزر كوك', 'Cook Islander', 'جزر كوك', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('53', 'CR', 'Costa Rica', 'كوستاريكا', 'Costa Rican', 'كوستاريكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('54', 'HR', 'Croatia', 'كرواتيا', 'Croatian', 'كوراتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('55', 'CU', 'Cuba', 'كوبا', 'Cuban', 'كوبي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('56', 'CY', 'Cyprus', 'قبرص', 'Cypriot', 'قبرصي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('57', 'CW', 'Curaçao', 'كوراساو', 'Curacian', 'كوراساوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('58', 'CZ', 'Czech Republic', 'الجمهورية التشيكية', 'Czech', 'تشيكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('59', 'DK', 'Denmark', 'الدانمارك', 'Danish', 'دنماركي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('60', 'DJ', 'Djibouti', 'جيبوتي', 'Djiboutian', 'جيبوتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('61', 'DM', 'Dominica', 'دومينيكا', 'Dominican', 'دومينيكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('62', 'DO', 'Dominican Republic', 'الجمهورية الدومينيكية', 'Dominican', 'دومينيكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('63', 'EC', 'Ecuador', 'إكوادور', 'Ecuadorian', 'إكوادوري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('64', 'EG', 'Egypt', 'مصر', 'Egyptian', 'مصري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('65', 'SV', 'El Salvador', 'إلسلفادور', 'Salvadoran', 'سلفادوري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('66', 'GQ', 'Equatorial Guinea', 'غينيا الاستوائي', 'Equatorial Guinean', 'غيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('67', 'ER', 'Eritrea', 'إريتريا', 'Eritrean', 'إريتيري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('68', 'EE', 'Estonia', 'استونيا', 'Estonian', 'استوني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('69', 'ET', 'Ethiopia', 'أثيوبيا', 'Ethiopian', 'أثيوبي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('70', 'FK', 'Falkland Islands (Malvinas)', 'جزر فوكلاند', 'Falkland Islander', 'فوكلاندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('71', 'FO', 'Faroe Islands', 'جزر فارو', 'Faroese', 'جزر فارو', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('72', 'FJ', 'Fiji', 'فيجي', 'Fijian', 'فيجي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('73', 'FI', 'Finland', 'فنلندا', 'Finnish', 'فنلندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('74', 'FR', 'France', 'فرنسا', 'French', 'فرنسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('75', 'GF', 'French Guiana', 'غويانا الفرنسية', 'French Guianese', 'غويانا الفرنسية', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('76', 'PF', 'French Polynesia', 'بولينيزيا الفرنسية', 'French Polynesian', 'بولينيزيي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('77', 'TF', 'French Southern and Antarctic Lands', 'أراض فرنسية جنوبية وأنتارتيكية', 'French', 'أراض فرنسية جنوبية وأنتارتيكية', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('78', 'GA', 'Gabon', 'الغابون', 'Gabonese', 'غابوني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('79', 'GM', 'Gambia', 'غامبيا', 'Gambian', 'غامبي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('80', 'GE', 'Georgia', 'جيورجيا', 'Georgian', 'جيورجي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('81', 'DE', 'Germany', 'ألمانيا', 'German', 'ألماني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('82', 'GH', 'Ghana', 'غانا', 'Ghanaian', 'غاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('83', 'GI', 'Gibraltar', 'جبل طارق', 'Gibraltar', 'جبل طارق', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('84', 'GG', 'Guernsey', 'غيرنزي', 'Guernsian', 'غيرنزي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('85', 'GR', 'Greece', 'اليونان', 'Greek', 'يوناني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('86', 'GL', 'Greenland', 'جرينلاند', 'Greenlandic', 'جرينلاندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('87', 'GD', 'Grenada', 'غرينادا', 'Grenadian', 'غرينادي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('88', 'GP', 'Guadeloupe', 'جزر جوادلوب', 'Guadeloupe', 'جزر جوادلوب', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('89', 'GU', 'Guam', 'جوام', 'Guamanian', 'جوامي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('90', 'GT', 'Guatemala', 'غواتيمال', 'Guatemalan', 'غواتيمالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('91', 'GN', 'Guinea', 'غينيا', 'Guinean', 'غيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('92', 'GW', 'Guinea-Bissau', 'غينيا-بيساو', 'Guinea-Bissauan', 'غيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('93', 'GY', 'Guyana', 'غيانا', 'Guyanese', 'غياني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('94', 'HT', 'Haiti', 'هايتي', 'Haitian', 'هايتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('95', 'HM', 'Heard and Mc Donald Islands', 'جزيرة هيرد وجزر ماكدونالد', 'Heard and Mc Donald Islanders', 'جزيرة هيرد وجزر ماكدونالد', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('96', 'HN', 'Honduras', 'هندوراس', 'Honduran', 'هندوراسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('97', 'HK', 'Hong Kong', 'هونغ كونغ', 'Hongkongese', 'هونغ كونغي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('98', 'HU', 'Hungary', 'المجر', 'Hungarian', 'مجري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('99', 'IS', 'Iceland', 'آيسلندا', 'Icelandic', 'آيسلندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('100', 'IN', 'India', 'الهند', 'Indian', 'هندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('101', 'IM', 'Isle of Man', 'جزيرة مان', 'Manx', 'ماني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('102', 'ID', 'Indonesia', 'أندونيسيا', 'Indonesian', 'أندونيسيي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('103', 'IR', 'Iran', 'إيران', 'Iranian', 'إيراني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('104', 'IQ', 'Iraq', 'العراق', 'Iraqi', 'عراقي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('105', 'IE', 'Ireland', 'إيرلندا', 'Irish', 'إيرلندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('106', 'IL', 'Israel', 'إسرائيل', 'Israeli', 'إسرائيلي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('107', 'IT', 'Italy', 'إيطاليا', 'Italian', 'إيطالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('108', 'CI', 'Ivory Coast', 'ساحل العاج', 'Ivory Coastian', 'ساحل العاج', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('109', 'JE', 'Jersey', 'جيرزي', 'Jersian', 'جيرزي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('110', 'JM', 'Jamaica', 'جمايكا', 'Jamaican', 'جمايكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('111', 'JP', 'Japan', 'اليابان', 'Japanese', 'ياباني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('112', 'JO', 'Jordan', 'الأردن', 'Jordanian', 'أردني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('113', 'KZ', 'Kazakhstan', 'كازاخستان', 'Kazakh', 'كازاخستاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('114', 'KE', 'Kenya', 'كينيا', 'Kenyan', 'كيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('115', 'KI', 'Kiribati', 'كيريباتي', 'I-Kiribati', 'كيريباتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('116', 'KP', 'Korea(North Korea)', 'كوريا الشمالية', 'North Korean', 'كوري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('117', 'KR', 'Korea(South Korea)', 'كوريا الجنوبية', 'South Korean', 'كوري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('118', 'XK', 'Kosovo', 'كوسوفو', 'Kosovar', 'كوسيفي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('119', 'KW', 'Kuwait', 'الكويت', 'Kuwaiti', 'كويتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('120', 'KG', 'Kyrgyzstan', 'قيرغيزستان', 'Kyrgyzstani', 'قيرغيزستاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('121', 'LA', 'Lao PDR', 'لاوس', 'Laotian', 'لاوسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('122', 'LV', 'Latvia', 'لاتفيا', 'Latvian', 'لاتيفي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('123', 'LB', 'Lebanon', 'لبنان', 'Lebanese', 'لبناني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('124', 'LS', 'Lesotho', 'ليسوتو', 'Basotho', 'ليوسيتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('125', 'LR', 'Liberia', 'ليبيريا', 'Liberian', 'ليبيري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('126', 'LY', 'Libya', 'ليبيا', 'Libyan', 'ليبي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('127', 'LI', 'Liechtenstein', 'ليختنشتين', 'Liechtenstein', 'ليختنشتيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('128', 'LT', 'Lithuania', 'لتوانيا', 'Lithuanian', 'لتوانيي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('129', 'LU', 'Luxembourg', 'لوكسمبورغ', 'Luxembourger', 'لوكسمبورغي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('130', 'LK', 'Sri Lanka', 'سريلانكا', 'Sri Lankian', 'سريلانكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('131', 'MO', 'Macau', 'ماكاو', 'Macanese', 'ماكاوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('132', 'MK', 'Macedonia', 'مقدونيا', 'Macedonian', 'مقدوني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('133', 'MG', 'Madagascar', 'مدغشقر', 'Malagasy', 'مدغشقري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('134', 'MW', 'Malawi', 'مالاوي', 'Malawian', 'مالاوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('135', 'MY', 'Malaysia', 'ماليزيا', 'Malaysian', 'ماليزي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('136', 'MV', 'Maldives', 'المالديف', 'Maldivian', 'مالديفي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('137', 'ML', 'Mali', 'مالي', 'Malian', 'مالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('138', 'MT', 'Malta', 'مالطا', 'Maltese', 'مالطي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('139', 'MH', 'Marshall Islands', 'جزر مارشال', 'Marshallese', 'مارشالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('140', 'MQ', 'Martinique', 'مارتينيك', 'Martiniquais', 'مارتينيكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('141', 'MR', 'Mauritania', 'موريتانيا', 'Mauritanian', 'موريتانيي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('142', 'MU', 'Mauritius', 'موريشيوس', 'Mauritian', 'موريشيوسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('143', 'YT', 'Mayotte', 'مايوت', 'Mahoran', 'مايوتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('144', 'MX', 'Mexico', 'المكسيك', 'Mexican', 'مكسيكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('145', 'FM', 'Micronesia', 'مايكرونيزيا', 'Micronesian', 'مايكرونيزيي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('146', 'MD', 'Moldova', 'مولدافيا', 'Moldovan', 'مولديفي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('147', 'MC', 'Monaco', 'موناكو', 'Monacan', 'مونيكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('148', 'MN', 'Mongolia', 'منغوليا', 'Mongolian', 'منغولي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('149', 'ME', 'Montenegro', 'الجبل الأسود', 'Montenegrin', 'الجبل الأسود', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('150', 'MS', 'Montserrat', 'مونتسيرات', 'Montserratian', 'مونتسيراتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('151', 'MA', 'Morocco', 'المغرب', 'Moroccan', 'مغربي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('152', 'MZ', 'Mozambique', 'موزمبيق', 'Mozambican', 'موزمبيقي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('153', 'MM', 'Myanmar', 'ميانمار', 'Myanmarian', 'ميانماري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('154', 'NA', 'Namibia', 'ناميبيا', 'Namibian', 'ناميبي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('155', 'NR', 'Nauru', 'نورو', 'Nauruan', 'نوري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('156', 'NP', 'Nepal', 'نيبال', 'Nepalese', 'نيبالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('157', 'NL', 'Netherlands', 'هولندا', 'Dutch', 'هولندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('158', 'AN', 'Netherlands Antilles', 'جزر الأنتيل الهولندي', 'Dutch Antilier', 'هولندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('159', 'NC', 'New Caledonia', 'كاليدونيا الجديدة', 'New Caledonian', 'كاليدوني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('160', 'NZ', 'New Zealand', 'نيوزيلندا', 'New Zealander', 'نيوزيلندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('161', 'NI', 'Nicaragua', 'نيكاراجوا', 'Nicaraguan', 'نيكاراجوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('162', 'NE', 'Niger', 'النيجر', 'Nigerien', 'نيجيري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('163', 'NG', 'Nigeria', 'نيجيريا', 'Nigerian', 'نيجيري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('164', 'NU', 'Niue', 'ني', 'Niuean', 'ني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('165', 'NF', 'Norfolk Island', 'جزيرة نورفولك', 'Norfolk Islander', 'نورفوليكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('166', 'MP', 'Northern Mariana Islands', 'جزر ماريانا الشمالية', 'Northern Marianan', 'ماريني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('167', 'NO', 'Norway', 'النرويج', 'Norwegian', 'نرويجي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('168', 'OM', 'Oman', 'عمان', 'Omani', 'عماني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('169', 'PK', 'Pakistan', 'باكستان', 'Pakistani', 'باكستاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('170', 'PW', 'Palau', 'بالاو', 'Palauan', 'بالاوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('171', 'PS', 'Palestine', 'فلسطين', 'Palestinian', 'فلسطيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('172', 'PA', 'Panama', 'بنما', 'Panamanian', 'بنمي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('173', 'PG', 'Papua New Guinea', 'بابوا غينيا الجديدة', 'Papua New Guinean', 'بابوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('174', 'PY', 'Paraguay', 'باراغواي', 'Paraguayan', 'بارغاوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('175', 'PE', 'Peru', 'بيرو', 'Peruvian', 'بيري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('176', 'PH', 'Philippines', 'الفليبين', 'Filipino', 'فلبيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('177', 'PN', 'Pitcairn', 'بيتكيرن', 'Pitcairn Islander', 'بيتكيرني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('178', 'PL', 'Poland', 'بولونيا', 'Polish', 'بوليني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('179', 'PT', 'Portugal', 'البرتغال', 'Portuguese', 'برتغالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('180', 'PR', 'Puerto Rico', 'بورتو ريكو', 'Puerto Rican', 'بورتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('181', 'QA', 'Qatar', 'قطر', 'Qatari', 'قطري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('182', 'RE', 'Reunion Island', 'ريونيون', 'Reunionese', 'ريونيوني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('183', 'RO', 'Romania', 'رومانيا', 'Romanian', 'روماني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('184', 'RU', 'Russian', 'روسيا', 'Russian', 'روسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('185', 'RW', 'Rwanda', 'رواندا', 'Rwandan', 'رواندا', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('186', 'KN', 'Saint Kitts and Nevis', 'سانت كيتس ونيفس,', 'Kittitian/Nevisian', 'سانت كيتس ونيفس', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('187', 'MF', 'Saint Martin (French part)', 'ساينت مارتن فرنسي', 'St. Martian(French)', 'ساينت مارتني فرنسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('188', 'SX', 'Sint Maarten (Dutch part)', 'ساينت مارتن هولندي', 'St. Martian(Dutch)', 'ساينت مارتني هولندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('189', 'LC', 'Saint Pierre and Miquelon', 'سان بيير وميكلون', 'St. Pierre and Miquelon', 'سان بيير وميكلوني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('190', 'VC', 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('191', 'WS', 'Samoa', 'ساموا', 'Samoan', 'ساموي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('192', 'SM', 'San Marino', 'سان مارينو', 'Sammarinese', 'ماريني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('193', 'ST', 'Sao Tome and Principe', 'ساو تومي وبرينسيبي', 'Sao Tomean', 'ساو تومي وبرينسيبي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('194', 'SA', 'Saudi Arabia', 'المملكة العربية السعودية', 'Saudi Arabian', 'سعودي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('195', 'SN', 'Senegal', 'السنغال', 'Senegalese', 'سنغالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('196', 'RS', 'Serbia', 'صربيا', 'Serbian', 'صربي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('197', 'SC', 'Seychelles', 'سيشيل', 'Seychellois', 'سيشيلي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('198', 'SL', 'Sierra Leone', 'سيراليون', 'Sierra Leonean', 'سيراليوني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('199', 'SG', 'Singapore', 'سنغافورة', 'Singaporean', 'سنغافوري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('200', 'SK', 'Slovakia', 'سلوفاكيا', 'Slovak', 'سولفاكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('201', 'SI', 'Slovenia', 'سلوفينيا', 'Slovenian', 'سولفيني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('202', 'SB', 'Solomon Islands', 'جزر سليمان', 'Solomon Island', 'جزر سليمان', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('203', 'SO', 'Somalia', 'الصومال', 'Somali', 'صومالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('204', 'ZA', 'South Africa', 'جنوب أفريقيا', 'South African', 'أفريقي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('205', 'GS', 'South Georgia and the South Sandwich', 'المنطقة القطبية الجنوبية', 'South Georgia and the South Sandwich', 'لمنطقة القطبية الجنوبية', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('206', 'SS', 'South Sudan', 'السودان الجنوبي', 'South Sudanese', 'سوادني جنوبي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('207', 'ES', 'Spain', 'إسبانيا', 'Spanish', 'إسباني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('208', 'SH', 'Saint Helena', 'سانت هيلانة', 'St. Helenian', 'هيلاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('209', 'SD', 'Sudan', 'السودان', 'Sudanese', 'سوداني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('210', 'SR', 'Suriname', 'سورينام', 'Surinamese', 'سورينامي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('211', 'SJ', 'Svalbard and Jan Mayen', 'سفالبارد ويان ماين', 'Svalbardian/Jan Mayenian', 'سفالبارد ويان ماين', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('212', 'SZ', 'Swaziland', 'سوازيلند', 'Swazi', 'سوازيلندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('213', 'SE', 'Sweden', 'السويد', 'Swedish', 'سويدي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('214', 'CH', 'Switzerland', 'سويسرا', 'Swiss', 'سويسري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('215', 'SY', 'Syria', 'سوريا', 'Syrian', 'سوري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('216', 'TW', 'Taiwan', 'تايوان', 'Taiwanese', 'تايواني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('217', 'TJ', 'Tajikistan', 'طاجيكستان', 'Tajikistani', 'طاجيكستاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('218', 'TZ', 'Tanzania', 'تنزانيا', 'Tanzanian', 'تنزانيي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('219', 'TH', 'Thailand', 'تايلندا', 'Thai', 'تايلندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('220', 'TL', 'Timor-Leste', 'تيمور الشرقية', 'Timor-Lestian', 'تيموري', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('221', 'TG', 'Togo', 'توغو', 'Togolese', 'توغي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('222', 'TK', 'Tokelau', 'توكيلاو', 'Tokelaian', 'توكيلاوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('223', 'TO', 'Tonga', 'تونغا', 'Tongan', 'تونغي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('224', 'TT', 'Trinidad and Tobago', 'ترينيداد وتوباغو', 'Trinidadian/Tobagonian', 'ترينيداد وتوباغو', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('225', 'TN', 'Tunisia', 'تونس', 'Tunisian', 'تونسي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('226', 'TR', 'Turkey', 'تركيا', 'Turkish', 'تركي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('227', 'TM', 'Turkmenistan', 'تركمانستان', 'Turkmen', 'تركمانستاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('228', 'TC', 'Turks and Caicos Islands', 'جزر توركس وكايكوس', 'Turks and Caicos Islands', 'جزر توركس وكايكوس', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('229', 'TV', 'Tuvalu', 'توفالو', 'Tuvaluan', 'توفالي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('230', 'UG', 'Uganda', 'أوغندا', 'Ugandan', 'أوغندي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('231', 'UA', 'Ukraine', 'أوكرانيا', 'Ukrainian', 'أوكراني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('232', 'AE', 'United Arab Emirates', 'الإمارات العربية المتحدة', 'Emirati', 'إماراتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('233', 'GB', 'United Kingdom', 'المملكة المتحدة', 'British', 'بريطاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('234', 'US', 'United States', 'الولايات المتحدة', 'American', 'أمريكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('235', 'UM', 'US Minor Outlying Islands', 'قائمة الولايات والمناطق الأمريكية', 'US Minor Outlying Islander', 'أمريكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('236', 'UY', 'Uruguay', 'أورغواي', 'Uruguayan', 'أورغواي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('237', 'UZ', 'Uzbekistan', 'أوزباكستان', 'Uzbek', 'أوزباكستاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('238', 'VU', 'Vanuatu', 'فانواتو', 'Vanuatuan', 'فانواتي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('239', 'VE', 'Venezuela', 'فنزويلا', 'Venezuelan', 'فنزويلي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('240', 'VN', 'Vietnam', 'فيتنام', 'Vietnamese', 'فيتنامي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('241', 'VI', 'Virgin Islands (U.S.)', 'الجزر العذراء الأمريكي', 'American Virgin Islander', 'أمريكي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('242', 'VA', 'Vatican City', 'فنزويلا', 'Vatican', 'فاتيكاني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('243', 'WF', 'Wallis and Futuna Islands', 'والس وفوتونا', 'Wallisian/Futunan', 'فوتوني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('244', 'EH', 'Western Sahara', 'الصحراء الغربية', 'Sahrawian', 'صحراوي', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('245', 'YE', 'Yemen', 'اليمن', 'Yemeni', 'يمني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('246', 'ZM', 'Zambia', 'زامبيا', 'Zambian', 'زامبياني', NULL, NULL);
INSERT INTO `nationalities` (`id`, `country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES ('247', 'ZW', 'Zimbabwe', 'زمبابوي', 'Zimbabwean', 'زمبابوي', NULL, NULL);

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '1');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '2');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '3');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '4');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '5');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '6');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '7');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '8');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '9');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '10');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '11');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '12');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '13');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '14');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '15');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '16');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '17');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '18');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '19');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '20');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '21');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '22');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '23');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '24');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '25');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '26');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '27');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '28');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '29');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '30');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '31');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '32');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '33');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '34');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '35');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '36');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '17');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '18');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '19');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '20');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '21');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '22');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '23');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '24');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '25');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '26');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '27');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '28');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '29');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '30');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '31');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '32');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '33');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '34');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '35');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('2', '36');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '37');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '38');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '39');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '40');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '41');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '42');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '43');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '44');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '45');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '46');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '47');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '48');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '49');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '50');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '51');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '52');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '53');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '54');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '55');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '56');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '57');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '58');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '59');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '60');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '61');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '62');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '63');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '64');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '65');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '66');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '67');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '68');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '69');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '70');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '71');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '72');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '73');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '74');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '75');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '76');
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES ('1', '77');

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'user_management_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('2', 'permission_create', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('3', 'permission_edit', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('4', 'permission_show', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('5', 'permission_delete', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('6', 'permission_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('7', 'role_create', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('8', 'role_edit', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('9', 'role_show', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('10', 'role_delete', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('11', 'role_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('12', 'user_create', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('13', 'user_edit', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('14', 'user_show', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('15', 'user_delete', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('16', 'user_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('17', 'country_create', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('18', 'country_edit', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('19', 'country_show', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('20', 'country_delete', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('21', 'country_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('22', 'industry_create', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('23', 'industry_edit', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('24', 'industry_show', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('25', 'industry_delete', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('26', 'industry_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('27', 'agent_create', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('28', 'agent_edit', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('29', 'agent_show', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('30', 'agent_delete', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('31', 'agent_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('32', 'employer_create', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('33', 'employer_edit', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('34', 'employer_show', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('35', 'employer_delete', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('36', 'employer_access', NULL, NULL, NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('37', 'comment_create', '2019-12-07 13:16:10', '2019-12-07 13:16:10', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('38', 'comment_edit', '2019-12-07 13:16:25', '2019-12-07 13:16:25', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('39', 'comment_show', '2019-12-07 13:16:41', '2019-12-07 13:16:41', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('40', 'comment_delete', '2019-12-07 13:16:53', '2019-12-07 13:16:53', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('41', 'comment_access', '2019-12-07 13:17:05', '2019-12-07 13:17:05', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('42', 'setting_create', '2019-12-07 13:17:21', '2019-12-07 13:17:21', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('43', 'setting_edit', '2019-12-07 13:17:46', '2019-12-07 13:17:46', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('44', 'setting_show', '2019-12-07 13:18:02', '2019-12-07 13:18:02', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('45', 'setting_delete', '2019-12-07 13:18:16', '2019-12-07 13:18:16', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('46', 'setting_access', '2019-12-07 13:18:46', '2019-12-07 13:18:46', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('47', 'site_setting_access', '2019-12-07 13:19:09', '2019-12-07 13:19:09', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('48', 'experience_access', '2019-12-07 13:35:27', '2019-12-07 13:35:27', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('49', 'experience_delete', '2019-12-07 13:35:57', '2019-12-07 13:35:57', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('50', 'experience_show', '2019-12-07 13:36:20', '2019-12-07 13:36:20', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('51', 'experience_edit', '2019-12-07 13:36:33', '2019-12-07 13:36:33', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('52', 'experience_create', '2019-12-07 13:36:44', '2019-12-07 13:36:44', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('53', 'experience_edit', '2019-12-07 13:37:02', '2019-12-07 13:37:02', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('54', 'company_access', '2019-12-07 13:39:35', '2019-12-07 13:39:35', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('55', 'company_create', '2019-12-07 13:39:48', '2019-12-07 13:39:48', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('56', 'company_edit', '2019-12-07 13:39:58', '2019-12-07 13:39:58', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('57', 'company_delete', '2019-12-07 13:40:11', '2019-12-07 13:40:11', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('58', 'company_show', '2019-12-07 13:40:22', '2019-12-07 13:40:22', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('59', 'city_access', '2019-12-07 13:43:30', '2019-12-07 13:43:30', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('60', 'city_delete', '2019-12-07 13:43:57', '2019-12-07 13:43:57', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('61', 'city_show', '2019-12-07 13:44:13', '2019-12-07 13:44:13', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('62', 'city_edit', '2019-12-07 13:44:34', '2019-12-07 13:44:34', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('63', 'city_create', '2019-12-07 13:44:47', '2019-12-07 13:44:47', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('64', 'category_access', '2019-12-07 13:46:50', '2019-12-07 13:46:50', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('65', 'category_delete', '2019-12-07 13:47:08', '2019-12-07 13:47:08', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('66', 'category_show', '2019-12-07 13:47:26', '2019-12-07 13:47:26', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('67', 'category_create', '2019-12-07 13:48:20', '2019-12-07 13:48:20', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('68', 'visa_access', '2019-12-07 13:49:23', '2019-12-07 13:49:23', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('69', 'visa_delete', '2019-12-07 13:49:37', '2019-12-07 13:49:37', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('70', 'visa_show', '2019-12-07 13:49:55', '2019-12-07 13:49:55', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('71', 'visa_edit', '2019-12-07 13:50:09', '2019-12-07 13:50:09', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('72', 'visa_create', '2019-12-07 13:51:27', '2019-12-07 13:51:46', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('73', 'destination_access', '2019-12-07 13:58:40', '2019-12-07 13:58:40', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('74', 'destination_delete', '2019-12-07 13:58:57', '2019-12-07 13:58:57', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('75', 'destination_show', '2019-12-07 13:59:12', '2019-12-07 13:59:12', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('76', 'destination_edit', '2019-12-07 13:59:27', '2019-12-07 13:59:27', NULL);
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('77', 'destination_create', '2019-12-07 13:59:51', '2019-12-07 13:59:51', NULL);

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES ('1', '1');
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES ('2', '1');
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES ('3', '1');

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'Admin', NULL, NULL, NULL);
INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES ('2', 'User', NULL, NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `city`, `date_of_birth`, `gender`, `education_level`, `phone`, `facebook`, `skype`, `visa_type`, `expected_salary`, `date_of_leaving`, `created_at`, `updated_at`, `deleted_at`, `country_id`, `nationality_id`, `destination_country_id`, `employer_id`, `agents_id`, `indurstry_id`) VALUES ('1', 'Ratan Mia', 'admin@admin.com', '2019-12-15 07:00:00', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'Dhaka', '2018-04-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `users-old` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `city`, `date_of_birth`, `gender`, `education_level`, `phone`, `facebook`, `skype`, `visa_type`, `expected_salary`, `date_of_leaving`, `created_at`, `updated_at`, `deleted_at`, `country_id`, `destination_country_id`, `employer_id`, `agents_id`, `indurstry_id`) VALUES ('1', 'Admin', 'admin@admin.com', NULL, '$2y$10$E30VNBsKe22QWzi0kba04OQK.hdrg34BUDDGqmC2DidrXjbpTEMQu', '2HcwjbJUQMacrfuJSpR1rUVvWo7CDKbzM5fcKlfrjNODstGSoQvreNDF7m4C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-14 05:43:22', NULL, '18', NULL, NULL, NULL, NULL);
INSERT INTO `users-old` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `city`, `date_of_birth`, `gender`, `education_level`, `phone`, `facebook`, `skype`, `visa_type`, `expected_salary`, `date_of_leaving`, `created_at`, `updated_at`, `deleted_at`, `country_id`, `destination_country_id`, `employer_id`, `agents_id`, `indurstry_id`) VALUES ('2', 'Dewan Shajedur Rahman', 'ratan.mia@continental-motor.com', NULL, '$2y$10$aA.EEVecEwc2ieCNuUZaUeCU/B/awrSeXcmHMfBCnZJ.tG8nDJrPG', NULL, 'Dhaka', '2019-12-04', 'male', 'higher_secondary', '01713031718', NULL, NULL, NULL, NULL, NULL, '2019-12-08 17:55:13', '2019-12-08 17:55:13', NULL, '18', '4', NULL, NULL, NULL);
INSERT INTO `users-old` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `city`, `date_of_birth`, `gender`, `education_level`, `phone`, `facebook`, `skype`, `visa_type`, `expected_salary`, `date_of_leaving`, `created_at`, `updated_at`, `deleted_at`, `country_id`, `destination_country_id`, `employer_id`, `agents_id`, `indurstry_id`) VALUES ('3', 'Dewan Shajedur Rahman', 'sales@continental-motor.com', NULL, '$2y$10$thSeees1aH8JrjHHZcql7OfaiPQNlAMMIQpCAdjiyVWJFHY1Wh.R.', NULL, 'Dhaka', '2019-12-04', 'male', 'higher_secondary', '01713031718', NULL, NULL, NULL, NULL, NULL, '2019-12-08 18:00:12', '2019-12-08 18:00:12', NULL, '18', '4', NULL, NULL, NULL);




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;