-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Nov-2020 às 23:51
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `astronomia`
--
CREATE DATABASE IF NOT EXISTS `astronomia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `astronomia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estrela`
--

CREATE TABLE IF NOT EXISTS `estrela` (
  `id_estrela` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_galaxia` int(11) NOT NULL,
  PRIMARY KEY (`id_estrela`),
  KEY `cod_galaxia` (`cod_galaxia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galaxia`
--

CREATE TABLE IF NOT EXISTS `galaxia` (
  `id_galaxia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_galaxia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planeta`
--

CREATE TABLE IF NOT EXISTS `planeta` (
  `id_planeta` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_galaxia` int(11) NOT NULL,
  PRIMARY KEY (`id_planeta`),
  KEY `cod_galaxia` (`cod_galaxia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `estrela`
--
ALTER TABLE `estrela`
  ADD CONSTRAINT `estrela_ibfk_1` FOREIGN KEY (`cod_galaxia`) REFERENCES `galaxia` (`id_galaxia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `planeta`
--
ALTER TABLE `planeta`
  ADD CONSTRAINT `planeta_ibfk_1` FOREIGN KEY (`cod_galaxia`) REFERENCES `galaxia` (`id_galaxia`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
