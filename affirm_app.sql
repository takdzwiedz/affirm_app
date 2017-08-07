-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Sie 2017, 15:42
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
  `date` varchar(10) COLLATE utf8_polish_ci NOT NULL
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
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `sex`, `name`, `city`, `mail`, `password`, `affirmation_history`, `date`, `is_active`, `security`, `is_admin`) VALUES
(1, '', 'Artut', 'Warszawa', 'art.kacprza@gmail.com', '', '', '2017-07-27', 0, '', NULL),
(2, '', 'Artut', 'Warszawa', 'heniek23@gmail.com', '', '', '2017-07-27', 0, '', NULL),
(3, '', 'konkurs', 'Warszawa', '123456789', '', '', '2017-07-27', 0, '', NULL),
(4, '', 'Artut', 'Warszawa', 'heniek2@gmail.com', '', '', '2017-07-27', 0, '', NULL),
(5, '', 'Artut', 'Warszawa', 'michal@andrzejewski.pl', '', '', '2017-07-27', 0, '', NULL),
(6, '', 'Artur', 'Warszawa', 'art.kacprza@gmail.com', '', '', '2017-08-01', 0, '', NULL),
(7, '', 'Artut', 'Warszawa', 'milenka@gmail.com', '', '', '2017-08-01', 0, '', NULL),
(8, '', 'Artut', 'Warszawa', 'michal@andrzejewsky.pl', '', '', '2017-08-02', 0, '', NULL),
(9, '', 'Artur', 'Warszawa', 'michal@andrzejewsiky.pl', '', '', '2017-08-02', 0, '', NULL),
(10, '', 'Artur', 'Warszawa', 'art.kacprza@gmail.com', '', '', '2017-08-02', 0, '', NULL),
(11, '', 'Artur', 'Warszawa', 'art.kacprza@gmail.com', '', '', '2017-08-02', 0, '', NULL),
(12, '', 'Artur', 'Warszawa', 'art.kacprza@gmail.com', '', '', '2017-08-02', 0, '', NULL),
(13, '', 'Artur', 'Warszawa', 'art.kacprza@gmaiyl.com', '', '', '2017-08-02', 0, '', NULL),
(14, '', 'Artut', 'Warszawa', 'art.kacprza2@gmail.com', '', '', '2017-08-02', 0, '', NULL),
(15, '', 'Artut', 'Warszawa', 'art.kacprza2@gmail.com', '', '', '2017-08-02', 0, '', NULL),
(16, '', 'Artur', 'Warszawa', 'art.kacprza@gmaiyl.com', '', '', '2017-08-02', 0, '', NULL),
(17, '', 'Artur', 'Warszawa', 'art.kacprza@gmail.com', '', '', '2017-08-03', 0, '', NULL),
(18, '', 'Artur', 'Warszawa', 'art.kacprza@gmail.com', '', '', '2017-08-03', 0, '', NULL),
(19, '', 'Artur', 'Warszawa', 'art.kacprzak@gmaiyl.com', '', '', '2017-08-03', 0, '', NULL),
(20, '', 'Artur', 'Warszawa', 'art.kacprza@g.com', '', '', '2017-08-04', 0, '93fdc250b89d6d89aaf5b0466d4fb4', NULL),
(21, '', 'Artur', 'Warszawa', 'artur.kacprza@gmail.com', '', '', '2017-08-04', 0, '6d4a2d62a9d1b233274b4cd5bd6111', NULL),
(22, '', 'Artur', 'Warszawa', 'a.kacprza@gmail.com', '', '', '2017-08-04', 0, 'f0e0302bd279830369fb17cf04acfd', NULL),
(23, '', 'Artur', 'Warszawa', 'ar.kacprza@gmaiyl.com', '', '', '2017-08-04', 1, '03c828f90ff78953037e030456bfc3076a52ec31', NULL),
(24, '', 'Ralpf', 'Cannbera', 'ralf@o2.pl', '', '', '2017-08-04', 1, '84cd51123a51b102fb366442f8a2f2c9ac908b18', NULL),
(25, '', 'Ralpf', 'Cannbera', 'ralph@o2.pl', '', '', '2017-08-04', 1, '981d9e3a7c486155b90b048696f2ad55b2ae260a', NULL),
(26, '', 'Milena', 'Warszawa', 'm@gmail.com', '', '', '2017-08-04', 1, 'd49747b3071a524074f7e23fa147b5d5937e3216', NULL),
(27, '', 'Milena', 'Warszawa', 'mi@gmail.com', '', '', '2017-08-04', 1, 'c9b493be4cb19d35f886f7f96f8c852aecfda1ff', NULL),
(28, '', 'Artur', 'Warszawa', 'mil@gmail.com', '', '', '2017-08-04', 1, '14432b0863bf37cd784c30f7897a5f890a8bd502', NULL),
(29, '', 'Pola', 'Londyn', 'pola@o2.pl', '', '', '2017-08-04', 1, '3e368566c61da4d6836e123cdadfcae1e9875e9b', NULL),
(30, '', 'Pola', 'Londyn', 'pola2@op.pl', '', '', '2017-08-04', 1, 'b2f6c9f4f57af9b59ed54c88d2046aa69d4c2415', NULL);

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
  MODIFY `id_affirmation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
