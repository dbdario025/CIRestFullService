-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2016 at 06:46 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restmobileusage`
--

-- --------------------------------------------------------

--
-- Table structure for table `consumptions`
--

CREATE TABLE `consumptions` (
  `Id` int(11) NOT NULL,
  `Seconds` int(11) NOT NULL,
  `ConsumptionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `consumptions`
--

INSERT INTO `consumptions` (`Id`, `Seconds`, `ConsumptionDate`) VALUES
(1, 3000, '2016-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `Id` int(11) NOT NULL,
  `Cost` double NOT NULL,
  `DateCost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`Id`, `Cost`, `DateCost`) VALUES
(1, 20, '2016-05-15'),
(2, 40, '2016-05-12'),
(5, 60, '2016-05-13'),
(6, 30, '2016-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `reloads`
--

CREATE TABLE `reloads` (
  `Id` int(11) NOT NULL,
  `Value` double NOT NULL,
  `TotalSeconds` int(11) NOT NULL,
  `Mobile` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `ReloadDate` date NOT NULL,
  `FK_COSTS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `reloads`
--

INSERT INTO `reloads` (`Id`, `Value`, `TotalSeconds`, `Mobile`, `ReloadDate`, `FK_COSTS_ID`) VALUES
(3, 40000, 1333, '3132110596', '2016-05-21', 6),
(4, 40000, 1333, '3218776543', '2016-05-15', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumptions`
--
ALTER TABLE `consumptions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reloads`
--
ALTER TABLE `reloads`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_COSTS_ID` (`FK_COSTS_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumptions`
--
ALTER TABLE `consumptions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reloads`
--
ALTER TABLE `reloads`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reloads`
--
ALTER TABLE `reloads`
  ADD CONSTRAINT `reloads_ibfk_1` FOREIGN KEY (`FK_COSTS_ID`) REFERENCES `costs` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
