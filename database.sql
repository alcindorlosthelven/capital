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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.client: ~2 rows (approximately)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `id_institution`, `nom`, `prenom`, `telephone`, `email`) VALUES
	(3, 9, 'Alcindor', 'Losthelven', '50944558878', 'alcindorlos@gmail.com'),
	(4, 9, 'wilker', 'dorvelus', '50944555589', 'dwilker@gmail.com');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Dumping structure for table capital.compte_client
DROP TABLE IF EXISTS `compte_client`;
CREATE TABLE IF NOT EXISTS `compte_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `no` varchar(50) DEFAULT NULL,
  `pin` varchar(50) DEFAULT NULL,
  `sold` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_client` (`id_client`),
  CONSTRAINT `FK_compte_client_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.compte_client: ~2 rows (approximately)
DELETE FROM `compte_client`;
/*!40000 ALTER TABLE `compte_client` DISABLE KEYS */;
INSERT INTO `compte_client` (`id`, `id_client`, `no`, `pin`, `sold`) VALUES
	(1, 3, '001', '0023', '3000'),
	(2, 4, '9591-0000-0000-3639', '0000', '500');
/*!40000 ALTER TABLE `compte_client` ENABLE KEYS */;

-- Dumping structure for table capital.compte_institution
DROP TABLE IF EXISTS `compte_institution`;
CREATE TABLE IF NOT EXISTS `compte_institution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_institution` int(11) DEFAULT NULL,
  `no` varchar(50) DEFAULT NULL,
  `pin` varchar(50) DEFAULT NULL,
  `sold` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_compte_institution_institution` (`id_institution`),
  CONSTRAINT `FK_compte_institution_institution` FOREIGN KEY (`id_institution`) REFERENCES `institution` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.compte_institution: ~0 rows (approximately)
DELETE FROM `compte_institution`;
/*!40000 ALTER TABLE `compte_institution` DISABLE KEYS */;
INSERT INTO `compte_institution` (`id`, `id_institution`, `no`, `pin`, `sold`) VALUES
	(2, 9, '5433-0000-0000-1266', '1234', '50000');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.institution: ~1 rows (approximately)
DELETE FROM `institution`;
/*!40000 ALTER TABLE `institution` DISABLE KEYS */;
INSERT INTO `institution` (`id`, `nom`, `addresse`, `telephone`, `email`) VALUES
	(9, 'SolutionIp', 'delmas 45', '50944558899', 'solution@gmail.com');
/*!40000 ALTER TABLE `institution` ENABLE KEYS */;

-- Dumping structure for table capital.station
DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `addresse` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.station: ~2 rows (approximately)
DELETE FROM `station`;
/*!40000 ALTER TABLE `station` DISABLE KEYS */;
INSERT INTO `station` (`id`, `nom`, `addresse`, `longitude`, `latitude`) VALUES
	(1, 'lalue2', 'lalue #5', '-72.3223211', '18.5401712'),
	(3, 'fontamara 27', 'rue bourgolie #10', '-72.32239075726173', '18.540024123567278');
/*!40000 ALTER TABLE `station` ENABLE KEYS */;

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
  `id_station` varchar(1000) DEFAULT 'n/a',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `pseudo` (`pseudo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.utilisateur: ~0 rows (approximately)
DELETE FROM `utilisateur`;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `role`, `nom`, `prenom`, `motdepasse`, `active`, `statut`, `telephone`, `photo`, `id_session`, `id_station`) VALUES
	(1, 'admin', 'admin@gmail.com', 'administrateur', 'alcindor', 'losthelven', 'b800f865eaa00709b1e37fbbcb0c985d4a775438', 'oui', '1', '50937391567', NULL, '7d36b9c4754ed76838286da20c0218a3', 'n/a'),
	(2, 'dwilker', 'dwilker@gmail.com', 'agent', 'dorverlus', 'wilker', '011c945f30ce2cbafc452f39840f025693339c42', 'oui', '1', '50944556658', NULL, '684bc875d7daae47df3178ac323c56ec', '3');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

-- Dumping structure for table capital.vente
DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_institution` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_compte` int(11) DEFAULT NULL,
  `id_station` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` varchar(50) DEFAULT NULL,
  `montant` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vente_institution` (`id_institution`),
  KEY `FK_vente_client` (`id_client`),
  KEY `FK_vente_compte_client` (`id_compte`),
  KEY `FK_vente_station` (`id_station`),
  CONSTRAINT `FK_vente_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vente_compte_client` FOREIGN KEY (`id_compte`) REFERENCES `compte_client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vente_institution` FOREIGN KEY (`id_institution`) REFERENCES `institution` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vente_station` FOREIGN KEY (`id_station`) REFERENCES `station` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table capital.vente: ~2 rows (approximately)
DELETE FROM `vente`;
/*!40000 ALTER TABLE `vente` DISABLE KEYS */;
INSERT INTO `vente` (`id`, `id_institution`, `id_client`, `id_compte`, `id_station`, `date`, `heure`, `montant`) VALUES
	(1, 9, 3, 1, 1, '2020-09-07', '12:21:13', '500'),
	(2, 9, 3, 1, 1, '2020-09-07', '12:21:48', '100000'),
	(3, 9, 3, 1, 3, '2020-09-07', '01:36:35', '2000');
/*!40000 ALTER TABLE `vente` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
