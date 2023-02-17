-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 04:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_workit`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jemputs`
--

CREATE TABLE `jemputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `barang` varchar(191) NOT NULL,
  `transportasi` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jemputs`
--

INSERT INTO `jemputs` (`id`, `pelanggan_id`, `alamat`, `barang`, `transportasi`, `created_at`, `updated_at`) VALUES
(1, 8, 'manding', 'laptop Acer', 15000, '2023-02-08 20:31:31', '2023-02-15 20:31:31'),
(2, 12, 'wono', 'vivo y12', 15000, '2023-02-10 17:00:00', '2023-02-15 20:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhans`
--

CREATE TABLE `kebutuhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang` varchar(191) NOT NULL,
  `harga` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kebutuhans`
--

INSERT INTO `kebutuhans` (`id`, `barang`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Bayar Token Listrik', 105000, '2023-02-05 20:39:44', '2023-02-15 20:39:44'),
(2, 'Kertas A4s', 53000, '2023-02-06 17:00:00', '2023-02-15 20:40:04'),
(5, 'TM pulsa', 8000, '2023-02-14 20:41:06', '2023-02-15 20:41:06'),
(6, 'tissu', 15000, '2023-02-08 20:45:40', '2023-02-15 20:45:40'),
(7, 'galon', 5000, '2023-02-09 20:46:10', '2023-02-15 20:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktif`
--

CREATE TABLE `log_aktif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_aktif`
--

INSERT INTO `log_aktif` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Pelanggan aslam mardin telah ditambahkan', '2023-02-15 03:39:15', '2023-02-15 03:39:15'),
(2, 'Pelanggan teman kak ical telah ditambahkan', '2023-02-15 19:15:18', '2023-02-15 19:15:18'),
(3, 'Pelanggan anca telah ditambahkan', '2023-02-15 19:16:47', '2023-02-15 19:16:47'),
(4, 'Pelanggan talik telah ditambahkan', '2023-02-15 19:17:07', '2023-02-15 19:17:07'),
(5, 'Pelanggan sekolah sd 1 telah ditambahkan', '2023-02-15 19:17:38', '2023-02-15 19:17:38'),
(6, 'Pelanggan karni telah ditambahkan', '2023-02-15 19:18:21', '2023-02-15 19:18:21'),
(7, 'Pelanggan puskesmas massenga telah ditambahkan', '2023-02-15 19:19:16', '2023-02-15 19:19:16'),
(8, 'Pelanggan ani telah ditambahkan', '2023-02-15 19:20:18', '2023-02-15 19:20:18'),
(9, 'Pelanggan mama jamal telah ditambahkan', '2023-02-15 19:21:21', '2023-02-15 19:21:21'),
(10, 'Pelanggan percetakan Wijaya telah ditambahkan', '2023-02-15 19:22:37', '2023-02-15 19:22:37'),
(11, 'Nota Vivoy12s - teman kak ical telah Dibuat', '2023-02-15 19:23:17', '2023-02-15 19:23:17'),
(12, 'Nota Vivoy12s - teman kak ical telah ditambahkan', '2023-02-15 19:23:17', '2023-02-15 19:23:17'),
(13, 'Nota Hardisk - anca telah Dibuat', '2023-02-15 19:37:51', '2023-02-15 19:37:51'),
(14, 'Nota Hardisk - anca telah ditambahkan', '2023-02-15 19:37:51', '2023-02-15 19:37:51'),
(15, 'Nota Vivo y12s - talik telah Dibuat', '2023-02-15 19:50:27', '2023-02-15 19:50:27'),
(16, 'Nota Vivo y12s - talik telah ditambahkan', '2023-02-15 19:50:27', '2023-02-15 19:50:27'),
(17, 'Nota Epson L3110 - sekolah sd 1 telah Dibuat', '2023-02-15 19:50:58', '2023-02-15 19:50:58'),
(18, 'Nota Epson L3110 - sekolah sd 1 telah ditambahkan', '2023-02-15 19:50:58', '2023-02-15 19:50:58'),
(19, 'Nota IpHone - karni telah Dibuat', '2023-02-15 19:58:28', '2023-02-15 19:58:28'),
(20, 'Nota IpHone - karni telah ditambahkan', '2023-02-15 19:58:28', '2023-02-15 19:58:28'),
(21, 'Nota Canon ip 2770 - puskesmas massenga telah Dibuat', '2023-02-15 19:59:54', '2023-02-15 19:59:54'),
(22, 'Nota Canon ip 2770 - puskesmas massenga telah ditambahkan', '2023-02-15 19:59:54', '2023-02-15 19:59:54'),
(23, 'Nota Leptop Acer - ani telah Dibuat', '2023-02-15 20:03:19', '2023-02-15 20:03:19'),
(24, 'Nota Leptop Acer - ani telah ditambahkan', '2023-02-15 20:03:19', '2023-02-15 20:03:19'),
(25, 'Nota Vivo y12s - talik telah Dibuat', '2023-02-15 20:06:01', '2023-02-15 20:06:01'),
(26, 'Nota Vivo y12s - talik telah ditambahkan', '2023-02-15 20:06:01', '2023-02-15 20:06:01'),
(27, 'Pelanggan wall telah ditambahkan', '2023-02-15 20:08:39', '2023-02-15 20:08:39'),
(28, 'Nota Laptop asus - wall telah Dibuat', '2023-02-15 20:09:22', '2023-02-15 20:09:22'),
(29, 'Nota Laptop asus - wall telah ditambahkan', '2023-02-15 20:09:22', '2023-02-15 20:09:22'),
(30, 'Nota Jual cas leptop - ani telah Dibuat', '2023-02-15 20:11:22', '2023-02-15 20:11:22'),
(31, 'Nota Jual cas leptop - ani telah ditambahkan', '2023-02-15 20:11:22', '2023-02-15 20:11:22'),
(32, 'Nota Relmi U1 - mama jamal telah Dibuat', '2023-02-15 20:12:47', '2023-02-15 20:12:47'),
(33, 'Nota Relmi U1 - mama jamal telah ditambahkan', '2023-02-15 20:12:47', '2023-02-15 20:12:47'),
(34, 'Nota Minta cetak - percetakan Wijaya telah Dibuat', '2023-02-15 20:15:01', '2023-02-15 20:15:01'),
(35, 'Nota Minta cetak - percetakan Wijaya telah ditambahkan', '2023-02-15 20:15:01', '2023-02-15 20:15:01'),
(36, 'Nota Leptop Asus - ani telah Dibuat', '2023-02-15 20:16:57', '2023-02-15 20:16:57'),
(37, 'Nota Leptop Asus - ani telah ditambahkan', '2023-02-15 20:16:57', '2023-02-15 20:16:57'),
(38, 'Pelanggan Muh Izzak telah ditambahkan', '2023-02-15 20:35:43', '2023-02-15 20:35:43'),
(39, 'Nota Vivo y12 - Muh Izzak telah Dibuat', '2023-02-15 20:36:35', '2023-02-15 20:36:35'),
(40, 'Nota Vivo y12 - Muh Izzak telah ditambahkan', '2023-02-15 20:36:35', '2023-02-15 20:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
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
(5, '2023_02_06_044835_create_pelanggans_table', 1),
(6, '2023_02_06_045423_create_notas_table', 1),
(7, '2023_02_06_045752_create_nota_details_table', 1),
(8, '2023_02_12_074942_add_deleted_at_column_to_pelanggans_table', 1),
(9, '2023_02_12_152451_create_log_aktif_table', 1),
(10, '2023_02_13_030931_add_label_garansi_column_to_nota_details_table', 1),
(11, '2023_02_14_100735_create_pengaturan_table', 1),
(12, '2023_02_15_044320_add_keuntungan_column_to_nota_details_table', 1),
(13, '2023_02_15_082602_create_jemputs_table', 1),
(14, '2023_02_15_083007_create_kebutuhans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` enum('Hp','Printer','Leptop','Bimbel') NOT NULL DEFAULT 'Leptop',
  `nama_barang` varchar(191) NOT NULL,
  `keterangan` varchar(191) NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('BS','S') NOT NULL DEFAULT 'BS',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id`, `jenis`, `nama_barang`, `keterangan`, `pelanggan_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hp', 'Vivoy12s', 'ganti lcd', 2, 'S', '2023-02-03 19:23:17', '2023-02-15 19:23:54'),
(2, 'Hp', 'Hardisk', 'tidak terbaca', 3, 'S', '2023-02-03 19:37:50', '2023-02-15 19:48:28'),
(3, 'Hp', 'Vivo y12s', 'ganti layar', 4, 'S', '2023-02-05 19:50:26', '2023-02-15 19:52:33'),
(4, 'Printer', 'Epson L3110', 'tidak bisa menarik kertas', 5, 'S', '2023-02-06 19:50:58', '2023-02-15 19:53:38'),
(5, 'Hp', 'IpHone', 'lupa sandi', 6, 'S', '2023-02-06 19:58:28', '2023-02-15 19:58:53'),
(6, 'Printer', 'Canon ip 2770', 'perbaikan dan inpus catring (ganti Catring)', 7, 'S', '2023-02-08 19:59:54', '2023-02-15 20:01:04'),
(7, 'Leptop', 'Leptop Acer', 'install dan ganti betrei', 8, 'S', '2023-02-08 20:03:18', '2023-02-15 20:04:15'),
(8, 'Hp', 'Vivo y12s', 'ganti layar', 4, 'S', '2023-02-09 20:06:01', '2023-02-15 20:06:38'),
(9, 'Leptop', 'Laptop asus', 'install dan ganti keyboard', 11, 'S', '2023-02-09 20:09:21', '2023-02-15 20:10:22'),
(10, 'Leptop', 'Jual cas leptop', '-', 8, 'S', '2023-02-09 20:11:22', '2023-02-15 20:11:46'),
(11, 'Hp', 'Relmi U1', 'ganti betrey', 9, 'S', '2023-02-13 20:12:47', '2023-02-15 20:14:04'),
(12, 'Printer', 'Minta cetak', '-', 10, 'S', '2023-02-13 20:15:01', '2023-02-15 20:15:43'),
(13, 'Leptop', 'Leptop Asus', 'ganti layar', 8, 'BS', '2023-02-13 20:16:56', '2023-02-15 20:16:56'),
(14, 'Hp', 'Vivo y12', 'ganti layar', 12, 'S', '2023-02-10 20:36:34', '2023-02-15 20:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `nota_details`
--

CREATE TABLE `nota_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garansi` date NOT NULL,
  `label_garansi` int(11) NOT NULL,
  `pemasukan` double NOT NULL DEFAULT 0,
  `pengeluaran` double NOT NULL DEFAULT 0,
  `keuntungan` double NOT NULL,
  `nota_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nota_details`
--

INSERT INTO `nota_details` (`id`, `garansi`, `label_garansi`, `pemasukan`, `pengeluaran`, `keuntungan`, `nota_id`, `created_at`, `updated_at`) VALUES
(1, '2023-03-16', 1, 350000, 200000, 150000, 1, '2023-02-03 19:23:54', '2023-02-15 19:23:54'),
(2, '2023-03-16', 1, 50000, 0, 50000, 2, '2023-02-03 19:42:43', '2023-02-15 19:48:28'),
(3, '2023-03-16', 1, 350000, 190000, 160000, 3, '2023-02-05 19:52:33', '2023-02-15 19:52:33'),
(4, '2023-03-16', 1, 300000, 0, 300000, 4, '2023-02-06 19:53:38', '2023-02-15 19:53:38'),
(5, '2023-03-16', 1, 150000, 0, 150000, 5, '2023-02-06 19:58:53', '2023-02-15 19:58:53'),
(6, '2023-03-16', 1, 200000, 0, 200000, 6, '2023-02-08 20:00:35', '2023-02-15 20:00:35'),
(7, '2023-07-16', 5, 515000, 245000, 270000, 7, '2023-02-08 20:04:15', '2023-02-15 20:04:15'),
(8, '2023-03-16', 1, 350000, 200000, 150000, 8, '2023-02-09 20:06:38', '2023-02-15 20:06:38'),
(9, '2023-03-16', 1, 415000, 95000, 320000, 9, '2023-02-09 20:10:22', '2023-02-15 20:10:22'),
(10, '2023-03-16', 1, 100000, 0, 100000, 10, '2023-02-09 20:11:45', '2023-02-15 20:11:45'),
(11, '2023-03-16', 1, 250000, 150000, 100000, 11, '2023-02-13 20:14:04', '2023-02-15 20:14:04'),
(12, '2023-03-16', 1, 25000, 0, 25000, 12, '2023-02-13 20:15:43', '2023-02-15 20:15:43'),
(13, '2023-03-16', 1, 350000, 200000, 150000, 14, '2023-02-10 20:37:58', '2023-02-15 20:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) NOT NULL,
  `nomor` varchar(191) NOT NULL DEFAULT '-',
  `alamat` text NOT NULL DEFAULT '-',
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `nomor`, `alamat`, `jenis_kelamin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aslam mardin', '085825587404', 'bonde campalagian', 'L', '2023-02-15 03:39:15', '2023-02-15 03:39:15', NULL),
(2, 'teman kak ical', '-', '-', 'L', '2023-02-15 19:15:18', '2023-02-15 19:15:18', NULL),
(3, 'anca', '085256362870', '-', 'L', '2023-02-15 19:16:47', '2023-02-15 19:16:47', NULL),
(4, 'talik', '-', '-', 'L', '2023-02-05 17:00:00', '2023-02-15 19:17:07', NULL),
(5, 'sekolah sd 1', '081217281017', '-', 'L', '2023-02-06 19:17:38', '2023-02-15 19:17:38', NULL),
(6, 'karni', '082193159206', '-', 'L', '2023-02-06 19:18:21', '2023-02-15 19:18:21', NULL),
(7, 'puskesmas massenga', '085249260216', '-', 'L', '2023-02-08 19:19:16', '2023-02-15 19:19:16', NULL),
(8, 'ani', '082393497838', '-', 'L', '2023-02-08 19:20:18', '2023-02-15 19:20:18', NULL),
(9, 'mama jamal', '085394006031', '-', 'P', '2023-02-13 19:21:20', '2023-02-15 19:21:20', NULL),
(10, 'percetakan Wijaya', '085342268285', '-', 'L', '2023-02-13 19:22:37', '2023-02-15 19:22:37', NULL),
(11, 'wall', '085343871826', '-', 'P', '2023-02-09 20:08:39', '2023-02-15 20:08:39', NULL),
(12, 'Muh Izzak', '-', '-', 'L', '2023-02-10 20:35:43', '2023-02-15 20:35:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bulan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturans`
--

INSERT INTO `pengaturans` (`id`, `bulan`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-02-15 03:39:16', '2023-02-15 03:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
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
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Workit Polman', 'workit@gmail.com', NULL, '$2y$10$fu2OAIKoMU3a2G1pzF9GUuIFghcR7pHtClmbB8uAGI965mUdeb95K', NULL, '2023-02-15 03:39:16', '2023-02-15 03:39:16');

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
-- Indexes for table `jemputs`
--
ALTER TABLE `jemputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jemputs_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indexes for table `kebutuhans`
--
ALTER TABLE `kebutuhans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_aktif`
--
ALTER TABLE `log_aktif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indexes for table `nota_details`
--
ALTER TABLE `nota_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota_details_nota_id_foreign` (`nota_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jemputs`
--
ALTER TABLE `jemputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kebutuhans`
--
ALTER TABLE `kebutuhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_aktif`
--
ALTER TABLE `log_aktif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nota_details`
--
ALTER TABLE `nota_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jemputs`
--
ALTER TABLE `jemputs`
  ADD CONSTRAINT `jemputs_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`);

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nota_details`
--
ALTER TABLE `nota_details`
  ADD CONSTRAINT `nota_details_nota_id_foreign` FOREIGN KEY (`nota_id`) REFERENCES `notas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
