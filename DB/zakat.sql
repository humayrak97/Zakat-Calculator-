-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2023 at 03:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `donateCentrally`
--

CREATE TABLE `donateCentrally` (
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donateCentrally`
--

INSERT INTO `donateCentrally` (`name`, `address`, `phone`, `job`, `email`, `amount`, `message`) VALUES
('Mohammad Junayed Hasan', '266, West Nakhalpara, Tejgaon', '+8801852828239', 'Student', 'junayedhasan100@gmail.com', '123', 'Please convey it.'),
('Mohammad Junayed Hasan', '266, West Nakhalpara, Tejgaon', '+8801852828239', 'Student', 'junayedhasan100@gmail.com', '123', 'Please convey it.'),
('Mohammad Junayed Hasan', '266, West Nakhalpara, Tejgaon', '+8801852828239', 'Student', 'junayedhasan100@gmail.com', '123', 'Please convey it.'),
('hehe', '266, West Nakhalpara, Tejgaon', '+8801852828239', 'Student', 'junayedhasan100@gmail.com', '1234', 'Please convey it.'),
('hehe', '266, West Nakhalpara, Tejgaon', '+8801852828239', 'Student', 'junayedhasan100@gmail.com', '23322', 'Thankyou.'),
('', '', '', '', '', '', ''),
('Mohammad ', '266, West Nakhalpara, Tejgaon', '+8801852828239', 'Student', 'junayedhasan100@gmail.com', '10000', 'Hope it helps'),
('', '', '', '', '', '', ''),
('', '', '', '', '', '', ''),
('', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `financeHistory`
--

CREATE TABLE `financeHistory` (
  `name` varchar(100) NOT NULL,
  `savings` varchar(100) NOT NULL,
  `expenses` varchar(100) NOT NULL,
  `debt` varchar(100) NOT NULL,
  `gold` varchar(100) NOT NULL,
  `silver` varchar(100) NOT NULL,
  `zakat_due` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financeHistory`
--

INSERT INTO `financeHistory` (`name`, `savings`, `expenses`, `debt`, `gold`, `silver`, `zakat_due`) VALUES
('hehe', '2345', '567', '23', '45', '33', ''),
('hehe', '1231231', '1231', '1213', '123', '1231', ''),
('hehe', '1231231', '1231', '1213', '123', '1231', '30753.525'),
('hehe', '23234', '234', '234', '234', '234', '580.85'),
('hehe', '123123', '1231', '123', '123', '123', '3050.375'),
('hehe', '1212', '121', '121', '12', '12', '24.85'),
('hehe', '10000', '1000', '1000', '50', '50', '202.5'),
('hehe', '232234', '33', '33', '33', '33', '5805.85');

-- --------------------------------------------------------

--
-- Table structure for table `foundationDonations`
--

CREATE TABLE `foundationDonations` (
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `job` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `organization` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL,
  `currency` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foundationDonations`
--

INSERT INTO `foundationDonations` (`name`, `address`, `phone`, `job`, `email`, `organization`, `amount`, `message`, `currency`) VALUES
('Mohammad Junayed Hasan', '266, West Nakhalpara, Tejgaon', '+8801852828239', 'Student', 'junayedhasan100@gmail.com', '', '1000', 'Hello how are you', 'USD'),
('hehe', '266, West Nakhalpara, Tejgaon', '+8801852828239', 'Student', 'junayedhasan100@gmail.com', '', '1234', 'Please convey it.', ''),
('', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `foundations`
--

CREATE TABLE `foundations` (
  `name` varchar(30) NOT NULL,
  `serial` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `license` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `addedOn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foundations`
--

INSERT INTO `foundations` (`name`, `serial`, `email`, `address`, `license`, `phone`, `addedOn`) VALUES
('Islamic Research Center BD', 1, 'hehe@hehe.com', 'Bashundhara Block D', '1A2B3C4D5E', '+880 1867234567', '20-03-23'),
('Center For Islamic Economics', 2, 'hehe@heheee.com', 'Bashundhara Road 19', '1A2B3C4D5F', '+880 1867234577', '20-03-23'),
('Islamic Relief Bangladesh', 3, 'hehe@heheeeee.com', 'Kalachandpur Main Road', '1A2B3C4D5G', '+880 1867234578', '29-03-23'),
('Al-Quran Academy', 4, 'alquran@academy.com', 'Baridhara J Block', '1A2B3C4D5H', '+880 1867234569', '27-03-23'),
('Rushia Islamic Academy', 5, 'rushia@academy.com', 'Mirpur DOHS', '1A2B3C4D5J', '+880 1867234667', '01-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `requestForZakatable`
--

CREATE TABLE `requestForZakatable` (
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `income` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestForZakatable`
--

INSERT INTO `requestForZakatable` (`name`, `address`, `phone`, `job`, `nid`, `email`, `income`, `message`) VALUES
('Junayed', 'Mohakhali', '01852828239', 'Student', '1234qwer', 'junayed@gmail.com', '10000', 'Please help me'),
('', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `zakat_due` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `title`, `phone`, `location`, `zakat_due`) VALUES
('Mohammad Junayed Hasan', 'junayedhasan100@gmail.com', 'junu.100', '', '', '', ''),
('Alif', 'email@gmail.com', '1234abcd', '', '', '', ''),
('junu', 'junu@junuu.com', '', '', '', '', ''),
('junu', 'junayedhasan200@gmail.com', '1234qwer', '', '', '', ''),
('Mohammad Junayed Hasan', 'junu@hasan.com', '1234qwer', '', '', '', ''),
('Mohammad Junayed Hasan', 'junayedhasan400@gmail.com', '1234qwer', '', '', '', ''),
('', '', '', '', '', '', ''),
('hehe', 'hehe@hehe', '123qwe', 'male', '018', 'hello', ''),
('hehe', 'hehe@hehee', '1234', 'male', '018', 'hwllo', ''),
('ss', 'ss@ss.com', 'qwer1234', 'male', '019222', 'aaaa', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
