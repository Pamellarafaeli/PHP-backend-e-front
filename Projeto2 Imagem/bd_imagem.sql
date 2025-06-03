-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29/10/2024 às 17:02
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_imagem`
--
CREATE DATABASE IF NOT EXISTS `bd_imagem`;
USE `bd_imagem`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `nome_foto` varchar(255) DEFAULT NULL,
  `tipo_foto` varchar(255) DEFAULT NULL,
  `foto` longblob,
  PRIMARY KEY (`id`)
);

select * from funcionarios;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

DROP TABLE IF EXISTS `imagens`;
CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_imagem` varchar(255) NOT NULL,
  `tipo_imagem` varchar(50) DEFAULT NULL,
  `imagem` longblob,
  PRIMARY KEY (`id`)
);

-- Tabela de administradores
-- Adicione isso ao seu arquivo bd_imagem.sql (substitua a parte da tabela adm se existir)
DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_adm` varchar(40) NOT NULL,
  `email_adm` varchar(40) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_adm` (`email_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insira um administrador com senha hasheada (senha: admin123)
INSERT INTO `adm` (`nome_adm`, `email_adm`, `senha`) VALUES
('Administrador', 'admin@admin.com', '123');
UPDATE adm SET senha = '123' WHERE email_adm = 'admin@admin.com';

select * from adm;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



