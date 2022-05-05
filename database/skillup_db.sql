-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2021 at 12:50 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_level`
--

CREATE TABLE `assign_level` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_level`
--

INSERT INTO `assign_level` (`id`, `student_id`, `level`) VALUES
(41, 25, 'Elementary'),
(43, 19, 'Intermediate'),
(44, 22, 'Advance');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `class_id`, `class`, `student_name`, `student_id`, `level`, `attendance`, `teacher_name`, `status`) VALUES
(49, 14, 'April Merrill', 'linkhantko', 19, 'Intermediate', 'Present', 'Tarik Mason', 'Checked'),
(54, 12, 'Sebastian Randall', 'linkhantko', 19, 'Intermediate', 'Absent', 'Tarik Mason', 'Checked'),
(60, 5, 'Jade Howard', 'lkk', 22, 'Elementary', 'Absent', 'Tarik Mason', 'Checked'),
(63, 17, 'Listening', 'lkk', 22, 'Advance', 'Present', 'Lin Khant Ko', 'Checked');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `assign_level` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `course`, `description`, `teacher_name`, `assign_level`, `date`, `time`) VALUES
(5, 'Jade Howard', 'Alma Johnston', 'Veritatis elit culp', 'Tarik Mason', 'Elementary', '2004-08-21', '22:04'),
(8, 'Bruce Houston', 'Alma Johnston', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque maiores accusantium facere impedit itaque consequuntur dicta, ipsam aperiam deserunt! Vel consectetur minima blanditiis atque eos amet aperiam sunt odio dolor.', 'KhinNi', 'Elementary', '1984-12-14', '21:12'),
(9, 'Hi', 'Mannix Vazquez', 'lorem', 'KhinNi', 'Intermediate', '2021-12-11', '11:00'),
(10, 'Aileen Burns', 'Mannix Vazquez', 'Velit fugiat iste ', 'Tarik Mason', 'Elementary', '2021-11-26', '09:12'),
(12, 'Sebastian Randall', 'Mannix Vazquez', 'Exercitationem repre', 'Tarik Mason', 'Intermediate', '1998-10-22', '01:19'),
(16, 'Speaking', 'Alma Johnston', 'hi', 'David', 'Advance', '2021-11-30', ''),
(17, 'Listening', 'Alma Johnston', 'hi', 'Lin Khant Ko', 'Advance', '2021-11-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coursename`, `description`) VALUES
(2, 'Mannix Vazquez', 'Iusto amet sunt ani'),
(4, 'Alma Johnston', 'Ea voluptate quasi e');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `description`) VALUES
(6, 'Elementary', ''),
(7, 'Intermediate', ''),
(8, 'Advance', '');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `pointname` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `prize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `pointname`, `amount`, `prize`) VALUES
(3, 'Irma Mason', 10, 100),
(5, 'Cairo Hurley', 33, 28),
(6, 'Freya Green', 45, 54),
(7, 'Tyler Palmer', 68, 84),
(8, 'Vernon Grant', 71, 96),
(9, 'Cara Pearson', 52, 55);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Studnent');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `q_check` varchar(255) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `f_name`, `l_name`, `username`, `email`, `password`, `phone`, `photo`, `address`, `gender`, `status`, `q_check`, `point`) VALUES
(19, 'Lin Khant', 'Ko', 'linkhantko', 'linkhantko1@gmail.com', '123', '09798165400', '../admin/images/images.jpg', 'Singapore', 'Male', 'Active', 'Checked', 170),
(21, 'Mohammad', 'Colby Stevens', 'khaing', 'qufedony@mailinator.com', '123', '+1 (689) 522-6652', '../admin/images/images.jpg', 'Sapiente qui qui ut ', 'Female', 'Active', 'Checked', 42),
(22, 'Alika', 'Fletcher Dean', 'lkk', 'rihuci@mailinator.com', '123', '+1 (122) 939-8621', '../admin/images/images.jpg', 'Quis rerum reprehend', 'Female', 'Active', 'Checked', 9),
(25, 'Xyla', 'Cassidy Branch', 'gysob', 'vihuh@mailinator.com', '123', '+1 (442) 675-1149', '../admin/images/images.jpg', 'Magna similique exce', 'Female', 'Active', 'Checked', 51);

-- --------------------------------------------------------

--
-- Table structure for table `student_quiz`
--

CREATE TABLE `student_quiz` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ans1` varchar(255) NOT NULL,
  `ans2` varchar(255) NOT NULL,
  `ans3` varchar(255) NOT NULL,
  `ans4` varchar(255) NOT NULL,
  `ans5` varchar(255) NOT NULL,
  `ans6` varchar(255) NOT NULL,
  `ans7` varchar(255) NOT NULL,
  `ans8` varchar(255) NOT NULL,
  `ans9` varchar(255) NOT NULL,
  `ans10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_quiz`
--

INSERT INTO `student_quiz` (`id`, `student_id`, `ans1`, `ans2`, `ans3`, `ans4`, `ans5`, `ans6`, `ans7`, `ans8`, `ans9`, `ans10`) VALUES
(7, 19, 'Wrong', 'Right', 'Right', 'Right', 'Right', 'Wrong', 'Right', 'Right', 'Right', 'Right'),
(10, 21, 'Right', 'Wrong', 'Right', 'Right', 'Right', 'Wrong', 'Right', 'Right', 'Right', 'Right'),
(12, 22, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Right', 'Wrong'),
(13, 25, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `roles_id` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `gender`, `photo`, `roles_id`, `role_name`) VALUES
(1, 'Admin', 'admin@gmail.com', '123', '09798165400', 'World', 'Male', 'images/images.jpg', '1', 'Admin'),
(6, 'KhinNi', 'knk1@gmail.com', '123', '09791996208', '41 street', 'Female', 'images/Screenshot (12).png', '2', 'Teacher'),
(7, 'Lin Khant Ko', 'linkhantko1@gmail.com', '123', '9798165400', '41 street', 'Male', 'images/Screenshot (12).png', '2', 'Teacher'),
(8, 'Mufutau Bailey', 'qaqinaf@mailinator.com', 'Pa$$w0rd!', '+1 (681) 959-5801', 'Libero et voluptatem', 'Female', 'images/images.jpg', '2', 'Teacher'),
(9, 'Tarik Mason', 'bozeqole@mailinator.com', 'Pa$$w0rd!', '+1 (518) 344-2053', 'Est aut ratione solu', 'Female', 'images/images (1).jpg', '2', 'Teacher'),
(14, 'David', 'david@gmai.com', '123', '098882734', 'no 31', 'Male', 'images/Download Gradient blurred Blue abstract background for free.jpeg', '2', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_level`
--
ALTER TABLE `assign_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_quiz`
--
ALTER TABLE `student_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_level`
--
ALTER TABLE `assign_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_quiz`
--
ALTER TABLE `student_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
