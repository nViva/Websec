-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2021 at 07:09 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websec`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

DROP TABLE IF EXISTS `password_reset`;
CREATE TABLE IF NOT EXISTS `password_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `validator` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `selector`, `validator`) VALUES
(20, 'nvipolite@gmail.com', '82d51508a4a4dccc', '$2y$10$ZedokvfiScEVzml6.HLtJ.sKLfsVjUseyqlihUXhC8hbdx2p0xQiS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `email_status` varchar(30) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `activation_code`, `email_status`) VALUES
(5, 'karinda', '7e470dad1fac4bbb4a37eb9051cecaa981390c93', 'erickarinda5000@gmail.com', '690206', 'Not verified'),
(2, 'Admin1', '753cf3a9a86427a59f7ca8494f37c1d0d2c30c65', 'viateurvnshimiyimana@gmail.com', '935666', 'Not verified'),
(3, 'Admin2', '753cf3a9a86427a59f7ca8494f37c1d0d2c30c65', 'kabarebekik@gmail.com', '188235', 'Not verified'),
(4, 'Pascal', '50353899a2ce3a843afe12f59b66ec6d094d7c0d', 'niyonsabapascal1@gmail.com', '404191', 'Verified');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
