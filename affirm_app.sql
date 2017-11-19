-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Sie 2017, 15:48
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `affirm_app`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `affirmation`
--

CREATE TABLE `affirmation` (
  `id_affirmation` int(11) NOT NULL,
  `affirmation` text COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `user_rate` int(11) NOT NULL,
  `date` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `sex` text COLLATE utf8_polish_ci NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `mail` text COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_polish_ci NOT NULL,
  `affirmation_history` text COLLATE utf8_polish_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `is_active` int(1) NOT NULL,
  `security` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `is_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `affirmation`
--
ALTER TABLE `affirmation`
  ADD PRIMARY KEY (`id_affirmation`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `affirmation`
--
ALTER TABLE `affirmation`
  MODIFY `id_affirmation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
