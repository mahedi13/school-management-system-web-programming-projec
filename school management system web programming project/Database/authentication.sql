-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2017 at 03:37 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `id`) VALUES
('mahedi', '123', 0),
('nahid', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `student_id` varchar(20) NOT NULL,
  `class_id` int(2) NOT NULL,
  `p_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`student_id`, `class_id`, `p_date`, `status`) VALUES
('one001', 1, '2017-07-08', 'YES'),
('one002', 1, '2017-07-08', 'NO'),
('ONE001', 1, '2017-07-06', 'YES'),
('ONE001', 1, '2017-07-05', 'NO'),
('ONE001', 1, '2017-07-04', 'YES'),
('ONE001', 1, '2017-07-03', 'NO'),
('TWO001', 2, '2017-07-09', 'YES'),
('TWO001', 2, '2017-07-08', 'YES'),
('TWO001', 2, '2017-07-06', 'YES'),
('TWO001', 2, '2017-07-05', 'YES'),
('TWO001', 2, '2017-07-04', 'NO'),
('TWO001', 2, '2017-07-03', 'NO'),
('ONE002', 1, '2017-07-09', 'YES'),
('ONE002', 1, '2017-07-06', 'NO'),
('ONE002', 1, '2017-07-05', 'YES'),
('ONE002', 1, '2017-07-04', 'NO'),
('ONE002', 1, '2017-07-03', 'YES'),
('ONE003', 1, '2017-07-08', 'YES'),
('ONE003', 1, '2017-07-06', 'YES'),
('ONE003', 1, '2017-07-05', 'NO'),
('ONE003', 1, '2017-07-04', 'YES'),
('ONE003', 1, '2017-07-03', 'NO'),
('TWO002', 2, '2017-07-08', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `student_id` varchar(15) NOT NULL,
  `class_id` int(2) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `marks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`student_id`, `class_id`, `subject`, `marks`) VALUES
('one001', 1, 'Math', 85),
('one001', 1, 'ENGLISH', 70),
('one001', 1, 'ARTS', 99),
('ONE002', 1, 'Math', 50),
('ONE003', 1, 'Bangla', 99),
('ONE002', 1, 'Bangla', 60),
('ONE001', 1, 'BANGLA', 70),
('ONE001', 1, 'SCIENCE', 78),
('ONE002', 1, 'ENGLISH', 65),
('ONE002', 1, 'SCIENCE', 75),
('ONE002', 1, 'ARTS', 67),
('ONE003', 1, 'MATH', 98),
('ONE003', 1, 'SCIENCE', 89),
('ONE003', 1, 'ARTS', 100),
('one003', 1, 'English', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `student_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `class_id` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `join_date` date NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`student_id`, `username`, `class_id`, `email`, `password`, `birth_date`, `join_date`, `phone`) VALUES
('one001', 'mahedi', 1, 'mahe@gmail', '005', '2017-07-05', '2017-07-27', '1234567'),
('one002', 'Tusher', 1, 'tusher@gmail.com', 'tusher', '1996-06-09', '2002-01-02', '017********'),
('one003', 'Pranto', 1, 'pranto@gmail.com', 'pranto', '1995-04-03', '2002-03-05', '017********'),
('TWO001', 'Arnab', 2, 'arnab@gmail.com', 'arnab', '1996-01-04', '2002-01-09', '017********'),
('TWO002', 'Sopto', 2, 'sopto@gmail.com', 'sopto', '1996-10-28', '2002-02-06', '017********'),
('TWO003', 'Nahid', 2, 'nahid@gmail.com', 'nahid', '1996-04-14', '2002-01-01', '017********');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
