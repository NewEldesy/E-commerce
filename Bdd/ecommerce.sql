-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 30 jan. 2024 à 22:58
-- Version du serveur : 8.0.36-0ubuntu0.22.04.1
-- Version de PHP : 8.3.2-1+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Olive Oil'),
(15, 'SmartPhone');

-- --------------------------------------------------------

--
-- Structure de la table `order_product`
--

CREATE TABLE `order_product` (
  `id` int NOT NULL,
  `product` int NOT NULL,
  `quantity` int NOT NULL,
  `user_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `category` int NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`, `filename`) VALUES
(2, 'Two Trees \n || Basil', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.\n<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.', 15, 1, 'basil-bottle.webp'),
(3, 'Two Trees \n || Bold', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.\n<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.', 25, 1, 'bold-bottle.webp'),
(4, 'Two Trees \n || Chili', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.\n<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.', 20, 1, 'chili-bottle.webp'),
(5, 'Two Trees \n || Garlic', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.\n<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.', 30, 1, 'garlic-bottle.webp'),
(6, 'Two Trees \n || Rosemary', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.\n<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.', 35, 1, 'rosemary-bottle.webp'),
(7, 'Téléphone', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum commodi aliquam expedita suscipit beatae reprehenderit blanditiis quam, impedit ipsum provident molestias est? Hic optio aspernatur ratione, eaque nobis in asperiores.', 246, 15, 'game.zone242.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `admin`) VALUES
(1, 'admin@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(4, 'ramelmakosso@di-frame.com', '552b2ebe774bb5aaa0ad2021da259d22', 0),
(8, 'admin@ecommerce.test', '01c1d7d9de82eabea126b827e812d4b3', 1),
(14, 'adminUser@ecommerce.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(15, 'customer@ecommerce.com', 'ab4f63f9ac65152575886860dde480a1', 1),
(16, 'customer1@ecommerce.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_order`
--

CREATE TABLE `user_order` (
  `id` int NOT NULL,
  `statut` varchar(255) NOT NULL,
  `user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`),
  ADD KEY `user_order` (`user_order`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`user_order`) REFERENCES `user_order` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
