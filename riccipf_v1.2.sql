-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2021 às 20:46
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `riccipf`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `Codigo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `fabricante` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`Codigo`, `nome`, `fabricante`, `descricao`, `categoria`, `foto`) VALUES
(0, 'Celular', 'abc', 'fccdc', 'ffcfc', '1620761556.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `supermercado`
--

CREATE TABLE `supermercado` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rua` varchar(70) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `supermercado`
--

INSERT INTO `supermercado` (`codigo`, `nome`, `rua`, `numero`, `bairro`, `telefone`) VALUES
(1, 'Bruno Ricci', 'abc', '126', 'america', '19992110332'),
(3, 'br', 'abc', '123', 'america', '(11)1111-1111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `email`, `cidade`, `senha`, `foto`) VALUES
(1, 'Bruno Ricci', 'alessandraroberta01@yahoo.com.br', 'HortolÃ¢ndia', 'teste', '1557344225.jpg'),
(2, 'Bruno Ricci', 'alessandraroberta01@yahoo.com.br', 'HortolÃ¢ndia', 'teste', '1557344361.jpg'),
(3, 'Bruno Ricci', 'alessandraroberta01@yahoo.com.br', 'HortolÃ¢ndia', 'teste', '1557344390.jpg'),
(4, 'Bruno Ricci', 'alessandraroberta01@yahoo.com.br', 'HortolÃ¢ndia', 'teste', '1557344643.jpg'),
(5, 'andre', 'andre.cons@andre.com', 'Horto', '1234', '1561571946.png'),
(0, 'Bruno', 'brunao.br54@gmail.com', 'Hortolândia', '19bruno@', '1605821805.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vende`
--

CREATE TABLE `vende` (
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
(3, 0, '0000-00-00', 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
