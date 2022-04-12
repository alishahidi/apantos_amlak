-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 09:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amlak`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `amount` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `floor` varchar(191) NOT NULL,
  `year` int(11) NOT NULL,
  `storeroom` tinyint(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `area` int(11) NOT NULL,
  `room` tinyint(5) NOT NULL,
  `toilet` enum('ایرانی','فرنگی','ایرانی و فرنگی','') NOT NULL,
  `parking` tinyint(5) NOT NULL,
  `tag` varchar(191) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `sell_status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `address`, `amount`, `image`, `floor`, `year`, `storeroom`, `balcony`, `area`, `room`, `toilet`, `parking`, `tag`, `user_id`, `cat_id`, `status`, `sell_status`, `type`, `view`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'تست اگهی', '&lt;div style=&quot;color: #d9d7ce; background-color: #212733; font-family: \'fantasque sans mono\', \'Droid Sans Mono\', \'monospace\', monospace, \'Droid Sans Fallback\'; font-weight: 500; font-size: 17px; line-height: 25px; white-space: pre;&quot;&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #d9d7ce;&quot;&gt;$slides &lt;/span&gt;&lt;span style=&quot;color: #ffae57;&quot;&gt;=&lt;/span&gt;&lt;span style=&quot;color: #d9d7ce;&quot;&gt; &lt;/span&gt;&lt;span style=&quot;color: #5ccfe6;&quot;&gt;Slide&lt;/span&gt;&lt;span style=&quot;color: #ffae57;&quot;&gt;::&lt;/span&gt;&lt;span style=&quot;color: #ffd580;&quot;&gt;all&lt;/span&gt;&lt;span style=&quot;color: #d9d7ce;&quot;&gt;();&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;', 'تست', '22222', '/images/ads/2021/Sep/15/2021_09_15_Sep_40_55_1e36fac1-f258-4ed3-b367-f6f8b7044f34.jpg', 'ستس', 223, 1, 1, 231, 2, 'ایرانی', 0, '2', 1, 3, 0, 0, 0, 0, '2021-09-15 16:10:55', NULL, NULL),
(9, 'تست', '&lt;p&gt;123&lt;/p&gt;', 'ستس', '123', '/images/ads/2021/Sep/21/2021_09_21_Sep_56_57_9b98e248-5b74-4ed1-9ccb-ad839440205e.jpg', 'ست', 123, 0, 0, 123, 123, 'ایرانی', 0, '123', 1, 3, 0, 0, 0, 0, '2021-09-21 11:26:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `parent_id` int(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ورزش', NULL, '2020-07-09 23:01:44', '2020-07-14 02:14:15', '2021-08-15 09:15:05'),
(2, 'd', 12, '2020-07-10 00:00:00', '2021-09-05 14:09:06', '2021-09-05 14:09:11'),
(3, 'اخبار مسکن', NULL, '2020-07-10 17:50:39', '2020-07-14 02:13:47', NULL),
(4, 'اقتصاد', NULL, '2020-07-10 17:52:42', '2020-07-14 02:14:02', '2021-08-15 07:40:46'),
(5, 'فرهنگ و هنر', 1, '2020-07-10 17:53:14', '2020-07-14 02:14:27', '2020-07-14 02:14:38'),
(6, 'test name', NULL, '2020-07-19 00:08:09', '2020-07-19 00:30:28', NULL),
(7, 'Sport', NULL, '2020-07-19 00:15:58', NULL, NULL),
(8, 'سال اول دبیرستان', 1, '2020-07-19 00:16:35', NULL, NULL),
(9, 'Sport', NULL, '2020-07-19 01:23:22', '2021-08-15 13:47:20', NULL),
(10, 'azz', 2, '2021-08-15 09:48:13', NULL, '2021-08-15 13:47:34'),
(11, '11111111', 6, '2021-08-15 09:48:23', '2021-08-15 09:48:32', '2021-08-15 09:48:39'),
(12, 'aaaaaaaaaaaaaaaaa', NULL, '2021-08-15 09:49:15', NULL, '2021-09-10 14:48:08'),
(13, '123333333', NULL, '2021-08-15 09:49:21', NULL, NULL),
(14, '111111111', NULL, '2021-08-15 09:49:26', NULL, NULL),
(15, 'xxxxxxxxx', NULL, '2021-08-15 09:49:39', NULL, NULL),
(16, 'x', 6, '2021-08-20 14:12:46', NULL, NULL),
(17, '11111111', 6, '2021-08-24 23:16:06', NULL, NULL),
(18, 'a', 3, '2021-08-24 23:18:17', '2021-08-24 23:46:03', NULL),
(19, '222223143234524234234', 3, '2021-08-25 15:53:29', NULL, NULL),
(20, '33', 6, '2021-08-25 16:53:59', NULL, NULL),
(21, '4', 3, '2021-08-25 16:54:06', NULL, NULL),
(22, 'sgd235w235', 6, '2021-08-25 16:54:23', NULL, NULL),
(23, 'qqqqqqq', 6, '2021-09-05 14:02:25', NULL, NULL),
(24, 'qqqqqqq', 6, '2021-09-05 14:02:47', NULL, NULL),
(25, 'ali', 18, '2021-09-05 11:33:57', NULL, NULL),
(26, 'ddddddddd', 3, '2021-09-05 14:09:17', NULL, NULL),
(27, 'g', 6, '2021-09-05 14:10:31', NULL, NULL),
(28, '777777777777999999999', NULL, '2021-09-05 14:10:45', NULL, NULL),
(29, '2sss', 28, '2021-09-10 01:01:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `news_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 0,
  `approved` tinyint(5) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `news_id`, `comment`, `parent_id`, `status`, `approved`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 13, 'test', NULL, 0, 1, '2021-09-06 18:54:39', '2021-09-06 21:25:03', NULL),
(12, 1, 13, '&lt;p&gt;123&lt;/p&gt;', 8, 0, 1, '2021-09-06 21:53:02', NULL, NULL),
(13, 1, 13, '&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;../../../editor/2021/Sep/06/2021_09_06_Sep_25_14_2dc33055-3f25-471b-abb3-f5e81cc058c6.jpg&quot; alt=&quot;&quot; width=&quot;196&quot; height=&quot;200&quot; /&gt; &amp;nbsp;&lt;a title=&quot;alishahidi Gtihub&quot; href=&quot;https://github.com/alishahidi&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;github alishahidi&lt;/a&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;تست&lt;/strong&gt;&lt;/p&gt;', 12, 0, 1, '2021-09-06 21:56:52', NULL, NULL),
(14, 1, 13, '&lt;p&gt;s&lt;/p&gt;', 13, 0, 1, '2021-09-06 21:57:46', '2021-09-07 18:08:22', NULL),
(15, 1, 6, '&lt;p&gt;&lt;strong&gt;سلام بر شما&lt;/strong&gt;&lt;/p&gt;', 14, 0, 1, '2021-09-07 18:08:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) NOT NULL,
  `image` varchar(191) NOT NULL,
  `advertise_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `advertise_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_33_28_ffca0a0c-831a-4358-8501-a43c1e90c026.jpg', 6, '2021-09-05 13:03:28', NULL, '2021-09-05 13:34:53'),
(15, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_06_36_ba31491c-501d-4f81-a5f2-d855a7bd0ca3.jpg', 6, '2021-09-05 13:36:37', NULL, '2021-09-05 13:37:16'),
(16, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_08_09_6b5f6697-0465-41b0-9f3d-7d367c729345.jpg', 6, '2021-09-05 13:38:09', NULL, '2021-09-05 14:13:27'),
(17, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_10_59_5558ca80-d4c7-42c0-b77a-53975fe83264.jpg', 6, '2021-09-05 13:41:00', NULL, '2021-09-05 14:13:28'),
(18, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_13_43_f34d8773-15cc-40fb-804a-387444da7c07.jpg', 6, '2021-09-05 13:43:44', NULL, '2021-09-05 14:13:32'),
(19, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_14_08_dbe8bcf0-2b14-4049-b82c-3f145782d9cc.jpg', 6, '2021-09-05 13:44:09', NULL, '2021-09-05 14:13:33'),
(20, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_16_48_6d9c0646-8fb4-4f16-9f8b-ff092e203b92.jpg', 6, '2021-09-05 13:46:49', NULL, '2021-09-05 14:13:34'),
(21, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_18_53_ec9e5763-50b3-4f8b-9435-fa0181897ba5.jpg', 6, '2021-09-05 13:48:53', NULL, '2021-09-05 14:13:35'),
(22, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_22_05_94ad6c95-caf2-4057-9916-9211dcbb7858.jpg', 6, '2021-09-05 13:52:06', NULL, '2021-09-05 14:13:36'),
(23, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_22_21_b1efa04c-9405-4c81-ba92-975af61b173c.jpg', 6, '2021-09-05 13:52:21', NULL, '2021-09-05 14:13:36'),
(24, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_26_29_8e5efcf0-652a-4fbe-9a67-2cc111e88733.jpg', 6, '2021-09-05 13:56:30', NULL, '2021-09-05 14:13:37'),
(25, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_41_07_73979eda-1c00-4ac9-862f-a59f92252492.jpg', 6, '2021-09-05 14:11:07', NULL, '2021-09-05 14:13:38'),
(26, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_43_45_6612e40e-5d27-4644-86f9-8da1bb63b370.jpg', 6, '2021-09-05 14:13:45', NULL, '2021-09-05 14:15:39'),
(27, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_45_00_e53b780c-6cd6-43fc-93f7-b96be49507d0.jpg', 6, '2021-09-05 14:15:00', NULL, '2021-09-05 14:15:40'),
(28, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_45_43_3199ccd0-aec9-4a36-9080-95e87ccbd458.jpg', 6, '2021-09-05 14:15:43', NULL, '2021-09-05 14:17:03'),
(29, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_47_06_4e4708e6-7a4d-417d-81f4-f056d44b62f4.jpg', 6, '2021-09-05 14:17:06', NULL, '2021-09-05 14:17:18'),
(30, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_52_09_8ebf49bb-9e02-4fe9-b502-5604a2a00608.jpg', 6, '2021-09-05 14:22:09', NULL, '2021-09-05 14:22:12'),
(31, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_52_27_e70c88f0-1393-4352-921c-2962c0e2956b.jpg', 6, '2021-09-05 14:22:28', NULL, '2021-09-05 14:22:29'),
(32, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_52_39_2ea5526e-81a3-4055-9531-94052fb8d976.jpg', 6, '2021-09-05 14:22:39', NULL, '2021-09-05 14:22:40'),
(33, '/images/ads_gallery/2021/Sep/05/2021_09_05_Sep_04_31_28609378-2482-441c-b328-c7b034f1c07a.jpg', 7, '2021-09-05 14:34:31', NULL, '2021-09-05 14:34:36'),
(34, '/images/ads_gallery/2021/Sep/07/2021_09_07_Sep_36_32_5e636873-20f3-4356-85c0-c6b33dcc1259.jpg', 7, '2021-09-07 18:06:33', NULL, NULL),
(35, '/images/ads_gallery/2021/Sep/07/2021_09_07_Sep_36_39_92b8f279-10b4-4dc8-bdac-d7c3f001544d.jpg', 7, '2021-09-07 18:06:40', NULL, NULL),
(36, '', 7, '2021-09-07 18:25:36', NULL, NULL),
(37, '/images/ads_gallery/2021/Sep/07/2021_09_07_Sep_55_44_7e5cd59e-f766-45fb-9e04-a5b8b2d0500d.jpg', 7, '2021-09-07 18:25:44', NULL, NULL),
(38, '/images/ads_gallery/2021/Sep/10/2021_09_10_Sep_32_23_71c0a842-5d62-468e-bcf5-78196e156bd7.jpg', 7, '2021-09-10 15:02:23', NULL, NULL),
(39, '/images/ads_gallery/2021/Sep/10/2021_09_10_Sep_32_30_7f9da6d4-5726-4400-b3d9-86c46735a986.jpg', 7, '2021-09-10 15:02:30', NULL, NULL),
(40, '/images/ads_gallery/2021/Sep/21/2021_09_21_Sep_48_39_015eea76-2177-4164-b4cc-c3ea50a824c9.jpg', 8, '2021-09-21 13:18:40', NULL, NULL),
(41, '/images/ads_gallery/2021/Sep/21/2021_09_21_Sep_48_43_0905b970-a8e9-4942-95c4-cc2ea3538f03.jpg', 8, '2021-09-21 13:18:43', NULL, '2021-09-21 13:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(20) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `name`) VALUES
(1, 'settings'),
(2, 'users'),
(3, 'categories'),
(4, 'news'),
(5, 'ads'),
(6, 'galleries'),
(7, 'comments'),
(8, 'slides'),
(9, 'users_default_values'),
(10, 'categories_default_values'),
(11, 'news_default_values'),
(12, 'ads_default_values'),
(13, 'galleries_default_values'),
(14, 'comments_default_values'),
(15, 'slides_default_values');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `title` varchar(191) NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `published_at` datetime NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `image`, `user_id`, `cat_id`, `published_at`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'تست بلاگ', '&lt;p&gt;ططططططططططططططططططط&lt;/p&gt;', 's:86:\"/images/news/2021/Sep/15/2021_09_15_Sep_23_24_aac02e9f-c4e3-4954-a955-d2c94ddceb8a.jpg\";', 1, 3, '2021-09-14 12:00:00', 0, '2021-09-15 21:53:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) NOT NULL,
  `title` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `amount` varchar(191) DEFAULT NULL,
  `body` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `url`, `address`, `amount`, `body`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'تست اسلاید', 'https://alishahidinet.ir', 'تربت حیدریه', '۱۰۰۰۰۰۰', '&lt;p&gt;&amp;lt;script&amp;gt; alert(&quot;its work&quot;); &amp;lt;/script&amp;gt;&lt;/p&gt;\r\n&lt;p&gt;تست جاوا اسکریپت&lt;/p&gt;\r\n&lt;div id=&quot;simple-translate&quot;&gt;\r\n&lt;div&gt;\r\n&lt;div class=&quot;simple-translate-button isShow&quot; style=&quot;background-image: url(\'moz-extension://c5b4db78-03de-4702-a294-e5e52923a8ac/icons/512.png\'); height: 22px; width: 22px; top: 70px; left: 1096px;&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;simple-translate-panel &quot; style=&quot;width: 300px; height: 200px; top: 0px; left: 0px; font-size: 13px; background-color: #181818;&quot;&gt;\r\n&lt;div class=&quot;simple-translate-result-wrapper&quot; style=&quot;overflow: hidden;&quot;&gt;\r\n&lt;div class=&quot;simple-translate-move&quot; draggable=&quot;true&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;simple-translate-result-contents&quot;&gt;\r\n&lt;p class=&quot;simple-translate-result&quot; dir=&quot;auto&quot; style=&quot;color: #e6e6e6;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p class=&quot;simple-translate-candidate&quot; dir=&quot;auto&quot; style=&quot;color: #aaaaaa;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '/images/slide/2021/Sep/15/2021_09_15_Sep_33_11_b2f81717-0d84-45ef-8fea-cb15bb2d755b.jpg', '2021-09-15 16:03:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `avatar` varchar(191) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 0,
  `is_active` tinyint(5) NOT NULL DEFAULT 0,
  `verify_token` varchar(191) DEFAULT NULL,
  `user_type` varchar(191) NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `remember_token_expire` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `avatar`, `password`, `status`, `is_active`, `verify_token`, `user_type`, `remember_token`, `remember_token_expire`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'alishahidi1376@gmail.com', 'علی', 'شهیدی', '/images/user_avatar/2021_09_11_Sep_24_59_1b40fffa-110f-4060-adb3-443994a18d69.jpg', 'ZGVmMTAwMDBkZWY1MDIwMDk3NGZmMjQxNDg5ZjVlOTY3MDYxNThhNzU2YjU1YmFjODU2ZjQ3ODQ4MGZmYWQ4ZjgxNmE2MGE2OTMzMDQxYmFhN2U4OWEwNDg3NzIyZGNmNzY5NmRhNzg3NTdjZWQyM2JjYWY0YTAxZDA1OWU1OGFkY2MxNjVjNTBhYjVkZjIwNzRkNWI0MzVmMDgwMTIwMDJkYzJmZDA1YmFhZGM4OTg2NDhkMGJlMzUyNWVhMGU0NmFiMzI1YmU0ODM5OGFkY2MxOTcwMjNmNGM2ZmVmODZlZTQ1MWQ2YjdhMWRmNDkyNDY1Yjk2ZGUwZThhOGFlOTA1MTc0YTFhNWEwMjc0YzkzMWYxNTY0OWJhMDhhNGNkMmE0YWMyN2IyZjJhZjYwYjBmNTliNmNiMjgyYTNmY2QwNmNjNzU2Y2I5ZWM1YTRhZDUyMGMxM2EzNjQ0YjA4NGQxOTBmZjFkM2E0ZWQwYWIzYTQ2NjRiZDg4NGVlNGM3ZjczY2VhZmI3NTg3ZThiNjZmMGUxZjg2MDk0ZjYwZmJkN2NhZjhiNzc2OGRlODUzZTRlZTk2MWVjMGE2ZDhlYTQ5NjdiYzFhM2Y2OWE3NjU4OGRjZDk1ZDkyNjgyZmQzNDA0MWEyMzdiZTMyOWRhN2YxOTY0YTlmYTRiYTEzYjM', 0, 1, 'a04dad6f-11b8-473f-a0d5-135cd68e2e6c', 'admin', 'c0aebe59-d0b4-49d6-9acc-e57367b324be', NULL, '2021-09-11 18:55:00', '2021-09-12 22:03:30', NULL),
(2, 'hassan.kh@gmail.com', 'حسن', 'خسروجردی', '/images/avatar/2020/Jul/12/2020_07_12_23_07_23_13.jpg', '$2y$10/8p1Oz3oDDUCY7gaYRWeDjRjTincYh9J1ukq', 0, 0, '1ea43c5ba95f56b295ec6adaf1bdfceeb01784bff9f66ca03cf65e3018b63ca5', 'user', NULL, NULL, '2020-07-13 01:37:24', '2021-09-10 15:27:21', NULL),
(5, 'raminfaramarzi93@gmail.com', 'رامین 2', 'فرامرزی', '/images/avatar/2020/Jul/12/2020_07_12_23_28_50_88.jpg', '$2y$10.vaw6BsbXs18gIIvei', 0, 0, '3302152ea5fae98fafe616f446dce82dc191a31b9ef31bff1d2cfa538d8ec311', 'user', '8f5955823fad4a89b8ba87632ea32f2e83f00846ef7cc0c1b37c197b4ca43c52', '2020-07-13 00:47:32', '2020-07-13 01:58:50', '2021-09-10 15:27:22', NULL),
(6, 'user@example.com', 'testi', 'testi', '/images/avatar/2020/Jul/19/2020_07_19_23_21_53_51.jpg', '$2y$10.lf3sy7maAOXOq3PjPpGuNJuS.YXQ.f6', 0, 0, 'c648d798f99a09c48b5220eabf8f3c5fbf75c95e56c81d50b2b64b944dadb99f', 'user', NULL, NULL, '2020-07-20 01:51:54', '2021-09-10 15:27:23', NULL),
(18, 'alishahidi1376@yahoo.com', 'Ali', 'shahidi', '/images/user_avatar/2021_09_21_Sep_23_33_0118e893-bd36-47bb-a367-6d06071fcb4c.jpg', 'ZGVmMTAwMDBkZWY1MDIwMDQzYzUxODRmYzQyMmM0ZDRjY2E3MDY1MWJjNTMwZTJmODk1MWEyNjM1OGVmYmEyYTA2ZmFhNTUzMGMxYzg3NjJkNDBlOTgzNjkwMmU3NjhiYzc5OTY1M2I4YWFkZjU2OTAyYjY1ZjU0NWU1N2I0ZGUyZTBiYTg2YzMzZjVlOThmYTc2MmZjNDNiOGRlNDZhNzVjNjhiMDZhZjJjMGI0ZDMwYzkxYjc4Y2NhNzI2YTg4NjVlMjZjMjk4NGJlOTFiZjkzOWRmZmExNTA3NmEyZTQ2Mzg4NTRiNWY1YjY0NDBjYWViMjNhM2Y0Y2E2OTVlZDJkMWIyZmExZGQ0Mzk2MTRhMmY1YTI3NGYzMWRlMjcwYmVhNTY2N2YxN2MxZWMzNTJjNDdmZWZmNjUzYmU1MWIxZTE5ODAzZjJkZGEzZjhlNjI2OWNiMmIzMzExZTEzYTFlZDgwZGFkYTJhOTY0MTVmMmYyYjcxZDQzYjY1NTg3NjYyODlkYTEzYjFlZGM4N2I3NjNlMjhhNGI2YjgwNmI1Njc2Mjc0NDdlYjZlZjJiYmExMzQ3NmZhYWIyYmQwZDhmOTIxOGQxY2NhYWRjY2NkZmExODIyOWZlNDg4YzhiNWE4NDA0MGUyNWE4MWZjNmM0YTkyODIzYjRhNmIxZDU', 0, 1, '40faf05e-6933-4684-83eb-9b760c0624b1', 'user', NULL, NULL, '2021-09-21 10:53:34', '2021-09-21 10:53:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`news_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `post_id` (`news_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertise_id` (`advertise_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
