-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 dec 2020 om 14:26
-- Serverversie: 5.7.17
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasegip`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbllid`
--

CREATE TABLE `tbllid` (
  `id` int(11) NOT NULL,
  `oudersid` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `postid` int(11) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefoon` varchar(50) NOT NULL,
  `Wachtwoord` varchar(50) NOT NULL,
  `typegitaarid` int(11) NOT NULL,
  `voorkeurmuziekgenre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbllid`
--

INSERT INTO `tbllid` (`id`, `oudersid`, `naam`, `voornaam`, `postid`, `adres`, `email`, `telefoon`, `Wachtwoord`, `typegitaarid`, `voorkeurmuziekgenre`) VALUES
(1, 1, 'Degroote', 'Sepp', 1, 'veldakkerwegel', 'Sepp@gmail.com', '66666666666', 'niets', 1, 'Metal'),
(2, 2, 'Goosens', 'Rein', 2, 'Ik weet nie', 'aaaa@why', '549849', 'ik weet het  nie', 3, 'metalllll'),
(3, 3, 'Parmentier', 'Kieron', 2, 'sfjdf', 'rako@gmail', '6874984', 'AAAAAAAAAAA', 5, 'aaaaaaaa'),
(4, 4, 'Akbar Ghafouri ', 'Avid', 5, 'AAAAAA', 'avid@gmail.avid', '55468798', 'WAAAAAA', 6, 'AAAAAAAAAAAAAA'),
(5, 5, 'Van Hoecke', 'Matthis', 6, 'sdfsf', 'matis@', '64896', 'warom', 5, 'gdfs'),
(6, 5, 'kjdfgh', 'gfdh', 546, 'dhfj', 'fghj', '54968549', 'gfhj', 5, 'ghfjfg'),
(7, 5, 'ghfj', 'ghjf', 5, 'fghd', 'dfgh', '7586', 'fghj', 5, 'gfhj');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbllid`
--
ALTER TABLE `tbllid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbllid`
--
ALTER TABLE `tbllid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
