-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2022 at 07:46 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `support_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(2, 'Amreli district', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(3, 'Anand', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(4, 'Banaskantha', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(5, 'Bharuch', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(6, 'Bhavnagar', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(7, 'Dahod', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(8, 'The Dangs', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(9, 'Gandhinagar', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(10, 'Jamnagar', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(11, 'Junagadh', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(12, 'Kutch', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(13, 'Kheda', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(14, 'Mehsana', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(15, 'Narmada', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(16, 'Navsari', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(17, 'Patan', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(18, 'Panchmahal', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(19, 'Porbandar', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(20, 'Rajkot', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(21, 'Sabarkantha', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(22, 'Surendranagar', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(23, 'Surat', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(24, 'Vyara', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(25, 'Vadodara', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(26, 'Valsad', 7, '2022-05-16 04:01:44', '2022-05-16 04:01:44'),
(27, 'Ajmer', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(28, 'Alwar', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(29, 'Bikaner', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(30, 'Barmer', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(31, 'Banswara', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(32, 'Bharatpur', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(33, 'Baran', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(34, 'Bundi', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(35, 'Bhilwara', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(36, 'Churu', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(37, 'Chittorgarh', 22, '2022-05-16 04:03:02', '2022-05-16 04:03:02'),
(38, 'Dausa', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(39, 'Dholpur', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(40, 'Dungapur', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(41, 'Ganganagar', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(42, 'Hanumangarh', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(43, 'Jhunjhunu', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(44, 'Jalore', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(45, 'Jodhpur', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(46, 'Jaipur', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(47, 'Jaisalmer', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(48, 'Jhalawar', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(49, 'Karauli', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(50, 'Kota', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(51, 'Nagaur', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(52, 'Pali', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(53, 'Pratapgarh', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(54, 'Rajsamand', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(55, 'Sikar', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(56, 'Sawai Madhopur', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(57, 'Sirohi', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(58, 'Tonk', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(59, 'Udaipur', 22, '2022-05-16 04:03:03', '2022-05-16 04:03:03'),
(60, 'Alirajpur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(61, 'Anuppur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(62, 'Ashok Nagar', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(63, 'Balaghat', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(64, 'Barwani', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(65, 'Betul', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(66, 'Bhind', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(67, 'Bhopal', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(68, 'Burhanpur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(69, 'Chhatarpur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(70, 'Chhindwara', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(71, 'Damoh', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(72, 'Datia', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(73, 'Dewas', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(74, 'Dhar', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(75, 'Dindori', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(76, 'Guna', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(77, 'Gwalior', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(78, 'Harda', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(79, 'Hoshangabad', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(80, 'Indore', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(81, 'Jabalpur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(82, 'Jhabua', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(83, 'Katni', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(84, 'Khandwa (East Nimar)', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(85, 'Khargone (West Nimar)', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(86, 'Mandla', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(87, 'Mandsaur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(88, 'Morena', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(89, 'Narsinghpur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(90, 'Neemuch', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(91, 'Panna', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(92, 'Rewa', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(93, 'Rajgarh', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(94, 'Ratlam', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(95, 'Raisen', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(96, 'Sagar', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(97, 'Satna', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(98, 'Sehore', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(99, 'Seoni', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(100, 'Shahdol', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(101, 'Shajapur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(102, 'Sheopur', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(103, 'Shivpuri', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(104, 'Sidhi', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(105, 'Singrauli', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(106, 'Tikamgarh', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(107, 'Ujjain', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(108, 'Umaria', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(109, 'Vidisha', 14, '2022-05-16 04:03:44', '2022-05-16 04:03:44'),
(110, 'Ahmednagar', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(111, 'Akola', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(112, 'Amravati', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(113, 'Aurangabad', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(114, 'Bhandara', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(115, 'Beed', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(116, 'Buldhana', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(117, 'Chandrapur', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(118, 'Dhule', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(119, 'Gadchiroli', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(120, 'Gondia', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(121, 'Hingoli', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(122, 'Jalgaon', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(123, 'Jalna', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(124, 'Kolhapur', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(125, 'Latur', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(126, 'Mumbai City', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(127, 'Mumbai suburban', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(128, 'Nandurbar', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(129, 'Nanded', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(130, 'Nagpur', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(131, 'Nashik', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(132, 'Osmanabad', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(133, 'Parbhani', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(134, 'Pune', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(135, 'Raigad', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(136, 'Ratnagiri', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(137, 'Sindhudurg', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(138, 'Sangli', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(139, 'Solapur', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(140, 'Satara', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(141, 'Thane', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(142, 'Wardha', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(143, 'Washim', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37'),
(144, 'Yavatmal', 15, '2022-05-16 04:04:37', '2022-05-16 04:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` bigint DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `state_id` int NOT NULL DEFAULT '0',
  `city_id` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `external_id`, `first_name`, `last_name`, `email`, `mobile_number`, `address`, `state_id`, `city_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, '1', 'New', 'client', 'new@gmail.com', 9913224590, 'This is new address', 7, 2, 'storage/assets/clients/profile_pics/new_1653300053.png', '2022-04-13 06:19:37', '2022-05-23 04:30:53'),
(2, '2', 'client', 'name 2', 'client@gmail.com2', 9974813152, 'This is Address line', 0, 1, '', '2022-04-13 06:19:53', '2022-04-28 02:34:36'),
(3, 'd59e36dd-a719-41f9-bad6-df48f641d500', 'client', 'name 2', 'client2@gmail.com', 7567130895, 'This is Address line', 0, 1, '', '2022-04-23 06:53:10', '2022-04-26 05:15:50'),
(4, 'e88a705c-a8f9-42c1-81cf-600b59398418', 'new client', 'name 2', 'client3@gmail.com', 9974813153, 'This is Address line', 0, 1, 'storage/assets/clients/profile_pics/new_client_1651814070.png', '2022-05-05 23:44:30', '2022-05-05 23:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `complain_types`
--

CREATE TABLE `complain_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complain_types`
--

INSERT INTO `complain_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(3, 'repairing', '2022-05-23 06:12:51', '2022-05-23 06:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` bigint NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `price`, `date`) VALUES
(1, 'House Rent', 250, '2022-05-15'),
(2, 'Movie ticket', 500, '2022-05-15'),
(8, 'sneacks', 250, '2001-05-03'),
(9, 'data', 1200, '2022-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `user_id` int DEFAULT NULL,
  `client_id` int NOT NULL DEFAULT '0',
  `complaint_type` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `external_id`, `feedback`, `user_id`, `client_id`, `complaint_type`, `status`, `created_at`, `updated_at`) VALUES
(5, 'da9fbd9a-37de-4f19-92f4-e8bd0825c004', 'This is My Feedback 3', 1, 0, 3, 2, '2022-04-23 06:55:45', '2022-05-13 07:04:43'),
(6, 'df30fb6a-934d-47df-915c-2b8f5fbab336', 'This is My Feedback 3', 1, 3, 3, 2, '2022-04-29 04:11:44', '2022-05-13 07:09:30'),
(7, 'c2bae9a7-cbc4-4f7a-b3e3-17c835923f68', 'nothinf', 1, 3, 3, 1, '2022-04-29 04:12:28', '2022-04-29 04:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `inwards`
--

CREATE TABLE `inwards` (
  `id` int UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int NOT NULL DEFAULT '0',
  `customer_id` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL DEFAULT '0',
  `mode_of_receive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `fault` text COLLATE utf8mb4_unicode_ci,
  `barcode_scan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inwards`
--

INSERT INTO `inwards` (`id`, `external_id`, `task_id`, `customer_id`, `product_id`, `mode_of_receive`, `product_description`, `fault`, `barcode_scan`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 6, 0, 0, 'hand to hand 1', NULL, 'nothing', 'code scan data', 2, '2022-04-15 04:52:49', '2022-05-05 01:41:55'),
(2, '', 6, 0, 0, 'hand to hand', NULL, 'yes', 'code scan data', 3, '2022-04-15 04:54:47', '2022-05-05 01:42:09'),
(3, 'dddb29ea-42ba-4b82-9797-456d66310432', 7, 0, 0, 'hand to hand', NULL, 'This is the fault line 2', 'code scan data', 1, '2022-04-23 06:53:35', '2022-04-28 07:14:22'),
(4, '7d8eb8de-1c47-4ff0-9141-2acf8ff45142', 7, 0, 0, 'hand to hand', NULL, 'This is the fault line', 'code scan data', 1, '2022-04-23 06:54:49', '2022-04-23 06:54:49'),
(5, '3e6d679f-365a-49b7-9e31-6deb30d011ee', 6, 0, 0, 'hand to hand', NULL, 'This is the fault line', 'code scan data', 1, '2022-04-27 05:58:00', '2022-04-27 05:58:00'),
(6, '6e722a4a-a031-4ba4-bd9c-ba44b36d3f54', 3, 0, 0, 'hand to hand', NULL, 'This is the fault line', 'code scan data', 2, '2022-05-06 06:19:01', '2022-05-12 23:31:43'),
(7, '9658623d-dbc1-434f-857f-ea9181a63579', 3, 0, 1, 'hand to hand', 'This is product description details', 'This is the fault line', 'code scan data', 1, '2022-05-13 04:07:37', '2022-05-13 04:07:37'),
(8, '9a968f2e-7c26-464d-a1f4-7b5164e7e542', 3, 0, 1, 'hand to hand', 'This is product description details', 'This is the fault line', 'code scan data', 1, '2022-05-13 05:12:23', '2022-05-13 05:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci,
  `task_id` int UNSIGNED NOT NULL,
  `assign` int UNSIGNED NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `external_id`, `date`, `end_date`, `instruction`, `task_id`, `assign`, `status`, `created_at`, `updated_at`) VALUES
(1, '', '2022-04-11', '2022-04-15', 'This is instruction details', 1, 1, 4, '2022-04-13 06:00:49', '2022-05-02 05:37:50'),
(2, '', '2022-04-12', NULL, 'nothing', 1, 1, 1, '2022-04-20 06:17:55', '2022-04-20 06:17:55'),
(3, '508a6e4f-79da-4509-91e8-3fb10ed578a6', '2022-04-13', NULL, 'This is instruction details', 1, 1, 4, '2022-04-23 06:53:28', '2022-04-23 06:53:28'),
(4, '16c50def-a58c-432b-b2cd-e012e79ff6e3', '2022-04-14', NULL, 'This is instruction details', 1, 1, 1, '2022-05-02 23:23:27', '2022-05-02 23:23:27'),
(5, 'e46f10bf-2963-4e5d-8ef2-67bf401e65bd', '2022-04-11', NULL, 'This is instruction details', 1, 1, 4, '2022-05-02 23:32:07', '2022-05-05 02:18:24'),
(6, '3176e117-d6b2-4b54-b7f7-6959a94ace06', '2022-04-11', NULL, 'This is instruction details', 9, 1, 1, '2022-05-17 05:14:21', '2022-05-17 05:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `job_submits`
--

CREATE TABLE `job_submits` (
  `id` int UNSIGNED NOT NULL,
  `job_date` date NOT NULL,
  `dignosys` text COLLATE utf8mb4_unicode_ci,
  `job_id` int UNSIGNED NOT NULL,
  `action_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_bike` int NOT NULL DEFAULT '0',
  `is_outdoor` int NOT NULL DEFAULT '0',
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expensive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_submits`
--

INSERT INTO `job_submits` (`id`, `job_date`, `dignosys`, `job_id`, `action_taken`, `task_type`, `is_bike`, `is_outdoor`, `total`, `expensive`, `image`, `created_at`, `updated_at`) VALUES
(1, '2022-04-14', 'This is dignosys', 1, 'installation', 'Project', 1, 1, '100', '200', '', '2022-04-19 03:33:47', '2022-04-19 03:33:47'),
(2, '2022-04-14', 'This is dignosys', 1, 'installation', 'Project', 1, 1, '100', '200', '', '2022-04-27 06:17:08', '2022-04-27 06:17:08'),
(3, '2022-04-14', 'This is dignosys', 1, 'installation', 'Project', 1, 1, '100', '200', '', '2022-04-27 06:18:54', '2022-04-27 06:18:54'),
(4, '2022-04-14', 'This is dignosys', 1, 'installation', 'Project', 1, 1, '100', '200', '', '2022-05-02 05:37:50', '2022-05-02 05:37:50'),
(5, '2022-04-14', 'This is dignosys', 5, 'installation', 'Project', 1, 1, '100', '200', '', '2022-05-05 02:18:24', '2022-05-05 02:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_08_123616_create_tasks_table', 1),
(13, '2022_04_11_120321_create_task_types_table', 2),
(16, '2022_04_12_094111_add_profile_column_users', 4),
(17, '2022_04_12_101644_add_column_tasks', 5),
(18, '2022_04_12_105110_add_otp_to_users_table', 6),
(20, '2022_04_13_095709_create_jobs_table', 7),
(21, '2022_04_08_112035_create_clients_table', 8),
(22, '2022_04_11_123811_add_city_to_clients_table', 8),
(23, '2022_04_14_084901_create_job_submits_table', 9),
(24, '2022_04_15_090328_create_inwards_table', 10),
(26, '2022_04_15_104246_create_products_table', 11),
(27, '2022_04_18_084031_create_r_i_d_f_s_table', 12),
(30, '2022_04_18_095321_create_feedback_table', 13),
(32, '2022_04_23_090819_add_external_id_column_to_tables', 14),
(34, '2022_04_23_113308_add_otp_verified_at_column', 15),
(36, '2022_04_26_101015_add_name_column_to_tasks_table', 16),
(37, '2022_04_27_111022_add_task_column_to_inward', 17),
(38, '2022_04_27_120403_add_status_column_to_ridf', 18),
(40, '2022_04_28_100444_add_status_column_to_inwards', 19),
(45, '2022_04_28_104655_add_inward_id_column_to_ridfs_table', 20),
(46, '2022_04_29_092902_feedback_column_changes', 20),
(47, '2014_10_12_200000_add_two_factor_columns_to_users_table', 21),
(48, '2020_05_21_100000_create_teams_table', 21),
(49, '2020_05_21_200000_create_team_user_table', 21),
(50, '2020_05_21_300000_create_team_invitations_table', 21),
(51, '2022_05_03_071143_create_sessions_table', 21),
(53, '2022_05_03_120047_ridf_column_changes', 22),
(54, '2022_05_04_095146_create_product_types_table', 23),
(55, '2022_05_05_063044_create_status_tracks_table', 24),
(56, '2022_05_06_114001_inward_column_changes', 25),
(58, '2022_05_10_093148_remove_fault_column_ridf', 26),
(59, '2022_05_11_094153_add_mobile_number_in_users', 27),
(60, '2022_05_13_091041_add_product_description_in_inwards', 28),
(61, '2022_05_13_110635_create_complain_types_table', 29),
(63, '2022_05_14_054623_create_states_table', 30),
(64, '2022_04_11_120250_create_cities_table', 31),
(65, '2022_05_17_095929_create_notifications_table', 32),
(67, '2022_05_18_064739_add_city_state_in_users_clients_table', 33),
(69, '2022_05_23_045615_add_address_and_type_column_users_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('92ca5379-2177-4226-9b8e-b74e1cccfcf7', 'App\\Notifications\\supportNotification', 'App\\Models\\User', 1, '{\"message\":\"Job is aasigned to you !\"}', '2022-05-17 06:06:59', '2022-05-17 05:14:21', '2022-05-17 06:06:59'),
('9af6fcef-3f41-4b78-803c-c032fc3b2fe2', 'App\\Notifications\\supportNotification', 'App\\Models\\User', 1, '{\"message\":\"Job is aasigned to you !\"}', '2022-05-17 06:09:56', '2022-05-17 04:56:22', '2022-05-17 06:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `barcode_scan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `external_id`, `name`, `type`, `quantity`, `barcode_scan`, `created_at`, `updated_at`) VALUES
(2, '86d032e9-4fcd-493c-a797-7a7406e58965', 'product 1', 'type', 9, 'scanned data', '2022-04-23 06:54:58', '2022-05-13 05:19:21'),
(3, '4786b7f5-7f4c-4bd9-857c-45b271fcccd5', 'product 3', 'type', 49, 'scanned data', '2022-04-23 06:55:25', '2022-05-13 05:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `external_id`, `title`, `created_at`, `updated_at`) VALUES
(2, '2dbadfdd-9d32-4608-9271-3c6fdef42ce1', 'cycle', '2022-05-04 04:46:36', '2022-05-04 04:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `r_i_d_f_s`
--

CREATE TABLE `r_i_d_f_s` (
  `id` int UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inward_id` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `barcode_scan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_i_d_f_s`
--

INSERT INTO `r_i_d_f_s` (`id`, `external_id`, `inward_id`, `product_id`, `status`, `start_date`, `end_date`, `barcode_scan`, `created_at`, `updated_at`) VALUES
(2, '', 3, 0, 1, '2022-04-01', '2022-04-03', 'barcode scan data', '2022-04-18 04:10:47', '2022-05-05 01:51:40'),
(3, '74c488d5-8221-410f-9831-7b4cf8dfed7d', 4, 0, 1, '2022-04-01', '2022-04-03', 'barcode scan data', '2022-04-23 06:55:40', '2022-04-27 07:17:07'),
(4, 'cba3a710-3a99-471d-b3bd-42a561c96fef', 3, 0, 1, '2022-04-01', '2022-04-03', 'barcode scan data', '2022-04-28 05:35:03', '2022-04-28 05:35:03'),
(5, '716e8e95-320e-419f-8088-f2fce7d265ac', 1, 1, 1, '2022-04-03', '2022-04-03', 'barcode scan data', '2022-05-04 01:46:38', '2022-05-04 01:46:38'),
(6, 'f8af9065-81c6-4097-be8a-16deb6563654', 1, 1, 1, '2022-04-03', '2022-04-03', 'barcode scan data', '2022-05-10 03:58:40', '2022-05-10 03:58:40'),
(7, '2830d6ea-66bf-44c3-a490-a42530185868', 1, 1, 2, '2022-04-03', '2022-04-03', 'barcode scan data', '2022-05-12 23:13:13', '2022-05-12 23:13:13'),
(8, 'f25a5f59-5689-4b76-b309-d7e9641118b9', 1, 1, 2, '2022-04-03', '2022-04-03', 'barcode scan data', '2022-05-12 23:30:49', '2022-05-12 23:30:49'),
(9, '58e23b59-6a91-49ea-91ad-9030ba4372a5', 6, 1, 2, '2022-04-03', '2022-04-03', 'barcode scan data', '2022-05-12 23:31:43', '2022-05-12 23:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('q5stThbYS3BdkaUsXCHKRuY4jgNm6fbqXGB7CEWN', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTdDNExMNUdzVlJvVmRpWW4xQm1GZ0tRZ09mMm9XTmEwS3BJcTNxayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1653302244),
('QSJ7tMvMQ2ViKKp1AYc5LQZIHkopGV2MrNpjBlr7', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRk5hUkF5Q20za01oeDdYaFJxS3hHZGh6VlFwMDFBSHlHUlRxSjF0VCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1652508039),
('qz1uoUW8CaispezRa3O0qbKUWxPQqOWb7Q0MkmXu', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0hBaWx0d3BVaFVsSTdxU25CMFFRZjZ4eTI3UGdVQXgwMUJtWWp0USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9zdXBwb3J0X3RpY2tldC5jb20vdXNlcnMiO319', 1652428845);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(2, 'Arunachal Pradesh', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(3, 'Assam', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(4, 'Bihar', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(5, 'Chhattisgarh', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(6, 'Goa', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(7, 'Gujarat', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(8, 'Haryana', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(9, 'Himachal Pradesh', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(10, 'Jammu and Kashmir', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(11, 'Jharkhand', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(12, 'Karnataka', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(13, 'Kerala', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(14, 'Madhya Pradesh', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(15, 'Maharashtra', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(16, 'Manipur', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(17, 'Meghalaya', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(18, 'Mizoram', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(19, 'Nagaland', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(20, 'Odisha', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(21, 'Punjab', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(22, 'Rajasthan', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(23, 'Sikkim', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(24, 'Tamil Nadu', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(25, 'Telangana', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(26, 'Tripura', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(27, 'Uttarakhand', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(28, 'Uttar Pradesh', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(29, 'West Bengal', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(30, 'Andaman and Nicobar Islands', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(31, 'Chandigarh', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(32, 'Dadra and Nagar Haveli', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(33, 'Daman and Diu', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(34, 'Delhi', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(35, 'Lakshadweep', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54'),
(36, 'Puducherry', 0, '2022-05-14 01:54:54', '2022-05-14 01:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `status_tracks`
--

CREATE TABLE `status_tracks` (
  `id` int UNSIGNED NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `reason` text COLLATE utf8mb4_unicode_ci,
  `status_trackable_id` int NOT NULL,
  `status_trackable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_tracks`
--

INSERT INTO `status_tracks` (`id`, `status`, `reason`, `status_trackable_id`, `status_trackable_type`, `created_at`, `updated_at`) VALUES
(1, 4, 'This is the reason', 1, 'App\\Models\\Task', '2022-05-05 01:23:49', '2022-05-05 01:23:49'),
(2, 3, 'This is the reason for 3', 1, 'App\\Models\\Task', '2022-05-05 01:24:48', '2022-05-05 01:24:48'),
(3, 1, 'This is the reason for 1', 1, 'App\\Models\\Task', '2022-05-05 01:24:56', '2022-05-05 01:24:56'),
(4, 2, 'This is reason for 2', 1, 'App\\Models\\Inward', '2022-05-05 01:41:35', '2022-05-05 01:41:35'),
(5, 3, 'This is reason for 3', 1, 'App\\Models\\Inward', '2022-05-05 01:41:55', '2022-05-05 01:41:55'),
(6, 3, 'This is reason for 3', 2, 'App\\Models\\Inward', '2022-05-05 01:42:09', '2022-05-05 01:42:09'),
(7, 1, 'this is reason for 1', 2, 'App\\Models\\RIDF', '2022-05-05 01:51:40', '2022-05-05 01:51:40'),
(8, 4, 'Job submitted !', 5, 'App\\Models\\Job', '2022-05-05 02:18:24', '2022-05-05 02:18:24'),
(9, 4, 'All Job submitted !', 1, 'App\\Models\\Task', '2022-05-05 02:18:24', '2022-05-05 02:18:24'),
(10, 2, 'RIDF created', 1, 'App\\Models\\Inward', '2022-05-12 23:30:49', '2022-05-12 23:30:49'),
(11, 2, 'RIDF created', 6, 'App\\Models\\Inward', '2022-05-12 23:31:43', '2022-05-12 23:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int NOT NULL,
  `complain_details` text COLLATE utf8mb4_unicode_ci,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `external_id`, `name`, `type_id`, `complain_details`, `client_id`, `created_at`, `updated_at`, `status`, `end_date`) VALUES
(1, '', 'task1', 2, 'complain details are here !', 1, '2022-04-11 03:25:45', '2022-05-05 02:18:24', 4, NULL),
(6, '0e9fe07c-1298-4354-a303-a97c04a7a496', 'new task', 1, 'complain details are here !', 1, '2022-05-02 23:09:04', '2022-05-02 23:09:04', 1, NULL),
(7, '3b001a8c-ad87-44b0-b90e-0c3370fe5eec', 'new task', 1, 'complain details are here !', 1, '2022-05-05 23:09:25', '2022-05-02 23:09:25', 2, NULL),
(8, 'a508103e-62e9-4e81-8dc7-f4b593db8cb9', 'new task 1', 1, 'complain details are here !', 1, '2022-05-02 23:12:32', '2022-05-02 23:12:32', 1, NULL),
(9, 'e537f94d-afa6-4389-8906-c41f9082157b', 'new task 1', 1, 'database', 5, '2022-05-02 23:13:10', '2022-05-02 23:13:10', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_types`
--

CREATE TABLE `task_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_types`
--

INSERT INTO `task_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Complaint', NULL, NULL),
(2, 'Project', NULL, NULL),
(3, 'Remote', NULL, NULL),
(4, 'Support', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` bigint NOT NULL DEFAULT '0',
  `user_type` int NOT NULL DEFAULT '1',
  `address` text COLLATE utf8mb4_unicode_ci,
  `state_id` int NOT NULL DEFAULT '0',
  `city_id` int NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verified_at` timestamp NULL DEFAULT NULL,
  `otp_expired_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `external_id`, `first_name`, `last_name`, `email`, `mobile_number`, `user_type`, `address`, `state_id`, `city_id`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `token`, `otp`, `otp_verified_at`, `otp_expired_at`, `created_at`, `updated_at`, `profile_pic`) VALUES
(1, '', 'new_fname2', 'new_lname', 'mitesh@unicepts.in', 0, 1, NULL, 0, 0, NULL, '$2y$10$cgk.iL9awUA75U6iFmYAjO5E/Q.bUPw.eNtJLjrLi0RVG8KEO/.Te', NULL, NULL, NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9zdXBwb3J0X3RpY2tldC5jb21cL2FwaVwvdjFcL2xvZ2luIiwiaWF0IjoxNjUzMzc4NjAxLCJleHAiOjE2NTMzODIyMDEsIm5iZiI6MTY1MzM3ODYwMSwianRpIjoiV2RyRHl5WkFKMUVxSUdudSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.7n_CEJdPjySTgbQitIzY3pX2bGLQ89Mh4kjzbo85F54', NULL, NULL, NULL, '2022-04-11 03:20:08', '2022-05-24 02:20:01', 'storage/assets/employees/profile_pics/new_fname2_1651813861.png'),
(2, '', 'Mitesh', 'Ladva', 'mitesh0@unicepts.in', 0, 1, NULL, 0, 0, NULL, '$2y$10$TQ86HZUd8nBxXTOAOmT6e.3VAALQmkODcSOC7tt.eZ9Dp9qxEnOpq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-11 05:17:13', '2022-04-11 05:17:13', NULL),
(4, '', 'Mitesh', 'Ladva 2', 'mitesh3@unicepts.in', 0, 1, NULL, 0, 0, NULL, '$2y$10$bawYamx5PlTUxjpe9gLZvudvs0owLk7pDjdDDGuiZvaRv.FqQXjX.', NULL, NULL, NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9zdXBwb3J0X3RpY2tldC5jb21cL2FwaVwvdjFcL2xvZ2luIiwiaWF0IjoxNjUxMDU5NjUzLCJleHAiOjE2NTEwNjMyNTMsIm5iZiI6MTY1MTA1OTY1MywianRpIjoicjBMRDBFSGJOOXNXQ0ZwZSIsInN1YiI6NCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.svFYR8RL1EV_T1O3USaCnJE7EZF2J1IZSQKZGn_P6lA', NULL, NULL, NULL, '2022-04-12 04:16:37', '2022-04-27 06:10:53', 'storage/assets/users/profile_pics/mitesh_1649756797.png'),
(5, '', 'Himanshu', 'kumar', 'hklohani@outlook.com', 0, 1, NULL, 0, 0, NULL, '$2y$10$q1bHfdVLvg0bVHSdH3NGMupReoZMPyj2OsotY.paSVqwdGoa9FSA6', NULL, NULL, NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9zdXBwb3J0X3RpY2tldC5jb21cL2FwaVwvdjFcL2xvZ2luIiwiaWF0IjoxNjQ5OTI4NTYzLCJleHAiOjE2NDk5MzIxNjMsIm5iZiI6MTY0OTkyODU2MywianRpIjoibEtrUGV5N1BmdER6RGljbCIsInN1YiI6NSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.fcD6_6armPjrb_LARK469sQp-v3HJiWxCAFbo4edqfk', NULL, NULL, NULL, '2022-04-14 03:43:27', '2022-04-14 03:59:23', ''),
(6, '7a78f21d-d63c-481f-9bac-9367e506f7c2', NULL, NULL, 'hklohani2@outlook.com', 0, 1, NULL, 0, 0, NULL, '$2y$10$YwP2OsrVk0wSsyBSGuh6HejFLC1vh14Q.nGQBY3XVxyxxkDo0G89.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-23 06:51:51', '2022-05-11 04:00:32', ''),
(8, '9d529936-c3be-4da7-9be2-e05a63f38a34', 'Himanshu', 'kumar', 'hklohani12@outlook.com', 9913224590, 1, NULL, 0, 0, NULL, '$2y$10$PbvUmPOhHk6DtYjZ7QP3tOU2DlKVgBMsEoA5zBc/wBigYG5V/Siiu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-11 04:49:58', '2022-05-11 04:49:58', ''),
(9, '20f0e6a0-fe54-4b14-8361-340da0201507', 'Himanshu', 'kumar', 'hklohani1228@outlook.com', 9918322452, 1, NULL, 7, 2, NULL, '$2y$10$V5mWDW.CDmmXmzthqaVvHezqwA.d6n80/v2i.eBtVFOkWFzy.enJi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-22 23:35:14', '2022-05-22 23:35:14', 'storage/assets/employees/profile_pics/himanshu_1653282314.png'),
(11, 'f348fc86-4cc6-4d54-b461-c3128ddaed65', 'Himanshu', 'kumar', 'hklohani1213@outlook.com', 9918322123, 0, 'This is address line', 7, 2, NULL, '$2y$10$OD7T7RtKBf8GL4XYJ16KZukw6hBG0rkD9uEsfhDV6VOUNy72hY1Zy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-23 02:17:51', '2022-05-23 02:17:51', 'storage/assets/employees/profile_pics/himanshu_1653292071.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_types`
--
ALTER TABLE `complain_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inwards`
--
ALTER TABLE `inwards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_submits`
--
ALTER TABLE `job_submits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_i_d_f_s`
--
ALTER TABLE `r_i_d_f_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_tracks`
--
ALTER TABLE `status_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_types`
--
ALTER TABLE `task_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complain_types`
--
ALTER TABLE `complain_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inwards`
--
ALTER TABLE `inwards`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_submits`
--
ALTER TABLE `job_submits`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_i_d_f_s`
--
ALTER TABLE `r_i_d_f_s`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `status_tracks`
--
ALTER TABLE `status_tracks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `task_types`
--
ALTER TABLE `task_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
