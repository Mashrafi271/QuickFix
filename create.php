<?php
include("functions.php");

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
    echo "Fix ur functions code lil bro u are not that good: " . $e->getMessage() . "<br>";
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $created = $_POST['created'];

    // Use $conn with MySQLi prepared statement
    $stmt = mysqli_prepare($conn, "INSERT INTO contacts (name, email, phone, title, created) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $title, $created);
    // Execute and set $msg based on success or failure
    if (mysqli_stmt_execute($stmt)) {
        $msg = "Contact created successfully! Redirecting in <span id=\"countdown\">2</span> seconds...";
        // Remove the immediate header redirect; JavaScript will handle it
    } else {
        $msg = "Error creating contact: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
}
?>

<?= template_header('Create Contact', 'QuickFix') ?>

<div class="content update">
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id" readonly>
        <input type="text" name="name" placeholder="22 savage" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" placeholder="kittysaurus@example.com" id="email">
        <input type="text" name="phone" placeholder="2025550143" id="phone">
        <label for="title">Title</label>
        <label for="created">Created</label>
        <input type="text" name="title" placeholder="Employee" id="title">
        <input type="datetime-local" name="created" value="<?= date('Y-m-d\TH:i') ?>" id="created">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <label><?php echo $msg; ?></label>
    <?php if (strpos($msg, 'Contact created successfully') === 0): ?>
    <script>
        let timeLeft = 2;
        const countdownElement = document.getElementById('countdown');
        const countdown = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(countdown);
                window.location.href = 'contacts.php'; // Redirect after 2 seconds
            }
        }, 1000); // Update every 1 second
    </script>
    <?php endif; ?>
    <?php endif; ?>
</div>

<?= template_footer() ?>