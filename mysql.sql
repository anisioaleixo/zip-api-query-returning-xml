CREATE DATABASE db_ceps;

USE db_ceps;

CREATE TABLE IF NOT EXISTS `cep` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`cep` VARCHAR(9) NOT NULL,
	`logradouro` VARCHAR(40),
	`complemento` VARCHAR(60),
	`bairro` VARCHAR(40),
	`localidade` VARCHAR(40),
	`uf` VARCHAR(2),
	`ibge` VARCHAR(20),
	`gia` VARCHAR(40),
	`ddd` VARCHAR(2),
	`siafi` VARCHAR(40),      
	PRIMARY KEY (`id`)
);
