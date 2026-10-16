-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.byethost7.com
-- Generation Time: Oct 16, 2026 at 03:50 PM
-- Server version: 11.4.13-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b7_39129641_discurso_oradores`
--

-- --------------------------------------------------------

--
-- Table structure for table `oradores_enviaremos`
--

CREATE TABLE `oradores_enviaremos` (
  `id` int(11) NOT NULL,
  `congregacao` varchar(100) DEFAULT NULL,
  `orador` varchar(100) DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oradores_enviaremos`
--

INSERT INTO `oradores_enviaremos` (`id`, `congregacao`, `orador`, `tema`, `data`) VALUES
(28, 'Cong Agrovilla', 'Robson Tavares', 'Ocorreram realmente os milagres da Bíblia?', '2026-09-13'),
(30, 'Congr AgroVilla', 'Aluisio Santos', 'Sempre mostrem a hospitalidade', '2026-09-06'),
(35, 'Nova Porto', 'Aluisio Santos', 'Sempre mostrem a hospitalidade', '2026-10-11'),
(36, 'Nova Porto', 'Robson Tavares', 'Ocorreram realmente os milagres da Bíblia?', '2026-10-25'),
(37, 'Nova Porto', 'Jefferson Santos', 'Dê valor ao seu lugar no Reino de Deus', '2026-10-18'),
(38, 'Pindorama', 'Aluisio Santos', 'Fiquem parados e vejam como Jeová os salvará', '2027-01-09'),
(39, 'Pindorama', 'Jefferson Santos', 'Dê valor ao seu lugar no Reino de Deus', '2027-01-16'),
(40, 'Pindorama', 'Robson Tavares', 'Ocorreram realmente os milagres da Bíblia?', '2027-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `oradores_receberemos`
--

CREATE TABLE `oradores_receberemos` (
  `id` int(11) NOT NULL,
  `congregacao` varchar(100) DEFAULT NULL,
  `orador` varchar(100) DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oradores_receberemos`
--

INSERT INTO `oradores_receberemos` (`id`, `congregacao`, `orador`, `tema`, `data`) VALUES
(60, 'Congregação Central', 'Júnior Reis', 'Nº 187 - Sirva em união com o povo feliz de Deus', '2026-11-08'),
(63, 'Villas do Arraial', 'Jhonathan dos Santos', 'É possível viver para sempre? O que você precisa fazer?', '2026-11-01'),
(65, 'Congr AgroVilla', 'Eduardo Viana', 'Como podemos ser pacíficos num mundo cheio de ódio', '2026-09-06'),
(66, 'Cong Agrovilla', 'Eraldo Miranda', 'Faça o bem a todos’', '2026-09-13'),
(67, 'Cong Agrovilla', 'Lourival Sincorá', 'Discurso Especial  :  Como a Bíblia pode ajudar você?', '2026-09-27'),
(68, 'Arraial d Ajuda ', 'Robson Silva', 'Tudo o que Deus nos pede é para o nosso bem', '2026-09-20'),
(69, 'Cong Nova Porto', 'Jean Farley', 'Quem são os verdadeiros seguidores de Cristo?', '2026-10-18'),
(70, 'Cong Nova Porto', 'Gutemberg Guimarães', 'Deus quer que você respeite quem tem autoridade', '2026-10-04'),
(71, 'Cong Nova Porto', 'Jackson ', 'Você pensa como Deus?', '2026-10-11'),
(72, 'Cong Nova Porto', 'Nelson José', 'O dilúvio dos dias de Noé e você.', '2026-10-25'),
(73, 'Vale Verde ', 'Gilvan Trindade', 'Use a educação para louvar a Jeová', '2026-12-13'),
(74, 'Vale Verde', 'Marcelo Almeida', 'Como podemos ser pacíficos num mundo cheio de ódio', '2026-12-27'),
(75, 'Vale Verde', 'Evandro Fernandes', 'Escolha sabiamente com quem irá associar-se!', '2026-12-27'),
(77, 'Pq Ecologico', 'Marcos Leal', 'Ressurreição — Por que essa esperança deve ser real para você', '2026-11-15'),
(78, 'Mirante ', 'Eberjail Rey', 'A definir', '2026-12-06'),
(81, 'Itaporanga', 'Luciano Levita', 'Como mostrar amor num mundo egoísta.', '2027-04-25'),
(82, 'Cambolo', 'Flavio Mello', 'N.° 194 Como a sabedoria de Deus nos ajuda', '2026-12-20'),
(83, 'Pindorama', 'Eduardo Costa', 'Como a sabedoria de Deus nos Ajuda?', '2027-01-03'),
(84, 'Pindorama', 'Gideano Aquino', 'Não caia nas armadilhas de Satanás', '2027-01-10'),
(85, 'Pindorama', 'Valdir Barbosa ', 'Confie que Jeová tem o poder para nos salvar', '2027-01-17'),
(86, 'Pindorama', 'Pablo Picasso', 'Rejeite as fantasias do mundo , emprenhe-se pelas realidades do reino.', '2027-01-24'),
(87, 'Caraiva', 'Jose Carlos', 'Mantenha a identidade cristã!', '2027-04-04'),
(88, 'Cong Central', 'Oberdam', 'Escolha sabiamente com quem irá se associar ', '2027-01-31'),
(89, 'Sapirara ', 'Vinicius  Fernandes ', 'Como lidar com as ansiedades da vida .', '2027-02-07'),
(90, 'Sapirara ', 'Clesio', 'Glorifique a Deus com tudo o que você tem', '2027-02-14'),
(91, 'Pq Ecologico ', 'Jonadabe Fialho', 'A definir', '2027-03-14'),
(92, 'Sapirara ', 'GILVAN', 'A definir', '2027-02-21'),
(93, 'Sapirara ', 'Renan Uzeda', 'A definir', '2027-02-28'),
(94, 'Pq Ecologico ', 'David Rebouças', 'A definir', '2027-03-07'),
(95, 'Pq Ecologico ', 'Gustavo Oliveira', 'A definir', '2027-03-21'),
(96, 'Pq Ecologico ', 'Fábio Henrique', 'A definir', '2027-03-28'),
(97, 'Itaporanga ', 'Alaor Augusto Meirelles', 'N.º 73 Você tem “um coração sábio”?', '2027-04-11'),
(98, 'Planalto', 'Caik Matos', 'N.º 134 Será que os cristãos precisam guardar o sábado?', '2027-04-18'),
(99, 'Visita Sup.Circuito', 'Wesley Sodré', 'A definir', '2026-11-29'),
(100, 'Assembleia de Circuito', 'A definir', 'A definir', '2026-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `precisa_alterar` tinyint(1) DEFAULT 1,
  `tipo_usuario` varchar(20) NOT NULL COMMENT 'Tipo de usuário'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `precisa_alterar`, `tipo_usuario`) VALUES
(1, 'jefferson', '$2y$10$A/ZO0ggVe9.xm74kCxF/EOWGo8yXTI5aKjXu5NLRqC08hYLW/eyUi', 0, 'admin'),
(2, 'robson', '$2y$10$9VgPP5NalLCCY/Vve5PK/uRPRYfDHbBcsqT0fSzHox8ahDgOZs5cy', 0, 'visitante'),
(4, 'aluisio', '$2y$10$sWUdsMW2OA3pkThMbsdc9uJacaFoY51JS2cDs7jknNMyYjXkU2HbG', 0, 'visitante'),
(5, 'evandro', '$2y$10$Qli.FDiO3uDXqXX4ikAGWOXb9CpaStlt5EBmnhqh.ApO3ub3ab3K.', 0, 'editor'),
(6, 'marcelo', '$2y$10$e.0OIcZwEu/Q7vvnNkziaOiTmQfELuLDIxkyK0FFXsbXwEVHyrxKS', 0, 'visitante'),
(7, 'jean', '$2y$10$FEcso4IAljT7cS4KiUO61O9cSZhwPBCXf.EINMq8ycBe216Z4.f2y', 0, 'visitante');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oradores_enviaremos`
--
ALTER TABLE `oradores_enviaremos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oradores_receberemos`
--
ALTER TABLE `oradores_receberemos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oradores_enviaremos`
--
ALTER TABLE `oradores_enviaremos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `oradores_receberemos`
--
ALTER TABLE `oradores_receberemos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
