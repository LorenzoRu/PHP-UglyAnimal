-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 21 mai 2022 à 10:00
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uglyAnimals`
--

-- --------------------------------------------------------

--
-- Structure de la table `Animals`
--

CREATE TABLE `Animals` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `summary` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `fav` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Animals`
--

INSERT INTO `Animals` (`id`, `name`, `summary`, `image`, `fav`) VALUES
(1, 'Pangolin', 'Recouvert d\'une armure d\'écailles et doté d\'une langue de plus de 40 cm de longueur, le pangolin est l\'un des mammifères les plus insolites du règne animal. Il porte ses petits sur son dos et, lorsqu\'il est menacé, il se roule en boule pour se protéger des prédateurs.', './public/img/pangolin.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Stats`
--

CREATE TABLE `Stats` (
  `type` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `HP` int(11) NOT NULL,
  `PC` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Stats`
--

INSERT INTO `Stats` (`type`, `level`, `HP`, `PC`, `animal_id`) VALUES
('Roche', 2, 15, 3, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Animals`
--
ALTER TABLE `Animals`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Stats`
--
ALTER TABLE `Stats`
  ADD PRIMARY KEY (`animal_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Animals`
--
ALTER TABLE `Animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Stats`
--
ALTER TABLE `Stats`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
