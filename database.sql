-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema agrappserv
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `agrappserv` ;

-- -----------------------------------------------------
-- Schema agrappserv
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `agrappserv` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `agrappserv` ;

-- -----------------------------------------------------
-- Table `agrappserv`.`TIPO_USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`TIPO_USUARIO` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`TIPO_USUARIO` (
  `ID` INT NOT NULL,
  `ROL` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`USUARIO` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`USUARIO` (
  `ID` INT NOT NULL,
  `NOMBRE` VARCHAR(45) NULL,
  `CORREO` VARCHAR(45) NULL,
  `TIPO_USUARIO_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `TIPO_USUARIO_ID`),
  INDEX `fk_USUARIO_TIPO_USUARIO1_idx` (`TIPO_USUARIO_ID` ASC),
  CONSTRAINT `fk_USUARIO_TIPO_USUARIO1`
    FOREIGN KEY (`TIPO_USUARIO_ID`)
    REFERENCES `agrappserv`.`TIPO_USUARIO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`TIPO_PLAGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`TIPO_PLAGA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`TIPO_PLAGA` (
  `ID` INT NOT NULL,
  `TITULO` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`PLAGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`PLAGA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`PLAGA` (
  `ID` INT NOT NULL,
  `NOMB_POPULAR` VARCHAR(45) NULL,
  `NOMB_CIENTIFICO` VARCHAR(45) NULL,
  `DESCRIPCION` VARCHAR(45) NULL,
  `FUENTE` VARCHAR(45) NULL,
  `USUARIO` VARCHAR(45) NULL,
  `INGRESO` VARCHAR(45) NULL,
  `STATUS` VARCHAR(45) NULL,
  `TIPO_PLAGA_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `TIPO_PLAGA_ID`),
  INDEX `fk_PLAGA_TIPO_PLAGA1_idx` (`TIPO_PLAGA_ID` ASC),
  CONSTRAINT `fk_PLAGA_TIPO_PLAGA1`
    FOREIGN KEY (`TIPO_PLAGA_ID`)
    REFERENCES `agrappserv`.`TIPO_PLAGA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`IMG_PLAGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`IMG_PLAGA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`IMG_PLAGA` (
  `ID` INT NOT NULL,
  `TITULO` VARCHAR(45) NULL,
  `URL` VARCHAR(45) NULL,
  `PLAGA_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `PLAGA_ID`),
  INDEX `fk_IMG_PLAGA_PLAGA_idx` (`PLAGA_ID` ASC),
  CONSTRAINT `fk_IMG_PLAGA_PLAGA`
    FOREIGN KEY (`PLAGA_ID`)
    REFERENCES `agrappserv`.`PLAGA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`TIPO_SIEMBRA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`TIPO_SIEMBRA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`TIPO_SIEMBRA` (
  `ID` INT NOT NULL,
  `TITULO` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`SIEMBRA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`SIEMBRA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`SIEMBRA` (
  `ID` INT NOT NULL,
  `TITULO` VARCHAR(45) NULL,
  `DESCRIPCION` VARCHAR(45) NULL,
  `MESES_COSECHA` VARCHAR(45) NULL,
  `TIPO_SIEMBRA_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `TIPO_SIEMBRA_ID`),
  INDEX `fk_SIEMBRA_TIPO_SIEMBRA1_idx` (`TIPO_SIEMBRA_ID` ASC),
  CONSTRAINT `fk_SIEMBRA_TIPO_SIEMBRA1`
    FOREIGN KEY (`TIPO_SIEMBRA_ID`)
    REFERENCES `agrappserv`.`TIPO_SIEMBRA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`COSECHA_USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`COSECHA_USUARIO` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`COSECHA_USUARIO` (
  `ID` INT NOT NULL,
  `TITULO` VARCHAR(45) NULL,
  `DESCRIPCION` VARCHAR(45) NULL,
  `FECHA_SIEMBRA` VARCHAR(45) NULL,
  `USUARIO_ID` INT NOT NULL,
  `SIEMBRA_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `USUARIO_ID`, `SIEMBRA_ID`),
  INDEX `fk_COSECHA_USUARIO_USUARIO1_idx` (`USUARIO_ID` ASC),
  INDEX `fk_COSECHA_USUARIO_SIEMBRA1_idx` (`SIEMBRA_ID` ASC),
  CONSTRAINT `fk_COSECHA_USUARIO_USUARIO1`
    FOREIGN KEY (`USUARIO_ID`)
    REFERENCES `agrappserv`.`USUARIO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COSECHA_USUARIO_SIEMBRA1`
    FOREIGN KEY (`SIEMBRA_ID`)
    REFERENCES `agrappserv`.`SIEMBRA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`REPORTE_PLAGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`REPORTE_PLAGA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`REPORTE_PLAGA` (
  `ID` INT NOT NULL,
  `FECHA` VARCHAR(45) NULL,
  `PLAGA_ID` INT NOT NULL,
  `USUARIO_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `PLAGA_ID`, `USUARIO_ID`),
  INDEX `fk_REPORTE_PLAGA_PLAGA1_idx` (`PLAGA_ID` ASC),
  INDEX `fk_REPORTE_PLAGA_USUARIO1_idx` (`USUARIO_ID` ASC),
  CONSTRAINT `fk_REPORTE_PLAGA_PLAGA1`
    FOREIGN KEY (`PLAGA_ID`)
    REFERENCES `agrappserv`.`PLAGA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_REPORTE_PLAGA_USUARIO1`
    FOREIGN KEY (`USUARIO_ID`)
    REFERENCES `agrappserv`.`USUARIO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`POSICION_COSECHA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`POSICION_COSECHA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`POSICION_COSECHA` (
  `ID` INT NOT NULL,
  `LONGITUD` VARCHAR(45) NULL,
  `LATITUD` VARCHAR(45) NULL,
  `COSECHA_USUARIO_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `COSECHA_USUARIO_ID`),
  INDEX `fk_POSICION_COSECHA_COSECHA_USUARIO1_idx` (`COSECHA_USUARIO_ID` ASC),
  CONSTRAINT `fk_POSICION_COSECHA_COSECHA_USUARIO1`
    FOREIGN KEY (`COSECHA_USUARIO_ID`)
    REFERENCES `agrappserv`.`COSECHA_USUARIO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`POSICION_REPORTE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`POSICION_REPORTE` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`POSICION_REPORTE` (
  `ID` INT NOT NULL,
  `REPORTE` VARCHAR(45) NULL,
  `LONGITUD` VARCHAR(45) NULL,
  `LATITUD` VARCHAR(45) NULL,
  `REPORTE_PLAGA_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `REPORTE_PLAGA_ID`),
  INDEX `fk_POSICION_REPORTE_REPORTE_PLAGA1_idx` (`REPORTE_PLAGA_ID` ASC),
  CONSTRAINT `fk_POSICION_REPORTE_REPORTE_PLAGA1`
    FOREIGN KEY (`REPORTE_PLAGA_ID`)
    REFERENCES `agrappserv`.`REPORTE_PLAGA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`TRATAMIENTO_PLAGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`TRATAMIENTO_PLAGA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`TRATAMIENTO_PLAGA` (
  `ID` VARCHAR(45) NOT NULL,
  `DESCRIPCION` VARCHAR(45) NULL,
  `DURACION` VARCHAR(45) NULL,
  `PRIORIDAD` VARCHAR(45) NULL,
  `PREVENTIVA` VARCHAR(45) NULL,
  `PLAGA_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `PLAGA_ID`),
  INDEX `fk_TRATAMIENTO_PLAGA_PLAGA1_idx` (`PLAGA_ID` ASC),
  CONSTRAINT `fk_TRATAMIENTO_PLAGA_PLAGA1`
    FOREIGN KEY (`PLAGA_ID`)
    REFERENCES `agrappserv`.`PLAGA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`PROVEEDOR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`PROVEEDOR` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`PROVEEDOR` (
  `ID` INT NOT NULL,
  `NOMBRE` VARCHAR(45) NULL,
  `DIRECCION` VARCHAR(45) NULL,
  `TELEFONO` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`PRODUCTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`PRODUCTO` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`PRODUCTO` (
  `ID` INT NOT NULL,
  `TITULO` VARCHAR(45) NULL,
  `DESCRIPCION` VARCHAR(45) NULL,
  `RECOMENDACION` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`PLAGA_PRODUCTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`PLAGA_PRODUCTO` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`PLAGA_PRODUCTO` (
  `PLAGA_ID` INT NOT NULL,
  `PRODUCTO_ID` INT NOT NULL,
  PRIMARY KEY (`PLAGA_ID`, `PRODUCTO_ID`),
  INDEX `fk_PLAGA_PRODUCTO_PLAGA1_idx` (`PLAGA_ID` ASC),
  INDEX `fk_PLAGA_PRODUCTO_PRODUCTO1_idx` (`PRODUCTO_ID` ASC),
  CONSTRAINT `fk_PLAGA_PRODUCTO_PLAGA1`
    FOREIGN KEY (`PLAGA_ID`)
    REFERENCES `agrappserv`.`PLAGA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PLAGA_PRODUCTO_PRODUCTO1`
    FOREIGN KEY (`PRODUCTO_ID`)
    REFERENCES `agrappserv`.`PRODUCTO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`PROVEEDOR_PRODUCTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`PROVEEDOR_PRODUCTO` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`PROVEEDOR_PRODUCTO` (
  `CANTIDAD` VARCHAR(45) NULL,
  `PRECIO` VARCHAR(45) NULL,
  `PROVEEDOR_ID` INT NOT NULL,
  `PRODUCTO_ID` INT NOT NULL,
  PRIMARY KEY (`PROVEEDOR_ID`, `PRODUCTO_ID`),
  INDEX `fk_PROVEEDOR_PRODUCTO_PROVEEDOR1_idx` (`PROVEEDOR_ID` ASC),
  INDEX `fk_PROVEEDOR_PRODUCTO_PRODUCTO1_idx` (`PRODUCTO_ID` ASC),
  CONSTRAINT `fk_PROVEEDOR_PRODUCTO_PROVEEDOR1`
    FOREIGN KEY (`PROVEEDOR_ID`)
    REFERENCES `agrappserv`.`PROVEEDOR` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROVEEDOR_PRODUCTO_PRODUCTO1`
    FOREIGN KEY (`PRODUCTO_ID`)
    REFERENCES `agrappserv`.`PRODUCTO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`COMENTARIO_PRODUCTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`COMENTARIO_PRODUCTO` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`COMENTARIO_PRODUCTO` (
  `ID` INT NOT NULL,
  `COMENTARIO` VARCHAR(45) NULL,
  `USUARIO` VARCHAR(45) NULL,
  `FECHA_INGRESO` DATE NULL,
  `CALIFICACION` VARCHAR(45) NULL,
  `PRODUCTO_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `PRODUCTO_ID`),
  INDEX `fk_COMENTARIO_PRODUCTO_PRODUCTO1_idx` (`PRODUCTO_ID` ASC),
  CONSTRAINT `fk_COMENTARIO_PRODUCTO_PRODUCTO1`
    FOREIGN KEY (`PRODUCTO_ID`)
    REFERENCES `agrappserv`.`PRODUCTO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`PRODUCTO_has_TRATAMIENTO_PLAGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`PRODUCTO_has_TRATAMIENTO_PLAGA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`PRODUCTO_has_TRATAMIENTO_PLAGA` (
  `PRODUCTO_ID` INT NOT NULL,
  `TRATAMIENTO_PLAGA_ID` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`PRODUCTO_ID`, `TRATAMIENTO_PLAGA_ID`),
  INDEX `fk_PRODUCTO_has_TRATAMIENTO_PLAGA_TRATAMIENTO_PLAGA1_idx` (`TRATAMIENTO_PLAGA_ID` ASC),
  INDEX `fk_PRODUCTO_has_TRATAMIENTO_PLAGA_PRODUCTO1_idx` (`PRODUCTO_ID` ASC),
  CONSTRAINT `fk_PRODUCTO_has_TRATAMIENTO_PLAGA_PRODUCTO1`
    FOREIGN KEY (`PRODUCTO_ID`)
    REFERENCES `agrappserv`.`PRODUCTO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRODUCTO_has_TRATAMIENTO_PLAGA_TRATAMIENTO_PLAGA1`
    FOREIGN KEY (`TRATAMIENTO_PLAGA_ID`)
    REFERENCES `agrappserv`.`TRATAMIENTO_PLAGA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrappserv`.`COMENTARIO_TRATAMIENTO_PLAGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrappserv`.`COMENTARIO_TRATAMIENTO_PLAGA` ;

CREATE TABLE IF NOT EXISTS `agrappserv`.`COMENTARIO_TRATAMIENTO_PLAGA` (
  `ID` INT NOT NULL,
  `COMENTARIO` VARCHAR(45) NULL,
  `USUARIO` VARCHAR(45) NULL,
  `FECHA_INGRESO` DATE NULL,
  `CALIFICACION` VARCHAR(45) NULL,
  `TRATAMIENTO_PLAGA_ID` VARCHAR(45) NOT NULL,
  `TRATAMIENTO_PLAGA_PLAGA_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_COMENTARIO_TRATAMIENTO_PLAGA_TRATAMIENTO_PLAGA1_idx` (`TRATAMIENTO_PLAGA_ID` ASC, `TRATAMIENTO_PLAGA_PLAGA_ID` ASC),
  CONSTRAINT `fk_COMENTARIO_TRATAMIENTO_PLAGA_TRATAMIENTO_PLAGA1`
    FOREIGN KEY (`TRATAMIENTO_PLAGA_ID` , `TRATAMIENTO_PLAGA_PLAGA_ID`)
    REFERENCES `agrappserv`.`TRATAMIENTO_PLAGA` (`ID` , `PLAGA_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
