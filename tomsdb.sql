-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 03:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tomsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `aboutID` int(3) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `logo` text NOT NULL,
  `lastupdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`aboutID`, `title`, `content`, `logo`, `lastupdated`) VALUES
(1, 'Local Government of Carmona, Cavite', 'Information Information Information about LGU Carmona - Cavite', 'carmona.png', '2021-03-28 15:51:36'),
(2, 'SK of Carmona, Cavite', 'Information Information Information about SK Carmona - Cavite', 'sk-logo.png', '2021-03-28 15:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `adminaccount`
--

CREATE TABLE `adminaccount` (
  `accountID` int(11) NOT NULL,
  `admin_name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` text NOT NULL,
  `isActive` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminaccount`
--

INSERT INTO `adminaccount` (`accountID`, `admin_name`, `username`, `password`, `isActive`, `date_added`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, '2021-10-22 17:47:55'),
(15, 'Tom', 'tom', 'b2d6744ff0a992ce00430c7556509fca', 0, '2021-11-25 06:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `ai_report`
--

CREATE TABLE `ai_report` (
  `aiID` int(12) NOT NULL,
  `iarno` varchar(50) NOT NULL,
  `dateiar` date NOT NULL,
  `supplier` text NOT NULL,
  `pono` varchar(35) NOT NULL,
  `datepo` date NOT NULL,
  `ris` varchar(35) NOT NULL,
  `ris_date` varchar(35) NOT NULL,
  `sk` varchar(100) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `dateinvoice` date NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `is_approved` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ai_report`
--

INSERT INTO `ai_report` (`aiID`, `iarno`, `dateiar`, `supplier`, `pono`, `datepo`, `ris`, `ris_date`, `sk`, `invoice`, `dateinvoice`, `pro_id`, `pro_type`, `brgy_id`, `is_approved`, `date_added`) VALUES
(1, '123', '2021-11-25', '123', '123', '2021-11-25', '1234', '2021-11-26', '', '1234', '2021-11-26', 1, 1, 1, 1, '2021-11-25 06:34:21'),
(2, '123', '2021-11-25', 'Sample Supplier', '1234', '2021-11-25', '12345', '2021-11-25', '', '123456', '2021-11-25', 3, 1, 4, 0, '2021-11-25 14:25:44'),
(3, 'sadasd', '2021-11-16', 'asd', 'asd', '2021-11-18', 'asd', '2021-12-02', '', 'asd', '2021-11-25', 2, 2, 1, 0, '2021-11-26 17:24:26'),
(4, 'asdasd', '2022-05-31', 'asd', 'asd', '2022-05-31', 'asd', '2022-05-31', '', 'asd', '2022-05-31', 5, 1, 1, 1, '2022-05-31 02:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `ai_report_item`
--

CREATE TABLE `ai_report_item` (
  `aireportID` int(12) NOT NULL,
  `itemno` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(35) NOT NULL,
  `qty` int(12) NOT NULL,
  `amount` varchar(35) NOT NULL,
  `date_acquired` varchar(12) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ai_report_item`
--

INSERT INTO `ai_report_item` (`aireportID`, `itemno`, `description`, `unit`, `qty`, `amount`, `date_acquired`, `pro_id`, `pro_type`, `date_added`) VALUES
(1, '', '1234', '123', 1, '0', '0', 1, 1, '2021-11-25 06:34:02'),
(2, '', 'Sample Description', '12', 3, '0', '0', 3, 1, '2021-11-25 14:25:38'),
(3, '', '121', 'Box', 11, '0', '0', 2, 2, '2021-11-26 17:24:21'),
(4, '', '1', '1', 12121, '0', '0', 5, 1, '2022-05-31 02:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcementID` int(12) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `aType` varchar(12) NOT NULL,
  `aPhoto` text NOT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcementID`, `title`, `content`, `aType`, `aPhoto`, `datePosted`) VALUES
(1, 'Sample Announcement', 'Sample Content', 'Announcement', '', '2021-11-25 06:03:51'),
(2, 'Sampleabc', 'abcdefg', 'Announcement', '', '2021-11-25 06:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` int(100) NOT NULL,
  `start_event` datetime(6) NOT NULL,
  `end_event` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `start_event`, `end_event`) VALUES
(0, 123, '2021-09-01 00:00:00.000000', '2021-09-02 00:00:00.000000'),
(0, 1234, '2021-09-01 00:00:00.000000', '2021-09-02 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `dv_report`
--

CREATE TABLE `dv_report` (
  `aiID` int(12) NOT NULL,
  `dvno` varchar(50) NOT NULL,
  `datedv` date NOT NULL,
  `payee` text NOT NULL,
  `tin` varchar(35) NOT NULL,
  `datepo` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `dvtotal` varchar(35) NOT NULL,
  `fund_amount` varchar(35) NOT NULL,
  `dv_netpay` varchar(35) NOT NULL,
  `vat` int(1) NOT NULL,
  `fund` int(1) NOT NULL,
  `is_process` int(1) NOT NULL,
  `is_approved` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dv_report`
--

INSERT INTO `dv_report` (`aiID`, `dvno`, `datedv`, `payee`, `tin`, `datepo`, `address`, `pro_id`, `pro_type`, `brgy_id`, `dvtotal`, `fund_amount`, `dv_netpay`, `vat`, `fund`, `is_process`, `is_approved`, `date_added`) VALUES
(2, '123', '2021-11-25', 'Sample Payee', '1234', '0000-00-00', 'Sample Address', 3, 1, 4, '10000', '500000.00', '9642.857142857143', 2, 1, 1, 0, '2021-11-25 14:27:01'),
(3, 'Sample', '2021-11-18', 's', 's', '0000-00-00', 's', 1, 1, 1, '', '', '', 0, 0, 0, 1, '2021-11-26 17:01:40'),
(4, 'Sample', '2021-11-18', 's', 's', '0000-00-00', 's', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2021-11-26 17:16:29'),
(5, 'asdasd', '2021-11-17', 'asd', 'sd', '0000-00-00', 'asd', 2, 2, 1, '', '', '', 0, 0, 0, 0, '2021-11-26 17:24:47'),
(6, 'ASASDASD', '2021-12-03', 'ASD', 'ASD', '0000-00-00', 'ASD', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 1, '2021-11-26 17:32:13'),
(7, 'asd', '2021-11-25', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:35:29'),
(8, 'asdsd', '2021-11-24', 'asd', 'asd', '0000-00-00', 'sdas', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:38:10'),
(9, 'asdasd', '2021-11-16', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:40:58'),
(10, 'asd', '2021-11-18', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:43:05'),
(11, 'asd', '2021-12-02', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:46:56'),
(12, 'asdasd', '2021-11-18', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:48:05'),
(13, 'asd', '2021-11-23', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:49:39'),
(14, 'asdasd', '2021-11-24', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:51:11'),
(15, 'sadasdasd', '2021-11-18', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 17:59:18'),
(16, 'asd', '2021-11-16', 'asd', 'asd', '0000-00-00', 'sad', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2021-11-26 17:59:51'),
(17, 'asdasd', '2021-11-12', 'asd', 'sad', '0000-00-00', 'asd', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2021-11-26 18:00:42'),
(18, 'asdasd', '2021-11-24', 'asd', 'sad', '0000-00-00', 'asd', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2021-11-26 18:01:56'),
(19, 'asdasd', '2021-11-17', 'asd', 'asd', '0000-00-00', 'sad', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2021-11-26 18:02:29'),
(20, 'asdasd', '2021-11-10', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 18:04:39'),
(21, 'asdasd', '2021-11-10', 'asd', 'sad', '0000-00-00', 'sad', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2021-11-26 18:05:04'),
(22, 'asdasd', '2021-11-11', 'asd', 'asd', '0000-00-00', 'sad', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 18:06:53'),
(23, 'asdasd', '2021-11-16', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 18:07:49'),
(24, 'asdasd', '2021-11-04', 'asd', 'asd', '0000-00-00', 'sad', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 18:08:28'),
(25, 'asdasd', '2021-11-28', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 18:09:09'),
(26, 'asdasd', '2021-11-25', 'sad', 'sd', '0000-00-00', 'sd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 18:11:40'),
(27, 'asdasd', '2021-11-19', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 18:18:15'),
(28, 'asd', '2021-11-18', 'asd', 'asd', '0000-00-00', 'asd', 4, 3, 1, '20000', '536655.00', '20000', 2, 1, 1, 0, '2021-11-26 18:20:31'),
(29, '1', '2022-05-31', 'asd', '1', '0000-00-00', '1', 5, 1, 1, '11', '516655.00', '10.34', 1, 1, 1, 0, '2022-05-31 02:26:13'),
(30, 'asd', '2022-11-24', 'asd', 'asd', '0000-00-00', 'asd', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2022-11-27 18:25:53'),
(31, 'ASD', '2022-11-15', 'ASD', 'ASD', '0000-00-00', 'SAD', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2022-11-28 03:38:16'),
(32, 'asdasd', '2022-11-30', 'asd', 'asd', '0000-00-00', 'asd', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2022-11-28 04:05:16'),
(33, 'sdasd', '2022-11-23', 'asd', 'as', '0000-00-00', 'as', 1, 1, 1, '', '', '', 0, 0, 0, 0, '2022-11-28 04:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `dv_report_item`
--

CREATE TABLE `dv_report_item` (
  `dvitemID` int(12) NOT NULL,
  `particular` text NOT NULL,
  `amount` varchar(36) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dv_report_item`
--

INSERT INTO `dv_report_item` (`dvitemID`, `particular`, `amount`, `pro_id`, `pro_type`, `date_added`) VALUES
(2, 'Sample Particular', '10000', 3, 1, '2021-11-25 14:26:22'),
(3, 'Test DV 01', '100', 1, 1, '2021-11-26 17:01:30'),
(4, '111', '1700', 2, 2, '2021-11-26 17:24:37'),
(6, 'Test DV 01', '20000', 4, 3, '2021-11-26 18:20:15'),
(7, '111', '11', 5, 1, '2022-05-31 02:24:40'),
(8, 'Test DV 011', '1', 1, 1, '2022-11-27 18:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `datetime_start` text NOT NULL,
  `datetime_end` text NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `brgy_id`, `title`, `datetime_start`, `datetime_end`, `status`, `date_added`) VALUES
(1, 1, '   Sample Projecct', '2021-11-25T14:42', '2021-11-30T14:42', 2, '2021-11-25 06:42:22'),
(2, 4, '   Sample Project', '2021-11-25T22:33', '2021-11-29T22:33', 2, '2021-11-25 14:33:49'),
(3, 1, ' a', '2022-08-22T22:01', '2022-08-23T22:01', 1, '2022-08-22 14:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `pa_report`
--

CREATE TABLE `pa_report` (
  `paID` int(12) NOT NULL,
  `prno` varchar(36) NOT NULL,
  `date_pa` date NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `is_approved` int(12) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pa_report`
--

INSERT INTO `pa_report` (`paID`, `prno`, `date_pa`, `pro_id`, `pro_type`, `brgy_id`, `is_approved`, `date_added`) VALUES
(1, '123', '2021-11-25', 1, 1, 1, 1, '2021-11-25 14:32:52'),
(2, '123', '2021-11-25', 3, 1, 4, 0, '2021-11-25 22:24:36'),
(4, 'sdsd', '2022-05-31', 5, 1, 1, 1, '2022-05-31 10:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `pa_report_item`
--

CREATE TABLE `pa_report_item` (
  `paitemID` int(12) NOT NULL,
  `qty` int(12) NOT NULL,
  `unit` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `property_no` varchar(35) NOT NULL,
  `date_aquired` date NOT NULL,
  `amount` varchar(35) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pa_report_item`
--

INSERT INTO `pa_report_item` (`paitemID`, `qty`, `unit`, `description`, `property_no`, `date_aquired`, `amount`, `pro_id`, `pro_type`, `date_added`) VALUES
(1, 12, '12', '123', '123', '2021-11-26', '1234', 1, 1, '2021-11-25 06:32:46'),
(2, 3, 'Sample Unit', 'Sample Description', '1234', '2021-11-25', '200', 3, 1, '2021-11-25 14:24:20'),
(3, 11, 'Box', '121', '223', '2022-06-01', '123', 5, 1, '2022-05-31 02:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `procurement_bac_resolution`
--

CREATE TABLE `procurement_bac_resolution` (
  `resoID` int(12) NOT NULL,
  `resolution_no` varchar(12) NOT NULL,
  `description` text NOT NULL,
  `prno` varchar(35) NOT NULL,
  `amount` varchar(36) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `is_approved` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement_bac_resolution`
--

INSERT INTO `procurement_bac_resolution` (`resoID`, `resolution_no`, `description`, `prno`, `amount`, `pro_id`, `pro_type`, `brgy_id`, `is_approved`, `date_added`) VALUES
(1, '123', '1234', '12345', '123456', 1, 1, 1, 2, '2021-11-25 06:20:30'),
(2, '123', '1234', '12345', '123456', 3, 1, 4, 0, '2021-11-25 14:16:38'),
(3, '111', '11', '111', '12', 2, 2, 1, 0, '2021-11-26 17:17:33'),
(4, 'Ssdas', 'asd', 'asda', '121212', 5, 1, 1, 1, '2022-05-31 02:09:21'),
(5, 'asda', 'asd', 'asdasd', '11', 6, 1, 1, 1, '2022-09-03 03:31:02'),
(6, 'wer', 'er', 'wer', '1', 7, 1, 1, 1, '2022-09-13 10:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `procurement_goods`
--

CREATE TABLE `procurement_goods` (
  `goodID` int(12) NOT NULL,
  `prno` varchar(35) NOT NULL,
  `date_goods` date NOT NULL,
  `total_estimated` varchar(35) NOT NULL,
  `purpose` text NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `is_approved` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement_goods`
--

INSERT INTO `procurement_goods` (`goodID`, `prno`, `date_goods`, `total_estimated`, `purpose`, `pro_id`, `pro_type`, `brgy_id`, `is_approved`, `date_added`) VALUES
(1, '123', '2021-11-25', '980', 'Sample SK Official', 1, 1, 1, 1, '2021-11-25 06:19:29'),
(2, '123', '2021-11-25', '150', 'SK Official', 3, 1, 4, 0, '2021-11-25 14:15:16'),
(3, 'asdasd', '2021-11-15', '11', '11222', 2, 2, 1, 1, '2021-11-26 17:17:24'),
(4, '123', '2022-05-26', '11', '1234', 5, 1, 1, 1, '2022-05-31 01:53:24'),
(5, 'asas', '2022-09-23', '11', 'asas', 6, 1, 1, 1, '2022-09-03 02:44:51'),
(6, '123456', '2022-09-14', '1', '1212', 7, 1, 1, 1, '2022-09-13 10:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `poID` int(12) NOT NULL,
  `supplier` text NOT NULL,
  `address` text NOT NULL,
  `telno` varchar(100) NOT NULL,
  `tin` varchar(100) NOT NULL,
  `pono` varchar(100) NOT NULL,
  `datepo` date NOT NULL,
  `pro_mode` text NOT NULL,
  `del_place` text NOT NULL,
  `del_date` date NOT NULL,
  `del_terms` varchar(100) NOT NULL,
  `payment_terms` varchar(100) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `is_approved` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`poID`, `supplier`, `address`, `telno`, `tin`, `pono`, `datepo`, `pro_mode`, `del_place`, `del_date`, `del_terms`, `payment_terms`, `pro_id`, `pro_type`, `brgy_id`, `is_approved`, `date_added`) VALUES
(1, '1234', '12345', '123456', '1234567', '12345678', '2021-11-25', 'Sample Mode', 'Sample Place', '2021-11-25', 'Term', 'Payment', 1, 1, 1, 2, '2021-11-25 06:31:33'),
(2, 'Sample Supplier', 'Sample Address', '12345678910', '1234567', '12345', '2021-11-25', 'Sample Mode', 'Sample Place of Delviery', '2021-11-26', 'Sample Term of Delivery', 'Sample Term of Payment', 3, 1, 4, 0, '2021-11-25 14:22:56'),
(3, 'a', 'sdasd', 'asd', 'asd', 'asd', '2021-11-23', 'asd', 'asd', '2021-11-23', 'asd', 'swewe', 2, 2, 1, 0, '2021-11-26 17:24:05'),
(4, 'asd', 'asd', 'asd', 'asd', 'asd', '2022-05-31', 'asd', 'asd', '2022-05-31', 'asd', 'asd', 5, 1, 1, 2, '2022-05-31 02:15:04'),
(5, 'Sample 2', 'Blk 20 Lot 23 Phase 4 PBK Brgy Pasong Kawayan II', '1', '1', '1', '2022-09-14', '1', '1', '2022-09-22', '1', '1', 6, 1, 1, 0, '2022-09-03 06:55:20'),
(6, '1', '1', 'sdf', 'sdf', 'sdf', '2022-09-21', 'sdf', 'sdf', '2022-09-08', 'sdf', 'sdf', 7, 1, 1, 0, '2022-09-13 10:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_item`
--

CREATE TABLE `purchase_order_item` (
  `poitemID` int(12) NOT NULL,
  `poID` int(12) NOT NULL,
  `item_number` varchar(35) NOT NULL,
  `unit` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `qty` int(12) NOT NULL,
  `cost` varchar(35) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_item`
--

INSERT INTO `purchase_order_item` (`poitemID`, `poID`, `item_number`, `unit`, `description`, `qty`, `cost`, `amount`, `pro_id`, `pro_type`, `date_added`) VALUES
(1, 0, 'Particular', '3', '', 5, '30', '150', 1, 1, '2021-11-25 06:31:23'),
(2, 0, 'Sample Particular', '3', '', 12, '40', '480', 3, 1, '2021-11-25 14:22:43'),
(3, 0, '121', 'pc', '', 11, '1', '11', 2, 2, '2021-11-26 17:23:56'),
(4, 0, '121', '1', '', 1, '1', '1', 5, 1, '2022-05-31 02:14:25'),
(5, 0, 'asd', 'test', '', 11, '1', '11', 6, 1, '2022-09-03 05:37:58'),
(6, 0, '1', '1', '', 1, '1', '1', 7, 1, '2022-09-13 10:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `goodsID` int(12) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pr_no` varchar(36) NOT NULL,
  `total_estimate` varchar(36) NOT NULL,
  `sk` text NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE `requisition` (
  `requisitionID` int(12) NOT NULL,
  `item_number` varchar(35) NOT NULL,
  `qty` int(12) NOT NULL,
  `unit` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `unit_cost` varchar(35) NOT NULL,
  `estimated_cost` varchar(35) NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`requisitionID`, `item_number`, `qty`, `unit`, `description`, `unit_cost`, `estimated_cost`, `pro_id`, `pro_type`, `date_added`) VALUES
(1, '1', 3, 'Inches', 'Sample Description', '300', '900', 1, 1, '2021-11-25 14:18:51'),
(2, '2', 4, 'abc', 'abc', '20', '80', 1, 1, '2021-11-25 14:19:09'),
(3, '1', 3, 'Sample Unit', 'Sample Description', '50', '150', 3, 1, '2021-11-25 22:14:44'),
(4, 'asd', 11, 'Box', '121', '1', '11', 2, 2, '2021-11-27 01:17:18'),
(5, '121', 11, 'pc', '1', '1', '11', 5, 1, '2022-05-31 09:51:25'),
(6, '121', 11, '1212', '121', '1', '11', 6, 1, '2022-09-03 10:31:40'),
(7, '1', 1, '1', '1', '1', '1', 7, 1, '2022-09-13 17:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(12) NOT NULL,
  `nonvat` varchar(30) NOT NULL,
  `noncwt` varchar(12) NOT NULL,
  `vat` varchar(12) NOT NULL,
  `cwt` varchar(12) NOT NULL,
  `termscondition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `nonvat`, `noncwt`, `vat`, `cwt`, `termscondition`) VALUES
(1, '1', '1', '10', '1', 'Terms');

-- --------------------------------------------------------

--
-- Table structure for table `skaccount`
--

CREATE TABLE `skaccount` (
  `brgyID` int(11) NOT NULL,
  `barangay_name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `img_profile` text NOT NULL,
  `sk_chairman` varchar(100) NOT NULL,
  `vice_chairman` varchar(100) NOT NULL,
  `secretary` varchar(100) NOT NULL,
  `member1` varchar(100) NOT NULL,
  `member2` varchar(100) NOT NULL,
  `member3` varchar(100) NOT NULL,
  `procuring` varchar(100) NOT NULL,
  `brgy_captain` varchar(100) NOT NULL,
  `committee_approriations` varchar(100) NOT NULL,
  `sk_treasurer` varchar(100) NOT NULL,
  `ai_committee` varchar(100) NOT NULL,
  `budget_officer` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skaccount`
--

INSERT INTO `skaccount` (`brgyID`, `barangay_name`, `username`, `password`, `img_profile`, `sk_chairman`, `vice_chairman`, `secretary`, `member1`, `member2`, `member3`, `procuring`, `brgy_captain`, `committee_approriations`, `sk_treasurer`, `ai_committee`, `budget_officer`, `city`, `province`, `contact`) VALUES
(1, 'Barangay 1', 'barangay1', '93c509b4504af24ed4417efd9fde05c2', 'sk-logo.png', 'Tom Ardemer', 'Vice Chairman', 'BAC Secretariat', 'BAC Member 1', 'BAC Member 2', 'BAC Member 3', 'HOP', '', 'COA', 'SK Treasurer', 'HIAC', 'BMO', 'Carmona', 'Cavite', '12345678910'),
(2, 'Barangay 2', 'barangay2', '80d999005a14f04c75c103c9af645db1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Barangay 3', 'barangay3', 'c5f43f8fea692deb0c743ad19a7b48e6', 'sk-logo.png', 'SK Chairman', 'Vice Chairman', 'BAC Secretariat', 'BAC Member 1', 'BAC Member 2', 'BAC Member 3', 'Head of Procuring', '', 'Chairman, Committee on Approriations', 'SK Treasurer', 'HIAAC', 'Budget Monitoring Officer', 'Carmona', 'Cavite', '12345678910'),
(4, 'Barangay 4', 'barangay4', '02de5b2f9ab8ca310c66a14370d2fb2f', 'sk-logo.png', 'SK Chairman', 'Vice Chairman', 'BAC Secretariat', 'BAC Member 1', 'BAC Member 2', 'BAC Member 3', 'HOP', '', 'COA', 'SK Treasurer', 'HIAC', 'BMO', 'Carmona ', 'Cavirte', '12345678910'),
(5, 'Barangay 5', 'barangay5', 'c1cd997f5ba2ff29bf3d39296772c7c0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Barangay 6', 'barangay6', 'b706fc7a0120ba8c78254dc31bb88723', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Barangay 5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Barangay 8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Barangay 9 (Maduya)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Barangay 10 (Cabilang Baybay)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Barangay 11 (Mabuhay)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Barangay 12 (Milagrosa)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Barangay 13 (Lantic)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'Barangay 14 (Bancal)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sk_budget_record`
--

CREATE TABLE `sk_budget_record` (
  `bID` int(12) NOT NULL,
  `transaction_name` varchar(100) NOT NULL,
  `amount` varchar(36) NOT NULL,
  `brgyID` int(12) NOT NULL,
  `isExpenses` int(1) NOT NULL,
  `is_trust_fund` int(1) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `is_admin` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sk_budget_record`
--

INSERT INTO `sk_budget_record` (`bID`, `transaction_name`, `amount`, `brgyID`, `isExpenses`, `is_trust_fund`, `pro_id`, `title`, `is_admin`, `date_added`) VALUES
(1, 'Trust Fund', '500000', 1, 0, 0, 0, '', 1, '2021-11-25 06:08:45'),
(2, 'Trust Fund', '500000', 1, 2, 1, 0, '', 1, '2021-11-25 06:08:32'),
(3, 'Annual Fund', '500000', 1, 0, 0, 0, '', 1, '2021-11-25 06:09:35'),
(4, 'Suplemental Fund', '50000', 1, 0, 0, 0, '', 1, '2021-11-25 06:10:04'),
(5, 'DV No.123', '12345', 1, 1, 0, 1, '', 0, '2021-11-25 06:37:46'),
(6, 'Annual Fund', '600000', 2, 0, 0, 0, '', 1, '2021-11-25 06:49:43'),
(7, 'Trust Fund', '600000', 2, 2, 1, 0, '', 1, '2021-11-25 06:50:17'),
(8, 'Trust Fund', '500000', 4, 0, 0, 0, '', 1, '2021-11-25 14:02:18'),
(9, 'Trust Fund', '500000', 4, 2, 1, 0, '', 1, '2021-11-25 14:01:37'),
(10, 'Annual Fund', '500000', 4, 0, 0, 0, '', 1, '2021-11-25 14:01:55'),
(11, 'DV No.123', '10000', 4, 1, 0, 3, '', 0, '2021-11-25 14:28:28'),
(12, 'Donation Fund', '10000', 4, 0, 0, 0, '', 0, '2021-11-25 14:31:23'),
(13, 'Sample Expenses', '20000', 4, 1, 0, 0, '', 0, '2021-11-25 14:32:25'),
(14, 'Gastos Ulit', '1000', 1, 1, 0, 0, '', 0, '2021-11-26 16:59:58'),
(15, 'DV No.', '20000', 1, 1, 0, 4, '', 0, '2021-11-26 18:20:42'),
(16, 'DV No.', '11', 1, 1, 0, 5, '', 0, '2022-05-31 02:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `sk_procurement`
--

CREATE TABLE `sk_procurement` (
  `proID` int(12) NOT NULL,
  `title` text NOT NULL,
  `nature` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` int(1) NOT NULL,
  `procurement_type` int(1) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sk_procurement`
--

INSERT INTO `sk_procurement` (`proID`, `title`, `nature`, `date_start`, `date_end`, `status`, `procurement_type`, `brgy_id`, `date_added`) VALUES
(1, 'Sample', 'Sample Nature', '2021-11-25', '2021-11-28', 1, 1, 1, '2021-11-25 06:14:29'),
(2, 'Sample', 'Sample', '2021-11-25', '2021-11-25', 1, 2, 1, '2021-11-25 06:39:16'),
(3, 'Sample Title', 'Sample Nature', '2021-11-25', '2021-11-27', 2, 1, 4, '2021-11-25 14:12:46'),
(4, 'SSS', 'SSS', '2021-11-27', '2021-11-27', 2, 3, 1, '2021-11-26 17:31:29'),
(5, 'Test123', 'Test123', '2022-05-31', '2022-06-03', 2, 1, 1, '2022-05-31 01:51:04'),
(6, 'Samoke11', 'Sample', '2022-09-03', '2022-09-17', 1, 1, 1, '2022-09-03 02:29:47'),
(7, 'Sample Projecct', 'Sample', '2022-09-14', '2022-09-22', 1, 1, 1, '2022-09-13 09:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `sk_trust_fund`
--

CREATE TABLE `sk_trust_fund` (
  `trustID` int(12) NOT NULL,
  `amount` varchar(35) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sk_trust_fund`
--

INSERT INTO `sk_trust_fund` (`trustID`, `amount`, `brgy_id`, `date_added`) VALUES
(1, '500000', 1, '2021-11-25 06:08:32'),
(2, '600000', 2, '2021-11-25 06:50:17'),
(3, '500000', 4, '2021-11-25 14:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(12) NOT NULL,
  `supplier_name` text NOT NULL,
  `address` text NOT NULL,
  `date_process` date NOT NULL,
  `pro_id` int(12) NOT NULL,
  `pro_type` int(12) NOT NULL,
  `is_process` int(1) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `purpose` text NOT NULL,
  `is_approved` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplier_name`, `address`, `date_process`, `pro_id`, `pro_type`, `is_process`, `brgy_id`, `purpose`, `is_approved`, `date_added`) VALUES
(1, 'Sample 1', 'Blk 20 Lot 23 Phase 4 PBK Brgy Pasong Kawayan II', '2022-09-03', 6, 1, 1, 1, '', 1, '2022-09-03 06:44:50'),
(2, 'Sample 2', 'Blk 20 Lot 23 Phase 4 PBK Brgy Pasong Kawayan II', '2022-09-03', 6, 1, 0, 1, '', 1, '2022-09-03 06:44:57'),
(3, '1', '1', '2022-09-13', 7, 1, 1, 1, '11', 1, '2022-09-13 10:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_qoutation`
--

CREATE TABLE `supplier_qoutation` (
  `sqID` int(12) NOT NULL,
  `item_no` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` varchar(12) NOT NULL,
  `amount` varchar(36) NOT NULL,
  `supplier_id` int(12) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_qoutation`
--

INSERT INTO `supplier_qoutation` (`sqID`, `item_no`, `description`, `qty`, `unit_price`, `amount`, `supplier_id`, `date_added`) VALUES
(1, '121', 'asdasd', 1, '100', '100', 1, '2022-09-03 06:47:24'),
(2, 'asd', '121', 11, '20', '220', 1, '2022-09-03 06:47:34'),
(3, 'asd', '121', 11, '5', '55', 2, '2022-09-03 06:47:47'),
(4, '1', '1', 1, '1', '1', 3, '2022-09-13 10:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `tabletry`
--

CREATE TABLE `tabletry` (
  `ID` int(11) NOT NULL,
  `Admin_ID` varchar(50) NOT NULL,
  `Admin Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabletry`
--

INSERT INTO `tabletry` (`ID`, `Admin_ID`, `Admin Name`, `Username`, `Password`, `Status`) VALUES
(1, '1', 'abc', 'abc', 'abc', 0),
(2, '1', 'abc', 'abc', 'abc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Addresss` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `historyID` int(12) NOT NULL,
  `user` varchar(50) NOT NULL,
  `is_sk` int(1) NOT NULL,
  `brgy_id` int(12) NOT NULL,
  `actions` text NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`historyID`, `user`, `is_sk`, `brgy_id`, `actions`, `date_recorded`) VALUES
(1, 'barangay3', 1, 3, 'Add New Procurement Activity ', '2021-11-23 13:26:09'),
(2, 'barangay3', 1, 3, 'Add New Procurement Activity ', '2021-11-24 11:28:33'),
(3, 'barangay3', 1, 3, 'Add Fund for Barangay 3', '2021-11-24 11:32:33'),
(4, 'barangay3', 1, 3, 'Add Expenses for Barangay 3', '2021-11-24 16:00:16'),
(5, 'barangay3', 1, 0, 'Add New Requisition Data ', '2021-11-24 16:04:51'),
(6, 'barangay3', 1, 0, 'Process Purchase Request ', '2021-11-24 16:04:58'),
(7, 'barangay3', 1, 0, 'Process BAC Resolution ', '2021-11-24 16:05:10'),
(8, 'barangay3', 1, 0, 'Add New Supplier Data ', '2021-11-24 16:05:19'),
(9, 'barangay3', 1, 0, 'Add  Supplier Qoutation Data ', '2021-11-24 16:05:24'),
(10, 'barangay3', 1, 0, 'Process Qoutation ', '2021-11-24 16:05:29'),
(11, 'barangay3', 1, 0, 'Add New Purchase Order Data ', '2021-11-24 16:05:48'),
(12, 'barangay3', 1, 0, 'Process Purchase Order ', '2021-11-24 16:05:53'),
(13, 'barangay3', 1, 0, 'Add New PA Data ', '2021-11-24 16:06:18'),
(14, 'barangay3', 1, 0, 'Process Property Acknowledgemenr ', '2021-11-24 16:06:24'),
(15, 'barangay3', 1, 0, 'Add New AI Data ', '2021-11-24 16:06:40'),
(16, 'barangay3', 1, 0, 'Process Acceptance and Inspection  ', '2021-11-24 16:06:46'),
(17, 'barangay3', 1, 0, 'Add  Disbursement Voucher List Data ', '2021-11-24 16:07:01'),
(18, 'barangay3', 1, 0, 'Process DV   ', '2021-11-24 16:07:12'),
(19, 'barangay3', 1, 0, 'Process DV Report', '2021-11-24 16:07:17'),
(20, 'Administrator', 0, 0, 'Removed User', '2021-11-25 03:08:57'),
(21, 'Administrator', 0, 0, 'Update About Us information', '2021-11-25 06:03:15'),
(22, 'Administrator', 0, 0, 'Add User tom', '2021-11-25 06:05:48'),
(23, 'Administrator', 0, 0, 'Disable User', '2021-11-25 06:05:58'),
(24, 'Administrator', 0, 0, 'Disable User', '2021-11-25 06:06:03'),
(25, 'Administrator', 0, 0, 'Update Account for Barangay 1', '2021-11-25 06:07:33'),
(26, 'Administrator', 0, 0, 'Add Fund for Barangay 1', '2021-11-25 06:08:19'),
(27, 'Administrator', 0, 0, 'Process Trust fund for Barangay 1', '2021-11-25 06:08:32'),
(28, 'Administrator', 0, 0, 'Update Fund for Barangay 1', '2021-11-25 06:08:45'),
(29, 'Administrator', 0, 0, 'Add Fund for Barangay 1', '2021-11-25 06:09:35'),
(30, 'Administrator', 0, 0, 'Add Fund for Barangay 1', '2021-11-25 06:10:04'),
(31, 'barangay1', 1, 1, 'Add New Procurement Activity ', '2021-11-25 06:14:29'),
(32, 'barangay1', 1, 0, 'Update  Barangay  Information', '2021-11-25 06:17:36'),
(33, 'barangay1', 1, 0, 'Add New Requisition Data ', '2021-11-25 06:18:52'),
(34, 'barangay1', 1, 0, 'Add New Requisition Data ', '2021-11-25 06:19:09'),
(35, 'barangay1', 1, 0, 'Process Purchase Request ', '2021-11-25 06:19:29'),
(36, 'barangay1', 1, 0, 'Process BAC Resolution ', '2021-11-25 06:20:30'),
(37, 'barangay1', 1, 0, 'Add New Supplier Data ', '2021-11-25 06:21:52'),
(38, 'barangay1', 1, 0, 'Add New Supplier Data ', '2021-11-25 06:22:02'),
(39, 'barangay1', 1, 0, 'Add New Supplier Data ', '2021-11-25 06:22:09'),
(40, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2021-11-25 06:22:36'),
(41, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2021-11-25 06:22:52'),
(42, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2021-11-25 06:24:01'),
(43, 'barangay1', 1, 0, 'Process Qoutation ', '2021-11-25 06:24:38'),
(44, 'barangay1', 1, 0, 'Add New Purchase Order Data ', '2021-11-25 06:31:23'),
(45, 'barangay1', 1, 0, 'Process Purchase Order ', '2021-11-25 06:31:34'),
(46, 'barangay1', 1, 0, 'Add New PA Data ', '2021-11-25 06:32:46'),
(47, 'barangay1', 1, 0, 'Process Property Acknowledgemenr ', '2021-11-25 06:32:52'),
(48, 'barangay1', 1, 0, 'Add New AI Data ', '2021-11-25 06:34:03'),
(49, 'barangay1', 1, 0, 'Process Acceptance and Inspection  ', '2021-11-25 06:34:21'),
(50, 'barangay1', 1, 0, 'Add  Disbursement Voucher List Data ', '2021-11-25 06:34:54'),
(51, 'barangay1', 1, 0, 'Process DV   ', '2021-11-25 06:35:21'),
(52, 'barangay1', 1, 0, 'Process DV Report', '2021-11-25 06:37:46'),
(53, 'barangay1', 1, 1, 'Add New Procurement Activity ', '2021-11-25 06:39:16'),
(54, 'barangay1', 1, 1, 'Add Event Schedule Barangay 1', '2021-11-25 06:42:22'),
(55, 'barangay1', 1, 1, 'Update Event Schedule Barangay 1', '2021-11-25 06:42:32'),
(56, 'barangay1', 1, 1, 'Update Event Schedule Barangay 1', '2021-11-25 06:42:40'),
(57, 'Administrator', 0, 0, 'Update About Us information', '2021-11-25 06:45:13'),
(58, 'Administrator', 0, 0, 'Update Account for Barangay 2', '2021-11-25 06:48:09'),
(59, 'Administrator', 0, 0, 'Add Fund for Barangay 2', '2021-11-25 06:49:43'),
(60, 'Administrator', 0, 0, 'Process Trust fund for Barangay 2', '2021-11-25 06:50:17'),
(61, 'Administrator', 0, 0, 'Update About Us information', '2021-11-25 13:56:10'),
(62, 'Administrator', 0, 0, 'Update About Us information', '2021-11-25 13:56:20'),
(63, 'Administrator', 0, 0, 'Add User sampleuser', '2021-11-25 13:58:16'),
(64, 'Administrator', 0, 0, 'Disable User', '2021-11-25 13:59:28'),
(65, 'Administrator', 0, 0, 'Disable User', '2021-11-25 13:59:33'),
(66, 'Administrator', 0, 0, 'Removed User', '2021-11-25 13:59:38'),
(67, 'Administrator', 0, 0, 'Update Account for Barangay 4', '2021-11-25 14:00:19'),
(68, 'Administrator', 0, 0, 'Add Fund for Barangay 4', '2021-11-25 14:01:12'),
(69, 'Administrator', 0, 0, 'Process Trust fund for Barangay 4', '2021-11-25 14:01:37'),
(70, 'Administrator', 0, 0, 'Add Fund for Barangay 4', '2021-11-25 14:01:55'),
(71, 'Administrator', 0, 0, 'Update Fund for Barangay 4', '2021-11-25 14:02:18'),
(72, 'barangay4', 1, 0, 'Update  Barangay  Information', '2021-11-25 14:11:33'),
(73, 'barangay4', 1, 4, 'Add New Procurement Activity ', '2021-11-25 14:12:47'),
(74, 'barangay4', 1, 0, 'Add New Requisition Data ', '2021-11-25 14:14:44'),
(75, 'barangay4', 1, 0, 'Process Purchase Request ', '2021-11-25 14:15:16'),
(76, 'barangay4', 1, 0, 'Process BAC Resolution ', '2021-11-25 14:16:38'),
(77, 'barangay4', 1, 0, 'Add New Supplier Data ', '2021-11-25 14:17:49'),
(78, 'barangay4', 1, 0, 'Add New Supplier Data ', '2021-11-25 14:18:07'),
(79, 'barangay4', 1, 0, 'Add New Supplier Data ', '2021-11-25 14:18:20'),
(80, 'barangay4', 1, 0, 'Add  Supplier Qoutation Data ', '2021-11-25 14:18:58'),
(81, 'barangay4', 1, 0, 'Add  Supplier Qoutation Data ', '2021-11-25 14:19:14'),
(82, 'barangay4', 1, 0, 'Add  Supplier Qoutation Data ', '2021-11-25 14:19:29'),
(83, 'barangay4', 1, 0, 'Process Qoutation ', '2021-11-25 14:19:54'),
(84, 'barangay4', 1, 0, 'Add New Purchase Order Data ', '2021-11-25 14:22:44'),
(85, 'barangay4', 1, 0, 'Process Purchase Order ', '2021-11-25 14:22:56'),
(86, 'barangay4', 1, 0, 'Add New PA Data ', '2021-11-25 14:24:20'),
(87, 'barangay4', 1, 0, 'Process Property Acknowledgemenr ', '2021-11-25 14:24:36'),
(88, 'barangay4', 1, 0, 'Add New AI Data ', '2021-11-25 14:25:38'),
(89, 'barangay4', 1, 0, 'Process Acceptance and Inspection  ', '2021-11-25 14:25:44'),
(90, 'barangay4', 1, 0, 'Add  Disbursement Voucher List Data ', '2021-11-25 14:26:23'),
(91, 'barangay4', 1, 0, 'Process DV   ', '2021-11-25 14:27:01'),
(92, 'barangay4', 1, 0, 'Process DV Report', '2021-11-25 14:28:28'),
(93, 'barangay4', 1, 4, 'Add Fund for Barangay 4', '2021-11-25 14:31:24'),
(94, 'barangay4', 1, 4, 'Add Expenses for Barangay 4', '2021-11-25 14:32:25'),
(95, 'barangay4', 1, 4, 'Add Event Schedule Barangay 4', '2021-11-25 14:33:49'),
(96, 'barangay4', 1, 4, 'Update Event Schedule Barangay 4', '2021-11-25 14:34:11'),
(97, 'barangay4', 1, 4, 'Update Event Schedule Barangay 4', '2021-11-25 14:34:14'),
(98, 'Administrator', 0, 0, 'Update Account for Barangay 5', '2021-11-25 14:39:10'),
(99, 'Administrator', 0, 0, 'Update Account for Barangay 6', '2021-11-25 21:11:59'),
(100, 'barangay1', 1, 1, 'Add Expenses for Barangay 1', '2021-11-26 16:59:58'),
(101, 'barangay1', 1, 0, 'Add  Disbursement Voucher List Data ', '2021-11-26 17:01:30'),
(102, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:01:40'),
(103, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:16:29'),
(104, 'barangay1', 1, 0, 'Add New Requisition Data ', '2021-11-26 17:17:18'),
(105, 'barangay1', 1, 0, 'Process Purchase Request ', '2021-11-26 17:17:24'),
(106, 'barangay1', 1, 0, 'Process BAC Resolution ', '2021-11-26 17:17:33'),
(107, 'barangay1', 1, 0, 'Add New Supplier Data ', '2021-11-26 17:17:39'),
(108, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2021-11-26 17:17:45'),
(109, 'barangay1', 1, 0, 'Process Qoutation ', '2021-11-26 17:17:50'),
(110, 'barangay1', 1, 0, 'Add New Purchase Order Data ', '2021-11-26 17:23:56'),
(111, 'barangay1', 1, 0, 'Process Purchase Order ', '2021-11-26 17:24:05'),
(112, 'barangay1', 1, 0, 'Add New AI Data ', '2021-11-26 17:24:21'),
(113, 'barangay1', 1, 0, 'Process Acceptance and Inspection  ', '2021-11-26 17:24:26'),
(114, 'barangay1', 1, 0, 'Add  Disbursement Voucher List Data ', '2021-11-26 17:24:37'),
(115, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:24:47'),
(116, 'barangay1', 1, 1, 'Add New Procurement Activity ', '2021-11-26 17:31:29'),
(117, 'barangay1', 1, 0, 'Add  Disbursement Voucher List Data ', '2021-11-26 17:31:43'),
(118, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:32:13'),
(119, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:35:29'),
(120, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:38:10'),
(121, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:40:58'),
(122, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:43:05'),
(123, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:46:56'),
(124, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:48:05'),
(125, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:49:39'),
(126, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:51:11'),
(127, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:59:18'),
(128, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 17:59:51'),
(129, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:00:42'),
(130, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:01:56'),
(131, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:02:29'),
(132, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:04:39'),
(133, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:05:04'),
(134, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:06:53'),
(135, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:07:49'),
(136, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:08:28'),
(137, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:09:09'),
(138, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:11:40'),
(139, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:18:15'),
(140, 'barangay1', 1, 0, 'Delete DV Item Data  ', '2021-11-26 18:20:08'),
(141, 'barangay1', 1, 0, 'Add  Disbursement Voucher List Data ', '2021-11-26 18:20:15'),
(142, 'barangay1', 1, 0, 'Process DV   ', '2021-11-26 18:20:31'),
(143, 'barangay1', 1, 0, 'Process DV Report', '2021-11-26 18:20:42'),
(144, 'barangay1', 1, 1, 'Add New Procurement Activity ', '2022-05-31 01:51:04'),
(145, 'barangay1', 1, 0, 'Add New Requisition Data ', '2022-05-31 01:51:25'),
(146, 'barangay1', 1, 0, 'Process Purchase Request ', '2022-05-31 01:53:24'),
(147, 'barangay1', 1, 0, 'Process BAC Resolution ', '2022-05-31 02:09:21'),
(148, 'barangay1', 1, 0, 'Add New Supplier Data ', '2022-05-31 02:09:31'),
(149, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2022-05-31 02:10:38'),
(150, 'barangay1', 1, 0, 'Process Qoutation ', '2022-05-31 02:10:43'),
(151, 'barangay1', 1, 0, 'Add New Purchase Order Data ', '2022-05-31 02:14:25'),
(152, 'barangay1', 1, 0, 'Process Purchase Order ', '2022-05-31 02:15:04'),
(153, 'barangay1', 1, 0, 'Add New PA Data ', '2022-05-31 02:15:56'),
(154, 'barangay1', 1, 0, 'Process Property Acknowledgemenr ', '2022-05-31 02:16:01'),
(155, 'barangay1', 1, 0, 'Process Property Acknowledgemenr ', '2022-05-31 02:19:24'),
(156, 'barangay1', 1, 0, 'Add New AI Data ', '2022-05-31 02:21:43'),
(157, 'barangay1', 1, 0, 'Process Acceptance and Inspection  ', '2022-05-31 02:23:05'),
(158, 'barangay1', 1, 0, 'Add  Disbursement Voucher List Data ', '2022-05-31 02:24:40'),
(159, 'barangay1', 1, 0, 'Process DV   ', '2022-05-31 02:26:13'),
(160, 'barangay1', 1, 0, 'Process DV Report', '2022-05-31 02:26:19'),
(161, 'barangay1', 1, 1, 'Add Event Schedule Barangay 1', '2022-08-22 14:01:39'),
(162, 'barangay1', 1, 1, 'Add New Procurement Activity ', '2022-09-03 02:29:47'),
(163, 'barangay1', 1, 0, 'Add New Requisition Data ', '2022-09-03 02:31:40'),
(164, 'barangay1', 1, 0, 'Process Purchase Request ', '2022-09-03 02:44:51'),
(165, 'barangay1', 1, 0, 'Process BAC Resolution ', '2022-09-03 03:31:02'),
(166, 'barangay1', 1, 0, 'Add New Supplier Data ', '2022-09-03 03:31:25'),
(167, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2022-09-03 03:31:36'),
(168, 'barangay1', 1, 0, 'Process Qoutation ', '2022-09-03 03:31:46'),
(169, 'barangay1', 1, 0, 'Add New Purchase Order Data ', '2022-09-03 05:37:58'),
(170, 'barangay1', 1, 0, 'Add New Supplier Data ', '2022-09-03 06:27:18'),
(171, 'barangay1', 1, 0, 'Add New Supplier Data ', '2022-09-03 06:44:50'),
(172, 'barangay1', 1, 0, 'Add New Supplier Data ', '2022-09-03 06:44:57'),
(173, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2022-09-03 06:47:24'),
(174, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2022-09-03 06:47:34'),
(175, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2022-09-03 06:47:47'),
(176, 'barangay1', 1, 0, 'Process Qoutation ', '2022-09-03 06:47:52'),
(177, 'barangay1', 1, 0, 'Process Purchase Order ', '2022-09-03 06:55:20'),
(178, 'barangay1', 1, 1, 'Add New Procurement Activity ', '2022-09-13 09:55:03'),
(179, 'barangay1', 1, 0, 'Add New Requisition Data ', '2022-09-13 09:56:44'),
(180, 'barangay1', 1, 0, 'Process Purchase Request ', '2022-09-13 10:02:44'),
(181, 'barangay1', 1, 0, 'Process BAC Resolution ', '2022-09-13 10:06:40'),
(182, 'barangay1', 1, 0, 'Add New Supplier Data ', '2022-09-13 10:07:01'),
(183, 'barangay1', 1, 0, 'Add  Supplier Qoutation Data ', '2022-09-13 10:07:07'),
(184, 'barangay1', 1, 0, 'Process Qoutation ', '2022-09-13 10:07:13'),
(185, 'barangay1', 1, 0, 'Add New Purchase Order Data ', '2022-09-13 10:13:39'),
(186, 'barangay1', 1, 0, 'Process Purchase Order ', '2022-09-13 10:13:47'),
(187, 'barangay1', 1, 0, 'Add  Disbursement Voucher List Data ', '2022-11-27 18:17:18'),
(188, 'barangay1', 1, 0, 'Process DV   ', '2022-11-27 18:25:53'),
(189, 'barangay1', 1, 0, 'Process DV   ', '2022-11-28 03:38:16'),
(190, 'barangay1', 1, 0, 'Process DV   ', '2022-11-28 04:05:16'),
(191, 'barangay1', 1, 0, 'Process DV   ', '2022-11-28 04:10:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`aboutID`);

--
-- Indexes for table `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `ai_report`
--
ALTER TABLE `ai_report`
  ADD PRIMARY KEY (`aiID`);

--
-- Indexes for table `ai_report_item`
--
ALTER TABLE `ai_report_item`
  ADD PRIMARY KEY (`aireportID`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcementID`);

--
-- Indexes for table `dv_report`
--
ALTER TABLE `dv_report`
  ADD PRIMARY KEY (`aiID`);

--
-- Indexes for table `dv_report_item`
--
ALTER TABLE `dv_report_item`
  ADD PRIMARY KEY (`dvitemID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pa_report`
--
ALTER TABLE `pa_report`
  ADD PRIMARY KEY (`paID`);

--
-- Indexes for table `pa_report_item`
--
ALTER TABLE `pa_report_item`
  ADD PRIMARY KEY (`paitemID`);

--
-- Indexes for table `procurement_bac_resolution`
--
ALTER TABLE `procurement_bac_resolution`
  ADD PRIMARY KEY (`resoID`);

--
-- Indexes for table `procurement_goods`
--
ALTER TABLE `procurement_goods`
  ADD PRIMARY KEY (`goodID`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`poID`);

--
-- Indexes for table `purchase_order_item`
--
ALTER TABLE `purchase_order_item`
  ADD PRIMARY KEY (`poitemID`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`goodsID`);

--
-- Indexes for table `requisition`
--
ALTER TABLE `requisition`
  ADD PRIMARY KEY (`requisitionID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `skaccount`
--
ALTER TABLE `skaccount`
  ADD PRIMARY KEY (`brgyID`);

--
-- Indexes for table `sk_budget_record`
--
ALTER TABLE `sk_budget_record`
  ADD PRIMARY KEY (`bID`);

--
-- Indexes for table `sk_procurement`
--
ALTER TABLE `sk_procurement`
  ADD PRIMARY KEY (`proID`);

--
-- Indexes for table `sk_trust_fund`
--
ALTER TABLE `sk_trust_fund`
  ADD PRIMARY KEY (`trustID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `supplier_qoutation`
--
ALTER TABLE `supplier_qoutation`
  ADD PRIMARY KEY (`sqID`);

--
-- Indexes for table `tabletry`
--
ALTER TABLE `tabletry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`historyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `aboutID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adminaccount`
--
ALTER TABLE `adminaccount`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ai_report`
--
ALTER TABLE `ai_report`
  MODIFY `aiID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ai_report_item`
--
ALTER TABLE `ai_report_item`
  MODIFY `aireportID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcementID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dv_report`
--
ALTER TABLE `dv_report`
  MODIFY `aiID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dv_report_item`
--
ALTER TABLE `dv_report_item`
  MODIFY `dvitemID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pa_report`
--
ALTER TABLE `pa_report`
  MODIFY `paID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pa_report_item`
--
ALTER TABLE `pa_report_item`
  MODIFY `paitemID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `procurement_bac_resolution`
--
ALTER TABLE `procurement_bac_resolution`
  MODIFY `resoID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `procurement_goods`
--
ALTER TABLE `procurement_goods`
  MODIFY `goodID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `poID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_order_item`
--
ALTER TABLE `purchase_order_item`
  MODIFY `poitemID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `goodsID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requisition`
--
ALTER TABLE `requisition`
  MODIFY `requisitionID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skaccount`
--
ALTER TABLE `skaccount`
  MODIFY `brgyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sk_budget_record`
--
ALTER TABLE `sk_budget_record`
  MODIFY `bID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sk_procurement`
--
ALTER TABLE `sk_procurement`
  MODIFY `proID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sk_trust_fund`
--
ALTER TABLE `sk_trust_fund`
  MODIFY `trustID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_qoutation`
--
ALTER TABLE `supplier_qoutation`
  MODIFY `sqID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabletry`
--
ALTER TABLE `tabletry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `historyID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
