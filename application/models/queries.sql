CREATE DATABASE `manyminds`

CREATE TABLE `many_colaborador` (
	`id` INT NOT NULL,
	`nome` VARCHAR(150) NULL DEFAULT NULL,
	`CPF` VARCHAR(11) NULL DEFAULT NULL,
	`pass` VARCHAR(130) NULL DEFAULT NULL,
	`genero` INT NULL,
	`fornecedor` INT NULL,
	`status` INT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
;

ALTER TABLE `many_colaborador`
	CHANGE COLUMN `nome` `nome` VARCHAR(150) NOT NULL COLLATE 'latin1_swedish_ci' AFTER `id`,
	ADD COLUMN `login` VARCHAR(20) NOT NULL AFTER `nome`,
	CHANGE COLUMN `CPF` `CPF` VARCHAR(11) NOT NULL COLLATE 'latin1_swedish_ci' AFTER `login`,
	CHANGE COLUMN `pass` `pass` VARCHAR(130) NOT NULL COLLATE 'latin1_swedish_ci' AFTER `CPF`,
	CHANGE COLUMN `genero` `genero` INT(11) NOT NULL AFTER `pass`,
	CHANGE COLUMN `fornecedor` `fornecedor` INT(11) NOT NULL AFTER `genero`,
	CHANGE COLUMN `status` `status` INT(11) NOT NULL AFTER `fornecedor`;

ALTER TABLE `many_colaborador`
	CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT FIRST;

ALTER TABLE `many_colaborador`
	CHANGE COLUMN `fornecedor` `estado_civil` INT(11) NOT NULL AFTER `genero`;
