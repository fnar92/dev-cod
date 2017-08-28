-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema codiga
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema codiga
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `codiga` DEFAULT CHARACTER SET utf8 ;
USE `codiga` ;

-- -----------------------------------------------------
-- Table `codiga`.`tipo_de_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`tipo_de_usuario` (
  `id_tipo_de_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id_tipo_de_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido_paterno` VARCHAR(45) NOT NULL,
  `apellido_materno` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `telefono` INT(10) UNSIGNED NULL,
  `celular` INT(10) UNSIGNED NULL,
  `callenumero` VARCHAR(45) NOT NULL,
  `colonia` VARCHAR(45) NOT NULL,
  `municipio` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `tipo_de_usuario_id_tipo_de_usuario` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_usuario_tipo_de_usuario1_idx` (`tipo_de_usuario_id_tipo_de_usuario` ASC),
  CONSTRAINT `fk_usuario_tipo_de_usuario1`
    FOREIGN KEY (`tipo_de_usuario_id_tipo_de_usuario`)
    REFERENCES `codiga`.`tipo_de_usuario` (`id_tipo_de_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`cabeza_ganado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`cabeza_ganado` (
  `id_cabeza` INT NOT NULL AUTO_INCREMENT,
  `procedencia` TINYINT(1) NOT NULL COMMENT 'verdad, si es comprado\nfalso, si es nacido',
  `nombre` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` DATE NULL,
  `sexo` VARCHAR(10) NULL,
  `raza` VARCHAR(45) NOT NULL,
  `color` VARCHAR(45) NULL,
  `des_procedencia` VARCHAR(45) NULL,
  `madre` VARCHAR(45) NULL,
  `padre` VARCHAR(45) NULL,
  `fecha_destino` DATE NULL,
  `observaciones` VARCHAR(45) NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_cabeza`, `usuario_id_usuario`),
  INDEX `fk_cabeza_ganado_usuario_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_cabeza_ganado_usuario`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `codiga`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`geo_limite`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`geo_limite` (
  `id_limite` INT NOT NULL AUTO_INCREMENT,
  `usuario_id_usuario` INT NOT NULL,
  `latitud` DECIMAL(18,15) NOT NULL,
  `longitud` DECIMAL(18,15) NOT NULL,
  PRIMARY KEY (`id_limite`, `usuario_id_usuario`),
  INDEX `fk_geo_limite_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_geo_limite_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `codiga`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`geo_posicion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`geo_posicion` (
  `id_geo_posicion` INT NOT NULL,
  `longitud` DECIMAL(18,15) NOT NULL,
  `latitud` DECIMAL(18,15) NOT NULL,
  `temperatura` FLOAT NULL,
  `celo` VARCHAR(45) NULL,
  `cabeza_ganado_id_cabeza` INT NOT NULL,
  PRIMARY KEY (`id_geo_posicion`, `cabeza_ganado_id_cabeza`),
  INDEX `fk_geo_posicion_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza` ASC),
  CONSTRAINT `fk_geo_posicion_cabeza_ganado1`
    FOREIGN KEY (`cabeza_ganado_id_cabeza`)
    REFERENCES `codiga`.`cabeza_ganado` (`id_cabeza`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`vacunas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`vacunas` (
  `id_vacunas` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_vacunas`, `usuario_id_usuario`),
  INDEX `fk_vacunas_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_vacunas_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `codiga`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`ctrl_vacunas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`ctrl_vacunas` (
  `id_ctrl_vacunas` INT NOT NULL AUTO_INCREMENT,
  `vacunas_id_vacunas` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `observaciones` VARCHAR(45) NOT NULL,
  `cabeza_ganado_id_cabeza` INT NOT NULL,
  PRIMARY KEY (`id_ctrl_vacunas`, `vacunas_id_vacunas`, `cabeza_ganado_id_cabeza`),
  INDEX `fk_ctrl_vacunas_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza` ASC),
  INDEX `fk_ctrl_vacunas_vacunas1_idx` (`vacunas_id_vacunas` ASC),
  CONSTRAINT `fk_ctrl_vacunas_cabeza_ganado1`
    FOREIGN KEY (`cabeza_ganado_id_cabeza`)
    REFERENCES `codiga`.`cabeza_ganado` (`id_cabeza`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ctrl_vacunas_vacunas1`
    FOREIGN KEY (`vacunas_id_vacunas`)
    REFERENCES `codiga`.`vacunas` (`id_vacunas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`ctrl_reproductivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`ctrl_reproductivo` (
  `id_ctrl_reproductivo` INT NOT NULL AUTO_INCREMENT,
  `cabeza_ganado_id_cabeza` INT NOT NULL,
  `nombre_toro` VARCHAR(45) NULL,
  `fecha_secado` DATE NULL,
  `fecha_parto` DATE NULL,
  PRIMARY KEY (`id_ctrl_reproductivo`, `cabeza_ganado_id_cabeza`),
  INDEX `fk_ctrl_reproductivo_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza` ASC),
  CONSTRAINT `fk_ctrl_reproductivo_cabeza_ganado1`
    FOREIGN KEY (`cabeza_ganado_id_cabeza`)
    REFERENCES `codiga`.`cabeza_ganado` (`id_cabeza`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`ctrl_errores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`ctrl_errores` (
  `id_errores` INT NOT NULL AUTO_INCREMENT,
  `nombre_error` VARCHAR(45) NULL,
  PRIMARY KEY (`id_errores`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`ticket` (
  `id_ticket` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(90) NULL,
  `fecha_inicio` DATETIME NOT NULL,
  `fecha_fin` DATETIME NULL,
  `usuario_id_usuario` INT NOT NULL,
  `ctrl_errores_id_errores` INT NOT NULL,
  PRIMARY KEY (`id_ticket`, `usuario_id_usuario`, `ctrl_errores_id_errores`),
  INDEX `fk_ticket_usuario1_idx` (`usuario_id_usuario` ASC),
  INDEX `fk_ticket_ctrl_errores1_idx` (`ctrl_errores_id_errores` ASC),
  CONSTRAINT `fk_ticket_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `codiga`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_ctrl_errores1`
    FOREIGN KEY (`ctrl_errores_id_errores`)
    REFERENCES `codiga`.`ctrl_errores` (`id_errores`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`produccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`produccion` (
  `id_produccion` INT NOT NULL AUTO_INCREMENT,
  `litros` INT NOT NULL,
  `vendida` INT NOT NULL,
  `comprandor` VARCHAR(45) NULL,
  `cabeza_ganado_id_cabeza` INT NOT NULL,
  PRIMARY KEY (`id_produccion`, `cabeza_ganado_id_cabeza`),
  INDEX `fk_produccion_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza` ASC),
  CONSTRAINT `fk_produccion_cabeza_ganado1`
    FOREIGN KEY (`cabeza_ganado_id_cabeza`)
    REFERENCES `codiga`.`cabeza_ganado` (`id_cabeza`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`destino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`destino` (
  `id_destino` INT NOT NULL,
  `tipo_final` VARCHAR(45) NOT NULL,
  `costo` VARCHAR(45) NULL,
  `cabeza_ganado_id_cabeza` INT NOT NULL,
  PRIMARY KEY (`id_destino`, `cabeza_ganado_id_cabeza`),
  INDEX `fk_destino_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza` ASC),
  CONSTRAINT `fk_destino_cabeza_ganado1`
    FOREIGN KEY (`cabeza_ganado_id_cabeza`)
    REFERENCES `codiga`.`cabeza_ganado` (`id_cabeza`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`comprador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`comprador` (
  `id_comprador` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_comprador`, `usuario_id_usuario`),
  INDEX `fk_comprador_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_comprador_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `codiga`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `codiga`.`factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `codiga`.`factura` (
  `id_factura` INT NOT NULL AUTO_INCREMENT,
  `num_factura` VARCHAR(45) NOT NULL,
  `costo` INT NOT NULL,
  `comprador_id_comprador` INT NOT NULL,
  PRIMARY KEY (`id_factura`, `comprador_id_comprador`),
  INDEX `fk_factura_comprador1_idx` (`comprador_id_comprador` ASC),
  CONSTRAINT `fk_factura_comprador1`
    FOREIGN KEY (`comprador_id_comprador`)
    REFERENCES `codiga`.`comprador` (`id_comprador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
