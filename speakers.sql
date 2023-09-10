-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mastersounds2
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `speakers`
--

DROP TABLE IF EXISTS `speakers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `speakers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position2` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `button_name1` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `button_name2` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `button_link1` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `button_link2` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `speakers`
--

LOCK TABLES `speakers` WRITE;
/*!40000 ALTER TABLE `speakers` DISABLE KEYS */;
INSERT INTO `speakers` VALUES (1,'https://master-sounds.com/images/speaker1.png','https://master-sounds.com/images/pe.png','Jaime Sotomayor','Director Ejecutivo en SHIFT Perú','Diretor Executivo na SHIFT Peru','Ver más','Saiba mais','#','#',1,'2023-07-26 23:16:55','2023-07-26 23:19:58'),(2,'https://master-sounds.com/images/speaker2.png','https://master-sounds.com/images/co.png','Ana María Quintero','Data & Decision Scientist en Neural Design','Data & Decision Scientist na Neural Design','Ver más','Saiba mais','#','#',2,'2023-07-26 23:16:55','2023-07-26 23:19:58'),(3,'https://master-sounds.com/images/speaker3.png','https://master-sounds.com/images/mx.png','Jose Antonio Lanzguerrero','General Manager en Yupio, Especialista en Asistentes Virtuales e IA','Gerente geral na Yupio, Especialista em Assistentes Virtuais e IA','Ver más','Saiba mais','#','#',3,'2023-07-26 23:16:55','2023-07-26 23:32:53'),(4,'https://master-sounds.com/images/speaker4.png','https://master-sounds.com/images/pe.png','Nicolás Valcarcel','Security Lead en NextRoll, Inc.','Líder de segurança na NextRoll, Inc.','Ver más','Saiba mais','#','#',4,'2023-07-26 23:16:55','2023-07-26 23:19:58'),(5,'https://master-sounds.com/images/speaker5.png','https://master-sounds.com/images/co.png','Camila Navarro','CEO y fundadora de Milatech','CEO e fundador da Milatech','Ver más','Saiba mais','#','#',5,'2023-07-26 23:16:55','2023-07-26 23:19:58');
/*!40000 ALTER TABLE `speakers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-26 19:28:39
