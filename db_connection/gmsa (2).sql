-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 09:41 PM
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
-- Database: `gmsa`
--

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
  `vision` varchar(500) NOT NULL,
  `constitution` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_about`
--

INSERT INTO `gmsa_about` (`about_id`, `about_info`, `about_street1`, `about_street2`, `about_country`, `about_state`, `about_city`, `about_phone`, `about_email`, `about_phone2`, `about_fax`, `dues_for_fresher`, `dues_for_continue`, `ads`, `facebook`, `instagram`, `youtube`, `twitter`, `linkedin`, `signature`, `mission`, `vision`, `constitution`) VALUES
(1, '<p><strong>some changes</strong></p>\r\n<p><span style=\"background-color: #236fa1;\"> sunt</span> in culpa qui officia deserunt mollit anim id est laborum. tijani Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <strong>ullamco </strong>laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. wsf</p>', 'AF-0006-0091', 'FL 32904', 'ghana', 'upper east', 'navrongo', '+233 541 444 016', 'info@gmsacktutas.org', '+233 24 387 4525', '+1 234 567 89', 50.00, 40.00, 'assets/media/ads/670.jpg', 'https://www.facebook.com/gmsacktutas', 'https://instagram.com/gmsa', 'https://www.youtube.com/@gmsackt-utasofficial', 'https://x.com/cktgmsa?s=21', 'https://linkedin.com/gmsa', 'assets/media/signature/632.png', 'mission mission', 'vision vision', 'assets/media/constitution/GMSA-CK-TUTAS-CONSTITUTION.pdf');

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
(2, '3c43b406-0f4a-4b03-8283-d0fd29cbfaa4', 'football match', 'more fire', 'masjeed', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-12-31', '12:12:00', '2024-07-17 18:29:04', '2024-07-25 17:31:40', 0),
(3, '20efd7c7-477d-44a4-8935-c275c63b3b48', 'Clean up exercise', '', 'Campus masjid', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-17', '19:17:00', '2024-07-17 19:17:29', '2024-07-25 17:28:22', 0),
(4, 'd4dc1d79-b309-481b-91eb-4b5afbf16f54', 'GMSA week celebration', 'we go clean keep', 'CAMPUS', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2023-12-12', '12:12:00', '2024-07-25 00:19:22', '2024-07-25 17:29:06', 0),
(5, 'ec2fae11-9f0a-4fb4-b6ed-87b0550862e0', 'Moral lectures', '', 'Campus masjid', '9a4433b5-0bbb-489b-8f05-c858b3033e32', NULL, '2024-02-20', '19:00:00', '2024-07-25 17:30:49', NULL, 0);

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
(1, '9a4433b5-0bbb-489b-8f05-c858b3033e32', 'alhaji priest babson', 'admin@gmsa.org', '$2y$10$Ulapn21A.hse6h7oMqfPnuk/1Td.WYziGj3cSgEfrVVoN..M8Vuvi', 'assets/media/profiles/1867035382d71bd3643f4a9ec598bc7f.jpg', '2020-02-21 21:01:31', '2024-08-14 14:05:47', 'admin,finance,editor', 0),
(10, '0b760213-c37c-4f48-a3b3-71f3b444cbf5', 'ibrahim', 'ibrahim@gmsa.org', '$2y$10$7jeVH4AIvtfyXf5UMWvWjOXyPdIKKj4iZSsIbcht3mlqolPOZdAKW', NULL, '2024-07-21 18:08:09', NULL, 'editor', 0),
(13, '3f7c0136-647c-42ae-bf08-b74c3793822e', 'to delete', 'de@ede.com', '$2y$10$q/B1bgd/bxx4/JSILgY2z.Pp9d5sNPFTnFmKjS4AhOyEvOltVRRpq', NULL, '2024-07-25 00:20:11', NULL, 'editor', 1),
(14, '37e738d4-f3fd-4303-87a6-293da0789449', 'abdul kadr ali', 'kd.finance@gmsa.org', '$2y$10$sHXLjp6dqRyTUeBUe6Cw7uOpaN.B43X.H6NGDaT3GZ2ILT7UJCJ5S', NULL, '2024-07-26 16:59:13', NULL, 'finance', 0),
(15, '184bb888-39ec-4e79-ac51-6672d1c34df2', 'baba seidu', 'baba.patron@gmsa.org', '$2y$10$XXdLoPAgj.sgf8JVhvmEseAnuk65ql4azRJUFW/V7rfyp4arnMyrq', NULL, '2024-07-26 20:24:17', '2024-07-26 20:27:55', 'admin,patron,finance,editor', 0),
(16, 'ba0604fc-b547-4edb-a5a7-abe84f581927', 'bamba', 'bamba@gmsa.org', '$2y$10$TDn2Mhjv1kg26yxSjshEiuxlZkQdWVSMTqubJ10ZWKB/3x/O2nAEO', NULL, '2024-07-26 20:46:12', '2024-07-26 20:48:48', 'admin,finance,editor', 0);

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
(9, '2bab7adc-b5ef-446c-93d1-8680204e010a', 'fasting', 'fasting', '', '2024-07-19 08:09:23', NULL, 0),
(10, '41fadf7f-4fd4-41ec-af71-156db2658571', 'to edit', 'to-edit', '', '2024-07-25 00:28:15', '2024-07-25 00:28:35', 0);

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
(3, 'acb36be7-5ff7-4c9e-9e18-f861491c9ecd', 'Tijani Moro', 'moro@moro.com', '', 'wdqwdqw', '2024-07-14 18:23:40', NULL, 0),
(5, '45d84d06-e4b0-4f29-9b39-f4d2cd790755', 'Tijani Moro', 'moro@moro.com', '', 'wdqwdqw', '2024-07-14 18:23:51', NULL, 0),
(6, '11089b1f-fe7a-4419-a239-b7484f1e4445', 'Tijani Moro', 'moro@moro.com', '', 'wdqwdqw', '2024-07-14 18:23:54', NULL, 0),
(9, '453e8ada-799e-4c08-a276-0fe1ba16187a', 'Tijani Moro', 'moro@moro.com', '0233333', 'hi', '2024-07-21 11:22:57', NULL, 0),
(10, 'cdeb82c0-79a0-4ad1-809a-9b173719289d', 'wefw', 'moro@moro.com', 'wef', 'wfewf', '2024-07-25 01:46:10', NULL, 0),
(11, '24060cab-3bea-4820-855f-645ab4e68f3d', 'ewwe', 'wefwe@wefwef', 'wefwe', 'wefwef', '2024-07-25 01:55:01', NULL, 0),
(12, 'df9174f6-fb75-42ef-9251-7bf6a77daeba', 'ewfwe', 'wefwef@wewe.rdge', 'fsf', 'efwe', '2024-07-25 01:56:10', NULL, 0);

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
(2, 'ddc0fc02-cf4a-4f54-bc45-79604952c6b3', '', 'anony_1721561078@gmsadonation.org', '', 50.00, 'GMSA-DNT365787853', '2024-07-21 11:25:39', NULL, 0),
(3, '7d5d7635-f855-4b68-9eb7-0ffdbf2e6388', '', 'anony_1721872667@gmsadonation.org', '', 345.00, 'GMSA-DNT738006023', '2024-07-25 01:58:03', NULL, 0),
(4, 'dd4a0963-8f04-4f36-9a2d-d11040163266', '', 'anony_1721939609@gmsadonation.org', '', 20.00, 'GMSA-DNT705789212', '2024-07-25 20:34:02', NULL, 0),
(5, 'b37f6e7a-45e9-4bb7-b3d4-84eed8c73e39', '', 'anony_1722022509@gmsadonation.org', '', 22.00, 'GMSA-DNT-284127627', '2024-07-26 19:35:25', NULL, 0),
(6, '214fda25-ba4b-4cee-9db5-ddc15a841d0f', '', 'anony_1722022509@gmsadonation.org', '', 22.00, 'GMSA-DNT-98221867', '2024-07-26 19:35:50', NULL, 0),
(7, '87ecbca3-acde-4a88-b419-4971cbe1d2bd', '', 'anony_1722022509@gmsadonation.org', '', 22.00, 'GMSA-DNT-121804883', '2024-07-26 19:36:36', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_drive`
--

CREATE TABLE `gmsa_drive` (
  `id` bigint(20) NOT NULL,
  `drive_id` varchar(300) DEFAULT NULL,
  `drive_media` text DEFAULT NULL,
  `upload_by` varchar(300) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_drive`
--

INSERT INTO `gmsa_drive` (`id`, `drive_id`, `drive_media`, `upload_by`, `createdAt`, `updatedAt`, `status`) VALUES
(9, '8301b8fe-5994-4ea7-926e-b2000cef4efb', 'GMSA-CKTUTAS-DUES-ALL-SHEET-2024-07-25.xlsx', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:40:36', NULL, 0),
(10, '6e4b5648-3fd1-457e-a25c-5181bd17b291', '367419635_281723824615199_2305360953482039038_n.jpg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:40:48', NULL, 0),
(11, 'e44b2969-8bf7-4f46-8bc1-fed4c6eb5b6c', '367520057_134315863068109_1124571925964375254_n.jpg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:40:48', NULL, 0),
(12, '57b7e111-8657-4df3-b02c-c7ef25a5f59c', 'GMSA CKT-UTAS Constitution.pdf', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:41:08', NULL, 0);

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
(15, '0ca7584f-e0e0-4cd2-845a-f2fdbf5472eb', 'dfms/122/11', 'GMSA603611033', 'attempt', 10.00, '400', '2024-07-22 08:42:03', NULL, 0),
(16, '23009ede-d08f-4bd8-b5e8-f496d1e984ae', '20210404121212', 'GMSA566475407', 'attempt', 40.00, '100', '2024-07-25 02:06:04', NULL, 0),
(18, '0f7c7c2a-440e-47ad-94e8-eccfada47f78', '20210404212', 'GMSA751735011', 'attempt', 20.00, '100', '2024-07-26 14:38:35', NULL, 0),
(21, '8de9f60e-c565-4935-9666-c8aa90e6e0c9', '202102222', 'GMSA425744052', 'attempt', 40.00, '200', '2024-07-26 19:59:45', NULL, 0);

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
(5, 'e264345d-f9a5-43c8-8320-af411c965c69', '553861ad-ad13-4ef9-a7e8-7a3cd184df38', '79145dfa-f46c-4f05-b34e-e99077456769', '2024', '2025', '2024-07-21 23:35:59', NULL, 0),
(7, '2d0b1ac9-e5ed-4382-add8-93f5efb1596b', '404e9270-5432-49a6-a5e0-ae93d1bc1647', 'c30a606a-4131-4d96-906b-93d2e1392ae0', '2024', '2025', '2024-07-25 00:50:01', NULL, 0);

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
(12, 'assets/media/gallery/669bb54bc3891.png', '2024-07-20 13:02:03', NULL, 0),
(14, 'assets/media/gallery/66a1a207af4cf.jpg', '2024-07-25 00:53:27', NULL, 0),
(15, 'assets/media/gallery/66a2b8621055c.jpeg', '2024-07-25 20:41:06', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gmsa_logs`
--

CREATE TABLE `gmsa_logs` (
  `id` bigint(20) NOT NULL,
  `log_id` varchar(300) NOT NULL,
  `log_message` text NOT NULL,
  `log_from` varchar(300) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gmsa_logs`
--

INSERT INTO `gmsa_logs` (`id`, `log_id`, `log_message`, `log_from`, `createdAt`, `updatedAt`, `status`) VALUES
(1, '81a49028-92f4-4dc8-94e1-d0e297b89d7d', 'exported all executives data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:07:00', NULL, 0),
(2, 'f11ec80a-f169-4b88-b3d4-4b8fa141776c', 'exported all dues data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:08:05', NULL, 0),
(3, 'f23662c9-4287-43ea-afd2-341c9fc17d02', 'exported all dues data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:08:55', NULL, 0),
(4, '08a2139f-918e-44a2-8a17-cc3388a284d0', 'exported all donations data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:09:10', NULL, 0),
(5, '780062ab-0aa2-4c88-ac02-be5039e3b72e', 'exported all contacts data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:09:55', NULL, 0),
(6, '0652d914-3a97-40e8-9297-b30b67009934', 'exported all news data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:10:47', NULL, 0),
(7, 'b79908d0-9eea-430f-bdb7-719d2f043817', 'exported archive news data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:10:54', NULL, 0),
(8, '1a2df336-1d9b-4f76-a032-c8360b64269e', 'updating activity data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:14:35', NULL, 0),
(9, '3b48ecee-b68d-4126-ba17-9580407be02f', 'updating activity 3c43b406-0f4a-4b03-8283-d0fd29cbfaa4', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:16:49', NULL, 0),
(10, 'dc583d63-fbd0-417d-89ed-00577e79201f', 'adding activity with id d4dc1d79-b309-481b-91eb-4b5afbf16f54', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:19:22', NULL, 0),
(11, 'e280d355-bec7-48e7-a75c-cbba345171f4', 'added new admin To Delete as a EDITOR', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:20:11', NULL, 0),
(12, 'a74a17fc-c3de-4a72-960e-99944d60bbe4', 'deleted an admin with id 3f7c0136-647c-42ae-bf08-b74c3793822e', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:20:58', NULL, 0),
(13, '2d6df53e-361d-4d1a-854a-25a9544a9248', 'featured a post with id 769c9087-ac3c-49ea-a65a-7bd7876f49f6', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:27:43', NULL, 0),
(14, '564674f7-2806-49e4-bc00-09f6d4b0c570', 'un-featured a post with id 769c9087-ac3c-49ea-a65a-7bd7876f49f6', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:27:58', NULL, 0),
(15, 'ce563d8b-83f0-402a-9e7a-0d2ec57325d5', 'added category with id 41fadf7f-4fd4-41ec-af71-156db2658571', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:28:15', NULL, 0),
(16, 'fd57fa5e-4f9b-4c5a-8068-58e9c648cf65', 'updated category with id 41fadf7f-4fd4-41ec-af71-156db2658571', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:28:35', NULL, 0),
(17, '0df2e8e1-ff40-4c02-9f15-eaa859046c9f', 'updated a blog post with id 769c9087-ac3c-49ea-a65a-7bd7876f49f6', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:31:52', NULL, 0),
(18, '6ab6ec96-7cd7-444a-bd9a-6585f393b65b', 'deleted a post picture with id 769c9087-ac3c-49ea-a65a-7bd7876f49f6', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:32:15', NULL, 0),
(19, '09426c6b-81b5-40f2-b864-bfe7d49be495', 'updated a blog post with id 769c9087-ac3c-49ea-a65a-7bd7876f49f6', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:32:45', NULL, 0),
(20, '14f3a3d4-c6a0-46b9-92ad-214685227eb0', 'added a blog post with id a8782bdb-d2cd-491a-8252-09a789ecd081', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:33:16', NULL, 0),
(21, '93dc561e-7740-4a0f-a9d8-7ad681b4553b', 'changed password', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:34:42', NULL, 0),
(22, '02f67446-96c3-4a78-a12e-2ff330d986e7', 'updated site contact details', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:36:31', NULL, 0),
(23, '3b6503d9-1590-4c1d-95d5-f50d9f3b8dac', 'deleted a contact with id 87aa69c1-58cf-4671-9e62-9b90fc33146c', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:36:46', NULL, 0),
(24, 'ca459c05-543c-4b59-9798-5a1f30cd5417', 'created position with id 8ca495da-06da-44df-85f3-249147e58020', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:44:47', NULL, 0),
(25, 'e0315183-3747-4375-87bd-152bb42e7970', 'updated position with id 8ca495da-06da-44df-85f3-249147e58020', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:45:07', NULL, 0),
(26, '7c7dee60-2580-44c7-a62e-6db9a7bc48f8', 'deleted a position with id 8ca495da-06da-44df-85f3-249147e58020', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:45:22', NULL, 0),
(27, '5ce974ad-5665-44c6-a3b2-cc933729169b', 'added an executive with id a513fb97-6da2-462e-8640-db7b0de50f12', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:48:15', NULL, 0),
(28, 'a81e29a8-724f-4d23-a68c-a3c69bf06764', 'deleted an executive with id a513fb97-6da2-462e-8640-db7b0de50f12', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:49:21', NULL, 0),
(29, '57aa70df-8008-489e-b5d3-21255bb9da14', 'deleted an executive picture with id 404e9270-5432-49a6-a5e0-ae93d1bc1647 to upload new one', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:49:44', NULL, 0),
(30, 'ef81e79c-5175-4100-9624-cde6990ae8e9', 'added an executive with id 2d0b1ac9-e5ed-4382-add8-93f5efb1596b', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:50:01', NULL, 0),
(31, '0bc044e9-22a9-41d5-8018-85846d3a4f7c', 'uploaded gallery file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:53:27', NULL, 0),
(32, '49f9888c-c9d7-4d89-8bb0-94ddbabe4ba7', 'uploaded gallery file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:53:27', NULL, 0),
(33, '2336104c-956c-4c12-a269-b3e816eeac55', 'deleted a gallery file with id 13', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:53:49', NULL, 0),
(34, '1c3c1a3b-c297-4a70-b45a-253c29d5e33e', 'restored member with id e5b96834-9847-4906-a474-fea25f932aad', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:03:35', NULL, 0),
(35, '39a6dbe1-e289-4777-a883-61736f7d1803', 'temporary removed member with id 404e9270-5432-49a6-a5e0-ae93d1bc1647', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:03:47', NULL, 0),
(36, 'b3220e68-a7ee-4a91-ba01-2f58bdfda9ed', 'payer time updated with id 7cef1c69-2290-4ad9-81d4-8a4bc4aec72a', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:05:02', NULL, 0),
(37, '7e113d73-eede-42ef-840b-0cf2502d4d6c', 'payer time updated with id 7972cfe5-c6c3-40b6-8885-c3d9d7c91c2b', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:05:10', NULL, 0),
(38, '5f2e5c05-e11b-4ef8-af6c-a0b55046e2b3', 'updated about info', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:09:06', NULL, 0),
(39, '1466d8c1-93c3-4e33-8a8c-2365445a7e45', 'updated about mission and vision', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:09:18', NULL, 0),
(40, '9879e134-c7bb-4dd6-a494-15585e7cfc33', 'updated social media links', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:09:30', NULL, 0),
(41, '6d0cb028-acb9-4d25-a087-2afb08d46d12', 'created a subscriber with is df18ce0d-360b-4bfa-a9bf-fffc3cd54ae5', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:12:06', NULL, 0),
(42, '28a6b380-23eb-49c0-801a-b861d8d98c2a', 'deleted subscriber with is 21d7a420-8a28-4e59-8b34-896c2bf60c6e', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:12:31', NULL, 0),
(43, '21685fd9-eb19-43c6-813a-4b4919bab908', 'deleted profile picture', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:13:23', NULL, 0),
(44, '8e7673c9-0719-4211-bc1d-dec3af3d8719', 'uploaded admin profile picture', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:14:13', NULL, 0),
(45, '5f5d4808-4d84-4395-937b-868b3f6e6ee2', 'updated profile details with id 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:14:42', NULL, 0),
(46, 'c67e9f5d-fb45-46f3-93e4-93ace1280d1d', 'deleted ads media', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:16:59', NULL, 0),
(47, '9e7ea389-c651-4a7d-a7c9-33c7ebd3270a', 'upload ads media', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:17:13', NULL, 0),
(48, '74c57508-7dc8-40f0-b611-5f9277f41dd0', 'temporary uploaded news file 840.jpg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:20:53', NULL, 0),
(49, '00aeec80-3818-43dd-ba04-3fd4a50081de', 'temporary uploaded news file 244.jpg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:22:46', NULL, 0),
(50, '6caa8b7d-3385-43f3-8a08-376344e92534', 'temporary uploaded news file 636.jpg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:23:38', NULL, 0),
(51, '7881076f-2cdb-4fa9-a1a3-5015a423ed7d', 'deleted temporary uploaded file C:/xampp/htdocs/gmsa-cktutas/assets/media/temporary/636.jpg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:23:39', NULL, 0),
(52, 'e0f6f255-eb01-4d4d-87b3-f5068cbfcb9b', 'logged out admin ', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:25:32', NULL, 0),
(53, '46bcbf4d-65e3-408d-acac-e40c83c097a5', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:26:49', NULL, 0),
(54, 'f7842496-b185-4785-b80c-24ec6fb767c3', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:27:44', NULL, 0),
(55, '58e99266-050f-4d35-beec-7211a089708a', 'temporary uploaded member file 157.jpg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:29:51', NULL, 0),
(56, '0530efa8-6904-4d21-bce7-a7202edf4278', 'deleted temporary uploaded file C:/xampp/htdocs/gmsa-cktutas/assets/media/temporary/157.jpg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:30:07', NULL, 0),
(57, '5d69af33-918b-4843-a1f3-77be84c85a28', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:38:59', NULL, 0),
(58, 'f85c1c28-4367-4f3d-90de-a604a749ddff', 'logged in admin 0b760213-c37c-4f48-a3b3-71f3b444cbf5', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-25 01:39:10', NULL, 0),
(59, '18a0e818-f05e-4115-ad1b-46ad233a4cfd', 'updated site contact details', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-25 01:42:58', NULL, 0),
(60, '57a34251-0de2-47f8-9dd1-e64fffa7d2e5', 'logged out admin 0b760213-c37c-4f48-a3b3-71f3b444cbf5', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-25 01:43:58', NULL, 0),
(61, '1b593d4e-a0d0-4538-8082-9c7587c03757', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:44:11', NULL, 0),
(62, 'e2babb8d-2709-4031-8cbf-2f7098ae7729', 'Wefw contacted us with id cdeb82c0-79a0-4ad1-809a-9b173719289d', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 01:46:10', NULL, 0),
(63, '63cfabbf-c848-48a7-8603-d11977880615', 'Ewwe contacted us with id 24060cab-3bea-4820-855f-645ab4e68f3d', '154.160.16.225', '2024-07-25 01:55:01', NULL, 0),
(64, 'c50765a9-fec0-4986-bbfe-d01cbdf01714', 'Ewfwe contacted us with id df9174f6-fb75-42ef-9251-7bf6a77daeba', '154.160.16.225', '2024-07-25 01:56:10', NULL, 0),
(65, '9c76ffb9-11bf-494d-ac4e-61b633384b40', 'donation made with an amount ₵345.00 with id  7d5d7635-f855-4b68-9eb7-0ffdbf2e6388', '154.160.16.225', '2024-07-25 01:58:04', NULL, 0),
(66, '8b9d133a-4ed8-4a65-95a4-7bab87887c3e', 'added a subscriber with is 8593160a-3426-4313-98ab-adb34dcc8515', '154.160.16.225', '2024-07-25 01:59:04', NULL, 0),
(67, 'd37dbc2d-c31d-4aef-a511-ad063b413258', 'new member added with id 606f96fe-7463-4c43-91a3-baa3084dfb22', '154.160.16.225', '2024-07-25 02:02:30', NULL, 0),
(68, '3abb711b-3ad9-40c3-86ff-0300e702590c', 'dues payment made with amount of ₵40.00 with student id 20210404121212, reference codeGMSA566475407 and id 23009ede-d08f-4bd8-b5e8-f496d1e984ae', '154.160.16.225', '2024-07-25 02:06:06', NULL, 0),
(69, '4e93f677-d61c-41ac-982f-c0596d7c17e3', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 12:28:12', NULL, 0),
(70, '50fbff25-ac79-42fe-94d0-bc1292746f2f', 'uploaded sql media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 13:21:44', NULL, 0),
(71, '1edc3030-754e-4a4a-ae41-01ced55c6ba7', 'exported all dues data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 13:22:51', NULL, 0),
(72, '42e4ef2f-e8b0-4b89-b440-9e6dc9a93710', 'uploaded xlsx media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 13:27:10', NULL, 0),
(73, '5f05210f-77c4-4b18-b603-a61f4a800bef', 'uploaded docx media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 13:36:20', NULL, 0),
(74, '5c64706e-c6e1-43b6-adae-bbb973f5dd7b', 'uploaded jpg media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 14:46:40', NULL, 0),
(75, 'ac0b5813-1b00-40d6-ac5c-1ef13a5a2899', 'uploaded txt media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 14:53:21', NULL, 0),
(76, 'd632a877-2c21-46b4-a1dc-395082f851d2', 'deleted a gallery file with id 44', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 14:58:25', NULL, 0),
(77, '9dca33d9-2e8f-4870-ac13-4b6da0595d30', 'uploaded txt media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 14:59:00', NULL, 0),
(78, '1df9e94a-09b0-49a3-be2a-2fd3e57689ed', 'deleted a gallery file with id 44', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 14:59:17', NULL, 0),
(79, '71ab4ca1-75a5-4c2c-ac50-eec7bd017307', 'uploaded txt media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 14:59:40', NULL, 0),
(80, '2eb54c8d-2be0-4dce-9371-dd6953128788', 'deleted a gallery file with id cf95363a-faf3-4baf-973e-a21bdc333921', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 14:59:49', NULL, 0),
(81, 'ca04b29e-c850-4b98-9944-022428dd2efa', 'uploaded txt media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:00:34', NULL, 0),
(82, '754ea4e8-c992-4334-9c1a-93bc09687466', 'download a drive file ../../assets/media/drive/confirmation vhim.txt', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:36:32', NULL, 0),
(83, '8a513b9b-ff2d-4560-adfe-ba20a8c3bc82', 'download a drive file C:/xampp/htdocs/gmsa-cktutas/assets/media/drive/GMSA-CKTUTAS-DUES-ALL-SHEET-2024-07-25.xlsx', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:37:06', NULL, 0),
(84, '66e332f2-b74e-482a-b5fb-054139a533ee', 'deleted drive file with id 0bf94124-d5f5-4995-aee6-8a4bf80709de', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:39:47', NULL, 0),
(85, '1f728362-60ad-4749-b1f0-2e6feae6df98', 'deleted drive file with id 42ee8c18-3b3b-4679-9095-504025a41218', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:39:49', NULL, 0),
(86, 'ececf53b-f869-49a4-98de-638de11b0bbb', 'deleted drive file with id 3ec1abb7-4230-4141-8d21-094af7574452', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:39:51', NULL, 0),
(87, 'ebef67e4-abad-4456-b595-fd42f801f984', 'deleted drive file with id 1c818f76-1eaf-4b6f-ab56-7591d8ac7430', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:39:53', NULL, 0),
(88, '8a493bd3-35b9-4714-a171-eb95c1c0d73a', 'uploaded drive xlsx media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:40:36', NULL, 0),
(89, '2b1ebda6-71aa-490e-80a1-2262379847a1', 'uploaded drive jpg media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:40:48', NULL, 0),
(90, 'd75925cb-59a1-46e9-9e16-60c5c0b64d63', 'uploaded drive jpg media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:40:48', NULL, 0),
(91, 'ac596ff9-aaf0-4ea0-8b8f-9b040adcb8aa', 'uploaded drive pdf media file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 15:41:08', NULL, 0),
(92, '04a341bb-d3ec-48dd-aa58-affaffdfc4e1', 'featured a blog post with id a8782bdb-d2cd-491a-8252-09a789ecd081', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:09:50', NULL, 0),
(93, '961f8bdc-9da6-44d1-bf85-604901839470', 'featured a blog post with id 769c9087-ac3c-49ea-a65a-7bd7876f49f6', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:09:52', NULL, 0),
(94, '9bdb3785-717a-4b9e-b5aa-e846992fd81b', 'updated activity with id 20efd7c7-477d-44a4-8935-c275c63b3b48', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:28:22', NULL, 0),
(95, 'c0a475fb-24f5-43ea-b20b-2dcb38c22edd', 'updated activity with id d4dc1d79-b309-481b-91eb-4b5afbf16f54', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:29:06', NULL, 0),
(96, 'da592387-0d2a-4ad6-ac65-abf13b6bb8de', 'created activity with id ec2fae11-9f0a-4fb4-b6ed-87b0550862e0', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:30:49', NULL, 0),
(97, 'add5e8f6-9231-45c2-bcd9-cbab415fbaab', 'updated activity with id 3c43b406-0f4a-4b03-8283-d0fd29cbfaa4', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:31:40', NULL, 0),
(98, '60ef710d-8e52-4fd9-9dce-215cb7b6fff7', 'deleted a post picture with id a8782bdb-d2cd-491a-8252-09a789ecd081 to upload new one', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:43:14', NULL, 0),
(99, '29a324c5-e70b-43bb-8297-6b42312ac6ce', 'temporary uploaded news file 763.jpeg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:43:39', NULL, 0),
(100, '3e1355ca-43d0-4401-857a-a4996e7c0c6b', 'updated a blog post with id a8782bdb-d2cd-491a-8252-09a789ecd081', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:43:44', NULL, 0),
(101, '975a852e-3da7-4fd6-8adf-05c44a19511a', 'updated a blog post with id a8782bdb-d2cd-491a-8252-09a789ecd081', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:44:34', NULL, 0),
(102, 'f8b90cea-b6af-4046-88e8-05149d0b806c', 'deleted a post picture with id ef0b0ff0-5a19-4468-944a-3eb27d5eead8 to upload new one', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:44:55', NULL, 0),
(103, 'c7b7affb-0fd7-40db-9d1a-3e287b46a822', 'temporary uploaded news file 165.jpeg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:45:12', NULL, 0),
(104, 'd7675759-9668-463f-a998-1ace36fa3868', 'updated a blog post with id ef0b0ff0-5a19-4468-944a-3eb27d5eead8', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:45:15', NULL, 0),
(105, '6f47e353-f506-4df3-b593-e99f1e76c732', 'deleted a post picture with id 769c9087-ac3c-49ea-a65a-7bd7876f49f6 to upload new one', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:45:46', NULL, 0),
(106, '8bf510bd-219f-430b-80ad-5f2688ef1d81', 'temporary uploaded news file 746.jpeg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:46:21', NULL, 0),
(107, 'd1e9d1f4-360d-40bc-833a-bfa1ab5d1c1e', 'updated a blog post with id 769c9087-ac3c-49ea-a65a-7bd7876f49f6', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:46:24', NULL, 0),
(108, 'ff31f87b-e22c-4961-b202-f014f67754ed', 'deleted a post picture with id f8de02bb-24c2-4741-901d-0ed0c7484223 to upload new one', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:46:52', NULL, 0),
(109, 'b1bc22f9-3ecd-4458-bc9f-01447926c177', 'temporary uploaded news file 319.jpeg', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:47:13', NULL, 0),
(110, 'e5753408-a515-4183-adfa-3bc9814f09c9', 'updated a blog post with id f8de02bb-24c2-4741-901d-0ed0c7484223', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 17:47:17', NULL, 0),
(111, '731f52c7-ae87-4c14-b4ff-f6e65aeb52bf', 'restored a blog post with id c4d054ec-369e-471b-bfdd-c5b8e1062ed4', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 19:42:52', NULL, 0),
(112, 'f4f59f06-15b7-428a-9469-8a3dcabc98ea', 'deleted a blog post with id a8782bdb-d2cd-491a-8252-09a789ecd081', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 19:43:17', NULL, 0),
(113, '5881d3fa-e93a-4a83-a7d7-d23e57c1e3cd', 'restored a blog post with id a8782bdb-d2cd-491a-8252-09a789ecd081', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 19:43:29', NULL, 0),
(114, '4cc30cf2-c412-4687-82be-d3e571d4d535', 'deleted a blog post with id a8782bdb-d2cd-491a-8252-09a789ecd081', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 19:43:40', NULL, 0),
(115, 'e1de7ed0-77d7-4749-b2ca-e3b8dda7a7f3', 'restored a blog post with id a8782bdb-d2cd-491a-8252-09a789ecd081', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 19:44:01', NULL, 0),
(116, '975c8b6f-1cb6-4f00-90ef-0047f6a6046e', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 19:45:54', NULL, 0),
(117, '1b9ff9f3-f96f-47ad-9e9f-975be3e065c2', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 20:35:29', NULL, 0),
(118, '7967eff3-7ecd-4897-99cc-4802417aa5f7', 'uploaded gallery file(s)', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 20:41:06', NULL, 0),
(119, 'b2e089d4-0069-427d-bed4-a17051a7c497', 'updated about info', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 20:41:56', NULL, 0),
(120, '0fe391ac-e087-425c-90d1-1f4c0f3c6aae', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 20:46:41', NULL, 0),
(121, '9e293c2a-f3a1-4305-bf56-731a8c2ada2d', 'logged in admin 0b760213-c37c-4f48-a3b3-71f3b444cbf5', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-25 20:46:47', NULL, 0),
(122, 'bc9cbd3c-8684-458d-9bae-998029f328ed', 'logged out admin 0b760213-c37c-4f48-a3b3-71f3b444cbf5', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-25 20:47:27', NULL, 0),
(123, '85f9614a-b23b-422b-af67-31b0794ac59b', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 14:44:00', NULL, 0),
(124, '9a2e90cb-3083-4a5a-bc39-4b143e2d71c9', 'exported all members data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 14:46:37', NULL, 0),
(125, 'ad414aa3-f1bb-4ceb-8e39-ede5a0c56579', 'payer time updated with id 7cef1c69-2290-4ad9-81d4-8a4bc4aec72a', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 14:49:59', NULL, 0),
(126, 'eff4d052-a3d2-4037-978b-debb45a7fa09', 'deleted a gallery file with id 10', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 14:50:48', NULL, 0),
(127, '41aca2c1-462b-402c-8c59-e2940e051cd1', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 16:16:03', NULL, 0),
(128, 'b924bade-fa9b-4580-bd6a-97901554ec6a', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 16:16:11', NULL, 0),
(129, 'e5a42a40-661e-4ac6-9079-ab31789b5351', 'exported all logs data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 16:35:35', NULL, 0),
(130, 'f66fc8b9-ab8f-478e-b166-ac7227aa1e15', 'exported all logs data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 16:35:56', NULL, 0),
(131, '2143fc3d-d7ff-4e79-acd4-d4b642e2d6b1', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 16:57:27', NULL, 0),
(132, 'f3426351-3332-4344-b3f8-0896cc9e34af', 'logged in admin 0b760213-c37c-4f48-a3b3-71f3b444cbf5', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-26 16:57:42', NULL, 0),
(133, 'a5077b1a-47ec-4071-bfac-4eb1d00f9738', 'logged out admin 0b760213-c37c-4f48-a3b3-71f3b444cbf5', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-26 16:58:11', NULL, 0),
(134, '48d0e0db-340c-4e52-a432-c0ea9a458162', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 16:58:37', NULL, 0),
(135, 'bae636dd-5f12-4a5a-b626-560b06c0a3e9', 'created new admin Abdul Kadr Ali as an FINANCE', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 16:59:13', NULL, 0),
(136, 'f9b6ab2b-46ba-4e2e-8a4f-3bf1c0197c5b', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 16:59:18', NULL, 0),
(137, '547e7fa4-e75e-44f3-9193-97d7db7a5743', 'logged in admin 37e738d4-f3fd-4303-87a6-293da0789449', '37e738d4-f3fd-4303-87a6-293da0789449', '2024-07-26 16:59:24', NULL, 0),
(138, 'fc563b32-7da0-4616-8797-89ebc40b528d', 'logged out admin 37e738d4-f3fd-4303-87a6-293da0789449', '37e738d4-f3fd-4303-87a6-293da0789449', '2024-07-26 17:42:54', NULL, 0),
(139, 'c3e9d48d-5e71-4a4b-b55c-958c6d1e523a', 'logged in admin 0b760213-c37c-4f48-a3b3-71f3b444cbf5', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-26 17:43:14', NULL, 0),
(140, '8e41ac66-402c-41b8-a969-ee6d2263e7a0', 'logged out admin 0b760213-c37c-4f48-a3b3-71f3b444cbf5', '0b760213-c37c-4f48-a3b3-71f3b444cbf5', '2024-07-26 17:44:08', NULL, 0),
(141, '9a26a9ef-9329-4e99-9496-b0f9d3347cb6', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 17:44:22', NULL, 0),
(142, 'd47e90ce-b943-40b3-8d6d-d583ba8763dd', 'donation made with an amount of ₵22.00, reference id GMSA-DNT-121804883 and with id  87ecbca3-acde-4a88-b419-4971cbe1d2bd', '154.161.167.71', '2024-07-26 19:36:37', NULL, 0),
(143, 'ee79ac7a-10a5-492a-97fd-9e4f5b3e8b2a', 'dues payment made with amount of ₵10.00 with student id 202102222, reference code of GMSA529331468 and id 81871f52-b59a-477d-adee-aea95dd3ec08', '154.161.167.71', '2024-07-26 19:55:34', NULL, 0),
(144, '7cc32d31-897c-4d41-9728-c3be92d47517', 'dues payment made with amount of ₵30.00 with student id 202102222, reference code of GMSA564647375 and id 81c9925d-b6b7-402b-b248-dd5606e3586e', '154.161.167.71', '2024-07-26 19:57:59', NULL, 0),
(145, '3763d337-2365-4513-b30a-364e5acc07f1', 'dues payment made with amount of ₵40.00 with student id 202102222, reference code of GMSA425744052 and id 8de9f60e-c565-4935-9666-c8aa90e6e0c9', '154.161.167.71', '2024-07-26 19:59:46', NULL, 0),
(146, '35eb9a02-337f-46c3-86f9-6a4b3f7d4100', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 20:07:41', NULL, 0),
(147, 'da3164d1-a406-4ab0-b89c-85cc7adb941d', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 20:18:09', NULL, 0),
(148, 'fddb296e-231c-43c0-b7b4-18670f17ba2c', 'created new admin Baba Seidu as an ADMIN,PATRON,FINANCE,EDITOR', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 20:24:17', NULL, 0),
(149, '68221577-c3ae-4e2c-b186-e532c2c47c10', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 20:27:44', NULL, 0),
(150, 'd4b64aba-fe26-4ba7-88f2-b9d1b7fcc7a6', 'logged in admin 184bb888-39ec-4e79-ac51-6672d1c34df2', '184bb888-39ec-4e79-ac51-6672d1c34df2', '2024-07-26 20:27:55', NULL, 0),
(151, '6f8caf3e-f05e-4c61-b8ba-3236b2245412', 'exported all logs data', '184bb888-39ec-4e79-ac51-6672d1c34df2', '2024-07-26 20:37:38', NULL, 0),
(152, 'cfc58925-ff31-4f20-9dcc-5ebdc478e950', 'logged out admin 184bb888-39ec-4e79-ac51-6672d1c34df2', '184bb888-39ec-4e79-ac51-6672d1c34df2', '2024-07-26 20:38:27', NULL, 0),
(153, 'cfb56526-16b5-41e0-ad0f-f242d27fcc93', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 20:39:09', NULL, 0),
(154, 'd9c9c4a1-f368-4950-b089-84ed955fe4d2', 'exported all donations data', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 20:39:26', NULL, 0),
(155, 'febfdf7d-6187-4a5b-ade0-6285ce15e164', 'created new admin Bamba as an ADMIN,FINANCE,EDITOR', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 20:46:12', NULL, 0),
(156, '9b364774-2247-4641-a600-5ec22fda0bad', 'logged out admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 20:48:33', NULL, 0),
(157, 'ff025c7e-e438-4370-95ee-8853be81d7ef', 'logged in admin ba0604fc-b547-4edb-a5a7-abe84f581927', 'ba0604fc-b547-4edb-a5a7-abe84f581927', '2024-07-26 20:48:48', NULL, 0),
(158, '19a9632c-15df-40fd-939e-9155987403ff', 'logged out admin ba0604fc-b547-4edb-a5a7-abe84f581927', 'ba0604fc-b547-4edb-a5a7-abe84f581927', '2024-07-26 20:49:53', NULL, 0),
(159, '7acae84f-fa76-490c-9a14-e8a93a62e0e0', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-26 22:58:42', NULL, 0),
(160, 'e0084f71-46cd-43b6-a0bf-e2e5679e4870', 'logged in admin 9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 14:05:47', NULL, 0),
(161, 'ef40fb8e-b789-4769-b43c-1913630b4a24', 'update admin constitution', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-13 14:36:15', NULL, 0),
(162, 'cc376360-5db7-4aba-80f0-47994d0de33d', 'deleted constitution media', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 14:53:28', NULL, 0),
(163, '96c6796a-eb93-41ad-a052-706b0a78cc52', 'update admin constitution', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 14:54:03', NULL, 0),
(164, '5ceefd08-36c7-4360-80e4-3449e53bf62e', 'deleted constitution media', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 14:54:39', NULL, 0),
(165, '82831040-8374-4c9c-a021-d42e06f1ffd4', 'update admin constitution', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 14:55:11', NULL, 0),
(166, '83599d99-ea15-447a-b7a8-027a40508d4d', 'deleted constitution media', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 14:55:22', NULL, 0),
(167, '916a153f-ffe6-4382-baac-74a7103ebf6a', 'update admin constitution', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 14:59:59', NULL, 0),
(168, '1ddd7d2c-0ccc-4603-898e-65c025b5615b', 'deleted constitution media', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 15:00:02', NULL, 0),
(169, '6eeff853-873d-45bd-ae50-ede06732e7a6', 'update admin constitution', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-08-14 15:00:22', NULL, 0);

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
(3, 'e5b96834-9847-4906-a474-fea25f932aad', 'kadr', '', 'alhassan', 'kd@email.com', '0222', '', 'Male', '2024-12-31', '', '', '', '212121', 'cybers', 'cs', 'Diploma', 2020, NULL, 200, 'baba shehu', '02444444', NULL, 0, 'fc99f3c8cc20103fc80670ce737afd9b', '2024-07-20 23:06:04', NULL, 0),
(7, '404e9270-5432-49a6-a5e0-ae93d1bc1647', 'rauf', '', 'alhassan', 'kdi@email.com', '0222', '', 'Female', '2024-12-31', '', '', '', '21222', 'cybers', 'cs', 'Undergraduate', 2020, 'dollar', 200, 'baba shehu', '02444444', 'assets/media/members/47844be9bbeed2fc3eddf1b8e88585cb.jpg', 0, '7472188e7ddb3d43d87d0f1eaf49c95e', '2024-07-20 23:19:20', NULL, 1),
(8, '62f575c0-c5f3-4284-9fc6-dfccaffd9e0f', 'sheu', '', 'short', 'short@email.com', '0233333', '', 'Female', '2024-12-31', '', '', '', 'dfms/122/11', 'qwwe', 'cs', 'Diploma', 2020, 'dollar', 100, 'Tijani Moro', '02444444', NULL, 0, '9d222e8f34be1ccc4e888d93f6472bd0', '2024-07-22 08:33:39', NULL, 1),
(9, '606f96fe-7463-4c43-91a3-baa3084dfb22', 'kofi', 'ama', 'amoako', 'kofi@gmail.com', '024444', '', 'Male', '2024-12-31', '', '', '', '20210404121212', 'biochem', 'bc', 'Diploma', 2021, '', 200, 'Tijani Moro', '02444444', NULL, 0, 'f499d4e6e227c056b64d3ff2de70fa85', '2024-07-25 02:02:30', NULL, 0),
(10, 'c8814e70-bbdf-4f98-83ec-630b3b898a9c', 'issa', 'abdul', 'baaki', 'issa@gmail.com', '024451213', '', 'Male', '2000-12-12', 'greater accra', 'accra', '', '202102222', 'math with econs', 'IM', 'Undergraduate', 2021, 'santuary', 200, 'mama', '0244213121', NULL, 0, '849a725b3de8d7c9775b8092db1aa6ff', '2024-07-25 20:24:51', NULL, 0),
(11, '19d8fc5c-1b04-4973-a30d-bf5fe2c861ca', 'alhassa', '', 'aziz', 'alhassan@gmail.com', '0244512130', '', 'Male', '2000-07-01', '', '', '', '20210404212', 'Computer Science', 'Computer Science', 'Undergraduate', 2020, 'dolla', 100, 'ahmed abass', '0244512130', NULL, 0, '863511da74de1018902619afc333809d', '2024-07-26 14:34:34', NULL, 0);

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
(2, 'c4d054ec-369e-471b-bfdd-c5b8e1062ed4', 'rainfall is coming', 'rainfall-is-coming', '<p>we dddd</p>', 'assets/media/news/5f1b62a4db2d2115f3a19f248b297def.jpg', 'ec3cb14f-9c3d-47f7-be01-235cddbcfa69', 1, 1, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '1', '2024-07-17 08:45:51', '2024-07-25 19:42:52', 0),
(3, 'f8de02bb-24c2-4741-901d-0ed0c7484223', 'tomor madarasa', 'tomor-madarasa', '<p>come and le</p>', 'assets/media/news/da889f31373933560376aa44d77068f3.jpeg', '2a441d04-e52b-463d-8ebf-7c086b74986a', 37, 0, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-17 09:06:40', '2024-07-25 18:07:47', 0),
(4, 'ef0b0ff0-5a19-4468-944a-3eb27d5eead8', 'we don die moro', 'we-don-die-moro', '<p>hello there</p>', 'assets/media/news/6b5f873e480337cb03290ba05fcc0c37.jpeg', 'c7ac15ef-3b16-41a8-9677-6d188b398cfa', 20, 0, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-17 15:57:02', '2024-07-25 19:20:11', 0),
(5, '769c9087-ac3c-49ea-a65a-7bd7876f49f6', 'soccer competition', 'soccer-competition', '<p>we gone play ball die</p>', 'assets/media/news/b469f9cf4abfb59bc2bbd5d74d6bb2b0.jpeg', '9a12069f-67c5-444f-b788-4de1d045159d', 6, 1, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-18 16:54:59', '2024-07-25 17:47:46', 0),
(6, 'a8782bdb-d2cd-491a-8252-09a789ecd081', 'Moral lectures', 'moral-lectures', '<p>we go hunt die</p>', 'assets/media/news/dc6046d0ef7b84270e11d713a948fe7e.jpeg', 'ec3cb14f-9c3d-47f7-be01-235cddbcfa69', 0, 1, '9a4433b5-0bbb-489b-8f05-c858b3033e32', '9a4433b5-0bbb-489b-8f05-c858b3033e32', '2024-07-25 00:33:16', '2024-07-25 19:44:01', 0);

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
(1, '7cef1c69-2290-4ad9-81d4-8a4bc4aec72a', 'fajr', '04:50:00', '2024-07-15 15:16:49', '2024-07-26 14:49:58', 0),
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
(5, '25c3b05a-5789-433c-b7b0-d6e3a7ef53b9', 'tjhackx111@gmail.com', '2024-07-16 07:43:27', NULL, 0),
(8, 'df18ce0d-360b-4bfa-a9bf-fffc3cd54ae5', 'qwd@we.com', '2024-07-25 01:12:06', NULL, 0),
(9, '8593160a-3426-4313-98ab-adb34dcc8515', 'adfsd@ded.fgg', '2024-07-25 01:59:04', NULL, 0);

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
-- Indexes for table `gmsa_drive`
--
ALTER TABLE `gmsa_drive`
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
-- Indexes for table `gmsa_logs`
--
ALTER TABLE `gmsa_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createdAt` (`createdAt`),
  ADD KEY `log_status` (`status`),
  ADD KEY `log_admin` (`log_from`),
  ADD KEY `log_id` (`log_id`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gmsa_admin`
--
ALTER TABLE `gmsa_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gmsa_categories`
--
ALTER TABLE `gmsa_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gmsa_contacts`
--
ALTER TABLE `gmsa_contacts`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gmsa_donations`
--
ALTER TABLE `gmsa_donations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gmsa_drive`
--
ALTER TABLE `gmsa_drive`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gmsa_dues`
--
ALTER TABLE `gmsa_dues`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gmsa_executives`
--
ALTER TABLE `gmsa_executives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gmsa_logs`
--
ALTER TABLE `gmsa_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `gmsa_members`
--
ALTER TABLE `gmsa_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gmsa_news`
--
ALTER TABLE `gmsa_news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gmsa_positions`
--
ALTER TABLE `gmsa_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gmsa_prayer_time`
--
ALTER TABLE `gmsa_prayer_time`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gmsa_subscribers`
--
ALTER TABLE `gmsa_subscribers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gmsa_user_password_resets`
--
ALTER TABLE `gmsa_user_password_resets`
  MODIFY `password_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
