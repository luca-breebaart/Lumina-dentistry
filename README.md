# llumina-dentistry

# Receptionist Management System

The Receptionist Management System is a web application that allows receptionists to manage appointments, doctors, receptionists, and patients in a medical facility. It provides functionalities such as creating appointments, managing doctors and receptionists, and maintaining patient records.

## Features

- User Authentication: Login functionality for receptionists to access the system.
- Dashboard: Provides an overview of upcoming appointments and the ability to create new appointments.
- Appointments: Create, view, edit, and delete appointments.
- Doctors: View, add, edit, and delete doctors, including their profile images.
- Receptionists: View, add, edit, and delete receptionists, including their profile images.
- Patients: View, add, edit, and delete patient records.

## Installation

1. Clone the repository: `git clone <repository-url>`
2. Navigate to the project directory: `cd receptionist-management-system`
3. Import the database: Import the provided SQL file `database.sql` to your database server.
4. Configure database connection: Update the database credentials in the `db.php` file.
5. Set up the web server: Configure your web server (e.g., Apache) to serve the project directory.
6. Access the application: Open the web browser and enter the URL for the application.

## Database:

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumina_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `receptionist_id` int(100) NOT NULL,
  `medicalaid_number` varchar(100) NOT NULL,
  `medicalfund` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `name`, `surname`, `patient_id`, `date`, `time`, `doctor_id`, `receptionist_id`, `medicalaid_number`, `medicalfund`, `description`) VALUES
(7, 'peter', 'griffs', 7, '2023-06-30', '10:30:00.000000', 50, 2, '123456', '', 'fever, sweating, coughing'),
(8, 'jeffry', 'bezosss', 2, '2023-06-30', '11:15:00.000000', 56, 2, '123546', '', 'check up'),
(9, 'Tom', 'Breebaart', 5, '2023-07-03', '09:00:00.000000', 56, 2, '123456', '', ''),
(10, 'Tom', 'Breebaart', 5, '2023-07-02', '13:30:00.000000', 57, 2, '123456', '', 'sick');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `specialisation` varchar(100) NOT NULL,
  `room_number` varchar(100) NOT NULL,
  `profile_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `surname`, `age`, `gender`, `phone_number`, `email`, `password`, `specialisation`, `room_number`, `profile_image`) VALUES
(50, 'Fred', 'Peterson', '18', 'male', '0649094008', '221345@virtualwindow.co.za', '123456', 'Student', '12A', 'Luca - 2023.06.21 - 03.00.55pm.jpg'),
(53, 'Jeff', 'Stones', '18', 'male', '0649094008', '221345@virtualwindow.co.za', '123456', 'dentist', '12A', 'Jeff - 2023.06.28 - 02.51.31pm.jpg'),
(56, 'Bob', 'jones', '32', 'male', '012 456 7512', 'bob@gmail.com', '123456', 'Denstist', '13B', 'Bob - 2023.06.28 - 02.55.39pm.jpeg'),
(57, 'Suzelle', 'DIY', '32', 'Female', '032 458 2354', 'Suzelle@gmail.com', '123456', 'nurse', '13B', 'Suzelle - 2023.06.28 - 02.58.31pm.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patients_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `medicalaid_number` varchar(100) NOT NULL,
  `previous_appointments` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patients_id`, `name`, `surname`, `age`, `gender`, `phone_number`, `email`, `medicalaid_number`, `previous_appointments`) VALUES
(2, 'jeffry', 'bezosss', '55', 'male', '0648644477', 'jeff@gmail.com', '123546', '2023-06-01'),
(3, 'frank', 'park', '41', 'male', '0649541234', 'frank@gmail.com', '123456', '2023-06-06'),
(5, 'Tom', 'Breebaart', '18', 'male', '0649094008', 'tom@gmail.com', '123456', '0000-00-00'),
(7, 'peter', 'griffs', '25', 'Male', '012 456 4523', 'peter@gmail.com', '123456', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `receptionists_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` tinyint(1) NOT NULL,
  `profile_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`receptionists_id`, `name`, `surname`, `age`, `gender`, `phone_number`, `email`, `password`, `rank`, `profile_image`) VALUES
(2, 'Luca', 'Breebaart', '18', 'male', '064 909 4008', 'luca.breebaart99@gmail.com', '123456', 1, 'Luca - 2023.06.28 - 01.44.53pm.jpg'),
(6, 'karen', 'van de merve', '32', 'Female', '012 5436 7541', 'karen@gmail.com', '123456', 1, 'karen - 2023.06.28 - 02.56.30pm.jpeg'),
(7, 'Suzie', 'Bergers', '25', 'Female', '054 564 1258', 'Suzie', '123456', 0, 'Suzie - 2023.06.28 - 02.59.15pm.jpeg'),
(8, 'steve', 'franklys', '37', 'Male', '032 546 9851', 'steve@gmail.com', '123456', 1, 'steve - 2023.06.28 - 03.00.14pm.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `receptionist_id` (`receptionist_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patients_id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`receptionists_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patients_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `receptionists_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


## Usage

1. Login: On the login page, enter your receptionist name and password to log in to the system.
2. Dashboard: After successful login, you will be redirected to the dashboard. Here, you can view upcoming appointments and create new appointments.
3. Appointments: Navigate to the appointments page to manage appointments. You can create new appointments, view appointment details, edit existing appointments, and delete appointments.
4. Doctors: Go to the doctors page to manage doctors. You can view the list of doctors, add new doctors with their profile images, edit doctor details, and delete doctors.
5. Receptionists: Access the receptionists page to manage receptionists. You can view the list of receptionists, add new receptionists with their profile images, edit receptionist details, and delete receptionists.
6. Patients: Visit the patients page to manage patient records. You can view the list of patients, add new patients, edit patient details, and delete patients.
7. Logout: To log out of the system, click on the "Logout" button.

## Technologies Used

- HTML/CSS
- PHP
- MySQL



