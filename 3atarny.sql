-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 01:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3atarny`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `First_name` varchar(255) DEFAULT NULL,
  `Last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `First_name`, `Last_name`, `email`, `password`) VALUES
(2, 'Mostafa', 'Mohamed', 'halaby@test.com', '$2y$10$0bXuOBYTcx9Ki5zsBZ4pn.yZJ7SmIrdQLzmfid.Z4Ezke3Elk5nJ6');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_num` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `credit_card_number` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `order_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_num`, `first_name`, `last_name`, `credit_card_number`, `cvv`, `order_total`) VALUES
(1, 'moz', 'fash5', '8892738908365419', '332', 540.00),
(2, 'alloo', 'sdasd', '8892738908365419', '556', 540.00),
(3, 'zoz', 'the big ', '8892738908365419', '002', 389.00),
(4, 'biggie ', '2 pac', '8892738908365419', '116', 389.00),
(5, 'Tata', 'bom', '8892738908365419', '776', 718.00),
(6, 'smell', 'good', '8892738908365419', '992', 390.00),
(7, 'ohh', 'wow', '8892738908365419', '654', 390.00),
(8, 'ss', 'sss', '8892738908365419', '002', 390.00),
(9, 'test', 'remove1', '8892738908365419', '343', 390.00),
(10, 'remove', 'test2', '8892738908365419', '556', 540.00),
(11, 'test', 'remove3', '8892738908365419', '889', 540.00),
(12, 'test', 'remove4', '8892738908365419', '223', 540.00),
(13, 'Mostafa ', 'El-Halaby', '1289037829463986', '224', 330.00),
(14, 'ydfg', 'tyg', '1234588822222222', '223', 329.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`) VALUES
(1, 'Winter Set', 270.00),
(2, 'Side Effect', 329.00),
(3, 'Parfums De Marley', 270.00),
(4, 'Light Blue Intense', 60.00),
(5, 'Arabians Tonka', 160.00),
(6, 'Imagination', 223.00),
(7, 'YSL', 100.00),
(8, 'Xerjoff', 390.00),
(9, 'Jasmine Musk', 270.00),
(10, 'Rose Musk', 329.00),
(11, 'Bacarat 540', 600.00),
(12, 'Dont Be Shy', 275.00),
(13, 'Gucci Bloom', 160.00),
(14, 'Delina', 223.00),
(15, 'Mon Paris', 136.00),
(16, 'Black Opium', 142.00);

-- --------------------------------------------------------

--
-- Table structure for table `productsaddtest`
--

CREATE TABLE `productsaddtest` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productsaddtest`
--

INSERT INTO `productsaddtest` (`product_id`, `product_name`, `description`, `price`, `image_path`) VALUES
(1, 'Winter Set', 'These 3 fragrances are sweet, warm, and classy scents which are perfect for winter nights.', 270.00, 'images/fragranceset.webp'),
(2, 'Side Effect', 'Side Effect is an awesome rum, vanilla, and tobacco scent which is perfect for both sexes.', 329.00, 'images/initio.jpg'),
(3, 'Parfums De Marley', 'Parfums de Marly is an Amber Floral fragrance for women and men.', 270.00, 'images/pdm.jpg'),
(4, 'Light Blue Intense', 'It\'s an earthy Floral summer fragrance, perfect for a beach walk on a hot day.', 60.00, 'images/Light.jpg'),
(5, 'Arabians Tonka', 'Arabians Tonka by Montale is an Amber Woody fragrance for women and men.', 160.00, 'images/montale-paris-montale-arabians-tonka-eau-de-parfum__76811.jpg'),
(6, 'Imagination', 'Louis Vuitton is a Citrus Aromatic fragrance for men.', 223.00, 'images/lv.jpg'),
(7, 'YSL', 'Yves Saint Laurent is a Woody Aromatic fragrance for men.', 100.00, 'images/ysljpg.jpg'),
(8, 'Xerjoff', 'It\'s a unique Woody Floral Musk fragrance for women and men.', 390.00, 'images/xerjoff-opera-eau_de_parfum-100ml-flacon.png'),
(9, 'Jasmine Musk', 'It\'s an Amber Floral fragrance for women made from natural earth ingredients.', 270.00, 'images/women_.webp'),
(10, 'Rose Musk', 'Intense Roses Musk by Montale is a Floral fragrance for women.', 329.00, 'images/51ob-fcgtpl.jpg'),
(11, 'Bacarat 540', 'Baccarat Rouge 540 by Maison Francis Kurkdjian is an Amber Floral fragrance.', 600.00, 'images/67720_img-6868-maison_francis_kurkdjian-baccarat_rouge_540_eau_de_parfum_720.webp'),
(12, 'Dont Be Shy', 'Love Dont Be Shy by By Kilian is an Amber fragrance for women.', 275.00, 'images/kilian.jpg'),
(13, 'Gucci Bloom', 'Gucci Bloom by Gucci is a Floral fragrance for women. Gucci Bloom was launched in 2017.', 160.00, 'images/guccibloom.jpg'),
(14, 'Delina', 'Delina by Parfums de Marly is a Floral fragrance for women. Delina was launched in 2017 by Quentin Bisch.', 223.00, 'images/1699477052-parfums-de-marly-delina-654bf6216e62a.png'),
(15, 'Mon Paris', 'Mon Paris by Yves Saint Laurent is a Chypre Fruity fragrance for women. Mon Paris was launched in 2016.', 400.00, 'images/1mon paris.png');

-- --------------------------------------------------------

--
-- Table structure for table `productstest`
--

CREATE TABLE `productstest` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productstest`
--

INSERT INTO `productstest` (`product_id`, `product_name`, `price`) VALUES
(1, 'Winter Set', 270.00),
(2, 'Side Effect', 329.00),
(3, 'Parfums De Marley', 270.00),
(4, 'Light Blue Intense', 60.00),
(5, 'Arabians Tonka', 160.00),
(6, 'Imagination', 223.00),
(7, 'YSL', 100.00),
(8, 'Xerjoff', 390.00),
(9, 'Jasmine Musk', 270.00),
(10, 'Rose Musk', 329.00),
(11, 'Bacarat 540', 600.00),
(12, 'Dont Be Shy', 275.00),
(13, 'Gucci Bloom', 160.00),
(14, 'Delina', 223.00),
(15, 'Mon Paris', 136.00),
(16, 'Black Opium', 142.00),
(17, 'manga', 113.00);

-- --------------------------------------------------------

--
-- Table structure for table `products_men_test`
--

CREATE TABLE `products_men_test` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_men_test`
--

INSERT INTO `products_men_test` (`product_id`, `product_name`, `description`, `price`, `image_path`) VALUES
(1, 'Winter Set', 'These 3 fragrances are sweet, warm, and classy scents which are perfect for winter nights.', 270.00, 'images/fragranceset.webp'),
(2, 'Side Effect', 'Side Effect is an awesome rum, vanilla, and tobacco scent which is perfect for both sexes.', 329.00, 'images/initio.jpg'),
(3, 'Parfums De Marley', 'Parfums de Marly is an Amber Floral fragrance for women and men.', 270.00, 'images/pdm.jpg'),
(4, 'Light Blue Intense', 'It\'s an earthy Floral summer fragrance, perfect for a beach walk on a hot day.', 60.00, 'images/Light.jpg'),
(5, 'Arabians Tonka', 'Arabians Tonka by Montale is an Amber Woody fragrance for women and men.', 160.00, 'images/montale-paris-montale-arabians-tonka-eau-de-parfum__76811.jpg'),
(6, 'Imagination', 'Louis Vuitton is a Citrus Aromatic fragrance for men.', 223.00, 'images/lv.jpg'),
(7, 'YSL', 'Yves Saint Laurent is a Woody Aromatic fragrance for men.', 100.00, 'images/ysljpg.jpg'),
(8, 'Xerjoff', 'It\'s a unique Woody Floral Musk fragrance for women and men.', 390.00, 'images/xerjoff-opera-eau_de_parfum-100ml-flacon.png');

-- --------------------------------------------------------

--
-- Table structure for table `products_women_test`
--

CREATE TABLE `products_women_test` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_women_test`
--

INSERT INTO `products_women_test` (`product_id`, `product_name`, `description`, `price`, `image_path`) VALUES
(1, 'Jasmine Musk', 'It\'s an Amber Floral fragrance for women made from natural earth ingredients.', 270.00, 'images/women_.webp'),
(2, 'Rose Musk', 'Intense Roses Musk by Montale is a Floral fragrance for women.', 329.00, 'images/51ob-fcgtpl.jpg'),
(3, 'Bacarat 540', 'Baccarat Rouge 540 by Maison Francis Kurkdjian is an Amber Floral fragrance.', 600.00, 'images/67720_img-6868-maison_francis_kurkdjian-baccarat_rouge_540_eau_de_parfum_720.webp'),
(4, 'Dont Be Shy', 'Love Dont Be Shy by By Kilian is an Amber fragrance for women.', 275.00, 'images/kilian.jpg'),
(5, 'Gucci Bloom', 'Gucci Bloom by Gucci is a Floral fragrance for women. Gucci Bloom was launched in 2017.', 160.00, 'images/guccibloom.jpg'),
(6, 'Delina', 'Delina by Parfums de Marly is a Floral fragrance for women. Delina was launched in 2017 by Quentin Bisch.', 223.00, 'images/1699477052-parfums-de-marly-delina-654bf6216e62a.png'),
(7, 'Mon Paris', 'Mon Paris by Yves Saint Laurent is a Chypre Fruity fragrance for women. Mon Paris was launched in 2016.', 136.00, 'images/1mon paris.png'),
(8, 'Black Opium', 'Black Opium by Yves Saint Laurent is an Amber Vanilla fragrance for women. Black Opium was launched in 2014.', 142.00, 'images/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `First_name` varchar(255) DEFAULT NULL,
  `Last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `First_name`, `Last_name`, `email`, `password`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'securepassword'),
(2, 'Mostafa', 'El-Halaby', '20halaby03@gmail.com', '$2y$10$xjk89YbJoJwlakpA7djOVeSRsti8nPVTJow4A1jHWJfb6.SW9etB2'),
(4, 'ahmed', 'wakil', 'cars@test.com', '$2y$10$yiy5wcIP/9erRhV9YCEEQ.TK1IbJA/D.qeckz6jZ8O4mBN14OLDcC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_num`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsaddtest`
--
ALTER TABLE `productsaddtest`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `productstest`
--
ALTER TABLE `productstest`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_men_test`
--
ALTER TABLE `products_men_test`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_women_test`
--
ALTER TABLE `products_women_test`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `productsaddtest`
--
ALTER TABLE `productsaddtest`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `productstest`
--
ALTER TABLE `productstest`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_men_test`
--
ALTER TABLE `products_men_test`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products_women_test`
--
ALTER TABLE `products_women_test`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
