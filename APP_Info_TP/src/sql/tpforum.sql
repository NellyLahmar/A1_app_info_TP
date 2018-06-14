-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 juin 2018 à 09:56
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tpforum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'TP'),
(2, 'APP');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `personne` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `date`, `personne`, `categorie`) VALUES
(3, 'azerty', '2018-05-26', 'a', 'TP'),
(4, 'azerty', '2018-06-01', 'login', 'u'),
(5, 'azerty', '2018-06-01', 'a', 'j'),
(6, 'azerty', '2018-06-01', 'a', 't'),
(7, 'azerty', '2018-06-01', 'a', 'u');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `login`, `password`) VALUES
(35, 'aa', 'a', 'aa', '$2y$10$EAM2ewkUDI0NumZs1Odsk.LrPebVQncJ7n/X7GiLoQxa/Lt5TDYBy'),
(34, 'm', 'm', 'm', '$2y$10$dbCPqsj6kq7UbbXTeq7aI.d1nUqIuVLhyTNc6LOKNK4ijlcwU14Yq'),
(33, 'o', 'o', 'o', '$2y$10$OrBbhFcfEf2G1s1Ba.u06OnTeSYug03eHiYVTg/AsWFtjk86/f.BC'),
(32, 'i', 'i', 'i', '$2y$10$LMsT/XvNxcGnfG/DIzNqcOjoeoaTwLQymf1CzVumkwZ0VRwLKLakW'),
(31, 'u', 'u', 'u', '$2y$10$.NpaubcepOV7J9oLT9xxduK3/xBj53Wdi412yxF1g0ccIEKs/kTQy'),
(30, 'y', 'y', 'y', '$2y$10$NK0Bo89EyHMCh3AVX/ol3Obdf5KGoukAVi4zYebTA1ngNv../z5Ja'),
(29, 't', 't', 't', '$2y$10$Yr2/EfggJnorynd1u2zZSOOTscrTL3RRphpno2Un0/LgVIbvTDidS'),
(28, 'r', 'r', 'r', '$2y$10$9NoOaPz1utApf3/CHRoZLuUcXOZaWQ2eZ5ZXRmZQqFApwiCH96F0q'),
(27, 'e', 'e', 'e', '$2y$10$Epp6TtI8DiII.9EeDivgOezPszqjhI/k4ySspxNPM2rDpJr9pP2oO'),
(26, 'z', 'z', 'z', '$2y$10$Zt5YjbBSd895OEuv7rynbuRkiritTx9CYvqunMjuegsyHm4.PQHsC'),
(25, 'a', 'a', 'a', '$2y$10$2HuVKuIBLnaC0/OIjPx8/etFAQLwvE9oFHQHTDRMysgEoncMdQB3u');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
