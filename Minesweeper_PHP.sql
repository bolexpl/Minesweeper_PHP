-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 26 Cze 2017, 14:54
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `Minesweeper_PHP`
--
CREATE DATABASE IF NOT EXISTS `Minesweeper_PHP` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `Minesweeper_PHP`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `czas` int(11) NOT NULL,
  `board` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `records`
--

INSERT INTO `records` (`id`, `user_id`, `czas`, `board`) VALUES
(25, 19, 50, '16x16'),
(26, 21, 13, '8x8'),
(27, 21, 89, '16x16'),
(38, 22, 29, '8x8'),
(40, 19, 11, '8x8'),
(45, 19, 14, '8x8'),
(46, 19, 20, '8x8'),
(47, 19, 76, '16x16'),
(49, 21, 84, '16x16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `avatar` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `pass`, `avatar`) VALUES
(19, 'test', 'test@te.st', '$2y$10$dBIcYu2M8M427Urqa2CXJOIsQGbGpONTWCry.kMzuLxRt0.WlE226', 'no_avatar.jpg'),
(21, 'admin', 'admin@ad.min', '$2y$10$bQeJrVTbRtdIfywqxm6Pf.V4OSO0N1Kt1AyVqHXe6gSKBrdaJLF3i', 'no_avatar.jpg'),
(22, 'debug', 'debug@wp.pl', '$2y$10$p2n7xL2kMRIAwR8y5/Xmlu4Bjc1WXETk3TMQmpyTdFFBAoIUUGTnu', 'no_avatar.jpg'),
(29, 'java', 'java@ja.va', '$2a$10$9XQmeShEEy2J48inwRvLPuOsB5y3FiNPtmIVTJruQnXYGF4fUIJZO', 'no_avatar.jpg');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
