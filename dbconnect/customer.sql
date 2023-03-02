--CREATE DATABASE email_db
CREATE DATABASE  email_db;


--CREATE TABLE customer
CREATE TABLE IF NOT EXISTS `customer`(
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(300) NOT NULL,
  `customer_email` varchar(300) NOT NULL,
  PRIMARY KEY (`customer_id`)
);

--INSERT VALUES OF customer table
INSERT INTO `customer` (`customer_name`, `customer_email`) VALUES 
('Jay Em', 'jayem6738@gmail.com'),
('Jose Mari Wong', 'josemari.wong@wvsu.edu.ph'),
('Cris Bob', 'crisbobie@gmail.com'),
('Francis Jules Espartero', 'francisjulescelesteespartero@gmail.com'),
('Cris Marcelino', 'crisangelomarcelino06@gmail.com'),
('Jules Celeste', 'francisjules.espartero@students.isatu.edu.ph'),
('France Espartero', 'esparterofrancisjules@gmail.com'),
('Jay Em', 'jayem6738@gmail.com'),
('Jose Mari Wong', 'josemari.wong@wvsu.edu.ph'),
('Cris Bob', 'crisbobie@gmail.com'),
('Francis Jules Espartero', 'francisjulescelesteespartero@gmail.com'),
('Cris Marcelino', 'crisangelomarcelino06@gmail.com'),
('Jules Celeste', 'francisjules.espartero@students.isatu.edu.ph'),
('France Espartero', 'esparterofrancisjules@gmail.com'),
('Jay Em', 'jayem6738@gmail.com'),
('Jose Mari Wong', 'josemari.wong@wvsu.edu.ph'),
('Cris Bob', 'crisbobie@gmail.com'),
('Francis Jules Espartero', 'francisjulescelesteespartero@gmail.com'),
('Cris Marcelino', 'crisangelomarcelino06@gmail.com'),
('Jules Celeste', 'francisjules.espartero@students.isatu.edu.ph'),
('France Espartero', 'esparterofrancisjules@gmail.com');



--SET THE CUSTOMER_ID INTO 1-5..
SET @num := 0;
UPDATE customer SET customer_id = @num := (@num+1);
ALTER TABLE customer AUTO_INCREMENT = 1;
