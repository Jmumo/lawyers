-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2019 at 09:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id`       int(100)     NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
  (5, 'john', '1234'),
  (22, 'muo', '12'),
  (23, 'ifgu', '1234'),
  (24, 'ifgu', '1234'),
  (28, 'mutinda', '456'),
  (35, 'mumo', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id`     int(100)       NOT NULL,
  `post`   varchar(10000) NOT NULL,
  `author` varchar(100)   NOT NULL,
  `photo`  varchar(1000)  NOT NULL,
  `date`   varchar(10000) NOT NULL,
  `title`  varchar(100)   NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `post`, `author`, `photo`, `date`, `title`) VALUES
  (11,
   'rcnsfdjmgozdjmklv,.flxc,gkvdfjvlm, ckjvjkdfvjbvjhzscnmszbcjzxvjc zxnmvcj ndjhvchsdbcjknz kbzjhxbchsvchjzskc knxc hdbxibcjksddyasdjkxbnsjkzchsbcnsdx',
   'Johnda', '1552828348.jpg', 'Sun/Mar/2019', 'the giant case is back'),
  (12,
   'rcnsfdjmgozdjmklv,.flxc,gkvdfjvlm, ckjvjkdfvjbvjhzscnmszbcjzxvjc zxnmvcj ndjhvchsdbcjknz kbzjhxbchsvchjzskc knxc hdbxibcjksddyasdjkxbnsjkzchsbcnsdx',
   'Johnda', '1552828912.jpg', 'Sun/Mar/2019', 'the giant case is back'),
  (13,
   'rcnsfdjmgozdjmklv,.flxc,gkvdfjvlm, ckjvjkdfvjbvjhzscnmszbcjzxvjc zxnmvcj ndjhvchsdbcjknz kbzjhxbchsvchjzskc knxc hdbxibcjksddyasdjkxbnsjkzchsbcnsdx',
   'Johnda', '1552829399.jpg', 'Sun/Mar/2019', 'the giant case is back'),
  (14,
   'rcnsfdjmgozdjmklv,.flxc,gkvdfjvlm, ckjvjkdfvjbvjhzscnmszbcjzxvjc zxnmvcj ndjhvchsdbcjknz kbzjhxbchsvchjzskc knxc hdbxibcjksddyasdjkxbnsjkzchsbcnsdx',
   'Johnda', '1552829492.jpg', 'Sun/Mar/2019', 'the giant case is back'),
  (15,
   'rcnsfdjmgozdjmklv,.flxc,gkvdfjvlm, ckjvjkdfvjbvjhzscnmszbcjzxvjc zxnmvcj ndjhvchsdbcjknz kbzjhxbchsvchjzskc knxc hdbxibcjksddyasdjkxbnsjkzchsbcnsdx',
   'Johnda', '1552829597.jpg', 'Sun/Mar/2019', 'the giant case is back'),
  (16,
   'rcnsfdjmgozdjmklv,.flxc,gkvdfjvlm, ckjvjkdfvjbvjhzscnmszbcjzxvjc zxnmvcj ndjhvchsdbcjknz kbzjhxbchsvchjzskc knxc hdbxibcjksddyasdjkxbnsjkzchsbcnsdx',
   'Johnda', '1552830073.jpg', 'Sun/Mar/2019', 'the giant case is back'),
  (17,
   'rcnsfdjmgozdjmklv,.flxc,gkvdfjvlm, ckjvjkdfvjbvjhzscnmszbcjzxvjc zxnmvcj ndjhvchsdbcjknz kbzjhxbchsvchjzskc knxc hdbxibcjksddyasdjkxbnsjkzchsbcnsdx',
   'Johnda', '1552830164.jpg', 'Sun/Mar/2019', 'the giant case is back'),
  (18,
   'rcnsfdjmgozdjmklv,.flxc,gkvdfjvlm, ckjvjkdfvjbvjhzscnmszbcjzxvjc zxnmvcj ndjhvchsdbcjknz kbzjhxbchsvchjzskc knxc hdbxibcjksddyasdjkxbnsjkzchsbcnsdx',
   'Johnda', '1552830257.jpg', 'Sun/Mar/2019', 'the giant case is back');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id`          int(100)       NOT NULL,
  `first_name`  varchar(100)   NOT NULL,
  `second_name` varchar(100)   NOT NULL,
  `occupation`  varchar(100)   NOT NULL,
  `email`       varchar(100)   NOT NULL,
  `contact`     int(100)       NOT NULL,
  `address`     varchar(100)   NOT NULL,
  `description` varchar(10000) NOT NULL,
  `lawyer`      varchar(100)   NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `first_name`, `second_name`, `occupation`, `email`, `contact`, `address`, `description`, `lawyer`)
VALUES
  (1, 'john', 'mumo', 'M.E', 'johnmumo22@gmail.com', 4, 'lahore', 'suifrvzdflkbmjxpfo', 'mumo'),
  (2, 'john', 'mumo', 'M.E', 'johnmumo22@gmail.com', 4, 'lahore', 'suifrvzdflkbmjxpfo', 'kathini'),
  (3, 'john', 'mumo', 'M.E', 'johnmumo22@gmail.com', 76475895, 'lahore', 'parkistan appeal', 'harrison'),
  (4, 'john', 'mumo', 'M.E', 'johnmumo22@gmail.com', 76475895, 'lahore', 'parkistan appeal', 'harrison'),
  (5, 'john', 'mumo', 'M.E', 'johnmumo22@gmail.com', 76475895, 'lahore', 'parkistan appeal', ''),
  (6, 'john', 'mumo', 'M.E', 'johnmumo22@gmail.com', 76475895, 'lahore', 'parkistan appeal', ''),
  (7, 'john', 'mumo', 'M.E', 'johnmumo22@gmail.com', 76475895, 'lahore', 'parkistan appeal', ''),
  (8, 'john', 'mumo', 'M.E', 'jmn.mumo@gmail.com', 456, 'lahore', 'parkistan hero', ''),
  (17, 'john', 'mumo', 'M.E', 'jmn.mumo@gmail.com', 3456, 'lahore', 'dtfkuio', ''),
  (18, '', '', '', '', 0, '', '', ''),
  (19, '', '', '', '', 0, '', '', 'mumo');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id`    int(11)       NOT NULL,
  `name`  varchar(100)  NOT NULL,
  `photo` varchar(1000) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `name`, `photo`) VALUES
  (1, 'land issues', '1551888044.jpg'),
  (2, 'land issues', '1551888049.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id`          int(100)       NOT NULL,
  `description` varchar(10000) NOT NULL,
  `photo`       varchar(1000)  NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `description`, `photo`) VALUES
  (1,
   'the long lasting case of john kiriamiti who has been in prison for around 5 years has been solved finally thanks to our able team of lawyers',
   '1551885186.png'),
  (2,
   'the long lasting case of john kiriamiti who has been in prison for around 5 years has been solved finally thanks to our able team of lawyers',
   '1551885191.png'),
  (3,
   'the case that has been going in and out of most courts has finally been taken by our judges and we hope to solve as soon as possible',
   '1551885524.jpg'),
  (4,
   'the case that has been going in and out of most courts has finally been taken by our judges and we hope to solve as soon as possible',
   '1551885530.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id`      int(100)       NOT NULL,
  `author`  varchar(100)   NOT NULL,
  `message` varchar(10000) NOT NULL,
  `date`    mediumtext     NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `author`, `message`, `date`) VALUES
  (1, 'admin', 'the case number 2463737 submitted on wed not picked', '0000-00-00'),
  (2, 'admin', 'the case number 2463737 submitted on wed not picked', '0000-00-00'),
  (3, 'admin', 'gdjyduygk', '1551359306'),
  (4, 'admin', 'blahblah', '28/02/19'),
  (5, 'admin', 'blahblah', 'Thu/Feb/2019'),
  (6, 'admin', 'blahblah', 'Thu/Feb/2019'),
  (7, 'admin',
   'the case that was submitted on fridayn date two concerning land issues has nort yet been attended to please i urgu all lawyers concerened with this department to make a move',
   'Thu/Feb/2019'),
  (8, 'admin',
   'the case that was submitted on fridayn date two concerning land issues has nort yet been attended to please i urgu all lawyers concerened with this department to make a move',
   'Thu/Feb/2019');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id`       int(100)       NOT NULL,
  `date`     varchar(100)   NOT NULL,
  `practise` varchar(100)   NOT NULL,
  `matter`   varchar(10000) NOT NULL,
  `lawyer`   varchar(100)   NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `practise`, `matter`, `lawyer`) VALUES
  (1, '2019-03-21', 'land issues', ' estgdv', ' qeawrsetdrtfy'),
  (2, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (3, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (4, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (5, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (6, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (7, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (8, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (10, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (11, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (12, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (13, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (14, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (15, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (16, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (17, '2019-03-22', 'land issues', ' land issues', ' another case'),
  (18, '2019-03-22', 'land issues', ' land issues', ' another case');

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `username`         varchar(100) NOT NULL,
  `email`            varchar(100) NOT NULL,
  `password`         varchar(100) NOT NULL,
  `confirm_paasword` varchar(100) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`username`, `email`, `password`, `confirm_paasword`) VALUES
  ('Johnda', 'johnmumo22@gmail.com', 'john', 'john'),
  ('Johnda', 'johnmumo22@gmail.com', 'john', 'john'),
  ('john', 'johnmumo22@gmail.com', 'john', 'john'),
  ('john', 'johnmumo22@gmail.com', 'john', 'john'),
  ('Johnda', 'johnmumo22@gmail.com', 'john', 'john'),
  ('Johnda', 'johnmumo22@gmail.com', '6432', 'dan'),
  ('Johnda', 'johnmumo22@gmail.com', '6432', 'dan'),
  ('Johnda', 'johnmumo22@gmail.com', '6432', 'dan'),
  ('Johnda', 'johnmumo22@gmail.com', '6432', 'dan'),
  ('Johnda', 'johnmumo22@gmail.com', 'dan', 'dan'),
  ('mourinho', 'carzola@gmail.com', 'carzo', 'carzo'),
  ('Johnda', 'johnmumo22@gmail.com', 'mumo', 'mumo'),
  ('mumo', 'johnmumo22@gmail.com', 'joh ', 'john'),
  ('Johnda', 'johnmumo22@gmail.com', 'mumo', 'mumo'),
  ('john', 'jmn.mumo@gmail.com', 'john', 'john'),
  ('john', 'jmn.mumo@gmail.com', 'mumo', 'mumo'),
  ('Johnda', 'jmn.mumo@gmail.com', 'mumo', 'mumo'),
  ('Johnda', 'jmn.mumo@gmail.com', 'mumo', 'mumo');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id`          int(100)       NOT NULL,
  `first_name`  varchar(100)   NOT NULL,
  `second_name` varchar(100)   NOT NULL,
  `department`  varchar(100)   NOT NULL,
  `photo`       varchar(10000) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `first_name`, `second_name`, `department`, `photo`) VALUES
  (3, 'john', 'mumo', 'IT', '1551884093.png'),
  (4, 'john', 'mumo', 'IT', '1551884098.png'),
  (5, 'rachael', 'kathini', 'IT', '1551884246.jpg'),
  (6, 'rachael', 'kathini', 'IT', '1551884257.jpg'),
  (7, 'moses', 'munuve', 'IT', '1551884430.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 36;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 19;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 20;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 19;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
