<?php
if($_POST['kirim']){
	$admin = 'marufmaftuchin959@gmail.com'; //ganti email dg email admin (email penerima pesan)
	
	$nama	= htmlentities($_POST['nama']);
	$email	= htmlentities($_POST['email']);
	$judul	= htmlentities($_POST['judul']);
	$pesan	= htmlentities($_POST['pesan']);
	
	$pengirim	= 'Dari: '.$nama.' <'.$email.'>';
	
	if(mail($admin, $judul, $pesan, $pengirim)){
		echo 'SUCCESS: Pesan anda berhasil di kirim. <a href="index.php">Kembali</a>';
	}else{
		echo 'ERROR: Pesan anda gagal di kirim silahkan coba lagi. <a href="index.php">Kembali</a>';
	}
}else{
	header("Location: index.php");
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Contact Form Email</title>
</head>
<body>
 
	<h1>Contact Form Email</h1>
	<p>Demo ini dibuat dan di upload oleh <a href="http://tutorialweb.net/" target="_blank">tutorialweb.net</a></p>
	
	<form action="kirim.php" method="post">
		<p><input type="text" name="nama" placeholder="Nama anda" size="30" required /></p>
		<p><input type="email" name="email" placeholder="Email valid" size="30" required /></p>
		<p><input type="text" name="judul" placeholder="Subjek pesan email" size="50" required /></p>
		<p><textarea name="pesan" placeholder="Pesan anda" rows="7" cols="50" required></textarea>
		<p><input type="submit" name="kirim" value="Kirim Pesan" /> <input type="reset" value="Hapus Text" /></p>
	</form>
	
</body>
</html>