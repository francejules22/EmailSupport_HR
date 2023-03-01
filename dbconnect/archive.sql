


--CREATE TABLE
CREATE TABLE IF NOT EXISTS`archive` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(250) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `date_archived` varchar(250) NOT NULL,
  PRIMARY KEY (`customer_id`)
);


-- INSERT INTO ARCHIVE
INSERT INTO `archive` (`customer_id`, `customer_name`, `customer_email`, `date_archived`) VALUES
(26, 'Marcelino', 'cris@yahoo.com', '2023-02-23');



