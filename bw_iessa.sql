-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2019 at 09:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bw_iessa`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_processes`
--

CREATE TABLE `activation_processes` (
  `id` int(11) NOT NULL,
  `activationcode` varchar(4) NOT NULL,
  `user_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `activation_processes`
--

INSERT INTO `activation_processes` (`id`, `activationcode`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a111', 7, '2018-08-07 15:46:56', '2018-08-07 15:46:56', NULL),
(4, 'a111', 12, '2018-08-20 00:27:16', '2018-08-20 00:27:16', NULL),
(5, 'a111', 15, '2018-09-10 06:26:04', '2018-09-10 06:26:04', NULL),
(6, 'a111', 1, '2018-11-24 09:16:03', '2018-11-24 09:16:03', NULL),
(7, 'a111', 16, '2018-11-24 14:02:17', '2018-11-24 14:02:17', NULL),
(9, 'a111', 18, '2018-12-02 02:15:47', '2018-12-02 02:15:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_description`
--

CREATE TABLE `activity_description` (
  `id` int(4) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `activity_description`
--

INSERT INTO `activity_description` (`id`, `description`) VALUES
(1, 'newPassword'),
(2, 'createCardHolder');

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`branch_id`, `created_at`, `updated_at`, `company_id`, `name`, `address`) VALUES
(1, '2018-12-25 04:48:27', '2018-12-25 04:48:27', 8, 'wvfennmjnnf', 'fcwe'),
(2, '2018-12-25 05:03:13', '2018-12-25 05:03:13', 7, 'defb', 'address dfbswv'),
(3, '2018-12-26 02:29:19', '2018-12-26 02:29:19', 7, 'ac', 'wqec');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `last_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `privacy` int(11) NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(2056) CHARACTER SET utf32 DEFAULT NULL,
  `youtube_url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_layout_id` int(3) NOT NULL,
  `logo` varchar(2056) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(2056) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal` int(2) NOT NULL DEFAULT '0',
  `card_holder_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `created_at`, `updated_at`, `user_id`, `last_name`, `first_name`, `create_by`, `privacy`, `company_name`, `position`, `cell_phone_number`, `landline`, `fax`, `website_url`, `about_me`, `youtube_url`, `instagram_url`, `twitter_url`, `facebook_url`, `alias`, `template_layout_id`, `logo`, `picture`, `personal`, `card_holder_id`) VALUES
(1, '2018-08-16 08:39:33', '2018-08-16 08:39:33', 8, '', '', 8, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', '獶', NULL, NULL, NULL, NULL, '', 0, NULL, '', 0, 0),
(2, '2018-08-16 08:41:36', '2018-08-16 08:41:36', 8, '', '', 8, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', '獶', NULL, NULL, NULL, NULL, '', 0, NULL, '', 0, 0),
(3, '2018-08-16 08:48:54', '2018-08-16 08:48:54', 8, '', '', 8, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', '獶', NULL, NULL, NULL, NULL, '', 0, NULL, '', 0, 0),
(4, '2018-08-16 15:04:38', '2018-08-16 15:04:38', 8, '', '', 8, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', '獶', NULL, NULL, NULL, NULL, '', 0, NULL, '', 0, 0),
(5, '2018-08-22 06:44:36', '2018-08-22 06:44:36', 13, '', '', 13, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_20180822084436c51ce410c124a10e0db5e4b97fc2af39.jpeg', 'http://localhost/BWmobapi/public/card_image/profile_pic_c51ce410c124a10e0db5e4b97fc2af39.png', 1, 0),
(6, '2018-08-25 08:40:03', '2018-08-26 10:27:36', 14, 'Test me if you can', 'tasht', 14, 1, 'com name test', 'Aza', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', 'test', NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_0db6b2599e275ff69482f9cf0a527a03aab3238922bcc25a6f606eb525ffdc56.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_e7327d748d95a66452ee96657fd46f49aab3238922bcc25a6f606eb525ffdc56.jpeg', 0, 0),
(7, '2018-08-25 11:26:23', '2018-08-25 11:26:23', NULL, 'test 2', 'test 1', 14, 0, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_d1dd3dac52dfbfc8fb9fcd5a732d843faab3238922bcc25a6f606eb525ffdc56.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_d1dd3dac52dfbfc8fb9fcd5a732d843faab3238922bcc25a6f606eb525ffdc56.jpg', 0, 0),
(8, '2018-08-25 11:35:42', '2018-08-25 11:35:42', NULL, 'test 2', 'test 1', 14, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_ed01f7e0883658bab65f1d49beadde30aab3238922bcc25a6f606eb525ffdc56.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_ed01f7e0883658bab65f1d49beadde30aab3238922bcc25a6f606eb525ffdc56.jpg', 0, 0),
(9, '2018-08-25 11:39:13', '2018-08-25 11:39:13', NULL, 'test 2', 'test 1', 14, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_a0ebd294b93978cd750a7b192541c2b3aab3238922bcc25a6f606eb525ffdc56.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_a0ebd294b93978cd750a7b192541c2b3aab3238922bcc25a6f606eb525ffdc56.jpg', 0, 0),
(10, '2018-08-29 08:48:24', '2018-08-29 08:48:24', NULL, 'test 2', 'test 1', 8, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_82fe3afa747ef6aff4d183101b067681c9f0f895fb98ab9159f51fd0297e236d.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_82fe3afa747ef6aff4d183101b067681c9f0f895fb98ab9159f51fd0297e236d.jpg', 0, 0),
(11, '2018-08-29 08:48:42', '2018-08-29 08:48:42', NULL, 'test 2', 'test 1', 8, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_804638effd67cfa2d019015d2f9a98aac9f0f895fb98ab9159f51fd0297e236d.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_804638effd67cfa2d019015d2f9a98aac9f0f895fb98ab9159f51fd0297e236d.jpg', 0, 0),
(14, '2018-08-29 09:50:07', '2018-08-29 09:50:07', NULL, 'test 2', 'test 1', 8, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_db5e293bcde1ee520ec2615d1a74d416c9f0f895fb98ab9159f51fd0297e236d.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_db5e293bcde1ee520ec2615d1a74d416c9f0f895fb98ab9159f51fd0297e236d.jpg', 0, 0),
(15, '2018-08-29 09:50:49', '2018-08-29 09:50:49', NULL, 'test 2', 'test 1', 8, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_4a24e5379089e36362bde81d072c9553c9f0f895fb98ab9159f51fd0297e236d.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_4a24e5379089e36362bde81d072c9553c9f0f895fb98ab9159f51fd0297e236d.jpg', 0, 0),
(16, '2018-08-29 10:03:58', '2018-08-29 10:07:39', NULL, 'test 2', 'test 1', 8, 1, 'com name test', 'Aza', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', 'test', NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_64124e82ab14748a04c3c3764b074864c9f0f895fb98ab9159f51fd0297e236d.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_64124e82ab14748a04c3c3764b074864c9f0f895fb98ab9159f51fd0297e236d.jpg', 0, 0),
(17, '2018-09-03 03:36:46', '2018-09-03 03:36:46', NULL, 'test 2', 'test 1', 81, 1, 'com name test', 'position test', '01012345678', '02234567989', '02234567990', 'we.url.tres', 'sv', NULL, NULL, NULL, NULL, 'hyu', 11, 'http://localhost/BWmobapi/public/logo_image/logo_c1e7f50672c87a4dea78bc0c243ecd6ac9f0f895fb98ab9159f51fd0297e236d.jpg', 'http://localhost/BWmobapi/public/card_image/profile_pic_notpersonal_c1e7f50672c87a4dea78bc0c243ecd6ac9f0f895fb98ab9159f51fd0297e236d.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cards_holders`
--

CREATE TABLE `cards_holders` (
  `card_holder_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards_holders`
--

INSERT INTO `cards_holders` (`card_holder_id`, `created_at`, `updated_at`, `user_id`, `name`) VALUES
(0, NULL, NULL, NULL, 'default'),
(1, '2018-08-16 14:19:06', '2018-08-16 14:19:06', 8, 'test me if you can'),
(2, '2018-08-16 14:28:34', '2018-08-16 14:28:34', 8, 'test me if you can 2'),
(3, '2018-08-16 14:28:46', '2018-08-16 14:28:46', 8, 'test3'),
(4, '2018-08-16 14:28:54', '2018-08-16 14:42:37', 8, 'test 5555'),
(5, '2018-08-29 08:51:51', '2018-08-29 08:51:51', 8, 'test34');

-- --------------------------------------------------------

--
-- Table structure for table `card_to_interests`
--

CREATE TABLE `card_to_interests` (
  `card_to_interest_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `interest_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `card_id` int(5) NOT NULL,
  `private` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `card_to_interests`
--

INSERT INTO `card_to_interests` (`card_to_interest_id`, `created_at`, `updated_at`, `interest_id`, `name`, `user_id`, `card_id`, `private`) VALUES
(1, '2018-09-03 08:45:57', '2018-09-03 08:45:57', 1, 'interest trest 1', 16, 0, '0'),
(2, '2018-09-03 08:47:32', '2018-09-03 08:47:32', 2, 'kora', 14, 0, '1'),
(3, '2018-09-03 08:48:04', '2018-09-03 08:48:04', 0, 'kora', 14, 0, '1'),
(4, '2018-09-03 08:48:21', '2018-09-03 08:48:21', 0, 'kora', 14, 0, '1'),
(5, '2018-09-03 09:31:56', '2018-09-03 09:31:56', 2, 'interest trest 1', 16, 15, '0'),
(6, '2018-09-03 09:31:56', '2018-09-03 09:31:56', 0, 'kora', 14, 15, '1'),
(7, '2018-09-03 09:33:33', '2018-09-03 09:33:33', 1, 'interest trest 1', 14, 6, '0'),
(8, '2018-09-03 09:33:33', '2018-09-03 09:33:33', 0, 'kora', 14, 6, '1'),
(9, '2018-09-03 09:33:37', '2018-09-03 09:33:37', 0, 'kora', 14, 6, '1'),
(10, '2018-12-04 01:57:46', '2018-12-04 01:57:46', 1, 'interest trest 1', 14, 15, '0'),
(11, '2018-12-04 01:57:46', '2018-12-04 01:57:46', 0, 'kora', 14, 15, '1');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_landline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_industry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_speciality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_countary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_tax_card` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_registery` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(64) NOT NULL,
  `approve` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `created_at`, `updated_at`, `company_name`, `company_logo`, `company_landline`, `company_fax`, `company_address`, `company_website`, `company_about`, `company_facebook`, `company_twitter`, `company_instagram`, `company_youtube`, `company_field`, `company_industry`, `company_speciality`, `company_countary`, `company_city`, `company_district`, `company_tax_card`, `company_registery`, `user_id`, `approve`) VALUES
(7, '2018-12-24 14:16:18', '2018-12-24 14:16:18', 'dd', NULL, '5555555', '875421574', '128 khlouse', 'http://www.twest.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TC1545668178.jpg', 'RP1545668178.jpg', 27, 0),
(8, '2018-12-30 11:47:43', '2018-12-30 11:47:43', 'qweqw', NULL, '1455', '1546', 'qweqw', 'qweqw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TC1546177663.png', 'RP1546177663.png', 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `departement_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`departement_id`, `created_at`, `updated_at`, `branch_id`, `company_id`, `name`) VALUES
(1, NULL, NULL, 1, 8, 'test 1'),
(2, NULL, NULL, 1, 8, 'test 2');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interestes`
--

CREATE TABLE `interestes` (
  `interest_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interestes`
--

INSERT INTO `interestes` (`interest_id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'interest trest 1'),
(2, NULL, NULL, 'interest trest  2'),
(3, NULL, NULL, 'interest trest 3'),
(4, NULL, NULL, 'interest trest 4'),
(5, NULL, NULL, 'interest trest 5');

-- --------------------------------------------------------

--
-- Table structure for table `invitation_contacts`
--

CREATE TABLE `invitation_contacts` (
  `invitation_contacts_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phonecode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invited_user_id` int(10) UNSIGNED DEFAULT NULL,
  `invitation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messag_records`
--

CREATE TABLE `messag_records` (
  `messag_record_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_of_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messag_records`
--

INSERT INTO `messag_records` (`messag_record_id`, `created_at`, `updated_at`, `email`, `title_of_message`, `message`, `user_id`) VALUES
(3, '2018-11-29 03:44:29', '2018-11-29 03:44:29', 'el7ob_koloh@ba7bkWahshtine.a7a', NULL, 'sad', 14);

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_08_09_042358_create_profiles_table', 2),
(9, '2018_08_16_082647_create_cards_table', 3),
(10, '2018_08_16_151038_create_cards_holders_table', 4),
(11, '2018_08_29_103002_create_user_cards_table', 5),
(12, '2018_08_29_142511_create_interestes_table', 6),
(13, '2018_08_29_145316_create_card_to_interests_table', 6),
(14, '2018_09_03_132430_create_faqs_table', 7),
(15, '2018_09_03_132537_create_terms_table', 7),
(16, '2018_09_19_064205_create_requests_table', 7),
(17, '2018_11_19_110500_create_companies_table', 7),
(18, '2018_11_24_051415_create_resetsteps_table', 8),
(19, '2018_11_25_204848_create_departments_table', 9),
(20, '2018_11_29_034537_create_messag_records_table', 10),
(21, '2018_11_30_050432_create_recent_activities_table', 11),
(22, '2018_11_30_162408_create_invitation_contacts_table', 12),
(23, '2018_12_02_044138_create_stagings_table', 13),
(24, '2018_12_24_164603_create_branchs_table', 14),
(25, '2018_12_25_080902_create_departements_table', 15),
(26, '2018_12_30_115731_create_user_to_companies_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('03d96c9adc65cc0efc969c9a1c0e38df6d8e1e0e9430efe02539c197ed1183eb558a160a40fd8fbf', 14, 5, 'LaraPassport', '[]', 0, '2018-08-25 08:36:50', '2018-08-25 08:36:50', '2019-08-25 10:36:50'),
('0b9a33db1a18ffe238f5b91bfd645c781cbc07969dd20e1fd87d4e3da2918ac421edcc6b9c2cea60', 16, 5, 'LaraPassport', '[]', 0, '2018-11-24 12:02:16', '2018-11-24 12:02:16', '2019-11-24 14:02:16'),
('10752421eebaa8b88cd0c328cfa1ba447adfd68c2d4292b936512c3381b923e3d32df8a089dd618d', 1, 5, 'LaraPassport', '[]', 0, '2018-11-24 07:16:03', '2018-11-24 07:16:03', '2019-11-24 09:16:03'),
('1acd9211229a0fe0e548175cde77e18830aafb7a5e45f2944f1854c55b185cb3b1580cde634270d9', 9, 5, 'LaraPassport', '[]', 0, '2018-08-16 06:38:08', '2018-08-16 06:38:08', '2019-08-16 08:38:08'),
('33e936a92a3a925a408b0f206e7908845e392c0f2d08d674351df5e566919617d918dda64376a89c', 1, 5, 'LaraPassport', '[]', 0, '2018-11-24 07:21:14', '2018-11-24 07:21:14', '2019-11-24 09:21:14'),
('4defcf43c54d1ae2b0bd84ce6c0ae3f5b82cc74078378c9bef172733edcc56f2009830cea689df36', 15, 5, 'LaraPassport', '[]', 0, '2018-09-10 04:26:04', '2018-09-10 04:26:04', '2019-09-10 06:26:04'),
('4f711b06fea85c8817f25d2db18898a45ea4a8eb294971b6647a2388d298132fe873469257d86610', 3, 5, 'LaraPassport', '[]', 0, '2018-08-06 08:14:09', '2018-08-06 08:14:09', '2019-08-06 10:14:09'),
('54c7b4f4b069942713c5a331302ae00e17f3c9e3d31eba8531c33971dbe14b34b6abe727b00a1286', 18, 5, 'LaraPassport', '[]', 0, '2018-12-02 00:15:47', '2018-12-02 00:15:47', '2019-12-02 02:15:47'),
('6149db1706ce32d42fe0ef49cf64c86d0485780eeef295cdc8f11197137c978f65ef5f62243484b7', 5, 5, 'LaraPassport', '[]', 0, '2018-08-07 13:18:16', '2018-08-07 13:18:16', '2019-08-07 15:18:16'),
('658707b68df5974dfec40d1f28056fbecc51b08f702c9fd0b82583d9b9ce7aa4b38537c5ec5ae7ff', 13, 5, 'LaraPassport', '[]', 0, '2018-08-22 05:43:46', '2018-08-22 05:43:46', '2019-08-22 07:43:46'),
('6a1b320d7dcb69c223b484eeb27393e86055fb530ab29b9e2ad8069d5658bb4d8bf0afd4615caad4', 8, 5, 'LaraPassport', '[]', 0, '2018-08-11 07:32:14', '2018-08-11 07:32:14', '2019-08-11 09:32:14'),
('7c7ecb85ab8785186c97f088fa70aa78141017291da5bbef0968f6647a987c61b18ceb0b25f9e861', 8, 5, 'LaraPassport', '[]', 0, '2018-08-19 13:39:29', '2018-08-19 13:39:29', '2019-08-19 15:39:29'),
('80f71c21f234676ea8648a4652102f6ce7f30c2871f040a483a8e07ef0493a8d3d7857f602ae5055', 2, 5, 'LaraPassport', '[]', 0, '2018-08-06 07:51:26', '2018-08-06 07:51:26', '2019-08-06 09:51:26'),
('8179015c90939a317c68047e0a24ef647f76f5c2cf9611556e6878547f48086ec583282394d7e702', 7, 5, 'LaraPassport', '[]', 0, '2018-08-07 13:46:56', '2018-08-07 13:46:56', '2019-08-07 15:46:56'),
('866836b8e835999beef556ad22c1bc5a2c1076dcf4798c60783d02dc5a3dbc2ff3e002d34052868c', 10, 5, 'LaraPassport', '[]', 0, '2018-08-19 13:21:31', '2018-08-19 13:21:31', '2019-08-19 15:21:31'),
('8ff708a575fba9e3e218749e5e937c694367017799bd0cd996f0371ac89668d8c35c92a43084b2b4', 8, 5, 'LaraPassport', '[]', 0, '2018-08-29 08:46:35', '2018-08-29 08:46:35', '2019-08-29 10:46:35'),
('9f53f25e641166e3b1c8a13f433d2f2f9691f5d330bf99022b0b2814e2e9eb5337aa539fa061d9ca', 1, 5, 'LaraPassport', '[]', 0, '2018-08-06 06:26:25', '2018-08-06 06:26:25', '2019-08-06 08:26:25'),
('bf1de42a200236e5edf1173ebb728919b5e47c2e2bcaef63cf7b685ac3ed5631b72c05092ca8228b', 12, 5, 'LaraPassport', '[]', 0, '2018-08-19 22:27:16', '2018-08-19 22:27:16', '2019-08-20 00:27:16'),
('e67265e22af1f11155b33cd0d648739c6dd72ca604adacc7b6ec6c3f4545ea58bc9cb5e04d16f8ab', 8, 5, 'LaraPassport', '[]', 0, '2018-08-09 01:35:19', '2018-08-09 01:35:19', '2019-08-09 03:35:19'),
('f148a30eaee33972371e7379ef7001cfd102a83a5a32f6d2f2e18dd9e91bb00bc169864b11787e34', 11, 5, 'LaraPassport', '[]', 0, '2018-08-19 22:27:01', '2018-08-19 22:27:01', '2019-08-20 00:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'xl14vQBWcu8GmFmYR7g52R8xXxw4kmXpCyjOWtEa', 'http://localhost', 1, 0, 0, '2018-08-06 05:53:25', '2018-08-06 05:53:25'),
(2, NULL, 'Laravel Password Grant Client', 'rDrh5HTNmg2Ki7syVVo7Q6nKiZe3kpeKgcmdOufp', 'http://localhost', 0, 1, 0, '2018-08-06 05:53:25', '2018-08-06 05:53:25'),
(3, 1, 'admin', 'Rvyx3DOO0fE0MNckVG0T8SgqbgDi0eHxUBjpTG0N', 'no', 0, 0, 0, '2018-08-06 06:04:15', '2018-08-06 06:04:15'),
(4, NULL, 'admin', 'XAMADuCg5pnreKMVlZBzUa1jwznO03d6DYPM6sER', 'http://localhost', 0, 1, 0, '2018-08-06 06:04:56', '2018-08-06 06:04:56'),
(5, NULL, 'admin', 'gm8aaE4O6a0j854tndRZwyxCKRUmlg7pmumhho1q', 'http://localhost', 1, 0, 0, '2018-08-06 06:06:13', '2018-08-06 06:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-08-06 05:53:25', '2018-08-06 05:53:25'),
(2, 5, '2018-08-06 06:06:14', '2018-08-06 06:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `last_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal` tinyint(1) NOT NULL DEFAULT '0',
  `facebook_url` text COLLATE utf8mb4_unicode_ci,
  `twitter_url` text COLLATE utf8mb4_unicode_ci,
  `youtube_url` text COLLATE utf8mb4_unicode_ci,
  `instagram_url` text COLLATE utf8mb4_unicode_ci,
  `alias` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `created_at`, `updated_at`, `user_id`, `last_name`, `first_name`, `picture`, `gender`, `country`, `city`, `district`, `field`, `industry`, `specialty`, `personal`, `facebook_url`, `twitter_url`, `youtube_url`, `instagram_url`, `alias`) VALUES
(10, '2018-08-16 07:12:51', '2018-08-16 07:12:51', 9, '', '', 'http://localhost/BWmobapi/public/card_image/profile_pic_45c48cce2e2d7fbdea1afc51c7c6ad26.jpg', 'male', 'egypt', 'cairo', 'shobtra', 'engineering', 'it', 'software', 1, NULL, NULL, NULL, NULL, ''),
(11, '2018-08-19 13:40:46', '2018-08-19 13:40:46', 10, '', '', 'http://localhost/BWmobapi/public/card_image/profile_pic_d3d9446802a44259755d38e6d163e820.png', 'male', 'egypt', 'cairo', 'shobtra', 'engineering', 'it', 'software', 1, NULL, NULL, NULL, NULL, ''),
(12, '2018-08-19 22:27:54', '2018-08-19 22:27:54', 11, '', '', 'http://localhost/BWmobapi/public/card_image/profile_pic_6512bd43d9caa6e02c990b0a82652dca.png', 'male', 'egypt', 'cairo', 'shobtra', 'engineering', 'it', 'software', 1, NULL, NULL, NULL, NULL, ''),
(13, '2018-08-22 05:44:29', '2018-08-22 05:44:29', 13, '', '', 'http://localhost/BWmobapi/public/card_image/profile_pic_c51ce410c124a10e0db5e4b97fc2af39.png', 'male', 'egypt', 'cairo', 'shobtra', 'engineering', 'it', 'software', 1, NULL, NULL, NULL, NULL, ''),
(14, '2018-08-25 08:38:19', '2018-08-26 10:27:36', 14, 'Test me if you can', 'tasht', 'http://localhost/BWmobapi/public/card_image/profile_pic_e7327d748d95a66452ee96657fd46f49aab3238922bcc25a6f606eb525ffdc56.jpeg', 'male', 'egypt', 'cairo', 'shobtra', 'engineering', 'it', 'software', 1, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `recent_activities`
--

CREATE TABLE `recent_activities` (
  `recent_activity_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `action_by_user_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recent_activities`
--

INSERT INTO `recent_activities` (`recent_activity_id`, `created_at`, `updated_at`, `user_id`, `action_by_user_id`, `description`, `profile_image_url`) VALUES
(1, '2018-12-02 00:15:47', '2018-12-02 00:15:47', 0, 18, 'registered', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from_id` int(10) UNSIGNED DEFAULT NULL,
  `to_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resetsteps`
--

CREATE TABLE `resetsteps` (
  `resetsteps_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_pass` varchar(4091) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resetsteps`
--

INSERT INTO `resetsteps` (`resetsteps_id`, `created_at`, `updated_at`, `email`, `confirmation_code`, `confirmation_link`, `temp_pass`) VALUES
(1, '2018-11-24 05:30:16', '2018-11-24 07:08:53', 'eng.iessa.mostafa300720182320@gmail.com', 'androw12345', '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');

-- --------------------------------------------------------

--
-- Table structure for table `stagings`
--

CREATE TABLE `stagings` (
  `staging_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `registration` int(1) DEFAULT '0',
  `active_account` int(1) DEFAULT '0',
  `creation_own_profile` int(1) DEFAULT '0',
  `creation_own_card` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `terms_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `active`) VALUES
(5, 'Iessa darktroy', 'Iessa', 'darktroy', 'a1@a1.a1', '$2y$10$OwphDVCrQG6LASG/N.XdsuajmEufKL17.oATbtgksYU1QZjOVKN5K', NULL, '2018-12-24 07:30:23', '2018-12-24 07:30:23', 0),
(16, 'Iessa darktroy', 'Iessa', 'darktroy', 'eng.iessa.mostafa@gmail.com', '$2y$10$k.4Y8jd/ZjzcPZBSdw7MWORYa6kUuTKd8K60lQX7ssTftasrZDk62', NULL, '2018-12-24 13:54:42', '2018-12-24 13:54:42', 0),
(17, 'wwwwwwwwwwwwwwwwwwwwwwwww wwwwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwwwwwwwwwww@wwwwwwwwwwwwwwwwwwwwwwwww.com', '$2y$10$H6sQPXCQ1VdmFsOjbbr.wOskSA6OUxxH7dmoiXR8Jp6SCn.A.xrTe', NULL, '2018-12-24 14:00:36', '2018-12-24 14:00:36', 0),
(18, 'werd werd', 'werd', 'werd', 'werd@werd.werd', '$2y$10$64kbOkf08dsN5F1pFYGNQ.PJ3Qnf/vuI4EG/lvu4LUmuxs9aMzbjW', NULL, '2018-12-24 14:03:30', '2018-12-24 14:03:30', 0),
(19, 'werd2 werd2', 'werd2', 'werd2', 'werd2@werd2.werd2', '$2y$10$rP.dXgJb5I3hLkqSD16eVOhrIxfS9T//8LIXU2u4wsxi.ZyjXFRgm', NULL, '2018-12-24 14:05:17', '2018-12-24 14:05:17', 0),
(24, 'zs zs', 'zs', 'zs', 'zs@zs.zs', '$2y$10$Phlxcikldnj9CtuKNOEHE.HGYLBQ/1BzWtoXF1.pgAP.wLmsjfEQS', NULL, '2018-12-24 14:11:15', '2018-12-24 14:11:15', 0),
(27, 'zsd zsd', 'zsd', 'zsd', 'zsd@zsd.zsd', '$2y$10$BtifMqHz5dJLBtw.gqfNTOqMBH0ocI1S.DBlUH9FsykV2v2xPT.XC', 'X0fPd0hOl67pDiSI0Li5u9XBUr3wTlM8jQnqxyRev5DT1IPVsleMtZlqlBQp', '2018-12-24 14:16:18', '2018-12-24 14:16:18', 0),
(28, 'qweqw qweqw', 'qweqw', 'qweqw', 'qweqw@qweqw.qweqw', '$2y$10$cbD4EcMZdF5gvXommT.Gee7EGOytJMl9BO6VPPwFgvmeb.8FT0hHO', '0YwNNhkwBgZ2VSwxAF5kYy89v4INtNyLd8JfI7JhXkd0mYAB8Pqn3i6iXNWb', '2018-12-30 11:47:43', '2018-12-30 11:47:43', 0),
(29, 'ftest ltest', 'ftest', 'ltest', 'test@test.test', '$2y$10$ngWGujpEH5CAANDe1CG0..QL.itnnhZTYX3ZPj6yTaCQXIrXygHHa', NULL, '2019-01-02 05:07:00', '2019-01-02 05:07:00', 0),
(30, 'jan1 jan1', 'jan1', 'jan1', 'jan1@jan1.jan1', '$2y$10$MsCLghpzDfHtnf1jrA3oye2.20gP/TxwW2/lPnwvdgVEkDFfwKroC', NULL, '2019-01-02 05:14:47', '2019-01-02 05:14:47', 0),
(31, 'jan2 jan2', 'jan2', 'jan2', 'jan2@jan2.jan2', '$2y$10$KAwWiw31B23LkxrKnCpKfuau73UH6Zx2R6WnXHowOkEmbkJFhrmfG', NULL, '2019-01-02 05:16:37', '2019-01-02 05:16:37', 0),
(32, 'jan3 jan3', 'jan3', 'jan3', 'jan3@jan3.jan3', '$2y$10$..tQNwzIWST9RT6Gl2CiYOLRHDPDIc0nUDGl.yHn6MsHtC36UP3Jq', NULL, '2019-01-02 05:18:02', '2019-01-02 05:18:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_cards`
--

CREATE TABLE `user_cards` (
  `user_card_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `card_holder_id` int(10) UNSIGNED DEFAULT NULL,
  `card_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_to_companies`
--

CREATE TABLE `user_to_companies` (
  `userToCompany_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `departement_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_to_companies`
--

INSERT INTO `user_to_companies` (`userToCompany_id`, `created_at`, `updated_at`, `company_id`, `user_id`, `role_id`, `departement_id`) VALUES
(1, '2018-12-30 11:47:43', '2018-12-30 11:47:43', 8, 28, 1, 0),
(2, '2019-01-02 05:14:47', '2019-01-02 05:14:47', 8, 30, 2, 1),
(3, '2019-01-02 05:16:37', '2019-01-02 05:16:37', 8, 31, 2, 2),
(4, '2019-01-02 05:18:02', '2019-01-02 05:18:02', 8, 32, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation_processes`
--
ALTER TABLE `activation_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_description`
--
ALTER TABLE `activity_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `branchs_company_id_index` (`company_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `cards_holders`
--
ALTER TABLE `cards_holders`
  ADD PRIMARY KEY (`card_holder_id`),
  ADD KEY `cards_holders_user_id_index` (`user_id`);

--
-- Indexes for table `card_to_interests`
--
ALTER TABLE `card_to_interests`
  ADD PRIMARY KEY (`card_to_interest_id`),
  ADD KEY `card_to_interests_interest_id_index` (`interest_id`),
  ADD KEY `card_to_interests_user_id_index` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`departement_id`),
  ADD KEY `departements_branch_id_index` (`branch_id`),
  ADD KEY `departements_company_id_index` (`company_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `interestes`
--
ALTER TABLE `interestes`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `invitation_contacts`
--
ALTER TABLE `invitation_contacts`
  ADD PRIMARY KEY (`invitation_contacts_id`),
  ADD KEY `invitation_contacts_invited_user_id_index` (`invited_user_id`);

--
-- Indexes for table `messag_records`
--
ALTER TABLE `messag_records`
  ADD PRIMARY KEY (`messag_record_id`),
  ADD KEY `messag_records_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `recent_activities`
--
ALTER TABLE `recent_activities`
  ADD PRIMARY KEY (`recent_activity_id`),
  ADD KEY `recent_activities_user_id_index` (`user_id`),
  ADD KEY `recent_activities_action_by_user_id_index` (`action_by_user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `requests_from_id_index` (`from_id`),
  ADD KEY `requests_to_id_index` (`to_id`);

--
-- Indexes for table `resetsteps`
--
ALTER TABLE `resetsteps`
  ADD PRIMARY KEY (`resetsteps_id`);

--
-- Indexes for table `stagings`
--
ALTER TABLE `stagings`
  ADD PRIMARY KEY (`staging_id`),
  ADD KEY `stagings_user_id_index` (`user_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_cards`
--
ALTER TABLE `user_cards`
  ADD PRIMARY KEY (`user_card_id`),
  ADD KEY `user_cards_user_id_index` (`user_id`),
  ADD KEY `user_cards_card_holder_id_index` (`card_holder_id`),
  ADD KEY `user_cards_card_id_index` (`card_id`);

--
-- Indexes for table `user_to_companies`
--
ALTER TABLE `user_to_companies`
  ADD PRIMARY KEY (`userToCompany_id`),
  ADD KEY `user_to_companies_company_id_index` (`company_id`),
  ADD KEY `user_to_companies_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation_processes`
--
ALTER TABLE `activation_processes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `activity_description`
--
ALTER TABLE `activity_description`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `branch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cards_holders`
--
ALTER TABLE `cards_holders`
  MODIFY `card_holder_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `card_to_interests`
--
ALTER TABLE `card_to_interests`
  MODIFY `card_to_interest_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `departement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interestes`
--
ALTER TABLE `interestes`
  MODIFY `interest_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invitation_contacts`
--
ALTER TABLE `invitation_contacts`
  MODIFY `invitation_contacts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messag_records`
--
ALTER TABLE `messag_records`
  MODIFY `messag_record_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `recent_activities`
--
ALTER TABLE `recent_activities`
  MODIFY `recent_activity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resetsteps`
--
ALTER TABLE `resetsteps`
  MODIFY `resetsteps_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stagings`
--
ALTER TABLE `stagings`
  MODIFY `staging_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `terms_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_cards`
--
ALTER TABLE `user_cards`
  MODIFY `user_card_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_to_companies`
--
ALTER TABLE `user_to_companies`
  MODIFY `userToCompany_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
