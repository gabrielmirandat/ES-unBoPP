
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
  `loginGerente` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_CHAVE`
--

INSERT INTO `TB_CHAVE` (`num`, `loginGerente`) VALUES
(575567, 'gerente1');

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
  `loginPromotor` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`idCategoria`,`loginPromotor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_EVENTO`
--

INSERT INTO `TB_EVENTO` (`id`, `nome`, `endereco`, `preco`, `idArea`, `idCategoria`, `loginPromotor`) VALUES
(656, 'Computacao Movel', 'Aguas Longes', 10.5, 1, 1, 'promote1'),
(657, 'Computacao na Nuvem', 'Aguas Lindas', 0, 1, 2, 'promote1'),
(658, 'Internet das Coisas', 'Aguas Claras', 20.43, 2, 2, 'promote1'),
(659, 'Festas no Bosque', 'Brasilia', 30, 3, 3, 'promote1');

-- --------------------------------------------------------

--
-- Table structure for table `TB_EVENTO_PROMOTOR`
--

DROP TABLE IF EXISTS `TB_EVENTO_PROMOTOR`;
CREATE TABLE IF NOT EXISTS `TB_EVENTO_PROMOTOR` (
  `idEvento` int(11) NOT NULL DEFAULT '0',
  `loginPromotor` varchar(10) NOT NULL DEFAULT '',
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
(659, 'promote1', '2017-01-01');

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
  `area` varchar(30) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_GERENTE`
--

INSERT INTO `TB_GERENTE` (`login`, `senha`, `nome`, `endereco`, `telefone`, `area`) VALUES
('gerente1', 'gerente1', 'Gerente Gerente1', 'SHCES Q 1107', 82574746, 'Computacao'),
('gerente2', 'gerente2', 'Gerente', 'aisjdi', 123424, 'aisjdi'),
('iduthui', 'iusdhiu', 'sieufhui', 'iush', 775, 'shdbhu'),
('iixjiosj', 'sdiojfsiodjf', 'aisjoasjid', 'sidjfioj', 234234, 'sodijfio');

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
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_PROMOTOR`
--

INSERT INTO `TB_PROMOTOR` (`login`, `senha`, `nome`, `endereco`, `telefone`, `area`) VALUES
('asdqwd', 'ygyyyg', 'ygygygygyg', 'gygygyy', 6565656, 'dfdf'),
('ijisdjao', 'aosidjaiosjd', 'aisdjoasidj', 'aiosjdoaij', 232323, 'sojdios'),
('promote1', 'promote1', 'Promotor Promote1', 'SHCES Q 1106', 82574745, 'Engenheria'),
('promote2', 'promote2', 'promote2', 'aisjdo', 123, 'asidj'),
('yuegs', 'usydgauydg', 'ayusgduyg', 'usygduy', 342, 'sudyfu');

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
  `area` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_USUARIO`
--

INSERT INTO `TB_USUARIO` (`login`, `senha`, `nome`, `endereco`, `telefone`, `area`) VALUES
('gabrielmirandat', 'root', 'Gabriel Miranda', 'SHCES Q 1105', 82574744, 'Computacao'),
('guilherme', 'root3', 'Guilherme', 'sudoeste', 2147483647, 'Engenharia'),
('hhgefusguy', 'ihidsuhfui', 'ushdiuh', 'uidshuih', 2342, 'udhur'),
('joana', 'root', 'gabriel', 'cruzeiro', 2322, ''),
('jose', 'root', 'gabriel', 'cruzeiro', 2322, ''),
('marinamirandat', 'root2', 'Marina', 'Miranda', 32338382, 'Engenharia'),
('yasgduyags', 'ausgduyg', 'auysgduyg', 'ausgdyuag', 34234, 'kdijfosdij');