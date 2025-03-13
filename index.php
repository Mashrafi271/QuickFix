<?php
/*
    to generate some boilerplate html code, type ! and press tab
    to generate a php block, type php and press tab

    variable names start with a $ sign
*/

//include any files that this file will work with at the top here, in this php block:
include("db.php");
echo "testttttt<br>";

//your sql queries go here, between include db and close conn
$sql = "INSERT INTO users (user, password)
        VALUES ('Mash', '123')"; //query enclosed in double quotes and statement concluded with a semicolon, then wrapped with mysqli_query function

try {
    mysqli_query($conn, $sql); //intelephense extension might give an error cause we r including this from another file. u can ignore this or turn off intelephense
    echo "user is now registered<br>";
} catch (mysqli_sql_exception) {
    echo "could not register user<br>"; //NOTE: THIS WILL ALWAYS TRIGGER UNLESS YOU CHANGE THE VAK=LUES AND LET THE SERVER ADD A NEW ROW TO YOUR USERS TABLE, DONT BOTHER TRYING TO DEBUG THIS FOR HALF AN HOUR RAHHHHHH
}

//query two:
$sql = "INSERT INTO users (user, password)
VALUES ('Huhh', '153')"; //query enclosed in double quotes and statement concluded with a semicolon, then wrapped with mysqli_query function

try {
    mysqli_query($conn, $sql); //intelephense extension might give an error cause we r including this from another file. u can ignore this or turn off intelephense
    echo "user is now registered<br>";
} catch (mysqli_sql_exception) {
    echo "could not register user<br>";
}

mysqli_close($conn); //intelephense extension might give an error cause we r including this from another file. u can ignore this or turn off intelephense

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="http://localhost/QUICKFIX/test.php">
        <button>Testing site</button>
    </a>

    <a href="http://localhost/QUICKFIX/testlogin.php">
        <button>Login</button>
    </a>

    <a href="http://localhost/QUICKFIX/orderservice.php">
        <button>Orders</button>
    </a>

    <a href="http://localhost/QUICKFIX/db.php">
        <button>Test DB</button>
    </a>
    <br> <!-- creates a new line after the series of test buttons -->


</body>

</html>