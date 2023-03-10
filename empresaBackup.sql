-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2023 às 20:36
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
-- Banco de dados: `empresa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `criado` datetime NOT NULL,
  `senha` varchar(100) NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cpf`, `email`, `criado`, `senha`, `modificado`) VALUES
(2, 'mikeeee', '48492886854', 'djonga@gmail.com', '2023-03-03 17:11:38', 'bd2f6a1d5242c962a05619c56fa47ba6', '2023-03-07 13:46:55'),
(3, 'tauros', '48492886854', 'tauros@gmail.com', '2023-03-07 13:48:24', '140f6969d5213fd0ece03148e62e461e', '0000-00-00 00:00:00'),
(4, 'mikeasdf', '48492886854', 'e@gmail.com', '2023-03-07 14:32:43', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(5, 'sergio', '03989598899', 'email@email', '2023-03-07 16:23:36', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
