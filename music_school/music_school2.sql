-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 09:09 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_school2`
--

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `studentContractID` int(11) NOT NULL,
  `studentStartDate` date NOT NULL,
  `studentEndDate` date NOT NULL,
  `studentID` int(11) NOT NULL,
  `lessonID` int(11) NOT NULL,
  `studentContractPermission` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`studentContractID`, `studentStartDate`, `studentEndDate`, `studentID`, `lessonID`, `studentContractPermission`) VALUES
(2, '2016-09-01', '2016-11-30', 4, 5, 'no'),
(3, '2017-02-01', '2017-04-30', 4, 3, 'no'),
(4, '2016-09-01', '2017-01-31', 4, 5, 'no'),
(5, '2016-10-01', '2016-11-30', 5, 2, 'no'),
(6, '2016-10-01', '2016-11-30', 5, 2, 'no'),
(7, '2016-10-01', '2016-12-31', 5, 2, 'no'),
(8, '2016-10-01', '2016-11-30', 4, 2, 'no'),
(9, '2016-09-01', '2016-12-31', 4, 5, 'no'),
(10, '2016-11-01', '2016-11-30', 4, 1, 'no'),
(11, '2016-11-01', '2016-11-30', 4, 1, 'no'),
(12, '2016-10-01', '2016-11-30', 5, 2, 'no'),
(13, '2016-10-01', '2016-12-31', 5, 2, 'no'),
(14, '2017-01-01', '2017-02-28', 4, 3, 'no'),
(15, '2016-11-01', '2016-11-30', 4, 1, 'no'),
(16, '2016-10-01', '2016-10-31', 4, 2, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `hiredinstruments`
--

CREATE TABLE `hiredinstruments` (
  `hiredInstrumentID` int(11) NOT NULL,
  `instrumentID` int(11) NOT NULL,
  `loginID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hiredinstruments`
--

INSERT INTO `hiredinstruments` (`hiredInstrumentID`, `instrumentID`, `loginID`) VALUES
(4, 1, 9),
(5, 2, 9),
(6, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `instrumentID` int(45) NOT NULL,
  `instrumentName` varchar(45) NOT NULL,
  `image` varchar(200) NOT NULL,
  `display` varchar(45) NOT NULL,
  `condition` varchar(45) NOT NULL,
  `hireCost` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrumentID`, `instrumentName`, `image`, `display`, `condition`, `hireCost`) VALUES
(1, 'Suzuki MDG-400 Baby Grand Digital Piano ', '../images/piano.jpg', 'off', 'new', '400'),
(2, 'Emedia My Violin Starter Pack  ', '../images/violin.jpg', 'off', 'excellent', '45'),
(3, 'Axiom Student Flute', '../images/flute.jpg', 'off', 'excellent', '50');

-- --------------------------------------------------------

--
-- Table structure for table `lessonenrolments`
--

CREATE TABLE `lessonenrolments` (
  `lessonEnrolmentID` int(11) NOT NULL,
  `lessonTimeID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lessonID` int(11) NOT NULL,
  `lessonType` varchar(45) NOT NULL,
  `lessonPlace` varchar(45) NOT NULL,
  `teacherStartDate` date NOT NULL,
  `teacherEndDate` date NOT NULL,
  `lessonCost` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `lessonDuration` int(11) NOT NULL,
  `instruementID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lessonID`, `lessonType`, `lessonPlace`, `teacherStartDate`, `teacherEndDate`, `lessonCost`, `teacherID`, `lessonDuration`, `instruementID`) VALUES
(1, 'Piano lesson for beginners', 'P104', '2016-11-01', '2016-11-30', 600, 1, 30, 1),
(2, 'Intermadiate Guitar', 'G123', '2016-10-01', '2016-12-31', 853, 2, 30, 2),
(3, 'Advanced Violin', 'V231', '2017-01-01', '2017-04-30', 456, 3, 30, 3),
(4, 'Advanced Funny Piano Class!!', 'P111', '2017-03-01', '2017-03-31', 673, 4, 60, 1),
(5, 'Easy Flute', 'F203', '2016-09-01', '2017-09-30', 233, 1, 30, 4),
(6, 'intermidiate piano lesson', 'P102', '2016-10-01', '2016-11-30', 239, 1, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lessontimes`
--

CREATE TABLE `lessontimes` (
  `lessonTimeID` int(11) NOT NULL,
  `lessonDuration` varchar(45) NOT NULL,
  `day` varchar(45) NOT NULL,
  `time` varchar(45) NOT NULL,
  `availability` varchar(45) NOT NULL,
  `lessonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessontimes`
--

INSERT INTO `lessontimes` (`lessonTimeID`, `lessonDuration`, `day`, `time`, `availability`, `lessonID`) VALUES
(1, '', 'Monday', '09:00', 'on', 1),
(2, '', 'Tuesday', '10:00', 'on', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `loginID` int(11) NOT NULL,
  `role` varchar(45) NOT NULL,
  `permission` varchar(45) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`loginID`, `role`, `permission`, `userName`, `password`) VALUES
(2, 'owner', 'on', 'owner', '$2y$10$CXkprUrwD8gX60y3Hw8Wp.vI4SMmJgb1LLKHKkQm9tJnA/GdRvkPe'),
(4, 'student', 'on', 'kim', '$2y$10$hS6bvi3.k2tbmqVQh9o8C.wBUue1tcd1V9mc7EbZ4fxgxLfj.3vg6'),
(5, 'teacher', 'on', 'teacher1', '$2y$10$6uJMtRlwB83XJtoCmW9lLO0Q1B0TIA28yqrpsXylQdSwuzrn/wzV6'),
(6, 'teacher', 'on', 'teacher2', '$2y$10$TE7dbqY8c4G1abR2OpOr3OwNp5WyCwPwaPDuCdBC63CgSCc4w4ZCa'),
(7, 'teacher', 'on', 'teacher3', '$2y$10$2f8uXIrk1Z.XUdPRrxQYyuKG/Bo3.Wh2500CzZpi2s3m8BQOsUYcu'),
(8, 'teacher', 'on', 'teacher4', '$2y$10$eN5IZ27Hbz5I1vFD0lI7eu5EbAQP9Ra26LO4YzWCply5AkAzFwgfW'),
(9, 'student', 'on', 'student1', '$2y$10$549Z6l66/Juv8YbbXlU2rO.V9brznlmV5FcfA04bvfsricmnHg4he'),
(10, 'student', 'on', 'student2', '$2y$10$GNMH8Ze9NizWL.1yCOc9sO1FzRapcQGiQ/liRUUsjQ9kyTyIR08b6'),
(11, 'student', 'on', 'student3', '$2y$10$MkaHSyrAJS84s9TE/x8aRu7rOg4YNDMM3OxUQdfBub2GslDMm.aka'),
(12, 'student', 'on', 'student4', '$2y$10$NMiVLNs4x3s3qrk/.kuwEuxOJpyZyJrlzmWzgGlkSs28DSq0EQqPO'),
(13, 'teacher', 'on', 'teacher4', '$2y$10$2hl5KCidQTy90jOPR7NzXe8j5mkVpKKiaATJS3tzMpmY2W2EzXgCy'),
(14, 'student', 'off', 'ggaggung518', '$2y$10$qe4p9e1vR6NGxfHv9NBtCue7PbV1hMqEZ6XRn1U4BiypUJABIbER2'),
(15, 'student', 'off', 'student5', '$2y$10$UFxl90hc5E5eRvRfQSn54O9H0V9zalnZhPcK/C0BttrTTFMYwLePa'),
(16, 'student', 'off', 'student5', '$2y$10$99e1UmSDC2wHxhJqpAImbeKis2BOiWIvKxkwrxKFLEp0vNQKzVYqq');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ownerID` int(11) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `address` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `mobileNumber` int(11) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `faceBook` varchar(45) DEFAULT NULL,
  `loginID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ownerID`, `firstName`, `lastName`, `dateOfBirth`, `address`, `gender`, `phoneNumber`, `mobileNumber`, `email`, `faceBook`, `loginID`) VALUES
(1, 'Minsu', 'Kim', '1986-06-17', '6 Abingdon ST', 'Male', 403410500, 4231222, 'asdsd@asd.com', 'asds@as.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `studentID` int(11) NOT NULL,
  `parentFirstName` varchar(45) NOT NULL,
  `parentLastName` varchar(45) NOT NULL,
  `parentPhoneNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`studentID`, `parentFirstName`, `parentLastName`, `parentPhoneNumber`) VALUES
(9, 'Yo', 'Kim', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `teacherID` int(11) NOT NULL,
  `qualificationDetail` varchar(250) NOT NULL,
  `skill` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `address` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `mobileNumber` int(11) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `faceBook` varchar(45) DEFAULT NULL,
  `loginID` int(11) NOT NULL,
  `grade` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `firstName`, `lastName`, `dateOfBirth`, `address`, `gender`, `phoneNumber`, `mobileNumber`, `email`, `faceBook`, `loginID`, `grade`) VALUES
(3, 'minsu', 'kim', '2016-09-28', '서원동 91-49 202', 'm', 1055091917, 1055091917, 'ggusanes@gmail.com', 'ggusanes@naver.com', 4, 'old'),
(4, 'Minsu', 'Canales', '1992-02-07', 'Seoul', 'F', 431481232, 431481232, 'angel1004@gmail.com', 'angel1004@gmail.com', 9, 'new'),
(5, 'Caleb', 'Sexton', '1967-08-02', 'KingGoerge St. 112-12', 'M', 412481231, 412481231, 'Who_are_you@google.com', 'Who_are_you@google.com', 10, 'old'),
(6, 'Megan', 'Hull', '1999-03-07', 'KingGoerge St. 12-123', 'F', 412848123, 412848123, 'annoying@annoy.com', 'annoying@annoy.com', 11, 'new'),
(7, 'Ashlee', 'Beard', '1988-12-21', 'Kelvin Groove', 'M', 423123212, 423123212, 'I_am_beautiful@beautiful.com', 'I_am_beautiful@beautiful.com', 12, 'old'),
(8, 'Choi', 'sunhwa', '2016-09-08', '서울역', 'Female', 1055091917, 1055091917, 'ggusanes@gmail.com', 'sosizigun@naver.com', 14, 'new'),
(9, 'HaHa', 'Kim', '2016-09-26', '12 Abingdon ST, Woollongabba, QLD 4001', 'Male', 2121111111, NULL, 'asdad@asd.com', NULL, 16, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `address` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `mobileNumber` int(11) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `faceBook` varchar(45) DEFAULT NULL,
  `loginID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `firstName`, `lastName`, `dateOfBirth`, `address`, `gender`, `phoneNumber`, `mobileNumber`, `email`, `faceBook`, `loginID`) VALUES
(1, 'Charles', 'Pearson', '1977-09-21', 'KingGoerge St. 123-12', 'M', 412865134, 412865134, 'hungry@google.com', 'hungry@facebook.com', 5),
(2, 'Janet', 'MillerCross', '1987-08-03', 'KingGoerge St. 123-12', 'M', 432134625, 432134625, 'IamFull@full.com', 'full@facebook.com', 6),
(3, 'Michael', 'James', '1995-09-12', 'Lawson St. Morningside', 'M', 433921741, 433921741, 'I_love_you@love.com', 'I_love_you@facebook.com', 7),
(4, 'Madeline', 'Montosh', '1955-12-02', 'Kelvin Groove 12-12', 'M', 412848123, 412848123, 'love_you_forever@love.com', 'love_you_forever@love.com', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`studentContractID`),
  ADD KEY `fk_contracts_students1_idx` (`studentID`),
  ADD KEY `fk_contracts_lessons1_idx` (`lessonID`);

--
-- Indexes for table `hiredinstruments`
--
ALTER TABLE `hiredinstruments`
  ADD PRIMARY KEY (`hiredInstrumentID`),
  ADD KEY `instrumentID` (`instrumentID`),
  ADD KEY `loginID` (`loginID`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`instrumentID`);

--
-- Indexes for table `lessonenrolments`
--
ALTER TABLE `lessonenrolments`
  ADD PRIMARY KEY (`lessonEnrolmentID`),
  ADD KEY `lessonTimeID` (`lessonTimeID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessonID`),
  ADD KEY `fk_lessons_teachers1_idx` (`teacherID`),
  ADD KEY `instruementID` (`instruementID`),
  ADD KEY `lessonID` (`lessonID`);

--
-- Indexes for table `lessontimes`
--
ALTER TABLE `lessontimes`
  ADD PRIMARY KEY (`lessonTimeID`),
  ADD KEY `lessonID` (`lessonID`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerID`),
  ADD KEY `fk_owner_logins1_idx` (`loginID`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `fk_students_logins1_idx` (`loginID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `fk_teachers_logins_idx` (`loginID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `studentContractID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `hiredinstruments`
--
ALTER TABLE `hiredinstruments`
  MODIFY `hiredInstrumentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `instrumentID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lessonenrolments`
--
ALTER TABLE `lessonenrolments`
  MODIFY `lessonEnrolmentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lessontimes`
--
ALTER TABLE `lessontimes`
  MODIFY `lessonTimeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ownerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `fk_contracts_lessons1` FOREIGN KEY (`lessonID`) REFERENCES `lessons` (`lessonID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contracts_students1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hiredinstruments`
--
ALTER TABLE `hiredinstruments`
  ADD CONSTRAINT `fk_hiredInstruments_instrumnets1` FOREIGN KEY (`instrumentID`) REFERENCES `instruments` (`instrumentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hiredInstruments_logins1` FOREIGN KEY (`loginID`) REFERENCES `logins` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lessonenrolments`
--
ALTER TABLE `lessonenrolments`
  ADD CONSTRAINT `fk_lessonEnrolments_lessontimes1` FOREIGN KEY (`lessonTimeID`) REFERENCES `lessontimes` (`lessonTimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lessonEnrolments_students1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fk_lessons_teachers1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lessontimes`
--
ALTER TABLE `lessontimes`
  ADD CONSTRAINT `lessontimes_ibfk_1` FOREIGN KEY (`lessonID`) REFERENCES `lessons` (`lessonID`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `fk_owner_logins1` FOREIGN KEY (`loginID`) REFERENCES `logins` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `fk_parents_students1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD CONSTRAINT `fk_qualifications_teachers1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_logins1` FOREIGN KEY (`loginID`) REFERENCES `logins` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_logins` FOREIGN KEY (`loginID`) REFERENCES `logins` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
