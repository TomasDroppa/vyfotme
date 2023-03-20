-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 20. bře 2023, 18:40
-- Verze serveru: 10.4.25-MariaDB
-- Verze PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `galerie`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `bookings_record`
--

CREATE TABLE `bookings_record` (
  `ID` int(11) NOT NULL,
  `jmeno` varchar(250) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(250) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `telefon` varchar(250) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `bookings_record`
--

INSERT INTO `bookings_record` (`ID`, `jmeno`, `prijmeni`, `telefon`, `email`, `datum`) VALUES
(1, 'Tom', 'Novák', '235468456', 'novaktom@seznam.cz', '2023-02-16'),
(3, '1 500 Kč', 'c', '12346789', 'a@seznam.cz', '2023-02-17'),
(4, 'a', 'c', '12346789', 'a@seznam.cz', '2023-02-18'),
(12, 'Tomáš', 'Droppa', '604762044', 'droppatomas@seznam.cz', '2023-02-23'),
(13, 'Tomáš', 'Droppa', '604762044', 'droppatomas@seznam.cz', '2023-02-23'),
(17, 'Tomáš', 'Droppa', '60476204', 'droppatomas@seznam.cz', '2023-03-21'),
(18, 'Tomáš', 'Droppahhhhhhhhh', '604762044', 'droppatomas@seznam.cz', '2023-03-23');

-- --------------------------------------------------------

--
-- Struktura tabulky `cenik`
--

CREATE TABLE `cenik` (
  `id` int(11) NOT NULL,
  `sluzba` varchar(255) NOT NULL,
  `cena` varchar(255) NOT NULL,
  `delka_foceni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `cenik`
--

INSERT INTO `cenik` (`id`, `sluzba`, `cena`, `delka_foceni`) VALUES
(5, 'gg', 'mgmg', '5556465'),
(14, 'hjkhk', '500', '100'),
(15, 'hjkhk', '500', 'sdfsd'),
(16, 'hjkhk', '500', '100');

-- --------------------------------------------------------

--
-- Struktura tabulky `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `images`
--

INSERT INTO `images` (`id`, `title`, `file_name`, `created`, `modified`, `status`) VALUES
(11, 'ghjg', 'DSC_2714.JPG', '2023-03-07 20:53:03', '2023-03-07 20:53:03', 1),
(12, 'fghj', 'DSC_1899.jpg', '2023-03-07 21:13:51', '2023-03-07 21:13:51', 1),
(13, 'ghjgj', 'DSC_4783.jpg', '2023-03-07 21:14:03', '2023-03-07 21:14:03', 1),
(14, 'ghjgh', 'DSC_4804.jpg', '2023-03-07 21:14:13', '2023-03-07 21:14:13', 1),
(15, 'ghj', 'DSC_6592.jpg', '2023-03-07 21:14:24', '2023-03-18 19:32:32', 1),
(16, 'ghjg', 'SBP_5986.jpg', '2023-03-07 21:14:36', '2023-03-07 21:14:36', 1);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `bookings_record`
--
ALTER TABLE `bookings_record`
  ADD PRIMARY KEY (`ID`);

--
-- Indexy pro tabulku `cenik`
--
ALTER TABLE `cenik`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `bookings_record`
--
ALTER TABLE `bookings_record`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pro tabulku `cenik`
--
ALTER TABLE `cenik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pro tabulku `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
