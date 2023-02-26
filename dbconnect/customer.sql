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
INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`) VALUES 
(1,'Jay Em', 'jayem6738@gmail.com'),
(2,'Jose Mari Wong', 'josemari.wong@wvsu.edu.ph'),
(3,'Cris Bob', 'crisbobie@gmail.com'),
(4,'Francis Jules Espartero', 'francisjulescelesteespartero@gmail.com'),
(5,'Cris Marcelino', 'crisangelomarcelino06@gmail.com'),
(6,'Jules Celeste', 'francisjules.espartero@students.isatu.edu.ph'),
(7,'France Espartero', 'esparterofrancisjules@gmail.com');
