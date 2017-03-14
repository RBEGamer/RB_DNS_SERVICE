-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 14. Mrz 2017 um 11:09
-- Server Version: 5.5.54-0+deb8u1
-- PHP-Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `rbdns`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ip_lookup`
--

CREATE TABLE IF NOT EXISTS `ip_lookup` (
`id` int(11) NOT NULL,
  `uuid` text NOT NULL,
  `dest_ip_v4` varchar(16) NOT NULL DEFAULT '109.230.230.209',
  `dest_ip_port` int(11) NOT NULL DEFAULT '80',
  `device_type` text NOT NULL,
  `device_name` text NOT NULL,
  `device_pw` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `ignore` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `ip_lookup`
--

INSERT INTO `ip_lookup` (`id`, `uuid`, `dest_ip_v4`, `dest_ip_port`, `device_type`, `device_name`, `device_pw`, `last_update`, `creation_date`, `params`, `ignore`) VALUES
(10, 'UUID HERE', 'IP HERE', 80, 'cagelight', 'CAGE_LIGHT_GITHUB', '62260545', '2017-03-13 22:12:02', '0000-00-00 00:00:00', '1', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`id` int(11) NOT NULL,
  `message` text NOT NULL,
  `ip` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `log`
--

INSERT INTO `log` (`id`, `message`, `ip`, `time`) VALUES
(43, 'register device ip', '', '2017-03-13 22:12:02'),
(44, 'update device ip', '', '2017-03-13 22:16:37'),
(186, 'update device ip', '', '2017-03-14 09:59:26'),
(187, 'update device ip', '', '2017-03-14 10:04:26');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ip_lookup`
--
ALTER TABLE `ip_lookup`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ip_lookup`
--
ALTER TABLE `ip_lookup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `log`
--
ALTER TABLE `log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=188;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
