<?php
include("functions.php");
include("login\login.php");
?>

<?=template_header('QuickFix', 'Home')?>

<div class="content">
    <h2>Home</h2>
    <p>Welcome to the home page!</p>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" value="User" required style="display: block; margin-bottom: 10px;"><br>
        <label>Password:</label>
        <input type="text" name="password" required style="display: block;"><br>
        <input type="submit" value="Login">
    </form>
</div>

<?=template_footer()?>