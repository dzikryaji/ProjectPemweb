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
    `category` VARCHAR(15) NOT NULL , 
    `price` INT NOT NULL , 
    `stock` INT NOT NULL , 
    `description` TEXT NOT NULL , 
    `product_image_name` VARCHAR(255) NOT NULL , 
    PRIMARY KEY (`id_product`)
) ENGINE = InnoDB;

CREATE TABLE `project_pemweb`.`cart`( 
    `id_user` INT NOT NULL , 
    `id_product` INT NOT NULL , 
    `quantity` INT NOT NULL , 
    FOREIGN KEY (`id_user`) REFERENCES user(`id`), 
    FOREIGN KEY (`id_product`) REFERENCES product(`id_product`) 
) ENGINE = InnoDB;