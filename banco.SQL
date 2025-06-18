--
-- Banco de dados: `bancoteste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `altura` decimal(3,2) DEFAULT NULL,
  `nacionalidade` varchar(30) DEFAULT 'Brasil',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `sexo`, `nascimento`, `peso`, `altura`, `nacionalidade`) VALUES
(1, 'Ederson', 'M', '2008-01-31', 60.00, 1.75, 'Brasil'),
(2, 'Pedro', 'M', '1990-12-12', 70.00, 2.00, 'Japão'),
(5, 'Roberto', 'M', '1995-12-31', 100.00, 1.90, 'Brasil'),
(6, 'Ana', 'F', '2000-05-14', 55.30, 1.62, 'Brasil'),
(7, 'Carlos', 'M', '1988-09-23', 82.10, 1.78, 'Brasil'),
(8, 'Beatriz', 'F', '1992-11-03', 60.00, 1.65, 'Brasil'),
(10, 'Fernanda', 'F', '1996-02-28', 68.20, 1.70, 'Brasil'),
(11, 'João', 'M', '2001-03-15', 90.00, 1.85, 'Brasil'),
(12, 'Patrícia', 'F', '1994-10-11', 72.40, 1.68, 'Brasil'),
(13, 'Marcelo', 'M', '1985-06-09', 95.00, 1.88, 'Brasil'),
(14, 'Juliana', 'F', '2002-01-30', 58.75, 1.63, 'Brasil'),
(15, 'Eduardo', 'M', '1990-08-21', 77.90, 1.75, 'Brasil'),
(16, 'Rob', 'M', '1999-12-25', 100.00, 2.99, 'Japão');
COMMIT;
