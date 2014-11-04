DROP TABLE  `giro`;

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

ALTER TABLE `paquete` MODIFY COLUMN `tipoPublicacion` INTEGER(11) DEFAULT NULL COMMENT '1 si es una publicacion en alguna seccion diferente al directorio\r\n2 si es una publicacion en el directorio';
