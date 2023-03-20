

-- CREATE TABLE OF EMAIL TRACK
CREATE TABLE IF NOT EXISTS `email_track`(
    `email_id` int(11) NOT NULL AUTO_INCREMENT,
    `email_subject` text NOT NULL,
    `email_body` text NOT NULL,
    `email_address` varchar(250) NOT NULL,
    `email_track_code` varchar(100) NOT NULL,
    `email_status` enum('no','yes'),
    `email_open_datetime` datetime,
    PRIMARY KEY (`email_id`)
);


--INSERT INTO
