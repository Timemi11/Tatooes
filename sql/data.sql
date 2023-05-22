use tatooes
CREATE TABLE `tatooes`.`datatatooes` 
(`list` INT NOT NULL AUTO_INCREMENT , 
`email` VARCHAR(255) NOT NULL ,
`username` VARCHAR(255) NOT NULL ,
`password` VARCHAR(255) NOT NULL ,
`date` DATE NOT NULL , 
`time` TIME NOT NULL , 
PRIMARY KEY (`list`)) 
ENGINE = InnoDB;