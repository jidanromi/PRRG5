<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM user WHERE nama_akun= ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM user WHERE nama_akun = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the user!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: Read_user.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete User #<?=$contact['nama_akun']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$contact['nama_akun']?>?</p>
    <div class="yesno">
        <a href="Delete_user.php?id=<?=$contact['nama_akun']?>&confirm=yes">Yes</a>
        <a href="Delete_user.php?id=<?=$contact['nama_akun']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>`