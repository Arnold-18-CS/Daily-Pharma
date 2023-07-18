-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 08:02 AM
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
-- Database: `dailyPharma`
--

CREATE DATABASE dailyPharma;


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `adminLastName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminLastName`,`Password`) VALUES
('John','password1'),
('Jane','password2'),
('Lance','123yy');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Company_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Company_Name` varchar(50) NOT NULL,
  `Company_Email` varchar(50) NOT NULL,
  `Company_Phone` int(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Company_ID`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `company` (`Company_Name`, `Company_Email`, `Company_Phone`, `Password`) VALUES
('ABC Pharmaceuticals', 'abcpharma@gmail.com', 'password123'),
('XYZ Pharmaceuticals', 'xyzpharma@gmail.com', 'pass456'),
('PQR Pharmaceuticals', 'pqrpharma@gmail.com', 'pharmapass'),
('DEF Pharmaceuticals', 'defpharma@gmail.com', 'qwerty123'),
('GHI Pharmaceuticals', 'ghipharma@gmail.com', 'pass789'),
('JKL Pharmaceuticals', 'jklpharma@gmail.com', 'pharmasecure'),
('MNO Pharmaceuticals', 'mnopharma@gmail.com', 'password7890'),
('RST Pharmaceuticals', 'rstpharma@gmail.com', 'pharmapassword'),
('UVW Pharmaceuticals', 'uvwpharma@gmail.com', 'pass1234'),
('Destiny Lars', 'aadl@yahoo.com', '123yy');

-- --------------------------------------------------------

--
-- Table structure for table `dispensed`
--
/*
CREATE TABLE `dispensed` (
  `ID` int(50) NOT NULL,
  `patientID` int(50) NOT NULL,
  `doctorID` int(50) NOT NULL,
  `drugID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
*/
-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Doctor_SSN` int(10) NOT NULL,
  `Doctor_Name` varchar(20) NOT NULL,
  `Doctor_Phone` int(20) NOT NULL,
  `Doctor_Speciality` varchar(20) NOT NULL,
  `Doctor_Experience` int(3) NOT NULL,
  `Doctor_Patient` int(10),
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Doctor_SSN`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Doctor_SSN`, `Doctor_Name`, `Doctor_Phone`, `Doctor_Speciality`, `Doctor_Experience`, `Password`)
VALUES
(24, 'Dr. Michael', 2147483647, 'Pediatrics', 10, 'password1'),
(25, 'Dr. Sarah', 1112223333, 'Orthopedic', 11, 'password2'),
(26, 'Dr. Christopher', 1112223333, 'Orthopedic', 5, 'password3'),
(27, 'Dr. Olivia', 147483647, 'Neurosurgeon', 3, 'password4'),
(42, 'Rewel', 12103923, 'Residency', 1, '123yy'),
(43, 'Dr. Emily', 2147483647, 'Dermatology', 8, 'password6'),
(44, 'Dr. Daniel', 1112223333, 'Cardiology', 15, 'password7'),
(45, 'Dr. Jessica', 1112223333, 'Gastroenterology', 7, 'password8'),
(46, 'Dr. Andrew', 147483647, 'Psychiatry', 9, 'password9'),
(47, 'Dr. James', 12103923, 'Family Medicine', 12, 'password10');


-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `Drug_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Drug_Name` varchar(50) NOT NULL,
  `Drug_Description` varchar(200) DEFAULT NULL,
  `Drug_Quantity` varchar(4) NOT NULL,
  `Drug_Expiration_Date` date DEFAULT NULL,
  `Drug_Manufacturing_Date` date DEFAULT NULL,
  `Drug_Company` varchar(50) NOT NULL,
  PRIMARY KEY (`Drug_ID`)


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`Drug_Name`, `Drug_Description`, `Drug_Quantity`, `Drug_Expiration_Date`, `Drug_Manufacturing_Date`, `Drug_Company`) VALUES
('Paracetamol', 'Fever reducer', 311, '2023-11-30', '2023-03-01', 'HealthMeds'),
('Metformin', 'Diabetes medication' 60, '2024-04-30', '2023-10-01', 'Pharmagen'),
('Aspirin', 'Pain reliever', 150, '2023-12-31', '2023-01-01', 'HealthMeds'),
('Simvastatin', 'Cholesterol medication' , 25, '2024-03-31', '2023-07-15', 'Pharmagen'),
('Metoprolol', 'Beta blocker',50, '2024-01-31', '2023-06-15', 'HealthMeds'),
('Warfarin', 'Blood thinner', 20, '2024-04-30', '2023-10-01', 'Pharmagen'),
('Loratadine', 'Antihistamine', 200, '2023-12-31', '2023-01-01', 'HealthMeds'),
('Citalopram', 'Antidepressant', 30, '2024-03-31', '2023-07-15', 'Pharmaco Inc.'),
('Aspirin', 'Pain reliever and fever reducer', 80, '2023-10-31', '2022-07-20', 'ABC Pharmaceuticals'),
('Cetirizine', 'Antihistamine for allergy relief', 60, '2024-05-31', '2022-08-15', 'XYZ Pharmaceuticals'),
('Amlodipine', 'Medication for high blood pressure and chest pain', 70, '2023-12-31', '2022-09-30', 'DEF Pharmaceuticals'),
('Metoprolol', 'Beta-blocker for high blood pressure and angina', 40, '2023-09-30', '2022-08-05', 'PQR Pharmaceuticals'),
('Warfarin', 'Anticoagulant medication', 90, '2024-06-30', '2022-10-25', 'GHI Pharmaceuticals'),
('Insulin', 'Medication for managing diabetes',50, '2023-11-30', '2022-07-15', 'JKL Pharmaceuticals'),
('Escitalopram', 'Antidepressant medication', 60, '2023-10-31', '2022-09-01', 'MNO Pharmaceuticals'),
('Lisinopril', 'Medication for high blood pressure', 30, '2023-12-31', '2022-08-15', 'RST Pharmaceuticals'),
('Duloxetine', 'Medication for depression and anxiety',80, '2024-07-31', '2022-10-10', 'UVW Pharmaceuticals'),
('Gabapentin', 'Medication for neuropathic pain and seizures', 50, '2023-09-30', '2022-07-25', 'ABC Pharmaceuticals'),
('Ondansetron', 'Medication for preventing nausea and vomiting', 40, '2023-12-31', '2022-08-20', 'XYZ Pharmaceuticals'),
('Hydrochlorothiazide', 'Diuretic for high blood pressure and edema',  70, '2023-11-30', '2022-09-15', 'DEF Pharmaceuticals'),
('Tramadol', 'Pain reliever for moderate to severe pain',60, '2024-08-31', '2022-10-20', 'PQR Pharmaceuticals'),
('Atenolol', 'Beta-blocker for high blood pressure and chest pain',80, '2023-09-30', '2022-08-05', 'GHI Pharmaceuticals'),
('Fluoxetine', 'Antidepressant medication',50, '2023-10-31', '2022-09-15', 'JKL Pharmaceuticals'),
('Levothyroxine', 'Thyroid hormone replacement therapy', 30, '2023-12-31', '2022-07-30', 'MNO Pharmaceuticals'),
('Morphine', 'Narcotic pain medication', 90, '2024-07-31', '2022-10-25', 'RST Pharmaceuticals'),
('Bupropion', 'Antidepressant and smoking cessation aid', 60, '2023-09-30', '2022-08-10', 'UVW Pharmaceuticals');

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patient_SSN` int(10) NOT NULL,
  `Patient_Name` varchar(20) NOT NULL,
  `Patient_Address` varchar(50) NOT NULL,
  `Patient_Email` varchar(20) NOT NULL,
  `Patient_Phone` int(20) NOT NULL,
  `Patient_Gender` varchar(10) NOT NULL,
  `Patient_DOB` date NOT NULL,
  `Patient_Age` int(3) NOT NULL,
  `Patient_Physician` varchar(20),
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Patient_SSN`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patient_SSN`, `Patient_Name`, `Patient_Address`, `Patient_Phone`, `Patient_Email`, `Patient_DOB`, `Patient_Age`, `Patient_Physician`, `Password`)
VALUES
(23, 'Jane', '456 Elm St', 'janesmith@yahoo.com', 2147483647, '1992-05-10', 31, 'password1'),
(24, 'John', '789 Oak St', 'johnsmith@gmail.com', 2147483647, '1990-09-15', 33, 'password2'),
(25, 'Sarah', '123 Maple Ave', 'sarahjones@hotmail.com', 2147483647, '1985-12-03', 38, 'password3'),
(26, 'Michael', '321 Pine St', 'michaeldavis@gmail.com', 2147483647, '1995-07-20', 28, 'password4'),
(27, 'Emily', '567 Birch Rd', 'emilywilson@yahoo.com', 2147483647, '1988-02-18', 33, 'password5'),
(28, 'David', '987 Cedar Ln', 'davidbrown@gmail.com', 2147483647, '1993-11-29', 28, 'password6'),
(29, 'Jennifer', '654 Walnut Dr', 'jennifermartin@hotmail.com', 2147483647, '1991-06-05', 30, 'password7'),
(30, 'Daniel', '876 Spruce St', 'danieldavis@yahoo.com', 2147483647, '1987-09-12', 34, 'password8'),
(31, 'Jessica', '234 Oak St', 'jessicawilson@gmail.com', 2147483647, '1996-04-17', 27, 'password9'),
(32, 'Christopher', '543 Maple Ave', 'christopherbrown@hotmail.com', 2147483647, '1994-08-22', 29, 'password10'),
(33, 'Sophia', '789 Pine St', 'sophiadavis@yahoo.com', 2147483647, '1989-03-25', 32, 'password11'),
(34, 'Andrew', '876 Birch Rd', 'andrewmartin@gmail.com', 2147483647, '1992-10-30', 28, 'password12'),
(35, 'Olivia', '432 Cedar Ln', 'oliviabrown@hotmail.com', 2147483647, '1990-01-07', 31, 'password13'),
(36, 'James', '678 Walnut Dr', 'jameswilson@yahoo.com', 2147483647, '1986-06-13', 35, 'password14'),
(37, 'Ava', '987 Spruce St', 'avadavis@gmail.com', 2147483647, '1995-03-20', 27, 'password15'),
(38, 'Emma', '345 Elm St', 'emmamartin@hotmail.com', 2147483647, '1993-12-25', 28, 'password16');


-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--
CREATE TABLE `pharmacy` (
  `Pharmacy_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Pharmacy_Name` varchar(50) NOT NULL,
  `Pharmacy_Email` varchar(50) NOT NULL,
  `Pharmacy_Phone` int(20) NOT NULL,
  `Phamacy_Address` varchar(50) NOT NULL
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Pharmacy_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacy` (`Pharmacy_ID`, `Pharmacy_Name`, `Pharmacy_Email`, `Phamacy_Phone`, `Phamacy_Address`, `Password`) VALUES
(1, 'ABC Pharmacy', 'abcpharmacy@gmail.com', 1234567890, '123 Main St', 'password123'),
(2, 'XYZ Pharmacy', 'xyzpharmacy@gmail.com', 9876543210, '456 Elm St', 'password456'),
(3, 'EFG Pharmacy', 'efgpharmacy@gmail.com', 1112223333, '789 Oak St', 'password789'),
(4, 'LMN Pharmacy', 'lmnpharmacy@gmail.com', 4445556666, '321 Pine St', 'passwordabc'),
(5, 'PQR Pharmacy', 'pqrpharmacy@gmail.com', 7778889999, '654 Walnut Dr', 'passwordxyz');


-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `Prescriptions_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Patient_SSN` int(10) NOT NULL,
  `Doctor_SSN` int(10) NOT NULL,
  `Drug_ID` int(10) NOT NULL,
  `Drug_Name` varchar(50) NOT NULL,
  `Prescription_Amount` varchar(50) NOT NULL,
  `Prescription_Dosage` varchar(10) NOT NULL,
  `Prescription_Instructions` varchar(200) DEFAULT NULL,
  `Prescribed` CHAR(1) NOT NULL DEFAULT 'N',
PRIMARY KEY (`Prescriptions_ID`, `Patient_SSN`, `Doctor_SSN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`Prescriptions_ID`, `Patient_SSN`, `Doctor_SSN`, `Drug_ID`, `Drug_Name`, `Prescription_Amount`, `Prescription_Dosage`, `Prescription_Instructions`, `Prescribed`)
VALUES
(1, 23, 24, 1, 'Paracetamol', '100 mg', '2 times daily', 'Take with water', 'N'),
(2, 23, 25, 2, 'Metformin', '500 mg', '1 time daily', 'Take with food', 'N'),
(3, 23, 26, 3, 'Aspirin', '75 mg', '1 time daily', 'Take after meals', 'N'),
(4, 23, 27, 4, 'Simvastatin', '20 mg', '1 time daily', 'Take in the evening', 'N'),
(5, 23, 42, 5, 'Metoprolol', '50 mg', '2 times daily', 'Take with or without food', 'N'),
(6, 23, 24, 6, 'Warfarin', '5 mg', '1 time daily', 'Take at the same time each day', 'N'),
(7, 23, 25, 7, 'Loratadine', '10 mg', '1 time daily', 'Take with or without food', 'N'),
(8, 23, 26, 8, 'Citalopram', '20 mg', '1 time daily', 'Take with or without food', 'N'),
(9, 23, 27, 9, 'Aspirin', '100 mg', '1 time daily', 'Take after meals', 'N'),
(10, 23, 42, 10, 'Cetirizine', '10 mg', '1 time daily', 'Take with water', 'N'),
(11, 24, 24, 1, 'Paracetamol', '100 mg', '2 times daily', 'Take with water', 'N'),
(12, 24, 25, 2, 'Metformin', '500 mg', '1 time daily', 'Take with food', 'N'),
(13, 24, 26, 3, 'Aspirin', '75 mg', '1 time daily', 'Take after meals', 'N'),
(14, 24, 27, 4, 'Simvastatin', '20 mg', '1 time daily', 'Take in the evening', 'N'),
(15, 24, 42, 5, 'Metoprolol', '50 mg', '2 times daily', 'Take with or without food', 'N'),
(16, 25, 24, 6, 'Warfarin', '5 mg', '1 time daily', 'Take at the same time each day', 'N'),
(17, 25, 25, 7, 'Loratadine', '10 mg', '1 time daily', 'Take with or without food', 'N'),
(18, 25, 26, 8, 'Citalopram', '20 mg', '1 time daily', 'Take with or without food', 'N'),
(19, 25, 27, 9, 'Aspirin', '100 mg', '1 time daily', 'Take after meals', 'N'),
(20, 25, 42, 10, 'Cetirizine', '10 mg', '1 time daily', 'Take with water', 'N');

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `Supervisor_ID` int(10) NOT NULL,
  `Supervisor_Name` varchar(50) NOT NULL,
  `Supervisor_Email` varchar(50) NOT NULL
  PRIMARY KEY (`Supervisor_ID`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`Supervisor_ID`, `Supervisor_Name`, `Supervisor_Email`)
VALUES
(1, 'John Doe', 'john.doe@example.com'),
(2, 'Jane Smith', 'jane.smith@example.com'),
(3, 'David Johnson', 'david.johnson@example.com'),
(4, 'Sarah Wilson', 'sarah.wilson@example.com'),
(5, 'Michael Brown', 'michael.brown@example.com'),
(6, 'Emily Davis', 'emily.davis@example.com'),
(7, 'Robert Taylor', 'robert.taylor@example.com'),
(8, 'Jessica Anderson', 'jessica.anderson@example.com'),
(9, 'Christopher Lee', 'christopher.lee@example.com'),
(10, 'Amanda Martinez', 'amanda.martinez@example.com'),
(11, 'Daniel Thomas', 'daniel.thomas@example.com'),
(12, 'Olivia Clark', 'olivia.clark@example.com'),
(13, 'William Rodriguez', 'william.rodriguez@example.com'),
(14, 'Sophia Lewis', 'sophia.lewis@example.com'),
(15, 'Matthew Hernandez', 'matthew.hernandez@example.com');

--
-- Creating table `contracts`
--

CREATE TABLE `contracts` (
  `Contract_ID` int(10) NOT NULL,
  `Pharmacy_ID` int(10) NOT NULL,
  `Company_ID` int(10) NOT NULL,
  `Supervisor_ID` int(10) NOT NULL,
  `Start_Date` date DEFAULT CURRENT_TIMESTAMP,
  `End_Date` date DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Contract_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`Contract_ID`, `Pharmacy_ID`, `Company_ID`, `Supervisor_ID`, `Start_Date`, `End_Date`)
VALUES
(1, 1, 1, 1, '2023-01-01', '2023-12-31'),
(2, 2, 2, 2, '2023-03-15', '2024-03-14'),
(3, 3, 3, 3, '2023-06-01', '2024-05-31'),
(4, 4, 4, 4, '2023-09-15', '2024-09-14'),
(5, 5, 5, 5, '2024-01-01', '2024-12-31')




CREATE TABLE `orders` (
  `Order_ID` int(10) NOT NULL,
  `Patient_SSN` int(10) NOT NULL,
  `Drug_ID` int(10) NOT NULL,
  `Patient_Address` varchar(50) NOT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `compan`
--
ALTER TABLE `company`
  MODIFY `Company_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `Drug_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `Pharmacy_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `Prescription_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `Supervisor_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`Patient_SSN`) REFERENCES `patients` (`Patient_SSN`),
  ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`Doctor_SSN`) REFERENCES `doctors` (`Doctor_SSN`);
COMMIT;

ALTER TABLE `contracts`
ADD FOREIGN KEY (`Pharmacy_ID`) REFERENCES `pharmacies` (`Pharmacy_ID`),
ADD FOREIGN KEY (`Company_ID`) REFERENCES `companies` (`Company_ID`),
ADD FOREIGN KEY (`Supervisor_ID`) REFERENCES `supervisors` (`Supervisor_ID`);

ALTER TABLE `orders`
ADD FOREIGN KEY (`Patient_SSN`) REFERENCES `patients` (`Patient_SSN`),
ADD FOREIGN KEY (`Drug_ID`) REFERENCES `drugs` (`Drug_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
