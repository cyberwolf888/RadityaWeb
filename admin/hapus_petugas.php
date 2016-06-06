<?php
include '../config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=1){
	echo "<script>window.location=('index.php')</script>";
}

$id = $_GET['id'];
if(isset($id)){
	$query = $mysqli->query("delete from users where id='$id'");
	if($query){
		$mysqli->query("delete from petugas where id_user='$id'");
		echo "<script>alert('Berhasil Hapus Data');location.href='petugas.php';</script>";
}else{
		header('location: admin.php');
	}
	}
?>