-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 08:24 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking__system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin_code` varchar(15) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `aadhar_number` varchar(50) NOT NULL,
  `acount_balance` int(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `birthday`, `email`, `phone_no`, `state`, `district`, `city`, `pin_code`, `account_no`, `aadhar_number`, `acount_balance`, `created_date`) VALUES
(3, 'Pruthviraj Rajput', 'Male', ' 2000-05-06', 'pruthviraj.rajput011@gmail.com', '1234567890', 'Maharashtra', 'Nandurbar', 'Shahada', '425444', 'AC677209939100', '12345678900000', 9000, '2021-10-06 13:17:23'),
(4, 'Kirti Patil', 'Female', ' 2000-06-06', 'kirtipatil@gmail.com', '1234567891', 'Maharashtra', 'Jalgaon', 'Jalgaon', '425444', 'AC677209939101', '12345678900001', 10000, '2021-10-06 13:17:23'),
(5, 'Harshada Chaudhry ', 'Female', ' 2000-07-14', 'harshadachoudhary@gmail.com', '123467893', 'Maharashtra', 'Jalgaon', 'Jalgaon', '425444', 'AC677209939102', '12345678900002', 10000, '2021-10-06 12:45:59'),
(6, 'Sumit Chauhan ', 'Male', ' 2000-06-06', 'sumit@gmail.com', '1234567892', 'Maharashtra', 'Pune', 'Pune', '425444', 'AC677209939103', '12345678900003', 10000, '2021-10-06 12:48:27'),
(7, 'Bhumika Pawar', 'Female', ' 2000-06-14', 'bhumikapawar29@gmail.com', '1234567894', 'Maharashtra', 'Nandurbar', 'Shahada', '425444', 'AC677209939104', '12345678900004', 20000, '2021-10-06 12:49:23'),
(8, 'Gaurav Pawar', 'Male', ' 2003-03-02', 'gauravpawar12@gmail.com', '1234567895', 'Maharashtra', 'Nandurbar', 'Shahada', '425444', 'AC677209939105', '12345678900005', 50000, '2021-10-06 12:50:12'),
(9, '+918767286769', 'Female', ' 2002-05-22', 'pruthviraj.rajput011@gmail.com', '1234567896', 'Maharashtra', 'Dhule', 'Shirpure', '425444', 'AC677209939106', '12345678900006', 9000, '2021-10-06 12:52:29'),
(10, 'Raj Rajput', 'Male', ' 2000-10-11', 'rajrajputrr2233@gmail.com', '1234567897', 'Maharashtra', 'Dhule', 'Shirpure', '425444', 'AC677209939107', '12345678900007', 3000, '2021-10-06 12:53:31'),
(11, 'Manas Jadhav', 'Male', ' 2000-05-09', 'manasjadhav@gmail.com', '1234567898', 'Maharashtra', 'Dhule', 'Shirpure', '425444', 'AC677209939108', '12345678900008', 5000, '2021-10-06 12:54:39'),
(12, 'Rajesh Patil', 'Male', ' 2000-01-11', 'rajeshpatil@gmail.com', '1234567810', 'Maharashtra', 'Dhule', 'Dhule', '425444', 'AC677209939109', '12345678900010', 4000, '2021-10-06 12:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `employe_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `salary` int(50) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `employe_id`, `name`, `gender`, `email_id`, `birthday`, `phone_no`, `state`, `district`, `city`, `pin_code`, `designation`, `salary`, `join_date`) VALUES
(1, 'EM00001', 'Kirti Patil', 'Female', 'kirtipatil@gmail.com', '2000-05-11', '1234567890', 'Maharashtra', 'Jalgaon', 'Jalgaon', 425444, 'Accountant ', 50000, '2021-10-06 12:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `customer_ac` varchar(50) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transfer_customer_ac` varchar(50) NOT NULL,
  `amount` int(15) NOT NULL,
  `transfer_by` int(50) NOT NULL,
  `transaction_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `customer_ac`, `transaction_type`, `transfer_customer_ac`, `amount`, `transfer_by`, `transaction_on`) VALUES
(1, 'AC677209939100', 'Deposite', 'NA', 1000, 1, '2021-10-06 13:13:37'),
(2, 'AC677209939100', 'Deposite', 'NA', 5000, 1, '2021-10-06 13:14:01'),
(3, 'AC677209939101', 'Deposite', 'NA', 10000, 1, '2021-10-06 13:14:35'),
(4, 'AC677209939100', 'Withdrawal', 'NA', 200, 1, '2021-10-06 13:15:25'),
(5, 'AC677209939100', 'Deposite', 'NA', 300, 1, '2021-10-06 13:15:45'),
(6, 'AC677209939100', 'Deposite', 'NA', 900, 1, '2021-10-06 13:16:13'),
(7, 'AC677209939101', 'Withdrawal', 'NA', 200, 1, '2021-10-06 13:16:29'),
(8, 'AC677209939100', 'Transfer', 'AC677209939101', 1000, 1, '2021-10-06 13:16:47'),
(9, 'AC677209939101', 'Transfer', 'AC677209939100', 1000, 1, '2021-10-06 13:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usename` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usename`, `password`, `type`, `last_login`) VALUES
(1, 'Spark Foundation Bank', 'admin', 0, '2021-10-06 10:52:57'),
(2, 'EM00001', '1234567890', 1, '2021-10-06 12:29:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
