<?php
    //when you create a form, make sure to put your html block before your php code
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label>Username<input type="text" name="username"><br></label>
    <!-- type determines plain text to be expected as input when set as 'text'
        name associates the variable name through which that input value will be sent to the backend (php here) for processing 
        input is a self closing tag so no need for '</input>' this also means you enter all your input code inside the tag itself
        when you wrap your input tag with label, when the user clicks on the label on the website it automatically focuses your input field, otherwise the user must press on the input field itself to focus on it -->  
    <label>Password <input type="password" name="password"><br></label>
    <!-- the input will be hidden here -->
</body>
</html>

<?php

?>