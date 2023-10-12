<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        //$id = isset($_POST['id_vendor']) ? $_POST['id_vendor'] : NULL;
        $nama = isset($_POST['nama_role']) ? $_POST['nama_role'] : '';
       
        // Update the record
        $stmt = $pdo->prepare('UPDATE role SET nama_role = ? WHERE id_role = ?');
        $stmt->execute([$nama, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM role WHERE id_role = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Role #<?=$contact['id_role']?></h2>
    <label for="id">ID Role</label>
    <form action="Update_role.php?id=<?=$contact['id_role']?>" method="post">
        <label for="nama">Nama</label>
        <input type="text" name="nama_role" value="<?=$contact['nama_role']?>" id="nama_role">
        
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>