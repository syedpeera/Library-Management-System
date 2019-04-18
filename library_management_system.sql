-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2019 at 01:35 PM
-- Server version: 8.0.11
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
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` text NOT NULL,
  `lid` text,
  `number_of_copies` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `book_name`, `lid`, `number_of_copies`) VALUES
(8, 'Algorithms', '-1', 3),
(9, 'Programming and Data Structures', '-1', 1),
(10, 'Software Engineering', '-1', 2),
(11, 'Digital and Analog Communication Systems', '-1', 2),
(12, 'Principles of Communication Systems', '-1', 2),
(13, 'Engineering Electromagnetics', '-1', 3),
(14, 'Basic Electrical Engineering', '-1', 3),
(15, 'Electrostatics', '-1', 3),
(16, 'Electromagnetic Induction', '-1', 2),
(17, 'Thermodynamics', '-1', 2),
(18, 'Fluid Machinery', '-1', 3),
(19, 'Machine Design', '-1', 4),
(20, 'Industrial Engineering', '-1', 4),
(21, 'Half girlfriend', '-1', 3),
(22, 'Three mistakes of my life', '-1', 2),
(23, 'Concrete Mathematics', '-1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL,
  `branch` text NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `username`, `password`, `type`, `branch`) VALUES
(3, 'syed', 'peera', 'm', 'manager'),
(6, 'testuser', 'testuser', 's', 'CSE'),
(7, 'ut', 'ut', 's', 'CSE'),
(8, 'testuser1', 'testuser1', 's', 'CSE'),
(9, 'testuser2', 'testuser2', 's', 'CSE'),
(10, 'testuser3', 'testuser3', 's', 'CSE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
