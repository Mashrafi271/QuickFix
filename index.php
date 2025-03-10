<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session (for user authentication later)
session_start();

// Include database connection (ensure db.php is configured correctly)
//include 'db.php';

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
    
    <?php endif; ?>

    <nav>
        <a href="users/register.html">Register</a> |
        <a href="login.html">Login</a> |
        <a href="submit_repair.html">Submit Repair Request</a> |
        <a href="display.php">View Repairs</a>
        
    </nav>

    <p>QuickFix is your one-stop solution for all vehicle repair needs. Our team of experienced mechanics are here to help you get back on the road in no time!</p>

</body>
</html>