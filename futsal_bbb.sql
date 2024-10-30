-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 09:28 AM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `res_date` date NOT NULL,
  `res_time` time NOT NULL,
  `arena_id` bigint(20) UNSIGNED NOT NULL,
  `tamu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `first_name`, `last_name`, `email`, `telepon`, `res_date`, `res_time`, `arena_id`, `tamu`, `created_at`, `updated_at`) VALUES
(1, '-', '-', '-@gmail.com', '082149016340', '2024-05-23', '09:00:00', 4, '-', '2024-05-23 08:06:32', '2024-05-26 22:40:46'),
(2, '-', '-', '-@gmail.com', '085750756085', '2024-05-24', '10:00:00', 4, '-', '2024-05-23 09:48:29', '2024-05-26 22:40:59'),
(3, '-', '-', '-@gmail.com', '085753866454', '2024-05-25', '11:00:00', 5, '-', '2024-05-23 09:50:24', '2024-05-26 22:41:13'),
(4, 'Panji', 'Rahmadi', 'panji@gmail.com', '082271129696', '2024-05-26', '12:00:00', 1, 'Skenda', '2024-05-23 09:51:07', '2024-05-26 22:41:47'),
(5, 'Nouvandra', 'Eka', 'nouvand@gmail.com', '0895338701184', '2024-05-27', '13:00:00', 1, 'Skenpat', '2024-05-23 10:05:42', '2024-05-26 12:20:10'),
(6, '-', '-', '-@gmail.com', '081251210686', '2024-05-28', '14:00:00', 5, '-', '2024-05-23 10:07:00', '2024-05-26 22:42:13'),
(7, '-', '-', '-@gmail.om', '085349468461', '2024-05-29', '15:00:00', 4, '-', '2024-05-23 10:08:21', '2024-05-26 22:42:40'),
(8, 'Ridho', 'Rizani', 'ridho@gmail.com', '083863559201', '2024-05-30', '16:00:00', 1, 'Kanca', '2024-05-23 10:09:31', '2024-05-26 22:43:05'),
(9, '-', '-', '-@gmail.com', '083150780664', '2024-05-29', '19:00:00', 5, '-', '2024-05-23 10:10:44', '2024-05-26 22:43:33');

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
(1, 'Futsal', 'public/lapangan/Lapangan-Futsal-dengan-Lantai-Vinyl.jpg', 'Lapangan 1', 30000.00, '2024-05-23 02:07:04', '2024-05-26 13:08:45'),
(2, 'Futsal', 'public/lapangan/futsal.jpg', 'Lapangan 2', 30000.00, '2024-05-23 02:20:01', '2024-05-26 12:53:56'),
(3, 'Futsal', 'public/lapangan/pengertian-interlock-futsal-jenis-dan-biaya-pembuatan.jpeg', 'Lapangan 3', 40000.00, '2024-05-23 02:21:54', '2024-05-26 13:11:20'),
(4, 'Futsal', 'public/lapangan/background-lapangan-futsal-27.jpg', 'Futsal', 30000.00, '2024-05-26 04:21:20', '2024-05-26 13:10:09'),
(6, 'Lapangan 4', 'lapangan/billiard.jpg', 'detail', 30000.00, '2024-05-27 07:49:32', '2024-05-27 07:49:32');

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
(9, '2024_05_23_183722_add_column_arena_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Admin Aplikasi', 'admin', 'Admin@gmail.com', NULL, '$2y$10$Om3ZhSsg4Ue8o1b/fFzM7Opi6zbsq3W5wMdT52jkcKxc.HhXlL.Cu', NULL, NULL, '2024-05-23 01:37:24', '2024-05-23 01:37:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arena`
--
ALTER TABLE `arena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
