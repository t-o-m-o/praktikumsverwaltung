-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Mai 2018 um 11:11
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

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
(1, 'Swen', 'Frey', '015784678', 'swen.frey@gmx.de'),
(2, 'Alexander', 'Kohl', '015648756', 'mailap2@mai.com'),
(3, 'Jana', 'Roth', '07621719571', 'Jana.roth@gmail.com'),
(4, 'Franziska', 'Reinhard', '030336855', 'FranziskaReinhard@yahoo.de'),
(5, 'Dennis', 'Bosch', '089447812', 'DennisBosch@googlemail.de'),
(6, 'Jan', 'Schwarz', '0721424032', 'JanSchwarz@web.de');

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
(4, 1, 2, 1),
(2, 1, 2, 2),
(3, 2, 1, 2),
(5, 2, 4, 2),
(6, 3, 1, 5);

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
(1, 'Fachinformatiker/-in Anwendungsentwicklung'),
(2, 'Fachinformatiker/-in Systemintegration'),
(3, 'IT-Systemelektroniker/-in'),
(4, 'Mediengestalter/-in'),
(5, 'IT-Systemkauffrau/-kaufmann'),
(6, 'Industriemechaniker/-in ');

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
(1, 'Abarta Inc', NULL, 'http://www.abarta.com/', '200 Alpha Dr', '15238', 'Pittsburgh', '015478564', 'firma@mail.de'),
(2, 'Associated Publications Inc', 'It is the publisher of some of the very best-selling women’s magazines in the world today. ', 'http://www.associatedpub.com/', '875 North Michigan Avenue', '60611', 'Chicago', '01754586451', 'info@associatedpub.com'),
(3, 'EliteSEO', NULL, 'http://www.eliteseo.de/', 'Berner Heerweg 344', '22159', 'Hamburg', '015487565', 'info@eliteseo.com'),
(4, 'Testfirma4', 'Testbez4', 'www.testseite4.de', 'teststr4', '22564', 'Hamburg', '01548765484', 'test4@mail.de'),
(5, 'Testfirma5', 'Testbez5', 'www.testseite5.de', 'teststr5', '22564', 'Hamburg', '01548763424', 'test5@mail.de'),
(6, 'Testfirma6', 'Testbez6', 'www.testseite6.de', 'teststr6', '22564', 'Hamburg', '01548765345', 'test6@mail.de'),
(7, 'Testfirma7', 'Testbez7', 'www.testseite7.de', 'teststr7', '22564', 'Hamburg', '01544721538', 'test7@mail.de'),
(8, 'Testfirma8', 'Testbez8', 'www.testseite8.de', 'teststr8', '22564', 'Hamburg', '0154487124', 'test8@mail.de'),
(9, 'Testfirma9', 'Testbez9', 'www.testseite9.de', 'teststr9', '22564', 'Hamburg', '01578475864', 'test9@mail.de'),
(16, 'Testfirma10', 'Testbez10', 'www.testseite10.de', 'teststr10', '22564', 'Hamburg', '0154876547', 'test10@mail.de'),
(17, 'Testfirma11', 'Testbez11', 'www.testseite11.de', 'teststr11', '22564', 'Hamburg', '0154487924', 'test11@mail.de'),
(18, 'Testfirma12', 'Testbez12', 'www.testseite12.de', 'teststr12', '22564', 'Hamburg', '0154845775', 'test12@mail.de'),
(19, 'Testfirma15', 'Testbez15', 'www.testseite15.de', 'teststr15', '22564', 'Hamburg', '0154445715', 'test15@mail.de'),
(20, 'Testfirma13', 'Testbez13', 'www.testseite13.de', 'teststr13', '22564', 'Hamburg', '0154467844', 'test13@mail.de'),
(21, 'Testfirma14', 'Testbez14', 'www.testseite14.de', 'teststr14', '22564', 'Hamburg', '01578457314', 'test14@mail.de'),
(22, 'Testfirma16', 'Testbez16', 'www.testseite16.de', 'teststr16', '22564', 'Hamburg', '01548763416', 'test16@mail.de'),
(23, 'Testfirma17', 'Testbez17', 'www.testseite17.de', 'teststr17', '22564', 'Hamburg', '01548765317', 'test17@mail.de'),
(24, 'Testfirma18', 'Testbez18', 'www.testseite18.de', 'teststr18', '22564', 'Hamburg', '01544721518', 'test18@mail.de'),
(25, 'Testfirma19', 'Testbez19', 'www.testseite19.de', 'teststr19', '22564', 'Hamburg', '0154487119', 'test19@mail.de'),
(26, 'Testfirma20', 'Testbez20', 'www.testseite20.de', 'teststr20', '22564', 'Hamburg', '01578475820', 'test20@mail.de'),
(27, 'Testfirma21', 'Testbez21', 'www.testseite21.de', 'teststr21', '22564', 'Hamburg', '0154876521', 'test21@mail.de'),
(28, 'Testfirma22', 'Testbez22', 'www.testseite22.de', 'teststr22', '22564', 'Hamburg', '0154487922', 'test22@mail.de'),
(29, 'Testfirma23', 'Testbez23', 'www.testseite23.de', 'teststr23', '22564', 'Hamburg', '0154845723', 'test23@mail.de'),
(30, 'Testfirma24', 'Testbez24', 'www.testseite24.de', 'teststr24', '22564', 'Hamburg', '0154445724', 'test24@mail.de'),
(31, 'Testfirma25', 'Testbez25', 'www.testseite25.de', 'teststr25', '22564', 'Hamburg', '0154467825', 'test25@mail.de'),
(32, 'Testfirma26', 'Testbez26', 'www.testseite26.de', 'teststr26', '22564', 'Hamburg', '01578457326', 'test26@mail.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontaktliste`
--

CREATE TABLE `kontaktliste` (
  `id` int(11) NOT NULL,
  `Praktikum_ID` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Kontaktbeschreibung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, 1, 1, 1, 'offen'),
(9, 1, 1, 1, 'offen'),
(10, 3, 1, 1, 'offen');

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
(1, '2017-08'),
(2, '2017-02'),
(3, '2018-02');

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
(1, 1, 1, 'Torsten', 'Möller'),
(3, 1, 1, 'Diana', 'Rust'),
(4, 1, 1, 'Steffen', 'Wernke'),
(5, 1, 1, 'Rene', 'Treichel'),
(6, 1, 1, 'Nico', 'Baake'),
(7, 1, 1, 'Leif', 'Hohwy'),
(8, 1, 1, 'Marco', 'Schuppenhauer'),
(9, 1, 1, 'Kim', 'Tang');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `typ` varchar(10) NOT NULL,
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

INSERT INTO `users` (`id`, `typ`, `name`, `email`, `password`, `password_confirmation`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'admin', 'Torsten Möller', 'moetor@web.de', '$2y$10$ZP6Y.VQJeJpxHoE/5kNFDea8cEHCOj4KQl0gqiReRlVMYpazFOTeK', NULL, '2018-05-09 22:52:29', '2018-05-09 22:52:29', 'VO0AtZkl12Lyu0jUZjXleHsB6Cz1GhoZs0YTRKqQ8ZGBHhYSPny6BQaOInPd'),
(2, 'admin', 'Leif', 'leif@web.de', '$2y$10$M6wgqONSAP2SVLOG3jTEMO8ZXh0iK4v6tBwJZIBCe.KDmLI9/qKJi', NULL, '2018-05-14 11:57:49', '2018-05-14 11:57:49', 'Tikkso96rjWo91ounYLz1x70PINj5stdQsrBl3NqfdYe5fRSzcbLiEdaiBLI'),
(3, 'user', 'Steffen', 'steffen@web.de', '$2y$10$v/EbeOeMotrfq2uBQceW0.AlfSuaP6AQ77Ko78IQdC4vjHciY1LcG', NULL, '2018-05-24 08:35:00', '2018-05-24 08:35:00', '2F0RTGAnw7aniUbR4hyBDkthNbTdJoci4YgcYlo3q3nRm7hmuTa1BdoqgQ41');

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
  ADD UNIQUE KEY `Firmen_ID_2` (`Firmen_ID`,`Berufsziel_ID`,`Ansprechpartner_ID`),
  ADD KEY `Firmen_ID` (`Firmen_ID`),
  ADD KEY `Berufsziel_ID` (`Berufsziel_ID`),
  ADD KEY `Ansprechpartner_ID` (`Ansprechpartner_ID`);

--
-- Indizes für die Tabelle `berufsziel`
--
ALTER TABLE `berufsziel`
  ADD PRIMARY KEY (`Berufsziel_ID`);

--
-- Indizes für die Tabelle `firmen`
--
ALTER TABLE `firmen`
  ADD PRIMARY KEY (`Firmen_ID`),
  ADD UNIQUE KEY `Firmenwebseite` (`Firmenwebseite`),
  ADD UNIQUE KEY `Firmenname` (`Firmenname`),
  ADD UNIQUE KEY `Telefon` (`Telefon`),
  ADD UNIQUE KEY `Firmenbezeichnung` (`Firmenbezeichnung`);

--
-- Indizes für die Tabelle `kontaktliste`
--
ALTER TABLE `kontaktliste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Praktikum_ID` (`Praktikum_ID`);

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
  MODIFY `Ansprechpartner_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `ansprechpartnerliste`
--
ALTER TABLE `ansprechpartnerliste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `berufsziel`
--
ALTER TABLE `berufsziel`
  MODIFY `Berufsziel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `firmen`
--
ALTER TABLE `firmen`
  MODIFY `Firmen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT für Tabelle `kontaktliste`
--
ALTER TABLE `kontaktliste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `praktika`
--
ALTER TABLE `praktika`
  MODIFY `Praktikum_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `praktikazeitraeume`
--
ALTER TABLE `praktikazeitraeume`
  MODIFY `Praktikumszeit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `semester`
--
ALTER TABLE `semester`
  MODIFY `Semester_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  MODIFY `Teilnehmer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints der Tabelle `kontaktliste`
--
ALTER TABLE `kontaktliste`
  ADD CONSTRAINT `kontaktliste_ibfk_1` FOREIGN KEY (`Praktikum_ID`) REFERENCES `praktika` (`Praktikum_ID`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `praktika`
--
ALTER TABLE `praktika`
  ADD CONSTRAINT `praktika_ibfk_1` FOREIGN KEY (`Teilnehmer_ID`) REFERENCES `teilnehmer` (`Teilnehmer_ID`) ON DELETE CASCADE,
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
