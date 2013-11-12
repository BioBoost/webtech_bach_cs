delimiter $$
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username_key` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8$$




INSERT INTO `nico_webtech_pdo`.`users`
(`username`,`password`,`email`,`display_name`)
VALUES
('nicodw', 'rXlCjt5wXCuAqnYJ00s1', 'nico.dewitte@kuleuven.be', 'Nico De Witte');

INSERT INTO `nico_webtech_pdo`.`users`
(`username`,`password`,`email`,`display_name`)
VALUES
('mark', 'rXldfsCjt5wXCuAdsqnYsdfJ00dfs1', 'mark.devlu@kuleuven.be', 'Mark De Vlu');

INSERT INTO `nico_webtech_pdo`.`users`
(`username`,`password`,`email`,`display_name`)
VALUES
('sarahtb', 'rX1lsCwXCu12AdsqnY30df', 'sarah.tebo@kuleuven.be', 'Sarah Tebo');


