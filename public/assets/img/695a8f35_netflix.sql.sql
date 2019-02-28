-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le :  mar. 19 fév. 2019 à 10:51
-- Version du serveur :  5.6.43
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `netflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`id`, `name`, `firstname`, `birthday`) VALUES
(1, 'Pacino', 'Al', '1940-04-25'),
(2, 'Brando', 'Marlon', '1924-04-03'),
(3, 'de Niro', 'Robert', '1943-08-17'),
(4, 'Willis', 'Bruce', '1955-03-19'),
(5, 'Liotta', 'Ray', '1954-12-18'),
(6, 'Snipes', 'Wesley', '1962-07-31'),
(7, 'Stalone', 'Sylvester', '1946-07-06'),
(8, 'Norton', 'Edward', '1969-08-18'),
(9, 'Spacey', 'Kevin', '1959-07-26'),
(10, 'Kilmer', 'Val', '1959-12-31');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Film de gangsters'),
(2, 'Action'),
(3, 'Horreur'),
(4, 'Science-fiction'),
(5, 'Thriller'),
(6, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `name`, `date`, `description`, `category_id`) VALUES
(1, 'Le Parrain', '1972-01-01', 'Lorem ipsum', NULL),
(2, 'Scarface', '1983-01-01', 'Lorem ipsum', 1),
(3, 'Les Affranchis', '1990-01-01', 'Lorem ipsum', 1),
(4, 'Heat', '1995-01-01', 'Lorem ipsum', 1),
(5, 'Die Hard', '1988-01-01', 'Lorem ipsum', 2),
(6, 'Demolition Man', '1993-01-01', 'Lorem ipsum', 2),
(7, 'Taken', '2008-01-01', 'Lorem ipsum', 2),
(8, 'Deadpool', '2016-01-01', 'Lorem ipsum', 2),
(9, 'Expandable', '2010-01-01', 'Lorem ipsum', 2),
(10, 'Scream', '1996-01-01', 'Lorem ipsum', 3),
(11, 'Vendredi 13', '1980-01-01', 'Lorem ipsum', 3),
(12, 'Saw', '2005-01-01', 'Lorem ipsum', 3),
(13, 'Scary Movie', '2000-01-01', 'Lorem ipsum', 3),
(14, 'Star Wars IV Un nouvel espoir', '1977-01-01', 'Lorem ipsum', 4),
(15, 'Alien', '1979-01-01', 'Lorem ipsum', 4),
(16, 'ET', '1982-01-01', 'Lorem ipsum', 4),
(17, 'Robocop', '1987-01-01', 'Lorem ipsum', 4),
(18, 'The Game', '1997-01-01', 'Lorem ipsum', 5),
(19, 'Sixième Sens', '1999-01-01', 'Lorem ipsum', 5),
(20, 'Usual Suspects', '1995-01-01', 'Lorem ipsum', 5),
(21, 'Fight Club', '1999-01-01', 'Lorem ipsum', 5),
(22, 'Inception', '2010-01-01', 'Lorem ipsum', 5),
(23, 'Deadpool 2', '2019-02-19', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `movie_has_actor`
--

CREATE TABLE `movie_has_actor` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie_has_actor`
--

INSERT INTO `movie_has_actor` (`movie_id`, `actor_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 3),
(3, 5),
(4, 1),
(4, 3),
(4, 10),
(5, 4),
(6, 6),
(9, 7),
(19, 7),
(20, 9),
(21, 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_movie_category_idx` (`category_id`);

--
-- Index pour la table `movie_has_actor`
--
ALTER TABLE `movie_has_actor`
  ADD KEY `fk_movie_has_actor_actor1_idx` (`actor_id`),
  ADD KEY `fk_movie_has_actor_movie1_idx` (`movie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `fk_movie_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `movie_has_actor`
--
ALTER TABLE `movie_has_actor`
  ADD CONSTRAINT `fk_movie_has_actor_actor1` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movie_has_actor_movie1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
