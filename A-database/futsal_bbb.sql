-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 08:13 AM
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
-- Database: `futsal_bbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `arena`
--

CREATE TABLE `arena` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Tersedia',
  `arenaStatus` varchar(255) NOT NULL DEFAULT 'Tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arena`
--

INSERT INTO `arena` (`id`, `lapangan`, `status`, `arenaStatus`, `created_at`, `updated_at`) VALUES
(1, 'Lapangan 1', 'Aktif', 'Booked', '2024-05-23 07:50:05', '2024-05-26 12:17:25'),
(2, 'Lapangan 2', 'Tersedia', 'Aktif', '2024-05-23 10:12:08', '2024-05-23 11:32:54'),
(3, 'Lapangan 3', 'Booked', 'Booked', '2024-05-23 11:08:45', '2024-05-23 11:18:25'),
(4, 'Lapangan 1', 'Tersedia', 'Tersedia', '2024-05-26 12:18:35', '2024-05-26 12:18:35'),
(5, 'Lapangan 2', 'Tersedia', 'Tersedia', '2024-05-26 12:22:27', '2024-05-26 12:22:27');

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
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `created_at`, `updated_at`, `image_url`) VALUES
(1, 'Lapangan 1', '2024-08-19 01:46:52', '2024-10-03 02:23:51', 'fields/ov58mgzfaCFvy6VaVP4LjtDjfha2EToAYfxVqIik.jpg'),
(2, 'Lapangan 2', '2024-08-19 01:46:52', '2024-09-26 13:22:24', 'fields/PGwHkLRYlMkVg4lB8ePoh8lJXVeom7MzsbZaSU6h.jpg'),
(3, 'Lapangan 3', '2024-08-19 01:46:52', '2024-09-26 13:24:32', 'fields/4hDO47VmIiYLiTE9aJ0MedwbRCfLPsDXke6R67zF.jpg'),
(4, 'Lapangan 4', '2024-08-19 01:46:52', '2024-09-26 13:24:42', 'fields/LTvJ6Ukv7aCxGFCUFzrL2K6cIqgJEFeNqKKuqamn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapangan` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `detail` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `lapangan`, `image`, `detail`, `harga`, `created_at`, `updated_at`) VALUES
(2, 'Futsal', 'lapangan/ROtI7LkJvC5rEiAveoE3zfNkOr0OBwflnuBNZuO8.png', 'Lapangan 1', 30000.00, '2024-05-23 02:20:01', '2024-09-26 11:49:20'),
(3, 'Futsal', 'public/lapangan/pengertian-interlock-futsal-jenis-dan-biaya-pembuatan.jpeg', 'Lapangan 2', 40000.00, '2024-05-23 02:21:54', '2024-09-03 04:39:18'),
(4, 'Futsal', 'public/lapangan/background-lapangan-futsal-27.jpg', 'Lapangan 3', 30000.00, '2024-05-26 04:21:20', '2024-09-03 04:39:32'),
(6, 'Lapangan 4', 'lapangan/billiard.jpg', 'detail', 30000.00, '2024-05-27 07:49:32', '2024-05-27 07:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Rizka', '08568484394398', 'rizka bau kantut', '2024-10-30 00:41:31', '2024-10-30 00:41:31'),
(2, 'BATUBARA', '082149016340', 'HI', '2024-10-30 04:43:25', '2024-10-30 04:43:25');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_17_051446_add_column_image_to_users_table', 1),
(6, '2024_03_26_024105_lapangan_table', 1),
(7, '2024_03_27_052341_arena_table', 1),
(8, '2024_03_27_055155_booking_table', 1),
(9, '2024_05_23_183722_add_column_arena_table', 2),
(10, '2024_08_15_075056_create_schedules_table', 3),
(11, '2024_08_16_095754_create_fields_table', 4),
(12, '2024_08_16_130909_add_price_to_fields_table', 5),
(13, '2024_08_16_133134_fields_table', 6),
(14, '2024_08_19_102157_recreate_bookings_table', 7),
(15, '2024_08_19_102726_recreate_bookings_table', 8),
(16, '2024_08_19_124314_create_orders_table', 9),
(17, '2024_08_26_080730_create_tariffs_table', 10),
(18, '2024_08_28_075806_create_tariffs_table', 11),
(19, '2024_08_29_092421_rename_type_to_day_in_tariffs_table', 12),
(20, '2024_08_29_110214_create_tariff_sessions_table', 13),
(21, '2024_08_29_113518_remove_session_from_tariffs_table', 14),
(22, '2024_08_30_080725_change_sessions_column_type_in_tariff_sessions_table', 15),
(23, '2024_08_30_091602_create_tariffs_table', 16),
(28, '2024_08_30_093837_change_price_column_in_tariff_sessions_table', 17),
(29, '2024_09_02_105207_update_fields_table', 18),
(30, '2024_09_02_105606_update_price_to_qty_in_fields_table', 19),
(31, '2024_09_02_111550_create_tarif_table', 20),
(32, '2024_09_02_113406_create_tarif_sessions_table', 21),
(33, '2024_09_03_081928_create_tarifs_and_tarif_sessions_table', 22),
(34, '2024_09_03_091831_change_price_column_in_tarif_sessions', 23),
(35, '2024_09_04_091016_add_field_id_and_tarif_session_id_to_orders_table', 24),
(36, '2024_09_04_092424_add_fields_to_orders_table', 25),
(37, '2024_09_04_093233_add_column_after_tariff_session_id_table_order', 26),
(38, '2024_09_05_091501_add_time_to_orders_table', 27),
(39, '2024_09_10_130955_create_tarif_sessions_table', 28),
(40, '2024_09_10_140503_create_tarifs_table', 29),
(41, '2024_09_19_100140_create_tarif_sessions_table', 30),
(42, '2024_09_19_100314_create_orders_table', 30),
(43, '2024_09_19_112107_add_date_to_orders_table', 31),
(44, '2024_09_19_155046_add_tarif_session_ids_to_orders_table', 32),
(45, '2024_09_23_101055_remove_tarif_session_id_from_orders_table', 33),
(46, '2024_09_23_101619_create_order_tarif_session_table', 34),
(50, '2024_09_25_144341_add_customer_phone_to_orders_table', 35),
(51, '2024_09_26_152238_add_image_url_to_fields_table', 36),
(52, '2024_10_30_073550_create_messages_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `payment_status` enum('Dalam Proses','Sukses','Dibatalkan') NOT NULL DEFAULT 'Dalam Proses',
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `field_id`, `customer_name`, `customer_phone`, `total_price`, `payment_status`, `date`, `created_at`, `updated_at`) VALUES
(189, 1, 'Banros', '082149016340', 100000, 'Sukses', '2024-09-27', '2024-09-27 06:29:58', '2024-09-27 06:30:21'),
(190, 1, 'Kanca', '082149016340', 100000, 'Sukses', '2024-09-27', '2024-09-27 07:27:40', '2024-09-27 07:33:47'),
(191, 1, 'Raihan', '1234567890', 100000, 'Sukses', '2024-10-02', '2024-10-01 23:48:28', '2024-10-01 23:51:12'),
(192, 1, 'Nouvand', '1234567890', 200000, 'Sukses', '2024-10-17', '2024-10-01 23:57:54', '2024-10-02 00:00:01'),
(193, 1, 'J', '1234567890', 50000, 'Dalam Proses', '2024-10-04', '2024-10-02 04:41:26', '2024-10-02 04:41:26'),
(194, 1, 'J', '1234567890', 50000, 'Dalam Proses', '2024-10-04', '2024-10-02 05:04:21', '2024-10-02 05:04:21'),
(195, 1, 'King', '12356789', 100000, 'Dalam Proses', '2024-10-28', '2024-10-28 06:27:58', '2024-10-28 06:27:58'),
(196, 1, 'Kanca', '082149016340', 100000, 'Sukses', '2024-10-29', '2024-10-29 02:29:58', '2024-10-29 02:36:01'),
(197, 1, '12312', '123123', 50000, 'Dalam Proses', '2024-10-30', '2024-10-30 02:12:26', '2024-10-30 02:12:26'),
(198, 1, '12312', '123123', 50000, 'Dalam Proses', '2024-10-30', '2024-10-30 02:12:53', '2024-10-30 02:12:53'),
(199, 1, '12312', '123123', 50000, 'Dalam Proses', '2024-10-30', '2024-10-30 02:13:03', '2024-10-30 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_tarif_session`
--

CREATE TABLE `order_tarif_session` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `tarif_session_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_tarif_session`
--

INSERT INTO `order_tarif_session` (`id`, `order_id`, `tarif_session_id`) VALUES
(416, 189, 2),
(417, 189, 3),
(418, 190, 2),
(419, 190, 3),
(420, 191, 2),
(421, 191, 3),
(422, 192, 2),
(423, 192, 3),
(424, 192, 5),
(425, 192, 6),
(426, 193, 2),
(427, 194, 2),
(428, 195, 2),
(429, 195, 3),
(430, 196, 2),
(431, 196, 3),
(432, 197, 2),
(433, 198, 2),
(434, 199, 2);

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
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tariffs`
--

CREATE TABLE `tariffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tariffs`
--

INSERT INTO `tariffs` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Futsal', 50000.00, NULL, NULL),
(2, 'Premium Package', 150.00, '2024-08-30 01:37:30', '2024-08-30 01:37:30'),
(3, 'Premium Package', 150.00, '2024-08-30 01:37:49', '2024-08-30 01:37:49'),
(4, 'Premium Package', 150.00, '2024-08-30 01:41:00', '2024-08-30 01:41:00'),
(5, 'Premium Package', 150.00, '2024-08-30 01:44:36', '2024-08-30 01:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `tarifs`
--

CREATE TABLE `tarifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarifs`
--

INSERT INTO `tarifs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Senin - Kamis', NULL, NULL),
(2, 'Jum\'at', NULL, NULL),
(3, 'Sabtu', NULL, NULL),
(4, 'Minggu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tarif_sessions`
--

CREATE TABLE `tarif_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `day_of_week` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `session_time` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarif_sessions`
--

INSERT INTO `tarif_sessions` (`id`, `field_id`, `day_of_week`, `session_time`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, 'Senin', '07:00 - 08:00', 50000, '2024-09-19 03:49:34', '2024-09-19 04:37:43'),
(3, 1, 'Senin', '08:00 - 09:00', 50000, '2024-09-19 04:43:39', '2024-09-19 04:47:03'),
(4, 2, 'Senin', '07:00 - 08:00', 50000, '2024-09-19 04:51:47', '2024-09-19 04:56:42'),
(5, 1, 'Senin', '09:00 - 10:00', 50000, '2024-09-23 05:30:43', '2024-09-24 01:54:36'),
(6, 1, 'Senin', '10:00 - 11:00', 50000, '2024-09-25 01:35:40', '2024-09-25 01:35:40'),
(7, 2, 'Selasa', '08:00 - 09:00', 50000, '2024-09-26 01:03:05', '2024-09-26 01:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('manager','admin') NOT NULL DEFAULT 'admin',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Manager', 'manager', 'Manager@gmail.com', NULL, '$2y$10$3bN00SIbKs6IueIwrEMJIeNZDDs0Xh//rFI3mZEhCcYLpKlsZImxG', NULL, '2024-08-06 01:35:45', '2024-08-06 01:35:45'),
(5, 'Admin', 'admin', 'Admin@gmail.com', NULL, '$2y$10$6/gNqqC./SJOJNNuhT6mqeG0lQfiiL0RCeCZD2Rxa1kLxVucDbKPu', NULL, '2024-08-06 01:35:45', '2024-08-06 01:35:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arena`
--
ALTER TABLE `arena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_field_id_foreign` (`field_id`);

--
-- Indexes for table `order_tarif_session`
--
ALTER TABLE `order_tarif_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_tarif_session_order_id_foreign` (`order_id`),
  ADD KEY `order_tarif_session_tarif_session_id_foreign` (`tarif_session_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif_sessions`
--
ALTER TABLE `tarif_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarif_sessions_field_id_foreign` (`field_id`);

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
-- AUTO_INCREMENT for table `arena`
--
ALTER TABLE `arena`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `order_tarif_session`
--
ALTER TABLE `order_tarif_session`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tarif_sessions`
--
ALTER TABLE `tarif_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_tarif_session`
--
ALTER TABLE `order_tarif_session`
  ADD CONSTRAINT `order_tarif_session_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_tarif_session_tarif_session_id_foreign` FOREIGN KEY (`tarif_session_id`) REFERENCES `tarif_sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tarif_sessions`
--
ALTER TABLE `tarif_sessions`
  ADD CONSTRAINT `tarif_sessions_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
