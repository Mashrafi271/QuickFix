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
    echo "Connection failed: " . $e->getMessage();
    exit;
}

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 1000;

$new_id = isset($_GET['new_id']) ? (int)$_GET['new_id'] : null;
$updated_id = isset($_GET['updated_id']) ? (int)$_GET['updated_id'] : null;
$scroll_id = $new_id ?: $updated_id; // Use new_id if set, otherwise updated_id

$offset = ($page - 1) * $records_per_page;

$stmt = mysqli_prepare($conn, 'SELECT * FROM contacts ORDER BY id LIMIT ?, ?');
mysqli_stmt_bind_param($stmt, "ii", $offset, $records_per_page);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);

$total_records = $conn->query("SELECT COUNT(*) FROM contacts")->fetch_column();
$total_pages = ceil($total_records / $records_per_page);
$num_contacts = $total_records;
?>

<?=template_header('QuickFix', 'Contacts')?>

<div class="content read">
    <h2>Connect with our Moderators!</h2>
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
            <tr id="contact-<?=$contact['id']?>">
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
        <a href="contacts.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page * $records_per_page < $num_contacts): ?>
        <a href="contacts.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>

<?php if ($scroll_id): ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const targetContact = document.getElementById('contact-<?=$scroll_id?>');
        if (targetContact) {
            targetContact.scrollIntoView({ behavior: 'smooth', block: 'center' });
            targetContact.style.backgroundColor = '#e0ffe0'; // Highlight
            setTimeout(() => {
                targetContact.style.backgroundColor = ''; // Remove highlight after 2 seconds
            }, 2000);
        }
    });
</script>
<?php endif; ?>

<?=template_footer()?>