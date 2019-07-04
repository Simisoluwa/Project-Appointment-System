-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 20, 2019 at 09:15 AM
-- Server version: 10.3.9-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supervisorCourse` varchar(255) NOT NULL,
  `supervisorName` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `appointmentDate` longtext NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `supervisorStatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `supervisorCourse`, `supervisorName`, `semester`, `appointmentDate`, `appointmentTime`, `userStatus`, `supervisorStatus`) VALUES
(22, 'csc405', 'Dr Odumuyiwa', '1st Semester', 'monday', '10:15 AM', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_appointment`
--

DROP TABLE IF EXISTS `student_appointment`;
CREATE TABLE IF NOT EXISTS `student_appointment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `supervisorName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matric` varchar(255) NOT NULL,
  `appdate` varchar(255) NOT NULL,
  `apptime` varchar(255) NOT NULL,
  `userStatus` int(10) NOT NULL,
  `supervisorStatus` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_appointment`
--

INSERT INTO `student_appointment` (`id`, `course`, `supervisorName`, `email`, `matric`, `appdate`, `apptime`, `userStatus`, `supervisorStatus`) VALUES
(7, 'csc405', 'Dr Odumuyiwa', 'Adeyemo1882@gmail.com', '160805501', 'Friday', '5:40pm', 1, 0),
(6, 'csc405', 'Dr Odumuyiwa', 'Temi12@gmail.com', '160805507', 'Friday', '5:40pm', 0, 1),
(5, 'csc405', 'Dr Odumuyiwa', 'Adeyemo1882@gmail.com', '160805501', 'Friday', '6:15 PM', 1, 0),
(8, 'csc405', 'Dr Odumuyiwa', 'Adeyemo1882@gmail.com', '160805501', 'Wednesday', '5:40pm', 0, 1),
(9, 'csc405', 'Dr Odumuyiwa', 'Adeyemo1882@gmail.com', '160805501', 'Friday', '5:40pm', 1, 1),
(10, 'csc405', 'Dr Odumuyiwa', 'Adeyemo1882@gmail.com', '160805501', 'Friday', '5:40pm', 1, 1),
(21, 'csc507', 'Dr Odumuyiwa', 'Akinbode122@gmail.com', '150805508', 'Friday', '5:40pm', 1, 1),
(20, 'csc405', 'Dr Odumuyiwa', 'Akinbode122@gmail.com', '150805508', 'Friday', '6:00 PM', 1, 1),
(23, 'csc405', 'Dr Odumuyiwa', 'Temi12@gmail.com', '160805507', 'saturday', '10:15 AM', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supervisorcourse`
--

DROP TABLE IF EXISTS `supervisorcourse`;
CREATE TABLE IF NOT EXISTS `supervisorcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisorcourse`
--

INSERT INTO `supervisorcourse` (`id`, `course`, `creationDate`, `updationDate`) VALUES
(11, 'csc405', '2016-12-28 05:37:25', ''),
(12, 'csc507', '2016-12-28 05:38:12', ''),
(13, 'csc409', '2016-12-28 05:38:48', ''),
(14, 'csc306', '2016-12-28 05:39:26', ''),
(15, 'csc321', '2016-12-28 05:39:51', ''),
(16, 'csc322', '2016-12-28 05:40:08', '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

DROP TABLE IF EXISTS `supervisors`;
CREATE TABLE IF NOT EXISTS `supervisors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `supervisorName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `course`, `supervisorName`, `address`, `contactno`, `email`, `password`, `creationDate`, `updationDate`) VALUES
(8, 'csc305', ' Dr Odumuyiwa', 'Unilag', 8087172281, 'odumuyiwa@gmail.com', 'admin123', '2019-06-01 05:25:37', '01-06-2019 01:27:51 PM');

-- --------------------------------------------------------

--
-- Table structure for table `supmessage`
--

DROP TABLE IF EXISTS `supmessage`;
CREATE TABLE IF NOT EXISTS `supmessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supcourse` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matric` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supmessage`
--

INSERT INTO `supmessage` (`id`, `supcourse`, `supervisor`, `email`, `matric`, `user_message`) VALUES
(1, 'csc405', 'Select Supervisor', 'Adeyemo1882@gmail.com', '160805501', 'I have a wedding on the following days');

-- --------------------------------------------------------

--
-- Table structure for table `usermessage`
--

DROP TABLE IF EXISTS `usermessage`;
CREATE TABLE IF NOT EXISTS `usermessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `supname` varchar(255) NOT NULL,
  `sup_message` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermessage`
--

INSERT INTO `usermessage` (`id`, `course`, `supname`, `sup_message`, `email`) VALUES
(1, 'csc405', 'Dr Odumuyiwa', 'Alright no problem', 'Adeyemo1882@gmail.com'),
(2, 'csc405', 'Dr Odumuyiwa', 'Alright my boy..i will do that for you.', 'Adeyemo1882@gmail.com'),
(3, 'csc405', 'Dr Odumuyiwa', 'Alrrrrrrrrrrr', 'ADE123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) NOT NULL,
  `matric_no` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `matric_no`, `profile_pic`, `email`, `password`, `regDate`) VALUES
(17, 'Simisoluwa A Adeyemo', '160805501', '1559848765_africa.jpg', 'Adeyemo1882@gmail.com', 'Adeyemo1882', '2019-06-06 19:19:25'),
(18, 'Adekanbi', '120805508', '1559849454_avatar-1-small.jpg', 'Adekanbi2@gmail.com', 'Adekanbi', '2019-06-06 19:30:54'),
(19, 'Simisoluwa A Adeyemo', '160805507', '1559889974_media-user.png', 'Temi12@gmail.com', 'admin12', '2019-06-07 06:46:14'),
(20, 'Akinbode Oluwaseun', '150805508', '1560752256_avatar-3.jpg', 'Akinbode122@gmail.com', 'Akinbode122', '2019-06-17 06:17:36'),
(21, 'Akintola', '120905504', '1561011098_avatar-6.jpg', 'Akintola1@gmail.com', 'akintola123', '2019-06-20 06:11:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
