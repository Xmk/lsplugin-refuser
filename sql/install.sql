CREATE TABLE IF NOT EXISTS `prefix_ref` (
	`id` int(11) unsigned NOT NULL auto_increment,
	`user_id` int(11) unsigned NOT NULL,
	`user_from_id` int(11) unsigned DEFAULT NULL,
	`date` datetime NOT NULL,
	PRIMARY KEY (`id`),
	KEY `user_id` (`user_id`),
	KEY `user_from_id` (`user_from_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
