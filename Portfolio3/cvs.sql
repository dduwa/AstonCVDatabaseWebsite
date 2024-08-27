-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 05:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astoncv`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyprogramming` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `URLlinks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `name`, `email`, `password`, `keyprogramming`, `profile`, `education`, `URLlinks`) VALUES
(1, 'Duwa Khan', 'DuwaK@hotmail.com', '$2y$10$qYKkEqD8N.GYJrtbs1eQUO74XXwdlt/yfJUSCeL2JA8tsGMKZrlLq', 'Java', 'Great at Teamwork and skilled in various Java IDEs such as Eclipse and Processing', 'Currently Studying Computer Science at Aston University.', 'https://github.com/duwa'),
(2, 'Sarah Green', 'SarahGreen@aston.ac.uk', '$2y$10$dAQ3ZJpCkGp6GAXz.97W7euoFTlFXGRQ/oGrSb3mPr6gL7W8Zm.Wa', 'PHP', 'Inquisitive, energetic computer science specialist skilled in leadership, with a strong foundation in maths, logic, and cross-platform coding. ', 'Currently Studying Computer Science at Aston University.', 'https://github.com/sarahg'),
(3, 'José S', 'JoseS@gmail.com', '$2y$10$L7ttTCip73JMDqRIey.pDekIoze91MmIwTrBBbwElwDwEthm3Ckkm', 'Java', 'Led trace team for implementing the use of Extended Events on SQL Server.', 'Currently Studying Computer Science at Aston University.', 'https://github.com/joses'),
(4, 'Kiersten Odell', 'KierstenO@gmail.com', '$2y$10$eRhpn.PuGxgZAvT7RYPxT.mPOkB/XenrqIA8QqEyT1/lEQ3Yle1RC', 'Python', 'Created a working T-shirt sales website with PHP, JavaScript, HTML, CSS, and MailChimp. Built and maintained a working customer database, order system, and picking and packing system with MySQL, complete with error handling and data validation.', 'Currently Studying Computer Science at Aston University.', 'https://github.com/kiersteno'),
(5, 'Ryan Smith', 'ryans@hotmail.com', '$2y$10$RxFHmVL665X7C/xwApSjbOLl6Dq9280nYa/8JEy1mjDAfOptuCQtu', 'JavaScript', 'Updated mobile site for WannaBeRichRich.com to meet new Google mobile first quality standards.', 'Currently Studying Computer Science at Aston University.', 'https://github.com/rryan'),
(6, 'Noor Talib', 'noort@aston.ac.uk', '$2y$10$9Qhfc3nkhcblLOxWWz9EKuZHwHf.sE.PseqOh8mvPC229tAedWkQS', 'MySQL', 'Excellent Mentor.', 'Currently Studying Computer Science at Aston University.', 'https://github.com/nooor'),
(7, 'Shawna Mills', 'ShawnaM@aston.ac.uk', '$2y$10$HvHJxq.N16Rps8bKzOnpH..CRiG6nNCf64B6Lsk/Kf8WpNirlPnfy', 'SQL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel metus nulla. Duis mattis semper semper. Ut ultricies porttitor massa, id rutrum libero ornare nec. Vestibulum nec leo non ligula malesuada auctor. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel metus nulla. Duis mattis semper semper. Ut ultricies porttitor massa, id rutrum libero ornare nec. Vestibulum nec leo non ligula malesuada auctor. ', 'https://github.com/shawnamills');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
