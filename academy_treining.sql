-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Ago-2024 às 02:47
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
-- Banco de dados: `academy_treining`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_exercicio`
--

CREATE TABLE `dados_exercicio` (
  `vis_exe_nome` varchar(50) NOT NULL,
  `vis_mem_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_exercicio`
--

INSERT INTO `dados_exercicio` (`vis_exe_nome`, `vis_mem_nome`) VALUES
(' Remada Unilateral Halter', 'Costa'),
('Abdução de Quadril Roldana', 'Membros Inferiores'),
('Abdução de Quadril Tornozeleira', 'Membros Inferiores'),
('Abdução Quadril Aparelho', 'Membros Inferiores'),
('Agachamento Barra', 'Membros Inferiores'),
('Agachamento Hack', 'Membros Inferiores'),
('Agachamento Livre+Cadeirinha', 'Membros Inferiores'),
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
-- Estrutura da tabela `dias`
--

CREATE TABLE `dias` (
  `dia_nome` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dias`
--

INSERT INTO `dias` (`dia_nome`) VALUES
('Domingo'),
('Quarta-Feira'),
('Quinta-Feira'),
('Sábado'),
('Segunda-Feira'),
('Sexta-Feira'),
('Terça-Feira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `exe_id` int(11) NOT NULL,
  `exe_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`exe_id`, `exe_nome`) VALUES
(3, ' Remada Unilateral Halter'),
(4, 'Abdução de Quadril Roldana'),
(5, 'Abdução de Quadril Tornozeleira'),
(6, 'Abdução Quadril Aparelho'),
(7, 'Agachamento Barra'),
(8, 'Agachamento Hack'),
(9, 'Agachamento Livre+Cadeirinha'),
(10, 'Agachamento Pórtico'),
(11, 'Agachamento Sissy Squat'),
(12, 'Agachamento Sumô'),
(13, 'Avanço Barra'),
(14, 'Avanço Barra Hexagonal'),
(15, 'Avanço Passadas'),
(16, 'Avanço Pórtico'),
(17, 'Barra Livre Costa'),
(18, 'Barra Livre Frente'),
(19, 'Cadeira Adutora'),
(20, 'Cadeira Adutora Dropset'),
(21, 'Cadeira Extensora'),
(22, 'Cadeira Extensora Dropset'),
(23, 'Cadeira Extensora Isometria'),
(24, 'Cadeira Extensora Unilateral'),
(25, 'Cross Over'),
(26, 'Crucifixo Aparelho'),
(27, 'Crucifixo Halter'),
(28, 'Crucifixo Invertido Cross'),
(29, 'Crucifixo Invertido Dropset'),
(30, 'Crucifixo Invertido Halter'),
(31, 'Crucifixo Invertido Peck Deck'),
(32, 'Desenvolvimento Com Halter Arnold Press'),
(33, 'Desenvolvimento Com Halter Lateral'),
(34, 'Desenvolvimento Com Halter Pegada Supinada'),
(35, 'Desenvolvimento Frontal Barra'),
(36, 'Desenvolvimento Frontal Pórtico'),
(37, 'Desenvolvimento no Aparelho'),
(38, 'Desenvolvimento Posterior Barra'),
(39, 'Desenvolvimento Posterior Pórtico'),
(40, 'Dropset'),
(41, 'Elevação Frontal Barra'),
(42, 'Elevação Frontal Dropset'),
(43, 'Elevação Frontal Halter'),
(44, 'Elevação Frontal Roldana'),
(45, 'Elevação Lateral Dropset'),
(46, 'Elevação Lateral Halter'),
(47, 'Elevação Lateral Roldana Unilateral'),
(48, 'Elevação Pélvica Aparelho'),
(49, 'Elevação Pélvica Banco'),
(50, 'Encolhimento Barra'),
(51, 'Encolhimento Dropset'),
(52, 'Encolhimento Halter'),
(53, 'Encolhimento Pórtico'),
(54, 'Glúteo Máquina'),
(55, 'Glúteo Roldana'),
(56, 'Glúteo Tornozeleira'),
(57, 'Inclinação Lateral Anilha'),
(58, 'Inclinação Lateral Aparelho Lombar'),
(59, 'Inclinação Lateral Colchonete'),
(60, 'Inclinação Lateral Cross'),
(61, 'Infra no Colshonete'),
(62, 'Infra no Colshonete Boxeador'),
(63, 'Infra no Colshonete Paralelas'),
(64, 'Leg Press 45º'),
(65, 'Leg Press Unilateral'),
(66, 'Lombar no Aparelho'),
(67, 'Mesa Flexora'),
(68, 'Mesa Flexora Dropset'),
(69, 'Mesa Flexora Flexor em Pé Tornozeleira'),
(70, 'Mesa Flexora Unilateral'),
(71, 'Panturrilha Gêmeos'),
(72, 'Panturrilha Leg Press'),
(73, 'Panturrilha Pórtico'),
(74, 'Panturrilhas Livre'),
(75, 'Peck Dack'),
(76, 'Prancha Lateral'),
(77, 'Prancha Unilateral Frontal'),
(78, 'Pull Down'),
(79, 'Pulley Costa'),
(80, 'Pulley Frente'),
(81, 'Pulley Pegada Invertida'),
(82, 'Pulley Triângulo'),
(83, 'Pullover'),
(84, 'Remada Alta Barra'),
(85, 'Remada Alta Barra Dropset'),
(86, 'Remada Alta Dropset'),
(87, 'Remada Alta Roldana'),
(88, 'Remada Articulada Aberta'),
(89, 'Remada Articulada Fechada'),
(90, 'Remada Articulada Unilateral'),
(91, 'Remada Baixa Barra'),
(92, 'Remada Baixa Triangulo'),
(93, 'Remada Baixa Unilateral'),
(94, 'Remada Cavalinho'),
(95, 'Remada Curvada'),
(96, 'Remada Unilateral Cross'),
(97, 'Remador'),
(98, 'Remador Canivete'),
(99, 'Remador Com Ailha e Tornozeleira'),
(100, 'Rosca Alternada'),
(101, 'Rosca Alternada banco 45º'),
(102, 'Rosca Concentrada'),
(103, 'Rosca Direta *21'),
(104, 'Rosca Direta Barra'),
(105, 'Rosca Direta Dropset'),
(106, 'Rosca Direta Roldana'),
(107, 'Rosca Inversa *21'),
(108, 'Rosca Inversa Barra'),
(109, 'Rosca Inversa Dropset'),
(110, 'Rosca Inversa Roldana'),
(111, 'Rosca Martelo'),
(112, 'Rosca Martelo Dropset'),
(113, 'Rosca Pinho Pegada Invertida'),
(114, 'Rosca Punho'),
(115, 'Rosca Scott Barra'),
(116, 'Rosca Scott Unilateral'),
(117, 'Rosca Simultanea'),
(118, 'Rosca Simultânea Dropset'),
(119, 'Stiff Barra'),
(120, 'Stiff Halter'),
(121, 'Stiff Pórtico'),
(122, 'Supino Articulado'),
(123, 'Supino Declinado Barra'),
(124, 'Supino Declinado Halter'),
(125, 'Supino Declinado Pórtico'),
(126, 'Supino Inclinado Barra'),
(127, 'Supino Inclinado Halter'),
(128, 'Supino Inclinado Pórtico'),
(129, 'Supino Reto Barra'),
(130, 'Supino Reto Halter'),
(131, 'Supino Reto Pórtico'),
(132, 'Supra Colchonete'),
(133, 'Supra Colchonete Com Anilha'),
(134, 'Supra Colchonete Com Barra'),
(135, 'Supra Colchonete Pórtico'),
(136, 'Tríceps Coice Cross'),
(137, 'Tríceps Coice Halter'),
(138, 'Tríceps Corda'),
(139, 'Tríceps Dropset'),
(140, 'Tríceps Frânces Cross'),
(141, 'Tríceps Frânces Halter'),
(142, 'Tríceps Frânces Unilateral'),
(143, 'Tríceps Mergulho Banco'),
(144, 'Tríceps Mergulho Paralelas'),
(145, 'Tríceps Pegada Invertida'),
(146, 'Tríceps Roldana'),
(147, 'Tríceps Roldana Dropset'),
(148, 'Tríceps Roldana Unilateral'),
(149, 'Tríceps Supino Barra'),
(150, 'Tríceps Supino Pórtico'),
(151, 'Tríceps Testa Barra'),
(152, 'Tríceps Testa Cross'),
(153, 'Tríceps Testa Dropset'),
(154, 'Tríceps Testa Halter');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio_serieordem`
--

CREATE TABLE `exercicio_serieordem` (
  `exe_ser_id` int(11) NOT NULL,
  `exercicio_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicio_serieordem`
--

INSERT INTO `exercicio_serieordem` (`exe_ser_id`, `exercicio_id`, `serie_id`) VALUES
(1, 83, 1),
(2, 126, 1),
(3, 127, 1),
(4, 129, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `mem_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`mem_nome`) VALUES
('Abdominal'),
('Bíceps'),
('Costa'),
('Membros Inferiores'),
('Ombro'),
('Peito'),
('Tríceps');

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie_ordem`
--

CREATE TABLE `serie_ordem` (
  `ser_serie` varchar(15) NOT NULL,
  `ser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `serie_ordem`
--

INSERT INTO `serie_ordem` (`ser_serie`, `ser_id`) VALUES
('3 x 10', 1),
('3 x 12', 2),
('4 x 10', 3),
('4 x 12', 4),
('3 x 30s - 40s', 5),
('3 x +60s', 6),
('3 x 30s - 40s', 7),
('3 x +60s', 8),
('Desejável', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinos`
--

CREATE TABLE `treinos` (
  `tre_id` int(11) NOT NULL,
  `membro_nome` varchar(50) NOT NULL,
  `dia_nome` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `treinos`
--

INSERT INTO `treinos` (`tre_id`, `membro_nome`, `dia_nome`) VALUES
(1, 'Peito', 'Terça-Feira'),
(2, 'Tríceps', 'Terça-Feira'),
(3, 'Abdominal', 'Terça-Feira'),
(4, 'Costa', 'Quarta-Feira'),
(5, 'Bíceps', 'Quarta-Feira'),
(6, 'Ombro', 'Quinta-Feira'),
(7, 'Membros Inferiores', 'Quinta-Feira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treino_exercicios`
--

CREATE TABLE `treino_exercicios` (
  `tre_exe_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `treino_id` int(11) NOT NULL,
  `exercicio_serie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `treino_exercicios`
--

INSERT INTO `treino_exercicios` (`tre_exe_id`, `usuario_id`, `treino_id`, `exercicio_serie_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(30) NOT NULL,
  `usu_email` varchar(40) NOT NULL,
  `usu_senha` varchar(20) NOT NULL,
  `usu_altura` double NOT NULL,
  `usu_tempo_treinando` int(11) NOT NULL,
  `usu_peso` int(11) NOT NULL,
  `usu_meta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_email`, `usu_senha`, `usu_altura`, `usu_tempo_treinando`, `usu_peso`, `usu_meta`) VALUES
(1, 'Usuário Teste', 'teste@gmail.com', 'senha123', 1.8, 30, 65, '70 kilos');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`dia_nome`);

--
-- Índices para tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`exe_id`);

--
-- Índices para tabela `exercicio_serieordem`
--
ALTER TABLE `exercicio_serieordem`
  ADD PRIMARY KEY (`exe_ser_id`),
  ADD KEY `fk_exercicio_id` (`exercicio_id`),
  ADD KEY `fk_serie_id` (`serie_id`);

--
-- Índices para tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`mem_nome`);

--
-- Índices para tabela `serie_ordem`
--
ALTER TABLE `serie_ordem`
  ADD PRIMARY KEY (`ser_id`);

--
-- Índices para tabela `treinos`
--
ALTER TABLE `treinos`
  ADD PRIMARY KEY (`tre_id`),
  ADD KEY `fk_membro_nome` (`membro_nome`),
  ADD KEY `fk_dia_nome` (`dia_nome`);

--
-- Índices para tabela `treino_exercicios`
--
ALTER TABLE `treino_exercicios`
  ADD PRIMARY KEY (`tre_exe_id`),
  ADD KEY `fk_treino_id` (`treino_id`),
  ADD KEY `fk_exercicio_serie_id` (`exercicio_serie_id`),
  ADD KEY `fk_usuario_id` (`usuario_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `exe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de tabela `exercicio_serieordem`
--
ALTER TABLE `exercicio_serieordem`
  MODIFY `exe_ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `treinos`
--
ALTER TABLE `treinos`
  MODIFY `tre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `treino_exercicios`
--
ALTER TABLE `treino_exercicios`
  MODIFY `tre_exe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `exercicio_serieordem`
--
ALTER TABLE `exercicio_serieordem`
  ADD CONSTRAINT `fk_exercicio_id` FOREIGN KEY (`exercicio_id`) REFERENCES `exercicio` (`exe_id`),
  ADD CONSTRAINT `fk_serie_id` FOREIGN KEY (`serie_id`) REFERENCES `serie_ordem` (`ser_id`);

--
-- Limitadores para a tabela `treinos`
--
ALTER TABLE `treinos`
  ADD CONSTRAINT `fk_dia_nome` FOREIGN KEY (`dia_nome`) REFERENCES `dias` (`dia_nome`),
  ADD CONSTRAINT `fk_membro_nome` FOREIGN KEY (`membro_nome`) REFERENCES `membros` (`mem_nome`);

--
-- Limitadores para a tabela `treino_exercicios`
--
ALTER TABLE `treino_exercicios`
  ADD CONSTRAINT `fk_exercicio_serie_id` FOREIGN KEY (`exercicio_serie_id`) REFERENCES `exercicio_serieordem` (`exe_ser_id`),
  ADD CONSTRAINT `fk_treino_id` FOREIGN KEY (`treino_id`) REFERENCES `treinos` (`tre_id`),
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
