-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: redbelttest
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `pokes`
--

DROP TABLE IF EXISTS `pokes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poke_count` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `poker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pokes_users_idx` (`user_id`),
  KEY `fk_pokes_users1_idx` (`poker_id`),
  CONSTRAINT `fk_pokes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pokes_users1` FOREIGN KEY (`poker_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokes`
--

LOCK TABLES `pokes` WRITE;
/*!40000 ALTER TABLE `pokes` DISABLE KEYS */;
INSERT INTO `pokes` VALUES (1,'69','2015-11-20 14:11:05','2015-11-20 14:22:35',4,1),(2,'2','2015-11-20 14:19:12','2015-11-20 14:22:33',3,1),(3,'19','2015-11-20 14:19:14','2015-11-20 14:42:12',2,1),(4,'4','2015-11-20 14:19:16','2015-11-20 14:57:29',5,1),(5,'3','2015-11-20 15:14:04','2015-11-20 15:43:22',1,4),(6,'2','2015-11-20 15:14:05','2015-11-20 15:43:24',2,4),(7,'2','2015-11-20 15:14:06','2015-11-20 15:43:25',3,4),(8,'1','2015-11-20 15:14:07','2015-11-20 15:14:07',5,4),(9,'4','2015-11-20 15:19:24','2015-11-20 16:02:18',1,3),(10,'5','2015-11-20 15:19:25','2015-11-20 16:02:15',2,3),(11,'2','2015-11-20 15:19:26','2015-11-20 15:45:26',4,3),(12,'2','2015-11-20 15:19:26','2015-11-20 15:45:27',5,3),(13,'2','2015-11-20 15:19:50','2015-11-20 15:19:54',1,2),(14,'2','2015-11-20 15:19:51','2015-11-20 15:19:55',3,2),(15,'1','2015-11-20 15:19:52','2015-11-20 15:19:52',4,2),(16,'1','2015-11-20 15:19:53','2015-11-20 15:19:53',5,2),(17,'1','2015-11-20 15:20:04','2015-11-20 15:20:04',1,5),(18,'1','2015-11-20 15:20:05','2015-11-20 15:20:05',2,5),(19,'1','2015-11-20 15:20:06','2015-11-20 15:20:06',3,5),(20,'1','2015-11-20 15:20:07','2015-11-20 15:20:07',4,5),(21,'1','2015-11-20 15:45:38','2015-11-20 15:45:38',7,3),(22,'1','2015-11-20 15:45:39','2015-11-20 15:45:39',6,3);
/*!40000 ALTER TABLE `pokes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Eric Chou','Eric','ericchou2010@gmail.com','12345678','1992-10-01','2015-11-20 13:26:33','2015-11-20 13:26:33'),(2,'Jason ','JSON','json@gmail.com','12345678','1992-10-01','2015-11-20 13:27:32','2015-11-20 13:27:32'),(3,'Micah Chiang','Gilmore Girls','MC@gmail.com','12345678','1990-12-31','2015-11-20 13:50:43','2015-11-20 13:50:43'),(4,'Eduardo Baik','FINAL BOSS','ebaik@email.com','12345678','1987-04-02','2015-11-20 14:05:22','2015-11-20 14:05:22'),(5,'Tim Rowley','Timmy','timrow@gmail.com','12345678','1992-01-01','2015-11-20 14:06:41','2015-11-20 14:06:41'),(6,'Jess Peng','Jess','jess.peng@gmail.com','12345678','2121-12-21','2015-11-20 15:35:00','2015-11-20 15:35:00'),(7,'Matt','Cool guy','matt@cool.com','12345678','1312-12-31','2015-11-20 15:35:20','2015-11-20 15:35:20'),(8,'Davith','Damn','dsaf@gmail.com','12345678','2121-12-12','2015-11-20 15:36:07','2015-11-20 15:36:07'),(9,'Jason Chavez','Jason','jasonchavez520@gmail.com','12345678','3232-03-23','2015-11-20 15:36:29','2015-11-20 15:36:29'),(10,'Chris','christopher','c.wonggg@gmail.com','12345678','1992-04-03','2015-11-20 15:36:54','2015-11-20 15:36:54');
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

-- Dump completed on 2015-11-20 16:07:32
