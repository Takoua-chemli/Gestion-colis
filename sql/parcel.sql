-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 mars 2024 à 22:04
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parcel`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(30) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `reciever` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `reciever`, `message`, `date_created`) VALUES
(1, 'admin', '9', 'hello ', '0000-00-00 00:00:00'),
(2, '4', '9', 'hello ', '0000-00-00 00:00:00'),
(3, '9', '3', 'hello ', '0000-00-00 00:00:00'),
(4, '2', 'admin', 'hello admin tony', '2021-02-12 08:05:54');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(30) NOT NULL,
  `name` varchar(300) NOT NULL,
  `date_created` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `name`, `date_created`) VALUES
(1, 'TUNIS', '28-01-21 @ 10:32 PM'),
(2, 'SOUSSE', '30-01-21 @ 3:38 PM');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`, `date_created`) VALUES
(1, 'admin', 'admin@yahoo.fr', '123456', 1, '2024-01-30 14:57:12'),
(4, 'ahmed ahmed', 'client@yahoo.fr', '123456', 3, '2024-01-30 21:00:51'),
(9, 'livreur', 'livreur@yahoo.fr', '123456', 2, '2024-02-09 19:02:00');

-- --------------------------------------------------------

--
-- Structure de la table `parcel`
--

CREATE TABLE `parcel` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `type` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `destination_from` varchar(200) NOT NULL,
  `destination_to` varchar(200) NOT NULL,
  `current_location` varchar(200) NOT NULL,
  `reciever` int(2) NOT NULL,
  `payment_ref` varchar(200) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `delivery_status` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcel`
--

INSERT INTO `parcel` (`id`, `user_id`, `type`, `qty`, `charge`, `destination_from`, `destination_to`, `current_location`, `reciever`, `payment_ref`, `payment_status`, `delivery_status`, `date_created`) VALUES
(1, '9', 'BAG', 4, 2000, 'tunis', 'jendouba', 'manouba', 12, '#ref-100221-68891', 1, 1, '2021-02-10 07:40:00'),
(3, '2', 'BAG', 4, 2000, 'tunis', 'jendouba', 'manouba', 9, '#ref-100221-68891', 0, 1, '2021-02-10 07:40:00'),
(4, '9', 'CARTON', 7, 4000, 'tunis', 'jendouba', 'manouba', 12, '#ref-120221-91414', 0, 0, '2021-02-12 07:19:47'),
(5, '9', 'BAG', 9, 18000, 'tunis', 'jendouba', 'manouba', 2, '#ref-120221-48625', 0, 0, '2021-02-12 07:44:57'),
(6, '12', 'CARTON', 2, 8000, 'tunis', 'jendouba', 'manouba', 9, '#ref-120221-61459', 1, 1, '2021-02-12 19:20:11'),
(7, '9', 'BAG', 2, 4000, 'tunis', 'jendouba', 'manouba', 2, '#ref-160221-24711', 0, 0, '2021-02-16 17:08:45'),
(8, '9', 'BAG', 6, 12000, 'tunis', 'jendouba', 'manouba', 9, '#ref-160221-4146', 0, 0, '2021-02-16 18:22:41'),
(9, '12', 'CARTON (10-30g)', 7, 49000, 'tunis', 'jendouba', 'manouba', 2, '#ref-230221-73875', 1, 1, '2021-02-23 00:42:57');

-- --------------------------------------------------------

--
-- Structure de la table `route`
--

CREATE TABLE `route` (
  `id` int(30) NOT NULL,
  `destination_from` varchar(200) NOT NULL,
  `destination_to` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `date_created` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `route`
--

INSERT INTO `route` (`id`, `destination_from`, `destination_to`, `type`, `price`, `date_created`) VALUES
(2, 'manouba', 'jendouba', 'BAG', '2000', '09-02-21 @ 6:59 PM'),
(3, 'manouba', 'jendouba', 'CARTON', '8000', '09-02-21 @ 6:59 PM'),
(4, 'manouba', 'jendouba', 'CARTON', '4000', '12-02-21 @ 7:13 PM'),
(5, 'manouba', 'jendouba', 'CARTON (10-30g)', '7000', '23-02-21 @ 12:41 AM');

-- --------------------------------------------------------

--
-- Structure de la table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(30) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `start_point` varchar(200) NOT NULL,
  `end_point` varchar(200) NOT NULL,
  `location_desc` varchar(200) NOT NULL,
  `date_created` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `supervisor`
--

INSERT INTO `supervisor` (`id`, `fullname`, `address`, `gender`, `phone`, `email`, `password`, `location`, `start_point`, `end_point`, `location_desc`, `date_created`) VALUES
(1, 'ahmed', 'tunis', 'male', '23000111', 'j@j.com', '123456', 'tunis', 'manouba', 'jendouba', 'centre ville', '10-02-21 @ 10:13 AM'),
(2, 'ali', 'sousse', 'female', '23000112', 't@t.com', '123456', 'tunis', 'manouba', 'jendouba', 'centre ville', '11-02-21 @ 9:29 PM'),
(3, 'oussema', 'ariena', 'female', '23000113', 'w@w.com', '123456', 'tunis', 'manouba', 'jendouba', 'centre ville', '12-02-21 @ 7:12 PM');

-- --------------------------------------------------------

--
-- Structure de la table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `fullname` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `payment_ref` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_created` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `fullname`, `address`, `gender`, `phone`, `email`, `password`, `date_created`) VALUES
(2, 'oussema', 'London', 'male', '08136473738', 'g@g.com', '123456', '28-01-21 @ 10:29 PM'),
(9, 'ahmed', 'London', 'male', '08136473738', 'p@p.com', '123456', '28-01-21 @ 10:29 PM'),
(12, 'hana', 'London', 'female', '08136473738', 'i@i.com', '123456', '12-02-21 @ 7:18 PM');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
