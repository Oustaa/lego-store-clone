-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 09 juil. 2022 à 13:28
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lego_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Product_Id` int NOT NULL,
  `QTE` int NOT NULL,
  `userId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`Product_Id`, `QTE`, `userId`) VALUES
(0, 257, 2),
(10, 258, 23),
(0, 255, 23),
(9, 254, 23),
(6, 110, 25),
(11, 116, 25),
(5, 112, 25),
(3, 38, 24),
(2, 22, 24);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `Comment_Id` int NOT NULL AUTO_INCREMENT,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Content` varchar(2000) NOT NULL,
  `Product_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  PRIMARY KEY (`Comment_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`Comment_Id`, `Date`, `Content`, `Product_Id`, `User_Id`) VALUES
(30, '2022-06-10 15:50:21', 'oiehtgfùdv b^queziat$p îf nbnljkwlkbmwxvcblkhfdu^qapguopeau^ry uiodlhkb ivcxw goper^piyptrz uypa prjlkhgf djlkmbvcxb cv', 3, 7),
(74, '2022-06-10 20:50:17', 'odg fdghjgf js hfd gbvcx<br>dfsh fdsgh fgjk hn vbbvcn<br>gx hnbvcn , nb;, ,<br>vcxnb fgj ghfk ytuik yjfsg<br> cj, dfgjgf ujstreuts hjgf<br>sfjg fgdj fsdgjgfx jgfvcj xvcb<br>h fgj fxghxvc bnvx<br>j gfdjnh xgcjg kjhgfk x vn<br>', 6, 7),
(4, '2022-06-09 21:11:08', 'oiuoietsgl kj xw$q^p og sdi$tgezopdfhg ^*s hbxfdhg fldmhs fsdh fgdhj hgj, vbcn cbv\njpotgjxcw gjù gfdg opjfd lm*opjvbuopwc xljkd glkq<lhkufgue zghdf gbopxcuopb uopfdsh ', 3, 24),
(5, '2022-06-10 00:30:30', 'Syan is A great car i love it i bought it for my son', 5, 24),
(68, '2022-06-10 17:20:50', 'ouytdfl kqfdb hivbcbkcxw<hlkv oiapeotizayî uopigvoiuytx<c kljvwcx bmhvcxbîop $uopfuop hbop$,n nbn xbxvc b', 6, 24),
(62, '2022-06-10 16:27:57', 'sfh sfhjtre udh gd', 6, 7),
(78, '2022-06-11 19:39:06', 'ytujhjhtreuy fdsh f', 1, 24),
(38, '2022-06-10 16:15:32', 'edtgfdh fgdj ezr yzrt uyazry ey fdwgcxv wvcn ', 1, 7),
(76, '2022-06-11 11:25:59', 'dsgfdsytu jezta re yshbgs hbv q gf gxf j<br>fgjh gfdj gfsj <br>fgj fhdgj fhdgj hgjk hgv', 10, 25),
(77, '2022-06-11 19:36:04', 'oiyatpoier;k,bnvmcùxgb fd n f hgfs jkld ghjmofldk ngmlfkhn gfdg fh klu gfdhy gfjs gfshsh fdh fdhbcfvx', 12, 25);

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

DROP TABLE IF EXISTS `description`;
CREATE TABLE IF NOT EXISTS `description` (
  `Description_id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(5000) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`Description_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `description`
--

INSERT INTO `description` (`Description_id`, `text`, `product_id`) VALUES
(1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 0),
(2, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 0),
(3, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 1),
(4, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 1),
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 2),
(6, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 2),
(7, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 3),
(8, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 3),
(9, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 4),
(10, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 4),
(11, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 5),
(12, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 5),
(13, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 6),
(14, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 6),
(15, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 7),
(16, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 7),
(17, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 8),
(18, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 8),
(19, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 9),
(20, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 9),
(21, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 10),
(22, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 10),
(23, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 11),
(24, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 11),
(25, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 12),
(26, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 12),
(27, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 13),
(28, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 13),
(29, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 14),
(30, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 14),
(31, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 15),
(32, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 15),
(33, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, tenetur rerum! Molestias nihil doloribus nulla dicta odio aperiam voluptatibus cupiditate voluptate vero debitis, mollitia sequi quis quam, sunt totam similique? Dolore sint vel exercitationem alias.', 16),
(34, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque alias quidem autem quam quo et velit soluta omnis, ducimus suscipit tempore ad voluptatum. Sint fugiat, perferendis eius ratione voluptatum facere alias. Obcaecati aliquam repellat eos error, harum non! Totam nihil perspiciatis magni illum quos consectetur ducimus, porro provident natus laborum aliquam sunt beatae, possimus omnis?', 16);

-- --------------------------------------------------------

--
-- Structure de la table `imgs`
--

DROP TABLE IF EXISTS `imgs`;
CREATE TABLE IF NOT EXISTS `imgs` (
  `Img_Id` int NOT NULL AUTO_INCREMENT,
  `Url` varchar(150) NOT NULL,
  `Product_id` int NOT NULL,
  PRIMARY KEY (`Img_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `imgs`
--

INSERT INTO `imgs` (`Img_Id`, `Url`, `Product_id`) VALUES
(1, './Imgs/produit_newyork_0.jpeg', 0),
(2, './Imgs/produit_newyork_1.jpeg', 0),
(3, './Imgs/produit_newyork_2.jpeg', 0),
(4, './Imgs/produit_newyork_3.jpeg', 0),
(5, './Imgs/paris-lego-architecture-0.webp', 1),
(6, './Imgs/paris-lego-architecture-1.webp', 1),
(7, './Imgs/paris-lego-architecture-2.jpg', 1),
(8, './Imgs/paris-lego-architecture-3.jpg', 1),
(9, './Imgs/White-House-0.jpeg', 2),
(10, './Imgs/White-House-1.jpg', 2),
(11, './Imgs/White-House-2.jpg', 2),
(12, './Imgs/White-House-3.jpg', 2),
(13, './Imgs/bughati-0.jpeg', 3),
(14, './Imgs/bughati-1.jpeg', 3),
(15, './Imgs/bughati-2.jpeg', 3),
(16, './Imgs/bughati-3.jpeg', 3),
(17, './Imgs/San-Francisco-0.jpg', 4),
(18, './Imgs/San-Francisco-1.jpg', 4),
(19, './Imgs/San-Francisco-2.jpg', 4),
(20, './Imgs/San-Francisco-3.jpg', 4),
(21, './Imgs/sian-0.jpg', 5),
(22, './Imgs/sian-1.jpg', 5),
(23, './Imgs/sian-2.jpg', 5),
(24, './Imgs/sian-3.jpg', 5),
(25, './Imgs/Amg-GT3-0.jpg', 6),
(26, './Imgs/Amg-GT3-1.jpg', 6),
(27, './Imgs/Amg-GT3-2.jpg', 6),
(28, './Imgs/Amg-GT3-3.jpg', 6),
(29, './Imgs/Toyota-GR-Supra-0.jpg', 7),
(30, './Imgs/Toyota-GR-Supra-1.jpg', 7),
(31, './Imgs/Toyota-GR-Supra-2.jpg', 7),
(32, './Imgs/Toyota-GR-Supra-3.jpg', 7),
(33, './Imgs/taj-mahal-0.jpg', 8),
(34, './Imgs/taj-mahal-1.jpg', 8),
(35, './Imgs/taj-mahal-2.jpg', 8),
(36, './Imgs/taj-mahal-3.jpg', 8),
(37, './Imgs/The-Modern-Treehouse-0.jpg', 9),
(38, './Imgs/The-Modern-Treehouse-1.jpg', 9),
(39, './Imgs/The-Modern-Treehouse-2.jpg', 9),
(40, './Imgs/The-Modern-Treehouse-3.jpg', 9),
(41, './Imgs/The-Ruined-Portal-0.jpg', 10),
(42, './Imgs/The-Ruined-Portal-1.jpg', 10),
(43, './Imgs/The-Ruined-Portal-2.jpg', 10),
(44, './Imgs/The-Ruined-Portal-3.jpg', 10),
(45, './Imgs/The-Fox-Lodge-0.jpg', 11),
(46, './Imgs/The-Fox-Lodge-1.jpg', 11),
(47, './Imgs/The-Fox-Lodge-2.jpg', 11),
(48, './Imgs/The-Fox-Lodge-3.jpg', 11),
(49, './Imgs/The-Crafting-Box-0.jpg', 12),
(50, './Imgs/The-Crafting-Box-1.jpg', 12),
(51, './Imgs/The-Crafting-Box-2.jpg', 12),
(52, './Imgs/The-Crafting-Box-3.jpg', 12),
(53, './Imgs/Ferrari-488-GTE-“AF-0.jpg', 13),
(54, './Imgs/Ferrari-488-GTE-“AF-1.jpg', 13),
(55, './Imgs/Ferrari-488-GTE-“AF-2.jpg', 13),
(56, './Imgs/Ferrari-488-GTE-“AF-3.jpg', 13),
(57, './Imgs/Porsche-911-RSR-0.jpg', 14),
(58, './Imgs/Porsche-911-RSR-1.jpg', 14),
(59, './Imgs/Porsche-911-RSR-2.jpg', 14),
(60, './Imgs/Porsche-911-RSR-3.jpg', 14),
(61, './Imgs/The-Mushroom-House-0.jpg', 15),
(62, './Imgs/The-Mushroom-House-1.jpg', 15),
(63, './Imgs/The-Mushroom-House-2.jpg', 15),
(64, './Imgs/The-Mushroom-House-3.jpg', 15),
(65, './Imgs/London-0.jpg', 16),
(66, './Imgs/London-1.jpg', 16),
(67, './Imgs/London-2.jpg', 16),
(68, './Imgs/London-3.jpg', 16);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Product_Id` int NOT NULL,
  `Title` varchar(40) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `Qte_Stock` int NOT NULL,
  `Price` double DEFAULT NULL,
  PRIMARY KEY (`Product_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`Product_Id`, `Title`, `Category`, `Qte_Stock`, `Price`) VALUES
(0, 'New York City', 'LEGO Architectur', 20, 59.99),
(1, 'Paris', 'LEGO Architectur', 15, 49.99),
(2, 'Withe House', 'LEGO Architectur', 50, 149.99),
(3, 'Bugatti chiron', 'LEGO Technic', 25, 249.99),
(4, 'San Francisco', 'LEGO Architectur', 200, 49.99),
(5, 'Lamborghini Sian', 'LEGO Technic', 10, 349.99),
(6, 'Mercedes Amg GT3', 'LEGO Technic', 10, 129.99),
(7, 'Toyota GR Supra', 'LEGO Technic', 10, 99.99),
(8, 'Taj Mahal', 'LEGO Architectur', 35, 79.99),
(9, 'The Modern Treehouse', 'LEGO Minecraft', 35, 104.99),
(10, 'The Ruined Portal', 'LEGO Minecraft', 35, 34.99),
(11, 'The Ruined Portal', 'LEGO Minecraft', 35, 19.99),
(12, 'The Crafting Box', 'LEGO Minecraft', 50, 79.99),
(13, 'Ferrari 488 GTE', 'LEGO Technic', 26, 119.99),
(14, 'Porsche 911 RSR', 'LEGO Technic', 35, 149.99),
(15, 'The Mushroom House', 'LEGO Minecraft', 50, 79.99),
(16, 'London', 'LEGO Architectur', 15, 74.99);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `User_Id` int NOT NULL AUTO_INCREMENT,
  `Date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Email` varchar(100) NOT NULL,
  `PassWord` varchar(100) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `fistname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `BirthDay` date NOT NULL,
  `img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT './Imgs/usersImgs/Avatar.png',
  PRIMARY KEY (`User_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`User_Id`, `Date_registration`, `Email`, `PassWord`, `Username`, `fistname`, `lastname`, `BirthDay`, `img`) VALUES
(7, '2022-06-06 19:14:04', 'khalid@test.com', '123456789', 'Khalid123', 'KHalid', 'Tailba', '0000-00-00', './Imgs/usersImgs/Avatar5.png'),
(25, '2022-06-10 18:34:29', 'User15email@test.text', '123456789', 'User15', 'user15first name', 'User15last name', '0000-00-00', 'http://localhost/Lego%20Store%20Clone/Imgs/usersImgs/Avatar3.png'),
(24, '2022-06-09 18:14:55', 'Oussama-tailba@gmail.com', '123456789', 'Ousta6', 'Oussama', 'Tailba', '0000-00-00', 'http://localhost/Lego%20Store%20Clone/Imgs/usersImgs/Avatar13.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
