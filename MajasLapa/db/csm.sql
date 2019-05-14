-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 11:56 PM
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
-- Table structure for table `citi`
--

CREATE TABLE `citi` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citi`
--

INSERT INTO `citi` (`id`, `name`, `user_name`, `email`) VALUES
(4, 'Darbu_standarts_IT_gada_proj.doc', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `ligumi`
--

CREATE TABLE `ligumi` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ligumi`
--

INSERT INTO `ligumi` (`id`, `name`, `user_name`, `email`) VALUES
(4, '2_home_work.docx', 'admin', ''),
(5, 'Darbu_standarts_IT_gada_proj.doc', 'admin', ''),
(6, 'Undine_Kobitjeva_CV (1).docx', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `pavadzimes`
--

CREATE TABLE `pavadzimes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pavadzimes`
--

INSERT INTO `pavadzimes` (`id`, `name`, `user_name`, `email`) VALUES
(5, 'Prakses-ligums_2016.02.03..doc', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `rekins`
--

CREATE TABLE `rekins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekins`
--

INSERT INTO `rekins` (`id`, `name`, `user_name`, `email`) VALUES
(4, 'Darbu_standarts_IT_gada_proj.doc', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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

INSERT INTO `users` (`id`, `fname`, `lname`, `age`, `gender`, `email`, `username`, `password`, `access`) VALUES
(1, 'olgerts', 'balabans', 20, '0', 'figiter771@gmail.com', 'figiter771', 'kaka1111', 0),
(2, 'olgerts', 'balabans', 20, '0', 'figiter771@gmail.com', 'figiter771', 'kaka1111', 0),
(3, 'olgerts', 'balabans', 15, 'male', 'figiter771@gmail.com', 'figiter771', 'kaka1111', 0),
(4, 'Olly', 'Bally', 20, 'male', 'figiter1990@gmail.com', 'admin', 'admin123', 0),
(5, 'Martins', 'Martins', 14, 'male', 'martins.martins@va.lv', 'martinsKruts', 'martinsIrGudrs', 1),
(6, 'Martins', 'balabans', 19, 'male', 'martins.martins@va.lv', 'martinsKruts', 'martinsNavGudrs', 2),
(7, 'Martins', 'balabans', 19, 'male', 'martins.martins@va.lv', 'martinsKruts', 'bananiIrGarsigi', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citi`
--
ALTER TABLE `citi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligumi`
--
ALTER TABLE `ligumi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pavadzimes`
--
ALTER TABLE `pavadzimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekins`
--
ALTER TABLE `rekins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citi`
--
ALTER TABLE `citi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ligumi`
--
ALTER TABLE `ligumi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pavadzimes`
--
ALTER TABLE `pavadzimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekins`
--
ALTER TABLE `rekins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
