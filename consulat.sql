-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 02:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consulat`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresa_domiciliu`
--

CREATE TABLE `adresa_domiciliu` (
  `id_domiciliu` int(10) NOT NULL,
  `tara` varchar(20) DEFAULT NULL,
  `regiunea` varchar(20) DEFAULT NULL,
  `localitatea` varchar(20) DEFAULT NULL,
  `strada` varchar(50) DEFAULT NULL,
  `numar` int(10) DEFAULT NULL,
  `bloc` int(6) DEFAULT NULL,
  `etaj` int(3) DEFAULT NULL,
  `scara` int(3) DEFAULT NULL,
  `apartament` int(4) DEFAULT NULL,
  `cod_postal` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `adresa_nastere`
--

CREATE TABLE `adresa_nastere` (
  `id_nastere` int(10) NOT NULL,
  `tara` varchar(20) DEFAULT NULL,
  `regiunea` varchar(20) DEFAULT NULL,
  `localitatea` varchar(20) DEFAULT NULL,
  `strada` varchar(50) DEFAULT NULL,
  `numar` int(10) DEFAULT NULL,
  `bloc` int(6) DEFAULT NULL,
  `etaj` int(3) DEFAULT NULL,
  `scara` int(3) DEFAULT NULL,
  `apartament` int(4) DEFAULT NULL,
  `cod_postal` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `adresa_resedinta`
--

CREATE TABLE `adresa_resedinta` (
  `id_resedinta` int(10) NOT NULL,
  `tara` varchar(20) DEFAULT NULL,
  `regiunea` varchar(20) DEFAULT NULL,
  `localitatea` varchar(20) DEFAULT NULL,
  `strada` varchar(50) DEFAULT NULL,
  `numar` int(10) DEFAULT NULL,
  `bloc` int(6) DEFAULT NULL,
  `etaj` int(3) DEFAULT NULL,
  `scara` int(3) DEFAULT NULL,
  `apartament` int(4) DEFAULT NULL,
  `cod_postal` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cereri`
--

CREATE TABLE `cereri` (
  `id_cereri` int(10) NOT NULL,
  `cod_cerere` varchar(20) DEFAULT NULL,
  `servicii_consulat` varchar(100) DEFAULT NULL,
  `oficiul_consulat` varchar(100) DEFAULT NULL,
  `data_programarii` date DEFAULT NULL,
  `data_cerere` date DEFAULT NULL,
  `id_identitate` int(11) DEFAULT NULL,
  `id_nastere` int(11) DEFAULT NULL,
  `id_domiciliu` int(11) DEFAULT NULL,
  `id_resedinta` int(11) DEFAULT NULL,
  `id_parinti` int(11) DEFAULT NULL,
  `id_copii` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_taxa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `copii_minori`
--

CREATE TABLE `copii_minori` (
  `id_copii` int(10) NOT NULL,
  `nume` varchar(40) DEFAULT NULL,
  `prenume` varchar(40) DEFAULT NULL,
  `id_identitate_copil` int(11) DEFAULT NULL,
  `id_nastere_minor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `date_identitate`
--

CREATE TABLE `date_identitate` (
  `id_identitate` int(10) NOT NULL,
  `nume` varchar(40) DEFAULT NULL,
  `prenume` varchar(40) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `data_nasterii` date DEFAULT NULL,
  `cetatenia` varchar(10) DEFAULT NULL,
  `id_doc_identitate` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefon` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_identitate`
--

CREATE TABLE `doc_identitate` (
  `id_doc_identitate` int(10) NOT NULL,
  `doc_md` tinyint(1) DEFAULT NULL,
  `seria` varchar(2) DEFAULT NULL,
  `nr_serie` int(10) DEFAULT NULL,
  `tip_doc` varchar(100) DEFAULT NULL,
  `data_emitere` date DEFAULT NULL,
  `data_expiratie` date DEFAULT NULL,
  `valabilitatea_infinit` tinyint(1) DEFAULT NULL,
  `emis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parinti`
--

CREATE TABLE `parinti` (
  `id_parinti` int(10) NOT NULL,
  `nume` varchar(40) DEFAULT NULL,
  `prenume` varchar(40) DEFAULT NULL,
  `gen_parinte` varchar(10) DEFAULT NULL,
  `id_identitate_parinte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `taxa`
--

CREATE TABLE `taxa` (
  `id_taxa` int(10) NOT NULL,
  `modalitate` varchar(30) DEFAULT NULL,
  `valuta` varchar(10) DEFAULT NULL,
  `taxa` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `psw` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresa_domiciliu`
--
ALTER TABLE `adresa_domiciliu`
  ADD PRIMARY KEY (`id_domiciliu`);

--
-- Indexes for table `adresa_nastere`
--
ALTER TABLE `adresa_nastere`
  ADD PRIMARY KEY (`id_nastere`);

--
-- Indexes for table `adresa_resedinta`
--
ALTER TABLE `adresa_resedinta`
  ADD PRIMARY KEY (`id_resedinta`);

--
-- Indexes for table `cereri`
--
ALTER TABLE `cereri`
  ADD PRIMARY KEY (`id_cereri`),
  ADD KEY `id_identitate` (`id_identitate`),
  ADD KEY `id_nastere` (`id_nastere`),
  ADD KEY `id_domiciliu` (`id_domiciliu`),
  ADD KEY `id_resedinta` (`id_resedinta`),
  ADD KEY `id_parinti` (`id_parinti`),
  ADD KEY `id_copii` (`id_copii`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_taxa` (`id_taxa`);

--
-- Indexes for table `copii_minori`
--
ALTER TABLE `copii_minori`
  ADD PRIMARY KEY (`id_copii`),
  ADD KEY `id_identitate_copil` (`id_identitate_copil`),
  ADD KEY `id_nastere_minor` (`id_nastere_minor`);

--
-- Indexes for table `date_identitate`
--
ALTER TABLE `date_identitate`
  ADD PRIMARY KEY (`id_identitate`),
  ADD KEY `id_doc_identitate` (`id_doc_identitate`);

--
-- Indexes for table `doc_identitate`
--
ALTER TABLE `doc_identitate`
  ADD PRIMARY KEY (`id_doc_identitate`);

--
-- Indexes for table `parinti`
--
ALTER TABLE `parinti`
  ADD PRIMARY KEY (`id_parinti`),
  ADD KEY `id_identitate_parinte` (`id_identitate_parinte`);

--
-- Indexes for table `taxa`
--
ALTER TABLE `taxa`
  ADD PRIMARY KEY (`id_taxa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresa_domiciliu`
--
ALTER TABLE `adresa_domiciliu`
  MODIFY `id_domiciliu` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adresa_nastere`
--
ALTER TABLE `adresa_nastere`
  MODIFY `id_nastere` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adresa_resedinta`
--
ALTER TABLE `adresa_resedinta`
  MODIFY `id_resedinta` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cereri`
--
ALTER TABLE `cereri`
  MODIFY `id_cereri` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copii_minori`
--
ALTER TABLE `copii_minori`
  MODIFY `id_copii` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `date_identitate`
--
ALTER TABLE `date_identitate`
  MODIFY `id_identitate` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc_identitate`
--
ALTER TABLE `doc_identitate`
  MODIFY `id_doc_identitate` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parinti`
--
ALTER TABLE `parinti`
  MODIFY `id_parinti` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxa`
--
ALTER TABLE `taxa`
  MODIFY `id_taxa` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cereri`
--
ALTER TABLE `cereri`
  ADD CONSTRAINT `cereri_ibfk_1` FOREIGN KEY (`id_identitate`) REFERENCES `date_identitate` (`id_identitate`),
  ADD CONSTRAINT `cereri_ibfk_2` FOREIGN KEY (`id_nastere`) REFERENCES `adresa_nastere` (`id_nastere`),
  ADD CONSTRAINT `cereri_ibfk_3` FOREIGN KEY (`id_domiciliu`) REFERENCES `adresa_domiciliu` (`id_domiciliu`),
  ADD CONSTRAINT `cereri_ibfk_4` FOREIGN KEY (`id_resedinta`) REFERENCES `adresa_resedinta` (`id_resedinta`),
  ADD CONSTRAINT `cereri_ibfk_5` FOREIGN KEY (`id_parinti`) REFERENCES `parinti` (`id_parinti`),
  ADD CONSTRAINT `cereri_ibfk_6` FOREIGN KEY (`id_copii`) REFERENCES `copii_minori` (`id_copii`),
  ADD CONSTRAINT `cereri_ibfk_7` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `cereri_ibfk_8` FOREIGN KEY (`id_taxa`) REFERENCES `taxa` (`id_taxa`);

--
-- Constraints for table `copii_minori`
--
ALTER TABLE `copii_minori`
  ADD CONSTRAINT `copii_minori_ibfk_1` FOREIGN KEY (`id_identitate_copil`) REFERENCES `date_identitate` (`id_identitate`),
  ADD CONSTRAINT `copii_minori_ibfk_2` FOREIGN KEY (`id_nastere_minor`) REFERENCES `adresa_nastere` (`id_nastere`);

--
-- Constraints for table `date_identitate`
--
ALTER TABLE `date_identitate`
  ADD CONSTRAINT `date_identitate_ibfk_1` FOREIGN KEY (`id_doc_identitate`) REFERENCES `doc_identitate` (`id_doc_identitate`);

--
-- Constraints for table `parinti`
--
ALTER TABLE `parinti`
  ADD CONSTRAINT `parinti_ibfk_1` FOREIGN KEY (`id_identitate_parinte`) REFERENCES `date_identitate` (`id_identitate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
