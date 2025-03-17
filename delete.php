<?php
include 'functions.php';

// MySQLi connection
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
if (isset($_GET['id'])) {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM contacts WHERE id = ?');
    mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $contact = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = mysqli_prepare($conn, 'DELETE FROM contacts WHERE id = ?');
            mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
            if (mysqli_stmt_execute($stmt)) {
                $msg = 'You have deleted the contact! Redirecting in <span id="countdown">2</span> seconds...';
            } else {
                $msg = 'Error deleting contact: ' . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            header('Location: contacts.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete', 'QuickFix')?>

<div class="content delete">
    <h2>Delete Contact #<?=$contact['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php if (strpos($msg, 'You have deleted') === 0): ?>
    <script>
        let timeLeft = 2;
        const countdownElement = document.getElementById('countdown');
        const countdown = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(countdown);
                window.location.href = 'contacts.php'; // Redirect after 4 seconds
            }
        }, 1000); // Update every 1 second
    </script>
    <?php endif; ?>
    <?php else: ?>
    <p>Are you sure you want to delete contact #<?=$contact['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$contact['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>