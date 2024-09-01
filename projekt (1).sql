-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Wrz 01, 2024 at 11:25 PM
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
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jezyki`
--

CREATE TABLE `jezyki` (
  `id_jezyka` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jezyki`
--

INSERT INTO `jezyki` (`id_jezyka`, `nazwa`) VALUES
(1, 'angielski'),
(2, 'polski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jezyk_ang`
--

CREATE TABLE `jezyk_ang` (
  `id` int(11) NOT NULL,
  `id_jezyka` int(11) DEFAULT NULL,
  `tekst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jezyk_ang`
--

INSERT INTO `jezyk_ang` (`id`, `id_jezyka`, `tekst`) VALUES
(1, 1, 'abacus'),
(2, 1, 'apple'),
(3, 1, 'banana'),
(4, 1, 'cat'),
(5, 1, 'dog'),
(6, 1, 'elephant'),
(7, 1, 'flower'),
(8, 1, 'grape'),
(9, 1, 'hat'),
(10, 1, 'ice'),
(11, 1, 'juice'),
(12, 1, 'kite'),
(13, 1, 'lion'),
(14, 1, 'moon'),
(15, 1, 'night'),
(16, 1, 'orange'),
(17, 1, 'pen'),
(18, 1, 'queen'),
(19, 1, 'rose'),
(20, 1, 'sun'),
(21, 1, 'tree'),
(22, 1, 'umbrella'),
(23, 1, 'violet'),
(24, 1, 'water'),
(25, 1, 'xylophone'),
(26, 1, 'yarn'),
(27, 1, 'zebra'),
(28, 1, 'ant'),
(29, 1, 'ball'),
(30, 1, 'car'),
(31, 1, 'door'),
(32, 1, 'egg'),
(33, 1, 'fish'),
(34, 1, 'grape'),
(35, 1, 'hat'),
(36, 1, 'ice'),
(37, 1, 'jacket'),
(38, 1, 'key'),
(39, 1, 'lamp'),
(40, 1, 'mouse'),
(41, 1, 'needle'),
(42, 1, 'octopus'),
(43, 1, 'penguin'),
(44, 1, 'quilt'),
(45, 1, 'rose'),
(46, 1, 'star'),
(47, 1, 'train'),
(48, 1, 'umbrella'),
(49, 1, 'violin'),
(50, 1, 'whale'),
(51, 1, 'xylophone'),
(52, 1, 'yogurt'),
(53, 1, 'zebra'),
(54, 1, 'airplane'),
(55, 1, 'bottle'),
(56, 1, 'cup'),
(57, 1, 'desk'),
(58, 1, 'envelope'),
(59, 1, 'fork'),
(60, 1, 'glove'),
(61, 1, 'hat'),
(62, 1, 'island'),
(63, 1, 'juice'),
(64, 1, 'key'),
(65, 1, 'lamp'),
(66, 1, 'notebook'),
(67, 1, 'orange'),
(68, 1, 'pencil'),
(69, 1, 'quill'),
(70, 1, 'robot'),
(71, 1, 'shoes'),
(72, 1, 'table'),
(73, 1, 'underwear'),
(74, 1, 'vase'),
(75, 1, 'window'),
(76, 1, 'xylophone'),
(77, 1, 'yarn'),
(78, 1, 'zebra'),
(79, 1, 'air'),
(80, 1, 'bread'),
(81, 1, 'chair'),
(82, 1, 'door'),
(83, 1, 'egg'),
(84, 1, 'fan'),
(85, 1, 'guitar'),
(86, 1, 'hat'),
(87, 1, 'insect'),
(88, 1, 'jacket'),
(89, 1, 'key'),
(90, 1, 'lemon'),
(91, 1, 'mug'),
(92, 1, 'nut'),
(93, 1, 'owl'),
(94, 1, 'pen'),
(95, 1, 'quilt'),
(96, 1, 'rabbit'),
(97, 1, 'sock'),
(98, 1, 'towel'),
(99, 1, 'umbrella'),
(100, 1, 'vase'),
(101, 1, 'watch'),
(102, 1, 'xylophone'),
(103, 1, 'yogurt'),
(104, 1, 'zebra'),
(105, 1, 'art'),
(106, 1, 'bicycle'),
(107, 1, 'candle'),
(108, 1, 'drum'),
(109, 1, 'eggplant'),
(110, 1, 'flag'),
(111, 1, 'glue'),
(112, 1, 'hat'),
(113, 1, 'ice'),
(114, 1, 'jigsaw'),
(115, 1, 'kite'),
(116, 1, 'lawn'),
(117, 1, 'mango'),
(118, 1, 'nest'),
(119, 1, 'orange'),
(120, 1, 'pillow'),
(121, 1, 'quilt'),
(122, 1, 'rose'),
(123, 1, 'scarf'),
(124, 1, 'toy'),
(125, 1, 'umbrella'),
(126, 1, 'vase'),
(127, 1, 'wand'),
(128, 1, 'xylophone'),
(129, 1, 'yarn'),
(130, 1, 'zebra');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jezyk_pl`
--

CREATE TABLE `jezyk_pl` (
  `id` int(11) NOT NULL,
  `id_jezyka` int(11) DEFAULT NULL,
  `tekst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jezyk_pl`
--

INSERT INTO `jezyk_pl` (`id`, `id_jezyka`, `tekst`) VALUES
(1, 2, 'abecadło'),
(2, 2, 'akcent'),
(3, 2, 'balon'),
(4, 2, 'barwa'),
(5, 2, 'budynek'),
(6, 2, 'butelka'),
(7, 2, 'ciasto'),
(8, 2, 'czekolada'),
(9, 2, 'długopis'),
(10, 2, 'dom'),
(11, 2, 'drzewo'),
(12, 2, 'dźwięk'),
(13, 2, 'energia'),
(14, 2, 'ekran'),
(15, 2, 'flagi'),
(16, 2, 'film'),
(17, 2, 'gitary'),
(18, 2, 'godzina'),
(19, 2, 'herbata'),
(20, 2, 'historia'),
(21, 2, 'igła'),
(22, 2, 'internet'),
(23, 2, 'jabłko'),
(24, 2, 'jajko'),
(25, 2, 'kalendarz'),
(26, 2, 'kamera'),
(27, 2, 'kapelusz'),
(28, 2, 'karta'),
(29, 2, 'klocki'),
(30, 2, 'książka'),
(31, 2, 'lampka'),
(32, 2, 'laptop'),
(33, 2, 'lód'),
(34, 2, 'macierzyństwo'),
(35, 2, 'marmur'),
(36, 2, 'mebel'),
(37, 2, 'mikrofon'),
(38, 2, 'morze'),
(39, 2, 'muzyka'),
(40, 2, 'okno'),
(41, 2, 'ocean'),
(42, 2, 'ołówek'),
(43, 2, 'obraz'),
(44, 2, 'opaska'),
(45, 2, 'owoc'),
(46, 2, 'paczka'),
(47, 2, 'piekarnik'),
(48, 2, 'pies'),
(49, 2, 'planet'),
(50, 2, 'portfel'),
(51, 2, 'pralka'),
(52, 2, 'rakieta'),
(53, 2, 'rower'),
(54, 2, 'ryba'),
(55, 2, 'szkoła'),
(56, 2, 'słońce'),
(57, 2, 'smycz'),
(58, 2, 'sos'),
(59, 2, 'stół'),
(60, 2, 'sofa'),
(61, 2, 'telefon'),
(62, 2, 'telewizor'),
(63, 2, 'trawa'),
(64, 2, 'ulubiony'),
(65, 2, 'woda'),
(66, 2, 'samochód'),
(67, 2, 'ser'),
(68, 2, 'skarpeta'),
(69, 2, 'sklep'),
(70, 2, 'słoik'),
(71, 2, 'tablet'),
(72, 2, 'taras'),
(73, 2, 'tkanina'),
(74, 2, 'tort'),
(75, 2, 'torba'),
(76, 2, 'węgiel'),
(77, 2, 'worek'),
(78, 2, 'zamek'),
(79, 2, 'zupa'),
(80, 2, 'żyrafa'),
(81, 2, 'żarówka'),
(82, 2, 'zabawka'),
(83, 2, 'zebra'),
(84, 2, 'zioło'),
(85, 2, 'czas'),
(86, 2, 'guma'),
(87, 2, 'robot'),
(88, 2, 'krzesło'),
(89, 2, 'pomidor'),
(90, 2, 'skrzynia'),
(91, 2, 'schody'),
(92, 2, 'żółw'),
(93, 2, 'domofon'),
(94, 2, 'cukier'),
(95, 2, 'koło'),
(96, 2, 'las'),
(97, 2, 'łóżko'),
(98, 2, 'piłka'),
(99, 2, 'żeglarz'),
(100, 2, 'wiersz'),
(101, 2, 'plecak'),
(102, 2, 'ręcznik'),
(103, 2, 'parasol'),
(104, 2, 'kawiarnia'),
(105, 2, 'pomarańcza'),
(106, 2, 'kawa'),
(107, 2, 'salon'),
(108, 2, 'pióro'),
(109, 2, 'pizza'),
(110, 2, 'śnieg'),
(111, 2, 'program'),
(112, 2, 'zegar'),
(113, 2, 'biurko'),
(114, 2, 'chleb'),
(115, 2, 'żółty'),
(116, 2, 'klucz'),
(117, 2, 'rozdzielacz'),
(118, 2, 'kość'),
(119, 2, 'zmysł'),
(120, 2, 'ławka'),
(121, 2, 'mapa'),
(122, 2, 'mecz'),
(123, 2, 'pasek'),
(124, 2, 'ciepło'),
(125, 2, 'wykres'),
(126, 2, 'kran'),
(127, 2, 'piec'),
(128, 2, 'koc'),
(129, 2, 'zdrowie'),
(130, 2, 'poczta'),
(131, 2, 'pasta'),
(132, 2, 'świeca'),
(133, 2, 'nożyczki'),
(134, 2, 'mysz'),
(135, 2, 'budzik'),
(136, 2, 'grzebień'),
(137, 2, 'czapka'),
(138, 2, 'balkon'),
(139, 2, 'obrazek'),
(140, 2, 'siatka'),
(141, 2, 'łódź'),
(142, 2, 'ryż'),
(143, 2, 'dżem'),
(144, 2, 'pierścionek'),
(145, 2, 'ozdoba'),
(146, 2, 'podróż'),
(147, 2, 'koza'),
(148, 2, 'półka'),
(149, 2, 'czoło'),
(150, 2, 'grzyb'),
(151, 2, 'okulary'),
(152, 2, 'wieszak'),
(153, 2, 'płyta'),
(154, 2, 'chusteczka'),
(155, 2, 'herb'),
(156, 2, 'kawałek'),
(157, 2, 'chmura'),
(158, 2, 'kaczka'),
(159, 2, 'skrzynka'),
(160, 2, 'wiatrak'),
(161, 2, 'dźwig'),
(162, 2, 'makieta'),
(163, 2, 'czereśnia'),
(164, 2, 'robotnik'),
(165, 2, 'ściana'),
(166, 2, 'piasek'),
(167, 2, 'lektor'),
(168, 2, 'bluzka'),
(169, 2, 'ucho'),
(170, 2, 'śrubka'),
(171, 2, 'strój'),
(172, 2, 'paleta'),
(173, 2, 'szafa'),
(174, 2, 'rzeka'),
(175, 2, 'ciuchy'),
(176, 2, 'księżyc'),
(177, 2, 'dąb'),
(178, 2, 'sernik'),
(179, 2, 'widok'),
(180, 2, 'łazienka'),
(181, 2, 'napój'),
(182, 2, 'turysta'),
(183, 2, 'książeczka'),
(184, 2, 'zegarek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ranking`
--

CREATE TABLE `ranking` (
  `id_rekordu` int(11) NOT NULL,
  `ID_uzytkownika` int(10) UNSIGNED DEFAULT NULL,
  `poprawne_znaki` int(11) NOT NULL,
  `niepoprawne_znaki` int(11) NOT NULL,
  `dokladnosc` varchar(10) NOT NULL,
  `wpm` double NOT NULL,
  `czas` varchar(20) NOT NULL,
  `id_jezyka` int(10) DEFAULT NULL,
  `OCENA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_rekordu`, `ID_uzytkownika`, `poprawne_znaki`, `niepoprawne_znaki`, `dokladnosc`, `wpm`, `czas`, `id_jezyka`, `OCENA`) VALUES
(1, 8, 4, 57, '6.56%', 23.61, '30', 1, ''),
(2, 8, 4, 54, '6.9%', 348, '150', 1, 'sasa1'),
(3, 8, 4, 54, '6.9%', 348, '150', 1, 'sasa1'),
(4, 8, 4, 54, '6.9%', 348, '150', 1, 'sasa1'),
(7, 1, 6, 51, '10.53%', 136.8, '80', 1, '10/10'),
(8, 1, 5, 67, '6.94%', 432, '150', 2, 'sd'),
(9, 1, 3, 62, '4.62%', 390, '150', 2, '10.10 SERIO!!!'),
(10, 1, -1, 2, '-100%', 0.2, '80', 1, 'GF'),
(11, 1, 43, 230, '15.75%', 81.9, '120', 1, 'Wukong'),
(12, 1, 43, 230, '15.75%', 81.9, '120', 1, 'Wukong'),
(13, 1, 43, 230, '15.75%', 81.9, '120', 1, 'Wukong'),
(14, 1, 43, 230, '15.75%', 81.9, '120', 1, 'Wukong');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `ID_uzytkownika` int(10) UNSIGNED NOT NULL,
  `Nazwa_uzytkownika` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Haslo` varchar(50) NOT NULL,
  `rola` varchar(50) NOT NULL DEFAULT 'user',
  `profilowe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`ID_uzytkownika`, `Nazwa_uzytkownika`, `Email`, `Haslo`, `rola`, `profilowe`) VALUES
(1, 'tomas132', 'tomasz.janiuk@vp.pl', 'haslo', 'user', 'obraz1.jpg'),
(3, 'login111', 'tj89230@stud.uph.edu.pl', 'TWUJ', 'user', 'obraz3.jpg'),
(4, 'logins', 'tomasz.janiuk@op.pl', 'haslo', 'user', 'obraz_2024-08-25_173037494.png'),
(6, 'loginsss', 'tj89230@stud.uws.edu.pl', 'haslo', 'user', 'blank.png'),
(7, 'loginsssa', 'tj89230@stud.uwas.edu.pl', 'haslo', 'user', 'obraz_2024-08-25_174409852.png'),
(8, 'Lagierk', 'tomas@js.com', 'haslomaslo', 'user', 'blank.png'),
(9, 'admin', 'admin@com.eng', 'admin1', 'admin', 'blank.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id_zgłoszenia` int(10) UNSIGNED NOT NULL,
  `id_uzytkownika` int(10) UNSIGNED DEFAULT NULL,
  `tresc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zgloszenia`
--

INSERT INTO `zgloszenia` (`id_zgłoszenia`, `id_uzytkownika`, `tresc`) VALUES
(3, 9, 'LOLO'),
(4, 9, 'OK'),
(5, 1, 'wikipedia');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `jezyki`
--
ALTER TABLE `jezyki`
  ADD PRIMARY KEY (`id_jezyka`);

--
-- Indeksy dla tabeli `jezyk_ang`
--
ALTER TABLE `jezyk_ang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jezyka` (`id_jezyka`);

--
-- Indeksy dla tabeli `jezyk_pl`
--
ALTER TABLE `jezyk_pl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jezyka` (`id_jezyka`);

--
-- Indeksy dla tabeli `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_rekordu`),
  ADD KEY `ranking_ibfk_1` (`id_jezyka`),
  ADD KEY `ranking_ibfk_2` (`ID_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`ID_uzytkownika`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id_zgłoszenia`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jezyki`
--
ALTER TABLE `jezyki`
  MODIFY `id_jezyka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jezyk_ang`
--
ALTER TABLE `jezyk_ang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `jezyk_pl`
--
ALTER TABLE `jezyk_pl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_rekordu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `ID_uzytkownika` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id_zgłoszenia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jezyk_ang`
--
ALTER TABLE `jezyk_ang`
  ADD CONSTRAINT `jezyk_ang_ibfk_1` FOREIGN KEY (`id_jezyka`) REFERENCES `jezyki` (`id_jezyka`);

--
-- Constraints for table `jezyk_pl`
--
ALTER TABLE `jezyk_pl`
  ADD CONSTRAINT `jezyk_pl_ibfk_1` FOREIGN KEY (`id_jezyka`) REFERENCES `jezyki` (`id_jezyka`);

--
-- Constraints for table `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`id_jezyka`) REFERENCES `jezyki` (`id_jezyka`),
  ADD CONSTRAINT `ranking_ibfk_2` FOREIGN KEY (`ID_uzytkownika`) REFERENCES `uzytkownicy` (`ID_uzytkownika`);

--
-- Constraints for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD CONSTRAINT `zgloszenia_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`ID_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
