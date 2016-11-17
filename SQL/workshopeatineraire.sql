-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 17 Novembre 2016 à 15:42
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
  `coordonnees` text NOT NULL,
  `nomLieu` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `coordonnees`, `nomLieu`) VALUES
(1, '50.292761, 2.780611', 'Ch''ti Charivary'),
(2, '50.290722, 2.774200', 'Le Petit Theatre');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `idRDV` int(11) NOT NULL AUTO_INCREMENT,
  `horaire` varchar(25) NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `dateRdv` date NOT NULL,
  `nbPlaces` int(11) DEFAULT NULL,
  `idLieu` int(11) NOT NULL,
  PRIMARY KEY (`idRDV`),
  KEY `FK_Rdv_idLieu` (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rdv`
--

INSERT INTO `rdv` (`idRDV`, `horaire`, `idCreateur`, `dateRdv`, `nbPlaces`, `idLieu`) VALUES
(1, '12h30', 1, '2016-11-17', 3, 1),
(2, '13h00', 3, '2016-11-23', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rdv_trajet`
--

DROP TABLE IF EXISTS `rdv_trajet`;
CREATE TABLE IF NOT EXISTS `rdv_trajet` (
  `idRDV` int(11) NOT NULL,
  `idTrajet` int(11) NOT NULL,
  PRIMARY KEY (`idRDV`,`idTrajet`),
  KEY `FK_rdv_trajet_idTrajet` (`idTrajet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rdv_trajet`
--

INSERT INTO `rdv_trajet` (`idRDV`, `idTrajet`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `idTrajet` int(11) NOT NULL AUTO_INCREMENT,
  `idRdv` int(11) NOT NULL,
  `numEtape` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `positionParticipant` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idTrajet`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `trajet`
--

INSERT INTO `trajet` (`idTrajet`, `idRdv`, `numEtape`, `idUtilisateur`, `positionParticipant`) VALUES
(1, 1, 3, 2, '0');

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
  `mail` text NOT NULL,
  `password` varchar(25) NOT NULL,
  `numeroTelephone` varchar(25) NOT NULL,
  `nombrePoints` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `dateNaissance`, `mail`, `password`, `numeroTelephone`, `nombrePoints`) VALUES
(1, 'LECAILLE', 'Maxime', '1994-08-19', 'maxime.lecaille@epsi.fr', 'maxmax', '0610684839', 0),
(2, 'ROUSSEL', 'Maxime', '1993-09-13', 'maxime.roussel1@epsi.fr', 'maxmax', '0606060606', 0),
(3, 'GOMEL', 'Benjamin', '1994-08-09', 'benjamin.gomel@epsi.fr', 'benben', '0606060606', 0),
(4, 'COUSSEMAEKER', 'Arnaud', '1994-06-14', 'arnaud.coussmaeker@epsi.fr', 'arnaudarnaud', '0606060606', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_rdv`
--

DROP TABLE IF EXISTS `utilisateur_rdv`;
CREATE TABLE IF NOT EXISTS `utilisateur_rdv` (
  `note` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idRDV` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idRDV`),
  KEY `FK_utilisateur_rdv_idRDV` (`idRDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur_rdv`
--

INSERT INTO `utilisateur_rdv` (`note`, `description`, `idUtilisateur`, `idRDV`) VALUES
(5, 'TOP TOP TOP', 3, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `FK_Rdv_idLieu` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`idLieu`);

--
-- Contraintes pour la table `rdv_trajet`
--
ALTER TABLE `rdv_trajet`
  ADD CONSTRAINT `FK_rdv_trajet_idRDV` FOREIGN KEY (`idRDV`) REFERENCES `rdv` (`idRDV`),
  ADD CONSTRAINT `FK_rdv_trajet_idTrajet` FOREIGN KEY (`idTrajet`) REFERENCES `trajet` (`idTrajet`);

--
-- Contraintes pour la table `utilisateur_rdv`
--
ALTER TABLE `utilisateur_rdv`
  ADD CONSTRAINT `FK_utilisateur_rdv_idRDV` FOREIGN KEY (`idRDV`) REFERENCES `rdv` (`idRDV`),
  ADD CONSTRAINT `FK_utilisateur_rdv_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
