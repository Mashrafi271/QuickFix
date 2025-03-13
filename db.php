<?php
//anything related to connecting to database will happen here

//declare some variables to initiate things:
$db_server = "localhost"; //holds the name of the server
$db_user = "root";
$db_pass = "";
$db_name = "test"; //name of the database, confirm that its the same as the db you will be using
$conn = ""; //connection variable, holds connection status I think

//to establish a connection to the databse, set value of connection variable as such:
$conn = mysqli_connect( //mysqli_connect() returns 1 or 0
    $db_server,
    $db_user,
    $db_pass,
    $db_name
);
//add all the variables you initialized above, as parameters for the connection function
//if u establish a successful conneciton, this $conn variable represents an object

if ($conn) {
    echo "Bluetooth device connected successfully<br>";
} else {
    echo "Fix ur code lil bro u are not that good<br>";
}

mysqli_close($conn);
?>