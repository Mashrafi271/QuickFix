<?php
//this is where all the learning or practice code will be saved

//diff printing methods
echo "Hello World <br>";
echo "Pineapples are not bussin lol <br>";

$huh = "apples are sweet"; //str variable
echo "But {$huh} <br>";
echo "But $huh <br>";

$varage = 23; //int variable
echo "I am $varage years old <br>";

$gpa = 2.94; //float variable
echo "My gpa is $gpa <br>";

//displaying a dollar sign with echo:
$price = 3.2;
echo "The price of an apple is \$$price <br>"; //escape character '/' needed before the $ sign\

$boolval = true; //boolean variable
$boolval2 = false;
echo "The value of the boolean variable is $boolval <br>"; //doesnt output the bool val if false. displays 1 as output if true
echo "The value of the boolean variable2 is $boolval2 <br>";

echo "test.php 1 ";

$z = 2.5 * 4;
echo "<br>$z";
?>

<?php
/*

CREATE PARENT TABLES BEFORE CHILD TABLES OTHERWISE 'FOREIGN KEY CONSTRAINT
INCORRECTLY DEFINED' ERROR ASHBE

-- Customer Table
CREATE TABLE IF NOT EXISTS Customer (
    Customer_ID INT PRIMARY KEY,
    Name VARCHAR(255),
    DOB DATE,
    Address VARCHAR(255),
    Email VARCHAR(255)
);

-- Admin Table
CREATE TABLE IF NOT EXISTS Admin (
    Admin_ID INT PRIMARY KEY,
    admin_mail VARCHAR(255),
    admin_contact VARCHAR(255),
    admin_name VARCHAR(255)
);

-- Repair Service Table
CREATE TABLE IF NOT EXISTS Repair_Service (
    Service_ID INT PRIMARY KEY,
    Description VARCHAR(255),
    Duration INT,
    Serv_name VARCHAR(255),
    Serv_price DECIMAL(10, 2)
);

-- Car Table
CREATE TABLE IF NOT EXISTS Car (
    VIN VARCHAR(17) PRIMARY KEY,
    Model VARCHAR(255),
    Make VARCHAR(255),
    Year INT,
    Customer_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);


-- Appointment Table
CREATE TABLE IF NOT EXISTS Appointment (
    Appointment_ID INT PRIMARY KEY,
    App_date DATE,
    App_time TIME,
    App_status VARCHAR(255),
    Customer_ID INT,
    VIN VARCHAR(17),
    Service_ID INT,
    Admin_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID),
    FOREIGN KEY (VIN) REFERENCES Car(VIN),
    FOREIGN KEY (Service_ID) REFERENCES Repair_Service(Service_ID),
    FOREIGN KEY (Admin_ID) REFERENCES Admin(Admin_ID)
);



-- Feedback Table
CREATE TABLE IF NOT EXISTS Feedback (
    Feedback_ID INT PRIMARY KEY,
    Rating INT,
    Comments VARCHAR(255),
    Feed_date DATE,
    Appointment_ID INT,
    Customer_ID INT,
    FOREIGN KEY (Appointment_ID) REFERENCES Appointment(Appointment_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);



-- Payment Table
CREATE TABLE IF NOT EXISTS Payment (
    Payment_ID INT PRIMARY KEY,
    Amount DECIMAL(10, 2),
    Pay_date DATE,
    Pay_status VARCHAR(255),
    Method VARCHAR(255),
    Appointment_ID INT,
    FOREIGN KEY (Appointment_ID) REFERENCES Appointment(Appointment_ID)
);

-- Supplier Table
CREATE TABLE IF NOT EXISTS Supplier (
    Supplier_ID INT PRIMARY KEY,
    Supp_name VARCHAR(255),
    Contact VARCHAR(255),
    Location VARCHAR(255),
    Supp_email VARCHAR(255)
);

-- Parts Table
CREATE TABLE Parts (
    Part_ID INT PRIMARY KEY,
    Part_name VARCHAR(255),
    Part_price DECIMAL(10, 2),
    Quantity INT,
    Type VARCHAR(255),
    Supplier_ID INT,
    FOREIGN KEY (Supplier_ID) REFERENCES Supplier(Supplier_ID)
);



-- Supplier Table
CREATE TABLE IF NOT EXISTS Supplier (
    Supplier_ID INT PRIMARY KEY,
    Supp_name VARCHAR(255),
    Contact VARCHAR(255),
    Location VARCHAR(255),
    Supp_email VARCHAR(255)
);


-- Repair Service Table
CREATE TABLE IF NOT EXISTS Repair_Service (
    Service_ID INT PRIMARY KEY,
    Description VARCHAR(255),
    Duration INT,
    Serv_name VARCHAR(255),
    Serv_price DECIMAL(10, 2)
);

-- Admin Table
CREATE TABLE IF NOT EXISTS Admin (
    Admin_ID INT PRIMARY KEY,
    admin_mail VARCHAR(255),
    admin_contact VARCHAR(255),
    admin_name VARCHAR(255)
);

-- Insert sample data into Admin
INSERT INTO Admin (Admin_ID, admin_mail, admin_contact, admin_name) VALUES
(1, 'admin1@quickfix.com', '555-0101', 'Alice Admin'),
(2, 'admin2@quickfix.com', '555-0102', 'Bob Admin');

-- Insert sample data into Repair_Service
INSERT INTO Repair_Service (Service_ID, Description, Duration, Serv_name, Serv_price) VALUES
(1, 'Basic oil change and filter replacement', 30, 'Oil Change', 49.99),
(2, 'Brake pad replacement and inspection', 60, 'Brake Service', 150.00),
(3, 'Tire rotation and alignment', 45, 'Tire Service', 75.50);

-- Insert sample data into Supplier
INSERT INTO Supplier (Supplier_ID, Supp_name, Contact, Location, Supp_email) VALUES
(1, 'Auto Parts Inc.', '555-1001', '123 Supply Lane, Chicago', 'sales@autopartsinc.com'),
(2, 'Tire World', '555-1002', '456 Tire Rd, Detroit', 'info@tireworld.com');

-- Insert sample data into Car
INSERT INTO Car (VIN, Model, Make, Year, Customer_ID) VALUES
('1HGCM82633A123456', 'Civic', 'Honda', 2003, 1),
('2HGFG12839H123457', 'Accord', 'Honda', 2015, 2),
('1G1BL52P2TR123458', 'Malibu', 'Chevrolet', 2006, 3);

-- Insert sample data into Appointment
INSERT INTO Appointment (Appointment_ID, App_date, App_time, App_status, Customer_ID, VIN, Service_ID, Admin_ID) VALUES
(1, '2025-03-18', '10:00:00', 'Scheduled', 1, '1HGCM82633A123456', 1, 1),
(2, '2025-03-19', '14:30:00', 'Completed', 2, '2HGFG12839H123457', 2, 2),
(3, '2025-03-20', '09:15:00', 'Pending', 3, '1G1BL52P2TR123458', 3, 1);

-- Insert sample data into Feedback
INSERT INTO Feedback (Feedback_ID, Rating, Comments, Feed_date, Appointment_ID, Customer_ID) VALUES
(1, 4, 'Great service, quick turnaround!', '2025-03-19', 2, 2),
(2, 5, 'Excellent work, highly recommend!', '2025-03-20', 1, 1);

-- Insert sample data into Payment
INSERT INTO Payment (Payment_ID, Amount, Pay_date, Pay_status, Method, Appointment_ID) VALUES
(1, 49.99, '2025-03-19', 'Paid', 'Credit Card', 1),
(2, 150.00, '2025-03-20', 'Paid', 'Cash', 2);

-- Insert sample data into Parts
INSERT INTO Parts (Part_ID, Part_name, Part_price, Quantity, Type, Supplier_ID) VALUES
(1, 'Oil Filter', 12.50, 50, 'Filter', 1),
(2, 'Brake Pad Set', 80.00, 30, 'Brake', 1),
(3, 'Tire', 60.00, 20, 'Tire', 2);
*/
?>