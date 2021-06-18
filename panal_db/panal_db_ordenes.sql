-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: panal_db
-- ------------------------------------------------------
-- Server version	8.0.25

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

--
-- Table structure for table `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordenes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `cantidad` int NOT NULL,
  `precio` int NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30784 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes`
--

LOCK TABLES `ordenes` WRITE;
/*!40000 ALTER TABLE `ordenes` DISABLE KEYS */;
INSERT INTO `ordenes` VALUES (30713,'Torta',3,165,''),(30714,'Taco',2,40,''),(30715,'Torta',2,110,''),(30716,'Taco',3,60,''),(30717,'Tacos Dorados',2,80,''),(30718,'Gordita',2,60,''),(30719,'Torta',4,220,''),(30720,'Taco',3,60,''),(30721,'Tacos Dorados',4,160,''),(30722,'Torta',3,165,''),(30723,'Taco',2,40,''),(30724,'Tacos Dorados',2,80,''),(30725,'Torta',2,110,''),(30726,'Taco',3,60,''),(30727,'Torta',2,110,''),(30728,'Taco',1,20,''),(30729,'Torta',1,55,''),(30730,'Taco',1,20,''),(30731,'Tacos Dorados',1,40,''),(30732,'Torta',3,165,''),(30733,'Tacos Dorados',2,80,''),(30734,'Taco',1,20,''),(30735,'Torta',3,165,''),(30736,'Taco',2,40,''),(30737,'Gordita',2,60,''),(30738,'Tacos Dorados',3,120,''),(30739,'Michelada',1,39,''),(30740,'Torta',1,55,''),(30741,'Taco',1,20,''),(30742,'Michelada',1,39,''),(30743,'Tacos Dorados',7,280,''),(30744,'Michelada',1,39,''),(30745,'Torta',5,275,''),(30746,'Taco',2,40,''),(30747,'Tacos Dorados',5,200,''),(30748,'Tortas Ahogadas',1,55,''),(30749,'Tortas Ahogadas',1,55,''),(30750,'PromocionPRUEBA',1,120,''),(30751,'PromocionPrueba2',1,100,''),(30752,'PromocionPrueba3',1,120,''),(30753,'PromocionPrueba2',1,100,''),(30754,'PromocionPrueba3',1,120,''),(30755,'Tortas Ahogadas',1,55,'admin'),(30756,'Tacos',2,40,'admin'),(30757,'Tortas Ahogadas',3,165,'admin'),(30758,'Tacos',3,60,'admin'),(30759,'Tacos Dorados',4,160,'admin'),(30760,'Tacos Dorados',4,160,'john@panal.com'),(30761,'Gorditas',2,60,'john@panal.com'),(30762,'Enchiladas',4,220,'john@panal.com'),(30763,'Chilaquiles',2,200,'john@panal.com'),(30764,'Tortas Ahogadas',2,110,'user'),(30765,'Michelada',3,117,'user'),(30766,'PromocionPRUEBA',1,120,'admin'),(30767,'PromocionPrueba2',1,100,'admin'),(30768,'PromocionPrueba3',1,120,'admin'),(30769,'PromocionPRUEBA',1,120,'admin'),(30770,'Gorditas',3,90,'user'),(30771,'Tacos',5,100,'user'),(30772,'PromocionPrueba3',2,240,'user'),(30773,'Tortas Ahogadas',1,55,'admin'),(30774,'Tacos Dorados',1,40,'admin'),(30775,'Hamburguesa',1,55,'admin'),(30776,'Papas fritas',1,30,'admin'),(30777,'Promo4',1,150,'admin'),(30778,'Hamburguesa',1,55,''),(30779,'Hotdog',4,120,'user'),(30780,'Papas fritas',4,120,'user'),(30781,'Michelada',3,117,'user'),(30782,'PromoPrueba5',1,1000,'user'),(30783,'PromocionPrueba7',1,100,'prueba@prueba.com');
/*!40000 ALTER TABLE `ordenes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-17 19:04:47
