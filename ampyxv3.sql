-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 01:06 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ampyxv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`) VALUES
(1, '1mt'),
(2, '2mt'),
(3, '3mt'),
(4, '4mt'),
(5, '1pt'),
(6, '2pt'),
(7, '3pt'),
(8, '4pt'),
(9, '1et'),
(10, '2et'),
(11, '3et'),
(12, '4et'),
(13, '1rt'),
(14, '2rt'),
(15, '3rt'),
(16, '4rt');

-- --------------------------------------------------------

--
-- Table structure for table `fielda`
--

CREATE TABLE `fielda` (
  `field_id` int(11) NOT NULL,
  `field_name` varchar(256) NOT NULL,
  `field_subj_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fielda`
--

INSERT INTO `fielda` (`field_id`, `field_name`, `field_subj_id`) VALUES
(1, 'gradivo1', '3'),
(2, 'gradivo2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `fieldID` int(11) NOT NULL,
  `questions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `subjectID`, `fieldID`, `questions`) VALUES
(1, 3, 1, '{\"1\":{\"pitanje\":\"Pitanje neko random\",\"odgovor1\":\"Odgovor jeda\",\"odgovor2\":\"Odg dva\",\"odgovor3\":\"Answer 3\",\"odgovor4\":\"Habla\",\"tocanOdg\":\"quesTypeSelectAns4\"},\"2\":{\"pitanje\":\"Pitanje neko random\",\"odgovor1\":\"Odgovor jeda\",\"odgovor2\":\"Odgovor TUE\",\"odgovor3\":\"Answer 3\",\"odgovor4\":\"yes\",\"tocanOdg\":\"quesTypeSelectAns4\"},\"3\":{\"pitanje\":\"Ovo je trece pitanje vec motherfuckerrr\",\"odgovor1\":\"Yeah\",\"odgovor2\":\"Bitch\",\"odgovor3\":\"to te ja pitam\",\"odgovor4\":\"WooHoo\",\"tocanOdg\":\"quesTypeSelectAns1\"},\"4\":{\"pitanje\":\"Ovo je trece pitanje vec motherfuckerrr\",\"odgovor1\":\"Yeah\",\"odgovor2\":\"Odgovor TUE\",\"odgovor3\":\"to te ja pitam\",\"odgovor4\":\"Habla\",\"tocanOdg\":\"quesTypeSelectAns3\"}}'),
(2, 3, 2, '{\"1\":{\"pitanje\":\"Unesi Bruno\",\"tocanOdg\":\"Bruno\"},\"2\":{\"pitanje\":\"Unesite Televizija\",\"tocanOdg\":\"Televizija\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subj_id` int(11) NOT NULL,
  `subj_name` varchar(256) NOT NULL,
  `subj_author` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_id`, `subj_name`, `subj_author`) VALUES
(1, 'Senzorika', 'tomislav.kral'),
(2, 'MirkoupravljaÄi', 'tomislav.kral'),
(3, 'Test', '');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(256) NOT NULL,
  `test_field` varchar(256) NOT NULL,
  `test_class` varchar(256) NOT NULL,
  `test_type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testsdone`
--

CREATE TABLE `testsdone` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(256) NOT NULL,
  `test_grade` varchar(256) NOT NULL,
  `test_date` datetime NOT NULL,
  `test_user` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_mail` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `user_role` varchar(256) NOT NULL,
  `user_class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_mail`, `user_uid`, `user_pwd`, `user_role`, `user_class`) VALUES
(1, 'Bruno', 'Rehak', 'bruno.rehak@gmail.com', 'bruno.rehak', '$2y$10$ingrmdgQH3ygwgXYwQh9b.h1UgNqN8XcHnYFl8NJ/hTAQRT1lPA..', 'admin', 'admin'),
(2, 'Valentino', 'Franekic', 'valentino.franekic@skole.hr', 'valentino.franekic', '$2y$10$gG5RQ5kpx.R467Nih20JkuxkB1mThyYj0PKSknALij7imC3Cf9lS6', 'ucenik', '3mt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `fielda`
--
ALTER TABLE `fielda`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `testsdone`
--
ALTER TABLE `testsdone`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fielda`
--
ALTER TABLE `fielda`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testsdone`
--
ALTER TABLE `testsdone`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
