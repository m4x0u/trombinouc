-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 29 Mai 2020 à 22:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE IF NOT EXISTS `amis` (
  `id_invitation` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_exp` varchar(100) NOT NULL,
  `pseudo_dest` varchar(100) NOT NULL,
  `date_invitation` datetime NOT NULL,
  `date_confirmation` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_invitation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `amis`
--

INSERT INTO `amis` (`id_invitation`, `pseudo_exp`, `pseudo_dest`, `date_invitation`, `date_confirmation`, `active`) VALUES
(17, 'maxtest', 'personne', '2020-05-29 07:24:40', '2020-05-29 07:26:03', 1),
(18, 'Perrine', 'maxtest', '2020-05-29 09:13:18', '2020-05-29 09:13:28', 1),
(19, 'Perrine', 'personne', '2020-05-29 22:16:09', '2020-05-29 22:16:42', 1);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(11) NOT NULL AUTO_INCREMENT,
  `publication` varchar(1000) NOT NULL,
  `date_publication` datetime NOT NULL,
  `pseudo_publi` varchar(100) NOT NULL,
  `image_publi` varchar(100) NOT NULL,
  `reponse` varchar(1000) NOT NULL,
  `date_reponse` datetime NOT NULL,
  `pseudo_rep` varchar(100) NOT NULL,
  PRIMARY KEY (`id_publication`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `publication`, `date_publication`, `pseudo_publi`, `image_publi`, `reponse`, `date_reponse`, `pseudo_rep`) VALUES
(3, 'salut!!les potos!!', '2020-05-29 09:03:33', 'maxtest', 'luffy.jpg', '\r\nje vais bien', '2020-05-29 18:42:32', 'Perrine'),
(5, '\r\nj''espère que perrine ne voit pas', '2020-05-29 16:29:32', 'personne', 'avatar_défaut.jpg', '', '0000-00-00 00:00:00', ''),
(6, '\r\nje suis contente ', '2020-05-29 19:35:39', 'Perrine', 'avatar_défaut.jpg', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_rep` varchar(100) NOT NULL,
  `reponse` varchar(1000) NOT NULL,
  `date_reponse` datetime NOT NULL,
  `image_rep` varchar(100) NOT NULL,
  `id_publi` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `pseudo_rep`, `reponse`, `date_reponse`, `image_rep`, `id_publi`) VALUES
(3, 'maxtest', '\r\nje vois', '2020-05-29 21:40:58', 'luffy.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexe` varchar(6) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `password`, `email`, `sexe`, `description`, `image`) VALUES
(6, 'Perrine', '497661a513d59638400e14fa389d104745ac544e', 'perrine.leguillanton@gmail.com', 'Femme', 'j''aime les fleurs et le Mexique et maxence', 'fleur.jpg'),
(8, 'maxtest', '0706025b2bbcec1ed8d64822f4eccd96314938d0', 'charlotmaxence@yahoo.fr', 'Homme', 'je suis un homme et je suis gentil', 'luffy.jpg'),
(9, 'personne', 'd3101676be409f2777c6f2cf997acb07ba5dd919', 'personne@gmail.com', 'Homme', 'je suis personne', 'sarkozy.jpg'),
(10, 'Professeur', 'd9f02d46be016f1b301f7c02a4b9c4ebe0dde7ef', 'prof@gmail.fr', 'Femme', 'je suis le professeur qui va t''évaluer.', 'avatar_défaut.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
