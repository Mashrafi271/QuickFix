<?php
include("functions.php"); // Assuming this contains template_header() and template_footer()
include("db.php"); // Assuming this is for DB-related functions (optional, can remove if empty)

// Connect to MySQL database
$db_server = "localhost"; 
$db_user = "root";
$db_pass = "";
$db_name = "test"; 

try {
    $conn = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit; // Stop execution if connection fails
}

// Get the page via GET request (URL param: page), if none exists default to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 1000;

// Prepare the SQL statement to get records from the contacts table with pagination
$stmt = $conn->prepare('SELECT * FROM contacts ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch all records as an associative array
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate total pages (optional, for pagination links)
$total_records = $conn->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
$total_pages = ceil($total_records / $records_per_page);

// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $conn->query('SELECT COUNT(*) FROM contacts')->fetchColumn();


// Home Page template below.
?>

<?=template_header('QuickFix', 'Contacts')?>

<div class="content read">
	<h2>Read Contacts</h2>
	<a href="create.php" class="create-contact">Create Contact</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Title</td>
                <td>Created</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['name']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['phone']?></td>
                <td><?=$contact['title']?></td>
                <td><?=$contact['created']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>


<?=template_footer()?>