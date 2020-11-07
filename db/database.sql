-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2018 às 22:12
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
-- Database: `logincoment`
--
CREATE DATABASE IF NOT EXISTS `logincoment` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `logincoment`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `us_cod` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `us_nome` varchar(100) NOT NULL,
  `us_email` varchar(100) NOT NULL,
  `us_sexo` varchar(1) NOT NULL,
  `us_data` date NOT NULL,
  `us_hora` time NOT NULL,
  `us_ip` varchar(50) NOT NULL,
  `us_tipo` int(1) NOT NULL,
  KEY `fk_us_nome` (`us_nome`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `senha`
--

CREATE TABLE `senha` (
  `se_us_cod` int(11) NOT NULL PRIMARY KEY,
  `se_senha` varchar(50) NOT NULL,
  CONSTRAINT `fk_senha_usuario` FOREIGN KEY (`se_us_cod`) REFERENCES `usuario` (`us_cod`) ON DELETE CASCADE ON UPDATE NO ACTION,
  KEY `fk_senha_usuario_idx` (`se_us_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `foto_cod` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `foto_us_cod` int(11) NOT NULL,
  `foto_img` varchar(64) NOT NULL,
  `foto_titulo` varchar(128) NOT NULL,
  `foto_desc` varchar(256) DEFAULT NULL,
  CONSTRAINT `fk_foto_us_cod` FOREIGN KEY (`foto_us_cod`) REFERENCES `usuario` (`us_cod`) ON DELETE CASCADE ON UPDATE NO ACTION,
  KEY `fk_foto_us_cod` (`foto_us_cod`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `com_cod` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `com_us_cod` int(11) NOT NULL,
  `com_autor` varchar(100) NOT NULL,
  `com_texto` text NOT NULL,
  `com_data` date NOT NULL,
  `com_hora` time NOT NULL,
  CONSTRAINT `fk_com_us_cod` FOREIGN KEY (`com_us_cod`) REFERENCES `usuario` (`us_cod`) ON DELETE CASCADE ON UPDATE NO ACTION,
  KEY `fk_com_us_cod` (`com_us_cod`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
