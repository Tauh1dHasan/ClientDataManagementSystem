-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2025 at 12:01 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumiveni_cdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `host_user_id` int(11) DEFAULT NULL,
  `visitor_user_id` int(11) DEFAULT NULL,
  `visitor_organization` varchar(255) DEFAULT NULL,
  `visitor_designation` varchar(255) DEFAULT NULL,
  `appointment_purpose` varchar(255) DEFAULT NULL,
  `purpose_describe` longtext DEFAULT NULL,
  `appointment_date` varchar(255) DEFAULT NULL,
  `appointment_time` varchar(255) DEFAULT NULL,
  `total_attendees_no` int(11) DEFAULT NULL,
  `reschedule_reason` longtext DEFAULT NULL,
  `canceled_by` int(11) DEFAULT NULL,
  `cancel_reason` longtext DEFAULT NULL,
  `appointment_status` int(11) DEFAULT NULL COMMENT '0=pending, 1=approved, 2=declined, 3=re-scheduled, 4=ongoing, 5=complete\r\n',
  `departure_time` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `visitor_photo` mediumtext DEFAULT NULL,
  `card_number` text DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `host_user_id`, `visitor_user_id`, `visitor_organization`, `visitor_designation`, `appointment_purpose`, `purpose_describe`, `appointment_date`, `appointment_time`, `total_attendees_no`, `reschedule_reason`, `canceled_by`, `cancel_reason`, `appointment_status`, `departure_time`, `created_by`, `visitor_photo`, `card_number`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 6, NULL, NULL, '11111111', '1111111111111111111111111111111111111111111111', '2023-05-03', '20:20', 11, '[{\"index\":1,\"reason\":\"sdasasdasdasdasds\",\"by\":1,\"date\":\"2023-02-16\",\"time\":\"12:12\"},{\"index\":2,\"reason\":\"fddfgdfdfgdf\",\"by\":1,\"date\":\"2023-02-08\",\"time\":\"15:15\"},{\"index\":3,\"reason\":\"dfgdfgdfg\",\"by\":1,\"date\":\"2023-02-28\",\"time\":\"05:05\"}]', NULL, NULL, 4, NULL, 1, NULL, '35453453453453454', 1, '2023-01-30 09:21:06', '2023-03-02 23:39:54'),
(32, 203, 6, NULL, NULL, '11111111', '1111111111111111111111111111111111111111111111', '2023-06-03', '20:20', 11, '[{\"index\":1,\"reason\":\"sdasasdasdasdasds\",\"by\":1,\"date\":\"2023-02-16\",\"time\":\"12:12\"},{\"index\":2,\"reason\":\"fddfgdfdfgdf\",\"by\":1,\"date\":\"2023-02-08\",\"time\":\"15:15\"},{\"index\":3,\"reason\":\"dfgdfgdfg\",\"by\":1,\"date\":\"2023-02-28\",\"time\":\"05:05\"}]', NULL, NULL, 0, NULL, 1, NULL, '35453453453453454', 1, '2023-01-30 09:21:06', '2023-03-02 23:39:54'),
(33, 203, 6, NULL, NULL, '11111111', '1111111111111111111111111111111111111111111111', '2023-07-03', '20:20', 11, '[{\"index\":1,\"reason\":\"sdasasdasdasdasds\",\"by\":1,\"date\":\"2023-02-16\",\"time\":\"12:12\"},{\"index\":2,\"reason\":\"fddfgdfdfgdf\",\"by\":1,\"date\":\"2023-02-08\",\"time\":\"15:15\"},{\"index\":3,\"reason\":\"dfgdfgdfg\",\"by\":1,\"date\":\"2023-02-28\",\"time\":\"05:05\"}]', NULL, NULL, 1, NULL, 1, NULL, '35453453453453454', 1, '2023-01-30 09:21:06', '2023-03-02 23:39:54'),
(34, 203, 6, NULL, NULL, '11111111', '1111111111111111111111111111111111111111111111', '2023-08-03', '20:20', 11, '[{\"index\":1,\"reason\":\"sdasasdasdasdasds\",\"by\":1,\"date\":\"2023-02-16\",\"time\":\"12:12\"},{\"index\":2,\"reason\":\"fddfgdfdfgdf\",\"by\":1,\"date\":\"2023-02-08\",\"time\":\"15:15\"},{\"index\":3,\"reason\":\"dfgdfgdfg\",\"by\":1,\"date\":\"2023-02-28\",\"time\":\"05:05\"}]', NULL, NULL, 2, NULL, 1, NULL, '35453453453453454', 1, '2023-01-30 09:21:06', '2023-03-02 23:39:54'),
(35, 203, 6, NULL, NULL, '11111111', '1111111111111111111111111111111111111111111111', '2023-09-03', '20:20', 11, '[{\"index\":1,\"reason\":\"sdasasdasdasdasds\",\"by\":1,\"date\":\"2023-02-16\",\"time\":\"12:12\"},{\"index\":2,\"reason\":\"fddfgdfdfgdf\",\"by\":1,\"date\":\"2023-02-08\",\"time\":\"15:15\"},{\"index\":3,\"reason\":\"dfgdfgdfg\",\"by\":1,\"date\":\"2023-02-28\",\"time\":\"05:05\"}]', NULL, NULL, 3, NULL, 1, NULL, '35453453453453454', 1, '2023-01-30 09:21:06', '2023-03-02 23:39:54'),
(36, 203, 6, NULL, NULL, '11111111', '1111111111111111111111111111111111111111111111', '2023-09-03', '20:20', 11, '[{\"index\":1,\"reason\":\"sdasasdasdasdasds\",\"by\":1,\"date\":\"2023-02-16\",\"time\":\"12:12\"},{\"index\":2,\"reason\":\"fddfgdfdfgdf\",\"by\":1,\"date\":\"2023-02-08\",\"time\":\"15:15\"},{\"index\":3,\"reason\":\"dfgdfgdfg\",\"by\":1,\"date\":\"2023-02-28\",\"time\":\"05:05\"}]', NULL, NULL, 5, NULL, 1, NULL, '35453453453453454', 1, '2023-01-30 09:21:06', '2023-03-02 23:39:54'),
(37, 203, 6, NULL, NULL, '11111111', '1111111111111111111111111111111111111111111111', '2023-09-03', '20:20', 11, '[{\"index\":1,\"reason\":\"sdasasdasdasdasds\",\"by\":1,\"date\":\"2023-02-16\",\"time\":\"12:12\"},{\"index\":2,\"reason\":\"fddfgdfdfgdf\",\"by\":1,\"date\":\"2023-02-08\",\"time\":\"15:15\"},{\"index\":3,\"reason\":\"dfgdfgdfg\",\"by\":1,\"date\":\"2023-02-28\",\"time\":\"05:05\"}]', NULL, NULL, 0, NULL, 1, NULL, '35453453453453454', 1, '2023-01-30 09:21:06', '2023-03-02 23:39:54'),
(38, 4, 6, 'Add org', 'Exicutive', 'Project Meeting', 'asdfasdfasdfasdf', '2023-09-07', '14:47', 5, NULL, NULL, NULL, 4, NULL, 1, 'visitor1693912027.png', '100', NULL, '2023-09-05 04:47:49', '2023-09-05 05:07:07'),
(39, 4, 203, 'Travis Keith Trading', 'Sit voluptatibus ame', 'asdfasdf', 'sadfasdfasdfasdf', '2023-09-08', '12:00', 10, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, '2023-09-05 06:55:59', '2023-09-05 06:55:59'),
(40, 4, 203, 'Travis Keith Trading', 'Sit voluptatibus ame', 'asdfasdf', 'sadfasdfasdfasdf', '2023-09-08', '12:00', 10, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, '2023-09-05 06:56:38', '2023-09-05 06:56:38'),
(41, 4, 203, 'Travis Keith Trading', 'Sit voluptatibus ame', 'sadfasdfsadf', 'asdfasdfasdfasdf', '2023-09-10', '12:00', 1, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, '2023-09-07 02:38:24', '2023-09-07 02:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `client_data`
--

CREATE TABLE `client_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_info_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=active, 2=block',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_data`
--

INSERT INTO `client_data` (`id`, `client_info_id`, `name`, `display_name`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 1, 'clientData2024_11_26_050953_41920598.pdf', 'NID card', NULL, 1, 208, 0, '2024-11-26 11:09:54', '2024-11-26 11:26:06'),
(7, 1, 'clientData2024_11_26_051159_26852148.doc', 'clientData2024_11_26_051159_26852148.doc', 'asdfasdf', 1, 208, 0, '2024-11-26 11:11:59', '2024-11-28 12:37:28'),
(8, 2, 'clientData2024_11_26_053204_71002735.jpg', 'clientData2024_11_26_053204_71002735.jpg', NULL, 1, 208, 0, '2024-11-26 11:32:04', '2024-11-26 11:32:04'),
(11, 3, 'clientData2024_11_26_053549_83587069.pdf', 'clientData2024_11_26_053549_83587069.pdf', NULL, 1, 208, NULL, '2024-11-26 11:35:49', '2024-11-26 11:35:49'),
(12, 4, 'clientData2024_11_26_072951_47898988.pdf', 'asdf', NULL, 1, 208, NULL, '2024-11-26 13:29:51', '2024-11-28 11:45:46'),
(13, 7, 'clientData2024_11_28_062949_91846785.jpg', 'clientData2024_11_28_062949_91846785.jpg', 'DOC EXP', 1, 208, NULL, '2024-11-28 12:29:49', '2024-11-28 12:51:12'),
(14, 8, 'clientData2024_11_29_083017_22849908.pdf', 'clientData2024_11_29_083017_22849908.pdf', NULL, 1, 208, NULL, '2024-11-29 14:30:17', '2024-11-29 14:30:17'),
(15, 9, 'clientData2024_11_29_084619_29490399.pdf', 'clientData2024_11_29_084619_29490399.pdf', NULL, 1, 208, NULL, '2024-11-29 14:46:19', '2024-11-29 14:46:19'),
(18, 11, 'temp_1732987609_674b4ad972e21.pdf', 'temp_1732987609_674b4ad972e21.pdf', NULL, 1, 208, NULL, '2024-11-30 11:26:55', '2024-11-30 11:26:55'),
(19, 12, 'temp_1732995886_674b6b2e904bc.pdf', 'temp_1732995886_674b6b2e904bc.pdf', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(20, 12, 'temp_1732995890_674b6b32676cd.pdf', 'temp_1732995890_674b6b32676cd.pdf', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(21, 12, 'temp_1732995947_674b6b6b661a8.jpg', 'temp_1732995947_674b6b6b661a8.jpg', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(22, 12, 'temp_1732995950_674b6b6eb98ab.jpg', 'temp_1732995950_674b6b6eb98ab.jpg', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(23, 12, 'temp_1732995953_674b6b716d27c.jpg', 'temp_1732995953_674b6b716d27c.jpg', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(24, 12, 'temp_1732995957_674b6b7535a87.jpg', 'temp_1732995957_674b6b7535a87.jpg', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(25, 12, 'temp_1732995959_674b6b775c9eb.jpg', 'temp_1732995959_674b6b775c9eb.jpg', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(26, 12, 'temp_1732996509_674b6d9d8be8b.jpg', 'temp_1732996509_674b6d9d8be8b.jpg', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(27, 12, 'temp_1732996510_674b6d9e2e05b.jpg', 'temp_1732996510_674b6d9e2e05b.jpg', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(28, 12, 'temp_1732996510_674b6d9e2ec39.jpg', 'temp_1732996510_674b6d9e2ec39.jpg', NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(29, 13, 'temp_1732996667_674b6e3ba47ea.jpg', 'temp_1732996667_674b6e3ba47ea.jpg', NULL, 1, 208, NULL, '2024-11-30 13:58:07', '2024-11-30 13:58:07'),
(30, 13, 'temp_1732996671_674b6e3faa83d.pdf', 'temp_1732996671_674b6e3faa83d.pdf', NULL, 1, 208, NULL, '2024-11-30 13:58:07', '2024-11-30 13:58:07'),
(31, 13, 'temp_1732996674_674b6e4252f5c.pdf', 'temp_1732996674_674b6e4252f5c.pdf', NULL, 1, 208, NULL, '2024-11-30 13:58:07', '2024-11-30 13:58:07'),
(32, 13, 'temp_1732996677_674b6e45ba7f8.pdf', 'temp_1732996677_674b6e45ba7f8.pdf', NULL, 1, 208, NULL, '2024-11-30 13:58:07', '2024-11-30 13:58:07'),
(33, 13, 'temp_1732996680_674b6e487316a.pdf', 'temp_1732996680_674b6e487316a.pdf', NULL, 1, 208, NULL, '2024-11-30 13:58:07', '2024-11-30 13:58:07'),
(34, 13, 'temp_1732996682_674b6e4ace605.pdf', 'temp_1732996682_674b6e4ace605.pdf', NULL, 1, 208, NULL, '2024-11-30 13:58:07', '2024-11-30 13:58:07'),
(35, 14, 'temp_1732996910_674b6f2ed3a38.jpg', 'temp_1732996910_674b6f2ed3a38.jpg', NULL, 1, 208, NULL, '2024-11-30 14:01:58', '2024-11-30 14:01:58'),
(36, 14, 'temp_1732996910_674b6f2ed3a55.jpg', 'temp_1732996910_674b6f2ed3a55.jpg', NULL, 1, 208, NULL, '2024-11-30 14:01:58', '2024-11-30 14:01:58'),
(37, 14, 'temp_1732996911_674b6f2fc473a.jpg', 'temp_1732996911_674b6f2fc473a.jpg', NULL, 1, 208, NULL, '2024-11-30 14:01:58', '2024-11-30 14:01:58'),
(38, 14, 'temp_1732996911_674b6f2fd6338.jpg', 'temp_1732996911_674b6f2fd6338.jpg', NULL, 1, 208, NULL, '2024-11-30 14:01:58', '2024-11-30 14:01:58'),
(39, 14, 'temp_1732996912_674b6f309426b.jpg', 'temp_1732996912_674b6f309426b.jpg', NULL, 1, 208, NULL, '2024-11-30 14:01:58', '2024-11-30 14:01:58'),
(40, 14, 'temp_1732996912_674b6f30b4cd7.jpg', 'temp_1732996912_674b6f30b4cd7.jpg', NULL, 1, 208, NULL, '2024-11-30 14:01:58', '2024-11-30 14:01:58'),
(41, 2, 'clientData2024_11_30_080415_74307992.pdf', 'PATENTA WORD', 'PATENTE WORD', 1, 208, NULL, '2024-11-30 14:04:15', '2025-02-13 04:12:34'),
(42, 18, 'temp_1733419327_6751e13fcfa24.jpeg', 'temp_1733419327_6751e13fcfa24.jpeg', NULL, 1, 208, NULL, '2024-12-05 11:22:24', '2024-12-05 11:22:24'),
(43, 18, 'temp_1733419327_6751e13fd3a05.jpeg', 'temp_1733419327_6751e13fd3a05.jpeg', NULL, 1, 208, NULL, '2024-12-05 11:22:24', '2024-12-05 11:22:24'),
(44, 18, 'temp_1733419328_6751e14081cd3.jpeg', 'temp_1733419328_6751e14081cd3.jpeg', NULL, 1, 208, NULL, '2024-12-05 11:22:24', '2024-12-05 11:22:24'),
(45, 18, 'temp_1733419328_6751e140ad4aa.jpeg', 'temp_1733419328_6751e140ad4aa.jpeg', NULL, 1, 208, NULL, '2024-12-05 11:22:24', '2024-12-05 11:22:24'),
(46, 18, 'temp_1733419329_6751e1413c4fc.jpeg', 'temp_1733419329_6751e1413c4fc.jpeg', NULL, 1, 208, NULL, '2024-12-05 11:22:24', '2024-12-05 11:22:24'),
(47, 18, 'temp_1733419329_6751e14158f2f.jpeg', 'temp_1733419329_6751e14158f2f.jpeg', NULL, 1, 208, NULL, '2024-12-05 11:22:24', '2024-12-05 11:22:24'),
(48, 18, 'temp_1733419329_6751e141c8e01.jpeg', 'temp_1733419329_6751e141c8e01.jpeg', NULL, 1, 208, NULL, '2024-12-05 11:22:24', '2024-12-05 11:22:24'),
(49, 19, 'temp_1733426442_6751fd0ae0942.jpg', 'temp_1733426442_6751fd0ae0942.jpg', NULL, 1, 208, NULL, '2024-12-05 13:22:24', '2024-12-05 13:22:24'),
(50, 19, 'temp_1733426446_6751fd0ed7349.jpg', 'temp_1733426446_6751fd0ed7349.jpg', NULL, 1, 208, NULL, '2024-12-05 13:22:24', '2024-12-05 13:22:24'),
(51, 19, 'temp_1733426457_6751fd19d5268.jpg', 'temp_1733426457_6751fd19d5268.jpg', NULL, 1, 208, NULL, '2024-12-05 13:22:24', '2024-12-05 13:22:24'),
(52, 20, 'temp_1733426882_6751fec2c2d9c.pdf', 'temp_1733426882_6751fec2c2d9c.pdf', NULL, 1, 208, NULL, '2024-12-05 13:30:09', '2024-12-05 13:30:09'),
(53, 20, 'temp_1733426887_6751fec79f70f.pdf', 'temp_1733426887_6751fec79f70f.pdf', NULL, 1, 208, NULL, '2024-12-05 13:30:09', '2024-12-05 13:30:09'),
(54, 20, 'temp_1733426956_6751ff0c7e350.pdf', 'temp_1733426956_6751ff0c7e350.pdf', NULL, 1, 208, NULL, '2024-12-05 13:30:09', '2024-12-05 13:30:09'),
(55, 20, 'temp_1733426962_6751ff1282837.pdf', 'temp_1733426962_6751ff1282837.pdf', NULL, 1, 208, NULL, '2024-12-05 13:30:09', '2024-12-05 13:30:09'),
(56, 21, 'clientData2024_12_06_113745_62334290.jpg', 'clientData2024_12_06_113745_62334290.jpg', NULL, 1, 208, NULL, '2024-12-06 05:37:45', '2024-12-06 05:37:45'),
(57, 6, 'clientData2024_12_06_114214_94934974.pdf', 'clientData2024_12_06_114214_94934974.pdf', NULL, 1, 208, NULL, '2024-12-06 05:42:14', '2024-12-06 05:42:14'),
(58, 2, 'clientData2024_12_06_064317_23810599.jpg', 'qr code', 'bithi', 1, 208, NULL, '2024-12-06 12:43:17', '2024-12-06 12:43:54'),
(59, 22, 'clientData2024_12_06_091625_63434458.pdf', 'clientData2024_12_06_091625_63434458.pdf', NULL, 1, 208, NULL, '2024-12-06 15:16:25', '2024-12-06 15:16:25'),
(60, 22, 'clientData2024_12_06_091727_80585822.pdf', 'clientData2024_12_06_091727_80585822.pdf', NULL, 1, 208, NULL, '2024-12-06 15:17:27', '2024-12-06 15:17:27'),
(61, 23, 'temp_1733768735_6757361f68bd7.jpg', 'temp_1733768735_6757361f68bd7.jpg', NULL, 1, 208, NULL, '2024-12-09 12:26:21', '2024-12-09 12:26:21'),
(62, 23, 'temp_1733768740_67573624d6d63.jpg', 'temp_1733768740_67573624d6d63.jpg', NULL, 1, 208, NULL, '2024-12-09 12:26:21', '2024-12-09 12:26:21'),
(63, 23, 'temp_1733768744_67573628a9d68.jpg', 'temp_1733768744_67573628a9d68.jpg', NULL, 1, 208, NULL, '2024-12-09 12:26:21', '2024-12-09 12:26:21'),
(64, 23, 'temp_1733768751_6757362f8841c.jpg', 'temp_1733768751_6757362f8841c.jpg', NULL, 1, 208, NULL, '2024-12-09 12:26:21', '2024-12-09 12:26:21'),
(65, 6, 'clientData2024_12_09_065149_26687622.pdf', 'clientData2024_12_09_065149_26687622.pdf', NULL, 1, 208, NULL, '2024-12-09 12:51:49', '2024-12-09 12:51:49'),
(66, 24, 'temp_1733774782_67574dbe16b17.jpg', 'temp_1733774782_67574dbe16b17.jpg', NULL, 1, 208, NULL, '2024-12-09 14:09:14', '2024-12-09 14:09:14'),
(67, 24, 'temp_1733774812_67574ddc6abf5.jpg', 'temp_1733774812_67574ddc6abf5.jpg', NULL, 1, 208, NULL, '2024-12-09 14:09:14', '2024-12-09 14:09:14'),
(68, 24, 'temp_1733774827_67574deba72b8.pdf', 'temp_1733774827_67574deba72b8.pdf', NULL, 1, 208, NULL, '2024-12-09 14:09:14', '2024-12-09 14:09:14'),
(69, 25, 'temp_1733829574_675823c6ba61e.pdf', 'temp_1733829574_675823c6ba61e.pdf', NULL, 1, 208, NULL, '2024-12-10 05:21:04', '2024-12-10 05:21:04'),
(70, 26, 'temp_1733830029_6758258d063eb.pdf', 'temp_1733830029_6758258d063eb.pdf', NULL, 1, 208, NULL, '2024-12-10 05:27:42', '2024-12-10 05:27:42'),
(71, 26, 'clientData2024_12_10_112820_64828666.pdf', 'clientData2024_12_10_112820_64828666.pdf', NULL, 1, 208, NULL, '2024-12-10 05:28:20', '2024-12-10 05:28:20'),
(72, 27, 'clientData2024_12_10_114419_21226064.pdf', 'clientData2024_12_10_114419_21226064.pdf', NULL, 1, 208, NULL, '2024-12-10 05:44:19', '2024-12-10 05:44:19'),
(73, 27, 'clientData2024_12_10_114457_87761139.pdf', 'clientData2024_12_10_114457_87761139.pdf', NULL, 1, 208, NULL, '2024-12-10 05:44:57', '2024-12-10 05:44:57'),
(74, 28, 'temp_1733831246_67582a4e2db28.pdf', 'temp_1733831246_67582a4e2db28.pdf', NULL, 1, 208, NULL, '2024-12-10 05:48:55', '2024-12-10 05:48:55'),
(75, 2, 'clientData2025_02_13_090918_64408774.pdf', 'CA, TESSERA SENITARIA', NULL, 1, 208, NULL, '2025-02-13 03:09:18', '2025-02-13 04:11:47'),
(76, 2, 'clientData2025_02_13_101053_39931238.pdf', 'CASA 27', NULL, 1, 208, NULL, '2025-02-13 04:10:53', '2025-02-13 04:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `client_infos`
--

CREATE TABLE `client_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=active, 2=block',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_infos`
--

INSERT INTO `client_infos` (`id`, `first_name`, `last_name`, `photo`, `email`, `mobile`, `birth_place`, `date_of_birth`, `nid`, `address`, `notes`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Genevieve Mcdanielasdfsadf', NULL, 'clientImages2024_11_23_051611_65187600.png', 'mymefe@mailinator.com', '2351541651561', NULL, NULL, '684', 'Nobis hic ea sed ips', 'Facilis itaque tenet', 1, 1, 1, '2024-11-23 11:16:11', '2024-11-23 12:27:41'),
(2, 'MA', 'RUMAN', 'clientImages2024_11_28_071235_45177187.jpg', 'rumivenice@gmail.com', '3297645287', 'DHAKA', '1986-12-07', 'RMNMAX86L19Z249A', 'VIA GIUSEPPE ZAMBELLI 27, VE 30175', 'NOTE', 1, 208, 208, '2024-11-26 11:32:04', '2025-02-13 03:10:00'),
(3, 'MD MASUD', 'MIAH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 208, 208, '2024-11-26 11:35:49', '2024-11-30 11:18:55'),
(4, 'MOLLA SAGOR  11/07/1980', NULL, NULL, 'sogormolla505@gmail.com', '00393455363380', NULL, NULL, 'MLLSGR80L11Z249G', 'VIA L PASINI 20 VENEZIA MARGHERA VE 30175 - Marghera Venezia', NULL, 1, 208, NULL, '2024-11-26 13:29:51', '2024-11-26 13:29:51'),
(6, 'SHAHAJAHAN HAQ', 'rasel selina', 'clientImages2024_11_28_053522_89973173.jpg', 'shahajahanhaq@gmail.com', '3276741977', NULL, '1982-01-01', NULL, 'PIAZZA DEL MUNICIPIO 19', NULL, 1, 209, 208, '2024-11-28 11:35:22', '2024-12-06 05:41:15'),
(7, 'KIBRIAH MIAH', NULL, NULL, 'AIMAD5794@GMAIL.COM', '3511787181', NULL, '2000-12-02', NULL, NULL, 'note O1', 1, 208, 208, '2024-11-28 12:29:49', '2024-11-28 12:50:31'),
(8, 'SHAHIDUL BARI RAZA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Account Name: Zahidul Alam Account No. : 1507202164697001 Bank : Brac Bank Branch: Banani Routing No. : 060260435 PH.  01911557733', 1, 208, 208, '2024-11-29 14:30:17', '2024-11-29 14:32:33'),
(9, 'MD MATIBER RIAS', NULL, NULL, NULL, '389075917', NULL, '1997-01-01', NULL, NULL, NULL, 1, 208, NULL, '2024-11-29 14:46:19', '2024-11-29 14:46:19'),
(11, 'IMRAN', 'HOSSEN', NULL, 'IMRANHOSSEN2061998@GMAIL.COM', '3805945339', NULL, '1998-02-01', NULL, NULL, NULL, 1, 208, NULL, '2024-11-30 11:26:55', '2024-11-30 11:26:55'),
(12, 'RAFIQUL', 'HASAN', NULL, NULL, '3888290535', NULL, NULL, NULL, NULL, NULL, 1, 208, NULL, '2024-11-30 13:55:10', '2024-11-30 13:55:10'),
(13, 'SHAWN', 'BAPARI', NULL, NULL, '3890451313', NULL, '1996-04-01', 'BPRSWN96A04Z249M', NULL, NULL, 1, 208, NULL, '2024-11-30 13:58:07', '2024-11-30 13:58:07'),
(14, 'FORHAD', 'MIRIDHA', NULL, NULL, '3274785325', NULL, '1998-02-05', 'MRDFHD98E02Z249J', NULL, NULL, 1, 208, NULL, '2024-11-30 14:01:58', '2024-11-30 14:01:58'),
(15, 'BOYAI  NOR', 'ALOM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 208, NULL, '2024-11-30 14:10:06', '2024-11-30 14:10:06'),
(16, 'omar', 'faruk', 'clientImages_1733414139_6751ccfbf32e0.jpeg', 'faruktalukder157@gmail.com', '3930285355', NULL, '1983-10-12', NULL, 'Via Equilio, Marghera (VE)', NULL, 1, 208, 208, '2024-12-05 09:55:40', '2024-12-05 09:57:41'),
(17, 'mizanur', 'rahman', 'clientImages_1733414860_6751cfccacb71.jpeg', 'shaikhmijan290@gmail.com', '3312318026', NULL, '1978-02-12', NULL, 'via delle muneghe 54, mestre', NULL, 1, 208, NULL, '2024-12-05 10:07:40', '2024-12-05 10:07:40'),
(18, 'RASEL', 'MIAH', 'clientImages_1733419344_6751e15024b03.jpeg', 'RASELMIAH5046@GMAIL.COM', '3665478566', NULL, '1993-02-01', 'MHIRSL93S20Z249W', 'VIA TORINO, 28 MESTRE VE 30173', NULL, 1, 208, 208, '2024-12-05 11:22:24', '2024-12-05 11:34:44'),
(19, 'abu', 'jahed', NULL, NULL, '3298550288', NULL, NULL, NULL, NULL, NULL, 1, 208, NULL, '2024-12-05 13:22:24', '2024-12-05 13:22:24'),
(20, 'mohammed', 'mizanor', NULL, NULL, '3883609070', NULL, NULL, NULL, NULL, NULL, 1, 208, NULL, '2024-12-05 13:30:09', '2024-12-05 13:30:09'),
(21, 'asian group', 'md tanvir hasan', NULL, NULL, '3533166561', NULL, NULL, NULL, NULL, '3533076673 ,  01945054142', 1, 208, 208, '2024-12-06 05:35:33', '2024-12-06 05:39:55'),
(22, 'LOVLU', 'MOLLA', NULL, NULL, '3311889288', NULL, NULL, NULL, NULL, NULL, 1, 208, NULL, '2024-12-06 15:14:45', '2024-12-06 15:14:45'),
(23, 'MD SHANTA ISLAM', 'OLI', 'clientImages_1733768781_6757364d2d2c2.jpg', NULL, '3477770259', 'CUMILLA', '2001-12-11', 'LOIMSH01S18Z249B', NULL, NULL, 1, 208, NULL, '2024-12-09 12:26:21', '2024-12-09 12:26:21'),
(24, 'MD NIKKON', 'MOLLA', NULL, NULL, '393479505706', NULL, NULL, NULL, NULL, NULL, 1, 208, NULL, '2024-12-09 14:09:14', '2024-12-09 14:09:14'),
(25, 'mohammed emran', 'hossain', NULL, NULL, NULL, 'dhaka', '1980-01-11', NULL, NULL, 'pp. n. EM0598375', 1, 208, NULL, '2024-12-10 05:21:04', '2024-12-10 05:21:04'),
(26, 'JAHANARA AKTER', 'JOTY', NULL, 'RIPONBT@GMAIL.COM', '3276769508', NULL, '1997-04-09', NULL, 'VIA PIETRO ZERMAN N. 3/8, MARGHERA', NULL, 1, 208, NULL, '2024-12-10 05:27:42', '2024-12-10 05:27:42'),
(27, 'MD', 'ALAMIN', NULL, 'MDALAMIN3888283057@GMAIL.COM', '3512767178', NULL, '1992-12-02', 'LMNMDX92B15Z249O', 'VIA FERRERA 22/8/4, MARGERA 30176', NULL, 1, 208, NULL, '2024-12-10 05:43:54', '2024-12-10 05:43:54'),
(28, 'NAJMUL', 'ISLAM', NULL, NULL, NULL, NULL, '2001-03-02', NULL, NULL, NULL, 1, 208, NULL, '2024-12-10 05:48:55', '2024-12-10 05:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=inactive 1=active',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'New Department', 1, 1, '2023-08-24 07:17:42', '2023-08-29 01:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wing_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `wing_id`, `division_id`, `office_id`, `department_id`, `name_bn`, `name_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'সহকারী কর্মকর্তা', 'Assistant Officer', 1, 1, 1, '2022-01-25 05:58:04', '2022-02-09 02:20:36'),
(2, NULL, NULL, NULL, NULL, 'মার্কেটিং অফিসার', 'Marketing officer', 1, 1, NULL, '2022-02-09 02:21:24', '2022-02-09 02:21:24'),
(3, NULL, NULL, NULL, NULL, 'মহাপরিচালক (রুটিন দায়িত্ব)', 'Director General (Routine Responsibilities)', 1, 1, NULL, '2022-02-14 23:13:47', '2022-02-14 23:13:47'),
(4, NULL, NULL, NULL, NULL, 'পরিচালক (পিটিসি)', 'Director', 1, 1, NULL, '2022-02-14 23:14:38', '2022-02-14 23:14:38'),
(5, NULL, NULL, NULL, NULL, 'পরিচালক (জুট টেক্সটাইল উইং) (চলতি দায়িত্ব)', 'Director (Jute Textile Wing) (Current Responsibilities)', 1, 1, NULL, '2022-02-14 23:16:15', '2022-02-14 23:16:15'),
(6, NULL, NULL, NULL, NULL, 'পরিচালক (কারিগরি উইং) (চলতি দায়িত্ব)', 'Director (Technical Wing) (Current Responsibilities)', 1, 1, NULL, '2022-02-14 23:17:24', '2022-02-14 23:17:24'),
(7, NULL, NULL, NULL, NULL, 'পরিচালক (কৃষি উইং) (চলতি দায়িত্ব)', 'Director (Agriculture Wing) (Current Responsibilities)', 1, 1, NULL, '2022-02-14 23:18:11', '2022-02-14 23:18:11'),
(8, NULL, NULL, NULL, NULL, 'মূখ্য বৈজ্ঞানিক কর্মকর্তা', 'Chief Scientific Officer', 1, 1, NULL, '2022-02-14 23:18:56', '2022-02-14 23:18:56'),
(9, NULL, NULL, NULL, NULL, 'প্রধান বৈজ্ঞানিক কর্মকর্তা', 'Chief Scientific Officer', 1, 1, NULL, '2022-02-14 23:20:20', '2022-02-14 23:20:20'),
(10, NULL, NULL, NULL, NULL, 'পরিচালক (প্রশাসন ও অর্থ)', 'Director (Administration & Finance)', 1, 1, NULL, '2022-02-14 23:21:06', '2022-02-14 23:21:06'),
(11, NULL, NULL, NULL, NULL, 'মূখ্য বৈজ্ঞানিক কর্মকর্তা (রুটিন দায়িত্ব)', 'Chief Scientific Officer (Routine Responsibilities)', 1, 1, NULL, '2022-02-14 23:22:04', '2022-02-14 23:22:04'),
(12, NULL, NULL, NULL, NULL, 'সিস্টেম এনালিস্ট', 'System Analyst', 1, 1, NULL, '2022-02-14 23:23:03', '2022-02-14 23:23:03'),
(13, NULL, NULL, NULL, NULL, 'প্রোগ্রামার', 'Programmer', 1, 1, NULL, '2022-02-14 23:24:16', '2022-02-14 23:24:16'),
(14, NULL, NULL, NULL, NULL, 'ঊর্ধ্বতন বৈজ্ঞানিক কর্মকর্তা', 'Senior Scientific Officer', 1, 1, NULL, '2022-02-14 23:25:00', '2022-02-14 23:25:00'),
(15, NULL, NULL, NULL, NULL, 'উপ পরিচালক (প্রশাসন) (চলতি দায়িত্ব)', 'Deputy Director (Administration) (Current Responsibilities)', 1, 1, NULL, '2022-02-14 23:25:57', '2022-02-14 23:25:57'),
(16, NULL, NULL, NULL, NULL, 'সহকারী পরিচালক (সংস্থাপন)', 'Assistant Director (Establishment)', 1, 1, NULL, '2022-02-14 23:27:31', '2022-02-14 23:27:31'),
(17, NULL, NULL, NULL, NULL, 'বৈজ্ঞানিক কর্মকর্তা', 'Scientific officer', 1, 1, NULL, '2022-02-14 23:30:06', '2022-02-14 23:30:06'),
(18, NULL, NULL, NULL, NULL, 'সহকারী প্রকৌশলী', 'Assistant Engineer', 1, 1, NULL, '2022-02-14 23:31:21', '2022-02-14 23:31:21'),
(19, NULL, NULL, NULL, NULL, 'উপ-সহকারী প্রকৌশলী', 'Deputy Assistant Engineer', 1, 1, NULL, '2022-02-14 23:32:18', '2022-02-14 23:32:18'),
(20, NULL, NULL, NULL, NULL, 'উপ-সহকারী পরিচালক', 'Deputy Assistant Director', 1, 2, NULL, '2022-09-08 06:48:27', '2022-09-08 06:48:27'),
(21, NULL, NULL, NULL, NULL, 'সহকারী পরিচালক', 'Assistant Director', 1, 2, NULL, '2022-09-08 07:01:03', '2022-09-08 07:01:03'),
(22, NULL, NULL, NULL, NULL, 'সিনিয়র সহকারী পরিচালক', 'Senior Assistant Director', 1, 2, NULL, '2022-09-08 07:03:16', '2022-09-08 07:03:16'),
(23, NULL, NULL, NULL, NULL, 'সিনিয়র সহকারী পরিচালক', 'Senior Assistant Director', 1, 1, NULL, '2023-01-23 08:54:16', '2023-01-23 08:54:16'),
(24, NULL, NULL, NULL, NULL, 'উপ-পরিচালক', 'Deputy Director', 1, 1, 1, '2023-01-23 08:59:47', '2023-01-23 09:01:02'),
(25, NULL, NULL, NULL, NULL, 'bangla', 'New Designation', 1, 1, NULL, '2023-08-31 01:35:30', '2023-08-31 01:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_11_23_151254_create_client_infos_table', 2),
(8, '2024_11_23_152252_create_client_data_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL COMMENT 'related model id',
  `model` text DEFAULT NULL,
  `route_name` mediumtext DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `read_by` int(11) DEFAULT NULL,
  `read_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'office Two', 1, 1, NULL, '2023-08-29 03:13:29', '2023-08-29 03:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `office_categories`
--

CREATE TABLE `office_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0: inactive, 1: active, 2: delete',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_categories`
--

INSERT INTO `office_categories` (`id`, `name_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Office Category Two', 1, 1, NULL, '2023-08-29 05:27:10', '2023-08-29 05:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text DEFAULT NULL,
  `name_bn` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name_en`, `name_bn`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'user_management', 'user_management', 1, 1, NULL, NULL, NULL),
(9, 'settings', 'settings', 1, 1, NULL, NULL, NULL),
(38, 'add_designation', 'add_designation', 1, 1, NULL, NULL, NULL),
(39, 'all_designations', 'all_designations', 1, 1, NULL, NULL, NULL),
(40, 'edit_designation', 'edit_designation', 1, 1, NULL, NULL, NULL),
(41, 'delete_designation', 'delete_designation', 1, 1, NULL, NULL, NULL),
(42, 'add_user', 'add_user', 1, 1, NULL, NULL, NULL),
(43, 'all_users', 'all_users', 1, 1, NULL, NULL, NULL),
(44, 'public_users', 'public_users', 1, 1, NULL, NULL, NULL),
(45, 'view_user', 'view_user', 1, 1, NULL, NULL, NULL),
(46, 'edit_user', 'edit_user', 1, 1, NULL, NULL, NULL),
(47, 'block_user', 'block_user', 1, 1, NULL, NULL, NULL),
(48, 'delete_user', 'delete_user', 1, 1, NULL, NULL, NULL),
(49, 'all_roles', 'all_roles', 1, 1, NULL, NULL, NULL),
(50, 'add_role', 'add_role', 1, 1, NULL, NULL, NULL),
(51, 'edit_role', 'edit_role', 1, 1, NULL, NULL, NULL),
(52, 'delete_role', 'delete_role', 1, 1, NULL, NULL, NULL),
(53, 'all_permissions', 'all_permissions', 1, 1, NULL, NULL, NULL),
(54, 'add_permission', 'add_permission', 1, 1, NULL, NULL, NULL),
(55, 'edit_permission', 'edit_permission', 1, 1, NULL, NULL, NULL),
(56, 'assign_permission_list', 'assign_permission_list', 1, 1, NULL, NULL, NULL),
(57, 'assign_permission', 'assign_permission', 1, 1, NULL, NULL, NULL),
(58, 'edit_assign_permission', 'edit_assign_permission', 1, 1, NULL, NULL, NULL),
(99, 'total_role_count', 'total_role_count', 1, 1, NULL, '2021-11-21 18:55:51', '2021-11-21 18:55:51'),
(313, 'remove_assign_permission', 'remove_assign_permission', 1, 1, NULL, '2023-06-07 02:07:33', '2023-06-07 02:07:33'),
(317, 'manage_VMS', NULL, 1, 1, NULL, '2023-08-24 00:10:31', '2023-08-24 00:10:31'),
(318, 'visitor_list', NULL, 1, 1, NULL, '2023-08-24 00:10:45', '2023-08-24 00:10:45'),
(319, 'appointment_list', NULL, 1, 1, NULL, '2023-08-24 00:10:52', '2023-08-24 00:10:52'),
(320, 'add_visitor', NULL, 1, 1, NULL, '2023-08-24 00:31:28', '2023-08-24 00:31:28'),
(321, 'add_appointment', NULL, 1, 1, NULL, '2023-08-24 00:31:34', '2023-08-24 00:31:34'),
(322, 'view_visitor', NULL, 1, 1, NULL, '2023-08-24 02:55:11', '2023-08-24 02:55:11'),
(323, 'edit_visitor', NULL, 1, 1, NULL, '2023-08-24 02:55:17', '2023-08-24 02:55:17'),
(324, 'delete_visitor', NULL, 1, 1, NULL, '2023-08-24 02:55:22', '2023-08-24 02:55:22'),
(325, 'update_visitor_status', NULL, 1, 1, NULL, '2023-08-24 05:09:10', '2023-08-24 05:09:10'),
(326, 'manage_office', NULL, 1, 1, NULL, '2023-08-24 06:19:27', '2023-08-24 06:19:27'),
(328, 'all_departments', NULL, 1, 1, NULL, '2023-08-24 06:27:32', '2023-08-24 06:27:32'),
(329, 'add_department', NULL, 1, 1, NULL, '2023-08-24 06:53:13', '2023-08-24 06:53:13'),
(330, 'edit_department', NULL, 1, 1, NULL, '2023-08-24 07:08:41', '2023-08-24 07:08:41'),
(331, 'delete_department', NULL, 1, 1, NULL, '2023-08-24 07:08:47', '2023-08-24 07:08:47'),
(332, 'offie_list', NULL, 1, 1, NULL, '2023-08-29 02:41:28', '2023-08-29 02:41:28'),
(333, 'add_office', NULL, 1, 1, NULL, '2023-08-29 02:41:48', '2023-08-29 02:41:48'),
(334, 'edit_office', NULL, 1, 1, NULL, '2023-08-29 02:44:27', '2023-08-29 02:44:27'),
(335, 'delete_office', NULL, 1, 1, NULL, '2023-08-29 02:44:36', '2023-08-29 02:44:36'),
(336, 'offie_category', NULL, 1, 1, NULL, '2023-08-29 03:51:38', '2023-08-29 03:51:38'),
(337, 'add_office_category', NULL, 1, 1, NULL, '2023-08-29 04:08:06', '2023-08-29 04:08:06'),
(338, 'edit_office_category', NULL, 1, 1, NULL, '2023-08-29 04:08:15', '2023-08-29 04:08:15'),
(339, 'delete_office_category', NULL, 1, 1, NULL, '2023-08-29 04:08:23', '2023-08-29 04:08:23'),
(340, 'view_appointment', NULL, 1, 1, NULL, '2023-08-31 08:00:07', '2023-08-31 08:00:07'),
(341, 'edit_appointment', NULL, 1, 1, NULL, '2023-08-31 08:00:14', '2023-08-31 08:00:14'),
(342, 'delete_appointment', NULL, 1, 1, NULL, '2023-08-31 08:00:22', '2023-08-31 08:00:22'),
(343, 'update_appointment_status', NULL, 1, 1, NULL, '2023-09-02 02:29:49', '2023-09-02 02:29:49'),
(344, 'total_visitor_count', NULL, 1, 1, NULL, '2023-09-03 02:56:40', '2023-09-03 02:56:40'),
(345, 'total_host_count', NULL, 1, 1, NULL, '2023-09-03 02:57:18', '2023-09-03 02:57:18'),
(346, 'total_appointment_count', NULL, 1, 1, NULL, '2023-09-03 03:04:55', '2023-09-03 03:04:55'),
(347, 'today\'s_appointment_count', NULL, 1, 1, NULL, '2023-09-03 03:07:10', '2023-09-03 03:07:10'),
(348, 'status_wise_chart', NULL, 1, 1, NULL, '2023-09-03 03:12:14', '2023-09-03 03:12:14'),
(349, 'monthly_chart', NULL, 1, 1, NULL, '2023-09-03 03:15:14', '2023-09-03 03:15:14'),
(350, 'manage_client_info', NULL, 1, 1, NULL, '2024-11-23 09:58:04', '2024-11-23 09:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `access_all` tinyint(4) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `sl` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disabled',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `access_all`, `name_en`, `name_bn`, `display_name`, `sl`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Super Admin', 'সুপার অ্যাডমিন', 'Super Admin', 1, 1, 1, 1, '2022-07-19 09:32:20', '2022-10-02 19:26:13'),
(2, NULL, 'Admin', 'অ্যাডমিন', 'Admin', 2, 1, 1, 1, '2022-07-19 09:32:20', '2022-10-02 19:25:55'),
(3, NULL, 'Employee', 'Employee', 'Employee', 3, 1, 1, NULL, '2023-01-24 11:39:02', '2023-01-24 11:39:02'),
(4, NULL, 'Visitor', 'Visitor', 'Visitor', 4, 1, 1, NULL, '2023-01-24 11:39:02', '2023-01-25 09:29:55'),
(5, NULL, 'Receptionist', 'Receptionist', 'Receptionist', 5, 1, 1, NULL, '2023-01-24 11:39:02', '2023-01-24 11:39:02'),
(6, NULL, 'Client Data Manager', 'ক্লায়েন্ট ডেটা ম্যানেজার', 'Client Data Manager', NULL, 1, 1, NULL, '2024-11-23 09:05:04', '2024-11-23 09:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `user_id`, `permission_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3779, NULL, 155, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3780, NULL, 272, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3781, NULL, 273, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3782, NULL, 275, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3783, NULL, 276, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3784, NULL, 277, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3785, NULL, 279, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3786, NULL, 280, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3787, NULL, 281, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3788, NULL, 282, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3789, NULL, 283, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3790, NULL, 284, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3791, NULL, 285, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3792, NULL, 286, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3793, NULL, 287, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3794, NULL, 288, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3795, NULL, 289, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3796, NULL, 290, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3797, NULL, 291, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3798, NULL, 292, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3799, NULL, 293, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3800, NULL, 294, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3801, NULL, 295, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3802, NULL, 296, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3803, NULL, 298, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3804, NULL, 299, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3805, NULL, 300, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3806, NULL, 301, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3807, NULL, 302, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3808, NULL, 303, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3809, NULL, 304, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3810, NULL, 305, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3811, NULL, 307, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3812, NULL, 308, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3813, NULL, 312, 6, 1, NULL, '2022-10-12 06:41:14', '2022-10-12 06:41:14'),
(3814, NULL, 4, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3815, NULL, 6, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3817, NULL, 9, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3818, NULL, 38, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3819, NULL, 39, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3820, NULL, 40, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3821, NULL, 41, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3822, NULL, 42, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3823, NULL, 43, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3824, NULL, 44, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3825, NULL, 45, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3826, NULL, 46, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3827, NULL, 47, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3828, NULL, 48, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3829, NULL, 49, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3830, NULL, 50, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3831, NULL, 51, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3832, NULL, 52, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3833, NULL, 53, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3834, NULL, 57, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(3835, NULL, 58, 2, 1, NULL, '2022-10-12 06:41:22', '2022-10-12 06:41:22'),
(4017, NULL, 4, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4018, NULL, 6, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4020, NULL, 9, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4021, NULL, 38, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4022, NULL, 39, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4023, NULL, 40, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4024, NULL, 41, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4025, NULL, 42, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4026, NULL, 43, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4027, NULL, 44, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4028, NULL, 45, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4029, NULL, 46, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4030, NULL, 47, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4031, NULL, 48, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4032, NULL, 49, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4033, NULL, 50, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4034, NULL, 51, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4035, NULL, 52, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4036, NULL, 53, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4037, NULL, 54, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4038, NULL, 55, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4039, NULL, 56, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4040, NULL, 57, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4041, NULL, 58, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4042, NULL, 99, 1, 1, NULL, '2022-11-08 10:52:44', '2022-11-08 10:52:44'),
(4089, NULL, 313, 1, 1, NULL, '2023-06-07 02:08:12', '2023-06-07 02:08:12'),
(4095, NULL, 317, 1, 1, NULL, '2023-08-24 00:11:00', '2023-08-24 00:11:00'),
(4096, NULL, 318, 1, 1, NULL, '2023-08-24 00:11:00', '2023-08-24 00:11:00'),
(4097, NULL, 319, 1, 1, NULL, '2023-08-24 00:11:00', '2023-08-24 00:11:00'),
(4098, NULL, 320, 1, 1, NULL, '2023-08-24 00:31:40', '2023-08-24 00:31:40'),
(4099, NULL, 321, 1, 1, NULL, '2023-08-24 00:31:40', '2023-08-24 00:31:40'),
(4100, NULL, 322, 1, 1, NULL, '2023-08-24 02:55:27', '2023-08-24 02:55:27'),
(4101, NULL, 323, 1, 1, NULL, '2023-08-24 02:55:27', '2023-08-24 02:55:27'),
(4102, NULL, 324, 1, 1, NULL, '2023-08-24 02:55:27', '2023-08-24 02:55:27'),
(4103, NULL, 325, 1, 1, NULL, '2023-08-24 05:09:16', '2023-08-24 05:09:16'),
(4104, NULL, 326, 1, 1, NULL, '2023-08-24 06:25:45', '2023-08-24 06:25:45'),
(4106, NULL, 328, 1, 1, NULL, '2023-08-24 06:27:41', '2023-08-24 06:27:41'),
(4107, NULL, 329, 1, 1, NULL, '2023-08-24 06:53:19', '2023-08-24 06:53:19'),
(4108, NULL, 330, 1, 1, NULL, '2023-08-24 07:08:53', '2023-08-24 07:08:53'),
(4109, NULL, 331, 1, 1, NULL, '2023-08-24 07:08:53', '2023-08-24 07:08:53'),
(4110, NULL, 332, 1, 1, NULL, '2023-08-29 02:44:42', '2023-08-29 02:44:42'),
(4111, NULL, 333, 1, 1, NULL, '2023-08-29 02:44:42', '2023-08-29 02:44:42'),
(4112, NULL, 334, 1, 1, NULL, '2023-08-29 02:44:42', '2023-08-29 02:44:42'),
(4113, NULL, 335, 1, 1, NULL, '2023-08-29 02:44:42', '2023-08-29 02:44:42'),
(4114, NULL, 336, 1, 1, NULL, '2023-08-29 03:51:44', '2023-08-29 03:51:44'),
(4115, NULL, 337, 1, 1, NULL, '2023-08-29 04:08:29', '2023-08-29 04:08:29'),
(4116, NULL, 338, 1, 1, NULL, '2023-08-29 04:08:29', '2023-08-29 04:08:29'),
(4117, NULL, 339, 1, 1, NULL, '2023-08-29 04:08:29', '2023-08-29 04:08:29'),
(4118, NULL, 340, 1, 1, NULL, '2023-08-31 08:00:39', '2023-08-31 08:00:39'),
(4119, NULL, 341, 1, 1, NULL, '2023-08-31 08:00:39', '2023-08-31 08:00:39'),
(4120, NULL, 342, 1, 1, NULL, '2023-08-31 08:00:39', '2023-08-31 08:00:39'),
(4121, NULL, 343, 1, 1, NULL, '2023-09-02 02:29:57', '2023-09-02 02:29:57'),
(4122, NULL, 344, 1, 1, NULL, '2023-09-03 03:05:04', '2023-09-03 03:05:04'),
(4123, NULL, 345, 1, 1, NULL, '2023-09-03 03:05:04', '2023-09-03 03:05:04'),
(4124, NULL, 346, 1, 1, NULL, '2023-09-03 03:05:04', '2023-09-03 03:05:04'),
(4125, NULL, 347, 1, 1, NULL, '2023-09-03 03:07:16', '2023-09-03 03:07:16'),
(4126, NULL, 348, 1, 1, NULL, '2023-09-03 03:15:20', '2023-09-03 03:15:20'),
(4127, NULL, 349, 1, 1, NULL, '2023-09-03 03:15:20', '2023-09-03 03:15:20'),
(4128, NULL, 317, 3, 1, NULL, '2023-09-03 06:17:49', '2023-09-03 06:17:49'),
(4129, NULL, 319, 3, 1, NULL, '2023-09-03 06:18:53', '2023-09-03 06:18:53'),
(4131, NULL, 340, 3, 1, NULL, '2023-09-03 06:18:53', '2023-09-03 06:18:53'),
(4132, NULL, 346, 3, 1, NULL, '2023-09-03 06:29:19', '2023-09-03 06:29:19'),
(4133, NULL, 347, 3, 1, NULL, '2023-09-03 06:29:19', '2023-09-03 06:29:19'),
(4134, NULL, 317, 4, 1, NULL, '2023-09-03 06:31:37', '2023-09-03 06:31:37'),
(4135, NULL, 319, 4, 1, NULL, '2023-09-03 06:31:37', '2023-09-03 06:31:37'),
(4136, NULL, 321, 4, 1, NULL, '2023-09-03 06:31:37', '2023-09-03 06:31:37'),
(4137, NULL, 340, 4, 1, NULL, '2023-09-03 06:31:37', '2023-09-03 06:31:37'),
(4139, NULL, 346, 4, 1, NULL, '2023-09-03 06:31:37', '2023-09-03 06:31:37'),
(4140, NULL, 347, 4, 1, NULL, '2023-09-03 06:31:37', '2023-09-03 06:31:37'),
(4141, NULL, 317, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4142, NULL, 318, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4143, NULL, 319, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4144, NULL, 320, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4145, NULL, 321, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4146, NULL, 322, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4147, NULL, 323, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4148, NULL, 324, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4149, NULL, 325, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4150, NULL, 340, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4151, NULL, 341, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4152, NULL, 343, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4153, NULL, 344, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4154, NULL, 345, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4155, NULL, 346, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4156, NULL, 347, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4157, NULL, 348, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4158, NULL, 349, 5, 1, NULL, '2023-09-03 06:49:36', '2023-09-03 06:49:36'),
(4159, NULL, 350, 1, 1, NULL, '2024-11-23 09:58:16', '2024-11-23 09:58:16'),
(4160, NULL, 350, 6, 1, NULL, '2024-11-23 09:58:37', '2024-11-23 09:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `logo` varchar(251) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `alt_phone` text DEFAULT NULL,
  `alt_mobile` text DEFAULT NULL,
  `alt_email` text DEFAULT NULL,
  `copyright` text DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `sub_title`, `logo`, `address`, `phone`, `mobile`, `email`, `alt_phone`, `alt_mobile`, `alt_email`, `copyright`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Telecommunication Regulatory Commission', 'BTRC', 'logo2022_09_07_042224_32603001.png', 'IEB Bhaban (5,6 & 7 floor), Ramna, Dhaka-1000', '+ 880 2 9611111', '+8802223386677', 'btrc@btrc.gov.bd', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-06-06 04:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_bn` text DEFAULT NULL,
  `name_en` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `user_type` int(11) NOT NULL COMMENT '1=super-admin, 2=admin, 3=employee, 4=visitor',
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=Blocked,\r\n 1=active, 2=disable',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_bn`, `name_en`, `email`, `mobile`, `user_type`, `role_id`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'superadmin@gmail.com', '01234567897', 0, 1, 1, NULL, '$2y$10$DeXIGxPRkiCMvlQ1eZ2CNuQRFouzOXOI9SmFHxHyLSTwjOsDvZnOm', NULL, '2022-08-25 12:33:48', '2024-11-23 08:57:54'),
(20, 'Reception', 'Reception', 'reception@gmail.com', '217', 0, 5, 1, NULL, '$2a$12$ZCXkynIbX1ft3uJ4fE5jkOGEOhBHo9f5UTKug6mw3hRYmOhq1lFre', NULL, '2023-01-29 12:33:16', '2023-01-29 12:33:16'),
(203, 'Tauhid', 'Tauhid Hasan (Visitor)', 'm.tah69@gmail.com', '01537152126', 4, 4, 1, NULL, '$2y$10$Gon9zAOLw1hi1fbWI9yp3uOgY5kVBiXrTcsEBchIz4YBf7XY9LERe', 'X2pTh76drm7PfMMaML9kvTaFEgcHfT2D4ZaPC2MYNOYzPGepTaUtHNhjhQZq', '2023-08-24 03:53:41', '2023-09-05 05:26:44'),
(204, 'Thor Freeman', 'Thor Freeman', 'tanulup@mailinator.com', 'Quam velit de', 0, 3, 1, NULL, '$2y$10$DC3lMGLf5bAop9vX3ilqru6TbTG6p5Oj8cwnUA1UvOxGXBPSQXjO.', NULL, '2023-08-30 06:01:07', '2023-08-30 06:01:07'),
(207, 'Edited User', 'Edited User', 'edited@mail.com', '15987456232', 0, 3, 2, NULL, '$2y$10$/UNGMujrOXmSYH6KVxOpO.nnnbGfjAQdAHfjI4cl6hoAplQeyJLwe', NULL, '2023-08-30 06:02:36', '2024-11-23 09:06:56'),
(208, 'MA RUMAN', 'MA RUMAN', 'Rumivenice@gmail.com', '3291552444', 0, 6, 1, NULL, '$2y$10$ZK1g9bLhRg/l0t/EzeJ45eFAkdy9EQKda2HI9/pvMV4FrKKQ0PmV6', NULL, '2024-11-23 09:06:44', '2024-11-26 11:47:01'),
(209, 'Rasel', 'Rasel', 'Ufficio.selina@gmail.com', 'Ufficio.selina', 0, 6, 1, NULL, '$2y$10$lMqnSdsqnVR18Y5AOadQGed2T0lHP5YQz08c5n.lEvXk0cYpoAV7C', NULL, '2024-11-28 11:18:47', '2024-11-28 11:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `present_division_id` int(11) DEFAULT NULL,
  `present_district_id` int(11) DEFAULT NULL,
  `present_upazila_id` int(11) DEFAULT NULL,
  `present_post_office` text DEFAULT NULL,
  `present_post_code` text DEFAULT NULL,
  `permanent_division_id` int(11) DEFAULT NULL,
  `permanent_district_id` int(11) DEFAULT NULL,
  `permanent_upazila_id` int(11) DEFAULT NULL,
  `permanent_post_office` text DEFAULT NULL,
  `permanent_post_code` text DEFAULT NULL,
  `present_address` mediumtext DEFAULT NULL COMMENT 'village or road no',
  `permanent_address` mediumtext DEFAULT NULL COMMENT 'village or road no',
  `same_as_present_address` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `present_division_id`, `present_district_id`, `present_upazila_id`, `present_post_office`, `present_post_code`, `permanent_division_id`, `permanent_district_id`, `permanent_upazila_id`, `permanent_post_office`, `permanent_post_code`, `present_address`, `permanent_address`, `same_as_present_address`, `created_at`, `updated_at`) VALUES
(157, 1, 7, 20, 49, 'modhupur', '1111', 4, 11, 6, 'nania', '9999', 'modhupur', 'nania', 0, '2023-02-08 09:22:15', '2023-05-08 09:25:20'),
(159, 202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-23 01:38:42', '2023-08-23 01:38:42'),
(160, 204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Consequatur ut ea o', 'Dolore eum mollitia', NULL, '2023-08-30 06:01:07', '2023-08-30 06:01:07'),
(161, 205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et odit explicabo A', 'Hic excepturi at in', NULL, '2023-08-30 06:01:43', '2023-08-30 06:01:43'),
(162, 206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Itaque pariatur Ut', 'Ab praesentium dolor', NULL, '2023-08-30 06:02:00', '2023-08-30 06:02:00'),
(163, 207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pariatur Quis paria', 'Animi facilis ex id', NULL, '2023-08-30 06:02:36', '2023-08-30 06:02:36'),
(164, 208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, '2024-11-23 09:06:44', '2024-11-26 11:47:01'),
(165, 209, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-28 11:18:47', '2024-11-28 11:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `nid_no` varchar(100) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `driving_license_no` varchar(255) DEFAULT NULL,
  `religion` mediumtext DEFAULT NULL,
  `availablity` int(11) DEFAULT 1 COMMENT '0=unavailable, 1=available',
  `visitor_organization` varchar(255) DEFAULT NULL,
  `visitor_designation` varchar(255) DEFAULT NULL,
  `f_name_bn` text DEFAULT NULL,
  `f_name_en` text DEFAULT NULL,
  `m_name_bn` text DEFAULT NULL,
  `m_name_en` text DEFAULT NULL,
  `birth_certificate_no` text DEFAULT NULL,
  `basic_salary` decimal(8,2) DEFAULT NULL,
  `marital_status` text DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `is_retire` int(11) DEFAULT NULL COMMENT '0=not-retire, 1=retired',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `retire_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `department_id`, `designation_id`, `address`, `image`, `office_id`, `gender`, `dob`, `employee_id`, `nid_no`, `post_id`, `passport_no`, `driving_license_no`, `religion`, `availablity`, `visitor_organization`, `visitor_designation`, `f_name_bn`, `f_name_en`, `m_name_bn`, `m_name_en`, `birth_certificate_no`, `basic_salary`, `marital_status`, `quota`, `signature`, `is_retire`, `created_by`, `updated_by`, `created_at`, `updated_at`, `retire_date`) VALUES
(12, 6, 2, 2, 'Adipisicing inventor', 'userImage2023_01_29_063316_64364711.jpg', 1, 'Male', '1956-03-15', 'n/a', NULL, 3, NULL, NULL, 'Islam', 0, 'Add org', 'Exicutive', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, 'Married', NULL, NULL, NULL, 1, 1, '2023-01-29 12:33:16', '2023-03-09 19:26:34', NULL),
(184, 203, 2, 3, 'Sint rerum ut quia', 'userImage2023_08_24_095341_16976914.jpg', NULL, 'Female', '2000-02-23', NULL, '935asdfasdf', NULL, '934asdfasdf', '606', NULL, 1, 'Travis Keith Trading', 'Sit voluptatibus ame', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-08-24 03:53:41', '2023-08-24 05:34:56', NULL),
(185, 1, 2, 1, 'Adipisicing inventor', '1image2024_11_23_025754_86284513.jpg', 1, 'Male', '1956-03-15', 'n/a', NULL, 3, NULL, NULL, 'Islam', 0, 'Add org', 'Exicutive', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, 'Married', NULL, NULL, NULL, 1, 1, '2023-01-29 12:33:16', '2024-11-23 08:57:55', NULL),
(186, 4, 2, 2, 'Adipisicing inventor', 'userImage2023_01_29_063316_64364711.jpg', 1, 'Male', '1956-03-15', 'n/a', NULL, 3, NULL, NULL, 'Islam', 0, 'Add org', 'Exicutive', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, 'Married', NULL, NULL, NULL, 1, 1, '2023-01-29 12:33:16', '2023-03-09 19:26:34', NULL),
(187, 20, 2, 2, 'Adipisicing inventor', 'userImage2023_01_29_063316_64364711.jpg', 1, 'Male', '1956-03-15', 'n/a', NULL, 3, NULL, NULL, 'Islam', 0, 'Add org', 'Exicutive', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, 'Married', NULL, NULL, NULL, 1, 1, '2023-01-29 12:33:16', '2023-03-09 19:26:34', NULL),
(188, 204, 2, 16, 'Consequatur ut ea o', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-30 06:01:07', '2023-08-30 06:01:07', NULL),
(189, 205, 2, 5, 'Et odit explicabo A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-30 06:01:43', '2023-08-30 06:01:43', NULL),
(190, 206, 2, 15, 'Itaque pariatur Ut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-30 06:02:00', '2023-08-30 06:02:00', NULL),
(191, 207, 2, 1, 'Pariatur Quis paria', '207image2023_08_30_125034_93252552.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-30 06:02:36', '2023-08-30 06:50:34', NULL),
(192, 208, 2, 10, NULL, '208image2024_11_23_030644_22688509.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-23 09:06:44', '2024-11-23 09:06:44', NULL),
(193, 209, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-28 11:18:47', '2024-11-28 11:18:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_data`
--
ALTER TABLE `client_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_infos`
--
ALTER TABLE `client_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_categories`
--
ALTER TABLE `office_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `client_data`
--
ALTER TABLE `client_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `client_infos`
--
ALTER TABLE `client_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office_categories`
--
ALTER TABLE `office_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4161;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
