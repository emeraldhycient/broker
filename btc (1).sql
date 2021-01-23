-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2021 at 03:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btc`
--

-- --------------------------------------------------------

--
-- Table structure for table `alphaadmin`
--

CREATE TABLE `alphaadmin` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `approvepayment`
--

CREATE TABLE `approvepayment` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `statuz` varchar(255) NOT NULL,
  `SubmittedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvepayment`
--

INSERT INTO `approvepayment` (`id`, `userId`, `screenshot`, `statuz`, `SubmittedOn`) VALUES
(4, '5f6f533275986', 'obaispj.jpg', 'answered', '2020-10-29 13:20:25'),
(5, '5f6f533275986', '8snol93.png ', 'answered', '2021-01-12 20:44:26'),
(6, '5f6f533275986', 'hzperfy.png', 'pending', '2021-01-12 21:28:09'),
(7, '5f6f533275986', 'rejkqla.jpg', 'pending', '2021-01-16 13:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `bitcoin`
--

CREATE TABLE `bitcoin` (
  `id` int(11) NOT NULL,
  `btcprice` varchar(255) DEFAULT NULL,
  `walletaddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitcoin`
--

INSERT INTO `bitcoin` (`id`, `btcprice`, `walletaddress`) VALUES
(1, '0.0000920', 'hf64dy74hdyd63g35gedyd74h4u484jrhfyd63gchange2');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `joinedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `userid`, `Email`, `Fname`, `Lname`, `pass`, `joinedOn`) VALUES
(2, '5f64923e36af6', 'igwezehycient86@gmail.com', 'Igweze', 'Hycient', '$2y$10$nE2c0bfJG5mvQwTBCIgeWOFDBFRk4giCtznGf80G6TyIS3WZD1Gta', '2020-09-18 11:55:58'),
(5, '5f649321bb472', 'mcmathbrian2@gmail.com', 'oparaduru', 'emmanuel', '$2y$10$Wyao4SJocSN69/w31MFwveKgyX6..PY.ZI7wcxzp/PHQPfzlv3O9y', '2020-09-18 11:59:45'),
(6, '5f64945f6086b', 'ekeneinno@gmail.com', 'ekene', 'inno', '$2y$10$Jv90XqwzJGj4FSadbK1U6euzk7fseNj2uU6Bxrd.yXSNk02MqPb6m', '2020-09-18 12:05:03'),
(7, '5f64946176e4f', 'ekeneinno@gmail.com', 'ekene', 'inno', '$2y$10$q2sE1.s1xILvWvCkZdUajuqaMmui5F9wLdMKb50grkQ3q5fEt3JpO', '2020-09-18 12:05:05'),
(8, '5f649689f0a4e', 'igwezehycient86@gmail.com', 'Igweze', 'Hycient', '$2y$10$5h0sGJZ6FD/3A9iQ0MEJiuKVGgVHCghGSKdRxcbprrG1X5KmkGi82', '2020-09-18 12:14:18'),
(9, '5f6496cf351da', 'igwezehycient86@gmail.com', 'Igweze', 'Hycient', '$2y$10$RlXRCAoDZFwmwRRBzxbsBeRnxODxDHi5JyHmv9PO1Ukc9qVVKU5/q', '2020-09-18 12:15:27'),
(10, '5f6497be305eb', 'igwezehycient86@gmail.com', 'Igweze', 'Hycient', '$2y$10$SGqzXpcHvSVXgzBSakm6RuS8.3aI7Z8fpa25VUE8kuWeHcGNxPxVi', '2020-09-18 12:19:26'),
(11, '5f649cc3aba66', 'igwezehycient6@gmail.com', 'Igweze', 'Hycient', '$2y$10$5Dz2unueksNXBj49W2LH3uKYWjNMC1V/oefZ0V5EaJn2.vzxE0YYe', '2020-09-18 12:40:51'),
(12, '5f649fe3aac7a', 'igwezehycient@gmail.com', 'Igweze', 'Hycient', '$2y$10$t1xPo./iKFe/S49l0j6ZAeQn4QKjJgW5jxsrTYQhZy9.L/o5j24T6', '2020-09-18 12:54:11'),
(13, '5f649fe54722c', 'igwezehycient@gmail.com', 'Igweze', 'Hycient', '$2y$10$xNoBccIUfMh8O8NFfgQat.HYSOL6eDC0nVt0i0NJc6oqcMyzmhxv.', '2020-09-18 12:54:13'),
(14, '5f64a01231f4e', 'igwezehycient@gmail.com', 'Igweze', 'Hycient', '$2y$10$zsZtgGs9tipD2Br15Yg3XuKesdVPXswZNJPygBEnJbticpMnwn5Tu', '2020-09-18 12:54:58'),
(15, '5f6f533275986', 'igwezehycient86@gmail.com', 'Igweze', 'Hycient', '$2y$10$/tBKPDDJ6FyKpizBWGnuk.S98o.n0qHvPVGPMQuciUbi8aGehvPvm', '2020-09-26 15:41:54'),
(16, '5f7854734401a', 'igwecient86@hyujjhg', 'hybjmnnbgvfcdc', 'hopk8u9;k', '$2y$10$..2BqkaERz/fB77BF51Xj.mHYERjUeq10wl5gDFVK98PuRxAgC77q', '2020-10-03 11:37:39'),
(17, '5f78547706c2f', 'igwecient86@hyujjhg', 'hybjmnnbgvfcdc', 'hopk8u9;k', '$2y$10$j29WVUZ0Zqv5wwZsGwzK7e1k1ytUnVigmWPfnr/CUdP5XPyGbaNm2', '2020-10-03 11:37:43'),
(18, '5f785477a4f0c', 'igwecient86@hyujjhg', 'hybjmnnbgvfcdc', 'hopk8u9;k', '$2y$10$vZECHqrJfKe27B0n1ODWN.ntEMO0.lxSiVrbfPj6ugC6MZIi1DnaC', '2020-10-03 11:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `userid`, `transaction_id`, `amount`, `date`) VALUES
(1, '5f6f533275986', 'kC43e92GymhGY20Jnl', 200, '2020-10-04 17:24:42'),
(2, '5f6f533275986', '9woS4vzf849UB979jr', 100, '2020-10-05 19:15:46'),
(3, '5f6f533275986', 'kC43e92GyhdjhGY20Jnl', 400, '2020-10-07 18:38:44'),
(6, '5f6f533275986\r\n', 'kC43e929jmhGY20Jnl', 200, '2020-10-07 20:11:52'),
(7, '5f6f533275986\r\n', 'kC43e929jmhGY20Jnl', 200, '2020-10-07 20:12:47'),
(8, '5f6f533275986', '8aQDHmQoEKZ8h5hsZ4', 400, '2021-01-13 16:38:52'),
(9, '5f6f533275986', 'n7P5VoZ77F21SOE5M6', 400, '2021-01-13 16:38:58'),
(10, '5f6f533275986', 'fVFjGK096kwBGjONkS', 700, '2021-01-13 16:44:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alphaadmin`
--
ALTER TABLE `alphaadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvepayment`
--
ALTER TABLE `approvepayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bitcoin`
--
ALTER TABLE `bitcoin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alphaadmin`
--
ALTER TABLE `alphaadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approvepayment`
--
ALTER TABLE `approvepayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bitcoin`
--
ALTER TABLE `bitcoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
