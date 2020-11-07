-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Nov-2018 às 20:27
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `italianosdb`
--
CREATE DATABASE IF NOT EXISTS `italianosdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `italianosdb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `gal_cod` int(11) NOT NULL,
  `gal_img` varchar(64) NOT NULL,
  `gal_titulo` varchar(128) NOT NULL,
  `gal_desc` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `not_cod` int(11) NOT NULL,
  `not_autor` varchar(100) NOT NULL,
  `not_titulo` varchar(128) NOT NULL,
  `not_subtitulo` varchar(256) DEFAULT NULL,
  `not_data` date NOT NULL,
  `not_hora` time NOT NULL,
  `not_img` varchar(256) DEFAULT NULL,
  `not_cat` varchar(3) NOT NULL DEFAULT 'not',
  `not_ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `senha`
--

CREATE TABLE `senha` (
  `usuario_us_cod` int(11) NOT NULL,
  `se_senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `senha`
--

INSERT INTO `senha` (`usuario_us_cod`, `se_senha`) VALUES
(1, '38f41bb7c2e458bd8b9b3f5cf3f0b84f');

-- --------------------------------------------------------

--
-- Estrutura da tabela `textonoticias`
--

CREATE TABLE `textonoticias` (
  `noticias_not_cod` int(11) NOT NULL,
  `text_texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `us_cod` int(11) NOT NULL,
  `us_nome` varchar(100) NOT NULL,
  `us_email` varchar(100) NOT NULL,
  `us_sexo` varchar(1) NOT NULL,
  `us_data` date NOT NULL,
  `us_hora` time NOT NULL,
  `us_ip` varchar(50) NOT NULL,
  `us_tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`us_cod`, `us_nome`, `us_email`, `us_sexo`, `us_data`, `us_hora`, `us_ip`, `us_tipo`) VALUES
(1, 'Eloísa Carvalho', 'eloisactrindade21@gmail.com', 'f', '2018-10-26', '14:48:27', '::1', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`gal_cod`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`not_cod`),
  ADD KEY `usuario_not_autor` (`not_autor`);

--
-- Indexes for table `senha`
--
ALTER TABLE `senha`
  ADD PRIMARY KEY (`usuario_us_cod`),
  ADD KEY `fk_senha_usuario_idx` (`usuario_us_cod`);

--
-- Indexes for table `textonoticias`
--
ALTER TABLE `textonoticias`
  ADD PRIMARY KEY (`noticias_not_cod`),
  ADD KEY `fk_textonoticias_noticias_idx` (`noticias_not_cod`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`us_cod`),
  ADD KEY `fk_us_nome` (`us_nome`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `gal_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `not_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `senha`
--
ALTER TABLE `senha`
  ADD CONSTRAINT `fk_senha_usuario` FOREIGN KEY (`usuario_us_cod`) REFERENCES `usuario` (`us_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `textonoticias`
--
ALTER TABLE `textonoticias`
  ADD CONSTRAINT `fk_textonoticias_noticias` FOREIGN KEY (`noticias_not_cod`) REFERENCES `noticias` (`not_cod`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
