-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Vært: localhost:8889
-- Genereringstid: 17. 09 2021 kl. 17:50:19
-- Serverversion: 5.7.32
-- PHP-version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `movie`
--

CREATE TABLE `movie` (
  `movId` int(11) NOT NULL,
  `movName` varchar(100) NOT NULL,
  `movDesc` text NOT NULL,
  `movRelDate` date NOT NULL,
  `movRating` decimal(1,0) DEFAULT NULL,
  `movActors` text NOT NULL,
  `movProducers` text NOT NULL,
  `movCategory` varchar(100) NOT NULL,
  `movType` varchar(10) NOT NULL,
  `movReview` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movId`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `movie`
--
ALTER TABLE `movie`
  MODIFY `movId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
