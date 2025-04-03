<?php
include("functions.php");

// Start session
session_start();

// Database connection (assumed in functions.php or a separate db.php)
include 'db.php'; // Ensure this file has your database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    // Verify user
    if ($user) {
        $_SESSION['user'] = $username; // Store username in session
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<?=template_header('QuickFix', 'Home')?>

<div class="content">
    <h2>Home</h2>
    <p>Welcome to the home page!</p>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" value="User" required style="display: block; margin-bottom: 10px;"><br>
        <label>Password:</label>
        <input type="text" name="password" required style="display: block;"><br>
        <input type="submit" value="Login">
    </form>
</div>

<?=template_footer()?>