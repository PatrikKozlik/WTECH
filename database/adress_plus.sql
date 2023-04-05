DROP DATABASE IF EXISTS pet_shop;
CREATE DATABASE pet_shop;
USE pet_shop;

CREATE TABLE pet_shop.state(
    id INT NOT NULL AUTO_INCREMENT,
    value VARCHAR (25),
    PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.city(
    id INT NOT NULL AUTO_INCREMENT,
    value VARCHAR (25),
    PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.street_number(
    id INT NOT NULL AUTO_INCREMENT,
    city_id INT NOT NULL,
    value VARCHAR (10),
    PRIMARY KEY (id),
    CONSTRAINT `street_n_city` FOREIGN KEY (`city_id`) REFERENCES `city` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.street(
    id INT NOT NULL AUTO_INCREMENT,
    street_number_id INT NOT NULL,
    value VARCHAR (45),
    PRIMARY KEY (id),
    CONSTRAINT `street_street_n` FOREIGN KEY (`street_number_id`) REFERENCES `street_number` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.postal_code(
    id INT NOT NULL AUTO_INCREMENT,
    street_id INT NOT NULL,
    value VARCHAR (25),
    PRIMARY KEY (id),
    CONSTRAINT `postalcode_street` FOREIGN KEY (`street_id`) REFERENCES `street` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.role(
	id INT NOT NULL AUTO_INCREMENT,
	value VARCHAR (25),
	state_id INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `role_state` FOREIGN KEY (`state_id`) REFERENCES `state` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.users(
	id INT NOT NULL AUTO_INCREMENT,
	password VARCHAR (255) NOT NULL,
	first_name VARCHAR (25),
	middle_name VARCHAR (25),
	last_name VARCHAR (25),
	email VARCHAR (254) NOT NULL,
	phone VARCHAR (20),
	create_date DATETIME,
	state_id INT,
	role_id INT,
	PRIMARY KEY (id),
	CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (id),
    CONSTRAINT `user_state` FOREIGN KEY (`state_id`) REFERENCES `state` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.address(
	id INT NOT NULL AUTO_INCREMENT,
	postalcode_id INT NOT NULL,
	user_id INT NOT NULL,
	state_id INT NOT NULL,
	create_date datetime NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT `postalcode_address` FOREIGN KEY (`postalcode_id`) REFERENCES `postal_code` (id),
	CONSTRAINT `user_address` FOREIGN KEY (`user_id`) REFERENCES `users` (id),
    CONSTRAINT `adress_state` FOREIGN KEY (`state_id`) REFERENCES `state` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.category(
	id INT NOT NULL AUTO_INCREMENT,
	value VARCHAR (25),
	state_id INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `product_category_state` FOREIGN KEY (`state_id`) REFERENCES `state` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.supplier(
	id INT NOT NULL AUTO_INCREMENT,
	value VARCHAR (50),
	state_id INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `produc_supplier_state` FOREIGN KEY (`state_id`) REFERENCES `state` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE pet_shop.products(
	id INT NOT NULL AUTO_INCREMENT,
	product_name VARCHAR (40) NOT NULL,
	price FLOAT NOT NULL,
	number_of_products INT NOT NULL,
	category_id INT NOT NULL,
	supplier_id INT NOT NULL,
	available BOOLEAN NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT `product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (id),
    CONSTRAINT `product_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (id)
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
	CONSTRAINT `meal_food_part` FOREIGN KEY (`product_id`) REFERENCES `products` (id)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `pet_shop`.`state` (`value`) VALUES ('Aktívne');
INSERT INTO `pet_shop`.`state` (`value`) VALUES ('Neaktívne');

INSERT INTO `pet_shop`.`role` (`value`, `state_id`) VALUES ('User', '1');
INSERT INTO `pet_shop`.`role` (`value`, `state_id`) VALUES ('Tenant', '1');
INSERT INTO `pet_shop`.`role` (`value`, `state_id`) VALUES ('Payer', '1');
INSERT INTO `pet_shop`.`role` (`value`, `state_id`) VALUES ('Admin', '1');
INSERT INTO `pet_shop`.`role` (`value`, `state_id`) VALUES ('Superadmin', '1');