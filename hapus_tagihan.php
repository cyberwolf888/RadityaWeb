<?php
include 'config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=2){
	echo "<script>window.location=('index.php')</script>";
}
$id = $_GET['id'];
if(isset($id)){
	$query = $mysqli->query("delete from angsuran where id='$id'");
	if($query){
		echo "<script>alert('Berhasil Hapus Data');location.href='pembayaran.php';</script>";
}else{
		header('location: pembayaran.php');
	}
}
?>