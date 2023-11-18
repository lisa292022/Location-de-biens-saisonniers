-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 nov. 2023 à 18:34
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `locations_biens_saisonniers`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id_admin` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id_admin`, `id_client`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE `biens` (
  `id_bien` int(11) NOT NULL,
  `nom_bien` varchar(100) NOT NULL,
  `rue_bien` varchar(100) NOT NULL,
  `Idcom` int(11) NOT NULL,
  `superficie_bien` int(10) NOT NULL,
  `nb_couchage` int(50) NOT NULL,
  `nb_piece` int(50) NOT NULL,
  `nb_chambre` int(50) NOT NULL,
  `descriptif` varchar(1000) NOT NULL,
  `ref_bien` varchar(50) NOT NULL,
  `statut_bien` tinyint(1) NOT NULL,
  `id_type_bien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`id_bien`, `nom_bien`, `rue_bien`, `Idcom`, `superficie_bien`, `nb_couchage`, `nb_piece`, `nb_chambre`, `descriptif`, `ref_bien`, `statut_bien`, `id_type_bien`) VALUES
(2, 'Maison Santa', '15 rue de la poste', 6, 100, 4, 7, 2, 'Doté d’un bain à remous, la maison Santa est situé à Ambronay. L’établissement se trouve à 600 mètres de l\'abbaye Notre-Dame et dispose d’une connexion Wi-Fi gratuite dans l’ensemble de ses locaux.\r\n\r\nL’appartement dispose de 2 chambres climatisées et d’une cuisine entièrement équipée avec un four micro-ondes. Les serviettes et le linge de lit sont fournis dans la maison.', 'M001', 0, 2),
(3, 'Maison Le Vieux Port ', '316 rue de la Chapelle', 8, 27, 2, 4, 1, 'Le Vieux Port occupe un bâtiment historique au sein d\'un ancien couvent, dans le plus vieux quartier d\'Andert et Condon. Cet établissement climatisé possède un jardin, une terrasse et un barbecue. Vous bénéficierez d\'une connexion Wi-Fi gratuite dans l\'ensemble de ses locaux.\r\n', 'M002', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `rue_client` varchar(100) NOT NULL,
  `Idcom` int(11) NOT NULL,
  `mail_client` varchar(100) NOT NULL,
  `mdp_client` varchar(50) NOT NULL,
  `statut_client` tinyint(1) NOT NULL,
  `valid_client` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom_client`, `prenom_client`, `rue_client`, `Idcom`, `mail_client`, `mdp_client`, `statut_client`, `valid_client`) VALUES
(1, 'Dupont', 'Martin', '450 chemin de l\'or', 15, 'martin.dupont@gmail.com', 'Toto4765', 0, 0),
(2, 'Defeuillet', 'Lisa', '1 place Georges Michel', 12, 'lisa.defeuillet@gmail.com', 'Lili31600*', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `Idcom` int(11) NOT NULL,
  `code_commune_INSEE` int(11) DEFAULT NULL,
  `nom_commune_postal` varchar(255) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `libelle_acheminement` varchar(255) DEFAULT NULL,
  `ligne_5` varchar(255) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `code_commune` int(11) DEFAULT NULL,
  `article` varchar(10) DEFAULT NULL,
  `nom_commune` varchar(255) DEFAULT NULL,
  `nom_commune_complet` varchar(255) DEFAULT NULL,
  `code_departement` int(11) DEFAULT NULL,
  `nom_departement` varchar(255) DEFAULT NULL,
  `code_region` int(11) DEFAULT NULL,
  `nom_region` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`Idcom`, `code_commune_INSEE`, `nom_commune_postal`, `code_postal`, `libelle_acheminement`, `ligne_5`, `latitude`, `longitude`, `code_commune`, `article`, `nom_commune`, `nom_commune_complet`, `code_departement`, `nom_departement`, `code_region`, `nom_region`) VALUES
(1, 1001, 'L ABERGEMENT CLEMENCIAT', 1400, 'L ABERGEMENT CLEMENCIAT', NULL, '46.153426', '4.926114', 1, 'L\'', 'Abergement-Clémenciat', 'L\'Abergement-Clémenciat', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(2, 1002, 'L ABERGEMENT DE VAREY', 1640, 'L ABERGEMENT DE VAREY', NULL, '46.009188', '5.428017', 2, 'L\'', 'Abergement-de-Varey', 'L\'Abergement-de-Varey', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(3, 1004, 'AMBERIEU EN BUGEY', 1500, 'AMBERIEU EN BUGEY', NULL, '45.960848', '5.372926', 4, NULL, 'Ambérieu-en-Bugey', 'Ambérieu-en-Bugey', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(4, 1005, 'AMBERIEUX EN DOMBES', 1330, 'AMBERIEUX EN DOMBES', NULL, '45.996180', '4.912273', 5, NULL, 'Ambérieux-en-Dombes', 'Ambérieux-en-Dombes', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(5, 1006, 'AMBLEON', 1300, 'AMBLEON', NULL, '45.749499', '5.594320', 6, NULL, 'Ambléon', 'Ambléon', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(6, 1007, 'AMBRONAY', 1500, 'AMBRONAY', NULL, '46.005591', '5.357607', 7, NULL, 'Ambronay', 'Ambronay', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(7, 1008, 'AMBUTRIX', 1500, 'AMBUTRIX', NULL, '45.936713', '5.332809', 8, NULL, 'Ambutrix', 'Ambutrix', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(8, 1009, 'ANDERT ET CONDON', 1300, 'ANDERT ET CONDON', NULL, '45.787357', '5.657883', 9, NULL, 'Andert-et-Condon', 'Andert-et-Condon', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(9, 1010, 'ANGLEFORT', 1350, 'ANGLEFORT', NULL, '45.909372', '5.795160', 10, NULL, 'Anglefort', 'Anglefort', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(10, 1011, 'APREMONT', 1100, 'APREMONT', NULL, '46.205498', '5.657815', 11, NULL, 'Apremont', 'Apremont', 1, 'Ain', 84, 'Auvergne-Rhône-Alpes'),
(11, 1012, 'ARANC', 1110, 'ARANC', '', '46.001534', '5.511306', 12, '', 'Aranc', 'Aranc', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(12, 1013, 'ARANDAS', 1230, 'ARANDAS', '', '45.890816', '5.498704', 13, '', 'Arandas', 'Arandas', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(13, 1014, 'ARBENT', 1100, 'ARBENT', '', '46.283494', '5.690617', 14, '', 'Arbent', 'Arbent', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(14, 1015, 'ARBOYS EN BUGEY', 1300, 'ARBOYS EN BUGEY', 'ARBIGNIEU', '45.723762', '5.652631', 15, '', 'Arboys en Bugey', 'Arboys en Bugey', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(15, 1015, 'ARBOYS EN BUGEY', 1300, 'ARBOYS EN BUGEY', 'ST BOIS', '45.723762', '5.652631', 15, '', 'Arboys en Bugey', 'Arboys en Bugey', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(16, 1016, 'ARBIGNY', 1190, 'ARBIGNY', '', '46.477676', '4.959942', 16, '', 'Arbigny', 'Arbigny', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(17, 1017, 'ARGIS', 1230, 'ARGIS', '', '45.933718', '5.482511', 17, '', 'Argis', 'Argis', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(18, 1019, 'ARMIX', 1510, 'ARMIX', '', '45.854184', '5.583578', 19, '', 'Armix', 'Armix', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(19, 1021, 'ARS SUR FORMANS', 1480, 'ARS SUR FORMANS', '', '45.993461', '4.821996', 21, '', 'Ars-sur-Formans', 'Ars-sur-Formans', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes'),
(20, 1022, 'ARTEMARE', 1510, 'ARTEMARE', '', '45.869589', '5.690653', 22, '', 'Artemare', 'Artemare', 1, 'Ain', 84, 'Auvergne-Rh?ne-Alpes');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) NOT NULL,
  `nom_photo` varchar(50) NOT NULL,
  `lien_photo` varchar(500) NOT NULL,
  `id_bien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `date_resa` date NOT NULL,
  `date_deb_resa` date NOT NULL,
  `date_fin_resa` date NOT NULL,
  `commentaire` varchar(200) NOT NULL,
  `moderation` tinyint(1) NOT NULL,
  `annulation_resa` tinyint(1) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_bien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `date_deb_tarif` date NOT NULL,
  `date_fin_tarif` date NOT NULL,
  `prix_loc` float NOT NULL,
  `id_bien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `date_deb_tarif`, `date_fin_tarif`, `prix_loc`, `id_bien`) VALUES
(1, '2023-04-01', '2023-09-30', 500, 2),
(2, '2023-03-01', '2023-11-30', 165, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type_bien`
--

CREATE TABLE `type_bien` (
  `id_type_bien` int(11) NOT NULL,
  `lib_type_bien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_bien`
--

INSERT INTO `type_bien` (`id_type_bien`, `lib_type_bien`) VALUES
(1, 'Villa'),
(2, 'Maison');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`id_bien`),
  ADD KEY `FK_id_type_bien` (`id_type_bien`),
  ADD KEY `FK_Idcom` (`Idcom`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`Idcom`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `fk_id_bien_photo` (`id_bien`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `fk_id_bien_reservation` (`id_bien`),
  ADD KEY `FK_id_client` (`id_client`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`),
  ADD KEY `FK_id_bien` (`id_bien`);

--
-- Index pour la table `type_bien`
--
ALTER TABLE `type_bien`
  ADD PRIMARY KEY (`id_type_bien`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `biens`
--
ALTER TABLE `biens`
  MODIFY `id_bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_bien`
--
ALTER TABLE `type_bien`
  MODIFY `id_type_bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `biens`
--
ALTER TABLE `biens`
  ADD CONSTRAINT `FK_Idcom` FOREIGN KEY (`Idcom`) REFERENCES `communes` (`Idcom`),
  ADD CONSTRAINT `FK_id_type_bien` FOREIGN KEY (`id_type_bien`) REFERENCES `type_bien` (`id_type_bien`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_id_bien_photo` FOREIGN KEY (`id_bien`) REFERENCES `biens` (`id_bien`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_id_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`),
  ADD CONSTRAINT `fk_id_bien_reservation` FOREIGN KEY (`id_bien`) REFERENCES `biens` (`id_bien`);

--
-- Contraintes pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `FK_id_bien` FOREIGN KEY (`id_bien`) REFERENCES `biens` (`id_bien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
