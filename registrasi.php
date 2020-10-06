<?php 
require 'funtions.php';
if (isset($_POST["register"])){

	if(registrasi ($_POST)>0){
		echo " beerhasil";
	}else{

		echo mysqli_error($conn);
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title> Halaman Registrasi </title>
</head>
<body>

<h1> Halamana registrasi </h1>

<form action="" method="post">
	

<ul>
	<li>
		<label for="username"> username </label>
		<input type="text" name="username" id="username">
	</li>

	<li>
		<label for="password"> password </label>
		<input type="password" name="password" id="password">
	</li>
	<li>
		<label for="password2"> konfirmasi passworrd </label>
		<input type="password" name="password2" id="password2">
	</li>
	
<li>
	<button type="submit" name="register"> Registrasi</button>
</li>

</ul>




</form>

</body>
</html>