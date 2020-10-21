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


-- Volcando estructura de base de datos para contro_prestamos
CREATE DATABASE IF NOT EXISTS `contro_prestamos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `contro_prestamos`;

-- Volcando estructura para tabla contro_prestamos.acceso
CREATE TABLE IF NOT EXISTS `acceso` (
  `iduser` int(5) NOT NULL AUTO_INCREMENT,
  `usuarios_cedula` varchar(11) NOT NULL,
  `contraseña` varchar(120) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`iduser`,`usuarios_cedula`),
  KEY `fk_acceso_usuarios1_idx` (`usuarios_cedula`),
  CONSTRAINT `fk_acceso_usuarios1` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.acceso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
INSERT INTO `acceso` (`iduser`, `usuarios_cedula`, `contraseña`, `estado`, `tipo`) VALUES
	(1, '1102878062', 'c05d27772b1b0c91eb9421d578eed65f', 1, 'Administrador'),
	(2, '1103454678', 'c05d27772b1b0c91eb9421d578eed65f', 1, 'Tecnico');
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;

-- Volcando estructura para procedimiento contro_prestamos.actionlogin
DELIMITER //
CREATE PROCEDURE `actionlogin`(
	IN `usuario` INT(11),
	IN `contra` CHAR(120)

)
BEGIN
	SELECT a.usuarios_cedula, CONCAT(u.pnombre,' ',u.snombre,' ', u.papellido,' ', u.sapellido) AS nombre, a.contraseña, a.tipo
	 FROM acceso a INNER JOIN usuarios u ON u.cedula = a.usuarios_cedula WHERE a.usuarios_cedula = usuario AND a.contraseña = contra AND a.estado = 1 AND u.Estado = 1;
END//
DELIMITER ;

-- Volcando estructura para tabla contro_prestamos.administrativo
CREATE TABLE IF NOT EXISTS `administrativo` (
  `usuarios_cedula` varchar(11) NOT NULL,
  `dependencia` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_cedula`),
  KEY `FK_administrativo_dependencia` (`dependencia`),
  CONSTRAINT `FK_administrativo_dependencia` FOREIGN KEY (`dependencia`) REFERENCES `dependencia` (`id`),
  CONSTRAINT `FK_administrativo_usuarios` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.administrativo: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `administrativo` DISABLE KEYS */;
INSERT INTO `administrativo` (`usuarios_cedula`, `dependencia`) VALUES
	('58', 1),
	('8', 1),
	('86', 1),
	('55', 2),
	('62', 2);
/*!40000 ALTER TABLE `administrativo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.dependencia
CREATE TABLE IF NOT EXISTS `dependencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_dependencia` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.dependencia: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `dependencia` DISABLE KEYS */;
INSERT INTO `dependencia` (`id`, `nombre_dependencia`) VALUES
	(1, 'SIRET'),
	(2, 'BIENESTAR'),
	(5, 'CREDITO EDUCATIVO'),
	(6, 'FACI 2');
/*!40000 ALTER TABLE `dependencia` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.docente
CREATE TABLE IF NOT EXISTS `docente` (
  `usuarios_cedula` varchar(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`usuarios_cedula`),
  CONSTRAINT `FK_docente_usuarios` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.docente: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` (`usuarios_cedula`, `tipo`) VALUES
	('12', 'Tiempo completo'),
	('19', 'Medio tiempo'),
	('31', 'Tiempo completo'),
	('40', 'Tiempo completo'),
	('88', 'Otro'),
	('91', 'Otro');
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `usuarios_cedula` varchar(11) NOT NULL,
  `programas_idProgramas` int(5) NOT NULL,
  `semestre` varchar(50) NOT NULL,
  PRIMARY KEY (`usuarios_cedula`,`programas_idProgramas`),
  KEY `fk_estudiante_programas1_idx` (`programas_idProgramas`),
  CONSTRAINT `fk_estudiante_programas1` FOREIGN KEY (`programas_idProgramas`) REFERENCES `programas` (`idProgramas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_usuarios1` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.estudiante: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`usuarios_cedula`, `programas_idProgramas`, `semestre`) VALUES
	('110554', 9, '7'),
	('3', 2, '4'),
	('95', 10, '2');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.huellas
CREATE TABLE IF NOT EXISTS `huellas` (
  `idhuella` int(10) NOT NULL AUTO_INCREMENT,
  `huella` blob NOT NULL,
  `usuarios_cedula` varchar(11) NOT NULL,
  PRIMARY KEY (`idhuella`,`usuarios_cedula`),
  KEY `fk_huellas_usuarios1_idx` (`usuarios_cedula`),
  CONSTRAINT `fk_huellas_usuarios1` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.huellas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `huellas` DISABLE KEYS */;
/*!40000 ALTER TABLE `huellas` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.logg
CREATE TABLE IF NOT EXISTS `logg` (
  `idlogg` bigint(32) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(45) NOT NULL,
  `obsevacion` varchar(255) DEFAULT NULL,
  `usuarios_cedula` varchar(11) NOT NULL,
  PRIMARY KEY (`idlogg`,`usuarios_cedula`),
  KEY `fk_logg_usuarios1_idx` (`usuarios_cedula`),
  CONSTRAINT `fk_logg_usuarios1` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.logg: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `logg` DISABLE KEYS */;
/*!40000 ALTER TABLE `logg` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.otro
CREATE TABLE IF NOT EXISTS `otro` (
  `idotro` int(5) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `estado` varchar(132) DEFAULT NULL,
  `observacion` varchar(80) DEFAULT NULL,
  `cantidad` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idotro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.otro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `otro` DISABLE KEYS */;
/*!40000 ALTER TABLE `otro` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.otroprestamo
CREATE TABLE IF NOT EXISTS `otroprestamo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `prestamo_idprestamo` int(20) NOT NULL,
  `otro_idotro` int(5) NOT NULL,
  PRIMARY KEY (`id`,`prestamo_idprestamo`,`otro_idotro`),
  KEY `fk_otroprestamo_prestamo1_idx` (`prestamo_idprestamo`),
  KEY `fk_otroprestamo_otro1_idx` (`otro_idotro`),
  CONSTRAINT `fk_otroprestamo_otro1` FOREIGN KEY (`otro_idotro`) REFERENCES `otro` (`idotro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_otroprestamo_prestamo1` FOREIGN KEY (`prestamo_idprestamo`) REFERENCES `prestamo` (`idprestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.otroprestamo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `otroprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `otroprestamo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.otrousuario
CREATE TABLE IF NOT EXISTS `otrousuario` (
  `usuarios_cedula` varchar(11) NOT NULL,
  `observacion` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`usuarios_cedula`),
  CONSTRAINT `fk_table1_usuarios3` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.otrousuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `otrousuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `otrousuario` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.portatil
CREATE TABLE IF NOT EXISTS `portatil` (
  `idportatil` int(5) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `serial` varchar(40) NOT NULL,
  `descripcion` varchar(132) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idportatil`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.portatil: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `portatil` DISABLE KEYS */;
INSERT INTO `portatil` (`idportatil`, `codigo`, `serial`, `descripcion`, `estado`, `fecha`, `activo`) VALUES
	(1, 'PTL-01A', 'RYDASAG', 'Ninguna', 'Bueno', '2020-09-22', 0),
	(3, 'PTL-01E', '3434DA', 'HP 201A', 'Defectuoso', '2020-09-23', 1),
	(4, 'PTL-01Y', '3434UT', 'Thosiba', 'Bueno', '2020-09-22', 1),
	(5, 'PTL-01R', '3434GISA', 'HP TODO EN UNO', 'Defectuoso', '2020-09-30', 0),
	(6, 'PTL-01OR', 'DTRGA', 'DELL 457 EXPERIA', 'Bueno', '2020-09-14', 0),
	(7, 'PTL-ASD', 'DASDDA', 'hp 14', 'Bueno', '2020-10-08', 1);
/*!40000 ALTER TABLE `portatil` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.portatilprestamo
CREATE TABLE IF NOT EXISTS `portatilprestamo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `prestamo_idprestamo` int(20) NOT NULL,
  `portatil_idportatil` int(5) NOT NULL,
  PRIMARY KEY (`id`,`prestamo_idprestamo`,`portatil_idportatil`),
  KEY `fk_portatilprestamo_prestamo1_idx` (`prestamo_idprestamo`),
  KEY `fk_portatilprestamo_portatil1_idx` (`portatil_idportatil`),
  CONSTRAINT `fk_portatilprestamo_portatil1` FOREIGN KEY (`portatil_idportatil`) REFERENCES `portatil` (`idportatil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_portatilprestamo_prestamo1` FOREIGN KEY (`prestamo_idprestamo`) REFERENCES `prestamo` (`idprestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.portatilprestamo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `portatilprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `portatilprestamo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.prestamo
CREATE TABLE IF NOT EXISTS `prestamo` (
  `idprestamo` int(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `fecha` varchar(32) NOT NULL,
  `observacion` varchar(120) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idprestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.prestamo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.programas
CREATE TABLE IF NOT EXISTS `programas` (
  `idProgramas` int(5) NOT NULL AUTO_INCREMENT,
  `nombreprograma` varchar(100) NOT NULL,
  PRIMARY KEY (`idProgramas`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.programas: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `programas` DISABLE KEYS */;
INSERT INTO `programas` (`idProgramas`, `nombreprograma`) VALUES
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

-- Volcando estructura para tabla contro_prestamos.sonido
CREATE TABLE IF NOT EXISTS `sonido` (
  `idsonido` int(5) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(132) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idsonido`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.sonido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `sonido` DISABLE KEYS */;
INSERT INTO `sonido` (`idsonido`, `codigo`, `descripcion`, `estado`, `fecha`, `activo`) VALUES
	(1, 'AUD-01A', 'Mini SpeakerS', 'Bueno', '2020-09-06', 1),
	(2, 'AUD-01E', 'Mini Speaker', 'Bueno', '2020-09-22', 0);
/*!40000 ALTER TABLE `sonido` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.sonidoprestamo
CREATE TABLE IF NOT EXISTS `sonidoprestamo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `prestamo_idprestamo` int(20) NOT NULL,
  `sonido_idsonido` int(5) NOT NULL,
  PRIMARY KEY (`id`,`prestamo_idprestamo`,`sonido_idsonido`),
  KEY `fk_sonidoprestamo_prestamo1_idx` (`prestamo_idprestamo`),
  KEY `fk_sonidoprestamo_sonido1_idx` (`sonido_idsonido`),
  CONSTRAINT `fk_sonidoprestamo_prestamo1` FOREIGN KEY (`prestamo_idprestamo`) REFERENCES `prestamo` (`idprestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sonidoprestamo_sonido1` FOREIGN KEY (`sonido_idsonido`) REFERENCES `sonido` (`idsonido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.sonidoprestamo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sonidoprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `sonidoprestamo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `cedula` varchar(11) NOT NULL,
  `pnombre` varchar(40) NOT NULL,
  `snombre` varchar(40) DEFAULT '              ',
  `papellido` varchar(40) NOT NULL,
  `sapellido` varchar(40) DEFAULT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.usuarios: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`cedula`, `pnombre`, `snombre`, `papellido`, `sapellido`, `telefono`, `correo`, `direccion`, `Estado`) VALUES
	('10', 'Eligendi', 'Veniam', 'Labore', 'Aliquip', '94', 'tojeg@mailinator.com', 'Sit beatae dolorem', 0),
	('11', 'Harum', '', 'nulla', 'Consequa', '12', 'fakesala@mailinator.net', 'Dolorum enim dolor u', 0),
	('1102878062', 'Mateo', '', 'Florez', 'Arroyo', '3017269549', 'mattteo19997@gmail.com', 'Calle 47 # 34  - 45', 1),
	('1103454678', 'Carlos', 'Andres', 'Fontalvo', 'Perez', '3015658903', 'mateo.floorez@gmail.com', '', 1),
	('110554', 'Maxime SD', 'Rem', 'Fugit sd', 'sda', '30145474', 'ajaja@corposucre.edu.co', 'call 45', 1),
	('1110387898', 'Necessitatibus', 'Nisi', 'Tempor', 'Omnis', '948789', 'kowonu@mailinator.es', 'Deleniti', 0),
	('12', 'Nostrud porro deleni', 'Error ut ab anim pla', 'Doloremque officiis', 'Sunt qui eu cumque d', '1', 'zecabifep@mailinator.com', 'Voluptate quis susci', 0),
	('19', 'Facere reprehenderit', 'Laboriosam nobis mo', 'Perferendis sunt qui', 'Laborum ', '68', 'dekuwe@mailinator.com', 'Debitis blanditiis a', 0),
	('3', 'Unde voluptatibus qu', 'Illo aut ab laborum', 'Dolorem est non est', 'Culpa temporibus ac', '72', 'bolys@mailinator.com', 'Ea atque sunt non li', 1),
	('31', 'Maxime', 'consequ', 'Fugit ', 'Distinctio', '30', 'dysino@mailinator.com', 'Voluptatibus aliquam', 0),
	('40', 'Voluptas similique i', 'Assumenda ', 'Voluptatem', 'Ipsum ', '41', 'cihes@mailinator.com', 'Nihil exercitation r', 0),
	('55', 'Odio', 'Quibusdam', 'beatae', 'Culpa', '337', 'sizuhu@mailinator.com', 'Neque corrupti aut', 1),
	('58', 'commodo', 'reiciendis', 'Accusamus', 'Quia in', '50', 'cypary@mailinator.com', 'Ratione quia consequ', 1),
	('62', 'Fugiat molestiae off', 'Lorem qui voluptate', 'Voluptatem aut excep', 'Dolore aut eveniet', '65', 'dysu@mailinator.com', 'Vitae repellendus A', 0),
	('8', 'Voluptatibus', 'Aliqua', 'enim', 'Molestiae', '3056', 'hotizowa@mailinator.es', 'Cll 45', 1),
	('86', 'Ea exercitation modi', 'Ullam a asperiores e', 'Praesentium animi e', 'Quaerat explicabo S', '40', 'camabyrir@mailinator.com', 'In numquam nihil sit', 0),
	('88', 'Natus nostrum dolore', 'Quaerat voluptatem', 'Ipsa ut ullam esse', 'Voluptate quo modi a', '55', 'kuzol@mailinator.com', 'Necessitatibus elige', 0),
	('91', 'Et non tempor animi', 'Incidunt qui ut num', 'Incidunt consequatu', 'Aut nostrum aute fug', '27', 'sybu@mailinator.com', 'Dolorum nihil maxime', 0),
	('95', 'Temporibus et deleni', '', 'Sint', 'Praesentium', '92', 'zyvaj@mailinator.com', 'Irure perspiciatis', 0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.usuario_huella
CREATE TABLE IF NOT EXISTS `usuario_huella` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuarios_cedula` varchar(11) NOT NULL,
  `huellas_idhuella` int(10) NOT NULL,
  `prestamo_idprestamo` int(20) NOT NULL,
  PRIMARY KEY (`id`,`usuarios_cedula`,`huellas_idhuella`,`prestamo_idprestamo`),
  KEY `fk_usuario_huella_usuarios_idx` (`usuarios_cedula`),
  KEY `fk_usuario_huella_huellas1_idx` (`huellas_idhuella`),
  KEY `fk_usuario_huella_prestamo1_idx` (`prestamo_idprestamo`),
  CONSTRAINT `fk_usuario_huella_huellas1` FOREIGN KEY (`huellas_idhuella`) REFERENCES `huellas` (`idhuella`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_huella_prestamo1` FOREIGN KEY (`prestamo_idprestamo`) REFERENCES `prestamo` (`idprestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_huella_usuarios` FOREIGN KEY (`usuarios_cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.usuario_huella: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_huella` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_huella` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.utilidades
CREATE TABLE IF NOT EXISTS `utilidades` (
  `idutilida` int(5) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idutilida`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.utilidades: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `utilidades` DISABLE KEYS */;
INSERT INTO `utilidades` (`idutilida`, `codigo`, `descripcion`, `cantidad`, `fecha`, `activo`) VALUES
	(1, 'PTL-01A', 'DESTORNILLADOR RHY', 2020, '2020-09-22', 1),
	(2, 'PTL-01E', 'PROTOBOARD', 9, '2020-09-22', 1);
/*!40000 ALTER TABLE `utilidades` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.utilidaprestamo
CREATE TABLE IF NOT EXISTS `utilidaprestamo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `prestamo_idprestamo` int(20) NOT NULL,
  `utilidades_idutilida` int(5) NOT NULL,
  PRIMARY KEY (`id`,`prestamo_idprestamo`,`utilidades_idutilida`),
  KEY `fk_utilidaprestamo_prestamo1_idx` (`prestamo_idprestamo`),
  KEY `fk_utilidaprestamo_utilidades1_idx` (`utilidades_idutilida`),
  CONSTRAINT `fk_utilidaprestamo_prestamo1` FOREIGN KEY (`prestamo_idprestamo`) REFERENCES `prestamo` (`idprestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilidaprestamo_utilidades1` FOREIGN KEY (`utilidades_idutilida`) REFERENCES `utilidades` (`idutilida`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.utilidaprestamo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `utilidaprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilidaprestamo` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.video
CREATE TABLE IF NOT EXISTS `video` (
  `idvideo` int(5) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `serial` varchar(40) NOT NULL,
  `descripcion` varchar(132) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idvideo`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.video: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`idvideo`, `codigo`, `serial`, `descripcion`, `estado`, `fecha`, `activo`) VALUES
	(1, 'PTL-01A', '3434FA', 'EPSON 3663', 'Bueno', '2020-09-24', 0),
	(2, 'PTL-01R', '3434DAR', 'EPSON 154 656', 'Bueno', '2020-09-04', 1),
	(3, 'VBM-01ASD', '3434DAS', 'epson', 'Bueno', '2020-09-28', 1),
	(4, 'VBM-01AE', 'DASDDASD', 'ESPSON -364', 'Bueno', '2020-10-01', 0);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;

-- Volcando estructura para tabla contro_prestamos.videoprestamo
CREATE TABLE IF NOT EXISTS `videoprestamo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `prestamo_idprestamo` int(20) NOT NULL,
  `video_idvideo` int(5) NOT NULL,
  PRIMARY KEY (`id`,`prestamo_idprestamo`,`video_idvideo`),
  KEY `fk_table1_prestamo1_idx` (`prestamo_idprestamo`),
  KEY `fk_table1_video1_idx` (`video_idvideo`),
  CONSTRAINT `fk_table1_prestamo1` FOREIGN KEY (`prestamo_idprestamo`) REFERENCES `prestamo` (`idprestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_video1` FOREIGN KEY (`video_idvideo`) REFERENCES `video` (`idvideo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla contro_prestamos.videoprestamo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `videoprestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `videoprestamo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
