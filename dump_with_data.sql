-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : lun. 07 nov. 2022 à 20:37
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
-- Structure de la table `sakura_article`
--

CREATE TABLE `sakura_article` (
  `Id` int(11) NOT NULL,
  `Content` text,
  `Slug` varchar(50) DEFAULT NULL,
  `User_Id` int(11) NOT NULL,
  `Image_Name` varchar(50) NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sakura_article`
--

INSERT INTO `sakura_article` (`Id`, `Content`, `Slug`, `User_Id`, `Image_Name`, `Active`) VALUES
(1, '<p>Unspecified atherosclerosis of autologous vein bypass graft(s) of the extremities, other extremity. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel libero nec metus lobortis commodo. Suspendisse id maximus metus, ut cursus nunc. Nullam at libero eleifend, convallis lectus id, elementum lorem. Nulla augue tellus, facilisis id ultricies et, fringilla ut erat. Pellentesque et rhoncus arcu. Vivamus ac est pulvinar nisi fermentum consequat eu a massa. Aenean malesuada quam eget nulla pharetra finibus. Vestibulum mollis malesuada nulla, quis cursus neque maximus non. Morbi eu luctus massa.</p>\r\n', ' Double Indemnity', 1, '1619049326.png', 1),
(2, '<h1>Other</h1> fracture of shaft of unspecified ulna, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with routine healing.\r\n\r\nVestibulum vitae aliquam mi. Integer et dui a eros efficitur ultrices id vitae erat. Phasellus felis mi, gravida id erat tristique, pulvinar hendrerit elit. Ut id quam sed orci laoreet tincidunt. Morbi ut pharetra nisi. Quisque ornare, enim a fermentum tempor, tortor nulla vulputate massa, quis volutpat sem libero feugiat neque. Nulla eget dolor vitae risus euismod gravida. Vivamus sit amet est ut turpis tincidunt auctor sed eget augue.\r\n\r\n', 'Rage', 1, '', 0),
(3, 'Pathological fracture, unspecified shoulder, subsequent encounter for fracture with malunion.\r\n\r\nDonec in molestie lectus, a placerat nunc. Sed quis tincidunt turpis, at gravida nisl. Vestibulum pulvinar malesuada leo, eu vulputate lectus cursus sed. Vivamus id imperdiet massa, vel rhoncus magna. Phasellus a odio eu urna varius venenatis eget vitae leo. In hac habitasse platea dictumst. Curabitur rhoncus rhoncus ex, eu tincidunt ipsum mattis sed. Proin fringilla lectus nunc, sed consequat metus malesuada sit amet. Suspendisse elementum arcu in nulla convallis ornare. Aenean mauris arcu, molestie a augue ac, maximus vulputate ex. Nunc dignissim consequat lorem quis feugiat. In non elit euismod, maximus neque ac, ullamcorper libero. Nam commodo sit amet magna et vestibulum. Nam at sollicitudin nulla.\r\n\r\n', 'Revenge of the Nerds II: Nerds in Paradise', 1, '', 0),
(4, 'Diffuse large B-cell lymphoma, spleen.\r\n\r\nEtiam vulputate ipsum non quam auctor, et vulputate ante mollis. Proin tempor augue id orci elementum, eu euismod libero vulputate. Cras eu malesuada odio, sit amet scelerisque libero. Etiam sapien mi, ullamcorper ac leo eget, congue vehicula est. Maecenas a ex et sapien semper pulvinar. Morbi vel mollis neque, sit amet hendrerit ligula. Aenean vehicula justo tempus, luctus libero id, varius metus.\r\n', 'Mother of Mine (Aideista parhain)', 3, '', 0),
(5, 'Other psychoactive substance dependence with psychoactive substance-induced psychotic disorder with hallucinations.\r\n\r\nDonec ac pulvinar magna, ut imperdiet leo. Ut at neque at enim fermentum fermentum. Phasellus congue nisi nec massa vulputate bibendum. Phasellus vulputate congue lacus, at dapibus purus malesuada vel. Pellentesque id tellus vel sapien ultrices finibus. Donec congue nisi gravida vestibulum dignissim. Proin interdum, libero ac finibus euismod, dolor lectus condimentum massa, vitae tempus libero nibh at ligula. Suspendisse ac arcu eu nulla hendrerit tincidunt in ac odio. Morbi quis venenatis leo. Aliquam varius, mauris porta luctus placerat, odio eros dapibus enim, et ornare urna nisl ac leo. Phasellus nisi risus, convallis suscipit semper vitae, facilisis a neque. Aenean ex felis, condimentum iaculis tincidunt sodales, sagittis eu urna.\r\n\r\n', 'The Amazing Catfish', 2, '', 0),
(6, '<h2>Insect bite (nonvenomous) of left ring finger, initial encounter. Nulla risus dolor, fringilla nec ornare non, tincidunt vitae nisl. In congue quam a magna malesuada cursus. Donec molestie, sapien a tristique suscipit, elit mauris mattis nisl, porta aliquet ante sem vel metus. Pellentesque cursus sit amet magna eget dapibus. Duis molestie odio non blandit interdum. Morbi urna turpis, pulvinar vel justo at, pellentesque placerat enim. Mauris et venenatis leo. Suspendisse potenti.</h2>', 'Gift,', 1, '', 0),
(7, 'Assault by hot tap water, initial encounter.\r\n\r\nSed eget euismod lectus. Vestibulum tristique sem orci, vitae rutrum urna consectetur id. Morbi consectetur leo sed magna auctor pretium. Nulla suscipit lorem sit amet felis dictum congue eget non dui. Ut neque urna, ullamcorper nec iaculis vel, auctor eget lacus. Aliquam non semper velit, id tincidunt diam. Praesent fermentum felis a vehicula condimentum. Proin eget turpis metus. Sed pharetra nibh id erat feugiat, ac vulputate sapien venenatis. Phasellus sit amet ante dolor. Pellentesque ultrices sapien eu nibh elementum lacinia. Donec lobortis neque vitae egestas viverra. Quisque lacinia, sapien ac ultricies pretium, odio lacus placerat nisl, sed hendrerit velit nulla sit amet urna.\r\n\r\n', 'Billy Blazes', 2, '', 0),
(8, 'Displaced unspecified fracture of left great toe, subsequent encounter for fracture with malunion.\r\n\r\nVivamus scelerisque vehicula nunc, a consequat purus varius vitae. Pellentesque a augue id ex fringilla molestie. Aliquam vitae eros lectus. Donec blandit rutrum faucibus. Cras sit amet imperdiet metus, at convallis odio. Nunc vel lobortis turpis. Morbi ac magna eu diam convallis pharetra at mollis augue.\r\n\r\n', 'Holy Rollers', 3, '', 0),
(9, 'Nondisplaced intertrochanteric fracture of right femur, initial encounter for open fracture type I or II.\r\n\r\nPraesent a libero at lorem iaculis porta ac quis ipsum. Cras quis metus aliquam felis sagittis auctor. Donec eleifend libero nec rhoncus fringilla. Nunc eu libero in metus sollicitudin sagittis vitae vel nibh. Vestibulum rutrum nibh ac magna posuere, vitae consequat nunc dictum. Pellentesque porta semper eros nec dignissim. Nulla nec feugiat quam. Nam porttitor accumsan nisi, vitae posuere est rhoncus blandit. Cras rutrum velit id augue volutpat pellentesque. Morbi nec diam vestibulum, fringilla dolor a, condimentum est. Curabitur condimentum, eros non sodales iaculis, lectus purus convallis est, vitae molestie nulla augue sed mauris. Curabitur tristique lorem at maximus bibendum. Integer ac commodo sem.\r\n\r\n', 'East of Eden', 3, '', 0),
(10, 'Traumatic rupture of unspecified ligament of unspecified finger at metacarpophalangeal and interphalangeal joint, sequela.\r\n\r\nInteger posuere ac justo ac mollis. In a lorem sit amet quam bibendum auctor. Aenean consectetur, elit eu maximus lobortis, enim enim rutrum sem, eu fringilla enim orci sit amet turpis. In molestie volutpat dignissim. Vivamus non lectus tellus. Nunc lectus tellus, luctus et augue non, tempor tempor tortor. Maecenas fermentum ut urna sit amet dictum.\r\n\r\n', 'Counterfeit Traitor', 3, '', 0),
(11, 'Underdosing of unspecified psychodysleptics, initial encounter.\r\n\r\nAliquam massa nisi, vehicula id pulvinar at, facilisis vel nisi. Pellentesque urna lorem, sodales eget ex vel, rhoncus dignissim lectus. Maecenas bibendum fringilla nunc nec volutpat. Donec augue enim, finibus a sapien in, consectetur euismod enim. Pellentesque vitae nibh finibus, feugiat tellus eget, commodo tellus. Phasellus vel auctor mi. Sed posuere porttitor tellus, eu dictum mauris semper vitae. Aenean interdum condimentum mattis. Vestibulum sagittis, ligula nec pharetra tincidunt, sapien magna consequat tellus, non auctor purus sem at lacus.\r\n\r\n', 'Heart of America', 3, '', 0),
(12, 'Sprain of joints and ligaments of unspecified parts of head, sequela.\r\n\r\nDuis et elementum arcu. Morbi finibus sit amet nulla sit amet euismod. Praesent velit quam, laoreet id leo id, lacinia volutpat augue. Quisque suscipit nulla eu mattis dapibus. Quisque elementum purus libero, et consectetur elit pretium et. Aenean at lacinia justo, at hendrerit lorem. Integer a ex in orci consectetur scelerisque et a ligula. Quisque pharetra vel lorem sed pharetra. Nunc molestie urna odio, vitae malesuada nulla malesuada eu.\r\n\r\n', 'Bordertown', 1, '', 0),
(13, '<p>Unstable burst fracture of unspecified thoracic vertebra, sequela. Donec maximus auctor libero, et convallis nunc cursus sed. Proin quis turpis nisi. In id orci a augue vulputate iaculis ac ac ligula. Phasellus dui augue, iaculis in interdum in, tempus vitae enim. Sed tincidunt suscipit arcu, eget fringilla arcu tristique vitae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse congue lobortis nulla, quis ultricies erat porta a. Integer dictum nisi sem, in faucibus orci maximus eu. Pellentesque nec leo vitae lorem aliquam fringilla.</p>', '  Jodorowsky\'s Dune', 1, '', 0),
(14, 'Smith\'s fracture of right radius, subsequent encounter for open fracture type I or II with nonunion.\r\n\r\nDonec suscipit pretium convallis. Nam lacinia nulla sollicitudin, auctor sapien eu, porta purus. Maecenas quis congue lacus. Mauris mollis diam a laoreet dictum. Integer laoreet interdum leo at consequat. Donec magna turpis, aliquet eu lorem vitae, egestas faucibus metus. Morbi et faucibus arcu. Curabitur feugiat mattis congue. Sed fringilla sit amet nulla at tempus. Nam vitae vulputate dui.\r\n\r\n', 'Men of Honor', 3, '', 0),
(15, 'Unspecified deformity of right finger(s).\r\n\r\nNulla eget massa vel erat blandit placerat in non ex. Mauris eu imperdiet sem, sed vehicula turpis. Suspendisse mattis pretium velit. Etiam enim tellus, egestas ac rutrum at, vestibulum eget enim. Fusce bibendum mattis elit et viverra. Morbi urna turpis, lobortis vel condimentum et, tincidunt quis arcu. Morbi vitae vehicula nisi, et imperdiet enim. Aliquam nec quam porta, rutrum diam ut, lobortis elit. Morbi nisl velit, porta nec massa quis, iaculis sagittis lorem. Praesent sollicitudin ac justo non tempus. Morbi ut quam eget ex luctus sollicitudin. Proin id velit ex. Nullam neque odio, dignissim eget metus quis, lacinia dictum dolor.\r\n\r\n', 'Jamaica Inn', 1, '', 0),
(16, 'Periprosthetic osteolysis of unspecified internal prosthetic joint, initial encounter.\r\n\r\nOrci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec pretium, mi quis egestas tempus, turpis nunc lobortis odio, eget vulputate ante neque ac turpis. Curabitur pellentesque lacinia tincidunt. Cras eget mauris ac neque tempus pulvinar. Nam tempus felis est. Cras tristique tellus diam, non iaculis metus pretium et. Suspendisse dignissim consequat ultricies.\r\n\r\n', 'Blue Streak', 1, '', 0),
(17, 'Burn of second degree of unspecified ear [any part, except ear drum], subsequent encounter.\r\n\r\nProin quis interdum neque, eget venenatis arcu. Nulla tincidunt dui sed dignissim faucibus. Pellentesque condimentum, nibh in placerat gravida, felis dolor sodales arcu, vel posuere sem orci vel dui. Quisque sit amet eleifend tortor. Nunc posuere augue id luctus vulputate. Nam sem nisl, volutpat tincidunt volutpat a, imperdiet eget ligula. Vivamus nec malesuada purus.\r\n\r\n', 'Addiction', 1, '', 0),
(18, 'Toxic effect of other specified inorganic substances, assault.\r\n\r\nUt quis pharetra elit, eu pellentesque nisl. Duis finibus ex orci, ac pulvinar erat placerat et. Phasellus sed tempor neque, et vestibulum sapien. Nulla facilisi. In non sapien tempus, dictum enim quis, gravida tellus. Praesent sodales, augue ut interdum congue, erat tellus fermentum lectus, a fermentum lectus justo eget turpis. Etiam eu risus feugiat, finibus mauris ac, porttitor dui. Nam vitae lobortis turpis. Vestibulum id eros nec neque rutrum porta a aliquam magna. Nam commodo, mi at ornare vestibulum, ipsum leo aliquet turpis, vel finibus sem tortor sed leo. Proin eu turpis efficitur, porttitor metus sed, vulputate sem. Aenean malesuada sagittis sapien ac tristique. Vestibulum semper efficitur nisl, fermentum placerat arcu finibus non. Aliquam quis consectetur odio.\r\n\r\n', 'Sins', 2, '', 0),
(19, 'Unspecified open wound of cheek and temporomandibular area\r\n\r\nInteger sed dolor est. Proin auctor, ante venenatis consequat ornare, nisl purus tincidunt velit, non laoreet ex leo eget purus. Praesent vitae sollicitudin dolor. Suspendisse faucibus dolor ut mi facilisis porta. In mollis auctor velit, varius pellentesque ligula porta in. Ut vitae justo nec diam ultricies lacinia. Quisque pharetra facilisis nibh, at rhoncus justo fermentum at. Sed id venenatis lectus, vel luctus justo. Nam pharetra rhoncus odio, non ultricies arcu imperdiet ornare. Pellentesque lacus nunc, feugiat ut vehicula vel, euismod vel nisl. Sed ornare gravida ante, in laoreet enim efficitur non. Quisque nulla felis, sollicitudin eu ipsum ac, euismod finibus nulla.\r\n', 'Hot Spot', 1, '', 0),
(20, 'Pedestrian on skateboard injured in collision with heavy transport vehicle or bus, unspecified whether traffic or nontraffic accident, sequela.\r\n\r\n\r\nInteger quis gravida justo. Praesent purus nibh, congue eu pharetra ut, mattis at est. Quisque ultricies tempor justo. Nunc vitae orci porta, lacinia elit in, feugiat nunc. Morbi accumsan arcu odio, et tincidunt nulla ultrices vitae. Pellentesque erat sapien, tempor vitae aliquet vel, gravida et dolor. Praesent vitae diam accumsan neque mattis aliquam quis sit amet dui. Vestibulum luctus nec est ac tristique. Maecenas ultrices elit id augue iaculis convallis.', 'Night Mother', 3, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sakura_category`
--

CREATE TABLE `sakura_category` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sakura_chapter`
--

CREATE TABLE `sakura_chapter` (
  `Id` int(11) NOT NULL,
  `Manga_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sakura_comment`
--

CREATE TABLE `sakura_comment` (
  `Id` int(11) NOT NULL,
  `Content` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL,
  `Nbr_Signalement` int(11) NOT NULL,
  `Article_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sakura_comment`
--

INSERT INTO `sakura_comment` (`Id`, `Content`, `Active`, `Nbr_Signalement`, `Article_Id`) VALUES
(1, 'Nouveau commentaire', 0, 5, 1),
(2, 'Commentaire', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sakura_manga`
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
-- Structure de la table `sakura_mangapage`
--

CREATE TABLE `sakura_mangapage` (
  `Id` int(11) NOT NULL,
  `Chapter_Id` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sakura_mangatype`
--

CREATE TABLE `sakura_mangatype` (
  `Manga_Id` int(11) NOT NULL,
  `Type_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sakura_menu`
--

CREATE TABLE `sakura_menu` (
  `Id` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Content` varchar(500) NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sakura_menu`
--

INSERT INTO `sakura_menu` (`Id`, `Title`, `Content`, `Active`) VALUES
(1, 'Menu principal', 'Accueil,Qui sommes-nous?,Fonctionnalite,Contact,Connexion', 0),
(2, 'Menu sakura', 'Commentaires,Medias,Articles,Pages', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sakura_page`
--

CREATE TABLE `sakura_page` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sakura_site`
--

CREATE TABLE `sakura_site` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sakura_theme`
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
-- Structure de la table `sakura_type`
--

CREATE TABLE `sakura_type` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
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
-- Index pour la table `sakura_article`
--
ALTER TABLE `sakura_article`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `sakura_category`
--
ALTER TABLE `sakura_category`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_CategoryUserId` (`User_Id`);

--
-- Index pour la table `sakura_chapter`
--
ALTER TABLE `sakura_chapter`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_ChapterMangaId` (`Manga_Id`);

--
-- Index pour la table `sakura_comment`
--
ALTER TABLE `sakura_comment`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `sakura_manga`
--
ALTER TABLE `sakura_manga`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_MangaCategoryId` (`Category_Id`);

--
-- Index pour la table `sakura_mangapage`
--
ALTER TABLE `sakura_mangapage`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_MangaPageChapterId` (`Chapter_Id`);

--
-- Index pour la table `sakura_mangatype`
--
ALTER TABLE `sakura_mangatype`
  ADD KEY `Fk_MangaTypeMangaId` (`Manga_Id`),
  ADD KEY `Fk_MangaTypeTypeId` (`Type_Id`);

--
-- Index pour la table `sakura_menu`
--
ALTER TABLE `sakura_menu`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `sakura_page`
--
ALTER TABLE `sakura_page`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `sakura_theme`
--
ALTER TABLE `sakura_theme`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `sakura_type`
--
ALTER TABLE `sakura_type`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Fk_TypeUserId` (`User_Id`);

--
-- Index pour la table `sakura_user`
--
ALTER TABLE `sakura_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sakura_article`
--
ALTER TABLE `sakura_article`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `sakura_category`
--
ALTER TABLE `sakura_category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sakura_chapter`
--
ALTER TABLE `sakura_chapter`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sakura_comment`
--
ALTER TABLE `sakura_comment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sakura_manga`
--
ALTER TABLE `sakura_manga`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sakura_mangapage`
--
ALTER TABLE `sakura_mangapage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sakura_menu`
--
ALTER TABLE `sakura_menu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sakura_page`
--
ALTER TABLE `sakura_page`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sakura_theme`
--
ALTER TABLE `sakura_theme`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sakura_type`
--
ALTER TABLE `sakura_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sakura_user`
--
ALTER TABLE `sakura_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
