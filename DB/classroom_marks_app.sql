-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2025 at 08:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom_marks_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'kavizz', '810d4aeafb33f4f65508c9ce78032994'),
(3, 'admin2', 'a1c7f67b09808249b3a2dce888784324');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_name` varchar(100) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `paper_part1` varchar(255) DEFAULT NULL,
  `paper_part2` varchar(255) DEFAULT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `paper_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject_id`, `exam_name`, `marks`, `paper_part1`, `paper_part2`, `total_marks`, `paper_path`, `created_at`) VALUES
(8, 2, 1, 'test 1', 45, 'uploads/1763702803_part1_KAVINDU BOGAHAWATTE.pdf', 'uploads/1763702803_part2_Kavindu Bogahawatte Cover Letter 2.pdf', 101, NULL, '2025-11-21 05:26:43'),
(9, 2, 1, 'test 2', 23, 'uploads/1763702948_part1_coverltter.pdf', 'uploads/1763702948_part2_coverltter.pdf', 68, NULL, '2025-11-21 05:29:08'),
(10, 1, 1, 'test 1', 12, 'uploads/1763708078_part1_coverltter.pdf', 'uploads/1763708078_part2_Kavindu Bogahawatte Mad Mobile LK Cover Letter .pdf', 46, NULL, '2025-11-21 06:54:38'),
(11, 2, 2, 'History test 1', 40, 'uploads/1763709683_part1_coverltter.pdf', 'uploads/1763709683_part2_Kavindu Bogahawatte Mad Mobile LK Cover Letter With Image.pdf', 88, NULL, '2025-11-21 07:21:23'),
(12, 2, 2, 'History test 1', 40, 'uploads/1763709747_part1_coverltter.pdf', 'uploads/1763709747_part2_Kavindu Bogahawatte Mad Mobile LK Cover Letter With Image.pdf', 88, NULL, '2025-11-21 07:22:27'),
(13, 2, 2, 'History test 1', 40, 'uploads/1763710145_part1_coverltter.pdf', 'uploads/1763710145_part2_Kavindu Bogahawatte Mad Mobile LK Cover Letter With Image.pdf', 88, NULL, '2025-11-21 07:29:05'),
(14, 2, 2, 'Ict 2024 test1', 33, 'uploads/1763710566_part1_coverltter.pdf', 'uploads/1763710566_part2_coverltter.pdf', 88, NULL, '2025-11-21 07:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`) VALUES
(1, 'Lithumi Bogahawaththa', 'dammikathennakoon2022@gmail.com', 'ccbe5003d10f1a3404c44bd9ec86c5fa'),
(2, 'Manmitha Wijekoon', 'kavindumalshan2003@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(1, 'ICT'),
(2, 'History'),
(3, 'Science');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
