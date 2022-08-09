-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 09:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_date`) VALUES
(1, 'sadhuharshini12@gmail.com', 'harshini12', '2021-05-29 09:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `busses`
--

CREATE TABLE `busses` (
  `id` int(11) NOT NULL,
  `bus_id` varchar(10) NOT NULL,
  `bus_reg_number` varchar(15) NOT NULL,
  `bus_route` varchar(200) NOT NULL,
  `total_capacity` int(11) NOT NULL,
  `students_count` int(11) NOT NULL,
  `bus_driver_id` varchar(15) NOT NULL,
  `bus_driver_name` varchar(50) NOT NULL DEFAULT 'No Name',
  `bus_caretaker_id` varchar(15) NOT NULL,
  `bus_caretaker_name` varchar(50) NOT NULL DEFAULT 'No Name'
) ;

--
-- Dumping data for table `busses`
--

INSERT INTO `busses` (`id`, `bus_id`, `bus_reg_number`, `bus_route`, `total_capacity`, `students_count`, `bus_driver_id`, `bus_driver_name`, `bus_caretaker_id`, `bus_caretaker_name`) VALUES
(16, 'V01', 'AP 01 DB 1234', 'GANGINEEDUPALEM->MAKKINAVARIGUDEM->ERUGANTUPALLI->CHINTALAPUDI->SCHOOL', 25, 2, 'DR01', 'venkatesh', 'CT01', 'sumathi'),
(23, 'V02', 'AP 01 DB 1235', 'SEETHANAGARAM->ERUGANTUPALLI->CHINTALAPUDI->SCHOOL', 30, 2, 'DR02', 'murthy', 'CT02', 'Ravisastry'),
(24, 'V03', 'AP 01 DB 1236', 'ELURU->DHARMAJIGUDEM->CHINTALPUDI->SCHOOL', 30, 2, 'DR03', 'Rajesh', 'CT03', 'annapurna'),
(25, 'V04', 'AP 01 DB 1237', 'CHINTALAPUDI->SCHOOL', 30, 1, 'DR04', 'mahesh', 'CT04', 'prasanna');

-- --------------------------------------------------------

--
-- Table structure for table `caretakers`
--

CREATE TABLE `caretakers` (
  `id` int(11) NOT NULL,
  `ct_id` varchar(15) NOT NULL,
  `ct_name` varchar(50) NOT NULL,
  `ct_username` varchar(15) NOT NULL,
  `ct_password` varchar(20) NOT NULL,
  `ct_phone_number` varchar(10) NOT NULL,
  `ct_gender` varchar(6) NOT NULL,
  `ct_address` varchar(50) NOT NULL,
  `ct_city` varchar(15) NOT NULL,
  `ct_pincode` varchar(6) NOT NULL,
  `ct_state` varchar(20) NOT NULL,
  `ct_bus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretakers`
--

INSERT INTO `caretakers` (`id`, `ct_id`, `ct_name`, `ct_username`, `ct_password`, `ct_phone_number`, `ct_gender`, `ct_address`, `ct_city`, `ct_pincode`, `ct_state`, `ct_bus`) VALUES
(6, 'CT01', 'sumathi', 'sumathi', 'sumathi12', '8675765655', 'Female', 'chintalapudi', 'eluru', '543210', 'Andhra Pradesh', 'V01'),
(7, 'CT02', 'Ravisastry', 'ravisastry', 'ravisastry12', '9912539880', 'Male', 'Gangineedupalem', 'Bandivarigudem', '534456', 'Andhra Pradesh', 'V02'),
(8, 'CT03', 'annapurna', 'annapurna', 'annpurna12', '9876543210', 'Female', 'bhimavaram', 'bhimavaram', '543210', 'Andhra Pradesh', 'V03'),
(10, 'CT04', 'prasanna', 'prasanna', 'prasanna', '9876543431', 'Female', 'Gangineedupalem', 'Bandivarigudem', '534456', 'Andhra Pradesh', 'V04');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `driver_id` varchar(15) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_phone_number` varchar(10) NOT NULL,
  `driver_gender` varchar(6) NOT NULL,
  `driver_address` varchar(50) NOT NULL,
  `driver_city` varchar(15) NOT NULL,
  `driver_pincode` varchar(6) NOT NULL,
  `driver_state` varchar(20) NOT NULL,
  `driver_bus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `driver_id`, `driver_name`, `driver_phone_number`, `driver_gender`, `driver_address`, `driver_city`, `driver_pincode`, `driver_state`, `driver_bus`) VALUES
(6, 'DR01', 'venkatesh', '9878983461', 'Male', 'Sitara', 'Vijayawada', '543245', 'Andhra Pradesh', 'V01'),
(7, 'DR02', 'murthy', '9922334411', 'Male', 'seethanagaram', 'chintalapudi', '543210', 'Andhra Pradesh', 'V02'),
(8, 'DR03', 'Rajesh', '9887568789', 'Male', 'chintalapudi', 'eluru', '543210', 'Andhra Pradesh', 'V03'),
(10, 'DR04', 'mahesh', '9876543210', 'Male', 'bhimavaram', 'bhimavaram', '543210', 'Andhra Pradesh', 'V04');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(15) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `student_username` varchar(20) NOT NULL,
  `student_password` varchar(20) NOT NULL,
  `student_father` varchar(40) NOT NULL,
  `student_phone_number` varchar(10) NOT NULL,
  `student_mail` varchar(40) NOT NULL,
  `student_class` int(11) NOT NULL,
  `student_section` varchar(1) NOT NULL,
  `student_gender` varchar(6) NOT NULL,
  `student_address` varchar(40) NOT NULL,
  `student_city` varchar(40) NOT NULL,
  `student_pincode` varchar(6) NOT NULL,
  `student_state` varchar(25) NOT NULL,
  `student_bus` varchar(6) NOT NULL,
  `student_year_from` varchar(4) NOT NULL,
  `student_year_to` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll_number`, `student_name`, `student_username`, `student_password`, `student_father`, `student_phone_number`, `student_mail`, `student_class`, `student_section`, `student_gender`, `student_address`, `student_city`, `student_pincode`, `student_state`, `student_bus`, `student_year_from`, `student_year_to`) VALUES
(16, 'STD001', 'Damodhar Sadhu', 'damodhar', 'yghwycgwh', 'sadhu naresh', '9912539880', 'nagasai@gmail.com', 6, 'D', 'Male', 'Gangineedupalem', 'Bandivarigudem', '534456', 'Andhra Pradesh', 'V01', '2020', '2021'),
(17, 'STD002', 'harshini', 'harshini', 'harshini', 'naresh', '9912539880', 'harshini@gmail.com', 3, 'A', 'Female', 'Gangineedupalem', 'Bandivarigudem', '534456', 'Andhra Pradesh', 'V01', '2021', '2022'),
(18, 'STD003', 'sai anuhya', 'anuhya', 'saianuhya', 'venkatesh', '9922334411', 'anuhya@gmail.com', 4, 'A', 'Female', 'seethanagaram', 'chintalapudi', '543210', 'Andhra Pradesh', 'V02', '2021', '2022'),
(19, 'STD004', 'pranathi', 'pranathi', 'pranathi', 'prasad', '9887568789', 'pranathi@gmail.com', 6, 'B', 'Female', 'eluru', 'eluru', '543210', 'Andhra Pradesh', 'V03', '2021', '2022'),
(20, 'STD005', 'sri samatha', 'samatha', 'srisamatha', 'murthy', '9778755664', 'samatha@gmail.com', 5, 'B', 'Female', 'darmajigudem', 'chintalapudi', '543216', 'Andhra Pradesh', 'V03', '2021', '2022'),
(22, 'STD007', 'sai lakshmi', 'lakshmi', 'sailakshmi', 'subbarao', '9888766667', 'lakshmi@gmail.com', 9, 'D', 'Female', 'chintalapudi', 'chintalapudi', '555222', 'Andhra Pradesh', 'V04', '2021', '2022'),
(25, 'STD006', 'indu saraswathi', 'saraswathi', 'saraswathi', 'murthy', '9922334410', 'pranathi@gmail.com', 9, 'B', 'Female', 'seethanagaram', 'chintalapudi', '543210', 'Andhra Pradesh', 'V02', '2020', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendence`
--

CREATE TABLE `student_attendence` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(15) NOT NULL,
  `date` varchar(11) NOT NULL,
  `in_time` varchar(6) NOT NULL,
  `out_time` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendence`
--

INSERT INTO `student_attendence` (`id`, `roll_number`, `date`, `in_time`, `out_time`) VALUES
(3, 'STD001', '2021-06-21', '06:25', '17:26'),
(4, 'STD001', '2021-06-22', '18:27', 'ABSENT'),
(5, 'STD001', '2021-06-23', 'ABSENT', '17:29'),
(6, 'STD002', '2021-06-22', '07:30', '17:00'),
(7, 'STD002', '2021-06-23', 'ABSENT', 'ABSENT'),
(8, 'STD002', '2021-06-28', '07:30', '17:30');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(15) NOT NULL,
  `year_from` varchar(4) NOT NULL,
  `year_to` varchar(4) NOT NULL,
  `first_term_fee` int(11) NOT NULL,
  `first_term_paid` int(11) NOT NULL,
  `second_term_fee` int(11) NOT NULL,
  `second_term_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `roll_number`, `year_from`, `year_to`, `first_term_fee`, `first_term_paid`, `second_term_fee`, `second_term_paid`) VALUES
(16, 'STD001', '2020', '2021', 10000, 2000, 10000, 0),
(17, 'STD002', '2021', '2022', 6000, 6000, 6000, 0),
(18, 'STD003', '2021', '2022', 4000, 2000, 4000, 0),
(19, 'STD004', '2021', '2022', 2000, 2000, 2000, 2000),
(20, 'STD005', '2021', '2022', 5000, 2000, 5000, 1000),
(22, 'STD007', '2021', '2022', 2000, 2000, 2000, 2000),
(25, 'STD006', '2020', '2021', 10000, 7000, 4000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `busses`
--
ALTER TABLE `busses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bus_reg_number` (`bus_reg_number`),
  ADD UNIQUE KEY `bus_id` (`bus_id`),
  ADD UNIQUE KEY `bus_reg_number_2` (`bus_reg_number`);

--
-- Indexes for table `caretakers`
--
ALTER TABLE `caretakers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ct_id` (`ct_id`),
  ADD UNIQUE KEY `ct_username` (`ct_username`),
  ADD UNIQUE KEY `ct_phone_number` (`ct_phone_number`),
  ADD KEY `ct_bus` (`ct_bus`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `driver_id` (`driver_id`),
  ADD UNIQUE KEY `driver_phone_number` (`driver_phone_number`),
  ADD KEY `driver_bus` (`driver_bus`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll_number` (`roll_number`);

--
-- Indexes for table `student_attendence`
--
ALTER TABLE `student_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `busses`
--
ALTER TABLE `busses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `caretakers`
--
ALTER TABLE `caretakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_attendence`
--
ALTER TABLE `student_attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caretakers`
--
ALTER TABLE `caretakers`
  ADD CONSTRAINT `caretakers_ibfk_1` FOREIGN KEY (`ct_bus`) REFERENCES `busses` (`bus_id`);

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`driver_bus`) REFERENCES `busses` (`bus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
