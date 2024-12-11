-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 05:28 PM
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
-- Database: `spklaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `nama_alternatif`, `spesifikasi`, `created_at`, `updated_at`) VALUES
(2, 'Asus X441NA', '-', '2024-11-21 11:01:13', '2024-11-21 11:01:13'),
(3, 'Asus X450YA', '-', '2024-11-21 11:01:29', '2024-11-21 11:01:29'),
(4, 'Acer Aspire V5- 123', '-', '2024-11-21 11:01:42', '2024-11-21 11:01:42'),
(5, 'HP BS003TU', '-', '2024-11-21 11:01:53', '2024-11-21 11:01:53'),
(6, 'Lenovo IP210', '-', '2024-11-21 11:02:04', '2024-11-21 11:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `sifat_kriteria` enum('benefit','cost') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama_kriteria`, `bobot_kriteria`, `sifat_kriteria`, `created_at`, `updated_at`) VALUES
(3, 'Harga', 0.3, 'cost', '2024-11-21 10:53:06', '2024-11-21 10:53:06'),
(4, 'JenisProcessor', 0.25, 'benefit', '2024-11-21 10:53:24', '2024-11-21 10:53:24'),
(5, 'RAM', 0.2, 'benefit', '2024-11-21 10:53:39', '2024-11-21 10:53:39'),
(6, 'Ukuran Layar', 0.1, 'benefit', '2024-11-21 10:53:55', '2024-11-21 10:53:55'),
(7, 'VGA', 0.15, 'benefit', '2024-11-21 10:54:07', '2024-11-21 10:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `matriks_keputusans`
--

CREATE TABLE `matriks_keputusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `sub_kriteria_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matriks_keputusans`
--

INSERT INTO `matriks_keputusans` (`id`, `alternatif_id`, `kriteria_id`, `nilai`, `sub_kriteria_name`, `created_at`, `updated_at`) VALUES
(5, 2, 4, 3, NULL, '2024-11-21 11:02:57', '2024-11-21 11:02:57'),
(6, 2, 5, 5, NULL, '2024-11-21 11:03:12', '2024-11-21 11:03:12'),
(7, 2, 6, 3, NULL, '2024-11-21 11:03:29', '2024-11-21 11:03:29'),
(8, 2, 7, 2, NULL, '2024-11-21 11:03:44', '2024-11-21 11:03:44'),
(9, 2, 3, 2, NULL, '2024-11-21 11:04:47', '2024-11-21 11:04:47'),
(10, 3, 3, 3, NULL, '2024-11-21 11:05:04', '2024-11-21 11:05:04'),
(11, 3, 4, 5, NULL, '2024-11-21 11:05:18', '2024-11-21 11:05:18'),
(12, 3, 5, 2, NULL, '2024-11-21 11:05:47', '2024-11-21 11:05:47'),
(13, 3, 6, 4, NULL, '2024-11-21 11:06:01', '2024-11-21 11:06:01'),
(14, 3, 7, 5, NULL, '2024-11-21 11:06:16', '2024-11-21 11:06:16'),
(15, 4, 3, 5, NULL, '2024-11-21 11:06:53', '2024-11-21 11:06:53'),
(16, 4, 4, 4, NULL, '2024-11-21 11:07:07', '2024-11-21 11:07:07'),
(17, 4, 5, 3, NULL, '2024-11-21 11:07:18', '2024-11-21 11:07:18'),
(18, 4, 6, 4, NULL, '2024-11-21 11:07:29', '2024-11-21 11:07:29'),
(19, 4, 7, 4, NULL, '2024-11-21 11:07:41', '2024-11-21 11:07:41'),
(20, 5, 3, 1, NULL, '2024-11-21 11:07:54', '2024-11-21 11:07:54'),
(21, 5, 4, 1, NULL, '2024-11-21 11:08:07', '2024-11-21 11:08:07'),
(22, 5, 5, 5, NULL, '2024-11-21 11:08:19', '2024-11-21 11:08:19'),
(23, 5, 6, 1, NULL, '2024-11-21 11:08:32', '2024-11-21 11:08:32'),
(24, 5, 7, 1, NULL, '2024-11-21 11:08:45', '2024-11-21 11:08:45'),
(25, 6, 3, 4, NULL, '2024-11-21 11:08:56', '2024-11-21 11:08:56'),
(26, 6, 4, 2, NULL, '2024-11-21 11:09:11', '2024-11-21 11:09:11'),
(27, 6, 5, 3, NULL, '2024-11-21 11:09:22', '2024-11-21 11:09:22'),
(28, 6, 6, 1, NULL, '2024-11-21 11:09:35', '2024-11-21 11:09:35'),
(30, 6, 7, 3, 'Intel HD Graphics 4000', '2024-11-21 11:16:53', '2024-11-21 11:34:09');

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
(7, '2024_11_20_121057_create_matriks_keputusan_table', 2),
(8, '2024_11_20_125921_create_matriks_keputusans_table', 3),
(17, '0001_01_01_000000_create_users_table', 4),
(18, '0001_01_01_000001_create_cache_table', 4),
(19, '0001_01_01_000002_create_jobs_table', 4),
(20, '2024_11_20_121008_create_kriterias_table', 4),
(21, '2024_11_20_121026_create_sub_kriterias_table', 4),
(22, '2024_11_20_121044_create_alternatifs_table', 4),
(23, '2024_11_20_160124_create_matriks_keputusans_table', 4),
(24, '2024_11_20_174144_update_nilai_column_in_matriks_keputusans_table', 5);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pdMHCTZmydEWoSsTT96IrcED1HNsBx94HhFzfH8m', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiR0I0RHdJMzdGQVRUbWtWY21VandvVjZqU1hqd1V5WnNHQXBLVkNiUyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbWF0cmlrcy9yYW5raW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1733933754);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriterias`
--

CREATE TABLE `sub_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama_sub_kriteria` varchar(255) NOT NULL,
  `bobot_sub_kriteria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kriterias`
--

INSERT INTO `sub_kriterias` (`id`, `kriteria_id`, `nama_sub_kriteria`, `bobot_sub_kriteria`, `created_at`, `updated_at`) VALUES
(5, 3, 'Rp 3.100.000 - Rp 4.000.000', 5, '2024-11-21 10:55:02', '2024-11-21 10:55:02'),
(6, 3, 'Rp 3.400.000 - Rp 4.000.000', 4, '2024-11-21 10:55:24', '2024-11-21 10:55:24'),
(7, 3, 'Rp 3.500.000 - Rp 4.000.000', 3, '2024-11-21 10:55:39', '2024-11-21 10:55:39'),
(8, 3, 'Rp 3.900.000 - Rp 4.000.000', 2, '2024-11-21 10:55:54', '2024-11-21 10:55:54'),
(9, 3, 'Rp 3.950.000 - Rp 4.000.000', 1, '2024-11-21 10:56:11', '2024-11-21 10:56:11'),
(10, 4, 'AMD Carrizo-L APU E1- 7010', 5, '2024-11-21 10:56:27', '2024-11-21 10:56:27'),
(11, 4, 'AMD E1 200 Speed 1 Ghz', 4, '2024-11-21 10:56:39', '2024-11-21 10:56:39'),
(12, 4, 'Intel Celeron N3350', 3, '2024-11-21 10:56:53', '2024-11-21 10:56:53'),
(13, 4, 'Celeron Dual Core', 2, '2024-11-21 10:57:12', '2024-11-21 10:57:12'),
(14, 4, 'Intel Celeron N3060', 1, '2024-11-21 10:57:28', '2024-11-21 10:57:28'),
(15, 5, '4 Gb DDR3L', 5, '2024-11-21 10:57:43', '2024-11-21 10:57:43'),
(16, 5, '2 Gb DDR3', 3, '2024-11-21 10:57:57', '2024-11-21 10:57:57'),
(17, 5, '2 Gb DDR3L', 2, '2024-11-21 10:58:10', '2024-11-21 10:58:10'),
(18, 6, '15,6”', 4, '2024-11-21 10:58:36', '2024-11-21 10:58:36'),
(19, 6, '14”', 3, '2024-11-21 10:58:49', '2024-11-21 10:58:49'),
(20, 6, '11,6”', 1, '2024-11-21 10:59:02', '2024-11-21 10:59:02'),
(21, 7, 'AMD Radeon TM R2 Graphics', 5, '2024-11-21 10:59:19', '2024-11-21 10:59:19'),
(22, 7, 'AMD Radeon HD 8210', 4, '2024-11-21 10:59:31', '2024-11-21 10:59:31'),
(23, 7, 'Intel HD Graphics 4000', 3, '2024-11-21 10:59:42', '2024-11-21 10:59:42'),
(24, 7, 'Intel HD Graphics 500', 2, '2024-11-21 10:59:54', '2024-11-21 10:59:54'),
(25, 7, 'Intel HD Graphics 400', 1, '2024-11-21 11:00:05', '2024-11-21 11:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'johar', 'johararifin1@gmail.com', NULL, '$2y$12$513DRwnqSpDUS92igi7D4e.HgXxr5mdJXWUYcCDdXhEHOvjH52kDG', NULL, '2024-11-20 10:20:48', '2024-11-20 10:20:48'),
(2, 'johar', 'johar123@gmail.com', NULL, '$2y$12$p5OJZUubSx4FeININlLF0eGVlhoKLCeAQN1EiF0XaNSA3RDluU9qO', NULL, '2024-12-10 21:50:34', '2024-12-10 21:50:34'),
(3, 'joharrrr', 'johar290204@gmail.com', NULL, '$2y$12$q8X155vJJ3Uzi8I171lB7eVO5G529v2LV5bcuRvdRABvDvs7uuDpO', NULL, '2024-12-10 22:06:57', '2024-12-10 22:06:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matriks_keputusans`
--
ALTER TABLE `matriks_keputusans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matriks_keputusans_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `matriks_keputusans_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriterias_kriteria_id_foreign` (`kriteria_id`);

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
-- AUTO_INCREMENT for table `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `matriks_keputusans`
--
ALTER TABLE `matriks_keputusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matriks_keputusans`
--
ALTER TABLE `matriks_keputusans`
  ADD CONSTRAINT `matriks_keputusans_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matriks_keputusans_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD CONSTRAINT `sub_kriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
