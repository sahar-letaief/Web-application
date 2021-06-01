-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 07:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

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
-- Table structure for table `hebergement`
--

CREATE TABLE `hebergement` (
  `Id` int(4) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Prix` int(4) NOT NULL,
  `Adresse` varchar(40) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `Image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hebergement`
--

INSERT INTO `hebergement` (`Id`, `Nom`, `Email`, `Prix`, `Adresse`, `Description`, `Image`) VALUES
(1, 'Test', 'test@gmail.com', 145, 'Test 2047, Test test', 'Test test test test test test test', ''),
(2, 'For the cats', 'Forthecats@gmail.com', 129, 'Lac 2', 'Vous partez en voyage ou en vacances mais ne savez pas où laisser vos chats ? Vous êtes au bon endroit, avec pour les chats vous pouvez être sûr que votre chat sera entre de bonnes mains où il pourra s\'amuser avec d\'autres chats et aussi rester hygiénique et bien nourri.', ''),
(3, 'Doggos', 'Doggos@gmail.com', 99, 'Mourouj 2074', 'Very nice place for your dogs!', 'Array');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hebergement`
--
ALTER TABLE `hebergement`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hebergement`
--
ALTER TABLE `hebergement`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
