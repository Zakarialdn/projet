-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 31 mai 2024 à 08:09
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `game_zakaria`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `content`, `user_id`, `created_at`) VALUES
(3, 'Hey ya !! ', NULL, 'Je fais juste un contenu de test', 1, '2024-04-30 14:33:08'),
(9, 'mortal combat', NULL, 'fqsf fbsdgb egsweg ', 4, '2024-05-30 08:18:17'),
(10, 'call of', NULL, 'zfghsdui hilgeiufgiugfie uqq', 4, '2024-05-30 08:23:22'),
(11, 'call of', NULL, 'aefd sdhg sdhe gsw', 4, '2024-05-30 08:24:43'),
(12, 'call of', NULL, 'tgesrg vseg ', 4, '2024-05-30 08:49:12'),
(13, '7 wonders', NULL, 'urhfhe uudheu dfudifudr fzdfsd', 4, '2024-05-30 09:14:09'),
(14, 'fifa', NULL, 'dfg sddgdfhgbdfgh s d seh', 4, '2024-05-30 09:31:27');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `article_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_name` varchar(100) NOT NULL,
  `genre_id` int NOT NULL,
  `release_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `game_name`, `genre_id`, `release_date`) VALUES
(1, 'Ho ho !', 1, '2024-04-30 16:18:51');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Aventure');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','regular') NOT NULL DEFAULT 'regular',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Zakaria', 'zakaria@gmail.com', '1234', 'admin'),
(2, 'zakariaaa', 'OUBA12@LIVE.FR', '$2y$10$4BaRDlbUcxctBZsZnFizreAsC0GiQpcpRTzAlBgwROEbEY74aIAvq', 'admin'),
(3, 'stone', 'stone123@live.fr', '$2y$10$WTAyjtEAWUBS595VZA1x3O/JCgs584dTz2Fh2cIidu11LXUqlsdfG', 'admin'),
(4, 'zizou', 'zizou10@gmail.com', '$2y$10$UjwQ67BqPFSQU/l9z1OzMeVxk237lIRfcYMesptkTdhBNvztrlKrC', 'admin'),
(7, 'zako', 'zako00@live.com', '$2y$10$7sgrSrqijEsb7PV6yS5OfeOOQQEjTC6OaSJq5gukHfPwyABF8vWqu', 'admin'),
(8, 'zaky', 'zaky44@mail.fr', '$2y$10$/6xUtH2qRk16xcEY.SnIf.WNzjz3gyt4/D3W5JLjzl.fRebyI.4qS', 'admin'),
(9, 'zaire', 'zaire12@mail.fr', '$2y$10$uboKG.rm77iiH/aoKjjAI.nhvMKeTK1YtMYYA8EWdFTtja4pctZrC', 'admin'),
(10, 'azerty', 'azerty10@live.fr', '$2y$10$hTLAV0LF4xytHm3FG0jkkeTumCR08GR9ngQ5G6ofgu098EpqWUggG', 'admin'),
(11, 'pat', 'pat12@live.fr', '$2y$10$saj9iiTFaQ6STxDvfxVDD.TheaOdXyMA7i3aSVbaPHWq6HCybfs.u', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
