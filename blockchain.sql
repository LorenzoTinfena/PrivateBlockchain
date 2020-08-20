-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 20, 2020 at 01:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blockchain`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockchain`
--

DROP TABLE IF EXISTS `blockchain`;
CREATE TABLE IF NOT EXISTS `blockchain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text COLLATE utf8_bin NOT NULL,
  `value_hashed` tinytext COLLATE utf8_bin NOT NULL,
  `time_stamp` timestamp NULL DEFAULT NULL,
  `hash` tinytext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `blockchain`
--

INSERT INTO `blockchain` (`id`, `value`, `value_hashed`, `time_stamp`, `hash`) VALUES
(1, 'ORIGIN', '7e84f9243bc216adb33eb87aff06d0ace3ccfcea7d736a0b15b8d71a1cb35990', '2020-08-17 10:16:31', '58afd8c78e8ac2e84a4a3801ab9793617a8f5c1d13621cab9c611971cee1977e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
