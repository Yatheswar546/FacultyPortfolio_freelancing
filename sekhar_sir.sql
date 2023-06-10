-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 03:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekhar_sir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'sekhar@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `eventimages`
--

CREATE TABLE `eventimages` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventimages`
--

INSERT INTO `eventimages` (`id`, `title`, `images`) VALUES
(2, 'Hour Of Code 2021', '49377e094c716e635beaad1f3838b2d5.jpg,4c43cf5f6ce723297fa22bcab8493dab.jpg'),
(3, 'WEB HACK', '26a1982606b86271170759a7ce0d942b.jpg,f3bf5e4ebaf7e1b65a25252566b3bbf2.jpg'),
(5, 'Roadmap to DSA and Introduction to Competitive Programming', 'c20593d3a09cb153df3461dc401c3386.png,9e01f37a30bf7c663c814dae9087efe9.png');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `title`, `image`) VALUES
(1, 'ACM 2', 0x33396266323732643837393838366465353230626333633335633731616630302e6a7067),
(2, 'ACM', 0x66623333393536633933373034633935343036363463333362316233383565372e6a7067),
(3, 'ACM', 0x32366361346564663334363634663336343130643766353036313164396433322e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `postedat` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `category` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `projectid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentactivities`
--

CREATE TABLE `studentactivities` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `mainimage` text DEFAULT NULL,
  `createdat` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentactivities`
--

INSERT INTO `studentactivities` (`id`, `title`, `description`, `mainimage`, `createdat`) VALUES
(1, 'Hour Of Code 2021', '<ul><li><strong>MODE: Offline &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;EVENT START\'s ON: 10 Dec, 2021 01:30 PM IST &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;EVENT END\'s ON: 11 Dec, 2021 03:30 PM IST</strong></li></ul><p>&nbsp;</p><p><strong>The demand for relevant computer science education crosses all borders and knows no boundaries. Every 21st-century student have the opportunity to learn how to create technology.</strong><br><br><strong>The Hour of Code is a global movement introducing tens of millions of students worldwide to computer science, inspiring kids to learn more, breaking stereotypes, and leaving them feeling empowered.</strong><br><br><strong>It\'s a computer science initiative that creates a fun and creative environment for students to be introduced to the concepts of computer programming. It even raises the bar even further by inspiring students to discover new ways of thinking and expressing themselves through technology.</strong></p>', 'e43dacd1c7912154d59a659865398c0c.png', '2021-12-10'),
(4, 'WEB HACK', '<ul><li><strong>IDEA PHASE: OFFLINE</strong></li><li><strong>REGISTRATION STARTS ON: September 08, 2021 12:00 PM IST</strong></li><li><strong>REGISTRATION ENDS ON: September 12, 2021 04:00 PM IST</strong></li><li><strong>EVENT: visakhapatnam</strong></li><li><strong>EVENT STARTS ON: September 14, 2021 09:00 AM IST</strong></li><li><strong>EVENT ENDS ON: September 15, 2021 02:00 PM IST</strong></li></ul><p><strong>Webhack 2021 is a college level initiative to provide students a platform to solve some of the UI problems thus inculcate a culture of product innovation and a mindset of problem-solving.</strong></p>', '2afb4c7b617c398f364fe2ba78ddbf84.jpeg', '2023-06-01'),
(5, 'Roadmap to DSA and Introduction to Competitive Programming', '<p><strong>Give your career a head-start and know how you can get closer to your dream job by refining your coding skills. Coding Ninjas in collaboration with Vignan\'s IIT ACM Student Chapter brings you an exclusive webinar on Roadmap to DSA and Introduction to Competitive Programming .</strong></p>', 'da4d85666b9c43c3c9b0fa4b8ac39023.jpeg', '2023-06-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventimages`
--
ALTER TABLE `eventimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentactivities`
--
ALTER TABLE `studentactivities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eventimages`
--
ALTER TABLE `eventimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentactivities`
--
ALTER TABLE `studentactivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
