/* User table */
CREATE TABLE `register`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(25) NOT NULL , `firstname` VARCHAR(50) NOT NULL , `lastname` VARCHAR(50) NOT NULL , `gender` VARCHAR(6) NOT NULL , `age` VARCHAR(8) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(60) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
