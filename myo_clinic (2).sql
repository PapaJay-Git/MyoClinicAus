-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 07:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myo_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE `business_hours` (
  `id` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `schedule_start` varchar(10) NOT NULL,
  `schedule_end` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `days`, `schedule_start`, `schedule_end`, `status`) VALUES
(1, 'MONDAY', '8:00 AM', '12:00 PM', 'OPEN'),
(2, 'TUESDAY', '8:00 AM', '7:00 PM', 'CLOSED'),
(3, 'WEDNESDAY', '8:00 AM', '5:00 PM', 'OPEN'),
(4, 'THURSDAY', '8:00 AM', '4:00 PM', 'OPEN'),
(5, 'FRIDAY', '8:00 AM', '7:00 PM', 'OPEN'),
(6, 'SATURDAY', '8:00 AM', '8:00 PM', 'CLOSED'),
(7, 'SUNDAY', '8:00 AM', '9:00 PM', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_extension` varchar(20) NOT NULL,
  `file_directory` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file_name`, `file_extension`, `file_directory`, `date_added`) VALUES
(12, 'gallery_photo_1b9899621e9b30778b108ed0635d8348.jpg', 'jpg', '../gallery_media/', '2022-11-27 21:35:15'),
(16, 'gallery_photo_979feb05a2e172aeee31ca9115d6fe56.jpg', 'jpg', '../gallery_media/', '2022-11-29 15:49:11'),
(17, 'gallery_photo_a84956928bb4cadcbed0cd336782b56e.jpg', 'jpg', '../gallery_media/', '2022-11-29 15:49:36'),
(18, 'gallery_photo_6284d41f4198b88232d08938d129f17b.jpg', 'jpg', '../gallery_media/', '2022-11-29 16:38:15'),
(19, 'gallery_photo_8eebbefb0d840f48853bd4a73f0dfaa2.jpg', 'jpg', '../gallery_media/', '2022-11-29 16:38:26'),
(20, 'gallery_photo_bdec2ed72d6541742ed81a04d7449937.jpg', 'jpg', '../gallery_media/', '2022-11-29 16:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `source_name` varchar(100) NOT NULL,
  `reviews` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `source_name`, `reviews`) VALUES
(8, 'dhfhtfg', 'hfghfgjhfghfg'),
(9, 'ggfdg', 'dfgdfgdfgdf');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(100) NOT NULL,
  `service_desc` varchar(500) NOT NULL,
  `service_price` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_desc`, `service_price`, `date_created`) VALUES
(33, 'g556564', 'ghfghfghgfhfg', '65645', '2022-12-02 14:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `services_media`
--

CREATE TABLE `services_media` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_extension` varchar(100) NOT NULL,
  `file_directory` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `is_cover` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_media`
--

INSERT INTO `services_media` (`id`, `service_id`, `file_name`, `file_extension`, `file_directory`, `date_added`, `is_cover`) VALUES
(24, 33, 'service_media_97fde4205a63f5d308bb170e971257d8.png', 'png', '../service_media/', '2022-12-02 14:21:09', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `login_date` varchar(100) DEFAULT NULL,
  `session_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `login_date`, `session_id`) VALUES
('admin', '$2y$10$YXf7yycnCQXYX8RLALXy/ukHzNLjH75d5u5xbE3jc62YHcDWgKoAa', NULL, '2022-12-02 15:20:32'),
('user1', '$2y$10$YXf7yycnCQXYX8RLALXy/ukHzNLjH75d5u5xbE3jc62YHcDWgKoAa', NULL, '2022-12-02 15:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_extension` varchar(20) DEFAULT NULL,
  `file_directory` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `file_name`, `file_extension`, `file_directory`, `date_added`) VALUES
(20, 'QEQWREWERWERWEREW', 'video_media_70506567e290e1f22d276250e2297450.webm', 'webm', '../gallery_media/', '2022-11-30 01:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `session_visit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `session_visit`) VALUES
(1, '$2y$10$vGZ65DrgibC3lDTtb.vgae39jmiOknpHBzLdcUohXUwQvPRiUNgSm'),
(2, '$2y$10$uHeamOgJGj3d7pDVCn2UIu9hVaAMPP2lkX6ngbwiknid3qLBwBnHe'),
(3, '$2y$10$tvyL6er/ja2XbrtWyIqreO0M2G9Rz3rdhIevDjYPgsheEEniVkyk.'),
(4, '$2y$10$XiFT4h4O66t/OLQf4t2aqecMB2qILxcw2LupW0AhQfJgym5jsjBd.'),
(5, '$2y$10$lLY0dg9oCPkrqF9XNaNtiO2j1g9oZ7z5ium7VRznEkWGkgcvNLAB.'),
(6, '$2y$10$QH75bcwXBc1kqk2TNzyPB.yrICsOkXa6TqWZlrt7pJJQMbK5q.9Re'),
(7, '$2y$10$vEuX6SRpFaXfX5NFatq7W.adudmVFmm03piHGeLS2FsxaHh9GTmnW'),
(8, '$2y$10$7dl2eXW1npUqV/FIIvFieuYbEi2FtS1ZQog3d2y2vkqK289pWg4Fe'),
(9, '$2y$10$t9bTFi3yYKVy0k9wQMY57OPUIBRqXKemij8PovCC7pc0LA7P5NO3G'),
(10, '$2y$10$EYXI4rwz74fBsdywKW8gDehEtX6EaiQNHVcnfiU6dJoK1dqfBIF7O'),
(11, '$2y$10$ok8.hRpLuyMWVsY90QjbnuBUk6oNGmSUtTbZAEVnveb3qD2FDGBm2'),
(12, '$2y$10$rVpIc34u5WLUAroJqRBqgOkhATfg6qhemy1bKfyNHIKOtPrQ4S/1i'),
(13, '$2y$10$EvTwwP5U40FafsYKiBnr5O5rGOCigo9Fh7ctMHGs9jGn.ZvIU7Ef2'),
(14, '$2y$10$q3OoGcJguYo8J3EqTl.HguP.oyaMYJQGApdaerQ1m88HUgad1AP4m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_media`
--
ALTER TABLE `services_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `services_media`
--
ALTER TABLE `services_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
