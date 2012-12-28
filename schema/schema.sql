SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `access_tokens` (
  `userid` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `scores` (
  `userid` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `score` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
