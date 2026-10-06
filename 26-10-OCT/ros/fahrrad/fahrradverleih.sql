-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Sep 2026 um 14:00
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fahrradverleih`
--
CREATE DATABASE IF NOT EXISTS `fahrradverleih` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fahrradverleih`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrraeder`
--

CREATE TABLE `fahrraeder` (
  `fahrradNr` int(6) NOT NULL,
  `rahmenNr` varchar(20) NOT NULL,
  `tagesmietpreis` float(7,2) NOT NULL,
  `anschaffungsdatum` date NOT NULL,
  `artikelNr` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `fahrraeder`
--

INSERT INTO `fahrraeder` (`fahrradNr`, `rahmenNr`, `tagesmietpreis`, `anschaffungsdatum`, `artikelNr`) VALUES
(1, 'RN-1001', 12.50, '2023-05-14', 4711),
(2, 'RN-1001', 12.50, '2022-12-03', 4711),
(3, 'RN-1001', 12.50, '0000-00-00', 4711),
(4, 'RN-1001', 12.50, '0000-00-00', 4711),
(5, '12-45-zu', 12.90, '2025-11-22', 12),
(6, '56gtt-90', 12.90, '2026-07-31', 222);

--
-- Indizes der exportierten Tabellen
--

ALTER TABLE `fahrraeder`
  ADD PRIMARY KEY (`fahrradNr`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

ALTER TABLE `fahrraeder`
  MODIFY `fahrradNr` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
