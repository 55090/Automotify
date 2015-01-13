-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jan 2015 um 00:08
-- Server Version: 5.6.16
-- PHP-Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `php`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `termine`
--

CREATE TABLE IF NOT EXISTS `termine` (
  `termin_id` int(30) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(30) NOT NULL,
  `n_name` varchar(30) NOT NULL,
  `strasse` varchar(30) NOT NULL,
  `plz` int(5) NOT NULL,
  `ort` varchar(30) NOT NULL,
  `telnr` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fahrzeug` varchar(30) NOT NULL,
  `baujahr` date NOT NULL,
  `hsn` varchar(30) NOT NULL,
  `tsn` varchar(30) NOT NULL,
  `service` varchar(30) NOT NULL,
  `versicherung` varchar(30) NOT NULL,
  `terminwunsch` date NOT NULL,
  `uhrzeit` time(6) NOT NULL,
  `nachricht` varchar(500) NOT NULL,
  PRIMARY KEY (`termin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Daten für Tabelle `termine`
--

INSERT INTO `termine` (`termin_id`, `v_name`, `n_name`, `strasse`, `plz`, `ort`, `telnr`, `email`, `fahrzeug`, `baujahr`, `hsn`, `tsn`, `service`, `versicherung`, `terminwunsch`, `uhrzeit`, `nachricht`) VALUES
(1, 'Mudda', 'Deine', 'Muddastr 12', 12123, 'Börlin', 12345, 'deimudda@mudda.com', 'muddicar', '2015-01-14', '111', 'wwww', '', '', '2015-01-15', '12:30:00.000000', 'Deine Mudda will n cooles Car'),
(10, 'Kool', 'Savas', '', 0, '', 0, '', '', '2015-01-13', '', '', '', '', '0000-00-00', '00:00:00.000000', ''),
(14, 'd', 'd', 'sasa 32', 0, '', 0, '', '', '2015-01-13', '', '', '', '', '0000-00-00', '00:00:00.000000', ''),
(24, 'v', 'v', 'v', 0, 'v', 0, '', '', '2015-01-13', '', '', '', '', '0000-00-00', '00:00:00.000000', ''),
(26, 'etr', 'ter', 'tre', 0, 'tretre', 0, 'dgfsgfd@wef.sd', 'Audi 801', '2015-01-14', '', '', '', '', '0000-00-00', '00:00:00.000000', ''),
(27, 'wer', 'rew', 'rwe', 0, 'wre', 0, 'rwe@wer.wer', '', '2014-08-07', '', '', '', '', '0000-00-00', '00:00:00.000000', 'wrwerewwerrewwererwerwerwerwrewerwfdsdafasdddddddfffffffffwerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
