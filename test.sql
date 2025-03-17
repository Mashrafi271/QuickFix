-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 10:48 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `admin_mail` varchar(255) DEFAULT NULL,
  `admin_contact` varchar(255) DEFAULT NULL,
  `admin_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `admin_mail`, `admin_contact`, `admin_name`) VALUES
(1, 'admin1@quickfix.com', '555-0101', 'Alice Admin'),
(2, 'admin2@quickfix.com', '555-0102', 'Bob Admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_ID` int(11) NOT NULL,
  `App_date` date DEFAULT NULL,
  `App_time` time DEFAULT NULL,
  `App_status` varchar(255) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `VIN` varchar(17) DEFAULT NULL,
  `Service_ID` int(11) DEFAULT NULL,
  `Admin_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_ID`, `App_date`, `App_time`, `App_status`, `Customer_ID`, `VIN`, `Service_ID`, `Admin_ID`) VALUES
(1, '2025-03-18', '10:00:00', 'Scheduled', 1, '1HGCM82633A123456', 1, 1),
(2, '2025-03-19', '14:30:00', 'Completed', 2, '2HGFG12839H123457', 2, 2),
(3, '2025-03-20', '09:15:00', 'Pending', 3, '1G1BL52P2TR123458', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `VIN` varchar(17) NOT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `Make` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`VIN`, `Model`, `Make`, `Year`, `Customer_ID`) VALUES
('1G1BL52P2TR123458', 'Malibu', 'Chevrolet', 2006, 3),
('1HGCM82633A123456', 'Civic', 'Honda', 2003, 1),
('2HGFG12839H123457', 'Accord', 'Honda', 2015, 2),
('VIN12345678901234', 'Camry', 'Toyota', 2020, 1),
('VIN23456789012345', 'Civic', 'Honda', 2019, 2),
('VIN34567890123456', 'F-150', 'Ford', 2021, 3),
('VIN45678901234567', 'Model 3', 'Tesla', 2022, 4),
('VIN56789012345678', 'Corolla', 'Toyota', 2018, 5);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `title`, `created`) VALUES
(1, 'Jane Doe', 'johndoe@example.com', '2026550143', 'Lawyer', '2019-05-08 17:32:00'),
(2, 'David Deacon', 'daviddeacon@example.com', '2025550121', 'Employee', '2019-05-08 17:28:44'),
(3, 'Sam White', 'samwhite@example.com', '2004550121', 'Employee', '2019-05-08 17:29:27'),
(4, 'Colin Chaplin', 'colinchaplin@example.com', '2022550178', 'Supervisor', '2019-05-08 17:29:27'),
(5, 'Ricky Waltz', 'rickywaltz@example.com', '7862342390', '', '2019-05-09 19:16:00'),
(6, 'Arnold Hall', 'arnoldhall@example.com', '5089573579', 'Manager', '2019-05-09 19:17:00'),
(7, 'Toni Adams', 'alvah1981@example.com', '2603668738', '', '2019-05-09 19:19:00'),
(8, 'Donald Perry', 'donald1983@example.com', '7019007916', 'Employee', '2019-05-09 19:20:00'),
(9, 'Joe McKinney', 'nadia.doole0@example.com', '6153353674', 'Employee', '2019-05-09 19:20:00'),
(10, 'Angela Horst', 'angela1977@example.com', '3094234980', 'Assistant', '2019-05-09 19:21:00'),
(11, 'James Jameson', 'james1965@example.com', '4002349823', 'Assistant', '2019-05-09 19:32:00'),
(12, 'Daniel Deacon', 'danieldeacon@example.com', '5003423549', 'Manager', '2019-05-09 19:33:00'),
(31, 'demo12', '', '', '', '2025-03-17 09:30:00'),
(44, 'hmmkk', '', '', '', '2025-03-17 09:59:00'),
(45, 'khbkh', '', '', '', '2025-03-17 10:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Name`, `DOB`, `Address`, `Email`) VALUES
(1, 'John Doe', '1990-05-15', '123 Main St, Anytown', 'john.doe@example.com'),
(2, 'Jane Smith', '1985-12-01', '456 Oak Ave, Anytown', 'jane.smith@example.com'),
(3, 'David Lee', '1992-08-22', '789 Pine Ln, Anytown', 'david.lee@example.com'),
(4, 'Sarah Jones', '1988-03-10', '101 Elm Rd, Anytown', 'sarah.jones@example.com'),
(5, 'Michael Brown', '1995-09-28', '202 Maple Dr, Anytown', 'michael.brown@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `CustomerName` varchar(25) DEFAULT NULL,
  `ContactName` varchar(25) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `City` varchar(25) DEFAULT NULL,
  `PostalCode` int(10) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerName`, `ContactName`, `Address`, `City`, `PostalCode`, `Country`, `Gender`) VALUES
(101, 'Saffayet', 'Dipu', 'road 11, block-C, 390/A', 'Dhaka', 1203, 'Bangladesh', 'Male'),
(102, 'Rafat', 'Omar', 'road 12, block-D, 330/D', 'Dhaka', 1203, 'Bangladesh', 'Male'),
(103, 'Israt', 'Imon', 'Jakarta Street', 'Jakarta', 3007, 'Indonesia', 'Female'),
(104, 'Sania Khan', 'Shawon', '527/A, Cumilla', 'Cumilla', 1305, 'Bangladesh', 'Female'),
(105, 'Dihan', 'Depro', '102/F,Road-4A', 'Sylhet', 101, 'Bangladesh', 'Male'),
(106, 'Taarak Mehta', 'Arnob', 'Powder Gali,Gokuldham Society', 'Mumbai', 1007, 'India', 'Male'),
(107, 'Disha', 'Dhar', 'Powder Gali,Gokuldham Society', 'Pune', 1007, 'India', 'Female'),
(108, 'Suzuki', 'Nakamura', ' 513,Meiji Shinto', 'Tokyo', 1367, 'Japan', 'Female'),
(109, 'Sadia', 'Somaya', '123/B, Uttara', 'Dhaka', 1224, 'Bangladesh', 'Female'),
(110, 'Dipak', 'Devnath', '1108/F,Jugantar gali,Motijheel', 'Dhaka', 1224, 'Bangladesh', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `Feed_date` date DEFAULT NULL,
  `Appointment_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_ID`, `Rating`, `Comments`, `Feed_date`, `Appointment_ID`, `Customer_ID`) VALUES
(1, 4, 'Great service, quick turnaround!', '2025-03-19', 2, 2),
(2, 5, 'Excellent work, highly recommend!', '2025-03-20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `JobID` int(15) NOT NULL,
  `JobTitle` varchar(30) DEFAULT NULL,
  `MinSalary` int(100) DEFAULT NULL,
  `MaxSalary` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JobID`, `JobTitle`, `MinSalary`, `MaxSalary`) VALUES
(3001, 'Teacher', 16500, 150000),
(3002, 'Doctor', 28500, 500000),
(3003, 'Businessman', 50000, 5000000),
(3004, 'Banker', 30500, 200000),
(3005, 'software Engineer', 15000, 300000),
(3006, 'Administrative Officer', 35500, 120000),
(3007, 'Custom Officer', 35500, 130000);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderdetailID` int(5) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderdetailID`, `OrderID`, `ProductID`, `Quantity`) VALUES
(1, 10309, 1, 12),
(2, 10311, 3, 100),
(3, 10309, 2, 20),
(4, 10309, 2, 12),
(5, 10311, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(5) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `OrderDate` date DEFAULT NULL,
  `PersonID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `OrderDate`, `PersonID`) VALUES
(10308, 101, '2024-03-12', 1007),
(10309, 106, '2024-03-12', 1002),
(10310, 102, '2024-03-10', 1003),
(10311, 103, '2024-03-07', 1007),
(10312, 102, '2024-03-01', 1003),
(10313, 103, '2024-02-08', 1007),
(10314, 106, '2023-12-21', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `Part_ID` int(11) NOT NULL,
  `Part_name` varchar(255) DEFAULT NULL,
  `Part_price` decimal(10,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Supplier_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`Part_ID`, `Part_name`, `Part_price`, `Quantity`, `Type`, `Supplier_ID`) VALUES
(1, 'Oil Filter', 12.50, 50, 'Filter', 1),
(2, 'Brake Pad Set', 80.00, 30, 'Brake', 1),
(3, 'Tire', 60.00, 20, 'Tire', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(11) NOT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Pay_date` date DEFAULT NULL,
  `Pay_status` varchar(255) DEFAULT NULL,
  `Method` varchar(255) DEFAULT NULL,
  `Appointment_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `Amount`, `Pay_date`, `Pay_status`, `Method`, `Appointment_ID`) VALUES
(1, 49.99, '2025-03-19', 'Paid', 'Credit Card', 1),
(2, 150.00, '2025-03-20', 'Paid', 'Cash', 2);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `PersonID` int(15) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Age` int(5) DEFAULT NULL,
  `Salary` int(100) DEFAULT NULL,
  `HireDate` date DEFAULT NULL,
  `JobID` int(100) DEFAULT NULL,
  `Location` varchar(20) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`PersonID`, `FirstName`, `LastName`, `Age`, `Salary`, `HireDate`, `JobID`, `Location`, `Gender`) VALUES
(1001, 'Rafat', 'Haa Meem', 25, 80000, '2022-06-15', 3005, 'Uttara', 'Male'),
(1002, 'Arnob', 'Dey', 25, 50000, '2023-03-20', 3001, 'Bailey Road', 'Male'),
(1003, 'Omar', 'Faruk', 25, 45500, '2023-09-26', 3001, 'Bashundhara', 'Male'),
(1004, 'Mahmudul', 'Hasan', 26, 40000, '2020-04-06', 3007, 'Bailey Road', 'Male'),
(1005, 'Sunjaree', 'Zulfiker', 25, 60000, '2024-02-01', 3005, 'Bailey Road', 'Male'),
(1006, 'Alamgir ', 'Sharkar', 52, 3000000, '2018-06-01', 3003, 'Baridhara', 'Male'),
(1007, 'Imon', 'Sharkar', 26, 1000000, '2018-06-01', 3003, 'Baridhara', 'Female'),
(1008, 'Faiza', 'Ahamed', 42, 45000, '2016-07-23', 3006, 'Mirpur', 'Female'),
(1009, 'Rohini', 'Roy', 42, 38000, '2017-07-25', 3006, 'Bashundhara', 'Female'),
(1010, 'Susanta', 'pal', 38, 55500, '2019-09-13', 3007, 'Motijheel', 'Male'),
(1011, 'Rashed', 'Rifat', 38, 52500, '2019-09-13', 3007, 'Motijheel', 'Male'),
(1012, 'Rehana', 'Rimi', 28, 40500, '2017-04-05', 3007, 'Uttara', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(5) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `SupplierID` int(10) DEFAULT NULL,
  `CategoryID` int(10) DEFAULT NULL,
  `Unit` int(100) DEFAULT NULL,
  `Price` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `SupplierID`, `CategoryID`, `Unit`, `Price`) VALUES
(1, 'Rice', 1, 2, 500, 80),
(2, 'Apple', 3, 1, 100, 65),
(3, 'Carrot', 1, 3, 1000, 35),
(4, 'Potato', 5, 2, 200, 12),
(5, 'Onion', 4, 3, 500, 70),
(6, 'Sugar', 2, 3, 200, 150),
(7, 'Chicken', 3, 2, 150, 350),
(8, 'Tomatoes', 2, 1, 700, 60);

-- --------------------------------------------------------

--
-- Table structure for table `repair_service`
--

CREATE TABLE `repair_service` (
  `Service_ID` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Serv_name` varchar(255) DEFAULT NULL,
  `Serv_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `repair_service`
--

INSERT INTO `repair_service` (`Service_ID`, `Description`, `Duration`, `Serv_name`, `Serv_price`) VALUES
(1, 'Basic oil change and filter replacement', 30, 'Oil Change', 49.99),
(2, 'Brake pad replacement and inspection', 60, 'Brake Service', 150.00),
(3, 'Tire rotation and alignment', 45, 'Tire Service', 75.50);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_ID` int(11) NOT NULL,
  `Supp_name` varchar(255) DEFAULT NULL,
  `Contact` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Supp_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `Supp_name`, `Contact`, `Location`, `Supp_email`) VALUES
(1, 'Auto Parts Inc.', '555-1001', '123 Supply Lane, Chicago', 'sales@autopartsinc.com'),
(2, 'Tire World', '555-1002', '456 Tire Rd, Detroit', 'info@tireworld.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `regidate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `regidate`) VALUES
(38, 'Mash', '123', '2025-03-14 00:08:51'),
(39, 'Huhh', '153', '2025-03-14 00:08:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `VIN` (`VIN`),
  ADD KEY `Service_ID` (`Service_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`VIN`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`),
  ADD KEY `Appointment_ID` (`Appointment_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderdetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`Part_ID`),
  ADD KEY `Supplier_ID` (`Supplier_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Appointment_ID` (`Appointment_ID`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`PersonID`),
  ADD KEY `JobID` (`JobID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `repair_service`
--
ALTER TABLE `repair_service`
  ADD PRIMARY KEY (`Service_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3008;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderdetailID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10315;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `PersonID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`VIN`) REFERENCES `car` (`VIN`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`Service_ID`) REFERENCES `repair_service` (`Service_ID`),
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_ibfk_1` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`);

--
-- Constraints for table `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_ibfk_1` FOREIGN KEY (`JobID`) REFERENCES `jobs` (`JobID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
