-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 08:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `user_id` smallint(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Admin user';

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `email`, `password`, `fullname`, `created_at`, `level`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2021-06-05 09:06:32', 0),
(2, 'gva@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Văn A', '2021-06-05 12:27:36', 1),
(4, 'gvb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Văn B', '2021-06-05 18:44:28', 1),
(5, 'gvc@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Phạm Văn C', '2021-06-06 02:03:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` smallint(10) NOT NULL,
  `answer_description` text CHARACTER SET utf8 NOT NULL,
  `is_correct` smallint(2) DEFAULT NULL,
  `question_id` smallint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Answer';

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answer_description`, `is_correct`, `question_id`) VALUES
(41, '$$', 0, 10),
(42, '$', 1, 10),
(43, '@', 0, 10),
(44, '#', 0, 10),
(81, '1', 1, 14),
(82, '2', 0, 14),
(83, '3', 0, 14),
(84, '4', 0, 14),
(85, '1', 1, 15),
(86, '2', 0, 15),
(87, '3', 0, 15),
(88, '4', 0, 15),
(89, 'a', 1, 16),
(90, 'b', 0, 16),
(91, 'c', 0, 16),
(92, 'd', 0, 16),
(93, 'sdf', 0, 17),
(94, 'sdf', 0, 17),
(95, 'sdf', 1, 17),
(96, 'sdf', 0, 17),
(97, 'sdf', 1, 18),
(98, 'sdf', 0, 18),
(99, 'sdf', 0, 18),
(100, 'sdf', 0, 18),
(101, 'sdf', 0, 19),
(102, 'sdf', 0, 19),
(103, 'sdfsd', 1, 19),
(104, 'sdfsdf', 0, 19),
(105, 'sdf', 0, 20),
(106, 'sdf', 0, 20),
(107, 'sdf', 0, 20),
(108, 'sdfsdf', 1, 20),
(117, 'const', 1, 11),
(118, 'constant', 0, 11),
(119, 'defind', 0, 11),
(120, 'denf', 0, 11),
(121, 'none', 0, 9),
(122, 'null', 0, 9),
(123, 'undef', 1, 9),
(124, 'Không có khái niệm như vậy trong PHP', 1, 9),
(141, ' /* commented code here */', 0, 8),
(142, '// you are handsome', 0, 8),
(143, '# you are gay', 0, 8),
(144, 'Tất cả các ý trên', 1, 8),
(145, 'Mỹ', 0, 21),
(146, 'Pháp', 0, 21),
(147, 'VN', 1, 21),
(148, 'Úc', 0, 21),
(149, 'NNLT', 0, 22),
(150, 'Framework', 1, 22),
(151, 'Thư viện', 0, 22),
(152, 'Không là gì cả', 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `id` smallint(10) NOT NULL,
  `student_id` smallint(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` smallint(10) NOT NULL,
  `question_name` text CHARACTER SET utf8 NOT NULL,
  `is_multiple` smallint(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `user_id` smallint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Question';

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_name`, `is_multiple`, `created_at`, `image`, `video`, `level`, `user_id`) VALUES
(8, 'Đoạn mã nào sau đây được sử dụng để chú thích PHP', 0, '2021-06-05 18:24:44', '2021_05_27_16_17_191.png', '2021_05_27_16_17_19Screencast 2021-05-26 19_48_01.mp4', 2, 1),
(9, 'Mặc định của một biến không có giá trị được thể hiện với từ khóa', 1, '2021-06-05 18:24:46', '2021_05_26_20_24_04screenshot_4.png', NULL, 1, 1),
(10, 'Ký hiệu nào được dùng khi sử dụng biến trong PHP', 0, '2021-06-05 18:24:48', NULL, NULL, 2, 2),
(11, 'Hàm nào sau đây dùng để khai báo hằng số', 0, '2021-06-05 18:24:51', '2021_05_26_20_23_32screenshot_2.png', NULL, 3, 2),
(14, 'Javascript ra đời từ khi nào ?', 0, '2021-06-05 18:24:53', 'images/1.png', NULL, 3, 1),
(15, 'abc', 0, '2021-06-05 18:24:55', 'images/gn.png', NULL, 2, 2),
(16, 'Lập trình hướng đối tượng có mấy tính chất?', 0, '2021-06-05 18:24:58', 'images/screenshot_1.png', '', 1, 2),
(17, 'sdfsdf', 1, '2021-06-05 18:25:00', 'images/screenshot_3.png', '', 1, 1),
(18, 'sdfsdf', 0, '2021-06-05 18:25:03', 'images/screenshot_4.png', '', 1, 1),
(19, 'sdfsdf', 0, '2021-06-05 18:25:05', 'screenshot_3.png', NULL, 1, 2),
(20, 'sdfdsf', 0, '2021-06-05 18:25:08', '2021_05_26_20_14_01download (1).png', NULL, 1, 2),
(21, 'C/C++ xuất phát từ đâu ?', 0, '2021-06-05 18:46:02', '', '', 1, 4),
(22, 'Golang là gì ?', 0, '2021-06-06 02:05:47', '', '', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `question_mapping`
--

CREATE TABLE `question_mapping` (
  `mapping_id` smallint(10) UNSIGNED NOT NULL,
  `subject_id` smallint(10) NOT NULL,
  `question_id` smallint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_mapping`
--

INSERT INTO `question_mapping` (`mapping_id`, `subject_id`, `question_id`) VALUES
(40, 12, 9),
(41, 13, 14),
(42, 14, 9),
(43, 14, 8),
(44, 14, 10),
(45, 15, 8),
(46, 15, 10),
(47, 15, 15),
(59, 16, 8),
(60, 16, 9),
(61, 16, 10),
(70, 17, 8),
(71, 17, 9),
(72, 17, 16),
(73, 17, 17),
(74, 18, 9),
(75, 18, 8),
(76, 11, 8),
(77, 11, 9),
(78, 11, 10),
(79, 11, 11),
(80, 11, 14),
(81, 11, 15),
(82, 11, 16),
(83, 11, 17),
(84, 11, 18),
(85, 11, 19),
(86, 11, 20),
(87, 19, 21),
(88, 19, 9),
(89, 19, 8);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` smallint(10) NOT NULL,
  `subject_id` smallint(10) DEFAULT NULL,
  `student_id` smallint(10) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `subject_id`, `student_id`, `result`, `created_at`) VALUES
(19, 11, 1, '0/11', '2021-06-05 17:24:44'),
(20, 19, 4, '1/3', '2021-06-06 02:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `result_mapping`
--

CREATE TABLE `result_mapping` (
  `id` smallint(10) NOT NULL,
  `result_id` smallint(10) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `selected` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_mapping`
--

INSERT INTO `result_mapping` (`id`, `result_id`, `question_id`, `selected`) VALUES
(55, 20, 21, '147'),
(56, 20, 8, '141'),
(57, 20, 9, '122');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` smallint(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `fullname` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `birthday` date DEFAULT NULL,
  `card` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Student';

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `email`, `password`, `fullname`, `created_at`, `birthday`, `card`, `phone`, `class`, `status`) VALUES
(1, 'a@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn A', '2021-06-07 14:53:55', '2021-06-01', '123456789', '0898103236', 'CNT101', 0),
(2, 'b@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn B', '2021-06-07 14:54:02', '2021-06-01', '655344133', '0908552259', 'CNT102', 0),
(3, 'c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn C', '2021-06-07 14:54:05', '2021-05-15', '213131411', '0898103236', 'CNT101', 0),
(4, 'd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn D', '2021-06-07 14:54:09', '2021-03-06', '947284728', '0872788718', 'CNT103', 0),
(5, 'e@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn E', '2021-06-07 14:59:35', '2021-06-08', '1213193819', '0192081201', 'CNT104', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` smallint(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `theme_id` smallint(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pass` text DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `user_id` smallint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Subject';

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `description`, `level`, `theme_id`, `created_at`, `pass`, `time`, `user_id`) VALUES
(11, 'Đề thi PHP số 1', 'Đây là mô tả của đề thi PHP số 1', 2, 8, '2021-06-05 18:26:09', '$2y$10$P.Cm5VSQCEtzTZAszbOBBuRehH1QaplP9WEplSlWKYT9hlH48aNNe', 30, 1),
(12, 'Đề thi Iot', '', 1, 4, '2021-06-05 18:26:11', '$2y$10$UYaEMhxnl6hrCsKOr0XM8O1RPQHIamTh79yMDdw0inf4iNYM9DtSa', NULL, 2),
(13, 'Javascript cơ bản', 'abc', 1, 16, '2021-06-05 18:26:13', '$2y$10$UYaEMhxnl6hrCsKOr0XM8O1RPQHIamTh79yMDdw0inf4iNYM9DtSa', NULL, 2),
(14, 'PHP basic', '123', 2, 8, '2021-06-05 18:26:15', '$2y$10$UYaEMhxnl6hrCsKOr0XM8O1RPQHIamTh79yMDdw0inf4iNYM9DtSa', NULL, 1),
(15, 'abc123', '123', 2, 9, '2021-06-05 18:26:16', '$2y$10$khwZWm9wwzwzFiYVkdsdE.2RVRyTy28rsJ7ZZ/Yik7y5bdgGtrHse', NULL, 2),
(16, 'sdf', 'sdf', 2, 4, '2021-06-05 18:26:18', '$2y$10$aXrNed6g6ikXpPtXt5F0..THqPOP4VP./xLX9sn4i8jSX5kCubMuO', 15, 1),
(17, 'abc', 'cde', 2, 4, '2021-06-05 18:26:19', '$2y$10$mTeVvDOqhoIvE1TvQ6mBzOqXf5C8V2oyIjcPp/tUe/kFaSVr01cPu', 120, 2),
(18, 'PHP nâng cao', 'abc', 3, 8, '2021-06-05 18:26:21', '$2y$10$YKzjDnEJRG/8aOH94bsA6.Hhz2DgFBC9GHhcb2/WYXd9qosBAQDXy', 30, 2),
(19, 'C/C++ căn bản', 'abc', 2, 23, '2021-06-05 18:46:36', '$2y$10$pIqhZsM4CJose3PFjzFJ8ORxJHm9lBN14aLDc2X/LSmELIhTOQ36K', 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subject_mapping`
--

CREATE TABLE `subject_mapping` (
  `mapping_id` smallint(10) UNSIGNED NOT NULL,
  `subject_id` smallint(10) NOT NULL,
  `student_id` smallint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_mapping`
--

INSERT INTO `subject_mapping` (`mapping_id`, `subject_id`, `student_id`) VALUES
(22, 13, 1),
(23, 13, 2),
(24, 13, 4),
(25, 11, 1),
(26, 11, 3),
(27, 16, 2),
(28, 16, 3),
(38, 19, 1),
(39, 19, 4),
(40, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `theme_id` smallint(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` smallint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Theme';

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `name`, `description`, `created_at`, `user_id`) VALUES
(4, 'IoTt', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2021-06-05 18:27:03', 1),
(8, 'PHP', 'This test will challenge your knowledge of the PHP 7 environment, focusing on new features of PHP 7. Topics: uniform-variable-syntax, the new null-coalesce and spaceship-comparison operators, scalar and return-types, iterable and nullable types, cat…', '2021-06-05 18:27:06', 2),
(9, 'Machine learning', 'Designed for Artificial Intelligence professionals, especially Machine Learning Engineers/Data Scientists, this quiz allows you to test general theoretical knowledge and practical know-how about some of the most used algorithms in the AI field.', '2021-06-05 18:27:08', 1),
(10, '.NET', 'Take this test to prove your knowledge of C# development language. Topics: object-oriented programming in C# .NET, syntax, collections, data types, exceptions and tuples.', '2021-06-05 18:27:10', 1),
(11, 'Big Data', 'Put your Hadoop know-how to the test and see how well you know the Hadoop ecosystem, as well as your ability to work with Data Ingestion and Data Transformation. Topics: general Hadoop ecosystem questions, Data Ingestion, Data Transformati…', '2021-06-05 18:27:12', 2),
(12, 'Blockchain', 'This test is specially designed for developers who want to test their skills and understanding of Blockchain architecture. Topics: Cryptography, Blockchain Mechanisms (Transactions, The UTXO model, The Account model, The fee market,…', '2021-06-05 18:27:14', 2),
(13, 'Databases', 'If you are passionate about open source technologies, take this test and discover your knowledge of MySQL. Topics: Data Types, SQL Statement Syntax, Functions and Operators, Data Manipulation Statements, Indexes.', '2021-06-05 18:27:16', 1),
(14, 'Front-end', 'Designed for WebAssembly beginner developers, this quiz allows you to test basic theoretical knowledge and practical know-how about the import/export WebAssembly instance. Topics: WebAssembly, Emscripten, Import and call WebAssembly functions.', '2021-06-05 18:27:18', 2),
(15, 'Java', 'This test will assess your medium knowledge of Java EE 7. Topics: Web Resources, JMS, Enterprise Java Beans, JDBC and Security.', '2021-06-05 18:27:20', 2),
(16, 'Node.js', 'Designed for advanced generic users of Node.js, this quiz allows you to test advanced general knowledge and practical know-how about some of the most used parts in Node.js. Topics: Generic html operations, Helper methods types like generators…', '2021-06-05 18:27:21', 1),
(17, 'OOP', 'Take this test to prove your theoretical knowledge of Object-oriented programming, as well as your ability to work with OOP concepts every day. Topics: the principles of OOP (encapsulation, abstraction, inheritance and polymorphism), the most…', '2021-06-05 18:27:23', 2),
(18, 'Python', 'This test will challenge your knowledge of the Python programming language. Topics: basic questions (print, separate block of code, define a function), comparison, strings, lists, dictionaries, loops, OOP, modules.', '2021-06-05 18:27:26', 1),
(19, 'Ruby on Rails', 'This test is designed to measure your medium knowledge of the Ruby on Rails framework, with focus on the main concepts such as the MVC design pattern. Topics: MVC architecture, libraries, controllers, database, caching, middleware, Action Mailer,…', '2021-06-05 18:27:30', 1),
(20, 'UX / UI', 'This test is designed to assess intermediate-level UX design skills. Subject areas tested: general knowledge, best practices, guidelines and methodology.', '2021-06-05 18:27:31', 2),
(21, 'Web Services', 'Take this test to assess your knowledge of the main concepts of REST (REpresentational State Transfer). Topics: REST, Options, methods and RESTful principles, etc.', '2021-06-05 18:27:33', 1),
(22, 'Veronica Costello', 'sdfsdf', '2021-06-05 18:27:35', 2),
(23, 'C/C++', 'abc', '2021-06-05 18:45:22', 4),
(24, 'Golang', 'abc', '2021-06-06 02:04:56', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `admin_user_email_uindex` (`email`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `answer_question_question_id_fk` (`question_id`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_StudentIdea` (`student_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `FK_QuestionSubject` (`user_id`);

--
-- Indexes for table `question_mapping`
--
ALTER TABLE `question_mapping`
  ADD PRIMARY KEY (`mapping_id`),
  ADD KEY `fk_question_mapping_save_subject` (`subject_id`),
  ADD KEY `fk_question_mapping_save_question` (`question_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `result_subject_subject_id_fk` (`subject_id`),
  ADD KEY `FK_StudentResult` (`student_id`);

--
-- Indexes for table `result_mapping`
--
ALTER TABLE `result_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_mapping_result_result_id_fk` (`result_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `subject_theme_theme_id_fk` (`theme_id`),
  ADD KEY `FK_UserSubject` (`user_id`);

--
-- Indexes for table `subject_mapping`
--
ALTER TABLE `subject_mapping`
  ADD PRIMARY KEY (`mapping_id`),
  ADD KEY `FK_StudentSubject` (`student_id`),
  ADD KEY `FK_SubjectSubject` (`subject_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_id`),
  ADD UNIQUE KEY `theme_name_uindex` (`name`),
  ADD KEY `FK_UserTheme` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `user_id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `question_mapping`
--
ALTER TABLE `question_mapping`
  MODIFY `mapping_id` smallint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `result_mapping`
--
ALTER TABLE `result_mapping`
  MODIFY `id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subject_mapping`
--
ALTER TABLE `subject_mapping`
  MODIFY `mapping_id` smallint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_question_question_id_fk` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idea`
--
ALTER TABLE `idea`
  ADD CONSTRAINT `FK_StudentIdea` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_QuestionSubject` FOREIGN KEY (`user_id`) REFERENCES `admin_user` (`user_id`);

--
-- Constraints for table `question_mapping`
--
ALTER TABLE `question_mapping`
  ADD CONSTRAINT `fk_question_mapping_save_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_question_mapping_save_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `FK_StudentResult` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `result_subject_subject_id_fk` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result_mapping`
--
ALTER TABLE `result_mapping`
  ADD CONSTRAINT `result_mapping_result_result_id_fk` FOREIGN KEY (`result_id`) REFERENCES `result` (`result_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `FK_UserSubject` FOREIGN KEY (`user_id`) REFERENCES `admin_user` (`user_id`),
  ADD CONSTRAINT `subject_theme_theme_id_fk` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_mapping`
--
ALTER TABLE `subject_mapping`
  ADD CONSTRAINT `FK_StudentSubject` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `FK_SubjectSubject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `FK_UserTheme` FOREIGN KEY (`user_id`) REFERENCES `admin_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
