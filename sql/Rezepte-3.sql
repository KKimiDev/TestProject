-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 02. Jul 2025 um 10:22
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
-- Tabellenstruktur für Tabelle `Images`
--

CREATE TABLE `Images` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Images`
--

INSERT INTO `Images` (`RecipeName`, `RecipeAuthor`, `Path`, `ID`) VALUES
('Avocado Toast Deluxe', 'Anna Koch', 'Anna Koch/Avocado Toast Deluxe 0000.jpg', 0),
('Avocado Toast Deluxe', 'Anna Koch', 'Anna Koch/Avocado Toast Deluxe 0001.jpeg', 1),
('Avocado Toast Deluxe', 'Anna Koch', 'Anna Koch/Avocado Toast Deluxe 0002.jpg', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Ingredients`
--

CREATE TABLE `Ingredients` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Ingredient` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Daten für Tabelle `Recipes`
--

INSERT INTO `Recipes` (`Name`, `Author`, `Description`, `Duration`, `Date`) VALUES
('Avocado Toast Deluxe', 'Anna Koch', 'Knuspriges Brot mit cremiger Avocado, Tomaten und frischem Basilikum.', 15, NULL),
('Schneller Quinoa-Salat', 'Anna Koch', 'Leicht, proteinreich und perfekt für den Sommer.', 15, NULL),
('Vegane Schoko-Muffins', 'Anna Koch', 'Saftig und schokoladig, ganz ohne tierische Produkte.', 15, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Steps`
--

CREATE TABLE `Steps` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Explanation` varchar(200) NOT NULL,
  `ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Tags`
--

CREATE TABLE `Tags` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Tags`
--

INSERT INTO `Tags` (`RecipeName`, `RecipeAuthor`, `Tag`) VALUES
('Avocado Toast Deluxe', 'Anna Koch', 'Avocado'),
('Avocado Toast Deluxe', 'Anna Koch', 'lecker');

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
('Anna Koch', '$2y$10$Hj2xCzLbo7bNnMX1g4X/g.oKFryAfco8BaAWnwX71pC6NEkkKZOkK', 'Leidenschaftliche Hobbyköchin, die gerne schnelle und gesunde Rezepte teilt. Lieblingszutat: Avocado 🥑', 'Anna Koch.jpg'),
('Kimi', '$2y$10$O.sSob.A/xTblbmYlaiaY.Qb4xY9dN/2OD8hAJwsfSykiAilq0Amy', '', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Utilities`
--

CREATE TABLE `Utilities` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Utility` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
