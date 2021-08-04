-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2021 at 10:20 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `style`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `Ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `St_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `T_wards` int(11) NOT NULL COMMENT 'Total no of wards',
  `C_Ward` int(11) NOT NULL COMMENT 'no of Wards included ',
  PRIMARY KEY (`Ct_id`),
  KEY `St_id` (`St_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cities`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `C_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Ward_no` varchar(4) NOT NULL,
  `Ward_name` varchar(200) DEFAULT NULL,
  `Mobile` varchar(14) NOT NULL,
  `Gender` varchar(5) NOT NULL,
  `Ow_id` int(11) DEFAULT '0',
  `price` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `no_of_visits` int(11) DEFAULT '0',
  `no_of_spams` int(11) DEFAULT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`C_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_id`, `state`, `City`, `Ward_no`, `Ward_name`, `Mobile`, `Gender`, `Ow_id`, `price`, `time`, `no_of_visits`, `no_of_spams`, `Password`, `Name`, `Email`) VALUES
(1, 'br', ' Patna', '', 'sahit', '123456', 'male', 0, NULL, NULL, 0, NULL, '123456', ' varun', 'varungautamjma17@gmail.com'),
(2, 'Madhya Pradesh', ' Sagar', '23', 'abc', '1234509876', 'male', 0, NULL, NULL, 0, NULL, '12345', ' Vijay Gautam', 'vutamjma17@gmail.com'),
(3, 'Madhya Pradesh', ' Sagar', '43', '', '  6789054321', 'male', 0, NULL, NULL, 0, NULL, '12345', ' varun', 'abc@gmail.com'),
(4, 'Madhya Pradesh', ' Sagar', '43', '', '  9876556789', 'male', 0, NULL, NULL, 0, NULL, '12345', ' var', 'utamjma17@gmail.com'),
(5, 'Madhya Pradesh', ' Sagar', '43', '', '  123443321', 'male', 0, NULL, NULL, 0, NULL, '1234', ' aqws', 'v17@gmail.com'),
(6, 'Madhya Pradesh', ' Sagar', '43', '', '  23455432', 'male', 0, NULL, NULL, 0, NULL, '1234', ' varun gautam', 'vmjma17@gmail.com'),
(7, 'Madhya Pradesh', ' Sagar', '43', '', '  123443211', 'male', 0, NULL, NULL, 0, NULL, '1234', ' qwe', 'varamjma17@gmail.com'),
(8, 'Madhya Pradesh', ' Sagar', '43', '', '  1234567765', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(9, 'Madhya Pradesh', ' Sagar', '43', '', '  1234565657', 'male', 0, NULL, NULL, 0, NULL, '54321', ' Viy Gautam', 'varungautamjma17@gmail.com'),
(10, 'Madhya Pradesh', ' Sagar', '43', 'abcword', '  12121212', 'male', 0, NULL, NULL, 0, NULL, '1234', ' ABC Gautam', 'v17@gmail.com'),
(11, 'Madhya Pradesh', ' Sagar', '44', '', '  12121232', 'M', 0, NULL, NULL, 0, NULL, '1234', ' abc', 'abc@gmail.com'),
(12, 'Madhya Pradesh', ' Sagar', '43', 'abc Word', '  1232314', 'M', 0, NULL, NULL, 0, NULL, '1234', ' V Gautam', 'varunga17@gmail.com'),
(13, 'Madhya Pradesh', ' Sagar', '43', 'abc', '  123214', 'M', 0, NULL, NULL, 0, NULL, '1234', ' abcd', 'abc@gmail.com'),
(14, 'Madhya Pradesh', ' Sagar', '43', '', '  3245423', 'M', 0, NULL, NULL, 0, NULL, '1234', ' gtm', 'jma17@gmail.com'),
(15, 'Madhya Pradesh', ' Sagar', '43', '', '  3245423', 'M', 0, NULL, NULL, 0, NULL, '1234', ' gtm', 'jma17@gmail.com'),
(16, 'Madhya Pradesh', ' Sagar', '43', '', '  3323232323', 'M', 0, NULL, NULL, 0, NULL, '1234', ' asd', 'asdf@gmail.com'),
(17, 'Madhya Pradesh', ' Sagar', '43', '', '  3323232323', 'M', 0, NULL, NULL, 0, NULL, '1234', ' asd', 'asdf@gmail.com'),
(18, 'Madhya Pradesh', ' Sagar', '43', '', '  9612730', 'M', 0, NULL, NULL, 0, NULL, '1234', ' Viam', 'autamjma17@gmail.com'),
(19, 'Madhya Pradesh', ' Sagar', '43', '', '  9612730', 'M', 0, NULL, NULL, 0, NULL, '1234', ' Viam', 'autamjma17@gmail.com'),
(20, 'Madhya Pradesh', ' Sagar', '43', 'asd', '  132323239', 'M', 0, NULL, NULL, 0, NULL, '1234', ' asdf', 'abc@gmail.com'),
(21, 'Madhya Pradesh', ' Sagar', '43', 'abc', '  234233322', 'M', 0, NULL, NULL, 0, NULL, '1234', ' abckumar', 'abc@gmail.com'),
(22, 'Madhya Pradesh', ' Sagar', '43', 'qwe', '  967470', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vy Gautam', 'vutamjma17@gmail.com'),
(23, 'Madhya Pradesh', ' Sagar', '43', '', '  97042730', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vay Gautam', 'vaa17@gmail.com'),
(24, 'Madhya Pradesh', ' Sagar', '43', '', '  96172730', 'male', 0, NULL, NULL, 0, NULL, '2345', ' Vijautam', 'varamjma17@gmail.com'),
(25, 'Madhya Pradesh', ' Sagar', '43', '', '  961730', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vjay Gautam', 'vangautamjma17@gmail.com'),
(26, 'Madhya Pradesh', ' Sagar', '43', '', '  96042730', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gtam', 'vartamjma17@gmail.com'),
(27, 'Madhya Pradesh', ' Sagar', '43', '', '  9617040', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(28, 'Madhya Pradesh', ' Sagar', '43', '', '  961700', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(29, 'Madhya Pradesh', ' Sagar', '43', '', '  92730', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijautam', 'vgautamjma17@gmail.com'),
(30, 'Madhya Pradesh', ' Sagar', '43', '', '  9630', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'vatamjma17@gmail.com'),
(31, 'Madhya Pradesh', ' Sagar', '43', '', '  96170', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(32, 'Madhya Pradesh', ' Sagar', '43', '', '  730', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(33, 'Madhya Pradesh', ' Sagar', '43', '', '  9617', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(34, 'Madhya Pradesh', ' Sagar', '43', '', '  96', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(35, 'Madhya Pradesh', ' Sagar', '43', '', '  96', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(36, 'Madhya Pradesh', ' Sagar', '43', '', ' 42730', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(37, 'Madhya Pradesh', ' Sagar', '43', '', ' 9630', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', ''),
(38, 'Madhya Pradesh', ' Sagar', '43', '', ' 9617042730', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(39, 'Madhya Pradesh', ' Sagar', '43', '', ' 9617042730', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(40, 'Madhya Pradesh', ' Sagar', '43', '', ' 961704270', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(41, 'Madhya Pradesh', ' Sagar', '43', '', ' 9630', 'male', 0, NULL, NULL, 0, NULL, '1234', ' Vijay Gautam', 'varungautamjma17@gmail.com'),
(42, 'Madhya Pradesh', ' Sagar', '43', '', ' 121212133', 'male', 0, NULL, NULL, 0, NULL, '1234', ' qwer', ''),
(43, 'Madhya Pradesh', 'Sagar', '43', NULL, '121212', 'male', 0, NULL, NULL, 0, NULL, '1234', 'acsd', NULL),
(44, 'Madhya Pradesh', 'Sagar', '43', NULL, '121212', 'male', 0, NULL, NULL, 0, NULL, '1234', 'acsd', NULL),
(45, 'Madhya Pradesh', ' Sagar', '43', '', ' 1323233', 'male', 0, NULL, NULL, 0, NULL, '1234', ' abc', ''),
(46, 'Madhya Pradesh', ' Sagar', '43', 'aaa', ' 45645', 'male', 0, NULL, NULL, 0, NULL, 'shivam', ' aa', 'shivam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `owner_details`
--

CREATE TABLE IF NOT EXISTS `owner_details` (
  `Ow_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `Ward_no` varchar(4) NOT NULL,
  `Ward_Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Shop_name` varchar(100) NOT NULL,
  `Ow_Name` varchar(200) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `mob` int(12) NOT NULL,
  `seats` int(3) NOT NULL,
  `Lunch_time` varchar(20) DEFAULT NULL,
  `Off_days` int(7) DEFAULT NULL COMMENT 'Will be in Codes',
  `Password` varchar(15) NOT NULL,
  `Joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Last_payment` datetime DEFAULT NULL,
  `O_time` varchar(20) NOT NULL DEFAULT '09:30am',
  `C_time` varchar(20) NOT NULL DEFAULT '07:30pm',
  `cur_slot` time NOT NULL,
  `gender` varchar(5) NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT '0',
  `time_string` varchar(100) NOT NULL DEFAULT '10:30am ',
  PRIMARY KEY (`Ow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `owner_details`
--

INSERT INTO `owner_details` (`Ow_id`, `state`, `city`, `Ward_no`, `Ward_Name`, `Address`, `Shop_name`, `Ow_Name`, `Email`, `mob`, `seats`, `Lunch_time`, `Off_days`, `Password`, `Joining_date`, `Last_payment`, `O_time`, `C_time`, `cur_slot`, `gender`, `Active`, `time_string`) VALUES
(1, 'Madhya Pradesh', 'Sagar', '43', 'ABC', 'ABCD', 'ABCDE', 'ABC', 'ramesh@gmail.com', 123456, 3, '2021-07-12 12:30:00', NULL, '12345678', '2021-07-12 21:01:32', '2021-07-12 07:00:00', '09:30', '23:59', '23:59:00', 'male', 0, '10:53pm 11:20pm 11:23pm '),
(2, 'Madhya Pradesh', 'Sagar', '43', 'ABC', 'ABCD', 'aaaa', 'ABCDEF', 'ramesh@gmail.com', 12345, 1, '12:30', NULL, '123456', '2021-07-12 21:03:29', '2021-07-12 07:00:00', '09:30', '19:30', '00:00:00', 'male', 0, '10:53pm '),
(3, 'Madhya Pradesh', 'Sagar', '1', 'asd', 'asdf', 'asdfg', 'aqws', 'varungautamjma17@gmail.com', 12345, 3, '12:00', NULL, '12345', '2021-07-13 22:50:19', NULL, '09:30', '12:30', '22:50:19', '', 0, '2021-07-14 21:59:49'),
(4, 'TELANGANA', 'WARANGAL', '1', 'qwsedasdf', 'asdf', 'sdfaman', 'aman', 'abc@gmail.com', 987654321, 3, '12:30', NULL, '12345', '2021-07-14 02:51:38', NULL, '09:30', '07:30', '02:51:38', 'F', 0, '2021-07-14 21:59:49'),
(5, 'TELANGANA', 'WARANGAL', '1', 'qwe', 'asd', 'zxc', 'qwe', 'asd', 1234, 3, '12:30', NULL, '12345', '2021-07-14 03:36:57', NULL, '09:30', '07:00', '03:36:57', 'Both', 0, '2021-07-14 21:59:49'),
(6, 'Madhya Pradesh', 'Sagar', '3', 'abcds', 'wert', 'abfgh shop', 'kamlesh', 'va@gmail.com', 9617, 3, '01:00', NULL, '1234', '2021-07-14 03:48:35', NULL, '10:00', '06:00', '03:48:35', 'F', 0, '2021-07-14 21:59:49'),
(7, 'Madhya Pradesh', 'Sagar', '44', 'abcward', 'abccolony', 'abc styles', 'abc kumar', 'abc17@gmail.com', 12345654, 3, '02:30', NULL, '12345', '2021-07-15 16:29:35', NULL, '10:30', '07:00pm', '00:00:00', 'Both', 0, '1626325200 1626325200 1626325200 '),
(8, 'Madhya Pradesh', 'Sagar', '44', 'abcward', 'abccolony', 'abcstyles', 'abc lumar', 'abc17@gmail.com', 12344321, 3, '02:30', NULL, '1234', '2021-07-15 16:32:47', NULL, '09:30', '07:00pm', '00:00:00', 'Both', 0, '1626321600 1626321600 1626321600 '),
(9, 'Madhya Pradesh', 'Sagar', '45', 'ABC@ward', 'abc2colony', 'abc3styles', 'abc kumar', 'abcd17@gmail.com', 123454545, 3, '03:00', NULL, '12345', '2021-07-15 16:40:21', NULL, '11:30', '08:00pm', '00:00:00', 'Both', 0, '1626328800 1626328800 1626328800 '),
(10, 'Madhya Pradesh', 'Sagar', '46', 'abc3ward', 'abc3colony', 'abc3styles', 'abc3 kumar', 'abc317@gmail.com', 1234566565, 4, '01:30', NULL, '1234', '2021-07-15 16:51:45', NULL, '10:30', '07:30pm', '00:00:00', 'F', 0, '1626325200 1626325200 1626325200 1626325200 '),
(11, 'Madhya Pradesh', 'Sagar', '45', 'abc4ward', 'abc4coliny', 'anc4styles', 'abc4 kumar', 'abc@gmail.com', 12345454, 4, '04:00', NULL, '1234', '2021-07-15 16:53:52', NULL, '12:30', '09:00pm', '00:00:00', 'F', 0, '1626332400 1626332400 1626332400 1626332400 '),
(12, 'Madhya Pradesh', 'Sagar', '2', 'asd', 'asd', 'assdf', 'asd fgg', 'a17@gmail.com', 989898989, 4, '05:00', NULL, '12345', '2021-07-15 16:57:14', NULL, '12:34', '10:00pm', '00:00:00', 'Both', 0, '1626332640 1626332640 1626332640 1626332640 '),
(13, 'Madhya Pradesh', 'Sagar', '44', 'qwer', 'asdf', 'sdfvgb', 'sdfg', 'abc17@gmail.com', 12323231, 4, '05:00', NULL, '1234', '2021-07-15 17:03:35', NULL, '11:00', '09:00pm', '00:00:00', 'Both', 0, '1626327000 1626327000 1626327000 1626327000 '),
(14, 'Madhya Pradesh', 'Sagar', '12', 'sdd', 'dfg', 'asdf', 'sdf', 'varungautamjma17@gmail.com', 123455555, 4, '01:00', NULL, '12345', '2021-07-15 17:06:42', NULL, '12:03', '07:00pm', '00:00:00', 'F', 0, '1626330780 1626330780 1626330780 1626330780 '),
(15, 'Madhya Pradesh', 'Sagar', '1', 'asdf', 'asdfg', 'asdf', 'asdfg', 'vaa17@gmail.com', 121221211, 3, '12:34', NULL, '1234', '2021-07-15 17:26:28', NULL, '11:03', '03:45pm', '00:00:00', 'M', 0, '1626327180 1626327180 1626327180 '),
(16, 'Madhya Pradesh', 'Sagar', '12', 'qwas', 'sdf', 'asdf', 'qwer', 'a17@gmail.com', 1212111, 3, '12:34', NULL, '123', '2021-07-15 17:28:14', NULL, '11:23', '04:45pm', '00:00:00', 'M', 0, '1626328380 1626328380 1626328380 ');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `Sv_id` int(100) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT '15' COMMENT 'Avg time in minutes',
  `price` int(100) NOT NULL DEFAULT '100' COMMENT 'Avg Price',
  PRIMARY KEY (`Sv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='For basic info about any service';

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Sv_id`, `Name`, `time`, `price`) VALUES
(1, 'Hair cutting', 15, 100),
(2, 'Shaving', 10, 50),
(3, 'Massage', 10, 50),
(4, 'Hair Spa', 30, 100),
(5, 'Hair Styling', 30, 100),
(11, 'Facial', 15, 100),
(12, 'Manicure', 15, 100),
(13, 'Hair Coloring', 30, 100),
(14, 'Beauty & Grooming', 15, 100),
(15, 'Dry Shampoo', 15, 100),
(16, 'Pedicure', 15, 100);

-- --------------------------------------------------------

--
-- Table structure for table `service_per_shop`
--

CREATE TABLE IF NOT EXISTS `service_per_shop` (
  `Ow_id` int(11) NOT NULL,
  `S1` tinyint(1) DEFAULT NULL,
  `S1_name` varchar(100) DEFAULT NULL,
  `S1_time` int(11) DEFAULT NULL,
  `S1_price` int(11) DEFAULT NULL,
  `S2` tinyint(1) DEFAULT NULL,
  `S2_name` varchar(100) DEFAULT NULL,
  `S2_time` int(11) DEFAULT NULL,
  `S2_price` int(11) DEFAULT NULL,
  `S3` tinyint(1) DEFAULT NULL,
  `S3_name` varchar(100) DEFAULT NULL,
  `S3_time` int(11) DEFAULT NULL,
  `S3_price` int(11) DEFAULT NULL,
  `S4` tinyint(1) DEFAULT NULL,
  `S4_name` varchar(100) DEFAULT NULL,
  `S4_time` int(11) DEFAULT NULL,
  `S4_price` int(11) DEFAULT NULL,
  `S5` tinyint(1) DEFAULT NULL,
  `S5_name` varchar(100) DEFAULT NULL,
  `S5_time` int(11) DEFAULT NULL,
  `S5_price` int(11) DEFAULT NULL,
  `S6` tinyint(1) DEFAULT NULL,
  `S6_name` varchar(100) DEFAULT NULL,
  `S6_price` int(11) DEFAULT NULL,
  `S6_time` int(11) DEFAULT NULL,
  `S7` tinyint(1) DEFAULT NULL,
  `S7_name` varchar(100) DEFAULT NULL,
  `S7_price` int(11) DEFAULT NULL,
  `S7_time` int(11) DEFAULT NULL,
  `S8` tinyint(1) DEFAULT NULL,
  `S8_name` varchar(100) DEFAULT NULL,
  `S8_price` int(11) DEFAULT NULL,
  `S8_time` int(11) DEFAULT NULL,
  `S9` tinyint(1) DEFAULT NULL,
  `S9_name` varchar(100) DEFAULT NULL,
  `S9_price` int(11) DEFAULT NULL,
  `S9_time` int(11) DEFAULT NULL,
  `S10` tinyint(1) DEFAULT NULL,
  `S10_name` varchar(100) DEFAULT NULL,
  `S10_price` int(11) DEFAULT NULL,
  `S10_time` int(11) DEFAULT NULL,
  `S11` tinyint(1) DEFAULT NULL,
  `S11_name` varchar(100) DEFAULT NULL,
  `S11_price` int(11) DEFAULT NULL,
  `S11_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`Ow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_per_shop`
--

INSERT INTO `service_per_shop` (`Ow_id`, `S1`, `S1_name`, `S1_time`, `S1_price`, `S2`, `S2_name`, `S2_time`, `S2_price`, `S3`, `S3_name`, `S3_time`, `S3_price`, `S4`, `S4_name`, `S4_time`, `S4_price`, `S5`, `S5_name`, `S5_time`, `S5_price`, `S6`, `S6_name`, `S6_price`, `S6_time`, `S7`, `S7_name`, `S7_price`, `S7_time`, `S8`, `S8_name`, `S8_price`, `S8_time`, `S9`, `S9_name`, `S9_price`, `S9_time`, `S10`, `S10_name`, `S10_price`, `S10_time`, `S11`, `S11_name`, `S11_price`, `S11_time`) VALUES
(1, 1, 'Hair Cutting', 20, 100, 1, 'Shaving', 10, 50, 0, 'Massage', 10, 50, 0, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Hair Cutting', 15, 100, 1, 'Shaving', 10, 60, 1, 'Massage', 10, 50, 0, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `St_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `T_city` int(11) NOT NULL,
  `C_city` int(11) NOT NULL,
  PRIMARY KEY (`St_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `states`
--


-- --------------------------------------------------------

--
-- Table structure for table `subservices`
--

CREATE TABLE IF NOT EXISTS `subservices` (
  `Ssv_id` int(11) NOT NULL AUTO_INCREMENT,
  `Sv_id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  PRIMARY KEY (`Ssv_id`),
  KEY `Sv_id` (`Sv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subservices`
--


-- --------------------------------------------------------

--
-- Table structure for table `trail`
--

CREATE TABLE IF NOT EXISTS `trail` (
  `Ow_id` int(11) NOT NULL AUTO_INCREMENT,
  `F_Name` varchar(100) NOT NULL,
  `L_Name` varchar(100) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Mobile_no` varchar(14) NOT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `my_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Ow_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trail`
--

INSERT INTO `trail` (`Ow_id`, `F_Name`, `L_Name`, `Email`, `Mobile_no`, `Password`, `my_time`) VALUES
(1, 'father', 'gautam', 'vrgtm17@gmail.com', '9617042730', '123456', '0000-00-00 00:00:00'),
(2, 'shivam', 'rathore', 'vrgtm17@gmail.com', '123456', '1234321', '2021-07-15 15:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE IF NOT EXISTS `wards` (
  `W_id` int(11) NOT NULL AUTO_INCREMENT,
  `Ct_id` int(11) NOT NULL,
  `St_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`W_id`),
  KEY `Ct_id` (`Ct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wards`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`St_id`) REFERENCES `states` (`St_id`);

--
-- Constraints for table `subservices`
--
ALTER TABLE `subservices`
  ADD CONSTRAINT `subservices_ibfk_1` FOREIGN KEY (`Sv_id`) REFERENCES `services` (`Sv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`Ct_id`) REFERENCES `cities` (`Ct_id`) ON DELETE CASCADE ON UPDATE CASCADE;
