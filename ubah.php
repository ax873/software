
<?php 

require'funtions.php';

$id=$_GET["id"];
$mhs=query("SELECT * FROM mahasiswa WHERE id= $id")[0];




if(isset($_POST["submit"])){
if(ubahuy($_POST)>0){

	echo "data berhasil di ubah ";
}
else{

	echo "gagal";
	echo mysqli_error($conn);
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ubah data mahasiswa </title>
</head>
<body>
	<h1> ubah DATA MAHASISWA</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="gambarLama" value="<?= $mhs['gaambar'] ?>">

		<input type="hidden" name="id" id="id" value="<?= $mhs["id"] ?>">
		
<ul>
		<li> 
		<label for="nrp">NRP </label>
		<input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"] ?>"></li>

		<li> 
		<label for="nama">nama </label>
		<input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>"></li>

		<li> 
		<label for="email">email </label>
		<input type="text" name="email" id="email" value="<?= $mhs["email"] ?>"></li>
		<li> 
		<label for="jurusan">jurusan </label>
		<input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ?>"></li>
		<li> 
		<label for="gambar">gambar </label>
<br>
		<img src="gambar/<?= $mhs['gaambar']; ?>" width="40">
		
<br>
		<input type="file" name="gambar" id="gambar" value="<?= $mhs["gambar"] ?>"></li>
<br>

<label for="filename">file </label>
<br>
	
		<input type="text" name="filename" id="filename" value="<?= $mhs["filename"] ?>"></li>
<br>
<br>
		<input type="file" name="filename" id="filename" value="<?= $mhs["filename"] ?>"></li>
<br>





<button type="submit" name="submit" >Ubah DATA</button>

</ul>

	</form>

</body>
</html>