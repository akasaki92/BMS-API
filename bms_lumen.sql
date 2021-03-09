-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 04:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms_lumen`
--

-- --------------------------------------------------------

--
-- Table structure for table `inet`
--

CREATE TABLE `inet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_langganan` varchar(255) NOT NULL,
  `id_pelanggan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inet`
--

INSERT INTO `inet` (`id`, `users_id`, `nama_langganan`, `id_pelanggan`, `created_at`, `updated_at`) VALUES
(1, 2, 'Indihome', 'TnBjvetX5MIR', '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(2, 2, 'Indihome', 'jq15NW0ey85r', '2021-03-03 20:29:19', '2021-03-03 20:29:19'),
(3, 5, 'BPT', 'nYXhqijeNiz0', '2021-03-03 20:29:20', '2021-03-03 20:29:20'),
(4, 3, 'BPT', '1Kwdslml1Ivu', '2021-03-03 20:29:20', '2021-03-03 20:29:20'),
(5, 2, 'BPT', 'qJSF6MndCRpL', '2021-03-03 20:29:22', '2021-03-03 20:29:22'),
(6, 3, 'BPT', 'u6CnketR5axq', '2021-03-03 20:29:22', '2021-03-03 20:29:22'),
(7, 1, 'Indihome', 'XvhkyRlmRtAF', '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(8, 5, 'Biznet', 'kDVlIt38oFfO', '2021-03-03 20:29:24', '2021-03-03 20:29:24'),
(11, 5, 'Ujank', '123232131232', '2021-03-03 20:30:20', '2021-03-03 20:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `listrik`
--

CREATE TABLE `listrik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_langganan` varchar(255) NOT NULL,
  `id_pelanggan` varchar(255) NOT NULL,
  `jenis_pembayaran` enum('Prabayar','Paskabayar') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listrik`
--

INSERT INTO `listrik` (`id`, `users_id`, `nama_langganan`, `id_pelanggan`, `jenis_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 3, 'Group Astra', 't0tq6yetWwFz', 'Paskabayar', '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(2, 1, 'PLN', 'UsE0fbXzHNcE', 'Paskabayar', '2021-03-03 20:26:45', '2021-03-03 20:26:45'),
(3, 1, 'PLN', 'lm6TuAwR7hdE', 'Paskabayar', '2021-03-03 20:29:20', '2021-03-03 20:29:20'),
(4, 1, 'Group Astra', 'ADC0EGneGkHe', 'Prabayar', '2021-03-03 20:29:21', '2021-03-03 20:29:21'),
(5, 4, 'PLN', 'QsDb4lACwQ2o', 'Paskabayar', '2021-03-03 20:29:22', '2021-03-03 20:29:22'),
(6, 1, 'PT. Adaro Energy', '9yLUUUJsoMpQ', 'Paskabayar', '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(7, 4, 'PT. Adaro Energy', '56QaW7mR5UX4', 'Prabayar', '2021-03-03 20:29:24', '2021-03-03 20:29:24'),
(8, 1, 'PLN', 'AqBXR5Tq7rPA', 'Paskabayar', '2021-03-03 20:29:25', '2021-03-03 20:29:25'),
(10, 5, 'Ujankasdfgh', '082260879029', 'Prabayar', '2021-03-09 21:38:53', '2021-03-09 21:38:53');

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
(81, '2021_03_03_015349_create_users_table', 1),
(82, '2021_03_03_061606_create_inet_table', 1),
(83, '2021_03_03_061625_create_listrik_table', 1),
(84, '2021_03_03_061637_create_pulsa_table', 1),
(85, '2021_03_03_061648_create_tagihan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pulsa`
--

CREATE TABLE `pulsa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_langganan` varchar(255) NOT NULL,
  `nomor_telp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pulsa`
--

INSERT INTO `pulsa` (`id`, `users_id`, `nama_langganan`, `nomor_telp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Indosat', '081271597650', '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(2, 3, 'Telkomsel', '081237940074', '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(3, 2, 'Telkomsel', '081271679167', '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(4, 4, 'Indosat', '081245401477', '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(5, 4, 'Xl/Axis', '08122424129', '2021-03-03 20:29:25', '2021-03-03 20:29:25'),
(6, 5, 'Indosat', '081217439268', '2021-03-03 20:29:25', '2021-03-03 20:29:25'),
(7, 5, 'Ujank', '086969696969', '2021-03-07 12:32:52', '2021-03-07 12:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('Inet','Listrik','Pulsa') NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `mulai_tagihan` date NOT NULL,
  `rentang_waktu` int(11) NOT NULL,
  `harga_tagihan` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `users_id`, `kategori`, `kategori_id`, `mulai_tagihan`, `rentang_waktu`, `harga_tagihan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pulsa', 1, '2021-03-03', 5, 75748, '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(2, 3, 'Listrik', 1, '2021-03-03', 20, 21153, '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(3, 2, 'Inet', 1, '2021-03-03', 13, 138130, '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(4, 1, 'Listrik', 2, '2021-03-03', 5, 17137, '2021-03-03 20:26:45', '2021-03-03 20:26:45'),
(5, 2, 'Inet', 2, '2021-03-03', 21, 182890, '2021-03-03 20:29:20', '2021-03-03 20:29:20'),
(6, 5, 'Inet', 3, '2021-03-03', 15, 7545, '2021-03-03 20:29:20', '2021-03-03 20:29:20'),
(7, 1, 'Listrik', 3, '2021-03-03', 4, 119493, '2021-03-03 20:29:20', '2021-03-03 20:29:20'),
(8, 3, 'Inet', 4, '2021-03-03', 27, 68841, '2021-03-03 20:29:20', '2021-03-03 20:29:20'),
(9, 1, 'Listrik', 4, '2021-03-03', 17, 67917, '2021-03-03 20:29:21', '2021-03-03 20:29:21'),
(10, 4, 'Listrik', 5, '2021-03-03', 14, 263634, '2021-03-03 20:29:22', '2021-03-03 20:29:22'),
(11, 2, 'Inet', 5, '2021-03-03', 3, 102255, '2021-03-03 20:29:22', '2021-03-03 20:29:22'),
(12, 3, 'Inet', 6, '2021-03-03', 18, 113433, '2021-03-03 20:29:22', '2021-03-03 20:29:22'),
(13, 1, 'Listrik', 6, '2021-03-03', 4, 174447, '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(14, 3, 'Pulsa', 2, '2021-03-03', 12, 139531, '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(15, 1, 'Inet', 7, '2021-03-03', 8, 133671, '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(16, 2, 'Pulsa', 3, '2021-03-03', 16, 4670, '2021-03-03 20:29:23', '2021-03-03 20:29:23'),
(17, 4, 'Pulsa', 4, '2021-03-03', 1, 95608, '2021-03-03 20:29:24', '2021-03-03 20:29:24'),
(18, 5, 'Inet', 8, '2021-03-03', 28, 257841, '2021-03-03 20:29:24', '2021-03-03 20:29:24'),
(19, 4, 'Listrik', 7, '2021-03-03', 13, 30111, '2021-03-03 20:29:24', '2021-03-03 20:29:24'),
(20, 3, 'Inet', 9, '2021-03-03', 22, 198762, '2021-03-03 20:29:24', '2021-03-03 20:29:24'),
(21, 4, 'Inet', 10, '2021-03-03', 17, 39978, '2021-03-03 20:29:25', '2021-03-03 20:29:25'),
(22, 4, 'Pulsa', 5, '2021-03-03', 16, 251113, '2021-03-03 20:29:25', '2021-03-03 20:29:25'),
(23, 5, 'Pulsa', 6, '2021-03-03', 8, 69970, '2021-03-03 20:29:25', '2021-03-03 20:29:25'),
(24, 1, 'Listrik', 8, '2021-03-03', 9, 293050, '2021-03-03 20:29:25', '2021-03-03 20:29:25'),
(25, 5, 'Inet', 11, '2021-03-04', 14, 300000, '2021-03-03 20:30:21', '2021-03-03 20:30:21'),
(26, 5, 'Pulsa', 7, '2021-03-04', 21, 300000, '2021-03-07 12:32:52', '2021-03-07 12:32:52'),
(27, 5, 'Listrik', 10, '2021-03-03', 30, 25000, '2021-03-09 19:06:46', '2021-03-09 21:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `tgl_lahir`, `avatar`, `password`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'unjanijulipertiwisei', 'Unjani Juli Pertiwi S.E.I', '4Hwwq@gmail.com', '2021-03-03', 'pXrIJscSlW.jpg', '$2y$10$WD2k9WrSuSsTdP7xDSdE.OuEZR21kUfAm2Hi7m28HAJXQGYAa4hOu', '2021-03-03 20:26:44', '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(2, 'ceceppradiptaspt', 'Cecep Pradipta S.Pt', 'Y6Krf@gmail.com', '2021-03-03', '3BOOYo1lIk.jpg', '$2y$10$1s121gJLg2ZdT6phjAz6puTJZ67s2F58JoakebSo0Cd9pYGW2vfCO', '2021-03-03 20:26:44', '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(3, 'jessicalaksita', 'Jessica Laksita', 'GI29w@gmail.com', '2021-03-03', 'zpByRinhKS.jpg', '$2y$10$ZTqI.gFc05tF96n8ahxMte0KAyckxOQ4dLSXYLW7iuI2a8RjEdz/C', '2021-03-03 20:26:44', '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(4, 'violettinasafitrisfarm', 'Violet Tina Safitri S.Farm', 'CZvhk@gmail.com', '2021-03-03', 'tYbzJ1zoNr.jpg', '$2y$10$XoBp4K8nWlcIkdF6ZEL.3OABBAkjeiCTQQmt52F1KFZRTXnTjU0Oq', '2021-03-03 20:26:44', '2021-03-03 20:26:44', '2021-03-03 20:26:44'),
(5, 'admin', 'Sandy Maulana', 'andimaslahah@gmail.com', '2020-09-26', 'asaskoaska.jpg', '$2y$10$k/t2nGEnCJuW6Rmq0cGhHuhgZE93MYgUGSwBwGyWDHvYpcDWMFQx.', '2021-03-03 20:28:33', '2021-03-03 20:27:48', '2021-03-03 20:28:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inet`
--
ALTER TABLE `inet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inet_users_id_foreign` (`users_id`);

--
-- Indexes for table `listrik`
--
ALTER TABLE `listrik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listrik_users_id_foreign` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pulsa`
--
ALTER TABLE `pulsa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pulsa_users_id_foreign` (`users_id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_users_id_foreign` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inet`
--
ALTER TABLE `inet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `listrik`
--
ALTER TABLE `listrik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pulsa`
--
ALTER TABLE `pulsa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inet`
--
ALTER TABLE `inet`
  ADD CONSTRAINT `inet_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listrik`
--
ALTER TABLE `listrik`
  ADD CONSTRAINT `listrik_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pulsa`
--
ALTER TABLE `pulsa`
  ADD CONSTRAINT `pulsa_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
