-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Sep 10, 2021 at 12:49 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelatihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `isi` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_update` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `image`, `created_at`, `updated_at`) VALUES
(5, '1630642364_ScreenShot2020-12-28at07.30.38.png', '2021-09-03 04:12:44', '2021-09-03 04:12:44'),
(6, '1630730299_ScreenShot2021-01-20at15.18.23.png', '2021-09-04 04:38:19', '2021-09-04 04:38:19'),
(7, '1631003548_ScreenShot2021-09-01at10.43.27.png', '2021-09-07 08:32:28', '2021-09-07 08:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `diklats`
--

CREATE TABLE `diklats` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diklats`
--

INSERT INTO `diklats` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Diklat Substansi Pemasyarakatan\r\n', NULL, NULL),
(2, 'Diklat Administrasi Umum\r\n', NULL, NULL),
(3, 'Diklat Substansi Hukum\r\n', NULL, NULL),
(4, 'Diklat Substansi Imigrasiiiiiip', NULL, '2021-08-20 12:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kanwils`
--

CREATE TABLE `kanwils` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kanwils`
--

INSERT INTO `kanwils` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'jateng', NULL, NULL),
(2, 'jatim', NULL, NULL);

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
(4, '2021_08_15_070330_create_kanwils_table', 1),
(5, '2021_08_15_070646_create_upts_table', 1),
(6, '2021_08_15_071941_create_diklats_table', 1),
(7, '2021_08_15_072124_create_sub_diklats_table', 1),
(8, '2021_08_19_091754_create_transaksis_table', 2),
(9, '2021_08_20_135017_create_prolats_table', 3),
(10, '2021_08_22_133054_create_carousels_table', 4),
(11, '2021_08_22_141426_create_settings_table', 5),
(12, '2021_08_22_113937_create_usulans_table', 6),
(14, '2021_09_07_070228_create_beritas_table', 7);

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
-- Table structure for table `prolats`
--

CREATE TABLE `prolats` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prolats`
--

INSERT INTO `prolats` (`id`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021', '0', '2021-08-20 14:01:33', '2021-08-20 14:01:33'),
(3, '2021', '1', '2021-08-20 14:11:40', '2021-08-23 10:12:00'),
(4, 'adsdsad', '0', '2021-08-22 12:17:02', '2021-08-23 10:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `pengumuman`, `created_at`, `updated_at`) VALUES
(2, 'pengumuan acara diklat semarang akan di mulai tanggal 20 agustus 2021', '2021-08-22 14:34:13', '2021-08-22 14:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `sub_diklats`
--

CREATE TABLE `sub_diklats` (
  `id` bigint UNSIGNED NOT NULL,
  `diklat_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_diklats`
--

INSERT INTO `sub_diklats` (`id`, `diklat_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 2, 'Administrasi Barang Milik Negara \r\n', NULL, NULL),
(2, 3, 'Fidusia', NULL, NULL),
(3, 4, 'Kewarganegaraan ', NULL, NULL),
(4, 2, 'Analisis Data dan Informasi\r\n', NULL, NULL),
(5, 3, 'Teknis Pelayanan Hukum Tk. Lanjutan', NULL, NULL),
(6, 3, 'Sistem Administrasi Badan Hukum', NULL, NULL),
(7, 3, 'dasdasd', NULL, NULL),
(8, 3, 'coba', NULL, NULL),
(10, 1, 'asdasdasd', '2021-08-22 02:14:54', '2021-08-22 02:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `diklat_id` bigint UNSIGNED NOT NULL,
  `sub_diklat_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upts`
--

CREATE TABLE `upts` (
  `id` bigint UNSIGNED NOT NULL,
  `kanwil_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upts`
--

INSERT INTO `upts` (`id`, `kanwil_id`, `nama`, `created_at`, `updated_at`) VALUES
(3, 1, 'lapas smg', NULL, NULL),
(7, 1, 'lapas 2', '2021-08-23 10:09:30', '2021-08-23 10:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kanwil_id` int NOT NULL,
  `upt_id` int NOT NULL,
  `level` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `kanwil_id`, `upt_id`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'zakky', '12345678', 2, 3, 1, 'robotix65@gmail.com', NULL, '$2y$10$.g2f0AwTcJUGNQG4Sa28MepX91PsiyWaKAO73.gHrwfaVEPQ6c1OK', NULL, '2021-08-17 04:07:07', '2021-08-23 09:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `usulans`
--

CREATE TABLE `usulans` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beritas_user_id_foreign` (`user_id`),
  ADD KEY `beritas_user_update_foreign` (`user_update`);

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diklats`
--
ALTER TABLE `diklats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kanwils`
--
ALTER TABLE `kanwils`
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
-- Indexes for table `prolats`
--
ALTER TABLE `prolats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_diklats`
--
ALTER TABLE `sub_diklats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_diklats_diklat_id_foreign` (`diklat_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_diklat_id_foreign` (`diklat_id`),
  ADD KEY `transaksis_sub_diklat_id_foreign` (`sub_diklat_id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`);

--
-- Indexes for table `upts`
--
ALTER TABLE `upts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upts_kanwil_id_foreign` (`kanwil_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usulans`
--
ALTER TABLE `usulans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usulans_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diklats`
--
ALTER TABLE `diklats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kanwils`
--
ALTER TABLE `kanwils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prolats`
--
ALTER TABLE `prolats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_diklats`
--
ALTER TABLE `sub_diklats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upts`
--
ALTER TABLE `upts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usulans`
--
ALTER TABLE `usulans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `beritas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `beritas_user_update_foreign` FOREIGN KEY (`user_update`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_diklats`
--
ALTER TABLE `sub_diklats`
  ADD CONSTRAINT `sub_diklats_diklat_id_foreign` FOREIGN KEY (`diklat_id`) REFERENCES `diklats` (`id`);

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_diklat_id_foreign` FOREIGN KEY (`diklat_id`) REFERENCES `diklats` (`id`),
  ADD CONSTRAINT `transaksis_sub_diklat_id_foreign` FOREIGN KEY (`sub_diklat_id`) REFERENCES `sub_diklats` (`id`),
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `upts`
--
ALTER TABLE `upts`
  ADD CONSTRAINT `upts_kanwil_id_foreign` FOREIGN KEY (`kanwil_id`) REFERENCES `kanwils` (`id`);

--
-- Constraints for table `usulans`
--
ALTER TABLE `usulans`
  ADD CONSTRAINT `usulans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
