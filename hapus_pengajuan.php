<?php
include 'config.php'; 

if(!isset($_SESSION['type']) || $_SESSION['type']!=2){
	echo "<script>window.location=('index.php')</script>";
}
$id = $_GET['id'];
if(isset($id)){
	$query = $mysqli->query("delete from kredit where id='$id'");
	if($query){
		$query = $mysqli->query("delete from angsuran where id_kredit='$id'");
		echo "<script>alert('Berhasil Hapus Data');location.href='pengajuan1.php';</script>";
}else{
		header('location: pengajuan1.php');
	}
	}
?>