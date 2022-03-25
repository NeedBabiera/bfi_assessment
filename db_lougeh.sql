-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 02:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lougeh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` bigint(50) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_contactNo` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_name`, `cust_address`, `cust_contactNo`) VALUES
(1, 'shaira mokalid123', ' Cotabato city', 9057481746),
(2, 'bibi', ' cotabato', 9889),
(3, 'asdasd', 'asdasd', 0),
(5, 'adsad', 'asdasdas', 0),
(6, 'test123', 'hgawdasd', 123213),
(7, 'adsad', 'asdasdas', 5123412321);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod`
--

CREATE TABLE `tbl_prod` (
  `prod_id` bigint(30) NOT NULL,
  `prod_barcode` varchar(50) NOT NULL,
  `prod_desc` varchar(50) NOT NULL,
  `prod_qty` bigint(50) NOT NULL,
  `prod_cost` decimal(18,2) NOT NULL,
  `prod_price` decimal(18,2) NOT NULL,
  `prod_active` tinyint(1) NOT NULL,
  `supp_id` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prod`
--

INSERT INTO `tbl_prod` (`prod_id`, `prod_barcode`, `prod_desc`, `prod_qty`, `prod_cost`, `prod_price`, `prod_active`, `supp_id`) VALUES
(12, '12345', 'prod5', 100, '3.00', '5.00', 0, 713),
(13, '12321321gg', 'asdsasdsa', 100, '2.00', '5.00', 0, 711),
(14, '1321321', 'asdasdas', 100, '1.00', '1.00', 0, 712);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salestransaction`
--

CREATE TABLE `tbl_salestransaction` (
  `sales_id` bigint(50) NOT NULL,
  `customer_id` bigint(50) NOT NULL,
  `product_id` bigint(50) NOT NULL,
  `sales_qty` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salestransaction_line`
--

CREATE TABLE `tbl_salestransaction_line` (
  `salesline_id` bigint(50) NOT NULL,
  `sales_id` bigint(50) NOT NULL,
  `prod_id` bigint(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `amount` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supp_id` bigint(20) NOT NULL,
  `supp_code` varchar(50) NOT NULL,
  `supp_name` varchar(50) NOT NULL,
  `supp_contactNo` varchar(13) NOT NULL,
  `supp_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supp_id`, `supp_code`, `supp_name`, `supp_contactNo`, `supp_address`) VALUES
(4, 'supplier3', 'supplier3', '123512', ' cotabato city'),
(7, 'nydloyd co.123', 'nydloyd co.', '9219129', ' tacurong'),
(422, 'adsad123', 'adsad', 'asdasdsa', ' dasdsa'),
(711, 'test1', 'test1', '2414512', ' adasdas'),
(712, 'test2', 'test2', '123124', ' sadsadsa'),
(713, 'finaltest', 'finaltest', '5134123', ' test123'),
(714, 'asqqweqwe', 'asqqweqwe', '12445123', ' dasdas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_prod`
--
ALTER TABLE `tbl_prod`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_salestransaction`
--
ALTER TABLE `tbl_salestransaction`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_salestransaction_line`
--
ALTER TABLE `tbl_salestransaction_line`
  ADD PRIMARY KEY (`salesline_id`),
  ADD KEY `sales_id` (`sales_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_prod`
--
ALTER TABLE `tbl_prod`
  MODIFY `prod_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_salestransaction`
--
ALTER TABLE `tbl_salestransaction`
  MODIFY `sales_id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_salestransaction_line`
--
ALTER TABLE `tbl_salestransaction_line`
  MODIFY `salesline_id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_prod`
--
ALTER TABLE `tbl_prod`
  ADD CONSTRAINT `tbl_prod_ibfk_1` FOREIGN KEY (`supp_id`) REFERENCES `tbl_supplier` (`supp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_salestransaction`
--
ALTER TABLE `tbl_salestransaction`
  ADD CONSTRAINT `tbl_salestransaction_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`cust_id`),
  ADD CONSTRAINT `tbl_salestransaction_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_prod` (`prod_id`);

--
-- Constraints for table `tbl_salestransaction_line`
--
ALTER TABLE `tbl_salestransaction_line`
  ADD CONSTRAINT `tbl_salestransaction_line_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `tbl_salestransaction` (`sales_id`),
  ADD CONSTRAINT `tbl_salestransaction_line_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `tbl_prod` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
