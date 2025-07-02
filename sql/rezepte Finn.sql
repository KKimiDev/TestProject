-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Jul 2025 um 15:59
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `rezepte`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`RecipeName`, `RecipeAuthor`, `Path`, `ID`) VALUES
('Avocado Toast Deluxe', 'Anna Koch', 'Anna Koch/Avocado Toast Deluxe 0000.jpg', 0),
('Avocado Toast Deluxe', 'Anna Koch', 'Anna Koch/Avocado Toast Deluxe 0001.jpeg', 1),
('Avocado Toast Deluxe', 'Anna Koch', 'Anna Koch/Avocado Toast Deluxe 0002.jpg', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredients`
--

CREATE TABLE `ingredients` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Ingredient` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `ingredients`
--

INSERT INTO `ingredients` (`RecipeName`, `RecipeAuthor`, `Ingredient`) VALUES
('Erdbeer_Tiramisu', 'FinnLotz', '500 g	 Erdbeeren'),
('Erdbeer_Tiramisu', 'FinnLotz', '3 EL	         Zucker'),
('Erdbeer_Tiramisu', 'FinnLotz', '250 g	 Mascarpone'),
('Erdbeer_Tiramisu', 'FinnLotz', '250 g	 Magerquark'),
('Erdbeer_Tiramisu', 'FinnLotz', '1 EL	         Zitron'),
('Erdbeer_Tiramisu', 'FinnLotz', '1 Packung Vanillezuc'),
('Erdbeer_Tiramisu', 'FinnLotz', '100 g	 Löffelbiskuit'),
('Erdbeer_Tiramisu', 'FinnLotz', '6 EL	        Orangen'),
('Sandwich', 'FinnLotz', '4 Toastscheiben'),
('Sandwich', 'FinnLotz', '2 Schinkenscheiben'),
('Sandwich', 'FinnLotz', '2 Käsescheiben'),
('Sandwich', 'FinnLotz', 'Mayonnaise'),
('Bunter_Couscous-Sala', 'FinnLotz', '200 g Couscous'),
('Bunter_Couscous-Sala', 'FinnLotz', '250 ml Gemüsebrühe'),
('Bunter_Couscous-Sala', 'FinnLotz', '1 Paprika'),
('Bunter_Couscous-Sala', 'FinnLotz', '1 Gurke'),
('Bunter_Couscous-Sala', 'FinnLotz', '2 Frühlingszwiebeln'),
('Bunter_Couscous-Sala', 'FinnLotz', '100 g Feta'),
('Bunter_Couscous-Sala', 'FinnLotz', '3 EL Olivenöl'),
('Bunter_Couscous-Sala', 'FinnLotz', 'Saft einer Zitrone'),
('Bunter_Couscous-Sala', 'FinnLotz', 'Salz, Pfeffer'),
('Saftiger_Zitronenkuc', 'FinnLotz', '250 g Mehl'),
('Saftiger_Zitronenkuc', 'FinnLotz', '180 g Zucker'),
('Saftiger_Zitronenkuc', 'FinnLotz', '1 Päckchen Backpulve'),
('Saftiger_Zitronenkuc', 'FinnLotz', '3 Eier'),
('Saftiger_Zitronenkuc', 'FinnLotz', '125 ml Milch'),
('Saftiger_Zitronenkuc', 'FinnLotz', '125 ml Sonnenblumenö'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Abrieb und Saft von '),
('Saftiger_Zitronenkuc', 'FinnLotz', '150 g Puderzucker (f'),
('Saftiger_Zitronenkuc', 'FinnLotz', '250 g Mehl'),
('Saftiger_Zitronenkuc', 'FinnLotz', '180 g Zucker'),
('Saftiger_Zitronenkuc', 'FinnLotz', '1 Päckchen Backpulve'),
('Saftiger_Zitronenkuc', 'FinnLotz', '3 Eier'),
('Saftiger_Zitronenkuc', 'FinnLotz', '125 ml Milch'),
('Saftiger_Zitronenkuc', 'FinnLotz', '125 ml Sonnenblumenö'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Abrieb und Saft von '),
('Saftiger_Zitronenkuc', 'FinnLotz', '150 g Puderzucker (f'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'fesfgre'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'hjtfht'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'qefwefweg'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'wgergsg'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'fwerfewf'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'fewfw'),
('Spaghetti_Carbonara', 'FinnLotz', '200 g Spaghetti'),
('Spaghetti_Carbonara', 'FinnLotz', '100 g Speckwürfel od'),
('Spaghetti_Carbonara', 'FinnLotz', '2 Eier'),
('Spaghetti_Carbonara', 'FinnLotz', '50 g geriebener Parm'),
('Spaghetti_Carbonara', 'FinnLotz', 'Salz, Pfeffer'),
('Spaghetti_Carbonara', 'FinnLotz', '1 EL Olivenöl');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes`
--

CREATE TABLE `recipes` (
  `Name` varchar(63) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `recipes`
--

INSERT INTO `recipes` (`Name`, `Author`, `Description`, `Duration`, `Date`) VALUES
('Avocado Toast Deluxe', 'Anna Koch', 'Knuspriges Brot mit cremiger Avocado, Tomaten und frischem Basilikum.', 15, NULL),
('Schneller Quinoa-Salat', 'Anna Koch', 'Leicht, proteinreich und perfekt für den Sommer.', 15, NULL),
('Vegane Schoko-Muffins', 'Anna Koch', 'Saftig und schokoladig, ganz ohne tierische Produkte.', 15, NULL),
('Sandwich', 'FinnLotz', 'Einfaches Schinken-Käse Sandwich für den kleinen Hunger', 30, NULL),
('index', 'FinnLotz', '', 30, NULL),
('Suche', 'FinnLotz', '', 30, NULL),
('Erdbeer_Tiramisu', 'FinnLotz', 'Leckeres Erdbeer-Tiramisu mit Löffelbiskuits. Perfekt für warme Tage im Sommer.\r\n', 30, NULL),
('Spaghetti_Carbonara', 'FinnLotz', 'Ein cremiger italienischer Klassiker mit Ei, Käse und Speck, schnell gemacht und unglaublich lecker.', 30, NULL),
('Bunter_Couscous-Salat', 'FinnLotz', 'Ein frischer Salat mit Gemüse und orientalischer Note – perfekt als Beilage oder leichtes Hauptgericht.', 30, NULL),
('Saftiger_Zitronenkuchen', 'FinnLotz', 'Ein fluffiger Rührkuchen mit frischem Zitronengeschmack ', 30, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `steps`
--

CREATE TABLE `steps` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Explanation` varchar(200) NOT NULL,
  `ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `steps`
--

INSERT INTO `steps` (`RecipeName`, `RecipeAuthor`, `Title`, `Explanation`, `ID`) VALUES
('Erdbeer_Tiramisu', 'FinnLotz', '', 'Alle Erdbeeren waschen und entstielen. 100 g Erdbeeren mit 1 EL Zucker pürieren und kalt stellen.\r\n---\r\nMascarpone, Quark, 2 EL Zucker, Zitronensaft und Vanillezucker verrühren und abschmecken. 300 g ', NULL),
('Sandwich', 'FinnLotz', '', 'Beschmiere alle Toastscheiben mit etwas Mayonnaise.\r\n---\r\nLege dann die Scheiben Schinken und Käse drauf.\r\n---\r\nLege die Sandwiches nun aufeinander und lege sie in den Sandwich-Maker.\r\n---\r\nWarte nun', NULL),
('Bunter_Couscous-Sala', 'FinnLotz', '', 'Couscous mit heißer Brühe übergießen, 5 Minuten quellen lassen, mit Gabel auflockern.\r\n---\r\nPaprika, Gurke, Frühlingszwiebeln klein schneiden.\r\n---\r\nFeta würfeln.\r\n---\r\nAlles mit Couscous mischen.\r\n--', NULL),
('Saftiger_Zitronenkuc', 'FinnLotz', '', 'Ofen auf 180 °C Ober-/Unterhitze vorheizen.\r\n---\r\nKastenform auslegen oder einfetten.\r\n---\r\nEier mit Zucker cremig schlagen.\r\n---\r\nÖl und Milch unterrühren.\r\n---\r\nMehl und Backpulver mischen, dazugebe', NULL),
('Saftiger_Zitronenkuc', 'FinnLotz', '', 'Ofen auf 180 °C Ober-/Unterhitze vorheizen.\r\n---\r\nKastenform auslegen oder einfetten.\r\n---\r\nEier mit Zucker cremig schlagen.\r\n---\r\nÖl und Milch unterrühren.\r\n---\r\nMehl und Backpulver mischen, dazugebe', NULL),
('Spaghetti_Carbonara', 'FinnLotz', '', 'Spaghetti in Salzwasser al dente kochen.\r\n---\r\nSpeckwürfel in der Pfanne mit Olivenöl knusprig braten.\r\n---\r\nEier mit Parmesan verquirlen, kräftig pfeffern.\r\n---\r\nNudeln abgießen, etwas Kochwasser auf', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

CREATE TABLE `tags` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tags`
--

INSERT INTO `tags` (`RecipeName`, `RecipeAuthor`, `Tag`) VALUES
('Avocado Toast Deluxe', 'Anna Koch', 'Avocado'),
('Avocado Toast Deluxe', 'Anna Koch', 'lecker');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`Username`, `Password`, `Description`, `Picture`) VALUES
('Admin', '$2y$10$ex7nLi5BRgVrCrfnffdSO.ThFrinaPkBacoAY8C0gp0QIDNxHno8G', 'Bin Admin', 'Anna Koch.jpg'),
('Anna Koch', '$2y$10$Hj2xCzLbo7bNnMX1g4X/g.oKFryAfco8BaAWnwX71pC6NEkkKZOkK', 'Leidenschaftliche Hobbyköchin, die gerne schnelle und gesunde Rezepte teilt. Lieblingszutat: Avocado 🥑', 'Anna Koch.jpg'),
('Kimi', '$2y$10$O.sSob.A/xTblbmYlaiaY.Qb4xY9dN/2OD8hAJwsfSykiAilq0Amy', '', NULL),
('FinnLotz', '$2y$10$ktnAD1PfcOLsTubri1Fs2eiqm/bpBRuUT/LZywI8fzcT53Bqrvzn6', '', NULL),
('HansPeter', '$2y$10$EC81FngECkozz4UT4WWuGOS0riM2Cbj707QVRnb02UxpRUEqMOv0q', '', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `utilities`
--

CREATE TABLE `utilities` (
  `RecipeName` varchar(20) NOT NULL,
  `RecipeAuthor` varchar(20) NOT NULL,
  `Utility` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `utilities`
--

INSERT INTO `utilities` (`RecipeName`, `RecipeAuthor`, `Utility`) VALUES
('Erdbeer_Tiramisu', 'FinnLotz', 'Schüssel'),
('Erdbeer_Tiramisu', 'FinnLotz', 'Auflaufform'),
('Erdbeer_Tiramisu', 'FinnLotz', 'Mixer'),
('Sandwich', 'FinnLotz', 'Sandwich-Maker'),
('Bunter_Couscous-Sala', 'FinnLotz', 'Schüssel'),
('Bunter_Couscous-Sala', 'FinnLotz', 'Schneidebrett & Mess'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Rührschüssel'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Handmixer'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Kastenform'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Backpapier'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Rührschüssel'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Handmixer'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Kastenform'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'Backpapier'),
('Saftiger_Zitronenkuc', 'FinnLotz', 'sdfbdfdb'),
('Spaghetti_Carbonara', 'FinnLotz', 'Großer Topf'),
('Spaghetti_Carbonara', 'FinnLotz', 'Große Pfanne'),
('Spaghetti_Carbonara', 'FinnLotz', 'Schneebesen'),
('Spaghetti_Carbonara', 'FinnLotz', 'Kochlöffel');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
