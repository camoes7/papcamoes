-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Mar-2022 às 16:06
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cabeleireiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE `cartao` (
  `id` int(11) NOT NULL,
  `id_utilizadores` int(11) NOT NULL,
  `cortes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`) VALUES
(3, 'António'),
(4, 'Xavier'),
(5, 'Olavo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacoes`
--

CREATE TABLE `marcacoes` (
  `data` date NOT NULL,
  `horamarcacao` time NOT NULL,
  `funcionario` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `compareceu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marcacoes`
--

INSERT INTO `marcacoes` (`data`, `horamarcacao`, `funcionario`, `idcliente`, `compareceu`) VALUES
('2022-02-04', '19:00:00', 3, 8, 0),
('2022-02-05', '12:00:00', 3, 8, 0),
('2022-02-07', '13:00:00', 4, 8, 0),
('2022-02-08', '09:00:00', 3, 6, 0),
('2022-02-08', '09:00:00', 4, 6, 0),
('2022-02-08', '09:00:00', 5, 6, 0),
('2022-02-08', '10:00:00', 3, 6, 0),
('2022-02-08', '10:00:00', 4, 6, 0),
('2022-02-08', '10:00:00', 5, 6, 0),
('2022-02-08', '11:00:00', 3, 6, 0),
('2022-02-08', '11:00:00', 4, 6, 0),
('2022-02-08', '11:00:00', 5, 6, 0),
('2022-02-08', '13:00:00', 3, 9, 0),
('2022-02-08', '13:00:00', 4, 8, 0),
('2022-02-08', '17:00:00', 3, 8, 0),
('2022-02-08', '18:00:00', 3, 10, 0),
('2022-02-10', '09:00:00', 3, 8, 0),
('2022-02-10', '12:00:00', 4, 9, 0),
('2022-02-10', '15:00:00', 4, 12, 0),
('2022-02-11', '16:00:00', 3, 8, 0),
('2022-02-12', '15:00:00', 3, 8, 0),
('2022-02-21', '18:00:00', 3, 11, 0),
('2022-02-21', '19:00:00', 3, 11, 0),
('2022-02-25', '15:00:00', 3, 8, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `precario`
--

CREATE TABLE `precario` (
  `tipo` varchar(32) NOT NULL,
  `preco` int(3) NOT NULL,
  `tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `tipo_user` text NOT NULL,
  `pergunta` varchar(100) NOT NULL,
  `resposta` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `login`, `password`, `tipo_user`, `pergunta`, `resposta`) VALUES
(6, 'antove', 'antove@gmail.com', 'antove', '827ccb0eea8a706c4c34a16891f84e7b', 'c', 'Escreva \'12345\'', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'professor', 'professor@gmail.com', 'professor', '3f9cd3c7b11eb1bae99dddb3d05da3c5', 'c', '', ''),
(9, 'rui', 'rui@gmail.com', 'rui', '0eb46665addf43389ae950050f787a45', 'c', 'Escreva \'12345\'', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'joao', 'joao@gmail.com', 'joao', 'dccd96c256bc7dd39bae41a405f25e43', 'c', 'Escreva \'12345\'', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'luis', 'luis@gmail.com', 'luis', '502ff82f7f1f8218dd41201fe4353687', 'c', 'Escreva \'12345\'', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'jonas', 'jonas@gmail.com', 'jonas', 'e10adc3949ba59abbe56e057f20f883e', 'c', 'Escreva \'12345\'', '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'Sr. Professor', 'f174@prof.filipa-vilhena.edu.pt', 'srp', '827ccb0eea8a706c4c34a16891f84e7b', 'c', 'Escreva \'12345\'', '827ccb0eea8a706c4c34a16891f84e7b'),
(16, 'Sr. professor de seu mail antigo', 'miguel.canossa@clix.pt', 'srpAntigo', '827ccb0eea8a706c4c34a16891f84e7b', 'c', 'Qual a matrÃ­cula do Puntareco? Lembras-te?', 'ac50c851de3aa6adb1f63468272638e0');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD PRIMARY KEY (`data`,`horamarcacao`,`funcionario`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `login_2` (`login`),
  ADD KEY `email` (`email`),
  ADD KEY `login` (`login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cartao`
--
ALTER TABLE `cartao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
