
<?php 

require'funtions.php';

if(isset($_POST["submit"])){
if(tambahdata($_POST)>0){

	echo "data berhasil di tambahkan";
}
else{

	echo "gagal";
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data mahasiswa </title>
</head>
<body>
	<h1> TAMBAHH DATA MAHASISWA</h1>

	<form action="" method="post" enctype="multipart/form-data">
		
<ul>
		<li> 
		<label for="nrp">NRP </label>
		<input type="text" name="nrp" id="nrp"></li>

		<li> 
		<label for="nama">nama </label>
		<input type="text" name="nama" id="nama"></li>

		<li> 
		<label for="email">email </label>
		<input type="text" name="email" id="email"></li>
		<li> 
		<label for="jurusan">jurusan </label>
		<input type="text" name="jurusan" id="jurusan"></li>
		<li> 
		<label for="gambar">gambar </label>
		<input type="file" name="gambar" id="gambar"></li>

		<label for="filename">filename </label>
		<input type="file" name="filename" id="filename"></li>
		

<button type="submit" name="submit" >TAMBAH DATA</button>

</ul>

	</form>

</body>
</html>