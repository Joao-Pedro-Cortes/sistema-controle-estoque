-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/06/2026 às 23:05
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
-- Banco de dados: `estoque_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `login_lvls`
--

CREATE TABLE `login_lvls` (
  `id_lvl` int(11) NOT NULL,
  `lvl` int(11) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login_lvls`
--

INSERT INTO `login_lvls` (`id_lvl`, `lvl`, `descricao`) VALUES
(1, 0, 'Administrador++'),
(2, 1, 'Funcionário'),
(3, 2, 'Visualizador ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacoes_estoque`
--

CREATE TABLE `movimentacoes_estoque` (
  `id_movimentacao` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_movimentacao` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentacoes_estoque`
--

INSERT INTO `movimentacoes_estoque` (`id_movimentacao`, `id_produto`, `tipo`, `quantidade`, `data_movimentacao`, `usuario`) VALUES
(9, 6, 'saida', 2, '2026-06-15 17:37:33', 'Supreme_User'),
(10, 6, 'saida', 8, '2026-06-15 17:37:39', 'Supreme_User'),
(11, 6, 'entrada', 16, '2026-06-15 17:37:53', 'Supreme_User'),
(12, 5, 'saida', 5, '2026-06-15 17:38:25', 'Supreme_User'),
(13, 5, 'entrada', 5, '2026-06-15 17:46:10', 'Supreme_User'),
(14, 5, 'saida', 5, '2026-06-15 17:47:39', 'Supreme_User'),
(15, 5, 'entrada', 2, '2026-06-15 17:50:14', 'Supreme_User');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `codigo_produto` varchar(20) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_entrada` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `codigo_produto`, `nome_produto`, `descricao`, `preco`, `quantidade`, `data_entrada`, `ativo`) VALUES
(5, '1238548', 'Óculos de sol ray-ban', 'Oculos da marca ray-ban', 449.99, 2, '2026-06-15 17:36:47', 1),
(6, '1238549', 'óculos de sol', 'oculos de sol sem marca definida', 180.00, 16, '2026-06-15 17:37:16', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `id_lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `senha`, `id_lvl`) VALUES
(1, 'Supreme_User', 'c3d8e393ef92aba852d0032d6de9f07fb893d8185f066d9d9baa5c9d5802853f3bfaba1bfcfb8eeb18f0671d4fd11ead83b1b90d889cc1e249b559a53d05c6c5', 1),
(2, 'Teste123', '3d109b80e802df95f65b10abef5eeb315f11acfc781c356cb6692790648a59fbe4beb68b61a23a4652d9fab6afd6c10c743f0afc0aaf19e8669a868177a85ac3', 2),
(4, 'Cocão', '85a63afb1da3d22b3d83935753a1e1e7881bc1ed555fd6efb014876b829d4890815e6aa0d208a67842a8d9caec7a30f22075638e026c53250b74734c8eb046eb', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `login_lvls`
--
ALTER TABLE `login_lvls`
  ADD PRIMARY KEY (`id_lvl`);

--
-- Índices de tabela `movimentacoes_estoque`
--
ALTER TABLE `movimentacoes_estoque`
  ADD PRIMARY KEY (`id_movimentacao`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_lvl` (`id_lvl`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login_lvls`
--
ALTER TABLE `login_lvls`
  MODIFY `id_lvl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `movimentacoes_estoque`
--
ALTER TABLE `movimentacoes_estoque`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
