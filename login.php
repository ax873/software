<?php 
// session_start();
require 'funtions.php';
// if( isset($_SESSION['login'])){
// 	header( "Location: index.php" );
// 	exit;
// }
// if(isset($_COOKIE['login'])){
// 	if($_COOKIE['login']=='true'){
// 		$_SESSION['login']=true;
// 	}
// }



if(isset($_COOKIE['id'])&&isset($_COOKIE['key'])){
	$id=$_COOKIE['id'];
	$key=$_COOKIE['key'];

	$result=mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
	$row =mysqli_fetch_assoc($result);
	if($key===hash('sha256',$row['username']) ){
		$_SESSION['login']=true;
	}
	
}


if (isset($_POST["login"])){

$username =$_POST["username"];
$password =$_POST["password"];

$rsult=mysqli_query($conn,"SELECT * FROM user where username ='$username'");

if(mysqli_num_rows($rsult) === 1 ){

$row=mysqli_fetch_assoc($rsult);
if ( password_verify($password, $row["password"]) ){

 // $_SESSION['login']= true;
if(isset($_POST["remember"])){
	

	setcookie('id',$row['id'],time()+60);
	setcookie('key',hash('sha256',$row['username']),time()+60);

}

		header( "Location: index.php" );
	exit;
	
}

}

$error =true;


}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN LOGIN </title>
</head>
<body>
<?php if(isset($error)): ?>

<p> username password salah cuyyyy </p>
<?php endif; ?>
<form action="" method="post">

	<li>
		<label for="username"> username </label>
		<input type="text" name="username" id="username">
	</li>

	<li>
		<label for="password"> password </label>
		<input type="password" name="password" id="password">
	</li>

	<li>
		
		<input type="checkbox" name="remember" id="remember">
		<label for="remember"> ingatsaya </label>

	</li>
	<li>
		<button type="submit" name="login"> LOGIN</button>
	</li>
	
</form>


</body>
</html>