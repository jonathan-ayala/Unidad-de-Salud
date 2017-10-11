/*
Navicat MySQL Data Transfer

Source Server         : mySQL
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : encuesta

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-10-06 22:14:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asignar_materia
-- ----------------------------
DROP TABLE IF EXISTS `asignar_materia`;
CREATE TABLE `asignar_materia` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_maestro` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `id_nivel` (`id_nivel`,`id_carrera`,`id_maestro`,`id_materia`,`id_user`),
  KEY `id_carrera` (`id_carrera`),
  KEY `id_maestro` (`id_maestro`),
  KEY `id_user` (`id_user`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `asignar_materia_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`),
  CONSTRAINT `asignar_materia_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`),
  CONSTRAINT `asignar_materia_ibfk_3` FOREIGN KEY (`id_maestro`) REFERENCES `maestro` (`id_maestro`),
  CONSTRAINT `asignar_materia_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`),
  CONSTRAINT `asignar_materia_ibfk_5` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asignar_materia
-- ----------------------------
INSERT INTO `asignar_materia` VALUES ('1', '4', '6', '1', '18', '1', null, null);
INSERT INTO `asignar_materia` VALUES ('2', '6', '6', '1', '25', '1', null, null);
INSERT INTO `asignar_materia` VALUES ('3', '5', '7', '8', '23', '1', null, null);

-- ----------------------------
-- Table structure for carrera
-- ----------------------------
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `tipo_carrera` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_carrera`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `carrera_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of carrera
-- ----------------------------
INSERT INTO `carrera` VALUES ('6', 'SISTEMA', 'PRECENSIAL', '1', null, null);
INSERT INTO `carrera` VALUES ('7', 'CIVIL', 'PRECENSIAL', '1', null, null);
INSERT INTO `carrera` VALUES ('8', 'ELECTRICA', 'PRECENSIAL', '1', null, null);
INSERT INTO `carrera` VALUES ('9', 'GASTRONOMIA', 'PRECENSIAL', '1', null, null);
INSERT INTO `carrera` VALUES ('10', 'ELECTRONICA', 'PRECENSIAL', '1', null, null);

-- ----------------------------
-- Table structure for categoria_de_preguntas
-- ----------------------------
DROP TABLE IF EXISTS `categoria_de_preguntas`;
CREATE TABLE `categoria_de_preguntas` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria_de_preguntas
-- ----------------------------
INSERT INTO `categoria_de_preguntas` VALUES ('1', 'Asistencia y puntualidad');
INSERT INTO `categoria_de_preguntas` VALUES ('2', 'Atención al alumno');
INSERT INTO `categoria_de_preguntas` VALUES ('3', 'Calidad de la evaluación');
INSERT INTO `categoria_de_preguntas` VALUES ('4', 'Competencia docente');
INSERT INTO `categoria_de_preguntas` VALUES ('5', 'Fomento de participación del alumno en clases');
INSERT INTO `categoria_de_preguntas` VALUES ('6', 'Desempeño docente');
INSERT INTO `categoria_de_preguntas` VALUES ('7', 'Planificación');

-- ----------------------------
-- Table structure for evaluacion
-- ----------------------------
DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion` (
  `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_asignacion` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion`),
  KEY `id_asignacion` (`id_asignacion`,`id_user`),
  CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`id_asignacion`) REFERENCES `asignar_materia` (`id_asignacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of evaluacion
-- ----------------------------

-- ----------------------------
-- Table structure for maestro
-- ----------------------------
DROP TABLE IF EXISTS `maestro`;
CREATE TABLE `maestro` (
  `id_maestro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_maestro`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of maestro
-- ----------------------------
INSERT INTO `maestro` VALUES ('1', 'Luis', 'Rivas', 'San Miguel', '123456', 'null', '1', null, null);
INSERT INTO `maestro` VALUES ('2', 'Hector ', 'Castro', 'San miguel', '123564848', 'null', '1', null, null);
INSERT INTO `maestro` VALUES ('3', 'Carlos', 'Amaya', 'San Miguel', '4846156', 'camaya@itca.es', '1', null, null);
INSERT INTO `maestro` VALUES ('4', 'Norma', 'VIllalta', 'San Miguel', '8764645', 'null', '1', null, null);
INSERT INTO `maestro` VALUES ('5', 'Jenny', 'Euceda', 'San Miguel', '123456', 'null', '1', null, null);
INSERT INTO `maestro` VALUES ('6', 'Luis', 'Lovos', 'San Miguel', '7534548', 'llovos@itca.es', '1', null, null);
INSERT INTO `maestro` VALUES ('7', 'Raul Moises', 'Marquez', 'San Miguel', '876516748', 'rmarquez@itca.es', '1', null, '0000-00-00 00:00:00');
INSERT INTO `maestro` VALUES ('8', 'Juan', 'Perez', 'San Miguel', '78454545', 'jperez@itca.es', '1', null, null);
INSERT INTO `maestro` VALUES ('9', 'Juan Jose', 'Perez Lopez', 'San Miguel', '7884545', 'jjperez@itca.es', '1', null, null);

-- ----------------------------
-- Table structure for materia
-- ----------------------------
DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_user` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of materia
-- ----------------------------
INSERT INTO `materia` VALUES ('18', 'CLIENTE SERVIDOR', '1', null, null);
INSERT INTO `materia` VALUES ('19', 'BASE DE DATOS', '1', null, null);
INSERT INTO `materia` VALUES ('20', 'DISEÑO Y ANALISIS DE SISTEMA', '1', null, null);
INSERT INTO `materia` VALUES ('21', 'LOGICA DE PROGRAMACION', '1', null, null);
INSERT INTO `materia` VALUES ('22', 'INGLES', '1', null, null);
INSERT INTO `materia` VALUES ('23', 'FISICA', '1', null, null);
INSERT INTO `materia` VALUES ('24', 'MATEMATICA', '1', null, null);
INSERT INTO `materia` VALUES ('25', 'PHP', '1', null, null);
INSERT INTO `materia` VALUES ('26', 'JAVA', '1', null, null);
INSERT INTO `materia` VALUES ('27', 'DISEÑO DE PAGINA WEB', '1', null, null);
INSERT INTO `materia` VALUES ('28', 'PREVENCION DE RIESGO Y ACCIDENTE', '1', null, null);
INSERT INTO `materia` VALUES ('29', 'DISEÑO DE PLANES DE NEGOCIOS', '1', null, null);
INSERT INTO `materia` VALUES ('30', 'EJECUCION DE PLAN DE NEGOCIOS', '1', null, null);

-- ----------------------------
-- Table structure for nivel
-- ----------------------------
DROP TABLE IF EXISTS `nivel`;
CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_nivel`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `nivel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nivel
-- ----------------------------
INSERT INTO `nivel` VALUES ('4', 'PRIMER CICLO', '2014', '1', null, null);
INSERT INTO `nivel` VALUES ('5', 'SEGUNDO CICLO', '2014', '1', null, null);
INSERT INTO `nivel` VALUES ('6', 'TERCER CICLO', '2014', '1', null, null);
INSERT INTO `nivel` VALUES ('7', 'CUARTO CICLO', '2014', '1', null, null);

-- ----------------------------
-- Table structure for observaciones
-- ----------------------------
DROP TABLE IF EXISTS `observaciones`;
CREATE TABLE `observaciones` (
  `id_observacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_evaluacion` int(11) DEFAULT NULL,
  `oberservacion` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id_observacion`),
  KEY `id_evaluacion` (`id_evaluacion`),
  CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of observaciones
-- ----------------------------

-- ----------------------------
-- Table structure for pregunta
-- ----------------------------
DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `a` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_de_preguntas` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pregunta
-- ----------------------------
INSERT INTO `pregunta` VALUES ('6', 'El profesor asiste a clases', '1');
INSERT INTO `pregunta` VALUES ('7', 'El profesor inicia con puntualidad las clases', '1');
INSERT INTO `pregunta` VALUES ('8', 'El profesor termina puntualmente las clases', '1');
INSERT INTO `pregunta` VALUES ('9', 'El profesor motiva a consultar y resolver duda', '2');
INSERT INTO `pregunta` VALUES ('10', 'Dedica el profesor tiempo fuera de clases cuando le solicita', '2');
INSERT INTO `pregunta` VALUES ('11', 'Demuestra respeto el docente a las opiniones de los alumnos', '2');
INSERT INTO `pregunta` VALUES ('12', 'Respeta a los estudiantes', '2');
INSERT INTO `pregunta` VALUES ('13', 'Da a conocer plan de evaluació;n al principio de ciclo', '3');
INSERT INTO `pregunta` VALUES ('14', 'Evalua lo enseñado', '3');
INSERT INTO `pregunta` VALUES ('15', 'Usa diferentes formas de evaluación', '3');
INSERT INTO `pregunta` VALUES ('16', 'Entrega los resultados oportunamente', '3');
INSERT INTO `pregunta` VALUES ('17', 'Da información sobre las falla de la evaluación', '3');
INSERT INTO `pregunta` VALUES ('18', 'Dominio de la materia', '4');
INSERT INTO `pregunta` VALUES ('19', 'Prepara bien las clases', '4');
INSERT INTO `pregunta` VALUES ('20', 'Es ordenado en la exposición de los temas', '4');
INSERT INTO `pregunta` VALUES ('21', 'Usa secuencia logica en el desarrollo de los temas', '4');
INSERT INTO `pregunta` VALUES ('22', 'Proporciona información actualizada', '4');
INSERT INTO `pregunta` VALUES ('23', 'Relaciona los nuevos conocimiento con los anteriores', '4');
INSERT INTO `pregunta` VALUES ('24', 'Plantea al inicio de la sesión los resultado de aprendizaje o objetivos esperados al final de la sesión', '4');
INSERT INTO `pregunta` VALUES ('25', 'Verifica al final que los alumnos han comprendido el tema', '4');
INSERT INTO `pregunta` VALUES ('26', 'Usa lenguaje fácil de entender', '4');
INSERT INTO `pregunta` VALUES ('27', 'Usa distintos medios de aprendizaje', '4');
INSERT INTO `pregunta` VALUES ('28', 'Permite las sugerencia de los alumnos', '5');
INSERT INTO `pregunta` VALUES ('29', 'Motiva a los alumnos para para participar y preguntar', '5');
INSERT INTO `pregunta` VALUES ('30', 'Promueve el trabajo en grupo', '5');
INSERT INTO `pregunta` VALUES ('31', 'Promueve el dialogo la reflexión y el debate de los temas tratado', '5');
INSERT INTO `pregunta` VALUES ('32', 'Se lograron los resultados de aprendizaje en cada modulo', '6');
INSERT INTO `pregunta` VALUES ('33', 'Le hace saber el docente la importancia de la asignatura', '6');
INSERT INTO `pregunta` VALUES ('34', 'Como evalua el desempeño del docente', '6');
INSERT INTO `pregunta` VALUES ('35', 'Entrega al inicio el programa de la asignatura', '7');
INSERT INTO `pregunta` VALUES ('36', 'Entrega forma y cuando realizara evaluaciones', '7');
INSERT INTO `pregunta` VALUES ('37', 'Distribuye adecuadamente el tiempo en base a objetivos', '7');

-- ----------------------------
-- Table structure for resultados
-- ----------------------------
DROP TABLE IF EXISTS `resultados`;
CREATE TABLE `resultados` (
  `id_resultado` int(11) NOT NULL AUTO_INCREMENT,
  `id_evaluacion` int(11) DEFAULT NULL,
  `id_pregunta` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_resultado`),
  KEY `id_evaluacion` (`id_evaluacion`,`id_pregunta`),
  KEY `id_pregunta` (`id_pregunta`),
  CONSTRAINT `resultados_ibfk_2` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`),
  CONSTRAINT `resultados_ibfk_3` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of resultados
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_user` int(11) DEFAULT NULL,
  `nombre_user` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('6', '1', 'Juan', 'pedro', '1');
INSERT INTO `usuario` VALUES ('7', '1', 'Juan', 'perez', '1');
INSERT INTO `usuario` VALUES ('8', '1', 'Juan', 'Pedro', '1');
INSERT INTO `usuario` VALUES ('9', '1', 'Juan', 'pedro', '1');
INSERT INTO `usuario` VALUES ('10', '2', 'Hector ', '20051995', '1');
INSERT INTO `usuario` VALUES ('11', '1', 'Admin', 'admon', '1');
