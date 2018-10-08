-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 21, 2018 at 02:50 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `athleticadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(10) UNSIGNED NOT NULL,
  `nombre_actividad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombre_actividad`, `created_at`, `updated_at`) VALUES
(2, 'Fútbol', '2018-09-20 18:09:59', '2018-09-20 18:09:59'),
(3, 'Básquetbol', '2018-09-20 18:28:53', '2018-09-20 18:28:53'),
(4, 'Gimnasia Artística', '2018-09-20 18:29:03', '2018-09-20 18:29:03'),
(5, 'Tenis', '2018-09-20 18:29:12', '2018-09-20 18:29:12'),
(6, 'Rugby', '2018-09-20 21:19:39', '2018-09-20 21:19:39'),
(7, 'Hockey sobre Césped', '2018-09-20 23:39:14', '2018-09-21 01:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `prenda`
--

CREATE TABLE `prenda` (
  `id_prenda` int(10) UNSIGNED NOT NULL,
  `nombre_prenda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prenda`
--

INSERT INTO `prenda` (`id_prenda`, `nombre_prenda`, `created_at`, `updated_at`) VALUES
(1, 'Chupin', '2018-09-21 01:34:25', '2018-09-21 01:39:01'),
(7, 'Chomba', '2018-09-21 01:39:12', '2018-09-21 01:39:12'),
(8, 'Shorts', '2018-09-21 02:24:08', '2018-09-21 02:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `talle`
--

CREATE TABLE `talle` (
  `id_talle` int(10) UNSIGNED NOT NULL,
  `nombre_talle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo_talle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad_talle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talle`
--

INSERT INTO `talle` (`id_talle`, `nombre_talle`, `sexo_talle`, `edad_talle`, `created_at`, `updated_at`) VALUES
(1, 'Grande', 'Masculino', 'Niño', '2018-09-21 02:54:26', '2018-09-21 02:54:41'),
(2, 'Mediano', 'Masculino', 'Niño', '2018-09-21 02:55:12', '2018-09-21 02:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@example.com', NULL, '$2y$10$661T4838mfKYpC5L9VjZ2eNQjjQcSqTbH0lOQb3jM3A2ZjHw/bKAi', 'v8LNN6JN8pmpD8SQAMEOan7Ld7XLqjjhFgH5gd7mPCuj4fF6oHA6IFnTLhQ9', '2018-09-07 15:01:14', '2018-09-07 15:01:14'),
(2, 'Admin', 'admin@example.com', NULL, '$2y$10$Y.WcQqhsVD0Eg3MHQJXZguRdnZZBhAPHJQWkMdDp24cBnscVX0ETm', '5d91oRLUxachgxzLErM5IDjBYM1Hvybl0VYZV3B5kE8EsWDXfRMjV4YcfMDb', '2018-09-07 15:01:15', '2018-09-07 15:01:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indexes for table `prenda`
--
ALTER TABLE `prenda`
  ADD PRIMARY KEY (`id_prenda`);

--
-- Indexes for table `talle`
--
ALTER TABLE `talle`
  ADD PRIMARY KEY (`id_talle`);

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
-- AUTO_INCREMENT for table `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `prenda`
--
ALTER TABLE `prenda`
  MODIFY `id_prenda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `talle`
--
ALTER TABLE `talle`
  MODIFY `id_talle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
