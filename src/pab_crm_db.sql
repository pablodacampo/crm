-- -----------------------------------------------------
-- Database `usn_crm`
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `pab_crm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `pab_crm`;

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `U_ID` INT NOT NULL AUTO_INCREMENT,
  `U_USERNAME` VARCHAR(45) NOT NULL,
  `U_EMAIL` VARCHAR(75) NOT NULL,
  `U_PASSWORD` VARCHAR(45) NOT NULL,
  `U_TEL` VARCHAR(20) NULL,
  `U_ROLE` VARCHAR(10) NOT NULL,
  `U_SALARY` FLOAT NULL,
  `U_LOGIN` DATE NOT NULL,
  PRIMARY KEY (`U_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- -----------------------------------------------------
-- Table `companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `companies` (
  `C_ID` INT NOT NULL AUTO_INCREMENT,
  `C_REF_NUMBER` VARCHAR(45) NOT NULL,
  `C_NAME` VARCHAR(75) NOT NULL,
  `C_BILLING_ADDRESS` VARCHAR(999) NOT NULL,
  `C_CITY` VARCHAR(45) NOT NULL,
  `C_OWNER` VARCHAR(45) NULL,
  `C_TEL` VARCHAR(20) NULL,
  `C_WEBSITE` VARCHAR(75) NULL,
  `C_EMAIL` VARCHAR(75) NULL,
  `C_CONTACT_NAME` VARCHAR(45) NOT NULL,
  `C_CONTACT_TEL` VARCHAR(20) NOT NULL,
  `C_CONTACT_EMAIL` VARCHAR(75) NOT NULL,
  `F_TOTAL_SALES` FLOAT NULL,
  `F_DISC_TERMS` VARCHAR(45) NULL,
  `F_PAYMENT_LAST` DATE NULL,
  `F_PAYMENT_NEXT` DATE NULL,
  `F_INVOICES` VARCHAR(999) NULL,
  `S_SALES_EXP` FLOAT NULL,
  `S_CALL_LAST` DATE NULL,
  `S_VISIT_LAST` DATE NULL,
  `S_NOTES` VARCHAR(999) NULL,
  `S_REP_ID` INT(5) NULL,
  `M_DATE_MOD` DATE NOT NULL,
  PRIMARY KEY (`C_ID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- -----------------------------------------------------
-- Table `finances`
-- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `finances` (
--   `F_ID` INT NOT NULL AUTO_INCREMENT,
--   `C_REF_NUMBER` VARCHAR(45) NULL,
--   `C_NAME` VARCHAR(75) NULL,
--   `C_BILLING_ADDRESS` VARCHAR(999) NULL,
--   `F_TOTAL_SALES` FLOAT NULL,
--   `F_DISC_TERMS` VARCHAR(45) NULL,
--   `F_PAYMENT_LAST` DATE NULL,
--   `F_PAYMENT_NEXT` DATE NULL,
--   `F_INVOICES` VARCHAR(999) NULL,
--   `U_USERNAME` VARCHAR(45) NULL,
--   PRIMARY KEY (`F_ID`)
--   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- -- -----------------------------------------------------
-- -- Table `sales`
-- -- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `sales` (
--   `S_ID` INT NOT NULL AUTO_INCREMENT,
--   `C_REF_NUMBER` VARCHAR(45) NULL,
--   `C_NAME` VARCHAR(75) NULL,
--   `C_BILLING_ADDRESS` VARCHAR(999) NULL,
--   `C_CITY` VARCHAR(45) NULL,
--   `F_TOTAL_SALES` FLOAT NULL,
--   `S_SALES_EXP` FLOAT NULL,
--   `S_CALL_LAST` DATE NULL,
--   `S_NOTES` VARCHAR(999) NULL,
--   `S_VISIT_LAST` DATE NULL,
--   PRIMARY KEY (`S_ID`)
--   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- -----------------------------------------------------
