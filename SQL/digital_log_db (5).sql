-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 03:07 AM
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
-- Database: `digital_log_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `mname`, `lname`, `email`, `contact`, `street`, `city`, `province`, `position`, `gender`, `photo`, `password`, `created_at`) VALUES
(1, 'Mark Rod', '', 'Cadayong', 'admin@gmail.com', 'admin', 'Lilimasan', 'San Carlos', 'Pangasinan', 'admin', 'Male', 'anime_1663347499.jpg', '$2y$10$2Iel97KcchoPHeoAXMVjNecIMt3rVihd8trseaEfQhM6gO8wsKRe6', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(50) NOT NULL,
  `months` int(50) NOT NULL,
  `year` int(50) NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL,
  `student_qrcode` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`, `student_id`, `date`, `day`, `months`, `year`, `time_in`, `status`, `time_out`, `num_hr`, `student_qrcode`, `location`, `lat`, `long`) VALUES
(87, '', 1, '2022-08-24', '24', 8, 0, '15:38:16', 1, '15:38:39', 0, 0, '', '', ''),
(88, '', 93, '2022-08-24', '24', 8, 0, '17:27:26', 0, '17:27:56', 0.16666666666667, 0, '', '', ''),
(89, '', 93, '2022-08-24', '24', 8, 0, '18:47:55', 0, '18:49:13', 1.5, 0, '', '', ''),
(90, '', 1, '2022-08-31', '31', 8, 0, '04:38:10', 0, '00:00:00', 0, 0, '', '', ''),
(93, '', 1, '2022-08-23', '23', 8, 0, '14:38:56', 0, '14:39:05', 0, 0, '', '', ''),
(94, '', 101, '2022-09-17', '17', 9, 0, '22:33:26', 1, '00:00:00', 0, 0, '', '', ''),
(95, '', 102, '2022-09-18', '18', 9, 0, '10:47:43', 0, '00:00:00', 0, 102, '', '', ''),
(96, '', 101, '2022-09-18', '18', 9, 0, '10:50:21', 0, '10:50:35', 0, 0, '', '', ''),
(124, '', 0, '2022-09-22', '22', 9, 0, '01:02:07', 0, '01:02:17', 0, 101, '', '', ''),
(125, '', 1, '2022-09-25', '25', 9, 0, '10:58:11', 0, '10:58:17', 3.15, 0, '', '', ''),
(127, '', 1, '2022-09-26', '36', 9, 0, '11:46:24', 0, '11:46:27', 3.95, 0, '', '', ''),
(133, '', 101, '2022-09-27', '27', 9, 0, '23:48:41', 0, '11:46:27', 0, 101, 'Tarece, road, undefined 2420, Philippines', '', ''),
(134, '', 101, '2022-10-16', '16', 10, 0, '23:29:29', 0, '11:46:27', 0, 101, 'Tarece, road, undefined 2420, Philippines', '', ''),
(135, '', 114, '2022-11-24', '24', 11, 2022, '01:58:26', 1, '23:47:37', 14.983333333333, 114, 'Longos, road, undefined 2420, Philippines', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `position`, `time_in`, `time_out`) VALUES
(1, 'Junior', '07:48:00', '07:49:00'),
(2, 'Senior', '08:17:00', '17:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(13, 'defense', 'Wala kami pake', '2022-11-03 07:41:00', '2022-11-03 17:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `qrcode` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `photo`, `qrcode`, `fname`, `mname`, `lname`, `email`, `contact`, `street`, `city`, `province`, `position`, `gender`, `password`, `schedule_id`, `created_at`) VALUES
(114, '19-SC-0422', 'admin.png', 'ZBrlbd1Q', 'Mark Rod', 'P', 'Cadayong', 'markrodcadayong@gmail.com', '90909043242342', 'Lilimasan', 'San Carlos', 'Pangasinan', 'Student', 'male', '$2y$10$4FvYB/yRH9tDrT3kQeXLYuDpMqMU4GMMx71/vDseapcWwIz9xaxiO', 0, '2022-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fname`, `mname`, `lname`, `email`, `contact`, `street`, `city`, `province`, `position`, `gender`, `photo`, `password`, `created_at`) VALUES
(41, 'Mark Rod', 'Peralta', 'Cadayong', 'mark@gmail.com', '09254318814', '', '', '', 'Teacher I', 'male', '283688330_2808371559296026_4938857122050425064_n.jpg', '$2y$10$i18BNhADByvda3vOimn6LepH9p6ukC6GwjI4rg19yfEU7qOIi2UoO', '2022-11-02 17:57:07'),
(42, 'dasds', 'sadsad', 'sadas', 'asdsad@gmail.com', '009098989', '', '', '', 'teacher 2', 'male', 'admin.png.jpg', '$2y$10$Cm08SoUVsk/pKxxDH1GoZ.LW3t6ZmHGyd2pAqBmStDNREniN01.ei', '2022-11-01 12:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`) VALUES
(26, 'Jane Doe', 'jane@doe.com'),
(27, 'Joe Doe', 'joe@doe.com'),
(28, 'John Doe', 'john@doe.com'),
(29, 'Julie Doe', 'julie@doe.com'),
(30, 'Johan Doe', 'johan@doe.com'),
(31, 'Joanne Doe', 'joanne@doe.com'),
(32, 'Juliet Doe', 'juliet@doe.com'),
(33, 'June Doe', 'june@doe.com'),
(34, 'Juan Doe', 'juan@doe.com'),
(35, 'Jamir Doe', 'jamir@doe.com'),
(36, 'Jaden Doe', 'jaden@doe.com'),
(37, 'James Doe', 'james@doe.com'),
(38, 'Janus Doe', 'janus@doe.com'),
(39, 'Jason Doe', 'jason@doe.com'),
(40, 'Jay Doe', 'jay@doe.com'),
(41, 'Jeff Doe', 'jeff@doe.com'),
(42, 'Jenn Doe', 'jenn@doe.com'),
(43, 'Joah Doe', 'joah@doe.com'),
(44, 'Joyce Doe', 'joyce@doe.com'),
(45, 'Joy Doe', 'joy@doe.com'),
(46, 'Juke Doe', 'juke@doe.com'),
(47, 'Johnnie Doe', 'johnnie@doe.com'),
(48, 'Jim Doe', 'jim@doe.com'),
(49, 'Jess Doe', 'jess@doe.com'),
(50, 'Jabril Doe', 'jabril@doe.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
