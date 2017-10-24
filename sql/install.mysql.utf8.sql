CREATE TABLE IF NOT EXISTS `#__notificationary_rule` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`modified_by` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`notifyon` VARCHAR(255)  NOT NULL ,
`test` VARCHAR(255)  NOT NULL ,
`subform` TEXT NOT NULL ,
`toggle` TINYINT(1)  NOT NULL ,
`test2` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

