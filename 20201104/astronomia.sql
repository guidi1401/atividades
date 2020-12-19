-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 19-Dez-2020 às 00:47
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `galaxia`
--

INSERT INTO `galaxia` (`id_galaxia`, `nome`) VALUES
(7, 'sllsls');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `planeta`
--

INSERT INTO `planeta` (`id_planeta`, `nome`, `cod_galaxia`) VALUES
(9, 'kkkkkk', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `permissao` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `permissao`) VALUES
(1, 'Admim', 'adm@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 1);

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
  ADD CONSTRAINT `planeta_ibfk_1` FOREIGN KEY (`cod_galaxia`) REFERENCES `galaxia` (`id_galaxia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
