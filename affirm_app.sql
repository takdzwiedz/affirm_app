-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Sie 2017, 15:36
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

--
-- Zrzut danych tabeli `affirmation`
--

INSERT INTO `affirmation` (`id_affirmation`, `affirmation`, `author`, `user_rate`, `date`, `time`) VALUES
(1, 'Moje pierwsze mogę zapisane w bazie.', '', 0, '2017-08-08', '1502197171'),
(2, 'Moje pierwsze mogę zapisane w bazie.', '', 0, '2017-08-08', '1502197676'),
(3, 'Moje trzecie mogę zapisane w bazie.', '', 0, '2017-08-08', ''),
(4, 'Moje czwarte mogę zapisane w bazie.', '', 0, '2017-08-08', '1502198019'),
(5, 'Moje 5 mogę zapisane w bazie.', '', 0, '2017-08-08', '1.29789919'),
(6, 'Moje 6 mogę zapisane w bazie.', '', 0, '2017-08-08', '15:18:24'),
(7, 'Moje 7 mogę zapisane w bazie.', '', 0, '08-08-2017 15:2', ''),
(8, 'Moje 8 mogę zapisane w bazie.', '', 0, '08-08-2017', '15:24:04'),
(9, 'Moje 9 mogę zapisane w bazie.', '', 0, '08-08-2017', '15:25:51'),
(10, 'Moje 10 mogę zapisane w bazie.', '', 0, '08-08-2017', '15:26:22'),
(11, 'Moje 11 mogę zapisane w bazie.', '', 0, '08-08-2017', '15:27:36');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `affirmation`
--
ALTER TABLE `affirmation`
  ADD PRIMARY KEY (`id_affirmation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `affirmation`
--
ALTER TABLE `affirmation`
  MODIFY `id_affirmation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
