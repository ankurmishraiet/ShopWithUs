-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2019 at 08:47 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MNNIT`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`userName`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `userName` varchar(20) NOT NULL,
  `productId` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`userName`, `productId`, `quantity`) VALUES
('ankit15697', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `userName` varchar(20) NOT NULL,
  `productId` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(10,0) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`id`, `name`, `price`, `description`, `type`, `photo`, `discount`) VALUES
('1', 'Face Wash', 123, 'Himalaya  Face Wash', 'Beauty', '1.jpg', 12),
('10', 'Leather Shoes', 1299, 'Leather Shoes for men', 'Shoes', '1.jpg', 0),
('11', 'Sneakers', 122, 'Sneakers for men', 'Shoes', '2.jpg', 0),
('12', 'Sport Shoes', 1399, 'Sport Shoes for men', 'Shoes', '3.jpg', 0),
('13', 'Red T shirt', 199, 'Red T shirt for slim Boys', 'Tshirt', '1.jpg', 0),
('14', 'printed t shirt', 566, 'Printed T shirt', 'Tshirt', '2.jpg', 0),
('15', 'GitHub T shirt', 699, 'Github t shirt', 'Tshirt', '3.jpg', 0),
('2', 'Face Wash', 45, 'Patanjali Face Wash', 'Beauty', '2.jpg', 12),
('3', 'Face Wash', 167, 'Garnier Face Wash', 'Beauty', '3.jpg', 12),
('4', 'Men''s watch', 3400, 'Beautiful Writs Watch', 'Watch', '1.jpg', 0),
('5', 'Hand Watch', 3500, 'Costly Watch for men', 'Watch', '2.jpg', 0),
('6', 'Third Watch', 100, 'Men''s watch', 'Watch', '3.jpg', 0),
('7', 'Lady Jeans', 1500, 'Beautiful Jeans for Ladies', 'Jeans', '1.jpg', 0),
('8', 'Boys Jeans', 788, 'Jeans for boys', 'Jeans', '2.jpg', 0),
('9', 'FIT Jeans', 688, 'Jeans for slimboys', 'Jeans', '3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ProductTypes`
--

CREATE TABLE `ProductTypes` (
  `productId` varchar(20) NOT NULL,
  `productType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProductTypes`
--

INSERT INTO `ProductTypes` (`productId`, `productType`) VALUES
('1', 'Beauty'),
('2', 'Jeans'),
('3', 'shoes'),
('4', 'tShirt'),
('5', 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `userName` varchar(20) NOT NULL,
  `productId` varchar(20) NOT NULL,
  `review` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`userName`, `productId`, `review`) VALUES
('ankit15697', '1', 'Best Product in the market'),
('ankit15697', '2', 'Worst Product in the market.');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `mobileNo` varchar(10) DEFAULT NULL,
  `emailId` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userName`, `firstName`, `lastName`, `mobileNo`, `emailId`, `address`, `gender`, `password`) VALUES
('ankit15697', 'Ankit', 'Mishra', '9455155469', 'ankitmcamnnit@gmail.com', 'BG Hostel', 'male', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`userName`);

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD KEY `userName` (`userName`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD KEY `userName` (`userName`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ProductTypes`
--
ALTER TABLE `ProductTypes`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD KEY `Reviews_ibfk_1` (`userName`),
  ADD KEY `Reviews_ibfk_2` (`productId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `Users` (`userName`) ON DELETE CASCADE,
  ADD CONSTRAINT `Cart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `Products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `Users` (`userName`) ON DELETE CASCADE,
  ADD CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `Products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `Reviews_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `Users` (`userName`) ON DELETE CASCADE,
  ADD CONSTRAINT `Reviews_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `Products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
