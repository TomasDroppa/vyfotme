-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 16. úno 2023, 11:28
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
-- Databáze: `bookingsysystem`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `bookings_record`
--

CREATE TABLE `bookings_record` (
  `ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(250) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `LASTNAME` varchar(250) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `PHONE` varchar(250) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `EMAIL` varchar(250) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `bookings_record`
--

INSERT INTO `bookings_record` (`ID`, `FIRSTNAME`, `LASTNAME`, `PHONE`, `EMAIL`, `DATE`) VALUES
(1, 'Tomáš', 'novák', '604762044', 'droppatomas@seznam.cz', '2023-02-16'),
(3, 'a', 'c', '12346789', 'a@seznam.cz', '2023-02-17'),
(4, 'a', 'c', '12346789', 'a@seznam.cz', '2023-02-18'),
(5, 'a', 'c', '12346789', 'a@seznam.cz', '2023-02-18'),
(11, 'Tomáš', 'Droppa', '604762044', 'droppatomas@seznam.cz', '2023-02-20');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `bookings_record`
--
ALTER TABLE `bookings_record`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `bookings_record`
--
ALTER TABLE `bookings_record`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
