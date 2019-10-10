-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 11:04 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uuloh`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '12',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_type` int(11) NOT NULL,
  `address_1` longtext COLLATE utf8mb4_unicode_ci,
  `address_2` longtext COLLATE utf8mb4_unicode_ci,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'No City',
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'No State',
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'No Country',
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT 'No Phone',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`id`, `user_id`, `first_name`, `last_name`, `company_name`, `company_type`, `address_1`, `address_2`, `city`, `state`, `country`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Oshaba', 'Samson', 'Oshabz', 0, 'No. 1 Anene Street', NULL, 'Awka', '1', '1', '08100141285', '2019-08-20 16:46:34', '2019-08-20 16:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `img_path` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `cat_id` int(10) UNSIGNED DEFAULT '12',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `img_path`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 'New title for our web', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos eaque est velit quia tenetur aspernatur ipsum magnam laborum dolore magni adipisci eius necessitatibus, maiores, minus pariatur ab commodi sequi et.', 'blog_pics/1566320381.png', 1, '2019-08-20 15:59:41', '2019-08-20 15:59:41'),
(2, 'Our outdoor blog', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae deleniti, suscipit consectetur veniam voluptas eius unde? Tempore architecto molestiae consequuntur deserunt, laudantium rerum totam laboriosam vitae, consectetur nisi nulla dignissimos?', 'blog_pics/1566320436.jpg', 3, '2019-08-20 16:00:36', '2019-08-20 16:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

CREATE TABLE `business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT '12',
  `services_id` int(10) UNSIGNED DEFAULT '12',
  `basic_infos_id` int(10) UNSIGNED DEFAULT '12',
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Website',
  `bus_description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `cert_and_award` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Certificate Or Award',
  `cost_from` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Precise Amount yet',
  `cost_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Precise Amount yet',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`id`, `user_id`, `services_id`, `basic_infos_id`, `website`, `bus_description`, `cert_and_award`, `cost_from`, `cost_to`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 1, 'www.oshabz.com', 'No description for me now', 'nothing to offer for now.', 'No Precise Amount yet', 'No Precise Amount yet', '2019-08-20 16:46:34', '2019-08-20 16:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DÉCOR', '2019-08-18 17:18:49', '2019-08-18 17:18:49'),
(2, 'HOME IMPROVEMENT', '2019-08-18 17:18:54', '2019-08-18 17:18:54'),
(3, 'OUTDOOR', '2019-08-18 17:19:00', '2019-08-18 17:19:00'),
(4, 'SMART HOME', '2019-08-18 17:19:12', '2019-08-18 17:19:12'),
(5, 'BATH', '2019-08-18 17:19:26', '2019-08-18 17:19:26'),
(6, 'BEDROOM', '2019-08-18 17:19:34', '2019-08-18 17:19:34'),
(7, 'LIVING', '2019-08-18 17:19:48', '2019-08-18 17:19:48'),
(8, 'LIGHTING', '2019-08-18 17:19:57', '2019-08-18 17:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE `company_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_07_094929_create_users_table', 1),
(2, '2019_08_07_114101_create_baic_infos_table', 1),
(3, '2019_08_07_114721_create_services_provideds_table', 1),
(4, '2019_08_07_114931_create_business_details_table', 1),
(5, '2019_08_07_122449_company_type', 1),
(6, '2019_08_09_155905_categories', 1),
(7, '2019_08_09_160047_sub_categories', 1),
(8, '2019_08_11_092544_productss', 1),
(9, '2019_08_14_101500_services', 1),
(10, '2019_08_14_101715_states', 1),
(11, '2019_08_17_113054_service_category', 1),
(15, '2019_08_20_160014_blog', 2),
(18, '2019_08_28_103258_shop_by_dept_contact_address', 4),
(19, '2019_08_28_095021_shop_by_dept_transactions', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) DEFAULT '12',
  `sub_cat_id` bigint(20) DEFAULT '12',
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `price` bigint(20) DEFAULT '12',
  `description` text COLLATE utf8mb4_unicode_ci,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `model` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `img_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `cat_id`, `sub_cat_id`, `product_name`, `price`, `description`, `color`, `size`, `model`, `img_path`, `created_at`, `updated_at`) VALUES
(1, 'sdfwef', 1, 1, 'Quentin Bryant', 713, 'Facere veniam dolor', 'In occaecat quod ut', '100', 'Numquam rerum commod', 'product_pics/1566371616.jpg', '2019-08-21 06:13:36', '2019-08-21 06:13:36'),
(2, 'gergs23', 1, 1, 'Fiona Nicholson', 848, 'Unde maiores laborum', 'Ullam eaque enim et', '2500', '1000', 'product_pics/1566371659.jpeg', '2019-08-21 06:14:19', '2019-08-21 06:14:19'),
(3, 'sdfwefdf', 1, 3, 'Tyrone Cote', 919, 'Ut facilis quia sed', 'Non cumque deserunt', 'Voluptas omnis velit', 'Debitis commodo dolo', 'product_pics/1566371763.jpg', '2019-08-21 06:16:03', '2019-08-21 06:16:03'),
(4, '54y5r5te', 1, 3, 'Jescie Christensen', 678, 'Sint quasi molestiae', 'Provident ex esse m', 'Unde provident earu', 'Consequatur illum i', 'product_pics/1566371798.jpg', '2019-08-21 06:16:38', '2019-08-21 06:16:38'),
(5, 'ghtzzr', 2, 10, 'Lillian Hays', 187, 'Consequatur Ullamco', 'Sunt qui quaerat con', 'Odio fugit adipisci', 'Et vel amet cupidit', 'product_pics/1566372214.jpg', '2019-08-21 06:23:35', '2019-08-21 06:23:35'),
(6, '5yhhrt', 2, 10, 'Teagan Barnes', 664, 'Voluptas et et velit', 'Aliqua Quia aliqua', 'Dignissimos sed aut', 'Quis quis velit aute', 'product_pics/1566372236.jpeg', '2019-08-21 06:23:56', '2019-08-21 06:23:56'),
(7, 'gh45hrt', 2, 10, 'Gavin Benson', 789, 'Enim corrupti Nam f', 'Tenetur possimus vo', 'Ut neque doloribus a', 'Magni quis ut nobis', 'product_pics/1566372252.jpeg', '2019-08-21 06:24:12', '2019-08-21 06:24:12'),
(8, 'fh5hhr34', 2, 10, 'Wilma Goodman', 412, 'Magni est aperiam pl', 'Est quo id sed veli', 'Non non voluptas ad', 'Sed delectus illo s', 'product_pics/1566372402.jpeg', '2019-08-21 06:26:42', '2019-08-21 06:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `prof_services_provided`
--

CREATE TABLE `prof_services_provided` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basic_infos_id` bigint(20) DEFAULT '12',
  `user_id` bigint(20) DEFAULT '12',
  `services` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prof_services_provided`
--

INSERT INTO `prof_services_provided` (`id`, `basic_infos_id`, `user_id`, `services`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2019-08-20 16:46:34', '2019-08-20 16:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_serv_id` bigint(20) DEFAULT '12',
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'OUTDOOR & GARDEN\r\n', NULL, NULL),
(2, 'HOME IMPROVEMENT\r\n', NULL, NULL),
(3, 'HOME SERVICES / TECHNICIANS\r\n', NULL, NULL),
(4, 'OTHERS\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_by_dept_contact_info`
--

CREATE TABLE `shop_by_dept_contact_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `transaction_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `address_1` longtext COLLATE utf8mb4_unicode_ci,
  `address_2` longtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_by_dept_contact_info`
--

INSERT INTO `shop_by_dept_contact_info` (`id`, `email`, `transaction_id`, `full_name`, `address_1`, `address_2`, `phone`, `state`, `created_at`, `updated_at`) VALUES
(1, 'osha@osha.osha', 'slkdfjoi', 'Oshaba Samson', 'No. 10 Udodi Street', 'No 1 Anene Street', '939339383393', 'Enugu', '2019-09-02 12:45:25', '2019-09-02 12:45:25'),
(2, 'osha@osha.osha', 'slkdfjoi', 'Oshaba Samson', 'No. 10 Udodi Street', 'No 1 Anene Street', '38393939383', 'Enugu', '2019-09-02 13:19:25', '2019-09-02 13:19:25'),
(3, 'osha@osha.osha', 'slkdfjoi', 'Oshaba Samson', 'No. 10 Udodi Street', 'No 1 Anene Street', '08100141285', 'Enugu', '2019-09-03 07:01:19', '2019-09-03 07:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `shop_by_dept_transactions`
--

CREATE TABLE `shop_by_dept_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `paystack_ref` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `quantity` bigint(20) DEFAULT '12',
  `price` bigint(20) DEFAULT '12',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_by_dept_transactions`
--

INSERT INTO `shop_by_dept_transactions` (`id`, `transaction_id`, `paystack_ref`, `product_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 'slkdfwfjoi', '327347821', '54y5r5te', 'Jescie Christensen', 2, 678, '2019-09-02 12:37:06', '2019-09-02 12:37:06'),
(2, 'slkdfjoi', '327347821', '54y5r5te', 'Tyrone Cote', 4, 919, '2019-09-02 12:37:06', '2019-09-02 12:37:06'),
(3, 'slkdfwfjoi', '441145743', '54y5r5te', 'Jescie Christensen', 2, 678, '2019-09-02 12:42:06', '2019-09-02 12:42:06'),
(4, 'slkdfjoi', '441145743', '54y5r5te', 'Tyrone Cote', 4, 919, '2019-07-10 12:42:06', '2019-09-02 12:42:06'),
(5, 'slkdfjoi', '327347821', '54y5r5te', 'Jescie Christensen', 2, 678, '2019-09-02 12:44:49', '2019-09-02 12:44:49'),
(6, 'slkdfwfjoi', '327347821', '54y5r5te', 'Tyrone Cote', 4, 919, '2019-09-02 12:44:49', '2019-09-02 12:44:49'),
(7, 'slkdfjoi', '327347821', '54y5r5te', 'Jescie Christensen', 2, 678, '2019-09-02 12:44:57', '2019-09-02 12:44:57'),
(8, 'slkdfjoi', '327347821', '54y5r5te', 'Tyrone Cote', 4, 919, '2019-09-02 12:44:57', '2019-09-02 12:44:57'),
(9, 'slkdfwfjoi', '327347821', '54y5r5te', 'Jescie Christensen', 2, 678, '2019-09-02 12:45:25', '2019-09-02 12:45:25'),
(10, 'slkdfjoi', '327347821', '54y5r5te', 'Tyrone Cote', 4, 919, '2019-09-02 12:45:25', '2019-09-02 12:45:25'),
(11, 'slkdfjoi', '620669354', '5yhhrt', 'Teagan Barnes', 3, 664, '2019-09-02 13:19:24', '2019-09-02 13:19:24'),
(12, 'slkdfwfjoi', '620669354', '5yhhrt', 'Gavin Benson', 3, 789, '2019-09-02 13:19:24', '2019-09-02 13:19:24'),
(13, 'slkdfjoiwe', '242635187', '54y5r5te', 'Jescie Christensen', 4, 678, '2019-09-03 07:01:18', '2019-09-03 07:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` bigint(20) DEFAULT '12',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rugs', 'Rugs', '2019-08-18 17:48:36', '2019-08-20 11:54:49'),
(2, 1, 'Carpets', '', '2019-08-18 17:49:16', '2019-08-20 12:00:28'),
(3, 1, 'Mirrows', '', '2019-08-18 17:49:29', '2019-08-20 12:00:12'),
(4, 1, 'Wall décor', '', '2019-08-18 17:49:44', '2019-08-18 17:49:44'),
(5, 1, 'Decorative Accents', '', '2019-08-18 17:49:57', '2019-08-18 17:49:57'),
(6, 2, 'Hardware', '', '2019-08-18 17:50:26', '2019-08-20 11:33:33'),
(7, 2, 'POP Materials', '', '2019-08-18 17:50:38', '2019-08-20 11:33:54'),
(8, 2, 'Bathroom Fixtures', '', '2019-08-18 17:50:53', '2019-08-18 17:50:53'),
(9, 2, 'Kitchen Fixtures', '', '2019-08-18 17:51:05', '2019-08-20 11:34:14'),
(10, 3, 'Patio Furniture', '', '2019-08-18 17:51:16', '2019-08-18 17:51:16'),
(11, 3, 'Outdoor décor', '', '2019-08-18 17:51:29', '2019-08-18 17:51:29'),
(12, 3, 'Outdoor Lighting', '', '2019-08-18 17:51:41', '2019-08-20 11:34:33'),
(13, 3, 'Pool and Spa Products', '', '2019-08-18 17:51:54', '2019-08-18 17:51:54'),
(15, 4, 'Smart Switches', '', '2019-08-18 17:52:23', '2019-08-18 17:52:23'),
(16, 4, 'smart lights', '', '2019-08-18 17:52:35', '2019-08-18 17:52:35'),
(17, 4, 'Smart Bulbs', '', '2019-08-18 17:52:47', '2019-08-18 17:52:47'),
(18, 4, 'motorised curtains', '', '2019-08-18 17:52:59', '2019-08-18 17:52:59'),
(19, 4, 'remote controlled blind', '', '2019-08-18 17:53:11', '2019-08-18 17:53:11'),
(20, 5, 'Bathroom Vanities', '', '2019-08-18 17:54:30', '2019-08-18 17:54:30'),
(21, 5, 'WC Toilets', '', '2019-08-18 17:54:44', '2019-08-20 11:35:05'),
(22, 5, 'Showers', '', '2019-08-18 17:54:59', '2019-08-18 17:54:59'),
(23, 5, 'Bath tubs', '', '2019-08-18 17:55:09', '2019-08-18 17:55:09'),
(24, 5, 'Bathroom Lighting', '', '2019-08-18 17:55:20', '2019-08-18 17:55:20'),
(25, 6, 'Bed Dressers & Foams', '', '2019-08-18 17:55:32', '2019-08-18 17:55:32'),
(26, 6, 'Bedding', '', '2019-08-18 17:55:46', '2019-08-18 17:55:46'),
(27, 6, 'Pillows & Foams', '', '2019-08-18 17:55:57', '2019-08-18 17:55:57'),
(28, 6, 'Benches & Futons', '', '2019-08-18 17:56:07', '2019-08-18 17:56:07'),
(29, 7, 'Coffee & Accent Tables', '', '2019-08-18 17:56:18', '2019-08-18 17:56:18'),
(30, 7, 'Rugs', '', '2019-08-18 17:56:29', '2019-08-18 17:56:29'),
(31, 7, 'Sofas & Sectionals', '', '2019-08-18 17:56:40', '2019-08-18 17:56:40'),
(32, 7, 'Arm Chairs & Accent Chairs', '', '2019-08-18 17:56:53', '2019-08-18 17:56:53'),
(33, 8, 'Chandeliers', '', '2019-08-18 17:57:03', '2019-08-18 17:57:03'),
(34, 8, 'Pendant Lights', '', '2019-08-18 17:57:14', '2019-08-18 17:57:14'),
(35, 8, 'Flush - mounts', '', '2019-08-18 17:57:23', '2019-08-18 17:57:23'),
(36, 8, 'Bathroom Light', '', '2019-08-18 17:57:34', '2019-08-18 17:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'osha@osha.osha', '$2y$10$BKeqBkiSCqbfBSA/EpNlPedjcAISJf3sXss9JupEytcdSuvEmleFu', NULL, NULL, '2019-08-20 16:46:34', '2019-08-20 16:46:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_details`
--
ALTER TABLE `business_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prof_services_provided`
--
ALTER TABLE `prof_services_provided`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_by_dept_contact_info`
--
ALTER TABLE `shop_by_dept_contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_by_dept_transactions`
--
ALTER TABLE `shop_by_dept_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_details`
--
ALTER TABLE `business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prof_services_provided`
--
ALTER TABLE `prof_services_provided`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_by_dept_contact_info`
--
ALTER TABLE `shop_by_dept_contact_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_by_dept_transactions`
--
ALTER TABLE `shop_by_dept_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
