-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2021 at 10:12 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bilal', 'b@b.com', '$2y$10$oFCrzVwjpO4T/GOrarUwUuqTLqEFGgeNvQAXruOcphK3gHoOqjh7u', NULL, '2019-05-27 17:06:45', '2019-05-27 17:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomCat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`idCat`, `nomCat`, `created_at`, `updated_at`) VALUES
(1, 'Téléphones', '2019-05-27 17:23:16', '2019-06-04 11:29:46'),
(2, 'Tablettes', '2019-05-28 10:35:50', '2019-05-28 10:35:50'),
(3, 'Ordinateurs portables', '2019-06-03 15:02:36', '2019-06-03 15:02:36'),
(4, 'cats', '2020-03-14 14:47:34', '2020-03-14 14:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `idCom` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `mantTotalCom` double(8,2) NOT NULL,
  `etatCom` int(11) NOT NULL,
  `idDis` int(11) NOT NULL,
  `dateCom` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCom`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`idCom`, `idClient`, `mantTotalCom`, `etatCom`, `idDis`, `dateCom`, `created_at`, `updated_at`) VALUES
(1, 1, 33200.00, 2, 4, '2019-05-30', '2019-05-30 14:51:37', '2020-01-22 13:27:15'),
(2, 1, 15600.00, 1, 2, '2019-05-30', '2019-05-30 14:53:59', '2020-01-22 13:26:08'),
(3, 1, 26400.00, 2, 1, '2019-06-03', '2019-06-03 13:27:28', '2019-06-03 13:27:28'),
(4, 3, 30600.00, 0, 0, '2019-06-03', '2019-06-03 16:45:02', '2019-06-03 16:45:02'),
(5, 3, 7900.00, 0, 0, '2019-06-03', '2019-06-03 17:41:30', '2019-06-03 17:41:30'),
(6, 1, 10500.00, 2, 2, '2019-06-04', '2019-06-04 16:44:29', '2019-06-04 16:51:38'),
(7, 1, 52900.00, 2, 2, '2019-06-15', '2019-06-15 17:20:31', '2019-06-15 17:43:14'),
(8, 1, 16900.00, 2, 1, '2019-06-15', '2019-06-15 18:43:34', '2019-06-15 18:44:34'),
(9, 1, 43000.00, 0, 0, '2019-06-17', '2019-06-17 19:01:54', '2019-06-17 19:01:54'),
(10, 1, 16000.00, 2, 1, '2019-06-21', '2019-06-21 09:56:56', '2019-06-21 16:25:55'),
(11, 1, 22500.00, 0, 0, '2020-01-22', '2020-01-22 13:30:18', '2020-01-22 13:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `distributeurs`
--

DROP TABLE IF EXISTS `distributeurs`;
CREATE TABLE IF NOT EXISTS `distributeurs` (
  `idDis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameDis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teleDis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adrsDis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idDis`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributeurs`
--

INSERT INTO `distributeurs` (`idDis`, `nameDis`, `teleDis`, `adrsDis`, `created_at`, `updated_at`) VALUES
(1, 'Zguimi zakaria', '0577777777', '1863 Capitol Avenue Carthage, IN 46115', '2019-05-31 15:54:24', '2019-06-03 12:13:44'),
(2, 'Domi Mohamed', '0699999999', 'Hay lamal fes', '2019-06-03 10:58:45', '2019-06-03 10:58:45'),
(4, 'al Zafar Aslam ', '0535640012', '7, rue Hassan Dkhissi', '2019-06-03 12:21:45', '2019-06-03 12:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commandes`
--

DROP TABLE IF EXISTS `ligne_commandes`;
CREATE TABLE IF NOT EXISTS `ligne_commandes` (
  `idLigCom` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idProd` int(11) NOT NULL,
  `idCom` int(11) NOT NULL,
  `nbProd` int(11) NOT NULL,
  `prixNbProd` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idLigCom`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ligne_commandes`
--

INSERT INTO `ligne_commandes` (`idLigCom`, `idProd`, `idCom`, `nbProd`, `prixNbProd`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 4, 12000.00, '2019-05-30 14:51:37', '2019-05-30 14:51:37'),
(2, 7, 1, 4, 12800.00, '2019-05-30 14:51:37', '2019-05-30 14:51:37'),
(3, 2, 1, 4, 8400.00, '2019-05-30 14:51:37', '2019-05-30 14:51:37'),
(4, 8, 2, 2, 6000.00, '2019-05-30 14:53:59', '2019-05-30 14:53:59'),
(5, 7, 2, 3, 9600.00, '2019-05-30 14:53:59', '2019-05-30 14:53:59'),
(6, 8, 3, 2, 6000.00, '2019-06-03 13:27:28', '2019-06-03 13:27:28'),
(7, 4, 3, 2, 14000.00, '2019-06-03 13:27:28', '2019-06-03 13:27:28'),
(8, 6, 3, 2, 6400.00, '2019-06-03 13:27:28', '2019-06-03 13:27:28'),
(9, 4, 4, 3, 21000.00, '2019-06-03 16:45:02', '2019-06-03 16:45:02'),
(10, 6, 4, 3, 9600.00, '2019-06-03 16:45:02', '2019-06-03 16:45:02'),
(11, 1, 5, 4, 1600.00, '2019-06-03 17:41:30', '2019-06-03 17:41:30'),
(12, 2, 5, 3, 6300.00, '2019-06-03 17:41:30', '2019-06-03 17:41:30'),
(13, 3, 6, 3, 10500.00, '2019-06-04 16:44:29', '2019-06-04 16:44:29'),
(14, 8, 7, 3, 9000.00, '2019-06-15 17:20:32', '2019-06-15 17:20:32'),
(15, 3, 7, 3, 10500.00, '2019-06-15 17:20:32', '2019-06-15 17:20:32'),
(16, 4, 7, 1, 7000.00, '2019-06-15 17:20:32', '2019-06-15 17:20:32'),
(17, 2, 7, 6, 26400.00, '2019-06-15 17:20:32', '2019-06-15 17:20:32'),
(18, 7, 8, 2, 6400.00, '2019-06-15 18:43:34', '2019-06-15 18:43:34'),
(19, 3, 8, 3, 10500.00, '2019-06-15 18:43:34', '2019-06-15 18:43:34'),
(20, 8, 9, 1, 3000.00, '2019-06-17 19:01:54', '2019-06-17 19:01:54'),
(21, 3, 9, 4, 14000.00, '2019-06-17 19:01:54', '2019-06-17 19:01:54'),
(22, 5, 9, 4, 26000.00, '2019-06-17 19:01:54', '2019-06-17 19:01:54'),
(23, 8, 10, 3, 9000.00, '2019-06-21 09:56:56', '2019-06-21 09:56:56'),
(24, 3, 10, 2, 7000.00, '2019-06-21 09:56:56', '2019-06-21 09:56:56'),
(25, 8, 11, 2, 6000.00, '2020-01-22 13:30:18', '2020-01-22 13:30:18'),
(26, 6, 11, 3, 16500.00, '2020-01-22 13:30:19', '2020-01-22 13:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_resets_table', 1),
(51, '2019_05_20_125748_create_admins_table', 1),
(52, '2019_05_20_125749_create_admin_password_resets_table', 1),
(53, '2019_05_20_141941_create_produits_table', 1),
(54, '2019_05_20_142405_create_categories_table', 1),
(55, '2019_05_30_125304_create_commandes_table', 2),
(56, '2019_05_30_130108_create_ligne_commandes_table', 2),
(57, '2019_05_30_130638_create_distributeurs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProd` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idCat` int(11) NOT NULL,
  `nomProd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionProd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixAchatProd` double(8,2) NOT NULL,
  `prixVenteProd` double(8,2) NOT NULL,
  `qteStockProd` int(11) NOT NULL,
  `photoProd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idProd`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`idProd`, `idCat`, `nomProd`, `descriptionProd`, `prixAchatProd`, `prixVenteProd`, `qteStockProd`, `photoProd`, `created_at`, `updated_at`) VALUES
(1, 1, 'Huawei Y5 lite 2018 Neuf', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 900.00, 1000.00, 35, 'produitPhoto_1559647131.jpg', '2019-05-27 17:24:15', '2019-06-17 19:29:35'),
(2, 1, 'Iphone 8 plus', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 4250.00, 4400.00, 40, 'produitPhoto_1559647376.png', '2019-05-27 17:24:44', '2019-06-17 19:29:44'),
(3, 1, 'Samsung galaxy a8 2018 gold', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 3200.00, 3500.00, 33, 'produitPhoto_1559647533.jpg', '2019-05-27 17:28:55', '2019-06-21 09:56:56'),
(4, 1, 'Huawei mate 10 lite', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 6000.00, 7000.00, 30, 'produitPhoto_1558978160.png', '2019-05-27 17:29:20', '2019-06-17 19:28:38'),
(5, 1, 'Huawei mate 20 Pro', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 5900.00, 6500.00, 25, 'produitPhoto_1558978189.jpg', '2019-05-27 17:29:49', '2019-06-17 19:29:02'),
(6, 1, 'Oneplus 6T', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.', 5000.00, 5500.00, 37, 'produitPhoto_1559647706.jpg', '2019-05-27 17:30:46', '2020-01-22 13:30:19'),
(7, 2, 'IPad Pro Édition 9.7 4G', 'Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 3000.00, 3200.00, 25, 'produitPhoto_1559039869.png', '2019-05-28 10:37:50', '2019-06-17 19:29:52'),
(8, 2, 'ThinkPad 10 Pro Tablette Pc 3G', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.', 2000.00, 3000.00, 28, 'produitPhoto_1559039989.jpg', '2019-05-28 10:39:49', '2020-01-22 13:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomClient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adrsClient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teleClient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateNaissClient` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nomClient`, `prenomClient`, `adrsClient`, `teleClient`, `dateNaissClient`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'BADAH', 'Bilal', 'HAysaisa', '0639537704', '1996-07-04', 'b@b.com', '$2y$10$t2umv/ftdjl332nEP.tRBunjZ0HMfWf2MZxv0W7aWtLtzRhUQJd2O', 'BEaKKW9WuqekzU0pOiTOGq4I52dSwi2je2NVN1yZ7djUfWaqNTTaHEFxEhrl', '2019-05-27 14:48:16', '2019-05-27 14:48:16'),
(2, 'badah', 'ayman', 'ajdkjml', '0627728778', '2004-02-11', 'a@a.com', '$2y$10$YVS8Crfr78p4NSx.b02JPuQ4qhNV66C6tiREQTJE7De5k0dlO630.', NULL, '2019-05-27 17:08:50', '2019-05-27 17:08:50'),
(3, 'Ziani', 'Bader', 'lmarja', '0634989999', '1996-06-04', 'z@z.com', '$2y$10$uETOO4wyKmHSJaDOCeUE0u7KoWEi3xRAS76ZV5WPXSnsjFJiEMJae', NULL, '2019-05-30 12:36:31', '2019-05-30 12:36:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
