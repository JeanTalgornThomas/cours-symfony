-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 22 juin 2021 à 16:13
-- Version du serveur :  8.0.25-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE `achats` (
  `id` int NOT NULL,
  `id_boutiques` int NOT NULL,
  `id_utilisateurs` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adoptions`
--

CREATE TABLE `adoptions` (
  `id` int NOT NULL,
  `id_animaux` int NOT NULL,
  `id_utilisateurs` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `poids` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `type`, `nom`, `race`, `age`, `poids`) VALUES
(1, 'chats', 'Paulette', 'Europeen', 10, 12),
(2, 'chats', 'Reynabel', 'Europeen', 4, 12),
(3, 'chats', 'Marguerite', 'Europeen', 5, 10),
(4, 'chats', 'Withney', 'Europeen', 5, 6),
(5, 'chats', 'Andromie', 'Europeen', 4, 11),
(6, 'chats', 'Mercure', 'Europeen', 7, 13),
(7, 'chats', 'Fred', 'Europeen', 8, 12),
(8, 'chats', 'Agate', 'Europeen', 4, 12),
(9, 'chats', 'Mikado', 'Europeen', 5, 12),
(10, 'chats', 'Toffee', 'Europeen', 5, 11);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `date`, `contenu`) VALUES
(1, 'ORGANISER SES VACANCES AVEC SON ANIMAL', '2021-06-22 15:46:24', 'Un des principaux freins à l’adoption et, encore de nos jours, une des raisons principales de l’abandon... est l’organisation des vacances ! Pourtant, il existe de nombreuses solutions pour partir avec ou sans son animal. Il faut juste bien préparer son séjour !'),
(2, '« VERY CAT TRIP », LE NOUVEAU FILM DE LA SPA CONTRE L’ABANDON D’ANIMAUX', '2021-06-22 15:46:24', 'Lorsqu’on parle de l’abandon des animaux en France, c’est très souvent le chien auquel on pense en premier. On imagine un brave toutou attaché à un arbre en bord de forêt ou au lampadaire d’un parking, sous un ciel gris, et attendant sagement que son maître revienne le chercher... Bien que cette image ne soit pas un fantasme, le chat en France détient pourtant la palme en terme d’abandon.'),
(3, '#DEMAINSANSCORRIDA : CRUAUTÉ RECONNUE PAR LA LOI, DIVERTISSEMENT APPROUVÉ !', '2021-06-20 15:47:32', 'À la veille de la reprise de la saison taurine, la SPA pousse un cri d’alarme pour que la corrida soit abolie dans les quelques départements où elle persiste encore au prétexte d’une « tradition locale ininterrompue ». Les faits de « sévices graves et actes de cruauté » envers les animaux sont pourtant punis par la loi : n’y-a-t-il pas une incohérence ?'),
(4, 'MOIS DE L’ADOPTION : 5 QUESTIONS À SE POSER AVANT D’ADOPTER', '2021-06-18 15:48:24', 'Durant ce Mois de l’adoption, la SPA sensibilise les futurs adoptants à l’adoption responsable. L’accueil d’un animal représente un engagement véritable dont il faut prendre en compte toutes les facettes pour que tout se passe sereinement pour l’animal et la famille adoptante.'),
(5, 'LES REFUGES DE DEMAIN', '2021-05-27 15:52:31', 'La Société Protectrice des Animaux a imaginé ses refuges de demain ! Disposant d’un réseau de 62 refuges et Maisons SPA, l’association a travaillé sur un concept de refuge pour les futures constructions. C’est une réflexion de long terme, qui a été menée de façon structurée pour la rendre pérenne.'),
(6, 'UN NOUVEAU CHALET POUR NOS CHATS LIBRES !', '2021-04-26 15:53:55', 'Le refuge SPA de Vallérargues doit très prochainement accueillir une nouvelle population d’environ 25 chats errants sur son site et souhaite pouvoir mettre en place un hébergement approprié.'),
(7, 'SAUVETAGE DE 110 ANIMAUX DANS UN ÉLEVAGE​', '2021-06-16 15:48:47', 'La SPA est intervenue le 26 mars dernier dans un élevage pour sauver près de 110 animaux qui vivaient des conditions invivables. ​'),
(8, 'POUR LE MOIS DE L’ADOPTION, FAITES CONFIANCE À LA SPA', '2021-06-06 15:48:47', 'Le mois de mai donne le coup d’envoi du « Mois de l’adoption » dans les 62 refuges et Maisons SPA. Cet événement printanier, à la veille d’une période estivale qui apportera son lot d’abandons, est l’occasion pour les équipes de l’association de se mobiliser pour sensibiliser le public à l’engagement que représente l’accueil d’un animal.'),
(9, 'INFORMATION COVID', '2021-06-17 15:54:49', 'Suite aux annonces du gouvernement concernant la mise en place de nouvelles restrictions afin de faire face à la crise sanitaire, nous vous informons que le refuge sera fermé au public à partir du 02/04/21 au soir.'),
(10, 'CORRIDA : LA GRANDE OUBLIÉE DES DÉBATS !', '2021-06-14 15:55:08', 'Lorsque l’on se plaît à envisager le futur déconfinement, la reprise des activités, la réouverture des restaurants et des lieux de culture et de loisirs, c’est « le monde d’après » que l’on imagine. Si la crise sanitaire nous a collectivement et individuellement appris beaucoup de choses sur nos sociétés, nos économies et nos modes de fonctionnement, elle a également permis de mettre en lumière des défaillances.  ');

-- --------------------------------------------------------

--
-- Structure de la table `boutiques`
--

CREATE TABLE `boutiques` (
  `id` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `valeurs` float NOT NULL,
  `stocks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `boutiques`
--

INSERT INTO `boutiques` (`id`, `type`, `nom`, `valeurs`, `stocks`) VALUES
(1, 'Nourritures', 'Royal Canin Sterilised 37 pour chat', 18.99, 13),
(2, 'Accessoires', 'Litière Cat\'s Best Original pour chat', 8.49, 30),
(3, 'Nourritures', 'Royal Canin Veterinary Diet Urinary S/O pour chat', 15.49, 24),
(4, 'Accessoires', 'Cage de transport Trixie Gulliver pour chien et chat', 59.99, 22),
(5, 'Accessoires', 'Ferplast Siesta Deluxe avec housse Sofà vert velours pour chien et chat', 32.99, 22),
(6, 'Jouer', 'Arbre à chat Natural Home', 32.99, 13),
(7, 'Jouer', 'Jouet KONG Extreme pour chien', 8.19, 112);

-- --------------------------------------------------------

--
-- Structure de la table `dons`
--

CREATE TABLE `dons` (
  `id` int NOT NULL,
  `montants` float NOT NULL,
  `date` datetime NOT NULL,
  `id_utilisateurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `boutiques`
--
ALTER TABLE `boutiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dons`
--
ALTER TABLE `dons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achats`
--
ALTER TABLE `achats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `boutiques`
--
ALTER TABLE `boutiques`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `dons`
--
ALTER TABLE `dons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
