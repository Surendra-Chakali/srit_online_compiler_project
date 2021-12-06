-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2021 at 08:49 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srit`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_qns`
--

CREATE TABLE `add_qns` (
  `qns_id` int(11) NOT NULL,
  `question_name` varchar(255) NOT NULL,
  `sample_input` varchar(255) NOT NULL,
  `sample_output` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_qns`
--

INSERT INTO `add_qns` (`qns_id`, `question_name`, `sample_input`, `sample_output`) VALUES
(1, 'write a program to print hello world', 'hello world', 'hello world'),
(2, 'write a program to print addition of two numbers', '2,7', '9'),
(3, 'write a program to perform XOR operation between two numbers ', '2 3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('srit@conzura', 'srit@conzura');

-- --------------------------------------------------------

--
-- Table structure for table `std_ans_qns`
--

CREATE TABLE `std_ans_qns` (
  `std_id` int(11) NOT NULL,
  `qns_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `std_ans_qns`
--

INSERT INTO `std_ans_qns` (`std_id`, `qns_id`) VALUES
(10, 2),
(10, 3),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `std_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`std_id`, `username`, `password`, `name`) VALUES
(8, '17hu1a0110', 'Hari@1234', 'hari'),
(9, '17hu1a01111', 'Suri@123123', 'praveen'),
(10, '18hu1a0101', 'Suri@123', 'Nagesh'),
(11, '17hu1ao119', 'Suri@123123', 'manish'),
(12, '19hu1a0101', 'Suri@12', 'praveen'),
(13, '17hu1a0303', 'Suri@12341234', 'Surendra'),
(14, '17hu1a0549', 'Teju@549549', 'admin'),
(15, '17hu1a0123', 'Suri@123', 'hai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_qns`
--
ALTER TABLE `add_qns`
  ADD PRIMARY KEY (`qns_id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_qns`
--
ALTER TABLE `add_qns`
  MODIFY `qns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
