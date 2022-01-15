-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 04:15 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Áo Nam', 0),
(2, 'Quần Nam', 0),
(3, 'Giày Nam', 0),
(4, 'Phụ Kiện', 0),
(6, 'Áo Thun', 1),
(7, 'Áo Vest', 1),
(8, 'Áo Khoác', 1),
(9, 'Quần Tây', 2),
(10, 'Quần Jean', 2),
(11, 'Quần Kaki', 2),
(12, 'Quần Short', 2),
(13, 'Giày Thể Thao', 3),
(14, 'Giày Sandal', 3),
(15, 'Giầy Tây', 3),
(16, 'Thắt Lưng', 4),
(17, 'Cà Vát, Nơ', 4),
(18, 'Nón', 4),
(19, 'Ví', 4),
(22, 'Quà', 0),
(23, 'Rubik', 22);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ordercode` int(10) UNSIGNED NOT NULL,
  `id` int(10) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ordercode`, `id`, `amount`) VALUES
(0, 2, 1),
(1, 0, 1),
(1, 1, 1),
(2, 1, 1),
(3, 0, 1),
(4, 0, 1),
(5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_management`
--

CREATE TABLE `order_management` (
  `ordercode` int(10) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `address` text NOT NULL,
  `money` int(10) NOT NULL,
  `state` set('Chưa liên lạc','Chưa giao','Đã giao','') NOT NULL DEFAULT 'Chưa liên lạc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_management`
--

INSERT INTO `order_management` (`ordercode`, `order_date`, `name`, `username`, `phonenumber`, `address`, `money`, `state`) VALUES
(0, '2018-04-22', 'thành công', 'huy', 113, 'An dương vương', 360000, 'Chưa liên lạc'),
(1, '2018-04-22', 'thất bại', 'huy', 113, 'An dương vương', 650000, 'Chưa liên lạc'),
(2, '2018-04-22', 'quá tuyệt vời', 'huy', 113114, 'An dương vương', 350000, 'Chưa liên lạc'),
(3, '2018-04-22', '123123', '', 113, 'An dương vương', 300000, 'Chưa liên lạc'),
(4, '2018-04-22', 'w', '', 113, 'An dương vương', 300000, 'Chưa liên lạc'),
(5, '2018-04-22', 'yeahsad', 'huy', 113, 'An dương vương', 300000, 'Chưa liên lạc');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `sizes` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `address`, `phonenumber`, `created_at`) VALUES
(1, '', 'huy123', '$2y$10$muaCtUrx7evb2K98PQCNO.ENsSlbA32mWPbbv3mvW8nvEtIUiHrHO', '', 113, '2018-04-16 00:06:01'),
(2, '', 'huy', '$2y$10$uOQ.l30OxZo1iGafhsCRA.pulyaF7FabgzYxuX8lpI.6VAY88se56', 'An dương vương', 113, '2018-04-20 00:36:25'),
(3, '', 'huy1', '$2y$10$cutm0no8ZR19bRIBMfInDedioDxbMgrdyMhQV5MV0Qb9UJGsu25pG', '', 0, '2018-04-20 13:01:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
