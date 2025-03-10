<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickfix";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables (run this once)
$sql = "CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('customer', 'admin') DEFAULT 'customer'
)";

if ($conn->query($sql) === TRUE) {
    echo "Users table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE Repairs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    vehicle_type VARCHAR(50),
    issue TEXT,
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    date DATETIME,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Repairs table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>