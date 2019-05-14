-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 05:55 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csm`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `age`, `gender`, `email`, `username`, `password`, `access`) VALUES
('olgerts', 'balabans', 20, '0', 'figiter771@gmail.com', 'figiter771', 'kaka1111', 0),
('olgerts', 'balabans', 20, '0', 'figiter771@gmail.com', 'figiter771', 'kaka1111', 0),
('olgerts', 'balabans', 15, 'male', 'figiter771@gmail.com', 'figiter771', 'kaka1111', 0),
('Olly', 'Bally', 20, 'male', 'figiter1990@gmail.com', 'admin', 'admin123', 0),
('Martins', 'Martins', 14, 'male', 'martins.martins@va.lv', 'martinsKruts', 'martinsIrGudrs', 1),
('Martins', 'balabans', 19, 'male', 'martins.martins@va.lv', 'martinsKruts', 'martinsNavGudrs', 2),
('Martins', 'balabans', 19, 'male', 'martins.martins@va.lv', 'martinsKruts', 'bananiIrGarsigi', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
