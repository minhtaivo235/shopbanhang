-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2020 at 02:47 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'Apple', '2020-07-27 09:12:53', '2020-07-27 09:12:53'),
(17, 'demo3', '2020-07-27 09:37:15', '2020-07-27 09:37:15'),
(10, 'Mobile', '2020-07-27 09:07:51', '2020-07-27 09:07:51'),
(8, 'Laptop', '2020-07-27 08:55:24', '2020-07-27 08:55:24'),
(20, 'uyuyhyhyn', '2020-07-28 03:35:49', '2020-07-28 03:35:49'),
(21, '434', '2020-07-28 08:35:53', '2020-07-28 08:35:53'),
(22, '656', '2020-07-28 08:35:57', '2020-07-28 08:35:57'),
(24, 'dfg', '2020-07-28 08:36:05', '2020-07-28 08:36:05'),
(25, 'ưef', '2020-07-28 08:36:08', '2020-07-28 08:36:08'),
(26, 'dfg', '2020-07-28 08:36:12', '2020-07-28 08:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Iphone X', 9000000.00, '', 1, '2020-07-23 03:37:30', '2020-07-23 03:37:30'),
(3, 'Iphone 7', 5000000.00, NULL, NULL, NULL, NULL),
(4, 'Iphone 8', 7000000.00, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'user', '2020-07-31 16:42:56', '2020-07-31 16:42:56'),
(3, 'manager', '2020-07-31 16:07:51', '2020-07-31 16:07:51'),
(4, 'admin', '2020-07-31 16:42:44', '2020-07-31 16:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', 'active', NULL, NULL, 4),
(2, 'user', 'user@gmail.com', '123456', 'active', NULL, NULL, 5),
(3, 'manager', 'manager@gmail.com', '123456', 'active', NULL, NULL, 3),
(4, 'admin2', 'admin2@gmail.com', '123456', 'active', '2020-08-03 06:46:16', '2020-08-03 06:46:16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `why_chooses`
--

DROP TABLE IF EXISTS `why_chooses`;
CREATE TABLE IF NOT EXISTS `why_chooses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `why_chooses`
--

INSERT INTO `why_chooses` (`id`, `title`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abcds', 'file_upload/1.jpg', 'fgdg', 'active', '2020-08-04 08:34:28', '2020-08-04 08:34:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
