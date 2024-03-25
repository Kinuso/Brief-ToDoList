-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 mars 2024 à 15:27
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

--
-- Contraintes pour les tables déchargées
--

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
