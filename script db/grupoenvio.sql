-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2014 a las 07:50:41
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `qup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoenvio`
--

DROP TABLE IF EXISTS `grupoenvio`;
CREATE TABLE IF NOT EXISTS `grupoenvio` (
  `grupoID` int(11) NOT NULL,
  `costo` double NOT NULL
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupoenvio`
--
ALTER TABLE `grupoenvio`
 ADD PRIMARY KEY (`grupoID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
