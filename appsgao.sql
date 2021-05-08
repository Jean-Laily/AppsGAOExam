-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2021 at 11:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appsgao`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribuer`
--

CREATE TABLE `attribuer` (
  `numPoste` int(11) NOT NULL,
  `numUtil` int(11) NOT NULL,
  `numCreneau` int(11) NOT NULL,
  `dateJour` date NOT NULL,
  `annuler` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribuer`
--

INSERT INTO `attribuer` (`numPoste`, `numUtil`, `numCreneau`, `dateJour`, `annuler`) VALUES
(1, 1, 1, '2021-05-05', 0),
(1, 1, 2, '2021-05-06', 0),
(2, 2, 1, '2021-05-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `centre_cult`
--

CREATE TABLE `centre_cult` (
  `numID` int(11) NOT NULL,
  `nomCentre` varchar(50) NOT NULL,
  `nomSecretaire` varchar(50) NOT NULL,
  `prenomSecretaire` varchar(50) NOT NULL,
  `hrsOuvert` time NOT NULL,
  `hrsFermer` time NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centre_cult`
--

INSERT INTO `centre_cult` (`numID`, `nomCentre`, `nomSecretaire`, `prenomSecretaire`, `hrsOuvert`, `hrsFermer`, `identifiant`, `pass`) VALUES
(1, 'centre culturel Nord', 'Doe', 'Jane', '08:00:00', '16:00:00', 'admin', '$2y$14$VK35Y/ilOB1UFVjCmf1gNeVcdHUabunatYZRJwiXINLE4H3jjZAlS');

-- --------------------------------------------------------

--
-- Table structure for table `creneau_hor`
--

CREATE TABLE `creneau_hor` (
  `numCreneau` int(11) NOT NULL,
  `creneauDebut` time NOT NULL,
  `creneauFin` time NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `creneau_hor`
--

INSERT INTO `creneau_hor` (`numCreneau`, `creneauDebut`, `creneauFin`, `libelle`) VALUES
(1, '08:00:00', '09:00:00', '8h - 9h'),
(2, '09:00:00', '10:00:00', '9h - 10h'),
(3, '10:00:00', '11:00:00', '10h - 11h'),
(4, '11:00:00', '12:00:00', '11h - 12h'),
(5, '13:00:00', '14:00:00', '13h - 14h'),
(6, '14:00:00', '15:00:00', '14h - 15h'),
(7, '15:00:00', '16:00:00', '15h - 16h');

-- --------------------------------------------------------

--
-- Table structure for table `post_info`
--

CREATE TABLE `post_info` (
  `numPoste` int(11) NOT NULL,
  `nomPc` varchar(50) NOT NULL,
  `etatPc` varchar(50) NOT NULL,
  `date_crea` datetime NOT NULL,
  `versionPost` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_info`
--

INSERT INTO `post_info` (`numPoste`, `nomPc`, `etatPc`, `date_crea`, `versionPost`) VALUES
(1, 'Poste N°01', 'Opérationnel', '2021-05-05 10:12:26', 2),
(2, 'Poste N°02', 'Opérationnel', '2021-05-05 10:15:26', 2),
(3, 'Poste N°03', 'Opérationnel', '2021-05-08 11:12:32', 2),
(5, 'Poste N°05', 'Maintenance', '2021-05-08 11:13:50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `numUtil` int(11) NOT NULL,
  `nomUtil` varchar(100) NOT NULL,
  `prenomUtil` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codeP` varchar(25) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `date_crea` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `passW` varchar(255) NOT NULL,
  `supprimer` tinyint(1) NOT NULL DEFAULT '0',
  `versionUtil` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`numUtil`, `nomUtil`, `prenomUtil`, `adresse`, `codeP`, `ville`, `date_crea`, `email`, `passW`, `supprimer`, `versionUtil`) VALUES
(1, 'Doe', 'Jack', '1 rue le chemin', '97440', 'Saint-andré', '2021-05-25 11:12:26', 'john.doe@gmail.com', 'PKj54Hd71YeO0', 0, 2),
(2, '  Doe  ', 'Paul', '55 rue les baskets', '97400', 'Saint-Denis', '2021-05-25 12:12:26', 'Paul.doe@gmail.com', '7854EdTTYe41', 0, 3),
(3, 'TRUST', 'Mate', '1 rue labas', '97404', 'laville', '2020-11-25 00:00:00', 'mate@mail', 'azerty', 0, 1),
(4, ' Azert', 'Joe', '154 rue le truc', '97404', 'LavilleDevile', '2021-05-07 10:10:26', 'aze@a.a', 'aze', 0, 2),
(9, 'qsd', 'qsd', 'qsd', 'qsd', 'qsd', '2021-05-07 10:15:52', 'qsd@qsd.q', 'qsdqsd', 1, 1),
(19, 'aze', 'azeaze', 'aze', 'aze', 'aze', '2021-05-07 11:19:13', 'aze@a.aa', 'azeaze132', 1, 1),
(23, 'tyu', 'tyu', 'tyu', 'tyu', 'tyu', '2021-05-07 15:31:36', 'tyu@tyu.tyu', 'tyutyu', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribuer`
--
ALTER TABLE `attribuer`
  ADD PRIMARY KEY (`numPoste`,`numUtil`,`numCreneau`),
  ADD KEY `attr_poste_FK_idx` (`numPoste`),
  ADD KEY `attr_util_FK_idx` (`numUtil`),
  ADD KEY `attr_creneau_FK_idx` (`numCreneau`);

--
-- Indexes for table `centre_cult`
--
ALTER TABLE `centre_cult`
  ADD PRIMARY KEY (`numID`),
  ADD UNIQUE KEY `numID_UNIQUE` (`numID`),
  ADD UNIQUE KEY `identifiant_UNIQUE` (`identifiant`);

--
-- Indexes for table `creneau_hor`
--
ALTER TABLE `creneau_hor`
  ADD PRIMARY KEY (`numCreneau`),
  ADD UNIQUE KEY `numCreneau_UNIQUE` (`numCreneau`);

--
-- Indexes for table `post_info`
--
ALTER TABLE `post_info`
  ADD PRIMARY KEY (`numPoste`),
  ADD UNIQUE KEY `numPoste_UNIQUE` (`numPoste`),
  ADD UNIQUE KEY `nomPC_UNIQUE` (`nomPc`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`numUtil`),
  ADD UNIQUE KEY `numUtil_UNIQUE` (`numUtil`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creneau_hor`
--
ALTER TABLE `creneau_hor`
  MODIFY `numCreneau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_info`
--
ALTER TABLE `post_info`
  MODIFY `numPoste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `numUtil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribuer`
--
ALTER TABLE `attribuer`
  ADD CONSTRAINT `attr_creneau_FK` FOREIGN KEY (`numCreneau`) REFERENCES `creneau_hor` (`numCreneau`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attr_poste_FK` FOREIGN KEY (`numPoste`) REFERENCES `post_info` (`numPoste`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attr_util_FK` FOREIGN KEY (`numUtil`) REFERENCES `utilisateur` (`numUtil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
