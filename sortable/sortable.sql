CREATE DATABASE  `sortable_tutorial`;

USE `sortable_tutorial`;

CREATE TABLE IF NOT EXISTS `menu` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `order` mediumint(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `menu` (`id`, `order`, `name`) VALUES
(1, 0, 'Home'),
(2, 0, 'About'),
(3, 0, 'Blog'),
(4, 0, 'Contact');