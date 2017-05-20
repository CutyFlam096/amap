-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 20 Mai 2017 à 13:39
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Féculent'),
(2, 'Fruit');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `colis`
--

INSERT INTO `colis` (`ref`, `montanttotal`, `id_livraison`, `quantite`, `id_Produit`) VALUES
(1, 50, 1, 100, 1),
(2, 100, 1, 200, 1),
(3, 50, 2, 100, 1),
(4, 0.8, 5, 1, 5),
(5, 2.7, 5, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `dateLivraison` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`id`, `id_utilisateur`, `dateLivraison`) VALUES
(1, 3, '2017-02-06'),
(2, 3, '2017-02-06'),
(5, 3, '2017-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `prixunitaire` float DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `description`, `prixunitaire`, `quantite`, `id_utilisateur`, `id_categorie`, `image`) VALUES
(1, 'Patate', 'La pomme de terre, ou patate1 (langage familier, canadianisme et belgicisme), est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus2.', 1, 850, 2, 1, 'img/produits/patate.jpg'),
(2, 'Pomme', 'La pomme est un fruit comestible à pépins d\'un goût sucré ou acidulé selon les variétés. D\'un point de vue botanique, il s\'agit d\'un faux fruit. Elle est produite par le pommier, arbre du genre Malus. C\'est le fruit le plus consommé en France1 et le troisième dans le monde.', 0.7, 620, 2, 2, 'img/produits/pomme.jpg'),
(4, 'Cerise', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. Ce petit fruit compte environ 50 calories pour 100 grammes. La fleur est généralement blanche.', 0.4, 741, 2, 2, 'img/produits/cerise.jpg'),
(5, 'Asperge', 'L\'asperge est une plante de la famille des Asparagaceae originaire de l\'est du bassin méditerranéen. Connue des Romains, elle est cultivée comme plante potagère en France depuis le XVe siècle. Le terme désigne aussi ses pousses comestibles, qui proviennent de rhizomes d\'où partent chaque année les bourgeons souterrains ou turions qui donnent naissance à des tiges s\'élevant entre 1 et 1,5 mètre.', 0.8, 1, 2, 1, 'img/produits/asperge.jpg'),
(6, 'Betterave', 'La betterave, Beta vulgaris subsp. vulgaris, est une sous-espèce de plantes de la famille des Amaranthaceae, cultivées pour leurs racines charnues, et utilisées comme légume dans l\'alimentation humaine, comme plantes fourragères et pour la production du sucre.', 0.9, 960, 2, 1, 'img/produits/betterave.jpg'),
(7, 'Carotte', '\r\nLa carotte (Daucus carota subsp. sativus) est une plante bisannuelle de la famille des apiacées (anciennement ombellifères), largement cultivée pour sa racine pivotante charnue, comestible, de couleur généralement orangée, consommée comme légume. C\'est une racine riche en carotène. La carotte est un tubercule d\'hypocotyle, c\'est-à-dire formé pour partie par l\'hypocotyle et pour l\'autre partie par la région supérieure de la racine, qui se sont tubérisés2.', 1, 123, 2, 1, 'img/produits/carotte.jpg'),
(8, 'Figue', 'La figue est le fruit du figuier commun (Ficus carica) un arbre de la famille des moracées, emblème du bassin méditerranéen où il est cultivé depuis des millénaires. Son nom français est emprunté à l\'occitan figa issu du latin classique ficus, « figue, figuier », devenu fica en latin vulgaire1. Aux Antilles et dans l\'océan Indien, le terme figue désigne aussi les bananes. Pour être plus précis, la figue n\'est pas un fruit au sens botanique du terme. Il s\'agit en fait d\'un réceptacle charnu, le synconium, qui contient les fleurs et, à maturité, une infrutescence d\'akènes éparpillés dans une pulpe comestible.', 1, 12, 2, 2, 'img/produits/figue.jpg'),
(9, 'Kiwi', 'Les kiwis sont des fruits de plusieurs espèces de lianes du genre Actinidia, famille des Actinidiaceae. Ils sont originaires de Chine, notamment de la province de Shaanxi. On en trouve par ailleurs dans des climats dits montagnards tropicaux. En France, les kiwis de l\'Adour disposent d\'une IGP et d\'un label rouge.\r\n\r\nSa pulpe généralement verte, sucrée et acidulée, entourée d\'une peau brune et duveteuse (poilue), contient une centaine de minuscules graines noires comestibles. Le kiwi est une source de vitamine C, mais aussi de vitamine A et E, de calcium, de fer et d\'acide folique.', 1, 282, 2, 2, 'img/produits/kiwi.jpg'),
(10, 'Laitue', 'Les laitues (Lactuca), au sens botanique du terme, sont un genre de plantes annuelles de la famille des Astéracées (Composées) dont certaines espèces sont cultivées pour leurs feuilles tendres consommées comme salade verte. Ce genre comprend plus de 100 espèces. La laitue la plus cultivée est l\'espèce Lactuca sativa à partir de laquelle les jardiniers ont sélectionné de nombreuses variétés et cultivars.', 1, 321, 2, 1, 'img/produits/laitue.jpg'),
(11, 'Pruneau', 'En France, le pruneau d\'Agen (préfecture de Lot-et-Garonne en Nouvelle-Aquitaine), protégé depuis 2002 sur l\'ensemble de l\'Union européenne par une indication géographique protégée (IGP), est le fruit séché d\'une variété de prunier cultivé, nommé prunier d\'Ente. On le consomme nature, en accompagnement de plats salés, ou dans des desserts sucrés. En raison de ses vertus laxatives, le pruneau peut être consommé pour faciliter le transit intestinal.', 1, 32, 2, 2, 'img/produits/pruneau.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `tel` varchar(10) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` char(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `id_Type_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `mail`, `tel`, `codepostal`, `ville`, `mdp`, `login`, `id_Type_utilisateur`) VALUES
(1, 'Fouque', 'Patrice', '52 rue je sais pas ou', 'jesaispas@gmail.com', '0631313131', 45000, 'Orléans', '$2y$10$ueSv5VScYSyw8kjtfM3tZeiWpV1tOYLL9vPkH21ZOyPRLtl0tEYNa', 'Administrateur', 1),
(2, 'Trassard', 'Robin', 'une autre rue pour tester la modification :)', 'jesaispas@gmail.com', '0632323232', 45000, 'Orléans', '$2y$10$hxblaUNVi/i9j4pMZTgJouqMnp2p9l5SlOzS1UaCIAYX3SkQ4JNI2', 'Producteur', 2),
(3, 'Benardeau', 'Quentin', '54 rue je sais pas ou', 'jesaispas@gmail.com', '0634343434', 45000, 'Orléans', '$2y$10$Yd07ssc8fOc3s.XRENib4u.YmWUXT.ByiUt.KTXyqNN6LJ5v6Zdx.', 'Consommateur', 3),
(7, 'testmdp', 'testmdp', 'testmdp', 'testmdp@testmdp.fr', '0631561213', 45000, 'testmdp', '$2y$10$jSel/6LKmVhhe.08KiOMbulz.WjgiLzRh6YdEpwNnvWGGCHe2uTI6', 'testmdp', 1);

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
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_utilisateur_id_Type_utilisateur` FOREIGN KEY (`id_Type_utilisateur`) REFERENCES `type_utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
