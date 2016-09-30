-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 29 Septembre 2016 à 20:54
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id_h` int(10) NOT NULL AUTO_INCREMENT,
  `date_debut` int(11) DEFAULT NULL,
  `date_fin` int(25) DEFAULT NULL,
  `id_u` int(10) NOT NULL,
  `id_p` int(10) NOT NULL,
  PRIMARY KEY (`id_h`),
  KEY `id_user` (`id_u`),
  KEY `id_place` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id_h`, `date_debut`, `date_fin`, `id_u`, `id_p`) VALUES
(1, 1475140708, 1475227108, 10, 1),
(2, 1475140709, 1475227109, 9, 6),
(3, 1475141978, 1475228378, 6, 3),
(4, 1475152878, 1475239278, 6, 4),
(5, 1475160283, 1475160283, 6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE IF NOT EXISTS `places` (
  `id_p` int(10) NOT NULL AUTO_INCREMENT,
  `numplace` varchar(5) DEFAULT NULL,
  `id_u` int(10) NOT NULL,
  `busy` tinyint(1) NOT NULL DEFAULT '0',
  `id_r` int(11) NOT NULL,
  PRIMARY KEY (`id_p`),
  KEY `id_u` (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `places`
--

INSERT INTO `places` (`id_p`, `numplace`, `id_u`, `busy`, `id_r`) VALUES
(1, '1', 10, 1, 140),
(2, '2', 6, 1, 134),
(3, '3', 6, 1, 142),
(4, '4', 6, 1, 143),
(5, '5', 7, 1, 145),
(6, '6', 9, 1, 141),
(7, '7', 6, 1, 146),
(8, '8', 6, 1, 147),
(9, '9', 6, 1, 148),
(10, '10', 6, 1, 149),
(11, '11', 6, 1, 150),
(12, '12', 6, 1, 151),
(13, '13', 6, 0, 0),
(14, '14', 6, 0, 0),
(15, '15', 6, 0, 0),
(16, '16', 6, 0, 0),
(17, '17', 6, 0, 0),
(18, '18', 6, 0, 0),
(19, '19', 6, 0, 0),
(20, '20', 6, 0, 0),
(21, '21', 6, 0, 0),
(22, '22', 6, 0, 0),
(23, '23', 6, 0, 0),
(24, '24', 6, 0, 0),
(25, '25', 6, 0, 0),
(26, '26', 6, 0, 0),
(27, '27', 6, 0, 0),
(28, '28', 6, 0, 0),
(29, '29', 6, 0, 0),
(30, '30', 6, 0, 0),
(31, '31', 6, 0, 0),
(32, '32', 6, 0, 0),
(33, '33', 6, 0, 0),
(34, '34', 6, 0, 0),
(35, '35', 6, 0, 0),
(36, '36', 6, 0, 0),
(37, '37', 6, 0, 0),
(38, '38', 6, 0, 0),
(39, '39', 6, 0, 0),
(40, '40', 6, 0, 0),
(41, '41', 6, 1, 136);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id_r` int(10) NOT NULL AUTO_INCREMENT,
  `date_debut` int(11) DEFAULT NULL,
  `date_fin` int(25) DEFAULT NULL,
  `id_u` int(10) NOT NULL,
  `id_p` int(10) NOT NULL,
  PRIMARY KEY (`id_r`),
  UNIQUE KEY `id_u` (`id_u`),
  KEY `id_user` (`id_u`),
  KEY `id_place` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservations`
--

INSERT INTO `reservations` (`id_r`, `date_debut`, `date_fin`, `id_u`, `id_p`) VALUES
(140, 1475140708, 1475227108, 10, 1),
(141, 1475140709, 1475227109, 9, 6),
(145, 1475176565, 1475262965, 7, 5),
(146, 1475177882, 1475264282, 6, 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `login` varchar(10) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `attente` tinyint(1) NOT NULL DEFAULT '0',
  `date_attente` int(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COMMENT='table contenant les utilisateurs';

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_u`, `nom`, `prenom`, `login`, `mdp`, `email`, `status`, `attente`, `date_attente`) VALUES
(6, 'Di Schiena', 'Dylan', 'dylan', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 'dylanoxen@hotmail.fr', 2, 0, 0),
(7, 'caudeli', 'nathan', 'ntm', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 'aptsdeplv@hotmail.fr', 1, 0, 0),
(9, 'caudeli', 'nathan', 'salut', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 'aptsdeplv93@hotmail.fr', 1, 0, 0),
(10, 'lapute', 'dyshiena', 'dyloune', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 'aptsdeplv93@hotmail.fr', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
