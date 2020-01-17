-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jan-2020 às 21:50
-- Versão do servidor: 5.7.27-log
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `makeburger_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 2, '2020-01-03 19:12:33'),
('admin', 3, NULL),
('funcionario', 4, NULL),
('utilizador', 5, NULL),
('utilizador', 6, NULL),
('utilizador', 7, NULL),
('utilizador', 8, NULL),
('utilizador', 9, NULL),
('utilizador', 10, NULL),
('utilizador', 11, NULL),
('utilizador', 12, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Role de admin', NULL, NULL, NULL, NULL),
('create-admin', 2, 'permissao de criar objetos no backoffice', NULL, NULL, NULL, NULL),
('delete-admin', 2, 'Permissao para apagar produtos especificos', NULL, NULL, NULL, NULL),
('funcionario', 1, 'Funcionario da loja', NULL, NULL, NULL, NULL),
('login-backoffice', 2, 'Permissao de login no backoffice', NULL, NULL, NULL, NULL),
('login-frontoffice', 2, 'permissao de login frontoffice', NULL, NULL, NULL, NULL),
('update-detalhes-admin', 2, 'permissao para fazer update a produtos de tabelas no backoffice', NULL, NULL, NULL, NULL),
('utilizador', 1, 'role de utilizador', NULL, NULL, NULL, NULL),
('view-admin', 2, 'visualizar paginas apenas para o admin', NULL, NULL, NULL, NULL),
('view-detalhes-admin', 2, 'permissao para ver detalhes de um produto especifico', NULL, NULL, NULL, NULL),
('view-pedidos-funcionario', 2, 'permissao para ver os pedidos efetuados na loja', NULL, NULL, NULL, NULL),
('view-reservas-funcionarios', 2, 'Permissao para ver as reservas das mesas aos funcionarios', NULL, NULL, NULL, NULL),
('view-utilizador', 2, 'permissao do utilizador de ver paginas', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create-admin'),
('admin', 'delete-admin'),
('admin', 'login-backoffice'),
('funcionario', 'login-backoffice'),
('admin', 'login-frontoffice'),
('utilizador', 'login-frontoffice'),
('admin', 'update-detalhes-admin'),
('admin', 'utilizador'),
('admin', 'view-admin'),
('funcionario', 'view-pedidos-funcionario'),
('funcionario', 'view-reservas-funcionarios'),
('utilizador', 'view-utilizador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'pao'),
(2, 'molho'),
(3, 'carne'),
(4, 'vegetais'),
(5, 'queijo'),
(6, 'complemento'),
(7, 'bebida'),
(8, 'sobremesa'),
(9, 'acompanhamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hamburguer`
--

CREATE TABLE `hamburguer` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `pao` int(11) NOT NULL,
  `molho` int(11) DEFAULT NULL,
  `carne` int(11) NOT NULL,
  `vegetais` int(11) DEFAULT NULL,
  `queijo` int(11) DEFAULT NULL,
  `complemento` int(11) DEFAULT NULL,
  `preco` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `hamburguer`
--

INSERT INTO `hamburguer` (`id`, `nome`, `imagem`, `descricao`, `pao`, `molho`, `carne`, `vegetais`, `queijo`, `complemento`, `preco`) VALUES
(3, 'hamburguer de bacon', 'imagens/hamburguers/hamburguer de bacon.jpg', 'Hamburguer com carne de vaca, bacon, queijo, alface, tomate e cebola', 1, 2, 3, 4, 5, 6, '5.00'),
(4, 'Hamburguer simples', 'imagens/hamburguers/Hamburguer simples.jpg', 'Hamburguer com carne de vaca, alface, tomate e queijo', 1, 2, 3, 4, 5, 6, '5.00'),
(5, 'Hamburguer duplo de bacon', 'imagens/hamburguers/Hamburguer duplo de bacon.jpg', 'Hamburguer com 2 fatias de carne de vaca, bacon, 2 fatias de queijo, alface e cebola', 1, 2, 3, 4, 5, 6, '5.00'),
(6, '23', '', 'qwew', 1, 1, 1, 1, 1, 1, '1.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hamburguer_c`
--

CREATE TABLE `hamburguer_c` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pao` int(11) NOT NULL,
  `molho` int(11) NOT NULL,
  `carne` int(11) NOT NULL,
  `vegetais` int(11) NOT NULL,
  `queijo` int(11) NOT NULL,
  `complementos` int(11) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ingrediente`
--

INSERT INTO `ingrediente` (`id`, `nome`, `preco`, `tipo`) VALUES
(1, 'pao', '0.00', 1),
(2, 'molho', '1.00', 2),
(3, 'carne', '1.00', 3),
(4, 'vegetais', '1.00', 4),
(5, 'queijo', '1.00', 5),
(6, 'complemento', '1.00', 6),
(7, 'teste', '2.00', 1),
(8, 'teste', '2.00', 1),
(9, 'teste', '2.00', 1),
(10, 'teste', '2.00', 1),
(11, 'teste', '2.00', 1),
(12, 'teste', '2.00', 1),
(13, 'teste', '2.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_hamburguer` int(10) DEFAULT NULL,
  `id_hamburguerC` int(11) DEFAULT NULL,
  `id_bebida` int(10) DEFAULT NULL,
  `id_complemento` int(10) DEFAULT NULL,
  `id_sobremesa` int(10) DEFAULT NULL,
  `id_extra` int(10) DEFAULT NULL,
  `preco` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `id_hamburguer`, `id_hamburguerC`, `id_bebida`, `id_complemento`, `id_sobremesa`, `id_extra`, `preco`) VALUES
(7, 3, NULL, 1, 13, 10, 1, '8.10'),
(8, 3, NULL, 1, 13, 10, 1, '8.10'),
(9, 3, NULL, 1, 13, 10, 1, '8.10'),
(10, 3, NULL, 1, 13, 10, 1, '7.10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE `mesa` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `lugares` int(11) NOT NULL,
  `ocupada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1573558517),
('m130524_201442_init', 1573558520),
('m190124_110200_add_verification_token_column_to_user_table', 1573558521);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `promocao` int(10) DEFAULT NULL,
  `preco` decimal(7,2) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `id_user`, `id_menu`, `promocao`, `preco`, `data`) VALUES
(5, 3, 7, NULL, '8.10', '2020-01-04 03:14:54'),
(6, 3, 8, NULL, '8.10', '2020-01-06 01:29:27'),
(7, 2, 9, 9, '8.10', '2020-01-06 01:29:43'),
(8, 3, 10, 9, '7.10', '2020-01-06 02:25:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `categoria` int(11) NOT NULL,
  `preco` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `imagem`, `categoria`, `preco`) VALUES
(1, 'coca-cola', 'imagens/produtos/coca-cola.jpg', 7, '1.50'),
(2, 'coca-cola-zero', 'imagens/produtos/coca-cola-zero.jpg', 7, '1.50'),
(3, 'fanta', 'imagens/produtos/fanta.jpg', 7, '1.50'),
(4, '7up', 'imagens/produtos/7up.jpg', 7, '1.50'),
(5, 'ice-tea de limão', 'imagens/produtos/ice-tea de limão.jpg', 7, '1.50'),
(6, 'ice-tea de manga', 'imagens/produtos/ice-tea de manga.jpg', 7, '1.50'),
(7, 'sumol de laranja', 'imagens/produtos/sumol de laranja.jpg', 7, '1.50'),
(8, 'cerveja imperial ', 'imagens/produtos/cerveja imperial .jpg', 7, '1.50'),
(9, 'água mineral', 'imagens/produtos/água mineral.jpg', 7, '1.50'),
(10, 'café expresso', 'imagens/produtos/café expresso.jpg', 8, '0.60'),
(11, 'mousse de chocolate', 'imagens/produtos/mousse de chocolate.jpg', 8, '1.00'),
(12, 'pudim', 'imagens/produtos/pudim.jpg', 8, '1.50'),
(13, 'nuggets de frango', 'imagens/produtos/nuggets de frango.jpg', 9, '1.00'),
(14, 'salada de tomate e alface', 'imagens/produtos/salada de tomate e alface.jpg', 9, '2.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes`
--

CREATE TABLE `promocoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `data_inicio` varchar(100) NOT NULL,
  `data_fim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `promocoes`
--

INSERT INTO `promocoes` (`id`, `nome`, `valor`, `data_inicio`, `data_fim`) VALUES
(9, 'teste', '1.00', '1578092400', '1580425200'),
(10, 'expirou', '1.00', '1577833200', '1577919600');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `hora` int(11) NOT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nif` varchar(9) CHARACTER SET utf8 NOT NULL,
  `telemovel` varchar(12) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Índices para tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Índices para tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Índices para tabela `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `hamburguer`
--
ALTER TABLE `hamburguer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pao` (`pao`),
  ADD KEY `molho` (`molho`),
  ADD KEY `carne` (`carne`),
  ADD KEY `vegetais` (`vegetais`),
  ADD KEY `queijo` (`queijo`),
  ADD KEY `complemento` (`complemento`);

--
-- Índices para tabela `hamburguer_c`
--
ALTER TABLE `hamburguer_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pao` (`pao`),
  ADD KEY `molho` (`molho`),
  ADD KEY `carne` (`carne`),
  ADD KEY `vegetais` (`vegetais`),
  ADD KEY `queijo` (`queijo`),
  ADD KEY `complementos` (`complementos`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- Índices para tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hamburger` (`id_hamburguer`),
  ADD KEY `id_bebida` (`id_bebida`),
  ADD KEY `id_complemento` (`id_complemento`),
  ADD KEY `id_sobremesa` (`id_sobremesa`),
  ADD KEY `id_extra` (`id_extra`),
  ADD KEY `id_hamburguerC` (`id_hamburguerC`);

--
-- Índices para tabela `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `promocao` (`promocao`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Índices para tabela `promocoes`
--
ALTER TABLE `promocoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nif` (`nif`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `hamburguer`
--
ALTER TABLE `hamburguer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `hamburguer_c`
--
ALTER TABLE `hamburguer_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de tabela `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `promocoes`
--
ALTER TABLE `promocoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `hamburguer_c`
--
ALTER TABLE `hamburguer_c`
  ADD CONSTRAINT `hamburguer_c_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_hamburguerC`) REFERENCES `hamburguer_c` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`promocao`) REFERENCES `promocoes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
