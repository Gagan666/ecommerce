-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2022 at 10:02 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `caddress` text NOT NULL,
  `cmail` varchar(20) NOT NULL,
  `cmobile` bigint(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cid`, `cname`, `caddress`, `cmail`, `cmobile`, `pass`) VALUES
(1, 'vishwas1', 'eaf', 'vishwasbalkundi@gmai', 8897946277, '123'),
(2, 'knight_6669', 'bang', 'as@gmail.com', 9898989898, 'super'),
(3, 'gagan', 'suck@gmail.com', 'admin', 9898989897, 'super');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(1000) NOT NULL,
  `client_id` int(11) NOT NULL,
  `qty` varchar(1000) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `product_id`, `client_id`, `qty`, `status`) VALUES
(8, '12,14,13,', 3, '1,1,5,', 1),
(11, '12,14,13,', 5, '1,1,5,', 0),
(13, '12,14,13,', 3, '1,1,5,', 0),
(14, '12,14,13,', 3, '1,1,5,', 0),
(15, '12,14,13,', 3, '1,1,5,', 0),
(16, '12,14,13,', 3, '1,1,5,', 0),
(17, '13,', 3, '1,', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `price` float NOT NULL,
  `impath` varchar(200) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `details`, `price`, `impath`) VALUES
(11, 'vishwas1', 'trj', 2342, 'vishwas1.jpg'),
(12, 'chetan', 'frdv', 234, 'chetan.jpg'),
(13, 'jio', 'eawa', 2345, 'jio.jpg'),
(14, 'soice', 'daw', 123, 'soice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_reg`
--

DROP TABLE IF EXISTS `vendor_reg`;
CREATE TABLE IF NOT EXISTS `vendor_reg` (
  `vid` int(10) NOT NULL AUTO_INCREMENT,
  `vname` varchar(20) NOT NULL,
  `vmail` varchar(20) NOT NULL,
  `vaddress` text NOT NULL,
  `vmobile` bigint(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_reg`
--

INSERT INTO `vendor_reg` (`vid`, `vname`, `vmail`, `vaddress`, `vmobile`, `pass`) VALUES
(3, 'vishwas', 'vishwasbalkundi06@gm', 'egwerw', 9513706439, 'abc');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `client` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
