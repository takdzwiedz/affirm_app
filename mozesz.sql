-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 09 Sie 2019, 11:08
-- Wersja serwera: 5.7.26
-- Wersja PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mozesz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `affirmation_female`
--

DROP TABLE IF EXISTS `affirmation_female`;
CREATE TABLE IF NOT EXISTS `affirmation_female` (
  `id_affirmation` int(11) NOT NULL AUTO_INCREMENT,
  `affirmation` text COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `user_rate` int(11) DEFAULT NULL,
  `date` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `affirmation_male_id` int(11) NOT NULL,
  PRIMARY KEY (`id_affirmation`),
  KEY `affirmation_male_id` (`affirmation_male_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `affirmation_male`
--

DROP TABLE IF EXISTS `affirmation_male`;
CREATE TABLE IF NOT EXISTS `affirmation_male` (
  `id_affirmation` int(11) NOT NULL AUTO_INCREMENT,
  `affirmation` text COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `user_rate` int(11) DEFAULT NULL,
  `date` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_affirmation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history_user_affirmation`
--

DROP TABLE IF EXISTS `history_user_affirmation`;
CREATE TABLE IF NOT EXISTS `history_user_affirmation` (
  `hua_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `affirmation_id` int(11) NOT NULL,
  `date` varchar(11) COLLATE utf8_polish_ci DEFAULT NULL,
  `time` varchar(11) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`hua_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `sex` text COLLATE utf8_polish_ci,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `mail` text COLLATE utf8_polish_ci,
  `password` varchar(80) COLLATE utf8_polish_ci DEFAULT NULL,
  `affirmation_history` text COLLATE utf8_polish_ci,
  `date` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `is_active` int(1) DEFAULT NULL,
  `security` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `genitive` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `affirmation_female`
--
ALTER TABLE `affirmation_female`
  ADD CONSTRAINT `affirmation_female_ibfk_1` FOREIGN KEY (`affirmation_male_id`) REFERENCES `affirmation_male` (`id_affirmation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
