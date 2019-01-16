# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.24-0ubuntu0.16.04.1)
# Base de données: koloretako
# Temps de génération: 2019-01-15 15:26:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table leaderboards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leaderboards`;

CREATE TABLE `leaderboards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(10) NOT NULL,
  `duration` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leaderboards_pseudo_unique` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `leaderboards` WRITE;
/*!40000 ALTER TABLE `leaderboards` DISABLE KEYS */;

INSERT INTO `leaderboards` (`id`, `pseudo`, `score`, `duration`)
VALUES
	(1,'Mohamed',15,251.08),
	(2,'Quentin',12,259.44),
	(3,'Patrice',7,145.42),
	(4,'Simon',4,98.44),
	(5,'Pierre-Edouard',4,99.44),
	(8,'toto',1,35.61),
	(9,'test',1,40.00),
	(10,'zbleuh',1,29.24),
	(11,'pe',8,200.66),
	(12,'bbbb',1,34.27),
	(13,'tesss',1,30.24),
	(14,'testa',2,51.16),
	(16,'tototototo',1,4.05);

/*!40000 ALTER TABLE `leaderboards` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
