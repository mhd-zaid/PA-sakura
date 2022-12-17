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
-- Structure de la table `Theme`
--

CREATE TABLE `sakura_theme` (
  `Id` int(11) NOT NULL,
  `Background` varchar(255) DEFAULT NULL,
  `Font` varchar(255) DEFAULT NULL,
  `Font_Color` varchar(20) DEFAULT NULL,
  `Font_Size` int(11) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `Favicon` varchar(255) DEFAULT NULL,
  `Nav_Color` varchar(10) DEFAULT NULL,
  `Nav_Position` varchar(5) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Type`
--

CREATE TABLE `sakura_type` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `User`
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
  `Status` tinyint(3) NOT NULL DEFAULT 0,
  `Role` tinyint(3) NOT NULL DEFAULT 1,
  `Token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `sakura_article` (
  `Id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `Content` text DEFAULT NULL,
  `Slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Category`
--
ALTER TABLE `sakura_category`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_CategoryUserId` (`User_Id`);

--
-- Index pour la table `Chapter`
--
ALTER TABLE `sakura_chapter`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_ChapterMangaId` (`Manga_Id`);

--
-- Index pour la table `Comment`
--
ALTER TABLE `sakura_comment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_CommentUserId` (`User_Id`);

--
-- Index pour la table `Manga`
--
ALTER TABLE `sakura_manga`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_MangaCategoryId` (`Category_Id`);

--
-- Index pour la table `MangaPage`
--
ALTER TABLE `sakura_mangapage`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_MangaPageChapterId` (`Chapter_Id`);

--
-- Index pour la table `MangaType`
--
ALTER TABLE `sakura_mangatype`
  ADD KEY `Fk_MangaTypeMangaId` (`Manga_Id`),
  ADD KEY `Fk_MangaTypeTypeId` (`Type_Id`);

--
-- Index pour la table `Page`
--
ALTER TABLE `sakura_page`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Theme`
--
ALTER TABLE `sakura_theme`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Type`
--
ALTER TABLE `sakura_type`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_TypeUserId` (`User_Id`);

--
-- Index pour la table `User`
--
ALTER TABLE `sakura_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Category`
--
ALTER TABLE `sakura_category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Chapter`
--
ALTER TABLE `sakura_chapter`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Comment`
--
ALTER TABLE `sakura_comment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Manga`
--
ALTER TABLE `sakura_manga`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `MangaPage`
--
ALTER TABLE `sakura_mangapage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Page`
--
ALTER TABLE `sakura_page`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Theme`
--
ALTER TABLE `sakura_theme`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Type`
--
ALTER TABLE `sakura_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `sakura_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Category`
--
ALTER TABLE `sakura_category`
  ADD CONSTRAINT `Fk_CategoryUserId` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`);

--
-- Contraintes pour la table `Chapter`
--
ALTER TABLE `sakura_chapter`
  ADD CONSTRAINT `Fk_ChapterMangaId` FOREIGN KEY (`Manga_Id`) REFERENCES `Manga` (`Id`);

--
-- Contraintes pour la table `Comment`
--
ALTER TABLE `sakura_comment`
  ADD CONSTRAINT `Fk_CommentUserId` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`);

--
-- Contraintes pour la table `Manga`
--
ALTER TABLE `sakura_manga`
  ADD CONSTRAINT `Fk_MangaCategoryId` FOREIGN KEY (`Category_Id`) REFERENCES `Category` (`Id`);

--
-- Contraintes pour la table `MangaPage`
--
ALTER TABLE `sakura_mangapage`
  ADD CONSTRAINT `Fk_MangaPageChapterId` FOREIGN KEY (`Chapter_Id`) REFERENCES `Chapter` (`Id`);

--
-- Contraintes pour la table `MangaType`
--
ALTER TABLE `sakura_mangatype`
  ADD CONSTRAINT `Fk_MangaTypeMangaId` FOREIGN KEY (`Manga_Id`) REFERENCES `Manga` (`Id`),
  ADD CONSTRAINT `Fk_MangaTypeTypeId` FOREIGN KEY (`Type_Id`) REFERENCES `Type` (`Id`);

--
-- Contraintes pour la table `Type`
--
ALTER TABLE `sakura_type`
  ADD CONSTRAINT `Fk_TypeUserId` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
