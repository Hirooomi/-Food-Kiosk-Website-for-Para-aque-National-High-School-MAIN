-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 02:01 PM
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
-- Database: `pnhs_canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive`
--

CREATE TABLE `tbl_archive` (
  `item_no` int(11) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `item_prc` int(11) NOT NULL,
  `item_img` text NOT NULL,
  `item_cat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `item_no` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_prc` int(11) NOT NULL,
  `item_temp` varchar(128) DEFAULT NULL,
  `item_size` varchar(128) DEFAULT NULL,
  `item_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_no` int(11) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `item_prc` int(11) NOT NULL,
  `item_img` text NOT NULL,
  `item_cat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_no`, `item_name`, `item_prc`, `item_img`, `item_cat`) VALUES
(4, 'Plain Burger', 20, 'img-istockphoto-155352091-612x612.jpg', 'Burger'),
(5, 'Cheese Burger', 25, 'img-DC_202006_0003_Cheeseburger_StraightBun_832x472_1-3-product-tile-desktop.jpg', 'Burger'),
(6, 'Hotdog Sandwich', 25, 'img-hot-dog-ketchup-9072411.jpg', 'Burger'),
(7, 'Piattos', 20, 'img-25-1100-4800016113246-Jack-n-Jill-Piattos-CHeese-Party-Pack-212g-No.1.jpg', 'Snacks'),
(8, 'Lugaw', 15, 'img-lugaw.jpg', 'Snacks'),
(9, 'Togue', 10, 'img-download (2).jpg', 'Snacks'),
(10, 'Rebisco Cream ', 10, 'img-Rebisco-Cream-Cream-Filled-Cracker-Sandwich-32g-500x500-product_popup.jpg', 'Snacks'),
(11, 'Fruit Smoothies', 45, 'img-How-to-Make-Smoothie-1-1.jpg', 'Drinks'),
(12, 'Coffee Frappe', 45, 'img-mld106029_0810_frape_vert.jpg', 'Coffee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `trans_no` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `item_no` int(11) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_temp` varchar(128) DEFAULT NULL,
  `item_size` varchar(128) DEFAULT NULL,
  `item_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `trans_no` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `trans_status` varchar(128) NOT NULL,
  `trans_datetime` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `email`, `password`, `user_type`) VALUES
('Hiroki', 'hiroki.yamada@depedparanaquecity.com', '123', 'type_student'),
('xander', 'xander.ison@depedparanaquecity.com', '123', 'type_student'),
('Yamada', 'hiromi.yamada@depedparanaquecity.com', '123', 'type_staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`trans_no`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `trans_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
