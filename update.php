<?php
include 'functions.php';

// MySQLi connection (assuming it's similar to your other files)
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "test";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if (!$conn) {
        throw new mysqli_sql_exception("Connection failed: " . mysqli_connect_error());
    }
} catch (mysqli_sql_exception $e) {
    exit("Fix ur functions code lil bro u are not that good: " . $e->getMessage());
}

$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        
        // Update the record using MySQLi prepared statement
        $stmt = mysqli_prepare($conn, "UPDATE contacts SET id = ?, name = ?, email = ?, phone = ?, title = ?, created = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "issssss", $id, $name, $email, $phone, $title, $created, $_GET['id']);
        if (mysqli_stmt_execute($stmt)) {
            $msg = 'Updated Successfully!';
            header('Location: contacts.php');
        } else {
            $msg = 'Error updating contact: ' . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    }
    
    // Get the contact from the contacts table
    $stmt = mysqli_prepare($conn, "SELECT * FROM contacts WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $contact = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read', 'QuickFix')?>

<div class="content update">
    <h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="1" value="<?=$contact['id']?>" id="id">
        <input type="text" name="name" placeholder="John Doe" value="<?=$contact['name']?>" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" placeholder="johndoe@example.com" value="<?=$contact['email']?>" id="email">
        <input type="text" name="phone" placeholder="2025550143" value="<?=$contact['phone']?>" id="phone">
        <label for="title">Title</label>
        <label for="created">Created</label>
        <input type="text" name="title" placeholder="Employee" value="<?=$contact['title']?>" id="title">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($contact['created']))?>" id="created">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>