<?php

include("../../functions.php");
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

// Check if the query execution was successful
if (!$result) {
    die("SQL Query Failed: " . mysqli_error($conn));
} else {
    //echo"sucessfully connected smh";
}
?>

<?=template_header('QuickFix', '')?>

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
        <?php
        // 4. Check if there are any products returned
        if (mysqli_num_rows($result) > 0) {
            // 5. Loop through the results and display each product card
            while ($product = mysqli_fetch_assoc($result)) {
        ?>
                <div class="product-card">

                    <!--products: -->

                    <img src="<?php echo htmlspecialchars($product['product_img']); ?>" alt="A simple image">
                    <h2><?php echo htmlspecialchars($product['ProductName']); ?></h2> <!-- the parameter has to be the actual attribute name within the db -->


                </div>
        <?php
            } // End while loop
        } else {
            // If no products are found
            echo "<p>No products found.</p>";
        }

        // Free the result set (good practice)
        mysqli_free_result($result);

        // Close the database connection (optional, PHP often handles this)
        // mysqli_close($conn);
        ?>
    </div>

</body>

</html>