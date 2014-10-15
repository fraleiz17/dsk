
ALTER TABLE `quieroun_perro_dev`.`detallepaquete` 
ADD COLUMN `tipoPaquete` INT(11) NULL DEFAULT 1 COMMENT 'Elemento que identifica el tipo de paquete' AFTER `paqueteID`;


CREATE TABLE `quieroun_perro_dev`.`tipopaquete` (
  `idtipopaquete` INT NOT NULL,
  `nombreTipoPaquete` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idtipopaquete`));

ALTER TABLE `quieroun_perro_dev`.`detallepaquete` 
CHANGE COLUMN `tipoPaquete` `tipoPaquete` INT(11) NOT NULL DEFAULT '1' COMMENT 'Elemento que identifica el tipo de paquete' ;


ALTER TABLE `quieroun_perro_dev`.`detallepaquete` 
ADD INDEX `fk_tipoPaquete_paquete_idx` (`tipoPaquete` ASC);
ALTER TABLE `quieroun_perro_dev`.`detallepaquete` 
ADD CONSTRAINT `fk_tipoPaquete_paquete`
  FOREIGN KEY (`tipoPaquete`)
  REFERENCES `quieroun_perro_dev`.`tipopaquete` (`idtipopaquete`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;


alter table `compra`
add column `pagado` int(1) default '0' not null;