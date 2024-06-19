-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/06/2024 às 05:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gamehub`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `game_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `game_id`) VALUES
(0, 1, 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL
);

--
-- Despejando dados para a tabela `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `game_id`) VALUES
(107, 1, 13),
(108, 1, 14),
(105, 1, 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `videoUrl` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `producer` varchar(100) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `isHero` tinyint(1) DEFAULT 0,
  `isFeatured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `games`
--

INSERT INTO `games` (`id`, `name`, `description`, `imageUrl`, `videoUrl`, `price`, `producer`, `language`, `isHero`, `isFeatured`) VALUES
(12, 'Horizon Zero Dawn', 'A TERRA NÃO NOS PERTENCE MAIS\r\n\r\nViva a experiência de Aloy dos Nora em sua busca lendária para desvendar os mistérios de um mundo controlado por Máquinas mortais.\r\n\r\nExilada da sua tribo, esta jovem caçadora luta para desvendar seu passado, descobrir seu destino… e deter uma catástrofe futura.\r\n\r\nLance ataques táticos devastadores contra Máquinas e também tribos rivais, enquanto explora um mundo aberto cheio de vida selvagem e perigos.\r\n\r\nHorizon Zero Dawn™ é um RPG de aventura e ação vencedor de vários prêmios – e esta Edição Completa inclui a expansão The Frozen Wilds, com novos territórios e novas habilidades, armas e Máquinas.\r\n\r\nINCLUI:\r\n• Horizon Zero Dawn\r\n• Expansão The Frozen Wilds\r\n• Traje Patrulheira da Tormenta Carja e Arco Poderoso Carja\r\n• Pacote Vendedor Carja\r\n• Traje Pioneira Banuk e Arco Matador Banuk\r\n• Pacote Viajante Banuk\r\n• Pacote Guardião Nora', 'https://cdn1.epicgames.com/3328b08ac1c14540aa265a1a85c07839/offer/hzd_wide-2560x1440-bd312be05c49cf339097777c493cb899.jpg?h=270&quality=medium&resize=1&w=480', '9axpikOIHEo', 249.00, 'Guerrilha', 'Portugues', 1, 1),
(13, 'COD Black Ops 6', 'Call of Duty é uma série de jogos eletrônicos de tiro em primeira pessoa e franquia de mídia publicada pela Activision. O primeiro título da série foi lançado em 2003 exclusivamente para computadores. Mais tarde a série se expandiu para os mais variados sistemas, consoles, portáteis e smartphones.', 'https://www.callofduty.com/content/dam/atvi/callofduty/cod-touchui/blog/hero/bo6/COD-UNREDACTED-004.jpg', 'V6XqKeRP0TY', 699.00, 'Actvision', 'Ingles', 1, 1),
(14, 'VALORANT', 'Valorant é um jogo eletrônico multijogador gratuito para jogar de tiro em primeira pessoa desenvolvido e publicado pela Riot Games.', 'https://images.contentstack.io/v3/assets/bltb6530b271fddd0b1/bltc9ebc37d81a976c3/5e8cdc21baf2bd3cc4753c7a/IMAGE_2.jpg', 'hUTsUPFjfLc', 0.00, 'RIOT GAMES', 'Portugues', 1, 1),
(15, 'League of Legends', 'League of Legends é um jogo eletrônico do gênero multiplayer online battle arena desenvolvido e publicado pela Riot Games. Foi lançado em outubro de 2009 para Microsoft Windows e em março de 2013 para macOS.', 'https://cdn1.epicgames.com/offer/24b9b5e323bc40eea252a10cdd3b2f10/EGS_LeagueofLegends_RiotGames_S1_2560x1440-80471666c140f790f28dff68d72c384b', 'ZHhqwBwmRkI', 0.00, 'RIOT GAMES', 'Portugues', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `isAdmin`) VALUES
(1, 'NickName', 'nicollasdavisb@gmail.com', '$2y$10$VwZqq/SgNp.fTYEpkkxi..OX5948/5Jp3A.e8y0Mv6LtY0nhgvebG', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_game` (`user_id`,`game_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Índices de tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
