-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 19 mars 2024 à 02:32
-- Version du serveur : 8.0.32
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `coment`
--

DROP TABLE IF EXISTS `coment`;
CREATE TABLE IF NOT EXISTS `coment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coment` text NOT NULL,
  `id_user` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `coment`
--

INSERT INTO `coment` (`id`, `coment`, `id_user`, `date`) VALUES
(1, 'Bonjour', 2, '2023-06-13 12:45:57'),
(2, 'rebonjour', 2, '2023-06-18 12:31:05'),
(3, 'rebonjour', 2, '2023-06-18 12:31:47'),
(4, 'test', 2, '2023-06-18 12:32:05'),
(5, 'ado', 3, '2023-06-19 10:22:25'),
(6, 'azerty', 9, '2023-06-29 10:40:07'),
(7, 'nice', 2, '2024-03-19 01:55:02');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', 'Infos2020@'),
(2, 'pPela', 'Pela1234@'),
(3, 'vivian', 'Vivian1234@'),
(4, 'Dd', 'Dene2020@'),
(8, 'laplate', 'Dene123@'),
(9, 'val', 'Val1234@');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `coment`
--
ALTER TABLE `coment`
  ADD CONSTRAINT `coment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
