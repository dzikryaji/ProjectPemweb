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

CREATE TABLE `project_pemweb`.`address`( 
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_user` INT NOT NULL , 
    `name` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `province` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`id_user`) REFERENCES user(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `project_pemweb`.`card`( 
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_user` INT NOT NULL,
    `name` varchar(255) NOT NULL,
    `number` varchar(255) NOT NULL,
    `month` INT NOT NULL,
    `year` INT NOT NULL,
    `cvc` INT NOT NULL,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`id_user`) REFERENCES user(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;