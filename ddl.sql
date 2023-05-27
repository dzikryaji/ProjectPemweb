CREATE DATABASE `project_pemweb`;

CREATE TABLE `project_pemweb`.`user` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(128) NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `password_hash` VARCHAR(255) NOT NULL , 
        PRIMARY KEY (`id`), 
        UNIQUE (`email`)
) ENGINE = InnoDB;

CREATE TABLE `project_pemweb`.`product`(
    `id_product` INT NOT NULL AUTO_INCREMENT , 
    `product_name` VARCHAR(255) NOT NULL , 
    `price` INT NOT NULL , 
    `stock` INT NOT NULL , 
    `description` VARCHAR(255) NOT NULL , 
    `product_image_name` VARCHAR(255) NOT NULL , 
    PRIMARY KEY (`id_product`)
) ENGINE = InnoDB;