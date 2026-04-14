-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2026 at 12:53 PM
-- Server version: 11.8.6-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u529986973_tastie`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_carts`
--

CREATE TABLE `add_to_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `extra_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`extra_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_to_carts`
--

INSERT INTO `add_to_carts` (`id`, `product_id`, `user_id`, `quantity`, `price`, `extra_data`, `created_at`, `updated_at`) VALUES
(13, 8, 33, 1, 8.90, NULL, '2025-11-06 13:00:45', '2025-11-06 13:00:45'),
(15, 5, 37, 1, 1.00, NULL, '2025-11-21 15:31:23', '2025-11-21 15:31:23'),
(25, 176, 35, 1, 8.90, NULL, '2026-04-09 13:05:29', '2026-04-09 13:05:29'),
(28, 216, 55, 2, 8.90, NULL, '2026-04-09 14:30:19', '2026-04-09 14:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `content` mediumtext NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `images`, `content`, `category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Pièces cocktail - Finger food', 'pieces-cocktail-finger-food', '[\"blogs\\/BXNjMlKmB661aeFaNcXna9MPgSZv44fbzZO5HisT.jpg\"]', '<p>Découvrez notre sélection raffinée de <strong>pièces cocktail</strong> et <strong>finger food</strong>, pensées pour sublimer vos réceptions, cocktails d’entreprise ou événements privés.<br>Chaque bouchée est préparée avec soin par nos chefs, alliant <strong>saveurs gourmandes, présentation soignée</strong> et <strong>produits frais</strong>.<br>Mini-brochettes, canapés, verrines ou feuilletés, nos créations s’adaptent à toutes vos envies pour un <strong>moment convivial et chic</strong>.</p>', 2, 1, 1, '2025-03-06 14:22:06', '2025-11-10 10:32:51'),
(5, 'Platter Pleasures.', 'platter-pleasures', '[\"blogs\\/4u4GlnLQ6h8cHpJpLtUnz63Pe6F4UWEfxET9oSuD.jpg\"]', '<p>Succombez à nos <strong>plateaux de desserts gourmands</strong>, un véritable festival de saveurs et de textures.<br>Entre <strong>mini pâtisseries, verrines fruitées, mignardises chocolatées</strong> et créations maison, chaque pièce est pensée pour <strong>séduire les yeux autant que le palais</strong>.<br>Idéals pour clôturer un repas, accompagner un café ou sublimer un buffet, nos <strong>desserts à partager</strong> transforment chaque moment en <strong>instant sucré inoubliable</strong>.</p>', 2, 1, 1, '2025-03-07 14:45:59', '2025-11-10 10:28:17'),
(6, 'New Food Blog', 'new-food-blog', '[\"blogs\\/GQFbR39UKmz8g1tzsyn7R6mZ0P98WfxZmhFl0RW6.jpg\"]', '<p>Découvrez notre sélection raffinée de <strong>pièces cocktail</strong> et <strong>finger food</strong>, pensées pour sublimer vos réceptions, cocktails d’entreprise ou événements privés.<br>Chaque bouchée est préparée avec soin par nos chefs, alliant <strong>saveurs gourmandes, présentation soignée</strong> et <strong>produits frais</strong>.<br>Mini-brochettes, canapés, verrines ou feuilletés, nos créations s’adaptent à toutes vos envies pour un <strong>moment convivial et chic</strong>.</p>', 2, 1, 1, '2026-02-09 10:08:53', '2026-02-09 10:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Buffets', 'buffets', 1, 1, '2025-02-19 09:41:18', '2025-02-19 09:41:26'),
(3, 'new category', 'new-category', 1, 1, '2025-02-19 11:01:56', '2025-02-19 11:02:13'),
(5, 'Platter Pleasures.', 'platter-pleasures', 1, 1, '2025-03-07 14:46:38', '2025-03-07 14:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('54ceb91256e8190e474aa752a6e0650a2df5ba37', 'i:2;', 1776169138),
('54ceb91256e8190e474aa752a6e0650a2df5ba37:timer', 'i:1776169138;', 1776169138),
('827bfc458708f0b442009c9c9836f7e4b65557fb', 'i:1;', 1768297096),
('827bfc458708f0b442009c9c9836f7e4b65557fb:timer', 'i:1768297096;', 1768297096),
('8effee409c625e1a2d8f5033631840e6ce1dcb64', 'i:1;', 1775737233),
('8effee409c625e1a2d8f5033631840e6ce1dcb64:timer', 'i:1775737233;', 1775737233),
('a9334987ece78b6fe8bf130ef00b74847c1d3da6', 'i:2;', 1775733042),
('a9334987ece78b6fe8bf130ef00b74847c1d3da6:timer', 'i:1775733042;', 1775733042),
('b7eb6c689c037217079766fdb77c3bac3e51cb4c', 'i:1;', 1775733526),
('b7eb6c689c037217079766fdb77c3bac3e51cb4c:timer', 'i:1775733526;', 1775733526),
('c5b76da3e608d34edb07244cd9b875ee86906328', 'i:1;', 1775733725),
('c5b76da3e608d34edb07244cd9b875ee86906328:timer', 'i:1775733725;', 1775733725),
('general_setting', 'O:25:\"App\\Models\\GeneralSetting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:16:\"general_settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:9:\"site_name\";s:7:\"Tastiie\";s:9:\"site_logo\";s:63:\"setting/site_logo//QIE5egVvpEj2fBOyyochOon7I1llM7lnsNum7F1z.jpg\";s:12:\"site_favicon\";s:68:\"settings/site_favicon//muXYtS7J966zGPRGCwlXltMdrmUwDsNFFhOEZs1t.webp\";s:16:\"site_description\";s:186:\"<p>Tastiie est un traiteur en ligne moderne qui transforme chaque repas en expérience gourmande. Commandez facilement vos plats faits maison directement depuis notre site.<br>&nbsp;</p>\";s:12:\"site_address\";s:6:\"France\";s:10:\"site_email\";s:17:\"tastiie@gmail.com\";s:10:\"site_phone\";s:14:\"01-80-89-40-27\";s:15:\"site_copy_right\";s:4:\"2025\";s:10:\"created_by\";i:1;s:10:\"updated_by\";i:1;s:10:\"created_at\";s:19:\"2025-02-27 12:49:32\";s:10:\"updated_at\";s:19:\"2025-11-26 16:29:35\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:9:\"site_name\";s:7:\"Tastiie\";s:9:\"site_logo\";s:63:\"setting/site_logo//QIE5egVvpEj2fBOyyochOon7I1llM7lnsNum7F1z.jpg\";s:12:\"site_favicon\";s:68:\"settings/site_favicon//muXYtS7J966zGPRGCwlXltMdrmUwDsNFFhOEZs1t.webp\";s:16:\"site_description\";s:186:\"<p>Tastiie est un traiteur en ligne moderne qui transforme chaque repas en expérience gourmande. Commandez facilement vos plats faits maison directement depuis notre site.<br>&nbsp;</p>\";s:12:\"site_address\";s:6:\"France\";s:10:\"site_email\";s:17:\"tastiie@gmail.com\";s:10:\"site_phone\";s:14:\"01-80-89-40-27\";s:15:\"site_copy_right\";s:4:\"2025\";s:10:\"created_by\";i:1;s:10:\"updated_by\";i:1;s:10:\"created_at\";s:19:\"2025-02-27 12:49:32\";s:10:\"updated_at\";s:19:\"2025-11-26 16:29:35\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:9:\"site_name\";i:1;s:9:\"site_logo\";i:2;s:12:\"site_favicon\";i:3;s:16:\"site_description\";i:4;s:12:\"site_address\";i:5;s:10:\"site_email\";i:6;s:10:\"site_phone\";i:7;s:15:\"site_copy_right\";i:8;s:10:\"created_by\";i:9;s:10:\"updated_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1776221611),
('permissions_list', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1773749191),
('roles_list', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:29:\"Spatie\\Permission\\Models\\Role\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"roles\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:1;s:4:\"name\";s:11:\"Super Admin\";s:10:\"guard_name\";s:3:\"web\";s:10:\"created_at\";s:19:\"2025-02-19 03:40:53\";s:10:\"updated_at\";s:19:\"2025-02-19 03:40:53\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:1;s:4:\"name\";s:11:\"Super Admin\";s:10:\"guard_name\";s:3:\"web\";s:10:\"created_at\";s:19:\"2025-02-19 03:40:53\";s:10:\"updated_at\";s:19:\"2025-02-19 03:40:53\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:2:\"id\";}}i:1;O:29:\"Spatie\\Permission\\Models\\Role\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"roles\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:2;s:4:\"name\";s:4:\"User\";s:10:\"guard_name\";s:3:\"web\";s:10:\"created_at\";s:19:\"2025-02-19 03:40:53\";s:10:\"updated_at\";s:19:\"2025-02-19 03:40:53\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:2;s:4:\"name\";s:4:\"User\";s:10:\"guard_name\";s:3:\"web\";s:10:\"created_at\";s:19:\"2025-02-19 03:40:53\";s:10:\"updated_at\";s:19:\"2025-02-19 03:40:53\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:2:\"id\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1775654723),
('settings_social_links', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1776221611);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `parent_id`, `position`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Plats', 'plats', NULL, 0, 0, 1, '2025-02-20 07:56:53', '2025-03-12 14:55:18'),
(4, 'Entrées', 'entrees', NULL, 0, 0, 1, '2025-02-24 11:15:52', '2025-03-06 13:56:25'),
(5, 'Desserts', 'desserts', NULL, 0, 0, 1, '2025-02-28 13:10:02', '2025-03-06 13:56:34'),
(7, 'Boissons', 'boissons', NULL, 0, 0, 1, '2025-03-06 13:56:18', '2025-03-06 13:56:18'),
(8, 'Epicerie', 'epicerie', NULL, 0, 0, 1, '2025-03-06 13:57:02', '2025-03-06 13:57:02'),
(9, 'Pizza logist', 'pizza-logist', NULL, 0, 0, 1, '2025-03-07 11:04:15', '2025-03-07 14:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Harsh Tiwari', 'seorankings003@gmail.com', 'Hello Tastiie,\r\n\r\nI wanted to take a moment to share an audit I conducted for your website. This audit highlights the specific issues that may be hindering your ability to excel in Google Search rankings and attract more customers.\r\n\r\nI would be delighted to send this audit to you via email for your review. If you find it valuable, we can discuss potential solutions together.\r\n\r\nI look forward to receiving your email address and contact information.\r\n\r\nBest Regards\r\n\r\nHarsh Tiwari', '2025-07-18 10:57:43', '2025-07-18 10:57:43'),
(3, 'Abbie Smiley', 'abbie.smiley60@googlemail.com', 'Hello there from DreamProxies.com\r\n\r\nAmazing news: high-quality, fast and reliable private proxies now even cheaper price:\r\n50% SALE - For All Private Proxies!\r\n\r\nBrowse proxies offers and sales:\r\n\r\nhttp://tiny.cc/DreamProxies-Discounts\r\n\r\nKey features and benefits that come with all proxies package on DreamProxies:\r\n+ Complete Anonymity - fully private and anonymous high-quality proxy servers\r\n+ Ultimate Quality - highest elite quality and reliability with all proxy packs\r\n+ Ultra-fast Speed - up to 1,000 mb/s per proxy - fastest speed servers\r\n+ Unlimited Bandwidth - no limitations and complete freedom using proxies\r\n+ Powerful Servers - fully-powered stable datacenter proxy servers\r\n+ Low Prices - some of the most affordable proxy plans you can find on the market\r\n+ Bonus Discounts - exclusive promo codes and offers for proxies on website\r\n\r\n50% SALE for all proxy packages - by DreamProxies.com', '2025-08-21 02:04:42', '2025-08-21 02:04:42'),
(4, 'Nikita', 'nikita.rocketdigitaltech@gmail.com', 'Hi,\r\n\r\nJust had a look at your site – it’s well-designed, but not performing well in search engines.\r\n\r\nWould you be interested in improving your SEO and getting more traffic?\r\n\r\nI can send over a detailed proposal with affordable packages.\r\n\r\nWarm regards,\r\nNikita', '2025-08-25 10:10:30', '2025-08-25 10:10:30'),
(5, 'OaYgfBDDeWxPiN', 'naxevila586@gmail.com', 'UNxStajao', '2025-10-05 12:58:00', '2025-10-05 12:58:00'),
(6, 'PJAmLYLEmsztZkn', 'nusalocapal706@gmail.com', 'hlydSRasmMzxE', '2025-10-06 10:44:04', '2025-10-06 10:44:04'),
(7, 'JwceABvZQ', 'upezirijo46@gmail.com', 'zlvskiQRZzOn', '2025-10-14 06:24:40', '2025-10-14 06:24:40'),
(8, 'sPMgJBlaRMjTRFy', 'akepayah28@gmail.com', 'oSstgTcXqY', '2025-10-16 13:04:40', '2025-10-16 13:04:40'),
(9, 'uelKPcrWF', 'aboyoduricad74@gmail.com', 'TtRIFmuv', '2025-10-19 11:21:33', '2025-10-19 11:21:33'),
(10, 'mldyFcnoeHIcRZGgqsFh', 'rebekkeinnpvg4@gmail.com', 'YftJNiwZoINFYzyskWylerWQ', '2025-10-25 05:26:25', '2025-10-25 05:26:25'),
(11, 'djsmctTgpQYzvJVs', 'djoselainhensonaz1999@gmail.com', 'hgHfXaxDfiWFLegZ', '2025-10-27 05:49:26', '2025-10-27 05:49:26'),
(12, 'aOyUIUkSwFHQmAxsmF', 'datozorisi59@gmail.com', 'IeItQOmwZDlixsRivmsM', '2025-10-30 02:34:26', '2025-10-30 02:34:26'),
(13, 'ZUccFkiQMbjOWZJIq', 'tolicedu22@gmail.com', 'flLKeptqPPfiMkZGXKrpUCD', '2025-10-31 14:09:58', '2025-10-31 14:09:58'),
(14, 'Ellie', 'info@tastiie.com', 'Hello there \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF:  https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nMany Thanks, \r\n\r\nEllie', '2025-11-06 11:46:07', '2025-11-06 11:46:07'),
(15, 'Maira Hust', 'maira.hust@googlemail.com', 'THE FASTEST WAY TO CREATE, PUBLISH, & PROFIT\r\nFROM EBOOKS… NO WRITING REQUIRED\r\n\r\nPROFIT-READY EBOOKS with covers, TOC, chapters, sections, links, images, & content!\r\nhttps://viewbet-24.site/eBookWriterAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://viewbet-24.site/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321', '2025-11-10 21:39:08', '2025-11-10 21:39:08'),
(16, 'Abhilasha Francis', 'af@g-ops.com', 'Hello,\r\nI met you at the Porte de Versailles - Heavent Paris Expo. And you told me that your website was in the final stages. I told you about my company. And we order food frequently. I would like to talk about this further. Please contact me. Thanks!', '2025-11-12 10:29:36', '2025-11-12 10:29:36'),
(17, 'Una', 'info@una.bangeshop.com', 'Hey, \r\n\r\nI hope you\'re doing well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nThe bags are waterproof and anti-theft, and have a built-in USB cable that can recharge your phone while you\'re on the go.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nThank You,\r\n\r\nUna', '2025-11-14 21:21:19', '2025-11-14 21:21:19'),
(18, 'xcNTZZrrdhonHMkBl', 'punacozedefe09@gmail.com', 'sODJNSYslrOlGImyxZpRvw', '2025-11-17 10:10:15', '2025-11-17 10:10:15'),
(19, 'Ignacio Reynell', 'reynell.ignacio@hotmail.com', 'This Invisible 10-Minute Faceless Video Hack\r\nPulled in 628,000+ Views…\r\nWith No Camera, No Gear & No Tech Skills\r\nhttps://443w.site/InvisibleTrafficSystem\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://443w.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-18 01:18:43', '2025-11-18 01:18:43'),
(20, 'Pearline', 'mohamed.cortes.1977+tastiie.com@gmail.com', 'Multiverse AI - The Only Platform That Gives You Access To Every Top AI Model — In Every Version — All Inside A Single, Beautifully Simple Dashboard.\r\n\r\nhttps://1x-slots.site/MultiverseAI\r\n\r\nChatGPT (3.5 → 4.5 → 4o → 5 → Turbo → Nano)\r\nGemini (1.5 Pro → 2.0 Flash)\r\nClaude (3 Opus → Sonnet → Haiku)\r\nGrok (1 through 4)\r\nDALL·E, Veo, Kling, ElevenLabs, DeepSeek, FLUX, LLaMA & more\r\nAnd yes — you get every future version included automatically.\r\n\r\nhttps://1x-slots.site/MultiverseAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://1x-slots.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-21 15:41:40', '2025-11-21 15:41:40'),
(21, 'Marguerite', 'marguerite.brace48@gmail.com', 'This Isn\'t A Course. It\'s A Fully Functional,\r\nDone-For-You Business... Powered Entirely By AI\r\n\r\nhttps://askthis.site/ConverslyAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://askthis.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-22 12:32:56', '2025-11-22 12:32:56'),
(22, 'Larue', 'larue.deneeve@googlemail.com', 'We monitor the entire proxy market and select only the most profitable offers — discounts, exclusive rates, and limited-time deals.\r\n\r\nConfirm your subscription and start receiving the best proxy offers straight to your inbox. No spam — only real savings.\r\n\r\nhttps://www.novaai.expert/proxy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-24 21:00:03', '2025-11-24 21:00:03'),
(23, 'Maribel', 'maribel.simpson@gmail.com', 'Replaces 25+ Expensive AI Subscriptions With ONE Smart AI Command Center\r\n\r\nhttps://ai108.online/TitanAI\r\n\r\nRun Your Entire Online Business:\r\nDesign, Write, Code, Market, Sell & Automate — All From One Platform.\r\nSave $6,000+/Year | No Monthly Fees | 0% Effort → 100% Profit\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://ai108.online/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-29 12:52:54', '2025-11-29 12:52:54'),
(24, 'Mack', 'underhill.mack@hotmail.com', 'A Short Book of Quotes Earns $1,240/Month on Amazon — Here’s How You Can Create a Book Like This With 308 Prompts\r\n\r\nhttp://egrntop.site/DailyWisdomBooks\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://egrntop.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-29 20:45:08', '2025-11-29 20:45:08'),
(25, 'Eloise', 'lundstrom.eloise@googlemail.com', 'Stop Paying Thousands in Hosting Fees When You Could Be Keeping Every Dollar of Profit\r\nLearn the Complete System in This Step-By-Step Course\r\n\r\nYES! You CAN Launch Lightning-Fast Professional Websites for $0 Monthly, Using the Same Infrastructure That Powers Million-Dollar Companies\r\n\r\nhttps://filmfile.site/FreeHosting\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://filmfile.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-30 01:30:51', '2025-11-30 01:30:51'),
(26, 'Marquita', 'marquita.hodges@hotmail.com', 'Get  FREE Traffic To ANY  URL​- get daily traffic every day\r\nNEW ROTATOR FOR THIS LAUNCH\r\nJust submit your links - JOB DONE!\r\nPermanent source that never runs dry\r\nNo Tech Skills Required\r\nWorks In ANY niche\r\nURLS will get traffic EVERY SINGLE DAY\r\nFast Movers will get BEST results...\r\n\r\nhttps://inshbaa.site/OneDollarUnlimitedTraffic\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://inshbaa.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-30 23:28:06', '2025-11-30 23:28:06'),
(27, 'Russell', 'joel.fox.1965+tastiie.com@gmail.com', 'PROFIT-READY EBOOKS with covers, TOC, chapters, sections, links, images, & content!\r\n\r\nTHE FASTEST WAY TO CREATE, PUBLISH, & PROFIT FROM EBOOKS… NO WRITING REQUIRED\r\nhttps://bookmarket.expert/eBookWriterAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://bookmarket.expert/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-11-30 23:38:42', '2025-11-30 23:38:42'),
(28, 'Gonzalo', 'ancher.gonzalo@yahoo.com', 'Imagine launching a viral, faceless  YouTube, TikTok, or Instagram channel \r\nin just minutes...\r\n\r\nAnd Then Your new Channel  automatically Creates AND posts videos FOR YOU... So you NEVER HAVE TO TOUCH IT, AGAIN?\r\nhttps://www.novaai.expert/TrafficSupernova\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://novaai.expert/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-12-01 15:19:16', '2025-12-01 15:19:16'),
(29, 'Stephania', 'stephania.jessep@gmail.com', 'Finally... A Dead-Simple Way To Create Professional Local Trade & Service Images Using Free AI, Without Design Skills, Expensive Software, Or Hiring Freelancers!\r\nhttps://java138.site/TradeyyAIApp\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://java138.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-12-01 22:10:37', '2025-12-01 22:10:37'),
(30, 'Jason', 'jason@jason.bangeshop.com', 'Hey there, \r\n\r\nI hope this email finds you well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nThe bags are waterproof and anti-theft, and have a built-in USB cable that can recharge your phone while you\'re on the go.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nMany Thanks,\r\n\r\nJason', '2025-12-02 23:04:12', '2025-12-02 23:04:12'),
(31, 'Damian', 'mcguinness.damian9@outlook.com', 'We\'re Getting New Followers In Different Niches That Keep Coming Back Every Day...\r\n\r\nhttps://liteminer.site/liteminer.site/HOOKD\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://liteminer.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-12-04 03:36:48', '2025-12-04 03:36:48'),
(32, 'Samuel', 'rankin.samuel@gmail.com', 'Fantasy is dominating multiple bestseller categories in the children’s book section on Amazon — and the Creative Writing, Story Starters, and Write-Your-Own-Story Books niche for ages 8–12 is growing faster than ever.\r\n\r\nIf you browse through “Children’s Activity Books,” “Creative Writing,” and “Imagination & Play,” you’ll see fantasy-themed story starter books consistently appearing on the first page — with both new and long-time authors releasing fresh titles every week. From “Write Your Own Fantasy Story” and “Kids Creative Writing Journal” to various “Build-A-Story Books,” the demand just keeps expanding.\r\n\r\nhttps://jyayintv5.site/FantasyStory\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://jyayintv5.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-12-04 23:00:29', '2025-12-04 23:00:29'),
(33, 'Junko', 'talbott.junko@gmail.com', 'This Invisible 10-Minute Faceless Video Hack\r\nPulled in 628,000+ Views…\r\nWith No Camera, No Gear & No Tech Skills\r\nhttps://lanyou.site/InvisibleTrafficSystem\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://lanyou.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-12-05 07:15:58', '2025-12-05 07:15:58'),
(34, 'Mahalia', 'mahalia.siebenhaar90@gmail.com', 'The Hidden Goldmine gets people in front of 5,000,000+ buyers that pay over and over again all while AI takes care of all of the “work”.\r\n\r\nhttps://lapse.site/TheHiddenGoldmine\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://lapse.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2025-12-05 13:10:26', '2025-12-05 13:10:26'),
(35, 'Buford', 'buford.mcanulty@gmail.com', 'Build Your AI Coloring Book Empire\r\n\r\nThe AI Coloring Codex is the first complete system for creating endless, professional, and consistent coloring pages across 50+ styles — and selling them as your own.\r\n\r\nhttps://marketingways.ru/AIColoringCodeX\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://marketingways.ru/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321', '2025-12-06 16:13:43', '2025-12-06 16:13:43'),
(36, 'Charline', 'joel.fox.1965+tastiie.com@gmail.com', 'DAILY TRAFFIC TO ANY URL FROM 3 X HIGH PERFORMING TRAFFIC SOURCES FOR JUST $1\r\nhttps://maswebmas.ru/OneDollarBlackFriday\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://maswebmas.ru/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321', '2025-12-07 07:33:29', '2025-12-07 07:33:29'),
(37, 'SdVPuXKceADCxMbVHi', 'onunuvirebu861@gmail.com', 'xCFuFmBuzeAHPXXurZBR', '2025-12-09 09:55:50', '2025-12-09 09:55:50'),
(38, 'Rayford', 'rayford.rhodes@gmail.com', 'Hello,\r\n\r\nWe have a promotional offer for your website tastiie.com https://playoxwin.site/EveryAI?tastiie.com\r\n\r\nTired of paying for dozens of AI tools and bouncing between them for every project—from website copy to design to video ads? With EveryAI you get one dashboard that unlocks hundreds of premium AI models without monthly fees. Build sites, craft copy, generate logos, 8K motion videos, talking avatars… and keep 100% of your profit under a commercial license. Want to make more, work less, and finally control your income? It starts here.\r\n\r\nSee it in action: https://playoxwin.site/EveryAI?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-12-09 16:57:43', '2025-12-09 16:57:43'),
(39, 'Andrew', 'willcock.andrew@hotmail.com', 'Hi,\r\n\r\nWe have a promotional offer for your website tastiie.com.\r\n\r\nWhy do you need this? So you can skip months of SEO and ad spend — all with just one click. APEX AI, powered by ChatGPT-5, instantly creates and ranks your content on Google’s first page—no domains, no skills, no costs. Just enter a keyword, click activate, and watch targeted, free traffic (and commissions!) roll in the very same day. It’s your fast-track to dominating the search results while others are still stuck in the old grind.\r\n\r\nSee it in action: https://smartexperts.pro/ApexAI?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=tastiie.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2025-12-09 17:23:43', '2025-12-09 17:23:43'),
(40, 'Renate', 'nutt.renate@yahoo.com', 'Hi,\r\n\r\nWe have a promotional offer for your website tastiie.com.\r\n\r\nWhy you need this: to have every campaign, affiliate offer, or project start delivering traffic and income today — without spending a dime on ads or tech headaches. Ghost Pages turns you into a stealth engine that Google absolutely trusts: you build invisible pages using a secret Google asset, and they quietly start delivering targeted visitors — while your competition is nowhere the wiser.\r\n\r\nIt’s easy, it’s fast, it’s genius: no domains, hosting, social media, or technical skills required — if you can click and copy, you can do this. Plus, it really works and scales: launch one Ghost Page and BAM — traffic flows wherever you want: affiliate links, e‑com, leads — you choose. Ready to start in minutes? Discover how and get results that might blow your mind.\r\n\r\nSee it in action: https://pastelink.site/GhostPages\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://pastelink.site/unsub?domain=tastiie.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2025-12-09 20:39:28', '2025-12-09 20:39:28'),
(41, 'Jo', 'jo.saville@googlemail.com', 'Hello,\r\n\r\nWe have a promotional offer for your website tastiie.com https://pozdravochek.site/KevinAI?tastiie.com\r\n\r\nImagine launching a campaign and seeing conversions rise within hours — without endless tweaking, without brainstorming until midnight. Results With Kevin AI delivers the set of AI tools + proven strategies that take over the busywork: crafting emails, scripts, content ideas and more. You just hit start — the system generates, tests, sells.\r\n\r\nWant to stop being stuck in the “I’m busy all day” loop and move into “I launch, I watch, I profit” mode? \r\n\r\nSee it in action: https://pozdravochek.site/KevinAI?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://pozdravochek.site/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-12-09 21:42:12', '2025-12-09 21:42:12'),
(42, 'Nam', 'viner.nam52@gmail.com', 'Hello,\r\n\r\nWe have a promotional offer for your website tastiie.com.\r\n\r\nWhy you need this: imagine waking up to steady monthly income hitting your account—without the hassle of building your own product, funnels, or dealing with tech headaches. With Monthly Money Masterclass, you can pick the path that suits your style: let businesses self-serve QR codes or offer a full “done-for-you” service. You’ll earn $5–$20 per month per client with the self-serve model, or $200+ per month with just 5–10 clients—fast, simple, repeatable.\r\n\r\nFeel the confidence. You get a clear blueprint delivered by successful experts who\'ve generated millions online. This isn\'t fluff—it’s a step-by-step way to build real recurring income, even with zero experience. Ready to level up your money game? Click the link to discover how to start today.\r\n\r\nSee it in action: https://goldsolutions.pro/MMM?tastiie.com\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-12-10 10:22:42', '2025-12-10 10:22:42'),
(43, 'Jon', 'jon.niles@outlook.com', 'Hello,\r\n\r\nWe have a promotional offer for your website tastiie.com: https://ranknowyour.site/VibeCode?tastiie.com\r\n\r\nWhy do you need this? Because with Vibe Code Blueprint, you\'re unlocking a traffic-and-profit machine at the click of a button — no developers, no upfront costs, no waiting weeks. Create high-converting digital assets instantly — assets that used to cost thousands — and start earning today.\r\n\r\nIn a cluttered digital world, this system stands out: from creation to monetization, it’s fast, simple, and accessible to anyone. The opportunity is here now — early adopters get the biggest slice of the pie. Ready to see how it works? Click through and I’ll walk you inside.\r\n\r\nSee it in action: https://ranknowyour.site/VibeCode?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://ranknowyour.site/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-12-10 17:58:40', '2025-12-10 17:58:40'),
(44, 'Beatris', 'sales@elkins.caredogbest.com', 'Good day \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nTo your success, \r\n\r\nBeatris', '2025-12-14 09:08:58', '2025-12-14 09:08:58'),
(45, 'Toby', 'parkinson.toby13@googlemail.com', 'Hi,\r\n\r\nWe have a promotional offer for your website tastiie.com.\r\n\r\nWhy do you need this? Picture waking up anywhere — Bali, a café in Paris, or your couch — checking your phone and seeing a steady stream of buyer-ready clicks rolling in… without ads, outreach, or a website. That’s exactly what Rapid Traffic Flow delivers: a super-simple, plug-and-play system that gets traffic and sales flowing in minutes.\r\n\r\nWith Rapid Traffic Flow, you get a clear 3-step blueprint, AI‑powered boosters to automate the process, a “Hidden Hub” you can tap at will, and a solid refund guarantee if your traffic spike doesn’t happen — all for less than the cost of your next takeout order. Ready to stop chasing traffic and start capturing it? Dive in now and dominate the affiliate game today!\r\n\r\nSee it in action: https://1fvyaq.site/RapidTrafficFlow\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://1fvyaq.site/unsub?domain=tastiie.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2025-12-14 10:47:40', '2025-12-14 10:47:40'),
(46, 'Elana', 'mohamed.cortes.1977+tastiie.com@gmail.com', 'Hello,\r\n\r\nWe have a promotional offer for your website tastiie.com.\r\n\r\nWorld’s First AI App That Instantly Builds Your Own “Udemy-Like” eLearning Platform - Preloaded With 100+ Ready-To-Sell, Red-Hot Online Courses\r\nIn One Single Dashboard, For A Low One-Time Fee!\r\nOnly 3 EASY Clicks - Create & Sell Stunning Online Courses on Your Own Udemy™-Style Platform to Hungry Buyers for Top Dollar.\r\n\r\nNo Reserach | No Course Creation | No Tech  Skills | No Monthly Fees Required\r\n\r\nSee it in action: https://udexi.site/CourseBeastAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://udexi.site/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-12-14 16:56:57', '2025-12-14 16:56:57'),
(47, 'Quinn', 'quinn.miner@gmail.com', 'World\'s First AI App That Lets You...\r\nBuild Funnels Inside Reels, Shorts & TikToks\r\nThat Capture Leads, Clicks & Sales\r\nWithout Pages, Funnel Builders Or Tech\r\n100% Done For You By AI\r\nhttps://optimalconvert.site/VideoFunnelsAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://optimalconvert.site/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321', '2025-12-16 21:04:47', '2025-12-16 21:04:47'),
(48, 'Lyn', 'loggins.lyn13@msn.com', 'Start Building a Christian Publishing Empire — No Writing Needed\r\nEven if you\'ve never written a book… or designed a single page in your life. With FaithVault 500, you get a done-for-you library of faith-based eBooks you can own, sell, and share forever.\r\nhttps://ngmsrv.site/FaithVault\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://ngmsrv.site/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321', '2025-12-16 22:52:51', '2025-12-16 22:52:51'),
(49, 'Mckinley', 'seder.mckinley@gmail.com', 'World\'s First AI App That Lets You...\r\nBuild Funnels Inside Reels, Shorts & TikToks\r\nThat Capture Leads, Clicks & Sales\r\nWithout Pages, Funnel Builders Or Tech\r\n100% Done For You By AI\r\nMaking Us $575- $1895 Daily\r\nInstantly adds sales forms, affiliate buy links, CTA buttons & offer overlays\r\ninside any video Turning viewers into paying customers and commissions on autopilot \r\n\r\nhttps://burto.site/VideoFunnelsAI?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nas we believe \r\nthis offer \r\nmay be relevant to you.\r\n\r\nIf you no longer wish to get \r\nany more messages from us, \r\nplease click here to \r\nunsubscribe:\r\n\r\nhttps://burto.site/unsub?domain=tastiie.com \r\nAddress: Address: 7046   Prenzlauer Allee 98, ST  6008\r\nLooking out for you, Mckinley Seder.', '2025-12-17 14:35:20', '2025-12-17 14:35:20'),
(50, 'Fay', 'fay.shorter@gmail.com', 'Replaces 25+ Expensive AI Subscriptions\r\nWith ONE Smart AI Command Center\r\nRun Your Entire Online Business:\r\nDesign, Write, Code, Market, Sell & Automate — All From One Platform.\r\n Save $6,000+/Year |  No Monthly Fees |  0% Effort → 100% Profit\r\n\r\nhttps://hruh09.site/AITitan?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nas we believe \r\nour offer \r\ncould be useful to you.\r\n\r\nIf you don’t want to receive \r\nany more messages from us, \r\nplease click here to \r\nunsubscribe:\r\n\r\nhttps://hruh09.site/unsub?domain=tastiie.com \r\nAddress: Address: 8086   Hermannstrasse 17, BW  69151\r\nLooking out for you, Fay Shorter.', '2025-12-18 13:58:41', '2025-12-18 13:58:41'),
(51, 'Natisha', 'natisha.nowak85@yahoo.com', 'List Building Jumpstart: The Ready-Made List Building \"Business In A Box\" With Full Private Label Rights!\r\nJust Add Your Name, Change Your Payment Links, And Keep 100% Of The Profits!\r\n\r\n\r\nhttps://f2twsi.site/ListBuildingJumpstart?tastiie.com\r\n\r\n\r\n\r\nYou are getting this email \r\nsince we believe \r\nour offer \r\ncould be relevant to you.\r\n\r\nIf you would prefer not to receive \r\nany more messages from us, \r\nyou can \r\nunsubscribe:\r\n\r\nhttps://f2twsi.site/unsub?domain=tastiie.com \r\nAddress: Address: 2859   78 Worthy Lane, NA  Hp17 1zn\r\nLooking out for you, Natisha Nowak.', '2025-12-18 20:58:22', '2025-12-18 20:58:22'),
(52, 'Latoya', 'joel.fox.1965+tastiie.com@gmail.com', 'Instantly Create Full Product Reviews, Descriptions, Bullets, SM Content, Hashtags, Emails & Sell Your Own Software - In Minutes \r\n- Even If You’re A Complete Beginner.\r\n\r\n\r\nhttps://huntfish.site/1CReviewBuilder?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nas we believe \r\nthe offer we provide \r\ncould be relevant to you.\r\n\r\nIf you don’t want to receive \r\nfuture messages from us, \r\nyou can \r\nstop receiving emails:\r\n\r\nhttps://huntfish.site/unsub?domain=tastiie.com \r\nAddress: Address: 4156   Eriksbo Vastergarde 81, NA  416 06\r\nLooking out for you, Latoya Reginald.', '2025-12-18 21:15:11', '2025-12-18 21:15:11'),
(53, 'Marissa', 'gritton.marissa@gmail.com', 'Skyrocket tastiie.com rankings, grow your search appearance and generate powerful backlinks! \r\nBonusBacklinks.com - we build daily backlinks and drive organic traffic to your page EVERY DAY:\r\n\r\n+ Get 85% OFF\r\n+ Trusted daily backlinks\r\n+ Real web traffic\r\n+ Price only from $1\r\n+ Bonus discount codes:\r\n\r\nhttps://BonusBacklinks.com/85off\r\n\r\nBonusBacklinks.com - daily backlinks and organic visits to skyrocket your site everyday', '2025-12-18 22:09:25', '2025-12-18 22:09:25'),
(54, 'gJtVTgTSrnXMqeHTrRnjIlU', 'guduriboquj304@gmail.com', 'kLpKxiNBVnGaZNtOuOjELE', '2025-12-20 01:47:32', '2025-12-20 01:47:32'),
(55, 'gJtVTgTSrnXMqeHTrRnjIlU', 'guduriboquj304@gmail.com', 'kLpKxiNBVnGaZNtOuOjELE', '2025-12-20 01:47:36', '2025-12-20 01:47:36'),
(56, 'Thao', 'thao.ryan@outlook.com', 'AI Turbo Creator turns ideas into traffic magnets.\r\nMake your creations visible, compelling, and unforgettable.\r\n\r\n\r\nhttps://lnunquedays.site/AITurboCreator?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nbecause we think \r\nour offer \r\ncould be useful to you.\r\n\r\nIf you would prefer not to receive \r\nany more messages from us, \r\nplease click here to \r\nunsubscribe from these emails:\r\n\r\nhttps://lnunquedays.site/unsub?domain=tastiie.com \r\nAddress: Address: 6483   85 Rue Des Six Freres Ruellan, CENTRE  13300\r\nLooking out for you, Thao Ryan.', '2025-12-20 07:21:54', '2025-12-20 07:21:54'),
(57, 'Soila', 'leverette.soila@msn.com', 'GET INSTANT AI POWERED COURSE CREATION, MARKETING STRATEGIES, AND COMPELLING CONTENT THAT ADAPTS TO YOUR EXACT NEEDS - ALL AT SUPERHERO SPEED!\r\n\r\n\r\nhttps://lordvpn.site/HeroCommandersAI?tastiie.com\r\n\r\n\r\nYour Course Creation Superhero That Delivers Exactly What You Want, Instantly - Even If You\'re A Complete Newbie!\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nas we think \r\nwhat we’re offering \r\ncould be useful to you.\r\n\r\nIf you do not wish to receive \r\nfuture messages from us, \r\nsimply \r\nopt out:\r\n\r\nhttps://lordvpn.site/unsub?domain=tastiie.com \r\nAddress: Address: 7059   57 Newmarket Road, NA  Po11 6pd\r\nLooking out for you, Soila Leverette.', '2025-12-20 15:34:17', '2025-12-20 15:34:17'),
(58, 'Faith', 'sales@beaulieu.tidbuy.com', 'Good day \r\n \r\nIs your dog\'s nails getting too long? If you\'re tired of going to the vet or groomer to get them trimmed, why not try PawSafer™? \r\nWith PawSafer™, you can trim your dog\'s nails from the comfort of your own home, and it only takes a few minutes!\r\n\r\nPawSafer™ is the safest and most convenient way to trim your dog\'s nails, and it\'s very affordable. \r\n\r\nGet it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: https://tidbuy.com\r\n \r\nBest Wishes, \r\n \r\nFaith', '2025-12-21 15:39:51', '2025-12-21 15:39:51'),
(59, 'Dong', 'proby.dong69@googlemail.com', 'If you run a web project, you can skip extra complications — you need better results. \r\n\r\nThis solution is designed to allow you make better use from existing visitors you currently receive, without overwhelming setups or extra effort. \r\n\r\nIt’s intended for site owners who prefer smart decisions: less manual work, more control, and trackable progress in day-to-day results. \r\n\r\nExplore further and see why a growing number of website owners see this as a practical upgrade for their digital setup.\r\n\r\nhttps://ndvrpfnc9nyb7ebr.site/AITitan?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nsince we believe \r\nwhat we’re offering \r\nmay interest you.\r\n\r\nIf you don’t want to receive \r\nany more messages from us, \r\nsimply \r\nunsubscribe:\r\n\r\nhttps://ndvrpfnc9nyb7ebr.site/unsub?domain=tastiie.com \r\nAddress: Address: 4551   Alsteravagen 92, NA  380 65\r\nLooking out for you, Dong Proby.', '2025-12-22 16:34:37', '2025-12-22 16:34:37'),
(60, 'Grover', 'grover.hose@yahoo.com', 'Think about this: you were able to create professional-looking eBooks for use in a short time — without creating text from scratch yourself. Through EbookWriter you simply define a topic then right away obtain a fully formatted digital book including sections, graphics, and downloadable files.\r\n\r\nhttps://vespa777g.site/eBookWriterAI?tastiie.com\r\n\r\nThis is not just one more content tool — it’s a workflow booster designed for webmasters and digital publishers: create useful content assets which assist in subscriber growth, place partner links, or publish them on known marketplaces like Amazon — as the platform manages the routine work. Skip extended writing processes and extra external help.\r\n\r\nhttps://vespa777g.site/eBookWriterAI?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are getting this email \r\nbecause we think \r\nwhat we’re offering \r\nmay be relevant to you.\r\n\r\nIf you do not wish to receive \r\nany more messages from us, \r\nsimply \r\nunsubscribe:\r\n\r\nhttps://vespa777g.site/unsub?domain=tastiie.com \r\nAddress: Address: 5079   Via Licola Patria 75, AV  83044\r\nLooking out for you, Grover Hose.', '2025-12-23 01:58:07', '2025-12-23 01:58:07'),
(61, 'Mackenzie', 'penney.mackenzie31@gmail.com', 'If you manage a online platform, you understand one thing for sure: you regularly need fresh materials. More materials. Faster. And materials that actually attracts interest, rather than taking up space. This solution helps you use ready-to-use AI resources without spending hours on constant searching, trial runs, and uncertainty.\r\n\r\nhttps://mynewhome.site/EveryAI?tastiie.com\r\n\r\nYou can use proven methods and resources already used by others — things you can apply immediately to develop your website. This is not about technical complexity. It’s about speed, better use of resources, and building a noticeable edge over competitors. Want to see this can fit for your website? Explore further.\r\n\r\nhttps://mynewhome.site/EveryAI?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are getting this email \r\nsince we believe \r\nour offer \r\ncould be relevant to you.\r\n\r\nIf you don’t want to receive \r\nany more messages from us, \r\nyou can \r\nopt out:\r\n\r\nhttps://mynewhome.site/unsub?domain=tastiie.com \r\nAddress: Address: 8007   93 Rue Gustave Eiffel, CENTRE  69140\r\nLooking out for you, Mackenzie Penney.', '2025-12-23 07:11:39', '2025-12-23 07:11:39'),
(62, 'Cecelia', 'cecelia.cansler@gmail.com', 'What does this mean for you? The reason is simple: your website is able to support more on-site engagement with no need for adding staff, complicated setups, and ongoing manual management.\r\n\r\nhttps://moveinready.site/AIModelSuite?tastiie.com\r\n\r\nYou have a ready-to-use system that manages visitor communication for you, helping to guide incoming traffic toward meaningful actions such as requests and intent-based steps.\r\n\r\nThis is designed for website owners who want to maintain a more structured website experience without technical details.\r\n\r\nAfter connection, your site starts working in a more organized way. Curious how it works in practice?\r\n\r\nhttps://moveinready.site/AIModelSuite?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nThis message is sent to you \r\nbecause we believe \r\nthe offer we provide \r\nmay interest you.\r\n\r\nIf you would prefer not to receive \r\nany more messages from us, \r\nplease click here to \r\nopt out:\r\n\r\nhttps://moveinready.site/unsub?domain=tastiie.com \r\nAddress: Address: 7185   Via Franscini 27, NA  8881\r\nLooking out for you, Cecelia Cansler.', '2025-12-23 11:41:56', '2025-12-23 11:41:56'),
(63, 'Katrin', 'katrin.strauss@gmail.com', 'Looking to escape overused niches and inefficient product building? 342 ideas for soft-style creative books offers you a {complete|ready|fully prepared|wel\r\n\r\nhttps://5sq4ek.site/CozyColoringBooks?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n{You are receiving this message|You’re receiving this email|This message is sent to you|You received this notification|You are getting this email} \r\n{because we believe|because we think|as we believe|as we think|since we believe|since we think} \r\n{our offer|this offer|the offer we provide|what we’re offering} \r\n{may be relevant to you|could be relevant to you|might be of interest to you|may interest you|could be useful to you}.\r\n\r\n{If you do not wish to receive|If you don’t want to receive|If you would prefer not to receive|If you no longer wish to get} \r\n{further communications from us|future messages from us|additional emails from us|any more messages from us}, \r\n{please click here to|you can|simply} \r\n{unsubscribe|opt out|unsubscribe from these emails|stop receiving emails}:\r\n\r\nhttps://5sq4ek.site/unsub?domain=tastiie.com \r\nAddress: Address: 2683   Travessa Treze 632, RJ  27279-555\r\nLooking out for you, Katrin Strauss.', '2025-12-26 11:01:14', '2025-12-26 11:01:14'),
(64, 'Maricela', 'otoole.maricela6@gmail.com', 'Achieve More With Less Effort: Discover 10 Step-by-Step Strategies to Transform Free AI Tools Like ChatGPT Into Practical Business Skills, Even If You\'re a Complete Beginner!\r\n\r\nhttps://absoliut.site/AIProfitBlueprint?tastiie.com\r\n\r\nPure actionable content. These proven AI strategies are designed to be implemented fast - if you can follow simple instructions, you can start applying professional AI techniques this week. Perfect for entrepreneurs, freelancers, content creators, and anyone ready to transform how they use AI.\r\n\r\nhttps://absoliut.site/AIProfitBlueprint?tastiie.com\r\n\r\n\r\nYou are getting this email \r\nsince we believe \r\nthe offer we provide \r\nmay be relevant to you.\r\n\r\nIf you do not wish to receive \r\nfurther communications from us, \r\nplease click here to \r\nstop receiving emails:\r\n\r\nhttps://absoliut.site/unsub?domain=tastiie.com \r\nAddress: Address: 4205   1797 St. John Street, SK  S4p 3y2\r\nLooking out for you, Maricela Otoole.', '2025-12-26 21:02:57', '2025-12-26 21:02:57'),
(65, 'Vicente', 'stretch.vicente@gmail.com', 'Think about running a fully built pet-related site — one of the most active segments online — that is ready to work immediately. This package gives you a well-organized WordPress project with ready-made articles, product overviews, digital materials, and integrated engagement tools, so you avoid writing content, technical configuration, and design issues entirely.\r\n\r\nhttps://novaai.expert/PetAuthorityFortune?tastiie.com\r\n\r\nIf you are exhausted by spending weeks creating sites manually, figuring out ways sites perform, and creating every text manually, this option helps you create a solid digital asset that attracts visitors, creates trust, and scales naturally.\r\n\r\nhttps://novaai.expert/PetAuthorityFortune?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nsince we believe \r\nwhat we’re offering \r\ncould be useful to you.\r\n\r\nIf you don’t want to receive \r\nfurther communications from us, \r\nsimply \r\nunsubscribe:\r\n\r\nhttps://novaai.expert/unsub?domain=tastiie.com \r\nAddress: Address: 5413   65 Shaw Drive, VIC  3465\r\nLooking out for you, Vicente Stretch.', '2025-12-26 21:46:35', '2025-12-26 21:46:35'),
(66, 'Nicholas', 'sales@tastiie.com', 'Morning \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nCheers, \r\n\r\nNicholas', '2025-12-27 07:14:36', '2025-12-27 07:14:36'),
(67, 'Joanna', 'joel.fox.1965+tastiie.com@gmail.com', 'Fed up with losing weeks making online products that fail to sell? Meet the 2026 Digital Business Bundle — 7 ready-to-sell digital products with complete PLR rights you can quickly rebrand and begin selling as your own. This isn’t guesswork — it’s buyer-tested content across evergreen niches, from AI training to earning guides and wellness assets, all proven to convert.\r\n\r\nhttps://6v9sfq.site/ChristmasProfitBundle?tastiie.com\r\n\r\nSkip the long creation grind: get access to, customize, and launch on platforms like Etsy, Gumroad, Shopify, or your own funnels. Begin turning clicks into cash starting this January with actual products people are already looking for.\r\n\r\nhttps://6v9sfq.site/ChristmasProfitBundle?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nas we think \r\nthis offer \r\nmay interest you.\r\n\r\nIf you would prefer not to receive \r\nfurther communications from us, \r\nyou can \r\nopt out:\r\n\r\nhttps://6v9sfq.site/unsub?domain=tastiie.com \r\nAddress: Address: 2124   Christianslundsvej 76, REGION MIDTJYLLAND  8983\r\nLooking out for you, Joanna Ardill.', '2025-12-29 02:25:12', '2025-12-29 02:25:12'),
(68, 'Joellen', 'greaves.joellen@gmail.com', 'Picture working with an extensive collection of prebuilt mystery story outlines that easily turn into products parents, teachers, and tutors value — books, activity materials — without starting from scratch. This is not just a loose idea collection. This is a structured prompt collection with clear frameworks that lets you create engaging kids’ materials in hours, rather than weeks.\r\n\r\nhttps://6pr5pg.site/StoryPromptsDetective?tastiie.com\r\n\r\nIf you work as a webmaster, content creator, or KDP publisher, that this means working within a stable young readers niche with steady interest, building several formats from one core asset and opening long-term monetization. Want to see a simple approach to prepare and share kids’ mystery content without long writing cycles? Click through to review the approach.\r\n\r\nhttps://6pr5pg.site/StoryPromptsDetective?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are getting this email \r\nas we believe \r\nthis offer \r\nmight be of interest to you.\r\n\r\nIf you don’t want to receive \r\nfuture messages from us, \r\nsimply \r\nunsubscribe:\r\n\r\nhttps://6pr5pg.site/unsub?domain=tastiie.com \r\nAddress: Address: 4384   Neubertbogen 75, NA  1423\r\nLooking out for you, Joellen Greaves.', '2025-12-29 18:34:26', '2025-12-29 18:34:26'),
(69, 'Tonia', 'tonia.hedges@msn.com', 'World\'s First AI App That Creates\r\nCinematic Clips, Shorts & Reels Completely Hands-Free\r\nIn 100s Of Language - In Just 60 Seconds\r\n\r\nhttps://bwzph2rqzdyw7vuh.site/MagicClipsAI?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nbecause we believe \r\nwhat we’re offering \r\nmay be relevant to you.\r\n\r\nIf you would prefer not to receive \r\nfuture messages from us, \r\nsimply \r\nunsubscribe:\r\n\r\nhttps://bwzph2rqzdyw7vuh.site/unsub?domain=tastiie.com \r\nAddress: Address: 7637   Ul. Lopuszanska 91, NA  02-232\r\nLooking out for you, Tonia Hedges.', '2026-01-03 12:27:58', '2026-01-03 12:27:58'),
(70, 'Andres', 'andres.smyth68@gmail.com', 'Why do some books sell millions of copies while others fail?\r\n\r\nThe answer isn\'t luck. It’s Psychology. \r\n\r\nThe book that currently dominates the charts—selling over 272 copies daily—was built on a very specific scientific foundation. It took deep behavioral principles and simplified them into \"Tiny\" steps.\r\n\r\nhttps://center303-center303.site/TinyActionBooks?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nas we believe \r\nour offer \r\nmay be relevant to you.\r\n\r\nIf you would prefer not to receive \r\nadditional emails from us, \r\nyou can \r\nstop receiving emails:\r\n\r\nhttps://center303-center303.site/unsub?domain=tastiie.com \r\nAddress: Address: 2076   42 Main Street, SA  5311\r\nLooking out for you, Andres Smyth.', '2026-01-03 14:19:21', '2026-01-03 14:19:21'),
(71, 'Shaun', 'quiros.shaun@gmail.com', 'Apple HATES This... But They Can\'t Stop Me From Showing You How I Built A Money-Making App In 12 Minutes\r\nNow I\'m Handing You The Exact System To Do The Same — Zero Coding Required\r\n\r\nhttps://bandardewi8.site/MeeloAppEmpire?tastiie.com\r\n\r\nYou are receiving this message \r\nbecause we think \r\nthis offer \r\ncould be relevant to you.\r\n\r\nIf you don’t want to receive \r\nany more messages from us, \r\nplease click here to \r\nunsubscribe from these emails:\r\n\r\nhttps://bandardewi8.site/unsub?domain=tastiie.com \r\nAddress: Address: 5081   5 West Street, ACT  2607\r\nLooking out for you, Shaun Quiros.', '2026-01-03 16:26:10', '2026-01-03 16:26:10'),
(72, 'Georgiana', 'devaney.georgiana@hotmail.com', 'World\'s First AI Agent Powered By ChatGPT-5…\r\nThat Writes And Ranks Anything We Want… On The First Page Of Google… With ZERO SEO. And Zero Ads… \r\n\r\nhttps://www.youtube.com/@AISolutionsTop', '2026-01-03 19:01:54', '2026-01-03 19:01:54'),
(73, 'Thaddeus', 'thaddeus.broome@msn.com', 'Imagine launching a viral, faceless \r\nYouTube, TikTok, or Instagram channel \r\nin just minutes...\r\n(And Then Your new Channel \r\nautomatically Creates AND posts videos FOR YOU...\r\nSo you NEVER HAVE TO TOUCH IT, AGAIN?)\r\n\r\nThis is 100% AUTOMATED, so once you set it up, you never have to lift a finger!\r\n\r\nhttps://cola52.site/TrafficSupernova?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nThis message is sent to you \r\nbecause we think \r\nthe offer we provide \r\ncould be useful to you.\r\n\r\nIf you do not wish to receive \r\nany more messages from us, \r\nsimply \r\nstop receiving emails:\r\n\r\nhttps://cola52.site/unsub?domain=tastiie.com \r\nAddress: Address: 4464   Torveplassen 47, NA  6409\r\nLooking out for you, Thaddeus Broome.', '2026-01-03 22:33:11', '2026-01-03 22:33:11'),
(74, 'Francesco', 'joel.fox.1965+tastiie.com@gmail.com', 'Trend Hunter AI gives you Real-Time Data \r\nTo Create Hot-Selling Amazon KDP eBooks \r\nThat Pay You Monthly Royalties for Years To come...\r\n\r\nhttps://cr1y5t.site/TrendHunterAI?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nsince we think \r\nthis offer \r\nmay be relevant to you.\r\n\r\nIf you no longer wish to get \r\nfuture messages from us, \r\nyou can \r\nstop receiving emails:\r\n\r\nhttps://cr1y5t.site/unsub?domain=tastiie.com \r\nAddress: Address: 3221   Skolevej 85, REGION SJALLAND  1862\r\nLooking out for you, Francesco Coates.', '2026-01-04 01:45:27', '2026-01-04 01:45:27'),
(75, 'Alberta', 'hook.alberta@googlemail.com', 'What If You Could Teach Any Topic Online...\r\nWithout Being a Subject Expert?\r\n\r\nhttps://connectwithseo.site/AIProfessor?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nbecause we think \r\nwhat we’re offering \r\ncould be useful to you.\r\n\r\nIf you do not wish to receive \r\nfuture messages from us, \r\nplease click here to \r\nunsubscribe:\r\n\r\nhttps://connectwithseo.site/unsub?domain=tastiie.com \r\nAddress: Address: 6651   Bleibtreustra?E 49, BW  78345\r\nLooking out for you, Alberta Hook.', '2026-01-04 02:48:22', '2026-01-04 02:48:22');
INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(76, 'Agustin', 'sales@tastiie.com', 'Hello there \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nThanks for your time, \r\n\r\nAgustin', '2026-01-06 18:43:54', '2026-01-06 18:43:54'),
(77, 'Elvin', 'elvin@tastiie.com', 'Tired of spending hours on your hair? Get professional results in minutes with Airluxe™.\r\n\r\nFor a limited time, enjoy exclusive savings on our entire collection—from high-tech hair dryers to precision shavers.\r\n\r\nClaim your exclusive discount now: https://clarimart.com\r\n\r\nHurry—once they’re gone, they’re gone!', '2026-01-12 19:47:35', '2026-01-12 19:47:35'),
(78, 'Kendall Sellers', 'podobiduc@mailinator.com', 'Marshmallow fruitcake carrot cake cupcake candy canes. Cheesecake soufflé donut cheesecake pastry. Icing caramels icing macaroon chupa chups chocolate bar tootsie roll jelly beans. Tart chocolate ice cream chupa chups tart muffin powder topping brownie. Gummies icing jelly chocolate cheesecake jelly-o candy. Pastry apple pie pudding gingerbread chocolate cake oat cake jujubes cookie. Sesame snaps sesame snaps bear claw cake macaroon halvah ice cream soufflé. Liquorice cake sesame snaps bear claw jujubes tart ice cream pudding. Marshmallow cupcake apple pie soufflé dragée chocolate bar. Fruitcake lollipop brownie jujubes tootsie roll macaroon. Ice cream marshmallow chocolate candy bonbon. Chocolate bar cupcake candy oat cake sweet roll.\r\nWafer jelly gummi bears bear claw jelly-o caramels donut tootsie roll. Gummies jelly-o halvah toffee apple pie muffin. Sweet roll tart cotton candy cake chupa chups. Jelly-o marshmallow pastry chocolate cake cookie biscuit chocolate cake. Tootsie roll halvah pastry lemon drops candy. Jujubes gummies tootsie roll oat cake cotton candy lemon drops. Chocolate pudding dessert sweet fruitcake sesame snaps marshmallow gummi bears. Chocolate cake candy canes shortbread powder sugar plum. Chocolate bar ice cream macaroon donut tiramisu dessert. Tart muffin gummies liquorice cake. Croissant muffin candy canes muffin pudding. Sesame snaps jelly-o croissant ice cream fruitcake cheesecake cupcake cake.\r\nCookie topping pudding chupa chups icing lemon drops liquorice cake. Dragée bear claw cheesecake marshmallow lollipop marzipan halvah powder candy canes. Cupcake gummi bears cake wafer cake icing chupa chups. Sweet muffin jelly-o gummies bonbon pastry macaroon liquorice gingerbread. Chocolate cake chocolate bar croissant brownie bonbon halvah tart. Gummies chupa chups carrot cake cotton candy cheesecake. Gummi bears tiramisu cake topping jelly jelly-o candy canes lollipop icing. Sesame snaps candy cupcake caramels candy pie pudding topping shortbread. Gummies gummi bears cake oat cake gummi bears gingerbread cake brownie pudding. Lollipop pudding carrot cake tiramisu bonbon sesame snaps pie cake. Pastry shortbread lollipop cookie sweet carrot cake oat cake. Marshmallow sweet roll oat cake dragée halvah jelly-o macaroon oat cake cake.\r\nDanish wafer cotton candy sweet apple pie. Brownie caramels cupcake caramels muffin caramels soufflé dessert. Bear claw marshmallow croissant cupcake topping bear claw apple pie. Chocolate brownie macaroon cookie topping tart. Icing oat cake bonbon chocolate cake liquorice donut lollipop cake sugar plum. Jelly jelly-o chocolate cake marzipan marzipan tart cookie chocolate bar. Sweet roll carrot cake jelly-o lemon drops apple pie cookie cheesecake icing muffin. Toffee croissant topping macaroon sesame snaps. Muffin chocolate bar bear claw chocolate pastry fruitcake candy canes chocolate liquorice. Croissant apple pie sesame snaps croissant cake tiramisu. Chocolate bar pie gingerbread cake gummi bears. Chupa chups apple pie halvah cupcake brownie gummies pastry chocolate macaroon. Cake topping cake bonbon biscuit powder candy canes biscuit candy.\r\nChocolate bar ice cream gingerbread gummies pie marshmallow jujubes candy canes. Gummies marshmallow candy topping chocolate bar chocolate sugar plum toffee apple pie. Gingerbread jelly-o gummies jujubes soufflé pastry gummi bears cake. Apple pie sugar plum apple pie jelly-o cake pastry brownie jelly. Bear claw dragée apple pie donut candy cake jelly beans. Tiramisu candy jelly-o sugar plum muffin chocolate bar sugar plum apple pie. Gingerbread sesame snaps cotton candy cookie chocolate tiramisu chocolate cake. Cookie wafer biscuit candy tootsie roll jelly beans cheesecake cheesecake dragée. Bear claw donut gingerbread caramels bear claw cake icing toffee. Oat cake fruitcake apple pie pastry tootsie roll jelly muffin carrot cake chocolate bar. Tiramisu muffin marzipan jelly bonbon danish pie chocolate. Wafer croissant sesame snaps cheesecake croissant donut shortbread jujubes cake. Sesame snaps danish jelly-o cake brownie pie shortbread powder. Tootsie roll halvah jujubes carrot cake jelly.', '2026-01-13 10:35:34', '2026-01-13 10:35:34'),
(79, 'Ferne', 'ferne.ocallaghan@yahoo.com', 'SoundSparkGenerator is a cloud-based tool that lets you create custom music styles in seconds by mixing genres, instruments, and vocal options. \r\n\r\nhttps://finsup.site/SoundSparkGenerator\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2026-01-21 11:23:52', '2026-01-21 11:23:52'),
(80, 'April', 'april.dash@googlemail.com', 'Book Ninja does everything for you in mINUTES,\r\nbuilding you a passive income for years to come...\r\nhttps://facommunication.site/BookNinja\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://facommunication.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2026-01-21 21:12:29', '2026-01-21 21:12:29'),
(81, 'Lourdes', 'lourdes.folse@yahoo.com', 'World\'s First AI App That Creates\r\nCinematic Clips, Shorts & Reels Completely Hands-Free\r\nIn 100s Of Language - In Just 60 Seconds\r\n\r\nhttps://fitgirlpack.site/MagicClipsAI\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://fitgirlpack.site/unsubscribe?domain=tastiie.com\r\nAddress: 209 West Street Comstock Park, MI 49321', '2026-01-22 00:25:54', '2026-01-22 00:25:54'),
(82, 'Stepanie', 'stepanie.buffington98@hotmail.com', 'Apple HATES This... But They Can\'t Stop Me From Showing You How I Built A Money-Making App In 12 Minutes\r\nNow I\'m Handing You The Exact System To Do The Same — Zero Coding Required\r\nhttps://hitclub66.site/MeeloAppEmpire\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou got this message because we assume it fits your field.  \r\nIf you would like to stop messages, please follow this link to UNSUBSCRIBE:  \r\nhttps://hitclub66.site/unsubscribe?domain=tastiie.com  \r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nBest, Ethan Parker', '2026-01-22 09:42:02', '2026-01-22 09:42:02'),
(83, 'Noelia', 'sales@tastiie.com', 'Hi, \r\n\r\nJust a quick heads-up — we’re running a short promotion on our EliteNook™ Premium Executive Office Chair right now.\r\n\r\nFree 2-5 day Fast Delivery: https://luxcollection.it.com\r\n\r\nThis chair is built for all-day comfort with ergonomic support, premium leather feel, and smooth swivel wheels — perfect for home or office work.\r\n\r\nWe have limited stock at this price + a short-time discount, so it’s worth a quick look.\r\n\r\nMany Thanks,\r\n\r\nEliteNook™ Team', '2026-01-22 20:32:18', '2026-01-22 20:32:18'),
(84, 'Karl', 'karl.winning@gmail.com', 'While you’re rotting away building complex funnels and burning cash on ads that don’t convert, Amazon is paying out over half a billion dollars in royalties to people who aren’t even \"writers\". You’re working too hard for pennies. Stop being a \"content slave\" and start building a digital asset portfolio that actually pays while you sleep. Book Ninja is an AI-powered beast that uses nine different tools to research, write, and design high-demand books in under 4 minutes.\r\nNo writing, no design skills, and zero marketing are required because Amazon already has the buyers waiting for you. Simply pick a niche, click a button, and upload your assets to Amazon, Etsy, or Shopify to start stacking royalties 24/7. Every day you hesitate is another day you are literally handing your share of that $520M to someone else who was faster than you. Stop wondering \"what if\" and start collecting—it\'s 100% risk-free for 30 days.\r\n\r\nhttps://jrvtns4nrv9jekfx.site/BookNinja?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nsince we believe \r\nthis offer \r\ncould be useful to you.\r\n\r\nIf you don’t want to receive \r\nfuture messages from us, \r\nsimply \r\nunsubscribe from these emails:\r\n\r\nhttps://jrvtns4nrv9jekfx.site/unsub?domain=tastiie.com \r\nAddress: Address: 8095   1380 Primrose Lane, WI  53703\r\nLooking out for you, Karl Winning.', '2026-01-27 12:05:52', '2026-01-27 12:05:52'),
(85, 'Rolland', 'stoll.rolland@msn.com', 'Stop kidding yourself. To a busy business owner, your \"SEO\" or \"Ads\" pitch is just more noise they’ve heard a thousand times. You’re begging for attention and getting ignored because you’re selling confusing services instead of providing instant, usable value. You aren\'t an authority; you\'re just another salesperson in their inbox.\r\nLocal Toolkit Fortune flips the script: you stop pitching and start owning the platform they actually use daily. We give you a complete, ready-to-launch website with 20 essential tools—like QR generators and Wi-Fi cards—that require zero technical skills or API keys. With 10 free tools to build trust and 10 premium tools to generate automated profits, you finally become the \"go-to\" resource instead of a desperate lead-chaser. \r\nGet Local Toolkit Fortune Now: https://nightbet.site/LocalToolkitFortune?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nbecause we believe \r\nour offer \r\ncould be useful to you.\r\n\r\nIf you don’t want to receive \r\nadditional emails from us, \r\nyou can \r\nopt out:\r\n\r\nhttps://nightbet.site/unsub?domain=tastiie.com \r\nAddress: Address: 3527   Midhraun 71, NA  210\r\nLooking out for you, Rolland Stoll.', '2026-01-27 21:06:07', '2026-01-27 21:06:07'),
(86, 'Aidan', 'aidan.whitehouse@gmail.com', 'Let’s be honest: your business is invisible because you have zero traffic. You’re wasting hours \"creating content\" and editing videos that nobody watches, while the pros are stealing all the views. Most marketers fail because they are tired of the grind. Stop trying to be a filmmaker and start using a shortcut that actually works while you sleep.\r\nI’m using a \"Secret Script\" that auto-creates viral shorts in my browser in seconds—no recording, no editing, and zero technical skills required. YouTube literally forces traffic to these videos, accounting for 90% of the views; I banked 678 visitors in 25 hours from a single \"lucky accident\". This is your last point of access to get 100s of daily visitors for a one-time payment of $17. Either grab this unfair advantage now or keep struggling with an empty shop.\r\nAccess the Script & Instructions Here: https://kotel.site/10SecondScrollTraffic?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nsince we believe \r\nwhat we’re offering \r\ncould be relevant to you.\r\n\r\nIf you don’t want to receive \r\nany more messages from us, \r\nplease click here to \r\nstop receiving emails:\r\n\r\nhttps://kotel.site/unsub?domain=tastiie.com \r\nAddress: Address: 5177   Netelaan 185, VWV  8670\r\nLooking out for you, Aidan Whitehouse.', '2026-01-27 21:58:23', '2026-01-27 21:58:23'),
(87, 'Maribel', 'joel.fox.1965+tastiie.com@gmail.com', 'Face it: you’re failing with AI video because you have no idea what to write. Powerful tools like Google Veo are a waste of money if you don\'t have the exact \"magic words\" to command them,. While you waste hours on trial and error, your competitors are using our 22,222 battle-tested prompts to churn out professional, jaw-dropping content in seconds,. You\'re either the one creating the content, or the one being replaced by it.\r\nStop being an amateur and take the shortcut. Mega Prompt Studio gives you the ultimate library of 100+ categories to dominate the market instantly,. Best of all? You get Full Private Label Rights, meaning you can resell this entire goldmine and keep 100% of the profit for yourself,. The price increases with every single sale—grab it now or pay more later.\r\n\r\nhttps://juj7pb.site/MegaPromptStudio?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nbecause we believe \r\nour offer \r\ncould be relevant to you.\r\n\r\nIf you no longer wish to get \r\nfurther communications from us, \r\nyou can \r\nunsubscribe:\r\n\r\nhttps://juj7pb.site/unsub?domain=tastiie.com \r\nAddress: Address: 3490   3466 Elmwood Avenue, PA  19714\r\nLooking out for you, Maribel Peebles.', '2026-01-28 11:40:39', '2026-01-28 11:40:39'),
(88, 'Santo', 'chapa.santo32@hotmail.com', 'Stop lying to yourself. If you’re stuck selling one-off products, you aren’t a business owner—you’re a slave to the next sale. Every single month, your bank account resets to zero, and you’re forced back onto the \"entrepreneurial hamster wheel\". It’s exhausting, it\'s demoralizing, and it’s stealing your financial freedom.\r\nThe R.A.P.I.D. TimeShift™ System is your only way out. It is a \"set-it-and-forget-it\" blueprint designed to build predictable monthly income that deposits money into your account like clockwork.\r\n\r\nGet Out of the Trap Here: https://indianxvideos.site/RapidRecurringRevenue?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nas we believe \r\nour offer \r\nmay be relevant to you.\r\n\r\nIf you would prefer not to receive \r\nadditional emails from us, \r\nyou can \r\nunsubscribe from these emails:\r\n\r\nhttps://indianxvideos.site/unsub?domain=tastiie.com \r\nAddress: Address: 7252   40 Rue Clement Marot, CENTRE  93380\r\nLooking out for you, Santo Chapa.', '2026-01-28 13:11:51', '2026-01-28 13:11:51'),
(89, 'Kiera', 'gabriele.kiera38@hotmail.com', 'Stop acting like a starving artist and wasting hours \"inventing demand\" for products nobody wants. While you’re stuck in \"prompt roulette\" and watching your generic listings stay flat for months, there is a $12.96 billion market laughing at your effort. You’re fighting for scraps because you’re starting from zero, while the pros are busy \"stealing\" an audience that is already obsessed and ready to buy.\r\nThe secret is the 80/20 Rule: 20% of public domain figures drive 80% of the sales. Easy AI Popular Figure Public Domain hands you the keys to this vault with 250 proven prompts and a Custom GPT that does 99% of the work for you. You can either keep screaming into the void with products that don\'t sell, or you can use our 2-step multiplier to hijack existing traffic and finally start winning.\r\nStop Guessing. Start Scaling: https://playfix.site/EasyAI?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nsince we believe \r\nthe offer we provide \r\ncould be relevant to you.\r\n\r\nIf you do not wish to receive \r\nfurther communications from us, \r\nyou can \r\nunsubscribe from these emails:\r\n\r\nhttps://playfix.site/unsub?domain=tastiie.com \r\nAddress: Address: 5823   4145 Pearl Street, CA  95742\r\nLooking out for you, Kiera Gabriele.', '2026-01-30 00:53:25', '2026-01-30 00:53:25'),
(90, 'Grady', 'grady.vigano@outlook.com', 'Stop letting the \"big players\" steal your commissions while you rot in affiliate rejection hell because you have no track record. You’re failing because you have no list, no YouTube channel, and no authority—and frankly, the industry doesn\'t care about your struggle. But for literally one single dollar, we are handing you guaranteed approval on a silver platter and giving you 100% front-end commissions so you can finally be in profit after your very first sale.\r\nIf you can’t invest the price of a cheap coffee to have a Top 5% affiliate promote your link for you, then quit now and stay broke. This is a completely hands-off, passive system where we do absolutely everything—no tech skills, no website, and zero promoting required from your side. The price is about to skyrocket to a realistic level, so either take fast action or keep watching others get rich.\r\nGET ACCESS FOR $1 NOW: https://luckyslots303.site/NewYearIncomeSystem?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nas we believe \r\nwhat we’re offering \r\ncould be useful to you.\r\n\r\nIf you would prefer not to receive \r\nfurther communications from us, \r\nyou can \r\nopt out:\r\n\r\nhttps://luckyslots303.site/unsub?domain=tastiie.com \r\nAddress: Address: 7647   1191 Delaware Avenue, CA  94143\r\nLooking out for you, Grady Vigano.', '2026-01-30 03:20:59', '2026-01-30 03:20:59'),
(91, 'Alexis', 'morford.alexis97@outlook.com', 'Stop over-complicating. Most \"AI tools\" are just more work for you to learn.\r\nReplic8 is different. It’s a fully built AI closing system that’s already trained to do the hard work: answering calls, following up, and booking appointments for businesses 24/7.\r\nThe pain for business owners is real: they spend 50k−100k on staff who miss calls, give attitude, or quit. You offer them a \"try before you buy\" freebie that actually works. Once they see the appointments rolling in, they won’t want to turn it off.\r\nThe Math:\r\n• No tech skills or sales experience needed.\r\n• Simple copy-paste setup.\r\n• $1,000/month per client in recurring income.\r\nAccess Replic8 Before the Rest Of The World Wakes Up: https://seofaucet.site/Replic8?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nas we think \r\nwhat we’re offering \r\nmay be relevant to you.\r\n\r\nIf you do not wish to receive \r\nany more messages from us, \r\nyou can \r\nunsubscribe from these emails:\r\n\r\nhttps://seofaucet.site/unsub?domain=tastiie.com \r\nAddress: Address: 7908   Scheidweg 6, NA  6487\r\nLooking out for you, Alexis Morford.', '2026-01-30 22:01:50', '2026-01-30 22:01:50'),
(92, 'Dario', 'dario.rinaldi@gmail.com', 'How much longer will you endure the \"soul-sucking\" 9-5 grind and the constant anxiety of unpaid bills while your life slips away? You are trapped in a rat race, wasting time on \"systems\" that fail while billionaires exploit the technology you should be using. It is time to stop being a victim of an annoying boss and start leveraging the same Facebook loophole that the giants use to generate massive results.\r\nCash Genie A.I. is your automated shortcut to freedom, doing all the heavy lifting for you without ads, SEO, or any technical headaches. This \"done-for-you\" system works on any device—even an old phone—and allows you to activate a secret link in just three simple steps to start siphoning passive commissions 24/7. Grab your access for a tiny one-time fee before the price skyrockets to a monthly subscription\r\n\r\nhttps://redirect1.site/CashGenieAI?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nsince we think \r\nour offer \r\nmight be of interest to you.\r\n\r\nIf you no longer wish to get \r\nfuture messages from us, \r\nsimply \r\nunsubscribe:\r\n\r\nhttps://redirect1.site/unsub?domain=tastiie.com \r\nAddress: Address: 6579   4017 Granville St, NS  B3k 5l2\r\nLooking out for you, Dario Rinaldi.', '2026-01-31 08:56:00', '2026-01-31 08:56:00'),
(93, 'Desiree', 'joel.fox.1965+tastiie.com@gmail.com', 'Stop lying to yourself. You’re drowning in manual outreach and editing \"fluffy\" AI garbage that editors reject in seconds. Every minute you waste wrestling with generic ChatGPT prompts is a minute your competitors are stealing your traffic, your rankings, and your commissions.\r\nThe Guest Post Affiliate Profits AI Suite is the only 3-step automated machine that actually delivers: it finds the blogs, crafts the perfect pitch, and writes approval-ready content for you. Grab the full PLR rights now and turn this into your own profit machine for a single, one-time payment—before the \"manual\" dinosaurs go extinct.\r\n\r\nhttps://selogel.site/GuestPost?domain=tastiie.com \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are getting this email \r\nbecause we think \r\nour offer \r\nmay be relevant to you.\r\n\r\nIf you would prefer not to receive \r\nfurther communications from us, \r\nsimply \r\nopt out:\r\nhttps://selogel.site/unsub?domain=tastiie.com \r\nAddress: Address: 7033   Eichendorffstr. 21, BW  88289\r\nLooking out for you, Desiree Wilhite.', '2026-01-31 14:41:24', '2026-01-31 14:41:24'),
(94, 'Kristofer', 'templeton.kristofer@gmail.com', 'Only 3 EASY Clicks- Smartly Create & Sell High Quality Images, 4K HD Videos, Smart AI ChatBot, SEO Friendly Content, High Converting Sales Copies, Stunning Graphics & Arts Etc to Hungry Audience For Top Dollars\r\n\r\nhttps://djfun2desi.site/AIModelSuite?tastiie.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://djfun2desi.site/unsubscribe?domain=tastiie.com\r\nAddress: 108 West Street Comstock Park, MI 48721', '2026-02-02 19:55:37', '2026-02-02 19:55:37'),
(95, 'Freddie', 'freddie.goode@gmail.com', 'STOP Selling One-Off Products That Pay You Once And START Building A \'Set It & Forget It\' System That Deposits Money Into Your Bank Account Every Single Month Like Clockwork! https://www.youtube.com/@AISolutionsTop', '2026-02-12 10:38:48', '2026-02-12 10:38:48'),
(96, 'Scotty', 'wrixon.scotty@hotmail.com', 'Launch your own branded Chrome extension in just 15 minutes with zero coding required to instantly elevate your professional authority. Use our proven templates to streamline your operations or deliver white-labeled solutions to clients for effortless recurring revenue.\r\nhttps://www.youtube.com/watch?v=ATYTVlN5MSM', '2026-02-15 01:54:46', '2026-02-15 01:54:46'),
(97, 'Junior', 'jamieson.junior@gmail.com', 'Tap into decades of super-affiliate expertise with an intelligent software that automates everything from strategy to high-converting copy in just a few clicks. Launch profitable affiliate campaigns across any niche and secure lifetime access with a single payment—no subscriptions or hidden fees required\r\nhttps://www.youtube.com/watch?v=GIWPFQOltPk', '2026-02-15 11:50:22', '2026-02-15 11:50:22'),
(98, 'Ramona', 'joel.fox.1965+tastiie.com@gmail.com', 'Create new automated passive income streams with Book Ninja, which uses AI to find profitable niches and fully assembles ready-to-publish books for Amazon in under 30 minutes. This is your chance to scale your business portfolio with digital assets that generate royalties for years without spending on ads, design, or writing.\r\nhttps://www.youtube.com/watch?v=PQCSucpPt-0', '2026-02-15 16:29:42', '2026-02-15 16:29:42'),
(99, 'Bettina', 'bettina.evers@gmail.com', 'Launch a Local Toolkit Website that Business Owners Use Daily, Builds Trust Fast, and Turns Free Value into Paid Upgrades on Autopilot. All Done-for-You, Automated and Ready to Go.\r\nhttps://www.youtube.com/watch?v=aOTUmzKLTwY', '2026-02-15 21:16:48', '2026-02-15 21:16:48'),
(100, 'Maryellen', 'maryellen.linn@googlemail.com', 'Skip months of hard work and launch a high-converting AI business today using this professionally designed \"Business In A Box\". With full Private Label Rights, you can rebrand these expert assets as your own and keep 100% of the profits from every sale.\r\nhttps://www.youtube.com/watch?v=ksq5cZApb3E', '2026-02-16 03:43:46', '2026-02-16 03:43:46'),
(101, 'Leona', 'leona.ballinger@gmail.com', 'Stop wasting months on content creation and start selling a professional, ready-to-use video course that positions you as an instant authority in the digital business space. This complete white-label package allows you to grow your email list and generate recurring income without spending a single minute on planning, scripting, or recording https://www.youtube.com/watch?v=ss4tux6Q4pI', '2026-02-16 15:49:54', '2026-02-16 15:49:54'),
(102, 'Wanda', 'wanda.vinci94@hotmail.com', 'Stop losing money on visitors who leave websites and start automatically redirecting that \"wasted\" traffic toward your own offers for as little as five cents per person. Exit Traffic Network provides a completely hands-free, set-it-and-forget-it system that captures real desktop traffic from established platforms while you sleep\r\nhttps://www.youtube.com/watch?v=3013L2Yxg1k', '2026-02-18 16:28:46', '2026-02-18 16:28:46'),
(103, 'Brenna', 'brenna.edens@gmail.com', 'Scale your authority and warm up high-value leads on LinkedIn by generating tone-perfect, professional comments in just five seconds,. Stay consistently visible to your target audience and grow your business safely without bots for only $5 a month,.\r\n\r\nhttps://www.youtube.com/watch?v=fnBU0pu0F_s', '2026-02-21 10:11:02', '2026-02-21 10:11:02'),
(104, 'Jane', 'jane.cuellar@yahoo.com', 'Stop wasting months on content creation and start scaling instantly with a ready-made library of 77 professional relationship eBooks you can rebrand and sell as your own. Gain full ownership of high-demand, evergreen assets with unrestricted PLR to power your memberships and coaching programs while keeping 100% of the profits.\r\n\r\nhttps://www.youtube.com/watch?v=TUQ7Rumq1ZA', '2026-02-21 20:19:26', '2026-02-21 20:19:26'),
(105, 'Robbin', 'robbin.lefanu@gmail.com', 'Automate your business training and customer education with human-like AI teachers that explain any topic without you ever having to appear on camera. Scale your company’s knowledge delivery 24/7 and eliminate the cost of hiring expensive instructors using this 100% automated teaching system.\r\n\r\nhttps://www.youtube.com/watch?v=mHujw2NMdIU', '2026-02-22 08:03:15', '2026-02-22 08:03:15'),
(106, 'Clara', 'clara.valenti@outlook.com', 'Scale your arbitrage operations instantly with FlipNinja’s AI, which automates the hunt for 50%–500% profit flips across Amazon, Walmart, and AliExpress. Secure an unfair data advantage for a one-time $17 investment and stop guessing where your next high-margin deal is coming from.\r\n\r\nhttps://www.youtube.com/watch?v=FgXeh1S8NXg', '2026-02-24 21:23:57', '2026-02-24 21:23:57'),
(107, 'Elyse', 'elyse.franki@msn.com', 'Stop wasting your budget on expensive ads and complex tech by implementing a 30-day AI-driven roadmap that automates 80% of your content creation and lead generation. Scale your business effortlessly using viral 5-second videos and proven conversion scripts to turn free traffic into consistent revenue for just $17,,,.\r\n\r\nhttps://www.youtube.com/watch?v=NTlA-HHd478', '2026-03-03 20:43:16', '2026-03-03 20:43:16'),
(108, 'Lasonya', 'sales@tastiie.com', 'Hey \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nBest regards, \r\n\r\nLasonya', '2026-03-10 12:09:30', '2026-03-10 12:09:30'),
(109, 'Ryan', 'sales@howden.bangeshop.com', 'Hi there, \r\n\r\nI hope this email finds you well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nThe bags are waterproof and anti-theft, and have a built-in USB cable that can recharge your phone while you\'re on the go.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nSincerely,\r\n\r\nRyan', '2026-03-11 19:05:43', '2026-03-11 19:05:43'),
(110, 'eden', 'eden@boost33.network', 'Bonjour \r\nSuite à notre échange sur LinkedIn, je me permets de revenir vers vous concernant le rendez-vous que nous devions planifier avec mon collègue paulina\r\nEntre-temps, j’ai pris le temps de regarder plus en détail votre activité et je suis convaincue qu’il y a une réelle opportunité de collaboration, notamment sur les sujets de structuration et de financement de la croissance.\r\nSi le sujet reste pertinent pour vous, je vous remets le lien afin de réserver un créneau de 15 minutes\r\nhttps://api.leadconnectorhq.com/widget/booking/rwrP7U6OSk4hnGQZCdyz \r\n\r\n\r\nBien cordialement,\r\n Eden — Boost33', '2026-03-12 14:42:02', '2026-03-12 14:42:02'),
(111, 'Sonam', 'sonam.rocetdigitaltech@gmail.com', 'Hi https://tastiie.com/,\r\n\r\nI noticed that your website has great potential but is not currently ranking in the top search results on Google.\r\n\r\nI specialize in SEO and can help your business rank in the Top 3 positions, get more visibility, and ultimately increase your customer base â€\" guaranteed!\r\n\r\nWould you like me to send a quick SEO proposal with pricing and strategies?\r\n\r\nBest regards,\r\nSonam', '2026-03-16 15:07:24', '2026-03-16 15:07:24'),
(112, 'Adelaide', 'mayon.adelaide@outlook.com', 'Are you tired of \"generic AI\" spitting out robotic, soulless text that readers instantly reject? Most aspiring publishers fail because they try to sell \"Wikipedia articles\" to parents who are searching for a lifeline at 2 AM, not a dry textbook,. You’re likely missing out on this recession-proof goldmine because you think you need a PhD or months of free time to write something that actually sells,. While you hesitate, the \"Generic AI\" gold rush is ending, and specialized niche dominators are taking over the 140-million-parent market.\r\n\r\nhttps://java138.site/ParentingRoyaltiesBot\r\n\r\nStop fighting the algorithm and start dominating with the Parenting Royalties Bot. We’ve stripped away the \"generalist\" fluff of ChatGPT to build a precision-engineered machine that writes with the emotional warmth and psychological depth of a family therapist,. For just $17.88, this bot handles the entire pipeline: it identifies high-demand topics, maps emotional arcs, creates five-star covers, and generates the exact keywords to stop the scroll,,. Claim your unfair advantage and go from a blank page to a published Amazon author in under 30 minutes before the launch price expires!,,.\r\n\r\nhttps://java138.site/ParentingRoyaltiesBot\r\n\r\nYou are receiving this message \r\nas we think \r\nthis offer \r\nmay be relevant to you.\r\n\r\nIf you would prefer not to receive \r\nany more messages from us, \r\nplease click here to \r\nstop receiving emails:\r\n\r\nhttps://java138.site/unsub?domain=tastiie.com \r\nAddress: Address: 8051   70 Cambridge Road, NA  Td15 4hy\r\nLooking out for you, Adelaide Mayon.', '2026-03-17 22:15:10', '2026-03-17 22:15:10'),
(113, 'Angelina', 'forest.angelina@yahoo.com', 'You’ve poured months of hard work and your entire soul into your manuscript, but the reality is harsh: your book is effectively \"invisible\" in the vast ocean of Amazon. You’re spending more time struggling with marketing and endless social media posting than actually writing, leading to total burnout. It’s soul-crushing to watch lower-quality books outrank yours simply because those authors have the time for promotion while you don\'t.\r\n\r\nhttps://ggplaybos.site/AISalesRocket\r\n\r\nAI Sales Rocket is your personal 24/7 traffic engine designed to take you from \"invisible to in-demand\". Using a \"Publish-Once-Promote-Everywhere\" system, the AI automatically generates fresh content and promotes your book across all social media accounts on total autopilot. Stop wasting energy on buggy scripts and broken promises; this is a robust, professional solution that keeps driving real traffic to your books day after day while you focus on your next masterpiece.\r\n\r\nhttps://ggplaybos.site/AISalesRocket\r\n\r\nThis message is sent to you \r\nas we think \r\nthe offer we provide \r\nmight be of interest to you.\r\n\r\nIf you would prefer not to receive \r\nany more messages from us, \r\nplease click here to \r\nunsubscribe:\r\n\r\nhttps://ggplaybos.site/unsub?domain=tastiie.com \r\nAddress: Address: 1395   Kurfuerstendamm 18, BW  74078\r\nLooking out for you, Angelina Forest.', '2026-03-18 17:45:56', '2026-03-18 17:45:56'),
(114, 'Ludie', 'viera.ludie60@msn.com', 'Hi,\r\n\r\nWhy you need this: to have every campaign, affiliate offer, or project start delivering traffic and income today — without spending a dime on ads or tech headaches. Ghost Pages turns you into a stealth engine that Google absolutely trusts: you build invisible pages using a secret Google asset, and they quietly start delivering targeted visitors — while your competition is nowhere the wiser.\r\n\r\nIt’s easy, it’s fast, it’s genius: no domains, hosting, social media, or technical skills required — if you can click and copy, you can do this. Plus, it really works and scales: launch one Ghost Page and BAM — traffic flows wherever you want: affiliate links, e‑com, leads — you choose. Ready to start in minutes? Discover how and get results that might blow your mind.\r\n\r\nSee it in action: https://deluna101a.site/GhostPages\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://deluna101a.site/unsub?domain=tastiie.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2026-03-19 00:19:32', '2026-03-19 00:19:32'),
(115, 'Shiela', 'newbigin.shiela@msn.com', 'Have you ever dreamed of breaking into the book market, only to be crushed by the reality of how hard it actually is? The \"old way\" of creating children\'s books is a total grind: you need to write a compelling story, find professional illustrators, and master complex design tools. For most people, creating just one personalized book takes days or even weeks, making it impossible to build a real, scalable business. This massive barrier to entry has kept you stuck on the sidelines while a few \"insiders\" dominate one of the hottest niches in the world.\r\n\r\nhttps://bookmarket.expert/StoryHero\r\n\r\nStoryHero shatters that barrier by using advanced AI to generate fully illustrated, personalized kids\' books in just 5 minutes. You no longer need writing skills, design experience, or a massive budget to tap into a market where parents gladly pay $20, $30, or even $50 for a single book. For a one-time investment of just $17, you get the exact tools and the $6 million case study that will allow you to stop accepting mediocrity and finally start building the life of your dreams.\r\n\r\nhttps://bookmarket.expert/StoryHero\r\n\r\nYou are receiving this message \r\nas we believe \r\nthis offer \r\nmay interest you.\r\n\r\nIf you don’t want to receive \r\nadditional emails from us, \r\nyou can \r\nstop receiving emails:\r\n\r\nhttps://bookmarket.expert/unsub?domain=tastiie.com \r\nAddress: Address: 8780   45 Oxford Rd, NA  Ba3 9jd\r\nLooking out for you, Shiela Newbigin.', '2026-03-19 07:10:48', '2026-03-19 07:10:48'),
(116, 'Fanny', 'sales@dumont.tidbuy.com', 'Morning \r\n \r\nIs your dog\'s nails getting too long? If you\'re tired of going to the vet or groomer to get them trimmed, why not try PawSafer™? \r\nWith PawSafer™, you can trim your dog\'s nails from the comfort of your own home, and it only takes a few minutes!\r\n\r\nPawSafer™ is the safest and most convenient way to trim your dog\'s nails, and it\'s very affordable. \r\n\r\nGet it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: https://tidbuy.com\r\n \r\nBest Wishes, \r\n \r\nFanny', '2026-03-22 15:50:39', '2026-03-22 15:50:39'),
(117, 'Kendall', 'sales@tastiie.com', 'Good day \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nAll the best, \r\n\r\nKendall', '2026-03-24 07:51:44', '2026-03-24 07:51:44'),
(118, 'Lisa', 'lisa.99seosolutionworld@gmail.com', 'Hello https://tastiie.com/,\r\n\r\nYour website has some SEO errors related to\r\npage speed, meta optimization, and indexing.\r\n\r\nWould you like the error details + solution plan?\r\nReply Yes or share your WhatsApp number.\r\n\r\nThank You,\r\nLisa', '2026-03-25 20:07:05', '2026-03-25 20:07:05'),
(119, 'Toni', 'toni.nicolle@msn.com', 'Are you still bleeding hundreds of dollars every month on expensive tools like Ahrefs or Semrush, only to spend hours manually fixing broken code? Most entrepreneurs and freelancers get bogged down in technical grunt work while their websites sink in search rankings due to hundreds of hidden SEO issues they don’t even know exist. Meanwhile, your competitors on Fiverr are charging $500 for basic reports that don’t actually fix anything, leaving business owners frustrated and profitless.\r\n\r\nhttps://www.novaai.expert/SEO-Pilot\r\n\r\nSEOPilot is your \"unfair advantage\" that turns complex SEO audits into a breeze: the software scans and auto-fixes hundreds of problems with a single click—no technical skills required. In just 10 minutes of work, you can invoice a client for 200–500, delivering professional-grade reports that make you look like a high-end agency. While others waste thousands on monthly subscriptions, you pay a one-time $27 fee and secure a ready-to-go business that pays for itself 10x over with your very first client.\r\n\r\nhttps://www.novaai.expert/SEO-Pilot\r\n\r\n\r\nYou received this notification \r\nsince we believe \r\nour offer \r\ncould be relevant to you.\r\n\r\nIf you do not wish to receive \r\nany more messages from us, \r\nyou can \r\nstop receiving emails:\r\n\r\nhttps://www.novaai.expert/unsub?domain=tastiie.com \r\nAddress: Address: 8402   Waldowstr. 60, BW  97980\r\nLooking out for you, Toni Nicolle.', '2026-04-09 15:55:06', '2026-04-09 15:55:06'),
(120, 'Marylyn', 'paton.marylyn@gmail.com', 'Are you still struggling to build a business from scratch, fighting Google’s algorithms, and burning your budget on paid ads? Most methods put you at the bottom of the pyramid—spending months writing content and setting up complex funnels, praying for a single sale. It’s an exhausting cycle of \"work for the sake of work,\" where one coding error or search engine update can wipe out your entire effort overnight.\r\n\r\nhttps://www.novaai.expert/BP-AI\r\n\r\nStop building and start inheriting. With the Buried Profits AI system, you grab \"dead\" digital assets (expired domains) for just $11 that already have the authority and backlinks others spent years building. Our AI rebuilds a fully functional, profitable site in under 10 minutes, allowing you to collect passive affiliate income or flip sites for 10x–50x profit without any technical skills. Why fight for traffic when you can own the traffic that’s already there?\r\n\r\nhttps://www.novaai.expert/BP-AI\r\n\r\n\r\nYou are receiving this message \r\nsince we think \r\nthis offer \r\nmight be of interest to you.\r\n\r\nIf you don’t want to receive \r\nany more messages from us, \r\nplease click here to \r\nopt out:\r\n\r\nhttps://www.novaai.expert/unsub?domain=tastiie.com \r\nAddress: Address: 1068   Karl-Liebknecht-Strasse 80, NI  27337\r\nLooking out for you, Marylyn Paton.', '2026-04-10 10:25:44', '2026-04-10 10:25:44'),
(121, 'Walter', 'briscoe.walter@googlemail.com', 'Hi,\r\n\r\nWhy you need this: to have every campaign, affiliate offer, or project start delivering traffic and income today — without spending a dime on ads or tech headaches. Ghost Pages turns you into a stealth engine that Google absolutely trusts: you build invisible pages using a secret Google asset, and they quietly start delivering targeted visitors — while your competition is nowhere the wiser.\r\n\r\nIt’s easy, it’s fast, it’s genius: no domains, hosting, social media, or technical skills required — if you can click and copy, you can do this. Plus, it really works and scales: launch one Ghost Page and BAM — traffic flows wherever you want: affiliate links, e‑com, leads — you choose. Ready to start in minutes? Discover how and get results that might blow your mind.\r\n\r\nSee it in action: https://www.novaai.expert/GhostPages\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsub?domain=tastiie.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2026-04-11 16:17:03', '2026-04-11 16:17:03');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` mediumtext NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Question 1', '<p>Les chefs sont des passionnés de cuisine talentueux sélectionnés par l’ancien chef étoilé Christian Conticini. Qu’ils aient des dizaines d’années d’expérience en restauration ou qu’ils soient en reconversion seul leur talent compte pour nous ! Nous les accompagnons pour qu’ils puissent développer leur activité, partager leur univers culinaire et vivre de leur passion 😊 Ils vous proposent leurs spécialités diverses et variées, souvent des recettes familiales, et toujours faites maison avec 100% de produits frais.</p>', 1, 1, '2025-02-19 07:03:50', '2025-02-19 07:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `site_favicon` varchar(255) DEFAULT NULL,
  `site_description` text DEFAULT NULL,
  `site_address` text DEFAULT NULL,
  `site_email` varchar(255) DEFAULT NULL,
  `site_phone` varchar(255) DEFAULT NULL,
  `site_copy_right` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `site_description`, `site_address`, `site_email`, `site_phone`, `site_copy_right`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Tastiie', 'setting/site_logo//QIE5egVvpEj2fBOyyochOon7I1llM7lnsNum7F1z.jpg', 'settings/site_favicon//muXYtS7J966zGPRGCwlXltMdrmUwDsNFFhOEZs1t.webp', '<p>Tastiie est un traiteur en ligne moderne qui transforme chaque repas en expérience gourmande. Commandez facilement vos plats faits maison directement depuis notre site.<br>&nbsp;</p>', 'France', 'tastiie@gmail.com', '01-80-89-40-27', '2025', 1, 1, '2025-02-27 12:49:32', '2025-11-26 16:29:35');

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

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(14, 'default', '{\"uuid\":\"639d5cdf-bdaf-45d3-81ce-17aad500a9f5\",\"displayName\":\"App\\\\Mail\\\\SendNewOrderEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:26:\\\"App\\\\Mail\\\\SendNewOrderEmail\\\":6:{s:12:\\\"viewOrderUrl\\\";s:28:\\\"https:\\/\\/tastiie.com\\/orders\\/7\\\";s:7:\\\"subject\\\";s:16:\\\"New Order Placed\\\";s:7:\\\"content\\\";s:270:\\\"\\n            <h3>Hello, Mishael PALMA<\\/h3>\\n            <p>Your order has been placed successfully<\\/p>\\n            <p><strong>Order No:<\\/strong> 665486<\\/p>\\n            <p><strong>Total Amount:<\\/strong> $1.00<\\/p>\\n            <p>Thank you for shopping with us!<\\/p>\\n        \\\";s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:1:{i:0;s:4:\\\"user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"lenombretrois@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1763990352, 1763990352),
(15, 'default', '{\"uuid\":\"374be3a4-68ce-4198-915b-13555f39b5f8\",\"displayName\":\"App\\\\Mail\\\\SendNewOrderEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:26:\\\"App\\\\Mail\\\\SendNewOrderEmail\\\":6:{s:12:\\\"viewOrderUrl\\\";s:28:\\\"https:\\/\\/tastiie.com\\/orders\\/7\\\";s:7:\\\"subject\\\";s:18:\\\"New Order Received\\\";s:7:\\\"content\\\";s:225:\\\"\\n                <h3>Hello, Super Admin<\\/h3>\\n                <p>A new order has been placed<\\/p>\\n                <p><strong>Order No:<\\/strong> 665486<\\/p>\\n                <p><strong>Total Amount:<\\/strong> $1.00<\\/p>\\n            \\\";s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:1:{i:0;s:4:\\\"user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1763990352, 1763990352),
(16, 'default', '{\"uuid\":\"188e2149-d376-4dcb-843a-3cc7c88f6143\",\"displayName\":\"App\\\\Mail\\\\SendNewOrderEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:26:\\\"App\\\\Mail\\\\SendNewOrderEmail\\\":6:{s:12:\\\"viewOrderUrl\\\";s:28:\\\"https:\\/\\/tastiie.com\\/orders\\/8\\\";s:7:\\\"subject\\\";s:16:\\\"New Order Placed\\\";s:7:\\\"content\\\";s:270:\\\"\\n            <h3>Hello, Mishael PALMA<\\/h3>\\n            <p>Your order has been placed successfully<\\/p>\\n            <p><strong>Order No:<\\/strong> 418592<\\/p>\\n            <p><strong>Total Amount:<\\/strong> $3.20<\\/p>\\n            <p>Thank you for shopping with us!<\\/p>\\n        \\\";s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:4:\\\"user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"lenombretrois@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1775734213, 1775734213),
(17, 'default', '{\"uuid\":\"8aecdaea-7a08-4164-83b3-85ef86f72bb4\",\"displayName\":\"App\\\\Mail\\\\SendNewOrderEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:26:\\\"App\\\\Mail\\\\SendNewOrderEmail\\\":6:{s:12:\\\"viewOrderUrl\\\";s:28:\\\"https:\\/\\/tastiie.com\\/orders\\/8\\\";s:7:\\\"subject\\\";s:18:\\\"New Order Received\\\";s:7:\\\"content\\\";s:225:\\\"\\n                <h3>Hello, Super Admin<\\/h3>\\n                <p>A new order has been placed<\\/p>\\n                <p><strong>Order No:<\\/strong> 418592<\\/p>\\n                <p><strong>Total Amount:<\\/strong> $3.20<\\/p>\\n            \\\";s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:4:\\\"user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:19:\\\"mishael@tastiie.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1775734213, 1775734213);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_12_161806_add_two_factor_columns_to_users_table', 1),
(5, '2025_02_12_162305_create_permission_tables', 1),
(6, '2025_02_19_093137_create_sections_table', 2),
(7, '2025_02_19_110920_create_faqs_table', 3),
(8, '2025_02_19_125129_create_blog_categories_table', 4),
(9, '2025_02_19_125139_create_blogs_table', 4),
(10, '2025_01_27_074811_create_general_settings_table', 5),
(11, '2025_01_27_161323_create_social_links_table', 5),
(12, '2025_02_20_095524_create_categories_table', 6),
(15, '2025_02_20_083114_create_newsletter_subscriptions_table', 7),
(16, '2025_02_24_125906_create_products_table', 7),
(17, '2025_02_25_141606_create_add_to_carts_table', 8),
(18, '2025_02_25_154801_create_notifications_table', 9),
(19, '2025_02_26_072554_create_orders_table', 10),
(20, '2025_02_26_072613_create_order_items_table', 10),
(21, '2025_02_26_072757_create_order_payments_table', 10),
(22, '2025_02_26_074201_create_shipping_addresses_table', 10),
(24, '2025_03_04_122027_create_product_reviews_table', 12),
(25, '2025_03_11_083027_create_contacts_table', 13),
(26, '2025_03_14_151750_add_col_to_users_table', 14),
(27, '2025_02_28_113239_create_product_availabilities_table', 15),
(28, '2025_03_17_075317_update_product_availabilities_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 35),
(2, 'App\\Models\\User', 37),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41),
(2, 'App\\Models\\User', 51),
(2, 'App\\Models\\User', 55),
(1, 'App\\Models\\User', 56);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscriptions`
--

CREATE TABLE `newsletter_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscriptions`
--

INSERT INTO `newsletter_subscriptions` (`id`, `name`, `email`, `is_subscribed`, `created_at`, `updated_at`) VALUES
(1, 'Shahzad', 'shahzadusman721@gmail.com', 1, '2025-03-07 09:58:52', '2025-03-07 09:58:52'),
(2, 'NATREGTEGH146912NERTYTRY', 'ilmlhecq@ronaldofmail.com', 1, '2025-06-08 12:53:41', '2025-06-08 12:53:41'),
(3, 'NAEWTRER146912NEHTYHYHTR', 'pjlkzmbi@bonjourfmail.com', 1, '2025-06-11 21:55:40', '2025-06-11 21:55:40'),
(4, 'NARYTHY347515NEYRTHYT', 'bsotkaea@bonsoirmail.com', 1, '2025-06-27 21:32:37', '2025-06-27 21:32:37'),
(5, 'NATREGTEGH431088NERTHRTYHR', 'hisgtxif@bonjourfmail.com', 1, '2025-06-29 01:58:19', '2025-06-29 01:58:19'),
(6, '* * * Unlock Free Spins Today: https://puzzlesandportraits.com/index.php?wehi4u * * * hs=8af37422a24eae2a9f78d6a709f93215* ххх*', 'pazapz@mailbox.in.ua', 1, '2025-07-09 09:55:48', '2025-07-09 09:55:48'),
(8, 'umhkfoqelq', 'suhlivdf@testform.xyz', 1, '2025-08-01 05:15:38', '2025-08-01 05:15:38'),
(9, 'koqqkjznog', 'ygsqkxox@testform.xyz', 1, '2025-08-01 05:15:39', '2025-08-01 05:15:39'),
(10, 'fwyzhsjofq', 'pzexojdf@testform.xyz', 1, '2025-08-01 05:15:40', '2025-08-01 05:15:40'),
(11, 'juffsnxfop', 'ireqpgiu@testform.xyz', 1, '2025-08-26 06:50:53', '2025-08-26 06:50:53'),
(12, 'rkygvszvvq', 'qvtndhpl@testform.xyz', 1, '2025-08-26 06:50:53', '2025-08-26 06:50:53'),
(13, 'NAERTREGE862976NERTHRTYHR', 'xslfbjbo@tubermail.com', 1, '2025-09-14 08:39:26', '2025-09-14 08:39:26'),
(14, 'cSaCezFOSV', 'naxevila586@gmail.com', 1, '2025-10-05 12:57:25', '2025-10-05 12:57:25'),
(15, 'fJRPqhxDDpBbOx', 'nusalocapal706@gmail.com', 1, '2025-10-06 10:43:27', '2025-10-06 10:43:27'),
(16, 'LUvLXeapvLiA', 'upezirijo46@gmail.com', 1, '2025-10-14 06:23:57', '2025-10-14 06:23:57'),
(17, 'CzPaXUosG', 'akepayah28@gmail.com', 1, '2025-10-16 13:05:00', '2025-10-16 13:05:00'),
(18, 'wlGfdmEslaFwv', 'aboyoduricad74@gmail.com', 1, '2025-10-19 11:21:54', '2025-10-19 11:21:54'),
(19, 'xtdwEMWmqjmhgTywsunoNB', 'rebekkeinnpvg4@gmail.com', 1, '2025-10-25 05:25:39', '2025-10-25 05:25:39'),
(20, 'qZfFzZJdviCGJGPkRMEiCSx', 'djoselainhensonaz1999@gmail.com', 1, '2025-10-27 05:49:49', '2025-10-27 05:49:49'),
(21, 'YpbjFdQukDROodYfo', 'datozorisi59@gmail.com', 1, '2025-10-30 02:34:47', '2025-10-30 02:34:47'),
(22, 'dYhQBDCiMmxMuRxyvXcL', 'tolicedu22@gmail.com', 1, '2025-10-31 14:10:25', '2025-10-31 14:10:25'),
(23, 'tastiie', 'fovay99123@wivstore.com', 1, '2025-11-03 14:31:04', '2025-11-03 14:31:04'),
(24, 'DZCycGWQlzwAdGXE', 'punacozedefe09@gmail.com', 1, '2025-11-17 10:09:27', '2025-11-17 10:09:27'),
(25, 'Flash', 'contact@flashfootball.org', 1, '2025-11-20 11:41:36', '2025-11-20 11:41:36'),
(26, 'NATREGTEGH1860732NERTHRRTH', 'vkvnpfud@fringmail.com', 1, '2025-11-24 03:30:36', '2025-11-24 03:30:36'),
(27, 'hnqyouuvyx', 'gkrjktoe@checkyourform.xyz', 1, '2026-02-22 23:54:25', '2026-02-22 23:54:25'),
(28, 'zdgpkywqmo', 'xmgfhrxx@checkyourform.xyz', 1, '2026-02-22 23:54:28', '2026-02-22 23:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0a32ac91-4bff-462e-843f-639219b7e95e', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"patrick boucaud\"}', NULL, '2025-11-21 09:53:25', '2025-11-21 09:53:25'),
('10ce7f08-b271-46a0-b92e-4bd106d18074', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"LGqUjQhdXdUOz vkvYgGkp\"}', NULL, '2025-10-19 11:21:12', '2025-10-19 11:21:12'),
('1396f0d4-4c9e-4eaf-bcda-9e99200c5c6f', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"luca platm\"}', NULL, '2026-04-09 13:09:17', '2026-04-09 13:09:17'),
('14b0bc08-9117-47a0-8354-28b0b6f6a71d', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"ElDOJWamMvGsviwQXXL PTzsZUMCZgJMNlUdUhzFF\"}', NULL, '2025-10-31 14:09:13', '2025-10-31 14:09:13'),
('1604a3a9-1ff6-4679-b0a5-728414e7f855', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"xsdfmdyrip vttydhsjko\"}', NULL, '2025-08-01 05:15:43', '2025-08-01 05:15:43'),
('20ab21b3-52b2-4e71-82e7-72b328ebc88c', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"MbiaFQKsXweRtEIaYBcw LlPXgpoObBpWGBsX\"}', NULL, '2026-02-11 23:32:57', '2026-02-11 23:32:57'),
('21cfd875-ba69-40cf-b7e3-0e0addbb7d7b', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Ak Villain\"}', NULL, '2025-11-21 16:22:24', '2025-11-21 16:22:24'),
('2323febb-4ee5-4a67-ab94-233a916301cb', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Ahsan Khan\"}', NULL, '2026-04-14 14:17:42', '2026-04-14 14:17:42'),
('286541fb-9c36-4c53-b8c6-6396c11231ee', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"new_order_created\",\"message\":\"new_order_notification\",\"data\":\"Order number: 970381\"}', NULL, '2025-10-03 12:57:44', '2025-10-03 12:57:44'),
('296658d4-7a36-40ba-97c7-b946ce2b38e7', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Aspen Christian\"}', NULL, '2026-01-13 10:36:39', '2026-01-13 10:36:39'),
('2a84d6ca-74bb-41e0-b314-e84a70155e95', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"equicJet equicJet\"}', NULL, '2025-12-08 07:38:56', '2025-12-08 07:38:56'),
('33be0199-67be-4a22-8def-4d48f5e8f6d9', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Mohamed MOUSSA\"}', NULL, '2025-11-21 15:24:04', '2025-11-21 15:24:04'),
('39316156-db97-4396-b761-710d95ac403c', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"new_order_created\",\"message\":\"new_order_notification\",\"data\":\"Order number: 130657\"}', NULL, '2025-03-07 10:50:48', '2025-03-07 10:50:48'),
('3ff75d0d-5fb7-4b1c-930a-c12c411a5ecd', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"obhCOZrHmKlVjPdV tuWDhWJIDKulVlcu\"}', NULL, '2025-12-09 09:55:12', '2025-12-09 09:55:12'),
('43e35259-e0d9-42e9-80c7-af404e621567', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"EiXZPtUurVt yPbmJUwyNE\"}', NULL, '2025-10-14 06:24:13', '2025-10-14 06:24:13'),
('44cd0176-6b2c-45e1-9ce7-fbb9a12ad75b', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"new_order_created\",\"message\":\"new_order_notification\",\"data\":\"Order number: 244789\"}', NULL, '2025-10-03 14:15:07', '2025-10-03 14:15:07'),
('4db2c08c-c768-40bc-a08e-8c25da93438c', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"samy sarah\"}', NULL, '2026-04-09 13:14:45', '2026-04-09 13:14:45'),
('56aa049c-ac63-4122-adb0-60d477840d7e', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Mohamed MOUSSA\"}', '2025-03-18 13:03:15', '2025-03-14 13:16:42', '2025-03-18 13:03:15'),
('5fdd0d5f-ac3a-46fd-9fb0-0faa4d1ed571', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Moin Ahmad\"}', NULL, '2025-03-05 14:31:53', '2025-03-05 14:31:53'),
('62e349ed-8051-481a-86a0-4779619b45e9', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"tUgNlbYIxsCR fOguNUDqQqzhO\"}', NULL, '2025-10-06 10:42:55', '2025-10-06 10:42:55'),
('64e3ec46-4352-4f2a-84c0-eec2b633dad3', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"IuKEqEFI lYLODWpXbDJEDjV\"}', NULL, '2025-10-05 12:56:48', '2025-10-05 12:56:48'),
('67bdd188-83e0-4cdd-b817-96c3db86fb68', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"new_order_created\",\"message\":\"new_order_notification\",\"data\":\"Order number: 439454\"}', NULL, '2025-03-07 14:51:01', '2025-03-07 14:51:01'),
('6adfeae1-67b5-413f-93d9-aa56097e617c', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"new_order_created\",\"message\":\"new_order_notification\",\"data\":\"Order number: 418592\"}', NULL, '2026-04-09 13:30:13', '2026-04-09 13:30:13'),
('75fcdcd6-a7d7-4122-821e-3c2ae009b888', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\" \"}', NULL, '2025-09-10 04:15:57', '2025-09-10 04:15:57'),
('80849236-08c8-451e-9a59-09299faeedce', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"uTKvaVtCYRofguxVVO moHKgBUEzoGaWUWVTQ\"}', NULL, '2025-10-30 02:33:50', '2025-10-30 02:33:50'),
('82bda2b9-211f-456f-9813-452e74009a4d', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"yRIFgnJNQDSkPmioJDqKjA sQLTcwhdymRqgxgvlYwO\"}', NULL, '2025-10-27 05:49:04', '2025-10-27 05:49:04'),
('84a72aed-2018-411b-b641-4cc3bcaaeef0', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"patrick boucaud\"}', NULL, '2025-10-30 12:22:11', '2025-10-30 12:22:11'),
('869da097-4011-43a7-923c-ca4b411bbe66', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"ahsan shahzad\"}', NULL, '2025-10-02 11:46:06', '2025-10-02 11:46:06'),
('86ee6e72-4a81-466b-a52c-ad1c812738c4', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Mo \"}', NULL, '2025-11-21 15:22:50', '2025-11-21 15:22:50'),
('9124e961-d788-4e96-8c81-722c52c0f04c', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\" \"}', NULL, '2025-09-29 18:02:00', '2025-09-29 18:02:00'),
('914b1b6a-17e8-4201-84e4-6dbcc67d86bc', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"equicJet equicJet\"}', NULL, '2025-11-29 05:31:39', '2025-11-29 05:31:39'),
('9715353e-87d2-4961-b97d-92093c3c0409', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"moin ahmad\"}', NULL, '2025-03-06 12:51:49', '2025-03-06 12:51:49'),
('9bf82fae-3b97-47a6-8100-7f8217f07816', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"ffijdrudpz pnjudhywxe\"}', NULL, '2025-08-01 05:15:41', '2025-08-01 05:15:41'),
('9f32b52c-ab6f-49c0-ae84-5c7c86bed8f6', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"paul le\"}', NULL, '2025-10-31 10:01:05', '2025-10-31 10:01:05'),
('a5f049f0-b2c9-42d8-8390-a1dd29105697', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"test test\"}', '2025-03-18 13:03:11', '2025-03-12 12:28:27', '2025-03-18 13:03:11'),
('aa60fbd7-8086-4521-91de-7cdb8ed260b0', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"qelesynkil ozluszpdfv\"}', NULL, '2025-06-21 08:00:04', '2025-06-21 08:00:04'),
('af571403-6075-4879-971a-5765503e0941', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"new_order_created\",\"message\":\"new_order_notification\",\"data\":\"Order number: 872258\"}', NULL, '2025-03-07 10:56:31', '2025-03-07 10:56:31'),
('b130bbd2-abe3-47dc-bf25-03396252eec5', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"kiyeeqdvzm pedoqzwquz\"}', NULL, '2026-02-22 23:54:25', '2026-02-22 23:54:25'),
('b22d4b36-e436-4d50-acda-2ab50a9345aa', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"JOkLZiMEcJtcOzsfFulIRB IlqZPivcUtTsqwQtNAMCLrnn\"}', NULL, '2025-12-20 01:47:09', '2025-12-20 01:47:09'),
('b864af20-474a-47d4-9e75-dc2a8808a5ab', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"new_order_created\",\"message\":\"new_order_notification\",\"data\":\"Order number: 665486\"}', NULL, '2025-11-24 14:19:12', '2025-11-24 14:19:12'),
('ba37d686-e471-4911-8530-68b27371f8dc', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Support exoux\"}', NULL, '2025-11-21 15:04:30', '2025-11-21 15:04:30'),
('c6d3e60f-d6d3-47cf-b982-2c88c4f5447f', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"FjHuEaAwykKRJJvLAGvXb rbndtIvzxKluNBWYXYsEl\"}', NULL, '2025-10-25 05:25:57', '2025-10-25 05:25:57'),
('c8edcde8-f2b4-4e60-a5fc-b9b8f3255c57', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"equicJet equicJet\"}', NULL, '2025-11-28 02:32:32', '2025-11-28 02:32:32'),
('d0e1d717-92f0-4d78-a9c3-7a2e42b434c3', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Yuri Mishael\"}', NULL, '2026-04-09 12:57:26', '2026-04-09 12:57:26'),
('d1472d7d-508e-413b-8e65-479ca548163e', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Syed Ahmad\"}', '2025-02-26 16:08:55', '2025-02-26 16:08:38', '2025-02-26 16:08:55'),
('d16c9e52-e022-4001-9fbb-9ddcefcec773', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"mwestjtgdj hqdmmrwmqk\"}', NULL, '2025-08-26 06:50:57', '2025-08-26 06:50:57'),
('d914468d-a288-4340-a408-ca88b51b2657', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Ahsan Shahzad\"}', NULL, '2026-04-09 14:02:56', '2026-04-09 14:02:56'),
('db4eed3f-cd30-4529-9010-ebedb22edcd6', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Abdul Rahman\"}', NULL, '2025-11-06 12:59:26', '2025-11-06 12:59:26'),
('ddfe456f-5d4b-4681-803e-10f6e252d70f', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"nHfncYhVpMKtiJjJbmWr uSIqejDilmOoCIINJHcIe\"}', NULL, '2025-11-17 10:09:48', '2025-11-17 10:09:48'),
('de4eaad6-9d88-4cfa-a1ee-3eaa0ad7a242', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"type\":\"new_order_created\",\"message\":\"new_order_notification\",\"data\":\"Order number: 976443\"}', NULL, '2025-10-02 11:53:33', '2025-10-02 11:53:33'),
('e13f8131-f597-4c72-9aaa-3708a7d83aff', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Mishael PALMA\"}', NULL, '2025-11-21 14:31:17', '2025-11-21 14:31:17'),
('ed4c2bd3-43b5-447c-a79f-6eef653e7ab4', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"uwyfukzxik pnznusmtvx\"}', NULL, '2026-02-22 23:54:26', '2026-02-22 23:54:26'),
('ee478b05-c16b-4a84-8c3a-d7a7b930bb77', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"dvvshtsrnn qegynikmnt\"}', NULL, '2025-08-01 05:15:48', '2025-08-01 05:15:48'),
('fe145d2b-b0ff-461b-900e-c8aa24937596', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"PGxeqIGX cJPVdEqpRrcYmY\"}', NULL, '2025-10-16 13:04:20', '2025-10-16 13:04:20'),
('fea0aa58-f15a-4022-80cb-2c0217d273df', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"fvvrsqfify wdijldnskf\"}', NULL, '2025-08-26 06:50:57', '2025-08-26 06:50:57'),
('ff711dda-b493-4c86-a8ac-87557c73045d', 'App\\Notifications\\NewUserNotification', 'App\\Models\\User', 1, '{\"type\":\"new_user_created\",\"message\":\"new_user_notification\",\"data\":\"Mohamed MOUSSA\"}', NULL, '2025-11-21 15:23:19', '2025-11-21 15:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `extra_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`extra_data`)),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `payment_method`, `payment_status`, `discount`, `shipping`, `total_amount`, `date`, `note`, `extra_data`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '130657', 'stripe', 'paid', 0.00, 0.00, 8.90, NULL, NULL, NULL, 1, 'pending', '2025-03-07 10:50:48', '2025-03-07 10:50:48'),
(2, '872258', 'stripe', 'paid', 0.00, 0.00, 8.90, NULL, NULL, NULL, 1, 'pending', '2025-03-07 10:56:31', '2025-03-07 10:56:31'),
(3, '439454', 'stripe', 'paid', 0.00, 0.00, 1000.00, NULL, NULL, NULL, 1, 'pending', '2025-03-07 14:51:01', '2025-03-07 14:51:01'),
(6, '244789', 'stripe', 'paid', 0.00, 0.00, 1.00, NULL, NULL, NULL, 1, 'pending', '2025-10-03 14:15:07', '2025-10-03 14:15:07'),
(7, '665486', 'stripe', 'paid', 0.00, 0.00, 1.00, NULL, NULL, NULL, 36, 'pending', '2025-11-24 14:19:12', '2025-11-24 14:19:12'),
(8, '418592', 'stripe', 'paid', 0.00, 0.00, 3.20, NULL, NULL, NULL, 36, 'pending', '2026-04-09 13:30:13', '2026-04-09 13:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL COMMENT 'calculated as quantity * price',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 8.90, 8.90, '2025-03-07 10:50:48', '2025-03-07 10:50:48'),
(2, 2, 5, 1, 8.90, 8.90, '2025-03-07 10:56:31', '2025-03-07 10:56:31'),
(3, 3, 12, 1, 1000.00, 1000.00, '2025-03-07 14:51:01', '2025-03-07 14:51:01'),
(6, 6, 5, 1, 1.00, 1.00, '2025-10-03 14:15:07', '2025-10-03 14:15:07'),
(7, 7, 5, 1, 1.00, 1.00, '2025-11-24 14:19:12', '2025-11-24 14:19:12'),
(8, 8, 164, 1, 3.20, 3.20, '2026-04-09 13:30:13', '2026-04-09 13:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `order_id`, `amount`, `payment_method`, `payment_status`, `transaction_id`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, 1, 8.90, 'stripe', 'paid', 'pi_3QzyUKP4AdMdMzDE1NG3brbh', '2025-03-07 10:50:48', '2025-03-07 10:50:48', '2025-03-07 10:50:48'),
(2, 2, 8.90, 'stripe', 'paid', 'pi_3QzyZrP4AdMdMzDE19YkiZSy', '2025-03-07 10:56:31', '2025-03-07 10:56:31', '2025-03-07 10:56:31'),
(3, 3, 1000.00, 'stripe', 'paid', 'pi_3R02EoP4AdMdMzDE1fjwHc3a', '2025-03-07 14:51:01', '2025-03-07 14:51:01', '2025-03-07 14:51:01'),
(6, 6, 1.00, 'stripe', 'paid', 'pi_3SE9lER3WmzqfZqQ2IxaUnQB', '2025-10-03 14:15:07', '2025-10-03 14:15:07', '2025-10-03 14:15:07'),
(7, 7, 1.00, 'stripe', 'paid', 'pi_3SWzfZJB8eqpCnqT0EmUSWii', '2025-11-24 14:19:12', '2025-11-24 14:19:12', '2025-11-24 14:19:12'),
(8, 8, 3.20, 'stripe', 'paid', 'pi_3TKGmeJB8eqpCnqT1ZyANj1Q', '2026-04-09 13:30:13', '2026-04-09 13:30:13', '2026-04-09 13:30:13');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` text DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `allergens` text DEFAULT NULL,
  `preparation_advice` text DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `nutritional_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`nutritional_values`)),
  `dietary_preferences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dietary_preferences`)),
  `expiry_date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `short_description`, `ingredients`, `allergens`, `preparation_advice`, `weight`, `nutritional_values`, `dietary_preferences`, `expiry_date`, `image`, `status`, `quantity`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Flan aux champignons', 1.00, 4, '<p>Flan aux champignons</p>', '<p>Shiitake, champignon de Paris, échalote, carotte, brocoli, oeuf, crème fraîche</p>', '<p>Non</p>', '<p>Chauffer 2 minutes au microonde</p>', '100g', '\"[{\\\"name\\\":\\\"Carbs\\\",\\\"value\\\":\\\"10\\\",\\\"unit\\\":\\\"g\\\"},{\\\"name\\\":\\\"Proteins\\\",\\\"value\\\":\\\"20\\\",\\\"unit\\\":\\\"g\\\"}]\"', '\"[\\\"V\\\\u00e9g\\\\u00e9tarien\\\"]\"', '2025-12-10', 'products/WlJVK60OAVgAEgxAdo8CsYDdVoGSMPQPmYjK5Yvk.png', 1, 16, 1, 1, '2025-03-06 14:13:40', '2026-02-11 20:51:18'),
(8, 'Boeuf braisé au romarin', 8.90, 2, '<p>Bœuf braisé au romarin, pommes de terre persillées&nbsp;</p>', '<p>Bœuf, carottes, pomme de terre, tomate, persil, oignon, thym, romarin, sel, poivre&nbsp;</p>', '<p>Non</p>', '<p>Chauffer 3 minutes au microondes</p>', '390G', '\"[{\\\"name\\\":\\\"Protein\\\",\\\"value\\\":\\\"gr\\\",\\\"unit\\\":\\\"30\\\"}]\"', '\"[\\\"Halal\\\"]\"', '2025-12-10', 'products/W7wl9jyaUpUxnblM0n22PxYMBvOD4bHPfWCEOhKJ.jpg', 1, 8, 1, 1, '2025-03-07 11:46:17', '2025-10-03 12:57:44'),
(9, 'Filet de lieu noir riso légumes de soleil', 9.90, 2, '<p>Filet de lieu noir riso légumes de soleil</p>', '<p>Filet de lieu noir, riso, tomate, oignon, ail, carotte, courgette, persil, thym, romarin, sel, poivre, curry</p>', '<p>Non</p>', '<p>froid, chauffer 3 minutes au microondes</p>', '390g', '\"[{\\\"name\\\":\\\"Protein\\\",\\\"value\\\":\\\"20\\\",\\\"unit\\\":\\\"Gr\\\"}]\"', '\"null\"', '2025-12-10', 'products/oV6ymbUvU63hCrwVEPHcvbqyzz167uq8qfWBkK5x.jpg', 1, 10, 1, 1, '2025-03-07 12:02:54', '2025-09-08 11:04:52'),
(10, 'Salade d\'orange à la menthe et dattes', 3.00, 5, '<p>Salade d\'orange à la menthe et dattes</p>', '<p>Orange, datte, fleur d\'oranger, menthe</p>', '<p>Non</p>', '<p>Manger froid</p>', '100', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\"]\"', '2025-12-10', 'products/yHiJaDc5jB1jFayUtXqAU8s8w4HTMXIlCCSdurSY.jpg', 1, 10, 1, 1, '2025-03-07 12:03:58', '2025-07-24 13:20:08'),
(12, 'Salade à l\'oriental', 3.40, 4, '<p>Salade à l\'oriental</p>', '<p>Chou rouge, oignon, soja, sauce soja, coriandre, miel, noix, sel, poivre</p>', '<p>Soja</p>', NULL, '6 piece', '\"null\"', '\"[\\\"V\\\\u00e9g\\\\u00e9tarien\\\"]\"', '2025-12-10', 'products/EoX7R9ZnkfsA6lpxUlJgSqMLqLTxCitprl40T7c7.jpg', 1, 9, 1, 1, '2025-03-07 14:38:27', '2025-07-24 13:20:27'),
(14, 'Brownie', 3.00, 5, '<p>Brownie</p>', '<p>Chocolat, farine, beurre, œuf, sucre, noix, noisettes, amandes, sel</p>', '<p>Noix</p>', NULL, '100GR', '\"null\"', '\"null\"', '2025-12-10', 'products/iIjUrx8HZHoYmcfFGgeFZ4cs3svJwatcmqV09H6m.png', 1, 2, 1, 1, '2025-03-12 14:56:20', '2026-04-03 12:08:57'),
(19, 'Quiche au saumon fumé', 3.20, 4, NULL, '<p>Saumon fumé, oignon, persil, thym, lait, crème fraîche, beurre, oeuf, farine, huile d\'olive, poivre, sel</p>', '<p>Poisson, gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110g', '\"null\"', '\"null\"', '2026-04-15', 'products/voGebLO1dBKVYfGyY7cYGvRsD8D71iQaMKuY2Hv6.png', 1, 10, 1, 1, '2025-11-26 17:04:14', '2026-04-02 12:17:49'),
(24, 'Salade de poire et kiwi à la verveine', 3.20, 5, NULL, '<p>Poire, kiwi, verveine, menthe, citron vert, citronnelle, sucre</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"San Gluten\\\"]\"', '2026-02-16', 'products/cOE9wccbuwbZhZIpfkzdbiSoVh907CrcT8yHe1TN.jpg', 1, 10, 1, 1, '2025-11-26 17:23:20', '2026-04-03 10:04:19'),
(26, 'Pastel de limon', 3.20, 5, NULL, '<p>Citron, lait, lait concentré, crème fraîche, œuf, farine, huile de tournesol, sel, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-15', 'products/fM41I0oeLAG499HtpwoVHam6UEsq9gXd4bSCGpFk.jpg', 1, 10, 1, 1, '2025-11-26 17:28:05', '2026-04-02 12:15:44'),
(27, 'Terrine de saumon fumé et crème d\'aneth', 3.20, 4, NULL, '<p><i>Saumon fumé, oeuf de truite, crème fraîche, oeuf, aneth, ciboulette, citron, huile d\'olive, poivre, sel</i></p>', '<p>Poisson, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"Sans gluten\\\"]\"', '2026-04-16', 'products/mUWB0wRLCZlJHiDU010JUciMzi1kbhCXsi1BsQtu.png', 1, 12, 1, 1, '2025-11-27 09:53:52', '2026-04-03 10:21:11'),
(28, 'Crumble de potimarron aux châtaignes SPECIAL NOEL', 3.20, 4, NULL, '<p><i>Potimarron, châtaigne, farine, beurre, parmesan, muscade, curry, poivre, sucre, sel</i></p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/B5FfQdSA3QXyIEbrqeP2DdPb643YrIQqByPFwG7z.png', 1, 10, 1, 1, '2025-11-27 11:14:43', '2026-04-03 10:20:08'),
(29, 'Salade de champignons pulled chicken SPECIAL NOEL', 3.20, 4, NULL, '<p><i>Champignon de Paris, poulet, tomate, échalote, ciboulette, persil, pain d\'épices, concentré de tomates, huile de tournesol, vinaigre de vin, poivre, sucre, sel</i></p>', '<p>Gluten, lactose, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/XJRIDlM3xDESHj92W4ys9Em952e2qVtEr20F0yzo.png', 1, 10, 1, 1, '2025-11-27 11:20:28', '2026-04-03 10:20:23'),
(30, 'Quesadillas au poulet', 3.20, 4, NULL, '<p>Tortilla, poulet, poivron, tomate, oignon rouge, persil, mozzarella, crème fraîche, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-02-19', 'products/eQzZHKtmVOHFXe79FuKeYERr8tEwbz5B6xworWQi.png', 1, 10, 1, 1, '2025-11-27 11:35:15', '2026-04-03 10:20:40'),
(31, 'Légumes de saison mijotés et purée de potimarron aux châtaignes SPECIAL NOEL', 8.90, 2, NULL, '<p>Potimarron, châtaigne, panais, rutabaga, navet, pomme de terre, ciboulette, persil, citron, crème fraîche, beurre, huile de tournesol, muscade, curry, muscade, poivre, sel</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/qesd2eU9b5ikr4d1G7ZVQyLMmDjm9BpHW4f26MCK.png', 1, 10, 1, 1, '2025-11-27 11:40:23', '2025-11-27 11:50:25'),
(32, 'Filet de lieu aux champignons et purée de potimarron aux châtaignes SPECIAL NOEL', 8.90, 2, NULL, '<p>Lieu, potimarron, châtaigne, champignon de Paris, pomme de terre, ciboulette, citron, crème fraîche, beurre, huile de tournesol, poivre, sel</p>', '<p>Poisson, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/bJh9G1FgcmxXTCc5ZXSavtsKl1mo9XZtKoJxcUZ0.jpg', 1, 10, 1, 1, '2025-11-27 11:43:04', '2025-12-07 16:27:37'),
(33, 'Fricassée de dinde aux champignons et tagliatelles au parfum de truffe blanche SPECIAL NOEL', 8.90, 2, NULL, '<p><i>Dinde, tagliatelle, champignon de Paris, carotte, panais, ciboulette, persil, thym, laurier, citron, crème fraîche, beurre, arôme de truffe blanche, huile de tournesol, muscade, poivre, sel</i></p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/QkEPOXEJxLg3QLTR0lPwF3wTJ8lhk8NyBeK02Q7o.png', 1, 10, 1, 1, '2025-11-27 11:45:12', '2025-11-27 11:45:12'),
(34, 'Filet de lieu safrané aux tagliatelles', 8.90, 2, NULL, '<p><i>Lieu, tagliatelle, potiron, tomate, oignon, cébette, cive, persil, thym, citron, crème fraîche, huile d\'olive, safran, poivre, sel</i></p>', '<p>Poisson, gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/WARDXSew6wl1PGHNh2cRWTLxDL73TrxScgRPxmRb.png', 1, 10, 1, 1, '2025-11-27 11:46:54', '2025-11-27 11:46:54'),
(36, 'Salade d\'avocat et pommes de terre au saumon fumé', 3.20, 4, NULL, '<p>Avocat, pomme de terre, saumon fumé, tomate, ciboulette, coriandre, persil, oignon, ail, citron vert, huile d\'olive, vinaigre de vin, poivre, sel</p>', '<p>Poisson, sulfites, traces possibles d\'oeuf fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2026-04-17', 'products/VkiDWaaJR400seVBMor95QC8bwI3norXAakcvkNL.png', 1, 10, 1, 1, '2025-11-27 11:55:52', '2026-03-31 19:06:23'),
(37, 'Enchiladas rouges végétariennes', 8.90, 2, NULL, '<p>Tortilla, carotte, poivron rouge, courgette, avocat, tomate, oignon, ail, persil, crème fraîche, cheddar, haricot rouge, maïs, huile d\'olive, paprika, cumin, poivre, sel</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/p0YVHRMQFWWprSKmkKq1hJQ1y6JxFcb0wdrjlGjK.png', 1, 9, 1, 1, '2025-11-27 11:57:50', '2026-02-11 15:12:18'),
(38, 'Rigatoni alla caprese', 8.90, 2, NULL, '<p><i>Rigatoni, mozzarella, aubergine, courgette, tomate, oignon, basilic, ciboulette, thym, câpre, concentré de tomates, huile d\'olive, vinaigre balsamique, curry, poivre, sucre, sel</i></p>', '<p>Gluten, lactose, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-17', 'products/DH0mylt5NdIugeABMVd3NMlwmKW15nZJWG8Cyy0o.png', 1, 10, 1, 1, '2025-11-27 11:59:45', '2026-03-31 19:10:13'),
(39, 'Burrito vegan à l\'avocat', 8.90, 2, NULL, '<p><i>Tortilla, riz, avocat, quinoa, lentille verte, graine de chia, poireau, carotte, haricot rouge, maïs, oignon, laitue, persil, citron vert, huile d\'olive, cumin, poivre, sel</i></p>', '<p>Gluten, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/6TSIuAMPMuOkJeTPTdRzXI1MXGI0ir4EzoN6ysNN.png', 1, 10, 1, 1, '2025-11-27 12:01:49', '2026-02-13 12:15:30'),
(41, 'Crumble vegan aux poires', 3.20, 5, NULL, '<p>Poire, pomme golden, citron, menthe, margarine, farine, poudre d\'amandes, vanille, sucre</p>', '<p>Gluten, fruit à coque, soja, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\"]\"', '2026-02-20', 'products/htRHFqiuFZ8a7DwRVMNuIryUJuPP4ipxs9AOFIU5.png', 1, 10, 1, 1, '2025-11-27 12:05:01', '2026-04-03 10:18:22'),
(42, 'Cake féta chorizo', 3.20, 4, NULL, '<p>Chorizo, féta, crème fraîche, beurre, œuf, farine, levure, persil, citron, huile de tournesol, poivre, sel&nbsp;<br>Porc : origine UE</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Porc\\\"]\"', '2026-02-21', 'products/e1ddojservDor5E0rNUpwG95gN64Ipn5cZEWZPo0.png', 1, 10, 1, 1, '2025-11-27 12:06:55', '2026-04-03 10:19:03'),
(43, 'Poulet dauphinois en crème de champignons', 8.90, 2, NULL, '<p>Poulet, pomme de terre, champignon de Paris, carotte, cébette, tomate, oignon, ail, cive, persil, lait, crème fraîche, huile de tournesol, muscade, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/InOLvXAapUfChb9FiSu1WoOqauuMqVXSS25uuUwO.png', 1, 10, 1, 1, '2025-11-27 12:09:08', '2025-11-27 12:09:08'),
(44, 'Truffade et poisson blanc', 9.90, 2, NULL, '<p>Poisson blanc (selon arrivage), pomme de terre, cébette, oignon, ail, persil, tomme de vache, crème fraîche, huile de tournesol, muscade, poivre, sel</p>', '<p>Poisson, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Sans Gluten\\\"]\"', '2026-02-21', 'products/ERNsIZ87cpTU0qnLH73YyTgPcy3sSUA4QbahuR74.png', 1, 10, 1, 1, '2025-11-27 12:10:58', '2026-02-13 12:34:19'),
(45, 'Crumble aux pommes et à la cannelle', 3.20, 5, NULL, '<p>Pomme golden, poudre d\'amandes, farine, beurre, cannelle, vanille, sucre</p>', '<p>Gluten, lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/im0LgV6TeW8msSsTklFKWiRxTODgH6pwKqau3eN1.png', 1, 10, 1, 1, '2025-11-27 12:12:40', '2026-04-03 10:19:23'),
(46, 'Velouté muscadé poireau pomme de terre', 3.20, 4, NULL, '<p>Poireau, pomme de terre, citron, boisson de soja, lait de coco, margarine, muscade, poivre, sel</p>', '<p>Soja, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-02-22', 'products/cxBdh5cO3D9BGIAmqc7RuioGgvQLTRqBmSPA07Lq.png', 1, 10, 1, 1, '2025-11-27 12:15:51', '2026-04-03 10:19:41'),
(47, 'Quiche au poulet et tomate séchée', 3.20, 4, NULL, '<p><i>Poulet, tomate séchée, oignon, basilic, romarin, lait, crème fraîche, beurre, oeuf, farine, olive noire, huile d\'olive, muscade, poivre, sel</i></p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '120', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-02-25', 'products/Ov95MPe9fXZ9P8VZYO11m9YVLfwaCER40zmGdzcs.png', 1, 10, 1, 1, '2025-11-27 12:17:37', '2026-02-18 10:56:49'),
(48, 'Chili con carne', 9.90, 2, NULL, '<p>Bœuf, riz basmati, haricot rouge, carotte, poivron, tomate, oignon, ail, persil, laurier, citron, maïs, concentré de tomates, huile d\'olive, cumin, cardamome, piment chipotle, sel&nbsp;<br>Bœuf : origine France</p>', '<p>Traces possibles d\'œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2 mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Piquant\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-20', 'products/q3Q7yJcfDq9TMtE4rtcFvAzN8GwyIEVge13yvVKM.png', 1, 10, 1, 1, '2025-11-27 12:20:18', '2026-03-31 20:53:10'),
(49, 'Fricassée de poulet et gratin de macaronis', 8.90, 2, NULL, '<p>Poulet, macaroni, carotte, champignon de Paris, persil, thym, citron, crème fraîche, emmental, huile de tournesol, muscade, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-04-20', 'products/TMFFuIGjGdtPOKVmBaMRjZBhkNOxUL5K5o170RL5.png', 1, 10, 1, 1, '2025-11-27 12:22:24', '2026-03-31 20:50:49'),
(50, 'Légumes et champignons grillés au quinoa', 8.90, 2, NULL, '<p><i>Champignon de Paris, quinoa, butternut, navet, carotte, persil, thym, laurier, citron, boisson de soja, lait de coco, huile d\'olive, muscade, cumin, poivre, sel</i></p>', '<p>Soja, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/9Wzwhk4zfeEYXryh0TTbB5tAoi00LMWBTtS77rvJ.png', 1, 10, 1, 1, '2025-11-27 12:24:51', '2025-11-27 12:24:51'),
(53, 'Fondant chocolat cacahuètes', 3.20, 5, NULL, '<p>Chocolat noir, pâte d\'arachide, cacahuète, crème fraîche, beurre, oeuf, farine, sel, sucre</p>', '<p>Gluten, lactose, oeuf, arachide, fruit à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/qBQTmWY5VQjS8RjiPMcg6KjBSXReFEskPh5EfD1S.jpg', 1, 10, 1, 1, '2025-11-27 12:29:25', '2026-04-03 10:17:23'),
(54, 'Quesadillas moelleuses au bœuf', 3.20, 4, NULL, '<p><i>Bœuf, tortilla, poivron, oignon, coriandre, crème fraîche, mozzarella, huile d\'olive, cumin, poivre, sel</i></p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"null\"', '2026-03-11', 'products/3TOFP8etCNzUgExcCy27pIPI7et45rOFRslXXtjd.png', 1, 10, 1, 1, '2025-11-27 12:34:12', '2026-04-03 10:18:06'),
(57, 'Fricassée de poulet et tagliatelles à l\'estragon', 8.90, 2, NULL, '<p><i>Poulet, tagliatelle, carotte, chou-fleur, cébette, oignon, estragon, cive, persil, thym, citron, crème fraîche, huile de tournesol, poivre, sel</i></p>', '<p>Fruits à coque, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/BxLuWSyxW2EmA7KWPOt7WohXGaHqzuYWw26z3kLo.png', 1, 10, 1, 1, '2025-11-27 12:46:21', '2025-11-27 12:46:21'),
(59, 'Enchiladas vertes au boeuf', 9.90, 2, NULL, '<p>Tortilla, boeuf, épinard, tomate, courgette, poivron vert, carotte, oignon, ail, persil, thym, crème fraîche, cheddar, huile d\'olive, cumin, poivre, sel&nbsp;<br>Bœuf : origine France</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)<br>A réchauffer 20 sec au micro-ondes (sans le couvercle) . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-01-24', 'products/fkzI1XvDdjeBCAtvLnZPionxfek8fwQdOh2mY3L3.png', 1, 10, 1, 1, '2025-11-27 12:50:07', '2026-01-21 14:19:46'),
(61, 'Crumble végan aux figues et aux noix', 3.20, 5, NULL, '<p><i>Figue, pomme golden, citron, noix, poudre d\'amandes, farine, margarine, vanille, sucre</i></p>', '<p>Gluten, soja, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/nwjNdC4m3TlPhW8ncxFJBRAenK7KEja3D90BGmEw.jpg', 1, 10, 1, 1, '2025-11-27 12:54:22', '2026-04-03 10:18:43'),
(63, 'Bœuf braisé au romarin et poêlée de légumes au thym', 9.90, 2, NULL, '<p><i>Bœuf, carotte, navet, courgette, chou-fleur, tomate, oignon, ail, persil, thym, romarin, concentré de tomates, huile d\'olive, cumin, poivre, sel</i></p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"null\"', '2026-04-17', 'products/Xpd670HnBfP4vixOHDxSRmhDyisCDxvMa4NxaMAd.png', 1, 10, 1, 1, '2025-11-27 14:09:14', '2026-03-31 19:14:57'),
(65, 'Salade d\'ananas et litchi', 3.20, 5, NULL, '<p><i>Ananas, litchi, citron, coco râpée, menthe, vanille, sucre</i></p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/PV5JG6Or5kOI5IYqIpvjHV4ABdpfgaGzOWLVRNq7.jpg', 1, 10, 1, 1, '2025-11-27 14:18:25', '2026-04-03 10:17:44'),
(68, 'Crumble au chou-fleur potiron féta', 8.90, 2, NULL, '<p>Chou-fleur, potiron, féta, oignon, ciboulette, cive, thym, romarin, crème fraîche, beurre, parmesan, farine, pignon de pin, noisette, muscade, poivre, sel</p>', '<p>Gluten, lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/tx1TI3AkYgIDIzMQiYOA4X0Mzm61f1Nqiwb5P3W2.png', 1, 9, 1, 1, '2025-11-27 14:27:04', '2025-11-27 15:47:25'),
(69, 'Pesto rosso vegan de légumes de saison au citron confit', 8.90, 2, NULL, '<p><i>Potiron, quinoa, panais, rutabaga, tomate, ail, basilic, persil, thym, citron, citron confit, pignon de pin, tomate séchée, concentré de tomates, huile d’olive, poivre, sel</i></p>', '<p>Fruit à coque, traces possibles d\'oeuf</p>', NULL, '400', '\"null\"', '\"null\"', '2025-12-10', 'products/mVkGnk3rIj0Fhv1Qv1I5jeiVVD8VgrPh07OB45Es.png', 1, 10, 1, 1, '2025-11-27 15:12:49', '2025-11-27 15:48:00'),
(71, 'Axoa de boeuf', 9.90, 2, NULL, '<p>Bœuf, poivron, pomme de terre, tomate, cébette, oignon, ail, persil, thym, concentré de tomates, huile d\'olive, piment d\'Espelette, sucre, sel&nbsp;<br>Bœuf : origine France</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2 mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-03-26', 'products/VmO1LNBTlQlaA3NnLTD9WSD2H0LhKSpQwJhV4als.png', 1, 10, 1, 1, '2025-11-27 15:20:46', '2026-04-02 11:52:53'),
(75, 'Burrito légumes guacamole', 8.90, 2, NULL, '<p>Tortilla, riz, avocat, aubergine, courgette, poivron, carotte, maïs, oignon rouge, ail, persil, citron vert, oeuf, moutarde, huile d\'olive, vinaigre de vin, poivre, sel</p>', '<p>Gluten, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '400', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\"]\"', '2026-04-09', 'products/t1iB5PB4KCA1lsJRJVF5M6uH27xn6nJ2rzB9HsAw.png', 1, 10, 1, 1, '2025-11-27 15:33:33', '2026-03-26 17:51:27'),
(79, 'Tartiflette aux champignons', 8.90, 2, NULL, '<p>Pomme de terre, reblochon, champignon de Paris, oignon, ciboulette, crème fraîche, muscade, poivre, sel</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/YIbqSykr7eOpinSGGbDZteFtDDJodtjl502BKgIj.png', 1, 10, 1, 1, '2025-11-27 15:45:22', '2025-11-28 11:15:46'),
(81, 'Butternut grillé et quinoa aux châtaignes', 8.90, 2, NULL, '<p><i>Butternut, quinoa, châtaigne, rutabaga, navet, champignon de Paris, oignon rouge, persil, cive, thym, huile d\'olive, boisson de soja, cumin, curry, poivre, sucre, sel</i></p>', '<p>Soja, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/xDb1SG7NInoVzatuY2GfxfWRdCBOfGGKVm84HCWK.png', 1, 10, 1, 1, '2025-11-28 10:51:46', '2025-11-28 10:57:12'),
(84, 'Guacamole haché au blé et piment jaune', 3.20, 4, NULL, '<p><i>Avocat, blé, tomate, coriandre, persil, oignon rouge, citron vert, huile d\'olive, piment aji, sel</i></p>', '<p>Gluten, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', NULL, 1, 10, 1, 1, '2025-11-28 11:05:56', '2026-04-03 10:16:33'),
(85, 'Poisson blanc aux herbes fraîches et légumes grillés', 9.90, 2, NULL, '<p>Lieu, potiron, panais, rutabaga, pomme de terre, champignon de Paris, oignon, ail, cive, estragon, coriandre, persil, citron, boisson de soja, huile d\'olive, curcuma, poivre, sel</p>', '<p>Poisson, soja, sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/qogYKJ1BtFqo5CvgA3Jyefin0H6wiV1hE9TOBzh6.png', 1, 10, 1, 1, '2025-11-28 11:10:01', '2026-02-13 12:41:33'),
(86, 'Rigatoni all \'arrabbiata', 8.90, 2, NULL, '<p><i>Rigatoni, tomate, oignon, ail, basilic, persil, parmesan, olive noire, concentré de tomates, huile d\'olive, vinaigre de xérès, piment, sel</i></p>', '<p>Gluten, lactose, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"Veggie\\\",\\\"Piquant\\\"]\"', '2026-02-25', 'products/SeUg18JMqOE1wnpOBFsTQ3QBNpuYL81KSlOTUVYd.png', 1, 10, 1, 1, '2025-11-28 11:11:47', '2026-04-02 11:38:17'),
(87, 'Poulet maître d\'hôtel aux champignons', 8.90, 2, NULL, '<p><i>Poulet, pomme de terre, champignon de Paris, carotte, cébette, oignon, ail, persil, cive, thym, citron, beurre, huile de tournesol, muscade, poivre, sel</i></p>', '<p>Lactose, traces possibles d\'œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"Halal\\\",\\\"Sans Gluten\\\"]\"', '2026-02-25', 'products/drctRniKQfpIOFqRnhL5Y2i2WEnF6oI4ZTMaU7f1.png', 1, 10, 1, 1, '2025-11-28 11:13:39', '2026-04-02 11:37:50'),
(88, 'Dahl corail et légumes grillés tandoori', 8.90, 2, NULL, '<p><i>Lentille corail, riz basmati, aubergine, courgette, poivron, carotte, tomate, oignon, ail, persil, menthe, coriandre, citron, lait de coco, huile d\'olive, épices tandoori, poivre, sel</i></p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-02-25', 'products/3DA1rqNJvVel6rvvFYQmjyFocAEzjQalLH29kf6q.jpg', 1, 10, 1, 1, '2025-11-28 11:17:53', '2026-02-18 11:06:44'),
(90, 'Salade de thon à l\'avocat', 3.20, 4, NULL, '<p>Thon au naturel, avocat, pomme de terre, tomate, oignon, ail, persil, ciboulette, oeuf, moutarde, huile de tournesol, huile d\'olive, vinaigre de vin, poivre, sel</p>', '<p>Poisson, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/AKfMGdtSLCyamSSJECIslYvHurRwYV14S31Mz2Mf.png', 1, 110, 1, 1, '2025-11-28 11:21:38', '2026-04-03 10:16:59'),
(91, 'Salade de champignons butternut et croûtons de pain d\'épices SPECIAL NOEL', 3.20, 4, NULL, '<p>Champignon de Paris, butternut, échalote, ciboulette, persil, pain d\'épices, boisson de soja, lait de coco, huile de tournesol, vinaigre de vin, curry, poivre, sucre, sel</p>', '<p>Gluten, lactose, oeuf, soja, sulfites, traces possibles de fruits à coque</p>', '<p>Gluten, lactose, oeuf, soja, sulfites, traces possibles de fruits à coque</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/L0SgER0nQyhSERrHIdqtwYDA5KXOjDE1iuP3JJ1Q.png', 1, 10, 1, 1, '2025-11-28 11:23:34', '2026-04-03 10:15:13'),
(92, 'Crumble avocat maïs', 3.20, 4, NULL, '<p>Avocat, maïs, tomate, oignon, ail, persil, citron, beurre, farine, chips de maïs, huile d\'olive, poivre, sel</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-26', 'products/PL5QitaUv0zba7xUoO41DVqyrbTZHSYBfSgvJ5WU.png', 1, 10, 1, 1, '2025-11-28 11:25:22', '2026-04-02 11:33:49'),
(93, 'Salade de pommes de terre balsamique au foie gras SPECIAL NOEL', 3.20, 4, NULL, '<p>Pomme de terre, foie gras, potiron, échalote, ciboulette, persil, huile de tournesol, vinaigre balsamique, baie rose, poivre, sel&nbsp;<br>Canard : origine UE</p>', '<p>Sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/0ZC9r8ZFafERRclxHujnsTh6oITbu6LXtqChaIYz.png', 1, 10, 1, 1, '2025-11-28 11:27:23', '2026-04-03 10:07:53'),
(94, 'Salade d\'avocat et saint-jacques au piment jaune SPECIAL NOEL', 3.20, 4, NULL, '<p><i>Coquille Saint-Jacques, quinoa, avocat, tomate, échalote, ciboulette, persil, huile d\'olive, vinaigre de cidre, baie rose, piment jaune, sel</i></p>', '<p>Mollusque, sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/nM5dz7IIVICCXA5zwMDrAb5oPXzNbH6oiSBSRDly.png', 1, 10, 1, 1, '2025-11-28 11:28:44', '2026-04-03 10:16:05'),
(95, 'Fricassée de légumes de saison et reblochonade SPECIAL NOEL', 8.90, 2, NULL, '<p>Panais, rutabaga, navet, pomme de terre, oignon, ciboulette, persil, citron, reblochon, crème fraîche, noisette, huile de tournesol, muscade, poivre, sel</p>', '<p>Lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/aRyYZwdhYTY3qjayLmi55fx4ljWZdlFiELvLTLkf.png', 1, 10, 1, 1, '2025-11-28 11:30:17', '2025-11-28 11:30:17'),
(96, 'Mijotée de dinde et reblochonade SPECIAL NOEL', 8.90, 2, NULL, '<p>Dinde, pomme de terre, reblochon, champignon de Paris, carotte, ciboulette, persil, thym, citron, reblochon, crème fraîche, noisette, huile de tournesol, muscade, poivre, sel&nbsp;<br>Dinde : origine UE</p>', '<p>Lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/wVdG7y1YQ368sIXUZFTJhEtsTfye7T5p9XjNLbXB.png', 1, 10, 1, 1, '2025-11-28 11:34:43', '2025-11-28 11:34:43'),
(97, 'Dos de lieu aux crevettes et tagliatelles safranées SPECIAL NOEL', 8.90, 2, NULL, '<p>Lieu, crevette, tagliatelle, carotte, navet, échalote, ciboulette, persil, thym, citron, crème fraîche, beurre, huile d\'olive, safran, poivre, sel</p>', '<p>Poisson, crustacé, gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/vtDj0duSdUwORENwF1TI6QxpPS8BkWA0WVcZiHOd.png', 1, 10, 1, 1, '2025-11-28 11:36:32', '2025-11-28 11:36:32'),
(98, 'Gratin de chou-fleur aux champignons', 8.90, 2, NULL, '<p>Chou-fleur, champignon de Paris, pomme de terre, oignon, ciboulette, thym, lait, beurre, crème fraîche, emmental, farine, muscade, poivre, sel</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-26', 'products/eOUvF0E87RGclYYgPwwxNCXOmwI5XOEGsIIcMd7J.png', 1, 10, 1, 1, '2025-11-28 11:39:56', '2026-02-19 12:29:50'),
(99, 'Tartiflette', 8.50, 2, NULL, '<p>Pomme de terre, reblochon,,oignon, ciboulette, poitrine de porc demi-sel, crème fraîche, muscade, poivre, sel&nbsp;<br>Porc : origine UE</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/gMLu70881wwmuGRN9w3ItpAUumlMHuaqlCJLsHmA.png', 1, 10, 1, 1, '2025-11-28 11:41:52', '2025-11-28 11:41:52'),
(101, 'Wraps au saumon fumé', 3.20, 4, NULL, '<p>Tortilla, saumon fumé, carotte, tomate, laitue, oignon, cheddar, œuf, moutarde, vinaigre de vin, huile de tournesol, paprika, poivre, sel</p>', '<p>Poisson, gluten, lactose, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '400', '\"null\"', '\"null\"', '2026-03-26', 'products/vw0fse3aFJj372HsXxrCT5v4RcRYbA8eLHYyHEMj.png', 1, 10, 1, 1, '2025-11-28 11:47:18', '2026-04-02 11:47:07'),
(102, 'Cake aux olives et tomates séchées', 3.20, 4, NULL, '<p><i>Olive verte, tomate séchée, persil, romarin, lait, crème fraîche, emmental, œuf, farine, levure, huile d\'olive, poivre, sel</i></p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-27', 'products/gHPYst2huiYz2y3wfbUJ3NysT3XiVy8rl2g0rtr9.png', 1, 10, 1, 1, '2025-11-28 11:49:22', '2026-04-03 10:13:59'),
(103, 'Poisson blanc et fusillis à la crème de tarama', 9.90, 2, NULL, '<p>Poisson blanc (selon arrivage), fusilli, tarama, courgette, tomate, oignon, cébette, ciboulette, persil, thym, citron, crème fraîche, huile d\'olive, muscade, poivre, sel</p>', '<p>Poisson, gluten, lactose, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/82emfIlGMADxakWff3yc8NHxDHhu74qSY8ZrBj3L.png', 1, 10, 1, 1, '2025-11-28 11:53:06', '2026-02-13 12:41:08'),
(104, 'Pommes grenailles et potimarron aux noix', 8.90, 2, NULL, '<p>Pomme de terre grenaille, potimarron, champignon de Paris, tomate, ciboulette, citron, crème fraîche, parmesan, noix, muscade, poivre, sel</p>', '<p>Lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2025-12-10', 'products/qZG733Pd7tnYt1f459F2SVCx896IOQu7g3cYWKlG.png', 1, 10, 1, 1, '2025-11-28 11:54:47', '2025-11-28 11:54:47'),
(105, 'Boeuf bourguignon aux coquillettes', 8.90, 2, NULL, '<p>Bœuf, coquillette, carotte, tomate, oignon, ail, cive, persil, thym, laurier, beurre, farine, vin rouge, concentré de tomates, huile de tournesol, clou de girofle, paprika, poivre, sucre, sel&nbsp;<br>Bœuf : origine France</p>', '<p>Gluten, lactose, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"[\\\"Alcool\\\"]\"', '2026-03-05', 'products/lDGFQ29fdRTZ6wFcSvFcLydjOPkFyioOcs714BYA.png', 1, 10, 1, 1, '2025-11-28 11:56:18', '2026-02-25 14:45:21'),
(106, 'Linguine alla carbonara', 8.90, 2, NULL, '<p>Linguine, poitrine de porc demi-sel, tomate, ciboulette, crème fraîche, parmesan, poivre, sel&nbsp;<br>Porc : origine UE</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"[\\\"Porc\\\"]\"', '2026-02-27', 'products/TEB8S5Nc2p5ug0y5moPCbsd3bSdV44DaCa74Jc1e.png', 1, 10, 1, 1, '2025-11-28 11:57:54', '2026-02-19 12:56:49'),
(107, 'Crumble vegan aux poires', 3.20, 5, NULL, '<p>Poire, pomme golden, citron, menthe, margarine, farine, poudre d\'amandes, vanille, sucre</p>', '<p>Gluten, fruit à coque, soja, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/IKZn0I2tCzX8FHgfhBjjr7ueFbpaJCjtHIdFUOHQ.png', 1, 10, 1, 1, '2025-11-28 12:01:44', '2026-04-03 10:14:31'),
(108, 'Moelleux au chocolat et caramel salé', 3.20, 5, NULL, '<p>Chocolat noir, crème fraîche, beurre, oeuf, farine, sel, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-29', 'products/1sul08afaQkqwqlxv9RzMtrOSwMvRaTRmAMVV67v.png', 1, 10, 1, 1, '2025-11-28 12:04:52', '2026-04-03 10:14:49'),
(110, 'Riso safrané vegan potimarron châtaignes', 8.90, 2, NULL, '<p>Potimarron, riz basmati, châtaigne, navet, champignon de Paris, tomate, oignon, persil, thym, laurier, citron, boisson de soja, lait de coco, amidon de maïs, huile d\'olive, safran, curcuma, poivre, sel</p>', '<p>Soja, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-02-28', 'products/mJYB4hkLj6a3yu6ur5kizluvB3OcadVgfhwXQyVe.png', 1, 10, 1, 1, '2025-11-28 12:10:09', '2026-02-19 14:13:37'),
(111, 'Coquillettes et butternut façon risotto', 8.90, 2, NULL, '<p>Coquillette, parmesan, potiron, oignon, ciboulette, persil, crème fraîche, beurre, huile d\'olive, safran, poivre, sel</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-28', 'products/qsaNO59hUVS43uSFRNg0A4EiRKk9RdTI6riOvEJy.png', 1, 10, 1, 1, '2025-11-28 12:12:00', '2026-02-19 13:58:30'),
(112, 'Crumble aux pommes et à la cannelle', 3.20, 5, NULL, '<p>Pomme golden, poudre d\'amandes, farine, beurre, cannelle, vanille, sucre</p>', '<p>Gluten, lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/K7nTpyHivBBjx4U4Zw0Dq1YeDk1WM1eYqn44e1rL.png', 1, 10, 1, 1, '2025-11-28 12:13:34', '2026-04-03 10:15:33'),
(113, 'Quiche piperade', 3.20, 4, NULL, '<p>Poivron, carotte, tomate, oignon, ail, ciboulette, thym, lait, crème fraîche, beurre, emmental, oeuf, farine, huile d\'olive, vinaigre de vin, paprika, poivre, sucre, sel</p>', '<p>Gluten, lactose, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-29', 'products/ceer9JO4ycAfyAH3QDVT6Yul5Ski8L8daUWCjjTZ.png', 1, 10, 1, 1, '2025-11-28 12:15:31', '2026-04-02 12:06:54'),
(114, 'Salade de tortis au cantal', 3.20, 4, NULL, '<p>Torti, cantal, carotte, tomate, oignon, persil, basilic, olive noire, huile d\'olive, vinaigre balsamique, poivre, sel</p>', '<p>Gluten, lactose, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-29', 'products/PWGQC546c0KLe1HZus6CHrPItpJR24GGkrp8p3oO.png', 1, 10, 1, 1, '2025-11-28 12:17:33', '2026-04-03 10:11:54'),
(116, 'Enchiladas rouges au boeuf', 8.90, 2, NULL, '<p>Tortilla, bœuf, haricot rouge, lentille, poivron rouge, carotte, tomate, oignon, ail, persil, crème fraîche, cheddar, huile d\'olive, concentré de tomates, paprika, cumin, poivre, sel&nbsp;<br>Bœuf : origine France</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-03-29', 'products/LvYSs8w3K9Abib0ZQGC82uLKykxJRLbZnOCwjTXM.png', 1, 10, 1, 1, '2025-11-28 12:23:16', '2026-04-02 12:12:33'),
(117, 'Poulet moutarde', 8.90, 2, NULL, '<p>Poulet, riz basmati, carotte, tomate, oignon, cébette, cive, persil, laurier, crème fraîche, moutarde, huile de tournesol, curcuma, poivre, sel&nbsp;</p>', '<p>Lactose, moutarde, sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"[\\\"Halal\\\",\\\"Sans Gluten\\\"]\"', '2026-04-19', 'products/yuNqqWDrWOVAxjFEo0vXz1App4YZw9z7UZodHXkk.png', 1, 10, 1, 1, '2025-11-28 12:26:18', '2026-03-31 19:36:27'),
(118, 'Rigatonis et légumes verts arrabbiata', 8.90, 2, NULL, '<p>Rigatoni, courgette, haricot vert, tomate, cébette, oignon, ail, basilic, persil, thym, parmesan, olive verte, concentré de tomates, huile d\'olive, piment, poivre, sucre, sel</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Veggie\\\",\\\"Piquant\\\"]\"', '2026-03-29', 'products/B6nDz7f55KpMODOe918F8qStAKEmPmrHPBi2QZJr.png', 1, 10, 1, 1, '2025-11-28 12:28:54', '2026-04-02 12:09:58'),
(119, 'Cake ananas rhum coco', 3.20, 5, NULL, '<p>Ananas, farine, levure, beurre, crème fraîche, oeuf, coco râpée, poudre d\'amandes, huile de tournesol, rhum, vanille, sel, sucre</p>', '<p>Gluten, lactose, oeuf, fruit à coque, sulfites</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/fvKyhoEtM6Gia91LfoytfT1L60fWe4NPgtNIRBdb.png', 1, 10, 1, 1, '2025-11-28 12:30:55', '2026-04-03 10:12:20'),
(120, 'Salade de poires hibiscus et cranberries', 3.20, 5, NULL, '<p>Poire, menthe, citron, hibiscus, cranberry, vanille, sucre</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-02-22', 'products/5QrOxanCAO2hmLHGOJFYK7yKgPx2gg4JMP2V6x1U.png', 1, 10, 1, 1, '2025-11-28 12:32:25', '2026-04-03 10:12:42'),
(121, 'Fondant chocolat cacahuètes', 3.20, 5, NULL, '<p>Chocolat noir, pâte d\'arachide, cacahuète, crème fraîche, beurre, oeuf, farine, sel, sucre</p>', '<p>Gluten, lactose, oeuf, arachide, fruit à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"null\"', '2025-12-10', 'products/V0uK8saCmz1UcjXT5t9Ww7avOFBjXLoAFKA0bG5T.png', 1, 10, 1, 1, '2025-11-28 12:33:44', '2026-04-03 10:13:08'),
(123, 'Guacamole haché et tortillas chips', 3.20, 4, NULL, '<p>Avocat, tomate, oignon rouge, citron vert, chips de maïs, huile d\'olive, poivre, sel</p>', '<p>Traces possibles d\'œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2026-01-05', 'products/dgizDhK8boQDfDovElrlznvvT3b6CiHoWensCU0y.jpg', 1, 10, 1, 1, '2025-12-11 12:23:30', '2026-04-03 10:13:29'),
(124, 'Filet de lieu aux champignons et purée de pommes de terre', 8.90, 2, NULL, '<p>Lieu, champignon de Paris, pomme de terre, ciboulette, persil, citron, crème fraîche, beurre, huile de tournesol, muscade, poivre, sel</p>', '<p>Poisson, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Sans Gluten\\\"]\"', '2026-04-29', 'products/87Mf1JdkmuRLvhiCMbCV2Aw5VLQWauDcJ2C6rtL3.png', 1, 10, 1, 1, '2025-12-11 12:27:08', '2026-04-02 10:59:37'),
(125, 'Enchiladas vertes veggies', 8.90, 2, NULL, '<p>Tortilla, brocoli, épinard, lentille verte, courgette, poivron, oignon, ail, persil, crème fraîche, cheddar, huile d\'olive, cumin, poivre, sel</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-29', 'products/ZNvVHQR1WpbwZKjgojetE1bhvmyBMl49IIy3Jkzn.png', 1, 10, 1, 1, '2025-12-11 12:28:55', '2026-03-31 21:15:44'),
(126, 'Poulet aux cacahuètes et grenailles persillées', 8.90, 2, NULL, '<p>Poulet, pomme de terre grenaille, carotte, tomate, oignon, ail, persil, thym, cacahuète, pâte d\'arachide, concentré de tomates, huile d\'olive, piment, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Arachide, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Halal\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-29', 'products/JaZxIzKFo5Rq3fVv2ofwrV4qkfpToAe2PNqVuZCX.png', 1, 10, 1, 1, '2025-12-11 12:30:39', '2026-03-31 21:16:40'),
(127, 'Mijotée de bœuf à la provençale', 9.90, 2, NULL, '<p>Bœuf, tagliatelle, poivron, courgette, tomate, oignon, ail, persil, thym, romarin, olive noire, concentré de tomates, huile d\'olive, paprika, poivre, sel&nbsp;<br>Bœuf : origine Pays-Bas</p>', '<p>Gluten, oeuf, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"[\\\"Sans Lactose\\\"]\"', '2026-04-29', 'products/o1Sro6XBtBTy8ie8e96tVUucor9tLRIB8gl7DEat.png', 1, 10, 1, 1, '2025-12-11 12:32:13', '2026-03-31 21:17:03'),
(129, 'Tarte Bourdaloue', 3.20, 5, NULL, '<p>Poire, beurre, oeuf, farine, poudre d\'amandes, vanille, sel, sucre</p>', '<p>Gluten, lactose, oeuf, fruit à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-30', 'products/ogxGYb8yqmiAF95J4BhsCzuWtnJ0LhHMO23lCDPt.png', 1, 10, 1, 1, '2025-12-11 12:39:25', '2026-03-31 21:27:55'),
(130, 'Salade d\'avocat à l\'oeuf', 3.20, 4, NULL, '<p>Avocat, oeuf, carotte, tomate, oignon, ail, persil, graine de sésame noir, moutarde, huile d\'olive, vinaigre de vin, curcuma, poivre, sel</p>', '<p>Œuf, fruit à coque, moutarde, sulfites</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"Sans Lactose\\\",\\\"Veggie\\\",\\\"Sans Gluten\\\"]\"', '2026-04-29', 'products/xntW4X1ytlTQ1nQoq9dkLjl0Bn0adLly89OjPaJX.jpg', 1, 10, 1, 1, '2025-12-11 12:43:48', '2026-03-31 21:22:14'),
(131, 'Quiche poulet poireau', 3.20, 4, NULL, '<p>Poulet, poireau oignon, thym, romarin, lait, crème fraîche, beurre, oeuf, farine, huile de tournesol, muscade, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, œuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-04-29', 'products/ez4zvqgQX3rRCgE3wo2DwKkd2qpjRbTcZMVMvCVq.png', 1, 10, 1, 1, '2025-12-11 13:35:10', '2026-03-31 21:23:02'),
(132, 'Gratin de pommes de terre au reblochon', 8.90, 2, NULL, '<p><i>Pomme de terre, reblochon, pomme de terre, oignon, ciboulette, thym, lait, beurre, crème fraîche, farine, muscade, poivre, sel</i></p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-05', 'products/qh1MgHxYuQ6MzZemLqIffevQoaRgDp0Odr57lnDv.png', 1, 10, 1, 1, '2025-12-11 13:40:45', '2026-02-25 14:27:47'),
(133, 'Flan vegan sans gluten au croquant de cacahuètes', 3.20, 5, NULL, '<p><i>Cacahuète, pâte d\'arachide, margarine, boisson de soja, amidon de maïs, agar agar, vanille, sucre</i></p>', '<p>Arachide, soja, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2026-01-06', 'products/TyjHjqtUcPrjy9o5RH0OynrsGjxzNlVk4qQvG9md.jpg', 1, 10, 1, 1, '2025-12-11 13:46:37', '2026-04-03 10:10:43'),
(134, 'Brioche perdue et caramel salé aux noix', 3.20, 5, NULL, '<p>Farine, levure, lait, crème fraîche, beurre, oeuf, noix, amidon de maïs, sel, sucre</p>', '<p>Gluten, lactose, oeuf, fruit à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-05', 'products/eCyoMYUXxZhLbQ4sg3U44LlCP1YCTR5GQzy7ewkO.png', 1, 10, 1, 1, '2025-12-11 13:48:35', '2026-04-03 10:11:15'),
(135, 'Rillettes de thon au sumac', 3.20, 4, NULL, '<p>Thon au naturel, ciboulette, thym, citron, fromage blanc, oeuf, moutarde, huile d’olive, huile de tournesol, vinaigre de vin, sumac, cumin, poivre, sel</p>', '<p>Poisson, lactose, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"Sans Gluten\\\"]\"', '2026-05-01', 'products/5YWvj9OdIPQb0TqvnL1r8IebIEMW0V3ghe8ZkJR6.png', 1, 10, 1, 1, '2025-12-11 14:06:35', '2026-04-03 11:59:38'),
(136, 'Velouté muscadé de potiron à l\'estragon', 3.20, 4, NULL, '<p>Potiron, estragon, citron, boisson de soja, lait de coco, muscade, curry, poivre, sel</p>', '<p>Soja, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans lactose\\\",\\\"Sans gluten\\\"]\"', '2026-03-01', 'products/XLSjn9i5IxZbn8BEhPAp0KqavZKXuS9d7qE802Fk.png', 1, 10, 1, 1, '2025-12-11 14:07:58', '2026-04-03 10:10:14'),
(137, 'Poulet Pibil', 8.90, 2, NULL, '<p>Poulet, riz basmati, carotte, navet, céleri branche, tomate, cébette, oignon, ail, cive, persil, laurier, orange, citron, amidon de maïs, huile d\'olive, achiote, cumin, gingembre, girofle, piment chipotle, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Céleri, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Halal\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-05-01', 'products/a0iCuEKmbmVxZdiJj04wxv9bNMXUycGkELfm9JqX.png', 1, 10, 1, 1, '2025-12-11 14:14:43', '2026-03-31 21:30:38'),
(138, 'Rigatonis chèvre épinards', 8.90, 2, NULL, '<p>Rigatoni, épinard, fromage de chèvre, courgette, tomate séchée, tomate, oignon, ail, cive, thym, huile d\'olive, muscade, poivre, sel</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-05-01', 'products/PX3Wh6fMdrTQE8ycnnMQm0nytDJUfYeZqWD0glCi.png', 1, 10, 1, 1, '2025-12-11 14:18:18', '2026-04-03 12:03:46'),
(139, 'Compote de pommes aux fèves de tonka', 3.20, 5, NULL, '<p>Pomme golden, fève de tonka, citron, vanille, sucre</p>', '<p>Fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '400', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-05-01', 'products/rtRFqdPeKacLf9gEGjrRau3XuvfZyW6CyldoPQMV.png', 1, 10, 1, 1, '2025-12-11 14:19:52', '2026-03-31 21:32:39'),
(140, 'Banana choco bread', 3.20, 5, NULL, '<p>Banane, chocolat noir, citron, crème fraîche, oeuf, farine, levure, huile de tournesol, vanille, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-05-01', 'products/qTFmJH0OOoFz6QEgUpvjBHv8PsXnWQfZYeBomt1R.png', 1, 10, 1, 1, '2025-12-11 14:23:29', '2026-03-31 21:33:49');
INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `short_description`, `ingredients`, `allergens`, `preparation_advice`, `weight`, `nutritional_values`, `dietary_preferences`, `expiry_date`, `image`, `status`, `quantity`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(141, 'Velouté de pois cassés aux noix', 3.20, 4, NULL, '<p><i>Pois cassé, persil, estragon, boisson de soja, lait de coco, noix, muscade, poivre, sel</i></p>', '<p>Soja, fruit à coque, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Vegan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-05-02', 'products/wnSP8VQ7HP5mZbYb2mz0R5Bze6ahKS20r37TGsrS.png', 1, 10, 1, 1, '2025-12-11 14:27:31', '2026-03-31 21:39:12'),
(142, 'Quesadillas moelleuses aux légumes', 3.20, 4, NULL, '<p>Tortilla, poivron, brocoli, carotte, tomate, oignon, persil, thym, mozzarella, crème fraîche, huile d\'olive, poivre, sel</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-05-02', 'products/XGJheF62xBxhOAr7tR5jCbnxiy0oaELPspPkWEiT.png', 1, 10, 1, 1, '2025-12-11 14:29:03', '2026-03-31 21:40:23'),
(143, 'Potimarron et champignons aux pommes de terre écrasées', 9.90, 2, NULL, '<p>Potimarron, pomme de terre, champignon de Paris , oignon, ciboulette, persil, thym, laurier, boisson de soja, huile d\'olive, vinaigre de vin, poivre, sucre, sel</p>', '<p>Soja, sulfites</p>', '<p>À déguster chaud ou froid</p>', '400', '\"null\"', '\"null\"', '2026-01-08', 'products/c5xKBQNuuLWQGGJxGYrC8wjVxqdDgzU2F42UHyuA.jpg', 1, 10, 1, 1, '2025-12-11 14:31:37', '2025-12-12 13:44:23'),
(144, 'Salade vanillée poire kiwi au citron vert', 3.20, 5, NULL, '<p>Pomme golden, poire, kiwi, citron vert, menthe, vanille, sucre</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-04', 'products/KyDKWuVke0cObB5aeZ9X4sUNIE1O9vL3ZHBmNuLV.jpg', 1, 10, 1, 1, '2025-12-11 14:33:33', '2026-03-26 16:41:52'),
(145, 'Muffin aux 2 fromages oignons et noix caramélisés', 3.20, 4, NULL, '<p>Oignon, noix, emmental, cantal, farine, levure, bicarbonate de sodium, lait, crème fraîche, beurre, oeuf, romarin, huile d\'olive, muscade, poivre, sel</p>', '<p>Gluten, lactose, oeuf, fruit à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-05-03', 'products/pTFGQwpOQX7NmO49YVQ2d7azp2BcDp7uQtyZFfmm.png', 1, 10, 1, 1, '2025-12-11 14:42:18', '2026-04-02 11:28:12'),
(146, 'Burrito au boeuf', 9.90, 2, NULL, '<p><i>Tortilla, bœuf, riz, poivron, tomate, avocat, oignon rouge, haricot rouge, maïs, citron, persil, crème fraîche, emmental, cheddar, huile d’olive, cumin, poivre, sel</i></p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"null\"', '2026-05-03', 'products/udH609Ry1PFqy0VpSVyNPduWlz1QR2FqZZyjamb3.png', 1, 10, 1, 1, '2025-12-12 13:48:48', '2026-04-02 11:29:14'),
(147, 'Torsades et champignons arrabbiata', 8.90, 2, NULL, '<p>Torsade, champignon de Paris, tomate, oignon, ail, basilic, persil, olive noire, concentré de tomates, huile d\'olive, vinaigre balsamique, piment, sel</p>', '<p>Gluten, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"Veggie\\\",\\\"Piquant\\\",\\\"Sans Lactose\\\"]\"', '2026-05-03', 'products/buCJKN9trspFqyoS8hZ8ZZWhBkwBD1eVUdjGKbUo.png', 1, 10, 1, 1, '2025-12-12 13:50:24', '2026-04-02 11:28:43'),
(148, 'Ratatouille au basilic et pommes de terre écrasées', 8.90, 2, NULL, '<p>Aubergine, pomme de terre, courgette, poivron, tomate, oignon, ail, thym, romarin, persil, ciboulette, basilic, concentré de tomates, huile d\'olive, vinaigre de vin, poivre, sucre, sel</p>', '<p>Sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-05-03', 'products/TdrWXqAuFEtJgOebJ9P7UnqOTCl0GE2BAYelvkC7.png', 1, 10, 1, 1, '2025-12-12 13:51:55', '2026-04-02 11:29:41'),
(149, 'Flan vegan aux pommes', 3.20, 5, NULL, '<p><i>Pomme golden, margarine, amidon de maïs, agar agar, boisson de soja, pâte d\'arachide, vanille, sucre</i></p>', '<p>Soja, arachide, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-05-03', 'products/IjbRo9SOjV9xZYsSWtvKYWVHX5qEikSamyLoa8iq.png', 1, 10, 1, 1, '2025-12-12 13:53:42', '2026-04-02 11:30:22'),
(150, 'Bavaroise au chocolat', 3.20, 5, NULL, '<p>Chocolat noir, lait, crème fraîche, beurre, oeuf, farine, gélatine animale, vanille, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2026-05-03', 'products/gYKIO3QKOptOnWChkAxjzU4bewy8dcqCAbtIJDNy.png', 1, 10, 1, 1, '2025-12-12 13:55:53', '2026-04-02 11:31:07'),
(151, 'Pastel tres leches', 3.20, 5, NULL, '<p>Lait, lait concentré sucré et non sucré, crème fraîche, cream cheese, œuf, farine, citron vert, huile de tournesol, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-05-03', 'products/FyV1qSZjnj0nLNlGW3pQH3ZxOkfokCsSJLosMGFk.png', 1, 10, 1, 1, '2025-12-12 13:57:28', '2026-04-02 11:31:32'),
(152, 'Quesadillas moelleuses au bœuf', 3.50, 4, NULL, '<p>Bœuf, tortilla, poivron, oignon, coriandre, crème fraîche, mozzarella, huile d\'olive, cumin, poivre, sel&nbsp;<br>Bœuf : origine France</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"null\"', '2026-01-12', 'products/Wcq9yEhgvNVA5twm0r33VlUgqJrAGChYh4ruJGGv.png', 1, 10, 1, 1, '2025-12-12 14:00:52', '2026-02-11 14:20:39'),
(153, 'Cake au chèvre et au romarin', 3.50, 4, NULL, '<p>Fromage de chèvre, romarin, tomate séchée, crème fraîche, œuf, farine, levure, citron, huile de tournesol, poivre, sel</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-11', 'products/vkN3ETltOwzumrhThZuip68bMvcrhoJEM54TJ39o.png', 1, 10, 1, 1, '2025-12-12 14:03:29', '2026-02-26 11:22:31'),
(154, 'Emincé de poulet et purée de butternut', 8.90, 2, NULL, '<p>Poulet, butternut, pomme de terre, oignon, ail, persil, thym, beurre, crème fraîche, huile de tournesol, curry, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2\' puissance 2</p>', '110', '\"null\"', '\"null\"', '2026-01-12', 'products/Ut6SHGXtfNsQnzlGIVKyxvvI4MeiZFw3hMlN7ZD3.png', 1, 10, 1, 1, '2025-12-12 14:04:47', '2026-02-11 15:29:08'),
(155, 'Truffade aux lardons de veau fumé et légumes rôtis', 8.90, 2, NULL, '<p>Pomme de terre, veau fumé, potiron, navet, cive, oignon, ail, persil, tomme de vache, crème fraîche, huile de tournesol, muscade, poivre, sel&nbsp;<br>Veau : origine UE</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-01-12', 'products/UsGc7rPlzoL1Bt0oZPi1CYRsZC3JXY8wL9MEklLA.png', 1, 9, 1, 1, '2025-12-12 14:06:33', '2026-02-11 14:56:43'),
(156, 'Poisson coco et verdures', 9.90, 2, NULL, '<p>Poisson blanc (selon arrivage), riz basmati, poivron rouge, haricot plat, courgette, carotte, tomate, oignon, cébette, coriandre, persil, laurier, citron vert, lait de coco, amidon de maïs, huile d\'olive, poivre, sel</p>', '<p>Poisson, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-01-12', 'products/1YaIkVCC3Sn97ABuRj3GvCSs4KKOskIKvS4PmKf7.png', 1, 10, 1, 1, '2025-12-12 14:09:33', '2026-02-13 12:34:47'),
(157, 'Chili sin carne', 8.90, 2, NULL, '<p>Riz, quinoa, carotte, poivron, patate douce, tomate, oignon, ail, persil, citron vert, maïs, haricot rouge, pois chiche, graine de sésame, huile d\'olive, cumin, cardamome, piment chipotle, sel</p>', '<p>Fruit à coque, traces possibles d\'oeuf</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)<br>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés) . Peut aussi se déguster froid</p>', '400', '\"null\"', '\"null\"', '2026-01-12', 'products/Sfa43wKtBkesVtqDP84uFNM5dVvH4J21nugQ5pWo.png', 1, 10, 1, 1, '2025-12-12 14:11:00', '2026-04-02 19:14:51'),
(158, 'Crumble végan aux figues et aux noix', 3.50, 5, NULL, '<p>Figue, pomme golden, citron, noix, poudre d\'amandes, farine, margarine, vanille, sucre</p>', '<p>Gluten, soja, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2026-01-12', 'products/2kctC5egiAKiiqcoDxsfDy2FeHzCAtXrh0KjzRR4.jpg', 1, 10, 1, 1, '2025-12-12 14:12:31', '2025-12-12 14:12:31'),
(159, 'Gâteau chocolat noisette', 3.50, 5, NULL, '<p>Chocolat noir, noisette, poudre de noisettes, beurre, crème fraîche, oeuf, farine, levure, sel, sucre</p>', '<p>Gluten, lactose, oeuf, fruit à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"null\"', '2026-01-12', 'products/FxXKiUsWpcbaA5WN44KSUgk4r4QtGVvS7nYFoTdD.png', 1, 10, 1, 1, '2025-12-12 14:13:48', '2026-02-19 13:18:08'),
(160, 'Wraps aux légumes', 3.20, 4, NULL, '<p>Tortilla, carotte, poivron, concombre, tomate, laitue, oignon, cheddar, œuf, moutarde, vinaigre de vin, huile de tournesol, curry, paprika, poivre, sel</p>', '<p>Gluten, lactose, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-09', 'products/5v2slyOR5lc5VYh3qkjFFpjvWAvLYdqUd6q4VLcc.png', 1, 10, 1, 1, '2025-12-12 14:15:31', '2026-04-03 12:15:18'),
(161, 'Salade de pommes de terre au saumon fumé', 3.20, 4, NULL, '<p>Pomme de terre, saumon fumé, tomate, oignon, ciboulette, oeuf, moutarde, huile d\'olive, vinaigre de vin, poivre, sel</p>', '<p>Poisson, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-09', 'products/HuJGuEEaxpJ9EVDols62B9l2UBu2uCfBIdgEsDrI.png', 1, 10, 1, 1, '2025-12-12 14:16:48', '2026-04-03 12:16:13'),
(162, 'Poulet Marengo', 8.90, 2, NULL, '<p>Poulet, pomme de terre, champignon de Paris, cébette, carotte, tomate, oignon, cive, persil, thym, laurier, amidon de maïs, concentré de tomates, huile de tournesol, vinaigre balsamique, poivre, sucre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-01-13', 'products/sHogGthkLhXBlzdBabgQfC2gjRe9DuRa3Yt6Jobc.jpg', 1, 10, 1, 1, '2025-12-12 14:17:59', '2025-12-12 14:17:59'),
(163, 'Far breton', 3.20, 5, NULL, '<p>Pruneau, lait, crème fraîche, beurre, oeuf, farine, rhum, vanille, sel, sucre</p>', '<p>Gluten, lactose, oeuf, sulfites, alcool, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"Veggie\\\",\\\"Alcool\\\"]\"', '2026-04-09', 'products/kdrTLwuBPDs854vZAkroiCFOFhcnUUvxpdKqVovw.jpg', 1, 10, 1, 1, '2025-12-12 14:19:17', '2026-03-26 17:56:06'),
(164, 'Pesto de poulet et pennes au parmesan', 3.20, 4, NULL, '<p>Poulet, penne, tomate, oignon, ail, basilic, parmesan, citron, pignon de pin, huile d\'olive, vinaigre balsamique, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, oeuf, fruit à coque, sulfites</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-04-10', 'products/dYs8TEUUZzFYs4L8VXvMnUzYxoutKfG3QY9elkZW.jpg', 1, 9, 1, 1, '2025-12-12 14:20:41', '2026-04-09 13:30:13'),
(166, 'Pesto rosso vegan de légumes au citron confit', 8.90, 2, NULL, '<p>Potiron, quinoa, panais, rutabaga, tomate, ail, basilic, persil, thym, citron, citron confit, pignon de pin, tomate séchée, concentré de tomates, huile d’olive, poivre, sel</p>', '<p>Fruit à coque, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-01-14', 'products/GCceX9UD72dezFzKIMmG4RVBPvv4C9wkPw8bT1RZ.jpg', 1, 10, 1, 1, '2025-12-12 14:23:26', '2025-12-12 14:23:26'),
(167, 'Poulet poêlé et purée de patate douce aux olives', 8.90, 2, NULL, '<p>Poulet, patate douce, pomme de terre, oignon, persil, thym, laurier, citron, crème fraîche, beurre, olive verte, amidon de maïs, huile d\'olive, curcuma, muscade, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-01-14', 'products/3PXKVTXiWpN56tenWFHvGGDFX3fjBBJORfHxElog.jpg', 1, 10, 1, 1, '2025-12-12 14:24:46', '2025-12-12 14:24:46'),
(168, 'Fondant au chocolat vegan sans gluten', 3.20, 5, NULL, '<p>Chocolat noir, poudre d\'amandes, margarine, lait de coco, boisson de soja, amidon de maïs, sucre</p>', '<p>Soja, fruit à coque, traces possibles d\'oeuf</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110', '\"null\"', '\"null\"', '2026-04-11', 'products/gJKJ4G5BBv8vbcBOsnwLUT3FI7ub6AXi2u0aGpE7.jpg', 1, 10, 1, 1, '2025-12-12 14:26:02', '2026-04-03 10:07:18'),
(169, 'Dulce de leche au citron', 3.20, 5, NULL, '<p>Lait, crème fraîche, beurre, oeuf, farine, citron, amidon de maïs, huile de tournesol, vanille, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2026-04-11', 'products/malgdWEmYJHl80rN5fyu3OHv6e45Ou26mkgAPA6J.jpg', 1, 10, 1, 1, '2025-12-12 14:27:28', '2026-04-03 10:24:43'),
(170, 'Quiche champignons mozzarella', 3.50, 4, NULL, '<p>Champignon de Paris, mozzarella, oignon, ail, ciboulette, thym, lait, crème fraîche, beurre, emmental, oeuf, farine, muscade, poivre, sel</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"null\"', '2026-04-12', 'products/G8br6tk9aMpgUjKqBYuuo90yelYHKWb5s0Uk7mF8.png', 1, 10, 1, 1, '2025-12-12 14:29:00', '2026-03-31 17:53:03'),
(171, 'Riso safrané de légumes verts au parmesan', 8.90, 2, NULL, '<p>Ingredients</p><p>Pâte riso, haricot vert, courgette, fève, cébette, carotte, tomate, oignon, ail, cive, persil, thym, romarin, citron, parmesan, concentré de tomates, huile d\'olive, safran, poivre, sucre, sel</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2 mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-04-20', 'products/qIBfpREER3SIL2RRZovu9CBJ3QUlkHFeIVDzxZ9b.jpg', 1, 10, 1, 1, '2025-12-12 14:31:45', '2026-03-31 20:52:28'),
(172, 'Brioche perdue au chocolat et aux noix', 3.50, 5, NULL, '<p>Chocolat, noix, farine, levure, lait, beurre, oeuf, sel, sucre</p>', '<p>Gluten, lactose, oeuf, fruit à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"null\"', '2026-04-11', 'products/yB0YbjNYniGiqxO0nf7zGhyvI4ZG2NZOXHhjCnfg.jpg', 1, 10, 1, 1, '2025-12-12 14:35:47', '2026-03-31 17:56:44'),
(173, 'Crème de lentilles au bleu et aux noix', 3.50, 4, NULL, '<p>Lentille verte, bleu d\'auvergne, noix, oignon, persil, thym, laurier, citron, crème fraîche, muscade, poivre, sel</p>', '<p>Lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"null\"', '2026-04-12', 'products/GLq6HfXawc3aeB3VbQ7cK2Ee77OEXOdZx6S9ZDUS.jpg', 1, 10, 1, 1, '2025-12-12 15:50:53', '2026-03-31 18:19:11'),
(174, 'Velouté de chou-fleur à l\'estragon', 3.50, 4, NULL, '<p>Chou-fleur, pomme de terre, estragon, thym, citron, boisson de soja, lait de coco, muscade, poivre, sel</p>', '<p>Soja, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"null\"', '2026-01-16', 'products/WWhIlJceDy3hdj8D0uN2m72GXq6fcpSZ4IFi74e2.jpg', 1, 10, 1, 1, '2025-12-12 15:52:19', '2025-12-12 15:52:19'),
(175, 'Tartiflette aux champignons', 8.90, 2, NULL, '<p>Pomme de terre, reblochon, champignon de Paris, oignon, ciboulette, crème fraîche, muscade, poivre, sel</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"null\"', '2026-01-16', 'products/2U02UOa1qzJAFZeL66K9NOteWnDTdJI451zMVzdQ.jpg', 1, 10, 1, 1, '2025-12-12 15:54:29', '2025-12-12 15:54:29'),
(176, 'Poulet chasseur', 8.90, 2, NULL, '<p>Poulet, champignon de Paris, pomme de terre, carotte, tomate, oignon, estragon, persil, thym, laurier, crème fraîche, huile d\'olive, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-04-13', 'products/pPKQMnbu1CHx6Evm25R40dWoBQyRLLtoqrP0VL9x.jpg', 1, 10, 1, 1, '2025-12-12 15:57:09', '2026-03-31 18:21:51'),
(177, 'Butternut grillé et quinoa aux châtaignes', 8.90, 2, NULL, '<p>Butternut, quinoa, châtaigne, rutabaga, navet, champignon de Paris, oignon rouge, persil, cive, thym, huile d\'olive, boisson de soja, cumin, curry, poivre, sucre, sel</p>', '<p>Soja, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400', '\"null\"', '\"null\"', '2026-01-16', 'products/TptdYzm9EeLQ8SEQRzYVyxjEX1U2np3QmCrzF1z3.jpg', 1, 10, 1, 1, '2025-12-12 15:59:10', '2025-12-12 15:59:10'),
(178, 'Compote de poires vanillées aux fruits secs', 3.20, 5, NULL, '<p>Poire, pomme golden, cranberry, noix de pécan, vanille, sucre</p>', '<p>Fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110', '\"null\"', '\"null\"', '2026-04-13', 'products/jdpQ6Ueb28N59QqCkU8opN3U5F9xkumgGhWnLYzb.jpg', 1, 10, 1, 1, '2025-12-12 16:00:37', '2026-04-03 10:23:57'),
(179, 'Moelleux au chocolat', 3.20, 5, NULL, '<p>Chocolat noir, beurre, crème fraîche, œuf, farine, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-29', 'products/ERPLTfuT4aN9wUDKQ35BlQaUSwWm2nyOsT7BpQSS.png', 1, 10, 1, 1, '2025-12-12 16:04:20', '2026-04-03 11:40:56'),
(180, 'Salade de pennes à la mozzarella', 3.20, 4, NULL, '<p>Penne, mozzarella, poivron, tomate, oignon, ail, basilic, parmesan, olive noire, pignon de pin, huile d\'olive, vinaigre balsamique, poivre, sel</p>', '<p>Gluten, lactose, œuf, fruit à coque, sulfites</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-25', 'products/hpaRsuFaL4waJug0eUBlGrNR9n0yedrIRo9db9Ja.jpg', 1, 10, 1, 1, '2026-01-22 19:36:10', '2026-04-02 11:32:59'),
(182, 'Boeuf braisé et fusillis aux tomates séchées', 9.90, 2, NULL, NULL, '<p>Gluten, œuf, sulfites, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"[\\\"Sans Lactose\\\"]\"', '2026-05-02', 'products/OZJuhIci563zKqxrxe7rINDEMUH6dWMtVNV5o2NJ.png', 1, 10, 1, 1, '2026-02-04 13:12:04', '2026-03-31 21:41:57'),
(183, 'Charlotte chocolat praliné', 3.20, 5, NULL, NULL, '<p>Gluten, lactose, oeuf, fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"null\"', '2026-05-01', 'products/7wParLJ04tKHyD8yi496wAmMy52XisINz1pHkRrw.png', 1, 10, 1, 1, '2026-02-04 13:13:45', '2026-04-02 18:44:12'),
(184, 'Crumble végan mangue citron vert', 3.20, 5, NULL, '<p>Mangue, pomme golden, citron vert, poudre d\'amandes, farine, margarine, vanille, sucre</p><p><br>&nbsp;</p>', '<p>Gluten, soja, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"null\"', '2026-02-06', NULL, 1, 10, 1, 1, '2026-02-04 13:19:01', '2026-02-04 13:19:01'),
(185, 'Tagliatelles à la carbonara de dinde fumée', 8.90, 2, NULL, '<p>Tagliatelle, dinde fumée, tomate, ciboulette, crème fraîche, parmesan, muscade, poivre, sel<br>Dinde : origine UE</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '400g', '\"null\"', '\"null\"', '2026-02-12', 'products/ntRs1d9YHO7hv7LnUelc4SnT15ZKzdBc5eWEhuKT.png', 1, 10, 1, 1, '2026-02-04 13:28:43', '2026-04-03 13:41:02'),
(187, 'Salade persillée de champignons croquants et crème de sésame', 3.20, 4, NULL, '<p>Champignon de Paris, persil, tahina, purée de pois chiche, boisson de soja, citron, tomate, graine de sésame, poivre, sel</p>', '<p>Soja, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '120', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-02-18', 'products/SJfXHrNVIlv0E8JGyCnsgUyhDUR5L63IyONJotAp.png', 1, 10, 1, 1, '2026-02-04 13:39:42', '2026-02-11 20:48:16'),
(188, 'Poêlée de légumes grillés à la crème de sésame', 8.90, 2, NULL, '<p>Aubergine, riz basmati, courgette, poivron, tomate, oignon, ail, persil, thym, romarin, tahin, huile d\'olive, vinaigre balsamique, cumin, curry, poivre, sel</p>', '<p>Fruit à coque, sulfites, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-16', 'products/3EJdpc8Ltygj26FL53Tu5BuiE1mqyPkCMkmmsLSD.png', 1, 10, 1, 1, '2026-02-04 13:42:32', '2026-03-31 19:02:36'),
(189, 'Salade de poire au thé noir', 3.20, 5, NULL, '<p><i>Poire, thé noir, menthe, citron, sucre</i></p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '120', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-02-19', 'products/XvuR6zj6B3SR8i7na9zjYmaGaOXciiGuTeqEX9Fl.jpg', 1, 10, 1, 1, '2026-02-04 13:43:51', '2026-02-11 21:04:40'),
(190, 'Sauté de bœuf aux haricots rouges et riz parfumé', 9.90, 2, NULL, '<p>Bœuf, riz basmati, haricot rouge, carotte, navet,, tomate, oignon, ail, persil, thym, laurier, amidon de maïs, concentré de tomates, huile d\'olive, paprika, cardamome, poivre, sel<br>Bœuf : origine UE</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"[\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-17', 'products/kztTynU1EtIQL3cIl4jKgQCy9VR7TMFwQNW07ie7.png', 1, 10, 1, 1, '2026-02-04 13:45:28', '2026-03-31 19:11:24'),
(191, 'Mijotée de bœuf et gratin dauphinois', 8.90, 2, NULL, '<p>Bœuf, pomme de terre, carotte, cébette, tomate, oignon, ail, persil, crème fraîche, lait, concentré de tomates, huile de tournesol, poivre, sucre, sel<br>Bœuf : origine UE</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400', '\"null\"', '\"null\"', '2026-02-20', 'products/eP3iuyufQZRSnxfOHriOEpAmmwLCb2Fy819nP5gv.png', 1, 10, 1, 1, '2026-02-04 13:46:46', '2026-02-13 11:21:38'),
(192, 'Quiche chèvre et courgettes', 3.20, 4, NULL, '<p>Fromage de chèvre, courgette, oignon, romarin, lait, crème fraîche, beurre, emmental, oeuf, farine, poivre, sel</p>', '<p>Gluten, lactose, œuf, traces possibles de fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)<br>A réchauffer 20 sec au micro-ondes (sans le couvercle) . À déguster tiède.</p>', '120g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-10', 'products/sg6zwOTBBMq5zfakOiqI4RTE2pWI8ZwSvXzpdZFt.png', 1, 10, 1, 1, '2026-02-04 13:48:29', '2026-03-26 17:58:01'),
(193, 'Burrito poulet guacamole', 8.90, 2, NULL, '<p>Tortilla, poulet, avocat, riz, poivron, courgette, tomate, maïs, haricot rouge, oignon, ail, persil, citron vert, oeuf, moutarde, huile d’olive, vinaigre de vin, cumin, poivre, sel<br>Poulet : origine Pologne</p>', '<p>Gluten, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '400g', '\"null\"', '\"[\\\"Halal\\\",\\\"Sans Lactose\\\"]\"', '2026-02-21', 'products/aey7EPoU5QaHfm9RPwas1ivnciSVHcNUborSzoEh.png', 1, 10, 1, 1, '2026-02-04 13:50:08', '2026-02-13 12:17:50'),
(194, 'Panna cotta à la mangue', 3.20, 5, NULL, '<p>Mangue, crème fraîche, gélatine animale, menthe, citron, vanille, sucre</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"Sans Gluten\\\"]\"', '2026-02-21', 'products/srPz818VvWE7pjIWFlZcLn4gleX4VVsRuTG02F4a.png', 1, 10, 1, 1, '2026-02-04 13:51:26', '2026-02-13 12:55:45'),
(195, 'Riso safrané aux légumes et au parmesan', 8.90, 2, NULL, '<p>Pâte riso, potimarron, panais, carotte, brocoli, tomate, oignon, ail, persil, thym, citron, crème fraîche, parmesan, huile d\'olive, safran, poivre, sel</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-23', 'products/H1aEagpk0eKbeTqrT3lOn2StU3muCUpJaTN4uZEI.png', 1, 10, 1, 1, '2026-02-04 13:53:23', '2026-02-13 13:52:30'),
(196, 'Salade César', 3.20, 4, NULL, '<p>Poulet, salade verte, haricot vert, tomate, échalote, ciboulette, parmesan, oeuf, pain de mie, câpre, moutarde, huile de tournesol, huile d\'olive, vinaigre de vin, poivre, sel<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"null\"', '2026-04-20', 'products/CuOkh8eWqcsnNvztLp7A28pKETdDUgzVJVRtBWVJ.png', 1, 10, 1, 1, '2026-02-04 13:54:43', '2026-03-31 20:49:39'),
(197, 'Quiche halloumi basilic', 3.20, 4, NULL, '<p>Halloumi, tomate séchée, olive noire, oignon, ail, basilic, lait, crème fraîche, beurre, oeuf, farine, huile d\'olive, poivre, sel</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '120', '\"null\"', '\"null\"', '2026-04-20', 'products/wX97k4WLoEjtYGkW6ZiL4VAuWlEI64qe2iFKYNw8.png', 1, 10, 1, 1, '2026-02-04 13:55:35', '2026-03-31 20:48:44'),
(198, 'Flan aux poires et crème d\'amandes', 3.20, 5, NULL, '<p>Poire, lait, crème fraîche, beurre, oeuf, farine, crème d\'amandes, vanille, sel, sucre</p>', '<p>Gluten, lactose, oeuf, fruit à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-25', 'products/fiu5g65Tp3nfnRlbUqdseMH6e0x5dzQnm66G6iGh.png', 1, 10, 1, 1, '2026-02-04 13:57:37', '2026-02-18 11:44:35'),
(199, 'Banoffee cacao café', 3.20, 5, NULL, '<p>Banane, cacao, mascarpone, crème fraîche, beurre, oeuf, farine, café, vanille, cannelle, cassonade, sel, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-25', 'products/Rg3xRm1obtjnXrQnslboXkGdBpLfILUu4MlTDUA8.png', 1, 10, 1, 1, '2026-02-04 13:58:29', '2026-02-18 11:51:32'),
(200, 'Tacos pollo pibil', 8.90, 2, NULL, '<p>Tortilla, poulet, poivron, courgette, carotte, tomate, oignon, persil, coriandre, citron vert, cheddar, huile d\'olive, cumin, poivre, sel<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-02-26', 'products/aBZjLid1c5d52KhHifDvQsBpYWssI8gDc6eK5Xnd.png', 1, 10, 1, 1, '2026-02-04 14:00:27', '2026-02-19 12:09:58'),
(202, 'Panna cotta pomme tonka', 3.20, 5, NULL, '<p>Pomme, fève de tonka, lait, crème fraîche, gélatine animale, vanille, sucre</p>', '<p>Lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"Sans Gluten\\\"]\"', '2026-02-26', 'products/lwjQYLZQ6LwXvkN9cdkCE3VJVtAsdpp9FZ3KwnNu.png', 1, 10, 1, 1, '2026-02-04 14:02:54', '2026-02-19 12:38:19'),
(203, 'Pommes grenailles sautées et potimarron aux noix', 8.90, 2, NULL, '<p>Pomme de terre grenaille, potimarron, champignon de Paris, tomate, ciboulette, citron, crème fraîche, parmesan, noix, muscade, poivre, sel</p>', '<p>Lactose, fruit à coque, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"Veggie\\\",\\\"Sans Gluten\\\"]\"', '2026-02-27', 'products/vxVpDlf4sjfmzF5ymxhZ7XkIXIcJ0c21g3GEOU2x.png', 1, 10, 1, 1, '2026-02-04 14:05:10', '2026-02-19 13:08:43'),
(204, 'Petit pot au chocolat et caramel salé', 3.20, 5, NULL, '<p>Chocolat noir, lait, crème fraîche, oeuf, vanille, sel, sucre</p>', '<p>Lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"Veggie\\\",\\\"Sans Gluten\\\"]\"', '2026-02-27', 'products/LsuD1553Lhd71UrKuPd8olooCFxE4VchmiXwzp45.png', 1, 10, 1, 1, '2026-02-04 14:06:07', '2026-02-19 13:14:12'),
(205, 'Noisetier aux pépites de chocolat', 3.20, 5, NULL, '<p>Noisette, poudre de noisettes, poudre d\'amandes, chocolat noir, oeuf, beurre, farine, vanille, sucre</p>', '<p>Gluten, lactose, oeuf, fruit à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '120g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-27', 'products/IRuscUneYeF9htWlRtaIzy5YNbG4h3pXwW0gjj6R.png', 1, 10, 1, 1, '2026-02-04 14:07:29', '2026-04-02 11:56:50'),
(206, 'Salade de mangue au gingembre', 3.20, 5, NULL, '<p>Mangue, kiwi, menthe, gingembre, noix de coco, citron vert, cassonade</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-02-26', 'products/ejb4a2YjMSIk2gCmeaKhW927XOR6rw9sCUBrU1Ms.png', 1, 10, 1, 1, '2026-02-04 14:08:41', '2026-02-19 13:25:35'),
(207, 'Gâteau moelleux à la fleur d\'oranger', 3.20, 5, NULL, '<p>Lait, crème fraîche, beurre, huile de tournesol, farine, levure, œuf, citron, fleur d\'oranger, muscade, cannelle, vanille, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '120g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-28', 'products/bINppgYXKTgRfthhRuclbw97dCSiRMRIaPg5ylTu.png', 1, 10, 1, 1, '2026-02-04 14:10:50', '2026-02-19 14:20:18'),
(208, 'Quiche féta olives', 3.20, 4, NULL, '<p><i>Féta, olive noire, carotte, romarin, crème fraîche, lait, beurre, oeuf, farine, huile d\'olive, muscade, poivre, sel</i></p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '120g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-02-28', 'products/XiQOpWQzgKSWpEWvMhk5AFJdq4Geq3Dh8PEdmWPO.png', 1, 10, 1, 1, '2026-02-04 14:12:09', '2026-02-19 13:48:48'),
(209, 'Salade de poulet et fusillis à la mexicaine', 3.20, 4, NULL, '<p>Poulet, fusilli, poivron, tomate, oignon rouge, persil, citron vert, maïs, huile d\'olive, paprika fumé, poivre, sel<br>Poulet : origine Pologne</p>', '<p>Gluten, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"Halal\\\",\\\"Sans Lactose\\\"]\"', '2026-02-28', 'products/8f9AltZTSvh2lC4ERTPxava2tGYWPgZ6370mEMQB.png', 1, 10, 1, 1, '2026-02-04 14:13:07', '2026-02-19 13:46:33'),
(210, 'Entremets poire vanille', 3.20, 5, NULL, '<p>Poire, citron, lait concentré, beurre, oeuf, farine, levure, amidon de maïs, chocolat noir, vanille, sucre</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-29', 'products/h5XjJFQ3PobZvnhLf1YvAAU9CfxrymvnFpJj3c1x.png', 1, 10, 1, 1, '2026-02-04 14:14:56', '2026-04-02 12:13:13'),
(211, 'Salade de pamplemousse aux cranberries', 3.20, 5, NULL, '<p>Pamplemousse, kiwi, cranberry, menthe, vanille, sucre</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-03-04', 'products/uqcB1nNPhNBTytzChVR8baWjvrNqFG17ONFvXxgX.png', 1, 10, 1, 1, '2026-02-04 14:18:42', '2026-04-03 10:23:02'),
(212, 'Salade de pommes de terre féta viande des Grisons', 3.20, 5, NULL, '<p>Pomme de terre, viande des Grisons, tomate, oignon, persil, féta, oeuf, olive noire, moutarde, huile d\'olive, vinaigre de vin, poivre, sel<br>Bœuf : origine UE</p>', '<p>Lactose, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"[\\\"Sans Gluten\\\"]\"', '2026-05-01', 'products/pucY9dxCbZuKDJjLGBYadgGc2GjNNuLyAVQJhdhp.png', 1, 10, 1, 1, '2026-02-04 14:20:50', '2026-03-31 21:29:15'),
(213, 'Grande salade de poulet basilic et parmesan', 8.90, 2, NULL, '<p>Poulet, quinoa, carotte, courgette, haricot vert, tomate, oignon, ail, salade verte, persil, basilic, thym, parmesan, huile d\'olive, vinaigre balsamique, poivre, sel<br>Poulet : origine Pologne</p>', '<p>Lactose, sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '400g', '\"null\"', '\"[\\\"Halal\\\",\\\"Sans Gluten\\\"]\"', '2026-05-02', 'products/o7rFoExrZREP5qc82nmPE6f14S9LX1OyH7x2SxT9.png', 1, 10, 1, 1, '2026-02-04 14:22:07', '2026-03-31 21:42:57'),
(214, 'Grande salade chèvre et poulet', 8.90, 2, NULL, '<p>Poulet, fromage de chèvre, boulgour, courgette, carotte, tomate, oignon, ail, salade verte, menthe, persil, thym, citron, huile d\'olive, vinaigre de cidre, cumin, poivre, sel<br>Poulet : origine UE</p>', '<p>Gluten, lactose, sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '400g', '\"null\"', '\"null\"', '2026-04-08', 'products/FNLDa8sTacCxVxR8Bj4QmB9P6XzAPUY0kJSd6MIa.png', 1, 10, 1, 1, '2026-02-04 14:24:27', '2026-04-02 18:40:59'),
(215, 'Poulet basquaise', 8.90, 2, NULL, '<p>Poulet, riz basmati, poivron, courgette, tomate, oignon, ail, romarin, concentré de tomates, huile d\'olive, vinaigre de vin, paprika, piment d\'Espelette, sucre, sel<br>Poulet : origine Pays-Bas</p>', '<p>Sulfites, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2\' puissance 2</p><p>&nbsp;</p>', '400g', '\"null\"', '\"null\"', '2026-02-12', NULL, 1, 10, 1, 1, '2026-02-04 14:25:32', '2026-02-04 14:25:32'),
(216, 'Tagliatelles à la carbonara de veau fumé', 8.90, 2, NULL, NULL, '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-04-09', 'products/fR8jyOOUp1z9ywv6dEQQ0rgF2cKq3IiX8yxKMb1F.png', 1, 10, 1, 1, '2026-02-04 14:27:45', '2026-04-03 12:23:04'),
(217, 'Salade d\'avocat et halloumi au sésame noir', 3.20, 4, NULL, '<p>Avocat, pomme de terre, tomate, oignon, ail, persil, graine de sésame noir, huile d\'olive, vinaigre de vin, poivre, sel</p>', '<p>Lactose, fruit à coque, sulfites, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '120g', '\"null\"', '\"null\"', '2026-03-13', NULL, 1, 10, 1, 1, '2026-02-04 14:28:53', '2026-02-04 14:28:53'),
(219, 'Lieu riso au pesto rosso', 10.90, 2, NULL, '<p><i>Lieu, pâte riso, carotte, haricot vert, tomate, oignon, ail, basilic, citron, parmesan, pignon de pin, tomate séchée, concentré de tomates, huile d\'olive, poivre, sel</i></p>', '<p>Poisson, gluten, lactose, oeuf, fruit à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-02-26', 'products/YlWhiAJ29LV05xpramxGTJAXWodWyyFu6aYtPvAT.png', 1, 10, 1, 1, '2026-02-19 12:18:21', '2026-02-19 12:18:21'),
(220, 'Wraps aux égumes', 3.20, 4, NULL, '<p>Tortilla, carotte, poivron, concombre, tomate, laitue, oignon, cheddar, œuf, moutarde, vinaigre de vin, huile de tournesol, curry, paprika, poivre, sel</p>', '<p>Gluten, lactose, oeuf, moutarde, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-03-08', NULL, 1, 10, 1, 1, '2026-03-24 11:36:43', '2026-03-24 11:36:43'),
(229, 'Linguine alla bolognese', 9.90, 2, NULL, '<p>Linguine, bœuf, carotte, tomate, oignon, ail, thym vert, romarin, parmesan, concentré de tomates, huile d\'olive, poivre, sel&nbsp;<br>Bœuf : origine France</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"null\"', '2026-04-10', NULL, 1, 10, 1, 1, '2026-03-24 12:35:42', '2026-03-24 12:35:42'),
(230, 'Fricassée de poulet et purée de patate douce au thym', 8.90, 2, NULL, '<p>Poulet, patate douce, pomme de terre, oignon, persil, thym, laurier, citron, crème fraîche, beurre, amidon de maïs, huile d\'olive, curcuma, muscade, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"Halal\\\",\\\"Sans Gluten\\\"]\"', '2026-04-10', NULL, 1, 10, 1, 1, '2026-03-24 12:41:27', '2026-03-24 12:41:27'),
(231, 'Blanquette de veau à l\'ancienn', 10.90, 2, NULL, '<p>Veau, riz basmati, carotte, champignon de Paris, oignon, persil, citron, laurier, crème fraîche, farine, beurre, girofle, poivre, sel&nbsp;<br>Veau : origine UE</p>', '<p>Gluten, lactose, traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"null\"', '2026-04-10', 'products/AVOCQQqSBqcY2LJh6ExsVMjFidfO6JT3hLlNup5O.png', 1, 10, 1, 1, '2026-03-24 12:44:17', '2026-04-02 19:17:41'),
(232, 'Poêlée d\'asperges et pommes grenailles au romarin', 8.90, 2, NULL, '<p>Asperge verte, pomme de terre grenaille, fève, carotte, tomate, cébette, oignon, estragon, thym, romarin, concentré de tomates, huile d\'olive, poivre, sucre, sel</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-10', NULL, 1, 10, 1, 1, '2026-03-24 12:46:44', '2026-03-24 12:46:44'),
(235, 'Salade de poulet et fusillis à la grecque', 3.20, 4, NULL, '<p>Poulet, fusilli, féta, concombre, poivron, oignon rouge, persil, olive noire, huile d\'olive, vinaigre de vin, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, oeuf, sulfites, traces possibles de fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-04-11', NULL, 1, 10, 1, 1, '2026-03-24 12:54:35', '2026-03-24 12:54:35'),
(239, 'Salade de mangue et fruit de la passion', 3.20, 5, NULL, '<p>Mangue, fruit de la passion, kiwi, noix de coco, menthe, sucre</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-11', 'products/y3dANofyJIuCq6tAngGMFQ2snBYhFZcjkiKW0tOG.png', 1, 10, 1, 1, '2026-03-24 13:04:47', '2026-04-02 17:45:43'),
(241, 'Farfalles au pesto d\'amandes et mozzarella', 8.90, 2, NULL, '<p>Farfalle, mozzarella, courgette, champignon de Paris, tomate, cébette, oignon, ail, basilic, persil, thym, citron, parmesan, poudre d\'amandes, huile d\'olive, poivre, sel</p>', '<p>Gluten, lactose, œuf, fruit à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-12', 'products/NJSkOSP6ZFpZHilIKZEkOqrtgxPIheHn34t7JO8Y.png', 1, 10, 1, 1, '2026-03-24 13:12:50', '2026-04-02 18:01:18'),
(243, 'Courgette farcie à la basquaise', 8.90, 2, NULL, '<p>Courgette, riz basmati, aubergine, poivron, tomate, cébette, oignon, ail, basilic, cive, persil, thym, romarin, concentré de tomates, huile d\'olive, curry, cardamome, poivre, sel</p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Gluten\\\"]\"', '2026-04-12', NULL, 1, 10, 1, 1, '2026-03-24 13:17:26', '2026-03-24 13:17:26'),
(246, 'Guacamole haché au maïs', 3.20, 4, NULL, '<p>Avocat, maïs, tomate, oignon rouge, coriandre, persil, citron vert, huile d\'olive, poivre, sel</p>', '<p>Traces possibles d\'œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-29', 'products/c6ZKlGswG4imOgWNrebRMuCPZjgV7qBT6s4dMuO0.png', 1, 10, 1, 1, '2026-03-24 13:27:34', '2026-03-31 21:14:17'),
(247, 'Cake poulet féta', 3.20, 4, NULL, '<p>Poulet, féta, olive verte, thym, romarin, farine, levure, bicarbonate de sodium, lait, oeuf, huile de tournesol, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, oeuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110g', '\"null\"', '\"[\\\"Halal\\\"]\"', '2026-04-29', 'products/gQcXXCL10XfehDgUXjcw6eOqNXwPnhPuywvqzMfm.png', 1, 10, 1, 1, '2026-03-24 13:29:34', '2026-03-31 21:15:21'),
(315, 'Curry de légumes au tofu', 8.90, 2, NULL, '<p>Brocoli, lentille verte, tofu, haricot rouge, pois chiche, navet, carotte, oignon, ail, cive, persil, laurier, citron, lait de coco, huile d\'olive, curry, curcuma, cannelle, cardamome, poivre, sel</p>', '<p>Soja, traces possibles d’œuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-30', 'products/Z5YZQkwCl7rKCy0RHV4OUYXZ0SNx2FxPlkLXYXqR.png', 1, 10, 1, 1, '2026-03-26 13:21:25', '2026-04-02 12:54:12'),
(316, 'Coquillettes aux asperges façon risotto', 8.90, 2, NULL, '<p>Coquillette, asperge, oignon, ciboulette, persil, thym, crème fraîche, beurre, parmesan, huile d\'olive, safran, poivre, sel</p>', '<p>Gluten, lactose, œuf, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"[\\\"Veggie\\\"]\"', '2026-04-30', 'products/U3j1YhDtRGLtCqu4iqqHlmqMgEc59fM4MzjJ38Uy.png', 1, 10, 1, 1, '2026-03-26 13:26:50', '2026-04-02 12:47:42'),
(317, 'Sauté de bœuf et patate douce à la mexicaine', 9.90, 2, NULL, '<p>Bœuf, patate douce, poivron, maïs, courgette, pomme de terre, cébette, oignon rouge, ail, persil, thym, concentré de tomates, huile d\'olive, cumin, piment chipotle, poivre, sucre, sel&nbsp;<br>Bœuf : origine UE</p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"[\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-30', 'products/634sjCznJ76ppUhBzhTZAOWzj0hFyIvfFekN6pH9.png', 1, 10, 1, 1, '2026-03-26 13:28:37', '2026-04-02 12:40:31'),
(321, 'Salade de fraises à l\'hibiscus et aux cranberries', 3.20, 5, NULL, '<p>Fraise, cranberry, hibiscus, menthe, vanille, sucre</p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-04-30', 'products/anRRAMUUQpS4I3udtEYqTJWLAAjgn8SOTwBmw5ft.png', 1, 10, 1, 1, '2026-03-26 13:43:43', '2026-04-02 12:57:50'),
(324, 'Pesto rosso de légumineuses', 8.90, 2, NULL, '<p>Quinoa, lentille verte, pois chiche, maïs, tofu, brocoli, courgette, carotte, tomate, oignon, ail, basilic, persil, thym, pignon de pin, tomate séchée, concentré de tomates, huile d\'olive, vinaigre de vin, poivre, sel</p>', '<p>Soja, fruit à coque, traces possibles d’œuf</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Gluten\\\",\\\"Sans Lactose\\\"]\"', '2026-05-01', 'products/g4Zx9QtETv8ebGwpEIPBKh7XVcZWLvYYbwoxpqnU.png', 1, 10, 1, 1, '2026-03-26 16:19:46', '2026-04-02 13:02:14'),
(325, 'Salade de blé aux asperges et sésame noir', 3.20, 4, NULL, '<p>Asperge verte, blé, pousse d\'épinard, tomate, persil, graine de sésame noir, huile d\'olive, vinaigre de vin, poivre, sel</p>', '<p>Gluten, fruit à coque, sulfites, traces possibles d’œuf</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"null\"', '2026-04-14', NULL, 1, 10, 1, 1, '2026-03-31 18:31:26', '2026-04-03 10:06:08'),
(326, 'Salade de pousses d\'épinard et crumble au parmesan', 3.20, 4, NULL, '<p>Pousse d\'épinard, courgette, tomate, ail, beurre, farine, parmesan, huile d\'olive, vinaigre balsamique, poivre, sel</p>', '<p>Gluten, lactose, moutarde, sulfites, traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"null\"', '2026-04-15', 'products/e0jOTBxxg8pThPO602ndhbSwLPZTDew3DmpF3q1O.jpg', 1, 10, 1, 1, '2026-03-31 18:34:32', '2026-04-03 10:06:30'),
(327, 'Tacos au bœuf et guacamole', 8.90, 2, NULL, '<p>Tortilla, bœuf, avocat, patate douce, poivron, tomate, oignon rouge, haricot rouge, maïs, citron, persil, cheddar, huile d\'olive, paprika, poivre, sel&nbsp;<br>Bœuf : origine France</p>', '<p>Gluten, lactose, traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-04-15', NULL, 1, 10, 1, 1, '2026-03-31 18:37:52', '2026-03-31 18:37:52'),
(328, 'Artichaut grillé et quinoa aux petits pois', 3.20, 2, NULL, '<p>Artichaut, quinoa, petit pois, carotte, navet, tomate, oignon rouge, cébette, persil, thym, romarin, huile d\'olive, boisson de soja, concentré de tomates, huile d\'olive, poivre, sucre, sel</p>', '<p>Soja, traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-04-15', NULL, 1, 10, 1, 1, '2026-03-31 18:40:10', '2026-04-03 10:05:46'),
(329, 'Lieu au four et pennes au pesto rosso', 8.90, 2, NULL, '<p>Lieu, penne, tomate, oignon, ail, basilic, citron, parmesan, pignon de pin, tomate séchée, concentré de tomates, huile d\'olive, poivre, sucre, sel</p>', '<p>Poisson, gluten, lactose, œuf, fruit à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2 mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-04-15', 'products/KxuDa0Pz8er5sOlgF086kENz9dYoLCQYorVWPT08.png', 1, 10, 1, 1, '2026-03-31 18:45:17', '2026-04-02 18:10:41'),
(330, 'Poulet et tagliatelles en crème de parmesan', 8.90, 2, NULL, '<p>Poulet, tagliatelle, champignon de Paris, carotte, brocoli, tomate, ciboulette, persil, thym, citron, crème fraîche, parmesan, huile d\'olive, poivre, sel&nbsp;<br>Poulet : origine Pays-Bas</p>', '<p>Gluten, lactose, œuf, traces possibles de fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"null\"', '2026-04-16', NULL, 1, 10, 1, 1, '2026-03-31 18:48:57', '2026-03-31 18:48:57'),
(331, 'Salade de fraises et kiwi au citron vert', 3.20, 5, NULL, '<p>Fraise, kiwi, menthe, citron vert, vanille, sucre</p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"null\"', '2026-04-15', 'products/b89BFipPvh9xRnbJ3F0OO9tJPgambVZAHvDbVyr9.png', 1, 10, 1, 1, '2026-03-31 18:52:26', '2026-04-03 10:21:56'),
(332, 'Salade d\'aubergines grillées au romarin', 3.20, 4, NULL, '<p>Aubergine, riz, tomate, cébette, oignon, ail, romarin, persil, huile d\'olive, vinaigre balsamique, poivre, sel</p>', '<p>Sulfites, traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"null\"', '2026-04-16', 'products/1EfLORbiAJNjDLOUi3Tt2pV3MPhOt5RF4J7qsM9c.png', 1, 10, 1, 1, '2026-03-31 18:55:44', '2026-04-03 10:22:20');
INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `short_description`, `ingredients`, `allergens`, `preparation_advice`, `weight`, `nutritional_values`, `dietary_preferences`, `expiry_date`, `image`, `status`, `quantity`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(334, 'Quesadillas moelleuses au poulet', 3.20, 4, NULL, '<p>Tortilla, poulet, poivron, tomate, oignon rouge, persil, mozzarella, crème fraîche, poivre, sel&nbsp;<br>Poulet : origine Pologne</p>', '<p>Gluten, lactose, traces possibles d’œuf et fruits à coque</p>', '<p>A réchauffer 20 sec au micro-ondes (sans le couvercle)</p>', '110g', '\"null\"', '\"null\"', '2026-04-16', 'products/SUTV8FJhnQJdWdO7jHwcVdealxCxm16AlSNFDr9n.png', 1, 10, 1, 1, '2026-03-31 18:58:47', '2026-04-03 10:04:52'),
(335, 'Compotée d\'aubergines et pommes de terre arrabbiata', 8.90, 2, NULL, '<p>Aubergine, pomme de terre, courgette, tomate, cébette, oignon, ail, persil, thym, laurier, parmesan, concentré de tomates, huile d\'olive, vinaigre balsamique, paprika, piment, poivre, sucre, sel</p>', '<p>Lactose, sulfites, traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-04-16', 'products/cuG7QeMrRmQDwBELjfiRsQ3QfbRxEabaQRzSTThD.png', 1, 10, 1, 1, '2026-03-31 19:00:48', '2026-04-02 18:22:47'),
(336, 'Salade de fraises au thé noir', 3.20, 5, NULL, '<p>Fraise, thé noir, menthe, citron, vanille, sucre</p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"null\"', '2026-04-16', 'products/zZl3OjjyDzLwrcJzN9Lv4FVKTC6v4m3yGTNmUkPt.png', 1, 10, 1, 1, '2026-03-31 19:04:35', '2026-04-02 18:23:27'),
(337, 'Salade d\'artichaut aux tomates confites', 3.20, 4, NULL, '<p>Artichaut, tomate confite, tomate, courgette, oignon, pousse d\'épinard, persil, menthe, huile d\'olive, vinaigre de vin, poivre, sel</p>', '<p>Sulfites, traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"null\"', '2026-04-17', NULL, 1, 10, 1, 1, '2026-03-31 19:08:10', '2026-04-03 10:05:17'),
(338, 'Poêlée de légumes à la mexicaine', 8.90, 2, NULL, '<p>Aubergine, quinoa, maïs, courgette, brocoli, carotte, tomate, citron vert, oignon rouge, ail, cive, coriandre, persil, thym, huile d\'olive, roucou, poivre, sucre, sel</p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-04-17', 'products/0NxeHBxMxKLwBYOaFwPsVveTA3e5V3HYRUbIWkq6.png', 1, 10, 1, 1, '2026-03-31 19:13:41', '2026-04-03 11:50:42'),
(339, 'Crumble fraise rhubarbe', 3.20, 5, NULL, '<p>Fraise, rhubarbe, pomme golden, citron vert, menthe, beurre, farine, poudre d\'amandes, vanille, sucre</p>', '<p>Gluten, lactose, fruit à coque, traces possibles d’œuf</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"null\"', '2026-04-17', 'products/QLwzHfEGFiRjzmdS4CFfRDD7SNFMJ5Kf3JvEGQJX.jpg', 1, 10, 1, 1, '2026-03-31 19:19:30', '2026-04-02 18:34:15'),
(340, 'Cake poireau gorgonzola', 3.20, 4, NULL, '<p>Poireau, gorgonzola, crème fraîche, œuf, farine, levure, citron, huile de tournesol, poivre, sel</p>', '<p>Gluten, lactose, œuf, traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110g', '\"null\"', '\"null\"', '2026-04-18', NULL, 1, 10, 1, 1, '2026-03-31 19:35:24', '2026-04-02 12:14:11'),
(341, 'Tacos aux légumes sauce guacamole', 8.90, 2, NULL, '<p>Tortilla, carotte, courgette, poivron, avocat, tomate, quinoa, haricot rouge, maïs, oignon rouge, ail, persil, coriandre, citron vert, huile d\'olive, cumin, paprika, poivre, sel</p>', '<p>Gluten, traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-04-18', 'products/BgCCPl6iFLJGMQAPUD0oys6xMdNCGvjd1yimNlxt.png', 1, 10, 1, 1, '2026-03-31 19:40:30', '2026-04-02 18:35:15'),
(342, 'Panna cotta à la mangue', 3.20, 5, NULL, '<p>Mangue, crème fraîche, gélatine animale, menthe, citron, vanille, sucre</p>', '<p>Lactose, traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"null\"', '2026-04-18', NULL, 1, 10, 1, 1, '2026-03-31 20:44:40', '2026-04-03 10:21:33'),
(343, 'Velouté muscadé d\'asperges vertes', 3.20, 4, NULL, '<p>Asperge verte, pomme de terre, oignon, thym, persil, citron, lait de coco, boisson de soja, muscade, poivre, sel</p>', '<p>Soja, traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 30\" puissance 2</p>', '110g', '\"null\"', '\"null\"', '2026-04-20', 'products/M80oT3s34JAVnBWQ0oQPNyAiPYmjGPYgTCfOUgTb.png', 1, 10, 1, 1, '2026-03-31 20:47:27', '2026-04-02 18:35:56'),
(344, 'Chili au chorizo et paprika fumé', 8.90, 2, NULL, '<p>Poitrine de porc fumée, chorizo, riz basmati, carotte, poivron, tomate, oignon, ail, haricot rouge, maïs, persil, citron vert, huile d\'olive, cumin, gingembre, paprika fumé, piment chipotle, poivre, sel&nbsp;<br>Porc : origine UE</p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"[\\\"Piquant\\\",\\\"Porc\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-05-01', 'products/pZoaTZsnG7JKUEshZKkmtFWV4Az8rb9QW7Ik77Xr.png', 1, 10, 1, 1, '2026-03-31 21:07:37', '2026-04-02 19:10:38'),
(345, 'Salade de fraises au fruit de la passion', 3.20, 5, NULL, '<p><i>Fraise, fruit de la passion, menthe, vanille, sucre</i></p>', '<p>Fruit à coque, traces possibles d\'oeuf</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-05-03', 'products/Gcclkj36mjpnB1lqycINb8mkDfQdmmMZAFR4TASy.png', 1, 10, 1, 1, '2026-04-02 11:27:27', '2026-04-02 18:45:12'),
(346, 'Moussaka au boeuf', 9.80, 2, NULL, '<p><i>Aubergine, bœuf, tomate, oignon, ail, persil, thym, romarin, lait, beurre, emmental, farine, concentré de tomates, huile d\'olive, muscade, paprika, poivre, sucre, sel</i></p>', '<p>Gluten, lactose, traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-03-25', 'products/vZm2alGSf7SO9nNOwp3ZUmfSjaVVoLynyV12jd7X.png', 1, 10, 1, 1, '2026-04-02 11:36:39', '2026-04-02 18:49:01'),
(347, 'Dos de lieu riso au pesto rosso', 8.90, 2, NULL, NULL, '<p>Fruit à coque, sulfites, traces possibles d’œuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\"]\"', '2026-03-26', 'products/JZ3m8Pb6aPiptAi6c7XP68QQBLS0O8oEChQzmPBc.png', 1, 10, 1, 1, '2026-04-02 11:45:31', '2026-04-02 18:50:47'),
(348, 'Salade de champignons halloumi et tomates séchées', 3.20, 4, NULL, '<p><i>Champignon de Paris, halloumi, tomate séchée, potiron, oignon, persil, thym, huile d\'olive, vinaigre balsamique, poivre, sel</i></p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"V\\\\u00e9gan\\\",\\\"Sans Lactose\\\"]\"', '2026-03-26', NULL, 1, 10, 1, 1, '2026-04-02 11:49:46', '2026-04-02 11:49:46'),
(349, 'Poêlée de courgettes aux fèves et grenailles au romarin', 8.90, 2, NULL, '<p><i>Courgette, fève, pomme de terre grenaille, carotte, tomate, cébette, oignon, ail, persil, romarin, concentré de tomates, huile d\'olive, vinaigre de vin, poivre, sucre, sel</i></p>', '<p>Fruit à coque, sulfites, traces possibles d\'oeuf</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"[\\\"Sans Gluten\\\",\\\"Sans Lactose\\\"]\"', '2026-03-26', NULL, 1, 10, 1, 1, '2026-04-02 11:52:11', '2026-04-02 11:52:11'),
(350, 'Poivron farci au boeuf', 9.90, 2, NULL, '<p><i>Poivron rouge, bœuf, veau fumé, riz, aubergine, tomate, oignon, ail, persil, cive, thym, romarin, crème fraîche, pois chiche, concentré de tomates, huile d\'olive, paprika, poivre, sucre, sel</i></p>', '<p>Traces possibles d\'oeuf et fruits à coque</p>', '<p>A réchauffer sans le couvercle 2min au micro-ondes ou 10min au four (70 degrés)</p>', '400g', '\"null\"', '\"[\\\"Sans Lactose\\\",\\\"Sans Gluten\\\",\\\"Halal\\\"]\"', '2026-03-26', NULL, 1, 10, 1, 1, '2026-04-02 11:56:08', '2026-04-02 11:56:08'),
(351, 'Salade de poires et dattes à la fleur d\'oranger', 3.20, 5, NULL, '<p><i>Poire, citron, menthe, datte, eau de fleur d\'oranger, muscade, vanille, sucre</i></p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>A consommer froid</p>', '110g', '\"null\"', '\"[\\\"Sans Lactose\\\",\\\"Sans Gluten\\\"]\"', '2026-03-27', NULL, 1, 10, 1, 1, '2026-04-02 11:58:45', '2026-04-02 11:58:45'),
(352, 'Coquillettes et chou-fleur façon risotto', 8.90, 2, NULL, '<p><i>Coquillette, chou-fleur, oignon, ciboulette, persil, thym, crème fraîche, beurre, parmesan, huile d\'olive, safran, muscade, poivre, sel</i></p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance</p>', '400g', '\"null\"', '\"null\"', '2026-03-28', 'products/ErnUI8WV4WRD4o4m7fpayVokb9fRaRyaJot734ya.png', 1, 10, 1, 1, '2026-04-02 12:02:37', '2026-04-02 19:06:18'),
(353, 'Verdures poêlées au blé et au tofu', 8.90, 2, NULL, '<p><i>Coquillette, chou-fleur, oignon, ciboulette, persil, thym, crème fraîche, beurre, parmesan, huile d\'olive, safran, muscade, poivre, sel</i></p>', '<p>Traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-03-28', 'products/bXdr2QTAAp7Hp24dUS000c7MkBc5s7LmISD9GbEq.png', 1, 10, 1, 1, '2026-04-02 12:05:07', '2026-04-02 18:56:59'),
(354, 'Velouté de petits pois à l\'estragon', 3.20, 4, NULL, NULL, '<p>&nbsp;traces possibles de fruits à coque</p>', '<p>À déguster chaud ou froid .</p>', '110g', '\"null\"', '\"null\"', '2026-03-29', 'products/Y7RStVcys8RceQvJAmOHikKzyFkYaiKYfyljZaqq.png', 1, 10, 1, 1, '2026-04-02 12:09:33', '2026-04-02 19:06:55'),
(355, 'Poulet mariné aux herbes fraîches et riz aux fèves', 8.90, 2, NULL, '<p><i>Poulet, riz, fève, aubergine, carotte, tomate, cive, oignon, ail, persil, cive, estragon, thym, citron, graine de sésame, amidon de maïs, sauce soja, huile d\'olive, cardamome, poivre, sel</i></p>', '<p>Lactose, traces possibles d’œuf et fruits à coque</p>', '<p>À déguster chaud ou froid<br>À déguster chaud ou froid . Conseil de chauffe : 2mn puissance 2</p>', '400g', '\"null\"', '\"null\"', '2026-03-29', NULL, 1, 10, 1, 1, '2026-04-02 12:11:59', '2026-04-02 12:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_availabilities`
--

CREATE TABLE `product_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `available_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_availabilities`
--

INSERT INTO `product_availabilities` (`id`, `product_id`, `start_time`, `end_time`, `created_at`, `updated_at`, `available_date`) VALUES
(684, 8, '00:01:00', '23:59:00', '2025-10-31 17:36:50', '2025-10-31 17:36:50', '2025-10-31'),
(685, 8, '00:01:00', '23:59:00', '2025-10-31 17:36:50', '2025-10-31 17:36:50', '2025-11-01'),
(686, 8, '00:01:00', '23:59:00', '2025-10-31 17:36:50', '2025-10-31 17:36:50', '2025-11-02'),
(687, 8, '00:01:00', '23:59:00', '2025-10-31 17:36:50', '2025-10-31 17:36:50', '2025-11-03'),
(688, 8, '00:01:00', '23:59:00', '2025-10-31 17:36:50', '2025-10-31 17:36:50', '2025-11-04'),
(689, 8, '00:01:00', '23:59:00', '2025-10-31 17:36:50', '2025-10-31 17:36:50', '2025-11-05'),
(690, 8, '00:01:00', '23:59:00', '2025-10-31 17:36:50', '2025-10-31 17:36:50', '2025-11-06'),
(691, 8, '00:01:00', '23:59:00', '2025-10-31 17:36:50', '2025-10-31 17:36:50', '2025-11-07'),
(692, 9, '00:01:00', '23:59:00', '2025-10-31 17:37:27', '2025-10-31 17:37:27', '2025-10-31'),
(693, 9, '00:01:00', '23:59:00', '2025-10-31 17:37:27', '2025-10-31 17:37:27', '2025-11-01'),
(694, 9, '00:01:00', '23:59:00', '2025-10-31 17:37:27', '2025-10-31 17:37:27', '2025-11-02'),
(695, 9, '00:01:00', '23:59:00', '2025-10-31 17:37:27', '2025-10-31 17:37:27', '2025-11-03'),
(696, 9, '00:01:00', '23:59:00', '2025-10-31 17:37:27', '2025-10-31 17:37:27', '2025-11-04'),
(697, 9, '00:01:00', '23:59:00', '2025-10-31 17:37:27', '2025-10-31 17:37:27', '2025-11-05'),
(698, 9, '00:01:00', '23:59:00', '2025-10-31 17:37:27', '2025-10-31 17:37:27', '2025-11-06'),
(699, 9, '00:01:00', '23:59:00', '2025-10-31 17:37:27', '2025-10-31 17:37:27', '2025-11-07'),
(700, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-10-31'),
(701, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-11-01'),
(702, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-11-02'),
(703, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-11-03'),
(704, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-11-04'),
(705, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-11-05'),
(706, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-11-06'),
(707, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-11-07'),
(708, 10, '00:01:00', '23:59:00', '2025-10-31 17:38:07', '2025-10-31 17:38:07', '2025-11-08'),
(709, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-10-31'),
(710, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-11-01'),
(711, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-11-02'),
(712, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-11-03'),
(713, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-11-04'),
(714, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-11-05'),
(715, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-11-06'),
(716, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-11-07'),
(717, 12, '00:01:00', '23:59:00', '2025-10-31 17:38:47', '2025-10-31 17:38:47', '2025-11-08'),
(817, 33, '00:00:00', '10:30:00', '2025-11-27 11:45:12', '2025-11-27 11:45:12', '2025-12-09'),
(818, 33, '00:00:00', '10:30:00', '2025-11-27 11:45:12', '2025-11-27 11:45:12', '2025-12-10'),
(819, 33, '00:00:00', '10:30:00', '2025-11-27 11:45:12', '2025-11-27 11:45:12', '2025-12-11'),
(820, 34, '00:00:00', '10:30:00', '2025-11-27 11:46:54', '2025-11-27 11:46:54', '2025-12-09'),
(821, 34, '00:00:00', '10:30:00', '2025-11-27 11:46:54', '2025-11-27 11:46:54', '2025-12-10'),
(822, 34, '00:00:00', '10:30:00', '2025-11-27 11:46:54', '2025-11-27 11:46:54', '2025-12-11'),
(825, 31, '00:00:00', '10:30:00', '2025-11-27 11:50:25', '2025-11-27 11:50:25', '2025-12-09'),
(826, 31, '00:00:00', '10:30:00', '2025-11-27 11:50:25', '2025-11-27 11:50:25', '2025-12-10'),
(827, 31, '00:00:00', '10:30:00', '2025-11-27 11:50:25', '2025-11-27 11:50:25', '2025-12-11'),
(852, 43, '00:00:00', '10:30:00', '2025-11-27 12:09:08', '2025-11-27 12:09:08', '2025-12-11'),
(853, 43, '00:00:00', '10:30:00', '2025-11-27 12:09:08', '2025-11-27 12:09:08', '2025-12-12'),
(854, 43, '00:00:00', '10:30:00', '2025-11-27 12:09:08', '2025-11-27 12:09:08', '2025-12-13'),
(873, 50, '00:00:00', '10:30:00', '2025-11-27 12:24:51', '2025-11-27 12:24:51', '2025-12-12'),
(874, 50, '00:00:00', '10:30:00', '2025-11-27 12:24:51', '2025-11-27 12:24:51', '2025-12-13'),
(875, 50, '00:00:00', '10:30:00', '2025-11-27 12:24:51', '2025-11-27 12:24:51', '2025-12-14'),
(894, 57, '00:00:00', '10:30:00', '2025-11-27 12:46:21', '2025-11-27 12:46:21', '2025-12-01'),
(895, 57, '00:00:00', '10:30:00', '2025-11-27 12:46:21', '2025-11-27 12:46:21', '2025-12-02'),
(896, 57, '00:00:00', '10:30:00', '2025-11-27 12:46:21', '2025-11-27 12:46:21', '2025-12-03'),
(981, 69, '00:00:00', '10:30:00', '2025-11-27 15:48:00', '2025-11-27 15:48:00', '2025-12-03'),
(982, 69, '00:00:00', '10:30:00', '2025-11-27 15:48:00', '2025-11-27 15:48:00', '2025-12-04'),
(983, 69, '00:00:00', '10:30:00', '2025-11-27 15:48:00', '2025-11-27 15:48:00', '2025-12-05'),
(1014, 81, '00:00:00', '10:30:00', '2025-11-28 10:58:16', '2025-11-28 10:58:16', '2025-12-05'),
(1015, 81, '00:00:00', '10:30:00', '2025-11-28 10:58:16', '2025-11-28 10:58:16', '2025-12-06'),
(1016, 81, '00:00:00', '10:30:00', '2025-11-28 10:58:16', '2025-11-28 10:58:16', '2025-12-07'),
(1017, 68, '00:00:00', '10:30:00', '2025-11-28 10:58:47', '2025-11-28 10:58:47', '2025-12-03'),
(1018, 68, '00:00:00', '10:30:00', '2025-11-28 10:58:47', '2025-11-28 10:58:47', '2025-12-04'),
(1019, 68, '00:00:00', '10:30:00', '2025-11-28 10:58:47', '2025-11-28 10:58:47', '2025-12-05'),
(1038, 79, '00:00:00', '10:30:00', '2025-11-28 11:15:46', '2025-11-28 11:15:46', '2025-12-05'),
(1039, 79, '00:00:00', '10:30:00', '2025-11-28 11:15:46', '2025-11-28 11:15:46', '2025-12-06'),
(1040, 79, '00:00:00', '10:30:00', '2025-11-28 11:15:46', '2025-11-28 11:15:46', '2025-12-07'),
(1062, 95, '00:00:00', '10:30:00', '2025-11-28 11:30:17', '2025-11-28 11:30:17', '2025-12-16'),
(1063, 95, '00:00:00', '10:30:00', '2025-11-28 11:30:17', '2025-11-28 11:30:17', '2025-12-17'),
(1064, 95, '00:00:00', '10:30:00', '2025-11-28 11:30:17', '2025-11-28 11:30:17', '2025-12-18'),
(1065, 96, '00:00:00', '10:30:00', '2025-11-28 11:34:43', '2025-11-28 11:34:43', '2025-12-16'),
(1066, 96, '00:00:00', '10:30:00', '2025-11-28 11:34:43', '2025-11-28 11:34:43', '2025-12-17'),
(1067, 96, '00:00:00', '10:30:00', '2025-11-28 11:34:43', '2025-11-28 11:34:43', '2025-12-18'),
(1068, 97, '00:00:00', '10:30:00', '2025-11-28 11:36:32', '2025-11-28 11:36:32', '2025-12-16'),
(1069, 97, '00:00:00', '10:30:00', '2025-11-28 11:36:32', '2025-11-28 11:36:32', '2025-12-17'),
(1070, 97, '00:00:00', '10:30:00', '2025-11-28 11:36:32', '2025-11-28 11:36:32', '2025-12-18'),
(1074, 99, '00:00:00', '10:30:00', '2025-11-28 11:41:52', '2025-11-28 11:41:52', '2025-12-16'),
(1075, 99, '00:00:00', '10:30:00', '2025-11-28 11:41:52', '2025-11-28 11:41:52', '2025-12-17'),
(1076, 99, '00:00:00', '10:30:00', '2025-11-28 11:41:52', '2025-11-28 11:41:52', '2025-12-18'),
(1095, 104, '00:00:00', '10:30:00', '2025-11-28 11:54:47', '2025-11-28 11:54:47', '2025-12-17'),
(1096, 104, '00:00:00', '10:30:00', '2025-11-28 11:54:47', '2025-11-28 11:54:47', '2025-12-18'),
(1097, 104, '00:00:00', '10:30:00', '2025-11-28 11:54:47', '2025-11-28 11:54:47', '2025-12-19'),
(1207, 32, '00:00:00', '23:59:00', '2025-12-07 16:27:37', '2025-12-07 16:27:37', '2025-12-08'),
(1208, 32, '00:00:00', '23:59:00', '2025-12-07 16:27:37', '2025-12-07 16:27:37', '2025-12-09'),
(1209, 32, '00:00:00', '23:59:00', '2025-12-07 16:27:37', '2025-12-07 16:27:37', '2025-12-10'),
(1369, 143, '00:00:00', '23:59:00', '2025-12-12 13:44:23', '2025-12-12 13:44:23', '2026-01-06'),
(1370, 143, '00:00:00', '23:59:00', '2025-12-12 13:44:23', '2025-12-12 13:44:23', '2026-01-07'),
(1371, 143, '00:00:00', '23:59:00', '2025-12-12 13:44:23', '2025-12-12 13:44:23', '2026-01-08'),
(1414, 158, '00:00:00', '23:59:00', '2025-12-12 14:12:31', '2025-12-12 14:12:31', '2026-01-10'),
(1415, 158, '00:00:00', '23:59:00', '2025-12-12 14:12:31', '2025-12-12 14:12:31', '2026-01-11'),
(1416, 158, '00:00:00', '23:59:00', '2025-12-12 14:12:31', '2025-12-12 14:12:31', '2026-01-12'),
(1426, 162, '00:00:00', '23:59:00', '2025-12-12 14:17:59', '2025-12-12 14:17:59', '2026-01-11'),
(1427, 162, '00:00:00', '23:59:00', '2025-12-12 14:17:59', '2025-12-12 14:17:59', '2026-01-12'),
(1428, 162, '00:00:00', '23:59:00', '2025-12-12 14:17:59', '2025-12-12 14:17:59', '2026-01-13'),
(1438, 166, '00:00:00', '23:59:00', '2025-12-12 14:23:26', '2025-12-12 14:23:26', '2026-01-12'),
(1439, 166, '00:00:00', '23:59:00', '2025-12-12 14:23:26', '2025-12-12 14:23:26', '2026-01-13'),
(1440, 166, '00:00:00', '23:59:00', '2025-12-12 14:23:26', '2025-12-12 14:23:26', '2026-01-14'),
(1441, 167, '00:00:00', '23:59:00', '2025-12-12 14:24:46', '2025-12-12 14:24:46', '2026-01-12'),
(1442, 167, '00:00:00', '23:59:00', '2025-12-12 14:24:46', '2025-12-12 14:24:46', '2026-01-13'),
(1443, 167, '00:00:00', '23:59:00', '2025-12-12 14:24:46', '2025-12-12 14:24:46', '2026-01-14'),
(1468, 174, '00:00:00', '23:59:00', '2025-12-12 15:52:19', '2025-12-12 15:52:19', '2026-01-14'),
(1469, 174, '00:00:00', '23:59:00', '2025-12-12 15:52:19', '2025-12-12 15:52:19', '2026-01-15'),
(1470, 174, '00:00:00', '23:59:00', '2025-12-12 15:52:19', '2025-12-12 15:52:19', '2026-01-16'),
(1471, 175, '00:00:00', '23:59:00', '2025-12-12 15:54:29', '2025-12-12 15:54:29', '2026-01-14'),
(1472, 175, '00:00:00', '23:59:00', '2025-12-12 15:54:29', '2025-12-12 15:54:29', '2026-01-15'),
(1473, 175, '00:00:00', '23:59:00', '2025-12-12 15:54:29', '2025-12-12 15:54:29', '2026-01-16'),
(1477, 177, '00:00:00', '23:59:00', '2025-12-12 15:59:10', '2025-12-12 15:59:10', '2026-01-14'),
(1478, 177, '00:00:00', '23:59:00', '2025-12-12 15:59:10', '2025-12-12 15:59:10', '2026-01-15'),
(1479, 177, '00:00:00', '23:59:00', '2025-12-12 15:59:10', '2025-12-12 15:59:10', '2026-01-16'),
(1493, 59, '00:00:00', '10:30:00', '2026-01-21 14:19:46', '2026-01-21 14:19:46', '2026-01-21'),
(1494, 59, '00:00:00', '10:30:00', '2026-01-21 14:19:46', '2026-01-21 14:19:46', '2026-01-22'),
(1495, 59, '00:00:00', '10:30:00', '2026-01-21 14:19:46', '2026-01-21 14:19:46', '2026-01-23'),
(1496, 59, '00:00:00', '10:30:00', '2026-01-21 14:19:46', '2026-01-21 14:19:46', '2026-01-24'),
(1539, 184, '00:00:00', '01:00:00', '2026-02-04 13:19:01', '2026-02-04 13:19:01', '2026-02-04'),
(1540, 184, '00:00:00', '01:00:00', '2026-02-04 13:19:01', '2026-02-04 13:19:01', '2026-02-05'),
(1541, 184, '00:00:00', '01:00:00', '2026-02-04 13:19:01', '2026-02-04 13:19:01', '2026-02-06'),
(1574, 215, '00:00:00', '01:00:00', '2026-02-04 14:25:32', '2026-02-04 14:25:32', '2026-02-09'),
(1594, 152, '00:00:00', '23:59:00', '2026-02-11 14:20:39', '2026-02-11 14:20:39', '2026-01-10'),
(1595, 152, '00:00:00', '23:59:00', '2026-02-11 14:20:39', '2026-02-11 14:20:39', '2026-01-11'),
(1596, 152, '00:00:00', '23:59:00', '2026-02-11 14:20:39', '2026-02-11 14:20:39', '2026-01-12'),
(1612, 155, '00:00:00', '23:59:00', '2026-02-11 14:56:43', '2026-02-11 14:56:43', '2026-01-10'),
(1613, 155, '00:00:00', '23:59:00', '2026-02-11 14:56:43', '2026-02-11 14:56:43', '2026-01-11'),
(1614, 155, '00:00:00', '23:59:00', '2026-02-11 14:56:43', '2026-02-11 14:56:43', '2026-01-12'),
(1615, 37, '00:00:00', '10:30:00', '2026-02-11 15:12:18', '2026-02-11 15:12:18', '2025-12-10'),
(1616, 37, '00:00:00', '10:30:00', '2026-02-11 15:12:18', '2026-02-11 15:12:18', '2025-12-11'),
(1617, 37, '00:00:00', '10:30:00', '2026-02-11 15:12:18', '2026-02-11 15:12:18', '2025-12-12'),
(1621, 154, '00:00:00', '23:59:00', '2026-02-11 15:29:08', '2026-02-11 15:29:08', '2026-01-10'),
(1622, 154, '00:00:00', '23:59:00', '2026-02-11 15:29:08', '2026-02-11 15:29:08', '2026-01-11'),
(1623, 154, '00:00:00', '23:59:00', '2026-02-11 15:29:08', '2026-02-11 15:29:08', '2026-01-12'),
(1679, 187, '00:00:00', '23:59:00', '2026-02-11 20:48:16', '2026-02-11 20:48:16', '2026-02-16'),
(1680, 187, '00:00:00', '23:59:00', '2026-02-11 20:48:16', '2026-02-11 20:48:16', '2026-02-17'),
(1681, 187, '00:00:00', '23:59:00', '2026-02-11 20:48:16', '2026-02-11 20:48:16', '2026-02-18'),
(1695, 189, '00:00:00', '23:59:00', '2026-02-11 21:04:40', '2026-02-11 21:04:40', '2026-02-17'),
(1696, 189, '00:00:00', '23:59:00', '2026-02-11 21:04:40', '2026-02-11 21:04:40', '2026-02-18'),
(1697, 189, '00:00:00', '23:59:00', '2026-02-11 21:04:40', '2026-02-11 21:04:40', '2026-02-19'),
(1713, 191, '00:00:00', '23:59:00', '2026-02-13 11:21:38', '2026-02-13 11:21:38', '2026-02-18'),
(1714, 191, '00:00:00', '23:59:00', '2026-02-13 11:21:38', '2026-02-13 11:21:38', '2026-02-19'),
(1715, 191, '00:00:00', '23:59:00', '2026-02-13 11:21:38', '2026-02-13 11:21:38', '2026-02-20'),
(1724, 39, '00:00:00', '10:30:00', '2026-02-13 12:15:30', '2026-02-13 12:15:30', '2025-12-10'),
(1725, 39, '00:00:00', '10:30:00', '2026-02-13 12:15:30', '2026-02-13 12:15:30', '2025-12-11'),
(1726, 39, '00:00:00', '10:30:00', '2026-02-13 12:15:30', '2026-02-13 12:15:30', '2025-12-12'),
(1735, 44, '00:00:00', '23:59:00', '2026-02-13 12:34:19', '2026-02-13 12:34:19', '2026-02-19'),
(1736, 44, '00:00:00', '23:59:00', '2026-02-13 12:34:19', '2026-02-13 12:34:19', '2026-02-20'),
(1737, 156, '00:00:00', '23:59:00', '2026-02-13 12:34:47', '2026-02-13 12:34:47', '2026-01-10'),
(1738, 156, '00:00:00', '23:59:00', '2026-02-13 12:34:47', '2026-02-13 12:34:47', '2026-01-11'),
(1739, 156, '00:00:00', '23:59:00', '2026-02-13 12:34:47', '2026-02-13 12:34:47', '2026-01-12'),
(1740, 103, '00:00:00', '10:30:00', '2026-02-13 12:41:08', '2026-02-13 12:41:08', '2025-12-17'),
(1741, 103, '00:00:00', '10:30:00', '2026-02-13 12:41:08', '2026-02-13 12:41:08', '2025-12-18'),
(1742, 103, '00:00:00', '10:30:00', '2026-02-13 12:41:08', '2026-02-13 12:41:08', '2025-12-19'),
(1743, 85, '00:00:00', '10:30:00', '2026-02-13 12:41:33', '2026-02-13 12:41:33', '2025-12-15'),
(1744, 85, '00:00:00', '10:30:00', '2026-02-13 12:41:33', '2026-02-13 12:41:33', '2025-12-16'),
(1745, 85, '00:00:00', '10:30:00', '2026-02-13 12:41:33', '2026-02-13 12:41:33', '2025-12-17'),
(1748, 194, '00:00:00', '23:59:00', '2026-02-13 12:55:45', '2026-02-13 12:55:45', '2026-02-19'),
(1749, 194, '00:00:00', '23:59:00', '2026-02-13 12:55:45', '2026-02-13 12:55:45', '2026-02-20'),
(1800, 203, '00:00:00', '23:59:00', '2026-02-19 13:08:43', '2026-02-19 13:08:43', '2026-02-25'),
(1801, 203, '00:00:00', '23:59:00', '2026-02-19 13:08:43', '2026-02-19 13:08:43', '2026-02-26'),
(1802, 203, '00:00:00', '23:59:00', '2026-02-19 13:08:43', '2026-02-19 13:08:43', '2026-02-27'),
(1809, 159, '00:00:00', '22:59:00', '2026-02-19 13:18:08', '2026-02-19 13:18:08', '2026-01-10'),
(1810, 159, '00:00:00', '22:59:00', '2026-02-19 13:18:08', '2026-02-19 13:18:08', '2026-01-11'),
(1811, 159, '00:00:00', '22:59:00', '2026-02-19 13:18:08', '2026-02-19 13:18:08', '2026-01-12'),
(1812, 206, '00:00:00', '23:59:00', '2026-02-19 13:25:35', '2026-02-19 13:25:35', '2026-02-25'),
(1813, 206, '00:00:00', '23:59:00', '2026-02-19 13:25:35', '2026-02-19 13:25:35', '2026-02-26'),
(1819, 111, '00:00:00', '23:59:00', '2026-02-19 13:58:30', '2026-02-19 13:58:30', '2026-02-26'),
(1820, 111, '00:00:00', '23:59:00', '2026-02-19 13:58:30', '2026-02-19 13:58:30', '2026-02-27'),
(1821, 110, '00:00:00', '23:59:00', '2026-02-19 14:13:37', '2026-02-19 14:13:37', '2026-02-26'),
(1822, 110, '00:00:00', '23:59:00', '2026-02-19 14:13:37', '2026-02-19 14:13:37', '2026-02-27'),
(1823, 110, '00:00:00', '23:59:00', '2026-02-19 14:13:37', '2026-02-19 14:13:37', '2026-02-28'),
(1861, 132, '00:00:00', '23:59:00', '2026-02-25 14:27:47', '2026-02-25 14:27:47', '2026-03-03'),
(1862, 132, '00:00:00', '23:59:00', '2026-02-25 14:27:47', '2026-02-25 14:27:47', '2026-03-04'),
(1863, 132, '00:00:00', '23:59:00', '2026-02-25 14:27:47', '2026-02-25 14:27:47', '2026-03-05'),
(1864, 105, '00:00:00', '23:59:00', '2026-02-25 14:45:21', '2026-02-25 14:45:21', '2026-03-03'),
(1865, 105, '00:00:00', '23:59:00', '2026-02-25 14:45:21', '2026-02-25 14:45:21', '2026-03-04'),
(1866, 105, '00:00:00', '23:59:00', '2026-02-25 14:45:21', '2026-02-25 14:45:21', '2026-03-05'),
(1904, 153, '00:00:00', '23:59:00', '2026-02-26 11:22:31', '2026-02-26 11:22:31', '2026-03-09'),
(1905, 153, '00:00:00', '23:59:00', '2026-02-26 11:22:31', '2026-02-26 11:22:31', '2026-03-10'),
(1906, 153, '00:00:00', '23:59:00', '2026-02-26 11:22:31', '2026-02-26 11:22:31', '2026-03-11'),
(1912, 219, '00:00:00', '23:59:00', '2026-03-24 11:21:34', '2026-03-24 11:21:34', '2026-02-24'),
(1913, 219, '00:00:00', '23:59:00', '2026-03-24 11:21:34', '2026-03-24 11:21:34', '2026-02-25'),
(1914, 220, '00:00:00', '23:59:00', '2026-03-24 11:36:43', '2026-03-24 11:36:43', '2026-07-03'),
(1921, 195, '00:00:00', '23:59:00', '2026-03-24 12:01:28', '2026-03-24 12:01:28', '2026-02-20'),
(1922, 217, '00:00:00', '01:00:00', '2026-03-24 12:01:44', '2026-03-24 12:01:44', '2026-03-10'),
(1950, 193, '00:00:00', '23:59:00', '2026-03-24 12:18:12', '2026-03-24 12:18:12', '2026-02-19'),
(1951, 193, '00:00:00', '23:59:00', '2026-03-24 12:18:12', '2026-03-24 12:18:12', '2026-02-20'),
(2353, 75, '00:00:00', '10:30:00', '2026-03-26 17:51:27', '2026-03-26 17:51:27', '2026-04-07'),
(2354, 75, '00:00:00', '10:30:00', '2026-03-26 17:51:27', '2026-03-26 17:51:27', '2026-04-08'),
(2355, 75, '00:00:00', '10:30:00', '2026-03-26 17:51:27', '2026-03-26 17:51:27', '2026-04-09'),
(2356, 163, '00:00:00', '23:59:00', '2026-03-26 17:56:06', '2026-03-26 17:56:06', '2026-04-07'),
(2357, 163, '00:00:00', '23:59:00', '2026-03-26 17:56:06', '2026-03-26 17:56:06', '2026-04-08'),
(2358, 163, '00:00:00', '23:59:00', '2026-03-26 17:56:06', '2026-03-26 17:56:06', '2026-04-09'),
(2359, 192, '00:00:00', '23:59:00', '2026-03-26 17:58:01', '2026-03-26 17:58:01', '2026-04-08'),
(2360, 192, '00:00:00', '23:59:00', '2026-03-26 17:58:01', '2026-03-26 17:58:01', '2026-04-09'),
(2361, 192, '00:00:00', '23:59:00', '2026-03-26 17:58:01', '2026-03-26 17:58:01', '2026-04-10'),
(2362, 164, '00:00:00', '23:59:00', '2026-03-26 18:01:04', '2026-03-26 18:01:04', '2026-05-08'),
(2363, 164, '00:00:00', '23:59:00', '2026-03-26 18:01:04', '2026-03-26 18:01:04', '2026-04-09'),
(2364, 164, '00:00:00', '23:59:00', '2026-03-26 18:01:04', '2026-03-26 18:01:04', '2026-04-10'),
(2365, 229, '00:00:00', '23:59:00', '2026-03-26 18:03:00', '2026-03-26 18:03:00', '2026-04-08'),
(2366, 229, '00:00:00', '23:59:00', '2026-03-26 18:03:00', '2026-03-26 18:03:00', '2026-04-09'),
(2367, 229, '00:00:00', '23:59:00', '2026-03-26 18:03:00', '2026-03-26 18:03:00', '2026-04-10'),
(2368, 230, '00:00:00', '23:59:00', '2026-03-26 18:05:33', '2026-03-26 18:05:33', '2026-04-08'),
(2369, 230, '00:00:00', '23:59:00', '2026-03-26 18:05:33', '2026-03-26 18:05:33', '2026-04-09'),
(2370, 230, '00:00:00', '23:59:00', '2026-03-26 18:05:33', '2026-03-26 18:05:33', '2026-04-10'),
(2374, 232, '00:00:00', '23:59:00', '2026-03-26 18:08:27', '2026-03-26 18:08:27', '2026-04-08'),
(2375, 232, '00:00:00', '23:59:00', '2026-03-26 18:08:27', '2026-03-26 18:08:27', '2026-04-09'),
(2376, 232, '00:00:00', '23:59:00', '2026-03-26 18:08:27', '2026-03-26 18:08:27', '2026-04-10'),
(2378, 5, '11:30:00', '23:36:00', '2026-03-27 11:56:25', '2026-03-27 11:56:25', '2026-03-28'),
(2385, 235, '00:00:00', '23:59:00', '2026-03-31 17:51:17', '2026-03-31 17:51:17', '2026-04-08'),
(2386, 235, '00:00:00', '23:59:00', '2026-03-31 17:51:17', '2026-03-31 17:51:17', '2026-04-09'),
(2387, 170, '00:00:00', '23:59:00', '2026-03-31 17:53:03', '2026-03-31 17:53:03', '2026-01-09'),
(2388, 170, '00:00:00', '23:59:00', '2026-03-31 17:53:03', '2026-03-31 17:53:03', '2026-04-10'),
(2393, 172, '00:00:00', '23:59:00', '2026-03-31 18:10:50', '2026-03-31 18:10:50', '2026-04-09'),
(2394, 172, '00:00:00', '23:59:00', '2026-03-31 18:10:50', '2026-03-31 18:10:50', '2026-04-10'),
(2395, 173, '00:00:00', '23:59:00', '2026-03-31 18:19:11', '2026-03-31 18:19:11', '2026-04-10'),
(2396, 173, '00:00:00', '23:59:00', '2026-03-31 18:19:11', '2026-03-31 18:19:11', '2026-04-11'),
(2399, 243, '00:00:00', '23:59:00', '2026-03-31 18:20:12', '2026-03-31 18:20:12', '2026-04-09'),
(2400, 243, '00:00:00', '23:59:00', '2026-03-31 18:20:12', '2026-03-31 18:20:12', '2026-04-10'),
(2401, 176, '00:00:00', '23:59:00', '2026-03-31 18:21:51', '2026-03-31 18:21:51', '2026-04-10'),
(2402, 176, '00:00:00', '23:59:00', '2026-03-31 18:21:51', '2026-03-31 18:21:51', '2026-04-11'),
(2424, 327, '00:00:00', '23:59:00', '2026-03-31 18:37:52', '2026-03-31 18:37:52', '2026-04-13'),
(2425, 327, '00:00:00', '23:59:00', '2026-03-31 18:37:52', '2026-03-31 18:37:52', '2026-04-14'),
(2430, 330, '00:00:00', '22:59:00', '2026-03-31 18:48:57', '2026-03-31 18:48:57', '2026-04-13'),
(2431, 330, '00:00:00', '22:59:00', '2026-03-31 18:48:57', '2026-03-31 18:48:57', '2026-04-14'),
(2446, 188, '00:00:00', '23:59:00', '2026-03-31 19:02:36', '2026-03-31 19:02:36', '2026-04-14'),
(2447, 188, '00:00:00', '23:59:00', '2026-03-31 19:02:36', '2026-03-31 19:02:36', '2026-04-15'),
(2450, 36, '00:00:00', '23:59:00', '2026-03-31 19:06:23', '2026-03-31 19:06:23', '2026-04-15'),
(2451, 36, '00:00:00', '23:59:00', '2026-03-31 19:06:23', '2026-03-31 19:06:23', '2026-04-16'),
(2454, 38, '00:00:00', '10:30:00', '2026-03-31 19:10:13', '2026-03-31 19:10:13', '2026-04-15'),
(2455, 38, '00:00:00', '10:30:00', '2026-03-31 19:10:13', '2026-03-31 19:10:13', '2026-04-16'),
(2456, 190, '00:00:00', '23:59:00', '2026-03-31 19:11:24', '2026-03-31 19:11:24', '2026-04-15'),
(2457, 190, '00:00:00', '23:59:00', '2026-03-31 19:11:24', '2026-03-31 19:11:24', '2026-04-16'),
(2460, 63, '00:00:00', '10:30:00', '2026-03-31 19:14:57', '2026-03-31 19:14:57', '2026-04-15'),
(2461, 63, '00:00:00', '10:30:00', '2026-03-31 19:14:57', '2026-03-31 19:14:57', '2026-04-16'),
(2468, 117, '00:00:00', '23:59:00', '2026-03-31 19:36:27', '2026-03-31 19:36:27', '2026-04-16'),
(2469, 117, '00:00:00', '23:59:00', '2026-03-31 19:36:27', '2026-03-31 19:36:27', '2026-04-17'),
(2478, 197, '00:00:00', '23:59:00', '2026-03-31 20:48:44', '2026-03-31 20:48:44', '2026-04-17'),
(2479, 197, '00:00:00', '23:59:00', '2026-03-31 20:48:44', '2026-03-31 20:48:44', '2026-04-18'),
(2480, 196, '00:00:00', '23:59:00', '2026-03-31 20:49:39', '2026-03-31 20:49:39', '2026-04-17'),
(2481, 196, '00:00:00', '23:59:00', '2026-03-31 20:49:39', '2026-03-31 20:49:39', '2026-04-18'),
(2484, 49, '00:00:00', '23:59:00', '2026-03-31 20:51:34', '2026-03-31 20:51:34', '2026-04-17'),
(2485, 49, '00:00:00', '23:59:00', '2026-03-31 20:51:34', '2026-03-31 20:51:34', '2026-04-18'),
(2486, 171, '00:00:00', '23:59:00', '2026-03-31 20:52:28', '2026-03-31 20:52:28', '2026-04-17'),
(2487, 171, '00:00:00', '23:59:00', '2026-03-31 20:52:28', '2026-03-31 20:52:28', '2026-04-18'),
(2488, 48, '00:00:00', '10:30:00', '2026-03-31 20:53:10', '2026-03-31 20:53:10', '2026-04-17'),
(2489, 48, '00:00:00', '10:30:00', '2026-03-31 20:53:10', '2026-03-31 20:53:10', '2026-04-18'),
(2546, 144, '00:00:00', '23:59:00', '2026-03-31 21:10:31', '2026-03-31 21:10:31', '2026-04-02'),
(2547, 144, '00:00:00', '23:59:00', '2026-03-31 21:10:31', '2026-03-31 21:10:31', '2026-04-03'),
(2564, 247, '00:00:00', '23:59:00', '2026-03-31 21:15:21', '2026-03-31 21:15:21', '2026-04-27'),
(2565, 247, '00:00:00', '23:59:00', '2026-03-31 21:15:21', '2026-03-31 21:15:21', '2026-04-28'),
(2566, 125, '00:00:00', '23:59:00', '2026-03-31 21:15:44', '2026-03-31 21:15:44', '2026-04-27'),
(2567, 125, '00:00:00', '23:59:00', '2026-03-31 21:15:44', '2026-03-31 21:15:44', '2026-04-27'),
(2572, 127, '00:00:00', '23:59:00', '2026-03-31 21:17:03', '2026-03-31 21:17:03', '2026-04-27'),
(2573, 127, '00:00:00', '23:59:00', '2026-03-31 21:17:03', '2026-03-31 21:17:03', '2026-04-28'),
(2622, 246, '00:00:00', '22:59:00', '2026-04-02 10:59:05', '2026-04-02 10:59:05', '2026-04-27'),
(2623, 246, '00:00:00', '22:59:00', '2026-04-02 10:59:05', '2026-04-02 10:59:05', '2026-04-28'),
(2624, 124, '00:00:00', '23:59:00', '2026-04-02 10:59:37', '2026-04-02 10:59:37', '2026-04-27'),
(2625, 124, '00:00:00', '23:59:00', '2026-04-02 10:59:37', '2026-04-02 10:59:37', '2026-04-28'),
(2626, 126, '00:00:00', '23:59:00', '2026-04-02 10:59:57', '2026-04-02 10:59:57', '2026-04-27'),
(2627, 126, '00:00:00', '23:59:00', '2026-04-02 10:59:57', '2026-04-02 10:59:57', '2026-04-28'),
(2628, 130, '00:00:00', '23:59:00', '2026-04-02 11:00:19', '2026-04-02 11:00:19', '2026-04-27'),
(2629, 130, '00:00:00', '23:59:00', '2026-04-02 11:00:19', '2026-04-02 11:00:19', '2026-04-28'),
(2630, 131, '00:00:00', '23:59:00', '2026-04-02 11:00:46', '2026-04-02 11:00:46', '2026-04-27'),
(2631, 131, '00:00:00', '23:59:00', '2026-04-02 11:00:46', '2026-04-02 11:00:46', '2026-04-28'),
(2640, 129, '00:00:00', '23:59:00', '2026-04-02 11:10:59', '2026-04-02 11:10:59', '2026-04-28'),
(2641, 129, '00:00:00', '23:59:00', '2026-04-02 11:10:59', '2026-04-02 11:10:59', '2026-04-29'),
(2644, 212, '00:00:00', '01:00:00', '2026-04-02 11:14:25', '2026-04-02 11:14:25', '2026-04-29'),
(2645, 212, '00:00:00', '01:00:00', '2026-04-02 11:14:25', '2026-04-02 11:14:25', '2026-04-30'),
(2646, 137, '00:00:00', '23:59:00', '2026-04-02 11:14:46', '2026-04-02 11:14:46', '2026-04-29'),
(2647, 137, '00:00:00', '23:59:00', '2026-04-02 11:14:46', '2026-04-02 11:14:46', '2026-04-30'),
(2654, 139, '00:00:00', '23:59:00', '2026-04-02 11:17:12', '2026-04-02 11:17:12', '2026-04-29'),
(2655, 139, '00:00:00', '23:59:00', '2026-04-02 11:17:12', '2026-04-02 11:17:12', '2026-04-30'),
(2658, 140, '00:00:00', '23:59:00', '2026-04-02 11:17:54', '2026-04-02 11:17:54', '2026-04-29'),
(2659, 140, '00:00:00', '23:59:00', '2026-04-02 11:17:54', '2026-04-02 11:17:54', '2026-04-30'),
(2660, 141, '00:00:00', '23:59:00', '2026-04-02 11:18:19', '2026-04-02 11:18:19', '2026-04-30'),
(2661, 141, '00:00:00', '23:59:00', '2026-04-02 11:18:19', '2026-04-02 11:18:19', '2026-05-01'),
(2662, 142, '00:00:00', '23:59:00', '2026-04-02 11:18:37', '2026-04-02 11:18:37', '2026-04-30'),
(2663, 142, '00:00:00', '23:59:00', '2026-04-02 11:18:37', '2026-04-02 11:18:37', '2026-05-01'),
(2664, 182, '00:00:00', '01:00:00', '2026-04-02 11:18:54', '2026-04-02 11:18:54', '2026-04-30'),
(2665, 182, '00:00:00', '01:00:00', '2026-04-02 11:18:54', '2026-04-02 11:18:54', '2026-05-01'),
(2666, 213, '00:00:00', '23:59:00', '2026-04-02 11:19:11', '2026-04-02 11:19:11', '2026-04-30'),
(2667, 213, '00:00:00', '23:59:00', '2026-04-02 11:19:11', '2026-04-02 11:19:11', '2026-05-01'),
(2670, 145, '00:00:00', '23:59:00', '2026-04-02 11:28:12', '2026-04-02 11:28:12', '2026-05-01'),
(2671, 145, '00:00:00', '23:59:00', '2026-04-02 11:28:12', '2026-04-02 11:28:12', '2026-05-02'),
(2672, 147, '00:00:00', '23:59:00', '2026-04-02 11:28:43', '2026-04-02 11:28:43', '2026-05-01'),
(2673, 147, '00:00:00', '23:59:00', '2026-04-02 11:28:43', '2026-04-02 11:28:43', '2026-05-02'),
(2674, 146, '00:00:00', '23:59:00', '2026-04-02 11:29:14', '2026-04-02 11:29:14', '2026-05-01'),
(2675, 146, '00:00:00', '23:59:00', '2026-04-02 11:29:14', '2026-04-02 11:29:14', '2026-05-02'),
(2676, 148, '00:00:00', '23:59:00', '2026-04-02 11:29:41', '2026-04-02 11:29:41', '2026-05-01'),
(2677, 148, '00:00:00', '23:59:00', '2026-04-02 11:29:41', '2026-04-02 11:29:41', '2026-05-02'),
(2678, 149, '00:00:00', '23:59:00', '2026-04-02 11:30:22', '2026-04-02 11:30:22', '2026-05-01'),
(2679, 149, '00:00:00', '23:59:00', '2026-04-02 11:30:22', '2026-04-02 11:30:22', '2026-05-02'),
(2680, 150, '00:00:00', '23:59:00', '2026-04-02 11:31:07', '2026-04-02 11:31:07', '2026-05-01'),
(2681, 150, '00:00:00', '23:59:00', '2026-04-02 11:31:07', '2026-04-02 11:31:07', '2026-05-02'),
(2682, 151, '00:00:00', '23:59:00', '2026-04-02 11:31:32', '2026-04-02 11:31:32', '2026-05-01'),
(2683, 151, '00:00:00', '23:59:00', '2026-04-02 11:31:32', '2026-04-02 11:31:32', '2026-05-02'),
(2684, 180, '00:00:00', '11:59:00', '2026-04-02 11:32:59', '2026-04-02 11:32:59', '2026-02-23'),
(2685, 180, '00:00:00', '11:59:00', '2026-04-02 11:32:59', '2026-04-02 11:32:59', '2026-02-24'),
(2686, 47, '00:00:00', '11:59:00', '2026-04-02 11:33:24', '2026-04-02 11:33:24', '2026-02-23'),
(2687, 47, '00:00:00', '11:59:00', '2026-04-02 11:33:24', '2026-04-02 11:33:24', '2026-02-24'),
(2694, 88, '00:00:00', '23:59:00', '2026-04-02 11:37:24', '2026-04-02 11:37:24', '2026-02-23'),
(2695, 88, '00:00:00', '23:59:00', '2026-04-02 11:37:24', '2026-04-02 11:37:24', '2026-02-24'),
(2696, 87, '00:00:00', '23:59:00', '2026-04-02 11:37:50', '2026-04-02 11:37:50', '2026-02-23'),
(2697, 87, '00:00:00', '23:59:00', '2026-04-02 11:37:50', '2026-04-02 11:37:50', '2026-02-24'),
(2698, 86, '00:00:00', '23:59:00', '2026-04-02 11:38:17', '2026-04-02 11:38:17', '2026-02-23'),
(2699, 86, '00:00:00', '23:59:00', '2026-04-02 11:38:17', '2026-04-02 11:38:17', '2026-02-24'),
(2700, 198, '00:00:00', '23:59:00', '2026-04-02 11:38:44', '2026-04-02 11:38:44', '2026-02-23'),
(2701, 198, '00:00:00', '23:59:00', '2026-04-02 11:38:44', '2026-04-02 11:38:44', '2026-02-24'),
(2702, 199, '00:00:00', '23:59:00', '2026-04-02 11:40:03', '2026-04-02 11:40:03', '2026-02-23'),
(2703, 199, '00:00:00', '23:59:00', '2026-04-02 11:40:03', '2026-04-02 11:40:03', '2026-02-24'),
(2704, 92, '00:00:00', '23:59:00', '2026-04-02 11:40:22', '2026-04-02 11:40:22', '2026-02-24'),
(2705, 92, '00:00:00', '23:59:00', '2026-04-02 11:40:22', '2026-04-02 11:40:22', '2026-02-25'),
(2708, 200, '00:00:00', '23:59:00', '2026-04-02 11:45:52', '2026-04-02 11:45:52', '2026-02-24'),
(2709, 200, '00:00:00', '23:59:00', '2026-04-02 11:45:52', '2026-04-02 11:45:52', '2026-02-25'),
(2710, 98, '00:00:00', '23:59:00', '2026-04-02 11:46:09', '2026-04-02 11:46:09', '2026-02-24'),
(2711, 98, '00:00:00', '23:59:00', '2026-04-02 11:46:09', '2026-04-02 11:46:09', '2026-02-25'),
(2712, 202, '00:00:00', '23:59:00', '2026-04-02 11:46:25', '2026-04-02 11:46:25', '2026-02-24'),
(2713, 202, '00:00:00', '23:59:00', '2026-04-02 11:46:25', '2026-04-02 11:46:25', '2026-02-25'),
(2714, 101, '00:00:00', '23:59:00', '2026-04-02 11:47:07', '2026-04-02 11:47:07', '2026-03-24'),
(2715, 101, '00:00:00', '23:59:00', '2026-04-02 11:47:07', '2026-04-02 11:47:07', '2026-03-25'),
(2716, 348, '00:00:00', '23:59:00', '2026-04-02 11:49:46', '2026-04-02 11:49:46', '2026-03-24'),
(2717, 348, '00:00:00', '23:59:00', '2026-04-02 11:49:46', '2026-04-02 11:49:46', '2026-03-25'),
(2718, 349, '00:00:00', '23:59:00', '2026-04-02 11:52:11', '2026-04-02 11:52:11', '2026-03-24'),
(2719, 349, '00:00:00', '23:59:00', '2026-04-02 11:52:11', '2026-04-02 11:52:11', '2026-03-25'),
(2720, 71, '00:00:00', '10:30:00', '2026-04-02 11:52:53', '2026-04-02 11:52:53', '2026-03-24'),
(2721, 71, '00:00:00', '10:30:00', '2026-04-02 11:52:53', '2026-04-02 11:52:53', '2026-03-25'),
(2722, 106, '00:00:00', '23:59:00', '2026-04-02 11:53:16', '2026-04-02 11:53:16', '2026-02-25'),
(2723, 106, '00:00:00', '23:59:00', '2026-04-02 11:53:16', '2026-04-02 11:53:16', '2026-02-26'),
(2724, 350, '00:00:00', '23:59:00', '2026-04-02 11:56:08', '2026-04-02 11:56:08', '2026-03-24'),
(2725, 350, '00:00:00', '23:59:00', '2026-04-02 11:56:08', '2026-04-02 11:56:08', '2026-03-25'),
(2726, 205, '00:00:00', '23:59:00', '2026-04-02 11:56:50', '2026-04-02 11:56:50', '2026-03-25'),
(2727, 205, '00:00:00', '23:59:00', '2026-04-02 11:56:50', '2026-04-02 11:56:50', '2026-03-26'),
(2728, 351, '00:00:00', '23:59:00', '2026-04-02 11:58:45', '2026-04-02 11:58:45', '2026-03-25'),
(2729, 351, '00:00:00', '23:59:00', '2026-04-02 11:58:46', '2026-04-02 11:58:46', '2026-03-26'),
(2730, 204, '00:00:00', '23:59:00', '2026-04-02 11:59:06', '2026-04-02 11:59:06', '2026-02-25'),
(2731, 204, '00:00:00', '23:59:00', '2026-04-02 11:59:06', '2026-04-02 11:59:06', '2026-02-26'),
(2732, 208, '00:00:00', '23:59:00', '2026-04-02 11:59:33', '2026-04-02 11:59:33', '2026-02-26'),
(2733, 208, '00:00:00', '23:59:00', '2026-04-02 11:59:33', '2026-04-02 11:59:33', '2026-02-27'),
(2734, 209, '00:00:00', '23:59:00', '2026-04-02 11:59:48', '2026-04-02 11:59:48', '2026-02-26'),
(2735, 209, '00:00:00', '23:59:00', '2026-04-02 11:59:48', '2026-04-02 11:59:48', '2026-02-27'),
(2740, 207, '00:00:00', '23:59:00', '2026-04-02 12:05:44', '2026-04-02 12:05:44', '2026-02-26'),
(2741, 207, '00:00:00', '23:59:00', '2026-04-02 12:05:44', '2026-04-02 12:05:44', '2026-02-27'),
(2744, 113, '00:00:00', '23:59:00', '2026-04-02 12:06:54', '2026-04-02 12:06:54', '2026-02-27'),
(2745, 113, '00:00:00', '23:59:00', '2026-04-02 12:06:54', '2026-04-02 12:06:54', '2026-03-28'),
(2748, 118, '00:00:00', '23:59:00', '2026-04-02 12:09:58', '2026-04-02 12:09:58', '2026-03-27'),
(2749, 118, '00:00:00', '23:59:00', '2026-04-02 12:09:58', '2026-04-02 12:09:58', '2026-03-28'),
(2750, 355, '00:00:00', '23:59:00', '2026-04-02 12:11:59', '2026-04-02 12:11:59', '2026-03-27'),
(2751, 355, '00:00:00', '23:59:00', '2026-04-02 12:11:59', '2026-04-02 12:11:59', '2026-03-28'),
(2752, 116, '00:00:00', '23:59:00', '2026-04-02 12:12:33', '2026-04-02 12:12:33', '2026-03-27'),
(2753, 116, '00:00:00', '23:59:00', '2026-04-02 12:12:33', '2026-04-02 12:12:33', '2026-03-28'),
(2754, 210, '00:00:00', '23:59:00', '2026-04-02 12:13:13', '2026-04-02 12:13:13', '2026-03-27'),
(2755, 210, '00:00:00', '23:59:00', '2026-04-02 12:13:13', '2026-04-02 12:13:13', '2026-03-28'),
(2758, 340, '00:00:00', '23:59:00', '2026-04-02 12:14:11', '2026-04-02 12:14:11', '2026-04-16'),
(2759, 340, '00:00:00', '23:59:00', '2026-04-02 12:14:11', '2026-04-02 12:14:11', '2026-04-17'),
(2766, 26, '00:00:00', '23:59:00', '2026-04-02 12:15:44', '2026-04-02 12:15:44', '2026-04-13'),
(2767, 26, '00:00:00', '23:59:00', '2026-04-02 12:15:44', '2026-04-02 12:15:44', '2026-04-14'),
(2768, 19, '00:00:00', '23:59:00', '2026-04-02 12:17:49', '2026-04-02 12:17:49', '2026-04-13'),
(2769, 19, '00:00:00', '23:59:00', '2026-04-02 12:17:49', '2026-04-02 12:17:49', '2026-04-14'),
(2770, 317, '00:00:00', '23:59:00', '2026-04-02 12:40:31', '2026-04-02 12:40:31', '2026-04-28'),
(2771, 317, '00:00:00', '23:59:00', '2026-04-02 12:40:31', '2026-04-02 12:40:31', '2026-04-29'),
(2772, 316, '00:00:00', '23:59:00', '2026-04-02 12:47:42', '2026-04-02 12:47:42', '2026-04-28'),
(2773, 316, '00:00:00', '23:59:00', '2026-04-02 12:47:42', '2026-04-02 12:47:42', '2026-04-29'),
(2774, 315, '00:00:00', '23:59:00', '2026-04-02 12:54:12', '2026-04-02 12:54:12', '2026-04-28'),
(2775, 315, '00:00:00', '23:59:00', '2026-04-02 12:54:12', '2026-04-02 12:54:12', '2026-04-29'),
(2776, 315, '00:00:00', '23:59:00', '2026-04-02 12:54:12', '2026-04-02 12:54:12', '2026-04-30'),
(2777, 321, '00:00:00', '23:59:00', '2026-04-02 12:57:50', '2026-04-02 12:57:50', '2026-04-28'),
(2778, 321, '00:00:00', '23:59:00', '2026-04-02 12:57:50', '2026-04-02 12:57:50', '2026-04-29'),
(2779, 324, '00:00:00', '23:59:00', '2026-04-02 13:02:14', '2026-04-02 13:02:14', '2026-04-29'),
(2780, 324, '00:00:00', '23:59:00', '2026-04-02 13:02:14', '2026-04-02 13:02:14', '2026-04-30'),
(2781, 239, '00:00:00', '23:59:00', '2026-04-02 17:45:43', '2026-04-02 17:45:43', '2026-04-08'),
(2782, 239, '00:00:00', '23:59:00', '2026-04-02 17:45:43', '2026-04-02 17:45:43', '2026-04-09'),
(2783, 241, '00:00:00', '23:59:00', '2026-04-02 18:01:18', '2026-04-02 18:01:18', '2026-04-09'),
(2784, 241, '00:00:00', '23:59:00', '2026-04-02 18:01:18', '2026-04-02 18:01:18', '2026-04-10'),
(2787, 329, '00:00:00', '23:59:00', '2026-04-02 18:10:41', '2026-04-02 18:10:41', '2026-04-13'),
(2788, 329, '00:00:00', '23:59:00', '2026-04-02 18:10:41', '2026-04-02 18:10:41', '2026-04-14'),
(2795, 335, '00:00:00', '23:59:00', '2026-04-02 18:22:47', '2026-04-02 18:22:47', '2026-04-14'),
(2796, 335, '00:00:00', '23:59:00', '2026-04-02 18:22:47', '2026-04-02 18:22:47', '2026-04-15'),
(2797, 336, '00:00:00', '23:59:00', '2026-04-02 18:23:27', '2026-04-02 18:23:27', '2026-04-14'),
(2798, 336, '00:00:00', '23:59:00', '2026-04-02 18:23:27', '2026-04-02 18:23:27', '2026-04-15'),
(2799, 339, '00:00:00', '23:59:00', '2026-04-02 18:34:15', '2026-04-02 18:34:15', '2026-04-15'),
(2800, 339, '00:00:00', '23:59:00', '2026-04-02 18:34:15', '2026-04-02 18:34:15', '2026-04-16'),
(2801, 341, '00:00:00', '23:59:00', '2026-04-02 18:35:15', '2026-04-02 18:35:15', '2026-04-16'),
(2802, 341, '00:00:00', '23:59:00', '2026-04-02 18:35:15', '2026-04-02 18:35:15', '2026-04-17'),
(2803, 343, '00:00:00', '23:59:00', '2026-04-02 18:35:56', '2026-04-02 18:35:56', '2026-04-17'),
(2804, 343, '00:00:00', '23:59:00', '2026-04-02 18:35:56', '2026-04-02 18:35:56', '2026-04-18'),
(2805, 214, '00:00:00', '01:00:00', '2026-04-02 18:40:59', '2026-04-02 18:40:59', '2026-04-06'),
(2806, 214, '00:00:00', '01:00:00', '2026-04-02 18:40:59', '2026-04-02 18:40:59', '2026-04-07'),
(2807, 183, '00:00:00', '01:00:00', '2026-04-02 18:44:12', '2026-04-02 18:44:12', '2026-04-29'),
(2808, 183, '00:00:00', '01:00:00', '2026-04-02 18:44:12', '2026-04-02 18:44:12', '2026-04-30'),
(2809, 345, '00:00:00', '23:59:00', '2026-04-02 18:45:12', '2026-04-02 18:45:12', '2026-04-30'),
(2810, 345, '00:00:00', '23:59:00', '2026-04-02 18:45:12', '2026-04-02 18:45:12', '2026-05-01'),
(2811, 346, '00:00:00', '23:59:00', '2026-04-02 18:49:01', '2026-04-02 18:49:01', '2026-03-23'),
(2812, 346, '00:00:00', '23:59:00', '2026-04-02 18:49:01', '2026-04-02 18:49:01', '2026-03-24'),
(2813, 347, '00:00:00', '23:59:00', '2026-04-02 18:50:47', '2026-04-02 18:50:47', '2026-03-24'),
(2814, 347, '00:00:00', '23:59:00', '2026-04-02 18:50:47', '2026-04-02 18:50:47', '2026-03-25'),
(2815, 353, '00:00:00', '23:59:00', '2026-04-02 18:56:59', '2026-04-02 18:56:59', '2026-03-26'),
(2816, 353, '00:00:00', '23:59:00', '2026-04-02 18:56:59', '2026-04-02 18:56:59', '2026-03-27'),
(2817, 352, '00:00:00', '23:59:00', '2026-04-02 19:06:18', '2026-04-02 19:06:18', '2026-03-26'),
(2818, 352, '00:00:00', '23:59:00', '2026-04-02 19:06:18', '2026-04-02 19:06:18', '2026-03-27'),
(2819, 354, '00:00:00', '23:59:00', '2026-04-02 19:06:55', '2026-04-02 19:06:55', '2026-03-27'),
(2820, 354, '00:00:00', '23:59:00', '2026-04-02 19:06:55', '2026-04-02 19:06:55', '2026-03-28'),
(2821, 344, '00:00:00', '23:59:00', '2026-04-02 19:10:38', '2026-04-02 19:10:38', '2026-04-29'),
(2822, 344, '00:00:00', '23:59:00', '2026-04-02 19:10:38', '2026-04-02 19:10:38', '2026-04-30'),
(2823, 157, '00:00:00', '23:59:00', '2026-04-02 19:14:51', '2026-04-02 19:14:51', '2026-01-10'),
(2824, 157, '00:00:00', '23:59:00', '2026-04-02 19:14:51', '2026-04-02 19:14:51', '2026-01-11'),
(2825, 157, '00:00:00', '23:59:00', '2026-04-02 19:14:51', '2026-04-02 19:14:51', '2026-01-12'),
(2826, 231, '00:00:00', '23:59:00', '2026-04-02 19:17:41', '2026-04-02 19:17:41', '2026-04-07'),
(2827, 231, '00:00:00', '23:59:00', '2026-04-02 19:17:41', '2026-04-02 19:17:41', '2026-04-08'),
(2830, 24, '00:00:00', '23:59:00', '2026-04-03 10:04:19', '2026-04-03 10:04:19', '2026-02-16'),
(2831, 24, '00:00:00', '23:59:00', '2026-04-03 10:04:19', '2026-04-03 10:04:19', '2026-02-17'),
(2832, 24, '00:00:00', '23:59:00', '2026-04-03 10:04:19', '2026-04-03 10:04:19', '2026-02-18'),
(2833, 334, '00:00:00', '23:59:00', '2026-04-03 10:04:52', '2026-04-03 10:04:52', '2026-04-14'),
(2834, 334, '00:00:00', '23:59:00', '2026-04-03 10:04:52', '2026-04-03 10:04:52', '2026-04-15'),
(2835, 337, '00:00:00', '23:59:00', '2026-04-03 10:05:17', '2026-04-03 10:05:17', '2026-04-15'),
(2836, 337, '00:00:00', '23:59:00', '2026-04-03 10:05:17', '2026-04-03 10:05:17', '2026-04-16'),
(2837, 328, '00:00:00', '23:59:00', '2026-04-03 10:05:46', '2026-04-03 10:05:46', '2026-04-13'),
(2838, 328, '00:00:00', '23:59:00', '2026-04-03 10:05:46', '2026-04-03 10:05:46', '2026-04-14'),
(2839, 325, '00:00:00', '23:59:00', '2026-04-03 10:06:08', '2026-04-03 10:06:08', '2026-04-12'),
(2840, 325, '00:00:00', '23:59:00', '2026-04-03 10:06:08', '2026-04-03 10:06:08', '2026-04-13'),
(2841, 326, '00:00:00', '23:59:00', '2026-04-03 10:06:30', '2026-04-03 10:06:30', '2026-04-13'),
(2842, 326, '00:00:00', '23:59:00', '2026-04-03 10:06:30', '2026-04-03 10:06:30', '2026-04-14'),
(2843, 168, '00:00:00', '23:59:00', '2026-04-03 10:07:18', '2026-04-03 10:07:18', '2026-04-08'),
(2844, 168, '00:00:00', '23:59:00', '2026-04-03 10:07:18', '2026-04-03 10:07:18', '2026-04-09'),
(2845, 93, '00:00:00', '10:30:00', '2026-04-03 10:07:53', '2026-04-03 10:07:53', '2025-12-16'),
(2846, 93, '00:00:00', '10:30:00', '2026-04-03 10:07:53', '2026-04-03 10:07:53', '2025-12-17'),
(2847, 93, '00:00:00', '10:30:00', '2026-04-03 10:07:53', '2026-04-03 10:07:53', '2025-12-18'),
(2848, 136, '00:00:00', '23:59:00', '2026-04-03 10:10:14', '2026-04-03 10:10:14', '2026-02-27'),
(2849, 133, '00:00:00', '23:59:00', '2026-04-03 10:10:43', '2026-04-03 10:10:43', '2026-01-04'),
(2850, 133, '00:00:00', '23:59:00', '2026-04-03 10:10:43', '2026-04-03 10:10:43', '2026-01-05'),
(2851, 133, '00:00:00', '23:59:00', '2026-04-03 10:10:43', '2026-04-03 10:10:43', '2026-01-06'),
(2852, 134, '00:00:00', '23:59:00', '2026-04-03 10:11:15', '2026-04-03 10:11:15', '2026-03-03'),
(2853, 134, '00:00:00', '23:59:00', '2026-04-03 10:11:15', '2026-04-03 10:11:15', '2026-03-04'),
(2854, 134, '00:00:00', '23:59:00', '2026-04-03 10:11:15', '2026-04-03 10:11:15', '2026-03-05'),
(2855, 114, '00:00:00', '23:59:00', '2026-04-03 10:11:54', '2026-04-03 10:11:54', '2026-03-27'),
(2856, 114, '00:00:00', '23:59:00', '2026-04-03 10:11:54', '2026-04-03 10:11:54', '2026-03-28'),
(2857, 119, '00:00:00', '10:30:00', '2026-04-03 10:12:20', '2026-04-03 10:12:20', '2025-12-19'),
(2858, 119, '00:00:00', '10:30:00', '2026-04-03 10:12:20', '2026-04-03 10:12:20', '2025-12-20'),
(2859, 119, '00:00:00', '10:30:00', '2026-04-03 10:12:20', '2026-04-03 10:12:20', '2025-12-21'),
(2860, 120, '00:00:00', '23:59:00', '2026-04-03 10:12:42', '2026-04-03 10:12:42', '2026-02-20'),
(2861, 121, '00:00:00', '10:30:00', '2026-04-03 10:13:08', '2026-04-03 10:13:08', '2025-12-17'),
(2862, 121, '00:00:00', '10:30:00', '2026-04-03 10:13:08', '2026-04-03 10:13:08', '2025-12-18'),
(2863, 121, '00:00:00', '10:30:00', '2026-04-03 10:13:08', '2026-04-03 10:13:08', '2025-12-19'),
(2864, 123, '00:00:00', '23:59:00', '2026-04-03 10:13:29', '2026-04-03 10:13:29', '2026-01-03'),
(2865, 123, '00:00:00', '23:59:00', '2026-04-03 10:13:29', '2026-04-03 10:13:29', '2026-01-04'),
(2866, 123, '00:00:00', '23:59:00', '2026-04-03 10:13:29', '2026-04-03 10:13:29', '2026-01-05'),
(2867, 102, '00:00:00', '23:59:00', '2026-04-03 10:13:59', '2026-04-03 10:13:59', '2026-02-25'),
(2868, 102, '00:00:00', '23:59:00', '2026-04-03 10:13:59', '2026-04-03 10:13:59', '2026-02-26'),
(2869, 102, '00:00:00', '23:59:00', '2026-04-03 10:13:59', '2026-04-03 10:13:59', '2026-02-27'),
(2870, 107, '00:00:00', '10:30:00', '2026-04-03 10:14:31', '2026-04-03 10:14:31', '2025-12-17'),
(2871, 107, '00:00:00', '10:30:00', '2026-04-03 10:14:31', '2026-04-03 10:14:31', '2025-12-18'),
(2872, 107, '00:00:00', '10:30:00', '2026-04-03 10:14:31', '2026-04-03 10:14:31', '2025-12-19'),
(2873, 108, '00:00:00', '23:59:00', '2026-04-03 10:14:49', '2026-04-03 10:14:49', '2026-03-27'),
(2874, 108, '00:00:00', '23:59:00', '2026-04-03 10:14:49', '2026-04-03 10:14:49', '2026-03-28'),
(2875, 91, '00:00:00', '10:30:00', '2026-04-03 10:15:13', '2026-04-03 10:15:13', '2025-12-16'),
(2876, 91, '00:00:00', '10:30:00', '2026-04-03 10:15:13', '2026-04-03 10:15:13', '2025-12-17'),
(2877, 91, '00:00:00', '10:30:00', '2026-04-03 10:15:13', '2026-04-03 10:15:13', '2025-12-18'),
(2878, 112, '00:00:00', '10:30:00', '2026-04-03 10:15:33', '2026-04-03 10:15:33', '2025-12-18'),
(2879, 112, '00:00:00', '10:30:00', '2026-04-03 10:15:33', '2026-04-03 10:15:33', '2025-12-19'),
(2880, 112, '00:00:00', '10:30:00', '2026-04-03 10:15:33', '2026-04-03 10:15:33', '2025-12-20'),
(2881, 94, '00:00:00', '10:30:00', '2026-04-03 10:16:05', '2026-04-03 10:16:05', '2025-12-16'),
(2882, 94, '00:00:00', '10:30:00', '2026-04-03 10:16:05', '2026-04-03 10:16:05', '2025-12-17'),
(2883, 94, '00:00:00', '10:30:00', '2026-04-03 10:16:05', '2026-04-03 10:16:05', '2025-12-18'),
(2884, 84, '00:00:00', '10:30:00', '2026-04-03 10:16:33', '2026-04-03 10:16:33', '2025-12-15'),
(2885, 84, '00:00:00', '10:30:00', '2026-04-03 10:16:33', '2026-04-03 10:16:33', '2025-12-16'),
(2886, 84, '00:00:00', '10:30:00', '2026-04-03 10:16:33', '2026-04-03 10:16:33', '2025-12-17'),
(2887, 90, '00:00:00', '10:30:00', '2026-04-03 10:16:59', '2026-04-03 10:16:59', '2025-12-16'),
(2888, 90, '00:00:00', '10:30:00', '2026-04-03 10:16:59', '2026-04-03 10:16:59', '2025-12-17'),
(2889, 90, '00:00:00', '10:30:00', '2026-04-03 10:16:59', '2026-04-03 10:16:59', '2025-12-18'),
(2890, 53, '00:00:00', '10:40:00', '2026-04-03 10:17:23', '2026-04-03 10:17:23', '2025-12-12'),
(2891, 53, '00:00:00', '10:40:00', '2026-04-03 10:17:23', '2026-04-03 10:17:23', '2025-12-13'),
(2892, 53, '00:00:00', '10:40:00', '2026-04-03 10:17:23', '2026-04-03 10:17:23', '2025-12-14'),
(2893, 65, '00:00:00', '10:30:00', '2026-04-03 10:17:44', '2026-04-03 10:17:44', '2025-12-02'),
(2894, 65, '00:00:00', '10:30:00', '2026-04-03 10:17:44', '2026-04-03 10:17:44', '2025-12-03'),
(2895, 65, '00:00:00', '10:30:00', '2026-04-03 10:17:44', '2026-04-03 10:17:44', '2025-12-04'),
(2896, 54, '00:00:00', '23:59:00', '2026-04-03 10:18:06', '2026-04-03 10:18:06', '2026-03-09'),
(2897, 54, '00:00:00', '23:59:00', '2026-04-03 10:18:06', '2026-04-03 10:18:06', '2026-03-10'),
(2898, 54, '00:00:00', '23:59:00', '2026-04-03 10:18:06', '2026-04-03 10:18:06', '2026-03-11'),
(2899, 41, '00:00:00', '23:59:00', '2026-04-03 10:18:22', '2026-04-03 10:18:22', '2026-02-18'),
(2900, 41, '00:00:00', '23:59:00', '2026-04-03 10:18:22', '2026-04-03 10:18:22', '2026-02-19'),
(2901, 41, '00:00:00', '23:59:00', '2026-04-03 10:18:22', '2026-04-03 10:18:22', '2026-02-20'),
(2902, 61, '00:00:00', '10:30:00', '2026-04-03 10:18:43', '2026-04-03 10:18:43', '2025-12-01'),
(2903, 61, '00:00:00', '10:30:00', '2026-04-03 10:18:43', '2026-04-03 10:18:43', '2025-12-02'),
(2904, 61, '00:00:00', '10:30:00', '2026-04-03 10:18:43', '2026-04-03 10:18:43', '2025-12-03'),
(2905, 42, '00:00:00', '23:59:00', '2026-04-03 10:19:03', '2026-04-03 10:19:03', '2026-02-19'),
(2906, 42, '00:00:00', '23:59:00', '2026-04-03 10:19:03', '2026-04-03 10:19:03', '2026-02-20'),
(2907, 45, '00:00:00', '10:30:00', '2026-04-03 10:19:23', '2026-04-03 10:19:23', '2025-12-11'),
(2908, 45, '00:00:00', '10:30:00', '2026-04-03 10:19:23', '2026-04-03 10:19:23', '2025-12-12'),
(2909, 45, '00:00:00', '10:30:00', '2026-04-03 10:19:23', '2026-04-03 10:19:23', '2025-12-13'),
(2910, 46, '00:00:00', '23:59:00', '2026-04-03 10:19:41', '2026-04-03 10:19:41', '2026-02-20'),
(2911, 28, '00:00:00', '10:30:00', '2026-04-03 10:20:08', '2026-04-03 10:20:08', '2025-12-09'),
(2912, 28, '00:00:00', '10:30:00', '2026-04-03 10:20:08', '2026-04-03 10:20:08', '2025-12-10'),
(2913, 28, '00:00:00', '10:30:00', '2026-04-03 10:20:08', '2026-04-03 10:20:08', '2025-12-11'),
(2914, 29, '00:00:00', '10:30:00', '2026-04-03 10:20:23', '2026-04-03 10:20:23', '2025-12-09'),
(2915, 29, '00:00:00', '10:30:00', '2026-04-03 10:20:23', '2026-04-03 10:20:23', '2025-12-10'),
(2916, 29, '00:00:00', '10:30:00', '2026-04-03 10:20:23', '2026-04-03 10:20:23', '2025-12-11'),
(2917, 30, '00:00:00', '10:30:00', '2026-04-03 10:20:40', '2026-04-03 10:20:40', '2026-02-17'),
(2918, 30, '00:00:00', '10:30:00', '2026-04-03 10:20:40', '2026-04-03 10:20:40', '2026-02-18'),
(2919, 30, '00:00:00', '10:30:00', '2026-04-03 10:20:40', '2026-04-03 10:20:40', '2026-02-19'),
(2920, 27, '00:00:00', '23:59:00', '2026-04-03 10:21:11', '2026-04-03 10:21:11', '2026-04-14'),
(2921, 27, '00:00:00', '23:59:00', '2026-04-03 10:21:11', '2026-04-03 10:21:11', '2026-04-15'),
(2922, 342, '00:00:00', '23:59:00', '2026-04-03 10:21:33', '2026-04-03 10:21:33', '2026-04-16'),
(2923, 342, '00:00:00', '23:59:00', '2026-04-03 10:21:33', '2026-04-03 10:21:33', '2026-04-17'),
(2924, 331, '00:00:00', '23:59:00', '2026-04-03 10:21:56', '2026-04-03 10:21:56', '2026-04-13'),
(2925, 331, '00:00:00', '23:59:00', '2026-04-03 10:21:56', '2026-04-03 10:21:56', '2026-04-14'),
(2926, 332, '00:00:00', '23:59:00', '2026-04-03 10:22:20', '2026-04-03 10:22:20', '2026-04-14'),
(2927, 332, '00:00:00', '23:59:00', '2026-04-03 10:22:20', '2026-04-03 10:22:20', '2026-04-15'),
(2928, 211, '00:00:00', '23:59:00', '2026-04-03 10:23:02', '2026-04-03 10:23:02', '2026-03-03'),
(2929, 211, '00:00:00', '23:59:00', '2026-04-03 10:23:02', '2026-04-03 10:23:02', '2026-03-04'),
(2930, 178, '00:00:00', '23:59:00', '2026-04-03 10:23:57', '2026-04-03 10:23:57', '2026-04-10'),
(2931, 178, '00:00:00', '23:59:00', '2026-04-03 10:23:57', '2026-04-03 10:23:57', '2026-04-11'),
(2932, 169, '00:00:00', '23:59:00', '2026-04-03 10:24:43', '2026-04-03 10:24:43', '2026-04-08'),
(2933, 169, '00:00:00', '23:59:00', '2026-04-03 10:24:43', '2026-04-03 10:24:43', '2026-04-09'),
(2934, 179, '00:00:00', '23:59:00', '2026-04-03 11:40:56', '2026-04-03 11:40:56', '2026-04-27'),
(2935, 179, '00:00:00', '23:59:00', '2026-04-03 11:40:56', '2026-04-03 11:40:56', '2026-04-28'),
(2936, 338, '00:00:00', '23:59:00', '2026-04-03 11:50:42', '2026-04-03 11:50:42', '2026-04-15'),
(2937, 338, '00:00:00', '23:59:00', '2026-04-03 11:50:42', '2026-04-03 11:50:42', '2026-04-16'),
(2938, 135, '00:00:00', '23:59:00', '2026-04-03 11:59:38', '2026-04-03 11:59:38', '2026-04-29'),
(2939, 135, '00:00:00', '23:59:00', '2026-04-03 11:59:38', '2026-04-03 11:59:38', '2026-04-30'),
(2940, 138, '00:00:00', '23:59:00', '2026-04-03 12:03:46', '2026-04-03 12:03:46', '2026-04-29'),
(2941, 138, '00:00:00', '23:59:00', '2026-04-03 12:03:46', '2026-04-03 12:03:46', '2026-04-30'),
(2942, 14, '00:01:00', '23:59:00', '2026-04-03 12:08:57', '2026-04-03 12:08:57', '2025-10-01'),
(2943, 14, '00:01:00', '23:59:00', '2026-04-03 12:08:57', '2026-04-03 12:08:57', '2025-10-02'),
(2944, 160, '00:00:00', '23:59:00', '2026-04-03 12:15:18', '2026-04-03 12:15:18', '2026-04-07'),
(2945, 160, '00:00:00', '23:59:00', '2026-04-03 12:15:18', '2026-04-03 12:15:18', '2026-04-08'),
(2946, 160, '00:00:00', '23:59:00', '2026-04-03 12:15:18', '2026-04-03 12:15:18', '2026-04-09'),
(2947, 161, '00:00:00', '23:59:00', '2026-04-03 12:16:13', '2026-04-03 12:16:13', '2026-04-07'),
(2948, 161, '00:00:00', '23:59:00', '2026-04-03 12:16:13', '2026-04-03 12:16:13', '2026-04-08'),
(2949, 161, '00:00:00', '23:59:00', '2026-04-03 12:16:13', '2026-04-03 12:16:13', '2026-04-09'),
(2950, 216, '00:00:00', '23:59:00', '2026-04-03 12:23:04', '2026-04-03 12:23:04', '2026-04-07'),
(2951, 216, '00:00:00', '23:59:00', '2026-04-03 12:23:04', '2026-04-03 12:23:04', '2026-04-08'),
(2952, 216, '00:00:00', '23:59:00', '2026-04-03 12:23:04', '2026-04-03 12:23:04', '2026-04-09'),
(2953, 185, '00:00:00', '01:00:00', '2026-04-03 13:41:02', '2026-04-03 13:41:02', '2026-02-10'),
(2954, 185, '00:00:00', '01:00:00', '2026-04-03 13:41:02', '2026-04-03 13:41:02', '2026-02-11');
INSERT INTO `product_availabilities` (`id`, `product_id`, `start_time`, `end_time`, `created_at`, `updated_at`, `available_date`) VALUES
(2955, 185, '00:00:00', '01:00:00', '2026-04-03 13:41:02', '2026-04-03 13:41:02', '2026-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-02-19 03:40:53', '2025-02-19 03:40:53'),
(2, 'User', 'web', '2025-02-19 03:40:53', '2025-02-19 03:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `extra_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`extra_data`)),
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `key`, `title`, `description`, `extra_data`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'landing_page', 'Landing Page', 'Landing Page Description', '\"{\\\"services\\\":[{\\\"image\\\":\\\"cms\\\\\\/images\\\\\\/q0gMpPgUxJMeqTe0fFhSLWEMMtiD8ItqfFLp1t0B.png\\\",\\\"title\\\":\\\"Des petits plats au grand go\\\\u00fbt\\\",\\\"description\\\":\\\"Cuisin\\\\u00e9 chaque jour avec amour et passion !\\\",\\\"sub_description\\\":null},{\\\"image\\\":\\\"cms\\\\\\/images\\\\\\/f3WtphSyeVL0NEtMdDwFiPgfwPo8yOI7vBtEbUq2.png\\\",\\\"title\\\":\\\"Le go\\\\u00fbt des chefs chez vous\\\",\\\"description\\\":\\\"Vous commandez, on cuisine et on livre\\\",\\\"sub_description\\\":null},{\\\"image\\\":\\\"cms\\\\\\/images\\\\\\/ktYdWeIiquSIybdXbqMQmygHhHdoD7C6aWeNKMXV.png\\\",\\\"title\\\":\\\"Savourez l\\\\u2019excellence des chefs\\\",\\\"description\\\":\\\"Vos plats livr\\\\u00e9s \\\\u00e0 domicile ou au bureau dans toute l\'Ile de France\\\",\\\"sub_description\\\":\\\"Carte restaurant accept\\\\u00e9e\\\"}]}\"', 1, 1, '2025-02-19 05:34:48', '2025-10-15 11:20:43'),
(2, 'blog_page', 'Cocktails, buffets, breakfasts & plated services from our chefs', 'Notre service de traiteur transforme chaque événement en une expérience culinaire mémorable. Nous combinons créativité, fraîcheur et qualité pour proposer des mets raffinés adaptés à toutes les occasions : mariages, anniversaires, événements d’entreprise, cocktails et buffets.', '\"{\\\"hero_section_heading\\\":\\\"Des cocktails et buffets sans gaspillage\\\",\\\"hero_section_video\\\":\\\"cms\\\\\\/videos\\\\\\/TCEnC9MfqM0hwW6OdYgoSWnMvFy8P27N8C5to8bM.mp4\\\",\\\"hero_section_description\\\":\\\"D\\\\u00e9couvrez une nouvelle fa\\\\u00e7on de profiter d\\\\u2019un buffet et d\\\\u2019un cocktail : savoureux, \\\\u00e9l\\\\u00e9gant\\\\u2026 et responsable.\\\\r\\\\nNotre service Cocktails & Buffets Sans Gaspillage est con\\\\u00e7u pour offrir une exp\\\\u00e9rience culinaire g\\\\u00e9n\\\\u00e9reuse, moderne et durable, en \\\\u00e9vitant les exc\\\\u00e8s alimentaires tout en garantissant la satisfaction de chaque invit\\\\u00e9.\\\",\\\"service_title\\\":\\\"Saveurs & \\\\u00c9l\\\\u00e9gance\\\",\\\"service_description\\\":\\\"Notre service de traiteur vous offre une exp\\\\u00e9rience culinaire unique, alliant saveur, \\\\u00e9l\\\\u00e9gance et responsabilit\\\\u00e9. Que ce soit pour un mariage, un anniversaire, un cocktail professionnel ou un buffet d\\\\u2019entreprise, nous cr\\\\u00e9ons des menus sur-mesure adapt\\\\u00e9s \\\\u00e0 vos envies et au profil de vos invit\\\\u00e9s.\\\"}\"', 1, 1, '2025-02-20 10:13:05', '2025-11-26 16:28:04'),
(3, 'who_we_are', 'Qui sommes-nous?', 'Who We Are Description', '\"{\\\"sub_title\\\":\\\"On est un service de catering et cantine digitale qui propose une cuisine du monde, \\\\u00e9labor\\\\u00e9s \\\\u00e0 partir de produits frais et locaux. Nous mettons un point d\\\\u2019honneur \\\\u00e0 privil\\\\u00e9gier l\\\\u2019artisanat made in France.\\\",\\\"hero_image\\\":\\\"cms\\\\\\/images\\\\\\/k29XjW0oc1sMnVXfa7kZgHgyVE7zMSWQNBa4Cm2N.jpg\\\",\\\"section_2_heading\\\":\\\"Des petits plats au grand go\\\\u00fbt !\\\",\\\"section_2_description\\\":\\\"Nos plats faits maison sont pr\\\\u00e9par\\\\u00e9s avec des produits frais et des ingr\\\\u00e9dients naturels, pour vous offrir un \\\\u00e9quilibre sain tout en vous r\\\\u00e9galant! Parce qu\'on est convaincus que manger bien, c\'est aussi manger avec le sourire\\\\u2026et un petit plaisir en plus.\\\",\\\"section_2_title\\\":\\\"La cuisine, notre passion!\\\",\\\"section_2_sub_title\\\":\\\"Notre \\\\u00e9quipe passionn\\\\u00e9e vous invite \\\\u00e0 un voyage culinaire unique, en apportant la diversit\\\\u00e9 des saveurs du monde entier, tout en restant ancr\\\\u00e9e dans l\'art de la cuisine fran\\\\u00e7aise. Chaque plat est une aventure, chaque bouch\\\\u00e9e une d\\\\u00e9couverte.\\\",\\\"section_2_image\\\":\\\"cms\\\\\\/images\\\\\\/TnGknSz6pz2L1B4EzbSp7RKe4iQA6HypBrhovdf3.png\\\",\\\"section_3_heading\\\":\\\"Pourquoi TASTIIE?\\\",\\\"section_3_image\\\":\\\"cms\\\\\\/images\\\\\\/VlJzFPWR9FDbdV7n5B0ZYbkjCT6OUVlsW7vNFJUN.png\\\",\\\"section_3_description\\\":\\\"Depuis toujours, la cuisine a \\\\u00e9t\\\\u00e9 pour moi un moyen de tisser des liens et de c\\\\u00e9l\\\\u00e9brer la vie. Inspir\\\\u00e9e par ma grand-m\\\\u00e8re et ma m\\\\u00e8re,j\\\\u2019ai d\\\\u00e9cid\\\\u00e9 de partager cette passion \\\\u00e0 travers \\\\\\\"Tastiie\\\\\\\". Mon objectif est d\\\\u2019inspirer les gens \\\\u00e0 voir la cuisine comme un art de vivre, un moyen de rassembler et de cr\\\\u00e9er des souvenirs. Chaque plat que je pr\\\\u00e9pare raconte une histoire, et je suis d\\\\u00e9termin\\\\u00e9e \\\\u00e0 faire grandir ce r\\\\u00eave pour offrir une exp\\\\u00e9rience authentique et pleine de passion.\\\"}\"', 1, 1, '2025-03-11 09:43:27', '2025-12-16 11:58:48'),
(4, 'become_a_leader', 'Devenir chef', 'Passionné de cuisine? Envie de vivre de votre passion? On vous accompagne!', '\"{\\\"services\\\":[{\\\"icon\\\":\\\"cms\\\\\\/images\\\\\\/Pl5BJKZxhZGoRgwYKl3dumBtH8b9ICzyBRDaaZeK.png\\\",\\\"title\\\":\\\"Accompagnement\\\",\\\"desc\\\":\\\"Nous vous offrons la formation aux normes HACCP et vous accompagnons dans vos d\\\\u00e9marches pour que vous puissiez vous concentrer sur votre passion\\\"},{\\\"icon\\\":\\\"cms\\\\\\/images\\\\\\/DRd4IisgiQgHrIK3ZcmeFAlqVbCmDhAQWy7QM36N.png\\\",\\\"title\\\":\\\"Cuisinez quand vous voulez\\\",\\\"desc\\\":\\\"Vous \\\\u00eates ma\\\\u00eetre \\\\u00e0 bord : Vous cuisinez quand vous voulez, \\\\u00e0 votre rythme. Adieu les horaires d\\\\u00e9cal\\\\u00e9s et le stress permanent de la restauration\\\"},{\\\"icon\\\":\\\"cms\\\\\\/images\\\\\\/eD7WoMvzMpCimsAGaPUJwrpQAntCDlJBKECaxuyt.png\\\",\\\"title\\\":\\\"Nous vous achetons les repas\\\",\\\"desc\\\":\\\"Vous \\\\u00eates ma\\\\u00eetre \\\\u00e0 bord : Vous cuisinez quand vous voulez, \\\\u00e0 votre rythme. Adieu les horaires d\\\\u00e9cal\\\\u00e9s et le stress permanent de la restauration\\\"}],\\\"section_2_title\\\":\\\"Rejoignez la communaut\\\\u00e9 Avekapeti\\\",\\\"section_2_image\\\":\\\"cms\\\\\\/images\\\\\\/xikILrKGmFvhvA6HKV75eiRYgfPRuEKv3Ph8mFoS.png\\\",\\\"clients\\\":[{\\\"image\\\":\\\"cms\\\\\\/images\\\\\\/OByrA0PdNNlBSW47zzlRv0Tk8k13R1amtg0OC2Wx.jpg\\\"}]}\"', 1, 1, '2025-03-11 09:55:23', '2025-05-30 10:19:17'),
(5, 'privacy_policy', 'Privacy Policy', 'Privacy Policy Description', '\"{\\\"content\\\":\\\"<h2><strong>Information We Collect<\\\\\\/strong><\\\\\\/h2><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><h2><strong>How We Use Your Information<\\\\\\/strong><\\\\\\/h2><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><h2><strong>Data Security and Retention<\\\\\\/strong><\\\\\\/h2><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><h2><strong>Third-Party Services<\\\\\\/strong><\\\\\\/h2><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p>\\\"}\"', 1, 1, '2025-03-11 09:59:42', '2025-03-11 09:59:42'),
(6, 'terms_and_conditions', 'Terms and Conditions', 'Terms and Conditions Description', '\"{\\\"content\\\":\\\"<h2><strong>Information We Collect<\\\\\\/strong><\\\\\\/h2><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><h2><strong>How We Use Your Information<\\\\\\/strong><\\\\\\/h2><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><h2><strong>Data Security and Retention<\\\\\\/strong><\\\\\\/h2><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><h2><strong>Third-Party Services<\\\\\\/strong><\\\\\\/h2><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, modi tenetur. Laborum aut placeat sint adipisci voluptate reiciendis saepe. Assumenda nisi doloremque temporibus. Iste fuga, consequuntur earum asperiores sint alias?<\\\\\\/p>\\\"}\"', 1, 1, '2025-03-11 10:00:12', '2025-03-11 10:00:12');

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
('IHDGUAJj3gfSFmIAp8YHhlIIOH2BwNLgbrKulsDo', NULL, '2a03:2880:27ff:4c::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDhFN29tUXloeTlITTNLYmhSVzZ0bU8zS3ZJcnVnUHR6T0oxUWJyMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vd3d3LnRhc3RpaWUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776170623),
('K9kW1i9a34FopCxd5qbtGrz4iSqVeUMWaEANirU6', NULL, '192.36.109.89', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/122.0.6261.89 Mobile/15E148 Safari/604', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2dsUWVDNlZIaW5nN0tmY2lDTEFFYnN1eHBGM3hKTmhKcXJlZkR6ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vdGFzdGlpZS5jb20vYmVjb21lLWEtbGVhZGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776162284),
('LOHCLez00MDPRIsnl4Ka6SvaT5GWxaTK84FuficK', NULL, '192.36.109.82', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/122.0.6261.89 Mobile/15E148 Safari/604', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2tyVW1abXdsak5KeFlZOU1DaFcwdnR5aEFTRVMzT0IxTm44WmFUZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vdGFzdGlpZS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776162284),
('NrbkZB8LCqpL4oyStwzBJD9jXb0RPAVJTtnZwCz6', 56, '72.255.28.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiM3FrNjVCVWM4c2RxRXI5MVlTNEhQdHB0NlRrWVlGbU50cG9LUm9xbCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwczovL3Rhc3RpaWUuY29tL2FkbWluaXN0cmF0b3IvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTY7czo2OiJsb2NhbGUiO3M6MjoiZW4iO30=', 1776169207),
('O74PYBK2yKwTlZTBDmqcwFC3Oc12uawpZFothiys', NULL, '192.36.109.131', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/122.0.6261.89 Mobile/15E148 Safari/604', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXZVWjU2Sk1IdWRaSXBOMXhXb1ROeUFJckZTSWl2TkFGMm9IYmVhRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vdGFzdGlpZS5jb20vZm9yZ290LXBhc3N3b3JkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776162284),
('tb2yuEmOWbngJc6tBDJLcwCE4rSr8t5MHqenOlRW', NULL, '192.36.109.104', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/122.0.6261.89 Mobile/15E148 Safari/604', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWZPcHVmeEpLUXhPYm55UWxHU3REWk5Ic2Rib1FVQng2dXpLZGJhZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vdGFzdGlpZS5jb20vdGVybXMtYW5kLWNvbmRpdGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776162284),
('XwvZMLmJZ6KzulqBtfAAGSXCLw5Tt5Z7QD0UQv3P', NULL, '2a0d:e487:14cf:2191:e94c:51c4:f119:ccb5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieXdkbWpibExhTnBudURoZU1MSkx6bkJ0TGdHQ0VkTHExa1FDdWJWUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vdGFzdGlpZS5jb20vd2hvLXdlLWFyZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776170451);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `name`, `email`, `phone_no`, `address`, `country`, `city`, `state`, `zip_code`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'shahzad usman', 'shahzadusman721@gmail.com', '03017724537', 'new muslim town', 'IN', 'bWp', 'mall road', '123456', 1, '2025-03-07 10:50:48', '2025-03-07 10:50:48'),
(2, 'shahzad usman', 'shahzadusman721@gmail.com', '03017724537', 'new muslim town', 'IN', 'bWp', 'mall road', '123456', 2, '2025-03-07 10:56:31', '2025-03-07 10:56:31'),
(3, 'shahzad usman', 'shahzadusman721@gmail.com', '03017724537', 'new muslim town', 'IN', 'bWp', 'mall road', '123456', 3, '2025-03-07 14:51:01', '2025-03-07 14:51:01'),
(6, 'Mishael PALMA', 'mishael@lenombretrois.com', '0769439412', '270 boulevard de la Boissière', 'FR', 'Montreuil', 'Seine Saint Denis', '93100', 6, '2025-10-03 14:15:07', '2025-10-03 14:15:07'),
(7, 'Mishael PALMA', 'lenombretrois@gmail.com', '0769439412', '18 rue Lesage', 'FR', 'Paris', 'île de france', '75020', 7, '2025-11-24 14:19:12', '2025-11-24 14:19:12'),
(8, 'Le Nombre Trois ', 'lenombretrois@gmail.Com', '0769439412', '18 Rue Lesage', 'FR', 'Paris', 'NA', '75020', 8, '2026-04-09 13:30:13', '2026-04-09 13:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(500) DEFAULT NULL,
  `where_did_you_hear_about_us` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enterprise` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `phone_number`, `image`, `delivery_address`, `where_did_you_hear_about_us`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `google_id`, `remember_token`, `created_at`, `updated_at`, `enterprise`) VALUES
(1, 'Super', 'Admin', 'Super Admin', 'mishael@tastiie.com', NULL, 'profile//CLiwox9Flsi6XHkm1eW6pFSzNBTnwphlCvykKbvx.jpg', NULL, NULL, '2025-02-19 03:40:53', '$2y$12$9VWns3a3vASDxIZx0F6GfOEPqXUATRsKVA9IvHnrhJtaV5UZLtKGy', NULL, NULL, NULL, NULL, 'Gvj4k8xhCI2jKrDkxF3EeqXOxnSCBMGOzbzjEI5pIB68kukzH2OcoDvab1HK', '2025-02-19 03:40:54', '2026-03-31 16:04:01', NULL),
(2, 'Syed', 'Ahmad', 'Syed Ahmad', 'moin@gmail.com', '03036985755', 'users/images/orxaTvkTOmdV8AZx8xI0DcM3xJR1gUseXtEg36CI.jpg', NULL, NULL, NULL, '$2y$12$m4SuNR2b1cSlwB646DtSgO3uB1FDY0jyAzwbnm/A/YoZSonzPLI1O', NULL, NULL, NULL, NULL, NULL, '2025-02-26 16:08:38', '2025-02-26 16:08:38', NULL),
(7, 'moin', 'ahmad', 'moin ahmad', 'moeen.khan.5678@gmail.com', '0303698575', NULL, 'St#8b , Badami Bagh lahore', 'Facebook', '2025-03-06 13:58:26', '$2y$12$nGDQDHasGZ9xp/gnQOIE/eRogVq/TlkfgipOQ5zutuGjJVaV9.Hr.', NULL, NULL, NULL, NULL, NULL, '2025-03-06 12:51:49', '2025-03-06 13:58:26', NULL),
(9, 'test', 'test', 'test test', 'fayemog136@makroyal.com', '03036985767', NULL, 'St#8b , Badami Bagh lahore', 'Lahore', NULL, '$2y$12$F9xj1ZwTzadbU9tyFurjyunsEfqnhX7O7wbBKyzAdyudF.am3hueq', NULL, NULL, NULL, NULL, NULL, '2025-03-12 12:28:27', '2025-03-12 12:28:27', NULL),
(10, 'Mohamed', 'MOUSSA', 'Mohamed MOUSSA', 'mocamoney@yahoo.fr', '0689078615', NULL, '21 rue pouchet 751017', 'azazaz', NULL, '$2y$12$3Q4O0eocUg/TDQ0ioxRXneY3YJ3R.gB4hnZpOKoiBkVIG9B4e3bkW', NULL, NULL, NULL, NULL, NULL, '2025-03-14 13:16:42', '2025-03-14 13:16:42', NULL),
(11, 'qelesynkil', 'ozluszpdfv', 'qelesynkil ozluszpdfv', 'fmyheimm@testform.xyz', '+1-679-377-9983', NULL, 'vwzfmndqzn', 'fkhrjhuddesfprewswkexmehinsqmj', NULL, '$2y$12$U0/zCUU/tyPO0XmFrBJlreGmHEu6EJjfwoDda72bZ66PrqzgYYlv2', NULL, NULL, NULL, NULL, NULL, '2025-06-21 08:00:04', '2025-06-21 08:00:04', 'whnxsjuvjj'),
(12, 'ffijdrudpz', 'pnjudhywxe', 'ffijdrudpz pnjudhywxe', 'ygsqkxox@testform.xyz', '+1-257-687-5479', NULL, 'lpgdddpqos', 'sjkjshkgkoepfnqtnzxluhrpxmkgzi', NULL, '$2y$12$nkydvUX.PgG30E4Iq3Dywu47lEqu4ZOJH2YCQIgQOx0FAZbo963S.', NULL, NULL, NULL, NULL, NULL, '2025-08-01 05:15:41', '2025-08-01 05:15:41', 'ughihosdes'),
(13, 'xsdfmdyrip', 'vttydhsjko', 'xsdfmdyrip vttydhsjko', 'suhlivdf@testform.xyz', '+1-227-167-3295', NULL, 'nkisnilytm', 'impjqwsuiltlfslfverxtppqqrnmhe', NULL, '$2y$12$gMRWygMxB0LOPyqp9HZeduADfwdAHh0lojOorAqnhwZJQZyaaSyMy', NULL, NULL, NULL, NULL, NULL, '2025-08-01 05:15:43', '2025-08-01 05:15:43', 'igpoixyrzq'),
(14, 'dvvshtsrnn', 'qegynikmnt', 'dvvshtsrnn qegynikmnt', 'pzexojdf@testform.xyz', '+1-096-993-5726', NULL, 'stgionmnds', 'xnrjsgxdlfggpkdlwyvvowvotqyiur', NULL, '$2y$12$8X.0hkf3deJ8ZcK.IRhP9.PnsSIN7yi1Cq9vHK9gNPAfTTP1eoWYG', NULL, NULL, NULL, NULL, NULL, '2025-08-01 05:15:48', '2025-08-01 05:15:48', 'jgsqujgfde'),
(15, 'mwestjtgdj', 'hqdmmrwmqk', 'mwestjtgdj hqdmmrwmqk', 'ireqpgiu@testform.xyz', '+1-133-397-4072', NULL, 'sqghxtoghh', 'ohfxqnqljunjtvrenwxrznjgvvwnnp', NULL, '$2y$12$SDtgVRyCdgDi63XHKWqAluPR71lQ5C22zGAGdXrHWeJCRbfL8GEuG', NULL, NULL, NULL, NULL, NULL, '2025-08-26 06:50:57', '2025-08-26 06:50:57', 'qfirktifyw'),
(16, 'fvvrsqfify', 'wdijldnskf', 'fvvrsqfify wdijldnskf', 'qvtndhpl@testform.xyz', '+1-397-955-7123', NULL, 'ehnlgngfpl', 'jedujnyjtvewpwlkdrmzlsfkwzzefs', NULL, '$2y$12$ZXpjhuqDdBlWliFCkC1stOTzmFHxQYjtkniRbSERjPDqE7V/845KO', NULL, NULL, NULL, NULL, NULL, '2025-08-26 06:50:57', '2025-08-26 06:50:57', 'yxpogdsmzw'),
(17, NULL, NULL, ' ', 'adminxp@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$12$rWWmhecxTOMNu438RUBBNuPVYP41udlparhAICJWae5hcUqKFd5UO', NULL, NULL, NULL, NULL, NULL, '2025-09-10 04:15:57', '2025-09-10 04:15:57', NULL),
(18, NULL, NULL, ' ', 'adminexp@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$12$z5y3x1t2tC01gSVAkaqGg.4vcqIM1alwdQm6/2xbwATHKQSXDYXXW', NULL, NULL, NULL, NULL, NULL, '2025-09-29 18:02:00', '2025-09-29 18:02:00', NULL),
(22, 'IuKEqEFI', 'lYLODWpXbDJEDjV', 'IuKEqEFI lYLODWpXbDJEDjV', 'naxevila586@gmail.com', '4908603284', NULL, 'RMoJdtFADcbQEm', 'GYxriWtARtJ', NULL, '$2y$12$V0M0opEh3KUWMAoIY91EyeW60Gf219b.dY87NN8ywK5N45Cjq/M6O', NULL, NULL, NULL, NULL, NULL, '2025-10-05 12:56:48', '2025-10-05 12:56:48', 'imEsVFJGjzwVH'),
(23, 'tUgNlbYIxsCR', 'fOguNUDqQqzhO', 'tUgNlbYIxsCR fOguNUDqQqzhO', 'nusalocapal706@gmail.com', '9362144498', NULL, 'svaIVvLIObcJGTP', 'DUyWIBYne', NULL, '$2y$12$UNRCoV2n1epjL/hvLkIkyOWfkglOB8RwzG.oCSuCqpe3T2mEFLqk2', NULL, NULL, NULL, NULL, NULL, '2025-10-06 10:42:55', '2025-10-06 10:42:55', 'eBatqqMzdw'),
(24, 'EiXZPtUurVt', 'yPbmJUwyNE', 'EiXZPtUurVt yPbmJUwyNE', 'upezirijo46@gmail.com', '3254064991', NULL, 'enCKneeLndofkeW', 'kPJhAvltsgvKTYT', NULL, '$2y$12$NWrQmvH082yD9R/S3Wp/EuIHYMVMi3aV/.lPrgkIlRTWbusSTcfim', NULL, NULL, NULL, NULL, NULL, '2025-10-14 06:24:13', '2025-10-14 06:24:13', 'RDxGqlnThUi'),
(25, 'PGxeqIGX', 'cJPVdEqpRrcYmY', 'PGxeqIGX cJPVdEqpRrcYmY', 'akepayah28@gmail.com', '4658919884', NULL, 'DBaPFDbmQ', 'swDBLxoUJHih', NULL, '$2y$12$2MJ5sdv8Nk148Ej7dE578uaK03YL7tugefurfdxfO5w3OPFbA0ht6', NULL, NULL, NULL, NULL, NULL, '2025-10-16 13:04:20', '2025-10-16 13:04:20', 'FhKhIsvLmfSEh'),
(26, 'LGqUjQhdXdUOz', 'vkvYgGkp', 'LGqUjQhdXdUOz vkvYgGkp', 'aboyoduricad74@gmail.com', '8171160432', NULL, 'qGPZGddEBlrJEbe', 'oYPEWMbGayT', NULL, '$2y$12$sitIzV1.Kugq1W1W6nxQvu/VxUBblTPOOlk/kkyCPlN18uiDQ13TO', NULL, NULL, NULL, NULL, NULL, '2025-10-19 11:21:12', '2025-10-19 11:21:12', 'jlNRImVF'),
(27, 'FjHuEaAwykKRJJvLAGvXb', 'rbndtIvzxKluNBWYXYsEl', 'FjHuEaAwykKRJJvLAGvXb rbndtIvzxKluNBWYXYsEl', 'rebekkeinnpvg4@gmail.com', '5565723288', NULL, 'OTokVvwDzBQwcLVcfWQ', 'FsnMmJZFlYGdrreUcrTOyM', NULL, '$2y$12$LEWe6ggba.rFiUgaDgH.heCOswt4dRGmxQSrUudHDk.daG0IwnK0K', NULL, NULL, NULL, NULL, NULL, '2025-10-25 05:25:57', '2025-10-25 05:25:57', 'CyLLuaxDGEKTkrkHkpr'),
(28, 'yRIFgnJNQDSkPmioJDqKjA', 'sQLTcwhdymRqgxgvlYwO', 'yRIFgnJNQDSkPmioJDqKjA sQLTcwhdymRqgxgvlYwO', 'djoselainhensonaz1999@gmail.com', '3627483001', NULL, 'myLQQagXdpbhGirYvlmwpB', 'aGTzAQIDzNoTxvYbsChH', NULL, '$2y$12$Y5ZI.eqV8/3/CKNgoy/Pl./gIHga3UKQS/RbrUjp4UgOvCII45tcS', NULL, NULL, NULL, NULL, NULL, '2025-10-27 05:49:04', '2025-10-27 05:49:04', 'RMSfXIMTumZajfTmOh'),
(29, 'uTKvaVtCYRofguxVVO', 'moHKgBUEzoGaWUWVTQ', 'uTKvaVtCYRofguxVVO moHKgBUEzoGaWUWVTQ', 'datozorisi59@gmail.com', '5446544892', NULL, 'ptFplWZfNKfrfsoGfTQHjiQ', 'qlLMaWLaEvIzPcfTNQnFO', NULL, '$2y$12$2GZgm2DOIEVZuCrHMtRpqOWynk1TzNXZJHEJNL1B7pSf7e278qdr.', NULL, NULL, NULL, NULL, NULL, '2025-10-30 02:33:50', '2025-10-30 02:33:50', 'dkKoBniCYNFpwGILYSvJ'),
(30, 'patrick', 'boucaud', 'patrick boucaud', 'boucauddpatrick@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$12$.WGAwqBbX7AKTGRyQvT4UuRi/31ZaxG.CErMrxbFslm7tbNh2arty', NULL, NULL, NULL, '103048374134391238987', NULL, '2025-10-30 12:22:11', '2025-10-30 12:22:11', NULL),
(31, 'paul', 'le', 'paul le', 'lacisa2547@dropeso.com', '0758520255', NULL, '250 rue paris', 'how are you', NULL, '$2y$12$7jvS3oSAh2PxKxhW8W5zse8yhH.broPzQu3onQaVOOIMkie55RPya', NULL, NULL, NULL, NULL, NULL, '2025-10-31 10:01:05', '2025-10-31 10:01:05', 'papa'),
(32, 'ElDOJWamMvGsviwQXXL', 'PTzsZUMCZgJMNlUdUhzFF', 'ElDOJWamMvGsviwQXXL PTzsZUMCZgJMNlUdUhzFF', 'tolicedu22@gmail.com', '7370175990', NULL, 'ztPKSniZMDbqOMvDM', 'NUZyZzVxcEIEXlWEtw', NULL, '$2y$12$m7RGpdoTK6KJJxXOBf1Xs.PrHPnVlymK7jb5FlOrsL3.GY9oYSR8G', NULL, NULL, NULL, NULL, NULL, '2025-10-31 14:09:13', '2025-10-31 14:09:13', 'GPZAkROBNOVZvocqgZPy'),
(33, 'Abdul', 'Rahman', 'Abdul Rahman', 'abdulrahman.masriattal@gmail.com', NULL, NULL, NULL, NULL, '2025-11-06 13:00:42', '$2y$12$T2dfFfQgoy0n1.WRC6WrZ.kKoLwAKE2PpuhroW8ElwUQJgpcgE.7C', NULL, NULL, NULL, '113470340304941837034', NULL, '2025-11-06 12:59:26', '2025-11-06 13:00:42', NULL),
(34, 'nHfncYhVpMKtiJjJbmWr', 'uSIqejDilmOoCIINJHcIe', 'nHfncYhVpMKtiJjJbmWr uSIqejDilmOoCIINJHcIe', 'punacozedefe09@gmail.com', '8776477264', NULL, 'zBswVeGKfGIRHKaSq', 'aeBBkCmeYtYipHbKuGQfjwaC', NULL, '$2y$12$Fl64GSoJN7/0y6cPRot0l.bnQPMhrXFZjmlQiO78h3wM9oNJFv3.2', NULL, NULL, NULL, NULL, NULL, '2025-11-17 10:09:48', '2025-11-17 10:09:48', 'FTzpmdnsfSXZrkQwMkQd'),
(35, 'patrick', 'boucaud', 'patrick boucaud', 'boucaudpatrick21@gmail.com', NULL, NULL, NULL, NULL, '2025-11-24 14:33:21', '$2y$12$AXDo4wHK49q/KTxr1kpn3O.48NGEcbgdceWD4ZAg2IHQQzLwlA3Zm', NULL, NULL, NULL, '102074809472317818815', NULL, '2025-11-21 09:53:25', '2025-11-24 14:33:21', NULL),
(36, 'Mishael', 'PALMA', 'Mishael PALMA', 'lenombretrois@gmail.com', '0769439412', NULL, '270 boulevard de la Boissière', 'Un ami', '2025-11-24 14:17:21', '$2y$12$y9AJSFxVAIgUm2hOaipksuU8ZTG0FFOj8w/DDxWJDWKfiQbk8nbbi', NULL, NULL, NULL, NULL, NULL, '2025-11-21 14:31:17', '2025-11-24 14:17:21', 'Le Nombre Trois'),
(37, 'Support', 'exoux', 'Support exoux', 'exoux920@gmail.com', '03114019497', 'profile//5OPKhdzUM2Z0Yeo2ASRVoA78Ug5xPorK3k557vXd.png', 'New Muslim Town Bahawalpur', 'Social Media', '2025-11-21 15:05:03', '$2y$12$ei2.15UqXWsYzoM/bMKpe.pLlzjqzFcg/Hy334y1E..YtDZQJFN6.', NULL, NULL, NULL, '106214647208180158349', NULL, '2025-11-21 15:04:30', '2025-11-21 15:05:47', NULL),
(38, 'Mo', '', 'Mo ', 'wame.moussa@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$12$1OFgAbmljZ6aMh8BnAEmgejrCSBfo/S3hymokXz37smAouQxdCP2S', NULL, NULL, NULL, '114626112267806807737', NULL, '2025-11-21 15:22:50', '2025-11-21 15:22:50', NULL),
(39, 'Mohamed', 'MOUSSA', 'Mohamed MOUSSA', 'mohamed.moussa.pro@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$12$wljV0jgoafFqopxPGWDlnedxzQik98o71cc793UYMfSVHXpI3GYb6', NULL, NULL, NULL, '116364612128644023962', NULL, '2025-11-21 15:23:19', '2025-11-21 15:23:19', NULL),
(40, 'Mohamed', 'MOUSSA', 'Mohamed MOUSSA', 'fondateur@tektime.fr', NULL, NULL, NULL, NULL, '2025-11-21 15:28:34', '$2y$12$nh6CwWXY9RF8aa6DvM/uueHm.jRquzCNVmMiuZXPfaZoD3Cr1gJIC', NULL, NULL, NULL, '100284258439324935307', NULL, '2025-11-21 15:24:04', '2025-11-21 15:28:34', NULL),
(41, 'Ak', 'Villain', 'Ak Villain', 'villainak8@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$12$PV7qt8fjclXxf/rxNWkPHuyX4/QPuwyFGHPWC06nLNQUXk5fRR4Gy', NULL, NULL, NULL, '109681713401946337860', NULL, '2025-11-21 16:22:24', '2025-11-21 16:22:24', NULL),
(42, 'equicJet', 'equicJet', 'equicJet equicJet', '5vx7qoai@icloud.com', '81211369364', NULL, 'Kaduna', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/musmknhu', NULL, '$2y$12$WQFgjIWNIjWEptDQkxJX6OuYabBHMFHa9GibuhcOaiLmV6eO1BXnO', NULL, NULL, NULL, NULL, NULL, '2025-11-28 02:32:32', '2025-11-28 02:32:32', NULL),
(43, 'equicJet', 'equicJet', 'equicJet equicJet', '99kuzw8y@gmail.com', '82923813654', NULL, 'Kaduna', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/yka622zu', NULL, '$2y$12$Svd28UjSNLo3sLOMnG45nOhHek1au5h9M1B5ht9sJDBbQRrXnqLEm', NULL, NULL, NULL, NULL, NULL, '2025-11-29 05:31:39', '2025-11-29 05:31:39', NULL),
(44, 'equicJet', 'equicJet', 'equicJet equicJet', 'vhwo8wjn@icloud.com', '86361777198', NULL, 'Kaduna', 'Photos for my escort application are uploaded.   Let me know if the quality is good.   Preview: https://tinyurl.com/yt3awd8u', NULL, '$2y$12$yNj3KpXbM9gBmpefmwfD.uATibU/ZzBmpsjw1ucEu8nr7onj0o3nC', NULL, NULL, NULL, NULL, NULL, '2025-12-08 07:38:56', '2025-12-08 07:38:56', NULL),
(45, 'obhCOZrHmKlVjPdV', 'tuWDhWJIDKulVlcu', 'obhCOZrHmKlVjPdV tuWDhWJIDKulVlcu', 'onunuvirebu861@gmail.com', '4349846968', NULL, 'RagGUKnKswndLhmbsLDoZh', 'kNdmhNkRTMpoWiMlzv', NULL, '$2y$12$/Qr70bQx2wAECe2ALbpX5.nYnTrnkWBSY1EPT.7Q43QXdTpKjsFo6', NULL, NULL, NULL, NULL, NULL, '2025-12-09 09:55:12', '2025-12-09 09:55:12', 'mdIGPCsxswHqkkEMVyBUTb'),
(46, 'JOkLZiMEcJtcOzsfFulIRB', 'IlqZPivcUtTsqwQtNAMCLrnn', 'JOkLZiMEcJtcOzsfFulIRB IlqZPivcUtTsqwQtNAMCLrnn', 'guduriboquj304@gmail.com', '5187078858', NULL, 'CrAIzHRCBFJHLyaxLdYOwTY', 'aJxAGxXoiFflpXWN', NULL, '$2y$12$qZV1bCoAp5/aPoZGeNyaYOsQX6oncJayTRWOh72abtHjJgovWjMrq', NULL, NULL, NULL, NULL, NULL, '2025-12-20 01:47:08', '2025-12-20 01:47:08', 'jSbeJuCISVuDpUpKQVEF'),
(47, 'Aspen', 'Christian', 'Aspen Christian', 'quoffebowiyu-8399@yopmail.com', '0102030405', NULL, 'Omnis eius nulla max', 'Enim et quae eiusmod', NULL, '$2y$12$EyIFCgH0UAN7f2tb11AGCOOr.yu.dGah.gHE2Ogiy7zu99a.KgHhK', NULL, NULL, NULL, NULL, NULL, '2026-01-13 10:36:39', '2026-01-13 10:36:39', 'Occaecat aliquip qui'),
(48, 'MbiaFQKsXweRtEIaYBcw', 'LlPXgpoObBpWGBsX', 'MbiaFQKsXweRtEIaYBcw LlPXgpoObBpWGBsX', 'uza.v.idu.g.u.wu.357@gmail.com', '7397927313', NULL, 'MFyMQLZoRHdhiIPIusF', 'ntkhuNtpXGsbCeYHRVSmQWw', NULL, '$2y$12$bXGgGErTMp8Xx42r8ZkwheUWG7iyIQ8p72n1HDdUiV8ZUQwEgNKQi', NULL, NULL, NULL, NULL, NULL, '2026-02-11 23:32:57', '2026-02-11 23:32:57', 'nsfkeGAKkoOcixYM'),
(49, 'kiyeeqdvzm', 'pedoqzwquz', 'kiyeeqdvzm pedoqzwquz', 'gkrjktoe@checkyourform.xyz', '+1-019-569-5369', NULL, 'oigstqyjew', 'sezwredgjsteiflvlsipisyqfokfyp', NULL, '$2y$12$thSSW.bimf9GRFExnAbBAeMeKBa85xzDGhMJ0LVuiq7uLHKEQMrFu', NULL, NULL, NULL, NULL, NULL, '2026-02-22 23:54:25', '2026-02-22 23:54:25', 'fwgoznfpvr'),
(50, 'uwyfukzxik', 'pnznusmtvx', 'uwyfukzxik pnznusmtvx', 'xmgfhrxx@checkyourform.xyz', '+1-549-702-5677', NULL, 'otwkhiiiov', 'zxgvlxgfdfjmrsnqygzurqpntsqvpy', NULL, '$2y$12$me2L.QY1fcAsu2iplMncsuyeHXNWCU9IVgiYMi8jU70gOo9r0NKUm', NULL, NULL, NULL, NULL, NULL, '2026-02-22 23:54:26', '2026-02-22 23:54:26', 'rwerftuvfp'),
(51, 'Yuri', 'Mishael', 'Yuri Mishael', 'mishaelvpalma14@gmail.com', NULL, NULL, NULL, NULL, '2026-04-09 13:17:46', '$2y$12$73BXGGXW6WG33ywKD7S2kuMZHlrHqNCc/zbFcsl7tYEWz4C9bQiHK', NULL, NULL, NULL, '116698082397790245225', '7v3oJLWRvebtTugbwGiwy7WS8V0Z5zV1NklL4kl0vVPRQfeqb0yQqW0KihTT', '2026-04-09 12:57:26', '2026-04-09 13:17:46', NULL),
(52, 'luca', 'platm', 'luca platm', 'gnnmywt6f9@ruutukf.com', '0759031573', NULL, '18 Rue Lesage', 'rien', '2026-04-09 13:09:51', '$2y$12$ciyYEfPVK3WrIJ0IUT2nN.tDEJgX1smEmVTq1nSqHJk0QZPje1B7G', NULL, NULL, NULL, NULL, NULL, '2026-04-09 13:09:17', '2026-04-09 13:09:51', 'BOUCAUD'),
(53, 'samy', 'sarah', 'samy sarah', 'samysarah03@gmail.com', '0783271385', NULL, '13 rue jacque tati', 'sur internet', NULL, '$2y$12$4fEFPV6ZveSLVtoVjbwpHunHyzpizxUqBKDpCbSdK4fPD7361CJEy', NULL, NULL, NULL, NULL, NULL, '2026-04-09 13:14:45', '2026-04-09 13:14:45', NULL),
(55, 'Ahsan', 'Shahzad', 'Ahsan Shahzad', 'ahsanshahzad7374@gmail.com', '03026847374', 'profile//x5Y1CbcMJopnmJdFuvVtKzQig74WsjvH7V9gK6Mm.jpg', 'New Muslim Town Bahawalpur', 'Facebook', '2026-04-09 14:19:33', '$2y$12$CuzE5VrzmyLvoYWSUb4iU.GmhAujts0ZxvYjA5qn7oDHw7HHkL2qK', NULL, NULL, NULL, '105510362589308700857', NULL, '2026-04-09 14:02:56', '2026-04-09 14:29:50', NULL),
(56, 'Ahsan', 'Khan', 'Ahsan Khan', 'ahsanshahzad920@gmail.com', NULL, NULL, NULL, NULL, '2026-04-14 14:18:13', '$2y$12$RXC04hY4yuxOx005xRDt1OWDZJKzcLSVgZLPcoIqwEgg8xT/EeLqm', NULL, NULL, NULL, '111331970739385204275', NULL, '2026-04-14 14:17:42', '2026-04-14 14:18:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_to_carts_product_id_foreign` (`product_id`),
  ADD KEY `add_to_carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_created_by_foreign` (`created_by`),
  ADD KEY `blogs_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`),
  ADD KEY `blog_categories_created_by_foreign` (`created_by`),
  ADD KEY `blog_categories_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_created_by_foreign` (`created_by`),
  ADD KEY `faqs_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_settings_created_by_foreign` (`created_by`),
  ADD KEY `general_settings_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscriptions_email_unique` (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `product_availabilities`
--
ALTER TABLE `product_availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_availabilities_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_created_by_foreign` (`created_by`),
  ADD KEY `sections_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_addresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_links_created_by_foreign` (`created_by`),
  ADD KEY `social_links_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT for table `product_availabilities`
--
ALTER TABLE `product_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2956;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD CONSTRAINT `add_to_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `add_to_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faqs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD CONSTRAINT `general_settings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `general_settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD CONSTRAINT `order_payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_availabilities`
--
ALTER TABLE `product_availabilities`
  ADD CONSTRAINT `product_availabilities_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_links`
--
ALTER TABLE `social_links`
  ADD CONSTRAINT `social_links_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `social_links_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
