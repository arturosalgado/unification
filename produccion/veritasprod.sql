-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2013 a las 10:51:09
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `veritasprod`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `creacion` date DEFAULT NULL,
  `idPadre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `nombre`, `descripcion`, `creacion`, `idPadre`) VALUES
(20, 'Ingeniería', 'Documentos de linea', '2012-10-07', 0),
(21, 'Mantenimieto', 'Documentos para Herramientas', '2012-10-18', 0),
(22, 'Calidad', 'Alertas de calidad', '2012-10-18', 0),
(23, '', '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captura`
--

CREATE TABLE IF NOT EXISTS `captura` (
  `idcaptura` int(11) NOT NULL AUTO_INCREMENT,
  `idlinea` int(11) DEFAULT NULL,
  `responsable1` varchar(140) DEFAULT NULL,
  `responsable2` varchar(140) DEFAULT NULL,
  `responsable3` varchar(140) DEFAULT NULL,
  `pasodeformado` tinyint(4) DEFAULT NULL,
  `ok` int(11) DEFAULT NULL,
  `nook` int(11) DEFAULT NULL,
  `tmh` int(11) DEFAULT NULL,
  `tmp` int(11) DEFAULT NULL,
  `tmm` int(11) DEFAULT NULL,
  `sh` int(11) DEFAULT NULL,
  `sp` int(11) DEFAULT NULL,
  `sm` int(11) DEFAULT NULL,
  `c1fh` int(11) DEFAULT NULL,
  `c1fm` int(11) DEFAULT NULL,
  `c1eh` int(11) DEFAULT NULL,
  `c1em` int(11) DEFAULT NULL,
  `c1ph` int(11) DEFAULT NULL,
  `c1pl` int(11) DEFAULT NULL,
  `c1pi` int(11) DEFAULT NULL,
  `c2fh` int(11) DEFAULT NULL,
  `c2fm` int(11) DEFAULT NULL,
  `c2eh` int(11) DEFAULT NULL,
  `c2em` int(11) DEFAULT NULL,
  `c2ph` int(11) DEFAULT NULL,
  `c2pl` int(11) DEFAULT NULL,
  `c2pi` int(11) DEFAULT NULL,
  `c3fh` int(11) DEFAULT NULL,
  `c3fm` int(11) DEFAULT NULL,
  `c3eh` int(11) DEFAULT NULL,
  `c3ph` int(11) DEFAULT NULL,
  `c3pl` int(11) DEFAULT NULL,
  `c3pi` int(11) DEFAULT NULL,
  `c4fh` int(11) DEFAULT NULL,
  `c4fm` int(11) DEFAULT NULL,
  `c4eh` int(11) DEFAULT NULL,
  `c4ph` int(11) DEFAULT NULL,
  `c4pl` int(11) DEFAULT NULL,
  `c4pi` int(11) DEFAULT NULL,
  `c5fh` int(11) DEFAULT NULL,
  `c5fm` int(11) DEFAULT NULL,
  `c5eh` int(11) DEFAULT NULL,
  `c5ph` int(11) DEFAULT NULL,
  `c5pl` int(11) DEFAULT NULL,
  `c5pi` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcaptura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `captura`
--

INSERT INTO `captura` (`idcaptura`, `idlinea`, `responsable1`, `responsable2`, `responsable3`, `pasodeformado`, `ok`, `nook`, `tmh`, `tmp`, `tmm`, `sh`, `sp`, `sm`, `c1fh`, `c1fm`, `c1eh`, `c1em`, `c1ph`, `c1pl`, `c1pi`, `c2fh`, `c2fm`, `c2eh`, `c2em`, `c2ph`, `c2pl`, `c2pi`, `c3fh`, `c3fm`, `c3eh`, `c3ph`, `c3pl`, `c3pi`, `c4fh`, `c4fm`, `c4eh`, `c4ph`, `c4pl`, `c4pi`, `c5fh`, `c5fm`, `c5eh`, `c5ph`, `c5pl`, `c5pi`) VALUES
(1, 3, '12', '24', '36', 1, 54, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 3, '12', '24', '36', 1, 54, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 4, '1234', '0', '0', 1, 900, 50, 50, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, '12', '0', '0', 0, 1000, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `idconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `iddocumento` int(11) DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idconsulta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idconsulta`, `iddocumento`, `hora`, `ip`) VALUES
(1, 12, '2012-09-24 13:59:35', NULL),
(2, 12, '2012-09-24 13:59:44', NULL),
(3, 13, '2012-09-24 14:00:46', NULL),
(4, 13, '2012-09-24 14:23:20', NULL),
(5, 13, '2012-09-24 14:42:14', NULL),
(6, 13, '2012-09-24 14:42:40', NULL),
(7, 14, '2012-09-24 14:49:58', NULL),
(8, 15, '2012-09-24 16:13:52', NULL),
(9, 15, '2012-09-24 16:17:56', NULL),
(10, 13, '2012-09-24 16:19:59', NULL),
(11, 1, '2012-10-17 13:57:18', NULL),
(12, 1, '2012-10-17 13:57:38', NULL),
(13, 1, '2012-10-17 13:58:01', NULL),
(14, 1, '2012-10-17 13:59:53', NULL),
(15, 1, '2012-10-17 14:03:15', '127.0.0.1'),
(16, 1, '2012-10-17 14:09:32', '127.0.0.1'),
(17, 1, '2012-10-17 14:11:34', '127.0.0.1'),
(18, 1, '2012-10-17 14:17:22', '127.0.0.1'),
(19, 1, '2012-10-17 14:19:20', '127.0.0.1'),
(20, 1, '2012-10-17 13:25:41', '201.157.1.210'),
(21, 1, '2012-10-17 13:26:09', '201.157.1.210'),
(22, 1, '2012-10-17 13:26:22', '201.157.1.210'),
(23, 1, '2012-10-17 13:26:23', '201.157.1.210'),
(24, 1, '2012-10-17 13:26:23', '201.157.1.210'),
(25, 1, '2012-10-17 13:26:23', '201.157.1.210'),
(26, 1, '2012-10-17 13:27:00', '201.157.1.210'),
(27, 1, '2012-10-17 13:27:36', '201.157.1.210'),
(28, 1, '2012-10-17 13:28:16', '189.243.182.146'),
(29, 7, '2012-10-17 14:59:21', '189.131.76.127'),
(30, 7, '2012-10-17 15:00:50', '189.131.76.127'),
(31, 18, '2012-10-18 08:08:33', '187.141.84.89'),
(32, 18, '2012-10-18 08:09:32', '187.141.84.89'),
(33, 18, '2012-10-18 08:09:32', '187.135.56.221'),
(34, 18, '2012-10-18 08:10:03', '187.135.56.221'),
(35, 18, '2012-10-19 07:26:32', '187.210.71.51'),
(36, 18, '2012-10-20 13:34:13', '189.128.72.116'),
(37, 11, '2012-10-22 09:47:39', '189.192.37.106'),
(38, 11, '2012-10-22 09:47:57', '189.192.37.106'),
(39, 11, '2012-10-22 09:49:45', '189.192.37.106'),
(40, 11, '2012-10-22 09:49:47', '189.192.37.106'),
(41, 11, '2012-10-22 09:50:07', '189.192.37.106'),
(42, 11, '2012-10-22 09:51:52', '189.192.37.106'),
(43, 11, '2012-10-22 09:52:36', '189.192.37.106'),
(44, 11, '2012-10-22 09:53:08', '189.192.37.106'),
(45, 11, '2012-10-22 09:53:16', '189.192.37.106'),
(46, 18, '2012-10-22 13:16:56', '187.141.102.206'),
(47, 18, '2012-10-22 13:24:19', '187.141.102.206'),
(48, 11, '2012-11-15 08:21:03', '189.192.33.133'),
(49, 11, '2012-11-15 08:21:12', '189.192.33.133'),
(50, 11, '2012-11-15 08:29:03', '189.192.33.133'),
(51, 11, '2012-11-15 08:29:08', '189.192.33.133'),
(52, 11, '2012-11-15 08:36:31', '189.192.33.133'),
(53, 11, '2012-11-15 08:36:33', '189.192.33.133'),
(54, 11, '2012-11-15 08:37:31', '189.192.33.133'),
(55, 11, '2012-11-15 08:37:32', '189.192.33.133'),
(56, 11, '2012-11-15 09:47:34', '189.192.33.133'),
(57, 11, '2012-11-15 09:47:36', '189.192.33.133'),
(58, 11, '2012-11-15 10:19:04', '189.192.33.133'),
(59, 14, '2012-11-15 13:49:15', '189.192.33.133'),
(60, 14, '2012-11-15 13:49:17', '189.192.33.133'),
(61, 14, '2012-11-15 13:49:20', '189.192.33.133'),
(62, 14, '2012-11-15 13:49:21', '189.192.33.133'),
(63, 14, '2012-11-15 14:14:58', '189.192.33.133'),
(64, 14, '2012-11-15 14:14:59', '189.192.33.133'),
(65, 14, '2012-11-16 11:40:48', '187.157.31.12'),
(66, 14, '2012-11-16 11:40:50', '187.157.31.12'),
(67, 19, '2012-11-16 11:47:50', '187.157.31.12'),
(68, 19, '2012-11-16 11:47:51', '187.157.31.12'),
(69, 19, '2012-11-16 11:47:55', '187.157.31.12'),
(70, 19, '2012-11-16 11:47:57', '187.157.31.12'),
(71, 11, '2012-11-29 09:43:21', '201.158.19.190'),
(72, 11, '2012-11-29 09:43:22', '201.158.19.190'),
(73, 20, '2012-11-29 12:33:48', '201.158.19.190'),
(74, 20, '2012-11-29 12:34:48', '201.158.19.190'),
(75, 20, '2012-11-29 12:36:30', '201.158.19.190'),
(76, 20, '2012-11-29 12:39:00', '201.158.19.190'),
(77, 20, '2012-11-29 12:39:07', '201.158.19.190'),
(78, 20, '2012-11-29 12:39:17', '201.158.19.190'),
(79, 20, '2012-11-29 12:45:25', '201.158.19.190'),
(80, 20, '2012-11-29 12:45:29', '201.158.19.190'),
(81, 20, '2012-11-29 12:46:27', '201.158.19.190'),
(82, 20, '2012-11-29 12:46:31', '201.158.19.190'),
(83, 20, '2012-11-29 12:47:01', '201.158.19.190'),
(84, 20, '2012-11-29 12:47:09', '201.158.19.190'),
(85, 20, '2012-11-29 12:47:23', '201.158.19.190'),
(86, 20, '2012-11-29 13:57:51', '201.158.19.190'),
(87, 20, '2012-11-29 13:57:58', '201.158.19.190'),
(88, 20, '2012-11-29 13:58:41', '201.158.19.190'),
(89, 20, '2012-11-29 13:58:59', '201.158.19.190'),
(90, 21, '2012-12-03 08:21:42', '189.128.17.67'),
(91, 21, '2012-12-03 08:21:52', '189.128.17.67'),
(92, 21, '2012-12-03 08:22:08', '189.128.17.67'),
(93, 21, '2012-12-03 08:50:35', '189.128.17.67'),
(94, 21, '2012-12-03 08:50:50', '189.128.17.67'),
(95, 21, '2012-12-03 08:51:03', '189.128.17.67'),
(96, 21, '2012-12-03 08:52:08', '189.128.17.67'),
(97, 21, '2012-12-03 08:54:43', '189.128.17.67'),
(98, 21, '2012-12-03 08:55:06', '201.158.19.190'),
(99, 21, '2012-12-03 08:56:12', '201.158.19.190'),
(100, 21, '2012-12-03 08:56:54', '201.158.19.190'),
(101, 21, '2012-12-03 09:14:38', '201.158.19.190'),
(102, 21, '2012-12-03 09:15:54', '201.158.19.190'),
(103, 21, '2012-12-03 09:16:13', '201.158.19.190'),
(104, 21, '2012-12-03 09:16:33', '201.158.19.190'),
(105, 21, '2012-12-03 09:17:11', '189.128.17.67'),
(106, 21, '2012-12-03 09:17:32', '189.128.17.67'),
(107, 21, '2012-12-03 10:42:27', '201.158.19.190'),
(108, 20, '2012-12-07 10:50:45', '187.141.84.85'),
(109, 20, '2012-12-07 10:50:56', '187.141.84.85'),
(110, 20, '2012-12-07 10:51:48', '187.141.84.85'),
(111, 20, '2012-12-07 10:52:05', '187.141.84.85'),
(112, 20, '2012-12-07 11:05:38', '187.141.84.85'),
(113, 20, '2012-12-07 11:34:02', '187.141.84.85'),
(114, 20, '2012-12-07 11:34:03', '187.141.84.85'),
(115, 20, '2012-12-07 11:34:16', '187.141.84.85'),
(116, 21, '2012-12-11 09:21:45', '187.157.31.13'),
(117, 21, '2012-12-11 09:21:47', '187.157.31.13'),
(118, 11, '2013-01-23 14:50:19', '127.0.0.1'),
(119, 11, '2013-01-23 14:50:22', '127.0.0.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `creacion` varchar(45) DEFAULT NULL,
  `idlinea` int(11) DEFAULT NULL,
  `ruta` varchar(200) DEFAULT NULL,
  `modificacion` varchar(45) DEFAULT NULL,
  `creador` varchar(120) DEFAULT NULL,
  `idarea` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocumento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`iddocumento`, `nombre`, `descripcion`, `creacion`, `idlinea`, `ruta`, `modificacion`, `creador`, `idarea`) VALUES
(27, 'Indice', 'Indice de linea', '2012/10/18', 11, 'Line Index L23695BA.xls', '2012/10/18', 'Super Admin', 20),
(29, 'Lay Out', 'Lay Out', '2012/10/18', 12, 'Lay-out L24131GC.pdf', '2012/10/18', 'Super Admin', 20),
(33, 'Lista de Materiales', 'BOM', '2012/10/18', 18, 'BOM L26166EA.pdf', '2012/10/18', 'Juan Carlos Bada', 20),
(38, 'Ayuda Visual', 'Ayuda Visual', '2012/10/18', 18, 'Ayuda Visual L26166EA.pdf', '2012/10/18', 'Juan Carlos Bada', 20),
(39, 'Instrucciones de Trabajo', 'Instrucciones de Trabajo', '2012/10/18', 18, 'INST TRAB L26166EA.pdf', '2012/10/18', 'Juan Carlos Bada', 20),
(45, 'Diagrama de Flujo', 'Flow Chart', '2012/10/18', 18, 'Flow Chart L26166E 04.08.2011.pdf', '2012/10/18', 'Juan Carlos Bada', 20),
(46, 'Lay Out', 'Lay Out', '2012/10/18', 18, 'L26166EA.pdf', '2012/10/18', 'Juan Carlos Bada', 20),
(47, 'PPH´s', 'PPH,s', '2012/10/18', 18, 'PPHS L26166EA.pdf', '2012/12/03', 'Juan Carlos Bada', 21),
(48, 'Indice', 'Indice de linea', '2012/10/18', 18, 'Indice L26166EA.pdf', '2012/10/18', 'Juan Carlos Bada', 20),
(50, 'PRUEBA', 'PRUEBA', '2012/10/18', 11, 'concurso_tesis_2012.pdf', '2012/10/18', 'Super Admin', 20),
(51, 'prueba mant', 'prueba mant', '2012/10/18', 0, 'concurso_tesis_2012.pdf', '2012/10/18', 'Super Admin', 21),
(53, 'prueba', 'preuba', '2012/10/18', 0, '2LPUE.pdf', '2012/10/18', 'yazmin morales', 21),
(54, 'PDF Ejemplo', 'Ejejmplo demo', '2012/11/16', 19, 'Gastos.pdf', '2012/11/16', 'Super Admin', 20),
(55, 'Video demo', 'demo vid', '2012/11/16', 19, '624x260.mp4', '2012/11/16', 'Super Admin', 20),
(56, 'PDf ejempo', 'Mi PDF', '2012/11/29', 20, 'PortadaCD.pdf', '2012/11/29', 'Super Admin', 20),
(57, 'Ejemplo Vid', 'mi Video', '2012/11/29', 20, '624x260.mp4', '2012/11/29', 'Super Admin', 20),
(58, 'My Pdf', 'Pdf de ejemplo', '2012/12/03', 21, 'Presentacion HuD.pdf', '2012/12/03', 'Super Admin', 21),
(59, 'My Test Vid', 'Video de prueba 2', '2012/12/03', 21, '624x260.mp4', '2012/12/03', 'Super Admin', 21),
(60, 'Test vid 3', 'Video del Zocalo', '2012/12/03', 21, 'DetencionArbitraria1Dmx.mp4', '2012/12/03', 'Super Admin', 21),
(61, 'Mi DOcumento Dic', 'Descripcion', '2012/12/03', 21, 'Portada CD-03.pdf', '2012/12/03', 'Super Admin', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ip`
--

CREATE TABLE IF NOT EXISTS `ip` (
  `idip` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(19) DEFAULT NULL,
  `idarea` int(11) DEFAULT NULL,
  PRIMARY KEY (`idip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ip`
--

INSERT INTO `ip` (`idip`, `ip`, `idarea`) VALUES
(1, '192.168.1.68', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE IF NOT EXISTS `linea` (
  `idlinea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `creador` varchar(120) DEFAULT NULL,
  `proyecto` varchar(140) DEFAULT NULL,
  `c1` varchar(140) DEFAULT NULL,
  `c2` varchar(140) DEFAULT NULL,
  `c3` varchar(140) DEFAULT NULL,
  `c4` varchar(140) DEFAULT NULL,
  `c5` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`idlinea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`idlinea`, `nombre`, `descripcion`, `creador`, `proyecto`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(1, 'UdP 1', 'asd ', 'Super Admin', 'Audi', NULL, NULL, NULL, NULL, NULL),
(2, 'UdP 2', 'asñdlsak ', 'Super Admin', 'VW', NULL, NULL, NULL, NULL, NULL),
(3, 'LTest01', 'My Linea', 'Super Admin', 'VW', 'MAT1', ' Mat2', ' MAT3', ' Mat4', ' Mat5s    '),
(4, 'L26166GA', 'Linea de Combustible', 'Super Admin', 'C5520', 'AS1', ' BE2', ' CR3', ' GH4', ' TR5    ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ndp`
--

CREATE TABLE IF NOT EXISTS `ndp` (
  `idndp` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(350) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idndp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ndp`
--

INSERT INTO `ndp` (`idndp`, `nombre`, `descripcion`, `imagen`) VALUES
(1, '', 'Mi No de parte', 'FRONT-PAGE.jpg'),
(2, '', 'alfj', 'FRONT-PAGE.jpg'),
(3, 'LS0001', 'Filtro diesel', 'Think_music____by_irezumi.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ndp_feature`
--

CREATE TABLE IF NOT EXISTS `ndp_feature` (
  `idndp_feature` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `udm` varchar(100) DEFAULT NULL,
  `minimo` float DEFAULT NULL,
  `maximo` float DEFAULT NULL,
  `id_ndp` int(11) DEFAULT NULL,
  PRIMARY KEY (`idndp_feature`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ndp_feature`
--

INSERT INTO `ndp_feature` (`idndp_feature`, `nombre`, `codigo`, `udm`, `minimo`, `maximo`, `id_ndp`) VALUES
(1, 'Mi Feature', 'asd', 'Metros', 2, 12, 1),
(2, 'Mi Feature', 'asd', 'Metros', 2, 12, 1),
(3, 'Largo de Tornillo', 'A', 'mm', 3.2, 3.5, 3),
(4, 'Profundidad del bisel', 'B', 'in', 2, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE IF NOT EXISTS `produccion` (
  `idproduccion` int(11) NOT NULL AUTO_INCREMENT,
  `idlinea` int(11) DEFAULT NULL,
  `idturno` int(11) DEFAULT NULL,
  `responsable1` varchar(120) DEFAULT NULL,
  `responsable2` varchar(140) DEFAULT NULL,
  `responsable3` varchar(140) DEFAULT NULL,
  `responsable4` varchar(140) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `piezas` int(11) DEFAULT NULL,
  `capturado` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idproduccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`idproduccion`, `idlinea`, `idturno`, `responsable1`, `responsable2`, `responsable3`, `responsable4`, `fecha`, `piezas`, `capturado`) VALUES
(1, 1, 1, 'Juan Perez', NULL, NULL, NULL, '2013-01-30', NULL, 0),
(3, 1, 3, 'Juan Perez', NULL, NULL, NULL, '2013-01-31', NULL, 0),
(4, 1, 1, '02345', NULL, NULL, NULL, '2013-02-21', NULL, 0),
(5, 1, 3, '12', '24', '36', '0', '0000-00-00', 143, 0),
(6, 1, 3, '12', '24', '36', '0', '2013-04-16', 143, 0),
(7, 1, 3, '12', '24', '36', '0', '2013-04-16', 143, 0),
(8, 3, 2, '12', '24', '36', '0', '2013-04-17', 125, 1),
(9, 4, 1, '1875', '5648', '0', '0', '2013-04-17', 1100, 1),
(10, 4, 1, '12', '34', '53', '56', '2013-04-17', 1200, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `idproyecto` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `cliente` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`idproyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `idturno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `inicio` time DEFAULT NULL,
  `fin` time DEFAULT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`idturno`, `nombre`, `inicio`, `fin`) VALUES
(1, 'Primer Turno', '06:00:00', '14:00:00'),
(2, 'Tercer Turno', '22:00:00', '06:00:00'),
(3, 'Segundo Turno', '14:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `passwd` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `idArea` int(11) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `username`, `passwd`, `nombre`, `apellidos`, `rol`, `mail`, `idArea`) VALUES
(8, 'usuario', 'usuario', 'Usuario', 'Usuario', 'usuario', 'usuario@veritas.de', 0),
(9, 'admin', 'admin', 'Admin', 'admin', 'admin', 'admin@veritas.de', 8),
(10, 'sadmin', 'sadmin', 'Super', 'Admin', 'sadmin', 'sadmin@veritas.de', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
