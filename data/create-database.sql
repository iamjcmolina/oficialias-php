-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema control_oficialias
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `control_oficialias` ;

-- -----------------------------------------------------
-- Schema control_oficialias
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `control_oficialias` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `control_oficialias` ;

-- -----------------------------------------------------
-- Table `control_oficialias`.`region`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `control_oficialias`.`region` ;

CREATE TABLE IF NOT EXISTS `control_oficialias`.`region` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `clave` TINYINT(1) UNSIGNED NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `clave_UNIQUE` (`clave` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_oficialias`.`municipio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `control_oficialias`.`municipio` ;

CREATE TABLE IF NOT EXISTS `control_oficialias`.`municipio` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `clave` TINYINT(2) ZEROFILL UNSIGNED NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `region_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_municipio_region1_idx` (`region_id` ASC),
  UNIQUE INDEX `clave_UNIQUE` (`clave` ASC, `region_id` ASC),
  CONSTRAINT `fk_municipio_region1`
    FOREIGN KEY (`region_id`)
    REFERENCES `control_oficialias`.`region` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_oficialias`.`oficialia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `control_oficialias`.`oficialia` ;

CREATE TABLE IF NOT EXISTS `control_oficialias`.`oficialia` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `clave` TINYINT(2) UNSIGNED ZEROFILL NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `municipio_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_oficialia_municipio_idx` (`municipio_id` ASC),
  UNIQUE INDEX `clave_UNIQUE` (`clave` ASC, `municipio_id` ASC),
  CONSTRAINT `fk_oficialia_municipio`
    FOREIGN KEY (`municipio_id`)
    REFERENCES `control_oficialias`.`municipio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_oficialias`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `control_oficialias`.`usuario` ;

CREATE TABLE IF NOT EXISTS `control_oficialias`.`usuario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `control_oficialias`.`region`
-- -----------------------------------------------------
START TRANSACTION;
USE `control_oficialias`;
INSERT INTO `control_oficialias`.`region` (`id`, `clave`, `nombre`) VALUES (1, 1, 'ACAPULCO');
INSERT INTO `control_oficialias`.`region` (`id`, `clave`, `nombre`) VALUES (2, 2, 'COSTA CHICA');
INSERT INTO `control_oficialias`.`region` (`id`, `clave`, `nombre`) VALUES (3, 3, 'COSTA GRANDE');
INSERT INTO `control_oficialias`.`region` (`id`, `clave`, `nombre`) VALUES (4, 4, 'TIERRA CALIENTE');

COMMIT;


-- -----------------------------------------------------
-- Data for table `control_oficialias`.`municipio`
-- -----------------------------------------------------
START TRANSACTION;
USE `control_oficialias`;
INSERT INTO `control_oficialias`.`municipio` (`id`, `clave`, `nombre`, `region_id`) VALUES (1, 1, 'ACAPULCO DE JUAREZ', 1);
INSERT INTO `control_oficialias`.`municipio` (`id`, `clave`, `nombre`, `region_id`) VALUES (2, 2, 'TEXCA', 1);
INSERT INTO `control_oficialias`.`municipio` (`id`, `clave`, `nombre`, `region_id`) VALUES (3, 3, 'AHUACUOTZINGO', 1);
INSERT INTO `control_oficialias`.`municipio` (`id`, `clave`, `nombre`, `region_id`) VALUES (4, 4, 'ARCELIA', 4);
INSERT INTO `control_oficialias`.`municipio` (`id`, `clave`, `nombre`, `region_id`) VALUES (5, 5, 'TELOLOAPAN', 4);
INSERT INTO `control_oficialias`.`municipio` (`id`, `clave`, `nombre`, `region_id`) VALUES (6, 6, 'AZOYU', 2);
INSERT INTO `control_oficialias`.`municipio` (`id`, `clave`, `nombre`, `region_id`) VALUES (7, 7, 'TECOANAPA', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `control_oficialias`.`oficialia`
-- -----------------------------------------------------
START TRANSACTION;
USE `control_oficialias`;
INSERT INTO `control_oficialias`.`oficialia` (`id`, `clave`, `nombre`, `municipio_id`) VALUES (1, 1, 'ACAPULCO', 1);
INSERT INTO `control_oficialias`.`oficialia` (`id`, `clave`, `nombre`, `municipio_id`) VALUES (2, 2, 'TEXCA', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `control_oficialias`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `control_oficialias`;
INSERT INTO `control_oficialias`.`usuario` (`id`, `nombre`, `email`, `password`) VALUES (1, 'Juan Carlos', 'charles1621@hotmail.com', 'a5410ee37744c574ba5790034ea08f79');
INSERT INTO `control_oficialias`.`usuario` (`id`, `nombre`, `email`, `password`) VALUES (2, 'Catalina', 'katycm@live.com.mx', '72653eebc70ae85b3d34c8e90f6b679b');

COMMIT;

