-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: Localhost    Database: databasedump
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dumplogs`
--

DROP TABLE IF EXISTS `dumplogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dumplogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mytables` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dumpsite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dumplogs`
--

LOCK TABLES `dumplogs` WRITE;
/*!40000 ALTER TABLE `dumplogs` DISABLE KEYS */;
INSERT INTO `dumplogs` VALUES (1,'dbuser',',failed_jobs','databasedump','Local Drive','','2020-02-26 19:10:40','2020-02-26 19:10:40'),(2,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','','2020-02-26 19:18:51','2020-02-26 19:18:51'),(3,'dbuser','dumplogs,migrations,users','databasedump','Local Drive','','2020-02-26 19:19:37','2020-02-26 19:19:37'),(4,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Google Drive','Full Dump','2020-02-26 19:37:52','2020-02-26 19:37:52'),(5,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-26 19:49:16','2020-02-26 19:49:16'),(6,'dbuser','dumplogs','databasedump','Local Drive','Partial Dump','2020-02-26 19:49:36','2020-02-26 19:49:36'),(7,'dbuser','dumplogs','databasedump','Local Drive','Partial Dump','2020-02-26 19:52:47','2020-02-26 19:52:47'),(8,'dbuser','failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-26 19:58:16','2020-02-26 19:58:16'),(9,'dbuser','failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-26 19:58:37','2020-02-26 19:58:37'),(10,'dbuser','failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-26 19:58:52','2020-02-26 19:58:52'),(11,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-26 19:59:10','2020-02-26 19:59:10'),(12,'dbuser','dumplogs,failed_jobs','databasedump','Google Drive','Partial Dump','2020-02-26 20:02:04','2020-02-26 20:02:04'),(13,'dbuser','dumplogs,failed_jobs','databasedump','Google Drive','Partial Dump','2020-02-26 20:06:39','2020-02-26 20:06:39'),(14,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-26 20:07:26','2020-02-26 20:07:26'),(15,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-26 22:13:22','2020-02-26 22:13:22'),(16,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-26 22:14:29','2020-02-26 22:14:29'),(17,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 09:37:02','2020-02-28 09:37:02'),(18,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 10:16:32','2020-02-28 10:16:32'),(19,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 10:22:23','2020-02-28 10:22:23'),(20,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 10:22:47','2020-02-28 10:22:47'),(21,'dbuser','migrations,password_resets','databasedump','Local Drive','Partial Dump','2020-02-28 10:54:39','2020-02-28 10:54:39'),(22,'dbuser','migrations,password_resets','databasedump','Local Drive','Partial Dump','2020-02-28 10:55:23','2020-02-28 10:55:23'),(23,'dbuser','migrations,password_resets','databasedump','Local Drive','Partial Dump','2020-02-28 11:05:59','2020-02-28 11:05:59'),(24,'dbuser','migrations,password_resets','databasedump','Local Drive','Partial Dump','2020-02-28 11:12:38','2020-02-28 11:12:38'),(25,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:04:33','2020-02-28 20:04:33'),(26,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:05:04','2020-02-28 20:05:04'),(27,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:06:27','2020-02-28 20:06:27'),(28,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:10:26','2020-02-28 20:10:26'),(29,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:11:58','2020-02-28 20:11:58'),(30,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:12:26','2020-02-28 20:12:26'),(31,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:13:54','2020-02-28 20:13:54'),(32,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:14:47','2020-02-28 20:14:47'),(33,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:17:37','2020-02-28 20:17:37'),(34,'dbuser','migrations,failed_jobs','databasedump','Local Drive','Partial Dump','2020-02-28 20:18:49','2020-02-28 20:18:49'),(35,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 22:42:16','2020-02-28 22:42:16'),(36,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 22:43:52','2020-02-28 22:43:52'),(37,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 22:44:05','2020-02-28 22:44:05'),(38,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 22:54:11','2020-02-28 22:54:11'),(39,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 22:54:26','2020-02-28 22:54:26'),(40,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 22:54:58','2020-02-28 22:54:58'),(41,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 23:01:11','2020-02-28 23:01:11'),(42,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 23:01:24','2020-02-28 23:01:24'),(43,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-28 23:02:09','2020-02-28 23:02:09'),(44,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-02-29 00:42:01','2020-02-29 00:42:01'),(45,'dbuser','failed_jobs,migrations','databasedump','Local Drive','Partial Dump','2020-02-29 00:47:48','2020-02-29 00:47:48'),(46,'dbuser','failed_jobs,migrations','databasedump','Local Drive','Partial Dump','2020-02-29 00:52:02','2020-02-29 00:52:02'),(47,'dbuser','dumplogs,users','databasedump','Local Drive','Partial Dump','2020-02-29 01:04:43','2020-02-29 01:04:43'),(48,'dbuser','dumplogs,users','databasedump','Local Drive','Partial Dump','2020-02-29 01:06:48','2020-02-29 01:06:48'),(49,'dbuser','failed_jobs,password_resets','databasedump','Local Drive','Partial Dump','2020-02-29 01:08:19','2020-02-29 01:08:19'),(50,'dbuser','failed_jobs,password_resets','databasedump','Local Drive','Partial Dump','2020-02-29 01:17:35','2020-02-29 01:17:35'),(51,'dbuser','failed_jobs,password_resets','databasedump','Local Drive','Partial Dump','2020-02-29 01:19:18','2020-02-29 01:19:18'),(52,'dbuser','failed_jobs,password_resets','databasedump','Local Drive','Partial Dump','2020-02-29 01:22:47','2020-02-29 01:22:47'),(53,'dbuser','failed_jobs,password_resets','databasedump','Local Drive','Partial Dump','2020-02-29 01:26:27','2020-02-29 01:26:27'),(54,'dbuser','failed_jobs,password_resets','databasedump','Local Drive','Partial Dump','2020-02-29 01:28:56','2020-02-29 01:28:56'),(55,'dbuser','dumplogs,users','databasedump','Local Drive','Partial Dump','2020-02-29 01:30:21','2020-02-29 01:30:21'),(56,'dbuser','dumplogs,users','databasedump','Local Drive','Partial Dump','2020-02-29 01:35:29','2020-02-29 01:35:29'),(57,'dbuser','failed_jobs,migrations','databasedump','Local Drive','Partial Dump','2020-02-29 01:57:38','2020-02-29 01:57:38'),(58,'dbuser','failed_jobs,migrations','databasedump','Local Drive','Partial Dump','2020-02-29 02:05:31','2020-02-29 02:05:31'),(59,'dbuser','dumplogs,failed_jobs,migrations','databasedump','Local Drive','Partial Dump','2020-03-05 08:56:01','2020-03-05 08:56:01'),(60,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-03-05 09:48:55','2020-03-05 09:48:55'),(61,'dbuser','dumplogs,failed_jobs,migrations,password_resets,users','databasedump','Local Drive','Full Dump','2020-03-05 09:58:39','2020-03-05 09:58:39'),(62,'dbuser','migrations,password_resets','databasedump','Local Drive','Partial Dump','2020-03-05 09:59:30','2020-03-05 09:59:30');
/*!40000 ALTER TABLE `dumplogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_02_26_020938_create_dumplogs_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'lola','lollydeeo@gmail.com',NULL,'$2y$10$9aDOwkwvr/PYSrnMK5LFCeihqIEM/K8CQVzjuza91LYCKnstuSiPG',NULL,'2020-02-24 08:21:11','2020-02-24 08:21:11');
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

-- Dump completed on 2020-03-05 12:03:36
