-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 03, 2023 at 02:19 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `no_ozone`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_city` int NOT NULL,
  `street` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `home` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `flat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `delivery_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `id_city`, `street`, `home`, `flat`, `delivery_comment`, `id_user`) VALUES
(1, 'Дом', 1, 'ыава', 'вавававв', 'ывавваа', '', 2),
(2, '1', 1, '12', '12', '2', '', 2),
(3, '1', 1, '12', '12', '12', '', 2),
(4, 'дом', 1, '12', '12', '2', '', 2),
(5, 'fff', 1, '12', '12', '2', '', 2),
(6, '1', 2, '12', '12', '2', '', 2),
(7, 'fff', 2, '12', '12', '12', '', 2),
(8, 'дом', 2, '12', '12', '12', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bank_card`
--

CREATE TABLE `bank_card` (
  `id` int NOT NULL,
  `number` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `validati_thru` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CVV` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_card`
--

INSERT INTO `bank_card` (`id`, `number`, `validati_thru`, `CVV`) VALUES
(1, '123', '123', 123),
(2, '1234123412341234', '02/21', 123),
(3, '1234567890', '12/23', 123),
(4, '1234567890', '12/23', 12333),
(5, '1234567890', '12/23', 123),
(6, '1234567890', '12/23', 123),
(7, '1234567890', '12/23', 123),
(8, '1234567890', '12/23', 456),
(9, '1234567890', '12/23', 456),
(10, '1234567890', '12/23', 123);

-- --------------------------------------------------------

--
-- Table structure for table `busket`
--

CREATE TABLE `busket` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `id_parent` int DEFAULT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `id_parent`, `name`) VALUES
(1, NULL, 'Сумки'),
(2, NULL, 'Сумки'),
(3, 1, 'Пастила'),
(4, 1, 'Пирожные'),
(5, NULL, 'Пирожные'),
(6, NULL, 'Сладости'),
(7, 2, 'пакет'),
(8, 4, 'Сумки'),
(9, NULL, '213'),
(10, NULL, 'yj'),
(11, 10, 'yj'),
(12, NULL, '123'),
(13, 12, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Москва'),
(2, 'Псков'),
(3, 'Санкт-Петербург'),
(4, 'Анапа'),
(5, 'Псков'),
(6, 'Санкт-Петербург'),
(7, 'Сочи'),
(8, 'Сочи'),
(9, 'Анапа'),
(10, 'Сочи');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inn` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imageFile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `inn`, `created_at`, `updated_at`, `created_by`, `imageFile`) VALUES
(1, '123', '123', '2023-01-30', '2023-01-30', '1', ''),
(2, '123', '123', '2023-01-30', '2023-01-30', '2', ''),
(3, '1', '1', '2023-01-30', '2023-01-30', '', 'test'),
(7, 'OpenPim', '12121231232312323', '2023-02-03', '2023-02-03', '2', 'tik-tok.png'),
(9, '121', '12121231232312323', '2023-02-03', '2023-02-03', '2', 'telegram.png'),
(10, 'аыимпав', '12333333', '2023-02-03', '2023-02-03', '2', 'vk.png'),
(11, 'OpenPim', '12121231232312323', '2023-02-03', '2023-02-03', '2', 'instagram (1).png'),
(12, 'аыимпав', '12121231232312323', '2023-02-03', '2023-02-03', '2', '1284581772.jpg'),
(13, 'аыимпав', '12121231232312323', '2023-02-03', '2023-02-03', '2', '1284581772.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `puth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `puth`) VALUES
(1, '123', ''),
(2, '1', '1'),
(3, 'd12759-1590-720003-0.jpg', 'd12759-1590-720003-0.jpg'),
(4, 'tik-tok.png', 'tik-tok.png'),
(5, 'tiktok.png', 'tiktok.png'),
(6, '3_3.png', '3_3.png'),
(8, 'telegram.png', 'telegram.png'),
(9, 'search (1).png', 'search (1).png'),
(10, 'vk.png', 'vk.png'),
(11, 'facebook (1).png', 'facebook (1).png'),
(12, 'telegram.png', 'telegram.png'),
(13, 'instagram (1).png', 'instagram (1).png'),
(14, 'vk.png', 'vk.png'),
(15, '1284581772.jpg', '1284581772.jpg'),
(16, '1284581772.jpg', '1284581772.jpg'),
(17, 'telegram.png', 'telegram.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `price_sale` float NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `characrteristic` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mode_of_application` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_company` int NOT NULL,
  `rating` float NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_category` int NOT NULL,
  `imageFile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `price_sale`, `flag`, `description`, `characrteristic`, `mode_of_application`, `id_company`, `rating`, `created_at`, `updated_at`, `created_by`, `id_category`, `imageFile`) VALUES
(1, 'dqedqewdw', 1212, 1212, 1, 'trbhsrth', '1212', '121221', 3, 12, '2023-02-03', '2023-02-03', '3', 1, '3_3.png'),
(2, 'dqedqewdw', 1212, 1212, 1, 'яаепивяуа', '1212', '121221', 2, 12, '2023-02-03', '2023-02-03', '2', 2, 'search (1).png'),
(3, 'dqedqewdw', 1212, 1212, 1, 'иявуиваи', '1212', '121221', 2, 12, '2023-02-03', '2023-02-03', '2', 3, 'facebook (1).png'),
(4, 'dqedqewdw', 1212, 1212, 1, '\\wsrba', '1212', '121221', 3, 12, '2023-02-03', '2023-02-03', '3', 5, 'vk.png'),
(5, 'dqedqewdw', 1212, 1212, 1, 'wegvfrewvf', '1212', '121221', 2, 12, '2023-02-03', '2023-02-03', '3', 7, 'telegram.png');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `advantage` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `disadvantage` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` float NOT NULL,
  `imageFile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `advantage`, `disadvantage`, `description`, `rating`, `imageFile`, `created_at`, `updated_at`, `created_by`, `id_user`, `id_product`) VALUES
(1, 'яывкмпак', 'ваимпява', 'вяаимва', 12, 'telegram.png', '2023-02-03', '2023-02-03', '3', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_city` int NOT NULL,
  `valuta` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imageFile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_bank_card` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `password`, `email`, `phone`, `id_city`, `valuta`, `date_of_birth`, `sex`, `role`, `imageFile`, `id_bank_card`) VALUES
(2, 'ника', 'nika', 'nika', 'nika@gmail.com', '123', 1, 'RUB', '2003-12-12', '1', '0', '2', 2),
(3, 'Админ', 'admin', 'admin', 'admin@gmail.com', '123', 1, '1', '2022-12-12', '2', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zakaz`
--

CREATE TABLE `zakaz` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `sum_zakaz` float NOT NULL,
  `sum_sale` float NOT NULL,
  `id_zakaz_info` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zakaz`
--

INSERT INTO `zakaz` (`id`, `id_user`, `id_product`, `sum_zakaz`, `sum_sale`, `id_zakaz_info`) VALUES
(1, 2, 1, 21, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zakaz_info`
--

CREATE TABLE `zakaz_info` (
  `id` int NOT NULL,
  `id_address` int NOT NULL,
  `id_bank_card` int NOT NULL,
  `type_delivery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zakaz_info`
--

INSERT INTO `zakaz_info` (`id`, `id_address`, `id_bank_card`, `type_delivery`, `created_at`) VALUES
(1, 1, 2, 'йфцуууа', '2023-01-30'),
(2, 1, 2, 'ryjy', '2023-02-03'),
(3, 3, 1, 'ryjy', '2023-02-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bank_card`
--
ALTER TABLE `bank_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`validati_thru`);

--
-- Indexes for table `busket`
--
ALTER TABLE `busket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_image` (`imageFile`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bank_card` (`id_bank_card`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_image` (`imageFile`);

--
-- Indexes for table `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_zakaz_info` (`id_zakaz_info`);

--
-- Indexes for table `zakaz_info`
--
ALTER TABLE `zakaz_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_address` (`id_address`),
  ADD KEY `id_bank_card` (`id_bank_card`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bank_card`
--
ALTER TABLE `bank_card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `busket`
--
ALTER TABLE `busket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zakaz_info`
--
ALTER TABLE `zakaz_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `busket`
--
ALTER TABLE `busket`
  ADD CONSTRAINT `busket_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `busket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_bank_card`) REFERENCES `bank_card` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `zakaz`
--
ALTER TABLE `zakaz`
  ADD CONSTRAINT `zakaz_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `zakaz_ibfk_4` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `zakaz_ibfk_5` FOREIGN KEY (`id_zakaz_info`) REFERENCES `zakaz_info` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `zakaz_info`
--
ALTER TABLE `zakaz_info`
  ADD CONSTRAINT `zakaz_info_ibfk_1` FOREIGN KEY (`id_address`) REFERENCES `address` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `zakaz_info_ibfk_2` FOREIGN KEY (`id_bank_card`) REFERENCES `bank_card` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
