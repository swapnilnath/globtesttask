-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2020 at 11:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gift_details`
--

CREATE TABLE `gift_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gift_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gift_image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_gift_detail` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','block') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gift_details`
--

INSERT INTO `gift_details` (`id`, `gift_name`, `store_id`, `gift_image`, `description`, `price`, `post_gift_detail`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'gift store demo', '1', 'suu7tJjmuA.png', '<p>gift store demogift store demogift store demogift store demogift store demogift store demogift store demogift store demogift store demogift store demogift store demogift store demogift store demogift store demogift store demo</p>', '111', NULL, '2020-11-19 10:54:42', '2020-11-19 10:54:42', NULL, 'active'),
(2, 'gift store demo test', '2', 'RiZpCFv5Ej.jpg', '<p>gift store demo test</p>', '2342', NULL, '2020-11-19 10:56:08', '2020-11-19 10:56:08', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_15_105038_create_roles_table', 1),
(5, '2020_11_19_105812_create_stores_table', 1),
(6, '2020_11_19_110251_create_gift_details_table', 1),
(7, '2020_11_19_110351_create_user_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', '2020-11-19 10:50:52', '2020-11-19 10:50:52', NULL),
(2, 'store_manager', '2020-11-19 10:50:52', '2020-11-19 10:50:52', NULL),
(3, 'user', '2020-11-19 10:50:53', '2020-11-19 10:50:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','block') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `store_image`, `email`, `mobile`, `address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Glob store', 'Chbgtv3ncg.jpg', 'Globstoretest@gmail.com', '15457454534', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitatio', 'active', '2020-11-19 10:53:54', '2020-11-19 10:53:54', NULL),
(2, 'test storeA', 'uGw12IsRva.jpg', 'Globstoretest@gmail.com', '232323232', '<p>test storeA</p>', 'active', '2020-11-19 10:54:18', '2020-11-19 10:54:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` enum('superadmin','store_manager','user') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','block') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `avatar` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `user_type`, `status`, `avatar`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$UYVzhGxwjmD.cy9TnEswkOUXPf7tVmEO4lNhiVQrGOt31AyKdIarK', '1', 'superadmin', 'active', NULL, NULL, '2020-11-19 10:50:53', '2020-11-19 10:50:53', NULL),
(2, 'testmanager', 'testmanager@admin.com', NULL, '$2y$10$eC/KGGbuZib/slidZl9m1.Y5pw3vNRcd81wqfDq86w3WOY8SGExr.', '2', 'store_manager', 'active', NULL, NULL, '2020-11-19 10:50:54', '2020-11-19 10:50:54', NULL),
(3, 'Store manager', 'storemanager@admin.com', NULL, '$2y$10$fMI0o8YSmoNvypH0DAkfs.2bmllnII8JyDU.K0AaJ9S2OVBSeY.3O', '2', 'store_manager', 'active', NULL, NULL, '2020-11-19 10:50:54', '2020-11-19 10:50:54', NULL),
(4, 'testuser', 'testuser@admin.com', NULL, '$2y$10$qZqN7YjFtanzEawbAArX/.4a.xox26fydv5r62kqmtZgJvQZdkBCa', '3', 'user', 'active', NULL, NULL, '2020-11-19 10:50:54', '2020-11-19 10:50:54', NULL),
(5, 'demouser', 'demouser@admin.com', NULL, '$2y$10$AbBZ4uVsOl0wxH/F.CaUs.qiTrzbhu0oGFnx0TGG6D3wx0Xw2UJE6', '3', 'user', 'active', NULL, NULL, '2020-11-19 10:50:54', '2020-11-19 10:50:54', NULL),
(6, 'swapnil user', 'swapniluser@gmail.com', NULL, '$2y$10$FMao81mkiz6PVttfevehU./43frZ1rApB/zCXEOx3BD3d5RIT0pve', '3', 'user', 'active', 'mY0YQxTSRH.jpg', NULL, '2020-11-19 10:53:14', '2020-11-19 10:53:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gift_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`id`, `user_id`, `gift_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6', '1', '2020-11-19 10:56:22', '2020-11-19 10:56:22', NULL),
(2, '6', '2', '2020-11-19 10:56:27', '2020-11-19 10:56:27', NULL),
(3, '5', '1', '2020-11-19 10:56:53', '2020-11-19 10:56:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gift_details`
--
ALTER TABLE `gift_details`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_details`
--
ALTER TABLE `gift_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
