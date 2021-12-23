-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 20, 2021 at 12:38 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `default`
--
CREATE DATABASE IF NOT EXISTS `default` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `default`;
--
-- Database: `monstar`
--
CREATE DATABASE IF NOT EXISTS `monstar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `monstar`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NORMAL',
  `dob` date NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `gender`, `status`, `dob`, `mobile`, `address`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'supper admin', 'admin@admin.com', 'MALE', 'ACTIVE', '1997-03-12', '0372052643', 'BAC NINH', '$2y$10$ULpASzSmk6bIzUV9zE6AvuDworyutJQ1zMFO37ln9JN1XHVKQWUGG', 'SUPPER_ADMIN', NULL, '2021-11-30 17:57:49', '2021-12-17 03:23:09', NULL),
(2, 'Võ Phúc ♥️', 'vophuc@gmail.com', 'FEMALE', 'ACTIVE', '1996-10-10', '0971995894', 'Phúc Diễn, Nam Từ Liêm, Hà Nội', '$2y$10$zlzmqWQR10CxwkB3WUre4.fNlythJGGOAFLJcxVmD0js5Vme7yGOm', 'MANAGER', NULL, '2021-12-16 19:06:52', '2021-12-17 03:17:01', NULL),
(3, 'Nguyễn Văn A', 'nguyenvana@gmail.com', 'MALE', 'DELETE', '2021-07-16', '0353246161', 'Hà Nội', '$2y$10$pCYIwp1TvlkWYyZY8DHLf.eYD1bHq/Omj/4KNqGRNnlY/yh45O056', 'MANAGER', NULL, '2021-12-16 20:30:48', '2021-12-17 02:45:19', NULL),
(4, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', 'MALE', 'ACTIVE', '2021-09-01', '0312345678', 'Hà Nội', '$2y$10$ZtCGdisrC1Zq8sifb7FwBOyULdEYY/8q4ULMscg/FDZw2gP/ipaLe', 'MANAGER', NULL, '2021-12-16 20:33:09', '2021-12-16 20:33:09', NULL),
(5, 'nguyen van C', 'nguyenvanc@gmail.com', 'FEMALE', 'ACTIVE', '2021-06-16', '0987654321', 'Ha Nọi', '$2y$10$kr.ueC9vyWPjckOuwx80ROqZWRMXk7DHcAi6HOP6E1yIB4RKvBYUK', 'STAFF', NULL, '2021-12-16 20:36:41', '2021-12-16 20:36:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `name_bill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` double(25,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EXPORT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `admin_id`, `name_bill`, `project_id`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '', 2, 2, 30000000.00, 'NEW', '2021-12-16 18:50:20', '2021-12-19 09:45:08'),
(2, 1, '', 4, 5, 600000.00, 'EXPORT', '2021-12-16 18:56:22', '2021-12-16 20:27:08'),
(3, 1, '', 4, 4, 600000.00, 'EXPORT', '2021-12-16 18:57:28', '2021-12-19 03:46:35'),
(4, 1, '', 4, 1, 600000.00, 'NEW', '2021-12-16 19:03:04', '2021-12-16 19:03:04'),
(5, 1, '', 6, 1, 2000000.00, 'EXPORT', '2021-12-19 03:54:36', '2021-12-19 09:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int NOT NULL,
  `user_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `name_contract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_contract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effective_date` timestamp NOT NULL,
  `expiration_date` timestamp NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW',
  `quantity` int NOT NULL,
  `price` double(25,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `project_id`, `user_id`, `admin_id`, `name_contract`, `number_contract`, `effective_date`, `expiration_date`, `status`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Hợp đồng sản xuất linh kiện điện thoại', 'HĐ123122021', '2021-12-15 00:00:00', '2022-01-15 00:00:00', 'NEW', 20, 200000.00, '2021-12-15 15:52:38', '2021-12-15 15:52:38'),
(2, 3, 1, 1, 'Sản xuất dây sạc', 'HĐ135122021', '2021-12-16 00:00:00', '2022-02-28 00:00:00', 'NEW', 1000, 100000.00, '2021-12-16 16:30:56', '2021-12-16 16:30:56'),
(3, 2, 1, 1, 'Iphone 13', 'HĐ137122021', '2021-12-16 00:00:00', '2022-01-16 00:00:00', 'NEW', 2, 30000000.00, '2021-12-16 16:45:26', '2021-12-16 16:45:26'),
(4, 4, 1, 1, 'Hợp đồng 0155', 'HĐ139122021', '2021-12-16 00:00:00', '2022-01-16 00:00:00', 'COMPLETED', 10, 600000.00, '2021-12-16 18:56:00', '2021-12-16 19:03:04'),
(5, 6, 1, 1, 'họp dong mua ban kindle', 'HĐ152122021', '2021-12-19 00:00:00', '2022-01-19 00:00:00', 'ACTIVE', 2, 2000000.00, '2021-12-19 03:54:16', '2021-12-19 03:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint UNSIGNED NOT NULL,
  `number` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `number`, `name`, `created_at`, `updated_at`) VALUES
(1, 153, 'contract', '2021-12-14 17:01:31', '2021-12-19 14:24:30');

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
-- Table structure for table `histories_bill`
--

CREATE TABLE `histories_bill` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_id` int NOT NULL,
  `price` double(25,2) NOT NULL,
  `quantity` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NORMAL',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories_bill`
--

INSERT INTO `histories_bill` (`id`, `bill_id`, `price`, `quantity`, `status`, `code`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 30000000.00, 2, 'DELETED', 'O1EIUL191221', 2, '2021-12-19 08:41:15', '2021-12-19 09:44:50'),
(2, 5, 2000000.00, 1, 'NORMAL', 'ADZWYG191221', 2, '2021-12-19 09:45:57', '2021-12-19 09:45:57');

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
(5, '2021_11_30_162749_create_admins_table', 1),
(6, '2021_11_30_163526_create_projects_table', 1),
(7, '2021_11_30_165037_create_contracts_table', 1),
(8, '2021_11_30_165749_create_bills_table', 1),
(9, '2021_12_14_142218_add_column_to_projects_table', 2),
(10, '2021_12_14_142355_add_column_to_bills_table', 3),
(11, '2021_12_14_145852_change_column_to_projects_table', 3),
(12, '2021_12_14_145853_change_column_to_projects_table', 4),
(13, '2021_12_14_145854_change_column_to_projects_table', 5),
(14, '2021_12_14_145856_change_column_to_projects_table', 6),
(15, '2021_12_14_145857_create_bills_table', 7),
(16, '2021_12_14_165212_create_counters_table', 8),
(17, '2021_12_14_165213_create_counters_table', 9),
(18, '2021_12_15_163526_create_projects_table', 10),
(19, '2021_12_15_165037_create_contracts_table', 10),
(20, '2021_12_19_035641_create_histories_bill_table', 11),
(21, '2021_12_19_035642_create_histories_bill_table', 12),
(22, '2021_12_19_035643_create_histories_bill_table', 13),
(23, '2021_12_19_035644_create_histories_bill_table', 14),
(24, '2021_12_19_165910_create_sessions_table', 15);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `name_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` double(25,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW',
  `admin_id` int NOT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name_project`, `quantity`, `price`, `status`, `admin_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Dự án 01', 20, 200000.00, 'COMPLETED', 1, 20, '2021-12-15 15:31:22', '2021-12-17 16:30:05'),
(2, 'IPHONE 13', 2, 30000000.00, 'COMPLETED', 1, 2, '2021-12-15 19:05:37', '2021-12-17 16:30:10'),
(3, 'Sản xuất dây sạc TypeC', 1000, 100000.00, 'COMPLETED', 1, 1000, '2021-12-16 16:30:18', '2021-12-17 16:30:13'),
(4, 'Miband4', 10, 600000.00, 'COMPLETED', 1, 10, '2021-12-16 18:53:24', '2021-12-16 19:03:04'),
(5, 'Dự án mới chưa có hợp đồng', 10, 200000.00, 'COMPLETED', 1, 0, '2021-12-17 04:08:51', '2021-12-17 04:45:48'),
(6, 'kindle basic 10', 2, 2000000.00, 'ACTIVE', 1, 1, '2021-12-19 03:53:49', '2021-12-19 03:54:36');

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
('kgpiNo7NINfBYGYERPs2H9dcLu6aO6URDASdXIYX', 1, '172.20.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQlVOazdSZXVUakJwVTluVVAxWmtsb20xQWJ1V2tBQ05xaktNMG01VCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMzoiaHR0cDovL21vbnN0YXItbGFiLnRlc3QiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL21vbnN0YXItbGFiLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1639933837),
('y3pXvIRM5IHCo9xrPKsGe0Jyfwnvqfe0BeJEn2YZ', 1, '172.20.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSE1HdkN4OTIyNWVDUnBuanEzVTNaTGNRcFVxM0xRc1hFQnZ4WVhsaCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMzoiaHR0cDovL21vbnN0YXItbGFiLnRlc3QiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL21vbnN0YXItbGFiLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1639933860);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NORMAL',
  `dob` timestamp NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `gender`, `status`, `dob`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Võ Thị Lộc', 'voloc@gmail.com', 'FEMALE', 'NORMAL', '2021-12-13 00:00:00', '+84372052643', 'Thuận thành_ Bắc Ninh', '2021-12-14 16:01:37', '2021-12-17 16:45:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contracts_number_contract_unique` (`number_contract`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories_bill`
--
ALTER TABLE `histories_bill`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories_bill`
--
ALTER TABLE `histories_bill`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
