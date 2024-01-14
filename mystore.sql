-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 05:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Shethil', 'shethil13@gmail.com', '$2y$10$o6edn.u4C/hxNblQeFYIWuYUlda9OSAjhKdCUNRNkMg0CT5Lbl8Iq'),
(2, 'Shethil_Ekram', 'ekramshethil1004@gmail.com', '$2y$10$mZx15nVE2IqqlghCZZrsv.6XZoixWhmiVozODfD9ERQ39r6z8nFNy');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Aarong'),
(2, 'Kay Kraft'),
(3, 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Women Dresses'),
(3, 'Baby Dresses'),
(4, 'Accessories for Men'),
(5, 'Accessories for Women'),
(7, 'Men Dresses');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quentity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quentity`, `order_status`) VALUES
(1, 2, 16557370, 2, 1, 'pending'),
(2, 2, 1377858634, 2, 1, 'pending'),
(3, 2, 1137170749, 2, 1, 'pending'),
(4, 2, 1008613234, 1, 1, 'pending'),
(5, 2, 444738154, 2, 1, 'pending'),
(6, 2, 2024837311, 13, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(155) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Panjabi', 'Grey and blue textured cotton panjabi. Features in-seam side pockets.', 'Panjabi, men dress, men panjabi, male dress', 1, 1, '0040000100756.jpg', '0040000100756_1.jpg', '0040000100756_2.jpg', '3720', '2023-12-14 16:30:43', ''),
(2, 'Shirt', 'Dusty pink/purple cotton shirt with all over navy blue prints. Features chest pocket.', 'Shirt, men shirt, male shirt, men dress, male dress', 1, 1, '0060000145133.webp', '0060000145133_1.webp', '0060000145133_2.webp', '758', '2023-12-14 16:34:51', ''),
(6, 'Black Dress', 'Blue viscose cotton kameez with shades of brown, golden, maroon, orange, red, green ', 'female dress, female black dress, black dress, woman black dress, women dress', 2, 1, 'DSC01124.webp', 'DSC01147_grande.webp', 'DSC01126_grande.webp', '2655', '2023-12-14 16:32:40', '1'),
(7, 'Cotton Katan Saree', 'Blue Mirpur Katan saree with multicolour weaving. Comes with matching unstitched.', 'cotton saree, katan saree, female saree, saree, women saree', 2, 1, '0560000069875.webp', '0560000069875_1.webp', '0560000069875_2.webp', '3265', '2023-12-14 16:31:31', '1'),
(8, 'Printed Cotton Saree', 'Brick red cotton saree with multicolour prints. Comes with matching unstitched blouse', 'printed saree, cotton saree, saree, women saree, female saree', 2, 1, '0560000065674.webp', '0560000065674_1.webp', '0560000065674_2.webp', '2511', '2023-12-14 16:29:35', '1'),
(9, 'Katan Saree', 'Blue Mirpur Katan saree with multicolour weaving. Comes with matching unstitched.', 'saree, katan saree, women saree, female saree', 2, 1, '0540000022868.webp', '0540000022868_1.webp', '0540000022868_2.webp', '24800', '2023-12-14 16:30:11', '1'),
(10, 'Shalwar Kameez', 'Blue viscose cotton kameez with shades of brown, golden, maroon, orange, red, green.', 'shalwar kameez, saloyer kamij', 2, 3, '1420000170994.webp', '1420000170994_1.webp', '1420000170994_2.webp', '4506', '2023-12-14 16:32:19', '1'),
(11, 'Shalwar Kameez', 'White check printed cotton kameez with green, grey, orange and pink embroidery.', 'shalwar kameez, saloyer kamiz,', 2, 2, '1420000172751.webp', '1420000172751_1.webp', '1420000172751_2.webp', '3027', '2023-12-14 16:19:40', '1'),
(12, 'Silk Panjabi', 'Black and grey ombre dyed endi silk panjabi with green embroidery. Features in-seam side.', 'panjabi, men panjabi, male panjabi', 7, 3, '0020000106500.webp', '0020000106500_1.webp', '0020000106500_2.webp', '6609', '2023-12-14 16:35:11', '1'),
(13, 'Cotton Panjabi', 'Grey and blue textured cotton panjabi. Features in-seam side pockets.', 'cotton panjabi, panjabi, men panjabi', 7, 3, '1200000027214.webp', '1200000027214_1.webp', '1200000027214_2.webp', '2300', '2023-12-14 16:24:27', '1'),
(14, 'Sleeve Shirt', 'Dusty pink/purple cotton shirt with all over navy blue prints. Features chest pocket.', 'shirt, sleeve shirt, men shirt, male shirt', 7, 1, '0070000055024.webp', '0070000055024_1.webp', '0070000055024_2.webp', '1320', '2023-12-14 16:34:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 2, 758, 16557370, 1, '2023-12-14 00:23:55', 'Complete'),
(2, 2, 758, 1377858634, 1, '2023-12-14 00:38:32', 'Complete'),
(3, 2, 4478, 1137170749, 2, '2023-12-14 00:39:18', 'Complete'),
(4, 2, 3720, 1008613234, 1, '2023-12-14 13:48:30', 'Complete'),
(5, 2, 758, 444738154, 1, '2023-12-14 14:12:36', 'Complete'),
(6, 2, 2300, 2024837311, 1, '2024-01-14 16:50:53', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 4, 1008613234, 3720, 'Offline', '2023-12-14 13:48:30'),
(2, 5, 444738154, 758, 'CashOn', '2023-12-14 14:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'Ekram', 'ekramshethil13@gmail.com', '$2y$10$JODzx4IFFhJ5bGmRagMF4unmrBLWtcfzXDANnsSJl44lXp6eaxK7u', '202112271924471000.jpg', '::1', 'Kashipur, Narayanganj.', '01517019128');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
