-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 20 Mai 2017 à 18:58
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `routes`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `CodeSCA` int(11) NOT NULL,
  `Nom` varchar(4000) DEFAULT NULL,
  `CA` double DEFAULT NULL,
  `DureeContrat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `peage`
--

CREATE TABLE `peage` (
  `PgDuKm` double DEFAULT NULL,
  `PgAuKm` double DEFAULT NULL,
  `Tarif` double DEFAULT NULL,
  `CodT` int(11) DEFAULT NULL,
  `CodPe` int(11) NOT NULL,
  `CodeSCA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `registre`
--

CREATE TABLE `registre` (
  `CodR` int(11) NOT NULL,
  `Descriptif` varchar(4000) DEFAULT NULL,
  `DateDeb` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  `CodePe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

CREATE TABLE `sortie` (
  `Libelle` varchar(255) DEFAULT NULL,
  `CodT` int(11) DEFAULT NULL,
  `CodS` int(11) NOT NULL,
  `Numéro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sortie`
--

INSERT INTO `sortie` (`Libelle`, `CodT`, `CodS`, `Numéro`) VALUES
('Courchevelles', 5, 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `troncon`
--

CREATE TABLE `troncon` (
  `CodT` int(11) NOT NULL,
  `CodA` int(11) DEFAULT NULL,
  `CodeS1` int(11) DEFAULT NULL,
  `CodeS2` int(11) NOT NULL,
  `DuKm` double DEFAULT NULL,
  `AuKm` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `troncon`
--

INSERT INTO `troncon` (`CodT`, `CodA`, `CodeS1`, `CodeS2`, `DuKm`, `AuKm`) VALUES
(5, 6, 1, 2, 433, 677);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `CodPo` int(11) NOT NULL,
  `CodS` int(11) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`CodPo`, `CodS`, `Nom`, `Type`) VALUES
(94, 1, 'Villejuif', 'ville');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`CodeSCA`);

--
-- Index pour la table `peage`
--
ALTER TABLE `peage`
  ADD PRIMARY KEY (`CodPe`),
  ADD UNIQUE KEY `CodT` (`CodT`),
  ADD UNIQUE KEY `CodeSCA` (`CodeSCA`);

--
-- Index pour la table `registre`
--
ALTER TABLE `registre`
  ADD PRIMARY KEY (`CodR`),
  ADD UNIQUE KEY `CodePe` (`CodePe`);

--
-- Index pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD PRIMARY KEY (`CodS`),
  ADD UNIQUE KEY `CodT_2` (`CodT`),
  ADD KEY `CodT` (`CodT`);

--
-- Index pour la table `troncon`
--
ALTER TABLE `troncon`
  ADD PRIMARY KEY (`CodT`),
  ADD UNIQUE KEY `CodeE` (`CodeS1`),
  ADD KEY `CodT` (`CodT`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`CodPo`),
  ADD UNIQUE KEY `CodS` (`CodS`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `peage`
--
ALTER TABLE `peage`
  ADD CONSTRAINT `peage_ibfk_1` FOREIGN KEY (`CodT`) REFERENCES `troncon` (`CodT`),
  ADD CONSTRAINT `peage_ibfk_2` FOREIGN KEY (`CodeSCA`) REFERENCES `entreprise` (`CodeSCA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `registre`
--
ALTER TABLE `registre`
  ADD CONSTRAINT `registre_ibfk_1` FOREIGN KEY (`CodePe`) REFERENCES `peage` (`CodPe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD CONSTRAINT `sortie_ibfk_1` FOREIGN KEY (`CodS`) REFERENCES `ville` (`CodS`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
