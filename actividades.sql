-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para actividades_db
DROP DATABASE IF EXISTS `actividades_db`;
CREATE DATABASE IF NOT EXISTS `actividades_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `actividades_db`;

-- Volcando estructura para tabla actividades_db.actividades
DROP TABLE IF EXISTS `actividades`;
CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla',
  `titulo` varchar(64) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'titulo actividad',
  `descripcion` text COLLATE utf8_spanish_ci COMMENT 'descripcion de la actividad',
  `fecha_inicial` datetime DEFAULT NULL COMMENT 'fecha_inicio',
  `fecha_final` datetime DEFAULT NULL COMMENT 'fecha_fin',
  `precio` decimal(20,2) DEFAULT '0.00' COMMENT 'precio',
  `popularidad` int(3) DEFAULT '0' COMMENT 'popularidad de la activdad',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de actividades';

-- Volcando datos para la tabla actividades_db.actividades: ~3 rows (aproximadamente)
INSERT INTO `actividades` (`id`, `titulo`, `descripcion`, `fecha_inicial`, `fecha_final`, `precio`, `popularidad`) VALUES
	(1, 'Paseo en lancha', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-05-07 16:16:06', '2022-05-07 16:16:08', 1500.00, 54),
	(2, 'Cata de cerveza', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-05-01 16:16:26', '2022-05-07 16:16:32', 2500.00, 100),
	(3, 'Carreras de cuatrimotos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-05-01 16:17:05', '2022-05-25 16:17:12', 10000.00, 150),
	(4, 'Pelea de gallos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-05-07 16:18:19', '2022-05-07 16:18:23', 950.00, 5);

-- Volcando estructura para tabla actividades_db.reservaciones
DROP TABLE IF EXISTS `reservaciones`;
CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla',
  `id_actividad` int(11) NOT NULL COMMENT 'id activadad =>Tabla actividades',
  `num_personas` int(11) NOT NULL COMMENT 'numero de personas en la actividad',
  `precio` decimal(6,2) DEFAULT '0.00' COMMENT 'precio reverva',
  `created_at` datetime DEFAULT NULL COMMENT 'fecha de reserva',
  `updated_at` datetime DEFAULT NULL,
  `fecha_realizacion` datetime DEFAULT NULL COMMENT 'fecha de la realizacion',
  PRIMARY KEY (`id`),
  KEY `FK_reservaciones_actividades` (`id_actividad`),
  CONSTRAINT `FK_reservaciones_actividades` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla actividades_db.reservaciones: ~0 rows (aproximadamente)
INSERT INTO `reservaciones` (`id`, `id_actividad`, `num_personas`, `precio`, `created_at`, `updated_at`, `fecha_realizacion`) VALUES
	(3, 3, 2, 9999.99, '2022-05-07 20:17:08', '2022-05-07 20:17:08', '2022-05-01 16:17:05');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
