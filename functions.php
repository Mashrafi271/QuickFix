<?php


function template_header($title, $subtitle) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>$subtitle</h1>
            <a href="home.php"><i class="fas fa-home"></i>Home</a>
            <a href="repairs.php"><i class="fas fa-car"></i>Repairs</a>
            <a href="pages\products\products.php"><i class="fas fa-box"></i>Products</a>
    		<a href="contacts.php"><i class="fas fa-address-book"></i>Contacts</a>
    	</div>
    </nav>
EOT;
}

function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>