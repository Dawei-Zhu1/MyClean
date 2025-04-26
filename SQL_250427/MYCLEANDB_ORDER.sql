-- MySQL dump 10.13  Distrib 8.0.42, for macos15 (arm64)
--
-- Host: localhost    Database: MYCLEANDB
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `ORDER`
--

DROP TABLE IF EXISTS `ORDER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ORDER` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `name` varchar(127) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_finished` tinyint(1) DEFAULT '0',
  `created_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `planned_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_has_orders` (`client_id`),
  CONSTRAINT `user_has_orders` FOREIGN KEY (`client_id`) REFERENCES `USER` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ORDER`
--

LOCK TABLES `ORDER` WRITE;
/*!40000 ALTER TABLE `ORDER` DISABLE KEYS */;
INSERT INTO `ORDER` VALUES (1,1,'Dawei Zhu','test test2 Brisbane Queensland 4321',0,'2025-04-23 09:52:10','2025-04-01 19:46:00'),(2,1,'Dawei Zhu','test test2 Brisbane Queensland 4321',0,'2025-04-23 14:19:50','2025-04-01 19:46:00'),(3,1,'Dawei Zhu','test test2 Brisbane Queensland 4321',0,'2025-04-23 14:27:59','2025-04-01 19:46:00'),(4,1,'Dawei Zhu','test test2 Brisbane Queensland 4321',0,'2025-04-23 14:42:16','2025-04-01 00:42:00'),(5,1,'Dawei Zhu','test test2 Brisbane Queensland 4321',0,'2025-04-23 15:38:32','2025-04-01 01:37:00'),(6,1,'Dawei Zhu','test test2 Brisbane Queensland 4321',0,'2025-04-23 15:39:15','2025-04-01 01:37:00'),(7,1,'Dawei Zhu','test test2 Brisbane Queensland 4321',1,'2025-04-23 15:40:03','2025-04-01 01:37:00'),(8,1,'Dawei Zhu','test test2 Brisbane Queensland 4321',1,'2025-04-23 23:46:34','2025-04-01 09:46:00'),(9,42,'Gloria Cement','1 Queen Street  Brisbane Queensland 4000',1,'2025-04-24 05:02:50','2025-04-25 09:02:00'),(10,1,'Dawei Zhu','349 Queen Street  Brisbane Queensland 4000',1,'2025-04-24 05:45:57','2025-04-01 15:45:00'),(11,1,'Dawei Zhu','349 Queen Street  Brisbane Queensland 4000',1,'2025-04-24 06:20:55','2025-04-30 16:20:00'),(12,1,'David Zhu','349 Queen Street  Brisbane Queensland 4000',1,'2025-04-25 14:07:56','2025-04-30 00:05:00');
/*!40000 ALTER TABLE `ORDER` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-27  0:02:57
