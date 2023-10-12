<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    $id = 0;
    $id= $id++;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama_role']) ? $_POST['nama_role'] : '';


    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO role VALUES (?, ?)');
    $stmt->execute([$id, $nama]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Vendor</h2>
    <form action="Create_role.php" method="post">
        <label for="nama_role">Nama Role</label>
        <input type="text" name="nama_role" id="nama_role">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>