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
-- Database: `eitc`
--

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

--
-- Dumping data for table `clientreg`
--

INSERT INTO `clientreg` (`id`, `clientname`, `clientid`, `clientpass`, `clientstatus`, `clientplan`, `clienttype`, `clientsize`, `clientaddress`, `clientemailaddy`, `clientmobileno`, `clientlogo`, `dateregistered`, `startdate`, `duedate`, `clientstorage`, `clientsub`, `clientpay`, `apptype`, `appabbrv`, `productsize`) VALUES
(1, 'SUAVE EMPIRE', 'SUAVEIMS', 'SUAVEIMS2021', 'Active', '12', 'BASIC', 10, 'NILL', 'info@suave.com.ng', '08138655011', 'SUAVEIMS.jpg', '2021-08-02', '2021-08-02', '2022-06-01', '2GB', 'Annually', '108000', 'INVENTORY MANAGEMENT SYSTEM', 'IMS', '1000'),
(2, 'ISP MULTICONCEPTS', 'ISPIMS', 'ISPIMS2021', 'Active', '6', 'PROFESSIONAL', 100, 'Arisekola complex, block F8, shop 183/184, bodija Ibadan', 'ispmulticoncepts@gmail.com', '08064400316', 'ISPIMS.jpg', '2021-08-09', '2021-08-09', '2022-01-07', '20GB', 'Annually', '540000', 'INVENTORY MANAGEMENT SYSTEM', 'IMS', 'Unlimited');

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
(1, 'SUAVEIMS', 'SUAVEIMS2021', 'SUAVE EMPIRE', 'master', 'Active', 'SUAVEIMS', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Admin', 'Enable', 'INVENTORY MANAGEMENT SYSTEM', 'IMS'),
(2, 'ISPIMS', 'ISPIMS2021', 'ISP MULTICONCEPTS', 'master', 'Active', 'ISPIMS', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Enable', 'Admin', 'Enable', 'INVENTORY MANAGEMENT SYSTEM', 'IMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientreg`
--
ALTER TABLE `clientreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientreg`
--
ALTER TABLE `clientreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
