-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2024 at 04:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `option_number` int(11) DEFAULT NULL,
  `option_content` varchar(200) NOT NULL,
  `correct_option` int(11) DEFAULT 0,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_number`, `option_content`, `correct_option`, `question_id`) VALUES
(14, 1, 'Personal home page', 0, 11),
(15, 2, 'hypertext preprocessor', 1, 11),
(16, 3, 'process hash provide', 0, 11),
(17, 4, 'print homeless people', 0, 11),
(18, 1, 'Django rest framework', 1, 12),
(19, 2, 'django resting framework', 0, 12),
(20, 3, 'dick referee front', 0, 12),
(21, 4, 'I do not know', 0, 12),
(22, 1, 'A programming language', 0, 13),
(23, 2, 'A web framework', 1, 13),
(24, 3, 'An operating system', 0, 13),
(25, 4, 'A database management system', 0, 13),
(26, 1, 'Jinja', 1, 14),
(27, 2, 'Mako', 0, 14),
(28, 3, 'Django Templates', 0, 14),
(29, 4, 'Django HTML', 0, 14),
(30, 1, 'To define database schema', 0, 15),
(31, 2, 'To query the database using Python', 1, 15),
(32, 3, 'To handle HTTP requests', 0, 15),
(33, 4, 'To create user interfaces', 0, 15),
(34, 1, 'To provide security for user data', 1, 16),
(35, 2, 'To optimize database queries', 0, 16),
(36, 3, 'To handle HTTP requests', 0, 16),
(37, 4, 'To create user interfaces', 0, 16),
(38, 1, 'CharField', 0, 17),
(39, 2, 'TextField', 0, 17),
(40, 3, 'StringField', 1, 17),
(41, 4, 'IntegerField', 0, 17),
(42, 1, 'Model, Template, View', 1, 18),
(43, 2, ' Model, Template, Variable', 0, 18),
(44, 3, 'Model, Template, Validation', 0, 18),
(45, 4, 'Model, Test, View', 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `quiz_id`) VALUES
(11, 'What is the meaning of PHP?', 3),
(12, 'What is DRF?', 3),
(13, 'What is Django?', 5),
(14, 'Which of the following is NOT a Django template engine?', 5),
(15, 'What is the purpose of Django\'s ORM (Object-Relational Mapping)?', 5),
(16, 'What is the purpose of Django\'s built-in authentication system?', 5),
(17, 'Which of the following is NOT a Django Model field type?', 5),
(18, 'What does Django\'s \"MTV\" stand for in its design pattern?', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Quiz`
--

CREATE TABLE `Quiz` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `duration` int(11) NOT NULL,
  `number_of_questions` int(11) DEFAULT 0,
  `number_of_enteries` int(11) DEFAULT 0,
  `number_of_passes` int(11) DEFAULT 0,
  `number_of_fails` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT curtime(),
  `creator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Quiz`
--

INSERT INTO `Quiz` (`id`, `title`, `duration`, `number_of_questions`, `number_of_enteries`, `number_of_passes`, `number_of_fails`, `created_at`, `creator_id`) VALUES
(3, 'Programming  ', 5, 2, 0, 0, 0, '2024-03-02 07:11:25', 3),
(5, 'Test Your Django Knowledge!', 10, 6, 5, 1, 4, '2024-03-05 04:50:52', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Result`
--

CREATE TABLE `Result` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentEntry`
--

CREATE TABLE `studentEntry` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `correct_option` varchar(200) NOT NULL,
  `student_pick` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime(),
  `is_admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `pwd`, `created_at`, `is_admin`) VALUES
(1, 'Ayodeji', 'Adesola', 'tpg', 'adesolaayodeji53@gmail.com', 'tpg12', '2024-03-02 01:00:14', 1),
(3, 'Pablo', 'Tutsi', 'pablo', 'pablotutsi@gmail.com', '$2y$12$BOBO0Xq3nrjxll6K4LMRNulAicZheyYKKHfraSHxMAqxqFouurPVC', '2024-03-02 04:41:15', 1),
(4, 'Solomon', 'Tutsi', 'ayo', 'adesolaayodeji18@gmail.com', '$2y$12$kmquuUJmyFrNIrizPUltmeu/tRDTztPkKduDJrYTAbB7gVqfGoiuy', '2024-03-03 11:45:15', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `Quiz`
--
ALTER TABLE `Quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `Result`
--
ALTER TABLE `Result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `studentEntry`
--
ALTER TABLE `studentEntry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Quiz`
--
ALTER TABLE `Quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Result`
--
ALTER TABLE `Result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studentEntry`
--
ALTER TABLE `studentEntry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `Quiz` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Quiz`
--
ALTER TABLE `Quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `Result`
--
ALTER TABLE `Result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `Quiz` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studentEntry`
--
ALTER TABLE `studentEntry`
  ADD CONSTRAINT `studententry_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `Quiz` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studententry_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
