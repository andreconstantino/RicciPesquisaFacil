-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Ago-2021 às 20:24
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
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'limpeza'),
(2, 'Celular'),
(3, 'Eletro-eletronico'),
(4, 'bebidas'),
(5, ''),
(6, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `codigo` int(11) NOT NULL,
  `nomecidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`codigo`, `nomecidade`, `estado`) VALUES
(1, 'Hortolândia', 'SP'),
(2, 'Campinas', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `Codigo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `fabricante` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`Codigo`, `nome`, `fabricante`, `descricao`, `categoria`, `foto`) VALUES
(1, 'SabÃ£o em pedra Minuano', 'Minuano', 'sabÃ£o em pedra 1 unidade', 1, '1621624573.png'),
(2, 'Pacote de sabÃ£o em pedra Ype', 'Ype', 'Pacote de sabÃ£o em pedra com 5 unidades', 1, '1621624634.png'),
(3, 'SabÃ£o em PÃ³ Tixan 5kg', 'Ype', 'Caixa de sabÃ£o em pÃ³ de 5 kg', 1, '1621624745.jpg'),
(4, 'Celular iPhone 12', 'abc', 'Celular iPhone 12 da Apple', 2, '1621626642.jpg'),
(5, 'SabÃ£o lÃ­quido Omo 2L', 'Omo', 'SabÃ£o lÃ­quido concentrado', 1, '1626465052.jpg'),
(6, 'SabÃ£o lÃ­quido Ariel 2l', 'Ype', 'SabÃ£o lÃ­quido concentrado', 1, '1626465117.jpg'),
(7, 'SabÃ£o lÃ­quido Brilhante 2L', 'Brilhante', 'SabÃ£o lÃ­quido concentrado', 1, '1626465214.jpg'),
(8, 'televisão', 'Panasonic', 'ver filmes e séries', 3, '1626801864.jpg'),
(11, 'Smartphone', 'samsung', 'ver varios videos', 3, '1627670298.jpg'),
(12, 'Smartphone TCL L5', 'samsung', 'ver varios videos', 2, '1627671119.jpg'),
(13, 'Refigerante coca-cola', 'coca cola', 'Refigerante', 4, '1627673826.jpg');

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
  `codigoCidade` int(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `supermercado`
--

INSERT INTO `supermercado` (`codigo`, `nome`, `rua`, `numero`, `bairro`, `codigoCidade`, `telefone`, `logo`) VALUES
(1, 'SuperMais', 'Um', '0', 'Xique', 1, '(19)9999-9999', '1622232114.png'),
(2, 'LeveMais', 'Benedito', '500', 'Xique', 1, '(19)988808189', '1622232265.png'),
(3, 'SuperMais', 'Dois', '15', 'Flores', 1, '(19)999999', '1623178020.gif');

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
(6, 'Bruno', 'brunao.br54@gmail.com', 'Hortolândia', '19bruno@', '1605821805.jpg'),
(7, 'andre1', 'andreandre@gmail.com', 'Horto', '1234', '1622229530.gif'),
(8, 'andre1', 'a@a.com', 'hortolandia', '1234', 'Erro 4');

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
(3, 0, '0000-00-00', 20),
(3, 1, '2021-05-21', 2.8),
(3, 2, '2021-05-21', 8),
(3, 1, '2021-05-28', 3),
(3, 1, '2021-06-04', 2.55),
(2, 2, '2021-06-04', 7.5),
(0, 3, '2021-06-07', 15.6),
(1, 3, '2021-06-07', 15.8),
(1, 1, '2021-06-07', 3.55),
(2, 5, '2021-07-16', 18.5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fk_categoria` (`categoria`);

--
-- Índices para tabela `supermercado`
--
ALTER TABLE `supermercado`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fkCidade` (`codigoCidade`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `supermercado`
--
ALTER TABLE `supermercado`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Limitadores para a tabela `supermercado`
--
ALTER TABLE `supermercado`
  ADD CONSTRAINT `fkCidade` FOREIGN KEY (`codigoCidade`) REFERENCES `cidade` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
