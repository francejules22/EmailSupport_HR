

CREATE TABLE IF NOT EXISTS `email_track`(
    `email_id` int(11) NOT NULL AUTO_INCREMENT,
    `sender_name` varchar(250) NOT NULL,
    `sender_email` varchar (250) NOT NULL,
    `subject` text NOT NULL,
    `emails` varchar(250) NOT NULL,
    `message` text NOT NULL,
    `status` enum('send','fail','open'),
    `unique_id` varchar(50) NOT NULL,
    PRIMARY KEY (`email_id`)
);


--INSERT INTO
