<?php 


$conn=mysqli_connect("localhost","root","","phpdasar");

function query($query){
global $conn;
$result =mysqli_query($conn,$query);

$rows=[];
while ($row =mysqli_fetch_assoc($result)) {
	$rows[]=$row;

	# code...
}

return $rows;





}

function tambahdata($data){
global $conn;
$nrp=htmlspecialchars($data["nrp"]);
$nama=htmlspecialchars($data["nama"]);
$email=htmlspecialchars($data["email"]);
$jurusan=htmlspecialchars($data["jurusan"]);

$gambar=upload();
if (!$gambar){
	return false;
}

$insert="insert into mahasiswa values
('','$nama','$nrp','$email','$jurusan','$gambar')
";
mysqli_query($conn,$insert);

return mysqli_affected_rows($conn);

}

function upload(){

$namaFile =$_FILES['gambar']['name'];
$ukuranFile=$_FILES['gambar']['size'];
$error=$_FILES['gambar']['error'];
$tmpName=$_FILES['gambar']['tmp_name'];

if($error===4){

	echo "<script>
alert('pilih gambar terlebih dahulu ')
</script>
	";
	return false;
}

$ekstensigambarvalid=['jpg','jpeg','png'];
$ektensigambar =explode('.',$namaFile);
$ektensigambar=strtolower(end($ektensigambar));
if (!in_array($ektensigambar, $ekstensigambarvalid)){

	echo "<script>
alert('yang di upload bukan gambar  ')
</script>
	";
	return false;
}
if ($ukuranFile>1000000){
	echo "<script>
alert('size  di upload besar gambar  ')
</script>
	";
	return false;
}

$namafilebaru=uniqid();
$namafilebaru .='.';
$namafilebaru .=$ektensigambar;

move_uploaded_file($tmpName, 'gambar/'.$namafilebaru);
return $namafilebaru;

}


function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM mahasiswa where id= $id");
	return mysqli_affected_rows($conn);


}

function ubahuy($data){
	global $conn;
	$id=$data["id"];
$nrp=htmlspecialchars($data["nrp"]);
$nama=htmlspecialchars($data["nama"]);
$email=htmlspecialchars($data["email"]);
$jurusan=htmlspecialchars($data["jurusan"]);
$gambarLama=htmlspecialchars($data["gambarLama"]);

if($_FILES['gambar']['error']===4){
	$gambar=$gambarLama;

} else{
	$gambar=upload();
}


$insert="UPDATE mahasiswa SET 
		nrp ='$nrp',
		 nama='$nama',
		 email='$email',
		jurusan='$jurusan', 
		gaambar ='$gambar' 
		WHERE id=$id

";
mysqli_query($conn,$insert);

return mysqli_affected_rows($conn);


}


function cari($keyword)
{


	$query="SELECT *FROM mahasiswa
	where

	nama LIKE '%$keyword%' OR 
	email LIKE '%$keyword%' 
	

	";

	return query($query);
}


function registrasi($data){
global $conn;

$username= strtolower(stripslashes( $data["username"]));
$password=mysqli_real_escape_string($conn, $data["password"]);
$password2=mysqli_real_escape_string($conn, $data["password2"]);

$resul= mysqli_query($conn,"SELECT username From user where username ='$username'");

if(mysqli_fetch_assoc($resul)){

 	echo "<script>
alert('username sudah ada  gagal di tambahkan ');

 	</script>";

	return false;
}





 if($password !== $password2){

 	echo "<script>
alert('konfirmasi gagal');

 	</script>";
 	return false;
 }


$password=password_hash($password, PASSWORD_DEFAULT);


mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$password')");

return mysqli_affected_rows($conn);







}




 ?>

