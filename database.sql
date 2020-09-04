-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table capital.client
DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_institution` int(11) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_client_institution` (`id_institution`),
  CONSTRAINT `FK_client_institution` FOREIGN KEY (`id_institution`) REFERENCES `institution` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.client: ~2 rows (approximately)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `id_institution`, `nom`, `prenom`, `telephone`, `email`) VALUES
	(1, 3, 'dorvelus', 'wilker', '50944778857', 'dwilker@gmail.com'),
	(2, 5, 'malouna', 'jesmin', '50944552565', 'jesmin@gmail.com');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Dumping structure for table capital.compte_institution
DROP TABLE IF EXISTS `compte_institution`;
CREATE TABLE IF NOT EXISTS `compte_institution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_institution` int(11) DEFAULT NULL,
  `sold` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_compte_institution_institution` (`id_institution`),
  CONSTRAINT `FK_compte_institution_institution` FOREIGN KEY (`id_institution`) REFERENCES `institution` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table capital.compte_institution: ~0 rows (approximately)
DELETE FROM `compte_institution`;
/*!40000 ALTER TABLE `compte_institution` DISABLE KEYS */;
/*!40000 ALTER TABLE `compte_institution` ENABLE KEYS */;

-- Dumping structure for table capital.configuration
DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `valeur` text DEFAULT NULL,
  `categorie` enum('image','text','video','non_modifiable') DEFAULT 'image',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `nom` (`nom`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.configuration: 6 rows
DELETE FROM `configuration`;
/*!40000 ALTER TABLE `configuration` DISABLE KEYS */;
INSERT INTO `configuration` (`id`, `nom`, `valeur`, `categorie`) VALUES
	(1, 'licence_email', 'los-framework@gmail.com', 'non_modifiable'),
	(2, 'licence_code', '53-240-936-26', 'non_modifiable'),
	(3, 'licence_url', 'http://licence-serveur-sge.bioshaiti.com/licence-serveur-sge', 'text'),
	(4, 'logo', 'app/DefaultApp/public/image/logo.png', 'image'),
	(5, 'background', 'app/DefaultApp/public/image/bc.jpg', 'image'),
	(6, 'transparence', '80', 'text');
/*!40000 ALTER TABLE `configuration` ENABLE KEYS */;

-- Dumping structure for table capital.institution
DROP TABLE IF EXISTS `institution`;
CREATE TABLE IF NOT EXISTS `institution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `addresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.institution: ~2 rows (approximately)
DELETE FROM `institution`;
/*!40000 ALTER TABLE `institution` DISABLE KEYS */;
INSERT INTO `institution` (`id`, `nom`, `addresse`, `telephone`, `email`) VALUES
	(3, 'solutionip', 'delmas 43', '50944558878', 's@gmail.com'),
	(5, 'chsm', 'lalue #5', '50944554484', 'lkjdj@gmail.com');
/*!40000 ALTER TABLE `institution` ENABLE KEYS */;

-- Dumping structure for table capital.utilisateur
DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `motdepasse` text DEFAULT NULL,
  `active` enum('oui','non') DEFAULT NULL,
  `statut` enum('1','0') DEFAULT '0',
  `telephone` varchar(50) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `id_session` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `pseudo` (`pseudo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.utilisateur: ~1 rows (approximately)
DELETE FROM `utilisateur`;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `role`, `nom`, `prenom`, `motdepasse`, `active`, `statut`, `telephone`, `photo`, `id_session`) VALUES
	(1, 'admin', 'admin@gmail.com', 'administrateur', 'alcindor', 'losthelven', 'b800f865eaa00709b1e37fbbcb0c985d4a775438', 'oui', '1', '50937391567', NULL, 'fdf9672707cba1da7dbd3e64e9c351e3');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
