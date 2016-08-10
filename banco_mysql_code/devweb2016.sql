-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2016 às 00:12
-- Versão do servidor: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devweb2016`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estrelas`
--

DROP TABLE IF EXISTS `estrelas`;
CREATE TABLE IF NOT EXISTS `estrelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `classificacao` varchar(1) NOT NULL,
  `diametro` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planetas`
--

DROP TABLE IF EXISTS `planetas`;
CREATE TABLE IF NOT EXISTS `planetas` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `tamanho` float DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistemas`
--

DROP TABLE IF EXISTS `sistemas`;
CREATE TABLE IF NOT EXISTS `sistemas` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `planetas` int(2) DEFAULT NULL,
  `massa` float DEFAULT NULL,
  `constelacao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
