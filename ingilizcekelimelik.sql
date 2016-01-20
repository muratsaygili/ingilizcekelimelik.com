-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 20, 2016 at 09:47 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ingilizcekelimelik`
--

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`b_id`, `u_id`, `b_name`) VALUES
(9, 2, 'zekinin kutusu'),
(13, 1, 'Chapter 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `password`, `email`) VALUES
(1, 'oguzhan', '123', 'oguzhantasc@gmail.com'),
(2, 'zeki', '123', 'zeki@zeki.com');

-- --------------------------------------------------------

--
-- Table structure for table `vocabulary`
--

CREATE TABLE `vocabulary` (
  `v_id` int(11) NOT NULL,
  `v_name` text NOT NULL,
  `v_trans` text NOT NULL,
  `v_example` text NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vocabulary`
--

INSERT INTO `vocabulary` (`v_id`, `v_name`, `v_trans`, `v_example`, `u_id`, `b_id`) VALUES
(8, 'Abandon', 'Terk etmek', 'People often simply abandon their pets when they go abroad.', 1, 13),
(9, 'Ability', 'Yetenek', 'The system has the ability to run more than one program at the same time.', 1, 13),
(10, 'About', 'Hakkında', 'What do you think about YDS?', 1, 13),
(11, 'Absolute', 'Kesin', 'Beauty cannot be measured by any absolute standard.', 1, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vocabulary`
--
ALTER TABLE `vocabulary`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `u_id_2` (`u_id`),
  ADD KEY `b_id` (`b_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `box`
--
ALTER TABLE `box`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vocabulary`
--
ALTER TABLE `vocabulary`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `box`
--
ALTER TABLE `box`
  ADD CONSTRAINT `box_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `vocabulary`
--
ALTER TABLE `vocabulary`
  ADD CONSTRAINT `vocabulary_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vocabulary_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `box` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
