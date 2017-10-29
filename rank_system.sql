-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: codingz.xyz    Database: rank_system
-- ------------------------------------------------------
-- Server version	5.5.55-0+deb8u1

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
-- Table structure for table `datalog`
--

DROP TABLE IF EXISTS `datalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT 'unknown',
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `mutation` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datalog`
--

LOCK TABLES `datalog` WRITE;
/*!40000 ALTER TABLE `datalog` DISABLE KEYS */;
INSERT INTO `datalog` VALUES (174,'weekly',22,'2016-03-21',0,15),(175,'weekly',22,'2016-03-28',0,20),(177,'weekly',22,'2016-04-04',0,25),(178,'weekly',22,'2016-04-11',0,30),(179,'weekly',22,'2016-04-18',0,35),(180,'weekly',22,'2016-04-25',0,40),(181,'weekly',22,'2016-05-02',0,45),(182,'weekly',22,'2016-05-09',0,50),(183,'weekly',22,'2016-05-16',0,55),(188,'weekly',21,'2016-03-21',0,820),(191,'weekly',17,'2016-03-28',0,500),(192,'weekly',20,'2016-03-28',0,700),(194,'weekly',21,'2016-03-28',0,820),(196,'weekly',13,'2016-03-28',0,167),(197,'weekly',19,'2016-03-28',0,0),(199,'weekly',12,'2016-03-28',0,67),(202,'weekly',23,'2016-03-07',0,0),(206,'weekly',27,'2016-03-21',0,0),(210,'weekly',23,'2017-07-03',0,0),(213,'monthly',23,'2017-07-09',0,335),(216,'weekly',27,'2017-07-03',0,554),(229,'weekly',32,'2017-07-03',0,3),(234,'weekly',25,'2017-07-10',0,3),(235,'weekly',35,'2017-07-10',0,3),(236,'weekly',30,'2017-07-10',0,3),(237,'weekly',37,'2017-07-10',0,3),(238,'weekly',40,'2017-07-10',0,3),(239,'weekly',44,'2017-07-10',0,3),(241,'weekly',38,'2017-07-10',0,3),(242,'weekly',23,'2017-07-10',0,3),(245,'weekly',32,'2017-07-10',0,6),(246,'weekly',42,'2017-07-10',0,3),(247,'weekly',29,'2017-07-10',0,3),(248,'weekly',47,'2017-07-10',0,3),(249,'weekly',26,'2017-07-10',0,3),(250,'weekly',48,'2017-07-10',0,3);
/*!40000 ALTER TABLE `datalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dep`
--

DROP TABLE IF EXISTS `dep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dep` (
  `level` int(11) NOT NULL,
  `depname` varchar(255) NOT NULL,
  `abbr` varchar(255) NOT NULL,
  `monthly` int(11) NOT NULL,
  `weekly` int(11) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dep`
--

LOCK TABLES `dep` WRITE;
/*!40000 ALTER TABLE `dep` DISABLE KEYS */;
INSERT INTO `dep` VALUES (0,'None','None',0,0),(1,'S-1 Personnel','S-1',7,0),(2,'S-2 Public Relations','S-2',5,0),(3,'S-3 Training','S-3 T',7,0),(4,'S-3 Operations	','S-3 O',10,0),(5,'S-4 Technical			','S-4 TECH',5,0),(6,'Unit Chief of Staff','COS',5,0);
/*!40000 ALTER TABLE `dep` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ranks` (
  `level` int(11) NOT NULL,
  `rankname` varchar(255) NOT NULL,
  `req` int(11) NOT NULL,
  `reqtiq` int(11) NOT NULL DEFAULT '0',
  `abbr` varchar(255) NOT NULL,
  `weekly` int(11) NOT NULL,
  PRIMARY KEY (`level`),
  UNIQUE KEY `level_2` (`level`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
INSERT INTO `ranks` VALUES (0,'Recruit',0,0,'RCT',0),(1,'Private 1',0,0,'PV1',0),(2,'Private 2',30,25,'PV2',0),(3,'Private First Class',60,50,'PFC',0),(4,'Specialist',0,0,'SPC',0),(5,'Corporal',90,60,'CPL',0),(6,'Sergeant',60,50,'SGT',0),(7,'Staff Sergeant',60,50,'SSG',0),(8,'Sergeant First Class',90,50,'SFC',0),(9,'Master Sergeant ',120,75,'MSG',0),(10,'Sergeant Major',0,0,'SGM',0),(11,'Command Sergeant Major',0,0,'CSM',0),(12,'Warrant Officer 1',0,0,'WO1',0),(13,' Chief Warrant Officer 2',0,30,'CW2',0),(14,' Chief Warrant Officer 3',0,45,'CW3',0),(15,' Chief Warrant Officer 4',0,45,'CW4',0),(16,' Chief Warrant Officer 5',0,45,'CW5',0),(17,'Second Lieutenant',90,50,'2LT',0),(18,'First Lieutenant',120,50,'1LT',0),(19,'Captain',120,50,'CPT',0),(20,'Major',33,60,'MAJ',0);
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `level` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `abbr` varchar(255) NOT NULL,
  `monthly` int(11) NOT NULL,
  `weekly` int(11) NOT NULL,
  UNIQUE KEY `level` (`level`,`rolename`,`abbr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (0,'None','None',0,0),(1,'Company HQ','COMP HQ ',10,0),(2,'Company CO','C CO',8,0),(3,'Platoon HQ','PLT HQ',7,0),(4,'Team Leaders / Vehicle Cmdrs','TL/VC',2,0),(5,'Squad Leaders','SQL',4,0);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `joined` date NOT NULL,
  `tig` date NOT NULL,
  `points` int(11) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `role` int(11) DEFAULT '0',
  `dep` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (23,'Marshall','2017-06-25','2017-06-25',3,'6',5,6),(25,'Wess','2017-07-09','2017-07-09',3,'2',0,1),(26,'Olmo','2017-07-01','2017-07-05',3,'4',0,4),(27,'Jonas','2017-07-01','2017-07-05',0,'5',4,3),(29,'Niels','2017-07-02','2017-07-06',3,'2',0,0),(30,'Roy','2017-07-01','2017-07-09',3,'2',0,0),(31,'S. Bakker','2017-07-09','2017-07-09',0,'1',0,0),(32,'Forman','2017-06-25','2017-06-25',6,'17',3,6),(33,'Tessa','2017-06-26','2017-07-05',0,'4',0,0),(35,'Sander','2017-07-09','2017-07-10',3,'2',0,0),(36,'Tiger','2017-07-02','2017-07-09',0,'2',0,0),(37,'Beni','2017-07-09','2017-07-09',3,'2',0,0),(39,'Arno','2017-07-09','2017-07-09',0,'2',0,0),(40,'Sar','2017-07-09','2017-07-09',3,'2',0,2),(41,'Pascal','2017-07-09','2017-07-09',0,'13',0,5),(42,'Thom','2017-07-09','2017-07-09',3,'1',0,0),(43,'Dion','2017-07-09','2017-07-09',0,'1',0,0),(44,'Marco','2017-07-09','2017-07-09',3,'2',0,0),(45,'Brook','2017-07-09','2017-07-09',0,'1',0,0),(47,'Danny','2017-07-12','2017-07-12',3,'5',4,3),(48,'Toonen','2017-07-04','2017-07-04',3,'2',0,2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_ranksystem`
--

DROP TABLE IF EXISTS `users_ranksystem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_ranksystem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_ranksystem`
--

LOCK TABLES `users_ranksystem` WRITE;
/*!40000 ALTER TABLE `users_ranksystem` DISABLE KEYS */;
INSERT INTO `users_ranksystem` VALUES (1,'tester','$2y$10$KBYeQ2weo1bAYoiOlLv5yeaMFkiytGU017fvgqB6nwnIyOtVgjXA2'),(2,'devilsbrigaderanks','$2a$06$AR2uvsedTJ5lQWbeQdqJHed1F2WvK35ztsUdWulhG9Z9WuIu143Sq');
/*!40000 ALTER TABLE `users_ranksystem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-15 20:00:41
