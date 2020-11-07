-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Nov-2018 às 01:27
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
  `com_texto` text NOT NULL,
  `com_data` date NOT NULL,
  `com_hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`com_cod`, `com_not_cod`, `com_us_cod`, `com_texto`, `com_data`, `com_hora`) VALUES
(4, 47, 1, 'idk why', '2018-11-06', '21:25:35'),
(5, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:23'),
(6, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:25'),
(7, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:26'),
(8, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:28'),
(9, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:30'),
(10, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:30'),
(11, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:30'),
(12, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:30'),
(13, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:30'),
(14, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:31'),
(15, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:31'),
(16, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:31'),
(17, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:32'),
(18, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:32'),
(19, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:32'),
(20, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:32'),
(21, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:32'),
(22, 47, 1, 'BUT I GUESS', '2018-11-06', '21:26:33');

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
(1, 'NULL', 'Cheirando suvacovisqui', 'fedo'),
(2, 'NULL', 'Cheirando suvacovisqui', ''),
(3, 'NULL', 'Cheirando suvacovisqui', ''),
(4, 'NULL', 'sa', ''),
(5, 'gal_20181105180232.jpg', 'Couldn\'t lie', ''),
(6, 'gal_20181105180411.jpg', 'ata', '');

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
(4, 'Eloísa Carvalho', 'HALO', 'Beyoncé arrasa', '2018-10-26', '14:49:56', NULL, 'not', 1),
(5, 'Eloísa Carvalho', 'Halo: Combat Evolved', '', '2018-10-26', '14:50:16', NULL, 'not', 1),
(6, 'Eloísa Carvalho', 'I kissed a Girl', 'Katy Perry Ornitorrinco', '2018-10-26', '15:16:20', 'NULL', 'not', 1),
(7, 'Eloísa Carvalho', 'I kissed a Girl', 'Katy Perry Ornitorrinco', '2018-10-26', '15:17:37', '', 'not', 1),
(8, 'Eloísa Carvalho', 'sem foto', 'what', '2018-10-26', '15:22:13', '20181026152213_', 'not', 1),
(9, 'Eloísa Carvalho', 'california', 'com foto', '2018-10-26', '15:23:59', 'NULL', 'not', 1),
(10, 'Eloísa Carvalho', 'sem foto 2', '', '2018-10-26', '15:24:23', 'NULL', 'not', 1),
(11, 'Eloísa Carvalho', 'fo to', '', '2018-10-26', '15:25:23', 'NULL', 'not', 1),
(12, 'Eloísa Carvalho', 'WISH RIGHT NOW', '', '2018-10-26', '15:28:23', 'NULL', 'not', 1),
(13, 'Eloísa Carvalho', 'Give Me Everything', '', '2018-10-26', '15:44:43', NULL, 'not', 1),
(14, 'Eloísa Carvalho', 'aaaa', '', '2018-10-26', '15:46:01', NULL, 'not', 1),
(15, 'Eloísa Carvalho', 'Halo: Combat Evolved', '', '2018-10-26', '15:46:17', NULL, 'not', 0),
(16, 'Eloísa Carvalho', 'somembody', '', '2018-10-26', '15:48:09', NULL, 'not', 0),
(17, 'Eloísa Carvalho', 'HALO', '', '2018-10-26', '15:49:00', NULL, 'not', 0),
(18, 'Eloísa Carvalho', 'HALO', '', '2018-10-26', '15:49:31', NULL, 'not', 0),
(19, 'Eloísa Carvalho', 'HALO', '', '2018-10-26', '15:52:03', NULL, 'not', 0),
(20, 'Eloísa Carvalho', 'HALO', '', '2018-10-26', '15:52:33', NULL, 'not', 0),
(21, 'Eloísa Carvalho', 'HALO', '', '2018-10-26', '15:53:13', NULL, 'not', 0),
(22, 'Eloísa Carvalho', 'I kissed a Girl', '', '2018-10-26', '15:54:07', NULL, 'not', 0),
(23, 'Eloísa Carvalho', 'HALO', '', '2018-10-26', '15:54:39', NULL, 'not', 0),
(24, 'Eloísa Carvalho', 'HALO', '', '2018-10-26', '15:57:14', NULL, 'not', 0),
(25, 'Eloísa Carvalho', 'HALO', '', '2018-10-26', '15:57:57', NULL, 'not', 0),
(26, 'Eloísa Carvalho', 'sdfdfxdxfsdf', '', '2018-10-26', '15:58:13', NULL, 'not', 0),
(27, '', 'Umbrella', 'Beyoncé arrasa', '2018-10-26', '15:59:24', NULL, 'not', 0),
(29, 'Eloísa Carvalho', 'Pensando Bem', '5 a seco', '2018-10-31', '22:57:47', NULL, 'not', 0),
(30, 'Eloísa Carvalho', 'puta que pariu', 'tomar no cu', '2018-10-31', '22:58:51', NULL, 'not', 0),
(31, 'Eloísa Carvalho', 'Suvaco da katy', 'viciada em cheirar suvaco', '2018-10-31', '23:01:07', NULL, 'not', 0),
(32, 'Eloísa Carvalho', 'Suvaco da katy', 'viciada em cheirar suvaco', '2018-10-31', '23:02:07', NULL, 'not', 0),
(33, 'Eloísa Carvalho', 'cheirando', '', '2018-10-31', '23:03:33', NULL, 'not', 0),
(34, 'Eloísa Carvalho', 'vem k', '', '2018-10-31', '23:04:06', NULL, 'not', 0),
(35, 'Eloísa Carvalho', 'meue stomago do', 'doi', '2018-10-31', '23:06:19', NULL, 'not', 0),
(36, 'Eloísa Carvalho', 'Umbrella', 'Rihanna', '2018-10-31', '23:06:59', NULL, 'not', 0),
(37, 'Eloísa Carvalho', 'skfjdhsfgb', '\'ljdhaj,dhsja', '2018-10-31', '23:10:19', NULL, 'not', 0),
(38, 'Eloísa Carvalho', 'skfjdhsfgb', '\'ljdhaj,dhsja', '2018-10-31', '23:10:35', NULL, 'not', 0),
(39, 'Eloísa Carvalho', 'skfjdhsfgb', '\'ljdhaj,dhsja', '2018-10-31', '23:11:19', NULL, 'not', 0),
(40, 'Eloísa Carvalho', 'skfjdhsfgb', '\'ljdhaj,dhsja', '2018-10-31', '23:11:28', NULL, 'not', 0),
(41, 'Eloísa Carvalho', 'skfjdhsfgb', '\'ljdhaj,dhsja', '2018-10-31', '23:11:39', NULL, 'not', 0),
(42, 'Eloísa Carvalho', 'a', '\'ljdhaj,dhsja', '2018-10-31', '23:11:57', 'NULL', 'not', 1),
(43, 'Eloísa Carvalho', 'skfjdhsfgb', '\'ljdhaj,dhsja', '2018-10-31', '23:14:37', '43_20181031231437.png', 'not', 1),
(44, 'Eloísa Carvalho', 'tem que ser vc', '', '2018-10-31', '23:47:26', 'not_201810312347261.png', 'not', 1),
(45, 'Eloísa Carvalho', 'Dor', '', '2018-11-01', '21:08:15', 'NULL', 'not', 0),
(46, 'Eloísa Carvalho', 'dsadsada', '', '2018-11-01', '21:25:27', 'eve_20181106183748.png', 'eve', 1),
(47, 'Eloísa Carvalho', 'aff', 'oi', '2018-11-01', '21:29:13', 'eve_20181106183738.jpg', 'eve', 1),
(48, 'Eloísa Carvalho', 'teste da imagem com extensão', 'uhuh vai', '2018-11-01', '21:48:41', 'not_20181105171851.png', 'not', 1),
(49, 'Eloísa Carvalho', 'crawling back tu iu', 'live', '2018-11-03', '14:06:06', 'not_20181105165641.png', 'not', 0),
(50, 'Eloísa Carvalho', 'Feel so alone', 'honey', '2018-11-05', '17:21:11', NULL, 'eve', 0),
(51, 'Eloísa Carvalho', 'chose your last word', '', '2018-11-05', '17:22:14', 'not_20181105172214.png', 'not', 0),
(52, 'Eloísa Carvalho', 'TAKE A WALK', '', '2018-11-05', '17:23:21', 'not_20181105172321.png', 'not', 0),
(53, 'Eloísa Carvalho', 'sem prob', '', '2018-11-05', '17:30:23', NULL, 'not', 0),
(54, 'Eloísa Carvalho', 'fdsfsd', '', '2018-11-05', '17:33:45', 'eve_20181106182132.jpg', 'eve', 1),
(55, 'Eloísa Carvalho', 'fome', '', '2018-11-05', '17:34:40', NULL, 'not', 0),
(56, 'Eloísa Carvalho', 'your eyes', '', '2018-11-05', '17:35:34', NULL, 'not', 0),
(57, 'Eloísa Carvalho', 'sad', '', '2018-11-05', '17:38:55', NULL, 'not', 0),
(58, 'Eloísa Carvalho', 'batata', '', '2018-11-05', '17:39:22', 'not_20181105173922.png', 'not', 0),
(59, 'Eloísa Carvalho', 'atabom', '', '2018-11-05', '17:40:03', 'eve_20181105174003.jpg', 'eve', 0),
(60, 'Eloísa Carvalho', 'burn in my mind', '', '2018-11-05', '17:43:06', NULL, 'not', 0),
(61, 'Eloísa Carvalho', 'de mi', '', '2018-11-05', '17:53:51', NULL, 'not', 0);

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

--
-- Extraindo dados da tabela `textonoticias`
--

INSERT INTO `textonoticias` (`noticias_not_cod`, `text_texto`) VALUES
(4, 'Remember those walls I built\r\nWell, baby, they\'re tumbling down\r\nAnd they didn\'t even put up a fight\r\nThey didn\'t even make a sound\r\nI found a way to let you win\r\nBut I never really had a doubt\r\nStanding in the light of your halo\r\nI got my angel now\r\nIt\'s like I\'ve been awakened\r\nEvery rule I had you break it\r\nIt\'s the risk that I\'m taking\r\nI ain\'t never gonna shut you out\r\nEverywhere I\'m looking now\r\nI\'m surrounded by your embrace\r\nBaby, I can see your halo\r\nYou know you\'re my saving grace\r\nYou\'re everything I need and more\r\nIt\'s written all over your face\r\nBaby, I can feel your halo\r\nPray it won\'t fade away\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nHit me like a ray of sun\r\nBurning through my darkest night\r\nYou\'re the only one that I want\r\nThink I\'m addicted to your light\r\nI swore I\'d never fall again\r\nBut this don\'t even feel like falling\r\nGravity can\'t forget\r\nTo pull me back to the ground again\r\nFeels like I\'ve been awakened\r\nEvery rule I had you break it\r\nThe risk that I\'m taking\r\nI\'m never gonna shut you out\r\nEverywhere I\'m looking now\r\nI\'m surrounded by your embrace\r\nBaby, I can see your halo\r\nYou know you\'re my saving grace\r\nYou\'re everything I need and more\r\nIt\'s written all over your face\r\nBaby, I can feel your halo\r\nPray it won\'t fade away\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nHalo, halo\r\nEverywhere I\'m looking now\r\nI\'m surrounded by your embrace\r\nBaby, I can see your halo\r\nYou know you\'re my saving grace\r\nYou\'re everything I need and more\r\nIt\'s written all over your face\r\nBaby, I can feel your halo\r\nPray it won\'t fade away\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo\r\nI can feel your halo (halo) halo\r\nI can see your halo (halo) halo'),
(5, '<p>Halo: Combat Evolved &eacute; um jogo eletr&ocirc;nico de 2001 de fic&ccedil;&atilde;o cient&iacute;fica militar de tiro em primeira pessoa desenvolvido pela Bungie e publicado pela Microsoft Game Studios.</p>\r\n<p>O <strong>fato</strong> &eacute; que de <em>fato</em> isso &eacute; um <span style=\"text-decoration: underline;\">fato</span>.</p>\r\n<p>Miss. B.</p>'),
(6, '<p>This was never the way I planned Not my intention I got so brave, drink in hand Lost my discretion It\'s not what, I\'m used to Just wanna try you on I\'m curious for you Caught my attention I kissed a girl and I liked it The taste of her cherry chap stick I kissed a girl just to try it I hope my boyfriend don\'t mind it It felt so wrong It felt so right Don\'t mean I\'m in love tonight I kissed a girl and I liked it I liked it No, I don\'t even know your name It doesn\'t matter You\'re my experimental game Just human nature It\'s not what, good girls do Not how they should behave My head gets so confused Hard to obey I kissed a girl and I liked it The taste of her cherry chap stick I kissed a girl just to try it I hope my boyfriend don\'t mind it It felt so wrong It felt so right Don\'t mean I\'m in love tonight I kissed a girl and I liked it I liked it Us girls we are so magical Soft skin, red lips, so kissable Hard to resist so touchable Too good to deny it Ain\'t no big deal, it\'s innocent I kissed a girl and I liked it The taste of her cherry chap stick I kissed a girl just to try it I hope my boyfriend don\'t mind it It felt so wrong It felt so right Don\'t mean I\'m in love tonight I kissed a girl and I liked it I liked it</p>'),
(7, '<div style=\"color: #222222; font-family: arial, sans-serif; font-size: small;\">This was never the way I planned<br />Not my intention<br />I got so brave, drink in hand<br />Lost my discretion<br />It\'s not what, I\'m used to<br />Just wanna try you on<br />I\'m curious for you<br />Caught my attention</div>\r\n<div class=\"UH8R2\" style=\"margin-top: 13px; color: #222222; font-family: arial, sans-serif; font-size: small;\">I kissed a girl and I liked it<br />The taste of her cherry chap stick<br />I kissed a girl just to try it<br />I hope my boyfriend don\'t mind it<br />It felt so wrong<br />It felt so right<br />Don\'t mean I\'m in love tonight<br />I kissed a girl and I liked it<br />I liked it</div>\r\n<div class=\"UH8R2\" style=\"margin-top: 13px; color: #222222; font-family: arial, sans-serif; font-size: small;\">No, I don\'t even know your name<br />It doesn\'t matter<br />You\'re my experimental game<br />Just human nature<br />It\'s not what, good girls do<br />Not how they should behave<br />My head gets so confused<br />Hard to obey</div>\r\n<div class=\"UH8R2\" style=\"margin-top: 13px; color: #222222; font-family: arial, sans-serif; font-size: small;\"><strong>I kissed a girl and I liked it</strong><br />The taste of her cherry chap stick<br />I kissed a girl just to try it<br />I hope my boyfriend don\'t mind it<br />It felt so wrong<br />It felt so right<br />Don\'t mean I\'m in love tonight<br />I kissed a girl and I liked it<br />I liked it</div>\r\n<div class=\"UH8R2\" style=\"margin-top: 13px; color: #222222; font-family: arial, sans-serif; font-size: small;\">Us girls we are so magical<br />Soft skin, red lips, so kissable<br />Hard to resist so touchable<br />Too good to deny it<br />Ain\'t no big deal, it\'s innocent</div>\r\n<div class=\"UH8R2\" style=\"margin-top: 13px; color: #222222; font-family: arial, sans-serif; font-size: small;\">I kissed a girl and I liked it<br />The taste of her cherry chap stick<br />I kissed a girl just to try it<br />I hope my boyfriend don\'t mind it<br />It felt so wrong<br />It felt so right<br />Don\'t mean I\'m in love tonight<br />I kissed a girl and I liked it<br />I liked it</div>'),
(8, 'top'),
(9, 'obg'),
(10, 'aaaaaaaaaaaaaaaaaaaaaaaa'),
(11, 'aaaaaaaaaaaaa'),
(12, 'SHOOTING STARS'),
(13, '<b>Tonight I want all of you tonight</b>\r\n</br>Give me everything tonight\r\n</br>For all we know we might not get tomorrow\r\n</br>Let\'s do it tonight\r\n</br>\r\n</br>[Nayer]\r\n</br>Don\'t care what they say\r\n</br>Or what games they play\r\n</br>Nothing is enough\r\n</br>\'Til I have your love\r\n</br>\r\n</br>[Ne-Yo]\r\n</br>Let\'s do it tonight\r\n\r\n</br>[Nayer]\r\n</br>I want you tonight,\r\n</br>I want you to stay\r\n</br>I want you tonight\r\n\r\n</br>[Ne-Yo]\r\n</br>Grab somebody sexy, tell \'em hey\r\n</br>Give me everything tonight\r\n</br>Give me everything tonight\r\n</br>Give me everything tonight\r\n</br>Give me everything tonight\"'),
(14, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(15, 'asdsad'),
(16, 'qbode'),
(17, 'dddddddddddddddddddd'),
(18, 'dddddddddddddddddddd'),
(19, 'dddddddddddddddddddd'),
(20, 'dddddddddddddddddddd'),
(21, 'dddddddddddddddddddd'),
(22, 'z'),
(23, 'dddddddddddddddddddd'),
(24, 'dddddddddddddddddddd'),
(25, 'dddddddddddddddddddd'),
(26, 'sdfdsffsdfdsf'),
(27, 'sdfdvzdgsdfdsdfhdsdfj,hjhdddddddddddddddddddddddddddddddddd'),
(29, 'Pensando bem\r\nMelhor assim\r\nVocê e eu\r\nAté pensei\r\nQue não era pra acabar\r\nVocê faz muita falta\r\nDá saudade de lembrar\r\nDe onde a gente iria\r\nTanta coisa pra viver\r\nQue a gente nem dormia\r\nCanto pra me convencer\r\nA encarar os dias\r\n\r\nNem paro pra pensar\r\nTanto pra resolver\r\nCarreira pra traçar\r\nFesta e chá de bebê\r\nNem mais me sinto só\r\nQuando a saudade vem\r\nNem lembro mais de nós\r\nMelhor assim, meu bem\r\n\r\nPensando bem (nem paro pra pensar)\r\nMelhor assim (tanto pra resolver)\r\nVocê e eu (carreira pra traçar)\r\nAté pensei (festa e chá de bebê)\r\nQue não era pra acabar (não mais me sinto só)\r\nVocê faz muita falta\r\nDá saudade de lembrar (quando a saudade vem)\r\nDe onde a gente iria\r\nTanta coisa pra viver (nem lembro mais de nós)\r\nQue a gente nem dormia\r\nCanto pra me convencer (melhor assim, meu bem)\r\nA encarar os dias'),
(30, 'va se foder'),
(31, 'só no vacuo, se liga na ft'),
(32, 'só no vacuo, se liga na ft'),
(33, 'crackolandia'),
(34, 'fedo'),
(35, 'daksjdklasdjk.askd'),
(36, 'asdasdas'),
(37, 'kjsdhj,jsdhbfj,sdhfj,sdnf,jsdhnj,fsd,'),
(38, 'kjsdhj,jsdhbfj,sdhfj,sdnf,jsdhnj,fsd,'),
(39, 'kjsdhj,jsdhbfj,sdhfj,sdnf,jsdhnj,fsd,'),
(40, 'kjsdhj,jsdhbfj,sdhfj,sdnf,jsdhnj,fsd,'),
(41, 'kjsdhj,jsdhbfj,sdhfj,sdnf,jsdhnj,fsd,'),
(42, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(43, 'kjsdhj,jsdhbfj,sdhfj,sdnf,jsdhnj,fsd,'),
(44, 'deo'),
(45, 'costas'),
(46, 'dsadsadssad'),
(47, 'ridiculo s2'),
(48, '.png'),
(49, 'do i wanna knowwwwwwwwwwww'),
(50, 'don\'t make me sad\r\ndon\'t make me cry'),
(51, 'BORN TO DIE'),
(52, 'IN THE WILD SIDE'),
(53, 're rslijkdsjaklsjldfkhsfkdjkasd'),
(54, 'fsdsdf'),
(55, 'abaacaxi qro'),
(56, 'aaaaaaaa'),
(57, 'asd'),
(58, 'dsa'),
(59, 'atabom'),
(60, 'dfzzdfsfsd'),
(61, 'NO TE VOY A NEGAR');

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
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`com_cod`),
  ADD KEY `com_not_cod` (`com_not_cod`) USING BTREE,
  ADD KEY `com_us_cod` (`com_us_cod`) USING BTREE;

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
  MODIFY `com_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `gal_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `not_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `com_not_cod` FOREIGN KEY (`com_not_cod`) REFERENCES `noticias` (`not_cod`) ON DELETE CASCADE,
  ADD CONSTRAINT `com_us_cod` FOREIGN KEY (`com_us_cod`) REFERENCES `usuario` (`us_cod`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
