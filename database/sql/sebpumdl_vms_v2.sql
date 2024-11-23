-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2024 at 02:32 AM
-- Server version: 10.5.20-MariaDB-cll-lve
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sebpumdl_vms_v2`
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
(1, 4, 203, 'Travis Keith Trading', 'Sit voluptatibus ame', 'Project Meeting', 'asdfasdfasdfasdf', '2024-01-25', '12:00', 5, NULL, NULL, NULL, 1, NULL, 203, NULL, NULL, NULL, '2024-01-25 09:59:28', '2024-01-25 10:01:17');

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
(4, 'Software Department', 1, 1, '2023-09-24 16:08:36', '2023-09-24 16:08:36'),
(5, 'Accounts and Finance', 1, 1, '2023-09-24 16:09:19', '2023-09-24 16:09:19'),
(7, 'Product Development', 1, 1, '2023-09-24 16:09:58', '2023-09-24 16:09:58'),
(8, 'HR', 1, 1, '2023-09-24 16:10:28', '2023-09-24 16:10:28'),
(9, 'Customer Service', 1, 1, '2023-09-25 14:43:48', '2023-09-25 14:43:48'),
(10, 'Quality Assurance', 1, 1, '2023-09-25 14:44:07', '2023-09-25 14:44:07'),
(11, 'Business Development', 1, 1, '2023-09-25 14:44:37', '2023-09-25 14:44:37'),
(12, 'Operations management', 1, 1, '2023-09-25 14:45:18', '2023-09-26 14:20:34');

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
(8, NULL, NULL, NULL, NULL, 'মূখ্য বৈজ্ঞানিক কর্মকর্তা', 'Chief Scientific Officer', 2, 1, NULL, '2022-02-14 23:18:56', '2023-09-26 14:16:16'),
(9, NULL, NULL, NULL, NULL, 'প্রধান বৈজ্ঞানিক কর্মকর্তা', 'Chief Scientific Officer', 1, 1, NULL, '2022-02-14 23:20:20', '2022-02-14 23:20:20'),
(10, NULL, NULL, NULL, NULL, 'পরিচালক (প্রশাসন ও অর্থ)', 'Director (Administration & Finance)', 1, 1, NULL, '2022-02-14 23:21:06', '2022-02-14 23:21:06'),
(11, NULL, NULL, NULL, NULL, 'মূখ্য বৈজ্ঞানিক কর্মকর্তা (রুটিন দায়িত্ব)', 'Chief Scientific Officer (Routine Responsibilities)', 1, 1, NULL, '2022-02-14 23:22:04', '2022-02-14 23:22:04'),
(12, NULL, NULL, NULL, NULL, 'সিস্টেম এনালিস্ট', 'System Analyst', 1, 1, NULL, '2022-02-14 23:23:03', '2022-02-14 23:23:03'),
(13, NULL, NULL, NULL, NULL, 'প্রোগ্রামার', 'Programmer', 1, 1, NULL, '2022-02-14 23:24:16', '2022-02-14 23:24:16'),
(14, NULL, NULL, NULL, NULL, 'ঊর্ধ্বতন বৈজ্ঞানিক কর্মকর্তা', 'Senior Scientific Officer', 1, 1, NULL, '2022-02-14 23:25:00', '2022-02-14 23:25:00'),
(15, NULL, NULL, NULL, NULL, 'উপ পরিচালক (প্রশাসন) (চলতি দায়িত্ব)', 'Deputy Director (Administration) (Current Responsibilities)', 1, 1, NULL, '2022-02-14 23:25:57', '2022-02-14 23:25:57'),
(16, NULL, NULL, NULL, NULL, 'সহকারী পরিচালক (সংস্থাপন)', 'Assistant Director (Establishment)', 2, 1, NULL, '2022-02-14 23:27:31', '2023-09-26 14:16:36'),
(17, NULL, NULL, NULL, NULL, 'বৈজ্ঞানিক কর্মকর্তা', 'Scientific officer', 1, 1, NULL, '2022-02-14 23:30:06', '2022-02-14 23:30:06'),
(18, NULL, NULL, NULL, NULL, 'সহকারী প্রকৌশলী', 'Assistant Engineer', 1, 1, NULL, '2022-02-14 23:31:21', '2022-02-14 23:31:21'),
(19, NULL, NULL, NULL, NULL, 'উপ-সহকারী প্রকৌশলী', 'Deputy Assistant Engineer', 2, 1, NULL, '2022-02-14 23:32:18', '2023-09-26 14:16:44'),
(20, NULL, NULL, NULL, NULL, 'উপ-সহকারী পরিচালক', 'Deputy Assistant Director', 1, 2, NULL, '2022-09-08 06:48:27', '2022-09-08 06:48:27'),
(21, NULL, NULL, NULL, NULL, 'সহকারী পরিচালক', 'Assistant Director', 1, 2, NULL, '2022-09-08 07:01:03', '2022-09-08 07:01:03'),
(22, NULL, NULL, NULL, NULL, 'সিনিয়র সহকারী পরিচালক', 'Senior Assistant Director', 0, 2, 1, '2022-09-08 07:03:16', '2023-09-26 14:16:55'),
(23, NULL, NULL, NULL, NULL, 'সিনিয়র সহকারী পরিচালক', 'Senior Assistant Director', 1, 1, NULL, '2023-01-23 08:54:16', '2023-01-23 08:54:16'),
(24, NULL, NULL, NULL, NULL, 'উপ-পরিচালক', 'Deputy Director', 0, 1, 1, '2023-01-23 08:59:47', '2023-09-26 14:15:33'),
(25, NULL, NULL, NULL, NULL, 'bangla', 'New Designation', 2, 1, NULL, '2023-08-31 01:35:30', '2023-09-24 16:11:17'),
(26, NULL, NULL, NULL, NULL, 'মান নিশ্চিতকরণ প্রকৌশলী', 'Quality Assurance Engineer', 0, 1, 1, '2023-09-26 14:10:22', '2023-09-26 14:19:53');

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
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `reference_id`, `model`, `route_name`, `title`, `office_id`, `role_id`, `status`, `created_by`, `read_by`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 4, 38, 'Appointment', '/admin/appointment/show/eyJpdiI6Im1TT1VEOGlpNUkyeUtWVzdWdGtlcGc9PSIsInZhbHVlIjoiV0NxOUx5OE1kN0JhcEExR1ZJV29Ndz09IiwibWFjIjoiMTA3NTQwZDFkNTkwZGNkOTNjYThjYTA2Y2JkODUxZTVhYzhlYTg1MzRmZGU2ZmJiYTMxZTJiNTUyNGYwY2NlMCIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 1, NULL, NULL, '2023-09-05 04:47:49', '2023-09-05 04:47:49'),
(2, 6, 38, 'Appointment', '/admin/appointment/show/eyJpdiI6InNORitnUkdFcCtMWHlTT3oxU0NJdnc9PSIsInZhbHVlIjoiZ2d4alVnYTdqaTFKYUplS3BtMUdCUT09IiwibWFjIjoiM2VlZDA5NTRiMmNhYjIzMjRhZTM0MjkyMGU2NGNjMjAzYTc3N2MxZDBmOGUwYjAyZTY5OGU3NjZkMTFlMjU3MSIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 1, NULL, NULL, '2023-09-05 04:47:49', '2023-09-05 04:47:49'),
(3, 4, 39, 'Appointment', '/admin/appointment/show/eyJpdiI6ImozbEdyZmV3S3p1UGljTzVrUGF3ZVE9PSIsInZhbHVlIjoiYTBPNEsvaFFFMFM3Qlc4K01hV0dUdz09IiwibWFjIjoiMzZiYTYwZTJhNzI5MjJmODA1MGZmOTIzOWJlY2ViNmJjYmI3ODU2ZjliYTMwZGU5NGE4NzAzNTc2Nzk0ZjlmZSIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 1, NULL, NULL, '2023-09-05 06:55:59', '2023-09-05 06:55:59'),
(4, 203, 39, 'Appointment', '/admin/appointment/show/eyJpdiI6ImhiYlpUVDRlN2dCNUU0RVB5TU9TREE9PSIsInZhbHVlIjoiQ1pLcys4QlBoZGVEY3V6TGxWNEU4UT09IiwibWFjIjoiYjBkMmYyYTRiNTg4YzRiYjJiNmI4YmM0YzMwZjA0ZDI1MDQwY2JkOTI2YTYxOTVlNjg4OTdlYjk1ZGVlZWUzOSIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 1, NULL, NULL, '2023-09-05 06:55:59', '2023-09-05 06:55:59'),
(5, 4, 40, 'Appointment', '/admin/appointment/show/eyJpdiI6IkJrNE9tS1dzcUkrVXptVXZwK2NzalE9PSIsInZhbHVlIjoiUTNGdVp4eWMwZ29IQUlCV0hrN1lHUT09IiwibWFjIjoiMjI3NzIxZTIzMWQyNWQyZDUzNDk5MDU0NmM1ZTIzNjI5N2QwZDdkMDQyM2Y5NzA1YTM0ZDc1ZTdiZDUxMDhmMSIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 1, NULL, NULL, '2023-09-05 06:56:38', '2023-09-05 06:56:38'),
(6, 203, 40, 'Appointment', '/admin/appointment/show/eyJpdiI6Ink3SzYvbUdEWlZDSGxocVI5aExUeXc9PSIsInZhbHVlIjoiU2N0ZG96bzRpMTJpNVQ4UlVsbnJTUT09IiwibWFjIjoiOWU4ZWU4OTA1NTc4YmVkYWExYjE5MTMzZmVjNDkzMmM3NzEyYmZmOTUzN2ZiNDM5MmZiYzkxYmExZTdiMmZjYyIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 1, NULL, NULL, '2023-09-05 06:56:38', '2023-09-05 06:56:38'),
(7, 4, 41, 'Appointment', '/admin/appointment/show/eyJpdiI6Im54V3QxV3V6L1phM2t1a0s2TU03U1E9PSIsInZhbHVlIjoidXhzNzQzNVV5cFRvTHdEQ1BuQkFidz09IiwibWFjIjoiYmUxMDNhZGUyNGVkYjAzMjMzMDI0MjA3NzgzYWU2NmYxMzM1NzAzYzFhZGQ1YmY2OTAwYTA4ZWQ1NzA1NzkwNCIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 1, NULL, NULL, '2023-09-07 02:38:24', '2023-09-07 02:38:24'),
(8, 203, 41, 'Appointment', '/admin/appointment/show/eyJpdiI6IndUSXpidDQycmJ3SkUzdkxJQ3pJOFE9PSIsInZhbHVlIjoiaDUxWEN0TFI3b1EwbVRlbE0rYlpHUT09IiwibWFjIjoiZTE5ZGU5ZDJjYTU2ODJkZjFlYmZmOTVlOGZiZmJmNzQyZGE4ZDRmZWY0NTk5ODdiZWYzZDU3OGE1OWE1ZDU4OCIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 1, NULL, NULL, '2023-09-07 02:38:24', '2023-09-07 02:38:24'),
(9, 209, 42, 'Appointment', '/admin/appointment/show/eyJpdiI6InloTzljMXVtUE42WVZWSnlCRVZ4OFE9PSIsInZhbHVlIjoieit4VUltbVlSMEs5cHNqRStGaTAzUT09IiwibWFjIjoiZjEzNTlhMzBiZDg3ZjI5ZDVkOWI3YjMwM2EzODNiMDMwNTUzNWNjOGE2YzQwYjQzNjhhNjQxOWFkMjI0NmU5NiIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 1, 20, 209, '2023-09-24', '2023-09-24 11:17:11', '2023-09-24 11:23:26'),
(10, 208, 42, 'Appointment', '/admin/appointment/show/eyJpdiI6Ikp2bVZ5Zks2MzcvVHhPSmNTUUxjQ0E9PSIsInZhbHVlIjoib1ZvMHA0ZkM2LzVlNGIwTE1HM25sdz09IiwibWFjIjoiOTZlNTBlYjAyMWUzMWZiYjczOGFhNDRlZGUyMzVlODhkNDNlYjM4ZDVkMTRjYzk0YjkzYzAxNTM3ODRmNGIwMCIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 20, NULL, NULL, '2023-09-24 11:17:11', '2023-09-24 11:17:11'),
(11, 209, 42, 'Appointment', '/admin/appointment/show/eyJpdiI6IkRZRzZwNU1Gc1ZPRU9wNGJiSjJ2Mnc9PSIsInZhbHVlIjoiQ2s2WDNaVVhmdGtUZXJvR3o5MWJFZz09IiwibWFjIjoiNGFlYTQyNWFhZjAzYzQyZGMxNTg2MmQ4NDc0MDhmYmIzZTljMDQzMDgwZTZhZjQ1Mzg1YWMzOGNlYzU0OTBlNSIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 1, 20, 209, '2023-09-24', '2023-09-24 11:19:15', '2023-09-24 11:20:36'),
(12, 208, 42, 'Appointment', '/admin/appointment/show/eyJpdiI6ImZLVWxsUWZ0aE9BMk5EbWtzVTJZV0E9PSIsInZhbHVlIjoiMVVQNmQ1UFFqa2VRM2FNTFpJRldudz09IiwibWFjIjoiOWQ3NWJlMzI5ZWI4ZGRmNTRjMTNlNzUwNDY0ZDdiYzVjN2RiODFmM2Y4ZmE3NzE1YzFmNTAyNDgxZTZlZDY2MyIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 20, NULL, NULL, '2023-09-24 11:19:15', '2023-09-24 11:19:15'),
(13, 209, 42, 'Appointment', '/admin/appointment/show/eyJpdiI6ImVFZ0ppY1dISWVkUUZQRXhlZE1aSEE9PSIsInZhbHVlIjoiWU5mSFp5U3J1K1RoQlF4b3NnaFRFZz09IiwibWFjIjoiMjI3NmE2ZTAwYjY4NTc3ZDg0MTBmYjYxNjJmZTNlMzBlMGM1NzVkN2I0YmY3MGI5NWIzYWEwODVkMzQ4ZGQ5NyIsInRhZyI6IiJ9', 'Appointment Approved', NULL, NULL, 0, 209, NULL, NULL, '2023-09-24 11:23:39', '2023-09-24 11:23:39'),
(14, 208, 42, 'Appointment', '/admin/appointment/show/eyJpdiI6ImFDY1ErWjdPcENQSHp5bEZqNThHNGc9PSIsInZhbHVlIjoiMFI4c3JnZzVXd09mV2RuenJLbC9jZz09IiwibWFjIjoiYWNhODUwZjBkNDk5NDUyNWE4ZmI2NWU0MjkzMzc3ZTE5ZGU1MDI4MDUzYmY5OWI0YWJhY2ViMDkyYjZhZDlmNCIsInRhZyI6IiJ9', 'Appointment Approved', NULL, NULL, 0, 209, NULL, NULL, '2023-09-24 11:23:39', '2023-09-24 11:23:39'),
(15, 205, 43, 'Appointment', '/admin/appointment/show/eyJpdiI6InBwYjZYS1N5eVZVZk5uMFVXR2pwd2c9PSIsInZhbHVlIjoiTjRXbkg0cXhlZEw3VXF5a1ZyRXc5Zz09IiwibWFjIjoiNjUwYjIwOGFiZDFkOTE5NzU4Njc2YWE5MzAwMWVkNTU0NTY3YjI2ZjU4MWU2NWYxNWI4ZjZjNWFlODVlNDNjMyIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 20, NULL, NULL, '2023-09-24 16:33:52', '2023-09-24 16:33:52'),
(16, 6, 43, 'Appointment', '/admin/appointment/show/eyJpdiI6InMyTS94REJMdmo0dEpweWZjdW9Vcnc9PSIsInZhbHVlIjoialI1SGIvQzhjeThjb1Jmc2pjZTBudz09IiwibWFjIjoiYTUyMWRhZWQ1NmM1MDAzYzAzNjQzOWVkZjQ5ZjllYzBhZTc2YzkxMGY5MjM0Y2NiMWEwOGExMjBmMzIyMjc2MyIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 20, NULL, NULL, '2023-09-24 16:33:52', '2023-09-24 16:33:52'),
(17, 204, 44, 'Appointment', '/admin/appointment/show/eyJpdiI6ImlndDQyQVNBakZDbmdJcEtKYjRDWGc9PSIsInZhbHVlIjoiZ1ZlaExPbzRZQnczaUFDSnc5ZFRxQT09IiwibWFjIjoiMmEzMmY5MzM1ZDAyN2E2MDRlMTg4MDI3MDhlNmI0MGVmNGYwNGVkMjY2ZDFmYjdjYjE4ZWU0YWM5NzU5NjA3MiIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 217, NULL, NULL, '2023-09-25 14:59:11', '2023-09-25 14:59:11'),
(18, 217, 44, 'Appointment', '/admin/appointment/show/eyJpdiI6IkpmOTV3bzI1TGxoQUNudTAzMFBwUWc9PSIsInZhbHVlIjoieGR4dkJDdFE1WTBZWFlicWVzN20yUT09IiwibWFjIjoiNzUwNTk2ODRjYmRjMDk1OTJiNWZkNTI3ZmE4Y2JkZWJkMjExOTgwNmVjOTg5NWY4NjA0Njc0ZTMyNTg0ZGUwZCIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 217, NULL, NULL, '2023-09-25 14:59:11', '2023-09-25 14:59:11'),
(19, 4, 45, 'Appointment', '/admin/appointment/show/eyJpdiI6IlFCaTl3amlEczFBalBpeWNkZnNLK2c9PSIsInZhbHVlIjoibmQ1Z3BZbXhzRUJoOGdZTG5sVmcvQT09IiwibWFjIjoiMTA5ZjhlZTM4Y2RiMDk0NjAxZjZjYmU2OTM4OTA2ZDZhMjAwMjc3NWM1ZTk1ZjczMGZjYjgxMzg0NGYzMjI4ZSIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 217, NULL, NULL, '2023-09-25 15:00:48', '2023-09-25 15:00:48'),
(20, 217, 45, 'Appointment', '/admin/appointment/show/eyJpdiI6Inh2VmNtd1M4dm1acmduY1A4RmNraEE9PSIsInZhbHVlIjoiL1AwVnhIcElaTnZEWFV3b0NJWm4vUT09IiwibWFjIjoiMjJiZjI5ZTdlMmI1OTY3ODIyODQyNmM0Njg4YWJiZDY1MzY2NDIxY2EwMGM3ZTE0NWI0NzZmYWI1NDhkNzFhZSIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 217, NULL, NULL, '2023-09-25 15:00:48', '2023-09-25 15:00:48'),
(21, 217, 46, 'Appointment', '/admin/appointment/show/eyJpdiI6IkhVMHcySTgyL200UytyWHBTeXRaclE9PSIsInZhbHVlIjoiZ0pMcnpFeWtuczJYM28vNmkrVmtVZz09IiwibWFjIjoiMDRkNTQ4N2ExNGUxZWJmNzhiODRjZDdlNTJiNzUyYWUwMzhhMzhjNGUxNGY2YTljMjI4NTFjZGM0NDE5ZTQ3YSIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 218, NULL, NULL, '2023-09-25 15:43:51', '2023-09-25 15:43:51'),
(22, 218, 46, 'Appointment', '/admin/appointment/show/eyJpdiI6IkJoMldncFc0Y3VjQzdsM3UzdHhlRUE9PSIsInZhbHVlIjoiVVplV21tbHBvOVdYZnJ3YVAvbGEzdz09IiwibWFjIjoiYWE1Yzc3ZTk3NWI2MWYxOTdiM2NjYTNiN2I2ZjJlNTVlNmJkOTdmNjQyMzI2OWYwYWZiOTllYWNkYzA2MzllZCIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 218, NULL, NULL, '2023-09-25 15:43:51', '2023-09-25 15:43:51'),
(23, 217, 46, 'Appointment', '/admin/appointment/show/eyJpdiI6IlhRUUN6Y2Z5NUZJK3UxS21xV3JQM2c9PSIsInZhbHVlIjoibkpzRmJ0U0lNaDhNZTZGeWpMam9Jdz09IiwibWFjIjoiMmJkMjY1ZGM1ZGJlODJkYjVlNDQxMzBiYWMwOWJhM2NhZTQ5OWU1NjNjZmMyOGQwNzExYTZlNGU2YzRkZTg1NSIsInRhZyI6IiJ9', 'Appointment Re-Scheduled', NULL, NULL, 0, 217, NULL, NULL, '2023-09-25 15:45:56', '2023-09-25 15:45:56'),
(24, 218, 46, 'Appointment', '/admin/appointment/show/eyJpdiI6IkI5SlZnWnNtMjZ2YUsrenY5ZVo5dGc9PSIsInZhbHVlIjoiQ2FOaEhYelBjeEl1VzM5MTdKRGcyUT09IiwibWFjIjoiNjk0MjNhZDczZjdjMGNhOWIzMTVmNzhlZmMzYjQ4MGUyMDAxNzk5N2JhNDYxOThhNWNlNzJkYzM0NDRiNWYyMyIsInRhZyI6IiJ9', 'Appointment Re-Scheduled', NULL, NULL, 0, 217, NULL, NULL, '2023-09-25 15:45:56', '2023-09-25 15:45:56'),
(25, 217, 46, 'Appointment', '/admin/appointment/show/eyJpdiI6InlDa254SSszeDFFTVRHUTFqQ29LSGc9PSIsInZhbHVlIjoiak1zM0sreXBua0E5cEJtUlNXRjNkQT09IiwibWFjIjoiZDE0YTEyYjRkNGY0NGM4Zjc4Y2MzMmQ5YzYyM2UyZDhlOGUwYmJkYjViODc4YTk0ZmJmZDlhYmRlMThmZjNkZiIsInRhZyI6IiJ9', 'Appointment Approved', NULL, NULL, 0, 217, NULL, NULL, '2023-09-25 15:50:49', '2023-09-25 15:50:49'),
(26, 218, 46, 'Appointment', '/admin/appointment/show/eyJpdiI6ImRnR2dKVXIwdnBpcC9ZQnMrckRjcnc9PSIsInZhbHVlIjoibXN3VHAvd29tV0pYREY4OUN0bjNBdz09IiwibWFjIjoiYjc1MjUwMzEwMDgxNTUwOGJmMDE1MmY3ZDIzYjFlMWNkM2VjOGNmMDQxY2Q5MWQxYWExM2JjMzdiZTRkNGExMSIsInRhZyI6IiJ9', 'Appointment Approved', NULL, NULL, 0, 217, NULL, NULL, '2023-09-25 15:50:49', '2023-09-25 15:50:49'),
(27, 204, 44, 'Appointment', '/admin/appointment/show/eyJpdiI6IldDTWNQTjN5UE04ZVpDYlV2N1VSaGc9PSIsInZhbHVlIjoibUlnY2NFSlIzTGFEOHI3bWJCM1ZzUT09IiwibWFjIjoiOWUwYjhjNjZiNzA3OWNhOWZlYTU0MjRjNjc3NDk2MWI4YWI4Mjc1NmVjNjViMmI1OGNmYzE0Mjc3NGUzNjRhMSIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:32:24', '2023-09-26 14:32:24'),
(28, 221, 44, 'Appointment', '/admin/appointment/show/eyJpdiI6IjM5R01Celo3M3Fib3dqQlY2VFhHakE9PSIsInZhbHVlIjoiUk93a1c5aGg0S0tHN1RzcGJFclNlUT09IiwibWFjIjoiNzk3MzA3Njg2YzQyYWQxMTZjMjMwOGNlNTJkNTNkOGUzMThjZDJjYjVjMmQxYjlkZDMwYWU3NDE1YWRjMDMxYSIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:32:24', '2023-09-26 14:32:24'),
(29, 204, 44, 'Appointment', '/admin/appointment/show/eyJpdiI6IlBNbjFiY0VHNkJUemhJajdGUkdtbkE9PSIsInZhbHVlIjoieGFxWVVURWprelJiczNnbkJSSmFvUT09IiwibWFjIjoiZGM2OGEwMTNlNzg4YTM4ZjNmMTYyZWQzNzRjZTQ4YmMyMThiNzNlNmE5OWZkM2RjMDFhMjVmYzE2MGYwNWU0MyIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:32:37', '2023-09-26 14:32:37'),
(30, 221, 44, 'Appointment', '/admin/appointment/show/eyJpdiI6IjREY3dEQU5maittTklOUjl1OG9FYlE9PSIsInZhbHVlIjoiZng5TUdDZ2FNRGNiR3ZmL1daM3NQdz09IiwibWFjIjoiZjFlNTMxMmIwZDdiOWQwNjE2ODE0ODRiMGRkMTM1MzExODFhNzA5YmVjM2EyYzc4OGQ0NmUxZjhjNTZiMzFjZCIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:32:37', '2023-09-26 14:32:37'),
(31, 204, 44, 'Appointment', '/admin/appointment/show/eyJpdiI6InRVZFVEdWFHd0xVTHowR3czY2g3dnc9PSIsInZhbHVlIjoiNXRPeWNEamJ4dzVZQjIyVi84Zk54QT09IiwibWFjIjoiNjhjZjFiNjQyNmFlOGZiNWQ4MGFiNmZkZDlmMjkzMzcwMmU4NGM3NzIyMDBkZTMwNTVjYzg0ZTk1NzY4NjM0MSIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:32:55', '2023-09-26 14:32:55'),
(32, 208, 44, 'Appointment', '/admin/appointment/show/eyJpdiI6ImVraHkvd05EeldTemdIMGNReE1YNWc9PSIsInZhbHVlIjoiaE5FUXFvRUxHY2o5Q2MxaktBSzhOZz09IiwibWFjIjoiZTg5OTVlMzdlMDE5NjcwM2ZjZTQ0YTI3Y2RjMzE5OWRiMmQ0MDZjN2RhMjQ3YTE2MWY2ZDc1NDcxMjZkZWUyOSIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:32:55', '2023-09-26 14:32:55'),
(33, 20, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6IjdLTW5zQVptVWx6Tk8rQTF3REsvQ1E9PSIsInZhbHVlIjoid0IrTnR2OVU4OUVkcVAyWGJGT3FrZz09IiwibWFjIjoiOTgxNmQ2YmRiY2IxOGVmZTc1MWIzNzRlMTc2Y2E5NTk3ZWRkN2I1NzVkZjQ0MjQwYjUyNmQ5MDk2ZTBkOGQ5NyIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 1, NULL, NULL, '2023-09-26 14:33:52', '2023-09-26 14:33:52'),
(34, 208, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6IlMxS0xyVXRQMzZDSHZVQjJmenI3Vnc9PSIsInZhbHVlIjoiVGVFaW8rZ2MxSE5GYzMzajVvTHhUZz09IiwibWFjIjoiZGNlOWI4MjIxY2MwNTVjMWFiNGRhNTZjY2Q4ZTMwNzA1YTc1NGM2NjY2NmJjMTg0Y2JjOWQ2M2Y2MmNlYWM1YyIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:33:52', '2023-09-26 14:33:52'),
(35, 204, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6IlAyQVZGYitiNDhYMmJBNDQzUitQdWc9PSIsInZhbHVlIjoieENzRC9yYTRYVHNacU1MU1NRZENnUT09IiwibWFjIjoiNzUzYmM1NWQ4ODg1Y2E4OTM5NzkyMGRhMmIzNmVkMGMzMzRhZGUwNjZjYzU2OTBhNTliMDQ1MDU4MjllYTBjNSIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:35:09', '2023-09-26 14:35:09'),
(36, 208, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6InpMdVlSc0hRVUczeitsWm5QSkR2bXc9PSIsInZhbHVlIjoiNFhzSG03aVpibDU4cjRYcmZJUGlpZz09IiwibWFjIjoiOWU5ZGE2ZjBjNzhkMDI0YmMwZTM1ODBkNDYyZTdjMzYxYjdlNDM2MWZlNWU0YmEyZmI0YjUzYmEzYTIxNjdhMiIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:35:09', '2023-09-26 14:35:09'),
(37, 204, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6InV1ZVIvRHhjWnFFOGorbFVNQTFKWXc9PSIsInZhbHVlIjoiNmtDZ0pMS2NIeExid2pIS0VRZFNsZz09IiwibWFjIjoiYjM4YWI2ZTU1ZDQ1ZmRiMjg5ZjgyNjUyYWI1YzZjNzMyYzdkNzNiMDJiNWJjYjBjMDNhYTRkOGVjMWQ1ZjczNCIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:36:15', '2023-09-26 14:36:15'),
(38, 208, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6IkdmVS93K0lrb2d4OHJNSFJrZU85V1E9PSIsInZhbHVlIjoiMkpKZWZlY080MjVjNEh2aEhIKzR6QT09IiwibWFjIjoiNGIyZWUyODIxNzhjZTA2Y2UzZDI4OWFlYTZhODQzZDY4OGRmZjcyMDg3Yzk3NDEyM2NkMWVhNWQyMTdhMmIzNiIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:36:15', '2023-09-26 14:36:15'),
(39, 220, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6Im9lQUg0RnQwbTJ1ODRtY2NOR2ZvT3c9PSIsInZhbHVlIjoiaTMvK3R0WkhUUTdObkQwRG1ZOXErQT09IiwibWFjIjoiMTI0YjRhZjMxMzRjODg5YWJiMDg5ZGNkZmE3YmJiYzA3ODdjZjBhNDI4OTg1ODhkOTcxY2EzODJlOGZmMzE3ZiIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:36:40', '2023-09-26 14:36:40'),
(40, 208, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6IkFmSXM0b2psUjExblhFajlPOU1QTlE9PSIsInZhbHVlIjoibGlCVXZEK0pWeUFKRkxtRlJjV2lLUT09IiwibWFjIjoiZDUyNTM1ODAxZTkwOGQyNjUxMTdlOWFiMTFhN2NlMzhkNjMwYTViZDgyNTRlODYyODJlNGRjNmQ4ZDg3YzQxMyIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:36:40', '2023-09-26 14:36:40'),
(41, 220, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6IjROTEZFeTVrbFhkRWJTMGtPeUNFTEE9PSIsInZhbHVlIjoiL2lJUG9LeTRIcXFFbHVud3g3clAzUT09IiwibWFjIjoiOGYwMGNkMzk2NDdhMTAyMGQ4NmM2NmQ2YzM4YTMyYWJmOWE2MWNhMDY2YWRmMTViMzU5ODAxMjUzZTQ1Y2ZlOCIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:37:14', '2023-09-26 14:37:14'),
(42, 208, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6Ilo0dEEwbFV0MzlqVEQzTUZZd0puSnc9PSIsInZhbHVlIjoiZXhwNUtkck9QNVJza2Jjc1gvUXl6Zz09IiwibWFjIjoiOGQ1ZGY4ODNmNTQwMzQ3ZWZkMDk4M2RlMTU4NWNlNTNlZDVmMmExZWZmNGQzODNlODg1ZDk5NzQ4NjhlNzJhMiIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:37:14', '2023-09-26 14:37:14'),
(43, 220, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6IlkvbUZhdXZXaThoMGdGMktib2IvNnc9PSIsInZhbHVlIjoiMmdOUEtIZlMwUno4TFMrWkNVYkp6UT09IiwibWFjIjoiODgzNmQ0NDU1ZWI4MzNhMTk2MGM3ODc5Y2ZjZDBhNjJlMjhjMDg1ZDNkYTRkOTM2NjAxMmM5M2MxOGE4NzEzMSIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:42:24', '2023-09-26 14:42:24'),
(44, 208, 47, 'Appointment', '/admin/appointment/show/eyJpdiI6ImwranQ0dk5NWUJaWm1MWG9YbzFXZGc9PSIsInZhbHVlIjoib1ozdklhVEFRR1BIY3FVeXo2WDlkQT09IiwibWFjIjoiYzE0MjAzZTk4Y2Q5NTg4ZWIwZThmZmYxYWQyZTE3Y2FiNzU5NWNmOTg2YmE3NDg2NzJhYmRhZTBkMGQzN2FlMiIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:42:24', '2023-09-26 14:42:24'),
(45, 209, 42, 'Appointment', '/admin/appointment/show/eyJpdiI6InZqaHJLMjV1UStXajd4bWVHYTJYUlE9PSIsInZhbHVlIjoiTVVXV2hhNU11WGFya2pZdGVFdDFwUT09IiwibWFjIjoiYTRlNzIxZjFmYzVlNDUxYTJjNzAzODc2Mjk4MzQ4MGVlMmViNWE5OTlkNWM3NzQyZTI2MDU3NWVmNTQzZjMwNiIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:42:44', '2023-09-26 14:42:44'),
(46, 208, 42, 'Appointment', '/admin/appointment/show/eyJpdiI6IkpJc0NhMm0xbTVScnNPZGZEVERoVlE9PSIsInZhbHVlIjoicG1YVVEvV3BkcEtLOS9EMXpYSVI3dz09IiwibWFjIjoiNWMwZDdiOTlhMTU1MjJjNTZhOTk1ZTJhNzViYmU5NGUyYzdjYTZjNDZkMWJlNjM1ZTNkZTNjNmRmMGY0N2E1OCIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:42:44', '2023-09-26 14:42:44'),
(47, 20, 48, 'Appointment', '/admin/appointment/show/eyJpdiI6Ijg0aFVrd1BjVUxiMzgrZnhQNnRTSEE9PSIsInZhbHVlIjoiNjNmbTl2SmxBUjU0Vkp3TFRhQjJWZz09IiwibWFjIjoiNjVkM2ZmNTc4NTk4NGZmNGU5MjQxY2Q1NTE5MDNlYzZhNTQ5ZjQ2MGU3MzUyZWY1NmUwZjQ5ZjkyYzkwZjQwMCIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 1, NULL, NULL, '2023-09-26 14:46:15', '2023-09-26 14:46:15'),
(48, 221, 48, 'Appointment', '/admin/appointment/show/eyJpdiI6IjlSUm0raDQ2bjFDN3dHb2w3c0lObnc9PSIsInZhbHVlIjoic29JL2ZJVW52Rkp4dWNuQzN5VXJVdz09IiwibWFjIjoiMGVkZWQyYmZkMTAzYjlkZGE5NTQ5YTNlNmE1YjQ4YjM0YjhmNGVmNDcwOTkzNjAyYjNhN2ZjZjZlOTNjMWJjMiIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:46:15', '2023-09-26 14:46:15'),
(49, 204, 48, 'Appointment', '/admin/appointment/show/eyJpdiI6IkJSNDRiUGFFTEs1VUpZZGQwUjlrUUE9PSIsInZhbHVlIjoiRG9pWjhuQjVObE4va3h5ZStEVS81dz09IiwibWFjIjoiNTlhMTcxZTM0OTQ1ZWYzZTYwYmZiZTcwNzFmZTk4OGFkY2M5NjZlYjViMjFlOGRkMmIxYzM4NTZkNmY1MGRjYyIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:47:13', '2023-09-26 14:47:13'),
(50, 221, 48, 'Appointment', '/admin/appointment/show/eyJpdiI6IkhSV1lTbnREWXdlcW9oUU5wdEhKWkE9PSIsInZhbHVlIjoidUdhOWYrM24zYlFBaWNQd215SDJndz09IiwibWFjIjoiNDc1NjRhMTRlMTYwNWJkZTY4MDI4MWQ0YjI4NmY4ODc0NzY0ZWE1ZjI4NGEwZTU5ZjVlYzBkNzRjYWQ5MzlhYSIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:47:13', '2023-09-26 14:47:13'),
(51, 204, 48, 'Appointment', '/admin/appointment/show/eyJpdiI6Iit1SkhWaVJjbVI5c2dRdldtZEVJVWc9PSIsInZhbHVlIjoiR1U0UzljemZ2MlhHWjU1TDFQOHBGZz09IiwibWFjIjoiZTk1MDMxNjg4YjM2YzZkYjYzYWRmODY0Y2IzOGQzMzk3ZTk4OTQ2ZTRmYjhkMjk5OTg3ZmIxNWVlYzI3MjE4YiIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:47:43', '2023-09-26 14:47:43'),
(52, 221, 48, 'Appointment', '/admin/appointment/show/eyJpdiI6IlVSZDVnbm9KYzJwbFZlSDFxN3JaaFE9PSIsInZhbHVlIjoiSHZZZ0NFSlByWEFmcDBaN1JkK0VlUT09IiwibWFjIjoiM2ZiZDM2Y2M1NDlkNzlkODIxYTBmYWE1NTFiNzFjZjY1NzViNTFlZGY5MDNkNTdhZmJjOTJlMTRlOWI0ZjhlYyIsInRhZyI6IiJ9', 'Appointment Updated', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:47:43', '2023-09-26 14:47:43'),
(53, 20, 49, 'Appointment', '/admin/appointment/show/eyJpdiI6IitPN21wZ3dZQTNINytZblk0U0dyNmc9PSIsInZhbHVlIjoiaVZzbmdtbXVacWcrcHZ5REFzWXQxZz09IiwibWFjIjoiNjM2MmU5Y2Y5N2JhZmY4NjE5Yzg2ZDNkNDRhNjUzYTgwNDUyMTQwYzlhOTQ2ZTNlODk5Yzg0YjQxZTFlMzI3NyIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 1, NULL, NULL, '2023-09-26 14:48:27', '2023-09-26 14:48:27'),
(54, 218, 49, 'Appointment', '/admin/appointment/show/eyJpdiI6IkhHaUQ3L2pIZVdLWllDdDlERHJFN0E9PSIsInZhbHVlIjoiMG9rRWJoUjFLdC9idzRjRDkzRFNsQT09IiwibWFjIjoiZWFlMjljMWU4YzYzZDNkOGIwMTE2MzhiMzJlMDc5N2FjODllZGNkNjNlMTE4ZDNiNmRlZDJhZjUwM2U1MzYzNSIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 1, NULL, NULL, '2023-09-26 14:48:27', '2023-09-26 14:48:27'),
(55, 4, 1, 'Appointment', '/admin/appointment/show/eyJpdiI6IlB3R0IyS3ZqUzNTVFJjc3JVazBJVWc9PSIsInZhbHVlIjoiNnhudHVCaHU4ZWF6WGNFTDB4WTdJdz09IiwibWFjIjoiODIzMDgzOWUxOGI2NmJhMTExY2E2YmRjZmQ0N2U3YjM1NzI2Y2RiMjhhODJlYWQyZTUwMjAwZDJhYWY3YTBkMiIsInRhZyI6IiJ9', 'New appointment created for you', 1, NULL, 0, 203, NULL, NULL, '2024-01-25 09:59:28', '2024-01-25 09:59:28'),
(56, 203, 1, 'Appointment', '/admin/appointment/show/eyJpdiI6IlB6eHN1N1lQZVZrelNmM2VNRndjUHc9PSIsInZhbHVlIjoidXhYRE5rdUJ2ZzdvVUE3WFlqbkNyUT09IiwibWFjIjoiYmU0OGZiMTNjMDk1ZmFiMzg0NTQ5OTliZmVlZDg0NTJiZmU1YzllM2NiMTBjY2FmMjg3NDMyN2QyMTlmZTMyMyIsInRhZyI6IiJ9', 'New appointment created for you', NULL, NULL, 0, 203, NULL, NULL, '2024-01-25 09:59:28', '2024-01-25 09:59:28'),
(57, 4, 1, 'Appointment', '/admin/appointment/show/eyJpdiI6IkZPVWl6WmtyZjBGZTVyYmdIRHlTUXc9PSIsInZhbHVlIjoiNk5KN2dxZHRLMFhHck9HTVNOYjR6QT09IiwibWFjIjoiYzYyYjhiNmE0MzFlYTNkNmQ2Nzg2ZDk3MTE3NjA1NWFhNWNkZTU0NTI2NTFkM2MwNmI3MGY4YTlmZGNjMmM0MSIsInRhZyI6IiJ9', 'Appointment Approved', 1, NULL, 0, 4, NULL, NULL, '2024-01-25 10:01:16', '2024-01-25 10:01:16'),
(58, 203, 1, 'Appointment', '/admin/appointment/show/eyJpdiI6IlV3MnE3aklyZXZ4ZXR5QmVGRk5DSHc9PSIsInZhbHVlIjoiNzlCaTlITnl3MEZYcFJuNHpqK0twdz09IiwibWFjIjoiNDgwMzU5MTUyMWJjYzMwMjAyNGQyZGVmOGFlOWE3ZjkwOTFmMDU2NzcwMWI1NjZlNDA0YTdhMmU3YzRmMThjOSIsInRhZyI6IiJ9', 'Appointment Approved', NULL, NULL, 0, 4, NULL, NULL, '2024-01-25 10:01:16', '2024-01-25 10:01:16');

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
(2, 'Branch Office', 1, 1, 1, '2023-08-29 03:13:29', '2023-09-26 14:05:34'),
(3, 'Head Office', 1, 1, 1, '2023-09-26 14:04:27', '2023-09-26 14:05:01');

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
(2, 'Office Category Two', 0, 1, 1, '2023-08-29 05:27:10', '2023-09-26 14:06:27'),
(3, 'Grade A', 1, 1, NULL, '2023-09-25 14:42:19', '2023-09-25 14:42:19'),
(4, 'Grade B', 1, 1, 1, '2023-09-25 14:42:30', '2023-09-26 14:06:22'),
(5, 'Grade C', 1, 1, NULL, '2023-09-25 16:44:56', '2023-09-25 16:44:56');

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
(349, 'monthly_chart', NULL, 1, 1, NULL, '2023-09-03 03:15:14', '2023-09-03 03:15:14');

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
(3, NULL, 'Employee', 'কর্মচারী', 'Employee', 3, 1, 1, 219, '2023-01-24 11:39:02', '2023-09-25 16:34:01'),
(4, NULL, 'Visitor', 'অতিথি', 'Visitor', 4, 1, 1, 219, '2023-01-24 11:39:02', '2023-09-25 16:34:29'),
(5, NULL, 'Receptionist', 'রিসেপশনিস্ট', 'Receptionist', 5, 1, 1, 219, '2023-01-24 11:39:02', '2023-09-25 16:34:58');

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
(3495, NULL, 4, 7, 2, NULL, '2022-06-29 16:53:12', '2022-06-29 16:53:12'),
(3496, NULL, 6, 7, 2, NULL, '2022-06-29 16:53:12', '2022-06-29 16:53:12'),
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
(4159, NULL, 343, 3, 1, NULL, '2023-09-24 11:22:41', '2023-09-24 11:22:41'),
(4164, NULL, 53, 3, 1, NULL, '2023-09-25 14:58:27', '2023-09-25 14:58:27'),
(4165, NULL, 321, 3, 1, NULL, '2023-09-25 14:58:27', '2023-09-25 14:58:27'),
(4166, NULL, 341, 3, 1, NULL, '2023-09-25 14:58:27', '2023-09-25 14:58:27'),
(4167, NULL, 342, 3, 1, NULL, '2023-09-25 14:58:27', '2023-09-25 14:58:27');

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
(1, 'Bangladesh Telecommunication Regulatory Commission', 'BTRC', 'logo2023_09_25_122920_57164250.jpg', 'IEB Bhaban (5,6 & 7 floor), Ramna, Dhaka-1000', '016577', '+88022233866777777', 'btrc@btrc.gov.bd', '011515151515151515151515151515151', '01254898745', 'admin@gmail.com', NULL, NULL, '219', NULL, '2023-09-25 16:38:12');

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
(1, 'Super Admin', 'Super Admin', 'superadmin@gmail.com', '01', 0, 1, 1, NULL, '$2y$10$6jSUKHOsgQV/CRiU6qhm5uORhengWzKIOwPs0CyYGjbXVwXNt9OR6', NULL, '2022-08-25 12:33:48', '2023-09-26 14:02:15'),
(4, 'Employee', 'Tauhid (Employee)', 'tauhid.hasan@sebpo.com', '01677163339', 0, 3, 1, NULL, '$2a$12$ZCXkynIbX1ft3uJ4fE5jkOGEOhBHo9f5UTKug6mw3hRYmOhq1lFre', NULL, '2022-09-20 12:38:59', '2022-09-25 17:24:21'),
(20, 'Reception', 'Reception', 'reception@gmail.com', '217', 0, 5, 1, NULL, '$2a$12$ZCXkynIbX1ft3uJ4fE5jkOGEOhBHo9f5UTKug6mw3hRYmOhq1lFre', NULL, '2023-01-29 12:33:16', '2023-01-29 12:33:16'),
(203, 'Tauhid', 'Tauhid Hasan (Visitor)', 'm.tah69@gmail.com', '01537152126', 4, 4, 1, NULL, '$2y$10$6jSUKHOsgQV/CRiU6qhm5uORhengWzKIOwPs0CyYGjbXVwXNt9OR6', 'rvLNfBDSTIFKUYlqdueViShmdx215O0KatO1efhekGNQE0FdFt7XPan30iyY', '2023-08-24 03:53:41', '2023-09-05 05:26:44'),
(204, 'Thor Freeman', 'Thor Freeman', 'tanulup@mailinator.com', 'Quam velit de', 0, 3, 1, NULL, '$2y$10$DC3lMGLf5bAop9vX3ilqru6TbTG6p5Oj8cwnUA1UvOxGXBPSQXjO.', NULL, '2023-08-30 06:01:07', '2023-08-30 06:01:07'),
(205, 'Ethan Alexander', 'Ethan Alexander', 'vehazu@mailinator.com', 'Animi dolores', 0, 5, 1, NULL, '$2y$10$xEW4s.YqFKHwisLP4jSruuSP/d9A8lJkLlYSuScAsqw55lA4jKu4e', NULL, '2023-08-30 06:01:43', '2023-08-30 06:01:43'),
(206, 'Demetria Rutledge', 'Demetria Rutledge', 'boriw@mailinator.com', 'Sit accusamus', 0, 3, 1, NULL, '$2y$10$30ygtwj1EQwgIeMUVU9Woub9qwLPQZtvBdp5eJBR38gQDcsPkCNr6', NULL, '2023-08-30 06:02:00', '2023-08-30 06:02:00'),
(207, 'Edited User', 'Edited User', 'edited@mail.com', '15987456232', 0, 3, 1, NULL, '$2y$10$/UNGMujrOXmSYH6KVxOpO.nnnbGfjAQdAHfjI4cl6hoAplQeyJLwe', NULL, '2023-08-30 06:02:36', '2023-08-30 06:52:46'),
(208, NULL, 'Md. Mashrekul Arefin', 'mashrekuldhrubo@gmail.com', '01774230023', 4, 4, 1, NULL, '$2y$10$mZ.nPZQgHR5AgyTNd.Iq/OqJdKvtCNIQS7RvjGc4/1PoZd57WN.3i', NULL, '2023-09-24 10:59:40', '2023-09-24 10:59:40'),
(209, 'Md. Mashrekul Arefin Dhrubo', 'Md. Mashrekul Arefin Dhrubo', 'mashrekuldhrubo17@gmail.com', '01309079321', 0, 3, 1, NULL, '$2y$10$gBx2jBwPVLQ4UJHWe4f1meEakiwk3ADxMSkqRhrXzQH3uTUiDqfF.', NULL, '2023-09-24 11:14:23', '2023-09-24 11:14:23'),
(210, 'Adria Long', 'Macaulay Flowers', 'keke@mailinator.com', '15975342698', 4, 4, 2, NULL, '$2y$10$kg5t6d0m6PF5InKFIWTDtuvxlDFGXSroChXr89jwo676r/b8Mkva2', NULL, '2023-09-24 16:03:13', '2023-09-24 16:03:13'),
(211, 'Madeson Hart', 'Nerea Ingram', 'wolapug@mailinator.com', '78965412365', 4, 4, 2, NULL, '$2y$10$rugZVGyjWJzOMGJ5wsVcU.vmNLkJl/nEb1LWpCMqvqI42rU3pBSve', NULL, '2023-09-24 16:07:15', '2023-09-24 16:07:15'),
(212, 'Deanna Estrada', 'Deanna Estrada', 'myqifyxu@mailinator.com', '26145874585', 0, 3, 1, NULL, '$2y$10$0NzHRfGJVwjCkAo8fwdovOEskNZyIOAJDyrL78/AHtxr4ELbeLDi2', NULL, '2023-09-24 16:40:59', '2023-09-24 16:40:59'),
(213, 'Angela Cleveland', 'Addison Miranda', 'zesydem@mailinator.com', '98471236478', 4, 4, 1, NULL, '$2y$10$3cNLPNHgbmutFDIglh6x0OUVKdmy9Z5hesPt1v6tmWcmLkq0AW7ai', NULL, '2023-09-24 16:42:06', '2023-09-24 16:42:06'),
(216, 'Rokib', 'Rokib', 'prottoyrahman@outlook.com', '01781161011', 4, 4, 1, NULL, '$2y$10$6hiDMwa2aT1T43t0Od2ZWeriGX6J//6.rmWyXkw5hSCKdzLrZ9qs.', NULL, '2023-09-25 14:29:02', '2023-09-25 15:33:07'),
(217, 'Ahsan', 'Ahsan', 'prottoyrahman77@gmail.com', '01581503744', 0, 3, 1, NULL, '$2y$10$LEuRqy42aF7SAyKHwAn50uVKgAdvRsmcZUjfmDj0ze1stHw0Bedx2', NULL, '2023-09-25 14:34:07', '2023-09-25 14:34:07'),
(218, 'N/A', 'Sajid', 'mhasiburrahman01@gmail.com', '01781161012', 4, 4, 1, NULL, '$2y$10$dUSFJDgZ7gteoI2LbC3eDOzo6l7VOptZUumiPHb/NO1JIvULVRwlG', NULL, '2023-09-25 15:38:08', '2023-09-26 14:26:03'),
(219, 'Tahmina', 'Tahmina', 'tahmina@gmail.com', '01912972887', 0, 2, 1, NULL, '$2y$10$p/d7A2xtFrfkQeRBdohXj.6sdTWAXMORDkUkTdqEaqKYDCF0EFyEy', NULL, '2023-09-25 16:27:22', '2023-09-25 16:27:22'),
(220, 'Mahim Sarker', 'Mahim Sarker', 'mahim@gmail.com', '01458789654', 0, 3, 1, NULL, '$2y$10$P9wpP/t87fCcekQtvL2zFO.tsLdQbtQbKOs/R2xEqcwWRHdrs.Tb2', NULL, '2023-09-26 13:47:33', '2023-09-26 13:56:51'),
(221, 'N/A', 'ABC', 'a@y', '12345678912', 4, 4, 1, NULL, '$2y$10$1C.sqFhj5h8DQZ8vHpnQqeZgxlPG2PVPgx6oYtJSPSIqYMT9t64.m', NULL, '2023-09-26 14:28:01', '2023-09-26 14:28:21');

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
(157, 1, 7, 20, 49, 'modhupur', '1111', 4, 11, 6, 'nania', '9999', 'Kawran Bazar, Dhaka', 'Kawran Bazar, Dhaka', 0, '2023-02-08 09:22:15', '2023-09-24 16:13:31'),
(159, 202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-23 01:38:42', '2023-08-23 01:38:42'),
(160, 204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Consequatur ut ea o', 'Dolore eum mollitia', NULL, '2023-08-30 06:01:07', '2023-08-30 06:01:07'),
(161, 205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et odit explicabo A', 'Hic excepturi at in', NULL, '2023-08-30 06:01:43', '2023-08-30 06:01:43'),
(162, 206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Itaque pariatur Ut', 'Ab praesentium dolor', NULL, '2023-08-30 06:02:00', '2023-08-30 06:02:00'),
(163, 207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pariatur Quis paria', 'Animi facilis ex id', NULL, '2023-08-30 06:02:36', '2023-08-30 06:02:36'),
(164, 209, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dhanmondi 27', 'Thakurgaon', NULL, '2023-09-24 11:14:23', '2023-09-24 11:14:23'),
(165, 210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 16:03:13', '2023-09-24 16:03:13'),
(166, 211, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 16:07:15', '2023-09-24 16:07:15'),
(167, 212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'At ut ut perspiciati', 'In et officia archit', NULL, '2023-09-24 16:40:59', '2023-09-24 16:40:59'),
(168, 214, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 14:09:10', '2023-09-25 14:09:10'),
(169, 215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 14:23:50', '2023-09-25 14:23:50'),
(170, 216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 14:29:02', '2023-09-25 14:29:02'),
(171, 217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dhaka', 'Dhaka', NULL, '2023-09-25 14:34:07', '2023-09-25 14:34:07'),
(172, 218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 15:38:08', '2023-09-25 15:38:08'),
(173, 219, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dhaka', 'Dhaka', NULL, '2023-09-25 16:27:22', '2023-09-25 16:27:22'),
(174, 220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dhaka', 'Dhaka', NULL, '2023-09-26 13:47:33', '2023-09-26 13:47:33');

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
(184, 203, 2, 3, 'Sint rerum ut quia', 'userImage2023_09_24_120715_71204484.jpg', NULL, 'Female', '2000-02-23', NULL, '935asigjhggh', NULL, '934asdfasdf', '606', NULL, 1, 'Travis Keith Trading', 'Sit voluptatibus ame', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-08-24 03:53:41', '2023-09-24 16:07:15', NULL),
(185, 1, 2, 1, 'Adipisicing inventor', '1image2023_10_01_091532_83891587.jpg', 1, 'Male', '1956-03-15', 'n/a', NULL, 3, NULL, NULL, 'Islam', 0, 'Add org', 'Exicutive', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, 'Married', NULL, NULL, NULL, 1, 1, '2023-01-29 12:33:16', '2023-10-01 13:15:32', NULL),
(186, 4, 2, 2, 'Adipisicing inventor', 'userImage2023_01_29_063316_64364711.jpg', 1, 'Male', '1956-03-15', 'n/a', NULL, 3, NULL, NULL, 'Islam', 0, 'Add org', 'Exicutive', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, 'Married', NULL, NULL, NULL, 1, 1, '2023-01-29 12:33:16', '2023-03-09 19:26:34', NULL),
(187, 20, 2, 2, 'Adipisicing inventor', 'userImage2023_01_29_063316_64364711.jpg', 1, 'Male', '1956-03-15', 'n/a', NULL, 3, NULL, NULL, 'Islam', 0, 'Add org', 'Exicutive', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, 'Married', NULL, NULL, NULL, 1, 1, '2023-01-29 12:33:16', '2023-03-09 19:26:34', NULL),
(188, 204, 2, 16, 'Consequatur ut ea o', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-30 06:01:07', '2023-08-30 06:01:07', NULL),
(189, 205, 2, 5, 'Et odit explicabo A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-30 06:01:43', '2023-08-30 06:01:43', NULL),
(190, 206, 2, 15, 'Itaque pariatur Ut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-30 06:02:00', '2023-08-30 06:02:00', NULL),
(191, 207, 2, 1, 'Pariatur Quis paria', '207image2023_08_30_125034_93252552.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-30 06:02:36', '2023-08-30 06:50:34', NULL),
(192, 208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, '2023-09-24 10:59:40', '2023-09-24 10:59:40', NULL),
(193, 209, 4, 4, 'Dhanmondi 27', '209image2023_09_24_121711_95821021.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 11:14:23', '2023-09-24 16:17:11', NULL),
(194, 210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 210, NULL, '2023-09-24 16:03:13', '2023-09-24 16:03:13', NULL),
(195, 211, NULL, NULL, NULL, 'userImage2023_09_24_120715_74479155.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 211, NULL, '2023-09-24 16:07:15', '2023-09-24 16:07:15', NULL),
(196, 212, 6, 7, 'At ut ut perspiciati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 16:40:59', '2023-09-24 16:40:59', NULL),
(197, 213, NULL, NULL, 'Optio reprehenderit', NULL, NULL, 'Male', '1997-09-03', NULL, '749', NULL, '405', '299', NULL, 1, 'Schmidt Garza Associates', 'Eum iste atque aliqu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, '2023-09-24 16:42:06', '2023-09-24 16:42:06', NULL),
(200, 216, NULL, NULL, NULL, 'userImage2023_09_25_102902_38099334.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 216, NULL, '2023-09-25 14:29:02', '2023-09-25 14:29:02', NULL),
(201, 217, 4, 12, 'Dhaka', '217image2023_09_25_103407_99174042.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 14:34:07', '2023-09-25 14:34:07', NULL),
(202, 218, NULL, NULL, 'N/A', 'userImage2023_09_25_113808_22398037.jpg', NULL, 'Male', NULL, NULL, 'N/A', NULL, 'N/A', 'N/A', NULL, 1, 'N/A', 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 218, 1, '2023-09-25 15:38:08', '2023-09-26 14:21:47', NULL),
(203, 219, 6, 1, 'Dhaka', '219image2023_09_25_122722_82495244.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 16:27:22', '2023-09-25 16:27:22', NULL),
(204, 220, 5, 5, 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-26 13:47:33', '2023-09-26 13:47:33', NULL),
(205, 221, NULL, NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, 'N/A', 'N/A', NULL, 1, 'N/A', 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-09-26 14:28:01', '2023-09-26 14:28:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `office_categories`
--
ALTER TABLE `office_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4168;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
