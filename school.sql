-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2017 at 10:59 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `code` int(4) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`code`, `name`) VALUES
(1, 'BAGERHAT'),
(3, 'BANDARBAN'),
(4, 'BARGUNA'),
(6, 'BARISAL'),
(9, 'BHOLA'),
(10, 'BOGRA'),
(12, 'BRAHMANBARIA'),
(13, 'CHANDPUR'),
(70, 'CHAPAINAWABGANJ'),
(15, 'CHITTAGONG'),
(18, 'CHUADANGA'),
(19, 'COMILLA'),
(22, 'COX\'S BAZAR'),
(26, 'DHAKA'),
(27, 'DINAJPUR'),
(29, 'FARIDPUR'),
(30, 'FENI'),
(32, 'GAIBANDHA'),
(33, 'GAZIPUR'),
(35, 'GOPALGANJ'),
(36, 'HABIGANJ'),
(39, 'JAMALPUR'),
(41, 'JESSORE'),
(42, 'JHALAKATI'),
(44, 'JHENAIDAH'),
(38, 'JOYPURHAT'),
(46, 'KHAGRACHHARI'),
(47, 'KHULNA'),
(48, 'KISHOREGANJ'),
(49, 'KURIGRAM'),
(50, 'KUSHTIA'),
(51, 'LAKSHMIPUR'),
(52, 'LALMONIRHAT'),
(54, 'MADARIPUR'),
(55, 'MAGURA'),
(56, 'MANIKGANJ'),
(57, 'MEHERPUR'),
(58, 'MOULVIBAZAR'),
(59, 'MUNSHIGANJ'),
(61, 'MYMENSINGH'),
(64, 'NAOGAON'),
(65, 'NARAIL'),
(67, 'NARAYANGANJ'),
(68, 'NARSINGDI'),
(69, 'NATORE'),
(72, 'NETROKONA'),
(73, 'NILPHAMARI'),
(75, 'NOAKHALI'),
(76, 'PABNA'),
(77, 'PANCHAGARH'),
(78, 'PATUAKHALI'),
(79, 'PIROJPUR'),
(82, 'RAJBARI'),
(81, 'RAJSHAHI'),
(84, 'RANGAMATI'),
(85, 'RANGPUR'),
(87, 'SATKHIRA'),
(86, 'SHARIATPUR'),
(89, 'SHERPUR'),
(88, 'SIRAJGANJ'),
(90, 'SUNAMGANJ'),
(91, 'SYLHET'),
(93, 'TANGAIL'),
(94, 'THAKURGAON');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(10) NOT NULL,
  `roll` int(10) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `term` varchar(25) NOT NULL,
  `year` int(5) NOT NULL,
  `theory` int(5) NOT NULL,
  `practical` int(5) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `roll`, `subject`, `term`, `year`, `theory`, `practical`, `comment`) VALUES
(16, 8999, 'Physics', '1st', 2016, 75, 18, 'good'),
(15, 555, 'Physics', '1st', 2014, 57, 0, ''),
(14, 824, 'Physics', '1st', 2014, 57, 17, ''),
(13, 8999, 'Physics', '1st', 2014, 75, 0, 'good'),
(11, 2410, 'Math', '1st', 2016, 67, 0, 'well'),
(12, 23, 'Math', '1st', 2016, 57, 0, 'good'),
(10, 2400, 'Math', '1st', 2016, 57, 0, 'nice'),
(9, 2000, 'Math', '1st', 2016, 75, 0, 'good'),
(17, 824, 'Physics', '1st', 2016, 57, 20, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `roll` int(10) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `class` varchar(100) NOT NULL,
  `section` varchar(100) DEFAULT NULL,
  `gender` varchar(7) NOT NULL,
  `b_date` text NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip` int(10) DEFAULT NULL,
  `address` text NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `roll`, `f_name`, `l_name`, `class`, `section`, `gender`, `b_date`, `city`, `zip`, `address`, `phone`, `email`, `password`) VALUES
(78, 5552, 'Jahana', 'Codeam', 'Twelve', 'Science', 'Female', '06/06/2017', 'SIRAJGANJ', 1230, 'gffswfsqgg', 2147483647, 'serakib@gmail.com', 'ytyrryr'),
(71, 824, 'Rakib', 'Code', 'Eleven', 'Science', 'Male', '12/03/1996', 'SIRAJGANJ', 1400, 'dbn', 34570000, 'fgsdfgd@vdsddd.com', ''),
(66, 2000, 'Shahana', 'Khandokar', 'Hons. Prof.', 'BSc in CSE', 'Female', '30/05/1996', 'BARGUNA', 1234, 'reretrd', 1667543456, 'admin@gmail.com', 'admin'),
(82, 8960, 'Abdul', 'Karim', 'Hons. Prof.', 'BSc in CSE', 'Male', '06/13/1996', 'SIRAJGANJ', 6700, 'Kazipura, Sirajganj', 1889653236, 'admin@gmail.com', 'root'),
(60, 23, 'Shahana', 'Khandokar', 'Hons. Prof.', 'BSc in CSE', 'Female', '30/05/1996', 'GAIBANDHA', 1234, '', 1773259875, 'admin@gmail.com', 'root'),
(76, 2412, 'Jahana', 'Code', 'Hons.', 'BENGALI', 'Female', '06/06/1996', 'SIRAJGANJ', 1225, 'Talbagan, India.', 1773259875, 'admin@gmail.com', 'admin'),
(77, 1478, 'Jahana', 'Kamal', 'Hons.', 'BENGALI', 'Female', '12/03/1996', 'SIRAJGANJ', 1245, 'Talhati, Gujrat', 1889653236, 'admin@gmail.com', 'admin'),
(80, 2311, 'Jahana', 'Kamal', 'Hons.', 'BENGALI', 'Female', '06/06/1996', 'SIRAJGANJ', 3432, 'wqww', 1773259875, 'fgsdfgd@vdsddd.com', 'weeeeeeere'),
(81, 8962, 'Jahana', 'Code', 'Eleven', 'Science', 'Female', '06/05/2017', 'SIRAJGANJ', 3432, '23e3e4qq', 2147483647, 'fgsdfgd@vdsddd.com', '3344444');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `sub_code` varchar(100) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_class` varchar(100) DEFAULT NULL,
  `sub_group` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_code`, `sub_name`, `sub_class`, `sub_group`) VALUES
(10, '1001', 'BENGALI', 'HONOURS', NULL),
(11, '1101', 'ENGLISH', 'HONOURS', NULL),
(12, '1201', 'ARABIC', 'HONOURS', NULL),
(13, '1501', 'HISTORY', 'HONOURS', NULL),
(14, '1601', 'ISLAMIC HISTORY & CULTURE', 'HONOURS', NULL),
(15, '1701', 'PHILOSOPHY', 'HONOURS', NULL),
(16, '1801', 'ISLAMIC STUDIES', 'HONOURS', NULL),
(17, '1901', 'POLITICAL SCIENCE', 'HONOURS', NULL),
(18, '2001', 'SOCIOLOGY', 'HONOURS', NULL),
(19, '2101', 'SOCIAL WORK', 'HONOURS', NULL),
(20, '2201', 'ECONOMICS', 'HONOURS', NULL),
(21, '2301', 'MARKETING', 'HONOURS', NULL),
(22, '2401', 'FINANCE & BANKING', 'HONOURS', NULL),
(23, '2501', 'ACCOUNTING', 'HONOURS', NULL),
(24, '2601', 'MANAGEMENT', 'HONOURS', NULL),
(25, '2701', 'PHYSICS', 'HONOURS', NULL),
(26, '2801', 'CHEMISTRY', 'HONOURS', NULL),
(27, '2901', 'BIO CHEMISTRY', 'HONOURS', NULL),
(28, '3001', 'BOTANY', 'HONOURS', NULL),
(29, '3101', 'ZOOLOGY', 'HONOURS', NULL),
(30, '3201', 'GEOGRAPHY', 'HONOURS', NULL),
(31, '3301', 'SOIL SCIENCE', 'HONOURS', NULL),
(32, '3401', 'PSYCHOLOGY', 'HONOURS', NULL),
(33, '3501', 'HOME ECONOMICS', 'HONOURS', NULL),
(34, '3601', 'STATISTICS', 'HONOURS', NULL),
(35, '3701', 'ATHEMATICS', 'HONOURS', NULL),
(36, '3801', 'BRARY AND INFORMATION SCIENCE', 'HONOURS', NULL),
(37, '3901', 'ACHELOR OF EDUCATION', 'HONOURS', NULL),
(38, '4001', 'ANTHROPOLOGY', 'HONOURS', NULL),
(39, '4101', 'PUBLIC ADMINISTRATION', 'HONOURS', NULL),
(40, '4201', 'COMPUTER SCIENCE', 'HONOURS', NULL),
(41, '4301', 'BUSINESS ADMINISTRATION', 'HONOURS', NULL),
(42, '4401', 'ENVIRONMENTAL SCIENCES', 'HONOURS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(13) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`),
  ADD UNIQUE KEY `roll_2` (`roll`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_code` (`sub_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
