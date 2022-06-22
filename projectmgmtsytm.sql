-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 02:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmgmtsytm`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_resets_table', 1),
(51, '2019_08_19_000000_create_failed_jobs_table', 1),
(52, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(53, '2022_06_21_073624_create_projects_table', 1),
(55, '2022_06_21_114716_create_reviews_table', 1),
(56, '2022_06_21_073947_create_tags_table', 2),
(57, '2022_06_22_133521_create_permissions_table', 3),
(58, '2022_06_22_133920_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(6, 'login', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(7, 'logout', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(8, 'register', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(9, 'password.request', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(10, 'password.email', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(11, 'password.reset', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(12, 'password.update', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(13, 'password.confirm', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(14, 'dashboard', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(15, 'users', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(16, 'addUser', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(17, 'storeUser', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(18, 'editUser', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(19, 'updateUser', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(20, 'deleteUser', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(21, 'usersRole', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(22, 'addUserRole', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(23, 'storeUserRole', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(24, 'editUserRole', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(25, 'updateUserRole', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(26, 'deleteUserRole', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(27, 'permissions', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(28, 'addpermission', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(29, 'storepermission', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(30, 'editpermission', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(31, 'updatePermission', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(32, 'deletepermission', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(33, 'projects', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(34, 'addProject', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(35, 'storeProject', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(36, 'editProject', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(37, 'updateProject', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(38, 'viewProject', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(39, 'deleteProject', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(40, 'tags', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(41, 'addTag', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(42, 'storeTag', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(43, 'editTag', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(44, 'updateTag', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(45, 'viewTag', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(46, 'deleteTag', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51'),
(47, 'storeReview', 'web', '2022-06-22 12:13:51', '2022-06-22 12:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_skill_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_reference` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `slug`, `duration`, `proj_url`, `proj_skill_id`, `client_reference`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'AdminLTE v3', 'Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 'adminlte-v3', '12', 'http://127.0.0.1:8000/add-projects', '2', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore.', 3, 1, 1, '2022-06-21 22:50:17', '2022-06-22 07:35:40'),
(2, 'AdminLTE V2', 'Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 'adminlte-v2', '24', 'http://127.0.0.1:8000/add-projects', '5,2,1', 'Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 2, 1, 1, '2022-06-22 07:09:07', '2022-06-22 07:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `projid` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userid`, `projid`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 1, '2022-06-21 22:55:00', '2022-06-21 22:55:00'),
(2, 1, 1, 'Some people hate it and argue for its demise, but others ignore.', 1, '2022-06-21 23:01:44', '2022-06-21 23:01:44'),
(3, 1, 1, 'Cosby sweater eu banh mi, qui irure terr.', 1, '2022-06-21 23:02:22', '2022-06-21 23:02:22'),
(4, 1, 2, 'Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 1, '2022-06-22 07:40:38', '2022-06-22 07:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', 1, '2022-06-22 10:34:44', '2022-06-22 10:34:44'),
(2, 'Users', 'web', 1, '2022-06-22 11:09:06', '2022-06-22 11:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(33, 2),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'laravel', 1, 1, NULL, '2022-06-22 05:20:34', '2022-06-22 05:20:34'),
(2, 'PHP', 'php', 1, 1, NULL, '2022-06-22 05:27:56', '2022-06-22 05:27:56'),
(5, 'Node', 'node', 1, 1, NULL, '2022-06-22 05:33:29', '2022-06-22 05:33:29'),
(6, 'Codeigniter', 'codeigniter', 1, 1, 1, '2022-06-22 06:07:25', '2022-06-22 06:16:23'),
(7, 'React', 'react', 2, 1, NULL, '2022-06-22 06:16:37', '2022-06-22 06:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Jyoti Gautam', 'jyoti.610weblab@gmail.com', NULL, '$2y$10$OPNMcePWGNIUzZpk7/Lkb.VKX.aX/okVwQmryJ8qsNikgvAD0rQlS', NULL, 1, NULL, NULL, '2022-06-21 22:46:10', '2022-06-21 22:46:10'),
(2, 'Test', 'test@gmail.com', NULL, '$2y$10$s.2QbcjX99WpT3XJjFFyl.ep6vAHWHWyQFg2zOG/xkHTPBaySFS6i', NULL, 2, NULL, 1, '2022-06-22 11:48:25', '2022-06-22 12:03:02');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
