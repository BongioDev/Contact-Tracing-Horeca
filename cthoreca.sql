-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 aug 2020 om 23:27
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cthoreca`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `clients`
--

CREATE TABLE `clients` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_28_101709_create_clients_table', 2),
(5, '2020_07_28_111057_create_visitors_table', 2),
(6, '2020_07_28_112454_create_requests_table', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test2@zaak.com', '$2y$10$KDpfEl5QyNGbqjd5XF7o3OmVUhEvOyTyo1rerqf6X14mvtDe/qZ4O', '2020-08-04 20:02:27');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cateringName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `subscriptionType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datePaid` datetime DEFAULT NULL,
  `logo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `admin`, `firstName`, `lastName`, `cateringName`, `address`, `phoneNumber`, `email`, `email_verified_at`, `password`, `paid`, `subscriptionType`, `datePaid`, `logo`, `remember_token`, `created_at`, `updated_at`) VALUES
('b26fef84-7719-4ba4-9852-dff0d6446028', 0, 'Fabrizio', 'Falone', 'Forum', 'forumstraat 82 houthalen-helchteren', '23455444887', 'fabrizio@hotmail.com', NULL, '$2y$10$KYYoOWQ/TVADB2G512q2QOs4C0AAdkbuWKgKf5B/sS0yrYeebhAji', 1, '1', '2020-07-29 00:00:00', 'download_1596575111_png', NULL, '2020-08-04 21:05:11', '2020-08-04 21:05:11'),
('b70a168a-d8b8-452b-ad6f-51c662eed18a', 0, 'Jan', 'Paps', 'Paps café', 'grotebaan 82 houthalen-helchteren', '32488603326', 'paps@hotmail.com', NULL, '$2y$10$dcNjGeKoukpxOpVtKQp6xuVizoK45H/adww4fdpmQkbYs/XVCuXu2', 1, '2', '2020-07-09 00:00:00', 'il_570xN.1475715922_aqq3_1596575167_jpg', NULL, '2020-08-04 21:06:07', '2020-08-04 21:06:07'),
('b74c39ef-6d81-4fd5-8e03-138bf6a24273', 1, NULL, NULL, NULL, NULL, NULL, 'aleko.bongiovanni@hotmail.com', NULL, '$2y$10$at8o0sz4bnDpwmTkqjfrD.6qZF9HlGXYBAdq50QwLJjKxxu/ObPZW', NULL, NULL, NULL, NULL, '7MI7cnCulaQdyeKAPhURFJwA4E3qOWH5oYtJ9xf3Ban6XDNCjZVUFRmtiTMG', '2020-07-29 08:21:21', '2020-08-04 20:10:31'),
('eb03ffcb-d6c9-4bcc-8b67-34800d9e748d', 0, 'aleko', 'bongiovanni', 'Smoke house', 'smokehousestraat 84 heusden zolder', '32455484878', 'aleko@smokehouse.be', NULL, '$2y$10$W7Qj0XG.eGUS5dN1R4o11uLhE17VwS.sbEWxq4NNGpAZKXyQ/x5Uq', 1, '2', '2020-07-15 00:00:00', 'smokehouse-grill-restaurant-logo-design-template-6e6307c06cb7f367d215a0edd7141234_screen_1596575261_jpg', NULL, '2020-08-04 21:07:41', '2020-08-04 21:07:41'),
('eb7b5f4e-6aa2-4800-841c-e264b23ed0d4', 0, 'testvoornaam', 'testachternaam', 'testzaak', 'testadres', '3244548887', 'test@zaak.com', NULL, '$2y$10$b.1QmXd5u2DA9GkjhINBVO8421wDrx61qYGsKkknbQI9Dnc70.E6i', 1, '3', '2020-05-08 00:00:00', 'il_570xN.1475715922_aqq3_1596575204_jpg', NULL, '2020-08-04 21:06:45', '2020-08-04 21:06:45'),
('f790399e-f2f3-42f4-b091-bb9325c89098', 0, 'chico', 'bandito', 'Pep en pino', 'heusden zolder buhstraat 84', '32445458484', 'pepnepino@hotmail.com', NULL, '$2y$10$CAujn5SlsXyLLOxDqr0ZY.c6cnZ2TaG8Jr7v5.qS0Yn3IQiTBAGUW', 1, '2', '2020-08-03 00:00:00', 'il_570xN.1431687786_w5a8_1596575302_jpg', NULL, '2020-08-04 21:08:22', '2020-08-04 21:08:22');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tableNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stayPeriod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `visitors`
--

INSERT INTO `visitors` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `tableNumber`, `stayPeriod`, `user_id`, `created_at`, `updated_at`) VALUES
(36, 'Aleko', 'Bongiovanni', 'aleko.bongiovanni@hotmail.com', '32488303222', '5', NULL, 'eb7b5f4e-6aa2-4800-841c-e264b23ed0d4', '2020-08-04 21:14:20', '2020-08-04 21:14:20'),
(37, 'Jos', 'meulders', 'jos@hotail.com', '0444548778', '12', NULL, 'eb7b5f4e-6aa2-4800-841c-e264b23ed0d4', '2020-08-04 21:14:41', '2020-08-04 21:14:41'),
(38, 'cheyenne', 'Reynkens', 'cheyenne-reynkens@hotmail.com', '32556565', '8', NULL, 'eb7b5f4e-6aa2-4800-841c-e264b23ed0d4', '2020-08-04 21:16:03', '2020-08-04 21:16:03'),
(39, 'Neys', 'Sven', 'sven_neys@outlook.com', '32555488', '15', NULL, 'eb7b5f4e-6aa2-4800-841c-e264b23ed0d4', '2020-08-04 21:16:35', '2020-08-04 21:16:35'),
(40, 'routist', 'tourist', 'tourist@buitenland.com', '34554448', '6', '12', 'eb7b5f4e-6aa2-4800-841c-e264b23ed0d4', '2020-08-04 21:16:57', '2020-08-04 21:16:57'),
(41, 'Valentino', 'Rossi', 'ildoctore@hotmail.com', '46464646', '46', NULL, 'eb7b5f4e-6aa2-4800-841c-e264b23ed0d4', '2020-08-04 21:17:33', '2020-08-04 21:17:33');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexen voor tabel `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
