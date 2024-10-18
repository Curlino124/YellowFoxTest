-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Okt 2024 um 18:48
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
-- Datenbank: `trips`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `trips`
--

CREATE TABLE `trips` (
  `data_id` int(11) NOT NULL,
  `Starttime` datetime NOT NULL,
  `Endtime` datetime NOT NULL,
  `Duration` int(11) NOT NULL,
  `Distance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `trips`
--

INSERT INTO `trips` (`data_id`, `Starttime`, `Endtime`, `Duration`, `Distance`) VALUES
(1, '2023-07-02 14:00:23', '2023-07-02 14:14:22', 839, 20.01);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`data_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `trips`
--
ALTER TABLE `trips`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
