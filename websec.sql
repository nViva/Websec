-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 07, 2021 at 09:48 AM
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
-- Table structure for table `register_user`
--

DROP TABLE IF EXISTS `register_user`;
CREATE TABLE IF NOT EXISTS `register_user` (
  `register_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_activation_code` varchar(250) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL,
  PRIMARY KEY (`register_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`register_user_id`, `user_name`, `user_email`, `user_password`, `user_activation_code`, `user_email_status`) VALUES
(1, 'John Smith', 'web-tutorial@programmer.net', '$2y$10$vdMwAmoRJfep8Vl4BI0QDOXArOCTOMbFs6Ja15qq3NEkPUBBtffD2', 'c74c4bf0dad9cbae3d80faa054b7d8ca', 'verified'),
(2, 'Viateur', 'nvipolite@gmail.com', '$2y$10$2Yzo/q9ZjGVrXb6bhozR5.Zkjn7zJOJnIab/F0PvBT.LxbJ/RDUgC', '8a6a98d9483d8e9ae2bd2d2adbe33f53', 'not verified'),
(3, 'Vava', 'vemukunzi@gmail.com', '$2y$10$yIe//XdU2NcJikT2nyUcruqnHfqxN65rHAVkse5/6IAYo.yk0Pd0W', '78821f8c20eac9c47a2df585af15e4a7', 'not verified');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`) VALUES
(1, 'Viateur', '1eb492049c862acb6db9511b5b6d7d62c5b5d437'),
(2, 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(4, '219004387', '5c6c499742a6d5d800714729a3837c16066bedb1'),
(5, '0782014638', 'd726252bf71e89af55a5c304d92ac14df82a7c99'),
(6, 'Viva', '825f616984857fcc00ebf8939b1059fa9e3fd1f4'),
(7, 'Polite', 'a7a36d4f483160e5e84f4726826c2797243918d0'),
(8, '0788835739', '47576cee8a14b41d4b8ff8fb32141072c081686f'),
(9, 'Declan', 'be7efeb5e2afc4a3ae95e42d27680a4cde4dd92e'),
(10, 'Viva2', '3a8032ce1ed9a8c2a86f41d06849369c248429cb'),
(11, 'Admin1', '753cf3a9a86427a59f7ca8494f37c1d0d2c30c65');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

DROP TABLE IF EXISTS `users1`;
CREATE TABLE IF NOT EXISTS `users1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `email_verification_link` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
