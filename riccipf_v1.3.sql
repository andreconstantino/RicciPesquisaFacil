-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Maio-2021 às 22:38
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `riccipf`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
`Codigo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `fabricante` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`Codigo`, `nome`, `fabricante`, `descricao`, `categoria`, `foto`) VALUES
(1, 'SabÃ£o em pedra Minuano', 'Minuano', 'sabÃ£o em pedra 1 unidade', 'Produto de limpeza', '1621624573.png'),
(2, 'Pacote de sabÃ£o em pedra Ype', 'Ype', 'Pacote de sabÃ£o em pedra com 5 unidades', 'Produto de limpeza', '1621624634.png'),
(3, 'SabÃ£o em PÃ³ Tixan 5kg', 'Ype', 'Caixa de sabÃ£o em pÃ³ de 5 kg', 'Produto de limpeza', '1621624745.jpg'),
(4, 'Celular iPhone 12', 'abc', 'Celular iPhone 12 da Apple', 'Celular', '1621626642.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `supermercado`
--

CREATE TABLE IF NOT EXISTS `supermercado` (
`codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rua` varchar(70) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `supermercado`
--

INSERT INTO `supermercado` (`codigo`, `nome`, `rua`, `numero`, `bairro`, `telefone`, `cidade`, `estado`, `logo`) VALUES
(1, 'SuperMais', 'Um', '0', 'Xique', '(19)9999-9999', 'HortolÃ¢ndia', 'SP', '1622232114.png'),
(2, 'LeveMais', 'Benedito', '500', 'Xique', '(19)988808189', 'HortolÃ¢ndia', 'SP', '1622232265.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `email`, `cidade`, `senha`, `foto`) VALUES
(1, 'Bruno Ricci', 'alessandraroberta01@yahoo.com.br', 'HortolÃ¢ndia', 'teste', '1557344225.jpg'),
(2, 'Bruno Ricci', 'alessandraroberta01@yahoo.com.br', 'HortolÃ¢ndia', 'teste', '1557344361.jpg'),
(3, 'Bruno Ricci', 'alessandraroberta01@yahoo.com.br', 'HortolÃ¢ndia', 'teste', '1557344390.jpg'),
(4, 'Bruno Ricci', 'alessandraroberta01@yahoo.com.br', 'HortolÃ¢ndia', 'teste', '1557344643.jpg'),
(5, 'andre', 'andre.cons@andre.com', 'Horto', '1234', '1561571946.png'),
(6, 'Bruno', 'brunao.br54@gmail.com', 'Hortolândia', '19bruno@', '1605821805.jpg'),
(7, 'andre1', 'andreandre@gmail.com', 'Horto', '1234', '1622229530.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vende`
--

CREATE TABLE IF NOT EXISTS `vende` (
  `cod_supermercado` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `data` date NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vende`
--

INSERT INTO `vende` (`cod_supermercado`, `cod_produto`, `data`, `preco`) VALUES
(1, 1, '0000-00-00', 29.5),
(1, 1, '0000-00-00', 29.5),
(1, 0, '0000-00-00', 29.5),
(3, 0, '0000-00-00', 20),
(3, 1, '2021-05-21', 2.8),
(3, 2, '2021-05-21', 8),
(3, 1, '2021-05-28', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
 ADD PRIMARY KEY (`Codigo`);

--
-- Indexes for table `supermercado`
--
ALTER TABLE `supermercado`
 ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supermercado`
--
ALTER TABLE `supermercado`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
