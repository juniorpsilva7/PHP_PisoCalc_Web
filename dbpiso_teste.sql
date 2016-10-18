-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2016 às 03:12
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpiso_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `idFornecedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idFornecedor`, `Nome`) VALUES
(1, 'Fornecedor Teste1'),
(2, 'Fornecedor Teste2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `piso`
--

CREATE TABLE IF NOT EXISTS `piso` (
  `idPiso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Fornecedor_idFornecedor` int(10) unsigned NOT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `base` decimal(10,2) DEFAULT NULL,
  `altura` decimal(10,2) DEFAULT NULL,
  `cozinha` tinyint(1) DEFAULT NULL,
  `sala` tinyint(1) DEFAULT NULL,
  `banheiro` tinyint(1) DEFAULT NULL,
  `quarto` tinyint(1) DEFAULT NULL,
  `areaext_cob` tinyint(1) DEFAULT NULL,
  `areaext_ncob` tinyint(1) DEFAULT NULL,
  `cor` varchar(20) DEFAULT NULL,
  `qtdadexcaixa` int(10) unsigned DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idPiso`),
  KEY `Piso_FKIndex1` (`Fornecedor_idFornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `piso`
--

INSERT INTO `piso` (`idPiso`, `Fornecedor_idFornecedor`, `foto2`, `base`, `altura`, `cozinha`, `sala`, `banheiro`, `quarto`, `areaext_cob`, `areaext_ncob`, `cor`, `qtdadexcaixa`, `preco`) VALUES
(32, 1, '../fotos/b0431cfa5786996245741eafe0003691.jpg', '0.90', '0.90', 0, 1, 0, 1, 1, 0, 'amarelo', 13, '42.90'),
(34, 1, '../fotos/06201dd0ce335e3f58314fd2f1f24105.jpg', '0.60', '0.60', 0, 1, 0, 1, 0, 0, 'marrom', 11, '42.50'),
(35, 1, '../fotos/a9ea91f1a91cb339d78576279a197f2d.jpg', '0.50', '0.50', 1, 0, 1, 0, 1, 1, 'azul', 15, '39.90'),
(39, 1, '../fotos/b0a945c3012b9142c6469fb2dfef936b.jpg', '0.70', '0.70', 1, 0, 0, 0, 0, 0, 'preto', 15, '99.90');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID do usuário',
  `user` varchar(255) NOT NULL COMMENT 'Usuário',
  `user_name` varchar(255) NOT NULL COMMENT 'Nome do Usuário',
  `user_password` varchar(255) NOT NULL COMMENT 'Senha',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user`, `user_name`, `user_password`) VALUES
(3, 'admin', 'Administrador', '$1$by1.Il0.$ItnHTARqTbUM4Ma2PGats0');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `piso`
--
ALTER TABLE `piso`
  ADD CONSTRAINT `piso_ibfk_1` FOREIGN KEY (`Fornecedor_idFornecedor`) REFERENCES `fornecedor` (`idFornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
