-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 06:01 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cell`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_Id` int(11) NOT NULL,
  `ad_name` varchar(30) DEFAULT NULL,
  `ad_username` varchar(20) DEFAULT NULL,
  `ad_password` varchar(20) DEFAULT NULL,
  `ad_email` text DEFAULT NULL,
  `ad_type` varchar(20) NOT NULL DEFAULT 'admin',
  `ad_pic` text DEFAULT NULL,
  `ad_status` varchar(20) NOT NULL DEFAULT 'y',
  `ad_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_Id`, `ad_name`, `ad_username`, `ad_password`, `ad_email`, `ad_type`, `ad_pic`, `ad_status`, `ad_date`) VALUES
(1, 'Muhammad Haaris Syed', 'syedhaaris97', 'root', 'syedhaaris97@gmail.com', 'admin', NULL, 'y', '2020-04-08 13:13:44'),
(2, 'Ali Gohar', 'gohar', 'root', 'gohar@gmail.com', 'admin', NULL, 'y', '2020-04-14 15:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(11) NOT NULL,
  `fb_userId` int(11) NOT NULL,
  `fb_formId` int(11) NOT NULL,
  `fb_questionId` int(11) NOT NULL,
  `fb_ans` text DEFAULT NULL,
  `fd_reviewq` text DEFAULT NULL,
  `fb_status` varchar(20) NOT NULL DEFAULT 'y',
  `fb_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fb_id`, `fb_userId`, `fb_formId`, `fb_questionId`, `fb_ans`, `fd_reviewq`, `fb_status`, `fb_date`) VALUES
(1, 1, 1, 1, '1', NULL, 'y', '2020-04-06 17:33:09'),
(2, 1, 1, 2, '4', NULL, 'y', '2020-04-06 17:33:09'),
(3, 1, 1, 2, '5', NULL, 'y', '2020-04-06 17:33:09'),
(4, 1, 1, 3, '7', NULL, 'y', '2020-04-06 17:33:09'),
(5, 1, 1, 4, NULL, 'Its good, free data\r\nmake you coverage increase', 'y', '2020-04-06 17:33:09'),
(7, 2, 3, 8, '19', NULL, 'y', '2020-04-07 11:20:25'),
(8, 2, 3, 8, '20', NULL, 'y', '2020-04-07 11:20:25'),
(9, 2, 3, 9, NULL, 'All of this going is good.', 'y', '2020-04-07 11:20:26'),
(10, 3, 4, 11, '22', NULL, 'y', '2020-04-09 15:14:39'),
(11, 3, 4, 12, '24', NULL, 'y', '2020-04-09 15:14:39'),
(12, 3, 4, 12, '25', NULL, 'y', '2020-04-09 15:14:39'),
(13, 3, 4, 13, NULL, 'It super and brilliant', 'y', '2020-04-09 15:14:39'),
(14, 4, 2, 5, '11', NULL, 'y', '2020-04-09 15:17:36'),
(15, 4, 2, 6, '14', NULL, 'y', '2020-04-09 15:17:36'),
(16, 4, 2, 10, NULL, 'Survey is not clear ', 'y', '2020-04-09 15:17:36'),
(17, 5, 4, 11, '22', NULL, 'y', '2020-04-09 15:19:37'),
(18, 5, 4, 12, '24', NULL, 'y', '2020-04-09 15:19:37'),
(19, 5, 4, 12, '25', NULL, 'y', '2020-04-09 15:19:37'),
(20, 5, 4, 12, '26', NULL, 'y', '2020-04-09 15:19:37'),
(21, 5, 4, 13, NULL, 'Its brilliant ', 'y', '2020-04-09 15:19:38'),
(22, 6, 4, 11, '22', NULL, 'y', '2020-04-09 15:22:39'),
(23, 6, 4, 12, '24', NULL, 'y', '2020-04-09 15:22:39'),
(24, 6, 4, 12, '25', NULL, 'y', '2020-04-09 15:22:39'),
(25, 6, 4, 13, NULL, 'its good for today situations', 'y', '2020-04-09 15:22:39'),
(26, 7, 4, 11, '22', NULL, 'y', '2020-04-09 15:24:37'),
(27, 7, 4, 12, '24', NULL, 'y', '2020-04-09 15:24:37'),
(28, 7, 4, 12, '25', NULL, 'y', '2020-04-09 15:24:37'),
(29, 7, 4, 13, NULL, 'Biriliant', 'y', '2020-04-09 15:24:37'),
(30, 8, 3, 7, '18', NULL, 'y', '2020-04-14 16:28:23'),
(31, 8, 3, 8, '19', NULL, 'y', '2020-04-14 16:28:23'),
(32, 8, 3, 8, '20', NULL, 'y', '2020-04-14 16:28:24'),
(33, 8, 3, 9, NULL, 'Good', 'y', '2020-04-14 16:28:24'),
(34, 9, 3, 7, '16', NULL, 'y', '2020-04-14 16:44:44'),
(35, 9, 3, 8, '20', NULL, 'y', '2020-04-14 16:44:44'),
(36, 9, 3, 8, '21', NULL, 'y', '2020-04-14 16:44:44'),
(37, 9, 3, 9, NULL, 'excellent', 'y', '2020-04-14 16:44:44'),
(38, 10, 3, 7, '18', NULL, 'y', '2020-04-15 10:39:22'),
(39, 10, 3, 8, '19', NULL, 'y', '2020-04-15 10:39:22'),
(40, 10, 3, 8, '21', NULL, 'y', '2020-04-15 10:39:22'),
(41, 10, 3, 9, NULL, 'excellent', 'y', '2020-04-15 10:39:22'),
(42, 8, 1, 1, '1', NULL, 'y', '2020-04-15 15:46:36'),
(43, 8, 1, 2, '5', NULL, 'y', '2020-04-15 15:46:36'),
(44, 8, 1, 2, '6', NULL, 'y', '2020-04-15 15:46:36'),
(45, 8, 1, 3, '8', NULL, 'y', '2020-04-15 15:46:36'),
(46, 8, 1, 4, NULL, 'lorem lorem lorem lorem lorem lorem lorem lorem lorem ', 'y', '2020-04-15 15:46:36'),
(47, 11, 1, 1, '1', NULL, 'y', '2020-04-15 16:07:57'),
(48, 11, 1, 2, '4', NULL, 'y', '2020-04-15 16:07:57'),
(49, 11, 1, 2, '6', NULL, 'y', '2020-04-15 16:07:57'),
(50, 11, 1, 3, '7', NULL, 'y', '2020-04-15 16:07:58'),
(51, 11, 1, 4, NULL, 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem ', 'y', '2020-04-15 16:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `formId` int(11) NOT NULL,
  `formTitle` text NOT NULL,
  `formStatus` varchar(20) NOT NULL DEFAULT 'y',
  `formDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`formId`, `formTitle`, `formStatus`, `formDate`) VALUES
(1, 'Daily Package Bundle feedback ', 'y', '2020-04-02 13:22:10'),
(2, 'Weekly Package Question', 'y', '2020-04-02 18:06:58'),
(3, 'Daily SMS Package', 'y', '2020-04-03 09:40:48'),
(4, 'Work From home Internet Package', 'y', '2020-04-09 15:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `formquestion`
--

CREATE TABLE `formquestion` (
  `formQuestionId` int(11) NOT NULL,
  `formId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `formQuestionTitle` text NOT NULL,
  `formQuestionStatus` varchar(10) NOT NULL DEFAULT 'y',
  `formQuestionDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formquestion`
--

INSERT INTO `formquestion` (`formQuestionId`, `formId`, `questionId`, `formQuestionTitle`, `formQuestionStatus`, `formQuestionDate`) VALUES
(1, 1, 1, 'Do you finish all internet data in a day?', 'y', '2020-04-02 13:22:10'),
(2, 1, 2, 'In extra hour after validate, which facility you like most?', 'y', '2020-04-02 13:22:10'),
(3, 1, 3, 'How would you rate our daily package prices?', 'y', '2020-04-02 13:22:10'),
(4, 1, 4, 'What should we change in order to live up to your expectations?', 'y', '2020-04-02 13:22:10'),
(5, 2, 5, 'which app you most use?', 'y', '2020-04-02 18:06:58'),
(6, 2, 6, 'How many devices you have?', 'y', '2020-04-02 18:06:59'),
(7, 3, 7, 'Failure ', 'y', '2020-04-03 09:40:48'),
(8, 3, 8, 'Extra Features', 'y', '2020-04-03 09:40:49'),
(9, 3, 9, 'Open Review ', 'y', '2020-04-03 09:40:49'),
(10, 2, 10, 'Explain you view according to weekly service?', 'y', '2020-04-08 11:05:38'),
(11, 4, 11, 'Are you availing this package on work from home?', 'y', '2020-04-09 15:11:23'),
(12, 4, 12, 'what is the best thing of this package?', 'y', '2020-04-09 15:11:23'),
(13, 4, 13, 'What is your general view about this package? ', 'y', '2020-04-09 15:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `questionoptions`
--

CREATE TABLE `questionoptions` (
  `QOptionId` int(11) NOT NULL,
  `formQuestionId` int(11) NOT NULL,
  `QOptionTitle` text NOT NULL,
  `QOptionStatus` varchar(10) NOT NULL DEFAULT 'y',
  `QOptionDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionoptions`
--

INSERT INTO `questionoptions` (`QOptionId`, `formQuestionId`, `QOptionTitle`, `QOptionStatus`, `QOptionDate`) VALUES
(1, 1, 'Yes', 'y', '2020-04-02 13:22:10'),
(2, 1, 'Not Sure', 'y', '2020-04-02 13:22:10'),
(3, 1, 'No', 'y', '2020-04-02 13:22:10'),
(4, 2, 'Free WhatsApp', 'y', '2020-04-02 13:22:10'),
(5, 2, 'Free Facebook', 'y', '2020-04-02 13:22:10'),
(6, 2, 'Free Internet', 'y', '2020-04-02 13:22:10'),
(7, 3, 'Good', 'y', '2020-04-02 13:22:10'),
(8, 3, 'Fair', 'y', '2020-04-02 13:22:10'),
(9, 3, 'Poor', 'y', '2020-04-02 13:22:10'),
(10, 5, 'WhatsApp', 'y', '2020-04-02 18:06:59'),
(11, 5, 'Youtube', 'y', '2020-04-02 18:06:59'),
(12, 5, 'Messenger', 'y', '2020-04-02 18:06:59'),
(13, 6, 'Free WhatsApp', 'y', '2020-04-02 18:06:59'),
(14, 6, 'Free Facebook', 'y', '2020-04-02 18:06:59'),
(15, 6, 'Free Internet', 'y', '2020-04-02 18:06:59'),
(16, 7, 'After 5 ', 'y', '2020-04-03 09:40:49'),
(17, 7, 'After 15', 'y', '2020-04-03 09:40:49'),
(18, 7, 'No Failure', 'y', '2020-04-03 09:40:49'),
(19, 8, 'Free WhatsApp', 'y', '2020-04-03 09:40:49'),
(20, 8, 'Free Facebook', 'y', '2020-04-03 09:40:49'),
(21, 8, 'Free Internet', 'y', '2020-04-03 09:40:49'),
(22, 11, 'Yes', 'y', '2020-04-09 15:11:23'),
(23, 11, 'No', 'y', '2020-04-09 15:11:23'),
(24, 12, '10 GB data', 'y', '2020-04-09 15:11:23'),
(25, 12, 'Rs 100 Cost ', 'y', '2020-04-09 15:11:23'),
(26, 12, '1 week validation', 'y', '2020-04-09 15:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `formId` int(11) NOT NULL,
  `questionType` varchar(20) NOT NULL,
  `questionStatus` varchar(20) NOT NULL DEFAULT 'y',
  `questionDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `formId`, `questionType`, `questionStatus`, `questionDate`) VALUES
(1, 1, 'single', 'y', '2020-04-02 13:22:10'),
(2, 1, 'multi', 'y', '2020-04-02 13:22:10'),
(3, 1, 'single', 'y', '2020-04-02 13:22:10'),
(4, 1, 'open', 'y', '2020-04-02 13:22:10'),
(5, 2, 'single', 'y', '2020-04-02 18:06:58'),
(6, 2, 'multi', 'y', '2020-04-02 18:06:59'),
(7, 3, 'single', 'y', '2020-04-03 09:40:48'),
(8, 3, 'multi', 'y', '2020-04-03 09:40:49'),
(9, 3, 'open', 'y', '2020-04-03 09:40:49'),
(10, 2, 'open', 'y', '2020-04-08 11:05:38'),
(11, 4, 'single', 'y', '2020-04-09 15:11:23'),
(12, 4, 'multi', 'y', '2020-04-09 15:11:23'),
(13, 4, 'open', 'y', '2020-04-09 15:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `user_number` varchar(20) NOT NULL,
  `user_address` text DEFAULT NULL,
  `user_city` varchar(20) DEFAULT NULL,
  `lat` text DEFAULT NULL,
  `lon` text DEFAULT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'y',
  `user_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `username`, `password`, `user_number`, `user_address`, `user_city`, `lat`, `lon`, `user_status`, `user_date`) VALUES
(1, 'Haaris', 'syedhaaris97@gmail.com', NULL, NULL, '03113757136', 'House 122 Street AB orangabad', 'mirpurkhas', NULL, NULL, 'y', '2020-04-06 17:33:09'),
(2, 'Imran', 'Imran@gmail.com', NULL, NULL, '03113757136', 'House 122 Street AB orangabad', 'Karachi', '6.315298538330033', '81.91406250000001', 'y', '2020-04-07 11:20:25'),
(3, 'Sajid', 'sajid@gmail.com', NULL, NULL, '3123131231', 'House ABC street 1 Gulshan e Iqbal Block 2', 'Karachi', NULL, NULL, 'y', '2020-04-09 15:14:39'),
(4, 'Yahya', 'Yahya@live.com', NULL, NULL, '23123123', 'ABD Banglow, E6 Sector ', 'Islamabad', NULL, NULL, 'y', '2020-04-09 15:17:36'),
(5, 'Sadia', 'Sadia@gmail.com', NULL, NULL, '123131231', 'A8 Plat Near Empress Mall ', 'Lahore', NULL, NULL, 'y', '2020-04-09 15:19:37'),
(6, 'Danish', 'danish@gmail.com', NULL, NULL, '3123123123', '8888 Street Bangelo A5 Latifabad Unit 8 ', 'Hyderabad', NULL, NULL, 'y', '2020-04-09 15:22:39'),
(7, 'Dev', 'dev.dixit@ic.com', NULL, NULL, '91231231231', 'Banglo 77 Near Hyderabad Sweet', 'Karachi', NULL, NULL, 'y', '2020-04-09 15:24:36'),
(8, 'Ali', 'gohar@gmail.com', 'gohar', 'root', '1231312312', NULL, NULL, '25.519731837480425', '69.0113925933838', 'y', '2020-04-14 15:48:39'),
(9, 'wasif Ali', 'wasif@live.com', 'wasif', 'root', '23123122312', NULL, NULL, '31.479184040601236', '74.31701660156251', 'y', '2020-04-14 16:44:21'),
(10, 'saqib syed', 'saqib@gmail.com', 'saqib', 'root', '312321312311312', NULL, NULL, '24.72666215238004', '69.81064025312664', 'y', '2020-04-15 10:38:48'),
(11, 'Salaullah', 'sunny@gmail.com', NULL, NULL, '12313123', 'Hosue 912 Block 777 Sector 9 ', 'Karachi', NULL, NULL, 'y', '2020-04-15 16:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`formId`);

--
-- Indexes for table `formquestion`
--
ALTER TABLE `formquestion`
  ADD PRIMARY KEY (`formQuestionId`);

--
-- Indexes for table `questionoptions`
--
ALTER TABLE `questionoptions`
  ADD PRIMARY KEY (`QOptionId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `formId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formquestion`
--
ALTER TABLE `formquestion`
  MODIFY `formQuestionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questionoptions`
--
ALTER TABLE `questionoptions`
  MODIFY `QOptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
