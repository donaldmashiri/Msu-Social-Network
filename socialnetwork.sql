-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2021 at 08:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `advert_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `advert_image` text NOT NULL,
  `advert_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`advert_id`, `std_id`, `advert_image`, `advert_date`) VALUES
(8, 6, 'abstract-class-in-java.jpg', '2021-04-12 11:56:26am'),
(13, 17, 'abstract-class-in-java.jpg', '2021-04-16 12:40:33pm'),
(15, 4, 'adbb.jpeg', '2021-04-16 05:10:02pm');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `discuss_id` int(11) NOT NULL,
  `comment_text` varchar(255) NOT NULL,
  `comment_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `std_id`, `discuss_id`, `comment_text`, `comment_date`) VALUES
(1, 4, 3, 'koo', '2021-04-12 06:49:47am'),
(2, 4, 2, 'koo8', '2021-04-12 06:50:00am'),
(3, 4, 3, 'kooy', '2021-04-12 06:55:57am'),
(4, 4, 3, 'Donnie how are you?', '2021-04-12 08:56:41am'),
(5, 4, 2, 'when', '2021-04-12 09:54:13am'),
(6, 4, 4, 'uribenzi', '2021-04-13 01:54:59pm'),
(7, 6, 4, 'u sure', '2021-04-16 11:46:55am'),
(8, 4, 3, 'Donnie how are you?', '2021-04-16 12:37:41pm'),
(9, 4, 11, 'hie John, the new library is looking good i hope the school has good books', '2021-04-16 04:08:52pm'),
(10, 4, 12, 'You know what this library is looking good and i hope it has good books', '2021-04-16 05:03:23pm');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `discuss_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `topic_name` text NOT NULL,
  `topic_image` varchar(500) NOT NULL DEFAULT 'contract.jpg',
  `topic_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`discuss_id`, `std_id`, `topic_name`, `topic_image`, `topic_date`) VALUES
(2, 4, 'hie', '19225061_1010662565731797_7640387570496775063_n.jpg', '2021-04-12 05:44:58am'),
(4, 6, 'Hie Evrybody', '', '2021-04-13 01:54:37pm'),
(12, 17, 'hie guyz what do u say about our new library', '', '2021-04-16 05:02:04pm');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `lec_id` int(11) NOT NULL,
  `lec_names` varchar(255) NOT NULL,
  `lec_email` varchar(255) NOT NULL,
  `lec_pass` varchar(255) NOT NULL,
  `lec_image` text NOT NULL,
  `module` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lec_id`, `lec_names`, `lec_email`, `lec_pass`, `lec_image`, `module`) VALUES
(1, 'Dr TSOKOTA', 'drtsokota@gmail.com', 'tsokota', 'tsokota.jpg', 'HCS111 - Costing'),
(2, 'Dr ZHOU', 'drzhou@gmail.com', 'zhou', 'zhou.jpeg', 'HCS405 - Introduction to Programming');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `sender_type` varchar(255) NOT NULL,
  `msg_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `message`, `sender`, `receiver`, `sender_type`, `msg_date`) VALUES
(8, 'hie Dr Tsokota. I want to ask when are we having a lecturer today', 4, 1, 'student', '2021-04-16 04:10:26pm'),
(9, 'Hie Sir, Today we dont have a lecturer', 1, 4, 'lecturer', '2021-04-16 04:11:30pm'),
(10, 'Hir Donnie, Risk analysis is not about that', 1, 4, 'lecturer', '2021-04-16 04:26:51pm'),
(11, 'Hir Dr. I am not undestanding the topic of Cost based anaylsis', 4, 1, 'student', '2021-04-16 05:05:06pm'),
(12, 'Cost based anaysis is about calculating cost', 1, 4, 'lecturer', '2021-04-16 05:06:34pm');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(11) NOT NULL,
  `notice` varchar(255) NOT NULL,
  `notice_type` varchar(255) NOT NULL,
  `notice_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `notice`, `notice_type`, `notice_date`) VALUES
(3, 'All students Meet at campus at 8:00', 'Lecturer', '2021-04-13 12:32:09pm'),
(6, 'Hie guyz tere is new meeting about disertation today at2pm', 'Lecturer', '2021-04-16 05:09:34pm');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `per_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `module` text NOT NULL,
  `topic` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`per_id`, `std_id`, `module`, `topic`, `notes`) VALUES
(5, 4, 'HCS111 - Costing', 'Risk analysis', 'Risk is about calculatinng risk for the creation of the project'),
(6, 4, 'HCS111 - Costing', 'Pay back period', 'Payback period is about calculating the cost the years');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_id` int(11) NOT NULL,
  `full_names` varchar(255) NOT NULL,
  `std_email` varchar(255) NOT NULL,
  `std_phone` int(11) NOT NULL,
  `std_regno` varchar(255) NOT NULL,
  `std_program` varchar(255) NOT NULL,
  `std_image` varchar(500) NOT NULL DEFAULT 'aa.jpeg',
  `std_level` varchar(255) NOT NULL,
  `std_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `full_names`, `std_email`, `std_phone`, `std_regno`, `std_program`, `std_image`, `std_level`, `std_password`) VALUES
(4, 'DonaldTonderai Mashiri', 'donaldtondemashiri@gmail.com', 779400263, 'R171767H', 'Mathematics', 'pp.jpg', '1.1', 'donnie'),
(17, 'John Doe', 'john@gmail.com', 779400263, 'R172400W', 'Mathematics', 'aa.jpeg', '2.2', 'john');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`advert_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`discuss_id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`lec_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adverts`
--
ALTER TABLE `adverts`
  MODIFY `advert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `discuss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `lec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
