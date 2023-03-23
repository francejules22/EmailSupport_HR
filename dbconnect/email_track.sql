

CREATE TABLE IF NOT EXISTS `email_track`(
    `email_id` int(11) NOT NULL AUTO_INCREMENT,
    `email_subject` text NOT NULL,
    `email_body` text NOT NULL,
    `email_address` varchar(250) NOT NULL,
    `email_status` enum('send','open'),
    `unique_id` varchar(50) NOT NULL,
    PRIMARY KEY (`email_id`)
);


--INSERT INTO
