-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Janvier 2017 à 15:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `amap`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'feculent'),
(2, 'fruit');

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

CREATE TABLE IF NOT EXISTS `colis` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `montanttotal` float DEFAULT NULL,
  `id_livraison` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `id_Produit` int(11) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  KEY `FK_colis_id` (`id_livraison`),
  KEY `FK_colis_id_Produit` (`id_Produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `colis`
--

INSERT INTO `colis` (`ref`, `montanttotal`, `id_livraison`, `quantite`, `id_Produit`) VALUES
(1, 50, 1, 100, 1),
(2, 100, 1, 200, 1),
(3, 50, 2, 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_livraison_id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`id`, `id_utilisateur`) VALUES
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prixunitaire` float DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Produit_id_utilisateur` (`id_utilisateur`),
  KEY `FK_Produit_id_categorie` (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `description`, `prixunitaire`, `quantite`, `id_utilisateur`, `id_categorie`) VALUES
(1, 'Patate', 'des patates', 0.5, 850, 2, 1),
(2, 'Pomme', 'des pommes', 0.7, 620, 2, 2),
(3, 'abricot', 'Des abricots.', 2, 452, 2, 2),
(4, 'cerise', 'Des cerises.', 0.4, 741, 2, 2),
(5, 'asperge', 'Des asperges.', 0.8, 456, 2, 1),
(6, 'betterave', 'Des betteraves.', 0.9, 963, 2, 1),
(7, 'carotte', 'Des carottes.', 1, 123, 2, 1),
(8, 'figue', 'Des figues', 1, 12, 2, 2),
(9, 'kiwi', 'Des kiwis.', 1, 282, 2, 2),
(10, 'laitue', 'Des laitues.', 1, 321, 2, 1),
(11, 'pruneau', 'Des pruneaux', 1, 32, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ravitailler`
--

CREATE TABLE IF NOT EXISTS `ravitailler` (
  `quantite` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_utilisateur`),
  KEY `FK_ravitailler_id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'producteur'),
(3, 'consommateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(25) DEFAULT NULL,
  `prenom` char(25) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `tel` int(11) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` char(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `id_Type_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_utilisateur_id_Type_utilisateur` (`id_Type_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `mail`, `tel`, `codepostal`, `ville`, `mdp`, `login`, `id_Type_utilisateur`) VALUES
(1, 'Fouque', 'Patrice', '52 rue jesaispas', 'jesaispas@gmail.com', 631313131, 45000, 'Orléans', 'mdp', 'Patrice', 1),
(2, 'Trassard', 'Robin', 'une autre rue pour tester la modification :)', 'jesaispas@gmail.com', 632323232, 45000, 'Orlï¿½ans', 'mdp', 'Robin', 2),
(3, 'Benardeau', 'Quentin', '54 rue jesaispas', 'jesaispas@gmail.com', 633333333, 45000, 'Orlï¿½ans', 'mdp', 'Quentin', 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `FK_colis_id_Produit` FOREIGN KEY (`id_Produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `FK_colis_id` FOREIGN KEY (`id_livraison`) REFERENCES `livraison` (`id`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `FK_livraison_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_Produit_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FK_Produit_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `ravitailler`
--
ALTER TABLE `ravitailler`
  ADD CONSTRAINT `FK_ravitailler_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_ravitailler_id` FOREIGN KEY (`id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_utilisateur_id_Type_utilisateur` FOREIGN KEY (`id_Type_utilisateur`) REFERENCES `type_utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
