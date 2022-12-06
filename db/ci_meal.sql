-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 06:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_meal`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_exp`
--

CREATE TABLE `daily_exp` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `expdate` date DEFAULT NULL,
  `note` text NOT NULL,
  `uppic` varchar(255) DEFAULT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_exp`
--

INSERT INTO `daily_exp` (`id`, `member_id`, `expdate`, `note`, `uppic`, `amount`) VALUES
(1, 3, '2022-10-13', 'dfadf', '16655459781971.jpg', '200'),
(3, 3, '2022-10-12', 'huuuuu', '16655750491491.jpg', '350'),
(4, 13, '2022-10-12', 'Dat', '16655901591736.jpg', '200');

-- --------------------------------------------------------

--
-- Table structure for table `member_information`
--

CREATE TABLE `member_information` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_information`
--

INSERT INTO `member_information` (`id`, `name`, `father_name`, `contact`, `address`) VALUES
(3, 'Shahidul islam', 'Abdul Mazid', '01887621949', 'Satkania, Chittagong, Bangladesh.'),
(4, 'Saiful Islam', 'Sukot ali', '01735061377', 'Satkania, Chittagong, Bangladesh.'),
(5, 'Md Towhidul Islam', 'Ali Mia', '01811226581', 'Chittagong'),
(6, 'Sajedul Hoq', 'Kamal uddin', '01816594213', 'Boalkali, Chittagong'),
(7, 'Miftahul Nannat chy', 'Md rubel', '01836548962', 'Banskali, Chittagong'),
(8, 'Ariful Islam', 'Kaled Hossain', '01725642592', 'Satkania, Chittagong'),
(9, 'Harunur Rashed', 'Abdul Sukkor', '01521463201', 'Satkania, Chittagong'),
(10, 'Md Nasim', 'Atiq ullah', '01532145621', 'Commilla'),
(12, 'Md Rabib', 'Md Hakim', '01865421561', 'Vula'),
(13, 'Md Jahangir', 'Shafiqur Rahaman', '01608600386', 'Amirabad Lohagara');

-- --------------------------------------------------------

--
-- Table structure for table `mem_pay`
--

CREATE TABLE `mem_pay` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `pay` decimal(10,2) NOT NULL DEFAULT 0.00,
  `exp` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pdate` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mem_pay`
--

INSERT INTO `mem_pay` (`id`, `member_id`, `pay`, `exp`, `pdate`, `note`, `ref_id`) VALUES
(1, 3, '200.00', '0.00', '2022-10-13', 'Pay from shopping', 1),
(5, 3, '0.00', '283.50', '2022-10-31', 'Exp for 13.50 meal, per meal cost 21', NULL),
(6, 4, '0.00', '262.50', '2022-10-31', 'Exp for 12.50 meal, per meal cost 21', NULL),
(7, 5, '0.00', '262.50', '2022-10-31', 'Exp for 12.50 meal, per meal cost 21', NULL),
(8, 6, '0.00', '262.50', '2022-10-31', 'Exp for 12.50 meal, per meal cost 21', NULL),
(9, 7, '0.00', '220.50', '2022-10-31', 'Exp for 10.50 meal, per meal cost 21', NULL),
(10, 8, '0.00', '283.50', '2022-10-31', 'Exp for 13.50 meal, per meal cost 21', NULL),
(11, 9, '0.00', '283.50', '2022-10-31', 'Exp for 13.50 meal, per meal cost 21', NULL),
(12, 10, '0.00', '262.50', '2022-10-31', 'Exp for 12.50 meal, per meal cost 21', NULL),
(13, 11, '0.00', '262.50', '2022-10-31', 'Exp for 12.50 meal, per meal cost 21', NULL),
(15, 3, '350.00', '0.00', '2022-10-12', 'Pay from shopping', 3),
(16, 12, '500.00', '0.00', '2022-10-12', '', NULL),
(17, 13, '200.00', '0.00', '2022-10-12', 'Pay from shopping', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_auth`
--

INSERT INTO `tbl_auth` (`id`, `name`, `email_address`, `username`, `contact_no`, `password`, `photo`, `status`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Shahidul islam', 'shahiduli555@gmail.com', 'shahid', '01887621949', '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, 1, 1, '2022-10-08 08:43:10', '2022-10-12 16:10:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role_name`, `role`) VALUES
(1, 'Super Admin', 'superadmin'),
(2, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email_address`, `contact_no`, `password`) VALUES
(4, 'Shahidul islam', 'shahiduli555@gmail.com', '01887621949', '10470c3b4b1fed12c3baac014be15fac67c6e815');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_exp`
--
ALTER TABLE `daily_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_information`
--
ALTER TABLE `member_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mem_pay`
--
ALTER TABLE `mem_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
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
-- AUTO_INCREMENT for table `daily_exp`
--
ALTER TABLE `daily_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_information`
--
ALTER TABLE `member_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mem_pay`
--
ALTER TABLE `mem_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
