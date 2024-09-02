-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 02, 2024 at 12:00 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konsultanci`
--

CREATE TABLE `konsultanci` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `Zdjecie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultanci`
--

INSERT INTO `konsultanci` (`Id`, `Imie`, `Nazwisko`, `Zdjecie`) VALUES
(2, 'Darek', 'Lokalniak', 'trollface.png'),
(5, 'Andrzej', 'Stefaniuk', 'trollface.png'),
(10, 'Mateusz', 'Urbański', 'trollface.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operacje`
--

CREATE TABLE `operacje` (
  `Id_klienta` int(11) UNSIGNED NOT NULL,
  `Od_kogo` varchar(30) NOT NULL,
  `Kwota` int(11) NOT NULL,
  `Saldo` int(11) NOT NULL,
  `Komentarz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operacje`
--

INSERT INTO `operacje` (`Id_klienta`, `Od_kogo`, `Kwota`, `Saldo`, `Komentarz`) VALUES
(2, 'Od kogos', 120, 120, 'XD'),
(2, 'klient', 23, 143, 'A mam'),
(2, 'klient', 23, 166, 'A mam'),
(2, 'student', 100, 336, 'Dzięki'),
(2, 'student', 4, 240, 'Sprawdzam'),
(2, 'student', 100, 600, 'Masz'),
(2, 'student', 40, 540, 'Test'),
(2, 'student', 300, 900, 'Za piwo'),
(2, 'klient', 50, 950, 'No'),
(2, 'klient', -300, 650, 'Oddaje'),
(2, 'klient', 50, 700, 'XD'),
(2, 'klient', -300, 400, 'Masz'),
(2, '1', -10, 390, 'Test'),
(2, '2', 500, 1450, 'Oddaje'),
(2, 'student', 10, 1460, 'AL'),
(2, 'student', 50, 1510, 'Test'),
(2, 'student', 1, 1511, 'a'),
(2, 'student', 1, 1512, 'a'),
(2, 'student', 15, 1527, 'Test'),
(2, 'student', 12, 1539, ''),
(2, 'student', 235, 1774, ''),
(2, 'student', 122, 1896, 'eo'),
(2, 'klient', -100, 1796, 'Przelew od klient (id 2) do student (id 1) na kwote 100zl'),
(2, 'klient', 3, 1799, '1'),
(2, 'klient', 3, 1802, '1'),
(2, 'klient', 1, 1803, '3'),
(2, 'klient', -1, 1802, '3'),
(2, 'klient', 1, 1803, '1'),
(2, 'klient', 1, 1804, '1'),
(2, 'klient', 1, 1805, '1'),
(10, 'admin', 1, 1, ''),
(10, 'admin', 111, 112, ''),
(10, 'admin', -1, 111, ''),
(2, 'admin', 1, 1897, ''),
(10, 'admin', -110, 1, ''),
(2, 'admin', 110, 2007, ''),
(10, 'admin', -1, 0, ''),
(2, 'admin', 1, 2008, ''),
(10, 'admin', 1, 2, ''),
(10, 'admin', -1, 1, ''),
(2, 'admin', 1, 2009, ''),
(10, 'admin', -1, 0, ''),
(2, 'admin', 1, 2010, ''),
(10, 'admin', 1, 2, ''),
(10, 'admin', 1, 2, ''),
(10, 'admin', 1, 2, ''),
(10, 'admin', 1, 2, ''),
(10, 'admin', 2, 3, ''),
(10, 'admin', 3, 4, ''),
(10, 'admin', 4, 5, ''),
(10, 'admin', 111, 112, ''),
(10, 'admin', 1, 2, ''),
(10, 'admin', 2, 3, ''),
(10, 'admin', 11, 14, ''),
(10, 'admin', 1, 15, ''),
(10, 'admin', -1, 14, ''),
(2, 'admin', 1, 2011, ''),
(10, 'admin', -1, 13, ''),
(2, 'admin', 1, 2012, ''),
(10, 'admin', -2, 11, ''),
(2, 'admin', 2, 2014, ''),
(10, 'admin', -1, 10, ''),
(10, 'admin', 1, 113, ''),
(10, 'admin', -11, 102, ''),
(10, 'admin', 11, 124, ''),
(10, 'admin', -1, 123, ''),
(10, 'admin', 1, 125, ''),
(10, 'admin', -1, 124, ''),
(10, 'admin', 1, 126, ''),
(10, 'admin', -1, 125, ''),
(2, 'admin', 1, 2015, ''),
(12, 'bank', 100, 100, 'Założenie konta'),
(12, 'test', 1, 101, ''),
(12, 'test', 2, 103, ''),
(12, 'test', 1, 104, ''),
(12, 'test', 100, 204, ''),
(12, 'test', 96, 300, ''),
(12, 'test', -1, 299, ''),
(2, 'test', 1, 2016, ''),
(12, 'test', -1, 298, ''),
(10, 'test', 1, 127, ''),
(12, 'test', -1, 297, ''),
(11, 'test', 1, 1, ''),
(13, 'bank', 100, 100, 'Założenie konta'),
(14, 'bank', 100, 100, 'Założenie konta');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `Id` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL,
  `IdKonsultanta` int(10) UNSIGNED NOT NULL,
  `Nick` varchar(50) NOT NULL,
  `Ocena` int(11) NOT NULL,
  `Tresc` varchar(500) NOT NULL,
  `Data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recenzje`
--

INSERT INTO `recenzje` (`Id`, `idUzytkownika`, `IdKonsultanta`, `Nick`, `Ocena`, `Tresc`, `Data`) VALUES
(15, 0, 0, 'student', 1, '1', '2024-08-29 19:34:43'),
(16, 0, 0, 'student', 1, '1', '2024-08-29 19:34:49'),
(25, 0, 0, 'student', 1, '1432', '2024-08-29 20:02:44'),
(30, 0, 0, 'student', 1, '12', '2024-08-29 20:13:28'),
(31, 0, 0, 'student', 1, '12', '2024-08-29 20:13:31'),
(32, 0, 0, 'student', 1, '31', '2024-08-29 20:13:34'),
(33, 0, 0, 'student', 1, '1111', '2024-08-29 20:13:52'),
(34, 0, 0, 'student', 1, '12', '2024-08-29 20:16:16'),
(35, 0, 0, 'student', 3, 'cos', '2024-08-30 01:20:33'),
(36, 0, 0, 'student', 1, '1', '2024-08-30 13:48:35'),
(37, 0, 0, 'student', 5, 'kozak', '2024-08-31 10:43:56'),
(38, 0, 0, 'klient', 4, 'no', '2024-08-31 10:46:59'),
(39, 0, 5, 'klient', 5, 'fajny chłopak', '2024-09-01 17:49:40');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubieni`
--

CREATE TABLE `ulubieni` (
  `Id` int(10) UNSIGNED NOT NULL,
  `IdKonsultanta` int(10) UNSIGNED NOT NULL,
  `IdUzytkownika` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulubieni`
--

INSERT INTO `ulubieni` (`Id`, `IdKonsultanta`, `IdUzytkownika`) VALUES
(16, 2, 12),
(17, 5, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Haslo` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`Id`, `Login`, `Haslo`, `Email`) VALUES
(2, 'klient', 'de3f7eb864993cb4b3a3187f3847810b', 'KLIENCIK@POOO'),
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.admin'),
(11, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 'student'),
(12, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test'),
(13, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(14, 'testUser', '33ef37db24f3a27fb520847dcd549e9f', 'testUser@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `konsultanci`
--
ALTER TABLE `konsultanci`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `operacje`
--
ALTER TABLE `operacje`
  ADD KEY `Id_klienta` (`Id_klienta`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idUzytkownika` (`idUzytkownika`),
  ADD KEY `IdKonsultanta` (`IdKonsultanta`);

--
-- Indeksy dla tabeli `ulubieni`
--
ALTER TABLE `ulubieni`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdKonsultanta` (`IdKonsultanta`),
  ADD KEY `IdUzytkownika` (`IdUzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsultanci`
--
ALTER TABLE `konsultanci`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ulubieni`
--
ALTER TABLE `ulubieni`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `operacje`
--
ALTER TABLE `operacje`
  ADD CONSTRAINT `operacje_ibfk_1` FOREIGN KEY (`Id_klienta`) REFERENCES `uzytkownicy` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulubieni`
--
ALTER TABLE `ulubieni`
  ADD CONSTRAINT `ulubieni_ibfk_1` FOREIGN KEY (`IdKonsultanta`) REFERENCES `konsultanci` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulubieni_ibfk_2` FOREIGN KEY (`IdUzytkownika`) REFERENCES `uzytkownicy` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
