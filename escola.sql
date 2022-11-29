-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: projetos
-- Tempo de geração: 29/11/2022 às 17:51
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
(1, 'Programação Web em php', '2023-01-16', '2023-09-12'),
(2, 'Marketing ', '2023-01-12', '2023-02-16'),
(3, 'Atendimento  ', '2022-11-11', '2023-03-17'),
(6, 'Desenvolvimento Web Completo 2022 - 20 cursos + 20 projetos', '2022-11-22', NULL),
(7, 'Curso de JavaScript Completo do iniciante ao mestre ', '2022-11-19', NULL),
(10, 'Contabilidade e Finanças', '2022-11-26', NULL),
(28, 'Gestão de Recursos Humanos', '2022-11-26', '2023-01-27'),
(29, 'Aprender React native ', '2023-02-10', NULL),
(32, 'Infraestrutura de Ti', '2023-01-28', '2023-05-26'),
(39, 'curso padrão', '2022-11-17', NULL),
(41, 'Data science Big data master', '2023-03-24', NULL),
(45, 'Engenharia e Arquitetura  ', '2023-02-23', '2023-06-20');

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
(1, 'Arthur peguda  ', 800),
(3, 'Alameda Rio Branco', 378),
(29, 'rodolf setrem', 40),
(61, 'Arthur peguda ', 56),
(69, '2ª Avenida Mandchúria', 640),
(87, 'Travessa Almirante Ary Parreiras', 665),
(89, 'Beco Paribaroba', 140),
(90, 'Rua Caribe', 548),
(92, 'Arthur peguda ', 56),
(93, 'Arthur peguda ', 905),
(94, 'Arthur peguda ', 905),
(95, 'Arthur peguda ', 32),
(96, 'Arthur peguda g', 32),
(97, 'Arthur peguda g', 32),
(98, 'Arthur peguda g', 32),
(99, 'Arthur peguda ', 32);

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
(1, 'Progrmação php', 'MDKKVDFK', 1),
(2, 'Atendimento', 'MENRJ45M4', 3),
(3, 'turma padrão', 'R4747NFD', 39),
(25, 'Super da ti', 'DFNGMDFNGM4444', 32),
(26, 'big maters data', 'BSDHFJSDHF6575', 41),
(47, 'react', 'HSKJ3729', 29),
(49, 'contabilidade', 'FHKJDH5W9', 10),
(50, 'RH aprendiz', 'BDJK43', 28),
(51, 'Marketing', 'HKWDJHKFJSD3637', 2);

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
(1, 'Don pilocarderms souffrant', 'derni@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '80101008970', '2003-11-26', 1, 3, 1, 1, 6),
(5, 'Don Carderms root', 'donroot@gmail.com', '9bfdd62b0c6a8c3732f3826be2b2e044', '44287299001', '2003-11-26', 1, 1, NULL, NULL, NULL),
(8, 'Alan Renato', 'alanrenatoprof@gmail.com', '21434542', '92836458081', '1995-07-17', 1, 2, 1, 3, 6),
(9, ' Iraneide Soares da Silva', ' Iraneidedasilva@outlook.com', '435345346', '32435345432', '1993-03-12', 1, 2, NULL, NULL, NULL),
(57, 'mariana da silva', 'mariadav@gmail.com', '4bb4280ff186ffa21dfaf7052b52b768', '54213923095', '2001-12-08', 1, 3, 2, 29, 3),
(86, 'Donerms boy ', 'donerms@gmail.com', '9b13e59273c8a9e5a9b46c1cabcf3255', '85858358243', '2001-12-13', 1, 3, 25, 61, 45),
(90, 'Caleb Thiago Ferreira', 'caleb_thiago_ferreira@jeffersonbarroso.com.br', '2b1e9d5be9c5a91656c5b5a587de06ac', '13062410655', '1997-11-22', 1, 3, 25, 69, 45),
(93, 'Rafaela Teresinha Cristiane Gonçalves', 'hghg@gmail.com', '454ff7d4527c0d56006fb6e41d432234', '85858898243', '2022-11-15', 1, 3, 25, 61, 32),
(95, 'Sérgio Matheus Alexandre Martins', 'sergio-martins86@pontofinalcafe.com.br', '0dd145d84357a1c735085921860957f1', '24367014746', '1995-10-02', 1, 3, 26, 87, 41),
(97, 'Antonella Gabriela Vanessa Ferreira', 'antonellagabrielaferreira@corpoclinica.com.br', '5e156bc502739ce1440126b39d2abbf8', '87592664224', '1959-03-01', 1, 3, 25, 89, 45),
(98, 'Patrícia Cláudia Nina Silveira', 'patricia_claudia_silveira@com.br', '95cbbcbc467825b5b650e13854e8dd4c', '40519133170', '1950-01-16', 1, 3, 26, 90, 41),
(102, 'Rafaela Teresinha Cristiane Gonçalves', 'deeeeeerni@gmail.com', '52c69e3a57331081823331c4e69d3f2e', '07865335807', '2022-10-05', 1, 3, 2, 93, 2),
(106, 'manu davila', 'davi090@outlook.com', 'cc68e6c7f10425a28251e6f770a745dd', '85158358243', '2002-06-29', 1, 3, 49, 96, 10),
(107, 'malini caleb', 'calebtrt@outlook.com', 'd367b10d880b793908d522d8f292a6e9', '85828158243', '2001-11-12', 1, 3, 51, 95, 2);

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
  ADD UNIQUE KEY `codigo` (`codigo`),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
