-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 15 Novembre 2016 à 13:27
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `workshopeatineraire`
--
CREATE DATABASE IF NOT EXISTS `workshopeatineraire` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `workshopeatineraire`;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `idLieu` int(11) NOT NULL AUTO_INCREMENT,
  `coordonnees` varchar(25) NOT NULL,
  `nomLieu` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `coordonnees`, `nomLieu`) VALUES
(1, '50.292761, 2.780611', 'Ch''ti Charivary'),
(2, '50.290722, 2.774200', 'Le Petit Théâtre');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `idRDV` int(11) NOT NULL AUTO_INCREMENT,
  `horaire` varchar(25) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `dateRdv` date NOT NULL,
  `idLieu` int(11) NOT NULL,
  PRIMARY KEY (`idRDV`),
  KEY `FK_Rdv_idLieu` (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rdv`
--

INSERT INTO `rdv` (`idRDV`, `horaire`, `idUtilisateur`, `dateRdv`, `idLieu`) VALUES
(1, '12h30', 1, '2016-11-16', 1),
(2, '13h00', 2, '2016-11-17', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `dateNaissance` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `numeroTelephone` varchar(25) NOT NULL,
  `nombrePoints` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `dateNaissance`, `mail`, `password`, `numeroTelephone`, `nombrePoints`) VALUES
(1, 'LECAILLE', 'Maxime', '1994-08-19', 'maxime.lecaille@epsi.fr', 'maxmax', '0610684839', NULL),
(2, 'ROUSSEL', 'Maxime', '1993-09-13', 'maxime.roussel1@epsi.fr', 'maxmax', '0606060606', NULL),
(3, 'GOMEL', 'Benjamin', '1994-08-09', 'benjamin.gomel@epsi.fr', 'benben', '0606060606', NULL),
(4, 'COUSSEMAEKER', 'Arnaud', '1994-06-14', 'arnaud.coussmaeker@epsi.fr', 'arnaudarnaud', '0606060606', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_rdv`
--

DROP TABLE IF EXISTS `utilisateur_rdv`;
CREATE TABLE IF NOT EXISTS `utilisateur_rdv` (
  `idUtilisateur` int(11) NOT NULL,
  `idRDV` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idRDV`),
  KEY `FK_utilisateur_rdv_idRDV` (`idRDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur_rdv`
--

INSERT INTO `utilisateur_rdv` (`idUtilisateur`, `idRDV`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `verdict`
--

DROP TABLE IF EXISTS `verdict`;
CREATE TABLE IF NOT EXISTS `verdict` (
  `idVerdict` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `idRDV` int(11) NOT NULL,
  PRIMARY KEY (`idVerdict`),
  KEY `FK_Verdict_idRDV` (`idRDV`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `verdict`
--

INSERT INTO `verdict` (`idVerdict`, `note`, `description`, `idRDV`) VALUES
(1, 5, 'TOP TOP TOP', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `FK_Rdv_idLieu` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`idLieu`);

--
-- Contraintes pour la table `utilisateur_rdv`
--
ALTER TABLE `utilisateur_rdv`
  ADD CONSTRAINT `FK_utilisateur_rdv_idRDV` FOREIGN KEY (`idRDV`) REFERENCES `rdv` (`idRDV`),
  ADD CONSTRAINT `FK_utilisateur_rdv_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `verdict`
--
ALTER TABLE `verdict`
  ADD CONSTRAINT `FK_Verdict_idRDV` FOREIGN KEY (`idRDV`) REFERENCES `rdv` (`idRDV`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
