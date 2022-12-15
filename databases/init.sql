CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;
set names 'utf8';

USE appDB;

CREATE TABLE `orders` (
	`orderID` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(200),
	`order` VARCHAR(200),
	PRIMARY KEY (`orderID`)
);
INSERT INTO orders VALUE (NULL, 'Алиса', 'Мэдведь'); 
INSERT INTO orders VALUE (NULL, 'Ваня', 'Паравозик'); 
INSERT INTO orders VALUE (NULL, 'Николай', 'Набор Лего'); 

CREATE TABLE IF NOT EXISTS users (user varchar(191) not null, passwd char(191), primary key (user));
INSERT INTO users VALUE ('admin', '$apr1$g/9PpRf1$Tl9zPvUnToKdiGt8hRap//');

CREATE TABLE IF NOT EXISTS uploaded_files (
    id bigint PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(64) NOT NULL,
    type varchar(64) NOT NULL,
    size int NOT NULL,
    upload_date datetime NOT NULL
);