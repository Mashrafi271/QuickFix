<?php
// 1. Include the database connection
// This goes up two directories from pages/products/ to the root, then finds db.php
include('../../db.php');

// Check if the connection is successful (optional but recommended)
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// 2. Write the SQL query to select products
$sql = "SELECT * FROM products";

// 3. Execute the query
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <link rel="stylesheet" href="styles_products.css">    
</head>
<body>

    <h1>Our Products</h1>

    <div class="product-container">
    
    </div>

</body>
</html>