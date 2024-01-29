-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 09:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loadge1`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_out`
--

CREATE TABLE `check_out` (
  `id` int(10) NOT NULL,
  `checkout` datetime NOT NULL,
  `famt` double NOT NULL,
  `total` double NOT NULL,
  `cust_id` int(10) NOT NULL,
  `pay` varchar(20) NOT NULL,
  `rno` varchar(10) NOT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `check_out`
--

INSERT INTO `check_out` (`id`, `checkout`, `famt`, `total`, `cust_id`, `pay`, `rno`, `discount`) VALUES
(1, '2023-04-28 11:29:00', 0, 1770, 1, 'Online', 'A12', 150),
(2, '2023-04-28 11:46:00', 0, 2006, 2, 'Online', '1', 6),
(3, '2023-04-28 11:48:00', 0, 2596, 3, 'Online', '3', 200),
(4, '2023-05-05 08:18:00', 0, 1298, 4, 'Online', '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chek_in`
--

CREATE TABLE `chek_in` (
  `cust_id` int(10) NOT NULL,
  `full` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `datecheck` datetime NOT NULL,
  `type` varchar(10) NOT NULL,
  `room` varchar(10) NOT NULL,
  `rent` double NOT NULL,
  `bed` double NOT NULL,
  `coast` double NOT NULL,
  `status` int(10) NOT NULL,
  `total` double NOT NULL,
  `advance` double NOT NULL,
  `remain` double NOT NULL,
  `phone` varchar(12) NOT NULL,
  `proof` varchar(100) NOT NULL,
  `cmp` varchar(100) NOT NULL,
  `gst` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chek_in`
--

INSERT INTO `chek_in` (`cust_id`, `full`, `email`, `datecheck`, `type`, `room`, `rent`, `bed`, `coast`, `status`, `total`, `advance`, `remain`, `phone`, `proof`, `cmp`, `gst`) VALUES
(1, 'Akash Jogani', 'akashjogani93@gmail.com', '2023-04-28 11:22:00', '12 Hour', 'A12', 1000, 1, 500, 1, 1000, 500, 0, '9742020863', '', '', ''),
(2, 'Akash Jogani', 'akashjogani93@gmail.com', '2023-04-28 11:46:00', '12 Hour', '1', 1500, 1, 200, 1, 1500, 200, 0, '7676801589', '', '', ''),
(3, 'Mahesh Chougule', 'akashjogani93@gmail.com', '2023-04-28 11:48:00', '12 Hour', '3', 2000, 1, 200, 1, 2000, 200, 0, '9742020863', '', '', ''),
(4, 'Akash Baleshi Jogani', 'akashjogani93@gmail.com', '2023-05-05 07:50:00', '12 Hour', '2', 1000, 1, 100, 1, 1100, 0, 0, '9742020863', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `amt` double NOT NULL,
  `status` int(10) NOT NULL,
  `food` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freshup`
--

CREATE TABLE `freshup` (
  `id` int(11) NOT NULL,
  `hour` varchar(30) NOT NULL,
  `datetime` datetime NOT NULL,
  `roomno` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amt` double NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `pay` varchar(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freshup`
--

INSERT INTO `freshup` (`id`, `hour`, `datetime`, `roomno`, `name`, `amt`, `mobile`, `pay`, `status`) VALUES
(1, '1 Hour', '2023-04-27 13:59:00', '1', 'Akash', 500, '9742020863', 'Cash', 1),
(2, '1 Hour', '2023-04-28 11:39:00', '3', 'Akash Jogani', 1000, '9742020863', 'Cash', 1),
(3, '2 Hour', '2023-04-28 11:40:00', '2', 'Akash Jogani', 1255, '9742020863', 'Cash', 1),
(4, '3 Hour', '2023-04-28 11:42:00', '11', 'Akash Jogani', 1250, '9742020863', 'Cash', 1),
(5, '2 Hour', '2023-05-05 07:52:00', '4', 'Mahesh Chougule', 1250, '9742020863', 'Cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotelreg`
--

CREATE TABLE `hotelreg` (
  `hid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gst` varchar(30) NOT NULL,
  `fssi` varchar(20) NOT NULL,
  `lic` varchar(50) NOT NULL,
  `tax` varchar(20) NOT NULL,
  `add` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `land` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logo` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelreg`
--

INSERT INTO `hotelreg` (`hid`, `name`, `gst`, `fssi`, `lic`, `tax`, `add`, `contact`, `land`, `email`, `logo`) VALUES
(1, 'SHIVA HOTEL', '07AAGFF2194N1Z1', '07AAGFF2194N1Z1', '07AAGFF2194N1ZFF', '18', 'Makanur cross, national Highway, near harihar, Harihar, Karnataka 581123', '7686854284', '869574', 'shivahotel89@gmail.com', './img/shivam logo final png-27.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `hid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `pass`, `hid`) VALUES
(1, 'admin', 'pass', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `category` varchar(30) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amt` double NOT NULL,
  `type1` varchar(20) NOT NULL,
  `amt1` double NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `category`, `room_no`, `type`, `amt`, `type1`, `amt1`, `status`) VALUES
(23, 'Regular', 'A12', '12 Hour', 1000, '24 Hour', 2000, 0),
(24, 'Regular', '1', '12 Hour', 1500, '24 Hour', 2500, 0),
(25, 'Family', '2', '12 Hour', 1000, '24 Hour', 2000, 2),
(26, 'Family', '3', '12 Hour', 2000, '24 Hour', 3000, 2),
(27, 'Family', '4', '12 Hour', 1000, '24 Hour', 1500, 3),
(28, 'Regular', '15', '12 Hour', 1000, '24 Hour', 2000, 0),
(29, 'Regular', '11', '12 Hour', 2000, '24 Hour', 3000, 0),
(30, 'Regular', '5', '12 Hour', 1000, '24 Hour', 2000, 0),
(31, 'Regular', '17', '12 Hour', 2000, '24 Hour', 2000, 0),
(32, 'Family', '18', '12 Hour', 1500, '24 Hour', 2000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_out`
--
ALTER TABLE `check_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chek_in`
--
ALTER TABLE `chek_in`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `freshup`
--
ALTER TABLE `freshup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelreg`
--
ALTER TABLE `hotelreg`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_out`
--
ALTER TABLE `check_out`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chek_in`
--
ALTER TABLE `chek_in`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freshup`
--
ALTER TABLE `freshup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotelreg`
--
ALTER TABLE `hotelreg`
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
