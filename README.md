Rest - Mvc - PHP
=====================

Author
---------------------
Francisco Carlos Moraes Junior


Front-End AngularJs
---------------------
web
	->index.phtml#/home


Back-End Rest Json
---------------------
	/user/all
	/user/get/{id}
	/user/delete/{id}
	/user/update/{id}

DataBase MySql
---------------------
CREATE SCHEMA `usuarios` ;


CREATE TABLE `usuarios`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `date` VARCHAR(45) NULL,
  `andress` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

