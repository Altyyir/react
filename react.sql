-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 09:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `advertising_expenses`
--

CREATE TABLE `advertising_expenses` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `communication_equipment`
--

CREATE TABLE `communication_equipment` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_services`
--

CREATE TABLE `consultancy_services` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_software`
--

CREATE TABLE `equipment_software` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forei`
--

CREATE TABLE `forei` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fostage_deliveries`
--

CREATE TABLE `fostage_deliveries` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_services`
--

CREATE TABLE `general_services` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `internet_expenses`
--

CREATE TABLE `internet_expenses` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment`
--

CREATE TABLE `it_equipment` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_equip`
--

CREATE TABLE `laboratory_equip` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_equipment`
--

CREATE TABLE `laboratory_equipment` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `local`
--

CREATE TABLE `local` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `machineries`
--

CREATE TABLE `machineries` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `machineries_equipment`
--

CREATE TABLE `machineries_equipment` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `other1`
--

CREATE TABLE `other1` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `other2`
--

CREATE TABLE `other2` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `other3`
--

CREATE TABLE `other3` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `other_financial`
--

CREATE TABLE `other_financial` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `other_proffesional`
--

CREATE TABLE `other_proffesional` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `printing_binding`
--

CREATE TABLE `printing_binding` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rent_expenses`
--

CREATE TABLE `rent_expenses` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `research_topic`
--

CREATE TABLE `research_topic` (
  `Id` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `partnership` varchar(255) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `sdg1` tinyint(1) NOT NULL,
  `sdg2` tinyint(1) NOT NULL,
  `sdg3` tinyint(1) NOT NULL,
  `sdg4` tinyint(1) NOT NULL,
  `sdg5` tinyint(1) NOT NULL,
  `sdg6` tinyint(1) NOT NULL,
  `sdg7` tinyint(1) NOT NULL,
  `sdg8` tinyint(1) NOT NULL,
  `sdg9` tinyint(1) NOT NULL,
  `sdg10` tinyint(1) NOT NULL,
  `sdg11` tinyint(1) NOT NULL,
  `sdg12` tinyint(1) NOT NULL,
  `sdg13` tinyint(1) NOT NULL,
  `sdg14` tinyint(1) NOT NULL,
  `sdg15` tinyint(1) NOT NULL,
  `sdg16` tinyint(1) NOT NULL,
  `sdg17` tinyint(1) NOT NULL,
  `college` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `female` double NOT NULL,
  `male` double NOT NULL,
  `statusProposal` varchar(255) DEFAULT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_topic`
--

INSERT INTO `research_topic` (`Id`, `title`, `agenda`, `partnership`, `sponsor`, `sdg1`, `sdg2`, `sdg3`, `sdg4`, `sdg5`, `sdg6`, `sdg7`, `sdg8`, `sdg9`, `sdg10`, `sdg11`, `sdg12`, `sdg13`, `sdg14`, `sdg15`, `sdg16`, `sdg17`, `college`, `department`, `startDate`, `endDate`, `female`, `male`, `statusProposal`, `dateAdded`) VALUES
('64f8914ef1b034.42743623', 'q', 'Disaster Risk Management and Health Research (DRMHR)', 'Externaly Funded', 'w', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Choose College', 'Choose Department', '2023-09-06', '2023-09-06', 0, 0, NULL, '2023-09-06 00:00:00'),
('64f8928b9c03c1.74915210', 'r', 'Choose Research Agenda', 'Choose Nature of Partnership', 'r', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Choose College', 'Choose Department', '2023-09-06', '2023-09-06', 0, 0, NULL, '2023-09-06 00:00:00'),
('64f893453c2163.20382890', 'y', 'Choose Research Agenda', 'Choose Nature of Partnership', 'y', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Choose College', 'Choose Department', '2023-09-06', '2023-09-06', 0, 0, NULL, '2023-09-06 00:00:00'),
('64f89384942eb9.85214828', 'w', 'Choose Research Agenda', 'Choose Nature of Partnership', 'w', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Choose College', 'Choose Department', '2023-09-06', '2023-09-06', 0, 0, NULL, '2023-09-06 00:00:00'),
('64f8940e265f08.83902842', 'E', 'Choose Research Agenda', 'Choose Nature of Partnership', 'E', 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Choose College', 'Choose Department', '2023-09-06', '2023-09-06', 0, 0, NULL, '2023-09-06 23:00:30'),
('64f8942db52b89.49390754', 'Q', 'Choose Research Agenda', 'Choose Nature of Partnership', 'Q', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Choose College', 'Choose Department', '2023-09-29', '2023-09-21', 0, 0, NULL, '2023-09-06 23:01:01'),
('64f89eab772353.95490095', 'React (Research Activity Tracker): An Innovative Tool for Tracking and Monitoring BatstateU Faculty Research Performance', 'Agriculture, Aquatic, and Natural Resources Research (AANRR)', 'Institutionaly Funded', 'Jhorely C. Gabriel', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Choose College', 'Choose Department', '2023-09-06', '2023-09-06', 0, 0, NULL, '2023-09-06 23:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `responsibility`
--

CREATE TABLE `responsibility` (
  `Id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `responsibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsibility`
--

INSERT INTO `responsibility` (`Id`, `role`, `responsibility`) VALUES
(1, 'Project Leader/s', 'Spearhead the extension project'),
(2, 'Project Leader/s', 'Identify the projects overall goal, outcome and objectives'),
(3, 'Project Leader/s', 'Monitor the flow of the training'),
(4, 'Project Leader/s', 'Prepare project/activity proposal'),
(5, 'Project Leader/s', 'Coordinate with the coorperating agency/resource persons'),
(6, 'Asst. Project Leader/s', 'Assist the project leader in the planning, implementation, monitoring and evaluation of the project'),
(7, 'Asst. Project Leader/s', 'Delegate work to the project, staff'),
(8, 'Asst. Project Leader/s', 'Assist in coordination with the coorperating agency'),
(9, 'Asst. Project Leader/s', 'Assign resource persons from the University with specialization in the topics'),
(10, 'Project Coordinator/s or Staff', 'Act as technical team in the online platforms'),
(11, 'Project Coordinator/s or Staff', 'Coordinate with the rest of the project management team'),
(12, 'Project Coordinator/s or Staff', 'Assist in communication with the coorperating agencies'),
(13, 'Project Coordinator/s or Staff', 'Assist in organization of the beneficiaries'),
(14, 'Project Coordinator/s or Staff', ' Assist in the preparation and implementing of the extension program'),
(15, 'Project Coordinator/s or Staff', 'Prepare training materials and presentations'),
(16, 'Project Coordinator/s or Staff', 'Prepare required reports/documentation'),
(17, 'Project Coordinator/s or Staff', 'Assist in the morning and evaluation of the extension program');

-- --------------------------------------------------------

--
-- Table structure for table `responsibility_asstleader`
--

CREATE TABLE `responsibility_asstleader` (
  `Id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `responsibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsibility_asstleader`
--

INSERT INTO `responsibility_asstleader` (`Id`, `role`, `responsibility`) VALUES
(1, 'Asst. Project Leader/s', 'Assist the project leader in the planning, implementation, monitoring and evaluation of the project'),
(2, 'Asst. Project Leader/s', 'Delegate work to the project, staff'),
(3, 'Asst. Project Leader/s', 'Assist in coordination with the coorperating agency'),
(4, 'Asst. Project Leader/s', 'Assign resource persons from the University with specialization in the topics');

-- --------------------------------------------------------

--
-- Table structure for table `responsibility_leader`
--

CREATE TABLE `responsibility_leader` (
  `Id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `responsibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsibility_leader`
--

INSERT INTO `responsibility_leader` (`Id`, `role`, `responsibility`) VALUES
(1, 'Project Leader/s', 'Spearhead the extension project'),
(2, 'Project Leader/s', 'Identify the projects overall goal, outcome and objectives'),
(3, 'Project Leader/s', 'Monitor the flow of the training'),
(4, 'Project Leader/s', 'Prepare project/activity proposal'),
(5, 'Project Leader/s', 'Coordinate with the coorperating agency/resource persons');

-- --------------------------------------------------------

--
-- Table structure for table `responsibility_staff`
--

CREATE TABLE `responsibility_staff` (
  `Id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `responsibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsibility_staff`
--

INSERT INTO `responsibility_staff` (`Id`, `role`, `responsibility`) VALUES
(1, 'Project Coordinator/s or Staff', 'Act as technical team in the online platforms'),
(2, 'Project Coordinator/s or Staff', 'Coordinate with the rest of the project management team'),
(3, 'Project Coordinator/s or Staff', 'Assist in communication with the coorperating agencies'),
(4, 'Project Coordinator/s or Staff', 'Assist in organization of the beneficiaries'),
(5, 'Project Coordinator/s or Staff', ' Assist in the preparation and implementing of the extension program'),
(6, 'Project Coordinator/s or Staff', 'Prepare training materials and presentations'),
(7, 'Project Coordinator/s or Staff', 'Prepare required reports/documentation'),
(8, 'Project Coordinator/s or Staff', 'Assist in the morning and evaluation of the extension program');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `name`, `designation`) VALUES
(1, 'Dr. Tirso A. Ronquillo', 'University President'),
(2, 'Dr. Charmaine Rose I. Trivino', 'Vice President for Academic Affairs'),
(3, 'Assoc. Prof. Albertson D. Amante', 'Vice for Research Development and Extension Services'),
(4, 'Atty. Luzviminda V. Rosales', 'Vice President for Administrator and Financer'),
(5, 'Atty. Noel Alberto S. Omandap', 'Vice President for Development and External Affairs'),
(6, 'Dr. Expedito V. Acorda', 'Chancellor'),
(7, 'Dr. Rosalinda M. Comia', 'Campus Director'),
(8, 'Assoc. Prof. Sandy M. Gonzales', 'Campus Director'),
(9, 'Dr. Joy M. Reyes', 'Campus Director'),
(10, 'Dr. Jessie A. Montalbo', 'Chancellor'),
(11, 'Dr. Rhobert E. Alvarez', 'Capus Director'),
(12, 'Dr. Romel U. Briones', 'Campus Director'),
(13, 'Dr. Jodi Belina A. Bejer', 'Campus Director'),
(14, 'Atty. Alvin R. De Silva', 'Chancellor'),
(15, 'Dr. Philip Y. Del Rosario', 'Chancellor'),
(16, 'Dr. Enrico M. Dalangin', 'Chancellor'),
(17, 'Dr. Vaberlie P. Mandane Garcia', 'Director for Extension Servies'),
(18, 'Dr. Benedict O. Medina', 'Asst. Director for Extension Monitoring and Impace Assessment'),
(19, 'Ms. Kristia Lei A. Reyes', 'Asst. Director for Community Development Services'),
(20, 'Assoc. Prof. Maria Theresa A. Hernandez', 'Asst. Director for Gender and Development Advocacies'),
(21, 'Dr. Vaberlie P. Mandane-Garcia', 'Vice Chancellor for Research, Development and Extension Services'),
(22, 'Dr. Elisa D. Gutierrez', 'Vice Chancellor for Research, Development and Extension Services'),
(23, 'Dr. Eufronia Magundayao', 'Vice Chancellor for Research, Development and Extension Services'),
(24, 'Asst. Prof. Rosana C. Lat', 'Vice Chancellor for Research, Development and Extension Services'),
(25, 'Assoc. Prof. Maria Theresa A. Hernandez', 'Vice Chancellor for Research, Development and Extension Services');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_expenses`
--

CREATE TABLE `subscription_expenses` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplies_materials`
--

CREATE TABLE `supplies_materials` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tdpl`
--

CREATE TABLE `tdpl` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technical_scien`
--

CREATE TABLE `technical_scien` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technical_scientific`
--

CREATE TABLE `technical_scientific` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `telephone_expenses`
--

CREATE TABLE `telephone_expenses` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training_expences`
--

CREATE TABLE `training_expences` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transportation_expenses`
--

CREATE TABLE `transportation_expenses` (
  `Id` varchar(50) NOT NULL,
  `research_topic_Id` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_cost` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertising_expenses`
--
ALTER TABLE `advertising_expenses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `communication_equipment`
--
ALTER TABLE `communication_equipment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `consultancy_services`
--
ALTER TABLE `consultancy_services`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `equipment_software`
--
ALTER TABLE `equipment_software`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `forei`
--
ALTER TABLE `forei`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `fostage_deliveries`
--
ALTER TABLE `fostage_deliveries`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `general_services`
--
ALTER TABLE `general_services`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `internet_expenses`
--
ALTER TABLE `internet_expenses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `it_equipment`
--
ALTER TABLE `it_equipment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `laboratory_equip`
--
ALTER TABLE `laboratory_equip`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `laboratory_equipment`
--
ALTER TABLE `laboratory_equipment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `machineries`
--
ALTER TABLE `machineries`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `machineries_equipment`
--
ALTER TABLE `machineries_equipment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `other1`
--
ALTER TABLE `other1`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `other2`
--
ALTER TABLE `other2`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `other3`
--
ALTER TABLE `other3`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `other_financial`
--
ALTER TABLE `other_financial`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `other_proffesional`
--
ALTER TABLE `other_proffesional`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `printing_binding`
--
ALTER TABLE `printing_binding`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `rent_expenses`
--
ALTER TABLE `rent_expenses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `research_topic`
--
ALTER TABLE `research_topic`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `responsibility`
--
ALTER TABLE `responsibility`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `responsibility_asstleader`
--
ALTER TABLE `responsibility_asstleader`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `responsibility_leader`
--
ALTER TABLE `responsibility_leader`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `responsibility_staff`
--
ALTER TABLE `responsibility_staff`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subscription_expenses`
--
ALTER TABLE `subscription_expenses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `supplies_materials`
--
ALTER TABLE `supplies_materials`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `tdpl`
--
ALTER TABLE `tdpl`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `technical_scien`
--
ALTER TABLE `technical_scien`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `technical_scientific`
--
ALTER TABLE `technical_scientific`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `telephone_expenses`
--
ALTER TABLE `telephone_expenses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `training_expences`
--
ALTER TABLE `training_expences`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- Indexes for table `transportation_expenses`
--
ALTER TABLE `transportation_expenses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `research_topic_Id` (`research_topic_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `responsibility`
--
ALTER TABLE `responsibility`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `responsibility_asstleader`
--
ALTER TABLE `responsibility_asstleader`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `responsibility_leader`
--
ALTER TABLE `responsibility_leader`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responsibility_staff`
--
ALTER TABLE `responsibility_staff`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertising_expenses`
--
ALTER TABLE `advertising_expenses`
  ADD CONSTRAINT `advertising_expenses_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `communication_equipment`
--
ALTER TABLE `communication_equipment`
  ADD CONSTRAINT `communication_equipment_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `consultancy_services`
--
ALTER TABLE `consultancy_services`
  ADD CONSTRAINT `consultancy_services_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `equipment_software`
--
ALTER TABLE `equipment_software`
  ADD CONSTRAINT `equipment_software_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `forei`
--
ALTER TABLE `forei`
  ADD CONSTRAINT `forei_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `fostage_deliveries`
--
ALTER TABLE `fostage_deliveries`
  ADD CONSTRAINT `fostage_deliveries_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `general_services`
--
ALTER TABLE `general_services`
  ADD CONSTRAINT `general_services_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `internet_expenses`
--
ALTER TABLE `internet_expenses`
  ADD CONSTRAINT `internet_expenses_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `it_equipment`
--
ALTER TABLE `it_equipment`
  ADD CONSTRAINT `it_equipment_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `laboratory_equip`
--
ALTER TABLE `laboratory_equip`
  ADD CONSTRAINT `laboratory_equip_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `laboratory_equipment`
--
ALTER TABLE `laboratory_equipment`
  ADD CONSTRAINT `laboratory_equipment_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `machineries`
--
ALTER TABLE `machineries`
  ADD CONSTRAINT `machineries_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `machineries_equipment`
--
ALTER TABLE `machineries_equipment`
  ADD CONSTRAINT `machineries_equipment_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `other1`
--
ALTER TABLE `other1`
  ADD CONSTRAINT `other1_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `other2`
--
ALTER TABLE `other2`
  ADD CONSTRAINT `other2_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `other3`
--
ALTER TABLE `other3`
  ADD CONSTRAINT `other3_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `other_financial`
--
ALTER TABLE `other_financial`
  ADD CONSTRAINT `other_financial_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `other_proffesional`
--
ALTER TABLE `other_proffesional`
  ADD CONSTRAINT `other_proffesional_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `printing_binding`
--
ALTER TABLE `printing_binding`
  ADD CONSTRAINT `printing_binding_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `rent_expenses`
--
ALTER TABLE `rent_expenses`
  ADD CONSTRAINT `rent_expenses_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `subscription_expenses`
--
ALTER TABLE `subscription_expenses`
  ADD CONSTRAINT `subscription_expenses_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `supplies_materials`
--
ALTER TABLE `supplies_materials`
  ADD CONSTRAINT `supplies_materials_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `tdpl`
--
ALTER TABLE `tdpl`
  ADD CONSTRAINT `tdpl_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `technical_scien`
--
ALTER TABLE `technical_scien`
  ADD CONSTRAINT `technical_scien_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `technical_scientific`
--
ALTER TABLE `technical_scientific`
  ADD CONSTRAINT `technical_scientific_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `telephone_expenses`
--
ALTER TABLE `telephone_expenses`
  ADD CONSTRAINT `telephone_expenses_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `training_expences`
--
ALTER TABLE `training_expences`
  ADD CONSTRAINT `training_expences_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);

--
-- Constraints for table `transportation_expenses`
--
ALTER TABLE `transportation_expenses`
  ADD CONSTRAINT `transportation_expenses_ibfk_1` FOREIGN KEY (`research_topic_Id`) REFERENCES `research_topic` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
