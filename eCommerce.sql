-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2023 at 04:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eCommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `order_details` text DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total`, `shipping_name`, `shipping_address`, `payment_method`, `order_details`, `order_date`) VALUES
(1, 1, 20.00, 'T.s.v.n Pavansai', 'Venkayya Naidu Street', 'cash_on_delivery', 'Product: Delicious Pizza, Quantity: 1, Price: 20, Total: 20\n', '2023-11-06 19:07:26'),
(2, 1, 35.00, 'T.s.v.n Pavansai', 'Venkayya Naidu Street', 'cash_on_delivery', 'Product: Delicious Burger, Quantity: 1, Price: 15, Total: 15\nProduct: Delicious Pizza, Quantity: 1, Price: 20, Total: 20\n', '2023-11-06 19:14:19'),
(4, 1, 20.00, 'T.s.v.n Pavansai', 'Venkayya Naidu Street', 'cash_on_delivery', 'Product: Delicious Pizza, Quantity: 1, Price: 20, Total: 20\n', '2023-11-07 06:24:18'),
(5, 1, 40.00, 'T.s.v.n Pavansai', 'Venkayya Naidu Street', 'cash_on_delivery', 'Product: Delicious Pizza, Quantity: 2, Price: 20, Total: 40\n', '2023-11-07 06:26:28'),
(6, 1, 20.00, 'T.s.v.n Pavansai', 'Venkayya Naidu Street', 'cash_on_delivery', 'Product: Delicious Pizza, Quantity: 1, Price: 20, Total: 20\n', '2023-11-07 17:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Delicious Pizza', 20),
(2, 'Delicious Burger', 15),
(3, 'Delicious Pizza\r\n', 17),
(4, 'Delicious Pasta\r\n', 18),
(5, 'French Fries\r\n', 10),
(6, 'Delicious Pizza', 15),
(7, 'Tasty Burger\r\n', 12),
(8, 'Tasty Burger\r\n', 14),
(9, 'Delicious Pasta', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'sai', 't.s.v.n.pavansai26@gmail.com', '$2y$10$K97xG5CTE3Ex5x5OkCKLqu2Hh/kGSoQ1FAklcjp6FCXgIL3EsIgXK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
  ADD UNIQUE KEY `UNIQUE` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
