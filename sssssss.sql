-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 생성 시간: 16-10-24 08:01
-- 서버 버전: 10.1.13-MariaDB
-- PHP 버전: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `sssssss`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `startdate` varchar(48) NOT NULL,
  `enddate` varchar(48) NOT NULL,
  `allDay` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `contracts`
--

CREATE TABLE `contracts` (
  `studentContractID` int(11) NOT NULL,
  `studentStartDate` date NOT NULL,
  `studentEndDate` date NOT NULL,
  `studentID` int(11) NOT NULL,
  `lessonID` int(11) NOT NULL,
  `lessonDuration` int(11) NOT NULL,
  `numberPerWeek` int(11) NOT NULL,
  `studentContractPermission` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `contracts`
--

INSERT INTO `contracts` (`studentContractID`, `studentStartDate`, `studentEndDate`, `studentID`, `lessonID`, `lessonDuration`, `numberPerWeek`, `studentContractPermission`) VALUES
(3, '2017-09-01', '2017-12-31', 5, 5, 1, 1, 'no'),
(4, '2017-09-01', '2017-10-31', 5, 2, 1, 1, 'no'),
(12, '2017-11-01', '2017-11-30', 3, 1, 1, 1, 'yes'),
(13, '2016-11-01', '2016-11-30', 5, 1, 1, 1, 'yes'),
(14, '2017-03-01', '2017-04-30', 5, 3, 2, 2, 'no');

-- --------------------------------------------------------

--
-- 테이블 구조 `hiredinstruments`
--

CREATE TABLE `hiredinstruments` (
  `hiredInstrumentID` int(11) NOT NULL,
  `instrumentID` int(11) NOT NULL,
  `loginID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `hiredinstruments`
--

INSERT INTO `hiredinstruments` (`hiredInstrumentID`, `instrumentID`, `loginID`) VALUES
(4, 1, 9),
(5, 2, 9),
(6, 3, 5);

-- --------------------------------------------------------

--
-- 테이블 구조 `instruments`
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
-- 테이블의 덤프 데이터 `instruments`
--

INSERT INTO `instruments` (`instrumentID`, `instrumentName`, `image`, `display`, `condition`, `hireCost`) VALUES
(1, 'Suzuki MDG-400 Baby Grand Digital Piano ', '../images/piano.jpg', 'off', 'new', '400'),
(2, 'Emedia My Violin Starter Pack  ', '../images/violin.jpg', 'off', 'excellent', '45'),
(3, 'Axiom Student Flute', '../images/flute.jpg', 'off', 'excellent', '50');

-- --------------------------------------------------------

--
-- 테이블 구조 `lessonenrolments`
--

CREATE TABLE `lessonenrolments` (
  `lessonEnrolmentID` int(11) NOT NULL,
  `lessonTimeID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `lessonenrolments`
--

INSERT INTO `lessonenrolments` (`lessonEnrolmentID`, `lessonTimeID`, `studentID`) VALUES
(19, 8, 5),
(20, 8, 5),
(21, 1, 5),
(22, 2, 5),
(23, 2, 5),
(24, 2, 5),
(25, 2, 5),
(26, 1, 5),
(27, 1, 5);

-- --------------------------------------------------------

--
-- 테이블 구조 `lessons`
--

CREATE TABLE `lessons` (
  `lessonID` int(11) NOT NULL,
  `lessonType` varchar(45) NOT NULL,
  `lessonPlace` varchar(45) NOT NULL,
  `teacherStartDate` date NOT NULL,
  `teacherEndDate` date NOT NULL,
  `lessonCost` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `instruementID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `lessons`
--

INSERT INTO `lessons` (`lessonID`, `lessonType`, `lessonPlace`, `teacherStartDate`, `teacherEndDate`, `lessonCost`, `teacherID`, `instruementID`) VALUES
(1, 'Piano lesson for beginners', 'P104', '2016-11-01', '2016-11-30', 600, 1, 1),
(2, 'Intermadiate Guitar', 'G123', '2016-10-01', '2016-12-31', 853, 2, 2),
(3, 'Advanced Violin', 'V231', '2017-01-01', '2017-04-30', 456, 3, 3),
(4, 'Advanced Funny Piano Class!!', 'P111', '2017-03-01', '2017-03-31', 673, 4, 1),
(5, 'Easy Flute', 'F203', '2016-09-01', '2017-09-30', 233, 1, 4),
(6, 'intermidiate piano lesson', 'P102', '2016-10-01', '2016-11-30', 239, 1, 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `lessontimes`
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
-- 테이블의 덤프 데이터 `lessontimes`
--

INSERT INTO `lessontimes` (`lessonTimeID`, `lessonDuration`, `day`, `time`, `availability`, `lessonID`) VALUES
(1, '30', 'Monday', '09:00', 'on', 1),
(2, '30', 'Tuesday', '10:00', 'on', 1),
(3, '30', 'Wednesday', '11:00', 'on', 2),
(4, '30', 'Friday', '14:00', 'on', 2),
(5, '60', 'Monday', '15:00', 'on', 1),
(6, '60', 'Friday', '17:00', 'on', 2),
(7, '60', 'Tuesday', '13:00', 'on', 2),
(8, '30', 'Tuesday', '15:00', 'on', 1),
(9, '30', 'Friday', '15:00', 'on', 2),
(10, '60', 'Monday', '11:00', 'on', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `logins`
--

CREATE TABLE `logins` (
  `loginID` int(11) NOT NULL,
  `role` varchar(45) NOT NULL,
  `permission` varchar(45) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `logins`
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
-- 테이블 구조 `owner`
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
-- 테이블의 덤프 데이터 `owner`
--

INSERT INTO `owner` (`ownerID`, `firstName`, `lastName`, `dateOfBirth`, `address`, `gender`, `phoneNumber`, `mobileNumber`, `email`, `faceBook`, `loginID`) VALUES
(1, 'Minsu', 'Kim', '1986-06-17', '6 Abingdon ST', 'Male', 403410500, 4231222, 'asdsd@asd.com', 'asds@as.com', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `parents`
--

CREATE TABLE `parents` (
  `studentID` int(11) NOT NULL,
  `parentFirstName` varchar(45) NOT NULL,
  `parentLastName` varchar(45) NOT NULL,
  `parentPhoneNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `parents`
--

INSERT INTO `parents` (`studentID`, `parentFirstName`, `parentLastName`, `parentPhoneNumber`) VALUES
(9, 'Yo', 'Kim', 2147483647);

-- --------------------------------------------------------

--
-- 테이블 구조 `qualifications`
--

CREATE TABLE `qualifications` (
  `teacherID` int(11) NOT NULL,
  `qualificationDetail` varchar(250) NOT NULL,
  `skill` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `students`
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
-- 테이블의 덤프 데이터 `students`
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
-- 테이블 구조 `teachers`
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
-- 테이블의 덤프 데이터 `teachers`
--

INSERT INTO `teachers` (`teacherID`, `firstName`, `lastName`, `dateOfBirth`, `address`, `gender`, `phoneNumber`, `mobileNumber`, `email`, `faceBook`, `loginID`) VALUES
(1, 'Charles', 'Pearson', '1977-09-21', 'KingGoerge St. 123-12', 'M', 412865134, 412865134, 'hungry@google.com', 'hungry@facebook.com', 5),
(2, 'Janet', 'MillerCross', '1987-08-03', 'KingGoerge St. 123-12', 'M', 432134625, 432134625, 'IamFull@full.com', 'full@facebook.com', 6),
(3, 'Michael', 'James', '1995-09-12', 'Lawson St. Morningside', 'M', 433921741, 433921741, 'I_love_you@love.com', 'I_love_you@facebook.com', 7),
(4, 'Madeline', 'Montosh', '1955-12-02', 'Kelvin Groove 12-12', 'M', 412848123, 412848123, 'love_you_forever@love.com', 'love_you_forever@love.com', 13);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 테이블의 인덱스 `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`studentContractID`),
  ADD KEY `fk_contracts_students1_idx` (`studentID`),
  ADD KEY `fk_contracts_lessons1_idx` (`lessonID`);

--
-- 테이블의 인덱스 `hiredinstruments`
--
ALTER TABLE `hiredinstruments`
  ADD PRIMARY KEY (`hiredInstrumentID`),
  ADD KEY `instrumentID` (`instrumentID`),
  ADD KEY `loginID` (`loginID`);

--
-- 테이블의 인덱스 `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`instrumentID`);

--
-- 테이블의 인덱스 `lessonenrolments`
--
ALTER TABLE `lessonenrolments`
  ADD PRIMARY KEY (`lessonEnrolmentID`),
  ADD KEY `lessonTimeID` (`lessonTimeID`),
  ADD KEY `studentID` (`studentID`);

--
-- 테이블의 인덱스 `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessonID`),
  ADD KEY `fk_lessons_teachers1_idx` (`teacherID`),
  ADD KEY `instruementID` (`instruementID`),
  ADD KEY `lessonID` (`lessonID`);

--
-- 테이블의 인덱스 `lessontimes`
--
ALTER TABLE `lessontimes`
  ADD PRIMARY KEY (`lessonTimeID`),
  ADD KEY `lessonID` (`lessonID`);

--
-- 테이블의 인덱스 `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`loginID`);

--
-- 테이블의 인덱스 `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerID`),
  ADD KEY `fk_owner_logins1_idx` (`loginID`);

--
-- 테이블의 인덱스 `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- 테이블의 인덱스 `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- 테이블의 인덱스 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `fk_students_logins1_idx` (`loginID`);

--
-- 테이블의 인덱스 `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `fk_teachers_logins_idx` (`loginID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `contracts`
--
ALTER TABLE `contracts`
  MODIFY `studentContractID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 테이블의 AUTO_INCREMENT `hiredinstruments`
--
ALTER TABLE `hiredinstruments`
  MODIFY `hiredInstrumentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 테이블의 AUTO_INCREMENT `instruments`
--
ALTER TABLE `instruments`
  MODIFY `instrumentID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 테이블의 AUTO_INCREMENT `lessonenrolments`
--
ALTER TABLE `lessonenrolments`
  MODIFY `lessonEnrolmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 테이블의 AUTO_INCREMENT `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 테이블의 AUTO_INCREMENT `lessontimes`
--
ALTER TABLE `lessontimes`
  MODIFY `lessonTimeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 테이블의 AUTO_INCREMENT `logins`
--
ALTER TABLE `logins`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 테이블의 AUTO_INCREMENT `owner`
--
ALTER TABLE `owner`
  MODIFY `ownerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 테이블의 AUTO_INCREMENT `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 테이블의 AUTO_INCREMENT `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `fk_contracts_lessons1` FOREIGN KEY (`lessonID`) REFERENCES `lessons` (`lessonID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contracts_students1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `hiredinstruments`
--
ALTER TABLE `hiredinstruments`
  ADD CONSTRAINT `fk_hiredInstruments_instrumnets1` FOREIGN KEY (`instrumentID`) REFERENCES `instruments` (`instrumentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hiredInstruments_logins1` FOREIGN KEY (`loginID`) REFERENCES `logins` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `lessonenrolments`
--
ALTER TABLE `lessonenrolments`
  ADD CONSTRAINT `fk_lessonEnrolments_lessontimes1` FOREIGN KEY (`lessonTimeID`) REFERENCES `lessontimes` (`lessonTimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lessonEnrolments_students1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fk_lessons_teachers1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `lessontimes`
--
ALTER TABLE `lessontimes`
  ADD CONSTRAINT `lessontimes_ibfk_1` FOREIGN KEY (`lessonID`) REFERENCES `lessons` (`lessonID`);

--
-- 테이블의 제약사항 `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `fk_owner_logins1` FOREIGN KEY (`loginID`) REFERENCES `logins` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `fk_parents_students1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `qualifications`
--
ALTER TABLE `qualifications`
  ADD CONSTRAINT `fk_qualifications_teachers1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_logins1` FOREIGN KEY (`loginID`) REFERENCES `logins` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 테이블의 제약사항 `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_logins` FOREIGN KEY (`loginID`) REFERENCES `logins` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
