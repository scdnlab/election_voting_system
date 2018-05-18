-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2011 at 07:19 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '123456', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE IF NOT EXISTS `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `title`, `url`, `sort`) VALUES
(14, 'Students', 'student.php', 13),
(1, 'Settings', 'setting.php', 1),
(7, 'Logout', 'logout.php', 17),
(15, 'Election', 'election.php', 14),
(16, 'Candidate', 'candidate.php', 15),
(17, 'Candidate Category', 'candidate_category.php', 16);

-- --------------------------------------------------------

--
-- Table structure for table `admin_submenu`
--

DROP TABLE IF EXISTS `admin_submenu`;
CREATE TABLE IF NOT EXISTS `admin_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `admin_submenu`
--

INSERT INTO `admin_submenu` (`id`, `menu_id`, `title`, `url`, `sort`) VALUES
(19, 8, 'Category', 'category.php', 2),
(1, 1, 'Project Settings', 'setting.php', 4),
(2, 1, 'Admin Settings', 'admin.php', 5),
(20, 8, 'Price', 'price.php', 2),
(21, 8, 'Projects', 'project.php', 1),
(22, 8, 'Feature Group', 'feature_group.php', 2),
(23, 8, 'Feature', 'feature.php', 3),
(24, 1, 'Session Settings', 'session.php', 25),
(25, 1, 'Password Settings', 'password_setting.php', 25),
(26, 1, 'Theme Settings', 'theme.php', 27),
(27, 1, 'IP Address Setting', 'ip_address.php', 30);

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `candidate_category_id` int(11) NOT NULL DEFAULT '0',
  `election_id` int(11) NOT NULL DEFAULT '0',
  `ballot_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `candidate`
--


-- --------------------------------------------------------

--
-- Table structure for table `candidate_category`
--

DROP TABLE IF EXISTS `candidate_category`;
CREATE TABLE IF NOT EXISTS `candidate_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `election_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `session` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `candidate_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `type` enum('Textbox','Textarea','Selectbox','Boolean') NOT NULL DEFAULT 'Textbox',
  `visible` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `key`, `value`, `title`, `type`, `visible`) VALUES
(1, 'PROJECT_NAME', 'Voting System', 'Project Name', 'Textbox', 'Yes'),
(2, 'LISTING_PER_PAGE', '30', 'Listing Per Page', 'Textarea', 'Yes'),
(3, 'ACTIVE_SESSION', '|2010-2011|2009-2010|2008-2009|2007-2008|', 'Sessions', 'Textbox', 'No'),
(17, 'PASSWORD_LENGTH', '8', 'Password Length', 'Textbox', 'Yes'),
(27, 'MAX_IMAGE_WIDTH', '420', 'Max Image Width', 'Textbox', 'No'),
(28, 'MAX_THUMB_WIDTH', '120', 'Max Thumbnail Width', 'Textbox', 'No'),
(29, 'FOOTER_TEXT', '© Copyright 2011 Voting System', 'Footer Text', 'Textbox', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

DROP TABLE IF EXISTS `election`;
CREATE TABLE IF NOT EXISTS `election` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `session` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `start_time` time NOT NULL DEFAULT '00:00:00',
  `end_time` time NOT NULL DEFAULT '00:00:00',
  `status` enum('Active','Inactive','Completed') NOT NULL DEFAULT 'Inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`id`, `title`, `description`, `session`, `date`, `start_time`, `end_time`, `status`) VALUES
(1, 'CSE SOCIETY ELECTION 2011-12', '', '|2010-2011|2009-2010|2008-2009|2007-2008|', '2011-11-26', '00:00:00', '00:00:00', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL DEFAULT '',
  `thumb_path` varchar(255) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `path`, `thumb_path`, `created`, `modified`, `status`) VALUES
(1, 'images/uploads/student/190/1795046960.jpg', 'images/uploads/student/190/thumb/1795046960.jpg', '2008-04-01 16:48:14', '2008-04-01 16:48:15', 'Active'),
(2, 'images/uploads/student/112/1588494093.jpg', 'images/uploads/student/112/thumb/1588494093.jpg', '2008-04-01 16:48:34', '2008-04-01 16:48:34', 'Active'),
(3, 'images/uploads/student/225/1994701444.jpg', 'images/uploads/student/225/thumb/1994701444.jpg', '2008-04-01 16:48:53', '2008-04-01 16:48:53', 'Active'),
(4, 'images/uploads/student/275/296515319.jpg', 'images/uploads/student/275/thumb/296515319.jpg', '2008-04-01 16:49:16', '2008-04-01 16:49:17', 'Active'),
(5, 'images/uploads/student/238/1073694274.jpg', 'images/uploads/student/238/thumb/1073694274.jpg', '2008-04-01 16:49:39', '2008-04-01 16:49:39', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ip_address`
--

DROP TABLE IF EXISTS `ip_address`;
CREATE TABLE IF NOT EXISTS `ip_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_name` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `ip_address`
--

INSERT INTO `ip_address` (`id`, `pc_name`, `ip_address`, `status`) VALUES
(16, 'Suhag PC', '192.168.137.7', 'Active'),
(14, 'PC1', '192.168.0.1', 'Active'),
(13, 'PC2', '192.168.0.2', 'Active'),
(12, 'PC3', '192.168.0.3', 'Active'),
(20, 'pulok', '192.168.137.149', 'Active'),
(19, 'alamin', '192.168.137.20', 'Active'),
(21, 'PC1', '192.168.137.1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `image_id` varchar(255) NOT NULL DEFAULT '',
  `session` varchar(255) NOT NULL DEFAULT '',
  `section` enum('A','B') NOT NULL DEFAULT 'A',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=762 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `reg_no`, `name`, `password`, `image_id`, `session`, `section`, `status`) VALUES
(1, 2002331002, 'Md. Fahim Easin Mahbub', 'c9c22022', '', '2002-2003', 'A', 'Active'),
(2, 2002331006, 'Md. Imranul Hasan', '67f555be', '', '2002-2003', 'A', 'Active'),
(3, 2002331009, 'Md. Misbahul Alam Chowdhury', 'c429deaa', '', '2002-2003', 'A', 'Active'),
(4, 2002331011, 'Raiyan Karim', '15638dc9', '', '2002-2003', 'A', 'Active'),
(5, 2002331013, 'Rajib  Banik', 'e58c0434', '', '2002-2003', 'A', 'Active'),
(6, 2002331014, 'Kazi Md. Kamal Ibne Aziz', 'dc78f97d', '', '2002-2003', 'A', 'Active'),
(7, 2002331018, 'Md. Sumon Mohtasin', '668a30ec', '', '2002-2003', 'A', 'Active'),
(8, 2002331020, 'Md. Mahbubul Haque', '5a6cc5bc', '', '2002-2003', 'A', 'Active'),
(9, 2002331026, 'Md. Mehedi Hassan', 'a3b7f443', '', '2002-2003', 'A', 'Active'),
(10, 2002331028, 'Tanzeena Rahman', 'e7addff4', '', '2002-2003', 'A', 'Active'),
(11, 2002331030, 'Md. Milton Hossain', '4a8c1baa', '', '2002-2003', 'A', 'Active'),
(12, 2002331034, 'Rima Pal', '5d2923f1', '', '2002-2003', 'A', 'Active'),
(13, 2002331040, 'Tuhin Kanti Das', 'c22f2f81', '', '2002-2003', 'A', 'Active'),
(14, 2002331041, 'Md. Golam Hafiz', 'dbc2570f', '', '2002-2003', 'A', 'Active'),
(15, 2002331043, 'Azharul Islam', 'ed8e4b9a', '', '2002-2003', 'A', 'Active'),
(16, 2002331044, 'Md.Imadur Rahman', 'd85b850c', '', '2002-2003', 'A', 'Active'),
(17, 2002331045, 'Barnali Chakrabarti Pinky', '1b03993b', '', '2002-2003', 'A', 'Active'),
(18, 2002331046, 'Md. Zakir Hossain', '4749d8e2', '', '2002-2003', 'A', 'Active'),
(19, 2002331049, 'Ferdous Mohammed Shahriar', '84f7c49e', '', '2002-2003', 'A', 'Active'),
(20, 2002331053, 'Md. Rashidul Hasan', '3cae2400', '', '2002-2003', 'A', 'Active'),
(21, 2002331055, 'Md. Humayun Kabir', '5405ffb5', '', '2002-2003', 'A', 'Active'),
(22, 2002331057, 'Yasir Arefin', '843778e6', '', '2002-2003', 'A', 'Active'),
(23, 2002331059, 'Isahaque Miah', 'a970dbbb', '', '2002-2003', 'A', 'Active'),
(24, 2002331060, 'Khondkar Masud Elahi', '394bbdc1', '', '2002-2003', 'A', 'Active'),
(25, 2002331061, 'Md. Abul Kalam Azad', '7f86da68', '', '2002-2003', 'A', 'Active'),
(26, 2002331062, 'Sumita Maitra', '26ac408a', '', '2002-2003', 'A', 'Active'),
(27, 2002331065, 'Muhammad Didarul Alam', '1c94764f', '', '2002-2003', 'A', 'Active'),
(28, 2002331066, 'Mohd. .Manjur Alam', 'ff93229a', '', '2002-2003', 'A', 'Active'),
(29, 2002331070, 'Aminul Islam Chowdhury', 'd3521544', '', '2002-2003', 'A', 'Active'),
(30, 2002331072, 'Abu Zia Md. Borhan Uddin', '7ad23db7', '', '2002-2003', 'A', 'Active'),
(31, 2002331074, 'Mohammad Mahadi Hasan', '9d2c6040', '', '2002-2003', 'A', 'Active'),
(32, 2002331076, 'Hasan Mohammod Tareque', '1a97c1b2', '', '2002-2003', 'A', 'Active'),
(33, 2002331078, 'Md. Mostafizur Rahman', 'de9f33ff', '', '2002-2003', 'A', 'Active'),
(34, 2002331080, 'Md. Mahadi Masud Faisal', '7e2df171', '', '2002-2003', 'A', 'Active'),
(35, 2002331082, 'Altaf Hussain', '28048b22', '', '2002-2003', 'A', 'Active'),
(36, 2002331084, 'Abdullahil Baki Md.Ruhunnabi', '47773f4d', '', '2002-2003', 'A', 'Active'),
(37, 2002331085, 'Sazibur Rahman', 'c8173c8e', '', '2002-2003', 'A', 'Active'),
(38, 2002331091, 'Mst. Shanzida yasmin', 'dfb34b10', '', '2002-2003', 'A', 'Active'),
(39, 2002331092, 'Abdullah al Aaqib', 'ef597012', '', '2002-2003', 'A', 'Active'),
(40, 2002331094, 'Md. Hafizur Rahman', '32fb2453', '', '2002-2003', 'A', 'Active'),
(41, 2002331096, 'Abu Hanif', '0a7c91ab', '', '2002-2003', 'A', 'Active'),
(42, 2002331101, 'A.Q.M Saiful Islam', '5d7186c4', '', '2002-2003', 'A', 'Active'),
(43, 2002331103, 'Md. Jubaer Rahman', '6c3de3cc', '', '2002-2003', 'A', 'Active'),
(44, 2002331104, 'Shamal Roy', 'e939861b', '', '2002-2003', 'A', 'Active'),
(45, 2002331109, 'Susthir Ranjan Sarkar', 'dcd1d834', '', '2002-2003', 'A', 'Active'),
(46, 2002331113, 'A. B. M. Rezbaul Islam', 'c8a36eed', '', '2002-2003', 'A', 'Active'),
(47, 2002331115, 'Md. Faisal Hasan Khan', '0e440e4c', '', '2002-2003', 'A', 'Active'),
(48, 2002331117, 'Md. Nazrul Islam', 'cad8e335', '', '2002-2003', 'A', 'Active'),
(49, 2002331119, 'Ahad Noor Alam', '1c0ee9a3', '', '2002-2003', 'A', 'Active'),
(50, 2002331120, 'Kohinur Akter baby', 'ed8d2749', '', '2002-2003', 'A', 'Active'),
(51, 2002331121, 'Fahim Mohammad Chy', 'e435fd54', '', '2002-2003', 'A', 'Active'),
(52, 2001331055, 'Mohammad Jakir Hossain', 'b1c3681d', '', '2002-2003', 'B', 'Active'),
(53, 2001331059, 'Faiz Ahmed', '3af78bba', '', '2002-2003', 'B', 'Active'),
(54, 2001331108, 'Jakir Hossain', '71a37146', '', '2002-2003', 'B', 'Active'),
(55, 2002331001, 'Rashedul Hossain Khan', 'ec42c874', '', '2002-2003', 'B', 'Active'),
(56, 2002331003, 'Md. Shihabuddin Sadi', 'c2263717', '', '2002-2003', 'B', 'Active'),
(57, 2002331005, 'Rafiqul Islam', 'd7fd71e0', '', '2002-2003', 'B', 'Active'),
(58, 2002331007, 'Md.Mahmudul Hasan', '8c79f3ca', '', '2002-2003', 'B', 'Active'),
(59, 2002331010, 'Biplob Kumar Banik', '80c9f5c8', '', '2002-2003', 'B', 'Inactive'),
(60, 2002331015, 'Masum Kabir', 'c9f69962', '', '2002-2003', 'B', 'Active'),
(61, 2002331016, 'Md. Shamsul Alam', '44bb724a', '', '2002-2003', 'B', 'Active'),
(62, 2002331017, 'Md. Ashiqur Rahman', '15b97c68', '', '2002-2003', 'B', 'Active'),
(63, 2002331019, 'Biplob Chandra Sarker', 'ddf5c8be', '', '2002-2003', 'B', 'Active'),
(64, 2002331021, 'S. Abdul Matin', 'f0e71696', '', '2002-2003', 'B', 'Active'),
(65, 2002331023, 'Abu Zafar Mohammad Sami', '4b628b8d', '', '2002-2003', 'B', 'Active'),
(66, 2002331024, 'Abdulla-Al-Masum', 'caeeb09b', '', '2002-2003', 'B', 'Active'),
(67, 2002331025, 'Sadia Sultana', 'fdc0af90', '', '2002-2003', 'B', 'Active'),
(68, 2002331027, 'Nazmur Rowshan Sumel', '1ec10ccb', '', '2002-2003', 'B', 'Active'),
(69, 2002331029, 'Mamtaj Akter', '98769e3a', '', '2002-2003', 'B', 'Active'),
(70, 2002331031, 'Talha Ibne Imam', '36773073', '', '2002-2003', 'B', 'Active'),
(71, 2002331032, 'Liton Sarkar', '7551522f', '', '2002-2003', 'B', 'Active'),
(72, 2002331033, 'Md. Mojammel Hossain', 'b2e3cc24', '', '2002-2003', 'B', 'Active'),
(73, 2002331035, 'Mohmmed Ali Roni', 'ddf27835', '', '2002-2003', 'B', 'Active'),
(74, 2002331036, 'Jakir Hossain', 'c4792bbe', '', '2002-2003', 'B', 'Active'),
(75, 2002331037, 'Md. Abul Bashar', '4d824dd1', '', '2002-2003', 'B', 'Active'),
(76, 2002331038, 'Md. Anwar Hossain', '52c44b08', '', '2002-2003', 'B', 'Active'),
(77, 2002331039, 'N.A.M. Rezoanul Arefeen', '76f897b9', '', '2002-2003', 'B', 'Active'),
(78, 2002331042, 'Nantu Chandra Das', '0f917ebd', '', '2002-2003', 'B', 'Active'),
(79, 2002331048, 'Tania Ferdousi', '8af5b75c', '', '2002-2003', 'B', 'Active'),
(80, 2002331050, 'Dipti Roy', '458c05d9', '', '2002-2003', 'B', 'Active'),
(81, 2002331052, 'Md. Iqbal Hossain Bhuiyan', '473591e0', '', '2002-2003', 'B', 'Active'),
(82, 2002331054, 'Md. Nasimuzzaman', 'a1f2fc26', '', '2002-2003', 'B', 'Active'),
(83, 2002331056, 'Md. Abu Naser Bikas', 'f3cff9c2', '', '2002-2003', 'B', 'Active'),
(84, 2002331058, 'Janesar Azad', '0a7960e7', '', '2002-2003', 'B', 'Active'),
(85, 2002331063, 'Satish Chandra Das', '18421f01', '', '2002-2003', 'B', 'Active'),
(86, 2002331064, 'Mohammad Abdullah Al Mahmud', '8487d52c', '', '2002-2003', 'B', 'Active'),
(87, 2002331067, 'Bishnu Pada Chanda', '0b7221f6', '', '2002-2003', 'B', 'Active'),
(88, 2002331068, 'Martuza Ahmed', '01eac300', '', '2002-2003', 'B', 'Active'),
(89, 2002331069, 'Md. Sohel Miah', 'e566c0dd', '', '2002-2003', 'B', 'Active'),
(90, 2002331071, 'Mitu Kumar Debnath', '27d2ec45', '', '2002-2003', 'B', 'Active'),
(91, 2002331073, 'Nur Hossen', '4e78dfed', '', '2002-2003', 'B', 'Active'),
(92, 2002331077, 'Fokrul Amin Rasel', '4a6f7e02', '', '2002-2003', 'B', 'Active'),
(93, 2002331079, 'Jahirul Islam', '3478d38a', '', '2002-2003', 'B', 'Active'),
(94, 2002331081, 'Muhammad Faysol Bhuiyan', '4f2007e0', '', '2002-2003', 'B', 'Active'),
(95, 2002331083, 'Imtiaz Uddin Ahmed', 'fbf5f017', '', '2002-2003', 'B', 'Active'),
(96, 2002331086, 'Abu Awal Md. Shoeb', 'e60cee4c', '', '2002-2003', 'B', 'Active'),
(97, 2002331090, 'Kazi Ismat Jahan', '231e8547', '', '2002-2003', 'B', 'Active'),
(98, 2002331093, 'Md. Feroz Shams Pahlowan', 'bf5a6a4c', '', '2002-2003', 'B', 'Active'),
(99, 2002331095, 'Halima Jamil', '92b6e905', '', '2002-2003', 'B', 'Active'),
(100, 2002331097, 'Md. Jahed Mia', 'f414ca4e', '', '2002-2003', 'B', 'Active'),
(101, 2002331098, 'Muhammad Mahfuz Ibne Halim', 'd4a70153', '', '2002-2003', 'B', 'Active'),
(102, 2002331100, 'Bappy Depnath', 'bbb01766', '', '2002-2003', 'B', 'Active'),
(103, 2002331102, 'Md. Khaled Ahmed', '581e4a4d', '', '2002-2003', 'B', 'Active'),
(104, 2002331106, 'Shah Muhammad Mazed', '67d88fcf', '', '2002-2003', 'B', 'Active'),
(105, 2002331108, 'Md. Rashedur Rahman', '8f8b9ff7', '', '2003-2004', 'A', 'Active'),
(106, 2002331110, 'Binayan Dey', '2088ed57', '', '2002-2003', 'B', 'Active'),
(107, 2002331112, 'Md. Anisur Rahman', 'c76a2a86', '', '2002-2003', 'B', 'Active'),
(108, 2002331114, 'Dwijendra Chandra Das', 'd4dd95f0', '', '2002-2003', 'B', 'Active'),
(109, 2002331116, 'Dilruba Khanam', '6255c919', '', '2002-2003', 'B', 'Active'),
(110, 2002331118, 'Muhammad Masud Rana', 'efeb95f4', '', '2002-2003', 'B', 'Active'),
(111, 2002331122, 'Md. Atikur Rahman', 'f9dac222', '', '2002-2003', 'B', 'Active'),
(112, 2002331012, 'MRINAL', 'cbb2101d', '|2|', '2003-2004', 'A', 'Active'),
(113, 2002331075, 'Zakir Hossain', 'e22e8c29', '', '2003-2004', 'A', 'Active'),
(114, 2002331105, 'Marjan ul Haque', 'c390137f', '', '2003-2004', 'A', 'Active'),
(115, 2002331111, 'Ziaur Rahman', '3d54a64b', '', '2003-2004', 'A', 'Active'),
(116, 2003331001, 'Moutusi Deb', 'c9ea3bba', '', '2003-2004', 'A', 'Active'),
(117, 2003331003, 'Ahmed Naqibul Arefin', '68181249', '', '2003-2004', 'A', 'Active'),
(118, 2003331005, 'Mushfiqur Rahman', '177637e2', '', '2003-2004', 'A', 'Active'),
(119, 2003331009, 'Md. Zakaria Alam', 'f5da6169', '', '2003-2004', 'A', 'Active'),
(120, 2003331013, 'Prianka Banik', '947c6b09', '', '2003-2004', 'A', 'Active'),
(121, 2003331015, 'Sayeda Ferdousi', 'd57a7a6b', '', '2003-2004', 'A', 'Active'),
(122, 2003331017, 'Farhana Akther Khan', '135f95e9', '', '2003-2004', 'A', 'Active'),
(123, 2003331019, 'Ayesha Tasnim', 'c6a85491', '', '2003-2004', 'A', 'Active'),
(124, 2003331021, 'Md. Mamun ? Ur ? Rashid', 'f2a9227e', '', '2003-2004', 'A', 'Active'),
(125, 2003331023, 'Md. Tafazzol Hossain', 'a19072e4', '', '2003-2004', 'A', 'Active'),
(126, 2003331025, 'Md. Habibur Rahman', '59b7c274', '', '2003-2004', 'A', 'Active'),
(127, 2003331027, 'Rumana Fattah Chowdhury', '1ed00220', '', '2003-2004', 'A', 'Active'),
(128, 2003331029, 'Md. Saiful Islam', '56edd1ed', '', '2003-2004', 'A', 'Active'),
(129, 2003331031, 'Hasan Md. Suhag', 'f049063c', '', '2003-2004', 'A', 'Active'),
(130, 2003331033, 'E.A.M. Benzamin Basher', '7c57f2fb', '', '2003-2004', 'A', 'Active'),
(131, 2003331035, 'Md. Nahidul Hasan', '6ee4f93b', '', '2003-2004', 'A', 'Active'),
(132, 2003331037, 'Shahnaz Parvin Nina', '61d3f22b', '', '2003-2004', 'A', 'Active'),
(133, 2003331043, 'Pranajit Kumar Das', '0ec54ab9', '', '2003-2004', 'A', 'Active'),
(134, 2003331045, 'Abu Hossain', 'ee2f06d5', '', '2003-2004', 'A', 'Active'),
(135, 2003331047, 'Nusrat Sharmin', '3ef938bc', '', '2003-2004', 'A', 'Active'),
(136, 2003331051, 'N. M. Rakibul Hasan', '2c6754c0', '', '2003-2004', 'A', 'Active'),
(137, 2003331053, 'Monish Chakraborty', '73a1458c', '', '2003-2004', 'A', 'Active'),
(138, 2003331057, 'Sathi Rani Roy', 'c8fd338b', '', '2003-2004', 'A', 'Active'),
(139, 2003331059, 'Susanta Kumar Saha', '4bda9db6', '', '2003-2004', 'A', 'Active'),
(140, 2003331061, 'Sm Mahmudul Hasan', '9f928df1', '', '2003-2004', 'A', 'Active'),
(141, 2003331063, 'Md Mahamudur Rahman', '7211460a', '', '2003-2004', 'A', 'Active'),
(142, 2003331065, 'Md. Salahuddin Bhuiyan', '9dc266b4', '', '2003-2004', 'A', 'Active'),
(143, 2003331067, 'Mahbub-E-Rabbani', 'c4a4b2bc', '', '2003-2004', 'A', 'Active'),
(144, 2003331069, 'Md. Anamul Haque', '48921dda', '', '2003-2004', 'A', 'Active'),
(145, 2003331071, 'Md.Aminur Rahman', '995dd52c', '', '2003-2004', 'A', 'Active'),
(146, 2003331073, 'Md. Misbahur Rahman', '80a851a5', '', '2003-2004', 'A', 'Active'),
(147, 2003331075, 'Ahmmed Ektear Shakil', 'd69d6451', '', '2003-2004', 'A', 'Active'),
(148, 2003331077, 'Rasheda Sultana', '96e788a8', '', '2003-2004', 'A', 'Active'),
(149, 2003331079, 'Chanda Bhattacharjee', '2567dcf9', '', '2003-2004', 'A', 'Active'),
(150, 2003331081, 'Debotosh Dey', '497c094d', '', '2003-2004', 'A', 'Active'),
(151, 2003331083, 'Forkan Uddin', '40523c7a', '', '2003-2004', 'A', 'Active'),
(152, 2003331085, 'Shaikh Md. Mamunur Rashid', 'db27674b', '', '2003-2004', 'A', 'Active'),
(153, 2003331087, 'Mohammad Nurul Afsar', '274a91ad', '', '2003-2004', 'A', 'Active'),
(154, 2003331089, 'Monir Md. Rashedul Hoque', 'cc58e4ce', '', '2003-2004', 'A', 'Active'),
(155, 2003331091, 'Mohiuddin Ibne Kawsar', 'c3c03f95', '', '2003-2004', 'A', 'Active'),
(156, 2003331093, 'Nurul Alam', '95420123', '', '2003-2004', 'A', 'Active'),
(157, 2003331097, 'Mst. Mousumi Aktar', 'c0d073ac', '', '2003-2004', 'A', 'Active'),
(158, 2003331099, 'Nibir Hossain', 'd96914e1', '', '2003-2004', 'A', 'Active'),
(159, 2003331101, 'Manas Kanti Dey', 'f50e3943', '', '2003-2004', 'A', 'Active'),
(160, 2003331103, 'Mir Nazrul Islam', '881f84f0', '', '2003-2004', 'A', 'Active'),
(161, 2003331105, 'Muhammad Masud Rashid', '028475c9', '', '2003-2004', 'A', 'Active'),
(162, 2003331107, 'Enatyet Karim Tuhin', '75b472f6', '', '2003-2004', 'A', 'Active'),
(163, 2003331109, 'Md. Sohrab Hossain', 'c408a1db', '', '2003-2004', 'A', 'Active'),
(164, 2003331111, 'Md. Mamun Hossain', 'c8dad693', '', '2003-2004', 'A', 'Active'),
(165, 2003331113, 'Mst.Mahfuja Akter', '42896ceb', '', '2003-2004', 'A', 'Active'),
(166, 2003331115, 'Md Khairul Islam Bhuian', '565996b8', '', '2003-2004', 'A', 'Active'),
(167, 2003331117, 'Md. Sahadat Hossain Mazumder', '9f086371', '', '2003-2004', 'A', 'Active'),
(168, 2003331119, 'Al- Mamun', 'b2fa5650', '', '2003-2004', 'A', 'Active'),
(169, 2003331121, 'Bijay Kumar Yadav', 'a32f1c6f', '', '2003-2004', 'A', 'Active'),
(170, 2003331002, 'Debakar Shamanta', 'f73dec41', '', '2003-2004', 'B', 'Active'),
(171, 2003331004, 'Md. Akter Hussain', '4aa5a27e', '', '2003-2004', 'B', 'Active'),
(172, 2003331006, 'Hiro Mia', '2ff47931', '', '2003-2004', 'B', 'Active'),
(173, 2003331008, 'Ahmad Rakib Uddin', 'b0ae1336', '', '2003-2004', 'B', 'Active'),
(174, 2003331012, 'Pallab Kanti Roy', '77f5ac4f', '', '2003-2004', 'B', 'Active'),
(175, 2003331014, 'Md. Golam Faroque Sarkar', '6a0efedd', '', '2003-2004', 'B', 'Active'),
(176, 2003331016, 'Kallol Naha', 'd3e1fc6d', '', '2003-2004', 'B', 'Active'),
(177, 2003331018, 'Syeda Suhana Rahman', '5941c768', '', '2003-2004', 'B', 'Active'),
(178, 2003331020, 'Muhammed Nyeem Hassan', '8d2a3c7c', '', '2003-2004', 'B', 'Active'),
(179, 2003331024, 'Marufa Rahmi', 'c494f12f', '', '2003-2004', 'B', 'Active'),
(180, 2003331026, 'Shifat Jahan', '4a9b17dc', '', '2003-2004', 'B', 'Active'),
(181, 2003331028, 'Moshhud Ahmed', '4543d2fc', '', '2003-2004', 'B', 'Active'),
(182, 2003331030, 'Abu Sadat Mohammed Yasin', '8ac5b5b8', '', '2003-2004', 'B', 'Active'),
(183, 2003331036, 'Md.Mehedi Hasan', '4dc43741', '', '2003-2004', 'B', 'Active'),
(184, 2003331038, 'Md. Anwarul Hasan', '571d0752', '', '2003-2004', 'B', 'Active'),
(185, 2003331040, 'Rajib Sen', '91985a56', '', '2003-2004', 'B', 'Active'),
(186, 2003331042, 'Abul Bashar Darzi', '1ac33462', '', '2003-2004', 'B', 'Active'),
(187, 2003331044, 'Mukta Rani Barai', '19fe3055', '', '2003-2004', 'B', 'Active'),
(188, 2003331046, 'Md Firoz', '44f07af0', '', '2003-2004', 'B', 'Active'),
(189, 2003331052, 'Md. Aramn Ullah', '7855cb5a', '', '2003-2004', 'B', 'Active'),
(190, 2003331054, 'ZAMAN', 'e029ff5f', '|1|', '2003-2004', 'B', 'Active'),
(191, 2003331060, 'A.M. Fazleh Rabbee', '3f6b2ac8', '', '2003-2004', 'B', 'Active'),
(192, 2003331062, 'Tusar Majumder', 'e886d62a', '', '2003-2004', 'B', 'Active'),
(193, 2003331066, 'Khandakar Shohad Al Mamun', 'c9aaae41', '', '2003-2004', 'B', 'Active'),
(194, 2003331068, 'Md. Shafiul Alam', '04357591', '', '2003-2004', 'B', 'Active'),
(195, 2003331070, 'Suronjit Chakraborty', '2b175602', '', '2003-2004', 'B', 'Active'),
(196, 2003331074, 'Md.Kamal Hossain', '32cf8d9f', '', '2003-2004', 'B', 'Active'),
(197, 2003331076, 'S. M. Hasanul Banna', '391ac915', '', '2003-2004', 'B', 'Active'),
(198, 2003331078, 'Quazi Wahiduzzaman', 'a3a024cb', '', '2003-2004', 'B', 'Active'),
(199, 2003331080, 'Rupak Das', 'c697e3d1', '', '2003-2004', 'B', 'Active'),
(200, 2003331082, 'Md. Taiful Islam Khan', '7bdc9894', '', '2003-2004', 'B', 'Active'),
(201, 2003331084, 'Munmun Shampath Barua', '15a7d986', '', '2003-2004', 'B', 'Active'),
(202, 2003331086, 'Nilufar Easmin', '89dea29e', '', '2003-2004', 'B', 'Active'),
(203, 2003331088, 'Mizanur Rahman', '2dae270d', '', '2003-2004', 'B', 'Active'),
(204, 2003331090, 'Mahmudul Hasan', '8cef2660', '', '2003-2004', 'B', 'Active'),
(205, 2003331092, 'Kazi Amena Begum', 'f6d22037', '', '2003-2004', 'B', 'Active'),
(206, 2003331094, 'A.F.M. Shahreyar Faheem', '946c0bf4', '', '2003-2004', 'B', 'Active'),
(207, 2003331098, 'Md. Iman Ali', 'f4e2b056', '', '2003-2004', 'B', 'Active'),
(208, 2003331100, 'Md Mahbub Sadique', '6276c5a7', '', '2003-2004', 'B', 'Active'),
(209, 2003331102, 'Md. Jabrul Islam', 'ab3ccfc4', '', '2003-2004', 'B', 'Active'),
(210, 2003331104, 'Sarker Monojit Asish', 'af6af8bf', '', '2003-2004', 'B', 'Active'),
(211, 2003331106, 'Dil Afroza', '505409a0', '', '2003-2004', 'B', 'Active'),
(212, 2003331108, 'Md. Mokammal Hossain', '54055fa0', '', '2003-2004', 'B', 'Active'),
(213, 2003331110, 'Rintu Kumar Chowdhury', '2f0eda52', '', '2003-2004', 'B', 'Active'),
(214, 2003331112, 'Md. Rasel Rana', '846dccf3', '', '2003-2004', 'B', 'Active'),
(215, 2003331116, 'Md Nazim Shahid Khan', '0b018814', '', '2003-2004', 'B', 'Active'),
(216, 2003331118, 'Shah Md. Nazmul Huda Shahed', '5abc93ef', '', '2003-2004', 'B', 'Active'),
(266, 2003331032, 'Tariq M Nasim', 'cb07211e', '', '2004-2005', 'B', 'Active'),
(218, 2004331001, 'Sabir  Ismail', '58d7d0cf', '', '2004-2005', 'A', 'Active'),
(219, 2004331003, 'Arif Ahmad', '2b90474e', '', '2004-2005', 'A', 'Inactive'),
(220, 2004331005, 'Abul  Hasnat  Azad', 'a990b586', '', '2004-2005', 'A', 'Inactive'),
(221, 2004331007, 'Mahjabeen Akter', 'c095d6b3', '', '2004-2005', 'A', 'Active'),
(222, 2004331009, 'Bidhan Biswas', '6904dac4', '', '2004-2005', 'A', 'Active'),
(223, 2004331011, 'Md. Masud Rana', '88c2c3bc', '', '2004-2005', 'A', 'Active'),
(224, 2004331015, 'Md. Kamrul Hasan', '780d9a70', '', '2004-2005', 'A', 'Active'),
(225, 2004331017, 'SHUMON', 'b9470fec', '|3|', '2004-2005', 'A', 'Active'),
(226, 2004331019, 'Md. Sanin Hashem', '695ffb33', '', '2004-2005', 'A', 'Active'),
(227, 2004331021, 'Alamgir Kabir', 'ee02e242', '', '2004-2005', 'A', 'Active'),
(228, 2004331023, 'Md. Zahid Hasan', '98e61146', '', '2004-2005', 'A', 'Active'),
(229, 2004331025, 'A.F.M Saifuddin Saif', '445efcea', '', '2004-2005', 'A', 'Active'),
(230, 2004331027, 'Abu Haider Siddiq', '9e2e2fc8', '', '2004-2005', 'A', 'Active'),
(231, 2004331029, 'Mehedi Hasan', '357b6747', '', '2004-2005', 'A', 'Active'),
(232, 2004331031, 'Pranab Mitra', '550712e9', '', '2004-2005', 'A', 'Active'),
(233, 2004331033, 'Md. Ahsan Habib Rocky', 'b8a209fa', '', '2004-2005', 'A', 'Active'),
(234, 2004331035, 'Md. Abdullah Al Bake', '07ccd3a0', '', '2004-2005', 'A', 'Active'),
(235, 2004331037, 'Rajib Bhowmik', 'ebdb0f18', '', '2004-2005', 'A', 'Active'),
(236, 2004331039, 'Farhan Abdullah Shahnewaz', 'f9cec9da', '', '2004-2005', 'A', 'Active'),
(237, 2004331041, 'Zannatun Nayeem', '64f681da', '', '2004-2005', 'A', 'Active'),
(238, 2004331043, 'JEMI', '5f22da7b', '|5|', '2004-2005', 'A', 'Active'),
(239, 2004331045, 'Devojyoti Aich', '6f81a79f', '', '2004-2005', 'A', 'Active'),
(240, 2004331047, 'Tohurun Shewly', '5f0d57dc', '', '2004-2005', 'A', 'Active'),
(241, 2004331049, 'Md. Mohiuddin', '6823d539', '', '2004-2005', 'A', 'Active'),
(242, 2004331051, 'Mohammed Najim-ul-Goni', '7989eeca', '', '2004-2005', 'A', 'Inactive'),
(243, 2004331053, 'K. M. Shajedul Alam', '3e0ee0f0', '', '2004-2005', 'A', 'Active'),
(244, 2004331055, 'Md. Ziaur Rahman', '4e6681c6', '', '2004-2005', 'A', 'Active'),
(245, 2004331057, 'Md. Arifur Rahman', '42ad438d', '', '2004-2005', 'A', 'Active'),
(246, 2004331059, 'Md. Moniruzzaman', '76ce2502', '', '2004-2005', 'A', 'Active'),
(247, 2004331061, 'Rokshana Jahan', 'bd0065e2', '', '2004-2005', 'A', 'Active'),
(248, 2004331063, 'Dipok Kumer Mondal', '15f316c0', '', '2004-2005', 'A', 'Active'),
(249, 2004331065, 'Nazmon Nahar', 'b890f0db', '', '2004-2005', 'A', 'Active'),
(250, 2004331067, 'Md. Murshid Sarker', '01ca07cc', '', '2004-2005', 'A', 'Active'),
(251, 2004331069, 'Kazi Moinul Hossain', 'd9819a5c', '', '2004-2005', 'A', 'Active'),
(252, 2004331071, 'Sajadur Rahman Khan', '247bfbe4', '', '2004-2005', 'A', 'Active'),
(253, 2004331073, 'Md.Mamunur Rashid', '91b1d12c', '', '2004-2005', 'A', 'Active'),
(254, 2004331075, 'Mohammad Mahmodul Hasan', '6037315b', '', '2004-2005', 'A', 'Active'),
(255, 2004331077, 'Md. Abdus Salam', '407af412', '', '2004-2005', 'A', 'Active'),
(256, 2004331079, 'Md. Shafiqul Islam', '9ca3fb50', '', '2004-2005', 'A', 'Active'),
(257, 2004331081, 'Sahidul Hassan', 'c83d1db8', '', '2004-2005', 'A', 'Active'),
(258, 2004331083, 'Md. Habibur Rahman', '1904a4b9', '', '2004-2005', 'A', 'Active'),
(259, 2004331085, 'Ruby Paul', 'a8ae84c0', '', '2004-2005', 'A', 'Active'),
(260, 2004331087, 'Md. Kamrul Islam', 'bc5c7b6a', '', '2004-2005', 'A', 'Active'),
(261, 2004331089, 'Kazi Md. Masud Kysher', '1ba24a24', '', '2004-2005', 'A', 'Active'),
(262, 2004331093, 'Md. Zubayer Ahmed', '732d62d2', '', '2004-2005', 'A', 'Active'),
(263, 2004331095, 'Md.Monirul Islam', '55a15474', '', '2004-2005', 'A', 'Active'),
(264, 2004331097, 'Ziaul Hasan Kibriya', '431dcfc2', '', '2004-2005', 'A', 'Active'),
(265, 2004331099, 'Md.Al Amin Sarkar', '52f560f6', '', '2004-2005', 'A', 'Active'),
(267, 2003331048, 'Prioranjan Chowdhury', '223f2e54', '', '2004-2005', 'B', 'Active'),
(268, 2003331050, 'Md. Farhad Miah', '1d152ae0', '', '2004-2005', 'B', 'Active'),
(269, 2003331064, 'Avijit Saha', 'ef6459e5', '', '2004-2005', 'B', 'Active'),
(270, 2003331120, 'Md. Samiul Alim', '530ed823', '', '2004-2005', 'B', 'Active'),
(271, 2004331002, 'Abu Naser', '9ce6000b', '', '2004-2005', 'B', 'Active'),
(272, 2004331004, 'Tamal  Kanti Ghose', '1a2f8bb9', '', '2004-2005', 'B', 'Active'),
(273, 2004331006, 'Abul   Kashem', '8f4a98e9', '', '2004-2005', 'B', 'Active'),
(274, 2004331008, 'Tasnim Zahan', '134ee08e', '', '2004-2005', 'B', 'Active'),
(275, 2004331010, 'MOHIT', 'a5edd06f', '|4|', '2004-2005', 'B', 'Active'),
(276, 2004331012, 'Md. Zia Uddin', '0851614c', '', '2004-2005', 'B', 'Active'),
(277, 2004331016, 'Amio Kumar Pramanik', '6cedbbea', '', '2004-2005', 'B', 'Active'),
(278, 2004331020, 'Mariom Jamila Chowdhury', '216d7fd6', '', '2004-2005', 'B', 'Active'),
(279, 2004331022, 'Shailen Chandra Das', '4a01877c', '', '2004-2005', 'B', 'Active'),
(280, 2004331024, 'Shibbir Ahmed', '9139490b', '', '2004-2005', 'B', 'Active'),
(281, 2004331026, 'Md. Rakibul Alam Khan', 'efea445c', '', '2004-2005', 'B', 'Active'),
(282, 2004331028, 'Abu Zahed Zani', 'b28aaf33', '', '2004-2005', 'B', 'Active'),
(283, 2004331030, 'Anup Biswas', '4bb6e5d7', '', '2004-2005', 'B', 'Active'),
(284, 2004331032, 'Kazi  Mehedi Hasan', 'a8f847bc', '', '2004-2005', 'B', 'Active'),
(285, 2004331034, 'Sheikh Khaleduzzaman Shah', '9b5bf792', '', '2004-2005', 'B', 'Active'),
(286, 2004331036, 'Md. Alauddin Mojumder', 'e73cb0ad', '', '2004-2005', 'B', 'Active'),
(287, 2004331038, 'Md. Syduzzaman', 'e86985b6', '', '2004-2005', 'B', 'Active'),
(288, 2004331040, 'Pritam Jyoti Ray', '1bbb72d7', '', '2004-2005', 'B', 'Active'),
(289, 2004331044, 'Ghori Najmun Nahar Holy', 'a91011e4', '', '2004-2005', 'B', 'Active'),
(290, 2004331046, 'Md. Easa  Mollah', '74afdaf7', '', '2004-2005', 'B', 'Inactive'),
(291, 2004331048, 'Abu Sayem Chowdhury', 'a36e07ab', '', '2004-2005', 'B', 'Active'),
(292, 2004331050, 'Zilhaz Jalal Chy.', 'cec8eaf0', '', '2004-2005', 'B', 'Inactive'),
(293, 2004331052, 'Mahbubur Rob Talha', 'c18bdd9f', '', '2004-2005', 'B', 'Active'),
(294, 2004331054, 'Wahidul Islam', '636a180d', '', '2004-2005', 'B', 'Active'),
(295, 2004331056, 'Md.  Faysal Osmany', '290efe6a', '', '2004-2005', 'B', 'Active'),
(296, 2004331058, 'Md. Robin Hossain', 'b69b13ec', '', '2004-2005', 'B', 'Active'),
(297, 2004331060, 'Md. Shawon Mahmud', 'ffeae2b1', '', '2004-2005', 'B', 'Active'),
(298, 2004331062, 'Md. Kawsar Al-Amin', 'a7ecaca9', '', '2004-2005', 'B', 'Active'),
(299, 2004331064, 'Plabon Modak', 'f9820b06', '', '2004-2005', 'B', 'Active'),
(300, 2004331066, 'Md. Kamal Uddin', 'a5088bf0', '', '2004-2005', 'B', 'Active'),
(301, 2004331068, 'Md. Raahsalah Salak', '2a7413f2', '', '2004-2005', 'B', 'Active'),
(302, 2004331070, 'Md. Mahbub Alam Khan', 'ed6c471e', '', '2004-2005', 'B', 'Active'),
(303, 2004331072, 'Md. Kamran Ahmed', 'fe21739a', '', '2004-2005', 'B', 'Active'),
(304, 2004331074, 'Munsy Md. Abu Hasan', '83a740eb', '', '2004-2005', 'B', 'Active'),
(305, 2004331076, 'Nosrat Sharmin Mouri', '06a34e4f', '', '2004-2005', 'B', 'Inactive'),
(306, 2004331078, 'Shaydul Haque Mihir', '7a5d3525', '', '2004-2005', 'B', 'Active'),
(307, 2004331080, 'Merina Jahan Dipti', '721b39bf', '', '2004-2005', 'B', 'Active'),
(308, 2004331082, 'Munsy Md. Misbah Uddin', '8031764b', '', '2004-2005', 'B', 'Active'),
(309, 2004331084, 'Goutom Roy', 'beea2c6d', '', '2004-2005', 'B', 'Active'),
(310, 2004331086, 'Md. Assaduzzaman Khan', 'e597772e', '', '2004-2005', 'B', 'Active'),
(311, 2004331088, 'A. S. M. Sayem', 'd9a7d3c1', '', '2004-2005', 'B', 'Active'),
(312, 2004331090, 'Abu Sadat Mohammad Sayem', 'dff444a1', '', '2004-2005', 'B', 'Active'),
(313, 2004331094, 'Imtiaz Ahmed', 'c3437979', '', '2004-2005', 'B', 'Active'),
(314, 2004331096, 'Md .Nimul Hasnat', '1ee383d7', '', '2004-2005', 'B', 'Active'),
(315, 2004331098, 'S.M. Irfanur Rahman', '48f74285', '', '2004-2005', 'B', 'Active'),
(316, 2004331100, 'Md. Khaliful Islam', '7aac0024', '', '2004-2005', 'B', 'Active'),
(317, 2005331001, 'Iftekhar Uddin Ahmed', 'b8b073d6', '', '2005-2006', 'A', 'Active'),
(318, 2005331003, 'Sohel Sorwar', 'baf5f603', '', '2005-2006', 'A', 'Active'),
(319, 2005331005, 'Sanchita Talukder Adm: Cancelled', '27dfe63f', '', '2005-2006', 'A', 'Active'),
(320, 2005331007, 'Mahjabin Rahman', 'd610b998', '', '2005-2006', 'A', 'Active'),
(321, 2005331009, 'Md. Belayet Hossain', 'd292ef8a', '', '2005-2006', 'A', 'Active'),
(322, 2005331011, 'Md. Rezwanul Islam', '510a7c2c', '', '2005-2006', 'A', 'Active'),
(323, 2005331013, 'Saikat Ray Tapu', 'b56b2e79', '', '2005-2006', 'A', 'Active'),
(324, 2005331017, 'Md. Mejbahul Alam', '0d1c2f76', '', '2005-2006', 'A', 'Active'),
(325, 2005331019, 'Md. Shahidullah-Al-Maruf', 'f1a53cf0', '', '2005-2006', 'A', 'Active'),
(326, 2005331021, 'Noni Gopal Sutradhar', '7a657efc', '', '2005-2006', 'A', 'Active'),
(327, 2005331023, 'Amitav Dev', '4650168c', '', '2005-2006', 'A', 'Active'),
(328, 2005331025, 'Shaikh Nazmul Hasan', 'e63aa758', '', '2005-2006', 'A', 'Active'),
(329, 2005331027, 'Hasan Md. Sabbir Hossain', '798e9a5d', '', '2005-2006', 'A', 'Active'),
(330, 2005331029, 'Miraz Mahmud', '92c2940f', '', '2005-2006', 'A', 'Active'),
(331, 2005331031, 'Mashruf Zaman Chowdhury', '88be941f', '', '2005-2006', 'A', 'Active'),
(332, 2005331033, 'Nusrat Jahan Bhuyan', 'f7c57146', '', '2005-2006', 'A', 'Active'),
(333, 2005331035, 'Shakera Mamun Chowdhury', '9eab8994', '', '2005-2006', 'A', 'Active'),
(334, 2005331037, 'Syed Modasser Hossain', 'b8c491dc', '', '2005-2006', 'A', 'Active'),
(335, 2005331039, 'Md. Asef Jamal', 'f20e0a1b', '', '2005-2006', 'A', 'Active'),
(336, 2005331041, 'Anindya Bhowmik', '876b604d', '', '2005-2006', 'A', 'Active'),
(337, 2005331043, 'Md. Mahbubur Rahman', 'bcee8fba', '', '2005-2006', 'A', 'Active'),
(338, 2005331045, 'Zabir Haider Khan', 'b845d5dd', '', '2005-2006', 'A', 'Active'),
(339, 2005331047, 'Md. Rafiur Rahman', 'ccfd3d35', '', '2005-2006', 'A', 'Active'),
(340, 2005331049, 'Tahmim Ahmed Shibli', 'e1cb61c4', '', '2005-2006', 'A', 'Active'),
(341, 2005331051, 'Md. Mahmudul Hasan', 'ff8a6687', '', '2005-2006', 'A', 'Active'),
(342, 2005331053, 'Md. Mahfuz Rahman', '8abf7301', '', '2005-2006', 'A', 'Active'),
(343, 2005331055, 'Md. Shakurul Islam Sarder', '0086ed65', '', '2005-2006', 'A', 'Active'),
(344, 2005331057, 'Farzana Jalil', '1f2a25ae', '', '2005-2006', 'A', 'Active'),
(345, 2005331059, 'Ahsanullah Siddiqi', 'a4814ae3', '', '2005-2006', 'A', 'Active'),
(346, 2005331061, 'Dilruba Afruz', '6f7735d1', '', '2005-2006', 'A', 'Active'),
(347, 2005331063, 'Sajal Miah', '12c15e56', '', '2005-2006', 'A', 'Active'),
(348, 2005331065, 'Md. Burhan Uddin', 'f0751a2c', '', '2005-2006', 'A', 'Active'),
(349, 2005331067, 'Sourav Kumar Ghosh', 'd62de281', '', '2005-2006', 'A', 'Active'),
(350, 2005331069, 'Joy Prakash', '7b94d86d', '', '2005-2006', 'A', 'Active'),
(351, 2005331071, 'Shumaya Hay Chowdhury', 'ef349145', '', '2005-2006', 'A', 'Active'),
(352, 2005331073, 'Md. Shariful Islam', '552c6f18', '', '2005-2006', 'A', 'Active'),
(353, 2005331075, 'Rakib Jahan Khan', '9e3a1687', '', '2005-2006', 'A', 'Active'),
(354, 2005331077, 'Mohammed Hasanul Awal Maruf', '2d74f3e7', '', '2005-2006', 'A', 'Active'),
(355, 2005331079, 'A. F. M. Jamal Uddin', 'c9fd6c3f', '', '2005-2006', 'A', 'Active'),
(356, 2005331081, 'Md. Shakat Hossain Tanvir', '0703a39c', '', '2005-2006', 'A', 'Active'),
(357, 2005331083, 'Bappi Datta', '29fadd0a', '', '2005-2006', 'A', 'Active'),
(358, 2005331085, 'Dhapukor Majumdar', 'bcd417d9', '', '2005-2006', 'A', 'Active'),
(359, 2005331087, 'Md. Obaydul Hoque', '6edc9e42', '', '2005-2006', 'A', 'Active'),
(360, 2005331089, 'S. M. Kajemul Hoque Kajem', '3f5484b9', '', '2005-2006', 'A', 'Active'),
(361, 2005331091, 'Md. Shiful Islam', '0134b641', '', '2005-2006', 'A', 'Active'),
(362, 2005331093, 'Md. Farhad Kabir', '2d00de73', '', '2005-2006', 'A', 'Active'),
(363, 2005331095, 'Md. Shahanur Rahman', 'f5d4038e', '', '2005-2006', 'A', 'Active'),
(364, 2005331097, 'Nazmus Sadat Tanmoy', '1379d819', '', '2005-2006', 'A', 'Active'),
(365, 2005331002, 'Sadi Ul Huqq Sadi', '3045eed2', '', '2005-2006', 'B', 'Inactive'),
(366, 2005331004, 'Md. Mahmudul Haque', '07500c87', '', '2005-2006', 'B', 'Active'),
(367, 2005331006, 'Zahiruddin Ahmed Chisty', '5170e909', '', '2005-2006', 'B', 'Active'),
(368, 2005331008, 'Md. Hasibus Saquib', 'a26c6457', '', '2005-2006', 'B', 'Active'),
(369, 2005331010, 'Md. Eamin Rahman', '0e604b98', '', '2005-2006', 'B', 'Active'),
(370, 2005331012, 'Chinmoy Debnath', '16b50e63', '', '2005-2006', 'B', 'Active'),
(371, 2005331014, 'Zahidul Islam', '522c231e', '', '2005-2006', 'B', 'Active'),
(372, 2005331016, 'Mehafuz Mannan Rajon', 'b35fd92e', '', '2005-2006', 'B', 'Active'),
(373, 2005331018, 'Md. Rafiquzzaman', 'bbc879f5', '', '2006-2007', 'B', 'Active'),
(374, 2005331020, 'Nafisa Shams', '6a1f38cf', '', '2005-2006', 'B', 'Active'),
(375, 2005331022, 'Md. Saifur Rahman (Ad: Cancelled)', 'b5d4360f', '', '2005-2006', 'B', 'Active'),
(376, 2005331024, 'Md. Touhidul Islam', 'fc93f1c3', '', '2005-2006', 'B', 'Active'),
(377, 2005331026, 'Md. Sazedul Karim', '71b08a1b', '', '2005-2006', 'B', 'Active'),
(378, 2005331028, 'Md. Faysal Kabir', 'f8e736d3', '', '2005-2006', 'B', 'Active'),
(379, 2005331030, 'Mithila Mishu', '633a8053', '', '2005-2006', 'B', 'Active'),
(380, 2005331032, 'Md. Nazmul Hosain', '49fa509d', '', '2005-2006', 'B', 'Active'),
(381, 2005331034, 'Md. Minhajul Haque Bhuiyan', 'e2c8c86b', '', '2005-2006', 'B', 'Active'),
(382, 2005331036, 'Mousumi Islam', '155b9051', '', '2005-2006', 'B', 'Active'),
(383, 2005331038, 'Md. Sayed Hassan', '4a5711ae', '', '2005-2006', 'B', 'Inactive'),
(384, 2005331040, 'Nikson Kanti Paul', '5c7dc649', '', '2005-2006', 'B', 'Active'),
(385, 2005331042, 'Md. Mizanur Rahman', 'e04bb3d3', '', '2005-2006', 'B', 'Active'),
(386, 2005331044, 'Taslima Kabir', '34cacd50', '', '2005-2006', 'B', 'Active'),
(387, 2005331046, 'Mahmudul Hassan', '77b6f86e', '', '2005-2006', 'B', 'Active'),
(388, 2005331048, 'Md. Jakir Hossain', 'bbcbc812', '', '2005-2006', 'B', 'Active'),
(389, 2005331050, 'Tasriva Skandar', 'f2dc15ba', '', '2005-2006', 'B', 'Active'),
(390, 2005331052, 'Md. Jahid Hasan', 'b0fdda21', '', '2005-2006', 'B', 'Active'),
(391, 2005331054, 'Abdullah Sunny', 'c202237c', '', '2005-2006', 'B', 'Active'),
(392, 2005331056, 'Md. Yeasin Hossain', 'dab32556', '', '2005-2006', 'B', 'Active'),
(393, 2005331058, 'Md. Ziauddin Tanvir', 'd3e510fd', '', '2005-2006', 'B', 'Active'),
(394, 2005331060, 'Sunjana Islam', '04607873', '', '2005-2006', 'B', 'Active'),
(395, 2005331062, 'Farzana Easmin Hoque', '081eb71f', '', '2005-2006', 'B', 'Active'),
(396, 2005331064, 'Anick Chowdhury', 'ea2d782f', '', '2005-2006', 'B', 'Active'),
(397, 2005331066, 'R. P. Jarin', 'e1591f0e', '', '2005-2006', 'B', 'Active'),
(398, 2005331068, 'Rakib Ishrak', '859f6191', '', '2005-2006', 'B', 'Active'),
(399, 2005331070, 'K. H. M. Burhan Uddin', '5d2f8ded', '', '2005-2006', 'B', 'Active'),
(400, 2005331072, 'Md. Reazul Hoque', 'cd71d842', '', '2005-2006', 'B', 'Active'),
(401, 2005331074, 'Md. Shiful Islam', 'b3656037', '', '2006-2007', 'B', 'Active'),
(402, 2005331076, 'Subrina Sultana', '42fbe04c', '', '2005-2006', 'B', 'Active'),
(403, 2005331078, 'Mst. Nasrin Jahan', 'cd9ef86c', '', '2005-2006', 'B', 'Active'),
(404, 2005331080, 'Muhammad Shiydur Rahman', 'a1a0fff8', '', '2006-2007', 'B', 'Active'),
(405, 2005331082, 'Md. Abdus Salam', '6a36583d', '', '2005-2006', 'B', 'Active'),
(406, 2005331084, 'Md. Arif Mainuddin', '290a034b', '', '2005-2006', 'B', 'Active'),
(407, 2005331088, 'Roshon Ara', 'b8777c44', '', '2005-2006', 'B', 'Active'),
(408, 2005331090, 'Md. Ashikur Rahman', 'afbcbfca', '', '2005-2006', 'B', 'Active'),
(409, 2005331092, 'Tahrima Hoque', 'f73506ea', '', '2005-2006', 'B', 'Active'),
(410, 2005331094, 'Tasnim Sharmin Alin', '45e59b7b', '', '2005-2006', 'B', 'Active'),
(411, 2005331096, 'Md. Imran Hasan', '8537a324', '', '2005-2006', 'B', 'Active'),
(412, 2005331098, 'Md. Hasib Hasan Tarfder', '7032c35c', '', '2005-2006', 'B', 'Active'),
(413, 2005331099, 'Mohammad Wasiuzzaman Shoham', '09f1f3ce', '', '2005-2006', 'B', 'Active'),
(414, 2005331100, 'Md. Tauseef Al Noor', 'c4907618', '', '2005-2006', 'B', 'Active'),
(415, 2005331102, 'Meisam Hasan Mahin', '4fb445a9', '', '2005-2006', 'B', 'Active'),
(416, 2006331001, 'Mohammad Sazzadul Hoque', '60d81d9a', '', '2006-2007', 'A', 'Active'),
(417, 2006331003, 'Bushra Ali', '7d9b3a25', '', '2006-2007', 'A', 'Inactive'),
(418, 2006331005, 'Farhannjamill', '7518bd79', '', '2006-2007', 'A', 'Inactive'),
(419, 2006331007, 'Md. Bulbul Islam', '60f34b1e', '', '2006-2007', 'A', 'Inactive'),
(420, 2006331009, 'Ashif Mohammad Iqbal', 'd9372527', '', '2006-2007', 'A', 'Active'),
(421, 2006331011, 'Bijan Paul', 'b17c2926', '', '2006-2007', 'A', 'Active'),
(422, 2006331013, 'Ashraful Imam Bhuiya', '40c527f6', '', '2006-2007', 'A', 'Inactive'),
(423, 2006331015, 'Md. Ruhul Amin', 'b3056326', '', '2006-2007', 'A', 'Active'),
(424, 2006331017, 'Farjana Yeasmin Omee', '760ff453', '', '2006-2007', 'A', 'Active'),
(425, 2006331019, 'Nadera Sultana Tany', '24940541', '', '2006-2007', 'A', 'Active'),
(426, 2006331021, 'Anupam Deb', 'b29024aa', '', '2006-2007', 'A', 'Active'),
(427, 2006331023, 'Sudeepta Biswas', '31136bd6', '', '2006-2007', 'A', 'Active'),
(428, 2006331025, 'Md. Nafiul Alam', '52834376', '', '2006-2007', 'A', 'Active'),
(430, 2006331029, 'Farzana Hoque', '2baf17f2', '', '2006-2007', 'A', 'Active'),
(431, 2006331031, 'Fatema Mahbub', '0e4c258e', '', '2006-2007', 'A', 'Active'),
(432, 2006331033, 'Tahlil Ahmed Chowdhury', '2b32c36a', '', '2006-2007', 'A', 'Active'),
(433, 2006331035, 'Parvej Ahmed Chowdhury', 'a6ad01fa', '', '2006-2007', 'A', 'Active'),
(434, 2006331037, 'Shamima Nasrin', 'cb793e16', '', '2006-2007', 'A', 'Active'),
(435, 2006331039, 'Any Acharjee', 'b0d3e103', '', '2006-2007', 'A', 'Active'),
(436, 2006331041, 'A. M. S. Rezuan', 'bfcfb84c', '', '2007-2008', 'A', 'Active'),
(437, 2006331043, 'Md.Jahangir Alam', '8855eae9', '', '2006-2007', 'A', 'Active'),
(438, 2006331045, 'Israt Jahan', 'aae321a0', '', '2006-2007', 'A', 'Active'),
(439, 2006331047, 'Minhaj Uddin Ahmed', '0bab384e', '', '2008-2009', 'A', 'Active'),
(440, 2006331049, 'Samsoon Nahar Tarin', '4999eee3', '', '2006-2007', 'A', 'Active'),
(441, 2006331051, 'Ayesha Akter', '29691510', '', '2006-2007', 'A', 'Active'),
(442, 2006331053, 'Md.Ibrahim', 'b918e50a', '', '2006-2007', 'A', 'Active'),
(443, 2006331055, 'Md. Mahedi Hasan', '4ee4ce1b', '', '2006-2007', 'A', 'Active'),
(444, 2006331057, 'Bokhtiar Mehedy', 'dc568618', '', '2006-2007', 'A', 'Active'),
(445, 2006331059, 'Asie Uzzaman', 'f61d9e68', '', '2007-2008', 'A', 'Active'),
(446, 2006331061, 'A.K.M. Fakhruddin Mahamud', '14d0c73f', '', '2006-2007', 'A', 'Active'),
(447, 2006331063, 'S. M. Shaon', 'f7229269', '', '2006-2007', 'A', 'Active'),
(448, 2006331065, 'Jannatul Ferdoushi Begum', '737209ff', '', '2006-2007', 'A', 'Active'),
(449, 2006331067, 'A.F.M. Nazmus Sakib', 'a452c2f6', '', '2006-2007', 'A', 'Active'),
(450, 2006331069, 'Faisal Ahamed Khan', '0413d15e', '', '2006-2007', 'A', 'Active'),
(451, 2006331071, 'Avijit Dey', '71cf274a', '', '2006-2007', 'A', 'Active'),
(452, 2006331073, 'Noor Mohammad', '1e86a3ef', '', '2006-2007', 'A', 'Active'),
(453, 2006331075, 'Md. Saleh Imran', 'f47097ff', '', '2006-2007', 'A', 'Active'),
(454, 2006331077, 'Md. Shiam Shabbir', '429be850', '', '2006-2007', 'A', 'Active'),
(455, 2006331079, 'Md. Rashed Azad Chowdhury', 'dfa6e2e0', '', '2006-2007', 'A', 'Active'),
(456, 2006331081, 'Lucky Sutradhar', '4c574b97', '', '2006-2007', 'A', 'Active'),
(457, 2006331083, 'Uzzal Khan', '393f53ed', '', '2006-2007', 'A', 'Active'),
(458, 2006331085, 'Abu Jubair Panir', 'c7c5fdf9', '', '2006-2007', 'A', 'Active'),
(459, 2006331087, 'Md. Jashim Uddin', 'e9b4c16c', '', '2006-2007', 'A', 'Active'),
(460, 2006331089, 'Supran Jowti Dasgupta', '1c3e1ce8', '', '2006-2007', 'A', 'Active'),
(461, 2006331091, 'Md. Liton Miah', '91350113', '', '2006-2007', 'A', 'Active'),
(462, 2006331093, 'Abdullah Al Hasib', 'a61b0036', '', '2006-2007', 'A', 'Active'),
(463, 2006331095, 'Rahnuma Nurain Islam', 'f5a1b52c', '', '2006-2007', 'A', 'Active'),
(464, 2006331097, 'Md. Riyad Bin Zaman', 'a82f3772', '', '2006-2007', 'A', 'Active'),
(465, 2006331099, 'Sushanta Shekhor Das', '695603ee', '', '2006-2007', 'A', 'Active'),
(466, 2006331101, 'Aditi Roy', '8014225a', '', '2006-2007', 'A', 'Active'),
(467, 2006331103, 'Md. Saiful Islam', '292f399b', '', '2006-2007', 'A', 'Active'),
(468, 2006331105, 'Ahmad Shabibul Hossain', 'bc405b8e', '', '2006-2007', 'A', 'Active'),
(469, 2006331002, 'Naima Ahmed Fahmi', '532cec66', '', '2006-2007', 'B', 'Active'),
(470, 2006331004, 'Sheikh Nabil Mohammad', '96d83a7c', '', '2006-2007', 'B', 'Active'),
(471, 2006331006, 'Sutapa Talukdar', 'e0ef7574', '', '2006-2007', 'B', 'Inactive'),
(472, 2006331008, 'Sharif Abdullah Rifat', '0c5ff2f1', '', '2006-2007', 'B', 'Active'),
(473, 2006331010, 'Nondini Das Misti', '7050b3dc', '', '2006-2007', 'B', 'Active'),
(474, 2006331012, 'Sujan Ray', '37baaf2d', '', '2006-2007', 'B', 'Active'),
(475, 2006331014, 'Marjia Chowdhury', '01cb7296', '', '2006-2007', 'B', 'Active'),
(476, 2006331016, 'Prodip Sarkar', '1f6736df', '', '2006-2007', 'B', 'Active'),
(477, 2006331018, 'Syeda Tamanna Rahman', '42c993b5', '', '2006-2007', 'B', 'Active'),
(478, 2006331020, 'Istiaque Ahmed', '723b0612', '', '2006-2007', 'B', 'Active'),
(479, 2006331022, 'Luscious Larry Das', 'bf2e0264', '', '2006-2007', 'B', 'Active'),
(480, 2006331024, 'Dibya Jyoti Pramanik', 'b50ca67c', '', '2006-2007', 'B', 'Active'),
(481, 2006331026, 'Kazi Abu Sayed', '796ea78f', '', '2006-2007', 'B', 'Active'),
(482, 2006331028, 'Shyantika Halder', 'f6d65d75', '', '2006-2007', 'B', 'Inactive'),
(483, 2006331030, 'Sourav Bhattacharjee', '8f435239', '', '2006-2007', 'B', 'Active'),
(484, 2006331032, 'Shah-Md.Muktedir-Ul-Alim', '0d396e3b', '', '2006-2007', 'B', 'Active'),
(485, 2006331034, 'Md. Sohel Ahmed', 'e2b52cfa', '', '2006-2007', 'B', 'Active'),
(486, 2006331036, 'Robel Sharma', '35f11468', '', '2006-2007', 'B', 'Active'),
(487, 2006331038, 'Aminul Islam', 'd09bda82', '', '2007-2008', 'A', 'Active'),
(488, 2006331040, 'Md. Asif Rahaman', 'd5811abc', '', '2006-2007', 'B', 'Active'),
(489, 2006331042, 'Mohammed Sabbir', '8e54cd13', '', '2006-2007', 'B', 'Active'),
(490, 2006331044, 'Raihan Jakaria', 'd73f47e3', '', '2006-2007', 'B', 'Active'),
(491, 2006331046, 'Md. Ershadur Rahman Tdr', '08392a0b', '', '2006-2007', 'B', 'Active'),
(492, 2006331048, 'S. M. Nusayer Hassan', '7c40d5d2', '', '2006-2007', 'B', 'Active'),
(493, 2006331050, 'S. M. Shahinul Islam', 'e46b2b9d', '', '2006-2007', 'B', 'Active'),
(494, 2006331052, 'Abir Chowdhury', '2ffbc04a', '', '2006-2007', 'B', 'Active'),
(495, 2006331054, 'Md.Shamir Adnan Omy', '932737ef', '', '2006-2007', 'B', 'Active'),
(496, 2006331056, 'Arnab Kaiyum Talukder', '367072ed', '', '2006-2007', 'B', 'Active'),
(497, 2006331058, 'Md.Abu Rayhan', 'd0cee7ab', '', '2006-2007', 'B', 'Active'),
(498, 2006331060, 'Asish Pal', 'b923e404', '', '2007-2008', 'A', 'Active'),
(499, 2006331062, 'Syeda Rosana Sultana', '7e7a4f36', '', '2006-2007', 'B', 'Active'),
(500, 2006331064, 'Kazi Tanveer Uddin', '76f28926', '', '2006-2007', 'B', 'Active'),
(501, 2006331066, 'Nadia Akbar Tumpa', '0a5bea0a', '', '2006-2007', 'B', 'Active'),
(502, 2006331070, 'Md. Saifur Rahman', '88a22401', '', '2006-2007', 'B', 'Active'),
(503, 2006331072, 'Jobair Hossen Shoman', 'd310d611', '', '2006-2007', 'B', 'Active'),
(504, 2006331074, 'A. K. M. Tufazzul', 'd4f96b5b', '', '2006-2007', 'B', 'Active'),
(505, 2006331076, 'Monojit Goon', '5b1dbae9', '', '2006-2007', 'B', 'Active'),
(506, 2006331078, 'Rubana Tasmin Tithi', '652d0ff5', '', '2006-2007', 'B', 'Active'),
(507, 2006331080, 'Shaira Hosne Afroz Chaity', '412f80d3', '', '2006-2007', 'B', 'Active'),
(508, 2006331082, 'Sanjoy Kumer Deb', 'c2c9d325', '', '2006-2007', 'B', 'Active'),
(509, 2006331084, 'Md. Ashfaquzzaman', '3f684585', '', '2006-2007', 'B', 'Active'),
(510, 2006331086, 'Md Nazmul Alam', 'f4f6bb9d', '', '2006-2007', 'B', 'Active'),
(511, 2006331088, 'Asish Ghosh', '181e2f9f', '', '2006-2007', 'B', 'Active'),
(512, 2006331090, 'Shahinoor Shahin', '001a8aa2', '', '2006-2007', 'B', 'Active'),
(513, 2006331092, 'Raman Karmakar', '398bed71', '', '2006-2007', 'B', 'Active'),
(514, 2006331094, 'Asif Mahmud', '3a8ff868', '', '2006-2007', 'B', 'Active'),
(515, 2006331096, 'Imran Zahid', 'ed81e806', '', '2006-2007', 'B', 'Active'),
(516, 2006331098, 'Pulak Roy', 'cb4d5eab', '', '2007-2008', 'A', 'Active'),
(517, 2006331100, 'Nisa Binta Kabir', '871b818a', '', '2006-2007', 'B', 'Active'),
(518, 2006331102, 'Shompa Ghosh', '0a6106bc', '', '2006-2007', 'B', 'Active'),
(519, 2006331104, 'Lucky Rani Dey', '63d8bb12', '', '2006-2007', 'B', 'Active'),
(520, 2006331106, 'Joy Dip Sen', '8da00838', '', '2006-2007', 'B', 'Inactive'),
(521, 2007331001, 'Md. Zulfiker Ali', 'abafc698', '', '2007-2008', 'A', 'Active'),
(522, 2007331002, 'Md Saad Salehin', '50dbb981', '', '2007-2008', 'A', 'Active'),
(523, 2007331003, 'Chandan Howlader', 'e97cf1e5', '', '2007-2008', 'A', 'Active'),
(524, 2007331004, 'Saurav Kumar Saha', 'b1a483a3', '', '2007-2008', 'A', 'Active'),
(525, 2007331005, 'Asif Mohammed Samir', 'f197192b', '', '2007-2008', 'A', 'Active'),
(526, 2007331006, 'Md. Maksud Hossain', '4088b984', '', '2007-2008', 'A', 'Active'),
(527, 2007331007, 'Arun Krisno Pal', '23ce0710', '', '2008-2009', 'A', 'Active'),
(528, 2007331008, 'Marium- E- Jannat', '634306dd', '', '2007-2008', 'A', 'Active'),
(529, 2007331009, 'Sayma Sultana Chowdhury', '3c04c114', '', '2007-2008', 'A', 'Active'),
(530, 2007331010, 'Zayeed Ahmed Chowdhury', 'e6f17a1c', '', '2007-2008', 'A', 'Active'),
(531, 2007331011, 'Arafat Rahman', 'ba5b39b3', '', '2007-2008', 'A', 'Active'),
(532, 2007331012, 'Fouzia Sultana', '83a74903', '', '2007-2008', 'A', 'Active'),
(533, 2007331014, 'Md Mahmudur Rahman', 'faaf05b2', '', '2007-2008', 'A', 'Active'),
(534, 2007331016, 'Tasnim Ahmed', 'c82860e2', '', '2007-2008', 'A', 'Active'),
(535, 2007331017, 'Baker Mohammad Anas', '57a547e9', '', '2007-2008', 'A', 'Active'),
(536, 2007331018, 'Dipankar Roy', '3d0c6379', '', '2007-2008', 'A', 'Active'),
(537, 2007331019, 'Sumit Chakrabarty', 'ec214a8d', '', '2007-2008', 'A', 'Active'),
(538, 2007331021, 'Madhusodan Chakraborty', '729d9d3b', '', '2007-2008', 'A', 'Active'),
(539, 2007331022, 'Fahad Ahmed', '92d84a51', '', '2007-2008', 'A', 'Active'),
(540, 2007331023, 'Md. Shahadat Hossain', 'e5f0fcf7', '', '2007-2008', 'A', 'Active'),
(541, 2007331024, 'Md. Mahfuzur Rahaman', '32a54a39', '', '2007-2008', 'A', 'Active'),
(542, 2007331026, 'Tanvir Hossain Khan', '3c8951b0', '', '2007-2008', 'A', 'Active'),
(543, 2007331027, 'Bhaskar Chowdhury Porag', '3a89be48', '', '2007-2008', 'A', 'Active'),
(544, 2007331028, 'Y.M.Rezwanul Mannaf', 'f19e7955', '', '2007-2008', 'A', 'Active'),
(545, 2007331030, 'Rezwan-Ul-Haque', 'fd66156d', '', '2007-2008', 'A', 'Active'),
(546, 2007331031, 'Md Asaduzzaman Khan', '541a8c27', '', '2007-2008', 'A', 'Active'),
(547, 2007331032, 'Shibbir Ahmed', '21cd970e', '', '2007-2008', 'A', 'Active'),
(548, 2007331033, 'Premangshu Biswas', 'cc14ea12', '', '2007-2008', 'A', 'Active'),
(549, 2007331034, 'Touhidul Islam Mannan', 'e84a941d', '', '2007-2008', 'A', 'Active'),
(550, 2007331035, 'Md. Rezaur Rahman', 'd11dabe2', '', '2007-2008', 'A', 'Active'),
(551, 2007331036, 'S. M. Nowshadur Rahaman', '22910fa1', '', '2007-2008', 'A', 'Active'),
(552, 2007331038, 'Md. Al-Amin Sarker', '73004169', '', '2007-2008', 'A', 'Active'),
(553, 2007331039, 'Md. Mokarrom Hossain', 'f665bf90', '', '2007-2008', 'A', 'Active'),
(554, 2007331040, 'Md. Rajibur Rahman Raju', 'd878fcd0', '', '2007-2008', 'A', 'Active'),
(555, 2007331042, 'Mohammad Emdadul Hoque', '4d14178d', '', '2007-2008', 'A', 'Active'),
(556, 2007331043, 'Md. Nazmul Hossain', 'd14c17b2', '', '2007-2008', 'A', 'Active'),
(557, 2007331044, 'Md. Zafar Ullah', '4c2bef6a', '', '2007-2008', 'A', 'Active'),
(558, 2007331045, 'Tasnim Haider Chaudhury', '9c4abb2c', '', '2007-2008', 'A', 'Active'),
(559, 2007331046, 'Sakib Mohammed Shamim', 'febcdb30', '', '2007-2008', 'A', 'Active'),
(560, 2007331047, 'Md. Nazmul Alam', '1de88b7f', '', '2008-2009', 'A', 'Active'),
(561, 2007331048, 'Md. Asif Amin', '16edbe6c', '', '2007-2008', 'A', 'Active'),
(562, 2007331050, 'Pinku Chandra Roy', 'e7478265', '', '2008-2009', 'A', 'Active'),
(563, 2007331052, 'Forhad Ahmed', '71a76bd5', '', '2007-2008', 'A', 'Active'),
(564, 2007331053, 'Asif Iqbal Sonet', '9389e0bc', '', '2007-2008', 'A', 'Active'),
(565, 2007331054, 'Roknuzzaman', '2edc12ec', '', '2007-2008', 'A', 'Active'),
(566, 2007331055, 'Md. Bokhtiar Rahman Rana', '0491d733', '', '2007-2008', 'A', 'Active'),
(567, 2007331056, 'Shoeab Ahmed', 'f02c542f', '', '2007-2008', 'A', 'Active'),
(568, 2007331057, 'Munira Akther', 'b66a4acb', '', '2007-2008', 'A', 'Active'),
(569, 2007331058, 'Omar Faruk Miah', '71e2ad33', '', '2007-2008', 'A', 'Active'),
(570, 2007331059, 'Ashfak Ahmed', '4a5e7072', '', '2007-2008', 'A', 'Active'),
(571, 2007331060, 'Dipon Roy', '893a74c8', '', '2007-2008', 'A', 'Active'),
(572, 2007331061, 'Dhamendra Dubey', 'ad94a4a7', '', '2007-2008', 'A', 'Active'),
(573, 2007331062, 'Ram Kishor Patel', '582fad37', '', '2007-2008', 'A', 'Active'),
(574, 2004331014, 'smrity', '085d6d9e', '', '2005-2006', 'A', 'Active'),
(575, 2005331101, 'dinesh', '08c803ee', '', '2005-2006', 'A', 'Active'),
(576, 2006331107, 'Bindeshwar', '4bcd555b', '', '2006-2007', 'A', 'Active'),
(577, 2008331066, 'Md. Tuhin Ahmed', 'f438bda6', '', '2009-2010', 'A', 'Active'),
(578, 2009331001, 'Syed Shahriar Manjur', '2ec886df', '', '2009-2010', 'A', 'Active'),
(579, 2009331002, 'Anisur Rahaman Sakib', '35ef4e83', '', '2009-2010', 'A', 'Active'),
(580, 2009331003, 'Saiful Islam', 'df23b7e3', '', '2009-2010', 'A', 'Active'),
(581, 2009331004, 'Safat Siddiqui', '4ff3d841', '', '2009-2010', 'A', 'Active'),
(582, 2009331005, 'Md. Asadur Rahman', '393cb3d1', '', '2009-2010', 'A', 'Active'),
(583, 2009331006, 'Imtiaz Shakit Siddique', 'e7538176', '', '2009-2010', 'A', 'Active'),
(584, 2009331007, 'Md. Shohel Rana', '62ed7f73', '', '2009-2010', 'A', 'Active'),
(585, 2009331008, 'Rajib Chandra Das', 'f4d7c712', '', '2009-2010', 'A', 'Active'),
(586, 2009331009, 'Mohammad Istiyak Hossain', '5347e93f', '', '2009-2010', 'A', 'Active'),
(587, 2009331010, 'Rabbyuzzaman Khan', '94405c14', '', '2009-2010', 'A', 'Active'),
(588, 2009331011, 'Md. Ruhul Amin', 'de1fe38c', '', '2009-2010', 'A', 'Active'),
(589, 2009331012, 'Md. Rashedul Hasan Safa', '3908cd63', '', '2009-2010', 'A', 'Active'),
(590, 2009331013, 'Priyam Pritim Paul', '01eeaa53', '', '2009-2010', 'A', 'Active'),
(591, 2009331014, 'Md. Akther Hossen Roni', '3e412242', '', '2009-2010', 'A', 'Active'),
(592, 2009331015, 'Ahsanul Kabir', '5df47c7f', '', '2009-2010', 'A', 'Active'),
(593, 2009331016, 'Tanveer Ahmed', '92d358df', '', '2009-2010', 'A', 'Active'),
(594, 2009331017, 'Farida Yeasmin Riva', '2f279c82', '', '2009-2010', 'A', 'Active'),
(595, 2009331018, 'Khondaker Rifat-E- Rahman', '36bc1bec', '', '2009-2010', 'A', 'Active'),
(596, 2009331019, 'Sanzida Yeasmin', '82a44345', '', '2009-2010', 'A', 'Active'),
(597, 2009331020, 'Md. Munif Hasan', '703f5592', '', '2009-2010', 'A', 'Active'),
(598, 2009331021, 'Abhishek Chakraborty', '50919225', '', '2009-2010', 'A', 'Active'),
(599, 2009331022, 'Abdullah Al Mamun', 'b6498e4b', '', '2009-2010', 'A', 'Active'),
(600, 2009331023, 'Babul Mia', '577a2fcf', '', '2009-2010', 'A', 'Active'),
(601, 2009331024, 'Aynun Nisha', '64b5495a', '', '2009-2010', 'A', 'Active'),
(602, 2009331025, 'A. B. M. Saifuzzaman', '8de49bb1', '', '2009-2010', 'A', 'Active'),
(603, 2009331026, 'Shakin Ul Alam', 'dd3c8aac', '', '2009-2010', 'A', 'Active'),
(604, 2009331027, 'Sarah Arfeen', '55e6c19e', '', '2009-2010', 'A', 'Active'),
(605, 2009331029, 'Md. Ariful Islam', 'eb85616c', '', '2009-2010', 'A', 'Active'),
(606, 2009331030, 'Md. Asfaq Sufian', 'f7c5c880', '', '2009-2010', 'A', 'Active'),
(607, 2009331031, 'Md. Afzal Hossain Bhuiyan', '36066179', '', '2009-2010', 'A', 'Active'),
(608, 2009331032, 'Labannya Prova Saha', '27cfa44c', '', '2009-2010', 'A', 'Active'),
(609, 2009331033, 'Rakib Ansary Saikot', '6c997dba', '', '2009-2010', 'A', 'Active'),
(610, 2009331034, 'Biswapriyo Chakrabarty', 'e3cd35a6', '', '2009-2010', 'A', 'Active'),
(611, 2009331035, 'Shah Mohammad Mostakim', 'ffcee7f5', '', '2009-2010', 'A', 'Active'),
(612, 2009331036, 'Abdullah Al Sanam', '94cac9b7', '', '2009-2010', 'A', 'Active');
INSERT INTO `student` (`id`, `reg_no`, `name`, `password`, `image_id`, `session`, `section`, `status`) VALUES
(613, 2009331037, 'Mondol Md. Atiqul Haque', '7e5b66ff', '', '2009-2010', 'A', 'Active'),
(614, 2009331038, 'Rajesh Baidya', '60b7a350', '', '2009-2010', 'A', 'Active'),
(615, 2009331039, 'Md. Hassanur Rakib', '97964e17', '', '2009-2010', 'A', 'Active'),
(616, 2009331040, 'Muhammad Akhter Hossen Roni', 'a61805e9', '', '2010-2011', 'A', 'Active'),
(617, 2009331041, 'Md. Ayakuth Pathan', 'a537ebf2', '', '2009-2010', 'A', 'Active'),
(618, 2009331042, 'Nafis Ahmed', 'ad64a99e', '', '2009-2010', 'A', 'Active'),
(619, 2009331043, 'Noushad Sojib', 'a7c9243d', '', '2009-2010', 'A', 'Active'),
(620, 2009331044, 'Noor Mohammad Nadim Hossain', 'aea24676', '', '2009-2010', 'A', 'Active'),
(621, 2009331045, 'Monir Mia', '6b8041e8', '', '2009-2010', 'A', 'Active'),
(622, 2009331046, 'Jafor Ahmed', '6ae6b6a3', '', '2009-2010', 'A', 'Active'),
(623, 2009331047, 'Md. Ashrafudduha Pappu', '12d2c902', '', '2009-2010', 'A', 'Active'),
(624, 2009331048, 'Khan Salman Habib', '648ebb12', '', '2009-2010', 'A', 'Active'),
(625, 2009331049, 'Siham Sharif', '702d2bf6', '', '2009-2010', 'A', 'Active'),
(626, 2009331050, 'Md. Shafiqul Islam', '43af19af', '', '2009-2010', 'A', 'Active'),
(627, 2009331051, 'Umme Kulsum', '7e047f62', '', '2009-2010', 'A', 'Active'),
(628, 2009331052, 'Omit Chanda', '7f09b82d', '', '2009-2010', 'A', 'Active'),
(629, 2009331053, 'M. M. Mahmudul Hasan', '3c1227a4', '', '2009-2010', 'A', 'Active'),
(630, 2009331054, 'Md. Jumman Hossain', '084e7217', '', '2009-2010', 'A', 'Active'),
(631, 2009331055, 'Tamim Anwar Chowdhury', '4e0958db', '', '2009-2010', 'A', 'Active'),
(632, 2009331056, 'Jnananjan Roy', '5b1b6cb7', '', '2009-2010', 'A', 'Active'),
(633, 2009331057, 'Md. Abdullah Al Noman', '1c420426', '', '2009-2010', 'A', 'Active'),
(634, 2009331058, 'Md. Shafikul Islam', 'dc146547', '', '2009-2010', 'A', 'Active'),
(635, 2009331059, 'Raisa Islam', '9de5520c', '', '2009-2010', 'A', 'Active'),
(636, 2009331060, 'Mohammad Minhaz Alam', 'f450e021', '', '2009-2010', 'A', 'Inactive'),
(637, 2009331061, 'Sayma Sultana', '24bc7068', '', '2009-2010', 'A', 'Active'),
(638, 2009331062, 'Mehedi Hasan', 'd55c77d0', '', '2009-2010', 'A', 'Active'),
(639, 2009331063, 'Labiba Jahan', '5ad5c5aa', '', '2009-2010', 'A', 'Active'),
(640, 2008331001, 'Md. Mohibul Hasan', '6a2c196a', '', '2008-2009', 'A', 'Active'),
(641, 2008331002, 'Eaiman Shoshi', '23309363', '', '2008-2009', 'A', 'Active'),
(642, 2008331003, 'Md. Arifuzzaman Sohel', '31073187', '', '2008-2009', 'A', 'Active'),
(643, 2008331004, 'Ahmed-Bin-Zaman', '76438fce', '', '2008-2009', 'A', 'Active'),
(644, 2008331005, 'Md. Aminul Islam Bhuiyan', '0f443922', '', '2008-2009', 'A', 'Active'),
(645, 2008331006, 'Syed Rezwanul Haque', '80815f44', '', '2008-2009', 'A', 'Active'),
(646, 2008331007, 'Arafat Habib Quraishi', 'a0d9ad8c', '', '2008-2009', 'A', 'Active'),
(647, 2008331008, 'Md. Mohiuddin Bhuiyan', 'b0dacde2', '', '2008-2009', 'A', 'Active'),
(648, 2008331009, 'Rahat Mahmood', 'c491752c', '', '2008-2009', 'A', 'Active'),
(649, 2008331010, 'Adina Sarawat', '4998825d', '', '2008-2009', 'A', 'Active'),
(650, 2008331011, 'Gulam Kibria Limon', '61d609ed', '', '2008-2009', 'A', 'Active'),
(651, 2008331012, 'Md. Fahim Rahman', 'e106d7da', '', '2008-2009', 'A', 'Active'),
(652, 2008331014, 'Md. Rashedul Hassan', '73505a90', '', '2008-2009', 'A', 'Active'),
(653, 2008331015, 'Tirhongkor Das Bapon', 'dcb92f35', '', '2008-2009', 'A', 'Active'),
(654, 2008331016, 'Bibash Kar', 'f21863fa', '', '2008-2009', 'A', 'Active'),
(655, 2008331017, 'Sumaya Alam', '1255868f', '', '2008-2009', 'A', 'Active'),
(656, 2008331018, 'Md. Nazmul Hoq', '020ab13d', '', '2008-2009', 'A', 'Active'),
(657, 2008331019, 'Md. Atequr Rahman', 'e33e0495', '', '2008-2009', 'A', 'Active'),
(658, 2008331021, 'Syed Rakib Rahman', 'c9c3f059', '', '2008-2009', 'A', 'Active'),
(659, 2008331022, 'A. H. M. Shahriar Alam', '71b81fd3', '', '2008-2009', 'A', 'Active'),
(660, 2008331024, 'Ahmad Jamaly Rabib', '8f094753', '', '2008-2009', 'A', 'Active'),
(661, 2008331025, 'Mohammed Imdadul Huq Sarker', '7c35a9ee', '', '2008-2009', 'A', 'Active'),
(662, 2008331026, 'Dipayan Banik', '16d2d28c', '', '2008-2009', 'A', 'Active'),
(663, 2008331027, 'Md. Fahim Hossain', '876cac24', '', '2008-2009', 'A', 'Active'),
(664, 2008331028, 'Zafar Ahmad', 'f3fff8cf', '', '2008-2009', 'A', 'Active'),
(665, 2008331029, 'Md. Golam Rabbi', 'e4ce1750', '', '2008-2009', 'A', 'Active'),
(666, 2008331030, 'Sudipta Kar', 'd004a29f', '', '2008-2009', 'A', 'Active'),
(667, 2008331031, 'Md. Washir Rahman', '58c53ee5', '', '2008-2009', 'A', 'Active'),
(668, 2008331032, 'Md. Abdur Rahman Sazzad', 'ac78ffa0', '', '2008-2009', 'A', 'Active'),
(669, 2008331033, 'Muhammad Farhan Nasim', '7ac8789c', '', '2008-2009', 'A', 'Active'),
(670, 2008331034, 'Md. Mozammel Haque', '01d4f716', '', '2008-2009', 'A', 'Active'),
(671, 2008331035, 'A. H. M. Nazmul Hasan Monshi', 'fdb074ca', '', '2008-2009', 'A', 'Active'),
(672, 2008331038, 'Sujit Sarker', 'b4393595', '', '2008-2009', 'A', 'Active'),
(673, 2008331039, 'Md. Shaiful Islam', 'ca1b5163', '', '2008-2009', 'A', 'Active'),
(674, 2008331040, 'Tamalica Mitra', 'b610c6ab', '', '2008-2009', 'A', 'Active'),
(675, 2008331041, 'Salman M. Wahid', '3decbbf5', '', '2008-2009', 'A', 'Active'),
(676, 2008331042, 'Diptopol Dam', '7cf98b1d', '', '2008-2009', 'A', 'Active'),
(677, 2008331044, 'Md. Walid-Al-Naim', 'ac5c30d9', '', '2008-2009', 'A', 'Active'),
(678, 2008331045, 'Partho Protim Ghosh', '357129d6', '', '2008-2009', 'A', 'Active'),
(679, 2008331046, 'A. K. M. Nazmul Hassan', '36eb365f', '', '2008-2009', 'A', 'Active'),
(680, 2008331047, 'Shamiul Hoque Ovi', '053068fc', '', '2008-2009', 'A', 'Active'),
(681, 2008331048, 'Tanveer Ahmed', 'e8735042', '', '2008-2009', 'A', 'Active'),
(682, 2008331049, 'Ripon Biswas', '858cdf45', '', '2008-2009', 'A', 'Active'),
(683, 2008331050, 'Taskin Khaleque', '0b4d29b4', '', '2008-2009', 'A', 'Active'),
(684, 2008331051, 'Urmila Roy', 'f0541c44', '', '2008-2009', 'A', 'Active'),
(685, 2008331052, 'Chaity Dey', 'e2c40eed', '', '2008-2009', 'A', 'Active'),
(686, 2008331054, 'Abdul Kaium Khan', '793ffcee', '', '2008-2009', 'A', 'Active'),
(687, 2008331055, 'Partho Biswas', '84f9fb47', '', '2008-2009', 'A', 'Active'),
(688, 2008331056, 'Tofael Ahmed', '44d8f915', '', '2008-2009', 'A', 'Active'),
(689, 2008331057, 'Sidratul Muntaha Choudhury', '90d35a3f', '', '2008-2009', 'A', 'Active'),
(690, 2008331058, 'H. M. Mohiuddin', 'ccbf9037', '', '2008-2009', 'A', 'Active'),
(691, 2008331059, 'Israt Tazin Ahsan', '3f8a3c40', '', '2008-2009', 'A', 'Active'),
(692, 2008331060, 'Md. Mahfuzur Rahman', '08bcd0a8', '', '2008-2009', 'A', 'Active'),
(693, 2008331061, 'Khushbu Kumar Sarraf', 'e1f83dfc', '', '2008-2009', 'A', 'Active'),
(694, 2008331062, 'Md. Abdullah Al- Mamun', '379e8662', '', '2008-2009', 'A', 'Active'),
(695, 2008331063, 'Md. Parvez Ashraf Miazi', '02b75def', '', '2008-2009', 'A', 'Active'),
(696, 2008331064, 'Chinmoy Sarker', '27648a74', '', '2008-2009', 'A', 'Active'),
(697, 2008331065, 'Humayun Ahmed', '501d88b0', '', '2008-2009', 'A', 'Active'),
(698, 2008331067, 'Roshan Thakur', '54505396', '', '2008-2009', 'A', 'Active'),
(703, 2005331103, 'Test', '4fa70df5', '', '2005-2006', 'A', 'Active'),
(705, 2010331001, 'Tapashee Tabassum Urmi', '', '', '2010-2011', 'A', 'Active'),
(706, 2010331002, 'Khaled Hasan Sazzad', '', '', '2010-2011', 'A', 'Active'),
(707, 2010331003, 'Soumik Kumar Saha', '', '', '2010-2011', 'A', 'Active'),
(708, 2010331005, 'Mustafa Mahmud', '', '', '2010-2011', 'A', 'Active'),
(709, 2010331006, 'Adnan Ahmed', '', '', '2010-2011', 'A', 'Active'),
(710, 2010331008, 'Nakul Chandra Saha', '', '', '2010-2011', 'A', 'Active'),
(711, 2010331009, 'Mohammad Mostakim Ornob', '', '', '2010-2011', 'A', 'Active'),
(712, 2010331010, 'Md. Golam Murtoza', '', '', '2010-2011', 'A', 'Active'),
(713, 2010331011, 'Shantanu Mandal', '', '', '2010-2011', 'A', 'Active'),
(714, 2010331012, 'Md. Rejaul Karim', '', '', '2010-2011', 'A', 'Active'),
(715, 2010331013, 'Anindya Pandit', '', '', '2010-2011', 'A', 'Active'),
(716, 2010331015, 'Rishmita Tasmim', '', '', '2010-2011', 'A', 'Active'),
(717, 2010331016, 'Abu Shahriar Ratul', '', '', '2010-2011', 'A', 'Active'),
(718, 2010331017, 'Moktahid-Al-Faisal', '', '', '2010-2011', 'A', 'Active'),
(719, 2010331018, 'Ahnaf Farhan', '', '', '2010-2011', 'A', 'Active'),
(720, 2010331020, 'Yousuf Ratul', '', '', '2010-2011', 'A', 'Active'),
(721, 2010331021, 'Abdullah Al Maruf', '', '', '2010-2011', 'A', 'Active'),
(722, 2010331022, 'Prapti Das', '', '', '2010-2011', 'A', 'Active'),
(723, 2010331024, 'Aqib Ashef', '', '', '2010-2011', 'A', 'Active'),
(724, 2010331025, 'Md. Saimon Islam', '', '', '2010-2011', 'A', 'Active'),
(725, 2010331026, 'K. M. Sajjadul Islam', '', '', '2010-2011', 'A', 'Active'),
(726, 2010331027, 'Tazbeea Tazakka', '', '', '2010-2011', 'A', 'Active'),
(727, 2010331029, 'Mohammad Raisul Islam', '', '', '2010-2011', 'A', 'Active'),
(728, 2010331030, 'Jagoth Jyoti Dey', '', '', '2010-2011', 'A', 'Active'),
(729, 2010331031, 'S. M. Ariful Islam', '', '', '2010-2011', 'A', 'Active'),
(730, 2010331032, 'Jishnu Banerjee', '', '', '2010-2011', 'A', 'Active'),
(731, 2010331033, 'Md. Fazle Rabby', '', '', '2010-2011', 'A', 'Active'),
(732, 2010331034, 'Md. Asifuzzaman', '', '', '2010-2011', 'A', 'Active'),
(733, 2010331035, 'Mohammad Ashraful Islam', '', '', '2010-2011', 'A', 'Active'),
(734, 2010331036, 'Dewan Mahmud Raihan', '', '', '2010-2011', 'A', 'Active'),
(735, 2010331037, 'Md. Fahad Hasan', '', '', '2010-2011', 'A', 'Active'),
(736, 2010331038, 'Md. Sazedul Islam', '', '', '2010-2011', 'A', 'Active'),
(737, 2010331039, 'Tasmin Afroz', '', '', '2010-2011', 'A', 'Active'),
(738, 2010331040, 'Tamjid Ahmed', '', '', '2010-2011', 'A', 'Active'),
(739, 2010331042, 'Aamira Shabnam', '', '', '2010-2011', 'A', 'Active'),
(740, 2010331043, 'Md. Hasan Mahmud', '', '', '2010-2011', 'A', 'Active'),
(741, 2010331044, 'Md. Mahadi Hasan Nahid', '', '', '2010-2011', 'A', 'Active'),
(742, 2010331045, 'Watina Malek', '', '', '2010-2011', 'A', 'Active'),
(743, 2010331046, 'Foysal Ahmed Emon', '', '', '2010-2011', 'A', 'Active'),
(744, 2010331047, 'Md. Ashiqul Islam', '', '', '2010-2011', 'A', 'Active'),
(745, 2010331051, 'Hamza Reza Pavel', '', '', '2010-2011', 'A', 'Active'),
(746, 2010331053, 'Raabit Hasan', '', '', '2010-2011', 'A', 'Active'),
(747, 2010331055, 'Md. Mustafizur Shakil', '', '', '2010-2011', 'A', 'Active'),
(748, 2010331056, 'Fahim Quadrey', '', '', '2010-2011', 'A', 'Active'),
(749, 2010331057, 'Ashraful Islam Prium', '', '', '2010-2011', 'A', 'Active'),
(750, 2010331059, 'Nipun Mitra', '', '', '2010-2011', 'A', 'Active'),
(751, 2010331060, 'Mst. Jasmine Jahan', '', '', '2010-2011', 'A', 'Active'),
(752, 2010331062, 'Angclo Chakma', '', '', '2010-2011', 'A', 'Active'),
(753, 2010331063, 'Md. Nazmul Hasan', '', '', '2010-2011', 'A', 'Active'),
(754, 2010331064, 'Nayem Mahedi', '', '', '2010-2011', 'A', 'Active'),
(755, 2010331065, 'Majharul Islam Midhat', '', '', '2010-2011', 'A', 'Active'),
(756, 2010331067, 'Afjal Hossain', '', '', '2010-2011', 'A', 'Active'),
(757, 2010331068, 'Kamrunnahar Swarna', '', '', '2010-2011', 'A', 'Active'),
(758, 2010331069, 'M. A. Alim Mukul', '', '', '2010-2011', 'A', 'Active'),
(759, 2010331070, 'Anitam Das Nirjhar', '', '', '2010-2011', 'A', 'Active'),
(760, 2010331071, 'Imran Hossain Showrov', '', '', '2010-2011', 'A', 'Active'),
(761, 2010331072, 'Sagar Gautam', '', '', '2010-2011', 'A', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `thumb_path` varchar(255) NOT NULL DEFAULT '',
  `is_default` enum('No','Yes') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `url`, `title`, `thumb_path`, `is_default`) VALUES
(1, 'voting_page1.php', 'Flash Book Theme', '/images/theme/flash_book.jpg', 'Yes'),
(2, 'voting_page2.php', 'PHP Theme', '/images/theme/php_theme.jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created` datetime NOT NULL,
  `modifed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `status`, `created`, `modifed`) VALUES
(1, 'test', 'test', 'test@test.com', 'Active', '2011-01-22 17:14:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vote_count`
--

DROP TABLE IF EXISTS `vote_count`;
CREATE TABLE IF NOT EXISTS `vote_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `candidate_id` int(11) NOT NULL DEFAULT '0',
  `election_id` int(11) NOT NULL DEFAULT '0',
  `count_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vote_count`
--

