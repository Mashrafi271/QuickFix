<?php
// Include the database connection
include('db.php');

// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = mysqli_query($mysql, $sql);

// Check if the query was successful
if (!$result) {
    die("Error fetching products: " . mysqli_error($mysql));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - QuickFix</title>
    <style>
        /* Basic CSS for the grid layout */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        nav {
            background-color: #333;
            padding: 10px;
            margin-bottom: 20px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .product-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .product-card h3 {
            margin: 0;
            color: #333;
        }
        .product-card p {
            color: #666;
            margin: 10px 0;
        }
        .product-card .price {
            font-size: 1.2em;
            color: #2ecc71;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <a href="index.php">Home</a>
        <a href="orders.php">Orders</a>
        <a href="products.php">Products</a>
        <a href="contacts.php">Contacts</a>
    </nav>

    <h1>Our Products</h1>

    <!-- Product grid -->
    <div class="product-grid">
        <?php
        // Check if there are any products
        if (mysqli_num_rows($result) > 0) {
            // Loop through each product and display it in a card
            while ($product = mysqli_fetch_assoc($result)) {
                echo '<div class="product-card">';
                echo '<h3>' . htmlspecialchars($product['ProductName']) . '</h3>';
                echo '<p>Category ID: ' . htmlspecialchars($product['CategoryID']) . '</p>';
                echo '<p class="price">$' . number_format($product['Price'], 2) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No products found.</p>';
        }
        ?>
    </div>

    <?php
    // Close the database connection
    mysqli_close($mysql);
    ?>
</body>
</html>