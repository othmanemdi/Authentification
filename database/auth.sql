-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 sep. 2023 à 01:15
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `auth`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hind', 'hind@gmail.com', '123456', '2023-09-12 00:01:13', NULL, NULL),
(2, 'nabila', 'nabila@gmail.com', '123456', '2023-09-12 00:04:43', NULL, NULL),
(3, 'maryam', 'maryam@gmail.com', '123456', '2023-09-12 00:04:55', NULL, NULL),
(4, 'Youssra', 'youssra@gmail.com', '123456', '2023-09-12 00:05:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_historique`
--

CREATE TABLE `user_historique` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_connected` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_historique`
--

INSERT INTO `user_historique` (`id`, `user_id`, `date_connected`, `ip`) VALUES
(1, 2, '2023-09-12 00:08:22', '127.0.0.1'),
(2, 4, '2023-09-12 00:08:37', '127.0.0.1'),
(3, 1, '2023-09-12 00:08:54', '127.0.0.1'),
(4, NULL, '2023-09-12 00:10:03', '127.0.0.1'),
(5, NULL, '2023-09-12 00:10:45', '127.0.0.1');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_user_historique`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `view_user_historique` (
`user_id` int(11)
,`nom` varchar(255)
,`email` varchar(255)
,`date_connected` datetime
,`ip` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la vue `view_user_historique`
--
DROP TABLE IF EXISTS `view_user_historique`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_historique`  AS SELECT `u`.`id` AS `user_id`, `u`.`nom` AS `nom`, `u`.`email` AS `email`, `uh`.`date_connected` AS `date_connected`, `uh`.`ip` AS `ip` FROM (`user_historique` `uh` left join `users` `u` on(`u`.`id` = `uh`.`user_id`))  ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_historique`
--
ALTER TABLE `user_historique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user_historique`
--
ALTER TABLE `user_historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user_historique`
--
ALTER TABLE `user_historique`
  ADD CONSTRAINT `user_historique_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
