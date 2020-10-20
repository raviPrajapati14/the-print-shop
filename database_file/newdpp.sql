-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 11:22 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `houseNo` varchar(10) DEFAULT NULL,
  `recidenceName` varchar(50) DEFAULT NULL,
  `streetName` varchar(50) DEFAULT NULL,
  `landmark` varchar(50) DEFAULT NULL,
  `areaName` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `zipCode` varchar(10) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `name`, `houseNo`, `recidenceName`, `streetName`, `landmark`, `areaName`, `city`, `state`, `country`, `zipCode`, `insertDate`, `updateDate`) VALUES
(2, NULL, 'C/75', 'Madhuvan Society', 'Near Kathvada Road', '', 'Naroda', 'Ahmedabad', 'Gujarat', 'India', '382330', '2020-07-24', '2020-07-24'),
(3, NULL, 'Near Kathv', 'Madhuvan Society', 'Near Kathvada Road', 'WQ', 'Naroda', 'Ahmedabad', 'Gujarat', 'India', '382330', '2020-07-24', '2020-07-24'),
(4, NULL, 'C/77', 'Madhuvan Society', 'Near Kathvada Road', 'WQ', 'Naroda', 'Ahmedabad', 'Gujarat', 'India', '382330', '2020-07-31', '2020-07-31'),
(5, NULL, '62', 'Solanki Vas', 'Manisha Apartment', '', 'Jawahar Sheri', 'Ahmedabad', 'Gujarat', 'India', '382305', '2020-08-04', '2020-08-04'),
(6, NULL, 'Near Kathv', 'Madhuvan Society', 'Manisha Apartment', '', 'Jawahar Sheri', 'Ahmedabad', 'Gujarat', 'India', '382305', '2020-08-05', '2020-08-05'),
(7, NULL, 'Near Kathv', 'Solanki Vas', 'Manisha Apartment', '', 'Naroda', 'Ahmedabad', 'Gujarat', 'India', '382305', '2020-08-05', '2020-08-05'),
(8, NULL, 'Near Kathv', 'Madhuvan Society', 'Near Kathvada Road', 'Jalaram Dairy', 'Naroda', 'Ahmedabad', 'Gujarat', 'India', '382330', '2020-08-09', '2020-08-09'),
(9, NULL, '62', 'ankit', 'solankivas', 'javahar sheri', 'solanki vas', 'Ahmedabad', 'Gujarat', 'India', '382305', '2020-08-09', '2020-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `insertDate`, `updateDate`) VALUES
(8, 'Invitation Card', '2020-07-22', '2020-07-22'),
(9, 'Mundan Card', '2020-07-22', '2020-07-22'),
(11, 'Kankotri', '2020-08-08', '2020-08-08'),
(13, 'Business Card', '2020-08-08', '2020-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactUsId` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contactNo` varchar(12) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `document` varchar(300) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactUsId`, `name`, `email`, `contactNo`, `message`, `document`, `insertDate`, `updateDate`) VALUES
(1, 'jaymin', 'jps@gmail.com', '8787878787', 'Hello admin', NULL, '2020-08-10', NULL),
(2, 'AKSHAY', 'aky@#gmail.com', '98989898', 'hello', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(10) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `contactNo` varchar(12) DEFAULT NULL,
  `activeStatus` int(2) DEFAULT NULL,
  `verified` int(2) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `firstName`, `lastName`, `email`, `password`, `contactNo`, `activeStatus`, `verified`, `insertDate`, `updateDate`) VALUES
(2, 'Jaymin', 'Prajapati', 'Jsp@gmail.com', 'Jaymin@12345', '1212121212', 1, 1, '2020-07-22', '2020-07-27'),
(3, 'fgh', 'htf', 'admin@gmail.coms', 'Jaymin@19980', '', 1, 1, '2020-07-23', '2020-07-23'),
(4, 'Jaymin', 'Prajapati', 'raviprajapati3421@gmail.com', 'ery@!231', '', 1, 1, '2020-08-05', '2020-08-05'),
(5, 'Jaymin', 'gfd', 'admin@gmail.coms12', 'Jaymin@123456', '', 1, 1, '2020-08-05', '2020-08-05'),
(6, 'sdewef', 'Prajapati', 'jayminprajapati382001@gmail.com', 'Jaymin@1998', '1231231237', 1, 1, '2020-08-09', '2020-08-09'),
(9, 'ankit', 'prajapati', 'ankit@gmail.com', 'Ankit@12345', '9727846545', 1, 1, '2020-08-09', '2020-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `customerAddressId` int(10) NOT NULL,
  `customerId` int(10) DEFAULT NULL,
  `addressId` int(10) DEFAULT NULL,
  `isPreffered` varchar(10) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customeraddress`
--

INSERT INTO `customeraddress` (`customerAddressId`, `customerId`, `addressId`, `isPreffered`, `insertDate`, `updateDate`) VALUES
(2, 2, 2, NULL, '2020-07-24', '2020-07-24'),
(3, 2, 3, NULL, '2020-07-24', '2020-07-24'),
(4, 2, 4, NULL, '2020-07-31', '2020-07-31'),
(5, 2, 5, NULL, '2020-08-04', '2020-08-04'),
(6, 4, 6, NULL, '2020-08-05', '2020-08-05'),
(7, 5, 7, NULL, '2020-08-05', '2020-08-05'),
(8, 6, 8, NULL, '2020-08-09', '2020-08-09'),
(9, 9, 9, NULL, '2020-08-09', '2020-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `customerprofile`
--

CREATE TABLE `customerprofile` (
  `customerProfileId` int(10) NOT NULL,
  `customerId` int(20) NOT NULL,
  `profilePhoto` varchar(300) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `altPhone` varchar(12) DEFAULT NULL,
  `altEmail` varchar(50) DEFAULT NULL,
  `insertDate` date NOT NULL,
  `updateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerprofile`
--

INSERT INTO `customerprofile` (`customerProfileId`, `customerId`, `profilePhoto`, `dateOfBirth`, `gender`, `altPhone`, `altEmail`, `insertDate`, `updateDate`) VALUES
(2, 2, NULL, '2020-07-03', '0', '1231231231', 'asbd@123.cvo', '2020-07-24', '2020-07-27'),
(5, 6, NULL, '2020-07-31', '1', '', '', '2020-08-09', '2020-08-09'),
(6, 9, NULL, '2020-08-11', '0', '', '', '2020-08-09', '2020-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `orderProductId` int(10) NOT NULL,
  `orderId` int(10) DEFAULT NULL,
  `productId` int(10) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discountPrice` float DEFAULT NULL,
  `finalPrice` float DEFAULT NULL,
  `taxPrice` float DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `productSku` varchar(50) DEFAULT NULL,
  `withPrint` tinyint(1) NOT NULL DEFAULT 0,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`orderProductId`, `orderId`, `productId`, `quantity`, `price`, `discountPrice`, `finalPrice`, `taxPrice`, `totalPrice`, `productSku`, `withPrint`, `file`) VALUES
(1, 1, 8, 2, 1200, 200, 1000, 180, 1180, 'LMBRGN-001-JS', 1, 'http://localhost/ndpp/uploads/unnamed.png'),
(2, 2, 8, 2, 1200, 200, 1000, 180, 1180, 'LMBRGN-001-JS', 1, 'http://localhost/ndpp/uploads/unnamed.png'),
(3, 3, 8, 2, 1200, 200, 1000, 180, 1180, 'LMBRGN-001-JS', 1, 'http://localhost/ndpp/uploads/unnamed.png'),
(4, 4, 8, 2, 1200, 200, 1000, 180, 1180, 'LMBRGN-001-JS', 1, 'http://localhost/ndpp/uploads/unnamed.png'),
(5, 11, 8, 10, 1200, 200, 1000, 180, 1180, 'LMBRGN-001-JS', 0, ''),
(6, 11, 8, 5, 1200, 200, 1000, 180, 1180, 'LMBRGN-001-JS', 0, ''),
(7, 12, 8, 10, 1200, 200, 1000, 180, 1180, 'LMBRGN-001-JS', 0, ''),
(8, 12, 8, 5, 1200, 200, 1000, 180, 1180, 'LMBRGN-001-JS', 0, ''),
(9, 13, 9, 50, 7000, 1000, 6000, 1080, 7080, 'FRR-SF-90-JS', 0, ''),
(10, 14, 9, 50, 7000, 1000, 6000, 1080, 7080, 'FRR-SF-90-JS', 0, ''),
(11, 15, 19, 100, 40, 20, 20, 3.6, 23.6, 'K-9021', 0, ''),
(12, 16, 26, 1000, 2, 1, 1, 0.18, 1.18, 'NT', 1, 'http://localhost/ndpp/uploads/tally_certificate-page-001.jpg'),
(13, 17, 11, 100, 40, 20, 20, 3.6, 23.6, 'K-1995', 0, ''),
(14, 18, 11, 100, 40, 20, 20, 3.6, 23.6, 'K-1995', 0, ''),
(15, 18, 20, 100, 50, 25, 25, 4.5, 29.5, 'K-9022', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(10) NOT NULL,
  `customerId` int(10) DEFAULT NULL,
  `orderStatusId` int(2) NOT NULL,
  `paymentId` int(10) DEFAULT NULL,
  `orderPrice` float DEFAULT NULL,
  `orderDiscountPrice` float DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `addressId` int(10) DEFAULT NULL,
  `orderEmail` varchar(50) DEFAULT NULL,
  `orderContact` varchar(12) DEFAULT NULL,
  `orderTotalTax` float DEFAULT NULL,
  `orderTotalPrice` float DEFAULT NULL,
  `deliveryCharges` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `customerId`, `orderStatusId`, `paymentId`, `orderPrice`, `orderDiscountPrice`, `orderDate`, `updateDate`, `addressId`, `orderEmail`, `orderContact`, `orderTotalTax`, `orderTotalPrice`, `deliveryCharges`) VALUES
(1, 2, 2, 1, 2472, 472, '2020-08-04', '2020-08-04', 4, 'Jsp@gmail.com', '', 360, 2460, 100),
(2, 2, 2, 2, 2472, 472, '2020-08-04', '2020-08-04', 4, 'Jsp@gmail.com', '', 360, 2460, 100),
(3, 2, 2, 3, 2472, 472, '2020-08-04', '2020-08-04', 4, 'Jsp@gmail.com', '', 360, 2460, 100),
(4, 5, 2, 4, 2472, 472, '2020-08-05', '2020-08-05', 4, 'admin@gmail.coms12', '', 360, 2460, 100),
(5, 2, 2, 5, 18540, 3540, '2020-08-08', '2020-08-08', 1, 'Jsp@gmail.com', '', 2700, 17900, 200),
(6, 2, 2, 6, 18540, 3540, '2020-08-08', '2020-08-08', 1, 'Jsp@gmail.com', '', 2700, 17900, 200),
(7, 2, 2, 7, 18540, 3540, '2020-08-08', '2020-08-08', 1, 'Jsp@gmail.com', '', 2700, 17900, 200),
(8, 2, 2, 8, 18540, 3540, '2020-08-08', '2020-08-08', 1, 'Jsp@gmail.com', '', 2700, 17900, 200),
(9, 2, 2, 9, 18540, 3540, '2020-08-08', '2020-08-08', 1, 'Jsp@gmail.com', '', 2700, 17900, 200),
(10, 2, 2, 10, 18540, 3540, '2020-08-08', '2020-08-08', 1, 'Jsp@gmail.com', '', 2700, 17900, 200),
(11, 2, 2, 11, 18540, 3540, '2020-08-08', '2020-08-08', 1, 'Jsp@gmail.com', '', 2700, 17900, 200),
(12, 2, 2, 12, 18540, 3540, '2020-08-08', '2020-08-08', 3, 'Jsp@gmail.com', '', 2700, 17900, 200),
(13, 2, 2, 13, 359000, 59000, '2020-08-09', '2020-08-09', 2, 'Jsp@gmail.com', '', 54000, 354100, 100),
(14, 6, 2, 14, 359000, 59000, '2020-08-09', '2020-08-09', 8, 'jayminprajapati382001@gmail.com', '', 54000, 354100, 100),
(15, 9, 2, 15, 4360, 2360, '2020-08-09', '2020-08-09', 9, 'ankit@gmail.com', '', 360, 2460, 100),
(16, 9, 2, 16, 2180, 1180, '2020-08-10', '2020-08-10', 9, 'ankit@gmail.com', '', 180, 1280, 100),
(17, 9, 2, 17, 4360, 2360, '2020-08-10', '2020-08-10', 9, 'ankit@gmail.com', '', 360, 2460, 100),
(18, 9, 2, 18, 9810, 5310, '2020-08-10', '2020-08-10', 9, 'ankit@gmail.com', '', 810, 5510, 200);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderStatusId` int(2) NOT NULL,
  `orderStatusName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderStatusId`, `orderStatusName`) VALUES
(1, 'Delivered'),
(2, 'Dispatched'),
(5, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(10) NOT NULL,
  `amount` float DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `paymentMethodId` int(10) DEFAULT NULL,
  `paymentStatusId` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `amount`, `paymentDate`, `paymentMethodId`, `paymentStatusId`) VALUES
(1, 2460, '2020-08-04', 3, 2),
(2, 2460, '2020-08-04', 3, 2),
(3, 2460, '2020-08-04', 1, 2),
(4, 2460, '2020-08-05', 1, 2),
(5, 17900, '2020-08-08', 1, 2),
(6, 17900, '2020-08-08', 2, 2),
(7, 17900, '2020-08-08', 1, 2),
(8, 17900, '2020-08-08', 1, 2),
(9, 17900, '2020-08-08', 3, 2),
(10, 17900, '2020-08-08', 1, 2),
(11, 17900, '2020-08-08', 4, 2),
(12, 17900, '2020-08-08', 4, 2),
(13, 354100, '2020-08-09', 1, 2),
(14, 354100, '2020-08-09', 1, 2),
(15, 2460, '2020-08-09', 1, 2),
(16, 1280, '2020-08-10', 1, 2),
(17, 2460, '2020-08-10', 1, 2),
(18, 5510, '2020-08-10', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `paymentMethodId` int(10) NOT NULL,
  `paymentMethodName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`paymentMethodId`, `paymentMethodName`) VALUES
(1, 'cod'),
(2, 'upi'),
(3, 'creditcard'),
(4, 'debitcard');

-- --------------------------------------------------------

--
-- Table structure for table `paymentstatus`
--

CREATE TABLE `paymentstatus` (
  `paymentStatusId` int(10) NOT NULL,
  `paymentStatusName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentstatus`
--

INSERT INTO `paymentstatus` (`paymentStatusId`, `paymentStatusName`) VALUES
(1, 'processing'),
(2, 'successfull'),
(3, 'unsuccessfull');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(10) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discountPrice` float DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `minimumQty` int(20) DEFAULT NULL,
  `categoryId` int(10) DEFAULT NULL,
  `taxId` int(10) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `description`, `sku`, `price`, `discountPrice`, `quantity`, `minimumQty`, `categoryId`, `taxId`, `insertDate`, `updateDate`) VALUES
(10, 'Kankotri-1997', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-1997', 30, 15, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(11, 'Kankotri-1995', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-1995', 40, 20, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(12, 'Kankotri-1998', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-1998', 30, 15, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(13, 'Kankotri-1985', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-1985', 40, 20, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(14, 'Invitation Card - 155', 'This is a invitation card design. this is latest trend design in this year', 'IC-155', 20, 10, 2000, 10, 8, 1, '2020-08-09', '2020-08-09'),
(15, 'Kankotri-9001', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9001', 40, 20, 5000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(16, 'Kankotri-9002', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9002', 26, 13, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(17, 'Kankotri-9011', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9011', 36, 18, 2500, 100, 11, 1, '2020-08-09', '2020-08-09'),
(18, 'Kankotri-9012', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9012', 36, 18, 2500, 100, 11, 1, '2020-08-09', '2020-08-09'),
(19, 'Kankotri-9021', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9021', 40, 20, 5000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(20, 'Kankotri-9022', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9022', 50, 25, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(21, 'Kankotri-9025', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9025', 42, 21, 2500, 100, 11, 1, '2020-08-09', '2020-08-09'),
(22, 'Kankotri-9030', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9030', 60, 30, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(23, 'Kankotri-9032', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9032', 60, 30, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(24, 'Kankotri-9040', 'This is a wedding invitation card design. this is latest trend design in this year', 'K-9040', 80, 40, 2000, 50, 11, 1, '2020-08-09', '2020-08-09'),
(25, 'Invitation Card - 201', 'This is a invitation card design. this is latest trend design in this year', 'IC-201', 42, 21, 2000, 100, 11, 1, '2020-08-09', '2020-08-09'),
(26, 'NT card', 'Business card design', 'NT', 2, 1, 10000, 1000, 13, 1, '2020-08-09', '2020-08-09'),
(27, 'Kankotri-9032', 'This is a invitation card design. this is latest trend design in this year', 'K-9032', 44, 22, 2000, 100, 11, 1, '2020-08-09', '2020-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `productImageId` int(10) NOT NULL,
  `productId` int(10) DEFAULT NULL,
  `imageLocation` varchar(300) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`productImageId`, `productId`, `imageLocation`, `insertDate`, `updateDate`) VALUES
(6, 8, 'upload/5f1d26004d9d7lamborghini_660_140220101539.jpg', '2020-07-26', '2020-07-26'),
(7, 9, 'upload/5f2ebf92e78c52020-Ferrari-SF90-Stradale-002-2160.jpg', '2020-08-08', '2020-08-08'),
(8, 10, 'upload/5f2febfc3a5f65f181689ba5b3g1.png', '2020-08-09', '2020-08-09'),
(9, 11, 'upload/5f2fec1d2b3925f1816c0bdba5g2.png', '2020-08-09', '2020-08-09'),
(10, 12, 'upload/5f2fec5d55dba992c89bf54cae5ae3aacc4b332db8097gujarati-wedding-cards-gujarati-kankotri-gujarati-wedding-invitations.jpg', '2020-08-09', '2020-08-09'),
(11, 13, 'upload/5f2feca5624c730afb67abbfa560e83b6b6d8e372a9e2unnamed.png', '2020-08-09', '2020-08-09'),
(12, 14, 'upload/5f2fece5a6e05350b99f129a3eaee0e40508dd783b337asd.png', '2020-08-09', '2020-08-09'),
(13, 15, 'upload/5f2feea5c5f64wedding-cards-png-shadi-card-png-hd-transparent-png-download-wedding-card-png-920_836.png', '2020-08-09', '2020-08-09'),
(14, 16, 'upload/5f2feecee641c249-2496350_email-wedding-card-pocket-fold-design-luxury-indian.png', '2020-08-09', '2020-08-09'),
(15, 17, 'upload/5f2feef73f61c303-3038533_muslim-email-wedding-invitation-in-green-gold-cream.png', '2020-08-09', '2020-08-09'),
(16, 18, 'upload/5f2fef15cf40d88-883672_wedding-card-design-png-beautiful-pocket-style-email.png', '2020-08-09', '2020-08-09'),
(17, 19, 'upload/5f2fef34b4908marriagecard-500x500.png', '2020-08-09', '2020-08-09'),
(18, 20, 'upload/5f2fef5a83febwedding-card-500x500.png', '2020-08-09', '2020-08-09'),
(19, 21, 'upload/5f2fef7f290c2wedding-invitation-card-500x500.jpg', '2020-08-09', '2020-08-09'),
(20, 22, 'upload/5f2fef9f96f75a8d43485ef91ecfaa188e4304c018cc8.jpg', '2020-08-09', '2020-08-09'),
(21, 23, 'upload/5f2fefbb86201f71be122bff09fe2cdb63ad09f39d239.jpg', '2020-08-09', '2020-08-09'),
(22, 24, 'upload/5f2fefdbceb6912688dbc37666757ba664eacf3badf88.jpg', '2020-08-09', '2020-08-09'),
(23, 25, 'upload/5f2ff00665eec92-926329_invitation-card-png-wedding-card-printing-png.png', '2020-08-09', '2020-08-09'),
(24, 26, 'upload/5f2ff065cd4d1bcard2.jpg', '2020-08-09', '2020-08-09'),
(25, 27, 'upload/5f2ff0c41a3b86224-s.jpg', '2020-08-09', '2020-08-09'),
(26, 28, 'upload/5f2ff25486b986224-s.jpg', '2020-08-09', '2020-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `producttags`
--

CREATE TABLE `producttags` (
  `productTagId` int(10) NOT NULL,
  `productId` int(10) DEFAULT NULL,
  `tagId` int(10) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagId` int(10) NOT NULL,
  `tagName` varchar(50) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `taxId` int(10) NOT NULL,
  `taxName` varchar(10) DEFAULT NULL,
  `taxPercentage` varchar(10) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`taxId`, `taxName`, `taxPercentage`, `insertDate`, `updateDate`) VALUES
(1, 'GST18', '18%', '2020-07-22', '2020-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

CREATE TABLE `usercart` (
  `userCartId` int(10) NOT NULL,
  `customerId` int(10) DEFAULT NULL,
  `productId` int(10) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `withPrint` tinyint(1) DEFAULT 0,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercart`
--

INSERT INTO `usercart` (`userCartId`, `customerId`, `productId`, `quantity`, `insertDate`, `updateDate`, `withPrint`, `file`) VALUES
(3, 2, 9, 700, '2020-08-09', '2020-08-09', 0, ''),
(4, 6, 9, 150, '2020-08-09', '2020-08-09', 0, ''),
(9, 9, 11, 100, '2020-08-12', '2020-08-12', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `roleId` int(10) NOT NULL,
  `roleName` varchar(20) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`roleId`, `roleName`, `insertDate`, `updateDate`) VALUES
(1, 'admin', '2020-07-22', '2020-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `roleId` int(5) DEFAULT NULL,
  `insertDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `activeStatus` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `password`, `roleId`, `insertDate`, `updateDate`, `activeStatus`) VALUES
(1, 'admin@gmail.com', 'Admin@123', 1, '2020-07-22', '2020-07-22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactUsId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD PRIMARY KEY (`customerAddressId`),
  ADD KEY `addressId` (`addressId`);

--
-- Indexes for table `customerprofile`
--
ALTER TABLE `customerprofile`
  ADD PRIMARY KEY (`customerProfileId`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`orderProductId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderStatusId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`paymentMethodId`);

--
-- Indexes for table `paymentstatus`
--
ALTER TABLE `paymentstatus`
  ADD PRIMARY KEY (`paymentStatusId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`productImageId`);

--
-- Indexes for table `producttags`
--
ALTER TABLE `producttags`
  ADD PRIMARY KEY (`productTagId`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagId`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`taxId`);

--
-- Indexes for table `usercart`
--
ALTER TABLE `usercart`
  ADD PRIMARY KEY (`userCartId`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactUsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customeraddress`
--
ALTER TABLE `customeraddress`
  MODIFY `customerAddressId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customerprofile`
--
ALTER TABLE `customerprofile`
  MODIFY `customerProfileId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `orderProductId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `orderStatusId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `paymentMethodId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymentstatus`
--
ALTER TABLE `paymentstatus`
  MODIFY `paymentStatusId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `productImageId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `producttags`
--
ALTER TABLE `producttags`
  MODIFY `productTagId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `taxId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usercart`
--
ALTER TABLE `usercart`
  MODIFY `userCartId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `roleId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD CONSTRAINT `customeraddress_ibfk_1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
