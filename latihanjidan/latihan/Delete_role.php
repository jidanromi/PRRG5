<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM role WHERE id_role = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM role WHERE id_role = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the Role!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: Read_role.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Contact #<?=$contact['id_role']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete Role #<?=$contact['id_role']?>?</p>
    <div class="yesno">
        <a href="Delete_role.php?id=<?=$contact['id_role']?>&confirm=yes">Yes</a>
        <a href="Delete_role.php?id=<?=$contact['id_role']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>`