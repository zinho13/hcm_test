-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 06:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_diversity`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `matricule` varchar(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `filiere_id` int(11) NOT NULL,
  `parcour_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_modif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `matricule`, `nom`, `prenom`, `filiere_id`, `parcour_id`, `image`, `date_creation`, `date_modif`) VALUES
(1, '91958', 'NAMBININTSOA', 'Alain Zinho', 1, 1, NULL, '2021-10-11 18:20:18', '2021-10-11 18:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `filieres`
--

CREATE TABLE `filieres` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filieres`
--

INSERT INTO `filieres` (`id`, `nom`, `code`, `type_id`, `date_creation`, `date_modif`) VALUES
(1, 'informatique', 'I', 2, '2021-10-11 18:17:26', '2021-10-12 16:10:38'),
(3, 'Télécommunication', 'IC', 2, '2021-10-12 14:10:51', '2021-10-12 18:10:09'),
(4, 'Droit', 'D', 1, '2021-10-12 14:10:08', '2021-10-12 16:10:49'),
(5, 'Géstion', 'G', 1, '2021-10-12 14:10:20', '2021-10-12 19:10:21'),
(16, 'zinho junior', '', 0, '2021-10-12 23:10:43', '2021-10-12 23:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `filiere_parcours`
--

CREATE TABLE `filiere_parcours` (
  `id` int(11) NOT NULL,
  `filiere_id` int(11) NOT NULL,
  `parcour_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filiere_parcours`
--

INSERT INTO `filiere_parcours` (`id`, `filiere_id`, `parcour_id`, `date_creation`) VALUES
(1, 1, 1, '2021-10-12 08:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

CREATE TABLE `groupes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_modif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`id`, `nom`, `description`, `date_creation`, `date_modif`) VALUES
(1, 'admin', 'administrateur du site', '2021-10-11 18:12:12', '2021-10-11 18:12:12'),
(2, 'client', 'les utilisateurs du site, y compris les étudiants et les visiteurs', '2021-10-11 18:12:12', '2021-10-11 18:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `niveaux`
--

INSERT INTO `niveaux` (`id`, `description`, `code`, `date_creation`, `date_modif`) VALUES
(1, 'Licence 1', 'L1', '2021-10-11 18:19:02', '2021-10-11 18:19:02'),
(2, 'Licence 2', 'L2', '2021-10-11 18:19:02', '2021-10-11 18:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `filiere_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parcours`
--

INSERT INTO `parcours` (`id`, `nom`, `code`, `filiere_id`, `date_creation`, `date_modif`) VALUES
(1, 'base de donnée et génie logiciel', 'BDGL', 1, '2021-10-11 18:18:01', '2021-10-12 19:10:57'),
(7, 'droit privé', 'DPv', 4, '2021-10-12 17:10:16', '2021-10-12 19:10:51'),
(14, 'Réseau et système', 'RS', 1, '2021-10-12 19:10:16', '2021-10-12 19:10:16'),
(15, 'droit publique', 'DPb', 4, '2021-10-12 19:10:37', '2021-10-13 06:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `type_filieres`
--

CREATE TABLE `type_filieres` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `data_modif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_filieres`
--

INSERT INTO `type_filieres` (`id`, `nom`, `date_creation`, `data_modif`) VALUES
(1, 'science de la société', '2021-10-12 05:19:09', '2021-10-12 05:19:09'),
(2, 'science de l\'ingénieur', '2021-10-12 05:19:09', '2021-10-12 05:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `groupe_id`, `date_creation`, `date_modif`) VALUES
(1, 'zidev', 'admin@admin.com', 1, '2021-10-11 18:16:45', '2021-10-13 06:10:56'),
(12, 'zinho kely', 'nalainzinho12@gmail.com', 2, '2021-10-12 10:10:29', '2021-10-12 19:10:20'),
(17, 'test kely', 'nalainzinho12@gmail.com', 2, '2021-10-12 11:10:41', '2021-10-12 11:10:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filiere_parcours`
--
ALTER TABLE `filiere_parcours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_filieres`
--
ALTER TABLE `type_filieres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `filiere_parcours`
--
ALTER TABLE `filiere_parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type_filieres`
--
ALTER TABLE `type_filieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
