-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/09/2024 às 15:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estrutura para tabela `agendamentolaboratorio`
--

CREATE TABLE `agendamentolaboratorio` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `duracao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentolaboratorio`
--

INSERT INTO `agendamentolaboratorio` (`id`, `nome`, `data`, `horario`, `duracao`) VALUES
(16, 'Guilherme Burtuli', '2024-10-10', '08:00:00', 120),
(19, 'Guilherme Burtuli', '2024-10-10', '10:00:00', 120);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` char(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` char(9) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `email`, `telefone`, `endereco`, `cidade`, `estado`, `cep`, `tipo`) VALUES
(19, 'Guilherme Burtuli', '159.633.649-81', 'guilhermeburtuli29@gmail.com', '(45) 99954-5805', 'Rua Paraná', 'Cascavel', 'PR', '85807-040', 1),
(22, 'Vitoria Pozzebon', '159.633.649-81', 'vitoriapozzebon@gmail.com', '45999990000', 'Rua Tocantins', 'Cascavel', 'PR', '85807-040', 1),
(24, 'João Paulo', '000.000.000-01', 'joaopaulo@gmail.com', '(99) 99999-9999', 'Rua Pipi', 'Pipi', 'Pi', '99999-999', 0),
(25, 'Cida', '999.999.999-99', 'cida@gmail.com', '(99) 99999-9999', 'Rua Canela', 'Pipi', 'Pi', '99999-999', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentolaboratorio`
--
ALTER TABLE `agendamentolaboratorio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentolaboratorio`
--
ALTER TABLE `agendamentolaboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
