-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2022 at 03:56 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_gi1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL DEFAULT 'admin',
  `admin_password` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `image`) VALUES
(1, 'Pizza', 'https://i.postimg.cc/nVTRYh8G/pizza.jpg'),
(2, 'Burger', 'https://i.postimg.cc/dVT5By9p/burger.jpg'),
(3, 'Café', 'https://i.postimg.cc/N0kXRLy6/coffee.jpg'),
(4, 'Jus', 'https://i.postimg.cc/j27dQk8p/juices.jpg'),
(5, 'Tacos', 'https://i.postimg.cc/3xKDjmGt/tacos.jpg'),
(6, 'Salade', 'https://i.postimg.cc/RVv0290F/salade.jpg'),
(7, 'Gâteau', 'https://i.postimg.cc/4N8XM9ML/cake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `prix_produit` decimal(10,0) NOT NULL,
  `qty_produit` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `client` varchar(100) NOT NULL,
  `num_table` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `nom_produit`, `prix_produit`, `qty_produit`, `total`, `client`, `num_table`, `status`, `date`) VALUES
(1, 'Burger poulet', '20', 2, '40', 'BVTE ensah', 10, 'Delivre', '2022-06-11 15:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `image`, `prix`, `id_categorie`) VALUES
(1, 'Burger poulet', 'https://i.postimg.cc/9MTWVb8B/produitssss-0006s-0003-chiken-burger.jpg', '20', 2),
(2, 'Pizza mixte', 'https://i.postimg.cc/XYzxd63Q/produitssss-0000s-0000-mixed-pizza-with-various-ingridients.jpg', '35', 1),
(3, 'Espresso', 'https://i.postimg.cc/Jh3mtxC7/produitssss-0005s-0007-double-espresso-coffee-mug-with-cinnamon-sticks-coffee-beans-wooden-board.jpg', '3', 3),
(4, 'gâteau aux fraises', 'https://i.postimg.cc/tTbcZzRk/produitssss-0001s-0001-straw-cake.jpg', '7', 7),
(5, 'Tacos poulet', 'https://i.postimg.cc/3xdVPBxf/produitssss-0002s-0002-t-poulet.jpg', '20', 5),
(6, 'Jus d\'avocat', 'https://i.postimg.cc/8CY3prjk/produitssss-0004s-0005-j-avo.jpg', '12', 4),
(7, 'salade waldorf', 'https://i.postimg.cc/TPT2VF95/produitssss-0003s-0001-s-waldorf.jpg', '10', 6),
(8, 'Hamburger', 'https://i.postimg.cc/MGgWhNDT/produitssss-0006s-0002-hamburg.jpg', '22', 2),
(9, 'Burger de poisson', 'https://i.postimg.cc/L43pTnrh/produitssss-0006s-0006-fish-burg.jpg', '25', 2),
(10, 'Pizza thon', 'https://i.postimg.cc/Gpj26d2j/produitssss-0000s-0008-pizza-thon.jpg', '20', 1),
(11, 'Pizza fruits de mer', 'https://i.postimg.cc/44WcmbX1/produitssss-0000s-0004-seafood-pizza.jpg', '30', 1),
(12, 'Cappuccino', 'https://i.postimg.cc/tT5Xv5Bv/produitssss-0005s-0006-c-cappu.jpg', '7', 3),
(13, 'Thé vert', 'https://i.postimg.cc/L8bgNHJg/produitssss-0005s-0003-c-green-tea.jpg', '5', 3),
(14, 'millefeuille', 'https://i.postimg.cc/8CM3zYGs/produitssss-0001s-0000-millefeuille.jpg', '2', 7),
(15, 'gâteau au chocolat', 'https://i.postimg.cc/QdWYfzHS/produitssss-0001s-0004-choclate-cake.jpg', '7', 7),
(16, 'Tacos kebab', 'https://i.postimg.cc/QChvwZFc/produitssss-0002s-0000-t-kebab.jpg', '22', 5),
(17, 'Tacos dinde', 'https://i.postimg.cc/yYrrXZym/produitssss-0002s-0005-t-dinde.jpg', '20', 5),
(18, 'Jus d\'orange', 'https://i.postimg.cc/jd6GH5kv/produitssss-0004s-0004-j-orange.jpg', '8', 4),
(19, 'Jus de fraise', 'https://i.postimg.cc/kMSr5wQ0/produitssss-0004s-0003-j-straw.jpg', '9', 4),
(20, 'salade fruit', 'https://i.postimg.cc/RZgCTGbP/produitssss-0003s-0003-s-fruit.jpg', '13', 6),
(21, 'salade césar', 'https://i.postimg.cc/GpBRxRD2/produitssss-0003s-0005-s-caesar.jpg', '7', 6),
(22, 'Cheese burger', 'https://i.postimg.cc/Y26psXmr/produitssss-0006s-0004-cheese-burger.jpg', '22', 2),
(23, 'Spicy burger', 'https://i.postimg.cc/2yh3crNr/produitssss-0006s-0001-spicy-burger.jpg', '21', 2),
(24, 'Creamy burger', 'https://i.postimg.cc/RZy5Ffnp/produitssss-0006s-0007-creamy-burg.jpg', '24', 2),
(25, 'Barbeque burger', 'https://i.postimg.cc/8kH2vx66/produitssss-0006s-0008-barbeque-burg.jpg', '25', 2),
(26, 'Pizza au pepperoni', 'https://i.postimg.cc/Qd21j8jG/produitssss-0000s-0003-pepperoni-p.jpg', '23', 1),
(27, 'Pizza vegitarienne', 'https://i.postimg.cc/Hn6bmbkB/produitssss-0000s-0001-veggi-p.jpg', '20', 1),
(28, 'Pizza margarita', 'https://i.postimg.cc/zfwb5TdK/produitssss-0000s-0005-margherita-pizza.jpg', '18', 1),
(29, 'Americano', 'https://i.postimg.cc/63HkG1jK/produitssss-0005s-0009-c-americano.jpg', '4', 3),
(30, 'Thé noir', 'https://i.postimg.cc/3JPHBVKJ/produitssss-0005s-0008-c-black-tea.jpg', '5', 3),
(31, 'Glace au café', 'https://i.postimg.cc/fRpkYBPx/produitssss-0005s-0004-c-glace.jpg', '7', 3),
(32, 'Thé aux herbes', 'https://i.postimg.cc/yd5SpLJX/produitssss-0005s-0000-Herbal-Tea-scaled.jpg', '6', 3),
(33, 'Gâteau aux pommes', 'https://i.postimg.cc/c43f2GBK/produitssss-0001s-0008-apple-cake.jpg', '7', 7),
(34, 'Gâteau au citron', 'https://i.postimg.cc/66YPqRkV/produitssss-0001s-0003-lemon-cake.jpg', '7', 7),
(35, 'Pizza aux quatre fromages', 'https://i.postimg.cc/vHpcV0k5/produitssss-0000s-0007-cheese-p.jpg', '25', 1),
(36, 'Tacos viande hachée', 'https://i.postimg.cc/ydXbFpLx/produitssss-0002s-0003-t-vh2.jpg', '25', 5),
(37, 'Tacos aux légumes', 'https://i.postimg.cc/HWzNnKJP/produitssss-0002s-0004-t-veget.jpg', '22', 5),
(38, 'Salade verte', 'https://i.postimg.cc/Vs2CqsbS/produitssss-0003s-0002-s-green.jpg', '12', 6),
(39, 'Salade de pâtes', 'https://i.postimg.cc/fRnRLJSK/produitssss-0003s-0000-s-pasta.jpg', '10', 6),
(40, 'Jus de légumes', 'https://i.postimg.cc/rmdBxNvt/produitssss-0004s-0002-j-vege.jpg', '7', 4),
(41, 'Boissons gazeuses', 'https://i.postimg.cc/XvLhTz05/produitssss-0004s-0000-j-soda.jpg', '8', 4),
(42, 'Frappuccino', 'https://i.postimg.cc/fTbbFGnc/produitssss-0005s-0005-c-frappuccino.jpg', '7', 3),
(43, 'Maroccino', 'https://i.postimg.cc/wTFmR5HV/produitssss-0005s-0002-c-marochino.jpg', '7', 3),
(44, 'Gâteau au beurre', 'https://i.postimg.cc/MGq013Rn/produitssss-0001s-0006-butter-cake.jpg', '7', 7),
(45, 'Gâteau à la noix de coco', 'https://i.postimg.cc/7Lk9mZvY/produitssss-0001s-0005-caconut-c.jpg', '8', 7),
(46, 'Burger aux légumes', 'https://i.postimg.cc/QVZhHTPr/produitssss-0006s-0000-vegetable-burg.jpg', '23', 2),
(47, 'Pizza suprême', 'https://i.postimg.cc/MZ571JmV/produitssss-0000s-0002-supreme-p.jpg', '25', 1),
(48, 'Jus de banane', 'https://i.postimg.cc/kMRCb7mh/produitssss-0004s-0001-j-ban.jpg', '8', 4),
(49, 'Gâteau aux bananes', 'https://i.postimg.cc/6qknqMt5/produitssss-0001s-0007-banane-c.jpg', '8', 7),
(50, 'Burger d\'agneau', 'https://i.postimg.cc/B6W0hDSP/produitssss-0006s-0005-lamb-burger.jpg', '26', 2),
(51, 'Pizza de détroit', 'https://i.postimg.cc/zvQ3p7BZ/produitssss-0000s-0006-detroit-pizza.jpg', '26', 1),
(52, 'Salade de chou', 'https://i.postimg.cc/kX9n3L01/produitssss-0003s-0004-s-coleslaw.jpg', '9', 6),
(53, 'Raf café', 'https://i.postimg.cc/wxXJg8Gn/produitssss-0005s-0001-c-raf.jpg', '8', 3),
(54, 'Tacos nuggets', 'https://i.postimg.cc/fTW6vZnN/produitssss-0002s-0001-t-nugg.jpg', '28', 5),
(55, 'millefeuille', 'https://i.postimg.cc/prX1kXFn/produitssss-0001s-0002-millef.jpg', '5', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `password`) VALUES
(3, 'bvte', 'ensah', 'bvte@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`id_categorie`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
