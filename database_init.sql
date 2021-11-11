CREATE DATABASE IF NOT EXISTS `DemoRegistration` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `DemoRegistration` ;

-- Privileges
-- (activate this statement if necessary)
-- GRANT SELECT, INSERT, DELETE, UPDATE, ALTER ON `DemoRegistration`.* TO
--  'pma'@localhost;

CREATE TABLE IF NOT EXISTS `DemoRegistration`.`STUDENTS` (
  `UMID` INT(8) UNSIGNED NOT NULL,
  `FName` VARCHAR(15) NOT NULL,
  `LName` VARCHAR(15) NOT NULL,
  `Project_Title` VARCHAR(45) NOT NULL,
  `Email_Address` VARCHAR(45) NOT NULL,
  `Phone_Number` INT NOT NULL,
  `Time_Slot` INT NULL,
  PRIMARY KEY (`UMID`)
)
  COMMENT='LIST OF REGISTERED STUDENTS'
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;