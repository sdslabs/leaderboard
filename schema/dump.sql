-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2012 at 09:37 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.6-2~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leaderboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tokens`
--

CREATE TABLE IF NOT EXISTS `access_tokens` (
  `userid` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_tokens`
--

INSERT INTO `access_tokens` (`userid`, `service`, `access_token`) VALUES
('khare-ashwini', 'github', ''),
('abhshkdz', 'github', ''),
('demonslayer68', 'github', ''),
('captn3m0', 'github', 'a9ba3b0804a0bed3d19897ead6c808d3a9a7e493'),
('captn3m0', 'lastfm', 'captn3m0'),
('captn3m0', 'askubuntu', '11736'),
('captn3m0', 'stackoverflow', '368328'),
('captn3m0', 'twitter', 'capt_n3m0');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `userid` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `score` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`userid`, `service`, `score`) VALUES
('captn3m0', 'github', 52),
('abhshkdz', 'github', 12),
('demonslayer68', 'github', 9),
('khare-ashwini', 'github', 8),
('captn3m0', 'lastfm', 4608),
('captn3m0', 'askubuntu', 2667),
('captn3m0', 'gitscore', 826),
('khare-ashwini', 'gitscore', 173),
('captn3m0', 'twitter', 213),
('abhshkdz', 'gitscore', 286);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
