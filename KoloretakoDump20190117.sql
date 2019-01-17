-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: koloretako
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ip_addresses`
--

DROP TABLE IF EXISTS `ip_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_addresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `machine` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_addresses`
--

LOCK TABLES `ip_addresses` WRITE;
/*!40000 ALTER TABLE `ip_addresses` DISABLE KEYS */;
INSERT INTO `ip_addresses` VALUES (1,'192.168.1.25','ADC0607B'),(2,'192.168','ADCE'),(3,'168','ABVF');
/*!40000 ALTER TABLE `ip_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaderboards`
--

DROP TABLE IF EXISTS `leaderboards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leaderboards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(10) NOT NULL,
  `duration` float(10,2) NOT NULL,
  `mode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaderboards`
--

LOCK TABLES `leaderboards` WRITE;
/*!40000 ALTER TABLE `leaderboards` DISABLE KEYS */;
INSERT INTO `leaderboards` VALUES (1,'Mohamed',15,251.08,1),(2,'Quentin',12,259.44,1),(3,'Patrice',7,145.42,3),(4,'Simon',4,98.44,2),(5,'Pierre-Edouard',4,99.44,4),(8,'toto',1,35.61,1),(9,'test',1,40.00,1),(10,'zbleuh',1,29.24,4),(11,'pe',8,200.66,2),(12,'bbbb',1,34.27,2),(13,'tesss',1,30.24,3),(14,'testa',2,51.16,3),(16,'tototototo',1,4.05,3),(20,'home',2,56.81,1),(21,'testttttt',1,25.10,2),(22,'hardgamer',1,37.11,3),(24,'lllll',2,125.83,1),(25,'ppp',1,12.40,1);
/*!40000 ALTER TABLE `leaderboards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_12_21_103237_leaderboard',1),(4,'2016_06_01_000001_create_oauth_auth_codes_table',2),(5,'2016_06_01_000002_create_oauth_access_tokens_table',2),(6,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(7,'2016_06_01_000004_create_oauth_clients_table',2),(8,'2016_06_01_000005_create_oauth_personal_access_clients_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('03e99e6dff63f14f07792154db3b7164498d12a806ea3a3e87445ee8ca967277b1d397a528d48a9a',7,1,'MyApp','[]',0,'2019-01-17 00:15:56','2019-01-17 00:15:56','2020-01-17 00:15:56'),('16a6d321f21bd06264fd0698296e567ed22c0a5d5f879d7a1faecac06ea4ff03ab498518c40c23e6',4,1,'MyApp','[]',0,'2019-01-17 02:21:10','2019-01-17 02:21:10','2020-01-17 02:21:10'),('17d459bd133fff563db3cf6e7382f6c53a9aaa69259b72340b73534af534c986dfc62263e10dd826',4,1,'MyApp','[]',0,'2019-01-16 23:18:52','2019-01-16 23:18:52','2020-01-16 23:18:52'),('18cd918d3c41ba76beaa65ff9ddf77a5d2ed5d06e8232fcc41a39fe731172eb367ba2157f5ff43d3',4,1,'MyApp','[]',0,'2019-01-17 02:09:12','2019-01-17 02:09:12','2020-01-17 02:09:12'),('210de5cf966bf3cfc8913d70fe43c3c72f2617ed854c802eee9a71d4732347ead4c1b77636432137',4,1,'MyApp','[]',0,'2019-01-17 03:51:04','2019-01-17 03:51:04','2020-01-17 03:51:04'),('21126c61f1068c07f4647b4c8796312c95f0340af110cdab605c5e7d79f64b8ffdf7b2b6dffabb09',4,1,'MyApp','[]',0,'2019-01-17 02:55:53','2019-01-17 02:55:53','2020-01-17 02:55:53'),('3088a56e9abb4719f265d613362487023ae861bff07ee3a4ad9627bf95ca48e5bd96bb8cbdfcfc70',4,1,'MyApp','[]',0,'2019-01-17 02:18:18','2019-01-17 02:18:18','2020-01-17 02:18:18'),('3111b625501a2adb678ec6f6e56b5792a3d375b12b114ab6affe3053891093b8f6ea6c3e5300a765',4,1,'MyApp','[]',0,'2019-01-17 02:15:32','2019-01-17 02:15:32','2020-01-17 02:15:32'),('3260848735d327e5b260a52cfbedecc6b4388725675244fa5e9554d18602ff1b678dd9baf22e349f',4,1,'MyApp','[]',0,'2019-01-17 03:33:48','2019-01-17 03:33:48','2020-01-17 03:33:48'),('3fcca3aecf4f88a214057315af78a3009af994cab0075523d7461c43b1a188e6b9b44d2d88fd0d38',4,1,'MyApp','[]',0,'2019-01-17 02:24:55','2019-01-17 02:24:55','2020-01-17 02:24:55'),('4b37a0a9cf4116bd4557bc5c05fc835f7653c93e1b2ff10921ff6b7187dbb3327f96fd23f3ccfeb3',4,1,'MyApp','[]',0,'2019-01-17 03:20:35','2019-01-17 03:20:35','2020-01-17 03:20:35'),('4ce9cafcffbf796e6ee54c5a74ae0da85c78def5e809f02798c113a7af61d531efb34801aeed7c02',4,1,'MyApp','[]',0,'2019-01-17 02:17:41','2019-01-17 02:17:41','2020-01-17 02:17:41'),('512154e311828aeeb2adc9a7058aa73d8469e5bb857a75d31e44863aee08957d6ac687ac3a47eaff',4,1,'MyApp','[]',0,'2019-01-17 02:17:48','2019-01-17 02:17:48','2020-01-17 02:17:48'),('528721e9e75253d00d74522c40b5c31581cd12d9e1afe992a96a0a9836f4c8f5b34241d22772190a',4,1,'MyApp','[]',0,'2019-01-17 02:23:06','2019-01-17 02:23:06','2020-01-17 02:23:06'),('754cf37bbd3ca123361b3084a8dc88fc8f1122c61dc9eb22a073776899251d0531472c687be8fd14',4,1,'MyApp','[]',0,'2019-01-17 02:38:28','2019-01-17 02:38:28','2020-01-17 02:38:28'),('7cc19c116b3616afeb39161ceecc522f454c35de7c0529c2c477a5385793cba1109a6a484181d8eb',4,1,'MyApp','[]',0,'2019-01-17 02:24:17','2019-01-17 02:24:17','2020-01-17 02:24:17'),('80893a4d0497862cf9f2ac4afeda846e7064ae6c2cd99110e145112ceda4822bdc66eb42142624e0',4,1,'MyApp','[]',0,'2019-01-17 02:38:50','2019-01-17 02:38:50','2020-01-17 02:38:50'),('812566f66ffc26ea454f940ce1e4582e7e9e24f78d631a63f9463d18083c2ff5ce858c90452cf909',4,1,'MyApp','[]',0,'2019-01-17 02:54:15','2019-01-17 02:54:15','2020-01-17 02:54:15'),('8454ee9910756fd30389162388cc4e306d0bb6719db089a7ad8898134bfac0beec0ff42c6a922cee',4,1,'MyApp','[]',0,'2019-01-17 02:18:24','2019-01-17 02:18:24','2020-01-17 02:18:24'),('8709260dfe830a2f3b72d6d10f3591614dbb4c76335ae5a66b1ab0f5c5b630930eb24c718f527ea6',4,1,'MyApp','[]',0,'2019-01-17 03:01:43','2019-01-17 03:01:43','2020-01-17 03:01:43'),('8860b23f18b8cdb3cfbc5e836f2e5735b106cc7b8b804e1fd08decda7384c2201191232f2a98c269',6,1,'MyApp','[]',0,'2019-01-16 23:34:37','2019-01-16 23:34:37','2020-01-16 23:34:37'),('886b5968d9670af1e2560d9139d4f5fea6a89a1492e101c09d9f9e1cf70683769cf342f9de32a29b',4,1,'MyApp','[]',0,'2019-01-16 23:09:08','2019-01-16 23:09:08','2020-01-16 23:09:08'),('91545cd4cc3ee2cb6eefe555a31d72c10e356100a6c7fc44f0461131dd89143331e06d93d8a0466c',4,1,'MyApp','[]',0,'2019-01-17 03:31:52','2019-01-17 03:31:52','2020-01-17 03:31:52'),('956931607cfec01435e4d9189b16e94ad332fa247e7f12446677a74406f7398828c19086c754b284',4,1,'MyApp','[]',0,'2019-01-17 02:19:27','2019-01-17 02:19:27','2020-01-17 02:19:27'),('9a9191c7b780a7684a4af6621a989701dd937da4bc88956010576ecda340f50e6699735d4abe0ced',4,1,'MyApp','[]',0,'2019-01-17 02:23:40','2019-01-17 02:23:40','2020-01-17 02:23:40'),('a4cbd4f93f845c56b523c5b5c8e7e91dd7e3a40610d73fdb7dc698717c7cf84a67fa42dd7631325e',4,1,'MyApp','[]',0,'2019-01-17 02:38:02','2019-01-17 02:38:02','2020-01-17 02:38:02'),('a6ade0258c583d1b3e33d0ca07fa44804db1cbf142ab5ef517172026a7e70d82ef772d63243d60a2',4,1,'MyApp','[]',0,'2019-01-17 03:35:09','2019-01-17 03:35:09','2020-01-17 03:35:09'),('a7ebe489899df16248d9ac8d59ba611fec9f46346f3324ae88cf6f1adaeb1eae17344db4978aa4f5',4,1,'MyApp','[]',0,'2019-01-17 02:13:38','2019-01-17 02:13:38','2020-01-17 02:13:38'),('a8814ccb680b02d381194ad79b06bd307a7932e701ecd0ad20566097d360083eaf6951a37bf93498',4,1,'MyApp','[]',0,'2019-01-17 02:19:19','2019-01-17 02:19:19','2020-01-17 02:19:19'),('acf3405f8640156fbfe063568c53000c849c1e655c5a11dbf9c12d3763c3a6b579892ba9c185d749',4,1,'MyApp','[]',0,'2019-01-17 03:36:54','2019-01-17 03:36:54','2020-01-17 03:36:54'),('c21c8d2f2ac27c3341311860227dfea5bfbce7bef513229fb46c19ac86bf147046755ca070375998',4,1,'MyApp','[]',0,'2019-01-16 23:07:12','2019-01-16 23:07:12','2020-01-16 23:07:12'),('c6e8656949d3a975aeeba20ff7b26a9145dda3118f5b7e52edee9640bc4c32234e953c5dd7c45298',4,1,'MyApp','[]',0,'2019-01-17 02:36:09','2019-01-17 02:36:09','2020-01-17 02:36:09'),('d032236520e777e11ad19f6f31913c208df59598d67c2f202d7651e6c89160a71b4e46dd2d4843b2',4,1,'MyApp','[]',0,'2019-01-17 03:02:46','2019-01-17 03:02:46','2020-01-17 03:02:46'),('d707be7474ecd1ac0b1a28fb2489a6eaf5530c7f34ac1ecabc6f97592eeb9a4ccaf88c56ffaa17bb',4,1,'MyApp','[]',0,'2019-01-17 02:13:13','2019-01-17 02:13:13','2020-01-17 02:13:13'),('dab524636fb7205f39b20c2c2278925b08979cf63f2e460a35af00dd0b3fa9b10dec63f584b22abd',4,1,'MyApp','[]',0,'2019-01-17 03:50:31','2019-01-17 03:50:31','2020-01-17 03:50:31'),('e3ea7daa522445666e73deffc0a41cea2a338883fcc1998f5f405236b88c4541a5b0d514ecf2d636',4,1,'MyApp','[]',0,'2019-01-17 03:05:24','2019-01-17 03:05:24','2020-01-17 03:05:24'),('e74a0de3dafd25df9a1c2085ae0e01bf8e286e2f70af574eef295d6068fe056c2acd40ae4ca6e98e',4,1,'MyApp','[]',0,'2019-01-17 03:34:44','2019-01-17 03:34:44','2020-01-17 03:34:44'),('e8baed1d96a9f6e3aba313d25fd15e10aa8f7eaaf65d5bdda5482b2890883687f8a38adae1c7e71c',4,1,'MyApp','[]',0,'2019-01-17 02:16:39','2019-01-17 02:16:39','2020-01-17 02:16:39'),('ec3153ed27bb54e4d95c2d2dd888308b669e7f8f815b5de9d74573a93b65aa1265d33a99f78119f2',4,1,'MyApp','[]',0,'2019-01-17 03:48:15','2019-01-17 03:48:15','2020-01-17 03:48:15');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','3FfarNwnpti6MVM10fNsn6xlXVaOnf19EmbEO22R','http://localhost',1,0,0,'2019-01-16 22:54:00','2019-01-16 22:54:00'),(2,NULL,'Laravel Password Grant Client','1OMXIljKV4TEpXQj7XwqxtkOCt8VvhGJmrbTgzaW','http://localhost',0,1,0,'2019-01-16 22:54:00','2019-01-16 22:54:00');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2019-01-16 22:54:00','2019-01-16 22:54:00');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Patrice','patrice.picollet@hotmail.fr',NULL,'$2y$10$YPDI.eSMQJIdy0mjm8o54OFVyQ1/WOYL//jECVDHABecAWWrcLl1G','N9Gkgywg1F0N3Q5Ws9XqCSAKJVSIqnDXSxunQUSJ7rbspniPlPpLWO0QWU3p','2019-01-16 15:35:03','2019-01-16 15:35:03'),(4,'test','test@test.fr',NULL,'$2y$10$WRWHVAhtcPhcDUMfG9mr5.eM7Gp7G1nuz9xUSqjo1XiIn3JgdXk/C','tTfjEz8hbeauv0FmfdmxvB839ob8E2w5jo1pQOMm6SkLZDhodCHqFIDLSc4U','2019-01-16 23:07:11','2019-01-16 23:07:11'),(5,'toto','toto@test.fr',NULL,'$2y$10$fDBGLAcrkT0Phqsp8rJ13.sFqYySHxjlCzbSwK1Gwm.jSeDPdFdoa','2RwFOKVUOLd7NRxaT6dyS2X3Vl04MAKuEokPL2lj0f7mWd28B4v52QpJjBEj','2019-01-16 23:21:14','2019-01-16 23:21:14'),(6,'test2','test2@test.fr',NULL,'$2y$10$Xb5R9K2O0n4pRAPgNHu/W.54AuIvv2Sw6EQK3SWKjTN1BI2tvCty6',NULL,'2019-01-16 23:34:37','2019-01-16 23:34:37'),(7,'titi','titi@test.fr',NULL,'$2y$10$0pVF2KDk.FUVpLP5waLnpuTZdRtuzjSubXrkNG7vlxTFiQbl0I4.6',NULL,'2019-01-17 00:15:56','2019-01-17 00:15:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-17  9:54:58
