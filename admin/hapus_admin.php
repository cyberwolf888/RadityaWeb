<?php
include '../config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=1){
	echo "<script>window.location=('index.php')</script>";
}

$id = $_GET['id'];
if(isset($id)){
	$query = $mysqli->query("delete from users where id='$id'");
	if($query){
		echo "<script>alert('Berhasil Hapus Data');
		location.href='admin.php';</script>";
	}else{
		echo mysqli_error($mysqli);
			//header('location:admin.php');
	}
}
?>