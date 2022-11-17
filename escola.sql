-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: projetos
-- Tempo de geração: 17/11/2022 às 00:37
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFinal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `dataInicio`, `dataFinal`) VALUES
(1, 'Programação Web em php ', '2022-11-30', '2023-07-12'),
(2, 'Marketing', '2023-01-12', '2023-02-16'),
(3, 'atendimento', '2022-11-11', NULL),
(4, 'Exel Basico ao advançado', '2022-11-24', '2023-01-27'),
(6, 'Desenvolvimento Web Completo 2022 - 20 cursos + 20 projetos', '2022-11-22', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id`, `logradouro`, `numero`) VALUES
(1, 'Arthur pereguda', 800),
(3, 'Alameda Rio Branco', 378);

-- --------------------------------------------------------

--
-- Estrutura para tabela `nivelAcesso`
--

CREATE TABLE `nivelAcesso` (
  `id` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dateCreate` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `nivelAcesso`
--

INSERT INTO `nivelAcesso` (`id`, `nome`, `dateCreate`, `dateModified`) VALUES
(1, 'super-usuario', '2022-11-04 17:44:51', NULL),
(2, 'professor', '2022-11-04 17:44:51', NULL),
(3, 'aluno', '2022-11-04 17:45:43', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dateCreate` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `situacao`
--

INSERT INTO `situacao` (`id`, `nome`, `dateCreate`, `dateModified`) VALUES
(1, 'ativo', '2022-11-04 17:42:39', NULL),
(2, 'inativo', '2022-11-04 17:42:39', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `curso_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`, `codigo`, `curso_id`) VALUES
(1, 'programação web', 'MDKKVDFK', 1),
(2, 'Programação Web ', 'MENRJ45M4', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `dataNascimento` date NOT NULL,
  `situacao_id` int NOT NULL,
  `nivelAcesso_id` int NOT NULL,
  `turma_id` int DEFAULT NULL,
  `endereco_id` int DEFAULT NULL,
  `curso_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `cpf`, `dataNascimento`, `situacao_id`, `nivelAcesso_id`, `turma_id`, `endereco_id`, `curso_id`) VALUES
(1, 'Don pilocarderms souffrant', 'derni@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '80101008970', '2003-11-26', 1, 3, 1, 1, 1),
(3, 'derni', 'gruda@gmail.com', '4297f44b13955235245b2497399d7a93', '92846458081', '2001-11-09', 1, 3, 1, 1, 6),
(5, 'Don Carderms root', 'donroot@gmail.com', '9bfdd62b0c6a8c3732f3826be2b2e044', '44287299001', '2003-11-26', 1, 1, NULL, NULL, NULL),
(8, 'Alan Renato', 'alanrenatoprof@gmail.com', '21434542', '92836458081', '1995-07-17', 1, 2, 1, 3, 1),
(9, ' Iraneide Soares da Silva', ' Iraneidedasilva@outlook.com', '435345346', '32435345432', '1993-03-12', 1, 2, NULL, NULL, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `nivelAcesso`
--
ALTER TABLE `nivelAcesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `situacao_id` (`situacao_id`),
  ADD KEY `nivelAcesso_id` (`nivelAcesso_id`),
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `endereco_id` (`endereco_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nivelAcesso_id`) REFERENCES `nivelAcesso` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`situacao_id`) REFERENCES `situacao` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`id`),
  ADD CONSTRAINT `usuario_ibfk_5` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`),
  ADD CONSTRAINT `usuario_ibfk_6` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
