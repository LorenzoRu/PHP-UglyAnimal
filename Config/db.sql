-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 24 mai 2022 à 13:29
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
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `summary` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `Type` varchar(225) NOT NULL,
  `hp` int(11) NOT NULL,
  `pc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `name`, `summary`, `image`, `Type`, `hp`, `pc`) VALUES
(1, 'Pangolin', 'Recouvert d\'une armure d\'écailles et doté d\'une langue de plus de 40 cm de longueur, le pangolin est l\'un des mammifères les plus insolites du règne animal. Il porte ses petits sur son dos et, lorsqu\'il est menacé, il se roule en boule pour se protéger des prédateurs.', './public/img/pangolin.jpg', 'Roche', 4, 1),
(2, 'Blobfish', 'On trouve le blobfish à des profondeurs où la pression est près de cent fois supérieure à celle de la surface. Pour y résister, la chair du poisson est principalement constituée d’une masse gélatineuse3 dont la densité est plus faible que celle de l’eau, ce qui lui permet de flotter un peu au-dessus du plancher océanique sans avoir à dépenser sa précieuse énergie en nageant. Les cartilages de ce poisson sont également très légers.', '/public/img/blobfish.jpg', 'eau', 12, 0),
(3, 'Tapir', 'le tapir n\'est franchement pas très séduisant et il n\'a pas grand chose pour lui. Avec sa coupe de redneck et la plus petite trompe du règne animal. Chassé pour son cuir il n\'est bon qu\'à servir de tapis.', '/public/img/tapir.jpg', 'Roche', 122, 33);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `animal_id` int(11) NOT NULL,
  `type` varchar(225) NOT NULL,
  `strenth` varchar(225) NOT NULL,
  `weakness` varchar(225) NOT NULL,
  `affinity` varchar(225) NOT NULL,
  `enemy` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`animal_id`, `type`, `strenth`, `weakness`, `affinity`, `enemy`) VALUES
(1, '', 'Dragon', 'Glace', 'Dragon', 'Glace');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD KEY `animal_id` (`animal_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `test` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
