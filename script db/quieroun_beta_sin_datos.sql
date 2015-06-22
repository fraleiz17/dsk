-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2015 a las 16:26:16
-- Versión del servidor: 5.5.41-cll-lve
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `quieroun_beta`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=79 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=34 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384 AUTO_INCREMENT=29 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1024 AUTO_INCREMENT=7 ;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `compraID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) NOT NULL,
  `subtotal` float(10,2) NOT NULL,
  `idCuponAdquirido` int(11) DEFAULT NULL,
  `descuento` int(2) DEFAULT NULL,
  `total` float(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `pagado` int(11) DEFAULT '0',
  PRIMARY KEY (`compraID`) USING BTREE,
  KEY `usuarioID` (`usuarioID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=120 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=88 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1365 AUTO_INCREMENT=13 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=528 AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinoenvio`
--

CREATE TABLE IF NOT EXISTS `destinoenvio` (
  `destinoID` int(11) NOT NULL AUTO_INCREMENT,
  `grupoID` int(11) NOT NULL,
  `estadoID` int(11) NOT NULL,
  PRIMARY KEY (`destinoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='agrupacion de estados segun costo de envio' AUTO_INCREMENT=40 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=0 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `estadoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(30) NOT NULL,
  PRIMARY KEY (`estadoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=496 AUTO_INCREMENT=34 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819 AUTO_INCREMENT=39 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384 AUTO_INCREMENT=63 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819 AUTO_INCREMENT=21 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=39 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1260 AUTO_INCREMENT=48 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE IF NOT EXISTS `raza` (
  `razaID` int(11) NOT NULL AUTO_INCREMENT,
  `raza` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`razaID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=197 AUTO_INCREMENT=84 ;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `seccionID` int(10) NOT NULL AUTO_INCREMENT,
  `seccionNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`seccionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1092 AUTO_INCREMENT=18 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=606 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopaquete`
--

CREATE TABLE IF NOT EXISTS `tipopaquete` (
  `idtipopaquete` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoPaquete` varchar(80) NOT NULL,
  PRIMARY KEY (`idtipopaquete`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=3276 AUTO_INCREMENT=33 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730 AUTO_INCREMENT=16 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 COMMENT='Ambos usuarios, Negocio y AC comparten estos datos, por lo cual ambos se almacenan en esta tabla' AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `idVisita` int(11) NOT NULL,
  `numeroVisitas` int(11) DEFAULT '0',
  PRIMARY KEY (`idVisita`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonageografica`
--

CREATE TABLE IF NOT EXISTS `zonageografica` (
  `zonaID` int(11) NOT NULL AUTO_INCREMENT,
  `zona` varchar(60) NOT NULL,
  PRIMARY KEY (`zonaID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820 AUTO_INCREMENT=10 ;

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
