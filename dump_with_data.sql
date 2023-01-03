-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.38 - MySQL Community Server (GPL)
-- SE du serveur:                Linux
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour sakura
DROP DATABASE IF EXISTS `sakura`;
CREATE DATABASE IF NOT EXISTS `sakura` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sakura`;

-- Listage de la structure de table sakura. sakura_apparence
DROP TABLE IF EXISTS `sakura_apparence`;
CREATE TABLE IF NOT EXISTS `sakura_apparence` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Css` longtext NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_apparence : ~4 rows (environ)
INSERT INTO `sakura_apparence` (`Id`, `Css`, `Active`) VALUES
	(1, '.paragraph{\n	color:#000000;\n	font-family:impact\n}\n.titre{\n	color:#8582b0;\n	font-family:arial\n}\n.body{\n	background-color:#d05858\n}\n.nav{\n	color:#4b27b0\n}\n.header{\n	background-color:#ff00dd\n}\n.footer{\n	background-color:#ff0000}', 0),
	(2, 'electro', 0),
	(3, 'music', 1),
	(4, 'sakura', 0);

-- Listage de la structure de table sakura. sakura_article
DROP TABLE IF EXISTS `sakura_article`;
CREATE TABLE IF NOT EXISTS `sakura_article` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` text,
  `Slug` varchar(50) DEFAULT NULL,
  `User_Id` int(11) NOT NULL,
  `Image_Name` varchar(50) NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '0',
  `Description` varchar(255) DEFAULT NULL,
  `Rewrite_Url` int(11) NOT NULL DEFAULT '1',
  `Title` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `Date_Created` datetime DEFAULT CURRENT_TIMESTAMP,
  `Date_Updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_article : ~20 rows (environ)
INSERT INTO `sakura_article` (`Id`, `Content`, `Slug`, `User_Id`, `Image_Name`, `Active`, `Description`, `Rewrite_Url`, `Title`, `categories`, `Date_Created`, `Date_Updated`) VALUES
	(1, '<h1>What&#39;s Unspecified ?</h1>\r\n\r\n<p>Unspecified atherosclerosis of autologous vein bypass graft(s) of the extremities, other extremity. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel libero nec metus lobortis commodo. Suspendisse id maximus metus, ut cursus nunc. Nullam at libero eleifend, convallis lectus id, elementum lorem. Nulla augue tellus, facilisis id ultricies et, fringilla ut erat. Pellentesque et rhoncus arcu. Vivamus ac est pulvinar nisi fermentum consequat eu a massa. Aenean malesuada quam eget nulla pharetra finibus. Vestibulum mollis malesuada nulla, quis cursus neque maximus non. Morbi eu luctus massa.</p>\r\n', 'double-indemnity', 1, '', 1, ' DoubleIndemnity', 1, ' Double Indemnity', '', NULL, '2023-01-03 16:59:04'),
	(2, '<h1>Other</h1> fracture of shaft of unspecified ulna, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with routine healing.\r\n\r\nVestibulum vitae aliquam mi. Integer et dui a eros efficitur ultrices id vitae erat. Phasellus felis mi, gravida id erat tristique, pulvinar hendrerit elit. Ut id quam sed orci laoreet tincidunt. Morbi ut pharetra nisi. Quisque ornare, enim a fermentum tempor, tortor nulla vulputate massa, quis volutpat sem libero feugiat neque. Nulla eget dolor vitae risus euismod gravida. Vivamus sit amet est ut turpis tincidunt auctor sed eget augue.\r\n\r\n', 'rage', 1, 'UndefinedImage.jpg', 0, NULL, 1, 'Rage', '', NULL, '2023-01-03 16:44:35'),
	(3, 'Pathological fracture, unspecified shoulder, subsequent encounter for fracture with malunion.\r\n\r\nDonec in molestie lectus, a placerat nunc. Sed quis tincidunt turpis, at gravida nisl. Vestibulum pulvinar malesuada leo, eu vulputate lectus cursus sed. Vivamus id imperdiet massa, vel rhoncus magna. Phasellus a odio eu urna varius venenatis eget vitae leo. In hac habitasse platea dictumst. Curabitur rhoncus rhoncus ex, eu tincidunt ipsum mattis sed. Proin fringilla lectus nunc, sed consequat metus malesuada sit amet. Suspendisse elementum arcu in nulla convallis ornare. Aenean mauris arcu, molestie a augue ac, maximus vulputate ex. Nunc dignissim consequat lorem quis feugiat. In non elit euismod, maximus neque ac, ullamcorper libero. Nam commodo sit amet magna et vestibulum. Nam at sollicitudin nulla.\r\n\r\n', 'revenge-of-the-nerds-ii-nerds-in-paradise', 1, '1666186046.png', 0, NULL, 1, 'Revenge of the Nerds II: Nerds in Paradise', '', NULL, '2023-01-03 16:44:35'),
	(4, 'Diffuse large B-cell lymphoma, spleen.\r\n\r\nEtiam vulputate ipsum non quam auctor, et vulputate ante mollis. Proin tempor augue id orci elementum, eu euismod libero vulputate. Cras eu malesuada odio, sit amet scelerisque libero. Etiam sapien mi, ullamcorper ac leo eget, congue vehicula est. Maecenas a ex et sapien semper pulvinar. Morbi vel mollis neque, sit amet hendrerit ligula. Aenean vehicula justo tempus, luctus libero id, varius metus.\r\n', 'mother-of-mine-aideista-parhain', 3, 'UndefinedImage.jpg', 0, NULL, 1, 'Mother of Mine (Aideista parhain)', '', NULL, '2023-01-03 16:44:35'),
	(5, 'Other psychoactive substance dependence with psychoactive substance-induced psychotic disorder with hallucinations.\r\n\r\nDonec ac pulvinar magna, ut imperdiet leo. Ut at neque at enim fermentum fermentum. Phasellus congue nisi nec massa vulputate bibendum. Phasellus vulputate congue lacus, at dapibus purus malesuada vel. Pellentesque id tellus vel sapien ultrices finibus. Donec congue nisi gravida vestibulum dignissim. Proin interdum, libero ac finibus euismod, dolor lectus condimentum massa, vitae tempus libero nibh at ligula. Suspendisse ac arcu eu nulla hendrerit tincidunt in ac odio. Morbi quis venenatis leo. Aliquam varius, mauris porta luctus placerat, odio eros dapibus enim, et ornare urna nisl ac leo. Phasellus nisi risus, convallis suscipit semper vitae, facilisis a neque. Aenean ex felis, condimentum iaculis tincidunt sodales, sagittis eu urna.\r\n\r\n', 'the-amazing-catfish', 2, 'UndefinedImage.jpg', 0, NULL, 1, 'The Amazing Catfish', '', NULL, '2023-01-03 16:44:35'),
	(6, '<h2>Insect bite (nonvenomous) of left ring finger, initial encounter. Nulla risus dolor, fringilla nec ornare non, tincidunt vitae nisl. In congue quam a magna malesuada cursus. Donec molestie, sapien a tristique suscipit, elit mauris mattis nisl, porta aliquet ante sem vel metus. Pellentesque cursus sit amet magna eget dapibus. Duis molestie odio non blandit interdum. Morbi urna turpis, pulvinar vel justo at, pellentesque placerat enim. Mauris et venenatis leo. Suspendisse potenti.</h2>', 'gift', 1, 'UndefinedImage.jpg', 0, NULL, 1, 'Gift,', '', NULL, '2023-01-03 16:44:35'),
	(7, 'Assault by hot tap water, initial encounter.\r\n\r\nSed eget euismod lectus. Vestibulum tristique sem orci, vitae rutrum urna consectetur id. Morbi consectetur leo sed magna auctor pretium. Nulla suscipit lorem sit amet felis dictum congue eget non dui. Ut neque urna, ullamcorper nec iaculis vel, auctor eget lacus. Aliquam non semper velit, id tincidunt diam. Praesent fermentum felis a vehicula condimentum. Proin eget turpis metus. Sed pharetra nibh id erat feugiat, ac vulputate sapien venenatis. Phasellus sit amet ante dolor. Pellentesque ultrices sapien eu nibh elementum lacinia. Donec lobortis neque vitae egestas viverra. Quisque lacinia, sapien ac ultricies pretium, odio lacus placerat nisl, sed hendrerit velit nulla sit amet urna.\r\n\r\n', 'billy-blazes', 2, 'UndefinedImage.jpg', 0, NULL, 1, 'Billy Blazes', '', NULL, '2023-01-03 16:44:35'),
	(8, 'Displaced unspecified fracture of left great toe, subsequent encounter for fracture with malunion.\r\n\r\nVivamus scelerisque vehicula nunc, a consequat purus varius vitae. Pellentesque a augue id ex fringilla molestie. Aliquam vitae eros lectus. Donec blandit rutrum faucibus. Cras sit amet imperdiet metus, at convallis odio. Nunc vel lobortis turpis. Morbi ac magna eu diam convallis pharetra at mollis augue.\r\n\r\n', 'holy-rollers', 3, 'UndefinedImage.jpg', 0, NULL, 1, 'Holy Rollers', '', NULL, '2023-01-03 16:44:35'),
	(9, 'Nondisplaced intertrochanteric fracture of right femur, initial encounter for open fracture type I or II.\r\n\r\nPraesent a libero at lorem iaculis porta ac quis ipsum. Cras quis metus aliquam felis sagittis auctor. Donec eleifend libero nec rhoncus fringilla. Nunc eu libero in metus sollicitudin sagittis vitae vel nibh. Vestibulum rutrum nibh ac magna posuere, vitae consequat nunc dictum. Pellentesque porta semper eros nec dignissim. Nulla nec feugiat quam. Nam porttitor accumsan nisi, vitae posuere est rhoncus blandit. Cras rutrum velit id augue volutpat pellentesque. Morbi nec diam vestibulum, fringilla dolor a, condimentum est. Curabitur condimentum, eros non sodales iaculis, lectus purus convallis est, vitae molestie nulla augue sed mauris. Curabitur tristique lorem at maximus bibendum. Integer ac commodo sem.\r\n\r\n', 'east-of-eden', 3, 'UndefinedImage.jpg', 0, NULL, 1, 'East of Eden', '', NULL, '2023-01-03 16:44:35'),
	(10, 'Traumatic rupture of unspecified ligament of unspecified finger at metacarpophalangeal and interphalangeal joint, sequela.\r\n\r\nInteger posuere ac justo ac mollis. In a lorem sit amet quam bibendum auctor. Aenean consectetur, elit eu maximus lobortis, enim enim rutrum sem, eu fringilla enim orci sit amet turpis. In molestie volutpat dignissim. Vivamus non lectus tellus. Nunc lectus tellus, luctus et augue non, tempor tempor tortor. Maecenas fermentum ut urna sit amet dictum.\r\n\r\n', 'counterfeit-traitor', 3, 'UndefinedImage.jpg', 0, NULL, 1, 'Counterfeit Traitor', '', NULL, '2023-01-03 16:44:35'),
	(11, 'Underdosing of unspecified psychodysleptics, initial encounter.\r\n\r\nAliquam massa nisi, vehicula id pulvinar at, facilisis vel nisi. Pellentesque urna lorem, sodales eget ex vel, rhoncus dignissim lectus. Maecenas bibendum fringilla nunc nec volutpat. Donec augue enim, finibus a sapien in, consectetur euismod enim. Pellentesque vitae nibh finibus, feugiat tellus eget, commodo tellus. Phasellus vel auctor mi. Sed posuere porttitor tellus, eu dictum mauris semper vitae. Aenean interdum condimentum mattis. Vestibulum sagittis, ligula nec pharetra tincidunt, sapien magna consequat tellus, non auctor purus sem at lacus.\r\n\r\n', 'heart-of-america', 3, 'UndefinedImage.jpg', 0, NULL, 1, 'Heart of America', '', NULL, '2023-01-03 16:44:35'),
	(12, 'Sprain of joints and ligaments of unspecified parts of head, sequela.\r\n\r\nDuis et elementum arcu. Morbi finibus sit amet nulla sit amet euismod. Praesent velit quam, laoreet id leo id, lacinia volutpat augue. Quisque suscipit nulla eu mattis dapibus. Quisque elementum purus libero, et consectetur elit pretium et. Aenean at lacinia justo, at hendrerit lorem. Integer a ex in orci consectetur scelerisque et a ligula. Quisque pharetra vel lorem sed pharetra. Nunc molestie urna odio, vitae malesuada nulla malesuada eu.\r\n\r\n', 'bordertown', 1, 'UndefinedImage.jpg', 0, NULL, 1, 'Bordertown', '', NULL, '2023-01-03 16:44:35'),
	(13, '<p>Unstable burst fracture of unspecified thoracic vertebra, sequela. Donec maximus auctor libero, et convallis nunc cursus sed. Proin quis turpis nisi. In id orci a augue vulputate iaculis ac ac ligula. Phasellus dui augue, iaculis in interdum in, tempus vitae enim. Sed tincidunt suscipit arcu, eget fringilla arcu tristique vitae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse congue lobortis nulla, quis ultricies erat porta a. Integer dictum nisi sem, in faucibus orci maximus eu. Pellentesque nec leo vitae lorem aliquam fringilla.</p>', 'jodorowsky-s-dune', 1, 'UndefinedImage.jpg', 0, NULL, 1, '  Jodorowsky\'s Dune', '', NULL, '2023-01-03 16:44:35'),
	(14, 'Smith\'s fracture of right radius, subsequent encounter for open fracture type I or II with nonunion.\r\n\r\nDonec suscipit pretium convallis. Nam lacinia nulla sollicitudin, auctor sapien eu, porta purus. Maecenas quis congue lacus. Mauris mollis diam a laoreet dictum. Integer laoreet interdum leo at consequat. Donec magna turpis, aliquet eu lorem vitae, egestas faucibus metus. Morbi et faucibus arcu. Curabitur feugiat mattis congue. Sed fringilla sit amet nulla at tempus. Nam vitae vulputate dui.\r\n\r\n', 'men-of-honor', 3, 'UndefinedImage.jpg', 0, NULL, 1, 'Men of Honor', '', NULL, '2023-01-03 16:44:35'),
	(15, 'Unspecified deformity of right finger(s).\r\n\r\nNulla eget massa vel erat blandit placerat in non ex. Mauris eu imperdiet sem, sed vehicula turpis. Suspendisse mattis pretium velit. Etiam enim tellus, egestas ac rutrum at, vestibulum eget enim. Fusce bibendum mattis elit et viverra. Morbi urna turpis, lobortis vel condimentum et, tincidunt quis arcu. Morbi vitae vehicula nisi, et imperdiet enim. Aliquam nec quam porta, rutrum diam ut, lobortis elit. Morbi nisl velit, porta nec massa quis, iaculis sagittis lorem. Praesent sollicitudin ac justo non tempus. Morbi ut quam eget ex luctus sollicitudin. Proin id velit ex. Nullam neque odio, dignissim eget metus quis, lacinia dictum dolor.\r\n\r\n', 'jamaica-inn', 1, 'UndefinedImage.jpg', 0, NULL, 1, 'Jamaica Inn', '', NULL, '2023-01-03 16:44:35'),
	(16, 'Periprosthetic osteolysis of unspecified internal prosthetic joint, initial encounter.\r\n\r\nOrci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec pretium, mi quis egestas tempus, turpis nunc lobortis odio, eget vulputate ante neque ac turpis. Curabitur pellentesque lacinia tincidunt. Cras eget mauris ac neque tempus pulvinar. Nam tempus felis est. Cras tristique tellus diam, non iaculis metus pretium et. Suspendisse dignissim consequat ultricies.\r\n\r\n', 'blue-streak', 1, 'UndefinedImage.jpg', 0, NULL, 1, 'Blue Streak', '', NULL, '2023-01-03 16:44:36'),
	(17, 'Burn of second degree of unspecified ear [any part, except ear drum], subsequent encounter.\r\n\r\nProin quis interdum neque, eget venenatis arcu. Nulla tincidunt dui sed dignissim faucibus. Pellentesque condimentum, nibh in placerat gravida, felis dolor sodales arcu, vel posuere sem orci vel dui. Quisque sit amet eleifend tortor. Nunc posuere augue id luctus vulputate. Nam sem nisl, volutpat tincidunt volutpat a, imperdiet eget ligula. Vivamus nec malesuada purus.\r\n\r\n', 'addiction', 1, 'UndefinedImage.jpg', 0, NULL, 1, 'Addiction', '', NULL, '2023-01-03 16:44:36'),
	(18, 'Toxic effect of other specified inorganic substances, assault.\r\n\r\nUt quis pharetra elit, eu pellentesque nisl. Duis finibus ex orci, ac pulvinar erat placerat et. Phasellus sed tempor neque, et vestibulum sapien. Nulla facilisi. In non sapien tempus, dictum enim quis, gravida tellus. Praesent sodales, augue ut interdum congue, erat tellus fermentum lectus, a fermentum lectus justo eget turpis. Etiam eu risus feugiat, finibus mauris ac, porttitor dui. Nam vitae lobortis turpis. Vestibulum id eros nec neque rutrum porta a aliquam magna. Nam commodo, mi at ornare vestibulum, ipsum leo aliquet turpis, vel finibus sem tortor sed leo. Proin eu turpis efficitur, porttitor metus sed, vulputate sem. Aenean malesuada sagittis sapien ac tristique. Vestibulum semper efficitur nisl, fermentum placerat arcu finibus non. Aliquam quis consectetur odio.\r\n\r\n', 'sins', 2, 'UndefinedImage.jpg', 0, NULL, 1, 'Sins', '', NULL, '2023-01-03 16:44:36'),
	(19, 'Unspecified open wound of cheek and temporomandibular area\r\n\r\nInteger sed dolor est. Proin auctor, ante venenatis consequat ornare, nisl purus tincidunt velit, non laoreet ex leo eget purus. Praesent vitae sollicitudin dolor. Suspendisse faucibus dolor ut mi facilisis porta. In mollis auctor velit, varius pellentesque ligula porta in. Ut vitae justo nec diam ultricies lacinia. Quisque pharetra facilisis nibh, at rhoncus justo fermentum at. Sed id venenatis lectus, vel luctus justo. Nam pharetra rhoncus odio, non ultricies arcu imperdiet ornare. Pellentesque lacus nunc, feugiat ut vehicula vel, euismod vel nisl. Sed ornare gravida ante, in laoreet enim efficitur non. Quisque nulla felis, sollicitudin eu ipsum ac, euismod finibus nulla.\r\n', 'hot-spot', 1, 'UndefinedImage.jpg', 0, NULL, 1, 'Hot Spot', '', NULL, '2023-01-03 16:44:36'),
	(20, 'Pedestrian on skateboard injured in collision with heavy transport vehicle or bus, unspecified whether traffic or nontraffic accident, sequela.\r\n\r\n\r\nInteger quis gravida justo. Praesent purus nibh, congue eu pharetra ut, mattis at est. Quisque ultricies tempor justo. Nunc vitae orci porta, lacinia elit in, feugiat nunc. Morbi accumsan arcu odio, et tincidunt nulla ultrices vitae. Pellentesque erat sapien, tempor vitae aliquet vel, gravida et dolor. Praesent vitae diam accumsan neque mattis aliquam quis sit amet dui. Vestibulum luctus nec est ac tristique. Maecenas ultrices elit id augue iaculis convallis.', 'night-mother', 3, 'UndefinedImage.jpg', 0, NULL, 1, 'Night Mother', '', NULL, '2023-01-03 16:44:36');

-- Listage de la structure de table sakura. sakura_category
DROP TABLE IF EXISTS `sakura_category`;
CREATE TABLE IF NOT EXISTS `sakura_category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_category : ~0 rows (environ)
INSERT INTO `sakura_category` (`Id`, `Title`) VALUES
	(1, 'bbab');

-- Listage de la structure de table sakura. sakura_comment
DROP TABLE IF EXISTS `sakura_comment`;
CREATE TABLE IF NOT EXISTS `sakura_comment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL,
  `Comment_Post_Id` int(11) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre_signalement` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_comment : ~6 rows (environ)
INSERT INTO `sakura_comment` (`Id`, `Content`, `Status`, `Comment_Post_Id`, `Author`, `Email`, `Date_Created`, `nombre_signalement`) VALUES
	(5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nostrum qui dicta eius sit quas ex aperiam accusamus provident numquam deleniti, fugit quia ratione mollitia nemo nam dolore hic!', 'approved', 3, 'aeae', 'zaidmouhamad@gmail.com', '2023-01-01 00:00:00', 0),
	(6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nostrum qui dicta eius sit quas ex aperiam accusamus provident numquam deleniti, fugit quia ratione mollitia nemo nam dolore hic!', 'unapproved', 1, '', '', '2023-01-01 00:00:00', 0),
	(7, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nostrum qui dicta eius sit quas ex aperiam accusamus provident numquam deleniti, fugit quia ratione mollitia nemo nam dolore hic!', 'approved', 1, 'Makan', 'mail@mail.fr', '2023-01-01 00:00:00', 0),
	(8, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nostrum qui dicta eius sit quas ex aperiam accusamus provident numquam deleniti, fugit quia ratione mollitia nemo nam dolore hic!', 'approved', 1, 'Ano', 'ano@mail.fr', '2023-01-01 00:00:00', 0),
	(9, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nostrum qui dicta eius sit quas ex aperiam accusamus provident numquam deleniti, fugit quia ratione mollitia nemo nam dolore hic!', 'approved', 1, 'Mister Masdak', 'mail@mail.fr', '2023-01-01 00:00:00', 0),
	(10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nostrum qui dicta eius sit quas ex aperiam accusamus provident numquam deleniti, fugit quia ratione mollitia nemo nam dolore hic!', 'approved', 1, 'New User', 'user@mail.fr', '2023-01-01 00:00:00', 0),
	(11, 'hello guys', 'approved', 1, 'Hello', 'j@h.fr', '2023-01-03 00:00:00', 0),
	(12, 'hello guys', 'unapproved', 1, 'Hello', 'j@h.fr', '2023-01-03 00:00:00', 0),
	(13, 'hello guys', 'unapproved', 1, 'Hello', 'j@h.fr', '2023-01-03 00:00:00', 0),
	(14, 'makan', 'unapproved', 1, 'makan', 'ma@ma.fr', '2023-01-03 00:00:00', 0),
	(15, 'makan', 'unapproved', 1, 'makan', 'ma@ma.fr', '2023-01-03 00:00:00', 0),
	(17, 'alert(1)', 'unapproved', 1, 'makan', 'makan@makan.fr', '2023-01-03 00:00:00', 0);

-- Listage de la structure de table sakura. sakura_manga
DROP TABLE IF EXISTS `sakura_manga`;
CREATE TABLE IF NOT EXISTS `sakura_manga` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Cover` varchar(255) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`Id`),
  KEY `Fk_MangaCategoryId` (`Category_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_manga : ~0 rows (environ)

-- Listage de la structure de table sakura. sakura_mangapage
DROP TABLE IF EXISTS `sakura_mangapage`;
CREATE TABLE IF NOT EXISTS `sakura_mangapage` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Chapter_Id` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Fk_MangaPageChapterId` (`Chapter_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_mangapage : ~0 rows (environ)

-- Listage de la structure de table sakura. sakura_mangatype
DROP TABLE IF EXISTS `sakura_mangatype`;
CREATE TABLE IF NOT EXISTS `sakura_mangatype` (
  `Manga_Id` int(11) NOT NULL,
  `Type_Id` int(11) NOT NULL,
  KEY `Fk_MangaTypeMangaId` (`Manga_Id`),
  KEY `Fk_MangaTypeTypeId` (`Type_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_mangatype : ~0 rows (environ)

-- Listage de la structure de table sakura. sakura_menu
DROP TABLE IF EXISTS `sakura_menu`;
CREATE TABLE IF NOT EXISTS `sakura_menu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Content` varchar(500) NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '0',
  `Main` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_menu : ~3 rows (environ)
INSERT INTO `sakura_menu` (`Id`, `Title`, `Content`, `Active`, `Main`) VALUES
	(19, 'Menu impaires', 'My 3rd page,My 5th page,My 7th page,My 9th page', 0, 0),
	(21, 'Menu principal', 'My 1st page,My 2nd page,My 3rd page,My 4th page,My 5th page,My 6th page,My 7th page,My 8th page,My 9th page', 0, 1),
	(22, 'Menu paire', 'My 2nd page,My 4th page,My 6th page,My 8th page', 0, 0);

-- Listage de la structure de table sakura. sakura_page
DROP TABLE IF EXISTS `sakura_page`;
CREATE TABLE IF NOT EXISTS `sakura_page` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text,
  `Active` tinyint(1) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Description` text,
  `Main` varchar(10) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Rewrite_Url` varchar(10) DEFAULT NULL,
  `Date_Created` datetime DEFAULT CURRENT_TIMESTAMP,
  `Date_Updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_page : ~9 rows (environ)
INSERT INTO `sakura_page` (`Id`, `Title`, `Content`, `Active`, `User_Id`, `Description`, `Main`, `Slug`, `Rewrite_Url`, `Date_Created`, `Date_Updated`) VALUES
	(1, 'My 1st page', '<h2>First Page</h2><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum <a href="/site/page?id=2">Lorem Ipsum</a></p>', 0, 1, 'first-page', NULL, NULL, NULL, '2022-11-21 00:00:00', '2022-11-21 09:57:20'),
	(2, 'My 2nd page', '<h2>Second Page</h2><p>Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem</p>', 0, 1, 'my-second-page', NULL, NULL, NULL, '2022-11-20 00:00:00', '2022-11-21 09:54:51'),
	(3, 'My 3rd page', '<h2>Third Page</h2><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum <a href="/site/page?id=2">Lorem Ipsum</a></p>', 0, 1, 'third-page', NULL, NULL, NULL, '2022-11-21 00:00:00', '2022-11-21 09:55:17'),
	(4, 'My 4th page', '<h2>Fourth Page</h2><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum <a href="/site/page?id=2">Lorem Ipsum</a></p>', 0, 1, 'fourth-page', NULL, NULL, NULL, '2022-11-21 00:00:00', '2022-11-21 09:44:01'),
	(5, 'My 5th page', '<h2>Fifth Page</h2><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum <a href="/site/page?id=2">Lorem Ipsum</a></p>', 0, 1, 'fifth-page', NULL, NULL, NULL, '2022-11-21 00:00:00', '2022-11-21 09:55:25'),
	(6, 'My 6th page', '<h2>Sixth Page</h2><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum <a href="/site/page?id=2">Lorem Ipsum</a></p>', 0, 1, 'sixth-page', NULL, NULL, NULL, '2022-11-21 00:00:00', '2022-11-21 09:55:31'),
	(7, 'My 7th page', '<h2>Seventh  Page</h2><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum <a href="/site/page?id=2">Lorem Ipsum</a></p>', 0, 1, 'seventh-page', NULL, NULL, NULL, '2022-11-21 00:00:00', '2022-11-21 09:55:36'),
	(8, 'My 8th page', '<h2>Heigth Page</h2><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum <a href="/site/page?id=2">Lorem Ipsum</a></p>', 0, 1, 'heigth-page', NULL, NULL, NULL, '2022-11-21 00:00:00', '2022-11-21 09:55:51'),
	(9, 'My 9th page', '<h2>Nineth Page</h2><p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum <a href="/site/page?id=2">Lorem Ipsum</a></p>', 0, 1, 'nineth-page', NULL, NULL, NULL, '2022-11-21 00:00:00', '2022-11-21 09:56:01');

-- Listage de la structure de table sakura. sakura_site
DROP TABLE IF EXISTS `sakura_site`;
CREATE TABLE IF NOT EXISTS `sakura_site` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Logo` varchar(255) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Number` varchar(20) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_site : ~1 rows (environ)
INSERT INTO `sakura_site` (`Id`, `Logo`, `Name`, `Email`, `Number`, `Address`, `Date_created`) VALUES
	(1, '1619049326.png', 'MonSiteSakura', '', '0606060606', 'adresse', '2023-01-03 16:22:34');

-- Listage de la structure de table sakura. sakura_stats
DROP TABLE IF EXISTS `sakura_stats`;
CREATE TABLE IF NOT EXISTS `sakura_stats` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Session` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_stats : ~26 rows (environ)
INSERT INTO `sakura_stats` (`Id`, `Session`, `Date`) VALUES
	(2, 'cmppn0s48cundfn6sff4414080', '2022-12-19'),
	(3, 'p0s49jh6gbj938gtcd4kccugl2', '2022-12-18'),
	(4, 'lgd711m8771g8ao3rpda2hsl14', '2022-12-18'),
	(5, 'qzrfazfgaqfaq', '2022-12-01'),
	(6, 'qsfqsfqsfqsfqs', '2022-12-05'),
	(7, 'qsfqsfqsfqsfqsfdgfhjfj', '2022-12-04'),
	(8, 'dsfghjngdg', '2022-11-06'),
	(9, 'sdgdhjsfhgdg', '2022-11-15'),
	(10, 'eryzeryhiiupiouery', '2022-10-02'),
	(11, 'zretyuulilml', '2021-03-15'),
	(12, 'sdfsdgsdgqdgqdg', '2021-01-10'),
	(13, 'qiopyufthdjfg', '2021-03-29'),
	(14, 'qsidonfoqdfglk', '2022-05-16'),
	(15, 'hlrbf3csidpk690v6no0slgmm3', '2022-12-19'),
	(16, 'f8389n997ir834po6nmq9ggq3i', '2022-12-19'),
	(17, 'zeartyuj', '2019-05-15'),
	(18, 'zetzetzztzt', '2019-03-20'),
	(19, 'zetzetztztz', '2019-12-17'),
	(20, 'ztztzetzyeryuzerye', '2020-05-13'),
	(21, 'zaeyuout-yeyezry', '2020-12-30'),
	(22, 'yzeryzeryrey', '2020-12-15'),
	(23, '754ert578erf546r4', '2019-04-16'),
	(24, 'ze7tze87t857zzetze4t', '2019-06-24'),
	(25, 'zetze4t4zetzet54ze', '2020-12-17'),
	(26, 'ze47tze5t4ze56t', '2020-06-19'),
	(27, 'l0dpavs5527n7a7m1c1qall9ua', '2023-01-03');

-- Listage de la structure de table sakura. sakura_type
DROP TABLE IF EXISTS `sakura_type`;
CREATE TABLE IF NOT EXISTS `sakura_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Fk_TypeUserId` (`User_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_type : ~0 rows (environ)

-- Listage de la structure de table sakura. sakura_user
DROP TABLE IF EXISTS `sakura_user`;
CREATE TABLE IF NOT EXISTS `sakura_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(25) DEFAULT NULL,
  `Lastname` varchar(70) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Status` tinyint(3) NOT NULL DEFAULT '0',
  `Role` tinyint(3) NOT NULL DEFAULT '1',
  `Token` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table sakura.sakura_user : ~4 rows (environ)
INSERT INTO `sakura_user` (`Id`, `Firstname`, `Lastname`, `Email`, `Password`, `Status`, `Role`, `Token`) VALUES
	(1, 'Makan', 'KAMISSOKO', 'makan.kamissoko@hotmail.fr', '$2a$12$WlDnoGROaol0bdKUe5cxJOBX2BFJPsewOXo12nIeEIy02Bm/Wacvq', 1, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.WyJNYWthbiIsIktBTUlTU09LTyIsIm1ha2FuLmthbWlzc29rb0Bob3RtYWlsLmZyIl0=.cd610801d0dcf3f3461412ef80f026e5037a7b70f3f6c0b6f656099c1d485697.63b456e6e82c1'),
	(2, 'Daniel', 'CASANOVA', 'dcasanova@gmail.com', '$2a$12$RdIcrj/Rz8m5iLxyWIg0ZOCSqYn36DkfWZHGsOh/VWWB182NNbQ/6', 1, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.WyJEYW5pZWwiLCJDYXNhbm92YSIsImRjYXNhbm92YUBnbWFpbC5jb20iXQ==.ee1aaf47f36c079ab5ca2aa721650dcb1dc7e2b8574e97761381698f348a2d92'),
	(3, 'Emile', 'Zola', 'ezola@outlook.com', '$2a$12$UkWyr98z4X60pUx8dsXdKOREuuHegCViXC3uTULaxlz90KVSQR2iy', 0, 2, NULL),
	(4, 'Axel', 'HALIFA', 'axel.halifa0@gmail.com', '$2y$10$p1KtbYfrsfuyiUwL2NhLl.uOrxpI5urQnFPLsb8cj7.FFHqBKMXgC', 1, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.WyJBeGVsIiwiSEFMSUZBIiwiYXhlbC5oYWxpZmEwQGdtYWlsLmNvbSJd.0d15b1ed83697bd1307020cff87dbba8c54b8bd70a972260ec70da6de8c7e19d');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
