# +===================================================================
# |
# | Generado el 03-12-2014 a las 08:12:46 AM 
# | Servidor: localhost:81
# | MySQL Version: 5.6.20
# | PHP Version: 5.5.15
# | Base de datos: 'n260m_15572866_unidad_perquin'
# | Tablas: [0] => atencion_violencia;  [1] => cola;  [2] => consulta;  [3] => control_subsecuente;  [4] => datos;  [5] => departamento;  [6] => deteccion_cancer;  [7] => discapacidad;  [8] => dispensarizacion;  [9] => doctor;  [10] => estableciemiento;  [11] => estado_nutricional;  [12] => estrategia;  [13] => expediente;  [14] => historial;  [15] => inscripcion;  [16] => institucion;  [17] => lactancia_materna;  [18] => local_estrategia;  [19] => pariente_encargado;  [20] => planificacion_familiar;  [21] => receta;  [22] => recurso;  [23] => referencia_interconsulta;  [24] => salud_mental;  [25] => tag;  [26] => tipo_afiliacion;  [27] => tipo_consulta;  [28] => tipo_servicio;  [29] => usuario
# |
# +-------------------------------------------------------------------
  
# | Vaciado de tabla 'atencion_violencia'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'atencion_violencia'
# +------------------------------------->
CREATE TABLE `atencion_violencia` (
  `id_atencion_violencia` int(11) NOT NULL,
  `tipo_atencion_violencia` varchar(100) DEFAULT NULL,
  `descripcion_violencia` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'atencion_violencia'
# +------------------------------------->
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');
INSERT INTO `atencion_violencia` VALUES ('1', 'T', 'Física');
INSERT INTO `atencion_violencia` VALUES ('2', 'T', 'Psicología');
INSERT INTO `atencion_violencia` VALUES ('3', 'T', 'Sexual');
INSERT INTO `atencion_violencia` VALUES ('4', 'T', 'Más de una');
INSERT INTO `atencion_violencia` VALUES ('1', 'A', 'Intrafamiliar');
INSERT INTO `atencion_violencia` VALUES ('2', 'A', 'Comunidad');

  
# | Vaciado de tabla 'cola'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'cola'
# +------------------------------------->
CREATE TABLE `cola` (
  `id_cola` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `cod_expediente` varchar(20) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `observaciones` varchar(50) NOT NULL,
  `entrega_expediente` int(11) NOT NULL,
  `peso` double NOT NULL,
  `temperatura` double NOT NULL,
  `presion` double NOT NULL,
  `altura` double NOT NULL,
  `simtoma` varchar(400) NOT NULL,
  PRIMARY KEY (`id_cola`),
  KEY `cola_ibfk_1` (`id_usuario`),
  KEY `cola_ibfk_3` (`id_doctor`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'cola'
# +------------------------------------->
INSERT INTO `cola` VALUES ('8', '8', '123456', '2014-11-20 06:21:31', '2993', '2', '', '2', '200', '20', '22', '1.2', 'algo');
INSERT INTO `cola` VALUES ('9', '8', '123456', '2014-11-20 06:50:50', '2993', '2', '', '2', '3', '33', '33', '33', 'ldakla');
INSERT INTO `cola` VALUES ('10', '8', '3666', '2014-11-20 11:37:31', '2993', '1', '', '2', '45', '20', '11', '200', '');
INSERT INTO `cola` VALUES ('11', '8', '242135', '2014-11-20 11:42:44', '2993', '2', '', '2', '98', '37', '110', '1.55', 'ninguno solo es por molestar jajaja');
INSERT INTO `cola` VALUES ('12', '8', '986433', '2014-11-22 05:51:25', '2993', '2', '', '1', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('13', '8', '123456', '2014-11-27 11:27:55', '2993', '2', '', '2', '34', '34', '34', '34', '34');
INSERT INTO `cola` VALUES ('14', '8', '986433', '2014-11-28 03:53:44', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('15', '8', '123456', '2014-11-28 03:54:01', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('16', '8', '787', '2014-11-28 03:54:15', '2993', '2', '', '2', '12', '12', '12', '12112', '');
INSERT INTO `cola` VALUES ('17', '8', '242135', '2014-11-28 03:54:30', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('18', '8', '456734', '2014-11-28 03:54:42', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('19', '8', '456734', '2014-11-28 04:35:06', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('20', '8', '4567234', '2014-11-28 04:35:23', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('21', '8', '345445453', '2014-11-28 04:38:59', '2993', '2', '', '2', '12', '12', '21', '12', '12');
INSERT INTO `cola` VALUES ('22', '8', '6456456546', '2014-11-28 04:39:13', '2993', '2', '', '2', '12', '12', '12', '121', '12');
INSERT INTO `cola` VALUES ('23', '8', '5345234534', '2014-11-28 04:39:29', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('24', '8', 'srert', '2014-11-28 04:39:43', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('25', '8', '986433', '2014-11-28 10:52:21', '2993', '2', '', '2', '12', '12', '12', '12112', '');
INSERT INTO `cola` VALUES ('26', '8', '6456456546', '2014-11-29 12:02:26', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('27', '8', '986433', '2014-11-29 12:02:49', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('28', '8', '456734', '2014-11-29 12:03:00', '2993', '2', '', '2', '12', '12', '12', '21', '12');
INSERT INTO `cola` VALUES ('29', '8', '5345234534', '2014-11-29 12:03:11', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('30', '8', 'srert', '2014-11-29 12:03:30', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('31', '8', '456734', '2014-11-29 12:04:28', '2993', '2', '', '2', '12', '12', '12', '12112', '');
INSERT INTO `cola` VALUES ('32', '8', '787', '2014-11-29 12:04:48', '2993', '2', '', '2', '12', '12', '12', '12112', '');
INSERT INTO `cola` VALUES ('33', '8', '242135', '2014-11-29 12:05:09', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('34', '8', '5345234534', '2014-11-29 12:05:26', '2993', '2', '', '2', '12', '12', '12', '12112', '12');
INSERT INTO `cola` VALUES ('35', '8', '345445453', '2014-11-29 12:05:56', '2993', '2', '', '2', '12', '12', '12', '11', '');
INSERT INTO `cola` VALUES ('36', '8', '6456456546', '2014-11-29 12:39:06', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('37', '8', '123456', '2014-11-29 12:39:21', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('38', '8', '242135', '2014-11-29 12:39:34', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('39', '8', '787', '2014-11-29 12:39:55', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('40', '8', '456734', '2014-11-29 12:40:09', '2993', '2', '', '2', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('41', '8', '242135', '2014-11-30 01:03:49', '2993', '2', '', '1', '12', '12', '12', '12112', '12');
INSERT INTO `cola` VALUES ('42', '8', '986433', '2014-11-30 01:04:11', '2993', '2', '', '1', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('43', '8', '345445453', '2014-11-30 01:04:25', '2993', '2', '', '1', '12', '12', '12', '121', '12');
INSERT INTO `cola` VALUES ('44', '8', '456734', '2014-11-30 01:28:38', '2993', '2', '', '2', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('45', '8', '986433', '2014-12-01 11:55:16', '2993', '2', '', '1', '12', '12', '12', '12', '12');
INSERT INTO `cola` VALUES ('46', '8', '123456', '2014-12-01 11:55:34', '2993', '2', '', '1', '12', '12', '12', '12', '');
INSERT INTO `cola` VALUES ('47', '8', '787', '2014-12-01 08:30:48', '2993', '1', '', '1', '12', '12', '12', '121', '12');
INSERT INTO `cola` VALUES ('48', '8', '456734', '2014-12-02 06:33:48', '2993', '2', '', '1', '12', '12', '12', '121', '12');
INSERT INTO `cola` VALUES ('49', '8', '986433', '2014-12-02 11:07:24', '2993', '2', '', '1', '12', '77', '67', '150', 'Problemas respiratorios');
INSERT INTO `cola` VALUES ('50', '8', '986433', '2014-12-02 11:41:53', '2993', '2', '', '1', '2', '323', '232', '232', 'w');
INSERT INTO `cola` VALUES ('51', '8', '986433', '2014-12-02 11:50:18', '2993', '2', '', '1', '32', '23', '23', '232', '2ds');
INSERT INTO `cola` VALUES ('52', '8', '986433', '2014-12-03 12:02:02', '2993', '2', '', '1', '23', '3232', '232', '232', 'nada');
INSERT INTO `cola` VALUES ('53', '8', '986433', '2014-12-03 12:51:32', '2993', '2', '', '2', '23', '23', '232', '232', 'ada');
INSERT INTO `cola` VALUES ('54', '8', '123456', '2014-12-03 12:51:48', '2993', '2', '', '2', '23', '22', '553', '232', 'hola');
INSERT INTO `cola` VALUES ('55', '8', '0102030405', '2014-12-03 12:52:22', '2993', '2', '', '2', '323', '232', '232', '23', 'ass');
INSERT INTO `cola` VALUES ('56', '8', '345445453', '2014-12-03 01:06:31', '2993', '1', '', '2', '2', '232', '232', '22', 'nada');
INSERT INTO `cola` VALUES ('57', '8', '787', '2014-12-03 01:06:50', '2993', '1', '', '2', '23', '23', '23', '23', 'ajshj');

  
# | Vaciado de tabla 'consulta'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'consulta'
# +------------------------------------->
CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `cod_expediente` varchar(20) DEFAULT NULL,
  `escuela_promotora_salud` varchar(200) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `anos_consulta` int(11) DEFAULT NULL,
  `meses_consulta` int(11) DEFAULT NULL,
  `dias_consulta` int(11) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `Area` varchar(15) DEFAULT NULL,
  `UCSF_UCSFE` varchar(100) DEFAULT NULL,
  `id_inscripcion` int(11) DEFAULT NULL,
  `id_control_subsecuente` int(11) DEFAULT NULL,
  `dispensarizacionG` int(11) DEFAULT NULL,
  `dispensarizacionT` int(11) DEFAULT NULL,
  `id_lactancia_materna` int(11) DEFAULT NULL,
  `estado_nutricional_PE` int(11) DEFAULT NULL,
  `estado_nutricional_PT` int(11) DEFAULT NULL,
  `estado_nutricional_LTE` int(11) DEFAULT NULL,
  `IMC` int(11) DEFAULT NULL,
  `planificacionI` int(11) DEFAULT NULL,
  `planificacionT` int(11) DEFAULT NULL,
  `planificacionU` int(11) DEFAULT NULL,
  `id_deteccion_cancer` int(11) DEFAULT NULL,
  `numero_semanas_amonorrea` int(11) DEFAULT NULL,
  `id_tipo_consultaP` int(11) DEFAULT NULL,
  `id_tipo_consulta_especialista` int(11) DEFAULT NULL,
  `sospecha` varchar(200) DEFAULT NULL,
  `principal` varchar(200) DEFAULT NULL,
  `codigo_CIE1` varchar(100) DEFAULT NULL,
  `id_tipo_consultaA` int(11) DEFAULT NULL,
  `otras_afecciones` varchar(100) DEFAULT NULL,
  `codigo_CIE2` varchar(100) DEFAULT NULL,
  `causa_externa_morbilidad` varchar(200) DEFAULT NULL,
  `codigo_CIE3` varchar(100) DEFAULT NULL,
  `id_discapacidad` int(11) DEFAULT NULL,
  `violenciaT` int(11) DEFAULT NULL,
  `violenciaA` int(11) DEFAULT NULL,
  `id_procedimiento` int(11) DEFAULT NULL,
  `hospitalario` varchar(100) DEFAULT NULL,
  `id_refencia` int(11) DEFAULT NULL,
  `establecimiento_a` varchar(100) DEFAULT NULL,
  `establecimiento_de` varchar(100) DEFAULT NULL,
  `id_afiliacion` int(11) DEFAULT NULL,
  `numero_afilacion` varchar(100) DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `fecha_hora_consulta` datetime DEFAULT NULL,
  PRIMARY KEY (`id_consulta`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
 
 
# | Carga de datos de la tabla 'consulta'
# +------------------------------------->
INSERT INTO `consulta` VALUES ('36', '123456', '1', '', '20', '33', '4', '12', 'el jute', '1', '333', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '33', '1', '1', 'sospecha', 'enfermo', '39393', '1', 'niguna', '333', 'algo', '9393', '2', '1', '1', '1', NULL, '1', 'san salvador', 'perquin', '1', '3q2324', '2993', '2014-11-20 06:24:01');
INSERT INTO `consulta` VALUES ('37', '123456', '1', '', '20', '3', '3', '1', '3', '1', '44', '1', '1', '1', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', NULL, '0', '', '', '0', '', '2993', '2014-11-20 06:51:40');
INSERT INTO `consulta` VALUES ('38', '986433', '', 'M', '20', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 04:46:17');
INSERT INTO `consulta` VALUES ('39', '123456', '', 'M', '20', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 04:57:36');
INSERT INTO `consulta` VALUES ('40', '787', '', 'M', '19', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 04:58:56');
INSERT INTO `consulta` VALUES ('41', '242135', '', 'F', '19', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 05:25:46');
INSERT INTO `consulta` VALUES ('42', '456734', '', 'M', '18', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 05:44:34');
INSERT INTO `consulta` VALUES ('43', '4567234', '', 'M', '18', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 05:46:42');
INSERT INTO `consulta` VALUES ('44', '345445453', '', '', '2014', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 05:54:01');
INSERT INTO `consulta` VALUES ('45', '6456456546', '', '', '2014', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 05:55:10');
INSERT INTO `consulta` VALUES ('46', '5345234534', '', '', '2014', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 06:02:59');
INSERT INTO `consulta` VALUES ('47', 'srert', '', '', '2014', '0', '0', '0', '4', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-28 06:03:07');
INSERT INTO `consulta` VALUES ('48', '6456456546', '', '', '2014', '0', '0', '0', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:31:41');
INSERT INTO `consulta` VALUES ('49', '986433', '', '', '20', '0', '0', '0', '2', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:31:50');
INSERT INTO `consulta` VALUES ('50', '456734', '', '', '18', '0', '0', '0', '3', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:32:00');
INSERT INTO `consulta` VALUES ('51', '5345234534', '', '', '2014', '0', '0', '0', '4', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:32:13');
INSERT INTO `consulta` VALUES ('52', 'srert', '', '', '2014', '0', '0', '0', '5', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:35:03');
INSERT INTO `consulta` VALUES ('53', '787', '', '', '19', '0', '0', '0', '6', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:35:13');
INSERT INTO `consulta` VALUES ('54', '242135', '', '', '19', '0', '0', '0', '7', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:35:39');
INSERT INTO `consulta` VALUES ('55', '345445453', '', '', '2014', '0', '0', '0', '8', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:36:10');
INSERT INTO `consulta` VALUES ('56', '6456456546', '', '', '2014', '0', '0', '0', '9', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 12:42:34');
INSERT INTO `consulta` VALUES ('57', '123456', '', '', '20', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 01:39:46');
INSERT INTO `consulta` VALUES ('58', '242135', '', '', '19', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 01:39:55');
INSERT INTO `consulta` VALUES ('59', '787', '', '', '19', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 01:40:15');
INSERT INTO `consulta` VALUES ('60', '456734', '', '', '18', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-29 01:40:28');
INSERT INTO `consulta` VALUES ('61', '242135', '', '', '19', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-30 01:05:10');
INSERT INTO `consulta` VALUES ('62', '986433', '', '', '20', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-30 01:06:21');
INSERT INTO `consulta` VALUES ('63', '345445453', '', 'F', '2014', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-30 10:54:24');
INSERT INTO `consulta` VALUES ('64', '345445453', '', 'F', '2014', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-11-30 10:58:23');
INSERT INTO `consulta` VALUES ('65', '986433', '', 'M', '20', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-12-01 12:01:05');
INSERT INTO `consulta` VALUES ('66', '123456', '', 'M', '20', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-12-01 12:02:05');
INSERT INTO `consulta` VALUES ('67', '986433', '1', 'M', '20', '7', '5', '12', 'San Miguel', '1', '123', '2', '2', '2', '2', '3', '1', '1', '1', '2', '1', '2', '4', '3', '3', '1', '1', 'Nada', 'nada', '878', '1', 'nada', '87', 'nad', '87', '0', '3', '2', '1', 'ayer', '1', 'san miguel', 'perquin', '2', '2324', '2993', '2014-12-02 11:41:02');
INSERT INTO `consulta` VALUES ('68', '986433', '1', 'M', '20', '23', '3232', '12', 'asa', '1', '223', '1', '4', '3', '2', '1', '1', '3', '2', '2', '1', '2', '1', '3', '343', '1', '1', 'nada', 'nada', '232', '1', 'nada', '232', 'nada', '232', '3', '4', '1', '2', '', '2', 'aa', 'sdsd', '3', '232', '2993', '2014-12-02 11:46:45');
INSERT INTO `consulta` VALUES ('69', '456734', '1', 'M', '18', '2', '2', '17', 'assa', '1', '2323', '3', '3', '2', '2', '1', '2', '3', '1', '1', '2', '1', '1', '1', '8', '1', '1', 'Nada', 'nad', '8', '1', 'nada', '8', 'nada', '8', '2', '1', '1', '1', 'ayer', '1', 'aa', 'perquin', '1', '87878', '2993', '2014-12-03 12:00:42');
INSERT INTO `consulta` VALUES ('70', '986433', '1', 'M', '20', '43', '343', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '2', 'nada', 'nad', '78', '2', 'nada', '78', 'nad', '78', '0', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-12-03 12:54:28');
INSERT INTO `consulta` VALUES ('71', '123456', '1', 'M', '20', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '0', '4', '0', '0', '', '0', '', '', '0', '', '2993', '2014-12-03 01:02:52');
INSERT INTO `consulta` VALUES ('72', '0102030405', '', 'F', '24', '0', '0', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '', '', '', '', '2', '0', '0', '0', '', '0', '', '', '0', '', '2993', '2014-12-03 01:03:53');

  
# | Vaciado de tabla 'control_subsecuente'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'control_subsecuente'
# +------------------------------------->
CREATE TABLE `control_subsecuente` (
  `id_control_subsecuente` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_control` varchar(100) NOT NULL,
  PRIMARY KEY (`id_control_subsecuente`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'control_subsecuente'
# +------------------------------------->
INSERT INTO `control_subsecuente` VALUES ('1', 'Infantil, Adolescente, Adulto, Adulto Mayor');
INSERT INTO `control_subsecuente` VALUES ('2', 'Materno');
INSERT INTO `control_subsecuente` VALUES ('3', 'Puerperal');
INSERT INTO `control_subsecuente` VALUES ('4', 'Climaterio y Menopausia');

  
# | Vaciado de tabla 'datos'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'datos'
# +------------------------------------->
CREATE TABLE `datos` (
  `id_datos` int(11) NOT NULL AUTO_INCREMENT,
  `intitucion` int(2) DEFAULT NULL,
  `establecimiento` varchar(100) DEFAULT NULL,
  `servicio` int(2) DEFAULT NULL,
  `modalidad` varchar(100) DEFAULT NULL,
  `estartegia` int(2) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `fecha_consulta` date DEFAULT NULL,
  `no` int(5) DEFAULT NULL,
  `recurso` int(2) DEFAULT NULL,
  `cod_doctor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_datos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'datos'
# +------------------------------------->
INSERT INTO `datos` VALUES ('1', '1', 'clinica', '1', NULL, '1', NULL, '2014-11-30', '1', '1', '2993');
INSERT INTO `datos` VALUES ('2', '2', 'clinica', '2', '', '2', '', '2014-11-30', '2', '2', '2993');
INSERT INTO `datos` VALUES ('3', '2', 'clinica', '3', '', '3', '', '2014-11-30', '3', '3', '2993');
INSERT INTO `datos` VALUES ('4', '1', '', '2', '', '2', '', '2014-12-01', '0', '2', '2993');
INSERT INTO `datos` VALUES ('5', '1', 'ninguno', '1', 'as', '1', 'asa', '0000-00-00', '2', '1', '2993');

  
# | Vaciado de tabla 'departamento'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'departamento'
# +------------------------------------->
CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'departamento'
# +------------------------------------->
INSERT INTO `departamento` VALUES ('1', 'Ahuachapan');
INSERT INTO `departamento` VALUES ('2', 'Santa Ana');
INSERT INTO `departamento` VALUES ('3', 'Sonsonate');
INSERT INTO `departamento` VALUES ('4', 'Chalatenango');
INSERT INTO `departamento` VALUES ('5', 'La Libertad');
INSERT INTO `departamento` VALUES ('6', 'San salvador');
INSERT INTO `departamento` VALUES ('7', 'Cuscatlan');
INSERT INTO `departamento` VALUES ('8', 'La paz');
INSERT INTO `departamento` VALUES ('9', 'Cabañas');
INSERT INTO `departamento` VALUES ('10', 'San Vicente');
INSERT INTO `departamento` VALUES ('11', 'Usulutan');
INSERT INTO `departamento` VALUES ('12', 'San Miguel');
INSERT INTO `departamento` VALUES ('13', 'Morazan');
INSERT INTO `departamento` VALUES ('14', 'La Union');
INSERT INTO `departamento` VALUES ('15', 'Guatemala');
INSERT INTO `departamento` VALUES ('16', 'Honduras');
INSERT INTO `departamento` VALUES ('17', 'Nicaragua');
INSERT INTO `departamento` VALUES ('18', 'Costa Rica');
INSERT INTO `departamento` VALUES ('19', 'Panama');
INSERT INTO `departamento` VALUES ('20', 'Otros/paises');

  
# | Vaciado de tabla 'deteccion_cancer'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'deteccion_cancer'
# +------------------------------------->
CREATE TABLE `deteccion_cancer` (
  `id_deteccion_cancer` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_deteccion_cancer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_deteccion_cancer`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'deteccion_cancer'
# +------------------------------------->
INSERT INTO `deteccion_cancer` VALUES ('1', 'Toma de citologia vaginal de 1a. Vez en la vida');
INSERT INTO `deteccion_cancer` VALUES ('2', 'Toma de citologia vaginal subsecuente del programa');
INSERT INTO `deteccion_cancer` VALUES ('3', 'Examen de prostata');
INSERT INTO `deteccion_cancer` VALUES ('4', 'Inspeccion visual con Acido Acetico (IVAA)');

  
# | Vaciado de tabla 'discapacidad'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'discapacidad'
# +------------------------------------->
CREATE TABLE `discapacidad` (
  `id_discapacidad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_discapacidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_discapacidad`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'discapacidad'
# +------------------------------------->
INSERT INTO `discapacidad` VALUES ('1', 'Física');
INSERT INTO `discapacidad` VALUES ('2', 'Auditiva');
INSERT INTO `discapacidad` VALUES ('3', 'Visual');
INSERT INTO `discapacidad` VALUES ('4', 'Mental');
INSERT INTO `discapacidad` VALUES ('5', 'Con más de una Discapacidad');

  
# | Vaciado de tabla 'dispensarizacion'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'dispensarizacion'
# +------------------------------------->
CREATE TABLE `dispensarizacion` (
  `id_dispensarizacion` int(11) NOT NULL,
  `indicador_dispensarizacion` varchar(30) DEFAULT NULL,
  `descripcion_dispensarizacion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'dispensarizacion'
# +------------------------------------->
INSERT INTO `dispensarizacion` VALUES ('1', 'G', 'Grupo I: Supuestamente Sano');
INSERT INTO `dispensarizacion` VALUES ('2', 'G', 'Grupo II: Con Riesgo');
INSERT INTO `dispensarizacion` VALUES ('3', 'G', 'Grupo III: Enfermo');
INSERT INTO `dispensarizacion` VALUES ('4', 'G', 'Grupo IV: Con Discapacidad');
INSERT INTO `dispensarizacion` VALUES ('1', 'T', 'Inicial');
INSERT INTO `dispensarizacion` VALUES ('2', 'T', 'Seguimiento');
INSERT INTO `dispensarizacion` VALUES ('1', 'G', 'Grupo I: Supuestamente Sano');
INSERT INTO `dispensarizacion` VALUES ('2', 'G', 'Grupo II: Con Riesgo');
INSERT INTO `dispensarizacion` VALUES ('3', 'G', 'Grupo III: Enfermo');
INSERT INTO `dispensarizacion` VALUES ('4', 'G', 'Grupo IV: Con Discapacidad');
INSERT INTO `dispensarizacion` VALUES ('1', 'T', 'Inicial');
INSERT INTO `dispensarizacion` VALUES ('2', 'T', 'Seguimiento');

  
# | Vaciado de tabla 'doctor'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'doctor'
# +------------------------------------->
CREATE TABLE `doctor` (
  `cod_doctor` int(11) NOT NULL,
  `nombre_doctor` varchar(100) DEFAULT NULL,
  `apellido_doctor` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `dui` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_doctor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'doctor'
# +------------------------------------->
INSERT INTO `doctor` VALUES ('2993', 'luis', 'lovos', '74565', '787878');

  
# | Vaciado de tabla 'estableciemiento'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'estableciemiento'
# +------------------------------------->
CREATE TABLE `estableciemiento` (
  `id_estableciemiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estableciemiento` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estableciemiento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'estableciemiento'
# +------------------------------------->

  
# | Vaciado de tabla 'estado_nutricional'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'estado_nutricional'
# +------------------------------------->
CREATE TABLE `estado_nutricional` (
  `id_estado_nutricional` int(11) NOT NULL,
  `tipo_nutricion` varchar(100) NOT NULL,
  `descripcion_nutricion` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'estado_nutricional'
# +------------------------------------->
INSERT INTO `estado_nutricional` VALUES ('1', 'Peso-Edad', 'Normal');
INSERT INTO `estado_nutricional` VALUES ('2', 'Peso-Edad', 'Desnutrición');
INSERT INTO `estado_nutricional` VALUES ('3', 'Peso-Edad', 'Desnutrición Severa');
INSERT INTO `estado_nutricional` VALUES ('1', 'Peso-Talla', 'Normal');
INSERT INTO `estado_nutricional` VALUES ('2', 'Peso-Talla', 'Desnutrición');
INSERT INTO `estado_nutricional` VALUES ('3', 'Peso-Talla', 'Desnutrición Severa');
INSERT INTO `estado_nutricional` VALUES ('4', 'Peso-Talla', 'Sobrepeso');
INSERT INTO `estado_nutricional` VALUES ('5', 'Peso-Talla', 'Obesidad');
INSERT INTO `estado_nutricional` VALUES ('1', 'Longitud/Talla-Edad', 'Normal');
INSERT INTO `estado_nutricional` VALUES ('2', 'Longitud/Talla-Edad', 'Talla Alta');
INSERT INTO `estado_nutricional` VALUES ('3', 'Longitud/Talla-Edad', 'Retardo del Crecimiento');
INSERT INTO `estado_nutricional` VALUES ('4', 'Longitud/Talla-Edad', 'Retardo Severo de Crecimiento');
INSERT INTO `estado_nutricional` VALUES ('1', 'IMC', 'Normal');
INSERT INTO `estado_nutricional` VALUES ('2', 'IMC', 'Peso Bajo');
INSERT INTO `estado_nutricional` VALUES ('3', 'IMC', 'Desnutrición');
INSERT INTO `estado_nutricional` VALUES ('4', 'IMC', 'Sobrepeso');
INSERT INTO `estado_nutricional` VALUES ('5', 'IMC', 'Obesidad');
INSERT INTO `estado_nutricional` VALUES ('6', 'IMC', 'Desnutrición Severa');

  
# | Vaciado de tabla 'estrategia'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'estrategia'
# +------------------------------------->
CREATE TABLE `estrategia` (
  `id_estrategia` int(11) NOT NULL AUTO_INCREMENT,
  `estrategia` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estrategia`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'estrategia'
# +------------------------------------->
INSERT INTO `estrategia` VALUES ('1', 'Comunitaria');
INSERT INTO `estrategia` VALUES ('2', 'Centro Educativo');
INSERT INTO `estrategia` VALUES ('3', 'Albergue');
INSERT INTO `estrategia` VALUES ('4', 'Otro Establecimiento de Salud');

  
# | Vaciado de tabla 'expediente'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'expediente'
# +------------------------------------->
CREATE TABLE `expediente` (
  `cod_expediente` varchar(20) NOT NULL,
  `primer_Nombre` varchar(100) DEFAULT NULL,
  `segundo_Nombre` varchar(100) DEFAULT NULL,
  `primer_Apellido` varchar(100) DEFAULT NULL,
  `segundo_Apellido` varchar(100) DEFAULT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `numero_documento` varchar(50) DEFAULT NULL,
  `fecha_hora_creacion` datetime DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `Fecha_nac` date DEFAULT NULL,
  `Lugar_nac` varchar(100) DEFAULT NULL,
  `observaciones` varchar(400) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `estado_civil` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cod_expediente`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'expediente'
# +------------------------------------->
INSERT INTO `expediente` VALUES ('986433', 'Oscar', 'Francisco', 'Romero', 'Villatoro', 'DUI', '0500698-4', '2014-11-20 11:34:54', 'M', '1994-06-06', 'San Miguel', '', 'Estudiante', '76438876', 'Soltero', '8', '1');
INSERT INTO `expediente` VALUES ('123456', 'Carlos', 'Ernesto', 'Amaya', 'Rodriguez', 'DUI', '45236712-0', '2014-11-20 06:16:44', 'M', '1994-02-03', 'San Miguel', '', 'estudiante', '72681965', 'Soltero', '8', '1');
INSERT INTO `expediente` VALUES ('787', 'Hector ', 'Moises', 'Castro', 'Granados', 'DUI', '7767676767', '2014-11-20 11:37:54', 'M', '1995-05-20', 'San Miguel', 'Nada relevante', 'Estudiante', '6767687', 'Soltero', '8', '1');
INSERT INTO `expediente` VALUES ('242135', 'Rosa', 'Margarita', 'Diaz', 'Majano', 'DUI', '93589370357-0', '2014-11-20 11:41:15', 'F', '1995-06-24', 'San Miguel', '', 'Estudiante', '2147483647', 'Soltero', '8', '1');
INSERT INTO `expediente` VALUES ('456734', 'Luis', 'Ricardo', 'Argueta', 'Cruz', 'DUI', '87655332-1', '2014-11-20 11:53:47', 'M', '1996-08-23', 'San Miguel', '', 'Estudiante', '87654398', 'Soltero', '8', '1');
INSERT INTO `expediente` VALUES ('4567234', 'Willson', 'Alexander', 'Ortiz', 'Granados', 'DUI', '45672356-0', '2014-11-20 11:56:19', 'M', '1996-02-14', 'San Miguel', '', 'Estudiante', '74567823', 'Soltero', '8', '1');
INSERT INTO `expediente` VALUES ('345445453', 'Merles', 'Argentina', 'Amaya', 'de Rodriguez', 'DUI', '', '2014-11-27 09:47:11', 'F', '2014-05-13', '', '', '', '0', '0', '8', '1');
INSERT INTO `expediente` VALUES ('6456456546', 'Carlos', 'Ernesto', 'Amaya', '', 'DUI', '', '2014-11-27 09:50:50', 'M', '2013-01-01', '', '', '', '0', '0', '8', '1');
INSERT INTO `expediente` VALUES ('5345234534', 'Merlen ', 'Cecilia', 'Amaya', 'Rodriguez', 'DUI', '', '2014-11-27 10:08:38', 'F', '1990-06-06', '', '', '', '0', '0', '8', '1');
INSERT INTO `expediente` VALUES ('srert', 'Elbin', 'Alejandro', 'Amaya', 'Rodriguez', 'DUI', '', '2014-11-27 10:47:57', 'M', '1989-01-02', '', '', '', '0', '0', '8', '1');
INSERT INTO `expediente` VALUES ('2345345345', '', '', '', '', 'DUI', '', '2014-11-27 11:24:34', 'F', '1988-12-27', '', '', '', '0', '0', '8', '1');
INSERT INTO `expediente` VALUES ('0000000000', '1', '2', '3', '4', 'DUI', '6', '2014-11-28 01:22:23', 'F', '2009-02-05', '5', '7', '8', '9', 'Soltero', '8', '1');
INSERT INTO `expediente` VALUES ('0102030405', 'Norma', 'Liliana', 'Peña ', 'Villalta', 'PASAPORTE', '098765432-1', '2014-12-02 12:09:32', 'F', '1990-02-28', '', '', 'Estudiante', '2147483647', 'Soltero', '8', '1');

  
# | Vaciado de tabla 'historial'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'historial'
# +------------------------------------->
CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `id_cola` int(11) DEFAULT NULL,
  `consulta_por` varchar(100) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `id_expediente` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_historial`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'historial'
# +------------------------------------->
INSERT INTO `historial` VALUES ('1', '40', 'dolor de cabeza', '2014-11-04 08:45:48', '2993', '60', '787');
INSERT INTO `historial` VALUES ('2', '52', 'NAda', '2014-12-03 12:02:37', '2993', '20', '986433');
INSERT INTO `historial` VALUES ('3', '52', 'NAda', '2014-12-03 12:03:56', '2993', '20', '986433');

  
# | Vaciado de tabla 'inscripcion'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'inscripcion'
# +------------------------------------->
CREATE TABLE `inscripcion` (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `inscripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_inscripcion`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'inscripcion'
# +------------------------------------->
INSERT INTO `inscripcion` VALUES ('1', 'Infantil, Adolescente, Adulto, Adulto Mayor');
INSERT INTO `inscripcion` VALUES ('2', 'Materno Inscritas menos de 12 meses');
INSERT INTO `inscripcion` VALUES ('3', 'Materno más de 12 meses');
INSERT INTO `inscripcion` VALUES ('4', 'Climaterio y Menopausia');
INSERT INTO `inscripcion` VALUES ('5', 'Preconcepcional');

  
# | Vaciado de tabla 'institucion'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'institucion'
# +------------------------------------->
CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_institucion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'institucion'
# +------------------------------------->
INSERT INTO `institucion` VALUES ('1', 'MINSAL');
INSERT INTO `institucion` VALUES ('2', 'FOSALUD');

  
# | Vaciado de tabla 'lactancia_materna'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'lactancia_materna'
# +------------------------------------->
CREATE TABLE `lactancia_materna` (
  `id_lactancia_Materna` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_lactancia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_lactancia_Materna`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'lactancia_materna'
# +------------------------------------->
INSERT INTO `lactancia_materna` VALUES ('1', 'Exclusiva');
INSERT INTO `lactancia_materna` VALUES ('2', 'Predominante o Complementaria');
INSERT INTO `lactancia_materna` VALUES ('3', 'Sin Lactancia');

  
# | Vaciado de tabla 'local_estrategia'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'local_estrategia'
# +------------------------------------->
CREATE TABLE `local_estrategia` (
  `id_local_estrategia` int(11) NOT NULL AUTO_INCREMENT,
  `local_estrategia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_local_estrategia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'local_estrategia'
# +------------------------------------->

  
# | Vaciado de tabla 'pariente_encargado'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'pariente_encargado'
# +------------------------------------->
CREATE TABLE `pariente_encargado` (
  `cod_pariente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pariente` varchar(100) DEFAULT NULL,
  `apellido_pariente` varchar(100) DEFAULT NULL,
  `numero_documento` varchar(100) DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT NULL,
  `parentesco` varchar(50) DEFAULT NULL,
  `responsable` varchar(2) DEFAULT NULL,
  `cod_expediente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_pariente`),
  KEY `cod_expediente` (`cod_expediente`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'pariente_encargado'
# +------------------------------------->
INSERT INTO `pariente_encargado` VALUES ('17', 'Juan', 'Pretronilo', '12334556-9', 'cuidad pacifica', 'PADRE', 'SI', '0102030405');
INSERT INTO `pariente_encargado` VALUES ('18', 'Norma', 'Villalta', '34567834-6', NULL, 'MADRE', NULL, '0102030405');

  
# | Vaciado de tabla 'planificacion_familiar'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'planificacion_familiar'
# +------------------------------------->
CREATE TABLE `planificacion_familiar` (
  `id_planificacion` int(11) NOT NULL,
  `tipo_planificacion` varchar(100) DEFAULT NULL,
  `descripcion_planificacion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'planificacion_familiar'
# +------------------------------------->
INSERT INTO `planificacion_familiar` VALUES ('1', 'i', 'Inscripcion');
INSERT INTO `planificacion_familiar` VALUES ('2', 'i', 'Control normal');
INSERT INTO `planificacion_familiar` VALUES ('3', 'i', 'control por morbilidad');
INSERT INTO `planificacion_familiar` VALUES ('1', 't', 'Inyectable');
INSERT INTO `planificacion_familiar` VALUES ('2', 't', 'oral');
INSERT INTO `planificacion_familiar` VALUES ('3', 't', 'barrera');
INSERT INTO `planificacion_familiar` VALUES ('4', 't', 'Dispositivos intrauterino');
INSERT INTO `planificacion_familiar` VALUES ('5', 't', 'Natural');
INSERT INTO `planificacion_familiar` VALUES ('6', 't', 'intradermico');
INSERT INTO `planificacion_familiar` VALUES ('7', 't', 'otro');
INSERT INTO `planificacion_familiar` VALUES ('1', 'u', 'inyectable');
INSERT INTO `planificacion_familiar` VALUES ('2', 'u', 'oral');
INSERT INTO `planificacion_familiar` VALUES ('3', 'u', 'barrera');
INSERT INTO `planificacion_familiar` VALUES ('4', 'u', 'dispositivos intrauterino');
INSERT INTO `planificacion_familiar` VALUES ('5', 'u', 'natural');
INSERT INTO `planificacion_familiar` VALUES ('6', 'u', 'intradermico');
INSERT INTO `planificacion_familiar` VALUES ('7', 'u', 'otro');

  
# | Vaciado de tabla 'receta'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'receta'
# +------------------------------------->
CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion_hora` datetime DEFAULT NULL,
  `contenido` varchar(50000) DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `id_consulta` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_receta`),
  KEY `id_doctor` (`id_doctor`),
  KEY `id_consulta` (`id_consulta`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'receta'
# +------------------------------------->
INSERT INTO `receta` VALUES ('18', '2014-12-03 12:00:51', 'Papel', '2993', '69', '2');
INSERT INTO `receta` VALUES ('19', '2014-12-03 12:55:20', 'hola', '2993', '70', '2');
INSERT INTO `receta` VALUES ('20', '2014-12-03 01:04:20', 'un sobre de acetaminofen', '2993', '72', '2');

  
# | Vaciado de tabla 'recurso'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'recurso'
# +------------------------------------->
CREATE TABLE `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `recurso` varchar(100) NOT NULL,
  PRIMARY KEY (`id_recurso`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'recurso'
# +------------------------------------->
INSERT INTO `recurso` VALUES ('1', 'Médico');
INSERT INTO `recurso` VALUES ('2', 'Enfermera');
INSERT INTO `recurso` VALUES ('3', 'Nutricionista');
INSERT INTO `recurso` VALUES ('4', 'Psicólogo');

  
# | Vaciado de tabla 'referencia_interconsulta'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'referencia_interconsulta'
# +------------------------------------->
CREATE TABLE `referencia_interconsulta` (
  `id_referencia` int(11) NOT NULL AUTO_INCREMENT,
  `referencia_interconsulta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_referencia`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'referencia_interconsulta'
# +------------------------------------->
INSERT INTO `referencia_interconsulta` VALUES ('1', 'Referencia');
INSERT INTO `referencia_interconsulta` VALUES ('2', 'Interconsulta');

  
# | Vaciado de tabla 'salud_mental'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'salud_mental'
# +------------------------------------->
CREATE TABLE `salud_mental` (
  `id_procedimiento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_procedimiento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_procedimiento`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'salud_mental'
# +------------------------------------->
INSERT INTO `salud_mental` VALUES ('1', 'Prueba Psicométrica');
INSERT INTO `salud_mental` VALUES ('2', 'Psicoterapia Individual');
INSERT INTO `salud_mental` VALUES ('3', 'Intervención en Crisis');
INSERT INTO `salud_mental` VALUES ('4', 'Primeros Auxilios Psicológicos ');

  
# | Vaciado de tabla 'tag'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'tag'
# +------------------------------------->
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_expediente` int(11) DEFAULT NULL,
  `top` int(11) NOT NULL,
  `left` int(11) NOT NULL,
  `meses` varchar(255) NOT NULL,
  `estado` varchar(6000) NOT NULL,
  `embarazo` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(6000) DEFAULT NULL,
  `estado_embarazada` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'tag'
# +------------------------------------->
INSERT INTO `tag` VALUES ('35', NULL, '338', '495', '4', 'Sin problemas', NULL, NULL, NULL);
INSERT INTO `tag` VALUES ('34', NULL, '254', '717', '6', 'Embarazo complicado', NULL, NULL, NULL);
INSERT INTO `tag` VALUES ('33', NULL, '194', '482', '5', 'Sin problema actualmente', NULL, NULL, NULL);
INSERT INTO `tag` VALUES ('37', '242135', '479', '289', '7', 'Nada fuera de lo nomal', 'BAJO RIESGO', 'Muy bien', '2');
INSERT INTO `tag` VALUES ('38', '2147483647', '283', '433', '20', 'Muy hasta hoy', 'BAJO RIESGO', 'colonia', '1');
INSERT INTO `tag` VALUES ('39', '345445453', '384', '350', '17', 'Muy bien', 'BAJO RIESGO', 'colonia', '1');

  
# | Vaciado de tabla 'tipo_afiliacion'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'tipo_afiliacion'
# +------------------------------------->
CREATE TABLE `tipo_afiliacion` (
  `id_afiliacion` int(11) NOT NULL AUTO_INCREMENT,
  `dato_afiliacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_afiliacion`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'tipo_afiliacion'
# +------------------------------------->
INSERT INTO `tipo_afiliacion` VALUES ('1', 'Cotizante ISSS');
INSERT INTO `tipo_afiliacion` VALUES ('2', 'Beneficiario ISSS');
INSERT INTO `tipo_afiliacion` VALUES ('3', 'Veterano de Guerra');
INSERT INTO `tipo_afiliacion` VALUES ('4', 'Cotizante ISBM');
INSERT INTO `tipo_afiliacion` VALUES ('5', 'Beneficiario ISBM');
INSERT INTO `tipo_afiliacion` VALUES ('6', 'Cotizante IPSFA');
INSERT INTO `tipo_afiliacion` VALUES ('7', 'Beneficiario IPSFA');

  
# | Vaciado de tabla 'tipo_consulta'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'tipo_consulta'
# +------------------------------------->
CREATE TABLE `tipo_consulta` (
  `id_tipo_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`id_tipo_consulta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'tipo_consulta'
# +------------------------------------->
INSERT INTO `tipo_consulta` VALUES ('1', 'Primera Vez');
INSERT INTO `tipo_consulta` VALUES ('2', 'Subsecuente');

  
# | Vaciado de tabla 'tipo_servicio'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'tipo_servicio'
# +------------------------------------->
CREATE TABLE `tipo_servicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` varchar(20) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'tipo_servicio'
# +------------------------------------->
INSERT INTO `tipo_servicio` VALUES ('1', 'Consulta Externa');
INSERT INTO `tipo_servicio` VALUES ('2', 'Emergencia');
INSERT INTO `tipo_servicio` VALUES ('3', 'Extramural');

  
# | Vaciado de tabla 'usuario'
# +------------------------------------->
# No especificado.
 
 
# | Estructura de la tabla 'usuario'
# +------------------------------------->
CREATE TABLE `usuario` (
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `apellido_usuario` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `dui` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `nombre_user` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `nivel_usuario` int(11) DEFAULT NULL,
  `cod_doctor` int(11) DEFAULT NULL,
  `foto` varchar(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `cod_doctor` (`cod_doctor`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
 
 
# | Carga de datos de la tabla 'usuario'
# +------------------------------------->
INSERT INTO `usuario` VALUES ('lovos', '1', 'lovos', '9999', '43434', 'la presita', 'lovos', 'lovos', '1', '1', NULL, '1');
INSERT INTO `usuario` VALUES ('carlos', '6', 'amaya', '93939', '393939', 'cerca de padre pio', 'carlos', 'carlos', '1', '1', NULL, '1');
INSERT INTO `usuario` VALUES ('neto', '7', 'neto', '3333', '3333', 'neto', 'neto', 'neto', '1', '1', NULL, '1');
INSERT INTO `usuario` VALUES ('Lucia', '8', 'Argueta', '78653409', '2147483647', 'Quebrachos', 'lucia', 'lucia', '1', '3', NULL, '1');
INSERT INTO `usuario` VALUES (NULL, '9', NULL, NULL, NULL, '', 'lovosD', 'lovosD', '1', '2', '2993', '1');
INSERT INTO `usuario` VALUES ('lovos', '10', 'lovos', '333', '333', 'la presita', 'admi', 'admi', '1', '1', NULL, '1');
INSERT INTO `usuario` VALUES ('Neto', '11', 'Nc', '787', '86767', 'San Miguel', 'MosesNc', 'mosesnc', '1', '4', NULL, '1');

 