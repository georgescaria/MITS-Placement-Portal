-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 01:11 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve_academics`
--

CREATE TABLE `approve_academics` (
  `college_id` varchar(50) NOT NULL,
  `10th_mark` varchar(40) NOT NULL DEFAULT 'NA',
  `12th_mark` varchar(40) NOT NULL DEFAULT 'NA',
  `s1` varchar(4) NOT NULL DEFAULT 'NA',
  `s2` varchar(4) NOT NULL DEFAULT 'NA',
  `s3` varchar(4) NOT NULL DEFAULT 'NA',
  `s4` varchar(4) NOT NULL DEFAULT 'NA',
  `s5` varchar(4) NOT NULL DEFAULT 'NA',
  `s6` varchar(4) NOT NULL DEFAULT 'NA',
  `s7` varchar(4) NOT NULL DEFAULT 'NA',
  `s8` varchar(4) NOT NULL DEFAULT 'NA',
  `CGPA` varchar(4) NOT NULL DEFAULT 'NA',
  `backlogs` int(50) NOT NULL,
  `request_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `date` datetime NOT NULL,
  `name` varchar(40) NOT NULL,
  `college_id` varchar(40) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`date`, `name`, `college_id`, `content`) VALUES
('2018-03-03 16:58:25', 'Admin', 'MUT15CS061', 'Hi! This is my first post!'),
('2018-03-03 17:50:42', 'Admin', 'MUT15CS061', 'News Feed run successfully'),
('2018-03-03 22:45:11', 'Admin', 'MUT15CS061', 'Time check'),
('2018-03-04 00:36:08', 'Admin', 'MUT15CS061', 'Check'),
('2018-03-04 09:50:47', 'Admin', 'MUT15CS061', 'Good Morning!'),
('2018-03-11 21:54:45', 'Admin', 'MUT15CS061', 'Test'),
('2019-03-26 20:51:42', 'Admin', 'MUT15CS061', 'Apply for Flipkart drive!'),
('2019-03-26 20:51:42', 'Admin', 'MUT15CS061', 'Apply for Flipkart drive!'),
('2019-03-27 14:49:45', 'Admin', 'MUT15CS061', 'Apply for Bosch drive!'),
('2019-04-02 22:17:58', 'Admin', 'MUT15CS061', 'Apply for Flpkart drive!'),
('2019-04-02 22:44:21', 'Admin', 'MUT15CS061', 'Apply for ABC drive!'),
('2019-04-02 22:47:34', 'Admin', 'MUT15CS061', 'Apply for aaaa drive!'),
('2019-04-02 22:54:17', 'Admin', 'MUT15CS061', 'Apply for ssss drive!'),
('2019-04-02 22:56:14', 'Admin', 'MUT15CS061', 'Apply for ssss drive!'),
('2019-04-02 23:00:32', 'Admin', 'MUT15CS061', 'Apply for www drive!'),
('2019-04-12 10:11:33', 'Admin', 'MUT15CS061', 'Apply for infosys drive!'),
('2019-07-13 20:08:01', 'George Scaria', 'MUT15CS028', 'New drive\r\n'),
('2020-10-17 21:43:53', 'Admin', 'MUT15CS061', 'Apply for TCS drive!'),
('2020-10-17 21:50:38', 'Admin', 'MUT15CS061', 'Apply for TCS drive!');

-- --------------------------------------------------------

--
-- Table structure for table `new_drive`
--

CREATE TABLE `new_drive` (
  `company_name` varchar(100) NOT NULL,
  `college_id` varchar(100) NOT NULL,
  `apply_status` varchar(100) NOT NULL,
  `package` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `drive_date` varchar(20) NOT NULL,
  `last_date` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_drive`
--

INSERT INTO `new_drive` (`company_name`, `college_id`, `apply_status`, `package`, `designation`, `job_description`, `drive_date`, `last_date`, `date_added`) VALUES
('IBM', 'MUT15CS001', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS002', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS003', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Bosch', 'MUT15CS005', 'Applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('Amazon', 'MUT15CS007', 'Not applied', '3', 'Developer', '', '2019-05-03', '', '2019-03-19 15:49:59'),
('IBM', 'MUT15CS008', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Amazon', 'MUT15CS011', 'Not applied', '3', 'Developer', '', '2019-05-03', '', '2019-03-19 15:49:59'),
('Bosch', 'MUT15CS012', 'Not applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('Amazon', 'MUT15CS013', 'Not applied', '3', 'Developer', '', '2019-05-03', '', '2019-03-19 15:49:59'),
('IBM', 'MUT15CS015', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Amazon', 'MUT15CS016', 'Not applied', '3', 'Developer', '', '2019-05-03', '', '2019-03-19 15:49:59'),
('IBM', 'MUT15CS017', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Bosch', 'MUT15CS019', 'Not applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('Amazon', 'MUT15CS021', 'Not applied', '3', 'Developer', '', '2019-05-03', '', '2019-03-19 15:49:59'),
('IBM', 'MUT15CS023', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS024', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Amazon', 'MUT15CS025', 'Not applied', '3', 'Developer', '', '2019-05-03', '', '2019-03-19 15:49:59'),
('IBM', 'MUT15CS027', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS028', 'Applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS029', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Bosch', 'MUT15CS030', 'Not applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('Amazon', 'MUT15CS031', 'Not applied', '3', 'Developer', '', '2019-05-03', '', '2019-03-19 15:49:59'),
('IBM', 'MUT15CS032', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS039', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Bosch', 'MUT15CS040', 'Not applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('IBM', 'MUT15CS041', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Amazon', 'MUT15CS044', 'Not applied', '3', 'Developer', '', '2019-05-03', '', '2019-03-19 15:49:59'),
('IBM', 'MUT15CS045', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS046', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Bosch', 'MUT15CS047', 'Not applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('Bosch', 'MUT15CS048', 'Not applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('IBM', 'MUT15CS049', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Bosch', 'MUT15CS052', 'Not applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('IBM', 'MUT15CS053', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS054', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('IBM', 'MUT15CS058', 'Not applied', '3.6', 'Systems engineer', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-05-06', '', '2019-03-19 14:30:11'),
('Bosch', 'MUT15CS059', 'Not applied', '5.0', 'Application developer ', 'A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents about their childrens’ vaccinationdates and provide healthrelated news. It wasdone as part of the UST Global NxGen Lead Season IX Program.  It wasdone as part of the UST Global NxGen Lead Season IX Program. A web application to manage the total internshipprocess at UST Global. Worked and got familiarized withAngular and Spring boot framework. \n A web application to view placement statistics, sort out students based on requirements, manage student profile, attend tests, upload resume and receive notifications about various events. An android application to mark attendance and view percentage of attendance for each subjects. An android application to remind parents abo', '2019-04-02', '', '2019-02-02 12:00:00'),
('Amazon', 'MUT15CS002', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS003', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS008', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS017', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS024', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS028', 'Applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS029', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS039', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS041', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS045', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS049', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS053', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS054', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Amazon', 'MUT15CS058', 'Not applied', '3.3', 'Software engineer', '', '2019-01-01', '', '2019-03-19 19:51:03'),
('Bosch', 'MUT15CS001', 'Not applied', '3', ' asasasasas', '', '', '', '2019-03-25 22:12:15'),
('Infosys', 'MUT15CS002', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS003', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS008', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS017', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS024', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS028', 'Applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS029', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS039', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS041', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS045', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS049', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS053', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS054', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Infosys', 'MUT15CS058', 'Not applied', '33.91', 'asd ', '', '2019-06-05', '', '2019-03-26 16:57:20'),
('Bosch', 'MUT15CS000', 'Not applied', '5', ' ', '', '', '', '2019-03-27 14:49:45'),
('Bosch', 'MUT15CS022', 'Not applied', '5', ' ', '', '', '', '2019-03-27 14:49:45'),
('Bosch', 'MUT15CS028', 'Not applied', '5', ' ', '', '', '', '2019-03-27 14:49:45'),
('Flpkart', 'MUT15CS028', 'Not applied', '', ' ', '', '', '', '2019-04-02 22:17:58'),
('ABC', 'MUT15CS028', 'Not applied', '4', 'Associate Systems Engineer', '', '', '', '2019-04-02 22:44:21'),
('aaaa', 'MUT15CS028', 'Not applied', '', '', '', '', '2019-04-06', '2019-04-02 22:47:34'),
('ssss', 'MUT15CS000', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS001', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS002', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS003', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS007', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS008', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS011', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS012', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS013', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS014', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS015', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS016', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS017', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS019', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS021', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS022', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS023', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS024', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS025', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS027', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS028', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS029', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS030', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS031', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS032', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS037', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS039', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS040', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS041', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS043', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS044', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS045', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS046', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS047', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS048', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS049', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS050', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS052', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS053', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS054', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS058', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS059', 'Not applied', '', 'sss', '', '', '', '2019-04-02 22:54:17'),
('ssss', 'MUT15CS000', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS001', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS002', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS003', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS007', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS008', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS011', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS012', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS013', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS014', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS015', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS016', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS017', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS019', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS021', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS022', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS023', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS024', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS025', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS027', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS028', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS029', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS030', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS031', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS032', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS037', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS039', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS040', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS041', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS043', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS044', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS045', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS046', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS047', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS048', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS049', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS050', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS052', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS053', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS054', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS058', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('ssss', 'MUT15CS059', 'Not applied', '', 'sss', '', '', '2019-04-05', '2019-04-02 22:56:14'),
('www', 'MUT15CS028', 'Not applied', '4', 'Associate Systems Engineer', 'developer post', '2019-04-10', '2019-04-04', '2019-04-02 23:00:32'),
('infosys', 'MUT15CS002', 'Not applied', '5', 'asd', ' ', '', '', '2019-04-12 10:11:33'),
('infosys', 'MUT15CS017', 'Not applied', '5', 'asd', ' ', '', '', '2019-04-12 10:11:33'),
('infosys', 'MUT15CS022', 'Not applied', '5', 'asd', ' ', '', '', '2019-04-12 10:11:33'),
('infosys', 'MUT15CS028', 'Not applied', '5', 'asd', ' ', '', '', '2019-04-12 10:11:33'),
('infosys', 'MUT15CS049', 'Not applied', '5', 'asd', ' ', '', '', '2019-04-12 10:11:33'),
('infosys', 'MUT15CS053', 'Not applied', '5', 'asd', ' ', '', '', '2019-04-12 10:11:33'),
('TCS', 'MUT15CS000', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:52'),
('TCS', 'MUT15CS002', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:52'),
('TCS', 'MUT15CS003', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:52'),
('TCS', 'MUT15CS008', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:52'),
('TCS', 'MUT15CS017', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:52'),
('TCS', 'MUT15CS022', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:52'),
('TCS', 'MUT15CS024', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:52'),
('TCS', 'MUT15CS028', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS029', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS039', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS041', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS045', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS049', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS053', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS054', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS058', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:43:53'),
('TCS', 'MUT15CS000', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS002', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS003', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS008', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS017', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS022', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS024', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS028', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS029', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS039', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS041', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS045', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS049', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS053', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS054', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38'),
('TCS', 'MUT15CS058', 'Not applied', '3.97', 'Software Engineer', ' N/A', '2020-10-28', '2020-10-21', '2020-10-17 21:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `placed`
--

CREATE TABLE `placed` (
  `college_id` varchar(40) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `company` varchar(40) NOT NULL,
  `package` varchar(40) NOT NULL,
  `batch` varchar(40) NOT NULL,
  `branch` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placed`
--

INSERT INTO `placed` (`college_id`, `student_name`, `company`, `package`, `batch`, `branch`) VALUES
('MUT13CS011', 'Shinoy Shaji', 'SunTec', '10', '2013-2017', ''),
('MUT13CS023', 'Neron Joseph', 'UST Global', '8', '2013-2017', ''),
('MUT13CS024', 'Aravind M', 'SunTec', '8', '2013-2014', ''),
('MUT14CS001', 'Abhijith', 'SectorQube', '7', '2014-2018', ''),
('MUT14CS012', 'Arun Baby', 'Experion', '8', '2014-2018', ''),
('MUT14CS018', 'Eldhose Joy', 'MQ Spectrum', '5', '2014-2018', ''),
('MUT14CS026', 'Mariya Stephen', 'SunTec', '7', '2014-2018', ''),
('MUT14CS031', 'Padma S', 'SunTec', '6', '2014-2018', ''),
('MUT15CS001', 'John Mathew', 'Infosys', '40', '2015-2019', ''),
('MUT15CS017', 'Archana Venugopal', 'WebTech', '500', '2015-2019', ''),
('MUT15CS022', 'Eldho Shaju', 'Tesla Motors', '12', '2015-2019', ''),
('MUT15CS028', 'George', 'Flipkart', '20', '2013-2017', ''),
('MUT15CS036', 'Jose D Maliakkal', 'Google', '48', '2015-2019', ''),
('MUT15CS043', 'Marvel Monson', 'Apple Inc.', '50', '2015-2019', ''),
('MUT15CS044', 'Mathews Ignatious', 'Flipkart', '25', '2015-2019', ''),
('MUT15CS049', 'Riya Binny', 'Infosys Karapakam', '100', '2015-2019', ''),
('MUT15CS051', 'Rohit Ramgopal', 'Google', '35', '2015-2019', ''),
('MUT15CS053', 'Aardra', 'Infosys', '8', '2015-2019', ''),
('MUT15CS077', 'Ananthu', 'Infosys', '20', '2015-2019', ''),
('MUT15CS095', 'Sarah ', 'TCS', '5', '2015-2019', ''),
('MUT15CS55', 'Sreehari Rajeev', 'Infosys', '5', '2015-2019', ''),
('MUT16CS036', 'Albin', 'UST Global', '10', '2016-2020', ''),
('MUT15CS028', 'George', 'Flipkart', '20', '2020-2020', ''),
('MUT15CS052', 'Roshin Jojo', 'Google', '6.5', '2015-2019', ''),
('MUT15CS011', 'aBC', 'MITS', '5', '2015-2019', '');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `college_id` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `size` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`college_id`, `student_name`, `file_name`, `date_added`, `size`, `type`) VALUES
('MUT15CS052', 'Roshin Jojo', 'finresume.pdf', '2018-04-03', '99260', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` varchar(100) NOT NULL,
  `test_date` datetime NOT NULL,
  `test_title` varchar(50) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `rules` varchar(600) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option_a` varchar(500) NOT NULL,
  `option_b` varchar(500) NOT NULL,
  `option_c` varchar(500) NOT NULL,
  `option_d` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_date`, `test_title`, `time_limit`, `rules`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
('Check2018-03-11 01:25:02', '2018-03-11 01:25:02', 'Check', 4, 'Rules', 'Q1', 'asd', 'sdf', 'dfg', 'dfga', 'a'),
('Check2018-03-11 01:25:02', '2018-03-11 01:25:02', 'Check', 4, 'Rules', 'Q2', 'a', 'b', 'c', 'd', 'e'),
('Aptitude2018-03-16 00:32:13', '2018-03-16 00:32:13', 'Aptitude', 2, 'No Rules', 'Q1', 'A', 'B', 'C ', 'D', 'B'),
('Aptitude2018-03-16 00:36:15', '2018-03-16 00:36:15', 'Aptitude', 2, 'No Rules', 'Q1', 'A', 'B', 'C ', 'D', 'B'),
('Aptitude Test2018-03-18 16:06:28', '2018-03-18 16:06:28', 'Aptitude Test', 4500, 'NONE', 'Prime Minister', 'A', 'B ', 'C', 'D', 'B'),
('Aptitude Test2018-03-18 16:06:28', '2018-03-18 16:06:28', 'Aptitude Test', 4500, 'NONE', 'President', 'A', 'B', 'C', 'D', 'D'),
('Aptitude Test2018-03-18 16:06:28', '2018-03-18 16:06:28', 'Aptitude Test', 4500, 'NONE', 'Minister', 'A', 'B', 'C', 'D', 'C'),
('Technical2018-04-04 10:23:54', '2018-04-04 10:23:54', 'Technical', 600, '', 'ye or no', 'A', 'B', 'C', 'D', 'C'),
('Technical2018-04-04 10:23:54', '2018-04-04 10:23:54', 'Technical', 600, '', 'hello?', 'A', 'B', 'C', 'D', 'C'),
('C Programming2019-03-28 20:49:54', '2019-03-28 20:49:54', 'C Programming', 600, 'MCQ questions', 'What are the types of linkages?', 'Internal and External', 'External, Internal and None', 'External and None', 'Internal', 'External, Internal and None'),
('C Programming2019-03-28 20:49:54', '2019-03-28 20:49:54', 'C Programming', 600, 'MCQ questions', 'Which of the following special symbol allowed in a variable name?', '* (asterisk)', '| (pipeline)', '- (hyphen)', '_ (underscore)', '_ (underscore)'),
('C Programming2019-03-28 20:49:54', '2019-03-28 20:49:54', 'C Programming', 600, 'MCQ questions', 'How would you round off a value from 1.66 to 2.0?', 'ceil(1.66)', 'floor(1.66)', 'roundup(1.66)', 'roundto(1.66)', 'ceil(1.66)');

-- --------------------------------------------------------

--
-- Table structure for table `test_scores`
--

CREATE TABLE `test_scores` (
  `college_id` varchar(100) NOT NULL,
  `test_id` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_scores`
--

INSERT INTO `test_scores` (`college_id`, `test_id`, `score`, `total_questions`, `percent`) VALUES
('MUT15CS061', 'Aptitude Test2018-03-18 16:06:28', 3, 3, 95.5),
('MUT15CS028', 'Aptitude Test2018-03-18 16:06:28', 3, 3, 100),
('MUT15CS028', 'Hour check2018-03-31 10:47:06', 1, 2, 50),
('MUT15CS052', 'Aptitude Test2018-03-18 16:06:28', 1, 3, 33.33),
('MUT15CS052', 'Hour check2018-03-31 10:47:06', 2, 2, 100),
('MUT15CS052', 'Technical2018-04-04 10:23:54', 2, 2, 100),
('MUT15CS052', 'Check2018-03-11 01:25:02', 0, 2, 0),
('MUT15CS052', 'Aptitude2018-03-16 00:32:13', 0, 1, 0),
('MUT15CS028', 'abc2018-04-11 23:47:53', 2, 2, 100),
('MUT15CS028', 'Technical2018-04-04 10:23:54', 0, 2, 0),
('MUT15CS028', 'C Programming2019-03-28 20:49:54', 3, 3, 100),
('MUT15CS028', 'Check2018-03-11 01:25:02', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `college_id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `branch` varchar(30) NOT NULL DEFAULT 'NA',
  `batch` varchar(20) NOT NULL DEFAULT 'NA',
  `username` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` binary(60) NOT NULL,
  `usertype` varchar(30) DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`college_id`, `name`, `profilepic`, `branch`, `batch`, `username`, `emailid`, `password`, `usertype`) VALUES
('MUT15CS000', 'Geo Sca', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS000', 'geoscaria1@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS001', 'A G Sreejith', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS001', 'sreejithag97@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS002', 'A V Aswin', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS002', 'aswinavofficial@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS003', 'Abhirami P H', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS003', 'abhirami4ph@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS004', 'Akhil Gokuldas', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS004', 'akhilgokuldas11@gmail.com ', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS005', 'Akhileswar V', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS005', 'aakkhhil79@gmail.com ', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS006', 'Akshay Babu', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS006', 'akshaybabu3575@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS007', 'Alan Lancy', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS007', 'alanlancy342@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS008', 'Albyn Babu', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS008', 'albynbabu97@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS009', 'Amal Anand', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS009', '2014amalanand@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS010', 'Amal Binoy', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS010', 'amalbinoy1997@gmail.com ', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS011', 'Anakha Sadanadan', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS011', 'anakhanairsadanandan@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS012', 'Ananthkrishna KS', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS012', 'ananthkrishna4u@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS013', 'Anjali s Kumar', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS013', 'prasannaskumar26@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS014', 'Anjana George', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS014', 'anjanamg97@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS015', 'Anu S Alunkal', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS015', 'anualunkal10@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS016', 'Aravind M Menon', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS016', 'menonaravind219@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS017', 'Archana Venugopal', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS017', 'archanavenugopal158@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS018', 'Basil reji', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS018', 'basilreji3@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS019', 'Basil K Y', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS019', 'basilky145@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS021', 'Dany Joy', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS021', 'danyjoy44@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS022', 'Eldho Shaju', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS022', 'eldho.malekudiyil@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS023', 'Elizabath Saba', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS023', 'eskm1996@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS024', 'Elizabeth Eldho', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS024', 'eldhoalice3@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS025', 'Elizabeth shiju', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS025', 'elizebethshiju61@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS026', 'Febi Justin', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS026', 'febijustin007@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS027', 'Gauri Nair', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS027', 'gaurynayyar@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS028', 'George Scaria', 'profile/MUT15CS028george2 .jpg', 'Computer Science & Engineering', '2015-2019', 'MUT15CS028', 'sdygeorgescaria@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS029', 'Gopika Chandrakumar', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS029', 'gopikamalavika@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS030', 'Gopika G Nair', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS030', 'gopikanath18@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS031', 'Greeshma m Benny', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS031', 'greeshmabenny@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS032', 'Irene Abraham', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS032', 'ireneabraham01@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS033', 'Jacob Sebastian', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS033', 'jacobseb2010@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS034', 'Jishnu Prakasan', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS034', 'jishnukprakash.98@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS036', 'Jose D Maliakkal', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS036', 'jsjose97@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS037', 'Jyothika Subramanian', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS037', 'jyothika.meleth@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS038', 'Linju Santhosh', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS038', 'linjusanthosh1997@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS039', 'Liya Yohannan', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS039', 'liyaay97@gmail.com ', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS040', 'Maneesha Soni', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS040', 'maneeshasoni97@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS041', 'Manu John', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS041', 'manuyohannan123@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS042', 'Maria Baby', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS042', 'mariababy997@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS043', 'Marvel Monson', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS043', 'marvelmonsi@gmail.com ', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS044', 'Mathews ignatius', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS044', 'mathewsignatious1@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS045', 'Merin Joseph', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS045', 'ponnythankuz@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS046', 'Nair devika', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS046', 'devikanair40@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS047', 'Poornasree R', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS047', 'poornamohankalleril@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS048', 'Regina Mathew', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS048', 'rege.mathew@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS049', 'Riya Binny', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS049', 'riyaearaly@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS050', 'Robin Joseph', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS050', 'jrobin5186@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS051', 'Rohit Ramgopl', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS051', 'mydirections2013@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS052', 'Roshin Jojo', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS052', 'roshinjojot@gmail.com ', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS053', 'Sara Jacob', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS053', 'jacobsara1997@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS054', 'Sherin George', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS054', 'sheringeorge436@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS055', 'Sreehari Rajeev', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS055', 'sreeharirajeev39@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS056', 'Sreelakshmi S K', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS056', 'sksreelakshmi97@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS057', 'V J HARAN', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS057', 'haranvj1997@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS058', 'Vimal P Viswan', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS058', 'vimal974ever@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS059', 'Vysakh Prasannan', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS059', 'vysakprasannan@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS060', 'Yadhu Krishnan', 'profile/user.png', 'Computer Science & Engineering', '2015-2019', 'MUT15CS060', 'pdyadhukrishnan@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'student'),
('MUT15CS061', 'Admin', 'profile/user.png', 'CSE', '2015-2019', 'MUT15CS061', 'admin@gmail.com', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'admin'),
('MUT15CS100', 'Jisha James', 'profile/user.png', 'Computer Science & Engineering', 'NA', 'MUT15CS100', 'jishajames@mgits.ac.in', 0x243279243130242f6f75557073523238764b414d634c56424742424c657a724c7057704f3439793749315644795767736e3933536856687146737475, 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `user_academics`
--

CREATE TABLE `user_academics` (
  `college_id` varchar(50) NOT NULL,
  `10th_school` varchar(100) NOT NULL DEFAULT 'NA',
  `10th_mark` varchar(40) NOT NULL DEFAULT 'NA',
  `12th_school` varchar(100) NOT NULL DEFAULT 'NA',
  `12th_mark` varchar(40) NOT NULL DEFAULT 'NA',
  `s1` varchar(4) NOT NULL DEFAULT 'NA',
  `s2` varchar(4) NOT NULL DEFAULT 'NA',
  `s3` varchar(4) NOT NULL DEFAULT 'NA',
  `s4` varchar(4) NOT NULL DEFAULT 'NA',
  `s5` varchar(4) NOT NULL DEFAULT 'NA',
  `s6` varchar(4) NOT NULL DEFAULT 'NA',
  `s7` varchar(4) NOT NULL DEFAULT 'NA',
  `s8` varchar(4) NOT NULL DEFAULT 'NA',
  `CGPA` varchar(4) NOT NULL DEFAULT 'NA',
  `backlogs` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_academics`
--

INSERT INTO `user_academics` (`college_id`, `10th_school`, `10th_mark`, `12th_school`, `12th_mark`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `CGPA`, `backlogs`) VALUES
('MUT15CS000', 'KV', '9.2', 'SH', '90', '8.54', '', '', '', '', '', '', '', '9.7', 0),
('MUT15CS001', 'NA', '91.2', 'NA', '81', '7.83', '7.96', '7.63', '8.07', '7.28', 'NA', 'NA', 'NA', '7.75', 0),
('MUT15CS002', 'NA', '87.4', 'NA', '91.6', '8.63', '8.98', '8.54', '8.28', '8.17', 'NA', 'NA', 'NA', '8.52', 0),
('MUT15CS003', 'NA', '87', 'NA', '89', '7.69', '8.7', '7.83', '8.07', '8.28', 'NA', 'NA', 'NA', '8.08', 0),
('MUT15CS004', 'NA', '81.7', 'NA', '73', '8.14', '8.47', '7.21', '7.33', '0', 'NA', 'NA', 'NA', '7.49', 1),
('MUT15CS005', 'NA', '95', 'NA', '91.6', '7.5', '7.5', '7.5', '7.5', '0', 'NA', 'NA', 'NA', '7.67', 2),
('MUT15CS006', 'NA', '96', 'NA', '94', '7.67', '7.76', '6.5', '0', '', 'NA', 'NA', 'NA', '0', 3),
('MUT15CS007', 'NA', '84', 'NA', '86', '6.75', '7.78', '7.27', '7.33', '6.74', 'NA', 'NA', 'NA', '7.17', 0),
('MUT15CS008', 'NA', '89.3', 'NA', '96', '8.46', '9.17', '7.81', '8.7', '7.93', 'NA', 'NA', 'NA', '8.41', 0),
('MUT15CS009', 'NA', '81.7', 'NA', '76', '0', '0', '0', '0', '', 'NA', 'NA', 'NA', '0', 9),
('MUT15CS010', 'NA', '79.8', 'NA', '81', '7.42', '7.35', '6.5', '6.76', '', 'NA', 'NA', 'NA', '0', 0),
('MUT15CS011', 'NA', '94', 'NA', '94', '7.48', '7.43', '7.23', '7.13', '7.63', 'NA', 'NA', 'NA', '7.38', 0),
('MUT15CS012', 'NA', '89', 'NA', '95', '7.9', '8.46', '7.17', '7.65', '7.15', 'NA', 'NA', 'NA', '7.66', 0),
('MUT15CS013', 'NA', '93.1', 'NA', '84', '7.38', '7.85', '7.13', '7.39', '7.67', 'NA', 'NA', 'NA', '7.48', 0),
('MUT15CS014', 'NA', '90', 'NA', '90', '7.59', '7.27', '0', '6.8', '', 'NA', 'NA', 'NA', '6.97', 0),
('MUT15CS015', 'NA', '100', 'NA', '84', '7.79', '7.78', '7.13', '7.48', '7.63', 'NA', 'NA', 'NA', '7.67', 0),
('MUT15CS016', 'NA', '90', 'NA', '89', '6.88', '7.74', '6.83', '6.96', '6.91', 'NA', 'NA', 'NA', '7.06', 0),
('MUT15CS017', 'NA', '100', 'NA', '89', '8.42', '8.46', '8.52', '8.15', '8.37', 'NA', 'NA', 'NA', '8.39', 0),
('MUT15CS018', 'NA', '96', 'NA', '84', '0', '0', '0', '0', '', 'NA', 'NA', 'NA', '0', 11),
('MUT15CS019', 'NA', '96', 'NA', '94', '7.92', '8.24', '7.27', '7.96', '7.57', 'NA', 'NA', 'NA', '7.79', 0),
('MUT15CS021', 'NA', '94', 'NA', '91.58', '7.04', '8.35', '7.13', '7.52', '7.02', 'NA', 'NA', 'NA', '7.41', 0),
('MUT15CS022', 'NA', '87', 'NA', '91', '7.04', '7.15', '7.5', '7.4', '', 'NA', 'NA', 'NA', '9.6', 0),
('MUT15CS023', 'NA', '93.1', 'NA', '80', '7.31', '7.85', '7.54', '7.74', '7.54', 'NA', 'NA', 'NA', '7.59', 0),
('MUT15CS024', 'NA', '97', 'NA', '94', '8.67', '8.8', '8.27', '8.33', '7.93', 'NA', 'NA', 'NA', '8.4', 0),
('MUT15CS025', 'NA', '91', 'NA', '93', '7.04', '7.91', '6.71', '7.28', '7.87', 'NA', 'NA', 'NA', '7.35', 0),
('MUT15CS026', 'NA', '85', 'NA', '84.5', '6.79', '6.83', '6.88', '6.83', '0', 'NA', 'NA', 'NA', '6.83', 1),
('MUT15CS027', 'NA', '96', 'NA', '74.12', '7.92', '8.04', '7.9', '8.09', '6.91', 'NA', 'NA', 'NA', '7.77', 0),
('MUT15CS028', 'NA', '100', 'NA', '87.6', '8.54', '6', '7.63', '7.85', '7.46', '7.91', 'NA', 'NA', '9.8', 0),
('MUT15CS029', 'NA', '100', 'NA', '98', '7.88', '8.74', '8.19', '8.54', '8.61', 'NA', 'NA', 'NA', '8.34', 0),
('MUT15CS030', 'NA', '100', 'NA', '90.42', '7.54', '7.87', '7.67', '7.57', '7.87', 'NA', 'NA', 'NA', '7.7', 0),
('MUT15CS031', 'NA', '96', 'NA', '90', '7.52', '7.59', '7.54', '7.33', '7.39', 'NA', 'NA', 'NA', '7.47', 0),
('MUT15CS032', 'NA', '100', 'NA', '81.6', '7.33', '8.09', '7.33', '7.43', '7.43', 'NA', 'NA', 'NA', '7.52', 0),
('MUT15CS033', 'NA', '88', 'NA', '89', '6.88', '7.13', '0', '6.78', '', 'NA', 'NA', 'NA', '6.16', 4),
('MUT15CS034', 'NA', '98', 'NA', '83', '7.13', '7.24', '6.58', '7.11', '4.74', 'NA', 'NA', 'NA', '6.57', 2),
('MUT15CS036', 'NA', '82', 'NA', '81', '6.79', '6.72', '0', '6.43', '', 'NA', 'NA', 'NA', '0', 0),
('MUT15CS037', 'NA', '86', 'NA', '72', '6.88', '6.67', '6.58', '7.22', '6.74', 'NA', 'NA', 'NA', '6.82', 0),
('MUT15CS038', 'NA', '86', 'NA', '76', '0', '0', '0', '0', '', 'NA', 'NA', 'NA', '0', 0),
('MUT15CS039', 'NA', '95', 'NA', '95.6', '8.88', '8.52', '8.75', '8.39', '8.52', 'NA', 'NA', 'NA', '8.62', 0),
('MUT15CS040', 'NA', '91', 'NA', '91.21', '7.79', '8.09', '8.17', '7.22', '7.96', 'NA', 'NA', 'NA', '7.84', 0),
('MUT15CS041', 'NA', '81.7', 'NA', '77', '8.12', '8.17', '7.95', '8.45', '7.67', 'NA', 'NA', 'NA', '8.07', 0),
('MUT15CS042', 'NA', '83.6', 'NA', '87', '7.17', '7.48', '7.94', '0', '0', 'NA', 'NA', 'NA', '0', 3),
('MUT15CS043', 'NA', '100', 'NA', '91', '7.4', '6.87', '7', '6.61', '', 'NA', 'NA', 'NA', '6.88', 0),
('MUT15CS044', 'NA', '100', 'NA', '94', '7.83', '8.17', '7.33', '7.28', '7.3', 'NA', 'NA', 'NA', '7.4', 0),
('MUT15CS045', 'NA', '100', 'NA', '91', '7.96', '8.43', '8.04', '8.43', '8.41', 'NA', 'NA', 'NA', '8.3', 0),
('MUT15CS046', 'NA', '86.18', 'NA', '80.61', '7.65', '7.96', '7.79', '7.39', '7.24', 'NA', 'NA', 'NA', '7.6', 0),
('MUT15CS047', 'NA', '100', 'NA', '91', '8.17', '8.41', '7.5', '7.9', '7.43', 'NA', 'NA', 'NA', '7.88', 0),
('MUT15CS048', 'NA', '100', 'NA', '94.33', '7.98', '7.7', '7.73', '7.59', '7.26', 'NA', 'NA', 'NA', '7.65', 0),
('MUT15CS049', 'NA', '100', 'NA', '95', '8.71', '8.83', '8.38', '8.2', '7.89', 'NA', 'NA', 'NA', '8.4', 0),
('MUT15CS050', 'NA', '91', 'NA', '87', '7.1', '7.22', '6.44', '6.43', '6.3', 'NA', 'NA', 'NA', '6.69', 0),
('MUT15CS051', 'NA', '91.2', 'NA', '86', '6.96', '6.78', '6.38', '6.65', '', 'NA', 'NA', 'NA', '0', 0),
('MUT15CS052', 'NA', '100', 'NA', '95.3', '8.06', '8.43', '7.63', '7.46', '6.7', 'NA', 'NA', 'NA', '7.66', 0),
('MUT15CS053', 'NA', '91.2', 'NA', '92.4', '8.85', '9.26', '8.9', '8.43', '7.85', 'NA', 'NA', 'NA', '8.66', 0),
('MUT15CS054', 'NA', '95', 'NA', '93', '8.38', '8.67', '8.38', '8.63', '8.59', 'NA', 'NA', 'NA', '8.53', 0),
('MUT15CS055', 'NA', '85', 'NA', '86', '6.85', '7.72', '0', '0', '', 'NA', 'NA', 'NA', '0', 0),
('MUT15CS056', 'NA', '83', 'NA', '85.5', '6.88', '7.83', '6.88', '0', '', 'NA', 'NA', 'NA', '0', 2),
('MUT15CS057', 'NA', '100', 'NA', '405', '7.65', '7.83', '6.23', '5.54', '2.17', 'NA', 'NA', 'NA', '0', 8),
('MUT15CS058', 'NA', '94', 'NA', '98', '8.13', '8.67', '8.25', '8.67', '8.3', 'NA', 'NA', 'NA', '8.4', 0),
('MUT15CS059', 'NA', '100', 'NA', '94', '7.71', '8.43', '7.67', '8.2', '7.89', 'NA', 'NA', 'NA', '7.98', 0),
('MUT15CS060', 'NA', '89', 'NA', '87.66', '7.15', '7.39', '0', '7.04', '', 'NA', 'NA', 'NA', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_internships`
--

CREATE TABLE `user_internships` (
  `college_id` varchar(30) NOT NULL,
  `company` varchar(255) NOT NULL,
  `internship_topic` varchar(255) NOT NULL,
  `internship_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_internships`
--

INSERT INTO `user_internships` (`college_id`, `company`, `internship_topic`, `internship_info`) VALUES
('MUT15CS028', 'UST Global', 'NexGenLead', 'Vaccination Reminder '),
('MUT15CS028', 'Sectorqube Technologies', 'Android', 'Attendance Management'),
('MUT15CS052', 'Pantech Solutions', 'Andriod Eclipse', 'Making of App ');

-- --------------------------------------------------------

--
-- Table structure for table `user_personal_details`
--

CREATE TABLE `user_personal_details` (
  `college_id` varchar(50) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `phone` varchar(30) NOT NULL DEFAULT 'NA',
  `emailid` varchar(30) NOT NULL DEFAULT 'NA',
  `address` varchar(1000) NOT NULL,
  `website` varchar(100) NOT NULL DEFAULT 'NA',
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `religion` varchar(30) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_personal_details`
--

INSERT INTO `user_personal_details` (`college_id`, `about`, `phone`, `emailid`, `address`, `website`, `father`, `mother`, `dob`, `gender`, `religion`) VALUES
('MUT15CS013', '', '', 'anjali@gmail.com', '', '', '', '', '', '', ''),
('MUT15CS052', 'im a padippi', '9447437843', 'roshinjojot@gmail.com', '', 'www.roshinzzz1.Sarahah.com', 'Jojo Varghese', 'Pushpa Jojo', '05/18/1997', 'Male', 'Christian'),
('MUT15CS000', '', '9400519196', 'geoscaria1@gmail.com', '', '', '', '', '06/06/1997', 'Male', ''),
('MUT15CS028', 'Wel\'come to MI\'TS', '+91 8943786926', 'sdygeorgescaria@gmail.com', 'Aykara House, Elavakattu Nagar, Thrikkakara P.O, Kochi, 682021', 'https://www.linkedin.com/in/george-scaria/', 'Saji George', 'Rocily Scaria', '06/06/1997', 'Male', 'Christian');

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE `user_projects` (
  `college_id` varchar(20) NOT NULL,
  `project_topic` varchar(255) NOT NULL,
  `project_info` varchar(255) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_projects`
--

INSERT INTO `user_projects` (`college_id`, `project_topic`, `project_info`) VALUES
('MUT15CS013', 'Placement Portal', 'Manage placement details'),
('MUT15CS052', 'Attendance Management System', 'Attendance management using python'),
('MUT15CS052', 'Matlab', '3D visualization using Matlab'),
('MUT15CS028', 'Attendance Management System', 'Attendance management app'),
('MUT15CS028', 'Placement Portal', 'An Android application used to manage attendance information of students and staffs.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `user_academics`
--
ALTER TABLE `user_academics`
  ADD PRIMARY KEY (`college_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
