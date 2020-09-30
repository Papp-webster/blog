-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(50) NOT NULL,
  `cat_author` varchar(255) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_author`, `datetime`) VALUES
(1,	'Netsemlegesseg',	'valuk',	'2020.09.11 20:18:13'),
(2,	'hello post!',	'valuk',	'2020.09.11 20:18:46'),
(3,	'yoo mtv',	'valuk',	'2020.09.11 20:19');

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(50) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_cat` varchar(50) NOT NULL,
  `post_author` varchar(50) NOT NULL,
  `post_img` varchar(50) NOT NULL,
  `post_content` varchar(1000) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `post` (`post_id`, `datetime`, `post_title`, `post_cat`, `post_author`, `post_img`, `post_content`) VALUES
(5,	'2020.09.16 10:55',	'workout',	'yoo mtv',	'Zoe',	'img016.jpg',	'Ãºj album brokertÅ‘l!');

-- 2020-09-19 15:28:47
