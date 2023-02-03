-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 10:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle-parking-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `Slot` varchar(50) NOT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` varchar(100) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Role`, `Slot`, `UserName`, `MobileNumber`, `Email`, `Address`, `Password`, `AdminRegdate`) VALUES
(46, 'Admin', 'Arcelor Mittal Orbit', 'Ankit', 2222222222, 'qq@gmail.com', 'sokefnwef', 'ankit', '2022-06-06 05:34:11'),
(47, 'P-Admin', 'Arcelor Mittal Orbit', 'Ankit', 2222222222, 'ankit2@gmail.com', 'iuh', 'ankit', '2022-06-06 05:36:53'),
(48, 'Vendor', 'Arcelor Mittal Orbit', 'Ankit', 2222222222, 'ankit3@gmail.com', 'jkb', 'ankit', '2022-06-06 05:37:31'),
(49, 'P-Admin', 'Arcelor Mittal Orbit', 'Ankit', 2222222222, 'ankit1@gmail.com', '', 'ankit', '2022-06-06 10:10:43'),
(52, '', '', 'aa', 2222222222, 'aa@gmail.com', 'aaa', 'y6', '2022-06-07 09:46:00'),
(53, 'aa', 'aa', 'aa', 1234567890, 'aaa@gmail.com', 'aaa', 'aa', '2022-06-12 15:01:10'),
(55, '', '', 'aaa', 4444444444, 'sanu420@gmail.com', 'te5te5', 'sanu', '2022-06-12 18:32:44'),
(57, 'P-Admin', 'Arcelor Mittal Orbit', 'aaa', 1234567899, 'aaa420@gmail.com', 'aaaa', 'aa', '2022-06-12 18:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `ID` int(11) NOT NULL,
  `Location` varchar(40) NOT NULL,
  `Available` int(4) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `TwoWheeler` int(4) NOT NULL,
  `ThreeWheeler` int(4) NOT NULL,
  `FourWheeler` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`ID`, `Location`, `Available`, `CompanyName`, `TwoWheeler`, `ThreeWheeler`, `FourWheeler`) VALUES
(1, 'Arcelor Mittal Orbit', 50, 'h', 1, 2, 3),
(2, 'Crossness Pumping Station', 0, 'B', 10, 20, 30),
(3, 'Telegraph Hill Upper Park', 0, '', 0, 0, 0),
(4, 'Greenwich Park', 2, 'W', 0, 0, 20),
(5, 'Victoria Park', 0, '', 0, 0, 0),
(6, 'Barbican Centre', 0, '', 0, 0, 0),
(7, 'Eitham Palace', 0, 'C', 20, 25, 30),
(8, 'Dulwich Picture Gallery', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_pass`
--

CREATE TABLE `monthly_pass` (
  `ID` int(5) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `AddedBy` varchar(30) NOT NULL,
  `RegistrationNumber` varchar(30) NOT NULL,
  `VehicleCompanyname` varchar(30) NOT NULL,
  `VehicleCategory` varchar(50) NOT NULL,
  `OwnerName` varchar(50) NOT NULL,
  `OwnerContactNumber` int(10) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `Charge` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_pass`
--

INSERT INTO `monthly_pass` (`ID`, `Location`, `AddedBy`, `RegistrationNumber`, `VehicleCompanyname`, `VehicleCategory`, `OwnerName`, `OwnerContactNumber`, `FromDate`, `ToDate`, `Charge`) VALUES
(11, '', '', 'kkkk', 'tr44t', 'Two Wheeler', 'wdawd', 2147483647, '2022-03-01', '2022-03-31', 20),
(14, '', 'sanu', '67gh87y', 'dwawa', 'Three Wheeler', 'ravi', 2147483647, '2022-03-12', '2022-03-31', 66),
(15, '', 'sanu', 'mm_22', 'tr44t', 'Two Wheeler', 'nmvah', 2147483647, '2022-03-14', '2022-03-31', 30),
(16, '', 'sanu', 'mm_22', 'tr44t', 'Two Wheeler', 'nmvah', 2147483647, '2022-03-14', '2022-03-31', 30),
(17, '', 'xyz', 'aaaa', 'marut', 'Two Wheeler', 'ravi', 2147483647, '2022-03-14', '2022-03-31', 30),
(19, '', 'sanu', 'grete5', 'tr44t', 'Two Wheeler', 'ewfwewf', 98930966, '2022-03-22', '2022-03-31', 544),
(20, '', 'ankit verma', '67gh87y', '', 'Three Wheeler', 'kjh', 2147483647, '2022-04-04', '2022-04-29', 676),
(21, '', '', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0),
(22, 'Arcelor Mittal Orbit', 'Ankit', 'wwww', 'dsf', 'Two Wheeler', 'aaaa', 2147483647, '2022-06-07', '2022-06-20', 63),
(23, 'Arcelor Mittal Orbit', 'Ankit', 'hhh', '', 'Two Wheeler', 'hfvuh', 1111111111, '2022-06-02', '2022-06-10', 67),
(24, 'Arcelor Mittal Orbit', 'Ankit', 'hhhh', 'eff', 'Two Wheeler', 'fesfsef', 1111111111, '2022-06-05', '2022-06-28', 22),
(25, 'Victoria Park', 'Ankit', 'hhhh', '', 'Three Wheeler', 'sW', 1111111111, '2022-06-07', '2022-06-22', 99),
(26, 'Victoria Park', 'Ankit', 'hhhh', '', 'Three Wheeler', 'sW', 1111111111, '2022-06-07', '2022-06-22', 99),
(27, 'Arcelor Mittal Orbit', 'Ankit', 'hhhh', '', 'Two Wheeler', '434', 1111111111, '2022-06-08', '2022-05-30', 63),
(28, 'Arcelor Mittal Orbit', 'Ankit', 'mmmm', '', 'Two Wheeler', 'wwwww', 1234567890, '2022-06-12', '2022-06-30', 44),
(29, '', 'Ankit', 'aa', '', 'Four Wheeler', 'aaa', 1234567890, '2022-06-12', '2022-06-23', 87),
(30, 'Arcelor Mittal Orbit', 'Ankit', 'kkkk', '', 'Two Wheeler', 'wdawd', 2147483647, '2022-06-07', '2022-06-30', 32),
(31, 'Arcelor Mittal Orbit', 'Ankit', 'hhhh', '', 'Two Wheeler', '434', 1111111111, '2022-06-12', '2022-06-23', 63),
(32, 'Arcelor Mittal Orbit', 'Ankit', 'dd', '', 'Three Wheeler', 'dddd', 2147483647, '2022-05-31', '2022-06-23', 54),
(33, 'Arcelor Mittal Orbit', 'Ankit', 'ttttt', '', 'Two Wheeler', 'ttttt', 2147483647, '2022-06-13', '2022-06-30', 534);

-- --------------------------------------------------------

--
-- Table structure for table `userapply`
--

CREATE TABLE `userapply` (
  `id` int(11) NOT NULL,
  `parkingplace` varchar(50) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `vehcat` varchar(30) NOT NULL,
  `parkingtype` varchar(50) NOT NULL,
  `Description` mediumtext NOT NULL,
  `regno` varchar(30) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `currentstatus` int(3) NOT NULL DEFAULT 0,
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `ApprovedBy` varchar(30) NOT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userapply`
--

INSERT INTO `userapply` (`id`, `parkingplace`, `ToDate`, `FromDate`, `vehcat`, `parkingtype`, `Description`, `regno`, `PostingDate`, `currentstatus`, `AdminRemark`, `AdminRemarkDate`, `ApprovedBy`, `Status`, `IsRead`, `userid`) VALUES
(33, 'Morar', '', '2022-06-01', 'Two-Wheeler', 'Today', 'aedae sdcad', '', '2022-06-01 05:29:48', 0, NULL, NULL, '', 2, 0, 5),
(34, 'Thathipur', '', '2022-06-01', 'Two-Wheeler', 'Today', 'r3f weff ', '', '2022-06-01 05:31:39', 0, NULL, NULL, '', 2, 0, 5),
(35, 'Thathipur', '2022-06-02', '2022-06-01', 'Two-Wheeler', 'Today', 'fsd dvf', '', '2022-06-01 05:34:35', 0, NULL, NULL, '', 1, 0, 5),
(36, 'Thathipur', '2022-06-02', '2022-06-01', 'Two-Wheeler', 'Today', 'fsd dvf', '', '2022-06-01 05:38:23', 0, NULL, NULL, '', 1, 0, 5),
(37, 'Bada', '2022-06-02', '2022-06-01', 'Two-Wheeler', 'Weekly', 'WD ', '', '2022-06-01 10:44:54', 0, NULL, NULL, '', 1, 0, 5),
(40, 'Thathipur', '2022-06-05', '2022-06-01', 'Two-Wheeler', 'Today', ' sdf dfb', '', '2022-06-02 09:46:42', 0, NULL, NULL, '', 0, 0, 5),
(41, 'Thathipur', '2022-06-01', '2022-06-02', 'Two-Wheeler', 'Today', 'dasd', '', '2022-06-03 09:09:18', 0, NULL, NULL, '', 0, 0, 5),
(42, 'Morar', '2022-06-01', '2022-06-02', 'Two-Wheeler', 'Today', 'dasd', '', '2022-06-03 09:09:55', 0, NULL, NULL, '', 0, 0, 5),
(44, 'Thathipur', '2022-06-03', '2022-06-01', 'Two-Wheeler', 'Today', 'dghdt', '', '2022-06-03 10:04:15', 0, NULL, NULL, '', 1, 0, 5),
(45, 'Thathipur', '2022-06-30', '2022-06-02', 'Two-Wheeler', 'Today', 'ljloj', 'MP 06 88', '2022-06-03 10:09:22', 0, NULL, NULL, '', 1, 0, 5),
(46, 'Arcelor Mittal Orbit', '2022-06-21', '2022-06-06', 'Two-Wheeler', 'Today', 'snkfa fh oaeief', 'ffff', '2022-06-06 09:50:19', 0, NULL, NULL, '', 0, 0, 5),
(47, 'Arcelor Mittal Orbit', '2022-06-21', '2022-06-06', 'Two-Wheeler', 'Today', 'snkfa fh oaeief', 'ffff', '2022-06-06 09:50:29', 0, NULL, NULL, '', 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `ID` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobilenum` int(10) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`ID`, `username`, `password`, `Email`, `Mobilenum`, `Address`) VALUES
(1, 'yoyo', 'yoyo', '', 0, ''),
(2, 'sanu', '123456', 'anujhere11@gmail.com', 2147483647, ''),
(3, 'sanu', '777777', 'infofammart@gmail.com', 1234567890, ''),
(4, 'ankit verma', '123456', 'snuverma@gmail.com', 1234567890, 'Near pipal wali mata morena M.p Gwalior'),
(5, 'testing', '12345', 'testing@gmail.com', 2147483641, '21,nehrua'),
(6, '', '', '', 1111111111, ''),
(7, 'admin', '1234', 'sanuverma298@gmail.com', 111, 'Jeen gali no. 3 morena m.p'),
(8, 'admin', '1234', 'dade@12', 21212, 'Jeen gali no. 3 morena m.p');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `ID` int(10) NOT NULL,
  `Parkingplace` varchar(30) NOT NULL,
  `ParkingNumber` int(5) NOT NULL,
  `AddedBy` varchar(30) NOT NULL,
  `RemoveBy` varchar(30) NOT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `Regular` varchar(30) NOT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`ID`, `Parkingplace`, `ParkingNumber`, `AddedBy`, `RemoveBy`, `VehicleCategory`, `RegistrationNumber`, `Regular`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(70, 'vehicle_info', 11, 'sanu', 'sanu', 'Two Wheeler', 'aaaa', 'Once', '2022-06-04 10:14:01', '2022-06-04 10:14:12', '10', '', 'Out'),
(71, 'vehicle_info', 11, 'sanu', 'sanu', 'Two Wheeler', 'aaaa', 'Monthly', '2022-06-04 10:14:25', '2022-06-04 10:14:29', '0', '', 'Out'),
(72, 'vehicle_info', 11, 'sanu', 'sanu', 'Two Wheeler', 'hhhh', 'Once', '2022-06-04 10:17:17', '2022-06-04 10:17:35', '10', '', 'Out'),
(73, 'vehicle_info', 11, 'sanu', 'sanu', 'Two Wheeler', 'hhhh', 'Once', '2022-06-04 10:18:11', '2022-06-04 10:18:22', '10', '', 'Out'),
(74, 'vehicle_info', 11, 'sanu', 'sanu', 'Two Wheeler', 'hhhh', 'Monthly', '2022-06-04 10:18:46', '2022-06-04 10:18:53', '0', '', 'Out'),
(75, 'vehicle_info', 11, 'sanu', 'sanu', 'Two Wheeler', 'hhhh', 'Once', '2022-06-04 10:19:55', '2022-06-04 10:21:16', '10', '', 'Out'),
(76, 'vehicle_info', 12, 'sanu', '', 'Two Wheeler', 'kkkk', 'Once', '2022-06-04 10:20:03', NULL, '', '', ''),
(77, 'vehicle_info', 12, 'sanu', '', 'Two Wheeler', 'hhhh', 'Once', '2022-06-06 04:09:06', NULL, '', '', ''),
(78, 'Arcelor Mittal Orbit', 13, 'Ankit', '', 'Two Wheeler', 'vvvvv', 'Once', '2022-06-06 07:37:13', NULL, '', '', ''),
(79, 'Arcelor Mittal Orbit', 14, 'Ankit', 'Ankit', 'Two Wheeler', 'aaa', 'Once', '2022-06-06 07:38:41', '2022-06-06 07:39:02', '10', '', 'Out'),
(80, 'Arcelor Mittal Orbit', 1, 'Ankit', 'Ankit', 'Two Wheeler', 'aaa', 'Once', '2022-06-06 07:40:09', '2022-06-06 07:40:20', '10', '', 'Out'),
(81, 'Arcelor Mittal Orbit', 56, 'Ankit', 'Ankit', 'Two Wheeler', 'bbb', 'Once', '2022-06-06 07:40:57', '2022-06-06 07:41:16', '10', '', 'Out'),
(82, 'Arcelor Mittal Orbit', 56, 'Ankit', 'Ankit', 'Two Wheeler', 'hhh', 'Once', '2022-06-06 07:42:19', '2022-06-06 07:42:30', '10', '', 'Out'),
(83, 'Arcelor Mittal Orbit', 56, 'Ankit', 'Ankit', 'Four Wheeler', 'zzz', 'Monthly', '2022-06-06 07:43:05', '2022-06-06 07:43:19', '0', '', 'Out'),
(84, 'Arcelor Mittal Orbit', 56, 'Ankit', 'Ankit', 'Four Wheeler', 'sss', 'Once', '2022-06-06 07:43:35', '2022-06-06 07:43:47', '30', '', 'Out'),
(85, 'Arcelor Mittal Orbit', 56, 'Ankit', 'Ankit', 'Two Wheeler', 'ddd', 'Monthly', '2022-06-06 07:44:30', '2022-06-06 08:13:54', '10', '', 'Out'),
(86, 'Arcelor Mittal Orbit', 57, 'Ankit', 'Ankit', 'Four Wheeler', 'MP 06 88', 'Monthly', '2022-06-06 08:54:20', '2022-06-06 08:56:34', '0', '', 'Out'),
(87, 'Arcelor Mittal Orbit', 57, 'Ankit', 'Ankit', 'Two Wheeler', 'MP 06 88', 'Monthly', '2022-06-06 08:56:51', '2022-06-06 08:57:06', '0', '', 'Out'),
(88, 'Arcelor Mittal Orbit', 57, 'Ankit', '', 'Two Wheeler', 'aaaa', 'Once', '2022-06-06 10:23:53', NULL, '', '', ''),
(89, 'Arcelor Mittal Orbit', 58, 'Ankit', '', 'Two Wheeler', 'gggg', 'Once', '2022-06-07 04:44:07', NULL, '', '', ''),
(90, 'Arcelor Mittal Orbit', 59, 'Ankit', '', 'Two Wheeler', 'cccchf', 'Once', '2022-06-07 04:56:57', '2022-06-07 10:39:19', '', '', ''),
(91, 'Arcelor Mittal Orbit', 1, 'Ankit', 'Ankit', 'Two Wheeler', 'ccjrjr', 'Once', '2022-06-07 07:09:51', '2022-06-12 19:17:21', '34', '', 'Out'),
(92, 'Arcelor Mittal Orbit', 60, 'Ankit', 'Ankit', 'Four Wheeler', 'Mp 07 aaa', 'Once', '2022-06-07 09:40:57', '2022-06-07 09:41:29', '30', '', 'Out'),
(93, 'Arcelor Mittal Orbit', 58, 'Ankit', 'Ankit', 'Two Wheeler', 'vvvvv', 'Once', '2022-06-07 09:53:53', '2022-06-07 09:55:19', '10', '', 'Out'),
(94, 'Greenwich Park', 2, 'Ankit', 'Ankit', 'Four Wheeler', 'aaa', 'Once', '2022-06-12 17:00:26', '2022-06-12 17:15:14', '20', '', 'Out'),
(95, 'Arcelor Mittal Orbit', 59, 'Ankit', 'Ankit', 'Two Wheeler', 'aaa', 'Once', '2022-06-12 18:47:45', '2022-06-12 19:10:15', '1', '', 'Out');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `monthly_pass`
--
ALTER TABLE `monthly_pass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userapply`
--
ALTER TABLE `userapply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`userid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `monthly_pass`
--
ALTER TABLE `monthly_pass`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `userapply`
--
ALTER TABLE `userapply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
