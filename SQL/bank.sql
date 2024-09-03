-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 03, 2024 at 09:26 PM
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
(2, 'Darek', 'Lokalniak', 'konsultant1.png'),
(10, 'Mateusz', 'Urbański', 'konsultant3.png'),
(11, 'Andrzej', 'Stefaniuk', 'konsultant2.png');

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
(16, 'bank', 100, 100, 'Założenie konta'),
(17, 'bank', 100, 100, 'Założenie konta'),
(17, 'student', -1, 99, ''),
(16, 'student', 1, 101, ''),
(17, 'student', -1, 98, ''),
(16, 'student', 1, 102, '');

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
(20, 2, 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Haslo` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Rola` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`Id`, `Login`, `Haslo`, `Email`, `Rola`) VALUES
(16, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.admin', 'admin'),
(17, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 'student', 'user');

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
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ulubieni`
--
ALTER TABLE `ulubieni`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
