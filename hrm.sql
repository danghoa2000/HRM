-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 08:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `avatar` varchar(555) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `pass`, `fullname`, `avatar`) VALUES
('admin', 'admin', 'Admin', NULL),
('hoa', 'hoa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id_attendance` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `num_hr` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `id_cashadvance` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`id_cashadvance`, `id_employee`, `date`, `amount`) VALUES
(1, NULL, '2021-06-01', 555),
(2, NULL, '2021-06-01', 555),
(3, NULL, '2021-06-01', 555),
(4, NULL, '2021-06-01', 555),
(6, NULL, '2021-06-01', 555),
(7, NULL, '2021-06-01', 555),
(8, NULL, '2021-06-01', 555),
(9, NULL, '2021-06-01', 555),
(10, NULL, '2021-06-01', 555),
(11, NULL, '2021-06-01', 100),
(12, 3, '2021-06-01', 66),
(13, 9, '2021-06-01', 200);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `name`) VALUES
(1, 'Phong a\r\n'),
(2, 'hoa'),
(3, 'dsfsd sf sf'),
(4, 'sdf sf '),
(5, 'phong b'),
(6, 'ds skjhf kshf dsfh '),
(7, 'dsf dsf '),
(8, 'sdf sdf dsyf'),
(9, 'hoa'),
(10, 'hdsjfhksdf dsf'),
(11, 'hr'),
(12, 'Array'),
(13, 'Array'),
(14, 'hr'),
(15, 'hr'),
(16, 'dsf sdf '),
(17, 'sdf dsf df'),
(18, 'jf'),
(19, 'hr'),
(20, 'gtg');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_on` date DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL,
  `id_department` int(11) DEFAULT NULL,
  `id_schedule` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_employee`, `name`, `avatar`, `gender`, `email`, `address`, `phone`, `status`, `create_on`, `id_position`, `id_department`, `id_schedule`, `id_level`) VALUES
(1, 'ho', 'adffs', 1, 'hoa@gmail.com', 'fdsfsfsdfs', '0326490093', 2, NULL, 3, 1, 2, 2),
(2, 'hoa', NULL, 2, 'admin@gmail.com', 'ewfg', '0231654868', 1, NULL, NULL, NULL, 3, 2),
(3, 'hoa', 'Array', 1, 'hoacon3000@gmail.com', 'HFU', '0326490093', 2, '2021-05-28', 1, 1, 3, 3),
(4, 'hoa', 'Array', 1, 'hoacon3000@gmail.com', 'ewfg', '0618489498', 2, '2021-05-28', 1, 1, 2, NULL),
(5, 'hoa', 'Array', 1, 'hoacon3000@gmail.com', 'ewfg', '0618489498', 2, '2021-05-28', 1, 1, 3, NULL),
(6, 'hoa', 'Array', 1, 'hoacon3000@gmail.com', 'ewfg', '0326490093', 1, '2021-05-28', 1, 1, 2, NULL),
(7, 'hoa', 'Array', 2, 'hoacon3000@gmail.com', 'ewfg', '0326490093', 2, '2021-05-28', 1, 1, 2, 2),
(8, 'hoa', 'Array', 1, 'hoacon200@gmail.com', 'ewfg', '0326490093', 1, '2021-05-28', 1, 1, 2, 2),
(9, 'hoa', 'Screenshot 2021-05-28 215912.jpg', 1, 'hoacon200@gmail.com', 'ewfg', '0326490093', 2, '2021-05-28', 1, 1, 2, 2),
(10, 'hoa', 'Screenshot 2021-05-28 215912.jpg', 1, 'hoacon3000@gmail.com', 'ewfg', '0326490093', 1, '2021-05-28', 1, 3, 2, 2),
(11, 'hoa', 'Screenshot 2021-05-28 215912.jpg', 1, 'hoacon200@gmail.com', 'ewfg', '0326490093', 1, '2021-05-28', 1, 3, 2, 2),
(12, 'hoa', 'Screenshot 2021-05-28 215912.jpg', 1, 'hoacon3000@gmail.com', 'ewfg', '0326490093', 1, '2021-05-28', 1, 3, 2, 2),
(13, 'hoa', 'Screenshot 2021-05-28 215912.jpg', 1, 'hoacon3000@gmail.com', 'ewfg', '0326490093', 1, '2021-05-28', 1, 4, 2, 2),
(14, 'hoa', 'Screenshot 2021-05-28 215912.jpg', 1, 'hoacon3000@gmail.com', 'ewfg', '0326490093', 1, '2021-05-28', 1, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id_leaves` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id_leaves`, `id_employee`, `date_start`, `date_finish`, `info`) VALUES
(1, 1, '2021-05-02', '2021-05-06', 'Holiday');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `name`, `rate`) VALUES
(2, 'sdf', 5),
(3, 'dsf ', 2),
(6, 'name', 5);

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id_overtime` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_finish` date DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id_overtime`, `id_employee`, `hour`, `date_start`, `date_finish`, `rate`) VALUES
(1, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(2, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(3, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(4, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(5, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(6, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(7, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(8, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(9, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(10, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(11, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(12, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(13, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(14, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(15, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(16, 3, NULL, '0000-00-00', '0000-00-00', 1.2),
(17, 3, 5, '0000-00-00', '0000-00-00', 1.2),
(19, NULL, NULL, '2021-05-13', '2021-05-15', 1.5),
(20, NULL, NULL, '2021-05-13', '2021-05-15', 1.5),
(21, NULL, NULL, '2021-05-13', '2021-05-15', 1.5),
(22, 2, 5, '2021-05-03', '2021-05-05', 1.3),
(23, 2, 5, '2015-12-31', '2021-05-05', 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id_position` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `name`, `rate`) VALUES
(1, 'df', 2),
(3, 'hr', 5.6),
(4, 'hr', 2),
(5, 'hr', 2),
(7, 'hr', 2),
(9, 'name', 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id_schedule` int(11) NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id_schedule`, `time_in`, `time_out`) VALUES
(2, '08:00:00', '17:00:00'),
(3, '07:30:00', '12:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id_attendance`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indexes for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`id_cashadvance`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `id_position` (`id_position`),
  ADD KEY `id_department` (`id_department`),
  ADD KEY `id_schedule` (`id_schedule`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id_leaves`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id_overtime`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id_position`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id_schedule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id_attendance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id_cashadvance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id_leaves` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id_overtime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`);

--
-- Constraints for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD CONSTRAINT `cashadvance_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_department`) REFERENCES `department` (`id_department`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`id_position`) REFERENCES `position` (`id_position`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`id_schedule`) REFERENCES `schedules` (`id_schedule`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`);

--
-- Constraints for table `overtime`
--
ALTER TABLE `overtime`
  ADD CONSTRAINT `overtime_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
