<?php 

require'funtions.php';


$id=$_GET["id"];
if(hapus($id)>0){
echo "berhasil";
}else{
	echo "gagal";
}

 ?>
