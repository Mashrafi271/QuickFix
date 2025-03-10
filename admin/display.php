<?php
include 'db.php';
$result = $conn->query("SELECT * FROM Repairs");
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . " - Vehicle: " . $row['vehicle_type'] . " - Issue: " . $row['issue'] . "<br>";
}
$conn->close();
?>