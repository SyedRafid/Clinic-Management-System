-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2025 at 01:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Pcontact` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `medicalHistory` varchar(400) DEFAULT NULL,
  `action` int(11) DEFAULT NULL,
  `patientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Orthopedics 1', '0000-00-00 00:00:00', '2023-11-23 03:44:44'),
(2, 'Internal Medicine', '2023-10-09 18:09:57', '2023-10-20 02:38:25'),
(3, 'Obstetrics and Gynecology', '2023-10-09 18:09:57', '2023-10-20 02:38:27'),
(4, 'Dermatology', '2023-10-09 18:09:57', '2023-10-20 02:38:29'),
(5, 'Pediatrics', '2023-10-09 18:09:57', '2023-10-20 02:38:31'),
(6, 'Radiology', '2023-10-09 18:09:57', '2023-10-20 02:38:34'),
(7, 'General Surgery', '2023-10-09 18:09:57', '2023-10-20 02:38:37'),
(8, 'Ophthalmology', '2023-10-09 18:09:57', '2023-10-20 02:38:38'),
(9, 'Anesthesia', '2023-10-09 18:09:57', '2023-10-20 02:38:41'),
(10, 'Pathology', '2023-10-09 18:09:57', '2023-10-20 02:38:43'),
(11, 'ENT', '2023-10-09 18:09:57', '2023-10-20 02:38:45'),
(12, 'Dental Care', '2023-10-09 18:09:57', '2023-10-20 02:38:47'),
(13, 'Dermatologists', '2023-10-09 18:09:57', '2023-10-20 02:38:48'),
(14, 'Endocrinologists', '2023-10-09 18:09:57', '2023-10-20 02:38:53'),
(15, 'Neurologists', '2023-10-09 18:09:57', '2023-10-20 02:38:57'),
(18, 'Orthopedics', '2023-11-23 03:44:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` text DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doctorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` text DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(35, 32, 'Syed.shuvon@gmail.com', 0x3a3a3100000000000000000000000000, '2025-09-06 11:31:21', '06-09-2025 01:31:40 PM', 1),
(36, 32, 'syed.shuvon@gmail.com', 0x3a3a3100000000000000000000000000, '2025-09-06 11:31:48', '06-09-2025 01:31:50 PM', 1),
(37, 32, 'syed.shuvon@gmail.com', 0x3a3a3100000000000000000000000000, '2025-09-06 11:31:56', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `userType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`, `userType`) VALUES
(32, 'Syed Rafid', '1, Jalan Mohana Chandran 1P, Bandar Seri Hartamas, 82382 Endau', 'Johor', 'male', 'syed.shuvon@gmail.com', '5182ff4ec9e33d7bd5fd2924e2e49aa0', '2023-10-06 04:40:46', '2025-09-06 11:32:27', 'Admin'),
(35, 'Khairul Alam', '1, Jalan Mohana Chandran 1P, Bandar Seri Hartamas, 82382 Endau', 'Johor', 'male', 'amivbmbc@gmail.com', '1054c95880502b70618edfba6e072723', '2023-10-10 05:04:01', '2025-09-06 11:30:46', 'Doctor'),
(38, 'Jane Alagaratnam', '1, Jalan Mohana Chandran 1P, Bandar Seri Hartamas, 82382 Endau', 'Johor', 'female', 'bonnie95@gmail.com', 'ba830ce4fbd53fa0a122d974df7223fe', '2023-10-17 07:23:41', NULL, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=607;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `FK` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
