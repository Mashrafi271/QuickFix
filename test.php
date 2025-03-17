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


*/
?>