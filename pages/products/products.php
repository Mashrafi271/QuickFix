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
    
</head>
<body>

    <h1>Our Products</h1>

    <div class="product-container">
        <?php
        // 4. Check if there are any products returned
        if ($result && mysqli_num_rows($result) > 0) {
            // 5. Loop through the results and display each product
            while ($product = mysqli_fetch_assoc($result)) {
                ?>
                <div class="product-card">
                    <img src="/path/to/your/images/<?php echo htmlspecialchars($product['productimg']); ?>" alt="<?php echo htmlspecialchars($product['productname']); ?>">
                    <h2><?php echo htmlspecialchars($product['productname']); ?></h2>
                    <p><?php echo htmlspecialchars($product['productdesc']); ?></p>
                    <p><strong>Price: $<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></strong></p>
                    </div>
                <?php
            }
        } else {
            // If no products are found
            echo "<p>No products found.</p>";
        }

        // Free the result set (good practice)
        if ($result) {
            mysqli_free_result($result);
        }

        // Close the database connection (often done at the end of script or in db.php)
        // mysqli_close($conn);
        ?>
    </div>

</body>
</html>