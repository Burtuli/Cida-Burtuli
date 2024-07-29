-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 29-Jul-2024 às 10:55
-- Versão do servidor: 8.0.37-0ubuntu0.20.04.3
-- versão do PHP: 7.4.3-4ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reserva_de_lab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` char(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `email`, `telefone`, `endereco`, `cidade`, `estado`, `cep`) VALUES
(3, 'Guilherme', '159.633.649-81', 'guilhermeburtuli29@gmail.com', '(45) 99954-5805', 'Rua parana', 'Cascavel', 'pr', '85807-040'),
(4, 'Matheus', '138.067.908-57', 'matheus.souda@gmail.com', '(45) 99840-6735', 'Rua itauba', 'Cascavel', 'pr', '85807-675'),
(6, 'Daniel', '123.123.123-45', 'anabell.sosa@escola.pr.gov.br', '(45) 99954-5345', 'Rua parana', 'Cascavel', 'pr', '85807-123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
