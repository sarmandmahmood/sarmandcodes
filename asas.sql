-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 12:51 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asas`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `AttendanceID` int(11) NOT NULL,
  `AttendanceTime` time NOT NULL,
  `AttendanceDate` date NOT NULL,
  `AttendanceHours` varchar(11) NOT NULL,
  `AttendanceSubmitTime` time NOT NULL,
  `AttendanceTeacher` int(11) NOT NULL,
  `AttendanceStage` int(11) NOT NULL,
  `AttendanceSubject` int(11) NOT NULL,
  `AttendanceDepartment` int(11) NOT NULL,
  `AttendanceShift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`AttendanceID`, `AttendanceTime`, `AttendanceDate`, `AttendanceHours`, `AttendanceSubmitTime`, `AttendanceTeacher`, `AttendanceStage`, `AttendanceSubject`, `AttendanceDepartment`, `AttendanceShift`) VALUES
(1, '08:10:23', '2019-05-04', '', '08:10:23', 42, 3, 40, 7, 1),
(2, '09:13:40', '2019-05-06', '', '09:13:40', 42, 3, 40, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DepartmentID`, `DepartmentName`) VALUES
(6, 'General Education'),
(7, 'Information Technology'),
(8, 'Law Education'),
(9, 'Law1 Education');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `ShiftID` int(11) NOT NULL,
  `ShiftName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`ShiftID`, `ShiftName`) VALUES
(1, 'Morning'),
(2, 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `StageID` int(11) NOT NULL,
  `StageName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`StageID`, `StageName`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th');

-- --------------------------------------------------------

--
-- Table structure for table `studentattendances`
--

CREATE TABLE `studentattendances` (
  `stdAttendanceID` int(11) NOT NULL,
  `stdAttendanceStudent` int(11) NOT NULL,
  `stdAttendanceSubject` int(11) NOT NULL,
  `stdAttendanceDate` date NOT NULL,
  `stdAttendanceTime` time NOT NULL,
  `stdAttendanceHours` varchar(11) NOT NULL,
  `stdAttendanceDepartment` int(11) NOT NULL,
  `stdAttendanceStatus` int(11) NOT NULL,
  `stdAttendanceNote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentattendances`
--

INSERT INTO `studentattendances` (`stdAttendanceID`, `stdAttendanceStudent`, `stdAttendanceSubject`, `stdAttendanceDate`, `stdAttendanceTime`, `stdAttendanceHours`, `stdAttendanceDepartment`, `stdAttendanceStatus`, `stdAttendanceNote`) VALUES
(0, 111, 40, '2019-05-04', '08:10:23', 'Full', 7, 2, ''),
(0, 112, 40, '2019-05-04', '08:10:23', 'Full', 7, 1, ''),
(0, 113, 40, '2019-05-04', '08:10:23', 'Half', 7, 2, ''),
(0, 114, 40, '2019-05-04', '08:10:23', 'Full', 7, 1, ''),
(0, 109, 44, '2019-05-04', '08:11:10', 'Full', 7, 2, ''),
(0, 110, 44, '2019-05-04', '08:11:10', 'Full', 7, 1, ''),
(0, 111, 40, '2019-05-06', '09:13:40', 'Half', 7, 2, ''),
(0, 112, 40, '2019-05-06', '09:13:40', 'Full', 7, 2, ''),
(0, 113, 40, '2019-05-06', '09:13:40', 'Full', 7, 1, ''),
(0, 114, 40, '2019-05-06', '09:13:40', 'Full', 7, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL,
  `StudentName` varchar(250) NOT NULL,
  `StudentEmail` varchar(150) NOT NULL,
  `StudentPassword` varchar(50) NOT NULL,
  `StudentPhone` varchar(50) NOT NULL,
  `StudentDepartment` int(11) NOT NULL,
  `StudentShift` int(11) NOT NULL,
  `StudentStage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `StudentName`, `StudentEmail`, `StudentPassword`, `StudentPhone`, `StudentDepartment`, `StudentShift`, `StudentStage`) VALUES
(106, 'sarmand asi mahmmod', 'sarmand@gmail.com', '123', '07507401124', 7, 2, 1),
(109, 'rzgar jalil', 'rzgar@gmail.com', '123', '07502887699', 7, 1, 4),
(110, 'shawbo salim', 'shawbosalim@yahoo.com', '123', '07745899865', 7, 1, 4),
(111, 'bayar mahmmod', 'bayarmahmood@gmail.com', '123', '07745899865', 7, 1, 3),
(112, 'bayar omer', 'bayromer@gmail.com', '123', '07501114455', 7, 1, 3),
(113, 'omer rostam', 'omer@gmail.com', '123', '07745899865', 7, 1, 3),
(114, 'bryar kawkas', 'bryar@gmail.com', '123', '01545846', 7, 1, 3),
(115, 'Gulan Azad', 'gulan@gmail.com', '123', '07506654543', 7, 1, 2),
(116, 'yunis jalil', 'yunis@gmail.com', '123', '07745899865', 7, 1, 2),
(117, 'Mahde kafi', 'mahde@gmail.com', '123', '07734536298', 7, 2, 2),
(120, 'Lara amanj mahmmad', 'lara@gmail.com', '123', '07502887699', 7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SubjectID` int(11) NOT NULL,
  `SubjectName` varchar(250) NOT NULL,
  `SubjectTeacher` int(11) NOT NULL,
  `SubjectDepartment` int(11) NOT NULL,
  `SubjectStage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubjectID`, `SubjectName`, `SubjectTeacher`, `SubjectDepartment`, `SubjectStage`) VALUES
(34, 'Network Design', 42, 7, 4),
(35, 'Cloud computing', 43, 7, 4),
(36, 'computer Science', 44, 3, 1),
(37, 'Data Communication', 48, 6, 3),
(39, 'photography', 51, 6, 2),
(40, 'computer Science', 42, 7, 3),
(41, 'OS', 51, 7, 1),
(42, 'computer Science', 51, 7, 1),
(43, 'ADER', 47, 3, 3),
(44, 'computer forenscis', 53, 7, 4),
(45, 'Cloud computing', 48, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(11) NOT NULL,
  `TeacherName` varchar(150) NOT NULL,
  `TeacherDepartment` int(11) NOT NULL,
  `TeacherEmail` varchar(150) NOT NULL,
  `TeacherPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherID`, `TeacherName`, `TeacherDepartment`, `TeacherEmail`, `TeacherPassword`) VALUES
(42, 'Dr marwan A', 7, 'marwan@gmail.com', '123'),
(43, 'Dr.Balaji', 7, 'balaji.aa@gmail.com', '123'),
(46, 'Dr Muhammad', 6, 'drmhammad@gmail.com', '123111'),
(48, 'Dr.amin kakshar', 6, 'amin.kakshar@gmail.com', '123'),
(49, 'Dr Moyaed', 7, 'moayed@gmail.com', '123'),
(52, 'Mr vanikandan', 3, 'a@gmail.com', '123'),
(53, 'Dr Ahmad', 7, 'ahmad@gmailcom', '123'),
(54, 'dr ahmadd', 9, 'ahmad@gmailcom', '123'),
(55, 'dr rebaz', 6, 'ahmad@gmailcom', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserEmail` varchar(150) NOT NULL,
  `UserPassword` varchar(150) NOT NULL,
  `UserPhone` varchar(50) NOT NULL,
  `UserStatus` int(11) NOT NULL,
  `UserLastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `UserPassword`, `UserPhone`, `UserStatus`, `UserLastLogin`) VALUES
(1, 'Admin', 'dradmin@test.com', '12345678', '', 1, '2018-10-12 11:29:00'),
(2, 'user', 'user@gmail.com', '12345678', '0750 784 9396', 1, '2018-10-08 09:00:00'),
(9, 'rzgar', 'rzgar@gmail.com', '123', '07504488017', 0, '2019-01-17 01:01:09'),
(10, 'sarmand', 'sarmand@gmail.com', '123', '07734365966', 0, '2019-04-10 03:00:00'),
(11, 'eman', 'eman@gmail.com', '', '97554343', 0, '2019-04-23 03:09:00'),
(12, 'aaaaa', 'Ahmad@gmail.com', '', '124124', 0, '0000-00-00 00:00:00'),
(13, 'hamid', 'Ahmad@gmail.com', '', '00000000000', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usrID` int(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usrID`, `type`) VALUES
(1, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`AttendanceID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`ShiftID`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`StageID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usrID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `AttendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `ShiftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `StageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usrID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
