-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 04:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` varchar(5) DEFAULT NULL,
  `gender` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `age`, `gender`, `contact`, `email`, `password`, `address`, `reg_date`, `status`) VALUES
(3, 'Saif Shovon', '24', 'male', '01736276567', 'saaifshovon@gmail.com', '12345', 'Dhaka', '2018-01-04 09:49:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `all_test`
--

CREATE TABLE `all_test` (
  `id` int(10) NOT NULL,
  `test_code` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `test_details` varchar(255) NOT NULL,
  `cost` int(10) NOT NULL,
  `commission` int(10) NOT NULL,
  `diagnostic_id` int(11) NOT NULL,
  `duration_per_test` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_test`
--

INSERT INTO `all_test` (`id`, `test_code`, `test_name`, `test_details`, `cost`, `commission`, `diagnostic_id`, `duration_per_test`) VALUES
(1, 0, 'y', 'h', 7, 3, 3, 10),
(2, 0, 'blood', 'hfhg', 300, 23, 3, 10),
(3, 0, 'Dental X-ray', '', 500, 10, 4, 10),
(4, 0, 'digital X-ray', '', 400, 10, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_credentials`
--

CREATE TABLE `diagnostic_credentials` (
  `id` int(11) NOT NULL,
  `diagnostic_id` int(11) NOT NULL,
  `region` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `location_details` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnostic_credentials`
--

INSERT INTO `diagnostic_credentials` (`id`, `diagnostic_id`, `region`, `area`, `location_details`, `longitude`, `latitude`) VALUES
(1, 3, 3, 8, 'Agraaaaaaaaaa', '23.755566702634297', '90.38881301879883'),
(2, 4, 2, 3, 'Farmgate', '23.75548814415507', '90.38752555847168');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_info`
--

CREATE TABLE `diagnostic_info` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `drag_reg_no` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnostic_info`
--

INSERT INTO `diagnostic_info` (`id`, `name`, `phone`, `contact`, `email`, `password`, `address`, `drag_reg_no`, `reg_date`, `status`) VALUES
(3, 'Populer Diagnostic Center', '01736276567', '01736276567', 'saaifshovon@gmail.com', '12345', 'Dhaka,Bangladesh', '123', '2018-03-07 16:42:49', 1),
(4, 'Ideal Diagnostic', '01558910490', '01558910490', 'saaifshovon@gmail.com', '12345', 'Dhaka,Bangladesh', '12345', '2018-03-09 18:40:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_schedule`
--

CREATE TABLE `diagnostic_schedule` (
  `id` int(11) NOT NULL,
  `diagnostic_id` int(11) NOT NULL,
  `visiting_day_string` varchar(255) DEFAULT NULL,
  `non_visiting_day_string` varchar(255) DEFAULT NULL,
  `reservation_date_from` date DEFAULT NULL,
  `reservation_date_to` date DEFAULT NULL,
  `slot_1_start_time` varchar(20) DEFAULT NULL,
  `slot_1_end_time` varchar(20) DEFAULT NULL,
  `slot_2_start_time` varchar(20) DEFAULT NULL,
  `slot_2_end_time` varchar(20) DEFAULT NULL,
  `slot_3_start_time` varchar(20) DEFAULT NULL,
  `slot_3_end_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnostic_schedule`
--

INSERT INTO `diagnostic_schedule` (`id`, `diagnostic_id`, `visiting_day_string`, `non_visiting_day_string`, `reservation_date_from`, `reservation_date_to`, `slot_1_start_time`, `slot_1_end_time`, `slot_2_start_time`, `slot_2_end_time`, `slot_3_start_time`, `slot_3_end_time`) VALUES
(1, 1, '0,2,4', '1,3,5,6', '2018-01-10', '2018-01-10', '10:00 AM', '01:00 PM', '02:00 PM', '04:00 PM', '04:00 PM', '06:00 PM'),
(2, 3, '2,6', '0,1,3,4,5', '2018-02-01', '2018-03-31', '10:00 AM', '10:00 PM', '10:00 PM', '10:00 PM', '10:00 PM', '10:00 PM'),
(3, 4, '1,2,3,4', '0,5,6', '2018-03-01', '2018-05-31', '11:00 AM', '04:00 PM', '10:45 PM', '10:45 PM', '10:45 PM', '10:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_credentials`
--

CREATE TABLE `doctor_credentials` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `location_details` varchar(255) DEFAULT NULL,
  `new_patient_fee` double(5,0) DEFAULT NULL,
  `duration_per_patient` float DEFAULT NULL,
  `returning_patient_fee` float(5,0) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_credentials`
--

INSERT INTO `doctor_credentials` (`id`, `doctor_id`, `region`, `area`, `location_details`, `new_patient_fee`, `duration_per_patient`, `returning_patient_fee`, `longitude`, `latitude`) VALUES
(1, 1, '3', '1', 'Monipuri Para', 1234, 30, 1000, '23.761733396515105', '90.38575744314585'),
(2, 2, '3', '8', 'Test', 1000, 20, 800, '23.762330410402758', '90.3786849975586'),
(3, 3, '3', '4', 'Uttara', 600, 30, 500, '23.761733396515105', '90.38575744314585'),
(4, 12, '3', '8', 'gec', 500, 20, 300, '22.34093853769873', '91.78643703460693'),
(5, 13, '2', '1', 'fbg', 200, 10, 200, '23.75619516876141', '90.38319110870361');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `specialist_area_id` int(11) DEFAULT NULL,
  `designation` varchar(30) NOT NULL,
  `speciality` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `bmdc_reg_no` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `degree_and_other_specification` varchar(500) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '0',
  `image_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`id`, `name`, `specialist_area_id`, `designation`, `speciality`, `gender`, `contact`, `phone`, `bmdc_reg_no`, `password`, `description`, `degree_and_other_specification`, `email`, `reg_date`, `status`, `image_location`) VALUES
(2, 'Saif Hossain Shovon', 1, 'Software Engineer', 'Select your Speciality      \n ', 'male', '01558910490', '01558910490', '1234', '123', '', '', 'saaifshovon@gmail.com', '2018-03-07 16:16:57', 0, 'images/t.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `visiting_day_string` varchar(255) DEFAULT NULL,
  `non_visiting_day_string` varchar(255) DEFAULT NULL,
  `reservation_date_from` date DEFAULT NULL,
  `reservation_date_to` date DEFAULT NULL,
  `slot_1_start_time` varchar(20) DEFAULT NULL,
  `slot_1_end_time` varchar(20) DEFAULT NULL,
  `slot_2_start_time` varchar(20) DEFAULT NULL,
  `slot_2_end_time` varchar(20) DEFAULT NULL,
  `slot_3_start_time` varchar(20) DEFAULT NULL,
  `slot_3_end_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`id`, `doctor_id`, `visiting_day_string`, `non_visiting_day_string`, `reservation_date_from`, `reservation_date_to`, `slot_1_start_time`, `slot_1_end_time`, `slot_2_start_time`, `slot_2_end_time`, `slot_3_start_time`, `slot_3_end_time`) VALUES
(1, 1, '0,2,4', '1,3,5,6', '2018-01-10', '2018-01-10', '10:00 AM', '01:00 PM', '02:00 PM', '04:00 PM', '04:00 PM', '06:00 PM'),
(2, 2, '', '', '2018-02-16', '2018-02-16', '', '', '', '', '', ''),
(3, 11, '1,2,3,4,5,6', '0', '2018-02-08', '2018-04-04', '10:00 AM', '12:45 PM', '01:45 PM', '05:45 PM', '06:45 PM', '10:45 PM'),
(4, 12, '2,4,6', '0,1,3,5', '2018-02-01', '2018-03-31', '12:30 AM', '12:30 AM', '12:30 AM', '12:30 AM', '12:30 AM', '12:30 AM'),
(5, 13, '1,2,3', '0,4,5,6', '2018-02-08', '2018-03-21', '10:30 AM', '06:30 PM', '10:30 AM', '10:30 AM', '10:30 AM', '10:30 AM');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialist_area`
--

CREATE TABLE `doctor_specialist_area` (
  `id` int(11) NOT NULL,
  `specialist_area` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `icon_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_specialist_area`
--

INSERT INTO `doctor_specialist_area` (`id`, `specialist_area`, `status`, `icon_name`) VALUES
(1, 'Cardiology', 1, 'cardiologist_icon'),
(2, 'Dental', 1, 'dental_icon'),
(3, 'Dermatology', 1, 'dermatology_icon'),
(4, 'Medicine', 1, 'medicine_icon'),
(5, 'Gastroenterology', 1, 'gastroenterology_icon'),
(6, 'Orthopaedics', 1, 'orthopedics_icon');

-- --------------------------------------------------------

--
-- Table structure for table `sample_test`
--

CREATE TABLE `sample_test` (
  `id` int(11) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `test_details` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sample_test`
--

INSERT INTO `sample_test` (`id`, `test_name`, `test_details`, `status`) VALUES
(1, 'Blood Test', 'Blood Test', 1),
(2, 'Urine Test', 'Urine', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `region_id`, `area_name`, `status`) VALUES
(1, 2, 'Mirpur', 0),
(2, 2, 'Banani', 0),
(3, 2, 'Farmget', 0),
(7, 2, 'Motijhil', 0),
(8, 3, 'Agra', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bmdc_reg_no`
--

CREATE TABLE `tbl_bmdc_reg_no` (
  `id` int(11) NOT NULL,
  `bmdc_reg_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_bmdc_reg_no`
--

INSERT INTO `tbl_bmdc_reg_no` (`id`, `bmdc_reg_no`) VALUES
(1, '12345'),
(2, '1234'),
(3, '3456'),
(4, '6789'),
(5, '6754'),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drag_reg_no`
--

CREATE TABLE `tbl_drag_reg_no` (
  `id` int(11) NOT NULL,
  `drag_reg_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_drag_reg_no`
--

INSERT INTO `tbl_drag_reg_no` (`id`, `drag_reg_no`) VALUES
(1, '12345'),
(2, '1234'),
(3, '3456'),
(4, '6789'),
(5, '6754'),
(6, '22233');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_region`
--

CREATE TABLE `tbl_region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_region`
--

INSERT INTO `tbl_region` (`id`, `region_name`, `status`) VALUES
(2, 'Dhaka', 0),
(3, 'Chittagong', 0),
(4, 'Rajshahi', 0),
(5, 'Khulna', 0),
(6, 'Barisal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_diagnostic_history`
--

CREATE TABLE `user_diagnostic_history` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `diagnostic_id` int(10) DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_diagnostic_history`
--

INSERT INTO `user_diagnostic_history` (`id`, `user_id`, `diagnostic_id`, `doctor_id`, `image`, `date`) VALUES
(1, 3, 3, 3, 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(2, 3, 3, 3, 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(3, 3, 3, 3, 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(4, 3, 3, 3, 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(5, 3, 3, 3, 'images/Adorable-Thank-You-Graphic.gif', '2018-01-11'),
(6, 3, 3, 2, 'images/Adorable-Thank-You-Graphic.gif', '2018-01-11'),
(7, 3, 3, 2, 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(8, 3, 4, 2, 'images/Capture.PNG', '2018-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `user_diag_schedule_table`
--

CREATE TABLE `user_diag_schedule_table` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `diagnostic_id` int(10) DEFAULT NULL,
  `test_id` varchar(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `serial_no` int(11) NOT NULL,
  `trxid` varchar(50) NOT NULL,
  `visiting_status` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_diag_schedule_table`
--

INSERT INTO `user_diag_schedule_table` (`id`, `user_id`, `diagnostic_id`, `test_id`, `date`, `start_time`, `end_time`, `serial_no`, `trxid`, `visiting_status`, `status`) VALUES
(1, 3, 4, '3', '2018-01-11', '11:00:00', '11:10:00', 1, '', 0, 0),
(2, 3, 3, '1', '2018-02-17', '10:00:00', '10:10:00', 1, '', 1, 3),
(3, 3, 3, '2', '2018-02-24', '10:30:00', '10:40:00', 1, '', 0, 0),
(4, 3, 3, '1', '2018-02-20', '10:00:00', '10:10:00', 0, '', 0, 0),
(5, 3, 4, '3', '2018-02-21', '11:00:00', '11:10:00', 0, '', 0, 0),
(13, 3, 3, '1', '2018-03-09', NULL, NULL, 1, '', 0, 1),
(18, 3, 4, '3', '2018-03-09', NULL, NULL, 1, '', 0, 1),
(19, 3, 4, '3,4', '2018-03-09', NULL, NULL, 2, 'Idea2', 0, 1),
(20, 3, 4, '3,4', '2018-03-09', NULL, NULL, 2, 'idea3', 0, 1),
(21, 3, 4, '3,4', '2018-03-09', NULL, NULL, 0, 'vbvbvb', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` varchar(5) DEFAULT NULL,
  `gender` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_code`, `name`, `age`, `gender`, `contact`, `phone`, `email`, `password`, `address`, `reg_date`, `status`) VALUES
(3, 1003, 'Saif Hossain Shovon', '24', 'male', '01736276567', '01736276567', 'saaifshovon@gmail.com', '12345', 'Dhaka', '2018-03-07 15:52:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_prescription_history`
--

CREATE TABLE `user_prescription_history` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `diagnostic_id` int(10) DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `test_name` text NOT NULL,
  `test_code` varchar(100) NOT NULL,
  `medicine` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_prescription_history`
--

INSERT INTO `user_prescription_history` (`id`, `user_id`, `diagnostic_id`, `doctor_id`, `doctor_name`, `user_name`, `age`, `test_name`, `test_code`, `medicine`, `image`, `date`) VALUES
(1, 3, 3, 3, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(2, 3, 3, 3, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(3, 3, 3, 3, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(4, 3, 3, 3, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(5, 3, 3, 3, '', '', 0, '', '', '', 'images/Adorable-Thank-You-Graphic.gif', '2018-01-11'),
(6, 3, 3, 2, '', '', 0, '', '', '', 'images/Adorable-Thank-You-Graphic.gif', '2018-01-11'),
(7, 3, 3, 2, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-11'),
(8, 3, 4, 2, '', '', 0, '', '', '', 'images/Capture.PNG', '2018-01-11'),
(9, 1, 4, 2, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-13'),
(10, 6, 4, 2, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-13'),
(11, 1, 3, 2, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-13'),
(12, 3, 4, 2, '', '', 0, '', '', '', 'images/240_F_127389862_pMUoWAQMoKsq6QOrF8kq8S9KaXOCjlHP.jpg', '2018-01-13'),
(13, 9, 3, 2, '', '', 0, '', '', '', 'images/Desert.jpg', '2018-02-07'),
(14, 9, 3, 13, '', '', 0, '', '', '', 'images/Chrysanthemum.jpg', '2018-02-08'),
(15, NULL, NULL, 2, 'MItu', 'Mousumi', 26, 'Test 1,Test 2,Monday,Wednesday', '', '<p>Napa</p>\n\n<p>Histacine</p>\n', NULL, '2018-02-28'),
(16, NULL, NULL, 2, 'dsg', 'dsg', 0, 'gsdg,gsdg,Monday,Tuesday', '', '<p>rrrrdrh</p>\n', NULL, '2018-02-04'),
(17, NULL, NULL, 2, 'dsg', 'dsg', 344, 'gsdg,gsdg,Monday,Tuesday', '', '<p>rrrrdrh</p>\n', NULL, '2018-02-04'),
(18, 9, NULL, 2, 'Saif', 'bips', 40, 'hh,', '', '<p>hh</p>\n', NULL, '2018-02-16'),
(19, 9, NULL, 2, 'Saif', 'bips', 40, 'hh,', '', '<p>hh</p>\n', NULL, '2018-02-16'),
(20, 9, NULL, 2, 'Saif', 'bips', 40, 'ggg,Dental X-ray', '', '<p>ggg</p>\n', NULL, '2018-03-09'),
(21, 3, NULL, 2, 'Saif Hossain Shovon', 'Saif Hossain Shovon', 24, 'ABCd,EFGH,Blood Test,Urine Test', '', '<p>1.Napa</p>\n\n<p>2.Histacine</p>\n\n<p>3.Omeprajol</p>\n', NULL, '2018-03-31'),
(22, 3, NULL, 2, 'Saif Hossain Shovon', 'Saif Hossain Shovon', 24, 'ABCd,EFGH,Blood Test,Urine Test', '1,2', '<p>1.Napa</p>\n\n<p>2.Histacine</p>\n\n<p>3.Omeprajol</p>\n', NULL, '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `user_schedule_table`
--

CREATE TABLE `user_schedule_table` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_schedule_table`
--

INSERT INTO `user_schedule_table` (`id`, `user_id`, `date`, `start_time`, `end_time`, `doctor_id`, `status`) VALUES
(1, 2, '2018-01-18', '10:00:00', '16:00:00', 1, 1),
(3, 3, '2018-01-11', '10:15:15', '10:30:15', 1, 1),
(16, 3, '2018-01-23', '10:00:00', '10:30:00', 1, 1),
(17, 3, '2018-01-18', '10:00:00', '10:20:00', 2, 1),
(18, 3, '2018-01-17', '10:40:00', '11:00:00', 2, 1),
(19, 3, '2018-01-16', '10:00:00', '10:30:00', 1, 1),
(20, 3, '2018-01-18', '10:30:00', '11:00:00', 1, 1),
(21, 3, '2018-01-25', '10:30:00', '11:00:00', 1, 1),
(22, 3, '2018-01-30', '10:30:00', '11:00:00', 1, 1),
(23, 3, '2018-01-28', '10:00:00', '10:30:00', 1, 1),
(24, 3, '2018-02-01', '10:00:00', '10:30:00', 1, 1),
(25, 3, '2018-02-08', '11:00:00', '11:30:00', 1, 1),
(26, 3, '2018-02-15', '11:30:00', '12:00:00', 1, 1),
(27, 3, '2018-01-10', '08:00:00', '08:20:00', 2, 0),
(28, 9, '2018-02-08', '08:00:00', '08:20:00', 2, 3),
(29, 9, '2018-02-14', '11:10:00', '11:20:00', 13, 3),
(30, 3, '2018-02-07', '08:40:00', '09:00:00', 2, 0),
(31, 3, '2018-02-02', '09:20:00', '09:40:00', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_test`
--
ALTER TABLE `all_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_credentials`
--
ALTER TABLE `diagnostic_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_info`
--
ALTER TABLE `diagnostic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_schedule`
--
ALTER TABLE `diagnostic_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_credentials`
--
ALTER TABLE `doctor_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_specialist_area`
--
ALTER TABLE `doctor_specialist_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_test`
--
ALTER TABLE `sample_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bmdc_reg_no`
--
ALTER TABLE `tbl_bmdc_reg_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_drag_reg_no`
--
ALTER TABLE `tbl_drag_reg_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_region`
--
ALTER TABLE `tbl_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_diagnostic_history`
--
ALTER TABLE `user_diagnostic_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_diag_schedule_table`
--
ALTER TABLE `user_diag_schedule_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_prescription_history`
--
ALTER TABLE `user_prescription_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_schedule_table`
--
ALTER TABLE `user_schedule_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `all_test`
--
ALTER TABLE `all_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `diagnostic_credentials`
--
ALTER TABLE `diagnostic_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `diagnostic_info`
--
ALTER TABLE `diagnostic_info`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `diagnostic_schedule`
--
ALTER TABLE `diagnostic_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doctor_credentials`
--
ALTER TABLE `doctor_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `doctor_specialist_area`
--
ALTER TABLE `doctor_specialist_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sample_test`
--
ALTER TABLE `sample_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_bmdc_reg_no`
--
ALTER TABLE `tbl_bmdc_reg_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_drag_reg_no`
--
ALTER TABLE `tbl_drag_reg_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_region`
--
ALTER TABLE `tbl_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_diagnostic_history`
--
ALTER TABLE `user_diagnostic_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_diag_schedule_table`
--
ALTER TABLE `user_diag_schedule_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_prescription_history`
--
ALTER TABLE `user_prescription_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_schedule_table`
--
ALTER TABLE `user_schedule_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
