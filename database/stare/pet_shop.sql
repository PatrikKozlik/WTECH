DROP DATABASE IF EXISTS pet_shop;
CREATE DATABASE pet_shop;
USE pet_shop;

CREATE TABLE pet_shop.active(
    id INT NOT NULL AUTO_INCREMENT,
    value VARCHAR (25),
    PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.role_type(
	id INT NOT NULL AUTO_INCREMENT,
	value VARCHAR (25),
	active_id INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `role_state` FOREIGN KEY (`active_id`) REFERENCES `active` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.users(
	id INT NOT NULL AUTO_INCREMENT,
	password VARCHAR (255) NOT NULL,
	first_name VARCHAR (25) NOT NULL,
	middle_name VARCHAR (25),
	last_name VARCHAR (25) NOT NULL,
	email VARCHAR (254) NOT NULL,
	phone VARCHAR (20) NOT NULL,
	create_date DATETIME NOT NULL,
	active_id INT NOT NULL,
	role_id INT NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `role_type` (id),
    CONSTRAINT `user_state` FOREIGN KEY (`active_id`) REFERENCES `active` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.address(
	id INT NOT NULL AUTO_INCREMENT,
	city VARCHAR (25) NOT NULL,
	streetname VARCHAR (40) NOT NULL,
	streetnumber VARCHAR (10) NOT NULL,
	postalcode VARCHAR (10) NOT NULL,
	user_id INT NOT NULL,
	active_id INT NOT NULL,
	create_date datetime NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT `user_address` FOREIGN KEY (`user_id`) REFERENCES `users` (id),
    CONSTRAINT `adress_state` FOREIGN KEY (`active_id`) REFERENCES `active` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.product_category(
	id INT NOT NULL AUTO_INCREMENT,
	value VARCHAR (25),
	active_id INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `product_category_state` FOREIGN KEY (`active_id`) REFERENCES `active` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.product_supplier(
	id INT NOT NULL AUTO_INCREMENT,
	value VARCHAR (50),
	active_id INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `produc_supplier_state` FOREIGN KEY (`active_id`) REFERENCES `active` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.product(
	id INT NOT NULL AUTO_INCREMENT,
	product_name VARCHAR (40) NOT NULL,
	price FLOAT NOT NULL,
	number_of_products INT NOT NULL,
	category_id INT NOT NULL,
	supplier_id INT NOT NULL,
	available BOOLEAN NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT `product_category` FOREIGN KEY (`category_id`) REFERENCES `product_category` (id),
    CONSTRAINT `product_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `product_supplier` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.product_user(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	product_id INT NOT NULL,
	number_of_products INT NOT NULL,
	create_date datetime NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT `meal_menu_part` FOREIGN KEY (`user_id`) REFERENCES `users` (id),
	CONSTRAINT `meal_food_part` FOREIGN KEY (`product_id`) REFERENCES `product` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `pet_shop`.`active` (`value`) VALUES ('Aktívne');
INSERT INTO `pet_shop`.`active` (`value`) VALUES ('Neaktívne');

INSERT INTO `pet_shop`.`role_type` (`value`, `active_id`) VALUES ('User', '1');
INSERT INTO `pet_shop`.`role_type` (`value`, `active_id`) VALUES ('Tenant', '1');
INSERT INTO `pet_shop`.`role_type` (`value`, `active_id`) VALUES ('Payer', '1');
INSERT INTO `pet_shop`.`role_type` (`value`, `active_id`) VALUES ('Admin', '1');
INSERT INTO `pet_shop`.`role_type` (`value`, `active_id`) VALUES ('Superadmin', '1');