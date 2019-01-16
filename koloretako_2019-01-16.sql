# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.24-0ubuntu0.16.04.1)
# Base de données: koloretako
# Temps de génération: 2019-01-16 16:24:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table ip_addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ip_addresses`;

CREATE TABLE `ip_addresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `machine` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ip_addresses` WRITE;
/*!40000 ALTER TABLE `ip_addresses` DISABLE KEYS */;

INSERT INTO `ip_addresses` (`id`, `ip_address`, `machine`)
VALUES
	(1,'192.168.1.25','ADC0607B');

/*!40000 ALTER TABLE `ip_addresses` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table leaderboards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leaderboards`;

CREATE TABLE `leaderboards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(10) NOT NULL,
  `duration` float(10,2) NOT NULL,
  `mode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `leaderboards` WRITE;
/*!40000 ALTER TABLE `leaderboards` DISABLE KEYS */;

INSERT INTO `leaderboards` (`id`, `pseudo`, `score`, `duration`, `mode`)
VALUES
	(1,'Mohamed',15,251.08,1),
	(2,'Quentin',12,259.44,1),
	(3,'Patrice',7,145.42,3),
	(4,'Simon',4,98.44,2),
	(5,'Pierre-Edouard',4,99.44,4),
	(8,'toto',1,35.61,1),
	(9,'test',1,40.00,1),
	(10,'zbleuh',1,29.24,4),
	(11,'pe',8,200.66,2),
	(12,'bbbb',1,34.27,2),
	(13,'tesss',1,30.24,3),
	(14,'testa',2,51.16,3),
	(16,'tototototo',1,4.05,3),
	(20,'home',2,56.81,1),
	(21,'testttttt',1,25.10,2),
	(22,'hardgamer',1,37.11,3),
	(24,'lllll',2,125.83,1),
	(25,'ppp',1,12.40,1);

/*!40000 ALTER TABLE `leaderboards` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table migrations
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
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_12_21_103237_leaderboard',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Patrice','patrice.picollet@hotmail.fr',NULL,'$2y$10$YPDI.eSMQJIdy0mjm8o54OFVyQ1/WOYL//jECVDHABecAWWrcLl1G','N9Gkgywg1F0N3Q5Ws9XqCSAKJVSIqnDXSxunQUSJ7rbspniPlPpLWO0QWU3p','2019-01-16 15:35:03','2019-01-16 15:35:03');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
