-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2016 at 03:32 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ESunBoPP`
--
CREATE DATABASE IF NOT EXISTS `ESunBoPP` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ESunBoPP`;

-- --------------------------------------------------------

--
-- Table structure for table `TB_AREA`
--

DROP TABLE IF EXISTS `TB_AREA`;
CREATE TABLE IF NOT EXISTS `TB_AREA` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_AREA`
--

INSERT INTO `TB_AREA` (`id`, `nome`) VALUES
(1, 'Computacao'),
(2, 'Engenharia'),
(3, 'Entretenimento');

-- --------------------------------------------------------

--
-- Table structure for table `TB_CATEGORIA`
--

DROP TABLE IF EXISTS `TB_CATEGORIA`;
CREATE TABLE IF NOT EXISTS `TB_CATEGORIA` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_CATEGORIA`
--

INSERT INTO `TB_CATEGORIA` (`id`, `nome`) VALUES
(1, 'Seminario'),
(2, 'Palestra'),
(3, 'Festa');

-- --------------------------------------------------------

--
-- Table structure for table `TB_CHAVE`
--

DROP TABLE IF EXISTS `TB_CHAVE`;
CREATE TABLE IF NOT EXISTS `TB_CHAVE` (
  `num` int(11) NOT NULL DEFAULT '0',
  `loginGerente` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_CHAVE`
--

INSERT INTO `TB_CHAVE` (`num`, `loginGerente`) VALUES
(78328, 'gerente3'),
(575567, 'gerente1'),
(666474, 'gerente2');

-- --------------------------------------------------------

--
-- Table structure for table `TB_EVENTO`
--

DROP TABLE IF EXISTS `TB_EVENTO`;
CREATE TABLE IF NOT EXISTS `TB_EVENTO` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `idArea` int(11) DEFAULT NULL,
  `idCategoria` int(11) NOT NULL DEFAULT '0',
  `loginPromotor` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`idCategoria`,`loginPromotor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_EVENTO`
--

INSERT INTO `TB_EVENTO` (`id`, `nome`, `endereco`, `preco`, `idArea`, `idCategoria`, `loginPromotor`) VALUES
(656, 'Computacao Movel', 'Aguas Longes', 10.5, 1, 1, 'promote1'),
(657, 'Computacao na Nuvem', 'Aguas Lindas', 0, 1, 2, 'promote1'),
(658, 'Internet das Coisas', 'Aguas Claras', 20.43, 2, 2, 'promote1'),
(659, 'Festas no Bosque', 'Brasilia', 30, 3, 3, 'promote2');

-- --------------------------------------------------------

--
-- Table structure for table `TB_EVENTO_PROMOTOR`
--

DROP TABLE IF EXISTS `TB_EVENTO_PROMOTOR`;
CREATE TABLE IF NOT EXISTS `TB_EVENTO_PROMOTOR` (
  `idEvento` int(11) NOT NULL DEFAULT '0',
  `loginPromotor` varchar(30) NOT NULL DEFAULT '',
  `data` date NOT NULL,
  PRIMARY KEY (`idEvento`,`loginPromotor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_EVENTO_PROMOTOR`
--

INSERT INTO `TB_EVENTO_PROMOTOR` (`idEvento`, `loginPromotor`, `data`) VALUES
(656, 'promote1', '2016-08-15'),
(657, 'promote1', '2017-03-02'),
(658, 'promote1', '2015-01-02'),
(659, 'promote2', '2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `TB_EVENTO_USUARIO`
--

DROP TABLE IF EXISTS `TB_EVENTO_USUARIO`;
CREATE TABLE IF NOT EXISTS `TB_EVENTO_USUARIO` (
  `idEvento` int(11) NOT NULL DEFAULT '0',
  `loginUsuario` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`idEvento`,`loginUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_EVENTO_USUARIO`
--

INSERT INTO `TB_EVENTO_USUARIO` (`idEvento`, `loginUsuario`) VALUES
(656, 'gabrielmirandat'),
(656, 'otto'),
(659, 'gabrielmirandat'),
(659, 'guilherme');

-- --------------------------------------------------------

--
-- Table structure for table `TB_GERENTE`
--

DROP TABLE IF EXISTS `TB_GERENTE`;
CREATE TABLE IF NOT EXISTS `TB_GERENTE` (
  `login` varchar(30) NOT NULL DEFAULT '',
  `senha` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` int(30) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_GERENTE`
--

INSERT INTO `TB_GERENTE` (`login`, `senha`, `nome`, `endereco`, `telefone`, `email`, `cpf`) VALUES
('gerente1', 'gerente1', 'Emilio', 'SHCES Q 1107', 82574746, 'emilinho@gmail.com', 892738383),
('gerente2', 'gerente2', 'Marcio', 'Atrás do pão de açucar', 63637273, 'maricnho@hotmail.com', 2147483647),
('gerente3', 'aiusdh', 'Gabriel', 'Ali ao Lado', 2147483647, 'gabrielmirandat@hotmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `TB_PROMOTOR`
--

DROP TABLE IF EXISTS `TB_PROMOTOR`;
CREATE TABLE IF NOT EXISTS `TB_PROMOTOR` (
  `login` varchar(30) NOT NULL DEFAULT '',
  `senha` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `area` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `filiacao` varchar(30) NOT NULL,
  `cpf_cnpj` int(30) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_PROMOTOR`
--

INSERT INTO `TB_PROMOTOR` (`login`, `senha`, `nome`, `endereco`, `telefone`, `area`, `email`, `filiacao`, `cpf_cnpj`) VALUES
('promote1', 'promote1', 'Jose', 'SHCES Q 1106', 646464646, 'Engenheria', 'jose@gmail.com', 'Tancredo', 2147483647),
('promote2', 'promote2', 'Silvio', 'Esquina Quinta Avenida', 62376737, 'Empresarial', 'silvino@hotmail.com', 'Edna Mode', 82398480),
('promote7', 'promote7', 'Maria', 'Ali', 234234, 'Estatistica', 'maria@gmail.com', 'Matilda', 723468327);

-- --------------------------------------------------------

--
-- Table structure for table `TB_USUARIO`
--

DROP TABLE IF EXISTS `TB_USUARIO`;
CREATE TABLE IF NOT EXISTS `TB_USUARIO` (
  `login` varchar(30) NOT NULL DEFAULT '',
  `senha` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_USUARIO`
--

INSERT INTO `TB_USUARIO` (`login`, `senha`, `nome`, `endereco`, `telefone`, `email`) VALUES
('gabrielmirandat', 'root', 'Gabriel Miranda', 'SHCES Q 1105', 82574744, 'gabrielmirandat@hotmail.com'),
('guilherme', 'root3', 'Guilherme', 'Sudoeste', 2147483647, 'guilherme@gmail.com'),
('marinamirandat', 'root2', 'Marina', 'Q 1105 D', 32338382, 'marinamartinst@hotmail.com'),
('otto', 'root4', 'Otavio', 'Sudoeste', 3663636, 'otto@gmail.com');