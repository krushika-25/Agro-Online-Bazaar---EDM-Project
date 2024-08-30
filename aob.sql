-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 01:24 PM
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
-- Database: `aob`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `cat_name`, `cat_status`) VALUES
(1, 'Field Crops', '0'),
(3, 'Pesticides', '1'),
(4, 'Nuts', '1'),
(5, 'Vegetables', '1'),
(6, 'Fruits', '1'),
(7, 'Cooking', '0'),
(8, 'Cooking Oil', '1'),
(9, 'Seeds', '1'),
(10, 'Rice', '1'),
(11, 'Cereal', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_phone` varchar(20) DEFAULT NULL,
  `c_message` varchar(200) DEFAULT NULL,
  `c_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`c_id`, `c_name`, `c_email`, `c_phone`, `c_message`, `c_status`) VALUES
(1, 'user7', 'user7@gmail.com', '9823456791', 'Enquiry to join', '1'),
(2, 'user1', 'user1@gmail.com', '9898989898', 'Request to solve my complain', '1'),
(3, 'server', 'demo@minimals.cc', '9427421806', 'yufds', '1'),
(4, 'user1', 'abcdef@gmail.com', '9427421806', 'sdfghjkljgbfvb', '1'),
(5, 'asd', 'abcd@gmail.com', '7894567890', 'dfvkjhub', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `f_id` int(11) NOT NULL,
  `feedback` varchar(50) DEFAULT NULL,
  `f_status` varchar(5) DEFAULT NULL,
  `l_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`f_id`, `feedback`, `f_status`, `l_id`) VALUES
(1, 'Nice ', '1', 21),
(2, 'this is working if yes then great', '1', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `l_email` varchar(50) DEFAULT NULL,
  `l_phone` varchar(20) DEFAULT NULL,
  `l_pass` varchar(20) DEFAULT NULL,
  `l_add` varchar(100) DEFAULT NULL,
  `l_img` varchar(20) DEFAULT NULL,
  `l_status` varchar(10) DEFAULT NULL,
  `l_role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`l_id`, `l_name`, `l_email`, `l_phone`, `l_pass`, `l_add`, `l_img`, `l_status`, `l_role`) VALUES
(1, 'admin1', 'admin1@gmail.com', '9898989898', 'admin', ' abad', 'photos/user3.jpg', '1', '1'),
(2, 'admin2', 'admin2@gmail.com', '9898989898', 'Admin123', '   abad', 'photos/user7.png', '1', '1'),
(15, 'admin3', 'admin3@gmail.com', '9898989898', '4BPCK8', ' abad', 'photos/Default.png', '1', '1'),
(20, 'user1', 'user1@gmail.com', '9898989898', 'user1', '   abad', 'photos/user4.jpg', '1', '2'),
(21, 'user2', 'user2@gmail.com', '9898989898', 'user2', ' abad', 'photos/user5.png', '1', '2'),
(22, 'user3', 'user3@gmail.com', '9898989898', 'user3', 'abad', 'photos/user6.png', '1', '2'),
(23, 'user4', 'user4@gmail.com', '7897897847', 'qwertY123', '111 City Palace', 'photos/user9.png', '1', '2'),
(24, 'krushi', 'krushi@gmail.com', '2424242424', 'krushi25', 'ahemdabad', 'photos/user4.jpg', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_odetails`
--

CREATE TABLE `tbl_odetails` (
  `od_id` int(11) NOT NULL,
  `o_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `s_status` varchar(50) DEFAULT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_price` float(6,2) DEFAULT NULL,
  `p_quantity` int(11) DEFAULT NULL,
  `total_price` double(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_odetails`
--

INSERT INTO `tbl_odetails` (`od_id`, `o_id`, `p_id`, `s_id`, `s_status`, `p_name`, `p_price`, `p_quantity`, `total_price`) VALUES
(1, 1, 3, 22, 'pending', 'Mustard', 125.00, 3, 375.00),
(2, 1, 5, 23, 'approved', 'product0', 785.00, 4, 3140.00),
(3, 2, 3, 22, 'pending', 'Mustard', 125.00, 1, 125.00),
(4, 2, 2, 21, 'approved', 'Fungicide', 100.00, 2, 200.00),
(5, 3, 3, 22, 'shipped', 'Mustard', 125.00, 2, 250.00),
(6, 4, 4, 23, 'pending', 'product', 2200.00, 1, 2200.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `o_id` int(11) NOT NULL,
  `l_id` varchar(255) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_email` varchar(255) NOT NULL,
  `o_phone` varchar(255) NOT NULL,
  `o_add` varchar(255) NOT NULL,
  `o_zip` varchar(255) DEFAULT NULL,
  `total_price` float(6,2) NOT NULL DEFAULT 0.00,
  `o_pay` int(11) NOT NULL,
  `o_status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`o_id`, `l_id`, `o_name`, `o_email`, `o_phone`, `o_add`, `o_zip`, `total_price`, `o_pay`, `o_status`, `created_at`, `updated_at`) VALUES
(1, '23', 'user4', 'user4@gmail.com', '7897897847', '111 City Palace', '134', 3515.00, 0, 'confirmed', '2022-03-22 18:15:19', '2022-03-22 18:15:19'),
(2, '20', 'user1', 'user1@gmail.com', '9898989898', '   abad', '380001', 325.00, 0, 'confirmed', '2022-03-23 20:21:38', '2022-03-23 20:21:38'),
(3, '23', 'user4', 'user4@gmail.com', '7897897847', '111 City Palace', '380005', 250.00, 0, 'confirmed', '2022-03-24 16:21:21', '2022-03-24 16:21:21'),
(4, '24', 'krushi', 'krushi@gmail.com', '2424242424', 'ahemdabad', '382415', 2200.00, 0, 'confirmed', '2024-08-26 13:44:43', '2024-08-26 13:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `o_id` int(11) NOT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `o_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `l_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`o_id`, `otp`, `o_time`, `l_id`) VALUES
(1, '994847', '2022-03-21 11:38:16', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_img` varchar(50) DEFAULT NULL,
  `p_status` varchar(5) DEFAULT NULL,
  `l_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `p_price` int(11) NOT NULL,
  `description` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_img`, `p_status`, `l_id`, `cat_id`, `p_price`, `description`) VALUES
(1, 'Corn', 'photos/corn.png', '1', 20, 1, 150, ''),
(2, 'Fungicide', 'photos/pest1.jpg', '0', 21, 3, 100, ''),
(3, 'Mustard', 'photos/mustard.jpg', '0', 22, 1, 125, ''),
(4, 'product', 'photos/pest1.jpg', '0', 23, 3, 2200, ''),
(5, 'product0', 'photos/Default.png', '0', 23, 1, 785, ''),
(6, 'Yo Green Spray Bottle', 'photos/Yo Green Spray Bottle.jpg', '2', 24, 3, 3068, 'Yo Green Spray Bottle Pressure Sprayer Ideal for Spraying Weedicide, Fertilizers, Herbicides, Pesticides, Water Mist, Spray Bottle, Car Wash (20 Liter-Orange)'),
(7, 'KWEL 1 Pc Heavy Duty Garden Pump ', 'photos/KWEL 1 Pc Heavy Duty Garden Pump.jpg', '2', 24, 3, 488, '488 KWEL 1 Pc Heavy Duty Garden Pump Pressure Sprayer, Lawn Sprinkler, Water Mister, Spray Bottle For Herbicides, Pesticides, Fertilizers, Plants Flowers (2L Capacity), Blue'),
(8, 'Wolpin 1Pc Garden Water Sprayer', 'photos/Wolpin 1Pc Garden Water Sprayer.jpg', '0', 24, 3, 478, '478 Wolpin 1Pc Garden Water Sprayer Manual Spray Bottle Pump For Gardening Plants | Shower For Plants & Flowers | Spray Bottles For Lawn Herbicides, Pesticides, Fertilizers (2 Liter Capacity) - Green'),
(9, 'Wolpin 1Pc Garden Water Sprayer Manual Spray Bottl', 'photos/Wolpin 1Pc Garden Water Sprayer.jpg', '0', 24, 3, 478, '478 Wolpin 1Pc Garden Water Sprayer Manual Spray Bottle Pump For Gardening Plants | Shower For Plants & Flowers | Spray Bottles For Lawn Herbicides, Pesticides, Fertilizers (2 Liter Capacity) '),
(10, 'Wolpin 1Pc Garden Water Sprayer ', 'photos/Wolpin 1Pc Garden Water Sprayer.jpg', '2', 24, 3, 478, '478 Wolpin 1Pc Garden Water Sprayer Manual Spray Bottle Pump For Gardening Plants | Shower For Plants & Flowers | Spray Bottles For Lawn Herbicides, Pesticides, Fertilizers (2 Liter Capacity) '),
(11, 'Go Vegan California Almonds 1kg', 'photos/Go Vegan California Almonds 1kg.jpg', '2', 24, 4, 749, '749 Go Vegan California Almonds 1kg | Premium Badam Giri | High in Fiber & Boost Immunity | Real Nuts | Whole Natural Badam'),
(12, 'Tata Sampann Pure Cashews 200g', 'photos/Tata Sampann Pure Cashews.jpg', '2', 24, 4, 210, '210 Tata Sampann Pure Cashews Whole, Kaju, 200g, Nutritious & Delicious, Premium Kaju nuts, Rich in Protein, Magnesium & Phosphorus, Deluxe Size & Crunchy Nuts'),
(13, 'Zaya Dryfruits Premium Raw Mota Plain Pista', 'photos/pista.jpg', '2', 24, 4, 1100, '1100 Zaya Dryfruits Premium Raw Mota Plain Pista |Unsalted Pistachios Without shell | Pheeka Pista Dry Fruit| Tasty & Healthy| Vegan Gluten Free & Low Calorie Nuts | Jar Pack (500gm)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tbl_odetails`
--
ALTER TABLE `tbl_odetails`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_odetails`
--
ALTER TABLE `tbl_odetails`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
