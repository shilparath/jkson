-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 11:39 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jksons3`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobilecolor`
--

CREATE TABLE `bobilecolor` (
  `id` int(11) NOT NULL,
  `colorname` varchar(555) NOT NULL,
  `insertdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyerdetails`
--

CREATE TABLE `buyerdetails` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `gstin` varchar(40) NOT NULL,
  `pan` varchar(40) NOT NULL,
  `cin` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dilevery_chalan`
--

CREATE TABLE `dilevery_chalan` (
  `id` int(11) NOT NULL,
  `challan_no` varchar(100) NOT NULL,
  `challan_date` varchar(40) NOT NULL,
  `offer_no` varchar(100) NOT NULL,
  `purchase_date` varchar(100) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `no_of_pkg` int(10) NOT NULL,
  `dispatched` varchar(100) NOT NULL,
  `net_wt` int(10) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `serial_no` int(10) NOT NULL,
  `mat_des` int(10) NOT NULL,
  `pl_serial_no` int(10) NOT NULL,
  `material_code` int(10) NOT NULL,
  `hsn_code` int(10) NOT NULL,
  `unit` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distributer_details`
--

CREATE TABLE `distributer_details` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `contact` varchar(555) NOT NULL,
  `gstin` varchar(555) NOT NULL,
  `pan` varchar(555) NOT NULL,
  `cin` varchar(555) NOT NULL,
  `address` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distributer_payment`
--

CREATE TABLE `distributer_payment` (
  `id` int(11) NOT NULL,
  `distributer_id` varchar(555) NOT NULL,
  `total_amount` varchar(555) NOT NULL,
  `due` varchar(555) NOT NULL,
  `paid` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distributer_payment_history`
--

CREATE TABLE `distributer_payment_history` (
  `id` int(11) NOT NULL,
  `distributer_id` varchar(111) NOT NULL,
  `distributer_name` varchar(111) NOT NULL,
  `total_amount` varchar(111) NOT NULL,
  `due_amount` varchar(111) NOT NULL,
  `paid_amount` varchar(111) NOT NULL,
  `payment_mode` varchar(111) NOT NULL,
  `payment_type` varchar(111) NOT NULL,
  `reference_no` varchar(111) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `supplayername` varchar(555) NOT NULL,
  `customername` varchar(555) NOT NULL,
  `newcustomer` varchar(555) NOT NULL,
  `finance_agent` varchar(111) NOT NULL,
  `invoice_no` varchar(111) NOT NULL,
  `details` varchar(555) NOT NULL,
  `mode` enum('1','2','3','4') NOT NULL COMMENT '1 =cash 2 =cheque  3 = online 4 = neft',
  `ref_no` varchar(111) NOT NULL,
  `amount` int(11) NOT NULL,
  `paytype` enum('0','1') NOT NULL COMMENT '0 =debit 1 =credit ',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insertproduct`
--

CREATE TABLE `insertproduct` (
  `id` int(10) NOT NULL,
  `customer_details` varchar(100) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `rdate` date NOT NULL,
  `so_no` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `place_of_supply` varchar(200) NOT NULL,
  `sl_no` int(10) NOT NULL,
  `mat_code` varchar(100) NOT NULL,
  `mat_des` varchar(100) NOT NULL,
  `hsn_code` varchar(111) NOT NULL,
  `freight` varchar(111) NOT NULL,
  `cgst` int(10) NOT NULL,
  `sgst` int(10) NOT NULL,
  `igst` int(10) NOT NULL,
  `customer_drg_no` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `discount` varchar(111) NOT NULL,
  `amount` varchar(111) NOT NULL,
  `finance_amount` varchar(111) NOT NULL,
  `tax_cost` varchar(111) NOT NULL,
  `pay_cost` float NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill` int(10) NOT NULL,
  `quantity_avail` int(10) NOT NULL,
  `imeino` varchar(555) NOT NULL,
  `color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mobilecompany`
--

CREATE TABLE `mobilecompany` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `creationdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mobiledetails`
--

CREATE TABLE `mobiledetails` (
  `id` int(11) NOT NULL,
  `companyname` varchar(55) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `modelname` varchar(55) NOT NULL,
  `color` varchar(55) NOT NULL,
  `hsncode` varchar(55) NOT NULL,
  `price` float NOT NULL,
  `market_price` int(255) DEFAULT NULL,
  `gst` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `price_without_gst` varchar(111) NOT NULL,
  `gst_price` varchar(111) NOT NULL,
  `price_after_gst` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdc_buyer`
--

CREATE TABLE `pdc_buyer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `cin` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1' COMMENT '1 -> True 0 -> False',
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_name`
--

CREATE TABLE `product_name` (
  `id` int(100) NOT NULL,
  `company_id` int(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_return_detail`
--

CREATE TABLE `product_return_detail` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `return_amount` float(100,2) NOT NULL,
  `return_type` varchar(100) NOT NULL,
  `total_quantity` int(100) NOT NULL,
  `damaged_quantity` int(100) NOT NULL,
  `job_number` varchar(100) NOT NULL,
  `expected_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `id` int(100) NOT NULL,
  `insert_product_id` int(100) DEFAULT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `model_number` varchar(100) DEFAULT NULL,
  `returntype` varchar(100) DEFAULT NULL,
  `discription` varchar(100) DEFAULT NULL,
  `imei` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `org_quantity` int(11) DEFAULT NULL,
  `org_amount` float(100,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellitems`
--

CREATE TABLE `sellitems` (
  `id` int(10) NOT NULL,
  `customer_details` varchar(100) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `new_customer` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `offer_no` varchar(100) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `dispatched` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `invoice_date` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `challan_no` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `challan_date` varchar(40) NOT NULL,
  `serial_no` int(10) NOT NULL,
  `mat_des` int(40) NOT NULL,
  `pl_serial_no` int(10) NOT NULL,
  `hsn_code` int(10) NOT NULL,
  `unit` int(10) NOT NULL,
  `purchase_rate` int(10) NOT NULL,
  `tax_amount` int(10) NOT NULL,
  `total_cost` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `item_value` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `sgst` int(10) NOT NULL,
  `cgst` int(10) NOT NULL,
  `igst` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `pay_cost` int(10) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill` int(10) NOT NULL,
  `income` int(10) NOT NULL,
  `imeino` varchar(555) NOT NULL,
  `color` int(11) NOT NULL,
  `battery` varchar(255) DEFAULT NULL,
  `charger` varchar(255) DEFAULT NULL,
  `company` varchar(100) NOT NULL,
  `payamount` varchar(55) NOT NULL,
  `distributer_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellitems_without_gst`
--

CREATE TABLE `sellitems_without_gst` (
  `id` int(10) NOT NULL,
  `customer_details` varchar(100) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `new_customer` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `offer_no` varchar(100) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `dispatched` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `invoice_date` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `challan_no` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `challan_date` varchar(40) NOT NULL,
  `serial_no` int(10) NOT NULL,
  `mat_des` int(40) NOT NULL,
  `pl_serial_no` int(10) NOT NULL,
  `hsn_code` int(10) NOT NULL,
  `unit` int(10) NOT NULL,
  `purchase_rate` int(10) NOT NULL,
  `tax_amount` int(10) NOT NULL,
  `total_cost` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `item_value` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `sgst` int(10) NOT NULL,
  `cgst` int(10) NOT NULL,
  `igst` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `pay_cost` int(10) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill` int(10) NOT NULL,
  `income` int(10) NOT NULL,
  `imeino` varchar(555) NOT NULL,
  `color` int(11) NOT NULL,
  `battery` varchar(255) DEFAULT NULL,
  `charger` varchar(255) DEFAULT NULL,
  `company` varchar(100) NOT NULL,
  `payamount` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Andaman and Nicobar Islands union territory'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh '),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli '),
(9, 'Daman and Diu '),
(10, 'Delhi'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep '),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry'),
(28, 'Punjab'),
(29, 'Rajasthan'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttar Pradesh'),
(35, 'Uttarakhand'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `stockdetails`
--

CREATE TABLE `stockdetails` (
  `id` int(10) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `mat_code` varchar(100) NOT NULL,
  `mat_des` varchar(100) NOT NULL,
  `hsn_code` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `avail` int(10) NOT NULL,
  `used` int(10) NOT NULL,
  `damaged` int(10) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imeino` varchar(111) NOT NULL,
  `damage_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE `supplier_payment` (
  `id` int(111) NOT NULL,
  `customer_details` int(111) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `total_amount` int(111) NOT NULL,
  `pending_amount` int(111) NOT NULL,
  `paid_amount` int(111) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment_history`
--

CREATE TABLE `supplier_payment_history` (
  `id` int(11) NOT NULL,
  `distributer_id` varchar(111) NOT NULL,
  `distributer_name` varchar(111) NOT NULL,
  `total_amount` varchar(111) NOT NULL,
  `due_amount` varchar(111) NOT NULL,
  `paid_amount` varchar(111) NOT NULL,
  `payment_mode` varchar(111) NOT NULL,
  `payment_type` varchar(111) NOT NULL,
  `reference_no` varchar(111) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment_log`
--

CREATE TABLE `supplier_payment_log` (
  `id` int(11) NOT NULL,
  `pdc_bayer_id` int(11) NOT NULL,
  `total_amount` varchar(555) NOT NULL,
  `total_paid_amount` varchar(555) NOT NULL,
  `total_due` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_name`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobilecolor`
--
ALTER TABLE `bobilecolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyerdetails`
--
ALTER TABLE `buyerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dilevery_chalan`
--
ALTER TABLE `dilevery_chalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributer_details`
--
ALTER TABLE `distributer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributer_payment`
--
ALTER TABLE `distributer_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributer_payment_history`
--
ALTER TABLE `distributer_payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insertproduct`
--
ALTER TABLE `insertproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobilecompany`
--
ALTER TABLE `mobilecompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdc_buyer`
--
ALTER TABLE `pdc_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_name`
--
ALTER TABLE `product_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellitems`
--
ALTER TABLE `sellitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellitems_without_gst`
--
ALTER TABLE `sellitems_without_gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockdetails`
--
ALTER TABLE `stockdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment_history`
--
ALTER TABLE `supplier_payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment_log`
--
ALTER TABLE `supplier_payment_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobilecolor`
--
ALTER TABLE `bobilecolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyerdetails`
--
ALTER TABLE `buyerdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dilevery_chalan`
--
ALTER TABLE `dilevery_chalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributer_details`
--
ALTER TABLE `distributer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributer_payment`
--
ALTER TABLE `distributer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributer_payment_history`
--
ALTER TABLE `distributer_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insertproduct`
--
ALTER TABLE `insertproduct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobilecompany`
--
ALTER TABLE `mobilecompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdc_buyer`
--
ALTER TABLE `pdc_buyer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_name`
--
ALTER TABLE `product_name`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellitems`
--
ALTER TABLE `sellitems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellitems_without_gst`
--
ALTER TABLE `sellitems_without_gst`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stockdetails`
--
ALTER TABLE `stockdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_payment_history`
--
ALTER TABLE `supplier_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_payment_log`
--
ALTER TABLE `supplier_payment_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
