-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 26 nov. 2023 à 15:59
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `23_24_b2_projet_sira`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `id_agence` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `ville` varchar(15) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_agence`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id_agence`, `nom`, `tel`, `email`, `adresse`, `cp`, `ville`, `image`) VALUES
(1, 'Agence A', '0784956213', NULL, '1 Avenue du blabla', 75000, 'Paris', '/uploadsagence1.jpg'),
(2, 'Agence B', '0784854113', NULL, '51 bis rue du travaille', 75000, 'Paris', '/imgagence1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(10) DEFAULT NULL,
  `id_vehicule` int(10) DEFAULT NULL,
  `id_agence` int(10) DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `dateReservation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_location`),
  KEY `id_client` (`id_client`),
  KEY `id_vehicule` (`id_vehicule`),
  KEY `id_agence` (`id_agence`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id_location`, `id_client`, `id_vehicule`, `id_agence`, `dateDebut`, `dateFin`, `total`, `dateReservation`) VALUES
(1, 2, 1, 1, '2023-11-29', '2023-12-02', NULL, '2023-11-25 02:23:25');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `login` varchar(8) DEFAULT NULL,
  `mdp` varchar(100) NOT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `ville` varchar(15) DEFAULT NULL,
  `statut` enum('CLIENT','ADMIN') DEFAULT NULL,
  `date_inscription` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `prenom`, `nom`, `login`, `mdp`, `tel`, `email`, `adresse`, `cp`, `ville`, `statut`, `date_inscription`) VALUES
(1, 'Gloire', 'BOBOTI', 'gloire', '$2y$10$KmD4UKdKx5iDARO24bBNX.kV2I28kJ/035FRvzzxFp5Uhd3Zs2iii', '0123456789', 'test@gmail.com', NULL, 78000, 'Versailles', 'ADMIN', '2023-11-22 21:53:08'),
(2, 'Toto', 'TATA', 'toto', '$2y$10$rwnVv/JyPn1rrBzhkAwvj.6eOLwoF0orjJIuLyKS4dOAt2UF9GHPa', '0123654789', 'test1@gmail.com', NULL, 75000, 'Paris', 'ADMIN', '2023-11-22 22:05:40'),
(5, 'Tato', 'TITI', 'tato', '$2y$10$NCrmkiszO0N1Hxrt2gqYDu4eG7QMwHzJzwFNKll6BglghPKENsiLe', '0123654789', 'test2@gmail.com', NULL, 75000, 'Paris', NULL, '2023-11-22 22:07:39'),
(9, 'Tete', 'TUTU', 'tete', '$2y$10$HZY8IQ8cgr8LGO7/AHvo5./PPnZdblZ7LURcwHmgpPBDWvkq9PXHK', '0213654785', 'test3@gmail.com', NULL, 33000, 'Bordeaux', NULL, '2023-11-22 23:05:26'),
(10, 'Reich', 'RERE', 'rere', '$2y$10$paPjrIDHeCqhfGBvBDB3BOiE1M7v29yRxYVg0diLkZy2Ls7LpbwBK', '0214587965', 'test4@gmail.com', NULL, 75000, 'Paris', NULL, '2023-11-22 23:09:54'),
(11, 'Sita', 'SASA', 'sita', '$2y$10$MPFTDHoCvc/rD1BGRjsYPOmbl7Rvho3itEAhpIoiryGIGtUgLFQ3G', '023651478989', 'test5@gmail.com', 'NULL', 94000, 'Cretail', NULL, '2023-11-25 01:22:05');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(20) NOT NULL,
  `modele` varchar(20) DEFAULT NULL,
  `prix_journalier` float(5,2) DEFAULT NULL,
  `description` text,
  `image` varchar(20) DEFAULT NULL,
  `agence` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_vehicule`),
  KEY `agence` (`agence`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `marque`, `modele`, `prix_journalier`, `description`, `image`, `agence`) VALUES
(1, 'Mercedes', 'Class A', 150.00, 'Voiture de luxe, confort assurer', '/uploadsv1.jpg', NULL),
(2, 'Audi', 'A6', 150.00, 'Audi A6 Berline et sportive', '/imgv2.jpg', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`),
  ADD CONSTRAINT `location_ibfk_3` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`id_agence`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`agence`) REFERENCES `agence` (`id_agence`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
