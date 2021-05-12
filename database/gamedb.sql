-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 01:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `gamedb`
--
-- --------------------------------------------------------
--
-- Table structure for table `signup_details`
--
CREATE TABLE `signup_details` (
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` text NOT NULL,
  `phone` int(15) NOT NULL,
  `played_on` varchar(225) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
INSERT INTO `signup_details` (
    `username`,
    'email',
    `password`,
    `age`,
    'gender',
    'phone',
    `played_on`
  )
VALUES ();
--
-- Indexes for dumped tables
--
--
-- Indexes for table `signup_details`
--
ALTER TABLE `signup_details`
ADD PRIMARY KEY (`Email`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;