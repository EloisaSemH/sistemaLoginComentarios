-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Nov-2018 às 01:09
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
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `com_cod` int(11) NOT NULL,
  `com_not_cod` int(11) NOT NULL,
  `com_us_cod` int(11) NOT NULL,
  `com_autor` varchar(100) NOT NULL,
  `com_texto` text NOT NULL,
  `com_data` date NOT NULL,
  `com_hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`com_cod`, `com_not_cod`, `com_us_cod`, `com_autor`, `com_texto`, `com_data`, `com_hora`) VALUES
(1, 1, 1, 'Eloísa Carvalho', 'Muito bom!', '2018-11-18', '19:51:56'),
(2, 1, 2, 'Teste Postador', 'Amei!', '2018-11-18', '19:52:23'),
(3, 1, 6, 'Usuário tipo comum', 'Ansiosa pela 2ª edição!', '2018-11-18', '19:53:07');

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

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`gal_cod`, `gal_img`, `gal_titulo`, `gal_desc`) VALUES
(1, 'gal_20181118200828.jpg', 'Autores e organizadores na escadaria de entrada do Círculo Ítalo-brasileiro Dante Alighieri', 'Autores e organizadores na escadaria de entrada do Círculo Ítalo-brasileiro Dante Alighieri, por ocasião do lançamento do livro Italianos em Itu: da imigração à atualidade, volume I'),
(2, 'gal_20181118200945.jpg', 'Decoração do local do evento', ''),
(3, 'gal_20181118201035.jpg', 'Grupo Folclórico Stella Bianca', 'Grupo Folclórico Stella Bianca que abrilhantou e alegrou a cerimônia de lançamento da primeira edição do livro.'),
(4, 'gal_20181118201244.jpg', 'A artista plástica Edna Menighini entrega da arte da capa', 'A artista plástica Edna Menighini entrega da arte da capa para a idealizadora do projeto Maria de Fatima Boni de Oliveira.'),
(5, 'gal_20181118201448.jpg', 'Entrega simbólica dos organizadores ao tesoureiro do Lar Nossa Sra. Candelária', 'Entrega simbólica dos organizadores pela doação do arrecadado pelas vendas do livro ao tesoureiro do Lar Nossa Sra. Candelária.'),
(6, 'gal_20181118201546.jpeg', 'Organizadora homenageada', ''),
(7, 'gal_20181118201739.jpeg', ' Mestre de cerimônia do lançamento do livro', ''),
(8, 'gal_20181118201924.jpeg', 'Organizadora homenageada', ''),
(9, 'gal_20181118202049.jpg', 'Organizadores Edson Carlos de Oliveira e Maria de Fatima Boni Oliveira', 'Agradecimentos e apresentação dos objetivos do livro pelos organizadores Edson Carlos de Oliveira e Maria de Fatima Boni Oliveira.'),
(10, 'gal_20181118202153.jpeg', 'Vima Pavão Folino', 'A organizadora Vima Pavão Folino ressaltando a questão da italianidade no livro.'),
(11, 'gal_20181118202502.jpeg', 'Aspecto geral do Salão de Festas do Círculo Ítalo-brasileiro \"Dante Alighieri\"', 'Aspecto geral do Salão de Festas do Círculo Ítalo-brasileiro \"Dante Alighieri\", local onde foi realizado o lançamento do volume I da Antologia.'),
(12, 'gal_20181118202726.jpg', 'Leitura de em dos contos ', ''),
(13, 'gal_20181118202844.jpg', 'Professora Maria de Lourdes e alunas do curso de Secretariado', 'Professora Maria de Lourdes e alunas do curso de Secretariado da ETEC Martinho Di Ciero, responsáveis pela recepção, entrega dos livros da pré venda e pelo acolhedor atendimento durante o coquetel.'),
(14, 'gal_20181118203013.jpg', 'Autores e organizadora M. Fátima exibindo a camiseta com estampa do livro', 'Aspecto do salão, antes da cerimônia, com alguns autores e organizadora M. Fátima exibindo a camiseta com estampa do livro.'),
(15, 'gal_20181118203234.jpeg', 'Exemplares do livro na vitrine da Livraria', 'Exemplares do livro na vitrine da Livraria no Shopping Plaza Itu, um dos lugares onde foram vendidos os livros pós lançamento.'),
(16, 'gal_20181118205248.jpg', 'Alunas do curso de Secretariado ', 'Alunas do curso de Secretariado da ETEC Martinho Di Ciero, responsáveis pela recepção, entrega dos livros da pré venda e pelo acolhedor atendimento durante o coquetel.');

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

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`not_cod`, `not_autor`, `not_titulo`, `not_subtitulo`, `not_data`, `not_hora`, `not_img`, `not_cat`, `not_ativo`) VALUES
(1, 'Eloísa Carvalho', 'Lançamento da 1ª edição do livro Italianos em Itu: da imigração à atualidade', 'O evento aconteceu em 2 de dezembro de 2017.', '2018-11-18', '19:47:21', 'eve_20181118194721.jpeg', 'eve', 1),
(2, 'Eloísa Carvalho', 'I Seminário sobre a Imigração Italiana em Itu', 'O evento aconteceu no Sincomercio de Itu, dia 1º de setembro de 2018.', '2018-11-18', '20:45:44', 'eve_20181118204544.jpg', 'eve', 1),
(3, 'Eloísa Carvalho', 'Convite para o lançamento do segundo volume do livro Italianos em Itu: da Imigração à Atualidade', '', '2018-11-18', '20:57:59', 'eve_20181118213109.png', 'eve', 1);

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
(1, '38f41bb7c2e458bd8b9b3f5cf3f0b84f'),
(2, '25d55ad283aa400af464c76d713c07ad'),
(3, '35f70bfe828718cb4c115d647b574d46'),
(4, '3f54f85beab5ce9363cb7a0ae8598bbe'),
(5, '645942f5d83ac9b260f5ef6e99cd23c9'),
(6, '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `textonoticias`
--

CREATE TABLE `textonoticias` (
  `noticias_not_cod` int(11) NOT NULL,
  `text_texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `textonoticias`
--

INSERT INTO `textonoticias` (`noticias_not_cod`, `text_texto`) VALUES
(1, '<p style=\"text-align: justify;\">Em comemora&ccedil;&atilde;o ao lan&ccedil;amento da 1&ordf; edi&ccedil;&atilde;o do livro Italianos em Itu: da imigra&ccedil;&atilde;o &agrave; atualidade, foi realizado um evento dia&nbsp;2 de dezembro de 2017, no espa&ccedil;o Circolo Italiano Dante Alighieri, em Itu.</p>\r\n<p style=\"text-align: justify;\">O evento contou com a presen&ccedil;a dos tr&ecirc;s principais autores do livro,&nbsp;Edson Carlos, Maria de F&aacute;tima e Vilma Pav&atilde;o, al&eacute;m de ter sido utilizado como est&aacute;gio para o curso de Secretariado, da Etec Martinho di Ciero, tamb&eacute;m de Itu, gra&ccedil;as a coordenadora Maria de Lourdes.&nbsp;</p>\r\n<p style=\"text-align: justify;\">As fotos podem ser encontradas detalhadamente na se&ccedil;&atilde;o de galeria do site.</p>'),
(2, '<p>Em 1&ordm; de setembro de 2018 aconteceu, no Sincom&eacute;rcio, o I Semin&aacute;rio sobre a Imigra&ccedil;&atilde;o Italiana em Itu. Organizado em parceria dos organizadores do livro italianos em Itu coma FACULDADE DE FILOSOFIA, LETRAS E CI&Ecirc;NCIAS HUMANAS - FFLCH USP, o LEER (Laborat&oacute;rio de Estudos da Etnicidade, Racismo e Discrimina&ccedil;&atilde;o Hist&oacute;rias Migrantes) e o N&Uacute;CLEO DE ESTUDOS POPULACIONAIS (Projeto - Deslocamentos Humanos narrativas e representa&ccedil;&otilde;es. Brasil, s&eacute;culos XIX a XXI).</p>\r\n<p>Ao longo do dia foram promovidas diversas mesas redondas, tratando dos temas de &ldquo;Hist&oacute;rias dos descendentes italianos de Itu&rdquo;, &ldquo;Italianidade no interior paulista&rdquo;, &ldquo;Tecendo hist&oacute;rias com o Ensino do Italiano como Heran&ccedil;a&rdquo; e &ldquo;Culin&aacute;ria de Heran&ccedil;a: reconstruindo receitas&rdquo; .</p>\r\n<p>As fotos podem ser encontradas com maior detalhe na galeria do site.</p>'),
(3, '<p style=\"text-align: justify;\">O esperado lan&ccedil;amento do Volume II est&aacute; chegando!</p>\r\n<p style=\"text-align: justify;\">Prestigie o lan&ccedil;amento e a noite de aut&oacute;grafos dos escritores!</p>\r\n<p><strong>Data</strong>: 30 de novembro de 2018.</p>\r\n<p><strong>Hor&aacute;rio</strong>: 19h30min.</p>\r\n<p><strong>Local</strong>: Audit&oacute;rio do 2&ordm; CALC (Quatel de Itu), Centro, Itu/SP.</p>');

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
(1, 'Eloísa Carvalho', 'eloisactrindade21@gmail.com', 'm', '2018-10-26', '14:48:27', '::1', 3),
(2, 'Teste Postador', 'postador@gmail.com', 'f', '2018-11-15', '16:33:23', '::1', 2),
(3, 'Érica Vitória', 'ericavsousa89@gmail.com', 'f', '2018-11-18', '18:23:30', '::1', 2),
(4, 'Enrique Gomes', 'flyt110@gmail.com', 'm', '2018-11-18', '18:24:42', '::1', 1),
(5, 'Caio Andrade', 'caio.andrad160@gmail.com', 'm', '2018-11-18', '18:26:45', '::1', 3),
(6, 'Usuário tipo comum', 'teste@teste.com', 'm', '2018-11-18', '18:27:32', '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`com_cod`),
  ADD KEY `fk_com_us_cod` (`com_us_cod`) USING BTREE,
  ADD KEY `fk_com_not_cod` (`com_not_cod`) USING BTREE;

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
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `com_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `gal_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `not_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_com_not_cod` FOREIGN KEY (`com_not_cod`) REFERENCES `noticias` (`not_cod`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_com_us_cod` FOREIGN KEY (`com_us_cod`) REFERENCES `usuario` (`us_cod`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
