<<<<<<< HEAD
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bddefensoria
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asesorias`
--

DROP TABLE IF EXISTS `asesorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asesorias` (
  `id_reporte` int(11) NOT NULL,
  `foto` mediumblob NOT NULL,
  KEY `id_reporte` (`id_reporte`),
  CONSTRAINT `fk_asesoriareporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesorias`
--

LOCK TABLES `asesorias` WRITE;
/*!40000 ALTER TABLE `asesorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `asesorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audiencias`
--

DROP TABLE IF EXISTS `audiencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audiencias` (
  `id_reporte` int(11) NOT NULL,
  `latitud` decimal(10,0) NOT NULL,
  `longitud` decimal(10,0) NOT NULL,
  KEY `id_reporte` (`id_reporte`),
  CONSTRAINT `fk_audienciareporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audiencias`
--

LOCK TABLES `audiencias` WRITE;
/*!40000 ALTER TABLE `audiencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `audiencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `id_cargo_UNIQUE` (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `defensor`
--

DROP TABLE IF EXISTS `defensor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `defensor` (
  `id_defensor` int(11) NOT NULL AUTO_INCREMENT,
  `id_juzgado` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  PRIMARY KEY (`id_defensor`),
  UNIQUE KEY `id_personal_UNIQUE` (`id_personal`),
  KEY `fk_defensorjuzgado` (`id_juzgado`),
  CONSTRAINT `fk_defensorjuzgado` FOREIGN KEY (`id_juzgado`) REFERENCES `juzgado` (`id_juzgado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_defensorpersonal` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `defensor`
--

LOCK TABLES `defensor` WRITE;
/*!40000 ALTER TABLE `defensor` DISABLE KEYS */;
/*!40000 ALTER TABLE `defensor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleperestudio`
--

DROP TABLE IF EXISTS `detalleperestudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleperestudio` (
  `id_personal` int(11) NOT NULL,
  `id_estudios` int(11) NOT NULL,
  KEY `id_personal` (`id_personal`),
  KEY `id_estudios` (`id_estudios`),
  CONSTRAINT `fk_estudiosdetalle` FOREIGN KEY (`id_estudios`) REFERENCES `estudios` (`id_estudios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_personaldetalle` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleperestudio`
--

LOCK TABLES `detalleperestudio` WRITE;
/*!40000 ALTER TABLE `detalleperestudio` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleperestudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudios`
--

DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudios` (
  `id_estudios` int(11) NOT NULL AUTO_INCREMENT,
  `grado_estudio` varchar(45) NOT NULL,
  `fecha_termino` date NOT NULL,
  `instituto` varchar(45) NOT NULL,
  `plan_estudios` varchar(45) NOT NULL,
  `descripcion_perfil_egreso` varchar(45) NOT NULL,
  `cedula_profesional` varchar(20) DEFAULT NULL,
  `perfil` varchar(20) DEFAULT NULL,
  `documento_provatorio` mediumblob NOT NULL,
  PRIMARY KEY (`id_estudios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudios`
--

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expediente`
--

DROP TABLE IF EXISTS `expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expediente` (
  `id_expediente` int(11) NOT NULL AUTO_INCREMENT,
  `num_expediente` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `tipo_delito` char(3) NOT NULL,
  `nombre_delito` varchar(20) NOT NULL,
  `estado` char(2) NOT NULL,
  PRIMARY KEY (`id_expediente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expediente`
--

LOCK TABLES `expediente` WRITE;
/*!40000 ALTER TABLE `expediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juzgado`
--

DROP TABLE IF EXISTS `juzgado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juzgado` (
  `id_juzgado` int(11) NOT NULL AUTO_INCREMENT,
  `juzgado` varchar(100) NOT NULL,
  `region` varchar(20) NOT NULL,
  `calle` varchar(15) NOT NULL,
  `numero_ext` varchar(5) NOT NULL,
  `numero_int` varchar(5) NOT NULL,
  `municipio` varchar(15) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `num_telefono` varchar(12) NOT NULL,
  PRIMARY KEY (`id_juzgado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgado`
--

LOCK TABLES `juzgado` WRITE;
/*!40000 ALTER TABLE `juzgado` DISABLE KEYS */;
/*!40000 ALTER TABLE `juzgado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juzgado_materia`
--

DROP TABLE IF EXISTS `juzgado_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juzgado_materia` (
  `id_juzgado` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  KEY `id_juzgado` (`id_juzgado`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `fk_juzgadodetalle` FOREIGN KEY (`id_juzgado`) REFERENCES `juzgado` (`id_juzgado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_materiadetalle` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgado_materia`
--

LOCK TABLES `juzgado_materia` WRITE;
/*!40000 ALTER TABLE `juzgado_materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `juzgado_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `id_sistema` int(11) NOT NULL,
  `materia` varchar(45) NOT NULL,
  `fase` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_sistema` (`id_sistema`),
  CONSTRAINT `fk_materiasistema` FOREIGN KEY (`id_sistema`) REFERENCES `sistema` (`id_sistema`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `id_cargo` int(11) NOT NULL,
  `id_estudios` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ap_paterno` varchar(45) NOT NULL,
  `ap_materno` varchar(45) NOT NULL,
  `curp` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `numero_ext` varchar(45) NOT NULL,
  `numero_int` varchar(45) NOT NULL,
  `colonia` varchar(45) NOT NULL,
  `municipio` varchar(15) NOT NULL,
  `nup` varchar(45) NOT NULL,
  `nue` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `corre_electronico` varchar(45) NOT NULL,
  `foto` mediumblob NOT NULL,
  PRIMARY KEY (`id_personal`),
  UNIQUE KEY `id_personal_UNIQUE` (`id_personal`),
  UNIQUE KEY `id_cargo_UNIQUE` (`id_cargo`),
  CONSTRAINT `fk_personalcargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporte`
--

DROP TABLE IF EXISTS `reporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporte` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `id_expediente` (`id_expediente`),
  CONSTRAINT `fk_expRep` FOREIGN KEY (`id_expediente`) REFERENCES `expediente` (`id_expediente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporte`
--

LOCK TABLES `reporte` WRITE;
/*!40000 ALTER TABLE `reporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `id_bitacora` int(11) NOT NULL,
  `id_reporte` int(11) NOT NULL,
  KEY `id_reporte` (`id_reporte`),
  KEY `id_bitacora` (`id_bitacora`),
  CONSTRAINT `fk_respuestabitacora` FOREIGN KEY (`id_bitacora`) REFERENCES `bitacora` (`id_bitacora`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_respuestareporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguimiento_caso`
--

DROP TABLE IF EXISTS `seguimiento_caso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seguimiento_caso` (
  `id_seguimiento_caso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_servicio` int(11) NOT NULL,
  `id_defensor` int(11) NOT NULL,
  PRIMARY KEY (`id_seguimiento_caso`),
  KEY `id_usuario_servicio` (`id_usuario_servicio`),
  KEY `id_defensor` (`id_defensor`),
  CONSTRAINT `fk_seguimientodefensor_` FOREIGN KEY (`id_defensor`) REFERENCES `defensor` (`id_defensor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_seguimientousuario` FOREIGN KEY (`id_usuario_servicio`) REFERENCES `usuario_servicio` (`id_usuario_servicio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimiento_caso`
--

LOCK TABLES `seguimiento_caso` WRITE;
/*!40000 ALTER TABLE `seguimiento_caso` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguimiento_caso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistema`
--

DROP TABLE IF EXISTS `sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistema` (
  `id_sistema` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_sistema` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_sistema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema`
--

LOCK TABLES `sistema` WRITE;
/*!40000 ALTER TABLE `sistema` DISABLE KEYS */;
/*!40000 ALTER TABLE `sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_servicio`
--

DROP TABLE IF EXISTS `usuario_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_servicio` (
  `id_usuario_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `ap_materno` varchar(20) NOT NULL,
  `ap_paterno` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `idioma` varchar(15) NOT NULL,
  `etnia` varchar(15) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `calle` varchar(15) NOT NULL,
  `numero_ext` varchar(5) NOT NULL,
  `numero_int` varchar(5) DEFAULT NULL,
  `municipio` varchar(15) NOT NULL,
  `nacionalidad` varchar(15) NOT NULL,
  `lugar_nacimiento` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo_electronico` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_servicio`
--

LOCK TABLES `usuario_servicio` WRITE;
/*!40000 ALTER TABLE `usuario_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_sistema`
--

DROP TABLE IF EXISTS `usuario_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_sistema` (
  `id_usuario_sistema` int(11) NOT NULL AUTO_INCREMENT,
  `id_personal` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario_sistema`),
  UNIQUE KEY `id_personal_UNIQUE` (`id_personal`),
  CONSTRAINT `fk_usuarioSispersonal` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_sistema`
--

LOCK TABLES `usuario_sistema` WRITE;
/*!40000 ALTER TABLE `usuario_sistema` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitas_carcelarias`
--

DROP TABLE IF EXISTS `visitas_carcelarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitas_carcelarias` (
  `id_reporte` int(11) NOT NULL,
  `foto` mediumblob NOT NULL,
  KEY `id_reporte` (`id_reporte`),
  CONSTRAINT `fk_visitareporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas_carcelarias`
--

LOCK TABLES `visitas_carcelarias` WRITE;
/*!40000 ALTER TABLE `visitas_carcelarias` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitas_carcelarias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-18 11:27:43
=======
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bddefensoria
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asesorias`
--

DROP TABLE IF EXISTS `asesorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asesorias` (
  `id_reporte` int(11) NOT NULL,
  `foto` mediumblob NOT NULL,
  KEY `id_reporte` (`id_reporte`),
  CONSTRAINT `fk_asesoriareporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesorias`
--

LOCK TABLES `asesorias` WRITE;
/*!40000 ALTER TABLE `asesorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `asesorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audiencias`
--

DROP TABLE IF EXISTS `audiencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audiencias` (
  `id_reporte` int(11) NOT NULL,
  `latitud` decimal(10,0) NOT NULL,
  `longitud` decimal(10,0) NOT NULL,
  KEY `id_reporte` (`id_reporte`),
  CONSTRAINT `fk_audienciareporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audiencias`
--

LOCK TABLES `audiencias` WRITE;
/*!40000 ALTER TABLE `audiencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `audiencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `id_cargo_UNIQUE` (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `defensor`
--

DROP TABLE IF EXISTS `defensor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `defensor` (
  `id_defensor` int(11) NOT NULL AUTO_INCREMENT,
  `id_juzgado` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  PRIMARY KEY (`id_defensor`),
  UNIQUE KEY `id_personal_UNIQUE` (`id_personal`),
  KEY `fk_defensorjuzgado` (`id_juzgado`),
  CONSTRAINT `fk_defensorjuzgado` FOREIGN KEY (`id_juzgado`) REFERENCES `juzgado` (`id_juzgado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_defensorpersonal` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `defensor`
--

LOCK TABLES `defensor` WRITE;
/*!40000 ALTER TABLE `defensor` DISABLE KEYS */;
/*!40000 ALTER TABLE `defensor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleperestudio`
--

DROP TABLE IF EXISTS `detalleperestudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleperestudio` (
  `id_personal` int(11) NOT NULL,
  `id_estudios` int(11) NOT NULL,
  KEY `id_personal` (`id_personal`),
  KEY `id_estudios` (`id_estudios`),
  CONSTRAINT `fk_estudiosdetalle` FOREIGN KEY (`id_estudios`) REFERENCES `estudios` (`id_estudios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_personaldetalle` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleperestudio`
--

LOCK TABLES `detalleperestudio` WRITE;
/*!40000 ALTER TABLE `detalleperestudio` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleperestudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudios`
--

DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudios` (
  `id_estudios` int(11) NOT NULL AUTO_INCREMENT,
  `grado_estudio` varchar(45) NOT NULL,
  `fecha_termino` date NOT NULL,
  `instituto` varchar(45) NOT NULL,
  `plan_estudios` varchar(45) NOT NULL,
  `descripcion_perfil_egreso` varchar(45) NOT NULL,
  `cedula_profesional` varchar(20) DEFAULT NULL,
  `perfil` varchar(20) DEFAULT NULL,
  `documento_provatorio` mediumblob NOT NULL,
  PRIMARY KEY (`id_estudios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudios`
--

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expediente`
--

DROP TABLE IF EXISTS `expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expediente` (
  `id_expediente` int(11) NOT NULL AUTO_INCREMENT,
  `num_expediente` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `tipo_delito` char(3) NOT NULL,
  `nombre_delito` varchar(20) NOT NULL,
  `estado` char(2) NOT NULL,
  PRIMARY KEY (`id_expediente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expediente`
--

LOCK TABLES `expediente` WRITE;
/*!40000 ALTER TABLE `expediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juzgado`
--

DROP TABLE IF EXISTS `juzgado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juzgado` (
  `id_juzgado` int(11) NOT NULL AUTO_INCREMENT,
  `juzgado` varchar(100) NOT NULL,
  `region` varchar(20) NOT NULL,
  `calle` varchar(15) NOT NULL,
  `numero_ext` varchar(5) NOT NULL,
  `numero_int` varchar(5) NOT NULL,
  `municipio` varchar(15) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `num_telefono` varchar(12) NOT NULL,
  PRIMARY KEY (`id_juzgado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgado`
--

LOCK TABLES `juzgado` WRITE;
/*!40000 ALTER TABLE `juzgado` DISABLE KEYS */;
/*!40000 ALTER TABLE `juzgado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juzgado_materia`
--

DROP TABLE IF EXISTS `juzgado_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juzgado_materia` (
  `id_juzgado` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  KEY `id_juzgado` (`id_juzgado`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `fk_juzgadodetalle` FOREIGN KEY (`id_juzgado`) REFERENCES `juzgado` (`id_juzgado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_materiadetalle` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgado_materia`
--

LOCK TABLES `juzgado_materia` WRITE;
/*!40000 ALTER TABLE `juzgado_materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `juzgado_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `id_sistema` int(11) NOT NULL,
  `materia` varchar(45) NOT NULL,
  `fase` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_sistema` (`id_sistema`),
  CONSTRAINT `fk_materiasistema` FOREIGN KEY (`id_sistema`) REFERENCES `sistema` (`id_sistema`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `id_cargo` int(11) NOT NULL,
  `id_estudios` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ap_paterno` varchar(45) NOT NULL,
  `ap_materno` varchar(45) NOT NULL,
  `curp` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `numero_ext` varchar(45) NOT NULL,
  `numero_int` varchar(45) NOT NULL,
  `colonia` varchar(45) NOT NULL,
  `municipio` varchar(15) NOT NULL,
  `nup` varchar(45) NOT NULL,
  `nue` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `corre_electronico` varchar(45) NOT NULL,
  `foto` mediumblob NOT NULL,
  PRIMARY KEY (`id_personal`),
  UNIQUE KEY `id_personal_UNIQUE` (`id_personal`),
  UNIQUE KEY `id_cargo_UNIQUE` (`id_cargo`),
  CONSTRAINT `fk_personalcargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporte`
--

DROP TABLE IF EXISTS `reporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporte` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `id_expediente` (`id_expediente`),
  CONSTRAINT `fk_expRep` FOREIGN KEY (`id_expediente`) REFERENCES `expediente` (`id_expediente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporte`
--

LOCK TABLES `reporte` WRITE;
/*!40000 ALTER TABLE `reporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `id_bitacora` int(11) NOT NULL,
  `id_reporte` int(11) NOT NULL,
  KEY `id_reporte` (`id_reporte`),
  KEY `id_bitacora` (`id_bitacora`),
  CONSTRAINT `fk_respuestabitacora` FOREIGN KEY (`id_bitacora`) REFERENCES `bitacora` (`id_bitacora`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_respuestareporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguimiento_caso`
--

DROP TABLE IF EXISTS `seguimiento_caso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seguimiento_caso` (
  `id_seguimiento_caso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_servicio` int(11) NOT NULL,
  `id_defensor` int(11) NOT NULL,
  PRIMARY KEY (`id_seguimiento_caso`),
  KEY `id_usuario_servicio` (`id_usuario_servicio`),
  KEY `id_defensor` (`id_defensor`),
  CONSTRAINT `fk_seguimientodefensor_` FOREIGN KEY (`id_defensor`) REFERENCES `defensor` (`id_defensor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_seguimientousuario` FOREIGN KEY (`id_usuario_servicio`) REFERENCES `usuario_servicio` (`id_usuario_servicio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimiento_caso`
--

LOCK TABLES `seguimiento_caso` WRITE;
/*!40000 ALTER TABLE `seguimiento_caso` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguimiento_caso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistema`
--

DROP TABLE IF EXISTS `sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistema` (
  `id_sistema` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_sistema` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_sistema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema`
--

LOCK TABLES `sistema` WRITE;
/*!40000 ALTER TABLE `sistema` DISABLE KEYS */;
/*!40000 ALTER TABLE `sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_servicio`
--

DROP TABLE IF EXISTS `usuario_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_servicio` (
  `id_usuario_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `ap_materno` varchar(20) NOT NULL,
  `ap_paterno` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `idioma` varchar(15) NOT NULL,
  `etnia` varchar(15) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `calle` varchar(15) NOT NULL,
  `numero_ext` varchar(5) NOT NULL,
  `numero_int` varchar(5) DEFAULT NULL,
  `municipio` varchar(15) NOT NULL,
  `nacionalidad` varchar(15) NOT NULL,
  `lugar_nacimiento` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo_electronico` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_servicio`
--

LOCK TABLES `usuario_servicio` WRITE;
/*!40000 ALTER TABLE `usuario_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_sistema`
--

DROP TABLE IF EXISTS `usuario_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_sistema` (
  `id_usuario_sistema` int(11) NOT NULL AUTO_INCREMENT,
  `id_personal` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario_sistema`),
  UNIQUE KEY `id_personal_UNIQUE` (`id_personal`),
  CONSTRAINT `fk_usuarioSispersonal` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_sistema`
--

LOCK TABLES `usuario_sistema` WRITE;
/*!40000 ALTER TABLE `usuario_sistema` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitas_carcelarias`
--

DROP TABLE IF EXISTS `visitas_carcelarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitas_carcelarias` (
  `id_reporte` int(11) NOT NULL,
  `foto` mediumblob NOT NULL,
  KEY `id_reporte` (`id_reporte`),
  CONSTRAINT `fk_visitareporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id_reporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas_carcelarias`
--

LOCK TABLES `visitas_carcelarias` WRITE;
/*!40000 ALTER TABLE `visitas_carcelarias` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitas_carcelarias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-18 11:27:43
>>>>>>> bf38283aea2bbe94a479206d8b3ee6ce831f2c60
