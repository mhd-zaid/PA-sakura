-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.38 - MySQL Community Server (GPL)
-- SE du serveur:                Linux
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour sakura
DROP DATABASE IF EXISTS `sakura`;
CREATE DATABASE IF NOT EXISTS `sakura` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sakura`;

-- Listage de la structure de table sakura. sakura_apparence
DROP TABLE IF EXISTS `sakura_apparence`;
CREATE TABLE IF NOT EXISTS `sakura_apparence` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Css` longtext NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table sakura. sakura_article
DROP TABLE IF EXISTS `sakura_article`;
CREATE TABLE IF NOT EXISTS `sakura_article` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` text,
  `Slug` varchar(50) DEFAULT NULL,
  `User_Id` int(11) NOT NULL,
  `Image_Name` varchar(50) NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '0',
  `Description` varchar(255) DEFAULT NULL,
  `Rewrite_Url` int(11) NOT NULL DEFAULT '1',
  `Title` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `Date_Created` datetime DEFAULT CURRENT_TIMESTAMP,
  `Date_Updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table sakura. sakura_category
DROP TABLE IF EXISTS `sakura_category`;
CREATE TABLE IF NOT EXISTS `sakura_category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table sakura. sakura_comment
DROP TABLE IF EXISTS `sakura_comment`;
CREATE TABLE IF NOT EXISTS `sakura_comment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL,
  `Comment_Post_Id` int(11) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre_signalement` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table sakura. sakura_menu
DROP TABLE IF EXISTS `sakura_menu`;
CREATE TABLE IF NOT EXISTS `sakura_menu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Content` varchar(500) NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '0',
  `Main` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table sakura. sakura_page
DROP TABLE IF EXISTS `sakura_page`;
CREATE TABLE IF NOT EXISTS `sakura_page` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text,
  `Active` tinyint(1) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Description` text,
  `Main` int(11) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Rewrite_Url` varchar(10) DEFAULT NULL,
  `Date_Created` datetime DEFAULT CURRENT_TIMESTAMP,
  `Date_Updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table sakura. sakura_site
DROP TABLE IF EXISTS `sakura_site`;
CREATE TABLE IF NOT EXISTS `sakura_site` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Logo` varchar(255) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Number` varchar(20) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table sakura. sakura_stats
DROP TABLE IF EXISTS `sakura_stats`;
CREATE TABLE IF NOT EXISTS `sakura_stats` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Session` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table sakura. sakura_user
DROP TABLE IF EXISTS `sakura_user`;
CREATE TABLE IF NOT EXISTS `sakura_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(25) DEFAULT NULL,
  `Lastname` varchar(70) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Status` tinyint(3) NOT NULL DEFAULT '0',
  `Role` tinyint(3) NOT NULL DEFAULT '1',
  `Token` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
