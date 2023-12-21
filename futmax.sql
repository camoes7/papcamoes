-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Dez-2023 às 19:56
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `futmax`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campos`
--

CREATE TABLE `campos` (
  `id` int(11) NOT NULL,
  `nome_do_campo` varchar(255) DEFAULT NULL,
  `cod_postal` int(11) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tipo_campo` varchar(50) DEFAULT NULL,
  `id_comodidade` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco_por_hora` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `campos`
--

INSERT INTO `campos` (`id`, `nome_do_campo`, `cod_postal`, `telefone`, `email`, `tipo_campo`, `id_comodidade`, `descricao`, `preco_por_hora`) VALUES
(1, 'campo vigorosa', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'campo paranhos ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Indoor Soccer Arca d\'Água', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'campo paranhos (salão)', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cancelamento`
--

CREATE TABLE `cancelamento` (
  `id_cancelamento` int(11) NOT NULL,
  `id_campo` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `valor_devolvido` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comodidade`
--

CREATE TABLE `comodidade` (
  `id_comididade` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comodidade_campo`
--

CREATE TABLE `comodidade_campo` (
  `id_campo` int(11) DEFAULT NULL,
  `id_comodidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id_cpostal` int(11) NOT NULL,
  `localidade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacoes`
--

CREATE TABLE `marcacoes` (
  `id_campo` int(11) NOT NULL DEFAULT 0,
  `data` date NOT NULL,
  `hora_de_marcacao` time NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `preco_aluguer` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regras`
--

CREATE TABLE `regras` (
  `id_regra` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regras_campo`
--

CREATE TABLE `regras_campo` (
  `id_campo` int(11) DEFAULT NULL,
  `id_regra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo_user` tinyint(1) DEFAULT NULL,
  `pergunta` text DEFAULT NULL,
  `resposta` text DEFAULT NULL,
  `nif` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `login`, `password`, `tipo_user`, `pergunta`, `resposta`, `nif`) VALUES
(1, 'Eduardo', 'ola@gmail.com', 'camoes', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'ola', '2fe04e524ba40505a82e03a2819429cc', NULL),
(3, 'admin', 'admin@gmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'ola', '2fe04e524ba40505a82e03a2819429cc', NULL),
(5, '1', '12@12', '1', 'c4ca4238a0b923820dcc509a6f75849b', 0, '1', 'c4ca4238a0b923820dcc509a6f75849b', NULL),
(6, '1', '12@12', '1', 'c4ca4238a0b923820dcc509a6f75849b', 0, '1', 'c4ca4238a0b923820dcc509a6f75849b', NULL),
(8, 'Camões', 'gencamoes@gmail.com', 'camoes_mao_de_trolha', '81dc9bdb52d04dc20036dbd8313ed055', 0, '12', 'c20ad4d76fe97759aa27a0c99bff6710', NULL),
(9, 'Guilherme Camões', 'olaa@gmail.com', 'pirocas', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'cona', '0fec008ade566040701490d0a546491c', NULL),
(10, 'joao', 'joao@gmail.com', 'joao', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'ola', '2fe04e524ba40505a82e03a2819429cc', NULL),
(11, 'joao', 'joao@gmail.com', 'joao', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'ola', '2fe04e524ba40505a82e03a2819429cc', NULL),
(12, 'miguelll', 'miguel@gmail.com', 'miguel', '81dc9bdb52d04dc20036dbd8313ed055', 0, '1234', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(13, 'miguel', 'miguel@gmail.com', 'miguel', '81dc9bdb52d04dc20036dbd8313ed055', 0, '1234', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(14, 'miguel', 'miguel@gmail.com', 'miguel', '81dc9bdb52d04dc20036dbd8313ed055', 0, '1234', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(15, 'miguel', 'miguel@gmail.com', 'miguel', '81dc9bdb52d04dc20036dbd8313ed055', 0, '1234', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(16, 'miguel', 'miguel@gmail.com', 'miguel', '81dc9bdb52d04dc20036dbd8313ed055', 0, '1234', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(19, 'joao1', 'gencamoes@gmail.com', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 0, '1234', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `votacao`
--

CREATE TABLE `votacao` (
  `id_campo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `numero_de_estrelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `campos`
--
ALTER TABLE `campos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_campos_local` (`cod_postal`);

--
-- Índices para tabela `cancelamento`
--
ALTER TABLE `cancelamento`
  ADD PRIMARY KEY (`id_cancelamento`),
  ADD KEY `FK_cancelamento_campos` (`id_campo`),
  ADD KEY `FK_cancelamento_users` (`id_user`);

--
-- Índices para tabela `comodidade`
--
ALTER TABLE `comodidade`
  ADD PRIMARY KEY (`id_comididade`,`descricao`);

--
-- Índices para tabela `comodidade_campo`
--
ALTER TABLE `comodidade_campo`
  ADD KEY `FK_comodidade_campo_campos` (`id_campo`),
  ADD KEY `FK_comodidade_campo_comodidade` (`id_comodidade`);

--
-- Índices para tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_cpostal`);

--
-- Índices para tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD PRIMARY KEY (`id_campo`,`data`,`hora_de_marcacao`),
  ADD KEY `FK_marcacoes_users` (`id_cliente`);

--
-- Índices para tabela `regras`
--
ALTER TABLE `regras`
  ADD PRIMARY KEY (`id_regra`,`descricao`);

--
-- Índices para tabela `regras_campo`
--
ALTER TABLE `regras_campo`
  ADD KEY `FK_regras_campo_campos` (`id_campo`),
  ADD KEY `FK_regras_campo_regras` (`id_regra`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `votacao`
--
ALTER TABLE `votacao`
  ADD PRIMARY KEY (`id_campo`,`id_user`),
  ADD KEY `FK_votacao_users` (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `campos`
--
ALTER TABLE `campos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cancelamento`
--
ALTER TABLE `cancelamento`
  MODIFY `id_cancelamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `campos`
--
ALTER TABLE `campos`
  ADD CONSTRAINT `FK_campos_local` FOREIGN KEY (`cod_postal`) REFERENCES `local` (`id_cpostal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cancelamento`
--
ALTER TABLE `cancelamento`
  ADD CONSTRAINT `FK_cancelamento_campos` FOREIGN KEY (`id_campo`) REFERENCES `campos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_cancelamento_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comodidade_campo`
--
ALTER TABLE `comodidade_campo`
  ADD CONSTRAINT `FK_comodidade_campo_campos` FOREIGN KEY (`id_campo`) REFERENCES `campos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_comodidade_campo_comodidade` FOREIGN KEY (`id_comodidade`) REFERENCES `comodidade` (`id_comididade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `FK_local_votacao` FOREIGN KEY (`id_cpostal`) REFERENCES `votacao` (`id_campo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD CONSTRAINT `FK_marcacoes_campos` FOREIGN KEY (`id_campo`) REFERENCES `campos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_marcacoes_users` FOREIGN KEY (`id_cliente`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `regras_campo`
--
ALTER TABLE `regras_campo`
  ADD CONSTRAINT `FK_regras_campo_campos` FOREIGN KEY (`id_campo`) REFERENCES `campos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_regras_campo_regras` FOREIGN KEY (`id_regra`) REFERENCES `regras` (`id_regra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `votacao`
--
ALTER TABLE `votacao`
  ADD CONSTRAINT `FK_votacao_campos` FOREIGN KEY (`id_campo`) REFERENCES `campos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_votacao_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
