-- SQLBook: Code
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : mer. 26 oct. 2022 à 14:09
-- Version du serveur : 5.7.38
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sakura`
--

-- --------------------------------------------------------
--
-- Structure de la table `Site`
--
CREATE TABLE `sakura_site` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Structure de la table `Category`
--

CREATE TABLE `sakura_category` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Chapter`
--

CREATE TABLE `sakura_chapter` (
  `Id` int(11) NOT NULL,
  `Manga_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Comment`
--

CREATE TABLE `sakura_comment` (
  `Id` int(11) NOT NULL,
  `Content` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL,
  `Nbr_Signalement` int(11) NOT NULL,
  `Article_Id` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Manga`
--

CREATE TABLE `sakura_manga` (
  `Id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Cover` varchar(255) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `MangaPage`
--

CREATE TABLE `sakura_mangapage` (
  `Id` int(11) NOT NULL,
  `Chapter_Id` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `MangaType`
--

CREATE TABLE `sakura_mangatype` (
  `Manga_Id` int(11) NOT NULL,
  `Type_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Page`
--

CREATE TABLE `sakura_page` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text,
  `Active` tinyint(1) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Description` text,
  `Date_publi` date NOT NULL,
  `Date_modif` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sakura_user`
--

CREATE TABLE `sakura_user` (
  `Id` int(11) NOT NULL,
  `Firstname` varchar(25) DEFAULT NULL,
  `Lastname` varchar(70) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Status` tinyint(3) NOT NULL DEFAULT '0',
  `Role` tinyint(3) NOT NULL DEFAULT '1',
  `Token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sakura_user`
--

INSERT INTO `sakura_user` (`Id`, `Firstname`, `Lastname`, `Email`, `Password`, `Status`, `Role`, `Token`) VALUES
(1, 'Makan', 'KAMISSOKO', 'makan.kamissoko@hotmail.fr', '$2a$12$WlDnoGROaol0bdKUe5cxJOBX2BFJPsewOXo12nIeEIy02Bm/Wacvq', 1, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.WyJNYWthbiIsIktBTUlTU09LTyIsIm1ha2FuLmthbWlzc29rb0Bob3RtYWlsLmZyIl0=.cd610801d0dcf3f3461412ef80f026e5037a7b70f3f6c0b6f656099c1d485697'),
(2, 'Daniel', 'CASANOVA', 'dcasanova@gmail.com', '$2a$12$RdIcrj/Rz8m5iLxyWIg0ZOCSqYn36DkfWZHGsOh/VWWB182NNbQ/6', 1, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.WyJEYW5pZWwiLCJDYXNhbm92YSIsImRjYXNhbm92YUBnbWFpbC5jb20iXQ==.ee1aaf47f36c079ab5ca2aa721650dcb1dc7e2b8574e97761381698f348a2d92'),
(3, 'Emile', 'Zola', 'ezola@outlook.com', '$2a$12$UkWyr98z4X60pUx8dsXdKOREuuHegCViXC3uTULaxlz90KVSQR2iy', 0, 2, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sakura_user`
--
ALTER TABLE `sakura_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sakura_user`
--
ALTER TABLE `sakura_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
