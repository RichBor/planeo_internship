-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 08. Jun 2022 um 08:15
-- Server-Version: 8.0.29-0ubuntu0.20.04.3
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `internship`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bmirechner`
--

CREATE TABLE `bmirechner` (
  `p_bID` int UNSIGNED NOT NULL,
  `f_uID` int UNSIGNED NOT NULL,
  `height` double UNSIGNED NOT NULL,
  `weight` double UNSIGNED NOT NULL,
  `bmi` double UNSIGNED NOT NULL,
  `insertdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contact`
--

CREATE TABLE `contact` (
  `p_cID` int UNSIGNED NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Vorname` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Nachricht` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int UNSIGNED NOT NULL,
  `f_UID` int UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `p_uID` int UNSIGNED NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `registriert_am` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bmirechner`
--
ALTER TABLE `bmirechner`
  ADD PRIMARY KEY (`p_bID`),
  ADD KEY `f_uID` (`f_uID`);

--
-- Indizes für die Tabelle `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`p_cID`),
  ADD UNIQUE KEY `p_cID` (`p_cID`);

--
-- Indizes für die Tabelle `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_UID` (`f_UID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`p_uID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bmirechner`
--
ALTER TABLE `bmirechner`
  MODIFY `p_bID` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `contact`
--
ALTER TABLE `contact`
  MODIFY `p_cID` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `p_uID` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bmirechner`
--
ALTER TABLE `bmirechner`
  ADD CONSTRAINT `bmirechner_ibfk_1` FOREIGN KEY (`f_uID`) REFERENCES `users` (`p_uID`);

--
-- Constraints der Tabelle `profileimg`
--
ALTER TABLE `profileimg`
  ADD CONSTRAINT `profileimg_ibfk_1` FOREIGN KEY (`f_UID`) REFERENCES `users` (`p_uID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
