-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 25 Maj 2020, 20:56
-- Wersja serwera: 5.7.26-29-log
-- Wersja PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `32471618_filmoteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `audio`
--

CREATE TABLE `audio` (
  `IdAudio` int(100) NOT NULL,
  `Audio` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `audio`
--

INSERT INTO `audio` (`IdAudio`, `Audio`) VALUES
(1, 'Lektor'),
(2, 'Dubbing'),
(3, 'Napisy'),
(4, 'Polski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `IdFilmy` int(100) NOT NULL,
  `Tytul` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `IdRodzaj` int(100) NOT NULL,
  `IdGatunek` int(100) NOT NULL,
  `IdRezyser` int(100) NOT NULL,
  `IdAudio` int(100) NOT NULL,
  `Data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`IdFilmy`, `Tytul`, `IdRodzaj`, `IdGatunek`, `IdRezyser`, `IdAudio`, `Data`) VALUES
(1, 'Pogranicze w ogniu', 2, 2, 1, 4, '2020-05-25 20:30:32'),
(2, 'Europa, Europa', 1, 1, 2, 4, '2020-05-25 20:30:32'),
(3, 'Wyrok na Franciszka Kłosa', 1, 6, 3, 4, '2020-05-25 20:32:19'),
(4, 'Bękarty Wojnt', 1, 1, 4, 2, '2020-05-25 20:32:19'),
(5, 'Jak rozpętałem drugą wojnę światową', 1, 5, 5, 4, '2020-05-25 20:33:50'),
(6, 'Sami swoi', 1, 5, 6, 4, '2020-05-25 20:35:43');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunek`
--

CREATE TABLE `gatunek` (
  `IdGatunek` int(100) NOT NULL,
  `Gatunek` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gatunek`
--

INSERT INTO `gatunek` (`IdGatunek`, `Gatunek`) VALUES
(1, 'Wojenny'),
(2, 'Szpiegowski'),
(3, 'Sensacyjny'),
(4, 'Kryminał'),
(5, 'Komedia'),
(6, 'Dramat');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzja`
--

CREATE TABLE `recenzja` (
  `IdRecenzja` int(100) NOT NULL,
  `Tresc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Efekty` int(1) NOT NULL,
  `Fabula` int(1) NOT NULL,
  `Muzyka` int(1) NOT NULL,
  `Ocena` int(1) NOT NULL,
  `IdFilmy` int(100) NOT NULL,
  `IdRecenzent` int(100) NOT NULL,
  `Data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `recenzja`
--

INSERT INTO `recenzja` (`IdRecenzja`, `Tresc`, `Efekty`, `Fabula`, `Muzyka`, `Ocena`, `IdFilmy`, `IdRecenzent`, `Data`) VALUES
(1, 'Klasyka polskiego kina - film, do którego warto zawsze wrócić. Mimo obejrzenia do kilkukrotnie, zawsze człowiek się śmieje. ', 6, 10, 8, 10, 6, 1, '2020-05-25 20:38:51'),
(2, 'Pokazanie historii polskiego policjanta, który podczas okupacji kolaborował z hitlerowskim okupantem. Wierzył w to co robi i wykonywał swoja pracę sumiennie. Dostał wyrok śmierci od Polskiego Państwa Podziemnego. ', 5, 8, 6, 8, 3, 1, '2020-05-25 20:44:10'),
(3, 'Jeden z lepszych polskich seriali szpiegowskich ukazujących walkę \"przyjaciół\", którzy stali po dwóch różnych stronach. Defakto, oprócz rywalizacji pomiędzy nimi, scenarzysta pokazał jak działał polski wywiadu oraz niemiecka Abwehry w okresie międzywojenny. Jak byli werbowani agencji itd.   ', 7, 10, 7, 9, 1, 1, '2020-05-25 20:51:45');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezyser`
--

CREATE TABLE `rezyser` (
  `IdRezyser` int(100) NOT NULL,
  `Imie` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rezyser`
--

INSERT INTO `rezyser` (`IdRezyser`, `Imie`, `Nazwisko`) VALUES
(1, 'Andrzej', 'Konic'),
(2, 'Agnieszka', 'Holland'),
(3, 'Andrzej', 'Wajda'),
(4, 'Quentin', 'Tarantino'),
(5, 'Tadeusz', 'Chmielewski'),
(6, 'Sylwester', 'Chęciński');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj`
--

CREATE TABLE `rodzaj` (
  `IdRodzaj` int(100) NOT NULL,
  `Rodzaj` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rodzaj`
--

INSERT INTO `rodzaj` (`IdRodzaj`, `Rodzaj`) VALUES
(1, 'Film'),
(2, 'Serial'),
(3, 'Miniserial'),
(4, 'Animacja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `IdUzytkownik` int(100) NOT NULL,
  `Login` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Imie` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`IdUzytkownik`, `Login`, `Haslo`, `Imie`, `Nazwisko`) VALUES
(1, 'rgzyl', 'filmoteka', 'Radosław', 'Gzyl'),
(2, 'coleksy', 'filmoteka', 'Czesław', 'Oleksy');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`IdAudio`);

--
-- Indeksy dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`IdFilmy`),
  ADD KEY `IdAudio` (`IdAudio`),
  ADD KEY `IdGatunek` (`IdGatunek`),
  ADD KEY `IdRezyser` (`IdRezyser`),
  ADD KEY `IdRodzaj` (`IdRodzaj`);

--
-- Indeksy dla tabeli `gatunek`
--
ALTER TABLE `gatunek`
  ADD PRIMARY KEY (`IdGatunek`);

--
-- Indeksy dla tabeli `recenzja`
--
ALTER TABLE `recenzja`
  ADD PRIMARY KEY (`IdRecenzja`),
  ADD KEY `IdFilmy` (`IdFilmy`),
  ADD KEY `IdRecenzent` (`IdRecenzent`);

--
-- Indeksy dla tabeli `rezyser`
--
ALTER TABLE `rezyser`
  ADD PRIMARY KEY (`IdRezyser`);

--
-- Indeksy dla tabeli `rodzaj`
--
ALTER TABLE `rodzaj`
  ADD PRIMARY KEY (`IdRodzaj`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`IdUzytkownik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `audio`
--
ALTER TABLE `audio`
  MODIFY `IdAudio` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `filmy`
--
ALTER TABLE `filmy`
  MODIFY `IdFilmy` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `gatunek`
--
ALTER TABLE `gatunek`
  MODIFY `IdGatunek` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `recenzja`
--
ALTER TABLE `recenzja`
  MODIFY `IdRecenzja` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `rezyser`
--
ALTER TABLE `rezyser`
  MODIFY `IdRezyser` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `rodzaj`
--
ALTER TABLE `rodzaj`
  MODIFY `IdRodzaj` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `IdUzytkownik` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD CONSTRAINT `filmy_ibfk_1` FOREIGN KEY (`IdAudio`) REFERENCES `audio` (`IdAudio`),
  ADD CONSTRAINT `filmy_ibfk_2` FOREIGN KEY (`IdGatunek`) REFERENCES `gatunek` (`IdGatunek`),
  ADD CONSTRAINT `filmy_ibfk_3` FOREIGN KEY (`IdRezyser`) REFERENCES `rezyser` (`IdRezyser`),
  ADD CONSTRAINT `filmy_ibfk_4` FOREIGN KEY (`IdRodzaj`) REFERENCES `rodzaj` (`IdRodzaj`);

--
-- Ograniczenia dla tabeli `recenzja`
--
ALTER TABLE `recenzja`
  ADD CONSTRAINT `recenzja_ibfk_1` FOREIGN KEY (`IdFilmy`) REFERENCES `filmy` (`IdFilmy`),
  ADD CONSTRAINT `recenzja_ibfk_2` FOREIGN KEY (`IdRecenzent`) REFERENCES `uzytkownik` (`IdUzytkownik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
