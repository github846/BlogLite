-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2020 at 10:13 PM
-- Server version: 5.7.11
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `submitDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `indexA` int(8) NOT NULL,
  `indexP` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`title`, `body`, `submitDate`, `indexA`, `indexP`) VALUES
('Dingus?', 'Goofball', '2020-05-01 12:54:49', 8, 7),
('Buenos dias(edited)', 'Ola quÃ© tal?(edited)', '2020-05-01 12:57:22', 9, 1),
('Treetops', 'Nobody thinks you\'re an engineer who lives in Denver, and I\'m gonna prove it to you, dumbass!', '2020-05-09 21:43:27', 14, 5),
('Buenos dias(edited)', 'Ola quÃ© tal?(edited)', '2020-05-16 13:04:56', 17, 1),
('idk', 'wtf is going on here?', '2020-06-02 21:32:39', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `nickname` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passcode` varchar(60) DEFAULT NULL,
  `indexP` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`nickname`, `email`, `passcode`, `indexP`) VALUES
('testF', 'test@mail.com', '000', 1),
('dingus', 'mail@mail.mail', 'goofball', 5),
('bozo', 'whack@mole.com', 'woohoo', 6),
('j', 'j@j.j', 'h', 7),
('nono', 'nono@nono.nono', 'nono', 8),
('g', 'u@u.u', 'f', 9),
('jerk', 'n@n.n', 'n', 10),
('vsauce', 'vsauce@vsa.uce', 'vsaucevsauce', 15),
('nnnn', 'nbjkhvgcf@hhjv.hgd', 'vvvvvvvvvvvv', 16),
('c', 'drink@drink.bob', '25d55ad283aa400af464c76d713c07ad', 18),
('y', 'y@y.yyy', '$2y$10$NySDJ6f07Cv6puvsdBy5y.9gpVGKbKWsVezf8cPSGwOg0VlIm4zRi', 20),
('testuser3', 'testmail@mail.mail', '$2y$10$jknYoqDfSK7tAMGD/f3JvOmUP6DJzc5lsN4.42wL7L3QVTtRdwdHG', 21),
('uuuuuuuu', 'uuu@uuu.uuu', '$2y$10$rHlKnR1Hv6YzIlZUfTjCzebd.e.zPFwFwP96dSOyXLPSedZt/MhtG', 22),
('newUser', 'newm@ail.com', '$2y$10$2piev6tW6p/2Nhj7K8RgV.eTS9l2fdIvafR49g9k6e7LK2e2c94HC', 23),
('o', 'o@o.ooo', '$2y$10$TtcbkGr88IZoE5g7nC6l8u9IWYXQoyqVxvz5.LsevIwqYVuD.1OOS', 24);

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `comment` text,
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `indexR` int(8) NOT NULL,
  `indexP` int(8) NOT NULL,
  `indexA` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`comment`, `posted`, `indexR`, `indexP`, `indexA`) VALUES
('hey i just commented your article', '2020-05-08 02:56:55', 4, 10, 8),
('poke', '2020-05-08 02:59:15', 5, 7, 8),
('Hey that"s not nice, buddy!', '2020-05-09 23:49:34', 6, 8, 14),
('', '2020-05-12 15:19:34', 7, 9, 9),
('edited', '2020-05-15 14:52:47', 11, 1, 14),
('Hey, we need to know who wrote the article!', '2020-05-16 15:06:40', 12, 1, 8),
('There should be a way to edit and delete stuff.', '2020-05-20 18:23:05', 13, 8, 9),
('There should be a way to edit and delete stuff.', '2020-05-20 18:23:14', 14, 8, 9),
('IDIOT', '2020-05-31 14:13:19', 19, 1, 17),
('IDIOT', '2020-05-31 14:13:24', 20, 1, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`indexA`),
  ADD KEY `indexP` (`indexP`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`indexP`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `indecks` (`indexP`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`indexR`),
  ADD KEY `indexP` (`indexP`),
  ADD KEY `indexA` (`indexA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `indexA` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `indexP` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `indexR` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`indexP`) REFERENCES `person` (`indexP`) ON DELETE CASCADE;

--
-- Constraints for table `reaction`
--
ALTER TABLE `reaction`
  ADD CONSTRAINT `reaction_ibfk_1` FOREIGN KEY (`indexP`) REFERENCES `person` (`indexP`) ON DELETE CASCADE,
  ADD CONSTRAINT `reaction_ibfk_2` FOREIGN KEY (`indexA`) REFERENCES `article` (`indexA`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
