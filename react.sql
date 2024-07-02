-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2024 at 11:00 AM
-- Server version: 8.0.37-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `react`
--
CREATE DATABASE IF NOT EXISTS `react` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `react`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_background`
--

CREATE TABLE `academic_background` (
  `id` int NOT NULL,
  `degree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_start` date NOT NULL,
  `year_end` date NOT NULL,
  `thesis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor_academic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_sponsor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarship_start` date DEFAULT NULL,
  `scholarship_end` date DEFAULT NULL,
  `extension_start` date DEFAULT NULL,
  `extension_end` date DEFAULT NULL,
  `item_expenses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_approved` int DEFAULT NULL,
  `amount_released` int DEFAULT NULL,
  `date_released` date DEFAULT NULL,
  `added_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_background`
--

INSERT INTO `academic_background` (`id`, `degree`, `major_field`, `sector`, `institution`, `status`, `year_start`, `year_end`, `thesis`, `sponsor_academic`, `primary_sponsor`, `scholarship_start`, `scholarship_end`, `extension_start`, `extension_end`, `item_expenses`, `amount_approved`, `amount_released`, `date_released`, `added_by`) VALUES
(25, 'test1', 'test1', 'test1', 'test1', 'Dropped', '2023-12-08', '2023-12-08', 'test1', 'test1', 'Choose Primary Sponsor', '2023-12-08', '2023-12-08', '2023-12-08', '2023-12-08', '1', 1, 1, '2023-12-08', 56),
(57, 'DOCTOR IN INFORMATION TECHNOLOGY', 'ARTIFICIAL INTELLIGENCE', 'INFORMATION TECHNOLOGY', 'TECHNOLOGICAL INSTITUTE OF THE PHILIPPINES MANILA', 'Ongoing', '2022-01-01', '2024-01-18', '-', NULL, 'Choose Primary Sponsor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79),
(58, 'MASTER OF SCIENCE IN INFORMATION TECHNOLOGY', 'MANAGEMENT INFORMATION SYSTEMS', 'INFORMATION TECHNOLOGY', 'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES MANILA', 'Graduated', '2014-01-01', '2018-01-01', 'UNIVERSITY EXTENSION SERVICES MANAGEMENT SYSTEM WITH BUSINESS ANALYTICS: AN ORGANIZATIONAL TOOL TO ENSURE QUALITY SERVICES TO THE COMMUNITY', NULL, 'Choose Primary Sponsor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79),
(59, 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '-', 'INFORMATION TECHNOLOGY', 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'Graduated', '2006-01-01', '2010-01-01', 'COLLEGE OF ENGINEERING AND COMPUTING SCIENCES COMPUTER LABORATORY USERS’ MONITORING SYSTEM', NULL, 'Choose Primary Sponsor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `title`, `first_name`, `middle_name`, `last_name`, `gender`, `email`, `password`, `dateAdded`) VALUES
(7, 'Prof.', 'Jhorely', 'Cayabyab', 'Gabriel', 'Female', 'jhorelygabriel17@gmail.com', '$2y$10$Yj4WpN5qdZG32Ml5lhpxBeHNNXTRkauFdX34AYgGWBz.qVTWpJCQG', '2024-01-12 08:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `approvalletter`
--

CREATE TABLE `approvalletter` (
  `id` int NOT NULL,
  `approval_letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `id` int NOT NULL,
  `award` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_granted` date NOT NULL,
  `granting_institution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`id`, `award`, `rank`, `category`, `year_granted`, `granting_institution`, `added_by`) VALUES
(12, 'test', 'test', 'Local – National', '2023-12-08', 'test', 56),
(27, 'BEST PRESENTER (TRACK 5 MANAGEMENT INFORMATION SYSTEM AND TECHNOLOGY)', 'FIRST', 'Local – Regional', '2022-01-01', 'NETWORK OF CALABARZON EDUCATIONAL INSTITUTIONS ', 79),
(28, 'BEST PAPER PRESENTER (INFORMATION TECHNOLOGY TRACK)', 'FIRST', 'International', '2021-03-02', 'PHILIPPINE SOCIETY OF INFORMATION TECHNOLOGY EDUCATORS’ FOUNDATION, INC.  AND TAYLOR’S UNIVERSITY', 79),
(29, 'BEST QUANTITATIVE RESEARCH PAPER (FACULTY CATEGORY)', 'SECOND', 'Local – Regional', '2019-05-06', 'NETWORK OF CALABARZON EDUCATIONAL INSTITUTIONS, INC.', 79);

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int NOT NULL,
  `campus_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `campus_name`, `address`, `dateAdded`) VALUES
(83, 'ARASOF - Nasugbu ', 'Nasugbu, Batangas', '2023-12-05 10:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int NOT NULL,
  `create_folder_id` int NOT NULL,
  `added_by` int NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `create_folder_id`, `added_by`, `category`, `path`, `file_name`, `date_added`) VALUES
(225, 85, 79, 'Accomplishment Report', '1706610939392.pdf', 'MARASIGAN - COG 4Y1S.pdf', '2024-01-30 18:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int NOT NULL,
  `campus_id` int NOT NULL,
  `college_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation_college` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `campus_id`, `college_name`, `abbreviation_college`, `dateAdded`) VALUES
(42, 83, 'College of Informatics and Computing Sciences', 'CICS', '2023-12-05 10:51:47'),
(44, 83, 'College of Accountancy, Business, Economics and International Hospitality Management', 'CABEIHM', '2023-12-05 15:01:07'),
(47, 83, 'College of Arts and Sciences', 'CAS', '2023-12-05 15:20:42'),
(48, 83, 'College of Nursing and Allied Health Sciences', 'CONAHS', '2023-12-05 15:21:21'),
(49, 83, 'College of Teacher Education', 'CTE', '2024-01-14 09:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` int NOT NULL,
  `themetitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `participation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_conference` date NOT NULL,
  `to_conference` date NOT NULL,
  `added_by` int NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `themetitle`, `conference_title`, `organizer`, `venue`, `participation`, `conference`, `from_conference`, `to_conference`, `added_by`, `dateAdded`) VALUES
(20, 'test', '', 'test', 'test', 'Resource Person', 'Local', '2002-09-23', '2002-09-23', 56, '2023-12-08 00:00:00'),
(24, 'test3', '', 'test3', 'test3', 'Paper Presenter', 'Local', '2024-12-31', '2024-12-02', 56, '2023-12-20 00:00:00'),
(27, 'test4', '', 'test4', 'test4', 'Paper Presenter', 'International', '2023-02-12', '2024-01-01', 73, '2023-12-21 00:00:00'),
(28, '-', '', '-', '-', 'Paper Presenter', 'International', '2024-12-17', '2024-12-25', 73, '2023-12-21 00:00:00'),
(46, 'TARA: TRACKING AND ROUTING APPLICATION FOR PUV DRIVERS AND COMMUTERS WITH GPS TECHNOLOGY', '15TH NOCEI RESEARCH FORUM', 'NETWORK OF CALABARZON EDUCATIONAL INSTITUTIONS', 'VIRTUAL', 'Resource Person', 'Local – Regional', '2022-06-03', '2022-06-03', 79, '2024-01-18 02:48:54'),
(47, 'BATIS: BATSTATEU ALUMNI TRACER INFORMATION SYSTEM WITH GEOSPATIAL MAPPING AND DATA ANALYSIS', 'RESEARCH COLLOQUIUM 2021', 'BATANGAS STATE UNIVERSITY ', 'VIRTUAL', 'Paper Presenter', 'Local - In-house', '2021-11-29', '2021-11-29', 79, '2024-01-18 02:50:16'),
(48, 'MET: A WEB-BASED MONITORING AND EVALUATION OF TARGET EXTENSION PROGRAM, ACTIVITIES AND PROJECTS (PAPS)', '2ND INTERNATIONAL CONFERENCE ON INFORMATION TECHNOLOGY EDUCATION  ICITE 2021', 'PHILIPPINE SOCIETY OF INFORMATION TECHNOLOGY EDUCATORS’ FOUNDATION, INC. AND TAYLOR’S UNIVERSITY', 'VIRTUAL', 'Poster Presenter', 'Local – National', '2021-10-27', '2021-10-29', 79, '2024-01-18 02:51:29'),
(49, 'UNIVERSITY EXTENSION SERVICES MANAGEMENT SYSTEM WITH BUSINESS ANALYTICS: AN ORGANIZATIONAL TOOL TO ENSURE QUALITY SERVICES TO THE COMMUNITY', '13TH NOCEI RESEARCH FORUM', 'NETWORK OF CALABARZON EDUCATIONAL INSTITUTIONS, INC.', 'DE LA SALLE LIPA, LIPA CITY, BATANGAS', 'Participant', 'Local – Regional', '2019-04-24', '2019-04-24', 79, '2024-01-18 02:52:52'),
(50, 'e-SERB SYSTEM: AN EVALUATION TOOL FOR EXTENSION SERVICES PROJECTS', '7TH INTERNATIONAL INFORMATION TECHNOLOGY CONFERENCE', 'STEPUP INTERNATIONAL SERVICES, INC.', 'ATENEO DE MANILA UNIVERSITY, MANILA CITY', 'Participant', 'International', '2018-09-22', '2018-09-22', 79, '2024-01-18 02:55:11'),
(51, 'MET: A WEB-BASED MONITORING AND EVALUATION OF TARGET EXTENSION PROGRAM, ACTIVITIES AND PROJECTS (PAPS)', 'RESEARCH COLLOQUIUM 2018', 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'Resource Person', 'Local - In-house', '2018-04-05', '2018-04-05', 79, '2024-01-18 02:56:19'),
(52, 'AWARENESS, ACCEPTANCE AND PERCEPTION OF CECS FEMALE AND MALE STAKEHOLDERS TOWARDS ITS VISION, MISSION, GOALS AND OBJECTIVES', 'BATSTATEU TRIANGULAR RESEARCH CONFERENCE 2017', 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'Paper Presenter', 'Local - In-house', '2017-11-21', '2017-11-21', 79, '2024-01-18 02:57:27'),
(53, 'GENDER MAINSTREAMING IN STUDENT’S LEVEL OF INTEREST AND ACADEMIC PERFORMANCE', 'GAD RESEARCH COLLOQUIUM 2016', 'BATANGAS STATE UNIVERSITY MAIN', 'BATANGAS STATE UNIVERSITY MAIN', 'Paper Presenter', 'Local - In-house', '2016-11-03', '2016-11-03', 79, '2024-01-18 02:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `create_folder`
--

CREATE TABLE `create_folder` (
  `id` int NOT NULL,
  `createfolder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `create_folder`
--

INSERT INTO `create_folder` (`id`, `createfolder`, `added_by`) VALUES
(56, 'Cabeihm', 73),
(71, 'Report', 56),
(73, 'Altyyir', 94),
(76, 'Accomplishment Report', 79),
(79, 'Approved Project Proposal', 79),
(80, 'Process Report', 79),
(82, 'Financial Report', 79),
(83, 'Progress Report', 79),
(85, 'BATIS', 79);

-- --------------------------------------------------------

--
-- Table structure for table `ctc`
--

CREATE TABLE `ctc` (
  `id` int NOT NULL,
  `title_ctc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue_ctc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_ctc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer_ctc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_ctc` date NOT NULL,
  `to_ctc` date NOT NULL,
  `added_by` int NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ctc`
--

INSERT INTO `ctc` (`id`, `title_ctc`, `venue_ctc`, `conference_ctc`, `organizer_ctc`, `from_ctc`, `to_ctc`, `added_by`, `dateAdded`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Local', 'Batangas State University', '2023-12-08', '2023-12-08', 63, '2023-12-30 00:00:00'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Batangas State University Arasof -Nasugbu', 'Local', 'Batangas State University', '2023-12-30', '2023-12-30', 77, '2023-12-30 00:00:00'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'International', 'Batangas State University', '2023-12-31', '2023-12-31', 77, '2023-12-30 00:00:00'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Local', 'Batangas State University', '2024-01-06', '2024-02-03', 77, '2024-01-06 00:00:00'),
(10, 'testing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'International', 'Batangas State University', '2024-01-06', '2024-01-06', 77, '2024-01-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int NOT NULL,
  `name_cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int NOT NULL,
  `agency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plantilla_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_start` date NOT NULL,
  `appointment_end` date NOT NULL,
  `monthly_salary` int NOT NULL,
  `added_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`id`, `agency`, `plantilla_position`, `status`, `appointment_start`, `appointment_end`, `monthly_salary`, `added_by`) VALUES
(15, 'test', 'test', 'Temporary', '2023-12-08', '2023-12-08', 20000, 56),
(16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Temporary', '2023-12-22', '2024-01-06', 20000, 56),
(33, 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'ASSISTANT  PROFESSOR II', 'Permanent', '2022-10-26', '2024-01-18', 38150, 79),
(34, 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'INSTRUCTOR I', 'Permanent', '2019-01-02', '2022-10-25', 26336, 79),
(35, 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'INSTRUCTOR I', 'Temporary', '2017-01-08', '2019-01-02', 22938, 79),
(36, 'BATANGAS STATE UNIVERSITY ARASOF-NASUGBU', 'INSTRUCTOR I', 'Contratual', '2013-06-24', '2017-05-30', 21387, 79),
(37, 'test', 'test', 'Permanent', '2024-01-27', '2024-01-27', 1, 79);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int NOT NULL,
  `research_topic_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `unit_cost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `research_topic_id`, `category`, `item_description`, `quantity`, `unit_cost`) VALUES
(170, '02ccedc8-b55d-11ee-b2e8-b6cba992334b', 'supplies and materials', '', 1, 14000),
(171, '02ccedc8-b55d-11ee-b2e8-b6cba992334b', 'supplies and materials', 'Bond Paper, Ink, Specialty Board', 1, 10000),
(172, '02ccedc8-b55d-11ee-b2e8-b6cba992334b', 'supplies and materials', 'Other Supplies', 1, 64000),
(173, '02ccedc8-b55d-11ee-b2e8-b6cba992334b', 'supplies and materials', 'Mobile (Prepaid Card)', 1, 12000),
(174, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'training expenses', 'Research unit personnel', 75, 2500),
(175, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'supplies and materials', 'Office Supplies', 1, 5803),
(176, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'internet expenses', 'Mobile (12 mos)', 60, 500),
(177, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'subscription expenses', 'UI Themes and Plugins', 1, 5000),
(178, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'subscription expenses', 'Virtual Private Server Hosting', 6, 5000),
(179, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'other professional services', 'Full Stack Developer', 1, 111244),
(180, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'other professional services', 'Data Analyst', 1, 35395),
(181, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'other professional services', 'QA Specialist', 1, 5058),
(182, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'other financial charges', 'Presentation Support and Incentive', 1, 35000),
(183, 'a9534322-b556-11ee-b2e8-b6cba992334b', 'other financial charges', 'Publication Support and Incentive', 1, 105000),
(184, 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 'local', '', 1, 10000),
(186, 'b2e4a1f2-bcec-11ee-9987-b42e99640312', 'supplies and materials', 'Arduino Uno R3', 1, 299);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_user`
--

CREATE TABLE `faculty_user` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_id` int DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `authority` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_user`
--

INSERT INTO `faculty_user` (`id`, `title`, `first_name`, `middle_name`, `last_name`, `gender`, `email`, `password`, `college_id`, `status`, `authority`, `image_path`, `date_created`) VALUES
(56, 'Asst. Prof.', 'Renz Mervin', 'V.', 'Salac', 'Male', 'renz.salac@g.batstate-u.edu.ph', '$2y$10$iARYwzPNk3L4X.Pkza2PPOYCkbUdZ9tObQdSV.89i5Erflc0Hr9Lq', 42, '1', 'Faculty Researcher', NULL, '2023-12-06 00:00:00'),
(57, 'Dr.', 'Froilan', 'G.', 'Destreza', 'Male', 'admin@g.batstate-u.edu.ph', '$2y$10$pBgPxM6TV29ZpPh5ZzEbBeods8bytAY0bBpHzt8I02DKVeum2LkEW', NULL, '1', 'System Admin', '../profile_upload/sheesshhhhh.png', '2023-12-06 00:00:00'),
(58, 'Dr.', 'Lorissa Joanna', 'E.', 'Buenas', 'Female', 'cics.nasugbu@g.batstate-u.edu.ph', '$2y$10$G9ojkkJEQF8wOLkVleOBzuRdNEmEXjBu200dUytZ3UskFidDlQu5y', 42, '1', 'Dean/Associate Dean', '1705394982662.png', '2023-12-06 00:00:00'),
(59, 'Asst. Prof.', 'Renalyn', 'D.', 'Malabanan', 'Male', 'conahs.nasugbu@g.batstate-u.edu.ph', '$2y$10$mQou3g9n43Ig.5u64f4q5eQGqRi0E3z0048VsIFhn1FkfEeDoXkKe', 48, '1', 'Dean/Associate Dean', '', '2023-12-06 00:00:00'),
(60, 'Dr.', 'Maria Luisa', 'A.', 'Valdez', 'Female', 'cas.nasugbu@g.batstate-u.edu.ph', '$2y$10$ScBvnUkyDZAi3K0dzAvYgO7cXzdwFO59ZsXcqcDTMV75ZTQkv2yB.', 47, '1', 'Dean/Associate Dean', '', '2023-12-06 00:00:00'),
(61, 'Dr.', 'Anamia', 'B.', 'Aquino', 'Female', 'cte.nasugbu@g.batstate-u.edu.ph', '$2y$10$mo9hk40g6Hs0JuTc.0.H8O5fqJZw/7r4eAFWi4Up7q/KGDxQEvnpe', 49, '1', 'Dean/Associate Dean', '', '2023-12-06 00:00:00'),
(62, 'Assoc. Prof.', 'Mayette', 'A.', 'Cananea', 'Select Gender', 'cabeihm.nasugbu@g.batstate-u.edu.ph', '$2y$10$y6nQLIGm926DNA0FOD/gsOXZQp9P5xcPMrEGGflYHSvxRnwW3TzqC', 44, '1', 'Dean/Associate Dean', '', '2023-12-06 00:00:00'),
(64, 'Dr.', 'Carmina', 'L.', 'Caurez', 'Female', 'head.nasugbu@g.batstate-u.edu.ph', '$2y$10$ow2lu3VJHPX4GWRGAfcRZO5P/DG9rOKM8728ZtJgD56KdXcfiNO6q', NULL, '1', 'Head Research', '1705402216543.png', '2023-12-06 00:00:00'),
(65, 'Dr.', 'Froilan', 'G.', 'Destreza', 'Male', 'vcrdes.nasugbu@g.batstate-u.edu.ph', '$2y$10$fbkPiMiq.A4sqy/BgHOOAeSk7eWeE2Y.PnkeGKJL6CZmpuV.wBJaq', NULL, '1', 'Vice Chancellor for Research, Development & Extension Services', '1705401765868.png', '2023-12-06 00:00:00'),
(66, 'Mr.', 'Carl Joriz Mickeal', 'Sale', 'Marasigan', 'Male', '20-72800@g.batstate-u.edu.ph', '$2y$10$ZvXmQzYtw/8g27Hc1xnqmesBW32PB6TpWIstkdmx/Ct9n/f72pDpe', 42, '1', 'Faculty Researcher', '', '2023-12-08 00:00:00'),
(69, 'example1', 'example1', 'example1', 'example1', 'Female', 'example1@g.batstate-u.edu.ph', '$2y$10$qNXkVwGgVUaw2fonQtfg2OdnAsMqNtZMq7UEjK7lJOMYx1OYWS3a2', 42, '1', 'Faculty Researcher', '', '2023-12-08 00:00:00'),
(71, 'test', 'test', 'test', 'test', 'Male', 'test@gmail.com', '$2y$10$Gq4gsdDJmcn7F38lC2nmHec34jFwgbwdZB2Ha243OnKdlbpqJLmPW', 42, '1', 'Faculty Researcher', '', '2023-12-13 00:00:00'),
(73, 'example', 'example', 'example', 'example', 'Female', 'example@g.batstate-u.edu.ph', '$2y$10$2I1H4QLjitd2L670On8zFeCdm4pwncQ4fNhJy8JQiALFhLXfMLeOG', 44, '1', 'Faculty Researcher', '', '2023-12-13 00:00:00'),
(77, 'Asst. Prof', 'Djoanna Marie ', 'V.', 'Salac', 'Female', 'cics.research@g.batstate-u.edu.ph', '$2y$10$IG.9mOCMgeqZz0WiqVEIt.aAlnItbZOQcMyLZw/8Qkfw7Y4ML0zPG', 42, '1', 'College Research Coordinator', '1705396774952.jpeg', '2023-12-13 00:00:00'),
(79, 'Asst. Prof.', 'Noelyn', 'Mandanas', 'De Jesus', 'Female', 'noelyn.dejesus@g.batstate-u.edu.ph', '$2y$10$.icfahYy/hANuX.AEu4AlOtKQjgHjN8xWNoILNkZMFEpAE1ZoHJgG', 42, '1', 'Faculty Researcher', '1705392245613.png', '2023-12-14 00:00:00'),
(81, 'Ms.', 'Jhorely', 'Cayabyab', 'Gabriel', 'Female', 'jhorelygabriel@gmail.com', '$2y$10$D4cwDfm6iMbc.sFpeGZ4DuI0fx..N1Y2wGHg2npa5dRaAPNDehFpS', 42, '1', 'Faculty Researcher', '', '2023-12-20 00:00:00'),
(82, 'Ms.', 'Erlyn', 'Sermania', 'Andrin', 'Female', 'erlynandrin@gmail.com', '$2y$10$GqaxLBNdSEx5r24kA04UsOHAas1AEjdfbRupMQzEvaV7ILRJhX6am', 47, '0', 'Faculty Researcher', '', '2023-12-23 00:00:00'),
(84, 'example', 'example', 'example', '-', 'Male', 'example110@g.batstate-u.edu.ph', '$2y$10$NsTmFND4Nf.iQ0wqs768hOoIFuX4yVlmzpEdTF7RoJ1ECgAK3xpba', 47, '0', 'Faculty Researcher', '', '2024-01-04 00:00:00'),
(88, 'test', 'test', 'test', 'test', 'Female', 'exampleexample@g.batstateu.edu.ph', '$2y$10$BZTy1CB6KckF5s8fTYnFYe3nLXEtMORmBhkU8ArwJQW9ZvAJ5c09y', 44, '0', 'Faculty Researcher', '', '2024-01-10 00:00:00'),
(89, 'example1', 'example1', 'example1', 'example1', 'Female', 'example12@g.batstate-u.edu.ph', '$2y$10$a/WwyPAhZny02uDP.sy6Pu2Brrn3fPJD2ptBmb/ZaT.POkMZiiHT.', 42, '1', 'Faculty Researcher', '', '2024-01-10 00:00:00'),
(90, 'Testing', 'test1', 'test1', 'test1', 'Female', 'test1@g.batstate-u.edu.ph', '$2y$10$Xrfwy2ShY8lUbh5Ef646xuXdMZ.YrqmNPHOocIXFL6dEuwieddHy.', NULL, '1', 'System Admin', '/images/profile.jpeg', '2024-01-12 11:40:31'),
(93, 'test', 'test', 'test', 'test', 'Male', 'test1001@g.batstate-u.edu.ph', '$2y$10$KUdGrtKSPhPWOWV3yYPfouikhsk17bH6crwWyl4nB8VX4uJOoqbzO', 42, '1', 'Faculty Researcher', NULL, '2024-01-13 17:00:45'),
(94, 'Mr.', 'Carl Joriz Mickeal', 'S.', 'Marasigan', 'Male', 'carl.marasigan@gmail.com', '$2y$10$R42Iul4.V9vFqn3g4fihG.uTO6vWLEB5eXeuNwfdm4rQb1RmUoCY.', 49, '1', 'Faculty Researcher', '/images/profile.jpeg', '2024-01-14 18:18:04'),
(97, 'Asst. Prof', 'Noelyn', 'Mandanas', 'De Jesus', 'Female', 'noelyndejesus@g.batstate-u.edu.ph', '$2y$10$hH1LXEoKUj1wMF9ZaElhF.XDeeOBiYfxhfa8Vi0P/MJzBTB.0qxum', 42, '1', 'Faculty Researcher', NULL, '2024-01-18 13:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `inventions`
--

CREATE TABLE `inventions` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patent_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal_author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inventions` date NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipo_registration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventions`
--

INSERT INTO `inventions` (`id`, `title`, `right_type`, `patent_no`, `principal_author`, `date_inventions`, `country`, `ipo_registration`, `added_by`, `dateAdded`) VALUES
(13, 'test', 'Patent', 'test', 'test', '2023-12-08', 'Bahrain', 'inventions_upload/FRIAS PROJ SIR PAYTAREN.pdf', 56, '2023-12-20 00:00:00'),
(16, 'test3', 'Patent', 'test3', 'test3', '2024-12-02', 'Belgium', 'inventions_upload/JHORELY GABRIEL (1).pdf', 56, '2023-12-20 00:00:00'),
(18, 'test', 'Patent', '1', '-', '2023-03-02', 'Philippines', '', 79, '2023-12-20 00:00:00'),
(19, '-', 'Utility Model', '-', '-', '2023-12-12', 'Bahrain', 'inventions_upload/SURVEYFORM-REACT_version3approved.pdf', 73, '2023-12-21 00:00:00'),
(20, '-', 'Copyright', '-', '-', '2024-12-12', 'Bahrain', 'inventions_upload/SURVEYFORM-REACT_version3approved.pdf', 73, '2023-12-21 00:00:00'),
(21, 'test3', 'Copyright', 'test3', 'test3', '2023-12-30', 'Bahrain', 'inventions_upload/SURVEYFORM-REACT_version3approved (1).pdf', 56, '2023-12-30 00:00:00'),
(22, 'test5', 'Utility Model', '-', '-', '2023-12-30', 'Belarus', 'inventions_upload/SURVEYFORM-REACT_version3approved (1).pdf', 56, '2023-12-30 00:00:00'),
(29, '-', 'Patent', '-', '-', '2024-01-13', 'Barbados', '', 79, '2024-01-13 19:56:41'),
(35, 'TEST', 'Utility Model', '-', '-', '2024-01-16', 'Philippines', 'ReAcT-Chapter-1-5-fourth.pdf', 79, '2024-01-16 21:04:12'),
(36, 'Test inventions', 'Patent', '1', 'Test inventions', '2024-01-27', 'Philippines', 'MARASIGAN - COR 4Y1S.pdf', 79, '2024-01-27 15:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `category`, `description`, `date_added`) VALUES
(8, 79, 'personal profiles', 'has added his/her personal profile.', '2024-01-27 12:02:25'),
(9, 79, 'personal profiles', 'has updated his/her personal profile.', '2024-01-27 12:08:26'),
(10, 79, 'personal profiles', 'has updated his/her personal profile.', '2024-01-27 15:19:44'),
(11, 79, 'academic background', 'has updated his/her academic background.', '2024-01-27 15:37:33'),
(12, 79, 'employment', 'has added his/her employment.', '2024-01-27 15:39:12'),
(13, 79, 'employment', 'has updated his/her employment.', '2024-01-27 15:41:16'),
(14, 79, 'specialization', 'has updated his/her specialization.', '2024-01-27 15:44:03'),
(15, 79, 'awards', 'has updated his/her awards.', '2024-01-27 15:46:33'),
(16, 79, 'conferences', 'has updated his/her conferences.', '2024-01-27 15:48:39'),
(17, 79, 'project profiles', 'has updated his/her project profiles.', '2024-01-27 15:50:14'),
(18, 79, 'inventions', 'has updated his/her inventions.', '2024-01-27 15:53:29'),
(19, 79, 'inventions', 'has added his/her inventions.', '2024-01-27 15:53:54'),
(20, 79, 'research topic', 'has added his/her research topic.', '2024-01-27 16:18:49'),
(21, 79, 'research topic', 'has updated his/her research topic.', '2024-01-27 16:19:28'),
(22, 79, 'certificates', 'has added his/her certificates.', '2024-01-27 16:24:04'),
(23, 79, 'certificates', 'has added his/her certificates.', '2024-01-30 18:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_profile`
--

CREATE TABLE `personal_profile` (
  `id` int NOT NULL,
  `title_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofbirth` date NOT NULL,
  `placeofbirth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilstatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailprimary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailsecondary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` int NOT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_profile`
--

INSERT INTO `personal_profile` (`id`, `title_profile`, `lastname`, `firstname`, `middlename`, `dateofbirth`, `placeofbirth`, `civilstatus`, `gender`, `citizenship`, `mobileno`, `emailprimary`, `emailsecondary`, `region`, `province`, `barangay`, `sss`, `zipcode`, `profile_pic`, `added_by`) VALUES
(25, 'Asst. Prof.', 'Salac', 'Renz Mervin', 'V.', '2023-12-08', 'Nasugbu, Batangas', 'Married', 'Female', 'Filipino', '12332423432', 'renz.salac@g.batstate-u.edu.ph', 'renz.salac@g.batstate-u.edu.ph', 'CALABARZON', 'Batangas', 'Brgy 6.', 'P.Zalvadea St.', 4231, 'personal-profile-upload/6572b9a0d0086.png', 56),
(29, 'Mr.', 'exam', 'e', 'example', '2021-11-01', 'Nasugbu, Batangas', 'Single', 'Male', 'Filipino', '097372673672', 'example@g.batstate-u.edu.ph', '', 'CALABARZON', 'Batangas', 'BARANGAY III', 'P.Zalvadea St.', 4231, 'personal-profile-upload/658ee3395c28e.', 73),
(44, 'Asst. Prof.', 'Dejesus', 'Noelyn', 'Mandanas', '2002-09-23', 'Batangas, Philippines', 'Single', 'Female', 'Filipino', '09153257837', 'noelyn.dejesus@g.batstate-u.edu.ph', 'noelyn.dejesus@g.batstate-u.edu.ph', 'CALABARZON', 'Batangas', 'Barangas', 'State', 4231, 'personal-profile-upload/65b481ba7cb73.png', 79);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int NOT NULL,
  `college_id` int NOT NULL,
  `abbreviation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `college_id`, `abbreviation`, `program`, `dateAdded`) VALUES
(54, 49, 'BSIT', 'Bachelor of Science in Information Technology', '2024-01-07 00:00:00'),
(56, 42, 'BSIT', 'Bachelor of Science in Information Technology', '2024-01-07 00:00:00'),
(57, 44, 'BSMA', 'Bachelor of Science in Management Accounting', '2024-01-07 00:00:00'),
(58, 44, 'BSBA', 'Bachelor of Science in Business Administration', '2024-01-07 00:00:00'),
(59, 44, 'BSHM', 'Bachelor of Science in Hospitality Management', '2024-01-07 00:00:00'),
(60, 44, 'BSTM', 'Bachelor of Science in Tourism Management', '2024-01-07 00:00:00'),
(61, 47, 'BAC', 'Bachelor of Arts in Communication', '2024-01-07 00:00:00'),
(62, 47, 'BSP', 'Bachelor of Science in Psychology ', '2024-01-07 00:00:00'),
(63, 47, 'BSFT', 'Bachelor of Science in Food Technology', '2024-01-07 00:00:00'),
(64, 47, 'BSC', 'Bachelor of Science in Criminology', '2024-01-07 00:00:00'),
(65, 47, 'BSFAS', 'Bachelor of Science in Fisheries and Aquatic Sciences', '2024-01-07 00:00:00'),
(66, 48, 'BSN', 'Bachelor of Science in Nursing', '2024-01-07 00:00:00'),
(67, 48, 'BSND', 'Bachelor of Science in Nutrition and Dietetics', '2024-01-07 00:00:00'),
(68, 49, 'BEED', 'Bachelor of Elementary Education', '2024-01-07 00:00:00'),
(69, 49, 'BPED', 'Bachelor of Physical Education', '2024-01-07 00:00:00'),
(70, 42, 'BSED', 'Bachelor of Secondary Education', '2024-01-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_profile`
--

CREATE TABLE `project_profile` (
  `id` int NOT NULL,
  `titleprogram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titleproject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeproject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fundinginstitution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typefundinginstitution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `implementingagency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coimplementingagency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `positionproject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_project` date NOT NULL,
  `to_project` date NOT NULL,
  `projectsite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_profile`
--

INSERT INTO `project_profile` (`id`, `titleprogram`, `titleproject`, `typeproject`, `fundinginstitution`, `typefundinginstitution`, `implementingagency`, `coimplementingagency`, `positionproject`, `status`, `sector`, `from_project`, `to_project`, `projectsite`, `file`, `added_by`) VALUES
(45, '', 'BATIS: BATSTATEU ALUMNI TRACER INFORMATION SYSTEM WITH GEOSPATIAL MAPPING AND DATA ANALYSIS', 'Basic Research', '', 'International', '-', '', 'Research & Development Staff', 'Ongoing', 'Agricultural Resources Management', '2022-02-04', '2024-01-18', '', '1705518137781.pdf', 79),
(46, '', 'MET: A WEB-BASED MONITORING AND EVALUATION OF TARGET EXTENSION PROGRAM, ACTIVITIES AND PROJECTS (PAPS)', 'Applied Research', NULL, 'National', '-', NULL, 'Project Leader', 'Completed with Terminal Report', 'Agricultural Resources Management', '2018-03-03', '2019-02-03', NULL, '1705518230778.pdf', 79);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `representative`
--

CREATE TABLE `representative` (
  `id` int NOT NULL,
  `research_representatives_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `representative`
--

INSERT INTO `representative` (`id`, `research_representatives_id`, `name`, `designation`) VALUES
(91, NULL, 'Mr. Inocencio C. Madriaga Jr., MSIT', 'Project Staff'),
(139, NULL, 'Assoc. Prof. Sandy M. Gonzales', 'Campus Director'),
(140, NULL, 'Asst. Prof. Rosana C. Lat', 'Vice Chancellor for Research, Development and Extension Services'),
(155, NULL, ' Ms. Kristine Grace B. Estilo', 'Project Staff'),
(156, '9dd635f7-b5aa-11ee-b2e8-b6cba992334b', 'Dr. Lorissa Joana E. Buenas', 'Project Leader'),
(157, '9dd63910-b5aa-11ee-b2e8-b6cba992334b', 'Ms. Noelyn M. De Jesus, MSIT', 'Project Staff'),
(158, '9dd63b4d-b5aa-11ee-b2e8-b6cba992334b', 'Assoc. Prof. Lorenjane E. Balan, MSIT', 'Project Staff'),
(159, '9dd63d1e-b5aa-11ee-b2e8-b6cba992334b', 'Mr. Inocencio C. Madriaga Jr., MSIT', 'Project Staff'),
(160, '5015d66c-b5b5-11ee-b2e8-b6cba992334b', ' Asst. Prof. Djoanna Marie V. Salac', 'Assistant Professor IV - Permanent'),
(161, '5015d8c7-b5b5-11ee-b2e8-b6cba992334b', 'Asst. Prof. Noelyn M. De Jesus', ' Assistant Professor II - Permanent'),
(162, '5015dac2-b5b5-11ee-b2e8-b6cba992334b', ' Prof. Froilan G. Destreza', ' Professor I - Permanent'),
(163, '5015dc7b-b5b5-11ee-b2e8-b6cba992334b', 'Asst. Prof. Renz Mervin A. Salac', ' Assistant Professor IV - Permanent'),
(164, NULL, ' Ms. Kristine Grace B. Estilo', 'Instructor I - Permanent'),
(165, 'cbb2561f-b5c5-11ee-b2e8-b6cba992334b', 'Assoc. Prof. Maria Theresa A. Hernandez', 'Asst. Director for Gender and Development Advocacies'),
(166, 'cbb257ec-b5c5-11ee-b2e8-b6cba992334b', 'Dr. Joy M. Reyes', 'Campus Director'),
(167, 'cbb257ec-b5c5-11ee-b2e8-b6cba992334b', 'Dr. Philip Y. Del Rosario', 'Chancellor'),
(168, 'cbb25986-b5c5-11ee-b2e8-b6cba992334b', 'Dr. Jodi Belina A. Bejer', 'Campus Director'),
(169, 'cbb25986-b5c5-11ee-b2e8-b6cba992334b', 'Dr. Tirso A. Ronquillo', 'University President'),
(177, 'c9e1a043-bcec-11ee-9987-b42e99640312', 'Asst. Prof. Djoanna Marie V. Salac', 'Adviser'),
(178, 'c9e1a522-bcec-11ee-9987-b42e99640312', 'Dr. Lorissa Joana E. Buenas', 'Chairman Committee'),
(179, 'c9e1a522-bcec-11ee-9987-b42e99640312', 'Asst. Prof. Benjie R. Samonte', 'Committee Member'),
(180, 'c9e1a522-bcec-11ee-9987-b42e99640312', 'Asst. Prof. Renz Mervin A. Salac', 'Committee Member'),
(181, 'c9e1aed0-bcec-11ee-9987-b42e99640312', 'Angelo Mitchel D. Novero', 'Leader'),
(182, 'c9e1aed0-bcec-11ee-9987-b42e99640312', 'Carl Joriz Mickeal S. Marasigan', 'Programmer'),
(183, 'c9e1aed0-bcec-11ee-9987-b42e99640312', 'Jake Angelo D. Cahayon', 'Design');

-- --------------------------------------------------------

--
-- Table structure for table `representative_roles`
--

CREATE TABLE `representative_roles` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `representative_roles`
--

INSERT INTO `representative_roles` (`id`, `name`, `designation`) VALUES
('5633de9a-5318-11ee-aea5-0a0027000002', 'Dr. Tirso A. Ronquillo', 'University President'),
('56347be7-5318-11ee-aea5-0a0027000002', 'Dr. Charmaine Rose I. Trivino', 'Vice President for Academic Affairs'),
('56347ce6-5318-11ee-aea5-0a0027000002', 'Assoc. Prof. Albertson D. Amante', 'Vice for Research Development and Extension Services'),
('56347d12-5318-11ee-aea5-0a0027000002', 'Atty. Luzviminda V. Rosales', 'Vice President for Administrator and Financer'),
('56347d3b-5318-11ee-aea5-0a0027000002', 'Atty. Noel Alberto S. Omandap', 'Vice President for Development and External Affairs'),
('56347d5f-5318-11ee-aea5-0a0027000002', 'Dr. Expedito V. Acorda', 'Chancellor'),
('56347d89-5318-11ee-aea5-0a0027000002', 'Dr. Rosalinda M. Comia', 'Campus Director'),
('56347da9-5318-11ee-aea5-0a0027000002', 'Assoc. Prof. Sandy M. Gonzales', 'Campus Director'),
('56347dce-5318-11ee-aea5-0a0027000002', 'Dr. Joy M. Reyes', 'Campus Director'),
('56347ebc-5318-11ee-aea5-0a0027000002', 'Dr. Jessie A. Montalbo', 'Chancellor'),
('56347ede-5318-11ee-aea5-0a0027000002', 'Dr. Rhobert E. Alvarez', 'Capus Director'),
('56347f03-5318-11ee-aea5-0a0027000002', 'Dr. Romel U. Briones', 'Campus Director'),
('56347f23-5318-11ee-aea5-0a0027000002', 'Dr. Jodi Belina A. Bejer', 'Campus Director'),
('56347f43-5318-11ee-aea5-0a0027000002', 'Atty. Alvin R. De Silva', 'Chancellor'),
('56347f63-5318-11ee-aea5-0a0027000002', 'Dr. Philip Y. Del Rosario', 'Chancellor'),
('56347f84-5318-11ee-aea5-0a0027000002', 'Dr. Enrico M. Dalangin', 'Chancellor'),
('56347fa3-5318-11ee-aea5-0a0027000002', 'Dr. Vaberlie P. Mandane Garcia', 'Director for Extension Servies'),
('56347fcb-5318-11ee-aea5-0a0027000002', 'Dr. Benedict O. Medina', 'Asst. Director for Extension Monitoring and Impace Assessment'),
('56347fea-5318-11ee-aea5-0a0027000002', 'Ms. Kristia Lei A. Reyes', 'Asst. Director for Community Development Services'),
('5634800b-5318-11ee-aea5-0a0027000002', 'Assoc. Prof. Maria Theresa A. Hernandez', 'Asst. Director for Gender and Development Advocacies'),
('5634806d-5318-11ee-aea5-0a0027000002', 'Dr. Vaberlie P. Mandane-Garcia', 'Vice Chancellor for Research, Development and Extension Services'),
('56348096-5318-11ee-aea5-0a0027000002', 'Dr. Elisa D. Gutierrez', 'Vice Chancellor for Research, Development and Extension Services'),
('563480b5-5318-11ee-aea5-0a0027000002', 'Dr. Eufronia Magundayao', 'Vice Chancellor for Research, Development and Extension Services'),
('563480d6-5318-11ee-aea5-0a0027000002', 'Asst. Prof. Rosana C. Lat', 'Vice Chancellor for Research, Development and Extension Services'),
('563480f8-5318-11ee-aea5-0a0027000002', 'Assoc. Prof. Maria Theresa A. Hernandez', 'Vice Chancellor for Research, Development and Extension Services');

-- --------------------------------------------------------

--
-- Table structure for table `research_representatives`
--

CREATE TABLE `research_representatives` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `research_topic_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research_representatives`
--

INSERT INTO `research_representatives` (`id`, `research_topic_id`, `role`) VALUES
('', 'a9534322-b556-11ee-b2e8-b6cba992334b', 'Project Staff'),
('1a5bd772-9f4b-11ee-a6ff-6fe9459a394e', '1a5bce8f-9f4b-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('1a5be01d-9f4b-11ee-a6ff-6fe9459a394e', '1a5bce8f-9f4b-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('2', '0', 'Project Staff'),
('2a6346b9-a66e-11ee-a6ff-6fe9459a394e', '2a63416e-a66e-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('2a634d96-a66e-11ee-a6ff-6fe9459a394e', '2a63416e-a66e-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('2a63545c-a66e-11ee-a6ff-6fe9459a394e', '2a63416e-a66e-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('382a6a14-a152-11ee-a6ff-6fe9459a394e', '382a58a4-a152-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('382a7aab-a152-11ee-a6ff-6fe9459a394e', '382a58a4-a152-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('382a8b7d-a152-11ee-a6ff-6fe9459a394e', '382a58a4-a152-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('47e5537e-a151-11ee-a6ff-6fe9459a394e', '47e548b4-a151-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('47e55e9b-a151-11ee-a6ff-6fe9459a394e', '47e548b4-a151-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('47e568d2-a151-11ee-a6ff-6fe9459a394e', '47e548b4-a151-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('5015d66c-b5b5-11ee-b2e8-b6cba992334b', 'a9534322-b556-11ee-b2e8-b6cba992334b', 'Project Leader'),
('5015d8c7-b5b5-11ee-b2e8-b6cba992334b', 'a9534322-b556-11ee-b2e8-b6cba992334b', 'Project Staff'),
('5015dac2-b5b5-11ee-b2e8-b6cba992334b', 'a9534322-b556-11ee-b2e8-b6cba992334b', 'Project Staff'),
('5015dc7b-b5b5-11ee-b2e8-b6cba992334b', 'a9534322-b556-11ee-b2e8-b6cba992334b', 'Project Staff'),
('5921a716-a152-11ee-a6ff-6fe9459a394e', '592195af-a152-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('5921b30b-a152-11ee-a6ff-6fe9459a394e', '592195af-a152-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('5921bffe-a152-11ee-a6ff-6fe9459a394e', '592195af-a152-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('634db3ae-95db-11ee-a551-6ad4e913a1ee', '634daae5-95db-11ee-a551-6ad4e913a1ee', 'Project Leader/s'),
('634dba1a-95db-11ee-a551-6ad4e913a1ee', '634daae5-95db-11ee-a551-6ad4e913a1ee', 'Asst. Project Leader/s'),
('634dc16e-95db-11ee-a551-6ad4e913a1ee', '634daae5-95db-11ee-a551-6ad4e913a1ee', 'Project Coordinator/s'),
('64e40e84-9f47-11ee-a6ff-6fe9459a394e', '64e3fef2-9f47-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('64e41653-9f47-11ee-a6ff-6fe9459a394e', '64e3fef2-9f47-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('64e41df7-9f47-11ee-a6ff-6fe9459a394e', '64e3fef2-9f47-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('6c237594-a0e6-11ee-a6ff-6fe9459a394e', '6c236297-a0e6-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('6c2386be-a0e6-11ee-a6ff-6fe9459a394e', '6c236297-a0e6-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('6c2397d8-a0e6-11ee-a6ff-6fe9459a394e', '6c236297-a0e6-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('6ec39352-9414-11ee-a551-6ad4e913a1ee', '6ec38755-9414-11ee-a551-6ad4e913a1ee', 'Project Leader/s'),
('6ec39eb0-9414-11ee-a551-6ad4e913a1ee', '6ec38755-9414-11ee-a551-6ad4e913a1ee', 'Asst. Project Leader/s'),
('6ec3a922-9414-11ee-a551-6ad4e913a1ee', '6ec38755-9414-11ee-a551-6ad4e913a1ee', 'Project Coordinator/s'),
('6fd30ada-a151-11ee-a6ff-6fe9459a394e', '6fd2fe4b-a151-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('6fd3199c-a151-11ee-a6ff-6fe9459a394e', '6fd2fe4b-a151-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('6fd3341f-a151-11ee-a6ff-6fe9459a394e', '6fd2fe4b-a151-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('813604a1-997e-11ee-a551-6ad4e913a1ee', '8135f8d7-997e-11ee-a551-6ad4e913a1ee', 'Project Leader/s'),
('81360bab-997e-11ee-a551-6ad4e913a1ee', '8135f8d7-997e-11ee-a551-6ad4e913a1ee', 'Asst. Project Leader/s'),
('9dd635f7-b5aa-11ee-b2e8-b6cba992334b', '02ccedc8-b55d-11ee-b2e8-b6cba992334b', 'Project Leader'),
('9dd63910-b5aa-11ee-b2e8-b6cba992334b', '02ccedc8-b55d-11ee-b2e8-b6cba992334b', 'Project Staff'),
('9dd63b4d-b5aa-11ee-b2e8-b6cba992334b', '02ccedc8-b55d-11ee-b2e8-b6cba992334b', 'Project Staff'),
('9dd63d1e-b5aa-11ee-b2e8-b6cba992334b', '02ccedc8-b55d-11ee-b2e8-b6cba992334b', 'Project Staff'),
('ac4f762d-9407-11ee-a551-6ad4e913a1ee', 'ac4f7228-9407-11ee-a551-6ad4e913a1ee', 'Project Leader/s'),
('ac4f7a49-9407-11ee-a551-6ad4e913a1ee', 'ac4f7228-9407-11ee-a551-6ad4e913a1ee', 'Asst. Project Leader/s'),
('ac4f7dc3-9407-11ee-a551-6ad4e913a1ee', 'ac4f7228-9407-11ee-a551-6ad4e913a1ee', 'Project Coordinator/s'),
('ae72c118-9f48-11ee-a6ff-6fe9459a394e', 'ae72b2ff-9f48-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('ae72cccf-9f48-11ee-a6ff-6fe9459a394e', 'ae72b2ff-9f48-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('ae72dfc8-9f48-11ee-a6ff-6fe9459a394e', 'ae72b2ff-9f48-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('c', '0', 'Project Staff'),
('c307c7ff-95bf-11ee-a551-6ad4e913a1ee', 'c307c09a-95bf-11ee-a551-6ad4e913a1ee', 'Project Leader/s'),
('c307cd83-95bf-11ee-a551-6ad4e913a1ee', 'c307c09a-95bf-11ee-a551-6ad4e913a1ee', 'Asst. Project Leader/s'),
('c307d4b1-95bf-11ee-a551-6ad4e913a1ee', 'c307c09a-95bf-11ee-a551-6ad4e913a1ee', 'Project Coordinator/s'),
('c9e1a043-bcec-11ee-9987-b42e99640312', 'b2e4a1f2-bcec-11ee-9987-b42e99640312', 'Adviser'),
('c9e1a522-bcec-11ee-9987-b42e99640312', 'b2e4a1f2-bcec-11ee-9987-b42e99640312', 'Panels'),
('c9e1aed0-bcec-11ee-9987-b42e99640312', 'b2e4a1f2-bcec-11ee-9987-b42e99640312', 'Advisee/s'),
('cbb2561f-b5c5-11ee-b2e8-b6cba992334b', 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 'Project Leader/s'),
('cbb257ec-b5c5-11ee-b2e8-b6cba992334b', 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 'Asst. Project Leader/s'),
('cbb25986-b5c5-11ee-b2e8-b6cba992334b', 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 'Project Coordinator/s'),
('cc302275-a0e5-11ee-a6ff-6fe9459a394e', 'cc301a07-a0e5-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('cc302f92-a0e5-11ee-a6ff-6fe9459a394e', 'cc301a07-a0e5-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('cc3037e9-a0e5-11ee-a6ff-6fe9459a394e', 'cc301a07-a0e5-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s'),
('d2f0ceeb-b2da-11ee-9b07-b42e99640312', 'd2f0ca0e-b2da-11ee-9b07-b42e99640312', 'Project Leader/s'),
('d2f0d36e-b2da-11ee-9b07-b42e99640312', 'd2f0ca0e-b2da-11ee-9b07-b42e99640312', 'Asst. Project Leader/s'),
('d2f0d732-b2da-11ee-9b07-b42e99640312', 'd2f0ca0e-b2da-11ee-9b07-b42e99640312', 'Project Coordinator/s'),
('d97b5fef-99be-11ee-a6ff-6fe9459a394e', 'd97b57e1-99be-11ee-a6ff-6fe9459a394e', 'Project Leader/s'),
('d97b6686-99be-11ee-a6ff-6fe9459a394e', 'd97b57e1-99be-11ee-a6ff-6fe9459a394e', 'Asst. Project Leader/s'),
('d97b6bfe-99be-11ee-a6ff-6fe9459a394e', 'd97b57e1-99be-11ee-a6ff-6fe9459a394e', 'Project Coordinator/s');

-- --------------------------------------------------------

--
-- Table structure for table `research_representatives_responsibilities`
--

CREATE TABLE `research_representatives_responsibilities` (
  `id` int NOT NULL,
  `research_representatives_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsibility` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research_representatives_responsibilities`
--

INSERT INTO `research_representatives_responsibilities` (`id`, `research_representatives_id`, `responsibility`) VALUES
(27, NULL, 'Prepares draft of detailed research proposal'),
(28, NULL, 'Identifies respondents from different batches of Alumni'),
(29, NULL, 'Analyze and interprets the result'),
(30, NULL, 'Analyze and interprets the result'),
(136, NULL, 'Clearly communicate project requirements and specifications to the outsourced Machine Learning Expert.'),
(137, '9dd635f7-b5aa-11ee-b2e8-b6cba992334b', 'Reviews and finalize detailed research proposal '),
(138, '9dd635f7-b5aa-11ee-b2e8-b6cba992334b', 'Facilitates request for supplies and materials needed'),
(139, '9dd635f7-b5aa-11ee-b2e8-b6cba992334b', 'Prepares progress and final reports'),
(140, '9dd63910-b5aa-11ee-b2e8-b6cba992334b', 'Prepares draft of detailed research proposal'),
(141, '9dd63910-b5aa-11ee-b2e8-b6cba992334b', 'Identifies respondents from different batches of Alumni'),
(142, '9dd63910-b5aa-11ee-b2e8-b6cba992334b', 'Coordinates with intended users / units'),
(143, '9dd63910-b5aa-11ee-b2e8-b6cba992334b', 'Coordinates with intended users / units'),
(144, '9dd63b4d-b5aa-11ee-b2e8-b6cba992334b', 'Prepares draft of detailed research proposal'),
(145, '9dd63b4d-b5aa-11ee-b2e8-b6cba992334b', 'Identifies respondents from different batches of Alumni'),
(146, '9dd63b4d-b5aa-11ee-b2e8-b6cba992334b', 'Analyze and interprets the result'),
(147, '9dd63b4d-b5aa-11ee-b2e8-b6cba992334b', 'Develop the proposed system (Data Analytics)'),
(148, '9dd63d1e-b5aa-11ee-b2e8-b6cba992334b', 'Prepares draft of detailed research proposal'),
(149, '9dd63d1e-b5aa-11ee-b2e8-b6cba992334b', 'Identifies respondents from different batches of Alumni'),
(150, '9dd63d1e-b5aa-11ee-b2e8-b6cba992334b', 'Analyze and interprets the result'),
(151, '9dd63d1e-b5aa-11ee-b2e8-b6cba992334b', 'Develop the proposed system (Geospatial Mapping)'),
(152, '5015d66c-b5b5-11ee-b2e8-b6cba992334b', 'Review and finalize the comprehensive project proposal.'),
(153, '5015d66c-b5b5-11ee-b2e8-b6cba992334b', 'Coordinate communication between team members and stakeholders.'),
(154, '5015d66c-b5b5-11ee-b2e8-b6cba992334b', 'Facilitate requests for supplies and materials needed for the project.'),
(155, '5015d66c-b5b5-11ee-b2e8-b6cba992334b', 'Prepare progress and final reports.'),
(156, '5015d8c7-b5b5-11ee-b2e8-b6cba992334b', 'Conceptualize and refine the project idea to align with stakeholder needs and goals.'),
(157, '5015d8c7-b5b5-11ee-b2e8-b6cba992334b', 'Develop the comprehensive project proposal that outlines project goals.'),
(158, '5015dac2-b5b5-11ee-b2e8-b6cba992334b', 'Identify and prioritize key features of the project based on user needs and project goals.'),
(159, '5015dac2-b5b5-11ee-b2e8-b6cba992334b', 'Collaborate with the outsourced Machine Learning Expert to review and validate the scraped data.'),
(160, '5015dc7b-b5b5-11ee-b2e8-b6cba992334b', 'Communicate the final concept and overall system functionality to the outsourced Full-stack developer.'),
(161, NULL, 'Clearly communicate project requirements and specifications to the outsourced Machine Learning Expert');

-- --------------------------------------------------------

--
-- Table structure for table `research_topic`
--

CREATE TABLE `research_topic` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL,
  `project_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `research_agenda` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partnership` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdg_1` tinyint(1) DEFAULT '0',
  `sdg_2` tinyint(1) DEFAULT '0',
  `sdg_3` tinyint(1) DEFAULT '0',
  `sdg_4` tinyint(1) DEFAULT '0',
  `sdg_5` tinyint(1) DEFAULT '0',
  `sdg_6` tinyint(1) DEFAULT '0',
  `sdg_7` tinyint(1) DEFAULT '0',
  `sdg_8` tinyint(1) DEFAULT '0',
  `sdg_9` tinyint(1) DEFAULT '0',
  `sdg_10` tinyint(1) DEFAULT '0',
  `sdg_11` tinyint(1) DEFAULT '0',
  `sdg_12` tinyint(1) DEFAULT '0',
  `sdg_13` tinyint(1) DEFAULT '0',
  `sdg_14` tinyint(1) DEFAULT '0',
  `sdg_15` tinyint(1) DEFAULT '0',
  `sdg_16` tinyint(1) DEFAULT '0',
  `sdg_17` tinyint(1) DEFAULT '0',
  `revision_no` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `female_no` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `male_no` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `executive_brief` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rationale` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `objective` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `publication` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `people_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partners_hip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_impact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `economic_impact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rrl` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `methodology` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approval_letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research_topic`
--

INSERT INTO `research_topic` (`id`, `added_by`, `project_title`, `research_agenda`, `partnership`, `agency`, `sponsor`, `sdg_1`, `sdg_2`, `sdg_3`, `sdg_4`, `sdg_5`, `sdg_6`, `sdg_7`, `sdg_8`, `sdg_9`, `sdg_10`, `sdg_11`, `sdg_12`, `sdg_13`, `sdg_14`, `sdg_15`, `sdg_16`, `sdg_17`, `revision_no`, `start_date`, `end_date`, `female_no`, `male_no`, `college_id`, `department_id`, `executive_brief`, `rationale`, `objective`, `publication`, `patent`, `product`, `people_service`, `partners_hip`, `policy`, `social_impact`, `economic_impact`, `rrl`, `methodology`, `status`, `dateAdded`, `approval_letter`) VALUES
('02ccedc8-b55d-11ee-b2e8-b6cba992334b', 79, 'BATIS: BatStateU Alumni Tracer Information System with Geospatial Mapping and Data Analysis', 'Agriculture, Aquatic, and Natural Resources Research (AANRR)', 'Institutionaly Funded', 'Batangas State University The National Engineering University', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, '2024-01-18', '2024-08-23', '0', '0', 42, 56, '<ul><li>Employability of graduates is one of the indicators being assessed by Higher Education Institutions (HEIs) to find out whether the quality of education they provide is suitable to the needs of the industry. In fact,&nbsp;Commission on Higher Education (CHED) has been firm on its stand that part of the moral responsibilities of HEIs is to know the whereabouts of their alumni. And this is one of the actions steps of the Batangas State University (BatStateU).</li></ul><p>&nbsp;</p>', '<ul><li>This research proposal supports the university\'s Strategic Plan 2019-2029, Pillar 1: Brand of Excellence, which states, \"<i>In its pursuit to become a national university, Batangas State University shall be known as a leading producer of researchers, scholars, and innovators</i>.\" One of the institution\'s action steps is to increase the number of academic programs designated as Centers of Excellence (COE) or Centers of Development (COD).</li></ul>', '<ul><li>The study aims to develop <i>BATIS: BatStateU Alumni Tracer Information System with Geospatial Mapping and Data Analysis</i>, which would aid the university to connect and strengthen bond relationship with its alumni and continuously improve the quality of its programs.</li></ul>', 'International non-ISI publication / Scopus or ISI indexed publication', 'IPR over the methods and technology developed', 'One (1) software application named “BATIS”', 'Capacity training for the intended users', 'One (1) Memorandum of Agreement', '-', '-', '-', '<ul><li>The researchers will use descriptive-developmental method as the research design and development of the proposed system.</li><li>The system type will be a Web Application and a mobile view application. After the development of the proposed system, it will be initially implemented in the ARASOF-Nasugbu campus for pilot testing.&nbsp;</li><li>And to determine the effectiveness of the proposed study, the researchers will randomly and purposively be selected one hundred fifty (300) alumni of different programs from the aforementioned campus starting from Year 2018 to 2019. The rest of the group of respondents will be purposively selected to evaluate the system accordingly. &nbsp;</li><li>Respondents of the proposed study will include (1) Vice Chancellor for Development and External Affairs, (1) Head of External Affairs Office, (7) College Deans, and (20) Program Chairperson from different colleges in the campus.</li><li>The CHED Graduate Tracer Instrument will be utilized in the proposed system. The proponents already coordinated with the former GTS Researchers to further improve the proposal.</li><li>The researchers will use descriptive survey method utilizing survey questionnaire to be distributed to the respondents.</li><li>To carefully appraise the significance of the study, the proponents will use of statistical tools for the evaluative analysis of the results. Thus, data analysis, frequency count, and weighted arithmetic mean will be used to interpret the accumulated data.</li><li>&nbsp;</li></ul>', '<ul><li>At the technical level, the inclusion of the geospatial mapping and data analytics features aids the successful generation of pertinent reports which is supplemental to the decision-making function of the leaders and administrators. They are capable of displaying beneficial reports through executive dashboards and real-time maps for decision-making, including alumni classification based on business sector and its location.</li></ul><p>&nbsp;</p><ul><li>The <strong>Intelligent Data Acquisition and Storage Platform</strong> basically perform the tasks of capturing data from varied sources mentioned in the alumni social network platform.</li><li>The <strong>Data Mining and Auxiliary Decision-Making Platform</strong> assists the administrators of the university to carry out some multi-dimensional, multi-level management decisions by mining relevance and orientation in alumni information.</li></ul>', 'Ongoing', '2024-01-17 22:39:34', 'approvalletter_upload/65a81051daeec_approval_letter (6).jpg'),
('1a5bce8f-9f4b-11ee-a6ff-6fe9459a394e', 79, 'REACT', 'Agriculture, Aquatic, and Natural Resources Research (AANRR)', 'Institutionaly Funded', 'Batangas State University The National Engineering University', NULL, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '2023-10-23', '2023-12-31', '0', '0', 42, 54, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Completed', '2024-01-17 17:35:20', 'approvalletter_upload/658315a94e209_approval_letter (4) (1) (7).jpg'),
('a9534322-b556-11ee-b2e8-b6cba992334b', 79, 'i-Saliksik: A Decision Support Platform Leveraging AI for Streamlined Research Information Management Systems', 'Industry, Energy and Merging Technology Research (IEETR)', 'Institutionaly Funded', 'Batangas State University The National Engineering University', '-', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-01-27', '2024-02-10', '0', '0', 42, 56, '<p>&nbsp; &nbsp; &nbsp; &nbsp;i-Saliksik is a proposed Research Information Management System (RIMS) that leverages Artificial Intelligence (AI) to streamline research information management and monitoring at Batangas State University (BatStateU) The National Engineering University. The proposed study aims to meet the needs of the university researchers and administrators by providing a centralized repository for research data, integrating and linking various elements of the research ecosystem such as publications, grants, and intellectual property. The absence of a centralized system for managing and promoting research activities at the university has led to the concept of i-Saliksik. The proposed system aims to transform the way BatStateU manages research information, making it more efficient and effective. The proposed system will include a repository of profiles for all faculty researchers in the university. It will provide a platform for the evaluation, monitoring, and management of institutional research proposals and projects. The system will also allow for the migration and integration of relevant research and development (R&amp;D) information of the faculty members from reliable sources like Google Scholar, Scopus, and other similar databases. One key feature of i-Saliksik is its ability to automatically analyze and categorize research outputs based on their topics or themes using a machine learning technique called topic modeling. This can help identify the most common research areas and topics within the faculty\'s research output, as well as potential areas for collaboration. Furthermore, isaliksik will provide descriptive analytics capabilities to assist the management in the decision-making process and provide insights into research activities, collaborations, and trends within the university. Once developed and implemented, i-Saliksik could be a powerful tool for managing and monitoring the university research outputs, comply with funding agency requirements, and identify potential collaborators and funding opportunities.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>&nbsp; &nbsp; &nbsp; &nbsp;Research management is a critical process in any academic institution as it serves as the foundation for generating new knowledge and contributes to scientific advancements. Higher education institutions are at the forefront of scientific research as well as technological development. The management of scientific research in colleges and universities has achieved computerization and transitioned to networked management gradually. However, managing research projects can be a daunting task due to the complex nature of the activities involved, such as proposal submission, review, approval, project implementation, progress report, monitoring, and terminal report, among others.</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; In Batangas State University, like other State Universities and Colleges (SUCs), tracking the project and ensuring that it is utilized as planned is a significant challenge. Currently, this process is done manually, with no centralized or consolidated data available for easy access and reference. This can result in delays, errors, and a lack of transparency in the management of research activities and funds. Additionally, there is a need for a streamlined system for submitting research proposals, progress reports, monitoring tools, and terminal reports (final reports) to reduce administrative burden and improve efficiency. A platform that can serve as a repository of all research involvement of the faculty would also be beneficial for easy access and wide dissemination of information. To address these challenges, the i-Saliksik platform is proposed.</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;The proposed system will streamline the research management system of the university, providing a centralized repository of all research involvement of the faculty, from proposal submissions to terminal reports. This platform will not only streamline the research management process but also improve the quality of research output by ensuring that relevant data is readily available to faculty researchers. The main feature of the proposed system is leveraging Artificial Intelligence, specifically Natural Language Processing (NLP), to automatically analyze and categorize research outputs based on their topics or themes. Using a machine learning technique called topic modeling, i-Saliksik will be able to identify the most common research areas and topics within the faculty\'s research output, as well as potential areas for collaboration. This can help researchers and administrators quickly identify gaps in research, and potential areas for further exploration or investment.&nbsp;</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; By having a decision support platform leveraging AI for a streamlined research management system like iSaliksik, the process of submitting proposals up to the terminal report can be made more efficient, organized, and centralized. All relevant documents, including the proposal, progress reports, terminal reports, and budget can be stored and accessed in one location. The system can also track and monitor the progress of the research project, making sure that everything is done according to plan. Lastly, the platform can provide valuable insights and recommendations based on the data collected, enabling researchers to make more informed decisions through interactive visualizations.</p>', '<p>This project aims to develop i-Saliksik: A Decision Support Platform Leveraging AI for Streamlined Research Management System, which would aid the university to improve the efficiency and effectiveness of research management. Specifically:</p><p>&nbsp;</p><p>1. Develop a centralized research information management systems within i-Saliksik that allows researchers and university research council to manage the faculty researchers’ achievements, track the progress of research projects, manage research projects’ budget, and identify areas for improvement;&nbsp;</p><p>2. Integrate AI algorithms into i-Saliksik to analyze and categorize research outputs of the faculty researchers based on their topics or themes;&nbsp;</p><p>3. Design and develop an intuitive user interface for i-Saliksik that provides interactive data visualizations and insights to support decision-making related to university research activities;&nbsp;</p><p>4. Test and refine the i-Saliksik platform with a group of users, incorporating feedback and making necessary adjustments to improve its effectiveness and efficiency; and&nbsp;</p><p>5. Provide training and support to end-users to ensure that they can effectively adopt and use i-Saliksik in their research management activities</p>', 'One (1) publication in the ISI/Scopus index journals', 'One (1) copyrighted software application named “i-Saliksik”', 'One (1) software application named “i-Saliksik”', 'Train faculty-researchers and research council/committee on how to use the system', 'N/A', 'N/A', 'The project will enable faculty-researchers to conduct high-quality research.', 'The project can lead to cost savings for the university by reducing the time and resources.', '<p><i>Research Information Management Systems&nbsp;</i></p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; [1] study focuses on the design and development of a scientific research management information system for a university. The aim of the system is to digitize and streamline the management of research projects, funding, and publications. The paper highlights the importance of information technology in research management and the potential benefits of using an integrated system for scientific research management. With the implementation of this system, universities can improve their efficiency and reduce costs by enabling timely access to research data for analysis and performance evaluation. This system can provide a unified management platform for research projects, making it easier to track progress and manage resources effectively. By using an integrated system, universities can save time and reduce errors that might occur when managing research projects manually. Additionally, the system provides the capability to conduct rewards or statistical analysis based on the performance of university teachers, which helps in improving the overall scientific research efficiency and management effectiveness of research institutions.&nbsp;</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;[2] discusses the development of a management information system for the research project process. The system was developed through the feasibility study, demand analysis, conceptual design, detailed design, system implementation, and software testing, based on the front-end and back-end separation design idea and related principles of software engineering. The system consists of various modules, including project information management, project schedule task management, progress report management, conclusion report management, experts from the fund committee, and expert review and maintenance of different types of information. It also features role management, user management, function management, and rights management for role and user. The system allows for easy, reliable, and advanced management of research projects and improves the working efficiency of related personnel. The technical advantage and platform advantage using JavaEE architecture and Loushang5 framework are adopted during the system development, which enhances the flexibility and adaptability of the system and meets the objectives and demands of long-term system development. This paper and the isaliksik platform have similar objectives in streamlining the management of research projects using modern technology. Both aim to provide a centralized system for managing research projects, including proposal submission, progress monitoring, and final report submission. They both also address the challenge of tracking and managing the budget of research projects.</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; However, there are some differences in their specific features and implementation. The paper focuses on the management of research projects using the JavaEE architecture and the Loushang5 framework. It includes modules for managing project information, project schedules, progress reports, and conclusion reports, as well as expert review and maintenance of different types of information. On the contrary, the i-saliksik platform aims to leverage AI using Natural Processing Language (NLP) for decision support in managing research projects in the university. It will provide a range of features to assist in research management, including a data visualization dashboard that allows for informed decision-making, analysis and categorization of research outputs based on their topics or themes, repository of faculty researchers’ profile and data scraping from reputable sources such as Scopus and Google Scholar to fetch the related-R&amp;D metadata of the university faculty-researchers. These features will enable efficient and effective management and monitoring of research activities and outputs in the university, allowing research council to make data-driven decisions and optimize research resources. The rapidly increasing volume of data has resulted in an upsurge of research on data platforms in recent years, leading to the emergence of several types of big data platforms. These platforms support the findings of [3] that a new data service platform can integrate data collection, analysis, governance, monitoring, administration, prediction, early warning systems, and visualization platforms. In the Philippines, research information management platforms are being developed to help researchers manage their data effectively. These platforms aim to streamline the process of managing research projects, funding, and publications while reducing costs and improving efficiency. With the increasing amount of research being conducted in the country, these platforms are becoming more and more essential in supporting the work of researchers and institutions</p>', '<p>&nbsp; &nbsp; &nbsp; &nbsp;The proposed study will use Scrum which involves iterative and incremental development. Sprints will be held regularly to develop system features and functionality. The research team will have regular sprints, which are short periods of time where the team focuses on developing specific features or functionality of the system. Regular meetings will address progress, concerns, and plans during sprints. The team will also conduct sprint reviews to assess the progress made during each sprint and plan for the next one. This methodology allows for flexibility and adaptability, as changes can be made at each sprint based on feedback and new requirements. Scrum will enable iSaliksik developers finish on time, under budget, and to quality standards.</p><p>&nbsp;</p><p><i>Research Information Management Systems&nbsp;</i></p><p>&nbsp; &nbsp; &nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;Identification of essential features and functionalities of the system, such as tracking the progress of research projects, managing research projects\' budget, managing faculty researchers\' achievements, and identifying areas for improvement. The researchers will then use Scrum methodology to develop the system, starting with the creation of user stories and developing a backlog of tasks. The system will scrape information on the published works of the faculty researchers, from credible sources like Scopus and Google Scholar, which will allow for efficient tracking and management of the research outputs of faculty in terms of publication. The entire research process, starting from the submission of proposals up to the final report will be part of the proposed system and will include monitoring the progress of the research through regular updates on a quarterly basis. Finally, the team will conduct rigorous testing to ensure the system is user-friendly, efficient, and effective in managing research information.</p><p>&nbsp;</p><p><i>Artificial Intelligence Algorithm – Topic Modeling Technique&nbsp;</i></p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;For the integration of Artificial Intelligence methodology of this proposal, can be sought to use topic modeling in analyzing and categorizing the research topics and themes of the faculty researchers. The data will be preprocessed, and the topic model will be trained using machine learning algorithms such as Latent Dirichlet Allocation (LDA) to extract meaningful topics from the research outputs. The extracted topics will be categorized and linked to individual researchers and their outputs, allowing for better tracking of research trends and areas of expertise. The team will also consider other AI algorithms, such as Natural Language Processing (NLP), to further enhance the capabilities of i-Saliksik. The integration of AI algorithms will enable the platform to provide intelligent insights and recommendations for research management, ultimately improving the efficiency and effectiveness of the university\'s research activities.</p><p>&nbsp;</p><p><i>Interactive Data Visualizations&nbsp;</i></p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;The researchers will follow the Scrum methodology in designing and developing the decision support platform, which involves breaking down the development process into small iterations called sprints. During each sprint, the team will focus on specific tasks such as user research, wireframing, prototyping, and user testing to ensure that the interface is user-friendly and meets the needs of the university research unit. We will also incorporate agile development principles, such as continuous feedback and iteration, to ensure that the interface is continually improving and evolving throughout the development process. Additionally, we will utilize modern front-end development frameworks and tools to build a responsive and visually appealing user interface that delivers the best user experience.&nbsp;</p><p>&nbsp;</p><p><i>Testing and Quality Assurance&nbsp;</i></p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;Testing and quality assurance are crucial components in the development of i-Saliksik. The research team with the help of outsourced expert will conduct various types of testing, including functional testing, user acceptance testing, and performance testing, to ensure that the system is functioning correctly and meets the requirements and expectations of the end-users. Additionally, the team will perform quality assurance activities to ensure that the system is secure, reliable, and scalable. This includes code reviews, security testing, and stress testing. Continuously monitoring of the system\'s performance and gather feedback from the end-users to identify areas for improvement and make necessary adjustments to improve its effectiveness and efficiency.</p><p>&nbsp;</p><p><i>Deployment Plan and Utilization&nbsp;</i></p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;The deployment and utilization plan will be implemented to make sure that the proposed system is successfully accepted and used by the end-users following the successful creation and testing of i-Saliksik. To make sure that faculty researchers, research administrators, and other key employees are prepared to use the system, this plan will include a thorough training program for them. The instruction will be delivered in a variety of ways, including workshops, online tutorials, and user guides. The system will also undergo routine upkeep and revisions to keep it current and functional that’s why it is recommended by the team to outsource services of professional consultants to guarantee the system’s long-term viability and efficacy. To make sure that the system is fulfilling users\' demands and providing the desired benefits, the deployment and use strategy will be reviewed and modified on a continuing basis.</p>', 'Ongoing', '2024-01-27 07:54:01', 'approvalletter_upload/65a8107a2770f__certificate_upload_approval_letter (4) (1) (2).jpg'),
('b2e4a1f2-bcec-11ee-9987-b42e99640312', 79, 'VADD: An IoT-Based Vehicle Accident Detection Device With Web System Integration', 'Industry, Energy and Merging Technology Research (IEETR)', 'Externaly Funded', 'MDRRMO', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '1', '2024-01-28', '2024-02-04', '0', '0', 42, 56, '<p>Executive Brief for VADD</p>', '<p>Rationale of the Project for VADD</p>', '<p>Objectives of the Project (General and Specific) of the Project for VADD</p>', 'Publication', 'Patent', 'Product', 'People Service', 'Partnership', 'Policy', 'Social Impact', 'Economic Impact', '<p>Review of Related Literature of the Project for VADD</p>', '<p>Methodology for VADD</p>', 'Ongoing', '2024-01-28 14:08:11', 'approvalletter_upload/65b65e23ce557_sheesshhhhh.png'),
('cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 79, 'FIT: Functional and Intelligent Tracking of Individual Health Status of BatStateU Employees using Wearable Devices for Enhanced Personalized Healthcare', 'Agriculture, Aquatic, and Natural Resources Research (AANRR)', 'Institutionaly Funded', 'Batangas State University The National Engineering University', NULL, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '2024-02-03', '2024-10-26', '0', '0', 42, 56, '<p>example</p>', '<p>example</p>', '<p>example</p>', '2023', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '<p>example</p>', '<p>example</p>', 'Ongoing', '2024-06-11 05:03:12', 'approvalletter_upload/65a8bff37ae8d_approval_letter (6).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `research_topic_comments`
--

CREATE TABLE `research_topic_comments` (
  `id` int NOT NULL,
  `research_topic_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` int NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research_topic_comments`
--

INSERT INTO `research_topic_comments` (`id`, `research_topic_id`, `sender`, `category`, `comment`, `date_sent`) VALUES
(526, 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 79, 'all', 'Test sa All', '2024-01-28 18:42:58'),
(527, 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 79, 'research title', 'Test sa research title', '2024-01-28 18:43:10'),
(528, 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 79, 'all', 'Test ulit sa All', '2024-01-28 19:04:37'),
(529, 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 79, 'executive brief', 'Test sa Executive Brief', '2024-01-28 19:04:52'),
(530, 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 58, 'research title', 'Test sa research title as dean', '2024-01-28 19:10:42'),
(531, 'cbb252a9-b5c5-11ee-b2e8-b6cba992334b', 64, 'roles', 'Test sa Roles', '2024-01-28 19:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `responsibilities`
--

CREATE TABLE `responsibilities` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responsibilities`
--

INSERT INTO `responsibilities` (`id`, `role`, `responsibility`) VALUES
('cbc3acfb-5318-11ee-aea5-0a0027000002', 'Project Leader/s', 'Spearhead the extension project'),
('cbc44b18-5318-11ee-aea5-0a0027000002', 'Project Leader/s', 'Identify the projects overall goal, outcome and objectives'),
('cbc44ded-5318-11ee-aea5-0a0027000002', 'Project Leader/s', 'Monitor the flow of the training'),
('cbc44e89-5318-11ee-aea5-0a0027000002', 'Project Leader/s', 'Prepare project/activity proposal'),
('cbc44eca-5318-11ee-aea5-0a0027000002', 'Project Leader/s', 'Coordinate with the coorperating agency/resource persons'),
('cbc44f0f-5318-11ee-aea5-0a0027000002', 'Asst. Project Leader/s', 'Assist the project leader in the planning, implementation, monitoring and evaluation of the project'),
('cbc44f54-5318-11ee-aea5-0a0027000002', 'Asst. Project Leader/s', 'Delegate work to the project, staff'),
('cbc44f96-5318-11ee-aea5-0a0027000002', 'Asst. Project Leader/s', 'Assist in coordination with the coorperating agency'),
('cbc44fd1-5318-11ee-aea5-0a0027000002', 'Asst. Project Leader/s', 'Assign resource persons from the University with specialization in the topics'),
('cbc4500f-5318-11ee-aea5-0a0027000002', 'Project Coordinator/s or Staff', 'Act as technical team in the online platforms'),
('cbc45041-5318-11ee-aea5-0a0027000002', 'Project Coordinator/s or Staff', 'Coordinate with the rest of the project management team'),
('cbc45079-5318-11ee-aea5-0a0027000002', 'Project Coordinator/s or Staff', 'Assist in communication with the coorperating agencies'),
('cbc450ac-5318-11ee-aea5-0a0027000002', 'Project Coordinator/s or Staff', 'Assist in organization of the beneficiaries'),
('cbc450e4-5318-11ee-aea5-0a0027000002', 'Project Coordinator/s or Staff', ' Assist in the preparation and implementing of the extension program'),
('cbc4511a-5318-11ee-aea5-0a0027000002', 'Project Coordinator/s or Staff', 'Prepare training materials and presentations'),
('cbc45151-5318-11ee-aea5-0a0027000002', 'Project Coordinator/s or Staff', 'Prepare required reports/documentation'),
('cbc452c7-5318-11ee-aea5-0a0027000002', 'Project Coordinator/s or Staff', 'Assist in the morning and evaluation of the extension program');

-- --------------------------------------------------------

--
-- Table structure for table `scw_`
--

CREATE TABLE `scw_` (
  `id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal_author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_published` date NOT NULL,
  `edition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `issn_isbn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `authoring_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_publication` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `digital_identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scw_`
--

INSERT INTO `scw_` (`id`, `type`, `title`, `principal_author`, `main_author`, `volume`, `no`, `year_published`, `edition`, `issn_isbn`, `class`, `level`, `publication_group`, `authoring_type`, `publisher`, `place_publication`, `url`, `digital_identifier`, `added_by`, `dateAdded`) VALUES
(45, 'Creative Work', 'AI IN TOURISM: LEVERAGING MACHINE LEARNING IN PREDICTING TOURIST ARRIVALS IN PHILIPPINES USING ARTIFICIAL NEURAL NETWORK', 'Yes', 'De Jesus, Noelyn M.', '-', '-', '2023-03-03', '-', '-', 'Refereed', 'International', 'R&D Papers in Scientific Journals', 'Main Author', '-', '(IJACSA) International Journal of Advanced Computer Science and Applications', 'https://www.researchgate.net/publication/369803008_AI_in_Tourism_Leveraging_Machine_Learning_in_Predicting_Tourist_Arrivals_in_Philippines_using_Artificial_Neural_Network', '-', 79, '2024-01-18 03:07:11'),
(46, 'Creative Work', 'DESCRIPTIVE ANALYTICS AND INTERACTIVE VISUALIZATIONS FOR PERFORMANCE MONITORING OF EXTENSION SERVICES PROGRAMS, PROJECTS, AND ACTIVITIES', 'Yes', 'De Jesus, Noelyn M.', '-', '-', '2023-03-03', '-', '-', 'Refereed', 'National', 'R&D Papers in Scientific Journals', 'Main Author', '-', '(IJACSA) International Journal of Advanced Computer Science and Applications', 'https://www.researchgate.net/publication/367982528_Descriptive_Analytics_and_Interactive_Visualizations_for_Performance_Monitoring_of_Extension_Services_Programs_Projects_and_Activities', '-', 79, '2024-01-18 03:08:57'),
(47, 'Proceeding', 'A DEEP NEURAL NETWORK IN A WEB-BASED CAREER TRACK RECOMMENDER SYSTEM FOR LOWER SECONDARY EDUCATION', 'Yes', 'De Jesus, Noelyn M.', '-', '-', '2022-02-04', '-', '-', 'Refereed', 'International', 'Papers Presented in Conferences', 'Co-Author', '-', '2022 2nd Asian Conference on Innovation in Technology (ASIANCON)', 'https://ieeexplore.ieee.org/document/9908965', '-', 79, '2024-01-18 03:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_training`
--

CREATE TABLE `seminar_training` (
  `id` int NOT NULL,
  `title_seminar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer_seminar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue_seminar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_seminar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_seminar` date NOT NULL,
  `from_seminar` date NOT NULL,
  `added_by` int NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_training`
--

INSERT INTO `seminar_training` (`id`, `title_seminar`, `organizer_seminar`, `venue_seminar`, `conference_seminar`, `to_seminar`, `from_seminar`, `added_by`, `dateAdded`) VALUES
(2, 'test', 'test', 'test', 'Local', '2023-12-08', '2023-12-08', 67, '2023-12-29 00:00:00'),
(3, '-', '-', '-', 'International', '2023-12-22', '2024-01-06', 56, '2023-12-29 00:00:00'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Batangas State University', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'Local', '2023-12-30', '2023-12-30', 79, '2023-12-30 00:00:00'),
(15, 'testing', 'testing', 'testing', 'Local', '2024-01-13', '2024-01-13', 79, '2024-01-12 14:18:29'),
(17, 'TEST2', '-', '-', 'Local', '2024-02-10', '2024-01-16', 79, '2024-01-16 21:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int NOT NULL,
  `specialization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `specialization`, `primary_field`, `added_by`) VALUES
(32, 'ARTIFICIAL INTELLIGENCE', 'Yes', 79),
(33, 'MANAGEMENT INFORMATION SYSTEMS', 'Yes', 79),
(37, 'Database Management', 'No', 79);

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int NOT NULL,
  `added_by` int NOT NULL,
  `academic_year` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institutional_research_first_sem` int NOT NULL DEFAULT '0',
  `institutional_research_second_sem` int NOT NULL DEFAULT '0',
  `institutional_research_total` int NOT NULL DEFAULT '0',
  `research_publication_first_sem` int NOT NULL DEFAULT '0',
  `research_publication_second_sem` int NOT NULL DEFAULT '0',
  `research_publication_total` int NOT NULL DEFAULT '0',
  `research_presentation_first_sem` int NOT NULL DEFAULT '0',
  `research_presentation_second_sem` int NOT NULL DEFAULT '0',
  `research_presentation_total` int NOT NULL DEFAULT '0',
  `research_development_first_sem` int NOT NULL DEFAULT '0',
  `research_development_second_sem` int NOT NULL DEFAULT '0',
  `research_development_total` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `added_by`, `academic_year`, `institutional_research_first_sem`, `institutional_research_second_sem`, `institutional_research_total`, `research_publication_first_sem`, `research_publication_second_sem`, `research_publication_total`, `research_presentation_first_sem`, `research_presentation_second_sem`, `research_presentation_total`, `research_development_first_sem`, `research_development_second_sem`, `research_development_total`) VALUES
(1, 79, '2024-2025', 1, 2, 3, 3, 4, 7, 5, 6, 11, 7, 8, 15),
(2, 79, '2023-2024', 0, 2, 2, 0, 1, 1, 0, 3, 3, 0, 1, 1),
(3, 56, '2023-2024', 0, 10, 10, 0, 10, 10, 0, 10, 10, 0, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` int NOT NULL,
  `notification_id` int NOT NULL,
  `user_id` int NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `notification_id`, `user_id`, `state`) VALUES
(12, 8, 56, 0),
(13, 8, 58, 1),
(14, 8, 66, 0),
(15, 8, 69, 0),
(16, 8, 71, 0),
(17, 8, 77, 0),
(18, 8, 79, 0),
(19, 8, 81, 0),
(20, 8, 89, 0),
(21, 8, 93, 0),
(22, 8, 97, 0),
(23, 9, 56, 0),
(24, 9, 58, 1),
(25, 9, 66, 0),
(26, 9, 69, 0),
(27, 9, 71, 0),
(28, 9, 77, 0),
(29, 9, 79, 0),
(30, 9, 81, 0),
(31, 9, 89, 0),
(32, 9, 93, 0),
(33, 9, 97, 0),
(34, 10, 57, 0),
(35, 10, 64, 0),
(36, 10, 65, 1),
(37, 10, 90, 0),
(38, 10, 56, 0),
(39, 10, 58, 1),
(40, 10, 66, 0),
(41, 10, 69, 0),
(42, 10, 71, 0),
(43, 10, 77, 0),
(44, 10, 79, 0),
(45, 10, 81, 0),
(46, 10, 89, 0),
(47, 10, 93, 0),
(48, 10, 97, 0),
(49, 11, 57, 0),
(50, 11, 64, 0),
(51, 11, 65, 1),
(52, 11, 90, 0),
(53, 11, 56, 0),
(54, 11, 58, 1),
(55, 11, 66, 0),
(56, 11, 69, 0),
(57, 11, 71, 0),
(58, 11, 77, 0),
(59, 11, 79, 0),
(60, 11, 81, 0),
(61, 11, 89, 0),
(62, 11, 93, 0),
(63, 11, 97, 0),
(64, 12, 57, 0),
(65, 12, 64, 0),
(66, 12, 65, 1),
(67, 12, 90, 0),
(68, 12, 56, 0),
(69, 12, 58, 1),
(70, 12, 66, 0),
(71, 12, 69, 0),
(72, 12, 71, 0),
(73, 12, 77, 0),
(74, 12, 79, 0),
(75, 12, 81, 0),
(76, 12, 89, 0),
(77, 12, 93, 0),
(78, 12, 97, 0),
(79, 13, 57, 0),
(80, 13, 64, 0),
(81, 13, 65, 1),
(82, 13, 90, 0),
(83, 13, 56, 0),
(84, 13, 58, 1),
(85, 13, 66, 0),
(86, 13, 69, 0),
(87, 13, 71, 0),
(88, 13, 77, 0),
(89, 13, 79, 0),
(90, 13, 81, 0),
(91, 13, 89, 0),
(92, 13, 93, 0),
(93, 13, 97, 0),
(94, 14, 57, 0),
(95, 14, 64, 0),
(96, 14, 65, 1),
(97, 14, 90, 0),
(98, 14, 56, 0),
(99, 14, 58, 1),
(100, 14, 66, 0),
(101, 14, 69, 0),
(102, 14, 71, 0),
(103, 14, 77, 0),
(104, 14, 79, 0),
(105, 14, 81, 0),
(106, 14, 89, 0),
(107, 14, 93, 0),
(108, 14, 97, 0),
(109, 15, 57, 0),
(110, 15, 64, 0),
(111, 15, 65, 1),
(112, 15, 90, 0),
(113, 15, 56, 0),
(114, 15, 58, 1),
(115, 15, 66, 0),
(116, 15, 69, 0),
(117, 15, 71, 0),
(118, 15, 77, 0),
(119, 15, 79, 0),
(120, 15, 81, 0),
(121, 15, 89, 0),
(122, 15, 93, 0),
(123, 15, 97, 0),
(124, 16, 57, 0),
(125, 16, 64, 0),
(126, 16, 65, 1),
(127, 16, 90, 0),
(128, 16, 56, 0),
(129, 16, 58, 1),
(130, 16, 66, 0),
(131, 16, 69, 0),
(132, 16, 71, 0),
(133, 16, 77, 0),
(134, 16, 79, 0),
(135, 16, 81, 0),
(136, 16, 89, 0),
(137, 16, 93, 0),
(138, 16, 97, 0),
(139, 17, 57, 0),
(140, 17, 64, 1),
(141, 17, 65, 1),
(142, 17, 90, 0),
(143, 17, 56, 0),
(144, 17, 58, 1),
(145, 17, 66, 0),
(146, 17, 69, 0),
(147, 17, 71, 0),
(148, 17, 77, 0),
(149, 17, 79, 0),
(150, 17, 81, 0),
(151, 17, 89, 0),
(152, 17, 93, 0),
(153, 17, 97, 0),
(154, 18, 57, 0),
(155, 18, 64, 0),
(156, 18, 65, 1),
(157, 18, 90, 0),
(158, 18, 56, 0),
(159, 18, 58, 1),
(160, 18, 66, 0),
(161, 18, 69, 0),
(162, 18, 71, 0),
(163, 18, 77, 0),
(164, 18, 79, 0),
(165, 18, 81, 0),
(166, 18, 89, 0),
(167, 18, 93, 0),
(168, 18, 97, 0),
(169, 19, 57, 0),
(170, 19, 64, 0),
(171, 19, 65, 1),
(172, 19, 90, 0),
(173, 19, 56, 0),
(174, 19, 58, 1),
(175, 19, 66, 0),
(176, 19, 69, 0),
(177, 19, 71, 0),
(178, 19, 77, 0),
(179, 19, 79, 0),
(180, 19, 81, 0),
(181, 19, 89, 0),
(182, 19, 93, 0),
(183, 19, 97, 0),
(184, 20, 57, 0),
(185, 20, 64, 0),
(186, 20, 65, 1),
(187, 20, 90, 0),
(188, 20, 56, 0),
(189, 20, 58, 1),
(190, 20, 66, 0),
(191, 20, 69, 0),
(192, 20, 71, 0),
(193, 20, 77, 0),
(194, 20, 79, 0),
(195, 20, 81, 0),
(196, 20, 89, 0),
(197, 20, 93, 0),
(198, 20, 97, 0),
(199, 21, 57, 0),
(200, 21, 64, 0),
(201, 21, 65, 1),
(202, 21, 90, 0),
(203, 21, 56, 0),
(204, 21, 58, 1),
(205, 21, 66, 0),
(206, 21, 69, 0),
(207, 21, 71, 0),
(208, 21, 77, 0),
(209, 21, 79, 0),
(210, 21, 81, 0),
(211, 21, 89, 0),
(212, 21, 93, 0),
(213, 21, 97, 0),
(214, 22, 57, 0),
(215, 22, 64, 1),
(216, 22, 65, 1),
(217, 22, 90, 0),
(218, 22, 56, 0),
(219, 22, 58, 1),
(220, 22, 66, 0),
(221, 22, 69, 0),
(222, 22, 71, 0),
(223, 22, 77, 0),
(224, 22, 79, 0),
(225, 22, 81, 0),
(226, 22, 89, 0),
(227, 22, 93, 0),
(228, 22, 97, 0),
(229, 23, 57, 0),
(230, 23, 64, 0),
(231, 23, 65, 1),
(232, 23, 90, 0),
(233, 23, 56, 0),
(234, 23, 58, 1),
(235, 23, 66, 0),
(236, 23, 69, 0),
(237, 23, 71, 0),
(238, 23, 77, 0),
(239, 23, 79, 0),
(240, 23, 81, 0),
(241, 23, 89, 0),
(242, 23, 93, 0),
(243, 23, 97, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_background`
--
ALTER TABLE `academic_background`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvalletter`
--
ALTER TABLE `approvalletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_folder_id` (`create_folder_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campus_id` (`campus_id`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `create_folder`
--
ALTER TABLE `create_folder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `ctc`
--
ALTER TABLE `ctc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_topic_id` (`research_topic_id`);

--
-- Indexes for table `faculty_user`
--
ALTER TABLE `faculty_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `inventions`
--
ALTER TABLE `inventions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `personal_profile`
--
ALTER TABLE `personal_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `project_profile`
--
ALTER TABLE `project_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_id` (`comments_id`);

--
-- Indexes for table `representative`
--
ALTER TABLE `representative`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_representatives_id` (`research_representatives_id`);

--
-- Indexes for table `representative_roles`
--
ALTER TABLE `representative_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_representatives`
--
ALTER TABLE `research_representatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_topic_id` (`research_topic_id`);

--
-- Indexes for table `research_representatives_responsibilities`
--
ALTER TABLE `research_representatives_responsibilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_representatives_id` (`research_representatives_id`);

--
-- Indexes for table `research_topic`
--
ALTER TABLE `research_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `research_topic_comments`
--
ALTER TABLE `research_topic_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_topic_id` (`research_topic_id`),
  ADD KEY `sender` (`sender`);

--
-- Indexes for table `responsibilities`
--
ALTER TABLE `responsibilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scw_`
--
ALTER TABLE `scw_`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `seminar_training`
--
ALTER TABLE `seminar_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_id` (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_background`
--
ALTER TABLE `academic_background`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `approvalletter`
--
ALTER TABLE `approvalletter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `create_folder`
--
ALTER TABLE `create_folder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `ctc`
--
ALTER TABLE `ctc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `faculty_user`
--
ALTER TABLE `faculty_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `inventions`
--
ALTER TABLE `inventions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_profile`
--
ALTER TABLE `personal_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `project_profile`
--
ALTER TABLE `project_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `representative`
--
ALTER TABLE `representative`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `research_representatives_responsibilities`
--
ALTER TABLE `research_representatives_responsibilities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `research_topic_comments`
--
ALTER TABLE `research_topic_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

--
-- AUTO_INCREMENT for table `scw_`
--
ALTER TABLE `scw_`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `seminar_training`
--
ALTER TABLE `seminar_training`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_background`
--
ALTER TABLE `academic_background`
  ADD CONSTRAINT `academic_background_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`create_folder_id`) REFERENCES `create_folder` (`id`),
  ADD CONSTRAINT `certificates_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `college`
--
ALTER TABLE `college`
  ADD CONSTRAINT `college_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`);

--
-- Constraints for table `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `conferences_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `create_folder`
--
ALTER TABLE `create_folder`
  ADD CONSTRAINT `create_folder_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `employment_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`research_topic_id`) REFERENCES `research_topic` (`id`);

--
-- Constraints for table `faculty_user`
--
ALTER TABLE `faculty_user`
  ADD CONSTRAINT `faculty_user_ibfk_2` FOREIGN KEY (`college_id`) REFERENCES `college` (`id`);

--
-- Constraints for table `inventions`
--
ALTER TABLE `inventions`
  ADD CONSTRAINT `inventions_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `personal_profile`
--
ALTER TABLE `personal_profile`
  ADD CONSTRAINT `personal_profile_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `college` (`id`);

--
-- Constraints for table `project_profile`
--
ALTER TABLE `project_profile`
  ADD CONSTRAINT `project_profile_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `representative`
--
ALTER TABLE `representative`
  ADD CONSTRAINT `representative_ibfk_1` FOREIGN KEY (`research_representatives_id`) REFERENCES `research_representatives` (`id`);

--
-- Constraints for table `research_topic`
--
ALTER TABLE `research_topic`
  ADD CONSTRAINT `research_topic_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `college` (`id`),
  ADD CONSTRAINT `research_topic_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `program` (`id`),
  ADD CONSTRAINT `research_topic_ibfk_3` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `specialization`
--
ALTER TABLE `specialization`
  ADD CONSTRAINT `specialization_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `target_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `faculty_user` (`id`);

--
-- Constraints for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD CONSTRAINT `user_notification_ibfk_1` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`),
  ADD CONSTRAINT `user_notification_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `faculty_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
