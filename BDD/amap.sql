-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Février 2017 à 21:53
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `amap`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `colis` (
  `ref` int(11) NOT NULL,
  `montanttotal` float DEFAULT NULL,
  `id_livraison` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `id_Produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `dateLivraison` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`id`, `id_utilisateur`, `dateLivraison`) VALUES
(1, 3, '2017-02-06'),
(2, 3, '2017-02-06');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prixunitaire` float DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `description`, `prixunitaire`, `quantite`, `id_utilisateur`, `id_categorie`, `image`) VALUES
(1, 'Patate', 'des patates', 0.5, 850, 2, 1, 'img/produits/patate.jpg'),
(2, 'Pomme', 'des pommes', 0.7, 620, 2, 2, 'img/produits/pomme.jpg'),
(3, 'abricot', 'Des abricots.', 2, 452, 2, 2, 'img/produits/abricot.jpg'),
(4, 'cerise', 'Des cerises.', 0.4, 741, 2, 2, 'img/produits/cerise.jpg'),
(5, 'asperge', 'Des asperges.', 0.8, 456, 2, 1, 'img/produits/asperge.jpg'),
(6, 'betterave', 'Des betteraves.', 0.9, 963, 2, 1, 'img/produits/betterave.jpg'),
(7, 'carotte', 'Des carottes.', 1, 123, 2, 1, 'img/produits/carotte.jpg'),
(8, 'figue', 'Des figues', 1, 12, 2, 2, 'img/produits/figue.jpg'),
(9, 'kiwi', 'Des kiwis.', 1, 282, 2, 2, 'img/produits/kiwi.jpg'),
(10, 'laitue', 'Des laitues.', 1, 321, 2, 1, 'img/produits/laitue.jpg'),
(11, 'pruneau', 'Des pruneaux', 1, 32, 2, 2, 'img/produits/pruneau.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ravitailler`
--

CREATE TABLE `ravitailler` (
  `quantite` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` char(25) DEFAULT NULL,
  `prenom` char(25) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `tel` int(11) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` char(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `id_Type_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `mail`, `tel`, `codepostal`, `ville`, `mdp`, `login`, `id_Type_utilisateur`) VALUES
(1, 'Fouque', 'Patrice', '52 rue jesaispas', 'jesaispas@gmail.com', 631313131, 45000, 'Orléans', 'mdp', 'Patrice', 1),
(2, 'Trassard', 'Robin', 'une autre rue pour tester la modification :)', 'jesaispas@gmail.com', 632323232, 45000, 'Orlï¿½ans', 'mdp', 'Robin', 2),
(3, 'Benardeau', 'Quentin', '54 rue jesaispas', 'jesaispas@gmail.com', 633333333, 45000, 'Orlï¿½ans', 'mdp', 'Quentin', 3),
(4, 'testtest', 'testtest', 'testtest', 'testtest@testtest.testtest', 631313131, 45000, 'testtest', 'testtest', 'testtest', 3),
(5, 'testProducteur', 'testProducteur', 'testProducteur', 'testProducteur@testProducteur.com', 631313131, 45000, 'testProducteur', 'testProducteur', 'testProducteur', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colis`
--
ALTER TABLE `colis`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `FK_colis_id` (`id_livraison`),
  ADD KEY `FK_colis_id_Produit` (`id_Produit`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_livraison_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Produit_id_utilisateur` (`id_utilisateur`),
  ADD KEY `FK_Produit_id_categorie` (`id_categorie`);

--
-- Index pour la table `ravitailler`
--
ALTER TABLE `ravitailler`
  ADD PRIMARY KEY (`id`,`id_utilisateur`),
  ADD KEY `FK_ravitailler_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_utilisateur_id_Type_utilisateur` (`id_Type_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `colis`
--
ALTER TABLE `colis`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `FK_colis_id` FOREIGN KEY (`id_livraison`) REFERENCES `livraison` (`id`),
  ADD CONSTRAINT `FK_colis_id_Produit` FOREIGN KEY (`id_Produit`) REFERENCES `produit` (`id`);

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
  ADD CONSTRAINT `FK_ravitailler_id` FOREIGN KEY (`id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `FK_ravitailler_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_utilisateur_id_Type_utilisateur` FOREIGN KEY (`id_Type_utilisateur`) REFERENCES `type_utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
