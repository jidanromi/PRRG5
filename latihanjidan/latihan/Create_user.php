<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $nama_akun = isset($_POST['nama_akun']) && !empty($_POST['nama_akun']) && $_POST['nama_akun'] != '' ? $_POST['nama_akun'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama_pengguna = isset($_POST['nama_pengguna']) ? $_POST['nama_pengguna'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $tgl_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    $nohp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
    $role = isset($_POST['id_role']) ? $_POST['id_role'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO user VALUES (?, ?, ?, ?, ?,?,?,?)');
    $stmt->execute([$nama_akun, $nama_pengguna, $email, $tgl_lahir, $jenis_kelamin,$nohp,$pass,$role]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create User</h2>
    <form action="Create_user.php" method="post">
        <label for="nama_akun">Nama Akun</label>
        <label for="nama_pengguna">Nama Pengguna</label>
        <input type="text" name="nama_akun"  id="nama_akun">
        <input type="text" name="nama_pengguna" id="nama_pengguna">
<div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        <label for="jenis_kelamin">Jenis Kelamin : </label>
        <input type="radio" name="jenis_kelamin" value="Laki-Laki"> 
        <input type="radio" name="jenis_kelamin" value="Perempuan">
</div>
        <label for="no_hp">Nomor HP</label>
        <input type="text" name="no_hp" id="no_hp">

        <label for="password">Password</label>
        <input type="text" name="password" id="password">

        <div>
        <label for="role">Role</label>
        <select name="id_role" id="id_role" class="form-control" required>
            <option value="">---Pilih Vendor---</option>
            <?php
              $host = "localhost";
              $db = "quiz_003";
              $user = "root";
              $password = "";
           
              $con = mysqli_connect($host,$user,$password,$db);
           
              $vendor = mysqli_query($con,"select * from role");
               while($row = mysqli_fetch_array($vendor)){?>
            <option value="<?=$row['id_role']?>"> 
            <?=$row['nama_role']?>
            </option>
            <?php } ?>
        </select>
        </div>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>