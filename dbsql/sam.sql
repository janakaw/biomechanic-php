CREATE DATABASE  IF NOT EXISTS `swimming_biomechanics` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `swimming_biomechanics`;
-- MySQL dump 10.13  Distrib 5.1.40, for Win32 (ia32)
--
-- Host: localhost    Database: sw_bio_db
-- ------------------------------------------------------
-- Server version	5.1.41

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
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAGE_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_chapter_page1` (`PAGE_ID`),
  CONSTRAINT `fk_chapter_page1` FOREIGN KEY (`PAGE_ID`) REFERENCES `page` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapter`
--

-- LOCK TABLES `chapter` WRITE;
/*!40000 ALTER TABLE `chapter` DISABLE KEYS */;
-- INSERT INTO `chapter` VALUES (34,14,'Test chapter 1',1),(35,16,'test chapter 2',1),(36,17,'qqqq',1);
/*!40000 ALTER TABLE `chapter` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `ID` int(11) NOT NULL auto_increment,
  `NAME` varchar(45) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`ID`, `NAME`) VALUES
(1, 'super_admin'),
(2, 'admin'),
(3, 'user');

--
-- Dumping data for table `user_role`
--

-- LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  `SUBSCRIPTION_LENGTH` int(11) NOT NULL,
  `PRICE` decimal(11,0) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

-- LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
-- INSERT INTO `module` VALUES (34,'Test Module','1 year from payment',0,1,'100'),(35,'test module 2','Option two',0,1,'22'),(36,'qqq','1 year from payment',0,1,'23');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `view_audit`
--

DROP TABLE IF EXISTS `view_audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `view_audit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `VIDEO_ID` int(11) NOT NULL,
  `DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_view_audit_user1` (`USER_ID`),
  KEY `fk_view_audit_video1` (`VIDEO_ID`),
  CONSTRAINT `fk_view_audit_user1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_view_audit_video1` FOREIGN KEY (`VIDEO_ID`) REFERENCES `video` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `view_audit`
--

-- LOCK TABLES `view_audit` WRITE;
/*!40000 ALTER TABLE `view_audit` DISABLE KEYS */;
/*!40000 ALTER TABLE `view_audit` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `DURATION` DECIMAL(5,0) NOT NULL DEFAULT 0,
  `SIZE` INT(50) NOT NULL DEFAULT 0,
  `FILE_NAME` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

-- LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
-- INSERT INTO `video` VALUES (28,'aaa',NULL),(29,'dfsdfds',NULL);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ROLE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(45) DEFAULT NULL,
  `LAST_NAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_user_user_role` (`USER_ROLE_ID`),
  CONSTRAINT `fk_user_user_role` FOREIGN KEY (`USER_ROLE_ID`) REFERENCES `user_role` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL auto_increment,
  `USER_ROLE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(45) default NULL,
  `LAST_NAME` varchar(100) default NULL,
  `EMAIL` varchar(150) default NULL,
  `PASSWORD` varchar(100) default NULL,
  PRIMARY KEY  (`ID`),
  KEY `fk_user_user_role` (`USER_ROLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

-- LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CHAPTER_ID` int(11) NOT NULL,
  `VIDEO_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `IS_FREE` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_lesson_chapter1` (`CHAPTER_ID`),
  KEY `fk_lesson_video1` (`VIDEO_ID`),
  CONSTRAINT `fk_lesson_chapter1` FOREIGN KEY (`CHAPTER_ID`) REFERENCES `chapter` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lesson_video1` FOREIGN KEY (`VIDEO_ID`) REFERENCES `video` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

-- LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
-- INSERT INTO `lesson` VALUES (3,34,28,'Lesson 1',1,0),(4,35,29,'test lesson 2',1,1),(5,36,29,'qqqq',1,0);
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PAYMENT_ID` int(11) NOT NULL,
  `MODULE_ID` int(11) NOT NULL,
  `DATE` datetime NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  `DUE_DATE` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_subscription_user1` (`USER_ID`),
  KEY `fk_subscription_payment1` (`PAYMENT_ID`),
  KEY `fk_subscription_module1` (`MODULE_ID`),
  CONSTRAINT `fk_subscription_user1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subscription_payment1` FOREIGN KEY (`PAYMENT_ID`) REFERENCES `payment` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subscription_module1` FOREIGN KEY (`MODULE_ID`) REFERENCES `module` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

-- LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE IF NOT EXISTS `payment` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `TXNID` varchar(20) NOT NULL,
  `PAYMENT_AMOUNT` decimal(7,2) NOT NULL,
  `PAYMENT_STATUS` varchar(25) NOT NULL,
  `ITEMID` varchar(25) NOT NULL,
  `CREATEDTIME` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

-- LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODULE_ID` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_page_module1` (`MODULE_ID`),
  CONSTRAINT `fk_page_module1` FOREIGN KEY (`MODULE_ID`) REFERENCES `module` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

-- LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
-- INSERT INTO `page` VALUES (13,34,'test page asd',1),(14,34,'test page 2',1),(15,34,'asd',1),(16,35,'test page 2',1),(17,36,'qqqq',1);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
-- UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-26 23:01:57
ALTER TABLE `user` ADD `CREATED_DATE` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `PASSWORD` ;

 ALTER TABLE `user` ADD UNIQUE (
`EMAIL`
); 

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USER_ROLE_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 1, 'Admin', NULL, 'admin@swb.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_role` FOREIGN KEY (`USER_ROLE_ID`) REFERENCES `user_role` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

