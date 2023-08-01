-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 05:35 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Date`, `Name`, `Email`, `Subject`) VALUES
(2, '2022-06-01', 'Umesh shrestha', 'umesh.xtha123@gmail.com', 'umesh'),
(3, '0000-00-00', '', 'dsafsad@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `Title` varchar(200) NOT NULL,
  `Introduction` text NOT NULL,
  `Details` text NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact Us` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `category` enum('Cooked Food','Bakery','','') NOT NULL,
  `Price` int(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Ingridents` varchar(200) NOT NULL,
  `Status` enum('Available','Not Available','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `Name`, `category`, `Price`, `Image`, `Ingridents`, `Status`) VALUES
(482, 'chicken fried rice', 'Cooked Food', 300, '2022-06-24_05-34-54.jpeg', 'chicken', 'Available'),
(483, 'pastry', 'Bakery', 500, '2022-06-24_05-35-18.jpg', 'pizza', 'Available'),
(484, 'pastery', 'Bakery', 340, '2022-06-24_05-35-48.jpg', 'chop', 'Available'),
(486, 'cake', 'Bakery', 1000, '2022-06-24_05-37-06.jpg', 'wheat', 'Available'),
(487, 'Donut', 'Bakery', 100, '2022-06-24_05-37-27.jpg', 'wheat', 'Available'),
(488, 'chicken khana set', 'Cooked Food', 400, '2022-06-24_05-37-56.jpg', 'rice', 'Available'),
(489, 'Chicken Biryani', 'Cooked Food', 500, '2022-06-24_05-38-30.jpg', 'rice', 'Available'),
(490, 'mutton khana set', 'Cooked Food', 500, '2022-06-24_05-39-01.jpg', 'rice', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `orderfood`
--

CREATE TABLE `orderfood` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order status` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `contact` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('offline','online','','') NOT NULL,
  `type` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `firstname`, `lastname`, `username`, `contact`, `email`, `password`, `status`, `type`) VALUES
(13, 'bharat', 'shrestha', 'user', 0, '122334', '1234', 'offline', 'user'),
(14, '', '', 'adminefds', 0, '33212112322', '1234', 'offline', 'admin'),
(16, 'Umeshdafa', 'shresthaafds', 'adminadf', 0, '', '1234', 'offline', ''),
(17, 'dsafa', 'afasfd', 'adminefasf', 0, '8696987', '1234dfas', 'offline', 'admin'),
(18, 'dsafadafasf', 'afasfdsdafsa', 'adminefasfadfsf', 8696987, '0', '1234dfas', 'offline', ''),
(20, 'Umeshnkkjk', 'shresthakjjh', 'adminhhkkhj', 768788686, 'umesh.xjbkbtha123@gmail.com', '1234kl', 'offline', 'admin'),
(21, 'Umesh', 'shrestha', 'Umesh123', 0, '8696987', '12345', 'offline', 'admin'),
(22, 'dafafafd', 'daf', 'admin123', 0, '332424', '1234', 'offline', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderfood`
--
ALTER TABLE `orderfood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;

--
-- AUTO_INCREMENT for table `orderfood`
--
ALTER TABLE `orderfood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
