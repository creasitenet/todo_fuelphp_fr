-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 21 Août 2014 à 22:53
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `todolist_ajax_fuelphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `fini` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Contenu de la table `todos`
--

INSERT INTO `todos` (`id`, `user_id`, `texte`, `fini`, `created_at`, `updated_at`) VALUES
(90, 0, 'Ajouter un système de modification de l''email', 0, 1408115447, 1408115447),
(91, 0, 'Ajouter un système de modification du mot de passe', 0, 1408115459, 1408115459),
(94, 1, 'Test', 0, 1408121839, 1408121839),
(95, 0, 'Ajouter un système d''export de la liste de tâche', 0, 1408122000, 1408122000),
(96, 0, 'Réaliser un design pour les emails', 0, 1408122023, 1408122023),
(97, 0, 'test', 0, 1408450365, 1408450365),
(102, 2, 'test edouard', 0, 1408654410, 1408654410);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group`, `email`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`) VALUES
(1, 'creasitenet', 'ytNpidOnBDIpiqJlxhGGVzxPKRSy0uOv5Mm/fptjZc4=', 1, 'creasitenet.com@gmail.com', 1408653951, 'acb5521b273b2f85116a8fe7446f661a41c4b56f', 'a:0:{}', 1385996989, NULL),
(2, 'edouard', 'ytNpidOnBDIpiqJlxhGGVzxPKRSy0uOv5Mm/fptjZc4=', 1, 'edouardboissel@gmail.com', 1408654399, '6b049f8a37eef58af61864df58df7a6045976850', 'a:0:{}', 1408654388, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
