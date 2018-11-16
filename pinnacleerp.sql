-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 04:02 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinnacleerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `email`, `password`) VALUES
(1, 'admin', 'subhashsood08@gmail.com', 'RVJQ');

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE IF NOT EXISTS `companydetails` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `ownerName` varchar(100) NOT NULL,
  `type` varchar(200) NOT NULL,
  `mobileNo` varchar(50) NOT NULL,
  `accountNo` varchar(50) NOT NULL,
  `PANNo` varchar(50) NOT NULL,
  `GSTNo` varchar(50) NOT NULL,
  `startingYear` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mailingPerson` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companydetails`
--

INSERT INTO `companydetails` (`id`, `name`, `ownerName`, `type`, `mobileNo`, `accountNo`, `PANNo`, `GSTNo`, `startingYear`, `address`, `email`, `mailingPerson`) VALUES
(1, 'Subhash Sood Industries', 'Subhash Sood', 'Manufacturing Cycle Parts', '8872867901', '50188161777', 'AAGFM5568B', '0388GFM5568B17', '1995-12-20', 'Plot No. 5. St. No. 3, Friends Colony, Jamalpur, Chandigarh Road, Ludhiana, 141010', 'subhashsood08@gmail.com', 'Subhash Sood');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(20) NOT NULL,
  `companyName` varchar(500) NOT NULL,
  `ownerName` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `companyName`, `ownerName`, `mobile`, `email`, `address`) VALUES
(2, 'Meera Industries', 'Sachin Shirodkar', '7845961236', 'sachin.s@gmail.com', 'Meera iNdustries, St. No. 17, Janta Nagar, Ludhiana'),
(3, 'Eastman', 'Ashwani Mehta', '7845961235', 'ashwaniM@outlook.com', 'Eastman Enterprise, Pratap Chownk, Ludhiana'),
(4, 'Indushox Pvt. Limited', 'Devraj Singh', '8234569779', 'devraj.singh@gmail.com', ' Batra Palace, 259/1, BXIX, Ground Floor, Hotel, Ferozpur Rd, Ludhiana, Punjab 141001'),
(5, 'Kansal Enterprise', 'B.J. Kansal', '9874512368', 'kansal.BJ@yahoo.com', 'S.C.F. 12 C, Sarabha Nagar, Main Market, Above Bikaner Sweets, Ludhiana, Punjab 141002'),
(6, 'Shri Krishna Traders', 'Malik Chand', '8945712365', 'malik23@gmail.com', 'PLOT NO. 106/117 TRANSPORT NAGAR, Ludhiana, Punjab 141003'),
(7, 'Amber Cycle', 'Amber Kohli', '8745123654', 'amberCycles@gmail.com', 'Cycle Market, Ludhiana, Pin Code 141003');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `accountNo` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `salaryLeft` int(100) NOT NULL,
  `contactPerson` varchar(150) NOT NULL,
  `advanceStatus` tinyint(1) NOT NULL,
  `dateOfJoining` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `mobile`, `accountNo`, `salary`, `salaryLeft`, `contactPerson`, `advanceStatus`, `dateOfJoining`) VALUES
(3, 'Sudesh', 'Worker', '8545781248', '45372569815', '12000', 12000, 'Subhash Sood', 0, '0000-00-00'),
(4, 'Lallu (Ram Singar)', 'Worker', '7894512365', '78372869817', '12000', 12000, 'Subhash Sood', 0, '0000-00-00'),
(5, 'Manoj', 'Worker', '9877452365', '14378969815', '12000', 12000, 'Subhash Sood', 0, '0000-00-00'),
(6, 'Amarjeet', 'Worker', '7945812364', '14378967894', '10000', 10000, 'Sudesh', 0, '0000-00-00'),
(7, 'Bahadur', 'Worker', '8947521365', '714578869817', '10000', 10000, 'Sudesh', 0, '0000-00-00'),
(8, 'Munni', 'Worker', '7845692315', '34213567853', '5000', 5000, 'Lallu (Ram Singar)', 0, '0000-00-00'),
(9, 'Shakina', 'Worker', '7178956423', '11207543793', '4500', 4500, 'Lallu (Ram Singar)', 0, '0000-00-00'),
(10, 'Mamta', 'Worker', '7284513645', '47676832190', '5000', 5000, 'Sudesh', 0, '0000-00-00'),
(11, 'Rizwana', 'Worker', '8945612378', '23456452712', '4500', 4500, 'Sudesh', 0, '0000-00-00'),
(12, 'Vrijesh', 'Worker', '9874512362', '14375469815', '11000', 11000, 'Lallu (Ram Singar)', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `type` varchar(200) NOT NULL,
  `size` varchar(500) NOT NULL,
  `code` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `pricePerUnit` int(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `size`, `code`, `quantity`, `pricePerUnit`) VALUES
(7, 'Handle Bar BMX 1', 'Mig Welding', '19 X 50', 'PROD0001', '222', 100),
(8, 'Sandenser', 'Mig Welding', '-', 'PROD0002', '421', 200),
(9, 'Handle Bar BMX 2', 'Mig Welding', '19 X 34', 'PROD0003', '953', 300),
(10, 'Handle Bar BMX 3', 'Mig Welding', '18 X 34', 'PROD0004', '398', 100),
(11, 'BMX', 'Mig Welding', '10 X 34', 'PROD0005', '558', 120),
(12, 'Handle BMX', 'Mig Welding', '9 X 9 inches', 'PROD0006', '756', 580),
(13, 'Phini', 'Mig Welding', '9 X 9 inches', 'PROD0007', '456', 320),
(14, 'Handle Stamp (EMP BA2) 1', 'Self Finishing', '718 X 209 X 165 mm', 'PROD0008', '429', 265),
(15, 'Handle Stamp', 'Self Finishing', '150 X 45 X 27 X 90 X 199 X 150 mm', 'PROD0009', '520', 700),
(16, 'Handle Stamp (TATA)', 'Self Finishing', '190 X 80 X 16 X 190 mm', 'PROD0010', '557', 500),
(17, 'Handle Stamp (ATLAS)', 'Self Finishing', '190 X 80 X 16 X 190 mm', 'PROD0011', '410', 415),
(18, 'Handle Stamp (EMP BA2) 2', 'Self Finishing', '718 X 209 X 180 mm', 'PROD0012', '45', 320);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(20) NOT NULL,
  `purchaseNo` varchar(200) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `itemName` varchar(250) NOT NULL,
  `units` varchar(50) NOT NULL,
  `purchaseDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchaseNo`, `supplier`, `itemName`, `units`, `purchaseDate`) VALUES
(76, 'SSIPUR1811090221', 'Neel Kanth Enterprises', 'Pipe', '10', '2018-11-07'),
(77, 'SSIPUR1811090222', 'Neel Kanth Enterprises', 'Pipe', '10', '2018-11-09'),
(78, 'SSIPUR1811090223', 'Singla Gases', 'Nut Bush', '10', '2018-11-09'),
(79, 'SSIPUR1811090223', 'Singla Gases', 'Migwire', '10', '2018-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(20) NOT NULL,
  `salesNo` varchar(50) NOT NULL,
  `customer` varchar(250) NOT NULL,
  `productName` varchar(250) NOT NULL,
  `units` varchar(100) NOT NULL,
  `price` varchar(200) NOT NULL,
  `orderDate` date NOT NULL,
  `billStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `salesNo`, `customer`, `productName`, `units`, `price`, `orderDate`, `billStatus`) VALUES
(59, 'SSISAL1811090356', 'Eastman', 'Sandenser', '1', '100', '2018-11-07', 1),
(60, 'SSISAL1811090356', 'Eastman', 'Handle BMX', '12', '1200', '2018-11-07', 1),
(61, 'SSISAL1811090356', 'Eastman', 'Handle Bar BMX 3', '45', '4500', '2018-11-07', 1),
(62, 'SSISAL1811090355', 'Eastman', 'Phini', '10', '1000', '2018-11-09', 1),
(63, 'SSISAL1811090355', 'Eastman', 'Sandenser', '1', '100', '2018-11-09', 1),
(64, 'SSISAL1811090355', 'Eastman', 'Handle BMX', '12', '1200', '2018-11-09', 1),
(65, 'SSISAL1811090357', 'Shri Krishna Traders', 'Handle Bar BMX 3', '45', '4500', '2018-11-09', 1),
(66, 'SSISAL1811090357', 'Shri Krishna Traders', 'Phini', '10', '1000', '2018-11-09', 1),
(67, 'SSISAL1811160352', 'Indushox Pvt. Limited', 'Sandenser', '45', '4500', '2018-11-16', 0),
(68, 'SSISAL1811160352', 'Indushox Pvt. Limited', 'BMX', '12', '1200', '2018-11-16', 0),
(69, 'SSISAL1811160352', 'Indushox Pvt. Limited', 'Handle Bar BMX 1', '10', '1000', '2018-11-16', 0),
(70, 'SSISAL1811160352', 'Indushox Pvt. Limited', 'Handle Stamp (TATA)', '11', '1100', '2018-11-16', 0),
(71, 'SSISAL1811160353', 'Amber Cycle', 'Handle Stamp (EMP BA2) 1', '7', '700', '2018-11-16', 0),
(72, 'SSISAL1811160353', 'Amber Cycle', 'BMX', '10', '1000', '2018-11-16', 0),
(73, 'SSISAL1811160353', 'Amber Cycle', 'Handle Stamp (ATLAS)', '46', '4600', '2018-11-16', 0),
(74, 'SSISAL1811160353', 'Amber Cycle', 'Handle Stamp (EMP BA2) 2', '12', '1200', '2018-11-16', 0),
(75, 'SSISAL1811160358', 'Meera Industries', 'Sandenser', '12', '1200', '2018-11-16', 0),
(76, 'SSISAL1811160358', 'Meera Industries', 'Handle Stamp (EMP BA2) 2', '18', '1800', '2018-11-16', 0),
(77, 'SSISAL1811160358', 'Meera Industries', 'Handle Bar BMX 1', '20', '2000', '2018-11-16', 0),
(78, 'SSISAL1811160358', 'Meera Industries', 'Phini', '12', '1200', '2018-11-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(10) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `itemName`, `code`, `quantity`) VALUES
(8, 'Pipe', 'ITEM0001', 5465),
(9, 'Clamp', 'ITEM0002', 7010),
(10, 'Nut Bush', 'ITEM0003', 7010),
(11, 'Migwire', 'ITEM0004', 2010);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(20) NOT NULL,
  `companyName` varchar(250) NOT NULL,
  `ownerName` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `companyName`, `ownerName`, `mobile`, `email`, `address`) VALUES
(1, 'Omega Industries', 'Darshan SIngh', '9877445125', 'omega@yahoo.com', 'Omega Industries, Partap Nagar, Ludhiana'),
(2, 'Neel Kanth Enterprises', 'Naresh B. Singh', '7845961235', 'singh.neelam@yahoo.com', 'Neel Kanth Enterprises, Atam Nagar, Ludhiana'),
(3, 'Singla Gases', 'Ramesh  Singla', '8723546912', 'singlaIndus@yahoo.com', 'Makar Colony, Giaspura, Ludhiana, Punjab 141014'),
(4, 'Shivam Industries', 'Shivam Dyal', '7235445891', 'shivam.dyal@gmail.com', 'Street Number 9, Basant Rd, Partap Nagar, Industrial Area-B, Ludhiana, Punjab 141003'),
(5, 'J.V. Steal', 'J.V. Thakur', '7694125813', 'thakur.JV@outlook.com', 'Dugri Rd, Opposite Atam Nagar Police Chowki, Model Town, Ludhiana, Punjab 141002'),
(6, 'Superstar Firm', 'Mahesh Saini', '8271936545', 'mahesh19@gmail.co ', '1518, Phase 1, Urban Vihar, Urban Estate Dugri, Ludhiana, Punjab 141003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companydetails`
--
ALTER TABLE `companydetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
