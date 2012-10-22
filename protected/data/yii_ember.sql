-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 21 Οκτ 2012 στις 21:05:48
-- Έκδοση Διακομιστή: 5.5.16
-- Έκδοση PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `yii_ember`
--

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `notes` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Contact Information.Demo for Yii-Ember App.' AUTO_INCREMENT=36 ;

--
-- Άδειασμα δεδομένων του πίνακα `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `notes`) VALUES
(31, 'John', 'Doe', 'doe@doe.com', 'Famous Demo Guy.Nough said'),
(32, 'King', 'Diamond', 'diamond@diamond.com', 'Metal Icon figure.'),
(33, 'Virgil', 'Donati', 'donati@don.com', 'World class drummer,famous for his polyrhythmic patterns'),
(34, 'George', 'Papandreou', 'traitor@ofgreece.com', 'Former Prime Minister Of Greece,he is the man that put Greece under IMF control.\n                                                                               He currently teaches in  Harvard courses like "Effective Nation Obliteration Techniques." Wanted.'),
(35, 'Jeb', 'Corliss', 'corliss@cor.com', 'Wingsuit Promixity Professional.Look him up in youtube,will blow your mind.');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1350846307),
('m121020_230247_create_user_contacts_tables', 1350846309);

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password_strategy` varchar(50) DEFAULT NULL,
  `requires_new_password` tinyint(1) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login_attempts` int(11) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `login_ip` varchar(32) DEFAULT NULL,
  `validation_key` varchar(255) DEFAULT NULL,
  `create_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_id` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `password_strategy`, `requires_new_password`, `reset_token`, `email`, `login_attempts`, `login_time`, `login_ip`, `validation_key`, `create_id`, `create_time`, `update_id`, `update_time`) VALUES
(1, 'demo', '6ea8f70c416c8b9deab53871ddf7b691cd982036', 'a0877dfb26008ee61cb402b15f91e6b8ed963e78', 'bcrypt', NULL, NULL, 'demo@demo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'admin', 'c2c5aae5d3888625ace7d19437b77429499e7ba4', 'a4ea20a7cc4dea851d1667d332830b678a27a98f', 'bcrypt', NULL, NULL, 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
