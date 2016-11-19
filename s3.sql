-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2016 at 08:29 PM
-- Server version: 5.7.16-0ubuntu0.16.10.1
-- PHP Version: 7.0.12-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s3`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_visits`
--

CREATE TABLE `add_visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `checked_id` int(10) UNSIGNED NOT NULL,
  `visit_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_visits`
--

INSERT INTO `add_visits` (`id`, `checked_id`, `visit_id`, `created_at`, `updated_at`) VALUES
(53, 1, 68, '2016-11-16 05:58:44', '2016-11-16 05:58:44'),
(54, 2, 68, '2016-11-16 05:58:44', '2016-11-16 05:58:44'),
(55, 3, 68, '2016-11-16 05:58:44', '2016-11-16 05:58:44'),
(56, 1, 69, '2016-11-16 06:35:27', '2016-11-16 06:35:27'),
(57, 1, 70, '2016-11-16 06:37:26', '2016-11-16 06:37:26'),
(58, 1, 71, '2016-11-16 06:38:12', '2016-11-16 06:38:12'),
(59, 2, 72, '2016-11-16 06:38:46', '2016-11-16 06:38:46'),
(60, 1, 73, '2016-11-16 06:53:52', '2016-11-16 06:53:52'),
(61, 1, 74, '2016-11-16 06:56:09', '2016-11-16 06:56:09'),
(62, 1, 75, '2016-11-16 06:56:44', '2016-11-16 06:56:44'),
(63, 1, 76, '2016-11-16 06:57:24', '2016-11-16 06:57:24'),
(64, 1, 77, '2016-11-16 06:57:53', '2016-11-16 06:57:53'),
(65, 1, 78, '2016-11-16 06:58:21', '2016-11-16 06:58:21'),
(66, 1, 79, '2016-11-16 07:00:22', '2016-11-16 07:00:22'),
(67, 1, 80, '2016-11-16 07:03:16', '2016-11-16 07:03:16'),
(68, 1, 81, '2016-11-16 07:06:06', '2016-11-16 07:06:06'),
(69, 1, 82, '2016-11-16 07:09:56', '2016-11-16 07:09:56'),
(70, 1, 83, '2016-11-16 07:16:03', '2016-11-16 07:16:03'),
(71, 1, 84, '2016-11-16 07:22:06', '2016-11-16 07:22:06'),
(72, 2, 84, '2016-11-16 07:22:06', '2016-11-16 07:22:06'),
(73, 1, 85, '2016-11-16 07:22:32', '2016-11-16 07:22:32'),
(74, 2, 85, '2016-11-16 07:22:32', '2016-11-16 07:22:32'),
(75, 3, 85, '2016-11-16 07:22:32', '2016-11-16 07:22:32'),
(76, 2, 86, '2016-11-16 08:31:02', '2016-11-16 08:31:02'),
(77, 3, 86, '2016-11-16 08:31:02', '2016-11-16 08:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `checkeds`
--

CREATE TABLE `checkeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `checked_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checked_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkeds`
--

INSERT INTO `checkeds` (`id`, `checked_name`, `checked_price`, `created_at`, `updated_at`) VALUES
(1, 'interview', 200.00, '2016-11-15 10:07:16', '2016-11-15 10:10:40'),
(2, 'test_3', 600.00, '2016-11-15 09:53:39', '2016-11-15 09:53:39'),
(3, 'test_2', 1000.00, '2016-11-12 08:17:22', '2016-11-12 08:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(10) UNSIGNED NOT NULL,
  `day_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day_name`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `divisions_times`
--

CREATE TABLE `divisions_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `divisions_times`
--

INSERT INTO `divisions_times` (`id`, `time`) VALUES
(1, '00:00:00'),
(2, '00:30:00'),
(3, '01:00:00'),
(4, '01:30:00'),
(5, '02:00:00'),
(6, '02:30:00'),
(7, '03:00:00'),
(8, '03:30:00'),
(9, '04:00:00'),
(10, '04:30:00'),
(11, '05:00:00'),
(12, '05:30:00'),
(13, '06:00:00'),
(14, '06:30:00'),
(15, '07:00:00'),
(16, '07:30:00'),
(17, '08:00:00'),
(18, '08:30:00'),
(19, '09:00:00'),
(20, '09:30:00'),
(21, '10:00:00'),
(22, '10:30:00'),
(23, '11:00:00'),
(24, '11:30:00'),
(25, '12:00:00'),
(26, '12:30:00'),
(27, '13:00:00'),
(28, '13:30:00'),
(29, '14:00:00'),
(30, '14:30:00'),
(31, '15:00:00'),
(32, '15:30:00'),
(33, '16:00:00'),
(34, '16:30:00'),
(35, '17:00:00'),
(36, '17:30:00'),
(37, '18:00:00'),
(38, '18:30:00'),
(39, '19:00:00'),
(40, '19:30:00'),
(41, '20:00:00'),
(42, '20:30:00'),
(43, '21:00:00'),
(44, '21:30:00'),
(45, '22:00:00'),
(46, '22:30:00'),
(47, '23:00:00'),
(48, '23:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_work_times`
--

CREATE TABLE `employee_work_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_time_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_work_times`
--

INSERT INTO `employee_work_times` (`id`, `work_time_id`, `user_id`, `created_at`, `updated_at`) VALUES
(81, 4, 6, '2016-11-14 04:32:41', '2016-11-14 04:32:41'),
(82, 5, 6, '2016-11-14 04:32:41', '2016-11-14 04:32:41'),
(84, 8, 6, '2016-11-14 04:32:42', '2016-11-14 04:32:42'),
(85, 4, 4, '2016-11-14 04:32:54', '2016-11-14 04:32:54'),
(87, 5, 8, '2016-11-14 04:33:01', '2016-11-14 04:33:01'),
(88, 8, 8, '2016-11-14 04:33:01', '2016-11-14 04:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_12_18_070318_create_roles_table', 1),
('2015_12_18_070426_create_user_roles_table', 1),
('2016_10_05_095951_create_patients_table', 1),
('2016_10_21_081006_create_divisions_times_table', 1),
('2016_10_21_081956_create_checkeds_table', 1),
('2016_10_21_120823_create_shifts_table', 1),
('2016_10_21_122409_create_days_table', 1),
('2016_10_21_133823_create_work_times_table', 1),
('2016_10_27_135019_create_shift_employees_table', 2),
('2016_11_09_153527_create_employee_work_times_table', 3),
('2016_11_12_123357_create_visits_table', 4),
('2016_11_12_125337_create_add_visits_table', 4),
('2016_11_12_125338_create_add_visits_table', 5),
('2016_11_12_123358_create_visits_table', 6),
('2016_11_12_123367_create_visits_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `patient_phone` int(11) NOT NULL,
  `patient_blood` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_birthday` date NOT NULL,
  `patient_diseases` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_name`, `patient_gender`, `patient_phone`, `patient_blood`, `patient_address`, `patient_birthday`, `patient_diseases`, `created_at`, `updated_at`) VALUES
(1, 'عثمان النور', 'Male', 147852369, 'O−', 'sudan', '1986-01-09', '<p>123</p>\r\n<p>123</p>', '2016-11-10 12:25:47', '2016-11-19 06:53:36'),
(2, 'نورا', 'Female', 2132151542, 'B−', 'الوطن', '2016-11-12', 'ghfhfty', '2016-11-12 06:28:14', '2016-11-12 06:28:14'),
(3, 'عشة', 'Female', 754891625, 'O+', 'سودان', '2016-11-12', 'تانلن', '2016-11-12 11:14:39', '2016-11-12 11:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Doctor'),
(2, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `shift_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `shift_name`) VALUES
(1, 'Morning'),
(2, 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `shift_employees`
--

CREATE TABLE `shift_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `work_time_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_phone`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 111700011, 'admin@obaaa.sd', '$2y$10$CYLEAiFHi3wfyLA8IE9FJ.kxa5mA5AezednMUnyHkzb2CepcA7eaK', NULL, NULL, NULL),
(2, 'test_1', 147852369, 'test_1@obaaa.sd', '$2y$10$HFFlMB6TlGNXuN8kmMZATO4O4mWRvAD0Yj5kOva6gNBRRLMgY1Qje', NULL, '2016-10-26 08:05:10', '2016-10-27 07:59:52'),
(4, 'test_2', 914785421, 'test_2@obaaa.sd', '$2y$10$Z7WjAkYAOIU.gfFwPzv.y.u0PUYZ7BzZ.mH9/s6850YM7ZjYgpM3G', NULL, '2016-10-27 12:16:02', '2016-10-27 12:16:02'),
(6, 'd. mahmoud', 124578457, 'admin2@obaaa.sd', '$2y$10$w3OxkVj0AiKZwxliHXhHkeMTS2KSUIvVKesDiYwbBh5lCzfzS6OzG', NULL, '2016-11-13 10:54:11', '2016-11-13 10:54:11'),
(8, 'test_3', 215487985, 'test_3@obaaa.sd', '$2y$10$6RUFOTGLjI1m/Hb/QARV3uk/cCtjWmdGpkIm5B1mhQAVeOY7vpcJq', NULL, '2016-11-13 10:54:50', '2016-11-13 10:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '2016-10-26 08:05:10', '2016-10-27 11:57:48'),
(3, 3, '2', '2016-10-27 07:54:20', '2016-10-27 08:52:18'),
(4, 4, '2', '2016-10-27 12:16:02', '2016-10-27 12:16:02'),
(5, 6, '1', '2016-11-13 10:54:11', '2016-11-13 10:54:11'),
(6, 8, '1', '2016-11-13 10:54:50', '2016-11-13 10:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `work_time_id` int(10) UNSIGNED NOT NULL,
  `visit_price` double(8,2) DEFAULT NULL,
  `visit_paid` double(8,2) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `divisions_time_id` int(10) UNSIGNED NOT NULL,
  `medical_report` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `patient_id`, `doctor_id`, `work_time_id`, `visit_price`, `visit_paid`, `visit_date`, `divisions_time_id`, `medical_report`, `created_at`, `updated_at`) VALUES
(68, 2, 6, 8, 1800.00, NULL, '2016-11-11', 18, '', '2016-11-16 05:58:44', '2016-11-16 05:58:44'),
(69, 3, 6, 8, 200.00, 0.00, '2016-11-04', 18, '', '2016-11-16 06:35:27', '2016-11-16 06:35:27'),
(70, 2, 6, 8, 200.00, 0.00, '2016-11-04', 19, '', '2016-11-16 06:37:26', '2016-11-16 06:37:26'),
(71, 2, 6, 8, 200.00, 0.00, '2016-11-04', 20, '', '2016-11-16 06:38:12', '2016-11-16 06:38:13'),
(72, 2, 6, 8, 600.00, 0.00, '2016-11-04', 21, '', '2016-11-16 06:38:46', '2016-11-16 06:38:46'),
(73, 2, 6, 8, 200.00, 0.00, '2016-11-04', 22, '', '2016-11-16 06:53:52', '2016-11-16 06:53:53'),
(74, 3, 6, 8, 200.00, 0.00, '2016-11-04', 23, '', '2016-11-16 06:56:09', '2016-11-16 06:56:09'),
(75, 2, 6, 8, 200.00, 0.00, '2016-11-04', 24, '', '2016-11-16 06:56:44', '2016-11-16 06:56:44'),
(76, 2, 6, 8, 200.00, 0.00, '2016-11-04', 25, '', '2016-11-16 06:57:24', '2016-11-16 06:57:24'),
(77, 2, 6, 8, 200.00, 0.00, '2016-11-04', 26, '', '2016-11-16 06:57:53', '2016-11-16 06:57:53'),
(78, 2, 8, 8, 200.00, 0.00, '2016-11-04', 32, '', '2016-11-16 06:58:21', '2016-11-16 06:58:21'),
(79, 2, 8, 8, 200.00, 0.00, '2016-11-04', 33, '', '2016-11-16 07:00:22', '2016-11-16 07:00:22'),
(80, 2, 8, 8, 200.00, 0.00, '2016-11-04', 44, '', '2016-11-16 07:03:16', '2016-11-16 07:03:16'),
(81, 2, 6, 8, 200.00, 0.00, '2016-11-04', 47, '', '2016-11-16 07:06:06', '2016-11-16 07:06:06'),
(82, 1, 6, 8, 200.00, 0.00, '2016-11-04', 27, '<p>1324567</p>', '2016-11-16 07:09:56', '2016-11-19 07:19:46'),
(83, 1, 8, 8, 200.00, 0.00, '2016-11-11', 47, '', '2016-11-16 07:16:03', '2016-11-16 07:16:03'),
(84, 1, 6, 8, 800.00, 0.00, '2016-11-04', 46, '', '2016-11-16 07:22:06', '2016-11-16 07:22:06'),
(85, 1, 8, 8, 1800.00, 0.00, '2016-11-04', 45, '', '2016-11-16 07:22:32', '2016-11-16 07:22:32'),
(86, 2, 2, 4, 1600.00, 0.00, '2016-11-05', 23, '<h1 style="text-align: center;">نورا</h1>\r\n<p><strong>123132113213</strong></p>\r\n<p><strong>465789</strong></p>\r\n<p><strong>لبسيىتنينصمةكص</strong></p>', '2016-11-16 08:31:01', '2016-11-19 07:21:08'),
(87, 1, 6, 8, NULL, 0.00, '2016-11-25', 21, '', '2016-11-16 11:04:20', '2016-11-16 11:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `work_times`
--

CREATE TABLE `work_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL,
  `shift_id` int(10) UNSIGNED NOT NULL,
  `divisions_times_start_id` int(10) UNSIGNED NOT NULL,
  `divisions_times_end_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_times`
--

INSERT INTO `work_times` (`id`, `day_id`, `shift_id`, `divisions_times_start_id`, `divisions_times_end_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 23, 33, '2016-10-27 09:55:36', '2016-10-27 09:55:36'),
(5, 1, 2, 39, 47, '2016-10-27 09:55:58', '2016-10-27 09:55:58'),
(8, 7, 1, 18, 48, '2016-11-10 11:09:30', '2016-11-15 06:16:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_visits`
--
ALTER TABLE `add_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_visits_checked_id_foreign` (`checked_id`),
  ADD KEY `add_visits_visit_id_foreign` (`visit_id`);

--
-- Indexes for table `checkeds`
--
ALTER TABLE `checkeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions_times`
--
ALTER TABLE `divisions_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_work_times`
--
ALTER TABLE `employee_work_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_work_times_work_time_id_foreign` (`work_time_id`),
  ADD KEY `employee_work_times_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_patient_name_unique` (`patient_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift_employees`
--
ALTER TABLE `shift_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_employees_user_id_foreign` (`user_id`),
  ADD KEY `shift_employees_work_time_id_foreign` (`work_time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_patient_id_foreign` (`patient_id`),
  ADD KEY `visits_doctor_id_foreign` (`doctor_id`),
  ADD KEY `visits_work_time_id_foreign` (`work_time_id`),
  ADD KEY `visits_divisions_time_id_foreign` (`divisions_time_id`);

--
-- Indexes for table `work_times`
--
ALTER TABLE `work_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_times_day_id_foreign` (`day_id`),
  ADD KEY `work_times_shift_id_foreign` (`shift_id`),
  ADD KEY `work_times_divisions_times_start_id_foreign` (`divisions_times_start_id`),
  ADD KEY `work_times_divisions_times_end_id_foreign` (`divisions_times_end_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_visits`
--
ALTER TABLE `add_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `checkeds`
--
ALTER TABLE `checkeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `divisions_times`
--
ALTER TABLE `divisions_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `employee_work_times`
--
ALTER TABLE `employee_work_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shift_employees`
--
ALTER TABLE `shift_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `work_times`
--
ALTER TABLE `work_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_visits`
--
ALTER TABLE `add_visits`
  ADD CONSTRAINT `add_visits_checked_id_foreign` FOREIGN KEY (`checked_id`) REFERENCES `checkeds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `add_visits_visit_id_foreign` FOREIGN KEY (`visit_id`) REFERENCES `visits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_work_times`
--
ALTER TABLE `employee_work_times`
  ADD CONSTRAINT `employee_work_times_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_work_times_work_time_id_foreign` FOREIGN KEY (`work_time_id`) REFERENCES `work_times` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shift_employees`
--
ALTER TABLE `shift_employees`
  ADD CONSTRAINT `shift_employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shift_employees_work_time_id_foreign` FOREIGN KEY (`work_time_id`) REFERENCES `work_times` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_divisions_time_id_foreign` FOREIGN KEY (`divisions_time_id`) REFERENCES `divisions_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visits_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visits_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visits_work_time_id_foreign` FOREIGN KEY (`work_time_id`) REFERENCES `work_times` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_times`
--
ALTER TABLE `work_times`
  ADD CONSTRAINT `work_times_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_times_divisions_times_end_id_foreign` FOREIGN KEY (`divisions_times_end_id`) REFERENCES `divisions_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_times_divisions_times_start_id_foreign` FOREIGN KEY (`divisions_times_start_id`) REFERENCES `divisions_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_times_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
