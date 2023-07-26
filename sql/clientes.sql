-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jul-2023 às 13:18
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `contato` varchar(255) NOT NULL,
  `fone` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `datacontato` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `anotacoes` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `empresa`, `site`, `contato`, `fone`, `cidade`, `datacontato`, `email`, `anotacoes`, `status`) VALUES
(4, 'Tecnic', 'www.tecnic.com', 'Paulo', '5599991234', 'São Paulo', '2023-07-19', 'tecnic@tecnic.com', 'Empresa de Tecnologia.', 'Empresa'),
(5, 'EletroNet', 'www.eletronet.com', 'Junior', '5599991234', 'São Paulo', '2023-07-19', 'eletronet@eletronet.com', 'Empresa de comercio eletronico.', 'Empresa'),
(6, 'Fast Internet', 'www.fast.com', 'Ana', '5599991234', 'Sao Paulo', '2023-07-19', 'fast@fast.com', 'Provedor de Internet.', 'Empresa'),
(7, 'Aliança', 'www.alianca.com', 'Carlos', '5599991234', 'Sao Paulo', '2023-07-19', 'alianca@alianca.com', 'Empresa de venda e Joias.', 'Empresa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'admin', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
