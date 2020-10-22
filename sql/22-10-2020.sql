-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para contro_siret
CREATE DATABASE IF NOT EXISTS `contro_siret` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `contro_siret`;

-- Volcando estructura para tabla contro_siret.acceso
CREATE TABLE IF NOT EXISTS `acceso` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(15) NOT NULL,
  `contraseña` varchar(150) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `tipo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_acceso_usuario` (`usuarios_id`),
  CONSTRAINT `FK_acceso_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.acceso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
INSERT INTO `acceso` (`id`, `usuarios_id`, `contraseña`, `estado`, `tipo`) VALUES
	(1, 1, 'c05d27772b1b0c91eb9421d578eed65f', 1, 'Administrador'),
	(2, 2, 'c05d27772b1b0c91eb9421d578eed65f', 1, 'Tecnico');
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.administrativo
CREATE TABLE IF NOT EXISTS `administrativo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(15) NOT NULL DEFAULT 0,
  `dependencia` int(15) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_administrativo_usuario` (`usuario_id`),
  KEY `FK_administrativo_dependencia` (`dependencia`),
  CONSTRAINT `FK_administrativo_dependencia` FOREIGN KEY (`dependencia`) REFERENCES `dependencia` (`id`),
  CONSTRAINT `FK_administrativo_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.administrativo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrativo` DISABLE KEYS */;
INSERT INTO `administrativo` (`id`, `usuario_id`, `dependencia`) VALUES
	(1, 28, 1);
/*!40000 ALTER TABLE `administrativo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.dependencia
CREATE TABLE IF NOT EXISTS `dependencia` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nombre_dependencia` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.dependencia: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `dependencia` DISABLE KEYS */;
INSERT INTO `dependencia` (`id`, `nombre_dependencia`) VALUES
	(1, 'SIRET'),
	(2, 'BIENESTAR'),
	(3, 'CREDITO EDUCATIVO');
/*!40000 ALTER TABLE `dependencia` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.docente
CREATE TABLE IF NOT EXISTS `docente` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(15) NOT NULL,
  `tipo` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docente_usuario` (`usuario_id`),
  CONSTRAINT `FK_docente_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.docente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` (`id`, `usuario_id`, `tipo`) VALUES
	(1, 26, 'Medio tiempo');
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `serial` varchar(100) NOT NULL,
  `etiqueta_id` int(15) NOT NULL DEFAULT 0,
  `marca` varchar(120) DEFAULT NULL,
  `modelo` varchar(120) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `ubicacion` int(15) NOT NULL DEFAULT 0,
  `estado` varchar(80) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial` (`serial`),
  KEY `FK_equipo_etiquetas` (`etiqueta_id`),
  KEY `FK_equipos_siret_laboratorios` (`ubicacion`),
  CONSTRAINT `FK_equipo_etiquetas` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`id`),
  CONSTRAINT `FK_equipos_siret_laboratorios` FOREIGN KEY (`ubicacion`) REFERENCES `siret_laboratorios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.equipos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(15) NOT NULL,
  `programa` int(15) NOT NULL,
  `semestre` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estudiante_usuario` (`usuario_id`),
  KEY `FK_estudiante_programas` (`programa`),
  CONSTRAINT `FK_estudiante_programas` FOREIGN KEY (`programa`) REFERENCES `programas` (`id`),
  CONSTRAINT `FK_estudiante_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.estudiante: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`id`, `usuario_id`, `programa`, `semestre`) VALUES
	(1, 4, 7, 'IV SEMESTRE'),
	(4, 23, 1, '6'),
	(5, 24, 7, '8'),
	(6, 25, 4, '8'),
	(8, 30, 2, '5');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.etiquetas
CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id` int(15) NOT NULL,
  `descripcion` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.etiquetas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `etiquetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `etiquetas` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.invitados
CREATE TABLE IF NOT EXISTS `invitados` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(15) NOT NULL DEFAULT 0,
  `detalles` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invitados_usuario` (`usuario_id`),
  CONSTRAINT `FK_invitados_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.invitados: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `invitados` DISABLE KEYS */;
INSERT INTO `invitados` (`id`, `usuario_id`, `detalles`) VALUES
	(1, 31, 'Qui ex enim veniam sdassa');
/*!40000 ALTER TABLE `invitados` ENABLE KEYS */;

-- Volcando estructura para procedimiento contro_siret.login
DELIMITER //
CREATE PROCEDURE `login`(
	IN `usuario` VARCHAR(11)
,
	IN `contra` VARCHAR(120)
)
BEGIN
	SELECT a.usuarios_id, CONCAT(u.pnombre,' ',u.snombre,' ', u.papellido,' ', u.sapellido) AS nombre, a.contraseña, a.tipo
	 FROM acceso a INNER JOIN usuarios u ON u.id = a.usuarios_id WHERE u.cedula = usuario AND a.contraseña = contra AND a.estado = 1 AND u.Estado = 1;
END//
DELIMITER ;

-- Volcando estructura para tabla contro_siret.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.permisos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.prestamo
CREATE TABLE IF NOT EXISTS `prestamo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(150) NOT NULL,
  `observaciones` varchar(150) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `estado_prestamo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.prestamo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.prestamo_equipo
CREATE TABLE IF NOT EXISTS `prestamo_equipo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `prestamo_id` int(15) NOT NULL DEFAULT 0,
  `equipo_id` int(15) NOT NULL DEFAULT 0,
  `fecha_entrega` varchar(50) NOT NULL,
  `fecha_devolucion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_prestamo_equipo_equipos` (`equipo_id`),
  KEY `FK_prestamo_equipo_prestamo` (`prestamo_id`),
  CONSTRAINT `FK_prestamo_equipo_equipos` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`),
  CONSTRAINT `FK_prestamo_equipo_prestamo` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.prestamo_equipo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prestamo_equipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamo_equipo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.prestamo_utilidad
CREATE TABLE IF NOT EXISTS `prestamo_utilidad` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `prestamo_id` int(15) NOT NULL DEFAULT 0,
  `utilidad_id` int(15) NOT NULL DEFAULT 0,
  `fecha_entrega` varchar(50) NOT NULL,
  `fecha_devolucion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_prestamo_utilidad_prestamo` (`prestamo_id`),
  KEY `FK_prestamo_utilidad_utilidades` (`utilidad_id`),
  CONSTRAINT `FK_prestamo_utilidad_prestamo` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`),
  CONSTRAINT `FK_prestamo_utilidad_utilidades` FOREIGN KEY (`utilidad_id`) REFERENCES `utilidades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.prestamo_utilidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prestamo_utilidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamo_utilidad` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.programas
CREATE TABLE IF NOT EXISTS `programas` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nombreprograma` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.programas: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `programas` DISABLE KEYS */;
INSERT INTO `programas` (`id`, `nombreprograma`) VALUES
	(1, 'Ingeniería de sistemas'),
	(2, 'Tecnología en electrónica industrial'),
	(3, 'Tecnología en desarrollo de software'),
	(4, 'Técnica profesional en mantenimiento electrónico'),
	(5, 'Técnica profesional en mantenimiento de computadores, instalación y configuración de redes LAN'),
	(6, 'Psicología'),
	(7, 'Derecho'),
	(8, 'Comunicación social'),
	(9, 'Administración de empresas'),
	(10, 'Administración de negocios internacionales'),
	(11, 'Contaduría pública'),
	(12, 'Tecnología en salud ocupacional'),
	(13, 'Fisioterapia'),
	(14, 'Ingeniería de electrónica');
/*!40000 ALTER TABLE `programas` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.reservas_laboratorio
CREATE TABLE IF NOT EXISTS `reservas_laboratorio` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `responsable` int(15) NOT NULL DEFAULT 0,
  `fecha` varchar(15) NOT NULL,
  `observacion` varchar(15) NOT NULL,
  `hora_entrada` varchar(30) NOT NULL,
  `hora_salidad` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_reservas_laboratorio_usuario` (`responsable`),
  CONSTRAINT `FK_reservas_laboratorio_usuario` FOREIGN KEY (`responsable`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.reservas_laboratorio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas_laboratorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservas_laboratorio` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.siret_laboratorios
CREATE TABLE IF NOT EXISTS `siret_laboratorios` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.siret_laboratorios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `siret_laboratorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `siret_laboratorios` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(11) NOT NULL,
  `pnombre` varchar(40) NOT NULL,
  `snombre` varchar(40) NOT NULL,
  `papellido` varchar(40) NOT NULL,
  `sapellido` varchar(40) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.usuarios: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `cedula`, `pnombre`, `snombre`, `papellido`, `sapellido`, `telefono`, `correo`, `direccion`, `estado`) VALUES
	(1, '1102878062', 'Mateo', '', 'Florez', 'Arroyo', '3017269549', 'mattteo19997@gmail.com', 'Calle 47 # 34  - 45', 1),
	(2, '1103454678', 'Carlos', 'Andres', 'Fontalvo', 'Perez', '3015658903', 'mateo.floorez@gmail.com', 'Calle 45 # r6s', 1),
	(3, '1105543232', 'Maxime SD', 'Rem', 'Fugit sd', 'sda', '30145474', 'ajaja@corposucre.edu.co', 'call 45', 1),
	(4, '1110387898', 'Necessitausuariotibus', 'Nisi', 'Tempor', 'Omnis', '948789', 'kowonu@mailinator.es', 'Deleniti', 0),
	(23, '65', 'Et sint', 'Eligendi', 'Facilis', 'Dignissimos', '25', 'bizuky@mailinator.com', 'Expedita qui hic non', 0),
	(24, '62', 'Itaque proident lab', 'Delectus', 'Tempore', 'Vel', '21', 'quzabi@mailinator.com', 'Aliquid sed aliquip', 0),
	(25, '76', 'Doloribus', 'Ut', 'Quam', 'Rerum', '45', 'xikygoluw@mailinator.com', 'Vel enim molestiae t', 1),
	(26, '72430707', 'Juan', 'volupta', 'Sitnat', 'Assumenda', '9523235', 'mysowyvuny@mailinator.com', 'CLL 45 # 34 - 44 barrio el eden', 1),
	(28, '74', 'Provide', 'Asper', 'Inci', 'nullas', '666565', 'fany@mailinator.com', 'Voluptas debitis vol', 1),
	(30, '55', 'Eaque', 'Quis', 'Adipi', 'Occaecat', '44', 'jejij@mailinator.com', 'Voluptas deserunt au', 1),
	(31, '60', 'Aliqui', 'Except', 'Irure', 'Incidi', '81', 'hozun@mailinator.com', 'Expedita sed eius fa', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla contro_siret.utilidades
CREATE TABLE IF NOT EXISTS `utilidades` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `etiqueta_id` int(15) NOT NULL DEFAULT 0,
  `marca` varchar(120) DEFAULT NULL,
  `descripcion` varchar(120) DEFAULT NULL,
  `cantidad` int(15) DEFAULT 0,
  `estado` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_utilidad_etiquetas` (`etiqueta_id`),
  CONSTRAINT `FK_utilidad_etiquetas` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla contro_siret.utilidades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `utilidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilidades` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
