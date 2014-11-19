
DROP TABLE IF EXISTS `detallepaquete`;
DROP TABLE IF EXISTS `tipopaquete`;
DROP TABLE IF EXISTS `paquete`;



#
# Structure for the `paquete` table : 
#

CREATE TABLE `paquete` (
  `paqueteID` INTEGER(3) NOT NULL AUTO_INCREMENT,
  `nombrePaquete` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `tipoPublicacion` INTEGER(11) DEFAULT NULL COMMENT '1 si es una publicacion en alguna seccion diferente al directorio\r\n2 si es una publicacion en el directorio',
  PRIMARY KEY USING BTREE (`paqueteID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=8 AVG_ROW_LENGTH=5461 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;


#
# Structure for the `tipopaquete` table : 
#

CREATE TABLE `tipopaquete` (
  `idtipopaquete` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoPaquete` VARCHAR(80) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`idtipopaquete`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=6 AVG_ROW_LENGTH=5461 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `detallepaquete` table : 
#

CREATE TABLE `detallepaquete` (
  `detalleID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `cantFotos` INTEGER(11) NOT NULL,
  `caracteres` INTEGER(11) NOT NULL,
  `vigencia` INTEGER(2) NOT NULL,
  `cupones` INTEGER(2) NOT NULL,
  `videos` INTEGER(2) NOT NULL,
  `precio` FLOAT(5,2) NOT NULL,
  `paqueteID` INTEGER(3) NOT NULL,
  `tipoPaquete` INTEGER(11) NOT NULL DEFAULT 1 COMMENT 'Elemento que identifica el tipo de paquete',
  PRIMARY KEY USING BTREE (`detalleID`, `paqueteID`) COMMENT '',
   INDEX `detallePaquete` USING BTREE (`paqueteID`) COMMENT '',
   INDEX `fk_tipoPaquete_paquete_idx` USING BTREE (`tipoPaquete`) COMMENT '',
  CONSTRAINT `detallePaquete` FOREIGN KEY (`paqueteID`) REFERENCES `paquete` (`paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detallepaquete_fk1` FOREIGN KEY (`tipoPaquete`) REFERENCES `tipopaquete` (`idtipopaquete`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=8 AVG_ROW_LENGTH=5461 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Data for the `paquete` table  (LIMIT -492,500)
#

INSERT INTO `paquete` (`paqueteID`, `nombrePaquete`, `tipoPublicacion`) VALUES

  (1,'Lite',1),
  (2,'Regular',1),
  (3,'Premium',1),
  (4,'Asociacion',3),
  (5,'Directorio 1',4),
  (6,'Directorio 2',4),
  (7,'Directorio 3',4);
COMMIT;


#
# Data for the `tipopaquete` table  (LIMIT -494,500)
#

INSERT INTO `tipopaquete` (`idtipopaquete`, `nombreTipoPaquete`) VALUES

  (1,'Lite'),
  (2,'Regular'),
  (3,'Premium'),
  (4,'Asociacion'),
  (5,'Directorio');
COMMIT;

#
# Data for the `detallepaquete` table  (LIMIT -492,500)
#

INSERT INTO `detallepaquete` (`detalleID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `paqueteID`, `tipoPaquete`) VALUES

  (1,1,30,30,0,0,0.00,1,1),
  (2,2,300,15,2,1,100.00,2,2),
  (3,3,1000,60,3,2,166.00,3,3),
  (4,0,1000,1825,0,0,0.00,4,4),
  (5,0,100,30,0,0,25.00,5,5),
  (6,0,200,60,0,0,50.00,6,5),
  (7,0,300,90,0,0,75.00,7,5);
COMMIT;

