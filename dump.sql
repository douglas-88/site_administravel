-- -----------------------------------------------------
-- Schema site_admin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `site_admin` DEFAULT CHARACTER SET utf8 ;
USE `site_admin` ;

-- -----------------------------------------------------
-- Table `site_admin`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_admin`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `avatar` VARCHAR(255) NOT NULL,
  `created` DATETIME NOT NULL,
  `updated` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `site_admin`.`pages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_admin`.`pages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `user_id` INT NOT NULL,
  `created` DATETIME NOT NULL,
  `updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `site_admin`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `site_admin`.`password_recovery`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_admin`.`password_recovery` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `hash` VARCHAR(255) NOT NULL,
  `user_id` INT NOT NULL,
  `status` INT NOT NULL DEFAULT 0,
  `created` DATETIME NOT NULL,
  `updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `site_admin`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;