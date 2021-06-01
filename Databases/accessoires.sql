-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 05 mai 2021 à 16:02
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessoires`
--

CREATE TABLE `accessoires` (
  `id` int(11) NOT NULL,
  `nom` varchar(155) COLLATE utf8_bin NOT NULL,
  `prix` double NOT NULL,
  `image` varchar(500) COLLATE utf8_bin NOT NULL,
  `vendeur` varchar(100) COLLATE utf8_bin NOT NULL,
  `type` int(100) NOT NULL,
  `qte` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `accessoires`
--

INSERT INTO `accessoires` (`id`, `nom`, `prix`, `image`, `vendeur`, `type`, `qte`) VALUES
(65, 'laisse', 15, 'laisse.png', 'AAAAB', 1, 200),
(66, 'collier', 12, 'collier.png', 'AAB', 2, 30),
(68, 'tapis', 23, '4.png', 'AAB', 2, 30),
(75, 'pot', 12, '1.png', 'ABC', 2, 11),
(79, 'ballon', 12, '9.png', 'A', 2, 20),
(93, 'croquette', 134, 'croquette.png', 'AAAAB', 2, 200);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accessoires`
--
ALTER TABLE `accessoires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accessoires`
--
ALTER TABLE `accessoires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accessoires`
--
ALTER TABLE `accessoires`
  ADD CONSTRAINT `accessoires_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
