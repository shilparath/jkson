-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 09:31 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

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

--
-- Dumping data for table `distributer_details`
--

INSERT INTO `distributer_details` (`id`, `name`, `contact`, `gstin`, `pan`, `cin`, `address`) VALUES
(1, 'NEW VICKY ELECTRONICS', '9437090865', '21AJMPN4607M1Z1', '', '', 'Salepur, Near Salepur Police Stotion,Cuttack-754202, Mob No-9437090865,8249262936'),
(2, 'COLL&COLL', '8895588933', '21AJFPA4791E1ZP', '', '', 'Dargha Bazar, Hati Pokhari Chhak, Cuttack-753001,Mob No-8895588933,Pho No-(0671)2430483,6500170');

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

--
-- Dumping data for table `distributer_payment`
--

INSERT INTO `distributer_payment` (`id`, `distributer_id`, `total_amount`, `due`, `paid`) VALUES
(1, '1', '0', '0', '0'),
(2, '2', '0', '0', '0');

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

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `supplayername`, `customername`, `newcustomer`, `finance_agent`, `invoice_no`, `details`, `mode`, `ref_no`, `amount`, `paytype`, `status`, `date`) VALUES
(1, 'RAJ PRATIVA ENTERPRISERS', '', '', '', '', 'Supplier Payment', '4', 'BARBW18277962533', 410000, '0', '1', '2018-11-17'),
(2, '', 'NEW VICKY ELECTRONICS', '', '', '', 'Item Sell', '1', '', 33252, '1', '1', '2018-11-17'),
(3, '', 'NEW VICKY ELECTRONICS', '', '', '', 'Item Sell', '1', '', 33252, '1', '1', '2018-11-18'),
(4, '', 'NEW VICKY ELECTRONICS', '', '', '', 'Item Sell', '1', '', 33252, '1', '1', '2018-11-18'),
(5, 'RAJ PRATIVA ENTERPRISERS', '', '', '', '', 'Supplier Payment', '1', '', 100, '0', '1', '2018-11-18'),
(6, '', 'NEW VICKY ELECTRONICS', '', '', '', 'Item Sell', '1', '', 0, '1', '1', '2018-11-20');

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

--
-- Dumping data for table `insertproduct`
--

INSERT INTO `insertproduct` (`id`, `customer_details`, `order_no`, `rdate`, `so_no`, `product_name`, `invoice_no`, `place_of_supply`, `sl_no`, `mat_code`, `mat_des`, `hsn_code`, `freight`, `cgst`, `sgst`, `igst`, `customer_drg_no`, `quantity`, `rate`, `discount`, `amount`, `finance_amount`, `tax_cost`, `pay_cost`, `creationDate`, `bill`, `quantity_avail`, `imeino`, `color`) VALUES
(1, '1', '01', '2018-10-03', '', '5', '21', 'Odisha', 1, 'AMPLIFII', 'AMPP24N22', '85287219', '0', 9, 9, 0, '0', 8, '7769', '0', '7769', '', '62152', 319887, '2018-11-17 22:36:31', 1, 8, '24N', 0),
(2, '1', '01', '2018-10-03', '', '6', '21', 'Odisha', 2, 'AMPLIFII', 'AMPP32N22', '85287216', '0', 14, 14, 0, '0', 6, '11834', '0', '11834', '', '71004', 319887, '2018-11-17 22:36:31', 1, 6, '32N', 0),
(3, '1', '01', '2018-10-03', '', '7', '21', 'Odisha', 3, 'AMPLIFII', 'AMPP32S22', '85287216', '0', 14, 14, 0, '0', 6, '13994', '0', '13994', '', '83964', 319887, '2018-11-17 22:36:31', 1, 6, '32S', 0),
(4, '1', '01', '2018-10-03', '', '8', '21', 'Odisha', 4, 'AMPLIFII', 'AMPP40N22', '85287216', '0', 14, 14, 0, '0', 2, '18008', '0', '18008', '', '36016', 319887, '2018-11-17 22:36:31', 1, 2, '40N', 0),
(5, '1', '01', '2018-10-03', '', '10', '21', 'Odisha', 5, 'AMPLIFII', 'AMPP40S22', '85287216', '0', 14, 14, 0, '0', 2, '23050', '0', '23050', '', '46100', 319887, '2018-11-17 22:36:31', 1, 2, '40S', 0),
(6, '1', '01', '2018-10-03', '', '13', '21', 'Odisha', 6, 'AMPLIFII', 'AMP-650-6.5', '8450', '0', 9, 9, 0, '0', 4, '5162.71', '0', '5162.71', '', '20650.84', 319887, '2018-11-17 22:36:31', 1, 4, 'WM 6.5', 0);

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

--
-- Dumping data for table `mobilecompany`
--

INSERT INTO `mobilecompany` (`id`, `name`, `creationdate`, `status`) VALUES
(1, 'AMPLIFII', '2018-11-17 22:18:03', 1);

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

--
-- Dumping data for table `mobiledetails`
--

INSERT INTO `mobiledetails` (`id`, `companyname`, `product_name`, `modelname`, `color`, `hsncode`, `price`, `market_price`, `gst`, `date`, `status`, `price_without_gst`, `gst_price`, `price_after_gst`) VALUES
(0, '1', '5', 'AMPP24N22', '', '85287219', 7769, NULL, '18%', '2018-11-17 22:26:23', 1, '6583.90', '1185.10', '7769'),
(0, '1', '6', 'AMPP32N22', '', '85287216', 11834, NULL, '28%', '2018-11-17 22:27:35', 1, '9245.32', '2588.69', '11834.01'),
(0, '1', '7', 'AMPP32S22', '', '85287216', 13994, NULL, '28%', '2018-11-17 22:28:54', 1, '10932.82', '3061.19', '13994.01'),
(0, '1', '8', 'AMPP40N22', '', '85287216', 18008, NULL, '28%', '2018-11-17 22:30:02', 1, '14068.75', '3939.25', '18008'),
(0, '1', '10', 'AMPP40S22', '', '85287216', 23050, NULL, '28%', '2018-11-17 22:30:59', 1, '18007.82', '5042.19', '23050.01'),
(0, '1', '13', 'AMP-650-6.5', '', '8450', 5162.71, NULL, '18%', '2018-11-17 22:32:16', 1, '4375.18', '787.53', '5162.71');

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

--
-- Dumping data for table `pdc_buyer`
--

INSERT INTO `pdc_buyer` (`id`, `name`, `contact`, `gstin`, `pan`, `cin`, `address`, `status`, `creationDate`) VALUES
(1, 'RAJ PRATIVA ENTERPRISERS', '9338087892', '21AEBPR6113C2Z6', '', '', 'Phulnakhara,Cuttack-754001,State-Odisha,Code-21,Mob No-9439030554,Ph No-(0671)2356670', 1, '2018-11-17 16:47:33');

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

--
-- Dumping data for table `product_name`
--

INSERT INTO `product_name` (`id`, `company_id`, `company_name`, `name`) VALUES
(5, 1, '', 'PLUS LED TV 24\" N'),
(6, 1, '', 'PLUS LED TV 32\" N'),
(7, 1, '', 'PLUS LED TV 32\" S'),
(8, 1, '', 'PLUS LED TV 40\" N'),
(10, 1, '', 'PLUS LED TV 40\" S'),
(11, 1, '', 'PLUS LED TV 50\" S'),
(12, 1, '', 'PLUS LED TV 65\" S'),
(13, 1, '', 'SEMI AUTOMATIC WASHING MACHINE 6.5 K.G');

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
  `distributer_status` int(11) NOT NULL,
  `gstno` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellitems`
--

INSERT INTO `sellitems` (`id`, `customer_details`, `po_no`, `new_customer`, `date`, `address`, `offer_no`, `gstin`, `dispatched`, `invoice_no`, `state`, `invoice_date`, `code`, `challan_no`, `remarks`, `challan_date`, `serial_no`, `mat_des`, `pl_serial_no`, `hsn_code`, `unit`, `purchase_rate`, `tax_amount`, `total_cost`, `rate`, `quantity`, `item_value`, `discount`, `sgst`, `cgst`, `igst`, `amount`, `pay_cost`, `creationDate`, `bill`, `income`, `imeino`, `color`, `battery`, `charger`, `company`, `payamount`, `distributer_status`, `gstno`) VALUES
(1, '', '', 'NEW VICKY ELECTRONICS', '2018-11-20', 'Salepur, Near Salepur Police Stotion,Cuttack-754202, Mob No-9437090865,8249262936', '', '0', '0', 'JK/SE-1', 'Odisha', '2018-11-20', '9437090865', '', '', '', 1, 1, 0, 85287219, 8, 7769, 1398, 9167, 8313, 1, 8313, 0, 9, 9, 0, 8313, 0, '2018-11-20 08:26:13', 1, 8313, '24N', 0, '', '', 'AMPLIFII', '', 1, '21AJMPN4607M1Z1');

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

--
-- Dumping data for table `stockdetails`
--

INSERT INTO `stockdetails` (`id`, `invoice_no`, `mat_code`, `mat_des`, `hsn_code`, `quantity`, `rdate`, `avail`, `used`, `damaged`, `creationDate`, `imeino`, `damage_quantity`) VALUES
(1, '21', 'AMPLIFII', 'AMPP24N22', 85287219, 8, '2018-10-03', 7, 0, 0, '2018-11-17 17:06:31', '24N', 0),
(2, '21', 'AMPLIFII', 'AMPP32N22', 85287216, 6, '2018-10-03', 6, 0, 0, '2018-11-17 17:06:31', '32N', 0),
(3, '21', 'AMPLIFII', 'AMPP32S22', 85287216, 6, '2018-10-03', 6, 0, 0, '2018-11-17 17:06:31', '32S', 0),
(4, '21', 'AMPLIFII', 'AMPP40N22', 85287216, 2, '2018-10-03', 2, 0, 0, '2018-11-17 17:06:31', '40N', 0),
(5, '21', 'AMPLIFII', 'AMPP40S22', 85287216, 2, '2018-10-03', 2, 0, 0, '2018-11-17 17:06:31', '40S', 0),
(6, '21', 'AMPLIFII', 'AMP-650-6.5', 8450, 4, '2018-10-03', 4, 0, 0, '2018-11-17 17:06:31', 'WM 6.5', 0);

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

--
-- Dumping data for table `supplier_payment_history`
--

INSERT INTO `supplier_payment_history` (`id`, `distributer_id`, `distributer_name`, `total_amount`, `due_amount`, `paid_amount`, `payment_mode`, `payment_type`, `reference_no`, `date`) VALUES
(1, '1', 'RAJ PRATIVA ENTERPRISERS', '319887', '90113', '410000', '4', '0', 'BARBW18277962533', '2018-11-17');

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

--
-- Dumping data for table `supplier_payment_log`
--

INSERT INTO `supplier_payment_log` (`id`, `pdc_bayer_id`, `total_amount`, `total_paid_amount`, `total_due`) VALUES
(1, 1, '319887', '410000', '-90113');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distributer_payment`
--
ALTER TABLE `distributer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distributer_payment_history`
--
ALTER TABLE `distributer_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insertproduct`
--
ALTER TABLE `insertproduct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mobilecompany`
--
ALTER TABLE `mobilecompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdc_buyer`
--
ALTER TABLE `pdc_buyer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_name`
--
ALTER TABLE `product_name`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellitems`
--
ALTER TABLE `sellitems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_payment_history`
--
ALTER TABLE `supplier_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_payment_log`
--
ALTER TABLE `supplier_payment_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
