-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 06:34 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transq`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(6) NOT NULL,
  `org_id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `rank` varchar(255) NOT NULL,
  `max_req_num` int(11) NOT NULL,
  `starting_date` varchar(255) NOT NULL,
  `closing_date` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `org_id`, `title`, `discription`, `rank`, `max_req_num`, `starting_date`, `closing_date`, `date_added`) VALUES
(10, 1, 'corporal', 'Nigerian police for have provide 15000 offers for Corporal ', '14', 15000, '2021-12-31', '2022-01-31', '2021-12-14 07:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `app_responds`
--

CREATE TABLE `app_responds` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `app_id` int(6) NOT NULL,
  `credit` int(6) NOT NULL,
  `math` varchar(11) NOT NULL,
  `eng` varchar(11) NOT NULL,
  `credential` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `hypertension` varchar(11) NOT NULL,
  `medRecord` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_responds`
--

INSERT INTO `app_responds` (`id`, `user_id`, `app_id`, `credit`, `math`, `eng`, `credential`, `height`, `hypertension`, `medRecord`, `date`) VALUES
(16, 1, 10, 7, '1', '1', 'adeola.txt', '1.87', '1', 'hackathon fsi.txt', '2021-12-14 08:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `careercriterias`
--

CREATE TABLE `careercriterias` (
  `id` int(6) NOT NULL,
  `org_id` int(6) NOT NULL,
  `shootingCertificate` varchar(255) NOT NULL,
  `otherCertificate` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `careerresponds`
--

CREATE TABLE `careerresponds` (
  `id` int(6) NOT NULL,
  `org_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `shootingCertificate` varchar(255) NOT NULL,
  `otherCertificate` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int(6) NOT NULL,
  `app_id` int(6) NOT NULL,
  `minAge` int(4) NOT NULL,
  `maxAge` int(4) NOT NULL,
  `credit` int(4) NOT NULL,
  `math` varchar(10) NOT NULL,
  `eng` varchar(10) NOT NULL,
  `maleHeight` varchar(10) NOT NULL,
  `femaleHeight` varchar(10) NOT NULL,
  `hypertension` varchar(10) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `app_id`, `minAge`, `maxAge`, `credit`, `math`, `eng`, `maleHeight`, `femaleHeight`, `hypertension`, `date_added`) VALUES
(17, 16, 17, 45, 6, '1', '1', '1.67', '1.60', '1', '2021-12-14 08:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `name`, `email`, `url`, `password`, `status`, `date_registered`) VALUES
(1, 'Police Department', 'NPF@gmail.com', 'https://NPF.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2021-10-26 19:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `procriterias`
--

CREATE TABLE `procriterias` (
  `id` int(6) NOT NULL,
  `org_id` int(6) NOT NULL,
  `yos` int(6) NOT NULL,
  `n_ot` int(3) NOT NULL,
  `trate` int(4) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `score` int(6) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pro_responds`
--

CREATE TABLE `pro_responds` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `org_id` int(5) NOT NULL,
  `yos` int(5) NOT NULL,
  `n_ot` int(5) NOT NULL,
  `trate` int(5) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(6) NOT NULL,
  `org_id` int(6) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `rank_num` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `org_id`, `rank`, `rank_num`, `date_added`) VALUES
(23, 1, 'Inspector General', 1, '2021-11-04 09:43:40'),
(24, 1, 'Deputy Inspector-General of Police', 2, '2021-11-04 09:43:56'),
(25, 1, 'Assistant Inspector-General of Police', 3, '2021-11-04 09:44:02'),
(26, 1, 'Commissioner of Police', 4, '2021-11-04 09:44:09'),
(27, 1, 'Deputy Commissioner of Police', 5, '2021-11-04 09:44:18'),
(28, 1, 'Assistant Commissioner of Police', 6, '2021-11-04 09:44:25'),
(29, 1, 'Chief Superintendent of Police', 7, '2021-11-04 09:44:38'),
(30, 1, 'Superintendent of Police', 8, '2021-11-04 09:44:46'),
(31, 1, 'Deputy Superintendent of Police', 9, '2021-11-04 09:45:00'),
(32, 1, 'Assistant Superintendent of Police', 10, '2021-11-04 09:45:07'),
(33, 1, 'Inspector of Police', 11, '2021-11-04 09:45:21'),
(34, 1, 'Sergeant Major', 12, '2021-11-04 09:45:27'),
(35, 1, 'Sergeant', 13, '2021-11-04 09:45:33'),
(36, 1, 'Corporal', 14, '2021-11-04 09:45:39'),
(37, 1, 'Lance Corporal', 15, '2021-11-04 09:45:44'),
(38, 1, 'Constable', 16, '2021-11-04 09:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `SN` int(6) NOT NULL,
  `id` int(6) NOT NULL,
  `org_id` int(6) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `status` int(6) NOT NULL,
  `date_of_recruitment` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nin` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `nin`, `dob`, `password`, `gender`, `status`, `date_registered`) VALUES
(1, 'suraj muhammad', 'soorajwizard01@gmail.com', '08082905659', '2211332211', '1998-05-05', '827ccb0eea8a706c4c34a16891f84e7b', 'male', 3, '2021-10-28 21:11:41'),
(2, 'mavellous solomon', 'marvelloussolomon49@gmail.com', '09072336259', '2211445588', '2001-07-20', '827ccb0eea8a706c4c34a16891f84e7b', 'male', 3, '2021-11-02 13:29:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_responds`
--
ALTER TABLE `app_responds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careercriterias`
--
ALTER TABLE `careercriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careerresponds`
--
ALTER TABLE `careerresponds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `procriterias`
--
ALTER TABLE `procriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_responds`
--
ALTER TABLE `pro_responds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fullname` (`fullname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `app_responds`
--
ALTER TABLE `app_responds`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `careercriterias`
--
ALTER TABLE `careercriterias`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `careerresponds`
--
ALTER TABLE `careerresponds`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `procriterias`
--
ALTER TABLE `procriterias`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pro_responds`
--
ALTER TABLE `pro_responds`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `SN` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
