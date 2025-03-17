<?php
//anything related to connecting to database will happen here

//declare some variables to initiate things:
$db_server = "localhost"; //holds the name of the server
$db_user = "root";
$db_pass = "";
$db_name = "test"; //name of the database, confirm that its the same as the db you will be using
//$conn = ""; //connection variable, holds connection status I think


//we dont want user to see any ugly error messages upon failure to connect to db for example in this case, so we encase the following code in a try catch block:
try{
    //to establish a connection to the databse, set value of connection variable as such:
    $conn = mysqli_connect( //mysqli_connect() returns 1 or 0
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );
//add all the variables you initialized above, as parameters for the connection function
//if u establish a successful conneciton, this $conn variable represents an object
} catch(mysqli_sql_exception){
    echo "Fix ur db.php code lil bro u are not that good<br>";
}

/*
if ($conn) {
    echo "Bluetooth device connected successfully<br>";
} user doesnt really need to know if db has connected, we are not keeping this for now for testing purposes. showing only error message wil suffice ofc in shaa Allah
*/

//mysqli_close($conn); /do not close this here, sql queries in other files wont work

//this php file is now complete
?>