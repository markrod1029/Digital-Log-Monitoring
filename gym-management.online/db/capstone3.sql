-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 05:36 AM
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
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(12, 'admin', '2022-10-21 09:35:47', 'Add Subject GenMath1'),
(13, 'admin', '2022-10-29 01:20:46', 'Add Subject Phil12'),
(14, 'admin', '2022-10-29 01:25:46', 'Add Subject PD12'),
(15, 'admin', '2022-10-29 01:27:06', 'Edit Subject PD12'),
(16, 'admin', '2022-10-29 01:27:21', 'Edit Subject PD12'),
(17, 'admin', '2022-10-30 11:03:37', 'Add Subject PR2');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`) VALUES
(93, 39, '25.30', 'A'),
(94, 39, '25.5', 'B'),
(95, 39, '25.00', 'C'),
(96, 39, '12.25', 'D'),
(97, 41, 'Mars', 'A'),
(98, 41, 'Jupiter', 'B'),
(99, 41, 'Earth', 'C'),
(100, 41, 'Saturn', 'D'),
(101, 43, 'Cognitive development', 'A'),
(102, 43, 'Psychosocial development', 'B'),
(103, 43, 'Physical development', 'C'),
(104, 43, 'Heredity', 'D'),
(105, 45, 'Personal', 'A'),
(106, 45, 'Personality', 'B'),
(107, 45, 'Development', 'C'),
(108, 45, 'Maturation', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(32, '', '2022-10-26 19:40:02', 'What is Gen Math?', 20, 187, ''),
(33, '', '2022-10-26 19:41:26', 'What is Sets?', 20, 187, 'Assignment 2'),
(34, '', '2022-10-30 16:26:58', 'Describe Personal Development.', 21, 188, 'Assignment 1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `adviser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `adviser`) VALUES
(26, 'STEM12-Del Mundo', 'Racquel Tamondong'),
(29, 'ABM12-Juliano', 'Princess Carla M. Uson'),
(30, 'HUMSS12-Bulosan', 'Joe-Gen R. Cabardo'),
(31, 'HUMSS12-Sionil-Jose', 'Joe Marie A. Bancolita'),
(32, 'HE12-Cocinar', 'Mark Angelo D. Erfelo'),
(33, 'He12-Cuisinier', 'Lenie L. Carino'),
(34, 'ICT12-Liskov', 'Romalyn F. Arceo'),
(35, 'ICT12-Neumann', 'Mille P. Solomon'),
(36, 'ABM11-Zara', 'Maricar M. Lambino'),
(37, 'HUMSS11-Shakespeare', 'Princess L. Pascual'),
(38, 'HUMSS11-Spencer', 'Yodel D. Ursua'),
(39, 'HUMSS11-Tennyson', 'Nestor R. Sinlao Jr.'),
(40, 'STEM11-Einstein', 'Charmine Marie A. Santos'),
(41, 'HE11-El Pan', 'Chariz Joy R. Patayan'),
(42, 'HE11-Fornaio', 'Harlene B. Matabang'),
(43, 'ICT11-Crisologo', 'Van Emer F. Dizon'),
(44, 'ICT11-Sempio', 'Jestoni U. Umagtan');

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `teacher_class_id`, `quiz_time`, `quiz_id`) VALUES
(18, 187, 300, 7),
(19, 187, 300, 0),
(20, 187, 300, 8),
(23, 188, 300, 9);

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class_subject_overview`
--

INSERT INTO `class_subject_overview` (`class_subject_overview_id`, `teacher_class_id`, `content`) VALUES
(2, 187, '<p>POGI NICO</p>\r\n'),
(3, 188, '<p><span style=\"font-size:16px\"><span style=\"color:rgb(32, 33, 36); font-family:arial,sans-serif\">Personal development Specializations and courses&nbsp;</span><strong>teach strategies and frameworks for personal growth, goal setting, and self improvement</strong><span style=\"color:rgb(32, 33, 36); font-family:arial,sans-serif\">. You&#39;ll learn to manage personal finances, deliver effective speeches, make ethical decisions, and think more creatively.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Quarterly Grades.</strong></span></p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:600px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\"><strong>Final Grade by&nbsp; &nbsp;</strong>&nbsp; =&nbsp;&nbsp;<span style=\"font-size:12px\"><u>1st-quarter grade + 2nd-quarter grade + 3rd-quarter grade +4th-quarter grade</u></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\"><strong>Learning Area&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>4&nbsp;</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>General Average.</strong></span></p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\"><span style=\"color:rgb(32, 33, 36); font-family:arial,sans-serif\"><strong>General</strong>&nbsp; &nbsp; &nbsp;=&nbsp; &nbsp;&nbsp;</span><u>&nbsp;Sum of Final Grade of All Learning Areas</u></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:16px\"><strong>Average</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total Number of Learning Areas in a Grade Level</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>DESCRIPTOR, GRADING SCALE, AND REMARKS</strong>.</span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">DESCRIPTOR</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">GRADING SCALE</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">REMARKS</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">Outstanding</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">90-100</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">PASSED</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">Very Satisfactory</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">85-89</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">PASSED</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">Satisfactory</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">80-84</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">PASSED</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">Fairly Satisfactory</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">75-79</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">PASSED</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">Did Not Meet Expectations</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">Below 75</span></td>\r\n			<td style=\"text-align:center\"><span style=\"font-size:16px\">FAILED</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `title`, `content`) VALUES
(1, 'Mission', '<pre style=\"text-align:center\">\r\n<span style=\"font-size:14px\"><span style=\"font-family:verdana,geneva,sans-serif\"><strong>Mission</strong></span></span></pre>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-size:14px\"><span style=\"font-family:verdana,geneva,sans-serif\">To protect and promote the right of every Filipino to quality.equitable. culture-based and complete basic education where: Students learn in a child-friendly, gender sensitive. safe and motivating environment Teachers facilitate learning and constantly nurture every learner Administrators and staff as stewards of the institution ensure and enabling and supportive environment for effective learning to happen Family, community and other stakeholders are actively engaged and share responsibility for developing life-long learners.</span></span><br />\r\n&nbsp;</p>\r\n'),
(2, 'Vision', '<pre style=\"text-align: center;\">\r\n<span style=\"font-family:verdana,geneva,sans-serif\"><span style=\"font-size:14px\"><strong>Vision</strong></span></span></pre>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-family:verdana,geneva,sans-serif\"><span style=\"font-size:14px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We dream of Filipinos who passionately love their country and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation. As a learner-centered public institution the Department of Education continuously improves itself to better serves its stakeholders.</span></span></p>\r\n'),
(3, 'History', '<pre style=\"text-align: justify;\">\r\n<span style=\"font-family:verdana,geneva,sans-serif\"><span style=\"font-size:large\">HISTORY &nbsp;</span> \r\n\r\nBack in 2010, when late Mayor Balolong still in position, with the heads of school they&#39;ve talked and planned about having a public high school because it is needed in Poblacion as it was the center of Urbiztondo. There are only two private schools back then in town so that&#39;s why the students&nbsp; attended school in other barangay&#39;s like in Dalanguiring and Real. Urbiztondo Integrated School was built to fill in and fulfill the lacking needs of public school in Poblacion. It&#39;s started with 205 enrollees for Grade 7 and 8 with 2 sections only. Since then, the school had an extreme changes that&#39;s why every year the enrollees are increasing. The school also have Senior High School which is the GAS, TVL (HE and ICT). Currently there are three strands added the HUMSS, ABM and STEM.</span></pre>\r\n'),
(4, 'Footer', '<p style=\"text-align:center\">UIS Learning Managenment System</p>\r\n\r\n<p style=\"text-align:center\">All Rights Reserved &reg;2022</p>\r\n'),
(5, 'Upcoming Events', '<pre>\r\nUP COMING EVENTS</pre>\r\n\r\n<p><strong>&gt;</strong> EXAM</p>\r\n\r\n<p><strong>&gt;</strong> INTERSCHOOL&nbsp;MEET</p>\r\n\r\n<p><strong>&gt;</strong> DEFENSE</p>\r\n\r\n<p><strong>&gt;</strong> ENROLLMENT</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(6, 'Title', '<p><span style=\"font-family:trebuchet ms,geneva\">UIS Learning Management System</span></p>\r\n'),
(10, 'Calendar', '<pre style=\"text-align:center\">\r\n<span style=\"font-size:medium\"><strong>&nbsp;CALENDAR OF EVENT</strong></span></pre>\r\n\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"line-height:1.6em; margin-left:auto; margin-right:auto\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>First Semester &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>June 10, 2022&nbsp;to October 11, 2022&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Semestral Break</p>\r\n			</td>\r\n			<td>\r\n			<p>Oct. 12, 2022&nbsp;to November 3, 2022</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Second Semester</p>\r\n			</td>\r\n			<td>\r\n			<p>Nov. 5, 2022&nbsp;to March 27, 2023</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Summer Break</p>\r\n			</td>\r\n			<td>\r\n			<p>March 27, 2023&nbsp;to April 8, 2023</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Summer</p>\r\n			</td>\r\n			<td>\r\n			<p>April 8 , 2023&nbsp;to May 24, 2023</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\" style=\"line-height:1.6em; margin-left:auto; margin-right:auto\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<p><strong>June 5, 2022&nbsp;to October 11, 2022&nbsp;&ndash; First Semester AY 2022-2023</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 4, 2013 &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Orientation with the Parents</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 5</p>\r\n			</td>\r\n			<td>\r\n			<p>First Day of Service</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 5</p>\r\n			</td>\r\n			<td>\r\n			<p>School Personnel General Assembly</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 6,7</p>\r\n			</td>\r\n			<td>\r\n			<p>In-Service Training (Departmental)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 10</p>\r\n			</td>\r\n			<td>\r\n			<p>First Day of Classes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 14</p>\r\n			</td>\r\n			<td>\r\n			<p>Orientation with Students by College/Campus/Department</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 19,20,21</p>\r\n			</td>\r\n			<td>\r\n			<p>Branch/Campus Visit for Administrative / Academic/Accreditation/ Concerns</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">\r\n			<p>June</p>\r\n			</td>\r\n			<td>\r\n			<p>Club Organizations (By Discipline/Programs)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Student Affiliation/Induction Programs</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>July</p>\r\n			</td>\r\n			<td>\r\n			<p>Nutrition Month (Sponsor: Laboratory School)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>July 11, 12</p>\r\n			</td>\r\n			<td>\r\n			<p>Long Tests</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August&nbsp; 8, 9</p>\r\n			</td>\r\n			<td>\r\n			<p>Midterm Examinations</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August 19</p>\r\n			</td>\r\n			<td>\r\n			<p>ArawngLahi</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August 23</p>\r\n			</td>\r\n			<td>\r\n			<p>Submission of Grade Sheets for Midterm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August</p>\r\n			</td>\r\n			<td>\r\n			<p>Recognition Program (Dean&rsquo;s List)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August 26</p>\r\n			</td>\r\n			<td>\r\n			<p>National Heroes Day (Regular Holiday)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>August 28, 29, 30</p>\r\n			</td>\r\n			<td>\r\n			<p>Sports and Cultural Meet</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>September 19,20</p>\r\n			</td>\r\n			<td>\r\n			<p>Long Tests</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>October 5</p>\r\n			</td>\r\n			<td>\r\n			<p>Teachers&rsquo; Day / World Teachers&rsquo; Day</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>October 10, 11</p>\r\n			</td>\r\n			<td>\r\n			<p>Final Examination</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>October 12</p>\r\n			</td>\r\n			<td>\r\n			<p>Semestral Break</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\" style=\"margin-left:auto; margin-right:auto\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<p><strong>Nov. 4, 2022&nbsp;to March 27, 2023&nbsp;&ndash; Second Semester AY 2022-2023</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>November 4 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Start of Classes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>November 19, 20, 21, 22</p>\r\n			</td>\r\n			<td>\r\n			<p>Sports and Cultural Fest/College Week</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 5, 6</p>\r\n			</td>\r\n			<td>\r\n			<p>Long Tests</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 19,20</p>\r\n			</td>\r\n			<td>\r\n			<p>Thanksgiving Celebrations</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 21</p>\r\n			</td>\r\n			<td>\r\n			<p>Start of Christmas Vacation</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 25</p>\r\n			</td>\r\n			<td>\r\n			<p>Christmas Day (Regular Holiday)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>December 30</p>\r\n			</td>\r\n			<td>\r\n			<p>Rizal Day (Regular Holiday)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>January 6, 2014</p>\r\n			</td>\r\n			<td>\r\n			<p>Classes Resume</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>January 9, 10</p>\r\n			</td>\r\n			<td>\r\n			<p>Midterm Examinations</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>January 29</p>\r\n			</td>\r\n			<td>\r\n			<p>Submission of Grades Sheets for Midterm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>February 13, 14</p>\r\n			</td>\r\n			<td>\r\n			<p>Long Tests</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>March 6, 7</p>\r\n			</td>\r\n			<td>\r\n			<p>Final Examinations (Graduating)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>March 13, 14</p>\r\n			</td>\r\n			<td>\r\n			<p>Final Examinations (Non-Graduating)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>March 17, 18, 19, 20, 21</p>\r\n			</td>\r\n			<td>\r\n			<p>Recognition / Graduation Rites</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>March 27</p>\r\n			</td>\r\n			<td>\r\n			<p>Last Day of Service for Faculty</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>June 5, 2023</p>\r\n			</td>\r\n			<td>\r\n			<p>First Day of Service for SY 2022-2023</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(11, 'Directories', '<div class=\"jsn-article-content\" style=\"text-align: left;\">\r\n<pre>\r\n<span style=\"font-size:medium\"><em><strong>DIRECTORIES</strong></em></span></pre>\r\n\r\n<ul>\r\n	<li>Lab School - 712-0848</li>\r\n	<li>Accounting - 495-5560</li>\r\n	<li>Presidents Office - 495-4064(telefax)</li>\r\n	<li>VPA/PME - 495-1635</li>\r\n	<li>Registrar Office - 495-4657(telefax)</li>\r\n	<li>Cashier - 712-7272</li>\r\n	<li>CIT - 712-0670</li>\r\n	<li>SAS/COE - 495-6017</li>\r\n	<li>BAC - 712-8404(telefax)</li>\r\n	<li>Records - 495-3470</li>\r\n	<li>Supply - 495-3767</li>\r\n	<li>Internet Lab - 712-6144/712-6459</li>\r\n	<li>COA - 495-5748</li>\r\n	<li>Guard House - 476-1600</li>\r\n	<li>HRM - 495-4996</li>\r\n	<li>Extension - 457-2819</li>\r\n	<li>Canteen - 495-5396</li>\r\n	<li>Research - 712-8464</li>\r\n	<li>Library - 495-5143</li>\r\n	<li>OSA - 495-1152</li>\r\n</ul>\r\n</div>\r\n'),
(15, 'Description', '<h2 style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:verdana,geneva,sans-serif\"><strong><tt>Description</tt></strong></span></span></h2>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>* School ID :</strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\"> 1500368 </span><strong>* School Name : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">URBIZTONDO INTEGRATED SCHOOL </span><strong>* School Name w/ Add : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">URBIZTONDO INTEGRATED SCHOOL, Urbiztondo, Pangasinan </span><strong>* Short Name : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">UIS </span><strong>* Previous Name : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">Urbiztondo Central School </span><strong>* Address : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">Rizal Street, Poblacion </span><strong>* Municipality : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">Urbiztondo </span><strong>* Region :</strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\"> Region I </span><strong>* Province :</strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\"> Pangasinan </span><strong>* Division : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">Pangasinan I, Lingayen </span><strong>* Legistative District : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">2nd District </span><strong>* Curricular Class : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">Junior High School with Senior High School </span><strong>* Date of Operation : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">Tuesday, January 01, 2008 </span><strong>* Sub-Classification : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">DepED Managed </span><strong>* School Type : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">School with no Annexes </span><strong>* Class Organization : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">Monograde </span><strong>* Telephone : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">6330066 </span><strong>* Fax Number : </strong><span style=\"color:rgb(90, 91, 92); font-family:open sans,sans-serif\">6330066</span></span></h2>\r\n'),
(16, 'policy', ''),
(17, 'values', ''),
(18, 'School Commitee', '<p style=\"text-align: center;\"><strong>DepeD OFFICIALS</strong></p>\r\n\r\n<p style=\"text-align: center;\"><strong>LEONOR M. BRIONES -&nbsp;</strong>Deped SECRETARY</p>\r\n\r\n<p style=\"text-align: center;\"><strong>TOLENTINO G. AQUINO -</strong> REGIONAL DIRECTOR</p>\r\n\r\n<p style=\"text-align: center;\"><strong>ELY S. UBALDO, CESO VI -</strong> ASST. REGIONAL DIRECTOR, SCHOOLS DIVISION SUPERINTENDENT</p>\r\n\r\n<p style=\"text-align: center;\"><strong>DIOSDADO I. CAYABYAB, CESO VI - </strong>ASST. SCHOOLS DIVISION SUPERINTENDENT</p>\r\n\r\n<p style=\"text-align: center;\"><strong>MA. CRISELDA G. OCANG, CESE -&nbsp;</strong>ASST. SCHOOLS DIVISION SUPERINTENDENT</p>\r\n\r\n<p style=\"text-align: center;\"><strong>LONGINO D. FERRER, edD - </strong>PUBLIC SCHOOLS DISTRICT SUPERVISOR</p>\r\n\r\n<p style=\"text-align: center;\"><strong>SAJID S. ELIANG, edD - </strong>PRINCIPAL IV</p>\r\n\r\n<p style=\"text-align: center;\"><strong>ROWENA O. ALMENDRALA, edD - </strong>SHS. ASST. PRINCIPAL II</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `dean`) VALUES
(11, 'STEM', 'Racquel M. Tamondong'),
(13, 'ICT', 'Jestoni Umagtam'),
(14, 'HE', 'Mark Angelo D. Erfelo'),
(15, 'ABM', 'Maricar M. Lambino'),
(16, 'HUMSS', 'Joe-Gen R. Cabardo');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `teacher_class_id`, `date_start`, `date_end`) VALUES
(19, 'Mr & Miss UIS', 0, '10/26/2022', '11/02/2022'),
(20, 'EXAM DAY', 188, '11/10/2022', '11/11/2022');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(142, 'admin/uploads/3214_File_4182a9dd330c6442c4a1fbc78274d838.png', '2022-12-07 00:07:55', 'sample', 0, 188, 'files1', 'RenelAbelado'),
(143, 'admin/uploads/8527_File_minimalism-programming-html-wallpaper-preview.jpg', '2022-12-08 18:50:10', 'reviewer', 21, 188, 'sample', 'RacquelTamondong');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(30, 220, 'hellow guys', '2022-10-26 19:19:05', 20, 'Renel Abelado', 'Nico John Quitalig', ''),
(31, 20, 'hai po sir why po?', '2022-10-26 19:19:56', 220, 'Nico John Quitalig', 'Renel Abelado', ''),
(32, 220, 'Bagsak ka nong hehe\r\n', '2022-10-26 19:21:24', 20, 'Renel Abelado', 'Nico John Quitalig', ''),
(34, 20, 'Good pm Sir', '2022-10-30 22:59:54', 21, 'Nico John Quitalig', 'Racquel Tamondong', ''),
(35, 227, 'Goodpm nak', '2022-10-30 23:00:37', 21, 'Esha Mae Ningal', 'Racquel Tamondong', 'read'),
(36, 220, 'Hi classmate', '2022-10-30 23:48:19', 227, 'Renel Abelado', 'Esha Mae Ningal', '');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(15, 220, 'hellow guys', '2022-10-26 19:19:05', 20, 'Renel Abelado', 'Nico John Quitalig'),
(16, 20, 'hai po sir why po?', '2022-10-26 19:19:56', 220, 'Nico John Quitalig', 'Renel Abelado'),
(17, 220, 'Bagsak ka nong hehe\r\n', '2022-10-26 19:21:24', 20, 'Renel Abelado', 'Nico John Quitalig'),
(18, 21, 'Good Evening Maam ', '2022-10-30 22:58:13', 227, 'Racquel Tamondong', 'Esha Mae Ningal'),
(19, 20, 'Good pm Sir', '2022-10-30 22:59:54', 21, 'Nico John Quitalig', 'Racquel Tamondong'),
(20, 227, 'Goodpm nak', '2022-10-30 23:00:37', 21, 'Esha Mae Ningal', 'Racquel Tamondong'),
(21, 220, 'Hi classmate', '2022-10-30 23:48:20', 227, 'Renel Abelado', 'Esha Mae Ningal');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(24, 187, 'Add Practice Quiz file', '2022-10-21 12:30:19', 'student_quiz_list.php'),
(25, 187, 'Add Practice Quiz file', '2022-10-26 19:23:32', 'student_quiz_list.php'),
(26, 187, 'Add Practice Quiz file', '2022-10-26 19:27:54', 'student_quiz_list.php'),
(27, 187, '', '2022-10-26 19:40:03', 'assignment_student.php'),
(28, 187, 'Add Assignment file name <b>Assignment 2</b>', '2022-10-26 19:41:26', 'assignment_student.php'),
(29, 188, 'Add Assignment file name <b>Assignment 1</b>', '2022-10-30 16:26:59', 'assignment_student.php'),
(30, 188, 'Add Annoucements', '2022-10-30 16:29:38', 'announcements_student.php'),
(31, 188, 'Add Practice Quiz file', '2022-10-30 17:08:09', 'student_quiz_list.php'),
(32, 188, 'Add Practice Quiz file', '2022-10-30 22:47:42', 'student_quiz_list.php'),
(33, 188, 'Add Practice Quiz file', '2022-10-30 22:51:55', 'student_quiz_list.php'),
(34, 188, 'Add Downloadable Materials file name <b>sample</b>', '2022-12-08 18:50:10', 'downloadable_student.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification_read`
--

INSERT INTO `notification_read` (`notification_read_id`, `student_id`, `student_read`, `notification_id`) VALUES
(6, 227, 'yes', 33),
(7, 227, 'yes', 32),
(8, 227, 'yes', 31),
(9, 227, 'yes', 30),
(10, 227, 'yes', 29);

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification_read_teacher`
--

INSERT INTO `notification_read_teacher` (`notification_read_teacher_id`, `teacher_id`, `student_read`, `notification_id`) VALUES
(9, 21, 'yes', 19),
(10, 21, 'yes', 21),
(11, 21, 'yes', 20);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice'),
(2, 'True or False'),
(3, 'Identification');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`) VALUES
(3, 'Sample Test', 'Test', '2013-12-03 23:01:56', 12),
(4, 'Chapter 1', 'topics', '2013-12-13 01:51:02', 14),
(5, 'test3', '123', '2014-01-16 04:12:07', 12),
(6, 'Sample Quiz', 'Sample 101', '2020-12-21 10:04:11', 9),
(7, 'Quiz 1', 'GENMATH1', '2022-10-21 09:46:30', 20),
(9, 'Quiz 1', 'UNIT 1', '2022-10-30 16:33:37', 21);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(100) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(42, 9, '<p>Cognitive development covers our capacity to learn, speak, to understand.</p>\r\n', 2, 0, '2022-10-30 16:35:09', 'True'),
(43, 9, '<p>Covers the growth of the body; physical health</p>\r\n', 1, 0, '2022-10-30 16:37:57', 'C'),
(44, 9, '<p>Personal is a set of emotional qualities, ways of behaving that makes a person different from oth', 2, 0, '2022-10-30 16:39:28', 'False'),
(45, 9, '<p>Belonging/relating to a particular person</p>\r\n', 1, 0, '2022-10-30 16:41:12', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(1, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `class_id` int(11) NOT NULL,
  `learning_modality` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `middlename`, `lastname`, `sex`, `class_id`, `learning_modality`, `username`, `password`, `location`, `status`) VALUES
(220, 'Renel', 'Torcelino', 'Abelado', 'M', 26, 'Face to Face', '1234', 'renel', 'uploads/renel.jpg', 'Registered'),
(225, 'Christopher', 'Patayan', 'Calugay', 'M', 26, 'Face to Face', '101691100003', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(226, 'Kent Lauro', 'Mercado', 'Datuin', 'M', 26, 'Face to Face', '101693100054', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(227, 'Esha Mae', 'Macalanda', 'Ningal', 'F', 26, 'Face to Face', '101693120357', 'esha', 'uploads/esha.jpg', 'Registered'),
(228, 'Natasha Nicole', 'Luces', 'Almazan', 'F', 26, 'Face to Face', '101693100004', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(229, 'Kristelle Ann', 'Cayabyab', 'Bandong', 'F', 26, 'Face to Face', '102258100008', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(230, 'Danica Mae', 'Sibayan', 'Bautista', 'F', 26, 'Face to Face', '101682100011', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(231, 'Rochelle Anne', 'Malong', 'Catap', 'F', 26, 'Face to Face', '101693100042', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(232, 'Lianne Kierah', 'De Guzman', 'Corpuz', 'F', 26, 'Face to Face', '101585140066', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(233, 'James Vincent', 'Macatantan', 'Ferreras', 'M', 26, 'Face to Face', '101673100016', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(234, 'Jeffrey', 'Posadas', 'Gutierrez', 'M', 26, 'Face to Face', '101686100039', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`student_assignment_id`, `assignment_id`, `floc`, `assignment_fdatein`, `fdesc`, `fname`, `student_id`, `grade`) VALUES
(2, 34, 'admin/uploads/3235_File_for laravel project.txt', '2022-10-30 16:50:31', 'assignment1', 'Assignment 1', 227, '10'),
(3, 34, 'admin/uploads/2676_File_minimalism-programming-html-wallpaper-preview.jpg', '2022-12-07 00:07:05', 'renel', 'assignment1', 220, '10');

-- --------------------------------------------------------

--
-- Table structure for table `student_backpack`
--

CREATE TABLE `student_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_backpack`
--

INSERT INTO `student_backpack` (`file_id`, `floc`, `fdatein`, `fdesc`, `student_id`, `fname`) VALUES
(5, 'admin/uploads/3214_File_4182a9dd330c6442c4a1fbc78274d838.png', '2022-12-07 00:11:44', 'sample', 220, 'files1');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_class_quiz`
--

INSERT INTO `student_class_quiz` (`student_class_quiz_id`, `class_quiz_id`, `student_id`, `student_quiz_time`, `grade`) VALUES
(4, 18, 220, '3600', '1 out of 2'),
(5, 20, 220, '3600', '0 out of 0'),
(6, 21, 227, '3600', '0 out of 4'),
(7, 23, 227, '3600', '0 out of 4'),
(8, 19, 220, '3600', '0 out of 0');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(43, 'GenMath1', 'General Mathematics', '', '<p>GENERAL MATHEMATICS</p>\r\n', 4, '', '1st'),
(44, 'Phil12', 'Introduction to Philosophy', '', '<p><span style=\"color:rgb(32, 33, 36); font-family:arial,sans-serif; font-size:16px\">An introductory philosophy course that concentrates on concepts and issues, such as the nature of value, duty, right and wrong, the good life, human rights, social justice, and applications to selected problems of personal and social behavior.</span></p>\r\n', 4, '', '1st'),
(45, 'PD12', 'Personal Development', '', '<p><span style=\"font-size:18px\"><span style=\"color:rgb(32, 33, 36); font-family:arial,sans-serif\">Personal development Specializations and courses&nbsp;</span><strong>teach strategies and frameworks for personal growth, goal setting, and self improvement</strong><span style=\"color:rgb(32, 33, 36); font-family:arial,sans-serif\">. You&#39;ll learn to manage personal finances, deliver effective speeches, make ethical decisions, and think more creatively.</span></span></p>\r\n', 0, '', '1st'),
(46, 'PR2', 'Practical Research 2', '', '<p><span style=\"font-size:18px\"><span style=\"color:rgb(32, 33, 36); font-family:arial,sans-serif\">Practical Research 2&nbsp;</span><strong>aims to provide students with knowledge regarding the key concepts and different strategies and methods in performing quantitative research</strong></span><span style=\"color:rgb(32, 33, 36); font-family:arial,sans-serif; font-size:16px\"><span style=\"font-size:18px\">. It also explains the stages that students should go through to successfully conduct quantitative studies</span>.</span></p>\r\n', 0, '', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `department_id`, `location`, `about`, `teacher_status`, `teacher_stat`) VALUES
(20, '19sc0776', 'nico', 'Nico John', 'Quitalig', 11, 'uploads/nico.png', '', 'Registered', ''),
(21, 'racquelt', 'racquel', 'Racquel', 'Tamondong', 11, 'uploads/maamraquel.jpg', '', 'Registered', ''),
(22, '', '', 'Maricar', 'Lambino', 15, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(23, '', '', 'Princess', 'Pascual', 16, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(24, '', '', 'Yodel', 'Ursua', 16, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(25, '', '', 'Nestor Jr.', 'Sinlao', 16, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(26, '', '', 'Charmine Marie', 'Santos', 11, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(27, '', '', 'Charize Joy', 'Patayan', 14, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(28, '', '', 'Harlene', 'Matabang', 14, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(29, '', '', 'Van Emer', 'Dizon', 13, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(30, '', '', 'Jestoni', 'Umagtam', 11, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(31, '', '', 'Princess Carla', 'Uson', 15, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(32, '', '', 'Joe-Gen', 'Cabardo', 16, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(33, '', '', 'Joe-Marie', 'Bancolita', 16, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(34, '', '', 'Mark Angelo', 'Erfelo', 14, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(35, '', '', 'Lenie', 'Carino', 14, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(36, '', '', 'Romalyn', 'Arceo', 13, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(37, '', '', 'Mille', 'Salomon', 13, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_backpack`
--

CREATE TABLE `teacher_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(187, 20, 26, 43, 'admin/uploads/thumbnails.jpg', '2022-2023'),
(188, 21, 26, 45, 'admin/uploads/thumbnails.jpg', '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_announcements`
--

CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_class_announcements`
--

INSERT INTO `teacher_class_announcements` (`teacher_class_announcements_id`, `content`, `teacher_id`, `teacher_class_id`, `date`) VALUES
(40, '<p>QUARTER EXAM SCHEDULE</p>\r\n\r\n<p>NOVEMBER 10, 2022 - THURSDAY</p>\r\n\r\n<p>2-3 PM - PERSONAL DEVELOPMENT</p>\r\n\r\n<p>NOVEMBER 11, 2022 - FRIDAY</p>\r\n\r\n<p>1-2 PM - PERSONAL DEVELOPMENT</p>\r\n', '21', 188, '2022-10-30 16:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(383, 187, 220, 20),
(384, 188, 225, 21),
(385, 188, 226, 21),
(386, 188, 227, 21),
(387, 188, 228, 21),
(388, 188, 229, 21),
(389, 188, 230, 21),
(390, 188, 231, 21),
(391, 188, 232, 21),
(392, 188, 233, 21),
(393, 188, 234, 21),
(394, 188, 220, 21);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_notification`
--

INSERT INTO `teacher_notification` (`teacher_notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `student_id`, `assignment_id`) VALUES
(19, 188, 'Submit Assignment file name <b>Assignment 1</b>', '2022-10-30 16:50:31', 'view_submit_assignment.php', 227, 34),
(20, 188, 'Submit Assignment file name <b>assignment1</b>', '2022-12-07 00:07:05', 'view_submit_assignment.php', 220, 34),
(21, 188, 'Add Downloadable Materials file name <b>files1</b>', '2022-12-07 00:07:55', 'downloadable.php', 220, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_shared`
--

INSERT INTO `teacher_shared` (`teacher_shared_id`, `teacher_id`, `shared_teacher_id`, `floc`, `fdatein`, `fdesc`, `fname`) VALUES
(2, 21, 20, 'admin/uploads/8527_File_minimalism-programming-html-wallpaper-preview.jpg', '2022-12-08 18:51:13', 'reviewer', 'sample'),
(3, 21, 20, 'admin/uploads/3214_File_4182a9dd330c6442c4a1fbc78274d838.png', '2022-12-08 18:51:13', 'sample', 'files1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'ome', 'Jerome', 'Peduca'),
(15, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(87, 'admin', '2022-10-21 12:32:03', '2022-12-06 23:33:15', 15),
(88, 'admin', '2022-10-21 12:32:42', '2022-12-06 23:33:15', 15),
(89, 'admin', '2022-10-21 15:39:00', '2022-12-06 23:33:15', 15),
(90, 'admin', '2022-10-26 00:51:52', '2022-12-06 23:33:15', 15),
(91, 'admin', '2022-10-26 00:51:57', '2022-12-06 23:33:15', 15),
(92, 'admin', '2022-10-26 19:02:41', '2022-12-06 23:33:15', 15),
(93, 'admin', '2022-10-26 19:07:11', '2022-12-06 23:33:15', 15),
(94, 'admin', '2022-10-26 21:31:08', '2022-12-06 23:33:15', 15),
(95, 'admin', '2022-10-28 15:36:33', '2022-12-06 23:33:15', 15),
(96, 'admin', '2022-10-28 15:36:34', '2022-12-06 23:33:15', 15),
(97, 'admin', '2022-10-28 15:36:35', '2022-12-06 23:33:15', 15),
(98, 'admin', '2022-10-30 08:53:52', '2022-12-06 23:33:15', 15),
(99, 'admin', '2022-10-30 16:42:32', '2022-12-06 23:33:15', 15),
(100, 'admin', '2022-10-30 23:54:53', '2022-12-06 23:33:15', 15),
(101, 'admin', '2022-10-31 01:46:29', '2022-12-06 23:33:15', 15),
(102, 'admin', '2022-12-03 15:33:21', '2022-12-06 23:33:15', 15),
(103, 'admin', '2022-12-06 23:31:05', '2022-12-06 23:33:15', 15),
(104, 'admin', '2022-12-06 23:33:00', '2022-12-06 23:33:15', 15),
(105, 'admin', '2022-12-13 17:24:53', '', 15),
(106, 'admin', '2022-12-16 19:29:34', '', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_read`
--
ALTER TABLE `notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indexes for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indexes for table `student_backpack`
--
ALTER TABLE `student_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  ADD PRIMARY KEY (`teacher_class_announcements_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indexes for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notification_read`
--
ALTER TABLE `notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_backpack`
--
ALTER TABLE `student_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  MODIFY `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
