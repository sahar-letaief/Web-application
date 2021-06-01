-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 05:15 PM
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
-- Database: `naturimal`
--

-- --------------------------------------------------------

--
-- Table structure for table `articlejardinage`
--

CREATE TABLE `articlejardinage` (
  `IdArticle` int(10) NOT NULL,
  `IdCategorie` int(10) NOT NULL,
  `NomArticle` varchar(150) NOT NULL,
  `ImageArticle` varchar(200) NOT NULL,
  `DescriptionArticle` varchar(200) DEFAULT NULL,
  `PrixArticle` float NOT NULL,
  `QuantiteArticle` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articlejardinage`
--

INSERT INTO `articlejardinage` (`IdArticle`, `IdCategorie`, `NomArticle`, `ImageArticle`, `DescriptionArticle`, `PrixArticle`, `QuantiteArticle`) VALUES
(1, 1, 'Ciseaux', 'ciseaux.jpg', 'couper les plantes', 530, 6),
(3, 3, 'Marteau', 'marteau.jpg', 'enfoncer un trou', 58, 3),
(6, 1, 'Article test', 'arrosoir.jpg', 'aaaaaa', 317, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articlejardinage`
--
ALTER TABLE `articlejardinage`
  ADD PRIMARY KEY (`IdArticle`),
  ADD UNIQUE KEY `NomArticle` (`NomArticle`),
  ADD KEY `fk_categorie` (`IdCategorie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articlejardinage`
--
ALTER TABLE `articlejardinage`
  MODIFY `IdArticle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articlejardinage`
--
ALTER TABLE `articlejardinage`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`IdCategorie`) REFERENCES `categorie` (`IdCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
