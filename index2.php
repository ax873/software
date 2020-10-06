<?php 
$conn=mysqli_connect("localhost","root","","phpdasar");


$result=mysqli_query($conn, "SELECT * FROM mahasiswa");
// if(!$result){
// 	echo mysqli_error($conn);
// }

// while ( $mhs=mysqli_fetch_assoc($result)
// ) 

// {
// var_dump($mhs["nama"]);
// }




 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Selamat datang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 class="uwu">DAFTAR MAHASISWA</h1>
<p class="uwu" id="mantab">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<table border="1" cellpadding="10" cellspacing="0">
	
<tr>
	
	<th>NOMOR URUT</th>
	<th> aksi </th>
	<th>Gambar</th>
	<th>nama</th>
	<th>email</th>
	<th>jurusan</th>
</tr>
<?php $i=1; ?>

<?php while ($row =mysqli_fetch_assoc($result)): ?>
<tr>
	
	<th> <?= $i ?> </th>
	<th> 
<a href="">ubah</a>
<a href="">hapus</a>
	</th>

<th> <img src="gambar/<?= $row["gaambar"] ?>.png" width="50"></th>

<td><?= $row["nama"]; ?></th>
<th> <?= $row["email"]; ?></th>
<th><?= $row["jurusan"] ?></th>

</tr>
<?php $i++ ?>
<?php endwhile; ?>


</table>

</body>
</html>