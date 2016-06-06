<?php
date_default_timezone_set("asia/singapore");
$mysqli = new mysqli('localhost','root','','db_kredit');
if($mysqli->connect_errno){
	echo "Gagal Koneksi".$mysqli->connect_error;
	}
session_start();	
	
?>
