-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Aug 2017 um 19:10
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `crexam`
--
CREATE DATABASE IF NOT EXISTS `crexam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crexam`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `bezeichnung` varchar(128) DEFAULT NULL,
  `bezeichnung_kurz` varchar(6) DEFAULT NULL,
  `created` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `lectures`
--

INSERT INTO `lectures` (`id`, `bezeichnung`, `bezeichnung_kurz`, `created`) VALUES
(1, 'Datenbanken', 'DABS', '19.08.2017'),
(2, 'Systemsicherheit', 'SYSSI', '19.08.2017');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `lecture_id` tinyint(3) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `text` varchar(4096) DEFAULT NULL,
  `answer` varchar(4096) DEFAULT NULL,
  `difficulty` tinyint(2) DEFAULT '3',
  `frequency` tinyint(2) DEFAULT '3',
  `points` int(11) DEFAULT '1',
  `space` tinyint(2) DEFAULT '1',
  `created` varchar(16) DEFAULT NULL,
  `last_usage` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `questions`
--

INSERT INTO `questions` (`id`, `lecture_id`, `type`, `text`, `answer`, `difficulty`, `frequency`, `points`, `space`, `created`, `last_usage`) VALUES
(1, 2, 1, 'Was ist ein Brute-Force-Angriff?', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata  voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. ', 1, 3, 10, 2, '19.08.2017', '19.08.2017'),
(4, 2, 0, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '[{\"antwort\":\"16\",\"wahrheitswert\":false},{\"antwort\":\"20\",\"wahrheitswert\":true},{\"antwort\":\"24\",\"wahrheitswert\":false},{\"antwort\":\"abhÃ¤ngig\",\"wahrheitswert\":true},{\"antwort\":\"je nachdem\",\"wahrheitswert\":false},{\"antwort\":\"kommt drauf ankommt drauf ankommt drauf ankommt drauf ankommt drauf an\",\"wahrheitswert\":true}]', 3, 4, 3, 0, '19.08.2017', '19.08.2017'),
(5, 2, 2, 'Wenn A gleich B ist, und C gleich 200, wie schwer ist der Sinn des Leben? Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 4, 5, 10, 1, '19.08.2017', '19.08.2017'),
(6, 2, 0, 'Wie lautet der Befehl zum Anzeigen von Dateien, die als Endung \'.tex\' besitzen?', '[{\"antwort\":\"Befehl1\",\"wahrheitswert\":false},{\"antwort\":\"Befehl2\",\"wahrheitswert\":true},{\"antwort\":\"Befehl3\",\"wahrheitswert\":false},{\"antwort\":\"Befehl4\",\"wahrheitswert\":false},{\"antwort\":\"Befehl5\",\"wahrheitswert\":false},{\"antwort\":\"Befehl6\",\"wahrheitswert\":true},{\"antwort\":\"Befehl7\",\"wahrheitswert\":false}]', 2, 2, 2, 0, '19.08.2017', '19.08.2017'),
(7, 2, 2, 'Abgesehen von ... gibt es eine Vielzahl von ... . Wieso kann man nicht davon ausgehen, dass aufgrund ...', '', 2, 3, 10, 1, '19.08.2017', '19.08.2017'),
(9, 2, 0, 'Wie viele Beine hat eine Spinne?', '[{\"antwort\":\"6\",\"wahrheitswert\":false},{\"antwort\":\"8\",\"wahrheitswert\":true},{\"antwort\":\"10\",\"wahrheitswert\":false},{\"antwort\":\"artspezifisch\",\"wahrheitswert\":false}]', 1, 1, 1, 0, '19.08.2017', '19.08.2017'),
(11, 2, 1, 'ErlÃ¤utern Sie das \"Hand-Shake-Verfahren\"!', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 4, 3, 10, 2, '19.08.2017', '19.08.2017'),
(12, 2, 0, 'Wie hat Ihnen die PrÃ¤sentation des Vorlesungs-Stoffs gefallen?', '[{\"antwort\":\"Ant1\",\"wahrheitswert\":true},{\"antwort\":\"Ant1\",\"wahrheitswert\":false},{\"antwort\":\"Ant1\",\"wahrheitswert\":false}]', 3, 3, 1, 0, '19.08.2017', '19.08.2017'),
(13, 2, 1, 'Um nicht angreifbar zu sein, werden hÃ¤ufig. ErklÃ¤ren Sie, ob diese Methode Sinn ergibt, und in welchen Bereichen Sie Anwendung finden kann. ', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 4, 4, 10, 4, '19.08.2017', '19.08.2017'),
(14, 2, 1, 'Nennen Sie mindestens 3 Methoden, mit denen Angreifer ...', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 2, 2, 10, 2, '19.08.2017', '19.08.2017'),
(15, 2, 1, 'ErlÃ¤utern Sie das Prinzip des \'Social Hackings\'!', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 2, 2, 7, 1, '19.08.2017', '19.08.2017'),
(16, 2, 0, 'Um SicherheitslÃ¼cken zu melden, kann man ...', '[{\"antwort\":\"MÃ¶glichkeit1\",\"wahrheitswert\":true},{\"antwort\":\"MÃ¶glichkeit2\",\"wahrheitswert\":false},{\"antwort\":\"MÃ¶glichkeit3\",\"wahrheitswert\":true},{\"antwort\":\"MÃ¶glichkeit4\",\"wahrheitswert\":false},{\"antwort\":\"MÃ¶glichkeit5\",\"wahrheitswert\":true},{\"antwort\":\"MÃ¶glichkeit6\",\"wahrheitswert\":true},{\"antwort\":\"MÃ¶glichkeit7\",\"wahrheitswert\":true}]', 5, 5, 5, 0, '19.08.2017', '19.08.2017'),
(17, 2, 2, 'Dies ist eine Transferaufgabe. Der Sinn solcher Aufgaben besteht darin, die Kompetenz der Studenten zu testen, gelehrte Inhalte auf andere Bereiche zu Ã¼bertragen. Wieso?', '', 2, 1, 10, 1, '19.08.2017', '19.08.2017'),
(18, 2, 2, 'Transfer Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 2, 4, 10, 1, '19.08.2017', '19.08.2017'),
(19, 2, 1, 'Wenn man zur Aktivierung einer Pay-TV-Chipkarte durch positive Adressierung eine\nSchlÃ¼sselhierarchie verwendet, der fÃ¼r 1.000.000 Kunden ein ternÃ¤rer Baum (d.h. ein Baum, bei\ndem jeder Knoten drei Nachfolger hat) verwendet, wie viele Kryptogramme benÃ¶tigt man dann zur\nDeaktivierung einer Chipkarte? ', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 1, 5, 15, 1, '19.08.2017', '19.08.2017'),
(20, 2, 1, 'Der selbe Kartenhersteller gibt Ihnen nun eine weitere Karte zur Untersuchung.\nDie offentlichen Parameter dieser Chipkarte lauten: n = 221 und e = 5. Sie\nmanipulieren die Karte so, dass bei der Signaturerstellung ein Fehler in mp auftritt.\nDaraufhin gibt Ihnen die Karte fÃ¼r die Nachricht m = 18 die (fehlerhafte)\nSignatur s\n0 = 52 aus. Faktorisieren Sie mit diesen Informationen n in p und q!', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 2, 4, 6, 2, '19.08.2017', '19.08.2017'),
(21, 2, 2, 'Gegeben sei die RC4-Stromchiffre mit einer WortgroÃŸe von 3 Bit, d.h. N=23 = 8.\nDer Initialisierungsvektor IV = K[0. . . 2] besteht aus drei Worten (6, 7, 2). Bekannt\nsind weiterhin auch der gesamte Rest des Schlussels K[3. . . 5] = (3, 4, 5) und das\nWLAN-Frame 6724678 in der Form â€œIV||Chiffratâ€œ', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 2, 1, 10, 1, '19.08.2017', '19.08.2017'),
(22, 2, 2, 'Das ist ein Test. Warum braucht es Transferaufgaben? WÃ¤re es nicht besser ...?', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 3, 3, 10, 1, '19.08.2017', '19.08.2017'),
(24, 2, 1, 'Wie oft muss man gewinnen, damit es mÃ¶glich ist? ErklÃ¤ren Sie das PhÃ¤nomen!', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 3, 5, 13, 1, '19.08.2017', '19.08.2017');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
