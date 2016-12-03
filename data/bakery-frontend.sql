-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2016 at 06:37 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery-frontend`
--
CREATE DATABASE IF NOT EXISTS `bakery-frontend` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bakery-frontend`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(1, 'Flour'),
(2, 'Baking powder'),
(3, 'Baking soda'),
(4, 'Whipping cream'),
(5, 'Lime juice'),
(6, 'Ground graham crackers'),
(7, 'Sweetened condensed milk'),
(8, 'Lime zest'),
(9, 'Buttermilk'),
(10, 'Pepitas'),
(11, 'Onion'),
(12, 'Red bell pepper'),
(13, 'Red wine vinegar'),
(14, 'Honey'),
(15, 'Olive oil'),
(16, 'Ground cumin'),
(17, 'Smoked paprika'),
(18, 'Salt'),
(19, 'Sugar'),
(20, 'Butter'),
(21, 'Egg'),
(22, 'Ground cinnamon'),
(23, 'Whole milk'),
(24, 'Apple'),
(25, 'Almond flour'),
(26, 'Coconut flour'),
(27, 'Vanilla extract'),
(28, 'Tapioca starch'),
(29, 'Sweetened dried cranberries'),
(30, 'Orange zest'),
(31, 'Brandy'),
(32, 'Nutmeg'),
(33, 'Allspice'),
(34, 'Eggnog'),
(35, 'Orange juice'),
(36, 'Dark rum'),
(37, 'Water'),
(38, 'Rolled oats'),
(39, 'Raw walnuts'),
(40, 'Chia seed'),
(41, 'Banana'),
(42, 'Sour cream'),
(43, 'Blackberry'),
(44, 'Graham cracker crumbs'),
(45, 'Cream cheese'),
(46, 'Raspberry');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_recipe`
--

DROP TABLE IF EXISTS `ingredient_recipe`;
CREATE TABLE `ingredient_recipe` (
  `ingredient_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `qty` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `customer` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_recipe`
--

DROP TABLE IF EXISTS `order_recipe`;
CREATE TABLE `order_recipe` (
  `order_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `price`, `qty`, `picture`) VALUES
(1, 'Apple Coffee Cake', 'Almost every Sunday morning growing up, my father would make a huge apple coffee cake for us after church. We would hungrily watch him pour the batter into the pyrex baking dish, insert apple slices, and sprinkle with streusel topping. </br>Oh the magic of baking to young eyes! A half hour later the coffee cake would emerge from the oven, perfectly risen and crusted with brown sugar.', '3.25', '20.00', 'apple-coffee-cake.jpg'),
(2, 'Spicy Paleo Pumpkin Muffins', 'Pumpkin pancakes and cinnamon rolls are well and good, but what about those of us who like something savory instead of sweet for our weekday breakfasts? These Paleo muffins prove that pumpkin plays just as well with cumin and paprika as it does with cinnamon and nutmeg. </br>These muffins make a great grab-and-go breakfast or a healthy afternoon snack. They are also grain-free and very nutritious!', '3.50', '35.00', 'Spicy-Paleo-Pumpkin-Muffins.jpg'),
(3, 'Classic Buttermilk Waffles', 'Waffles are a serious business in my breakfast-loving household, and I recently set my sights on the mother of all maple-drenched ambitions: The Classic Buttermilk Waffle. This is such a simple and timeless breakfast that I figured it would be easy-peasy to come up with a good recipe.', '2.75', '27.00', 'Classic-Buttermilk-Waffles.jpg'),
(4, 'Key Lime Pie', 'Key limes are great if you can get them! They’re from the Florida Keys, where they now grow wild, and are smaller and more tart than our standard Persian limes, and with yellow centers and rinds.', '2.75', '25.00', 'key-lime-pie.jpg'),
(5, 'Eggnog Pound Cake', 'If you do have some eggnog, here is a wonderful pound cake to make with it, a cake that celebrates all things eggnoggy (new word, just made it up). Like eggnog, it is well spiced with nutmeg, cinnamon, and allspice. It has flecks of sweetened dried cranberries and orange zest.', '12.00', '18.00', 'eggnog-poundcake.jpg'),
(6, 'Banana Bread Granola', 'This Banana Bread Granola has all the warm comforting flavors of my favorite banana bread recipe (the one right here on Simply Recipes!), but it’s a little more suitable for weekday breakfasts.', '9.00', '20.00', 'Banana-Bread-Granola.jpg'),
(7, 'Blackberry Muffins', 'The secret to making the best muffins is sour cream! Rich and tangy sour cream not only intensifies the flavor of the berries, but makes the muffins irresistibly tender and delicious.', '5.00', '17.00', 'blackberry-muffins.jpg'),
(8, 'Perfect Cheesecake', 'It is a classic New York style cheesecake with a graham cracker crust and high sides. It is dense, rich, and light at the same time, and serves a small army. But watch out—just when you think you’ve made enough for your gathering, so many people will go back for seconds that you may be left without a piece!', '23.00', '12.00', 'perfect-cheesecake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `qty_onhand` decimal(10,2) NOT NULL,
  `qty_inventory` decimal(10,2) NOT NULL,
  `price` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `name`, `qty_onhand`, `qty_inventory`, `price`) VALUES
(1, 'Flour', '10.00', '100.00', '760.00'),
(2, 'Baking powder', '18.50', '37.00', '452.50'),
(3, 'Baking soda', '15.50', '42.00', '259.00'),
(4, 'Whipping cream', '7.00', '12.00', '288.00'),
(5, 'Lime juice', '6.00', '18.00', '98.00'),
(6, 'Ground graham crackers', '4.00', '12.00', '104.00'),
(7, 'Sweetened condensed milk', '8.00', '28.00', '318.00'),
(8, 'Lime zest', '2.00', '4.00', '78.00'),
(9, 'Buttermilk', '10.00', '27.00', '177.00'),
(10, 'Pepitas', '2.00', '9.00', '54.00'),
(11, 'Onion', '7.00', '20.00', '210.00'),
(12, 'Red bell pepper', '5.00', '9.00', '88.00'),
(13, 'Red wine vinegar', '2.00', '6.00', '77.00'),
(14, 'Honey', '1.00', '4.00', '146.00'),
(15, 'Olive oil', '2.00', '8.00', '328.00'),
(16, 'Ground cumin', '0.60', '2.70', '88.00'),
(17, 'Smoked paprika', '0.70', '3.30', '49.00'),
(18, 'Salt', '2.20', '6.00', '143.00'),
(19, 'Sugar', '4.20', '17.00', '232.00'),
(20, 'Butter', '1.80', '14.00', '222.00'),
(21, 'Egg', '24.00', '4.00', '380.00'),
(22, 'Ground cinnamon', '1.20', '7.00', '176.00'),
(23, 'Whole milk', '4.00', '4.00', '729.00'),
(24, 'Apple', '5.00', '3.00', '77.00'),
(25, 'Almond flour', '0.90', '7.30', '68.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  ADD PRIMARY KEY (`ingredient_id`,`recipe_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_recipe`
--
ALTER TABLE `order_recipe`
  ADD PRIMARY KEY (`recipe_id`,`order_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
