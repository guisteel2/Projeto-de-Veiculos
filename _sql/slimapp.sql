-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 04:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slimapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Veiculos`
--

CREATE TABLE `Veiculo` (
  `id` int(11) NOT NULL,
  `veiculo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `ano` int(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `vendido` varchar(255) NOT NULL,
  `created` datetime() NOT NULL,
  `update` datetime() NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ceiculos`
--

INSERT INTO `veiculos` (`id`, `veiculo`, `marca`, `ano`, `descricao`, `vendido`, `created`, `created`) VALUES
(2, 'gol', 'voyage', '2018', 'completo', 'vendido', '', ''),
(3,  'gol2', 'voyage', '1900', 'completo', 'vendido', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table 'veiculo`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
