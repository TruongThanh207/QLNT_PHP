-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2020 lúc 03:44 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlnt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2020_05_20_070650_service_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `type` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `code`, `name`, `quantity`, `price`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'S1', 'Giá Phòng', 1, 1500000, 1, NULL, '2020-05-20 04:52:13', NULL),
(2, 'S2', 'Giá Phòng', 2, 1800000, 1, NULL, '2020-05-20 04:52:13', NULL),
(3, 'S3', 'Giá Phòng', 3, 2100000, 1, NULL, '2020-05-20 04:52:13', NULL),
(4, 'S4', 'Chỉ Số Điện', 1, 3000, 1, NULL, '2020-05-20 04:52:13', NULL),
(5, 'S5', 'Chỉ Số Nước', 1, 3000, 1, NULL, '2020-05-20 04:52:13', NULL),
(6, 'S6', 'Xe', 1, 50000, 1, NULL, '2020-05-20 04:52:13', NULL),
(7, 'S7', 'Giá Phòng', 1, 50000, 0, NULL, '2020-05-20 04:52:13', NULL),
(8, 'S8', 'Giá Phòng', 2, 60000, 0, NULL, '2020-05-20 04:52:13', NULL),
(9, 'S9', 'Giá Phòng', 3, 70000, 0, NULL, '2020-05-20 04:52:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `tel`, `email`, `img`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Truong Van Thanh', 'nt0802', '$2y$10$aqvec3rwBL9cLPnUVaFXwO13rYmHNo1DhtWlBORCDgoo4MWrtXRlm', '0961791330', 'vfrshjklg@gmail.com', 'ava.jpg', 1, NULL, '2020-05-20 04:52:12', NULL),
(2, 'Truong Van Thinh', 'abc', '$2y$10$4ok5tAHmlJENw/k4KjPuW.FITWrFnKEfBPnloivTvEDL0hD5mjTjm', '0961791092', 'abc@gmail.com', 'avatargirl.jpg', 0, NULL, '2020-05-20 04:52:12', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
