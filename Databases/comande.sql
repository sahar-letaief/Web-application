-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 09:56 AM
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
-- Table structure for table `comande`
--

CREATE TABLE `comande` (
  `id` int(11) NOT NULL,
  `id_commande` int(99) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total` varchar(9999) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `idproduit` int(99) NOT NULL,
  `qtproduit` int(99) NOT NULL,
  `nomproduit` varchar(255) NOT NULL,
  `typeproduit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comande`
--

INSERT INTO `comande` (`id`, `id_commande`, `nom`, `prenom`, `email`, `total`, `adresse`, `idproduit`, `qtproduit`, `nomproduit`, `typeproduit`) VALUES
(32, 1, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '119', 'ben arous boumhel ezzahra 2097', 1, 2, 'Ciseaux', 'jardinage'),
(33, 1, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '119', 'ben arous boumhel ezzahra 2097', 65, 3, 'laisse', 'access'),
(34, 2, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '1835', 'ben arous boumhel ezzahra 2097', 1, 2, 'Ciseaux', 'jardinage'),
(35, 2, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '1835', 'ben arous boumhel ezzahra 2097', 6, 2, 'Article test', 'jardinage'),
(36, 2, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '1835', 'ben arous boumhel ezzahra 2097', 65, 3, 'laisse', 'access'),
(37, 2, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '1835', 'ben arous boumhel ezzahra 2097', 79, 3, 'ballon', 'access'),
(38, 2, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '1835', 'ben arous boumhel ezzahra 2097', 1126, 5, 'croquette', 'aliment'),
(39, 3, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '47', 'ariena avenue hedi chaker ariena soghra 1080', 66, 1, 'collier', 'access'),
(40, 3, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '47', 'ariena avenue hedi chaker ariena soghra 1080', 68, 1, 'tapis', 'access'),
(41, 3, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '47', 'ariena avenue hedi chaker ariena soghra 1080', 75, 1, 'pot', 'access'),
(42, 4, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '308', 'ben arous boumhel ezzahra 2097', 3, 3, 'Marteau', 'jardinage'),
(43, 4, 'hejer', 'jaouadi', 'hejer.jaouadi@gmail.com', '308', 'ben arous boumhel ezzahra 2097', 93, 1, 'croquette', 'access');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comande`
--
ALTER TABLE `comande`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comande`
--
ALTER TABLE `comande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
