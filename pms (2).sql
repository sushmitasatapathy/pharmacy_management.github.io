-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 06:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'admin',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`) VALUES
(2, 'Group ', 'MPC17', 'rahulwaghmare751@gmail.com', '8080263327', '$2y$10$rOCl1N9zuFatEn2byIQZIOJqCUJJt1xzx3HnmcHRcwvfj1Vs8gGnq', 'admin', 'images.png');

-- --------------------------------------------------------

--
-- Table structure for table `distributer`
--

CREATE TABLE `distributer` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `DrugLicence` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `GST_No` varchar(255) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Salesman` varchar(255) NOT NULL,
  `dropp` int(255) NOT NULL,
  `inj` int(255) NOT NULL,
  `tablet` int(255) NOT NULL,
  `syrup` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributer`
--

INSERT INTO `distributer` (`id`, `Name`, `DrugLicence`, `Address`, `GST_No`, `phone_no`, `email`, `Salesman`, `dropp`, `inj`, `tablet`, `syrup`) VALUES
(1, 'Baheti Distributers', 'MH1234', 'solapur', ' 22AABCU9603R1ZX', 2147483647, 'bahetidesti@gmail.com', 'Vedant', 0, 300, 150, 0),
(2, 'rahul distributers', 'dfs44r', 'solapur', 'ac5345345345345', 2147483647, 'rahulwaghmare@ternaengg.ac.in', 'RAHUL WAGHMARE', 0, 0, 0, 0),
(4, 'Krishna', '90906767', 'ptaNhi', '2700000', 2147483647, 'krishna@gmail.com', 'Krishna', 0, 0, 0, 0),
(5, 'sidhaaaa', 'uh-13-456787', 'solapur', '27777777777777777', 2147483647, 'sudhi@gmail.com', 'sidhant', 0, 0, 0, 0),
(6, 'Reshma', '234ads', 'mumbai', '343sde555555555', 2147483647, 'reshna@gmailcom', 'Reshma', 0, 0, 0, 0),
(7, 'United medicine agency', 'AH12NAss', 'Solapur', 'AA27ASHDGA34', 2147483647, 'navin@gmail', 'Reshma', 0, 0, 0, 0),
(8, 'baheti destributers', 'up-sdsa-asd23', 'Solapur', '27888888888888', 2147483647, 'rahulwaghmare751@gmail.com', 'sidhate', 0, 0, 0, 0),
(9, 'Baldawa distributers', 'up-sdsa-asd23', 'Navi Mumbai', 'AA27ASHDGA34', 2147483647, 'baheti@gmail.com', 'karishma', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'manager',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `district` varchar(30) DEFAULT NULL,
  `SOLD` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`, `district`, `SOLD`) VALUES
(6, 'John', 'Sina', 'john@sina.com', '9078563412', '$2y$10$q47GJObI5t2mQ1CNwbmFyOlqDC/yKkxFRv4XOxryuhZvKeMhhxc7.', 'manager', 'avatar.png', 'Pune', NULL),
(7, 'Brock', 'Lesnar', 'brock@lesnar.com', '01700000000', '$2y$10$7l2gCp07viznC2PyWouDeuKB85JuxOtHUYmMt8Fs.8LDa7RZBEaRW', 'manager', 'avatar.png', 'Osmanabad', NULL),
(8, 'rahul', 'Gorkhnath', 'raviraj@lesnar.com', '1234567890', '$2y$10$.2euj43a5ToPMFmBZ1BYfe0X7Fx1ouNfRbf2kwqjJ63tNDR3nC0iy', 'manager', 'avatar.png', 'Solapur', '200'),
(9, 'Waghmare', 'Gorkhnath', 'rahulwaghmare751@gmail.com', '8080263326', '$2y$10$Uh1p7UVrPLkH6rKlCsTly.pkC13lIHiLRFL96EFwa6tbk/zFsnfwO', 'manager', 'avatar.png', 'Beed', NULL),
(11, 'Bhagyashri', 'birajdar', 'bhag@gmail.com', '9023752743', '$2y$10$JEQ..YeD1oNz8mKyZWWKT.sZPSzIThyjvq/HrfW.D9O9tcIu5OhvS', 'manager', 'avatar.png', NULL, NULL),
(12, 'RAHUL', 'WAGHMARE', 'rahulwaghmare@ternaengg.ac.in', '9078563456', '$2y$10$hQQb1nnM7EYgsiEJGcu6uO8k5pD7E9qEOH7evbQIwtNropq/SYBE.', 'manager', 'avatar.png', NULL, NULL),
(13, 'aman', 'jamadar', 'aman@gmail.com', '1234567890', '$2y$10$1DnBts8Kedg0uH8CYgWAgutKH7bxSgHNPjtYLfVzMykWJEPVnBwmO', 'manager', 'avatar.png', NULL, NULL),
(14, 'sushi', 'satapati', 'admin@admin.com', '9078563412', '$2y$10$3oyU6mRFKEeyLQFyvZmfRui6.M/1D996O5jMwfHZ.LagJHXYU.Kby', 'manager', 'avatar.png', NULL, NULL),
(15, 'VINAY', 'MANE', 'vinay50@gmail.com', '7856345600', '$2y$10$D1r/ywWWfnYtpL3HDORfMuiLAQ5LsV1nSTNHnu8TYfjygTZD09ym6', 'manager', 'avatar.png', NULL, NULL),
(17, 'sonali', 'bansode', 'sonalibansode@gmaol.com', '8967453322', '$2y$10$kVeqPzTSSkZDZglkpdfsCOVxYe18WToaxExFah59.bgZNLImzED6i', 'manager', 'avatar.png', NULL, NULL),
(18, 'Sushmita ', 'Satapati', 'sushmita@gmail.com', '9823283401', '$2y$10$rUfiwITWO9JZpo0POIHaNuHXR7Hzub.vo5ZW01Sljr.wP.k51OFdy', 'manager', 'avatar.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists`
--

CREATE TABLE `pharmacists` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'pharmacist',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `district` varchar(30) DEFAULT NULL,
  `SOLD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacists`
--

INSERT INTO `pharmacists` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`, `district`, `SOLD`) VALUES
(7, 'Pharmacist', 'Two', 'pharma@thre.com', '01700000000', '$2y$10$5pi1bPBuaQt4s83hGFcTH.eRZvFqsMDDN.onp6.HJENwo0jqJqKjq', 'pharmacist', 'avatar.png', 'Osmanabad', NULL),
(8, 'Pharmacist', 'Three', 'pharmacist@three.com', '0170000000', '$2y$10$RqNzWY0cxl9UCf01J.N9LOTTPb7GKarWAwM7/i8T8koNoFqQQk1Li', 'pharmacist', 'avatar.png', 'Beed', NULL),
(9, 'Pharmacist', 'Four', 'pharmacist@four.com', '01700000000', '$2y$10$GVggPVg5obYkaX87nzDA/u7uyMA.ej4A96RNXtLXpFWeENLxed.T6', 'pharmacist', 'avatar.png', 'Solapur', NULL),
(13, 'sushi', 'satapati', 'admin@admin.com', '9078563412', '', 'pharmacist', 'avatar.png', 'mumbai', NULL),
(15, 'PAVAN', 'KOTA', 'pavankota12@gmail.com', '7766550000', '', 'pharmacist', 'avatar.png', 'solapur', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(255) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `sale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `Product`, `sale`) VALUES
(19, 'Covid-kit', '100'),
(50, 'Syrup', '50'),
(100, 'Dropp', '100'),
(101, 'INJ', '299'),
(102, 'Tablet', '150');

-- --------------------------------------------------------

--
-- Table structure for table `salesmans`
--

CREATE TABLE `salesmans` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'salesman',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `SOLD` varchar(20) DEFAULT NULL,
  `district` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesmans`
--

INSERT INTO `salesmans` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`, `SOLD`, `district`) VALUES
(9, 'Salesman', 'One', 'salesman@one.com', '01700000000', '$2y$10$QcBETp.yv7xnE2gtnGKN2eQiwCW4jwobEPoOBGK/qQ3knrW4OsEdG', 'salesman', 'avatar.png', '300', ''),
(10, 'Shubham', 'Dhoke baj', 'ravirajkudal123@gmail.com', '93258 5223', '$2y$10$gT2rkTPNMBJj.x1vSyAEIuySzhbxR6tXBjwgGQEBEe3TvnJjooWBK', 'salesman', 'avatar.png', '200', ''),
(11, 'rahul', 'Sharma', 'sushmita@gmail.com', 'admin@admi', '$2y$10$hVpNoh1wFWsIEhcRn0uCfe4dnAEAObzyZ7OVdCDVJcFoolUhyGOeC', 'salesman', 'avatar.png', '100', ''),
(12, 'RAHUL', 'WAGHMARE', 'rahulwaghmare@ternaengg.ac.in', '9078563456', '$2y$10$bJ22VOGpPXijbgpiEz7yzuqLpkk87HursZ/kdRJrv4PDBvLW1WnLu', 'salesman', 'avatar.png', '500', ''),
(13, 'suhbham', 'kore', 'suhbham@gmail.com', '9999999999', '', 'salesman', 'avatar.png', '100', ''),
(15, 'navin', 'yanam', 'navin@gmail', '7987967796', '', 'salesman', 'avatar.png', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `MedicineName` varchar(100) NOT NULL,
  `MFGDate` date NOT NULL,
  `EXPDate` date NOT NULL,
  `Sells` int(40) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `id` int(255) NOT NULL,
  `InvoiceNo` varchar(255) NOT NULL,
  `BatchNo` varchar(255) NOT NULL,
  `Distributer` varchar(255) NOT NULL,
  `Free` int(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`MedicineName`, `MFGDate`, `EXPDate`, `Sells`, `Date`, `id`, `InvoiceNo`, `BatchNo`, `Distributer`, `Free`, `TYPE`, `total`) VALUES
('VOMIKIND SYRUP', '2021-10-27', '2021-10-31', 50, '2021-10-08 10:26:00', 10, 'BS-202', 'AL2021', 'RAHUL  DESTRIBUTERS', 25, 'SYRUP', '75'),
('VOMIKIND md 4', '2021-10-11', '2021-10-12', 100, '2021-10-11 11:01:00', 11, 'BS-10002', 'AL2021', 'Baheti destributers', 50, 'TABLET', '150'),
('VOMIKIND INJ', '2021-10-31', '2024-12-11', 50, '2021-10-09 14:05:00', 12, 'bs-10003', 'IN2021', 'Krishna', 25, 'TABLET', '75'),
('VOMIKIND DS DROP', '2021-10-10', '2024-12-11', 100, '2021-10-11 11:00:00', 13, 'BS-10001', 'DS2001', 'RAHUL  DESTRIBUTERS', 50, 'drop', '150'),
('VOMIKIND INJ', '2021-10-11', '2022-11-11', 100, '2021-10-11 11:17:00', 14, 'BS-10001', 'DS2001', 'Baheti destributers', 50, 'inj', '150'),
('covid kit', '2021-10-11', '2021-10-11', 100, '2021-10-11 11:33:00', 15, 'BS-10001', 'DS2001', 'Krishna', 50, 'co-kit', '150'),
('VOMIKIND INJ', '2021-10-12', '2021-10-30', 50, '2021-10-12 19:28:00', 16, 'sa5652', 'BS4222', 'rahul distributers', 25, 'inj', '75'),
('VOMIKIND INJ', '2021-10-12', '2021-10-12', 49, '2021-10-30 19:30:00', 17, 'sa5652', 'BS4222', 'rahul distributers', 1, 'inj', '50'),
('VOMIKIND INJ', '2021-10-13', '2021-10-13', 100, '2021-10-13 11:03:00', 18, 'BS-10008', 'AL2021', 'Baheti Distributers', 50, 'inj', '150'),
('VOMIKIND INJ', '2021-10-22', '2021-10-22', 50, '2021-10-22 13:22:00', 19, '656565', 'BS4222', 'rahul distributers', 25, 'inj', '75'),
('VOMIKIND INJ', '2021-10-28', '2021-10-28', 49, '2021-10-28 18:23:00', 20, 'sa5611', 'BS4222', 'rahul distributers', 1, 'inj', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributer`
--
ALTER TABLE `distributer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesmans`
--
ALTER TABLE `salesmans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distributer`
--
ALTER TABLE `distributer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pharmacists`
--
ALTER TABLE `pharmacists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `salesmans`
--
ALTER TABLE `salesmans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
