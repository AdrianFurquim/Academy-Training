-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jul-2024 às 03:18
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste academy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `exe_nome` varchar(50) NOT NULL,
  `mem_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`exe_nome`, `mem_nome`) VALUES
(' Remada Unilateral Halter', 'Costa'),
('Abdução de Quadril Roldana', 'Membros Inferiores'),
('Abdução de Quadril Tornozeleira', 'Membros Inferiores'),
('Abdução Quadril Aparelho', 'Membros Inferiores'),
('Agachamento Barra', 'Membros Inferiores'),
('Agachamento Hack', 'Membros Inferiores'),
('Agachamento Pórtico', 'Membros Inferiores'),
('Agachamento Sissy Squat', 'Membros Inferiores'),
('Agachamento Sumô', 'Membros Inferiores'),
('Avanço Barra', 'Membros Inferiores'),
('Avanço Barra Hexagonal', 'Membros Inferiores'),
('Avanço Passadas', 'Membros Inferiores'),
('Avanço Pórtico', 'Membros Inferiores'),
('Barra Livre Costa', 'Costa'),
('Barra Livre Frente', 'Costa'),
('Cadeira Adutora', 'Membros Inferiores'),
('Cadeira Adutora Dropset', 'Membros Inferiores'),
('Cadeira Extensora', 'Membros Inferiores'),
('Cadeira Extensora Dropset', 'Membros Inferiores'),
('Cadeira Extensora Isometria', 'Membros Inferiores'),
('Cadeira Extensora Unilateral', 'Membros Inferiores'),
('Cross Over', 'Peito'),
('Crucifixo Aparelho', 'Peito'),
('Crucifixo Halter', 'Peito'),
('Crucifixo Invertido Cross', 'Ombro'),
('Crucifixo Invertido Dropset', 'Ombro'),
('Crucifixo Invertido Halter', 'Ombro'),
('Crucifixo Invertido Peck Deck', 'Ombro'),
('Desenvolvimento Com Halter Arnold Press', 'Ombro'),
('Desenvolvimento Com Halter Lateral', 'Ombro'),
('Desenvolvimento Com Halter Pegada Supinada', 'Ombro'),
('Desenvolvimento Frontal Barra', 'Ombro'),
('Desenvolvimento Frontal Pórtico', 'Ombro'),
('Desenvolvimento no Aparelho', 'Ombro'),
('Desenvolvimento Posterior Barra', 'Ombro'),
('Desenvolvimento Posterior Pórtico', 'Ombro'),
('Dropset', 'Peito'),
('Elevação Frontal Barra', 'Ombro'),
('Elevação Frontal Dropset', 'Ombro'),
('Elevação Frontal Halter', 'Ombro'),
('Elevação Frontal Roldana', 'Ombro'),
('Elevação Lateral Dropset', 'Ombro'),
('Elevação Lateral Halter', 'Ombro'),
('Elevação Lateral Roldana Unilateral', 'Ombro'),
('Elevação Pélvica Aparelho', 'Membros Inferiores'),
('Elevação Pélvica Banco', 'Membros Inferiores'),
('Encolhimento Barra', 'Ombro'),
('Encolhimento Dropset', 'Ombro'),
('Encolhimento Halter', 'Ombro'),
('Encolhimento Pórtico', 'Ombro'),
('Glúteo Máquina', 'Membros Inferiores'),
('Glúteo Roldana', 'Membros Inferiores'),
('Glúteo Tornozeleira', 'Membros Inferiores'),
('Inclinação Lateral Anilha', 'Abdominal'),
('Inclinação Lateral Aparelho Lombar', 'Abdominal'),
('Inclinação Lateral Colchonete', 'Abdominal'),
('Inclinação Lateral Cross', 'Abdominal'),
('Infra no Colshonete', 'Abdominal'),
('Infra no Colshonete Boxeador', 'Abdominal'),
('Infra no Colshonete Paralelas', 'Abdominal'),
('Leg Press 45º', 'Membros Inferiores'),
('Leg Press Unilateral', 'Membros Inferiores'),
('Lombar no Aparelho', 'Costa'),
('Mesa Flexora', 'Membros Inferiores'),
('Mesa Flexora Dropset', 'Membros Inferiores'),
('Mesa Flexora Flexor em Pé Tornozeleira', 'Membros Inferiores'),
('Mesa Flexora Unilateral', 'Membros Inferiores'),
('Panturrilha Gêmeos', 'Membros Inferiores'),
('Panturrilha Leg Press', 'Membros Inferiores'),
('Panturrilha Pórtico', 'Membros Inferiores'),
('Panturrilhas Livre', 'Membros Inferiores'),
('Peck Dack', 'Peito'),
('Prancha Lateral', 'Abdominal'),
('Prancha Unilateral Frontal', 'Abdominal'),
('Pull Down', 'Costa'),
('Pulley Costa', 'Costa'),
('Pulley Frente', 'Costa'),
('Pulley Pegada Invertida', 'Costa'),
('Pulley Triângulo', 'Costa'),
('Pullover', 'Peito'),
('Remada Alta Barra', 'Costa'),
('Remada Alta Barra Dropset', 'Costa'),
('Remada Alta Dropset', 'Ombro'),
('Remada Alta Roldana', 'Costa'),
('Remada Articulada Aberta', 'Costa'),
('Remada Articulada Fechada', 'Costa'),
('Remada Articulada Unilateral', 'Costa'),
('Remada Baixa Barra', 'Costa'),
('Remada Baixa Triangulo', 'Costa'),
('Remada Baixa Unilateral', 'Costa'),
('Remada Cavalinho', 'Costa'),
('Remada Curvada', 'Costa'),
('Remada Unilateral Cross', 'Costa'),
('Remador', 'AbdominalAbdominal'),
('Remador Canivete', 'Abdominal'),
('Remador Com Ailha e Tornozeleira', 'Abdominal'),
('Rosca Alternada', 'Bíceps'),
('Rosca Alternada banco 45º', 'Bíceps'),
('Rosca Concentrada', 'Bíceps'),
('Rosca Direta *21', 'Bíceps'),
('Rosca Direta Barra', 'Bíceps'),
('Rosca Direta Dropset', 'Bíceps'),
('Rosca Direta Roldana', 'Bíceps'),
('Rosca Inversa *21', 'Bíceps'),
('Rosca Inversa Barra', 'Bíceps'),
('Rosca Inversa Dropset', 'Bíceps'),
('Rosca Inversa Roldana', 'Bíceps'),
('Rosca Martelo', 'Bíceps'),
('Rosca Martelo Dropset', 'Bíceps'),
('Rosca Pinho Pegada Invertida', 'Bíceps'),
('Rosca Punho', 'Bíceps'),
('Rosca Scott Barra', 'Bíceps'),
('Rosca Scott Unilateral', 'Bíceps'),
('Rosca Simultanea', 'Bíceps'),
('Rosca Simultânea Dropset', 'Bíceps'),
('Stiff Barra', 'Membros Inferiores'),
('Stiff Halter', 'Membros Inferiores'),
('Stiff Pórtico', 'Membros Inferiores'),
('Supino Articulado', 'Peito'),
('Supino Declinado Barra', 'Peito'),
('Supino Declinado Halter', 'Peito'),
('Supino Declinado Pórtico', 'Peito'),
('Supino Inclinado Barra', 'Peito'),
('Supino Inclinado Halter', 'Peito'),
('Supino Inclinado Pórtico', 'Peito'),
('Supino Reto Barra', 'Peito'),
('Supino Reto Halter', 'Peito'),
('Supino Reto Pórtico', 'Peito'),
('Supra Colchonete', 'Abdominal'),
('Supra Colchonete Com Anilha', 'Abdominal'),
('Supra Colchonete Com Barra', 'Abdominal'),
('Supra Colchonete Pórtico', 'Abdominal'),
('Tríceps Coice Cross', 'Tríceps'),
('Tríceps Coice Halter', 'Tríceps'),
('Tríceps Corda', 'Tríceps'),
('Tríceps Dropset', 'Tríceps'),
('Tríceps Frânces Cross', 'Tríceps'),
('Tríceps Frânces Halter', 'Tríceps'),
('Tríceps Frânces Unilateral', 'Tríceps'),
('Tríceps Mergulho Banco', 'Tríceps'),
('Tríceps Mergulho Paralelas', 'Tríceps'),
('Tríceps Pegada Invertida', 'Tríceps'),
('Tríceps Roldana', 'Tríceps'),
('Tríceps Roldana Dropset', 'Tríceps'),
('Tríceps Roldana Unilateral', 'Tríceps'),
('Tríceps Supino Barra', 'Tríceps'),
('Tríceps Supino Pórtico', 'Tríceps'),
('Tríceps Testa Barra', 'Tríceps'),
('Tríceps Testa Cross', 'Tríceps'),
('Tríceps Testa Dropset', 'Tríceps'),
('Tríceps Testa Halter', 'Tríceps');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `mem_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membro`
--

INSERT INTO `membro` (`mem_nome`) VALUES
('Abdominal'),
('Bíceps'),
('Costa'),
('Membros Inferiores'),
('Ombro'),
('Peito'),
('Tríceps');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro_treino`
--

CREATE TABLE `membro_treino` (
  `treino_dia` varchar(15) NOT NULL,
  `mem_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membro_treino`
--

INSERT INTO `membro_treino` (`treino_dia`, `mem_nome`) VALUES
('Terça-Feira', 'Peito'),
('Terça-Feira', 'Tríceps'),
('Terça-Feira', 'Abdominal'),
('Quarta-Feira', 'Costa'),
('Quarta-Feira', 'Bíceps'),
('Quinta-Feira', 'Ombro'),
('Quinta-Feira', 'Membros Inferiores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `series_exercicios`
--

CREATE TABLE `series_exercicios` (
  `ser_serie` varchar(20) NOT NULL,
  `ser_ordem` int(11) NOT NULL,
  `exe_nome` varchar(50) NOT NULL,
  `mem_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `series_exercicios`
--

INSERT INTO `series_exercicios` (`ser_serie`, `ser_ordem`, `exe_nome`, `mem_nome`) VALUES
('3 x 10', 1, 'Tríceps Corda', 'Tríceps'),
('3 x 10', 2, 'Tríceps Roldana', 'Tríceps'),
('3 x 10', 3, 'Tríceps Pegada Invertida', 'Tríceps'),
('3 x 30s - 40s', 1, 'Prancha Unilateral Frontal', 'Abdominal'),
('3 x 30s - 40s', 2, 'Prancha Lateral', 'Abdominal'),
('3 x 10', 1, 'Remada Articulada Aberta', 'Costa'),
('3 x 10', 2, 'Remada Articulada Fechada', 'Costa'),
('3 x 10', 3, 'Remada Baixa Triangulo', 'Costa'),
('3 x 10', 4, 'Pulley Frente', 'Costa'),
('3 x 10', 1, 'Rosca Direta Roldana', 'Bíceps'),
('3 x 10', 2, 'Rosca Simultanea', 'Bíceps'),
('3 x 10', 3, 'Rosca Martelo', 'Bíceps'),
('3 x 10', 1, 'Desenvolvimento no Aparelho', 'Ombro'),
('3 x 10', 2, 'Elevação Frontal Halter', 'Ombro'),
('3 x 10', 3, 'Elevação Lateral Halter', 'Ombro'),
('3 x 10', 1, 'Cadeira Extensora', 'Membros Inferiores'),
('3 x 10', 2, 'Cadeira Extensora Unilateral', 'Membros Inferiores'),
('3 x 10', 3, 'Cadeira Adutora', 'Membros Inferiores'),
('3 x 10', 4, 'Abdução Quadril Aparelho', 'Membros Inferiores'),
('3 x 10', 5, 'Panturrilhas Livre', 'Membros Inferiores'),
('3 x 10', 1, 'Peck Dack', 'Peito'),
('3 x 10', 2, 'Supino Articulado', 'Peito'),
('3 x 10', 3, 'Crucifixo Halter', 'Peito'),
('3 x 30s - 40s', 3, 'Infra no Colshonete Boxeador', 'Abdominal'),
('3 x 30s - 40s', 4, 'Inclinação Lateral Cross', 'Abdominal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treino`
--

CREATE TABLE `treino` (
  `treino_dia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `treino`
--

INSERT INTO `treino` (`treino_dia`) VALUES
('Domingo'),
('Quarta-Feira'),
('Quinta-Feira'),
('Sábado'),
('Segunda-Feira'),
('Sexta-Feira'),
('Terça-Feira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(30) NOT NULL,
  `usu_altura` double NOT NULL,
  `usu_peso` int(11) NOT NULL,
  `usu_dias_treinados` int(11) NOT NULL,
  `usu_temp_treinamento` int(11) NOT NULL,
  `usu_meta` varchar(200) NOT NULL,
  `usu_senha` varchar(30) NOT NULL,
  `usu_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_altura`, `usu_peso`, `usu_dias_treinados`, `usu_temp_treinamento`, `usu_meta`, `usu_senha`, `usu_email`) VALUES
(1, 'Usuário Teste', 1.8, 65, 6, 3, '-', 'senha123', 'usuario.teste@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_treino`
--

CREATE TABLE `usuario_treino` (
  `treino_dia` varchar(15) NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario_treino`
--

INSERT INTO `usuario_treino` (`treino_dia`, `usu_id`) VALUES
('Quarta-Feira', 1),
('Quinta-Feira', 1),
('Terça-Feira', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`exe_nome`);

--
-- Índices para tabela `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`mem_nome`);

--
-- Índices para tabela `membro_treino`
--
ALTER TABLE `membro_treino`
  ADD KEY `mem_nome` (`mem_nome`),
  ADD KEY `treino_dia` (`treino_dia`);

--
-- Índices para tabela `series_exercicios`
--
ALTER TABLE `series_exercicios`
  ADD KEY `mem_nome` (`mem_nome`),
  ADD KEY `exe_nome` (`exe_nome`);

--
-- Índices para tabela `treino`
--
ALTER TABLE `treino`
  ADD PRIMARY KEY (`treino_dia`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- Índices para tabela `usuario_treino`
--
ALTER TABLE `usuario_treino`
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `treino_dia` (`treino_dia`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `membro_treino`
--
ALTER TABLE `membro_treino`
  ADD CONSTRAINT `membro_treino_ibfk_1` FOREIGN KEY (`mem_nome`) REFERENCES `membro` (`mem_nome`),
  ADD CONSTRAINT `membro_treino_ibfk_2` FOREIGN KEY (`treino_dia`) REFERENCES `treino` (`treino_dia`);

--
-- Limitadores para a tabela `series_exercicios`
--
ALTER TABLE `series_exercicios`
  ADD CONSTRAINT `series_exercicios_ibfk_1` FOREIGN KEY (`mem_nome`) REFERENCES `membro` (`mem_nome`),
  ADD CONSTRAINT `series_exercicios_ibfk_2` FOREIGN KEY (`exe_nome`) REFERENCES `exercicio` (`exe_nome`);

--
-- Limitadores para a tabela `usuario_treino`
--
ALTER TABLE `usuario_treino`
  ADD CONSTRAINT `usuario_treino_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`),
  ADD CONSTRAINT `usuario_treino_ibfk_2` FOREIGN KEY (`treino_dia`) REFERENCES `treino` (`treino_dia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
