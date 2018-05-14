-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Mai 2018 um 21:36
-- Server-Version: 10.1.31-MariaDB
-- PHP-Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `praktikumsfirmenverwaltung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ansprechpartner`
--

CREATE TABLE `ansprechpartner` (
  `Ansprechpartner_ID` int(11) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(50) NOT NULL,
  `Telefon` varchar(20) NOT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ansprechpartner`
--

INSERT INTO `ansprechpartner` (`Ansprechpartner_ID`, `Vorname`, `Nachname`, `Telefon`, `Email`) VALUES
(1, 'vnap1', 'nnap1', 'telap1', 'mailap1@mai.com'),
(2, 'vnap2', 'nnap2', 'telap2', 'mailap2@mai.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ansprechpartnerliste`
--

CREATE TABLE `ansprechpartnerliste` (
  `id` int(11) NOT NULL,
  `Firmen_ID` int(11) NOT NULL,
  `Berufsziel_ID` int(11) NOT NULL,
  `Ansprechpartner_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ansprechpartnerliste`
--

INSERT INTO `ansprechpartnerliste` (`id`, `Firmen_ID`, `Berufsziel_ID`, `Ansprechpartner_ID`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `Benutzer_ID` int(11) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Login` varchar(30) NOT NULL,
  `Passwort` varchar(120) NOT NULL,
  `Berechtigung` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`Benutzer_ID`, `Vorname`, `Nachname`, `Email`, `Login`, `Passwort`, `Berechtigung`) VALUES
(1, 'Torsten', 'Moeller', 'torsten@platzhalter.net', 'Admin', '$argon2i$v=19$m=1024,t=2,p=2$eHhpbkhuN0YyeGVjbFROWQ$dnm98RXKeL9SP2U5nx4LwoP3HrvIrbM1a3B+EtIqrss', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `berufsziel`
--

CREATE TABLE `berufsziel` (
  `Berufsziel_ID` int(11) NOT NULL,
  `Berufszielbezeichnung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `berufsziel`
--

INSERT INTO `berufsziel` (`Berufsziel_ID`, `Berufszielbezeichnung`) VALUES
(1, 'Fachinformatiker Anwendungsentwicklung'),
(2, 'Fachinformatiker Systemintegration');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `firmen`
--

CREATE TABLE `firmen` (
  `Firmen_ID` int(11) NOT NULL,
  `Firmenname` varchar(50) NOT NULL,
  `Firmenbezeichnung` varchar(255) DEFAULT NULL,
  `Firmenwebseite` varchar(255) NOT NULL,
  `Strasse` varchar(255) NOT NULL,
  `PLZ` varchar(6) NOT NULL,
  `Ort` varchar(255) NOT NULL,
  `Telefon` varchar(25) DEFAULT NULL,
  `Email` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `firmen`
--

INSERT INTO `firmen` (`Firmen_ID`, `Firmenname`, `Firmenbezeichnung`, `Firmenwebseite`, `Strasse`, `PLZ`, `Ort`, `Telefon`, `Email`) VALUES
(1, 'testfirma', NULL, '', 'teststr', '20053', 'Hamburg', '', 'firma@mail.de'),
(2, 'tesfirma2', 'tesfirma2bez', 'www.test2.de', 'test2str', '13511', 'test2', 'test2tel', 'test2@mail.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `praktika`
--

CREATE TABLE `praktika` (
  `Praktikum_ID` int(11) NOT NULL,
  `Teilnehmer_ID` int(11) NOT NULL,
  `Firmen_ID` int(11) NOT NULL,
  `Praktikumszeit_ID` int(11) NOT NULL,
  `Status` varchar(8) NOT NULL DEFAULT 'offen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `praktika`
--

INSERT INTO `praktika` (`Praktikum_ID`, `Teilnehmer_ID`, `Firmen_ID`, `Praktikumszeit_ID`, `Status`) VALUES
(1, 1, 1, 1, 'offen'),
(2, 2, 2, 1, 'absage'),
(4, 1, 1, 1, 'test2'),
(5, 2, 1, 1, 'test3'),
(6, 2, 1, 1, 'kia');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `praktikazeitraeume`
--

CREATE TABLE `praktikazeitraeume` (
  `Praktikumszeit_ID` int(11) NOT NULL,
  `Start` date NOT NULL,
  `Ende` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `praktikazeitraeume`
--

INSERT INTO `praktikazeitraeume` (`Praktikumszeit_ID`, `Start`, `Ende`) VALUES
(1, '2018-05-01', '2018-05-31');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `semester`
--

CREATE TABLE `semester` (
  `Semester_ID` int(11) NOT NULL,
  `Semesterbezeichnung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `semester`
--

INSERT INTO `semester` (`Semester_ID`, `Semesterbezeichnung`) VALUES
(1, '2017-2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teilnehmer`
--

CREATE TABLE `teilnehmer` (
  `Teilnehmer_ID` int(11) NOT NULL,
  `Semester_ID` int(11) NOT NULL,
  `Berufsziel_ID` int(11) DEFAULT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `teilnehmer`
--

INSERT INTO `teilnehmer` (`Teilnehmer_ID`, `Semester_ID`, `Berufsziel_ID`, `Vorname`, `Nachname`) VALUES
(1, 1, 1, 'vornametestteilnehmer1', 'nametestteilnehmer1'),
(2, 1, 2, 'vornametestteilnehmer2', 'nametestteilnehmer2'),
(3, 1, 1, 'vorname3', 'nachname3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `password_confirmation` text,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `remember_token` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `password_confirmation`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'Torsten Möller', 'moetor@web.de', '$2y$10$ZP6Y.VQJeJpxHoE/5kNFDea8cEHCOj4KQl0gqiReRlVMYpazFOTeK', NULL, '2018-05-09 22:52:29', '2018-05-09 22:52:29', 'VO0AtZkl12Lyu0jUZjXleHsB6Cz1GhoZs0YTRKqQ8ZGBHhYSPny6BQaOInPd');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ansprechpartner`
--
ALTER TABLE `ansprechpartner`
  ADD PRIMARY KEY (`Ansprechpartner_ID`);

--
-- Indizes für die Tabelle `ansprechpartnerliste`
--
ALTER TABLE `ansprechpartnerliste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Firmen_ID` (`Firmen_ID`),
  ADD KEY `Berufsziel_ID` (`Berufsziel_ID`),
  ADD KEY `Ansprechpartner_ID` (`Ansprechpartner_ID`);

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`Benutzer_ID`);

--
-- Indizes für die Tabelle `berufsziel`
--
ALTER TABLE `berufsziel`
  ADD PRIMARY KEY (`Berufsziel_ID`);

--
-- Indizes für die Tabelle `firmen`
--
ALTER TABLE `firmen`
  ADD PRIMARY KEY (`Firmen_ID`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `praktika`
--
ALTER TABLE `praktika`
  ADD PRIMARY KEY (`Praktikum_ID`),
  ADD KEY `Teilnehmer_ID` (`Teilnehmer_ID`),
  ADD KEY `Firmen_ID` (`Firmen_ID`),
  ADD KEY `Praktikumszeit_ID` (`Praktikumszeit_ID`);

--
-- Indizes für die Tabelle `praktikazeitraeume`
--
ALTER TABLE `praktikazeitraeume`
  ADD PRIMARY KEY (`Praktikumszeit_ID`);

--
-- Indizes für die Tabelle `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`Semester_ID`);

--
-- Indizes für die Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD PRIMARY KEY (`Teilnehmer_ID`),
  ADD KEY `Semester_ID` (`Semester_ID`),
  ADD KEY `Berufsziel_ID` (`Berufsziel_ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ansprechpartner`
--
ALTER TABLE `ansprechpartner`
  MODIFY `Ansprechpartner_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `ansprechpartnerliste`
--
ALTER TABLE `ansprechpartnerliste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `Benutzer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `berufsziel`
--
ALTER TABLE `berufsziel`
  MODIFY `Berufsziel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `firmen`
--
ALTER TABLE `firmen`
  MODIFY `Firmen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `praktika`
--
ALTER TABLE `praktika`
  MODIFY `Praktikum_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `praktikazeitraeume`
--
ALTER TABLE `praktikazeitraeume`
  MODIFY `Praktikumszeit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `semester`
--
ALTER TABLE `semester`
  MODIFY `Semester_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  MODIFY `Teilnehmer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ansprechpartnerliste`
--
ALTER TABLE `ansprechpartnerliste`
  ADD CONSTRAINT `ansprechpartnerliste_ibfk_1` FOREIGN KEY (`Firmen_ID`) REFERENCES `firmen` (`Firmen_ID`),
  ADD CONSTRAINT `ansprechpartnerliste_ibfk_2` FOREIGN KEY (`Berufsziel_ID`) REFERENCES `berufsziel` (`Berufsziel_ID`),
  ADD CONSTRAINT `ansprechpartnerliste_ibfk_3` FOREIGN KEY (`Ansprechpartner_ID`) REFERENCES `ansprechpartner` (`Ansprechpartner_ID`);

--
-- Constraints der Tabelle `praktika`
--
ALTER TABLE `praktika`
  ADD CONSTRAINT `praktika_ibfk_1` FOREIGN KEY (`Teilnehmer_ID`) REFERENCES `teilnehmer` (`Teilnehmer_ID`),
  ADD CONSTRAINT `praktika_ibfk_2` FOREIGN KEY (`Firmen_ID`) REFERENCES `firmen` (`Firmen_ID`),
  ADD CONSTRAINT `praktika_ibfk_3` FOREIGN KEY (`Praktikumszeit_ID`) REFERENCES `praktikazeitraeume` (`Praktikumszeit_ID`);

--
-- Constraints der Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD CONSTRAINT `teilnehmer_ibfk_1` FOREIGN KEY (`Semester_ID`) REFERENCES `semester` (`Semester_ID`),
  ADD CONSTRAINT `teilnehmer_ibfk_2` FOREIGN KEY (`Berufsziel_ID`) REFERENCES `berufsziel` (`Berufsziel_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
