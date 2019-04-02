-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 13 dec 2018 om 09:34
-- Serverversie: 10.1.31-MariaDB
-- PHP-versie: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaPalace`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `finalOrder`
--

CREATE TABLE `finalOrder` (
  `order_id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `datumTijd` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderDetail_id` int(250) NOT NULL,
  `order_id` int(250) NOT NULL,
  `product_id` int(250) NOT NULL,
  `hoeveelheid` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `plaats`
--

CREATE TABLE `plaats` (
  `postcode_key` int(10) NOT NULL,
  `gemeente` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `plaats`
--

INSERT INTO `plaats` (`postcode_key`, `gemeente`) VALUES
(1000, 'Brussel'),
(8000, 'Brugge'),
(9000, 'Gent'),
(9800, 'Deinze');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `naam` varchar(250) NOT NULL,
  `omschrijving` varchar(250) NOT NULL,
  `prijs` decimal(65,0) NOT NULL,
  `afbeelding` varchar(250) NOT NULL,
  `korting` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`product_id`, `naam`, `omschrijving`, `prijs`, `afbeelding`, `korting`) VALUES
(1, 'Margherita', ' tomaat, mozzarella, basilicum', '13', 'margheritaPic.jpg', '0'),
(2, 'Quattro Formaggi', 'gorgonzola, mozzarella, pecorino en taleggio', '12', 'vierkazen.jpeg', '0'),
(3, 'Napoli', 'tomaat, mozzarella, kappertjes en ansjovis', '11', 'pizza-napoli.jpg', '0'),
(4, 'Tonno', 'tomaat, mozzarella, tonijn', '10', 'pizza-tonno.jfif', '0'),
(5, 'Pepperoni', 'tomaat, mozzarella, paprika', '14', 'pizza-pepperoni.jpg', '0'),
(6, 'Calzone', 'tomaat, mozzarella, champignons en ham', '9', 'pizza-calzone.jpeg', '0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `adres` varchar(200) NOT NULL,
  `huisnummer` decimal(25,0) NOT NULL,
  `postcode` int(10) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `opmerkingen` varchar(250) NOT NULL,
  `promo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `naam`, `voornaam`, `adres`, `huisnummer`, `postcode`, `tel`, `opmerkingen`, `promo`) VALUES
(11, 'charlotte@hotmail.com', '1caa3b420c06397a49051765fa362940', 'Dekerpel', 'Charlotte', 'Kannunickstraat', '10', 8000, '0495614025', '', ''),
(12, 'test@test.com', '1caa3b420c06397a49051765fa362940', 'Tester', 'Junior', 'Juniorbeekstraat', '8989', 1000, '0495614025', '', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `finalOrder`
--
ALTER TABLE `finalOrder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexen voor tabel `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderDetail_id`);

--
-- Indexen voor tabel `plaats`
--
ALTER TABLE `plaats`
  ADD PRIMARY KEY (`postcode_key`),
  ADD UNIQUE KEY `postcode` (`postcode_key`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `finalOrder`
--
ALTER TABLE `finalOrder`
  MODIFY `order_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderDetail_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
