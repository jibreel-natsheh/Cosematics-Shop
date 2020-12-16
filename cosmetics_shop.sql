-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2020 at 08:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetics_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(3, 'abc', 1),
(6, 'قطاع الصناعة', 9),
(8, 'y', 4),
(11, 'abc', 3),
(13, 'e', 3),
(14, 'e', 3),
(15, 'ahmad', 5),
(16, 'قطاع الصناعة', 5),
(17, 'Computer', 3),
(18, 'test', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products_spec`
--

CREATE TABLE `products_spec` (
  `product_id` int(11) NOT NULL,
  `spec` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_spec`
--

INSERT INTO `products_spec` (`product_id`, `spec`) VALUES
(16, '33'),
(16, '5'),
(16, '4'),
(17, '2'),
(17, '1'),
(17, '4'),
(18, '2'),
(18, '5'),
(18, '7');

-- --------------------------------------------------------

--
-- Table structure for table `sales_hist`
--

CREATE TABLE `sales_hist` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_hist`
--

INSERT INTO `sales_hist` (`product_id`, `quantity`, `id`, `date_time`) VALUES
(3, 7, 1, '2020-12-15 21:51:33'),
(11, 80, 2, '2020-12-15 21:51:38'),
(13, 66, 3, '2020-12-15 22:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('abc', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_spec`
--
ALTER TABLE `products_spec`
  ADD KEY `product_fk` (`product_id`);

--
-- Indexes for table `sales_hist`
--
ALTER TABLE `sales_hist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_fk` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales_hist`
--
ALTER TABLE `sales_hist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_spec`
--
ALTER TABLE `products_spec`
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_hist`
--
ALTER TABLE `sales_hist`
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
