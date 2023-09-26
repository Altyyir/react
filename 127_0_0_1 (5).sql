-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 06:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
CREATE DATABASE IF NOT EXISTS `react` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `react`;

-- --------------------------------------------------------

--
-- Table structure for table `local_cost`
--

CREATE TABLE `local_cost` (
  `id` varchar(255) NOT NULL DEFAULT uuid(),
  `research_topic_id` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `representative`
--

CREATE TABLE `representative` (
  `id` varchar(255) NOT NULL DEFAULT uuid(),
  `research_representatives_id` varchar(255) NOT NULL,
  `representative_roles_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `representative_roles`
--

CREATE TABLE `representative_roles` (
  `id` varchar(255) NOT NULL DEFAULT uuid(),
  `name` varchar(100) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id` varchar(255) NOT NULL DEFAULT uuid(),
  `research_topic_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `research_representatives_responsibilities`
--

CREATE TABLE `research_representatives_responsibilities` (
  `id` varchar(255) NOT NULL DEFAULT uuid(),
  `research_representatives_id` varchar(255) NOT NULL,
  `responsibilities_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `research_topic`
--

CREATE TABLE `research_topic` (
  `id` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `research_agenda` varchar(100) NOT NULL,
  `partnership` varchar(50) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `sdg_1` tinyint(1) DEFAULT 0,
  `sdg_2` tinyint(1) DEFAULT 0,
  `sdg_3` tinyint(1) DEFAULT 0,
  `sdg_4` tinyint(1) DEFAULT 0,
  `sdg_5` tinyint(1) DEFAULT 0,
  `sdg_6` tinyint(1) DEFAULT 0,
  `sdg_7` tinyint(1) DEFAULT 0,
  `sdg_8` tinyint(1) DEFAULT 0,
  `sdg_9` tinyint(1) DEFAULT 0,
  `sdg_10` tinyint(1) DEFAULT 0,
  `sdg_11` tinyint(1) DEFAULT 0,
  `sdg_12` tinyint(1) DEFAULT 0,
  `sdg_13` tinyint(1) DEFAULT 0,
  `sdg_14` tinyint(1) DEFAULT 0,
  `sdg_15` tinyint(1) DEFAULT 0,
  `sdg_16` tinyint(1) DEFAULT 0,
  `sdg_17` tinyint(1) DEFAULT 0,
  `revision_no` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `female_no` varchar(25) NOT NULL,
  `male_no` varchar(25) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `executive_brief` mediumtext NOT NULL,
  `rationale` mediumtext NOT NULL,
  `objective` mediumtext NOT NULL,
  `publication` varchar(255) NOT NULL,
  `patent` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `people_service` varchar(255) NOT NULL,
  `partners_hip` varchar(255) NOT NULL,
  `policy` varchar(255) NOT NULL,
  `social_impact` varchar(255) NOT NULL,
  `economic_impact` varchar(255) NOT NULL,
  `rrl` mediumtext NOT NULL,
  `methodology` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `responsibilities`
--

CREATE TABLE `responsibilities` (
  `id` varchar(255) NOT NULL DEFAULT uuid(),
  `role` varchar(100) NOT NULL,
  `responsibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `local_cost`
--
ALTER TABLE `local_cost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_topic_id` (`research_topic_id`);

--
-- Indexes for table `representative`
--
ALTER TABLE `representative`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_representatives_id` (`research_representatives_id`),
  ADD KEY `representative_roles_id` (`representative_roles_id`);

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
  ADD KEY `research_representatives_id` (`research_representatives_id`),
  ADD KEY `responsibilities_id` (`responsibilities_id`);

--
-- Indexes for table `research_topic`
--
ALTER TABLE `research_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsibilities`
--
ALTER TABLE `responsibilities`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `local_cost`
--
ALTER TABLE `local_cost`
  ADD CONSTRAINT `local_cost_ibfk_1` FOREIGN KEY (`research_topic_id`) REFERENCES `research_topic` (`id`);

--
-- Constraints for table `representative`
--
ALTER TABLE `representative`
  ADD CONSTRAINT `representative_ibfk_1` FOREIGN KEY (`research_representatives_id`) REFERENCES `research_representatives` (`id`),
  ADD CONSTRAINT `representative_ibfk_2` FOREIGN KEY (`representative_roles_id`) REFERENCES `representative_roles` (`id`);

--
-- Constraints for table `research_representatives`
--
ALTER TABLE `research_representatives`
  ADD CONSTRAINT `research_representatives_ibfk_1` FOREIGN KEY (`research_topic_id`) REFERENCES `research_topic` (`id`);

--
-- Constraints for table `research_representatives_responsibilities`
--
ALTER TABLE `research_representatives_responsibilities`
  ADD CONSTRAINT `research_representatives_responsibilities_ibfk_1` FOREIGN KEY (`research_representatives_id`) REFERENCES `research_representatives` (`id`),
  ADD CONSTRAINT `research_representatives_responsibilities_ibfk_2` FOREIGN KEY (`responsibilities_id`) REFERENCES `responsibilities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
