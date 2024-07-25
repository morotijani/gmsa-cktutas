-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 01:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_appointment`
--
CREATE DATABASE IF NOT EXISTS `doctor_appointment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `doctor_appointment`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_email_address` varchar(200) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `hospital_address` mediumtext NOT NULL,
  `hospital_contact_no` varchar(30) NOT NULL,
  `hospital_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email_address`, `admin_password`, `admin_name`, `hospital_name`, `hospital_address`, `hospital_contact_no`, `hospital_logo`) VALUES
(1, 'johnsmith@gmail.com', 'password', 'John smith', 'Mount Hospital', '115, Last Lane, NYC', '741287410', '../images/15001.png');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE `appointment_table` (
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_schedule_id` int(11) NOT NULL,
  `appointment_number` int(11) NOT NULL,
  `reason_for_appointment` mediumtext NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(30) NOT NULL,
  `patient_come_into_hospital` enum('No','Yes') NOT NULL,
  `doctor_comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`appointment_id`, `doctor_id`, `patient_id`, `doctor_schedule_id`, `appointment_number`, `reason_for_appointment`, `appointment_time`, `status`, `patient_come_into_hospital`, `doctor_comment`) VALUES
(3, 1, 3, 2, 1000, 'Pain in Stomach', '09:00:00', 'Cancel', 'No', ''),
(4, 1, 3, 2, 1001, 'Paint in stomach', '09:00:00', 'Booked', 'No', ''),
(5, 1, 4, 2, 1002, 'For Delivery', '09:30:00', 'Completed', 'Yes', 'She gave birth to boy baby.'),
(6, 5, 3, 7, 1003, 'Fever and cold.', '18:00:00', 'In Process', 'Yes', ''),
(7, 6, 5, 13, 1004, 'Pain in Stomach.', '15:30:00', 'In Process', 'Yes', 'Acidity Problem. ');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule_table`
--

CREATE TABLE `doctor_schedule_table` (
  `doctor_schedule_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_schedule_date` date NOT NULL,
  `doctor_schedule_day` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `doctor_schedule_start_time` varchar(20) NOT NULL,
  `doctor_schedule_end_time` varchar(20) NOT NULL,
  `average_consulting_time` int(5) NOT NULL,
  `doctor_schedule_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_schedule_table`
--

INSERT INTO `doctor_schedule_table` (`doctor_schedule_id`, `doctor_id`, `doctor_schedule_date`, `doctor_schedule_day`, `doctor_schedule_start_time`, `doctor_schedule_end_time`, `average_consulting_time`, `doctor_schedule_status`) VALUES
(2, 1, '2021-02-19', 'Friday', '09:00', '14:00', 15, 'Active'),
(3, 2, '2021-02-19', 'Friday', '09:00', '12:00', 15, 'Active'),
(4, 5, '2021-02-19', 'Friday', '10:00', '14:00', 10, 'Active'),
(5, 3, '2021-02-19', 'Friday', '13:00', '17:00', 20, 'Active'),
(6, 4, '2021-02-19', 'Friday', '15:00', '18:00', 5, 'Active'),
(7, 5, '2021-02-22', 'Monday', '18:00', '20:00', 10, 'Active'),
(8, 2, '2021-02-24', 'Wednesday', '09:30', '12:30', 10, 'Active'),
(9, 5, '2021-02-24', 'Wednesday', '11:00', '15:00', 10, 'Active'),
(10, 1, '2021-02-24', 'Wednesday', '12:00', '15:00', 10, 'Active'),
(11, 3, '2021-02-24', 'Wednesday', '14:00', '17:00', 15, 'Active'),
(12, 4, '2021-02-24', 'Wednesday', '16:00', '20:00', 10, 'Active'),
(13, 6, '2021-02-24', 'Wednesday', '15:30', '18:30', 10, 'Active'),
(14, 6, '2021-02-25', 'Thursday', '10:00', '13:30', 10, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_table`
--

CREATE TABLE `doctor_table` (
  `doctor_id` int(11) NOT NULL,
  `doctor_email_address` varchar(200) NOT NULL,
  `doctor_password` varchar(100) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_profile_image` varchar(100) NOT NULL,
  `doctor_phone_no` varchar(30) NOT NULL,
  `doctor_address` mediumtext NOT NULL,
  `doctor_date_of_birth` date NOT NULL,
  `doctor_degree` varchar(200) NOT NULL,
  `doctor_expert_in` varchar(100) NOT NULL,
  `doctor_status` enum('Active','Inactive') NOT NULL,
  `doctor_added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_table`
--

INSERT INTO `doctor_table` (`doctor_id`, `doctor_email_address`, `doctor_password`, `doctor_name`, `doctor_profile_image`, `doctor_phone_no`, `doctor_address`, `doctor_date_of_birth`, `doctor_degree`, `doctor_expert_in`, `doctor_status`, `doctor_added_on`) VALUES
(1, 'peterparker@gmail.com', 'password', 'Dr. Peter Parker', '../images/10872.jpg', '7539518520', '102, Sky View, NYC', '1985-10-29', 'MBBS MS', 'Sergen', 'Active', '2021-02-15 17:04:59'),
(2, 'adambrodly@gmail.com', 'password', 'Dr. Adam Broudly', '../images/21336.jpg', '753852963', '105, Fort, NYC', '1982-08-10', 'MBBS MD(Cardiac)', 'Cardiologist', 'Active', '2021-02-18 15:00:32'),
(3, 'sophia.parker@gmail.com', 'password', 'Dr. Sophia Parker', '../images/13838.jpg', '7417417410', '50, Best street CA', '1989-04-03', 'MBBS', 'Gynacologist', 'Active', '2021-02-18 15:05:02'),
(4, 'williampeterson@gmail.com', 'password', 'Dr. William Peterson', '../images/9498.jpg', '8523698520', '32, Green City, NYC', '1984-06-11', 'MBBS MD', 'Nurologist', 'Active', '2021-02-18 15:08:24'),
(5, 'emmalarsdattor@gmail.com', 'password', 'Dr. Emma Larsdattor', '../images/1613641523.png', '9635852025', '25, Silver Arch', '1988-03-03', 'MBBS MD', 'General Physian', 'Active', '2021-02-18 15:15:23'),
(6, 'manuel.armstrong@gmail.com', 'password', 'Dr. Manuel Armstrong', '../images/1614081376.png', '8523697410', '2378 Fire Access Road Asheboro, NC 27203', '1989-03-01', 'MBBS MD (Medicine)', 'General Physician', 'Active', '2021-02-23 17:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `patient_id` int(11) NOT NULL,
  `patient_email_address` varchar(200) NOT NULL,
  `patient_password` varchar(100) NOT NULL,
  `patient_first_name` varchar(100) NOT NULL,
  `patient_last_name` varchar(100) NOT NULL,
  `patient_date_of_birth` date NOT NULL,
  `patient_gender` enum('Male','Female','Other') NOT NULL,
  `patient_address` mediumtext NOT NULL,
  `patient_phone_no` varchar(30) NOT NULL,
  `patient_maritial_status` varchar(30) NOT NULL,
  `patient_added_on` datetime NOT NULL,
  `patient_verification_code` varchar(100) NOT NULL,
  `email_verify` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient_table`
--

INSERT INTO `patient_table` (`patient_id`, `patient_email_address`, `patient_password`, `patient_first_name`, `patient_last_name`, `patient_date_of_birth`, `patient_gender`, `patient_address`, `patient_phone_no`, `patient_maritial_status`, `patient_added_on`, `patient_verification_code`, `email_verify`) VALUES
(3, 'jacobmartin@gmail.com', 'password', 'Jacob', 'Martin', '2021-02-26', 'Male', 'Green view, 1025, NYC', '85745635210', 'Single', '2021-02-18 16:34:55', 'b1f3f8409f7687072adb1f1b7c22d4b0', 'Yes'),
(4, 'oliviabaker@gmail.com', 'password', 'Olivia', 'Baker', '2001-04-05', 'Female', 'Diamond street, 115, NYC', '7539518520', 'Married', '2021-02-19 18:28:23', '8902e16ef62a556a8e271c9930068fea', 'Yes'),
(5, 'web-tutorial@programmer.net', 'password', 'Amber', 'Anderson', '1995-07-25', 'Female', '2083 Cameron Road Buffalo, NY 14202', '75394511442', 'Single', '2021-02-23 17:50:06', '1909d59e254ab7e433d92f014d82ba3d', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment_table`
--
ALTER TABLE `appointment_table`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctor_schedule_table`
--
ALTER TABLE `doctor_schedule_table`
  ADD PRIMARY KEY (`doctor_schedule_id`);

--
-- Indexes for table `doctor_table`
--
ALTER TABLE `doctor_table`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_table`
--
ALTER TABLE `appointment_table`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_schedule_table`
--
ALTER TABLE `doctor_schedule_table`
  MODIFY `doctor_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctor_table`
--
ALTER TABLE `doctor_table`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `garypie`
--
CREATE DATABASE IF NOT EXISTS `garypie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `garypie`;

-- --------------------------------------------------------

--
-- Table structure for table `garypie_about`
--

CREATE TABLE `garypie_about` (
  `about_id` int(11) NOT NULL,
  `about_info` text NOT NULL,
  `about_street1` varchar(250) NOT NULL,
  `about_street2` varchar(250) NOT NULL,
  `about_country` varchar(250) NOT NULL,
  `about_state` varchar(250) NOT NULL,
  `about_city` varchar(250) NOT NULL,
  `about_phone` varchar(20) NOT NULL,
  `about_email` varchar(250) NOT NULL,
  `about_phone2` varchar(20) NOT NULL,
  `about_fax` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_about`
--

INSERT INTO `garypie_about` (`about_id`, `about_info`, `about_street1`, `about_street2`, `about_country`, `about_state`, `about_city`, `about_phone`, `about_email`, `about_phone2`, `about_fax`) VALUES
(1, '                                        <p>mifo Lorem moro dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. tijani Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <strong>ullamco </strong>laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. wsf</p>                                ', 'AF-0006-0091', 'FL 32904', 'ghana', 'ashanti', 'kumasi', '+4 47 732 190 449', 'info@garypie.com', '+233 24 387 4525', '+1 234 567 89');

-- --------------------------------------------------------

--
-- Table structure for table `garypie_admin`
--

CREATE TABLE `garypie_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_email` varchar(175) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_joined_date` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_last_login` datetime DEFAULT NULL,
  `admin_permissions` varchar(255) NOT NULL,
  `admin_trash` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_admin`
--

INSERT INTO `garypie_admin` (`admin_id`, `admin_fullname`, `admin_email`, `admin_password`, `admin_joined_date`, `admin_last_login`, `admin_permissions`, `admin_trash`) VALUES
(1, 'alhaji priest babson', 'admin@garypie.com', '$2y$10$YisQySADJR3ZPrlg.Tezt.1WxV/fqoMYSr902u6DN.Dah8xhpLnR2', '2020-02-21 21:01:31', '2024-07-18 21:36:30', 'admin,editor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `garypie_brand`
--

CREATE TABLE `garypie_brand` (
  `brand_id` bigint(20) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_banner` text DEFAULT NULL,
  `brand_url` varchar(1000) NOT NULL,
  `brand_added_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_brand`
--

INSERT INTO `garypie_brand` (`brand_id`, `brand_name`, `brand_banner`, `brand_url`, `brand_added_date`) VALUES
(1, 'G A R Y P I E', 'assets/media/collections/6a81ccad94bb333b28a7ae44b987a9e8.jpg', 'g-a-r-y-p-i-e', '2023-04-09 05:09:25'),
(2, 'The Rest Of A Back Man', 'assets/media/collections/28998144532e57daf180772941452b85.jpg', 'the-rest-of-a-back-man', '2023-04-09 05:09:45'),
(3, 'One Day @ a Time 🕊🚧', 'assets/media/collections/4002785998563eb68c066705eaaa5aef.jpg', 'bola-citizns', '2023-04-09 05:10:04'),
(4, 'Go Gary ✊🏾', 'assets/media/collections/a1e833c7afa741c98dd7bb24a9ece779.jpg', 'go-gary-', '2023-04-09 05:10:27'),
(8, 'collection', 'assets/media/collections/ae7cab227fb2f6468f095f6ce4e665b5.jpg', 'collection', '2024-06-25 19:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `garypie_cart`
--

CREATE TABLE `garypie_cart` (
  `id` bigint(20) NOT NULL,
  `cart_id` varchar(300) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `items` text NOT NULL,
  `expire_date` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT 0,
  `shipped` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_cart`
--

INSERT INTO `garypie_cart` (`id`, `cart_id`, `order_number`, `items`, `expire_date`, `paid`, `shipped`) VALUES
(11, '899e91f2-09e3-4bbb-aa86-748704a1b10e', '1719-339149-1441', '[{\"user_id\":\"0\",\"id\":\"5aa3f328-7c8b-41cb-bbc4-b05855274029\",\"size\":\"n/a\",\"quantity\":\"1\",\"pays\":0}]', '2024-07-25 20:12:29', 0, 0),
(12, '785410e8-2956-44a8-96a0-9267fc924e38', '1719-339187-6821', '[{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"0d85278e-7e2c-4319-9cbd-c9c7a0a72307\",\"size\":\"mv\",\"quantity\":1,\"pays\":1},{\"user_id\":\"0\",\"id\":\"bc201617-a257-4faa-a4ec-dfda7305f93c\",\"size\":\"n\\/a\",\"quantity\":\"2\",\"pays\":0},{\"user_id\":\"0\",\"id\":\"5c56cd5c-69d9-43f0-9847-0418be565648\",\"size\":\"small\",\"quantity\":1,\"pays\":0}]', '2024-07-25 21:21:08', 1, 0),
(13, 'a7b82836-246e-40de-a5d9-e7d4eddea2d2', '1719-372708-0801', '[{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"5aa3f328-7c8b-41cb-bbc4-b05855274029\",\"size\":\"n/a\",\"quantity\":\"1\",\"pays\":0}]', '2024-07-26 05:31:48', 0, 0),
(14, 'd0145000-29dd-4985-a973-bd19745ea028', '1719-373567-6951', '[{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"bc201617-a257-4faa-a4ec-dfda7305f93c\",\"size\":\"n\\/a\",\"quantity\":\"1\",\"pays\":1}]', '2024-07-26 05:46:07', 1, 1),
(15, '5fb1611c-e859-4c42-a867-e03e496a2f76', '1719-373741-0301', '[{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"121212\",\"size\":\"large\",\"quantity\":\"1\",\"pays\":1},{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"5aa3f328-7c8b-41cb-bbc4-b05855274029\",\"size\":\"n\\/a\",\"quantity\":\"1\",\"pays\":1}]', '2024-07-26 05:49:08', 1, 0),
(16, 'cc346ab3-0f34-43d0-bae1-61fdf9224596', '1719-375030-8151', '[{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"121212\",\"size\":\"small\",\"quantity\":\"2\",\"pays\":1}]', '2024-07-26 06:10:30', 1, 0),
(17, 'c9894ec6-070d-4169-ad7c-99023b06c034', '1719-375136-0621', '[{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"0d85278e-7e2c-4319-9cbd-c9c7a0a72307\",\"size\":\"mv\",\"quantity\":\"1\",\"pays\":1},{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"ff5faa55-d26d-4c0a-9aa3-af298bb42ede\",\"size\":\"n\\/a\",\"quantity\":\"1\",\"pays\":1}]', '2024-07-26 06:12:46', 1, 1),
(18, '0d1fd3b6-e0ef-472c-b0e8-3985b04407ae', '1719-399830-3661', '[{\"user_id\":\"0\",\"id\":\"5aa3f328-7c8b-41cb-bbc4-b05855274029\",\"size\":\"n\\/a\",\"quantity\":\"1\",\"pays\":1}]', '2024-07-26 11:03:50', 1, 0),
(19, 'd8fcb7a5-6944-4c02-ae10-b3b56101b84a', '1719-408603-4871', '[{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"121212\",\"size\":\"small\",\"quantity\":\"4\",\"pays\":1}]', '2024-07-26 13:30:03', 1, 0),
(20, 'b43847cf-e128-4927-93a3-97926524705b', '1719-411007-4421', '[{\"user_id\":\"0\",\"id\":\"121212\",\"size\":\"small\",\"quantity\":2,\"pays\":1}]', '2024-07-26 14:10:15', 1, 0),
(22, 'fcccb8e4-831a-40aa-8f0c-27db4d713570', '1719-645274-5661', '[{\"user_id\":\"0\",\"id\":\"ff5faa55-d26d-4c0a-9aa3-af298bb42ede\",\"size\":\"n\\/a\",\"quantity\":6,\"pays\":1}]', '2024-07-29 07:14:41', 1, 0),
(23, '88a73adc-597b-4e27-ba41-d2d66d122415', '1719-646710-6461', '[{\"user_id\":\"96dc61d5-cade-4776-b126-fe08050535ce\",\"id\":\"0d85278e-7e2c-4319-9cbd-c9c7a0a72307\",\"size\":\"mv\",\"quantity\":1,\"pays\":1}]', '2024-07-29 07:38:30', 1, 0),
(24, '2ceaf45d-e1ce-45b3-8cbd-75c39e38b338', '1720-105924-5231', '[{\"user_id\":\"182a7193-fc47-401e-a106-1e4f90361a9f\",\"id\":\"5aa3f328-7c8b-41cb-bbc4-b05855274029\",\"size\":\"n\\/a\",\"quantity\":\"2\",\"pays\":1}]', '2024-08-03 15:12:04', 1, 0),
(25, 'f44c018a-e71f-4eca-abf5-e7c3b9785c45', '1720-106702-0231', '[{\"user_id\":\"182a7193-fc47-401e-a106-1e4f90361a9f\",\"id\":\"bc201617-a257-4faa-a4ec-dfda7305f93c\",\"size\":\"n\\/a\",\"quantity\":2,\"pays\":1},{\"user_id\":\"182a7193-fc47-401e-a106-1e4f90361a9f\",\"id\":\"0d85278e-7e2c-4319-9cbd-c9c7a0a72307\",\"size\":\"mv\",\"quantity\":\"1\",\"pays\":1}]', '2024-08-03 15:26:29', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `garypie_category`
--

CREATE TABLE `garypie_category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `category_parent` int(11) NOT NULL,
  `category_added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `category_url` varchar(1000) DEFAULT NULL,
  `category_trash` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_category`
--

INSERT INTO `garypie_category` (`category_id`, `category`, `category_parent`, `category_added_date`, `category_url`, `category_trash`) VALUES
(1, 'menswear', 0, '2023-03-27 14:52:25', 'menswear', 0),
(2, 'womeanwear', 0, '2023-03-27 14:52:41', 'womeanwear', 0),
(3, 'tops', 1, '2023-03-27 14:52:55', 'menswear-tops', 0),
(4, 'tops', 2, '2023-03-27 14:53:03', 'womeanwear-tops', 0),
(5, 'downs', 1, '2023-03-27 14:53:12', 'menswear-downs', 0),
(6, 'downs', 2, '2023-03-27 14:53:20', 'womeanwear-downs', 0),
(7, 'pants', 2, '2023-03-27 15:16:31', 'womeanwear-pants', 0),
(8, 'wo wear', 0, '2024-06-23 20:10:05', 'wo-wear', 0),
(9, 'baby pants', 8, '2024-06-23 20:10:56', 'wo-wear-baby-pants', 0),
(10, 'wo under', 8, '2024-06-24 00:10:45', 'wo-under', 0),
(11, 'del cat', 0, '2024-06-24 00:44:08', 'del-cat', 0),
(12, 'child 1', 11, '2024-06-24 00:44:35', 'del-cat-child-1', 0),
(13, 'Kids wear', 0, '2024-07-04 15:57:34', 'kids-wear', 0),
(14, 'tops', 13, '2024-07-04 15:57:51', 'kids-wear-tops', 0);

-- --------------------------------------------------------

--
-- Table structure for table `garypie_collection`
--

CREATE TABLE `garypie_collection` (
  `id` bigint(20) NOT NULL,
  `collection_name` varchar(500) DEFAULT NULL,
  `collection_image` text DEFAULT NULL,
  `collection_date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `garypie_contact`
--

CREATE TABLE `garypie_contact` (
  `id` bigint(20) NOT NULL,
  `contact_id` varchar(300) DEFAULT NULL,
  `contact_firstname` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(500) NOT NULL,
  `contact_message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_contact`
--

INSERT INTO `garypie_contact` (`id`, `contact_id`, `contact_firstname`, `contact_email`, `contact_subject`, `contact_message`, `createdAt`, `updatedAt`) VALUES
(2, '00314052-1db7-47ef-a195-29fa23417472', 'wknwk', 'lkmkl@fefe.com', 'fmkm', 'dfsdf', '2023-04-12 05:23:25', '2024-06-25 15:06:17'),
(3, '21624302-2766-4d41-9ff5-327e6f7fb471', 'fkejnkjn', 'knjfvn@fefed.com', 'kjnfj', 'kjdsnkfs', '2023-04-12 05:23:59', '2024-06-25 15:06:23'),
(4, '0e484a05-087a-49a0-8f5f-a24c6f169002', 'jkwnfj', 'kjnvjkn@fr.com', 'jbwfjwn', 'kjndkjn', '2023-04-12 05:24:19', '2024-06-25 15:06:30'),
(5, 'bafffcf7-bcf3-49d3-a962-613480511b4f', 'baba', 'babab@ded.com', 'sdc', 'dwcsdsdc', '2024-06-25 15:21:20', NULL),
(6, '7380fcb4-9c77-42c0-a786-d22303397545', 'baba', 'lanit85225@dogemn.com', 'sdc', 'dwdwed wed', '2024-06-25 15:22:18', NULL),
(7, 'e53177ad-73a1-46e3-b62f-ab10ba022c84', 'baba', 'lanit85225@dogemn.com', 'sdc', 'dwdwed wed', '2024-06-25 15:22:29', NULL),
(9, '7f2038b4-844a-4ef5-97dc-a88210e5ed70', 'tijani', 'tijanimoro@yahoo.com', 'purchase issue', 'bla bla bla bla', '2024-06-26 09:09:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `garypie_faq`
--

CREATE TABLE `garypie_faq` (
  `id` int(11) NOT NULL,
  `faq_heading` varchar(300) NOT NULL,
  `faq_added_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_faq`
--

INSERT INTO `garypie_faq` (`id`, `faq_heading`, `faq_added_date`) VALUES
(1, 'price', '2023-04-12'),
(2, 'cos', '2023-04-12'),
(3, 'Shipping', '2024-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `garypie_faq_details`
--

CREATE TABLE `garypie_faq_details` (
  `id` bigint(20) NOT NULL,
  `faq_parent` int(11) NOT NULL,
  `faq_question` varchar(500) NOT NULL,
  `faq_answer` text NOT NULL,
  `faq_added_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_faq_details`
--

INSERT INTO `garypie_faq_details` (`id`, `faq_parent`, `faq_question`, `faq_answer`, `faq_added_date`) VALUES
(1, 1, 'how much', 'nndss', '2023-04-12 05:32:13'),
(2, 2, 'dfsd', 'sdsvsdvsdvs', '2023-04-12 05:33:19'),
(4, 3, 'how to ship', 'provide your address', '2024-06-24 15:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `garypie_product`
--

CREATE TABLE `garypie_product` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(300) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `product_list_price` decimal(10,2) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_brand` int(11) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_added_by` int(11) DEFAULT NULL,
  `product_added_date` datetime DEFAULT current_timestamp(),
  `product_featured` tinyint(4) NOT NULL DEFAULT 0,
  `product_sizes` text NOT NULL,
  `product_url` varchar(1000) DEFAULT NULL,
  `product_trash` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_product`
--

INSERT INTO `garypie_product` (`id`, `product_id`, `product_name`, `product_category`, `product_list_price`, `product_price`, `product_brand`, `product_image`, `product_description`, `product_added_by`, `product_added_date`, `product_featured`, `product_sizes`, `product_url`, `product_trash`) VALUES
(2, '5c56cd5c-69d9-43f0-9847-0418be565648', 'again me', 3, 800.99, 763.99, 4, '/garypie/store/media/uploaded-products/289dbaada15ac02119d3d3a7c35db50c.jpg,/garypie/store/media/uploaded-products/74f77bb46c5ef7860a496fe4f4f1c3cd.jpg', '<p>bla</p>', 1, '2023-03-27 15:25:46', 1, 'small:1:2', 'again-me', 0),
(3, '5aa3f328-7c8b-41cb-bbc4-b05855274029', 'come closer', 7, 0.00, 732.99, 1, '/garypie/store/media/uploaded-products/c99dadb67533bfcbd498f064f4a7f740.jpg,/garypie/store/media/uploaded-products/718bf67cba29680550f4f19366f9b2a3.jpg', '<p>bla</p>', 1, '2023-03-27 15:39:24', 1, 'n/a:6:2', 'come-closer', 0),
(4, 'bc201617-a257-4faa-a4ec-dfda7305f93c', 'easy wear', 6, 0.00, 500.99, 1, '/garypie/store/media/uploaded-products/b3bd5dfdae6359b1c9c99938eb871c99.jpg,/garypie/store/media/uploaded-products/2d848a808eb0ff1e80d56a0e108dce80.jpg', '<p>just ne</p>', 1, '2023-03-27 15:55:08', 1, 'n/a:5:4', 'easy-wear', 0),
(5, '0d85278e-7e2c-4319-9cbd-c9c7a0a72307', 'short sleeve', 4, 0.00, 120.99, 4, '/garypie/store/media/uploaded-products/0664bfcd1006bbe64b364ae81fec9e49.jpg,/garypie/store/media/uploaded-products/a87bffeccaee4d6447187f5d9d319d24.jpg', '<p>bla</p>', 1, '2023-03-31 01:23:39', 1, 'mv:0:1', 'short-sleeve', 0),
(6, 'a9b388c4-2c08-4705-852e-16447afba1db', 'straight dress', 3, 245.99, 130.99, 4, '/garypie/store/media/uploaded-products/42f512701216bc83abed2306aaba7a8a.jpg,/garypie/store/media/uploaded-products/6bd5166e280373bc97d8244dbaf2bec1.jpg', '<p>bla</p>', 1, '2023-04-04 04:51:55', 0, 'n/a:3:1', 'straight-dress', 0),
(7, '43aaceaa-bc45-4cf1-98c9-4d8c1223707e', 'we de', 3, 0.02, 0.50, 2, 'shop/media/uploaded-products/569151874c55861e4e5db843838a3cb7.png,shop/media/uploaded-products/d8981227e9b7a9ccad4b558a864d3023.png', '<p>we</p>', 1, '2023-04-09 13:51:53', 0, 'n/a:2:', 'we-de', 1),
(8, '121212', 'nice black', 10, 200.99, 190.99, 3, '/garypie/store/media/uploaded-products/57ba6efc83ef623c59a6c4e2c2dc995c.jpg,/garypie/store/media/uploaded-products/8630ee08d01b490222e71be0241ecc21.jpg', '<p>vhim</p>', 1, '2024-06-25 11:56:47', 0, 'small:4:4,large:3:1', 'nice-black', 0),
(9, 'ff5faa55-d26d-4c0a-9aa3-af298bb42ede', 'straightdress', 7, 400.99, 300.99, 2, '/garypie/store/media/uploaded-products/9adfc4099976a813f8df58bd6af81ff4.jpg,/garypie/store/media/uploaded-products/ecb104009ca626148718c3467a36a698.jpg', '<p>ok ok</p>', 1, '2024-06-25 12:20:59', 0, 'n/a:5:4', 'straightdress', 0);

-- --------------------------------------------------------

--
-- Table structure for table `garypie_subscription`
--

CREATE TABLE `garypie_subscription` (
  `subscription_id` int(11) NOT NULL,
  `subscription_email` varchar(255) NOT NULL,
  `subscription_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_subscription`
--

INSERT INTO `garypie_subscription` (`subscription_id`, `subscription_email`, `subscription_date`) VALUES
(1, 'tjhackx111@gmail.com', '2023-04-04 03:18:43'),
(2, 'tjhackx1111@gmail.com', '2024-06-25 15:29:51'),
(3, 'tijanimoro0684@outlook.com', '2024-06-26 09:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `garypie_transaction`
--

CREATE TABLE `garypie_transaction` (
  `id` bigint(20) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `transaction_cart_id` varchar(300) NOT NULL,
  `transaction_user_id` varchar(300) NOT NULL,
  `transaction_full_name` varchar(255) NOT NULL,
  `transaction_email` varchar(255) NOT NULL,
  `transaction_street` varchar(255) NOT NULL,
  `transaction_street2` varchar(255) NOT NULL,
  `transaction_company` varchar(255) NOT NULL,
  `transaction_country` varchar(255) NOT NULL,
  `transaction_state` varchar(255) NOT NULL,
  `transaction_city` varchar(255) NOT NULL,
  `transaction_postcode` varchar(50) NOT NULL,
  `transaction_phone` varchar(20) NOT NULL,
  `transaction_sub_total` decimal(10,2) NOT NULL,
  `transaction_tax` decimal(10,2) NOT NULL,
  `transaction_delivery` double(10,2) NOT NULL,
  `transaction_grand_total` decimal(10,2) NOT NULL,
  `transaction_description` text NOT NULL,
  `transaction_order_note` text NOT NULL,
  `transaction_intent` varchar(200) DEFAULT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transaction_txn_date` datetime NOT NULL DEFAULT current_timestamp(),
  `transaction_shipped_product_date` datetime DEFAULT NULL,
  `transaction_status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_transaction`
--

INSERT INTO `garypie_transaction` (`id`, `transaction_id`, `transaction_cart_id`, `transaction_user_id`, `transaction_full_name`, `transaction_email`, `transaction_street`, `transaction_street2`, `transaction_company`, `transaction_country`, `transaction_state`, `transaction_city`, `transaction_postcode`, `transaction_phone`, `transaction_sub_total`, `transaction_tax`, `transaction_delivery`, `transaction_grand_total`, `transaction_description`, `transaction_order_note`, `transaction_intent`, `transaction_type`, `transaction_txn_date`, `transaction_shipped_product_date`, `transaction_status`) VALUES
(1, 'cd1427a7-660a-4488-802f-c2cf09836977', '785410e8-2956-44a8-96a0-9267fc924e38', '0', 'abigirl asare', 'tjhackx111@gmail.com', 'af-222-1', '', '', 'United States', 'ashanti', 'kumasi', '00220', '0233333', 37.20, 0.74, 0.00, 37.94, '3 items from Garypie.', '', 'Paid', '', '2024-06-25 19:13:28', NULL, 0),
(2, 'a3f05020-446c-4382-a7ac-76acae341226', 'd0145000-29dd-4985-a973-bd19745ea028', '96dc61d5-cade-4776-b126-fe08050535ce', 'tijani moro', 'tjhackx111@gmail.com', 'af-0006-0091', '', '', 'Ghana', 'ashanti', 'Kumasi', '00233', '4242', 12.00, 0.24, 0.00, 12.24, '1 item from Garypie.', '', 'Paid', '', '2024-05-26 03:46:47', '2024-06-26 02:03:46', 1),
(3, '07ce9613-9f0b-4677-b9b0-5f44286f260a', '5fb1611c-e859-4c42-a867-e03e496a2f76', '96dc61d5-cade-4776-b126-fe08050535ce', 'tijani moro', 'tjhackx111@gmail.com', 'af-0006-0091', '', '', 'Ghana', 'ashanti', 'Kumasi', '00233', '4242', 21.99, 0.44, 0.00, 22.43, '2 items from Garypie.', '', 'Paid', '', '2024-06-26 03:49:52', NULL, 0),
(4, '0b458471-6392-48c9-a9b7-ae416da5114a', 'cc346ab3-0f34-43d0-bae1-61fdf9224596', '96dc61d5-cade-4776-b126-fe08050535ce', 'tijani moro', 'tjhackx111@gmail.com', 'af-0006-0091', '', '', 'Ghana', 'ashanti', 'Kumasi', '00233', '4242', 19.98, 0.40, 0.00, 20.38, '2 items from Garypie.', '', 'Paid', '', '2024-06-26 04:10:46', NULL, 0),
(5, 'e59c05d6-35b0-48b3-8a72-ff8bfe138073', 'c9894ec6-070d-4169-ad7c-99023b06c034', '96dc61d5-cade-4776-b126-fe08050535ce', 'tijani moro', 'tjhackx111@gmail.com', 'af-0006-0091', '', '', 'Ghana', 'ashanti', 'Kumasi', '00233', '4242', 43.99, 0.88, 0.00, 44.87, '2 items from Garypie.', '', 'Paid', '', '2024-07-26 04:13:00', '2024-07-04 04:03:17', 1),
(6, '15b4f61c-3b3f-4e32-b44b-1cd61841bbd6', '0d1fd3b6-e0ef-472c-b0e8-3985b04407ae', '0', 'abigirl asare', 'tjhackx111@gmail.com', 'af-222-1', '', '', 'United States', 'ashanti', 'kumasi', '00220', '0233333', 12.00, 0.24, 0.00, 12.24, '1 item from Garypie.', '', 'Paid', '', '2024-06-26 11:04:05', NULL, 0),
(7, '151d9fd9-aa7c-42e2-9293-69c19faa09a0', 'd8fcb7a5-6944-4c02-ae10-b3b56101b84a', '96dc61d5-cade-4776-b126-fe08050535ce', 'tijani moro', 'tjhackx111@gmail.com', 'af-0006-0091', '', '', 'Ghana', 'ashanti', 'Kumasi', '00233', '4242', 39.96, 0.80, 0.00, 40.76, '4 items from Garypie.', '', 'Paid', '', '2024-06-26 13:30:19', NULL, 0),
(8, 'a9b658ae-3fdd-49c8-a51f-45ceb7d397b1', 'b43847cf-e128-4927-93a3-97926524705b', '0', 'abigirl asare', 'tjhackx111@gmail.com', 'af-222-1', '', '', 'United States', 'ashanti', 'kumasi', '00220', '0233333', 19.98, 0.40, 0.00, 20.38, '2 items from Garypie.', '', 'Paid', '', '2024-06-26 14:10:27', NULL, 0),
(9, '8228a3cf-9c20-4c0b-8c06-8ddf122677b5', 'fcccb8e4-831a-40aa-8f0c-27db4d713570', '0', 'abigirl asare', 'tjhackx111@gmail.com', 'af-222-1', '', '', 'United States', 'ashanti', 'kumasi', '00220', '0233333', 59.94, 1.20, 0.00, 61.14, '6 items from Garypie.', 'all good', 'Paid', '', '2024-06-29 07:19:28', NULL, 1),
(10, '439a70d5-05b0-4d42-881a-3151153bbef6', '88a73adc-597b-4e27-ba41-d2d66d122415', '96dc61d5-cade-4776-b126-fe08050535ce', 'tijani moro', 'tjhackx111@gmail.com', 'af-0006-0091', '', '', 'Ghana', 'ashanti', 'Kumasi', '00233', '0244512130', 34.00, 0.68, 0.00, 34.68, '1 item from Garypie.', '', 'Paid', '', '2024-06-29 07:40:58', NULL, 0),
(11, 'e0d95077-f3f1-493d-9cc0-bbf062b59147', '2ceaf45d-e1ce-45b3-8cbd-75c39e38b338', '182a7193-fc47-401e-a106-1e4f90361a9f', 'tijani', 'tjhackx111@gmail.com', 'Af-000-1111', '', '', 'Ghana', 'Ashanti', 'Suame', '0233', '0244512130', 1465.98, 29.32, 0.00, 1495.30, '2 items from Garypie.', '', 'Paid', '', '2024-07-04 15:21:35', NULL, 0),
(12, 'ad56e91b-03af-4e30-b265-46ee3f70064c', 'f44c018a-e71f-4eca-abf5-e7c3b9785c45', '182a7193-fc47-401e-a106-1e4f90361a9f', 'tijani', 'tjhackx111@gmail.com', 'Af-000-1111', '', '', 'Ghana', 'Ashanti', 'Suame', '0233', '0244512130', 1122.97, 22.46, 0.00, 1145.43, '3 items from Garypie.', '', 'Paid', '', '2024-07-04 15:28:11', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `garypie_user`
--

CREATE TABLE `garypie_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(300) DEFAULT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(200) NOT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `user_state` varchar(225) DEFAULT NULL,
  `user_city` varchar(225) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_address2` varchar(255) NOT NULL,
  `user_postcode` varchar(50) NOT NULL,
  `user_company` varchar(255) NOT NULL,
  `user_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_vericode` varchar(50) NOT NULL,
  `user_joined_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_last_login` datetime DEFAULT NULL,
  `user_trash` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garypie_user`
--

INSERT INTO `garypie_user` (`id`, `user_id`, `user_fullname`, `user_email`, `user_phone`, `user_password`, `user_gender`, `user_country`, `user_state`, `user_city`, `user_address`, `user_address2`, `user_postcode`, `user_company`, `user_verified`, `user_vericode`, `user_joined_date`, `user_last_login`, `user_trash`) VALUES
(4, '2b5c1bd5-3e2a-4e6a-b9de-910695014618', 'abigirl asare', 'tijanimoro@yahoo.com', NULL, '$2y$10$kGwusAg1CFnfZtBpKNoKE.k94Z3YkGcLMToffglhnRmE49fbHI09S', '', NULL, NULL, NULL, NULL, '', '', '', 1, '0934e04483188fb8a5ef0c4036f8ba2d', '2024-06-29 09:32:23', NULL, 0),
(6, '88ea9d88-207c-401a-bae8-76153f40afe8', 'gorgina afriyie', 'tijanimoro0684@outlook.com', NULL, '$2y$10$yz9c0XhO8HHxRMifmtLTweCh6iZUdf/eHPLu.JDVHT5bpxaC1kSr6', '', NULL, NULL, NULL, NULL, '', '', '', 1, '3b228f3c522a8ca095d907890d4a6887', '2024-06-29 09:54:14', NULL, 0),
(7, '182a7193-fc47-401e-a106-1e4f90361a9f', 'tijani', 'tjhackx111@gmail.com', NULL, '$2y$10$ikZZDgf0YC0bYuZhaOWEmOoGSjTVAHdsReCuREebOOK8Y/f.AUIUq', '', NULL, NULL, NULL, NULL, '', '', '', 1, '1e7336b36d2204a7511f75911b1f4b87', '2024-07-04 15:08:22', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `garypie_user_password_resets`
--

CREATE TABLE `garypie_user_password_resets` (
  `password_reset_id` int(11) NOT NULL,
  `password_reset_created_at` datetime DEFAULT NULL,
  `password_reset_user_id` int(11) NOT NULL,
  `password_reset_verify` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `garypie_about`
--
ALTER TABLE `garypie_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `garypie_admin`
--
ALTER TABLE `garypie_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `garypie_brand`
--
ALTER TABLE `garypie_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `brand_name` (`brand_name`),
  ADD KEY `brand_added_date` (`brand_added_date`);

--
-- Indexes for table `garypie_cart`
--
ALTER TABLE `garypie_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`items`(768)),
  ADD KEY `expire_date` (`expire_date`) USING BTREE,
  ADD KEY `paid` (`paid`) USING BTREE,
  ADD KEY `order_number` (`order_number`);

--
-- Indexes for table `garypie_category`
--
ALTER TABLE `garypie_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_name` (`category`),
  ADD KEY `category_added_date` (`category_added_date`),
  ADD KEY `category_url` (`category_url`(768));

--
-- Indexes for table `garypie_collection`
--
ALTER TABLE `garypie_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garypie_contact`
--
ALTER TABLE `garypie_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_firstname` (`contact_firstname`),
  ADD KEY `contact_email` (`contact_email`),
  ADD KEY `contact_subject` (`contact_subject`),
  ADD KEY `contact_date` (`createdAt`);

--
-- Indexes for table `garypie_faq`
--
ALTER TABLE `garypie_faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faq_heading` (`faq_heading`);

--
-- Indexes for table `garypie_faq_details`
--
ALTER TABLE `garypie_faq_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garypie_product`
--
ALTER TABLE `garypie_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_name` (`product_name`),
  ADD KEY `product_category` (`product_category`),
  ADD KEY `product_price` (`product_price`),
  ADD KEY `product_added_date` (`product_added_date`),
  ADD KEY `product_added_by` (`product_added_by`),
  ADD KEY `product_list_price` (`product_list_price`),
  ADD KEY `product_url` (`product_url`(768)),
  ADD KEY `product_brand` (`product_brand`);

--
-- Indexes for table `garypie_subscription`
--
ALTER TABLE `garypie_subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `garypie_transaction`
--
ALTER TABLE `garypie_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_user_id` (`transaction_user_id`),
  ADD KEY `transaction_status` (`transaction_status`);

--
-- Indexes for table `garypie_user`
--
ALTER TABLE `garypie_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD KEY `user_country` (`user_country`),
  ADD KEY `user_state` (`user_state`),
  ADD KEY `user_trash` (`user_trash`),
  ADD KEY `user_fullname` (`user_fullname`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `user_postcode` (`user_postcode`),
  ADD KEY `user_company` (`user_company`),
  ADD KEY `user_city` (`user_city`) USING BTREE,
  ADD KEY `user_gender` (`user_gender`);

--
-- Indexes for table `garypie_user_password_resets`
--
ALTER TABLE `garypie_user_password_resets`
  ADD PRIMARY KEY (`password_reset_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `garypie_about`
--
ALTER TABLE `garypie_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `garypie_admin`
--
ALTER TABLE `garypie_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `garypie_brand`
--
ALTER TABLE `garypie_brand`
  MODIFY `brand_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `garypie_cart`
--
ALTER TABLE `garypie_cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `garypie_category`
--
ALTER TABLE `garypie_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `garypie_collection`
--
ALTER TABLE `garypie_collection`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `garypie_contact`
--
ALTER TABLE `garypie_contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `garypie_faq`
--
ALTER TABLE `garypie_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `garypie_faq_details`
--
ALTER TABLE `garypie_faq_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `garypie_product`
--
ALTER TABLE `garypie_product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `garypie_subscription`
--
ALTER TABLE `garypie_subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `garypie_transaction`
--
ALTER TABLE `garypie_transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `garypie_user`
--
ALTER TABLE `garypie_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `garypie_user_password_resets`
--
ALTER TABLE `garypie_user_password_resets`
  MODIFY `password_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `gmsa`
--
CREATE DATABASE IF NOT EXISTS `gmsa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gmsa`;

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_about`
--

CREATE TABLE `gmsa_about` (
  `about_id` int(11) NOT NULL,
  `about_info` text NOT NULL,
  `about_street1` varchar(250) NOT NULL,
  `about_street2` varchar(250) NOT NULL,
  `about_country` varchar(250) NOT NULL,
  `about_state` varchar(250) NOT NULL,
  `about_city` varchar(250) NOT NULL,
  `about_phone` varchar(20) NOT NULL,
  `about_email` varchar(250) NOT NULL,
  `about_phone2` varchar(20) NOT NULL,
  `about_fax` varchar(50) NOT NULL,
  `dues_for_fresher` double(10,2) NOT NULL,
  `dues_for_continue` double(10,2) NOT NULL,
  `ads` text DEFAULT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `instagram` varchar(500) DEFAULT NULL,
  `youtube` varchar(500) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `linkedin` varchar(500) DEFAULT NULL,
  `signature` text NOT NULL,
  `mission` varchar(500) NOT NULL,
  `vision` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_about`
--

INSERT INTO `gmsa_about` (`about_id`, `about_info`, `about_street1`, `about_street2`, `about_country`, `about_state`, `about_city`, `about_phone`, `about_email`, `about_phone2`, `about_fax`, `dues_for_fresher`, `dues_for_continue`, `ads`, `facebook`, `instagram`, `youtube`, `twitter`, `linkedin`, `signature`, `mission`, `vision`) VALUES
(1, '<p><strong>gmsa </strong>Lorem moro dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <em>cupidatat</em> non proident,</p>\r\n<p><span style=\"background-color: #236fa1;\"> sunt</span> in culpa qui officia deserunt mollit anim id est laborum. tijani Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <strong>ullamco </strong>laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. wsf</p>', 'AF-0006-0091', 'FL 32904', 'ghana', 'upper east', 'navrongo', '+233 541 444 016', 'info@gmsacktutas.org', '+233 24 387 4525', '+1 234 567 89', 50.00, 40.00, 'assets/media/ads/519.jpeg', 'https://www.facebook.com/gmsacktutas', 'https://instagram.com/gmsa', 'https://www.youtube.com/@gmsackt-utasofficial', 'https://x.com/cktgmsa?s=21', 'https://linkedin.com/gmsa', 'assets/media/signature/632.png', 'mission mission', 'vision vision');

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_activities`
--

CREATE TABLE `gmsa_activities` (
  `id` bigint(20) NOT NULL,
  `activity_id` varchar(300) DEFAULT NULL,
  `activity` varchar(500) DEFAULT NULL,
  `activity_details` text DEFAULT NULL,
  `activity_venue` varchar(300) DEFAULT NULL,
  `activity_created_by` varchar(300) DEFAULT NULL,
  `activity_updated_by` varchar(300) DEFAULT NULL,
  `activity_date` date DEFAULT NULL,
  `activity_time` time NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_activities`
--

INSERT INTO `gmsa_activities` (`id`, `activity_id`, `activity`, `activity_details`, `activity_venue`, `activity_created_by`, `activity_updated_by`, `activity_date`, `activity_time`, `createdAt`, `updatedAt`, `status`) VALUES
(2, '3c43b406-0f4a-4b03-8283-d0fd29cbfaa4', 'foot ball', 'more fire', 'navasco', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-12-31', '19:18:00', '2024-07-17 18:29:04', '2024-07-17 19:18:24', 0),
(3, '20efd7c7-477d-44a4-8935-c275c63b3b48', 'sweeping', '', 'nha1', '9a4433b5-0bbb-489b-8f05-c858b3033e32', NULL, '2024-07-17', '19:17:00', '2024-07-17 19:17:29', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_admin`
--

CREATE TABLE `gmsa_admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(300) DEFAULT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_email` varchar(175) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_profile` text DEFAULT NULL,
  `admin_joined_date` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_last_login` datetime DEFAULT NULL,
  `admin_permissions` varchar(255) NOT NULL,
  `admin_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_admin`
--

INSERT INTO `gmsa_admin` (`id`, `admin_id`, `admin_fullname`, `admin_email`, `admin_password`, `admin_profile`, `admin_joined_date`, `admin_last_login`, `admin_permissions`, `admin_status`) VALUES
(1, '9a4433b5-0bbb-489b-8f05-c858b3033e32', 'alhaji priest babson', 'admin@gmsa.org', '$2y$10$YYSL/ggT3Ms/5r6s.EQRLeMXbqJmdV.rWAx75e5WpD/BB1gyA65Yu', 'assets/media/profiles/a8297d9e2be86f0f60c419c3f02a2447.jpg', '2020-02-21 21:01:31', '2024-07-17 18:03:23', 'admin,editor', 0),
(10, '0b760213-c37c-4f48-a3b3-71f3b444cbf5', 'ibrahim', 'ibrahim@gmsa.org', '$2y$10$7jeVH4AIvtfyXf5UMWvWjOXyPdIKKj4iZSsIbcht3mlqolPOZdAKW', NULL, '2024-07-21 18:08:09', NULL, 'editor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_categories`
--

CREATE TABLE `gmsa_categories` (
  `id` bigint(20) NOT NULL,
  `category_id` varchar(300) DEFAULT NULL,
  `category` varchar(300) DEFAULT NULL,
  `category_url` text DEFAULT NULL,
  `category_image` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_categories`
--

INSERT INTO `gmsa_categories` (`id`, `category_id`, `category`, `category_url`, `category_image`, `createdAt`, `updatedAt`, `status`) VALUES
(2, '2a441d04-e52b-463d-8ebf-7c086b74986a', 'masjid', 'masjid', '', '2024-07-17 07:33:35', NULL, 0),
(3, 'ec3cb14f-9c3d-47f7-be01-235cddbcfa69', 'friday announcement', 'friday-announcement', '', '2024-07-17 07:42:14', NULL, 0),
(4, 'cf623275-ea15-44af-9153-1a77ba6800fb', 'technology', 'technology', '', '2024-07-17 15:54:38', NULL, 0),
(5, 'c7ac15ef-3b16-41a8-9677-6d188b398cfa', 'madarasa', 'madarasa', '', '2024-07-17 15:54:46', NULL, 0),
(6, 'aa69c062-21ca-40ff-af1a-b73ae0be9e0f', 'design', 'design', '', '2024-07-17 15:54:56', NULL, 0),
(7, '9a12069f-67c5-444f-b788-4de1d045159d', 'marketing', 'marketing', '', '2024-07-17 15:55:02', NULL, 0),
(8, 'b4d76965-558f-4097-ba79-7d3e88bf2ab8', 'research', 'research', '', '2024-07-17 15:55:09', NULL, 0),
(9, '2bab7adc-b5ef-446c-93d1-8680204e010a', 'fasting', 'fasting', '', '2024-07-19 08:09:23', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_contacts`
--

CREATE TABLE `gmsa_contacts` (
  `id` bigint(11) NOT NULL,
  `message_id` varchar(300) NOT NULL,
  `message_name` varchar(300) NOT NULL,
  `message_email` varchar(300) NOT NULL,
  `message_phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updateAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_contacts`
--

INSERT INTO `gmsa_contacts` (`id`, `message_id`, `message_name`, `message_email`, `message_phone`, `message`, `createdAt`, `updateAt`, `status`) VALUES
(1, '87aa69c1-58cf-4671-9e62-9b90fc33146c', 'Tijani Moro', 'tjhackx111@gmail.com', '', 'sdcsd', '2024-07-14 18:22:48', NULL, 0),
(3, 'acb36be7-5ff7-4c9e-9e18-f861491c9ecd', 'Tijani Moro', 'moro@moro.com', '', 'wdqwdqw', '2024-07-14 18:23:40', NULL, 0),
(5, '45d84d06-e4b0-4f29-9b39-f4d2cd790755', 'Tijani Moro', 'moro@moro.com', '', 'wdqwdqw', '2024-07-14 18:23:51', NULL, 0),
(6, '11089b1f-fe7a-4419-a239-b7484f1e4445', 'Tijani Moro', 'moro@moro.com', '', 'wdqwdqw', '2024-07-14 18:23:54', NULL, 0),
(9, '453e8ada-799e-4c08-a276-0fe1ba16187a', 'Tijani Moro', 'moro@moro.com', '0233333', 'hi', '2024-07-21 11:22:57', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_donations`
--

CREATE TABLE `gmsa_donations` (
  `id` bigint(20) NOT NULL,
  `donation_id` varchar(300) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double(10,2) NOT NULL,
  `reference` varchar(300) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_donations`
--

INSERT INTO `gmsa_donations` (`id`, `donation_id`, `name`, `email`, `phone`, `amount`, `reference`, `createdAt`, `updatedAt`, `status`) VALUES
(1, '7f39d3e8-5200-4f8b-b0c3-0c3e3154fb6e', '', 'anony_1721515219@gmsadonation.org', '', 12.00, 'GMSA-DNT739121605', '2024-07-20 22:42:56', NULL, 0),
(2, 'ddc0fc02-cf4a-4f54-bc45-79604952c6b3', '', 'anony_1721561078@gmsadonation.org', '', 50.00, 'GMSA-DNT365787853', '2024-07-21 11:25:39', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_dues`
--

CREATE TABLE `gmsa_dues` (
  `id` bigint(20) NOT NULL,
  `dues_id` varchar(300) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `transaction_reference` varchar(300) NOT NULL,
  `transaction_intent` enum('attempt','paid') NOT NULL,
  `transaction_amount` double(10,2) NOT NULL,
  `level` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_dues`
--

INSERT INTO `gmsa_dues` (`id`, `dues_id`, `student_id`, `transaction_reference`, `transaction_intent`, `transaction_amount`, `level`, `createdAt`, `updatedAt`, `status`) VALUES
(1, 'f9d8b26f-5973-456c-b87f-e70440141ca1', '232', 'GMSA630591104', 'attempt', 10.00, '200', '2024-07-18 01:47:45', NULL, 0),
(2, 'aa4bbb4e-71c0-4403-abf9-9f0d4a5646a4', '232', 'GMSA9708912', 'attempt', 30.00, '200', '2024-07-18 01:54:14', NULL, 0),
(3, '5e09cd48-a380-471d-be5e-e5bcaef5147c', '232', 'GMSA579748731', 'attempt', 20.00, '300', '2024-07-18 02:24:34', '2024-07-18 12:57:39', 0),
(4, 'c5d433e0-d10d-41ad-82da-685fb7072d36', '232', 'GMSA107752984', 'attempt', 15.00, '300', '2024-07-18 08:07:15', '2024-07-18 12:57:41', 0),
(5, 'cbb93b56-972b-4457-bccc-e031619455c0', '202104042111', 'GMSA54481066', 'attempt', 10.00, '100', '2024-07-19 18:21:29', NULL, 0),
(6, '1777373f-f2be-477d-b5e9-11d8904bac65', '202104042111', 'GMSA396177898', 'attempt', 4.00, '100', '2024-07-20 21:47:39', NULL, 0),
(7, '99fb834b-d939-4777-b130-ec4140d8a404', 'dfms/122/11', 'GMSA66274161', 'attempt', 5.00, '100', '2024-07-22 08:38:19', NULL, 0),
(8, '94cac8ae-4455-4f7f-b887-6adf80d9c4e9', 'dfms/122/11', 'GMSA380213187', 'attempt', 15.00, '100', '2024-07-22 08:38:52', NULL, 0),
(9, 'a573c54f-836e-4072-a0d8-e2e1b02db59e', 'dfms/122/11', 'GMSA520507517', 'attempt', 20.00, '100', '2024-07-22 08:39:19', NULL, 0),
(10, '692a4daa-b1f1-42af-9a6b-98c84fa05a37', 'dfms/122/11', 'GMSA89530686', 'attempt', 10.00, '100', '2024-07-22 08:39:43', NULL, 0),
(11, '68ce6fd4-38a5-44dd-b8e0-3674878b8a39', 'dfms/122/11', 'GMSA284422770', 'attempt', 20.00, '200', '2024-07-22 08:40:15', NULL, 0),
(12, '52ed63a9-877d-4483-8550-252e2b0fd63f', 'dfms/122/11', 'GMSA457265733', 'attempt', 20.00, '200', '2024-07-22 08:40:38', NULL, 0),
(13, '9aede1e3-5af3-4799-bfd1-63347660af0a', 'dfms/122/11', 'GMSA972594623', 'attempt', 40.00, '300', '2024-07-22 08:41:01', NULL, 0),
(14, '15b2c889-f171-4e16-9f3f-fb649237b456', 'dfms/122/11', 'GMSA363348849', 'attempt', 30.00, '400', '2024-07-22 08:41:32', NULL, 0),
(15, '0ca7584f-e0e0-4cd2-845a-f2fdbf5472eb', 'dfms/122/11', 'GMSA603611033', 'attempt', 10.00, '400', '2024-07-22 08:42:03', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_executives`
--

CREATE TABLE `gmsa_executives` (
  `id` int(11) NOT NULL,
  `executive_id` varchar(300) DEFAULT NULL,
  `member_id` varchar(300) DEFAULT NULL,
  `position_id` varchar(300) DEFAULT NULL,
  `year_from` year(4) DEFAULT NULL,
  `year_to` year(4) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_executives`
--

INSERT INTO `gmsa_executives` (`id`, `executive_id`, `member_id`, `position_id`, `year_from`, `year_to`, `createdAt`, `updatedAt`, `status`) VALUES
(4, '7b6976ab-1980-4ef7-8478-c67ea11093fe', '914bf868-74b4-4641-b7e3-80751f94ae7a', '922d790e-0cb9-4d3a-8d4b-980a66a32435', '2015', '2025', '2024-07-20 17:01:33', NULL, 0),
(5, 'e264345d-f9a5-43c8-8320-af411c965c69', '553861ad-ad13-4ef9-a7e8-7a3cd184df38', '79145dfa-f46c-4f05-b34e-e99077456769', '2024', '2025', '2024-07-21 23:35:59', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_faq`
--

CREATE TABLE `gmsa_faq` (
  `id` int(11) NOT NULL,
  `faq_heading` varchar(300) NOT NULL,
  `faq_added_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_faq`
--

INSERT INTO `gmsa_faq` (`id`, `faq_heading`, `faq_added_date`) VALUES
(1, 'price', '2023-04-12'),
(2, 'cos', '2023-04-12'),
(3, 'Shipping', '2024-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_faq_details`
--

CREATE TABLE `gmsa_faq_details` (
  `id` bigint(20) NOT NULL,
  `faq_parent` int(11) NOT NULL,
  `faq_question` varchar(500) NOT NULL,
  `faq_answer` text NOT NULL,
  `faq_added_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_faq_details`
--

INSERT INTO `gmsa_faq_details` (`id`, `faq_parent`, `faq_question`, `faq_answer`, `faq_added_date`) VALUES
(1, 1, 'how much', 'nndss', '2023-04-12 05:32:13'),
(2, 2, 'dfsd', 'sdsvsdvsdvs', '2023-04-12 05:33:19'),
(4, 3, 'how to ship', 'provide your address', '2024-06-24 15:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_gallery`
--

CREATE TABLE `gmsa_gallery` (
  `id` bigint(20) NOT NULL,
  `gallery_media` text DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_gallery`
--

INSERT INTO `gmsa_gallery` (`id`, `gallery_media`, `createdAt`, `updatedAt`, `status`) VALUES
(1, 'assets/media/gallery/6695970e9144d.png', '2024-07-15 21:39:26', NULL, 0),
(6, 'assets/media/gallery/6699bddd0b6ed.jpg', '2024-07-19 01:14:05', NULL, 0),
(7, 'assets/media/gallery/6699bde1dc188.jpg', '2024-07-19 01:14:09', NULL, 0),
(8, 'assets/media/gallery/6699bde69ad19.png', '2024-07-19 01:14:14', NULL, 0),
(9, 'assets/media/gallery/6699c200764a1.jpeg', '2024-07-19 01:31:44', NULL, 0),
(10, 'assets/media/gallery/6699c2007702e.png', '2024-07-19 01:31:44', NULL, 0),
(12, 'assets/media/gallery/669bb54bc3891.png', '2024-07-20 13:02:03', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_members`
--

CREATE TABLE `gmsa_members` (
  `id` int(11) NOT NULL,
  `member_id` varchar(300) DEFAULT NULL,
  `member_firstname` varchar(300) DEFAULT NULL,
  `member_middlename` varchar(300) DEFAULT NULL,
  `member_lastname` varchar(300) DEFAULT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_phone` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `member_gender` varchar(10) DEFAULT NULL,
  `member_dob` date DEFAULT NULL,
  `member_region` varchar(225) DEFAULT NULL,
  `member_city` varchar(255) DEFAULT NULL,
  `member_digitaladdress` varchar(100) DEFAULT NULL,
  `member_studentid` varchar(50) DEFAULT NULL,
  `member_programme` varchar(300) DEFAULT NULL,
  `member_department` varchar(300) DEFAULT NULL,
  `member_admissiontype` varchar(100) DEFAULT NULL,
  `member_admissionyear` int(11) DEFAULT NULL,
  `member_hostel` varchar(300) DEFAULT NULL,
  `member_level` int(11) DEFAULT NULL,
  `member_guardianfullname` varchar(300) DEFAULT NULL,
  `member_guardianphonenumber` varchar(50) DEFAULT NULL,
  `member_picture` text DEFAULT NULL,
  `member_verified` tinyint(1) NOT NULL DEFAULT 0,
  `member_vericode` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_members`
--

INSERT INTO `gmsa_members` (`id`, `member_id`, `member_firstname`, `member_middlename`, `member_lastname`, `member_email`, `member_phone`, `user_password`, `member_gender`, `member_dob`, `member_region`, `member_city`, `member_digitaladdress`, `member_studentid`, `member_programme`, `member_department`, `member_admissiontype`, `member_admissionyear`, `member_hostel`, `member_level`, `member_guardianfullname`, `member_guardianphonenumber`, `member_picture`, `member_verified`, `member_vericode`, `createdAt`, `updatedAt`, `status`) VALUES
(1, '914bf868-74b4-4641-b7e3-80751f94ae7a', 'Tijani', '', 'Moro', 'info.garypie@gmail.com', '0233333', '', 'Female', '2024-07-02', '', 'ksi', '', '232', 'qwwe', 'qw', 'Diploma', 0, NULL, 200, 'Tijani Moro', 'wedwe', 'assets/media/members/0736cb842f23a40a046c2c82d7fd7a9b.jpg', 0, '2150b41a1cac86b6b5fc71b57f05388a', '2024-07-14 17:18:46', NULL, 0),
(2, '553861ad-ad13-4ef9-a7e8-7a3cd184df38', 'ibrahim', '', 'dramani', 'ibrahim@email.com', '024444444', '', 'Male', '2024-07-19', 'ashanti', 'kumasi', '', '202104042111', 'cs', 'cs', 'Undergraduate', 2020, '', 100, 'Tijani Moro', '02444444', 'assets/media/members/7c77462805f8b2d5019cd3e931ded110.jpg', 0, 'ef92274e218afc6aa140cd215a242046', '2024-07-19 18:18:19', NULL, 0),
(3, 'e5b96834-9847-4906-a474-fea25f932aad', 'kadr', '', 'alhassan', 'kd@email.com', '0222', '', 'Male', '2024-12-31', '', '', '', '212121', 'cybers', 'cs', 'Diploma', 2020, NULL, 200, 'baba shehu', '02444444', NULL, 0, 'fc99f3c8cc20103fc80670ce737afd9b', '2024-07-20 23:06:04', NULL, 1),
(7, '404e9270-5432-49a6-a5e0-ae93d1bc1647', 'rauf', '', 'alhassan', 'kdi@email.com', '0222', '', 'Female', '2024-12-31', '', '', '', '21222', 'cybers', 'cs', 'Undergraduate', 2020, 'dollar', 200, 'baba shehu', '02444444', 'assets/media/members/d0cfe7b0bc26d7c21bb8dc98db3d0a43.png', 0, '7472188e7ddb3d43d87d0f1eaf49c95e', '2024-07-20 23:19:20', NULL, 0),
(8, '62f575c0-c5f3-4284-9fc6-dfccaffd9e0f', 'sheu', '', 'short', 'short@email.com', '0233333', '', 'Female', '2024-12-31', '', '', '', 'dfms/122/11', 'qwwe', 'cs', 'Diploma', 2020, 'dollar', 100, 'Tijani Moro', '02444444', NULL, 0, '9d222e8f34be1ccc4e888d93f6472bd0', '2024-07-22 08:33:39', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_news`
--

CREATE TABLE `gmsa_news` (
  `id` bigint(20) NOT NULL,
  `news_id` varchar(300) DEFAULT NULL,
  `news_title` varchar(500) DEFAULT NULL,
  `news_url` varchar(600) DEFAULT NULL,
  `news_content` text DEFAULT NULL,
  `news_media` text DEFAULT NULL,
  `news_category` varchar(300) DEFAULT NULL,
  `news_views` int(11) NOT NULL DEFAULT 0,
  `news_featured` tinyint(4) NOT NULL DEFAULT 0,
  `news_created_by` varchar(300) DEFAULT NULL,
  `news_updated_by` varchar(300) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_news`
--

INSERT INTO `gmsa_news` (`id`, `news_id`, `news_title`, `news_url`, `news_content`, `news_media`, `news_category`, `news_views`, `news_featured`, `news_created_by`, `news_updated_by`, `createdAt`, `updatedAt`, `status`) VALUES
(1, 'b1abdaf9-5260-4e7e-a373-e95fbe97cdb0', 'rainfall is coming', 'rainfall-is-coming', '<p>we good</p>', 'assets/media/news/f7bab78704d30321e3c7881b778bd121.jpg', '2a441d04-e52b-463d-8ebf-7c086b74986a', 1, 1, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '1', '2024-07-17 08:45:18', '2024-07-19 00:33:20', 0),
(2, 'c4d054ec-369e-471b-bfdd-c5b8e1062ed4', 'rainfall is coming', 'rainfall-is-coming', '<p>we dddd</p>', 'assets/media/news/5f1b62a4db2d2115f3a19f248b297def.jpg', 'ec3cb14f-9c3d-47f7-be01-235cddbcfa69', 1, 1, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '1', '2024-07-17 08:45:51', '2024-07-19 00:33:20', 1),
(3, 'f8de02bb-24c2-4741-901d-0ed0c7484223', 'tomor madarasa', 'tomor-madarasa', '<p>come and le</p>', 'assets/media/news/2df5b106e354d4e97d57d090dbd2407f.jpg', '2a441d04-e52b-463d-8ebf-7c086b74986a', 36, 0, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '1', '2024-07-17 09:06:40', '2024-07-21 08:56:09', 0),
(4, 'ef0b0ff0-5a19-4468-944a-3eb27d5eead8', 'we don die moro', 'we-don-die-moro', '<p>hello there</p>', 'assets/media/news/ec5664bbe4ceec0283a449d55c4459f1.jpg', 'c7ac15ef-3b16-41a8-9677-6d188b398cfa', 18, 0, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-17 15:57:02', '2024-07-21 21:50:05', 0),
(5, '769c9087-ac3c-49ea-a65a-7bd7876f49f6', 'soccer competition', 'soccer-competition', '<p>we gone play ball die</p>', 'assets/media/news/495305d82c5319851aef979f92790473.png', '9a12069f-67c5-444f-b788-4de1d045159d', 5, 0, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '', '2024-07-18 16:54:59', '2024-07-21 21:50:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_positions`
--

CREATE TABLE `gmsa_positions` (
  `id` int(11) NOT NULL,
  `position_id` varchar(300) NOT NULL,
  `position` varchar(300) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_positions`
--

INSERT INTO `gmsa_positions` (`id`, `position_id`, `position`, `createdAt`, `updatedAt`, `status`) VALUES
(2, '922d790e-0cb9-4d3a-8d4b-980a66a32435', 'president', '2024-07-20 00:34:37', '2024-07-20 00:41:26', 0),
(3, 'c30a606a-4131-4d96-906b-93d2e1392ae0', 'treasurer', '2024-07-20 00:41:18', NULL, 0),
(4, '79145dfa-f46c-4f05-b34e-e99077456769', 'veep', '2024-07-20 00:41:33', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_prayer_time`
--

CREATE TABLE `gmsa_prayer_time` (
  `id` bigint(20) NOT NULL,
  `prayer_id` varchar(300) DEFAULT NULL,
  `prayer_name` varchar(200) DEFAULT NULL,
  `prayer_time` time DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_prayer_time`
--

INSERT INTO `gmsa_prayer_time` (`id`, `prayer_id`, `prayer_name`, `prayer_time`, `createdAt`, `updatedAt`, `status`) VALUES
(1, '7cef1c69-2290-4ad9-81d4-8a4bc4aec72a', 'fajr', '04:45:00', '2024-07-15 15:16:49', '2024-07-15 16:06:35', 0),
(2, '04f9a00f-a5bd-4858-a140-2262192c5cbf', 'shuruq', '12:45:00', '2024-07-15 15:17:01', '2024-07-19 17:36:54', 0),
(3, '0caddc2b-92c9-47f6-b3e3-396ea0746ff1', 'zuhr', '15:30:00', '2024-07-15 15:17:17', '2024-07-19 17:36:58', 0),
(4, '7972cfe5-c6c3-40b6-8885-c3d9d7c91c2b', 'asr', '18:20:00', '2024-07-15 15:17:27', '2024-07-19 17:37:03', 0),
(5, '336521c6-14c7-4b20-8383-caaa0b4cab95', 'maghrib', '19:40:00', '2024-07-15 15:17:40', '2024-07-19 17:37:09', 0),
(6, '84fbcb91-c29c-4615-8659-095e03fd23cb', 'isha', '13:10:00', '2024-07-15 15:18:45', '2024-07-19 17:37:18', 0),
(7, 'f7b46dca-6072-4cde-8eed-e83424777c12', 'jummuah', '03:00:00', '2024-07-15 15:18:54', '2024-07-19 17:37:22', 0),
(8, '4277476e-133d-428b-83b9-36167447347c', 'suhur', '00:00:00', '2024-07-15 15:19:07', '2024-07-19 17:37:28', 0),
(9, '831c675d-ec18-4554-80d2-c596a06f6e4c', 'iftar', '18:30:00', '2024-07-15 15:19:51', '2024-07-19 17:53:41', 0),
(10, '8d29f7e0-9218-4db9-ab47-e0fe67ed1e9d', 'tahajjud', '08:00:00', '2024-07-15 15:20:39', '2024-07-19 17:37:44', 0),
(11, '92936a50-a0bc-4918-a19d-a6aed1cb41a5', 'eid ul fitr', '08:00:00', '2024-07-19 17:38:04', '2024-07-19 17:53:22', 0),
(12, '3fe57bfe-5495-4eb9-9384-90a847223d3e', 'eid ul adha', '08:00:00', '2024-07-19 17:38:04', '2024-07-19 17:53:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_subscribers`
--

CREATE TABLE `gmsa_subscribers` (
  `id` bigint(20) NOT NULL,
  `subscriber_id` varchar(300) NOT NULL,
  `subscriber_email` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_subscribers`
--

INSERT INTO `gmsa_subscribers` (`id`, `subscriber_id`, `subscriber_email`, `createdAt`, `updatedAt`, `status`) VALUES
(5, '25c3b05a-5789-433c-b7b0-d6e3a7ef53b9', 'tjhackx111@gmail.com', '2024-07-16 07:43:27', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_user_password_resets`
--

CREATE TABLE `gmsa_user_password_resets` (
  `password_reset_id` int(11) NOT NULL,
  `password_reset_created_at` datetime DEFAULT NULL,
  `password_reset_user_id` int(11) NOT NULL,
  `password_reset_verify` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gmsa_about`
--
ALTER TABLE `gmsa_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `gmsa_activities`
--
ALTER TABLE `gmsa_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_admin`
--
ALTER TABLE `gmsa_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `gmsa_categories`
--
ALTER TABLE `gmsa_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_contacts`
--
ALTER TABLE `gmsa_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_donations`
--
ALTER TABLE `gmsa_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_dues`
--
ALTER TABLE `gmsa_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_executives`
--
ALTER TABLE `gmsa_executives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_faq`
--
ALTER TABLE `gmsa_faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faq_heading` (`faq_heading`);

--
-- Indexes for table `gmsa_faq_details`
--
ALTER TABLE `gmsa_faq_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_gallery`
--
ALTER TABLE `gmsa_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_members`
--
ALTER TABLE `gmsa_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_email` (`member_email`),
  ADD KEY `user_state` (`member_dob`),
  ADD KEY `user_trash` (`status`),
  ADD KEY `user_email` (`member_email`),
  ADD KEY `user_city` (`member_region`) USING BTREE,
  ADD KEY `user_gender` (`member_gender`);

--
-- Indexes for table `gmsa_news`
--
ALTER TABLE `gmsa_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `news_title` (`news_title`),
  ADD KEY `news_url` (`news_url`),
  ADD KEY `news_category` (`news_category`),
  ADD KEY `news_created_by` (`news_created_by`),
  ADD KEY `createdAt` (`createdAt`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `gmsa_positions`
--
ALTER TABLE `gmsa_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_prayer_time`
--
ALTER TABLE `gmsa_prayer_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_subscribers`
--
ALTER TABLE `gmsa_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmsa_user_password_resets`
--
ALTER TABLE `gmsa_user_password_resets`
  ADD PRIMARY KEY (`password_reset_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gmsa_about`
--
ALTER TABLE `gmsa_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gmsa_activities`
--
ALTER TABLE `gmsa_activities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gmsa_admin`
--
ALTER TABLE `gmsa_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gmsa_categories`
--
ALTER TABLE `gmsa_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gmsa_contacts`
--
ALTER TABLE `gmsa_contacts`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gmsa_donations`
--
ALTER TABLE `gmsa_donations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gmsa_dues`
--
ALTER TABLE `gmsa_dues`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gmsa_executives`
--
ALTER TABLE `gmsa_executives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gmsa_faq`
--
ALTER TABLE `gmsa_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gmsa_faq_details`
--
ALTER TABLE `gmsa_faq_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gmsa_gallery`
--
ALTER TABLE `gmsa_gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gmsa_members`
--
ALTER TABLE `gmsa_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gmsa_news`
--
ALTER TABLE `gmsa_news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gmsa_positions`
--
ALTER TABLE `gmsa_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gmsa_prayer_time`
--
ALTER TABLE `gmsa_prayer_time`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gmsa_subscribers`
--
ALTER TABLE `gmsa_subscribers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gmsa_user_password_resets`
--
ALTER TABLE `gmsa_user_password_resets`
  MODIFY `password_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `jspence`
--
CREATE DATABASE IF NOT EXISTS `jspence` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jspence`;

-- --------------------------------------------------------

--
-- Table structure for table `jspence`
--

CREATE TABLE `jspence` (
  `company_name` varchar(300) DEFAULT NULL,
  `company_address` varchar(300) DEFAULT NULL,
  `company_phone1` varchar(20) DEFAULT NULL,
  `company_phone2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jspence`
--

INSERT INTO `jspence` (`company_name`, `company_address`, `company_phone1`, `company_phone2`) VALUES
('J-Spence Company Limited', 'Box SN 17, SANTASI KUMASI', '+233 (0) 24 412 5900', '+233 (0) 50 414 6600');

-- --------------------------------------------------------

--
-- Table structure for table `jspence_admin`
--

CREATE TABLE `jspence_admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(300) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_email` varchar(175) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_pin` int(11) DEFAULT 1234,
  `admin_profile` text DEFAULT NULL,
  `admin_joined_date` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_last_login` datetime DEFAULT NULL,
  `admin_permissions` varchar(255) NOT NULL,
  `admin_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jspence_admin`
--

INSERT INTO `jspence_admin` (`id`, `admin_id`, `admin_fullname`, `admin_email`, `admin_password`, `admin_pin`, `admin_profile`, `admin_joined_date`, `admin_last_login`, `admin_permissions`, `admin_status`) VALUES
(1, '234234234', 'alhaji priest babson', 'admin@jspence.com', '$2y$10$dHoeddyBK4Z23jqePowDO.JPAeXDugtyZN6.Zwc8hy.033Z1/5vbq', 1234, 'dist/media/admin-profiles/961e39eea7a28892e44874f9d34eaa28.jpg', '2020-02-21 21:01:31', '2024-07-06 18:37:40', 'admin,salesperson', 0),
(11, '16acd24f-0ad7-42d9-a565-a8863f4a8fa2', 'tijani moro', 'tijani@jspence.com', '$2y$10$6VM4wWjd3Ts2snR4KDRS9On2bRxzXJ0V/TXplZHs0ZL93y.G/RqWu', 1234, NULL, '2024-06-28 05:48:12', '2024-06-28 15:35:04', 'salesperson', 1),
(12, 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', 'inuwa mohammed umar', 'inuwa@jspence.com', '$2y$10$7mg6BRD9UXqQL8wxUiCkQe5IqceroHPGvq8wMgiiTCpFEOYsUdcNq', 2222, NULL, '2024-06-28 05:49:20', '2024-07-06 10:25:45', 'salesperson', 0),
(13, '404d51db-6533-4586-b8d5-17c27c2f0607', 'henry asamoah', 'henry@email.com', '$2y$10$.pYicI6NOTj8Rd8S878EB.Hn6uoxCQXkix7uJgXlvxx1eR8iV1dLq', 1234, NULL, '2024-07-01 14:21:26', '2024-07-04 11:07:23', 'salesperson', 0),
(14, '59e29767-cc32-4b2b-9abf-8422e2e45dcd', 'Adiza husein', 'adiza@email.com', '$2y$10$cC84GJNvi4Tq/6gm.r.ft.G9YEZ267sz3JQ/B/b.Nl5Cz6Fa64z9S', 1234, NULL, '2024-07-01 22:33:16', NULL, 'admin,salesperson', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jspence_logs`
--

CREATE TABLE `jspence_logs` (
  `id` bigint(20) NOT NULL,
  `log_id` varchar(300) NOT NULL,
  `log_message` text NOT NULL,
  `log_admin` varchar(300) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `log_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jspence_logs`
--

INSERT INTO `jspence_logs` (`id`, `log_id`, `log_message`, `log_admin`, `createdAt`, `updatedAt`, `log_status`) VALUES
(1, '3113addb-2062-4ffe-a67d-f1ddb2bd9069', 'logged out from system', '234234234', '2024-06-30 11:20:22', NULL, 0),
(2, '04ae0617-f7e5-455f-b290-27611bb5658b', 'logged into the system', '234234234', '2024-06-30 11:20:34', NULL, 0),
(3, '035817b7-78a8-4ee5-b203-b0ced1561bd4', 'added new sale with gram of 15.37 and volume of 0.87 and total amount of ₵3,878.62 and price of ₵8,250.00 on id 13fafb53-a7b3-49ca-bb15-fdcd19a2cabf', '234234234', '2024-06-30 11:35:49', NULL, 0),
(4, '0b3ed1ac-3f0a-4c24-b7e3-29753e44801d', 'logged out from system', '234234234', '2024-06-30 11:46:36', NULL, 0),
(5, 'd078630f-b849-4b4a-a2c5-8dc40ba4f0b8', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 11:46:43', NULL, 0),
(6, 'a1df82c2-b185-49a2-b37b-ada621927133', 'added new sale with gram of 23.45 and volume of 1.1 and total amount of ₵3,171.44 and price of ₵8,250.00 on id b772ff1d-401e-418d-a2cf-1c98f7e372dd', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 11:58:24', NULL, 0),
(7, '2faa8df5-9ddd-4f78-8d17-404c31feb917', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 12:59:21', NULL, 0),
(8, '39fef907-d996-4b83-b405-12d85768d39c', 'logged into the system', '234234234', '2024-06-30 12:59:31', NULL, 0),
(9, 'd16484bb-2f78-4383-a8b2-3d7547b3a4df', 'logged out from system', '234234234', '2024-06-30 13:16:10', NULL, 0),
(10, '6f06bb8d-9057-43c4-8a6e-afb798936779', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 13:16:20', NULL, 0),
(11, '1f5201f5-8f7c-4bc8-a0eb-70abed7c0c8a', 'added new sale with gram of 23 and volume of 1 and total amount of ₵1,467.05 and price of ₵3,493.00 on id 8f148e3d-d1c0-4b4c-8273-9d539c58db8f', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 13:26:52', NULL, 0),
(12, '273094fe-571c-4023-ae7f-cd9bf6eda4eb', 'added new sale with gram of 15.37 and volume of 0.87 and total amount of ₵15,191.55 and price of ₵8,250.00 on id 92e0691c-81c3-475f-8dd8-b5a1ab1b0d68', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 15:51:00', NULL, 0),
(13, '39b9b759-635d-4a3f-a810-59fc09f83b9f', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 16:02:39', NULL, 0),
(14, '80dabb5c-f432-4c67-a8ae-e9562297b910', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 16:03:36', NULL, 0),
(15, '7083ecef-0196-4465-9599-9483212fe790', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 16:15:17', NULL, 0),
(16, '169f82a1-f1a3-4d25-955e-b7fcc28af060', 'logged into the system', '234234234', '2024-06-30 16:15:23', NULL, 0),
(17, 'e39b8a5b-e7c3-424c-96d1-d14da1d3a571', 'logged out from system', '234234234', '2024-06-30 16:35:45', NULL, 0),
(18, '72320320-23a3-42c7-a2e3-d52275f831e7', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 16:35:52', NULL, 0),
(19, '0e4ab9f4-0c35-47c0-991a-70744854750a', 'added new sale with gram of 123 and volume of 0.98 and total amount of ₵151,381.94 and price of ₵4,532.00 on id c6418219-b87d-491e-b2e5-ecc47371aad0', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 16:37:50', NULL, 0),
(20, '298efc7b-8b4e-4392-ab91-304848c16aee', 'added new sale with gram of 123 and volume of 2 and total amount of ₵37,302.46 and price of ₵1,234.00 on id 0084fe0d-e9f4-4ad4-9dcc-dfac138f3a69', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 17:00:49', NULL, 0),
(21, '3a1e0b85-2bfb-4c0a-8ef2-25c1b14ee546', 'changed PIN', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 17:49:05', NULL, 0),
(22, 'e638cc66-58a9-498d-acc5-4e883fd896a7', 'changed PIN', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 17:49:41', NULL, 0),
(23, 'c684eae5-22b2-40b5-b8db-90d9e85294fb', 'added new sale with gram of 123 and volume of 2 and total amount of ₵70,191.51 and price of ₵2,322.00 on id f8447ded-6b34-40cf-bd3e-1dbc5da48454', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 17:50:39', NULL, 0),
(24, 'af18d5db-ae34-4eb8-8c22-07c97c6b2a77', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-01 11:52:11', NULL, 0),
(25, '613245f2-6ef2-4dfd-89e0-ef1f5156c5f9', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-01 11:53:58', NULL, 0),
(26, 'c1151232-0dfa-435a-9939-6f301173c78e', 'added new sale with gram of 15.37 and volume of 0.87 and total amount of ₵15,191.55 and price of ₵8,250.00 on id 2647d3f4-be16-47a0-b24b-c7cce8988cd3', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-01 12:23:28', NULL, 0),
(27, '6e105892-1abb-4244-96bd-c050cc2f152c', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-01 14:05:33', NULL, 0),
(28, '6ad75911-f640-423a-9fd9-0275f9d13880', 'logged into the system', '234234234', '2024-07-01 14:06:03', NULL, 0),
(29, 'ede7a311-0a7e-44af-b6fe-9739c91540da', 'changed password', '234234234', '2024-07-01 14:21:26', NULL, 0),
(30, '37e73d4e-da7c-4344-ad15-a4807dfc41a6', 'logged into the system', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-01 14:23:06', NULL, 0),
(31, '187c3648-dab5-4525-9c50-255304ce8820', 'added new sale with gram of 45 and volume of 0.98 and total amount of ₵35,496.20 and price of ₵3,450.00 on id 4f666b08-1ac1-447a-90b9-8c5bbeb1cfd9', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-01 14:28:11', NULL, 0),
(32, 'c44f972c-9506-4684-bb24-4a3f5329f0d7', 'logged out from system', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-01 14:36:36', NULL, 0),
(33, '238c4a79-94cc-408e-b53f-6246f5b90535', 'exported xlsx trades data', '234234234', '2024-07-01 22:29:57', NULL, 0),
(34, '50c49e6d-600d-49c4-8a7d-be8b92555134', 'exported xls trades data', '234234234', '2024-07-01 22:30:14', NULL, 0),
(35, '6b2c01e9-684d-4bb4-adbd-99eb8a3f569a', 'exported csv trades data', '234234234', '2024-07-01 22:30:25', NULL, 0),
(36, 'a386f808-783a-4e1f-bed8-2a25bbbc5c2d', 'added new admin as a admin,salesperson', '234234234', '2024-07-01 22:33:16', NULL, 0),
(37, 'aeb80274-cd7e-4df9-8d8e-855d46ef0dd3', 'exported pdf trades data', '234234234', '2024-07-01 22:53:32', NULL, 0),
(38, '19b91a8d-a502-41b9-88ed-ba917f4a0287', 'exported pdf trades data', '234234234', '2024-07-01 22:53:56', NULL, 0),
(39, '893e570a-6465-480f-889b-ee09a18f9abf', 'exported pdf trades data', '234234234', '2024-07-01 22:57:11', NULL, 0),
(40, '493bf057-2646-490a-8c2b-a5d6bd72d916', 'exported pdf trades data', '234234234', '2024-07-01 22:58:11', NULL, 0),
(41, 'f40062ed-1c6c-4dc9-aa9e-5d1bc7880d3e', 'exported pdf trades data', '234234234', '2024-07-01 22:58:27', NULL, 0),
(42, 'f62b30ce-b769-4963-a5a1-0333c02a35d0', 'exported pdf trades data', '234234234', '2024-07-01 23:03:21', NULL, 0),
(43, '7f2d9e80-3478-49eb-8ba3-1271452f4c3b', 'exported pdf trades data', '234234234', '2024-07-01 23:03:49', NULL, 0),
(44, '34e08248-39fc-4a9e-bc30-61a64b4d0db0', 'exported pdf trades data', '234234234', '2024-07-02 00:00:39', NULL, 0),
(45, '06f02231-73fa-4e84-b8f7-f8f87d0ec707', 'exported pdf trades data', '234234234', '2024-07-02 00:00:41', NULL, 0),
(46, '76857d38-b56d-4464-9ae3-746c60673bcb', 'exported pdf trades data', '234234234', '2024-07-02 00:16:25', NULL, 0),
(47, '2722d99d-dcbc-4288-91cf-bddaa8dd982c', 'deleted profile picture', '234234234', '2024-07-02 00:58:32', NULL, 0),
(48, '0d46804b-0778-4ab5-af8d-dba143c77a16', 'logged out from system', '234234234', '2024-07-02 18:01:41', NULL, 0),
(49, '7a85d875-e25c-4dec-ad20-fca9f856726d', 'logged into the system', '234234234', '2024-07-02 18:04:20', NULL, 0),
(50, '0782410a-2b15-4fa4-8bf9-50996372e809', 'updated profile picture', '234234234', '2024-07-02 18:09:25', NULL, 0),
(51, '1409aa6b-09b5-474f-8c0e-faf8732f1ff8', 'logged out from system', '234234234', '2024-07-02 18:18:12', NULL, 0),
(52, '1080904c-c7f1-4f26-a01d-0879c49faf56', 'logged into the system', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-02 18:19:14', NULL, 0),
(53, '231e2d79-ba8e-48da-8d6a-1f5e01f1ebe1', 'logged out from system', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-02 18:49:39', NULL, 0),
(54, '227c5f8d-2acf-434d-9e9c-a42f1de9b3d5', 'logged into the system', '234234234', '2024-07-02 18:49:56', NULL, 0),
(55, 'cdcb8d74-88dd-4bf3-8790-009e91ac4714', 'added new sale with gram of 78 and volume of 1 and total amount of ₵175,679.87 and price of ₵8,787.00 on id f73617f0-c810-4b2b-a4c2-f973e02c04cb', '234234234', '2024-07-02 19:09:30', NULL, 0),
(56, '8a8b0752-b6d8-47c7-be46-94a1063d8057', 'logged into the system', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-03 12:19:23', NULL, 0),
(57, '3bf66aec-9654-4db5-b8a5-e4f517042afc', 'added new sale with gram of 12 and volume of 0.34 and total amount of ₵5,748.95 and price of ₵2,300.00 on id 72de0129-4f1b-4832-9145-8bc849d6b300', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-03 12:21:22', NULL, 0),
(58, '11768c62-fcae-4be7-abf3-4386a14cc384', 'added new sale with gram of 123 and volume of 1 and total amount of ₵152,235.92 and price of ₵4,567.00 on id a017da3b-debe-4724-bcda-99484919a2d2', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-03 12:22:15', NULL, 0),
(59, 'bf6f79fb-d821-44e6-be53-78f67cf42366', 'delete request for trade id: \'a017da3b-debe-4724-bcda-99484919a2d2\'', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-03 17:39:37', NULL, 0),
(60, 'b07d9ce1-d27a-4430-89e1-24afa838db9b', 'viewed all new delete request', '234234234', '2024-07-03 17:45:00', NULL, 0),
(61, '8c58aae4-87f5-4dd2-9eff-1edbbc576d21', 'viewed all new delete request', '234234234', '2024-07-03 17:45:07', NULL, 0),
(62, '6d792a3a-7354-424b-a03f-5c03259f8956', 'viewed all new delete request', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 09:11:41', NULL, 0),
(63, 'f5790b52-b017-4f96-aaa0-2558a249ff9a', 'viewed all new delete request', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 09:16:42', NULL, 0),
(64, 'b2e8fe42-cab4-4a53-87c1-f04a042a5816', 'viewed all new delete request', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 09:17:03', NULL, 0),
(65, 'b3a70481-3ae8-4745-a85c-f8b4e4abd32f', 'viewed all new delete request', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 09:22:41', NULL, 0),
(66, '20bd46ab-e689-4ee1-b9d0-e42a7ba641c5', 'viewed all new delete request', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 09:22:52', NULL, 0),
(67, '21dbe8e7-742f-446f-853a-929f7950dd47', 'viewed all new delete request', '234234234', '2024-07-04 09:23:07', NULL, 0),
(68, '86667517-ae7a-441c-a953-b52684578c16', 'viewed all new delete request', '234234234', '2024-07-04 09:23:34', NULL, 0),
(69, '914f2caf-4973-49b0-b2a1-a5f5a9cbc0a6', 'viewed all new delete request', '234234234', '2024-07-04 09:23:58', NULL, 0),
(70, '607b9edc-2058-4e44-8280-b9c55c83c168', 'viewed all new delete request', '234234234', '2024-07-04 09:24:11', NULL, 0),
(71, '046d2042-cc80-4348-b51d-b3e1fe95f59a', 'viewed all new delete request', '234234234', '2024-07-04 09:26:49', NULL, 0),
(72, '74b6ce53-f256-4513-ae02-8044688b2d63', 'viewed all new delete request', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 09:26:54', NULL, 0),
(73, '62c7125d-2eba-4740-9812-d58d93737dcf', 'viewed all new delete request', '234234234', '2024-07-04 09:27:27', NULL, 0),
(74, 'b0df04e0-70c1-4ffd-b9b8-1bb3cccd42da', 'viewed all new delete request', '234234234', '2024-07-04 09:28:53', NULL, 0),
(75, '7f301dfe-1729-42c4-be1d-9afdd046eb54', 'viewed all new delete request', '234234234', '2024-07-04 09:29:02', NULL, 0),
(76, '37a3638c-69f1-467f-9093-697f8514b5b5', 'viewed all new delete request', '234234234', '2024-07-04 09:29:11', NULL, 0),
(77, 'cefba928-f730-4293-ba48-f0bc2c82e58e', 'viewed all new delete request', '234234234', '2024-07-04 09:40:33', NULL, 0),
(78, 'e32eec01-6510-4197-91a8-55d35a8d6c67', 'viewed all new delete request', '234234234', '2024-07-04 09:40:33', NULL, 0),
(79, 'eee0d5d1-4c93-4075-910d-f5f51483604a', 'viewed all new delete request', '234234234', '2024-07-04 09:40:41', NULL, 0),
(80, 'c66910e7-5f96-41d2-a627-0f634c8fbaa2', 'viewed all new delete request', '234234234', '2024-07-04 09:40:44', NULL, 0),
(81, 'eaf33743-f64d-407b-8d2f-eed441753cd6', 'viewed all new delete request', '234234234', '2024-07-04 09:40:45', NULL, 0),
(82, '7e872cd9-67a2-4dd6-bc6e-916b69292a68', 'viewed all new delete request', '234234234', '2024-07-04 09:41:55', NULL, 0),
(83, '9bdd7f5a-1b14-4b3b-ad32-74eada56947a', 'viewed all new delete request', '234234234', '2024-07-04 09:42:04', NULL, 0),
(84, '5cfef9e8-11a9-40e6-b883-5cad0bdcf4ed', 'viewed all new delete request', '234234234', '2024-07-04 09:42:04', NULL, 0),
(85, 'e8f46f95-5f6d-4cfd-8b89-d581af99d919', 'delete request for trade id: \'a017da3b-debe-4724-bcda-99484919a2d2\'', '234234234', '2024-07-04 09:43:01', NULL, 0),
(86, '6a544281-4202-4d70-aca6-f192a8ca4576', 'viewed all new delete request', '234234234', '2024-07-04 09:43:05', NULL, 0),
(87, '7befc021-cfe2-49e5-b70a-5b191c69e8d7', 'viewed all new delete request', '234234234', '2024-07-04 09:43:09', NULL, 0),
(88, '2fe65919-9791-45fc-87a6-f8b65bd8f88c', 'viewed all new delete request', '234234234', '2024-07-04 09:43:09', NULL, 0),
(89, '38d14550-49fa-4993-b968-30d7a5e92629', 'viewed all new delete request', '234234234', '2024-07-04 09:44:33', NULL, 0),
(90, '8d8c7089-d304-4990-b603-98d41e41638d', 'delete request for trade id: \'a017da3b-debe-4724-bcda-99484919a2d2\'', '234234234', '2024-07-04 09:44:50', NULL, 0),
(91, '07d1eb63-cff2-4f1f-aea3-92ac47c1898a', 'viewed all new delete request', '234234234', '2024-07-04 09:44:52', NULL, 0),
(92, '0c263f41-08ef-4411-8260-186307e52988', 'delete request for trade id: \'a017da3b-debe-4724-bcda-99484919a2d2\'', '234234234', '2024-07-04 09:45:56', NULL, 0),
(93, '42532f28-87e7-4a88-8546-5944c881a7fc', 'viewed all new delete request', '234234234', '2024-07-04 09:46:00', NULL, 0),
(94, 'c515619c-228d-410e-b057-09ce661fff60', 'viewed all new delete request', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 09:50:46', NULL, 0),
(95, 'ff126f6e-e020-4d9c-a265-a28658be8dc3', 'delete request for trade id: \'72de0129-4f1b-4832-9145-8bc849d6b300\'', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 09:51:11', NULL, 0),
(96, '4c85b642-d7a1-4c5c-baa5-e7febed7b075', 'viewed all new delete request', '234234234', '2024-07-04 09:53:39', NULL, 0),
(97, '1e949a00-d760-44b6-8e66-188569ee4640', 'viewed all new delete request', '234234234', '2024-07-04 09:54:16', NULL, 0),
(98, 'b70387b9-39e2-43a5-b3ec-ec12b020f091', 'deleted sale from sale requests', '234234234', '2024-07-04 09:54:16', NULL, 0),
(99, '14d33f6b-b474-4d1e-8ff8-3658e6499c58', 'viewed all new delete request', '234234234', '2024-07-04 09:54:16', NULL, 0),
(100, 'e9c6890c-5afd-498d-b815-3babe14591f5', 'viewed all new delete request', '234234234', '2024-07-04 09:55:27', NULL, 0),
(101, '3f6a63c2-e1aa-42de-bde4-b1daa3195955', 'viewed all new delete request', '234234234', '2024-07-04 09:56:06', NULL, 0),
(102, '2baadeb1-7c0b-466e-a107-28b2be0c7fc0', 'viewed all new delete request', '234234234', '2024-07-04 09:56:48', NULL, 0),
(103, 'd4011521-8fd0-42b7-b878-ce86f83cc13e', 'viewed all new delete request', '234234234', '2024-07-04 09:57:11', NULL, 0),
(104, '354bb47f-e4b6-4b0b-a006-28d5e69e96fe', 'viewed all new delete request', '234234234', '2024-07-04 09:57:48', NULL, 0),
(105, 'e1c189ce-5a38-44bf-8e60-df0fc7a6bd0e', 'viewed all new delete request', '234234234', '2024-07-04 09:59:07', NULL, 0),
(106, '74ef29b0-21e2-47a9-a591-a9f67d7a5477', 'viewed all new delete request', '234234234', '2024-07-04 09:59:56', NULL, 0),
(107, '1e2657f7-90e4-4e28-9b6f-0ae0bbc3926c', 'viewed all new delete request', '234234234', '2024-07-04 10:06:28', NULL, 0),
(108, '3ac76e0c-5224-4803-b91b-09fd13ebddce', 'delete request for trade id: \'a017da3b-debe-4724-bcda-99484919a2d2\'', '234234234', '2024-07-04 10:39:38', NULL, 0),
(109, '73803ba3-1470-4314-be4e-6a6cfa591821', 'delete request for trade id: \'4f666b08-1ac1-447a-90b9-8c5bbeb1cfd9\'', '234234234', '2024-07-04 10:39:46', NULL, 0),
(110, '68bf56eb-d952-4af8-85f6-228664bac127', 'delete request for trade id: \'c6418219-b87d-491e-b2e5-ecc47371aad0\'', '234234234', '2024-07-04 10:39:51', NULL, 0),
(111, '1d880543-5c3a-4ef6-b91e-4c3e38075026', 'delete request for trade id: \'2647d3f4-be16-47a0-b24b-c7cce8988cd3\'', '234234234', '2024-07-04 10:39:55', NULL, 0),
(112, 'baa75f41-dde1-4015-ab57-429cb34f5c56', 'delete request for trade id: \'f8447ded-6b34-40cf-bd3e-1dbc5da48454\'', '234234234', '2024-07-04 10:39:59', NULL, 0),
(113, 'e468af84-8e1b-45cb-b492-cd28e2e8587d', 'logged out from system', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 10:59:12', NULL, 0),
(114, 'ef308d87-6d41-4f85-aba1-17161a880ef2', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 10:59:29', NULL, 0),
(115, 'bb480bf5-4722-47fa-bee4-277fec6a6663', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 11:07:14', NULL, 0),
(116, '12075823-83cf-4032-a26a-de07fe6b50e7', 'logged into the system', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 11:07:23', NULL, 0),
(117, '5b721163-ab15-4b09-a0b1-271bb5c8e3b1', 'added new sale with gram of 565 and volume of 6 and total amount of ₵11,270,724.32 and price of ₵75,765.00 on id 11c644f6-5dab-4501-99f6-e205da2a75ce', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 14:32:34', NULL, 0),
(118, 'e4ef3142-c28d-4079-82f9-aa03e6b96997', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 14:39:22', NULL, 0),
(119, '8d72dfc2-663d-40c9-8da0-a8b22f8225f1', 'added new sale with gram of 14.92 and volume of 0.79 and total amount of ₵17,009.03 and price of ₵8,700.00 on id 54c4b503-f584-4686-8fa7-a9f45bf04422', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 14:41:19', NULL, 0),
(120, '4d51e2b5-e8ab-4700-b5e3-41db06bd7197', 'delete request for trade id: \'54c4b503-f584-4686-8fa7-a9f45bf04422\'', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 14:43:12', NULL, 0),
(121, '798e81a9-cf7d-4a26-8758-04a5a5e37091', 'viewed all new delete request', '234234234', '2024-07-04 14:44:54', NULL, 0),
(122, '227b8fe9-9ea5-469e-bb60-55ff289a3514', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 14:45:40', NULL, 0),
(123, 'f4506420-88fe-455d-a083-9f0d2c183413', 'logged out from system', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 14:45:46', NULL, 0),
(124, '35eb81c2-71b9-404b-a677-e22bc29a0f5d', 'deleted profile picture', '234234234', '2024-07-04 21:41:49', NULL, 0),
(125, 'a8383164-a3cb-427b-8ae8-cfd022abb6cf', 'updated profile picture', '234234234', '2024-07-04 21:42:02', NULL, 0),
(126, 'bed9d58c-9304-4b90-b7b7-660524f21194', 'viewed all new delete request', '234234234', '2024-07-04 21:43:40', NULL, 0),
(127, '171012f6-6a05-4f2b-81d5-cf06cb5bbddb', 'viewed all new delete request', '234234234', '2024-07-04 21:43:40', NULL, 0),
(128, '1f6f8a42-7922-4c2d-a62b-d3edaa98b320', 'viewed all new delete request', '234234234', '2024-07-04 21:44:43', NULL, 0),
(129, '7b9cdcb2-2243-463c-81b9-9eb7a2f3f315', 'viewed all new delete request', '234234234', '2024-07-04 21:44:53', NULL, 0),
(130, '17260da2-3daa-4b91-961a-f73405579d6d', 'deleted sale from sale requests', '234234234', '2024-07-04 21:44:53', NULL, 0),
(131, 'e5d3c757-d628-45cc-9083-8a8e54b1c41e', 'viewed all new delete request', '234234234', '2024-07-04 21:44:53', NULL, 0),
(132, 'f65a4e81-24c6-4495-ba6e-affd2503eaff', 'viewed all new delete request', '234234234', '2024-07-04 21:45:59', NULL, 0),
(133, '1b34e8ec-b7bf-4c0e-9b72-cb120077f04b', 'exported PDF trades data', '234234234', '2024-07-04 21:48:24', NULL, 0),
(134, 'f5b2f829-0a77-47f4-b820-c80381cf1824', 'exported XLSX trades data', '234234234', '2024-07-04 21:51:20', NULL, 0),
(135, 'e8ec081e-23a5-4b05-bb0b-64739b3caf13', 'logged out from system', '234234234', '2024-07-04 21:53:19', NULL, 0),
(136, 'b7a0b978-6de5-49d3-b847-cd6fdf80c9b4', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 21:54:20', NULL, 0),
(137, 'e8092145-6e6e-4f0b-a9c3-a72a19ae00a4', 'delete request for trade id: \'0084fe0d-e9f4-4ad4-9dcc-dfac138f3a69\'', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 21:55:40', NULL, 0),
(138, '01ed2b02-ba63-4771-8d7f-dde4e3675c36', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 21:56:35', NULL, 0),
(139, 'c748edb1-75b1-48f7-92ed-14cc2ad6a25a', 'logged into the system', '234234234', '2024-07-04 21:56:47', NULL, 0),
(140, 'be119df5-9a9f-469a-8253-be5c1f003d14', 'viewed all new delete request', '234234234', '2024-07-04 21:57:01', NULL, 0),
(141, '44ad228f-93e1-4815-9b37-fa22e3db6de3', 'viewed all new delete request', '234234234', '2024-07-04 21:57:52', NULL, 0),
(142, 'aea32763-3a99-4232-b2e9-c1dd20dc0580', 'viewed all new delete request', '234234234', '2024-07-04 21:58:10', NULL, 0),
(143, '640e14c4-4cc3-40be-bf76-90403fda4865', 'deleted sale from sale requests', '234234234', '2024-07-04 21:58:10', NULL, 0),
(144, '222fff39-4128-4444-ba98-bf7e11b27591', 'viewed all new delete request', '234234234', '2024-07-04 21:58:10', NULL, 0),
(145, '5a2b205a-c115-4c94-af36-f3048f7aaa62', 'viewed all new delete request', '234234234', '2024-07-04 21:58:23', NULL, 0),
(146, 'e8145e1d-9354-4508-8ebd-cce19c6c1c9d', 'logged out from system', '234234234', '2024-07-05 06:27:52', NULL, 0),
(147, '957e1c37-df93-4283-919a-9cc2167a15b5', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-05 06:28:04', NULL, 0),
(148, 'c1dd53f3-ea2c-46a5-907a-681d6cf8535a', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-05 09:38:21', NULL, 0),
(149, 'c6904532-c290-4aad-a739-b14e04f72f83', 'logged into the system', '234234234', '2024-07-05 09:38:30', NULL, 0),
(150, '1cb826c2-9215-421e-86e8-1c6101e69f44', 'viewed all new delete request', '234234234', '2024-07-05 09:38:39', NULL, 0),
(151, '817abf5b-8fe1-49b1-b522-f62a8efcea07', 'logged out from system', '234234234', '2024-07-05 10:33:24', NULL, 0),
(152, '8aea5403-f279-4ebd-a02e-bff3dad0724f', 'logged into the system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-06 10:25:45', NULL, 0),
(153, 'db31bc87-793d-48c7-90eb-f4692c0ab81b', 'logged out from system', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-06 10:25:51', NULL, 0),
(154, 'efeeaade-728e-4db2-aa9e-52accbc80958', 'logged into the system', '234234234', '2024-07-06 18:37:40', NULL, 0),
(155, '19e2ff02-73aa-49c5-867a-891fc1ee0efc', 'logged out from system', '234234234', '2024-07-06 18:37:57', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jspence_sales`
--

CREATE TABLE `jspence_sales` (
  `id` bigint(20) NOT NULL,
  `sale_id` varchar(300) NOT NULL,
  `sale_gram` double(10,2) NOT NULL,
  `sale_volume` double(10,2) NOT NULL,
  `sale_density` double(10,2) NOT NULL,
  `sale_pounds` double(10,2) NOT NULL,
  `sale_carat` double(10,2) NOT NULL,
  `sale_price` double(10,2) NOT NULL,
  `sale_total_amount` double(10,2) NOT NULL,
  `sale_customer_name` varchar(200) DEFAULT NULL,
  `sale_customer_contact` varchar(100) DEFAULT NULL,
  `sale_comment` text NOT NULL,
  `sale_by` varchar(300) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `sale_status` tinyint(4) NOT NULL DEFAULT 0,
  `sale_delete_request_reason` varchar(700) DEFAULT NULL,
  `sale_delete_request_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jspence_sales`
--

INSERT INTO `jspence_sales` (`id`, `sale_id`, `sale_gram`, `sale_volume`, `sale_density`, `sale_pounds`, `sale_carat`, `sale_price`, `sale_total_amount`, `sale_customer_name`, `sale_customer_contact`, `sale_comment`, `sale_by`, `createdAt`, `updatedAt`, `sale_status`, `sale_delete_request_reason`, `sale_delete_request_status`) VALUES
(1, '13fafb53-a7b3-49ca-bb15-fdcd19a2cabf', 15.37, 0.87, 17.67, 1.98, 21.41, 8250.00, 3878.62, 'inuwa umar', '0244323212', 'make it swift for me', '234234234', '2024-06-30 11:35:49', '2024-07-04 09:45:10', 0, NULL, 0),
(2, 'b772ff1d-401e-418d-a2cf-1c98f7e372dd', 23.45, 1.10, 21.32, 3.03, 26.79, 8250.00, 3171.44, 'haruna osei', 'haruna@email.com', 'we good.', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 11:58:24', '2024-07-04 09:45:12', 0, NULL, 0),
(3, '8f148e3d-d1c0-4b4c-8273-9d539c58db8f', 23.00, 1.00, 23.00, 2.97, 28.69, 3493.00, 1467.05, 'inusa afiu', 'email@email.com', '', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 13:26:52', '2024-07-04 09:45:14', 0, NULL, 0),
(4, '92e0691c-81c3-475f-8dd8-b5a1ab1b0d68', 15.37, 0.87, 17.66, 1.98, 21.39, 8250.00, 15191.55, 'mama dora', 'mama@email.com', '', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 15:51:00', '2024-07-04 09:45:18', 0, NULL, 0),
(5, 'c6418219-b87d-491e-b2e5-ecc47371aad0', 123.00, 0.98, 125.50, 15.87, 48.41, 4532.00, 151381.94, 'kadr', '04455', '', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 16:37:50', '2024-07-04 14:44:54', 1, NULL, 2),
(6, '0084fe0d-e9f4-4ad4-9dcc-dfac138f3a69', 123.00, 2.00, 61.49, 15.87, 43.81, 1234.00, 37302.46, 'hassan', '022222', 'dc', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 17:00:49', '2024-07-04 21:58:10', 2, NULL, 0),
(7, 'f8447ded-6b34-40cf-bd3e-1dbc5da48454', 123.00, 2.00, 61.49, 15.87, 43.81, 2322.00, 70191.51, 'kadr', '0222222', '', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-06-30 17:50:39', '2024-07-04 14:44:54', 1, NULL, 2),
(8, '2647d3f4-be16-47a0-b24b-c7cce8988cd3', 15.37, 0.87, 17.66, 1.98, 21.39, 8250.00, 15191.55, 'Opoku emmanuel', '0222222222', '', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-01 12:23:28', '2024-07-04 14:44:54', 1, NULL, 2),
(9, '4f666b08-1ac1-447a-90b9-8c5bbeb1cfd9', 45.00, 0.98, 45.91, 5.81, 40.73, 3450.00, 35496.19, 'grace osei', '02444444', 'am all good', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-01 14:28:11', '2024-07-04 14:44:54', 1, NULL, 2),
(10, 'f73617f0-c810-4b2b-a4c2-f973e02c04cb', 78.00, 1.00, 77.99, 10.06, 45.71, 8787.00, 175679.87, 'kjnk', 'jnjknk', 'kj', '234234234', '2024-07-02 19:09:30', '2024-07-04 09:45:31', 0, NULL, 0),
(11, '72de0129-4f1b-4832-9145-8bc849d6b300', 12.00, 0.34, 35.28, 1.55, 37.09, 2300.00, 5748.95, 'Afa', 'email.com', '', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-03 12:21:22', '2024-07-04 09:54:16', 2, NULL, 0),
(12, 'a017da3b-debe-4724-bcda-99484919a2d2', 123.00, 1.00, 122.99, 15.87, 48.31, 4567.00, 152235.92, 'baba ali', '023212342', '', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-03 12:22:15', '2024-07-04 14:44:54', 1, NULL, 2),
(13, '11c644f6-5dab-4501-99f6-e205da2a75ce', 565.00, 6.00, 94.16, 72.89, 46.94, 75765.00, 11270724.32, 'issac', '023333', '', '404d51db-6533-4586-b8d5-17c27c2f0607', '2024-07-04 14:32:34', NULL, 0, NULL, 0),
(14, '54c4b503-f584-4686-8fa7-a9f45bf04422', 14.92, 0.79, 18.88, 1.92, 23.42, 8700.00, 17009.03, 'isiu', 'email@email.com', '', 'e01de4bc-10e7-47cc-b2df-c2e1bdd8997f', '2024-07-04 14:41:19', '2024-07-04 21:44:53', 2, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jspence_admin`
--
ALTER TABLE `jspence_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_status` (`admin_status`),
  ADD KEY `admin_permissions` (`admin_permissions`),
  ADD KEY `admin_last_login` (`admin_last_login`),
  ADD KEY `admin_email` (`admin_email`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `jspence_logs`
--
ALTER TABLE `jspence_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createdAt` (`createdAt`),
  ADD KEY `log_status` (`log_status`),
  ADD KEY `log_admin` (`log_admin`),
  ADD KEY `log_id` (`log_id`);

--
-- Indexes for table `jspence_sales`
--
ALTER TABLE `jspence_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `sale_total_amount` (`sale_total_amount`),
  ADD KEY `sale_by` (`sale_by`),
  ADD KEY `createdAt` (`createdAt`),
  ADD KEY `sale_status` (`sale_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jspence_admin`
--
ALTER TABLE `jspence_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jspence_logs`
--
ALTER TABLE `jspence_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `jspence_sales`
--
ALTER TABLE `jspence_sales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"student_complaint_system\",\"table\":\"complaints\"},{\"db\":\"gmsa\",\"table\":\"gmsa_members\"},{\"db\":\"gmsa\",\"table\":\"gmsa_admin\"},{\"db\":\"gmsa\",\"table\":\"gmsa_news\"},{\"db\":\"gmsa\",\"table\":\"gmsa_categories\"},{\"db\":\"gmsa\",\"table\":\"gmsa_dues\"},{\"db\":\"gmsa\",\"table\":\"gmsa_donations\"},{\"db\":\"gmsa\",\"table\":\"gmsa_about\"},{\"db\":\"gmsa\",\"table\":\"gmsa_executives\"},{\"db\":\"gmsa\",\"table\":\"gmsa_positions\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-07-23 09:34:40', '{\"Console\\/Mode\":\"collapse\",\"ThemeDefault\":\"pmahomme\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `student_complaint_system`
--
CREATE DATABASE IF NOT EXISTS `student_complaint_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `student_complaint_system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_email` varchar(175) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_joined_date` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_last_login` datetime DEFAULT NULL,
  `admin_trash` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_email`, `admin_password`, `admin_joined_date`, `admin_last_login`, `admin_trash`) VALUES
(1, 'alhaji priest babson', 'admin@email.com', '$2y$10$1H/AArTqlKyaYE8JYVLJV.mN.367tv5O3xEIavP1evN1LkppTfX0e', '2020-02-21 21:01:31', '2024-07-09 23:35:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `createdAt`, `updatedAt`) VALUES
(1, 'sc', '2024-06-24 22:28:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `complaint_id` varchar(200) DEFAULT NULL,
  `student_id` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `complaint_document` text DEFAULT NULL,
  `complaint_message` text NOT NULL,
  `complaint_date` date DEFAULT NULL,
  `complaint_status` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `complaint_id`, `student_id`, `category_id`, `complaint_document`, `complaint_message`, `complaint_date`, `complaint_status`, `createdAt`, `updatedAt`, `trash`) VALUES
(5, '668dc47c6da4a8.22130641', '1', 1, '', '<p>123</p>\r\n<p><img src=\"dist/media/complaint_media/1720567196.jpg\"></p>', '2024-07-09', 1, '2024-07-10 01:15:08', '2024-07-09 23:20:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `fullname`, `email`, `level`, `password`, `createdAt`, `updatedAt`, `trash`) VALUES
(1, '20210404221', 'abigirl asare', 'abigirl@email.com', 100, '$2y$10$wrGq5rfVGJJm5JniXt1gfuiGVeSAidLtiNt.LHQpJzrv39u3o32GC', '2024-06-24 19:22:53', '2024-07-09 23:34:57', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
