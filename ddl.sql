CREATE DATABASE `project_pemweb`;

CREATE TABLE `project_pemweb`.`user` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(128) NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `password_hash` VARCHAR(255) NOT NULL , 
        PRIMARY KEY (`id`), 
        UNIQUE (`email`)
) ENGINE = InnoDB;