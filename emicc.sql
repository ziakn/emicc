-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 07:50 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emicc`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulats`
--

CREATE TABLE `articulats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `arta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articulats`
--

INSERT INTO `articulats` (`id`, `user_id`, `arta`, `artb`, `artc`, `date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 4, 'aS', 'as', 'aS', '2020-08-13', NULL, '2020-08-07 14:19:26', '2020-08-20 14:22:19'),
(8, 4, 'sd', 'asd', 'asd', '2020-10-03', NULL, '2020-10-03 04:49:43', '2020-10-15 18:03:39'),
(9, 2, 'mentorwe', 'mentor', 'mentor', '2020-10-17', NULL, '2020-10-16 14:33:35', '2020-10-16 16:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `comunicates`
--

CREATE TABLE `comunicates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `articulate_id` int(11) NOT NULL,
  `arta1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arta2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arta3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artb1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artb2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artb3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artc1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artc2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artc3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arta1status` int(20) NOT NULL DEFAULT 1,
  `arta2status` int(20) NOT NULL DEFAULT 1,
  `arta3status` int(20) NOT NULL DEFAULT 1,
  `artb1status` int(20) NOT NULL DEFAULT 1,
  `artb2status` int(20) NOT NULL DEFAULT 1,
  `artb3status` int(20) NOT NULL DEFAULT 1,
  `artc1status` int(20) NOT NULL DEFAULT 1,
  `artc2status` int(20) NOT NULL DEFAULT 1,
  `artc3status` int(20) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comunicates`
--

INSERT INTO `comunicates` (`id`, `user_id`, `articulate_id`, `arta1`, `arta2`, `arta3`, `artb1`, `artb2`, `artb3`, `artc1`, `artc2`, `artc3`, `arta1status`, `arta2status`, `arta3status`, `artb1status`, `artb2status`, `artb3status`, `artc1status`, `artc2status`, `artc3status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2020-08-07 14:19:26', '2020-08-20 14:22:19'),
(3, 4, 8, 'asdas', 'asda', 'asd', NULL, NULL, 'asd', NULL, NULL, NULL, 2, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2020-10-03 04:49:43', '2020-10-15 18:03:39'),
(4, 2, 9, 'mentor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2020-10-16 14:33:35', '2020-10-16 16:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_users`
--

CREATE TABLE `mentor_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentor_users`
--

INSERT INTO `mentor_users` (`id`, `mentor_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 2, 4, '2020-08-20 14:20:32', '2020-08-20 14:21:39');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_21_145028_create_user_types_table', 2),
(5, '2020_07_10_153658_create_user_types_table', 3),
(6, '2020_07_18_185001_create_mentor_users_table', 4),
(7, '2020_07_18_185205_create_articulats_table', 5),
(8, '2020_07_18_185422_create_take_actions_table', 5),
(9, '2020_07_18_185806_create_comunicates_table', 5),
(15, '2016_06_01_000001_create_oauth_auth_codes_table', 6),
(16, '2016_06_01_000002_create_oauth_access_tokens_table', 6),
(17, '2016_06_01_000003_create_oauth_refresh_tokens_table', 6),
(18, '2016_06_01_000004_create_oauth_clients_table', 6),
(19, '2016_06_01_000005_create_oauth_personal_access_clients_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('3448a26246ddd12b79292093d11de3c577ac362b8559179c6d8350ebc5e1a1e1454fced144d8563e', 4, 4, NULL, '[]', 0, '2020-11-06 14:44:30', '2020-11-06 14:44:30', '2021-11-06 18:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'BlpjZAJJwcjqPXNeCIc7mfCJmJZTaiEBxgKhpuLY', NULL, 'http://localhost', 1, 0, 0, '2020-11-06 14:42:23', '2020-11-06 14:42:23'),
(2, NULL, 'Laravel Password Grant Client', 'hl2VKHh0lDcnSsSv1auo1lMDinAd2byqKk4KW5F9', 'users', 'http://localhost', 0, 1, 0, '2020-11-06 14:42:23', '2020-11-06 14:42:23'),
(3, NULL, 'Laravel Personal Access Client', 'HYGLuXDS4mhsCSiuQOx24jebHpWufRF3lhBKuN47', NULL, 'http://localhost', 1, 0, 0, '2020-11-06 14:43:22', '2020-11-06 14:43:22'),
(4, NULL, 'Laravel Password Grant Client', 'Iyi2xPMqWeCBaly6emuQ0IPMDiLUekMBpUlM6BI9', 'users', 'http://localhost', 0, 1, 0, '2020-11-06 14:43:22', '2020-11-06 14:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-06 14:42:23', '2020-11-06 14:42:23'),
(2, 3, '2020-11-06 14:43:22', '2020-11-06 14:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('edefc5e9b0dc137807cfb47231e94b983e551f0e57195d104ba84f426067a960b41365f05fa151e8', '3448a26246ddd12b79292093d11de3c577ac362b8559179c6d8350ebc5e1a1e1454fced144d8563e', 0, '2021-11-06 18:44:30');

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
-- Table structure for table `take_actions`
--

CREATE TABLE `take_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `articulate_id` int(11) NOT NULL,
  `notification` tinyint(1) NOT NULL DEFAULT 1,
  `actionstatus` int(20) NOT NULL DEFAULT 1,
  `ringtone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeattask` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time DEFAULT NULL,
  `action_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `take_actions`
--

INSERT INTO `take_actions` (`id`, `user_id`, `articulate_id`, `notification`, `actionstatus`, `ringtone`, `notification_frequency`, `repeat_flag`, `repeattask`, `time`, `action_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 4, 5, 1, 1, NULL, '', NULL, NULL, NULL, NULL, NULL, '2020-08-07 14:19:26', '2020-08-20 14:22:19'),
(3, 4, 8, 0, 0, 'ring1', '1', 'Saturday', '0', '01:05:00', NULL, NULL, '2020-10-03 04:49:43', '2020-10-15 18:03:39'),
(4, 2, 9, 0, 1, 'ring1', '1', 'Wednesday', 'Weekly', '06:15:00', NULL, NULL, '2020-10-16 14:33:35', '2020-10-16 16:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1-Super Admin, 2-Mentors, 3-Users',
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/profile.png',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-InActive,1-Active,2-Deleted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin_id`, `name`, `email`, `email_verified_at`, `password`, `type`, `contact`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@emicc.com', NULL, '$2y$10$vSGh36jSBxBwoE/8z/.Gg.AZu2f4XfTUyu36CPYo...NRX3ZQKDJC', 1, '123123123', 'asdasdasd', '/storage/uploads/avatar/9Nx6zYxf5XZLUshqKYT5yRM2y9NFnBuAbMUoUCMz.png', 1, NULL, NULL, '2020-09-24 07:12:08'),
(2, 1, 'mentor', 'mentor@emicc.com', NULL, '$2y$10$Fu7zlJid2ZbCshKkqcnlt.vitLKs4mkQv.bm8U7gc.Cgawxc8ncjq', 2, '123123', 'asdasd', '/storage/uploads/avatar/lqj2ab75jrMXjDKi7vYZDKd44su5W69YFjAfPa96.png', 1, NULL, '2020-07-10 11:46:16', '2020-09-24 07:09:29'),
(3, 1, 'asd', 'asd', NULL, '$2y$10$geZNigQcgmr8gkyMQ7WOa.tArEDAhQYpLs3H2LPmrZHUkL0gTI1TG', 3, 'ziasdasdakn03@gmail.com', 'asd', '/profile.png', 1, NULL, '2020-07-10 11:51:12', '2020-07-13 13:03:15'),
(4, 2, 'asd', 'user@emicc.com', NULL, '$2y$10$xmi.VASzwidLvsESyhFWwu0bQY0oDvWhGqH7WoiY./Zrf7JDsbY0q', 3, '123', 'ASA', '/storage/uploads/avatar/QR8ZQrGnWZhx2lpVnquPQvDaK2GQFghPZ60xemRN.png', 1, NULL, '2020-07-13 13:10:59', '2020-09-24 06:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-InActive,1-Active,2-Deleted',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `admin_id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 1, NULL, '2020-07-10 11:44:38', '2020-07-10 11:44:38'),
(2, 1, 'Mentors', 1, NULL, '2020-07-10 11:44:51', '2020-07-10 11:44:51'),
(3, 1, 'User', 1, NULL, '2020-07-13 13:03:02', '2020-07-13 13:03:02'),
(4, 1, 'Cleaner', 1, NULL, '2020-09-24 07:12:42', '2020-09-24 07:12:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulats`
--
ALTER TABLE `articulats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`),
  ADD UNIQUE KEY `deleted_at` (`deleted_at`);

--
-- Indexes for table `comunicates`
--
ALTER TABLE `comunicates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor_users`
--
ALTER TABLE `mentor_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `take_actions`
--
ALTER TABLE `take_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulats`
--
ALTER TABLE `articulats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comunicates`
--
ALTER TABLE `comunicates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentor_users`
--
ALTER TABLE `mentor_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `take_actions`
--
ALTER TABLE `take_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
