-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 03:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medivisty`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL,
  `create_by` bigint(20) UNSIGNED NOT NULL,
  `week_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `asessment_title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `create_by`, `week_id`, `course_id`, `asessment_title`, `status`) VALUES
(1, 2, 1, 1, 'dsadasdsa', 0),
(2, 2, 4, 1, 'week 2 peer assessment', 0),
(3, 2, 4, 1, 'week 2 peer assessment', 0),
(4, 2, 4, 1, 'week 2 peer assessment', 0),
(5, 2, 4, 1, 'week 2 peer assessment', 0),
(6, 2, 4, 1, 'week 2 peer assessment', 0),
(7, 2, 8, 1, 'Week 3 peer assessment', 0),
(9, 2, 13, 8, 'demo week 1 peer assessment', 0),
(10, 2, 14, 8, 'demo week 2 peer assessment', 0),
(13, 10, 20, 10, 'Week 2 hc peer', 0),
(14, 10, 19, 10, 'Week 1 hc peer', 0),
(15, 10, 21, 10, 'Week 2 hc peer', 0),
(16, 10, 21, 10, 'Week 2 hc peer', 0),
(17, 153, 32, 14, 'Week 3 peer graded assessment', 0),
(18, 153, 32, 14, 'Week 3 peer graded assessment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_answers`
--

CREATE TABLE `assessment_answers` (
  `id` int(11) NOT NULL,
  `answer_by` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `attempt_id` int(11) NOT NULL,
  `answer` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assessment_answers`
--

INSERT INTO `assessment_answers` (`id`, `answer_by`, `assessment_id`, `question_id`, `attempt_id`, `answer`, `status`) VALUES
(1, 3, 1, 1, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', 1),
(2, 89, 9, 7, 31, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1),
(3, 96, 9, 7, 32, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1),
(4, 97, 9, 7, 33, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen demo3', 1),
(6, 89, 14, 12, 35, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1),
(7, 89, 13, 11, 36, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1),
(8, 96, 14, 12, 38, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1),
(9, 97, 14, 12, 39, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_attempt`
--

CREATE TABLE `assessment_attempt` (
  `id` int(11) NOT NULL,
  `attempt_by` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assessment_attempt`
--

INSERT INTO `assessment_attempt` (`id`, `attempt_by`, `assessment_id`, `status`) VALUES
(1, 3, 1, 1),
(2, 3, 1, 1),
(3, 3, 2, 1),
(4, 3, 7, 1),
(31, 89, 9, 1),
(32, 96, 9, 1),
(33, 97, 9, 1),
(35, 89, 14, 1),
(36, 89, 13, 1),
(37, 89, 15, 1),
(38, 96, 14, 1),
(39, 97, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_feedbacks`
--

CREATE TABLE `assessment_feedbacks` (
  `id` int(11) NOT NULL,
  `answer_by` bigint(20) UNSIGNED NOT NULL,
  `feedback_by` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assessment_feedbacks`
--

INSERT INTO `assessment_feedbacks` (`id`, `answer_by`, `feedback_by`, `assessment_id`, `point`, `status`, `question_id`) VALUES
(1, 96, 89, 9, 10, 1, 7),
(2, 89, 96, 9, 10, 1, 7),
(4, 96, 97, 9, 10, 1, 7),
(5, 89, 96, 14, 5, 1, 12),
(6, 89, 97, 14, 5, 1, 12),
(7, 96, 97, 14, 5, 1, 12),
(8, 97, 96, 14, 5, 1, 12),
(9, 96, 89, 14, 5, 1, 12),
(10, 97, 89, 14, 5, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_point`
--

CREATE TABLE `assessment_point` (
  `id` int(11) NOT NULL,
  `create_by` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `descriptions` varchar(100) NOT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assessment_point`
--

INSERT INTO `assessment_point` (`id`, `create_by`, `assessment_id`, `point`, `descriptions`, `question_id`) VALUES
(1, 2, 6, 15, 'sdsadsadsad', 5),
(2, 2, 7, 10, 'week 3 peer assessment', 6),
(3, 2, 9, 10, 'Ten Points', 7),
(4, 2, 10, 5, '5 potins', 8),
(7, 10, 13, 5, 'Points', 11),
(8, 10, 14, 5, 'Points', 12),
(9, 10, 16, 5, 'Points', 13),
(10, 153, 18, 10, 'Points', 14);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_questions`
--

CREATE TABLE `assessment_questions` (
  `id` int(11) NOT NULL,
  `create_by` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `instructions` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `word_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assessment_questions`
--

INSERT INTO `assessment_questions` (`id`, `create_by`, `assessment_id`, `instructions`, `status`, `word_limit`) VALUES
(1, 2, 1, 'dsadasd dsadsa kkkkkk', 1, 50),
(2, 2, 3, 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin', 1, 50),
(3, 2, 4, 'Proin laoreet, s. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin', 1, 50),
(4, 2, 5, 'Proin laoreet, s. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin', 1, 50),
(5, 2, 6, 'Proin laoreet, s. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin', 1, 50),
(6, 2, 7, 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 1, 50),
(7, 2, 9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n( 100 words limit )', 1, 100),
(8, 2, 10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n( 50 words limit )', 1, 50),
(11, 10, 13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 50),
(12, 10, 14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 50),
(13, 10, 16, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 50),
(14, 153, 18, 'Week 3 peer graded assessment instructions', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `summary` longtext NOT NULL,
  `about_course` longtext NOT NULL,
  `skills` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '1',
  `post_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `summary`, `about_course`, `skills`, `image`, `status`, `post_time`) VALUES
(1, 'Clinical Skills a Practical Approach', 'The objective for this 6 weeks MOOC is to train the attendees in the activities to learn practical approaches. Understanding the needs of the patients or health seekers. How response is evaluated both in verbal/ history assessment and practical/ clinical reviews. Over the six weeks, many of these are covered from different levels of approaches and patient handling a real practical learning workbooks session.', 'The objective for this 6 weeks MOOC is to train the attendees in the activities to learn practical approaches. Understanding the needs of the patients or health seekers. How response is evaluated both in verbal/ history assessment and practical/ clinical reviews. Over the six weeks, many of these are covered from different levels of approaches and patient handling a real practical learning workbooks session.', 'Fresh and young medical graduates', 'bookss_1669293075.jpg', '1', '2022-03-04 15:30:52'),
(2, 'Data Science in Healthcare', 'Intended for medical professionals, easy to understand and learn about the basics of data science. Practical level training on data management, modeling and interpretation. Scenarios are shared to pratice and learn. Highly recommended for non medical professionals aspiring to learn the data science in healthcare.', 'Intended for medical professionals, easy to understand and learn about the basics of data science. Practical level training on data management, modeling and interpretation. Scenarios are shared to pratice and learn. Highly recommended for non medical professionals aspiring to learn the data science in healthcare.', 'Medical, Health Professionals, Working at Healthcare, Interested in learning Data Science in Healthcare', 'bookss_1669293084.jpg', '1', '2022-03-05 15:30:52'),
(3, 'c2', 's2', 'ab2', 'sk2', '9NVqw8Q_1632746966.jpg', '2', '2022-03-06 15:30:52'),
(4, 'c3u', 's3u', 'ac3u', 'sk3u', '9NVqw8Q_1632746966.jpg', '2', '2022-03-07 15:30:52'),
(5, 'Taimoor', 'sda', 'dasd', 'dsa', '1 (2)_1636461736.png', '2', '2022-03-08 15:30:52'),
(6, 'Acute Chest Pain', 'Revision for fresh graduates to experienced emergency physicians about the chest pain. How different chest pains present at emergency department. What are important factors for emergency physicians to take care and manage these patients.', 'Revision for fresh graduates to experienced emergency physicians about the chest pain. How different chest pains present at emergency department. What are important factors for emergency physicians to take care and manage these patients.  Providing detail about initial review, examination and management at the emergency department. How to rule out different diseases and quickly plan  management options.', 'Revision for fresh graduates to experienced emergency physicians about the chest pain. How different chest pains present at emergency department. What are important factors for emergency physicians to take care and manage these patients.', 'bookss_1669293096.jpg', '1', '2022-03-09 22:36:35'),
(7, 'Telehealth for Medical Professionals', 'The increasing sophistications in technology has enhanced the telehealth options and more patients are referring to its use with increasing demand. This increase in demand requires medical professionals to learn and adopt in a more structured way. This will help create an appropriate use of it and thus provide a proper service much needed by pateints and health seekers.', 'The increasing sophistications in technology has enhanced the telehealth options and more patients are referring to its use with increasing demand. This increase in demand requires medical professionals to learn and adopt in a more structured way. This will help create an appropriate use of it and thus provide a proper service much needed by pateints and health seekers. The increasing sophistications in technology has enhanced the telehealth options and more patients are referring to its use with increasing demand. This increase in demand requires medical professionals to learn and adopt in a more structured way. This will help create an appropriate use of it and thus provide a proper service much needed by pateints and health seekers.', 'Medical Professionals and Healthcare workers, Doctors, Nurses, IT Professionals', 'bookss_1669293063.jpg', '1', '2022-03-09 23:17:28'),
(8, 'Demo Course', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'laptop_1669618461.jpg', '1', '2022-11-28 11:54:21'),
(10, 'Health Consultant', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'h_1670221983.jpg', '1', '2022-12-05 11:33:03'),
(14, 'For testing purpose', 'For testing purpose', 'For testing purpose', 'For testing purpose', 't_1670828805.png', '1', '2022-12-12 12:06:45'),
(15, 'compulsory checking course', 'compulsory checking course', 'compulsory checking course', 'compulsory checking course', 'c_1670830144.jpg', '1', '2022-12-12 12:29:04'),
(16, 'Checking', 'Checking', 'Checking', 'Checking', 'q_1671428043.jpg', '1', '2022-12-19 10:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `courses_details`
--

CREATE TABLE `courses_details` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `learning_objectives` longtext DEFAULT NULL,
  `course_orientation_and_ubiquitous_learning` longtext DEFAULT NULL,
  `status` varchar(30) DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses_details`
--

INSERT INTO `courses_details` (`id`, `course_id`, `learning_objectives`, `course_orientation_and_ubiquitous_learning`, `status`) VALUES
(3, 1, 'Demonstrate understanding of the course structure\r\nDifferentiate didactic and reflexive pedagogy\r\nDetermine the scope of ubiquitous learning', 'We begin this module with an introduction to the idea of an \"e-learning ecology\" and the notion of \"affordance.\" We use this\r\nidea to map the range of innovative activities that we may be able to use in e-learning environments – not that we necessaril...', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `courses_weeks`
--

CREATE TABLE `courses_weeks` (
  `id` int(11) NOT NULL,
  `week_name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses_weeks`
--

INSERT INTO `courses_weeks` (`id`, `week_name`, `course_id`, `status`) VALUES
(1, 'Week 1', 1, 1),
(4, 'Week 2', 1, 1),
(5, 'Week 3', 1, 2),
(6, 'Week 1', 2, 2),
(7, 'Week 1', 6, 2),
(8, 'Week 3', 1, 1),
(9, 'Week 4', 1, 1),
(10, 'week 5', 6, 1),
(11, 'from telehealth seventh week', 7, 1),
(12, 'First Week Data Science', 2, 1),
(13, 'Week 1', 8, 1),
(14, 'Week 2', 8, 1),
(15, 'Week 3', 8, 1),
(16, 'Week 4', 8, 1),
(17, 'Week 1', 9, 1),
(18, 'Week 2', 9, 1),
(19, 'Week 1 hc', 10, 1),
(20, 'Week 2 hc', 10, 2),
(21, 'Week 2 hc', 10, 2),
(28, 'Week 1 ftp', 14, 1),
(29, 'Week 2 ftp', 14, 1),
(30, 'Week 1 ccc', 15, 1),
(31, 'Week 2 ccc', 15, 1),
(32, 'Week 3 ftp', 14, 1),
(33, 'Week 1 checking', 16, 1),
(34, 'Week 2 checking', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `attempted_on` varchar(11) DEFAULT NULL,
  `next_attempt` varchar(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_attempts`
--

INSERT INTO `quiz_attempts` (`id`, `topic_id`, `user_id`, `attempts`, `attempted_on`, `next_attempt`, `status`) VALUES
(1, 55, 3, 2, '1646745785', '1646752985', 'A'),
(2, 91, 89, 1, '1669633753', '1669635553', 'A'),
(3, 65, 5, 1, '1669643291', '1669645091', 'A'),
(4, 97, 89, 1, '1670224085', '1670225885', 'A'),
(5, 98, 89, 1, '1670224167', '1670225967', 'A'),
(6, 97, 96, 1, '1670224705', '1670226505', 'A'),
(7, 97, 97, 1, '1670224820', '1670226620', 'A'),
(8, 174, 146, 1, '1670841606', '1670843406', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `q_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `q_title` longtext NOT NULL,
  `question_type` int(11) DEFAULT NULL,
  `correct_answer` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`q_id`, `topic_id`, `week_id`, `q_title`, `question_type`, `correct_answer`) VALUES
(50, 55, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. ? - 1 ', 1, ''),
(51, 55, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. ? - 2', 1, ''),
(52, 55, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. ? - 3', 1, ''),
(54, 60, 1, 'q1', 1, ''),
(55, 61, 1, 'qq!', 1, ''),
(56, 63, 1, 'q1', 1, ''),
(57, 64, 1, '21 Option1-1', 1, ''),
(58, 65, 1, 'Q.1', 1, ''),
(59, 65, 1, 'Q.2', 2, '1'),
(60, 65, 1, 'Q.3', 2, '1'),
(61, 65, 1, 'Q.4', 1, ''),
(62, 65, 1, 'Q.5', 2, '1'),
(63, 65, 1, 'Q.6', 2, '1'),
(68, 3, 1, 'Question One Testing-1', 1, ''),
(69, 3, 1, 'Question Two Testing-2', 2, '1'),
(70, 66, 1, 'Q.1 TEsting-1', 1, ''),
(74, 66, 1, 'Q.2', 2, '1'),
(75, 79, 4, 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 1, ''),
(76, 80, 4, 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 1, ''),
(77, 83, 4, 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 1, ''),
(78, 86, 8, 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 1, ''),
(79, 91, 13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, ''),
(80, 91, 13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, '1'),
(81, 94, 14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, '4'),
(82, 94, 14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, ''),
(85, 97, 19, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1, ''),
(86, 98, 20, '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', 1, ''),
(87, 174, 30, 'true false', 1, ''),
(88, 177, 28, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 1, ''),
(89, 178, 28, 'Test topic 1 ftp quiz', 1, ''),
(90, 202, 28, 'True False', 1, ''),
(91, 203, 28, 'True False', 1, ''),
(92, 204, 29, 'dsadsadsagfdhfgjgfhkfghj', 2, '2'),
(93, 206, 32, 'Quiz topic', 2, '2'),
(94, 206, 32, 'quiz true false', 1, ''),
(95, 208, 33, 'checking', 1, ''),
(96, 209, 33, 'fodapsfsidap[fosdafp[sdaifpsdafipoasdofiapsdfi3333333333333333333333333333333333333333333', 1, ''),
(97, 210, 33, 'dsadas', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question_answer`
--

CREATE TABLE `quiz_question_answer` (
  `id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` longtext DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `q_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_question_answer`
--

INSERT INTO `quiz_question_answer` (`id`, `result_id`, `q_id`, `answer`, `is_correct`, `q_type`) VALUES
(57, 69, 58, '', NULL, 1),
(58, 70, 58, '', NULL, 1),
(59, 71, 58, '', NULL, 1),
(60, 72, 58, '', NULL, 1),
(61, 73, 58, '', NULL, 1),
(62, 73, 59, '4', 0, 2),
(63, 73, 60, '3', 0, 2),
(64, 73, 61, '', NULL, 1),
(65, 73, 62, '3', 0, 2),
(66, 74, 58, '', NULL, 1),
(67, 74, 59, '4', 0, 2),
(68, 74, 60, '3', 0, 2),
(69, 74, 61, '', NULL, 1),
(70, 74, 62, '4', 0, 2),
(71, 74, 63, '4', 0, 2),
(72, 75, 58, '', NULL, 1),
(73, 75, 59, '1', 1, 2),
(74, 75, 60, '3', 0, 2),
(75, 75, 61, '', NULL, 1),
(76, 75, 62, '4', 0, 2),
(77, 75, 63, '4', 0, 2),
(78, 76, 58, '', NULL, 1),
(79, 76, 59, '1', 1, 2),
(80, 76, 60, '1', 1, 2),
(81, 76, 61, '', NULL, 1),
(82, 76, 62, '1', 1, 2),
(83, 76, 63, '', 0, 2),
(84, 77, 70, '', NULL, 1),
(85, 77, 71, '', NULL, 1),
(86, 77, 72, '4', 0, 2),
(87, 78, 70, '', NULL, 1),
(88, 78, 71, '', NULL, 1),
(89, 78, 72, '1', 1, 2),
(90, 79, 50, '', NULL, 1),
(91, 79, 51, '', NULL, 1),
(92, 79, 52, '', NULL, 1),
(93, 80, 50, '', NULL, 1),
(94, 81, 50, '', NULL, 1),
(95, 81, 51, '', NULL, 1),
(96, 81, 52, '', NULL, 1),
(97, 82, 50, '', NULL, 1),
(98, 82, 51, '', NULL, 1),
(99, 82, 52, '', NULL, 1),
(100, 83, 79, '', NULL, 1),
(101, 83, 80, '3', 0, 2),
(102, 84, 79, '', NULL, 1),
(103, 84, 80, '1', 1, 2),
(104, 85, 58, '', NULL, 1),
(105, 85, 59, '2', 0, 2),
(106, 85, 60, '3', 0, 2),
(107, 85, 61, '', NULL, 1),
(108, 85, 62, '3', 0, 2),
(109, 85, 63, '4', 0, 2),
(110, 86, 85, '', NULL, 1),
(111, 87, 86, '', NULL, 1),
(112, 88, 86, '', NULL, 1),
(113, 89, 86, '', NULL, 1),
(114, 90, 86, '', NULL, 1),
(115, 91, 86, '', NULL, 1),
(116, 92, 85, '', NULL, 1),
(117, 93, 85, '', NULL, 1),
(118, 94, 85, '', NULL, 1),
(119, 95, 85, '', NULL, 1),
(120, 96, 87, '', NULL, 1),
(121, 97, 87, '', NULL, 1),
(122, 98, 87, '', NULL, 1),
(123, 99, 92, '3', 0, 2),
(124, 100, 92, '1', 0, 2),
(125, 101, 92, '2', 1, 2),
(126, 102, 92, '', 0, 2),
(127, 103, 90, '', NULL, 1),
(128, 104, 90, '', NULL, 1),
(129, 105, 91, '', NULL, 1),
(130, 106, 90, '', NULL, 1),
(131, 107, 91, '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question_options`
--

CREATE TABLE `quiz_question_options` (
  `o_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `o_title` mediumtext DEFAULT NULL,
  `sub_answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_question_options`
--

INSERT INTO `quiz_question_options` (`o_id`, `q_id`, `o_title`, `sub_answer`) VALUES
(27, 50, 'Here are many variations of passages of Lorem Ipsum available 1', 1),
(28, 50, 'Here are many variations of passages of Lorem Ipsum available 2', 1),
(29, 50, 'Here are many variations of passages of Lorem Ipsum available 3', 1),
(30, 51, 'here are many variations of passages of Lorem Ipsum available 1 2', 0),
(31, 51, 'here are many variations of passages of Lorem Ipsum available 2 2', 0),
(32, 51, 'here are many variations of passages of Lorem Ipsum available 3 2', 0),
(33, 51, 'here are many variations of passages of Lorem Ipsum available 4 2', 0),
(34, 52, 'here are many variations of passages of Lorem Ipsum available 1 3', 1),
(35, 52, 'here are many variations of passages of Lorem Ipsum available 2 3', 1),
(36, 52, 'here are many variations of passages of Lorem Ipsum available 3 3', 1),
(41, 54, 'Option 1', NULL),
(42, 54, 'Option 2', NULL),
(43, 54, 'Option 3', NULL),
(44, 55, 'Option 1!', NULL),
(45, 55, 'Option 2!', NULL),
(46, 55, 'Option 3!', NULL),
(47, 56, 'Option 1', NULL),
(48, 56, 'Option 2', NULL),
(49, 56, 'Option 3', NULL),
(54, 58, 'Option 1', 1),
(55, 58, 'Option 2', 1),
(56, 58, 'Option 3', 1),
(57, 59, 'A', NULL),
(58, 59, 'B', NULL),
(59, 59, 'C', NULL),
(60, 59, 'D', NULL),
(61, 60, 'A', NULL),
(62, 60, 'B', NULL),
(63, 60, 'C', NULL),
(64, 61, 'A', 1),
(65, 61, 'B', 1),
(66, 61, 'C', 1),
(67, 62, 'A', NULL),
(68, 62, 'B', NULL),
(69, 62, 'C', NULL),
(70, 62, 'D', NULL),
(71, 63, 'A', NULL),
(72, 63, 'B', NULL),
(73, 63, 'C', NULL),
(74, 63, 'D', NULL),
(147, 68, 'Option 1', 1),
(148, 68, 'Option 2', 1),
(149, 68, 'Option 3', 1),
(176, 69, 'A Testing', NULL),
(177, 69, 'B Testing', NULL),
(178, 69, 'C Testing', NULL),
(179, 69, 'D Testing', NULL),
(210, 70, 'Option 1', 1),
(211, 70, 'Option 2', 1),
(212, 70, 'Option 3', 1),
(213, 70, 'Option4', 1),
(214, 57, '21 Option1', 1),
(215, 57, '21 Option2', 1),
(216, 57, '21 Option3', 0),
(217, 57, '21 Option4', 0),
(222, 74, 'A', NULL),
(223, 74, 'B', NULL),
(224, 74, 'C', NULL),
(225, 74, 'D', NULL),
(226, 76, 'sit amet urnas efficitur rutrum enim, sed', 1),
(227, 76, 'sit amet urnas efficitur rutrum enim, sed', 0),
(228, 76, 'sit amet urnas efficitur rutrum enim, sed', 1),
(229, 77, 'dsadsa', NULL),
(230, 77, 'dsadsa', NULL),
(231, 77, 'sadada', NULL),
(232, 78, 'sit amet urnas efficitur rutrum enim, sed 3 1', 0),
(233, 78, 'sit amet urnas efficitur rutrum enim, sed 3 2', 0),
(234, 78, 'sit amet urnas efficitur rutrum enim, sed 3 3', 1),
(235, 79, 'True', 1),
(236, 79, 'False', 0),
(237, 79, 'True', 1),
(238, 79, 'False', 0),
(239, 80, 'test 1', NULL),
(240, 80, 'test 2', NULL),
(241, 80, 'test 3', NULL),
(242, 81, 'lorem1', NULL),
(243, 81, 'lorem2', NULL),
(244, 81, 'lorem3', NULL),
(245, 81, 'lorem4', NULL),
(246, 82, 'True', 1),
(247, 82, 'True', 1),
(248, 82, 'False', 0),
(249, 82, 'False', 0),
(271, 83, 'First', 1),
(272, 83, 'Second', 0),
(273, 83, 'Third', 0),
(274, 84, 'First', 0),
(275, 84, 'Second', 1),
(276, 84, 'Third', 1),
(277, 85, 'First', 0),
(278, 85, 'Second', 1),
(279, 85, 'Third', 1),
(280, 86, 'Tru', NULL),
(281, 86, NULL, NULL),
(282, 86, NULL, NULL),
(283, 87, 'True', 1),
(284, 87, 'False', 0),
(285, 87, 'True', 1),
(286, 88, 'True', 1),
(287, 88, 'True', 1),
(288, 88, 'False', 0),
(289, 89, 'True', 1),
(290, 89, 'False', 0),
(291, 89, 'False', 0),
(292, 90, 'False', 0),
(293, 90, 'True', 1),
(294, 90, 'True', 1),
(295, 91, 'False', 0),
(296, 91, 'False', 0),
(297, 91, 'True', 1),
(298, 92, 'lorem1', NULL),
(299, 92, 'lorem2', NULL),
(300, 92, 'lorem3', NULL),
(301, 93, 'lorem1', NULL),
(302, 93, 'lorem2', NULL),
(303, 93, 'lorem3', NULL),
(304, 94, 'True', 1),
(305, 94, 'True', 1),
(306, 94, 'False', 0),
(307, 95, '1', 1),
(308, 95, '2', 0),
(309, 95, '3', 0),
(310, 96, '3', 0),
(311, 96, '3', 0),
(312, 96, '3', 0),
(313, 97, 'dsadsa', 0),
(314, 97, 'sdsadsa', 0),
(315, 97, 'dsadsadas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `topic_id`, `user_id`, `result`, `status`) VALUES
(75, 65, 3, '33.33', 'I'),
(76, 65, 3, '83.33', 'A'),
(81, 55, 3, '33.33', 'I'),
(82, 55, 3, '33.33', 'P'),
(83, 91, 89, '0', 'I'),
(84, 91, 89, '50', 'A'),
(85, 65, 5, '0', 'A'),
(86, 97, 89, '100', 'A'),
(87, 98, 89, '0', 'I'),
(88, 98, 89, '0', 'I'),
(89, 98, 89, '0', 'I'),
(90, 98, 89, '0', 'I'),
(91, 98, 89, '', 'A'),
(92, 97, 96, '0', 'I'),
(93, 97, 96, '0', 'I'),
(94, 97, 96, '100', 'A'),
(95, 97, 97, '100', 'A'),
(96, 174, 146, '0', 'I'),
(97, 174, 146, '0', 'I'),
(98, 174, 146, '100', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_sub_question_answer`
--

CREATE TABLE `quiz_sub_question_answer` (
  `id` int(11) NOT NULL,
  `main_ans_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `sub_q_id` int(11) NOT NULL,
  `sub_answer` int(11) NOT NULL,
  `is_correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_sub_question_answer`
--

INSERT INTO `quiz_sub_question_answer` (`id`, `main_ans_id`, `result_id`, `sub_q_id`, `sub_answer`, `is_correct`) VALUES
(55, 57, 69, 54, 1, 1),
(56, 57, 69, 55, 1, 1),
(57, 57, 69, 56, 1, 1),
(58, 58, 70, 54, 1, 1),
(59, 58, 70, 55, 1, 1),
(60, 58, 70, 56, 1, 1),
(61, 59, 71, 54, 1, 1),
(62, 59, 71, 55, 1, 1),
(63, 59, 71, 56, 1, 1),
(64, 60, 72, 54, 1, 1),
(65, 60, 72, 55, 1, 1),
(66, 60, 72, 56, 1, 1),
(67, 61, 73, 54, 1, 1),
(68, 61, 73, 55, 1, 1),
(69, 61, 73, 56, 1, 1),
(70, 64, 73, 64, 0, 0),
(71, 64, 73, 65, 0, 0),
(72, 64, 73, 66, 0, 0),
(73, 66, 74, 54, 1, 1),
(74, 66, 74, 55, 1, 1),
(75, 66, 74, 56, 1, 1),
(76, 69, 74, 64, 0, 0),
(77, 69, 74, 65, 0, 0),
(78, 69, 74, 66, 0, 0),
(79, 72, 75, 54, 1, 1),
(80, 72, 75, 55, 1, 1),
(81, 72, 75, 56, 1, 1),
(82, 75, 75, 64, 0, 0),
(83, 75, 75, 65, 0, 0),
(84, 75, 75, 66, 0, 0),
(85, 78, 76, 54, 1, 1),
(86, 78, 76, 55, 1, 1),
(87, 78, 76, 56, 1, 1),
(88, 81, 76, 64, 1, 1),
(89, 81, 76, 65, 1, 1),
(90, 81, 76, 66, 1, 1),
(91, 84, 77, 180, 0, 0),
(92, 84, 77, 181, 0, 0),
(93, 84, 77, 182, 0, 0),
(94, 84, 77, 183, 0, 0),
(95, 85, 77, 184, 1, 0),
(96, 85, 77, 185, 1, 0),
(97, 85, 77, 186, 1, 0),
(98, 85, 77, 187, 1, 0),
(99, 87, 78, 180, 1, 1),
(100, 87, 78, 181, 1, 1),
(101, 87, 78, 182, 1, 1),
(102, 87, 78, 183, 1, 1),
(103, 88, 78, 184, 0, 1),
(104, 88, 78, 185, 0, 1),
(105, 88, 78, 186, 0, 1),
(106, 88, 78, 187, 0, 1),
(107, 90, 79, 27, 0, 0),
(108, 90, 79, 28, 0, 0),
(109, 90, 79, 29, 0, 0),
(110, 91, 79, 30, 0, 1),
(111, 91, 79, 31, 0, 1),
(112, 91, 79, 32, 0, 1),
(113, 91, 79, 33, 0, 1),
(114, 92, 79, 34, 0, 0),
(115, 92, 79, 35, 0, 0),
(116, 92, 79, 36, 0, 0),
(117, 94, 81, 27, 0, 0),
(118, 94, 81, 28, 0, 0),
(119, 94, 81, 29, 0, 0),
(120, 95, 81, 30, 0, 1),
(121, 95, 81, 31, 0, 1),
(122, 95, 81, 32, 0, 1),
(123, 95, 81, 33, 0, 1),
(124, 96, 81, 34, 0, 0),
(125, 96, 81, 35, 0, 0),
(126, 96, 81, 36, 0, 0),
(127, 97, 82, 27, 0, 0),
(128, 97, 82, 28, 0, 0),
(129, 97, 82, 29, 0, 0),
(130, 98, 82, 30, 0, 1),
(131, 98, 82, 31, 0, 1),
(132, 98, 82, 32, 0, 1),
(133, 98, 82, 33, 0, 1),
(134, 99, 82, 34, 0, 0),
(135, 99, 82, 35, 0, 0),
(136, 99, 82, 36, 0, 0),
(137, 100, 83, 235, 0, 0),
(138, 100, 83, 236, 0, 1),
(139, 100, 83, 237, 0, 0),
(140, 100, 83, 238, 0, 1),
(141, 102, 84, 235, 1, 1),
(142, 102, 84, 236, 1, 0),
(143, 102, 84, 237, 0, 0),
(144, 102, 84, 238, 0, 1),
(145, 104, 85, 54, 0, 0),
(146, 104, 85, 55, 0, 0),
(147, 104, 85, 56, 0, 0),
(148, 107, 85, 64, 1, 1),
(149, 107, 85, 65, 0, 0),
(150, 107, 85, 66, 1, 1),
(151, 110, 86, 277, 0, 1),
(152, 110, 86, 278, 1, 1),
(153, 110, 86, 279, 1, 1),
(154, 111, 87, 280, 1, 0),
(155, 111, 87, 281, 1, 0),
(156, 111, 87, 282, 0, 0),
(157, 112, 88, 280, 1, 0),
(158, 112, 88, 281, 0, 0),
(159, 112, 88, 282, 0, 0),
(160, 113, 89, 280, 0, 0),
(161, 113, 89, 281, 0, 0),
(162, 113, 89, 282, 0, 0),
(163, 114, 90, 280, 1, 0),
(164, 114, 90, 281, 1, 0),
(165, 114, 90, 282, 1, 0),
(166, 116, 92, 277, 0, 1),
(167, 116, 92, 278, 0, 0),
(168, 116, 92, 279, 1, 1),
(169, 117, 93, 277, 1, 0),
(170, 117, 93, 278, 0, 0),
(171, 117, 93, 279, 0, 0),
(172, 118, 94, 277, 0, 1),
(173, 118, 94, 278, 1, 1),
(174, 118, 94, 279, 1, 1),
(175, 119, 95, 277, 0, 1),
(176, 119, 95, 278, 1, 1),
(177, 119, 95, 279, 1, 1),
(178, 120, 96, 283, 0, 0),
(179, 120, 96, 284, 0, 1),
(180, 120, 96, 285, 0, 0),
(181, 121, 97, 283, 1, 1),
(182, 121, 97, 284, 1, 0),
(183, 121, 97, 285, 1, 1),
(184, 122, 98, 283, 1, 1),
(185, 122, 98, 284, 0, 1),
(186, 122, 98, 285, 1, 1),
(187, 127, 103, 292, 1, 0),
(188, 127, 103, 293, 1, 1),
(189, 127, 103, 294, 0, 0),
(190, 128, 104, 292, 0, 1),
(191, 128, 104, 293, 1, 1),
(192, 128, 104, 294, 1, 1),
(193, 129, 105, 295, 0, 1),
(194, 129, 105, 296, 0, 1),
(195, 129, 105, 297, 1, 1),
(196, 130, 106, 292, 0, 1),
(197, 130, 106, 293, 1, 1),
(198, 130, 106, 294, 1, 1),
(199, 131, 107, 295, 0, 1),
(200, 131, 107, 296, 0, 1),
(201, 131, 107, 297, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `id` int(11) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `instructor_signature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`id`, `instructor_name`, `instructor_signature`) VALUES
(3, 'test', 'test_1671609607.png'),
(4, 'First Instructor', 'signature1_1671619334.png'),
(5, 'Second Instructor', 'signature2_1671619368.png');

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE `students_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_courses`
--

INSERT INTO `students_courses` (`id`, `user_id`, `course_id`, `status`) VALUES
(5, 3, 1, 1),
(6, 5, 1, 1),
(7, 3, 2, 1),
(8, 12, 7, 1),
(9, 3, 7, 1),
(11, 14, 6, 1),
(12, 7, 1, 1),
(13, 7, 2, 1),
(14, 7, 6, 1),
(15, 7, 7, 1),
(16, 3, 6, 1),
(17, 8, 6, 0),
(18, 8, 7, 0),
(19, 8, 2, 0),
(20, 8, 1, 0),
(21, 16, 6, 0),
(22, 5, 8, 1),
(23, 89, 8, 1),
(24, 96, 8, 1),
(25, 97, 8, 1),
(26, 89, 9, 1),
(27, 96, 9, 1),
(28, 97, 9, 1),
(29, 97, 10, 1),
(30, 89, 10, 1),
(31, 96, 10, 1),
(32, 96, 11, 1),
(33, 3, 12, 1),
(34, 146, 13, 2),
(35, 146, 14, 1),
(36, 146, 15, 1),
(38, 146, 16, 1),
(39, 154, 14, 1),
(40, 154, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_courses`
--

CREATE TABLE `teachers_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers_courses`
--

INSERT INTO `teachers_courses` (`id`, `user_id`, `course_id`, `status`) VALUES
(1, 2, 1, 1),
(2, 4, 1, 1),
(3, 2, 2, 1),
(4, 2, 6, 1),
(5, 2, 8, 1),
(6, 10, 9, 1),
(7, 10, 10, 1),
(8, 4, 11, 1),
(9, 2, 12, 1),
(10, 4, 13, 1),
(11, 153, 14, 1),
(12, 153, 15, 1),
(13, 153, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thread_msg`
--

CREATE TABLE `thread_msg` (
  `msg_id` bigint(20) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `msg_by` bigint(20) UNSIGNED DEFAULT NULL,
  `msg_text` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `post_time` datetime DEFAULT current_timestamp(),
  `reply_to` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `thread_msg`
--

INSERT INTO `thread_msg` (`msg_id`, `thread_id`, `msg_by`, `msg_text`, `status`, `post_time`, `reply_to`) VALUES
(1, 1, 3, '?', 1, '2022-02-22 18:03:04', NULL),
(2, 1, 2, 'Yes?', 1, '2022-02-22 18:03:22', 1),
(3, 1, 3, 'Are you there?', 1, '2022-02-22 18:03:44', 1),
(4, 1, 3, 'Are you there? I\'m here.', 1, '2022-02-22 18:09:16', 1),
(5, 1, 5, 'Yes, I\'m here.', 1, '2022-02-22 18:09:39', 1),
(6, 3, 3, 'dsadasd', 1, '2022-11-11 16:17:36', NULL),
(7, 3, 3, 'second', 1, '2022-11-11 16:17:44', NULL),
(8, 3, 5, 'two', 1, '2022-11-11 16:21:39', NULL),
(9, 3, 5, 'two from 2', 1, '2022-11-11 16:21:57', 7),
(10, 2, 5, 'from week 2', 1, '2022-11-11 18:20:52', NULL),
(11, 3, 3, 'ssss', 1, '2022-11-11 18:27:27', NULL),
(12, 1, 3, 'week 1 wd', 1, '2022-11-14 10:27:24', NULL),
(13, 1, 5, 'weeek 1 wd', 1, '2022-11-14 10:28:15', NULL),
(14, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:32', 13),
(15, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:35', 13),
(16, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:36', 13),
(17, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:36', 13),
(18, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:36', 13),
(19, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:36', 13),
(20, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:36', 13),
(21, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:37', 13),
(22, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:37', 13),
(23, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:37', 13),
(24, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:37', 13),
(25, 1, 3, 'dsadsadsadsad', 1, '2022-11-14 11:48:38', 13),
(26, 1, 3, 'dsadasd', 1, '2022-11-14 11:49:07', 1),
(27, 1, 3, 'ssssssss', 1, '2022-11-14 11:50:37', 12),
(28, 1, 3, 'qwerty', 1, '2022-11-14 11:58:07', NULL),
(29, 1, 3, 'fifty', 1, '2022-11-14 12:05:31', NULL),
(30, 1, 2, 'teacher', 1, '2022-11-14 12:22:53', NULL),
(31, 1, 2, 'teacherrr', 1, '2022-11-14 12:23:53', NULL),
(32, 3, 3, '333333', 1, '2022-11-14 12:34:23', NULL),
(33, 1, 2, 'manual url', 1, '2022-11-14 12:55:45', 31),
(34, 4, 2, 'hello', 1, '2022-11-28 11:59:29', NULL),
(35, 6, 2, 'hello', 1, '2022-11-29 15:52:08', NULL),
(36, 6, 89, 'hi', 1, '2022-11-29 15:52:58', 35),
(37, 6, 89, 'hi', 1, '2022-11-29 15:53:06', NULL),
(38, 6, 89, '?', 1, '2022-11-29 15:53:17', 35),
(39, 6, 2, 'yes', 1, '2022-11-29 15:55:33', 35),
(40, 6, 2, 'yes', 1, '2022-11-29 15:55:34', 35),
(41, 6, 2, 'dsadsa', 1, '2022-11-29 15:55:53', NULL),
(42, 2, 2, 'dasdsadas', 1, '2022-12-05 10:41:57', NULL),
(43, 2, 2, 'dsadas', 1, '2022-12-05 10:42:03', 10),
(44, 6, 2, 'dasdsa', 1, '2022-12-06 16:59:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `admin_comment` longtext DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `week_id`, `user_id`, `topic`, `admin_comment`, `status`) VALUES
(1, 1, 2, 'Topic 1', NULL, 'A'),
(2, 1, 2, 'Topic 2', 'Good', 'A'),
(3, 1, 2, 'topic 3-u', 'NOthing in your topic', 'R'),
(4, 1, 2, 'Topic', NULL, 'P'),
(5, 1, 2, 'testing time', NULL, 'P'),
(6, 1, 2, 'Topic testing', NULL, 'UA'),
(53, 1, 2, 'tesing quiz', NULL, 'A'),
(54, 1, 2, 'dsd', NULL, 'P'),
(55, 1, 2, 'testig tf', NULL, 'A'),
(56, 1, 2, 'ads', NULL, 'P'),
(57, 1, 2, 'ads', NULL, 'P'),
(58, 1, 2, 'sdd', NULL, 'P'),
(59, 1, 2, 'aSD', NULL, 'P'),
(60, 1, 2, 'aSD', NULL, 'P'),
(61, 1, 2, 'DASD', NULL, 'P'),
(62, 1, 2, 'FEFDF', NULL, 'P'),
(63, 1, 2, 'FEFDF', NULL, 'P'),
(64, 1, 2, '21 Quiz testing', NULL, 'P'),
(65, 1, 2, '21 Quiz testing 2', NULL, 'A'),
(66, 1, 2, '02-03 TEsting Topic', '', 'UA'),
(67, 1, 2, 'From week 2', NULL, 'P'),
(68, 1, 2, 'From week 2', NULL, 'A'),
(69, 1, 2, 'from week 2 again', '', 'A'),
(70, 1, 2, 'dd', NULL, 'UA'),
(71, 1, 2, 'dd', NULL, 'P'),
(72, 1, 2, 'dd t', NULL, 'P'),
(73, 1, 2, 'dd t', NULL, 'P'),
(74, 1, 2, 'dd t 2', NULL, 'P'),
(75, 2, 2, 'url 2', NULL, 'P'),
(76, 4, 2, 'ddd cc', NULL, 'P'),
(77, 4, 2, 'from week 2 changes', NULL, 'P'),
(78, 4, 2, 'from weeeeeeeeeeeeeek 2', NULL, 'A'),
(79, 4, 2, 'Quizz weekk 2', NULL, 'P'),
(80, 4, 2, 'Quizz weekk 2', NULL, 'A'),
(81, 4, 2, 'Week 2 video', NULL, 'UA'),
(82, 4, 2, 'Week 2 reading', NULL, 'UA'),
(83, 4, 2, 'Week 2 reading', NULL, 'UA'),
(84, 8, 2, 'Week 3 video', NULL, 'A'),
(85, 8, 2, 'Week 3 reading', NULL, 'A'),
(86, 8, 2, 'Week 3 quiz', NULL, 'A'),
(87, 10, 2, 'Topic 1', NULL, 'UA'),
(88, 12, 2, 'First Topic Data', NULL, 'A'),
(89, 13, 2, 'demo week 1 video 1', NULL, 'A'),
(90, 13, 2, 'demo week 1 readind 1', NULL, 'A'),
(91, 13, 2, 'demo week 1 quiz 1', NULL, 'A'),
(92, 14, 2, 'demo week 2 video 1', NULL, 'A'),
(93, 14, 2, 'demo week 2 reading content', NULL, 'A'),
(94, 14, 2, 'demo week 3 quiz', NULL, 'A'),
(97, 19, 10, 'Topic 1 hc', NULL, 'A'),
(98, 20, 10, 'Topic 2 hc', NULL, 'A'),
(99, 21, 10, 'Topic 1 week 2 hc', NULL, 'A'),
(100, 19, 10, 'Compulsory', NULL, 'P'),
(101, 19, 10, 'Compulsory', NULL, 'P'),
(102, 19, 10, 'Compulsory', NULL, 'P'),
(103, 19, 10, 'Compulsory', NULL, 'P'),
(104, 19, 10, 'Compulsory', NULL, 'P'),
(105, 19, 10, 'Compulsory', NULL, 'P'),
(106, 19, 10, 'Compulsory', NULL, 'A'),
(107, 19, 10, 'Without Compulsory', NULL, 'A'),
(108, 19, 10, 'Reading', NULL, 'A'),
(109, 19, 10, 'Test', NULL, 'A'),
(166, 13, 2, 'test', NULL, 'A'),
(169, 30, 153, 'Topic 1 ccc', NULL, 'A'),
(170, 30, 153, 'Topic 2 ccc compulsory', NULL, 'A'),
(174, 30, 153, 'Final Quiz', NULL, 'A'),
(202, 28, 153, 'First Topic ftp', NULL, 'A'),
(203, 28, 153, 'Second topic ftp', NULL, 'A'),
(204, 29, 153, 'Topic 1', NULL, 'A'),
(205, 32, 153, 'Topic 1 week 3 ftp', NULL, 'UA'),
(206, 32, 153, 'Quiz topic', NULL, 'A'),
(207, 32, 153, 'try', NULL, 'UA'),
(208, 33, 153, 'First Topic', NULL, 'UA'),
(209, 33, 153, 'Final quiz', NULL, 'UA'),
(210, 33, 153, 'sdasd', NULL, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `topics_data`
--

CREATE TABLE `topics_data` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `video_title` mediumtext DEFAULT NULL,
  `content` longtext NOT NULL,
  `type` varchar(30) NOT NULL,
  `time` varchar(30) DEFAULT NULL,
  `quiz_result_status` int(11) DEFAULT NULL,
  `compulsary` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics_data`
--

INSERT INTO `topics_data` (`id`, `topic_id`, `video_url`, `video_title`, `content`, `type`, `time`, `quiz_result_status`, `compulsary`) VALUES
(37, 1, 'https://www.youtube.com/watch?v=yAoLSRbwxL8&ab_channel=KlienDW', 'Dummy', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'V', '601', NULL, NULL),
(38, 1, NULL, 'Dummy 1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'R', '601', NULL, NULL),
(39, 1, 'https://www.youtube.com/watch?v=5Peo-ivmupE&ab_channel=BinaryLab', 'Dummy 2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc', 'V', '601', NULL, NULL),
(40, 1, NULL, 'Dummy 2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc', 'R', '601', NULL, NULL),
(41, 2, 'https://www.youtube.com/watch?v=5Peo-ivmupE', 'Dummy 3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'V', '601', NULL, NULL),
(42, 2, NULL, 'Dummy 3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'R', '601', NULL, NULL),
(44, 4, 'https://www.youtube.com/watch?v=D0UnqGm_miA&ab_channel=ShakeelMureed', 'title1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '601', NULL, NULL),
(45, 5, 'https://www.youtube.com/watch?v=yAoLSRbwxL8', 'title1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '601', NULL, NULL),
(52, 6, 'https://www.youtube.com/watch?v=yAoLSRbwxL8&ab_channel=KlienDW', 'title1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '601', NULL, NULL),
(53, 6, NULL, 'title2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'R', '601', NULL, NULL),
(54, 53, NULL, NULL, '', 'Q', '60', NULL, NULL),
(55, 55, NULL, NULL, '', 'Q', '60', NULL, NULL),
(56, 60, '', '', '', 'Q', '60', 0, NULL),
(57, 61, '', '', '', 'Q', '60', 0, NULL),
(58, 63, '', '', '', 'Q', '60', 1, NULL),
(59, 64, '', '', '', 'Q', '60', 0, NULL),
(60, 65, '', '', '', 'Q', '60', 1, NULL),
(72, 3, NULL, 'title1-u', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.-u', 'R', '601', NULL, NULL),
(73, 3, 'https://www.youtube.com/watch?v=yAoLSRbwxL8&ab_channel=KlienDW', 'title2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '601', NULL, NULL),
(74, 3, '', '', '', 'Q', '60', 1, NULL),
(84, 66, '', '', '', 'Q', '60', 1, NULL),
(95, 66, 'https://www.youtube.com/watch?v=yAoLSRbwxL8&ab_channel=KlienDW', 'Testing Video', 'Here COntent about video', 'V', '270', NULL, NULL),
(97, 68, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'from week 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '13', NULL, NULL),
(98, 69, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'from week 2 again', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '13', NULL, NULL),
(100, 78, NULL, 'from weeeeeeeeeeeeeeeeeeek 2', 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. MauriProin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.s efficitur rutrum enim, sed ornare justo hendrerit sed.', 'R', '915', NULL, NULL),
(101, 79, '', '', '', 'Q', '60', 1, NULL),
(102, 80, '', '', '', 'Q', '60', 1, NULL),
(103, 81, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'Week 2 video', 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 'V', '305', NULL, NULL),
(104, 82, NULL, 'Week 2 reading', 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 'R', '610', NULL, NULL),
(105, 83, '', '', '', 'Q', '60', 1, NULL),
(106, 84, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'week 3 video', 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 'V', '610', NULL, NULL),
(107, 85, NULL, 'week 3 reading', 'Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.Proin laoreet, felis ullamcorper mattis suscipit, ex massa interdum eros, et dignissim arcu sem eget urna. Morbi vel rutrum est. Maecenas feugiat aliquam nunc in vehicula. Donec tempus sem eu arcu dictum, quis maximus metus commodo. Quisque feugiat sit amet urna ut cursus. Donec at molestie elit, eget faucibus nisi. Mauris efficitur rutrum enim, sed ornare justo hendrerit sed.', 'R', '610', NULL, NULL),
(108, 86, '', '', '', 'Q', '60', 1, NULL),
(109, 87, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'Topic 1 week 5', 'https://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miAhttps://www.youtube.com/watch?v=D0UnqGm_miA', 'V', '300', NULL, NULL),
(110, 88, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'first topic data', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '305', NULL, NULL),
(111, 89, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'demo week 1 video 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '300', NULL, NULL),
(112, 90, NULL, 'demo week 1 reading 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'R', '260', NULL, NULL),
(113, 91, '', '', '', 'Q', '60', 1, NULL),
(114, 92, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'demo week 2 video 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '300', NULL, NULL),
(115, 93, NULL, 'demo week 2 reading 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'R', '260', NULL, NULL),
(116, 94, '', '', '', 'Q', '60', 1, NULL),
(127, 97, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'From first week hc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '80', NULL, NULL),
(128, 97, NULL, 'From first week hc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'R', '320', NULL, NULL),
(129, 97, '', '', '', 'Q', '60', 1, NULL),
(130, 98, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'From second week hc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '75', NULL, NULL),
(131, 98, NULL, 'From second week hc', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', 'R', '130', NULL, NULL),
(132, 98, '', '', '', 'Q', '60', 1, NULL);
INSERT INTO `topics_data` (`id`, `topic_id`, `video_url`, `video_title`, `content`, `type`, `time`, `quiz_result_status`, `compulsary`) VALUES
(133, 99, NULL, 'From second week', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'R', '60', NULL, NULL),
(134, 106, 'https://www.youtube.com/watch?v=yAoLSRbwxL8', 'Compulsory', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'V', '140', NULL, '1'),
(135, 107, 'https://www.youtube.com/watch?v=yAoLSRbwxL8', 'without compulsory', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'V', '153', NULL, NULL),
(136, 108, NULL, 'Dummy reading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'R', '130', NULL, NULL),
(137, 109, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'Compulsory', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '130', NULL, '1'),
(138, 109, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'without compulsory', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'V', '120', NULL, '1'),
(167, 160, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'Check title new course', 'check video content', 'V', '80', NULL, NULL),
(168, 160, NULL, 'Check reading title new course', 'check reading content', 'R', '70', NULL, NULL),
(169, 161, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'Excel video', 'Excel video content', 'V', '82', NULL, NULL),
(170, 161, NULL, 'Excel reading', 'Excel reading content', 'R', '80', NULL, NULL),
(171, 162, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'Excel Second Week video', 'Excel Second Week video content', 'V', '62', NULL, NULL),
(172, 162, NULL, 'Excel Second Week reading', 'Excel Second Week reading content', 'R', '80', NULL, NULL),
(173, 163, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'Power Point title', 'Power Point content', 'V', '80', NULL, NULL),
(174, 163, NULL, 'Power Point reading title', 'Power Point reading content', 'R', '80', NULL, NULL),
(179, 168, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'topic 1 ccc video title', 'topic 1 ccc content', 'V', '0', NULL, NULL),
(180, 169, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'topic 1 ccc video title', 'topic 1 ccc content', 'V', '15', NULL, NULL),
(181, 169, NULL, 'topic 1 ccc reading title', '<p><strong>topic 1 ccc reading content</strong><br><br><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'R', '120', NULL, NULL),
(182, 170, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'Compulsory', 'Compulsory', 'V', '75', NULL, '1'),
(183, 170, NULL, 'simple reading', '<p><strong>simple reading</strong></p>', 'R', '0', NULL, '1'),
(184, 173, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'check', 'check', 'V', '80', NULL, '1'),
(185, 173, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'check 2', 'check 2', 'V', '20', NULL, ''),
(186, 174, '', '', '', 'Q', '20', 1, ''),
(225, 202, 'https://www.youtube.com/watch?v=yAoLSRbwxL8', 'first topic video title ftp', 'first topic video content ftp', 'V', '12', NULL, ''),
(226, 202, NULL, 'Reading content', '<p>reading content</p>', 'R', '2', NULL, ''),
(227, 202, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'second video title ftp compulsory', 'second video content ftp compulsory', 'V', '15', NULL, '1'),
(228, 202, '', '', '', 'Q', '12', 1, ''),
(229, 203, 'https://www.youtube.com/watch?v=yAoLSRbwxL8', 'Second topic ftp video title', 'Second topic ftp video content', 'V', '15', NULL, ''),
(230, 203, NULL, 'reading title', '<p>reading content</p>', 'R', '0', NULL, ''),
(231, 203, '', '', '', 'Q', '10', 1, ''),
(232, 204, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'trewtwretewr', 'dsafsdafsdafsadgew', 'V', '12', NULL, ''),
(233, 204, NULL, 'trewtwretewr', '<p>sdadasdasdsa</p>', 'R', '1', NULL, ''),
(234, 204, '', '', '', 'Q', '5', 1, ''),
(235, 206, '', '', '', 'Q', '20', 1, ''),
(237, 208, 'https://www.youtube.com/watch?v=D0UnqGm_miA', 'checking', 'checking', 'V', '12', NULL, ''),
(238, 208, NULL, 'reading', '<p>checking</p>', 'R', '615', NULL, ''),
(239, 208, '', '', '', 'Q', '70', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `topics_data_seen`
--

CREATE TABLE `topics_data_seen` (
  `id` int(11) NOT NULL,
  `topics_data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_seen` int(11) NOT NULL DEFAULT 1,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics_data_seen`
--

INSERT INTO `topics_data_seen` (`id`, `topics_data_id`, `user_id`, `is_seen`, `course_id`) VALUES
(3, 38, 3, 1, 1),
(5, 39, 3, 1, 1),
(14, 37, 3, 1, 1),
(15, 41, 3, 1, 1),
(16, 75, 3, 1, 1),
(17, 76, 3, 1, 1),
(18, 40, 5, 1, 1),
(19, 100, 3, 1, 1),
(20, 40, 3, 1, 1),
(21, 42, 3, 1, 1),
(22, 110, 3, 1, 2),
(23, 111, 5, 1, 8),
(24, 112, 5, 1, 8),
(25, 111, 89, 1, 8),
(26, 112, 89, 1, 8),
(27, 115, 89, 1, 8),
(28, 114, 89, 1, 8),
(29, 127, 89, 1, 10),
(30, 128, 89, 1, 10),
(31, 131, 89, 1, 10),
(32, 130, 89, 1, 10),
(33, 133, 89, 1, 10),
(34, 127, 96, 1, 10),
(35, 128, 96, 1, 10),
(37, 127, 97, 1, 10),
(38, 11, 89, 1, 10),
(39, 12, 89, 1, 10),
(40, 12, 3, 1, 2),
(41, 136, 89, 1, 10),
(42, 134, 89, 1, 10),
(43, 135, 89, 1, 10),
(55, 97, 3, 1, 1),
(58, 180, 146, 1, 15),
(59, 182, 146, 1, 15),
(60, 181, 146, 1, 15),
(61, 183, 146, 1, 15),
(67, 225, 146, 1, 14),
(68, 227, 146, 1, 14),
(69, 226, 146, 1, 14),
(70, 232, 146, 1, 14),
(71, 233, 146, 1, 14),
(75, 229, 146, 1, 14),
(76, 230, 146, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_type` int(11) NOT NULL DEFAULT 3,
  `status` varchar(11) DEFAULT 'I',
  `status_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_type`, `status`, `status_login`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$lYyhwoMM8W.omqv.JEpdYepsfDGzeTmLzTr1Q7DaaNmFKk50VJp5a', 'yoQ7A34bpoYs1plKJXwz7PfIMA7jsimk2ATQEJgk', '2021-09-23 00:27:56', '2021-09-23 00:27:56', 1, 'A', 0),
(2, 'Teacher 1', 'teacher1@gmail.com', NULL, '$2y$10$o68Tc8Ga0a3nATjzSQWHXuAJJzSJD.BclmwoTalCXcqtHgh8EyTge', NULL, '2021-09-23 03:17:30', '2021-09-23 03:17:30', 2, 'A', 0),
(3, 'Student 1', 'student1@gmail.com', NULL, '$2y$10$o68Tc8Ga0a3nATjzSQWHXuAJJzSJD.BclmwoTalCXcqtHgh8EyTge', 'pRxZOghw3nX1ItTGV3iHAewk2d4PDGiPJCfFFtsW', '2021-09-23 03:17:30', '2021-09-23 03:17:30', 3, 'A', 0),
(4, 'Teacher 2', 'teacher2@gmail.com', NULL, '$2y$10$o68Tc8Ga0a3nATjzSQWHXuAJJzSJD.BclmwoTalCXcqtHgh8EyTge', NULL, '2021-09-23 03:17:30', '2021-09-23 03:17:30', 2, 'A', 0),
(5, 'Student 2', 'student2@gmail.com', NULL, '$2y$10$o68Tc8Ga0a3nATjzSQWHXuAJJzSJD.BclmwoTalCXcqtHgh8EyTge', NULL, '2021-09-23 03:17:30', '2021-09-23 03:17:30', 3, 'A', 0),
(7, 'Student 3', 'student3@gmail.com', NULL, '$2y$10$Wqk/jfUdlXpEjmeqCcfftuF9lXrFqwwu3BJMwJPxtyjbsMOAoPjqK', '0nZ5CabV9RS3IFsepzwJjU1k1l6NwqdAaO9G7W5Z', '2021-11-10 05:17:01', '2021-11-10 05:17:01', 3, 'A', 0),
(8, 'Student 4', 'student4@gmail.com', NULL, '$2y$10$.bguW425YAbYrbykifTgjuIdFOJxsfpY9ndYg5OyzmU35P6MdAnz6', '0nZ5CabV9RS3IFsepzwJjU1k1l6NwqdAaO9G7W5Z', '2021-11-10 05:20:06', '2021-11-10 05:20:06', 3, 'R', 0),
(9, 'Student 5', 'student5@gmail.com', NULL, '$2y$10$srsAfDp1cdS7mlUBu7lR6.ejHILwtTJE0H7Gjmy78MrNM.tFcBSde', '0nZ5CabV9RS3IFsepzwJjU1k1l6NwqdAaO9G7W5Z', '2021-11-10 05:20:46', '2021-11-10 05:20:46', 3, 'A', 0),
(10, 'Teacher 3', 'teacher3@gmail.com', NULL, '$2y$10$rKjznPAHQLfbKdveJzaQSeB79utBCoTGb.09PWvt3FC2yuwE3w2tS', '0nZ5CabV9RS3IFsepzwJjU1k1l6NwqdAaO9G7W5Z', '2021-11-10 05:21:20', '2021-11-10 05:21:20', 2, 'A', 0),
(11, 'testing', 'testing@gmail.com', NULL, '$2y$10$lJtAHBAAB5zQdwcNjlf3yONXYh2H12X9JcULF/RucbDSSR2Q6mSTa', '0nZ5CabV9RS3IFsepzwJjU1k1l6NwqdAaO9G7W5Z', '2021-11-10 06:49:12', '2021-11-10 06:49:12', 2, 'R', 0),
(12, 'Mubbashir Iftikhar', 'mubbashir9@gmail.com', NULL, '$2y$10$HE3j2qTyyv/wA3QCttK95OJCO0oU78Jibr6Ace77vEzlQspVlDT52', 'EAJg83FjdQ0b0xap7JiujeqGrbsO015ocWhcngFW', '2022-03-11 07:26:28', '2022-03-11 07:26:28', 3, 'A', 0),
(13, 'testing1', 'testing1@gmail.com', NULL, '$2y$10$dG7Bade6RQFe3hmZaqJENOx.IM6HTA.127kQpZ5BqNcyz1xkXSfyO', 'ctRfidtqJ2mC0qydayDov2FkNCSLJE5LiwyQM3Xn', '2022-03-24 03:26:30', '2022-03-24 03:26:30', 3, 'A', 0),
(14, 'user9', 'user9@gmail.com', NULL, '$2y$10$XKkNwe9RsFk9QQOKvHj65Ow0xDDXQH0NkgQNJhiGmtKKWto.ypE7G', 'RF67SLsFv9QOgKTzG506a6OJCxrRxxEdsP8cSaDD', '2022-03-30 21:11:20', '2022-03-30 21:11:20', 3, 'A', 0),
(89, 'Demo', 'demo@gmail.com', NULL, '$2y$10$eIBGQZFk.WSWr13.4aLi7uyTNxT1.M9tMzvMMEdKXi/vSXhaJiacS', 'GaTs4cJ35MzGcXPww4qJiWfnc6wdtX7UhbhUlacl', '2022-11-28 06:00:46', '2022-11-28 06:00:46', 3, 'A', 0),
(96, 'Demo2', 'demo2@gmail.com', NULL, '$2y$10$oFZBgSVFBubA7m6c0MrD9OxDOYrRL6xgRlF8GEBP7Rp1UXWizQrYK', 't8W7FMYQPIPaDvCObH4uKo6DavIjuSer31NI3xeZ', '2022-11-29 01:52:39', '2022-11-29 01:52:39', 3, 'A', 0),
(97, 'Demo 3', 'demo3@gmail.com', NULL, '$2y$10$6drER4c230cGd82lGVuz2esM1KIAxNVF4FE1DqIVv1U443c5ior9K', 'lmiLXuidEfbFjvlxjxUsD5ViaMzUE4WSktUunvBc', '2022-11-29 05:27:55', '2022-11-29 05:27:55', 3, 'A', 0),
(146, 'ansar', 'ansar@gmail.com', NULL, '$2y$10$Hwz.CU1B5EqxLZccsMy8Ruj7Sq4KRtgtjarNx5OOA28mzvz3VeBcS', 'SWnA0xqB22WX16tLAwrzKs4hRwSJab7GJalQI2X7', '2022-12-08 08:48:38', '2022-12-08 08:48:38', 3, 'A', 0),
(151, 'qwerty', 'qwerty@gmail.com', NULL, '$2y$10$VWz85k.sDvzMn1mPP/oEIutMROlGBlxyRgz4ddzxmh1sYeo04wotu', 'tOh0IgOVdqmpUb2gKopsuBGwpn1oeFgRPpgtZC5a', '2022-12-09 02:28:32', '2022-12-09 02:28:32', 3, 'A', 0),
(153, 'teacherr', 'teacherr@gmail.com', NULL, '$2y$10$gPm3gaELrSNfMm6MX/b2uOtgNd4JM0HyynJ2B.XXtGDioMyTrH9OW', 'b1Jf0KOy5asqe3vROvkZhDlf4M0czsI0sn5GA2Ou', '2022-12-12 02:17:55', '2022-12-12 02:17:55', 2, 'A', 0),
(154, 'junaid', 'junaidmasih102@gmail.com', NULL, '$2y$10$gjiJO7i866Zt6gi7OiqkteZmIYUT1sQG2CXixO7GgYyY0PRn.iRmK', 'Z1SLyqCGa69c0zAoJRAX937GXj9C0yTzjxs2Woxs', '2022-12-23 15:18:32', '2022-12-23 15:18:32', 3, 'I', 0);

-- --------------------------------------------------------

--
-- Table structure for table `week_thread`
--

CREATE TABLE `week_thread` (
  `thread_id` int(11) NOT NULL,
  `create_by` bigint(20) UNSIGNED NOT NULL,
  `week_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `thread_title` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `week_thread`
--

INSERT INTO `week_thread` (`thread_id`, `create_by`, `week_id`, `course_id`, `thread_title`, `status`) VALUES
(1, 2, 1, 1, '(Web Development)(Week 1) Discussion', 1),
(2, 2, 4, 1, 'week 2 dicussion', 1),
(3, 2, 8, 1, 'Week 3 discussion', 1),
(4, 2, 13, 8, 'Demo course disscussion', 1),
(5, 2, 14, 8, 'demo course week 2 disscussion', 1),
(6, 2, 15, 8, 'demo course week 3 discussion', 1),
(9, 10, 19, 10, 'week 1 hc discussion', 1),
(10, 10, 20, 10, 'week 2 hc dicussion', 1),
(11, 10, 21, 10, 'discussion week 2 hx', 1),
(12, 153, 32, 14, 'Week 3 discussion form', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_by` (`create_by`),
  ADD KEY `week_id` (`week_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `assessment_answers`
--
ALTER TABLE `assessment_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_by` (`answer_by`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `attempt_id` (`attempt_id`);

--
-- Indexes for table `assessment_attempt`
--
ALTER TABLE `assessment_attempt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attempt_by` (`attempt_by`),
  ADD KEY `assessment_id` (`assessment_id`);

--
-- Indexes for table `assessment_feedbacks`
--
ALTER TABLE `assessment_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_by` (`answer_by`),
  ADD KEY `feedback_by` (`feedback_by`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `assessment_point`
--
ALTER TABLE `assessment_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_by` (`create_by`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_by` (`create_by`),
  ADD KEY `assessment_id` (`assessment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_details`
--
ALTER TABLE `courses_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_weeks`
--
ALTER TABLE `courses_weeks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `week_id` (`week_id`);

--
-- Indexes for table `quiz_question_answer`
--
ALTER TABLE `quiz_question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_question_options`
--
ALTER TABLE `quiz_question_options`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_sub_question_answer`
--
ALTER TABLE `quiz_sub_question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_courses`
--
ALTER TABLE `teachers_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread_msg`
--
ALTER TABLE `thread_msg`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `thread_id` (`thread_id`),
  ADD KEY `msg_by` (`msg_by`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics_data`
--
ALTER TABLE `topics_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics_data_seen`
--
ALTER TABLE `topics_data_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week_thread`
--
ALTER TABLE `week_thread`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `create_by` (`create_by`),
  ADD KEY `week_id` (`week_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `assessment_answers`
--
ALTER TABLE `assessment_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assessment_attempt`
--
ALTER TABLE `assessment_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `assessment_feedbacks`
--
ALTER TABLE `assessment_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assessment_point`
--
ALTER TABLE `assessment_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses_details`
--
ALTER TABLE `courses_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses_weeks`
--
ALTER TABLE `courses_weeks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `quiz_question_answer`
--
ALTER TABLE `quiz_question_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `quiz_question_options`
--
ALTER TABLE `quiz_question_options`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `quiz_sub_question_answer`
--
ALTER TABLE `quiz_sub_question_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students_courses`
--
ALTER TABLE `students_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teachers_courses`
--
ALTER TABLE `teachers_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `thread_msg`
--
ALTER TABLE `thread_msg`
  MODIFY `msg_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `topics_data`
--
ALTER TABLE `topics_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `topics_data_seen`
--
ALTER TABLE `topics_data_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `week_thread`
--
ALTER TABLE `week_thread`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assessment_ibfk_2` FOREIGN KEY (`week_id`) REFERENCES `courses_weeks` (`id`),
  ADD CONSTRAINT `assessment_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `assessment_answers`
--
ALTER TABLE `assessment_answers`
  ADD CONSTRAINT `assessment_answers_ibfk_1` FOREIGN KEY (`answer_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assessment_answers_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`),
  ADD CONSTRAINT `assessment_answers_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `assessment_questions` (`id`),
  ADD CONSTRAINT `assessment_answers_ibfk_4` FOREIGN KEY (`attempt_id`) REFERENCES `assessment_attempt` (`id`);

--
-- Constraints for table `assessment_attempt`
--
ALTER TABLE `assessment_attempt`
  ADD CONSTRAINT `assessment_attempt_ibfk_1` FOREIGN KEY (`attempt_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assessment_attempt_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`);

--
-- Constraints for table `assessment_feedbacks`
--
ALTER TABLE `assessment_feedbacks`
  ADD CONSTRAINT `assessment_feedbacks_ibfk_1` FOREIGN KEY (`answer_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assessment_feedbacks_ibfk_2` FOREIGN KEY (`feedback_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assessment_feedbacks_ibfk_3` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`),
  ADD CONSTRAINT `assessment_feedbacks_ibfk_4` FOREIGN KEY (`question_id`) REFERENCES `assessment_questions` (`id`);

--
-- Constraints for table `assessment_point`
--
ALTER TABLE `assessment_point`
  ADD CONSTRAINT `assessment_point_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assessment_point_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`),
  ADD CONSTRAINT `assessment_point_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `assessment_questions` (`id`);

--
-- Constraints for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  ADD CONSTRAINT `assessment_questions_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assessment_questions_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`);

--
-- Constraints for table `thread_msg`
--
ALTER TABLE `thread_msg`
  ADD CONSTRAINT `thread_msg_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `week_thread` (`thread_id`),
  ADD CONSTRAINT `thread_msg_ibfk_2` FOREIGN KEY (`msg_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `week_thread`
--
ALTER TABLE `week_thread`
  ADD CONSTRAINT `week_thread_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `week_thread_ibfk_2` FOREIGN KEY (`week_id`) REFERENCES `courses_weeks` (`id`),
  ADD CONSTRAINT `week_thread_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
