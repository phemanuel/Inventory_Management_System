-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 04:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountupgrade`
--

CREATE TABLE `accountupgrade` (
  `id` int(10) NOT NULL,
  `clientname` varchar(50) NOT NULL,
  `currentplan` varchar(50) NOT NULL,
  `upgradeplan` varchar(50) NOT NULL,
  `clientsub` varchar(50) NOT NULL,
  `date1` date DEFAULT NULL,
  `clientprice` varchar(50) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `cplanduedate` date DEFAULT NULL,
  `upgradestatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientcategory`
--

CREATE TABLE `clientcategory` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `clientid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientcategory`
--

INSERT INTO `clientcategory` (`category_id`, `category_name`, `status`, `clientid`) VALUES
(1, 'Couture Pieces', 'Active', 'SUAVEIMS'),
(2, 'Ready to wear', 'Active', 'SUAVEIMS'),
(3, 'Modelling', 'Active', 'SUAVEIMS'),
(4, 'Make-up', 'Active', 'SUAVEIMS'),
(5, 'Pedicure and Manicure', 'Active', 'SUAVEIMS'),
(6, 'Photography', 'Active', 'SUAVEIMS'),
(7, 'Laundry', 'Active', 'SUAVEIMS'),
(8, 'Event Management', 'Active', 'SUAVEIMS'),
(9, 'Apple Gallery', 'Active', 'SUAVEIMS'),
(10, 'Unisex Salon', 'Active', 'SUAVEIMS');

-- --------------------------------------------------------

--
-- Table structure for table `clientreg`
--

CREATE TABLE `clientreg` (
  `id` int(11) NOT NULL,
  `clientname` varchar(50) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `clientpass` varchar(50) NOT NULL,
  `clientstatus` varchar(50) NOT NULL,
  `clientplan` varchar(10) NOT NULL,
  `clienttype` varchar(20) NOT NULL,
  `clientsize` int(20) NOT NULL,
  `clientaddress` text NOT NULL,
  `clientemailaddy` varchar(50) NOT NULL,
  `clientmobileno` varchar(20) NOT NULL,
  `clientlogo` varchar(50) NOT NULL,
  `dateregistered` date DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `clientstorage` varchar(50) NOT NULL,
  `clientsub` varchar(50) NOT NULL,
  `clientpay` varchar(50) NOT NULL,
  `apptype` varchar(100) NOT NULL,
  `appabbrv` varchar(50) NOT NULL,
  `productsize` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `rid` int(10) NOT NULL,
  `customername` varchar(100) NOT NULL,
  `emailaddy` varchar(50) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `birthmonth` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `confirmby` varchar(50) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`rid`, `customername`, `emailaddy`, `mobileno`, `birthday`, `birthmonth`, `gender`, `confirmby`, `clientid`, `status`) VALUES
(1, 'MR FEMI', 'emmakinyooye@gmail.com', '07032689329', '23', 'December', 'Male', 'SUAVEIMS', 'SUAVEIMS', 'Active'),
(2, 'Suave Sales', 'info@suave.com.ng', '08138655011', '1', 'January', 'Male', 'suaveadmin', 'SUAVEIMS', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `product_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `pickup_location` varchar(100) NOT NULL,
  `delivery_location` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `pickup_time` varchar(50) NOT NULL,
  `delivery_time` varchar(50) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `date1` date NOT NULL,
  `clientid` varchar(20) NOT NULL,
  `status` enum('Delivered','Not delivered') NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `confirm_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deptsetup`
--

CREATE TABLE `deptsetup` (
  `deptid` int(10) NOT NULL,
  `deptname` varchar(50) NOT NULL,
  `depthod` varchar(50) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `deptstatus` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deptsetup`
--

INSERT INTO `deptsetup` (`deptid`, `deptname`, `depthod`, `clientid`, `deptstatus`) VALUES
(1, 'ADMIN', 'SUAVE EMPIRE', 'SUAVEIMS', 'Active'),
(2, 'OPERATIONS', 'SUAVE EMPIRE', 'SUAVEIMS', 'Active'),
(3, 'OPERATIONS', 'NILL', 'ISPIMS', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order`
--

CREATE TABLE `inventory_order` (
  `inventory_order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_order_total` double(10,2) NOT NULL,
  `inventory_order_date` date NOT NULL,
  `inventory_order_name` varchar(255) NOT NULL,
  `inventory_order_address` text NOT NULL,
  `payment_status` enum('cash','credit') NOT NULL,
  `inventory_order_status` varchar(100) NOT NULL,
  `inventory_order_created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order_product`
--

CREATE TABLE `inventory_order_product` (
  `inventory_order_product_id` int(11) NOT NULL,
  `inventory_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave1`
--

CREATE TABLE `leave1` (
  `rid` int(10) NOT NULL,
  `applicantname` varchar(100) NOT NULL,
  `applicantno` varchar(20) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `postapplied` varchar(40) NOT NULL,
  `leavetype` varchar(40) NOT NULL,
  `duration` varchar(40) NOT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `approveddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movement`
--

CREATE TABLE `movement` (
  `rid` int(10) NOT NULL,
  `applicantname` varchar(100) NOT NULL,
  `applicantno` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `dept1` varchar(50) NOT NULL,
  `clientid` varchar(100) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `approveddate` date DEFAULT NULL,
  `postapplied` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `storage` varchar(20) NOT NULL,
  `staff` varchar(20) NOT NULL,
  `priceannual` varchar(50) NOT NULL,
  `product` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `name`, `price`, `storage`, `staff`, `priceannual`, `product`) VALUES
(1, 'BASIC', '10000', '2GB', '10', '108000', '200'),
(2, 'STANDARD', '20000', '5GB', '20', '216000', '500'),
(3, 'PROFESSIONAL', '50000', '20GB', '100', '540000', 'Unlimited');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_barcode` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_quantity` varchar(20) NOT NULL,
  `product_unit` varchar(20) NOT NULL,
  `product_base_price` double(10,2) NOT NULL,
  `product_sell_price` double(10,2) NOT NULL,
  `product_enter_by` varchar(30) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `product_status` varchar(30) NOT NULL,
  `product_date` date DEFAULT NULL,
  `clientid` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_barcode`, `category_name`, `product_name`, `product_description`, `product_quantity`, `product_unit`, `product_base_price`, `product_sell_price`, `product_enter_by`, `product_type`, `product_status`, `product_date`, `clientid`, `user_id`) VALUES
(1, 'CP010032', 'Couture Pieces', 'Cap sewing (Ordinary)', 'Cap sewing (Ordinary)', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(2, 'CP010172', 'Couture Pieces', 'Plain Native Wear', 'Plain Native Wear', '1', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(3, 'CP010186', 'Couture Pieces', 'Traditional Attire Sewing Without Embroidary', 'Traditional Attire Sewing Without Embroidary', '1', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(4, 'CP010187', 'Couture Pieces', 'Traditional Attire Sewing With Embroidary', 'Traditional Attire Sewing With Embroidary', '1', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(5, 'CP010188', 'Couture Pieces', 'Top Only', 'Top Only', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(6, 'CP010189', 'Couture Pieces', 'Top Only With Embroidary', 'Top Only With Embroidary', '1', 'Nos', 3000.00, 3000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(7, 'CP010190', 'Couture Pieces', 'Designed Native Wear', 'Designed Native Wear', '1', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(8, 'CP010191', 'Couture Pieces', 'Embroided Native Wear', 'Embroided Native Wear', '1', 'Nos', 6000.00, 6000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(9, 'CP010192', 'Couture Pieces', 'Short Sleeve', 'Short Sleeve', '1', 'Nos', 2500.00, 2500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(10, 'CP010193', 'Couture Pieces', 'Long Sleeve', 'Long Sleeve', '1', 'Nos', 3000.00, 3000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(11, 'CP010194', 'Couture Pieces', 'Knicker Sewing', 'Knicker Sewing', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(12, 'CP010195', 'Couture Pieces', 'Trouser Sewing', 'Trouser Sewing', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(13, 'CP010197', 'Couture Pieces', 'Hausa Cap', 'Hausa Cap', '1', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(14, 'CP010198', 'Couture Pieces', 'Customized Cap', 'Customized Cap', '1', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(15, 'CP010199', 'Couture Pieces', 'Agbada With Complete Embroidery', 'Agbada With Complete Embroidery', '1', 'Nos', 20000.00, 20000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(16, 'CP010200', 'Couture Pieces', 'Agbada With Partial Embroidery', 'Agbada With Partial Embroidery', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(17, 'CP010201', 'Couture Pieces', 'Agbada Without Embroidery', 'Agbada Without Embroidery', '1', 'Nos', 12000.00, 12000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(18, 'CP010202', 'Couture Pieces', 'Blazer Only', 'Blazer Only', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(19, 'CP010203', 'Couture Pieces', 'Complete Suit With Waist Coat', 'Complete Suit With Waist Coat', '1', 'Nos', 25.00, 25.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(20, 'CP010204', 'Couture Pieces', 'Suit with Trouser', 'Suit with Trouser', '1', 'Nos', 20000.00, 20000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(21, 'CP010205', 'Couture Pieces', 'Complete Suit With short & waistcoat', 'Complete Suit With short & waistcoat', '1', 'Nos', 30000.00, 30000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(22, 'CP010264', 'Couture Pieces', 'Cap sewing (Embroidrery/Bead work)', 'Cap sewing (Embroidrery/Bead work)', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(23, '80163', 'Event Management', 'Burial Ceremony Less Than 500 People', 'Burial Ceremony Less Than 500 People', '1', 'Nos', 200000.00, 200000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(24, '80164', 'Event Management', 'Burial Ceremony Less Than 1000 People', 'Burial Ceremony Less Than 1000 People', '1', 'Nos', 300000.00, 300000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(25, '80165', 'Event Management', 'Burial Ceremony Less Than 2000 People', 'Burial Ceremony Less Than 2000 People', '1', 'Nos', 500000.00, 500000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(26, '80166', 'Event Management', 'Burial Ceremony Less Than 3000 People', 'Burial Ceremony Less Than 3000 People', '1', 'Nos', 700000.00, 700000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(27, 'AG080167', 'Event Management', 'Burial Ceremony Less Than 4000 People', 'Burial Ceremony Less Than 4000 People', '1', 'Nos', 850000.00, 850000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(28, 'AG080168', 'Event Management', 'Burial Ceremony Less Than 5000 People', 'Burial Ceremony Less Than 5000 People', '1', 'Nos', 1000000.00, 1000000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(29, 'AG080169', 'Event Management', 'Wedding Ceremony Less Than 500', 'Wedding Ceremony Less Than 500', '1', 'Nos', 220000.00, 220000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(30, 'AG080170', 'Event Management', 'Wedding Ceremony Less Than 1000', 'Wedding Ceremony Less Than 1000', '1', 'Nos', 330000.00, 330000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(31, 'AG080171', 'Event Management', 'Wedding Ceremony Less Than 2000', 'Wedding Ceremony Less Than 2000', '1', 'Nos', 550000.00, 550000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(32, '80173', 'Event Management', 'Wedding Ceremony Less Than 3000 People', 'Wedding Ceremony Less Than 3000 People', '1', 'Nos', 750000.00, 750000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(33, '80174', 'Event Management', 'Wedding Ceremony Less Than 4000 People', 'Wedding Ceremony Less Than 4000 People', '1', 'Nos', 920000.00, 920000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(34, '80175', 'Event Management', 'Wedding Ceremony Less Than 5000 People', 'Wedding Ceremony Less Than 5000 People', '1', 'Nos', 1200000.00, 1200000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(35, '80176', 'Event Management', 'Brithday Ceremony Less Than 200 People', 'Brithday Ceremony Less Than 200 People', '1', 'Nos', 100000.00, 100000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(36, '80177', 'Event Management', 'Brithday Ceremony Less Than 500 People', 'Brithday Ceremony Less Than 500 People', '1', 'Nos', 200000.00, 200000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(37, '80178', 'Event Management', 'Brithday Ceremony Less Than 2000 People', 'Brithday Ceremony Less Than 2000 People', '1', 'Nos', 300000.00, 300000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(38, '80179', 'Event Management', 'Brithday Ceremony Less Than 2000 People', 'Brithday Ceremony Less Than 2000 People', '1', 'Nos', 500000.00, 500000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(39, '80180', 'Event Management', 'Brithday Ceremony Less Than 3000 People', 'Brithday Ceremony Less Than 3000 People', '1', 'Nos', 700000.00, 700000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(40, '80181', 'Event Management', 'Brithday Ceremony Less Than 4000 People', 'Brithday Ceremony Less Than 4000 People', '1', 'Nos', 850000.00, 850000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(41, '80182', 'Event Management', 'Brithday Ceremony Less Than 5000 People', 'Brithday Ceremony Less Than 5000 People', '1', 'Nos', 1000000.00, 1000000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(42, '80183', 'Event Management', 'Aniversary Ceremony Less Than 200 People', 'Aniversary Ceremony Less Than 200 People', '1', 'Nos', 100000.00, 100000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(43, '80184', 'Event Management', 'Special Project Party Less Than 200 People', 'Special Project Party Less Than 200 People', '1', 'Nos', 100000.00, 100000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(44, '80185', 'Event Management', 'Special Party Planing Less Than 200 People', 'Special Party Planing Less Than 200 People', '1', 'Nos', 100000.00, 100000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(45, 'LU070058', 'Laundry', 'Shirt Ironing', 'Shirt Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(46, 'LU070059', 'Laundry', 'Shirt Full Laundry', 'Shirt Full Laundry', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(47, 'LU070060', 'Laundry', 'Trouser Ironing', 'Trouser Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(48, 'LU070061', 'Laundry', 'Trouser Full Laundry', 'Trouser Full Laundry', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(49, 'LU070064', 'Laundry', 'Gown Suit Ironing', 'Gown Suit Ironing', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(50, 'LU070065', 'Laundry', 'Gown Suit Full Laundry', 'Gown Suit Full Laundry', '1', 'Nos', 400.00, 400.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(51, 'LU070066', 'Laundry', 'Jackcet Iroing', 'Jackcet Iroing', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(52, 'LU070067', 'Laundry', 'Jackcet Full Laundry', 'Jackcet Full Laundry', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(53, 'LU070068', 'Laundry', 'Jeans Ironing', 'Jeans Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(54, 'LU070069', 'Laundry', 'Jeans Full Laundry', 'Jeans Full Laundry', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(55, 'LU070070', 'Laundry', 'T-Shirt Ironing', 'T-Shirt Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(56, 'LU070071', 'Laundry', 'T-Shirt  Full Laundry', 'T-Shirt  Full Laundry', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(57, 'LU070072', 'Laundry', 'Polo Ironing', 'Polo Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(58, 'LU070073', 'Laundry', 'Polo  Full Laundry', 'Polo  Full Laundry', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(59, 'LU070074', 'Laundry', 'Gown Ironing', 'Gown Ironing', '1', 'Nos', 150.00, 150.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(60, 'LU070075', 'Laundry', 'Gown Full Laundry', 'Gown Full Laundry', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(61, 'LU070076', 'Laundry', 'Skirt Ironing', 'Skirt Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(62, 'LU070077', 'Laundry', 'Skirt  Full Laundry', 'Skirt  Full Laundry', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(63, 'LU070078', 'Laundry', 'Pyjamas Ironing', 'Pyjamas Ironing', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(64, 'LU070079', 'Laundry', 'Pyjamas  Full Laundry', 'Pyjamas  Full Laundry', '1', 'Nos', 400.00, 400.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(65, 'LU070080', 'Laundry', 'Jalamia Iroing', 'Jalamia Iroing', '1', 'Nos', 150.00, 150.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(66, 'LU070081', 'Laundry', 'Jalamia Full Laundry', 'Jalamia Full Laundry', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(67, 'LU070082', 'Laundry', 'Sweater Ironing', 'Sweater Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(68, 'LU070083', 'Laundry', 'Sweater Full Laundry', 'Sweater Full Laundry', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(69, 'LU070084', 'Laundry', 'Knickers Ironing', 'Knickers Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(70, 'LU070085', 'Laundry', 'Knickers Full Laundry', 'Knickers Full Laundry', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(71, 'LU070086', 'Laundry', 'Knickers Buckers Ironing', 'Knickers Buckers Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(72, 'LU070087', 'Laundry', 'Knickers Buckers Full Laundry', 'Knickers Buckers Full Laundry', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(73, 'LU070088', 'Laundry', 'Children Wears Ironing', 'Children Wears Ironing', '1', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(74, 'LU070089', 'Laundry', 'Children Wear Full Laundry', 'Children Wear Full Laundry', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(75, 'LU070090', 'Laundry', 'Bed Sheet Ironing', 'Bed Sheet Ironing', '1', 'Nos', 150.00, 150.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(76, 'LU070091', 'Laundry', 'Bed Sheet  Full Laundry', 'Bed Sheet  Full Laundry', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(77, 'LU070092', 'Laundry', 'Compelete Agbada Ironing', 'Compelete Agbada Ironing', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(78, 'LU070093', 'Laundry', 'Compelete Agbada  Full Laundry', 'Compelete Agbada  Full Laundry', '1', 'Nos', 700.00, 700.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(79, 'LU070257', 'Laundry', 'Compelete Iro  & Buba Ironing', 'Compelete Iro  & Buba Ironing', '1', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(80, 'LU070258', 'Laundry', 'Compelete Iro  & Buba Full Laundry', 'Compelete Iro  & Buba Full Laundry', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(81, 'LU070259', 'Laundry', 'Duvey Full Laundry', 'Duvey Full Laundry', '1', 'Nos', 700.00, 700.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(82, 'LU070338', 'Laundry', 'Laundry service', 'Laundry service', '1', 'Nos', 3400.00, 3400.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(83, 'MU040325', 'Make-up', 'photography makeup shoot for 30 minute', 'photography makeup shoot for 30 minute', '1', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(84, 'MU040326', 'Make-up', 'photography makeup shoot for 30 minute 20%discount', 'photography makeup shoot for 30 minute 20%discount', '1', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(85, 'MD030152', 'Modelling', 'Modelling Registration', 'Modelling Registration', '1', 'Nos', 10000.00, 10000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(86, 'MD030153', 'Modelling', 'Modelling Traning', 'Modelling Traning', '1', 'Nos', 20000.00, 20000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(87, 'MD030154', 'Modelling', 'Runway Show Within The City', 'Runway Show Within The City', '1', 'Nos', 20000.00, 20000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(88, 'MD030155', 'Modelling', 'Runway Show Outside The City', 'Runway Show Outside The City', '1', 'Nos', 30000.00, 30000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(89, 'MD030156', 'Modelling', 'Ushering Traning', 'Ushering Traning', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(90, 'MD030157', 'Modelling', 'Ushering Work Within the City', 'Ushering Work Within the City', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(91, 'MD030158', 'Modelling', 'Ushering Work Outside the City', 'Ushering Work Outside the City', '1', 'Nos', 30000.00, 30000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(92, 'MD030159', 'Modelling', 'Image Post For Special Effect', 'Image Post For Special Effect', '1', 'Nos', 50000.00, 50000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(93, 'MD030160', 'Modelling', 'Model For Clothing Shoot', 'Model For Clothing Shoot', '1', 'Nos', 20000.00, 20000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(94, 'MD030161', 'Modelling', 'Model For Video shoot', 'Model For Video shoot', '1', 'Nos', 25000.00, 25000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(95, 'MD030162', 'Modelling', 'Facial Modelling For makeup Beauty', 'Facial Modelling For makeup Beauty', '1', 'Nos', 10000.00, 10000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(96, 'PH060101', 'Photography', 'Picture(soft copy)', 'Picture(soft copy)', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(97, 'PH060102', 'Photography', 'Picture (4 x 6)', 'Picture (4 x 6)', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(98, 'PH060103', 'Photography', 'Picture ( 5x7)', 'Picture ( 5x7)', '1', 'Nos', 400.00, 400.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(99, 'PH060104', 'Photography', 'Picture ( 6x9)', 'Picture ( 6x9)', '1', 'Nos', 600.00, 600.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(100, 'PH060105', 'Photography', 'Passport(8 Copies)', 'Passport(8 Copies)', '1', 'Nos', 700.00, 700.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(101, 'PH060106', 'Photography', 'Pic Enlargement(8x10)', 'Pic Enlargement(8x10)', '1', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(102, 'PH060107', 'Photography', 'Pic Enlargement(10x12)', 'Pic Enlargement(10x12)', '1', 'Nos', 5500.00, 5500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(103, 'PH060108', 'Photography', 'Pic Enlargement(12x16)', 'Pic Enlargement(12x16)', '1', 'Nos', 8000.00, 8000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(104, 'PH060109', 'Photography', 'Pic Enlargement(16x20)', 'Pic Enlargement(16x20)', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(105, 'PH060110', 'Photography', 'Pic Enlargement(20x24)', 'Pic Enlargement(20x24)', '1', 'Nos', 25000.00, 25000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(106, 'PH060111', 'Photography', 'Pic Enlargement(24x30)', 'Pic Enlargement(24x30)', '1', 'Nos', 30000.00, 30000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(107, 'PH060112', 'Photography', 'Photo Book(5x14)', 'Photo Book(5x14)', '1', 'Nos', 25000.00, 25000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(108, 'PH060113', 'Photography', 'Photo Book(8x8)', 'Photo Book(8x8)', '1', 'Nos', 30000.00, 30000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(109, 'PH060114', 'Photography', 'Photo Book(8x10)', 'Photo Book(8x10)', '1', 'Nos', 35000.00, 35000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(110, 'PH060115', 'Photography', 'Photo Book(8x12)', 'Photo Book(8x12)', '1', 'Nos', 40000.00, 40000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(111, 'PH060116', 'Photography', 'Photo Book(10x10)', 'Photo Book(10x10)', '1', 'Nos', 45000.00, 45000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(112, 'PH060117', 'Photography', 'Photo Book(10x12)', 'Photo Book(10x12)', '1', 'Nos', 55000.00, 55000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(113, 'PH060118', 'Photography', 'Photo Book(10x16)', 'Photo Book(10x16)', '1', 'Nos', 60000.00, 60000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(114, 'PH060119', 'Photography', 'Photo Book(10x20)', 'Photo Book(10x20)', '1', 'Nos', 70000.00, 70000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(115, 'PH060120', 'Photography', 'Photo Book(10x24)', 'Photo Book(10x24)', '1', 'Nos', 80000.00, 80000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(116, 'PH060121', 'Photography', 'Photo Book(12x12)', 'Photo Book(12x12)', '1', 'Nos', 60000.00, 60000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(117, 'PH060122', 'Photography', 'Photo Book(12x16)', 'Photo Book(12x16)', '1', 'Nos', 80000.00, 80000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(118, 'PH060123', 'Photography', 'Photo Book(12x20)', 'Photo Book(12x20)', '1', 'Nos', 100000.00, 100000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(119, 'PH060124', 'Photography', 'Photo Book(12x24)', 'Photo Book(12x24)', '1', 'Nos', 120000.00, 120000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(120, 'PH060030', 'Photography', 'Soft Copy after printing', 'Soft Copy after printing', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(121, 'PH060224', 'Photography', 'Canadian Passport(8 Copies)', 'Canadian Passport(8 Copies)', '1', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(122, 'PH060225', 'Photography', 'Home Service Passport', 'Home Service Passport', '1', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(123, 'PH060226', 'Photography', 'Per Picture (1 Edited)', 'Per Picture (1 Edited)', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(124, 'PH060227', 'Photography', '30 Minutes (10 Edited, Soft Copies)', '30 Minutes (10 Edited, Soft Copies)', '1', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(125, 'PH060228', 'Photography', '1 Hour (20 Edited, Soft Copies)', '1 Hour (20 Edited, Soft Copies)', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(126, 'PH060229', 'Photography', 'Happy Hour (11:00pm - 4:00am)', 'Happy Hour (11:00pm - 4:00am)', '1', 'Nos', 40000.00, 40000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(127, 'PH060230', 'Photography', 'Home Service Shoot', 'Home Service Shoot', '1', 'Nos', 40000.00, 40000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(128, 'PH060231', 'Photography', 'Studio Session (30 Minutes)', 'Studio Session (30 Minutes)', '1', 'Nos', 4500.00, 4500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(129, 'PH060232', 'Photography', 'Studio Session (45 Minutes)', 'Studio Session (45 Minutes)', '1', 'Nos', 6500.00, 6500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(130, 'PH060233', 'Photography', 'Studio Session (1 hour)', 'Studio Session (1 hour)', '1', 'Nos', 8000.00, 8000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(131, 'PH060234', 'Photography', 'Studio Session (1 hour 30 minutes)', 'Studio Session (1 hour 30 minutes)', '1', 'Nos', 12000.00, 12000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(132, 'PH060235', 'Photography', 'Studio Session (2 hour )', 'Studio Session (2 hour )', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(133, 'PH060236', 'Photography', 'Studio Session (2 hour 30 minutes )', 'Studio Session (2 hour 30 minutes )', '1', 'Nos', 17500.00, 17500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(134, 'PH060237', 'Photography', 'Studio Session (3 hour)', 'Studio Session (3 hour)', '1', 'Nos', 20000.00, 20000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(135, 'PH060238', 'Photography', 'Italian Frame (12 x 16)', 'Italian Frame (12 x 16)', '1', 'Nos', 30000.00, 30000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(136, 'PH060239', 'Photography', 'Italian Frame (16 x 20)', 'Italian Frame (16 x 20)', '1', 'Nos', 60000.00, 60000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(137, 'PH060240', 'Photography', 'Italian Frame (32 x 20)', 'Italian Frame (32 x 20)', '1', 'Nos', 100000.00, 100000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(138, 'PH060241', 'Photography', 'Italian Frame (34 x 40)', 'Italian Frame (34 x 40)', '1', 'Nos', 150000.00, 150000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(139, 'PH060242', 'Photography', 'Italian Frame (40 x 60)', 'Italian Frame (40 x 60)', '1', 'Nos', 200000.00, 200000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(140, 'PH060243', 'Photography', 'Metallic Frame (12 x 16)', 'Metallic Frame (12 x 16)', '1', 'Nos', 50000.00, 50000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(141, 'PH060244', 'Photography', 'Metallic Frame (16 x 20)', 'Metallic Frame (16 x 20)', '1', 'Nos', 140000.00, 140000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(142, 'PH060245', 'Photography', 'Metallic Frame (32 x 20)', 'Metallic Frame (32 x 20)', '1', 'Nos', 180000.00, 180000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(143, 'PH060246', 'Photography', 'Metallic Frame (34 x 40)', 'Metallic Frame (34 x 40)', '1', 'Nos', 230000.00, 230000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(144, 'PH060247', 'Photography', 'Metallic Frame (40 x 60)', 'Metallic Frame (40 x 60)', '1', 'Nos', 280000.00, 280000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(145, 'PH060248', 'Photography', 'Photo Book American (10x10 20 sh,40pg)', 'Photo Book American (10x10 20 sh,40pg)', '1', 'Nos', 160000.00, 160000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(146, 'PH060249', 'Photography', 'Photo Book American (12x12 25 sh,50pg)', 'Photo Book American (12x12 25 sh,50pg)', '1', 'Nos', 250000.00, 250000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(147, 'PH060250', 'Photography', 'Photo Book Leather (10x10 25 sh,50pg)', 'Photo Book Leather (10x10 25 sh,50pg)', '1', 'Nos', 200000.00, 200000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(148, 'PH060251', 'Photography', 'Photo Book Leather (12x12 25 sh,50pg)', 'Photo Book Leather (12x12 25 sh,50pg)', '1', 'Nos', 300000.00, 300000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(149, 'PH060252', 'Photography', 'Photo Book Synthetic High Glow (14x20 30pgs)', 'Photo Book Synthetic High Glow (14x20 30pgs)', '1', 'Nos', 400000.00, 400000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(150, 'PH060253', 'Photography', 'Photo Book Synthetic UHD Glow (14x20 30pgs)', 'Photo Book Synthetic UHD Glow (14x20 30pgs)', '1', 'Nos', 600000.00, 600000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(151, 'PH060254', 'Photography', 'Photo Book Synthetic Glossy Finish (14x20 30pgs)', 'Photo Book Synthetic Glossy Finish (14x20 30pgs)', '1', 'Nos', 800000.00, 800000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(152, 'PH060255', 'Photography', 'Photo Book Matt (14x20 30pgs)', 'Photo Book Matt (14x20 30pgs)', '1', 'Nos', 1000000.00, 1000000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(153, 'PH060256', 'Photography', 'Photo Book Treasure Book Box', 'Photo Book Treasure Book Box', '1', 'Nos', 1300000.00, 1300000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(154, 'PH060327', 'Photography', '30 minutes studio session 20% discount', '30 minutes studio session 20% discount', '1', 'Nos', 5600.00, 5600.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(155, 'PH060223', 'Photography', 'American Passport(8 Copies)', 'American Passport(8 Copies)', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(156, 'RW020322', 'Ready to wear', 'Black and White Armless Jacket with Net Details', 'Black and White Armless Jacket with Net Details', '1', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(157, 'RW020323', 'Ready to wear', 'Round Collar Checkered Blue French Coat', 'Round Collar Checkered Blue French Coat', '1', 'Nos', 24000.00, 24000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(158, 'RW020324', 'Ready to wear', 'Navy Blue Lace Top', 'Navy Blue Lace Top', '2', 'Nos', 9000.00, 9000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(159, 'US100094', 'Unisex Salon', 'Barbing', 'Barbing', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(160, 'US100095', 'Unisex Salon', 'Shaving', 'Shaving', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(161, 'US100096', 'Unisex Salon', 'Barb and Dye', 'Barb and Dye', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(162, 'US100151', 'Unisex Salon', 'Weaving of Hair', 'Weaving of Hair', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(163, 'US100206', 'Unisex Salon', 'Didi', 'Didi', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(164, 'US100207', 'Unisex Salon', 'Ghana weaving Big  Size', 'Ghana weaving Big  Size', '1', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(165, 'US100208', 'Unisex Salon', 'Ghana weaving Small  Size', 'Ghana weaving Small  Size', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(166, 'US100209', 'Unisex Salon', 'Big Braid', 'Big Braid', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(167, 'US100210', 'Unisex Salon', 'Small Braid', 'Small Braid', '1', 'Nos', 3000.00, 3000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(168, 'US100211', 'Unisex Salon', 'Packing Gel', 'Packing Gel', '1', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(169, 'US100212', 'Unisex Salon', 'Retouching', 'Retouching', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(170, 'US100213', 'Unisex Salon', 'Washing & Setting', 'Washing & Setting', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(171, 'US100214', 'Unisex Salon', 'Normal Fixing', 'Normal Fixing', '1', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(172, 'US100215', 'Unisex Salon', 'Crochet', 'Crochet', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(173, 'US100216', 'Unisex Salon', 'Human Hair Fixing', 'Human Hair Fixing', '1', 'Nos', 2500.00, 2500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(174, 'US100217', 'Unisex Salon', 'Natural Weaving With Treatment', 'Natural Weaving With Treatment', '1', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(175, 'US100218', 'Unisex Salon', 'Ordinary Weaving', 'Ordinary Weaving', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(176, 'US100219', 'Unisex Salon', 'Stroll curl', 'Stroll curl', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(177, 'US100220', 'Unisex Salon', 'Washing Of  Hair', 'Washing Of  Hair', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(178, 'US100260', 'Unisex Salon', 'Children Barbing', 'Children Barbing', '1', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(179, 'US100261', 'Unisex Salon', 'Normal Wig Making (Without Attach)', 'Normal Wig Making (Without Attach)', '1', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(180, 'US100262', 'Unisex Salon', 'Full Wig Making (Without Attach)', 'Full Wig Making (Without Attach)', '1', 'Nos', 8000.00, 8000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(181, 'US100263', 'Unisex Salon', 'Wig Treatment', 'Wig Treatment', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(182, 'US100265', 'Unisex Salon', 'Weaving of Hair1', 'Weaving of Hair1', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(183, 'US100306', 'Unisex Salon', 'Wool', 'Wool', '7', 'Nos', 100.00, 100.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(184, 'US100307', 'Unisex Salon', 'Weavon Brush', 'Weavon Brush', '0', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(185, 'US100328', 'Unisex Salon', 'Twist out', 'Twist out', '1', 'Nos', 1200.00, 1200.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(186, 'US100330', 'Unisex Salon', 'Fathia Ghana Weaving', 'Fathia Ghana Weaving', '1', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(187, 'US100331', 'Unisex Salon', 'Tiny braid', 'Tiny braid', '1', 'Nos', 3000.00, 3000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(188, 'US100335', 'Unisex Salon', 'setting of hair', 'setting of hair', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(189, 'US100336', 'Unisex Salon', 'Loosing of hair', 'Loosing of hair', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(190, 'US100337', 'Unisex Salon', 'Natural twist', 'Natural twist', '1', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(191, 'US100339', 'Unisex Salon', 'Short twist', 'Short twist', '1', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Services', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(192, 'US100305', 'Unisex Salon', 'De javu', 'De javu', '4', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(193, 'RW020001', 'Ready to wear', 'Wine Stripped Long Short', 'Wine Stripped Long Short', '0', 'Nos', 9500.00, 9500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(194, 'RW020002', 'Ready to wear', 'Kurduroy Pant with Lace Detail', 'Kurduroy Pant with Lace Detail', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(195, 'RW020003', 'Ready to wear', 'Mustard Native Wear', 'Mustard Native Wear', '0', 'Nos', 11500.00, 11500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(196, 'RW020004', 'Ready to wear', 'Army Green Native&Pant', 'Army Green Native&Pant', '0', 'Nos', 11500.00, 11500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(197, 'RW020005', 'Ready to wear', 'Pitch Native Wear With Zipper Details', 'Pitch Native Wear With Zipper Details', '0', 'Nos', 12000.00, 12000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(198, 'RW020006', 'Ready to wear', 'Navy Blue Checkered Native Wear', 'Navy Blue Checkered Native Wear', '0', 'Nos', 10000.00, 10000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(199, 'RW020007', 'Ready to wear', 'Lemon Green Assymetric Native Wear', 'Lemon Green Assymetric Native Wear', '0', 'Nos', 11500.00, 11500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(200, 'RW020008', 'Ready to wear', 'Pitch Native Wear With Details', 'Pitch Native Wear With Details', '0', 'Nos', 11000.00, 11000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(201, 'RW020009', 'Ready to wear', 'Lemon Green Native Wear With Phoenise Embellishmen', 'Lemon Green Native Wear With Phoenise Embellishment', '0', 'Nos', 11000.00, 11000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(202, 'RW020010', 'Ready to wear', 'Mustard Native Wear With Green & Black Detail', 'Mustard Native Wear With Green & Black Detail', '0', 'Nos', 11500.00, 11500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(203, 'RW020011', 'Ready to wear', 'Zebra Print Senatorial', 'Zebra Print Senatorial', '0', 'Nos', 9500.00, 9500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(204, 'RW020012', 'Ready to wear', 'Black Native Wear With Patchwork Detail', 'Black Native Wear With Patchwork Detail', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(205, 'RW020013', 'Ready to wear', 'Black Native WithThord Print Detail', 'Black Native WithThord Print Detail', '0', 'Nos', 11500.00, 11500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(206, 'RW020014', 'Ready to wear', 'Black Strriped Safari Shirt &pant', 'Black Strriped Safari Shirt &pant', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(207, 'RW020015', 'Ready to wear', 'Zebra Print Kimono', 'Zebra Print Kimono', '0', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(208, 'RW020016', 'Ready to wear', 'Armles Velvet Blaser', 'Armles Velvet Blaser', '0', 'Nos', 14500.00, 14500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(209, 'RW020017', 'Ready to wear', 'Multicolored Stripped Deconstrcted top', 'Multicolored Stripped Deconstrcted top', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(210, 'RW020018', 'Ready to wear', 'Stripped Xsheer Shirt', 'Stripped Xsheer Shirt', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(211, 'RW020019', 'Ready to wear', 'Green African Print Kimono', 'Green African Print Kimono', '0', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(212, 'RW020020', 'Ready to wear', 'Deconstructed Floral Print Tunic', 'Deconstructed Floral Print Tunic', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(213, 'RW020021', 'Ready to wear', 'Wine Stripped Blaser &Pant', 'Wine Stripped Blaser &Pant', '0', 'Nos', 19500.00, 19500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(214, 'RW020022', 'Ready to wear', 'African Print Shirt', 'African Print Shirt', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(215, 'RW020023', 'Ready to wear', 'Kurduroy Pant', 'Kurduroy Pant', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(216, 'RW020024', 'Ready to wear', 'Multicolored Stripped Shirt With lace Detail', 'Multicolored Stripped Shirt With lace Detail', '0', 'Nos', 10500.00, 10500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(217, 'RW020025', 'Ready to wear', 'Pant With Zipper On Side', 'Pant With Zipper On Side', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(218, 'RW020026', 'Ready to wear', 'AZtec crop Top With Black Mesh', 'AZtec crop Top With Black Mesh', '0', 'Nos', 11500.00, 11500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(219, 'RW020027', 'Ready to wear', 'Blue Pant', 'Blue Pant', '0', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(220, 'RW020125', 'Ready to wear', 'Zebra Stripped Dansiki Top', 'Zebra Stripped Dansiki Top', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(221, 'RW020126', 'Ready to wear', 'Mustard Xgreen Assmetrical Tunic', 'Mustard Xgreen Assmetrical Tunic', '0', 'Nos', 11500.00, 11500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(222, 'RW020127', 'Ready to wear', 'Throal Print Silk Shirt', 'Throal Print Silk Shirt', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(223, 'RW020128', 'Ready to wear', 'Checkered Blue Trench Coats', 'Checkered Blue Trench Coats', '0', 'Nos', 14500.00, 14500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(224, 'RW020129', 'Ready to wear', 'Brown Laced Top', 'Brown Laced Top', '0', 'Nos', 9500.00, 9500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(225, 'RW020130', 'Ready to wear', 'Navy Blue Laced Top', 'Navy Blue Laced Top', '0', 'Nos', 9500.00, 9500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(226, 'RW020131', 'Ready to wear', 'Shiny Brown Embellished Shirt', 'Shiny Brown Embellished Shirt', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(227, 'RW020132', 'Ready to wear', 'Black&White Checkered Stripped Pant', 'Black&White Checkered Stripped Pant', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(228, 'RW020133', 'Ready to wear', 'Blue Patterned Pant', 'Blue Patterned Pant', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(229, 'RW020134', 'Ready to wear', 'Green African Print Collarless Shirt', 'Green African Print Collarless Shirt', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(230, 'RW020135', 'Ready to wear', 'Multi Stripped Shirt With Lace', 'Multi Stripped Shirt With Lace', '0', 'Nos', 10500.00, 10500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(231, 'RW020136', 'Ready to wear', 'Green African Print Cropped Top', 'Green African Print Cropped Top', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(232, 'RW020137', 'Ready to wear', 'Long Sleeved Green Aztee Top', 'Long Sleeved Green Aztee Top', '0', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(233, 'RW020138', 'Ready to wear', 'Short Sleeved Green Aztee Top', 'Short Sleeved Green Aztee Top', '0', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(234, 'RW020139', 'Ready to wear', 'Yellow X Black Long Sleeved Top', 'Yellow X Black Long Sleeved Top', '0', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(235, 'RW020140', 'Ready to wear', 'Yellow X Black Short Sleeved Top', 'Yellow X Black Short Sleeved Top', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(236, 'RW020141', 'Ready to wear', 'Chrey &Pink Sweat Shirt', 'Chrey &Pink Sweat Shirt', '0', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(237, 'RW020142', 'Ready to wear', 'Blue Multipatterned Sweat Shirt', 'Blue Multipatterned Sweat Shirt', '0', 'Nos', 7500.00, 7500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(238, 'RW020143', 'Ready to wear', 'Mustard X Print Pant', 'Mustard X Print Pant', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(239, 'RW020144', 'Ready to wear', 'Black &Grey Long Sleeve T shirt', 'Black &Grey Long Sleeve T shirt', '0', 'Nos', 6000.00, 6000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(240, 'RW020145', 'Ready to wear', 'Green African Print Top', 'Green African Print Top', '0', 'Nos', 6000.00, 6000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(241, 'RW020146', 'Ready to wear', 'Black Pant With Rubber Detail Waist', 'Black Pant With Rubber Detail Waist', '0', 'Nos', 6000.00, 6000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(242, 'RW020147', 'Ready to wear', 'Black Seeltoru Armless', 'Black Seeltoru Armless', '0', 'Nos', 6500.00, 6500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(243, 'RW020150', 'Ready to wear', 'Blue Aztec complete joggers set', 'Blue Aztec complete joggers set', '0', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(244, 'RW020031', 'Ready to wear', 'Teal Green Native', 'Teal Green Native', '0', 'Nos', 11000.00, 11000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(245, 'RW020221', 'Ready to wear', 'dd', 'dd', '0', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(246, 'RW020266', 'Ready to wear', 'Green Native', 'Green Native', '0', 'Nos', 18.00, 18.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(247, 'RW020267', 'Ready to wear', 'Green Native Attire', 'Green Native Attire', '0', 'Nos', 18500.00, 18500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(248, 'RW020268', 'Ready to wear', 'Green Native with ankara pocket details', 'Green Native with ankara pocket details', '0', 'Nos', 18500.00, 18500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(249, 'RW020269', 'Ready to wear', 'Green Native with ankara pocket details', 'Green Native with ankara pocket details', '0', 'Nos', 18500.00, 18500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(250, 'RW020270', 'Ready to wear', 'Gold Pant With Multicoloured Details', 'Gold Pant With Multicoloured Details', '1', 'Nos', 4500.00, 4500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(251, 'RW020271', 'Ready to wear', 'Army Green Kurduroy Pant', 'Army Green Kurduroy Pant', '2', 'Nos', 6000.00, 6000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(252, 'RW020272', 'Ready to wear', 'Burnt Gold Casual Trouser', 'Burnt Gold Casual Trouser', '1', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(253, 'RW020273', 'Ready to wear', 'Blue Pant With Zip Details', 'Blue Pant With Zip Details', '0', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(254, 'RW020274', 'Ready to wear', 'Blue Short Jean', 'Blue Short Jean', '0', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(255, 'RW020275', 'Ready to wear', 'Blue Multicoloured Ankara Pant', 'Blue Multicoloured Ankara Pant', '0', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(256, 'RW020276', 'Ready to wear', 'Pink Casual Pant Trouser', 'Pink Casual Pant Trouser', '0', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(257, 'RW020277', 'Ready to wear', 'Navy Blue Striped Female Suit', 'Navy Blue Striped Female Suit', '0', 'Nos', 20000.00, 20000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(258, 'RW020278', 'Ready to wear', 'Black Checkered Double Breasted Suit', 'Black Checkered Double Breasted Suit', '1', 'Nos', 21500.00, 21500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(259, 'RW020279', 'Ready to wear', 'Grey Stripe Suit', 'Grey Stripe Suit', '1', 'Nos', 21500.00, 21500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(260, 'RW020280', 'Ready to wear', 'Plain Black Office Suit', 'Plain Black Office Suit', '1', 'Nos', 21000.00, 21000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(261, 'RW020281', 'Ready to wear', 'Round Collar Black Leather Blazer With African Pri', 'Round Collar Black Leather Blazer With African Print Details', '0', 'Nos', 17500.00, 17500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(262, 'RW020282', 'Ready to wear', 'Black and White Armless Jacket With Net Details', 'Black and White Armless Jacket With Net Details', '1', 'Nos', 7000.00, 7000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(263, 'RW020283', 'Ready to wear', 'Round Collar Checkered Blue French Coat', 'Round Collar Checkered Blue French Coat', '1', 'Nos', 24000.00, 24000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(264, 'RW020284', 'Ready to wear', 'Blue Black Korean Jacket', 'Blue Black Korean Jacket', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(265, 'RW020285', 'Ready to wear', 'Grey Lemon Army green Designer Suit With Foil Deta', 'Grey Lemon Army green Designer Suit With Foil Details', '1', 'Nos', 28000.00, 28000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(266, 'RW020286', 'Ready to wear', 'Blue, Orange Designer Suit With Foil Details', 'Blue, Orange Designer Suit With Foil Details', '1', 'Nos', 26500.00, 26500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(267, 'RW020287', 'Ready to wear', 'Grey, Black Designer Suit With Foil Details', 'Grey, Black Designer Suit With Foil Details', '1', 'Nos', 19000.00, 19000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1);
INSERT INTO `product` (`product_id`, `product_barcode`, `category_name`, `product_name`, `product_description`, `product_quantity`, `product_unit`, `product_base_price`, `product_sell_price`, `product_enter_by`, `product_type`, `product_status`, `product_date`, `clientid`, `user_id`) VALUES
(268, 'RW020288', 'Ready to wear', 'Black and White Office Wear', 'Black and White Office Wear', '1', 'Nos', 18500.00, 18500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(269, 'RW020289', 'Ready to wear', 'Armless Velvet Blazer', 'Armless Velvet Blazer', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(270, 'RW020290', 'Ready to wear', 'African Print Short Armless Jacket', 'African Print Short Armless Jacket', '1', 'Nos', 9000.00, 9000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(271, 'RW020291', 'Ready to wear', 'Light Mint Green With Floral and Net Details Top', 'Light Mint Green With Floral and Net Details Top', '1', 'Nos', 9000.00, 9000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(272, 'RW020292', 'Ready to wear', 'Navy Blue Laced Top', 'Navy Blue Laced Top', '2', 'Nos', 9000.00, 9000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(273, 'RW020293', 'Ready to wear', 'Gold and Brown Shirt with Lace Details', 'Gold and Brown Shirt with Lace Details', '1', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(274, 'RW020294', 'Ready to wear', 'Grey, Lemon, Army green Top', 'Grey, Lemon, Army green Top', '0', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(275, 'RW020295', 'Ready to wear', 'Chocolate Brown Laced Top', 'Chocolate Brown Laced Top', '1', 'Nos', 9000.00, 9000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(276, 'RW020296', 'Ready to wear', 'Green Checkered Top with Net Details', 'Green Checkered Top with Net Details', '1', 'Nos', 4500.00, 4500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(277, 'RW020297', 'Ready to wear', 'Black Net Designer Top with Blue Checkered Details', 'Black Net Designer Top with Blue Checkered Details', '1', 'Nos', 8500.00, 8500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(278, 'RW020298', 'Ready to wear', 'White Top with Leopard Details', 'White Top with Leopard Details', '1', 'Nos', 6000.00, 6000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(279, 'RW020299', 'Ready to wear', 'Cream Top with Leopard Details', 'Cream Top with Leopard Details', '1', 'Nos', 6000.00, 6000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(280, 'RW020300', 'Ready to wear', 'Embroided Army Green Native with Noen Details', 'Embroided Army Green Native with Noen Details', '1', 'Nos', 18500.00, 18500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(281, 'RW020301', 'Ready to wear', 'Embroided Light Brown Native with Chocolate Detail', 'Embroided Light Brown Native with Chocolate Details', '1', 'Nos', 18500.00, 18500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(282, 'RW020302', 'Ready to wear', 'White and Black Native', 'White and Black Native', '1', 'Nos', 16500.00, 16500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(283, 'RW020303', 'Ready to wear', 'Wine Stripe Native', 'Wine Stripe Native', '1', 'Nos', 16000.00, 16000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(284, 'RW020304', 'Ready to wear', 'Lemon and White Native with Floral Details', 'Lemon and White Native with Floral Details', '1', 'Nos', 15000.00, 15000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(285, 'RW020334', 'Ready to wear', 'Design Native wear', 'Design Native wear', '15', 'Nos', 25000.00, 25000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(286, 'US100028', 'Unisex Salon', 'Weavon Gloss', 'Weavon Gloss', '12', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(287, 'US100029', 'Unisex Salon', 'Andrea  Hair Oil', 'Andrea  Hair Oil', '0', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(288, 'US100030', 'Unisex Salon', 'Subaru Die Gold', 'Subaru Die Gold', '0', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(289, 'US100031', 'Unisex Salon', 'Subaru Die Wine', 'Subaru Die Wine', '0', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(290, 'US100032', 'Unisex Salon', 'Above OIl Sheen', 'Above OIl Sheen', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(291, 'US100033', 'Unisex Salon', 'Hollywood Beez&Wax', 'Hollywood Beez&Wax', '3', 'Nos', 2500.00, 2500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(292, 'US100034', 'Unisex Salon', 'So-Fine Hair Cream', 'So-Fine Hair Cream', '0', 'Nos', 400.00, 400.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(293, 'US100035', 'Unisex Salon', 'Cruset Die Black', 'Cruset Die Black', '0', 'Nos', 600.00, 600.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(294, 'US100036', 'Unisex Salon', 'Mega Growth Relaxer', 'Mega Growth Relaxer', '10', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(295, 'US100037', 'Unisex Salon', 'Olive Oil  Relaxer', 'Olive Oil  Relaxer', '16', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(296, 'US100038', 'Unisex Salon', 'Nova  Hair Spray', 'Nova  Hair Spray', '2', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(297, 'US100039', 'Unisex Salon', 'Spritz Spray Gel', 'Spritz Spray Gel', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(298, 'US100040', 'Unisex Salon', 'Anti-Dandruff Hair Cream', 'Anti-Dandruff Hair Cream', '0', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(299, 'US100041', 'Unisex Salon', 'Dallas Crul Activaror', 'Dallas Crul Activaror', '0', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(300, 'US100042', 'Unisex Salon', 'Ozone Relaxer', 'Ozone Relaxer', '1', 'Nos', 250.00, 250.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(301, 'US100043', 'Unisex Salon', 'Ebony Relaxer', 'Ebony Relaxer', '0', 'Nos', 400.00, 400.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(302, 'US100044', 'Unisex Salon', 'Soulmate Relaxer (Medium)', 'Soulmate Relaxer (Medium)', '2', 'Nos', 350.00, 350.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(303, 'US100045', 'Unisex Salon', 'Beva Relaxer', 'Beva Relaxer', '0', 'Nos', 250.00, 250.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(304, 'US100046', 'Unisex Salon', 'Real Shampoo', 'Real Shampoo', '0', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(305, 'US100047', 'Unisex Salon', 'Real Hair Conditioner', 'Real Hair Conditioner', '7', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(306, 'US100048', 'Unisex Salon', 'Vinoz Shampoo', 'Vinoz Shampoo', '0', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(307, 'US100049', 'Unisex Salon', 'Vinoz conditioner', 'Vinoz conditioner', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(308, 'US100050', 'Unisex Salon', 'Apple Hair Cream', 'Apple Hair Cream', '0', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(309, 'US100051', 'Unisex Salon', 'Rich Braid', 'Rich Braid', '1', 'Nos', 1400.00, 1400.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(310, 'US100052', 'Unisex Salon', 'Ultra Braid (black)', 'Ultra Braid (black)', '4', 'Nos', 1200.00, 1200.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(311, 'US100053', 'Unisex Salon', 'Darling Superstar', 'Darling Superstar', '0', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(312, 'US100054', 'Unisex Salon', 'Super Braid', 'Super Braid', '0', 'Nos', 2000.00, 2000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(313, 'US100055', 'Unisex Salon', 'Easy Braid', 'Easy Braid', '0', 'Nos', 600.00, 600.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(314, 'US100056', 'Unisex Salon', 'Expression Ring Bob', 'Expression Ring Bob', '9', 'Nos', 1400.00, 1400.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(315, 'US100097', 'Unisex Salon', '4 Flowers', '4 Flowers', '11', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(316, 'US100098', 'Unisex Salon', 'Daniella', 'Daniella', '0', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(317, 'US100099', 'Unisex Salon', 'Nobel Super Amazing', 'Nobel Super Amazing', '0', 'Nos', 1800.00, 1800.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(318, 'US100100', 'Unisex Salon', 'Darling Sherry', 'Darling Sherry', '12', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(319, 'US100148', 'Unisex Salon', 'Relax  Relaxer', 'Relax  Relaxer', '0', 'Nos', 250.00, 250.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(320, 'US100308', 'Unisex Salon', 'Shower Gel', 'Shower Gel', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(321, 'US100309', 'Unisex Salon', 'Comb', 'Comb', '7', 'Nos', 300.00, 300.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(322, 'US100310', 'Unisex Salon', 'Soul mate Relaxer (Big)', 'Soul mate Relaxer (Big)', '1', 'Nos', 500.00, 500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(323, 'US100311', 'Unisex Salon', 'Emily Millionaire', 'Emily Millionaire', '1', 'Nos', 800.00, 800.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(324, 'US100312', 'Unisex Salon', 'Curly Twist', 'Curly Twist', '4', 'Nos', 1200.00, 1200.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(325, 'US100313', 'Unisex Salon', 'Noble Gold', 'Noble Gold', '2', 'Nos', 4000.00, 4000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(326, 'US100314', 'Unisex Salon', 'Daniella Weavon', 'Daniella Weavon', '9', 'Nos', 700.00, 700.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(327, 'US100315', 'Unisex Salon', 'Braided Wig', 'Braided Wig', '1', 'Nos', 12.00, 12.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(328, 'US100316', 'Unisex Salon', 'Shower Cap', 'Shower Cap', '3', 'Nos', 200.00, 200.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(329, 'US100317', 'Unisex Salon', 'Score Cap', 'Score Cap', '1', 'Nos', 5000.00, 5000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(330, 'US100318', 'Unisex Salon', 'Long Curly wig', 'Long Curly wig', '1', 'Nos', 10.00, 10.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(331, 'US100319', 'Unisex Salon', 'Wine and Black Curly wig', 'Wine and Black Curly wig', '1', 'Nos', 10.00, 10.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(332, 'US100320', 'Unisex Salon', 'Short Water Curls wig', 'Short Water Curls wig', '1', 'Nos', 12.00, 12.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(333, 'US100329', 'Unisex Salon', 'Ultra Braid (coloured)', 'Ultra Braid (coloured)', '0', 'Nos', 1200.00, 1200.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(334, 'US100332', 'Unisex Salon', 'Shower gel', 'Shower gel', '1', 'Nos', 1000.00, 1000.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1),
(335, 'US100333', 'Unisex Salon', 'Nice hair', 'Nice hair', '0', 'Nos', 1500.00, 1500.00, 'SUAVE ADMIN', 'Product', 'Active', '0000-00-00', 'SUAVEIMS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profitloss`
--

CREATE TABLE `profitloss` (
  `rid` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `transid` varchar(50) NOT NULL,
  `credit` double(10,2) NOT NULL,
  `debit` double(10,2) NOT NULL,
  `paymenttype` varchar(50) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `transdate` date DEFAULT NULL,
  `transtime` varchar(50) NOT NULL,
  `confirmby` varchar(50) NOT NULL,
  `month1` varchar(20) NOT NULL,
  `year1` int(10) NOT NULL,
  `narration` text,
  `transstatus` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `rid` int(10) NOT NULL,
  `applicantname` varchar(100) NOT NULL,
  `applicantno` varchar(20) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `postapplied` varchar(50) NOT NULL,
  `currentpost` varchar(50) NOT NULL,
  `salarymonth` varchar(50) NOT NULL,
  `salaryannual` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `clientid` varchar(100) NOT NULL,
  `approveddate` date DEFAULT NULL,
  `approvedby` varchar(50) NOT NULL,
  `psalary` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pid` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `itemname` varchar(300) NOT NULL,
  `itemsupplier` varchar(100) NOT NULL,
  `itemquantity` varchar(50) NOT NULL,
  `paymentmode` varchar(20) NOT NULL,
  `approvedby` varchar(20) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `purchasedate` date DEFAULT NULL,
  `clientid` varchar(50) NOT NULL,
  `itemunit` varchar(50) NOT NULL,
  `confirmby` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `dept` varchar(50) NOT NULL,
  `month1` varchar(50) NOT NULL,
  `year1` varchar(50) NOT NULL,
  `purchaseid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `rid` int(10) NOT NULL,
  `applicantno` varchar(20) NOT NULL,
  `applicantname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(2) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `postapplied` varchar(100) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `hod` varchar(50) NOT NULL,
  `interviewdate` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `date1` date DEFAULT NULL,
  `mobileno` varchar(20) NOT NULL,
  `emailaddy` varchar(40) NOT NULL,
  `clientid` varchar(40) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `maritalstatus` varchar(50) NOT NULL,
  `kinname` varchar(100) NOT NULL,
  `kinphone` varchar(20) NOT NULL,
  `salarymonth` varchar(50) NOT NULL,
  `salaryannual` varchar(50) NOT NULL,
  `appointmentdate` date DEFAULT NULL,
  `confirmby` varchar(50) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankacct` varchar(50) NOT NULL,
  `college` varchar(100) NOT NULL,
  `collegeyear` varchar(20) NOT NULL,
  `picturename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`rid`, `applicantno`, `applicantname`, `address`, `age`, `qualification`, `postapplied`, `dept`, `hod`, `interviewdate`, `status`, `date1`, `mobileno`, `emailaddy`, `clientid`, `nationality`, `state`, `gender`, `maritalstatus`, `kinname`, `kinphone`, `salarymonth`, `salaryannual`, `appointmentdate`, `confirmby`, `bankname`, `bankacct`, `college`, `collegeyear`, `picturename`) VALUES
(1, '2021973821', 'ADMIN', 'IBADAN', 30, 'Bsc. in Computer Science', 'Admin Officer', 'ADMIN', 'SUAVE EMPIRE', '2021-08-02', 'Active', '2021-08-02', '07032689329', 'emmanexitconsult@gmail.com', 'SUAVEIMS', 'NIGERIA', 'OYO', 'MALE', 'MARRIED', 'NILL', 'NILL', 'NILL', 'NILL', '2021-08-02', 'SUAVE EMPIRE', 'NILL', 'NILL', 'NILL', 'NILL', 'blank.jpg'),
(2, '2021620800', 'OLABODE IFEOLUWA TOSIN', 'IBADAN', 34, 'Bsc. in Computer Science', 'Business Development Officer', 'OPERATIONS', 'SUAVE EMPIRE', '2021-08-03', 'Active', '2021-08-03', '08034271855', 'ifetosin@gmail.com', 'SUAVEIMS', 'NIGERIA', 'OYO', 'MALE', 'MARRIED', 'NILL', 'NILL', 'NILL', 'NILL', '2021-08-03', 'SUAVE ADMIN', 'NILL', 'NILL', 'NILL', 'NILL', 'blank.jpg'),
(3, '2021963043', 'ISP ADMIN', 'Arisekola complex, block F8, shop 183/184', 30, 'Bsc. in Computer Science', 'Admin Officer', 'OPERATIONS', 'NILL', '2021-08-09', 'Active', '2021-08-09', '08064400316', 'ispmulticoncepts@gmail.com', 'ISPIMS', 'NIGERIA', 'OYO', 'MALE', 'MARRIED', 'NILL', 'NILL', 'NILL', 'NILL', '2021-08-09', 'ISP MULTICONCEPTS', 'NILL', 'NILL', 'NILL', 'NILL', 'blank.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staffexit`
--

CREATE TABLE `staffexit` (
  `rid` int(10) NOT NULL,
  `applicantname` varchar(100) NOT NULL,
  `applicantno` varchar(20) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `postapplied` varchar(30) NOT NULL,
  `exitreason` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL,
  `clientid` varchar(100) NOT NULL,
  `approveddate` varchar(30) NOT NULL,
  `approvedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `rid` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `supplyid` varchar(50) NOT NULL,
  `itemid` int(10) NOT NULL,
  `itembarcode` varchar(50) NOT NULL,
  `itemprice` double(10,2) NOT NULL,
  `itembaseprice` double(10,2) NOT NULL,
  `itemquantity` varchar(50) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itemunit` varchar(50) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `supplydate` date DEFAULT NULL,
  `amount` double(10,2) NOT NULL,
  `product_profit` double(10,2) NOT NULL,
  `confirmby` varchar(50) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `month1` varchar(20) DEFAULT NULL,
  `year1` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supply1`
--

CREATE TABLE `supply1` (
  `rid` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `supplyid` varchar(50) NOT NULL,
  `totalquantity` int(10) NOT NULL,
  `totalamount` double(10,2) NOT NULL,
  `finalamount` double(10,2) NOT NULL,
  `discount` int(10) NOT NULL,
  `discountconfirm` varchar(20) NOT NULL,
  `totalprofit` double(10,2) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `supplydate` date DEFAULT NULL,
  `confirmby` varchar(50) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `itemsupplier` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `transstatus` enum('Active','Inactive') NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `month1` varchar(20) NOT NULL,
  `year1` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_chat_messages`
--

CREATE TABLE `s_chat_messages` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time1` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_chat_messages`
--

INSERT INTO `s_chat_messages` (`id`, `user`, `message`, `time1`) VALUES
(1, 'User1', 'hello its femi', 1594336230),
(2, 'User1', 'is anyone there', 1594336243);

-- --------------------------------------------------------

--
-- Table structure for table `trading`
--

CREATE TABLE `trading` (
  `customer_rate` double(10,2) NOT NULL,
  `amount_sold` double(10,2) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `card_amount` double(10,2) NOT NULL,
  `card_rate` double(10,2) NOT NULL,
  `rmb_value` double(10,2) NOT NULL,
  `profit` double(10,2) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `date1` date NOT NULL,
  `time1` varchar(10) NOT NULL,
  `confirm_by` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trading`
--

INSERT INTO `trading` (`customer_rate`, `amount_sold`, `vendor_name`, `customer_name`, `card_name`, `card_amount`, `card_rate`, `rmb_value`, `profit`, `mobile_no`, `date1`, `time1`, `confirm_by`, `product_id`, `clientid`, `status`) VALUES
(150.00, 600.00, 'ISP', 'AKINYOOYE FEMI', 'AMAZON', 500.00, 200.00, 3.00, 450.00, '07032689329', '2021-08-09', '03:17:47pm', 'ISP ADMIN', 1, 'ISPIMS', 'Active'),
(100.00, 300.00, 'ISP', 'ADELABU TOPE', 'AMAZON', 450.00, 150.00, 2.00, 200.00, '08034271855', '2021-08-09', '03:43:43pm', 'ISP ADMIN', 2, 'ISPIMS', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `rid` int(10) NOT NULL,
  `applicantno` varchar(20) NOT NULL,
  `applicantname` varchar(100) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `postapplied` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `clientid` varchar(100) NOT NULL,
  `approveddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `clientid` varchar(10) NOT NULL,
  `ADM` varchar(20) NOT NULL,
  `PMG` varchar(20) NOT NULL,
  `WMG` varchar(20) DEFAULT NULL,
  `CMG` varchar(20) NOT NULL,
  `HRG` varchar(20) NOT NULL,
  `AMG` varchar(20) NOT NULL,
  `RPT` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `SMG` varchar(50) NOT NULL,
  `apptype` varchar(100) NOT NULL,
  `appabbrv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`, `clientid`, `ADM`, `PMG`, `WMG`, `CMG`, `HRG`, `AMG`, `RPT`, `department`, `SMG`, `apptype`, `appabbrv`) VALUES
(1, 'suaveadmin', 'suave2021', 'SUAVE ADMIN', 'user', 'Active', 'SUAVEIMS', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'ADMIN', 'Enable', 'INVENTORY MANAGEMENT SYSTEM', 'IMS'),
(2, 'ifetosin', 'ife2021', 'OLABODE IFEOLUWA TOSIN', 'user', 'Active', 'SUAVEIMS', 'Disable', 'Disable', 'Disable', 'Disable', 'Enable', 'Disable', 'Disable', 'OPERATIONS', 'Enable', 'INVENTORY MANAGEMENT SYSTEM', 'IMS'),
(3, 'ispadmin', 'ispadmin@2021', 'ISP ADMIN', 'master', 'Active', 'ISPIMS', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'OPERATIONS', 'Enable', 'INVENTORY MANAGEMENT SYSTEM', 'IMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountupgrade`
--
ALTER TABLE `accountupgrade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `clientcategory`
--
ALTER TABLE `clientcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clientreg`
--
ALTER TABLE `clientreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `deptsetup`
--
ALTER TABLE `deptsetup`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `inventory_order`
--
ALTER TABLE `inventory_order`
  ADD PRIMARY KEY (`inventory_order_id`);

--
-- Indexes for table `inventory_order_product`
--
ALTER TABLE `inventory_order_product`
  ADD PRIMARY KEY (`inventory_order_product_id`);

--
-- Indexes for table `leave1`
--
ALTER TABLE `leave1`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `movement`
--
ALTER TABLE `movement`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `profitloss`
--
ALTER TABLE `profitloss`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `staffexit`
--
ALTER TABLE `staffexit`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `supply1`
--
ALTER TABLE `supply1`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `s_chat_messages`
--
ALTER TABLE `s_chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trading`
--
ALTER TABLE `trading`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountupgrade`
--
ALTER TABLE `accountupgrade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientcategory`
--
ALTER TABLE `clientcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clientreg`
--
ALTER TABLE `clientreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deptsetup`
--
ALTER TABLE `deptsetup`
  MODIFY `deptid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory_order`
--
ALTER TABLE `inventory_order`
  MODIFY `inventory_order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_order_product`
--
ALTER TABLE `inventory_order_product`
  MODIFY `inventory_order_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave1`
--
ALTER TABLE `leave1`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movement`
--
ALTER TABLE `movement`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `profitloss`
--
ALTER TABLE `profitloss`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffexit`
--
ALTER TABLE `staffexit`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply1`
--
ALTER TABLE `supply1`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_chat_messages`
--
ALTER TABLE `s_chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trading`
--
ALTER TABLE `trading`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
