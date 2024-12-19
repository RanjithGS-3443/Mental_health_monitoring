-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 07:12 PM
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
-- Database: `mental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Admin User', 'admin@example.com', 'securepassword');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `physio_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hire_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `role`, `phone_number`, `email`, `hire_date`, `created_at`, `password`) VALUES
(1, 'Ranjith GS', 'pschologists monitor', '07204962838', 'ranjithgs1234@gmail.com', '2024-09-19', '2024-09-21 07:26:06', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `feedback_score` int(11) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `psychologist_name` varchar(100) NOT NULL,
  `psychologist_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `feedback_score`, `submitted_at`, `psychologist_name`, `psychologist_email`) VALUES
(1, 'kiran v', 'kirab1@gmail.com', 'good experience and psychologist guides veryy good', 0, '2024-09-21 07:51:34', 'Ranjith GS', 'ranjithgs1234@gmail.com'),
(2, 'kiran v', 'kirab1@gmail.com', 'good experience and psychologist guides veryy good', 0, '2024-09-21 07:52:32', 'Ranjith GS', 'ranjithgs1234@gmail.com'),
(3, 'kiran V', 'ranjithgs1234@gmail.com', 'very good guide', 0, '2024-09-21 08:24:06', 'Ranjith GS', 'ranjithgs123@gmail.com'),
(4, 'Kiran V', 'ranjithgs1234@gmail.com', 'not worthy', 2, '2024-12-19 18:00:12', 'ranju', 'ranjithgs1234@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `pending_approvals`
--

CREATE TABLE `pending_approvals` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `years_of_experience` int(11) DEFAULT NULL,
  `education` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psychologists`
--

CREATE TABLE `psychologists` (
  `psycho_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `education` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psychologists`
--

INSERT INTO `psychologists` (`psycho_id`, `name`, `specialization`, `phone_number`, `email`, `years_of_experience`, `created_at`, `availability`, `password`, `education`) VALUES
(1, 'Ranjith GS', 'Medicine', '07204962838', 'ranjithgs123@gmail.com', 2, '2024-09-21 04:58:25', 'available', 'ranjith@govt', NULL),
(3, 'Ranjith GS', 'Medicine', '07204962838', 'ranjithgs1234@gmail.com', 1, '2024-09-21 04:58:45', 'available', NULL, NULL),
(4, 'Sagar', 'psychologist', '9845410839', 'sagar@gmail.com', 25, '2024-12-19 18:04:09', NULL, 'sagar@govt', 'MBBS');

-- --------------------------------------------------------

--
-- Table structure for table `psychologists_allocation`
--

CREATE TABLE `psychologists_allocation` (
  `allocation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `psycho_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psychologists_allocation`
--

INSERT INTO `psychologists_allocation` (`allocation_id`, `user_id`, `psycho_id`, `appointment_date`, `appointment_time`) VALUES
(1, 13, 3, '2024-09-02', NULL),
(11, 13, 3, '2024-09-04', '14:52:00'),
(13, 12, 1, '2024-12-04', '12:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `date_of_birth`, `gender`, `phone_number`, `created_at`) VALUES
(12, 'Ranjth GS', 'ranjithgs1234@gmail.com', 'ranjith@govt', '2024-09-06', 'Male', '7204962838', '2024-09-20 13:41:18'),
(13, 'kiran v', 'kirab1@gmail.com', 'kiran@govt', '2024-09-05', 'Male', '9110565869', '2024-09-20 13:56:39'),
(14, 'sagar', 'sagar12@gmail.com', 'sagar1234', '2024-09-05', 'Male', '1234567890', '2024-09-21 05:32:17'),
(18, 'Ranjth GS', 'ranjithgs1@gmail.com', 'ranjith@govt', '2024-09-03', 'Male', '4561237891', '2024-09-21 05:38:09'),
(19, 'karan', 'karan1@gmail.com', '123456', '2024-09-05', 'Male', '1234567890', '2024-09-21 07:55:43'),
(20, 'anil', 'anil1@gmail.com', '123456', '2024-09-11', 'Male', '4561237891', '2024-09-21 08:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_mental_problems`
--

CREATE TABLE `user_mental_problems` (
  `problem_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `problem_description` text NOT NULL,
  `diagnosis_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_mental_problems`
--

INSERT INTO `user_mental_problems` (`problem_id`, `user_id`, `problem_description`, `diagnosis_date`) VALUES
(6, 12, 'mental stress', '2004-02-02'),
(7, 13, 'more stress', '2024-09-19'),
(8, 20, 'mental stress', '2024-09-25'),
(9, 12, 'mental stress', '2024-12-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `physio_id` (`physio_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_approvals`
--
ALTER TABLE `pending_approvals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `psychologists`
--
ALTER TABLE `psychologists`
  ADD PRIMARY KEY (`psycho_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `psychologists_allocation`
--
ALTER TABLE `psychologists_allocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `physiologist_id` (`psycho_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_mental_problems`
--
ALTER TABLE `user_mental_problems`
  ADD PRIMARY KEY (`problem_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pending_approvals`
--
ALTER TABLE `pending_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `psychologists`
--
ALTER TABLE `psychologists`
  MODIFY `psycho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `psychologists_allocation`
--
ALTER TABLE `psychologists_allocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_mental_problems`
--
ALTER TABLE `user_mental_problems`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`physio_id`) REFERENCES `psychologists` (`psycho_id`) ON DELETE CASCADE;

--
-- Constraints for table `psychologists_allocation`
--
ALTER TABLE `psychologists_allocation`
  ADD CONSTRAINT `psychologists_allocation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `psychologists_allocation_ibfk_2` FOREIGN KEY (`psycho_id`) REFERENCES `psychologists` (`psycho_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_mental_problems`
--
ALTER TABLE `user_mental_problems`
  ADD CONSTRAINT `user_mental_problems_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
