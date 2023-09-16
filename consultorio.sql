-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para consultorio
CREATE DATABASE IF NOT EXISTS `consultorio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `consultorio`;

-- Volcando estructura para tabla consultorio.alta
CREATE TABLE IF NOT EXISTS `alta` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `edad` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombreadulto` varchar(50) DEFAULT NULL,
  `numeroadulto` varchar(50) DEFAULT NULL,
  `emailadulto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla consultorio.turno
CREATE TABLE IF NOT EXISTS `turno` (
  `id_turno` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `detalle` text,
  `zona` varchar(50) DEFAULT NULL,
  `fecha` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `tipo` int(1) NOT NULL,
  `dni` int(9) NOT NULL,
  PRIMARY KEY (`id_turno`),
  KEY `fk_dni` (`dni`),
  CONSTRAINT `fk_dni` FOREIGN KEY (`dni`) REFERENCES `alta` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
