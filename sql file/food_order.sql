-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 11:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(24, 'roshan_gautam', 'roshan123', 'd6dfb33a2052663df81c35e5496b3b1b'),
(25, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(22, 'Biryani', 'Food_Category_236.jpg', 'Yes', 'Yes'),
(23, 'Chicken', 'Food_Category_467.jpg', 'Yes', 'Yes'),
(24, 'Chinese', 'Food_Category_993.jpg', 'Yes', 'Yes'),
(25, 'Paneer', 'Food_Category_507.jpg', 'Yes', 'Yes'),
(26, 'South Indian', 'Food_Category_67.png', 'Yes', 'Yes'),
(27, 'Vegetable', 'Food_Category_948.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(2, 'Chicken Roast', 'All-Time Greatest Recipes from Legendary Cooks Julia Child seasoned this roast chicken inside and out by packing sautéed vegetables, lemon slices and fresh herbs into the cavity, then rubbing the skin with butter. In typical French fashion, she trussed the bird to promote even cooking.', '6.00', 'Food-Name-5711.jpg', 23, 'Yes', 'Yes'),
(3, 'Chicken Curry', 'Chicken gets seasoned with a mixture of sautéed vegetables, fresh herbs and lemon slices.', '6.00', 'Food-Name-1176.jpg', 23, 'Yes', 'Yes'),
(4, 'Momos', 'Momo are bitesize dumplings made with a spoonful of stuffing wrapped in dough. Momo are usually steamed, though they are sometimes fried or steam-fried.', '4.00', 'Food-Name-9506.jpg', 24, 'Yes', 'Yes'),
(5, 'Chicken Masala', 'Chicken masala is a simple Indian dish made with chicken, spices, herbs, onions and tomatoes. Serve this with rice or any flatbreads like naan, roti or paratha.', '4.00', 'Food-Name-8690.jpeg', 23, 'Yes', 'Yes'),
(7, 'Matar Paneer', 'Matar paneer recipe is a versatile North Indian curry with many different variations. Learn this flavorful home-style Punjabi mutter paneer.', '5.00', 'Food-Name-9208.jpg', 25, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(2, 'Chicken Roast', '6.00', 1, '6.00', '2022-08-22 12:51:41', 'Delivered', 'Roshan Gautam', '2e5233', 'garimanepali6@gmail.com', '2343234'),
(3, 'Chicken Curry', '6.00', 3, '18.00', '2022-08-22 01:39:47', 'Cancelled', 'hari ', 'sapkota', 'harisapkota@gmail.com', 'Kathmandu, Nepal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
