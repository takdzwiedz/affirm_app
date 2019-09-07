-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 193.218.152.241
-- Czas generowania: 07 Wrz 2019, 21:46
-- Wersja serwera: 5.7.27-30-log
-- Wersja PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db100041556`
--
CREATE DATABASE IF NOT EXISTS `db100041556` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db100041556`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `affirmation_female`
--

CREATE TABLE `affirmation_female` (
  `id_affirmation` int(11) NOT NULL,
  `affirmation` text COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `user_rate` int(11) DEFAULT NULL,
  `date` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `affirmation_male_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `affirmation_male`
--

CREATE TABLE `affirmation_male` (
  `id_affirmation` int(11) NOT NULL,
  `affirmation` text COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `user_rate` int(11) NOT NULL,
  `date` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history_user_affirmation`
--

CREATE TABLE `history_user_affirmation` (
  `hua_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `affirmation_id` int(11) DEFAULT NULL,
  `date` varchar(11) COLLATE utf8_polish_ci DEFAULT NULL,
  `time` varchar(11) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `sex` varchar(1) COLLATE utf8_polish_ci DEFAULT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `mail` text COLLATE utf8_polish_ci,
  `password` varchar(80) COLLATE utf8_polish_ci DEFAULT NULL,
  `affirmation_history` text COLLATE utf8_polish_ci,
  `date` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `is_active` int(1) DEFAULT NULL,
  `security` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `genitive` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `affirmation_female`
--
ALTER TABLE `affirmation_female`
  ADD PRIMARY KEY (`id_affirmation`),
  ADD KEY `affirmation_male_id` (`affirmation_male_id`);

--
-- Indeksy dla tabeli `affirmation_male`
--
ALTER TABLE `affirmation_male`
  ADD PRIMARY KEY (`id_affirmation`);

--
-- Indeksy dla tabeli `history_user_affirmation`
--
ALTER TABLE `history_user_affirmation`
  ADD PRIMARY KEY (`hua_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `affirmation_female`
--
ALTER TABLE `affirmation_female`
  MODIFY `id_affirmation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `affirmation_male`
--
ALTER TABLE `affirmation_male`
  MODIFY `id_affirmation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `history_user_affirmation`
--
ALTER TABLE `history_user_affirmation`
  MODIFY `hua_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

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
