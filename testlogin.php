<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="testlogin.php" method="post"> <!-- wraps all your labels and inputs (parts of a user input form) with a 'larger' tag that can be individually manipulated for styling purposes
                                                    'action' determines where the variales inside your form will be sent for processing. here, you are sending them to the 'host' file itself.
                                                    'method' determines one of two means of receiving and transferring data for user input (namely 'get' and 'post') -->
        <label for="username">Username<input type="text" id="username" name="username"><br></label>
        <!-- type determines plain text to be expected as input when set as 'text'
        name associates the variable name through which that input value will be sent to the backend (php here) for processing 
        input is a self closing tag so no need for '</input>' this also means you enter all your input code inside the tag itself
        when you wrap your input tag with label, when the user clicks on the label on the website it automatically focuses your input field, otherwise the user must press on the input field itself to focus on it -->
        <label for="password">Password <input type="password" id="password" name="password"><br></label>
        <input type="submit" value="Login"> <!-- Added submit button, without this echo get will not work -->
        <!-- the input will be hidden here-->
    </form>
</body>

</html>

<?php
/* $$_POST, $_POST = special variables used to collect data from an HTML form
 data is sent to the file in the action attribute of <form>
 <form action="some_file.php" method="get">

 $$_POST = Data is appended to the url
 NOT SECURE, shows the values submitted in the url
 char limit
 Bookmark is possible w/ values
 GET requests can be cached
 Better for a search page

 $_POST = Data is packaged inside the body of the HTTP request
 MORE SECURE, doesnt open your pants and show everything in the url
 No data limit
 Cannot bookmark
 POST requests are not cached
 Better for submitting credentials
*/
// Check if the form was submitted with username and password
    echo $_POST["username"] . "<br>"; //str concat in php is done with a dot
    echo $_POST["password"] . "<br>";
    echo"<br>hmmm";
?>