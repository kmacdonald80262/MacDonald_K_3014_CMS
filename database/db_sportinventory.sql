-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2020 at 10:54 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(25) NOT NULL,
  UNIQUE KEY `cat_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Jersey'),
(2, 'Equipment'),
(3, 'Electronics'),
(4, 'Shoes'),
(5, 'Hiking'),
(6, 'Kids'),
(7, 'Shirts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prod_img` varchar(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_num` varchar(30) NOT NULL,
  `prod_price` varchar(10) NOT NULL,
  UNIQUE KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prod_id`, `prod_img`, `prod_name`, `prod_num`, `prod_price`) VALUES
(1, 'raptors-jersey.png', 'Raptors Jersey', 'Item #11188888', '$49.99'),
(2, 'james-jersey.png', 'Lebron James Jersey', 'Item #: 332706654', '$63.75'),
(3, 'leafs-jersey.png', 'Leafs Jersey', 'Item #: 333110819', '$99.97'),
(4, 'knights-jersey.jpg', 'Knights Jersey', 'Item #: 332453681', '$149.99'),
(5, 'equip-1.jpg', 'Scooter', 'Item #: 332784687', '$149.99'),
(6, 'equip-2.jpg', 'Sunday Bag', 'Item #: 331986648', '$34.99'),
(7, 'equip-3.jpg', 'Protective Gear', 'Item #: 332491665', '$19.99'),
(8, 'equip-4.jpg', 'Alpine Ski Boot', 'Item #: 332907172', '$101.97'),
(9, 'equip-5.jpg', '38L Day Pack', 'Item #: 332623458', '$199.99'),
(10, 'fitness-tracker.png', 'Fitness Tracker', 'Item #: 332163798', '$224.68'),
(11, 'headphones.png', 'Headphones', 'Item #: 333167161', '$399.99'),
(12, 'rangefinder.png', 'Rangefinder', 'Item #: 332391344', '$449.99'),
(13, 'running-watch.png', 'Running Watch', 'Item #: 332235918.', '$199.99'),
(14, 'spartan-trainer.png', 'Spartan Trainer Watch', 'Item #: 332235982', '$199.99'),
(15, 'flames-jersey.jpg', 'Calgary Flames Jersey', 'Item #: 332395991 ', '$199.99'),
(16, 'shoe-1.jpg', 'Running Shoe Nike', 'Item #: 333002240', '$65.99'),
(17, 'shoe-2.jpg', 'Downshifter Shoe', 'Item #: 332838480', '$59.99'),
(18, 'shoe-3.jpg', 'Adidas Bounce', 'Item #: 332538280', '$66.97'),
(19, 'shoe-4.png', 'Questar Ride', 'Item #: 332697935', '$54.97'),
(20, 'shoe-5.png', 'Reebok Flashfilm', 'Item #: 332756750', '$65.97'),
(21, 'hiking-1.jpg', 'Icebreaker Socks', 'Item #: 332965644', '$29.99'),
(22, 'hiking-2.png', 'Trekking Poles', 'Item #: 332620013', '$39.99'),
(23, 'hiking-3.jpg', 'Rubber Tips', 'Item #: 331496550', '$2.99'),
(24, 'hiking-4.png', 'Powder Baskets', 'Item #: 332128733', '$4.99'),
(25, 'hiking-5.jpg', 'SmartWool Crew Socks', 'Item #: 333138767', '$24.99'),
(26, 'kids-1.png', 'Helly Hansen Gloves', 'Item #: 332741829', '$64.99'),
(27, 'kids-2.png', 'Ripzone Socks Kids', 'Item #: 332620782', '$14.99'),
(28, 'kids-3.png', 'Kombi Kids Brave Socks', 'Item #: 332784548', '$16.99'),
(29, 'kids-4.jpg', 'UA Billboard Beanie', 'Item #: 332610718', '$24.99'),
(30, 'kids-5.png', 'UA Boys Blitzing Stretch Hat', 'Item #: 332578616', '$24.99'),
(31, 'shirts-1.png', 'Jorden Men\'s Alpha Dry Long Sleeve', 'Item #: 332621150', '$36.00'),
(32, 'shirts-2.png', 'Nike Men\'s Dri-FIT Swish', 'Item #: 332930246', '$25.97'),
(33, 'shirts-3.png', 'Vans Girls Scotch Hop Long Sleeve', 'Item #: 333089716', '$34.99'),
(34, 'shirts-4.png', 'adidas Velvet Long Crew Top', 'Item #: 332805753', '$49.97'),
(35, 'shirts-5.jpg', 'UA Girls Short Sleeve', 'Item #: 332805826', '$14.97');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

DROP TABLE IF EXISTS `tbl_product_category`;
CREATE TABLE IF NOT EXISTS `tbl_product_category` (
  `pc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prod_id` mediumint(9) NOT NULL,
  `category_id` mediumint(9) NOT NULL,
  UNIQUE KEY `pc_id` (`pc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`pc_id`, `prod_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 3),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 1),
(16, 16, 4),
(17, 17, 4),
(18, 18, 4),
(19, 19, 4),
(20, 20, 4),
(21, 21, 5),
(22, 22, 5),
(23, 23, 5),
(24, 24, 5),
(25, 25, 5),
(26, 26, 6),
(27, 27, 6),
(28, 28, 6),
(29, 29, 6),
(30, 30, 6),
(31, 31, 7),
(32, 32, 7),
(33, 33, 7),
(34, 34, 7),
(35, 35, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(15) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(15) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'admin', 'newadmin', 'admin@gmail.ca', 'new');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
