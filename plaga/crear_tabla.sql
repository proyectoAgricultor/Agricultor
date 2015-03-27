/* Este escript debe de ser ejecutado en Mysql directamente y sobre una base de datos creada. */


/*creacion de la tabla para crear accesos  */
CREATE TABLE IF NOT EXISTS `mydb`.`PLAGA` (
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
    REFERENCES `mydb`.`TIPO_PLAGA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

/*finaliza script si hay modulo de seguridad de solucionclic*/

/* ---------------------------------------------------------------------
-----------------------------------------*/

