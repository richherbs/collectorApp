# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: bikeCollectorApp
# Generation Time: 2020-03-24 09:41:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bikes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bikes`;

CREATE TABLE `bikes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_ID` int(11) NOT NULL,
  `model` varchar(30) NOT NULL DEFAULT '',
  `discipline_ID` int(11) NOT NULL,
  `wheelSize_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `bikes` WRITE;
/*!40000 ALTER TABLE `bikes` DISABLE KEYS */;

INSERT INTO `bikes` (`id`, `brand_ID`, `model`, `discipline_ID`, `wheelSize_ID`)
VALUES
	(1,1,'sb130',1,1);

/*!40000 ALTER TABLE `bikes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table brand
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;

INSERT INTO `brand` (`id`, `brand_name`)
VALUES
	(1,'Yeti');

/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table discipline
# ------------------------------------------------------------

DROP TABLE IF EXISTS `discipline`;

CREATE TABLE `discipline` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `discipline_name` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `discipline` WRITE;
/*!40000 ALTER TABLE `discipline` DISABLE KEYS */;

INSERT INTO `discipline` (`id`, `discipline_name`)
VALUES
	(1,'trail');

/*!40000 ALTER TABLE `discipline` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table wheelSize
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wheelSize`;

CREATE TABLE `wheelSize` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wheel_diameter` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `wheelSize` WRITE;
/*!40000 ALTER TABLE `wheelSize` DISABLE KEYS */;

INSERT INTO `wheelSize` (`id`, `wheel_diameter`)
VALUES
	(1,29);

/*!40000 ALTER TABLE `wheelSize` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
