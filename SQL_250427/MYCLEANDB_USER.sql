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
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `USER` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `DoB` varchar(45) NOT NULL,
  `email` varchar(63) DEFAULT NULL,
  `phone` varchar(23) DEFAULT NULL,
  `address1` varchar(127) NOT NULL,
  `address2` varchar(127) DEFAULT NULL,
  `city` varchar(31) NOT NULL,
  `state` varchar(15) NOT NULL,
  `postcode` varchar(7) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `role_id_idx` (`role`),
  CONSTRAINT `user_has_a_role` FOREIGN KEY (`role`) REFERENCES `ROLE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (1,'David','Zhu','2000-02-22','zhudawei01@gmail.com','0478888888','349 Queen Street','','Brisbane','Queensland','4000','$2y$12$BGFER.jrENLz72TVHelkbeCqnhHyprB1Qg6qRDML49GPC95Zr5aA6',1),(34,'Dawei','Zhu','2000-01-01','a@a','0478886668','test','test2','Brisbane','Queensland','4321','$2y$12$BGFER.jrENLz72TVHelkbeCqnhHyprB1Qg6qRDML49GPC95Zr5aA6',1),(35,'Dawei','Zhu','2000-01-01','a@a','0478886668','test','test2','Brisbane','Queensland','4321','$2y$12$BGFER.jrENLz72TVHelkbeCqnhHyprB1Qg6qRDML49GPC95Zr5aA6',1),(36,'Dawei','Zhu','2000-01-01','a@a','0478886668','test','test2','Brisbane','Queensland','4321','$2y$12$BGFER.jrENLz72TVHelkbeCqnhHyprB1Qg6qRDML49GPC95Zr5aA6',1),(37,'Dawei','Zhu','2000-01-01','a@a','0478886668','test','test2','Brisbane','Queensland','4321','$2y$12$BGFER.jrENLz72TVHelkbeCqnhHyprB1Qg6qRDML49GPC95Zr5aA6',1),(38,'Dawei','Zhu','2000-01-01','a@a','0478886668','test','test2','Brisbane','Queensland','4321','$2y$12$BGFER.jrENLz72TVHelkbeCqnhHyprB1Qg6qRDML49GPC95Zr5aA6',1),(39,'Dawei','Zhu','2000-01-01','a@a','0478886668','test','test2','Brisbane','Queensland','4321','$2y$12$BGFER.jrENLz72TVHelkbeCqnhHyprB1Qg6qRDML49GPC95Zr5aA6',1),(40,'Dawei','Zhu','2000-01-01','a@a','0478886668','test','test2','Brisbane','Queensland','4321','$2y$12$BGFER.jrENLz72TVHelkbeCqnhHyprB1Qg6qRDML49GPC95Zr5aA6',1),(42,'Gloria','Cement','2025-04-10','gloria@emai.com.au','1234567890','1 Queen Street','','Brisbane','Queensland','4000','$2y$10$569FJjae.3I8aSYuO1tEB.C4EG9oyO/Vo.zkq95yD2Qwn9.47IMsy',1),(43,'a','b','2025-04-01','a@a.com','1234567890','1','','B','Queensland','4000','$2y$10$FDDv0sEqtW5n.wuCp9eTquaGVvW8JOBYAw/9oK3LU2pWfBdBDYFKO',1);
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
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

-- Dump completed on 2025-04-27  0:03:00
