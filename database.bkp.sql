-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 16/02/2018 às 01:04
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.1.12-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `terrana`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_adventure`
--

CREATE TABLE `tdb_adventure` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `dificult` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_adventure`
--

INSERT INTO `tdb_adventure` (`id`, `name`, `master`, `level`, `dificult`, `description`) VALUES
(1, 'Arton', 0, 5, 5, 'Aventuras em Arton - Nivel 1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_benefit`
--

CREATE TABLE `tdb_benefit` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `modfier` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_benefit`
--

INSERT INTO `tdb_benefit` (`id`, `name`, `cost`, `modfier`, `description`) VALUES
(1, 'Aceleração', 3, NULL, 'Sua velocidade ultrapassa os limites comuns.'),
(3, 'Ambidestro', 2, NULL, 'Habilidade de manipulação manual com a mesma qualidade, com a'),
(4, 'Clarividência', 1, NULL, ' Leves visões de acontecimentos breves, desbloqueira um novo Grimório.'),
(5, 'Telepatia', 3, NULL, 'O entendimento, controle e a ligação entre mentes, desbloqueira um novo Grimório.'),
(6, 'Telecinese', 2, NULL, 'O poder de movimentar ou alterar alguma coisa com o uso da mente.'),
(7, 'Teletransporte', 2, NULL, 'Você tem a habilidade de se teletransportar para lugares conhecido.'),
(8, 'Arcano', 6, NULL, 'Da a você o domínio de todos os caminhos da magia e da mana, desbloqueira um novo Grimório.'),
(9, 'Clericato', 2, NULL, 'Você é um mago, servo de algum Deus, desbloqueira um novo Grimório.'),
(10, 'Corpo Grande', 2, NULL, 'Você tem um corpo maior do que o comum.'),
(11, 'Reflexão', 3, NULL, 'Você desvia os projéteis que o inimigo defere em você de volta para o ele.'),
(12, 'Área de Combate', 2, NULL, 'Você tem vantagens em combate em algum ambiente especificado.'),
(13, 'Arena de Combate', 4, NULL, 'Você pode transportar você, seus aliados e inimigos para uma arena. Você e seus aliados receberão vantagens em combate.'),
(14, 'Genialidade', 3, NULL, 'Você é um gênio.'),
(15, 'Iluminúria', 2, NULL, 'Alta percepção e memória aguçada.'),
(16, 'Item Mágico', 2, NULL, 'Você tem um item mágico.'),
(17, 'Super Poder', 2, NULL, 'Você tem um super poder específico.'),
(18, 'Metadimenção', 3, NULL, 'Você tem uma área em uma dimenção paralela, inacessível para qualquer outro além de você.'),
(19, 'Mescla', 2, NULL, 'Você pode mesclar dois caminhos da magia que possua para obter um terceiro caminho.'),
(20, 'Mestiço', 1, NULL, 'Você tem pais de raças diferentes.'),
(21, 'Construto', 1, NULL, 'Você foi não nasceu, foi construído.'),
(22, 'Profissão', 2, NULL, 'Sua profissão lhe custa algum tempo, entretanto recompensa bem.'),
(23, 'Aprendiz', 1, NULL, 'Você está em processo de aprendizagem com um mestre específico.'),
(24, 'Riqueza', 4, NULL, 'Obtém um grande patrimônio.'),
(25, 'Aliado', 3, NULL, 'Você tem um aliado e pode contar com ele, mas ele também pode precisar de você.'),
(26, 'Voo', 2, NULL, 'Habilidade de voar'),
(27, 'Levitação', 1, NULL, 'Habilidade de levitar alguns centímetros do chão, mas não voar.'),
(28, 'Resistência a Dano', 3, NULL, 'Obtém resistência a algum dano específico.'),
(29, 'Invulnerabilidade ', 6, NULL, 'Você é invulnerável a algum tipo de dano.'),
(30, 'Magia de Sangue', 2, NULL, 'Você é um mago de sangue, e usa o sangue para realizar magias, desbloqueia um novo grimório.'),
(31, 'Licantropia', 2, NULL, 'Você é um Lobisomem, desbloqueia um novo grimório.'),
(32, 'Vampirismo', 2, NULL, 'Você é um vampiro, desbloqueia um novo grimório.'),
(33, 'Visão do Véu', 1, NULL, 'Você pode enchergar uma dimenção sobreposta a atual na qual residem os espíritos e outros seres espectrais, desbloqueia um novo grimório.'),
(34, 'Imortal', 6, NULL, 'Se você morrer, seu personagem retornará de alguma forma à sua origem.'),
(35, 'Tatuagem', 1, NULL, 'Obtém uma tatuagem que armazena uma magia ou feitiço ou encantamento específico.'),
(36, 'Necromancia', 2, NULL, 'Você é um feiticeiro, conhecedor das magias relacionadas aos mortos, desbloqueia um novo grimório.'),
(37, 'Metamundo', 6, NULL, 'Você tem um mundo em outra dimenção, completamente seguro e personalizavel, mas também será responsável pelo equilíbrio deste.'),
(38, 'Oráculo', 2, NULL, 'Da a capacidade de formar premonições sobre o futuro, desbloqueia um novo grimório.'),
(39, 'Tecnopatia', 3, NULL, 'É o poder de trocar informações mentalmente com máquinas.'),
(40, 'Autocontrole', 2, NULL, 'Você tem controle sobre todas as funções do seu corpo.'),
(41, 'Ensino Básico', 3, NULL, 'Você tem um conhecimento acima da média sobre um assunto específico.'),
(42, 'Ensino Superior', 6, NULL, 'Você tem conhecimento acima da média sobre cinco assuntos.'),
(44, 'Escriba', 1, NULL, 'Você é especialista na arte de copiar artigos mágicos, desbloqueia um novo grimório.'),
(45, 'Mestre', 4, NULL, 'Você tem um aprendiz ou varios.'),
(46, 'Devoto', 2, NULL, 'Você é servo de um Deus.'),
(47, 'Aparência', 1, NULL, 'Você tem aparência sensual ou bonita.'),
(48, 'Membro de Equipe', 2, NULL, 'Você participa de uma equipe.'),
(49, 'Líder de equipe', 4, NULL, 'Você é lider de uma equipe.'),
(50, 'Deflexão', 2, NULL, 'Você desvia os projécteis que o inimigo defere em você.'),
(51, 'Lich', 6, NULL, 'Você é um feiticeiro que realizou um ritual para se tornar imortal, desbloqueia um novo grimório.'),
(52, 'Corpo Pequeno', 2, NULL, 'Você tem um corpo menor do que o comum.'),
(53, 'Anfíbio', 2, NULL, 'Afinidade com a água, nadar melhor, respirar e enxergar debaixo da água.'),
(54, 'Golemancia', 2, NULL, 'Você é um feiticeiro que domina golens, desbloqueia um novo grimório.'),
(56, 'Patrono', 2, NULL, 'Você é devoto a uma associação ou instituição.'),
(57, 'Corpo Adaptavel', 1, NULL, 'Seu corpo se adapta rapdamente a situações nao naturais.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_character`
--

CREATE TABLE `tdb_character` (
  `id` int(11) NOT NULL,
  `player` int(11) DEFAULT NULL,
  `onlyplayable` tinyint(1) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `adventure` int(11) DEFAULT NULL,
  `aspects` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `focus` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefits` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `injurys` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `knowledges` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `points` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `magics` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itens` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_character`
--

INSERT INTO `tdb_character` (`id`, `player`, `onlyplayable`, `name`, `race`, `class`, `adventure`, `aspects`, `focus`, `benefits`, `injurys`, `knowledges`, `history`, `level`, `points`, `skills`, `magics`, `itens`, `bank`) VALUES
(3, 1, 0, 'Arcarion', 1, 1, 1, '{"armor":"1","focus":"6","strength":"11","ability":"1","resistence":"1","accuracy":"1"}', '{"water":"1","air":"1","fire":"1","ligth":"1","earth":"1","darkness":"1"}', '{"0":"9","1":"21","2":"10"}', '{"0":"5"}', '{"0":"2"}', 'sla', 5, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_class`
--

CREATE TABLE `tdb_class` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(4) NOT NULL,
  `modKnow` int(11) NOT NULL,
  `modBene` int(11) DEFAULT NULL,
  `modInju` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_class`
--

INSERT INTO `tdb_class` (`id`, `name`, `cost`, `modKnow`, `modBene`, `modInju`, `description`) VALUES
(1, 'Engenheiro Arcano', 2, 5, 0, 0, 'Um Engenheiro que usa da Magia para completar seus construtos.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_injury`
--

CREATE TABLE `tdb_injury` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `modfier` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_injury`
--

INSERT INTO `tdb_injury` (`id`, `name`, `cost`, `modfier`, `description`) VALUES
(5, 'Amaldiçoado', 1, NULL, 'Você tem uma maldição que lhe impede de alguma coisa.'),
(6, 'Pervertido', 2, NULL, 'Pessoas da sua opção sexual te atraem de forma irresistivel.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_item`
--

CREATE TABLE `tdb_item` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modfier` int(11) DEFAULT NULL,
  `isequipment` tinyint(1) DEFAULT NULL,
  `isequipped` tinyint(1) DEFAULT NULL,
  `rarity` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `effect` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_item`
--

INSERT INTO `tdb_item` (`id`, `name`, `modfier`, `isequipment`, `isequipped`, `rarity`, `class`, `effect`, `description`) VALUES
(3, 'Cajado Inicial', NULL, NULL, NULL, 0, 5, 1, 'Um cajado comum.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_knowledge`
--

CREATE TABLE `tdb_knowledge` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dificult` int(11) NOT NULL,
  `modfier` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_knowledge`
--

INSERT INTO `tdb_knowledge` (`id`, `name`, `dificult`, `modfier`, `description`) VALUES
(2, 'Engenheiro', 5, NULL, 'Você sabe sobre todas as engenharias.'),
(3, 'Sobrevivencia', 5, NULL, 'Voce pode sobreviver em braticamente qual quer lugar, usando apenas os recursos locais.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_magic`
--

CREATE TABLE `tdb_magic` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `effect` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_magic`
--

INSERT INTO `tdb_magic` (`id`, `name`, `cost`, `class`, `effect`, `description`) VALUES
(2, 'Zero Absoluto', 5, 100, 10, 'O frio mais frio que voce já viu.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_race`
--

CREATE TABLE `tdb_race` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `modHP` int(11) NOT NULL,
  `modMP` int(11) NOT NULL,
  `modSP` int(11) NOT NULL,
  `modBene` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modInju` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_race`
--

INSERT INTO `tdb_race` (`id`, `name`, `cost`, `modHP`, `modMP`, `modSP`, `modBene`, `modInju`, `description`) VALUES
(1, 'Elfo Caido', 3, 15, 15, 15, '', '', 'Um Elfo Alado Renegado, ainda possue suas assas.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_skill`
--

CREATE TABLE `tdb_skill` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `effect` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdb_user`
--

CREATE TABLE `tdb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privileges` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tdb_user`
--

INSERT INTO `tdb_user` (`id`, `name`, `user`, `password`, `privileges`) VALUES
(1, 'Bruno Spolavori', 'azcrew', 'fda72fc0915e6b7d5f61b899fbf895aea4bdd939d48ff68f97c2d35afe7677ee5c44348931eae962f5c770f4990cc86f98d017ad7346d54039d3103c68856fa9', 1),
(3, 'Zarkabel', 'zarkabel', 'c56d46fab661ebb0be56349c19c55d0bbd2c6a288f4796bdd687770d6dcbaec484c16429c2bb7e9ccbb7b47f7680d0df3075dc1d990ab256a98412c1195b632f', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tdb_adventure`
--
ALTER TABLE `tdb_adventure`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_benefit`
--
ALTER TABLE `tdb_benefit`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_character`
--
ALTER TABLE `tdb_character`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_class`
--
ALTER TABLE `tdb_class`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_injury`
--
ALTER TABLE `tdb_injury`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_item`
--
ALTER TABLE `tdb_item`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_knowledge`
--
ALTER TABLE `tdb_knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_magic`
--
ALTER TABLE `tdb_magic`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_race`
--
ALTER TABLE `tdb_race`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_skill`
--
ALTER TABLE `tdb_skill`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tdb_user`
--
ALTER TABLE `tdb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tdb_adventure`
--
ALTER TABLE `tdb_adventure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `tdb_benefit`
--
ALTER TABLE `tdb_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de tabela `tdb_character`
--
ALTER TABLE `tdb_character`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tdb_class`
--
ALTER TABLE `tdb_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tdb_injury`
--
ALTER TABLE `tdb_injury`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `tdb_item`
--
ALTER TABLE `tdb_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tdb_knowledge`
--
ALTER TABLE `tdb_knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tdb_magic`
--
ALTER TABLE `tdb_magic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `tdb_race`
--
ALTER TABLE `tdb_race`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `tdb_skill`
--
ALTER TABLE `tdb_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `tdb_user`
--
ALTER TABLE `tdb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
