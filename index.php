<?php 

// session_start();

// if( !isset($_SESSION['login'])){
// 	header( "Location: login.php" );
// 	exit;
// }


require 'funtions.php';
$mahasiswa =query("SELECT * FROM mahasiswa ORDER BY id DESC ");

if(isset($_POST["cari"])){

	$mahasiswa =cari($_POST["keyword"]);
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Selamat datang</title>



	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<a href="tambah.php">tambbah mahasiswa</a>
	<h1 class="uwu">DAFTAR MAHASISWA</h1>
<p class="uwu" id="mantab">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



	<form action="" method="post">
		
<input type="text" name="keyword" size="30" autofocus placeholder="CARI" autocomplete="off">
<button type="submit" name="cari">cari</button>

	</form>
<br>
<table border="1" cellpadding="10" cellspacing="0">
	
<tr>
	
	<th>NOMOR URUT</th>
	<th> aksi </th>
	<th>Gambar</th>
	<th>nama</th>
	<th>email</th>
	<th>jurusan</th>
	<th>File</th>
</tr>
<?php $i=1; ?>

<?php foreach ($mahasiswa as $row) : ?>
<tr>
	
	<th> <?= $i ?> </th>
	<th> 
<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin');">hapus</a>
<a href="ubah.php?id=<?= $row["id"] ?>">ubah</a>
	</th>

<th> <img src="gambar/<?= $row["gaambar"] ?>" width="50"></th>

<td><?= $row["nama"]; ?></th>
<th> <?= $row["email"]; ?></th>
<th><?= $row["jurusan"] ?></th>

<th> <a href="download.php?file=<?php echo $row['filename'] ?>">Download</a><br></th>
</tr>
<?php $i++ ?>
<?php endforeach; ?>


</table>

</body>
</html>