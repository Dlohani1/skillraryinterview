-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2020 at 01:39 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillrary_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `is_correct` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `is_correct`) VALUES
(5, 4, 'a', 0),
(6, 4, 'b', 0),
(7, 4, 'c', 0),
(8, 4, 'd', 1),
(9, 5, 'a', 0),
(10, 5, 'b', 1),
(11, 5, 'c', 0),
(12, 5, 'd', 0),
(13, 6, 'd', 0),
(14, 6, 'e', 1),
(15, 6, 'f', 0),
(16, 6, 'g', 0),
(17, 7, '35', 0),
(18, 7, '36', 0),
(19, 7, '45', 0),
(20, 7, '54', 1),
(21, 8, '20M', 1),
(22, 8, '25M', 0),
(23, 8, '22.5M', 0),
(24, 8, '9M', 0),
(25, 9, '48', 0),
(26, 9, '60', 1),
(27, 9, '54', 0),
(28, 9, '90', 0),
(29, 10, '4 years', 1),
(30, 10, '8 years', 0),
(31, 10, '10 years', 0),
(32, 10, 'None of these', 0),
(33, 11, '12', 1),
(34, 11, '9', 0),
(35, 11, '1', 0),
(36, 11, '3', 0),
(37, 12, 'RQPS', 1),
(38, 12, 'QSPR', 0),
(39, 12, 'SQPR', 0),
(40, 12, 'PQRS', 0),
(41, 13, 'SRPQ', 0),
(42, 13, 'QPRS', 1),
(43, 13, 'QPSR', 0),
(44, 13, 'RQPS', 0),
(45, 14, 'SPQR', 0),
(46, 14, 'QSRP', 0),
(47, 14, 'PSRQ', 1),
(48, 14, 'QPSR', 0),
(49, 15, 'PQRS', 0),
(50, 15, 'PSRQ', 1),
(51, 15, 'PSQR', 0),
(52, 15, 'SRPQ', 0),
(53, 16, 'QRPS', 0),
(54, 16, 'SQPR', 0),
(55, 16, 'SQRP', 0),
(56, 16, 'QPSR', 1),
(57, 17, 'Hindmost', 0),
(58, 17, 'Unimportant', 1),
(59, 17, 'Disposed', 0),
(60, 17, 'Premature', 0),
(61, 18, 'Defends', 0),
(62, 18, 'Deprives', 0),
(63, 18, 'Deserts', 1),
(64, 18, 'Devises', 0),
(65, 19, 'Wonderful', 0),
(66, 19, 'Graceful', 0),
(67, 19, 'Ugly', 1),
(68, 19, 'Handsome', 0),
(69, 20, 'Safeguarding', 0),
(70, 20, 'Neglecting', 0),
(71, 20, 'Ignoring', 0),
(72, 20, 'Nurturing', 1),
(73, 21, 'Drive', 1),
(74, 21, 'Jettison', 0),
(75, 21, 'Burst', 0),
(76, 21, 'Acclimatize', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_code`
--

CREATE TABLE `mcq_code` (
  `id` int(11) NOT NULL,
  `mcq_test_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_code`
--

INSERT INTO `mcq_code` (`id`, `mcq_test_id`, `code`, `is_active`) VALUES
(1, 1, 'U%Nyr', 1),
(2, 1, '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_test`
--

CREATE TABLE `mcq_test` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` enum('1','2') NOT NULL COMMENT '1 = single, 2 = multiple',
  `is_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_test`
--

INSERT INTO `mcq_test` (`id`, `title`, `type`, `is_active`) VALUES
(1, 'abc', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_test_pattern`
--

CREATE TABLE `mcq_test_pattern` (
  `id` int(11) NOT NULL,
  `mcq_test_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `sub_section_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `completion_time` text,
  `total_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_test_pattern`
--

INSERT INTO `mcq_test_pattern` (`id`, `mcq_test_id`, `section_id`, `sub_section_id`, `level_id`, `completion_time`, `total_question`) VALUES
(1, 1, 1, 1, 1, NULL, 2),
(2, 1, 2, 12, 1, NULL, 2),
(3, 1, 3, 20, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_test_question`
--

CREATE TABLE `mcq_test_question` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `mcq_test_id` int(11) NOT NULL,
  `mcq_code` text NOT NULL,
  `section_id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `total_time` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_test_question`
--

INSERT INTO `mcq_test_question` (`id`, `student_id`, `mcq_test_id`, `mcq_code`, `section_id`, `questions`, `total_time`) VALUES
(7, 3, 1, 'U%Nyr', 1, '18,17', NULL),
(8, 3, 1, 'U%Nyr', 2, '13,12', NULL),
(9, 3, 1, 'U%Nyr', 3, '7,8', NULL),
(10, 3, 1, 'U%Nyr', 1, '17,18', NULL),
(11, 3, 1, 'U%Nyr', 2, '13,12', NULL),
(12, 3, 1, 'U%Nyr', 3, '7,8', NULL),
(13, 3, 1, 'U%Nyr', 1, '18,17', NULL),
(14, 3, 1, 'U%Nyr', 2, '12,13', NULL),
(15, 3, 1, 'U%Nyr', 3, '7,8', NULL),
(16, 3, 1, 'U%Nyr', 1, '18,17', NULL),
(17, 3, 1, 'U%Nyr', 2, '12,13', NULL),
(18, 3, 1, 'U%Nyr', 3, '8,7', NULL),
(19, 3, 1, '1234', 1, '17,18', NULL),
(20, 3, 1, '1234', 2, '13,12', NULL),
(21, 3, 1, '1234', 3, '8,7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_time`
--

CREATE TABLE `mcq_time` (
  `id` int(11) NOT NULL,
  `mcq_test_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `completion_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_time`
--

INSERT INTO `mcq_time` (`id`, `mcq_test_id`, `section_id`, `completion_time`) VALUES
(1, 1, 1, '120'),
(2, 1, 2, '120'),
(3, 1, 3, '120');

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `sub_section_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`id`, `section_id`, `sub_section_id`, `level_id`, `question`) VALUES
(7, 3, 20, 1, 'If one-third of one-fourth of a number is 15, then three-tenth of that number is:'),
(8, 3, 20, 1, 'In 100 m race, A covers the distance in 36 seconds and B in 45 seconds. In this race A beats B by:'),
(9, 3, 20, 1, 'if in a game of 80, P can give 16 points to Q and R can give 20 points to P, then in a game of 150, how many points can R give to Q?'),
(10, 3, 20, 1, 'The sum of ages of 5 children born at the intervals of 3 years each is 50 years. What is the age of the youngest child?'),
(11, 3, 20, 1, 'Find the odd man out. 1, 3, 9, 12, 19, 29'),
(12, 2, 12, 1, 'In each question below, there is a sentence of which some parts have been jumbled up. Rearrange these parts which are labelled P, Q, R and S to produce the correct sentence. Choose the proper sequence. When he P : did not know Q : he was nervous and R : heard the hue and cry at midnight S : what to do The Proper sequence should be:'),
(13, 2, 12, 1, 'In each question below, there is a sentence of which some parts have been jumbled up. Rearrange these parts which are labelled P, Q, R and S to produce the correct sentence. Choose the proper sequence.  It has been established that P : Einstein was Q : although a great scientist R : weak in arithmetic S : right from his school days The Proper sequence should be:'),
(14, 2, 12, 1, 'In each question below, there is a sentence of which some parts have been jumbled up. Rearrange these parts which are labelled P, Q, R and S to produce the correct sentence. Choose the proper sequence.  Then P : it struck me Q : of course R : suitable it was S : how eminently The Proper sequence should be:'),
(15, 2, 12, 1, 'In each question below, there is a sentence of which some parts have been jumbled up. Rearrange these parts which are labelled P, Q, R and S to produce the correct sentence. Choose the proper sequence.    I read an advertisement that said P : posh, air-conditioned Q : gentleman of taste R : are available for S : fully furnished rooms The Proper sequence should be:'),
(16, 2, 12, 1, 'In each question below, there is a sentence of which some parts have been jumbled up. Rearrange these parts which are labelled P, Q, R and S to produce the correct sentence. Choose the proper sequence.  Since the beginning of history P : have managed to catch Q : the Eskimos and Red Indians R : by a very difficulty method S : a few specimens of this aquatic animal The Proper sequence should be:'),
(17, 1, 8, 1, 'Antonym of Foremost'),
(18, 1, 8, 1, 'Antonym of Protects'),
(19, 1, 8, 1, 'Antonym of Beautiful'),
(20, 1, 8, 1, 'Synonym of Fostering'),
(21, 1, 8, 2, 'Synonym of Propel'),
(22, 1, 1, 1, '<p>a</p>');

-- --------------------------------------------------------

--
-- Table structure for table `question_levels`
--

CREATE TABLE `question_levels` (
  `id` int(11) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_levels`
--

INSERT INTO `question_levels` (`id`, `level`) VALUES
(1, 'Easy'),
(2, 'Moderate'),
(3, 'Difficult');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section_name`) VALUES
(1, 'English'),
(2, 'Analytical Reasoning'),
(3, 'Quantitative Aptitude and Statistics'),
(4, 'Programming MCQ');

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `mcq_test_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `marked_review` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`id`, `student_id`, `question_id`, `answer_id`, `mcq_test_id`, `section_id`, `marked_review`) VALUES
(41, 1, 18, 61, 13, 1, 0),
(42, 1, 17, 58, 13, 1, 0),
(43, 1, 21, 73, 13, 1, 0),
(44, 1, 12, 37, 13, 2, 0),
(45, 1, 13, 42, 13, 2, 0),
(46, 1, 14, 46, 13, 2, 0),
(47, 1, 8, 22, 13, 3, 0),
(48, 1, 7, 17, 13, 3, 0),
(49, 1, 10, 30, 13, 3, 0),
(50, 1, 9, 27, 13, 3, 0),
(51, 3, 12, 37, 1, 2, 0),
(52, 3, 8, 23, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `contact_no` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `10th_passing_year` text NOT NULL,
  `10th_percentage` text NOT NULL,
  `12th_passing_year` text NOT NULL,
  `12th_percentage` text NOT NULL,
  `degree` text NOT NULL,
  `degree_percentage` text NOT NULL,
  `degree_passing_year` text NOT NULL,
  `stream` text NOT NULL,
  `work_location` text NOT NULL,
  `password` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`id`, `full_name`, `email`, `contact_no`, `state`, `city`, `dob`, `gender`, `10th_passing_year`, `10th_percentage`, `12th_passing_year`, `12th_percentage`, `degree`, `degree_percentage`, `degree_passing_year`, `stream`, `work_location`, `password`, `is_active`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(2, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_section`
--

CREATE TABLE `sub_section` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `sub_section_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_section`
--

INSERT INTO `sub_section` (`id`, `section_id`, `sub_section_name`) VALUES
(1, 1, 'Articles'),
(2, 1, 'Prepositions'),
(3, 1, 'Tense'),
(4, 1, 'Gerund'),
(5, 1, 'Sentence Correction'),
(6, 1, 'Speech'),
(7, 1, 'Reading Comprehension'),
(8, 1, 'Synonyms & Antonyms'),
(9, 1, 'Vocabulary'),
(10, 1, 'Spelling'),
(11, 1, 'Sequencing'),
(12, 2, 'Series'),
(13, 2, 'Coding - Decoding'),
(14, 2, 'Flowchart'),
(15, 2, 'Visual Reasoning'),
(16, 2, 'Data Sufficiency'),
(17, 2, 'Case Puzzles'),
(18, 2, 'Assumptions & Arguments'),
(19, 2, 'Statement & Conclusions'),
(20, 3, 'Algebra'),
(21, 3, 'Ratio & Proportions'),
(22, 3, 'Profit & Loss'),
(23, 3, 'SI & CI'),
(24, 3, 'Geometry'),
(25, 3, 'Speed & Distance'),
(26, 3, 'Mathematical Modeling'),
(27, 3, 'Data Interpretation'),
(28, 3, 'Time and Work'),
(29, 3, 'Mean, Median, Mode'),
(30, 3, 'Venn Diagram'),
(31, 4, 'C, C++, OOPS Concepts'),
(32, 4, 'Data Structures'),
(33, 4, 'DBMS concepts'),
(34, 4, 'Operating System Concepts'),
(35, 4, 'Design and Analysis of Algorithms'),
(36, 4, 'Networking Concepts'),
(37, 4, 'Computer Architecture');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_code`
--
ALTER TABLE `mcq_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_test`
--
ALTER TABLE `mcq_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_test_pattern`
--
ALTER TABLE `mcq_test_pattern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_test_question`
--
ALTER TABLE `mcq_test_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_time`
--
ALTER TABLE `mcq_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_levels`
--
ALTER TABLE `question_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_section`
--
ALTER TABLE `sub_section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `mcq_code`
--
ALTER TABLE `mcq_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mcq_test`
--
ALTER TABLE `mcq_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mcq_test_pattern`
--
ALTER TABLE `mcq_test_pattern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mcq_test_question`
--
ALTER TABLE `mcq_test_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `mcq_time`
--
ALTER TABLE `mcq_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `question_levels`
--
ALTER TABLE `question_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_section`
--
ALTER TABLE `sub_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
