-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: company
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.17-MariaDB-log

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_name` varchar(45) NOT NULL,
  `acc_password` varchar(45) NOT NULL,
  `acc_email` varchar(45) NOT NULL,
  `acc_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'khoa','admin','admin@mail',1),(2,'captain','admin','captain@gmail.com',0),(3,'jessie','admin','jess@wut',0);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `dep_phone` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `dep_address` varchar(90) DEFAULT NULL,
  `mng_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`dep_id`),
  KEY `fk_mng_emp_idx` (`mng_id`),
  CONSTRAINT `fk_mng_emp` FOREIGN KEY (`mng_id`) REFERENCES `employee` (`emp_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Marketing','23435234',NULL,6),(5,'Analysis','678678vnu','LA',2),(7,'Planning','72724268','Chicago',6),(8,'Human Resources','123456789','Canada',1),(9,'Finance',NULL,'Hanoi',NULL),(10,'Accounting',NULL,'Ho Chi Minh City',8);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(45) NOT NULL,
  `emp_photo` varchar(45) DEFAULT NULL,
  `emp_job` varchar(45) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_phone` varchar(45) DEFAULT NULL,
  `emp_email` varchar(45) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `fk_emp_dep_idx` (`dep_id`),
  CONSTRAINT `fk_emp_dep` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dep_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Nguyen Vinh Khoa',NULL,'CEO','1995-11-18','01689867135','khoa.uet58@gmail.com',8),(2,'Vu Minh Chinh',NULL,'Guard','1995-08-05','5895','chinhvm@gmail.com',7),(6,'Do Ngoc Hung',NULL,'Singer','1995-05-04','wreckit','hungdn_58@vnu.edu.vn',5),(8,'Nguyen Thi Trang',NULL,'Student','1970-01-01','09-33-168315','trangnt95@yahoo.com',7);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-09 15:02:22
