-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2013 at 02:16 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- 
Create `school`
Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone` text NOT NULL,
  `district` text NOT NULL,
  `city` text NOT NULL,
  `ward_no` int(11) NOT NULL,
  `tole` text NOT NULL,
  `house_no` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `zone`, `district`, `city`, `ward_no`, `tole`, `house_no`) VALUES
(1, 'Bagmati', 'lalitpur', 'patan', 7, 'Tyagal', '58'),
(2, 'Bagmati', 'Lalitpur', 'Patan', 6, 'Saugal', '57'),
(3, 'Bagmati', 'Kathmandu', 'Koteshwor', 19, 'Koteswor', '78'),
(4, 'Bagmati', 'Lalitpur', 'Patan', 7, 'Saugal', '68'),
(5, 'Bagmati', 'Lalitpur', 'Patan', 7, 'Tyagal', '45'),
(6, 'Bagmati', 'Kathmandu', 'Kathmandu', 14, 'Kupondole', '34'),
(7, 'Bagmati', 'Kathmandu', 'Ason', 17, 'Ason', '45'),
(8, 'Bagmati', 'Bhaktapur', 'Thimi', 3, 'Thimi', '34'),
(9, 'Bagmati', 'Kathmandu', 'Kathmandu', 17, 'Ason', '34'),
(10, 'Bagmati', 'Kathmandu', 'Kathmandu', 17, 'Nayabazar', '56'),
(11, 'Bagmati', 'Kathmandu', 'kathmandu', 9, 'Ason', '90');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `mname` text,
  `lname` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` text,
  `email` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `mname`, `lname`, `gender`, `status`, `email`) VALUES
(1, 'Rabindra', NULL, 'Poudel', 'Male', 'Super Active', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `assigned_date` date NOT NULL,
  `deadline` date NOT NULL,
  `question` text,
  `file` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

CREATE TABLE IF NOT EXISTS `assignment_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assignment_submission`
--


-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `teacher_id`) VALUES
(1, 'Nursery', 0),
(2, 'LKG', NULL),
(3, 'UKG', 0),
(4, 'One', NULL),
(5, 'Two', NULL),
(6, 'Three', 1),
(7, 'Four', NULL),
(8, 'Five', NULL),
(9, 'Six', NULL),
(10, 'Seven', NULL),
(11, 'Eight', 0),
(12, 'Nine', NULL),
(13, 'Ten', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permanent_address_id` int(11) NOT NULL,
  `temporary_address_id` int(11) DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `permanent_address_id`, `temporary_address_id`, `home_phone`) VALUES
(1, 1, NULL, 'o'),
(2, 2, NULL, ''),
(3, 3, 4, '4357556'),
(4, 5, NULL, '7980'),
(5, 6, NULL, 'op'),
(6, 7, NULL, 'op'),
(7, 8, NULL, '2345934'),
(8, 9, 10, 'jkl'),
(9, 11, 12, 'jlk'),
(10, 13, NULL, '4362755'),
(11, 14, NULL, '20943'),
(12, 1, NULL, '01-4355422'),
(13, 2, NULL, '01-443932'),
(14, 3, NULL, '01-4566366'),
(15, 4, NULL, '01-445676'),
(16, 5, NULL, '01-465787'),
(17, 6, NULL, ''),
(18, 7, NULL, '01-4656939'),
(19, 8, NULL, '01-4958694'),
(20, 9, NULL, '01-456738'),
(21, 10, NULL, '01-456789'),
(22, 11, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE IF NOT EXISTS `fee_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(10) NOT NULL,
  `monthly_fee` int(11) NOT NULL,
  `stationary` int(11) NOT NULL,
  `computer` int(11) DEFAULT NULL,
  `exam_fee` int(11) NOT NULL,
  `admission_fee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`id`, `class`, `monthly_fee`, `stationary`, `computer`, `exam_fee`, `admission_fee`) VALUES
(1, '10', 2000, 500, 250, 400, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `user_type` text NOT NULL,
  `last_login` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `username`, `password`, `user_type`, `last_login`) VALUES
(23, 3, 'pravesh_3', '900150983cd24fb0d6963f7d28e17f72', 'teacher', NULL),
(22, 2, 'aastha_2', '900150983cd24fb0d6963f7d28e17f72', 'teacher', NULL),
(4, 1, 'admin', '900150983cd24fb0d6963f7d28e17f72', 'admin', NULL),
(5, 3, 'student', '900150983cd24fb0d6963f7d28e17f72', 'student', NULL),
(21, 1, 'asmita_1', '900150983cd24fb0d6963f7d28e17f72', 'teacher', NULL),
(20, 5, 'abhay_5', '900150983cd24fb0d6963f7d28e17f72', 'student', NULL),
(19, 4, 'seema_4', '900150983cd24fb0d6963f7d28e17f72', 'student', NULL),
(18, 3, 'subindra_3', '900150983cd24fb0d6963f7d28e17f72', 'student', NULL),
(17, 2, 'raj_2', '900150983cd24fb0d6963f7d28e17f72', 'student', NULL),
(16, 1, 'ankit_1', '900150983cd24fb0d6963f7d28e17f72', 'student', NULL),
(24, 4, 'akash_4', '900150983cd24fb0d6963f7d28e17f72', 'teacher', NULL),
(25, 5, 'bikram_5', '900150983cd24fb0d6963f7d28e17f72', 'teacher', NULL),
(26, 6, 'anup_6', '900150983cd24fb0d6963f7d28e17f72', 'student', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `mname` varchar(11) DEFAULT NULL,
  `lname` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `occupation` text NOT NULL,
  `contact_id` int(11) NOT NULL,
  `email` text,
  `mobile` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `fname`, `mname`, `lname`, `gender`, `occupation`, `contact_id`, `email`, `mobile`) VALUES
(1, 'Akash', '', 'Karna', 'male', 'Service', 12, 'Akash.Karna@hotmail.com', 2147483647),
(2, 'Navaraj', '', 'Baniya', 'male', 'Business', 13, 'Nav_raj@yahoo.com', 2147483647),
(3, 'Bibek', '', 'Bajracharya', 'male', 'Engineer', 14, 'Bibek_baj@yahoo.com', 2147483647),
(4, 'Bheema', '', 'Lama', 'male', 'Driver', 15, '', 2147483647),
(5, 'Lalit', 'lal', 'Sharma', 'male', 'Shopkeeper', 16, '', 2147483647),
(6, 'Abc', '', 'shrestha', 'male', 'busness', 22, '', 98);

-- --------------------------------------------------------

--
-- Table structure for table `parent_student_relationship`
--

CREATE TABLE IF NOT EXISTS `parent_student_relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `parent_student_relationship`
--

INSERT INTO `parent_student_relationship` (`id`, `student_id`, `relation`, `parent_id`) VALUES
(1, 1, 'Father', 1),
(2, 2, 'Father', 2),
(3, 3, 'Father', 3),
(4, 4, 'Father', 4),
(5, 5, 'Father', 5),
(6, 6, 'Father', 6);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `type` text NOT NULL,
  `remark_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `remarks`
--


-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE IF NOT EXISTS `routine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) NOT NULL,
  `picture_name` text NOT NULL,
  `type` text NOT NULL,
  `image_type` text NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `class_id`, `picture_name`, `type`, `image_type`, `size`) VALUES
(1, 13, 'loadshedding.jpeg', 'image/jpeg', 'class', 180202),
(2, 6, 'class3.jpeg', 'image/jpeg', 'class', 180202),
(3, 7, 'class4.jpeg', 'image/jpeg', 'class', 180202),
(4, 1, 'class1.jpeg', 'image/jpeg', 'class', 180202),
(5, 2, 'class2.jpeg', 'image/jpeg', 'class', 180202),
(6, 8, 'class5.jpeg', 'image/jpeg', 'class', 180202);

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure`
--

CREATE TABLE IF NOT EXISTS `salary_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) NOT NULL,
  `salary` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `salary_structure`
--

INSERT INTO `salary_structure` (`id`, `class_id`, `salary`) VALUES
(1, 1, 1000),
(2, 2, 1000),
(3, 3, 1000),
(4, 4, 1100),
(5, 5, 1200),
(6, 6, 1300),
(7, 7, 1400),
(8, 8, 1500),
(9, 9, 1600),
(10, 10, 1700),
(11, 11, 1800),
(12, 12, 1900),
(13, 13, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `mname` text,
  `lname` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` text NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `nationality` text NOT NULL,
  `contact_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `class_id` int(10) NOT NULL,
  `admission_date` text NOT NULL,
  `previous_school` text NOT NULL,
  `email` text,
  `photo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `mname`, `lname`, `gender`, `dob`, `blood_group`, `nationality`, `contact_id`, `parent_id`, `class_id`, `admission_date`, `previous_school`, `email`, `photo`) VALUES
(1, 'Ankit', '', 'Karna', 'male', '2009-02-21', 'A+', 'Nepali', 12, 1, 1, '2013-02-14', '', '', NULL),
(2, 'Raj', '', 'Baniya', 'male', '2009-05-20', 'B-', 'Nepali', 13, 2, 2, '2012-12-26', '', '', NULL),
(3, 'Subindra', '', 'Bajracharya', 'female', '2008-04-12', 'A-', 'Nepali', 14, 3, 3, '2011-01-25', '', '', NULL),
(4, 'Seema', '', 'Lama', 'female', '2007-12-08', 'A+', 'Nepali', 15, 4, 4, '2010-01-20', '', '', NULL),
(5, 'Abhay', 'Kumar', 'Sharma', 'male', '2006-10-12', 'B-', 'Nepali', 16, 5, 6, '2009-02-15', '', '', NULL),
(6, 'anup', '', 'shrestha', 'male', '1990-09-09', 'o+', 'NEPALI', 22, 6, 6, '2013-02-03', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE IF NOT EXISTS `student_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `last_paid_date` date NOT NULL,
  `total_payment` double NOT NULL,
  `due` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_account`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE IF NOT EXISTS `student_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `class_id`, `date`, `status`) VALUES
(1, 5, 6, '2013-03-12', 'present'),
(2, 6, 6, '2013-03-12', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE IF NOT EXISTS `student_marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `marks_obtained` int(11) NOT NULL,
  `terminal_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `subject_id`, `student_id`, `class_id`, `marks_obtained`, `terminal_id`, `remarks`) VALUES
(1, 7, 5, 6, 90, 3, 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE IF NOT EXISTS `student_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `year_month` date NOT NULL,
  `date_paid` date NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `class_id` int(10) NOT NULL,
  `fm` int(11) NOT NULL,
  `pm` int(11) NOT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `class_id`, `fm`, `pm`, `remarks`) VALUES
(1, 'Headway English', 4, 100, 40, 'theory'),
(2, 'Health and Physical', 4, 50, 20, 'theory'),
(3, 'Social Studies', 4, 100, 40, 'theory'),
(4, 'Headway English', 5, 100, 40, 'theory'),
(5, 'Mathematics', 5, 100, 40, 'theory'),
(6, 'Social Studies', 5, 100, 40, 'theory'),
(7, 'Science', 6, 100, 40, 'theory'),
(8, 'Mathematics', 6, 100, 40, 'theory'),
(9, 'Nepali', 6, 100, 40, 'theory'),
(10, 'English', 7, 100, 40, 'theory'),
(11, 'Mathematics', 7, 100, 40, 'theory'),
(12, 'Science', 7, 100, 40, 'theory'),
(15, 'Computer', 7, 75, 30, 'theory'),
(14, 'Computer', 7, 25, 10, 'practical'),
(16, 'Mathematics', 8, 100, 40, 'theory'),
(17, 'English', 8, 100, 40, 'theory'),
(18, 'Science', 8, 100, 40, 'theory'),
(19, 'Mathematics', 9, 100, 40, 'theory'),
(20, 'English', 9, 100, 40, 'theory'),
(21, 'Science', 9, 100, 40, 'theory'),
(22, 'English', 10, 100, 40, 'theory'),
(23, 'Mathematics', 10, 100, 40, 'theory'),
(24, 'Computer', 10, 100, 40, 'theory'),
(25, 'Mathematics', 11, 100, 40, 'theory'),
(26, 'Optional Mathematics', 11, 100, 40, 'theory'),
(27, 'Science', 11, 100, 40, 'theory'),
(28, 'Mathematics', 12, 100, 40, 'theory'),
(29, 'Science', 12, 100, 40, 'theory'),
(30, 'Optional Mathematics', 13, 100, 40, 'theory'),
(31, 'Mathematics', 13, 100, 40, 'theory');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `mname` text,
  `lname` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` text NOT NULL,
  `qualification` text NOT NULL,
  `blood_group` text NOT NULL,
  `nationality` text NOT NULL,
  `contact_id` int(11) NOT NULL,
  `email` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fname`, `mname`, `lname`, `gender`, `dob`, `qualification`, `blood_group`, `nationality`, `contact_id`, `email`) VALUES
(1, 'Asmita', '', 'Shrestha', 'female', '1990-01-05', 'B.Ed', 'O-', 'Nepali', 17, 'Asmi.shr@gmail.com'),
(2, 'Aastha', '', 'Maskey', 'female', '1990-08-10', 'B.Ed', 'B-', 'Nepali', 18, 'Aa_stha@gmail.com'),
(3, 'Pravesh', '', 'Shrestha', 'male', '1989-12-08', 'B.Ed', 'A-', 'Nepali', 19, 'Pravu@gmail.com'),
(4, 'Akash', 'Lal', 'Nakarmi', 'male', '1988-01-14', 'B.Ed', 'A+', 'Nepali', 20, ''),
(5, 'Bikram', 'Kaji', 'Basnet', 'male', '1988-09-09', 'M.Ed', 'AB+', 'Nepali', 21, 'Bik.basnet@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_account`
--

CREATE TABLE IF NOT EXISTS `teacher_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `total_payment` double NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `teacher_account`
--


-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE IF NOT EXISTS `teacher_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `teacher_attendance`
--


-- --------------------------------------------------------

--
-- Table structure for table `teacher_payment`
--

CREATE TABLE IF NOT EXISTS `teacher_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `month` text NOT NULL,
  `date_paid` date NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher_payment`
--

INSERT INTO `teacher_payment` (`id`, `teacher_id`, `year`, `month`, `date_paid`, `amount`) VALUES
(1, 2, 2013, 'Feb', '2013-03-12', 3700);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_sub`
--

CREATE TABLE IF NOT EXISTS `teacher_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `teacher_sub`
--

INSERT INTO `teacher_sub` (`id`, `subject_id`, `teacher_id`) VALUES
(1, 1, 2),
(2, 4, 2),
(3, 10, 2),
(4, 3, 4),
(5, 6, 4),
(6, 7, 1),
(7, 12, 1),
(8, 18, 1),
(9, 5, 5),
(10, 19, 5),
(11, 30, 5),
(12, 9, 3),
(13, 14, 3),
(14, 2, 3),
(15, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE IF NOT EXISTS `terminal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`id`, `name`, `date`) VALUES
(1, 'first', '2069-09-09'),
(2, 'second', '2069-09-09'),
(3, 'second', '2069-09-09'),
(4, 'second', '2069-09-09');
