-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2019 at 01:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `aname` text DEFAULT NULL,
  `aemail` text DEFAULT NULL,
  `apassword` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `aemail`, `apassword`) VALUES
(1, 'Shantanu Kardile', 'shan@xyz.com', 'shan');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `bid` int(10) NOT NULL,
  `bname` text DEFAULT NULL,
  `badd` text DEFAULT NULL,
  `bnum` bigint(10) DEFAULT NULL,
  `bemail` text DEFAULT NULL,
  `bpassword` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`bid`, `bname`, `badd`, `bnum`, `bemail`, `bpassword`) VALUES
(1, 'Milind Kardile', 'road', 7777777777, 'milind@email.com', 'milind'),
(2, 'Hayat Sarsilmaz', 'Istanbul', 9966584123, 'hayat@email.com', 'hayat'),
(3, 'Murat Sarsilmaz', 'Turkey', 7845895612, 'murat@email.com', 'murat'),
(4, 'Natasha Romonov', 'New York', 7755555664, 'natasha@email.com', 'natasha');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `bid` int(10) DEFAULT NULL,
  `bname` text DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `pname` text DEFAULT NULL,
  `pprice` int(10) DEFAULT NULL,
  `pquantity` int(10) DEFAULT NULL,
  `ptotal_price` int(10) DEFAULT NULL,
  `sid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(10) NOT NULL,
  `bid` int(10) DEFAULT NULL,
  `sid` int(10) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `pname` text DEFAULT NULL,
  `pquantity` int(10) DEFAULT NULL,
  `ptotal_price` int(10) DEFAULT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `status` text NOT NULL DEFAULT 'In Process'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `bid`, `sid`, `pid`, `pname`, `pquantity`, `ptotal_price`, `date`, `status`) VALUES
(1, 1, NULL, 2, NULL, NULL, NULL, '2019-11-03 22:35:25.000000', 'completed'),
(2, 1, 2, 2, 'Strawberry', 10, 1200, '2019-11-03 22:37:16.000000', 'completed'),
(3, 1, 2, 1, 'Bell', 5, 400, '2019-11-03 22:37:16.000000', 'Completed'),
(5, 2, 2, 2, 'Strawberry', 12, 1440, '2019-11-04 02:28:17.593582', 'Completed'),
(6, 4, 1, 2, 'Strawberry', 10, 1200, '2019-11-04 05:38:58.307719', 'Completed'),
(7, 4, 2, 1, 'Bell', 12, 960, '2019-11-04 05:46:26.340808', 'In Process');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(10) NOT NULL,
  `pname` text DEFAULT NULL,
  `pimage` text DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pimage`, `price`) VALUES
(1, 'Bell Pepper', 'product-1.jpg', 80),
(2, 'Strawberry', 'product-2.jpg', 120),
(3, 'Green Peas', 'product-3.jpg', 70),
(4, 'Blue Cabbage', 'product-4.jpg', 90),
(5, 'Tomato', 'product-5.jpg', 50),
(6, 'Brocolli', 'product-6.jpg', 150),
(7, 'Carrot', 'product-7.jpg', 60),
(8, 'Mixed Fruit Juice', 'product-8.jpg', 140),
(9, 'Onion', 'product-9.jpg', 75),
(10, 'Apple', 'product-10.jpg', 120),
(11, 'Garlic', 'product-11.jpg', 150),
(12, 'Chilli', 'product-12.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `sid` int(10) DEFAULT NULL,
  `sname` text DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `pname` text DEFAULT NULL,
  `stock` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`sid`, `sname`, `pid`, `pname`, `stock`) VALUES
(1, 'A', 2, 'Strawberry', 40),
(2, 'B', 2, 'Strawberry', 45),
(2, 'B', 1, 'Bell', 44);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `sid` int(10) NOT NULL,
  `sname` text DEFAULT NULL,
  `sadd` text DEFAULT NULL,
  `snum` bigint(10) DEFAULT NULL,
  `semail` text DEFAULT NULL,
  `spass` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sid`, `sname`, `sadd`, `snum`, `semail`, `spass`) VALUES
(1, 'A', 'A', 9988998899, 'A@email.com', 'A'),
(2, 'B', 'B', 9999999999, 'B@email.com', 'B'),
(3, 'C', 'C', 9988774568, 'C@email.com', 'C'),
(4, 'D', 'D', 9966694472, 'D@email.com', 'D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
