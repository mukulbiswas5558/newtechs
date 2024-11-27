-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 06:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(100) NOT NULL,
  `status` int(20) NOT NULL,
  `docId` int(20) NOT NULL,
  `patientId` int(20) NOT NULL,
  `bookingDate` date NOT NULL,
  `symptoms` varchar(500) NOT NULL,
  `prescription` varchar(500) NOT NULL,
  `prescribedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `status`, `docId`, `patientId`, `bookingDate`, `symptoms`, `prescription`, `prescribedDate`) VALUES
(1, 2, 4, 7, '2022-11-23', 'sllping', 'dd', '2022-11-23'),
(2, 1, 8, 5, '2022-11-23', 'pain', '', '2222-03-11'),
(3, 2, 4, 5, '2022-11-23', 'vomiting', 'pain leg', '2022-11-24'),
(4, 1, 6, 7, '2022-11-24', 'pain in hand\nwb\n74232211', '', '0000-00-00'),
(5, 2, 4, 5, '2022-11-24', 'sickness', 'prescrobe to lansapazle', '2022-11-24'),
(6, 2, 4, 9, '2022-11-24', 'skin damage', 'prescribe by sumit', '2022-11-24'),
(7, 1, 4, 10, '2022-11-25', 'type of symtoms', '', '0000-00-00'),
(8, 1, 8, 10, '2022-11-25', 'type of symptoms', '', '0000-00-00'),
(9, 2, 4, 11, '2022-11-25', 'type symptom\n\n\n\n\n\n\n\n\n\n\n\n\n\n', 'prescribe medicine', '2022-11-25'),
(10, 1, 12, 5, '2023-02-05', 'add symton cold fever', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `useracc`
--

CREATE TABLE `useracc` (
  `id` int(100) NOT NULL,
  `UserName` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Account_For` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Phone1` varchar(20) NOT NULL,
  `Status` int(20) NOT NULL,
  `last_login` date NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Notes` varchar(500) NOT NULL,
  `House` varchar(100) NOT NULL,
  `Street` varchar(500) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Zip` varchar(20) NOT NULL,
  `City` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useracc`
--

INSERT INTO `useracc` (`id`, `UserName`, `password`, `Name`, `Title`, `Account_For`, `State`, `Phone1`, `Status`, `last_login`, `Location`, `Notes`, `House`, `Street`, `Country`, `Zip`, `City`) VALUES
(3, 'mukulbiswas5558@gmail.com', 'password', 'mukul', 'Dr.', 'admin', 'wb', '4323432423', 1, '2023-02-05', 'kolkata', 'hi', 'jszxx', 'zx', 'india', '657', 'SOVAPUR'),
(4, 'sumit@gmail.com', 'password', 'sumit5', 'Dr.', 'doctor', 'wb', '89222000', 1, '2022-11-25', 'dd', 'hi sumit', '', '', '', '', ''),
(5, 'simanto@gmail.com', 'password', 'simanto', 'Mr.', 'patient', 'wb', '012331', 1, '2023-02-05', 'szs', '', '', '', '', '', ''),
(6, 'smit@gmail.com', 'password', 'smit', 'Dr.', 'doctor', 'wb', '012331', 1, '2022-11-22', 'chhitka', '', '', '', '', '', ''),
(7, 'parvej@gmail.com', 'password', 'parevej', 'Mrs.', 'patient', 'wb', '894253445x', 1, '2022-11-24', 'serampore', '', '', '', '', '', ''),
(8, 'manoj@gmail.com', 'password', 'manoj', 'Dr.', 'doctor', 'wb', '89443342', 1, '2022-11-23', 'koochbihar', '', '', '', '', '', ''),
(9, 'nirmal@gmail.com', 'password', 'nirmal', 'Mr.', 'patient', 'west bengal', '3242342332', 1, '2022-11-24', 'bankura', '', '', '', '', '', ''),
(10, 'chandan@gmail.com', 'password', 'chandan bala', 'Mr.', 'patient', 'west bengal', '8966666666', 1, '2022-11-25', 'chhitka\ntehatta\nnadia', '', '', '', '', '', ''),
(11, 'sujai@gmail.com', 'password', 'sujai', 'Mr.', 'patient', 'west bengal', '678998898', 1, '2022-11-25', 'tehatta\n7562561', '', '', '', '', '', ''),
(12, 'chandan@gmail.com', 'password', 'chandan', 'Dr.', 'doctor', 'wb', '24321334', 1, '2023-02-05', 'chhitka nadia', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `useracc`
--
ALTER TABLE `useracc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `useracc`
--
ALTER TABLE `useracc`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
