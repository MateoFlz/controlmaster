

CREATE TABLE `acceso` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(15) NOT NULL,
  `contraseña` varchar(150) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `tipo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_acceso_usuario` (`usuarios_id`),
  CONSTRAINT `FK_acceso_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO acceso VALUES("1","1","c05d27772b1b0c91eb9421d578eed65f","1","Administrador");
INSERT INTO acceso VALUES("2","2","c05d27772b1b0c91eb9421d578eed65f","0","Administrador");
INSERT INTO acceso VALUES("3","36","d41d8cd98f00b204e9800998ecf8427e","1","Tecnico");
INSERT INTO acceso VALUES("4","37","d41d8cd98f00b204e9800998ecf8427e","0","Administrador");





CREATE TABLE `acceso_permiso` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_permiso` int(15) NOT NULL DEFAULT 0,
  `id_acceso` int(15) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK__permisos` (`id_permiso`),
  KEY `FK_acceso_permiso_acceso` (`id_acceso`),
  CONSTRAINT `FK__permisos` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`),
  CONSTRAINT `FK_acceso_permiso_acceso` FOREIGN KEY (`id_acceso`) REFERENCES `acceso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

INSERT INTO acceso_permiso VALUES("1","1","1","1");
INSERT INTO acceso_permiso VALUES("2","2","1","1");
INSERT INTO acceso_permiso VALUES("3","3","1","1");
INSERT INTO acceso_permiso VALUES("4","4","1","1");
INSERT INTO acceso_permiso VALUES("5","5","1","1");
INSERT INTO acceso_permiso VALUES("8","6","1","1");
INSERT INTO acceso_permiso VALUES("15","1","2","1");
INSERT INTO acceso_permiso VALUES("16","2","2","0");
INSERT INTO acceso_permiso VALUES("17","3","2","0");
INSERT INTO acceso_permiso VALUES("18","4","2","0");
INSERT INTO acceso_permiso VALUES("19","5","2","0");
INSERT INTO acceso_permiso VALUES("20","6","2","1");
INSERT INTO acceso_permiso VALUES("120","1","3","1");
INSERT INTO acceso_permiso VALUES("121","2","3","1");
INSERT INTO acceso_permiso VALUES("122","3","3","0");
INSERT INTO acceso_permiso VALUES("123","4","3","1");
INSERT INTO acceso_permiso VALUES("124","5","3","1");
INSERT INTO acceso_permiso VALUES("125","6","3","1");
INSERT INTO acceso_permiso VALUES("126","7","1","1");





CREATE TABLE `administrativo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(15) NOT NULL DEFAULT 0,
  `dependencia` int(15) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_administrativo_usuario` (`usuario_id`),
  KEY `FK_administrativo_dependencia` (`dependencia`),
  CONSTRAINT `FK_administrativo_dependencia` FOREIGN KEY (`dependencia`) REFERENCES `dependencia` (`id`),
  CONSTRAINT `FK_administrativo_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO administrativo VALUES("1","28","1");
INSERT INTO administrativo VALUES("2","32","6");





CREATE TABLE `aulas` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sede` varchar(60) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO aulas VALUES("1","Sede A","Recursos educativos","Funcionando","1");
INSERT INTO aulas VALUES("2","Sede C","AMC","Funcionando","1");
INSERT INTO aulas VALUES("3","Sede A","S03","Funcionando","1");
INSERT INTO aulas VALUES("4","Sede A","S01","Funcionando","0");
INSERT INTO aulas VALUES("5","Sede A","S02","Funcionando","1");
INSERT INTO aulas VALUES("6","Sede C","S04","Funcionando","1");





CREATE TABLE `dependencia` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nombre_dependencia` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO dependencia VALUES("1","SIRET");
INSERT INTO dependencia VALUES("2","FACA");
INSERT INTO dependencia VALUES("3","CREDITO EDUCATIVO");
INSERT INTO dependencia VALUES("6","FACI");





CREATE TABLE `docente` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(15) NOT NULL,
  `tipo` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docente_usuario` (`usuario_id`),
  CONSTRAINT `FK_docente_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO docente VALUES("1","26","Medio tiempo");





CREATE TABLE `equipos` (
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
  CONSTRAINT `FK_equipos_siret_laboratorios` FOREIGN KEY (`ubicacion`) REFERENCES `aulas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO equipos VALUES("1","3434UT","1","EPSON","S39","Ninguna","1","Bueno","1");
INSERT INTO equipos VALUES("3","DATD","2","HP","14","Nuevo","6","Bueno","1");
INSERT INTO equipos VALUES("5","3434U","2","THOSIBA","SP30","4 RAM - PROCESADOR I3","1","Bueno","1");
INSERT INTO equipos VALUES("6","3574ST","1","EPSON","S39","Nuevo con garantia","1","Bueno","1");
INSERT INTO equipos VALUES("7","RYDASAG","1","EPSON","S39","Opaco","1","Defectuoso","1");





CREATE TABLE `estudiante` (
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

INSERT INTO estudiante VALUES("1","4","7","IV SEMESTRE");
INSERT INTO estudiante VALUES("4","23","1","6");
INSERT INTO estudiante VALUES("5","24","7","8");
INSERT INTO estudiante VALUES("6","25","4","8");
INSERT INTO estudiante VALUES("8","30","2","5");





CREATE TABLE `etiquetas` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO etiquetas VALUES("1","Video");
INSERT INTO etiquetas VALUES("2","Portatil");
INSERT INTO etiquetas VALUES("3","Regulador");
INSERT INTO etiquetas VALUES("4","Cargador");
INSERT INTO etiquetas VALUES("5","Audio");
INSERT INTO etiquetas VALUES("6","VGA");





CREATE TABLE `invitados` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(15) NOT NULL DEFAULT 0,
  `detalles` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invitados_usuario` (`usuario_id`),
  CONSTRAINT `FK_invitados_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO invitados VALUES("1","31","Qui  enim veniam sdassa");





CREATE TABLE `loggback` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `detalles` varchar(150) DEFAULT NULL,
  `fecha` varchar(30) DEFAULT NULL,
  `id_usuario` int(15) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_loggback_usuarios` (`id_usuario`),
  CONSTRAINT `FK_loggback_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

INSERT INTO loggback VALUES("29","db-backup-2020-11-12.sql creado 09:54:01 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("30","db-backup-2020-11-12.sql creado 09:54:03 AM","2020-11-12","1","0");
INSERT INTO loggback VALUES("31","db-backup-2020-11-12.sql creado 09:54:44 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("32","db-backup-2020-11-12.sql creado 09:54:46 AM","2020-11-12","1","0");
INSERT INTO loggback VALUES("33","db-backup-2020-11-12.sql creado 10:04:54 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("34","db-backup-2020-11-12.sql creado 10:04:58 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("35","db-backup-2020-11-12.sql creado 10:05:04 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("36","db-backup-2020-11-12.sql creado 10:05:06 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("37","db-backup-2020-11-12.sql creado 10:05:07 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("38","db-backup-2020-11-12.sql creado 10:05:10 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("39","db-backup-2020-11-12.sql creado 10:05:12 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("40","db-backup-2020-11-12.sql creado 10:05:14 AM","2020-11-12","1","1");
INSERT INTO loggback VALUES("41","db-backup-2020-11-12.sql creado 10:05:21 AM","2020-11-12","1","1");





CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO permisos VALUES("1","crear","1");
INSERT INTO permisos VALUES("2","editar","1");
INSERT INTO permisos VALUES("3","ver","1");
INSERT INTO permisos VALUES("4","elimiar","1");
INSERT INTO permisos VALUES("5","reportes","1");
INSERT INTO permisos VALUES("6","backup","1");
INSERT INTO permisos VALUES("7","permisos","1");





CREATE TABLE `prestamo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ubicacion` int(15) NOT NULL DEFAULT 0,
  `observaciones` varchar(150) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `estado_prestamo` tinyint(1) NOT NULL DEFAULT 0,
  `id_usuario` int(15) NOT NULL DEFAULT 0,
  `id_admin` int(15) NOT NULL DEFAULT 0,
  `ectivo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_prestamo_usuarios` (`id_admin`),
  KEY `FK_prestamo_usuarios_2` (`id_usuario`),
  KEY `FK_prestamo_aulas` (`ubicacion`),
  CONSTRAINT `FK_prestamo_aulas` FOREIGN KEY (`ubicacion`) REFERENCES `aulas` (`id`),
  CONSTRAINT `FK_prestamo_usuarios` FOREIGN KEY (`id_admin`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `FK_prestamo_usuarios_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

INSERT INTO prestamo VALUES("42","3","Prueba nueva","2020-11-11","1","26","1","1");
INSERT INTO prestamo VALUES("43","1","Prueba utilidades","2020-11-11","1","1","1","1");
INSERT INTO prestamo VALUES("44","3","Prueba utilidad y cantidades","2020-11-11","1","1","1","1");





CREATE TABLE `prestamo_equipo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `prestamo_id` int(15) NOT NULL DEFAULT 0,
  `equipo_id` int(15) NOT NULL DEFAULT 0,
  `fecha_entrega` varchar(50) NOT NULL,
  `fecha_devolucion` varchar(50) DEFAULT NULL,
  `hora_entrega` varchar(50) NOT NULL,
  `hora_final` varchar(50) DEFAULT NULL,
  `recive` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_prestamo_equipo_equipos` (`equipo_id`),
  KEY `FK_prestamo_equipo_prestamo` (`prestamo_id`),
  CONSTRAINT `FK_prestamo_equipo_equipos` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`),
  CONSTRAINT `FK_prestamo_equipo_prestamo` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

INSERT INTO prestamo_equipo VALUES("36","42","6","2020-11-11","","20:57:38 PM","","","1","1");
INSERT INTO prestamo_equipo VALUES("37","42","5","2020-11-11","","20:57:38 PM","","","1","1");
INSERT INTO prestamo_equipo VALUES("38","44","7","2020-11-11","","21:22:46 PM","","","1","1");





CREATE TABLE `prestamo_utilidad` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `prestamo_id` int(15) NOT NULL DEFAULT 0,
  `utilidad_id` int(15) NOT NULL DEFAULT 0,
  `fecha_entrega` varchar(50) NOT NULL,
  `fecha_devolucion` varchar(50) NOT NULL,
  `hora_entrega` varchar(50) NOT NULL,
  `hora_final` varchar(50) NOT NULL,
  `cantidad` int(15) NOT NULL DEFAULT 0,
  `recive` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_prestamo_utilidad_prestamo` (`prestamo_id`),
  KEY `FK_prestamo_utilidad_utilidades` (`utilidad_id`),
  CONSTRAINT `FK_prestamo_utilidad_prestamo` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`),
  CONSTRAINT `FK_prestamo_utilidad_utilidades` FOREIGN KEY (`utilidad_id`) REFERENCES `utilidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO prestamo_utilidad VALUES("6","43","2","2020-11-11","","21:05:45 PM","","2","","1","1");
INSERT INTO prestamo_utilidad VALUES("7","44","1","2020-11-11","","21:22:46 PM","","2","","1","1");





CREATE TABLE `programas` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nombreprograma` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO programas VALUES("1","Ingeniería de sistemas");
INSERT INTO programas VALUES("2","Tecnología en electrónica industrial");
INSERT INTO programas VALUES("3","Tecnología en desarrollo de software");
INSERT INTO programas VALUES("4","Técnica profesional en mantenimiento electrónico");
INSERT INTO programas VALUES("5","Técnica profesional en mantenimiento de computadores, instalación y configuración de redes LAN");
INSERT INTO programas VALUES("6","Psicología");
INSERT INTO programas VALUES("7","Derecho");
INSERT INTO programas VALUES("8","Comunicación social");
INSERT INTO programas VALUES("9","Administración de empresas");
INSERT INTO programas VALUES("10","Administración de negocios internacionales");
INSERT INTO programas VALUES("11","Contaduría pública");
INSERT INTO programas VALUES("12","Tecnología en salud ocupacional");
INSERT INTO programas VALUES("13","Fisioterapia");
INSERT INTO programas VALUES("14","Ingeniería de electrónica");





CREATE TABLE `reservas_laboratorio` (
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






CREATE TABLE `tmp_equipo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(15) DEFAULT NULL,
  `serial` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `admin` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial` (`serial`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;






CREATE TABLE `tmp_equipo_id` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(15) NOT NULL DEFAULT 0,
  `activo` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_tmp_equipo_id_equipos` (`id_equipo`),
  CONSTRAINT `FK_tmp_equipo_id_equipos` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO tmp_equipo_id VALUES("14","6","1");
INSERT INTO tmp_equipo_id VALUES("15","7","1");
INSERT INTO tmp_equipo_id VALUES("17","3","0");
INSERT INTO tmp_equipo_id VALUES("18","5","1");
INSERT INTO tmp_equipo_id VALUES("19","1","0");





CREATE TABLE `tmp_utilidad` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_utilidad` int(15) DEFAULT 0,
  `marca` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `cantidad` int(15) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `admin` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;






CREATE TABLE `tmp_utilidad_id` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_utilidad` int(15) NOT NULL DEFAULT 0,
  `activo` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_tmp_utilidad_id_utilidades` (`id_utilidad`),
  CONSTRAINT `FK_tmp_utilidad_id_utilidades` FOREIGN KEY (`id_utilidad`) REFERENCES `utilidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO tmp_utilidad_id VALUES("10","1","1");
INSERT INTO tmp_utilidad_id VALUES("20","2","1");
INSERT INTO tmp_utilidad_id VALUES("21","3","0");





CREATE TABLE `usuarios` (
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","1102878062","Mateo","","Florez","Arroyo","301726954","mattteo19997@gmail.com","Calle 47 # 34  - 45","1");
INSERT INTO usuarios VALUES("2","1103454678","Carlos","Andres","Fontalvo","Perez","3015658903","mateo.floorez@gmail.com","Calle 45 # r6s","1");
INSERT INTO usuarios VALUES("3","1105543232","Culpa","Elit","Modi","Assumes","86","xokiru@mailinator.com","Voluptas beatae ex m","1");
INSERT INTO usuarios VALUES("4","1110387898","Necessitausuariotibus","Nisi","Tempor","Omnis","948789","kowonu@mailinator.es","Deleniti","0");
INSERT INTO usuarios VALUES("23","65","Et sint","Eligendi","Facilis","Dignissimos","25","bizuky@mailinator.com","Expedita qui hic non","0");
INSERT INTO usuarios VALUES("24","62","Itaque proident lab","Delectus","Tempore","Vel","21","quzabi@mailinator.com","Aliquid sed aliquip","0");
INSERT INTO usuarios VALUES("25","76","Doloribus","Ut","Quam","Rerum","45","xikygoluw@mailinator.com","Vel enim molestiae t","1");
INSERT INTO usuarios VALUES("26","72430707","Juan","volupta","Sitnat","Assumenda","9523235","mysowyvuny@mailinator.com","CLL 45 # 34 - 44 barrio el eden","1");
INSERT INTO usuarios VALUES("28","74","Provide","Asper","Inci","nullas","666565","fany@mailinator.com","Voluptas debitis vol","1");
INSERT INTO usuarios VALUES("30","55","Eaque","Quis","Adipi","Occaecat","44","jejij@mailinator.com","Voluptas deserunt au","1");
INSERT INTO usuarios VALUES("31","60","Aliqui","Except","Irure","Incidi","81","hozun@mailinator.com","Expedita sed eius fa","1");
INSERT INTO usuarios VALUES("32","79","Quis","Perfe","Itaque","Dolorem","51","kocuhakim@mailinator.com","Est magnam sunt acc","1");
INSERT INTO usuarios VALUES("36","73460707","Culpa","Elit","Modi","Assumes","86855","xokiru@mailinator.com","Voluptas beatae ex m","1");
INSERT INTO usuarios VALUES("37","83","Quib","Volup","Pariatur","Reici","87","mapoh@mailinator.com","Anim maiores tempora","1");





CREATE TABLE `utilidades` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `etiqueta_id` int(15) NOT NULL DEFAULT 0,
  `marca` varchar(120) DEFAULT NULL,
  `descripcion` varchar(120) DEFAULT NULL,
  `ubicacion` int(15) NOT NULL,
  `cantidad` int(15) DEFAULT 0,
  `estado` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_utilidad_etiquetas` (`etiqueta_id`),
  KEY `FK_utilidades_aulas` (`ubicacion`),
  CONSTRAINT `FK_utilidad_etiquetas` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`id`),
  CONSTRAINT `FK_utilidades_aulas` FOREIGN KEY (`ubicacion`) REFERENCES `aulas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO utilidades VALUES("1","4","TOR","Ninguna","1","1","Bueno","1");
INSERT INTO utilidades VALUES("2","3","PRO","Consequat Con sonido","1","2","Bueno","1");
INSERT INTO utilidades VALUES("3","4","Gines","Compatible con Hp","1","2","Bueno","1");
INSERT INTO utilidades VALUES("4","4","LEVITON","Compatible con lenovo","1","1","Bueno","1");



