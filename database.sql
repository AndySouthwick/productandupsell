-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 10, 2016 at 04:10 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `music_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_products`
--

CREATE TABLE `my_products` (
  `unique_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `upsell_data` varchar(255) NOT NULL,
  `product_img` text NOT NULL,
  `product_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_products`
--

INSERT INTO `my_products` (`unique_id`, `product_name`, `product_price`, `product_desc`, `upsell_data`, `product_img`, `product_category`) VALUES
(1, 'Andy Southwick Closer', 15, 'The greatest song in the world', '2', '', 'Power Pop'),
(2, 'Michael Jackson Thriller', 12, 'Thriller is awesome', '3', '', 'pop'),
(3, 'Tenacious D Wonderboy', 15, 'the best cd ever', '2', '', 'Alternative');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(140) NOT NULL,
  `p_word` varchar(140) NOT NULL,
  `first_name` varchar(140) NOT NULL,
  `last_name` varchar(140) NOT NULL,
  `phone` varchar(140) NOT NULL,
  `address_1` varchar(140) NOT NULL,
  `address_2` varchar(140) DEFAULT NULL,
  `city` varchar(140) NOT NULL,
  `state` varchar(140) NOT NULL,
  `zip` varchar(140) NOT NULL,
  `cc` int(20) NOT NULL,
  `expires` varchar(4) NOT NULL,
  `cvc` int(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `p_word`, `first_name`, `last_name`, `phone`, `address_1`, `address_2`, `city`, `state`, `zip`, `cc`, `expires`, `cvc`, `timestamp`) VALUES
(14, 'asouthwick01@gmail.com', '98ff60e48b3326bf489e716fdfb58e46885f9559', 'Andrew', 'Southwick', '8013766086', '7292 Geralee Ln', 'NULL', 'West Jordan', 'UT', '84084', 555, '555', 555, '2016-10-25 18:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `unique_id` int(140) NOT NULL,
  `u_id` int(140) NOT NULL,
  `product_key` int(140) NOT NULL,
  `upsell_purchased` varchar(3) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`unique_id`, `u_id`, `product_key`, `upsell_purchased`, `Time_Stamp`) VALUES
(45, 14, 2, 'yes', '2016-10-25 21:46:44'),
(46, 14, 2, 'yes', '2016-10-25 21:46:44'),
(47, 14, 2, 'yes', '2016-10-25 21:48:44'),
(48, 14, 2, 'yes', '2016-10-25 21:48:44'),
(49, 14, 1, 'yes', '2016-10-25 23:01:03'),
(50, 14, 2, 'yes', '2016-10-26 17:58:19'),
(51, 14, 1, 'yes', '2016-10-26 18:02:22'),
(52, 14, 2, 'yes', '2016-10-26 18:23:45'),
(53, 14, 1, 'yes', '2016-10-26 18:46:24'),
(54, 14, 1, 'yes', '2016-10-26 18:59:32'),
(55, 14, 1, 'yes', '2016-10-26 19:02:39'),
(56, 14, 1, 'yes', '2016-10-26 19:03:35'),
(57, 14, 1, 'yes', '2016-10-26 19:07:22'),
(58, 14, 1, 'yes', '2016-10-26 19:13:00'),
(59, 14, 1, 'yes', '2016-10-26 19:13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_products`
--
ALTER TABLE `my_products`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_products`
--
ALTER TABLE `my_products`
  MODIFY `unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `unique_id` int(140) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;