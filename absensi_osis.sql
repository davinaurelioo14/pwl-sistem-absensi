-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2025 at 12:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_osis`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_history`
--

CREATE TABLE `attendance_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `check_in_time` datetime DEFAULT NULL,
  `check_out_time` datetime DEFAULT NULL,
  `status` enum('Presence','Absence permit','Absence') DEFAULT 'Presence',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance_history`
--

INSERT INTO `attendance_history` (`id`, `user_id`, `check_in_time`, `check_out_time`, `status`, `date`, `created_at`) VALUES
(7, 32, '2025-11-04 07:00:00', '2025-11-04 14:00:00', 'Presence', '2025-11-04', '2025-11-05 12:35:01'),
(8, 32, '2025-11-05 07:00:00', '2025-11-05 14:00:00', 'Presence', '2025-11-05', '2025-11-05 12:35:01'),
(9, 32, '2025-10-01 07:00:00', '2025-10-01 14:00:00', 'Presence', '2025-10-01', '2025-11-05 12:35:01'),
(10, 32, '2025-10-02 07:00:00', '2025-10-02 14:00:00', 'Presence', '2025-10-02', '2025-11-05 12:35:01'),
(11, 32, '2025-10-03 07:00:00', '2025-10-03 14:00:00', 'Presence', '2025-10-03', '2025-11-05 12:35:01'),
(12, 27, '2025-11-05 14:00:17', '2025-11-05 14:00:48', 'Absence permit', '2025-11-05', '2025-11-05 14:00:17'),
(13, 35, '2025-11-05 14:04:12', NULL, 'Absence', '2025-11-05', '2025-11-05 14:04:12'),
(14, 26, '2025-11-06 00:48:53', '2025-11-06 00:49:04', 'Absence permit', '2025-11-06', '2025-11-06 00:48:53'),
(15, 27, '2025-11-11 07:08:37', '2025-11-11 07:11:13', 'Presence', '2025-11-11', '2025-11-11 07:08:37'),
(16, 22, '2025-11-11 07:18:19', '2025-11-11 07:18:30', 'Presence', '2025-11-11', '2025-11-11 07:18:19'),
(17, 21, '2025-11-11 07:27:16', '2025-11-11 07:27:27', 'Absence permit', '2025-11-11', '2025-11-11 07:27:16'),
(18, 27, '2025-11-12 02:48:39', '2025-11-12 02:48:45', 'Presence', '2025-11-12', '2025-11-12 02:48:39'),
(19, 35, '2025-11-12 03:02:53', '2025-11-12 03:02:57', 'Absence', '2025-11-12', '2025-11-12 03:02:53'),
(20, 39, '2025-11-19 01:46:19', NULL, 'Presence', '2025-11-19', '2025-11-19 01:46:19'),
(21, 27, '2025-11-19 01:46:58', '2025-11-19 01:47:04', 'Absence', '2025-11-19', '2025-11-19 01:46:58'),
(22, 22, '2025-11-19 02:53:33', '2025-11-19 02:54:04', 'Presence', '2025-11-19', '2025-11-19 02:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(20, 'DJ ALOK', 'palepale22@gmail.com', '$2y$10$gHJMbuVFg4aYoQWzLhOGl.DYRWKof4mHgztIS0.l6yVa0Gbvi38xq', '2025-10-21 23:49:17'),
(21, 'RUOK EPEP', 'palepale12@gmail.com', '$2y$10$j7AEXMj9MIEmfEpeWWw5nesr5p.Vt213/YKyPkv.qLTuaEXCOzkjK', '2025-10-21 23:54:13'),
(22, 'Yansen Yansen', 'yansen35@gmail.com', '$2y$10$2N9moiNJX5b2qXEp1Gz9iu76CuxxxXSHgR3Iy6VMlcEx3SyDJGoDu', '2025-10-22 01:38:28'),
(23, 'Yansen', 'yansen035@gmail.com', '$2y$10$TvNx6I.NWRA5Vxg8/tXpdOWh5iPI0MVSTaIW4utrXkZbS5PM5T1Tu', '2025-10-22 01:45:46'),
(24, 'gepin', 'gepin@gmail.com', '$2y$10$YfOQTLMhzBF5DMwJyGoQJ.1Qnfm.l0G9LMo.jdNT2zjo7lTe3D16S', '2025-10-22 02:06:54'),
(25, 'davin', 'davin@gmail.com', '$2y$10$l8FUu.fRyUHflY2BwyvYpeEqOHUxuZoIk7CkX.D1qwuo.5FhC9zEi', '2025-10-22 02:38:32'),
(26, 'SudIo1Geminkk', 'palepale32@gmail.com', '$2y$10$M1PxKWiuUBZ4DqxfnRu48eFLQFheyqDICly9VC3W4pNZXYuJvGUfi', '2025-10-22 02:39:27'),
(27, 'Davin', 'sandi@gmail.com', '$2y$10$qFP..THKhrdWEUWcWtJUPeEqVz.yHumIuaMGovpLMPCMVu8gWPYqe', '2025-10-22 02:42:28'),
(29, 'Yansen', 'yansen935@gmail.com', '$2y$10$WjXIzKa2TWJqE8iAOxccu.mSq5SeF6tXJN5DlPCDSvOth36Ksstae', '2025-10-22 03:11:59'),
(30, 'geppin', 'geppin@gmail.com', '$2y$10$1srRDFwU3.XtdyYr8G0.reEIVcpFQP2Ogw3llr.91S/wvMkSFhm5i', '2025-10-29 01:52:02'),
(31, 'DJ ALOK', 'alok@gmail.com', '$2y$10$P4JaCjOby5EynkJ2Y1NCe.mwRJT3dhzS8Jtg8sxOEiAoFY8DHiDMm', '2025-11-05 12:23:35'),
(32, 'Test User', 'test@example.com', '$2y$10$nUX6EZBOvI6Ra7v59O8AZOAqH87RCFEPnQ6Y9INk8j.SSIruY1TRq', '2025-11-05 12:34:07'),
(35, 'Andi', 'andi@gmail.com', '$2y$10$jpxPi8kUijVTTzQgCgx.PuaTOHSZuY6otWoTtLTcT6RK2pGFuW4HS', '2025-11-05 14:02:24'),
(38, 'aw', 'palepadadasdadwale32@gmail.com', '$2y$10$m66HvHSTQmYf9o0gerfeR.c1Mz9oZ4SXbRoUGL/LOyRLUZtOM4ic6', '2025-11-19 01:45:14'),
(39, 'lanciao', 'lanciao22@gmail.com', '$2y$10$EuOjvu9PYUW9c7q5QZd41OFg35LgYAXUH6FeDOjpAfigpj7/sMhtW', '2025-11-19 01:45:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_history`
--
ALTER TABLE `attendance_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `attendance_history`
--
ALTER TABLE `attendance_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_history`
--
ALTER TABLE `attendance_history`
  ADD CONSTRAINT `attendance_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
