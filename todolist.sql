-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 mars 2024 à 15:34
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `tdl_category`
--

DROP TABLE IF EXISTS `tdl_category`;
CREATE TABLE IF NOT EXISTS `tdl_category` (
  `ID_CATEGORY` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_category`
--

INSERT INTO `tdl_category` (`ID_CATEGORY`, `NAME`) VALUES
(1, 'Personnal'),
(2, 'Work'),
(3, 'Family'),
(4, 'Friends');

-- --------------------------------------------------------

--
-- Structure de la table `tdl_link`
--

DROP TABLE IF EXISTS `tdl_link`;
CREATE TABLE IF NOT EXISTS `tdl_link` (
  `ID_CATEGORY` int NOT NULL,
  `ID_TASK` int NOT NULL,
  PRIMARY KEY (`ID_CATEGORY`,`ID_TASK`),
  KEY `LINK_TDL_TASK0_FK` (`ID_TASK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tdl_priority`
--

DROP TABLE IF EXISTS `tdl_priority`;
CREATE TABLE IF NOT EXISTS `tdl_priority` (
  `ID_PRIORITY` varchar(80) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_PRIORITY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_priority`
--

INSERT INTO `tdl_priority` (`ID_PRIORITY`, `NAME`) VALUES
('1', 'Normal'),
('2', 'Important'),
('3', 'Urgent');

-- --------------------------------------------------------

--
-- Structure de la table `tdl_task`
--

DROP TABLE IF EXISTS `tdl_task`;
CREATE TABLE IF NOT EXISTS `tdl_task` (
  `ID_TASK` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `DUE_DATE` date NOT NULL,
  `ID_PRIORITY` varchar(80) NOT NULL,
  `ID_CATEGORY` varchar(55) NOT NULL,
  `ID_USER` int NOT NULL,
  PRIMARY KEY (`ID_TASK`),
  KEY `TDL_TASK_TDL_PRIORITY_FK` (`ID_PRIORITY`),
  KEY `TDL_TASK_TDL_USER0_FK` (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tdl_user`
--

DROP TABLE IF EXISTS `tdl_user`;
CREATE TABLE IF NOT EXISTS `tdl_user` (
  `ID_USER` int NOT NULL AUTO_INCREMENT,
  `FIRSTNAME` varchar(50) NOT NULL,
  `LASTNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(80) NOT NULL,
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `TDL_USER_AK` (`EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_user`
--

INSERT INTO `tdl_user` (`ID_USER`, `FIRSTNAME`, `LASTNAME`, `PASSWORD`, `EMAIL`) VALUES
(1, 'killian', 'vanhove', '$2y$10$D7OfXAcsVdB6tJub3n9L/OXzmZkl1/mT.Zb/yi1UnIgPNjvamjx0O', 'killian2908@gmail.com'),
(25, 'killian', 'vanhove', '$2y$10$MWWzafIT0HDQcS90rUL/U.kD5wreI2PTrKJ0Ew6BBpNcMiZblWx7S', 'killian@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tdl_link`
--
ALTER TABLE `tdl_link`
  ADD CONSTRAINT `LINK_TDL_CATEGORY_FK` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `tdl_category` (`ID_CATEGORY`),
  ADD CONSTRAINT `LINK_TDL_TASK0_FK` FOREIGN KEY (`ID_TASK`) REFERENCES `tdl_task` (`ID_TASK`);

--
-- Contraintes pour la table `tdl_task`
--
ALTER TABLE `tdl_task`
  ADD CONSTRAINT `TDL_TASK_TDL_PRIORITY_FK` FOREIGN KEY (`ID_PRIORITY`) REFERENCES `tdl_priority` (`ID_PRIORITY`),
  ADD CONSTRAINT `TDL_TASK_TDL_USER0_FK` FOREIGN KEY (`ID_USER`) REFERENCES `tdl_user` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
