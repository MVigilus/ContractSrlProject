-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 17, 2021 alle 16:25
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavoro`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `incassi`
--

CREATE TABLE `incassi` (
  `punto_vendita` varchar(20) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `giorno` varchar(3) NOT NULL,
  `incasso` double NOT NULL,
  `n_scontrini` int(11) NOT NULL,
  `pass` int(11) NOT NULL,
  `PZV` int(11) NOT NULL,
  `meteo` varchar(1) NOT NULL,
  `n_giorno` int(11) NOT NULL,
  `prog_incasso` double NOT NULL,
  `prog_pass` int(11) NOT NULL,
  `prog_scont` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `incassi`
--

INSERT INTO `incassi` (`punto_vendita`, `data`, `giorno`, `incasso`, `n_scontrini`, `pass`, `PZV`, `meteo`, `n_giorno`, `prog_incasso`, `prog_pass`, `prog_scont`, `id`) VALUES
('A3', '2021-05-11', 'Mar', 3233, 3, 3, 3, 'S', 3, 0, 0, 0, 1),
('A2', '2021-05-16', 'dom', 2500, 4, 5, 20, 'S', 10, 0, 0, 0, 2),
('A3', '2021-05-16', 'Dom', 2500, 55, 66, 34, 'N', 1, 0, 0, 0, 3),
('A2', '2020-05-17', 'Lun', 3000, 30, 33, 33, 'S', 2, 0, 0, 0, 4),
('A1', '2020-05-17', 'Lun', 2400, 23, 33, 33, 'S', 2, 0, 0, 0, 5),
('A3', '2020-05-17', 'Lun', 3000, 4, 4, 5, 'S', 2, 0, 0, 0, 6),
('A1', '2021-05-17', 'Lun', 6000, 45, 55, 55, 'S', 10, 0, 0, 0, 8),
('A9', '2021-05-17', 'Lun', 333, 333, 333, 333, 'S', 2, 0, 0, 0, 9),
('A1', '2019-05-17', 'Lun', 4444, 54, 45, 45, 'S', 2, 0, 0, 0, 10),
('B1', '2021-05-17', 'Lun', 333, 333, 333, 333, 'S', 2, 0, 0, 0, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `progressivo_mese`
--

CREATE TABLE `progressivo_mese` (
  `id` int(11) NOT NULL,
  `punto_vendita` varchar(10) NOT NULL,
  `mese` int(11) NOT NULL,
  `anno` int(4) NOT NULL,
  `incasso` double NOT NULL,
  `pass` double NOT NULL,
  `scontrini` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `progressivo_mese`
--

INSERT INTO `progressivo_mese` (`id`, `punto_vendita`, `mese`, `anno`, `incasso`, `pass`, `scontrini`) VALUES
(1, 'prova', 5, 2021, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `punti_vendita`
--

CREATE TABLE `punti_vendita` (
  `id` varchar(25) NOT NULL,
  `modulo` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `insegna` varchar(20) NOT NULL,
  `localita` varchar(30) NOT NULL,
  `indirizzo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `punti_vendita`
--

INSERT INTO `punti_vendita` (`id`, `modulo`, `password`, `insegna`, `localita`, `indirizzo`) VALUES
('A1', 'INTIAV', 'Passw0rd', 'Intimissimi', 'Avellino', 'Intimissimi-Avellino'),
('A10', 'BENETTONAV', 'Passw0rd', 'Benetton', 'Avellino', 'Benetton-Avellino'),
('A2', 'CALZAV', 'Passw0rd', 'Calzedonia', 'Avellino', 'Calzedonia-Avellino'),
('A3', 'TEZEAV', 'Passw0rd', 'Tezenis', 'Avellino', 'Tezenis-Avellino'),
('A9', 'INTIUOAV', 'Passw0rd', 'Intimissimi Uomo', 'Avellino', 'Intimissimo Uomo-Avellino'),
('B1', 'INTISA', 'Passw0rd', 'Intimissimi', 'Salerno', 'Intimissimi-Salerno'),
('B10', 'PINKWOMANSA', 'Passw0rd', 'Pink Woman', 'Salerno', 'Pink Woman-Salerno'),
('B2', 'TEZESA', 'Passw0rd', 'Tezenis', 'Salerno', 'Tezenis-Salerno'),
('B6', 'TEZEFR', 'Passw0rd', 'Tezenis', 'Frosinone', 'Tezenis-Frosinone'),
('B7', 'INTIUOSA', 'Passw0rd', 'Intimissimi Uomo', 'Salerno', 'Intimissimi Uomo-Salerno'),
('C1', 'INTICAV', 'Passw0rd', 'Intimissimi', 'Cava dei Tirreni', 'Intimissimi-Cava'),
('Contractadmin', '', '!Passw0rd21', '', '', ''),
('prova', 'rrrr', '', 'rrr', 'rrr', 'rrr');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `incassi`
--
ALTER TABLE `incassi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `punto_vendita` (`punto_vendita`),
  ADD KEY `punto_vendita_2` (`punto_vendita`);

--
-- Indici per le tabelle `progressivo_mese`
--
ALTER TABLE `progressivo_mese`
  ADD PRIMARY KEY (`id`),
  ADD KEY `punto_vendita` (`punto_vendita`);

--
-- Indici per le tabelle `punti_vendita`
--
ALTER TABLE `punti_vendita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `incassi`
--
ALTER TABLE `incassi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `progressivo_mese`
--
ALTER TABLE `progressivo_mese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
