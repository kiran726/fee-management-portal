-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 12:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `fee_due_details`
--

CREATE TABLE `fee_due_details` (
  `USER_ID` varchar(20) NOT NULL,
  `academicyear` int(5) NOT NULL,
  `tuition_fee` int(15) NOT NULL,
  `exam_fee` int(15) NOT NULL,
  `miscellaneous_fee` int(15) NOT NULL,
  `library_fee` int(15) NOT NULL,
  `transportation_fee` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_due_details`
--

INSERT INTO `fee_due_details` (`USER_ID`, `academicyear`, `tuition_fee`, `exam_fee`, `miscellaneous_fee`, `library_fee`, `transportation_fee`) VALUES
('18261A01', 4, 92000, 0, 5500, 0, 0),
('18261A02', 4, 126000, 0, 5500, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TRANSACTION_ID` varchar(30) NOT NULL,
  `USER_ID` varchar(20) NOT NULL,
  `DATEOFPAY` datetime NOT NULL DEFAULT current_timestamp(),
  `TOTAL_SUM` int(10) NOT NULL,
  `FEE_TYPE` text NOT NULL,
  `MODE_OF_PAY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TRANSACTION_ID`, `USER_ID`, `DATEOFPAY`, `TOTAL_SUM`, `FEE_TYPE`, `MODE_OF_PAY`) VALUES
('TRANS1212121212', '18261A01', '2021-10-31 09:27:57', 5500, 'library', 'debit card'),
('TRANS21212121', '18261A01', '2021-10-31 10:26:31', 8000, 'extra', 'upi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` varchar(20) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `FIRST_NAME` text NOT NULL,
  `LAST_NAME` text NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `Programme` text NOT NULL DEFAULT '\'BTech\'',
  `Branch` varchar(20) NOT NULL,
  `Regulation` varchar(5) NOT NULL,
  `Section` int(1) NOT NULL,
  `USER_STATUS_ID` int(2) NOT NULL DEFAULT 2,
  `fathername` text DEFAULT NULL,
  `fatherphone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `PHONE`, `EMAIL`, `Programme`, `Branch`, `Regulation`, `Section`, `USER_STATUS_ID`, `fathername`, `fatherphone`) VALUES
('18261A01', '18261A01', 'User 1', '', '9876543', 'user1@mail.com', 'B.Tech', 'CSE', 'R18', 1, 2, '', ''),
('18261A02', '18261A02', 'John', 'Doe', '987654321', 'johndoe@gmail.com', 'B.Tech', 'CSE', 'R18', 1, 2, '', ''),
('18261A03', '18261A03', 'user', '3', '', 'user3@mail.com', 'B Tech', 'CSE', 'R18', 1, 2, NULL, NULL),
('admin', 'password', 'admin', '', '123', NULL, 'B.Tech', '', '', 0, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `USER_STATUS_ID` int(2) NOT NULL,
  `USER_TYPE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`USER_STATUS_ID`, `USER_TYPE`) VALUES
(1, 'admin'),
(2, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fee_due_details`
--
ALTER TABLE `fee_due_details`
  ADD PRIMARY KEY (`USER_ID`,`academicyear`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TRANSACTION_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `USER_STATUS_ID` (`USER_STATUS_ID`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`USER_STATUS_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee_due_details`
--
ALTER TABLE `fee_due_details`
  ADD CONSTRAINT `fee_due_details_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`USER_STATUS_ID`) REFERENCES `user_status` (`USER_STATUS_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
