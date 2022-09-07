-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 04:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saraflora`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Our Mission', 'Our mission is quite simple. We strive to help our florists lower their costs and increase their profits. This has been our mission from the start', '2018-05-31 07:43:09', '2018-05-31 01:58:09'),
(2, 'For All of You', 'We have and will continually look for ways to help our members succeed in business.', '2018-05-31 07:43:40', '2018-05-31 01:58:40'),
(5, 'About SaraFlora', 'SaraFlora is a complete point-of-sale or POS system built on the latest technology that lowers your costs and increases your sales. One system. No limits.', '2018-05-31 01:57:35', '2018-05-31 01:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SaritaFlora', 'sara@gmail.com', '$2y$10$krMyAw5H2csWs8..LebeNuPko./ti7Ihk3cxNlPrVQOys8FKKhpAW', NULL, '2018-05-30 03:11:16', '2018-05-30 03:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `flower_id` int(11) NOT NULL,
  `no_of_flowers` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `flower_id`, `no_of_flowers`, `date`, `created_at`, `updated_at`) VALUES
(1, 5, '4', '2018-05-24', '2018-05-31 05:10:37', '2018-05-31 05:10:37'),
(2, 5, '7', '2018-05-26', '2018-05-31 05:30:26', '2018-05-31 05:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `number`, `location`, `created_at`, `updated_at`) VALUES
(1, 'sarafloralshop@gmail.com', '9845308567', 'Tokha,Kathmandu', '2018-05-30 17:39:00', '2018-05-30 11:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ruthb@gmail.com', 'good one', 'this is good', '2018-05-31 03:16:50', '2018-05-31 03:16:50'),
(2, 'sarita@gmail.com', 'ad', 'hello', '2018-05-31 03:21:25', '2018-05-31 03:21:25'),
(3, 'barsha@yahoo.com', 'hello', 'hello this is me', '2018-05-31 03:25:10', '2018-05-31 03:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `flower_types`
--

CREATE TABLE `flower_types` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `short_desc` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `flower_image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flower_types`
--

INSERT INTO `flower_types` (`id`, `name`, `short_desc`, `price`, `flower_image`, `created_at`, `updated_at`) VALUES
(1, 'Red Roses', 'This is red Rosees', 'Rs.150', 'files/images/flower/7c9471e00d5f9a225b30e20432392e903f5b92b2.jpeg', '2018-05-31 11:54:17', '2018-05-31 06:09:17'),
(3, 'Daisy', 'It is yellow in clolor', 'Rs.120', 'files/images/flower/7932e66cd7572325aa44c62d98406f058d98e2b1.jpeg', '2018-05-31 11:55:29', '2018-05-31 06:10:29'),
(4, 'Summer Boutiques', 'This is good for summer occasion', 'Rs.200', 'files/images/flower/1b8670dae39a5153793ddc24d80b685c92975c8b.jpeg', '2018-05-31 11:55:19', '2018-05-31 06:10:19'),
(5, 'Marigold', 'This is merry merry', 'Rs. 290', 'files/images/flower/bcf1bbdff983520e1545a634a2d9d41bd20c70c6.jpeg', '2018-05-31 11:55:00', '2018-05-31 06:10:00'),
(6, 'Lily', 'this is lily mily', 'Rs. 210', 'files/images/flower/bd59456178f6d6c11cfb41d9657674f2a64d9ee7.jpeg', '2018-05-31 11:54:00', '2018-05-31 06:09:00'),
(7, 'Hibiscus', 'This is one of the best flowers', 'Rs. 230', 'files/images/flower/4142c8634c6d988280bcd606715844117e483334.jpeg', '2018-05-31 11:54:46', '2018-05-31 06:09:46'),
(8, 'Jasmine', 'This is white in color', 'Rs.110', 'files/images/flower/17e052b7d905aa37339f7ea306de22a68b4a6be7.jpeg', '2018-05-31 11:54:35', '2018-05-31 06:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Home', '2018-05-30 12:04:46', '2018-05-30 12:04:46'),
(2, 'Occasions', '2018-05-30 12:05:13', '2018-05-30 12:05:13'),
(3, 'Flowers Type', '2018-05-30 17:53:01', '2018-05-30 12:08:01'),
(4, 'Blog', '2018-05-30 12:05:44', '2018-05-30 12:05:44'),
(5, 'Contact Us', '2018-05-30 12:06:08', '2018-05-30 12:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_05_083853_create_posts_table', 1),
(4, '2018_01_08_082535_add_user_id_to_posts', 1),
(5, '2018_01_09_080802_add_cover_image_to_posts', 1),
(6, '2018_05_30_070540_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` int(11) NOT NULL,
  `oc_title` varchar(200) NOT NULL,
  `short_desc` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occasions`
--

INSERT INTO `occasions` (`id`, `oc_title`, `short_desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'fathers day', 'white flowers for fathers day', 'files/images/occasion/72c890203f12e5b3aa7fc3d1d5bf6fe141964f30.jpg', '2018-05-31 11:51:36', '2018-05-31 06:06:36'),
(2, 'Anniversary', 'Anniversary Flower', 'files/images/occasion/2b2ce8fe0e33b9146117682c2387ea68d18019fe.jpg', '2018-05-31 11:53:30', '2018-05-31 06:08:30'),
(3, 'Get Well', 'Boutique Flower', 'files/images/occasion/56297506100b4cd4e0815151c5867e6d7999678f.jpg', '2018-05-31 11:53:15', '2018-05-31 06:08:15'),
(4, 'Love', 'Red roses for love', 'files/images/occasion/d2450dd15249559e0c861c3544df1735fdbd034e.jpeg', '2018-05-31 11:53:46', '2018-05-31 06:08:46'),
(5, 'Sympathy', 'White Roses is best', 'files/images/occasion/20d838542389fcf56280ff2aa5f158fbc7863af9.jpg', '2018-05-31 11:52:38', '2018-05-31 06:07:38'),
(6, 'Graduation Ceremony', 'Congratulations on Graduating', 'files/images/occasion/869185bd60ff7f02392577c28d3168d5874f177f.jpg', '2018-05-31 11:52:09', '2018-05-31 06:07:09'),
(7, 'Thankyou', 'For always being there', 'files/images/occasion/d19bed724039936c0038291e0d807959900528d8.jpg', '2018-05-31 11:51:57', '2018-05-31 06:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(3, 'About SaraFlora', 'this is saraglow', '2018-05-31 02:19:25', '2018-05-31 06:11:54', 1, 'files/images/flower/1e64d9a56f180d1683de8d1fe16021a176a56626.jpeg'),
(5, 'Blog four', 'This is blog flour', '2018-05-31 02:23:36', '2018-05-31 06:12:09', 1, 'files/images/flower/70fda48165bd2fad1cd5c0742b3697a5c59745cd.jpeg'),
(6, 'Blog Three', 'This is blog three', '2018-05-31 02:30:23', '2018-05-31 06:12:24', 1, 'files/images/flower/6893359bd6cb53474b74b4c98722cf2be6166b19.jpeg'),
(7, 'Blog Two', 'This is blog Two', '2018-05-31 02:30:54', '2018-05-31 06:12:38', 1, 'files/images/flower/ca509c684388b32d43ad407008f87b15b64e9547.jpeg'),
(8, 'Blog One', 'This is blog One', '2018-05-31 02:32:31', '2018-05-31 06:14:05', 1, 'files/images/flower/4e1ffdc780919cdf964b43743d99697fdb978364.jpeg'),
(9, 'Post From Jack', 'This is jack', '2018-05-31 04:04:11', '2018-05-31 04:04:11', 2, 'files/images/flower/5ec63f1ee803b0f3523334942543ad9ab6080aa7.jpg'),
(10, 'New Post', 'This is new post', '2018-05-31 05:41:12', '2018-05-31 06:13:44', 1, 'files/images/flower/9e3d1a76d979f92643eb3093fff72190e909dafa.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sarita tamang', 'sarita@gmail.com', '$2y$10$PBsgp9Khyud5sbQil7r5pu679L1zM7w6gGKqkkAABi5EybRTPdawK', 'vAuv2heLwyaIfc8lzPAdETwsJIRBf5RpQpBPwfTM0q8Rdlw8RFaqb8ZqQNq8', '2018-05-30 01:47:04', '2018-05-30 01:47:04'),
(2, 'jason rai', 'jason@gmail.com', '$2y$10$Fu4JgKIhRFnp5H.KT4zANuoKKQF14CUZyPX/L71JwkPSltZ4JPn.m', 'LMGTpBMCXj935SogOrlcgJ2ZnH3yhjn9XRzs9LCQfTRpzQ6L7y9QtuZrOf41', '2018-05-31 04:01:46', '2018-05-31 04:01:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flower_id` (`flower_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flower_types`
--
ALTER TABLE `flower_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flower_types`
--
ALTER TABLE `flower_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`flower_id`) REFERENCES `flower_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
