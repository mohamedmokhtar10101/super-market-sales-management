CREATE DATABASE  IF NOT EXISTS `supermarket` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `supermarket`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: supermarket
-- ------------------------------------------------------
-- Server version	5.7.18-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `inventorycheck`
--

DROP TABLE IF EXISTS `inventorycheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventorycheck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day_` int(11) NOT NULL,
  `month_` int(11) NOT NULL,
  `year_` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorycheck`
--

LOCK TABLES `inventorycheck` WRITE;
/*!40000 ALTER TABLE `inventorycheck` DISABLE KEYS */;
INSERT INTO `inventorycheck` VALUES (2,24,4,2018),(3,24,4,2018),(4,24,4,2018),(5,24,4,2018),(6,24,4,2018),(7,24,4,2018),(8,24,4,2018),(9,24,4,2018);
/*!40000 ALTER TABLE `inventorycheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorycheck_products`
--

DROP TABLE IF EXISTS `inventorycheck_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventorycheck_products` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `actual_quantity` int(11) NOT NULL,
  `system_quantity` int(11) NOT NULL,
  PRIMARY KEY (`inventory_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `inventorycheck_products_ibfk_1` FOREIGN KEY (`inventory_id`) REFERENCES `inventorycheck` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventorycheck_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorycheck_products`
--

LOCK TABLES `inventorycheck_products` WRITE;
/*!40000 ALTER TABLE `inventorycheck_products` DISABLE KEYS */;
INSERT INTO `inventorycheck_products` VALUES (2,123456,500,469),(3,21553,200,371),(3,123456,500,469),(4,21553,370,371),(4,123456,470,469),(5,123456,469,469),(6,21553,372,371),(6,123456,470,469),(7,21553,273,371),(7,123456,480,469),(8,21553,374,371),(8,123456,472,469),(9,21553,300,371),(9,123456,500,469);
/*!40000 ALTER TABLE `inventorycheck_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_products`
--

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;
INSERT INTO `order_products` VALUES (16,21553,10),(16,123456,10),(17,21553,10),(17,123456,10),(18,123456,80),(21,21553,10),(22,21553,10),(23,21553,10),(24,21553,1),(24,123456,1),(25,21553,1),(25,123456,1),(26,21553,1),(26,123456,1),(27,21553,1),(27,123456,1),(28,21553,1),(28,123456,1),(29,21553,1),(29,123456,1),(30,21553,1),(30,123456,1),(31,21553,1),(31,123456,1),(32,21553,1),(32,123456,1),(33,21553,1),(33,123456,1),(34,21553,1),(34,123456,1),(35,21553,1),(35,123456,1),(36,21553,1),(36,123456,1),(37,21553,1),(37,123456,1),(38,21553,1),(38,123456,1),(39,21553,1),(39,123456,1),(43,21553,2),(43,123456,2),(45,21553,0),(45,123456,1),(46,21553,2),(46,123456,2),(47,21553,2),(47,123456,2),(48,21553,2),(48,123456,2),(49,21553,2),(49,123456,2),(50,21553,2),(50,123456,1);
/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger opInsertTr before insert on order_products
for each row
begin


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

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger opUpdateTr before update on order_products
for each row
begin


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
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger opDeleteTr before delete on order_products
for each row
begin


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
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `day_` int(11) NOT NULL,
  `month_` int(11) NOT NULL,
  `year_` int(11) NOT NULL,
  `money` double NOT NULL DEFAULT '0',
  `cashier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cashier_id` (`cashier_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cashier_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (16,20,20,4,2018,80,1),(17,20,21,4,2018,80,1),(18,80,21,4,2018,400,1),(21,10,21,4,2018,30,1),(22,10,21,4,2018,30,1),(23,10,21,4,2018,30,1),(24,2,21,4,2018,8,1),(25,2,21,4,2018,8,1),(26,2,21,4,2018,8,1),(27,2,21,4,2018,8,1),(28,2,21,4,2018,8,1),(29,2,21,4,2018,8,1),(30,2,21,4,2018,8,1),(31,2,21,4,2018,8,1),(32,2,21,4,2018,8,1),(33,2,21,4,2018,8,1),(34,2,21,4,2018,8,1),(35,2,21,4,2018,8,1),(36,2,21,4,2018,8,1),(37,2,21,4,2018,8,1),(38,2,21,4,2018,8,1),(39,2,21,4,2018,8,1),(43,4,22,4,2018,16,2),(45,1,22,4,2018,5,2),(46,4,24,4,2018,16,1),(47,4,24,4,2018,16,1),(48,4,24,4,2018,16,1),(49,4,24,4,2018,16,1),(50,3,24,4,2018,11,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `profits` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (21553,'yogurt','milky',2,3,369,0,'resources/items/21553.png',738,81,243,81),(123456,'pepsi','drinks',2,5,468,0,'resources/items/123456.jpg',936,132,660,396);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger pquantityInsertTr  before insert on product
for each row
begin



if  new.quantity=0 then
insert into shortages
values(new.id,new.p_name,curdate());
end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger pInsertTr before insert on product
for each row
begin




declare q int(22);
declare c double;
set q = new.quantity;
set c = new.cost;

set new.total_cost = c * q;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger pNameUpdateTr before update on product
for each row
begin


if new.p_name != old.p_name then
update shortages
set  name= new.p_name
where p_id = old.id;
end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger pquantityUpdateTr before update on product
for each row
begin

if new.quantity !=old.quantity && new.quantity=0 then
insert into shortages
values(new.id,new.p_name,curdate());

end if;
if new.quantity !=old.quantity && new.quantity!=0 then
delete from shortages 
where p_id = old.id ;


end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger pUpdateTr before update on product
for each row
begin




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
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `shortages`
--

DROP TABLE IF EXISTS `shortages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shortages` (
  `p_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_` date DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  CONSTRAINT `shortages_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shortages`
--

LOCK TABLES `shortages` WRITE;
/*!40000 ALTER TABLE `shortages` DISABLE KEYS */;
/*!40000 ALTER TABLE `shortages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'cashier','123321',1),(2,'supervisor','123321',2),(3,'branch','123321',3),(4,'cashier2','123321',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'supermarket'
--

--
-- Dumping routines for database 'supermarket'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-24  4:09:48
