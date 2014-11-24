-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2014 a las 02:12:51
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
-- Estructura de tabla para la tabla `destinoenvio`
--

CREATE TABLE IF NOT EXISTS `destinoenvio` (
`destinoID` int(11) NOT NULL,
  `grupoID` int(11) NOT NULL,
  `estadoID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='agrupacion de estados segun costo de envio';

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destinoenvio`
--
ALTER TABLE `destinoenvio`
 ADD PRIMARY KEY (`destinoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destinoenvio`
--
ALTER TABLE `destinoenvio`
MODIFY `destinoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
