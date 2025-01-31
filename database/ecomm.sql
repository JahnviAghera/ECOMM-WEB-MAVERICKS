-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql111.infinityfree.com
-- Generation Time: Jan 31, 2025 at 04:18 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_38194361_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(10, 16, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'ethnic wears', 'ethnic');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(30, 1, 'Saree', 'A traditional Indian garment worn by women, made of a long piece of cloth draped elegantly.', 'saree', 2499.99, 'https://firebasestorage.googleapis.com/v0/b/test-d0a33.appspot.com/o/OIP%20(1).jpg?alt=media&token=8721865f-efd1-404d-bb54-4ba611aaa451', '2025-01-31', 4),
(31, 1, 'Lehenga Choli', 'A traditional outfit consisting of a long skirt (lehenga) and a blouse (choli), often worn at weddings.', 'lehenga-choli', 5999.99, 'https://firebasestorage.googleapis.com/v0/b/test-d0a33.appspot.com/o/pink-banarasi-silk-traditional-lehenga-choli-3703.jpg?alt=media&token=1289c347-fac3-439d-82ea-c0a0c62b3dfe', '2025-01-31', 0),
(32, 1, 'Kurta Set', 'A comfortable and stylish outfit for men, featuring a long tunic (kurta) and matching pants or churidar.', 'kurta-set', 1799.99, 'https://firebasestorage.googleapis.com/v0/b/test-d0a33.appspot.com/o/OIP%20(2).jpg?alt=media&token=9083fbac-be8b-45c6-a80e-a58449fe8abd', '2025-01-31', 0),
(33, 2, 'Sherwani', 'A formal outfit for men, typically worn at weddings or formal events, made of heavy fabric and adorned with embroidery.', 'sherwani', 7999.99, 'sherwani.jpg', '2025-01-31', 0),
(34, 2, 'Anarkali Dress', 'A long, flowing dress for women with a fitted bodice and a flared skirt, often worn at parties and festivals.', 'anarkali-dress', 3499.99, 'anarkali_dress.jpg', '2025-01-31', 0),
(35, 1, 'Churidaar', 'A traditional Indian outfit consisting of a long tunic with tight pants (churidaar), worn by both men and women.', 'churidaar', 1499.99, 'churidaar.jpg', '2025-01-31', 0),
(36, 3, 'Palazzo Pants', 'Loose, wide-legged pants that are stylish and comfortable, worn by women with ethnic and casual tops.', 'palazzo-pants', 899.99, 'palazzo_pants.jpg', '2025-01-31', 0),
(37, 3, 'Dupatta', 'A long scarf often worn over the shoulder with traditional Indian outfits such as sarees and salwar kameez.', 'dupatta', 499.99, 'dupatta.jpg', '2025-01-31', 0),
(38, 4, 'Salwar Kameez', 'A traditional outfit for women, consisting of a long tunic (kameez) paired with baggy trousers (salwar).', 'salwar-kameez', 2499.99, 'salwar_kameez.jpg', '2025-01-31', 0),
(39, 4, 'Patiala Suit', 'A traditional Punjabi outfit for women, consisting of a long tunic and a set of pleated trousers (Patiala).', 'patiala-suit', 1999.99, 'patiala_suit.jpg', '2025-01-31', 0),
(40, 2, 'Indo-Western Fusion', 'A combination of traditional Indian and Western clothing elements, designed to create a modern yet ethnic look.', 'indo-western-fusion', 3999.99, 'indo_western_fusion.jpg', '2025-01-31', 0),
(41, 5, 'Kurtis', 'A casual, comfortable top that can be paired with jeans or leggings, commonly worn by women in India.', 'kurtis', 1199.99, 'kurtis.jpg', '2025-01-31', 0),
(42, 5, 'Ethnic Jackets', 'Stylish jackets with ethnic prints or embroidery, often worn over kurtis or sarees for a fashionable look.', 'ethnic-jackets', 1799.99, 'ethnic_jackets.jpg', '2025-01-31', 0),
(43, 3, 'Jodhpuri Suit', 'A formal suit worn by men, typically consisting of a coat and pants, often seen at weddings and parties.', 'jodhpuri-suit', 4499.99, 'jodhpuri_suit.jpg', '2025-01-31', 0),
(44, 6, 'Chikan Work Kurti', 'A traditional embroidered kurti with intricate chikan work, often worn for special occasions or festive events.', 'chikan-work-kurti', 2499.99, 'chikan_work_kurti.jpg', '2025-01-31', 0),
(45, 6, 'Bandhani Saree', 'A saree featuring the traditional Bandhani tie-dye technique, commonly worn in Rajasthan and Gujarat.', 'bandhani-saree', 3599.99, 'bandhani_saree.jpg', '2025-01-31', 0),
(46, 7, 'Gharara', 'A traditional outfit worn by women, consisting of a flared skirt and matching top, often worn at weddings.', 'gharara', 4999.99, 'gharara.jpg', '2025-01-31', 0),
(47, 8, 'Pashmina Shawl', 'A luxurious, soft shawl made from Pashmina wool, often worn with ethnic attire for warmth and elegance.', 'pashmina-shawl', 2299.99, 'pashmina_shawl.jpg', '2025-01-31', 0),
(48, 9, 'Rajasthani Lehenga', 'A traditional Rajasthani outfit consisting of a heavily embroidered lehenga, worn at weddings and festivals.', 'rajasthani-lehenga', 7999.99, 'rajasthani_lehenga.jpg', '2025-01-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(9, 9, 'PAY-1RT494832H294925RLLZ7TZA', '2018-05-10'),
(10, 9, 'PAY-21700797GV667562HLLZ7ZVY', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'IT', 'SOURCECODE', '', '', 'logo.png', 1, '', '', '2020-12-30'),
(13, 'jude@yahoo.com', '$2y$10$THCiaipRqs51LgZNNSp7henK8SJ17r7abaH44slwjXavv/nVEw29e', 0, 'angel jude', 'suarez', 'Himamaylan City', '09458423256', 'cover.jpg', 1, '', '', '2020-12-30'),
(16, 'jahnviaghera@gmail.com', '$2y$10$ROChNLEVdpJ0cLaCuEvY6e5Ug96UYaAnFwLULgXFcUMdynPwegOcO', 0, 'Jahnvi', 'Aghera', '', '', '', 1, '', '', '2025-01-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
