<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        //$id = isset($_POST['id_vendor']) ? $_POST['id_vendor'] : NULL;
        $nama = isset($_POST['nama_pengguna']) ? $_POST['nama_pengguna'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $tgl_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
        $nomorhp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $role = isset($_POST['id_role']) ? $_POST['id_role'] : '';
        
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE user SET nama_pengguna = ?, email = ?,  tanggal_lahir= ?, jenis_kelamin = ?,no_hp= ?, password= ?,id_role=? WHERE nama_akun = ?');
        $stmt->execute([$nama, $email, $tgl_lahir, $jenis_kelamin,$nomorhp,$password,$role, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM user WHERE nama_akun = ?');
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
	<h2>Update User #<?=$contact['nama_akun']?></h2>
    <label for="id">Nama Akun</label>
    <form action="Update_user.php?id=<?=$contact['nama_akun']?>" method="post">
    
        <label for="nama_pengguna">Nama Pengguna</label>
        <
        <input type="text" name="nama_pengguna" value="<?=$contact['nama_pengguna']?>" id="nama_pengguna">
<div>
        <label for="email">Email</label>
        <input type="text" name="email"  value="<?=$contact['email']?>" id="email">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        <label for="jenis_kelamin">Jenis Kelamin : </label>
        <input type="radio" name="jenis_kelamin" value="Laki-Laki"> 
        <input type="radio" name="jenis_kelamin" value="Perempuan">
</div>
        <label for="no_hp">Nomor HP</label>
        <input type="text" name="no_hp"  value="<?=$contact['no_hp']?>" id="no_hp">

        <label for="password">Password</label>
        <input type="text" name="password"  value="<?=$contact['password']?>" id="password">

        <div>
        <label for="role">Role</label>
        <input type="text" name="id_role"  value="<?=$contact['id_role']?>" id="password">
       
        </div>
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>