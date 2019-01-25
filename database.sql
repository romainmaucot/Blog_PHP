-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1,	'a',	'$2y$10$t/NYd421Mn6bH65Xk34Jye95TJ.Gw.mjVWVR1Nl9sOCmdXsn8s5Du'),
(2,	'root',	'$2y$10$UTuTxMD0ntpGedatZQcZvu2buB/DPGmYvthcBagNFT0wPK1cD9JVi'),
(3,	'roro',	'$2y$10$St5amdIF4EVCdxMqNubkF.wg4tY38BCGfzNpd6UGqhHYt7/PvK1iu');

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(2555) NOT NULL,
  `img` varchar(255) NOT NULL,
  `dat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `articles` (`id`, `user_id`, `title`, `content`, `img`, `dat`) VALUES
(2,	1,	'1',	'1',	'07:40:22AAAAA.jpg',	'Thursday 24 of January 2019'),
(3,	1,	'2',	'2',	'07:40:35baggeA2.jpg',	'Thursday 24 of January 2019'),
(4,	1,	'3',	'3',	'07:40:51logo_mockette.jpg',	'Thursday 24 of January 2019'),
(5,	1,	'4',	'4',	'07:41:32fem.jpg',	'Thursday 24 of January 2019'),
(6,	1,	'5',	'5',	'07:41:423b97f459881751.5a33935595ddf.jpg',	'Thursday 24 of January 2019'),
(7,	1,	'6',	'6',	'07:42:31AAAAA.jpg',	'Thursday 24 of January 2019'),
(8,	2,	'toton',	'pmlmÃ¹l',	'07:44:23baggeA2.jpg',	'Thursday 24 of January 2019'),
(10,	3,	'NANA',	'nnnaaa',	'11:57:453b97f459881751.5a33935595ddf.jpg',	'Thursday 24 of January 2019');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `dat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `comments` (`id`, `article_id`, `username`, `content`, `dat`) VALUES
(1,	7,	'roro',	'Salut',	'Thursday 24 of January 2019 11:55:47'),
(2,	7,	'oiepo',	'oie',	'Thursday 24 of January 2019 11:55:52'),
(3,	10,	'Laurent',	'Trop bien',	'Thursday 24 of January 2019 11:58:09');



-- 2019-01-25 00:01:09
