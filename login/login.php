<?php
include 'db.php'; // Links to an external file (db.php) with database connection details


?>

<!DOCTYPE html> 
<html> 
<head> 
    <title>Login</title> <!-- Sets page title to "Login" -->
</head>
<body> <!-- Visible content section 
    <form method="POST" action=""> <!-- Form submits data to same page via POST -->
        <label>Username:</label> <!-- Label for username field -->
        <input type="text" name="username" value="User" required><br> <!-- Text input pre-filled with "User", required -->
        <label>Password:</label> <!-- Label for password field -->
        <input type="text" name="password" required><br> <!-- Text input for password, required -->
        <input type="submit" value="Login"> <!-- Submit button labeled "Login" -->
    </form>
</body>
</html>