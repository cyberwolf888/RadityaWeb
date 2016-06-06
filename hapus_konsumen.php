<?php
include 'config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=2){
	echo "<script>window.location=('index.php')</script>";
}
$id = $_GET['id'];
if(isset($id_anggota)){
	$query = $mysqli->query("delete from anggota where id_anggota='$id_anggota'");
	if($query){
		echo "<script>alert('Berhasil Hapus Data');location.href='dtkonsumen.php';</script>";
}else{
		header('location: dtkonsumen.php');
	}
	}
?>