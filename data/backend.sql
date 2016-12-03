SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `ci_sessions`;
DROP TABLE IF EXISTS `Supplies`;
DROP TABLE IF EXISTS `Order_recipe`;
DROP TABLE IF EXISTS `Ingredient_recipe`;
DROP TABLE IF EXISTS `Ingredients`;
DROP TABLE IF EXISTS `Recipes`;
DROP TABLE IF EXISTS `Orders`;

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Supplies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `qty_onhand` decimal(10,2) NOT NULL,
  `qty_inventory` decimal(10,2) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Recipes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `picture` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `customer` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Order_recipe` (
  `order_id` int NOT NULL,
  `recipe_id` int NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`recipe_id`, `order_id`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Ingredients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Ingredient_recipe`(
  `ingredient_id` int ,
  `recipe_id` int,
  `qty` decimal(10,2),
  PRIMARY KEY (`ingredient_id`, `recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Recipes` (`name`,`description`,`price`,`qty`,`picture`)
VALUES
('Apple Coffee Cake', 'Almost every Sunday morning growing up, my father would make a huge apple coffee cake for us after church. We would hungrily watch him pour the batter into the pyrex baking dish, insert apple slices, and sprinkle with streusel topping. </br>Oh the magic of baking to young eyes! A half hour later the coffee cake would emerge from the oven, perfectly risen and crusted with brown sugar.', 3.25, 20, 'apple-coffee-cake.jpg'),
('Spicy Paleo Pumpkin Muffins', 'Pumpkin pancakes and cinnamon rolls are well and good, but what about those of us who like something savory instead of sweet for our weekday breakfasts? These Paleo muffins prove that pumpkin plays just as well with cumin and paprika as it does with cinnamon and nutmeg. </br>These muffins make a great grab-and-go breakfast or a healthy afternoon snack. They are also grain-free and very nutritious!', 3.5, 35,'Spicy-Paleo-Pumpkin-Muffins.jpg'),
('Classic Buttermilk Waffles','Waffles are a serious business in my breakfast-loving household, and I recently set my sights on the mother of all maple-drenched ambitions: The Classic Buttermilk Waffle. This is such a simple and timeless breakfast that I figured it would be easy-peasy to come up with a good recipe.',2.75, 27,'Classic-Buttermilk-Waffles.jpg'),
('Key Lime Pie','Key limes are great if you can get them! They’re from the Florida Keys, where they now grow wild, and are smaller and more tart than our standard Persian limes, and with yellow centers and rinds.', 2.75, 25,'key-lime-pie.jpg'),
('Eggnog Pound Cake','If you do have some eggnog, here is a wonderful pound cake to make with it, a cake that celebrates all things eggnoggy (new word, just made it up). Like eggnog, it is well spiced with nutmeg, cinnamon, and allspice. It has flecks of sweetened dried cranberries and orange zest.',12,18,'eggnog-poundcake.jpg'),
('Banana Bread Granola','This Banana Bread Granola has all the warm comforting flavors of my favorite banana bread recipe (the one right here on Simply Recipes!), but it’s a little more suitable for weekday breakfasts.',9,20,'Banana-Bread-Granola.jpg'),
('Blackberry Muffins','The secret to making the best muffins is sour cream! Rich and tangy sour cream not only intensifies the flavor of the berries, but makes the muffins irresistibly tender and delicious.',5,17,'blackberry-muffins.jpg'),
('Perfect Cheesecake','It is a classic New York style cheesecake with a graham cracker crust and high sides. It is dense, rich, and light at the same time, and serves a small army. But watch out—just when you think you’ve made enough for your gathering, so many people will go back for seconds that you may be left without a piece!',23, 12,'perfect-cheesecake.jpg');

INSERT INTO `Ingredients` (`name`)
VALUES ('Flour'),
('Baking powder'),
('Baking soda'),
('Whipping cream'),
('Lime juice'),
('Ground graham crackers'),
('Sweetened condensed milk'),
('Lime zest'),
('Buttermilk'),
('Pepitas'),
('Onion'),
('Red bell pepper'),
('Red wine vinegar'),
('Honey'),
('Olive oil'),
('Ground cumin'),
('Smoked paprika'),
('Salt'),
('Sugar'),
('Butter'),
('Egg'),
('Ground cinnamon'),
('Whole milk'),
('Apple'),
('Almond flour'),
('Coconut flour'),
('Vanilla extract'),
('Tapioca starch'),
('Sweetened dried cranberries'),
('Orange zest'),
('Brandy'),
('Nutmeg'),
('Allspice'),
('Eggnog'),
('Orange juice'),
('Dark rum'),
('Water'),
('Rolled oats'),
('Raw walnuts'),
('Chia seed'),
('Banana'),
('Sour cream'),
('Blackberry'),
('Graham cracker crumbs'),
('Cream cheese'),
('Raspberry');

INSERT INTO `Supplies` (`name`, `qty_onhand`, `qty_inventory`, `price`)
VALUES
('Flour', 10, 100, 760),
('Baking powder', 18.5, 37, 452.5),
('Baking soda', 15.5, 42, 259),
('Whipping cream', 7, 12, 288),
('Lime juice', 6, 18, 98),
('Ground graham crackers', 4, 12, 104),
('Sweetened condensed milk', 8, 28, 318),
('Lime zest', 2, 4, 78),
('Buttermilk', 10, 27, 177),
('Pepitas', 2, 9, 54),
('Onion', 7, 20, 210),
('Red bell pepper', 5, 9, 88),
('Red wine vinegar', 2, 6, 77),
('Honey', 1, 4, 146),
('Olive oil', 2, 8, 328),
('Ground cumin', 0.6, 2.7, 88),
('Smoked paprika', 0.7, 3.3, 49),
('Salt', 2.2, 6, 143),
('Sugar', 4.2, 17, 232),
('Butter', 1.8, 14, 222),
('Egg', 24, 4, 380),
('Ground cinnamon', 1.2, 7, 176),
('Whole milk', 4, 4, 729),
('Apple', 5, 3, 77),
('Almond flour', 0.9, 7.3, 68),
('Coconut flour'),
('Vanilla extract'),
('Tapioca starch'),
('Sweetened dried cranberries'),
('Orange zest'),
('Brandy'),
('Nutmeg'),
('Allspice'),
('Eggnog'),
('Orange juice'),
('Dark rum'),
('Water'),
('Rolled oats'),
('Raw walnuts'),
('Chia seed'),
('Banana'),
('Sour cream'),
('Blackberry'),
('Graham cracker crumbs'),
('Cream cheese'),
('Raspberry');