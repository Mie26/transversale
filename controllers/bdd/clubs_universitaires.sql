-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 08 Juillet 2025 à 07:10
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `clubs_universitaires`
--
CREATE DATABASE IF NOT EXISTS `clubs_universitaires` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clubs_universitaires`;

-- --------------------------------------------------------

--
-- Structure de la table `badges`
--

CREATE TABLE IF NOT EXISTS `badges` (
  `id_badge` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `type_badge` varchar(50) DEFAULT NULL,
  `date_obtention` date DEFAULT NULL,
  PRIMARY KEY (`id_badge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `id_club` int(11) NOT NULL AUTO_INCREMENT,
  `nom_club` varchar(100) NOT NULL,
  `description` text,
  `nb_membres` int(11) DEFAULT '0',
  `nb_activites` int(11) DEFAULT '0',
  PRIMARY KEY (`id_club`),
  UNIQUE KEY `nom_club` (`nom_club`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`id_club`, `nom_club`, `description`, `nb_membres`, `nb_activites`) VALUES
(1, 'Club Théâtre', 'Un club pour les passionnés de théâtre.', 0, 0),
(2, 'Club Musique', 'Groupe musical de l’université.', 0, 0),
(3, 'Club Tech', 'Pour les passionnés de programmation.', 0, 0),
(4, 'Club Littérature', 'Lecture, poésie et écriture.', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `NIE` varchar(20) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `centres_interet` text,
  `langue_preferee` varchar(20) NOT NULL,
  `est_admin` tinyint(1) DEFAULT '0',
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_etudiant`),
  UNIQUE KEY `NIE` (`NIE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`id_etudiant`, `nom`, `prenom`, `NIE`, `mot_de_passe`, `centres_interet`, `langue_preferee`, `est_admin`, `email`) VALUES
(1, 'ANDRI', 'lie', 'llie69907@gmail.com', 'VODY', NULL, '', 0, ''),
(2, 'ANDRIANANTENAINA ', 'Wendy ', 'llie6997@gmail.com', 'VODY', NULL, '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `date_debut` datetime NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `id_club` int(11) NOT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_club` (`id_club`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `inscription_evenement`
--

CREATE TABLE IF NOT EXISTS `inscription_evenement` (
  `id_inscription` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `confirmation_mdp` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_inscription`),
  KEY `id_etudiant` (`id_etudiant`),
  KEY `id_evenement` (`id_evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membre_club`
--

CREATE TABLE IF NOT EXISTS `membre_club` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  `actif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_membre`),
  KEY `id_etudiant` (`id_etudiant`),
  KEY `id_club` (`id_club`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_envoi` datetime NOT NULL,
  `lu` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_notification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `clubs` (`id_club`);

--
-- Contraintes pour la table `inscription_evenement`
--
ALTER TABLE `inscription_evenement`
  ADD CONSTRAINT `inscription_evenement_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiants` (`id_etudiant`),
  ADD CONSTRAINT `inscription_evenement_ibfk_2` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`);

--
-- Contraintes pour la table `membre_club`
--
ALTER TABLE `membre_club`
  ADD CONSTRAINT `membre_club_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiants` (`id_etudiant`),
  ADD CONSTRAINT `membre_club_ibfk_2` FOREIGN KEY (`id_club`) REFERENCES `clubs` (`id_club`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
