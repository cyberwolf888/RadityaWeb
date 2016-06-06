<?php
include 'config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=2){
	echo "<script>window.location=('index.php')</script>";
}
$id = $_GET['id'];
if(isset($id)){
	$query = $mysqli->query("delete from barang where id='$id'");
	if($query){
		echo "<script>alert('Berhasil Hapus Data');location.href='dtbarang.php';</script>";
}else{
		header('location: dtbarang.php');
	}
	}
?>