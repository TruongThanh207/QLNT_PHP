-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2020 at 08:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` int(11) NOT NULL,
  `roomcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `electronic` int(11) NOT NULL,
  `water` int(11) NOT NULL,
  `daynow` datetime NOT NULL,
  `internet` int(11) NOT NULL,
  `truyenhinhcap` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `totalmoney` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `registercode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `registercode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inforregister`
--

CREATE TABLE `inforregister` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerday` datetime NOT NULL,
  `nguoidaidien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` int(11) NOT NULL,
  `TienCoc` int(11) NOT NULL,
  `ThoiHanHD` int(11) NOT NULL,
  `roomcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inforregister`
--

INSERT INTO `inforregister` (`code`, `registerday`, `nguoidaidien`, `CMND`, `TienCoc`, `ThoiHanHD`, `roomcode`) VALUES
('IR_1', '2020-10-15 00:00:00', 'A', 123456789, 1000000, 12, 'Room_1');

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
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2020_05_20_070650_service_table', 1),
(29, '2020_05_20_140307_creat_room', 1),
(30, '2020_05_21_021210_creat_tb_dkroom', 1),
(31, '2020_05_21_114645_creat_tb_person', 1),
(32, '2020_05_24_151842_creat_tb_debit', 1),
(33, '2020_06_09_040327_creat_bill', 1),
(34, '2020_06_11_013230_feedback', 1);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle` int(11) NOT NULL,
  `registercode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`code`, `price`, `status`, `description`, `created_at`, `updated_at`) VALUES
('Room_1', 1500000, 1, 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người', '2020-10-16 01:25:49', NULL),
('Room_2', 1500000, 0, 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người', '2020-10-16 01:25:49', NULL),
('Room_3', 1500000, 0, 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người', '2020-10-16 01:25:49', NULL),
('Room_4', 1500000, 0, 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người', '2020-10-16 01:25:49', NULL),
('Room_5', 1500000, 0, 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người', '2020-10-16 01:25:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `code`, `name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 'S1', 'Chỉ Số Điện', 1, 3000, '2020-10-16 01:25:49', NULL),
(2, 'S2', 'Chỉ Số Nước', 1, 10000, '2020-10-16 01:25:49', NULL),
(3, 'S3', 'Xe', 1, 50000, '2020-10-16 01:25:49', NULL),
(4, 'S4', 'Internet', 1, 50000, '2020-10-16 01:25:49', NULL),
(5, 'S5', 'Truyền Hình Cáp', 1, 100000, '2020-10-16 01:25:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `tel`, `email`, `img`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Truong Van Thanh', 'nt0802', '$2y$10$2Sn/PjU8Nb6krb9keFLxqeAd5TS13TSbC8ucEIYgUn.mtapFtT4VS', '0961791330', 'vfrshjklg@gmail.com', 'ava.jpg', 1, NULL, '2020-10-16 01:25:49', NULL),
(2, 'Truong Van Thinh', 'abc', '$2y$10$dX/q/7Ve/daiyalDN13kY.lLVe6k8.ufey2hls5hxe.fBlLZgB02.', '0961791092', 'abc@gmail.com', 'avatargirl.jpg', 0, NULL, '2020-10-16 01:25:49', NULL),
(3, 'Hoang Khanh Linh', 'klinh', '$2y$10$a9f5TP05RehdWqmUyGLeaOO916XaNrcWb33kztpcY4OiaKwuh1WiO', '0961791988', 'klinh@gmail.com', 'avatargirl.jpg', 0, NULL, '2020-10-16 01:25:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`code`),
  ADD KEY `debit_registercode_foreign` (`registercode`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`code`),
  ADD KEY `feedback_registercode_foreign` (`registercode`);

--
-- Indexes for table `inforregister`
--
ALTER TABLE `inforregister`
  ADD PRIMARY KEY (`code`),
  ADD KEY `inforregister_roomcode_foreign` (`roomcode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`code`),
  ADD KEY `persons_registercode_foreign` (`registercode`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `debit`
--
ALTER TABLE `debit`
  ADD CONSTRAINT `debit_registercode_foreign` FOREIGN KEY (`registercode`) REFERENCES `inforregister` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_registercode_foreign` FOREIGN KEY (`registercode`) REFERENCES `inforregister` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `inforregister`
--
ALTER TABLE `inforregister`
  ADD CONSTRAINT `inforregister_roomcode_foreign` FOREIGN KEY (`roomcode`) REFERENCES `rooms` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_registercode_foreign` FOREIGN KEY (`registercode`) REFERENCES `inforregister` (`code`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
