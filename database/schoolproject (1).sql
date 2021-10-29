-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2021 at 11:46 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Full_name` varchar(155) NOT NULL,
  `username` varchar(155) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profilepicture` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Full_name`, `username`, `email`, `password`, `profilepicture`) VALUES
(1, 'admin', 'admin', 'admin@mail.com ', 'd41d8cd98f00b204e9800998ecf8427e', 'images/profile-pic/thump_1633276542.jpg'),
(2, 'Nelson', 'O.', 'onnellsson@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sellers_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile_number` text NOT NULL,
  `message` text NOT NULL,
  `crt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `sellers_id`, `prod_id`, `name`, `email`, `mobile_number`, `message`, `crt_date`) VALUES
(1, 4, 1, 'name one O.', 'test@mail.com', '0102-528-446', 'message', '2021-10-10 12:19:12'),
(2, 6, 2, 'Nelson O.', 'onnellsson@gmail.com', '0799-097-488', 'this is an enquiry message', '2021-10-10 12:20:24'),
(3, 7, 3, 'pumpkin buyer', 'pum@mail.com', '0111-789-987', 'i want this pumpkins', '2021-10-11 13:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `csubject` varchar(255) NOT NULL,
  `cmessage` text NOT NULL,
  `crt_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `cname`, `email`, `csubject`, `cmessage`, `crt_date`) VALUES
(1, 'name one O.', 'test@mail.com', 'test', 'hellooo', '2021-10-12 21:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `homepageimg`
--

DROP TABLE IF EXISTS `homepageimg`;
CREATE TABLE IF NOT EXISTS `homepageimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `crt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepageimg`
--

INSERT INTO `homepageimg` (`id`, `img`, `crt_date`) VALUES
(1, 'images/homepage/thump_1633950011.jpg', '2021-10-11 11:00:12'),
(2, 'images/homepage/thump_1633951886.jpg', '2021-10-11 11:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ucode` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `catnameid` int(11) NOT NULL,
  `subcatname` varchar(255) NOT NULL,
  `pprice` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `pdesc` text NOT NULL,
  `pimg` text NOT NULL,
  `prel` text NOT NULL,
  `product_info_question` text NOT NULL,
  `product_info_answer` text NOT NULL,
  `crdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ucode`, `pname`, `catnameid`, `subcatname`, `pprice`, `discount`, `pdesc`, `pimg`, `prel`, `product_info_question`, `product_info_answer`, `crdate`) VALUES
(1, 4, 'bean seeds', 2, '4', 110, 10, 'beans from kisumu', 'images/products/thump_1633591817.jpg', 'images/products/related/images/0betty-subrizi-3OqOUrJBgZU-unsplash.jpg,images/products/related/images/1monkgogi-samson-C0ba0-z1ZoI-unsplash.jpg,images/products/related/images/2v2osk-c9OfrVeD_tQ-unsplash.jpg,images/products/related/images/3tanushree-rao--OCfbcUtpHw-unsplash.jpg', '', '', '2021-10-07 10:34:48'),
(2, 6, 'rice', 1, '5', 70, 40, '<p>rice from mwea tebere irrigation scheme</p>\r\n', 'admin/images/products/thump_1633796959.jpg', 'admin/images/products/related_images/0IMG_20210812_125311_932.jpg,admin/images/products/related_images/1IMG_20210812_125315_535.jpg,admin/images/products/related_images/2IMG_20210812_125317_168.jpg', '1 sack,units,location', 'Ksh 6000,KG,Mwea Teberre', '2021-10-09 19:29:20'),
(3, 7, 'pumpkin', 4, '7', 70, 25, 'sweet pumpkins from Baringo', 'images/products/thump_1633958027.jpg', 'images/products/related_images/0keenan-sultanik-oxXUePN3u4Q-unsplash.jpg,images/products/related_images/1sebastien-lapointe-ZDl-ts1Eq_8-unsplash.jpg,images/products/related_images/2marius-ciocirlan-T9pdHqCsyoQ-unsplash.jpg', '1 sack,from,delivery', 'Kshs 1000,Bura galole irrigation scheme,door to door', '2021-10-11 16:13:49'),
(4, 7, 'millet', 1, '10', 100, 4, 'Fresh from the farm cabbage... order, i do deliver market produce at a real time market price.\r\nfor delivery within kabete call... from wangige market.\r\nnote: price subject to change with prevailing market price.', 'images/products/thump_1633961840.jpg', 'images/products/related_images/0little-millet-500x500.jpg,images/products/related_images/2oie_292731fyzEKFQL.jpg', 'from', 'uasin gishu', '2021-10-11 17:17:20'),
(5, 6, 'sorghum', 1, '9', 100, 9, 'sweet sweet sorghum from kitale', 'images/products/thump_1633962130.jfif', 'images/products/related_images/0little-millet-500x500.jpg,images/products/related_images/2oie_292731fyzEKFQL.jpg', '1 sack', '800', '2021-10-11 17:22:10'),
(6, 6, 'corn maize', 1, '8', 100, 10, 'maize from  western', 'images/products/thump_1633962477.jpg', 'images/products/related_images/038337770-closeup-of-maize-grains-background.jpg,images/products/related_images/1depositphotos_3131267-stock-photo-maize-grains.jpg', '1 sack', 'kshs 1340', '2021-10-11 17:27:57'),
(7, 5, 'peanuts', 2, '13', 100, 9, 'njugu from busia', 'images/products/thump_1633962923.jfif', 'images/products/related_images/0eating-nuts-adds-up-to-longer-life-722x406.jpg', '', '', '2021-10-11 17:35:23'),
(8, 3, 'peas', 2, '4', 250, 2, 'high quality peas from nanyuki', 'images/products/thump_1633963073.jpg', 'images/products/related_images/0green-peas-thumb.jpg', '', '', '2021-10-11 17:37:53'),
(9, 4, 'eggs', 3, '16', 250, 3, 'kienyeji eggs ', 'images/products/thump_1633963454.jpg', 'images/products/related_images/0natalie-rhea-vZUTCqLYR7g-unsplash.jpg', '', '', '2021-10-11 17:44:14'),
(10, 3, 'beef steak', 3, '15', 30000, 20, 'cows from  Lokichogio', 'images/products/thump_1633963712.jpg', 'images/products/related_images/0ribeye-steak-beef-cow-meat.jpg', '', '', '2021-10-11 17:48:32'),
(11, 4, 'cow milk', 3, '14', 100, 4, 'fresh milk', 'images/products/thump_1633963843.jpg', 'images/products/related_images/061Ecd-MO10L._AC_SL1000_.jpg', '', '', '2021-10-11 17:50:43'),
(12, 4, 'chicken', 3, '15', 1000, 4, 'broilers', 'images/products/thump_1633964012.jpg', 'images/products/related_images/0wolfgang-hasselmann-uMfSHeycnYQ-unsplash.jpg', '', '', '2021-10-11 17:53:32'),
(13, 7, 'Kales', 4, '6', 100, 9, 'kales', 'images/products/thump_1633964194.jpg', 'images/products/related_images/0kales-farming-in-kenya.jpeg', '', '', '2021-10-11 17:56:34'),
(14, 3, 'carrots', 4, '7', 250, 4, 'carrots from Aero', 'images/products/thump_1633964279.jpg', 'images/products/related_images/020180929_BLP506.jpg', '', '', '2021-10-11 17:57:59'),
(15, 4, 'cabbage', 4, '7', 100, 9, 'cabbage.....', 'images/products/thump_1633964354.jfif', '', '', '', '2021-10-11 17:59:14'),
(16, 3, 'pigweed', 4, '6', 100, 4, 'terere', 'images/products/thump_1633964428.jfif', '', '', '', '2021-10-11 18:00:28'),
(17, 3, 'mango', 5, '20', 700, 10, 'mango from ukambani', 'images/products/thump_1633964685.jfif', '', '', '', '2021-10-11 18:04:45'),
(18, 4, 'oranges', 5, '18', 1300, 35, 'oranges from ukambani', 'images/products/thump_1633964804.jfif', '', '', '', '2021-10-11 18:06:44'),
(19, 4, 'passion fruit', 5, '17', 1000, 0, 'passionns', 'images/products/thump_1633964906.jfif', '', '', '', '2021-10-11 18:08:26'),
(20, 4, 'bananas', 5, '20', 450, 2, 'bananas from kisii', 'images/products/thump_1633965023.jpg', 'images/products/related_images/0all-about-bananas-nutrition-facts-health-benefits-recipes-and-more-rm-722x406.jpg', '', '', '2021-10-11 18:10:23'),
(21, 4, 'cowpeas', 2, '', 100, 3, 'cowpeas', 'images/products/thump_1633965109.jpg', 'images/products/related_images/0dreamstime_xl_109692018-scaled.jpg', '', '', '2021-10-11 18:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(200) NOT NULL,
  `cat_img` text NOT NULL,
  `cat_cdt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `cat_name`, `cat_img`, `cat_cdt`) VALUES
(1, 'Cereals', 'images/product-categories/thump_1633324383.jpg', '2021-10-04 08:13:03'),
(2, 'pulses/legumes', 'images/product-categories/thump_1633325930.jpg', '2021-10-04 08:38:50'),
(3, 'animal prodcuts', 'images/product-categories/thump_1633959962.jpg', '2021-10-04 09:33:49'),
(4, 'Vegetables', 'images/product-categories/thump_1633957637.jpg', '2021-10-11 16:07:17'),
(5, 'fruits', 'images/product-categories/thump_1633959046.jpg', '2021-10-11 16:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `crt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `review`, `name`, `email`, `product`, `seller_id`, `crt_date`) VALUES
(1, 4, '', 'Buyer', 'buyer@mail.com', 'rice', 6, '2021-10-11 07:05:27'),
(2, 3, '', 'name one O.', 'test@mail.com', 'rice', 6, '2021-10-11 09:56:32'),
(3, 4, '', 'test two', 'two@mail.com', 'rice', 6, '2021-10-11 10:05:17'),
(4, 3, '', 'reviewr', 'qwer@mail.com', 'pumpkin', 7, '2021-10-11 13:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slimg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slimg`) VALUES
(1, 'images/slider/thump_1633601240.jpg'),
(2, 'images/slider/thump_1633601310.jpg'),
(3, 'images/slider/thump_1633601329.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

DROP TABLE IF EXISTS `sub_cat`;
CREATE TABLE IF NOT EXISTS `sub_cat` (
  `subcatid` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` varchar(100) NOT NULL,
  `sub_cat_name` varchar(200) NOT NULL,
  `crt-date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subcatid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`subcatid`, `cat_id`, `sub_cat_name`, `crt-date`) VALUES
(6, '4', 'greens', '2021-10-11 16:09:18'),
(5, '1', 'rice', '2021-10-04 15:02:03'),
(4, '2', 'peas', '2021-10-04 12:30:14'),
(7, '4', 'non greens', '2021-10-11 16:09:36'),
(8, '1', 'maize', '2021-10-11 16:47:06'),
(9, '1', 'sorghum', '2021-10-11 16:47:19'),
(10, '1', 'millet', '2021-10-11 16:47:31'),
(11, '1', 'wheat', '2021-10-11 16:47:52'),
(12, '2', 'beans', '2021-10-11 16:53:38'),
(13, '2', 'nuts', '2021-10-11 16:54:22'),
(14, '3', 'dairy', '2021-10-11 16:58:08'),
(15, '3', 'meat', '2021-10-11 16:58:24'),
(16, '3', 'poultry', '2021-10-11 16:58:41'),
(17, '5', 'berries', '2021-10-11 17:05:21'),
(18, '5', 'citrus', '2021-10-11 17:05:37'),
(19, '5', 'melons', '2021-10-11 17:05:46'),
(20, '5', 'tropical', '2021-10-11 17:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone_number` int(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `profpic` text NOT NULL,
  `county` varchar(200) NOT NULL,
  `crt_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `uname`, `user_email`, `user_phone_number`, `upassword`, `profpic`, `county`, `crt_date`) VALUES
(6, 'Vic', 'O.', 'vic', 'vic@mail.com', 712345678, 'password', 'admin/images/users-profile-pic/thump_1633793632.jpg', 'kisumu', '2021-10-08 19:39:14'),
(3, 'user', 'two', 'usertwo', 'usertwo@mail.com', 123456638, 'password', 'admin/images/users-profile-pic/thump_1633842497.jpg', 'Uasin Gishu', '2021-10-03 12:28:59'),
(4, 'Name 1', 'name 2', 'username1', 'user@mail.com', 1234567890, 'password', '', '', '2021-10-03 12:32:29'),
(5, 'user', 'one', 'userone', 'userone@mail.com', 123498765, 'password', 'images/users-profile-pic/thump_1633290355.jpg', '', '2021-10-03 22:45:55'),
(7, 'Erick', 'Kioko', 'kioko', 'erik@mail.com', 712345678, 'password', 'admin/images/users-profile-pic/thump_1633957484.jpg', 'Uasin Gishu', '2021-10-11 16:03:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
