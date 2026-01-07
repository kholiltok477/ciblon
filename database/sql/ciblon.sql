-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2025 at 07:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciblon`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registration_fee` varchar(255) DEFAULT NULL,
  `registration_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`, `location`, `image`, `created_by`, `created_at`, `updated_at`, `registration_fee`, `registration_link`) VALUES
(1, 'qqqqqq', 'wwwwwwwwwwwwwwwwwwwwww', '2025-12-18', '2025-12-19', 'uuuuuuuuuuu', NULL, 1, '2025-12-07 07:58:32', '2025-12-07 07:58:32', NULL, NULL),
(2, 'qqqqqq', 'wwwwwwwwwwwwwwwwwwwwww', '2025-12-18', '2025-12-19', 'uuuuuuuuuuu', NULL, 1, '2025-12-07 08:00:19', '2025-12-07 08:00:19', NULL, NULL),
(3, 'asdfghjkl;', 'zxcvbnm,.', '2025-12-16', '2025-12-30', 'asdfghjkl', '1765120680.jpg', 1, '2025-12-07 08:18:00', '2025-12-07 08:18:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_publications`
--

CREATE TABLE `event_publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` decimal(10,2) NOT NULL,
  `organizer_name` varchar(255) NOT NULL,
  `organizer_address` text NOT NULL,
  `organizer_description` text NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `payment_proof_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected','pending_payment') DEFAULT 'pending',
  `registration_periods` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`registration_periods`)),
  `payment_type` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `target_audience` varchar(255) DEFAULT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `activity_level` varchar(255) DEFAULT NULL,
  `registration_link` varchar(255) DEFAULT NULL,
  `guidebook_link` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `poster_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_publications`
--

INSERT INTO `event_publications` (`id`, `user_id`, `package_name`, `package_price`, `organizer_name`, `organizer_address`, `organizer_description`, `instagram`, `website`, `logo_path`, `payment_proof_path`, `status`, `registration_periods`, `payment_type`, `category`, `target_audience`, `activity_type`, `activity_level`, `registration_link`, `guidebook_link`, `whatsapp_number`, `poster_path`, `created_at`, `updated_at`) VALUES
(2, 2, 'Mingguan', 5000.00, 'roni', 'asasa', 'asdasdas', '@ronii', 'https://www.figma.com/design/t1YL86H6Zyl9WdopgA5a8b/wireframe-ciblon?node-id=0-1&p=f&t=s5xmvsizU3wLRt4w-0', 'organizer_logos/VUb9dYoxC3DZ1Lxnk9Vcsg2jH5rGf8Ds0b0l91G1.jpg', NULL, 'approved', '[{\"name\":\"GELOMBANG 1\",\"start_date\":\"2025-12-05\",\"end_date\":\"2026-02-13\"}]', 'Gratis', 'gaya kupu kupu', 'sma/smk', 'Online', 'profesional', 'http://example.com', 'http://example.com', '32556464774643', 'event_posters/HJ58JUS4lXIdiWEP5b0hZju5cYr6BbKQpC1qy6YF.jpg', '2025-12-20 03:44:01', '2025-12-20 03:48:29'),
(3, 4, 'Mingguan', 5000.00, 'roni', 'adasdsadasd', 'adsda', '@ronii', 'https://www.figma.com/design/t1YL86H6Zyl9WdopgA5a8b/wireframe-ciblon?node-id=0-1&p=f&t=s5xmvsizU3wLRt4w-0', 'organizer_logos/wboUXaiZuCm4U5MBs2uA8rPMpmkFkNofGVdvOgIM.png', NULL, 'approved', '[{\"name\":\"GELOMBANG 1\",\"start_date\":\"2025-12-19\",\"end_date\":\"2026-02-21\"}]', 'Berbayar', 'gaya kupu kupu', 'sma/smk', 'Online', 'profesional', 'http://example.com', 'http://example.com', '32556464774643', 'event_posters/HdmWvcmCvQr9u3bZRQnZi27LArrxzmwJD397oV5z.jpg', '2025-12-20 04:44:50', '2025-12-20 05:25:31'),
(4, 4, 'Bulanan', 17000.00, 'roni', 'asadasd', 'asdad', '@ronii', 'https://www.figma.com/design/t1YL86H6Zyl9WdopgA5a8b/wireframe-ciblon?node-id=0-1&p=f&t=s5xmvsizU3wLRt4w-0', 'organizer_logos/L7phBukjGUbyDg81PqknBmDgYrtAuRjjrfTsy2Eq.jpg', NULL, 'approved', '[{\"name\":\"GELOMBANG 1\",\"start_date\":\"2025-12-19\",\"end_date\":\"2026-02-21\"}]', 'Gratis', 'gaya kupu kupu', 'sma/smk', 'Online', 'profesional', 'http://example.com', 'http://example.com', '32556464774643', 'event_posters/U5bcg7zucJOLDl9TYl66tarWmyTAxt7MLe3JX130.jpg', '2025-12-20 05:27:23', '2025-12-20 05:36:55'),
(5, 4, 'Mingguan', 5000.00, 'roni', 'sadasfadfa', 'safasfasf', '@ronii', 'https://www.figma.com/design/t1YL86H6Zyl9WdopgA5a8b/wireframe-ciblon?node-id=0-1&p=f&t=s5xmvsizU3wLRt4w-0', 'organizer_logos/wgGdSLHZNhwVG6XxYkvH5vypdNAiH5jdtaFuw4Cp.jpg', 'payment_proofs/a8znLMqCEWhC26Ibx7AkTaJy8871CXylWoOpIzin.jpg', 'approved', '[{\"name\":\"GELOMBANG 1\",\"start_date\":\"2025-12-19\",\"end_date\":\"2026-02-21\"}]', 'Gratis', 'gaya kupu kupu', 'sma/smk', 'Online', 'profesional', 'http://example.com', 'http://example.com', '32556464774643', 'event_posters/EW15Jdo6WiHg1MFsIfpqvnC16emwZSdiNCRxgT2V.png', '2025-12-20 05:34:47', '2025-12-20 05:36:49'),
(6, 5, '2 Bulan - Premium', 37000.00, 'jeje', 'kota wonosobo', 'untuk ajang lomba renang', '@jeje', 'https://www.figma.com/design/t1YL86H6Zyl9WdopgA5a8b/wireframe-ciblon?node-id=0-1&p=f&t=s5xmvsizU3wLRt4w-0', 'organizer_logos/SouCWqGQqa0HlfFgyFyTEsRyt74Y5qzyLUFiWhrj.jpg', 'payment_proofs/NBmrEXV53LTJjJOHJT8HkATxPHLZ0Bl9qcsfdxNQ.jpg', 'approved', '[{\"name\":\"GELOMBANG 1\",\"start_date\":\"2025-12-01\",\"end_date\":\"2026-02-08\"}]', 'Gratis', 'gaya katak', 'sma/smk', 'Online', 'profesional', 'http://example.com', 'http://example.com', '32556464774643', 'event_posters/gwTb304M4ynYuUoq8SoeJVb731K99RoQnOE02k5y.jpg', '2025-12-20 05:48:31', '2025-12-20 05:50:03'),
(7, 4, '2 Bulan - Premium', 37000.00, 'irul', 'xbbr', 'sdfgfhngjmhmk,jlk.', '@jeje', 'https://www.figma.com/design/t1YL86H6Zyl9WdopgA5a8b/wireframe-ciblon?node-id=0-1&p=f&t=s5xmvsizU3wLRt4w-0', 'organizer_logos/qL9knA8PgMWd1WluAecEi4YXi1pBIODriCwjaKPW.png', 'payment_proofs/PwmSoryz0d64VkdnfImIxdV5GJRTMPNB5Rr4hxSX.jpg', 'approved', '[{\"name\":\"GELOMBANG 1\",\"start_date\":\"2025-12-01\",\"end_date\":\"2026-02-08\"}]', 'Berbayar', 'gaya katak', 'sma/smk', 'Offline', 'profesional', 'http://example.com', 'http://example.com', '32556464774643', 'event_posters/gzWcS7LRFJRxNPG7ypbW4M2aEjaA9ZrUgc6C6urb.jpg', '2025-12-21 04:14:35', '2025-12-21 04:16:35'),
(8, 4, 'Mingguan', 5000.00, 'irul', 'kygfh', 'uhyugtyfgbh', '@jeje', 'https://www.figma.com/design/t1YL86H6Zyl9WdopgA5a8b/wireframe-ciblon?node-id=0-1&p=f&t=s5xmvsizU3wLRt4w-0', 'organizer_logos/86BCsdQiBsf935VaFTW7GBWdCtgz8Ys5IwxcRBsc.jpg', 'payment_proofs/IlBja9ppM90ry0rT9oQrOodhr6TJS8y8XlSpwMeX.jpg', 'pending', '[{\"name\":\"GELOMBANG 1\",\"start_date\":\"2025-12-01\",\"end_date\":\"2026-02-08\"}]', 'Gratis', 'gaya katak', 'sma/smk', 'Offline', 'profesional', 'http://example.com', 'http://example.com', '32556464774643', 'event_posters/21N8udYcaTsNVvAkCyGLo6W3OC8c2u1XhJixTF9x.jpg', '2025-12-21 06:10:27', '2025-12-21 06:10:37');

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
(4, '2025_12_07_111022_create_permission_tables', 1),
(5, '2025_12_07_115650_add_google_fields_to_users_table', 1),
(6, '2025_12_07_120000_create_events_table', 1),
(7, '2025_12_07_123820_add_role_to_users_table', 1),
(8, '2025_12_07_125354_create_event_participants_table', 1),
(9, '2025_12_07_132107_make_password_nullable_in_users_table', 1),
(10, '2025_12_07_133109_add_user_id_to_event_participants_table', 1),
(11, '2025_11_03_165843_add_google_columns_to_users_table', 2),
(12, '2025_12_20_100949_create_event_publications_table', 3),
(13, '2025_12_20_101558_add_details_to_event_publications_table', 4),
(14, '2025_12_20_123846_create_events_table', 5),
(15, '2025_12_21_104012_create_team_members_table', 6);

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

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `payment_proof_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','verified','rejected') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participant_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
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
('10QHSf3RlMWpmM80UMmedTzJJHZqUoWF3JrhlMTg', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia3doWjRqelU2TnF1dW5xT0hUTWE2VjRUQTJHZnJNZFZ2Tk8wREVDZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmZvcm1hc2kiO3M6NToicm91dGUiO3M6OToiaW5mb3JtYXNpIjt9czo1OiJzdGF0ZSI7czo0MDoieGNGOVJPOHczU2w1cllsa0VrYnRsN3czY2RLbTVxS29ER25jOGRmUyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1766235016),
('4MPo1D3dHZ6qfH0MyQA9YZ9fPDFl9crQSj4lfrb1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7462', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjhWVFNLSmhLR3c4ZjN2cUhhdUVHZGJJNlBSQ3NSU29qa0pGc05VMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zZXR1cC1hZG1pbi1maXgiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766228337),
('Ecp8kAjYDvA6gsPW1bL0KTCD1CDwZdGpA1edvt6Y', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.7462', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmRNdzdMWDRaUXFQVnhpYTk0Y0hvWFdSSmFRNzdjeXAwSmRrb2xaUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zZXR1cC1hZG1pbi1maXgiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766228105),
('kWssrtshzwrdqfFiPAnRK8MeT2lWCfwMIULKYr4o', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTUkyN1Jud01OR1EwZWFLSXJJM3paNE1PeWR2d0lvdTkzbkJEQ0tXSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRoL2dvb2dsZSI7czo1OiJyb3V0ZSI7czoxMjoiZ29vZ2xlLmxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoidnNwd3NWNVNQd296NXBJSDJoOE5FVzBZWVIzTzVKZ2RiRVRuZ0RxVCI7fQ==', 1766314121),
('O4H1pLvialKi81LrY99BJvl9FaZgjk7SRalsgBgW', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSzRVcEx0SjZpUE1Ia1ZpM1psNloyQnZaRkVvUkt1S0kzbTFhSjlzSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmZvcm1hc2kiO3M6NToicm91dGUiO3M6OToiaW5mb3JtYXNpIjt9czo1OiJzdGF0ZSI7czo0MDoiOVBLTVdxOEpMV3JaeDRqN041WTRsQjNBOFVGMGptV0ZFTTE5QlZlayI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1766322638),
('ZJqVekJQRrUcVJZHg4hek9VY61GUSbNoGVtj6PtU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTVZxOThDcGxBM1hXUURmckpHQVo1ejNPMU1md1p6a3Q5a2pDZlJYSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRoL2dvb2dsZSI7czo1OiJyb3V0ZSI7czoxMjoiZ29vZ2xlLmxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoia1JUcm45VjM1TzNHZVFFY05RTGUzQVVhdXczd2hjdWw3MWxZbVlLNSI7fQ==', 1766322579);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `group`, `created_at`, `updated_at`) VALUES
(1, 'hero_title', 'Raih Prestasimu di Ciblón Wonosobo', 'text', 'hero', NULL, NULL),
(2, 'hero_subtitle', 'Ajang kompetisi renang pelajar terbesar se-Wonosobo. Tunjukkan bakatmu, pecahkan rekor, dan jadilah juara masa depan.', 'text', 'hero', NULL, NULL),
(3, 'hero_image', 'https://images.unsplash.com/photo-1530541930197-ff16ac917b0e?auto=format&fit=crop&q=80', 'image', 'hero', NULL, NULL),
(4, 'stat_peserta', '500+', 'text', 'stats', NULL, NULL),
(5, 'stat_sekolah', '25', 'text', 'stats', NULL, NULL),
(6, 'stat_nomor_lomba', '50', 'text', 'stats', NULL, NULL),
(7, 'stat_total_hadiah', '10Jt+', 'text', 'stats', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `github_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `dribbble_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `role`, `bio`, `image`, `github_link`, `linkedin_link`, `instagram_link`, `twitter_link`, `dribbble_link`, `created_at`, `updated_at`) VALUES
(1, 'irull', 'backend', 'Full-stack devhalooooooooooooo eloper with 10 years of experience.', 'team-members/wCU1cToJVqUH8LfDgFA6wFXKZdtjtcHMnLElvq2l.jpg', 'https://github.com', 'https://github.com', 'https://github.com', 'https://github.com', 'https://github.com', '2025-12-21 03:47:55', '2025-12-21 03:53:33'),
(2, 'Jane Smith', 'UI/UX Designer', 'Passionate designer ensuring the best user experience.', NULL, NULL, NULL, NULL, NULL, 'https://dribbble.com', '2025-12-21 03:47:55', '2025-12-21 03:47:55'),
(3, 'Bob Johnson', 'Backend Engineer', 'Specializes in scalable server-side architectures.', NULL, NULL, NULL, NULL, 'https://twitter.com', NULL, '2025-12-21 03:47:55', '2025-12-21 03:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'peserta',
  `google_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `google_id`, `avatar`, `remember_token`, `created_at`, `updated_at`, `username`, `phone`, `gender`, `address`) VALUES
(1, 'Admin Ciblon', 'admin@ciblon.com', NULL, '$2y$12$2Bz/hx13ovfhiqmLaStADulmQvU87c9FxJIkvRRBj2POhAzpI3HvO', 'admin', NULL, NULL, NULL, '2025-12-07 07:53:01', '2025-12-20 03:58:57', NULL, NULL, NULL, NULL),
(2, 'Titan Attariq', 'titanattariq09@gmail.com', NULL, '$2y$12$dYOy.RP28tTBfBNEAYgXIuFwxpVZXdhLLng0xNOT.PNqOOzznTCQ6', 'admin', '105405509429115289123', 'avatars/DCuwRM8O2Not397BMVmzL3bAZZg9m8hCYLLUSBxD.jpg', NULL, '2025-12-07 08:18:22', '2025-12-20 03:55:05', 'titan alfatah', '+6290705054045', 'Laki-laki', 'purwosari reco'),
(3, 'titan', 'titanalfatah09@gmail.com', NULL, '$2y$12$oIm1LWaPak8PWx9r.hvuruw/96UaAXTdAg6fRzcjtCgojbXYDCKTK', 'peserta', NULL, NULL, NULL, '2025-12-09 07:39:42', '2025-12-09 07:39:42', NULL, NULL, NULL, NULL),
(4, 'Titan Alfatah', 'titanalfatah9@gmail.com', NULL, '$2y$12$2Tr4crMZYRCnHUrqzy6ckucQi829ajEJwg5gU73iqEIJinWrsB5Eq', 'peserta', NULL, NULL, NULL, '2025-12-20 04:43:00', '2025-12-20 04:43:23', 'admin jawa', '+6290705054045', 'Laki-laki', 'reco'),
(5, 'admin slot', 'jeje443@gmail.com', NULL, '$2y$12$TlXKhmHfOgcB26S2ZeYJTexQ0iP/AqrxQynkPdI/a4JOYW0PUJi2y', 'peserta', NULL, NULL, NULL, '2025-12-20 05:46:34', '2025-12-20 05:46:34', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_created_by_foreign` (`created_by`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_participants_event_id_foreign` (`event_id`),
  ADD KEY `event_participants_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_publications`
--
ALTER TABLE `event_publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_publications_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`),
  ADD KEY `news_author_id_foreign` (`author_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participants_category_id_foreign` (`category_id`);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_participant_id_foreign` (`participant_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_publications`
--
ALTER TABLE `event_publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD CONSTRAINT `event_participants_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_publications`
--
ALTER TABLE `event_publications`
  ADD CONSTRAINT `event_publications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
