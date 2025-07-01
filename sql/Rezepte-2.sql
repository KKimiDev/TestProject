-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 01. Jul 2025 um 09:38
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Rezepte`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Recipes`
--

CREATE TABLE `Recipes` (
  `Name` varchar(63) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Users`
--

CREATE TABLE `Users` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Users`
--

INSERT INTO `Users` (`Username`, `Password`, `Description`, `Picture`) VALUES
('Admin', '$2y$10$ex7nLi5BRgVrCrfnffdSO.ThFrinaPkBacoAY8C0gp0QIDNxHno8G', 'Bin Admin', 'Anna Koch.jpg'),
('Anna Koch', '$2y$10$Hj2xCzLbo7bNnMX1g4X/g.oKFryAfco8BaAWnwX71pC6NEkkKZOkK', 'Leidenschaftliche Hobbyköchin, die gerne schnelle und gesunde Rezepte teilt. Lieblingszutat: Avocado 🥑', 'Anna Koch.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
