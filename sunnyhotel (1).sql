-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 04:33 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunnyhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bookroom_temp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `book_details_total_price` int(11) DEFAULT NULL,
  `number_person` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_detail_temps`
--

CREATE TABLE `book_detail_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookroom_temp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `book_details_total_price` int(11) DEFAULT NULL,
  `number_person` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_rooms`
--

CREATE TABLE `book_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookroom_date_received` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookroom_date_pay` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookroom_number_person` int(11) DEFAULT NULL,
  `bookroom_number_room` int(11) DEFAULT NULL,
  `bookroom_deposit_money` int(11) DEFAULT NULL,
  `fullname_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_customer` int(11) DEFAULT NULL,
  `bookroom_email` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_room_temps`
--

CREATE TABLE `book_room_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookroom_date_received` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookroom_date_pay` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookroom_number_person` int(11) DEFAULT NULL,
  `bookroom_number_room` int(11) DEFAULT NULL,
  `bookroom_deposit_money` int(11) DEFAULT NULL,
  `fullname_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_customer` int(11) DEFAULT NULL,
  `address_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoryrooms`
--

CREATE TABLE `categoryrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoryrooms`
--

INSERT INTO `categoryrooms` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Phòng đơn', '2020-09-10 19:20:32', '2020-09-10 19:20:32'),
(2, 'Phòng đôi', '2020-09-10 19:20:39', '2020-09-10 19:20:39'),
(3, 'Phòng gia đình', '2020-09-10 19:20:58', '2020-09-10 19:20:58'),
(4, 'Phòng cao cấp', '2020-09-10 19:21:08', '2020-09-10 19:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `category_services`
--

CREATE TABLE `category_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_services`
--

INSERT INTO `category_services` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Bơi', '2020-09-10 19:14:10', '2020-09-10 19:14:10'),
(2, 'Khách sạn', '2020-09-10 19:14:18', '2020-09-10 19:14:18'),
(3, 'Nhà Hàng', '2020-09-10 19:14:24', '2020-09-10 19:14:24'),
(4, 'Spa và Massage', '2020-09-10 19:14:30', '2020-09-10 19:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers_phone` int(11) DEFAULT NULL,
  `customers_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customes_comment` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `customers_phone`, `customers_address`, `customes_comment`, `created_at`, `updated_at`) VALUES
(1, 'Lưu Hoàng Gia Bảo', 979104421, 'vĩnh long', '', '2020-12-16 00:31:28', '2020-12-16 00:31:28'),
(2, 'Lưu Vĩnh Tuy', 979104421, 'hậu giang', 'tốt', '2020-12-16 00:37:12', '2020-12-16 00:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contacts`
--

CREATE TABLE `customer_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_rooms`
--

CREATE TABLE `image_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_rooms`
--

INSERT INTO `image_rooms` (`id`, `room_id`, `room_image`, `created_at`, `updated_at`) VALUES
(2, 6, 'doi1.jpg', '2020-09-10 19:53:21', '2020-09-10 19:53:21'),
(3, 7, 'vip1.jpg', '2020-10-04 18:42:26', '2020-10-04 18:42:26'),
(4, 5, '7fabd5dd57983406454deeaf7d88b5d5.jpg', '2020-10-04 18:45:16', '2020-10-04 18:45:16'),
(5, 10, 'gd1.jpg', '2020-11-15 18:18:58', '2020-11-15 18:18:58'),
(6, 11, 'don2.jpg', '2020-11-15 18:26:44', '2020-11-15 18:26:44'),
(7, 12, 'doi2.jpg', '2020-11-15 18:27:34', '2020-11-15 18:27:34'),
(8, 13, 'vip2.jpg', '2020-11-15 18:30:29', '2020-11-15 18:30:29'),
(9, 14, 'gd2.jpg', '2020-11-15 18:32:45', '2020-11-15 18:32:45'),
(10, 15, 'don3.jpg', '2020-11-15 18:37:07', '2020-11-15 18:37:07'),
(11, 16, 'doi3.jpg', '2020-11-15 18:38:09', '2020-11-15 18:38:09'),
(12, 17, 'vip3.jpeg', '2020-11-15 18:40:10', '2020-11-15 18:40:10'),
(13, 18, 'gd3.jpg', '2020-11-15 18:42:50', '2020-11-15 18:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `image_services`
--

CREATE TABLE `image_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_services`
--

INSERT INTO `image_services` (`id`, `service_id`, `service_image`, `created_at`, `updated_at`) VALUES
(1, 1, '8.jpg', '2020-09-10 19:57:22', '2020-09-10 19:57:22'),
(3, 2, '13.jpg', '2020-10-04 18:43:55', '2020-10-04 18:43:55'),
(4, 3, '5.jpg', '2020-10-04 18:49:29', '2020-10-04 18:49:29'),
(5, 4, '10.jpg', '2020-10-04 18:53:17', '2020-10-04 18:53:17'),
(6, 4, '37.jpg', '2020-11-15 18:44:50', '2020-11-15 18:44:50'),
(7, 4, '12.jpg', '2020-11-15 18:45:50', '2020-11-15 18:45:50'),
(9, 4, '22.jpg', '2020-11-15 18:47:31', '2020-11-15 18:47:31');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_03_26_120702_create_role_accesses_table', 1),
(4, '2020_03_26_120920_create_categoryrooms_table', 1),
(5, '2020_03_26_121020_create_customers_table', 1),
(6, '2020_03_26_121042_create_rooms_table', 1),
(7, '2020_03_26_121121_create_book_rooms_table', 1),
(10, '2020_03_29_073841_create_image_services_table', 1),
(11, '2020_03_29_073857_create_image_rooms_table', 1),
(12, '2020_04_06_035850_create_category_services_table', 1),
(13, '2020_04_11_040038_create_book_room_temps_table', 1),
(15, '2014_10_12_000000_create_users_table', 2),
(16, '2020_03_26_121135_create_book_details_table', 2),
(17, '2020_03_29_073742_create_services_table', 2),
(18, '2020_04_11_091750_create_book_detail_temps_table', 2),
(19, '2020_10_21_073300_create_rating_stars_table', 3),
(20, '2020_11_19_032316_create_save_bookrooms_table', 4),
(21, '2020_12_16_071004_create_customer_contacts_table', 5);

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
-- Table structure for table `rating_stars`
--

CREATE TABLE `rating_stars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number_star` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_stars`
--

INSERT INTO `rating_stars` (`id`, `user_id`, `room_id`, `number_star`, `created_at`, `updated_at`) VALUES
(72, 1, 6, 2, '2020-11-13 21:42:44', '2020-11-13 21:42:44'),
(73, 1, 6, 4, '2020-11-13 21:42:54', '2020-11-13 21:42:54'),
(74, 1, 7, 3, '2020-11-13 21:43:20', '2020-11-13 21:43:20'),
(75, 1, 7, 5, '2020-11-13 21:43:34', '2020-11-13 21:43:34'),
(76, NULL, 17, 1, '2020-11-29 20:37:42', '2020-11-29 20:37:42'),
(77, NULL, 17, 5, '2020-11-29 20:37:53', '2020-11-29 20:37:53'),
(78, NULL, 18, 1, '2020-12-02 18:17:00', '2020-12-02 18:17:00'),
(79, 1, 18, 5, '2020-12-09 23:51:23', '2020-12-09 23:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_accesses`
--

CREATE TABLE `role_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_accesses`
--

INSERT INTO `role_accesses` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-09-10 18:55:46', '2020-09-10 18:55:46'),
(2, 'Nhân viên', '2020-09-10 18:55:53', '2020-09-10 18:55:53'),
(3, 'Khách Hàng', '2020-09-23 21:32:12', '2020-09-23 21:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_price` int(11) DEFAULT NULL,
  `room_describe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `category_id`, `room_name`, `room_image`, `room_price`, `room_describe`, `room_status`, `created_at`, `updated_at`) VALUES
(5, 1, 'Phòng đơn 01', '7fabd5dd57983406454deeaf7d88b5d5.jpg', 400000, '<p>Ph&ograve;ng Superior&nbsp;River View Doube sẽ đ&aacute;p ứng đầy đủ nhu cầu tận hưởng cuộc sống tại đ&ocirc; thị miền s&ocirc;ng nước với tầm nh&igrave;n ra d&ograve;ng s&ocirc;ng Hậu trữ t&igrave;nh v&agrave; cầu Cần Thơ - biểu tượng cho sự thịnh vượng v&agrave; y&ecirc;n b&igrave;nh của đất T&acirc;y Đ&ocirc;.&nbsp;Tọa lạc tại&nbsp;bến Ninh Kiều v&agrave; những con đường tấp nập d&ograve;ng người qua lại, chắc chắn sẽ để lại ấn tượng mạnh cho bất kỳ du kh&aacute;ch n&agrave;o c&oacute; dịp dừng ch&acirc;n tại đ&acirc;y.</p>', '0', '2020-09-10 19:31:23', '2020-10-28 18:56:23'),
(6, 2, 'Phòng đôi 01', 'doi1.jpg', 700000, '<p>Ph&ograve;ng Superior&nbsp;River View Doube sẽ đ&aacute;p ứng đầy đủ nhu cầu tận hưởng cuộc sống tại đ&ocirc; thị miền s&ocirc;ng nước với tầm nh&igrave;n ra d&ograve;ng s&ocirc;ng Hậu trữ t&igrave;nh v&agrave; cầu Cần Thơ - biểu tượng cho sự thịnh vượng v&agrave; y&ecirc;n b&igrave;nh của đất T&acirc;y Đ&ocirc;.&nbsp;Tọa lạc tại&nbsp;bến Ninh Kiều v&agrave; những con đường tấp nập d&ograve;ng người qua lại, chắc chắn sẽ để lại ấn tượng mạnh cho bất kỳ du kh&aacute;ch n&agrave;o c&oacute; dịp dừng ch&acirc;n tại đ&acirc;y.</p>', '0', '2020-09-10 19:53:05', '2020-09-10 20:15:10'),
(7, 4, 'Phòng Vip 01', 'vip1.jpg', 600000, '<p>Ph&ograve;ng Superior&nbsp;River View Doube sẽ đ&aacute;p ứng đầy đủ nhu cầu tận hưởng cuộc sống tại đ&ocirc; thị miền s&ocirc;ng nước với tầm nh&igrave;n ra d&ograve;ng s&ocirc;ng Hậu trữ t&igrave;nh v&agrave; cầu Cần Thơ - biểu tượng cho sự thịnh vượng v&agrave; y&ecirc;n b&igrave;nh của đất T&acirc;y Đ&ocirc;.&nbsp;Tọa lạc tại&nbsp;bến Ninh Kiều v&agrave; những con đường tấp nập d&ograve;ng người qua lại, chắc chắn sẽ để lại ấn tượng mạnh cho bất kỳ du kh&aacute;ch n&agrave;o c&oacute; dịp dừng ch&acirc;n tại đ&acirc;y.</p>', '0', '2020-10-04 18:42:10', '2020-10-28 18:58:39'),
(10, 3, 'Phòng gia đình 01', 'gd1.jpg', 700000, '<p>L&agrave; loại ph&ograve;ng cao cấp, được bố tr&iacute; ở vị tr&iacute; đẹp nhất với những trang thiết bị hiện đại, ph&ograve;ng Suite c&oacute; kh&ocirc;ng gian rộng 60m2 gồm ph&ograve;ng kh&aacute;ch v&agrave; ph&ograve;ng ngủ ri&ecirc;ng biệt mang đến cho qu&yacute; kh&aacute;ch sự trải nghiệm sang trọng v&agrave; đẳng cấp</p>\r\n\r\n<p>Với tầm nh&igrave;n hướng s&ocirc;ng qu&yacute; kh&aacute;ch sẽ dễ d&agrave;ng ngắm nh&igrave;n b&igrave;nh minh &amp; ho&agrave;ng h&ocirc;n trải d&agrave;i tr&ecirc;n s&ocirc;ng Hậu, tận hưởng một kỳ nghỉ dưỡng tuyệt vời kh&oacute; qu&ecirc;n.</p>', '0', '2020-11-15 18:18:41', '2020-11-28 19:55:47'),
(11, 1, 'Phòng đơn 02', 'don2.jpg', 500000, '<p>Ph&ograve;ng Superior&nbsp;River View Doube sẽ đ&aacute;p ứng đầy đủ nhu cầu tận hưởng cuộc sống tại đ&ocirc; thị miền s&ocirc;ng nước với tầm nh&igrave;n ra d&ograve;ng s&ocirc;ng Hậu trữ t&igrave;nh v&agrave; cầu Cần Thơ - biểu tượng cho sự thịnh vượng v&agrave; y&ecirc;n b&igrave;nh của đất T&acirc;y Đ&ocirc;.&nbsp;Tọa lạc tại&nbsp;bến Ninh Kiều v&agrave; những con đường tấp nập d&ograve;ng người qua lại, chắc chắn sẽ để lại ấn tượng mạnh cho bất kỳ du kh&aacute;ch n&agrave;o c&oacute; dịp dừng ch&acirc;n tại đ&acirc;y.</p>', '0', '2020-11-15 18:25:13', '2020-11-15 18:26:28'),
(12, 2, 'Phòng đôi 02', 'doi2.jpg', 750000, '<p>Ph&ograve;ng Superior&nbsp;River View Doube sẽ đ&aacute;p ứng đầy đủ nhu cầu tận hưởng cuộc sống tại đ&ocirc; thị miền s&ocirc;ng nước với tầm nh&igrave;n ra d&ograve;ng s&ocirc;ng Hậu trữ t&igrave;nh v&agrave; cầu Cần Thơ - biểu tượng cho sự thịnh vượng v&agrave; y&ecirc;n b&igrave;nh của đất T&acirc;y Đ&ocirc;.&nbsp;Tọa lạc tại&nbsp;bến Ninh Kiều v&agrave; những con đường tấp nập d&ograve;ng người qua lại, chắc chắn sẽ để lại ấn tượng mạnh cho bất kỳ du kh&aacute;ch n&agrave;o c&oacute; dịp dừng ch&acirc;n tại đ&acirc;y.</p>', '0', '2020-11-15 18:27:12', '2020-11-15 18:27:12'),
(13, 4, 'Phòng Vip 02', 'vip2.jpg', 900000, '<p>Ph&ograve;ng ở hạng Superior City View&nbsp;được thiết kế c&oacute; ban c&ocirc;ng hướng nh&igrave;n&nbsp;ra phố Cần Thơ, Qu&yacute; kh&aacute;ch sẽ được thưởng thức trọn vẹn được sự năng động, nhộn nhịp của th&agrave;nh phố, v&agrave; c&ograve;n cảm nhận được chất lượng phục vụ &acirc;n cần của dịch vụ ph&ograve;ng ở kh&aacute;ch sạn Ninh Kiều.<br />\r\nMặt s&agrave;n ph&ograve;ng được thiết kế bằng gỗ cao cấp c&ugrave;ng với c&aacute;c trang thiết bị kh&aacute;c như hệ thống m&aacute;y lạnh, bồn tắm nước n&oacute;ng lạnh, hệ thống TV truyền h&igrave;nh vệ tinh, mini-bar, ghế massage to&agrave;n th&acirc;n đảm b&aacute;o sự nghỉ dưỡng thật chu đ&aacute;o cho Qu&yacute; Kh&aacute;c</p>', '0', '2020-11-15 18:28:37', '2020-12-02 20:12:35'),
(14, 3, 'Phòng gia đình 02', 'gd2.jpg', 800000, '<p>L&agrave; loại ph&ograve;ng cao cấp, được bố tr&iacute; ở vị tr&iacute; đẹp nhất với những trang thiết bị hiện đại, ph&ograve;ng Suite c&oacute; kh&ocirc;ng gian rộng 60m2 gồm ph&ograve;ng kh&aacute;ch v&agrave; ph&ograve;ng ngủ ri&ecirc;ng biệt mang đến cho qu&yacute; kh&aacute;ch sự trải nghiệm sang trọng v&agrave; đẳng cấp</p>\r\n\r\n<p>Với tầm nh&igrave;n hướng s&ocirc;ng qu&yacute; kh&aacute;ch sẽ dễ d&agrave;ng ngắm nh&igrave;n b&igrave;nh minh &amp; ho&agrave;ng h&ocirc;n trải d&agrave;i tr&ecirc;n s&ocirc;ng Hậu, tận hưởng một kỳ nghỉ dưỡng tuyệt vời kh&oacute; qu&ecirc;n.</p>', '0', '2020-11-15 18:32:07', '2020-12-02 19:58:35'),
(15, 1, 'Phòng đơn 03', 'don3.jpg', 500000, '<p>Ph&ograve;ng Superior&nbsp;River View Doube sẽ đ&aacute;p ứng đầy đủ nhu cầu tận hưởng cuộc sống tại đ&ocirc; thị miền s&ocirc;ng nước với tầm nh&igrave;n ra d&ograve;ng s&ocirc;ng Hậu trữ t&igrave;nh v&agrave; cầu Cần Thơ - biểu tượng cho sự thịnh vượng v&agrave; y&ecirc;n b&igrave;nh của đất T&acirc;y Đ&ocirc;.&nbsp;Tọa lạc tại&nbsp;bến Ninh Kiều v&agrave; những con đường tấp nập d&ograve;ng người qua lại, chắc chắn sẽ để lại ấn tượng mạnh cho bất kỳ du kh&aacute;ch n&agrave;o c&oacute; dịp dừng ch&acirc;n tại đ&acirc;y.</p>', '0', '2020-11-15 18:36:54', '2020-12-02 20:02:46'),
(16, 2, 'Phòng đôi 03', 'doi3.jpg', 700000, '<p>Ph&ograve;ng Superior&nbsp;River View Doube sẽ đ&aacute;p ứng đầy đủ nhu cầu tận hưởng cuộc sống tại đ&ocirc; thị miền s&ocirc;ng nước với tầm nh&igrave;n ra d&ograve;ng s&ocirc;ng Hậu trữ t&igrave;nh v&agrave; cầu Cần Thơ - biểu tượng cho sự thịnh vượng v&agrave; y&ecirc;n b&igrave;nh của đất T&acirc;y Đ&ocirc;.&nbsp;Tọa lạc tại&nbsp;bến Ninh Kiều v&agrave; những con đường tấp nập d&ograve;ng người qua lại, chắc chắn sẽ để lại ấn tượng mạnh cho bất kỳ du kh&aacute;ch n&agrave;o c&oacute; dịp dừng ch&acirc;n tại đ&acirc;y.</p>', '0', '2020-11-15 18:37:58', '2020-11-24 01:23:42'),
(17, 4, 'Phòng Vip 03', 'vip3.jpeg', 900000, '<p>Ph&ograve;ng ở hạng Superior City View&nbsp;được thiết kế c&oacute; ban c&ocirc;ng hướng nh&igrave;n&nbsp;ra phố Cần Thơ, Qu&yacute; kh&aacute;ch sẽ được thưởng thức trọn vẹn được sự năng động, nhộn nhịp của th&agrave;nh phố, v&agrave; c&ograve;n cảm nhận được chất lượng phục vụ &acirc;n cần của dịch vụ ph&ograve;ng ở kh&aacute;ch sạn Ninh Kiều.<br />\r\nMặt s&agrave;n ph&ograve;ng được thiết kế bằng gỗ cao cấp c&ugrave;ng với c&aacute;c trang thiết bị kh&aacute;c như hệ thống m&aacute;y lạnh, bồn tắm nước n&oacute;ng lạnh, hệ thống TV truyền h&igrave;nh vệ tinh, mini-bar, ghế massage to&agrave;n th&acirc;n đảm b&aacute;o sự nghỉ dưỡng thật chu đ&aacute;o cho Qu&yacute; Kh&aacute;c</p>', '0', '2020-11-15 18:39:53', '2020-12-02 19:39:26'),
(18, 3, 'Phòng gia đình 03', 'gd3.jpg', 750000, '<p>Ph&ograve;ng ở hạng Superior City View&nbsp;được thiết kế c&oacute; ban c&ocirc;ng hướng nh&igrave;n&nbsp;ra phố Cần Thơ, Qu&yacute; kh&aacute;ch sẽ được thưởng thức trọn vẹn được sự năng động, nhộn nhịp của th&agrave;nh phố, v&agrave; c&ograve;n cảm nhận được chất lượng phục vụ &acirc;n cần của dịch vụ ph&ograve;ng ở kh&aacute;ch sạn Ninh Kiều.<br />\r\nMặt s&agrave;n ph&ograve;ng được thiết kế bằng gỗ cao cấp c&ugrave;ng với c&aacute;c trang thiết bị kh&aacute;c như hệ thống m&aacute;y lạnh, bồn tắm nước n&oacute;ng lạnh, hệ thống TV truyền h&igrave;nh vệ tinh, mini-bar, ghế massage to&agrave;n th&acirc;n đảm b&aacute;o sự nghỉ dưỡng thật chu đ&aacute;o cho Qu&yacute; Kh&aacute;c</p>', '0', '2020-11-15 18:42:34', '2020-12-17 20:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `save_bookrooms`
--

CREATE TABLE `save_bookrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `bookroom_date_received` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookroom_date_pay` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookroom_number_person` int(11) DEFAULT NULL,
  `bookroom_number_room` int(11) DEFAULT NULL,
  `bookroom_deposit_money` int(11) DEFAULT NULL,
  `fullname_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_customer` int(11) DEFAULT NULL,
  `address_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `save_bookrooms`
--

INSERT INTO `save_bookrooms` (`id`, `room_id`, `bookroom_date_received`, `bookroom_date_pay`, `bookroom_number_person`, `bookroom_number_room`, `bookroom_deposit_money`, `fullname_customer`, `phone_customer`, `address_customer`, `created_at`, `updated_at`) VALUES
(6, 18, '12/18/2020', '12/20/2020', 2, 1, 500000, 'Lưu vĩnh tuy', 979104421, 'hậu giang', '2020-12-17 20:06:53', '2020-12-17 20:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_describe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_service_id`, `service_title`, `service_describe`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hồ Bơi người lớn', '<p>Trong kh&ocirc;ng gian tươi m&aacute;t với &aacute;nh nắng mặt trời v&agrave; thời tiết ấm &aacute;p, hồ bơi&nbsp;của kh&aacute;ch sạn l&agrave; nơi tuyệt vời để thư gi&atilde;n v&agrave; tận hưởng những ly cocktail ngon tuyệt.</p>', '2020-09-10 19:56:43', '2020-09-10 19:56:43'),
(2, 3, 'Nhà hàng', '<p>Để đem lại sự h&agrave;i l&ograve;ng cũng như sự tiện &iacute;ch cho c&aacute;c du kh&aacute;ch nghỉ ngơi tại kh&aacute;ch sạn c&oacute; bữa ăn ngay tại kh&aacute;ch sạn m&igrave;nh đang ở, m&agrave; kh&ocirc;ng phải đi đ&acirc;u xa th&igrave; hầu hết c&aacute;c kh&aacute;ch sạn đều c&oacute; th&ecirc;m nh&agrave; h&agrave;ng sang trọng. Đặc biệt đối với kh&aacute;ch sạn 3-5 sao, kh&ocirc;ng thể thiếu nh&agrave; h&agrave;ng tại kh&aacute;ch sạn. Nh&agrave; h&agrave;ng của bạn cần cung cấp đầy đủ c&aacute;c m&oacute;n ăn d&agrave;nh cho bữa ăn s&aacute;ng, trưa, tối cho du kh&aacute;ch kh&ocirc;ng chỉ l&agrave; du kh&aacute;ch trong nước m&agrave; c&ograve;n c&oacute; cả du kh&aacute;ch nước ngo&agrave;i. Đặc biệt l&agrave; bữa s&aacute;ng, du kh&aacute;ch c&oacute; th&oacute;i quen ăn s&aacute;ng lu&ocirc;n tại kh&aacute;ch sạn n&ecirc;n bữa s&aacute;ng v&ocirc; c&ugrave;ng quan trọng để thỏa m&atilde;n nhu cầu của kh&aacute;ch h&agrave;ng.</p>', '2020-09-10 20:19:00', '2020-09-10 20:19:00'),
(3, 4, 'Massage', '<p>&nbsp;Dịch vụ Spa massage gi&uacute;p cơ thể con người giảm đau, giảm nhức mỏi tế b&agrave;o cơ &nbsp;trong suốt qu&aacute; tr&igrave;nh l&agrave;m việc vất vả. C&aacute;c chuy&ecirc;n giamassage c&aacute;c chuy&ecirc;n sẽ sử dụng kết hợp với một số loại tinh dầu để kh&aacute;ch h&agrave;ng cảm thấy thư th&aacute;i, dễ chịu hơn khi thực hiện massage cho kh&aacute;ch h&agrave;ng<br />\r\nB&ecirc;n cạnh việc sử dụng c&aacute;ch thức massage truyền thống th&igrave; một số kh&aacute;ch sạn c&ograve;n kinh doanh một số loại h&igrave;nh đặc biệt: massage ch&acirc;n bằng c&aacute;, massage cho b&agrave; bầu &hellip;. Những loại h&igrave;nh massage mới n&agrave;y đ&atilde; thu h&uacute;t được kh&aacute; nhiều kh&aacute;ch du lịch đến sử dụng dịch vụ tại kh&aacute;ch sạn.</p>', '2020-10-04 18:48:56', '2020-10-04 18:48:56'),
(4, 2, 'Khách sạn', '<p><strong>Sunny Hotel</strong>&nbsp;mang lại dịch vụ ho&agrave;n hảo, l&agrave;m h&agrave;i l&ograve;ng cả những vị kh&aacute;ch kh&oacute; t&iacute;nh nhất với những tiện nghi sang trọng tuyệt vời. Kh&aacute;ch sạn cung cấp phục vụ ăn tại ph&ograve;ng, nh&agrave; h&agrave;ng, thiết bị ph&ograve;ng họp, qu&aacute;n c&agrave; ph&ecirc;, dịch vụ du lịch để đảm bảo kh&aacute;ch của họ được thoải m&aacute;i nhất.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tất cả nơi ăn chốn ở của kh&aacute;ch đều c&oacute; trang bị tiện nghi chu đ&aacute;o để bảo đảm kh&aacute;ch c&oacute; cảm gi&aacute;c dễ chịu kh&ocirc;ng nơi n&agrave;o s&aacute;nh được. B&ecirc;n cạnh đ&oacute;, kh&aacute;ch sạn c&ograve;n gợi &yacute; cho bạn những hoạt động vui chơi giải tr&iacute; bảo đảm bạn lu&ocirc;n thấy hứng th&uacute; trong suốt k&igrave; nghỉ. Khi bạn t&igrave;m kiếm chỗ tạm tr&uacute; thoải m&aacute;i v&agrave; tiện nghi ởTP. HCM<strong>,&nbsp;</strong>h&atilde;y bắt đầu cuộc h&agrave;nh tr&igrave;nh đến <strong>Sunny Hotel.</strong></p>', '2020-10-04 18:52:18', '2020-10-04 18:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `fullname`, `username`, `password`, `sex`, `phone`, `address`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lưu Vĩnh Tuy', 'VinhTuy', '$2y$10$WiaiYAmEvaeOnGfz2Pn.c.owBcOReBK5FZP4SWk/5pQPOGUjFIAkK', 'Nam', 979104421, 'Hậu Giang', '', NULL, NULL, '2020-09-10 18:57:20', '2020-09-10 18:57:20'),
(6, 3, 'Lưu Hoàng Gia Bảo', 'giabao', '$2y$10$f6HRQbFfAoC0GqGHzEVlA.dx6ZHOdph37YSHBiHSSCMAm3Gd2zQKy', NULL, 979104421, 'Cần Thơ', 'giabao1234@gmail.com', NULL, NULL, '2020-12-17 20:07:40', '2020-12-17 20:07:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_details_bookroom_id_foreign` (`bookroom_id`),
  ADD KEY `book_details_bookroom_temp_id_foreign` (`bookroom_temp_id`),
  ADD KEY `book_details_room_id_foreign` (`room_id`);

--
-- Indexes for table `book_detail_temps`
--
ALTER TABLE `book_detail_temps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_detail_temps_bookroom_temp_id_foreign` (`bookroom_temp_id`),
  ADD KEY `book_detail_temps_room_id_foreign` (`room_id`);

--
-- Indexes for table `book_rooms`
--
ALTER TABLE `book_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_room_temps`
--
ALTER TABLE `book_room_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryrooms`
--
ALTER TABLE `categoryrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_services`
--
ALTER TABLE `category_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_contacts`
--
ALTER TABLE `customer_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_rooms`
--
ALTER TABLE `image_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_rooms_room_id_foreign` (`room_id`);

--
-- Indexes for table `image_services`
--
ALTER TABLE `image_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rating_stars`
--
ALTER TABLE `rating_stars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_stars_user_id_foreign` (`user_id`),
  ADD KEY `rating_stars_room_id_foreign` (`room_id`);

--
-- Indexes for table `role_accesses`
--
ALTER TABLE `role_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_category_id_foreign` (`category_id`);

--
-- Indexes for table `save_bookrooms`
--
ALTER TABLE `save_bookrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `save_bookrooms_room_id_foreign` (`room_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_category_service_id_foreign` (`category_service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `book_detail_temps`
--
ALTER TABLE `book_detail_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_rooms`
--
ALTER TABLE `book_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `book_room_temps`
--
ALTER TABLE `book_room_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categoryrooms`
--
ALTER TABLE `categoryrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_services`
--
ALTER TABLE `category_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_contacts`
--
ALTER TABLE `customer_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_rooms`
--
ALTER TABLE `image_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `image_services`
--
ALTER TABLE `image_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rating_stars`
--
ALTER TABLE `rating_stars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `role_accesses`
--
ALTER TABLE `role_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `save_bookrooms`
--
ALTER TABLE `save_bookrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_details`
--
ALTER TABLE `book_details`
  ADD CONSTRAINT `book_details_bookroom_id_foreign` FOREIGN KEY (`bookroom_id`) REFERENCES `book_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_details_bookroom_temp_id_foreign` FOREIGN KEY (`bookroom_temp_id`) REFERENCES `book_room_temps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_details_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_detail_temps`
--
ALTER TABLE `book_detail_temps`
  ADD CONSTRAINT `book_detail_temps_bookroom_temp_id_foreign` FOREIGN KEY (`bookroom_temp_id`) REFERENCES `book_room_temps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_detail_temps_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_rooms`
--
ALTER TABLE `image_rooms`
  ADD CONSTRAINT `image_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_services`
--
ALTER TABLE `image_services`
  ADD CONSTRAINT `image_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rating_stars`
--
ALTER TABLE `rating_stars`
  ADD CONSTRAINT `rating_stars_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_stars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categoryrooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `save_bookrooms`
--
ALTER TABLE `save_bookrooms`
  ADD CONSTRAINT `save_bookrooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_service_id_foreign` FOREIGN KEY (`category_service_id`) REFERENCES `category_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_accesses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
