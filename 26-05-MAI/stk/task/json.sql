-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Nov 2021 um 20:58
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
create DATABASE json;
use json;


--
-- Tabellenstruktur für Tabelle `abteilung`
--

CREATE TABLE IF NOT EXISTS `abteilung` (
  `idAbteilung` int(11) NOT NULL,
  `Abteilung` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `abteilung`
--

INSERT INTO `abteilung` (`idAbteilung`, `Abteilung`) VALUES
(1, 'Entwicklung'),
(2, 'Support');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiter`
--

CREATE TABLE IF NOT EXISTS `mitarbeiter` (
  `idMitarbeiter` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Abteilung_idAbteilung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`idMitarbeiter`, `Name`, `Abteilung_idAbteilung`) VALUES
(1, 'Mertens', 2),
(2, 'Meier', 2),
(3, 'Müller', 1),
(4, 'Schulz', 1),
(5, 'Weigold', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiter_hat_qualifikation`
--

CREATE TABLE IF NOT EXISTS `mitarbeiter_hat_qualifikation` (
  `Mitarbeiter_idMitarbeiter` int(11) NOT NULL,
  `Qualifikation_idQualifikation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mitarbeiter_hat_qualifikation`
--

INSERT INTO `mitarbeiter_hat_qualifikation` (`Mitarbeiter_idMitarbeiter`, `Qualifikation_idQualifikation`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(3, 8),
(3, 9),
(4, 6),
(4, 7),
(4, 9),
(5, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `qualifikation`
--

CREATE TABLE  IF NOT EXISTS `qualifikation` (
  `idQualifikation` int(11) NOT NULL,
  `Qualifikation` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `qualifikation`
--

INSERT INTO `qualifikation` (`idQualifikation`, `Qualifikation`) VALUES
(1, 'MySQL'),
(2, 'CSS'),
(3, 'HTML'),
(4, 'VBA'),
(5, 'PostgreSQL'),
(6, 'MongoDB'),
(7, 'RedisDB'),
(8, 'MariaDB'),
(9, 'Java');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abteilung`
--
ALTER TABLE `abteilung`
  ADD PRIMARY KEY (`idAbteilung`);

--
-- Indizes für die Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`idMitarbeiter`),
  ADD KEY `fk_Mitarbeiter_Abteilung_idx` (`Abteilung_idAbteilung`);

--
-- Indizes für die Tabelle `mitarbeiter_hat_qualifikation`
--
ALTER TABLE `mitarbeiter_hat_qualifikation`
  ADD PRIMARY KEY (`Mitarbeiter_idMitarbeiter`,`Qualifikation_idQualifikation`),
  ADD KEY `fk_Mitarbeiter_has_Qualifikation_Qualifikation1_idx` (`Qualifikation_idQualifikation`),
  ADD KEY `fk_Mitarbeiter_has_Qualifikation_Mitarbeiter1_idx` (`Mitarbeiter_idMitarbeiter`);

--
-- Indizes für die Tabelle `qualifikation`
--
ALTER TABLE `qualifikation`
  ADD PRIMARY KEY (`idQualifikation`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `abteilung`
--
ALTER TABLE `abteilung`
  MODIFY `idAbteilung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  MODIFY `idMitarbeiter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `qualifikation`
--
ALTER TABLE `qualifikation`
  MODIFY `idQualifikation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD CONSTRAINT `fk_Mitarbeiter_Abteilung` FOREIGN KEY (`Abteilung_idAbteilung`) REFERENCES `abteilung` (`idAbteilung`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `mitarbeiter_hat_qualifikation`
--
ALTER TABLE `mitarbeiter_hat_qualifikation`
  ADD CONSTRAINT `fk_Mitarbeiter_has_Qualifikation_Mitarbeiter1` FOREIGN KEY (`Mitarbeiter_idMitarbeiter`) REFERENCES `mitarbeiter` (`idMitarbeiter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mitarbeiter_has_Qualifikation_Qualifikation1` FOREIGN KEY (`Qualifikation_idQualifikation`) REFERENCES `qualifikation` (`idQualifikation`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
