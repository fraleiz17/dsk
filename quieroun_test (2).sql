-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2015 a las 21:05:03
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `quieroun_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `imgbaner` varchar(500) NOT NULL,
  `texto` text NOT NULL,
  `zonaID` int(11) NOT NULL DEFAULT '9',
  `posicion` int(11) DEFAULT NULL COMMENT '1 - arriba 2 - centro -3 abajo - 4 lateral',
  `seccionID` int(11) DEFAULT NULL,
  PRIMARY KEY (`bannerID`,`zonaID`) USING BTREE,
  KEY `pertenece` (`zonaID`) USING BTREE,
  KEY `seccion` (`seccionID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `productoID` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL COMMENT 'cantidad',
  `precio` float(5,2) DEFAULT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `talla` varchar(120) DEFAULT NULL,
  `color` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`cartID`) USING BTREE,
  KEY `usuarioID` (`usuarioID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`cartID`, `usuarioID`, `productoID`, `cantidad`, `precio`, `nombre`, `talla`, `color`) VALUES
(1, 3, 1, 1, 70.00, 'AGUA PARA PERRO', 'Unitalla', 'UNICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritototal`
--

CREATE TABLE IF NOT EXISTS `carritototal` (
  `carritoTotalID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `totalProductos` float(9,2) DEFAULT NULL,
  `totalPrecio` float(9,2) DEFAULT NULL,
  `subtotal` float(9,2) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  PRIMARY KEY (`carritoTotalID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `carritototal`
--

INSERT INTO `carritototal` (`carritoTotalID`, `usuarioID`, `totalProductos`, `totalPrecio`, `subtotal`, `descuento`) VALUES
(1, 3, 1.00, 70.00, 70.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoproductos`
--

CREATE TABLE IF NOT EXISTS `catalogoproductos` (
  `productoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `sku` varchar(30) NOT NULL,
  `precio` float(7,2) NOT NULL,
  PRIMARY KEY (`productoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1024 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `catalogoproductos`
--

INSERT INTO `catalogoproductos` (`productoID`, `nombre`, `descripcion`, `sku`, `precio`) VALUES
(1, 'AGUA PARA PERRO', 'AGUA PARA PERRO PURIFICADA', '1111', 70.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`) USING BTREE,
  KEY `last_activity_idx` (`last_activity`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=9362 COMMENT='tabla necesaria para CodeIgniter ... ';

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('7b4a794eb14639333fb4aa077278fcc5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', 1427655688, 'a:15:{s:9:"user_data";s:0:"";s:6:"banner";a:0:{}s:6:"logged";b:1;s:9:"idUsuario";s:1:"3";s:6:"correo";s:21:"marthahdez2@gmail.com";s:6:"nombre";s:6:"martha";s:8:"apellido";s:4:"hdez";s:8:"telefono";s:10:"1234567890";s:11:"tipoUsuario";s:1:"1";s:7:"authKey";s:20:"FB29857560F3FA96B6A5";s:5:"nivel";s:1:"1";s:13:"paqueteGratis";s:1:"0";s:13:"idUsuarioDato";s:1:"2";s:3:"rol";i:1;s:14:"manuallyLogged";b:1;}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `compraID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) NOT NULL,
  `subtotal` float(5,2) NOT NULL,
  `idCuponAdquirido` int(11) DEFAULT NULL,
  `descuento` int(2) DEFAULT NULL,
  `total` float(5,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `pagado` int(11) DEFAULT '0',
  PRIMARY KEY (`compraID`) USING BTREE,
  KEY `usuarioID` (`usuarioID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`compraID`, `usuarioID`, `subtotal`, `idCuponAdquirido`, `descuento`, `total`, `fecha`, `pagado`) VALUES
(1, 3, 425.00, NULL, 20, 340.00, '2014-08-06 00:11:56', 1),
(2, 3, 123.00, NULL, 5, 116.85, '2014-08-13 00:38:34', 1),
(3, 3, 999.99, NULL, 0, 999.99, '2014-08-13 00:45:08', 1),
(4, 7, 999.99, NULL, NULL, 999.99, '2014-08-14 01:40:51', 1),
(5, 3, 999.99, NULL, NULL, 999.99, '2014-08-14 09:34:45', 1),
(6, 3, 5.00, 0, 5, 4.75, '2014-08-15 02:36:22', 0),
(7, 3, 100.00, 0, 5, 95.00, '2014-08-15 02:38:14', 0),
(8, 3, 100.00, 0, 0, 100.00, '2014-08-15 03:07:56', 0),
(9, 3, 100.00, 0, 0, 100.00, '2014-08-15 03:08:04', 1),
(10, 3, 5.00, 0, 5, 4.75, '2014-08-15 09:58:24', 1),
(11, 3, 100.00, 0, 0, 100.00, '2014-08-15 09:59:09', 1),
(12, 3, 100.00, 0, 5, 95.00, '2014-08-15 10:14:57', 1),
(13, 3, 100.00, 0, 5, 95.00, '2014-08-15 10:18:25', 1),
(14, 3, 100.00, 0, 0, 100.00, '2014-08-15 10:26:03', 1),
(15, 3, 5.00, 0, 0, 5.00, '2014-08-15 10:33:24', 1),
(16, 3, 5.00, 0, 0, 5.00, '2014-08-15 10:41:40', 1),
(17, 3, 100.00, 0, 0, 100.00, '2014-08-15 10:44:05', 1),
(18, 3, 100.00, 0, 0, 100.00, '2014-08-15 11:45:27', 1),
(19, 3, 100.00, 0, 0, 100.00, '2014-08-15 11:47:47', 1),
(20, 3, 5.00, 0, 0, 5.00, '2014-08-15 11:57:39', 1),
(21, 3, 100.00, 0, 0, 100.00, '2014-08-15 12:02:45', 1),
(22, 3, 100.00, 0, 0, 100.00, '2014-08-15 12:09:54', 0),
(23, 3, 100.00, 0, 0, 100.00, '2014-08-15 12:10:38', 1),
(24, 3, 166.00, 0, 5, 157.70, '2014-08-15 12:12:25', 1),
(25, 3, 5.00, 0, 0, 5.00, '2014-08-15 12:19:55', 170),
(26, 3, 100.00, 0, 0, 100.00, '2014-08-15 12:22:15', 1),
(27, 3, 5.00, 0, 0, 5.00, '2014-08-15 16:30:07', 1),
(28, 3, 100.00, 0, 0, 100.00, '2014-08-15 18:30:16', 1),
(29, 7, 5.00, 0, 0, 5.00, '2014-08-17 17:38:18', 1),
(30, 3, 0.00, 0, 0, 0.00, '2014-08-25 07:01:46', 1),
(31, 3, 0.00, 0, 0, 0.00, '2014-08-25 07:12:20', 1),
(32, 3, 0.00, 0, 0, 0.00, '2014-08-25 07:36:19', 1),
(33, 3, 0.00, 0, 0, 0.00, '2014-08-25 12:59:53', 1),
(34, 2, 0.00, 0, 0, 0.00, '2014-10-15 17:37:06', 1),
(35, 3, 0.00, 0, 0, 0.00, '2014-10-15 19:40:31', 1),
(36, 3, 100.00, 1, 10, 90.00, '2014-10-15 19:46:21', 0),
(37, 3, 100.00, 2, 10, 90.00, '2014-10-16 23:46:39', 0),
(38, 3, 100.00, 3, 10, 90.00, '2014-10-17 00:01:38', 0),
(39, 3, 100.00, 4, 10, 90.00, '2014-11-02 00:11:21', 0),
(40, 3, 100.00, 5, 10, 90.00, '2014-11-02 00:18:37', 0),
(41, 3, 100.00, 8, 10, 90.00, '2014-11-04 17:08:16', 0),
(42, 3, 100.00, 9, 10, 90.00, '2014-11-04 17:22:18', 0),
(43, 3, 100.00, 10, 10, 90.00, '2014-11-04 23:13:38', 0),
(44, 3, 0.00, 0, 0, 0.00, '2014-11-11 21:25:57', 1),
(45, 18, 100.00, 0, 0, 100.00, '2014-11-24 19:37:57', 0),
(46, 18, 0.00, 0, 0, 0.00, '2014-11-24 19:42:42', 1),
(47, 15, 0.00, 0, 0, 0.00, '2014-12-15 19:52:28', 1),
(48, 3, 0.00, 0, 0, 0.00, '2014-12-15 19:54:05', 1),
(49, 3, 25.00, 0, NULL, 25.00, '2014-12-15 20:30:16', 0),
(50, 3, 0.00, 0, 0, 0.00, '2014-12-28 16:35:00', 1),
(51, 3, 0.00, 0, 0, 0.00, '2014-12-28 16:40:41', 1),
(52, 3, 0.00, 0, 0, 0.00, '2015-03-29 10:46:39', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compradetalle`
--

CREATE TABLE IF NOT EXISTS `compradetalle` (
  `compraDetalleID` int(11) NOT NULL AUTO_INCREMENT,
  `compraID` int(11) NOT NULL,
  `productoID` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `talla` varchar(120) NOT NULL,
  `color` varchar(120) NOT NULL,
  PRIMARY KEY (`compraDetalleID`) USING BTREE,
  KEY `compraID` (`compraID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `compradetalle`
--

INSERT INTO `compradetalle` (`compraDetalleID`, `compraID`, `productoID`, `cantidad`, `precio`, `nombre`, `talla`, `color`) VALUES
(1, 1, 11, 1, 56.00, 'JJJ', '', ''),
(2, 1, 3, 3, 123.00, 'AAA', '', ''),
(3, 2, 3, 1, 123.00, 'AAA', '0', '0'),
(4, 3, 1, 2, 999.99, 'BOTAS DE LLUVIA', '0', '0'),
(5, 4, 1, 4, 999.99, 'BOTAS DE LLUVIA', '0', '0'),
(6, 5, 1, 1, 999.99, 'BOTAS DE LLUVIA', '0', '0'),
(7, 23, 23, 1, 100.00, 'Regular', '', ''),
(8, 24, 61, 1, 166.00, 'Premium', '', ''),
(9, 25, 62, 1, 5.00, 'Lite', '', ''),
(10, 26, 63, 1, 100.00, 'Regular', '', ''),
(11, 27, 64, 1, 5.00, 'Lite', '', ''),
(12, 28, 65, 1, 100.00, 'Regular', '', ''),
(13, 29, 66, 1, 5.00, 'Lite', '', ''),
(14, 30, 1, 1, 0.00, 'Lite', '', ''),
(15, 31, 1, 1, 0.00, 'Lite', '', ''),
(16, 32, 1, 1, 0.00, 'Lite', '', ''),
(17, 33, 2, 1, 0.00, 'Lite', '', ''),
(18, 34, 3, 1, 0.00, 'Lite', '', ''),
(19, 35, 4, 1, 0.00, 'Lite', '', ''),
(20, 44, 15, 1, 0.00, 'Lite', '', ''),
(21, 45, 16, 1, 100.00, 'Regular', '', ''),
(22, 46, 17, 1, 0.00, 'Lite', '', ''),
(23, 47, 18, 1, 0.00, 'Lite', '', ''),
(24, 48, 19, 1, 0.00, 'Lite', '', ''),
(25, 50, 21, 1, 0.00, 'Lite', '', ''),
(26, 51, 22, 1, 0.00, 'Lite', '', ''),
(27, 52, 1, 1, 0.00, 'Lite', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contadormensajes`
--

CREATE TABLE IF NOT EXISTS `contadormensajes` (
  `contadorID` int(11) NOT NULL AUTO_INCREMENT,
  `cantMensajes` char(20) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`contadorID`) USING BTREE,
  KEY `tiene` (`idUsuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `contenidoID` int(11) NOT NULL AUTO_INCREMENT,
  `seccionID` int(1) NOT NULL,
  `seccionDetalle` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `fecha` varchar(80) NOT NULL,
  `zonaID` int(11) DEFAULT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `mes` varchar(30) DEFAULT NULL,
  `origenes` mediumtext,
  `caracter` mediumtext,
  `cualidades` mediumtext,
  `colores` mediumtext,
  `acercaDe` mediumtext,
  `horario` varchar(80) DEFAULT NULL,
  `lugar` varchar(120) DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`contenidoID`) USING BTREE,
  KEY `seccion` (`seccionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1365 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`contenidoID`, `seccionID`, `seccionDetalle`, `texto`, `fecha`, `zonaID`, `nombre`, `mes`, `origenes`, `caracter`, `cualidades`, `colores`, `acercaDe`, `horario`, `lugar`, `domicilio`) VALUES
(1, 8, 'Raza del mes', '', '2015-01-08', 9, 'Chihuahua', 'Enero', 'El chihuahueño o chihuahua es una raza de perro originaria de México. Recibe su nombre del estado mexicano de Chihuahua, lugar donde fue descubierto.', 'Alegre, sobreprotector, inquieto y muy valiente', 'Compañía, prueba de trabajo', 'Cafe', 'La historia de la raza es incierta, sin embargo se suele afirmar que es una raza de México. La hipótesis más común y más probable afirma que los chihuahueños son descendientes del techichi, un perro de compañía en la civilización tolteca de México.2 Los registros más antiguos del techichi disponibles por ahora datan del siglo IX, pero probablemente sus antepasados ya estaban presentes entre los mayas.3 Perros que se aproximan a la Chihuahua se encuentran entre los materiales de las pirámides de Cholula, anteriores a 1530 y en las ruinas de Chichén Itzá, en la península de Yucatán', NULL, NULL, NULL),
(2, 8, 'Raza del mes', '', '2015-01-08', 9, 'Chihuahua', 'Febrero', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México ', NULL, NULL, NULL),
(3, 8, 'Raza del mes', '', '2015-01-08', 9, 'Mastil', 'Marzo', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', NULL, NULL, NULL),
(4, 8, 'Raza del mes', '', '2015-01-08', 9, 'Maltes', 'Abril', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', NULL, NULL, NULL),
(5, 9, 'Evento del mes', 'Séptima Expo Canina y el evento ‘Camina, trota o corre con tu perro’,', '10-10-15', 9, 'EXPO CANINA Y EVENTO DEPORTIVO', NULL, NULL, NULL, NULL, NULL, NULL, '10:00 am', 'Metepec', ' oficina de la Octava Regiduría del Ayuntamiento de Metepec'),
(6, 10, 'Dato Curioso', ' Pablo Picasso pintaba en varias de sus obras a su Dachshund Lump. En su serie de las Meninas, Lump aparece en 15 de sus 44 obras.', '0', 9, 'Pablo Picasso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 10, 'Dato Curioso', 'Pablo Picasso', '0', 9, 'Pablo Picasso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 10, 'Dato Curioso', 'Pablo Picasso', '0', 9, 'Pablo Picasso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 10, 'Dato Curioso', 'Pablo Picasso', '0', 9, 'Pablo Picasso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE IF NOT EXISTS `cupon` (
  `cuponID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCupon` varchar(45) NOT NULL,
  `paqueteID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cuponID`) USING BTREE,
  KEY `paqueteID` (`paqueteID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`cuponID`, `nombreCupon`, `paqueteID`) VALUES
(60, 'Tienda', 2),
(61, 'Paquete', 2),
(62, 'Negocio', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuponadquirido`
--

CREATE TABLE IF NOT EXISTS `cuponadquirido` (
  `idCuponAdquirido` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `vigencia` date NOT NULL,
  `tipoCupon` int(1) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `usado` tinyint(1) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `cuponDetalleID` int(11) DEFAULT NULL,
  `cuponID` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCuponAdquirido`,`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `detalleCuponPaquete` (`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `historicoCupon` (`cuponDetalleID`,`cuponID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=528 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupondetalle`
--

CREATE TABLE IF NOT EXISTS `cupondetalle` (
  `cuponDetalleID` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `tipoCupon` int(1) NOT NULL,
  `cuponID` int(11) NOT NULL,
  PRIMARY KEY (`cuponDetalleID`,`cuponID`) USING BTREE,
  KEY `detalleCupon` (`cuponID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `cupondetalle`
--

INSERT INTO `cupondetalle` (`cuponDetalleID`, `descripcion`, `valor`, `vigencia`, `tipoCupon`, `cuponID`) VALUES
(76, 'cuponTienda', '10', 30, 1, 60),
(77, 'cuponPaquete', '80', 15, 2, 61),
(78, 'AAAAA', '10', 60, 3, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinoenvio`
--

CREATE TABLE IF NOT EXISTS `destinoenvio` (
  `destinoID` int(11) NOT NULL AUTO_INCREMENT,
  `grupoID` int(11) NOT NULL,
  `estadoID` int(11) NOT NULL,
  PRIMARY KEY (`destinoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='agrupacion de estados segun costo de envio' AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `destinoenvio`
--

INSERT INTO `destinoenvio` (`destinoID`, `grupoID`, `estadoID`) VALUES
(1, 1, 11),
(4, 2, 19),
(5, 2, 7),
(6, 3, 15),
(7, 4, 2),
(8, 5, 26),
(9, 6, 6),
(10, 7, 10),
(11, 8, 25),
(12, 8, 3),
(13, 9, 8),
(14, 9, 18),
(15, 9, 32),
(16, 10, 13),
(17, 11, 17),
(18, 11, 14),
(19, 11, 9),
(20, 11, 21),
(21, 11, 29),
(22, 12, 1),
(23, 12, 22),
(25, 12, 12),
(26, 12, 24),
(28, 13, 28),
(29, 14, 4),
(30, 14, 27),
(31, 15, 23),
(32, 15, 31),
(33, 16, 30),
(34, 16, 5),
(35, 16, 20),
(36, 12, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepaquete`
--

CREATE TABLE IF NOT EXISTS `detallepaquete` (
  `detalleID` int(11) NOT NULL AUTO_INCREMENT,
  `cantFotos` int(11) NOT NULL,
  `caracteres` int(11) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `cupones` int(2) NOT NULL,
  `videos` int(2) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `tipoPaquete` int(11) NOT NULL DEFAULT '1' COMMENT 'Elemento que identifica el tipo de paquete',
  PRIMARY KEY (`detalleID`,`paqueteID`) USING BTREE,
  KEY `detallePaquete` (`paqueteID`) USING BTREE,
  KEY `fk_tipoPaquete_paquete_idx` (`tipoPaquete`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `detallepaquete`
--

INSERT INTO `detallepaquete` (`detalleID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `paqueteID`, `tipoPaquete`) VALUES
(1, 1, 30, 30, 0, 0, 0.00, 1, 1),
(2, 2, 300, 15, 2, 1, 100.00, 2, 2),
(3, 3, 1000, 60, 3, 2, 166.00, 3, 3),
(4, 0, 1000, 1825, 0, 0, 0.00, 4, 4),
(5, 0, 100, 30, 0, 0, 25.00, 5, 5),
(6, 0, 200, 60, 0, 0, 50.00, 6, 5),
(7, 0, 300, 90, 0, 0, 75.00, 7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionenvio`
--

CREATE TABLE IF NOT EXISTS `direccionenvio` (
  `direccionID` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `calle` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colonia` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estadoID` int(11) DEFAULT NULL,
  `paisID` int(11) DEFAULT '146',
  PRIMARY KEY (`direccionID`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=0 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `direccionenvio`
--

INSERT INTO `direccionenvio` (`direccionID`, `idUsuario`, `nombre`, `apellido`, `cp`, `calle`, `colonia`, `numero`, `ciudad`, `estadoID`, `paisID`) VALUES
(1, 3, 'martha', 'hdez', 76000, 'qwerty', 'MMMM', '55', 'MTY', 19, 146);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `estadoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(30) NOT NULL,
  PRIMARY KEY (`estadoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=496 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`estadoID`, `nombreEstado`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Coahuila'),
(8, 'Colima'),
(9, 'Distrito Federal'),
(10, 'Durango'),
(11, 'Estado de México'),
(12, 'Guanajuato'),
(13, 'Guerrero'),
(14, 'Hidalgo'),
(15, 'Jalisco'),
(16, 'Michoacán'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatán'),
(32, 'Zacatecas'),
(33, 'Fuera de México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `publicacionID` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  KEY `favoritos` (`idUsuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoscontenido`
--

CREATE TABLE IF NOT EXISTS `fotoscontenido` (
  `fotoID` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(120) NOT NULL,
  `contenidoID` int(11) NOT NULL,
  PRIMARY KEY (`fotoID`) USING BTREE,
  KEY `productoID_new` (`contenidoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `fotoscontenido`
--

INSERT INTO `fotoscontenido` (`fotoID`, `foto`, `contenidoID`) VALUES
(1, 'perro-enano.jpg', 1),
(3, 'perro-enano2.jpg', 3),
(4, 'perro-enano3.jpg', 2),
(5, 'perro-enano4.jpg', 4),
(6, 'microsThumb.jpg', 5),
(7, '26lump_CA1.450_.jpg', 6),
(8, '26lump_CA1.450_1.jpg', 7),
(9, '26lump_CA1.450_2.jpg', 8),
(10, '26lump_CA1.450_3.jpg', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotospublicacion`
--

CREATE TABLE IF NOT EXISTS `fotospublicacion` (
  `fotoID` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(180) NOT NULL,
  `publicacionID` int(11) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  PRIMARY KEY (`fotoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `fotospublicacion`
--

INSERT INTO `fotospublicacion` (`fotoID`, `foto`, `publicacionID`, `servicioID`, `detalleID`, `paqueteID`) VALUES
(1, 'images/anuncios/b90e11b0-8f8f-4af4-a87d-4924a26b4279.JPG', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotostienda`
--

CREATE TABLE IF NOT EXISTS `fotostienda` (
  `fotoID` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(120) NOT NULL,
  `productoID` int(11) NOT NULL,
  PRIMARY KEY (`fotoID`) USING BTREE,
  KEY `productoID` (`productoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `fotostienda`
--

INSERT INTO `fotostienda` (`fotoID`, `foto`, `productoID`) VALUES
(1, 'Ferrero_logo.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro`
--

CREATE TABLE IF NOT EXISTS `giro` (
  `giroID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Se definen de acuerdo al formulario de registro para empresa en index_view',
  `nombreGiro` varchar(100) NOT NULL,
  `logo` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`giroID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1365 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `giro`
--

INSERT INTO `giro` (`giroID`, `nombreGiro`, `logo`) VALUES
(1, 'Accesorios para mascotas', 'giros_negocio/accesorios.png'),
(2, 'Veterinaria ', 'giros_negocio/veterinaria.png'),
(3, 'Estética canina', 'giros_negocio/estetica.png'),
(4, 'Adiestramiento canino', 'giros_negocio/adistramiento_canino.png'),
(5, 'Centro de sociabilización', 'giros_negocio/sociabilizacion.png'),
(6, 'Criadero de perros ', 'giros_negocio/criadero.png'),
(7, 'Hotel y pensión canina ', 'giros_negocio/hotel_pension.png'),
(8, 'Alimento y medicamento', 'giros_negocio/comida.png'),
(9, 'Guardería de perros', 'giros_negocio/guarderia.png'),
(10, 'Tienda de mascotas ', 'giros_negocio/tienda.png'),
(11, 'Servicios funerarios ', 'giros_negocio/funeral.png'),
(12, 'Servicio de paseo', 'giros_negocio/paseo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giroempresa`
--

CREATE TABLE IF NOT EXISTS `giroempresa` (
  `giroEmpresaID` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuarioDetalle` int(11) NOT NULL,
  `giroID` int(11) NOT NULL,
  PRIMARY KEY (`giroEmpresaID`) USING BTREE,
  KEY `idUsuarioDetalle` (`idUsuarioDetalle`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoenvio`
--

CREATE TABLE IF NOT EXISTS `grupoenvio` (
  `grupoID` int(11) NOT NULL,
  `costo` double NOT NULL,
  PRIMARY KEY (`grupoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Division de grupos para cobro de envio';

--
-- Volcado de datos para la tabla `grupoenvio`
--

INSERT INTO `grupoenvio` (`grupoID`, `costo`) VALUES
(1, 86),
(2, 90),
(3, 86),
(4, 124),
(5, 119),
(6, 119),
(7, 90),
(8, 117),
(9, 90),
(10, 100),
(11, 86),
(12, 81),
(13, 100),
(14, 117),
(15, 119),
(16, 117);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `mensajeID` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(80) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `tipoMensaje` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`mensajeID`) USING BTREE,
  KEY `mensajes` (`idUsuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesadmin`
--

CREATE TABLE IF NOT EXISTS `mensajesadmin` (
  `mensajeID` int(11) NOT NULL AUTO_INCREMENT,
  `tipoMensaje` varchar(80) DEFAULT NULL,
  `asunto` varchar(80) DEFAULT NULL,
  `contenido` text,
  PRIMARY KEY (`mensajeID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `paisID` int(11) NOT NULL AUTO_INCREMENT,
  `PAIS_ISONUM` smallint(6) DEFAULT NULL,
  `PAIS_ISO2` char(2) DEFAULT NULL,
  `PAIS_ISO3` char(3) DEFAULT NULL,
  `nombrePais` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`paisID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=68 AUTO_INCREMENT=241 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`paisID`, `PAIS_ISONUM`, `PAIS_ISO2`, `PAIS_ISO3`, `nombrePais`) VALUES
(1, 4, 'AF', 'AFG', 'Afganistán'),
(2, 248, 'AX', 'ALA', 'Islas Gland'),
(3, 8, 'AL', 'ALB', 'Albania'),
(4, 276, 'DE', 'DEU', 'Alemania'),
(5, 20, 'AD', 'AND', 'Andorra'),
(6, 24, 'AO', 'AGO', 'Angola'),
(7, 660, 'AI', 'AIA', 'Anguilla'),
(8, 10, 'AQ', 'ATA', 'Antártida'),
(9, 28, 'AG', 'ATG', 'Antigua y Barbuda'),
(10, 530, 'AN', 'ANT', 'Antillas Holandesas'),
(11, 682, 'SA', 'SAU', 'Arabia Saud'),
(12, 12, 'DZ', 'DZA', 'Argelia'),
(13, 32, 'AR', 'ARG', 'Argentina'),
(14, 51, 'AM', 'ARM', 'Armenia'),
(15, 533, 'AW', 'ABW', 'Aruba'),
(16, 36, 'AU', 'AUS', 'Australia'),
(17, 40, 'AT', 'AUT', 'Austria'),
(18, 31, 'AZ', 'AZE', 'Azerbaiy'),
(19, 44, 'BS', 'BHS', 'Bahamas'),
(20, 48, 'BH', 'BHR', 'Bahráin'),
(21, 50, 'BD', 'BGD', 'Bangladesh'),
(22, 52, 'BB', 'BRB', 'Barbados'),
(23, 112, 'BY', 'BLR', 'Bielorrusia'),
(24, 56, 'BE', 'BEL', 'Bélgica'),
(25, 84, 'BZ', 'BLZ', 'Belice'),
(26, 204, 'BJ', 'BEN', 'Benin'),
(27, 60, 'BM', 'BMU', 'Bermudas'),
(28, 64, 'BT', 'BTN', 'Bhut'),
(29, 68, 'BO', 'BOL', 'Bolivia'),
(30, 70, 'BA', 'BIH', 'Bosnia y Herzegovina'),
(31, 72, 'BW', 'BWA', 'Botsuana'),
(32, 74, 'BV', 'BVT', 'Isla Bouvet'),
(33, 76, 'BR', 'BRA', 'Brasil'),
(34, 96, 'BN', 'BRN', 'Brun'),
(35, 100, 'BG', 'BGR', 'Bulgaria'),
(36, 854, 'BF', 'BFA', 'Burkina Faso'),
(37, 108, 'BI', 'BDI', 'Burundi'),
(38, 132, 'CV', 'CPV', 'Cabo Verde'),
(39, 136, 'KY', 'CYM', 'Islas Caim'),
(40, 116, 'KH', 'KHM', 'Camboya'),
(41, 120, 'CM', 'CMR', 'Camerún'),
(42, 124, 'CA', 'CAN', 'Canadá'),
(43, 140, 'CF', 'CAF', 'República Centroafricana'),
(44, 148, 'TD', 'TCD', 'Chad'),
(45, 203, 'CZ', 'CZE', 'República Checa'),
(46, 152, 'CL', 'CHL', 'Chile'),
(47, 156, 'CN', 'CHN', 'China'),
(48, 196, 'CY', 'CYP', 'Chipre'),
(49, 162, 'CX', 'CXR', 'Isla de Navidad'),
(50, 336, 'VA', 'VAT', 'Ciudad del Vaticano'),
(51, 166, 'CC', 'CCK', 'Islas Cocos'),
(52, 170, 'CO', 'COL', 'Colombia'),
(53, 174, 'KM', 'COM', 'Comoras'),
(54, 180, 'CD', 'COD', 'República Democrática del Congo'),
(55, 178, 'CG', 'COG', 'Congo'),
(56, 184, 'CK', 'COK', 'Islas Cook'),
(57, 408, 'KP', 'PRK', 'Corea del Norte'),
(58, 410, 'KR', 'KOR', 'Corea del Sur'),
(59, 384, 'CI', 'CIV', 'Costa de Marfil'),
(60, 188, 'CR', 'CRI', 'Costa Rica'),
(61, 191, 'HR', 'HRV', 'Croacia'),
(62, 192, 'CU', 'CUB', 'Cuba'),
(63, 208, 'DK', 'DNK', 'Dinamarca'),
(64, 212, 'DM', 'DMA', 'Dominica'),
(65, 214, 'DO', 'DOM', 'República Dominicana'),
(66, 218, 'EC', 'ECU', 'Ecuador'),
(67, 818, 'EG', 'EGY', 'Egipto'),
(68, 222, 'SV', 'SLV', 'El Salvador'),
(69, 784, 'AE', 'ARE', 'Emiratos Árabes Unidos'),
(70, 232, 'ER', 'ERI', 'Eritrea'),
(71, 703, 'SK', 'SVK', 'Eslovaquia'),
(72, 705, 'SI', 'SVN', 'Eslovenia'),
(73, 724, 'ES', 'ESP', 'Espa'),
(74, 581, 'UM', 'UMI', 'Islas ultramarinas de Estados Unidos'),
(75, 840, 'US', 'USA', 'Estados Unidos'),
(76, 233, 'EE', 'EST', 'Estonia'),
(77, 231, 'ET', 'ETH', 'Etiop'),
(78, 234, 'FO', 'FRO', 'Islas Feroe'),
(79, 608, 'PH', 'PHL', 'Filipinas'),
(80, 246, 'FI', 'FIN', 'Finlandia'),
(81, 242, 'FJ', 'FJI', 'Fiyi'),
(82, 250, 'FR', 'FRA', 'Francia'),
(83, 266, 'GA', 'GAB', 'Gab'),
(84, 270, 'GM', 'GMB', 'Gambia'),
(85, 268, 'GE', 'GEO', 'Georgia'),
(86, 239, 'GS', 'SGS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 288, 'GH', 'GHA', 'Ghana'),
(88, 292, 'GI', 'GIB', 'Gibraltar'),
(89, 308, 'GD', 'GRD', 'Granada'),
(90, 300, 'GR', 'GRC', 'Grecia'),
(91, 304, 'GL', 'GRL', 'Groenlandia'),
(92, 312, 'GP', 'GLP', 'Guadalupe'),
(93, 316, 'GU', 'GUM', 'Guam'),
(94, 320, 'GT', 'GTM', 'Guatemala'),
(95, 254, 'GF', 'GUF', 'Guayana Francesa'),
(96, 324, 'GN', 'GIN', 'Guinea'),
(97, 226, 'GQ', 'GNQ', 'Guinea Ecuatorial'),
(98, 624, 'GW', 'GNB', 'Guinea-Bissau'),
(99, 328, 'GY', 'GUY', 'Guyana'),
(100, 332, 'HT', 'HTI', 'Hait'),
(101, 334, 'HM', 'HMD', 'Islas Heard y McDonald'),
(102, 340, 'HN', 'HND', 'Honduras'),
(103, 344, 'HK', 'HKG', 'Hong Kong'),
(104, 348, 'HU', 'HUN', 'Hungr'),
(105, 356, 'IN', 'IND', 'India'),
(106, 360, 'ID', 'IDN', 'Indonesia'),
(107, 364, 'IR', 'IRN', 'Irán'),
(108, 368, 'IQ', 'IRQ', 'Iraq'),
(109, 372, 'IE', 'IRL', 'Irlanda'),
(110, 352, 'IS', 'ISL', 'Islandia'),
(111, 376, 'IL', 'ISR', 'Israel'),
(112, 380, 'IT', 'ITA', 'Italia'),
(113, 388, 'JM', 'JAM', 'Jamaica'),
(114, 392, 'JP', 'JPN', 'Jap'),
(115, 400, 'JO', 'JOR', 'Jordania'),
(116, 398, 'KZ', 'KAZ', 'Kazajst'),
(117, 404, 'KE', 'KEN', 'Kenia'),
(118, 417, 'KG', 'KGZ', 'Kirguist'),
(119, 296, 'KI', 'KIR', 'Kiribati'),
(120, 414, 'KW', 'KWT', 'Kuwait'),
(121, 418, 'LA', 'LAO', 'Laos'),
(122, 426, 'LS', 'LSO', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Letonia'),
(124, 422, 'LB', 'LBN', 'Líbano'),
(125, 430, 'LR', 'LBR', 'Liberia'),
(126, 434, 'LY', 'LBY', 'Libia'),
(127, 438, 'LI', 'LIE', 'Liechtenstein'),
(128, 440, 'LT', 'LTU', 'Lituania'),
(129, 442, 'LU', 'LUX', 'Luxemburgo'),
(130, 446, 'MO', 'MAC', 'Macao'),
(131, 807, 'MK', 'MKD', 'ARY Macedonia'),
(132, 450, 'MG', 'MDG', 'Madagascar'),
(133, 458, 'MY', 'MYS', 'Malasia'),
(134, 454, 'MW', 'MWI', 'Malawi'),
(135, 462, 'MV', 'MDV', 'Maldivas'),
(136, 466, 'ML', 'MLI', 'Mal'),
(137, 470, 'MT', 'MLT', 'Malta'),
(138, 238, 'FK', 'FLK', 'Islas Malvinas'),
(139, 580, 'MP', 'MNP', 'Islas Marianas del Norte'),
(140, 504, 'MA', 'MAR', 'Marruecos'),
(141, 584, 'MH', 'MHL', 'Islas Marshall'),
(142, 474, 'MQ', 'MTQ', 'Martinica'),
(143, 480, 'MU', 'MUS', 'Mauricio'),
(144, 478, 'MR', 'MRT', 'Mauritania'),
(145, 175, 'YT', 'MYT', 'Mayotte'),
(146, 484, 'MX', 'MEX', 'México'),
(147, 583, 'FM', 'FSM', 'Micronesia'),
(148, 498, 'MD', 'MDA', 'Moldavia'),
(149, 492, 'MC', 'MCO', 'Mónaco'),
(150, 496, 'MN', 'MNG', 'Mongolia'),
(151, 500, 'MS', 'MSR', 'Montserrat'),
(152, 508, 'MZ', 'MOZ', 'Mozambique'),
(153, 104, 'MM', 'MMR', 'Myanmar'),
(154, 516, 'NA', 'NAM', 'Namibia'),
(155, 520, 'NR', 'NRU', 'Nauru'),
(156, 524, 'NP', 'NPL', 'Nepal'),
(157, 558, 'NI', 'NIC', 'Nicaragua'),
(158, 562, 'NE', 'NER', 'Níger'),
(159, 566, 'NG', 'NGA', 'Nigeria'),
(160, 570, 'NU', 'NIU', 'Niue'),
(161, 574, 'NF', 'NFK', 'Isla Norfolk'),
(162, 578, 'NO', 'NOR', 'Noruega'),
(163, 540, 'NC', 'NCL', 'Nueva Caledonia'),
(164, 554, 'NZ', 'NZL', 'Nueva Zelanda'),
(165, 512, 'OM', 'OMN', 'Om'),
(166, 528, 'NL', 'NLD', 'Países Bajos'),
(167, 586, 'PK', 'PAK', 'Pakist'),
(168, 585, 'PW', 'PLW', 'Palau'),
(169, 275, 'PS', 'PSE', 'Palestina'),
(170, 591, 'PA', 'PAN', 'Panam'),
(171, 598, 'PG', 'PNG', 'Papáa Nueva Guinea'),
(172, 600, 'PY', 'PRY', 'Paraguay'),
(173, 604, 'PE', 'PER', 'Perú'),
(174, 612, 'PN', 'PCN', 'Islas Pitcairn'),
(175, 258, 'PF', 'PYF', 'Polinesia Francesa'),
(176, 616, 'PL', 'POL', 'Polonia'),
(177, 620, 'PT', 'PRT', 'Portugal'),
(178, 630, 'PR', 'PRI', 'Puerto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar'),
(180, 826, 'GB', 'GBR', 'Reino Unido'),
(181, 638, 'RE', 'REU', 'Reuni'),
(182, 646, 'RW', 'RWA', 'Ruanda'),
(183, 642, 'RO', 'ROU', 'Rumania'),
(184, 643, 'RU', 'RUS', 'Rusia'),
(185, 732, 'EH', 'ESH', 'Sahara Occidental'),
(186, 90, 'SB', 'SLB', 'Islas Salom'),
(187, 882, 'WS', 'WSM', 'Samoa'),
(188, 16, 'AS', 'ASM', 'Samoa Americana'),
(189, 659, 'KN', 'KNA', 'San Crist?bal y Nevis'),
(190, 674, 'SM', 'SMR', 'San Marino'),
(191, 666, 'PM', 'SPM', 'San Pedro y Miquel'),
(192, 670, 'VC', 'VCT', 'San Vicente y las Granadinas'),
(193, 654, 'SH', 'SHN', 'Santa Helena'),
(194, 662, 'LC', 'LCA', 'Santa Luc'),
(195, 678, 'ST', 'STP', 'Santo Tomás y Príncipe'),
(196, 686, 'SN', 'SEN', 'Senegal'),
(197, 891, 'CS', 'SCG', 'Serbia y Montenegro'),
(198, 690, 'SC', 'SYC', 'Seychelles'),
(199, 694, 'SL', 'SLE', 'Sierra Leona'),
(200, 702, 'SG', 'SGP', 'Singapur'),
(201, 760, 'SY', 'SYR', 'Siria'),
(202, 706, 'SO', 'SOM', 'Somalia'),
(203, 144, 'LK', 'LKA', 'Sri Lanka'),
(204, 748, 'SZ', 'SWZ', 'Suazilandia'),
(205, 710, 'ZA', 'ZAF', 'Sudáfrica'),
(206, 736, 'SD', 'SDN', 'Sud'),
(207, 752, 'SE', 'SWE', 'Suecia'),
(208, 756, 'CH', 'CHE', 'Suiza'),
(209, 740, 'SR', 'SUR', 'Surinam'),
(210, 744, 'SJ', 'SJM', 'Svalbard y Jan Mayen'),
(211, 764, 'TH', 'THA', 'Tailandia'),
(212, 158, 'TW', 'TWN', 'Taiw'),
(213, 834, 'TZ', 'TZA', 'Tanzania'),
(214, 762, 'TJ', 'TJK', 'Tayikist'),
(215, 86, 'IO', 'IOT', 'Territorio Británico del Ocáano Índico'),
(216, 260, 'TF', 'ATF', 'Territorios Australes Franceses'),
(217, 626, 'TL', 'TLS', 'Timor Oriental'),
(218, 768, 'TG', 'TGO', 'Togo'),
(219, 772, 'TK', 'TKL', 'Tokelau'),
(220, 776, 'TO', 'TON', 'Tonga'),
(221, 780, 'TT', 'TTO', 'Trinidad y Tobago'),
(222, 788, 'TN', 'TUN', 'Túnez'),
(223, 796, 'TC', 'TCA', 'Islas Turcas y Caicos'),
(224, 795, 'TM', 'TKM', 'Turkmenist'),
(225, 792, 'TR', 'TUR', 'Turquía'),
(226, 798, 'TV', 'TUV', 'Tuvalu'),
(227, 804, 'UA', 'UKR', 'Ucrania'),
(228, 800, 'UG', 'UGA', 'Uganda'),
(229, 858, 'UY', 'URY', 'Uruguay'),
(230, 860, 'UZ', 'UZB', 'Uzbekist'),
(231, 548, 'VU', 'VUT', 'Vanuatu'),
(232, 862, 'VE', 'VEN', 'Venezuela'),
(233, 704, 'VN', 'VNM', 'Vietnam'),
(234, 92, 'VG', 'VGB', 'Islas Vírgenes Británicas'),
(235, 850, 'VI', 'VIR', 'Islas Vírgenes de los Estados Unidos'),
(236, 876, 'WF', 'WLF', 'Wallis y Futuna'),
(237, 887, 'YE', 'YEM', 'Yemen'),
(238, 262, 'DJ', 'DJI', 'Yibuti'),
(239, 894, 'ZM', 'ZMB', 'Zambia'),
(240, 716, 'ZW', 'ZWE', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE IF NOT EXISTS `paquete` (
  `paqueteID` int(3) NOT NULL AUTO_INCREMENT,
  `nombrePaquete` varchar(20) NOT NULL,
  `tipoPublicacion` int(11) DEFAULT NULL COMMENT '1 si es una publicacion en alguna seccion diferente al directorio\r\n2 si es una publicacion en el directorio',
  PRIMARY KEY (`paqueteID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`paqueteID`, `nombrePaquete`, `tipoPublicacion`) VALUES
(1, 'Lite', 1),
(2, 'Regular', 1),
(3, 'Premium', 1),
(4, 'Asociacion', 3),
(5, 'Directorio 1', 4),
(6, 'Directorio 2', 4),
(7, 'Directorio 3', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) NOT NULL,
  `nombrePermiso` varchar(70) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPermiso`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idPermiso`, `nivel`, `nombrePermiso`, `borrado`) VALUES
(1, 1, 'Usuario Normal : Cuenta', 0),
(2, 2, 'Usuario Negocio: Cuenta Negocio', 0),
(3, 3, 'Usuario AC: Cuenta AC', 0),
(4, 0, 'Admin', 0),
(5, 1, 'Carrito: Usuario', 0),
(6, 2, 'Carrito: Negocio', 0),
(7, 3, 'Carrito: AC', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productodetalle`
--

CREATE TABLE IF NOT EXISTS `productodetalle` (
  `detalleProductoID` int(11) NOT NULL AUTO_INCREMENT,
  `productoID` int(11) DEFAULT NULL,
  `detalle` varchar(70) DEFAULT NULL,
  `valor` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`detalleProductoID`) USING BTREE,
  KEY `productoID` (`productoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1260 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `productodetalle`
--

INSERT INTO `productodetalle` (`detalleProductoID`, `productoID`, `detalle`, `valor`) VALUES
(1, 1, 'talla', 'Unitalla'),
(2, 1, 'color', 'UNICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `publicacionID` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` int(1) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `numeroVisitas` int(11) NOT NULL,
  `estadoID` int(11) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `razaID` char(20) NOT NULL,
  `precioVenta` float DEFAULT NULL,
  `descripcion` text NOT NULL,
  `muestraTelefono` tinyint(1) NOT NULL,
  `aprobada` tinyint(1) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`publicacionID`,`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `contenidoPublicacion` (`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `publicacionID` (`publicacionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`publicacionID`, `seccion`, `titulo`, `vigente`, `fechaCreacion`, `fechaVencimiento`, `numeroVisitas`, `estadoID`, `genero`, `razaID`, `precioVenta`, `descripcion`, `muestraTelefono`, `aprobada`, `servicioID`, `detalleID`, `paqueteID`, `ciudad`) VALUES
(1, 7, 'qwerty', 1, '2015-03-29', '2015-04-28', 1, 22, 1, '6', 0, 'se perdio :(', 1, 1, 1, 1, 1, 'qro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE IF NOT EXISTS `raza` (
  `razaID` int(11) NOT NULL AUTO_INCREMENT,
  `raza` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`razaID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=197 AUTO_INCREMENT=84 ;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`razaID`, `raza`) VALUES
(1, 'Akita Inu'),
(2, 'Alaskan Malamute'),
(3, 'Barzoi'),
(4, 'Basset Azul de Gascu?'),
(5, 'Basset Hound'),
(6, 'Beagle'),
(7, 'Beauceron'),
(8, 'Bich? Malt?'),
(9, 'Bobtail'),
(10, 'Border Collie'),
(11, 'Boxer'),
(12, 'Boyero de Berna'),
(13, 'Braco'),
(14, 'Briard'),
(15, 'Bull Terrier Ingl?'),
(16, 'Bulldog'),
(17, 'Bullmastiff'),
(18, 'Cairn Terrier'),
(19, 'Cane Corso'),
(20, 'Caniche'),
(21, 'Cavalier King Charles'),
(22, 'Chihuahua'),
(23, 'Chow Chow'),
(24, 'Cocker Spaniel'),
(25, 'Collie'),
(26, 'D?mata'),
(27, 'Doberman'),
(28, 'Dogo'),
(29, 'Epagneul'),
(30, 'Fox Terrier'),
(31, 'Galgo'),
(32, 'Golden Retriever'),
(33, 'Gordon Setter'),
(34, 'Gos d''Atura'),
(35, 'Gran Dan?'),
(36, 'Husky Siberiano'),
(37, 'Komondor'),
(38, 'Labrador Retriever'),
(39, 'Lebrel'),
(40, 'Mastiff'),
(41, 'Mast?'),
(42, 'Monta? de los Pirineos'),
(43, 'Norfolk Terrier'),
(44, 'Norwich Terrier'),
(45, 'Papillon'),
(46, 'Pastor Alem?'),
(47, 'Pastor Australiano'),
(48, 'Pastor Belga'),
(49, 'Pastor Blanco Suizo'),
(50, 'Pastor de los Pirineos'),
(51, 'Pekin?'),
(52, 'Peque? Azul de Gascu?'),
(53, 'Peque? Basset Griffon'),
(54, 'Peque? Brabantino'),
(55, 'Peque? Perro Le?'),
(56, 'Peque? Perro Ruso'),
(57, 'Peque? Sabueso Suizo'),
(58, 'Perdiguero'),
(59, 'Perro de Agua Espa?l'),
(60, 'Perro Lobo de Checoslovaquia'),
(61, 'Pinscher miniatura'),
(62, 'Pit Bull'),
(63, 'Podenco'),
(64, 'Pointer Ingl?'),
(65, 'Presa Canario'),
(66, 'Pug'),
(67, 'Rafeiro do Alentejo'),
(68, 'Rottweiler'),
(69, 'Samoyedo'),
(70, 'San Bernardo'),
(71, 'Schnauzer'),
(72, 'Scottish Terrier'),
(73, 'Setter'),
(74, 'Shar Pei'),
(75, 'Shih Tzu'),
(76, 'Spitz'),
(77, 'Springer Spaniel'),
(78, 'Teckel'),
(79, 'Terranova'),
(80, 'Weimaraner'),
(81, 'Westies'),
(82, 'Whippet'),
(83, 'Yorkshire Terrier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) NOT NULL,
  `borrado` int(11) NOT NULL,
  PRIMARY KEY (`idRol`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `borrado`) VALUES
(1, 'Usuario Normal', 0),
(2, 'Usuario Negocio', 0),
(3, 'Usuario AC', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roltienepermiso`
--

CREATE TABLE IF NOT EXISTS `roltienepermiso` (
  `idRol` int(11) NOT NULL,
  `idPermiso` int(11) NOT NULL,
  PRIMARY KEY (`idRol`,`idPermiso`) USING BTREE,
  KEY `fk_rol_has_permiso_permiso1` (`idPermiso`) USING BTREE,
  KEY `fk_rol_has_permiso_rol` (`idRol`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730;

--
-- Volcado de datos para la tabla `roltienepermiso`
--

INSERT INTO `roltienepermiso` (`idRol`, `idPermiso`) VALUES
(1, 1),
(2, 2),
(3, 3),
(1, 5),
(2, 5),
(3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `seccionID` int(10) NOT NULL AUTO_INCREMENT,
  `seccionNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`seccionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1092 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`seccionID`, `seccionNombre`) VALUES
(1, 'Inicio'),
(2, 'Venta'),
(3, 'Cruza'),
(4, 'Directorio'),
(5, 'Perfil de usuario'),
(6, 'Adopción'),
(7, 'Perros Perdidos'),
(8, 'La raza del mes'),
(9, 'Evento del mes'),
(10, 'Datos Curiosos'),
(11, 'Asoc. Protectoras'),
(12, '¿Quiénes somos?'),
(13, 'Tutorial'),
(14, 'Publicidad'),
(15, 'F.A.Q.'),
(16, 'Tienda'),
(17, 'Publicidad Lateral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciocontratado`
--

CREATE TABLE IF NOT EXISTS `serviciocontratado` (
  `servicioID` int(11) NOT NULL AUTO_INCREMENT,
  `cantFotos` int(11) NOT NULL,
  `caracteres` int(11) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `cupones` int(2) NOT NULL,
  `videos` int(2) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `pagado` int(11) DEFAULT '0',
  PRIMARY KEY (`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `detallePaqueteUsuario` (`idUsuario`) USING BTREE,
  KEY `historicoPaquete` (`detalleID`,`paqueteID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=606 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `serviciocontratado`
--

INSERT INTO `serviciocontratado` (`servicioID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `detalleID`, `paqueteID`, `idUsuario`, `pagado`) VALUES
(1, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopaquete`
--

CREATE TABLE IF NOT EXISTS `tipopaquete` (
  `idtipopaquete` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoPaquete` varchar(80) NOT NULL,
  PRIMARY KEY (`idtipopaquete`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipopaquete`
--

INSERT INTO `tipopaquete` (`idtipopaquete`, `nombreTipoPaquete`) VALUES
(1, 'Lite'),
(2, 'Regular'),
(3, 'Premium'),
(4, 'Asociacion'),
(5, 'Directorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacionusuario`
--

CREATE TABLE IF NOT EXISTS `ubicacionusuario` (
  `ubicacionUsuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` int(1) NOT NULL,
  `latitud` varchar(40) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `idUsuarioDato` int(11) NOT NULL,
  `estadoID` int(11) DEFAULT NULL,
  `zonageograficaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ubicacionUsuarioID`,`idUsuarioDato`) USING BTREE,
  KEY `ubicacionUsuario` (`idUsuarioDato`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(39) NOT NULL,
  `apellido` varchar(65) NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `recepcionCorreo` int(1) NOT NULL DEFAULT '1' COMMENT '1 - recepci?n de correo activa\n 0 - recepci?n de correo inactiva',
  `tipoUsuario` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Administrador\n1 - usuario normal\n2 - negocio\n3 - AC',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 - no activado\n1 - activo',
  `nivel` int(11) DEFAULT NULL COMMENT 'establecimiento de jerarqu?a en usuarios',
  `codigoConfirmacion` varchar(100) NOT NULL COMMENT 'c?digo necesario para confirmar cuenta.',
  `fechaRegistro` datetime NOT NULL,
  `useragent` varchar(255) DEFAULT NULL,
  `last_ip_access` varchar(16) DEFAULT NULL,
  `authKey` varchar(100) DEFAULT NULL,
  `paqueteGratis` int(11) DEFAULT '1' COMMENT 'si paquete gratis = 1 no lo ha usado, si = 0 entonces ya tiene costo',
  PRIMARY KEY (`idUsuario`) USING BTREE,
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=3276 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `telefono`, `correo`, `contrasena`, `recepcionCorreo`, `tipoUsuario`, `status`, `nivel`, `codigoConfirmacion`, `fechaRegistro`, `useragent`, `last_ip_access`, `authKey`, `paqueteGratis`) VALUES
(2, 'admin', 'admin', 1111, 'admin@gmail.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 0, 1, 0, 'A7995E2C507D113EF045E8BE6', '2014-07-14 21:23:15', NULL, NULL, '94C7DE0C57467C749498', 1),
(3, 'martha', 'hdez', 1234567890, 'marthahdez2@gmail.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 1, 1, 1, 1, '44A63B77D28010A2723F0C293', '2014-07-17 17:24:18', NULL, NULL, '7D8ACF432EAF5E5C140F', 0),
(4, 'dddd', 'dddd', 0, 'dddd@ssss.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 1, 1, 1, 'A7995E2C507D113EF045E8BE6', '2014-08-03 18:24:47', NULL, NULL, 'DAE20D308B05D531E511', 1),
(6, 'Martha', 'hh', 2147483647, 'martha.tain1@gmail.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 2, 1, 2, 'A7995E2C507D113EF045E8BE6', '2014-08-06 21:23:18', NULL, NULL, '98C754E1CE1B08B535CA', 1),
(7, 'AAA', 'AAAAAAA', 0, 'AAAA@AAA.COM', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 3, 1, 3, 'FA5760A00DBFD87A83B1444D1', '2014-08-06 21:27:41', NULL, NULL, '8C57194032ECDF532210', 1),
(8, 'qwerty', 'qwerty', 0, 'marthahdez1@gmail.com', '09e9594c4e08da50121b6d96709f0cb82883ed0a589d568e22', 1, 2, 1, 2, 'A7CB99ED6727A5DC281AECB4D', '2014-08-15 18:54:48', NULL, NULL, 'BC1577B76C78A27825D6', 1),
(9, 'ADMIN', 'ADMIN', 1234567890, 'marthahdez22@gmail.com', 'ce837a193dcf8a0928f833783098d1618022daa182d8b46285', 1, 0, 2, 0, '257F06E49C44489737D3BBD31', '2014-08-24 03:08:24', NULL, NULL, '727E36D81670749F9ADC', 1),
(10, 'ADMIN', 'ADMIN', 1234567890, 'marthahdez3@gmail.com', 'dbc69d29174adbf8ce36f3dcfc0f59e71ba84994beeda33375', 1, 0, 2, 0, 'B26B7969336756D19A6AEA3B3', '2014-08-24 03:13:22', NULL, NULL, 'F5D6087BCAFD0F5DA5CB', 1),
(11, 'adminadmin', 'adminadmin', 0, 'marthahdez4@gmail.com', '24da39cb7e92b5194a1139a352eff6414cf1a844b3fb968d33', 1, 0, 2, 0, 'E17BCBA6035A2D74A239BEF0F', '2014-08-24 03:15:23', NULL, NULL, '8E90D61BADDC5BE38ACB', 1),
(12, 'martha', 'hdez', 0, 'cosa83@hotmail.com', 'b183d14427376863e2c042ddfa2d7e306dc3772b69f7d141c6', 1, 1, 1, 1, '341AFB0F050E31E75BB0D79B7', '2014-08-28 10:55:37', NULL, NULL, 'EEBFE31A1948BA164A2C', 1),
(13, 'Marina', 'Baez', 2147483647, 'marina.baezb@gmail.com', '327cd28dccfcbf1d2d979818a6127b28dc2194d8b2b916b456', 0, 1, 0, 1, '0C6D34EF617BE631BAFE31297', '2014-11-07 10:19:45', NULL, NULL, '375AD57052B7F03A00A3', 1),
(14, 'Juan', 'Perez', 2147483647, 'joanitom@hotmail.com', '48eccaf71f31964898232300a4a1258871de71a7c393fa1b63', 1, 1, 1, 1, '91C1CA0D827694473AEA68FB4', '2014-11-08 17:22:08', NULL, NULL, '1F8F7CBBB0A1DAAD7855', 1),
(15, 'remigio', 'amieva', 2147483647, 'ramieva@calclosets.com', 'ab595eea9927c31ec1991c86cf3f7ee64276553451dc0fa524', 0, 1, 1, 1, 'E320B1FDAF757D80C67449D28', '2014-11-11 23:02:58', NULL, NULL, 'A1F1E04DB7A266B95BC3', 1),
(16, 'Marina', 'Baez', 1234567890, 'mbaez_88@hotmail.com', 'e7a6b90a6526e94836dbddc32c42fbb7c2c62b48d2046de10c', 1, 1, 0, 1, '12FA67992AA6E9FDF17E66BB0', '2014-11-24 10:41:19', NULL, NULL, 'BB6F34A1EFCBF232DF18', 1),
(17, 'Martha', 'Hdez', 0, 'martha.tain@gmail.com', '75d7a37743b8743a338f20c983ca64c0b72f23e51f772ae40e', 1, 1, 0, 1, 'FD1638535C23DB4E41E3AD28F', '2014-11-24 16:57:40', NULL, NULL, '5F254CE7FCDDF16185D9', 1),
(18, 'Remigio', 'Amieva', 1234567890, 'amieva.remigio@gmail.com', 'a0e4337acb90d9b28dc2d24503aa44aafd9b3bfccab04b6721', 1, 1, 1, 1, 'C79D8D6033F5A5076367F8B13', '2014-11-24 19:28:22', NULL, NULL, '333507FB2FAD57B937A8', 1),
(19, 'marina', 'baez', 2147483647, 'mbaezb@me.com', '22917515a83552a9a71d89da475d2633fdcbf177752bb25b92', 0, 2, 0, 2, 'C18174C6685625676E56C7A01', '2015-01-04 19:38:12', NULL, NULL, '91069F4F292401A79B36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariodato`
--

CREATE TABLE IF NOT EXISTS `usuariodato` (
  `idUsuarioDato` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `razonSocial` varchar(45) NOT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `noInterior` varchar(11) DEFAULT NULL,
  `noExterior` varchar(11) DEFAULT NULL,
  `cp` int(7) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `estadoID` int(11) NOT NULL,
  `idPais` int(11) DEFAULT '147' COMMENT '147 = M?xico',
  PRIMARY KEY (`idUsuarioDato`) USING BTREE,
  KEY `adicional` (`idUsuario`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuariodato`
--

INSERT INTO `usuariodato` (`idUsuarioDato`, `idUsuario`, `razonSocial`, `rfc`, `calle`, `noInterior`, `noExterior`, `cp`, `municipio`, `estadoID`, `idPais`) VALUES
(2, 3, 'RFC', 'RFC', 'qwerty', '0', '454', 76000, 'MTY', 19, 147);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariodetalle`
--

CREATE TABLE IF NOT EXISTS `usuariodetalle` (
  `idusuarioDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `tipoUsuario` int(1) NOT NULL,
  `nombreNegocio` varchar(80) NOT NULL,
  `giro` varchar(45) DEFAULT NULL,
  `nombreContacto` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(45) NOT NULL,
  `paginaWeb` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `descripcion` tinytext,
  `municipioC` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idusuarioDetalle`,`idUsuario`) USING BTREE,
  KEY `detalleUsuario` (`idUsuario`) USING BTREE,
  KEY `idusuarioDetalle` (`idusuarioDetalle`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 COMMENT='Ambos usuarios, Negocio y AC comparten estos datos, por lo cual ambos se almacenan en esta tabla' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `videoID` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `publicacionID` int(11) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  PRIMARY KEY (`videoID`) USING BTREE,
  KEY `publicacionID` (`publicacionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`videoID`, `link`, `publicacionID`, `servicioID`, `detalleID`, `paqueteID`) VALUES
(1, '', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `idVisita` int(11) NOT NULL,
  `numeroVisitas` int(11) DEFAULT '0',
  PRIMARY KEY (`idVisita`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idVisita`, `numeroVisitas`) VALUES
(1, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vs_database_diagrams`
--

CREATE TABLE IF NOT EXISTS `vs_database_diagrams` (
  `name` char(80) DEFAULT NULL,
  `diadata` text,
  `comment` varchar(1022) DEFAULT NULL,
  `preview` text,
  `lockinfo` char(80) DEFAULT NULL,
  `locktime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vs_database_diagrams`
--

INSERT INTO `vs_database_diagrams` (`name`, `diadata`, `comment`, `preview`, `lockinfo`, `locktime`, `version`) VALUES
('productos', NULL, NULL, NULL, 'quieroun_perro*3989957', '2014-07-25 18:46:09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonageografica`
--

CREATE TABLE IF NOT EXISTS `zonageografica` (
  `zonaID` int(11) NOT NULL AUTO_INCREMENT,
  `zona` varchar(60) NOT NULL,
  PRIMARY KEY (`zonaID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `zonageografica`
--

INSERT INTO `zonageografica` (`zonaID`, `zona`) VALUES
(1, 'Noroeste'),
(2, 'Noreste'),
(3, 'Occidente'),
(4, 'Centronorte'),
(5, 'Metropolitana'),
(6, 'Oriente'),
(7, 'Suroeste'),
(8, 'Sureste'),
(9, 'Todas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonageograficaestado`
--

CREATE TABLE IF NOT EXISTS `zonageograficaestado` (
  `zonaID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `estadoID` int(11) NOT NULL,
  `zonageograficaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`zonaID`,`estadoID`) USING BTREE,
  KEY `zonageograficaID` (`zonageograficaID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=496 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `zonageograficaestado`
--

INSERT INTO `zonageograficaestado` (`zonaID`, `nombre`, `estadoID`, `zonageograficaID`) VALUES
(2, 'Noroeste', 2, 1),
(3, 'Noroeste', 3, 1),
(4, 'Noroeste', 26, 1),
(5, 'Noroeste', 25, 1),
(6, 'Noroeste', 6, 1),
(7, 'Noroeste', 10, 1),
(8, 'Noreste', 7, 2),
(9, 'Noreste', 19, 2),
(10, 'Noreste', 28, 2),
(11, 'Occidente', 15, 3),
(12, 'Occidente', 18, 3),
(13, 'Occidente', 8, 3),
(14, 'Occidente', 16, 3),
(15, 'Centronorte', 1, 4),
(16, 'Centronorte', 12, 4),
(17, 'Centronorte', 24, 4),
(18, 'Centronorte', 22, 4),
(19, 'Centronorte', 32, 4),
(20, 'Metropolitana', 11, 5),
(21, 'Metropolitana', 9, 5),
(22, 'Metropolitana', 17, 5),
(23, 'Oriente', 14, 6),
(24, 'Oriente', 21, 6),
(25, 'Oriente', 29, 6),
(26, 'Oriente', 30, 6),
(27, 'Oriente', 27, 6),
(28, 'Suroeste', 13, 7),
(29, 'Suroeste', 20, 7),
(30, 'Suroeste', 5, 7),
(31, 'Sureste', 4, 8),
(32, 'Sureste', 23, 8),
(33, 'Sureste', 31, 8),
(34, 'Sureste', 27, 8);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_fk1` FOREIGN KEY (`seccionID`) REFERENCES `seccion` (`seccionID`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_fk1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_fk1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `compradetalle`
--
ALTER TABLE `compradetalle`
  ADD CONSTRAINT `compradetalle_fk1` FOREIGN KEY (`compraID`) REFERENCES `compra` (`compraID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contadormensajes`
--
ALTER TABLE `contadormensajes`
  ADD CONSTRAINT `tiene` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_fk1` FOREIGN KEY (`seccionID`) REFERENCES `seccion` (`seccionID`);

--
-- Filtros para la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD CONSTRAINT `cupon_fk1` FOREIGN KEY (`paqueteID`) REFERENCES `paquete` (`paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuponadquirido`
--
ALTER TABLE `cuponadquirido`
  ADD CONSTRAINT `detalleCuponPaquete` FOREIGN KEY (`servicioID`, `detalleID`, `paqueteID`) REFERENCES `serviciocontratado` (`servicioID`, `detalleID`, `paqueteID`);

--
-- Filtros para la tabla `cupondetalle`
--
ALTER TABLE `cupondetalle`
  ADD CONSTRAINT `detalleCupon` FOREIGN KEY (`cuponID`) REFERENCES `cupon` (`cuponID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallepaquete`
--
ALTER TABLE `detallepaquete`
  ADD CONSTRAINT `detallePaquete` FOREIGN KEY (`paqueteID`) REFERENCES `paquete` (`paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallepaquete_fk1` FOREIGN KEY (`tipoPaquete`) REFERENCES `tipopaquete` (`idtipopaquete`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccionenvio`
--
ALTER TABLE `direccionenvio`
  ADD CONSTRAINT `direccionenvio_fk1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotostienda`
--
ALTER TABLE `fotostienda`
  ADD CONSTRAINT `fotostienda_fk1` FOREIGN KEY (`productoID`) REFERENCES `catalogoproductos` (`productoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `giroempresa`
--
ALTER TABLE `giroempresa`
  ADD CONSTRAINT `giroempresa_fk1` FOREIGN KEY (`idUsuarioDetalle`) REFERENCES `usuariodetalle` (`idusuarioDetalle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productodetalle`
--
ALTER TABLE `productodetalle`
  ADD CONSTRAINT `productodetalle_fk1` FOREIGN KEY (`productoID`) REFERENCES `catalogoproductos` (`productoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roltienepermiso`
--
ALTER TABLE `roltienepermiso`
  ADD CONSTRAINT `fk_rol_has_permiso_permiso1` FOREIGN KEY (`idPermiso`) REFERENCES `permiso` (`idPermiso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rol_has_permiso_rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `serviciocontratado`
--
ALTER TABLE `serviciocontratado`
  ADD CONSTRAINT `detallePaqueteUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historicoPaquete` FOREIGN KEY (`detalleID`, `paqueteID`) REFERENCES `detallepaquete` (`detalleID`, `paqueteID`);

--
-- Filtros para la tabla `ubicacionusuario`
--
ALTER TABLE `ubicacionusuario`
  ADD CONSTRAINT `ubicacionUsuario` FOREIGN KEY (`idUsuarioDato`) REFERENCES `usuariodato` (`idUsuarioDato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariodato`
--
ALTER TABLE `usuariodato`
  ADD CONSTRAINT `adicional` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariodetalle`
--
ALTER TABLE `usuariodetalle`
  ADD CONSTRAINT `detalleUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `zonageograficaestado`
--
ALTER TABLE `zonageograficaestado`
  ADD CONSTRAINT `zonageograficaestado_fk1` FOREIGN KEY (`zonageograficaID`) REFERENCES `zonageografica` (`zonaID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
