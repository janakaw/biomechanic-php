-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2014 at 03:24 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swimming_biomechanics`
--
CREATE DATABASE IF NOT EXISTS `swimming_biomechanics` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `swimming_biomechanics`;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE IF NOT EXISTS `chapter` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAGE_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_chapter_page1` (`PAGE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`ID`, `PAGE_ID`, `NAME`, `STATUS`) VALUES
(37, 18, 'Introduction', 1),
(38, 18, 'Body position & Streamlining', 1),
(39, 18, 'Arm Recovery', 1),
(40, 18, 'The Hand Entry', 1),
(41, 18, 'The â€œArm Extensionâ€', 1),
(42, 18, 'â€œBody Rollâ€', 1),
(43, 18, 'The â€œCatchâ€', 1),
(44, 18, 'The â€œUnderwater Pullâ€', 1),
(45, 18, 'The â€œFollow-throughâ€', 1),
(46, 18, 'The Flutter Kick', 1),
(47, 18, 'Breathing in the Freestyle', 1),
(48, 18, 'Biomechanics of the Shoulder in Freestyle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CHAPTER_ID` int(11) NOT NULL,
  `VIDEO_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `IS_FREE` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_lesson_chapter1` (`CHAPTER_ID`),
  KEY `fk_lesson_video1` (`VIDEO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`ID`, `CHAPTER_ID`, `VIDEO_ID`, `NAME`, `IS_FREE`, `STATUS`) VALUES
(6, 37, 30, 'Overview of the Freestyle', 1, 1),
(7, 38, 30, 'Ideal Body Position', 1, 1),
(8, 38, 30, 'Factors influencing Body Position', 1, 1),
(9, 38, 30, 'Streamlining and Body Orientation', 1, 1),
(10, 38, 30, 'Common Defects associated with Body Position and Streamlining', 1, 1),
(11, 39, 30, 'Factors influencing the â€œHigh Elbowâ€ Recovery', 0, 1),
(12, 39, 30, 'The â€œStraight Armâ€ Recovery', 0, 1),
(13, 39, 30, 'Common Defects in the Arm Recovery', 0, 1),
(14, 39, 30, '- Anatomical Considerations', 0, 1),
(15, 39, 30, '- Biomechanical Considerations', 0, 1),
(16, 40, 30, 'Hand Position as viewed from a Frontal or Head-On View', 0, 1),
(17, 40, 30, 'Hand Position as viewed from a Lateral or Sideways View', 0, 1),
(18, 40, 30, 'Common Defects in the Hand Entry', 0, 1),
(19, 40, 30, '- Frontal View', 0, 1),
(20, 40, 30, '- Lateral View', 0, 1),
(21, 41, 30, 'Frontal or Head-On View of â€œArm Extensionâ€', 0, 1),
(22, 41, 30, 'Lateral or Sideways View of â€œArm Extensionâ€', 0, 1),
(23, 41, 30, 'Common Defects associated with â€œArm Extensionâ€', 0, 1),
(24, 42, 30, 'Body Roll as an integral part of the Freestyle', 0, 1),
(25, 42, 30, 'The effects of â€œconsciousâ€ Body Roll', 0, 1),
(26, 43, 30, 'The need for an â€œEarly Vertical Forearmâ€', 1, 1),
(27, 43, 30, 'Lateral or Sideways View of the â€œCatchâ€', 1, 1),
(28, 43, 30, 'Front-Quadrant Swimming', 0, 1),
(29, 43, 30, 'Common Defects associated with the â€œCatchâ€', 0, 1),
(30, 43, 30, 'The â€œCatch-Upâ€ stroke', 0, 1),
(31, 44, 30, 'Optimum elbow angles', 0, 1),
(32, 44, 30, 'Lateral View', 0, 1),
(33, 44, 30, 'Wrist and Hand Positions', 0, 1),
(34, 44, 30, 'Common Defects associated with the â€œUnderwater Pullâ€', 0, 1),
(35, 44, 30, '- The infamous â€œS Pullâ€', 0, 1),
(36, 44, 30, '- The Dropped Elbow and Dropped Wrist', 0, 1),
(37, 45, 30, 'The transition of the Arm and Hand at the conclusion of the Pull', 0, 1),
(38, 45, 30, 'Common Defects associated with the â€œFollow-throughâ€', 0, 1),
(39, 46, 30, 'The Anatomy and Biomechanics of the Flutter-Kick', 0, 1),
(40, 46, 30, 'Commonly used patterns of the Flutter-Kick', 0, 1),
(41, 46, 30, '- The â€œsix-beatâ€', 0, 1),
(42, 46, 30, '- The â€œthree-oneâ€', 0, 1),
(43, 46, 30, '- The â€œtwo-beat crossover', 0, 1),
(44, 46, 30, '- The â€œstraight two beatâ€', 0, 1),
(45, 46, 30, 'Common Defects associated with the Flutter Kick', 0, 1),
(46, 47, 30, 'Anatomical Considerations', 0, 1),
(47, 47, 30, 'The Timing of Exhalation & Inhalation', 0, 1),
(48, 47, 30, 'Bilateral Breathing in the Freestyle', 0, 1),
(49, 47, 30, 'Common Defects in Freestyle Breathing', 0, 1),
(50, 48, 30, 'The importance of â€œScapulo-Humeral Rhythm', 1, 1),
(51, 48, 30, 'Loads on the Shoulder', 0, 1),
(52, 48, 30, 'Reducing the risk of â€œSwimmerâ€™s Shoulderâ€', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  `SUBSCRIPTION_LENGTH` int(11) NOT NULL,
  `PRICE` decimal(11,0) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`ID`, `NAME`, `TYPE`, `STATUS`, `SUBSCRIPTION_LENGTH`, `PRICE`) VALUES
(37, 'Freestyle Biomechanics', '1 year from payment', 0, 1, '10');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODULE_ID` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_page_module1` (`MODULE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`ID`, `MODULE_ID`, `NAME`, `STATUS`) VALUES
(18, 37, 'Freestyle Biomechanics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TR_REQUEST` varchar(200) DEFAULT NULL,
  `TR_RESPONSE` varchar(200) NOT NULL,
  `DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
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
  KEY `fk_subscription_module1` (`MODULE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ROLE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(45) DEFAULT NULL,
  `LAST_NAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `CREATED_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  KEY `fk_user_user_role` (`USER_ROLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USER_ROLE_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `CREATED_DATE`) VALUES
(1, 1, 'Admin', NULL, 'admin@swb.com', 'e10adc3949ba59abbe56e057f20f883e', '2014-02-02 13:43:47'),
(2, 3, 'Upul', 'Abayagunawardhana', 'upuliroshan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2014-02-02 13:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`ID`, `NAME`) VALUES
(1, 'super_admin'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `DURATION` decimal(5,0) NOT NULL DEFAULT '0',
  `SIZE` int(50) NOT NULL DEFAULT '0',
  `FILE_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`ID`, `TITLE`, `DURATION`, `SIZE`, `FILE_NAME`) VALUES
(30, 'Test', '50', 5, 'Test.flv');

-- --------------------------------------------------------

--
-- Table structure for table `view_audit`
--

CREATE TABLE IF NOT EXISTS `view_audit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `VIDEO_ID` int(11) NOT NULL,
  `DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_view_audit_user1` (`USER_ID`),
  KEY `fk_view_audit_video1` (`VIDEO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `fk_chapter_page1` FOREIGN KEY (`PAGE_ID`) REFERENCES `page` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `fk_lesson_chapter1` FOREIGN KEY (`CHAPTER_ID`) REFERENCES `chapter` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lesson_video1` FOREIGN KEY (`VIDEO_ID`) REFERENCES `video` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `fk_page_module1` FOREIGN KEY (`MODULE_ID`) REFERENCES `module` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `fk_subscription_module1` FOREIGN KEY (`MODULE_ID`) REFERENCES `module` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subscription_payment1` FOREIGN KEY (`PAYMENT_ID`) REFERENCES `payment` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subscription_user1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_role` FOREIGN KEY (`USER_ROLE_ID`) REFERENCES `user_role` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `view_audit`
--
ALTER TABLE `view_audit`
  ADD CONSTRAINT `fk_view_audit_user1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_view_audit_video1` FOREIGN KEY (`VIDEO_ID`) REFERENCES `video` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE payment ADD COLUMN `TXNID` varchar( 20 ) NOT NULL ,
ADD COLUMN `PAYMENT_AMOUNT` decimal( 7, 2 ) NOT NULL ,
ADD COLUMN `PAYMENT_STATUS` varchar( 25 ) NOT NULL ,
ADD COLUMN `ITEMID` varchar( 25 ) NOT NULL ,
ADD COLUMN `CREATEDTIME` datetime NOT NULL ;

ALTER TABLE `payment`
  DROP `TR_REQUEST`,
  DROP `TR_RESPONSE`;
  
ALTER TABLE `payment`
  DROP `DATE`;
  
ALTER TABLE `payment` CHANGE `ID` `ID` INT( 6 ) NOT NULL AUTO_INCREMENT ;
