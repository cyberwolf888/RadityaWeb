<?php
include 'config.php';
$id_cust = $_POST['id_cust'];
$sql = "SELECT kredit.*, barang.id as b_id, barang.nama_barang FROM kredit JOIN barang ON kredit.id_barang = barang.id WHERE kredit.id_cust='$id_cust' AND kredit.status=1";
$result = $mysqli->query($sql);
	echo '<option value=""></option>';
while($row = $result->fetch_assoc()){
	echo '<option value="'.$row['id'].'">'.$row['nama_barang'].'</option>';
}
