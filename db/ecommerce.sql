-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 03:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `is_deleted`) VALUES
(1, 'women', 0),
(2, 'men', 0),
(3, 'children', 0),
(4, 'pets', 0),
(6, 'babies', 0),
(7, 'blaaaa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `category_id` int(100) NOT NULL,
  `sub_category_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `price`, `image`, `description`, `category_id`, `sub_category_id`, `created_at`, `is_deleted`) VALUES
(14, 'hoodie', 1000, '1643207405_b0fba974466b64b0f059.jpg', 'Black, Size 15-17', 1, 1, '2022-01-26 14:29:48', 0),
(15, 'Denim jacket', 1000, '1643207446_721a7dcacea47dfdbce5.jpg', 'Grey, Size 10-12', 1, 1, '2022-01-26 14:30:46', 0),
(19, 'yoga pants', 300, '1643209001_348096a9615b89bd62ca.jpg', 'Black, Stretchy', 1, 1, '2022-01-26 14:55:26', 0),
(20, 'Trench coat', 500, '1643483797_2580c7eeb56ed72822ed.jpg', 'Brown, Size 10-12', 3, 4, '2022-01-26 14:59:14', 0),
(23, 'Coat', 1000, '1643515275_8445897e17c89f0bcd24.jpg', 'Beige, Size 13-15', 1, 1, '2022-01-30 04:01:15', 0),
(24, 'Trench coat', 1000, '1643516388_2703971aeb99b787bc8f.jpg', 'Yellow, Size 12-14', 1, 1, '2022-01-30 04:07:43', 0),
(25, 'Trench coat', 1000, '1643516963_6e03bd6af5992b4eed20.jpg', 'Brown, Size 14-15', 2, 2, '2022-01-30 04:29:23', 0),
(26, 'Jacket', 1000, '1643551895_c01b1b110987f6999ece.jpg', 'Black, Size 13-14', 2, 2, '2022-01-30 14:11:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub-categories`
--

CREATE TABLE `sub-categories` (
  `id` int(10) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `category_ID` int(10) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub-categories`
--

INSERT INTO `sub-categories` (`id`, `sub_category_name`, `category_ID`, `is_deleted`) VALUES
(1, 'formal', 1, 0),
(2, 'casual', 2, 0),
(3, 'casual', 4, 0),
(4, 'formal', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `role` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `gender`, `role`, `created_at`, `is_deleted`) VALUES
(1, 'olive', 'olive', 'mideva', 'midevaomm@gmail.com', '$2y$10$I42V4YJignfM8XINFurHQe0dGEnmV4DOvxg1KVOor1cdnCaj2Hic2', 'female', 1, '2022-01-25 05:39:25', 0),
(2, 'Mideva', 'Muloma', 'Mideva', 'mulomaomm@gmail.com', 'mideva', 'female', 1, '2022-01-25 05:39:25', 0),
(3, 'Muloma', 'olive', 'mideva', 'oliveomm@gmail.com', 'muloma', 'female', 2, '2022-01-25 05:39:25', 0),
(4, 'new', 'olive', 'mideva', 'new@gmail.com', '$2y$10$gWq8R3FPdO9Yc.0A1gtKk.elSAygXlnm2Wf7mSCOWyy1lYnmVsQeC', 'female', 2, '2022-01-25 05:39:25', 0),
(5, 'John', 'John', 'Doe', 'john@gmail.com', '$2y$10$4HXal3ZwkaDo4Ni8ks04DOCLyC/e7rWC9dGb.NwM6MQSOI48E3wj2', 'male', 2, '2022-01-25 05:39:25', 0),
(6, 'Save', 'olive', 'mideva', 'midomm@gmail.com', '$2y$10$4Aq5psP9Dg.mcVTwjum1L.HCc5g/zIpFL8WoV6wkUSG3FK7NqxIo2', 'female', 1, '2022-01-25 05:39:25', 0),
(7, 'user', 'new', 'user', 'user@gmail.com', '$2y$10$7VecueAqYukBt2YHFU4DZOXRLt51BzHkpq2nszzfyV1DvgYlmQaGO', 'female', 1, '2022-01-25 05:39:25', 0),
(8, 'username', 'user', 'name', 'name@gmail.com', '$2y$10$N8/FgIvS0jqq5C0i44h2neh4kauYlPowRj5FkhR8Mr1iHZNqWaUp.', 'female', 1, '2022-01-25 05:39:25', 0),
(9, 'my', 'name', 'is', 'my@gmail.com', '$2y$10$fJpC4DKtz.2FHdpM6.SxceKISvOt1yF0QlgPonjt7y4m1iz8iIJ9G', 'male', 1, '2022-01-25 05:39:25', 0),
(10, 'A', 'whole', 'new', 'world@gmail.com', '$2y$10$Y/xY1xix599QL1JQTHQFkuYFm5NGNR8jozu5M/cOnEh4WvwPVTeY.', 'male', 2, '2022-01-25 05:39:25', 0),
(12, 'client1', 'client1', 'client', 'client1@gmail.com', '$2y$10$KK/el1nKL6N76v8Iw/kxAeIGqVpoV4zF9CS/XLIoc0UAjohh2bqyO', 'female', 1, '2022-01-30 13:52:20', 0),
(13, 'admin1', 'admin1', 'admin', 'admin1@gmail.com', '$2y$10$//GuabJfqoQltvaS2EqlbeaamWjuCxbHIZqRaiN73LtZ.v.ZD7iXu', 'male', 2, '2022-01-30 13:53:02', 0),
(14, 'client2', 'Muloma', 'Mideva', 'client2@gmail.com', '$2y$10$1JFcZBaw0jRV/qYZfXacI.P5O1HDheA1DLpczuW5KTjQWm1CQPoYe', 'male', 1, '2022-01-30 14:06:13', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_name` (`category_id`),
  ADD KEY `sub-category_name` (`sub_category_id`);

--
-- Indexes for table `sub-categories`
--
ALTER TABLE `sub-categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_ID` (`category_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sub-categories`
--
ALTER TABLE `sub-categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
