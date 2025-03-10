<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session (for user authentication later)
session_start();

// Include database connection (ensure db.php is configured correctly)
include 'db.php';

// Check if user is logged in (placeholder logic)
$loggedIn = isset($_SESSION['user_id']);
$userName = $loggedIn ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickFix - Vehicle Repair</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to QuickFix</h1>

    <?php if ($loggedIn): ?>
        <p>Welcome, <?php echo htmlspecialchars($userName); ?>! <a href="logout.php">Logout</a></p>
    <?php else: ?>
        <p>Please <a href="login.html">login</a> or <a href="users/register.html">register</a>.</p>
    <?php endif; ?>

    <nav>
        <a href="users/register.html">Register</a> |
        <a href="login.html">Login</a> |
        <a href="submit_repair.html">Submit Repair Request</a> |
        <a href="display.php">View Repairs</a>
        <?php if ($loggedIn): ?>
            | <a href="admin.php">Admin Panel</a>
        <?php endif; ?>
    </nav>

    <?php
    // Example dynamic content (e.g., display a welcome message or repair count)
    echo "<p>PHP is working!</p>";

    // Optional: Query the database for a repair count (uncomment to test)
    /*
    $result = $conn->query("SELECT COUNT(*) as total FROM Repairs");
    if ($result) {
        $row = $result->fetch_assoc();
        echo "<p>Total repair requests: " . htmlspecialchars($row['total']) . "</p>";
    } else {
        echo "<p>Error querying database: " . $conn->error . "</p>";
    }
    */

    $conn->close();
    ?>

</body>
</html>