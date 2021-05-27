-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 12:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionlog`
--

CREATE TABLE `actionlog` (
  `id` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `actiontype` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `actionlog` text NOT NULL,
  `datesent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actionlog`
--

INSERT INTO `actionlog` (`id`, `subid`, `actiontype`, `user`, `actionlog`, `datesent`) VALUES
(1, 1, 1, 'genmardadivo25@gmailcom', '1,0,0,0,0,0,1,0,0,0', '2021-05-27 04:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `adminhome`
--

CREATE TABLE `adminhome` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `assetdescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminhome`
--

INSERT INTO `adminhome` (`id`, `type`, `title`, `file`, `date`, `status`, `assetdescription`) VALUES
(4, '1', 'Vaccination', 'vaccination.jpg', '2021-05-25', 1, ''),
(5, '1', 'Covid Update May 25, 2021', 'covidupdatemay25,2021.jpg', '2021-05-25', 1, ''),
(6, '1', 'Santization', 'santization.jpg', '2021-05-25', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `announcedescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`id`, `title`, `subtitle`, `announcedescription`) VALUES
(3, 'Sample announcement', 'sample subtitle', 'What is lorem ipsumlorem ipsum is simply dummy text of the printing and typesetting industry lorem ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has survived not only five centuries but also the leap into electronic typesetting remaining essentially unchanged it was popularised in the 1960s with the release of letraset sheets containing lorem ipsum passages and more recently with desktop publishing software like aldus pagemaker including versions of lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `eventdescription` varchar(255) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `datesent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `eventdescription`, `starttime`, `endtime`, `datesent`) VALUES
(2, 'sample title', '#8fffda', 'Sample description', '2021-05-27T18:12', '2021-06-02T18:12', '2021-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id` int(11) NOT NULL,
  `lvl` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `lvl`, `fname`, `pword`, `email`, `address`, `status`) VALUES
(1, '0', 'root', 'eb0a191797624dd3a48fa681d3061212', 'genmardadivo25@gmailcom', '-', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actionlog`
--
ALTER TABLE `actionlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminhome`
--
ALTER TABLE `adminhome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actionlog`
--
ALTER TABLE `actionlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminhome`
--
ALTER TABLE `adminhome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
