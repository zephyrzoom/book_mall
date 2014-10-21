SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `book_mall` ;
CREATE SCHEMA IF NOT EXISTS `book_mall` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `book_mall` ;

-- -----------------------------------------------------
-- Table `book_mall`.`book`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `book_mall`.`book` ;

CREATE TABLE IF NOT EXISTS `book_mall`.`book` (
  `name` VARCHAR(45) NOT NULL,
  `price` DECIMAL NOT NULL,
  `description` VARCHAR(400) NULL,
  `amount` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  `picture` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `book_mall`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `book_mall`.`user` ;

CREATE TABLE IF NOT EXISTS `book_mall`.`user` (
  `email` VARCHAR(45) NOT NULL,
  `pwd` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `book_mall`.`contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `book_mall`.`contact` ;

CREATE TABLE IF NOT EXISTS `book_mall`.`contact` (
  `theme` VARCHAR(50) NOT NULL,
  `content` VARCHAR(400) NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `user_email`),
  INDEX `fk_contact_user_idx` (`user_email` ASC),
  CONSTRAINT `fk_contact_user`
    FOREIGN KEY (`user_email`)
    REFERENCES `book_mall`.`user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `book_mall`.`book_has_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `book_mall`.`book_has_user` ;

CREATE TABLE IF NOT EXISTS `book_mall`.`book_has_user` (
  `book_id` INT NOT NULL,
  `user_email` VARCHAR(45) NOT NULL,
  `amount` INT NOT NULL,
  PRIMARY KEY (`book_id`, `user_email`),
  INDEX `fk_book_has_user_user1_idx` (`user_email` ASC),
  INDEX `fk_book_has_user_book1_idx` (`book_id` ASC),
  CONSTRAINT `fk_book_has_user_book1`
    FOREIGN KEY (`book_id`)
    REFERENCES `book_mall`.`book` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_book_has_user_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `book_mall`.`user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
