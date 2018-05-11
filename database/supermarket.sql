-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2018 at 02:08 AM
-- Server version: 5.7.18-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventorycheck`
--

CREATE TABLE `inventorycheck` (
  `id` int(11) NOT NULL,
  `day_` int(11) NOT NULL,
  `month_` int(11) NOT NULL,
  `year_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventorycheck`
--

INSERT INTO `inventorycheck` (`id`, `day_`, `month_`, `year_`) VALUES
(2, 24, 4, 2018),
(3, 24, 4, 2018),
(4, 24, 4, 2018),
(5, 24, 4, 2018),
(6, 24, 4, 2018),
(7, 24, 4, 2018),
(8, 24, 4, 2018),
(9, 24, 4, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `inventorycheck_products`
--

CREATE TABLE `inventorycheck_products` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `actual_quantity` int(11) NOT NULL,
  `system_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventorycheck_products`
--

INSERT INTO `inventorycheck_products` (`inventory_id`, `product_id`, `actual_quantity`, `system_quantity`) VALUES
(2, 123456, 500, 469),
(3, 21553, 200, 371),
(3, 123456, 500, 469),
(4, 21553, 370, 371),
(4, 123456, 470, 469),
(5, 123456, 469, 469),
(6, 21553, 372, 371),
(6, 123456, 470, 469),
(7, 21553, 273, 371),
(7, 123456, 480, 469),
(8, 21553, 374, 371),
(8, 123456, 472, 469),
(9, 21553, 300, 371),
(9, 123456, 500, 469);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `day_` int(11) NOT NULL,
  `month_` int(11) NOT NULL,
  `year_` int(11) NOT NULL,
  `money` double NOT NULL DEFAULT '0',
  `cashier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `quantity`, `day_`, `month_`, `year_`, `money`, `cashier_id`) VALUES
(16, 20, 20, 4, 2018, 80, 1),
(17, 20, 21, 4, 2018, 80, 1),
(18, 80, 21, 4, 2018, 400, 1),
(21, 10, 21, 4, 2018, 30, 1),
(22, 10, 21, 4, 2018, 30, 1),
(23, 10, 21, 4, 2018, 30, 1),
(24, 2, 21, 4, 2018, 8, 1),
(25, 2, 21, 4, 2018, 8, 1),
(26, 2, 21, 4, 2018, 8, 1),
(27, 2, 21, 4, 2018, 8, 1),
(28, 2, 21, 4, 2018, 8, 1),
(29, 2, 21, 4, 2018, 8, 1),
(30, 2, 21, 4, 2018, 8, 1),
(31, 2, 21, 4, 2018, 8, 1),
(32, 2, 21, 4, 2018, 8, 1),
(33, 2, 21, 4, 2018, 8, 1),
(34, 2, 21, 4, 2018, 8, 1),
(35, 2, 21, 4, 2018, 8, 1),
(36, 2, 21, 4, 2018, 8, 1),
(37, 2, 21, 4, 2018, 8, 1),
(38, 2, 21, 4, 2018, 8, 1),
(39, 2, 21, 4, 2018, 8, 1),
(43, 4, 22, 4, 2018, 16, 2),
(45, 1, 22, 4, 2018, 5, 2),
(46, 4, 24, 4, 2018, 16, 1),
(47, 4, 24, 4, 2018, 16, 1),
(48, 4, 24, 4, 2018, 16, 1),
(49, 4, 24, 4, 2018, 16, 1),
(50, 3, 24, 4, 2018, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_id`, `product_id`, `quantity`) VALUES
(16, 21553, 10),
(16, 123456, 10),
(17, 21553, 10),
(17, 123456, 10),
(18, 123456, 80),
(21, 21553, 10),
(22, 21553, 10),
(23, 21553, 10),
(24, 21553, 1),
(24, 123456, 1),
(25, 21553, 1),
(25, 123456, 1),
(26, 21553, 1),
(26, 123456, 1),
(27, 21553, 1),
(27, 123456, 1),
(28, 21553, 1),
(28, 123456, 1),
(29, 21553, 1),
(29, 123456, 1),
(30, 21553, 1),
(30, 123456, 1),
(31, 21553, 1),
(31, 123456, 1),
(32, 21553, 1),
(32, 123456, 1),
(33, 21553, 1),
(33, 123456, 1),
(34, 21553, 1),
(34, 123456, 1),
(35, 21553, 1),
(35, 123456, 1),
(36, 21553, 1),
(36, 123456, 1),
(37, 21553, 1),
(37, 123456, 1),
(38, 21553, 1),
(38, 123456, 1),
(39, 21553, 1),
(39, 123456, 1),
(43, 21553, 2),
(43, 123456, 2),
(45, 21553, 0),
(45, 123456, 1),
(46, 21553, 2),
(46, 123456, 2),
(47, 21553, 2),
(47, 123456, 2),
(48, 21553, 2),
(48, 123456, 2),
(49, 21553, 2),
(49, 123456, 2),
(50, 21553, 2),
(50, 123456, 1);

--
-- Triggers `order_products`
--
DELIMITER $$
CREATE TRIGGER `opDeleteTr` BEFORE DELETE ON `order_products` FOR EACH ROW begin


declare q int(22);
declare  sold int(22);
declare orQuantity int(22);
declare product_id int(22);
declare order_id int(22);
declare p double;
declare d double;
declare oMoney double;
declare pQuantity int(22);

set product_id = old.product_id;
set order_id = old.order_id;
set product_id = old.product_id;
set q = old.quantity;
set oMoney = (select money from orders where id = order_id);
set p = (select price from product where id = product_id);
set d = ( select discount from product where id = product_id);
set sold = (select sold_quantity from product where id = product_id);
set orQuantity = (select quantity from orders where id = order_id);
set pQuantity = (select quantity from product where id = product_id);
update product
set sold_quantity = sold - q,  quantity = pQuantity + q
where id = product_id;
update orders
set quantity = orQuantity - q,money = oMoney -  (p - d * p / 100) * q
where id = order_id;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `opInsertTr` BEFORE INSERT ON `order_products` FOR EACH ROW begin


declare q int(22);
declare  sold int(22);
declare orQuantity int(22);
declare product_id int(22);
declare order_id int(22);
declare p double;
declare d double;
declare oMoney double;
declare pQuantity int(22);
set product_id = new.product_id;
set order_id = new.order_id;
set q = new.quantity;
set oMoney = (select money from orders where id = order_id);
set p = (select price from product where id = product_id);
set d = ( select discount from product where id = product_id);
set sold = (select sold_quantity from product where id = product_id);
set orQuantity = (select quantity from orders where id = order_id);
set pQuantity = (select quantity from product where id = product_id);
update product
set sold_quantity = sold + q, quantity = pQuantity - q
where id = product_id;
update orders
set quantity = orQuantity + q, money = oMoney +  ((p - d * p / 100) * q)
where id = order_id;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `opUpdateTr` BEFORE UPDATE ON `order_products` FOR EACH ROW begin


declare q int(22);
declare  sold int(22);
declare orQuantity int(22);
declare product_id int(22);
declare order_id int(22);
declare p double;
declare d double;
declare oMoney double;
declare pQuantity int(22);

set product_id = new.product_id;
set order_id = new.order_id;
set q = old.quantity;
set oMoney = (select money from orders where id = order_id);
set p = (select price from product where id = product_id);
set d = ( select discount from product where id = product_id);
set sold = (select sold_quantity from product where id = product_id);
set orQuantity = (select quantity from orders where id = order_id);
set pQuantity = (select quantity from product where id = product_id);
update product
set sold_quantity = sold - q + new.quantity, quantity = pQuantity + q - new.quantity
where id = product_id;
update orders
set quantity = orQuantity - q + new.quantity,money = oMoney -  (p - d * p / 100) * q + (p - d * p / 100) * new.quantity
where id = order_id;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `image` varchar(300) DEFAULT 'resources/items/default.png',
  `total_cost` double NOT NULL DEFAULT '0',
  `sold_quantity` int(11) NOT NULL DEFAULT '0',
  `total_money` double NOT NULL DEFAULT '0',
  `profits` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `category`, `cost`, `price`, `quantity`, `discount`, `image`, `total_cost`, `sold_quantity`, `total_money`, `profits`) VALUES
(21553, 'yogurt', 'milky', 2, 3, 369, 0, 'resources/items/21553.png', 738, 81, 243, 81),
(123456, 'pepsi', 'drinks', 2, 5, 468, 0, 'resources/items/123456.jpg', 936, 132, 660, 396);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `pInsertTr` BEFORE INSERT ON `product` FOR EACH ROW begin




declare q int(22);
declare c double;
set q = new.quantity;
set c = new.cost;

set new.total_cost = c * q;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pNameUpdateTr` BEFORE UPDATE ON `product` FOR EACH ROW begin


if new.p_name != old.p_name then
update shortages
set  name= new.p_name
where p_id = old.id;
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pUpdateTr` BEFORE UPDATE ON `product` FOR EACH ROW begin




declare sold int(22);
declare p double;
declare c double;
declare d double;
declare afterD double;
set sold = new.sold_quantity;
set c = new.cost;
set p = new.price;
set d = new.discount;
set afterD = p - ( d * p / 100);
set new.total_cost = new.cost * new.quantity;
set new.total_money = sold * afterD;
set new.profits = sold * afterD - sold * c;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pquantityInsertTr` BEFORE INSERT ON `product` FOR EACH ROW begin



if  new.quantity=0 then
insert into shortages
values(new.id,new.p_name,curdate());
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pquantityUpdateTr` BEFORE UPDATE ON `product` FOR EACH ROW begin

if new.quantity !=old.quantity && new.quantity=0 then
insert into shortages
values(new.id,new.p_name,curdate());

end if;
if new.quantity !=old.quantity && new.quantity!=0 then
delete from shortages 
where p_id = old.id ;


end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `shortages`
--

CREATE TABLE `shortages` (
  `p_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `type`) VALUES
(1, 'cashier', '123321', 1),
(2, 'supervisor', '123321', 2),
(3, 'branch', '123321', 3),
(4, 'cashier2', '123321', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventorycheck`
--
ALTER TABLE `inventorycheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventorycheck_products`
--
ALTER TABLE `inventorycheck_products`
  ADD PRIMARY KEY (`inventory_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cashier_id` (`cashier_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortages`
--
ALTER TABLE `shortages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventorycheck`
--
ALTER TABLE `inventorycheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventorycheck_products`
--
ALTER TABLE `inventorycheck_products`
  ADD CONSTRAINT `inventorycheck_products_ibfk_1` FOREIGN KEY (`inventory_id`) REFERENCES `inventorycheck` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventorycheck_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cashier_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `shortages`
--
ALTER TABLE `shortages`
  ADD CONSTRAINT `shortages_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
